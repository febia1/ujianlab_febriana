<?php include 'header.php'; ?>
<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; margin-bottom: 10px;">
        <h3>List Data Jabatan</h3>
        <!-- Pastikan class 'btn' ada di CSS header.php agar tombol ini lonjong -->
        <a href="form_jabatan.php" class="btn">Tambah</a>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 50px; text-align: center;">No</th>
                <th style="width: 100px; text-align: center;">id_jabatan</th>
                <th>Nama Jabatan</th>
                <th style="width: 150px;">Gaji Pokok</th>
                <th style="width: 150px;">Tunjangan</th>
                <th style="width: 120px; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Mengambil data dari tabel tbl_jabatan_febriana
            // Pastikan koneksi ($koneksi) sudah ada di header.php
            $query = "SELECT * FROM tbl_jabatan_febriana ORDER BY id ASC";
            $tampil = mysqli_query($koneksi, $query);
            $no = 1;

            if (mysqli_num_rows($tampil) > 0) {
                while ($data = mysqli_fetch_array($tampil)) {
            ?>
            <tr>
                <td style="text-align: center;"><?php echo $no++; ?>.</td>
                <td style="text-align: center;"><?php echo $data['id']; ?></td>
                <td><?php echo $data['nama_jabatan']; ?></td>
                
                <!-- Menggunakan kolom 'gaji_pokok' sesuai database -->
                <td>Rp <?php echo number_format($data['gaji_pokok'], 0, ',', '.'); ?></td>
                
                <!-- Menggunakan kolom 'tunjangan_jabatan' sesuai database -->
                <td>Rp <?php echo number_format($data['tunjangan_jabatan'], 0, ',', '.'); ?></td>
                
                <td style="text-align: center;">
                    <!-- Tombol Edit mengarah ke file edit_jabatan.php -->
                    <a href="edit_jabatan.php?id=<?php echo $data['id']; ?>" style="text-decoration:none; color:blue; font-weight:bold;">Edit</a> | 
                    <!-- Tombol Hapus mengarah ke file proses_hapus.php -->
                    <a href="proses_hapus.php?type=jabatan&id=<?php echo $data['id']; ?>" style="text-decoration:none; color:red; font-weight:bold;" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php 
                } 
            } else {
                echo "<tr><td colspan='6' style='text-align:center;'>Data masih kosong. Silakan tambah data baru.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Tambahkan sedikit jarak bawah agar footer tidak menutupi tabel -->
<div style="height: 100px;"></div>

<footer>Copyright@febriana_155</footer>