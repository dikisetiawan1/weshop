<?php

session_start();

include_once 'function/koneksi.php';
include_once 'function/helper.php';

$page = isset($_GET['page']) ? $_GET['page'] : false;
$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
$totalBarang = count($keranjang);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weshop</title>

    <link rel="stylesheet" href="<?php echo BASE_URL . "css/style.css?v15"; ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo BASE_URL . "css/banner.css?v2"; ?>" type="text/css" />

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src=" <?php echo BASE_URL . "js/Slides-SlidesJS-3/source/jquery.slides.min.js"; ?>"></script>
    <script>
        $(function() {
            $('#slides').slidesjs({
                height: 350,
                play: {
                    auto: true,
                    interval: 3000
                },
                navigation: false
            });
        });
    </script>
</head>
<div id="container">
    <div id="header">
        <a href="<?= BASE_URL . "index.php"; ?>">
            <img src="<?= BASE_URL . "images/logo.png"; ?>" alt="logo">
        </a>
        <div id="menu">
            <div id="user">
                <?php
                if ($user_id) {
                    echo "hi <b>$nama</b>, 
                    <a href='" . BASE_URL . "index.php?page=My_profile&module=pesanan&action=list'> My Profile </a>
                    <a href='" . BASE_URL . "logout.php'>Logout</a>
                    ";
                } else {
                    echo "<a href='" . BASE_URL . "index.php?page=login'>Login</a>
                    <a href='" . BASE_URL . "index.php?page=register'>Register</a>";
                }
                ?>
            </div>
            <a href="<?= BASE_URL . "index.php?page=keranjang"; ?>" id="button-keranjang">
                <img src="<?= BASE_URL . "images/cart.png"; ?>" alt="cart">
                <?php
                if ($totalBarang != 0) {
                    echo "<span class='total-barang'>" . $totalBarang . "</span>";
                }
                ?>
            </a>
        </div>
    </div>
    <div id="content">

        <?php
        $filename = "$page.php";

        if (file_exists($filename)) {
            include_once($filename);
        } else {

            include_once("main.php");
        }
        ?>

    </div>
    <div id="footer">
        <p>Copyright@Diki Setiawan <?php date("Y"); ?></p>
    </div>
</div>

<body>

</body>

</html>