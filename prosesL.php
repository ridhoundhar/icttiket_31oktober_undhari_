<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $conn = mysqli_connect("localhost", "root", "root", "tiket");

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        header("Location: loading.php");
        exit();
    } else {
        echo "Invalid username or password. Please try again.";
    }

    $conn->close();
}
?>
