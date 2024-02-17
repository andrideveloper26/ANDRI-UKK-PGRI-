<?php 
include('../conn/koneksi.php');

if (isset($_POST['submit'])) {
  $namaLengkap = $_POST['namaLengkap'];
  $jk = $_POST['jk'];
  $alamat = $_POST['alamat'];
  $image = $_FILES['image']['name'];
  
  //berkas kita simpan ke folder asset/
  $tmpImage = $_FILES['image']['tmp_name'];
  $berkas = 'assets/' . $image; // Tentukan nama berkas yang benar dengan direktori
  
  $namaUsers = $_POST['username'];
  $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
  $level = 'petugas';
  
  //kirim data petugas ke db
  $sql = "INSERT INTO users (namaLengkap, jk, alamat, image, namaUsers, pass, level) VALUES ('$namaLengkap', '$jk', '$alamat', '$image', '$namaUsers', '$pass', '$level')";
  
  $query = mysqli_query($conn, $sql);
  
  if ($query) {
    // Pindahkan berkas ke lokasi yang ditentukan
    if (move_uploaded_file($tmpImage, $berkas)) {
      echo "Berkas berhasil diunggah.";
    } else {
      echo "Gagal mengunggah berkas.";
    }
  } else {
    echo "Query gagal: " . mysqli_error($conn);
  }
  
} else {
  echo 'Akses dilarang';
}
?>