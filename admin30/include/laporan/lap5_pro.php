<?php 
	include '../koneksi.php';
	$nama = $_REQUEST['nama'];
	$alamat = $_REQUEST['alamat'];

	if ($nama !=="") {
		$sql = "INSERT INTO consignee (nama, alamat) VALUES ('$nama', '$alamat')";
		$query = mysqli_query($db,$sql);

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