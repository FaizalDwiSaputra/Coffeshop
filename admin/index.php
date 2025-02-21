<?php
session_start();
if(!isset($_SESSION['admin'])){
    echo "<script>location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard admin</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <!-- KONTAINER -->
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">Fadisa<span>Coffee</span></a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="index.php" class="sidebar-link">
                        <i class="lni lni-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="index.php?halaman=produk" class="sidebar-link">
                        <i class="lni lni-cart"></i>
                        <span>Produk</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="index.php?halaman=pembelian" class="sidebar-link">
                        <i class="lni lni-wallet"></i>
                        <span>Pembelian</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="index.php?halaman=pembeli" class="sidebar-link">
                        <i class="lni lni-customer"></i>
                        <span>Pembeli</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="logout.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main">
        <!-- KODE PHP -->
        <?php
        if(isset($_GET['halaman']))
        {
            if($_GET['halaman']=='produk')
            {
                include "produk.php";

            }else if($_GET['halaman']=='tambahproduk')
            {
                include "tambah_produk.php";    
            }else if($_GET['halaman']=='pembeli')
            {
                include "pembeli.php";
            }else if($_GET['halaman']=='editproduk')
            {
                include "edit-produk.php";
            }else if($_GET['halaman']=='pembelian')
            {
                include "pembelian.php";
            }
            else if($_GET['halaman']=='detail')
                include "detail.php";
        }else{
            include "home.php";
        }
       ?>
       <!-- KODE PHP -->






        </div>
    </div>
    <!-- KONTAINER -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script>
        const hamBurger = document.querySelector(".toggle-btn");
        hamBurger.addEventListener("click", function () {
        document.querySelector("#sidebar").classList.toggle("expand");
});
    </script>
</body>
</html>