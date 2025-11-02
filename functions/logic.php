<?php
function koneksi() {
    $db = mysqli_connect("localhost", "root", "root", "db_tia");
    if (!$db) die("Koneksi gagal: " . mysqli_connect_error());
    return $db;
}

function getAllSiswa() {
    $db = koneksi();
    $result = mysqli_query($db, "SELECT * FROM tb_siswa ORDER BY id DESC");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function tambahSiswa($nisn, $nama, $kelas, $alamat, $tempat_lahir, $tanggal_lahir) {
    $db = koneksi();
    $nisn = (int)$nisn;
    $nama = mysqli_real_escape_string($db, $nama);
    $kelas = mysqli_real_escape_string($db, $kelas);
    $alamat = mysqli_real_escape_string($db, $alamat);
    $tempat_lahir = mysqli_real_escape_string($db, $tempat_lahir);
    $tanggal_lahir = mysqli_real_escape_string($db, $tanggal_lahir);
    
    // Format tanggal dari YYYY-MM-DD ke DD-MM-YYYY
    $tgl_indo = date('d-m-Y', strtotime($tanggal_lahir));
    $ttl = "$tempat_lahir, $tgl_indo";
    
    mysqli_query($db, "INSERT INTO tb_siswa (NISN, Nama, Kelas, Alamat, TTL) 
                       VALUES ('$nisn', '$nama', '$kelas', '$alamat', '$ttl')");
}

function getSiswaById($id) {
    $db = koneksi();
    $id = (int)$id;
    $result = mysqli_query($db, "SELECT * FROM tb_siswa WHERE id = $id");
    return mysqli_fetch_assoc($result);
}

function updateSiswa($id, $nisn, $nama, $kelas, $alamat, $tempat_lahir, $tanggal_lahir) {
    $db = koneksi();
    $id = (int)$id;
    $nisn = (int)$nisn;
    $nama = mysqli_real_escape_string($db, $nama);
    $kelas = mysqli_real_escape_string($db, $kelas);
    $alamat = mysqli_real_escape_string($db, $alamat);
    $tempat_lahir = mysqli_real_escape_string($db, $tempat_lahir);
    $tanggal_lahir = mysqli_real_escape_string($db, $tanggal_lahir);
    
    // Format tanggal ke DD-MM-YYYY
    $tgl_indo = date('d-m-Y', strtotime($tanggal_lahir));
    $ttl = "$tempat_lahir, $tgl_indo";
    
    mysqli_query($db, "UPDATE tb_siswa 
                       SET NISN='$nisn', Nama='$nama', Kelas='$kelas', Alamat='$alamat', TTL='$ttl'
                       WHERE id = $id");
}

function hapusSiswa($id) {
    $db = koneksi();
    $id = (int)$id;
    mysqli_query($db, "DELETE FROM tb_siswa WHERE id = $id");
}
?>