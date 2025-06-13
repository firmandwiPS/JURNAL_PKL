<?php
header('Content-Type: application/json');
$koneksi = new mysqli('localhost','root','','jurnal_pkl');
$id = $_POST['id_jurnal'] ?? '';
if (!$id) die(json_encode(['status'=>'error','message'=>'ID kosong']));

$sql = "SELECT * FROM jurnal WHERE id_jurnal = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param('i',$id);
$stmt->execute();
$res = $stmt->get_result();
$data = $res->fetch_assoc();
if ($data) echo json_encode(['status'=>'success','jurnal'=>$data]);
else echo json_encode(['status'=>'error','message'=>'Tidak ditemukan']);
?>