<?php include 'header.php'; ?>

<div class="container">
    <!-- Form diarahkan ke proses_simpan.php dengan parameter type=jabatan -->
    <form action="proses_simpan.php?type=jabatan" method="POST">
        <fieldset>
            <legend>Tambah Data Jabatan</legend>

            <div class="form-group">
                <label>id_jabatan (Gunakan Angka)</label>
                <!-- Kita beri name="id" karena di DB kamu kolomnya bernama "id" -->
                <input type="number" name="id" required placeholder="Contoh: 8">
            </div>

            <div class="form-group">
                <label>Nama Jabatan</label>
                <input type="text" name="nama_jabatan" required>
            </div>

            <div class="form-group">
                <label>Gaji Pokok</label>
                <input type="number" name="gaji_pokok" required>
            </div>

            <div class="form-group">
                <label>Tunjangan Jabatan</label>
                <input type="number" name="tunjangan_jabatan" required>
            </div>

            <div class="btn-container">
                <!-- Tombol Lonjong sesuai mockup -->
                <button type="submit" name="simpan" class="btn">Simpan</button>
                <button type="reset" class="btn">Batal</button>
            </div>
        </fieldset>
    </form>
</div>

<footer>
    Copyright@febriana_155
</footer>