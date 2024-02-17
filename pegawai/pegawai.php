<?php 

session_start();
$level = $_SESSION['level'];

if ($level == 'petugas') {
  echo "
    <script>
      alert('anda bukan admin');
      window.location = '../index.php';
    </script>
  ";
} 



include('../conn/koneksi.php');

$sql = "SELECT * FROM users  ";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  <title>pegawaiku</title>
</head>
<body>
  <?php include("../frontPart/nav-logo.php");?>
  <!-- navbar -->
        <div class="container  mt-3 shadow p-3 mb-3 bg-body-tertiary rounded border">
         <nav class="d-flex justify-content-between">
           <div class="nav-icon">
               <a class=" btn btn-primary" href="../index.php">HOME</a>
             </div>
           <div class="nav-icon">
             <a class=" btn btn-warning" href="../produk.php">PRODUK</a>
           </div>
           <div class="nav-icon">
             <a class="btn btn-primary" href="../kategori.php">KATEGORI</a>
           </div>
           <div class="nav-icon">
             <a class="btn btn-secondary" href="transaksi.php">TRANSAKSI</a>
           </div>
           <div class="nav-icon">
             <a class=" btn btn-dark" href="../pegawai/pegawai.php">PEGAWAI</a>
           </div>
           <div class="nav-icon">
             <a class=" btn btn-secondary" href="../pelanggan/pelanggan.php">PELANGGAN</a>
           </div>
           <div class="nav-icon">
             <a class=" btn btn-danger" href="../login/logout.php">KELUAR</a>
           </div>
         </nav>
        </div>
  <?php include("regis-petugas.php");?>
  <div class="container mt-3 shadow p-3 mb-3 bg-body-tertiary rounded overflow-auto">

   
    <h2>DATA AKSES PEGAWAI</h2>
    
    <table class="table">
      <thead>
        <tr>
          <th>NO</th>
          <th>FOTO</th>
          <th>NAMA</th>
          <th>JENIS KELAMIN</th>
          <th>ALAMAT</th>
          <th>USERNAME</th>
          <th  >ROLE</th>
          <th>OPSI</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while($data = mysqli_fetch_assoc($query)) : ?>
        <tr>
          <td><?= $no++ ?></td>
          <td> <img src="assets/<?= $data['image'] ?>" alt="foto-<?= $data['namaLengkap'] ?>" width="50"  ></td>
          <td><?= $data['namaLengkap'] ?></td>
          <td><?= $data['jk'] ?></td>
          <td><?= $data['alamat'] ?></td>
          <td><?= $data['namaUsers'] ?></td>

          <td><?= $data['level'] ?></td>
          <td width="50">
            <a href="../delete/delete-pegawai.php?idUsers=<?= $data['idUsers'] ?>" class=" btn btn-danger" onclick="return confirm('yakin ingin menghapus');">DELETE</a> 
            <a href="../edit/edit-pegawai.php?idUsers=<?= $data['idUsers'] ?>" class=" btn btn-warning mt-2" >UBAH</a>
          </td>
        </tr>
        
       <?php endwhile ; ?>
        
      </tbody>
    </table>
  </div>
  <?php include("../frontPart/footer.php");?>
  
  
  <!-- ... (script Bootstrap tetap sama) ... -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>