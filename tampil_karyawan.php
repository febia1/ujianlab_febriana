<?php
include 'koneksi.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Karyawan - Febriana</title>
    <?php include 'header.php'; ?>
</head>
<body>

<div class="container">

<div style="display:flex;justify-content:space-between;align-items:center;margin-top:20px;">
    <h3>List Data Karyawan</h3>
    <a href="form_karyawan.php" class="btn">Tambah</a>
</div>

<table border="1" cellpadding="8" cellspacing="0">
<thead>
<tr>
    <th>No</th>
    <th>ID</th>
    <th>Nama Karyawan</th>
    <th>Jabatan</th>
    <th>Alamat</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>

<?php
$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM karyawan ORDER BY id_karyawan ASC");

if(mysqli_num_rows($query) > 0){
    while($data = mysqli_fetch_assoc($query)){
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $data['id_karyawan']; ?></td>
    <td><?= $data['nama_karyawan']; ?></td>
    <td><?= $data['id_jabatan']; ?></td>
    <td><?= $data['alamat']; ?></td>
    <td>
        <a href="edit_karyawan.php?id=<?= $data['id_karyawan']; ?>">Edit</a> |
        <a href="hapus_karyawan.php?id=<?= $data['id_karyawan']; ?>"
           onclick="return confirm('Yakin mau hapus data ini?')"
           style="color:red;">Hapus</a>
    </td>
</tr>
<?php
    }
} else {
    echo "<tr><td colspan='6' align='center'>Data kosong</td></tr>";
}
?>

</tbody>
</table>

</div>

<footer>Copyright@febriana_155</footer>
</body>
</html>