<?php
include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM tb_menu_mbg ORDER BY tanggal DESC");
$no = 1;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Menu MBG</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Data Menu MBG</h2>
            <div>
                <a href="index.php" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-600 text-sm font-semibold">Menu Utama</a>
                <a href="tambahMenu.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm font-semibold">+ Tambah Menu</a>
            </div>
        </div>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-2 text-center w-12">No</th>
                    <th class="border border-gray-300 p-2">Tanggal</th>
                    <th class="border border-gray-300 p-2 text-left">Nama Menu</th>
                    <th class="border border-gray-200 p-2 text-center w-32">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                <tr class="text-center border-b">
                    <td class="border border-gray-300 p-2"><?= $no++; ?></td>
                    <td class="border border-gray-300 p-2"><?= $row['tanggal']; ?></td>
                    <td class="border border-gray-300 p-2 text-left"><?= $row['nama_menu']; ?></td>
                    <td class="border border-gray-200 p-2 space-x-1">
                        <a href="editMenu.php?id=<?= $row['id_menu']; ?>" class="bg-green-600 text-white px-2.5 py-1 rounded hover:bg-green-700 text-xs font-semibold">Edit</a>
                        <a href="hapusMenu.php?id=<?= $row['id_menu']; ?>" onclick="return confirm('Yakin ingin menghapus?')" class="bg-red-600 text-white px-2.5 py-1 rounded hover:bg-red-700 text-xs font-semibold">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
