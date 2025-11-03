<?php
include 'logic.php';
$daftar_siswa = getAllSiswa();
$pesan = $_GET['pesan'] ?? '';

$edit_mode = false;
$edit_data = $edit_tempat = $edit_tgl = null;

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>
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

    <div class="action-buttons">
      <a href="../pages/index.html" class="btn btn-back">← Kembali ke Beranda</a>
      <a href="#" class="btn primary" onclick="openModal('tambah')">+ Tambah Data</a>
    </div>
    
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
            <a href="#" class="btn danger" onclick="openHapusModal(<?= $s['id'] ?>)">Hapus</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <?php include 'modals/tambah_modal.php'; ?>
  <?php include 'modals/edit_modal.php'; ?>

  <!-- Modal Konfirmasi Hapus -->
  <div id="modal-hapus" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h2>Konfirmasi Hapus</h2>
        <span class="close-modal" onclick="closeModal('hapus')">&times;</span>
      </div>
      <p>Apakah Anda yakin ingin menghapus data siswa ini?</p>
      <div class="btn-group">
        <button class="btn danger" id="btn-hapus-ya">Ya, Hapus</button>
        <button class="btn btn-back" onclick="closeModal('hapus')">Batal</button>
      </div>
    </div>
  </div>

  <script>
    flatpickr(".flatpickr", {
      dateFormat: "d-m-Y",
      altInput: true,
      altFormat: "d-m-Y",
      locale: "id",
      position: "auto",
      allowInput: true,
      disableMobile: false,
      onOpen: function(selectedDates, dateStr, instance) {
        // Force popup muncul di atas
        instance.config.position = "above";
        instance.redraw();
      }
    });

    function openModal(type) {
      document.getElementById('modal-' + type).classList.add('active');
    }
    function closeModal(type) {
      document.getElementById('modal-' + type).classList.remove('active');
    }

    // Fungsi untuk modal hapus
    let currentHapusId = null;
    function openHapusModal(id) {
      currentHapusId = id;
      document.getElementById('modal-hapus').classList.add('active');
    }
    document.getElementById('btn-hapus-ya').addEventListener('click', function() {
      if (currentHapusId !== null) {
        window.location.href = 'hapus.php?id=' + currentHapusId;
      }
    });

    window.onclick = function(event) {
      if (event.target.classList.contains('modal')) {
        event.target.classList.remove('active');
      }
    }
  </script>
</body>
</html>