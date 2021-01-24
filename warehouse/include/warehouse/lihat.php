<?php date_timezone_set('Asia/Jakarta'); ?>
<div class="box box-primary box-solid">
 <div class="box-header with-border">
    <h3 class="box-title">
      <i class="fa fa-inbox"></i> Data Transaksi
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
          <a href="#revenue-chart" data-toggle="tab">Data Transaksi</a>
        </li>
      
      </ul>
      <div class="tab-content no-padding">
        <!-- Morris chart - Sales -->
        <div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
          <section class="content">
           <div class="row">
              <div class="col-md-12">
                <a href="index.php" class="btn btn-primary">Back</a>
                <div class="box-body" style="overflow-x: scroll;">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>DN No</th>
                        <th>Container No</th>
                        <th>Seal No</th>
                        <th>Date In</th>
                        <th>Time In</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=1;
                        include 'include/koneksi.php';
                        $e=$_REQUEST['p'];
                       
                        $sql = "SELECT * FROM daftar d, customer c, product p, con_type co,
                        con_vendor con, transaksi t
                        WHERE d.id_customer = c.id_customer
                        AND d.id_product = p.id_product
                        AND d.id_container = co.id_container
                        AND d.id_convendor = con.id_convendor 
                        AND d.id_daftar=t.id_daftar 
                        AND d.id_daftar='$e' ";
                        $query = mysqli_query($db,$sql);
                        while ($ambil = mysqli_fetch_array($query)) {
                          $idf=$ambil['id_daftar'];
                          $id = $ambil['id_transaksi'];
                          $do = $ambil['dn_no'];
                           $dn = $ambil['dn_no'];
                          $con_no = $ambil['con_no'];
                          $date_in = $ambil['date_in'];
                          $newdate1 = date('d-m-Y', strtotime($date_in));
                          $time_in = $ambil['time_in'];
                          $seal_no = $ambil['seal_no'];
                          $status=$ambil['status'];
                      ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $dn; ?></td>
                        <td><?php echo $con_no; ?></td>
                        <td><?php echo $seal_no; ?></td>
                        <td><?php echo $newdate1; ?></td>
                        <td><?php echo $time_in; ?></td>
                        <td>
                        <?php 

                        $o1="select * from transaksi where id_transaksi='$id' and selesai_tgl!='0000-00-00'";
                        $pa1=mysqli_query($db,$o1);
                        $wq1=mysqli_fetch_array($pa1);

                      if($wq1<1)
                      {


                        $o="select * from transaksi where id_transaksi='$id' and terima_tgl!='0000-00-00'";
                        $pa=mysqli_query($db,$o);
                        $wq=mysqli_fetch_array($pa);

                        if($wq<=1)
                        {

                         ?>
                           <a href="?page=warehouse/terima_proses.php&p=<?php echo $id; ?>&r=<?php echo $idf; ?>" class="btn btn-primary" id="edit" data-id='$id'>LOAD</a>
                           <?php  }
                           else 
                           { ?>
                          <a href="?page=warehouse/selesai_proses.php&p=<?php echo $id; ?>&r=<?php echo $idf; ?>" class="btn btn-warning" id="edit" data-id='$id'>FULL</a>
                          <?php

                           }
                      }
                      else
                      {
                        echo "DONE LOADING";
                      }
                      ?>
                      
                            <a href="?page=warehouse/selesai_proses.php&p=<?php echo $id; ?>" class="btn btn-warning" id="Cetak" data-id='$id'>Batch</a>
                          
                          
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
                <div class="col-md-5">
                  <form id="myform" action="?page=daftar/daftar_proses.php" method="post" enctype="multipart/form-data">
                     <div class="form-group">
                       <label>PO No</label>
                       <input type="text" name="po" class="form-control" autocomplete="off"  placeholder="PO No">
                     </div><!-- /.form-group -->
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
                       <input type="text" required="" name="clos" required="" class="form-control" id="datepicker1" placeholder="Vessel Closing">
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
                                        $("#form_tambah").append('<hr><label>DN No.</label><br><input type="text" name="dn'+i+'" class="form-control"   autocomplete="off" /> <br/> <div class="form-group">         <label>Date In</label> <input type="date"  name="date'+i+'"  class="form-control" placeholder="Date In"> </div><div class="form-group"><label>Time In</label><input type="time" name="time'+i+'"  class="form-control" placeholder="Time In"></div><div class="form-group"><label>Container No</label><input type="text" name="conno'+i+'" class="form-control" autocomplete="off"  placeholder="Container No"></div><div class="form-group"><label>Seal No</label><input type="text" name="seal'+i+'" class="form-control" autocomplete="off"  placeholder="Seal NO"></div> <div class="form-group"><label>Tare Continer</label><input type="text" name="tare'+i+'" class="form-control" autocomplete="off"  placeholder="Tare Continer"></div><div class="form-group"><label>Date Out</label><input type="date" name="dout'+i+'" class="form-control" autocomplete="off" placeholder="Date Out"></div><div class="form-group"><label>Time Out</label><input type="time" name="tout'+i+'" class="form-control" autocomplete="off"  placeholder="Time Out"></div><div class="form-group"><label>Nett Weight</label><input type="input" name="nett'+i+'" class="form-control" autocomplete="off"  placeholder="Nett Weight"></div><div class="form-group"><label>Gambar</label><input type="file" name="gambar'+i+'" class="form-control" autocomplete="off"></div>');
                                    };

                                    // $("#datepicker2").datepicker({
                                    //   autoclose:true,
                                    //   todayHighlight:true,
                                    //   format: 'yyyy-mm-dd',
                                    // });
                                });
                            });
                          </script>
                        </div>
                     </div>
                     <div class="form-group">
                       <label>Sample</label><br/>
                       <input type="checkbox" name="sample" autocomplete="off"  value="y">
                     </div>
                     <div class="form-group">
                       <label>Tare Continer</label>
                       <input type="text" name="tare" class="form-control" autocomplete="off"  placeholder="Tare Continer">
                     </div>
                     <div class="form-group">
                       <label>Date Out</label>
                       <input type="text" name="dout" class="form-control" autocomplete="off"  placeholder="Date Out" id="datepicker4">
                     </div>
                     <div class="form-group">
                       <label>Time Out</label>
                       <input type="text" name="tout" class="form-control" autocomplete="off"  placeholder="Time Out" id="datepicker5">
                     </div>
                     <div class="form-group">
                        <label>Status</label>
                        <select class="form-control select2" style="width: 100%;" name="status">
                          <option value="">Pilih Transporter</option>
                          <option value="ARRIVE"> ARRIVE</option>
                          <option value="LOADING"> LOADING</option>
                          <option value="QUILITY CHECK"> QUILITY CHECK</option>
                          <option value="MARKING & SEALING"> MARKING & SEALING</option>
                          <option value="DEPART"> DEPART</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Area</label>
                        <select class="form-control select2" style="width: 100%;" name="area">
                          <option value="">Pilih Transporter</option>
                          <option value="WAREHOUSE"> WAREHOUSE</option>
                          <option value="warehouse"> warehouse</option>
                        </select>
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

<script type="text/javascript">
$(document).ready(function(){
  $("#hapus").click(function(){
    if (!confirm("Yakin ingin menghapus data?")){
      return false;
    }
  });
});
</script>
