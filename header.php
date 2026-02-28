<?php 
include 'koneksi.php'; 
// Mendapatkan nama file yang sedang dibuka untuk menentukan menu active
$current_page = basename($_SERVER['PHP_SELF']);
?>
<style type="text/css">
    body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #fff; }
    
    /* --- Style Menu Navigasi --- */
    .navbar { display: flex; border: 1px solid #000; margin: 20px auto; width: 95%; background: #fff; }
    .navbar a { flex: 1; text-align: center; padding: 12px 0; text-decoration: none; color: #000; border-right: 1px solid #000; font-weight: bold; font-size: 14px; }
    .navbar a:last-child { border-right: none; }
    .navbar a.active { background-color: #72a1e5; } /* Warna biru sesuai mockup */
    .navbar a:hover { background-color: #f0f0f0; }

    /* --- Style Kontainer Utama --- */
    .container { width: 95%; margin: 0 auto; padding-bottom: 60px; }
    fieldset { border: 2px solid #000; padding: 25px; min-height: 350px; }
    legend { font-weight: bold; padding: 0 10px; }

    /* --- Style Form --- */
    .form-group { margin-bottom: 15px; }
    label { display: block; margin-bottom: 5px; font-weight: bold; }
    input[type="text"], input[type="password"], input[type="number"], input[type="date"], select, textarea { 
        width: 350px; padding: 8px; border: 2px solid #000; box-sizing: border-box; background: #fff;
    }

    /* --- Style Tabel (Penting untuk halaman Tampil) --- */
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    table, th, td { border: 2px solid #000; }
    th { background-color: #f2f2f2; padding: 10px; text-align: left; }
    td { padding: 10px; }

    /* --- Style Tombol Lonjong (Sesuai Mockup) --- */
    .btn-container { margin-top: 20px; display: flex; gap: 15px; }
    .btn { 
        display: inline-block; padding: 8px 35px; border: 2px solid #000; border-radius: 20px; 
        background: #fff; cursor: pointer; font-weight: bold; text-decoration: none; color: #000; text-align: center;
    }
    .btn:hover { background: #eee; }

    /* --- Style Footer --- */
    footer { position: fixed; bottom: 0; width: 100%; background: #ccc; border-top: 1px solid #000; text-align: center; padding: 10px 0; font-weight: bold; z-index: 999; }
</style>

<div class="navbar">
    <a href="home.php" class="<?= $current_page == 'home.php' ? 'active' : '' ?>">Home</a>
    
    <!-- Link diarahkan ke halaman TAMPIL agar user bisa lihat list datanya dulu -->
    <a href="tampil_pengguna.php" class="<?= (strpos($current_page, 'pengguna') !== false) ? 'active' : '' ?>">Pengguna</a>
    <a href="tampil_jabatan.php" class="<?= (strpos($current_page, 'jabatan') !== false) ? 'active' : '' ?>">Jabatan</a>
    <a href="tampil_karyawan.php" class="<?= (strpos($current_page, 'karyawan') !== false) ? 'active' : '' ?>">Karyawan</a>
    <a href="tampil_transaksi.php" class="<?= (strpos($current_page, 'transaksi') !== false) ? 'active' : '' ?>">Transaksi</a>
    
    <a href="laporan.php" class="<?= $current_page == 'laporan.php' ? 'active' : '' ?>">Laporan</a>
    <a href="logout.php" style="flex: 0.5;">Keluar</a>
</div>