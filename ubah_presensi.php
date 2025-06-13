<?php
$koneksi = new mysqli("localhost", "root", "", "jurnal_pkl");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_presensi'];
    $nis = $_POST['nis'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];

    $stmt = $koneksi->prepare("UPDATE presensi SET nis=?, tanggal=?, keterangan=? WHERE id_presensi=?");
    $stmt->bind_param("sssi", $nis, $tanggal, $keterangan, $id);

    if ($stmt->execute()) {
        echo json_encode(["status" => true]);
    } else {
        echo json_encode(["status" => false, "message" => "Gagal mengubah presensi"]);
    }
} else {
    echo json_encode(["status" => false, "message" => "Metode tidak valid"]);
}
?>
