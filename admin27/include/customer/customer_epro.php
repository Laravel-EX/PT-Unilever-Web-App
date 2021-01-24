<?php
	include 'include/koneksi.php';
	$id = $_REQUEST['id'];
	$custom = $_REQUEST['custom'];
	if ($custom!=="") {
		$sql = "UPDATE customer SET nama_customer = '$custom' WHERE id_customer ='$id' ";
		$query = mysqli_query($db,$sql);
		echo "
			<script>
				alert('Update Success !!');
				window.location='?page=customer/customer.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Update Failed !!');
				window.location='?page=customer/customer.php'
			</script>
		";
	}

	mysqli_close($db);
?>