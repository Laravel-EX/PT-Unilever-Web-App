<!-- Main content -->
<section class="content content2">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Laporan</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <form action="include/laporan/excel.php" target="blank">
        <input type="hidden" name="k" value="include/laporan/isi_laporan.php">
        <form action="include/laporan/excel.php" target="_blank">
          <!-- date picker-->
          <!-- form start -->
          <div class="row">
            <div class="col-md-8"> 
              <div class="form-group">
                <label>Date range:</label>
                <div class="input-daterange input-group daterange">
                    <input type="text" class="input-small form-control" name="start"/>
                    <span class="input-group-addon">to</span>
                    <input type="text" class="input-small form-control" name="end"/>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary tambah" name="excel">Lihat Data</button>
              </div> 
            </div>
          </div>
        </form>
      </form>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</section>

<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
     //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
  });
</script>