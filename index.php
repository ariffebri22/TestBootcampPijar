<?php 
require 'connect.php'; 
   $produk = $db->query("SELECT * FROM produk")->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4 class="mt-5">Daftar Produk</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Keterangan</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($produk as $prodak): ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $prodak->nama_produk ?></td>
                                <td><?= $prodak->keterangan ?></td>
                                <td><?= $prodak->harga ?></td>
                                <td><?= $prodak->jumlah ?></td>
                                <td>
                                <a href="edit.php?prodak=<?= $prodak->id_produk ?>" style="text-decoration: none;">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="prodak-<?= $prodak->id_produk ?>">
                                    Edit
                                </button>
                                </a> |
                                <a href="delete.php?prodak=<?= $prodak->id_produk ?>">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="prodak-<?= $prodak->id_produk ?>" onclick="return confirm('Anda yakin ingin menghapus <?= $prodak->nama_produk?>?')">
                                    Delete
                                </button>
                                </a>
                                </td>
                            </tr>
                            <?php $no++ ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <a href="input.php" class="btn btn-primary">
                    <button type="submit" class="btn btn-primary">Add Produk</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>