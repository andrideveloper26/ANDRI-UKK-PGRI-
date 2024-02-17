<?php 
  include "../conn/koneksi.php";
  
  if (isset($_POST['submit'])) {
    
    $category_name = $_POST['category_name'];
    $merk = $_POST['merk'];
    $namaProduk = $_POST['namaProduk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $tglInput = $_POST['tglInput'];
       
    
        // buat query
    $sql = "INSERT INTO produk ( category_name, merk, namaProduk, harga, stok, tglInput ) VALUE ('$category_name', '$merk', '$namaProduk', '$harga', '$stok', '$tglInput')";
    $query = mysqli_query($conn, $sql);
    
    // if ($query) {
//     echo('sukses');
//   }elseif(!$query) {
//     printf("Error: %s\n", mysqli_error($conn));
//     exit();
//   }
  
  if( $query) {
            // kalau berhasil alihkan ke halaman tiket.php dengan status=sukses
            echo "
            <script>
              alert('berhasil');
              document.location= 'index.php';
            </script>
            ";
            
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            //header('Location: utama.php?status=gagal');
            echo "
            <script>
              alert('gagal');
              document.location= 'index.php';
              
            </script>
            ";
        }
  
    
  }
?>