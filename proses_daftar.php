<?php
session_start();
include "config/conn.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];

    $epassword = password_hash($pass, PASSWORD_DEFAULT);

    $check_username_query = "SELECT * FROM admin WHERE username='$user'";
    $check_result = $conn->query($check_username_query);

    if ($check_result && $check_result->num_rows > 0) {
        echo "
        <script>
            alert('Username sudah digunakan. Pilih username lain.');
            window.location.href = 'daftar.php';
        </script>";
    } else {
        $check_email_query = "SELECT * FROM admin WHERE email='$email'";
        $check_email_result = $conn->query($check_email_query);
        if ($check_email_result && $check_email_result->num_rows > 0) {
            echo "
            <script>
                alert('Alamat email sudah digunakan. Gunakan alamat email lain.');
                window.location.href = 'daftar.php';
            </script>";
        } else {
            $insert_query = "INSERT INTO admin (username, password, email) VALUES ('$user', '$epassword', '$email')";
            if ($conn->query($insert_query) === TRUE) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user;

                header("Location: daftar.php?success=true");
                exit();
            } else {
                echo "Error: " . $insert_query . "<br>" . $conn->error;
            }
        }
    }
} else {
    echo "
    <script>
        alert('Harap isi semua field!');
        window.location.href = 'daftar.php';
    </script>";
}

$conn->close();
?>
