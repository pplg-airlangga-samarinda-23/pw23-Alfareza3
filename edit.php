<?php 
require "koneksi.php";

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $koneksi->prepare("SELECT * FROM reservasi_2 WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();
    $stmt->close();
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $tipe = $_POST['tipe_kamar'];
    $checkin = $_POST['tanggal_checkin'];
    $checkout = $_POST['tanggal_checkout'];
    $nomor = $_POST['nomor_kamar'];
    $umur = $_POST['umur'];
    $kelamin = $_POST['jenis_kelamin'];

    $stmt = $koneksi->prepare("UPDATE reservasi_2 SET nama=?, tipe_kamar=?, tanggal_checkin=?, tanggal_checkout=?, nomor_kamar=?, umur=?, jenis_kelamin=? WHERE id=?");
    $stmt->bind_param("sssssssi", $nama, $tipe, $checkin, $checkout, $nomor, $umur, $kelamin, $id);
    
    if ($stmt->execute()) {
        header("Location: reservasi.php");
        exit;
    }
    $stmt->close();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
    <h1>Edit Data</h1>

    <?php if ($row): ?>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">

            <label>Nama:</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($row['nama']) ?>" required><br>

            <label>Tipe Kamar:</label>
            <input type="text" name="tipe_kamar" value="<?= htmlspecialchars($row['tipe_kamar']) ?>" required><br>

            <label>Check-in:</label>
            <input type="date" name="tanggal_checkin" value="<?= htmlspecialchars($row['tanggal_checkin']) ?>" required><br>

            <label>Check-out:</label>
            <input type="date" name="tanggal_checkout" value="<?= htmlspecialchars($row['tanggal_checkout']) ?>" required><br>

            <label>Nomor Kamar:</label>
            <input type="text" name="nomor_kamar" value="<?= htmlspecialchars($row['nomor_kamar']) ?>" required><br>

            <label>Umur:</label>
            <input type="number" name="umur" value="<?= htmlspecialchars($row['umur']) ?>" required><br>

            <label>Jenis Kelamin:</label>
            <select name="jenis_kelamin" required>
                <option value="L" <?= $row['jenis_kelamin'] === 'L' ? 'selected' : '' ?>>L</option>
                <option value="P" <?= $row['jenis_kelamin'] === 'P' ? 'selected' : '' ?>>P</option>
            </select>
            </div>

            <button type="submit">Simpan</button>
        </form>
    <?php else: ?>
        <p>Data tidak ditemukan.</p>
    <?php endif; ?>

</body>
</html>