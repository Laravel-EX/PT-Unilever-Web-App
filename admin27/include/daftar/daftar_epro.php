<?php
	include 'include/koneksi.php';
	$id = $_REQUEST['id'];
	// $po = $_REQUEST['po'];
	// $custom = $_REQUEST['custom'];
	// $prod = $_REQUEST['prod'];
	// $do = $_REQUEST['do'];
	// $conven = $_REQUEST['conven'];
	// $contype = $_REQUEST['contype'];
	// $trans = $_REQUEST['trans'];
	// $visel = $_REQUEST['visel'];
	// $clos = $_REQUEST['clos'];
	// $party = $_REQUEST['party'];
	// $dn = $_REQUEST['dn'];
	// $date = $_REQUEST['date'];
	// // $time = $_REQUEST['time'];
	// $conno = $_REQUEST['conno'];
	// $sample = $_REQUEST['sample'];
	// $tare = $_REQUEST['tare'];
	// $dout = $_REQUEST['dout'];
	// $tout = $_REQUEST['tout'];
	$status = $_REQUEST['status'];
	//$area = $_REQUEST['area'];

	if ($status!=="") {
		$sql = "UPDATE daftar SET status = '$status' 
								  WHERE id_daftar = '$id' ";
		$query = mysqli_query($db,$sql);

		for($i=1;$i<=$party; $i++)
		{
			$dn='dn'.$i;
			$date='date'.$i;
			$time='time'.$i;
			$conno='conno'.$i;
			$seal='seal'.$i;
			$tare='tare'.$i;
			$dout='dout'.$i;
			$tout='tout'.$i;

			$a1=$_REQUEST[$dn];
			$a2=$_REQUEST[$date];
			$a3=$_REQUEST[$time];
			$a4=$_REQUEST[$conno];
			$a5=$_REQUEST[$seal];
			$a6=$_REQUEST[$tare];
			$a7=$_REQUEST[$dout];
			$a8=$_REQUEST[$tout];

			$y="UPDATE transaksi SET id_daftar='$x',
									 dn_no='$a1',
									 terima_tgl='',
									 terima_time='',
									 selesai_tgl='',
									 selesai_time='',
									 date_in='$a2', 
									 time_in='$a3',
									 con_no='$a4',
									 seal_no='$a5',
									 tare_cont='$a6',
									 date_out='$a7',
									 time_out='$a8'
									 WHERE id_transaksi = '$id' ";
			$query = mysqli_query($db,$y);
		    
		}
		echo "
			<script>
				alert('Update Success !!');
				window.location='?page=daftar/daftar.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Update Failed !!');
				window.location='?page=daftar/daftar.php'
			</script>
		";
	}

	mysqli_close($db);
?>