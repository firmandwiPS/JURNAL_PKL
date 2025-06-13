<?php
$koneksi = new mysqli("localhost", "root", "", "jurnal_pkl");

if (isset($_POST['id_jurnal'])) {
    $id = $_POST['id_jurnal'];

    // Ambil nama file foto
    $qFoto = mysqli_query($koneksi, "SELECT paraf_pembimbing FROM jurnal WHERE id_jurnal = '$id'");
    $dFoto = mysqli_fetch_assoc($qFoto);
    $foto = $dFoto['paraf_pembimbing'];

    // Hapus file dari folder jika ada
    if (!empty($foto)) {
        $path = "foto/" . $foto;
        if (file_exists($path)) {
            unlink($path);
        }
    }

    // Hapus dari database
    $query = "DELETE FROM jurnal WHERE id_jurnal = '$id'";
    $result = mysqli_query($koneksi, $query);

    echo $result ? "sukses" : "gagal";
}
?>
