
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
                <div class="box-body" style="overflow-x: scroll;">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>DN No</th>
                        <th>Tanggal Masuk</th>
                        <th>Jam Masuk</th>
                        <th>Tanggal Terima</th>
                        <th>Waktu Terima</th>
                        <th>Tanggal Selesai</th>
                        <th>Waktu Selesai</th>
                        <th>Tanggal QR</th>
                        <th>Waktu QR</th>
                        <th>Tanggal Keluar</th>
                        <th>Jam Keluar</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=1;
                        include 'include/koneksi.php';
                        $trans = $_REQUEST['trans'];
                        $sql = "SELECT * FROM transaksi WHERE id_daftar = '$trans' ";
                        $query = mysqli_query($db,$sql);
                        while ($ambil = mysqli_fetch_array($query)) {
                          $id = $ambil['id_transaksi'];
                          $dno = $ambil['dn_no'];
                          $Tgl_trim = $ambil['terima_tgl'];
                          $Tgl_sele = $ambil['terima_time'];
                          $date_in = $ambil['date_in'];
                          $time_in = $ambil['time_in'];
                          $date_out = $ambil['date_out'];
                          $time_out = $ambil['time_out'];
                          $selesai_tgl = $ambil['selesai_tgl'];
                          $sample_tgl = $ambil['sample_tgl'];
                          $sample_time = $ambil['sample_time'];
                          $selesai_time = $ambil['selesai_time'];
                          
                          echo "
                            <tr>
                              <td>$no</td>
                              <td>$dno</td>

                              <td>$date_in</td>

                              <td>$time_in</td>
                              <td>$Tgl_trim</td>
                              <td>$Tgl_sele</td>
                              <td>$selesai_tgl</td>
                              <td>$selesai_time</td>

                              <td>$sample_tgl</td>
                              <td>$sample_time</td>
                              <td>$date_out</td>

                              <td>$time_out</td>
                              <td>
                                 <a href='?page=daftar/trans_edit.php&p=$id' class='btn btn-primary' id='edit' data-id='$id'>Edit</a>

                                 <a href='#' class='btn btn-warning' id='hapus'>Delete</a>
                              </td>
                            </tr>
                          ";
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

        </div>
      </div>
    </div><!-- /.nav-tabs-custom -->
 </div><!-- /.box-body -->
</div><!-- /.box -->



