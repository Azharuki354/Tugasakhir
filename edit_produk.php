<?php
include 'conn.php';

$produk = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE produk_id = '" . $_GET['id'] . "' ");
if (mysqli_num_rows($produk) == 0) {
    echo '<script>window.location="data_produck.php"</script>';
}
$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylep.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
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
                        <form action="" method="post" enctype="multipart/form-data">
                            <h1>Edit Produk</h1>
                            <br>
                            <label for="name">Nama kategori :</label><br>
                            <select name="kategori" id="" class="inp" required>
                                <option value="">--Pilih--</option>
                                <?php
                                $kategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori ORDER BY kategori_id DESC ");
                                while ($r = mysqli_fetch_array($kategori)) {
                                ?>
                                    <option value="<?php echo $r['kategori_id'] ?>" <?php echo ($r['kategori_id'] == $p->kategori_id) ? 'selected' : ''; ?>><?php echo $r['kategori_name'] ?></option>
                                <?php } ?>
                            </select>

                            <input type="text" name="nama" class="inp" placeholder="Nama Produk" id="" value="<?php echo $p->produk_name ?> " required>
                            <input type="text" name="harga" class="inp" placeholder="Harga Produk" id="" value="<?php echo $p->produk_price ?>" required>
                            <img src="produk/<?php echo $p->produk_img ?>" alt="" width="100px">
                            <input type="text" name="foto" value="<?php echo $p->produk_img ?>">
                            <textarea id="desc" type="file" class="inp" name="desc" placeholder="Deskripsi produk"> <?php echo $p->produk_desc ?> </textarea><br>
                            <select id="" class="inp" name="status">
                                <option value="">--Pilih--</option>
                                <option value="1" <?php echo ($p->produk_stats == 1) ? 'selected' : ''; ?>>--Aktif--</option>
                                <option value="0" <?php echo ($p->produk_stats == 0) ? 'selected' : ''; ?>>--Tidak Aktif--</option>
                            </select>
                            <br>
                            <center><input type="submit" class="submit" value="Ubah" name="tambah"></center>
                            <!-- <center><button type="button" class="submit" name="register">SIGN UP</button></center> -->
                            <br>
                        </form>

                        <?php
                        if (isset($_POST["tambah"])) {
                            //dta inputan dari form
                            $kategori   = $_POST['kategori'];
                            $nama       = $_POST['nama'];
                            $harga      = $_POST['harga'];
                            $desc       = $_POST['desc'];
                            $status     = $_POST['status'];
                            $foto     = $_POST['foto'];
                            //data gambar
                            $filename = $_FILES['gambar']['name'];
                            $tmp_name = $_FILES['gambar']['tmp_name'];


                            //valid ganti gambar
                            if ($filename != '') {
                                $tipe1 = explode('.', $filename);
                                $tipe2 = $tipe1[1];

                                $newname = 'produk' . time() . '.' . $tipe2;
                                //menampung tipe file
                                $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                                if (!in_array($tipe2, $tipe_diizinkan)) {
                                    //jika sesuai
                                    echo '<script>alert("Format file tidak di izinkan")</script>';
                                } else {
                                    unlink('./produk/' . $foto);
                                    move_uploaded_file($tmp_name, './produk/' . $newname);
                                    $namagambar = $newname;
                                }
                            } else {
                                //jika tidak ganti gambar
                                $namagambar = $foto;
                            }
                            $update = mysqli_query($koneksi, "UPDATE tb_produk SET 
                            kategori_id = '" . $kategori . "',
                            produk_name = '" . $nama . "',
                            produk_price = '" . $harga . "',
                            produk_desc = '" . $desc . "',
                            produk_img = '" . $namagambar . "',
                            produk_stats = '" . $status . "'
                            WHERE produk_id = '" . $p->produk_id . "' ");
                            if ($update) {
                                echo "<script>
                                        alert('Update data berhasil');
                                        window.location = 'data_produck.php';
                                        </script>";
                            } else {
                                echo 'gagal' . mysqli_error($koneksi);
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
<script>
    ClassicEditor
        .create(document.querySelector(' #desc'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
<!-- End Javascript -->

</html>