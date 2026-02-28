<!DOCTYPE html>
<html>
<head><title>Form Transaksi</title></head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <form action="proses_simpan.php?type=transaksi" method="POST">
            <fieldset>
                <legend>Tambah Data Transaksi</legend>
                <div class="form-group"><label>id_transaksi</label><input type="text" name="id_transaksi" required></div>
                <div class="form-group"><label>tanggal</label><input type="date" name="tgl_transaksi" required></div>
                <div class="form-group"><label>keterangan</label><input type="text" name="keterangan"></div>
                <div class="form-group"><label>jumlah</label><input type="number" name="jumlah"></div>
                <div class="btn-container">
                    <button type="submit">Simpan</button>
                    <button type="reset">Batal</button>
                </div>
            </fieldset>
        </form>
    </div>
    <footer>Copyright@febriana_155</footer>
</body>
</html>