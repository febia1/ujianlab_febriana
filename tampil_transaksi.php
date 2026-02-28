<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Transaksi - Febriana</title>
    <?php include 'header.php'; ?>
</head>
<body>
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
            <h3>List Data Transaksi</h3>
            <a href="transaksi.php" class="btn">Tambah</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th style="width: 40px;">No</th>
                    <th>id_transaksi</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Jumlah (Rp)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM tbl_transaksi ORDER BY id_transaksi ASC";
                $tampil = mysqli_query($koneksi, $query);
                $no = 1;

                if (mysqli_num_rows($tampil) > 0) {
                    while ($data = mysqli_fetch_array($tampil)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?>.</td>
                    <td><?php echo $data['id_transaksi']; ?></td>
                    <td><?php echo $data['tgl_transaksi']; ?></td>
                    <td><?php echo $data['keterangan']; ?></td>
                    <td><?php echo number_format($data['jumlah'], 0, ',', '.'); ?></td>
                    <td>
                        <a href="edit_transaksi.php?id=<?php echo $data['id_transaksi']; ?>" style="text-decoration:none; color:black;">Edit</a> I 
                        <a href="hapus_transaksi.php?id=<?php echo $data['id_transaksi']; ?>" style="text-decoration:none; color:black;" onclick="return confirm('Hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php 
                    } 
                } else {
                    echo "<tr><td colspan='6' style='text-align:center;'>Data Kosong</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <footer>Copyright@febriana_155</footer>
</body>
</html>