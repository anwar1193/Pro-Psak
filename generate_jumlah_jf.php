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

    $res_gen = tampil_jf();
    while($row = mysqli_fetch_array($res_gen)){
        $sisa_tenor = $row['sisa_tenor'];
		$no_pin = $row['no_pin'];
        $provisi_jf = $row['provisi_jf'];

        // Mengambil ID Awal, Akhir, dan Sebelum Akhir dari setiap account untuk parameter update
        $q_id = "SELECT MIN(id) AS id_awal,  MAX(id) AS id_akhir FROM tbl_jf_detail WHERE no_pin='$no_pin'";
        $res_id = mysqli_query($koneksi, $q_id) or die ('error 1');
        $row_id = mysqli_fetch_array($res_id);
        $id_awal = $row_id['id_awal'];
        $id_akhir = $row_id['id_akhir'];
        $id_sebelum_akhir = $id_akhir - 1;

        // Ambil totalan dari angsuran pertama sampe sebelum terakhir
        $q_pre_total = "SELECT 
            SUM(provisi_jf) AS provisi_jf_pre
            FROM tbl_jf_detail WHERE no_pin='$no_pin' AND id BETWEEN $id_awal AND $id_sebelum_akhir";

        $res_pre_total = mysqli_query($koneksi, $q_pre_total) or die('error2');
        $row_pre_total = mysqli_fetch_array($res_pre_total);
        
        // Angsuran pertama sampai sebelum terakhir
        $pre_provisi_jf = $row_pre_total['provisi_jf_pre'];

        // angsuran_terakhir
        $provisi_jf_final = $provisi_jf - $pre_provisi_jf;

        // Update/Adjust angsuran terakhir
        $q_update_angsuran_terakhir = "UPDATE tbl_jf_detail SET 
                                        provisi_jf = $provisi_jf_final
                                        WHERE no_pin='$no_pin' AND id=$id_akhir
                                        ";
        
        mysqli_query($koneksi, $q_update_angsuran_terakhir);

        // echo $no_pin.'-'.$id_awal.'-'.$id_akhir.'-'.$id_sebelum_akhir.'-'.$pre_ins_receivable.'-'.$ins_receivable_final;
        // echo '<br>';

        
    }

    echo '<script>
		window.location="generate_saldo_awal_jf.php";
	</script>';

?>

</body>
</html>