<?php
	include 'include/koneksi.php';
	$cvendor = $_REQUEST['cvendor'];
	if ($cvendor!=="") {
		$sql = "INSERT INTO con_vendor (convendor) VALUES('$cvendor') ";
		$query = mysqli_query($db,$sql);
		echo "
			<script>
				alert('Insert Success !!');
				window.location='?page=con_vendor/con_vendor.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Insert Failed !!');
				window.location='?page=con_vendor/con_vendor.php'
			</script>
		";
	}

	mysqli_close($db);
?>