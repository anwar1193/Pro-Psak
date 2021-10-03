<?php 
  session_start();
  if($_SESSION['login']){

  include 'header.php';
  include 'koneksi.php';
  include 'fungsi.php';

  if(isset($_POST['cari'])){
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
  }else{
    $bulan = date('m');
    $tahun = date('Y');
  }

  if(isset($_POST['cari_jf'])){
    $bulan_jf = $_POST['bulan_jf'];
    $tahun_jf = $_POST['tahun_jf'];
  }else{
    $bulan_jf = date('m');
    $tahun_jf = date('Y');
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
            
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">

                  <li class="active"><a href="#tab_1" data-toggle="tab">Menu - PSAK</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Menu - JF</a></li>
          
                </ul>
                <div class="tab-content">

                  <!-- TAB PSAK.................................................................. -->
                  <div class="tab-pane active" id="tab_1">
                    
                  <div class="box box-default">
                      <div class="box-header with-border">
                        <h3 class="box-title">Rekap Mutasi PSAK (By Account Sts) - <?php echo $nama_bulan.' '.$tahun ?></h3>

                        <span style="margin-left: 60%">

                          <a href="cabang.php" class="btn btn-info btn-sm"><i class="fa fa-list"></i> By Cabang</a>
                          
                          <a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#modal-status_paid">
                            <i class="fa fa-refresh"></i> Update Sts Paid
                          </a>

                        </span>
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

                  </div>
                  <!-- /. TAB PSAK............................................................... -->

                  <!-- TAB JF.................................................................. -->
                  <div class="tab-pane" id="tab_2">
                    
                  <div class="box box-default">
                      <div class="box-header with-border">
                        <h3 class="box-title">Rekap Mutasi JF (By Account Sts) - <?php echo $nama_bulan.' '.$tahun ?></h3>

                        <span style="margin-left: 60%">

                          <a href="cabang_jf.php" class="btn btn-info btn-sm"><i class="fa fa-list"></i> By Cabang</a>
                          
                          <a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#modal-status_paid_jf">
                            <i class="fa fa-refresh"></i> Update Sts Paid
                          </a>

                        </span>
                      </div>

                      <div class="box-body">
                          
                          <form action="" method="post">
                            <label for="">Filter By Bulan : </label>

                            <select name="bulan_jf" required="">
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

                            <input type="text" name="tahun_jf" required autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Tahun">

                            <button type="submit" name="cari_jf">Proses</button>

                          </form>

                          <?php  
                            include 'data_dashboard_jf/a_saldoAwal.php';
                            include 'data_dashboard_jf/b_sActive.php';
                            include 'data_dashboard_jf/c_sClosedReguler.php';
                            include 'data_dashboard_jf/d_totalPenyusutan.php';
                            include 'data_dashboard_jf/e_saldoAkhir.php';
                          ?>


                      </div><!-- /.box-body -->
                    </div><!-- /.box -->

                  </div>
                  <!-- /. TAB JF -->

                </div>
                <!-- /.tab-content -->
              </div>
              <!-- nav-tabs-custom -->

          
          
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
          <table>
            <tr>
              <td style="text-align:right"><label>Pilih Bulan :</label></td>
              <td>
              <select name="bulan" style="width: 162px">
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
              </td>
            </tr>

            <tr>
              <td style="text-align:right"><label>Pilih Tahun :</label></td>
              <td>
              <input type="text" name="tahun" required autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
              </td>
            </tr>
          </table>

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
      $('#loader-updatePaid').show();
    });

  });

</script>

      
<?php }else{
  header('location:login.php');
} ?>