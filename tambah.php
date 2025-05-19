<?php include 'config/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Tambah Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container">
    <h2>Tambah Data Barang</h2>
    <form method="POST" enctype="multipart/form-data">
      <div class="mb-2">
        <label>Kode</label>
        <input type="text" name="kode" class="form-control" required>
      </div>
      <div class="mb-2">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control" required>
      </div>
      <div class="mb-2">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" required></textarea>
      </div>
      <div class="mb-2">
        <label>Harga Satuan</label>
        <input type="number" name="harga_satuan" class="form-control" required>
      </div>
      <div class="mb-2">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control" required>
      </div>
      <div class="mb-2">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $kode = $_POST['kode'];
      $nama = $_POST['nama_barang'];
      $deskripsi = $_POST['deskripsi'];
      $harga = $_POST['harga_satuan'];
      $jumlah = $_POST['jumlah'];

      $foto_name = $_FILES['foto']['name'];
      $tmp = $_FILES['foto']['tmp_name'];
      move_uploaded_file($tmp, "assets/img/" . $foto_name);

      $query = "INSERT INTO barang VALUES ('$kode', '$nama', '$deskripsi', '$harga', '$jumlah', '$foto_name')";
      mysqli_query($koneksi, $query);
      echo "<div class='alert alert-success mt-3'>Data berhasil disimpan!</div>";
    }
    ?>
  </div>
</body>
</html>