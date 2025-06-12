<?php
$koneksi = new mysqli("localhost", "root", "", "jurnal_pkl");


if (isset($_POST['nis'])) {
    $nis = $_POST['nis'];

    // Ambil nama file paraf dari database berdasarkan NIS
    $querySelect = "SELECT paraf_pembimbing FROM jurnal WHERE nis = '$nis'";
    $resultSelect = mysqli_query($koneksi, $querySelect);

    if ($resultSelect && mysqli_num_rows($resultSelect) > 0) {
        $row = mysqli_fetch_assoc($resultSelect);
        $fotoParaf = $row['paraf_pembimbing'];

        // Hapus file foto paraf jika ada
        if (!empty($fotoParaf)) {
            $filePath = "foto/" . $fotoParaf;
            if (file_exists($filePath)) {
                unlink($filePath); // Hapus file dari folder
            }
        }

        // Hapus data dari tabel jurnal
        $queryDelete = "DELETE FROM jurnal WHERE nis = '$nis'";
        $resultDelete = mysqli_query($koneksi, $queryDelete);

        if ($resultDelete) {
            echo "sukses";
        } else {
            echo "gagal_hapus_data";
        }

    } else {
        echo "data_tidak_ditemukan";
    }
} else {
    echo "nis_tidak_dikirim";
}
?>
