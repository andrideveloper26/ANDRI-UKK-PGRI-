<?php 
include "../conn/koneksi.php";

session_start();

if (!isset($_SESSION['namaUsers'])) {
    header('Location: ../login/login.php');
    exit();
}

$namaLengkapUsers = $_SESSION['namaLengkapUsers'];

// Cek apakah session cart sudah ada
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array(); // Inisialisasi sebagai array kosong jika belum ada
}

// Tambahkan produk ke keranjang saat ada request dengan parameter produkID
if (isset($_GET['produkID'])) {
    $produkID = $_GET['produkID'];

    // Cek apakah produk sudah ada di keranjang
    if (isset($_SESSION['cart'][$produkID])) {
        // Jika sudah, tambahkan jumlah
        $_SESSION['cart'][$produkID]++;
    } else {
        // Jika belum, tambahkan produk ke keranjang
        $_SESSION['cart'][$produkID] = 1;
    }
    header('location:transaksi.php');
}

//ambil data member
if (isset($_GET['pelangganID'])) {
  $pelangganID = $_GET['pelangganID'];
  $namaPelanggan = $_GET['namaPelanggan'];
} 




// Menghapus produk dari keranjang
if (isset($_GET['ID'])) {
    // Ambil produkID produk
    $produkID = $_GET['ID'];

    // Hapus produk dari session jika ada
    if (isset($_SESSION['cart'][$produkID])) {
        unset($_SESSION['cart'][$produkID]);
        // Redirect kembali ke halaman sebelumnya atau halaman yang sesuai
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Penjualan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    *, body {
      margin: 0;
      padding: 0;
    }
  </style>
</head>
<body>
    <?php include "../frontPart/nav-logo.php"; ?>
  <div class="container">
    
    <!-- navbar -->
        <div class="container  mt-3 shadow p-3 mb-3 bg-body-tertiary rounded border">
         <nav class="d-flex justify-content-between">
           <div class="nav-icon">
               <a class=" btn btn-primary" href="../index.php">HOME</a>
             </div>
           <div class="nav-icon">
             <a class=" btn btn-warning" href="../produk/produk.php">PRODUK</a>
           </div>
           <div class="nav-icon">
             <a class="btn btn-primary" href="../kategori/kategori.php">KATEGORI</a>
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
    
    <div class="row mt-4">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Cari MEMBER</h5>
            <form action="" method="get" accept-charset="utf-8">
              <div class="input-group mb-3">
                <span class="input-group-text" id="addon-wrapping">@</span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="keyword" aria-describedby="addon-wrapping" value="<?php if (isset($_GET['keyword'])) { echo $_GET['keyword']; }?>">
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body overflow-auto">
            <h5 class="card-title">Hasil Pencarian</h5>
            <?php 
            if (isset($_GET['keyword']) && !empty(trim($_GET['keyword']))) {
                $keyword = $_GET['keyword'];
                $sql2 ="SELECT * FROM pelanggan WHERE pelangganID LIKE '%$keyword%' OR namaPelanggan LIKE '%$keyword%' 
                OR alamat LIKE '%$keyword%'
                ";
                $query2 = mysqli_query($conn, $sql2);
                if(mysqli_num_rows($query2) > 0) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>ID PELANGGAN</th>
                                <th>NAMA PELANGGAN</th>
                                <th>ALAMAT</th>
                                <th>NO TELEPON</th>
                                <th>EMAIL</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1; 
                            while($data1 = mysqli_fetch_array($query2)) {?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?=$data1['pelangganID']; ?></td>
                                    <td><?=$data1['namaPelanggan']; ?></td>
                                    <td><?=$data1['alamat']; ?></td>
                                    <td><?=$data1['nomorTelepon']; ?></td>
                                    <td><?=$data1['email']; ?></td>
                                    
                                    <td>
                                      <a href="?pelangganID=<?= $data1['pelangganID'] ?>&namaPelanggan=<?= $data1['namaPelanggan']; ?>">masukan data member ke keranjang</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else {
                    echo "<p>Tidak ada hasil yang ditemukan.</p>";
                }
            } elseif (isset($_GET['keyword']) && empty(trim($_GET['keyword']))) {
                echo "<p>Silakan masukkan kata kunci pencarian.</p>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Kolom pencarian -->
   
   
    <div class="row mt-4">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body overflow-auto">
            <h5 class="card-title">Cari Barang</h5>
            <form action="" method="get" accept-charset="utf-8">
              <div class="input-group mb-3">
                <span class="input-group-text" id="addon-wrapping">@</span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="pencarian" aria-describedby="addon-wrapping" value="<?php if (isset($_GET['pencarian'])) { echo $_GET['pencarian']; }?>">
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Hasil Pencarian</h5>
            <?php 
            if (isset($_GET['pencarian']) && !empty(trim($_GET['pencarian']))) {
                $pencarian = $_GET['pencarian'];
                $sql ="SELECT * FROM produk WHERE produkID LIKE '%$pencarian%' OR category_name LIKE '%$pencarian%' 
                OR namaProduk LIKE '%$pencarian%'
                ";
                $query = mysqli_query($conn, $sql);
                if(mysqli_num_rows($query) > 0) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID BARANG</th>
                                <th>NAMA BARANG</th>
                                <th>KATEGORI</th>
                                <th>MERK</th>
                                <th>HARGA</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1; 
                            while($data = mysqli_fetch_array($query)) {?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?=$data['namaProduk']; ?></td>
                                    <td><?=$data['category_name']; ?></td>
                                    <td><img src="../produk/assets/<?=$data['image']; ?>" alt="" width="50"></td>
                                    <td><?=
                                    number_format($data['harga'], 0, ',', '.')
                                    ; ?></td>
                                    <td>
                                      <a href="delete/delete-produk.php?produkID=<?= $data['produkID'];?>" onclick="return confirm('yakin menghapus?');">delete</a>
                                      <a href="?produkID=<?= $data['produkID'];?>">masukan keranjang</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else {
                    echo "<p>Tidak ada hasil yang ditemukan.</p>";
                }
            } elseif (isset($_GET['pencarian']) && empty(trim($_GET['pencarian']))) {
                echo "<p>Silakan masukkan kata kunci pencarian.</p>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Kolom pencarian -->
    
    <!-- Kolom pembelian -->
    <div class="row mt-4">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Pesanan</h5>
            <form action="proses.php" method="post" accept-charset="utf-8">
              <!--kolom member-->
              <table class="table" id="tabel-pesanan">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>NAMA BARANG</th>
                    <th>JUMLAH</th>
                    <th>TOTAL</th>
                    <th>KASIR</th>
                    <th>PELANGGAN</th>
                    <th>OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $totalSemua = 0;
                  $no = 1;
                  foreach ($_SESSION['cart'] as $produkID => $jumlah) {
                      // Ambil informasi produk dari database
                      $sql = "SELECT * FROM produk WHERE produkID=$produkID";
                      $query = mysqli_query($conn, $sql);
                      $produk = mysqli_fetch_assoc($query);
                      
                      $totalHargaProduk = $jumlah * $produk['harga'];
                      $totalSemua += $totalHargaProduk;
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $produk['namaProduk'] ?></td>
                    <td>
                      <input class="form-control jumlah" type="number" name="jumlah[]" value="<?= $jumlah ?>" data-harga="<?= $produk['harga'] ?>" >
                    </td>
                    <td>
                      <input class="form-control total" type="text" name="total[]" value="<?= number_format($totalHargaProduk, 0, ',', '.') ?>" readonly>
                    </td>
                    <td><?= $namaLengkapUsers;?></td>
                    <td>
                    <input class="form-control" type="text" name="member" id="member" value="<?= $namaPelanggan?>" readonly>
                    <input type="hidden" name="pelangganID" value="<?= $PelangganID?>">
                    </td>
                    <td>
                      <a href="?ID=<?= $produkID ?>" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <div class="row">
                <div class="col-md-3">
                  <label for="totalSemua">TOTAL SEMUA :</label>
                  <input class="form-control" type="text" name="totalSemua"id="totalSemua" value="<?= number_format($totalSemua, 0,',', '.' )?>" readonly>
                </div>
                <div class="col-md-3">
                  <label for="uangBayar">BAYAR</label>
                  <input class="form-control" type="text" name="uangBayar" id="uangBayar" oninput="hitungKembalian()">
                </div>
                <div class="col-md-3">
                  <label for="uangKembalian">KEMBALI</label>
                  <input class="form-control" type="text" name="uangKembalian" id="uangKembalian" value="" readonly>
                </div>
                <div class="col-md-3">
                  <button class="btn btn-success btn-block" type="submit" name="submit">CHECKOUT</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Kolom pembelian -->
  </div>
  <?php include"data-transaksi.php";?>

  <script>
    function hitungKembalian() {
      var totalSemua = parseInt(document.getElementById('totalSemua').value.replace(/\D/g,''));
      var uangBayar = parseInt(document.getElementById('uangBayar').value.replace(/\D/g,''));
      var uangKembalian = uangBayar - totalSemua;
      document.getElementById('uangKembalian').value = uangKembalian;
    }

    function hitungTotal() {
      var totalSemua = 0;
      var rows = document.querySelectorAll('#tabel-pesanan tbody tr');
      
      rows.forEach(function(row) {
        var jumlah = parseInt(row.querySelector('.jumlah').value);
        var harga = parseInt(row.querySelector('.jumlah').getAttribute('data-harga'));
        var totalHarga = jumlah * harga;
        totalSemua += totalHarga;
        row.querySelector('.total').value = totalHarga.toLocaleString();
      });
      
      document.getElementById('totalSemua').value = totalSemua.toLocaleString();
    }

    var inputs = document.querySelectorAll('.jumlah');
    inputs.forEach(function(input) {
      input.addEventListener('input', hitungTotal);
    });

    window.addEventListener('load', hitungTotal);
  </script>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
