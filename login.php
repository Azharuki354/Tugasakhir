<?php
// $hostname = "localhost";
// $name = "root";
// $db_name = "washzhar";

include 'conn.php';

if (isset($_POST["login"])) {

    $name = $_POST['name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM registrasi WHERE name = '$name' AND password='$password' ";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row["usertype"] == "user") {

        $_SESSION['name'] = $row['name'];
        header("location:index.php");
    } else {
        echo "<script>
            alert('username atau password salah');
            
        </script>";
    }
    if ($row["usertype"] == "admin") {

        $_SESSION['name'] = $row['name'];
        header("location:dasbor_admin.php");
    } else {
        echo "<script>
            alert('username atau password salah');
            
        </script>";
    }
}
// $cek_login = mysqli_num_rows($cek_user);

// if($cek_login>0){
//     echo "<script>
//     alert('Login berhasil');
//     window.location = 'index.php';

// </script>";
// }elseif($password != "password"){
//     echo "<script>
//     alert('Password salah');
//     window.location = 'login.php';
// </script>";

// }else{
//  "<script>
//     alert('Anda belum registrasi');
//     window.location = 'registrasi.php';
// </script>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleu.css">
    <title>Login</title>
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>


        <form action="" method="post">
            <h1>Login</h1>
            <label for="name">User name :</label>
            <input type="text" name="name" id="name">
            <label for="password">Password :</label>
            <input type="password" name="password" id="password">
            <center><input type="submit" class="submit" value="SIGN IN" name="login"></center>
            <br>
            <p>belum registrasi? <i> <a href="registrasi.php">registrasi</a></i></p>
            <p>Lupa password? <i><a href="gantipw.php">Ganti password</a> </i> </p>
            </ul>
        </form>
    </div>
</body>

</html>