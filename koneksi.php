<?php 
	$host       = "localhost";
	$user       = "root";
	$password   = "Profi@123";
	$database   = "db_psak";
	$koneksi    = mysqli_connect($host, $user, $password, $database) or die (mysqli_error($koneksi));
?>