<?php
	include 'include/koneksi.php';
	$del = $_REQUEST['data'];
	$hapus = "DELETE FROM user WHERE id_user='$del' ";
	$query = mysqli_query($db,$hapus);
	if ($hapus == true) {
		echo "
			<script>
				alert('Delete Success !!');
				window.location='?page=user/user.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Delete Success !!');
				window.location='?page=user/user.php'
			</script>
		";
	}
	mysqli_close($db);
?>