<?php
// Nama: Aditya Suko Dwiyono
// NIM : 21060122130066
include "db.php";

$no = $_GET['no'];
$sql = "DELETE FROM Mahasiswa WHERE NO=$no";
if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}
?>