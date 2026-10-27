<?php
include 'koneksi.php';
$siswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
if (isset($_POST['simpan'])) {
    $id_siswa = $_POST['id_siswa'];
    $tanggal  = $_POST['tanggal'];
    $status   = $_POST['status_terima'];
    mysqli_query($koneksi, "INSERT INTO tb_mbg VALUES (NULL, '$id_siswa', '$tanggal', '$status')");
    header("Location: tampilMBG.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pendataan MBG</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Tambah Data Pendataan MBG</h2>
        <form method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-1">Siswa</label>
                <select name="id_siswa" class="w-full border border-gray-300 p-2 rounded text-sm focus:outline-none focus:border-blue-500" required>
                    <option value="">-- Pilih Siswa --</option>
                    <?php while ($s = mysqli_fetch_assoc($siswa)) : ?>
                        <option value="<?= $s['id_siswa']; ?>"><?= $s['nama']; ?> (<?= $s['kelas']; ?>)</option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-1">Tanggal</label>
                <input type="date" name="tanggal" value="<?= date('Y-m-d'); ?>" class="w-full border border-gray-300 p-2 rounded text-sm focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-1">Status Terima</label>
                <select name="status_terima" class="w-full border border-gray-300 p-2 rounded text-sm focus:outline-none focus:border-blue-500">
                    <option value="diterima">Diterima</option>
                    <option value="tidak_diterima">Tidak Diterima</option>
                </select>
            </div>
            <div class="flex justify-between items-center mt-6">
                <a href="tampilMBG.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 text-sm">Batal</a>
                <button type="submit" name="simpan" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm font-semibold">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>
