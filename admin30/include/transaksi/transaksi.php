<?php
  $start=$_REQUEST['start'];
  $end=$_REQUEST['end'];
  $disable="";
  if (!isset($start) && !isset($end)) {
      $disable="disabled";
  }
?>
<div class="box box-primary box-solid">
 <div class="box-header with-border">
    <h3 class="box-title">
      <i class="fa fa-inbox"></i> Laporan Transaksi
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
          <a href="#revenue-chart" data-toggle="tab">Laporan Transaksi</a>
        </li>
      </ul>
      <div class="tab-content no-padding">
        <!-- Morris chart - Sales -->
        <div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
          <section class="content">
           <div class="row">
              <div class="col-md-12">
                <div class="box-body" style="overflow-x: scroll;">
                   <form action="include/transaksi/isi_transaksi.php">
                      <!-- date picker-->
                      <div class="form-group">
                          <label>Date range:</label>
                          <div class="input-daterange input-group col-xs-4">
                              <input type="text" class="input-small form-control daterange" name="start"/>
                              <span class="input-group-addon">to</span>
                              <input type="text" class="input-small form-control daterange" name="end"/>
                          </div>
                      </div><!-- /.form group -->
                      <div class="form-group">
                          <div class="input-group col-xs-4">
                            <button type="submit" class="btn btn-default">Lihat</button>
                          </div>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="chart tab-pane" id="sales-chart" style="position: relative;">

        </div>
      </div>
    </div><!-- /.nav-tabs-custom -->
 </div><!-- /.box-body -->
</div><!-- /.box -->



