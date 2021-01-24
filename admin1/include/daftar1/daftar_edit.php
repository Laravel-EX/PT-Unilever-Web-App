
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
                          $sql = "SELECT * FROM transaksi INNER JOIN daftar ON transaksi.id_daftar = daftar.id_daftar INNER JOIN con_vendor ON daftar.id_convendor=con_vendor.id_convendor INNER JOIN con_type ON daftar.id_container=con_type.id_container INNER JOIN customer ON daftar.id_customer=customer.id_customer INNER JOIN product ON daftar.id_product=product.id_product WHERE daftar.id_daftar = '$id' ";
                          $query = mysqli_query($db,$sql);
                          while ($ambil = mysqli_fetch_array($query)) {
                            $id = $ambil['id_daftar'];
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
                            $sample = $ambil['sample'];

                            $dn_no = $ambil['dn_no'];
                            $date_in = $ambil['date_in'];
                            $time_in  = $ambil['time_in'];
                            $con_no = $ambil['con_no'];
                            $seal_no = $ambil['seal_no'];
                            $tare_cont = $ambil['tare_cont'];
                            $date_out = $ambil['date_out'];
                            $time_out = $ambil['time_out'];


                            if ($sample == 'y') {
                              $chek = "<input type='checkbox' name='sample' autocomplete='off' value='y' checked='' ";
                            } else {
                              $chek = "<input type='checkbox' name='sample' autocomplete='off' value='y'";
                            }

                          } 
                          mysqli_close($db);
                        ?>
                        <input type="hidden" value="<?php echo $id; ?>" name="id">
                          <div class="form-group">
                           <label>PO No</label>
                           <input type="text" disabled="" name="po" class="form-control" autocomplete="off" value="<?php echo $po; ?>">
                         </div><!-- /.form-group -->
                         <div class="form-group">
                             <label>Customer</label>
                             <select class="form-control select2" style="width: 100%;" name="custom" disabled="">
                              <option value="<?php echo $id_customer; ?>"><?php echo $customer; ?></option>
                           </select>
                         </div>
                         <div class="form-group">
                             <label>Product</label>
                             <select class="form-control select2" style="width: 100%;" name="prod" disabled="">
                              <option value="<?php echo $id_product; ?>"><?php echo $product; ?></option>
                           </select>
                         </div>
                         <div class="form-group">
                           <label>DO No</label>
                           <input type="text" name="do" class="form-control" autocomplete="off"  value="<?php echo $do; ?>" disabled="">
                         </div>
                         <div class="form-group">
                             <label>Container Vendor</label>
                             <select class="form-control select2" style="width: 100%;" name="conven" disabled="">
                              <option value="<?php echo $id_vendor; ?>"><?php echo $con_vendor; ?></option>
                           </select>
                         </div>
                         <div class="form-group">
                             <label>Container Type</label>
                             <select class="form-control select2" style="width: 100%;" name="contype" disabled="">
                                <option value="<?php echo $id_container; ?>"><?php echo $con_type; ?></option>
                           </select>
                         </div>
                         <div class="form-group">
                            <label>Transporter</label>
                            <select class="form-control select2" style="width: 100%;" name="trans" disabled="">
                              <option value=""><?php echo $trans; ?></option>
                            </select>
                         </div>
                         <div class="form-group">
                           <label>Vessel Name</label>
                           <input type="text" name="visel" class="form-control" autocomplete="off"  value="<?php echo $visel; ?>" disabled="">
                         </div>
                         <div class="form-group">
                           <label>Vessel Closing</label>
                           <input type="text" required="" name="clos" required="" class="form-control" id="datepicker1" value="<?php echo $clos; ?>" disabled="">
                         </div>
                         <div class="form-group">
                           <label>Party</label>
                           <input type="text" name="party" id="banyak_form" class="form-control" autocomplete="off" disabled="" value="<?php echo $party; ?>">
                            <div id="form_tambah">
                              <script type="text/javascript">
                                $(function() {
                                    $(window).load(function() 
                                    {
                                        var jlh=parseInt($("#banyak_form").val()); //inisialisasi banyak form di ambil dari id banya form
                                       // var isi='<label>Blok</label><br><input type="text" name="isi" /> <br/>'; //yang mau di munculin
                                        $("#form_tambah").empty(); // menghapus form yang sudah ada
                                        for (var i = 1; i <= jlh; i++) {
                                            $("#form_tambah").append('<hr><label>DN No.</label><br><input type="text" name="dn'+i+'" class="form-control" autocomplete="off" value="<?php echo $dn_no; ?>" /> <br/> <div class="form-group"><label>Date In</label> <input type="date" value="<?php echo $date_in; ?>" name="date'+i+'"  class="form-control" id="datepicker2" placeholder="Date In"> </div><div class="form-group"><label>Time In</label><input type="time" name="time'+i+'" value="<?php echo $time_in; ?>" class="form-control" placeholder="Time In"></div><div class="form-group"><label>Container No</label><input type="text" name="conno'+i+'" value="<?php echo $con_no; ?>" class="form-control" autocomplete="off"  placeholder="Container No"></div><div class="form-group"><label>Seal No</label><input type="text" name="seal'+i+'" class="form-control" autocomplete="off" value="<?php echo $seal_no; ?>" placeholder="Seal NO"></div> <div class="form-group"><label>Tare Continer</label><input type="text" name="tare'+i+'" class="form-control" autocomplete="off" value="<?php echo $tare_cont; ?>" placeholder="Tare Continer"></div><div class="form-group"><label>Date Out</label><input type="date" name="dout'+i+'" class="form-control" autocomplete="off" value="<?php echo $date_out; ?>" placeholder="Date Out" id="datepicker3"></div><div class="form-group"><label>Time Out</label><input type="time" name="tout'+i+'" class="form-control" autocomplete="off" value="<?php echo $time_out; ?>" placeholder="Time Out"></div>');
                                        };
                                    });
                                });
                              </script>
                            </div>
                         </div>
                         <div class="form-group">
                           <label>Sample</label><br/>
                           <?php echo $chek; ?>
                         </div>
                         <div class="form-group">
                            <label>Status</label>
                            <select class="form-control select2" style="width: 100%;" name="status">
                              <option value="">Pilih Status</option>
                              <option value="ARRIVE"> ARRIVE</option>
                              <option value="MARKING"> MARKING & SEALING</option>
                              <option value="DEPART"> DEPART</option>
                            </select>
                         </div>
                         <div class="form-group">
                            <label>Area</label>
                            <select class="form-control select2" style="width: 100%;" name="area" disabled="">
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