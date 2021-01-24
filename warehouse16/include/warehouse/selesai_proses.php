<?php
date_default_timezone_set('Asia/Jakarta');
 include 'include/koneksi.php';
  $e=$_REQUEST['p'];
$i=$_REQUEST['r'];
$tgl=date("Y-m-d");
$jam=date("H:i:s");


$sql="update transaksi set selesai_tgl='$tgl', selesai_time='$jam' where id_transaksi='$e'";
$query = mysqli_query($db,$sql);

echo "
			<script>
				
				window.location='?page=warehouse/lihat.php&p=$i&r=$e'
			</script>
		";
?>