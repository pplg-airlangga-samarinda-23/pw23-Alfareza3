<?php 
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $tipe = $_POST['tipe_kamar'];
    $checkin = $_POST['tanggal_checkin'];
    $checkout = $_POST['tanggal_checkout'];
    $nomor = $_POST['nomor_kamar'];
    $umur = $_POST['umur'];
    $kelamin = $_POST['jenis_kelamin'];

    $stmt = $koneksi->prepare("INSERT INTO reservasi_2 (nama, tipe_kamar, tanggal_checkin, tanggal_checkout, nomor_kamar, umur, jenis_kelamin) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssis", $nama, $tipe, $checkin, $checkout, $nomor, $umur, $kelamin);
    
    if ($stmt->execute()) {
        header("Location: reservasi.php");
        exit;
    }
    $stmt->close();
}
?>
