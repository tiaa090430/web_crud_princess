<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP dan MySQLi - Edit Data Siswa</title>
</head>
<body>

	<h2>CRUD DATA SISWA - Edit Data</h2>
	<br/>
	<a href="index.php">KEMBALI</a>
	<br/><br/>

	<?php
	include 'koneksi.php';
	$Id_siswa = $_GET['Id_siswa']; // ambil id dari URL

	$data = mysqli_query($koneksi, "SELECT * FROM TB_siswa WHERE Id_siswa='$Id_siswa'");
	while($d = mysqli_fetch_array($data)){
	?>
	<form method="post" action="update.php">
		<table>
			<tr>			
				<td>ID Siswa</td>
				<td>
					<input type="text" name="Id_siswa" value="<?php echo $d['Id_siswa']; ?>" readonly>
					<!-- readonly artinya bisa dilihat tapi tidak bisa diubah -->
				</td>
			</tr>
			<tr>
				<td>NISN</td>
				<td><input type="text" name="NISN" value="<?php echo $d['NISN']; ?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="Nama" value="<?php echo $d['Nama']; ?>"></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td><input type="text" name="Kelas" value="<?php echo $d['Kelas']; ?>"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="Alamat" value="<?php echo $d['Alamat']; ?>"></td>
			</tr>
			<tr>
				<td>TTL</td>
				<td><input type="text" name="TTL" value="<?php echo $d['TTL']; ?>"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>		
		</table>
	</form>
	<?php 
	}
	?>

</body>
</html>