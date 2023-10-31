<?php
    include "../config/conn.php";

    $nama = $_POST['nama'] ?? '';
    $universitas = $_POST['universitas'] ?? '';
    $jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
    $tgl_masuk = $_POST['tgl_masuk'] ?? '';
    $tgl_keluar = $_POST['tgl_keluar'] ?? '';

    $gambar = $_FILES['gambar']['name'] ?? '';
    $gambar_tmp = $_FILES['gambar']['tmp_name'] ?? '';

    $upload_dir = "uploads/";

    if (!empty($gambar)) {
        if (strlen($gambar) > 255) {
            echo "Nama file gambar terlalu panjang. Harap pilih nama file yang lebih pendek.";
        } else {
            $gambar_path = $upload_dir . $gambar;

            if (move_uploaded_file($gambar_tmp, $gambar_path)) {
                $sql = "INSERT INTO pM_ict (nama, universitas, jenis_kelamin, tgl_masuk, tgl_keluar, gambar) 
                        VALUES ('$nama', '$universitas', '$jenis_kelamin', '$tgl_masuk', '$tgl_keluar', '$gambar_path')";

                if (mysqli_query($conn, $sql)) {
                    echo "<p class='alert alert-primary'>Data Berhasil Di tambah</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "Error saat mengunggah gambar.";
            }
        }
    } else {
        echo "";
    }

    mysqli_close($conn);
?>