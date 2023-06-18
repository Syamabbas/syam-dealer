<?php 
  include "db_conn.php"; include "header.php";
?>

<div class="container">
  <?php
  if (isset($_GET["msg"])) {
    $msg = $_GET["msg"];
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    ' . $msg . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>

  <!-- Start Judul -->
  <div class="text-center mb-4">
      <h3>Daftar Harga Dealer Syam</h3>
      <?php
      $tanggalSekarang = date('d-m-Y');
      $hariSekarang = date('l');
      echo "Harga Update: " . $hariSekarang . ", " . $tanggalSekarang;
      ?>
  </div>
  <!-- <a href="add-new.php" class="btn btn-dark mb-3">Add New</a> -->
  <!-- End Judul -->

  <!-- Start Table -->
  <table id="dt" class="table table-hover text-center">
    <thead class="table-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Brand Mobil</th>
        <th scope="col">Model Mobil</th>
        <th scope="col">Harga</th>
        <th scope="col">Ketersediaan</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM `produk`";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <tr>
          <td><?php echo $row["id"] ?></td>
          <td><?php echo $row["brand"] ?></td>
          <td><?php echo $row["model"] ?></td>
          <td>Rp <?php echo number_format($row["harga"], 0, ".", ".") ?></td>
          <td><?php echo $row["sedia"] ?></td>
          <td>
            <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
            <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
  <!-- End Table -->
  <br>
<?php 
  include "transaksi.php";
?>
</div>
  