<?php

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'db_psak';
	
	$koneksi = mysqli_connect($host,$user,$pass,$db) or die (mysqli_error($koneksi));

?>