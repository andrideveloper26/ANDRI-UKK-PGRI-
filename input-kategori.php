<?php 
    include "conn/koneksi.php";

    if (isset($_POST['submit'])) {
        $category_name = $_POST['category_name'];
        $tanggal_input = $_POST['tanggal_input'];
    
        // buat query
        $sql = "INSERT INTO category ( category_name, tanggal_input) VALUE ( '$category_name', '$tanggal_input')";
        $query = mysqli_query($conn, $sql);
    
        // apakah query simpan berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman tiket.php dengan status=sukses
            echo "
            <script>
              alert('Berhasil');
              document.location= 'kategori.php';
            </script>
            ";
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            echo "
            <script>
              alert('Gagal');
              document.location= 'kategori.php';
            </script>
            ";
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Kategori</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>
  <body>
    <div class="content ">
      <div class="container mt-3 shadow p-3 mb-3 bg-body-tertiary rounded">
        <h3>Tambah Kategori</h3>
        <a href="index.php" class="btn btn-secondary my-3">Kembali ke Home</a>
        <form action="" method="POST">
          <fieldset>
            <div class="form-group">
              <label for="category_name">Nama Kategori:</label>
              <input type="text" class="form-control" name="category_name"/>
            </div>
            <div class="form-group">
              <label for="tanggal_input">Tanggal Input:</label>
              <input type="datetime-local" class="form-control" name="tanggal_input"/>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Submit" name="submit" />
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    <!-- Bootstrap JS and Popper.js CDN links (required for Bootstrap functionality) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>