<?php 
    // Koneksi
    $conn = mysqli_connect("localhost", "root", "root", "tiket");

    // Memeriksa koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
?>