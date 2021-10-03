<table class="table table-bordered" style="margin-top: 20px;">
  <tr style="font-weight: bold; background-color: orange; color: white">
    <td colspan="10" rowspan="1">AccountSts : ACTIVE</td>
  </tr>

  <tr style="font-weight: bold; background-color: silver">
    <td style="text-align: center;">FINCAT</td>
    <td>Refund NPV</td>
    <td>Refund Asuransi</td>
    <td>Refund Adm</td>
    <td>Ins. Receivable</td>
    <td>By Notaris</td>
    <td>Pend Asuransi</td>
    <td>Pend Survei</td>
    <td>Pend Fidusia</td>
  </tr>

<?php  
    $r_active_invst = tampil_active_invst($bulan,$tahun);
    $data_active_invst = mysqli_fetch_array($r_active_invst);
?>
  <tr>
    <td>INVST - INST LOAN</td>
    <td style="text-align: right;"><?php echo number_format($data_active_invst['t_refund_npv'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_invst['t_refund_asuransi'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_invst['t_refund_adm'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_invst['t_ins_receivable'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_invst['t_by_notaris'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_invst['t_pend_asuransi'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_invst['t_pend_survey'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_invst['t_pend_fidusia'],0,'.',',') ?></td>
  </tr>

  <?php  
    $r_active_mtgna = tampil_active_mtgna($bulan,$tahun);
    $data_active_mtgna = mysqli_fetch_array($r_active_mtgna);
  ?>
  <tr>
    <td>MTGNA - INST LOAN</td>
    <td style="text-align: right;"><?php echo number_format($data_active_mtgna['t_refund_npv'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_mtgna['t_refund_asuransi'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_mtgna['t_refund_adm'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_mtgna['t_ins_receivable'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_mtgna['t_by_notaris'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_mtgna['t_pend_asuransi'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_mtgna['t_pend_survey'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_mtgna['t_pend_fidusia'],0,'.',',') ?></td>
  </tr>

  <?php  
    $r_active_mkrja = tampil_active_mkrja($bulan,$tahun);
    $data_active_mkrja = mysqli_fetch_array($r_active_mkrja);
  ?>
  <tr>
    <td>MKRJA - MODAL USAHA</td>
    <td style="text-align: right;"><?php echo number_format($data_active_mkrja['t_refund_npv'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_mkrja['t_refund_asuransi'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_mkrja['t_refund_adm'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_mkrja['t_ins_receivable'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_mkrja['t_by_notaris'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_mkrja['t_pend_asuransi'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_mkrja['t_pend_survey'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_active_mkrja['t_pend_fidusia'],0,'.',',') ?></td>
  </tr>

</table>