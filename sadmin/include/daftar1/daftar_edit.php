
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success box-solid">
          <div class="box-header with-border">
            <h3 class="box-title" style="text-transform: capitalize;">
              <i class="fa fa-inbox"></i> Data Customer
            </h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
          </div><!-- /.box-header -->
          <div class="box-body">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
              <section class="content">
                <div class="row">
                  <div class="col-md-5">
                    <div class="box-body">
                      <form id="myform" action="?page=daftar/daftar_epro.php" method="post" enctype="multipart/form-data">
                        <?php
                          $no=1;
                          include 'include/koneksi.php';
                          $id = $_REQUEST['p'];
                          $sql = "SELECT * FROM daftar INNER JOIN transaksi ON daftar.id_daftar = transaksi.id_daftar INNER JOIN con_vendor ON daftar.id_convendor=con_vendor.id_convendor INNER JOIN con_type ON daftar.id_container=con_type.id_container INNER JOIN customer ON daftar.id_customer=customer.id_customer INNER JOIN product ON daftar.id_product=product.id_product WHERE daftar.id_daftar = '$id' ";
                          $query = mysqli_query($db,$sql);
                          while ($ambil = mysqli_fetch_array($query)) {
                            $id2 = $ambil['id_daftar'];

                            $po = $ambil['po_no'];
                            $do = $ambil['do_no1'];
                            $trans = $ambil['transporter'];
                            $visel = $ambil['vessel_name'];
                            $clos = $ambil['vessel_closing'];
                            $party = $ambil['party'];
                            $id_customer = $ambil['id_customer'];
                            $customer = $ambil['nama_customer'];
                            $product = $ambil['nama_product'];
                            $id_product = $ambil['id_product'];
                            $con_vendor = $ambil['convendor'];
                            $id_vendor = $ambil['id_convendor'];
                            $con_type = $ambil['container'];
                            $id_container = $ambil['id_container'];
                            $status = $ambil['status'];
                            $area = $ambil['area'];
                          }
                        ?>
                        <input type="hidden" value="<?php echo $id2; ?>" name="id">
                        <div class="form-group">
                           <label>PO No</label>
                           <input type="text" name="po" class="form-control" autocomplete="off" value="<?php echo $po; ?>">
                         </div>
                         <div class="form-group">
                             <label>Customer</label>
                             <select class="form-control select2" style="width: 100%;" name="custom">
                             <option value="">Pilih Customer</option>
                              <?php
                                include 'include/koneksi.php';
                                $dml1 = mysqli_query($db,"SELECT * FROM customer");
                                while ($cek1 = mysqli_fetch_array($dml1)) {
                                   $customer = $cek1['nama_customer'];
                                   $id_customer = $cek1['id_customer'];
                              ?>
                                <option value="<?php echo $id_customer; ?>"><?php echo $customer; ?></option>
                              <?php } ?>
                           </select>
                         </div>
                         <div class="form-group">
                             <label>Product</label>
                             <select class="form-control select2" style="width: 100%;" name="prod">
                             <option value="">Pilih Product</option>
                              <?php
                                include 'include/koneksi.php';
                                $dml2 = mysqli_query($db,"SELECT * FROM product");
                                while ($cek2 = mysqli_fetch_array($dml2)) {
                                   $product = $cek2['nama_product'];
                                   $id_product = $cek2['id_product'];
                              ?>
                                <option value="<?php echo $id_product; ?>"><?php echo $product; ?></option>
                              <?php } ?>
                           </select>
                         </div>
                         <div class="form-group">
                           <label>DO No</label>
                           <input type="text" name="do" class="form-control" autocomplete="off"  value="<?php echo $do; ?>">
                         </div>
                         <div class="form-group">
                             <label>Container Vendor</label>
                             <select class="form-control select2" style="width: 100%;" name="conven">
                             <option value="">Pilih Container Vendor</option>
                              <?php
                                include 'include/koneksi.php';
                                $dml3 = mysqli_query($db,"SELECT * FROM con_vendor");
                                while ($cek3 = mysqli_fetch_array($dml3)) {
                                   $con_vendor = $cek3['convendor'];
                                   $id_vendor = $cek3['id_convendor'];
                              ?>
                                <option value="<?php echo $id_vendor; ?>"><?php echo $con_vendor; ?></option>
                              <?php } ?>
                           </select>
                         </div>
                         <div class="form-group">
                             <label>Container Type</label>
                             <select class="form-control select2" style="width: 100%;" name="contype">
                             <option value="">Pilih Container Type</option>
                              <?php
                                include 'include/koneksi.php';
                                $dml4 = mysqli_query($db,"SELECT * FROM con_type");
                                while ($cek4 = mysqli_fetch_array($dml4)) {
                                   $con_type = $cek4['container'];
                                   $id_container = $cek4['id_container'];
                              ?>
                                <option value="<?php echo $id_container; ?>"><?php echo $con_type; ?></option>
                              <?php } ?>
                           </select>
                         </div>
                         <div class="form-group">
                            <label>Transporter</label>
                            <select class="form-control select2" style="width: 100%;" name="trans">
                              <option value="">Pilih Transporter</option>
                              <option value="BI"> BI</option>
                              <option value="FEM"> FEM</option>
                              <option value="LSJ"> LSJ</option>
                              <option value="JSK"> JSK</option>
                            </select>
                         </div>
                         <div class="form-group">
                           <label>Vessel Name</label>
                           <input type="text" name="visel" class="form-control" autocomplete="off"  value="<?php echo $visel; ?>">
                         </div>
                         <div class="form-group">
                           <label>Vessel Closing</label>
                           <input type="text" name="clos" required="" class="form-control" id="datepicker1" value="<?php echo $clos; ?>">
                         </div>
                         <div class="form-group">
                           <label>Party</label>
                           <input type="text" name="party" id="banyak_form" class="form-control" autocomplete="off" readonly="" value="<?php echo $party; ?>">
                         </div>
                         <?php
                            $no12 = 1;
                            $no13 = 1;
                            $mysql = "SELECT * FROM transaksi WHERE id_daftar='$id' ";
                            $query1 = mysqli_query($db,$mysql);
                            while ($cek = mysqli_fetch_array($query1)) {
                              $id1 = $cek['id_transaksi'];
                              $dn_no = $cek['dn_no'];
                              $date_in = $cek['date_in'];
                              $time_in  = $cek['time_in'];
                              $con_no = $cek['con_no'];
                              $seal_no = $cek['seal_no'];
                              $tare_cont = $cek['tare_cont'];
                              $date_out = $cek['date_out'];
                              $time_out = $cek['time_out'];
                              $sample = $cek['sample'];

                              if ($sample == 'y') {
                                $chek = "<input type='checkbox' disabled='' name='sample' autocomplete='off' value='y' checked='' ";
                              } else {
                                $chek = "<input type='checkbox' disabled='' name='sample' autocomplete='off' value='y'";
                              }
                          ?>
                          <input type="hidden" name="ok[]" value="<?php echo $id1; ?>">
                          <div class="form-group">
                             <label>DN No.</label>
                             <input type="text" name="dn<?php echo $no12++; ?>" class="form-control" autocomplete="off" value="<?php echo $dn_no; ?>" />
                          </div>
                          <div class="form-group">
                             <label>Date In</label>
                              <input type="date" value="<?php echo $date_in; ?>" name="date"  class="form-control" id="datepicker2" placeholder="Date In">
                           </div>
                           <div class="form-group">
                              <label>Time In</label>
                              <input type="time" name="time" value="<?php echo $time_in; ?>" class="form-control" placeholder="Time In">
                           </div>
                           <div class="form-group">
                              <label>Container No</label>
                              <input type="text" name="conno" value="<?php echo $con_no; ?>" class="form-control" autocomplete="off"  placeholder="Container No">
                           </div>
                           <div class="form-group">
                              <label>Seal No</label>
                              <input type="text" name="seal" class="form-control" autocomplete="off" value="<?php echo $seal_no; ?>" placeholder="Seal NO">
                           </div>
                           <div class="form-group">
                              <label>Tare Continer</label>
                              <input type="text" name="tare" class="form-control" autocomplete="off" value="<?php echo $tare_cont; ?>" placeholder="Tare Continer">
                           </div>
                           <div class="form-group">
                              <label>Date Out</label>
                              <input type="date" name="dout" class="form-control" autocomplete="off" value="<?php echo $date_out; ?>" placeholder="Date Out" id="datepicker3">
                           </div>
                           <div class="form-group">
                              <label>Time Out</label>
                              <input type="time" name="tout" class="form-control" autocomplete="off" value="<?php echo $time_out; ?>" placeholder="Time Out">
                           </div>
                           <div class="form-group">
                              <label>Sample</label>
                              <br/><?php echo $chek; ?>
                           </div>
                           <div class="form-group">
                              <label>Status</label>
                              <select class="form-control select2" style="width: 100%;" name="status<?php echo $no13++; ?>">
                                 <option value="">Pilih Status</option>
                                 <option value="ARRIVE"> ARRIVE</option>
                                 <option value="MARKING"> MARKING & SEALING</option>
                                 <option value="DEPART"> DEPART</option>
                              </select>
                           </div>
                        <?php } mysqli_close($db) ?>
                         <div class="form-group">
                            <label>Area</label>
                            <select class="form-control select2" style="width: 100%;" name="area">
                              <option value="<?php echo $area; ?>"><?php echo $area; ?></option>
                            </select>
                         </div>
                         <input id="simpan" type="submit" value="Simpan" class="btn btn-primary">
                      </form>
                    </div><!-- /.box-body -->
                  </div>
                </div>
              </section>
            </div>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div><!-- /.row (main row) -->
