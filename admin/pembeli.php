<?php
include "../koneksi.php";
$query = mysqli_query($konek, "SELECT * FROM pembeli");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA PEMBELI</title>
</head>
<body>
    <div class="full-kontainer container">
        <h1>DATA PEMBELI</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Nama</th>
                    <th>No Telepon</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php $nomor=1; ?>
                    <?php
                        while ($data = mysqli_fetch_assoc($query)){
                    ?>
                    <td><?php echo $nomor++;?></td>
                    <td><?php echo $data['email_pembeli'];?></td>
                    <td><?php echo $data['pass_pembeli'];?></td>
                    <td><?php echo $data['nama_pembeli'];?></td>
                    <td><?php echo $data['telepon_pembeli'];?></td>
                    <td><?php echo $data['alamat_pembeli'];?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>