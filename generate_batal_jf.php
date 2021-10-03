<?php  

    require_once('koneksi.php');
    $query_batal = "DELETE FROM tbl_jf WHERE status_generate = 'belum'";
    mysqli_query($koneksi, $query_batal);

    echo '<script>
        alert("Proses Generate Data Awal Di Batalkan");window.location="home.php";
    </script>';

?>