<table class="table table-bordered">
  <tr style="font-weight: bold; background-color: orange; color: white">
    <td colspan="10" rowspan="1">Saldo Awal</td>
  </tr>

  <tr style="font-weight: bold; background-color: silver">
    <td style="text-align: center;" width="50%">FINCAT</td>
    <td>Accrue Restru</td>
  </tr>

  <?php  
    $r_salaw_invst_accrue = tampil_salaw_invst_accrue($bulan_accrue, $tahun_accrue);
    $data_salaw_invst_accrue = mysqli_fetch_array($r_salaw_invst_accrue);
  ?>
  <tr>
    <td>INVST - INST LOAN</td>
    <td style="text-align: right;"><?php echo number_format($data_salaw_invst_accrue['t_accrue_restru'],0,'.',',') ?></td>
  </tr>

  <?php  
    $r_salaw_mtgna_accrue = tampil_salaw_mtgna_accrue($bulan_accrue, $tahun_accrue);
    $data_salaw_mtgna_accrue = mysqli_fetch_array($r_salaw_mtgna_accrue);
  ?>
  <tr>
    <td>MTGNA - INST LOAN</td>
    <td style="text-align: right;"><?php echo number_format($data_salaw_mtgna_accrue['t_accrue_restru'],0,'.',',') ?></td>
  </tr>
<!-- .............................................................................................. -->
  <?php  
    $r_salaw_mkrja_accrue = tampil_salaw_mkrja_accrue($bulan_accrue, $tahun_accrue);
    $data_salaw_mkrja_accrue = mysqli_fetch_array($r_salaw_mkrja_accrue);
  ?>
  <tr>
    <td>MKRJA - MODAL USAHA</td>
    <td style="text-align: right;"><?php echo number_format($data_salaw_mkrja_accrue['t_accrue_restru'],0,'.',',') ?></td>
  </tr>

  <tr style="background-color:#eee; font-weight:bold">
    <td>TOTAL</td>
    <td style="text-align: right;"><?php echo number_format($data_salaw_invst_accrue['t_accrue_restru']+$data_salaw_mtgna_accrue['t_accrue_restru']+$data_salaw_mkrja_accrue['t_accrue_restru'],0,'.',',') ?></td>
  </tr>

</table>