<?php
require "../config/conn.php";
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login.html");
    exit();
}
include "../app/title.php";
?>

<?php
    include "../app/main2.php"; 
    include "../app/setting_style.php";
?>

<head>
    <link rel="stylesheet" href="../assets/css/costum.css">
</head>
<div class="conten-m">
    <?php include "../data/content.jumlah.data.php"; ?>
</div>
