<?php
include "db_conn.php"; include "header.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $brand = $_POST['brand'];
  $model = $_POST['model'];
  $harga = $_POST['harga'];
  $sedia = $_POST['sedia'];

  $sql = "UPDATE `produk` SET `brand`='$brand',`model`='$model',`harga`='$harga',`sedia`='$sedia' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>

<div class="container">
  <div class="text-center mb-4">
    <h3>Edit Daftar Mobil</h3>
    <p class="text-muted">Isi Form Yang Ingin Anda Ubah</p>
  </div>

  <?php
  $sql = "SELECT * FROM `produk` WHERE id = $id LIMIT 1";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  ?>

  <div class="container d-flex justify-content-center">
    <form action="" method="post" style="width:50vw; min-width:300px;">
      <div class="row mb-3">
        <div class="col">
          <label class="form-label">Brand Mobil:</label>
          <input type="text" class="form-control" name="brand" value="<?php echo $row['brand'] ?>">
        </div>

        <div class="col">
          <label class="form-label">Model Mobil:</label>
          <input type="text" class="form-control" name="model" value="<?php echo $row['model'] ?>">
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Harga:</label>
        <input type="harga" class="form-control" name="harga" value="<?php echo $row['harga'] ?>">
      </div>

      <div class="form-group mb-3">
        <label>Ketersediaan:</label>
        &nbsp;
        <input type="radio" class="form-check-input" name="sedia" id="ada" value="ada" <?php echo ($row["sedia"] == 'ada') ? "checked" : ""; ?>>
        <label for="male" class="form-input-label">Ada</label>
        &nbsp;
        <input type="radio" class="form-check-input" name="sedia" id="kosong" value="kosong" <?php echo ($row["sedia"] == 'kosong') ? "checked" : ""; ?>>
        <label for="female" class="form-input-label">Kosong</label>
      </div>

      <div>
        <button type="submit" class="btn btn-success" name="submit">Update</button>
        <a href="index.php" class="btn btn-danger">Cancel</a>
      </div>
    </form>
  </div>
</div>