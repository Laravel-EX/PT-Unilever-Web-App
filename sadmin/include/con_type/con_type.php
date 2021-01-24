
<div class="box box-primary box-solid">
 <div class="box-header with-border">
    <h3 class="box-title">
      <i class="fa fa-inbox"></i> Data Continer Type
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
          <a href="#revenue-chart" data-toggle="tab">Data Continer Type</a>
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
                        <th>Container Type</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    	<?php
                    		include 'include/koneksi.php';
                    		$sql = "SELECT * FROM con_type";
                    		$query = mysqli_query($db,$sql);
                    		$no=1;
                    		while ($ambil = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
                    			$id = $ambil['id_container'];
                    			$container = $ambil['container'];
                    	?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $container; ?></td>
							<td>
								<a href="?page=con_type/con_edit.php&data=<?php echo $id; ?>" class="btn btn-primary" id="edit" data-id='$id'>Edit</a>

								<a href="?page=con_type/con_del.php&data=<?php echo $id; ?>" class="btn btn-warning" id="hapus">Delete</a>
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
                  <form id="myform" action="?page=con_type/con_proses.php" method="post" enctype="multipart/form-data">
                     <div class="form-group">
                       <label>Container Type</label>
                       <input type="text" name="ctype" class="form-control" autocomplete="off"  placeholder="Container Type">
                     </div><!-- /.form-group -->
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

