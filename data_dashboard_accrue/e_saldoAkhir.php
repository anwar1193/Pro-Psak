<table class="table table-bordered" style="margin-top: 20px;">
  <tr style="font-weight: bold; background-color: orange; color: white">
    <td colspan="10" rowspan="1">Saldo Akhir</td>
  </tr>

  <tr style="font-weight: bold; background-color: silver">
    <td style="text-align: center;" width="50%">FINCAT</td>
    <td>Accrue Restru</td>
  </tr>

  <tr>
    <td>INVST - INST LOAN</td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_invst_accrue['t_accrue_restru'] - $data_active_invst_accrue['t_accrue_restru'] - $data_closedreguler_invst_accrue['t_accrue_restru'],0,'.',',') ?></td>
  </tr>

  <tr>
    <td>MTGNA - INST LOAN</td>
    <td style="text-align: right;"><?php echo number_format($data_salaw_mtgna_accrue['t_accrue_restru'] - $data_active_mtgna_accrue['t_accrue_restru'] - $data_closedreguler_mtgna_accrue['t_accrue_restru'],0,'.',',') ?></td>
  </tr>

  <tr>
    <td>MKRJA - MODAL USAHA</td>
    <td style="text-align: right;"><?php echo number_format($data_salaw_mkrja_accrue['t_accrue_restru'] - $data_active_mkrja_accrue['t_accrue_restru'] - $data_closedreguler_mkrja_accrue['t_accrue_restru'],0,'.',',') ?></td>
  </tr>

  <tr style="background-color:#eee; font-weight:bold">
    <td>TOTAL</td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_invst_accrue['t_accrue_restru'] - $data_active_invst_accrue['t_accrue_restru'] - $data_closedreguler_invst_accrue['t_accrue_restru'] + $data_salaw_mtgna_accrue['t_accrue_restru'] - $data_active_mtgna_accrue['t_accrue_restru'] - $data_closedreguler_mtgna_accrue['t_accrue_restru'] + $data_salaw_mkrja_accrue['t_accrue_restru'] - $data_active_mkrja_accrue['t_accrue_restru'] - $data_closedreguler_mkrja_accrue['t_accrue_restru'],0,'.',',') ?></td>
  </tr>

</table>