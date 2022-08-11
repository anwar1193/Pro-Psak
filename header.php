<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>PRO-PSAK</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="asset/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="asset/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- DATA TABLES -->
    <link href="asset/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

  </head>

  <body class="skin-yellow layout-top-nav">
    <div class="wrapper">
      
      <header class="main-header">               
        <nav class="navbar navbar-static-top">
          <div class="container-fluid">
          <div class="navbar-header">
            <a href="home.php" class="navbar-brand"><b>PRO-</b>PSAK</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">

              <li><a href="home.php">
                <i class="fa fa-home"></i> HOME
              </a></li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-upload"></i> DATA PSAK NASABAH <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#" data-toggle="modal" data-target="#modal-upload">Upload Data Awal</a></li>
                  <li class="divider"></li>
                  <li><a href="data_feeding.php">Lihat Data</a></li>
                  <li class="divider"></li>
                  <li><a href="#" data-toggle="modal" data-target="#modal-status">Upload AccStatus</a></li>
                  <li class="divider"></li>
                  <li><a href="excel_prediksi_psak.php">Prediksi Psak</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-upload"></i> DATA JF <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#" data-toggle="modal" data-target="#modal-upload-jf">Upload Data Awal</a></li>
                  <li class="divider"></li>
                  <li><a href="data_feeding_jf.php">Lihat Data</a></li>
                  <li class="divider"></li>
                  <li><a href="#" data-toggle="modal" data-target="#modal-statusJF">Upload AccStatus JF</a></li>
                  <li class="divider"></li>
                  <li><a href="excel_prediksi_jf.php">Prediksi JF</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-upload"></i> DATA ACCRUE <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#" data-toggle="modal" data-target="#modal-upload-accrue">Upload Data Awal</a></li>
                  <li class="divider"></li>
                  <li><a href="data_feeding_accrue.php">Lihat Data</a></li>
                  <li class="divider"></li>
                  <li><a href="#" data-toggle="modal" data-target="#modal-statusAccrue">Upload AccStatus Accrue</a></li>
                  <li class="divider"></li>
                  <li><a href="#" data-toggle="modal" data-target="#modal-paymentAccrue">Data Payment</a></li>
                  <li class="divider"></li>
                  <li><a href="excel_prediksi_accrue.php">Prediksi Accrue</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-file-excel-o"></i> LAPORAN PSAK NASABAH <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#" data-toggle="modal" data-target="#modal-report1">Rincian Penyusutan</a></li>
                  <li class="divider"></li>
                  <li><a href="#" data-toggle="modal" data-target="#modal-report2">Rincian Saldo Akhir</a></li>
                  <li class="divider"></li>
                  <li><a href="#" data-toggle="modal" data-target="#modal-report3">Rincian Saldo Awal</a></li>
                  <li class="divider"></li>
                  <li><a href="#" data-toggle="modal" data-target="#modal-report4">Mutasi Bulanan</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-file-excel-o"></i> LAPORAN JF <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#" data-toggle="modal" data-target="#modal-report1jf">Rincian Penyusutan</a></li>
                  <li class="divider"></li>
                  <li><a href="#" data-toggle="modal" data-target="#modal-report2jf">Rincian Saldo Akhir</a></li>
                  <li class="divider"></li>
                  <li><a href="#" data-toggle="modal" data-target="#modal-report3jf">Rincian Saldo Awal</a></li>
                  <li class="divider"></li>
                  <li><a href="#" data-toggle="modal" data-target="#modal-report4jf">Mutasi Bulanan</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-file-excel-o"></i> LAPORAN ACCRUE <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#" data-toggle="modal" data-target="#modal-report1accrue">Rincian Penyusutan</a></li>
                  <li class="divider"></li>
                  <li><a href="#" data-toggle="modal" data-target="#modal-report2accrue">Rincian Saldo Akhir</a></li>
                  <li class="divider"></li>
                  <li><a href="#" data-toggle="modal" data-target="#modal-report3accrue">Rincian Saldo Awal</a></li>
                  <li class="divider"></li>
                  <li><a href="#" data-toggle="modal" data-target="#modal-report4accrue">Mutasi Bulanan</a></li>
                </ul>
              </li>

              <li><a href="logout.php">
                <i class="fa fa-times" style="color: red"></i> LOGOUT
              </a></li>

            </ul>
          </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>

      <!-- Modal Upload -->
      <form action="proses.php" method="post" enctype="multipart/form-data">
      <div class="modal fade" id="modal-upload">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">Upload Data Awal</h4>

                <span><a href="data_psak.xlsx" class="btn btn-info btn-xs">
                  <i class="fa fa-download"></i> Download Format
                </a></span>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label for="exampleInputFile">File Upload</label>
                <input type="file" name="berkas_excel" class="form-control" id="exampleInputFile" required>
              </div>    

              <!-- Animasi Loading -->
              <div id="loader-dataAwal" style="position: absolute; top: 0; left: 45%;">
                <img src="img/loading.gif" alt="" width="80px">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-primary" id="tombol-dataAwal"><i class="fa fa-send"></i> Upload</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Upload -->


      <!-- Modal Upload JF -->
      <form action="proses_jf.php" method="post" enctype="multipart/form-data">
      <div class="modal fade" id="modal-upload-jf">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">Upload Data Awal JF</h4>

                <span><a href="data_jf.xlsx" class="btn btn-info btn-xs">
                  <i class="fa fa-download"></i> Download Format
                </a></span>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label for="exampleInputFile">File Upload</label>
                <input type="file" name="berkas_excel" class="form-control" id="exampleInputFile" required>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-primary" id="tombol-dataAwalJF"><i class="fa fa-send"></i> Upload</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Upload JF -->


      <!-- Modal Upload Accrue -->
      <form action="proses_accrue.php" method="post" enctype="multipart/form-data">
      <div class="modal fade" id="modal-upload-accrue">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">Upload Data Awal Accrue</h4>

                <span><a href="data_accrue.xlsx" class="btn btn-info btn-xs">
                  <i class="fa fa-download"></i> Download Format
                </a></span>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label for="exampleInputFile">File Upload</label>
                <input type="file" name="berkas_excel" class="form-control" id="exampleInputFile" required>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-primary" id="tombol-dataAwalAccrue"><i class="fa fa-send"></i> Upload</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Upload Accrue -->


      <!-- Modal Status -->
      <form action="proses_status.php" method="post" enctype="multipart/form-data">
      <div class="modal fade" id="modal-status">

        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">Ubah Account Status</h4><br>

                <span><a href="data_status.xlsx" class="btn btn-info btn-xs">
                  <i class="fa fa-download"></i> Download Format
                </a></span>

                <!-- transfer_dleas/transfer_nopin/kirim.php -->
                <span><a href="transfer_dleas/transfer_nopin/kirim.php" class="btn btn-success btn-xs" id="tombol-tarik-dleas">
                  <i class="fa fa-refresh"></i> Tarik Dari Dleas
                </a></span>

                 <!-- lihat account status -->
                 <span><a href="data_accStatus.php" class="btn btn-warning btn-xs">
                    <i class="fa fa-eye"></i> Lihat Account Status
                  </a></span>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label for="exampleInputFile">File Upload</label>
                <input type="file" name="berkas_status" class="form-control" id="exampleInputFile" required>
              </div> 
              
              <!-- Animasi Loading -->
              <div id="loader" style="position: absolute; top: 0; left: 45%;">
                <img src="img/loading.gif" alt="" width="80px">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-primary" id="tombol-upload-status"><i class="fa fa-send"></i> Upload</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Status -->


      <!-- Modal Status JF -->
      <form action="proses_status_jf.php" method="post" enctype="multipart/form-data">
      <div class="modal fade" id="modal-statusJF">

        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">Ubah Account Status JF</h4><br>

                <span><a href="data_statusJF.xlsx" class="btn btn-info btn-xs">
                  <i class="fa fa-download"></i> Download Format
                </a></span>

                <!-- transfer_dleas/transfer_nopin/kirim.php -->
                <span><a href="transfer_dleas/transfer_nopin_jf/kirim.php" class="btn btn-success btn-xs" id="tombol-tarik-dleas">
                  <i class="fa fa-refresh"></i> Tarik Dari Dleas
                </a></span>

                 <!-- lihat account status -->
                 <span><a href="data_accStatusJF.php" class="btn btn-warning btn-xs">
                    <i class="fa fa-eye"></i> Lihat Account Status JF
                  </a></span>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label for="exampleInputFile">File Upload</label>
                <input type="file" name="berkas_status" class="form-control" id="exampleInputFile" required>
              </div> 
              
              <!-- Animasi Loading -->
              <div id="loader_statusJF" style="position: absolute; top: 0; left: 45%;">
                <img src="img/loading.gif" alt="" width="80px">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-primary" id="tombol-upload-statusJF"><i class="fa fa-send"></i> Upload</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Status JF -->


      <!-- Modal Status Accrue -->
      <form action="proses_status_accrue.php" method="post" enctype="multipart/form-data">
      <div class="modal fade" id="modal-statusAccrue">

        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">Ubah Account Status Accrue</h4><br>

                <span><a href="data_statusAccrue.xlsx" class="btn btn-info btn-xs">
                  <i class="fa fa-download"></i> Download Format
                </a></span>

                <!-- transfer_dleas/transfer_nopin/kirim.php -->
                <span><a href="transfer_dleas/transfer_nopin_accrue/kirim.php" class="btn btn-success btn-xs" id="tombol-tarik-dleas">
                  <i class="fa fa-refresh"></i> Tarik Dari Dleas
                </a></span>

                 <!-- lihat account status -->
                 <span><a href="data_accStatusAccrue.php" class="btn btn-warning btn-xs">
                    <i class="fa fa-eye"></i> Lihat Account Status Accrue
                  </a></span>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label for="exampleInputFile">File Upload</label>
                <input type="file" name="berkas_status" class="form-control" id="exampleInputFile" required>
              </div> 
              
              <!-- Animasi Loading -->
              <div id="loader_statusAccrue" style="position: absolute; top: 0; left: 45%;">
                <img src="img/loading.gif" alt="" width="80px">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-primary" id="tombol-upload-statusAccrue"><i class="fa fa-send"></i> Upload</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Status Accrue -->


      <!-- Modal Payment Accrue -->
      <form action="transfer_dleas/transfer_payment_accrue/kirim.php" method="post" enctype="multipart/form-data">
      <div class="modal fade" id="modal-paymentAccrue">

        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">Tarik Data Payment Dari Dleas</h4><br>

                 <!-- lihat account status -->
                 <span><a href="data_payment.php" class="btn btn-warning btn-xs">
                    <i class="fa fa-eye"></i> Lihat Data Payment
                  </a></span>
            </div>
            <div class="modal-body">
              
              <!-- Inputan Bulan -->
              <div class="form-group">
                <label for="exampleInputFile">Pilih Bulan</label>
                <select name="bulan" class="form-control" required="">
                  <option value="">-Pilih-</option>
                  <?php 
                    for($i=1 ; $i<=12 ; $i++){ 

                      switch($i){
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

                      }
                  ?>

                  <option value="<?php echo $i; ?>"><?php echo $nama_bulan; ?></option>
                  <?php } ?>
                </select>
              </div> 
              
              <!-- Inputan Tahun -->
              <div class="form-group">
                <label for="tahun">Masukkan Tahun</label>
                <input type="number" class="form-control" name="tahun" autocomplete="off" required="">
              </div>

              <!-- Animasi Loading -->
              <!-- <div id="loader_statusAccrue" style="position: absolute; top: 0; left: 45%;">
                <img src="img/loading.gif" alt="" width="80px">
              </div> -->

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-primary" id="tombol-upload-statusAccrue"><i class="fa fa-refresh"></i> Tarik Dleas</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Payment Accrue -->


      <!-- Modal Report 1 -->
      <form action="report_psak/rincian_penyusutan.php" target="_blank" method="post" enctype="multipart/form-data">
      <div class="modal fade" id="modal-report1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">Laporan Rincian Penyusutan</h4>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label for="fincat_psak">FINCAT :</label>
                <select name="fincat_psak" id="fincat_psak">
                  <option value="all">All</option>
                  <option value="INVST - INST LOAN">INVST - INST LOAN</option>
                  <option value="MTGNA - INST LOAN">MTGNA - INST LOAN</option>
                  <option value="MKRJA - MODAL USAHA">MKRJA - MODAL USAHA</option>
                </select>

                <label for="bulan_psak">Bulan :</label>
                <select name="bulan_psak" id="bulan_psak" required="">
                  <option value="">- Pilih Bulan -</option>
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

                <label for="tahun">Tahun :</label>
                <input type="number" name="tahun_psak" style="width:80px" required="">

              </div>    

              <!-- Animasi Loading -->
              <div id="loader-report1" style="position: absolute; top: 0; left: 45%;">
                <img src="img/loading.gif" alt="" width="80px">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-success" id="tombol-report1"><i class="fa fa-file-excel-o"></i> Download Laporan</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Report 1 -->


      <!-- Modal Report 2 -->
      <form action="report_psak/rincian_saldo_akhir.php" target="_blank" method="post" enctype="multipart/form-data">
      <div class="modal fade" id="modal-report2">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">Laporan Rincian Saldo Akhir</h4>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label for="fincat_saldo_akhir">FINCAT :</label>
                <select name="fincat_saldo_akhir" id="fincat_saldo_akhir" style="width:200px">
                  <option value="all">All</option>
                  <option value="INVST - INST LOAN">INVST - INST LOAN</option>
                  <option value="MTGNA - INST LOAN">MTGNA - INST LOAN</option>
                  <option value="MKRJA - MODAL USAHA">MKRJA - MODAL USAHA</option>
                </select>

              </div>    

              <!-- Animasi Loading -->
              <div id="loader-report2" style="position: absolute; top: 0; left: 45%;">
                <img src="img/loading.gif" alt="" width="80px">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-success" id="tombol-report2"><i class="fa fa-file-excel-o"></i> Download Laporan</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Report 2 -->


      <!-- Modal Report 3 -->
      <form action="report_psak/rincian_saldo_awal.php" target="_blank" method="post" enctype="multipart/form-data">
      <div class="modal fade" id="modal-report3">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">Laporan Rincian Saldo Awal</h4>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label for="fincat_saldo_awal">FINCAT :</label>
                <select name="fincat_saldo_awal" id="fincat_saldo_awal">
                  <option value="all">All</option>
                  <option value="INVST - INST LOAN">INVST - INST LOAN</option>
                  <option value="MTGNA - INST LOAN">MTGNA - INST LOAN</option>
                  <option value="MKRJA - MODAL USAHA">MKRJA - MODAL USAHA</option>
                </select>

                <label for="bulan_saldo_awal">Bulan :</label>
                <select name="bulan_saldo_awal" id="bulan_saldo_awal" required="">
                  <option value="">- Pilih Bulan -</option>
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

                <label for="tahun_saldo_awal">Tahun :</label>
                <input type="number" name="tahun_saldo_awal" style="width:80px" required="">

              </div>    

              <!-- Animasi Loading -->
              <div id="loader-report3" style="position: absolute; top: 0; left: 45%;">
                <img src="img/loading.gif" alt="" width="80px">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-success" id="tombol-report3"><i class="fa fa-file-excel-o"></i> Download Laporan</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Report 3 -->


      <!-- Modal Report 4 -->
      <form action="report_psak/mutasi_bulanan.php" target="_blank" method="post" enctype="multipart/form-data">
      <div class="modal fade" id="modal-report4">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">Laporan Mutasi Bulanan</h4>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label for="fincat_mutasi_bulanan">FINCAT :</label>
                <select name="fincat_mutasi_bulanan" id="fincat_mutasi_bulanan">
                  <option value="all">All</option>
                  <option value="INVST - INST LOAN">INVST - INST LOAN</option>
                  <option value="MTGNA - INST LOAN">MTGNA - INST LOAN</option>
                  <option value="MKRJA - MODAL USAHA">MKRJA - MODAL USAHA</option>
                </select>

                <label for="bulan_mutasi_bulanan">Bulan :</label>
                <select name="bulan_mutasi_bulanan" id="bulan_mutasi_bulanan" required="">
                  <option value="">- Pilih Bulan -</option>
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

                <label for="tahun_mutasi_bulanan">Tahun :</label>
                <input type="number" name="tahun_mutasi_bulanan" style="width:80px" required="">

              </div>    

              <!-- Animasi Loading -->
              <div id="loader-report4" style="position: absolute; top: 0; left: 45%;">
                <img src="img/loading.gif" alt="" width="80px">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-success" id="tombol-report4"><i class="fa fa-file-excel-o"></i> Download Laporan</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Report 4 -->


      <!-- Modal Report 1 JF -->
      <form action="report_psak_jf/rincian_penyusutan.php" target="_blank" method="post" enctype="multipart/form-data">
      <div class="modal fade" id="modal-report1jf">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">Laporan Rincian Penyusutan</h4>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label for="fincat_psak">FINCAT :</label>
                <select name="fincat_psak" id="fincat_psak">
                  <option value="all">All</option>
                  <option value="INVST - INST LOAN">INVST - INST LOAN</option>
                  <option value="MTGNA - INST LOAN">MTGNA - INST LOAN</option>
                  <option value="MKRJA - MODAL USAHA">MKRJA - MODAL USAHA</option>
                </select>

                <label for="bulan_psak">Bulan :</label>
                <select name="bulan_psak" id="bulan_psak" required="">
                  <option value="">- Pilih Bulan -</option>
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

                <label for="tahun">Tahun :</label>
                <input type="number" name="tahun_psak" style="width:80px" required="">

              </div>    

              <!-- Animasi Loading -->
              <div id="loader-report1jf" style="position: absolute; top: 0; left: 45%;">
                <img src="img/loading.gif" alt="" width="80px">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-success" id="tombol-report1jf"><i class="fa fa-file-excel-o"></i> Download Laporan</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Report 1 JF -->


      <!-- Modal Report 2 JF -->
      <form action="report_psak_jf/rincian_saldo_akhir.php" target="_blank" method="post" enctype="multipart/form-data">
      <div class="modal fade" id="modal-report2jf">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">Laporan Rincian Saldo Akhir</h4>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label for="fincat_saldo_akhir">FINCAT :</label>
                <select name="fincat_saldo_akhir" id="fincat_saldo_akhir" style="width:200px">
                  <option value="all">All</option>
                  <option value="INVST - INST LOAN">INVST - INST LOAN</option>
                  <option value="MTGNA - INST LOAN">MTGNA - INST LOAN</option>
                  <option value="MKRJA - MODAL USAHA">MKRJA - MODAL USAHA</option>
                </select>

              </div>    

              <!-- Animasi Loading -->
              <div id="loader-report2jf" style="position: absolute; top: 0; left: 45%;">
                <img src="img/loading.gif" alt="" width="80px">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-success" id="tombol-report2jf"><i class="fa fa-file-excel-o"></i> Download Laporan</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Report 2 JF -->


      <!-- Modal Report 3 JF -->
      <form action="report_psak_jf/rincian_saldo_awal.php" target="_blank" method="post" enctype="multipart/form-data">
      <div class="modal fade" id="modal-report3jf">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">Laporan Rincian Saldo Awal</h4>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label for="fincat_saldo_awal">FINCAT :</label>
                <select name="fincat_saldo_awal" id="fincat_saldo_awal">
                  <option value="all">All</option>
                  <option value="INVST - INST LOAN">INVST - INST LOAN</option>
                  <option value="MTGNA - INST LOAN">MTGNA - INST LOAN</option>
                  <option value="MKRJA - MODAL USAHA">MKRJA - MODAL USAHA</option>
                </select>

                <label for="bulan_saldo_awal">Bulan :</label>
                <select name="bulan_saldo_awal" id="bulan_saldo_awal" required="">
                  <option value="">- Pilih Bulan -</option>
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

                <label for="tahun_saldo_awal">Tahun :</label>
                <input type="number" name="tahun_saldo_awal" style="width:80px" required="">

              </div>    

              <!-- Animasi Loading -->
              <div id="loader-report3jf" style="position: absolute; top: 0; left: 45%;">
                <img src="img/loading.gif" alt="" width="80px">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-success" id="tombol-report3jf"><i class="fa fa-file-excel-o"></i> Download Laporan</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Report 3 JF -->


      <!-- Modal Report 4 JF -->
      <form action="report_psak_jf/mutasi_bulanan.php" target="_blank" method="post" enctype="multipart/form-data">
      <div class="modal fade" id="modal-report4jf">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">Laporan Mutasi Bulanan</h4>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label for="fincat_mutasi_bulanan">FINCAT :</label>
                <select name="fincat_mutasi_bulanan" id="fincat_mutasi_bulanan">
                  <option value="all">All</option>
                  <option value="INVST - INST LOAN">INVST - INST LOAN</option>
                  <option value="MTGNA - INST LOAN">MTGNA - INST LOAN</option>
                  <option value="MKRJA - MODAL USAHA">MKRJA - MODAL USAHA</option>
                </select>

                <label for="bulan_mutasi_bulanan">Bulan :</label>
                <select name="bulan_mutasi_bulanan" id="bulan_mutasi_bulanan" required="">
                  <option value="">- Pilih Bulan -</option>
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

                <label for="tahun_mutasi_bulanan">Tahun :</label>
                <input type="number" name="tahun_mutasi_bulanan" style="width:80px" required="">

              </div>    

              <!-- Animasi Loading -->
              <div id="loader-report4jf" style="position: absolute; top: 0; left: 45%;">
                <img src="img/loading.gif" alt="" width="80px">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-success" id="tombol-report4jf"><i class="fa fa-file-excel-o"></i> Download Laporan</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Report 4 JF -->


      <!-- Modal Report 1 Accrue -->
      <form action="report_psak_accrue/rincian_penyusutan.php" target="_blank" method="post" enctype="multipart/form-data">
      <div class="modal fade" id="modal-report1accrue">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">Laporan Rincian Penyusutan</h4>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label for="fincat_psak">FINCAT :</label>
                <select name="fincat_psak" id="fincat_psak">
                  <option value="all">All</option>
                  <option value="INVST - INST LOAN">INVST - INST LOAN</option>
                  <option value="MTGNA - INST LOAN">MTGNA - INST LOAN</option>
                  <option value="MKRJA - MODAL USAHA">MKRJA - MODAL USAHA</option>
                </select>

                <label for="bulan_psak">Bulan :</label>
                <select name="bulan_psak" id="bulan_psak" required="">
                  <option value="">- Pilih Bulan -</option>
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

                <label for="tahun">Tahun :</label>
                <input type="number" name="tahun_psak" style="width:80px" required="">

              </div>    

              <!-- Animasi Loading -->
              <div id="loader-report1accrue" style="position: absolute; top: 0; left: 45%;">
                <img src="img/loading.gif" alt="" width="80px">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-success" id="tombol-report1"><i class="fa fa-file-excel-o"></i> Download Laporan</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Report 1 Accrue -->


      <!-- Modal Report 2 Accrue -->
      <form action="report_psak_accrue/rincian_saldo_akhir.php" target="_blank" method="post" enctype="multipart/form-data">
      <div class="modal fade" id="modal-report2accrue">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">Laporan Rincian Saldo Akhir</h4>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label for="fincat_saldo_akhir">FINCAT :</label>
                <select name="fincat_saldo_akhir" id="fincat_saldo_akhir" style="width:200px">
                  <option value="all">All</option>
                  <option value="INVST - INST LOAN">INVST - INST LOAN</option>
                  <option value="MTGNA - INST LOAN">MTGNA - INST LOAN</option>
                  <option value="MKRJA - MODAL USAHA">MKRJA - MODAL USAHA</option>
                </select>

              </div>    

              <!-- Animasi Loading -->
              <div id="loader-report2accrue" style="position: absolute; top: 0; left: 45%;">
                <img src="img/loading.gif" alt="" width="80px">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-success" id="tombol-report2"><i class="fa fa-file-excel-o"></i> Download Laporan</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Report 2 Accrue -->


      <!-- Modal Report 3 Accrue -->
      <form action="report_psak_accrue/rincian_saldo_awal.php" target="_blank" method="post" enctype="multipart/form-data">
      <div class="modal fade" id="modal-report3accrue">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">Laporan Rincian Saldo Awal</h4>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label for="fincat_saldo_awal">FINCAT :</label>
                <select name="fincat_saldo_awal" id="fincat_saldo_awal">
                  <option value="all">All</option>
                  <option value="INVST - INST LOAN">INVST - INST LOAN</option>
                  <option value="MTGNA - INST LOAN">MTGNA - INST LOAN</option>
                  <option value="MKRJA - MODAL USAHA">MKRJA - MODAL USAHA</option>
                </select>

                <label for="bulan_saldo_awal">Bulan :</label>
                <select name="bulan_saldo_awal" id="bulan_saldo_awal" required="">
                  <option value="">- Pilih Bulan -</option>
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

                <label for="tahun_saldo_awal">Tahun :</label>
                <input type="number" name="tahun_saldo_awal" style="width:80px" required="">

              </div>    

              <!-- Animasi Loading -->
              <div id="loader-report3accrue" style="position: absolute; top: 0; left: 45%;">
                <img src="img/loading.gif" alt="" width="80px">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-success" id="tombol-report3"><i class="fa fa-file-excel-o"></i> Download Laporan</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Report 3 Accrue -->


      <!-- Modal Report 4 Accrue -->
      <form action="report_psak_accrue/mutasi_bulanan.php" target="_blank" method="post" enctype="multipart/form-data">
      <div class="modal fade" id="modal-report4accrue">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">Laporan Mutasi Bulanan</h4>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label for="fincat_mutasi_bulanan">FINCAT :</label>
                <select name="fincat_mutasi_bulanan" id="fincat_mutasi_bulanan">
                  <option value="all">All</option>
                  <option value="INVST - INST LOAN">INVST - INST LOAN</option>
                  <option value="MTGNA - INST LOAN">MTGNA - INST LOAN</option>
                  <option value="MKRJA - MODAL USAHA">MKRJA - MODAL USAHA</option>
                </select>

                <label for="bulan_mutasi_bulanan">Bulan :</label>
                <select name="bulan_mutasi_bulanan" id="bulan_mutasi_bulanan" required="">
                  <option value="">- Pilih Bulan -</option>
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

                <label for="tahun_mutasi_bulanan">Tahun :</label>
                <input type="number" name="tahun_mutasi_bulanan" style="width:80px" required="">

              </div>    

              <!-- Animasi Loading -->
              <div id="loader-report4accrue" style="position: absolute; top: 0; left: 45%;">
                <img src="img/loading.gif" alt="" width="80px">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-success" id="tombol-report4"><i class="fa fa-file-excel-o"></i> Download Laporan</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Report 4 Accrue -->


      <!-- jQuery 2.1.3 -->
      <script src="asset/plugins/jQuery/jQuery-2.1.3.min.js"></script>

      <script>

        $(document).ready(function(){
          $('#loader').hide();
          $('#loader_statusJF').hide();
          $('#loader_statusAccrue').hide();
          $('#loader-dataAwal').hide();
          $('#loader-report1').hide();
          $('#loader-report2').hide();
          $('#loader-report3').hide();
          $('#loader-report4').hide();
          $('#loader-report1jf').hide();
          $('#loader-report2jf').hide();
          $('#loader-report3jf').hide();
          $('#loader-report4jf').hide();
          $('#loader-report1accrue').hide();
          $('#loader-report2accrue').hide();
          $('#loader-report3accrue').hide();
          $('#loader-report4accrue').hide();

          $(document).on('click', '#tombol-tarik-dleas, #tombol-upload-status, #tombol-upload-statusJF', function(){
            $('#loader').show();
          });

          $(document).on('click', '#tombol-dataAwal, #tombol-dataAwalJF, #tombol-dataAwalAccrue', function(){
            $('#loader-dataAwal').show();
          });

          $(document).on('click', '#tombol-upload-statusAccrue', function(){
            $('#loader_statusAccrue').show();
          });


          // $(document).on('click', '#tombol-report1', function(){
          //   $('#loader-report1').show();
          // });

        });

      </script>