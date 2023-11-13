<?php

if ($user_id) {
    $module = isset($_GET['module']) ? $_GET['module'] : false;
    $action = isset($_GET['action']) ? $_GET['action'] : false;
    $mode = isset($_GET['mode']) ? $_GET['mode'] : false;
} else {
    header("location:" . BASE_URL . "index.php?page=login");
}
?>


<div id="bg-page-profile">
    <div id="menu-profile">
        <ul>
            <?php
            if ($level == "superadmin") {

            ?>
                <li>
                    <a <?php if ($module == "kategori") {
                            echo "class='active'";
                        } ?> href="<?php echo BASE_URL . "index.php?page=My_profile&module=kategori&action=list"; ?>" id="class_a">Kategori</a>
                </li>
                <li>
                    <a <?php if ($module == "barang") {
                            echo "class='active'";
                        } ?> href="<?php echo BASE_URL . "index.php?page=My_profile&module=barang&action=list"; ?>" id="class_a">Barang</a>
                </li>
                <li>
                    <a <?php if ($module == "kota") {
                            echo "class='active'";
                        } ?> href="<?php echo BASE_URL . "index.php?page=My_profile&module=kota&action=list"; ?>" id="class_a">Kota</a>
                </li>
                <li>
                    <a <?php if ($module == "user") {
                            echo "class='active'";
                        } ?> href="<?php echo BASE_URL . "index.php?page=My_profile&module=user&action=list"; ?>" id="class_a">User</a>
                </li>
                <li>
                    <a <?php if ($module == "banner") {
                            echo "class='active'";
                        } ?> href="<?php echo BASE_URL . "index.php?page=My_profile&module=banner&action=list"; ?>" id="class_a">Banner</a>
                </li>

            <?php
            } ?>


            <li>
                <a <?php if ($module == "pesanan") {
                        echo "class='active'";
                    } ?> href="<?php echo BASE_URL . "index.php?page=My_profile&module=pesanan&action=list"; ?>">Pesanan</a>
            </li>

        </ul>
    </div>

    <div id="profile-content">
        <?php
        $file = "module/$module/$action.php";
        if (file_exists($file)) {
            include_once($file);
        } else {
            echo "Maaf, Halaman tidak dapat ditemukan";
        }
        ?>
    </div>
</div>