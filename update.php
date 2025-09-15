<?php
// Nama: Aditya Suko Dwiyono
// NIM : 21060122130066
include "db.php";

$no    = $_POST['NO'];
$nim   = $_POST['NIM'];
$nama  = $_POST['Nama'];
$prodi = $_POST['Program_Studi'];

$check = $conn->query("SELECT * FROM Mahasiswa WHERE NIM='$nim' AND NO!=$no");
if ($check->num_rows > 0) {
    echo "NIM sudah dipakai mahasiswa lain! <a href='edit.php?no=$no'>Kembali</a>";
    exit;
}

$sql = "UPDATE Mahasiswa SET NIM='$nim', Nama='$nama', Program_Studi='$prodi' WHERE NO=$no";
if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}
?>