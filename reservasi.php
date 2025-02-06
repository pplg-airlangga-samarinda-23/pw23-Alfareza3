<?php 
require "koneksi.php";

$sql = "SELECT * FROM reservasi_2";
$rows = $koneksi->query($sql)->fetch_all(MYSQLI_ASSOC);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Hotel</title>
</head>
<body>
    <h1>Halaman Reservasi Hotel</h1>


    <a href="tambah.php">Tambah</a>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tipe Kamar</th>
                <th>Tanggal Checkin</th>
                <th>Tanggal Checkout</th>
                <th>Nomor Kamar</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no?></td>
                    <td><?= htmlspecialchars($row["nama"]); ?></td>
                    <td><?= htmlspecialchars($row["tipe_kamar"]); ?></td>
                    <td><?= htmlspecialchars($row["tanggal_checkin"]); ?></td>
                    <td><?= htmlspecialchars($row["tanggal_checkout"]); ?></td>
                    <td><?= htmlspecialchars($row["nomor_kamar"]); ?></td>
                    <td><?= htmlspecialchars($row["umur"]); ?></td>
                    <td><?= htmlspecialchars($row["jenis_kelamin"]); ?></td>
                    <td>
                        <a href="edit.php?id=<?=$row['id']?>">Edit</a>
                        <a href="hapus.php?id=<?=$row['id']?>" onclick="return confirm('Yakin ingin dihapus?')">Hapus</a>
                    </td>

                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
        
</body>
</html>