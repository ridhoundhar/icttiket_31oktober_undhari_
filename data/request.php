<?php
    include "../config/conn.php";

    $sql = "SELECT * FROM exel WHERE Request_Type = 'Request'";
    $result = $conn->query($sql);

    function displayData($data) {
        echo "<thead>";
        echo "<tr><th>No</th><th>Change ID</th><th>Request ID</th><th>Subject</th><th>Requester</th><th>Request Status</th><th>Priority</th><th>Request Type</th><th>Technician</th><th>Site</th><th>Created Time</th><th>Due By Time</th><th>Ket</th></tr></thead>";

        $no = 1;
        foreach ($data as $row) {
            echo "<tr>";
            echo "<td>" . $no . "</td>";
            echo "<td>" . $row['Change_ID'] . "</td>";
            echo "<td>" . $row['Request_ID'] . "</td>";
            echo "<td>" . $row['Subject'] . "</td>";
            echo "<td>" . $row['Requester'] . "</td>";
            echo "<td>" . $row['Request_Status'] . "</td>";
            echo "<td>" . $row['priority'] . "</td>";
            echo "<td>" . $row['Request_Type'] . "</td>";
            echo "<td>" . $row['Technician'] . "</td>";
            echo "<td>" . $row['Site'] . "</td>";
            echo "<td>" . $row['Created_Time'] . "</td>";
            echo "<td>" . $row['DueBy_Time'] . "</td>";
            echo "<td>" . $row['Ket'] . "</td>";
            //echo "<td><a href='hapus.php?id=" . $row['Request_ID'] . "' class='btn bi bi-trash'></a></td>";
            echo "</tr>";
            $no++;
        }
        echo "</table>";
    }

    if ($result->num_rows > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        displayData($data);
        echo "<a class='btn btn-primary bi bi-box-arrow-in-down' href='down_request.php'> Download Excel</a>";
    } else {
        echo "Data Tidak Ada.";
    }

    $conn->close();
?>