<?php
include "config/conn.php";

if (isset($_POST['username'])) {
    $user = $_POST['username'];

    $check_username_query = "SELECT * FROM admin WHERE username='$user'";
    $check_result = $conn->query($check_username_query);

    if ($check_result && $check_result->num_rows > 0) {
        echo "found";
    } else {
        echo "not_found";
    }
} else {
    echo "error";
}

$conn->close();
?>
