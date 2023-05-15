<link rel="stylesheet" href="style.css">

<?php
    require_once 'dbproduk.php' ;

    $sql = " SELECT * FROM pesanan";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if(isset($_POST['submit'])){

        $tanggal = $_POST['tanggal'];
        $nama_pemesan = $_POST['nama_pemesan'];
        $alamat_pemesan = $_POST['alamat_pemesan'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];
        $deskripsi = $_POST['deskripsi'];
        $jumlah_pesanan = $_POST['jumlah_pesanan'];
        $kategori_produk = $_POST['kategori_produk'];

    $sql = "INSERT INTO pelanggan (tanggal, nama_pemesan, alamat_pemesan, no_hp, email, deskripsi, jumlah_pesanan, kategori_produk) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$tanggal, $nama_pemesan, $alamat_pemesan, $no_hp, $email, $deskripsi, $jumlah_pesanan, $kategori_produk]);

    header("Location: tabel_pesanan.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .link-website {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
    <a class="link-website" href="form_pesanan.php">Tambah Pesanan</a> | <a class="link-website" href="tabel_produk.php">Tabel Produk</a> |  
    <hr>
    <table border="1" cellpadding='7'>
        <thead>
            <tr bgcolor="lightgreen">
                <th>NO</th>
                <th>Nama Pemesan</th>
                <th>Alamat Pemesan</th>
                <th>Nomor Hp</th>
                <th>Email</th>
                <th>Jumlah Pesanan</th>
                <th>Deskripsi</th>
                <th>Produk ID</th>
                <th>Action</th>      
            </tr>
        </thead>
        <tbody>

            <?php
                $number = 1;
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
            ?>

            <tr>
                <td> <?=  $number?></td>
                <td> <?=  $row['nama_pemesan']?></td>
                <td> <?=  $row['alamat_pemesan']?></td>
                <td> <?=  $row['no_hp']?></td>
                <td> <?=  $row['email']?></td>
                <td> <?=  $row['jumlah_pesanan']?></td>
                <td> <?=  $row['deskripsi']?></td>
                <td> <?=  $row['produk_id']?></td>
                <td>
                    <a href="edit_pesanan.php?id=<?= $row['id'] ?>"><input type='button' class='btn-update'></a>
                    <a href="delete.php?id=<?= $row['id'] ?>"  
                    >
                        <input type='button' class='btn-delete'>
                    </a>
                </td>
            </tr>

            <?php   
                $number++;
                endwhile;
            ?>
        </tbody>
    </table>
</body>
</html>