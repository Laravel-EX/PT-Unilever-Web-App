<?php
	session_start();
	$status = $_SESSION['status_user'];
	$user = $_SESSION['username'];
	include 'include/koneksi.php';

	$id = $_REQUEST['id'];
	$dn = $_REQUEST['dn'];
	$desc = $_REQUEST['desc'];
	$son = $_REQUEST['son'];
	$pod = $_REQUEST['pod'];
    $status = $_REQUEST['status'];

	if ($dn!=="") {

		if ($status == 'ARRIVE') {
			$date1 = date('Y-m-d');
			$time2 = date('H:i:s');

			$y1 = "UPDATE transaksi SET dn_no = '$dn',
									   date_in = '$date1',
									   time_in = '$time2',
									   status = '$status',
									   desk = '$desc',
									   son = '$son',
									   pod = '$pod'
									   WHERE id_transaksi='$id' ";
			$query1 = mysqli_query($db,$y1);

			$ket="input ARRIVE oleh ".$user;
			$uu="insert into historydata (id_transaksi,keterangan) values ('$id','$ket')";
			$query1 = mysqli_query($db,$uu);
		} else {
			$y1 = "UPDATE transaksi SET dn_no = '$dn',
									   date_in = '0000-00-00',
									   time_in = '0000-00-00',
									   status = '$status,
									   desk = '$desc',
									   son = '$son',
									   pod = '$pod'
									   WHERE id_transaksi='$id' ";
			$query1 = mysqli_query($db,$y1);

			$ket="input oleh ".$user;
			$uu="insert into historydata (id_transaksi,keterangan) values ('$id','$ket')";
			$query1 = mysqli_query($db,$uu);
		}

		if ($status == 'MARKING') {
			$date3 = date('Y-m-d');
			$time4 = date('H:i:s');

			$y2 = "UPDATE transaksi SET dn_no = '$dn',
									   marking_in = '$date3',
									   marking_in = '$time4',
									   status = '$status',
									   desk = '$desc',
									   son = '$son',
									   pod = '$pod'
									   WHERE id_transaksi='$id' ";
			$query2 = mysqli_query($db,$y2);

			$ket="input MARKING oleh ".$user;
			$uu="insert into historydata (id_transaksi,keterangan) values ('$id','$ket')";
			$query1 = mysqli_query($db,$uu);
		} else {
			$y2 = "UPDATE transaksi SET dn_no = '$dn',
									   marking_in = '0000-00-00',
									   marking_out = '0000-00-00',
									   status = '$status',
									   desk = '$desc',
									   son = '$son',
									   pod = '$pod'
									   WHERE id_transaksi='$id' ";
			$query2 = mysqli_query($db,$y2);

			$ket="input oleh ".$user;
			$uu="insert into historydata (id_transaksi,keterangan) values ('$id','$ket')";
			$query1 = mysqli_query($db,$uu);
		}

		if ($status == 'DEPART') {
			$date5 = date('Y-m-d');
			$time6 = date('H:i:s');

			$y3 = "UPDATE transaksi SET dn_no = '$dn',
									   date_out = '$date5',
									   time_out = '$time6',
									   status = '$status',
									   desk = '$desc',
									   son = '$son',
									   pod = '$pod'
									   WHERE id_transaksi='$id' ";
			$query3 = mysqli_query($db,$y3);

			$ket="input DEPART oleh ".$user;
			$uu="insert into historydata (id_transaksi,keterangan) values ('$id','$ket')";
			$query1 = mysqli_query($db,$uu);
		} else {
			$y3 = "UPDATE transaksi SET dn_no = '$dn',
									   date_out = '0000-00-00',
									   time_out = '0000-00-00',
									   status = '$status',
									   desk = '$desc',
									   son = '$son',
									   pod = '$pod'
									   WHERE id_transaksi='$id' ";
			$query3 = mysqli_query($db,$y3);

			$ket="input oleh ".$user;
			$uu="insert into historydata (id_transaksi,keterangan) values ('$id','$ket')";
			$query1 = mysqli_query($db,$uu);
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
				alert('Update Gagal !!');
				window.location='?page=daftar/daftar.php'
			</script>
		";
	}
	mysqli_close($db);
?>
