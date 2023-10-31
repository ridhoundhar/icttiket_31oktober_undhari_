
<h1>Daftar Technician</h1>

<table border="1">
    <tr>
        <th>Nama Technician</th>
        <th>Jumlah Requester</th>
    </tr>

    <?php
        include "config/conn.php";

        $query = "SELECT Technician, COUNT(Requester) as JumlahRequester FROM exel GROUP BY Technician";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Technician'] . "</td>";
            echo "<td>" . $row['JumlahRequester'] . "</td>";
            echo "</tr>";
        }

        mysqli_close($conn);
    ?>

</table>

