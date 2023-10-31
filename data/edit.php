<?php
    include "../config/conn.php";

    if(isset($_GET['id'])) {
    $requestID = $_GET['id'];

    $sql = "SELECT * FROM exel WHERE Request_ID = '$requestID'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    } else {
        echo "Data tidak ditemukan.";
    }
        } else {
            echo "Request ID tidak valid.";
        }

    $conn->close();
?>
