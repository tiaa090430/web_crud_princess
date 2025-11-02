<?php if ($edit_mode && !empty($edit_data)): ?>
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