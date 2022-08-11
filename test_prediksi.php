<?php include 'koneksi.php'; ?>

<h1>Halaman Test Prediksi</h1>

<table border = '1' width="100%">
    <tr>
        <th>NO</th>
        <th>Periode</th>
        <th>Refund NPV</th>
        <th>Refund Asuransi</th>
        <th>Refund ADM</th>
        <th>Ins Receivable</th>
        <th>By Notaris</th>
        <th>Pend Asuransi</th>
        <th>Pend Survey</th>
        <th>Pend Fidusia</th>
    </tr>

    <?php  
        $no = 0;
        $sql = "SELECT DISTINCT bulan,tahun FROM tbl_psak_detail WHERE status_paid='belum'";
        $res = mysqli_query($koneksi, $sql) or die ('error fungsi');
        while($data = mysqli_fetch_array($res)){
            $no++;
            $bulan = $data['bulan'];
            $tahun = $data['tahun'];

            // Cari Totalan Per Bulan
            $query_sum = "SELECT 
                            SUM(refund_npv) AS t_refund_npv,
                            SUM(refund_asuransi) AS t_refund_asuransi,
                            SUM(refund_adm) AS t_refund_adm,
                            SUM(ins_receivable) AS t_ins_receivable,
                            SUM(by_notaris) AS t_by_notaris,
                            SUM(pend_asuransi) AS t_pend_asuransi,
                            SUM(pend_survey) AS t_pend_survey,
                            SUM(pend_fidusia) AS t_pend_fidusia
                            FROM tbl_psak_detail WHERE bulan='$bulan' AND tahun='$tahun' AND status_paid='belum'";
            
            $res_sum = mysqli_query($koneksi, $query_sum) or die('error sum');
            $data_sum = mysqli_fetch_array($res_sum);

            // Nama Bulan
            $nama_bulan = '';
            switch($bulan){
                case '1' : $nama_bulan='Januari'; break;
                case '2' : $nama_bulan='Februari'; break;
                case '3' : $nama_bulan='Maret'; break;
                case '4' : $nama_bulan='April'; break;
                case '5' : $nama_bulan='Mei'; break;
                case '6' : $nama_bulan='Juni'; break;
                case '7' : $nama_bulan='Juli'; break;
                case '8' : $nama_bulan='Agustus'; break;
                case '9' : $nama_bulan='September'; break;
                case '10' : $nama_bulan='Oktober'; break;
                case '11' : $nama_bulan='November'; break;
                case '12' : $nama_bulan='Desember'; break;
            }

    ?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $nama_bulan.' - '.$tahun; ?></td>
        <td style="text-align:right"><?php echo number_format($data_sum['t_refund_npv'],0,'.',',') ?></td>
        <td style="text-align:right"><?php echo number_format($data_sum['t_refund_asuransi'], 0, '.', ',') ?></td>
        <td style="text-align:right"><?php echo number_format($data_sum['t_refund_adm'], 0, '.', ',') ?></td>
        <td style="text-align:right"><?php echo number_format($data_sum['t_ins_receivable'], 0, '.', ',') ?></td>
        <td style="text-align:right"><?php echo number_format($data_sum['t_by_notaris'], 0, '.', ',') ?></td>
        <td style="text-align:right"><?php echo number_format($data_sum['t_pend_asuransi'], 0, '.', ',') ?></td>
        <td style="text-align:right"><?php echo number_format($data_sum['t_pend_survey'], 0, '.', ',') ?></td>
        <td style="text-align:right"><?php echo number_format($data_sum['t_pend_fidusia'], 0, '.', ',') ?></td>
    </tr>
    <?php } ?>

</table>