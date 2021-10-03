<?php 
  
  session_start();
  if($_SESSION['login']){

  include 'header.php';
  include 'koneksi.php';
  include 'fungsi.php';
?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Generate JF
              <small>Generate Fidding Data JF</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Generate JF</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Data Fidding JF</h3>
              </div>
              <div class="box-body">

                <!-- Animasi Loading -->
                <div id="loader-generate-psak" style="position: absolute; top: 200px; left: 45%;">
                  <img src="img/loading.gif" alt="" width="80px">
                </div>
                
                <a class="btn btn-success btn-xs" href="generate_proses_jf.php" id="tombol-generate-psak">
                  <i class="fa fa-refresh"></i> Generate JF
                </a>

                <a class="btn btn-danger btn-xs" href="generate_batal_jf.php" onclick="return confirm('Apakah anda yakin akan membatalkan proses?')">
                  <i class="fa fa-times"></i> Batalkan Proses
                </a>
                
                <table class="table table-bordered" style="margin-top: 10px;">
                  <tr>
                    <th>NO</th>
                    <th>No Pin</th>
                    <th>No Rek</th>
                    <th>Account Sts</th>
                    <th>Cabang</th>
                    <th>Account Name</th>
                    <th>Sisa Tenor</th>
                    <th>Fincat</th>
                    <th>Sts Generate</th>
                  </tr>

                  <?php  
                    $no=0;
                    $result = tampil_jf_gen();
                    while($row = mysqli_fetch_array($result)){
                    $no++;
                  ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['no_pin'] ?></td>
                    <td><?php echo $row['no_rek'] ?></td>
                    <td><?php echo $row['account_sts'] ?></td>
                    <td><?php echo $row['cabang'] ?></td>
                    <td><?php echo $row['account_name'] ?></td>
                    <td><?php echo $row['sisa_tenor'] ?></td>
                    <td><?php echo $row['fincat'] ?></td>
                    <td><?php echo $row['status_generate'] ?></td>
                  </tr>
                  <?php } ?>
                </table>


              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->

        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->

      <!-- jQuery 2.1.3 -->
      <script src="asset/plugins/jQuery/jQuery-2.1.3.min.js"></script>

      <script>

        $(document).ready(function(){
          $('#loader-generate-psak').hide();

          $(document).on('click', '#tombol-generate-psak', function(){
            $('#loader-generate-psak').show();
          });

        });

      </script>

<?php include 'footer.php' ?>
      
<?php }else{
  header('location:login.php');
} ?>


