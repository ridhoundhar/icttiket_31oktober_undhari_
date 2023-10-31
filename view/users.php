
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
    <a href="tambah_users.php" class="btn btn-primary"><i class="bi bi-person-add"></i> Tambah</a><br><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a style="text-decoration: none;" href="index.php" class="m-0 font-weight-bold text-primary">home\</a> Users
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div>
                <table class="table mt-2" cellpadding="1" width="100%" style='font-size:12px;'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>edit</th>
                        </tr>
                    </thead>
                    <?php 
                        include "../data/users.php";
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
