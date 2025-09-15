<?php
// Nama: Aditya Suko Dwiyono
// NIM : 21060122130066
include "db.php";

$nim   = $_POST['NIM'];
$nama  = $_POST['Nama'];
$prodi = $_POST['Program_Studi'];

$check = $conn->query("SELECT * FROM Mahasiswa WHERE NIM='$nim'");
if ($check->num_rows > 0) {
    echo "NIM sudah terdaftar! <a href='tambah.php'>Kembali</a>";
    exit;
}

$sql = "INSERT INTO Mahasiswa (NIM, Nama, Program_Studi) VALUES ('$nim','$nama','$prodi')";
if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}
?>