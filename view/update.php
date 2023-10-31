<?php
    include "../config/conn.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $requestID = $_POST['requestID'];
        $priority = $_POST['priority'];
        $progresMingguIni = $_POST['progresMingguIni'];
        $progresMingguLalu = $_POST['progresMingguLalu'];
        $keteranganStopper = $_POST['keteranganStopper'];

        $sql = "UPDATE exel SET priority='$priority', Progres_Minggu_Ini='$progresMingguIni', Proggres_Minggu_Lalu='$progresMingguLalu', Keterangan_Stopper='$keteranganStopper' WHERE Request_ID='$requestID'";

        if ($conn->query($sql) === TRUE) {
            echo "<p class='alert alert-primary'>Data Berhasil di Update</p>";
        } else {
            echo "Error: " . $sql . "<br>";
        }
    }

    $conn->close();
?>