<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>
    <div class="full-kontainer container">
        <h1>Tambah Produk</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama Produk</label>
                <input type="text" class="form-control" name="nama">
            </div>

            <div class="form-group">
                <label for="">Harga Produk</label>
                <input type="text" class="form-control" name="harga">
            </div>

            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea name="deskripsi" id="" rows="10" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="">Foto Produk</label>
                <input type="file" class="form-control" name="foto">
            </div>

            <button class="btn btn-primary my-3" name="tambah">Tambah</button>

            <!-- KODE PHP -->
             <?php
            if(isset($_POST['tambah'])){
                $nama = $_POST['nama'];
                $harga = $_POST['harga'];
                $deskripsi = $_POST['deskripsi'];

                $berkas =$_FILES['foto']['name'];
                $berkassementara =$_FILES['foto']['tmp_name'];
                $dirUpload = "../foto_produk/";
                $foto_poduk = move_uploaded_file($berkassementara, $dirUpload.$berkas );
                $query = mysqli_query($konek, "INSERT INTO produk VALUES ('', '$nama', '$harga', '$berkas','$deskripsi')");
                
                echo "<script>alert('Data berhasil di tambahkan');</script>";
                echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
            }
             ?>
            <!-- KODE PHP -->
        </form>
    </div>
</body>
</html>