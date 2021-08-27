<?php  
    include 'koneksi.php';
    include 'fungsi.php';
    $month = date('m');
    $bulan = $month*1; //supaya tidak ada angka 0 di depan
    $tahun = date('Y');

    $query = "SELECT 
                cabang,
                fincat,
                SUM(refund_npv) AS t_refund_npv,
                SUM(refund_asuransi) AS t_refund_asuransi,
                SUM(refund_adm) AS t_refund_adm,
                SUM(ins_receivable) AS t_ins_receivable,
                SUM(by_notaris) AS t_by_notaris,
                SUM(pend_asuransi) AS t_pend_asuransi,
                SUM(pend_survey) AS t_pend_survey,
                SUM(pend_fidusia) AS t_pend_fidusia,
                SUM(pend_provisi) AS t_pend_provisi
                FROM tbl_psak_detail GROUP BY cabang, fincat";
    $result = mysqli_query($koneksi,$query) or die ('error fungsi tampil saldo awal');
    while($row = mysqli_fetch_array($result)){
       
        $cabang = $row['cabang'];
        $fincat = $row['fincat'];
        $refund_npv = $row['t_refund_npv'];
        $refund_asuransi = $row['t_refund_asuransi'];
        $refund_adm = $row['t_refund_adm'];
        $ins_receivable = $row['t_ins_receivable'];
        $by_notaris = $row['t_by_notaris'];
        $pend_asuransi = $row['t_pend_asuransi'];
        $pend_survey = $row['t_pend_survey'];
        $pend_fidusia = $row['t_pend_fidusia'];
        $pend_provisi = $row['t_pend_provisi'];
        

        // Simpan ke tbl_saldo_awal
        $query_simpan = "INSERT INTO tbl_saldo_awal_cabang(cabang, fincat, bulan, tahun, refund_npv, refund_asuransi, refund_adm, ins_receivable, by_notaris, pend_asuransi, pend_survey, pend_fidusia, pend_provisi) VALUES('$cabang', '$fincat', '$bulan', '$tahun', $refund_npv, $refund_asuransi, $refund_adm, $ins_receivable, $by_notaris, $pend_asuransi, $pend_survey, $pend_fidusia, $pend_provisi)";

        mysqli_query($koneksi, $query_simpan);
    }

    echo '<script>
		alert("Generate Sukses");window.location="data_feeding.php";
	</script>';
?>