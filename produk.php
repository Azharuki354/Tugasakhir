<?php
error_reporting(0);
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TB</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
    <!-- end fonts -->
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="css/stylee.css">
    <!-- End Feather icons -->
</head>

<body>
    <!-- Navbar Start  -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">Three<span>Boys</span></a>

        <div class="navbar-nav">
            <a href="index.php">Home</a>
            <!-- <div class="dropdown">
                <button class="dropbtn">Produck</button>
                <div class="dropdown-content">
                    <a href="potong.php">Potong Rambut</a>
                    <a href="#">Konter Pulsa</a>
                    <a href="#">Jasa Pengetikan</a>
                    <a href="#">Toko Kami</a>
                </div>
            </div> -->
            <a href="produk.php">Produk</a>
            <a href="#contact">Kontak Kami</a>
        </div>

        <div class="navbar-extra">
            <a href="login.php" id="shopping-cart"><i data-feather="user"></i></a>

            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
    </nav>
    <!-- Navbar End  -->


    <!-- about -->
    <h2 class="anout">TENTANG PRODUK KAMI</h2>
    <center>
        <div class="cari">
            <div class="conten">
                <form action="produk.php">
                    <input type="text" name="cari" placeholder="Cari" id="" value="<?php echo $_GET['cari'] ?>">
                    <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                    <input type="submit" name="Cari" value="Cari produk">
                </form>
            </div>
        </div>
    </center>
    <!-- card -->

    <!-- new produk -->
    <div class="section">
        <div class="kontener">
            <h3>Produk</h3>
            <div class="box">
                <?php
                if ($_GET['cari'] != '' || $_GET['kat'] != '') {
                    $where = "AND produk_name LIKE '%" . $_GET['cari'] . "%' AND kategori_id  LIKE '%" . $_GET['kat'] . "%'";
                }
                $produk = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE produk_stats = 1 $where ORDER BY produk_id DESC ");
                if (mysqli_num_rows($produk) > 0) {
                    while ($p = mysqli_fetch_array($produk)) {
                ?>
                        <a href="detailprod.php?id=<?php echo $p['produk_id'] ?>">
                            <div class="col-4">
                                <div class="img">
                                    <img src="produk/<?php echo $p['produk_img'] ?>" alt="">
                                </div>
                                <p class="nama"><?php echo $p['produk_name'] ?></p>
                                <p class="harga">Rp. <?php echo $p['produk_price'] ?></p>
                            </div>
                        </a>
                    <?php }
                } else { ?>
                    <p>tidak ada produk</p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="foter">
        <div class="kontener">
            <small>nggone uki</small>
        </div>
    </div>

    </div>
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
</body>

</html>