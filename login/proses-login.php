<?php
session_start();
include('../conn/koneksi.php');

if (isset($_POST['submit'])) {
  $namaUsers = $_POST['namaUsers'];
  $pass = $_POST['pass']; // tambahkan algoritma hash yang diinginkan, dalam kasus ini, PASSWORD_DEFAULT

  $sql ="SELECT * FROM users WHERE namaUsers = '$namaUsers'";
  $query = mysqli_query($conn, $sql);
  
  if ($query) {
    if (mysqli_num_rows($query) == 1) {
      $data = mysqli_fetch_assoc($query);
      if (password_verify($pass, $data['pass'])) {
        $level = $data['level'];
        $_SESSION['namaUsers'] = $data['namaUsers'];
        $_SESSION['level'] = $level; // Simpan level ke sesi

        header('location:../index.php');
          
        
      } else {
        echo('Password salah');
      }
      
    } else {
      echo('Username tidak ditemukan');
    }
    
  } else {
    die("Gagal query" . mysqli_connect_error($conn));
  }
 
} else {
  echo('Akses dilarang');
}
?>