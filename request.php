<!DOCTYPE html>
<html>
<head>
    <title>Data Request Teknisi</title>
</head>
<body>
<?php
if (isset($_GET['technician'])) {
    $technician = urldecode($_GET['technician']);
    
    include "config/conn.php";
    
    $query = "SELECT * FROM exel WHERE Technician = '$technician'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<h1>Data Request untuk Technician: " . $technician . "</h1>";
        
        echo "<table border='1'>";
        echo "<tr>";
        
        echo "<th>No</th>";
        
        $row = mysqli_fetch_assoc($result);
        foreach ($row as $col_name => $col_value) {
            if ($col_name != 'id') {
                echo "<th>" . $col_name . "</th>";
            }
        }
        echo "</tr>";
        
        mysqli_data_seek($result, 0);

        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            
            echo "<td>" . $no++ . "</td>";
            
            foreach ($row as $col_name => $col_value) {
                if ($col_name != 'id') {
                    echo "<td>" . $col_value . "</td>";
                }
            }
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "Tidak ada data request untuk Technician: " . $technician;
    }
    
    mysqli_close($conn);
} else {
    echo "Teknisi tidak dipilih.";
}
?>
</body>
</html>
