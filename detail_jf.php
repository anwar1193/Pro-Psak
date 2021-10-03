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

                <span style="margin-left: 93%;">
                  <a href="data_feeding_jf.php" class="btn btn-info btn-xs">Kembali</a>
                </span>
              </div>
              <div class="box-body">

                <?php  
                  $res = tampil_jf_nopin($_GET['no_pin']);
                  $data = mysqli_fetch_array($res);
                ?>

                <table class="table" style="margin-bottom: 20px">
                  <tr>
                    <th width="20%">No Pin</th>
                    <th>:</th>
                    <td><?php echo $data['no_pin'] ?></td>
                  </tr>

                  <tr>
                    <th>Account Name</th>
                    <th>:</th>
                    <td><?php echo $data['account_name'] ?></td>
                  </tr>

                  <tr>
                    <th>Norek</th>
                    <th>:</th>
                    <td><?php echo $data['no_rek'] ?></td>
                  </tr>

                  <tr>
                    <th>Account Status</th>
                    <th>:</th>
                    <td><?php echo $data['account_sts'] ?></td>
                  </tr>

                  <tr>
                    <th>Status Penyusutan</th>
                    <th>:</th>
                    <td>
                      <?php 
                        if($data['paid_status'] != ''){
                          echo $data['paid_status'];
                        }else{
                          echo 'Amortize';
                        }
                        
                      ?>
                    </td>
                  </tr>

                  <tr>
                    <th>Tenor Penyusutan</th>
                    <th>:</th>
                    <td><?php echo $data['sisa_tenor'] ?></td>
                  </tr>

                  <tr>
                    <th>Cabang</th>
                    <th>:</th>
                    <td><?php echo $data['cabang'] ?></td>
                  </tr>

                  <tr>
                    <th>Fincat</th>
                    <th>:</th>
                    <td><?php echo $data['fincat'] ?></td>
                  </tr>

                  <tr>
                    <th>Restru Date</th>
                    <th>:</th>
                    <td><?php echo date('d-m-Y', strtotime($data['restru_date'])) ?></td>
                  </tr>

                </table>
                

                <table class="table table-bordered">
                  <tr>
                    <th>NO</th>
                    <th>Periode</th>
                    <th>Provisi JF</th>
                    <th>Sts Paid</th>
                  </tr>

                  <?php  
                    $no=0;
                    $result = tampil_jf_detail($_GET['no_pin']);
                    while($row = mysqli_fetch_array($result)){
                    $no++;

                    $bulan = $row['bulan'];
                            // Konfersi Bulan Jadi Nama Bulan
                            switch ($bulan) {
                              case 1: $nama_bulan = "Januari"; break;
                              case 2: $nama_bulan = "Februari"; break;
                              case 3: $nama_bulan = "Maret"; break;
                              case 4: $nama_bulan = "April"; break;
                              case 5: $nama_bulan = "Mei"; break;
                              case 6: $nama_bulan = "Juni"; break;
                              case 7: $nama_bulan = "Juli"; break;
                              case 8: $nama_bulan = "Agustus"; break;
                              case 9: $nama_bulan = "September"; break;
                              case 10: $nama_bulan = "Oktober"; break;
                              case 11: $nama_bulan = "November"; break;
                              case 12: $nama_bulan = "Desember"; break;
                              default: $nama_bulan="Tidak Terdeteksi";break;
                            }
                  ?>

                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $nama_bulan.' '.$row['tahun'] ?></td>
                    <td style="text-align: right;"><?php echo number_format($row['provisi_jf'],0,'.',',') ?></td>
                    <td><?php echo $row['status_paid'] ?></td>
                  </tr>
                  <?php } ?>
                </table>

                <h3>Summary</h3>

                <table class="table table-bordered">
                  <tr>
                    <th>#</th>
                    <th>Provisi JF</th>
                  </tr>

                  <?php  
                    $no=0;
                    $result_salaw = tampil_saldo_awal_jf($_GET['no_pin']);
                    $row_salaw = mysqli_fetch_array($result_salaw);
                  ?>

                  <tr>
                    <td style="font-weight:bold">SALDO AWAL</td>
                    <td style="text-align: right;"><?php echo number_format($row_salaw['provisi_jf'],0,'.',',') ?></td>
                  </tr>


                  <?php  
                    $no=0;
                    $result_penyusutan = tampil_penyusutan_jf($_GET['no_pin']);
                    $row_penyusutan = mysqli_fetch_array($result_penyusutan);
                  ?>

                  <?php if($data['account_sts'] != 'ACTIVE'){ ?>
                  
                    <tr>
                      <td style="font-weight:bold">TOTAL PENYUSUTAN</td>
                      <td style="text-align: right;"><?php echo number_format($row_salaw['provisi_jf'],0,'.',',') ?></td>
                    </tr>

                  <?php }else{ ?>
                  
                    <tr>
                      <td style="font-weight:bold">TOTAL PENYUSUTAN</td>
                      <td style="text-align: right;"><?php echo number_format($row_penyusutan['provisi_jf_p'],0,'.',',') ?></td>
                    </tr>

                  <?php } ?>


                  <?php  
                    $no=0;
                    $result_salakh = tampil_saldo_akhir_jf($_GET['no_pin']);
                    $row_salakh = mysqli_fetch_array($result_salakh);
                  ?>

                  <?php if($data['account_sts'] != 'ACTIVE'){ ?>

                    <tr>
                      <td style="font-weight:bold">SALDO AKHIR</td>
                      <td style="text-align: right;">0</td>
                    </tr>
                  
                  <?php }else{ ?>

                    <tr>
                      <td style="font-weight:bold">SALDO AKHIR</td>
                      <td style="text-align: right;"><?php echo number_format($row_salakh['provisi_jf_akh'],0,'.',',') ?></td>
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