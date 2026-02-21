<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

// membuat variabel untuk menampung data dari form
$id            = $_POST['id'];
$nama_produk   = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
$deskripsi     = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

// MENGHAPUS TITIK PADA HARGA
$harga_beli    = str_replace('.', '', $_POST['harga_beli']);
$harga_jual    = str_replace('.', '', $_POST['harga_jual']);

$gambar_produk = $_FILES['gambar_produk']['name'];

// cek dulu jika merubah gambar produk jalankan coding ini
if($gambar_produk != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg'); 
    $x = explode('.', $gambar_produk); 
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar_produk']['tmp_name'];
    $angka_acak = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; 

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        // Pindahkan file baru ke folder gambar
        move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);

        // PERBAIKAN: Nama tabel = tbl_produk, Kolom gambar = gambar_produk
        $query  = "UPDATE tbl_produk SET nama_produk = '$nama_produk', deskripsi = '$deskripsi', harga_beli = '$harga_beli', harga_jual = '$harga_jual', gambar_produk = '$nama_gambar_baru' ";
        $query .= "WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);

        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Ekstensi gambar hanya boleh jpg atau png.');window.location='edit_produk.php?id=$id';</script>";
    }
} else {
    // Jika tidak merubah gambar, jalankan query UPDATE tanpa kolom gambar
    // PERBAIKAN: Nama tabel = tbl_produk
    $query  = "UPDATE tbl_produk SET nama_produk = '$nama_produk', deskripsi = '$deskripsi', harga_beli = '$harga_beli', harga_jual = '$harga_jual' ";
    $query .= "WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
    }
}
?>