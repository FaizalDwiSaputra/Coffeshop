<?php
include "../koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($konek, "DELETE FROM produk WHERE id_produk='$id'");
header("Location: index.php?halaman=produk");
?>