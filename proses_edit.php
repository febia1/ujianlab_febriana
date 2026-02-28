<?php
include 'koneksi.php';
$type = $_GET['type'];

if ($type == 'jabatan') {
    $id    = $_POST['id'];
    $nama  = $_POST['nama_jabatan'];
    $gaji  = $_POST['gaji'];
    $tunj  = $_POST['tunjangan'];

    $query = "UPDATE tbl_jabatan_febriana SET nama_jabatan='$nama', gaji_pokok='$gaji', tunjangan_jabatan='$tunj' WHERE id='$id'";
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        echo "<script>alert('Data Berhasil Diupdate!'); window.location='tampil_jabatan.php';</script>";
    } else {
        echo "Gagal Update: " . mysqli_error($koneksi);
    }
}
?>