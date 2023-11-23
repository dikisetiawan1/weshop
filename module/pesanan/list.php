<?php

if ($level == "superadmin") {
    $queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id ORDER BY pesanan.tanggal_pemesanan DESC");
} else {
    $queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id WHERE pesanan.user_id='$user_id' ORDER BY pesanan.tanggal_pemesanan DESC");
}


if (mysqli_num_rows($queryPesanan) == 0) {
    echo "<h3>Saat ini belum ada data pesanan</h3>";
} else {
    echo "
    <table class='table-list'>
    <tr class='baris-title'>
        <td class='kiri'>Nomor Pesanan</td>
        <td class='tengah'>Status</td>
        <td class='kanan'>Nama</td>
        <td class='kanan'>Action</td>
    </tr>
    
    ";
    $adminButton = "";

    while ($row = mysqli_fetch_assoc($queryPesanan)) {
        if ($level == "superadmin") {
            $adminButton = "<a class='tombol-action' href='" . BASE_URL . "index.php?page=My_profile&module=pesanan&action=status&pesanan_id=$row[pesanan_id]'>Update Status</a>";
        }

        $status = $row['status'];
        echo "
    <tr>
        <td class='kiri'>$row[pesanan_id]</td>
        <td class='tengah'>$arrayStatusPesanan[$status]</td>
        <td class='kanan'>$row[nama]</td>
        <td class ='kanan'>

        $adminButton
            <a class='tombol-action' href='" . BASE_URL . "index.php?page=My_profile&module=pesanan&action=detail&pesanan_id=$row[pesanan_id]'>Detail Pesanan</a>
        
        </td>
    
    </tr>";
    }


    echo "</table>";
}
