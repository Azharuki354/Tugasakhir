<?php
    $koneksi = mysqli_connect('localhost', 'root','', 'washzhar') or die(mysqli_error($koneksi));
if (isset($_POST["ganti"])) {
    $password = $_POST['password'];
    $name = $_POST['name'];
    $sql = "SELECT * FROM registrasi WHERE name ='$name' ";
    $result = mysqli_query($koneksi, $sql);
    if($result){
        mysqli_query($koneksi,"UPDATE registrasi SET password = '$password' WHERE name = '$name' ");
        echo "<script>
        alert('Password telah diganti');
        window.location = 'login.php';
    </script>";
    }
        
}
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylei.css">
    <title>Ganti password</title>
</head>
<body>
    <div class="background">
    <div class="shape"></div>
        <div class="shape"></div>
    

    <form action="" method="post">
    <h2>Ganti password</h2>
                <label for="name">User name :</label>
                <input type="text" name="name" id="name">
            <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            <center><input type="submit" class="submit" value="Ganti password" name="ganti"></center>
            
            <p>belum registrasi?</p>
            <a href="registrasi.php">registrasi</a>
        </ul>
    </form>
    </div>
</body>
</html>