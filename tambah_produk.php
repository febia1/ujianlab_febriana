<?php
  include('koneksi.php'); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Tambah Produk - UKK SMK</title>
  <style type="text/css">
    * { font-family: "Trebuchet MS"; }
    h1 { text-transform: uppercase; color: salmon; }
    .base { width: 400px; padding: 20px; margin: auto; background: #ededed; }
    label { margin-top: 10px; float: left; text-align: left; width: 100%; }
    input { padding: 8px; width: 100%; box-sizing: border-box; background: #f8f8f8; border: 2px solid #ccc; outline-color: salmon; margin-bottom: 10px;}
    button { background-color: salmon; color: #fff; padding: 10px; width: 100%; border: 0; cursor: pointer; font-weight: bold; }
    button:hover { background-color: #ff8c7a; }
  </style>
</head>
<body>
  <center>
    <h1>Tambah Produk</h1>
    <!-- Pastikan action dan enctype sudah benar -->
    <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
      <section class="base">
        <div>
          <label>Nama Produk</label>
          <input type="text" name="nama_produk" autofocus="" required="" />
        </div>
        <div>
          <label>Deskripsi</label>
          <input type="text" name="deskripsi" />
        </div>
        <div>
          <label>Harga Beli (Angka saja, tanpa titik)</label>
          <input type="number" name="harga_beli" required="" placeholder="Contoh: 20000" />
        </div>
        <div>
          <label>Harga Jual (Angka saja, tanpa titik)</label>
          <input type="number" name="harga_jual" required="" placeholder="Contoh: 80000" />
        </div>
        <div>
          <label>Gambar Produk</label>
          <input type="file" name="gambar_produk" required="" />
        </div>
        <div>
          <button type="submit">Simpan Produk</button>
        </div>
      </section>
    </form>
  </center>
</body>
</html>
