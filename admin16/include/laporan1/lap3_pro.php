<?php 
	include '../koneksi.php';
	
	$id1 = $_REQUEST['id1'];
	$notify = $_REQUEST['notify'];
	$detinasi = $_REQUEST['desti'];
	$net = $_REQUEST['netwg'];
	$gross = $_REQUEST['gross'];
	$marks = $_REQUEST['marks'];
	$freight = $_REQUEST['freight'];

	if ($notify !=="") {
		$sql = "INSERT INTO laporan3 (id_daftar, notify, destination, netwg, gross, marks, freight) VALUES ('$id1', '$notify', '$detinasi', '$net', '$gross', '$marks', '$freight')";

		$query = mysqli_query($db, $sql);

		echo "
			<script>
				alert('Insert Success !!');
				window.location='?page=laporan/laporan3.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Insert Success !!');
				window.location='?page=laporan/laporan3.php'
			</script>
		";
	}
?>