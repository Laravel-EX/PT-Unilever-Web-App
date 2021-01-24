<?php date_default_timezone_set("Asia/Jakarta"); ?>
<!DOCTYPE html>
<html>
	<body>
		<div class="box box-primary box-solid">
			 <div class="box-header with-border">
			    <h3 class="box-title">
			      <i class="fa fa-inbox"></i> VCF
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
			                <div class="box-body">
			                	<table border="1" style="width: 100%;">
			                		<tr>
			                			<td colspan="3" rowspan="3" width="500">
											<div id="logo" style="margin: 10px; float: left;">
												<img src="img/logo.png" width="100" alt="">
											</div>
											<p class="top-head" style="font-size: 20px; text-align: center; margin-top: 25px;">
												<strong>PT.Unilever Oleachemical Indonesia</strong><br/>
												FORM PEMERIKSAAN KENDARAAN BARANG KELUAR <br/>
												VEHICLE CONTROL FORM OUTBOND
											</p>
			                			</td>
			                			<td>&nbsp;&nbsp;&nbsp;No Dok.Ref</td>
			                			<td>&nbsp;&nbsp;&nbsp;UOI - F - LP - 015</td>
			                		</tr>
			                		<tr>
			                			<td>&nbsp;&nbsp;&nbsp;No Terbitan Issue No</td>
			                			<td>&nbsp;&nbsp;&nbsp;01.2</td>
			                		</tr>
			                		<tr>
			                			<td>&nbsp;&nbsp;&nbsp;Halaman Page No</td>
			                			<td>&nbsp;&nbsp;&nbsp;1 Of 1</td>
			                		</tr><?php
			                		  include '../../include/koneksi.php';
                        $e=$_REQUEST['p'];
                       
                        $sql = "SELECT * FROM daftar d, customer c, product p, con_type co,
                        con_vendor con, transaksi t, user u
                        WHERE d.id_customer = c.id_customer
                        AND d.id_product = p.id_product
                        AND d.id_container = co.id_container
                        AND d.id_convendor = con.id_convendor 
                        AND d.id_daftar=t.id_daftar AND d.id_user=u.id_user
                        AND t.id_transaksi='$e' ";

                        $query = mysqli_query($db,$sql);
                       $ambil = mysqli_fetch_array($query);
                          $idf=$ambil['id_daftar'];
                          $id = $ambil['id_transaksi'];
                          $dn = $ambil['dn_no'];
                          $con_no = $ambil['con_no'];
                          $date_in = $ambil['date_in'];
                          $newdate1 = date('d-m-Y', strtotime($date_in));
                          $time_in = $ambil['time_in'];
                          $terima_tgl = $ambil['terima_tgl'];
                          $selesai_tgl = $ambil['selesai_tgl'];
                          $terima_time = $ambil['terima_time'];
                           $sample_tgl = $ambil['sample_tgl'];
                           $date_out = $ambil['date_out'];
                           $time_out = $ambil['time_out'];
                            $sample_time = $ambil['sample_time'];
                          $selesai_time = $ambil['selesai_time'];
                          $seal_no = $ambil['seal_no'];
                          $gambar = $ambil['gambar'];
                          $userinput = $ambil['userinput'];
                          $userquality = $ambil['userquality'];
                           $username = $ambil['username'];
                          $status=$ambil['status']; ?>
			                		<tr>
			                			<td colspan="5">
			                				<div style="padding: 10px; width: 960px; margin: 0 auto;">
				                				<p align="right">Tanggal / Date :</p>
				                				<table>
				                					<tr>
				                						<td><strong>1. Outbond</strong></td>
				                					</tr>
				                					<tr>
				                						<td>No. DN</td>
				                						<td>:</td>
				                						<td><?php echo $dn ?></td>
				                					</tr>
				                					<tr>
				                						<td>No. Container</td>
				                						<td>:</td>
				                						<td><?php echo $con_no ?></td>
				                					</tr>
				                					<tr>
				                						<td>Komoditi / Commodity</td>
				                						<td>:</td>
				                						<td></td>
				                					</tr>
				                				</table>
				                				<table border="1" style="margin: 20px;">
				                					<tr>
				                						<td></td>
				                						<td>Tanggal / Date</td>
				                						<td>Waktu / Time</td>
				                					</tr>
				                					<tr>
				                						<td bgcolor="skyblue">Kedatangan / Arrival</td>
				                						<td><?php echo $date_in ?></td>
				                						<td><?php echo $time_in ?></td>
				                					</tr>
				                				</table>
				                				<p style="margin-bottom: 80px;text-align: right;">Outbound Admin</p>
				                				<p style="margin-bottom: 80px;text-align: right;"><?php echo $username ?></p>
			                				</div>
			                			</td>
			                		</tr>
			                		<tr>
			                			<td colspan="5">
			                				<div style="padding: 10px; width: 960px; margin: 0 auto;">
				                				<p align="right">Tanggal / Date :</p>
				                				<table>
				                					<tr>
				                						<td><strong>1. Tank Farm</strong></td>
				                					</tr>
				                					<tr>
				                						<td>Batch No</td>
				                						<td>:</td>
				                						<td></td>
				                					</tr>
				                					<tr>
				                						<td>Tank No</td>
				                						<td>:</td>
				                						<td></td>
				                					</tr>
				                				</table>
				                				<table border="1" style="margin: 20px;">
				                					<tr>
				                					<td></td>
				                						
				                						<td>Tanggal / Date</td>
				                						<td>Waktu / Time</td>
				                					</tr>
				                					<tr>
				                					<td bgcolor="skyblue">Mulai di Muat / Start Loading</td>
				                					<td><?php echo $terima_tgl ?></td>
				                						<td><?php echo $terima_time ?></td>
				                						
				                					</tr>
				                					<tr>
				                					<td bgcolor="skyblue">Selesai di Muat / Finish Loading</td>
				                						
				                						<td><?php echo $selesai_tgl ?></td>
				                						<td><?php echo $selesai_time ?></td>
				                					</tr>
				                				</table>
				                				<p>Hasil / Result</p>
				                				<textarea style="width: 300px; height: 150px;"></textarea>
				                				<p style="margin-bottom: 80px;text-align: right;">PIC Warehouse</p>
				                				<p style="margin-bottom: 80px;text-align: right;"><?php echo $userinput ?></p>
			                				</div>
			                			</td>
			                		</tr>
			                		
			                		<tr>
			                			<td colspan="5">
			                				<div style="padding: 10px; width: 960px; margin: 0 auto;">
				                				<p align="right">Tanggal / Date :</p>
				                				<table>
				                					<tr>
				                						<td><strong>3. Outbound</strong></td>
				                					</tr>
				                				</table>
				                				<table border="1" style="margin: 20px;">
				                					<tr>
				                						<td>
				                						<td>Tanggal / Date</td>
				                						<td>Waktu / Time</td>
				                					</tr>
				                					<tr>
				                					<td bgcolor="skyblue">Keberangkatan / Departure</td>
				                						<td><?php echo $date_out ?></td>
				                						<td><?php echo $time_out ?></td>
				                					</tr>
				                				</table>
				                				<p style="margin-bottom: 80px;text-align: right;">Outbond Admin</p>
				                				<p style="margin-bottom: 80px;text-align: right;"><?php echo $username ?></p>
			                				</div>
			                			</td>
			                		</tr>
			                	</table>
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
	</body>
</html>