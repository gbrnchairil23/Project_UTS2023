<link rel="stylesheet" href="style.css">

<?php
    require_once 'dbproduk.php' ;

    $sql = " SELECT * FROM produk";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if(isset($_POST['submit'])){

        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $harga_jual = $_POST['harga_jual'];
        $harga_beli = $_POST['harga_beli'];
        $stok = $_POST['stok'];
        $min_stok = $_POST['min_stok'];
        $deskripsi = $_POST['deskripsi'];
        $kategori_produk = $_POST['kategori_produk'];

    $sql = "INSERT INTO pelanggan (kode, nama, harga_jual, harga_beli, stok, min_stok, deskripsi, kategori_produk) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$kode, $nama, $harga_jual, $harga_beli, $stok, $min_stok, $deskripsi, $kategori_produk]);

    header("Location: tabel_produk.php");
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
    <a class="link-website" href="form_produk.php">Tambah Produk</a> | <a class="link-website" href="tabel_pesanan.php">Tabel Pesanan</a> |
    <hr>
    <table border="1" cellpadding='7'>
        <thead>
            <tr bgcolor="lightgreen">
                <th>NO</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok</th>
                <th>Minimum Stok</th>
                <th>Deskripsi</th>
                <th>Kategori Produk</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>

            <?php
                $number = 1;
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
            ?>

            <tr>
                <td> <?=  $number           ?>                            </td>
                <td> <?=  $row['kode']      ?>                            </td>
                <td> <?=  $row['nama']      ?>                            </td>
                <td> <?=  $row['harga_jual']?>                            </td>
                <td> <?=  $row['harga_beli']?>                            </td>
                <td> <?=  $row['stok']      ?>                            </td>
                <td> <?=  $row['min_stok']  ?>                            </td>
                <td> <?=  $row['deskripsi']  ?>                            </td>
                <td> <?=  $row['kategori_produk_id']  ?>                            </td>
                <td>
                    <a href="edit_produk.php?id=<?= $row['id'] ?>"><input type='button' class='btn-update'></a>
                    <a href="delete.php?id=<?= $row['id'] ?>"  
                        onclick="if(!confirm('Anda Yakin Hapus Data <?=$row['nama']?>?')) {return false}"
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

