<?php  
    include 'koneksi.php';

    $q_del_1 = "DELETE FROM `tbl_accrue` WHERE id != ''";
    $q_del_2 = "DELETE FROM `tbl_accrue_detail` WHERE id != ''";
    $q_del_3 = "DELETE FROM `tbl_nopin_accrue` WHERE id != ''";
    $q_del_4 = "DELETE FROM `tbl_payment_accrue` WHERE id != ''";
    $q_del_5 = "DELETE FROM `tbl_penyusutan_active_accrue` WHERE id != ''";
    $q_del_6 = "DELETE FROM `tbl_penyusutan_active_cabang_accrue` WHERE id != ''";
    $q_del_7 = "DELETE FROM `tbl_penyusutan_closed_accrue` WHERE id != ''";
    $q_del_8 = "DELETE FROM `tbl_penyusutan_closed_cabang_accrue` WHERE id != ''";
    $q_del_9 = "DELETE FROM `tbl_saldo_awal_accrue` WHERE id != ''";
    $q_del_10 = "DELETE FROM `tbl_saldo_awal_cabang_accrue` WHERE id != ''";

    mysqli_query($koneksi, $q_del_1) or die ('error fungsi 1');
    mysqli_query($koneksi, $q_del_2) or die ('error fungsi 2');
    mysqli_query($koneksi, $q_del_3) or die ('error fungsi 3');
    mysqli_query($koneksi, $q_del_4) or die ('error fungsi 4');
    mysqli_query($koneksi, $q_del_5) or die ('error fungsi 5');
    mysqli_query($koneksi, $q_del_6) or die ('error fungsi 6');
    mysqli_query($koneksi, $q_del_7) or die ('error fungsi 7');
    mysqli_query($koneksi, $q_del_8) or die ('error fungsi 8');
    mysqli_query($koneksi, $q_del_9) or die ('error fungsi 9');
    mysqli_query($koneksi, $q_del_10) or die ('error fungsi 10');

    header('location:data_feeding_accrue.php');
?>