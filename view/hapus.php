<?php
include "../config/conn.php";

if (isset($_GET['id'])) {
    $requestId = $_GET['id'];

    if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
        $sqlDelete = "DELETE FROM exel WHERE Request_ID = '$requestId'";
        if ($conn->query($sqlDelete) === TRUE) {

            $sqlHistoryInsert = "INSERT INTO history_hapus (deleted_id) VALUES ('$requestId')";
            $conn->query($sqlHistoryInsert);

            header("Location: import.php");
            exit();
        } else {
            echo "Error deleting record: ";
        }
    } else {
        echo '<script>
                if (confirm("Apakah Anda yakin ingin menghapus ' . $requestId . '?")) {
                    window.location.href = "hapus.php?id=' . $requestId . '&confirm=yes";
                } else {
                    window.location.href = "import.php";
                }
              </script>';
    }
}

$conn->close();
?>
