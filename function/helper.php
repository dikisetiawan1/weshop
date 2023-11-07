<?php
define("BASE_URL", "http://localhost/weshop/");


function rupiah($nilai = 0)
{
    $varRupiah = "Rp." . number_format($nilai);
    return $varRupiah;
}
