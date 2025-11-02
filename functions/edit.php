<?php
include 'logic.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID tidak ditemukan!");
}

$siswa = getSiswaById($id);
if (!$siswa) {
    die("Data siswa tidak ditemukan!");
}

// Pisahkan TTL jadi tempat & tanggal (format: "Kota, DD-MM-YYYY")
$ttl_parts = explode(', ', $siswa['TTL'], 2);
$tempat_lahir_lama = $ttl_parts[0] ?? '';
$tanggal_lama = $ttl_parts[1] ?? '';

// Konversi DD-MM-YYYY → YYYY-MM-DD untuk input date
$tanggal_input = '';
if ($tanggal_lama && strlen($tanggal_lama) >= 10) {
    $d = substr($tanggal_lama, 0, 2);
    $m = substr($tanggal_lama, 3, 2);
    $y = substr($tanggal_lama, 6, 4);
    if (checkdate((int)$m, (int)$d, (int)$y)) {
        $tanggal_input = "$y-$m-$d";
    }
}

if ($_POST) {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    updateSiswa($id, $nisn, $nama, $kelas, $alamat, $tempat_lahir, $tanggal_lahir);
    header("Location: crudsiswa.php?pesan=update");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Data Siswa</title>
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
    <h2 style="text-align: center; margin-bottom: 20px;">Edit Data Siswa</h2>

    <form method="POST">
      <div class="form-group">
        <label for="nisn">NISN</label>
        <input type="number" id="nisn" name="nisn" value="<?= htmlspecialchars($siswa['NISN']) ?>" required>
      </div>

      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($siswa['Nama']) ?>" required>
      </div>

      <div class="form-group">
        <label for="kelas">Kelas</label>
        <input type="text" id="kelas" name="kelas" value="<?= htmlspecialchars($siswa['Kelas']) ?>" required>
      </div>

      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" name="alamat" value="<?= htmlspecialchars($siswa['Alamat']) ?>" required>
      </div>

      <div class="form-group">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?= htmlspecialchars($tempat_lahir_lama) ?>" required>
      </div>

      <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= htmlspecialchars($tanggal_input) ?>" required>
      </div>

      <div class="btn-group">
        <button type="submit" class="btn primary">Simpan Perubahan</button>
        <a href="crudsiswa.php" class="btn btn-back">Batal</a>
      </div>
    </form>
  </div>
</body>
</html>