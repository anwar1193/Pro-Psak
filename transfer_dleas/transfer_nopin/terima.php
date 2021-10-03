<!-- Server 35 -->

<?php

// koneksi ke mysql
include '../koneksi_terima.php';

// membaca ketiga data dari parameter CURL
	$data1 = $_POST['data1'];
	$data2 = $_POST['data2'];
	$data3 = $_POST['data3'];
	
	$query_insert = "INSERT INTO tbl_nopin (no_pin, account_status, app_date) 
			VALUES ('$data1', '$data2', '$data3')";
			
	mysqli_query($koneksi,$query_insert); //Jalankan Insert Data

/**

$query = "SELECT * FROM tbl_cr WHERE ACCOUNTNO = $data1";
$result = mysqli_query($koneksi,$query) or die ('error fungsi');
$cek = mysqli_num_rows($result);

if($cek>0){
		
}else{
		// query insert data ke mysql
		$query = "INSERT INTO tbl_cr (ACCOUNTNO, BranchName, PokokPinjaman, BOOKINGDATE) 
			VALUES ('$data1', '$data2', '$data3', '$data4')";
		mysqli_query($koneksi,$query) or die ('errors fungsi');
}

**/

?>
