
<div class="box box-primary box-solid">
 <div class="box-header with-border">
    <h3 class="box-title">
      <i class="fa fa-inbox"></i> Data Produk
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
          <a href="#sales-chart" data-toggle="tab">Ubah Data Produk</a>
        </li>
      </ul>
      <div class="tab-content no-padding">
        <!-- Morris chart - Sales -->
        <div class="chart tab-pane" id="sales-chart" style="position: relative;">
          <section class="content">
           <div class="row">
              <div class="col-md-12">
                <div class="col-md-5">
                  <form id="myform" action="?page=produk/produk_epro.php" method="post" enctype="multipart/form-data">
                    <?php
                      include 'include/koneksi.php';
                      $id = $_REQUEST['data'];
                      $sql = "SELECT * FROM product WHERE id_product = '$id' ";
                      $query = mysqli_query($db,$sql);
                      $no=1;
                      while ($ambil = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
                        $id = $ambil['id_product'];
                        $nampro = $ambil['nama_product'];
                    ?>
                      <input type="hidden" name="id" value="<?php echo $id;?>" >
                     <div class="form-group">
                       <label>Nama Produk</label>
                       <input type="text" name="nampro" class="form-control" autocomplete="off" value="<?php echo $nampro;?>">
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

