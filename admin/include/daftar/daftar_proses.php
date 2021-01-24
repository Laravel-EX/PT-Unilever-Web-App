<?php
session_start();
$status = $_SESSION['status_user'];
$user = $_SESSION['username'];
	include 'include/koneksi.php';

	$po = $_REQUEST['po'];
	$custom = $_REQUEST['custom'];
	$prod = $_REQUEST['prod'];
	$do = $_REQUEST['do'];
	$id = $_REQUEST['id'];
	$conven = $_REQUEST['conven'];
	$contype = $_REQUEST['contype'];
	$trans = $_REQUEST['trans'];
	$visel = $_REQUEST['visel'];
	$clos = $_REQUEST['clos'];
	$newdate1 = date('Y-m-d', strtotime($clos));
	$party = $_REQUEST['party'];
	$status = $_REQUEST['status'];
	$area = $_REQUEST['area'];
	$id_user = $_REQUEST['id_user'];
	$sample = $_REQUEST['sample'];
	
	$dn = $_REQUEST['dn'];
	//$date = $_REQUEST['date'];
	//$time = $_REQUEST['time'];
	// $conno = $_REQUEST['conno'];
	// $tare = $_REQUEST['tare'];
	// $seal = $_REQUEST['seal'];
	// $dout = $_REQUEST['dout'];
	// $tout = $_REQUEST['tout'];
	// $nett = $_REQUEST['nett'];



	if ($po!=="") {
		$sql = "INSERT INTO daftar (po_no, id_customer, id_product, do_no1, id_convendor, id_container, transporter, vessel_name, vessel_closing, party, area) VALUES ('$po', '$custom', '$prod', '$do', '$conven', '$contype', '$trans', '$visel', '$clos', '$party', '$area','$id')";
		$query = mysqli_query($db,$sql);
		$x=mysqli_insert_id($db);

		if($status=="ARRIVE")
		{
			$date=date('Y-m-d');
			$time=date('H:i:s');
		}
		else
		{
			$date="";
			$time="";
		}
		

	 	for($i=1;$i<=$party; $i++)
	 	{
	 	$dn='dn'.$i;
	 //	$date='date'.$i;
	 //	$time='time'.$i;
	 	$conno='conno'.$i;
	 	$seal='seal'.$i;
	 	$tare='tare'.$i;
	 	$dout='dout'.$i;
	 	$tout='tout'.$i;
	 	$nett='nett'.$i;
	 	$status = 'status'.$i;
		$sample = 'sample'.$i;

	 	//$gambar='gambar'.$i;

		
	 	$lokasi_file = $_FILES[gambar]['tmp_name'];
		$nama_file = $_FILES[gambar]['name'];
		$tipe_file = $_FILES[gambar]['type'];
		$ukuran_file = $_FILES[gambar]['size'];

		$a1=$_REQUEST[$dn];
		//$a2=$_REQUEST[$date];
		
			if($a2!="")
            {
              $uu="0000-00-00";
             }
            else
            {
               $uu=$a2;
              }
		//$a3=$_REQUEST[$time];
		$a4=$_REQUEST[$conno];
		$a5=$_REQUEST[$seal];
		$a6=$_REQUEST[$tare];
		$a7=$_REQUEST[$dout];
		$a8=$_REQUEST[$tout];
		$a9=$_REQUEST[$nett];
		$a10=$_REQUEST[$sample];
		$a11=$_REQUEST[$status];
		$tgl = date('Y-m-d');

		$lokasi_penyimpanan="images/$nama_file";
		$proses_upload=move_uploaded_file($lokasi_file, $lokasi_penyimpanan);


		if($a10=="ARRIVE")
		{
		$dd=date("Y-m-d");
		$tt=date("H:i:s");

		$y="INSERT INTO transaksi (id_daftar,dn_no,terima_tgl,terima_time,selesai_tgl, selesai_time, date_in, time_in, con_no, seal_no, tare_cont, date_out, time_out,nett_wight,gambar,sample_tgl,sample_time,sample,status) VALUES 
		('$x','$a1','0000-00-00','','0000-00-00','', '$dd', '$tt', '$a4', '$a5', '$a6', '$a7', '$a8','$a9','$nama_file','0000-00-00','','$a10','$a11')";
		$query = mysqli_query($db,$y);
		$e=mysqli_insert_id();

$ket="input oleh ".$user;
$uu="insert into historydata (id_transaksi,keterangan) values ('$e','$ket')";
$query1 = mysqli_query($db,$uu);
		}
		else
		{
			
		$y="INSERT INTO transaksi (id_daftar,dn_no,terima_tgl,terima_time,selesai_tgl, selesai_time, date_in, time_in, con_no, seal_no, tare_cont, date_out, time_out,nett_wight,gambar,sample_tgl,sample_time,sample,status) VALUES 
		('$x','$a1','0000-00-00','','0000-00-00','', '0000-00-00', '0000-00-00', '$a4', '$a5', '$a6', '$a7', '$a8','$a9','$nama_file','0000-00-00','','$a10','$a11')";
		$query = mysqli_query($db,$y);
		$e=mysqli_insert_id();

$ket="input oleh ".$user;
$uu="insert into historydata (id_transaksi,keterangan) values ('$e','$ket')";
$query1 = mysqli_query($db,$uu);
		}
	    
	}
		// echo "
		// 		<script>
		// 			alert('Insert Success !!');
		// 			window.location='?page=daftar/daftar.php'
		// 		</script>
		// 	";
	} else {
		// echo "
		// 	<script>
		// 		alert('Insert Failed !!');
		// 		window.location='?page=daftar/daftar.php'
		// 	</script>
		// ";
	}

	mysqli_close($db);
?>