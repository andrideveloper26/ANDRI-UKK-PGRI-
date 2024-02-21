<?php

include "../conn/koneksi.php";

// kalau tidak ada id di query string
if( !isset($_GET['produkID']) ){
    header('Location: ../produk/produk.php');
}

//ambil id dari query string
$produkID= $_GET['produkID'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM produk WHERE produkID=$produkID";
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
    <title>EDIT PRODUK | KASIRKU</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"  />
</head>

<body>
  <div class="container shadow p-3 mb-3 bg-body-tertiary rounded">
    <header>
        <h3 class="mt-3">Form Edit Data Produk</h3>
    </header>
    <a href="../produk/produk.php" class="btn btn-secondary my-3">Kembali ke Data Produk</a>
    <form action="proses-edit-produk.php" method="POST" enctype="multipart/form-data">

        <fieldset class="border p-3 rounded">
            <legend class="w-auto">EDIT PRODUK</legend>
            <input type="hidden" name="produkID" value="<?= $produk['produkID'];?>">
            <div class="form-group">
                <label for="category_name">Kategori:</label>
                <select class="form-control" name="category_name" id="category_name" >
                    <?php 
                    $sql2 = "SELECT * FROM category";
                    $query2 = mysqli_query($conn, $sql2);

                    while($data = mysqli_fetch_array($query2)) : ?>
                    <option><?= $data['category_name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
              <label for="formFile" class="form-label">Unggah Image Produk</label>
              <input class="form-control" type="file" id="formFile" name="image" value="<?= $produk['image'];?>"   >
            </div>
            
            <div class="form-group">
                <label for="namaProduk">Nama Produk:</label>
                <input type="text" class="form-control" name="namaProduk" value="<?= $produk['namaProduk'];?>"/>
            </div>

            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="text" class="form-control" name="harga" value="<?= $produk['harga'];?>"/>
            </div>

            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="text" class="form-control" name="stok" value="<?= $produk['stok'];?>" />
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </fieldset>

    </form>
  </div>
    <!-- Bootstrap JS and Popper.js CDN links (required for Bootstrap functionality) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
