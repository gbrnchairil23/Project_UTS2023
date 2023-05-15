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
	<a class="link-website" href="index.php">
        <h2>HOME</h2>
    </a>
	<form method="post" action="tabel_produk.php">
    <table border="0" align="center" cellpadding="10" width="40%">
            <thead>
                <tr bgcolor="lightgreen">
                    <th colspan="2">Form Pesanan</th>
                </tr>
            </thead>

        <tr>
            <td><label for="tanggal">Tanggal:</label></td>
            <td>
                <input type="date" id="tanggal" name="tanggal">   
            </td>
        </tr>
		
		<tr>
            <td><label for="nama_pemesan">Nama Pemesan:</label></td>
            <td>
                <input type="text" id="nama_pemesan" name="nama_pemesan">
            </td>
        </tr>

        <tr>
            <td><label for="alamat_pemesan">Alamat Pemesan:</label></td>
            <td>
                <input type="text" id="alamat_pemesan" name="alamat_pemesan">
            </td>
        </tr>

        <tr>
            <td><label for="no_hp">No. HP:</label></td>
            <td>
                <input type="number" id="no_hp" name="no_hp">
            </td>
		</tr>
       
        <tr>
            <td><label for="email">Email:</label></td>
            <td>
                <input type="email" id="email" name="email">
            </td>
        </tr>

        <tr>
            <td><label for="jumlah_pesanan">Jumlah Pesanan:</label></td>
            <td>
                <input type="number" id="jumlah_pesanan" name="jumlah_pesanan">
            </td>
        </tr>

        <tr>
            <td><label for="deskripsi">Deskripsi:</label></td>
            <td>
                <input type="text" id="deskripsi" name="deskripsi">
            </td>
        </tr>
        
        <tr>
            <td><label>Kartu ID</label></td>
            <td>
            <select name="kartu_id" id="kartu_id">
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
                <tr bgcolor="lightgreen">
                    <th colspan="2">
		<input type="submit" value="Simpan" name="submit">
        </th>
                </tr>
            </tfoot>
        </table>
	</form>
</body>
</html>
