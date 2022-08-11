<!-- Server 35 -->

<?php

// koneksi ke mysql
include '../koneksi_terima.php';

// membaca ketiga data dari parameter CURL
	$data1 = $_POST['data1'];
	$data2 = $_POST['data2'];
	$data3 = $_POST['data3'];
	$data4 = $_POST['data4'];
	$data5 = $_POST['data5'];
	
	$query_insert = "INSERT INTO tbl_payment_accrue (no_pin, account_name, paidtxndate, periode, tanggal_tarik_data) 
			VALUES ('$data1', '$data2', '$data3', '$data4', '$data5')";
			
	mysqli_query($koneksi,$query_insert); //Jalankan Insert Data

?>
