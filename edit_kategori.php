<?php
// $hostname = "localhost";
// $name = "root";
// $db_name = "washzhar";
include 'conn.php';

$kategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE kategori_id = '" . $_GET['id'] . "' ");
if (mysqli_num_rows($kategori) == 0) {
    echo '<script>window.location="kategori.php"</script>';
}
$k = mysqli_fetch_object($kategori);
// if ($sql) {
//     $insert = mysqli_query($koneksi, "UPDATE registrasi SET kategori_name = '$name' WHERE kategory_id ");
//     echo "<script>
//     alert('data berhasil dikirim');
//     window.location = 'kategori.php';
// </script>";
// } else {
//     echo 'gagal' . mysqli_error($koneksi);
//     header("location:kategori.php");
//     }





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylep.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Admin</title>
</head>

<body>
    <!-- Navbar Start  -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">Three<span>Boys</span></a>

        <div class="navbar-nav">
            <a href="dasbor_admin.php">Home</a>
            <a href="kategori.php">Kategori</a>
            <a href="data_produck.php">Produk</a>
            <a href="#contact">Kontak Kami</a>
        </div>

        <div class="navbar-extra">
            <a href="login.php" id="shopping-cart"><i data-feather="user"></i></a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
    </nav>
    <div class="section">
        <div class="container">
            <h1>Data kategori penjualan</h1>
            <br>
            <br>
            <div class="box">
                <div class="background">
                    <div class="tambah">
                        <form action="" method="post">
                            <h1>Ubah data</h1>
                            <label for="name">Nama kategori :</label><br>
                            <input class="inp" type="text" name="name" id="name" value="<?php echo $k->kategori_name ?>">
                            <br>
                            <center><input type="submit" value="Ubah" name="submit" class="submit"></center>
                            <!-- <center><button type="button" class="submit" name="register">SIGN UP</button></center> -->
                            <br>
                        </form>
                        <?php
                        if (isset($_POST["submit"])) {

                            $name = ucwords($_POST['name']);

                            $insert = mysqli_query($koneksi, "UPDATE tb_kategori SET kategori_name = '" . $name . "' WHERE kategori_id = '" . $k->kategori_id . "' ");
                            if ($insert) {
                                echo "<script>
                                    alert('data berhasil dikirim');
                                    window.location = 'kategori.php';
                                    </script>";
                            } else {
                                echo 'gagal' . mysqli_error($koneksi);
                                header("location:kategori.php");
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- Feather Icons -->
<script>
    feather.replace();
</script>
<!-- End Feather Icons -->

<!-- Javascript -->
<script>
    //toggle class active
    const navbarNav = document.querySelector('.navbar-nav');

    //Ketika hamburger menu di klik
    document.querySelector('#hamburger-menu').onclick = () => {
        navbarNav.classList.toggle('active');
    };

    //klik di luar siderbar untuk menghilangkan nav
    const hamburger = document.querySelector('#hamburger-menu');

    document.addEventListener('click', function(e) {
        if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
            navbarNav.classList.remove('active');
        }
    });

    var $cont = documen.querySelector('.cont');
    var $elsArr = [].slice.call(document.querySelectorAll('.el'));
</script>
<!-- End Javascript -->

</html>