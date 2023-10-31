<?php
    $conn = mysqli_connect("localhost", "root", "root", "tiket");

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['role'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        // Mengenkripsi password dengan Bcrypt sebelum menyimpannya
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO admin (username, password, email, role) VALUES ('$username', '$hashedPassword', '$email', '$role')";

        if (mysqli_query($conn, $sql)) {
            header("Location: tambah_users.php?success=1");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Semua field harus diisi!";
    }

    mysqli_close($conn);
?>
