<?php
header("Content-Type: application/json");

$koneksi = new mysqli("localhost", "root", "", "jurnal_pkl");

if ($koneksi->connect_error) {
    echo json_encode(["status" => "error", "message" => "Koneksi database gagal"]);
    exit;
}

$query = "SELECT nis, nama_siswa FROM siswa";
$result = $koneksi->query($query);

$data = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode(["status" => "error", "message" => "Gagal mengambil data siswa"]);
}

$koneksi->close();
?>
