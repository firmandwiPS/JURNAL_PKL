<?php
$host = "localhost";      // Ganti dengan host database Anda
$user = "root";           // Username database
$pass = "";               // Password database
$db   = "jurnal_pkl";  // Nama database Anda

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
