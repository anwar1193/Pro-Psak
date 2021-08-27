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
                <i class="fa fa-home"></i> Home
              </a></li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-upload"></i> Upload Data <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#" data-toggle="modal" data-target="#modal-upload">Data Awal</a></li>
                  <li class="divider"></li>
                  <li><a href="data_feeding.php">Lihat Data</a></li>
                  <li class="divider"></li>
                  <li><a href="#" data-toggle="modal" data-target="#modal-status">Upload AccStatus</a></li>
                </ul>
              </li>

              <li><a href="logout.php">
                <i class="fa fa-times" style="color: red"></i> Logout
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

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Upload</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Upload -->


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

                <span><a href="transfer_dleas/transfer_nopin/kirim.php" class="btn btn-success btn-xs">
                  <i class="fa fa-refresh"></i> Tarik Dari Dleas
                </a></span>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label for="exampleInputFile">File Upload</label>
                <input type="file" name="berkas_status" class="form-control" id="exampleInputFile" required>
              </div>    

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Upload</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- / Modal Status -->