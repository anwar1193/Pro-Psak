<?php  
    include 'koneksi.php';

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

        // Update status di tbl_psak
        $query_update = "UPDATE tbl_psak SET account_sts='$status_baru' WHERE no_pin='$no_pin'";
        mysqli_query($koneksi, $query_update) or die('error update');

        // Update status di tbl_psak_detail
        $query_update_detail = "UPDATE tbl_psak_detail SET account_sts='$status_baru' WHERE no_pin='$no_pin'";
        mysqli_query($koneksi, $query_update_detail) or die('error update detail');

    }

    echo '<script>
			alert("Status Berhasil di Update");window.location="home.php";
		</script>';

?>