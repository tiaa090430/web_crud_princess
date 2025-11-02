<?php 
include 'koneksi.php';

// Ambil data dari form
$Id_siswa = $_POST['Id_siswa'];
$NISN     = $_POST['NISN'];
$Nama     = $_POST['Nama'];
$Kelas    = $_POST['Kelas'];
$Alamat   = $_POST['Alamat'];
$TTL      = $_POST['TTL'];

// Query simpan data ke tabel TB_siswa
$query = "INSERT INTO TB_siswa (Id_siswa, NISN, Nama, Kelas, Alamat, TTL) 
          VALUES ('$Id_siswa', '$NISN', '$Nama', '$Kelas', '$Alamat', '$TTL')";

if (mysqli_query($koneksi, $query)) {
    header("Location: biodata.php"); // kembali ke tampilan data
    exit();
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
?>