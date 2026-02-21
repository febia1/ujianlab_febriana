<?php
include 'koneksi.php';

// Mengambil id dari URL
$id = $_GET["id"];

// PERBAIKAN: Ubah nama tabel dari 'produk' menjadi 'tbl_produk'
$query = "DELETE FROM tbl_produk WHERE id='$id' ";
$hasil_query = mysqli_query($koneksi, $query);

// Periksa query, apakah ada kesalahan
if(!$hasil_query) {
    die ("Gagal menghapus data: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
} else {
    // Pastikan teks alert tidak terpotong baris baru agar tidak error Javascript
    echo "<script>alert('Data berhasil dihapus.');window.location='index.php';</script>";
}
?>