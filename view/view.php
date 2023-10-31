<?php
    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: ../login.html");
        exit();
    }
    include "../app/title.php";
?>
<head>
    <link rel="stylesheet" href="../assets/css/costum.css">
</head>

<?php include '../app/main2.php' ; ?>
<div class="conten-m height-100 bg-light">
<div class="mt-5" id="data_mg">
        <a href="tambah_magang.php" class="btn btn-primary" id="tambah"><i class="bi bi-person-add"></i> Tambah</a>
        <?php include "../data/data_magang.php"; ?>
        <table class='table'>
        <!-- tahun -->
        <select id="tahun" class="form-select" onchange="gantiTahun()">
            <?php
                // Loop tahun
                for ($tahun_option = $tahun_sekarang; $tahun_option >= 2020; $tahun_option--) {
                    // cek tahun
                    $selected = ($tahun_option == $tahun_terpilih) ? 'selected' : '';
                    echo "<option value='$tahun_option' $selected>Tahun $tahun_option</option>";
                }
            ?>
        </select>
        <!-- bulan -->
        <br>
        <?php include "../data/bulan.php"; ?>
    </table>
</div>
</div>


