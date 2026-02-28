<?php 
// Memanggil header yang sudah berisi koneksi dan CSS
include 'header.php'; 
?>

<div class="container">
    <!-- Form action diarahkan ke proses_simpan.php dengan type karyawan -->
    <form action="proses_simpan.php?type=karyawan" method="POST">
        <fieldset>
            <legend>Tambah Data Karyawan</legend>

            <div class="form-group">
                <label>id_karyawan</label>
                <input type="text" name="id_karyawan" required placeholder="Contoh: KRY-01">
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
                    // Mengambil data jabatan dari database untuk dijadikan pilihan
                    $query_jabatan = mysqli_query($koneksi, "SELECT * FROM tbl_jabatan_febriana ORDER BY nama_jabatan ASC");
                    while($j = mysqli_fetch_array($query_jabatan)){
                        echo "<option value='".$j['id_jabatan']."'>".$j['nama_jabatan']."</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>alamat</label>
                <textarea name="alamat" rows="3"></textarea>
            </div>

            <div class="btn-container">
                <button type="submit" name="simpan" class="btn">Simpan</button>
                <button type="reset" class="btn">Batal</button>
            </div>
        </fieldset>
    </form>
</div>

<footer>
    Copyright@febriana_155
</footer>