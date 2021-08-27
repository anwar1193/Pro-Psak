<table class="table table-bordered" style="margin-top: 20px;">
  <tr style="font-weight: bold; background-color: orange; color: white">
    <td colspan="10" rowspan="1">AccountSts : CLOSED ET</td>
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
    <td>Pend Provisi</td>
  </tr>

  <?php  
    $r_closedet_invst = tampil_closedet_invst();
    $data_closedet_invst = mysqli_fetch_array($r_closedet_invst);
  ?>
  <tr>
    <td>INVST - INST LOAN</td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_invst['t_refund_npv'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_invst['t_refund_asuransi'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_invst['t_refund_adm'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_invst['t_ins_receivable'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_invst['t_by_notaris'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_invst['t_pend_asuransi'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_invst['t_pend_survey'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_invst['t_pend_fidusia'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_invst['t_pend_provisi'],0,'.',',') ?></td>
  </tr>

  <?php  
    $r_closedet_mtgna = tampil_closedet_mtgna();
    $data_closedet_mtgna = mysqli_fetch_array($r_closedet_mtgna);
  ?>
  <tr>
    <td>MTGNA - INST LOAN</td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_mtgna['t_refund_npv'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_mtgna['t_refund_asuransi'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_mtgna['t_refund_adm'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_mtgna['t_ins_receivable'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_mtgna['t_by_notaris'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_mtgna['t_pend_asuransi'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_mtgna['t_pend_survey'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_mtgna['t_pend_fidusia'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_mtgna['t_pend_provisi'],0,'.',',') ?></td>
  </tr>


  <?php  
    $r_closedet_mkrja = tampil_closedet_mkrja();
    $data_closedet_mkrja = mysqli_fetch_array($r_closedet_mkrja);
  ?>
  <tr>
    <td>MKRJA - MODAL USAHA</td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_mkrja['t_refund_npv'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_mkrja['t_refund_asuransi'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_mkrja['t_refund_adm'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_mkrja['t_ins_receivable'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_mkrja['t_by_notaris'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_mkrja['t_pend_asuransi'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_mkrja['t_pend_survey'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_mkrja['t_pend_fidusia'],0,'.',',') ?></td>
    <td style="text-align: right;"><?php echo number_format($data_closedet_mkrja['t_pend_provisi'],0,'.',',') ?></td>
  </tr>

</table>