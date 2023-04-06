<?php 
include "session.php";
include "koneksi.php";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Percobaan Data</title>
	<!-- <link rel="stylesheet" href="style.css"> -->
</head>
<style>
	*{
		margin-top: 0px;
				
	}
	body{
		margin: 0px;
		padding: 0px;
    	font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
	
    
	}
		/* .container{
			box-shadow: 10px 40px rgba(0,0,0,0.3);
			
		} */
	#navbar{
		background-color: #26C4C2;
		height: 65px;
		width: 100%;
		margin: 0px;
		padding: 0px;
		color: white;
	}
	#heading a{
		font-weight: bold;
		font-size: 25px;
		font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
		color: white;
		text-decoration: none;
		line-height: 65px;
		padding-left: 60px;
	}
	#navbar ul li {
    float: left;
    line-height: 65px
}
	.primary {
		background-color: #0d6efd;
	}
	.warning{
		background-color: #ffc107;
	}
	.danger{
		background-color: #dc3545;
	}
	.tengah{
		text-align: center;
	}
	th{
		background-color: rgb(5, 0, 69);
		color: white;
	}
	.aksi{
		text-align: center;
	}
	a.tambah_data{
		margin-left: 200px;
		border-radius: 5px;
		padding: 10px 25px;
		font-size: 20px;
		color: white;
		text-decoration: none;
	}
	a.edit{
		border-radius: 3px;
		padding: 6px;
		text-decoration: none;
	}
	a.hapus{
		margin-left: 10px;
		border-radius: 4px;
		padding: 6px;
		color: white;
		text-decoration: none;
	}
	.logout{
		margin-left: 200px;
		border-radius: 5px;
		padding: 7px 10px;
		font-size: 15px;
		color: white;
		text-decoration: none;
	}


</style>
<body>
	<nav id="navbar">
		<ul>
			<div id="heading">
				<a href="">Selamat Datang, <?php echo $_SESSION['username']; ?> !!</a>
				
			</div>
			<!-- <li><a  class="logout danger" href="logout.php">Logout</a></li> -->
			
		</ul>
		
	</nav>

	<div class="container">
	<h1 class="tengah" style="margin-top: 10px;">Data calon Mahasiswa</h1>
	<!-- <marquee behavior="" direction="">Selamat Datang di Data Center</marquee> -->


	
	<a href="tambahdata.php" class="tambah_data primary">Tambah Data</a><br><br><br>
	<table align="center" border="1" cellpadding="15" cellspacing="0" width="70%">
		<tr>
			<!-- <th>no.</th> -->
			<th>No.</th>
			<th>Nama</th>
			<th>Alamat Rumah</th>
			<th>Jurusan yang dipilih</th>
			<th>Jenis Kelamin</th>
			<th>Aksi</th>
		</tr>
		<tr>
			
			<?php 
			// variabel berikut untuk menampilkan nomor dengan urut
			$i = 1;

			$data = mysqli_query($koneksi, "SELECT * FROM tb_penting");
			// Ambil semua data di database
			
			
			while ($ambil = mysqli_fetch_array($data)) {
				
			?>
			
			<td><?php echo $i; ?></td>
			<td><?php echo $ambil['nama']; ?></td>
			<td><?php echo $ambil['tempat']; ?></td>
			<td><?php echo $ambil['jurusan']; ?></td>
			<td><?php echo $ambil['jenis_kelamin']; ?></td>
			<td class="aksi"><a class="edit warning" href="edit.php?id=<?php echo $ambil['id']; ?>">Edit </a>
				<a class="hapus danger" href="delete.php?id=<?php echo $ambil['id']; ?>" onclick="return confirm('Apakah yakin dihapus?');"> Hapus</a></td>
		</tr>
			<?php $i++; ?>
			<?php } ?>
	</table>
	<br>
	<a  class="logout danger" href="logout.php">Logout</a> | <a href="cetak.php" target="_blank">Cetak</a>

	</div>
	

</body>
</html>
