<table class="table table-bordered" style="margin-top: 20px;">
  <tr style="font-weight: bold; background-color: orange; color: white">
    <td colspan="10" rowspan="1">AccountSts : CLOSED <!--REGULER/AYDA/WO--></td>
  </tr>

  <tr style="font-weight: bold; background-color: silver">
    <td style="text-align: center;" width="50%">FINCAT</td>
    <td>Provisi JF</td>
  </tr>

  <?php  
    $r_closedreguler_invst_jf = tampil_closedreguler_invst_jf($bulan_jf,$tahun_jf);
    $data_closedreguler_invst_jf = mysqli_fetch_array($r_closedreguler_invst_jf);
  ?>
  <tr>
    <td>INVST - INST LOAN</td>
    <td style="text-align: right;"><?php echo number_format($data_closedreguler_invst_jf['t_provisi_jf'],0,'.',',') ?></td>
  </tr>

  <?php  
    $r_closedreguler_mtgna_jf = tampil_closedreguler_mtgna_jf($bulan_jf,$tahun_jf);
    $data_closedreguler_mtgna_jf = mysqli_fetch_array($r_closedreguler_mtgna_jf);
  ?>
  <tr>
    <td>MTGNA - INST LOAN</td>
    <td style="text-align: right;"><?php echo number_format($data_closedreguler_mtgna_jf['t_provisi_jf'],0,'.',',') ?></td>
  </tr>

  <?php  
    $r_closedreguler_mkrja_jf = tampil_closedreguler_mkrja_jf($bulan_jf,$tahun_jf);
    $data_closedreguler_mkrja_jf = mysqli_fetch_array($r_closedreguler_mkrja_jf);
  ?>
  <tr>
    <td>MKRJA - MODAL USAHA</td>
    <td style="text-align: right;"><?php echo number_format($data_closedreguler_mkrja_jf['t_provisi_jf'],0,'.',',') ?></td>
  </tr>

</table>