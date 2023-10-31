<?php
include "../config/conn.php";

$tahun_terpilih = isset($_GET['tahun']) ? $_GET['tahun'] : date("Y");

$dataTampil = false;

?>
    <select id="bulan" class="form-select" onchange="gantiBulan()">
        <?php
            for ($bulan_option = 1; $bulan_option <= 12; $bulan_option++) {
                $selected = ($bulan_option == $bulan_terpilih) ? 'selected' : '';
                echo "<option value='$bulan_option' $selected>" . $bulan_indonesia[$bulan_option - 1] . "</option>";
            }
        ?>
    </select><br>
<?php 

echo "<form method='post' action=''>";
echo "<div class='d-flex' style='width:400px; overflow:scroll;'>";
echo "<div class='col-auto'>";
echo "<input type='text' class='form-control' name='searchKeyword' placeholder='Nama...' /></div>";
echo "<div class='col-auto'>";
echo "<button type='submit' class='btn btn-primary' name='search'/><i class='bi bi-search'></i></button></div></div>";
echo "</form>";

echo "<h6 class='mt-2' > Tahun $tahun_terpilih</h6>";
echo "<table class='table' style='font-size :12px;'>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Perg</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Keluar</th>
            <th>gambar</th>
            <th>Status</th>
            <th>Selisih</th>
            <th>Aksi</th>
            <th>Kartu</th>
        </tr>";

$query = "SELECT * FROM pM_ict WHERE YEAR(tgl_masuk) = $tahun_terpilih";

$result = mysqli_query($conn, $query);
$no = 1;

while ($row = mysqli_fetch_assoc($result)) {
    $dataTampil = true;
    echo "<tr>";
    echo "<td>" . $no . ".</td>";
    echo "<td>" . $row['nama'] . "</td>";
    echo "<td>" . $row['universitas'] . "</td>";
    echo "<td>" . $row['jenis_kelamin'] . "</td>";
    echo "<td>" . $row['tgl_masuk'] . "</td>";
    echo "<td>" . $row['tgl_keluar'] . "</td>";
    echo "<td><img src='" . htmlspecialchars($row["gambar"]) . "' alt='Gambar' width='60'></td>";

    $status = ($row['tgl_keluar'] < date('Y-m-d')) ? 'Non Aktif' : 'Aktif';

    $selisih_hari = date_diff(date_create($row['tgl_keluar']), date_create(date('Y-m-d')))->format('%a');
    $selisih_minggu = floor($selisih_hari / 7);

    $status_symbol = ($status === 'Aktif') ? '<span class="badge bg-success"><i class="bi bi-check-circle"></i>Aktif</span>' : '<span class="badge bg-danger"><i class="bi bi-x-circle"></i>Non Aktif</span>';

    echo "<td>" . $status_symbol . "</td>";
    echo "<td>" . htmlspecialchars($selisih_hari) . " hari / " . htmlspecialchars($selisih_minggu) . " Minggu</td>";
    echo "<td><a href='edit_magang.php?id=" . $row["id"] . "' class='bi bi-pencil text-black'> Edit</a> | <a href='../data/hapus_magang.php?id=" . $row["id"] . "' class='bi bi-trash text-black' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data?\")'>Hapus</a></td>";

    echo "<td><a href='kartu.php?id=" . $row["id"] . "' class='bi bi-printer text-black'>Buat Kartu</a></td>";

    echo "</tr>";
    $no++;
}

echo "</table>";

if (!$dataTampil) {
    echo "<p>Tidak ada data untuk tahun $tahun_terpilih</p>";
}

mysqli_close($conn);
?>
