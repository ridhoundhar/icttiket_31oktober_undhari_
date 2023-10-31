<?php
    include "../config/conn.php";

    if(isset($_GET['success']) && $_GET['success'] == 1) {
        echo "<p class='alert alert-success mt-2 p-2'>Data berhasil dihapus.</p>";
    }

    function displayData($data) {

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
            echo "<td><a href='edit.php?id=".$row['Request_ID'] ."' class='bi bi-pencil'></a> <a href='delete_exel.php?id=".$row['Request_ID']."' class='bi bi-trash' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'></a></td>";

            echo "</tr>";

            $no++;
        }
    }

    echo '<form method="GET" action="">';
    echo '<div class="d-flex justify-content-between" style="width:250px;">'; 
    echo '<div class="col-auto">';
    echo '<input class="form-control" type="text" name="search" id="search" placeholder="Request ID...">';
    echo '</div>';
    echo '<button class="btn btn-primary bi bi-search" type="submit"></button>';
    echo '</div>';
    echo '</form>';


    if(isset($_GET['search']) && !empty($_GET['search'])) {
        $searchTerm = $_GET['search'];

        $sqlSearch = "SELECT * FROM exel WHERE Request_ID LIKE '%$searchTerm%'";
        $resultSearch = $conn->query($sqlSearch);

        if ($resultSearch->num_rows > 0) {
            $dataSearch = $resultSearch->fetch_all(MYSQLI_ASSOC);

            //hasil pencarian
            displayData($dataSearch);
        } else {
            echo "<p class='alert alert-danger mt-2 p-2'>Data tidak ditemukan dengan Id $searchTerm </p>";
        }
    } else {
        //data lengkap
        $sql = "SELECT * FROM exel";
        $result = $conn->query($sql);

        displayData($result->fetch_all(MYSQLI_ASSOC));
    }

    $conn->close();
?>
