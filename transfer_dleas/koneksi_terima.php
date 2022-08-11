<?php

	$host = 'localhost';
	$user = 'root';
	$pass = 'Profi@123';
	$db = 'db_psak';
	
	$koneksi = mysqli_connect($host,$user,$pass,$db) or die (mysqli_error($koneksi));

?>