<?php
	include 'include/koneksi.php';
	$custom = $_REQUEST['custom'];
	if ($custom!=="") {
		$sql = "INSERT INTO customer (nama_customer) VALUES('$custom') ";
		$query = mysqli_query($db,$sql);
		echo "
			<script>
				alert('Insert Success !!');
				window.location='?page=customer/customer.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Insert Failed !!');
				window.location='?page=customer/customer.php'
			</script>
		";
	}

	mysqli_close($db);
?>