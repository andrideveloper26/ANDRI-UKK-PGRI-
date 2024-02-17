<?php 
session_start();
include "conn/koneksi.php";


if (!isset($_SESSION['namaUsers'])) {
    header('Location: login/login.php');
    exit();
}

$namaUsers = $_SESSION['namaUsers'];

// $sqlProduk = "SELECT * FROM produk";
// $queryProduk = mysqli_query($conn, $sqlProduk); 
// $data = mysqli_fetch_row($queryProduk);

function select($tb){
  global $conn;
  $sql = "SELECT * FROM $tb ";
  $query = mysqli_query($conn, $sql); 
  return $query;
}
$produk = select("produk");
$kategori = select("category");
$transaksi = select("transaksi");
$users = select("users");


?>


<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css" media="all" />
    <title>utama</title>
  </head>
  <body >
<?php include "frontPart/nav-logo.php" ?>
    <div class="container-main  d-flex justify-content-center flex-column mt-2"  >
      <!-- navigasi-->
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
           <a class=" btn btn-danger" href="login/logout.php">KELUAR</a>
         </div>
       </nav>
      </div>
      <!-- navbar end -->
      <div class="container d-flex gap-2 shadow p-3 mb-3 bg-body-tertiary rounded">
      
      <div class="card   w-25 border-1">
        <h5 class="card-header text-white bg-primary">PRODUK</h5>
        <div class="card-body">
          <h5 class="card-title ">TOTAL :</h5>
          <p class="card-text fs-1"><?= mysqli_num_rows($produk)?></p>
        </div>
      </div>
      
      <div class="card   w-25 border-1">
        <h5 class="card-header text-white bg-primary">KATEGORI</h5>
        <div class="card-body">
          <h5 class="card-title ">TOTAL :</h5>
          <p class="card-text fs-1"><?= mysqli_num_rows($kategori)?></p>
        </div>
      </div>
      
      <div class="card   w-25 border-1">
        <h5 class="card-header text-white bg-primary">TRANSAKSI</h5>
        <div class="card-body">
          <h5 class="card-title ">TOTAL :</h5>
          <p class="card-text fs-1"><?= mysqli_num_rows($transaksi)?></p>
        </div>
      </div>
      
      <div class="card   w-25 border-1">
        <h5 class="card-header text-white bg-primary">PEGAWAI</h5>
        <div class="card-body">
          <h5 class="card-title ">TOTAL :</h5>
          <p class="card-text fs-1"><?= mysqli_num_rows($users)?></p>
        </div>
      </div>
      
 
      
    </div>
      
      
    </nav>
    <?php include "frontPart/footer.php" ?>


    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>





