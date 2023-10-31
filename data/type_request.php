<?php
include "../config/conn.php";

$query = "SELECT Request_Type FROM exel GROUP BY Request_Type";
$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $requestType = $row['Request_Type'];
        $link = "type_request.php?request_type=" . urlencode($requestType);
        $downloadLink = "download_data.php?request_type=" . urlencode($requestType); 
        echo "<a style='text-decoration:none; font-size:13px;' href='$link'>$requestType</a>";
        echo "&nbsp;&nbsp;<a class='bi bi-box-arrow-in-down' href='$downloadLink' target='_blank'></a><br>";
    }
} else {
    echo "Gagal menjalankan query: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
