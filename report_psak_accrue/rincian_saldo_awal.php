<?php  

    // Script Excel (Tanpa Tambahan Library Apapun) Cukup 5 Baris Ini Ajah
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");
	header("Content-type: application/x-msexcel");
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=laporan_rincian_saldo_awal_accrue.xls");

    require_once('../koneksi.php');
    $fincat_saldo_awal = $_POST['fincat_saldo_awal'];
    $bulan_saldo_awal = $_POST['bulan_saldo_awal'];
    $tahun_saldo_awal = $_POST['tahun_saldo_awal'];

    switch($bulan_saldo_awal){
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Saldo Awal</title>

    <style>
        .str{ mso-number-format:\@; }
    </style>

</head>
<body>

    <h2>LAPORAN RINCIAN SALDO AWAL PSAK ACCRUE</h2>
    <P>Periode Upload : <?php echo $nama_bulan.' - '.$tahun_saldo_awal; ?></P>

    <table border="1" cellspacing="0" cellpadding="5px">
        <tr style="background-color:orange">
            <th colspan="8">
                Finance Category - <?php echo $fincat_saldo_awal; ?>
            </th>

            <th>
                SALDO AWAL
            </th>
        </tr>

        <tr style="background-color: #ddd;">
            <th>NO</th>
            <th>NoPin</th>
            <th>NoRek</th>
            <th>AccountSts</th>
            <th>Status Penyusutan</th>
            <th>Kode Cabang</th>
            <th>Cabang</th>
            <th>AccountName</th>
            <th>Accrue Restru</th>
        </tr>

        <?php  
            $no=0;
            if($fincat_saldo_awal=='all'){
                $query = "SELECT * FROM tbl_accrue WHERE MONTH(tanggal_upload)='$bulan_saldo_awal' AND YEAR(tanggal_upload)='$tahun_saldo_awal'";

                $query_total = "SELECT 
                                    SUM(accrue_restru) AS t_accrue_restru
                                FROM tbl_accrue
                                WHERE MONTH(tanggal_upload)='$bulan_saldo_awal' AND YEAR(tanggal_upload)='$tahun_saldo_awal'
                                ";

            }else{
                $query = "SELECT * FROM tbl_accrue WHERE MONTH(tanggal_upload)='$bulan_saldo_awal' AND YEAR(tanggal_upload)='$tahun_saldo_awal' AND fincat='$fincat_saldo_awal'";

                $query_total = "SELECT 
                                    SUM(accrue_restru) AS t_accrue_restru
                                FROM tbl_accrue
                                WHERE MONTH(tanggal_upload)='$bulan_saldo_awal' AND YEAR(tanggal_upload)='$tahun_saldo_awal' AND fincat='$fincat_saldo_awal'
                                ";
            }
            
            $result = mysqli_query($koneksi, $query) or die ('error fungsi laporan');
            $result_total = mysqli_query($koneksi, $query_total) or die (mysqli_error($koneksi));
            $row_total = mysqli_fetch_array($result_total);

            while($row = mysqli_fetch_array($result)){
                $no++;
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td class="str"><?php echo $row['no_pin']; ?></td>
            <td class="str"><?php echo $row['no_rek'] ?></td>
            <td><?php echo $row['account_sts']; ?></td>

            <!-- Status Penyusutan -->
            <?php if($row['paid_status'] == 'Done'){ ?>
                <td style="text-align:center"><?php echo $row['paid_status'] ?></td>
            <?php }else{ ?>
                <td style="text-align:center">Amortize</td>
            <?php } ?>

            <td style="text-align:center;mso-number-format:\@;"><?php echo $row['kode_cabang']; ?></td>
            <td><?php echo $row['cabang']; ?></td>
            <td><?php echo $row['account_name']; ?></td>
            <td style="text-align:right"><?php echo number_format($row['accrue_restru'], 0, '.', ','); ?></td>

        </tr>
        <?php } ?>

        <tr style="background-color: greenyellow; font-weight: bold;">
            <td style="text-align: center;" colspan="8">TOTAL</td>
            <td style="text-align:right"><?php echo number_format($row_total['t_accrue_restru'], 0, '.', ','); ?></td>
        </tr>
    </table>

</body>
</html>