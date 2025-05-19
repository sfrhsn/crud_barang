<?php include "config/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="p-4">
  <div class="container">
    <div class="card shadow rounded-4">
        <div class="card-body">
    <h2>Daftar Barang</h2>
    <a href="tambah.php" class="btn btn-primary mb-2">Tambah Barang</a>
    <table class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>Kode</th><th>Nama</th><th>Harga</th><th>Jumlah</th><th>Foto</th><th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = mysqli_query($koneksi, "SELECT * FROM barang");
        while ($data = mysqli_fetch_assoc($result)) {
          echo "<tr>
                  <td>{$data['kode']}</td>
                  <td>{$data['nama_barang']}</td>
                  <td>Rp " . number_format($data['harga_satuan'], 0, ',', '.') . "</td>
                  <td>{$data['jumlah']}</td>
                  <td><img src='assets/img/{$data['foto']}' width='60'></td>
                  <td>
                    <a href='edit.php?kode={$data['kode']}' class='btn btn-warning btn-sm me-1'>
    <i class='bi bi-pencil-square'></i> Edit
                    </a>
                    <a href='hapus.php?kode={$data['kode']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus?\")'>
    <i class='bi bi-trash'></i> Hapus
                    </a>
                  </td>
                </tr>";
        }
        ?>
        </div>
    </div>
  </div>

      </tbody>
    </table>
  </div>
  <footer class="text-center mt-4 text-muted small">
  &copy; <?= date('Y') ?> Aplikasi Data Barang
  </footer>
</body>
</html>
