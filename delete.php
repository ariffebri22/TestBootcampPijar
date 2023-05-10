<?php 
require 'connect.php'; 

if (isset($_GET['prodak'])) {
    $id = $_GET['prodak'];
    $query = $db->prepare("DELETE FROM produk WHERE id_produk = ?");
    if ($query->execute([ $id ])) {
        $reset_sql = "ALTER TABLE produk MODIFY id_produk INT AUTO_INCREMENT;
                      ALTER TABLE produk AUTO_INCREMENT = 1;";
        $db->exec($reset_sql);
        
        echo "Data berhasil dihapus dan nilai id berhasil di-reset";
    } else {
        echo "Error: Gagal menghapus data produk";
    }
}

header("Location: index.php");
?>
