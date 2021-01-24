
<div class="box box-primary box-solid">
 <div class="box-header with-border">
    <h3 class="box-title">
      <i class="fa fa-inbox"></i> Data tankfarm
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
          <a href="#revenue-chart" data-toggle="tab">Data tankfarm</a>
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
                        <th>Container Vendor</th>
                        <th>Container Type</th>
                        <th>Transporter</th>
                        <th>Vessel Name</th>
                        <th>Vessel Closing</th>
                        <th hidden="">Overnight</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        //echo ;
                         $day1=date("Y-m-d H:i:s");
                        // echo $day1;
                         $time=date("H:i:s");
                        // echo $time;
                        $time2 = strtotime($time); 
                        $no=1;
                        include 'include/koneksi.php';
                        $sql = "SELECT * FROM daftar d, customer c, product p, con_type co,
                        con_vendor con
                        WHERE d.id_customer = c.id_customer
                        AND d.id_product = p.id_product
                        AND d.id_container = co.id_container
                        AND d.id_convendor = con.id_convendor and d.area='tankfarm' ORDER BY id_daftar DESC
                        ";
                        $query = mysqli_query($db,$sql);
                        while ($ambil = mysqli_fetch_array($query)) {
                          $no1++;
                          $id = $ambil['id_daftar'];
                          $po = $ambil['po_no'];
                          $custom = $ambil['nama_customer'];
                          $prod = $ambil['nama_product'];
                          $do = $ambil['dn_no1'];
                          $conven = $ambil['convendor'];
                          $contype = $ambil['container'];
                          $trans = $ambil['transporter'];
                          $visel = $ambil['vessel_name'];
                          $clos = $ambil['vessel_closing'];
                          $status=$ambil['status'];

                          $day2 = $clos;
                          //echo $time_in;
                          //$ok= ($time - $time_in);
                          $ji=$clos." ".$time;
                          // echo $ji;
                          // $over=($time2 - $time1) / 3600;
                          $diff=abs(strtotime($day2) - strtotime($ji));
                          $hourdiff = ((strtotime($day1) - strtotime($ji))/3600);
                          $hours = $hourdiff / 60 /  60;
                          
                          $color = '1';
                          $color1 = '0';
                          if ($color=='1') {
                            $color ='#EC644B';
                          } else if ($color1=='0'){
                            $color1 ='#FFFFFF';
                          }

                        if ($hourdiff>=24) {
                      ?>
                      <tr bgcolor="<?php echo $color; ?>">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $po; ?></td>
                        <td><?php echo $custom; ?></td>
                        <td><?php echo $prod; ?></td>
                        <td><?php echo $do; ?></td>
                        <td><?php echo $conven; ?></td>
                        <td><?php echo $contype; ?></td>
                        <td><?php echo $trans; ?></td>
                        <td><?php echo $visel; ?></td>
                        <td><?php echo $clos; ?></td>
                        <td hidden="">1</td>
                        <td>
                           <a href="?page=tankfarm/lihat.php&p=<?php echo $id; ?>" class="btn btn-warning" id="edit" data-id='$id'>Edit</a>
                          

                        </td>
                      </tr>
                    <?php 
                        } else {
                          echo "
                            <tr bgcolor='#FFFFFF'>
                              <td>$no1</td>
                              <td>$po</td>
                              <td>$custom</td>    
                              <td>$prod</td>
                              <td>$do</td>
                              <td>$conven</td>
                              <td>$contype</td>
                              <td>$trans</td>
                              <td>$visel</td>
                              <td>$clos</td>                     
                              <td hidden=''>0</td>                    
                              <td>
                                 <a href='?page=tankfarm/lihat.php&p=$id' class='btn btn-warning' id='edit' data-id='$id'>Edit</a>
                              </td>
                            </tr>                                                             
                          ";
                        }
                      } 
                      mysqli_close($db); 
                    ?>
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
                       <input type="text" name="party" class="form-control" autocomplete="off"  placeholder="Party">
                     </div>
                     <div class="form-group">
                       <label>DN No</label>
                       <input type="text" name="dn" class="form-control" autocomplete="off"  placeholder="DN No"><br/>
                       <a class="btn btn-success" id="tambah">+</a>
                       <a class="btn btn-warning" id="hapus1">-</a>
                     </div>
                     <div class="form-group">
                       <label>Date In</label>
                       <input type="text" required="" name="date" required="" class="form-control" id="datepicker2" placeholder="Date In">
                     </div>
                     <div class="form-group">
                       <label>Time In</label>
                       <input type="text" name="time" required="" class="form-control" id="" placeholder="Time In">
                     </div>
                     <div class="form-group">
                       <label>Container No</label>
                       <input type="text" name="conno" class="form-control" autocomplete="off"  placeholder="Container No">
                     </div>
                     <div class="form-group">
                       <label>Seal No</label>
                       <input type="text" name="seal" class="form-control" autocomplete="off"  placeholder="Seal NO">
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
                          <option value="tankfarm"> tankfarm</option>
                          <option value="TANKFARM"> TANKFARM</option>
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
