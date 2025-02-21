<?php
include "../koneksi.php";
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail pembelian</title>
    <style>
        .deskripsi{
            color: #000;
        }
    </style>
</head>
<body>
    <div class="full-kontainer container mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga asli</th>
                    <th>Jumlah</th>
                    <th>Gambar Produk</th>

                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php 
                    $query = mysqli_query($konek, "SELECT * FROM produk JOIN pembelian_produk ON produk.id_produk = pembelian_produk.id_produk WHERE pembelian_produk.id_pembelian = '$id'");
                    
                    while ($data = mysqli_fetch_assoc($query)){
                ?>
                <tr>
                    <td><?php echo $nomor++;?></td>
                    <td><?php echo $data['nama_produk'];?></td>
                    <td><?php echo $data['harga_produk'];?></td>
                    <td><?php echo $data['jumlah'];?></td>
                    <td><img src="../foto_produk/<?php echo $data['gambar_produk'];?>" alt="" class="" width="100"></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>