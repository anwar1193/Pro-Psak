<?php  
	function tampil_psak_gen(){
		global $koneksi;
		$query = "SELECT * FROM tbl_psak WHERE status_generate='belum'";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_jf_gen(){
		global $koneksi;
		$query = "SELECT * FROM tbl_jf WHERE status_generate='belum'";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil jf gen');
		return $result;
	}

	function tampil_accrue_gen(){
		global $koneksi;
		$query = "SELECT * FROM tbl_accrue WHERE status_generate='belum'";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil accrue gen');
		return $result;
	}

	function tampil_psak(){
		global $koneksi;
		$query = "SELECT * FROM tbl_psak WHERE status_generate='generated'";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_jf(){
		global $koneksi;
		$query = "SELECT * FROM tbl_jf WHERE status_generate='generated'";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil jf gen');
		return $result;
	}

	function tampil_accrue(){
		global $koneksi;
		$query = "SELECT * FROM tbl_accrue WHERE status_generate='generated'";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil accrue gen');
		return $result;
	}

	function tampil_saldo_awal($no_pin){
		global $koneksi;
		$query = "SELECT * FROM tbl_psak WHERE no_pin=$no_pin";
		$result = mysqli_query($koneksi, $query) or die('error fungsi saldo awal');
		return $result;
	}

	function tampil_saldo_awal_jf($no_pin){
		global $koneksi;
		$query = "SELECT * FROM tbl_jf WHERE no_pin=$no_pin";
		$result = mysqli_query($koneksi, $query) or die('error fungsi saldo awal');
		return $result;
	}

	function tampil_saldo_awal_accrue($no_pin){
		global $koneksi;
		$query = "SELECT * FROM tbl_accrue WHERE no_pin=$no_pin";
		$result = mysqli_query($koneksi, $query) or die('error fungsi saldo awal');
		return $result;
	}

	function tampil_penyusutan($no_pin){
		global $koneksi;
		$query = "SELECT
					SUM(refund_npv) AS refund_npv_p,
					SUM(refund_asuransi) AS refund_asuransi_p,
					SUM(refund_adm) AS refund_adm_p,
					SUM(ins_receivable) AS ins_receivable_p,
					SUM(by_notaris) AS by_notaris_p,
					SUM(pend_asuransi) AS pend_asuransi_p,
					SUM(pend_survey) AS pend_survey_p,
					SUM(pend_fidusia) AS pend_fidusia_p,
					SUM(pend_provisi) AS pend_provisi_p
					FROM tbl_psak_detail
					WHERE no_pin=$no_pin AND status_paid='paid'";
		$result = mysqli_query($koneksi, $query) or die('error fungsi penyusutan');
		return $result;
	}

	function tampil_penyusutan_jf($no_pin){
		global $koneksi;
		$query = "SELECT
					SUM(provisi_jf) AS provisi_jf_p
					FROM tbl_jf_detail
					WHERE no_pin=$no_pin AND status_paid='paid'";
		$result = mysqli_query($koneksi, $query) or die('error fungsi penyusutan');
		return $result;
	}

	function tampil_penyusutan_accrue($no_pin){
		global $koneksi;
		$query = "SELECT
					SUM(accrue_restru) AS accrue_restru_p
					FROM tbl_accrue_detail
					WHERE no_pin=$no_pin AND status_paid='paid'";
		$result = mysqli_query($koneksi, $query) or die('error fungsi penyusutan');
		return $result;
	}

	function tampil_saldo_akhir($no_pin){
		global $koneksi;
		$query = "SELECT
					SUM(refund_npv) AS refund_npv_akh,
					SUM(refund_asuransi) AS refund_asuransi_akh,
					SUM(refund_adm) AS refund_adm_akh,
					SUM(ins_receivable) AS ins_receivable_akh,
					SUM(by_notaris) AS by_notaris_akh,
					SUM(pend_asuransi) AS pend_asuransi_akh,
					SUM(pend_survey) AS pend_survey_akh,
					SUM(pend_fidusia) AS pend_fidusia_akh,
					SUM(pend_provisi) AS pend_provisi_akh
					FROM tbl_psak_detail
					WHERE no_pin=$no_pin AND status_paid='belum'";
		$result = mysqli_query($koneksi, $query) or die('error fungsi penyusutan');
		return $result;
	}

	function tampil_saldo_akhir_jf($no_pin){
		global $koneksi;
		$query = "SELECT
					SUM(provisi_jf) AS provisi_jf_akh
					FROM tbl_jf_detail
					WHERE no_pin=$no_pin AND status_paid='belum'";
		$result = mysqli_query($koneksi, $query) or die('error fungsi penyusutan');
		return $result;
	}

	function tampil_saldo_akhir_accrue($no_pin){
		global $koneksi;
		$query = "SELECT
					SUM(accrue_restru) AS accrue_restru_akh
					FROM tbl_accrue_detail
					WHERE no_pin=$no_pin AND status_paid='belum'";
		$result = mysqli_query($koneksi, $query) or die('error fungsi penyusutan');
		return $result;
	}

	function hapus_psak($no_pin){
		global $koneksi;
		$query = "DELETE FROM tbl_psak WHERE no_pin = $no_pin";
		if(mysqli_query($koneksi,$query) or die ('error hapus psak')){
			return true;
		}else{
			return false;
		}
	}

	function tampil_psak_detail($no_pin){
		global $koneksi;
		$query = "SELECT * FROM tbl_psak_detail WHERE no_pin=$no_pin";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_jf_detail($no_pin){
		global $koneksi;
		$query = "SELECT * FROM tbl_jf_detail WHERE no_pin=$no_pin";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_accrue_detail($no_pin){
		global $koneksi;
		$query = "SELECT * FROM tbl_accrue_detail WHERE no_pin=$no_pin";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_psak_nopin($no_pin){
		global $koneksi;
		$query = "SELECT * FROM tbl_psak WHERE no_pin=$no_pin";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_jf_nopin($no_pin){
		global $koneksi;
		$query = "SELECT * FROM tbl_jf WHERE no_pin=$no_pin";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_accrue_nopin($no_pin){
		global $koneksi;
		$query = "SELECT * FROM tbl_accrue WHERE no_pin=$no_pin";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil accrue gen');
		return $result;
	}

	function tampil_salaw_invst($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					refund_npv AS t_refund_npv,
					refund_asuransi AS t_refund_asuransi,
					refund_adm AS t_refund_adm,
					ins_receivable AS t_ins_receivable,
					by_notaris AS t_by_notaris,
					pend_asuransi AS t_pend_asuransi,
					pend_survey AS t_pend_survey,
					pend_fidusia AS t_pend_fidusia,
					pend_provisi AS t_pend_provisi
					FROM tbl_saldo_awal WHERE fincat='INVST - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil saldo awal');
		return $result;
	}

	function tampil_salaw_invst_jf($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					provisi_jf AS t_provisi_jf
					FROM tbl_saldo_awal_jf WHERE fincat='INVST - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil saldo awal');
		return $result;
	}

	function tampil_salaw_invst_accrue($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					accrue_restru AS t_accrue_restru
					FROM tbl_saldo_awal_accrue WHERE fincat='INVST - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil saldo awal');
		return $result;
	}

	function tampil_salaw_mtgna($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					refund_npv AS t_refund_npv,
					refund_asuransi AS t_refund_asuransi,
					refund_adm AS t_refund_adm,
					ins_receivable AS t_ins_receivable,
					by_notaris AS t_by_notaris,
					pend_asuransi AS t_pend_asuransi,
					pend_survey AS t_pend_survey,
					pend_fidusia AS t_pend_fidusia,
					pend_provisi AS t_pend_provisi
					FROM tbl_saldo_awal WHERE fincat='MTGNA - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil saldo awal');
		return $result;
	}

	function tampil_salaw_mtgna_jf($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					provisi_jf AS t_provisi_jf
					FROM tbl_saldo_awal_jf WHERE fincat='MTGNA - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil saldo awal');
		return $result;
	}

	function tampil_salaw_mtgna_accrue($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					accrue_restru AS t_accrue_restru
					FROM tbl_saldo_awal_accrue WHERE fincat='MTGNA - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil saldo awal');
		return $result;
	}

	function tampil_salaw_mkrja($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					refund_npv AS t_refund_npv,
					refund_asuransi AS t_refund_asuransi,
					refund_adm AS t_refund_adm,
					ins_receivable AS t_ins_receivable,
					by_notaris AS t_by_notaris,
					pend_asuransi AS t_pend_asuransi,
					pend_survey AS t_pend_survey,
					pend_fidusia AS t_pend_fidusia,
					pend_provisi AS t_pend_provisi
					FROM tbl_saldo_awal WHERE fincat='MKRJA - MODAL USAHA' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil saldo awal');
		return $result;
	}

	function tampil_salaw_mkrja_jf($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					provisi_jf AS t_provisi_jf
					FROM tbl_saldo_awal_jf WHERE fincat='MKRJA - MODAL USAHA' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil saldo awal');
		return $result;
	}

	function tampil_salaw_mkrja_accrue($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					accrue_restru AS t_accrue_restru
					FROM tbl_saldo_awal_accrue WHERE fincat='MKRJA - MODAL USAHA' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil saldo awal');
		return $result;
	}

	function tampil_active_invst($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					refund_npv AS t_refund_npv,
					refund_asuransi AS t_refund_asuransi,
					refund_adm AS t_refund_adm,
					ins_receivable AS t_ins_receivable,
					by_notaris AS t_by_notaris,
					pend_asuransi AS t_pend_asuransi,
					pend_survey AS t_pend_survey,
					pend_fidusia AS t_pend_fidusia,
					pend_provisi AS t_pend_provisi
					FROM tbl_penyusutan_active WHERE fincat='INVST - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_active_invst_jf($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					provisi_jf AS t_provisi_jf
					FROM tbl_penyusutan_active_jf WHERE fincat='INVST - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_active_invst_accrue($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					accrue_restru AS t_accrue_restru
					FROM tbl_penyusutan_active_accrue WHERE fincat='INVST - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_active_mtgna($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					refund_npv AS t_refund_npv,
					refund_asuransi AS t_refund_asuransi,
					refund_adm AS t_refund_adm,
					ins_receivable AS t_ins_receivable,
					by_notaris AS t_by_notaris,
					pend_asuransi AS t_pend_asuransi,
					pend_survey AS t_pend_survey,
					pend_fidusia AS t_pend_fidusia,
					pend_provisi AS t_pend_provisi
					FROM tbl_penyusutan_active WHERE fincat='MTGNA - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil active mtgna');
		return $result;
	}

	function tampil_active_mtgna_jf($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					provisi_jf AS t_provisi_jf
					FROM tbl_penyusutan_active_jf WHERE fincat='MTGNA - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil active mtgna');
		return $result;
	}

	function tampil_active_mtgna_accrue($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					accrue_restru AS t_accrue_restru
					FROM tbl_penyusutan_active_accrue WHERE fincat='MTGNA - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil active mtgna');
		return $result;
	}

	function tampil_active_mkrja($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					refund_npv AS t_refund_npv,
					refund_asuransi AS t_refund_asuransi,
					refund_adm AS t_refund_adm,
					ins_receivable AS t_ins_receivable,
					by_notaris AS t_by_notaris,
					pend_asuransi AS t_pend_asuransi,
					pend_survey AS t_pend_survey,
					pend_fidusia AS t_pend_fidusia,
					pend_provisi AS t_pend_provisi
					FROM tbl_penyusutan_active WHERE fincat='MKRJA - MODAL USAHA' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil active mtgna');
		return $result;
	}

	function tampil_active_mkrja_jf($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					provisi_jf AS t_provisi_jf
					FROM tbl_penyusutan_active_jf WHERE fincat='MKRJA - MODAL USAHA' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil active mtgna');
		return $result;
	}

	function tampil_active_mkrja_accrue($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					accrue_restru AS t_accrue_restru
					FROM tbl_penyusutan_active_accrue WHERE fincat='MKRJA - MODAL USAHA' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil active mtgna');
		return $result;
	}

	function tampil_active_all($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					SUM(refund_npv) AS t_refund_npv,
					SUM(refund_asuransi) AS t_refund_asuransi,
					SUM(refund_adm) AS t_refund_adm,
					SUM(ins_receivable) AS t_ins_receivable,
					SUM(by_notaris) AS t_by_notaris,
					SUM(pend_asuransi) AS t_pend_asuransi,
					SUM(pend_survey) AS t_pend_survey,
					SUM(pend_fidusia) AS t_pend_fidusia,
					SUM(pend_provisi) AS t_pend_provisi
					FROM tbl_penyusutan_active WHERE bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil active mtgna');
		return $result;
	}

	function tampil_active_all_jf($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					SUM(provisi_jf) AS t_provisi_jf
					FROM tbl_penyusutan_active_jf WHERE bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil active mtgna');
		return $result;
	}

	function tampil_active_all_accrue($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					SUM(accrue_restru) AS t_accrue_restru
					FROM tbl_penyusutan_active_accrue WHERE bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil active mtgna');
		return $result;
	}

	function tampil_closedreguler_invst($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					refund_npv AS t_refund_npv,
					refund_asuransi AS t_refund_asuransi,
					refund_adm AS t_refund_adm,
					ins_receivable AS t_ins_receivable,
					by_notaris AS t_by_notaris,
					pend_asuransi AS t_pend_asuransi,
					pend_survey AS t_pend_survey,
					pend_fidusia AS t_pend_fidusia,
					pend_provisi AS t_pend_provisi
					FROM tbl_penyusutan_closed WHERE fincat='INVST - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_closedreguler_invst_jf($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					provisi_jf AS t_provisi_jf
					FROM tbl_penyusutan_closed_jf WHERE fincat='INVST - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_closedreguler_invst_accrue($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					accrue_restru AS t_accrue_restru
					FROM tbl_penyusutan_closed_accrue WHERE fincat='INVST - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_closedreguler_mtgna($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					refund_npv AS t_refund_npv,
					refund_asuransi AS t_refund_asuransi,
					refund_adm AS t_refund_adm,
					ins_receivable AS t_ins_receivable,
					by_notaris AS t_by_notaris,
					pend_asuransi AS t_pend_asuransi,
					pend_survey AS t_pend_survey,
					pend_fidusia AS t_pend_fidusia,
					pend_provisi AS t_pend_provisi
					FROM tbl_penyusutan_closed WHERE fincat='MTGNA - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_closedreguler_mtgna_jf($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					provisi_jf AS t_provisi_jf
					FROM tbl_penyusutan_closed_jf WHERE fincat='MTGNA - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_closedreguler_mtgna_accrue($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					accrue_restru AS t_accrue_restru
					FROM tbl_penyusutan_closed_accrue WHERE fincat='MTGNA - INST LOAN' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_closedreguler_mkrja($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					refund_npv AS t_refund_npv,
					refund_asuransi AS t_refund_asuransi,
					refund_adm AS t_refund_adm,
					ins_receivable AS t_ins_receivable,
					by_notaris AS t_by_notaris,
					pend_asuransi AS t_pend_asuransi,
					pend_survey AS t_pend_survey,
					pend_fidusia AS t_pend_fidusia,
					pend_provisi AS t_pend_provisi
					FROM tbl_penyusutan_closed WHERE fincat='MKRJA - MODAL USAHA' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_closedreguler_mkrja_jf($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					provisi_jf AS t_provisi_jf
					FROM tbl_penyusutan_closed_jf WHERE fincat='MKRJA - MODAL USAHA' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_closedreguler_mkrja_accrue($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					accrue_restru AS t_accrue_restru
					FROM tbl_penyusutan_closed_accrue WHERE fincat='MKRJA - MODAL USAHA' AND bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_closedreguler_all($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					SUM(refund_npv) AS t_refund_npv,
					SUM(refund_asuransi) AS t_refund_asuransi,
					SUM(refund_adm) AS t_refund_adm,
					SUM(ins_receivable) AS t_ins_receivable,
					SUM(by_notaris) AS t_by_notaris,
					SUM(pend_asuransi) AS t_pend_asuransi,
					SUM(pend_survey) AS t_pend_survey,
					SUM(pend_fidusia) AS t_pend_fidusia,
					SUM(pend_provisi) AS t_pend_provisi
					FROM tbl_penyusutan_closed WHERE bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_closedreguler_all_jf($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					SUM(provisi_jf) AS t_provisi_jf
					FROM tbl_penyusutan_closed_jf WHERE bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_closedreguler_all_accrue($bulan, $tahun){
		global $koneksi;
		$query = "SELECT 
					SUM(accrue_restru) AS t_accrue_restru
					FROM tbl_penyusutan_closed_accrue WHERE bulan=$bulan AND tahun=$tahun";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_closedet_invst(){
		global $koneksi;
		$query = "SELECT 
					SUM(refund_npv) AS t_refund_npv,
					SUM(refund_asuransi) AS t_refund_asuransi,
					SUM(refund_adm) AS t_refund_adm,
					SUM(ins_receivable) AS t_ins_receivable,
					SUM(by_notaris) AS t_by_notaris,
					SUM(pend_asuransi) AS t_pend_asuransi,
					SUM(pend_survey) AS t_pend_survey,
					SUM(pend_fidusia) AS t_pend_fidusia,
					SUM(pend_provisi) AS t_pend_provisi
					FROM tbl_psak_detail WHERE fincat='INVST - INST LOAN' AND status_paid='belum'";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_closedet_mtgna(){
		global $koneksi;
		$query = "SELECT 
					SUM(refund_npv) AS t_refund_npv,
					SUM(refund_asuransi) AS t_refund_asuransi,
					SUM(refund_adm) AS t_refund_adm,
					SUM(ins_receivable) AS t_ins_receivable,
					SUM(by_notaris) AS t_by_notaris,
					SUM(pend_asuransi) AS t_pend_asuransi,
					SUM(pend_survey) AS t_pend_survey,
					SUM(pend_fidusia) AS t_pend_fidusia,
					SUM(pend_provisi) AS t_pend_provisi
					FROM tbl_psak_detail WHERE fincat='MTGNA - INST LOAN' AND status_paid='belum'";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

	function tampil_closedet_mkrja(){
		global $koneksi;
		$query = "SELECT 
					SUM(refund_npv) AS t_refund_npv,
					SUM(refund_asuransi) AS t_refund_asuransi,
					SUM(refund_adm) AS t_refund_adm,
					SUM(ins_receivable) AS t_ins_receivable,
					SUM(by_notaris) AS t_by_notaris,
					SUM(pend_asuransi) AS t_pend_asuransi,
					SUM(pend_survey) AS t_pend_survey,
					SUM(pend_fidusia) AS t_pend_fidusia,
					SUM(pend_provisi) AS t_pend_provisi
					FROM tbl_psak_detail WHERE fincat='MKRJA - MODAL USAHA' AND status_paid='belum'";
		$result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
		return $result;
	}

?>