<link rel="stylesheet" type="text/css" href="print.css">
<?php 
date_default_timezone_set("Asia/Jakarta");
  include '../../koneksi.php';
  $jenispin=$_REQUEST['jenispin'];
if($jenispin=="pfaktur")
{
	 $pfaktur=$_REQUEST['pfaktur'];
?>
	 <div class="box-body">
    <h3 class="text">FORM penjualan ORDERAN SULTAN BATIK</h3>
    <h4 class="text">EX.PURNAMA RAYA</h4>
    <h5 class="text">MEDAN</h5>
    <hr>
    <?php  $sql = mysqli_query($db,"SELECT * FROM penjualan  INNER JOIN ekspedisi ON penjualan.id_ekspedisi = ekspedisi.id_ekspedisi INNER JOIN data_penjualan ON penjualan.nofakturjual = data_penjualan.nofakturjual INNER JOIN data_barang ON data_penjualan.id_barang = data_barang.id_barang INNER JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan WHERE penjualan.nofakturjual='$pfaktur'");
           $io=mysqli_fetch_array($sql);
           ?>
    <p class="text1">No Order : <?php echo $io['nofakturjual']; ?> </p> 
    <p class="text1">Tanggal Order : <?php echo $io['tgl_fakturjual']; ?></p>
    <p class="text1">Nama Pelanggan : <?php echo $io['nama_pelanggan']; ?></p>
    <p class="text1">Resi : <?php echo $io['resijual']; ?></p>
    <p class="text1">Tipe Pembayaran : <?php echo $io['pembayaranjual']; ?></p>
    <table border="1">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Barang</th>
          <th>Jumlah Barang</th>
          <th>Harga Barang</th>
          <th>Total</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php
         
          $start=date('Y-m-d',strtotime($_REQUEST['start']));
          $end=date('Y-m-d',strtotime($_REQUEST['end']));
          // $jenipin = $_REQUEST['jenpi'];
          // $jenis = ucfirst($jenipin);
          $no=1;
          

           $no=1;

           $sql1 = mysqli_query($db,"SELECT * FROM data_penjualan INNER JOIN data_barang ON data_penjualan.id_barang = data_barang.id_barang WHERE data_penjualan.nofakturjual='$pfaktur'");
           while ($ambil = mysqli_fetch_array($sql1)) {
           $nabar = $ambil['nama_bar'];
           $harga = $ambil['hargajual'];
           $jumlah = $ambil['jumlahjual'];          
        ?>
           <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $nabar; ?></td>
              <td><?php echo $jumlah; ?></td>
              <td><?php echo $harga; ?></td>
              <td><?php echo "-"; ?></td>
              <td><?php echo "-"; ?></td>
           </tr>
        <?php } ?>
            <tr>
              <th colspan="2" align="center">Total</th>
              <th align="center">0</th>
              <th></th>
              <th align="center">0</th>
              <th></th>
            </tr>
      </tbody>
    </table>
    <p class="text1">
      NB : - Apabila ada barang baru, mohon di kirim maksimal 5 pcs sebagai siample.
    </p>
    <p class="text1">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Mohon di buat jumlah barang dan nama barang di goni / bal-balan barang.
    </p>
    <p>Dibuat oleh,</p><br/><br/><br/><br/>
    <p class="text1">KHALIFAH</p>
  </div><!-- /.box-body -->

<?php
}
elseif($jenispin=="barang")
{
	 $nabar=$_REQUEST['barang'];

?>
<div class="box-body">
    <h3 class="text">FORM penjualan ORDERAN SULTAN BATIK BERDASARKAN BARANG</h3>
    <h4 class="text">EX.PURNAMA RAYA</h4>
    <h5 class="text">MEDAN</h5>
    <hr>
    
    <table border="1">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal Masuk</th>
          <th>No. Faktur</th>
          <th>Nama Barang</th>
          <th>Nama pelanggan</th>
          <th>Jumlah Barang</th>
          <th>Harga Barang</th>
          <th>Total</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php
          
          $no=1;
           $sql1 = mysqli_query($db,"SELECT * FROM penjualan  INNER JOIN ekspedisi ON penjualan.id_ekspedisi = ekspedisi.id_ekspedisi INNER JOIN data_penjualan ON penjualan.nofakturjual = data_penjualan.nofakturjual INNER JOIN data_barang ON data_penjualan.id_barang = data_barang.id_barang INNER JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan WHERE data_barang.id_barang='$nabar' group by penjualan.id_penjualan");
         
           while ($ambil = mysqli_fetch_array($sql1)) {
           $nabar = $ambil['nama_bar'];
           $harga = $ambil['hargajual'];
            $nofakturjual = $ambil['nofakturjual'];
             
              $nama_pelanggan = $ambil['nama_pelanggan'];
               $tgl_masuk = $ambil['tgl_fakturjual'];
           $jumlah = $ambil['jumlahjual'];          
        ?>
           <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $tgl_masuk; ?></td>
              <td><?php echo $nofakturjual; ?></td>
              <td><?php echo $nabar; ?></td>
              <td><?php echo $nama_pelanggan; ?></td>
              <td><?php echo $jumlah; ?></td>
              <td><?php echo $harga; ?></td>
              <td><?php echo "-"; ?></td>
              <td><?php echo "-"; ?></td>
           </tr>
        <?php } ?>
            <tr>
              <th colspan="2" align="center">Total</th>
              <th align="center">0</th>
              <th></th>
              <th align="center">0</th>
              <th></th>
            </tr>
      </tbody>
    </table>
    <p class="text1">
      NB : - Apabila ada barang baru, mohon di kirim maksimal 5 pcs sebagai siample.
    </p>
    <p class="text1">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Mohon di buat jumlah barang dan nama barang di goni / bal-balan barang.
    </p>
    <p>Dibuat oleh,</p><br/><br/><br/><br/>
    <p class="text1">KHALIFAH</p>
  </div><!-- /.box-body -->
<?php

}
elseif($jenispin=="periode")
{
	$start=date('Y-m-d',strtotime($_REQUEST['start']));
  $end=date('Y-m-d',strtotime($_REQUEST['end']));
?>

<div class="box-body">
    <h3 class="text">FORM PURCHASING ORDERAN SULTAN BATIK</h3>
    <h4 class="text">EX.PURNAMA RAYA</h4>
    <h5 class="text">MEDAN</h5>
    <hr>
    <p class="text1">No PO : </p> 
    <p class="text1">Tanggal PO : </p>
    <p class="text1">Nama pelanggan : </p>
    <table border="1">
      <thead>
        <tr>
           <th>No</th>
          <th>Tanggal Masuk</th>
          <th>No. Faktur</th>
          <th>Nama Barang</th>
          <th>Nama pelanggan</th>
          <th>Jumlah Barang</th>
          <th>Harga Barang</th>
          <th>Total</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php
         
          $start=date('Y-m-d',strtotime($_REQUEST['start']));
          $end=date('Y-m-d',strtotime($_REQUEST['end']));
          // $jenipin = $_REQUEST['jenpi'];
          // $jenis = ucfirst($jenipin);
          $no=1;
           $sql = mysqli_query($db,"SELECT * FROM penjualan  INNER JOIN ekspedisi ON penjualan.id_ekspedisi = ekspedisi.id_ekspedisi INNER JOIN data_penjualan ON penjualan.nofakturjual = data_penjualan.nofakturjual INNER JOIN data_barang ON data_penjualan.id_barang = data_barang.id_barang INNER JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan WHERE penjualan.tgl_masuk >='$start' and penjualan.tgl_masuk<='$end' ");
           $no=1;
           while ($ambil = mysqli_fetch_array($sql)) {
          $nabar = $ambil['nama_bar'];
           $harga = $ambil['hargajual'];
            $nofakturjual = $ambil['nofakturjual'];
             
              $nama_pelanggan = $ambil['nama_pelanggan'];
               $tgl_masuk = $ambil['tgl_fakturjual'];
           $jumlah = $ambil['jumlahjual'];      
        ?>
           <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $tgl_masuk; ?></td>
              <td><?php echo $nofakturjual; ?></td>
              <td><?php echo $nabar; ?></td>
              <td><?php echo $nama_pelanggan; ?></td>
              <td><?php echo $jumlah; ?></td>
              <td><?php echo $harga; ?></td>
              <td><?php echo "-"; ?></td>
              <td><?php echo "-"; ?></td>
           </tr>
        <?php } ?>
            <tr>
              <th colspan="2" align="center">Total</th>
              <th align="center">0</th>
              <th></th>
              <th align="center">0</th>
              <th></th>
            </tr>
      </tbody>
    </table>
    <p class="text1">
      NB : - Apabila ada barang baru, mohon di kirim maksimal 5 pcs sebagai siample.
    </p>
    <p class="text1">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Mohon di buat jumlah barang dan nama barang di goni / bal-balan barang.
    </p>
    <p>Dibuat oleh,</p><br/><br/><br/><br/>
    <p class="text1">KHALIFAH</p>
  </div><!-- /.box-body -->

<?php

}
elseif($jenispin=="pelanggan")
{

	 $nasup=$_REQUEST['pelanggan'];
	 ?>
	 <div class="box-body">
    <h3 class="text">FORM penjualan ORDERAN SULTAN BATIK BERDASARKAN BARANG</h3>
    <h4 class="text">EX.PURNAMA RAYA</h4>
    <h5 class="text">MEDAN</h5>
    <hr>
    
    <table border="1">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal Masuk</th>
          <th>No. Faktur</th>
          <th>Nama Barang</th>
          <th>Nama pelanggan</th>
          <th>Jumlah Barang</th>
          <th>Harga Barang</th>
          <th>Total</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php
         
          $start=date('Y-m-d',strtotime($_REQUEST['start']));
          $end=date('Y-m-d',strtotime($_REQUEST['end']));
          // $jenipin = $_REQUEST['jenpi'];
          // $jenis = ucfirst($jenipin);
          $no=1;
           $sql = mysqli_query($db,"SELECT * FROM penjualan  INNER JOIN ekspedisi ON penjualan.id_ekspedisi = ekspedisi.id_ekspedisi INNER JOIN data_penjualan ON penjualan.nofakturjual = data_penjualan.nofakturjual INNER JOIN data_barang ON data_penjualan.id_barang = data_barang.id_barang INNER JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan WHERE penjualan.id_pelanggan='$nasup'");
           $no=1;
           while ($ambil = mysqli_fetch_array($sql)) {
           $nabar = $ambil['nama_bar'];
           $harga = $ambil['hargajual'];
            $nofakturjual = $ambil['nofakturjual'];
             
              $nama_pelanggan = $ambil['nama_pelanggan'];
               $tgl_masuk = $ambil['tgl_fakturjual'];
           $jumlah = $ambil['jumlahjual'];          
        ?>
           <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $tgl_masuk; ?></td>
              <td><?php echo $nofakturjual; ?></td>
              <td><?php echo $nabar; ?></td>
              <td><?php echo $nama_pelanggan; ?></td>
              <td><?php echo $jumlah; ?></td>
              <td><?php echo $harga; ?></td>
              <td><?php echo "-"; ?></td>
              <td><?php echo "-"; ?></td>
           </tr>
        <?php } ?>
            <tr>
              <th colspan="2" align="center">Total</th>
              <th align="center">0</th>
              <th></th>
              <th align="center">0</th>
              <th></th>
            </tr>
      </tbody>
    </table>
    <p class="text1">
      NB : - Apabila ada barang baru, mohon di kirim maksimal 5 pcs sebagai siample.
    </p>
    <p class="text1">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Mohon di buat jumlah barang dan nama barang di goni / bal-balan barang.
    </p>
    <p>Dibuat oleh,</p><br/><br/><br/><br/>
    <p class="text1">KHALIFAH</p>
  </div><!-- /.box-body -->
<?php	 
}
elseif($jenispin=="tp")
{
	 $tempo=$_REQUEST['tempo'];
   $trans=$_REQUEST['trans'];
?>
<div class="box-body">
    <h3 class="text">FORM penjualan ORDERAN SULTAN BATIK BERDASARKAN BARANG</h3>
    <h4 class="text">EX.PURNAMA RAYA</h4>
    <h5 class="text">MEDAN</h5>
    <h5 class="text">JATUH TEMPO DALAM <?php echo $tempo." ".$trans; ?></h5>
    <hr>
    
    <table border="1">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal Masuk</th>
          <th>No. Faktur</th>
          <th>Nama Barang</th>
          <th>Nama pelanggan</th>
          <th>Jumlah Barang</th>
          <th>Harga Barang</th>
          <th>Total</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php
         
          $start=date('Y-m-d',strtotime($_REQUEST['start']));
          $end=date('Y-m-d',strtotime($_REQUEST['end']));
          // $jenipin = $_REQUEST['jenpi'];
          // $jenis = ucfirst($jenipin);
          $today=date("Y-m-d");


          if($trans=="hari")
          {

           $totalhari = date("Y-m-d", strtotime("+$tempo day", strtotime($today)));
           //
          }
           elseif($trans=="minggu")
          {

           $totalhari = date("Y-m-d", strtotime("+$tempo week", strtotime($today)));
           //
          }

 elseif($trans=="bulan")
          {

           $totalhari = date("Y-m-d", strtotime("+$tempo month", strtotime($today)));
           //
          }



          $no=1;
           $sql = mysqli_query($db,"SELECT * FROM penjualan  INNER JOIN ekspedisi ON penjualan.id_ekspedisi = ekspedisi.id_ekspedisi INNER JOIN data_penjualan ON penjualan.nofakturjual = data_penjualan.nofakturjual INNER JOIN data_barang ON data_penjualan.id_barang = data_barang.id_barang INNER JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan WHERE  penjualan.tgl_masuk >='$today' and penjualan.tgl_masuk<='$totalhari'");
           $no=1;
           while ($ambil = mysqli_fetch_array($sql)) {
           $nabar = $ambil['nama_bar'];
           $harga = $ambil['hargajual'];
            $nofakturjual = $ambil['nofakturjual'];
             
              $nama_pelanggan = $ambil['nama_pelanggan'];
               $tgl_masuk = $ambil['tgl_fakturjual'];
           $jumlah = $ambil['jumlahjual'];  

        ?>
           <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $tgl_masuk; ?></td>
              <td><?php echo $nofakturjual; ?></td>
              <td><?php echo $nabar; ?></td>
              <td><?php echo $nama_pelanggan; ?></td>
              <td><?php echo $jumlah; ?></td>
              <td><?php echo $harga; ?></td>
              <td><?php echo "-"; ?></td>
              <td><?php echo "-"; ?></td>
           </tr>
        <?php } ?>
            <tr>
              <th colspan="2" align="center">Total</th>
              <th align="center">0</th>
              <th></th>
              <th align="center">0</th>
              <th></th>
            </tr>
      </tbody>
    </table>
    <p class="text1">
      NB : - Apabila ada barang baru, mohon di kirim maksimal 5 pcs sebagai siample.
    </p>
    <p class="text1">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Mohon di buat jumlah barang dan nama barang di goni / bal-balan barang.
    </p>
    <p>Dibuat oleh,</p><br/><br/><br/><br/>
    <p class="text1">KHALIFAH</p>
  </div><!-- /.box-body -->

<?php
}



  
