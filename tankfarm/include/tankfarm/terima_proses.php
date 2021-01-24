<?php
	
session_start();
date_default_timezone_set('Asia/Jakarta');
include 'include/koneksi.php';
$status = $_SESSION['status_user'];
$user = $_SESSION['username'];

	$e=$_REQUEST['p'];
	  
	$i=$_REQUEST['r'];
	$tgl=date("Y-m-d");
	$jam=date("H:i:s");


	$sql="update transaksi set terima_tgl='$tgl', terima_time='$jam', userinput='$user' where id_transaksi='$e'";

	$query = mysqli_query($db,$sql);

$ket="tankfarm approve oleh ".$user;
$uu="insert into historydata (id_transaksi,keterangan) values ('$e','$ket')";
$query2 = mysqli_query($db,$uu);



	$sql1="update daftar set status='LOADING' where id_daftar='$i'";

	$query1 = mysqli_query($db,$sql1);

	echo "
		<script>
			
			window.location='?page=tankfarm/lihat.php&p=$i&r=$e'
		</script>
	";
?>