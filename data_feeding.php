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
              <small>Data Feeding PSAK</small>
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
                <h3 class="box-title">Data Fidding PSAK (Generated)</h3>
              </div>
              <div class="box-body">
                

                <table class="table table-bordered" id="example1">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>No Pin</th>
                      <th>No Rek</th>
                      <th>Account Sts</th>
                      <th>Cabang</th>
                      <th>Account Name</th>
                      <th>Restru Date</th>
                      <th>Sisa Tenor</th>
                      <th>Fincat</th>
                      <th>Sts Generate</th>
                      <th>Tanggal Upload</th>
                      <th>Status Penyusutan</th>
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php  
                      $no=0;
                      $result = tampil_psak();
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
                      <td><?php echo date('d-m-Y', strtotime($row['restru_date'])) ?></td>
                      <td><?php echo $row['sisa_tenor'] ?></td>
                      <td><?php echo $row['fincat'] ?></td>
                      <td><?php echo $row['status_generate'] ?></td>
                      <td><?php echo date('d-m-Y',strtotime($row['tanggal_upload'])) ?></td>
                      
                      <?php if($row['paid_status'] == 'Done'){ ?>
                        <td style="text-align:center"><?php echo $row['paid_status'] ?></td>
                      <?php }else{ ?>
                        <td style="text-align:center">-</td>
                      <?php } ?>
                      

                      <td style="text-align: center">
                        <a href="detail_psak.php?no_pin='<?php echo $row['no_pin'] ?>'" class="btn btn-warning btn-xs">
                          <i class="fa fa-eye"></i> View Penyusutan
                        </a>

                        <!-- <a href="hapus_psak.php?no_pin='<?php echo $row['no_pin'] ?>'" class="btn btn-danger btn-xs" onclick="return confirm('Anda Yakin?')">
                          <i class="fa fa-trash"></i> Delete
                        </a> -->
                      </td>
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