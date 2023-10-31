<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login.html");
    exit();
}
include "../app/title.php";
?>

<?php include "../app/main2.php"; ?>
<head>
    <link rel="stylesheet" href="../assets/css/costum.css">
</head>
<div class="conten-m" id="data_mg" style="overflow: scroll;">
    <div class="d-flex  mb-3">
        <a href="tambah_magang.php" class="btn btn-primary" id="tambah"><i class="bi bi-person-add"></i> Tambah</a>
    </div>
     <?php include "../data/data_magang.php"; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tiket Sp\ Magang ICT\ tahun</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div>
                    <table class='table' style='font-size:12px;'>
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
                        <?php include "../data/tahun.php"; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
