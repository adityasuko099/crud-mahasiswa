<?php
// Nama: Aditya Suko Dwiyono
// NIM : 21060122130066
include "db.php";

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=mahasiswa.csv');
$output = fopen('php://output', 'w');

fputcsv($output, array('NO', 'NIM', 'Nama', 'Program Studi'));

$result = $conn->query("SELECT * FROM Mahasiswa");
while($row = $result->fetch_assoc()){
    fputcsv($output, $row);
}
fclose($output);
exit;
?>