<?php

include_once 'function/helper.php';

$page = isset($_GET['page']) ? $_GET['page'] : false;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weshop</title>

    <link rel="stylesheet" href="<?= BASE_URL . "css/style.css"; ?>" type="text/css" />
</head>
<div id="container">
    <div id="header">
        <a href="<?= BASE_URL . "index.php"; ?>">
            <img src="<?= BASE_URL . "images/logo.png"; ?>" alt="logo">
        </a>
        <div id="menu">
            <div id="user">
                <a href="<?= BASE_URL . "index.php?page=login"; ?>">Login</a>
                <a href="<?= BASE_URL . "index.php?page=register"; ?>">Register</a>
            </div>
            <a href="<?= BASE_URL . "index.php?page=keranjang"; ?>" id="button-keranjang">

                <img src="<?= BASE_URL . "images/cart.png"; ?>" alt="cart">

            </a>
        </div>
    </div>
    <div id="content">

        <?php

        $filename = "$page.php";

        if (file_exists($filename)) {
            include_once($filename);
        } else {
            echo "maaf, halaman ini tidak tersedia";
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