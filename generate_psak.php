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
              Generate PSAK
              <small>Generate Fidding Data PSAK</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Generate PSAK</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Data Fidding PSAK</h3>
              </div>
              <div class="box-body">
                
                <a class="btn btn-success btn-xs" href="generate_proses.php">
                  <i class="fa fa-refresh"></i> Generate PSAK
                </a>

                <a class="btn btn-danger btn-xs" href="generate_batal.php" onclick="return confirm('Apakah anda yakin akan membatalkan proses?')">
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
                    $result = tampil_psak_gen();
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

<?php include 'footer.php' ?>
      
<?php }else{
  header('location:login.php');
} ?>
