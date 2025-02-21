<?php
session_start();
include "./koneksi.php";
$query = mysqli_query($konek, "SELECT * FROM produk");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="boy container">
    <!-- navbar -->
  <nav class="navbar navbar-expand-lg"data-aos="fade-down" data-aos-duration="1000">
      <div class="container-fluid">
        <a class="navbar-brand text-" href="#"><img src="./img/lg1.png" alt="" style="width: 30px;">Fadisa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation ">
          <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end " id="navbarNav" >
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="./user/keranjang.php"><i class="bi bi-cart3"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#kopi">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./user/riwayat.php">Pesanan</a>
            </li>
  
            <!--  -->
            <?php if(isset($_SESSION['pembeli'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="./user/logout.php">Logout</a>
            </li>
            
            <?php else : ?>
            <div class="login d-flex">
            <li class="nav-item">
              <a class="nav-link log py-1 px-4 mx-2" href="./user/login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link py-1 px-4 daftar" href="./user/daftar.php">Daftar</a>
            </li>
            </div>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- KONTAINER 1 -->
    <div class="kontainer1 position-relative d-lg-flex d-md-flex pt-5 d-sm-block d-block" id="home">
      <div class="deskripsi-kont1" data-aos="fade-right" data-aos-duration="1000">
        <h3>Welcome!</h3>
        <h1>We Serve the <br> richest coffee in the city!</h1>
        <p>High quality in every cup of coffee we serve</p>
      </div>
      <div class="text-center" data-aos="fade-left" data-aos-duration="1000">
        <img src="./images/bg.png" alt="" >
      </div>
    </div>
    <!-- KONTAINER 1 -->

    <!-- KONTAINER 2 -->
    <div class="deskripsi-kont2 text-center pt-5" data-aos="fade-in" data-aos-duration="2000">
      <h1>DRINKS</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum quasi et asperiores 
         atque amet eaque, quam corporis eveniet ipsam autem.</p>
         <a href="">All Drinks</a>
    </div>
    <div class="minuman pt-5" id="kopi"  data-aos="fade-in" data-aos-duration="2000">
    <div class="row justify-content-center justify-content-lg-start">
          <?php 
            while ($data = mysqli_fetch_assoc($query)){
          ?>
      <div class="bungkus col-lg-3 col-md-5 col-sm-6 col-6">
          <div class="kartu text-center" style=" background:linear-gradient(to bottom, #AF8260, #E4C59E);">
            <div class="gambar-produk">
              <img src="./foto_produk/<?php echo $data['gambar_produk'];?>">
            </div>
          <div class="judul-kartu">
            <h3><?php echo $data['nama_produk'];?></h3>
            <p>Rp. <?php echo number_format($data['harga_produk']);?></p>
            <a href="./user/beli.php?id=<?php echo $data['id_produk'];?>">Get delievery</a>
          </div>
          </div>
      </div>
      <?php } ?>
    </div>
    </div>
    <!-- KONTAINER 2 -->

    <!-- KONTAINER 3 -->
    <div class="kontainer3 d-lg-flex align-items-lg-center d-block d-md-flex align-items-md-center" >
      <div class="deskripsi-3" data-aos="fade-right" data-aos-duration="1000">
        <p>From Rp.8.000</p>
        <h1>Croissants</h1>
        <h3>Duis ante irure quasi</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem voluptates accusamus beatae et eum perspiciatis.</p>
       
      </div>
        <div class="gambar-3" >
          <img src="./images/croi.png" alt="" data-aos="fade-left" data-aos-duration="2000">
      </div>
    </div>
    <h3 style="color: #eee;">All Bread</h3>
    <div class="row justify-content-center justify-content-lg-start" data-aos="fade-in" data-aos-duration="2000">
      <div class="bungkus col-lg-3 col-md-5 col-sm-6 col-6 ">
          <div class="kartu text-center" style=" background:linear-gradient(to bottom, #AF8260, #E4C59E);">
            <div class="gambar-produk">
              <img src="./images/gelato.png">
            </div>
          <div class="judul-kartu">
            <h3>Gelato</h3>
            <p>Rp.15.000</p>
            <a href="">Get delievery</a>
          </div>
          </div>
      </div>

      <div class="bungkus col-lg-3 col-md-5 col-sm-6 col-6 ">
        <div class="kartu text-center" style=" background:linear-gradient(to bottom, #AF8260, #E4C59E);">
          <div class="gambar-produk">
            <img src="./images/gelato_dessert.png">
          </div>
        <div class="judul-kartu">
          <h3>Gelato Dessert</h3>
          <p>Rp.15.000</p>
          <a href="">Get delievery</a>
        </div>
        </div>
      </div>

    
    </div>
    <!-- KONTAINER 3 -->

    <!-- KONTAINER 4 -->
    <div class="kontainer4 d-lg-flex d-sm-block d-md-flex align-items-md-center">
      <div class="gambar-4" data-aos="fade-right" data-aos-duration="2000">
        <img src="./images/str.png" alt="">
      </div>
      <div class="deskripsi-4" data-aos="fade-left" data-aos-duration="1000">
        <p>From Rp.55.000</p>
        <h1>Buy For Home</h1>
        <h3>Totam rem aperiam</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi cum id nihil optio molestiae vel commodi eum sed doloribus. Expedita!</p>
        <a href="#kopi">All Coffee</a>
      </div>
    </div>

    <!-- KONTAINER 4 -->

    <!-- KONTAINER 5 -->
    <div class="kontainer5 " id="about" data-aos="fade-in" data-aos-duration="2000">
      <h1>About</h1>
      <p class="mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam, facilis.</p>
      <div class="kontainer5-desk d-lg-flex d-flex d-sm-flex d-md-flex justify-content-lg-center ">
        <div class="desk5-kiri text-start">
          <h3>We offer a unique coffee house enciroment unlike any other in Indonesia</h3>
        </div>
        <div class="desk5-kanan text-start">
          <h3>The perfect place to enjoy your coffee</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci est nulla sapiente quasi, cupiditate doloremque eaque dolor minus error. Corporis ipsa, eius corrupti earum deserunt ipsum placeat a neque optio.</p>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore consequatur nostrum esse placeat voluptatem magnam aperiam enim. Perferendis, sed totam?</p>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolor, accusamus?</p>
          <a href="">Read More</a>
        </div>
      </div>
    </div>
    <!-- KONTAINER 5 -->

    <!-- KONTAINER 6 -->
    <div class="kontainer6 d-lg-flex d-md-flex">
      <div class="desk6-kiri d-lg-flex align-items-center d-flex">
        <div class="deskripsi6" data-aos="fade-right" data-aos-duration="2000">
        <h1>Barista Party</h1>
        <h3>Every Friday & Saturday</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere, ea?</p>
      </div>
      <div class="gambar-6">
        <img src="./images/kopitumpah.png" alt="" data-aos="fade-in" data-aos-duration="1000">
      </div>
      </div>
      
      <div class="desk6-kanan" data-aos="fade-left" data-aos-duration="2000">
        <h3>Location</h3>
        <p>You can find us Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, nisi.</p>
        <p>Address</p>
        <p>Maospati, Magetan, Jawa Timur 1987</p>
      </div>
    </div>
    <!-- KONTAINER 6 -->

    <!-- KONTAINER 7 -->
    <div class="kontainer7 text-center d-lg-flex d-md-flex d-sm-flex d-flex justify-content-lg-between" id="kontak">
    <div class="about text-start">
      <h3>About us</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, vero.</p>
      <div class="icon">
        <img src="./icon'/next.png" alt="">
        <img src="./icon'/next.png" alt="">
        <img src="./icon'/next.png" alt="">
      </div>
    </div>
    <div class="kontak">
      <h3>Contact</h3>
      <p>@faizalds25@gmail.com</p>
    </div>
    <div class="opening text-end">
      <h3>Opening Hours</h3>
      <p>Mon-Fry-8AM-8PM</p>
      <p>Saturday-8AM-4PM</p>
      <p>Sunday-8AM-2PM</p>
    </div>
    </div>
    <!-- KONTAINER 7 -->






    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>