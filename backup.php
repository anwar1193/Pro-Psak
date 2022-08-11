<?php  
    $koneksi = mysqli_connect('localhost', 'root', '', 'db_psak') or die(mysqli_error($koneksi));

    $bulan = '04';
    $tahun = '2022';

    $q_payment_accrue_active = "SELECT DISTINCT no_pin, account_name, paidtxndate, periode, tanggal_tarik_data FROM tbl_payment_accrue WHERE MONTH(paidtxndate)='$bulan' AND YEAR(paidtxndate)='$tahun'";
    $r_payment_accrue_active = mysqli_query($koneksi, $q_payment_accrue_active);

    while($row_paa = mysqli_fetch_array($r_payment_accrue_active)){
        $nopin_paa = $row_paa['no_pin'];
        $paidtxndate_paa = $row_paa['paidtxndate'];

		// Ambil Jumlah Payment untuk penentukan berapa kali UPDATE di lakukan
		$q_jumlah_payment = "SELECT * FROM tbl_payment_accrue WHERE MONTH(paidtxndate)='$bulan' AND YEAR(paidtxndate)='$tahun' AND no_pin='$nopin_paa'";
        $res_jumlah_payment = mysqli_query($koneksi, $q_jumlah_payment);
        $jumlah_payment = mysqli_num_rows($res_jumlah_payment);


		// Ambil payment terbaru yang belum di-update
		$q_payment_blm_update = "SELECT MIN(id) AS id_mulai_update FROM tbl_accrue_detail WHERE no_pin='$nopin_paa' AND status_paid='belum'";
		$res_payment_blm_update = mysqli_query($koneksi, $q_payment_blm_update);
		$data_payment_blm_update = mysqli_fetch_array($res_payment_blm_update);

        $id_mulai_update = $data_payment_blm_update['id_mulai_update'];

        // echo $nopin_paa.' jml Bayar :'.$jumlah_payment.', ID Awal update : '.$id_mulai_update.'<br>';

        // Looping Update Paid Sesuai Count dari table payment
        for($i=1; $i<=$jumlah_payment; $i++){
            echo 'update no_pin : '.$nopin_paa.' dengan id : '.$id_mulai_update.'<br>';
            $id_mulai_update++;
        }


        // $bln_paa0 = substr($paidtxndate_paa, 5, 2);
        // $bln_paa = ltrim($bln_paa0, '0'); // menghilangkan 0 di depan
        // $thn_paa = substr($paidtxndate_paa, 0, 4);

        // Update Paid ..............................................
        // $query_update_active = "UPDATE tbl_accrue_detail 
        // SET status_paid='paid', bulan_paid='$bulan', tahun_paid='$tahun'
        // WHERE bulan='$bln_paa' AND tahun='$thn_paa' AND no_pin='$nopin_paa' AND account_sts='ACTIVE' AND bulan_paid='' AND tahun_paid=''";
        // mysqli_query($koneksi,$query_update_active) or die ('error fungsi');

    }
?>