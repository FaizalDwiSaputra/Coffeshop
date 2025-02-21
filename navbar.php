<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
              <a class="nav-link" href="#kontak">Contact</a>
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
              <a class="nav-link" href="./user/logout.php">Logout</a>
            </li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>