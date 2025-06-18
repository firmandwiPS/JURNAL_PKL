<?php
header("Content-Type: application/json");

// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "jurnal_pkl");

// Cek koneksi
if (mysqli_connect_errno()) {
    echo json_encode([
        "status" => false,
        "message" => "Gagal koneksi: " . mysqli_connect_error()
    ]);
    exit;
}

$response = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_laporan = isset($_POST['id']) ? $_POST['id'] : '';

    if (!empty($id_laporan)) {
        // Ambil nama file dari database
        $query_select = "SELECT file_laporan, file_project FROM laporan_pkl WHERE id_laporan_pkl = ?";
        $stmt_select = mysqli_prepare($koneksi, $query_select);

        if ($stmt_select) {
            mysqli_stmt_bind_param($stmt_select, "s", $id_laporan);
            mysqli_stmt_execute($stmt_select);
            mysqli_stmt_store_result($stmt_select);

            if (mysqli_stmt_num_rows($stmt_select) > 0) {
                mysqli_stmt_bind_result($stmt_select, $file_laporan, $file_project);
                mysqli_stmt_fetch($stmt_select);

                // Path folder tempat file disimpan
                $uploadDir = __DIR__ . '/uploads/';

                // Hapus file jika ada
                if (!empty($file_laporan) && file_exists($uploadDir . $file_laporan)) {
                    unlink($uploadDir . $file_laporan);
                }
                if (!empty($file_project) && file_exists($uploadDir . $file_project)) {
                    unlink($uploadDir . $file_project);
                }

                mysqli_stmt_close($stmt_select);

                // Hapus data dari database
                $query_delete = "DELETE FROM laporan_pkl WHERE id_laporan_pkl = ?";
                $stmt_delete = mysqli_prepare($koneksi, $query_delete);

                if ($stmt_delete) {
                    mysqli_stmt_bind_param($stmt_delete, "s", $id_laporan);
                    if (mysqli_stmt_execute($stmt_delete)) {
                        $response['status'] = true;
                        $response['message'] = "Data dan file berhasil dihapus";
                    } else {
                        $response['status'] = false;
                        $response['message'] = "Gagal menghapus data: " . mysqli_error($koneksi);
                    }
                    mysqli_stmt_close($stmt_delete);
                } else {
                    $response['status'] = false;
                    $response['message'] = "Query delete tidak valid: " . mysqli_error($koneksi);
                }

            } else {
                $response['status'] = false;
                $response['message'] = "Data tidak ditemukan";
            }
        } else {
            $response['status'] = false;
            $response['message'] = "Query select tidak valid: " . mysqli_error($koneksi);
        }

    } else {
        $response['status'] = false;
        $response['message'] = "ID laporan tidak boleh kosong";
    }
} else {
    $response['status'] = false;
    $response['message'] = "Metode tidak diizinkan";
}

mysqli_close($koneksi);
echo json_encode($response);
?>
