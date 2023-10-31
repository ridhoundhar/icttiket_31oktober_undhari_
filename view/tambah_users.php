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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tiket Sp/ Magang ICT</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4x"><div>
                    <?php
                        if(isset($_GET['success']) && $_GET['success'] == 1) {
                            echo "<p class='alert alert-success mt-2 p-2'>Data berhasil Di Tambhkan.</p>";
                        }
                    ?>
                    <form method="post" action="insert_user.php">
                        <label for="username">Username:</label>
                        <input class="form-control" type="text" id="username" name="username" required><br>

                        <label for="password">Password:</label>
                        <input class="form-control" type="password" id="password" name="password" required><br>

                        <label for="email">Email:</label>
                        <input class="form-control"  type="email" id="email" name="email" required><br>

                        <label for="role">Role:</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="users">Users</option>
                        </select><br>

                        <button class="btn btn-primary mt-3" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
