<?php
include "../koneksi.php";
$query = mysqli_query($konek, "SELECT * FROM produk");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link rel="stylesheet" href="../css/">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="full-kontainer container">
    <h1>Detail <span>Produk</span></h1>
    <a href="index.php?halaman=tambahproduk" class="btn btn-primary my-3"><i class="bi-plus"></i></a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga Produk</th>
                <th>Deskripsi Produk</th>
                <th>Foto Produk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor=1; ?>
            <?php
                while ($data = mysqli_fetch_assoc($query)){
            ?>
            <tr>
                <td><?php echo $nomor++;?></td>
                <td><?php echo $data['nama_produk'];?></td>
                <td><?php echo $data['harga_produk'];?></td>
                <td><?php echo $data['deskripsi_produk'];?></td>
                <td><img src="../foto_produk/<?php echo $data['gambar_produk'];?>" alt="" width="100"></td>
                <td><a href="index.php?halaman=editproduk&id=<?php echo $data['id_produk'];?>" class="btn btn-warning"><i class="bi-pencil-square"></i></a>
                <a href="hapus-produk.php?id=<?php echo $data['id_produk'];?>" class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus ?');"><i class="bi-trash"></i></a>
                </td>    
            </tr>
        </tbody>
        <?php } ?>
    </table>
    </div>
</body>
</html>