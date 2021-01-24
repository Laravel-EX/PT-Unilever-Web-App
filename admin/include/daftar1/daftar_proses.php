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
	$newdate1 = date('Y-m-d', strtotime($clos));
	$party = $_REQUEST['party'];
	$status = $_REQUEST['status'];
	$area = $_REQUEST['area'];
	$sample = $_REQUEST['sample'];
	
	$dn = $_REQUEST['dn'];
	//$date = $_REQUEST['date'];
	//$time = $_REQUEST['time'];
	$conno = $_REQUEST['conno'];
	$tare = $_REQUEST['tare'];
	$seal = $_REQUEST['seal'];
	$dout = $_REQUEST['dout'];
	$tout = $_REQUEST['tout'];
	$nett = $_REQUEST['nett'];



	if ($po!=="") {
		$sql = "INSERT INTO daftar (po_no, id_customer, id_product, do_no1, id_convendor, id_container, transporter, vessel_name, vessel_closing, party, status, area, sample) VALUES ('$po', '$custom', '$prod', '$do', '$conven', '$contype', '$trans', '$visel', '$clos', '$party', '$status', '$area', '$sample')";
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
		$tgl = date('Y-m-d');

		$lokasi_penyimpanan="images/$nama_file";
		$proses_upload=move_uploaded_file($lokasi_file, $lokasi_penyimpanan);

		$y="INSERT INTO transaksi (id_daftar,dn_no,terima_tgl,terima_time,selesai_tgl, selesai_time, date_in, time_in, con_no, seal_no, tare_cont, date_out, time_out,nett_wight,gambar,sample_tgl,sample_time) VALUES 
		('$x','$a1','0000-00-00','','0000-00-00','', '$date', '$time', '$a4', '$a5', '$a6', '$a7', '$a8','$a9','$nama_file','0000-00-00','')";
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