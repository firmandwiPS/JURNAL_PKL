<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "jurnal_pkl";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$response = array();

// Validasi data POST
if (
    isset($_POST['nis']) &&
    isset($_POST['tanggal_kegiatan']) &&
    isset($_POST['uraian_kegiatan']) &&
    isset($_POST['catatan_pembimbing'])
) {
    $nis = $_POST['nis'];
    $tanggal = $_POST['tanggal_kegiatan'];
    $uraian = $_POST['uraian_kegiatan'];
    $catatan = $_POST['catatan_pembimbing'];

    $namaFileFoto = "";

    // Jika ada file diupload
    if (isset($_FILES['paraf_pembimbing']['name'])) {
        $uploadDir = "foto/";
        $ext = pathinfo($_FILES['paraf_pembimbing']['name'], PATHINFO_EXTENSION);
        $namaFileFoto = "paraf_" . time() . "." . $ext;
        $uploadPath = $uploadDir . $namaFileFoto;

        if (move_uploaded_file($_FILES['paraf_pembimbing']['tmp_name'], $uploadPath)) {
            // Berhasil upload
        } else {
            $response['status'] = false;
            $response['message'] = "Gagal upload file.";
            echo json_encode($response);
            exit;
        }
    }

    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO jurnal (nis, tanggal_kegiatan, uraian_kegiatan, catatan_pembimbing, paraf_pembimbing) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nis, $tanggal, $uraian, $catatan, $namaFileFoto);

    if ($stmt->execute()) {
        $response['status'] = true;
        $response['message'] = "Data jurnal berhasil ditambahkan.";
    } else {
        $response['status'] = false;
        $response['message'] = "Gagal menyimpan data jurnal.";
    }

    $stmt->close();
} else {
    $response['status'] = false;
    $response['message'] = "Data tidak lengkap.";
}

$conn->close();
echo json_encode($response);
?>