<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading Page</title>
    <style>

        *{
            margin: 0;
            padding: 0;
        }

        .loading{
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.1);
            text-align: center;
            display: grid;
        }

        .loading img{
            position: relative;
            margin: 0 auto;
            top: -100px;
        }

        .loading span{
            margin-top: 100px;
            font-size: 2.5em;
            text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.4);
        }


    </style>
</head>
<body>
    
    <div class="loading">
        <span>Sedang Di Proses..</span>
        <img src="img/loading.gif" alt="">
    </div>


<?php  

    include 'koneksi.php';
    include 'fungsi.php';

    $res_gen = tampil_psak();
    while($row = mysqli_fetch_array($res_gen)){
        $sisa_tenor = $row['sisa_tenor'];
		$no_pin = $row['no_pin'];
        $refund_npv = $row['refund_npv'];
		$refund_asuransi = $row['refund_asuransi'];
		$refund_adm = $row['refund_adm'];
		$ins_receivable = $row['ins_receivable'];
		$by_notaris = $row['by_notaris'];
		$pend_asuransi = $row['pend_asuransi'];
		$pend_survey = $row['pend_survey'];
		$pend_fidusia = $row['pend_fidusia'];

        // Mengambil ID Awal, Akhir, dan Sebelum Akhir dari setiap account untuk parameter update
        $q_id = "SELECT MIN(id) AS id_awal,  MAX(id) AS id_akhir FROM tbl_psak_detail WHERE no_pin='$no_pin'";
        $res_id = mysqli_query($koneksi, $q_id) or die ('error 1');
        $row_id = mysqli_fetch_array($res_id);
        $id_awal = $row_id['id_awal'];
        $id_akhir = $row_id['id_akhir'];
        $id_sebelum_akhir = $id_akhir - 1;

        // Ambil totalan dari angsuran pertama sampe sebelum terakhir
        $q_pre_total = "SELECT 
            SUM(refund_npv) AS refund_npv_pre,
            SUM(refund_asuransi) AS refund_asuransi_pre,
            SUM(refund_adm) AS refund_adm_pre,
            SUM(ins_receivable) AS ins_receivable_pre,
            SUM(by_notaris) AS by_notaris_pre,
            SUM(pend_asuransi) AS pend_asuransi_pre,
            SUM(pend_survey) AS pend_survey_pre,
            SUM(pend_fidusia) AS pend_fidusia_pre
            FROM tbl_psak_detail WHERE no_pin='$no_pin' AND id BETWEEN $id_awal AND $id_sebelum_akhir";

        $res_pre_total = mysqli_query($koneksi, $q_pre_total) or die('error2');
        $row_pre_total = mysqli_fetch_array($res_pre_total);
        
        // Angsuran pertama sampai sebelum terakhir
        $pre_refund_npv = $row_pre_total['refund_npv_pre'];
        $pre_refund_asuransi = $row_pre_total['refund_asuransi_pre'];
        $pre_refund_adm = $row_pre_total['refund_adm_pre'];
        $pre_ins_receivable = $row_pre_total['ins_receivable_pre'];
        $pre_by_notaris = $row_pre_total['by_notaris_pre'];
        $pre_pend_asuransi = $row_pre_total['pend_asuransi_pre'];
        $pre_pend_survey = $row_pre_total['pend_survey_pre'];
        $pre_pend_fidusia = $row_pre_total['pend_fidusia_pre'];

        // angsuran_terakhir
        $refund_npv_final = $refund_npv - $pre_refund_npv;
        $refund_asuransi_final = $refund_asuransi - $pre_refund_asuransi;
        $refund_adm_final = $refund_adm - $pre_refund_adm;
        $ins_receivable_final = $ins_receivable - $pre_ins_receivable;
        $by_notaris_final = $by_notaris - $pre_by_notaris;
        $pend_asuransi_final = $pend_asuransi - $pre_pend_asuransi;
        $pend_survey_final = $pend_survey - $pre_pend_survey;
        $pend_fidusia_final = $pend_fidusia - $pre_pend_fidusia;

        // Update/Adjust angsuran terakhir
        $q_update_angsuran_terakhir = "UPDATE tbl_psak_detail SET 
                                        refund_npv = $refund_npv_final,
                                        refund_asuransi = $refund_asuransi_final,
                                        refund_adm = $refund_adm_final,
                                        ins_receivable = $ins_receivable_final,
                                        by_notaris = $by_notaris_final,
                                        pend_asuransi = $pend_asuransi_final,
                                        pend_survey = $pend_survey_final,
                                        pend_fidusia = $pend_fidusia_final
                                        WHERE no_pin='$no_pin' AND id=$id_akhir
                                        ";
        
        mysqli_query($koneksi, $q_update_angsuran_terakhir);

        // echo $no_pin.'-'.$id_awal.'-'.$id_akhir.'-'.$id_sebelum_akhir.'-'.$pre_ins_receivable.'-'.$ins_receivable_final;
        // echo '<br>';

        
    }

    echo '<script>
		window.location="generate_saldo_awal.php";
	</script>';

?>

</body>
</html>