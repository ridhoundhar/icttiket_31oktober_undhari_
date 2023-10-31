<?php
require '../vendor/autoload.php';

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tiket";

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['uploadBtn']) && $_FILES['excelFile']['error'] === UPLOAD_ERR_OK) {
    $inputFileName = $_FILES['excelFile']['tmp_name'];

    try {
        $spreadsheet = IOFactory::load($inputFileName);
        $worksheet = $spreadsheet->getActiveSheet();

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $barisAwal = 10;
        foreach ($worksheet->getRowIterator() as $indeks => $baris) {
            if ($indeks < $barisAwal) {
                continue;
            }

            $dataBaris = [];
            $iteratorSel = $baris->getCellIterator();
            $iteratorSel->setIterateOnlyExistingCells(false);

            foreach ($iteratorSel as $sel) {
                $dataBaris[] = $sel->getValue();
            }

            if (count($dataBaris) >= 12) {
                $rawChangeID = $dataBaris[1];

                if ($rawChangeID instanceof \PhpOffice\PhpSpreadsheet\RichText\RichText) {
                    $rawChangeID = $rawChangeID->getPlainText();
                }

                $changeID = $rawChangeID;
                $rawrequestID = $dataBaris[2];
                if ($rawrequestID instanceof \PhpOffice\PhpSpreadsheet\RichText\RichText) {
                    $rawrequestID = $rawrequestID->getPlainText();
                }
                $requestID = $rawrequestID;
                $subject = $dataBaris[3];
                $requester = $dataBaris[4];
                $requestStatus = $dataBaris[5];
                $priority = $dataBaris[6];
                $requestType = $dataBaris[7];
                $technician = $dataBaris[8];
                $site = $dataBaris[9];
                $createdTime = $dataBaris[10];
                $dueByTime = $dataBaris[11];

                // cek Request_ID 
                $checkStmt = $conn->prepare("SELECT * FROM exel WHERE Request_ID = :request_id");
                $checkStmt->bindParam(':request_id', $requestID, PDO::PARAM_INT);
                $checkStmt->execute();

                if ($checkStmt->rowCount() > 0) {
                    // update data
                    $updateStmt = $conn->prepare("UPDATE exel SET Change_ID = :change_id, Subject = :subject, Requester = :requester, Request_Status = :request_status, Priority = :priority, Request_Type = :request_type, Technician = :technician, Site = :site, Created_Time = :created_time, DueBy_Time = :dueby_time WHERE Request_ID = :request_id");
                    $updateStmt->bindParam(':change_id', $changeID);
                    $updateStmt->bindParam(':request_id', $requestID, PDO::PARAM_INT);
                    $updateStmt->bindParam(':subject', $subject);
                    $updateStmt->bindParam(':requester', $requester);
                    $updateStmt->bindParam(':request_status', $requestStatus);
                    $updateStmt->bindParam(':priority', $priority);
                    $updateStmt->bindParam(':request_type', $requestType);
                    $updateStmt->bindParam(':technician', $technician);
                    $updateStmt->bindParam(':site', $site);
                    $updateStmt->bindParam(':created_time', $createdTime);
                    $updateStmt->bindParam(':dueby_time', $dueByTime);
                    $updateStmt->execute();
                } else {
                    //INSERT data
                    $insertStmt = $conn->prepare("INSERT INTO exel (Change_ID, Request_ID, Subject, Requester, Request_Status, Priority, Request_Type, Technician, Site, Created_Time, DueBy_Time) VALUES (:change_id, :request_id, :subject, :requester, :request_status, :priority, :request_type, :technician, :site, :created_time, :dueby_time)");
                    $insertStmt->bindParam(':change_id', $changeID);
                    $insertStmt->bindParam(':request_id', $requestID, PDO::PARAM_INT);
                    $insertStmt->bindParam(':subject', $subject);
                    $insertStmt->bindParam(':requester', $requester);
                    $insertStmt->bindParam(':request_status', $requestStatus);
                    $insertStmt->bindParam(':priority', $priority);
                    $insertStmt->bindParam(':request_type', $requestType);
                    $insertStmt->bindParam(':technician', $technician);
                    $insertStmt->bindParam(':site', $site);
                    $insertStmt->bindParam(':created_time', $createdTime);
                    $insertStmt->bindParam(':dueby_time', $dueByTime);
                    $insertStmt->execute();
                }
            }
        }

        echo "
            <script>
                alert('Data berhasil diimport!');
                window.location.href = 'import.php';
            </script>";
    } catch (PDOException $pdoException) {
        echo 'Kesalahan Database: ' . $pdoException->getMessage();
    } catch (Exception $e) {
        echo 'Kesalahan: ' . $e->getMessage();
    }
} else {
    echo "
        <script>
            alert('Harap pilih file Excel terlebih dahulu!');
            window.location.href = 'import.php';
        </script>";
}
?>
