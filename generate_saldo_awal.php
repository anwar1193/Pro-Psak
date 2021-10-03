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
    $month = date('m');
    $bulan = $month*1; //supaya tidak ada angka 0 di depan
    $tahun = date('Y');

    $query = "SELECT 
                fincat,
                SUM(refund_npv) AS t_refund_npv,
                SUM(refund_asuransi) AS t_refund_asuransi,
                SUM(refund_adm) AS t_refund_adm,
                SUM(ins_receivable) AS t_ins_receivable,
                SUM(by_notaris) AS t_by_notaris,
                SUM(pend_asuransi) AS t_pend_asuransi,
                SUM(pend_survey) AS t_pend_survey,
                SUM(pend_fidusia) AS t_pend_fidusia
                FROM tbl_psak_detail GROUP BY fincat";
    $result = mysqli_query($koneksi,$query) or die ('error fungsi tampil saldo awal');
    while($row = mysqli_fetch_array($result)){
       
        $fincat = $row['fincat'];
        $refund_npv = $row['t_refund_npv'];
        $refund_asuransi = $row['t_refund_asuransi'];
        $refund_adm = $row['t_refund_adm'];
        $ins_receivable = $row['t_ins_receivable'];
        $by_notaris = $row['t_by_notaris'];
        $pend_asuransi = $row['t_pend_asuransi'];
        $pend_survey = $row['t_pend_survey'];
        $pend_fidusia = $row['t_pend_fidusia'];
        

        // Simpan ke tbl_saldo_awal
        $query_simpan = "INSERT INTO tbl_saldo_awal(fincat, bulan, tahun, refund_npv, refund_asuransi, refund_adm, ins_receivable, by_notaris, pend_asuransi, pend_survey, pend_fidusia) VALUES('$fincat', '$bulan', '$tahun', $refund_npv, $refund_asuransi, $refund_adm, $ins_receivable, $by_notaris, $pend_asuransi, $pend_survey, $pend_fidusia)";

        mysqli_query($koneksi, $query_simpan);
    }

    echo '<script>
		window.location="generate_saldo_awal_cabang.php";
	</script>';
?>

</body>
</html>