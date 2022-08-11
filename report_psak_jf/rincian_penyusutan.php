<?php  

    // Script Excel (Tanpa Tambahan Library Apapun) Cukup 5 Baris Ini Ajah
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");
	header("Content-type: application/x-msexcel");
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=laporan_rincian_penyusutanJF.xls");

    require_once('../koneksi.php');
    $fincat_psak = $_POST['fincat_psak'];
    $bulan_psak = $_POST['bulan_psak'];
    $tahun_psak = $_POST['tahun_psak'];

    switch($bulan_psak){
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
    <title>Data Penyusutan</title>

    <style>
        .str{ mso-number-format:\@; }
    </style>
</head>
<body>

    <h2>LAPORAN RINCIAN PENYUSUTAN JF</h2>
    <P>Periode : <?php echo $nama_bulan.' - '.$tahun_psak; ?></P>

    <table border="1" cellspacing="0" cellpadding="5px">
        <tr style="background-color:orange">
            <th colspan="7">
                Finance Category - <?php echo $fincat_psak; ?>
            </th>

            <th>
                PENYUSUTAN JF BULAN BERJALAN
            </th>
        </tr>

        <tr style="background-color: #ddd;">
            <th>NO</th>
            <th>NoPin</th>
            <th>NoRek</th>
            <th>AccountSts</th>
            <th>Kode Cabang</th>
            <th>Cabang</th>
            <th>AccountName</th>
            <th>Provisi JF</th>
        </tr>

        <?php  
            $no=0;

            $provisi_jf_active = 0;

            $provisi_jf_closed = 0;
            

            if($fincat_psak=='all'){
                $query = "SELECT * FROM tbl_jf_detail WHERE bulan='$bulan_psak' AND tahun='$tahun_psak' AND (status_paid='paid' OR status_paid='closed')";
            }else{
                $query = "SELECT * FROM tbl_jf_detail WHERE fincat='$fincat_psak' AND bulan='$bulan_psak' AND tahun='$tahun_psak' AND (status_paid='paid' OR status_paid='closed')";
            }
            
            $result = mysqli_query($koneksi, $query) or die ('error fungsi laporan');

            while($row = mysqli_fetch_array($result)){
                $no++;
                $no_pin = $row['no_pin'];
                $acc_status = $row['account_sts'];

                // Tampilkan Data Lainnya
                $query_lainnya = "SELECT * FROM tbl_jf WHERE no_pin = '$no_pin'";
                $result_lainnya = mysqli_query($koneksi, $query_lainnya) or die ('error lainnya');
                $row_lainnya = mysqli_fetch_array($result_lainnya);

                // Tampilkan keseluruhan nilai untuk yang close
                $query_close = "SELECT 
                                    SUM(provisi_jf) AS t_provisi_jf
                                FROM tbl_jf_detail WHERE no_pin='$no_pin' AND status_paid='closed'";
                $result_close = mysqli_query($koneksi, $query_close) or die ('error close');
                $row_close = mysqli_fetch_array($result_close);


                // Tampilkan keseluruhan nilai untuk yang active
                $query_active = "SELECT 
                                    SUM(provisi_jf) AS t_provisi_jf
                                FROM tbl_jf_detail WHERE no_pin='$no_pin' AND status_paid='paid' AND bulan='$bulan_psak' AND tahun='$tahun_psak'";
                $result_active = mysqli_query($koneksi, $query_active) or die ('error close');
                $row_active = mysqli_fetch_array($result_active);


                // TOTAL ACTIVE & TOTAL CLOSED
                $provisi_jf_active += $row_active['t_provisi_jf'];

                $provisi_jf_closed += $row_close['t_provisi_jf'];

        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td class="str"><?php echo $row['no_pin']; ?></td>
            <td class="str"><?php echo $row_lainnya['no_rek'] ?></td>
            <td><?php echo $row['account_sts']; ?></td>

            <td class="str"><?php echo $row['kode_cabang']; ?></td>
            <td><?php echo $row['cabang']; ?></td>
            <td><?php echo $row_lainnya['account_name']; ?></td>

            <?php if($acc_status != 'SELF FINANCE'){ ?>
                <td style="text-align:right"><?php echo number_format($row_active['t_provisi_jf'], 0, '.', ','); ?></td>
            <?php }else{ ?>
                <td style="text-align:right"><?php echo number_format($row_close['t_provisi_jf'], 0, '.', ','); ?></td>
            <?php } ?>

        </tr>
        <?php } ?>

        <tr style="background-color: greenyellow; font-weight: bold;">
            <td style="text-align: center;" colspan="7">TOTAL</td>
            <td style="text-align:right"><?php echo number_format($provisi_jf_active+$provisi_jf_closed, 0, '.', ','); ?></td>
        </tr>
    </table>

</body>
</html>