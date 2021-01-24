<?php
	include 'include/koneksi.php';
	$nampro = $_REQUEST['nampro'];
	if ($nampro!=="") {
		$sql = "INSERT INTO product (nama_product) VALUES('$nampro') ";
		$query = mysqli_query($db,$sql);
		echo "
			<script>
				alert('Insert Success !!');
				window.location='?page=produk/produk.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Insert Failed !!');
				window.location='?page=produk/produk.php'
			</script>
		";
	}

	mysqli_close($db);
?>