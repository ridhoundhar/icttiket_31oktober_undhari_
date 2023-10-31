<?php
    include "../config/conn.php";

    $tahun_sekarang = date("Y");

    $tahun_terpilih = isset($_GET['tahun']) ? $_GET['tahun'] : $tahun_sekarang;

    $dataBulanan = array();

    $dataTampil = false;

    $bulan_indonesia = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    for ($bulan = 1; $bulan <= 12; $bulan++) {
        $query = "SELECT COUNT(*) as jumlah FROM pM_ict WHERE YEAR(tgl_masuk) = $tahun_terpilih AND MONTH(tgl_masuk) = $bulan";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);

        $dataBulanan[] = $row['jumlah'];


    }

    mysqli_close($conn);
?>
    
    

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

    // Fungsi untuk mengubah bulan ketika pilihan bulan diubah
    function gantiBulan() {
        const tahunTerpilih = document.getElementById('tahun').value;
        const bulanTerpilih = document.getElementById('bulan').value;

        // Buat URL halaman sesuai dengan tahun dan bulan yang dipilih
        const url = 'bulan.php?tahun=' + tahunTerpilih + '&bulan=' + bulanTerpilih;

        // Redirect ke halaman sesuai tahun dan bulan
        window.location.href = url;
    }
</script>
</body>
</html>
