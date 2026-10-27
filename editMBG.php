<?php
include 'koneksi.php';
$id = $_GET['id'];
$mbg = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_mbg WHERE id_mbg='$id'"));
$siswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
if (isset($_POST['update'])) {
    $id_siswa = $_POST['id_siswa'];
    $tanggal  = $_POST['tanggal'];
    $status   = $_POST['status_terima'];
    mysqli_query($koneksi, "UPDATE tb_mbg SET id_siswa='$id_siswa', tanggal='$tanggal', status_terima='$status' WHERE id_mbg='$id'");
    header("Location: tampilMBG.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pendataan MBG</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Edit Data Pendataan MBG</h2>
        <form method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-1">Siswa</label>
                <select name="id_siswa" class="w-full border border-gray-300 p-2 rounded text-sm focus:outline-none focus:border-blue-500">
                    <?php while ($s = mysqli_fetch_assoc($siswa)) : ?>
                        <option value="<?= $s['id_siswa']; ?>" <?= $s['id_siswa'] == $mbg['id_siswa'] ? 'selected' : ''; ?>>
                            <?= $s['nama']; ?> (<?= $s['kelas']; ?>)
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-1">Tanggal</label>
                <input type="date" name="tanggal" value="<?= $mbg['tanggal']; ?>" class="w-full border border-gray-300 p-2 rounded text-sm focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-1">Status Terima</label>
                <select name="status_terima" class="w-full border border-gray-300 p-2 rounded text-sm focus:outline-none focus:border-blue-500">
                    <option value="diterima" <?= $mbg['status_terima'] == 'diterima' ? 'selected' : ''; ?>>Diterima</option>
                    <option value="tidak_diterima" <?= $mbg['status_terima'] == 'tidak_diterima' ? 'selected' : ''; ?>>Tidak Diterima</option>
                </select>
            </div>
            <div class="flex justify-between items-center mt-6">
                <a href="tampilMBG.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 text-sm">Batal</a>
                <button type="submit" name="update" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm font-semibold">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>
</html>
