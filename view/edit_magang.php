<?php
    include "../config/conn.php";

    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT id, nama, universitas, jenis_kelamin, tgl_masuk, tgl_keluar, gambar
                FROM pM_ict
                WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $editResult = mysqli_stmt_get_result($stmt);
        
        if (mysqli_num_rows($editResult) === 1) {
            $row = mysqli_fetch_assoc($editResult);
        } else {
            echo "data tidak ditemukan.";
            exit();
        }
    } else {
        echo "Permintaan tidak valid. Harap berikan parameter 'id'.";
        exit();
    }
    ?>

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
    <div class="d-flex  mb-3">
        <a href="magang.php" class="btn btn-primary" id="tambah"><i class="bi bi-arrow-90deg-left"></i> Kembali</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="magang.php" style='text-decoration:none;'>Tiket Sp</a> \ Edit \ <?php echo htmlspecialchars($row['nama']); ?> </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div>
                    <table class='table' style='font-size:12px; overflow: scroll;'>
                        <form method="post" action="proses_edit.php" enctype="multipart/form-data">
                            <div class="d-flex justify-content-between">
                                <div class="col-md-4">
                                    <label>Gambar:</label>
                                    <div class="d-flex mt-3" style="overflow: hidden; height: 550px;">
                                        <img class="p-2 text-center" src='<?php echo $row['gambar']; ?>' alt='Gambar Saat Ini' style="object-fit: cover; width: 100%; height: 100%;">
                                    </div>
                                </div>
                                <div class="col-md-8 mt-5">
                                    <input class="p-2 form-control" value="<?php echo $row['gambar']; ?>" type='file' name='new_image' accept='image/*' /><br>
                                    <input type='hidden' name='id' value='<?php echo $row['id']; ?>' />
                                    <label>Nama:</label>
                                    <input class="form-control" type='text' name='nama' value='<?php echo htmlspecialchars($row['nama']); ?>' /><br>
                                    <label>Preg:</label>
                                    <input class="form-control" type='text' name='universitas' value='<?php echo htmlspecialchars($row['universitas']); ?>' /><br>
                                    <label>Jenis Kelamin:</label>
                                    <input class="form-control" type='text' name='jenis_kelamin' value='<?php echo htmlspecialchars($row['jenis_kelamin']); ?>' /><br>
                                    <label>Tanggal Masuk:</label>
                                    <input class="form-control" type='date' name='tgl_masuk' value='<?php echo htmlspecialchars($row['tgl_masuk']); ?>' /><br>
                                    <label>Tanggal Keluar:</label>
                                    <input class="form-control" type='date' name='tgl_keluar' value='<?php echo htmlspecialchars($row['tgl_keluar']); ?>' /><br>
                                    <button class="btn btn-primary bi bi-save" type='submit' name='update'> Simpan</button>
                                </div>
                            </div>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
