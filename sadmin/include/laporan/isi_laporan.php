<!DOCTYPE html>
<html>
	<head>
		<title>Isi Laporan</title>
	</head>
	<body>
	<?php 
		//error_reporting(0);
		include '../koneksi.php';
		$start=date('Y-m-d',strtotime($_REQUEST['start']));
		$end=date('Y-m-d',strtotime($_REQUEST['end']));
	?>
		<h2 align="center">Hasil Laporan</h2>
		<table border="1" width="2000">
			<thead>
				<tr>
					<th rowspan="2">No</th>
					<th rowspan="2">PO Number</th>
					<th rowspan="2">Cont.</th>
					<th rowspan="2">D/N#</th>
					<th rowspan="2">Customer</th>
					<th rowspan="2">Product Code</th>
					<th rowspan="2">PRODUCT</th>
					<th colspan="2" bgcolor="yellow">TareIsotank</th>
					<th bgcolor="yellow" rowspan="2">Container</th>
					<th bgcolor="green" rowspan="2">Seal</th>
					<th rowspan="2">QYT</th>
					<th colspan="2">IN</th>
					<th colspan="2">OUT</th>
					<th rowspan="2">Transporter</th>
					<th rowspan="2">CLOSING</th>
					<th rowspan="2">Marking</th>
					<th rowspan="2">Kapal</th>
					<th rowspan="2">REMARKS</th>
					<th rowspan="2" bgcolor="yellow">Miht Rema</th>
					<th rowspan="2">Status</th>
				</tr>
				<tr>
					<th bgcolor="pink">Certificate</th>
					<th bgcolor="pink">Actual</th>
					<th>Date</th>
					<th>Time</th>
					<th>Date</th>
					<th>Time</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no=1;
					$sql = "SELECT * FROM daftar INNER JOIN transaksi ON daftar.id_daftar = transaksi.id_daftar INNER JOIN con_vendor ON daftar.id_convendor=con_vendor.id_convendor INNER JOIN con_type ON daftar.id_container=con_type.id_container INNER JOIN customer ON daftar.id_customer=customer.id_customer INNER JOIN product ON daftar.id_product=product.id_product WHERE date_in >='$start' AND date_in <='$end' order by daftar.id_daftar DESC";
					$query = mysqli_query($db,$sql);
					while ($ambil = mysqli_fetch_array($query)) {
                      $id1 = $ambil['id_daftar'];
                      $id2 = $ambil['id_product'];
                      $po = $ambil['po_no'];
                      $custom = $ambil['nama_customer'];
                      $prod = $ambil['nama_product'];
                      $do = $ambil['do_no1'];
                      $party = $ambil['party'];
                      $conven = $ambil['convendor'];
                      $contype = $ambil['container'];
                      $trans = $ambil['transporter'];
                      $visel = $ambil['vessel_name'];
                      $clos = $ambil['vessel_closing'];
                      $seal = $ambil['seal_no'];
                      $datein = $ambil['date_in'];
                      $timein = $ambil['time_in'];
                      $dateout = $ambil['date_out'];
                      $timeout = $ambil['time_out'];
                      $status = $ambil['status'];
                      $conno = $ambil['con_no'];
                      $newdate1 = date('d-m-Y', strtotime($clos));
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $po; ?></td>
					<td><?php echo $conno; ?></td>
					<td><?php echo $do; ?></td>
					<td><?php echo $custom; ?></td>
					<td><?php echo $id2; ?></td>
					<td><?php echo $prod; ?></td>
					<td>TareIsotank</td>
					<td>Container</td>
					<td><?php echo $contype; ?></td>
					<td><?php echo $seal; ?></td>
					<td>IN</td>
					<td bgcolor="orange"><?php echo $datein; ?></td>
					<td><?php echo $timein; ?></td>
					<td><?php echo $dateout; ?></td>
					<td><?php echo $timeout; ?></td>
					<td><?php echo $trans; ?></td>
					<td><?php echo $clos; ?></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><?php echo $status; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</body>
</html>