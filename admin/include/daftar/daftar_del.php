<?php
	include 'include/koneksi.php';
	$del = $_REQUEST['data'];
	$hapus = "DELETE FROM daftar WHERE id_daftar='$del' ";
	$query = mysqli_query($db,$hapus);
	if ($hapus == true) {
		echo "
			<script>
				alert('Delete Success !!');
				window.location='?page=daftar/daftar.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Delete Success !!');
				window.location='?page=daftar/daftar.php'
			</script>
		";
	}
	mysqli_close($db);
?>