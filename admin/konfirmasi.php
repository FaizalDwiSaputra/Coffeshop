<?php
session_start();
include "../koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($konek, "UPDATE pembelian SET status_pembelian='pesanan diantar' WHERE id_pembelian='$id'");

echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pembelian'>";
?>