<?php
header("Content-Type: application/json");

$koneksi = new mysqli("localhost", "root", "", "jurnal_pkl");

if ($koneksi->connect_error) {
    echo json_encode([]);
    exit;
}

// Query data jurnal beserta nama siswa dari tabel siswa
$sql = "SELECT j.id_jurnal, j.nis, s.nama_siswa, j.tanggal_kegiatan, j.uraian_kegiatan, j.catatan_pembimbing, j.paraf_pembimbing 
        FROM jurnal j
        LEFT JOIN siswa s ON j.nis = s.nis
        ORDER BY j.tanggal_kegiatan DESC";

$result = $koneksi->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'id_jurnal' => $row['id_jurnal'],  
            "nis" => $row["nis"],
            "nama_siswa" => $row["nama_siswa"],
            "tanggal_kegiatan" => $row["tanggal_kegiatan"],
            "uraian_kegiatan" => $row["uraian_kegiatan"],
            "catatan_pembimbing" => $row["catatan_pembimbing"],
            "paraf_pembimbing" => $row["paraf_pembimbing"]  // nama file foto saja
        ];
    }
}

echo json_encode($data);

$koneksi->close();
?>
