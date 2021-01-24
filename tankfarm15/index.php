<?php
error_reporting(0);
session_start();
$status = $_SESSION['status_user'];
$user = $_SESSION['username'];
if ($status!="tankfarm") {
  echo "
    <script>
      alert('Silahkan Login Terlebih Dahulu');
      window.location.href='../'
    </script>
  ";
}

?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PT Unilever Oleochemical Indonesia</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/font-awesome-4.4.0/css/font-awesome.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css"> <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css"><!-- 
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-datetimepicker.css"> -->
    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="plugins/datatables/dataTables.bootstrap.css">

  </head>
  <body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
    <div class="wrapper">
      <header class="main-header" >
      <?php
         include 'include/header.php';
      ?>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <!-- <aside class="main-sidebar">
        <?php
            //include 'include/menu.php';
        ?>
      </aside> -->

      <!-- Content Wrapper. Contains page content -->
      <!-- <div class="content-wrapper"> -->
        <!-- Main content -->
        <section class="content" style="background:  white;">

          <!-- Main row CONTENT-->
          <div class="row">
            <div class="col-md-12">
               <?php
                  $page = $_GET['page'];
                  if (!isset($page)) {
                     include 'include/tankfarm/tankfarm.php';
                  } else {
                     include 'include/'.$page;
                  }
               ?>
            </div>
          </div><!-- /.row (main row) -->
        </section><!-- /.content -->
      <!-- </div> --><!-- /.content-wrapper -->
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jQueryUI/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- datepicker -->

    <!-- <script src="plugins/bootstrap-datetimepicker.js"></script> -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    <script type="text/javascript">
      $(function(){
        //Initialize Select2 Elements
        $(".select2").select2();
        //Initialize datepicker Elements
        $("#datepicker1").datepicker({
          autoclose:true,
          todayHighlight:true,
          format: 'yyyy-mm-dd',
        });
        $("#datepicker2").datepicker({
          autoclose:true,
          todayHighlight:true,
          format: 'yyyy-mm-dd',
        });
        $("#datepicker3").datepicker({
          autoclose:true,
          todayHighlight:true,
          format: 'yyyy-mm-dd',
        });
        $("#datepicker4").datepicker({
          autoclose:true,
          todayHighlight:true,
          format: 'yyyy-mm-dd',
        });
        $("#datepicker5").datepicker({
          autoclose:true,
          todayHighlight:true,
          format: 'yyyy-mm-dd',
        });
      });
    </script>
  </body>
</html>
