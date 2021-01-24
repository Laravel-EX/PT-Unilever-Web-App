<!DOCTYPE html>
<html>
	<head>
		<title>Laporan 2</title>
		<link rel="stylesheet" type="text/css" href="../../bootstrap/css/style_laporan.css">
	    <!-- Bootstrap 3.3.5 -->
	    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
	    <!-- Font Awesome -->
	    <link rel="stylesheet" href="../../plugins/font-awesome-4.4.0/css/font-awesome.min.css">
	</head>
	<body>

		<div class="box box-primary box-solid">
			 <div class="box-header with-border">
			    <h3 class="box-title">
			      <i class="fa fa-inbox"></i> Laporan 2
			    </h3>
			    <div class="box-tools pull-right">
			      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			    </div><!-- /.box-tools -->
			 </div><!-- /.box-header -->
			 <div class="box-body">
			    <div class="nav-tabs-custom">
			      <!-- Tabs within a box -->
			      <div class="tab-content no-padding">
			        <!-- Morris chart - Sales -->
			        <div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
			          <section class="content">
			           <div class="row">
			              <div class="col-md-12">
			                <div class="box-body" style="overflow-x: scroll;">
								<?php
									include 'include/koneksi.php';
									$id = $_REQUEST['p'];
									$rew = "SELECT * FROM transaksi RIGHT JOIN daftar ON transaksi.id_daftar = daftar.id_daftar LEFT JOIN product ON daftar.id_product=product.id_product WHERE daftar.id_daftar = '$id' ";

									$sql = mysqli_query($db,$rew);
									$ambil = mysqli_fetch_array($sql);
									$prod = $ambil['nama_product'];
									$visel = $ambil['vessel_name'];
									$con_no = $ambil['con_no'];
									$seal = $ambil['seal_no'];
									$tarecon = $ambil['tare_cont'];
                          			$nett = $ambil['nett_wight'];
								?>
								<div class="container">
									<div class="col-md-7">
										<div id="logo" style="margin-left: 350px; margin-bottom:50px; ">
											<img src="img/logo.png" width="100" alt="">
											<h4 class="judul">VGM CERTIFICATE</h4>
										</div>
									</div>
									<div class="col-md-4">
										<div class="top">
											<p class="top-head">
												<strong>PT.Unilever Oleachemical Indonesia</strong><br/>
												Komplek KEK Sei Mangkei,<br/>
												Kecamatan Bosar Maligas,<br/>
												Simalangun - Sumatra Utara
											</p>
											<p class="artik">
												T : +62 622 697 9000<br/>
												<strong>www.unilver.com</strong>
											</p>
										</div>
									</div>
								</div>
								<div class="container">
									<div class="bottom">
										<table class="table2">
											<tr>
												<td class="table-name1">
													1. Booking / BL No.
												</td>
												<td> :&nbsp;&nbsp; </td>
												<td>
													EXP00197
												</td>
											</tr>
											<tr>
												<td class="table-name1">
													2. Verified Gross Mass (VGM)
												</td>
												<td> :&nbsp;&nbsp; </td>
											</tr>
										</table>
										<table class="table2 table table-bordered">
											<tr align="center">
												<th colspan="2">Continer & Seal No.</th>
												<th>Nett Weight</th>
												<th>Tare Weight</th>
												<th>VGM (Nett +Tare)</th>
											</tr>
											<?php $rew1 = "SELECT * FROM transaksi RIGHT JOIN daftar ON transaksi.id_daftar = daftar.id_daftar LEFT JOIN product ON daftar.id_product=product.id_product WHERE daftar.id_daftar = '$id' ";

									$sql1 = mysqli_query($db,$rew1); 

									while($ambil1 = mysqli_fetch_array($sql1))
									{ 
										$con_no = $ambil1['con_no'];
										$seal = $ambil1['seal_no'];
										$tarecon = $ambil1['tare_cont'];
	                          			$nett1 = $ambil1['nett_wight'];
										?>
											<tr>
												<td><?php echo $con_no." ".$seal; ?></td>
												<td><?php echo $nett1; ?></td>
												<td><?php echo $tarecon; ?></td>
												<td>
													<?php 
														echo $hasil = $nett1 + $tarecon;
													?>									 	
												</td>
											</tr>
											<?php } ?>
										</table>
										<table class="table3">
											<tr>
												<td class="table-name1">
													3. Weight Scale / Unit Of Measurements (MT/KGS/LBS)
												</td>
												<td> :&nbsp;&nbsp; </td>
												<td>
													KGS
												</td>
											</tr>
											<tr>
												<td class="table-name1">
													4. WEIGHING METHODE
												</td>
												<td> :&nbsp;&nbsp; </td>
												<td>
													Method (M2)
												</td>
											</tr>
											<tr>
												<td class="table-name1">
													5. Authorized Person (PIC)
												</td>
												<td> :&nbsp;&nbsp; </td>
												<td>
													MARISI PANGARIBUAN<br/>
													FIFIT INDARTO
												</td>
											</tr>
											<tr>
												<td class="table-name1">
													6. Contact No
												</td>
												<td> :&nbsp;&nbsp; </td>
												<td>
													0622-6979000
												</td>
											</tr>
										</table>
										<img src="img/bukmar.png" style="margin-top: 50px; margin-bottom:-100px; ">
										<p style="border-top: 1px solid black; width: 300px; margin-top: 120px; ">Stamp and Signature</p>
									</div>
								</div>
			                </div><!-- /.box-body -->
			              </div>
			           </div>
			          </section>
			        </div>
			        <div class="chart tab-pane" id="sales-chart" style="position: relative;">

			        </div>
			      </div>
			    </div><!-- /.nav-tabs-custom -->
			 </div><!-- /.box-body -->
		</div><!-- /.box -->
		<script type="text/javascript">
		  $(document).ready(function(){
		  });
		</script>
	</body>
</html>