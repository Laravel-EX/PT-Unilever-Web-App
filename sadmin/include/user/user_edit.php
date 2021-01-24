
<div class="box box-primary box-solid">
 <div class="box-header with-border">
    <h3 class="box-title">
      <i class="fa fa-inbox"></i> Data user
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
          <a href="#sales-chart" data-toggle="tab">Ubah Data user</a>
        </li>
      </ul>
      <div class="tab-content no-padding">
        <!-- Morris chart - Sales -->
        <div class="chart tab-pane" id="sales-chart" style="position: relative;">
          <section class="content">
           <div class="row">
              <div class="col-md-12">
                <div class="col-md-5">
                  <form id="myform" action="?page=user/user_epro.php" method="post" enctype="multipart/form-data">
                    <?php
                      include 'include/koneksi.php';
                      $id = $_REQUEST['data'];
                      $sql = "SELECT * FROM user WHERE id_user = '$id' ";
                      $query = mysqli_query($db,$sql);
                      $no=1;
                      while ($ambil = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
                        $id = $ambil['id_user'];
                        $user = $ambil['username'];
                        $pass = $ambil['password'];
                    ?>
                      <input type="hidden" name="id" value="<?php echo $id;?>" >
                     <div class="form-group">
                       <label>Username</label>
                       <input type="text" name="user" class="form-control" autocomplete="off" value="<?php echo $user;?>">
                     </div><!-- /.form-group -->
                     <div class="form-group">
                       <label>Password</label>
                       <input type="password" name="pass" id="pass" class="form-control" autocomplete="off" value="<?php echo $pass;?>">
                     </div><!-- /.form-group -->
                     <div class="form-group">
                       <input type="checkbox" id="cek" autocomplete="off"> Show Password
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

<script type="text/javascript">
  $(document).ready(function(){
    $('#cek').click(function() {
      if($(this).is(':checked')){
        $('#pass').attr('type','text');
      } else {
        $('#pass').attr('type','password');
      }
    });
  });
</script>