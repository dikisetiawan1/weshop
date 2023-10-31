 <div class="container-user-akses">

     <form action="<?= BASE_URL . "proses_register.php" ?>" method="POST">
         <?php
            //  mengambil data variable notif yang dirikim ke url
            $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
            $nama = isset($_GET['nama']) ? $_GET['nama'] : false;
            $email = isset($_GET['email']) ? $_GET['email'] : false;
            $phone = isset($_GET['phone']) ? $_GET['phone'] : false;
            $alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;

            if ($notif == 'required') {
                echo "<div class='notif'>Maaf, kamu haru melengkapi form dibawah ini.</div>";
            } elseif ($notif == 'password') {
                echo "<div class='notif'>Maaf, password yang kamu masukan tidak sama.</div>";
            } elseif ($notif == 'email') {
                echo "<div class='notif'>Maaf, email yang kamu inputkan  sudah terdaftar.</div>";
            }
            ?>
         <div class="element-form">
             <label for="nama">Nama Lengkap</label>
             <span><input type="text" name="nama" value="<?= $nama ?>" /></span>
         </div>
         <div class="element-form">
             <label for="email">Email</label>
             <span><input type="text" name="email" value="<?= $email ?>" /></span>
         </div>
         <div class="element-form">
             <label for="phone">No Tlp / WA</label>
             <span><input type="text" name="phone" value="<?= $phone ?>" /></span>
         </div>
         <div class="element-form">
             <label for="alamat">Alamat</label>
             <span><textarea name="alamat"><?php echo $alamat ?></textarea></span>
         </div>
         <div class="element-form">
             <label for="password">Password</label>
             <span><input type="password" name="password" /></span>
         </div>
         <div class="element-form">
             <label for="re_password">Re-password</label>
             <span><input type="password" name="re_password" /></span>
         </div>
         <div class="element-form">
             <span><input type="submit" value="register" /></span>
         </div>

     </form>
 </div>