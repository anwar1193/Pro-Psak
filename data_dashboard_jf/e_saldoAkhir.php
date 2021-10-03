<table class="table table-bordered" style="margin-top: 20px;">
  <tr style="font-weight: bold; background-color: orange; color: white">
    <td colspan="10" rowspan="1">Saldo Akhir</td>
  </tr>

  <tr style="font-weight: bold; background-color: silver">
    <td style="text-align: center;" width="50%">FINCAT</td>
    <td>Provisi JF</td>
  </tr>

  <tr>
    <td>INVST - INST LOAN</td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_invst['t_refund_npv'] - $data_active_invst['t_refund_npv'] - $data_closedreguler_invst['t_refund_npv'],0,'.',',') ?></td>
  </tr>

  <tr>
    <td>MTGNA - INST LOAN</td>
    <td style="text-align: right;"><?php echo number_format($data_salaw_mtgna['t_refund_npv'] - $data_active_mtgna['t_refund_npv'] - $data_closedreguler_mtgna['t_refund_npv'],0,'.',',') ?></td>
  </tr>

  <tr>
    <td>MKRJA - MODAL USAHA</td>
    <td style="text-align: right;"><?php echo number_format($data_salaw_mkrja['t_refund_npv'] - $data_active_mkrja['t_refund_npv'] - $data_closedreguler_mkrja['t_refund_npv'],0,'.',',') ?></td>
  </tr>

</table>