<link rel="stylesheet" href="style.css">

<?php
    require_once 'dbproduk.php';

    $sqljenis = "SELECT * FROM kategori_produk";
    $rowjenis = $conn->prepare($sqljenis);
    $rowjenis->execute();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Form Input Data</title>
    <style>
        .link-website {
            text-decoration: none;
            color: black;
        }
    </style>  
</head>
<body>
	<a class="link-website" href="tabel_produk.php">
        <h2>HOME</h2>
    </a>
	<form method="post" action="tabel_produk.php">
    <table border="0" align="center" cellpadding="10" width="40%">
            
          <thead>
                    <th colspan="2">Form Produk</th>
                </tr>
            </thead>
        <tr>
            <td><label for="kode">Kode:</label></td>
            <td>
                <input type="text" id="kode" name="kode">
            </td>
        </tr>
		
		    <tr>
            <td><label for="nama">Nama Produk:</label></td>
            <td>
                <input type="text" id="nama" name="nama">
            </td>
        </tr>   
        
        <tr>
            <td><label for="harga_jual">Harga Jual:</label></td>
            <td>
                <input type="text" id="harga_jual" name="harga_jual">
            </td>
        </tr>   

        <tr>
            <td><label for="harga_beli">Harga Beli:</label></td>
            <td>
                <input type="text" id="harga_beli" name="harga_beli">
            </td>
		</tr>
        
        <tr>
            <td><label for="stok">Stok:</label></td>
            <td>
                <input type="text" id="stok" name="stok">   
            </td>
        </tr>
       
        <tr>
            <td><label for="min_stok">Minimum Stok:</label></td>
            <td>
                <input type="text" id="min_stok" name="min_stok">
            </td>
        </tr>

        <tr>
            <td><label for="deskripsi">Deskripsi:</label></td>
            <td>
                <input type="text" id="deskripsi" name="deskripsi">
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
        </tr>
        
		<tfoot>
                    <th colspan="2">
		<input type="submit" value="Simpan" name="submit">
        </th>
                </tr>
            </tfoot>
        </table>
	</form>
</body>
</html>
