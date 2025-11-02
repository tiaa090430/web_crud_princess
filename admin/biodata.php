<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" ucontent="ie=edge">
  <title>BIODATA </title>
</head>
<body bgcolor="white">
  <center>
<marquee><h1>Biodata saya </h1></marquee>
 <table ="10">
 <tr>
   <td><img src ="ti.jpg" width="100"></td>
 </tr>
       <a class="link" href="biodata.php"></a><br>
<!DOCTYPE html>
<html>
<head>
	<title>Biodata sitimutiara</title>
</head>
<body>
	<h2>CRUD DATA SISWA - WWW.sitimutiara.COM</h2>
	<br/>
	<a href="tambah.php">+ TAMBAH DATA SISWA</a>
	<br/>
	<br/>
	<table border="1">
	<tr>
			<th>No</th>
			<th>NISN</th>
			<th>Nama</th>
			<th>Kelas</th>
			<th>Alamat</th>
			<th>TTL</th>
			<th>Aksi</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"SELECT * FROM TB_siswa");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['NISN']; ?></td>
				<td><?php echo $d['Nama']; ?></td>
	<td><?php echo $d['Kelas']; ?></td>
		<td><?php echo $d['Alamat']; ?></td>
				<td><?php echo $d['TTL']; ?></td>
			    <td>
  <a href="edit.php?Id_siswa=<?php echo $d['Id_siswa']; ?>">EDIT</a> |
  <a href="hapus.php?Id_siswa=<?php echo $d['Id_siswa']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">HAPUS</a>
</td>
			</tr>
			<?php 
		}
		?>
	</table>
</body>
<th bgcolor="green">
<a class="link" href="index.html"><font color="red">kembali</font></a><br></th>
<th bgcolor="blue">
<a class="link" href="aktivitas.html"><font color="green">selanjutnya</a>
</th>
</tr>
</table>
</cente>
</body>
</html>