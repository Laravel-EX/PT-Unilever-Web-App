<?php
	include 'include/koneksi.php';
	$id = $_REQUEST['id'];
	$nampro = $_REQUEST['nampro'];
	if ($nampro!=="") {
		$sql = "UPDATE product SET nama_product = '$nampro' WHERE id_product ='$id' ";
		$query = mysqli_query($db,$sql);
		echo "
			<script>
				alert('Update Success !!');
				window.location='?page=produk/produk.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Update Failed !!');
				window.location='?page=produk/produk.php'
			</script>
		";
	}

	mysqli_close($db);
?>