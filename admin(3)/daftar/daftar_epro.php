<?php
	include 'include/koneksi.php';

	$id = $_REQUEST['id'];
	foreach ($_POST['ok'] as $unik => $hasil) {
		$hasil;
	}


	$visel = $_REQUEST['visel'];
	$clos = $_REQUEST['clos'];
	$party = $_REQUEST['party'];

	if ($visel!=="") {
		$sql = "UPDATE daftar SET vessel_name = '$visel',
								  vessel_closing = '$clos',
								  party = '$party'
								  WHERE id_daftar = '$id' ";
		$query = mysqli_query($db,$sql);
		$x = mysqli_insert_id($db);

		for($i=1;$i<=$party; $i++) {
			$dn = 'dn'.$i;
			$status = 'status'.$i;
			$a1 = $_REQUEST[$dn];
			$a2 = $_REQUEST[$status];

			if ($a2 == 'ARRIVE') {
				$date1 = date('Y-m-d');
				$time2 = date('H:i:s');

				$y = "UPDATE transaksi SET dn_no = '$a1',
										   date_in = '$date1',
										   time_in = '$time2',
										   status = '$a2'
										   WHERE id_daftar='$id' ";
				$query = mysqli_query($db,$y);
			} else {
				$y = "UPDATE transaksi SET dn_no = '$a1',
										   date_in = '0000-00-00',
										   time_in = '0000-00-00',
										   status = '$a2'
										   WHERE id_daftar='$id' ";
				$query = mysqli_query($db,$y);
			}

			if ($a2 == 'MARKING') {
				$date3 = date('Y-m-d');
				$time4 = date('H:i:s');

				$y = "UPDATE transaksi SET dn_no = '$a1',
										   marking_in = '$date3',
										   marking_in = '$time4',
										   status = '$a2'
										   WHERE id_daftar='$id' ";
				$query = mysqli_query($db,$y);
			} else {
				$y = "UPDATE transaksi SET dn_no = '$a1',
										   marking_in = '0000-00-00',
										   marking_out = '0000-00-00',
										   status = '$a2'
										   WHERE id_daftar='$id' ";
				$query = mysqli_query($db,$y);
			}

			if ($a2 == 'DEPART') {
				$date = date('Y-m-d');
				$time = date('H:i:s');

				$y = "UPDATE transaksi SET dn_no = '$a1',
										   date_out = '$date5',
										   time_out = '$time6',
										   status = '$a2'
										   WHERE id_daftar='$id' ";
				$query = mysqli_query($db,$y);
			} else {
				$y = "UPDATE transaksi SET dn_no = '$a1',
										   date_out = '0000-00-00',
										   time_out = '0000-00-00',
										   status = '$a2'
										   WHERE id_daftar='$id' ";
				$query = mysqli_query($db,$y);
			}
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
