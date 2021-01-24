<?php 
	include '../koneksi.php';
	$id1 = $_REQUEST['id1'];
	$nama = $_REQUEST['nama'];
	$alamat = $_REQUEST['alamat'];

	$page = $_REQUEST['page'];
	$number = $_REQUEST['number'];
	$shiper = $_REQUEST['shiper'];
	$carier = $_REQUEST['carier'];
	$relay1 = $_REQUEST['relay1'];
	$voyage1 = $_REQUEST['voyage1'];
	$relay2 = $_REQUEST['relay2'];
	$voyage2 = $_REQUEST['voyage2'];
	$liquid = $_REQUEST['liquid'];
	$imo = $_REQUEST['imo'];
	$sub = $_REQUEST['sub'];
	$un = $_REQUEST['un'];
	$pg = $_REQUEST['pg'];
	$fp = $_REQUEST['fp'];
	$mpy = $_REQUEST['mpy'];
	$netwt = $_REQUEST['netwt'];
	$info = $_REQUEST['info'];
	$state = $_REQUEST['state'];

	if ($nama !=="") {
		$sql = "INSERT INTO consignee (nama, alamat) VALUES ('$nama', '$alamat')";
		$query = mysqli_query($db,$sql);

		$sql1 = "INSERT INTO laporan5 (id_daftar, page, numor, shiper, carier, relay1, voyage1, relay2, voyage2, liquid, imo, sub, un, pg, fp, mpy, netwt, handling, state) VALUES ('$id1', '$page', '$number', '$shiper', '$carier', '$relay1', '$voyage1', '$relay2', '$voyage2', '$liquid', '$imo', '$sub', '$un', '$pg', '$fp', '$mpy', '$netwt', '$info', '$state')";
		$query1 = mysqli_query($db,$sql1);

		echo "
				<script>
					alert('Insert Success !!');
					window.location='?page=laporan/laporan5.php'
				</script>
			";
	} else {
		echo "
				<script>
					alert('Insert Success !!');
					window.location='?page=laporan/laporan5.php'
				</script>
			";
	}
	mysqli_close($db);
?>