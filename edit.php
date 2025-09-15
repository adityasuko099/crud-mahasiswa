<?php
// Nama: Aditya Suko Dwiyono
// NIM : 21060122130066
include "db.php";
$no = $_GET['no'];
$result = $conn->query("SELECT * FROM Mahasiswa WHERE NO=$no");
$data = $result->fetch_assoc();
?>
<!doctype html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Edit Mahasiswa</h1>
    <form method="post" action="update.php">
        <input type="hidden" name="NO" value="<?php echo $data['NO']; ?>">
        <p>NIM: <input type="text" name="NIM" value="<?php echo $data['NIM']; ?>" required></p>
        <p>Nama: <input type="text" name="Nama" value="<?php echo $data['Nama']; ?>" required></p>
        <p>Program Studi: <input type="text" name="Program_Studi" value="<?php echo $data['Program_Studi']; ?>" required></p>
        <button type="submit">Update</button>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>