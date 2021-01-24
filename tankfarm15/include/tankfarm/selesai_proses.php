<?php
	date_default_timezone_set('Asia/Jakarta');
	include 'include/koneksi.php';
	$e=$_REQUEST['p'];
	$i=$_REQUEST['r'];
	$tgl=date("Y-m-d");
	$jam=date("H:i:s");

	$sql1="select * from transaksi where id_daftar='$i' and selesai_tgl='0000-00-00' ";
	$query1 = mysqli_query($db,$sql1);
	$row=mysqli_num_rows($query1);
	//echo $row;

	if($row<=1)
	{
		$sql="update transaksi set selesai_tgl='$tgl', selesai_time='$jam' where id_transaksi='$e'";
		$query = mysqli_query($db,$sql);
		$sql2="update daftar set status='DONE LOADING' where id_daftar='$i'";
		$query2 = mysqli_query($db,$sql2);


	}
	else
	{
		$sql="update transaksi set selesai_tgl='$tgl', selesai_time='$jam' where id_transaksi='$e'";
		$query = mysqli_query($db,$sql);
		
	}

	echo "
		<script>
			
			window.location='?page=tankfarm/lihat.php&p=$i&r=$e'
		</script>
	";
?>