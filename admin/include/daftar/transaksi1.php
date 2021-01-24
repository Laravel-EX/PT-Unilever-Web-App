<?php date_default_timezone_set("Asia/Jakarta"); ?>
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
                        <th>Date In</th>
                        <th>Time In</th>
                        <th>Container No</th>
                        <th>Seal No</th>
                        <th>Tare Container</th>
                        <th>Nett Weight</th>
                        <th>Sample</th>
                        <th>Status</th>
                        <th>Overnight</th>
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
                        $trans = $_REQUEST['trans'];
                        $sql = "SELECT * FROM transaksi RIGHT JOIN daftar ON transaksi.id_daftar=daftar.id_daftar WHERE transaksi.id_daftar='$trans' ";
                        $query = mysqli_query($db,$sql);

                        while ($ambil = mysqli_fetch_array($query)) {
                          $id1 = $ambil['id_transaksi'];
                          $id2 = $ambil['id_daftar'];
                          $dno = $ambil['dn_no'];
                          $date_in = $ambil['date_in'];
                          $terima_tgl = $ambil['terima_tgl'];
                          $terima_time = $ambil['terima_time'];
                          $selesai_tgl = $ambil['selesai_tgl'];
                          $selesai_time = $ambil['selesai_time'];
                          $stat=$ambil['status'];
                          $sample=$ambil['sample'];


                          if($date_in!="0000-00-00")
                          {
                            $newdate1 = date('d-m-Y', strtotime($date_in));
                          }
                          else
                          {
                            $newdate1="0000-00-00";
                          }

                          if($stat=="ARRIVE")
                          {


                              if($terima_tgl!="0000-00-00" and $selesai_tgl=="0000-00-00")
                              {
                                $status_data="Load";
                              }
                              elseif($terima_tgl!="0000-00-00" and $selesai_tgl!="0000-00-00")
                              {
                                $status_data="Finish";
                              }
                              else
                              {
                                $status_data="New";
                              }
                          }
                          elseif($stat="MARKING")
                          {
                            $status_data="MARKING";
                          }
                          elseif($stat=="DEPART")
                          {
                            $status_data="DEPART";
                          }


                          $time_in = $ambil['time_in'];
                          $con_no = $ambil['con_no'];
                          $seal_no = $ambil['seal_no'];
                          $nett = $ambil['nett_wight'];
                          $tare_cont = $ambil['tare_cont'];
                          $time1 = strtotime($time_in);
                          $day2 = $date_in;
                          //echo $time_in;
                          $ok= ($time - $time_in);
                          $ji=$date_in." ".$time_in;
                          // echo $ji;
                          // $over=($time2 - $time1) / 3600;
                          $diff=abs(strtotime($day2) - strtotime($ji));
                          $hourdiff = ((strtotime($day1) - strtotime($ji))/3600);
                          $hours = $hourdiff / 60 /  60;

                          //echo $hourdiff;



                          $color = '1';
                          $color1 = '0';
                          if ($color=='1') {
                            $color ='#EC644B';
                          } else if ($color1=='0'){
                            $color1 ='#FFFFFF';
                          }

                          if($hourdiff>=24)
                          {
                            echo "
                            <tr bgcolor='$color'>
                              <td>$no</td>
                              <td>$dno</td>
                              <td>$newdate1</td>
                              <td>$time_in</td>
                              <td>$con_no</td>
                              <td>$seal_no</td>
                              <td>$tare_cont</td>
                              <td>$nett</td>
                              <td>$sample</td>
                              <td>$status_data</td>
                              <td>1</td>
                              <td>
                                 <a href='?page=daftar/trans_edit.php&p=$id1' class='btn btn-primary' id='edit' data-id='$id1'>Edit</a>
                                 <a href='include/daftar/cetak/print_laporanjual.php?p=$id1' class='btn btn-warning' id='edit' data-id='$id1' target='blank'>VCF</a>
                              </td>
                            ";
                          }
                          else
                          {
                            echo "
                            <tr bgcolor='#FFFFFF'>
                              <td>$no</td>
                              <td>$dno</td>
                              <td>$newdate1</td>
                              <td>$time_in</td>
                              <td>$con_no</td>
                              <td>$seal_no</td>
                              <td>$tare_cont</td>
                              <td>$nett</td>
                              <td>$sample</td>
                              <td>$status_data</td>
                              <td>0</td>
                              <td>
                                 <a href='?page=daftar/trans_edit.php&p=$id1' class='btn btn-primary' id='edit' data-id='$id1'>Edit</a>
                                 <a href='include/daftar/cetak/print_laporanjual.php?p=$id1' class='btn btn-warning' id='edit' data-id='$id1' target='blank'>VCF</a>
                              </td>
                            ";
                          }
                          echo " </tr>";
                          $no++;
                        }
                         mysqli_close($db);
                      ?>
                    </tbody>
                  </table>

                   <a href='?page=laporan/laporan1.php&p=<?php echo $trans ?>' class='btn btn-primary' id='edit' data-id='<?php echo $trans ?>'>Permohonan Pemeriksaan</a>

                   <a href='?page=laporan/laporan2.php&p=<?php echo $trans ?>' class='btn btn-primary' id='edit' data-id='<?php echo $trans ?>'>VGM Certificate</a>

                     <a href='?page=laporan/laporan3.php&p=<?php echo $trans ?>' class='btn btn-primary' id='edit' data-id='$id1' >Shipping Instruction</a>


                   <a href='?page=laporan/laporan4.php&p=<?php echo $trans ?>' class='btn btn-primary' id='edit' data-id='<?php echo $trans ?>'>LETTER OF INDEMNITY</a>

                    <a href='?page=laporan/laporan5.php&p=<?php echo $trans ?>' class='btn btn-primary' id='edit' data-id='$id1' >DANGEROUS GOODS DECLARE</a>
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
