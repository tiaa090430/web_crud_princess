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
<input type="text" name="tanggal_lahir" id="tanggal_lahir" class="flatpickr" placeholder="Pilih tanggal" required>      </div>
      <div class="btn-group">
        <button type="submit" class="btn primary">Simpan</button>
        <button type="button" class="btn btn-back" onclick="closeModal('tambah')">Batal</button>
      </div>
    </form>
  </div>
</div>  