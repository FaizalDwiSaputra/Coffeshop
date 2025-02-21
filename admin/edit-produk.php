<!-- KODE PHP -->
<?php
include "../koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($konek, "SELECT * FROM produk WHERE id_produk = '$id'");

// UPDATE
if(isset($_POST['edit'])){
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $berkas =$_FILES['foto']['name'];
    $berkassementara =$_FILES['foto']['tmp_name'];
    $dirUpload = "../foto_produk/";
    $foto_poduk = move_uploaded_file($berkassementara, $dirUpload.$berkas );

    $query_update = mysqli_query($konek, "UPDATE produk SET nama_produk = '$nama', harga_produk = '$harga',gambar_produk = '$berkas', deskripsi_produk = '$deskripsi' WHERE id_produk = '$id' ");
    echo "<script>alert('Data berhasil diubah')</script>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";

}
?>
<!-- KODE PHP -->
            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT PRODUK</title>
</head>
<body>
<div class="full-kontainer container">
        <h1>Edit Produk</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <?php 
                while ($data = mysqli_fetch_assoc($query)){
            ?>
            <div class="form-group">
                <label for="">Nama Produk</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_produk'];?>">
            </div>

            <div class="form-group">
                <label for="">Harga Produk</label>
                <input type="text" class="form-control" name="harga" value="<?php echo $data['harga_produk'];?>">
            </div>

            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea name="deskripsi" id="" rows="10" class="form-control"><?php echo $data['deskripsi_produk'];?></textarea>
            </div>

            <div class="form-group">
                <img src="../foto_produk/<?php echo $data['gambar_produk'];?>" alt="" width="100">
                
            </div>
            
            <div class="form-group">
                <label for="">Ganti Foto</label>
                <input type="file" class="form-control" name="foto" >
            </div>
            <button class="btn btn-primary my-3" name="edit">Simpan</button>
        </form>
    <?php } ?>
    </div>
</body>
</html>