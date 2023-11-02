<?php

include_once '../../function/helper.php';
include_once '../../function/koneksi.php';


$kategori = $_POST['kategori'];
$status = $_POST['status'];
$button = $_POST['button'];

mysqli_query($koneksi, "INSERT INTO kategori (kategori, status) VALUES ('$kategori','$status')");

header("location:" . BASE_URL . "index.php?page=My_profile&module=kategori&action=list");
