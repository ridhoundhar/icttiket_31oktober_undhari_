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
<div class="conten-m" id="data_mg">
    <div class="d-flex mb-3">
        <a href="magang.php" class="btn btn-primary"><i class="bi bi-arrow-90deg-left"></i> Kembali</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Magang ICT\ Tambah Data</h6>
        </div>
        <div class="card-body">
            <?php include 'proses_tambah.php'; ?>
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div>
                    <table class='table' style='font-size:12px;'>
                        <form action="" method="POST" enctype="multipart/form-data">     
                            <label for="nama">Nama:</label>
                            <input class="form-control" type="text" name="nama" required>
                            <label for="universitas">Universitas:</label>
                            <input class="form-control" type="text" name="universitas" required>

                            <label for="jenis_kelamin">Jenis Kelamin:</label>
                            <select class="form-control" name="jenis_kelamin" required>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        
                            <label for="tgl_masuk">Tanggal Masuk:</label>
                            <input class="form-control" type="date" name="tgl_masuk" required>

                            <label for="tgl_keluar">Tanggal Keluar:</label>
                            <input class="form-control" type="date" name="tgl_keluar">

                            <label for="gambar">Unggah Gambar:</label>
                            <input class="form-control " type="file" name="gambar" id="gambar">
                            
                            <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-save"></i> Simpan</button>
                        </form>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- form tambah -->

