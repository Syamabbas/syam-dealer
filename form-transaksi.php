<?php
include "db_conn.php"; include "header.php";

if (isset($_POST["submit"])) {
   $nota = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
   $pelanggan = $_POST['pelanggan'];
   $mobil = $_POST['mobil'];
   $biaya = $_POST['biaya'];
   $tanggal = $_POST['tanggal'];

   $sql = "INSERT INTO `transaksi`(`nota`, `pelanggan`, `mobil`, `biaya`, `tanggal`) VALUES ('$nota','$pelanggan','$mobil','$biaya','$tanggal')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: index.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>

<br>
<div class="container">
    <div class="card text-bg-light">
        <div class="card-header"><h2>Form Transaksi</h2></div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nota" class="form-label">No Nota:</label> <br>
                    <input type="text" name="nota" class="form-control" id="nota" value="Terisi otomatis"  disabled>
                </div>
                <div class="mb-3">
                    <label for="pelanggan" class="form-label">Nama Pelanggan:</label>
                    <input type="text" name="pelanggan" class="form-control" id="pelanggan">
                </div>
                <div class="mb-3">
                    <label for="mobil" class="form-label">Jenis Mobil:</label>
                    <select type="text" name="mobil" class="form-select" id="mobil" aria-label="Default select example">
                        <option>---</option>
                        <?php
                        include "db_conn.php";
                        $query = mysqli_query($conn,"SELECT * FROM produk") or die (mysqli_error());
                        while($data = mysqli_fetch_array($query)){
                            echo "<option value=$data[id]> $data[model] $data[brand] </option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="biaya" class="form-label">Harga Mobil:</label>
                    <input type="number" name="biaya" class="form-control" id="biaya">
                </div>
                <div class="mb-3">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>    
        </div>
    </div>
</div>