<table class="table table-bordered" style="margin-top: 20px;">
  <tr style="font-weight: bold; background-color: orange; color: white">
    <td colspan="10" rowspan="1">Saldo Akhir</td>
  </tr>

  <tr style="font-weight: bold; background-color: silver">
    <td style="text-align: center; /*line-height: 50px*/">FINCAT</td>
    <td>Refund NPV</td>
    <td>Refund Asuransi</td>
    <td>Refund Adm</td>
    <td>Ins. Receivable</td>
    <td>By Notaris</td>
    <td>Pend Asuransi</td>
    <td>Pend Survei</td>
    <td>Pend Fidusia</td>
  </tr>

  <tr>
    <td>INVST - INST LOAN</td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_invst['t_refund_npv'] - $data_active_invst['t_refund_npv'] - $data_closedreguler_invst['t_refund_npv'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_invst['t_refund_asuransi'] - $data_active_invst['t_refund_asuransi'] - $data_closedreguler_invst['t_refund_asuransi'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_invst['t_refund_adm'] - $data_active_invst['t_refund_adm'] - $data_closedreguler_invst['t_refund_adm'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_invst['t_ins_receivable'] - $data_active_invst['t_ins_receivable'] - $data_closedreguler_invst['t_ins_receivable'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_invst['t_by_notaris'] - $data_active_invst['t_by_notaris'] - $data_closedreguler_invst['t_by_notaris'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_invst['t_pend_asuransi'] - $data_active_invst['t_pend_asuransi'] - $data_closedreguler_invst['t_pend_asuransi'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_invst['t_pend_survey'] - $data_active_invst['t_pend_survey'] - $data_closedreguler_invst['t_pend_survey'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_invst['t_pend_fidusia'] - $data_active_invst['t_pend_fidusia'] - $data_closedreguler_invst['t_pend_fidusia'],0,'.',',') ?></td>
  </tr>

  <tr>
    <td>MTGNA - INST LOAN</td>
    <td style="text-align: right;"><?php echo number_format($data_salaw_mtgna['t_refund_npv'] - $data_active_mtgna['t_refund_npv'] - $data_closedreguler_mtgna['t_refund_npv'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_mtgna['t_refund_asuransi'] - $data_active_mtgna['t_refund_asuransi'] - $data_closedreguler_mtgna['t_refund_asuransi'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_mtgna['t_refund_adm'] - $data_active_mtgna['t_refund_adm'] - $data_closedreguler_mtgna['t_refund_adm'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_mtgna['t_ins_receivable'] - $data_active_mtgna['t_ins_receivable'] - $data_closedreguler_mtgna['t_ins_receivable'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_mtgna['t_by_notaris'] - $data_active_mtgna['t_by_notaris'] - $data_closedreguler_mtgna['t_by_notaris'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_mtgna['t_pend_asuransi'] - $data_active_mtgna['t_pend_asuransi'] - $data_closedreguler_mtgna['t_pend_asuransi'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_mtgna['t_pend_survey'] - $data_active_mtgna['t_pend_survey'] - $data_closedreguler_mtgna['t_pend_survey'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_mtgna['t_pend_fidusia'] - $data_active_mtgna['t_pend_fidusia'] - $data_closedreguler_mtgna['t_pend_fidusia'],0,'.',',') ?></td>
  </tr>

  <tr>
    <td>MKRJA - MODAL USAHA</td>
    <td style="text-align: right;"><?php echo number_format($data_salaw_mkrja['t_refund_npv'] - $data_active_mkrja['t_refund_npv'] - $data_closedreguler_mkrja['t_refund_npv'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_mkrja['t_refund_asuransi'] - $data_active_mkrja['t_refund_asuransi'] - $data_closedreguler_mkrja['t_refund_asuransi'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_mkrja['t_refund_adm'] - $data_active_mkrja['t_refund_adm'] - $data_closedreguler_mkrja['t_refund_adm'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_mkrja['t_ins_receivable'] - $data_active_mkrja['t_ins_receivable'] - $data_closedreguler_mkrja['t_ins_receivable'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_mkrja['t_by_notaris'] - $data_active_mkrja['t_by_notaris'] - $data_closedreguler_mkrja['t_by_notaris'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_mkrja['t_pend_asuransi'] - $data_active_mkrja['t_pend_asuransi'] - $data_closedreguler_mkrja['t_pend_asuransi'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_mkrja['t_pend_survey'] - $data_active_mkrja['t_pend_survey'] - $data_closedreguler_mkrja['t_pend_survey'],0,'.',',') ?></td>

    <td style="text-align: right;"><?php echo number_format($data_salaw_mkrja['t_pend_fidusia'] - $data_active_mkrja['t_pend_fidusia'] - $data_closedreguler_mkrja['t_pend_fidusia'],0,'.',',') ?></td>
  </tr>

</table>