<?php
    include "../config/conn.php";

    $query = "SELECT Technician, COUNT(Requester) as JumlahRequester FROM exel GROUP BY Technician";
    $result = mysqli_query($conn, $query);

    $no =1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$no++ .".</td>";
        echo "<td><a style='text-decoration:none;' href='tekni.php?technician=" . urlencode($row['Technician']) . "'>" . $row['Technician'] . "</a></td>";
        echo "<td>" . $row['JumlahRequester'] . "</td>";
        echo "</tr>";
    }

    mysqli_close($conn);
?>