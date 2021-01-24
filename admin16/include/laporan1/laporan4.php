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
			      <i class="fa fa-inbox"></i> LETTER OF INDEMNITY
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
									$con_ven = $ambil['convendor'];
									$visel = $ambil['vessel_name'];
									$container = $ambil['container'];
								?>
								<div id="wrapper">
									<div class="container">
										<div id="logo" style="margin-left: 500px; margin-bottom:50px; ">
											<img src="img/logo.png" width="100" alt="">
										</div>
										<h3 align="center">LETTER OF INDEMNITY FOR THE CONTAINER SHIPMENT IN FLEXITANK</h3>
										<p align="right">10 May 2017</p>
										<table style="margin-left: 60px; margin-bottom: 20px;">
											<tr>
												<td>TO</td>
												<td>:</td>
												<td>
													<?php echo $con_ven; ?>
												</td>
											</tr>
											<tr>
												<td>From</td>
												<td>:</td>
												<td>
													PT.UNILEVER OLEOCHEMICAL INDONESIA
												</td>
											</tr>
											<tr>
												<td>Contract of Affraightment/Cherterparty date</td>
												<td>:</td>
												<td>
													
												</td>
											</tr>
											<tr>
												<td>Vessel / Voyage</td>
												<td>:</td>
												<td>
													<?php echo $visel; ?>
												</td>
											</tr>
											<tr>
												<td>Booking No.</td>
												<td>:</td>
												<td>
													
												</td>
											</tr>
											<tr>
												<td>Container No.</td>
												<td>:</td>
												<td>
													2 x <?php echo $container; ?>
													
												</td>
											</tr>
<tr><td></td>
												<td></td><td>
											<table border="1" width="200">
														<?php
														$re1 = "SELECT * FROM transaksi INNER JOIN daftar ON transaksi.id_daftar = daftar.id_daftar INNER JOIN con_vendor ON daftar.id_convendor=con_vendor.id_convendor INNER JOIN con_type ON daftar.id_container=con_type.id_container WHERE daftar.id_daftar = '$id' ";
														$sql2 = mysqli_query($db,$re1);
									while($ambil2 = mysqli_fetch_array($sql2))
									{
										$con_no = $ambil2['con_no'];
										$seal = $ambil2['seal_no'];
									
														?>
														<tr align="center">
															<td>
																<?php echo $con_no; ?>
															</td>
															<td>
																<?php echo $seal; ?>
															</td>
														</tr>
														<?php }
?>
													</table></td></tr>
											<tr>
												<td>Place of Recipt / Final Destination	</td>
												<td>:</td>
												<td>
													BELAWAN PORT,INDONESIA / KOLKATTA INDIA
												</td>
											</tr>
										</table>
										<p>Dear Sirs,</p>
										<p>
											We request you to ship yout cargo in Flexitank (details of cargo and way of handling as per Appendix -1).
										</p>
										<p>
											In consideration of our complaying with your request, we hereby agree as follows:-
										</p>
										<p>
											<ol>
												<li>
													Toindemify you, your servants and agents and to hold all of you harmless from any liability, loss, damage or expense of whatsover nature whixh you sustain by reason of the transportation of the cargo in accordance with our request including,but not limited to, damage to the vissel or other cargo.
												</li>
												<li>
													If in your opinion or that of the master or any of your employees, the cargo becomesb dangerous, inflammeble, obnoxious, damaging or injorious it may, at any time or place,be unloaded, destriyed, or rendered harmless without compensation to us and whitout any liability on your to make any Ganeral Avarange contribution in redpect of susch cargo. We shall indemnify you, your servents and agents againts all loss. damage or costs and expense ariding out of such action taken by you. 
												</li>
												<li>
													To arrange adequate liability insurance for all risk which are the responsibility of cargo owners or other parties who install the Flexi tank inside container and/or load cargoes into the Flexi tank.
												</li>
												<li>
													If in respect of any claim or metter for which we are obliged to imdenify you in accordance with the terms of this latter, the vessel or any other vessel or property belonging to you should be arrested or detained or if the arrest or detention thereof should be threatened, we will provide such bail or other security as may be required to prevent such arrest or detention or to secure the release of such vessel or property and indemnify  you in respect of any loss, damage or expanses caused by such arrest detention, whether or not the same my be justified.
												</li>
												<li>
													The liability of each and very person under this indemnity shall be join and saveral, and shall not conditional upon your proceeding firts againts any person, whether or not such person party to or liable upon this indemnity.
												</li>
												<li>
													This indemnity shall be governed any and construed in accordance with singapore law and each and very person liable under this indemnity shall your request submit to the jurisdiction of the Singapore Hight Court.
												</li>
											</ol>
										</p>
										<p style="margin-top: 40px;">
											Yours faithfully<br/><br/><br/><br/><br/>
											<img src="img/masdim.png" style="margin-top: 50px; margin-bottom:-100px; "><br/>
											(Frendy Dimas Pradana)
										</p>
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