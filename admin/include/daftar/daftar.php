<?php session_start();
$id_user=$_SESSION['id_user'];
 ?>
<div class="box box-primary box-solid">
 <div class="box-header with-border">
    <h3 class="box-title">
      <i class="fa fa-inbox"></i> Data Customer
    </h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
 </div><!-- /.box-header -->
 <div class="box-body">
    <div class="nav-tabs-custom">
      <!-- Tabs within a box -->
      <ul class="nav nav-tabs pull-left">
        <li class="active">
          <a href="#revenue-chart" data-toggle="tab">Data Customer</a>
        </li>
        <li>
          <a href="#sales-chart" data-toggle="tab">Tambah Customer Baru</a>
        </li>
      </ul>
      <div class="tab-content no-padding">
        <!-- Morris chart - Sales -->
        <div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
          <section class="content">
           <div class="row">
              <div class="col-md-12">
                <div class="box-body" style="overflow-x: scroll;">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Po</th>
                        <th>Customer</th>
                        <th>Product</th>
                        <th>DO No</th>
                        <th>Party</th>
                        <th>Container Vendor</th>
                        <th>Container Type</th>
                        <th>Vessel Name</th>
                        <th>Vessel Closing</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=1;
                        include 'include/koneksi.php';
                        $sql = "SELECT * FROM daftar INNER JOIN transaksi ON daftar.id_daftar = transaksi.id_daftar INNER JOIN con_vendor ON daftar.id_convendor=con_vendor.id_convendor INNER JOIN con_type ON daftar.id_container=con_type.id_container INNER JOIN customer ON daftar.id_customer=customer.id_customer INNER JOIN product ON daftar.id_product=product.id_product order by daftar.id_daftar DESC";

                        $query = mysqli_query($db,$sql);
                        while ($ambil = mysqli_fetch_array($query)) {
                          $id = $ambil['id_daftar'];
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
                          $img = $ambil['gambar'];
                          $newdate1 = date('d-m-Y', strtotime($clos));
                      ?>
                      <tr>
                        <td><a title="Lihat Transaksi" href="?page=daftar/transaksi1.php&trans=<?php echo $id; ?>"><?php echo $no++; ?></a></td>
                        <td><a title="Lihat Transaksi" href="?page=daftar/transaksi1.php&trans=<?php echo $id; ?>"><?php echo $po; ?></a></td>
                        <td><a title="Lihat Transaksi" href="?page=daftar/transaksi1.php&trans=<?php echo $id; ?>"><?php echo $custom; ?></a></td>
                        <td><a title="Lihat Transaksi" href="?page=daftar/transaksi1.php&trans=<?php echo $id; ?>"><?php echo $prod; ?></a></td>
                        <td><a title="Lihat Transaksi" href="?page=daftar/transaksi1.php&trans=<?php echo $id; ?>"><?php echo $do; ?></a></td>
                        <td><a title="Lihat Transaksi" href="?page=daftar/transaksi1.php&trans=<?php echo $id; ?>"><?php echo $party; ?></a></td>
                        <td><a title="Lihat Transaksi" href="?page=daftar/transaksi1.php&trans=<?php echo $id; ?>"><?php echo $contype; ?></a></td>
                        <td><a title="Lihat Transaksi" href="?page=daftar/transaksi1.php&trans=<?php echo $id; ?>"><?php echo $trans; ?></a></td>
                        <td><a title="Lihat Transaksi" href="?page=daftar/transaksi1.php&trans=<?php echo $id; ?>"><?php echo $clos; ?></a></td>
                        <td><a title="Lihat Transaksi" href="?page=daftar/transaksi1.php&trans=<?php echo $id; ?>"><?php echo $newdate1; ?></a></td>

                        <td>
                           <a href="?page=daftar/daftar_edit.php&p=<?php echo $id; ?>" class="btn btn-primary" id="edit" data-id='$id'>Edit</a>

                           <a href="#" class="btn btn-warning" id="hapus">Delete</a>
                           <a href="#myModal" class="btn btn-success modal1" data-toggle="modal" data-target="#myModal" data-id="<?php echo $id; ?>">Cek Cetak</a>
                        </td>
                      </tr>
                    <?php } mysqli_close($db); ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
           </div>
          </section>
        </div>
        <div class="chart tab-pane" id="sales-chart" style="position: relative;">
          <section class="content">
           <div class="row">
              <div class="col-md-12">
                <div class="col-md-12">
                  <form id="myform" action="?page=daftar/daftar_proses.php" method="post" enctype="multipart/form-data">
                     <div class="form-group">
                       <label>PO No</label>
                       <input type="text" name="po" class="form-control" autocomplete="off"  placeholder="PO No">
                     </div><!-- /.form-group -->
                     <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                     <div class="form-group">
                         <label>Customer</label>
                         <select class="form-control select2" style="width: 100%;" name="custom">
                         <option value="">Pilih Customer</option>
                          <?php
                            include 'include/koneksi.php';
                            $dml = mysqli_query($db,"SELECT * FROM customer");
                            while ($cek1 = mysqli_fetch_array($dml)) {
                               $customer = $cek1['nama_customer'];
                               $id_customer = $cek1['id_customer'];
                          ?>
                            <option value="<?php echo $id_customer; ?>"><?php echo $customer; ?></option>
                          <?php } mysqli_close($db) ?>
                       </select>
                     </div>
                     <div class="form-group">
                         <label>Product</label>
                         <select class="form-control select2" style="width: 100%;" name="prod">
                         <option value="">Pilih Product</option>
                          <?php
                            include 'include/koneksi.php';
                            $dml = mysqli_query($db,"SELECT * FROM product");
                            while ($cek2 = mysqli_fetch_array($dml)) {
                               $product = $cek2['nama_product'];
                               $id_product = $cek2['id_product'];
                          ?>
                            <option value="<?php echo $id_product; ?>"><?php echo $product; ?></option>
                          <?php } mysqli_close($db) ?>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>DO No</label>
                       <input type="text" name="do" class="form-control" autocomplete="off"  placeholder="DO No">
                     </div>
                     <div class="form-group">
                         <label>Container Vendor</label>
                         <select class="form-control select2" style="width: 100%;" name="conven">
                         <option value="">Pilih Container Vendor</option>
                          <?php
                            include 'include/koneksi.php';
                            $dml = mysqli_query($db,"SELECT * FROM con_vendor");
                            while ($cek3 = mysqli_fetch_array($dml)) {
                               $con_vendor = $cek3['convendor'];
                               $id_vendor = $cek3['id_convendor'];
                          ?>
                            <option value="<?php echo $id_vendor; ?>"><?php echo $con_vendor; ?></option>
                          <?php } mysqli_close($db) ?>
                       </select>
                     </div>
                     <div class="form-group">
                         <label>Container Type</label>
                         <select class="form-control select2" style="width: 100%;" name="contype">
                         <option value="">Pilih Container Type</option>
                          <?php
                            include 'include/koneksi.php';
                            $dml = mysqli_query($db,"SELECT * FROM con_type");
                            while ($cek4 = mysqli_fetch_array($dml)) {
                               $con_type = $cek4['container'];
                               $id_container = $cek4['id_container'];
                          ?>
                            <option value="<?php echo $id_container; ?>"><?php echo $con_type; ?></option>
                          <?php } mysqli_close($db) ?>
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
                       <input type="text" name="visel" class="form-control" autocomplete="off"  placeholder="Vessel Name">
                     </div>
                     <div class="form-group">
                       <label>Vessel Closing</label>
                       <input type="date"  name="clos"  class="form-control" placeholder="Vessel Closing">
                     </div>
                     <div class="form-group">
                       <label>Party</label>
                       <input type="text" id="banyak_form" name="party" class="form-control"   autocomplete="off"  placeholder="Party">
                        <div id="form_tambah">
                          <script type="text/javascript">
                            $(function() {
                                $("#banyak_form").keyup(function()
                                {
                                    var jlh=parseInt($("#banyak_form").val()); //inisialisasi banyak form di ambil dari id banya form
                                   // var isi='<label>Blok</label><br><input type="text" name="isi" /> <br/>'; //yang mau di munculin
                                    $("#form_tambah").empty(); // menghapus form yang sudah ada
                                    for (var i = 1; i <= jlh; i++) {
                                        $("#form_tambah").append('<hr><label>DN No.</label><br><input type="text" name="dn'+i+'" class="form-control"   autocomplete="off" /> <br/> <div class="form-group"><label>Container No</label><input type="text" name="conno'+i+'" class="form-control" autocomplete="off"  placeholder="Container No"></div><div class="form-group"><label>Seal No</label><input type="text" name="seal'+i+'" class="form-control" autocomplete="off"  placeholder="Seal NO"></div> <div class="form-group"><label>Tare Continer</label><input type="text" name="tare'+i+'" class="form-control" autocomplete="off"  placeholder="Tare Continer"></div><div class="form-group"><label>Nett Weight</label><input type="input" name="nett'+i+'" class="form-control" autocomplete="off"  placeholder="Nett Weight"></div><div class="form-group"><label>Sample</label><br/><input type="checkbox" name="sample'+i+'" autocomplete="off"  value="y"></div><div class="form-group"> <label>Status</label><select class="form-control select2" style="width: 100%;" name="status'+i+'"><option value="">Pilih Status</option><option value="ARRIVE"> ARRIVE</option><option value="MARKING"> MARKING & SEALING</option><option value="DEPART"> DEPART</option></select></div>');
                                    };
                                });
                            });
                          </script>
                        </div>
                     </div>
                     <div class="form-group">
                        <label>Area</label>
                        <select class="form-control select2" style="width: 100%;" name="area">
                          <option value="">Pilih Transporter</option>
                          <option value="WAREHOUSE"> WAREHOUSE</option>
                          <option value="TANKFARM"> TANKFARM</option>
                        </select>
                     </div>

                     <div class="form-group">
                       <input type="file" name="gambar" autocomplete="off">
                     </div>

                     <input id="simpan" type="submit" value="Simpan" class="btn btn-primary">
                  </form>
                </div>
              </div>
           </div>
          </section>
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
        <h4 class="modal-title" id="myModalLabel">Cek Laporan</h4>
      </div>
      <div class="modal-body">
        <div id="hasil">Silahkan klick halaman ini untuk menampilkan data</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('#myModal').click(function(){
      var idx = $(".modal1").data('id');

      $.ajax({
        type: "POST",
        url:'include/daftar/cek_cetak.php',
        data: 'idx='+ idx,
        success: function(data){
          //alert(data);
          $("#hasil").html(data);
          //$("#myModal").modal('hide');
        },
        error: function(){
          alert("failure");
        }
      });

    });
  });
</script>
