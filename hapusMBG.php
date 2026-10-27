<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM tb_mbg WHERE id_mbg='$id'");
header("Location: tampilMBG.php");
?>
