<!DOCTYPE html>
<html>
<head><title>Form Jabatan - Febriana</title></head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <!-- Form mengirim data ke proses_simpan.php -->
        <form action="proses_simpan.php?type=jabatan" method="POST">
            <fieldset>
                <legend>Tambah Data Jabatan</legend>
                
                <div class="form-group">
                    <label>id_jabatan (Gunakan untuk kolom 'id')</label>
                    <!-- Kita beri name='id' agar sinkron dengan kolom di database kamu -->
                    <input type="text" name="id" required placeholder="Contoh: JBT-01">
                </div>

                <div class="form-group">
                    <label>nama_jabatan</label>
                    <input type="text" name="nama_jabatan" required>
                </div>

                <div class="form-group">
                    <label>Gaji</label>
                    <input type="number" name="gaji" required>
                </div>

                <div class="form-group">
                    <label>Tunjangan</label>
                    <input type="number" name="tunjangan" required>
                </div>

                <div class="btn-container">
                    <button type="submit" name="simpan">Simpan</button>
                    <button type="reset">Batal</button>
                </div>
            </fieldset>
        </form>
    </div>
    <footer>Copyright@febriana_155</footer>
</body>
</html>