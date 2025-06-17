<?php
include 'db/koneksi.php';

$sql = "SELECT l.id_laporan_pkl, l.nis, s.nama_siswa, s.asal_sekolah,
               l.file_laporan, l.file_project, l.nilai_akhir_pkl
        FROM laporan_pkl l
        JOIN siswa s ON s.nis = l.nis";
$res = mysqli_query($conn, $sql);
$data = [];
while ($row = mysqli_fetch_assoc($res)) $data[] = $row;
echo json_encode($data);
?>
