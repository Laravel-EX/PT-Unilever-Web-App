
<div class="box box-primary box-solid">
 <div class="box-header with-border">
    <h3 class="box-title">
      <i class="fa fa-inbox"></i> Data Continer Vendor
    </h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
 </div><!-- /.box-header -->
 <div class="box-body">
    <div class="nav-tabs-custom">
      <!-- Tabs within a box -->
      <ul class="nav nav-tabs pull-left">
        <li>
          <a href="#sales-chart" data-toggle="tab">Ubah Data Continer Vendor</a>
        </li>
      </ul>
      <div class="tab-content no-padding">
        <!-- Morris chart - Sales -->
        <div class="chart tab-pane" id="sales-chart" style="position: relative;">
          <section class="content">
           <div class="row">
              <div class="col-md-12">
                <div class="col-md-5">
                  <form id="myform" action="?page=con_vendor/con_vendor_epro.php" method="post" enctype="multipart/form-data">
                    <?php
                      include 'include/koneksi.php';
                      $id = $_REQUEST['data'];
                      $sql = "SELECT * FROM con_vendor WHERE id_convendor = '$id' ";
                      $query = mysqli_query($db,$sql);
                      $no=1;
                      while ($ambil = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
                        $id = $ambil['id_convendor'];
                        $convendor = $ambil['convendor'];
                    ?>
                      <input type="hidden" name="id" value="<?php echo $id;?>" >
                     <div class="form-group">
                       <label>Container vendor</label>
                       <input type="text" name="cvendor" class="form-control" autocomplete="off" value="<?php echo $convendor;?>">
                     </div><!-- /.form-group -->
                    <?php } mysqli_close($db); ?>
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

