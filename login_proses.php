<?php  
	
	session_start();
	include 'koneksi.php';

	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$pass = $_POST['password'];
		$password = sha1($pass);

		$query = "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'";
		$result = mysqli_query($koneksi,$query) or die ('error password');
		$data = mysqli_fetch_array($result);
		$cek = mysqli_num_rows($result);

		if($cek > 0){
			$_SESSION['login'] = $data['nama_lengkap'];
			echo '<script>
				alert("Berhasil Login");window.location="home.php";
			</script>';
		}else{
			echo '<script>
				alert("Kombinasi Username dan Password Salah");window.location="login.php";
			</script>';
		}
	}

?>