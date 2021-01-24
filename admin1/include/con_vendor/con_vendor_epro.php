<?php
	include 'include/koneksi.php';
	$id = $_REQUEST['id'];
	$cvendor = $_REQUEST['cvendor'];
	if ($cvendor!=="") {
		$sql = "UPDATE con_vendor SET convendor = '$cvendor' WHERE id_convendor ='$id' ";
		$query = mysqli_query($db,$sql);
		echo "
			<script>
				alert('Update Success !!');
				window.location='?page=con_vendor/con_vendor.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Update Failed !!');
				window.location='?page=con_vendor/con_vendor.php'
			</script>
		";
	}

	mysqli_close($db);
?>