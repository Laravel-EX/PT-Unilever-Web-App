<!DOCTYPE html>
<html>
	<head>
		<title>Laporan 3</title>
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
			      <i class="fa fa-inbox"></i> Shipping Instruction
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
			              	<a href="#myModal" class="btn btn-success modal1" data-toggle="modal" data-target="#myModal">Isi Data Laporan</a>
			                <div class="box-body" style="overflow-x: scroll;">
			                <?php
									include 'include/koneksi.php';
									$id = $_REQUEST['p'];
									$rew = "SELECT * FROM transaksi INNER JOIN daftar ON transaksi.id_daftar = daftar.id_daftar INNER JOIN con_vendor ON daftar.id_convendor=con_vendor.id_convendor INNER JOIN con_type ON daftar.id_container=con_type.id_container INNER JOIN customer ON daftar.id_customer=customer.id_customer INNER JOIN product ON daftar.id_product=product.id_product INNER JOIN laporan3 ON transaksi.id_daftar=laporan3.id_daftar WHERE laporan3.id_daftar = '$id' ";

									$sql = mysqli_query($db,$rew);
									$ambil = mysqli_fetch_array($sql);
									$prod = $ambil['nama_product'];
									$visel = $ambil['vessel_name'];
									$con_no = $ambil['con_no'];
									$seal = $ambil['seal_no'];
									$tarecon = $ambil['tare_cont'];
	                          		$nett = $ambil['nett_wight'];
									$convendor = $ambil['convendor'];
									$date_in = $ambil['date_in'];
                          			$newdate1 = date('d-m-Y', strtotime($date_in));
									$customer = $ambil['nama_customer'];
									$notify = $ambil['notify'];
									$detinasi = $ambil['destination'];
									$net = $ambil['netwg'];
									$gross = $ambil['gross'];
									$marks = $ambil['marks'];
									$freight = $ambil['freight'];
								?>
								<div id="wrapper">
									<div class="container">
										<div id="logo" style="margin-left: 520px; margin-bottom:50px; ">
											<img src="img/logo.png" width="100" alt="">
										</div>
										<p align="right"><strong>Rev.No : EXP00197/17/NEWPORT</strong></p>
										<table style="margin-left: 60px; margin-bottom: 20px;">
											<tr>
												<td>TO</td>
												<td>:&nbsp;</td>
												<td>
													<?php echo $convendor; ?>
												</td>
											</tr>
											<tr>
												<td>TO</td>
												<td>:</td>
												<td>
													
												</td>
											</tr>
											<tr>
												<td>Reaf.No</td>
												<td>:</td>
												<td>
													
												</td>
											</tr>
											<tr>
												<td>Date</td>
												<td>:</td>
												<td>
													<?php echo $newdate1; ?>
												</td>
											</tr>
										</table>
										<h5 align="center" class="table-name1">SHIPPING INSTRUCTION</h5>
										<table class="table4">
											<tr>
												<td class="table-name1">
													SHIPPER
												</td>
												<td> :&nbsp;&nbsp; </td>
												<td>
													PT.UNILEVER OLEOCHEMICAL INDONESIA KOMPEK KEK SEI MANGKEI,SUMATRA UTARA INDONESIA
												</td>
											</tr>
											<tr>
												<td class="table-name1">
													CONSIGNEE
												</td>
												<td> :&nbsp;&nbsp; </td>
												<td>
													<?php echo $customer; ?>
												</td>
											</tr>
											<tr>
												<td class="table-name1">
													NOTIFY PARTY
												</td>
												<td> :&nbsp;&nbsp; </td>
												<td>
													<?php echo $notify; ?>
												</td>
											</tr>
											<tr>
												<td class="table-name1">
													VESSEL
												</td>
												<td> :&nbsp;&nbsp; </td>
												<td>
													<?php echo $visel; ?>
												</td>
											</tr>
											<tr>
												<td class="table-name1">
													PORT OF LOADING
												</td>
												<td> :&nbsp;&nbsp; </td>
												<td>
													BELAWAN,INDONESIA
												</td>
											</tr>
											<tr>
												<td class="table-name1">
													DESTINATION
												</td>
												<td> :&nbsp;&nbsp; </td>
												<td>
													<?php echo $detinasi; ?>
												</td>
											</tr>
											<tr>
												<td class="table-name1">
													DESCRIPTION OF GOODS
												</td>
												<td> :&nbsp;&nbsp; </td>
												<td>
													<?php echo $prod; ?>
												</td>
											</tr>
											<tr>
												<td class="table-name1">
													NET WEIGHT
												</td>
												<td> :&nbsp;&nbsp; </td>
												<td>
													<?php echo $net; ?>
												</td>
											</tr>
											<tr>
												<td class="table-name1">
													GROSS WEIGHT
												</td>
												<td> :&nbsp;&nbsp; </td>
												<td>
													<?php echo $gross; ?>
												</td>
											</tr>
											<tr>
												<td class="table-name1">
													SHIPPING MARKS
												</td>
												<td> :&nbsp;&nbsp; </td>
												<td>
													<?php echo $marks; ?>
												</td>
											</tr>
											<tr>
												<td class="table-name1">
													FREIGHT
												</td>
												<td> :&nbsp;&nbsp; </td>
												<td>
													<?php echo $freight; ?>
												</td>
											</tr>
											<tr>
												<td class="table-name1">
													ADDITIONAL ON B/L<br/>
													(Special Requeriments)
												</td>
												<td> :&nbsp;&nbsp; </td>
												<td>
													"CLEAN ON BOARD"
													ALL CONTAINERS MUST BE STOWAGE ABOVE DECK,AWAY FROM SUNLIGHT AND BOILER 
												</td>
											</tr>
											<tr>
												<td class="table-name1">
													CONT.& SEAL
												</td>
												<td> :&nbsp;&nbsp; </td>
												<td>
													AS PER CONTAINER LIST
												</td>
											</tr>
										</table>
										<table style="margin-left: 60px; margin-top: 20px;">
											<tr>
												<td style="font-weight: bold;">
												Note : 
													<ol>
														<li>Clean container must be provided</li>
														<li>Roof, wall and floor of container in good condition</li>
														<li>Do not put container near to boiler / engine machine avoid direct sun light</li>
													</ol>
													"Factory will refuse all container in not good condition"
												</td>
											</tr>
										</table>
										Rgds,<br/>
										MARISI
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

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Isi Data Laporan</h4>
		      </div>
		      <div class="modal-body">
		      	<form id="formku">
					<div class="form-group">
						<input type="hidden" name="id1" value="<?php echo $id; ?>">
						<label>NOTIFY PARTY</label>
						<input type="text" name="notify" class="form-control" autocomplete="off"  placeholder="NOTIFY PARTY">
					</div><!-- /.form-group -->
					<div class="form-group">
						<label>DESTINATION </label>
						<input type="text" name="desti" class="form-control" autocomplete="off"  placeholder="DESTINATION ">
					</div><!-- /.form-group -->
					<div class="form-group">
						<label>NET WEIGHT</label>
						<input type="text" name="netwg" class="form-control" autocomplete="off"  placeholder="NET WEIGHT">
					</div><!-- /.form-group -->
					<div class="form-group">
						<label>GROSS WEIGHT</label>
						<input type="text" name="gross" class="form-control" autocomplete="off"  placeholder="GROSS WEIGHT">
					</div><!-- /.form-group -->
					<div class="form-group">
						<label>SHIPPING MARKS </label>
						<input type="text" name="marks" class="form-control" autocomplete="off"  placeholder="SHIPPING MARKS ">
					</div><!-- /.form-group -->
					<div class="form-group">
						<label>FREIGHT</label>
						<input type="text" name="freight" class="form-control" autocomplete="off"  placeholder="FREIGHT">
					</div><!-- /.form-group -->
		      	</form>
		      </div>
		      <div class="modal-footer">
				<button type="submit" id="kusimpan" class="btn btn-success">Simpan</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>

		<script type="text/javascript">
		  $(document).ready(function(){
		  	$("#kusimpan").click(function(){
		  		$.ajax({
		  			type : 'POST',
		  			url  : 'include/laporan/lap3_pro.php',
		  			data : $("#formku").serialize(),
		  			success : function(isi) {
		  				alert('Refresh halaman ini untuk melihat data');
		  				$("#myModal").modal('hide');
		  			}, error: function(){
		  				alert('Failed');
		  			}
		  		});
		  		//alert('sdasd');
		  	});
		  });
		</script>
	</body>
</html>