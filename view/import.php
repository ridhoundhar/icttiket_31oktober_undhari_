
<?php
    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: ../login.html");
        exit();
    }
    include "../app/title.php";
    //include "../app/profile.php";
?>

<?php include "../app/main2.php"; ?>
<head>
    <link rel="stylesheet" href="../assets/css/costum.css">
</head>
<div class="conten-m">
  <h2>Import Data</h2>
    <form class="row g-3" action="proses.php" method="POST" enctype="multipart/form-data">
        <div class="col-auto">
            <input class="form-control" type="file" name="excelFile" id="excelFile" accept=".xlsx, .xls">
        </div>
        <div class="col-auto">
            <button class="btn btn-primary" type="submit" name="uploadBtn"><i class="bi bi-cloud-upload"></i></button>
        </div>
    </form><br>
    <a href="tambah.php" class="btn btn-primary"><i class="bi bi-person-add"></i> Tambah</a><br><br>
    <div class="card shadow mb-4">
        <div class="d-flex justify-content-between card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tiket</h6>
            <div class="col-auto">
                <!-- <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                    <?php 
                        //include "../data/type_request.php";
                    ?>
                </div> -->
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div>
                    <table class="table mt-2" cellpadding="1" width="100%" style='font-size:12px;'>
                        <thead>
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
                        <?php include "../data/data_exel.php"; ?>
                        <!-- Display data rows here -->
                    </table>
                    </table>
                    <a class='btn btn-primary bi bi-box-arrow-in-down' href='download.php'> Download Excel</a>
                    <div class="d-flex justify-content-end column-gap-2 my-2">
                        <div class="d-flex justify-content-end column-gap-2 my-2">
                            <div>
                                <a href="" class="btn btn-primary"><i class='bx bx-chevron-left'></i> Prev</a>
                            </div>
                            <div>
                                <a href="" class="btn btn-primary">Next <i class='bx bx-chevron-right'></i></a>
                            </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
