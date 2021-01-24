<?php
	include 'include/koneksi.php';
	$del = $_REQUEST['data'];
	$hapus = "DELETE FROM con_type WHERE id_container='$del' ";
	$query = mysqli_query($db,$hapus);
	if ($hapus == true) {
		echo "
			<script>
				alert('Delete Success !!');
				window.location='?page=con_type/con_type.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Delete Success !!');
				window.location='?page=con_type/con_type.php'
			</script>
		";
	}
	mysqli_close($db);
?>