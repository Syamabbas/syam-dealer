<?php
$servername = "syamabbas.com";
$username = "u605667575_crud";
$password = "2r5VgyE?";
$dbname = "u605667575_php_crud";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
