<?php  
	$bulan = $_POST['bulan'];
	$tahun = $_POST['tahun'];
?>

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
	date_default_timezone_set("Asia/Jakarta");

	// Hapus Data Sebelumnya, Dimana PAIDTXNDATE nya sama dengan bulan & tahun yang dipilih, hal ini dilakukan untuk menghindari duplikasi data jika bulan & tahun yang sama dipilih dan di proses secara berulang-ulang
	$query = "DELETE FROM tbl_payment_accrue WHERE MONTH(paidtxndate)='$bulan' AND YEAR(paidtxndate)='$tahun'";
	$hapus_data_lama = mysqli_query($koneksi,$query);

	// Cari nopin yang harus di tarik
	$query_nopin = "SELECT no_pin FROM tbl_accrue";
	$res_nopin = mysqli_query($koneksi, $query_nopin) or die ('error nopin');

	if($hapus_data_lama){

?>

<?php
	// Koneksi ke Server db dleas (10.20.0.8)
	include '../koneksi_kirim.php';
	$tahun_sekarang = date('Y');

	$noPin = "";

	while($row_nopin = mysqli_fetch_array($res_nopin)){
		$noPin .= $row_nopin['no_pin']."','";
	}

	// $query = "SELECT NoPin,AccountSts FROM [DLEAS].[dbo].[v_rptAllDataCreditReview] WHERE NoPin IN ('".substr($noPin,0,strlen($noPin)-3)."')";

	$query = "SELECT
				v_rptAllDataCreditReviewORI.NoPin,
				v_rptAllDataCreditReviewORI.AccountName,
				INSTALLMENT.PAIDTXNDATE,
				INSTALLMENT.PERIOD
			FROM 
				INSTALLMENT INNER JOIN v_rptAllDataCreditReviewORI ON INSTALLMENT.ACCID = v_rptAllDataCreditReviewORI.ACCID
			WHERE 
				v_rptAllDataCreditReviewORI.NoPin IN ('".substr($noPin,0,strlen($noPin)-3)."')
				AND
				MONTH(INSTALLMENT.PAIDTXNDATE)='$bulan' AND YEAR(INSTALLMENT.PAIDTXNDATE)='$tahun'
				AND
				INSTALLMENT.PRINCIPALPAID > 0
				AND
				INSTALLMENT.INTERESTPAID = INSTALLMENT.INTEREST
				AND 
				v_rptAllDataCreditReviewORI.AccountSts = 'ACTIVE'";

	$result = sqlsrv_query($koneksi,$query) or die ('error fungsi');

	$tanggal_tarik = date('Y-m-d h:i:s');

	while($row = sqlsrv_fetch_array($result)){

		$nilai1 = $row['NoPin'];
		$nilai2 = $row['AccountName'];
		$nilai3 = $row['PAIDTXNDATE']->format("Y-m-d");
		$nilai4 = $row['PERIOD'];
		$nilai5 = $tanggal_tarik;

		// pengiriman ke situsku.com via CURL
		$url = "10.20.0.30/Pro-Psak/transfer_dleas/transfer_payment_accrue/terima.php";

		$curlHandle = curl_init();
		curl_setopt($curlHandle, CURLOPT_URL, $url);
		curl_setopt($curlHandle, CURLOPT_POSTFIELDS, "data1=".$nilai1."&data2=".$nilai2."&data3=".$nilai3."&data4=".$nilai4."&data5=".$nilai5);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
		curl_setopt($curlHandle, CURLOPT_POST, 1);
		curl_exec($curlHandle);
		curl_close($curlHandle);

	}

?>

<?php 

	// echo "<h1>Transfer Done !!</h1>";

	echo "<script>
		alert('Proses Tarik Data Payment Berhasil');
		document.location.href = '../../data_payment.php';
	</script>";
	
	} 
?>

</body>
</html>