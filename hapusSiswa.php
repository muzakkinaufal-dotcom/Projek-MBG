<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM tb_siswa WHERE id_siswa='$id'");
header("Location: tampilSiswa.php");
?>

