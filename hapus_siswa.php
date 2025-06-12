<?php
// koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "jurnal_pkl");

// Periksa apakah parameter 'nis' diterima dari POST
if (isset($_POST['nis'])) {
    $nis = $_POST['nis'];

    // Escape untuk keamanan terhadap SQL Injection
    $nis = mysqli_real_escape_string($koneksi, $nis);

    // Query hapus data berdasarkan NIS
    $query = "DELETE FROM siswa WHERE nis = '$nis'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo json_encode(["success" => true, "message" => "Data berhasil dihapus"]);
    } else {
        echo json_encode(["success" => false, "message" => "Gagal menghapus data"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Parameter NIS tidak ditemukan"]);
}
?>
