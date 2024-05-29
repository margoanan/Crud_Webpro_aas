<!DOCTYPE html>
<html>
<head>
    <title>Data Hubungan Tabel</title>
</head>
<body>
    <h1>Data Hubungan Tabel</h1>

    <?php
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "perkuliahan");
    if (mysqli_connect_errno()) {
        echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
        exit();
    }

    // Query untuk mengambil data hubungan antar tabel
    $query = "SELECT m.nama AS nama_mahasiswa, mk.nama_mk, j.hari, j.jam, j.thn_ajaran FROM jadwal j
              INNER JOIN mahasiswa m ON j.id_mhs = m.id_mhs
              INNER JOIN matakuliah mk ON j.id_mk = mk.id_mk";
    $result = mysqli_query($conn, $query);
    ?>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>Nama Mata Kuliah</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Tahun Ajaran</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $row['nama_mahasiswa'] . "</td>";
            echo "<td>" . $row['nama_mk'] . "</td>";
            echo "<td>" . $row['hari'] . "</td>";
            echo "<td>" . $row['jam'] . "</td>";
            echo "<td>" . $row['thn_ajaran'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <?php
    mysqli_close($conn);
    ?>
</body>
</html>
