<?php

session_start();
$status = $_SESSION['status_user'];
$user = $_SESSION['username'];
date_default_timezone_set('Asia/Jakarta');
 include 'include/koneksi.php';
  $e=$_REQUEST['p'];
$i=$_REQUEST['r'];
$tgl=date("Y-m-d");
$st=$_REQUEST['st'];
$jam=date("H:i:s");


if($st=="ok")
{
	$sql="update transaksi set sample_tgl='$tgl', sample_time='$jam', userquality='$user', st='ok' where id_transaksi='$e'";
$query = mysqli_query($db,$sql);
$ket="quality approve oleh ".$user;
$uu="insert into historydata (id_transaksi,keterangan) values ('$e','$ket')";
$query1 = mysqli_query($db,$uu);
echo "
			<script>
				
				window.location='?page=quality/lihat.php&p=$i'
			</script>
		";
}
else
{
	$sql="update transaksi set sample_tgl='$tgl', sample_time='$jam', userquality='$user' , st='rejected' where id_transaksi='$e'";
$query = mysqli_query($db,$sql);

$ket="quality rejected oleh ".$user;
$uu="insert into historydata (id_transaksi,keterangan) values ('$e','$ket')";
$query1 = mysqli_query($db,$uu);

echo "
			<script>
				
				window.location='?page=quality/lihat.php&p=$i'
			</script>
		";
}

?>