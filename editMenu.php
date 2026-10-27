<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_menu_mbg WHERE id_menu='$id'"));
if (isset($_POST['update'])) {
    $tanggal = $_POST['tanggal'];
    $menu    = $_POST['nama_menu'];
    mysqli_query($koneksi, "UPDATE tb_menu_mbg SET tanggal='$tanggal', nama_menu='$menu' WHERE id_menu='$id'");
    header("Location: tampilMenu.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Menu MBG</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Edit Menu MBG</h2>
        <form method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-1">Tanggal</label>
                <input type="date" name="tanggal" value="<?= $data['tanggal']; ?>" class="w-full border border-gray-300 p-2 rounded text-sm focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-1">Nama Menu</label>
                <input type="text" name="nama_menu" value="<?= $data['nama_menu']; ?>" class="w-full border border-gray-300 p-2 rounded text-sm focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="flex justify-between items-center mt-6">
                <a href="tampilMenu.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 text-sm">Batal</a>
                <button type="submit" name="update" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm font-semibold">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>
</html>
