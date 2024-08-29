<?php
include("koneksi.php");

$query = "SELECT DATE_FORMAT(tanggal, '%Y-%m-%d') 
as tanggal, COUNT(*) as jumlah 
FROM pengajuan_surat 
WHERE tanggal 
BETWEEN CURDATE() - INTERVAL 1 WEEK 
AND CURDATE() GROUP BY tanggal";
$result = $conn->query($query);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
