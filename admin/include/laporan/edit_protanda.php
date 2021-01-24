<?php 
	include 'include/koneksi.php';

	$id = $_REQUEST['id1'];
	$id2 = $_REQUEST['id12'];
	$nama = $_REQUEST['nama'];
	
 	$lokasi_file = $_FILES['upload']['tmp_name'];
	$nama_file = $_FILES['upload']['name'];
	$tipe_file = $_FILES['upload']['type'];
	$ukuran_file = $_FILES['upload']['size'];
	$lokasi_penyimpanan="img/$nama_file";

	if ($nama!=="") {
		$proses_upload=move_uploaded_file($lokasi_file, $lokasi_penyimpanan);
		$sql = "UPDATE setting SET id_daftar='$id', 
							   penanda_tangan='$nama', 
							   img='$nama_file'
							   WHERE id_setting='$id2' ";
		$query = mysqli_query($db, $sql);
		echo "
			<script>
				alert('Update Success !!');
				window.location='?page=daftar/transaksi1.php&trans=$id'
			</script>
			";
	} else {
		echo "
			<script>
				alert('Update Filed !!');
				window.location='?page=daftar/transaksi1.php&trans=$id'
			</script>
		";
	}
?>