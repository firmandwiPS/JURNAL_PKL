<?php
$koneksi = mysqli_connect("localhost", "root", "", "jurnal_pkl");

$response = ['status' => false];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? '';
    $nis = $_POST['nis'] ?? '';
    $nilai = $_POST['nilai'] ?? '';
    $file_laporan_lama = $_POST['file_laporan_lama'] ?? '';
    $file_project_lama = $_POST['file_project_lama'] ?? '';

    $folder = "uploads/";
    $file_laporan = $file_laporan_lama;
    $file_project = $file_project_lama;

    // Upload file laporan jika ada
    if (isset($_FILES['file_laporan']) && $_FILES['file_laporan']['error'] === 0) {
        $namaFileLaporan = "laporan_" . time() . ".pdf";
        if (move_uploaded_file($_FILES['file_laporan']['tmp_name'], $folder . $namaFileLaporan)) {
            if ($file_laporan_lama && file_exists($folder . $file_laporan_lama)) {
                unlink($folder . $file_laporan_lama);
            }
            $file_laporan = $namaFileLaporan;
        }
    }

    // Upload file project jika ada
    if (isset($_FILES['file_project']) && $_FILES['file_project']['error'] === 0) {
        $namaFileProject = "project_" . time() . ".zip";
        if (move_uploaded_file($_FILES['file_project']['tmp_name'], $folder . $namaFileProject)) {
            if ($file_project_lama && file_exists($folder . $file_project_lama)) {
                unlink($folder . $file_project_lama);
            }
            $file_project = $namaFileProject;
        }
    }

    // Update database
    $query = "UPDATE laporan_pkl SET 
                nis='$nis', 
                file_laporan='$file_laporan',
                file_project='$file_project',
                nilai_akhir_pkl='$nilai'
              WHERE id_laporan_pkl='$id'";

    if (mysqli_query($koneksi, $query)) {
        $response['status'] = true;
    } else {
        $response['message'] = "Gagal mengupdate data: " . mysqli_error($koneksi);
    }
} else {
    $response['message'] = "Metode tidak diizinkan";
}

echo json_encode($response);
?>
