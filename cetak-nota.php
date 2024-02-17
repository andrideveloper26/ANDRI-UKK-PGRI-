<?php
include('../conn/koneksi.php');

$idTransaksi = $_GET['idTransaksi'];

// Query untuk melakukan inner join antara tabel transaksi dan detailTransaksi
$sql = "SELECT transaksi.idTransaksi, transaksi.tgl, transaksi.totalSemua, detailTransaksi.idProduk, detailTransaksi.jumlah, detailTransaksi.totalHarga, produk.namaProduk, produk.harga
        FROM transaksi
        INNER JOIN detailTransaksi ON transaksi.idTransaksi = detailTransaksi.idTransaksi
        INNER JOIN produk ON detailTransaksi.idProduk = produk.idProduk
        WHERE transaksi.idTransaksi='$idTransaksi'";

// Eksekusi query
$result = mysqli_query($conn, $sql);

// Periksa apakah terjadi kesalahan dalam eksekusi query
if (!$result) {
    die('Error: ' . mysqli_error($conn)); // Tampilkan pesan error jika query gagal dieksekusi
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .container {
            width: 300px;
            margin: 20px auto;
            border: 2px solid #000;
            padding: 10px;
        }
        .header {
            font-weight: bold;
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
        }
        .item {
            text-align: left;
            margin-top: 5px;
        }
        .item span {
            display: inline-block;
            width: 50%;
        }
        .total {
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Nota Pembelian</h2>
            <p>Tanggal: <?php echo date("d-m-Y"); ?></p>
            <p>ID TR : <?= $idTransaksi?></p>
        </div>
        <?php
        // Loop untuk menampilkan item-item pembelian
        $totalPembelian = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='item'>";
            echo "<span>ID Produk:</span> " . $row["idProduk"] . "<br>";
            echo "<span>Nama Produk:</span> " . $row["namaProduk"] . "<br>";
            echo "<span>Jumlah:</span> " . $row["jumlah"] . "<br>";
            echo "<span>Total Harga:</span> " . $row["totalHarga"] . "<br>";
            echo "</div>";
            $totalPembelian += $row["totalHarga"];
        }
        ?>
        <div class="total">
            <p>Total Pembelian: Rp. <?php echo number_format($totalPembelian, 0,',', '.' )?></p>
        </div>
        <p>Terima kasih atas pembeliannya!</p>
        
    </div>
    
    
    <script>
      window.print();
    </script>
</body>
</html>

<?php
// Bebaskan hasil setelah digunakan
mysqli_free_result($result);

// Tutup koneksi database setelah selesai
mysqli_close($conn);
?>