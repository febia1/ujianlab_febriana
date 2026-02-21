<?php
$host = "localhost";
$user = "root";
$pass = "";
$nama_db = "ukk_febriana";

$koneksi = new mysqli($host, $user, $pass, $nama_db);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

echo "Koneksi berhasil!";
?>