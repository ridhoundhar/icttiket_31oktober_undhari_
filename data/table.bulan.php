<?php 
    echo "<h2>" . date("F", mktime(0, 0, 0, $bulan, 1)) . " $tahun_terpilih</h2>";
    echo "<table class='table'>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Universitas</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
            </tr>";

    $query = "SELECT * FROM pM_ict WHERE YEAR(tgl_masuk) = $tahun_terpilih AND MONTH(tgl_masuk) = $bulan";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $dataTampil = true; 
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['universitas'] . "</td>";
        echo "<td>" . $row['jenis_kelamin'] . "</td>";
        echo "<td>" . $row['tgl_masuk'] . "</td>";
        echo "<td>" . $row['tgl_keluar'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
?>