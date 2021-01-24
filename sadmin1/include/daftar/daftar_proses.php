<?php
	include 'include/koneksi.php';
	$po = $_REQUEST['po'];
	$custom = $_REQUEST['custom'];
	$prod = $_REQUEST['prod'];
	$do = $_REQUEST['do'];
	$conven = $_REQUEST['conven'];
	$contype = $_REQUEST['contype'];
	$trans = $_REQUEST['trans'];
	$visel = $_REQUEST['visel'];
	$clos = $_REQUEST['clos'];
	$party = $_REQUEST['party'];
	$dn = $_REQUEST['dn'];
	$date = $_REQUEST['date'];
	//$time = $_REQUEST['time'];
	$conno = $_REQUEST['conno'];
	$sample = $_REQUEST['sample'];
	$tare = $_REQUEST['tare'];
	$dout = $_REQUEST['dout'];
	$tout = $_REQUEST['tout'];
	$status = $_REQUEST['status'];
	$area = $_REQUEST['area'];
	if ($po!=="") {
		$sql = "INSERT INTO daftar (po_no, id_customer, id_product, dn_no1, id_convendor, id_container, transporter, vessel_name, vessel_closing, party, dn_no2, date_in, time_in, con_no, seal_no, tare_cont, date_out, time_out, status, area) VALUES ('$po', '$custom', '$prod', '$do', '$conven', '$contype', '$trans', '$visel', '$clos', '$party', '$dn1$dn2$dn3$dn4$dn5', '$date', '$time', '$conno', '$sample', '$tare', '$dout', '$tout', '$status', '$area')";
		$query = mysqli_query($db,$sql);
		$x=mysqli_insert_id($db);

		for($i=1;$i<=$party; $i++)
	{
		$dn='dn'.$i;
		$a1=$_REQUEST[$dn];
		$y="INSERT INTO transaksi (id_daftar,dn_no,terima_tgl,terima_time,selesai_tgl, selesai_time) VALUES 
		('$x','$a1','','','','')";
		$query = mysqli_query($db,$y);
	    
	}
		echo "
				<script>
					alert('Insert Success !!');
					window.location='?page=daftar/daftar.php'
				</script>
			";
	} else {
		echo "
			<script>
				alert('Insert Failed !!');
				window.location='?page=daftar/daftar.php'
			</script>
		";
	}

	mysqli_close($db);
?>