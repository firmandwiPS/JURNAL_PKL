<?php
header("Content-Type: application/json");

$koneksi = new mysqli("localhost", "root", "", "jurnal_pkl");

if ($koneksi->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Koneksi ke database gagal"]);
    exit;
}

$sql = "SELECT p.id_presensi, p.nis, s.nama_siswa, p.tanggal, p.keterangan
        FROM presensi p
        LEFT JOIN siswa s ON p.nis = s.nis
        ORDER BY p.tanggal DESC";

$result = $koneksi->query($sql);

$data = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            "id_presensi" => $row["id_presensi"],
            "nis" => $row["nis"],
            "nama_siswa" => $row["nama_siswa"],
            "tanggal" => $row["tanggal"],
            "keterangan" => $row["keterangan"]
        ];
    }
} else {
    http_response_code(404);
    echo json_encode(["error" => "Data tidak ditemukan atau query salah"]);
    $koneksi->close();
    exit;
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);

$koneksi->close();
?>
