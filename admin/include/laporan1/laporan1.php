<!DOCTYPE html>
<html>
	<head>
		<title>Laporan 1</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/style_laporan.css">
	    <!-- Bootstrap 3.3.5 -->
	    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
	    <!-- Font Awesome -->
	    <link rel="stylesheet" href="../../plugins/font-awesome-4.4.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="box box-primary box-solid">
			 <div class="box-header with-border">
			    <h3 class="box-title">
			      <i class="fa fa-inbox"></i> Laporan 1
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
									$rew = "SELECT * FROM transaksi INNER JOIN daftar ON transaksi.id_daftar = daftar.id_daftar INNER JOIN con_vendor ON daftar.id_convendor=con_vendor.id_convendor INNER JOIN con_type ON daftar.id_container=con_type.id_container INNER JOIN product ON daftar.id_product=product.id_product WHERE daftar.id_daftar = '$id' ";

									$sql = mysqli_query($db,$rew);
									$ambil = mysqli_fetch_array($sql);
									$prod = $ambil['nama_product'];
									$contype = $ambil['con_no'];
									$conta = $ambil['container'];
									$party = $ambil['party'];
									$visel = $ambil['vessel_name'];
                          			$date = $ambil['date_in'];
                          			$newdate1 = date('d-m-Y', strtotime($date));
								?>
								<div id="wrapper">
									<div class="container">
										<div class="col-md-7">
											<div id="logo" style="margin-left: 450px; margin-bottom:50px; ">
												<img src="img/logo.png" width="100" alt="">
											</div>
										</div>
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
									<div class="container">
										<div class="middle">
											<div class="mid-head">
												<p>
													Kepada Yth,<br/>
													Bapak Kepala Kantor Pengawasan Pelayanan<br/>
													Bea dan Cukai Tipe Madya Pabean Belawan
												</p>
												<p>
													Hal : Permohonan Pemeriksaan Fisik Barang di Luar Gudang Exportir
												</p>
												<p>
													Dengan Hormat,<br/>
													Sehubungan dengan barang ekspor kami :
												</p>
												<table class="table1">
													<tr>
														<td class="table-name">
															Nama Barang
														</td>
														<td> :&nbsp;&nbsp; </td>
														<td>
															<?php echo $prod; ?>
														</td>
													</tr>
													<tr>
														<td class="table-name">
															Jumlah Barang
														</td>
														<td> :&nbsp;&nbsp; </td>
														<td>
															<?php echo $party; ?> x <?php echo $conta; ?>
														</td>
													</tr>
													<tr>
														<td class="table-name">
															No Container			
														</td>
														<td> :&nbsp;&nbsp; </td>
														<td>
															<?php echo $contype; ?>
														</td>
													</tr>
													<tr>
														<td class="table-name">
															PEB Number
														</td>
														<td> :&nbsp;&nbsp; </td>
														<td>
															010700
														</td>
													</tr>
													<tr>
														<td class="table-name">
															Tanggal
														</td>
														<td> :&nbsp;&nbsp; </td>
														<td>
															<?php echo $newdate1; ?>
														</td>
													</tr>
													<tr>
														<td class="table-name">
															Sarana Pengangkut
														</td>
														<td> :&nbsp;&nbsp; </td>
														<td>
															<?php echo $visel; ?>
														</td>
													</tr>
												</table>
											</div>
										</div>
									</div>
									<div class="container">
										<div class="bottom">
											<p>
												Dengan ini memohon agar karirnya dengan ini dapat diberikan izin untuk melakukan pemeriksaanfisik barang di luar pabrik kami :
											</p>
											<table class="table2">
												<tr>
													<td class="table-name1">
														Tempat / Lokasi
													</td>
													<td> :&nbsp;&nbsp; </td>
													<td>
														PT.Masaji Kargosentra Tema
													</td>
												</tr>
												<tr>
													<td class="table-name1">
														Alamat
													</td>
													<td> :&nbsp;&nbsp; </td>
													<td>
														Jalan Raya Pelabuhan Gabion Belawan
													</td>
												</tr>
											</table>
											<p>
												Dikarenakan jarak untuk melakukan pemeriksaan barang ekpor kami terlalu jauh.<br/>
												Demikian permohonan ini kami sampaikan atas perhatian dan bantuian yang bapak/ibu berikan kami ucapkan terimakasih
											</p>
										</div>
									</div>
									<img src="img/masdim.png" style="margin-top: 50px; margin-bottom:-100px; ">
									<br/>
									<br/>
									<br/>
									<br/>
									<br/>
									<br/>
									<p>(Frendy Dimas Pradana)</p>
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