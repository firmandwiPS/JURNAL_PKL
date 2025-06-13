<?php
header("Content-Type: application/json");

$host = "localhost";
$user = "root";
$password = "";
$dbname = "jurnal_pkl";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["status" => false, "message" => "Koneksi gagal: " . $conn->connect_error]));
}

$response = [];

if (
    isset($_POST['nis']) &&
    isset($_POST['tanggal']) &&
    isset($_POST['keterangan'])
) {
    $nis = $_POST['nis'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];

    $stmt = $conn->prepare("INSERT INTO presensi (nis, tanggal, keterangan) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nis, $tanggal, $keterangan);

    if ($stmt->execute()) {
        $response['status'] = true;
        $response['message'] = "Data presensi berhasil ditambahkan.";
    } else {
        $response['status'] = false;
        $response['message'] = "Gagal menambahkan data presensi.";
    }

    $stmt->close();
} else {
    $response['status'] = false;
    $response['message'] = "Data tidak lengkap.";
}

$conn->close();
echo json_encode($response);
?>
