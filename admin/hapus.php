<?php
include 'koneksi.php';

// Ambil ID dari URL
$Id_siswa = $_GET['Id_siswa'];

// Jalankan query hapus data berdasarkan ID
mysqli_query($koneksi, "DELETE FROM TB_siswa WHERE Id_siswa='$Id_siswa'");

// Setelah data dihapus, kembali ke halaman utama
header("location:biodata.php");
?>