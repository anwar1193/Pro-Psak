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
                SUM(provisi_jf) AS t_provisi_jf
                FROM tbl_jf_detail GROUP BY fincat";
    $result = mysqli_query($koneksi,$query) or die ('error fungsi tampil saldo awal');
    while($row = mysqli_fetch_array($result)){
       
        $fincat = $row['fincat'];
        $provisi_jf = $row['t_provisi_jf'];
        

        // Simpan ke tbl_saldo_awal_jf
        $query_simpan = "INSERT INTO tbl_saldo_awal_jf(fincat, bulan, tahun, provisi_jf) VALUES('$fincat', '$bulan', '$tahun', $provisi_jf)";

        mysqli_query($koneksi, $query_simpan);
    }

    echo '<script>
		window.location="generate_saldo_awal_cabang_jf.php";
	</script>';
?>

</body>
</html>