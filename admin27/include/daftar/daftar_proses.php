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
	$newdate1 = date('d-m-Y', strtotime($clos));
	$party = $_REQUEST['party'];
	$dn = $_REQUEST['dn'];
	$date = $_REQUEST['date'];
	$time = $_REQUEST['time'];
	$conno = $_REQUEST['conno'];
	$sample = $_REQUEST['sample'];
	$tare = $_REQUEST['tare'];
	$seal = $_REQUEST['seal'];
	$dout = $_REQUEST['dout'];
	$tout = $_REQUEST['tout'];
	$status = $_REQUEST['status'];
	$area = $_REQUEST['area'];
	$nett = $_REQUEST['nett'];

	if ($po!=="") {
		$sql = "INSERT INTO daftar (po_no, id_customer, id_product, do_no1, id_convendor, id_container, transporter, vessel_name, vessel_closing, party,sample , status, area,nett_wight) VALUES ('$po', '$custom', '$prod', '$do', '$conven', '$contype', '$trans', '$visel', '$newdate1', '$party', '$sample', '$status', '$area','$nett')";
		$query = mysqli_query($db,$sql);
		$x=mysqli_insert_id($db);

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
	 	$newdate2 = date('d-m-Y', strtotime($a2));

	 	$newdate3 = date('d-m-Y', strtotime($a7));
	 	$tgl = date('d-m-Y');

		$y="INSERT INTO transaksi (id_daftar,dn_no,terima_tgl,terima_time,selesai_tgl, selesai_time, date_in, time_in, con_no, seal_no, tare_cont, date_out, time_out) VALUES 
		('$x','$a1','$tgl','','','', '$newdate2', '$a3', '$a4', '$a5', '$a6', '$newdate3', '$a8')";
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