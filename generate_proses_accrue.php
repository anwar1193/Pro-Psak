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

	$res_gen = tampil_accrue_gen();
	while($row = mysqli_fetch_array($res_gen)){

		$sisa_tenor = $row['sisa_tenor'];
		$no_pin = $row['no_pin'];
		$account_sts = $row['account_sts'];
		$kode_cabang = $row['kode_cabang'];
		$cabang = $row['cabang'];
		$fincat = $row['fincat'];
		$accrue_restru = $row['accrue_restru'];

		$ang_accrue_restru = $accrue_restru/$sisa_tenor;

		$status_paid = 'belum';

		$bulan = date('m')-1;
		$tahun = date('Y');

		// Generate dan Simpan Angsuran
		for($i = 1;$i <= $sisa_tenor;$i++)
		{	
			$bulan+=1;

			$query = "INSERT INTO tbl_accrue_detail(no_pin, account_sts, kode_cabang, cabang, fincat, bulan, tahun, accrue_restru, status_paid) 
				VALUES('$no_pin', '$account_sts', '$kode_cabang', '$cabang', '$fincat', '$bulan', $tahun, $ang_accrue_restru, '$status_paid')";

			mysqli_query($koneksi,$query);
			
		}

		// Update Status Generate Accrue Jadi generated
		$q_updateSts = "UPDATE tbl_accrue SET status_generate='generated' WHERE no_pin='$no_pin'";
		mysqli_query($koneksi,$q_updateSts);

	}

	// Lanjut ke generate waktu
	echo '<script>
		window.location="generate_waktu_accrue.php";
	</script>';

?>



</body>
</html>