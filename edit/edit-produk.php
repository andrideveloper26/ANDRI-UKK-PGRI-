<?php

include "../conn/koneksi.php";

// kalau tidak ada id di query string
if( !isset($_GET['idProduk']) ){
    header('Location: ../index.php');
}

//ambil id dari query string
$idProduk= $_GET['idProduk'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM produk WHERE idProduk=$idProduk";
$query = mysqli_query($conn, $sql);
$produk = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Form Update Produk</title>
</head>

<body>
    <header>
        <h3>Formulir Edit Data Produk</h3>
    </header>

    <form action="proses-edit-produk.php" method="POST">

        <fieldset>

            <input type="hidden" name="idProduk" value="<?php echo $produk['idProduk'] ?>" />

        <p>
            <label for="category_name">Nama Kategori :</label>
            <input type="text" name="category_name" placeholder="category name" value="<?php echo $produk['category_name'] ?>" />
        </p>
        <p>
            <label for="merk">Merk: </label>
            <input type="text" name="merk" value="<?php echo $produk['merk'] ?>" />
        </p>
        <p>
            <label for="namaProduk">Nama Produk :</label>
            <input type="text" name="namaProduk" value="<?php echo $produk['namaProduk']?>" />
        </p>
        <p>
            <label for="harga">Harga :</label>
            <input type="text" name="harga" value="<?php echo $produk['harga'] ?>" />
        </p>
        <p>
            <label for="stok">Stok :</label>
            <input type="text" name="stok" value="<?php echo $produk['stok']?>" />
        </p>
        <p>
            <label for="tgglInput">Tanggal Input :</label>
            <input type="datetime-local" name="tgglInput" value="<?php echo $produk['tglInput']?>" />
        </p>
        <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>

        </fieldset>


    </form>

    </body>
</html>