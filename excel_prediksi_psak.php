<?php  

	// Script Excel (Tanpa Tambahan Library) Apapun
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");
	header("Content-type: application/x-msexcel");
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=prediksi_psak.xls");

	date_default_timezone_set("Asia/Jakarta");
    
    include 'koneksi.php';

?>

<style>
	table,th,td{
		border-collapse: collapse;
		padding: 15px;
		margin: 10px;
		color: #000;
	}

	.str{ mso-number-format:\@; }
</style>

<div>
	<h3>DATA PREDIKSI PSAK</h3>
</div>

<br>

<table border = '1' width="100%">
    <tr style="background-color: orange">
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

        $gt_refund_npv = 0;
        $gt_refund_asuransi = 0;
        $gt_refund_adm = 0;
        $gt_ins_receivable = 0;
        $gt_by_notaris = 0;
        $gt_pend_asuransi = 0;
        $gt_pend_survey = 0;
        $gt_pend_fidusia = 0;


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

            // Grand Total
            $gt_refund_npv += $data_sum['t_refund_npv'];
            $gt_refund_asuransi += $data_sum['t_refund_asuransi'];
            $gt_refund_adm += $data_sum['t_refund_adm'];
            $gt_ins_receivable+= $data_sum['t_ins_receivable'];
            $gt_by_notaris += $data_sum['t_by_notaris'];
            $gt_pend_asuransi += $data_sum['t_pend_asuransi'];
            $gt_pend_survey += $data_sum['t_pend_survey'];
            $gt_pend_fidusia += $data_sum['t_pend_fidusia'];

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
        <td tyle="text-align:center"><?php echo $no; ?></td>
        <td style="text-align:center"><?php echo $nama_bulan.' '.$tahun; ?></td>
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

    <tr style="background-color: #b6fc03">
        <th style="text-align:right" colspan="2">TOTAL</th>

        <th style="text-align:right"><?php echo number_format($gt_refund_npv,0,'.',',') ?></th>
        <th style="text-align:right"><?php echo number_format($gt_refund_asuransi,0,'.',',') ?></th>
        <th style="text-align:right"><?php echo number_format($gt_refund_adm,0,'.',',') ?></th>
        <th style="text-align:right"><?php echo number_format($gt_ins_receivable,0,'.',',') ?></th>
        <th style="text-align:right"><?php echo number_format($gt_by_notaris,0,'.',',') ?></th>
        <th style="text-align:right"><?php echo number_format($gt_pend_asuransi,0,'.',',') ?></th>
        <th style="text-align:right"><?php echo number_format($gt_pend_survey,0,'.',',') ?></th>
        <th style="text-align:right"><?php echo number_format($gt_pend_fidusia,0,'.',',') ?></th>
    </tr>

</table>