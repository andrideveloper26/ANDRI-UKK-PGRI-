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
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="" type="text/css" media="all" />
    <title>utama</title>
  </head>
  <body>
    <!-- ... (bagian lainnya tetap sama) ... -->
    <?php include "frontPart/nav-logo.php" ?>
    <div class="container-main w-100 d-flex flex-column justify-content-center">
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
      
      <div class="container-content mt-2 ms-3 d-flex flex-column">
        <?php include "input-produk.php" ?>
  
        <div class="container  mt-3 shadow p-3 mb-3 bg-body-tertiary rounded border">
          <h2 class="my-4">Data Barang</h2>
             <form action="" method="get">
              <label for="exampleDataList" class="form-label">Cari Barang</label>
              <input class="form-control mb-2"  name="pencarian" id="exampleDataList" placeholder="Type to search..." value="<?php if (isset($_GET['pencarian'])) { echo $_GET['pencarian']; }?>">
            </form>
          <table class="table table-bordered ">
            <thead class="table-dark">
              <tr>
                <th>NO</th>
                <th scope="col">ID PRODUK</th>
                <th>KATEGORI</th>
                <th>MERK</th>
                <th>NAMA PRODUK</th>
                <th>HARGA</th>
                <th>STOK</th>
                <th>TANGGAL INPUT</th>
                <th>OPSI</th>
              </tr>
            </thead>
            <tbody>
              
              <?php 
      
              
      
              if (isset($_GET['pencarian'])) {
                  $pencarian = $_GET['pencarian'];
                   $sql ="SELECT * FROM produk WHERE idProduk LIKE '%$pencarian%' OR category_name LIKE '%$pencarian%' 
                   OR namaProduk LIKE '%$pencarian%'  OR tglInput LIKE '%$pencarian%'
                   ";
              }else{
                  $sql = "SELECT * FROM produk";
              }
             
              $query = mysqli_query($conn, $sql);
              $no = 1; 
              
              while($data = mysqli_fetch_array($query)) :?>
              <tr>
                  <td><?=$no++; ?></td>
                  <td><?=$data['idProduk']; ?></td>
                  <td><?=$data['category_name']; ?></td>
                  <td><?=$data['merk']; ?></td>
                  <td><?=$data['namaProduk']; ?></td>
                  <td><?=$data['harga']; ?></td>
                  <td><?=$data['stok']; ?></td>
                  <td><?=$data['tglInput']; ?></td>
                  <td>
                  <a href="edit/edit-produk.php?idProduk=<?= $data['idProduk'];?>" class="btn btn-warning">ubah</a> 
                  <a href="delete/delete-produk.php?idProduk=<?= $data['idProduk'];?>" onclick="return confirm('yakin menghapus?');" class="btn btn-danger">delete</a>
                  </td>
              </tr>
      
              <?php endwhile; ?>
              <!-- Tambahkan baris sesuai dengan data barang Anda -->
            </tbody>
          </table>

          
        </div>
      </div>
    </div>
    
    
    <?php include "frontPart/footer.php" ?>

    <!-- ... (script Bootstrap tetap sama) ... -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>