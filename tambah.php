<!-- Nama: Aditya Suko Dwiyono -->
<!-- NIM : 21060122130066 -->
<!doctype html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Tambah Mahasiswa</h1>
    <form method="post" action="simpan.php">
        <p>
            <label>NIM:</label>
            <input type="text" name="NIM" required>
        </p>
         <p>
            <label>Nama:</label>
            <input type="text" name="Nama" required>
        </p>
        <p>
            <label>Program Studi:</label>
            <input type="text" name="Program_Studi" required>
        </p>
        <button type="submit">Simpan</button>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>
