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
        <img src="../../img/loading.gif" alt="">
    </div>


<?php

	include '../koneksi_terima.php';
	$query = "DELETE FROM tbl_nopin";
	$hapus_data_lama = mysqli_query($koneksi,$query);

	// Cari nopin yang harus di tarik
	$query_nopin = "SELECT no_pin FROM tbl_psak";
	$res_nopin = mysqli_query($koneksi, $query_nopin) or die ('error nopin');

	if($hapus_data_lama){

?>

		<?php
		// Koneksi ke Server db dleas (10.20.0.8)
		include '../koneksi_kirim.php';
		$tahun_sekarang = date('Y');

		while($row_nopin = mysqli_fetch_array($res_nopin)){

			$no_pin = $row_nopin['no_pin'];

			$query = "SELECT NoPin,AccountSts FROM [DLEAS].[dbo].[v_rptAllDataCreditReview] WHERE NoPin='$no_pin'";
			$result = sqlsrv_query($koneksi,$query) or die ('error fungsi');

			// Ambil Tanggal dari Dleas
			$q_dateDleas = "SELECT APPVALUE FROM APPSETTING WHERE APPCODE='APPDATE'";
			$res_dateDleas = sqlsrv_query($koneksi, $q_dateDleas);
			$row_dateDleas = sqlsrv_fetch_array($res_dateDleas);
			$dateDleas = $row_dateDleas['APPVALUE']; // 17/06/2021

			while($row = sqlsrv_fetch_array($result)){

				$nilai1 = $row['NoPin'];
				$nilai2 = $row['AccountSts'];
				$nilai3 = $dateDleas;

				// pengiriman ke situsku.com via CURL
				$url = "10.20.0.30/Pro-Psak/transfer_dleas/transfer_nopin/terima.php";

				$curlHandle = curl_init();
				curl_setopt($curlHandle, CURLOPT_URL, $url);
				curl_setopt($curlHandle, CURLOPT_POSTFIELDS, "data1=".$nilai1."&data2=".$nilai2."&data3=".$nilai3);
				curl_setopt($curlHandle, CURLOPT_HEADER, 0);
				curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
				curl_setopt($curlHandle, CURLOPT_POST, 1);
				curl_exec($curlHandle);
				curl_close($curlHandle);

			}

			?>

			<?php

				}

			?>

		<?php 

			// echo "<h1>Transfer Done !!</h1>";

			echo "<script>
				alert('Update Account Status Berhasil');
				document.location.href = '../../home.php';
			</script>";
			
			} 
		?>

</body>
</html>