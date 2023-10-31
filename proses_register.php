<?php


include_once 'function/koneksi.php';
include_once 'function/helper.php';


// proses pengiriman data kedalama database menggunakan method : $_POST
$level = "customer";
$status = "on";
$nama_lengkap = $_POST['nama'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$alamat = $_POST['alamat'];
$password = md5($_POST['password']);
$re_password = md5($_POST['re_password']);

// menghilangkan isi dari input paassword yg akan di tampilkan di link URL
unset($_POST['password']);
unset($_POST['re_password']);

// menampilkan data yang dikirimkan oleh user ke dalam URL "ketika user tidak mengisi salah satu kolom tsb"
$dataForm = http_build_query($_POST);

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");


// jika semua field itu kosong, maka kembalikan ke halaman register. jika kolom tsb diisi semua maka akan masuk kedalam database.
if (empty($nama_lengkap) || empty($email) || empty($phone) || empty($alamat) || empty($password)) {
    header("location:" . BASE_URL . "index.php?page=register&notif=required&$dataForm");
} elseif ($password != $re_password) {
    header("location:" . BASE_URL . "index.php?page=register&notif=password&$dataForm");
} elseif (mysqli_num_rows($query) == 1) {
    header("location:" . BASE_URL . "index.php?page=register&notif=email&$dataForm");
} else {
    mysqli_query($koneksi, "INSERT INTO user(level, nama, email, alamat, phone, password, status)
                            VALUES('$level','$nama_lengkap','$email', '$phone', '$alamat', '$password', '$status')");
}
