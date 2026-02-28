<?php
// 1. Hubungkan ke koneksi
include 'koneksi.php';

// 2. Logika Simpan Data (Akan jalan saat tombol Simpan diklik)
if (isset($_POST['simpan'])) {
    // Ambil data dari form (name di input)
    $username_form = $_POST['username'];
    $password_form = $_POST['password'];
    $level_form    = $_POST['level']; 

    // Query simpan disesuaikan dengan struktur phpMyAdmin kamu:
    // Kolom: user_name, email (untuk level), password. 
    // Kolom 'id' tidak ditulis karena AUTO_INCREMENT
    $query = "INSERT INTO tbl_user_febriana (user_name, email, password) 
              VALUES ('$username_form', '$level_form', '$password_form')";
    
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        echo "<script>alert('Data Berhasil Disimpan!'); window.location='tampil_pengguna.php';</script>";
    } else {
        // Jika gagal, tampilkan error aslinya agar kita tahu salahnya di mana
        die("Gagal Simpan! Error: " . mysqli_error($koneksi));
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pengguna - Febriana</title>
</head>
<body>

    <!-- Memanggil header (navigasi & CSS) -->
    <?php include 'header.php'; ?>

    <div class="container">
        <!-- Form action kosong agar diproses di bagian atas file ini -->
        <form action="" method="POST">
            <fieldset>
                <legend>Tambah Data Pengguna</legend>

                <div class="form-group">
                    <label>id_pengguna (Otomatis)</label>
                    <input type="text" placeholder="ID akan terisi otomatis" readonly style="background:#ddd;">
                </div>

                <div class="form-group">
                    <label>username</label>
                    <input type="text" name="username" required placeholder="Masukkan Username">
                </div>

                <div class="form-group">
                    <label>password</label>
                    <input type="password" name="password" required placeholder="Masukkan Password">
                </div>

                <div class="form-group">
                    <label>level</label>
                    <select name="level" required>
                        <option value="">-- Pilih Level --</option>
                        <option value="Admin">Admin</option>
                        <option value="Operator">Operator</option>
                    </select>
                </div>

                <div class="btn-container">
                    <!-- name="simpan" harus ada agar terbaca di PHP atas -->
                    <button type="submit" name="simpan" class="btn">Simpan</button>
                    <a href="tampil_pengguna.php" class="btn" style="background:#eee; text-decoration:none; color:black; text-align:center; display:flex; align-items:center; justify-content:center;">Batal</a>
                </div>
            </fieldset>
        </form>
    </div>

    <footer>
        Copyright@febriana_155
    </footer>

</body>
</html>