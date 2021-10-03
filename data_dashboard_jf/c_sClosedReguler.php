<table class="table table-bordered" style="margin-top: 20px;">
  <tr style="font-weight: bold; background-color: orange; color: white">
    <td colspan="10" rowspan="1">AccountSts : CLOSED <!--REGULER/AYDA/WO--></td>
  </tr>

  <tr style="font-weight: bold; background-color: silver">
    <td style="text-align: center;" width="50%">FINCAT</td>
    <td>Provisi JF</td>
  </tr>

  <?php  
    $r_closedreguler_invst = tampil_closedreguler_invst($bulan,$tahun);
    $data_closedreguler_invst = mysqli_fetch_array($r_closedreguler_invst);
  ?>
  <tr>
    <td>INVST - INST LOAN</td>
    <td style="text-align: right;"><?php echo number_format($data_closedreguler_invst['t_refund_npv'],0,'.',',') ?></td>
  </tr>

  <?php  
    $r_closedreguler_mtgna = tampil_closedreguler_mtgna($bulan,$tahun);
    $data_closedreguler_mtgna = mysqli_fetch_array($r_closedreguler_mtgna);
  ?>
  <tr>
    <td>MTGNA - INST LOAN</td>
    <td style="text-align: right;"><?php echo number_format($data_closedreguler_mtgna['t_refund_npv'],0,'.',',') ?></td>
  </tr>

  <?php  
    $r_closedreguler_mkrja = tampil_closedreguler_mkrja($bulan,$tahun);
    $data_closedreguler_mkrja = mysqli_fetch_array($r_closedreguler_mkrja);
  ?>
  <tr>
    <td>MKRJA - MODAL USAHA</td>
    <td style="text-align: right;"><?php echo number_format($data_closedreguler_mkrja['t_refund_npv'],0,'.',',') ?></td>
  </tr>

</table>