<?php
	$start=date('Y-m-d',strtotime($_REQUEST['start']));
	$end=date('Y-m-d',strtotime($_REQUEST['end']));

	list($years, $months, $days) = split('-', $start);
	$tgls=$days."-".$months."-".$years;

	list($yeare, $monthe, $daye) = split('-', $end);
	$tgle=$daye."-".$monthe."-".$yeare;

	if (isset($_REQUEST['psg'])){
		include "include/koneksi.php";
	}
?>


    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/font-awesome-4.4.0/css/font-awesome.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css"> <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Date Picker -->
    <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- 
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-datetimepicker.css"> -->
    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="../../plugins/datatables/dataTables.bootstrap.css">

    <div class="container">
		<a href="../../?page=transaksi/transaksi.php" class="btn btn-primary" style="margin-top: 10px; margin-bottom: 10px;">
			Back To Dashbord
		</a>
		<table id="example1" class="table table-bordered table-hover">
			<thead>
			  <tr>
			    <th>No</th>
			    <th>DN No</th>
			    <th>Tanggal Terima</th>
			    <th>Waktu Terima</th>
			    <th>Tanggal Selesai</th>
			    <th>Waktu Selesai</th>
			  </tr>
			</thead>
			<tbody>
			  <?php
			    $no=1;
			    include '../koneksi.php';
			    $sql = "SELECT * FROM transaksi WHERE terima_tgl>='$start' AND terima_tgl<='$end' ";
			    $query = mysqli_query($db,$sql);
			    while ($ambil = mysqli_fetch_array($query)) {
					$id = $ambil['id_daftar'];
					$dno = $ambil['dn_no'];
					$Tgl_trim = $ambil['terima_tgl'];
					$Tgl_sele = $ambil['terima_time'];
					$selesai_tgl = $ambil['selesai_tgl'];
					$selesai_time = $ambil['selesai_time'];
				?>
		        <tr>
		          <td><?php echo $no++; ?></td>
		          <td><?php echo $dno; ?></td>
		          <td><?php echo $Tgl_trim; ?></td>
		          <td><?php echo $Tgl_sele; ?></td>
		          <td><?php echo $selesai_tgl; ?></td>
		          <td><?php echo $selesai_time; ?></td>
		        </tr>
			  	<?php } mysqli_close($db); ?>
			</tbody>
		</table>
	</div>