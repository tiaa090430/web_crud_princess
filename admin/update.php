<?php
include 'koneksi.php';

$Id_siswa  = $_POST['Id_siswa'];
$NISN      = $_POST['NISN'];
$Nama      = $_POST['Nama'];
$Kelas     = $_POST['Kelas'];
$Alamat    = $_POST['Alamat'];
$TTL       = $_POST['TTL'];

mysqli_query($koneksi, "UPDATE TB_siswa SET 
	NISN='$NISN',
	Nama='$Nama',
	Kelas='$Kelas',
	Alamat='$Alamat',
	TTL='$TTL'
	WHERE Id_siswa='$Id_siswa'
");

header("location:biodata.php");
?>