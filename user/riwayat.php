<?php
session_start();
include "../koneksi.php";
if(!isset($_SESSION['pembeli']) OR empty($_SESSION['pembeli'])){
  echo "<script>alert('Silahkan login dahulu');</script>";
  echo "<script>location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>
    <style>
    .boy{
        background: linear-gradient(to right, #7a4b2b, #b67c4f);
      }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
</head>
<body class="boy container">
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
              <a class="nav-link " href="../index.php?$about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index.php?#kopi">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="riwayat.php">Pesanan</a>
            </li>
  
            <!--  -->
            <?php if(isset($_SESSION['pembeli'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
            
            <?php else : ?>
            <div class="login d-flex">
            <li class="nav-item">
              <a class="nav-link log py-1 px-4 mx-2" href="./user/login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link py-1 px-4 daftar" href="#kontak">Daftar</a>
            </li>
            </div>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>
    
    <h1>Riwayat Pembelian <?php echo $_SESSION['pembeli']['nama_pembeli'];?></h1>
    <table class="table table-bordered">
        <thead>
            <th>No</th>
            <th>Nama Pembeli</th>
            <th>Alamat Pembeli</th>
            <th>Tanggal</th>
            <th>Ongkir</th>
            <th>Total</th>
            <th>Status Pembelian</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php $nomor=1; ?>
            <?php $id_pembeli = $_SESSION['pembeli']['id_pembeli'];?>
            <?php
                $query = mysqli_query($konek, "SELECT * FROM pembeli JOIN pembelian ON pembeli.id_pembeli = pembelian.id_pembeli WHERE pembeli.id_pembeli = '$id_pembeli' ");
                while ($data = mysqli_fetch_assoc($query)){
            ?>
            <tr>
                <td><?php echo $nomor++;?></td>
                <td><?php echo $data['nama_pembeli'];?></td>
                <td><?php echo $data['alamat_pembeli'];?></td>
                <td><?php echo $data['tanggal'];?></td>
                <td><?php echo $data['tarif'];?></td>
                <td><?php echo $data['total'];?></td>
                <td>
                <?php if($data['status_pembelian'] =='proses'):?>
                    <p><span class="badge text-bg-warning"><?php echo $data['status_pembelian'];?></span></p>
                <?php else:?>
                    <p><span class="badge text-bg-success"><?php echo $data['status_pembelian'];?></span></p>
                <?php endif?>
                </td>
                <td>
                    <?php if ($data['status_pembelian'] == 'pesanan diantar'):?>
                   <a href="konfirmasi.php?id=<?php echo $data['id_pembelian']; ?>" class="btn btn-primary">Pesanan diterima</a>
                   <?php endif ?>
                   <a href="nota.php?id=<?php echo $data['id_pembelian'];?>">Nota</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        <!-- KODE PHp -->
        
        <!--  -->
    </table>
</body>
</html>