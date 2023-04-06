<?php 
    // include "session.php";
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <form method="POST" action="">
        <h3>Tambah Data</h3>
		<li>
			<label>Masukkan nama</label>
			<input type="text" name="nama" required placeholder="nama">
		</li>

		<li>
			<label>Tempat Lahir</label>
			<input type="text" name="tempat" required placeholder="tempat lahir">
		</li>
        <li>
			<label>Jurusan</label>
			<input type="text" name="jurusan" required placeholder="Jurusan">
		</li>
        <li>
            <label >Jenis Kelamin</label>
            <!-- <input type="text" name="jenis_kelamin" placeholder="Jenis Kelamin"> -->
            <select name="jenis_kelamin" id="">
                <option value="Laki-Laki" >Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </li>
	<button name="submit" type="submit">Kirim</button>
	</form>

    <?php 
    // Ketika tombol submit di proses
    if (isset($_POST['submit'])) {

        // Maka proses untuk pengiriman data ke database
        mysqli_query($koneksi, "INSERT INTO tb_penting SET
        nama = '$_POST[nama]',
        tempat = '$_POST[tempat]',
        jurusan = '$_POST[jurusan]',
        jenis_kelamin = '$_POST[jenis_kelamin]'");

        // Script dibawah untuk menampilkan notif bahwa inputan berhasil dan redirect halaman 
        echo "<script>
		alert('Data berhasil ditambahkan!!');
        window.location.href = 'index.php';
	</script>";
        
    }
    
    ?>

</body>
</html>