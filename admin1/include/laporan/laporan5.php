<!DOCTYPE html>
<html>
	<head>
		<title>Laporan 4</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/style_laporan.css">
	    <!-- Bootstrap 3.3.5 -->
	    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	    <!-- Font Awesome -->
	    <link rel="stylesheet" href="../../plugins/font-awesome-4.4.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="box box-primary box-solid">
			 <div class="box-header with-border">
			    <h3 class="box-title">
			      <i class="fa fa-inbox"></i> DANGEROUS GOODS DECLARE
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
							<button type="button" id="modalku" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Isi Data Laporan</button>
			                <div class="box-body" style="overflow-x: scroll;">
								<?php
									include 'include/koneksi.php';
									$id = $_REQUEST['p'];
									$req = "SELECT * FROM transaksi INNER JOIN daftar ON transaksi.id_daftar = daftar.id_daftar INNER JOIN con_vendor ON daftar.id_convendor=con_vendor.id_convendor INNER JOIN con_type ON daftar.id_container=con_type.id_container INNER JOIN laporan5 ON transaksi.id_daftar=laporan5.id_daftar WHERE laporan5.id_daftar='$id' ";

									$sql = mysqli_query($db,$req);
									$ambil = mysqli_fetch_array($sql);
									$con_no = $ambil['con_no'];
									$po = $ambil['po_no'];
									$conven = $ambil['convendor'];
									$contype = $ambil['container'];
									$visel = $ambil['vessel_name'];
									$clos = $ambil['vessel_closing'];
									$tare = $ambil['tare_cont'];

									$page = $ambil['page'];
									$shiper = $ambil['shiper'];
									$carier = $ambil['carier'];
									$relay1 = $ambil['relay1'];
									$voyage1 = $ambil['voyage1'];
									$relay2 = $ambil['relay2'];
									$voyage2 = $ambil['voyage2'];
									$liquid = $ambil['liquid'];
									$imo = $ambil['imo'];
									$sub = $ambil['sub'];
									$un = $ambil['un'];
									$pg = $ambil['pg'];
									$fp = $ambil['fp'];
									$mpy = $ambil['mpy'];
									$netwt = $ambil['netwt'];
									$info = $ambil['handling'];
									$state = $ambil['state'];
								?>
								<div id="wrapper">
									<form id="myform">
									<div id="logo" style="margin-left: 450px; margin-bottom:50px; ">
										<img src="img/logo.png" width="100" alt="">
									</div>
									<h3 align="center">
										DANGEROUS GOODS DECLARE AND CONTAINER PACKING CERTIFICATE
									</h3>
									<p>
										This form meets the requirements of solas 74,Chapter VII,Regulation 4; Marpol 73/78 Annex III,Regulation 4 and Chapter 5.4<br/>
										(Documentation), Vol.1 of IMDG Code.
									</p>
									<div id="table">
										<table border="1" width="500" class="table">
											<tr>
												<td rowspan="2">
													1.Shipper (Name and Address)<br/>
													PT.Unilever Oleochemical Indonesia<br/>
													Huta VI Sei-Maingkei,Kec. Bosar Maligas<br/>
													Kab. Simalungun, North Sumatera-Indonesia
												</td>
												<td>
													1.Page 1 Of 1Pages : <?php echo $page; ?>
												</td>
											</tr>
											<tr>
												<td>
													3.B/L Number :
												</td>
											</tr>
											<tr>
												<td rowspan="2">
													4.Consignee (Name and Address)<br/>
													<table>
														<tr>
															<td></td>
														</tr>
													</table>
													<?php 
														$sql = "SELECT * FROM consignee ORDER BY id_consig DESC ";
														$wel = mysqli_query($db,$sql);
														$cek = mysqli_fetch_array($wel);
														$nam = $cek['nama'];
														$alam = $cek['alamat'];
													?>
													<br/>
													<p>
														Name : <?php echo $nam; ?><br/>		
														Address : <?php echo $alam; ?>		
													</p>
												</td>
												<td>
													5.Shipper's Reference Number : <?php echo $shiper; ?>
												</td>
											</tr>
											<tr>
												<td>
													6.Carrier : <?php echo $carier; ?>
												</td>
											</tr>
											<tr>
												<td colspan="2">
													<strong>
														SHIPPER'S DECLARATION : <br/>
														I herby declare that the contents of this consignment are fully and accurately described below by the proper shipping name, and are classified, packaged, marked and labelled/placerded and are in all respecs in proper condition for transport on the applicable international and national goverment regulations.
													</strong> 
												</td>
											</tr>
										</table>
										<table class="table" border="1" style="margin-top: -20px;">
											<tr>
												<td>
													7.Port of Loading<br/>
													BELAWAN, INDONESIA
												</td>
												<td>
													8.Vessel/Voyage<br/>
													<?php echo $visel; ?>
												</td>
												<td>
													9.1st Relay Por : <?php echo $relay1; ?>
												</td>
												<td>
													10.1st Relay Vessel/Voyag :<?php echo $voyage1; ?>
												</td>
											</tr>
											<tr>
												<td>
													11.2nd Relay Por : <?php echo $relay2; ?>
												</td>
												<td>
													13.2nd Relay Vessel/Voyag : <?php echo $voyage2; ?>
												</td>
												<td>
													14.Port of Discharger<br/>
													NEW YORK, USA
												</td>
												<td>
													15.Port of Destination<br/>
													NEW YORK, USA
												</td>
											</tr>
											<tr>
												<td colspan="4" align="center">
													6.Dangerous Goods Details
												</td>
											</tr>
										</table>
										<table class="table" border="1" style="margin-top: -20px;">
											<tr>
												<td rowspan="2">Propper Shipping Name</td>
												<td rowspan="2">IMO Class</td>
												<td rowspan="2">SUB Risk</td>
												<td rowspan="2">UN No.</td>
												<td rowspan="2">PG</td>
												<td rowspan="2">FP</td>
												<td rowspan="2">MPY/N</td>
												<td rowspan="2">Gross Wt.(kg</td>
												<td rowspan="2">Net Wt.(kg)</td>
												<td rowspan="2">Cube(m3)</td>
												<td colspan="2">Package No. & Type</td>
											</tr>
											<tr>
												<td>Inner</td>
												<td>Outer</td>
											</tr>
											<tr>
												<td>
													CORROSIVE LIQUID, ACIDIC<br/>
													ORGANIC, N.O.S.<br/>
													(Octanoic acid) : <?php echo $liquid; ?>
												</td>
												<td>
													<?php echo $imo; ?>
												</td>
												<td>
													<?php echo $sub; ?>
												</td>
												<td>
													<?php echo $un; ?>
												</td>
												<td>
													<?php echo $pg; ?>
												</td>
												<td>
													<?php echo $fp; ?>
												</td>
												<td>
													<?php echo $mpy; ?>
												</td>
												<td>23,865.00</td>
												<td>
													<?php echo $netwt; ?>
												</td>
												<td></td>
												<td>-</td>
												<td>1x20'SOTANK CONTAINER</td>
											</tr>
										</table>
										<table class="table" border="1" style="margin-top: -20px;">
											<tr>
												<td>
													17.Container No.<br/>
													<?php echo $con_no; ?>
												</td>
												<td>
													18.Container Size & Type<br/>
													1x20' ISOTANT CONTAINER
												</td>
												<td>
													19.Seal No.<br/>
													MMB0006065-MMB0006078
												</td>
											</tr>
											<tr>
												<td>
													20.Container Tare Wt. (kg)<br/>
													<?php echo $tare; ?>
												</td>
												<td>
													21.Total Wt.(kg)(Including Container Wt.)
													23,0000
												</td>
												<td>
													22.24hrs Emergency Contact Tel No.<br/>
													(+62) 62-888-17690 // +62 811-6240-618
												</td>
											</tr>
										</table>
										<table class="table" border="1" style="margin-top: -20px;">
											<tr>
												<td rowspan="2">
													23.Additional Handling Information <br/>
													<?php echo $info; ?>
												</td>
												<td>
													<strong>
														CONTAINER PACKING CERTIVICATE<br/>
														i hereby declare that the googs described<br/> above have been packed/loaded into the<br/> container indetified above in accordance eith provinsion 5.4.2.1 of IMGD Code
													</strong>
												</td>
											</tr>
											<tr>
												<td>
													24.Name of Company<br/>
													<strong>PT.UNILEVER OLEOCHEMICAL INDONESIA</strong>
												</td>
											</tr>
											<tr>
												<td rowspan="3">
													<strong>
														DANGEROUS GOOD : <br/>
														You must specfy: proper shipping name, hazard class,UN<br/>
														Number,Packaging Group,Marine Pollutant (where assigned) and observe the mandatory requerements under applicable national and international governmentel<br/>
														regulation.For the purpose of the IMDG Code see Provison 5.4.1.4 and DOT-E CRF 172.203(a).
													</strong>
												</td>
												<td>
													25.Name/ State of Declarant<br/>
													<strong><?php echo $state; ?></strong>
												</td>
											</tr>
											<tr>
												<td>
													26.Place and Date<br/>
													BELAWAN , INDONESIA<br/>
													<?php 
														$date = date('Y-m-d');
														echo $date;
													?>
												</td>
											</tr>
											<tr>
												<td>
													27.Signature of Declarant<br/>
													<?php 
														include 'include/koneksi.php';
														$id14 = 8;
														$query = "SELECT * FROM setting INNER JOIN daftar ON setting.id_daftar=daftar.id_daftar WHERE id_setting = '$id14' ";
														$sql = mysqli_query($db,$query);
														$cek1 = mysqli_fetch_array($sql);
														$id12 = $cek1['id_setting']; 
														$img = $cek1['img'];
														$tanda = $cek1['penanda_tangan'];
													?>
													<img src="img/<?php echo $img; ?>">
												</td>
											</tr>
										</table>
									</div>
									</form>
									<form id="myform1" action="?page=laporan/edit_protanda.php" method="post" enctype="multipart/form-data">
								      <div class="modal-body" style="overflow: hidden;">
								      	<div class="col-md-12">
									      	<div class="col-md-6">
											 <div class="form-group">
									      	   <input type="hidden" name="id1" value="<?php echo $id; ?>">
									      	   <input type="hidden" name="id12" value="<?php echo $id12; ?>">
									      	   <label>Nama Penanda Tangan</label>
											   <input type="text" name="nama" class="form-control" autocomplete="off"  placeholder="Nama Penanda Tangan">
											 </div><!-- /.form-group -->
											 <div class="form-group">
											   <input type="file" name="upload">
											 </div><!-- /.form-group -->
									      	</div>
									    </div>
								      </div>
								      <div class="modal-footer">
										<button type="submit" class="btn btn-primary">Simpan</button>
								        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								      </div>
								  	</form>
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

		<!-- LARNGE MODAL -->
		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Isi Data Laporan</h4>
		      </div>
		      <div class="modal-body" style="overflow: hidden;">
		      	<div class="col-md-12">
			      	<form id="myform1">
				      	<div class="col-md-6">
						 <div class="form-group">
				      		<input type="hidden" name="id1" value="<?php echo $id; ?>">
						   <label>Name</label>
						   <input type="text" name="nama" class="form-control" autocomplete="off"  placeholder="Name Consignee">
						 </div><!-- /.form-group -->
						 <div class="form-group">
						   <label>Address</label>
						   <input type="text" name="alamat" class="form-control" autocomplete="off"  placeholder="Address Consigne">
						 </div><!-- /.form-group -->
						 <div class="form-group">
						   <label>B / L Number</label>
						   <input type="text" name="number" class="form-control" autocomplete="off"  placeholder="B / L Number">
						 </div><!-- /.form-group -->
						 <div class="form-group">
						   <label>Page 1 of 1 Pages</label>
						   <input type="text" name="page" class="form-control" autocomplete="off"  placeholder="Page 1 of 1 Pages">
						 </div><!-- /.form-group -->
						 <div class="form-group">
						   <label>Shipper's Reference Number </label>
						   <input type="text" name="shiper" class="form-control" autocomplete="off"  placeholder="Shipper's Reference Number ">
						 </div><!-- /.form-group -->
						 <div class="form-group">
						   <label>Carrier </label>
						   <input type="text" name="carier" class="form-control" autocomplete="off"  placeholder="Carrier ">
						 </div><!-- /.form-group -->
						 <div class="form-group">
						   <label>1st Relay Por</label>
						   <input type="text" name="relay1" class="form-control" autocomplete="off"  placeholder="1st Relay Por">
						 </div><!-- /.form-group -->
						 <div class="form-group">
						   <label>1st Relay Vessel/Voyag</label>
						   <input type="text" name="voyage1" class="form-control" autocomplete="off"  placeholder="1st Relay Vessel/Voyag">
						 </div><!-- /.form-group -->
						 <div class="form-group">
						   <label>2st Relay Por</label>
						   <input type="text" name="relay2" class="form-control" autocomplete="off"  placeholder="2st Relay Por">
						 </div><!-- /.form-group -->
				      	 <div class="form-group">
						   <label>2st Relay Vessel/Voyag</label>
						   <input type="text" name="voyage2" class="form-control" autocomplete="off"  placeholder="2st Relay Vessel/Voyag">
						 </div><!-- /.form-group -->
				      	</div>
				      	<div class="col-md-6">
						 <div class="form-group">
						   <label>CORROSIVE LIQUID, ACIDIC</label>
						   <input type="text" name="liquid" class="form-control" autocomplete="off"  placeholder="ORGANIC">
						 </div><!-- /.form-group -->
						 <div class="form-group">
						   <label>IMO Class</label>
						   <input type="text" name="imo" class="form-control" autocomplete="off"  placeholder="IMO Class">
						 </div><!-- /.form-group -->
						 <div class="form-group">
						   <label>SUB Risk</label>
						   <input type="text" name="sub" class="form-control" autocomplete="off"  placeholder="SUB Risk">
						 </div><!-- /.form-group -->
						 <div class="form-group">
						   <label>UN No</label>
						   <input type="text" name="un" class="form-control" autocomplete="off"  placeholder="UN No">
						 </div><!-- /.form-group -->
						 <div class="form-group">
						   <label>PG</label>
						   <input type="text" name="pg" class="form-control" autocomplete="off"  placeholder="PG">
						 </div><!-- /.form-group -->
						 <div class="form-group">
						   <label>FP</label>
						   <input type="text" name="fp" class="form-control" autocomplete="off"  placeholder="FP">
						 </div><!-- /.form-group -->
						 <div class="form-group">
						   <label>MPY/N</label>
						   <input type="text" name="mpy" class="form-control" autocomplete="off"  placeholder="MPY/N">
						 </div><!-- /.form-group -->
						 <div class="form-group">
						   <label>Net Wt.(kg)</label>
						   <input type="text" name="netwt" class="form-control" autocomplete="off"  placeholder="Net Wt.(kg)">
						 </div><!-- /.form-group -->
						 <div class="form-group">
						   <label>Additional Handling Information</label>
						   <input type="text" name="info" class="form-control" autocomplete="off"  placeholder="Additional Handling Information">
						 </div><!-- /.form-group -->
						 <div class="form-group">
						   <label>Name/ State of Declarant</label>
						   <input type="text" name="state" class="form-control" autocomplete="off"  placeholder="Name/ State of Declarant">
						 </div><!-- /.form-group -->
				      	</div>
				    </form>
			    </div>
		      </div>
		      <div class="modal-footer">
				<button id="simpan" type="submit" class="btn btn-primary">Simpan</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>

		<script>
			$(document).ready(function() {
				$("#simpan").click(function(){
					$.ajax({
						type : "POST",
						url : 'include/laporan/lap5_pro.php',
						data : $("#myform1").serialize(),
					    success: function(isi){
					    	alert('Refresh halaman ini untuk melihat data');
							$('.bs-example-modal-lg').modal('hide');
					    },
					    error: function(){
					      alert("failure");
					    }
					});
				});
			});
		</script>
	</body>
</html>