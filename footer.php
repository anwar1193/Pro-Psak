      <footer class="main-footer">
        <div class="container-fluid">
          <div class="pull-right hidden-xs">
            <b>PT Procar Int'l Finance</b>
          </div>
          <strong>Copyright &copy; 2020 <a href="#">PSAK Accounting</a>.</strong> All rights reserved.
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="asset/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="asset/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="asset/plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='asset/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="asset/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="asset/dist/js/demo.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="asset/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="asset/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
  </body>
</html>