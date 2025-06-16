<?php
$koneksi = new mysqli("localhost", "root", "", "jurnal_pkl");

$sql = "SELECT * FROM siswa";
$result = $koneksi->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
header('Content-Type: application/json');
echo json_encode($data);
?>
