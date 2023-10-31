<?php
    include "../config/conn.php";

    $tahun_sekarang = date("Y");

    $tahun_terpilih = isset($_GET['tahun']) ? $_GET['tahun'] : $tahun_sekarang;

    $dataBulanan = array();

    $dataTampil = false;

    for ($bulan = 1; $bulan <= 12; $bulan++) {
        $query = "SELECT COUNT(*) as jumlah FROM pM_ict WHERE YEAR(tgl_masuk) = $tahun_terpilih AND MONTH(tgl_masuk) = $bulan";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        $dataBulanan[] = $row['jumlah'];

        //echo "<h2>Data untuk Bulan " . date("F", mktime(0, 0, 0, $bulan, 1)) . " $tahun_terpilih</h2>";
        

        $query = "SELECT * FROM pM_ict WHERE YEAR(tgl_masuk) = $tahun_terpilih AND MONTH(tgl_masuk) = $bulan";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $dataTampil = true;
            
        }
    }

    mysqli_close($conn);
?>

    
<canvas id="myComboChart" width="400" height="200"></canvas>

<script>
    const dataBulanan = <?php echo json_encode($dataBulanan); ?>;

    const ctxCombo = document.getElementById('myComboChart').getContext('2d');
    const myComboChart = new Chart(ctxCombo, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [
                {
                    type: 'line',
                    label: 'Data Bulan',
                    data: dataBulanan,
                    backgroundColor: 'orange',
                    borderColor: 'orange',
                    borderWidth: 2,
                    fill: false,
                    pointRadius: 2, 
                    tension: 1,
                },
                {
                    type: 'bar',
                    label: 'data bulan',
                    data: dataBulanan,
                    backgroundColor: 'lightblue',
                },
                {
                    type: 'line',
                    label: 'Data Bulanan',
                    data: dataBulanan,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderWidth: 1,
                    fill: true,
                    tension: 1,
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    display: true, 
                },
                x: {
                    display: false, 
                }
            },
            plugins: {
                legend: {
                    display: false,
                }
            }
        }
    });
</script>
