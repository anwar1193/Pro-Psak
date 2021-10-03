<?php
include('koneksi.php');
require 'vendor/autoload.php';
error_reporting(0);

// Hapus data nopin sebelumnya
$query_hapus = "DELETE FROM tbl_nopin";
mysqli_query($koneksi,$query_hapus);
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
 
$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

if(isset($_FILES['berkas_status']['name']) && in_array($_FILES['berkas_status']['type'], $file_mimes)) {
 
    $arr_file = explode('.', $_FILES['berkas_status']['name']);
    $extension = end($arr_file);
 
    if('csv' == $extension) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }
 
    $spreadsheet = $reader->load($_FILES['berkas_status']['tmp_name']);
     
    $sheetData = $spreadsheet->getActiveSheet()->toArray();
	for($i = 1;$i < count($sheetData);$i++)
	{
        $no_pin = $sheetData[$i]['1'];
        $account_sts = $sheetData[$i]['2'];
        $app_date = date('d/m/Y', strtotime($sheetData[$i]['3']));

        mysqli_query($koneksi, "UPDATE tbl_psak SET account_sts='$account_sts' WHERE no_pin=$no_pin");

        // masukkan data ke tbl_nopin
        $q_simpan = "INSERT INTO tbl_nopin(no_pin, account_status, app_date) VALUES('$no_pin', '$account_sts', '$app_date')";
        mysqli_query($koneksi, $q_simpan) or die ((mysqli_error($koneksi)));
    }
    
    echo '<script>
        alert("Account Status Berhasil Diupdate");window.location="data_feeding.php";
    </script>';

}
?>