<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "perkuliahan");
if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
    exit();
}

// Ambil ID mahasiswa dari URL
$id = $_GET['id'];

// Query untuk menghapus data mahasiswa berdasarkan ID
$query = "DELETE FROM mahasiswa WHERE id_mhs = $id";
$result = mysqli_query($conn, $query);

if ($result) {
    // Redirect kembali ke halaman utama
    header("Location: index.php");
} else {
    echo "Gagal menghapus data mahasiswa.";
}

mysqli_close($conn);
?>
