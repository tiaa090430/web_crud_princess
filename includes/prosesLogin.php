<?php
session_start();
include 'koneksi.php';

$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Escape input untuk mencegah SQL injection dasar
$username = mysqli_real_escape_string($koneksi, $username);
$password = mysqli_real_escape_string($koneksi, $password);

$query = "SELECT * FROM tb_pengguna WHERE username='$username' AND password='$password'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];

    // Redirect ke halaman sukses
    header("Location: ../pages/index.html");
    exit();
} else {
    // Redirect ke halaman gagal
    header("Location: ../pages/invalid.html");
    exit();
}
?>