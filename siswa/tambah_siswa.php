<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$koneksi = new mysqli("localhost", "root", "", "jurnal_pkl");

if ($koneksi->connect_error) {
    echo json_encode(["status" => "error", "message" => "Koneksi database gagal: " . $koneksi->connect_error]);
    exit;
}

// Ambil data dari POST
$nis = $_POST['nis'] ?? '';
$nama_siswa = $_POST['nama_siswa'] ?? '';
$jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
$asal_sekolah = $_POST['asal_sekolah'] ?? '';
$tanggal_mulai = $_POST['tanggal_mulai'] ?? '';
$tanggal_selesai = $_POST['tanggal_selesai'] ?? '';
$no_hp = $_POST['no_hp'] ?? '';
$alamat = $_POST['alamat'] ?? '';

// Validasi input minimal
if (empty($nis) || empty($nama_siswa)) {
    echo json_encode(["status" => "error", "message" => "NIS dan Nama wajib diisi"]);
    exit;
}

// Cek apakah NIS sudah ada
$cek = $koneksi->query("SELECT * FROM siswa WHERE nis = '$nis'");
if ($cek->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "NIS sudah digunakan, tidak boleh sama"]);
    exit;
}

// Insert data jika valid
$query = "INSERT INTO siswa (nis, nama_siswa, jenis_kelamin, asal_sekolah, tanggal_mulai, tanggal_selesai, no_hp, alamat)
          VALUES ('$nis', '$nama_siswa', '$jenis_kelamin', '$asal_sekolah', '$tanggal_mulai', '$tanggal_selesai', '$no_hp', '$alamat')";

if ($koneksi->query($query)) {
    echo json_encode(["status" => "success", "message" => "Data berhasil ditambahkan"]);
} else {
    echo json_encode(["status" => "error", "message" => "Query gagal: " . $koneksi->error]);
}
?>
