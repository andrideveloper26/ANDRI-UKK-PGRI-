
<?php

include "../conn/koneksi.php";

if( isset($_GET['idProduk']) ){

    // ambil id dari query string
    $idProduk = $_GET['idProduk'];

    // buat query hapus
    $sql = "DELETE FROM produk WHERE idProduk=$idProduk";
    $query = mysqli_query($conn, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header("Location: ../utama.php?status=sukses");
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>