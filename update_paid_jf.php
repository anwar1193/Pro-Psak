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
	$q_validasi_sudah_proses = "SELECT * FROM tbl_penyusutan_active_jf WHERE bulan='$bulan' AND tahun='$tahun'";
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
	$q_validasi_lompat_bulan = "SELECT * FROM tbl_saldo_awal_jf WHERE bulan='$bulan' AND tahun='$tahun'";
	$res_validasi_lompat_bulan = mysqli_query($koneksi, $q_validasi_lompat_bulan) or die ('error validasi lompat bulan');
	$cek_validasi_lompat_bulan = mysqli_num_rows($res_validasi_lompat_bulan);

	if($cek_validasi_lompat_bulan < 1){ // jika saldo awal belum terbentuk (dengan kata lain melompati proses)
		echo '<script>
			alert("Harap menjalankan proses generate (paid) sesuai urutan bulan");
			window.location="home.php";
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
	// looping data psak
    $query_data = "SELECT * FROM tbl_jf";
    $res_data = mysqli_query($koneksi, $query_data) or die('error looping data');
    while($row_data = mysqli_fetch_array($res_data)){
        $no_pin = $row_data['no_pin'];
		$status_lama = $row_data['bank_awal'];

        // Ambil Account Status di tbl_nopin
        $query_status = "SELECT * FROM tbl_nopin_jf WHERE no_pin = '$no_pin'";
        $res_status = mysqli_query($koneksi, $query_status) or die ('error ambil status');
        $row_status = mysqli_fetch_array($res_status);
        $status_baru = $row_status['account_status'];

		// validasi jika account status blm di tarik dari dleas
		$cek_status = mysqli_num_rows($res_status);

		if($cek_status < 1){ // jika nopin tidak tersedia / belum di tarik dari dleas

			echo '<script>
				alert("Nopin/Status Tidak Tersedia, Silahkan Generate Account Status atau Hubungi Team IT");
				window.location="home.php";
			</script>';
			exit;

		}else{ // jika nopin ada / sudah di tarik dari dleas

			// Update status di tbl_jf
			$query_update = "UPDATE tbl_jf SET account_sts='$status_baru' WHERE no_pin='$no_pin'";
			mysqli_query($koneksi, $query_update) or die('error update');
	

			// Jika Status Baru nya SELF FINANCE & Ada perubahan Bank, maka ubah paid_status di tbl_psak jadi Done
			if($status_baru == 'SELF FINANCE' OR $status_baru != $status_lama){

				// Update status di tbl_psak_detail
				$query_update_detail = "UPDATE tbl_jf_detail SET account_sts='$status_baru', perubahan_bank='ya' WHERE no_pin='$no_pin'";
				mysqli_query($koneksi, $query_update_detail) or die('error update detail');

				// update paid_status di tbl_psak
				$q_update_paidSts2 = "UPDATE tbl_jf SET paid_status='Done' WHERE no_pin='$no_pin'";
				mysqli_query($koneksi, $q_update_paidSts2);
			}else{
				// Update status di tbl_psak_detail
				$query_update_detail = "UPDATE tbl_jf_detail SET account_sts='$status_baru' WHERE no_pin='$no_pin'";
				mysqli_query($koneksi, $query_update_detail) or die('error update detail');
			}

		}

    }


	// Update Paid ..............................................................................................
	$query_update_active = "UPDATE tbl_jf_detail SET status_paid='paid' WHERE bulan=$bulan AND tahun=$tahun AND account_sts != 'SELF FINANCE' OR
	bulan=$bulan AND tahun=$tahun AND perubahan_bank = ''";
	mysqli_query($koneksi,$query_update_active) or die ('error fungsi');

	$query_update_close = "UPDATE tbl_jf_detail SET status_paid='closed', bulan_close='$bulan', tahun_close=$tahun WHERE 
		bulan>=$bulan AND tahun>=$tahun AND bulan_close='' AND account_sts='SELF FINANCE' OR 
		bulan>=$bulan AND tahun>=$tahun AND bulan_close='' AND perubahan_bank = 'ya' OR 
		tahun>$tahun AND account_sts='SELF FINANCE' AND bulan_close='' OR
		tahun>$tahun AND perubahan_bank = 'ya' AND bulan_close=''
		";

	mysqli_query($koneksi,$query_update_close) or die ('error fungsi');


	// Input data penyusutan Active ke tbl_penyusutan_active_jf......................................................
	$query_tampil_active = "SELECT 
				fincat,
				SUM(provisi_jf) AS t_provisi_jf
				FROM tbl_jf_detail 
				WHERE bulan=$bulan AND tahun=$tahun AND status_paid='paid'
				GROUP BY fincat";

	$result_tampil_active = mysqli_query($koneksi,$query_tampil_active) or die ('error fungsi tampil active');
	while($row = mysqli_fetch_array($result_tampil_active)){
		$fincat = $row['fincat'];
        $provisi_jf = $row['t_provisi_jf'];
        

        // Simpan ke tbl_saldo_awal
        $query_simpan_active = "INSERT INTO tbl_penyusutan_active_jf(fincat, bulan, tahun, provisi_jf) VALUES('$fincat', '$bulan', '$tahun', $provisi_jf)";

        mysqli_query($koneksi, $query_simpan_active);
	}


	// Input data penyusutan Closed ke tbl_penyusutan_closed......................................................
	$query_tampil_closed = "SELECT 
				fincat,
				SUM(provisi_jf) AS t_provisi_jf
				FROM tbl_jf_detail WHERE 
						account_sts='SELF FINANCE' AND bulan_close=$bulan AND tahun_close=$tahun AND status_paid='closed' 
						OR
						perubahan_bank='ya' AND bulan_close=$bulan AND tahun_close=$tahun AND status_paid='closed'
				GROUP BY fincat
						";
	$result_tampil_closed = mysqli_query($koneksi,$query_tampil_closed) or die ('error fungsi tampil closed');

	while($row = mysqli_fetch_array($result_tampil_closed)){
		$fincat = $row['fincat'];
        $provisi_jf = $row['t_provisi_jf'];

        // Simpan ke tbl_saldo_awal
        $query_simpan_closed = "INSERT INTO tbl_penyusutan_closed_jf(fincat, bulan, tahun, provisi_jf) VALUES('$fincat', '$bulan', '$tahun', $provisi_jf)";

        mysqli_query($koneksi, $query_simpan_closed);
	}


	// Input data saldo awal bulan selanjutnya ......................................................
	$query_saldo_awal = "SELECT * FROM tbl_saldo_awal_jf WHERE bulan='$bulan' AND tahun='$tahun'";
	$result_saldo_awal = mysqli_query($koneksi, $query_saldo_awal) or die ('error saldo awal');
	while($row = mysqli_fetch_array($result_saldo_awal)){
		// Data Saldo Awal Sebelum nya
		$fincat = $row['fincat'];
		$provisi_jf = $row['provisi_jf'];

		// Data penyusutan Account Active
		$q_penyusutan_active = "SELECT * FROM tbl_penyusutan_active_jf WHERE fincat='$fincat' AND bulan='$bulan' AND tahun='$tahun'";
		$res_penyusutan_active = mysqli_query($koneksi, $q_penyusutan_active) or die ('error penyusutan active');
		$row_penyusutan_active = mysqli_fetch_array($res_penyusutan_active);
		
		$provisi_jf_active = $row_penyusutan_active['provisi_jf'];

		// Data penyusutan Account Closed
		
		$q_penyusutan_closed = "SELECT * FROM tbl_penyusutan_closed_jf WHERE fincat='$fincat' AND bulan='$bulan' AND tahun='$tahun'";
		$res_penyusutan_closed = mysqli_query($koneksi, $q_penyusutan_closed) or die ('error penyusutan closed');
		$row_penyusutan_closed = mysqli_fetch_array($res_penyusutan_closed);
		
		$provisi_jf_closed = $row_penyusutan_closed['provisi_jf'];

		// Saldo Akhir Bulan Ini (Saldo Awal Bulan Selanjutnya)
		$provisi_jf_akhir = $provisi_jf - $provisi_jf_active - $provisi_jf_closed;


		// Simpan Saldo Awal Ke Bulan Depan
		$query_simpan_saldo_selanjutnya = "INSERT INTO tbl_saldo_awal_jf(fincat, bulan, tahun, provisi_jf) VALUES('$fincat', '$bulan_depan', '$tahun_depan', $provisi_jf_akhir)";

        mysqli_query($koneksi, $query_simpan_saldo_selanjutnya);

	}


	// ...................................... UPDATE BY CABANG ....................................................................

	// Input data penyusutan Active ke tbl_penyusutan_active_cabang ......................................................
	$query_tampil_active_c = "SELECT 
				cabang,
				fincat,
				SUM(provisi_jf) AS t_provisi_jf
				FROM tbl_jf_detail
				WHERE bulan=$bulan AND tahun=$tahun AND status_paid='paid'
				GROUP BY cabang, fincat";

	$result_tampil_active_c = mysqli_query($koneksi,$query_tampil_active_c) or die ('error fungsi tampil active');
	while($row = mysqli_fetch_array($result_tampil_active_c)){
		$cabang = $row['cabang'];
		$fincat = $row['fincat'];
        $provisi_jf = $row['t_provisi_jf'];
        
        // Simpan ke tbl_saldo_awal
        $query_simpan_active_c = "INSERT INTO tbl_penyusutan_active_cabang_jf(cabang, fincat, bulan, tahun, provisi_jf) VALUES('$cabang', '$fincat', '$bulan', '$tahun', $provisi_jf)";

        mysqli_query($koneksi, $query_simpan_active_c);
	}


	// Input data penyusutan Closed ke tbl_penyusutan_closed_cabang ......................................................
	$query_tampil_closed_c = "SELECT 
				cabang,
				fincat,
				SUM(provisi_jf) AS t_provisi_jf
				FROM tbl_jf_detail WHERE 
						account_sts='SELF FINANCE' AND bulan_close=$bulan AND tahun_close=$tahun AND status_paid='closed' 
						OR
						perubahan_bank='ya' AND bulan_close=$bulan AND tahun_close=$tahun AND status_paid='closed' 
				GROUP BY cabang, fincat
						";
	$result_tampil_closed_c = mysqli_query($koneksi,$query_tampil_closed_c) or die ('error fungsi tampil closed');

	while($row = mysqli_fetch_array($result_tampil_closed_c)){
		$cabang = $row['cabang'];
		$fincat = $row['fincat'];
        $provisi_jf = $row['t_provisi_jf'];
        

        // Simpan ke tbl_saldo_awal
        $query_simpan_closed_c = "INSERT INTO tbl_penyusutan_closed_cabang_jf(cabang, fincat, bulan, tahun, provisi_jf) VALUES('$cabang', '$fincat', '$bulan', '$tahun', $provisi_jf)";

        mysqli_query($koneksi, $query_simpan_closed_c);
	}


	// Input data saldo awal bulan selanjutnya ......................................................
	$query_saldo_awal_c = "SELECT * FROM tbl_saldo_awal_cabang_jf WHERE bulan='$bulan' AND tahun='$tahun' GROUP BY cabang, fincat";
	$result_saldo_awal_c = mysqli_query($koneksi, $query_saldo_awal_c) or die ('error saldo awal');
	while($row = mysqli_fetch_array($result_saldo_awal_c)){
		// Data Saldo Awal Sebelum nya
		$cabang = $row['cabang'];
		$fincat = $row['fincat'];
		$provisi_jf_c = $row['provisi_jf'];

		// Data penyusutan Account Active
		$q_penyusutan_active_c = "SELECT * FROM tbl_penyusutan_active_cabang_jf WHERE cabang='$cabang' AND fincat='$fincat' AND bulan='$bulan' AND tahun='$tahun'";
		$res_penyusutan_active_c = mysqli_query($koneksi, $q_penyusutan_active_c) or die ('error penyusutan active');
		$row_penyusutan_active_c = mysqli_fetch_array($res_penyusutan_active_c);
		
		$provisi_jf_active_c = $row_penyusutan_active_c['provisi_jf'];

		// Data penyusutan Account Closed
		
		$q_penyusutan_closed_c = "SELECT * FROM tbl_penyusutan_closed_cabang_jf WHERE cabang='$cabang' AND fincat='$fincat' AND bulan='$bulan' AND tahun='$tahun'";
		$res_penyusutan_closed_c = mysqli_query($koneksi, $q_penyusutan_closed_c) or die ('error penyusutan closed');
		$row_penyusutan_closed_c = mysqli_fetch_array($res_penyusutan_closed_c);
		
		$provisi_jf_closed_c = $row_penyusutan_closed_c['provisi_jf'];

		// Saldo Akhir Bulan Ini (Saldo Awal Bulan Selanjutnya)
		$provisi_jf_akhir_c = $provisi_jf_c - $provisi_jf_active_c - $provisi_jf_closed_c;


		// Simpan Saldo Awal Ke Bulan Depan
		$query_simpan_saldo_selanjutnya_c = "INSERT INTO tbl_saldo_awal_cabang_jf(cabang, fincat, bulan, tahun, provisi_jf) VALUES('$cabang', '$fincat', '$bulan_depan', '$tahun_depan', $provisi_jf_akhir_c)";

        mysqli_query($koneksi, $query_simpan_saldo_selanjutnya_c);

	}
	// ...................................... / UPDATE BY CABANG ....................................................................


	// Update Paid Status di tbl_psak..................................................................................
	// looping data psak
    $query_psak = "SELECT * FROM tbl_jf";
    $res_psak = mysqli_query($koneksi, $query_psak) or die('error looping data');
    while($row_psak = mysqli_fetch_array($res_psak)){
        $no_pin = $row_psak['no_pin'];

		// semua data di tbl_psak_detail (berdasarkan no_pin)
        $q_detail_all = "SELECT * FROM tbl_jf_detail WHERE no_pin='$no_pin'";
		$res_detail_all = mysqli_query($koneksi, $q_detail_all) or die ('error detail all');
		$jml_detail_all = mysqli_num_rows($res_detail_all);

		// semua data di tbl_psak_detail (berdasarkan no_pin dan status_paid='paid')
        $q_detail_paid = "SELECT * FROM tbl_jf_detail WHERE no_pin='$no_pin' AND status_paid='paid'";
		$res_detail_paid = mysqli_query($koneksi, $q_detail_paid) or die ('error detail all');
		$jml_detail_paid = mysqli_num_rows($res_detail_paid);

		if($jml_detail_all == $jml_detail_paid){ //jika semua sudah paid
			// update paid_status di tbl_psak
			$q_update_paidSts = "UPDATE tbl_jf SET paid_status='Done' WHERE no_pin='$no_pin'";
			mysqli_query($koneksi, $q_update_paidSts);
		}

    }


	// Alert update berhasil........................................................................................
	echo '<script>
		alert("Status Berhasil di Update");window.location="home_jf.php";
	</script>';

?>

</body>
</html>