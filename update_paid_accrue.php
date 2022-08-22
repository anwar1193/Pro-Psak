<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading Page</title>
    <style>

        *{
            margin: 0;
            padding: 0;
        }

        .loading{
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.1);
            text-align: center;
            display: grid;
        }

        .loading img{
            position: relative;
            margin: 0 auto;
            top: -100px;
        }

        .loading span{
            margin-top: 100px;
            font-size: 2.5em;
            text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.4);
        }


    </style>
</head>
<body>
    
    <div class="loading">
        <span>Sedang Di Proses..</span>
        <img src="img/loading.gif" alt="">
    </div>


<?php  

	include 'koneksi.php';
	$bulan = $_POST['bulan'];
	$tahun = $_POST['tahun'];

	// Validasi Data (bulan, tahun) yang dipilih sudah di proses (paid) sebelumnya
	$q_validasi_sudah_proses = "SELECT * FROM tbl_penyusutan_active_accrue WHERE bulan='$bulan' AND tahun='$tahun'";
	$res_validasi_sudah_proses = mysqli_query($koneksi, $q_validasi_sudah_proses) or die ('error validasi');
	$cek_validasi_sudah_proses = mysqli_num_rows($res_validasi_sudah_proses);
	
	if($cek_validasi_sudah_proses > 0){
		echo '<script>
			alert("Maaf, Untuk Bulan & Tahun Yang Dipilih, Data Sudah Di Proses Sebelumnya");
			window.location="home.php";
		</script>';
		exit;
	}


	// Validasi Tidak bisa lompat bulan
	$q_validasi_lompat_bulan = "SELECT * FROM tbl_saldo_awal_accrue WHERE bulan='$bulan' AND tahun='$tahun'";
	$res_validasi_lompat_bulan = mysqli_query($koneksi, $q_validasi_lompat_bulan) or die ('error validasi lompat bulan');
	$cek_validasi_lompat_bulan = mysqli_num_rows($res_validasi_lompat_bulan);

	if($cek_validasi_lompat_bulan < 1){ // jika saldo awal belum terbentuk (dengan kata lain melompati proses)
		echo '<script>
			alert("Harap menjalankan proses generate (paid) sesuai urutan bulan");
			window.location="home_accrue.php";
		</script>';
		exit;
	}

	// Cari Bulan Depan (Include tahun)
	if($bulan != '12'){ // jika bulan januari - november
		$bulan_depan = $bulan + 1;
		$tahun_depan = $tahun;
	}else{ // jika bulan desember
		$bulan_depan = 1;
		$tahun_depan = $tahun + 1;
	}


	// Update Status Account..................................................................................
	// looping data accrue
    $query_data = "SELECT * FROM tbl_accrue";
    $res_data = mysqli_query($koneksi, $query_data) or die('error looping data');

    while($row_data = mysqli_fetch_array($res_data)){
        $no_pin = $row_data['no_pin'];

        // Ambil Account Status di tbl_nopin
        $query_status = "SELECT * FROM tbl_nopin_accrue WHERE no_pin = '$no_pin'";
        $res_status = mysqli_query($koneksi, $query_status) or die ('error ambil status');
        $row_status = mysqli_fetch_array($res_status);
        $status_baru = $row_status['account_status'];

		// validasi jika account status blm di tarik dari dleas
		$cek_status = mysqli_num_rows($res_status);

		if($cek_status < 1){ // jika nopin tidak tersedia / belum di tarik dari dleas

			echo '<script>
				alert("Nopin/Status Tidak Tersedia, Silahkan Generate Account Status atau Hubungi Team IT");
				window.location="home_accrue.php";
			</script>';
			exit;

		}else{ // jika nopin ada / sudah di tarik dari dleas

			// Update status di tbl_accrue
			$query_update = "UPDATE tbl_accrue SET account_sts='$status_baru' WHERE no_pin='$no_pin'";
			mysqli_query($koneksi, $query_update) or die('error update');
	
			// Update status di tbl_psak_detail
			$query_update_detail = "UPDATE tbl_accrue_detail SET account_sts='$status_baru' WHERE no_pin='$no_pin'";
			mysqli_query($koneksi, $query_update_detail) or die('error update detail');

			// Jika Status Baru nya adalah closed / bukan active, maka ubah paid_status di tbl_psak jadi Done
			if($status_baru != 'ACTIVE'){
				// update paid_status di tbl_psak
				$q_update_paidSts2 = "UPDATE tbl_accrue SET paid_status='Done' WHERE no_pin='$no_pin'";
				mysqli_query($koneksi, $q_update_paidSts2);
			}

		}

    }

	// Update Paid Active .........................................................
    // Looping NoPin mana saja yang ada payment
    $q_payment_accrue_active = "SELECT COUNT(*) AS jumlah_payment, no_pin, account_name, paidtxndate, periode, tanggal_tarik_data FROM tbl_payment_accrue WHERE MONTH(paidtxndate)='$bulan' AND YEAR(paidtxndate)='$tahun' GROUP BY no_pin";

    $r_payment_accrue_active = mysqli_query($koneksi, $q_payment_accrue_active);

    while($row_paa = mysqli_fetch_array($r_payment_accrue_active)){
        $nopin_paa = $row_paa['no_pin'];
        $paidtxndate_paa = $row_paa['paidtxndate'];
        $jumlah_payment = $row_paa['jumlah_payment'];

		// Ambil payment terbaru yang belum di-update, sebagai patokan mulai dari mana paid dilakukan
		$q_payment_blm_update = "SELECT MIN(id) AS id_mulai_update FROM tbl_accrue_detail WHERE no_pin='$nopin_paa' AND status_paid='belum'";
		$res_payment_blm_update = mysqli_query($koneksi, $q_payment_blm_update);
		$data_payment_blm_update = mysqli_fetch_array($res_payment_blm_update);

        $id_mulai_update = $data_payment_blm_update['id_mulai_update'];

        // Looping Update Paid Sesuai Dengan Jumlah Payment
		for($i=1; $i<=$jumlah_payment; $i++){
			$query_update_active = "UPDATE tbl_accrue_detail 
			SET status_paid='paid', bulan_paid='$bulan', tahun_paid='$tahun'
			WHERE id='$id_mulai_update' AND account_sts='ACTIVE'";

			mysqli_query($koneksi,$query_update_active) or die (mysqli_error($koneksi));

			$id_mulai_update++;
		}

    }

    // Update Paid Close ..........................................................
	$query_update_close = "UPDATE tbl_accrue_detail 
            SET status_paid='closed', bulan_close='$bulan', tahun_close=$tahun 
            WHERE 
		    account_sts!='ACTIVE' AND status_paid='belum' AND bulan_close=''";

	        mysqli_query($koneksi,$query_update_close) or die ('error fungsi paid close');


	// Input data penyusutan Active ke tbl_penyusutan_active.......................
	$query_tampil_active = "SELECT 
				fincat,
				SUM(accrue_restru) AS t_accrue_restru
				FROM tbl_accrue_detail 
				WHERE account_sts='ACTIVE' AND bulan_paid=$bulan AND tahun_paid=$tahun AND status_paid='paid'
				GROUP BY fincat";

	$result_tampil_active = mysqli_query($koneksi,$query_tampil_active) or die ('error fungsi tampil active');

	while($row = mysqli_fetch_array($result_tampil_active)){
		$fincat = $row['fincat'];
        $accrue_restru = $row['t_accrue_restru'];

        // Simpan ke tbl_penyusutan_active_accrue
        $query_simpan_active = "INSERT INTO tbl_penyusutan_active_accrue(fincat, bulan, tahun, accrue_restru) VALUES('$fincat', '$bulan', '$tahun', $accrue_restru)";

        mysqli_query($koneksi, $query_simpan_active);
	}


	// Input data penyusutan Closed ke tbl_penyusutan_closed.....................
	$query_tampil_closed = "SELECT 
				fincat,
				SUM(accrue_restru) AS t_accrue_restru
				FROM tbl_accrue_detail WHERE 
						bulan_close=$bulan AND tahun_close=$tahun AND status_paid='closed'
				GROUP BY fincat
						";
	$result_tampil_closed = mysqli_query($koneksi,$query_tampil_closed) or die ('error fungsi tampil closed');

	while($row = mysqli_fetch_array($result_tampil_closed)){
		$fincat = $row['fincat'];
        $accrue_restru = $row['t_accrue_restru'];
        

        // Simpan ke tbl_penyusutan_closed_accrue
        $query_simpan_closed = "INSERT INTO tbl_penyusutan_closed_accrue(fincat, bulan, tahun, accrue_restru) VALUES('$fincat', '$bulan', '$tahun', $accrue_restru)";

        mysqli_query($koneksi, $query_simpan_closed);
	}


	// Input data saldo awal bulan selanjutnya ...................................
	$query_saldo_awal = "SELECT * FROM tbl_saldo_awal_accrue WHERE bulan='$bulan' AND tahun='$tahun'";
	$result_saldo_awal = mysqli_query($koneksi, $query_saldo_awal) or die ('error saldo awal');
	while($row = mysqli_fetch_array($result_saldo_awal)){
		// Data Saldo Awal Sebelum nya
		$fincat = $row['fincat'];
		$accrue_restru = $row['accrue_restru'];

		// Data penyusutan Account Active
		$q_penyusutan_active = "SELECT * FROM tbl_penyusutan_active_accrue WHERE fincat='$fincat' AND bulan='$bulan' AND tahun='$tahun'";
		$res_penyusutan_active = mysqli_query($koneksi, $q_penyusutan_active) or die ('error penyusutan active');
		$row_penyusutan_active = mysqli_fetch_array($res_penyusutan_active);
		
		$accrue_restru_active = $row_penyusutan_active['accrue_restru'];


		// Data penyusutan Account Closed
		$q_penyusutan_closed = "SELECT * FROM tbl_penyusutan_closed_accrue WHERE fincat='$fincat' AND bulan='$bulan' AND tahun='$tahun'";
		$res_penyusutan_closed = mysqli_query($koneksi, $q_penyusutan_closed) or die ('error penyusutan closed');
		$row_penyusutan_closed = mysqli_fetch_array($res_penyusutan_closed);
		
		$accrue_restru_closed = $row_penyusutan_closed['accrue_restru'];

		// Saldo Akhir Bulan Ini (Saldo Awal Bulan Selanjutnya)
		$accrue_restru_akhir = $accrue_restru - $accrue_restru_active - $accrue_restru_closed;


		// Simpan Saldo Awal Ke Bulan Depan
		$query_simpan_saldo_selanjutnya = "INSERT INTO tbl_saldo_awal_accrue(fincat, bulan, tahun, accrue_restru) VALUES('$fincat', '$bulan_depan', '$tahun_depan', $accrue_restru_akhir)";

        mysqli_query($koneksi, $query_simpan_saldo_selanjutnya);

	}


	// // Update Paid Status di tbl_accrue..................................................................................
	// looping data psak
    $query_psak = "SELECT * FROM tbl_accrue";
    $res_psak = mysqli_query($koneksi, $query_psak) or die('error looping data');
    while($row_psak = mysqli_fetch_array($res_psak)){
        $no_pin = $row_psak['no_pin'];

		// semua data di tbl_accrue_detail (berdasarkan no_pin)
        $q_detail_all = "SELECT * FROM tbl_accrue_detail WHERE no_pin='$no_pin'";
		$res_detail_all = mysqli_query($koneksi, $q_detail_all) or die ('error detail all');
		$jml_detail_all = mysqli_num_rows($res_detail_all);

		// semua data di tbl_accrue_detail (berdasarkan no_pin dan status_paid='paid')
        $q_detail_paid = "SELECT * FROM tbl_accrue_detail WHERE no_pin='$no_pin' AND status_paid='paid'";
		$res_detail_paid = mysqli_query($koneksi, $q_detail_paid) or die ('error detail all');
		$jml_detail_paid = mysqli_num_rows($res_detail_paid);

		if($jml_detail_all == $jml_detail_paid){ //jika semua sudah paid
			// update paid_status di tbl_accrue
			$q_update_paidSts = "UPDATE tbl_accrue SET paid_status='Done' WHERE no_pin='$no_pin'";
			mysqli_query($koneksi, $q_update_paidSts);
		}

    }


	// Alert update berhasil........................................................................................
	echo '<script>
		alert("Status Berhasil di Update");window.location="home_accrue.php";
	</script>';

?>

</body>
</html>