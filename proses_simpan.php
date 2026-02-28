<?php
// Aktifkan laporan error agar kita tahu jika ada kendala
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

if (isset($_GET['type'])) {
    $type = $_GET['type'];

    // --- PROSES SIMPAN PENGGUNA ---
    if ($type == 'pengguna') {
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $password = mysqli_real_escape_string($koneksi, $_POST['password']);
        $level    = mysqli_real_escape_string($koneksi, $_POST['level']);

        $query = "INSERT INTO tbl_user_febriana (user_name, password, email) VALUES ('$username', '$password', '$level')";
        $hasil = mysqli_query($koneksi, $query);
        if ($hasil) {
            echo "<script>alert('Data Pengguna Berhasil Disimpan!'); window.location='tampil_pengguna.php';</script>";
        } else {
            die("Gagal simpan pengguna: " . mysqli_error($koneksi));
        }

    // --- PROSES SIMPAN JABATAN ---
    } elseif ($type == 'jabatan') {
        $id = $_POST['id'];
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama_jabatan']);
        $gaji = $_POST['gaji_pokok'];
        $tunj = $_POST['tunjangan_jabatan'];

        $query = "INSERT INTO tbl_jabatan_febriana (id, nama_jabatan, gaji_pokok, tunjangan_jabatan) VALUES ('$id', '$nama', '$gaji', '$tunj')";
        $hasil = mysqli_query($koneksi, $query);
        if ($hasil) {
            echo "<script>alert('Data Jabatan Berhasil Disimpan!'); window.location='tampil_jabatan.php';</script>";
        } else {
            die("Gagal simpan jabatan: " . mysqli_error($koneksi));
        }

    // --- PROSES SIMPAN KARYAWAN (HERO FIX) ---
    } elseif ($type == 'karyawan') {
        $id_karyawan   = mysqli_real_escape_string($koneksi, $_POST['id_karyawan']);
        $nama_karyawan = mysqli_real_escape_string($koneksi, $_POST['nama_karyawan']);
        $id_jabatan    = mysqli_real_escape_string($koneksi, $_POST['id_jabatan']);
        $alamat        = mysqli_real_escape_string($koneksi, $_POST['alamat']);

        // Sekarang query ini akan jalan karena nama_karyawan & id_jabatan sudah ada di DB
        $query = "INSERT INTO karyawan (id_karyawan, nama_karyawan, id_jabatan, alamat) 
                  VALUES ('$id_karyawan', '$nama_karyawan', '$id_jabatan', '$alamat')";
        
        $hasil = mysqli_query($koneksi, $query);
        if ($hasil) {
            echo "<script>alert('Data Karyawan Berhasil Disimpan!'); window.location='tampil_karyawan.php';</script>";
        } else {
            die("Gagal simpan karyawan: " . mysqli_error($koneksi));
        }
    }
}
?>