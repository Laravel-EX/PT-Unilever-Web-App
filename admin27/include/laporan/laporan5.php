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
			      <i class="fa fa-inbox"></i> Laporan 5
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
									$req = "SELECT * FROM transaksi INNER JOIN daftar ON transaksi.id_daftar = daftar.id_daftar INNER JOIN con_vendor ON daftar.id_convendor=con_vendor.id_convendor INNER JOIN con_type ON daftar.id_container=con_type.id_container WHERE daftar.id_daftar = '$id' ";

									$sql = mysqli_query($db,$req);
									$ambil = mysqli_fetch_array($sql);
									$con_no = $ambil['con_no'];
									$po = $ambil['po_no'];
									$conven = $ambil['convendor'];
									$contype = $ambil['container'];
									$visel = $ambil['vessel_name'];
									$clos = $ambil['vessel_closing'];
									$tare = $ambil['tare_cont'];
								?>
								<div id="wrapper">
									<div id="logo" style="margin-left: 450px; margin-bottom:50px; ">
										<img src="img/logo.png" width="100" alt="">
									</div>
									<h3 align="center">
										DANGEROUS GOODS DECLARATEDANF CONTAINER PACKING CERTIVICATE
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
													1.Page 1 Of 1Pages
												</td>
											</tr>
											<tr>
												<td>3.B/L Number:</td>
											</tr>
											<tr>
												<td rowspan="2">
													4.Consignee (Name and Address)<br/>
													<table>
														<tr>
															<td>
																<form id="myform">
																	&nbsp;<input type="text" name="nama" class="myinput" placeholder="Name">
																	&nbsp;<input type="text" name="alamat" class="myinput" placeholder="Alamat">
																</form><br/>
																<button id="simpan">Simpan</button>
															</td>
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
												<td>5.Shipper's Reference Number :</td>
											</tr>
											<tr>
												<td>6.Carrier:</td>
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
												<td>9.1st Relay Port</td>
												<td>10.1st Relay Vessel/Voyage</td>
											</tr>
											<tr>
												<td>11.2nd Relay Port</td>
												<td>13.2nd Relay Vessel/Voyage</td>
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
													(Octanoic acid)
												</td>
												<td>8</td>
												<td></td>
												<td>3265</td>
												<td>III</td>
												<td>ca. 130 C-open cup</td>
												<td>N</td>
												<td>23,865.00</td>
												<td>20,050.00</td>
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
													23.Additional Handling Information
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
													<strong>SAGOM.SUEA</strong>	
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
													<img src="img/bukmar.png" alt="">
												</td>
											</tr>
										</table>
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

		<script>
			$(document).ready(function() {
				$("#simpan").click(function(){
					// alert('asdasd')
					//$(".myinput").attr('disabled','disabled');
					$.ajax({
						type : "POST",
						url : 'include/laporan/lap5_pro.php',
						data : $("#myform").serialize(),
					    success: function(isi){
					    	alert('Refresh halama ini untuk melihat perubahan');
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