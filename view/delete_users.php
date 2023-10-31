<?php
    $conn = mysqli_connect("localhost", "root", "root", "tiket");

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $id = $_GET['id'];

    $sql = "DELETE FROM admin WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: users.php?success=1"); 
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>

