<?php
	include 'include/koneksi.php';
	$del = $_REQUEST['data'];
	$hapus = "DELETE FROM con_vendor WHERE id_convendor='$del' ";
	$query = mysqli_query($db,$hapus);
	if ($hapus == true) {
		echo "
			<script>
				alert('Delete Success !!');
				window.location='?page=con_vendor/con_vendor.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Delete Success !!');
				window.location='?page=con_vendor/con_vendor.php'
			</script>
		";
	}
	mysqli_close($db);
?>