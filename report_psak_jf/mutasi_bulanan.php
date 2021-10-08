<?php  

    // Script Excel (Tanpa Tambahan Library Apapun) Cukup 5 Baris Ini Ajah
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");
	header("Content-type: application/x-msexcel");
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=laporan_mutasi_bulanan_jf.xls");

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
                            SUM(provisi_jf) AS provisi_jf
                            FROM tbl_saldo_awal_jf WHERE bulan='$bulan_mutasi_bulanan' AND tahun='$tahun_mutasi_bulanan'";
    }else{
        $q_saldoAwal = "SELECT * FROM tbl_saldo_awal_jf WHERE fincat='$fincat_mutasi_bulanan' AND bulan='$bulan_mutasi_bulanan' AND tahun='$tahun_mutasi_bulanan'";
    }
    $res_saldoAwal = mysqli_query($koneksi, $q_saldoAwal) or die('error saldo awal');
    $row_saldoAwal = mysqli_fetch_array($res_saldoAwal);

    $total_saldoAwal = $row_saldoAwal['provisi_jf'];
    // Penutup Data Saldo Awal

    
    // Data Penyusutan
    if($fincat_mutasi_bulanan == 'INVST - INST LOAN'){
        $r_penyusutan_active = tampil_active_invst_jf($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);
        $r_penyusutan_closed = tampil_closedreguler_invst_jf($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);

    }elseif($fincat_mutasi_bulanan == 'MTGNA - INST LOAN'){
        $r_penyusutan_active = tampil_active_mtgna_jf($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);
        $r_penyusutan_closed = tampil_closedreguler_mtgna_jf($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);

    }elseif($fincat_mutasi_bulanan == 'MKRJA - MODAL USAHA'){
        $r_penyusutan_active = tampil_active_mkrja_jf($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);
        $r_penyusutan_closed = tampil_closedreguler_mkrja_jf($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);

    }elseif($fincat_mutasi_bulanan == 'all'){
        $r_penyusutan_active = tampil_active_all_jf($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);
        $r_penyusutan_closed = tampil_closedreguler_all_jf($bulan_mutasi_bulanan,$tahun_mutasi_bulanan);
    }

    $data_penyusutan_active = mysqli_fetch_array($r_penyusutan_active);
    $data_penyusutan_closed = mysqli_fetch_array($r_penyusutan_closed);

    $kredit_provisi_jf = $data_penyusutan_active['t_provisi_jf'] + $data_penyusutan_closed['t_provisi_jf'];

    $total_kredit = $kredit_provisi_jf;
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
            <td>Provisi JF</td>
            <td style="text-align:right;"><?php echo number_format($row_saldoAwal['provisi_jf'], 0, '.', ','); ?></td>
            <td style="text-align:right;">0</td>
            <td style="text-align:right;"><?php echo number_format($kredit_provisi_jf, 0, '.', ','); ?></td>
            <td style="text-align:right;"><?php echo number_format($row_saldoAwal['provisi_jf'] - $kredit_provisi_jf, 0, '.', ','); ?></td>
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