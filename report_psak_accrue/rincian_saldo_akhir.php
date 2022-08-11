<?php  

    // Script Excel (Tanpa Tambahan Library Apapun) Cukup 5 Baris Ini Ajah
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");
	header("Content-type: application/x-msexcel");
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=laporan_rincian_saldo_akhir_accrue.xls");

    require_once('../koneksi.php');
    $fincat_saldo_akhir = $_POST['fincat_saldo_akhir'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Saldo Akhir</title>

    <style>
        .str{ mso-number-format:\@; }
    </style>

</head>
<body>

    <h2>LAPORAN RINCIAN SALDO AKHIR PSAK ACCRUE</h2>

    <table border="1" cellspacing="0" cellpadding="5px">
        <tr style="background-color:orange">
            <th colspan="8">
                Finance Category - <?php echo $fincat_saldo_akhir; ?>
            </th>

            <th>
                SALDO AKHIR
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
            if($fincat_saldo_akhir=='all'){
                $query = "SELECT 
                                    no_pin, account_sts, kode_cabang, cabang,
                                    SUM(accrue_restru) AS t_accrue_restru
                                FROM tbl_accrue_detail
                                WHERE status_paid='belum'
                                GROUP BY no_pin
                                ";

                $query_total = "SELECT 
                                    SUM(accrue_restru) AS t_accrue_restru
                                FROM tbl_accrue_detail
                                WHERE status_paid='belum'
                                ";
            }else{
                $query = "SELECT 
                                    no_pin, account_sts, kode_cabang, cabang,
                                    SUM(accrue_restru) AS t_accrue_restru
                                FROM tbl_accrue_detail
                                WHERE status_paid='belum' AND fincat='$fincat_saldo_akhir'
                                GROUP BY no_pin
                                ";

                $query_total = "SELECT 
                                    SUM(accrue_restru) AS t_accrue_restru
                                FROM tbl_accrue_detail
                                WHERE status_paid='belum' AND fincat='$fincat_saldo_akhir'
                                ";
            }
            
            $result = mysqli_query($koneksi, $query) or die ('error fungsi laporan');
            $result_total = mysqli_query($koneksi, $query_total) or die (mysqli_error($koneksi));
            $row_total = mysqli_fetch_array($result_total);

            while($row = mysqli_fetch_array($result)){
                $no++;
                $no_pin = $row['no_pin'];

                // Tampilkan Data Lainnya
                $query_lainnya = "SELECT * FROM tbl_accrue WHERE no_pin = '$no_pin'";
                $result_lainnya = mysqli_query($koneksi, $query_lainnya) or die ('error lainnya');
                $row_lainnya = mysqli_fetch_array($result_lainnya);
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td class="str"><?php echo $row['no_pin']; ?></td>
            <td class="str"><?php echo $row_lainnya['no_rek'] ?></td>
            <td><?php echo $row['account_sts']; ?></td>

            <!-- Status Penyusutan -->
            <?php if($row_lainnya['paid_status'] == 'Done'){ ?>
                <td style="text-align:center"><?php echo $row_lainnya['paid_status'] ?></td>
            <?php }else{ ?>
                <td style="text-align:center">Amortize</td>
            <?php } ?>

            <td style="text-align:center;mso-number-format:\@;"><?php echo $row['kode_cabang']; ?></td>
            <td><?php echo $row['cabang']; ?></td>
            <td><?php echo $row_lainnya['account_name']; ?></td>
            <td style="text-align:right"><?php echo number_format($row['t_accrue_restru'], 0, '.', ','); ?></td>
        </tr>
        <?php } ?>

        <tr style="background-color: greenyellow; font-weight: bold;">
            <td style="text-align: center;" colspan="8">TOTAL</td>
            <td style="text-align:right"><?php echo number_format($row_total['t_accrue_restru'], 0, '.', ','); ?></td>
        </tr>
    </table>

</body>
</html>