<?php
    require '../vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "tiket";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $requestType = $_GET['request_type'];

    $sql = "SELECT * FROM exel WHERE Request_Type = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $requestType);
    $stmt->execute();

    $result = $stmt->get_result();
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
                $row['Progres_Minggu_Ini'],
                $row['Proggres_Minggu_Lalu'],
                $row['Keterangan_Stopper']
            ];
        }
    }

    $stmt->close();
    $conn->close();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $waktuDownload = date('d M Y H:i');
    $teksHeader = "PT SEMEN INDONESIA (Persero) Tbk\n\nTiket Open MM\nDibuat oleh SISI - Lusi Efrenti pada : $waktuDownload\nTotal data : " . count($data) . "\nWaktu Pembuatan : Dari 1 Jan 2022 12:00 AM Hingga 31 Des 2023 11:59 PM";
    $sheet->setCellValue('A1', $teksHeader);

    $headerKolom = ["Change ID", "Request ID", "Subject", "Requester", "Request Status", "Priority", "Request Type", "Technician", "Site", "Created Time", "Due By Time", "Progres Minggu Ini", "Proggres Minggu Lalu", "Keterangan Stopper"];
    $barisHeader = 7;
    $kolom = 'A';

    foreach ($headerKolom as $header) {
        $sheet->setCellValue($kolom . $barisHeader, $header);
        $sheet->getStyle($kolom . $barisHeader)->getFont()->setBold(true);
        $sheet->getStyle($kolom . $barisHeader)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle($kolom . $barisHeader)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->getStyle($kolom . $barisHeader)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->getStyle($kolom . $barisHeader)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->getStyle($kolom . $barisHeader)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->getStyle($kolom . $barisHeader)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('D3D3D3');

        switch ($header) {
            case 'Change ID':
                $sheet->getColumnDimension($kolom)->setWidth(12);
                break;
            case 'Request ID':
                $sheet->getColumnDimension($kolom)->setWidth(12);
                break;
            case 'Subject':
                $sheet->getColumnDimension($kolom)->setWidth(70);
                break;
            case 'Created_Time':
                $sheet->getColumnDimension($kolom)->setWidth(30);
                break;
            case 'Due By Time':
                $sheet->getColumnDimension($kolom)->setWidth(30);
                break;
            case 'Requester':
            case 'Request_Status':
            case 'priority':
            case 'Request_Type':
            case 'Technician':
            case 'Site':
            case 'Progres Minggu Ini':
            case 'Proggres Minggu Lalu':
            case 'Keterangan Stopper':
                $sheet->getColumnDimension($kolom)->setWidth(15);
                break;
            default:
                $sheet->getColumnDimension($kolom)->setWidth(15);
        }

        $sheet->getRowDimension($barisHeader)->setRowHeight(30);
        $kolom++;
    }

    $barisData = $barisHeader + 1;

    foreach ($data as $rowData) {
        $kolom = 'A';

        foreach ($rowData as $value) {
            if (is_numeric($value)) {
                $value = floatval($value);
            }
            // kolom M
            if ($kolom == 'M') {
                if (is_numeric($value)) {
                    if ($value == 0) {
                    } elseif ($value >= 1 && $value <= 100) {
                        $value = number_format($value) . "%";
                    }
                } else {
                    $value = "";
                }
            }
            // Kolom L
            if ($kolom == 'L') {
                if (is_numeric($value)) {
                    if ($value == 0) {
                        $sheet->getStyle($kolom . $barisData)->applyFromArray([
                            'fill' => [
                                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                                'startColor' => [
                                    'rgb' => 'FF0000',
                                ],
                            ],
                        ]);
                    } elseif ($value >= 1 && $value <= 100) {
                        $value = number_format($value) . "%";
                        $sheet->getStyle($kolom . $barisData)->applyFromArray([
                            'fill' => [
                                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                                'startColor' => [
                                    'rgb' => '00FF00',
                                ],
                            ],
                        ]);
                    }
                } else {
                    $value = "";
                }
            }

            $cell = $sheet->setCellValue($kolom . $barisData, $value);

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
