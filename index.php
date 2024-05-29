<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi CRUD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        .add-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .add-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Data Mahasiswa</h1>

    <?php
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "perkuliahan");
    if (mysqli_connect_errno()) {
        echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
        exit();
    }

    // Query untuk mengambil data mahasiswa
    $query = "SELECT * FROM mahasiswa";
    $result = mysqli_query($conn, $query);
    ?>

    <table>
        <tr>
            <th>No</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>No. HP</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $row['npm'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['no_hp'] . "</td>";
            echo "<td><a href='edit.php?id=" . $row['id_mhs'] . "'>Edit</a> | <a href='delete.php?id=" . $row['id_mhs'] . "'>Hapus</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <br>

    <a href="add.php" class="add-btn">Tambah Mahasiswa</a>

    <?php
    mysqli_close($conn);
    ?>
</body>
</html>
