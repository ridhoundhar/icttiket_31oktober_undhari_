<?php
include "../config/conn.php";

$sqlHistory = "SELECT * FROM history_hapus ORDER BY deletion_date DESC";
$resultHistory = $conn->query($sqlHistory);
$no = 1;
?>

<tr>
<th>No</th>
<th>ID Riwayat</th>
<th>ID Data yang Dihapus</th>
<th>Tanggal Penghapusan</th>
</tr>
<?php while ($row = $resultHistory->fetch_assoc()) { ?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['deleted_id']; ?></td>
<td><?php echo $row['deletion_date']; ?></td>
</tr>
<?php 
$no++;
} ?>

<?php
$resultHistory->free_result();
$conn->close();
?>
