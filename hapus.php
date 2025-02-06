<?php 
require 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $koneksi->prepare("DELETE FROM reservasi_2 WHERE id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: reservasi.php");
        exit;
    }
    $stmt->close();
}
?>
