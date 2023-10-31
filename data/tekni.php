<?php
if (isset($_GET['technician'])) {
    $technician = urldecode($_GET['technician']);
    
    include "../config/conn.php";
    
    $query = "SELECT * FROM exel WHERE Technician = '$technician'";
    $result = mysqli_query($conn, $query);
    echo $technician;
    if (mysqli_num_rows($result) > 0) {
        
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            
            echo "<td>" . $no++ . ".</td>";
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
            echo "<td><a href='edit.php?id=".$row['Request_ID'] ."' class='bi bi-pencil'></a></td>";
            //echo "<td><a href='hapus.php?id=" . $row['Request_ID'] . "' class='bi bi-trash'></a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data untuk teknisi: " . $technician;
    }
    
    mysqli_close($conn);
} else {
    echo "Teknisi tidak dipilih.";
}
?>
