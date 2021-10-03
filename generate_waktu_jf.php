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
	date_default_timezone_set('Asia/Jakarta');

	$tahun_sekarang = date('Y');
	$tahun_tambah1 = $tahun_sekarang + 1;
	$tahun_tambah2 = $tahun_sekarang + 2;
	$tahun_tambah3 = $tahun_sekarang + 3;
	$tahun_tambah4 = $tahun_sekarang + 4;
	$tahun_tambah5 = $tahun_sekarang + 5;

	$q1 = "UPDATE tbl_jf_detail SET bulan='1', tahun='$tahun_tambah1' WHERE bulan='13' AND tahun='$tahun_sekarang'";
	$q2 = "UPDATE tbl_jf_detail SET bulan='2', tahun='$tahun_tambah1' WHERE bulan='14' AND tahun='$tahun_sekarang'";
	$q3 = "UPDATE tbl_jf_detail SET bulan='3', tahun='$tahun_tambah1' WHERE bulan='15' AND tahun='$tahun_sekarang'";
	$q4 = "UPDATE tbl_jf_detail SET bulan='4', tahun='$tahun_tambah1' WHERE bulan='16' AND tahun='$tahun_sekarang'";
	$q5 = "UPDATE tbl_jf_detail SET bulan='5', tahun='$tahun_tambah1' WHERE bulan='17' AND tahun='$tahun_sekarang'";
	$q6 = "UPDATE tbl_jf_detail SET bulan='6', tahun='$tahun_tambah1' WHERE bulan='18' AND tahun='$tahun_sekarang'";
	$q7 = "UPDATE tbl_jf_detail SET bulan='7', tahun='$tahun_tambah1' WHERE bulan='19' AND tahun='$tahun_sekarang'";
	$q8 = "UPDATE tbl_jf_detail SET bulan='8', tahun='$tahun_tambah1' WHERE bulan='20' AND tahun='$tahun_sekarang'";
	$q9 = "UPDATE tbl_jf_detail SET bulan='9', tahun='$tahun_tambah1' WHERE bulan='21' AND tahun='$tahun_sekarang'";
	$q10 = "UPDATE tbl_jf_detail SET bulan='10', tahun='$tahun_tambah1' WHERE bulan='22' AND tahun='$tahun_sekarang'";
	$q11 = "UPDATE tbl_jf_detail SET bulan='11', tahun='$tahun_tambah1' WHERE bulan='23' AND tahun='$tahun_sekarang'";
	$q12 = "UPDATE tbl_jf_detail SET bulan='12', tahun='$tahun_tambah1' WHERE bulan='24' AND tahun='$tahun_sekarang'";

	$q13 = "UPDATE tbl_jf_detail SET bulan='1', tahun='$tahun_tambah2' WHERE bulan='25' AND tahun='$tahun_sekarang'";
	$q14 = "UPDATE tbl_jf_detail SET bulan='2', tahun='$tahun_tambah2' WHERE bulan='26' AND tahun='$tahun_sekarang'";
	$q15 = "UPDATE tbl_jf_detail SET bulan='3', tahun='$tahun_tambah2' WHERE bulan='27' AND tahun='$tahun_sekarang'";
	$q16 = "UPDATE tbl_jf_detail SET bulan='4', tahun='$tahun_tambah2' WHERE bulan='28' AND tahun='$tahun_sekarang'";
	$q17 = "UPDATE tbl_jf_detail SET bulan='5', tahun='$tahun_tambah2' WHERE bulan='29' AND tahun='$tahun_sekarang'";
	$q18 = "UPDATE tbl_jf_detail SET bulan='6', tahun='$tahun_tambah2' WHERE bulan='30' AND tahun='$tahun_sekarang'";
	$q19 = "UPDATE tbl_jf_detail SET bulan='7', tahun='$tahun_tambah2' WHERE bulan='31' AND tahun='$tahun_sekarang'";
	$q20 = "UPDATE tbl_jf_detail SET bulan='8', tahun='$tahun_tambah2' WHERE bulan='32' AND tahun='$tahun_sekarang'";
	$q21 = "UPDATE tbl_jf_detail SET bulan='9', tahun='$tahun_tambah2' WHERE bulan='33' AND tahun='$tahun_sekarang'";
	$q22 = "UPDATE tbl_jf_detail SET bulan='10', tahun='$tahun_tambah2' WHERE bulan='34' AND tahun='$tahun_sekarang'";
	$q23 = "UPDATE tbl_jf_detail SET bulan='11', tahun='$tahun_tambah2' WHERE bulan='35' AND tahun='$tahun_sekarang'";
	$q24 = "UPDATE tbl_jf_detail SET bulan='12', tahun='$tahun_tambah2' WHERE bulan='36' AND tahun='$tahun_sekarang'";

	$q25 = "UPDATE tbl_jf_detail SET bulan='1', tahun='$tahun_tambah3' WHERE bulan='37' AND tahun='$tahun_sekarang'";
	$q26 = "UPDATE tbl_jf_detail SET bulan='2', tahun='$tahun_tambah3' WHERE bulan='38' AND tahun='$tahun_sekarang'";
	$q27 = "UPDATE tbl_jf_detail SET bulan='3', tahun='$tahun_tambah3' WHERE bulan='39' AND tahun='$tahun_sekarang'";
	$q28 = "UPDATE tbl_jf_detail SET bulan='4', tahun='$tahun_tambah3' WHERE bulan='40' AND tahun='$tahun_sekarang'";
	$q29 = "UPDATE tbl_jf_detail SET bulan='5', tahun='$tahun_tambah3' WHERE bulan='41' AND tahun='$tahun_sekarang'";
	$q30 = "UPDATE tbl_jf_detail SET bulan='6', tahun='$tahun_tambah3' WHERE bulan='42' AND tahun='$tahun_sekarang'";
	$q31 = "UPDATE tbl_jf_detail SET bulan='7', tahun='$tahun_tambah3' WHERE bulan='43' AND tahun='$tahun_sekarang'";
	$q32 = "UPDATE tbl_jf_detail SET bulan='8', tahun='$tahun_tambah3' WHERE bulan='44' AND tahun='$tahun_sekarang'";
	$q33 = "UPDATE tbl_jf_detail SET bulan='9', tahun='$tahun_tambah3' WHERE bulan='45' AND tahun='$tahun_sekarang'";
	$q34 = "UPDATE tbl_jf_detail SET bulan='10', tahun='$tahun_tambah3' WHERE bulan='46' AND tahun='$tahun_sekarang'";
	$q35 = "UPDATE tbl_jf_detail SET bulan='11', tahun='$tahun_tambah3' WHERE bulan='47' AND tahun='$tahun_sekarang'";
	$q36 = "UPDATE tbl_jf_detail SET bulan='12', tahun='$tahun_tambah3' WHERE bulan='48' AND tahun='$tahun_sekarang'";

	$q37 = "UPDATE tbl_jf_detail SET bulan='1', tahun='$tahun_tambah4' WHERE bulan='49' AND tahun='$tahun_sekarang'";
	$q38 = "UPDATE tbl_jf_detail SET bulan='2', tahun='$tahun_tambah4' WHERE bulan='50' AND tahun='$tahun_sekarang'";
	$q39 = "UPDATE tbl_jf_detail SET bulan='3', tahun='$tahun_tambah4' WHERE bulan='51' AND tahun='$tahun_sekarang'";
	$q40 = "UPDATE tbl_jf_detail SET bulan='4', tahun='$tahun_tambah4' WHERE bulan='52' AND tahun='$tahun_sekarang'";
	$q41 = "UPDATE tbl_jf_detail SET bulan='5', tahun='$tahun_tambah4' WHERE bulan='53' AND tahun='$tahun_sekarang'";
	$q42 = "UPDATE tbl_jf_detail SET bulan='6', tahun='$tahun_tambah4' WHERE bulan='54' AND tahun='$tahun_sekarang'";
	$q43 = "UPDATE tbl_jf_detail SET bulan='7', tahun='$tahun_tambah4' WHERE bulan='55' AND tahun='$tahun_sekarang'";
	$q44 = "UPDATE tbl_jf_detail SET bulan='8', tahun='$tahun_tambah4' WHERE bulan='56' AND tahun='$tahun_sekarang'";
	$q45 = "UPDATE tbl_jf_detail SET bulan='9', tahun='$tahun_tambah4' WHERE bulan='57' AND tahun='$tahun_sekarang'";
	$q46 = "UPDATE tbl_jf_detail SET bulan='10', tahun='$tahun_tambah4' WHERE bulan='58' AND tahun='$tahun_sekarang'";
	$q47 = "UPDATE tbl_jf_detail SET bulan='11', tahun='$tahun_tambah4' WHERE bulan='59' AND tahun='$tahun_sekarang'";
	$q48 = "UPDATE tbl_jf_detail SET bulan='12', tahun='$tahun_tambah4' WHERE bulan='60' AND tahun='$tahun_sekarang'";
	
	$q49 = "UPDATE tbl_jf_detail SET bulan='1', tahun='$tahun_tambah5' WHERE bulan='61' AND tahun='$tahun_sekarang'";
	$q50 = "UPDATE tbl_jf_detail SET bulan='2', tahun='$tahun_tambah5' WHERE bulan='62' AND tahun='$tahun_sekarang'";
	$q51 = "UPDATE tbl_jf_detail SET bulan='3', tahun='$tahun_tambah5' WHERE bulan='63' AND tahun='$tahun_sekarang'";
	$q52 = "UPDATE tbl_jf_detail SET bulan='4', tahun='$tahun_tambah5' WHERE bulan='64' AND tahun='$tahun_sekarang'";
	$q53 = "UPDATE tbl_jf_detail SET bulan='5', tahun='$tahun_tambah5' WHERE bulan='65' AND tahun='$tahun_sekarang'";
	$q54 = "UPDATE tbl_jf_detail SET bulan='6', tahun='$tahun_tambah5' WHERE bulan='66' AND tahun='$tahun_sekarang'";
	$q55 = "UPDATE tbl_jf_detail SET bulan='7', tahun='$tahun_tambah5' WHERE bulan='67' AND tahun='$tahun_sekarang'";
	$q56 = "UPDATE tbl_jf_detail SET bulan='8', tahun='$tahun_tambah5' WHERE bulan='68' AND tahun='$tahun_sekarang'";
	$q57 = "UPDATE tbl_jf_detail SET bulan='9', tahun='$tahun_tambah5' WHERE bulan='69' AND tahun='$tahun_sekarang'";
	$q58 = "UPDATE tbl_jf_detail SET bulan='10', tahun='$tahun_tambah5' WHERE bulan='70' AND tahun='$tahun_sekarang'";
	$q59 = "UPDATE tbl_jf_detail SET bulan='11', tahun='$tahun_tambah5' WHERE bulan='71' AND tahun='$tahun_sekarang'";
	$q60 = "UPDATE tbl_jf_detail SET bulan='12', tahun='$tahun_tambah5' WHERE bulan='72' AND tahun='$tahun_sekarang'";
	
	mysqli_query($koneksi,$q1);
	mysqli_query($koneksi,$q2);
	mysqli_query($koneksi,$q3);
	mysqli_query($koneksi,$q4);
	mysqli_query($koneksi,$q5);
	mysqli_query($koneksi,$q6);
	mysqli_query($koneksi,$q7);
	mysqli_query($koneksi,$q8);
	mysqli_query($koneksi,$q9);
	mysqli_query($koneksi,$q10);
	mysqli_query($koneksi,$q11);
	mysqli_query($koneksi,$q12);
	mysqli_query($koneksi,$q13);
	mysqli_query($koneksi,$q14);
	mysqli_query($koneksi,$q15);
	mysqli_query($koneksi,$q16);
	mysqli_query($koneksi,$q17);
	mysqli_query($koneksi,$q18);
	mysqli_query($koneksi,$q19);
	mysqli_query($koneksi,$q20);
	mysqli_query($koneksi,$q21);
	mysqli_query($koneksi,$q22);
	mysqli_query($koneksi,$q23);
	mysqli_query($koneksi,$q24);
	mysqli_query($koneksi,$q25);
	mysqli_query($koneksi,$q26);
	mysqli_query($koneksi,$q27);
	mysqli_query($koneksi,$q28);
	mysqli_query($koneksi,$q29);
	mysqli_query($koneksi,$q30);
	mysqli_query($koneksi,$q31);
	mysqli_query($koneksi,$q32);
	mysqli_query($koneksi,$q33);
	mysqli_query($koneksi,$q34);
	mysqli_query($koneksi,$q35);
	mysqli_query($koneksi,$q36);
	mysqli_query($koneksi,$q37);
	mysqli_query($koneksi,$q38);
	mysqli_query($koneksi,$q39);
	mysqli_query($koneksi,$q40);
	mysqli_query($koneksi,$q41);
	mysqli_query($koneksi,$q42);
	mysqli_query($koneksi,$q43);
	mysqli_query($koneksi,$q44);
	mysqli_query($koneksi,$q45);
	mysqli_query($koneksi,$q46);
	mysqli_query($koneksi,$q47);
	mysqli_query($koneksi,$q48);
	mysqli_query($koneksi,$q49);
	mysqli_query($koneksi,$q50);
	mysqli_query($koneksi,$q51);
	mysqli_query($koneksi,$q52);
	mysqli_query($koneksi,$q53);
	mysqli_query($koneksi,$q54);
	mysqli_query($koneksi,$q55);
	mysqli_query($koneksi,$q56);
	mysqli_query($koneksi,$q57);
	mysqli_query($koneksi,$q58);
	mysqli_query($koneksi,$q59);
	mysqli_query($koneksi,$q60);

	echo '<script>
		window.location="generate_jumlah_jf.php";
	</script>';

?>


</body>
</html>