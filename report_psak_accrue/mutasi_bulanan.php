<?php  

    // Script Excel (Tanpa Tambahan Library Apapun) Cukup 5 Baris Ini Ajah
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");
	header("Content-type: application/x-msexcel");
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=laporan_mutasi_bulanan_accrue.xls");

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
                            SUM(accrue_restru) AS accrue_restru
                            FROM tbl_saldo_awal_accrue WHERE bulan='$bulan_mutasi_bulanan' AND tahun='$tahun_mutasi_bulanan'";
    }else{
        $q_saldoAwal = "SELECT * FROM tbl_saldo_awal_accrue WHERE fincat='$fincat_mutasi_bulanan' AND bulan='$bulan_mutasi_bulanan' AND tahun='$tahun_mutasi_bulanan'";
    }
    $res_saldoAwal = mysqli_query($koneksi, $q_saldoAwal) or die('error saldo awal');
    $row_saldoAwal = mysqli_fetch_array($res_saldoAwal);

    $total_saldoAwal = $row_saldoAwal['accrue_restru'];
    // Penutup Data Saldo Awal

    
    // Data Penyusutan
    if($fincat_mutasi_bulanan == 'INVST - INST LOAN'){
        $r_penyusutan_active = tampil_active_invst_accrue($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);
        $r_penyusutan_closed = tampil_closedreguler_invst_accrue($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);

    }elseif($fincat_mutasi_bulanan == 'MTGNA - INST LOAN'){
        $r_penyusutan_active = tampil_active_mtgna_accrue($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);
        $r_penyusutan_closed = tampil_closedreguler_mtgna_accrue($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);

    }elseif($fincat_mutasi_bulanan == 'MKRJA - MODAL USAHA'){
        $r_penyusutan_active = tampil_active_mkrja_accrue($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);
        $r_penyusutan_closed = tampil_closedreguler_mkrja_accrue($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);

    }elseif($fincat_mutasi_bulanan == 'all'){
        $r_penyusutan_active = tampil_active_all_accrue($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);
        $r_penyusutan_closed = tampil_closedreguler_all_accrue($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);
    }

    $data_penyusutan_active = mysqli_fetch_array($r_penyusutan_active);
    $data_penyusutan_closed = mysqli_fetch_array($r_penyusutan_closed);

    $kredit_accrue_restru = $data_penyusutan_active['t_accrue_restru'] + $data_penyusutan_closed['t_accrue_restru'];

    $total_kredit = $kredit_accrue_restru;
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

    <h2>LAPORAN MUTASI BULANAN PSAK ACCRUE</h2>
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
            <td>Accrue Restru</td>
            <td style="text-align:right;"><?php echo number_format($row_saldoAwal['accrue_restru'], 0, '.', ','); ?></td>
            <td style="text-align:right;">0</td>
            <td style="text-align:right;"><?php echo number_format($kredit_accrue_restru, 0, '.', ','); ?></td>
            <td style="text-align:right;"><?php echo number_format($row_saldoAwal['accrue_restru'] - $kredit_accrue_restru, 0, '.', ','); ?></td>
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