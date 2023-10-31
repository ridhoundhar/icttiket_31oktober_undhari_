<?php
include "../config/conn.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT id, nama,tgl_masuk,tgl_keluar, universitas, gambar FROM pM_ict WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $nama = $row['nama'];
        $universitas = $row['universitas'];
        $tglMasuk = $row['tgl_masuk'];
        $tglKeluar = $row['tgl_keluar'];
        $gambar = $row['gambar'];


    } else {
        echo "Data tidak ditemukan.";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "ID tidak valid.";
}

mysqli_close($conn);
?>

