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
              Data PSAK
              <small>Data Account Status</small>
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
                <h3 class="box-title">Data Account Status</h3>
              </div>
              <div class="box-body">
                

                <table class="table table-bordered" id="example1">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>No Pin</th>
                      <th>Account Sts</th>
                      <th style="text-align: center;">App Date</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php  
                      $no=0;
                      $query = "SELECT * FROM tbl_nopin";
                      $result = mysqli_query($koneksi, $query) or die ('error fungsi');
                      while($row = mysqli_fetch_array($result)){
                      $no++;
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['no_pin'] ?></td>
                      <td><?php echo $row['account_status'] ?></td>

                      <td style="text-align: center"><?php echo $row['app_date'] ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
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