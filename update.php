<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "perkuliahan");
if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
    exit();
}

// Ambil data dari form
$id = $_POST['id'];
$npm = $_POST['npm'];
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];

// Query untuk memperbarui data mahasiswa
$query = "UPDATE mahasiswa SET npm = '$npm', nama = '$nama', no_hp = '$no_hp' WHERE id_mhs = $id";
$result = mysqli_query($conn, $query);

if ($result) {
    // Redirect kembali ke halaman utama
    header("Location: index.php");
} else {
    echo "Gagal memperbarui data mahasiswa.";
}

mysqli_close($conn);
?>
