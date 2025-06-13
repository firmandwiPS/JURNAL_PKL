<?php
header('Content-Type: application/json');
$koneksi = new mysqli('localhost','root','','jurnal_pkl');
$res = $koneksi->query("SELECT nis,nama_siswa FROM siswa");
$data = [];
while ($r=$res->fetch_assoc()) $data[]=$r;
echo json_encode($data);
?>