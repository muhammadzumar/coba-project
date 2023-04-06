<?php 
session_start();
include "koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Data</title>
</head>
<style>
    body{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
	
    
	}
    .username{
        padding: .375rem .75rem;
        /* color: black; */
        border: 1px solid #abb3bb;
        border-radius: .35rem;
    }
    .password{
        padding: .375rem .75rem;
        /* color: black; */
        border: 1px solid #abb3bb;
        border-radius: .35rem;
        
    }
    #submit{
        padding: .375rem .75rem;
        color: white;
        background-color: #0d6efd;
        border-radius: .35rem;
        border-color: #0d6efd;
        cursor: pointer;
        
    }
    
</style>
<body>
    <h2>Login Data</h2>
    <form action="" method="post">
        <label for="">Username</label>
        <input class="username" type="text" name="username" placeholder="Masukkan Username" autofocus required>
        <br><br>
        <label for="">Password</label>
        <input class="password" type="password" name="password" placeholder="Masukkan Password" autofocus required>
        <br><br>
        <input type="submit" id="submit" name="submit" value="Login">
    </form>
    <p>Created by: M. Fikri Azzumardi / 10 / XII TKJ 2</p>

    <?php 
    // session_start();
    

    if (isset($_POST['submit'])) {


    $username = $_POST['username'];
    $password = md5($_POST['password']);


    $user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($user)> 0){
        $cek = mysqli_fetch_array($user);

        // Session ini untuk mengambil user dari database
        $_SESSION['username']= $cek['username'];

        // Session ini untuk mengambil nama user dari database
        $_SESSION['username']= $cek['name'];
        header("location: index.php");
    }

    // if ($cek > 0) {

        // session ini untuk mengecek user apakah yang diinput cocok dengan database
        // $_SESSION['username']=$_POST['username'];
        // header("location: index.php");
        // echo "<meta http-equiv=refresh content=0;URL='index.php'>";
    else{
        echo "<script>
		alert('Username atau Password salah!!');
        
	</script>";
    }
   
    
    } 

    ?>
</body>
</html>