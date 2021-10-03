<?php  

    // Script Excel (Tanpa Tambahan Library Apapun) Cukup 5 Baris Ini Ajah
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");
	header("Content-type: application/x-msexcel");
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=laporan_mutasi_bulanan.xls");

    require_once('../koneksi.php');
    require_once('../fungsi.php');
    $fincat_mutasi_bulanan = $_POST['fincat_mutasi_bulanan'];
    $bulan_mutasi_bulanan = $_POST['bulan_mutasi_bulanan'];
    $tahun_mutasi_bulanan = $_POST['tahun_mutasi_bulanan'];

    switch($bulan_mutasi_bulanan){
        case 1 : $nama_bulan="Januari"; break;
        case 2 : $nama_bulan="Februari"; break;
        case 3 : $nama_bulan="Maret"; break;
        case 4 : $nama_bulan="April"; break;
        case 5 : $nama_bulan="Mei"; break;
        case 6 : $nama_bulan="Juni"; break;
        case 7 : $nama_bulan="Juli"; break;
        case 8 : $nama_bulan="Agustus"; break;
        case 9 : $nama_bulan="September"; break;
        case 10 : $nama_bulan="Oktober"; break;
        case 11 : $nama_bulan="November"; break;
        case 12 : $nama_bulan="Desember"; break;
        default : $nama_bulan="Bulan Tidak Teridentifikasi";
    }

    // Data Saldo Awal
    if($fincat_mutasi_bulanan=='all'){
        $q_saldoAwal = "SELECT      
                            SUM(refund_npv) AS refund_npv,
                            SUM(refund_asuransi) AS refund_asuransi,
                            SUM(refund_adm) AS refund_adm,
                            SUM(ins_receivable) AS ins_receivable,
                            SUM(by_notaris) AS by_notaris,
                            SUM(pend_asuransi) AS pend_asuransi,
                            SUM(pend_survey) AS pend_survey,
                            SUM(pend_fidusia) AS pend_fidusia
                            FROM tbl_saldo_awal WHERE bulan='$bulan_mutasi_bulanan' AND tahun='$tahun_mutasi_bulanan'";
    }else{
        $q_saldoAwal = "SELECT * FROM tbl_saldo_awal WHERE fincat='$fincat_mutasi_bulanan' AND bulan='$bulan_mutasi_bulanan' AND tahun='$tahun_mutasi_bulanan'";
    }
    $res_saldoAwal = mysqli_query($koneksi, $q_saldoAwal) or die('error saldo awal');
    $row_saldoAwal = mysqli_fetch_array($res_saldoAwal);

    $total_saldoAwal = $row_saldoAwal['refund_npv'] + $row_saldoAwal['refund_asuransi'] + $row_saldoAwal['refund_adm'] + $row_saldoAwal['ins_receivable'] + $row_saldoAwal['by_notaris'] + $row_saldoAwal['pend_asuransi'] + $row_saldoAwal['pend_survey'] + $row_saldoAwal['pend_fidusia'];
    // Penutup Data Saldo Awal

    
    // Data Penyusutan
    if($fincat_mutasi_bulanan == 'INVST - INST LOAN'){
        $r_penyusutan_active = tampil_active_invst($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);
        $r_penyusutan_closed = tampil_closedreguler_invst($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);

    }elseif($fincat_mutasi_bulanan == 'MTGNA - INST LOAN'){
        $r_penyusutan_active = tampil_active_mtgna($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);
        $r_penyusutan_closed = tampil_closedreguler_mtgna($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);

    }elseif($fincat_mutasi_bulanan == 'MKRJA - MODAL USAHA'){
        $r_penyusutan_active = tampil_active_mkrja($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);
        $r_penyusutan_closed = tampil_closedreguler_mkrja($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);

    }elseif($fincat_mutasi_bulanan == 'all'){
        $r_penyusutan_active = tampil_active_all($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);
        $r_penyusutan_closed = tampil_closedreguler_all($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);
    }

    $data_penyusutan_active = mysqli_fetch_array($r_penyusutan_active);
    $data_penyusutan_closed = mysqli_fetch_array($r_penyusutan_closed);

    $kredit_refund_npv = $data_penyusutan_active['t_refund_npv'] + $data_penyusutan_closed['t_refund_npv'];
    $kredit_refund_asuransi = $data_penyusutan_active['t_refund_asuransi'] + $data_penyusutan_closed['t_refund_asuransi'];
    $kredit_refund_adm = $data_penyusutan_active['t_refund_adm'] + $data_penyusutan_closed['t_refund_adm'];
    $kredit_ins_receivable = $data_penyusutan_active['t_ins_receivable'] + $data_penyusutan_closed['t_ins_receivable'];
    $kredit_by_notaris = $data_penyusutan_active['t_by_notaris'] + $data_penyusutan_closed['t_by_notaris'];
    $kredit_pend_asuransi = $data_penyusutan_active['t_pend_asuransi'] + $data_penyusutan_closed['t_pend_asuransi'];
    $kredit_pend_survey = $data_penyusutan_active['t_pend_survey'] + $data_penyusutan_closed['t_pend_survey'];
    $kredit_pend_fidusia = $data_penyusutan_active['t_pend_fidusia'] + $data_penyusutan_closed['t_pend_fidusia'];

    $total_kredit = $kredit_refund_npv + $kredit_refund_asuransi + $kredit_refund_adm + $kredit_ins_receivable + $kredit_by_notaris + $kredit_pend_asuransi + $kredit_pend_survey + $kredit_pend_fidusia;
    // Penutup Data Penyusutan

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mutasi Bulanan</title>
    <style>
        tr:nth-child(even){
            background-color: #eee;
        }
    </style>
