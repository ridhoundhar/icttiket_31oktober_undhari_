<?php
include "../config/conn.php";

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $requestId = $_GET['id'];

    $sqlDelete = "DELETE FROM exel WHERE Request_ID = '$requestId'";

    if ($conn->query($sqlDelete) === TRUE) {
        header("Location: import.php?success=1");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    header("Location: import.php");
    exit();
}
?>
