<?php
include 'logic.php';
$daftar_siswa = getAllSiswa();
$pesan = $_GET['pesan'] ?? '';

$edit_mode = false;
$edit_data = [];
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $edit_data = getSiswaById($id);
    if ($edit_data) {
        $edit_mode = true;
        $ttl_parts = explode(', ', $edit_data['TTL'], 2);
        $edit_tempat = $ttl_parts[0] ?? '';
        $edit_tgl_str = $ttl_parts[1] ?? '';
        $edit_tgl = '';
        if ($edit_tgl_str && strlen($edit_tgl_str) >= 10) {
            $d = substr($edit_tgl_str, 0, 2);
            $m = substr($edit_tgl_str, 3, 2);
            $y = substr($edit_tgl_str, 6, 4);
            if (checkdate((int)$m, (int)$d, (int)$y)) {
                $edit_tgl = "$y-$m-$d";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>CRUD Siswa</title>
  <link rel="stylesheet" href="../assets/css/crudsiswa.css">
</head>
<body>
  <div class="container">
    <h1>Data Siswa</h1>

    <?php if ($pesan): ?>
      <div class="alert">
        <?php
          $msg = match($pesan) {
            'input' => '✅ Data berhasil ditambahkan!',
            'update' => '✅ Data berhasil diperbarui!',
            'hapus' => '🗑️ Data berhasil dihapus!',
            default => ''
          };
          echo $msg;
        ?>
      </div>
    <?php endif; ?>

    <a href="#" class="btn primary" onclick="openModal('tambah')">+ Tambah Data</a>

    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>NISN</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Alamat</th>
          <th>TTL</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($daftar_siswa as $i => $s): ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= htmlspecialchars($s['NISN']) ?></td>
          <td><?= htmlspecialchars($s['Nama']) ?></td>
          <td><?= htmlspecialchars($s['Kelas']) ?></td>
          <td><?= htmlspecialchars($s['Alamat']) ?></td>
          <td><?= htmlspecialchars($s['TTL']) ?></td>
          <td>
            <a href="?edit=<?= $s['id'] ?>" class="btn warning">Edit</a>
            <a href="hapus.php?id=<?= $s['id'] ?>" class="btn danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Modal Tambah -->
  <div id="modal-tambah" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h2>Tambah Data Siswa</h2>
        <span class="close-modal" onclick="closeModal('tambah')">&times;</span>
      </div>
      <form method="POST" action="proses_tambah.php">
        <div class="form-group">
          <label>NISN</label>
          <input type="number" name="nisn" required>
        </div>
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama" required>
        </div>
        <div class="form-group">
          <label>Kelas</label>
          <input type="text" name="kelas" required>
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input type="text" name="alamat" required>
        </div>
        <div class="form-group">
          <label>Tempat Lahir</label>
          <input type="text" name="tempat_lahir" placeholder="Contoh: Cianjur" required>
        </div>
        <div class="form-group">
          <label>Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" required>
        </div>
        <div class="btn-group">
          <button type="submit" class="btn primary">Simpan</button>
          <button type="button" class="btn btn-back" onclick="closeModal('tambah')">Batal</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Edit -->
  <?php if ($edit_mode): ?>
  <div id="modal-edit" class="modal active">
    <div class="modal-content">
      <div class="modal-header">
        <h2>Edit Data Siswa</h2>
        <a href="crudsiswa.php" class="close-modal">&times;</a>
      </div>
      <form method="POST" action="proses_edit.php">
        <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
        <div class="form-group">
          <label>NISN</label>
          <input type="number" name="nisn" value="<?= htmlspecialchars($edit_data['NISN']) ?>" required>
        </div>
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama" value="<?= htmlspecialchars($edit_data['Nama']) ?>" required>
        </div>
        <div class="form-group">
          <label>Kelas</label>
          <input type="text" name="kelas" value="<?= htmlspecialchars($edit_data['Kelas']) ?>" required>
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input type="text" name="alamat" value="<?= htmlspecialchars($edit_data['Alamat']) ?>" required>
        </div>
        <div class="form-group">
          <label>Tempat Lahir</label>
          <input type="text" name="tempat_lahir" value="<?= htmlspecialchars($edit_tempat) ?>" required>
        </div>
        <div class="form-group">
          <label>Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" value="<?= htmlspecialchars($edit_tgl) ?>" required>
        </div>
        <div class="btn-group">
          <button type="submit" class="btn primary">Simpan Perubahan</button>
          <a href="crudsiswa.php" class="btn btn-back">Batal</a>
        </div>
      </form>
    </div>
  </div>
  <?php endif; ?>

  <script>
    function openModal(type) {
      document.getElementById('modal-' + type).classList.add('active');
    }
    function closeModal(type) {
      document.getElementById('modal-' + type).classList.remove('active');
    }
    window.onclick = function(event) {
      if (event.target.classList.contains('modal')) {
        event.target.classList.remove('active');
      }
    }
  </script>
</body>
</html>