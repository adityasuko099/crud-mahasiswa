<?php 
// Nama: Aditya Suko Dwiyono
// NIM : 21060122130066
include "db.php"; ?>

<!doctype html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <form method="get" class="search-form">
        <input type="text" name="q" placeholder="Cari NIM/Nama" value="<?php echo isset($_GET['q']) ? $_GET['q'] : ''; ?>">
        <button type="submit">Cari</button>
    </form>


    <table>
        <tr>
            <th>NO</th><th>NIM</th><th>Nama</th><th>Program Studi</th><th>Aksi</th>
        </tr>
        <?php
        $limit = 10;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $q = isset($_GET['q']) ? $conn->real_escape_string($_GET['q']) : '';
        $where = $q ? "WHERE NIM LIKE '%$q%' OR Nama LIKE '%$q%'" : '';

        $sql = "SELECT * FROM Mahasiswa $where LIMIT $limit OFFSET $offset";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                echo "<tr>
                        <td>{$row['NO']}</td>
                        <td>{$row['NIM']}</td>
                        <td>{$row['Nama']}</td>
                        <td>{$row['Program_Studi']}</td>
                        <td>
                            <a href='edit.php?no={$row['NO']}'>Edit</a>
                            <a href='hapus.php?no={$row['NO']}' onclick=\"return confirm('Yakin hapus?')\">Hapus</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Belum ada data</td></tr>";
        }
        ?>
    </table>

    <a href="tambah.php">+ Tambah Mahasiswa</a>
    <a href="export.php">Export ke CSV</a>

    <?php
    $countResult = $conn->query("SELECT COUNT(*) AS total FROM Mahasiswa $where");
    $totalData = $countResult->fetch_assoc()['total'];
    $totalPages = ceil($totalData / $limit);

    if ($totalPages > 1) {
        echo "<div style='margin-top:10px;'>";
        for ($i = 1; $i <= $totalPages; $i++) {
            $active = $i == $page ? "style='font-weight:bold;'" : "";
            echo "<a href='?page=$i&q=$q' $active> $i </a>";
        }
        echo "</div>";
    }
    ?>
</body>
</html>