<?php
// Hubungkan ke koneksi database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengguna - Febriana</title>
    <style type="text/css">
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #fff; }

        /* Style Menu Navigasi (Sesuai Sketsa) */
        .navbar {
            display: flex;
            width: 95%;
            margin: 20px auto;
            border: 2px solid #000;
        }
        .navbar a {
            flex: 1;
            text-align: center;
            padding: 12px 0;
            text-decoration: none;
            color: #000;
            border-right: 2px solid #000;
            font-weight: bold;
        }
        .navbar a:last-child { border-right: none; }
        .navbar a.active { background-color: #72a1e5; }

        /* Style Tabel Data */
        .container { width: 95%; margin: 0 auto; }
        fieldset {
            border: 2px solid #000;
            padding: 25px;
            min-height: 400px;
        }
        legend { font-weight: bold; padding: 0 10px; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 2px solid #000;
        }
        th {
            background-color: #f2f2f2;
            padding: 10px;
            text-align: center;
        }
        td {
            padding: 10px;
            text-align: left;
        }

        /* Tombol Tambah Data (Lonjong) */
        .btn-tambah {
            display: inline-block;
            margin-bottom: 15px;
            padding: 8px 20px;
            border: 2px solid #000;
            border-radius: 20px;
            text-decoration: none;
            color: #000;
            font-weight: bold;
            background: #eee;
        }
        
        .btn-aksi {
            text-decoration: none;
            font-weight: bold;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #ccc;
            border-top: 2px solid #000;
            text-align: center;
            padding: 10px 0;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Navigasi Menu -->
    <div class="navbar">
        <a href="home.php">Home</a>
        <a href="tampil_pengguna.php" class="active">Pengguna</a>
        <a href="jabatan.php">Jabatan</a>
        <a href="karyawan.php">Karyawan</a>
        <a href="transaksi.php">Transaksi</a>
        <a href="laporan.php">Laporan</a>
        <a href="logout.php">Keluar</a>
    </div>

    <div class="container">
        <fieldset>
            <legend>Data Pengguna Tersimpan</legend>
            
            <a href="form_pengguna.php" class="btn-tambah">+ Tambah Data Baru</a>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Level (Email)</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Ambil data dari database
                    $query = "SELECT * FROM tbl_user_febriana ORDER BY id ASC";
                    $tampil = mysqli_query($koneksi, $query);
                    $no = 1;

                    while ($data = mysqli_fetch_array($tampil)) {
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $no++; ?></td>
                        <td style="text-align: center;"><?php echo $data['id']; ?></td>
                        <td><?php echo $data['user_name']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td>********</td>
                        
                        <!-- BAGIAN AKSI YANG SUDAH DIPERBAIKI -->
                        <td style="text-align: center;">
                            <!-- Link Edit mengirim ID ke halaman edit -->
                            <a href="edit_pengguna.php?id=<?= $data['id']; ?>" class="btn-aksi" style="color: blue;">Edit</a> | 
                            <!-- Link Hapus mengirim ID ke file proses -->
                            <a href="proses_pengguna.php?aksi=hapus&id=<?= $data['id']; ?>" class="btn-aksi" style="color: red;" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </fieldset>
    </div>

    <footer>
        Copyright@febriana_155
    </footer>

</body>
</html>