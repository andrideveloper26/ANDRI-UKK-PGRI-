<?php

include "../conn/koneksi.php";

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $idProduk = $_POST['idProduk'];
    $category_name = $_POST['category_name'];
    $merk= $_POST['merk'];
    $namaProduk= $_POST['namaProduk'];
    $harga= $_POST['harga'];
    $stok= $_POST['stok'];
    $tglInput= $_POST['tglInput'];

    // buat query update
    $sql = "UPDATE produk SET 
    category_name='$category_name', 
    merk='$merk',  namaProduk='$namaProduk',  harga='$harga',  stok='$stok',  tglInput='$tglInput'
    WHERE idProduk=$idProduk";
    $query = mysqli_query($conn, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: ../utama.php?status=sukses');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>