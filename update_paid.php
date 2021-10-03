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
        <img src="loading.gif" alt="">
    </div>


<?php  

	include 'koneksi.php';
	$bulan = $_POST['bulan'];
	$tahun = $_POST['tahun'];

	// Validasi Data (bulan, tahun) yang dipilih sudah di proses (paid) sebelumnya
	$q_validasi_sudah_proses = "SELECT * FROM tbl_penyusutan_active WHERE bulan='$bulan' AND tahun='$tahun'";
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
	$q_validasi_lompat_bulan = "SELECT * FROM tbl_saldo_awal WHERE bulan='$bulan' AND tahun='$tahun'";
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
    $query_data = "SELECT * FROM tbl_psak";
    $res_data = mysqli_query($koneksi, $query_data) or die('error looping data');
    while($row_data = mysqli_fetch_array($res_data)){
        $no_pin = $row_data['no_pin'];

        // Ambil Account Status di tbl_nopin
        $query_status = "SELECT * FROM tbl_nopin WHERE no_pin = '$no_pin'";
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

			// Update status di tbl_psak
			$query_update = "UPDATE tbl_psak SET account_sts='$status_baru' WHERE no_pin='$no_pin'";
			mysqli_query($koneksi, $query_update) or die('error update');
	
			// Update status di tbl_psak_detail
			$query_update_detail = "UPDATE tbl_psak_detail SET account_sts='$status_baru' WHERE no_pin='$no_pin'";
			mysqli_query($koneksi, $query_update_detail) or die('error update detail');

			// Jika Status Baru nya adalah closed / bukan active, maka ubah paid_status di tbl_psak jadi Done
			if($status_baru != 'ACTIVE'){
				// update paid_status di tbl_psak
				$q_update_paidSts2 = "UPDATE tbl_psak SET paid_status='Done' WHERE no_pin='$no_pin'";
				mysqli_query($koneksi, $q_update_paidSts2);
			}

		}

    }

	// Update Paid ..............................................................................................
	$query_update_active = "UPDATE tbl_psak_detail SET status_paid='paid' WHERE bulan=$bulan AND tahun=$tahun AND account_sts='ACTIVE'";
	mysqli_query($koneksi,$query_update_active) or die ('error fungsi');

	$query_update_close = "UPDATE tbl_psak_detail SET status_paid='closed', bulan_close='$bulan', tahun_close=$tahun WHERE 
		bulan>=$bulan AND tahun>=$tahun AND account_sts!='ACTIVE' AND bulan_close='' OR 
		tahun>$tahun AND account_sts!='ACTIVE' AND bulan_close=''";

	mysqli_query($koneksi,$query_update_close) or die ('error fungsi');


	// Input data penyusutan Active ke tbl_penyusutan_active......................................................
	$query_tampil_active = "SELECT 
				fincat,
				SUM(refund_npv) AS t_refund_npv,
				SUM(refund_asuransi) AS t_refund_asuransi,
				SUM(refund_adm) AS t_refund_adm,
				SUM(ins_receivable) AS t_ins_receivable,
				SUM(by_notaris) AS t_by_notaris,
				SUM(pend_asuransi) AS t_pend_asuransi,
				SUM(pend_survey) AS t_pend_survey,
				SUM(pend_fidusia) AS t_pend_fidusia,
				SUM(pend_provisi) AS t_pend_provisi
				FROM tbl_psak_detail 
				WHERE account_sts='ACTIVE' AND bulan=$bulan AND tahun=$tahun AND status_paid='paid'
				GROUP BY fincat";

	$result_tampil_active = mysqli_query($koneksi,$query_tampil_active) or die ('error fungsi tampil active');
	while($row = mysqli_fetch_array($result_tampil_active)){
		$fincat = $row['fincat'];
        $refund_npv = $row['t_refund_npv'];
        $refund_asuransi = $row['t_refund_asuransi'];
        $refund_adm = $row['t_refund_adm'];
        $ins_receivable = $row['t_ins_receivable'];
        $by_notaris = $row['t_by_notaris'];
        $pend_asuransi = $row['t_pend_asuransi'];
        $pend_survey = $row['t_pend_survey'];
        $pend_fidusia = $row['t_pend_fidusia'];
        $pend_provisi = $row['t_pend_provisi'];
        

        // Simpan ke tbl_saldo_awal
        $query_simpan_active = "INSERT INTO tbl_penyusutan_active(fincat, bulan, tahun, refund_npv, refund_asuransi, refund_adm, ins_receivable, by_notaris, pend_asuransi, pend_survey, pend_fidusia, pend_provisi) VALUES('$fincat', '$bulan', '$tahun', $refund_npv, $refund_asuransi, $refund_adm, $ins_receivable, $by_notaris, $pend_asuransi, $pend_survey, $pend_fidusia, $pend_provisi)";

        mysqli_query($koneksi, $query_simpan_active);
	}


	// Input data penyusutan Closed ke tbl_penyusutan_closed......................................................
	$query_tampil_closed = "SELECT 
				fincat,
				SUM(refund_npv) AS t_refund_npv,
				SUM(refund_asuransi) AS t_refund_asuransi,
				SUM(refund_adm) AS t_refund_adm,
				SUM(ins_receivable) AS t_ins_receivable,
				SUM(by_notaris) AS t_by_notaris,
				SUM(pend_asuransi) AS t_pend_asuransi,
				SUM(pend_survey) AS t_pend_survey,
				SUM(pend_fidusia) AS t_pend_fidusia,
				SUM(pend_provisi) AS t_pend_provisi
				FROM tbl_psak_detail WHERE 
						(account_sts='CLOSED - REGULER' OR account_sts='CLOSED - REPOSES' OR account_sts='CLOSED - WO') AND bulan_close=$bulan AND tahun_close=$tahun AND status_paid='closed'
				GROUP BY fincat
						";
	$result_tampil_closed = mysqli_query($koneksi,$query_tampil_closed) or die ('error fungsi tampil closed');

	while($row = mysqli_fetch_array($result_tampil_closed)){
		$fincat = $row['fincat'];
        $refund_npv = $row['t_refund_npv'];
        $refund_asuransi = $row['t_refund_asuransi'];
        $refund_adm = $row['t_refund_adm'];
        $ins_receivable = $row['t_ins_receivable'];
        $by_notaris = $row['t_by_notaris'];
        $pend_asuransi = $row['t_pend_asuransi'];
        $pend_survey = $row['t_pend_survey'];
        $pend_fidusia = $row['t_pend_fidusia'];
        $pend_provisi = $row['t_pend_provisi'];
        

        // Simpan ke tbl_saldo_awal
        $query_simpan_closed = "INSERT INTO tbl_penyusutan_closed(fincat, bulan, tahun, refund_npv, refund_asuransi, refund_adm, ins_receivable, by_notaris, pend_asuransi, pend_survey, pend_fidusia, pend_provisi) VALUES('$fincat', '$bulan', '$tahun', $refund_npv, $refund_asuransi, $refund_adm, $ins_receivable, $by_notaris, $pend_asuransi, $pend_survey, $pend_fidusia, $pend_provisi)";

        mysqli_query($koneksi, $query_simpan_closed);
	}


	// Input data saldo awal bulan selanjutnya ......................................................
	$query_saldo_awal = "SELECT * FROM tbl_saldo_awal WHERE bulan='$bulan' AND tahun='$tahun'";
	$result_saldo_awal = mysqli_query($koneksi, $query_saldo_awal) or die ('error saldo awal');
	while($row = mysqli_fetch_array($result_saldo_awal)){
		// Data Saldo Awal Sebelum nya
		$fincat = $row['fincat'];
		$refund_npv = $row['refund_npv'];
        $refund_asuransi = $row['refund_asuransi'];
        $refund_adm = $row['refund_adm'];
        $ins_receivable = $row['ins_receivable'];
        $by_notaris = $row['by_notaris'];
        $pend_asuransi = $row['pend_asuransi'];
        $pend_survey = $row['pend_survey'];
        $pend_fidusia = $row['pend_fidusia'];
        $pend_provisi = $row['pend_provisi'];

		// Data penyusutan Account Active
		$q_penyusutan_active = "SELECT * FROM tbl_penyusutan_active WHERE fincat='$fincat' AND bulan='$bulan' AND tahun='$tahun'";
		$res_penyusutan_active = mysqli_query($koneksi, $q_penyusutan_active) or die ('error penyusutan active');
		$row_penyusutan_active = mysqli_fetch_array($res_penyusutan_active);
		
		$refund_npv_active = $row_penyusutan_active['refund_npv'];
        $refund_asuransi_active = $row_penyusutan_active['refund_asuransi'];
        $refund_adm_active = $row_penyusutan_active['refund_adm'];
        $ins_receivable_active = $row_penyusutan_active['ins_receivable'];
        $by_notaris_active = $row_penyusutan_active['by_notaris'];
        $pend_asuransi_active = $row_penyusutan_active['pend_asuransi'];
        $pend_survey_active = $row_penyusutan_active['pend_survey'];
        $pend_fidusia_active = $row_penyusutan_active['pend_fidusia'];
        $pend_provisi_active = $row_penyusutan_active['pend_provisi'];

		// Data penyusutan Account Closed
		
		$q_penyusutan_closed = "SELECT * FROM tbl_penyusutan_closed WHERE fincat='$fincat' AND bulan='$bulan' AND tahun='$tahun'";
		$res_penyusutan_closed = mysqli_query($koneksi, $q_penyusutan_closed) or die ('error penyusutan closed');
		$row_penyusutan_closed = mysqli_fetch_array($res_penyusutan_closed);
		
		$refund_npv_closed = $row_penyusutan_closed['refund_npv'];
        $refund_asuransi_closed = $row_penyusutan_closed['refund_asuransi'];
        $refund_adm_closed = $row_penyusutan_closed['refund_adm'];
        $ins_receivable_closed = $row_penyusutan_closed['ins_receivable'];
        $by_notaris_closed = $row_penyusutan_closed['by_notaris'];
        $pend_asuransi_closed = $row_penyusutan_closed['pend_asuransi'];
        $pend_survey_closed = $row_penyusutan_closed['pend_survey'];
        $pend_fidusia_closed = $row_penyusutan_closed['pend_fidusia'];
        $pend_provisi_closed = $row_penyusutan_closed['pend_provisi'];

		// Saldo Akhir Bulan Ini (Saldo Awal Bulan Selanjutnya)
		$refund_npv_akhir = $refund_npv - $refund_npv_active - $refund_npv_closed;
		$refund_asuransi_akhir = $refund_asuransi - $refund_asuransi_active - $refund_asuransi_closed;
		$refund_adm_akhir = $refund_adm - $refund_adm_active - $refund_adm_closed;
		$ins_receivable_akhir = $ins_receivable - $ins_receivable_active - $ins_receivable_closed;
		$by_notaris_akhir = $by_notaris - $by_notaris_active - $by_notaris_closed;
		$pend_asuransi_akhir = $pend_asuransi - $pend_asuransi_active - $pend_asuransi_closed;
		$pend_survey_akhir = $pend_survey - $pend_survey_active - $pend_survey_closed;
		$pend_fidusia_akhir = $pend_fidusia - $pend_fidusia_active - $pend_fidusia_closed;
		$pend_provisi_akhir = $pend_provisi - $pend_provisi_active - $pend_provisi_closed;


		// Simpan Saldo Awal Ke Bulan Depan
		$query_simpan_saldo_selanjutnya = "INSERT INTO tbl_saldo_awal(fincat, bulan, tahun, refund_npv, refund_asuransi, refund_adm, ins_receivable, by_notaris, pend_asuransi, pend_survey, pend_fidusia, pend_provisi) VALUES('$fincat', '$bulan_depan', '$tahun_depan', $refund_npv_akhir, $refund_asuransi_akhir, $refund_adm_akhir, $ins_receivable_akhir, $by_notaris_akhir, $pend_asuransi_akhir, $pend_survey_akhir, $pend_fidusia_akhir, $pend_provisi_akhir)";

        mysqli_query($koneksi, $query_simpan_saldo_selanjutnya);

	}


	// ...................................... UPDATE BY CABANG ....................................................................

	// Input data penyusutan Active ke tbl_penyusutan_active_cabang ......................................................
	$query_tampil_active_c = "SELECT 
				cabang,
				fincat,
				SUM(refund_npv) AS t_refund_npv,
				SUM(refund_asuransi) AS t_refund_asuransi,
				SUM(refund_adm) AS t_refund_adm,
				SUM(ins_receivable) AS t_ins_receivable,
				SUM(by_notaris) AS t_by_notaris,
				SUM(pend_asuransi) AS t_pend_asuransi,
				SUM(pend_survey) AS t_pend_survey,
				SUM(pend_fidusia) AS t_pend_fidusia,
				SUM(pend_provisi) AS t_pend_provisi
				FROM tbl_psak_detail 
				WHERE account_sts='ACTIVE' AND bulan=$bulan AND tahun=$tahun AND status_paid='paid'
				GROUP BY cabang, fincat";

	$result_tampil_active_c = mysqli_query($koneksi,$query_tampil_active_c) or die ('error fungsi tampil active');
	while($row = mysqli_fetch_array($result_tampil_active_c)){
		$cabang = $row['cabang'];
		$fincat = $row['fincat'];
        $refund_npv = $row['t_refund_npv'];
        $refund_asuransi = $row['t_refund_asuransi'];
        $refund_adm = $row['t_refund_adm'];
        $ins_receivable = $row['t_ins_receivable'];
        $by_notaris = $row['t_by_notaris'];
        $pend_asuransi = $row['t_pend_asuransi'];
        $pend_survey = $row['t_pend_survey'];
        $pend_fidusia = $row['t_pend_fidusia'];
        $pend_provisi = $row['t_pend_provisi'];
        

        // Simpan ke tbl_saldo_awal
        $query_simpan_active_c = "INSERT INTO tbl_penyusutan_active_cabang(cabang, fincat, bulan, tahun, refund_npv, refund_asuransi, refund_adm, ins_receivable, by_notaris, pend_asuransi, pend_survey, pend_fidusia, pend_provisi) VALUES('$cabang', '$fincat', '$bulan', '$tahun', $refund_npv, $refund_asuransi, $refund_adm, $ins_receivable, $by_notaris, $pend_asuransi, $pend_survey, $pend_fidusia, $pend_provisi)";

        mysqli_query($koneksi, $query_simpan_active_c);
	}


	// Input data penyusutan Closed ke tbl_penyusutan_closed_cabang ......................................................
	$query_tampil_closed_c = "SELECT 
				cabang,
				fincat,
				SUM(refund_npv) AS t_refund_npv,
				SUM(refund_asuransi) AS t_refund_asuransi,
				SUM(refund_adm) AS t_refund_adm,
				SUM(ins_receivable) AS t_ins_receivable,
				SUM(by_notaris) AS t_by_notaris,
				SUM(pend_asuransi) AS t_pend_asuransi,
				SUM(pend_survey) AS t_pend_survey,
				SUM(pend_fidusia) AS t_pend_fidusia,
				SUM(pend_provisi) AS t_pend_provisi
				FROM tbl_psak_detail WHERE 
						(account_sts='CLOSED - REGULER' OR account_sts='CLOSED - REPOSES' OR account_sts='CLOSED - WO') AND bulan_close=$bulan AND tahun_close=$tahun AND status_paid='closed'
				GROUP BY cabang, fincat
						";
	$result_tampil_closed_c = mysqli_query($koneksi,$query_tampil_closed_c) or die ('error fungsi tampil closed');

	while($row = mysqli_fetch_array($result_tampil_closed_c)){
		$cabang = $row['cabang'];
		$fincat = $row['fincat'];
        $refund_npv = $row['t_refund_npv'];
        $refund_asuransi = $row['t_refund_asuransi'];
        $refund_adm = $row['t_refund_adm'];
        $ins_receivable = $row['t_ins_receivable'];
        $by_notaris = $row['t_by_notaris'];
        $pend_asuransi = $row['t_pend_asuransi'];
        $pend_survey = $row['t_pend_survey'];
        $pend_fidusia = $row['t_pend_fidusia'];
        $pend_provisi = $row['t_pend_provisi'];
        

        // Simpan ke tbl_saldo_awal
        $query_simpan_closed_c = "INSERT INTO tbl_penyusutan_closed_cabang(cabang, fincat, bulan, tahun, refund_npv, refund_asuransi, refund_adm, ins_receivable, by_notaris, pend_asuransi, pend_survey, pend_fidusia, pend_provisi) VALUES('$cabang', '$fincat', '$bulan', '$tahun', $refund_npv, $refund_asuransi, $refund_adm, $ins_receivable, $by_notaris, $pend_asuransi, $pend_survey, $pend_fidusia, $pend_provisi)";

        mysqli_query($koneksi, $query_simpan_closed_c);
	}


	// Input data saldo awal bulan selanjutnya ......................................................
	$query_saldo_awal_c = "SELECT * FROM tbl_saldo_awal_cabang WHERE bulan='$bulan' AND tahun='$tahun' GROUP BY cabang, fincat";
	$result_saldo_awal_c = mysqli_query($koneksi, $query_saldo_awal_c) or die ('error saldo awal');
	while($row = mysqli_fetch_array($result_saldo_awal_c)){
		// Data Saldo Awal Sebelum nya
		$cabang = $row['cabang'];
		$fincat = $row['fincat'];
		$refund_npv_c = $row['refund_npv'];
        $refund_asuransi_c = $row['refund_asuransi'];
        $refund_adm_c = $row['refund_adm'];
        $ins_receivable_c = $row['ins_receivable'];
        $by_notaris_c = $row['by_notaris'];
        $pend_asuransi_c = $row['pend_asuransi'];
        $pend_survey_c = $row['pend_survey'];
        $pend_fidusia_c = $row['pend_fidusia'];
        $pend_provisi_c = $row['pend_provisi'];

		// Data penyusutan Account Active
		$q_penyusutan_active_c = "SELECT * FROM tbl_penyusutan_active_cabang WHERE cabang='$cabang' AND fincat='$fincat' AND bulan='$bulan' AND tahun='$tahun'";
		$res_penyusutan_active_c = mysqli_query($koneksi, $q_penyusutan_active_c) or die ('error penyusutan active');
		$row_penyusutan_active_c = mysqli_fetch_array($res_penyusutan_active_c);
		
		$refund_npv_active_c = $row_penyusutan_active_c['refund_npv'];
        $refund_asuransi_active_c = $row_penyusutan_active_c['refund_asuransi'];
        $refund_adm_active_c = $row_penyusutan_active_c['refund_adm'];
        $ins_receivable_active_c = $row_penyusutan_active_c['ins_receivable'];
        $by_notaris_active_c = $row_penyusutan_active_c['by_notaris'];
        $pend_asuransi_active_c = $row_penyusutan_active_c['pend_asuransi'];
        $pend_survey_active_c = $row_penyusutan_active_c['pend_survey'];
        $pend_fidusia_active_c = $row_penyusutan_active_c['pend_fidusia'];
        $pend_provisi_active_c = $row_penyusutan_active_c['pend_provisi'];

		// Data penyusutan Account Closed
		
		$q_penyusutan_closed_c = "SELECT * FROM tbl_penyusutan_closed_cabang WHERE cabang='$cabang' AND fincat='$fincat' AND bulan='$bulan' AND tahun='$tahun'";
		$res_penyusutan_closed_c = mysqli_query($koneksi, $q_penyusutan_closed_c) or die ('error penyusutan closed');
		$row_penyusutan_closed_c = mysqli_fetch_array($res_penyusutan_closed_c);
		
		$refund_npv_closed_c = $row_penyusutan_closed_c['refund_npv'];
        $refund_asuransi_closed_c = $row_penyusutan_closed_c['refund_asuransi'];
        $refund_adm_closed_c = $row_penyusutan_closed_c['refund_adm'];
        $ins_receivable_closed_c = $row_penyusutan_closed_c['ins_receivable'];
        $by_notaris_closed_c = $row_penyusutan_closed_c['by_notaris'];
        $pend_asuransi_closed_c = $row_penyusutan_closed_c['pend_asuransi'];
        $pend_survey_closed_c = $row_penyusutan_closed_c['pend_survey'];
        $pend_fidusia_closed_c = $row_penyusutan_closed_c['pend_fidusia'];
        $pend_provisi_closed_c = $row_penyusutan_closed_c['pend_provisi'];

		// Saldo Akhir Bulan Ini (Saldo Awal Bulan Selanjutnya)
		$refund_npv_akhir_c = $refund_npv_c - $refund_npv_active_c - $refund_npv_closed_c;
		$refund_asuransi_akhir_c = $refund_asuransi_c - $refund_asuransi_active_c - $refund_asuransi_closed_c;
		$refund_adm_akhir_c = $refund_adm_c - $refund_adm_active_c - $refund_adm_closed_c;
		$ins_receivable_akhir_c = $ins_receivable_c - $ins_receivable_active_c - $ins_receivable_closed_c;
		$by_notaris_akhir_c = $by_notaris_c - $by_notaris_active_c - $by_notaris_closed_c;
		$pend_asuransi_akhir_c = $pend_asuransi_c - $pend_asuransi_active_c - $pend_asuransi_closed_c;
		$pend_survey_akhir_c = $pend_survey_c - $pend_survey_active_c - $pend_survey_closed_c;
		$pend_fidusia_akhir_c = $pend_fidusia_c - $pend_fidusia_active_c - $pend_fidusia_closed_c;
		$pend_provisi_akhir_c = $pend_provisi_c - $pend_provisi_active_c - $pend_provisi_closed_c;


		// Simpan Saldo Awal Ke Bulan Depan
		$query_simpan_saldo_selanjutnya_c = "INSERT INTO tbl_saldo_awal_cabang(cabang, fincat, bulan, tahun, refund_npv, refund_asuransi, refund_adm, ins_receivable, by_notaris, pend_asuransi, pend_survey, pend_fidusia, pend_provisi) VALUES('$cabang', '$fincat', '$bulan_depan', '$tahun_depan', $refund_npv_akhir_c, $refund_asuransi_akhir_c, $refund_adm_akhir_c, $ins_receivable_akhir_c, $by_notaris_akhir_c, $pend_asuransi_akhir_c, $pend_survey_akhir_c, $pend_fidusia_akhir_c, $pend_provisi_akhir_c)";

        mysqli_query($koneksi, $query_simpan_saldo_selanjutnya_c);

	}
	// ...................................... / UPDATE BY CABANG ....................................................................


	// Update Paid Status di tbl_psak..................................................................................
	// looping data psak
    $query_psak = "SELECT * FROM tbl_psak";
    $res_psak = mysqli_query($koneksi, $query_psak) or die('error looping data');
    while($row_psak = mysqli_fetch_array($res_psak)){
        $no_pin = $row_psak['no_pin'];

		// semua data di tbl_psak_detail (berdasarkan no_pin)
        $q_detail_all = "SELECT * FROM tbl_psak_detail WHERE no_pin='$no_pin'";
		$res_detail_all = mysqli_query($koneksi, $q_detail_all) or die ('error detail all');
		$jml_detail_all = mysqli_num_rows($res_detail_all);

		// semua data di tbl_psak_detail (berdasarkan no_pin dan status_paid='paid')
        $q_detail_paid = "SELECT * FROM tbl_psak_detail WHERE no_pin='$no_pin' AND status_paid='paid'";
		$res_detail_paid = mysqli_query($koneksi, $q_detail_paid) or die ('error detail all');
		$jml_detail_paid = mysqli_num_rows($res_detail_paid);

		if($jml_detail_all == $jml_detail_paid){ //jika semua sudah paid
			// update paid_status di tbl_psak
			$q_update_paidSts = "UPDATE tbl_psak SET paid_status='Done' WHERE no_pin='$no_pin'";
			mysqli_query($koneksi, $q_update_paidSts);
		}

    }


	// Alert update berhasil........................................................................................
	echo '<script>
		alert("Status Berhasil di Update");window.location="home.php";
	</script>';

?>

</body>
</html>