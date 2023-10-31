<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login.html");
    exit();
}
include "../app/title.php";
?>

<?php include "../app/main.php"; ?>
<head>
    <link rel="stylesheet" href="../assets/css/costum.css">
</head>
<div class="conten-m">
    <div class="container mt-5" style="margin-left: 300px;width: 70rem;overflow: scroll;">
        <a class="btn btn-primary mb-3" href="import.php"><i class="bi bi-arrow-90deg-left"></i> Kembali</a>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tiket Sp/ Edit</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap5"><div>
                            <?php include "../data/data_magang.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/script.js"></script>