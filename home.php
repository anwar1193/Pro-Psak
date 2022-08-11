<?php 
  session_start();
  if($_SESSION['login']){

  include 'header.php';
  include 'koneksi.php';
  include 'fungsi.php';

  $bln_now = date('m');
  $thn_now = date('Y');

  if(isset($_POST['cari'])){
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
  }else{

    if($bln_now == '01'){
      $bulan = '12';
      $tahun = $thn_now - 1;
    }else{
      $bulan = $bln_now - 1;
      $tahun = $thn_now;
    }

  }

  

  // Nama Bulan
  switch($bulan){
    case 1 : $nama_bulan='Januari'; break;
    case 2 : $nama_bulan='Februari'; break;
    case 3 : $nama_bulan='Maret'; break;
    case 4 : $nama_bulan='April'; break;
    case 5 : $nama_bulan='Mei'; break;
    case 6 : $nama_bulan='Juni'; break;
    case 7 : $nama_bulan='Juli'; break;
    case 8 : $nama_bulan='Agustus'; break;
    case 9 : $nama_bulan='September'; break;
    case 10 : $nama_bulan='Oktober'; break;
    case 11 : $nama_bulan='November'; break;
    case 12 : $nama_bulan='Desember'; break;
    default : $nama_bulan='Tidak Teridentifikasi';
  }
  
?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Dashboard
              <small>Data Di Generate Setiap Akhir Bulan</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            
            
          <!-- DATA PSAK -->
          <div class="box box-default">
              <div class="box-header with-border"> <br><br>
                <h3 class="box-title">Rekap Mutasi Nasabah (By Account Sts) - <?php echo $nama_bulan.' '.$tahun ?></h3>

                <!-- Tombol Kiri -->
                <div style="position:absolute; left:0; top:0">

                  <a href="home.php" class="btn btn-warning" style="transform:translateY(-10px)"> Data PSAK Nasabah</a>
                  <a href="home_jf.php" class="btn btn-warning"> Data PSAK JF</a> 
                  <a href="home_accrue.php" class="btn btn-warning"> Data PSAK Accrue</a>

                </div>
                <!-- Penutup Tombol Kiri -->


                <!-- Tombol Kanan -->
                <div style="position:absolute; right:0; top:0">

                  <!-- <a href="cabang.php" class="btn btn-info btn-sm"><i class="fa fa-list"></i> By Cabang</a> -->
                  
                  <a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#modal-status_paid">
                    <i class="fa fa-refresh"></i> Update Sts Paid
                  </a>

                </div>
                <!-- Penutup Tombol Kanan -->

              </div>

              <div class="box-body">
                  
                  <form action="" method="post">
                    <label for="">Filter By Bulan : </label>

                    <select name="bulan" required="">
                      <option value="">-Pilih Bulan-</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>

                    <input type="text" name="tahun" required autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Tahun">

                    <button type="submit" name="cari">Proses</button>

                  </form>

                  <?php  
                    include 'data_dashboard/a_saldoAwal.php';
                    include 'data_dashboard/b_sActive.php';
                    include 'data_dashboard/c_sClosedReguler.php';
                    include 'data_dashboard/d_totalPenyusutan.php';
                    include 'data_dashboard/e_saldoAkhir.php';
                  ?>


              </div><!-- /.box-body -->
            </div><!-- /.box -->
            <!-- Penutup DATA PSAK -->
          
          
          </section><!-- /.content -->

        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->

<?php include 'footer.php' ?>


<!-- Modal Update Paid -->
<div class="modal fade" id="modal-status_paid">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Update Status Paid</h4>
      </div>
      <div class="modal-body">

        <!-- Animasi Loading -->
        <div id="loader-updatePaid" style="position: absolute; top: 160px; left: 45%;">
          <img src="img/loading.gif" alt="" width="80px">
        </div>
        
        <form method="post" action="update_paid.php">
          
        <div class="form-group">
            <label for="">Pilih Bulan</label>
            <select name="bulan" class="form-control form_paid" required="">
                <option value="">-Pilih-</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Masukkan Tahun</label>
            <input type="text" class="form-control form_paid" name="tahun" required autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="tombol-updatePaid">Update Status Paid</button>
      </div>

      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal update paid --> 


<script>

  $(document).ready(function(){
    $('#loader-updatePaid').hide();

    $(document).on('click', '#tombol-updatePaid', function(){
      let form_paid = $('.form_paid').val();
      
      if(form_paid != ''){
        $('#loader-updatePaid').show();
      }
      
    });

  });

</script>

      
<?php }else{
  header('location:login.php');
} ?>