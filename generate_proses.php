<?php  
	
	include 'koneksi.php';
	include 'fungsi.php';

	$res_gen = tampil_psak_gen();
	while($row = mysqli_fetch_array($res_gen)){

		$sisa_tenor = $row['sisa_tenor'];
		$no_pin = $row['no_pin'];
		$account_sts = $row['account_sts'];
		$kode_cabang = $row['kode_cabang'];
		$cabang = $row['cabang'];
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

		$ang_refund_npv = $refund_npv/$sisa_tenor;
		$ang_refund_asuransi = $refund_asuransi/$sisa_tenor;
		$ang_refund_adm = $refund_adm/$sisa_tenor;
		$ang_ins_receivable = $ins_receivable/$sisa_tenor;
		$ang_by_notaris = $by_notaris/$sisa_tenor;
		$ang_pend_asuransi = $pend_asuransi/$sisa_tenor;
		$ang_pend_survey = $pend_survey/$sisa_tenor;
		$ang_pend_fidusia = $pend_fidusia/$sisa_tenor;
		$ang_pend_provisi = $pend_provisi/$sisa_tenor;

		$status_paid = 'belum';

		$bulan = date('m')-1;
		$tahun = date('Y');

		// Generate dan Simpan Angsuran
		for($i = 1;$i <= $sisa_tenor;$i++)
		{	
			$bulan+=1;

			$query = "INSERT INTO tbl_psak_detail(no_pin, account_sts, kode_cabang, cabang, fincat, bulan, tahun, refund_npv, refund_asuransi, refund_adm, ins_receivable, by_notaris, pend_asuransi, pend_survey, pend_fidusia, pend_provisi, status_paid) 
				VALUES('$no_pin', '$account_sts', '$kode_cabang', '$cabang', '$fincat', '$bulan', $tahun, $ang_refund_npv, $ang_refund_asuransi, $ang_refund_adm, $ang_ins_receivable, $ang_by_notaris, $ang_pend_asuransi, $ang_pend_survey, $ang_pend_fidusia, $ang_pend_provisi, '$status_paid')";

			mysqli_query($koneksi,$query);
			
		}

		// Update Status Generate PSAK Jadi generated
		$q_updateSts = "UPDATE tbl_psak SET status_generate='generated' WHERE no_pin='$no_pin'";
		mysqli_query($koneksi,$q_updateSts);

	}

	// Lanjut ke generate waktu
	echo '<script>
		window.location="generate_waktu.php";
	</script>';

?>