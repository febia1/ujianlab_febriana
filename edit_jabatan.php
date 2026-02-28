<?php 
include 'header.php'; 
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_jabatan_febriana WHERE id='$id'");
$d = mysqli_fetch_array($query);
?>
<div class="container">
    <form action="proses_edit.php?type=jabatan" method="POST">
        <fieldset>
            <legend>Edit Data Jabatan</legend>
            <!-- Hidden ID agar sistem tahu data mana yang diupdate -->
            <input type="hidden" name="id" value="<?= $d['id'] ?>">

            <div class="form-group">
                <label>Nama Jabatan</label>
                <input type="text" name="nama_jabatan" value="<?= $d['nama_jabatan'] ?>" required>
            </div>
            <div class="form-group">
                <label>Gaji Pokok</label>
                <input type="number" name="gaji" value="<?= $d['gaji_pokok'] ?>" required>
            </div>
            <div class="form-group">
                <label>Tunjangan</label>
                <input type="number" name="tunjangan" value="<?= $d['tunjangan_jabatan'] ?>" required>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn">Update Perubahan</button>
                <a href="tampil_jabatan.php" class="btn">Batal</a>
            </div>
        </fieldset>
    </form>
</div>
<footer>Copyright@febriana_155</footer>