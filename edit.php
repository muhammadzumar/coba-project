<?php 
    include "koneksi.php";

    // panggil dari no yang di edit
    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "SELECT * FROM tb_penting WHERE id='$id'");

    while ($ambil = mysqli_fetch_array($query)) {
        # code...
    
        # code...
    
    // $koneksi = mysqli_connect("localhost","root","","db_percobaan");

    // if (isset($_POST["submit"])) {
    //     // var_dump($_POST);

    //     $nama = $_POST["nama"];
    //     $tempat = $_POST["tempat"];

    //     $query = "INSERT INTO tb_data VALUES('', '$nama', '$tempat')";

    //     mysqli_query($koneksi, $query);
    // }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
    <form method="POST" action="">
        <h3>Edit Data</h3>
		<li>
			<label>Masukkan nama</label>
			<input type="text" name="nama" required placeholder="nama" value="<?php echo $ambil['nama'];  ?>">
		</li>

		<li>
			<label>Tempat Lahir</label>
			<input type="text" name="tempat" required placeholder="tempatlahir" value="<?php echo $ambil['tempat']; ?>">
		</li>
        <li>
			<label>Jurusan</label>
			<input type="text" name="jurusan" required placeholder="Jurusan" value="<?php echo $ambil['jurusan']; ?>">
		</li>
        <li>
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" id="">
                <option value="Laki-Laki" >Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
                <option value="Tak Disebut">Tak terdefinisi</option>
            </select>
            <!-- <input type="text" name="jenis_kelamin" value="<?php echo $ambil['jenis_kelamin']; ?>"> -->
        </li>

	<button name="submit" type="submit">Simpan Perubahan</button>
        
	</form>

    <?php } ?>

    <?php 
    include "session.php";
    // Ketika tombol submit di proses
    if (isset($_POST['submit'])) {

    // Maka proses untuk pengeditan data ke database dengan inisial UPDATE

    mysqli_query($koneksi, "UPDATE tb_penting SET
        nama='$_POST[nama]',
        tempat='$_POST[tempat]',
        jurusan='$_POST[jurusan]',
        jenis_kelamin= '$_POST[jenis_kelamin]' WHERE id='$id'");

    // Script dibawah untuk menampilkan notif bahwa pengeditan berhasil dan redirect halaman 
        echo "<script>
		alert('Data berhasil diedit!!');
        window.location.href = 'index.php';
	</script>";
        
    }
    
    ?>

</body>
</html>