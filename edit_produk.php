<?php
// memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

// mengecek apakah di url ada nilai GET id
if (isset($_GET['id'])) {
  // ambil nilai id dari url dan disimpan dalam variabel $id
  $id = ($_GET["id"]);

  // PERBAIKAN: Nama tabel diubah menjadi tbl_produk
  $query = "SELECT * FROM tbl_produk WHERE id='$id'";
  $result = mysqli_query($koneksi, $query);

  // jika data gagal diambil maka akan tampil error berikut
  if(!$result){ 
    die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
  }

  // mengambil data dari database
  $data = mysqli_fetch_assoc($result);

  // apabila data tidak ditemukan
  if (!$data) {
    echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
  }
} else {
  // apabila tidak ada data GET id
  echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Produk - UKK SMK Maritim Nusantara</title>
  <style type="text/css">
    * { font-family: "Trebuchet MS"; }
    h1 { text-transform: uppercase; color: salmon; }
    button { background-color: salmon; color: #fff; padding: 10px; border: 0px; margin-top: 20px; cursor: pointer; width: 100%; font-weight: bold; }
    label { margin-top: 10px; float: left; text-align: left; width: 100%; }
    input { padding: 8px; width: 100%; box-sizing: border-box; background: #f8f8f8; border: 2px solid #ccc; outline-color: salmon; }
    .base { width: 400px; padding: 20px; margin: auto; background: #ededed; }
  </style>
</head>
<body>
  <center>
    <h1>Edit Produk <?php echo $data['nama_produk']; ?></h1>
    <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
      <section class="base">
        <!-- PENTING: menampung nilai id produk yang akan di edit -->
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
        
        <div>
          <label>Nama Produk</label>
          <input type="text" name="nama_produk" value="<?php echo $data['nama_produk']; ?>" autofocus="" required="" />
        </div>
        
        <div>
          <label>Deskripsi</label>
          <input type="text" name="deskripsi" value="<?php echo $data['deskripsi']; ?>" />
        </div>
        
        <div>
          <label>Harga Beli (Angka saja)</label>
          <input type="number" name="harga_beli" value="<?php echo $data['harga_beli']; ?>" required="" />
        </div>
        
        <div>
          <label>Harga Jual (Angka saja)</label>
          <input type="number" name="harga_jual" value="<?php echo $data['harga_jual']; ?>" required="" />
        </div>
        
        <div>
          <label>Gambar Produk</label>
          <!-- PERBAIKAN: Nama kolom diubah menjadi gambar_produk -->
          <img src="gambar/<?php echo $data['gambar_produk']; ?>" style="width: 120px; float: left; margin-bottom: 5px; border: 1px solid #ccc;">
          <input type="file" name="gambar_produk" style="margin-top: 10px;" />
          <i style="float: left; font-size: 11px; color: red; margin-top: 5px;">*Abaikan jika tidak ingin merubah gambar</i>
        </div>
        
        <div style="clear: both;">
          <button type="submit">Simpan Perubahan</button>
        </div>
      </section>
    </form>
  </center>
</body>
</html>