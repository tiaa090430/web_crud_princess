<?php
include 'logic.php';

// Ambil ID dari URL
$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID tidak ditemukan!");
}

// Hapus data
hapusSiswa($id);

// Redirect kembali ke daftar dengan pesan sukses
header("Location: crudsiswa.php?pesan=hapus");
exit;
?>