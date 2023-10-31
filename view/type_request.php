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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="index.php" style="text-decoration:none;" class="m-0 font-weight-bold text-primary">home\</a> Tiket Sp\
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <table class='table' style='font-size:12px;'>
                            <tr>
                                <th>No</th>
                                <th>Change ID</th>
                                <th>Request ID</th>
                                <th>Subject</th>
                                <th>Requester</th>
                                <th>Request Status</th>
                                <th>Request Type</th>
                                <th>Technician</th>
                                <th>Site</th>
                                <th>Created Time</th>
                                <th>Due By Time</th>
                                <th>Priority</th>
                                <th>Progres Minggu Ini</th>
                                <th>Proggres Minggu Lalu</th>
                                <th>Ket</th>
                                <th>edit</th>
                            </tr>
                        </thead>
                        <?php include "../data/deman.request.php"; ?>
                    </table>
                    <?php
                        $downloadLink = "download_data.php?request_type=" . urlencode($requestType);
                        echo "<a class='btn btn-primary bi bi-box-arrow-in-down' href='$downloadLink' target='_blank'>Download</a>";
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
