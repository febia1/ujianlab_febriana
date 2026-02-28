<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    mysqli_query($koneksi, "DELETE FROM karyawan WHERE id_karyawan='$id'");
}

header("location:tampil_karyawan.php");
?>