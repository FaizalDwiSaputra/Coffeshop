<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian</title>
</head>
<body>
    <div class="full-kontainer container">
    <table class="table table-bordered">
        <thead>
            <th>No</th>
            <th>Nama Pembeli</th>
            <th>Alamat Pembeli</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Status Pembelian</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php $nomor=1; ?>
            <?php
                $query = mysqli_query($konek, "SELECT * FROM pembeli JOIN pembelian ON pembeli.id_pembeli = pembelian.id_pembeli ");
                while ($data = mysqli_fetch_assoc($query)){
            ?>
            <tr>
                <td><?php echo $nomor++;?></td>
                <td><?php echo $data['nama_pembeli'];?></td>
                <td><?php echo $data['alamat_pembeli'];?></td>
                <td><?php echo $data['tanggal'];?></td>
                <td><?php echo $data['total'];?></td>
                <td>
                <?php if($data['status_pembelian'] =='proses'):?>
                    <p><span class="badge text-bg-warning"><?php echo $data['status_pembelian'];?></span></p>
                <?php else:?>
                    <p><span class="badge text-bg-success"><?php echo $data['status_pembelian'];?></span></p>
                <?php endif?>
                </td>
                <td>
                    <?php if($data['status_pembelian'] == 'proses'):?>
                        <a href="konfirmasi.php?id=<?php echo $data['id_pembelian']; ?>" class="btn btn-primary">Konfirmasi</a>     
                    <?php elseif ($data['status_pembelian']== 'pesanan diterima'):?>
                        <p><span class="badge text-bg-success">sukses</span></p>
                    <?php endif ?>
                    <a href="index.php?halaman=detail&id=<?php echo $data['id_pembelian'];?>" class="btn btn-dark">detail</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        <!-- KODE PHp -->
        
        <!--  -->
    </table>
    </div>
</body>
</html>