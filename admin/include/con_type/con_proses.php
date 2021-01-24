<?php
	include 'include/koneksi.php';
	$ctype = $_REQUEST['ctype'];
	if ($ctype!=="") {
		$sql = "INSERT INTO con_type (container) VALUES('$ctype') ";
		$query = mysqli_query($db,$sql);
		echo "
			<script>
				alert('Insert Success !!');
				window.location='?page=con_type/con_type.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Insert Failed !!');
				window.location='?page=con_type/con_type.php'
			</script>
		";
	}

	mysqli_close($db);
?>