<div id="frame-tambah">
    <a href="<?php echo BASE_URL . "index.php?page=My_profile&module=barang&action=form"; ?>">+ Tambah barang</a>
</div>


<?php

$query = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori ON barang.kategori_id=kategori.kategori_id");

if (mysqli_num_rows($query) == 0) {
    echo "<h3>Saat ini belum ada barang</h3>";
} else {
    echo "<table class='table-list'>";

    echo "<tr class='baris-title'>
            <th class='kolom-nomor'>No</th>
            <th class='kiri'>Barang</th>
            <th class='kiri'>Kategori</th>
            <th class='kiri'>Harga</th>
            <th class='tengah'>Status</th>
            <th class='tengah'>Action</th>
          </tr>
        ";

    $no = 1;
    while ($row = mysqli_fetch_assoc($query)) {
        echo "
        <tr class='baris-title'>
            <td class='kolom-nomor'>$no</td>
            <td class='kiri'>$row[nama_barang]</td>
            <td class='kiri'>$row[kategori]</td>
            <td class='kiri'>" . rupiah($row["harga"]) . "</td>
            <td class='tengah'>$row[status]</td>
            <td class='tengah'>
            <a href='" . BASE_URL . "index.php?page=My_profile&module=barang&action=form&barang_id=$row[barang_id]'>Edit</a>
            </td>
        </tr>
        ";
        $no++;
    }

    echo "</table>";
}






?>