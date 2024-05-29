<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "perkuliahan");
if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
    exit();
}

// Ambil data dari form
$npm = $_POST['npm'];
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];

// Query untuk menyimpan data mahasiswa
$query = "INSERT INTO mahasiswa (npm, nama, no_hp) VALUES ('$npm', '$nama', '$no_hp')";
$result = mysqli_query($conn, $query);
if ($result) {
    // Redirect kembali ke halaman utama
    header("Location: index.php");
} else {
    echo "Gagal menyimpan data mahasiswa: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
