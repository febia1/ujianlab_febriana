<?php 
// Memanggil header agar menu dan koneksi muncul
include 'header.php'; 
?>

<div class="container">
    <!-- Form diarahkan ke proses_simpan.php dengan parameter type=karyawan -->
    <form action="proses_simpan.php?type=karyawan" method="POST">
        <fieldset>
            <legend>Tambah Data Karyawan</legend>

            <div class="form-group">
                <label>id_karyawan</label>
                <input type="text" name="id_karyawan" required placeholder="Contoh: KRY001">
            </div>

            <div class="form-group">
                <label>nama_karyawan</label>
                <input type="text" name="nama_karyawan" required>
            </div>

            <div class="form-group">
                <label>Jabatan</label>
                <select name="id_jabatan" required>
                    <option value="">-- Pilih Jabatan --</option>
                    <?php
                    // Mengambil data dari tabel jabatan agar bisa dipilih
                    $query_jabatan = mysqli_query($koneksi, "SELECT * FROM tbl_jabatan_febriana");
                    while($j = mysqli_fetch_array($query_jabatan)){
                        echo "<option value='".$j['id_jabatan']."'>".$j['nama_jabatan']."</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>alamat</label>
                <textarea name="alamat" style="width: 350px; height: 80px; border: 2px solid #000;"></textarea>
            </div>

            <div class="btn-container">
                <button type="submit" name="simpan">Simpan</button>
                <button type="reset">Batal</button>
            </div>
        </fieldset>
    </form>
</div>

<footer>
    Copyright@febriana_155
</footer>