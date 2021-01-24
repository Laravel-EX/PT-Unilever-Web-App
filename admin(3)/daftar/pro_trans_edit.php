<?php
	include 'include/koneksi.php';

   $id = $_REQUEST['id'];
   $dn = $_REQUEST['dn'];
   $status = $_REQUEST['status'];

	if ($dn!=="") {

			if ($a2 == 'ARRIVE') {
				$date1 = date('Y-m-d');
				$time2 = date('H:i:s');

				$y = "UPDATE transaksi SET dn_no = '$dn',
										   date_in = '$date1',
										   time_in = '$time2',
										   status = '$status'
										   WHERE id_transaksi='$id' ";
				$query = mysqli_query($db,$y);
			} else {
				$y = "UPDATE transaksi SET dn_no = '$dn',
										   date_in = '0000-00-00',
										   time_in = '0000-00-00',
										   status = '$status
										   WHERE id_transaksi='$id' ";
				$query = mysqli_query($db,$y);
			}

			if ($a2 == 'MARKING') {
				$date3 = date('Y-m-d');
				$time4 = date('H:i:s');

				$y = "UPDATE transaksi SET dn_no = '$dn',
										   marking_in = '$date3',
										   marking_in = '$time4',
										   status = '$status'
										   WHERE id_transaksi='$id' ";
				$query = mysqli_query($db,$y);
			} else {
				$y = "UPDATE transaksi SET dn_no = '$dn',
										   marking_in = '0000-00-00',
										   marking_out = '0000-00-00',
										   status = '$status'
										   WHERE id_transaksi='$id' ";
				$query = mysqli_query($db,$y);
			}

			if ($a2 == 'DEPART') {
				$date = date('Y-m-d');
				$time = date('H:i:s');

				$y = "UPDATE transaksi SET dn_no = '$dn',
										   date_out = '$date5',
										   time_out = '$time6',
										   status = '$status'
										   WHERE id_transaksi='$id' ";
				$query = mysqli_query($db,$y);
			} else {
				$y = "UPDATE transaksi SET dn_no = '$dn',
										   date_out = '0000-00-00',
										   time_out = '0000-00-00',
										   status = '$status'
										   WHERE id_transaksi='$id' ";
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
				alert('Update Gagal !!');
				window.location='?page=daftar/daftar.php'
			</script>
		";
	}
	mysqli_close($db);
?>
