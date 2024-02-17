<?php

include "../conn/koneksi.php";

if( isset($_GET['category_id']) ){

    // ambil id dari query string
    $category_id = $_GET['category_id'];

    // buat query hapus
    $sql = "DELETE FROM category WHERE category_id=$category_id";
    $query = mysqli_query($conn, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header("Location: ../kategori.php?status=sukses");
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>