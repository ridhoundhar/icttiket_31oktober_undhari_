<?php
$conn = mysqli_connect("localhost", "root", "root", "tiket");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$tahun_sekarang = date("Y");

$tahun_terpilih = isset($_GET['tahun']) ? $_GET['tahun'] : $tahun_sekarang;

$dataBulanan = array();

$dataTampil = false;

for ($bulan = 1; $bulan <= 12; $bulan++) {
    $query = "SELECT COUNT(*) as jumlah FROM pM_ict WHERE YEAR(tgl_masuk) = $tahun_terpilih AND MONTH(tgl_masuk) = $bulan";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);

    $dataBulanan[] = $row['jumlah'];

    echo "<h2>Data untuk Bulan " . date("F", mktime(0, 0, 0, $bulan, 1)) . " $tahun_terpilih</h2>";
    echo "<table border='1'>
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
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Grafik Data Bulanan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Data Bulanan</h2>
    
    <p>Pilih Tahun:
        <select id="tahun" onchange="gantiTahun()">
            <?php
            // Loop tahun
            for ($tahun_option = $tahun_sekarang; $tahun_option >= 2020; $tahun_option--) {
                // cek tahun
                $selected = ($tahun_option == $tahun_terpilih) ? 'selected' : '';
                echo "<option value='$tahun_option' $selected>$tahun_option</option>";
            }
            ?>
        </select>
    </p>

    <?php
    if (!$dataTampil) {
        echo "<p>Tidak ada data untuk tahun $tahun_terpilih</p>";
    }

    // Loop bulan
    for ($bulan = 1; $bulan <= 12; $bulan++) {
        // Buat bulan
        $url = "bulan.php?tahun=$tahun_terpilih&bulan=$bulan";
        echo "<p><a href='$url'>Lihat Data untuk Bulan " . date("F", mktime(0, 0, 0, $bulan, 1)) . " $tahun_terpilih</a></p>";
    }
    ?>
    
    <canvas id="myComboChart" width="400" height="200"></canvas>

<script>
    function gantiTahun() {
        const tahunTerpilih = document.getElementById('tahun').value;
        const tahunSekarang = '<?php echo $tahun_sekarang; ?>';

        const url = 'tahun.php?tahun=' + tahunTerpilih;

        window.location.href = url;
    }

    // Data bulanan
    const dataBulanan = <?php echo json_encode($dataBulanan); ?>;
    
    //  Line Chart
    const dataBulananLine = <?php echo json_encode($dataBulanan); ?>;
    
    //  Bar Chart
    const dataBulananBar = <?php echo json_encode($dataBulanan); ?>;
    
    //  Area Chart
    const dataBulananArea = <?php echo json_encode($dataBulanan); ?>;

    //  Combo Chart
    const ctxCombo = document.getElementById('myComboChart').getContext('2d');
    const myComboChart = new Chart(ctxCombo, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [
                {
                    type: 'line',
                    label: 'Line Chart Data Bulanan',
                    data: dataBulananLine,
                    borderColor: 'rgba(0, 0, 0, 0)', 
                    borderWidth: 2,
                    fill: false
                },
                {
                    type: 'bar',
                    label: 'Bar Chart Data Bulanan',
                    data: dataBulananBar,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(0, 0, 0, 0)', 
                    borderWidth: 1
                },
                {
                    type: 'line',
                    label: 'Area Chart Data Bulanan',
                    data: dataBulananArea,
                    borderColor: 'rgba(0, 0, 0, 0)', 
                    borderWidth: 2,
                    fill: true 
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


</body>
</html>
