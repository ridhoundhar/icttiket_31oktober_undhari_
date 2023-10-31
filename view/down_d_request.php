<?php
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tiket";

$tipePermintaan = "Demand Request"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM exel WHERE Request_Type = '$tipePermintaan'";
$result = $conn->query($sql);
$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            $row['Change_ID'],
            $row['Request_ID'],
            $row['Subject'],
            $row['Requester'],
            $row['Request_Status'],
            $row['priority'],
            $row['Request_Type'],
            $row['Technician'],
            $row['Site'],
            $row['Created_Time'],
            $row['DueBy_Time'],
            $row['Ket'],
        ];
    }
}

$conn->close();

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$judulSpreadsheet = "Tiket Sp: $tipePermintaan";
$sheet->setCellValue('B1', $judulSpreadsheet);

$headerKolom = ["Change ID", "Request ID", "Subject", "Requester", "Request Status", "Priority", "Request Type", "Technician", "Site", "Created Time", "Due By Time", "Ket"];
$barisHeader = 2; 
$kolom = 'B';

foreach ($headerKolom as $header) {
    $sheet->setCellValue($kolom . $barisHeader, $header);
    $kolom++;
}

$barisData = $barisHeader + 1;

foreach ($data as $rowData) {
    $kolom = 'B';

    foreach ($rowData as $value) {
        $sheet->setCellValue($kolom . $barisData, $value);
        $kolom++;
    }
    $barisData++;
}

$writer = new Xlsx($spreadsheet);
$namaFile = 'data_excel_' . date('YmdHis') . '.xlsx';
$writer->save($namaFile);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $namaFile . '"');
header('Cache-Control: max-age=0');
header('Expires: 0');
header('Pragma: public');
header('Content-Length: ' . filesize($namaFile));
readfile($namaFile);
unlink($namaFile);
exit;
?>
