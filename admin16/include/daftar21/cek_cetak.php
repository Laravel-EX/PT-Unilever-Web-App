<?php date_default_timezone_set("Asia/Jakarta") ?>
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Booking No</th>
              <th>PEB Number</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no=1;
              include '../../include/koneksi.php';  
              $idx = $_POST['idx'];
              $sql = "SELECT * FROM daftar d, customer c, product p, con_type co,
              con_vendor con
              WHERE d.id_customer = c.id_customer
              AND d.id_product = p.id_product
              AND d.id_container = co.id_container
              AND d.id_convendor = con.id_convendor 
              AND id_daftar = '$idx'
              ";
              $query = mysqli_query($db,$sql);
              while ($ambil = mysqli_fetch_array($query)) {
                $id = $ambil['id_daftar'];
                $po = $ambil['po_no'];
                $custom = $ambil['nama_customer'];
                $prod = $ambil['nama_product'];
                $tgl = date('d-m-Y');
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $po; ?></td>
              <td><?php echo $prod; ?></td>
              <td><?php echo $tgl; ?></td>
              <td>
                <a href="#" class="btn btn-primary">Laporan</a>
              </td>
            </tr>
          <?php } mysqli_close($db); ?>
          </tbody>
        </table>