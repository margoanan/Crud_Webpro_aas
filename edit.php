<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Edit Mahasiswa</h1>

    <?php
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "perkuliahan");
    if (mysqli_connect_errno()) {
        echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
        exit();
    }

    // Ambil ID mahasiswa dari URL
    $id = $_GET['id'];

    // Query untuk mengambil data mahasiswa berdasarkan ID
    $query = "SELECT * FROM mahasiswa WHERE id_mhs = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Cek apakah data mahasiswa ditemukan
    if (!$row) {
        echo "Data mahasiswa tidak ditemukan.";
        exit();
    }
    ?>

    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $row['id_mhs']; ?>">
        <label for="npm">NPM:</label>
        <input type="text" id="npm" name="npm" value="<?php echo $row['npm']; ?>" required><br><br>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required><br><br>
        <label for="no_hp">No. HP:</label>
        <input type="text" id="no_hp" name="no_hp" value="<?php echo $row['no_hp']; ?>" required><br><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
