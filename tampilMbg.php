<?php
include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT tb_mbg.*, tb_siswa.nama, tb_siswa.kelas FROM tb_mbg JOIN tb_siswa ON tb_mbg.id_siswa = tb_siswa.id_siswa ORDER BY tb_mbg.tanggal DESC");
$no = 1;
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Data Pendataan MBG</title>
 <script src="https://cdn.tailwindcss.com"></script></head>
<body class="min-h-screen bg-gray-100 p-4">

    <div class="mx-auto max-w-6xl rounded-md bg-white p-4 shadow-md">

        <div class="mb-3 flex items-center justify-between gap-2">
            <h2 class="text-sm font-bold text-gray-700">
                Data Pendataan MBG
            </h2>

            <div class="flex gap-2 text-xs">
                <a href="index.php"
                   class="rounded bg-gray-500 px-3 py-2 text-white hover:bg-gray-600">
                    Menu Utama
                </a>

                <a href="tambahMBG.php"
                   class="rounded bg-blue-600 px-3 py-2 text-white hover:bg-blue-700">
                    + Tambah Pendataan
                </a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-center text-xs">

                <thead>
                    <tr class="bg-gray-200 text-gray-800">
                        <th class="border border-gray-200 p-2">No</th>
                        <th class="border border-gray-200 p-2">Nama Siswa</th>
                        <th class="border border-gray-200 p-2">Kelas</th>
                        <th class="border border-gray-200 p-2">Tanggal</th>
                        <th class="border border-gray-200 p-2">Status</th>
                        <th class="border border-gray-200 p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-gray-700">
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($query)) :
                    ?>
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-200 p-2">
                            <?= $no++; ?>
                        </td>
                        <td class="border border-gray-200 p-2">
                            <?= htmlspecialchars($row['nama']); ?>
                        </td>
                        <td class="border border-gray-200 p-2">
                            <?= htmlspecialchars($row['kelas']); ?>
                        </td>
                        <td class="border border-gray-200 p-2">
                            <?= htmlspecialchars($row['tanggal']); ?>
                        </td>
                        <td class="border border-gray-200 p-2">
                            <?= htmlspecialchars($row['status_terima']); ?>
                        </td>
                        <td class="border border-gray-200 p-2">
                            <div class="flex justify-center gap-1">
                                <a href="editMBG.php?id=<?= $row['id_mbg']; ?>"
                                   class="rounded bg-green-600 px-2 py-1 text-white hover:bg-green-700">
                                    Edit
                                </a>
                                <a href="hapusMBG.php?id=<?= $row['id_mbg']; ?>"
                                   onclick="return confirm('Yakin ingin menghapus data ini?')"
                                   class="rounded bg-red-600 px-2 py-1 text-white hover:bg-red-700">
                                    Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>