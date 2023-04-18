<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>POTONG RAMBUT</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
    <!-- end fonts -->
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="css/styler.css">
    <!-- End Feather icons -->
</head>
<body>4
<nav class="navbar">
      <a href="#" class="navbar-logo">Three<span>Boys</span></a>

      <div class="navbar-nav">
        <a href="index.php">Home</a>
      <div class="dropdown">
        <button class="dropbtn">Produck</button>
        <div class="dropdown-content">
        <a href="potong.php">Potong Rambut</a>
        <a href="#">Konter Pulsa</a>
        <a href="#">Jasa Pengetikan</a>
        <a href="#">Toko Kami</a>
      </div>
      </div>
        <a href="#contact">Kontak Kami</a>
      </div>

      <div class="navbar-extra">
        <a href="login.php" id="shopping-cart"><i data-feather="user"></i></a>
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
      </div>
    </nav>
    <h1>Selamat datang di potong rambut kami</h1>
    <div class="card">
    <p> <img src="img/biaks.jpeg" alt=""> <span>BIAK TENGAH</span></p>
    <p> <img src="img/under.jpg" alt=""> <span>undercut</span></p>
    <p> <img src="img/mohak.jpeg" alt=""> <span>mohawk</span></p>
    <p> <img src="img/mulet.jpeg" alt=""> <span>mulet</span></p>
    <p> <img src="img/tentara.jpg" alt=""> <span>tentara</span></p>
    <p> <img src="img/fc.jpg" alt=""> <span>fracscrop</span></p>
    <script>
      feather.replace();
    </script>
    <!-- End Feather Icons -->

    <!-- Javascript -->
    <script >//toggle class active
const navbarNav = document.querySelector('.navbar-nav');

//Ketika hamburger menu di klik
document.querySelector('#hamburger-menu').onclick = () => 
{
  navbarNav.classList.toggle('active');
};

//klik di luar siderbar untuk menghilangkan nav
const hamburger = document.querySelector('#hamburger-menu');

document.addEventListener('click', function (e) {
  if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove('active');
  }
});

  var $cont = documen.querySelector('.cont');
  var $elsArr = [].slice.call(document.querySelectorAll('.el'));


</script>
</div>
</body>

</html>