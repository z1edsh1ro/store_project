<?php
$conn = new mysqli("localhost","root","","store");
if ($conn->connect_error) {
  die("Connection failed: " . mysqli_connect_error());
}
$conn->set_charset("utf8");
?>