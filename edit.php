<?php 
require 'connect.php'; 
    $id = $_GET['prodak'];
    $query = $db->prepare("SELECT * FROM produk WHERE id_produk = ?");
    $query->execute([ $id ]);

    $prodak = $query->fetchObject();
    if (!$prodak) {
        header('location: index.php');
    }

    if (!empty($_POST)) {
        $nama_produk = $_POST['nama_produk'];
        $keterangan = $_POST['keterangan'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];

        $updateQuery = $db->prepare("UPDATE produk SET nama_produk = ?, keterangan = ?, harga = ?, jumlah = ? WHERE id_produk = ?");
        $updateQuery->execute([ $nama_produk, $keterangan, $harga, $jumlah, $id]);

        header('location: index.php');
    }
    
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
                <h4 class="mt-5">Edit Produk : <?= $prodak->nama_produk?></h4>
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="<?= $prodak->nama_produk?>" required>
                    </div>
                    <div class="form-group mb-3"> 
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control" value="<?= $prodak->keterangan?>" required>
                    </div>
                    <div class="form-group mb-3"> 
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control" value="<?= $prodak->harga?>" required>
                    </div>
                    <div class="form-group mb-3"> 
                        <label for="jumlah">Jumlah</label>
                        <input type="text" name="jumlah" id="jumlah" class="form-control" value="<?= $prodak->jumlah?>" required>
                    </div>
                    <button type="submit" class="btn btn-success">Edit</button>
                    <a href="index.php" class="btn btn-primary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>