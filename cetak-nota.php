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
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            background-color: #fff;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            color: #007bff;
        }
        .item {
            margin-bottom: 15px;
        }
        .item span {
            font-weight: bold;
        }
        .total {
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            color: #28a745;
        }
        .thanks {
            text-align: center;
            margin-top: 30px;
            color: #6c757d;
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
        $totalPembelian = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="item">
                <span>ID Produk:</span> <?= $row["idProduk"] ?><br>
                <span>Nama Produk:</span> <?= $row["namaProduk"] ?><br>
                <span>Jumlah:</span> <?= $row["jumlah"] ?><br>
                <span>Total Harga:</span> <?= $row["totalHarga"] ?><br>
            </div>
            <?php
            $totalPembelian += $row["totalHarga"];
        }
        ?>
        <div class="total">
            <p>Total Pembelian: Rp. <?php echo number_format($totalPembelian, 0,',', '.' )?></p>
        </div>
        <p class="thanks">Terima kasih atas pembeliannya! <i class="far fa-smile-beam"></i></p>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Bebaskan hasil setelah digunakan
mysqli_free_result($result);
// Tutup koneksi database setelah selesai
mysqli_close($conn);
?>