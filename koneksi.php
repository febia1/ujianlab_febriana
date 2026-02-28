<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_ujianlab_febriana_155"; // Pastikan nama DB ini sama persis di phpMyAdmin

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>