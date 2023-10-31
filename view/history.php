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
<div class="container mt-5" style="margin-left: 300px;
  width: 70rem; 
  overflow: scroll;">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tiket Sp/ Riwayat Hapus</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div>
                    <table class='table' style='font-size:12px;'>
                        <?php include "../data/history.php"; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>