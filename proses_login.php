<?php
    session_start();
    include "config/conn.php";

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $epassword = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM admin WHERE username='$user'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];

            if (password_verify($pass, $hashed_password)) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user;
                header("Location: loading.php");
                exit();
            } else {
                echo "
                <script>
                    alert('Password salah!');
                    window.location.href = 'login.html';
                </script>";
            }
        } else {
            echo "
            <script>
                alert('Username tidak ditemukan!');
                window.location.href = 'login.html';
            </script>";
        }
    } else {
        echo "
        <script>
            alert('Harap isi username dan password!');
            window.location.href = 'login.html';
        </script>";
    }
?>
