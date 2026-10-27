<?php
$host = "127.0.0.1";
$user = "root";
$pass = "root";
$db   = "db_mbg";
$port = 3306; 

$koneksi = mysqli_connect($host, $user, $pass, $db, $port);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
