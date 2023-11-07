<?php

$barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;

$nama_barang = "";
$kategori_id = "";
$gambar = "";
$stok = "";
$harga = "";
$spesifikasi = "";
$status = "";
$button = "Add";
$keteranganGambar = "";

if ($barang_id) {
    $queryKategori = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id'");

    $row = mysqli_fetch_assoc($queryKategori);
    $nama_barang = $row['nama_barang'];
    $kategori_id = $row['kategori_id'];
    $spesifikasi = $row['spesifikasi'];
    $gambar = $row['gambar'];
    $harga = $row['harga'];
    $stok = $row['stok'];
    $status = $row['status'];
    $button = "Update";

    $keteranganGambar = "(Silahkan klik tombol dibawah ini jika ingin ubah gambar)";
    $img = "<img src='" . BASE_URL . "images/barang/$gambar' style='width:200px;vertical-align:middle;'/>";
}


?>

<form action="<?php echo BASE_URL . "module/barang/action.php?barang_id=$barang_id"; ?>" method="POST" enctype="multipart/form-data">
    <div class="element-form">
        <label for="kategori">Kategori</label>
        <span>
            <select name="kategori_id">
                <?php
                $query = mysqli_query($koneksi, "SELECT kategori_id, kategori FROM kategori WHERE status='on'");
                while ($row =  mysqli_fetch_assoc($query)) {
                    if ($kategori_id == $row['kategori_id']) {
                        echo "<option value='$row[kategori_id]' selected='true'>$row[kategori]</option>";
                    } else {

                        echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
                    }
                }
                ?>
            </select>
        </span>
    </div>

    <div class="element-form">
        <label for="nama_barang">Nama Barang</label>
        <span><input type="text" name="nama_barang" value="<?php echo $nama_barang; ?>" /></span>
    </div>
    <div class="element-form">
        <label for="spesifikasi">Spesifikasi</label>
        <span><textarea name="spesifikasi"><?php echo $spesifikasi; ?></textarea></span>
    </div>

    <div class="element-form">
        <label for="stok">Stok</label>
        <span><input type="text" name="stok" value="<?php echo $stok; ?>" /></span>
    </div>
    <div class="element-form">
        <label for="harga">Harga</label>
        <span><input type="text" name="harga" value="<?php echo $harga; ?>" /></span>
    </div>
    <div class="element-form">
        <label for="file">Upload Gambar <?php echo $keteranganGambar; ?></label>
        <span>
            <input type="file" name="file" />
            <?php echo $img; ?>
        </span>
    </div>

    <div class="element-form">
        <label for="status">Status</label>
        <span>
            <input type="radio" name="status" value="on" <?php if ($status == "on") {
                                                                echo "checked ='true'";
                                                            } ?> /> On
            <input type="radio" name="status" value="off" <?php if ($status == "off") {
                                                                echo "checked ='true'";
                                                            } ?> /> Off
        </span>
    </div>

    <div class="element-form">
        <span><input type="submit" name="button" value="<?php echo $button; ?>" /></span>
    </div>








</form>