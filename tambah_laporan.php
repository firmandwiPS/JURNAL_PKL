<?php
header("Content-Type: application/json");

// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "jurnal_pkl";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    echo json_encode(["status" => false, "message" => "Koneksi gagal: " . mysqli_connect_error()]);
    exit;
}

// Ambil data
$nis = $_POST['nis'] ?? '';
$nama_siswa = $_POST['nama_siswa'] ?? '';
$asal_sekolah = $_POST['asal_sekolah'] ?? '';
$nilai = $_POST['nilai'] ?? '';

if (
    empty($nis) || empty($nama_siswa) || empty($asal_sekolah) || empty($nilai) ||
    !isset($_FILES['file_laporan']) || !isset($_FILES['file_project'])
) {
    echo json_encode(["status" => false, "message" => "Data tidak lengkap."]);
    exit;
}

if (!is_numeric($nilai) || $nilai < 0 || $nilai > 100) {
    echo json_encode(["status" => false, "message" => "Nilai harus 0 - 100."]);
    exit;
}

// Folder upload
$upload_dir = "uploads/";
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

// Proses upload file
$file_laporan = $_FILES['file_laporan'];
$file_project = $_FILES['file_project'];

$laporan_name = uniqid("lap_") . "_" . basename($file_laporan['name']);
$project_name = uniqid("proj_") . "_" . basename($file_project['name']);

$laporan_path = $upload_dir . $laporan_name;
$project_path = $upload_dir . $project_name;

if (
    move_uploaded_file($file_laporan['tmp_name'], $laporan_path) &&
    move_uploaded_file($file_project['tmp_name'], $project_path)
) {
    // Cek jika siswa belum ada
    $cekSiswa = mysqli_query($conn, "SELECT * FROM siswa WHERE nis='$nis'");
    if (mysqli_num_rows($cekSiswa) == 0) {
        mysqli_query($conn, "INSERT INTO siswa (nis, nama_siswa, asal_sekolah) 
                             VALUES ('$nis', '$nama_siswa', '$asal_sekolah')");
    }

    // Simpan laporan
    $query = "INSERT INTO laporan_pkl (nis, file_laporan, file_project, nilai_akhir_pkl)
              VALUES ('$nis', '$laporan_name', '$project_name', '$nilai')";
    $insert = mysqli_query($conn, $query);

    if ($insert) {
        echo json_encode(["status" => true, "message" => "Laporan berhasil disimpan"]);
    } else {
        echo json_encode(["status" => false, "message" => "Gagal simpan laporan: " . mysqli_error($conn)]);
    }

} else {
    echo json_encode(["status" => false, "message" => "Gagal upload file"]);
}
?>
