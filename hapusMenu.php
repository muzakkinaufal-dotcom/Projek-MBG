<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM tb_menu_mbg WHERE id_menu='$id'");
header("Location: tampilMenu.php");
?>
