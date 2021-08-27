<table class="table" style="display: block; overflow-x: auto; white-space: nowrap;">
  <tr>
    <td>
      

      <table class="table table-bordered">

        <tr style="font-weight: bold; background-color: orange">
          <td colspan="2">Finance Category : MKRJA - MODAL USAHA</td>
          <td colspan="9" style="text-align: center;">SALDO AWAL</td>
        </tr>

        <tr style="font-weight: bold; background-color: silver">
          <td>Kode Cabang</td>
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

          $query = "SELECT kode_cabang, cabang,
                      SUM(refund_npv) AS t_refund_npv,
                      SUM(refund_asuransi) AS t_refund_asuransi,
                      SUM(refund_adm) AS t_refund_adm,
                      SUM(ins_receivable) AS t_ins_receivable,
                      SUM(by_notaris) AS t_by_notaris,
                      SUM(pend_asuransi) AS t_pend_asuransi,
                      SUM(pend_survey) AS t_pend_survey,
                      SUM(pend_fidusia) AS t_pend_fidusia,
                      SUM(pend_provisi) AS t_pend_provisi
                      FROM tbl_psak_detail 
                      WHERE fincat = 'MKRJA - MODAL USAHA'
                      GROUP BY kode_cabang";
          $result = mysqli_query($koneksi,$query) or die ('error fungsi cabang');
          while($row = mysqli_fetch_array($result)){

        ?>
        <tr>
          <td><?php echo $row['kode_cabang'] ?></td>
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

          $query_total1 = "SELECT kode_cabang, cabang,
                      SUM(refund_npv) AS t_refund_npv,
                      SUM(refund_asuransi) AS t_refund_asuransi,
                      SUM(refund_adm) AS t_refund_adm,
                      SUM(ins_receivable) AS t_ins_receivable,
                      SUM(by_notaris) AS t_by_notaris,
                      SUM(pend_asuransi) AS t_pend_asuransi,
                      SUM(pend_survey) AS t_pend_survey,
                      SUM(pend_fidusia) AS t_pend_fidusia,
                      SUM(pend_provisi) AS t_pend_provisi
                      FROM tbl_psak_detail 
                      WHERE fincat = 'MKRJA - MODAL USAHA'";
          $result_total1 = mysqli_query($koneksi,$query_total1) or die ('error fungsi cabang');
          $row_total1 = mysqli_fetch_array($result_total1);

        ?>
        <tr style="background-color: #bafc03; font-weight: bold;">
          <td colspan="2">MKRJA - MODAL USAHA TOTAL</td>
          
          <td style="text-align: right;"><?php echo number_format($row_total1['t_refund_npv'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total1['t_refund_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total1['t_refund_adm'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total1['t_ins_receivable'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total1['t_by_notaris'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total1['t_pend_asuransi'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total1['t_pend_survey'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total1['t_pend_fidusia'],0,'.',',') ?></td>
          <td style="text-align: right;"><?php echo number_format($row_total1['t_pend_provisi'],0,'.',',') ?></td>
        </tr>

      </table>


    </td>

    <td>
      
      <table class="table table-bordered">

        <tr style="font-weight: bold; background-color: orange">
          <td colspan="9" style="text-align: center;">PENYUSUTAN BULAN BERJALAN</td>
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

          $bulan = date('m');
          $tahun = date('Y');
          $query = "SELECT kode_cabang, cabang,
                      SUM(refund_npv) AS t_refund_npv,
                      SUM(refund_asuransi) AS t_refund_asuransi,
                      SUM(refund_adm) AS t_refund_adm,
                      SUM(ins_receivable) AS t_ins_receivable,
                      SUM(by_notaris) AS t_by_notaris,
                      SUM(pend_asuransi) AS t_pend_asuransi,
                      SUM(pend_survey) AS t_pend_survey,
                      SUM(pend_fidusia) AS t_pend_fidusia,
                      SUM(pend_provisi) AS t_pend_provisi
                      FROM tbl_psak_detail 
                      WHERE bulan=$bulan AND tahun=$tahun AND status_paid='paid' AND fincat = 'MKRJA - MODAL USAHA'
                      GROUP BY kode_cabang";
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

          $bulan = date('m');
          $tahun = date('Y');
          $query_total2 = "SELECT kode_cabang, cabang,
                      SUM(refund_npv) AS t_refund_npv,
                      SUM(refund_asuransi) AS t_refund_asuransi,
                      SUM(refund_adm) AS t_refund_adm,
                      SUM(ins_receivable) AS t_ins_receivable,
                      SUM(by_notaris) AS t_by_notaris,
                      SUM(pend_asuransi) AS t_pend_asuransi,
                      SUM(pend_survey) AS t_pend_survey,
                      SUM(pend_fidusia) AS t_pend_fidusia,
                      SUM(pend_provisi) AS t_pend_provisi
                      FROM tbl_psak_detail 
                      WHERE bulan=$bulan AND tahun=$tahun AND status_paid='paid' AND fincat = 'MKRJA - MODAL USAHA'";
          $result_total2 = mysqli_query($koneksi,$query_total2) or die ('error fungsi cabang');
          $row_total2 = mysqli_fetch_array($result_total2);

        ?>
        <tr style="background-color: #bafc03; font-weight: bold">
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


    <td>
      
      <table class="table table-bordered">

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

          $bulan = date('m');
          $tahun = date('Y');
          $query = "SELECT kode_cabang, cabang,
                      SUM(refund_npv) AS t_refund_npv,
                      SUM(refund_asuransi) AS t_refund_asuransi,
                      SUM(refund_adm) AS t_refund_adm,
                      SUM(ins_receivable) AS t_ins_receivable,
                      SUM(by_notaris) AS t_by_notaris,
                      SUM(pend_asuransi) AS t_pend_asuransi,
                      SUM(pend_survey) AS t_pend_survey,
                      SUM(pend_fidusia) AS t_pend_fidusia,
                      SUM(pend_provisi) AS t_pend_provisi
                      FROM tbl_psak_detail 
                      WHERE status_paid='belum' AND fincat = 'MKRJA - MODAL USAHA'
                      GROUP BY kode_cabang";
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

          $bulan = date('m');
          $tahun = date('Y');
          $query_total3 = "SELECT kode_cabang, cabang,
                      SUM(refund_npv) AS t_refund_npv,
                      SUM(refund_asuransi) AS t_refund_asuransi,
                      SUM(refund_adm) AS t_refund_adm,
                      SUM(ins_receivable) AS t_ins_receivable,
                      SUM(by_notaris) AS t_by_notaris,
                      SUM(pend_asuransi) AS t_pend_asuransi,
                      SUM(pend_survey) AS t_pend_survey,
                      SUM(pend_fidusia) AS t_pend_fidusia,
                      SUM(pend_provisi) AS t_pend_provisi
                      FROM tbl_psak_detail 
                      WHERE status_paid='belum' AND fincat = 'MKRJA - MODAL USAHA'";
          $result_total3 = mysqli_query($koneksi,$query_total3) or die ('error fungsi cabang');
          $row_total3 = mysqli_fetch_array($result_total3);

        ?>
        <tr style="background-color: #bafc03; font-weight: bold">
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
  </tr>
</table>