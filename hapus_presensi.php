<?php
header("Content-Type: application/json");

$koneksi = new mysqli("localhost", "root", "", "jurnal_pkl");
$response = [];

if (isset($_POST['id_presensi'])) {
    $id_presensi = $_POST['id_presensi'];

    $querySelect = "SELECT * FROM presensi WHERE id_presensi = '$id_presensi'";
    $resultSelect = mysqli_query($koneksi, $querySelect);

    if ($resultSelect && mysqli_num_rows($resultSelect) > 0) {
        $queryDelete = "DELETE FROM presensi WHERE id_presensi = '$id_presensi'";
        $resultDelete = mysqli_query($koneksi, $queryDelete);

        if ($resultDelete) {
            $response["status"] = true;
            $response["message"] = "Presensi berhasil dihapus";
        } else {
            $response["status"] = false;
            $response["message"] = "Gagal menghapus presensi";
        }
    } else {
        $response["status"] = false;
        $response["message"] = "Data tidak ditemukan";
    }
} else {
    $response["status"] = false;
    $response["message"] = "ID presensi tidak dikirim";
}

echo json_encode($response);
?>
