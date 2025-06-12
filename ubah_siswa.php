<?php
$koneksi = new mysqli("localhost", "root", "", "jurnal_pkl");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nis_lama = $_POST['nis_lama'];
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE siswa SET 
                nis = '$nis',
                nama_siswa = '$nama_siswa',
                jenis_kelamin = '$jenis_kelamin',
                asal_sekolah = '$asal_sekolah',
                tanggal_mulai = '$tanggal_mulai',
                tanggal_selesai = '$tanggal_selesai',
                no_hp = '$no_hp',
                alamat = '$alamat'
              WHERE nis = '$nis_lama'";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'failed', 'error' => mysqli_error($koneksi)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
