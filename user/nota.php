<?php
session_start();
include "../koneksi.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <style>
        .boy{
            background: linear-gradient(to right, #7a4b2b, #b67c4f);
        }
        .kontainer-nota{
            width: 30%;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="boy container">
    <!-- KONTAINER -->
    <nav class="navbar navbar-expand-lg" >
      <div class="container-fluid">
        <a class="navbar-brand text-" href="#"><img src="./img/lg1.png" alt="" style="width: 30px;">Fadisa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation ">
          <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end " id="navbarNav" >
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="keranjang.php"><i class="bi bi-cart3"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php?#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="../index.php?#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index.php?#kopi">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="riwayat.php">Pesanan</a>
            </li>
            <div class="login d-flex">
            <!--  -->
            <?php if(!isset($_SESSION['pembeli'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="./user/login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#kontak">Daftar</a>
            </li>
            </div>
            <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>
    <table class="table table-bordered">
        <thead>
          <?php $totalbelanja = 0;?>
          <?php $nomor=1;?>
          <?php $id_pembeli = $_SESSION['pembeli']['nama_pembeli'];?>
          <?php $alamat_pembeli = $_SESSION['pembeli']['alamat_pembeli'];?>
          <tr>
            <th>No</th>
            <th>Nama Pembeli</th>
            <th>Nama Produk</th>
            <th>Alamat Pembeli</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $id_pembelian_barusan = $_GET['id'];
            // AMBIL ONGKIR

            // 
            $query = mysqli_query($konek, "SELECT *  FROM  pembelian_produk JOIN produk ON pembelian_produk.id_produk = produk.id_produk WHERE pembelian_produk.id_pembelian = '$id_pembelian_barusan'");
            while ($data = mysqli_fetch_assoc($query)){
            $subtotal = $data['harga_produk'] * $data['jumlah']; 
            $totalbelanja += $subtotal
          ?>
          <tr>
            <td><?php echo $nomor++; ?></td>
            <td><?php echo $id_pembeli;?></td>
            <td><?php echo $data['nama_produk'];?></td>
            <td><?php echo $alamat_pembeli;?></td>
            <td><?php echo $subtotal;?></td>
          </tr>
          <?php } ?>
        </tbody>
        <tfoot>
         <tr>
            <th colspan="4">Total Belanja</th>
            <th class="col span-4">Rp. <?php echo number_format($totalbelanja);?></td>
          </tr>
        </tfoot>
    </table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>