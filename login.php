<?php

if ($user_id) {
    header("location:" . BASE_URL);
}
?>


<div class="container-user-akses">

    <form action="<?= BASE_URL . "proses_login.php" ?>" method="POST">
        <?php
        //  mengambil data variable notif yang dirikim ke url
        $notif = isset($_GET['notif']) ? $_GET['notif'] : false;


        if ($notif == true) {
            echo "<div class='notif'>Maaf, email dan password yang diisikan tidak sesuai.</div>";
        }
        ?>

        <div class="element-form">
            <label for="email">Email</label>
            <span><input type="text" name="email" /></span>
        </div>

        <div class="element-form">
            <label for="password">Password</label>
            <span><input type="password" name="password" /></span>
        </div>

        <div class="element-form">
            <span><input type="submit" value="login" /></span>
        </div>

    </form>
</div>