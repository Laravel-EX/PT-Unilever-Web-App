<?php
	include 'include/koneksi.php';
	$id = $_REQUEST['id'];
	$ctype = $_REQUEST['ctype'];
	if ($ctype!=="") {
		$sql = "UPDATE con_type SET container = '$ctype' WHERE id_container ='$id' ";
		$query = mysqli_query($db,$sql);
		echo "
			<script>
				alert('Update Success !!');
				window.location='?page=con_type/con_type.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Update Failed !!');
				window.location='?page=con_type/con_type.php'
			</script>
		";
	}

	mysqli_close($db);
?>