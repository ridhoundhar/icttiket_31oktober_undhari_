<?php
$conn = mysqli_connect("localhost", "root", "root", "tiket");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$tahun_terpilih = isset($_GET['tahun']) ? $_GET['tahun'] : date("Y");
$bulan_terpilih = isset($_GET['bulan']) ? $_GET['bulan'] : date("n");

$query = "SELECT * FROM pM_ict WHERE YEAR(tgl_masuk) = $tahun_terpilih AND MONTH(tgl_masuk) = $bulan_terpilih";
$result = mysqli_query($conn, $query);

$dataTampil = false;

// Menampilkan Data
if (mysqli_num_rows($result) > 0) {
    $dataTampil = true;

    echo "<h2>Data untuk Bulan " . date("F", mktime(0, 0, 0, $bulan_terpilih, 1)) . " $tahun_terpilih</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Universitas</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>gambar</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['universitas'] . "</td>";
        echo "<td>" . $row['jenis_kelamin'] . "</td>";
        echo "<td>" . $row['tgl_masuk'] . "</td>";
        echo "<td>" . $row['tgl_keluar'] . "</td>";
        echo "<td>" . $row['gambar'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Tidak ada data untuk Bulan " . date("F", mktime(0, 0, 0, $bulan_terpilih, 1)) . " $tahun_terpilih</p>";
}

mysqli_close($conn);
?>
