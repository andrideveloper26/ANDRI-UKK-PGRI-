<?php

include "conn/koneksi.php";

// kalau tidak ada id di query string
if( !isset($_GET['category_id']) ){
    header('Location: kategori.php');
}

//ambil id dari query string
$category_id = $_GET['category_id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM category WHERE category_id=$category_id";
$query = mysqli_query($conn, $sql);
$category = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Form Update Category</title>
</head>

<body>
    <header>
        <h3>Formulir Edit Data Category</h3>
    </header>

    <form action="edit/proses-edit-category.php" method="POST">

        <fieldset>

            <input type="hidden" name="category_id" value="<?php echo $category['category_id'] ?>" />

        <p>
            <label for="category_name">Nama Kategori: </label>
            <input type="text" name="category_name" placeholder="category name" value="<?php echo $category['category_name'] ?>" />
        </p>
        <p>
            <label for="tanggal_input">Tanggal Input: </label>
            <input type="datetime-local" name="tanggal_input" value="<?php echo $category['tanggal_input'] ?>" />
        </p>
        <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>

        </fieldset>


    </form>

    </body>
</html>