<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP dan MySQLi - WWW.MALASNGODING.COM</title>
</head>
<body>
 
	<h2>CRUD DATA SISWA - WWW.HALAMANLOGIN.COM</h2>
	<br/>
	<a href="index.html">KEMBALI</a>
	<br/>
	<br/>
	<h3>TAMBAH DATA SISWA</h3>
	<form method="post" action="tambah_aksi.php">
		<table>
			<tr>			
				<td>Id_siswa</td>
				<td><input type="number" name="Id_siswa" required></td>
			</tr>
			<tr>
			  <td>NISN</td>
				<td><input type="number" name="NISN" required></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="Nama" required></td>
			</tr>
			<tr>
			  <td>Kelas</td>
				<td><input type="text" name="Kelas" required></td>
			</tr>
		  <tr>
		   	<td>Alamat</td>
				<td><input type="text" name="Alamat" required></td>
		  </tr>
			 <tr>
		   	<td>TTL</td>
				<td><input type="text" name="TTL" required></td>
		  </tr>
		  <tr>
		    <td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>		
		</table>
	</form>
</body>
</html>