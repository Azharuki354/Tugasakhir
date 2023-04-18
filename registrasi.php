<?php
// $hostname = "localhost";
// $name = "root";
// $db_name = "washzhar";

include 'conn.php';

if (isset($_POST["register"])) {

    $name = $_POST['name'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $usertype = 'user';;


    $cek_user = mysqli_query($koneksi, "SELECT * FROM registrasi WHERE name = '$name' AND password = '$password' AND usertype = '$usertype' ");
    $cek_login = mysqli_num_rows($cek_user);

    if ($cek_login > 0) {
        echo "<script>
        alert('user name telah terdaftar');
        window.location = 'login.php';
    </script>";
    } else {
        if ($password != $password2) {
            echo "<script>
        alert('Password yang dimasukkan tidak sama');
        // window.location = 'registrasi.php';
    </script>";
        } else {
            // $password = password_hash($password, PASSWORD_DEFAULT);
            // $password = md5($password);
            mysqli_query($koneksi, "INSERT INTO registrasi VALUES ('','$name','$password','$usertype') ");
            echo "<script>
        alert('data berhasil dikirim');
        window.location = 'login.php';
    </script>";
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Coba</title>
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="login">
            <form action="" method="post">
                <h1>Registrasi</h1>
                <label for="name">User name :</label><br>
                <input type="text" name="name" id="name">
                <br>
                <label for="password">Password :</label><br>
                <input type="password" name="password" id="password">
                <br>
                <label for="password2">Konfirmasi Password :</label><br>
                <input type="password" name="password2" id="password2">
                <br>
                <center><input type="submit" class="submit" value="SIGN UP" name="register"></center>
                <!-- <center><button type="button" class="submit" name="register">SIGN UP</button></center> -->
                <br>
                <h5>Sudah puya akun? <a href="login.php">login</a></h5>
            </form>
        </div>
    </div>
</body>

</html>