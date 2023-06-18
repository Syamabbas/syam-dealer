<?php
include "db_conn.php"; include "header.php";

if (isset($_POST["submit"])) {
   $id = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
   $brand = $_POST['brand'];
   $model = $_POST['model'];
   $harga = $_POST['harga'];
   $sedia = $_POST['sedia'];

   $sql = "INSERT INTO `produk`(`id`,`brand`, `model`, `harga`, `sedia`) VALUES ('$id','$brand','$model','$harga','$sedia')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: index.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>

<div class="container">
   <div class="text-center mb-4">
      <h3>Tambah Mobil Baru</h3>
      <p class="text-muted">Lengkapi form dibawah untuk menambah mobil baru</p>
   </div>

   <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
         <div class="row mb-3">
            <div class="col">
               <label class="form-label">Brand Mobil:</label>
               <input type="text" class="form-control" name="brand" placeholder="Toyota">
            </div>

            <div class="col">
               <label class="form-label">Model Mobil:</label>
               <input type="text" class="form-control" name="model" placeholder="Avanza">
            </div>
         </div>

         <div class="mb-3">
            <label class="form-label">Harga:</label>
            <input type="number" class="form-control" name="harga" placeholder="237000000">
         </div>

         <div class="form-group mb-3">
            <label>Ketersediaan:</label>
            &nbsp;
            <input type="radio" class="form-check-input" name="sedia" id="ada" value="ada">
            <label for="male" class="form-input-label">Ada</label>
            &nbsp;
            <input type="radio" class="form-check-input" name="sedia" id="kosong" value="kosong">
            <label for="female" class="form-input-label">Kosong</label>
         </div>

         <div>
            <button type="submit" class="btn btn-success" name="submit">Save</button>
            <a href="index.php" class="btn btn-danger">Cancel</a>
         </div>
      </form>
   </div>
</div>