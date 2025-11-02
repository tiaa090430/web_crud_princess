<?php
if ($_POST) {
    include 'logic.php';
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    tambahSiswa($nisn, $nama, $kelas, $alamat, $tempat_lahir, $tanggal_lahir);
    header("Location: crudsiswa.php?pesan=input");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Data Siswa</title>
  <link rel="stylesheet" href="crudsiswa.css">
  <style>
    .form-container {
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .form-group {
      margin-bottom: 16px;
    }
    label {
      display: block;
      margin-bottom: 6px;
      font-weight: 600;
      color: #2d3748;
    }
    input[type="text"],
    input[type="number"],
    input[type="date"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }
    .btn-group {
      text-align: center;
      margin-top: 20px;
    }
    .btn-back {
      background: #6c757d;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2 style="text-align: center; margin-bottom: 20px;">Tambah Data Siswa</h2>

    <form method="POST">
      <div class="form-group">
        <label for="nisn">NISN</label>
        <input type="number" id="nisn" name="nisn" required>
      </div>

      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" required>
      </div>

      <div class="form-group">
        <label for="kelas">Kelas</label>
        <input type="text" id="kelas" name="kelas" required>
      </div>

      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" name="alamat" required>
      </div>

      <div class="form-group">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Contoh: Cianjur" required>
      </div>

      <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
      </div>

      <div class="btn-group">
        <button type="submit" class="btn primary">Simpan</button>
        <a href="crudsiswa.php" class="btn btn-back">Batal</a>
      </div>
    </form>
  </div>
</body>
</html>