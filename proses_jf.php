<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading Page</title>
    <style>

        *{
            margin: 0;
            padding: 0;
        }

        .loading{
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.1);
            text-align: center;
            display: grid;
        }

        .loading img{
            position: relative;
            margin: 0 auto;
            top: -100px;
        }

        .loading span{
            margin-top: 100px;
            font-size: 2.5em;
            text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.4);
        }


    </style>
</head>
<body>
    
    <div class="loading">
        <span>Sedang Di Proses..</span>
        <img src="img/loading.gif" alt="">
    </div>

<?php
include('koneksi.php');
require 'vendor/autoload.php';
error_reporting(0);
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
 
$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

if(isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {
 
    $arr_file = explode('.', $_FILES['berkas_excel']['name']);
    $extension = end($arr_file);
 
    if('csv' == $extension) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }
 
    $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
     
    $sheetData = $spreadsheet->getActiveSheet()->toArray();
	for($i = 1;$i < count($sheetData);$i++)
	{
        $no_pin = $sheetData[$i]['1'];
        $no_rek = $sheetData[$i]['2'];
        $account_sts = $sheetData[$i]['3'];
        $kode_cabang = $sheetData[$i]['4'];
        $cabang = $sheetData[$i]['5'];
        $account_name = $sheetData[$i]['6'];

        $restru_date0 = $sheetData[$i]['7'];
        $restru_date = date('Y-m-d', strtotime($restru_date0));

        $booking_date0 = $sheetData[$i]['8'];
        $booking_date = date('Y-m-d', strtotime($booking_date0));

        $sisa_tenor = $sheetData[$i]['9'];
        $tgl_jatuh_tempo = $sheetData[$i]['10'];
        $fincat = $sheetData[$i]['11'];
        $provisi_jf = $sheetData[$i]['12'];
        $tanggal_upload = date('Y-m-d');
        $status_generate = 'belum';

        // Cek Apakah Ada Data Yang Sama
        $query_cek = "SELECT * FROM tbl_jf WHERE no_pin='$no_pin'";
        $result_cek = mysqli_query($koneksi, $query_cek) or die('error cek');
        $cek = mysqli_num_rows($result_cek);

        if($cek > 0){ // jika ada nopin yang sudah ada sebelumnya
            $query_batal = "DELETE FROM tbl_jf WHERE status_generate = 'belum'";
            mysqli_query($koneksi, $query_batal);
            
            echo '<script>
                alert("Terdapat Data/Nopin yang sudah ada di sistem, harap periksa kembali inputan anda");window.location="home.php";
            </script>';
            exit;
        }else{
            mysqli_query($koneksi, "insert into tbl_jf(no_pin, no_rek, account_sts, bank_awal, kode_cabang, cabang, account_name, restru_date, booking_date, sisa_tenor, tgl_jatuh_tempo, fincat, provisi_jf, tanggal_upload, status_generate) 
            values ('$no_pin','$no_rek','$account_sts','$account_sts', '$kode_cabang', '$cabang', '$account_name', '$restru_date', '$booking_date', $sisa_tenor, '$tgl_jatuh_tempo', '$fincat', $provisi_jf, '$tanggal_upload', '$status_generate')");
        }

        
    }
    
    echo '<script>
        alert("Data Berhasil Diupload");window.location="generate_jf.php";
    </script>';

}
?>


</body>
</html>