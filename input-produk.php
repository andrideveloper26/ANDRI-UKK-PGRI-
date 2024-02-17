<?php 
  include "conn/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Input Produk</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"  />
</head>

<body>
  <div class="container shadow p-3 mb-3 bg-body-tertiary rounded">
    <header>
        <h3 class="mt-3">Form Input Produk</h3>
    </header>
    <a href="index.php" class="btn btn-secondary my-3">Kembali ke Home</a>
    <form action="proses/proses-input-produk.php" method="POST">

        <fieldset class="border p-3 rounded">
            <legend class="w-auto">Input Produk</legend>
            
            <div class="form-group">
                <label for="category_name">Kategori:</label>
                <select class="form-control" name="category_name" id="category_name">
                    <?php 
                    $sql2 = "SELECT * FROM category";
                    $query2 = mysqli_query($conn, $sql2);

                    while($data = mysqli_fetch_array($query2)) : ?>
                    <option><?= $data['category_name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="merk">Merk:</label>
                <input type="text" class="form-control" name="merk" />
            </div>

            <div class="form-group">
                <label for="namaProduk">Nama Produk:</label>
                <input type="text" class="form-control" name="namaProduk" />
            </div>

            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="text" class="form-control" name="harga" />
            </div>

            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="text" class="form-control" name="stok" />
            </div>

            <div class="form-group">
                <label for="tglInput">Tanggal Input:</label>
                <input type="text" class="form-control" name="tglInput" value="<?= date('y-m-d H:i:s');?>" />
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