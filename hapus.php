<?php
include 'conn.php';
if (isset($_GET['idk'])) {
    $delete = mysqli_query($koneksi, "DELETE FROM tb_kategori WHERE kategori_id = '" . $_GET['idk'] . "' ");

    echo '<script>window.location="kategori.php"</script>';
}
if (isset($_GET['idp'])) {
    $produk = mysqli_query($koneksi, "SELECT produk_img FROM tb_produk WHERE produk_id  = '" . $_GET['idp'] . "'  ");
    $p = mysqli_fetch_object($produk);
    unlink('./produk/' . $p->produk_img);
    $delete = mysqli_query($koneksi, "DELETE FROM tb_produk WHERE produk_id = '" . $_GET['idp'] . "' ");

    echo '<script>window.location="data_produck.php"</script>';
}
