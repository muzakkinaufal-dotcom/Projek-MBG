<?php
include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
$no = 1;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Data Siswa</h2>
            <div>
                <a href="index.php" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-600 text-sm font-semibold">Menu Utama</a>
                <a href="tambahSiswa.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm font-semibold">+ Tambah Siswa</a>
            </div>
        </div>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-2 text-center w-12">No</th>
                    <th class="border border-gray-300 p-2">NIS</th>
                    <th class="border border-gray-300 p-2 text-left">Nama Siswa</th>
                    <th class="border border-gray-300 p-2">Kelas</th>
                    <th class="border border-gray-300 p-2 text-center w-32">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                <tr class="text-center border-b">
                    <td class="border border-gray-300 p-2"><?= $no++; ?></td>
                    <td class="border border-gray-300 p-2"><?= $row['nis']; ?></td>
                    <td class="border border-gray-300 p-2 text-left"><?= $row['nama']; ?></td>
                    <td class="border border-gray-300 p-2"><?= $row['kelas']; ?></td>
                    <td class="border border-gray-300 p-2 space-x-1">
                        <a href="editSiswa.php?id=<?= $row['id_siswa']; ?>" class="bg-green-600 text-white px-2.5 py-1 rounded hover:bg-green-700 text-xs font-semibold">Edit</a>
                        <a href="hapusSiswa.php?id=<?= $row['id_siswa']; ?>" onclick="return confirm('Yakin ingin menghapus?')" class="bg-red-600 text-white px-2.5 py-1 rounded hover:bg-red-700 text-xs font-semibold">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
