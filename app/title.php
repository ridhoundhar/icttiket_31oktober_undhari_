<?php
$pageTitle = "";

// Set judul halaman berdasarkan nama file
if (basename($_SERVER['PHP_SELF']) === 'import.php') {
    $pageTitle = "data";
}elseif (basename($_SERVER['PHP_SELF']) === 'index.php') {
    $pageTitle = "Home";
}
 elseif (basename($_SERVER['PHP_SELF']) === 'd_request.php') {
    $pageTitle = "Demand Request";
} elseif (basename($_SERVER['PHP_SELF']) === 'request.php') {
    $pageTitle = "Request";
} elseif (basename($_SERVER['PHP_SELF']) === 'history.php') {
    $pageTitle = "History";
}elseif (basename($_SERVER['PHP_SELF']) === 'tek_data_1.php') {
    $pageTitle = "Data_SISI - Lusi Efrenti";
}
elseif (basename($_SERVER['PHP_SELF']) === 'tek_data_2.php') {
    $pageTitle = "Data_Auguswya Syaputra";
}
elseif (basename($_SERVER['PHP_SELF']) === 'magang.php') {
    $pageTitle = "Peserta Magang";
}
elseif (basename($_SERVER['PHP_SELF']) === 'tambah_magang.php') {
    $pageTitle = "Tambah Data";
}
elseif (basename($_SERVER['PHP_SELF']) === 'edit.php') {
    $pageTitle = "Edit Data";
}
elseif (basename($_SERVER['PHP_SELF']) === 'edit_magang.php') {
    $pageTitle = "Edit Magang";
}
elseif (basename($_SERVER['PHP_SELF']) === 'data_magang.php') {
    $pageTitle = "Data Magang";
}
elseif (basename($_SERVER['PHP_SELF']) === 'bulan.php') {
    $pageTitle = "bulan Magang";
}
elseif (basename($_SERVER['PHP_SELF']) === 'tahun.php') {
    $pageTitle = "tahun Magang";
}
elseif (basename($_SERVER['PHP_SELF']) === 'tekni.php') {
    $pageTitle = "Teknisi";
}
elseif (basename($_SERVER['PHP_SELF']) === 'type_request.php') {
    $pageTitle = "Data ";
}
elseif (basename($_SERVER['PHP_SELF']) === 'users.php') {
    $pageTitle = "Users ";
}
elseif (basename($_SERVER['PHP_SELF']) === 'tambah_users.php') {
    $pageTitle = "Users ";
}
?>
