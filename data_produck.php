<?php
include 'conn.php';
?>


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
    <div class="section">
        <div class="container">
            <h3>Data Produck penjualan</h3>
            <div class="box">
                <p><a href="tambah_produk.php" class="au">Tambah data</a></p>
                <br>
                <table border="1" cellspacing="0" class="tabel">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Kategori</td>
                            <td>Nama</td>
                            <td>Harga</td>
                            <td>Descripsi</td>
                            <td>Gambar</td>
                            <td>Status</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $produk = mysqli_query($koneksi, "SELECT * FROM tb_produk LEFT JOIN tb_kategori USING (kategori_id) ORDER BY produk_id DESC ");
                        if (mysqli_num_rows($produk) > 0) {

                            while ($row = mysqli_fetch_array($produk)) {
                        ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['kategori_name'] ?></td>
                                    <td><?php echo $row['produk_name'] ?></td>
                                    <td>Rp. <?php echo number_format($row['produk_price'])  ?></td>
                                    <td><?php echo $row['produk_desc'] ?></td>
                                    <td> <a href="produk/<?php echo $row['produk_img'] ?>" target="_blank"> <img src="produk/<?php echo $row['produk_img'] ?>" width="50px"></a></td>
                                    <td><?php echo ($row['produk_stats'] == 0) ? 'tidak aktif' : 'aktif' ?></td>
                                    <td><a href="edit_produk.php?id=<?php echo $row['produk_id'] ?>">Edit</a>||<a href="Hapus.php?idp=<?php echo $row['produk_id'] ?>" onclick="return confirm('Yakin mau hapus?')">Hapus</a></td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="8">Tidak ada data </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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