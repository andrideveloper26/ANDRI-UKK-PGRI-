<?php 
include "../conn/koneksi.php";
date_default_timezone_set('Asia/Jakarta');
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Fungsi untuk mendapatkan ID penjualan yang unik
function generatePenjualanId() {
    return 'PJ' . date('YmdHis') . rand(100, 999);
}

if (isset($_POST['submit'])) {
    $pelangganID = $_SESSION['pelangganID'];
    $penjualanID = generatePenjualanId();
    $totalHarga = $_POST['totalHarga'];
    $tgl = date('Y-m-d H:i:s');
    $idUser = $_POST['idUser'];
    $jumlahProduk = $_POST['jumlah'];
    
    //var_dump($pelangganID);
    
    
    $sqlTransaksi =  "INSERT INTO penjualan (penjualanID, tanggalPenjualan, totalHarga, pelangganID, idUser) VALUES ('$penjualanID', '$tgl', '$totalHarga', '$pelangganID ' , '$idUser' )";
    $queryTr = mysqli_query($conn, $sqlTransaksi);
    
    if ($queryTr) {
        foreach ($_SESSION['cart'] as $produkID => $jumlah) {
            // Ambil informasi produk dari database
            $sqlProduk = "SELECT * FROM produk WHERE produkID=$produkID";
            $queryProduk = mysqli_query($conn, $sqlProduk);
            $produk = mysqli_fetch_assoc($queryProduk);

            $subtotal = (int)$produk['harga'] * $jumlahProduk;


            
            $sqlDtr =  "INSERT INTO detailPenjualan (penjualanID, produkID, jumlahProduk, subtotal) VALUES ( '$penjualanID', '$produkID', '$jumlahProduk', '$subtotal' )";
            
            $queryDtr = mysqli_query($conn, $sqlDtr);
        }

        if ($queryDtr) {
            unset($_SESSION['cart']);
            header("location:../nota/cetak-nota.php?penjualanID=$penjualanID");
            exit(); // Penting: pastikan untuk keluar setelah mengarahkan pengguna
        } else {
            die('gagal ' .mysqli_error($conn));
        }
    } else {
        die('gagal ' .mysqli_error($conn));
    }
}
?>
