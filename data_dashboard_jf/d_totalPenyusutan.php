<table class="table table-bordered" style="margin-top: 20px;">
  <tr style="font-weight: bold; background-color: orange; color: white">
    <td colspan="10" rowspan="1">TOTAL PENYUSUTAN (ACTIVE + CLOSED)</td>
  </tr>

  <tr style="font-weight: bold; background-color: silver">
    <td style="text-align: center;" width="50%">FINCAT</td>
    <td>Provisi JF</td>
  </tr>

<?php  
    $r_active_invst = tampil_active_invst($bulan,$tahun);
    $data_active_invst = mysqli_fetch_array($r_active_invst);

    $r_closedreguler_invst = tampil_closedreguler_invst($bulan,$tahun);
    $data_closedreguler_invst = mysqli_fetch_array($r_closedreguler_invst);
?>
  <tr>
    <td>INVST - INST LOAN</td>
    <td style="text-align: right;"><?php echo number_format($data_active_invst['t_refund_npv'] + $data_closedreguler_invst['t_refund_npv'],0,'.',',') ?></td>
  </tr>

  <?php  
    $r_active_mtgna = tampil_active_mtgna($bulan,$tahun);
    $data_active_mtgna = mysqli_fetch_array($r_active_mtgna);
  ?>
  <tr>
    <td>MTGNA - INST LOAN</td>
    <td style="text-align: right;"><?php echo number_format($data_active_mtgna['t_refund_npv'] + $data_closedreguler_mtgna['t_refund_npv'],0,'.',',') ?></td>
  </tr>

  <?php  
    $r_active_mkrja = tampil_active_mkrja($bulan,$tahun);
    $data_active_mkrja = mysqli_fetch_array($r_active_mkrja);
  ?>
  <tr>
    <td>MKRJA - MODAL USAHA</td>
    <td style="text-align: right;"><?php echo number_format($data_active_mkrja['t_refund_npv'] + $data_closedreguler_mkrja['t_refund_npv'],0,'.',',') ?></td>
  </tr>

</table>