<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
    $tanggal = $_POST['tanggal'];
    $menu    = $_POST['nama_menu'];
    mysqli_query($koneksi, "INSERT INTO tb_menu_mbg VALUES (NULL, '$tanggal', '$menu')");
    header("Location: tampilMenu.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Menu MBG</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Tambah Menu MBG</h2>
        <form method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-1">Tanggal</label>
                <input type="date" name="tanggal" value="<?= date('Y-m-d'); ?>" class="w-full border border-gray-300 p-2 rounded text-sm focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-1">Nama Menu</label>
                <input type="text" name="nama_menu" placeholder="Contoh: Nasi, Ayam Goreng, Sayur Sop" class="w-full border border-gray-300 p-2 rounded text-sm focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="flex justify-between items-center mt-6">
                <a href="tampilMenu.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 text-sm">Batal</a>
                <button type="submit" name="simpan" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm font-semibold">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>
