<!-- Start Table -->
<div class="text-center mb-4">
  <h3>Riwayat Transaksi</h3>
</div>
<table id="dt" class="table table-hover text-center">
    <thead class="table-dark">
      <tr>
        <th scope="col">No Nota</th>
        <th scope="col">ID Mobil</th>
        <th scope="col">Nama Pelanggan</th>
        <th scope="col">Biaya</th>
        <th scope="col">Tanggal Transaksi</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM `transaksi`";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <tr>
          <td><?php echo $row["nota"] ?></td>
          <td><?php echo $row["mobil"] ?></td>
          <td><?php echo $row["pelanggan"] ?></td>
          <td>Rp <?php echo number_format($row["biaya"], 0, ".", ".") ?></td>
          <td><?php echo $row["tanggal"] ?></td>
          <td>
            <a href="#" class="link-dark disabled" tabindex="-1" aria-disabled="true"><i class="fa-solid fa-pen-to-square fs-5 me-3" style="color: #b3b3b3;"></i></a>
            <a href="#" class="link-dark disabled" tabindex="-1" aria-disabled="true"><i class="fa-solid fa-trash fs-5" style="color: #b3b3b3;"></i></a>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
</table>
<!-- End Table -->
