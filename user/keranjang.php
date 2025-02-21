<?php
session_start();
include "../koneksi.php";
if(empty($_SESSION['keranjang'])){
  echo "<script>alert('Keranjang Kosong')</script>";
}
if(!isset($_SESSION['pembeli'])){
  echo "<script>alert('Silahkan login dahulu')</script>";
  echo "<script>location='login.php';</script>";
}
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
      table{
        background: linear-gradient(to right, #7a4b2b, #b67c4f);
      }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="boy container">
    <!-- KONTAINER -->
    <nav class="navbar navbar-expand-lg" >
      <div class="container-fluid">
        <a class="navbar-brand text-" href="#">Fadisa</a>
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
    <!-- KODE PHP -->

    <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Total Pesanan</th>
            <th>Subtotal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php $totalbelanja = 0;?>
        <?php 
           if (!isset($_SESSION['keranjang'])) {
            $_SESSION['keranjang'] = array();
          }
          $nomor=1;
          ?>
          <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah):?>
            <?php
              $query = mysqli_query($konek, "SELECT * FROM produk WHERE id_produk= '$id_produk'");
              $tampilkan = mysqli_fetch_assoc($query);
              $subtotal = $tampilkan['harga_produk']*$jumlah;
            ?>
          <tr>
            <td><?php echo $nomor++;?></td>
            <td><?php echo $tampilkan['nama_produk'];?></td>
            <td><?php echo $tampilkan['harga_produk'];?></td>
            <td><?php echo $jumlah;?></td>
            <td><?php echo $subtotal;?></td>
            <td><a href="hapus_produk.php?id=<?php echo $id_produk;?>" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
          </tr>
          <?php $totalbelanja+=$subtotal;?>
          <?php endforeach ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="5">Total Belanja</th>
            <th class="col span-5">Rp. <?php echo number_format($totalbelanja);?></td>
          </tr>
        </tfoot>
    </table>
    <!--  -->
    <form action="" method="post" enctype="multipart/form-data">
      <h3>Infomrasi Pembeli</h3>
      <div class="row">
          <div class="col-md-3">
            <div class="form-group">
                <input type="text" readonly value="<?php echo $_SESSION['pembeli']['nama_pembeli'];?>" class="form-control">
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
                <input type="text" readonly value="<?php echo $_SESSION['pembeli']['telepon_pembeli'];?>" class="form-control">
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
                <input type="text" readonly value="<?php echo $_SESSION['pembeli']['alamat_pembeli'];?>" class="form-control">
            </div>
          </div>

          <div class="col-md-3">
           <select name="id_ongkir" id="" class="form-control">
            <option value="" >Pilih pembayaran</option>
            <?php
              $ongkir = mysqli_query($konek, "SELECT * FROM ongkir");
              while ($data = mysqli_fetch_assoc($ongkir)){
            ?>
            <option value="<?php echo $data['id_ongkir'];?>">
                <?php echo $data['diantar'];?> - 
                <?php echo $data['tarif']; ?>
            </option>
            <?php }?>
           </select>
          </div>
          <button class="btn btn-primary my-3" name="beli">Beli</button>
        </div>
      
    </form>

    <!-- KODE PHP -->
      <?php
      if(isset($_POST['beli'])){
        $id_pembeli = $_SESSION['pembeli']['id_pembeli'];
        $tanggal = date("Y-m-d");
        $alamat = $_SESSION['pembeli']['alamat_pembeli'];
        $id_ongkir = $_POST['id_ongkir'];

        // ONGKIR
        $ongkir = mysqli_query($konek, "SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
        $pecah = mysqli_fetch_assoc($ongkir);

        $ambilongkircod = $pecah['diantar'];
        $ambilongkirtarif = $pecah['tarif'];

        $total = $totalbelanja + $ambilongkirtarif;

        $status = "proses";

        $query = mysqli_query($konek, "INSERT INTO pembelian VALUES ('','$id_pembeli', '$id_ongkir', '$tanggal', '$alamat', '$ambilongkircod', '$ambilongkirtarif','$total', '$status' )");
        // ID PEMBELIAN BARUSAN
        $id_pembelian_barusan = $konek-> insert_id;

          foreach($_SESSION['keranjang'] as $id_produk => $jumlah){
            $konek->query("INSERT INTO pembelian_produk VALUES ('','$id_pembelian_barusan','$id_produk','$jumlah')");
          }

        // Mengkosongkan keranjang
        unset($_SESSION['keranjang']);
        echo "<script>alert('Pembelian Sukses')</script>";
        echo "<script>location='riwayat.php';</script>";
         
      }

     
      ?>
    <!--  -->
    





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
