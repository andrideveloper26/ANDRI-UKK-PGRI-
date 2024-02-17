<?php 
session_start();
include "conn/koneksi.php";

if (!isset($_SESSION['namaUsers'])) {
    header('Location: login/login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <!-- Bootstrap CSS link -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <style type="text/css" media="all">
      body{
        background-color: #eaeaea;
      }
    </style>
</head>
<body>
  <?php include "frontPart/nav-logo.php"; ?>
  
  <!-- navbar -->
        <div class="container  mt-3 shadow p-3 mb-3 bg-body-tertiary rounded border">
         <nav class="d-flex justify-content-between">
           <div class="nav-icon">
               <a class=" btn btn-primary" href="index.php">HOME</a>
             </div>
           <div class="nav-icon">
             <a class=" btn btn-warning" href="produk.php">PRODUK</a>
           </div>
           <div class="nav-icon">
             <a class="btn btn-primary" href="kategori.php">KATEGORI</a>
           </div>
           <div class="nav-icon">
             <a class="btn btn-secondary" href="transaksi/transaksi.php">TRANSAKSI</a>
           </div>
           <div class="nav-icon">
             <a class=" btn btn-dark" href="pegawai/pegawai.php">PEGAWAI</a>
           </div>
           <div class="nav-icon">
             <a class=" btn btn-secondary" href="pelanggan/pelanggan.php">PELANGGAN</a>
           </div>
           <div class="nav-icon">
             <a class=" btn btn-danger" href="login/logout.php">KELUAR</a>
           </div>
         </nav>
        </div>
  
  
  <?php include "input-kategori.php"; ?>
  
    <div class="container shadow p-3 mb-5 bg-body-tertiary rounded">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>ID Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Tanggal Input</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                $sql2 = "SELECT * FROM category";
                $query2 = mysqli_query($conn, $sql2); 
                ?>

                <?php 
                $nomor = 1;
                while($data = mysqli_fetch_assoc($query2)) :?>
                <tr>
                    <td><?= $nomor++; ?></td>
                    <td>ctr-<?= $data['category_id']; ?></td>
                    <td><?= $data['category_name']; ?></td>
                    <td><?= $data['tanggal_input']; ?></td>
                    <td>
                        <a href="edit/form-edit-category.php?category_id=<?= $data['category_id'];?>" class="btn btn-warning">Ubah</a>
                        <a href="delete/delete-category.php?category_id=<?= $data['category_id'];?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>

            </tbody>
        </table>
    </div>
    <?php include "frontPart/footer.php"; ?>
    <!-- Bootstrap JS and Popper.js CDN links (required for Bootstrap functionality) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>