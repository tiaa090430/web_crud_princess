<?php
include 'logic.php';
if ($_POST) {
    updateSiswa(
        $_POST['id'],
        $_POST['nisn'],
        $_POST['nama'],
        $_POST['kelas'],
        $_POST['alamat'],
        $_POST['tempat_lahir'],
        $_POST['tanggal_lahir']
    );
    header("Location: crudsiswa.php?pesan=update");
    exit;
}
?>