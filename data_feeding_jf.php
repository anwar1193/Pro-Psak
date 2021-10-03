<?php 
  
  session_start();
  if($_SESSION['login']){

  include 'header.php';
  include 'koneksi.php';
  include 'fungsi.php';

  if(isset($_POST['filter'])){
                        
    if($_POST['status_penyusutan'] == 'all'){
      $result = tampil_jf();
    }elseif($_POST['status_penyusutan'] == 'amortize'){
      $query = "SELECT * FROM tbl_jf WHERE status_generate='generated' AND paid_status=''";
      $result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
    }elseif($_POST['status_penyusutan'] == 'done'){
      $query = "SELECT * FROM tbl_jf WHERE status_generate='generated' AND paid_status='Done'";
      $result = mysqli_query($koneksi,$query) or die ('error fungsi tampil psak gen');
    }

    $status_penyusutan = $_POST['status_penyusutan'];

  }else{
    $result = tampil_jf();
    $status_penyusutan = 'all';
  }

?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Data JF
              <small>Data Feeding JF</small>
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
                <h3 class="box-title">Data Fidding JF (Generated)</h3>

                <!-- Filter By Status Penyusutan -->
                <form method="post" action="" style="margin-top:10px">

                  <label for="">Filter By Status Penyusutan :</label>

                  <select name="status_penyusutan" required="">
                    <option value="">- Pilih Status Penyusutan -</option>
                    <option value="all">All</option>
                    <option value="amortize">Amortize</option>
                    <option value="done">Done</option>
                  </select>

                  <button type="submit" class="btn btn-primary btn-sm" name="filter">
                    <i class="fa fa-search"></i> Cari Data
                  </button>

                </form>

                <!-- Tombol Export -->
                <div class="tombol-export" style="position: absolute; top:50%; right: 2%;">
                  <form method="post" action="excel_data_psak_jf.php">
                    <input type="text" name="status_penyusutan" value="<?php echo $status_penyusutan ?>" hidden>

                    <button class="btn btn-success btn-sm" type="submit">
                      <i class="fa fa-file-excel-o"></i> Export Excel
                    </button>
                  </form>

                </div>
                <!-- Tombol Export -->



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
                      <th>Tenor Penyusutan</th>
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
                      <td class="text-center"><?php echo $row['sisa_tenor'] ?></td>
                      <td><?php echo $row['fincat'] ?></td>
                      <td><?php echo $row['status_generate'] ?></td>
                      <td><?php echo date('d-m-Y',strtotime($row['tanggal_upload'])) ?></td>
                      
                      <?php if($row['paid_status'] == 'Done'){ ?>
                        <td style="text-align:center"><?php echo $row['paid_status'] ?></td>
                      <?php }else{ ?>
                        <td style="text-align:center">Amortize</td>
                      <?php } ?>
                      

                      <td style="text-align: center">
                        <a href="detail_jf.php?no_pin='<?php echo $row['no_pin'] ?>'" class="btn btn-warning btn-xs">
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