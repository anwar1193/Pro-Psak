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
              Data Payment
              <small>Data Payment Accrue</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Payment Accrue</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Data Payment Accrue</h3>

                <!-- Tombol Export -->
                <!-- <div class="tombol-export" style="position: absolute; top:50%; right: 2%;">
                  <form method="post" action="excel_data_psak.php">
                    <input type="text" name="status_penyusutan" value="<?php echo $status_penyusutan ?>" hidden>

                    <button class="btn btn-success btn-sm" type="submit">
                      <i class="fa fa-file-excel-o"></i> Export Excel
                    </button>
                  </form>

                </div> -->
                <!-- Tombol Export -->



              </div>
              <div class="box-body">
                

                <table class="table table-bordered" id="example1">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>No Pin</th>
                      <th>Account Name</th>
                      <th>PaidTxnDate</th>
                      <th>Periode</th>
                      <th class="text-center">Tanggal Tarik Data</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php  
                      $no=0;
                      $query = "SELECT * FROM tbl_payment_accrue ORDER BY paidtxndate DESC";
                      $result = mysqli_query($koneksi, $query) or die('error fungsi');
                      while($row = mysqli_fetch_array($result)){
                      $no++;
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['no_pin'] ?></td>
                      <td><?php echo $row['account_name'] ?></td>
                      <td><?php echo date('d-m-Y', strtotime($row['paidtxndate'])) ?></td>
                      <td class="text-center"><?php echo $row['periode'] ?></td>
                      <td class="text-center"><?php echo date('d-m-Y H:i:s',strtotime($row['tanggal_tarik_data'])) ?></td>
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