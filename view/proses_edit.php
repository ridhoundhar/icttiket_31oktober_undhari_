<?php
include "../config/conn.php";

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $universitas = mysqli_real_escape_string($conn, $_POST['universitas']);
    $jenis_kelamin = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
    $tgl_masuk = mysqli_real_escape_string($conn, $_POST['tgl_masuk']);
    $tgl_keluar = mysqli_real_escape_string($conn, $_POST['tgl_keluar']);
    $gambar = '';
    if ($_FILES['new_image']['error'] == 0) {
        $uploadDir = "uploads/";
        $uploadFile = $uploadDir . basename($_FILES['new_image']['name']);
        
        if (move_uploaded_file($_FILES['new_image']['tmp_name'], $uploadFile)) {
            $gambar = $uploadFile;
        } else {
            echo "Error mengunggah gambar.";
            exit();
        }
    }

    $sql = "UPDATE pM_ict
            SET nama = ?, universitas = ?, jenis_kelamin = ?, tgl_masuk = ?, tgl_keluar = ?";
    
    if (!empty($gambar)) {
        $sql .= ", gambar = ?";
    }

    $sql .= " WHERE id = ?";
    
    $stmt = mysqli_prepare($conn, $sql);

    if (!empty($gambar)) {
        mysqli_stmt_bind_param($stmt, "ssssssi", $nama, $universitas, $jenis_kelamin, $tgl_masuk, $tgl_keluar, $gambar, $id);
    } else {
        mysqli_stmt_bind_param($stmt, "sssssi", $nama, $universitas, $jenis_kelamin, $tgl_masuk, $tgl_keluar, $id);
    }

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
                    alert('Data berhasil diubah');
                    window.location.href = 'magang.php';
            </script>";

        exit();
    } else {
        echo "Error saat memperbarui data: " . mysqli_error($conn);
    }
} else {
    header("Location: edit_magang.php?id=" . $id . "&error=1");
    exit();
}
?>
