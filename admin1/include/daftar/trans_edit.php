
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
                      <form id="myform" action="?page=daftar/pro_trans_edit.php" method="post" enctype="multipart/form-data">
                         <?php
                           include 'include/koneksi.php';
                            $id = $_REQUEST['p'];
                            $mysql = "SELECT * FROM transaksi t WHERE id_transaksi='$id' ";
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
                          <input type="hidden" name="id" value="<?php echo $id1; ?>">
                          <div class="form-group">
                             <label>DN No.</label>
                             <input type="text" name="dn" class="form-control" autocomplete="off" value="<?php echo $dn_no; ?>" />
                          </div>
                          <div class="form-group">
                             <label>Date In</label>
                              <input disabled="" type="date" value="<?php echo $date_in; ?>" name="date"  class="form-control" id="datepicker2" placeholder="Date In">
                           </div>
                           <div class="form-group">
                              <label>Time In</label>
                              <input disabled="" type="time" name="time" value="<?php echo $time_in; ?>" class="form-control" placeholder="Time In">
                           </div>
                           <div class="form-group">
                              <label>Container No</label>
                              <input disabled="" type="text" name="conno" value="<?php echo $con_no; ?>" class="form-control" autocomplete="off"  placeholder="Container No">
                           </div>
                           <div class="form-group">
                              <label>Seal No</label>
                              <input disabled="" type="text" name="seal" class="form-control" autocomplete="off" value="<?php echo $seal_no; ?>" placeholder="Seal NO">
                           </div>
                           <div class="form-group">
                              <label>Tare Continer</label>
                              <input disabled="" type="text" name="tare" class="form-control" autocomplete="off" value="<?php echo $tare_cont; ?>" placeholder="Tare Continer">
                           </div>
                           <div class="form-group">
                              <label>Date Out</label>
                              <input disabled="" type="date" name="dout" class="form-control" autocomplete="off" value="<?php echo $date_out; ?>" placeholder="Date Out" id="datepicker3">
                           </div>
                           <div class="form-group">
                              <label>Time Out</label>
                              <input disabled="" type="time" name="tout" class="form-control" autocomplete="off" value="<?php echo $time_out; ?>" placeholder="Time Out">
                           </div>
                           <div class="form-group">
                              <label>Sample</label>
                              <br/><?php echo $chek; ?>
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
                         <!-- <div class="form-group">
                            <label>Area</label>
                            <select class="form-control select2" style="width: 100%;" name="area" disabled="">
                              <option value="<?php echo $area; ?>"><?php echo $area; ?></option>
                            </select>
                         </div> -->
                         <input id="simpan" type="submit" value="Simpan" class="btn btn-primary">
                      </form>
                    <?php } ?>
                    </div><!-- /.box-body -->
                  </div>
                </div>
              </section>
            </div>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div><!-- /.row (main row) -->
