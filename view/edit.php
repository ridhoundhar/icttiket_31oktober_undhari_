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
<div class="conten-m">
    <a class="btn btn-primary mb-3" href="import.php"><i class="bi bi-arrow-90deg-left"></i> Kembali</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tiket Sp/ Edit</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div>
                        <?php include "../data/edit.php"; ?>
                        <?php include "update.php";?>
                        <form action="" method="POST">
                            <input type="hidden" name="requestID" value="<?php echo $row['Request_ID']; ?>">

                            <label for="priority">Priority:</label>
                            <input class="form-control" type="text" name="priority" value="<?php echo $row['priority']; ?>">

                            <label for="progresMingguIni">Progres Minggu Ini :</label>
                            <input class="form-control" type="text" name="progresMingguIni" value="<?php echo $row['Progres_Minggu_Ini']; ?>">

                            <label for="progresMingguLalu">Progres Minggu Lalu :</label>
                            <input class="form-control" type="text" name="progresMingguLalu" value="<?php echo $row['Proggres_Minggu_Lalu']; ?>">

                            <label for="keteranganStopper">Keterangan/Stopper:</label>
                            <textarea class="form-control" name="keteranganStopper"><?php echo $row['Keterangan_Stopper']; ?></textarea>

                            <button class="btn btn-primary mt-3" type="submit">Simpan</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>