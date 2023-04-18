<?php

include 'conn.php';

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
      <div class="dropdown">
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
              <h1>Tambah data</h1>
              <br>
              <label for="name">Nama kategori :</label><br>
              <input class="inp" type="text" name="name" id="name">
              <br>
              <center><input type="submit" class="submit" value="TAMBAH" name="register"></center>
              <!-- <center><button type="button" class="submit" name="register">SIGN UP</button></center> -->
              <br>
            </form>
            <?php
            if (isset($_POST["register"])) {

              $name = ucwords($_POST['name']);


              $insert = mysqli_query($koneksi, "INSERT INTO tb_kategori VALUES (null,'$name') ");
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