</head>
<body>

    <h2>LAPORAN MUTASI BULANAN</h2>
    <p>Periode : <?php echo $nama_bulan.' - '.$tahun_mutasi_bulanan; ?></p>
    <p>Fincat : <?php echo $fincat_mutasi_bulanan; ?></p>

    <table border="1" cellspacing="0" cellpadding="5px">
        <tr style="background-color: green; color: white;">
            <th>NO</th>
            <th>COA No.</th>
            <th>COA Name</th>
            <th>Saldo Awal</th>
            <th>Debet</th>
            <th>Kredit</th>
            <th>Saldo Akhir</th>
        </tr>

        <tr>
            <td>1</td>
            <td>140-003-003</td>
            <td>Refund NPV</td>
            <td style="text-align:right;"><?php echo number_format($row_saldoAwal['refund_npv'], 0, '.', ','); ?></td>
            <td style="text-align:right;">0</td>
            <td style="text-align:right;"><?php echo number_format($kredit_refund_npv, 0, '.', ','); ?></td>
            <td style="text-align:right;"><?php echo number_format($row_saldoAwal['refund_npv'] - $kredit_refund_npv, 0, '.', ','); ?></td>
        </tr>

        <tr>
            <td>2</td>
            <td>140-003-002</td>
            <td>Refund Asuransi</td>
            <td style="text-align:right;"><?php echo number_format($row_saldoAwal['refund_asuransi'], 0, '.', ','); ?></td>
            <td style="text-align:right;">0</td>
            <td style="text-align:right;"><?php echo number_format($kredit_refund_asuransi, 0, '.', ','); ?></td>
            <td style="text-align:right;"><?php echo number_format($row_saldoAwal['refund_asuransi'] - $kredit_refund_asuransi, 0, '.', ','); ?></td>
        </tr>

        <tr>
            <td>3</td>
            <td>140-003-001</td>
            <td>Refund ADM</td>
            <td style="text-align:right;"><?php echo number_format($row_saldoAwal['refund_adm'], 0, '.', ','); ?></td>
            <td style="text-align:right;">0</td>
            <td style="text-align:right;"><?php echo number_format($kredit_refund_adm, 0, '.', ','); ?></td>
            <td style="text-align:right;"><?php echo number_format($row_saldoAwal['refund_adm'] - $kredit_refund_adm, 0, '.', ','); ?></td>
        </tr>

        <tr>
            <td>4</td>
            <td>140-003-004</td>
            <td>Ins Receivable</td>
            <td style="text-align:right;"><?php echo number_format($row_saldoAwal['ins_receivable'], 0, '.', ','); ?></td>
            <td style="text-align:right;">0</td>
            <td style="text-align:right;"><?php echo number_format($kredit_ins_receivable, 0, '.', ','); ?></td>
            <td style="text-align:right;"><?php echo number_format($row_saldoAwal['ins_receivable'] - $kredit_ins_receivable, 0, '.', ','); ?></td>
        </tr>

        <tr>
            <td>5</td>
            <td>140-003-006</td>
            <td>By Notaris</td>
            <td style="text-align:right;"><?php echo number_format($row_saldoAwal['by_notaris'], 0, '.', ','); ?></td>
            <td style="text-align:right;">0</td>
            <td style="text-align:right;"><?php echo number_format($kredit_by_notaris, 0, '.', ','); ?></td>
            <td style="text-align:right;"><?php echo number_format($row_saldoAwal['by_notaris'] - $kredit_by_notaris, 0, '.', ','); ?></td>
        </tr>

        <tr>
            <td>6</td>
            <td>140-002-002</td>
            <td>Pend Asuransi</td>
            <td style="text-align:right;"><?php echo number_format($row_saldoAwal['pend_asuransi'], 0, '.', ','); ?></td>
            <td style="text-align:right;">0</td>
            <td style="text-align:right;"><?php echo number_format($kredit_pend_asuransi, 0, '.', ','); ?></td>
            <td style="text-align:right;"><?php echo number_format($row_saldoAwal['pend_asuransi'] - $kredit_pend_asuransi, 0, '.', ','); ?></td>
        </tr>


        <tr>
            <td>7</td>
            <td>140-002-004</td>
            <td>Pend Survey</td>
            <td style="text-align:right;"><?php echo number_format($row_saldoAwal['pend_survey'], 0, '.', ','); ?></td>
            <td style="text-align:right;">0</td>
            <td style="text-align:right;"><?php echo number_format($kredit_pend_survey, 0, '.', ','); ?></td>
            <td style="text-align:right;"><?php echo number_format($row_saldoAwal['pend_survey']- $kredit_pend_survey, 0, '.', ','); ?></td>
        </tr>

        <tr>
            <td>8</td>
            <td>140-002-003</td>
            <td>Pend Fidusia</td>
            <td style="text-align:right;"><?php echo number_format($row_saldoAwal['pend_fidusia'], 0, '.', ','); ?></td>
            <td style="text-align:right;">0</td>
            <td style="text-align:right;"><?php echo number_format($kredit_pend_fidusia, 0, '.', ','); ?></td>
            <td style="text-align:right;"><?php echo number_format($row_saldoAwal['pend_fidusia'] - $kredit_pend_fidusia, 0, '.', ','); ?></td>
        </tr>


        <tr style="background-color: green; color: white;">
            <td colspan="3">TOTAL</td>
            <td style="text-align:right;"><?php echo number_format($total_saldoAwal, 0, '.', ','); ?></td>
            <td style="text-align:right;">0</td>
            <td style="text-align:right;"><?php echo number_format($total_kredit, 0, '.', ','); ?></td>
            <td style="text-align:right;"><?php echo number_format($total_saldoAwal - $total_kredit, 0, '.', ','); ?></td>
        </tr>
    </table>

</body>
</html>