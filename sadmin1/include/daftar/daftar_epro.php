<?php
	include 'include/koneksi.php';

	$id = $_REQUEST['id'];
	

	$visel = $_REQUEST['visel'];
	$clos = $_REQUEST['clos'];
	$party = $_REQUEST['party'];

	if ($visel!=="") {
		$sql = "UPDATE daftar SET vessel_name = '$visel',
								  vessel_closing = '$clos'
								  WHERE id_daftar = '$id' ";
		$query = mysqli_query($db,$sql);
		$x = mysqli_insert_id($db);

		
		echo "
			<script>
				alert('Update Success !!');
				window.location='?page=daftar/daftar.php'
			</script>
		";

	} else {
		echo "
			<script>
				alert('Update Gagal !!');
				window.location='?page=daftar/daftar.php'
			</script>
		";
	}
	mysqli_close($db);
?>
