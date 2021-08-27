<?php  

	// Script Excel (Tanpa Tambahan Library) Apapun
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");
	header("Content-type: application/x-msexcel");
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=report_os_bmhd.xls");

	date_default_timezone_set("Asia/Jakarta");
    
    include 'koneksi.php';

    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];

    // Nama Bulan
  switch($bulan){
    case 1 : $nama_bulan='Januari'; break;
    case 2 : $nama_bulan='Februari'; break;
    case 3 : $nama_bulan='Maret'; break;
    case 4 : $nama_bulan='April'; break;
    case 5 : $nama_bulan='Mei'; break;
    case 6 : $nama_bulan='Juni'; break;
    case 7 : $nama_bulan='Juli'; break;
    case 8 : $nama_bulan='Agustus'; break;
    case 9 : $nama_bulan='September'; break;
    case 10 : $nama_bulan='Oktober'; break;
    case 11 : $nama_bulan='November'; break;
    case 12 : $nama_bulan='Desember'; break;
    default : $nama_bulan='Tidak Teridentifikasi';
  }

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
	<span style="margin-left: 20px; font-size: 20px"><b>LAPORAN PENYUSUTAN BY CABANG</b></span><br>
</div>

<table>
	<tr>
		<th>PERIODE</th>
		<td>: <?php echo $nama_bulan.'-'.$tahun ?></td>
	</tr>
</table>

<br><br>

