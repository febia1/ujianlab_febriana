<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

// membuat variabel untuk menampung data dari form
// mysqli_real_escape_string berguna agar script tidak error jika ada tanda petik (') pada nama/deskripsi
$nama_produk = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
$deskripsi   = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

// MENGHAPUS TITIK PADA HARGA (Penting!)
// Menghilangkan tanda titik agar bisa masuk ke database sebagai angka (integer)
$harga_beli  = str_replace('.', '', $_POST['harga_beli']);
$harga_jual  = str_replace('.', '', $_POST['harga_jual']);

$gambar_produk = $_FILES['gambar_produk']['name'];

// cek dulu jika ada gambar produk jalankan coding ini
if($gambar_produk != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg'); 
    $x = explode('.', $gambar_produk); 
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar_produk']['tmp_name'];
    $angka_acak = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; 

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        // pastikan folder 'gambar' sudah dibuat di direktori kamu
        if (move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru)) {
            
            // PERBAIKAN: Nama tabel diganti ke tbl_produk, kolom gambar diganti ke gambar_produk
            $query = "INSERT INTO tbl_produk (nama_produk, deskripsi, harga_beli, harga_jual, gambar_produk) VALUES ('$nama_produk', '$deskripsi', '$harga_beli', '$harga_jual', '$nama_gambar_baru')";
            $result = mysqli_query($koneksi, $query);

            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
            } else {
                echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
            }
        } else {
            echo "<script>alert('Gagal mengupload gambar. Pastikan folder gambar sudah dibuat.');window.location='tambah_produk.php';</script>";
        }
    } else {
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
    }
} else {
    // Jika tidak ada gambar (Bagian else yang tadi kosong sudah ditambahkan)
    $query = "INSERT INTO tbl_produk (nama_produk, deskripsi, harga_beli, harga_jual, gambar_produk) VALUES ('$nama_produk', '$deskripsi', '$harga_beli', '$harga_jual', null)";
    $result = mysqli_query($koneksi, $query);

    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil ditambah tanpa gambar.');window.location='index.php';</script>";
    }
}
?>