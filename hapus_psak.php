<?php 

	include 'koneksi.php';
	include 'fungsi.php';

	if(isset($_GET['no_pin'])){
		if(hapus_psak($_GET['no_pin'])){
			echo '<script>
				alert("Data PSAK Berhasil Dihapus");window.location="data_feeding.php";
			</script>';
		}
	}

?>