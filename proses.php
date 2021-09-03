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
        $restru_date = $sheetData[$i]['7'];
        $booking_date = $sheetData[$i]['8'];
        $sisa_tenor = $sheetData[$i]['9'];
        $tgl_jatuh_tempo = $sheetData[$i]['10'];
        $fincat = $sheetData[$i]['11'];
        $refund_npv = $sheetData[$i]['12'];
        $refund_asuransi = $sheetData[$i]['13'];
        $refund_adm = $sheetData[$i]['14'];
        $ins_receivable = $sheetData[$i]['15'];
        $by_notaris = $sheetData[$i]['16'];
        $pend_asuransi = $sheetData[$i]['17'];
        $pend_survey = $sheetData[$i]['18'];
        $pend_fidusia = $sheetData[$i]['19'];
        $pend_provisi = $sheetData[$i]['20'];
        $tanggal_upload = date('Y-m-d');
        $status_generate = 'belum';

        // Cek Apakah Ada Data Yang Sama
        $query_cek = "SELECT * FROM tbl_psak WHERE no_pin='$no_pin'";
        $result_cek = mysqli_query($koneksi, $query_cek) or die('error cek');
        $cek = mysqli_num_rows($result_cek);

        if($cek > 0){ // jika ada nopin yang sudah ada sebelumnya
            $query_batal = "DELETE FROM tbl_psak WHERE status_generate = 'belum'";
            mysqli_query($koneksi, $query_batal);
            
            echo '<script>
                alert("Terdapat Data/Nopin yang sudah ada di sistem, harap periksa kembali inputan anda");window.location="home.php";
            </script>';
            exit;
        }else{
            mysqli_query($koneksi, "insert into tbl_psak(no_pin, no_rek, account_sts, kode_cabang, cabang, account_name, restru_date, booking_date, sisa_tenor, tgl_jatuh_tempo, fincat, refund_npv, refund_asuransi, refund_adm, ins_receivable, by_notaris, pend_asuransi, pend_survey, pend_fidusia, pend_provisi, tanggal_upload, status_generate) 
            values ('$no_pin','$no_rek','$account_sts', '$kode_cabang', '$cabang', '$account_name', '$restru_date', '$booking_date', $sisa_tenor, '$tgl_jatuh_tempo', '$fincat', $refund_npv, $refund_asuransi, $refund_adm, $ins_receivable, $by_notaris, $pend_asuransi, $pend_survey, $pend_fidusia, $pend_provisi, '$tanggal_upload', '$status_generate')");
        }

        
    }
    
    echo '<script>
        alert("Data Berhasil Diupload");window.location="generate_psak.php";
    </script>';

}
?>