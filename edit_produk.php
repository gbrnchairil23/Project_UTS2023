<link rel="stylesheet" href="style.css">

<?php
    require_once 'dbproduk.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM produk WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $harga_jual = $_POST['harga_jual'];
        $harga_beli = $_POST['harga_beli'];
        $stok = $_POST['stok']; 
        $minimum_stok = $_POST['minimum_stok'];
        $deskripsi = $_POST['deskripsi'];
        $kategori_produk = $_POST['kategori_produk'];

        $sql = "UPDATE pelanggan SET kode = :kode, nama = :nama, harga_jual = :harga_jual, harga_beli = :harga_beli,
                        stok = :stok, minimum_stok = :minimum_stok, deskripsi = :deskripsi, kategori_produk = :kategori_produk WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':kode', $kode);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':harga_jual', $harga_jual);
        $stmt->bindParam(':harga_beli', $harga_beli);
        $stmt->bindParam(':stok', $stok);
        $stmt->bindParam(':minimum_stok', $minimum_stok);
        $stmt->bindParam(':deskripsi', $deskripsi);
        $stmt->bindParam(':kategori_produk', $kategori_produk);

        $stmt->execute();

        header('Location: index.php');


    }



    $sqljenis = "SELECT * FROM produk";
    $rowjenis = $conn->prepare($sqljenis);
    $rowjenis->execute();

  
?>


    <form method="post">
    <table border="0" align="center" cellpadding="10" width="40%">
        <thead>
            <tr bgcolor="lightgreen">
                <th colspan="2">Edit</th>
            </tr>
        </thead>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <tr>
            <td><label>Kode</label></td>
            <td>
                <input type="text" name="kode" value="<?php echo $row['kode']; ?>">
            <br>
            </td>
        </tr>
        
        <tr>
            <td><label>Nama</label></td>
            <td>
                <input type="text" name="nama" value="<?php echo $row['nama']; ?>">
            </td>
        </tr>
            
        <tr>
            <td><label>Harga Jual</label></td>
            <td>
                <input type="text" name="harga_jual" value="<?php echo $row['harga_jual']; ?>">
            </td>
        </tr>

        <tr>
            <td><label>Harga Beli</label></td>
            <td>
                <input type="text" name="harga_beli" value="<?php echo $row['harga_beli']; ?>">
            </td>
        </tr>
        
        <tr>
            <td><label>Stok</label></td>
            <td>
                <input type="text" name="stok" value="<?php echo $row['stok']; ?>">
            </td>
        </tr>

        <tr>
            <td><label>Minimum Stok</label></td>
            <td>
                <input type="text" name="min_stok" value="<?php echo $row['min_stok']; ?>">
            </td>
        </tr>

        <tr>
            <td><label>Deskripsi</label></td>
            <td>
                <input type="text" name="deskripsi" value="<?php echo $row['deskripsi']; ?>">
            </td>
        </tr>
        
        <tr>
            <td><label>Kategori Produk</label></td>
            <td>
                <select name="kategori_produk" id="kategori_produk">
                    <?php
                        while($jenis = $rowjenis->fetch(PDO::FETCH_ASSOC)){              
                    ?>
                        <option value="<?= $jenis['id'] ?>">         <?= $jenis['nama']  ?>          </option>
                    <?php
                        }
                    ?>

            </select>
            </td>
        <tfoot>
            <tr bgcolor="lightgreen">
                <th colspan="2">
		            <input type="submit" value="Simpan" name="submit">
                </th>
            </tr>
        </tfoot>
</form>
