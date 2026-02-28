<?php
include 'koneksi.php';
$type = $_GET['type'];
$id   = $_GET['id'];

if ($type == 'jabatan') {
    $query = "DELETE FROM tbl_jabatan_febriana WHERE id='$id'";
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        echo "<script>alert('Data Berhasil Dihapus!'); window.location='tampil_jabatan.php';</script>";
    } else {
        echo "Gagal Hapus: " . mysqli_error($koneksi);
    }
}
?>