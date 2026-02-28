<?php
include 'koneksi.php';

$aksi = $_GET['aksi'];

// --- LOGIKA TAMBAH ---
if ($aksi == 'tambah') {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $lvl  = $_POST['level'];

    $q = "INSERT INTO tbl_user_febriana (user_name, password, email) VALUES ('$user', '$pass', '$lvl')";
    if (mysqli_query($koneksi, $q)) {
        echo "<script>alert('Data Berhasil Ditambah!'); window.location='tampil_pengguna.php';</script>";
    }

// --- LOGIKA EDIT ---
} elseif ($aksi == 'edit') {
    $id   = $_POST['id'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $lvl  = $_POST['level'];

    $q = "UPDATE tbl_user_febriana SET user_name='$user', password='$pass', email='$lvl' WHERE id='$id'";
    if (mysqli_query($koneksi, $q)) {
        echo "<script>alert('Data Berhasil Diupdate!'); window.location='tampil_pengguna.php';</script>";
    }

// --- LOGIKA HAPUS ---
} elseif ($aksi == 'hapus') {
    $id = $_GET['id'];
    $q  = "DELETE FROM tbl_user_febriana WHERE id='$id'";
    if (mysqli_query($koneksi, $q)) {
        echo "<script>alert('Data Berhasil Dihapus!'); window.location='tampil_pengguna.php';</script>";
    }
}
?>