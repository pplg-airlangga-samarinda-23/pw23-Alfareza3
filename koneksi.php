<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database   = "hotel_reservasi";

$koneksi = new mysqli($hostname, $username, $password, $database);

if ($koneksi->connect_error){
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>