<?php
session_start();
include "config/conn.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = $_POST['username'];
    $new_password = $_POST['password'];

    $epassword = password_hash($new_password, PASSWORD_DEFAULT);

    $check_username_query = "SELECT * FROM admin WHERE username='$user'";
    $check_result = $conn->query($check_username_query);

    if ($check_result && $check_result->num_rows > 0) {
        $update_password_query = "UPDATE admin SET password='$epassword' WHERE username='$user'";
        if ($conn->query($update_password_query) === TRUE) {
            echo "
            <script>
                alert('Kata sandi berhasil diubah.');
                window.location.href = 'lupa_pass.php';
            </script>";
        } else {
            echo "Error: " . $update_password_query . "<br>" . $conn->error;
        }
    } else {
        echo "
        <script>
            alert('Username tidak ditemukan. Harap coba lagi.');
            window.location.href = 'lupa_pass.php';
        </script>";
    }
} else {
    echo "
    <script>
        alert('Harap isi semua field!');
        window.location.href = 'lupa_pass.php';
    </script>";
}

$conn->close();
?>
