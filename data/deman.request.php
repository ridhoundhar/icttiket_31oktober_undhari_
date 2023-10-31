
<?php
    include "../config/conn.php";

    if (isset($_GET['request_type'])) {
        $requestType = $_GET['request_type'];

        $query = "SELECT * FROM exel WHERE Request_Type = '" . mysqli_real_escape_string($conn, $requestType) . "'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

            echo "<p>$requestType</p>";

            $no = 1;
            foreach ($data as $row) {
                echo "<tr>";
                echo "<td>" . $no . ".</td>";
                echo "<td>" . $row['Change_ID'] . "</td>";
                echo "<td>" . $row['Request_ID'] . "</td>";
                echo "<td>" . $row['Subject'] . "</td>";
                echo "<td>" . $row['Requester'] . "</td>";
                echo "<td>" . $row['Request_Status'] . "</td>";
                echo "<td>" . $row['Request_Type'] . "</td>";
                echo "<td>" . $row['Technician'] . "</td>";
                echo "<td>" . $row['Site'] . "</td>";
                echo "<td>" . $row['Created_Time'] . "</td>";
                echo "<td>" . $row['DueBy_Time'] . "</td>";
                echo "<td>" . $row['priority'] . "</td>";

                if ($row['Progres_Minggu_Ini'] !== null) {
                    echo "<td>" . number_format($row['Progres_Minggu_Ini']) . "%</td>";
                } else {
                    echo "<td></td>";
                }

                if ($row['Proggres_Minggu_Lalu'] !== null) {
                    echo "<td>" . number_format($row['Proggres_Minggu_Lalu']) . "%</td>";
                } else {
                    echo "<td></td>";
                }

                echo "<td>" . $row['Keterangan_Stopper'] . "</td>";
                echo "<td><a href='edit.php?id=" . $row['Request_ID'] . "' class='bi bi-pencil'></a></td>";
                echo "</tr>";

                $no++;
            }
            
        } else {
            echo "Gagal menjalankan query: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    } else {
        echo "Jenis permintaan tidak ditemukan.";
    }
?>
