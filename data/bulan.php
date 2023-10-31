<?php
include "../config/conn.php";

$tahun_terpilih = isset($_GET['tahun']) ? $_GET['tahun'] : date("Y");
$bulan_terpilih = isset($_GET['bulan']) ? $_GET['bulan'] : date("m");

$bulan_names = array(
    '1' => 'Januari',
    '2' => 'Februari',
    '3' => 'Maret',
    '4' => 'April',
    '5' => 'Mei',
    '6' => 'Juni',
    '7' => 'Juli',
    '8' => 'Agustus',
    '9' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember'
);

$selected_month_name = $bulan_names[$bulan_terpilih];

$bulan_awal = date('Y-m-d', strtotime("$tahun_terpilih-$bulan_terpilih-01"));
$bulan_akhir = date('Y-m-d', strtotime("$bulan_awal +1 month -1 day"));

if (isset($_POST['search'])) {
    $searchKeyword = mysqli_real_escape_string($conn, $_POST['searchKeyword']);
    $sql = "SELECT id, nama, universitas, jenis_kelamin, tgl_masuk, tgl_keluar, gambar,
            TIMESTAMPDIFF(MONTH, tgl_masuk, tgl_keluar) AS jumlah_bulan,
            CASE
                WHEN tgl_keluar < NOW() THEN 'Non Aktif'
                ELSE 'Aktif'
            END AS status,
            DATEDIFF(tgl_keluar, NOW()) AS selisih_hari,
            ROUND(DATEDIFF(tgl_keluar, NOW()) / 7) AS selisih_minggu
            FROM pM_ict
            WHERE (tgl_masuk <= ? AND tgl_keluar >= ?) AND (nama LIKE ?)";
    $stmt = mysqli_prepare($conn, $sql);
    $searchKeyword = "%" . $searchKeyword . "%";
    mysqli_stmt_bind_param($stmt, "sss", $bulan_akhir, $bulan_awal, $searchKeyword);
} else {
    // Gunakan query SQL awal jika tidak ada pencarian
    $sql = "SELECT id, nama, universitas, jenis_kelamin, tgl_masuk, tgl_keluar, gambar,
            TIMESTAMPDIFF(MONTH, tgl_masuk, tgl_keluar) AS jumlah_bulan,
            CASE
                WHEN tgl_keluar < NOW() THEN 'Non Aktif'
                ELSE 'Aktif'
            END AS status,
            DATEDIFF(tgl_keluar, NOW()) AS selisih_hari,
            ROUND(DATEDIFF(tgl_keluar, NOW()) / 7) AS selisih_minggu
            FROM pM_ict
            WHERE (tgl_masuk <= ? AND tgl_keluar >= ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $bulan_akhir, $bulan_awal);
}

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>
    <select id="bulan" class="form-select" onchange="gantiBulan()">
        <?php
        for ($bulan_option = 1; $bulan_option <= 12; $bulan_option++) {
            $selected = ($bulan_option == $bulan_terpilih) ? 'selected' : '';
            echo "<option value='$bulan_option' $selected>" . $bulan_names[$bulan_option] . "</option>";
        }
        ?>
    </select><br>

    <form method='post' action=''>
        <div class='d-flex justify-content-between' style='width:250px; overflow:scroll;'>
            <div class='col-auto'>
                <input type='text' class='form-control' name='searchKeyword' placeholder='Nama...' />
            </div>
            <div class='col-auto'>
                <button type='submit' class='btn btn-primary' name='search'>
                    <i class='bi bi-search'></i>
                </button>
            </div>
        </div>
    </form>

    <p class='mt-2'> Data Pada <?= date('d') ?> - <?= $selected_month_name ?> - <?= $tahun_terpilih ?></p>

    <?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table' style='font-size:12px;'>";
        echo "<tr><th>No</th><th>Nama</th><th>Perg</th><th>Jenis Kelamin</th><th>Tanggal Masuk</th><th>Tanggal Keluar</th><th>Bulan</th><th>Gambar</th><th>Status</th><th>Selisih</th><th>Aksi</th><th>Kartu</th></tr>";
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $no . ".</td>";
            echo "<td>" . htmlspecialchars($row["nama"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["universitas"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["jenis_kelamin"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["tgl_masuk"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["tgl_keluar"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["jumlah_bulan"]) . " Bulan</td>";
            echo "<td><img src='" . htmlspecialchars($row["gambar"]) . "' alt='Gambar' width='60'></td>";

            if ($row["status"] === 'Aktif') {
                echo "<td><span class='badge bg-success'><i class='bi bi-check-circle'></i> Aktif</span></td>";
            } else {
                echo "<td><span class='badge bg-danger'><i class='bi bi-x-circle'></i> Non Aktif</span></td>";
            }

            echo "<td>" . htmlspecialchars($row["selisih_hari"]) . " hari / " . htmlspecialchars($row["selisih_minggu"]) . " Minggu</td>";
            echo "<td><a href='edit_magang.php?id=" . $row["id"] . "' class='bi bi-pencil text-black'> Edit</a> | <a href='../data/hapus_magang.php?id=" . $row["id"] . "' class='bi bi-trash text-black' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data?\")'>Hapus</a></td>";

            echo "<td><a href='kartu.php?id=" . $row["id"] . "' class='bi bi-printer text-black'>Buat Kartu</a></td>";

            echo "</tr>";
            $no++;
        }

        echo "</table>";
    } else {
        echo "Tidak Ada Data tanggal " . date('d') . " - " . $selected_month_name . " - " . $tahun_terpilih . "";
    }
    ?>

    <script>
        function gantiBulan() {
            var selectedBulan = document.getElementById('bulan').value;
            var tahun_terpilih = <?= $tahun_terpilih ?>;
            window.location.href = 'bulan.php?tahun=' + tahun_terpilih + '&bulan=' + selectedBulan;
        }
    </script>

<?php
mysqli_close($conn);
?>
