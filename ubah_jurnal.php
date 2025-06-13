<?php
header('Content-Type: application/json');
$koneksi = new mysqli('localhost','root','','jurnal_pkl');

$id = $_POST['id_jurnal'] ?? '';
$nis = $_POST['nis'] ?? '';
$tanggal = $_POST['tanggal_kegiatan'] ?? '';
$uraian = $_POST['uraian_kegiatan'] ?? '';
$catatan = $_POST['catatan_pembimbing'] ?? '';
$old = $_POST['old_file'] ?? '';

if (!$id || !$nis || !$tanggal || !$uraian || !$catatan)
    die(json_encode(['status'=>'error','message'=>'Data tidak lengkap']));

// Cek upload baru
$newName = $old;
if ($_FILES['paraf_pembimbing']['tmp_name'] ?? false) {
    $file = $_FILES['paraf_pembimbing'];
    $folder = __DIR__.'/foto/';
    $tmp = $file['tmp_name'];
    $newName = time().'_'.basename($file['name']);
    if (!move_uploaded_file($tmp, $folder.$newName))
        die(json_encode(['status'=>'error','message'=>'Upload gagal']));
    if (file_exists($folder.$old)) unlink($folder.$old);
}

$sql = "UPDATE jurnal SET nis=?, tanggal_kegiatan=?, uraian_kegiatan=?, 
        catatan_pembimbing=?, paraf_pembimbing=? WHERE id_jurnal=?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param('sssssi',$nis,$tanggal,$uraian,$catatan,$newName,$id);
if ($stmt->execute()) echo json_encode(['status'=>'success']);
else echo json_encode(['status'=>'error','message'=>'DB gagal update']);
?>