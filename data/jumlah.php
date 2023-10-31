<?php
    // include "../config/conn.php";

    // $sql = "SELECT * FROM exel";
    // $result = $conn->query($sql);

    // $totalData = $result->num_rows;

    // $sqlDemand = "SELECT * FROM exel WHERE Request_Type = 'Demand Request'";
    // $resultDemand = $conn->query($sqlDemand);
    // $totalDemand = $resultDemand->num_rows;

    // $sqlRequest = "SELECT * FROM exel WHERE Request_Type = 'Request'";
    // $resultRequest = $conn->query($sqlRequest);
    // $totalRequest = $resultRequest->num_rows;

    // $totalDemandAndRequest = $totalDemand + $totalRequest;

    // if ($totalData > 0) {
    //     $percentageTotalDemandAndRequest = ($totalDemandAndRequest / $totalData) * 100;
    // } else {
    //     $percentageTotalDemandAndRequest = 0;
    // }
?>
<?php
include "../config/conn.php";

$sql = "SELECT COUNT(*) AS jumlah_peserta FROM pM_ict";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $jumlah_peserta = $row['jumlah_peserta'];
} else {
    echo "Tidak ada data yang ditemukan.";
}

$sqlTotalData = "SELECT COUNT(*) as total FROM exel";
$resultTotalData = $conn->query($sqlTotalData);
$totalData = $resultTotalData->fetch_assoc()["total"];

$sqlDemand = "SELECT COUNT(*) as total FROM exel WHERE Request_Type = 'Demand Request'";
$resultDemand = $conn->query($sqlDemand);
$totalDemand = $resultDemand->fetch_assoc()["total"];

$sqlRequest = "SELECT COUNT(*) as total FROM exel WHERE Request_Type = 'Request'";
$resultRequest = $conn->query($sqlRequest);
$totalRequest = $resultRequest->fetch_assoc()["total"];

$sqlTechnician = "SELECT Technician, Request_Type, COUNT(*) as total FROM exel GROUP BY Technician, Request_Type";
$resultTechnician = $conn->query($sqlTechnician);

$sqlTotalTechnicians = "SELECT COUNT(DISTINCT Technician) as total FROM exel";
$resultTotalTechnicians = $conn->query($sqlTotalTechnicians);
$totalTechnicians = $resultTotalTechnicians->fetch_assoc()["total"];

$jumlahPesertaJkelamin = "SELECT COUNT(DISTINCT jenis_kelamin) as total FROM pM_ict";

$totalDemandAndRequest = $totalDemand + $totalRequest;

$sqlRequestTypes = "SELECT DISTINCT Request_Type FROM exel";
$resultRequestTypes = $conn->query($sqlRequestTypes);

if ($totalData > 0) {
    $percentageTotalDemandAndRequest = ($totalDemandAndRequest / $totalData) * 100;
} else {
    $percentageTotalDemandAndRequest = 0;
}

$query = "SELECT Request_Type, COUNT(*) as total FROM exel GROUP BY Request_Type";
$result = mysqli_query($conn, $query);

if ($result) {
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $requestType = $row['Request_Type'];
        $total = $row['total'];
        $data[] = array("label" => $requestType, "y" => $total);
    }
} else {
    echo "Gagal menjalankan query: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

