<?php 
include 'header.php'; 
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_user_febriana WHERE id='$id'");
$d = mysqli_fetch_array($query);
?>

<div class="container">
    <form action="proses_pengguna.php?aksi=edit" method="POST">
        <fieldset>
            <legend>Edit Data Pengguna</legend>
            <!-- Input ID yang disembunyikan agar tahu data mana yang diupdate -->
            <input type="hidden" name="id" value="<?= $d['id'] ?>">

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?= $d['user_name'] ?>" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" value="<?= $d['password'] ?>" required>
            </div>
            <div class="form-group">
                <label>Level</label>
                <select name="level">
                    <option value="Admin" <?= $d['email'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="Operator" <?= $d['email'] == 'Operator' ? 'selected' : '' ?>>Operator</option>
                </select>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn">Update Data</button>
                <a href="tampil_pengguna.php" class="btn">Batal</a>
            </div>
        </fieldset>
    </form>
</div>
<footer>Copyright@febriana_155</footer>