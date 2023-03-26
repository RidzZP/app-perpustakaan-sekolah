<?php
// SET Koneksi ke MySQL Server

$user='root';
$pass='';
$host='localhost';
$db='apl_perpus';
$koneksi = mysqli_connect($host,$user,$pass,$db);

if (mysqli_connect_errno()) {
    echo "GAGAL KONEKSI KE DATABASE: " . mysqli_connect_error();
    exit();
}

GLOBAL $koneksi;

// Set Proteksi Halaman Web
define('_PROTEKSI',true);
?>