<?php
    include "../config/conn.php";

    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        
        $sql = "DELETE FROM pM_ict WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../view/magang.php");
            exit();
        } else {
            echo "Gagal menghapus data: " . mysqli_error($conn);
        }
    } else {
        echo "ID tidak valid.";
    }

    mysqli_close($conn);
?>