<!-- TABEL 1 : IVST -->
<table class="table" style="display: block; overflow-x: auto; white-space: nowrap;">
  <tr>

    <td>
      <table border="1">

        <tr style="font-weight: bold; background-color: orange">
          <td colspan="2">Finance Category : INVST - INST LOAN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td colspan="8" style="text-align: center;">SALDO AWAL</td>
        </tr>

        <tr style="font-weight: bold; background-color: silver">
          <td>Cabang</td>
          <td>Refund NPV</td>
          <td>Refund Asuransi</td>
          <td>Refund ADM</td>
          <td>Ins Receivable</td>
          <td>By Notaris</td>
          <td>Pend Asuransi</td>
          <td>Pend Survey</td>
          <td>Pend Fidusia</td>
          <td>Pend Provisi</td>
        </tr>

        <?php  

          $query = "SELECT cabang,
                      refund_npv AS t_refund_npv,
                      refund_asuransi AS t_refund_asuransi,
                      refund_adm AS t_refund_adm,
                      ins_receivable AS t_ins_receivable,
                      by_notaris AS t_by_notaris,
                      pend_asuransi AS t_pend_asuransi,
                      pend_survey AS t_pend_survey,
                      pend_fidusia AS t_pend_fidusia,
                      pend_provisi AS t_pend_provisi
                      FROM tbl_saldo_awal_cabang
                      WHERE fincat = 'INVST - INST LOAN' AND bulan=$bulan AND tahun=$tahun
                      GROUP BY cabang";
          $result = mysqli_query($koneksi,$query) or die ('error fungsi cabang');
          while($row = mysqli_fetch_array($result)){

        ?>
        <tr>
          <td><?php echo $row['cabang'] ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_npv'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_adm'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_ins_receivable'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_by_notaris'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_survey'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_fidusia'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_provisi'],0,'.',',') ?></td>
        </tr>
        <?php } ?>

        <?php  

          $q_total = "SELECT
                      SUM(refund_npv) AS t_refund_npv,
                      SUM(refund_asuransi) AS t_refund_asuransi,
                      SUM(refund_adm) AS t_refund_adm,
                      SUM(ins_receivable) AS t_ins_receivable,
                      SUM(by_notaris) AS t_by_notaris,
                      SUM(pend_asuransi) AS t_pend_asuransi,
                      SUM(pend_survey) AS t_pend_survey,
                      SUM(pend_fidusia) AS t_pend_fidusia,
                      SUM(pend_provisi) AS t_pend_provisi
                      FROM tbl_saldo_awal_cabang
                      WHERE fincat = 'INVST - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
          $result = mysqli_query($koneksi,$q_total) or die ('error fungsi cabang');
          $row_total = mysqli_fetch_array($result);

        ?>
        <tr style="background-color: #bafc03">
          <td style="font-weight: bold">INVST - INST LOAN TOTAL</td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_refund_npv'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_refund_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_refund_adm'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_ins_receivable'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_by_notaris'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_pend_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_pend_survey'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_pend_fidusia'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_pend_provisi'],0,'.',',') ?></td>
        </tr>
      </table>


    </td><td>&nbsp;</td>

    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

    <td>
      
      <table border="1">

        <tr style="font-weight: bold; background-color: orange">
          <td colspan="9" style="text-align: center;">PENYUSUTAN BULAN BERJALAN (ACTIVE)</td>
        </tr>

        <tr style="font-weight: bold; background-color: silver">
          <td>Refund NPV</td>
          <td>Refund Asuransi</td>
          <td>Refund ADM</td>
          <td>Ins Receivable</td>
          <td>By Notaris</td>
          <td>Pend Asuransi</td>
          <td>Pend Survey</td>
          <td>Pend Fidusia</td>
          <td>Pend Provisi</td>
        </tr>

        <?php  

          $query = "SELECT cabang,
                      refund_npv AS t_refund_npv,
                      refund_asuransi AS t_refund_asuransi,
                      refund_adm AS t_refund_adm,
                      ins_receivable AS t_ins_receivable,
                      by_notaris AS t_by_notaris,
                      pend_asuransi AS t_pend_asuransi,
                      pend_survey AS t_pend_survey,
                      pend_fidusia AS t_pend_fidusia,
                      pend_provisi AS t_pend_provisi
                      FROM tbl_penyusutan_active_cabang
                      WHERE fincat = 'INVST - INST LOAN' AND bulan=$bulan AND tahun=$tahun
                      GROUP BY cabang";
          $result = mysqli_query($koneksi,$query) or die ('error fungsi cabang');
          while($row = mysqli_fetch_array($result)){

        ?>
        <tr>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_npv'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_adm'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_ins_receivable'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_by_notaris'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_survey'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_fidusia'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_provisi'],0,'.',',') ?></td>
        </tr>
        <?php } ?>

        <?php  

          $q_total2 = "SELECT cabang,
                      SUM(refund_npv) AS t_refund_npv,
                      SUM(refund_asuransi) AS t_refund_asuransi,
                      SUM(refund_adm) AS t_refund_adm,
                      SUM(ins_receivable) AS t_ins_receivable,
                      SUM(by_notaris) AS t_by_notaris,
                      SUM(pend_asuransi) AS t_pend_asuransi,
                      SUM(pend_survey) AS t_pend_survey,
                      SUM(pend_fidusia) AS t_pend_fidusia,
                      SUM(pend_provisi) AS t_pend_provisi
                      FROM tbl_penyusutan_active_cabang
                      WHERE fincat = 'INVST - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
          $result_total = mysqli_query($koneksi,$q_total2) or die ('error fungsi cabang');
          $row_total2 = mysqli_fetch_array($result_total);

        ?>
        <tr style="background-color: #bafc03; font-weight: bold;">
          <td style="text-align: right;"><?php echo number_format($row_total2['t_refund_npv'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_refund_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_refund_adm'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_ins_receivable'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_by_notaris'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_pend_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_pend_survey'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_pend_fidusia'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_pend_provisi'],0,'.',',') ?></td>
        </tr>
      </table>

    </td>

    <td>&nbsp;</td>

    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

    <td>
      
      <table border="1">

        <tr style="font-weight: bold; background-color: orange">
          <td colspan="9" style="text-align: center;">PENYUSUTAN BULAN BERJALAN (CLOSED)</td>
        </tr>

        <tr style="font-weight: bold; background-color: silver">
          <td>Refund NPV</td>
          <td>Refund Asuransi</td>
          <td>Refund ADM</td>
          <td>Ins Receivable</td>
          <td>By Notaris</td>
          <td>Pend Asuransi</td>
          <td>Pend Survey</td>
          <td>Pend Fidusia</td>
          <td>Pend Provisi</td>
        </tr>

        <?php  

          $query = "SELECT cabang,
                      refund_npv AS t_refund_npv,
                      refund_asuransi AS t_refund_asuransi,
                      refund_adm AS t_refund_adm,
                      ins_receivable AS t_ins_receivable,
                      by_notaris AS t_by_notaris,
                      pend_asuransi AS t_pend_asuransi,
                      pend_survey AS t_pend_survey,
                      pend_fidusia AS t_pend_fidusia,
                      pend_provisi AS t_pend_provisi
                      FROM tbl_penyusutan_closed_cabang
                      WHERE fincat = 'INVST - INST LOAN' AND bulan=$bulan AND tahun=$tahun
                      GROUP BY cabang";
          $result = mysqli_query($koneksi,$query) or die ('error fungsi cabang');
          while($row = mysqli_fetch_array($result)){

        ?>
        <tr>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_npv'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_adm'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_ins_receivable'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_by_notaris'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_survey'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_fidusia'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_provisi'],0,'.',',') ?></td>
        </tr>
        <?php } ?>

        <?php  

          $q_total3 = "SELECT cabang,
                      SUM(refund_npv) AS t_refund_npv,
                      SUM(refund_asuransi) AS t_refund_asuransi,
                      SUM(refund_adm) AS t_refund_adm,
                      SUM(ins_receivable) AS t_ins_receivable,
                      SUM(by_notaris) AS t_by_notaris,
                      SUM(pend_asuransi) AS t_pend_asuransi,
                      SUM(pend_survey) AS t_pend_survey,
                      SUM(pend_fidusia) AS t_pend_fidusia,
                      SUM(pend_provisi) AS t_pend_provisi
                      FROM tbl_penyusutan_closed_cabang
                      WHERE fincat = 'INVST - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
          $result_total = mysqli_query($koneksi,$q_total3) or die ('error fungsi cabang');
          $row_total3 = mysqli_fetch_array($result_total);

        ?>
        <tr style="background-color: #bafc03; font-weight: bold;">
          <td style="text-align: right;"><?php echo number_format($row_total3['t_refund_npv'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_refund_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_refund_adm'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_ins_receivable'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_by_notaris'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_pend_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_pend_survey'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_pend_fidusia'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_pend_provisi'],0,'.',',') ?></td>
        </tr>
      </table>

    </td>

    <td>&nbsp;</td>

    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

    <td>
      
      <table border="1">

        <tr style="font-weight: bold; background-color: orange">
          <td colspan="9" style="text-align: center;">SALDO AKHIR</td>
        </tr>

        <tr style="font-weight: bold; background-color: silver">
          <td>Refund NPV</td>
          <td>Refund Asuransi</td>
          <td>Refund ADM</td>
          <td>Ins Receivable</td>
          <td>By Notaris</td>
          <td>Pend Asuransi</td>
          <td>Pend Survey</td>
          <td>Pend Fidusia</td>
          <td>Pend Provisi</td>
        </tr>

        <?php  

        $query = "SELECT cabang,
          refund_npv AS t_refund_npv,
          refund_asuransi AS t_refund_asuransi,
          refund_adm AS t_refund_adm,
          ins_receivable AS t_ins_receivable,
          by_notaris AS t_by_notaris,
          pend_asuransi AS t_pend_asuransi,
          pend_survey AS t_pend_survey,
          pend_fidusia AS t_pend_fidusia,
          pend_provisi AS t_pend_provisi
          FROM tbl_saldo_awal_cabang
          WHERE fincat = 'INVST - INST LOAN' AND bulan=$bulan AND tahun=$tahun
          GROUP BY cabang";

        $result = mysqli_query($koneksi,$query) or die ('error fungsi xx');
        while($row = mysqli_fetch_array($result)){
          $cabang = $row['cabang'];

          // Query Penyusutan Active
          $query_active = "SELECT cabang,
                      refund_npv AS t_refund_npv,
                      refund_asuransi AS t_refund_asuransi,
                      refund_adm AS t_refund_adm,
                      ins_receivable AS t_ins_receivable,
                      by_notaris AS t_by_notaris,
                      pend_asuransi AS t_pend_asuransi,
                      pend_survey AS t_pend_survey,
                      pend_fidusia AS t_pend_fidusia,
                      pend_provisi AS t_pend_provisi
                      FROM tbl_penyusutan_active_cabang
                      WHERE fincat = 'INVST - INST LOAN' AND cabang='$cabang' AND bulan=$bulan AND tahun=$tahun";
          $result_active = mysqli_query($koneksi,$query_active) or die ('error fungsi cabang');
          $row_active = mysqli_fetch_array($result_active);

          // Query Penyusutan Closed
          $query_closed = "SELECT cabang,
                      refund_npv AS t_refund_npv,
                      refund_asuransi AS t_refund_asuransi,
                      refund_adm AS t_refund_adm,
                      ins_receivable AS t_ins_receivable,
                      by_notaris AS t_by_notaris,
                      pend_asuransi AS t_pend_asuransi,
                      pend_survey AS t_pend_survey,
                      pend_fidusia AS t_pend_fidusia,
                      pend_provisi AS t_pend_provisi
                      FROM tbl_penyusutan_closed_cabang
                      WHERE fincat = 'INVST - INST LOAN' AND cabang='$cabang' AND bulan=$bulan AND tahun=$tahun";
          $result_closed = mysqli_query($koneksi,$query_closed) or die ('error fungsi cabang');
          $row_closed = mysqli_fetch_array($result_closed);

          // Data AWAL
          $refund_npv_awal = $row['t_refund_npv'];
          $refund_asuransi_awal = $row['t_refund_asuransi'];
          $refund_adm_awal = $row['t_refund_adm'];
          $ins_receivable_awal = $row['t_ins_receivable'];
          $by_notaris_awal = $row['t_by_notaris'];
          $pend_asuransi_awal = $row['t_pend_asuransi'];
          $pend_survey_awal = $row['t_pend_survey'];
          $pend_fidusia_awal = $row['t_pend_fidusia'];
          $pend_provisi_awal = $row['t_pend_provisi'];

          // Data ACTIVE
          $refund_npv_active = $row_active['t_refund_npv'];
          $refund_asuransi_active = $row_active['t_refund_asuransi'];
          $refund_adm_active = $row_active['t_refund_adm'];
          $ins_receivable_active = $row_active['t_ins_receivable'];
          $by_notaris_active = $row_active['t_by_notaris'];
          $pend_asuransi_active = $row_active['t_pend_asuransi'];
          $pend_survey_active = $row_active['t_pend_survey'];
          $pend_fidusia_active = $row_active['t_pend_fidusia'];
          $pend_provisi_active = $row_active['t_pend_provisi'];

          // Data Closed
          $refund_npv_closed = $row_closed['t_refund_npv'];
          $refund_asuransi_closed = $row_closed['t_refund_asuransi'];
          $refund_adm_closed = $row_closed['t_refund_adm'];
          $ins_receivable_closed = $row_closed['t_ins_receivable'];
          $by_notaris_closed = $row_closed['t_by_notaris'];
          $pend_asuransi_closed = $row_closed['t_pend_asuransi'];
          $pend_survey_closed = $row_closed['t_pend_survey'];
          $pend_fidusia_closed = $row_closed['t_pend_fidusia'];
          $pend_provisi_closed = $row_closed['t_pend_provisi'];

          // Data Saldo Akhir
          $refund_npv_akhir = $refund_npv_awal - $refund_npv_active - $refund_npv_closed;
          $refund_asuransi_akhir = $refund_asuransi_awal - $refund_asuransi_active - $refund_asuransi_closed;
          $refund_adm_akhir = $refund_adm_awal - $refund_adm_active - $refund_adm_closed;
          $ins_receivable_akhir = $ins_receivable_awal - $ins_receivable_active - $ins_receivable_closed;
          $by_notaris_akhir = $by_notaris_awal - $by_notaris_active - $by_notaris_closed;
          $pend_asuransi_akhir = $pend_asuransi_awal - $pend_asuransi_active - $pend_asuransi_closed;
          $pend_survey_akhir = $pend_survey_awal - $pend_survey_active - $pend_survey_closed;
          $pend_fidusia_akhir = $pend_fidusia_awal - $pend_fidusia_active - $pend_fidusia_closed;
          $pend_provisi_akhir = $pend_provisi_awal - $pend_provisi_active - $pend_provisi_closed;

        ?>
        <tr>
          <td style="text-align: right;"><?php echo number_format($refund_npv_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($refund_asuransi_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($refund_adm_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($ins_receivable_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($by_notaris_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_asuransi_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_survey_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_fidusia_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_provisi_akhir,0,'.',',') ?></td>
        </tr>
        <?php } ?>


        <?php 

          $refund_npv_final = $row_total['t_refund_npv'] - $row_total2['t_refund_npv'] - $row_total3['t_refund_npv'];
          $refund_asuransi_final = $row_total['t_refund_asuransi'] - $row_total2['t_refund_asuransi'] - $row_total3['t_refund_asuransi'];
          $refund_adm_final = $row_total['t_refund_adm'] - $row_total2['t_refund_adm'] - $row_total3['t_refund_adm'];
          $ins_receivable_final = $row_total['t_ins_receivable'] - $row_total2['t_ins_receivable'] - $row_total3['t_ins_receivable'];
          $by_notaris_final = $row_total['t_by_notaris'] - $row_total2['t_by_notaris'] - $row_total3['t_by_notaris'];
          $pend_asuransi_final = $row_total['t_pend_asuransi'] - $row_total2['t_pend_asuransi'] - $row_total3['t_pend_asuransi'];
          $pend_survey_final = $row_total['t_pend_survey'] - $row_total2['t_pend_survey'] - $row_total3['t_pend_survey'];
          $pend_fidusia_final = $row_total['t_pend_fidusia'] - $row_total2['t_pend_fidusia'] - $row_total3['t_pend_fidusia'];
          $pend_provisi_final = $row_total['t_pend_provisi'] - $row_total2['t_pend_provisi'] - $row_total3['t_pend_provisi'];


        ?>
        <tr style="background-color: #bafc03; font-weight: bold;">
          <td style="text-align: right;"><?php echo number_format($refund_npv_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($refund_asuransi_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($refund_adm_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($ins_receivable_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($by_notaris_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_asuransi_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_survey_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_fidusia_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_provisi_final,0,'.',',') ?></td>
        </tr>

      </table>

    </td>

    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
  </tr>
</table>
<!-- / TABEL 1 : IVST --> <br>








<!-- TABEL 2 : MKRJA -->
<table class="table" style="display: block; overflow-x: auto; white-space: nowrap;">
  <tr>
    <td>
      

      <table border="1">

        <tr style="font-weight: bold; background-color: orange">
          <td colspan="2">Finance Category : MKRJA - MODAL USAHA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td colspan="8" style="text-align: center;">SALDO AWAL</td>
        </tr>

        <tr style="font-weight: bold; background-color: silver">
          <td>Cabang</td>
          <td>Refund NPV</td>
          <td>Refund Asuransi</td>
          <td>Refund ADM</td>
          <td>Ins Receivable</td>
          <td>By Notaris</td>
          <td>Pend Asuransi</td>
          <td>Pend Survey</td>
          <td>Pend Fidusia</td>
          <td>Pend Provisi</td>
        </tr>

        <?php  

          $query = "SELECT cabang,
                      refund_npv AS t_refund_npv,
                      refund_asuransi AS t_refund_asuransi,
                      refund_adm AS t_refund_adm,
                      ins_receivable AS t_ins_receivable,
                      by_notaris AS t_by_notaris,
                      pend_asuransi AS t_pend_asuransi,
                      pend_survey AS t_pend_survey,
                      pend_fidusia AS t_pend_fidusia,
                      pend_provisi AS t_pend_provisi
                      FROM tbl_saldo_awal_cabang
                      WHERE fincat = 'MKRJA - MODAL USAHA' AND bulan=$bulan AND tahun=$tahun
                      GROUP BY cabang";
          $result = mysqli_query($koneksi,$query) or die ('error fungsi cabang');
          while($row = mysqli_fetch_array($result)){

        ?>
        <tr>
          <td><?php echo $row['cabang'] ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_npv'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_adm'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_ins_receivable'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_by_notaris'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_survey'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_fidusia'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_provisi'],0,'.',',') ?></td>
        </tr>
        <?php } ?>

        <?php  

          $q_total = "SELECT
                      SUM(refund_npv) AS t_refund_npv,
                      SUM(refund_asuransi) AS t_refund_asuransi,
                      SUM(refund_adm) AS t_refund_adm,
                      SUM(ins_receivable) AS t_ins_receivable,
                      SUM(by_notaris) AS t_by_notaris,
                      SUM(pend_asuransi) AS t_pend_asuransi,
                      SUM(pend_survey) AS t_pend_survey,
                      SUM(pend_fidusia) AS t_pend_fidusia,
                      SUM(pend_provisi) AS t_pend_provisi
                      FROM tbl_saldo_awal_cabang
                      WHERE fincat = 'MKRJA - MODAL USAHA' AND bulan=$bulan AND tahun=$tahun";
          $result = mysqli_query($koneksi,$q_total) or die ('error fungsi cabang');
          $row_total = mysqli_fetch_array($result);

        ?>
        <tr style="background-color: #bafc03">
          <td style="font-weight: bold">MKRJA - MODAL USAHA TOTAL</td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_refund_npv'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_refund_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_refund_adm'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_ins_receivable'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_by_notaris'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_pend_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_pend_survey'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_pend_fidusia'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_pend_provisi'],0,'.',',') ?></td>
        </tr>
      </table>


    </td>
    <td>&nbsp;</td>

    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

    <td>
      
      <table border="1">

        <tr style="font-weight: bold; background-color: orange">
          <td colspan="9" style="text-align: center;">PENYUSUTAN BULAN BERJALAN (ACTIVE)</td>
        </tr>

        <tr style="font-weight: bold; background-color: silver">
          <td>Refund NPV</td>
          <td>Refund Asuransi</td>
          <td>Refund ADM</td>
          <td>Ins Receivable</td>
          <td>By Notaris</td>
          <td>Pend Asuransi</td>
          <td>Pend Survey</td>
          <td>Pend Fidusia</td>
          <td>Pend Provisi</td>
        </tr>

        <?php  

          $query = "SELECT cabang,
                      refund_npv AS t_refund_npv,
                      refund_asuransi AS t_refund_asuransi,
                      refund_adm AS t_refund_adm,
                      ins_receivable AS t_ins_receivable,
                      by_notaris AS t_by_notaris,
                      pend_asuransi AS t_pend_asuransi,
                      pend_survey AS t_pend_survey,
                      pend_fidusia AS t_pend_fidusia,
                      pend_provisi AS t_pend_provisi
                      FROM tbl_penyusutan_active_cabang
                      WHERE fincat = 'MKRJA - MODAL USAHA' AND bulan=$bulan AND tahun=$tahun
                      GROUP BY cabang";
          $result = mysqli_query($koneksi,$query) or die ('error fungsi cabang');
          while($row = mysqli_fetch_array($result)){

        ?>
        <tr>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_npv'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_adm'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_ins_receivable'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_by_notaris'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_survey'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_fidusia'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_provisi'],0,'.',',') ?></td>
        </tr>
        <?php } ?>

        <?php  

          $q_total2 = "SELECT cabang,
                      SUM(refund_npv) AS t_refund_npv,
                      SUM(refund_asuransi) AS t_refund_asuransi,
                      SUM(refund_adm) AS t_refund_adm,
                      SUM(ins_receivable) AS t_ins_receivable,
                      SUM(by_notaris) AS t_by_notaris,
                      SUM(pend_asuransi) AS t_pend_asuransi,
                      SUM(pend_survey) AS t_pend_survey,
                      SUM(pend_fidusia) AS t_pend_fidusia,
                      SUM(pend_provisi) AS t_pend_provisi
                      FROM tbl_penyusutan_active_cabang
                      WHERE fincat = 'MKRJA - MODAL USAHA' AND bulan=$bulan AND tahun=$tahun";
          $result_total = mysqli_query($koneksi,$q_total2) or die ('error fungsi cabang');
          $row_total2 = mysqli_fetch_array($result_total);

        ?>
        <tr style="background-color: #bafc03; font-weight: bold;">
          <td style="text-align: right;"><?php echo number_format($row_total2['t_refund_npv'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_refund_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_refund_adm'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_ins_receivable'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_by_notaris'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_pend_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_pend_survey'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_pend_fidusia'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_pend_provisi'],0,'.',',') ?></td>
        </tr>
      </table>

    </td>
    <td>&nbsp;</td>

    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

    <td>
      
      <table border="1">

        <tr style="font-weight: bold; background-color: orange">
          <td colspan="9" style="text-align: center;">PENYUSUTAN BULAN BERJALAN (CLOSED)</td>
        </tr>

        <tr style="font-weight: bold; background-color: silver">
          <td>Refund NPV</td>
          <td>Refund Asuransi</td>
          <td>Refund ADM</td>
          <td>Ins Receivable</td>
          <td>By Notaris</td>
          <td>Pend Asuransi</td>
          <td>Pend Survey</td>
          <td>Pend Fidusia</td>
          <td>Pend Provisi</td>
        </tr>

        <?php  

          $query = "SELECT cabang,
                      refund_npv AS t_refund_npv,
                      refund_asuransi AS t_refund_asuransi,
                      refund_adm AS t_refund_adm,
                      ins_receivable AS t_ins_receivable,
                      by_notaris AS t_by_notaris,
                      pend_asuransi AS t_pend_asuransi,
                      pend_survey AS t_pend_survey,
                      pend_fidusia AS t_pend_fidusia,
                      pend_provisi AS t_pend_provisi
                      FROM tbl_penyusutan_closed_cabang
                      WHERE fincat = 'MKRJA - MODAL USAHA' AND bulan=$bulan AND tahun=$tahun
                      GROUP BY cabang";
          $result = mysqli_query($koneksi,$query) or die ('error fungsi cabang');
          while($row = mysqli_fetch_array($result)){

        ?>
        
        <tr>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_npv'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_adm'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_ins_receivable'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_by_notaris'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_survey'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_fidusia'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_provisi'],0,'.',',') ?></td>
        </tr>
        <?php } ?>

        <?php  

          $q_total3 = "SELECT cabang,
                      SUM(refund_npv) AS t_refund_npv,
                      SUM(refund_asuransi) AS t_refund_asuransi,
                      SUM(refund_adm) AS t_refund_adm,
                      SUM(ins_receivable) AS t_ins_receivable,
                      SUM(by_notaris) AS t_by_notaris,
                      SUM(pend_asuransi) AS t_pend_asuransi,
                      SUM(pend_survey) AS t_pend_survey,
                      SUM(pend_fidusia) AS t_pend_fidusia,
                      SUM(pend_provisi) AS t_pend_provisi
                      FROM tbl_penyusutan_closed_cabang
                      WHERE fincat = 'MKRJA - MODAL USAHA' AND bulan=$bulan AND tahun=$tahun";
          $result_total = mysqli_query($koneksi,$q_total3) or die ('error fungsi cabang');
          $row_total3 = mysqli_fetch_array($result_total);

        ?>
        <tr style="background-color: #bafc03; font-weight: bold;">
          <td style="text-align: right;"><?php echo number_format($row_total3['t_refund_npv'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_refund_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_refund_adm'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_ins_receivable'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_by_notaris'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_pend_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_pend_survey'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_pend_fidusia'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_pend_provisi'],0,'.',',') ?></td>
        </tr>
      </table>

    </td>
    <td>&nbsp;</td>

    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

    <td>
      
      <table border="1">

        <tr style="font-weight: bold; background-color: orange">
          <td colspan="9" style="text-align: center;">SALDO AKHIR</td>
        </tr>

        <tr style="font-weight: bold; background-color: silver">
          <td>Refund NPV</td>
          <td>Refund Asuransi</td>
          <td>Refund ADM</td>
          <td>Ins Receivable</td>
          <td>By Notaris</td>
          <td>Pend Asuransi</td>
          <td>Pend Survey</td>
          <td>Pend Fidusia</td>
          <td>Pend Provisi</td>
        </tr>

        <?php  

        $query = "SELECT cabang,
          refund_npv AS t_refund_npv,
          refund_asuransi AS t_refund_asuransi,
          refund_adm AS t_refund_adm,
          ins_receivable AS t_ins_receivable,
          by_notaris AS t_by_notaris,
          pend_asuransi AS t_pend_asuransi,
          pend_survey AS t_pend_survey,
          pend_fidusia AS t_pend_fidusia,
          pend_provisi AS t_pend_provisi
          FROM tbl_saldo_awal_cabang
          WHERE fincat = 'MKRJA - MODAL USAHA' AND bulan=$bulan AND tahun=$tahun
          GROUP BY cabang";

        $result = mysqli_query($koneksi,$query) or die ('error fungsi xx');
        while($row = mysqli_fetch_array($result)){
          $cabang = $row['cabang'];

          // Query Penyusutan Active
          $query_active = "SELECT cabang,
                      refund_npv AS t_refund_npv,
                      refund_asuransi AS t_refund_asuransi,
                      refund_adm AS t_refund_adm,
                      ins_receivable AS t_ins_receivable,
                      by_notaris AS t_by_notaris,
                      pend_asuransi AS t_pend_asuransi,
                      pend_survey AS t_pend_survey,
                      pend_fidusia AS t_pend_fidusia,
                      pend_provisi AS t_pend_provisi
                      FROM tbl_penyusutan_active_cabang
                      WHERE fincat = 'MKRJA - MODAL USAHA' AND cabang='$cabang' AND bulan=$bulan AND tahun=$tahun";
          $result_active = mysqli_query($koneksi,$query_active) or die ('error fungsi cabang');
          $row_active = mysqli_fetch_array($result_active);

          // Query Penyusutan Closed
          $query_closed = "SELECT cabang,
                      refund_npv AS t_refund_npv,
                      refund_asuransi AS t_refund_asuransi,
                      refund_adm AS t_refund_adm,
                      ins_receivable AS t_ins_receivable,
                      by_notaris AS t_by_notaris,
                      pend_asuransi AS t_pend_asuransi,
                      pend_survey AS t_pend_survey,
                      pend_fidusia AS t_pend_fidusia,
                      pend_provisi AS t_pend_provisi
                      FROM tbl_penyusutan_closed_cabang
                      WHERE fincat = 'MKRJA - MODAL USAHA' AND cabang='$cabang' AND bulan=$bulan AND tahun=$tahun";
          $result_closed = mysqli_query($koneksi,$query_closed) or die ('error fungsi cabang');
          $row_closed = mysqli_fetch_array($result_closed);

          // Data AWAL
          $refund_npv_awal = $row['t_refund_npv'];
          $refund_asuransi_awal = $row['t_refund_asuransi'];
          $refund_adm_awal = $row['t_refund_adm'];
          $ins_receivable_awal = $row['t_ins_receivable'];
          $by_notaris_awal = $row['t_by_notaris'];
          $pend_asuransi_awal = $row['t_pend_asuransi'];
          $pend_survey_awal = $row['t_pend_survey'];
          $pend_fidusia_awal = $row['t_pend_fidusia'];
          $pend_provisi_awal = $row['t_pend_provisi'];

          // Data ACTIVE
          $refund_npv_active = $row_active['t_refund_npv'];
          $refund_asuransi_active = $row_active['t_refund_asuransi'];
          $refund_adm_active = $row_active['t_refund_adm'];
          $ins_receivable_active = $row_active['t_ins_receivable'];
          $by_notaris_active = $row_active['t_by_notaris'];
          $pend_asuransi_active = $row_active['t_pend_asuransi'];
          $pend_survey_active = $row_active['t_pend_survey'];
          $pend_fidusia_active = $row_active['t_pend_fidusia'];
          $pend_provisi_active = $row_active['t_pend_provisi'];

          // Data Closed
          $refund_npv_closed = $row_closed['t_refund_npv'];
          $refund_asuransi_closed = $row_closed['t_refund_asuransi'];
          $refund_adm_closed = $row_closed['t_refund_adm'];
          $ins_receivable_closed = $row_closed['t_ins_receivable'];
          $by_notaris_closed = $row_closed['t_by_notaris'];
          $pend_asuransi_closed = $row_closed['t_pend_asuransi'];
          $pend_survey_closed = $row_closed['t_pend_survey'];
          $pend_fidusia_closed = $row_closed['t_pend_fidusia'];
          $pend_provisi_closed = $row_closed['t_pend_provisi'];

          // Data Saldo Akhir
          $refund_npv_akhir = $refund_npv_awal - $refund_npv_active - $refund_npv_closed;
          $refund_asuransi_akhir = $refund_asuransi_awal - $refund_asuransi_active - $refund_asuransi_closed;
          $refund_adm_akhir = $refund_adm_awal - $refund_adm_active - $refund_adm_closed;
          $ins_receivable_akhir = $ins_receivable_awal - $ins_receivable_active - $ins_receivable_closed;
          $by_notaris_akhir = $by_notaris_awal - $by_notaris_active - $by_notaris_closed;
          $pend_asuransi_akhir = $pend_asuransi_awal - $pend_asuransi_active - $pend_asuransi_closed;
          $pend_survey_akhir = $pend_survey_awal - $pend_survey_active - $pend_survey_closed;
          $pend_fidusia_akhir = $pend_fidusia_awal - $pend_fidusia_active - $pend_fidusia_closed;
          $pend_provisi_akhir = $pend_provisi_awal - $pend_provisi_active - $pend_provisi_closed;

        ?>
        <tr>
          <td style="text-align: right;"><?php echo number_format($refund_npv_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($refund_asuransi_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($refund_adm_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($ins_receivable_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($by_notaris_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_asuransi_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_survey_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_fidusia_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_provisi_akhir,0,'.',',') ?></td>
        </tr>
        <?php } ?>


        <?php 

          $refund_npv_final = $row_total['t_refund_npv'] - $row_total2['t_refund_npv'] - $row_total3['t_refund_npv'];
          $refund_asuransi_final = $row_total['t_refund_asuransi'] - $row_total2['t_refund_asuransi'] - $row_total3['t_refund_asuransi'];
          $refund_adm_final = $row_total['t_refund_adm'] - $row_total2['t_refund_adm'] - $row_total3['t_refund_adm'];
          $ins_receivable_final = $row_total['t_ins_receivable'] - $row_total2['t_ins_receivable'] - $row_total3['t_ins_receivable'];
          $by_notaris_final = $row_total['t_by_notaris'] - $row_total2['t_by_notaris'] - $row_total3['t_by_notaris'];
          $pend_asuransi_final = $row_total['t_pend_asuransi'] - $row_total2['t_pend_asuransi'] - $row_total3['t_pend_asuransi'];
          $pend_survey_final = $row_total['t_pend_survey'] - $row_total2['t_pend_survey'] - $row_total3['t_pend_survey'];
          $pend_fidusia_final = $row_total['t_pend_fidusia'] - $row_total2['t_pend_fidusia'] - $row_total3['t_pend_fidusia'];
          $pend_provisi_final = $row_total['t_pend_provisi'] - $row_total2['t_pend_provisi'] - $row_total3['t_pend_provisi'];


        ?>
        <tr style="background-color: #bafc03; font-weight: bold;">
          <td style="text-align: right;"><?php echo number_format($refund_npv_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($refund_asuransi_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($refund_adm_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($ins_receivable_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($by_notaris_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_asuransi_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_survey_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_fidusia_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_provisi_final,0,'.',',') ?></td>
        </tr>

      </table>

    </td>

    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
  </tr>
</table>
<!-- / TABEL 2 : MKRJA -->
<br>





<!-- TABEL 3 : MTGNA -->
<table class="table" style="display: block; overflow-x: auto; white-space: nowrap;">
  <tr>
    <td>
      

      <table border="1">

        <tr style="font-weight: bold; background-color: orange">
          <td colspan="2">Finance Category : MTGNA - INST LOAN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td colspan="8" style="text-align: center;">SALDO AWAL</td>
        </tr>

        <tr style="font-weight: bold; background-color: silver">
          <td>Cabang</td>
          <td>Refund NPV</td>
          <td>Refund Asuransi</td>
          <td>Refund ADM</td>
          <td>Ins Receivable</td>
          <td>By Notaris</td>
          <td>Pend Asuransi</td>
          <td>Pend Survey</td>
          <td>Pend Fidusia</td>
          <td>Pend Provisi</td>
        </tr>

        <?php  

          $query = "SELECT cabang,
                      refund_npv AS t_refund_npv,
                      refund_asuransi AS t_refund_asuransi,
                      refund_adm AS t_refund_adm,
                      ins_receivable AS t_ins_receivable,
                      by_notaris AS t_by_notaris,
                      pend_asuransi AS t_pend_asuransi,
                      pend_survey AS t_pend_survey,
                      pend_fidusia AS t_pend_fidusia,
                      pend_provisi AS t_pend_provisi
                      FROM tbl_saldo_awal_cabang
                      WHERE fincat = 'MTGNA - INST LOAN' AND bulan=$bulan AND tahun=$tahun
                      GROUP BY cabang";
          $result = mysqli_query($koneksi,$query) or die ('error fungsi cabang');
          while($row = mysqli_fetch_array($result)){

        ?>
        <tr>
          <td><?php echo $row['cabang'] ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_npv'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_adm'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_ins_receivable'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_by_notaris'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_survey'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_fidusia'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_provisi'],0,'.',',') ?></td>
        </tr>
        <?php } ?>

        <?php  

          $q_total = "SELECT
                      SUM(refund_npv) AS t_refund_npv,
                      SUM(refund_asuransi) AS t_refund_asuransi,
                      SUM(refund_adm) AS t_refund_adm,
                      SUM(ins_receivable) AS t_ins_receivable,
                      SUM(by_notaris) AS t_by_notaris,
                      SUM(pend_asuransi) AS t_pend_asuransi,
                      SUM(pend_survey) AS t_pend_survey,
                      SUM(pend_fidusia) AS t_pend_fidusia,
                      SUM(pend_provisi) AS t_pend_provisi
                      FROM tbl_saldo_awal_cabang
                      WHERE fincat = 'MTGNA - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
          $result = mysqli_query($koneksi,$q_total) or die ('error fungsi cabang');
          $row_total = mysqli_fetch_array($result);

        ?>
        <tr style="background-color: #bafc03">
          <td style="font-weight: bold">MTGNA - INST LOAN TOTAL</td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_refund_npv'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_refund_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_refund_adm'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_ins_receivable'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_by_notaris'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_pend_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_pend_survey'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_pend_fidusia'],0,'.',',') ?></td>
          <td style="text-align: right; font-weight: bold"><?php echo number_format($row_total['t_pend_provisi'],0,'.',',') ?></td>
        </tr>
      </table>


    </td>

    <td>&nbsp;</td>

    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

    <td>
      
      <table border="1">

        <tr style="font-weight: bold; background-color: orange">
          <td colspan="9" style="text-align: center;">PENYUSUTAN BULAN BERJALAN (ACTIVE)</td>
        </tr>

        <tr style="font-weight: bold; background-color: silver">
          <td>Refund NPV</td>
          <td>Refund Asuransi</td>
          <td>Refund ADM</td>
          <td>Ins Receivable</td>
          <td>By Notaris</td>
          <td>Pend Asuransi</td>
          <td>Pend Survey</td>
          <td>Pend Fidusia</td>
          <td>Pend Provisi</td>
        </tr>

        <?php  

          $query = "SELECT cabang,
                      refund_npv AS t_refund_npv,
                      refund_asuransi AS t_refund_asuransi,
                      refund_adm AS t_refund_adm,
                      ins_receivable AS t_ins_receivable,
                      by_notaris AS t_by_notaris,
                      pend_asuransi AS t_pend_asuransi,
                      pend_survey AS t_pend_survey,
                      pend_fidusia AS t_pend_fidusia,
                      pend_provisi AS t_pend_provisi
                      FROM tbl_penyusutan_active_cabang
                      WHERE fincat = 'MTGNA - INST LOAN' AND bulan=$bulan AND tahun=$tahun
                      GROUP BY cabang";
          $result = mysqli_query($koneksi,$query) or die ('error fungsi cabang');
          while($row = mysqli_fetch_array($result)){

        ?>
        <tr>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_npv'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_adm'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_ins_receivable'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_by_notaris'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_survey'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_fidusia'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_provisi'],0,'.',',') ?></td>
        </tr>
        <?php } ?>

        <?php  

          $q_total2 = "SELECT cabang,
                      SUM(refund_npv) AS t_refund_npv,
                      SUM(refund_asuransi) AS t_refund_asuransi,
                      SUM(refund_adm) AS t_refund_adm,
                      SUM(ins_receivable) AS t_ins_receivable,
                      SUM(by_notaris) AS t_by_notaris,
                      SUM(pend_asuransi) AS t_pend_asuransi,
                      SUM(pend_survey) AS t_pend_survey,
                      SUM(pend_fidusia) AS t_pend_fidusia,
                      SUM(pend_provisi) AS t_pend_provisi
                      FROM tbl_penyusutan_active_cabang
                      WHERE fincat = 'MTGNA - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
          $result_total = mysqli_query($koneksi,$q_total2) or die ('error fungsi cabang');
          $row_total2 = mysqli_fetch_array($result_total);

        ?>
        <tr style="background-color: #bafc03; font-weight: bold;">
          <td style="text-align: right;"><?php echo number_format($row_total2['t_refund_npv'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_refund_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_refund_adm'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_ins_receivable'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_by_notaris'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_pend_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_pend_survey'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_pend_fidusia'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total2['t_pend_provisi'],0,'.',',') ?></td>
        </tr>
      </table>

    </td>

    <td>&nbsp;</td>

    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

    <td>
      
      <table border="1">

        <tr style="font-weight: bold; background-color: orange">
          <td colspan="9" style="text-align: center;">PENYUSUTAN BULAN BERJALAN (CLOSED)</td>
        </tr>

        <tr style="font-weight: bold; background-color: silver">
          <td>Refund NPV</td>
          <td>Refund Asuransi</td>
          <td>Refund ADM</td>
          <td>Ins Receivable</td>
          <td>By Notaris</td>
          <td>Pend Asuransi</td>
          <td>Pend Survey</td>
          <td>Pend Fidusia</td>
          <td>Pend Provisi</td>
        </tr>

        <?php  

          $query = "SELECT cabang,
                      refund_npv AS t_refund_npv,
                      refund_asuransi AS t_refund_asuransi,
                      refund_adm AS t_refund_adm,
                      ins_receivable AS t_ins_receivable,
                      by_notaris AS t_by_notaris,
                      pend_asuransi AS t_pend_asuransi,
                      pend_survey AS t_pend_survey,
                      pend_fidusia AS t_pend_fidusia,
                      pend_provisi AS t_pend_provisi
                      FROM tbl_penyusutan_closed_cabang
                      WHERE fincat = 'MTGNA - INST LOAN' AND bulan=$bulan AND tahun=$tahun
                      GROUP BY cabang";
          $result = mysqli_query($koneksi,$query) or die ('error fungsi cabang');
          while($row = mysqli_fetch_array($result)){

        ?>
        <tr>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_npv'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_refund_adm'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_ins_receivable'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_by_notaris'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_survey'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_fidusia'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row['t_pend_provisi'],0,'.',',') ?></td>
        </tr>
        <?php } ?>

        <?php  

          $q_total3 = "SELECT cabang,
                      SUM(refund_npv) AS t_refund_npv,
                      SUM(refund_asuransi) AS t_refund_asuransi,
                      SUM(refund_adm) AS t_refund_adm,
                      SUM(ins_receivable) AS t_ins_receivable,
                      SUM(by_notaris) AS t_by_notaris,
                      SUM(pend_asuransi) AS t_pend_asuransi,
                      SUM(pend_survey) AS t_pend_survey,
                      SUM(pend_fidusia) AS t_pend_fidusia,
                      SUM(pend_provisi) AS t_pend_provisi
                      FROM tbl_penyusutan_closed_cabang
                      WHERE fincat = 'MTGNA - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
          $result_total = mysqli_query($koneksi,$q_total3) or die ('error fungsi cabang');
          $row_total3 = mysqli_fetch_array($result_total);

        ?>
        <tr style="background-color: #bafc03; font-weight: bold;">
          <td style="text-align: right;"><?php echo number_format($row_total3['t_refund_npv'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_refund_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_refund_adm'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_ins_receivable'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_by_notaris'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_pend_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_pend_survey'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_pend_fidusia'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total3['t_pend_provisi'],0,'.',',') ?></td>
        </tr>
      </table>

    </td>

    <td>&nbsp;</td>

    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

    <td>
      
      <table border="1">

        <tr style="font-weight: bold; background-color: orange">
          <td colspan="9" style="text-align: center;">SALDO AKHIR</td>
        </tr>

        <tr style="font-weight: bold; background-color: silver">
          <td>Refund NPV</td>
          <td>Refund Asuransi</td>
          <td>Refund ADM</td>
          <td>Ins Receivable</td>
          <td>By Notaris</td>
          <td>Pend Asuransi</td>
          <td>Pend Survey</td>
          <td>Pend Fidusia</td>
          <td>Pend Provisi</td>
        </tr>

        <?php  

        $query = "SELECT cabang,
          refund_npv AS t_refund_npv,
          refund_asuransi AS t_refund_asuransi,
          refund_adm AS t_refund_adm,
          ins_receivable AS t_ins_receivable,
          by_notaris AS t_by_notaris,
          pend_asuransi AS t_pend_asuransi,
          pend_survey AS t_pend_survey,
          pend_fidusia AS t_pend_fidusia,
          pend_provisi AS t_pend_provisi
          FROM tbl_saldo_awal_cabang
          WHERE fincat = 'MTGNA - INST LOAN' AND bulan=$bulan AND tahun=$tahun
          GROUP BY cabang";

        $result = mysqli_query($koneksi,$query) or die ('error fungsi xx');
        while($row = mysqli_fetch_array($result)){
          $cabang = $row['cabang'];

          // Query Penyusutan Active
          $query_active = "SELECT cabang,
                      refund_npv AS t_refund_npv,
                      refund_asuransi AS t_refund_asuransi,
                      refund_adm AS t_refund_adm,
                      ins_receivable AS t_ins_receivable,
                      by_notaris AS t_by_notaris,
                      pend_asuransi AS t_pend_asuransi,
                      pend_survey AS t_pend_survey,
                      pend_fidusia AS t_pend_fidusia,
                      pend_provisi AS t_pend_provisi
                      FROM tbl_penyusutan_active_cabang
                      WHERE fincat = 'MTGNA - INST LOAN' AND cabang='$cabang' AND bulan=$bulan AND tahun=$tahun";
          $result_active = mysqli_query($koneksi,$query_active) or die ('error fungsi cabang');
          $row_active = mysqli_fetch_array($result_active);

          // Query Penyusutan Closed
          $query_closed = "SELECT cabang,
                      refund_npv AS t_refund_npv,
                      refund_asuransi AS t_refund_asuransi,
                      refund_adm AS t_refund_adm,
                      ins_receivable AS t_ins_receivable,
                      by_notaris AS t_by_notaris,
                      pend_asuransi AS t_pend_asuransi,
                      pend_survey AS t_pend_survey,
                      pend_fidusia AS t_pend_fidusia,
                      pend_provisi AS t_pend_provisi
                      FROM tbl_penyusutan_closed_cabang
                      WHERE fincat = 'MTGNA - INST LOAN' AND cabang='$cabang' AND bulan=$bulan AND tahun=$tahun";
          $result_closed = mysqli_query($koneksi,$query_closed) or die ('error fungsi cabang');
          $row_closed = mysqli_fetch_array($result_closed);

          // Data AWAL
          $refund_npv_awal = $row['t_refund_npv'];
          $refund_asuransi_awal = $row['t_refund_asuransi'];
          $refund_adm_awal = $row['t_refund_adm'];
          $ins_receivable_awal = $row['t_ins_receivable'];
          $by_notaris_awal = $row['t_by_notaris'];
          $pend_asuransi_awal = $row['t_pend_asuransi'];
          $pend_survey_awal = $row['t_pend_survey'];
          $pend_fidusia_awal = $row['t_pend_fidusia'];
          $pend_provisi_awal = $row['t_pend_provisi'];

          // Data ACTIVE
          $refund_npv_active = $row_active['t_refund_npv'];
          $refund_asuransi_active = $row_active['t_refund_asuransi'];
          $refund_adm_active = $row_active['t_refund_adm'];
          $ins_receivable_active = $row_active['t_ins_receivable'];
          $by_notaris_active = $row_active['t_by_notaris'];
          $pend_asuransi_active = $row_active['t_pend_asuransi'];
          $pend_survey_active = $row_active['t_pend_survey'];
          $pend_fidusia_active = $row_active['t_pend_fidusia'];
          $pend_provisi_active = $row_active['t_pend_provisi'];

          // Data Closed
          $refund_npv_closed = $row_closed['t_refund_npv'];
          $refund_asuransi_closed = $row_closed['t_refund_asuransi'];
          $refund_adm_closed = $row_closed['t_refund_adm'];
          $ins_receivable_closed = $row_closed['t_ins_receivable'];
          $by_notaris_closed = $row_closed['t_by_notaris'];
          $pend_asuransi_closed = $row_closed['t_pend_asuransi'];
          $pend_survey_closed = $row_closed['t_pend_survey'];
          $pend_fidusia_closed = $row_closed['t_pend_fidusia'];
          $pend_provisi_closed = $row_closed['t_pend_provisi'];

          // Data Saldo Akhir
          $refund_npv_akhir = $refund_npv_awal - $refund_npv_active - $refund_npv_closed;
          $refund_asuransi_akhir = $refund_asuransi_awal - $refund_asuransi_active - $refund_asuransi_closed;
          $refund_adm_akhir = $refund_adm_awal - $refund_adm_active - $refund_adm_closed;
          $ins_receivable_akhir = $ins_receivable_awal - $ins_receivable_active - $ins_receivable_closed;
          $by_notaris_akhir = $by_notaris_awal - $by_notaris_active - $by_notaris_closed;
          $pend_asuransi_akhir = $pend_asuransi_awal - $pend_asuransi_active - $pend_asuransi_closed;
          $pend_survey_akhir = $pend_survey_awal - $pend_survey_active - $pend_survey_closed;
          $pend_fidusia_akhir = $pend_fidusia_awal - $pend_fidusia_active - $pend_fidusia_closed;
          $pend_provisi_akhir = $pend_provisi_awal - $pend_provisi_active - $pend_provisi_closed;

        ?>
        <tr>
          <td style="text-align: right;"><?php echo number_format($refund_npv_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($refund_asuransi_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($refund_adm_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($ins_receivable_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($by_notaris_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_asuransi_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_survey_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_fidusia_akhir,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_provisi_akhir,0,'.',',') ?></td>
        </tr>
        <?php } ?>


        <?php 

          $refund_npv_final = $row_total['t_refund_npv'] - $row_total2['t_refund_npv'] - $row_total3['t_refund_npv'];
          $refund_asuransi_final = $row_total['t_refund_asuransi'] - $row_total2['t_refund_asuransi'] - $row_total3['t_refund_asuransi'];
          $refund_adm_final = $row_total['t_refund_adm'] - $row_total2['t_refund_adm'] - $row_total3['t_refund_adm'];
          $ins_receivable_final = $row_total['t_ins_receivable'] - $row_total2['t_ins_receivable'] - $row_total3['t_ins_receivable'];
          $by_notaris_final = $row_total['t_by_notaris'] - $row_total2['t_by_notaris'] - $row_total3['t_by_notaris'];
          $pend_asuransi_final = $row_total['t_pend_asuransi'] - $row_total2['t_pend_asuransi'] - $row_total3['t_pend_asuransi'];
          $pend_survey_final = $row_total['t_pend_survey'] - $row_total2['t_pend_survey'] - $row_total3['t_pend_survey'];
          $pend_fidusia_final = $row_total['t_pend_fidusia'] - $row_total2['t_pend_fidusia'] - $row_total3['t_pend_fidusia'];
          $pend_provisi_final = $row_total['t_pend_provisi'] - $row_total2['t_pend_provisi'] - $row_total3['t_pend_provisi'];


        ?>
        <tr style="background-color: #bafc03; font-weight: bold;">
          <td style="text-align: right;"><?php echo number_format($refund_npv_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($refund_asuransi_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($refund_adm_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($ins_receivable_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($by_notaris_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_asuransi_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_survey_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_fidusia_final,0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($pend_provisi_final,0,'.',',') ?></td>
        </tr>

      </table>

    </td>

    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
  </tr>
</table>
<!-- / TABEL 3 : MTGNA -->