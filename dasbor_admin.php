<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/stylet.css">
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