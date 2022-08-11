<?php  

	// Script Excel (Tanpa Tambahan Library) Apapun
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");
	header("Content-type: application/x-msexcel");
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=prediksi_jf.xls");

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
	<h3>DATA PREDIKSI JF</h3>
</div>

<br>

<table border = '1' width="100%">
    <tr style="background-color: orange">
        <th>NO</th>
        <th>Periode</th>
        <th>Provisi JF</th>
    </tr>

    <?php  
        $no = 0;
        $sql = "SELECT DISTINCT bulan,tahun FROM tbl_jf_detail WHERE status_paid='belum'";
        $res = mysqli_query($koneksi, $sql) or die ('error fungsi');

        $gt_provisi_jf = 0;

        while($data = mysqli_fetch_array($res)){
            $no++;
            $bulan = $data['bulan'];
            $tahun = $data['tahun'];

            // Cari Totalan Per Bulan
            $query_sum = "SELECT 
                            SUM(provisi_jf) AS t_provisi_jf
                            FROM tbl_jf_detail WHERE bulan='$bulan' AND tahun='$tahun' AND status_paid='belum'";
            
            $res_sum = mysqli_query($koneksi, $query_sum) or die('error sum');
            $data_sum = mysqli_fetch_array($res_sum);

            // Grand Total
            $gt_provisi_jf += $data_sum['t_provisi_jf'];

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
        <td style="text-align:right"><?php echo number_format($data_sum['t_provisi_jf'],0,'.',',') ?></td>
    </tr>
    <?php } ?>

    <tr style="background-color: #b6fc03">
        <th style="text-align:right" colspan="2">TOTAL</th>

        <th style="text-align:right"><?php echo number_format($gt_provisi_jf,0,'.',',') ?></th>
    </tr>

</table>