<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE id_siswa='$id'"));
if (isset($_POST['update'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    mysqli_query($koneksi, "UPDATE tb_siswa SET nis='$nis', nama='$nama', kelas='$kelas' WHERE id_siswa='$id'");
    header("Location: tampilSiswa.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Edit Siswa</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-5 font-sans">

    <div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-blue-700 text-center mb-6">
            Edit Data Siswa
        </h2>
        <form method="POST" class="space-y-4">
            <div class="flex flex-col gap-2">
                <label class="font-semibold text-gray-700">NIS</label>
                <input type="text" name="nis"
                    value="<?= htmlspecialchars($data['nis']); ?>"
                    required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex flex-col gap-2">
                <label class="font-semibold text-gray-700">Nama Siswa</label>
                <input type="text" name="nama"
                    value="<?= htmlspecialchars($data['nama']); ?>"
                    required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex flex-col gap-2">
                <label class="font-semibold text-gray-700">Kelas</label>
                <input type="text" name="kelas"
                    value="<?= htmlspecialchars($data['kelas']); ?>"
                    required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" name="update"
                class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">
                Simpan Perubahan
            </button>
            <a href="tampilSiswa.php"
                class="block text-center bg-gray-200 text-gray-700 py-3 rounded-lg hover:bg-gray-300">
                Batal
            </a>
        </form>
    </div>
</body>
