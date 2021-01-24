<?php
	include 'include/koneksi.php';
	$del = $_REQUEST['data'];
	$hapus = "DELETE FROM customer WHERE id_customer='$del' ";
	$query = mysqli_query($db,$hapus);
	if ($hapus == true) {
		echo "
			<script>
				alert('Delete Success !!');
				window.location='?page=customer/customer.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Delete Success !!');
				window.location='?page=customer/customer.php'
			</script>
		";
	}
	mysqli_close($db);
?>