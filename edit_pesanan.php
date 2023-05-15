<link rel="stylesheet" href="style.css">

<?php
    require_once 'dbproduk.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM pesanan WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $kode = $_POST['tanggal'];
        $nama = $_POST['nama_pemesan'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email']; 
        $jumlah_pesanan = $_POST['jumlah_pesanan'];
        $deskripsi = $_POST['deskripsi'];
        $kategori_produk = $_POST['kategori_produk'];

        $sql = "UPDATE pelanggan SET tanggal = :tanggal, nama_pemesan = :nama_pemesan, alamat = :alamat, no_hp = :no_hp,
                        email = :email, jumlah_pesanan = :jumlah_pesanan, deskripsi = :deskripsi, kategori_produk = :kategori_produk WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':tanggal', $tanggal);
        $stmt->bindParam(':nama_pemesan', $nama_pemesan);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':no_hp', $no_hp);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':jumlah_pesanan', $jumlah_pesanan);
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
            <td><label>Tanggal</label></td>
            <td>
                <input type="date" name="tanggal" value="<?php echo $row['tanggal']; ?>">
            <br>
            </td>
        </tr>
        
        <tr>
            <td><label>Nama Pemesan</label></td>
            <td>
                <input type="text" name="nama_pemesan" value="<?php echo $row['nama_pemesan']; ?>">
            </td>
        </tr>
            
        <tr>
            <td><label>Alamat Pemesan</label></td>
            <td>
                <input type="text" name="alamat_pemesan" value="<?php echo $row['alamat_pemesan']; ?>">
            </td>
        </tr>

        <tr>
            <td><label>No. Hp</label></td>
            <td>
                <input type="number" name="no_hp" value="<?php echo $row['no_hp']; ?>">
            </td>
        </tr>
        
        <tr>
            <td><label>Email</label></td>
            <td>
                <input type="email" name="email" value="<?php echo $row['email']; ?>">
            </td>
        </tr>

        <tr>
            <td><label>Jumlah Pesanan</label></td>
            <td>
                <input type="text" name="jumlah_pesanan" value="<?php echo $row['jumlah_pesanan']; ?>">
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
