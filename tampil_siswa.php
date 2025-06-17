<?php
header('Content-Type: application/json');

// Koneksi ke database (tanpa include file eksternal)
$koneksi = mysqli_connect("localhost", "root", "", "jurnal_pkl");

// Periksa koneksi
if (!$koneksi) {
    echo json_encode([
        'status' => false,
        'message' => 'Gagal terkoneksi ke database: ' . mysqli_connect_error()
    ]);
    exit();
}

// Query untuk ambil data dari tabel siswa
$query = "SELECT nis, nama_siswa, asal_sekolah FROM siswa";
$result = mysqli_query($koneksi, $query);

// Periksa hasil query
if (!$result) {
    echo json_encode([
        'status' => false,
        'message' => 'Query gagal: ' . mysqli_error($koneksi)
    ]);
    exit();
}

// Ambil data dan ubah ke array
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Keluarkan data dalam format JSON
echo json_encode([
    'status' => true,
    'data' => $data
]);

// Tutup koneksi
mysqli_close($koneksi);
?>
