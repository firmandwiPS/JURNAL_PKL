<?php
$koneksi = new mysqli("localhost", "root", "", "jurnal_pkl");


$nis = $_POST['nis'];
$old_tanggal = $_POST['old_tanggal_kegiatan'];
$tanggal = $_POST['tanggal_kegiatan'];
$uraian = $_POST['uraian_kegiatan'];
$catatan = $_POST['catatan_pembimbing'];
$paraf_base64 = $_POST['paraf_pembimbing'];

// Handle upload paraf jika ada
$paraf_path = "";
if (!empty($paraf_base64)) {
    $folder = "uploads/paraf/";
    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }
    $filename = $nis . "_" . time() . ".png";
    $filepath = $folder . $filename;
    file_put_contents($filepath, base64_decode($paraf_base64));
    $paraf_path = $filepath;
}

// Update database
if (!empty($paraf_path)) {
    $query = "UPDATE jurnal SET 
        tanggal_kegiatan='$tanggal', 
        uraian_kegiatan='$uraian', 
        catatan_pembimbing='$catatan', 
        paraf_pembimbing='$paraf_path'
        WHERE nis='$nis' AND tanggal_kegiatan='$old_tanggal'";
} else {
    $query = "UPDATE jurnal SET 
        tanggal_kegiatan='$tanggal', 
        uraian_kegiatan='$uraian', 
        catatan_pembimbing='$catatan'
        WHERE nis='$nis' AND tanggal_kegiatan='$old_tanggal'";
}

if (mysqli_query($conn, $query)) {
    echo "Data jurnal berhasil diperbarui.";
} else {
    echo "Gagal memperbarui data: " . mysqli_error($conn);
}
?>