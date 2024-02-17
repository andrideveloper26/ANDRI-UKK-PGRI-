<?php

include("conn/koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $tanggal_input= $_POST['tanggal_input'];

    // buat query update
    $sql = "UPDATE category SET 
    category_name='$category_name', 
    tanggal_input='$tanggal_input' 
    WHERE category_id=$category_id";
    $query = mysqli_query($conn, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: index.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>