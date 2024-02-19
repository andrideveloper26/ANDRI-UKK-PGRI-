-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 19 Feb 2024 pada 03.15
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `tanggal_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `tanggal_input`) VALUES
(5, 'ATK', '2024-01-12 10:19:00'),
(6, 'sabun', '2024-01-12 10:19:00'),
(7, 'makanan', '2024-01-12 10:19:00'),
(9, 'baju', '2024-01-17 14:02:00'),
(10, 'manusia', '2024-01-18 13:37:00'),
(11, 'kameja', '2024-02-04 08:58:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailTransaksi`
--

CREATE TABLE `detailTransaksi` (
  `idDetailTransaksi` int(11) NOT NULL,
  `idTransaksi` varchar(255) NOT NULL,
  `idProduk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `totalHarga` decimal(10,0) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detailTransaksi`
--

INSERT INTO `detailTransaksi` (`idDetailTransaksi`, `idTransaksi`, `idProduk`, `jumlah`, `totalHarga`, `idUser`) VALUES
(1, '0', 5, 6, '5000', 1),
(2, '0', 5, 4, '6000', 1),
(3, 'PJ20240209083136108', 8, 1, '55555', 1),
(4, 'PJ20240209083136108', 6, 1, '6000', 1),
(5, 'PJ20240209083136108', 7, 1, '6000', 1),
(6, 'PJ20240209083136108', 11, 1, '7886', 1),
(7, 'PJ20240209083406896', 8, 1, '55555', 1),
(8, 'PJ20240209083406896', 6, 1, '6000', 1),
(9, 'PJ20240209083406896', 7, 1, '6000', 1),
(10, 'PJ20240209083406896', 11, 1, '7886', 1),
(11, 'PJ20240209083616839', 11, 1, '7886', 1),
(12, 'PJ20240209083616839', 7, 1, '6000', 1),
(13, 'PJ20240209083616839', 6, 1, '6000', 1),
(14, 'PJ20240211030204686', 6, 2, '12000', 1),
(15, 'PJ20240211030204686', 12, 1, '7', 1),
(16, 'PJ20240211030204686', 8, 1, '55555', 1),
(17, 'PJ20240211053016917', 8, 1, '55555', 1),
(18, 'PJ20240211053016917', 6, 1, '6000', 1),
(19, 'PJ20240211053603920', 6, 1, '6000', 1),
(20, 'PJ20240211053947981', 6, 1, '6000', 1),
(21, 'PJ20240211054252201', 11, 1, '7886', 1),
(22, 'PJ20240211054927463', 7, 1, '6000', 1),
(23, 'PJ20240211055312539', 7, 1, '6000', 1),
(24, 'PJ20240211055813882', 8, 1, '55555', 1),
(25, 'PJ20240211055902216', 6, 1, '6000', 1),
(26, 'PJ20240211055902216', 7, 1, '6000', 1),
(27, 'PJ20240211055902216', 11, 1, '7886', 1),
(28, 'PJ20240211055902216', 8, 1, '55555', 1),
(29, 'PJ20240212003055810', 7, 1, '6000', 1),
(30, 'PJ20240212003055810', 12, 1, '7', 1),
(31, 'PJ20240212143256516', 8, 1, '55555', 1),
(32, 'PJ20240212143256516', 7, 1, '6000', 1),
(33, 'PJ20240213000651953', 7, 1, '6000', 1),
(34, 'PJ20240213000651953', 8, 1, '55555', 1),
(35, 'PJ20240215044130221', 7, 3, '18000', 1),
(36, 'PJ20240215044130221', 6, 1, '6000', 1),
(37, 'PJ20240218023109602', 6, 2, '12000', 1),
(38, 'PJ20240218023109602', 22, 1, '15000', 1),
(39, 'PJ20240218050251863', 21, 1, '15000', 1),
(40, 'PJ20240218050648944', 9, 1, '8', 1),
(41, 'PJ20240218050648944', 7, 1, '6000', 1),
(42, 'PJ20240218050648944', 6, 1, '6000', 1),
(43, 'PJ20240218050648944', 8, 1, '55555', 1),
(44, 'PJ20240218050648944', 20, 1, '15000', 1),
(45, 'PJ20240218050648944', 24, 1, '15000', 1),
(46, 'PJ20240218050746379', 23, 2, '30000', 1),
(47, 'PJ20240218051605355', 7, 1, '6000', 1),
(48, 'PJ20240218051605355', 9, 2, '16', 1),
(49, 'PJ20240218051605355', 8, 1, '55555', 1),
(50, 'PJ20240218051717388', 23, 1, '15000', 1),
(51, 'PJ20240218123455315', 7, 1, '6000', 1),
(52, 'PJ20240218123455315', 9, 1, '8', 1),
(53, 'PJ20240218123534552', 21, 1, '15000', 1);

--
-- Trigger `detailTransaksi`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `detailTransaksi` FOR EACH ROW BEGIN
INSERT INTO produk SET idProduk = NEW.idProduk, 
stok = NEW.jumlah 
ON DUPLICATE KEY UPDATE stok = stok - NEW.jumlah;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idPelanggan` int(11) NOT NULL,
  `namaLengkap` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` int(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`idPelanggan`, `namaLengkap`, `alamat`, `telp`, `username`, `pass`) VALUES
(1, 'ha', 'ysuw', 56, 'gahah', '$2y$10$IG2GQjqa0QypT2JAn4Q8neT7g0nhb.7cB0YD/KamkcZCWg5tjO40i'),
(2, 'jsnsb', 'hsjs', 82120, 'ganja', '$2y$10$joS4r8sLNLu9l/WtgMPtGe.UffjlkAZDMg2jcooOlITAUmu262Dg.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `idProduk` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `namaProduk` varchar(255) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `stok` int(11) NOT NULL,
  `tglInput` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idProduk`, `category_name`, `image`, `namaProduk`, `harga`, `stok`, `tglInput`) VALUES
(6, 'ATK', 'fly', 'pena', '6000', 7, '2024-01-17 14:44:00'),
(7, 'manusia', 'jalu', 'fajri', '6000', 45, '2024-01-18 13:38:00'),
(8, 'ATK', 'jalu', 'stret', '55555', -5, '2024-01-19 14:22:00'),
(9, '', 'hajwj', 'uwuwu', '8', 4, '2024-02-03 21:11:00'),
(20, 'makanan', '246ace72-cdce-4f36-9c4c-d00f96641b7c.jpg', 'endog', '15000', 4, '2024-02-17 11:36:06'),
(21, 'makanan', '246ace72-cdce-4f36-9c4c-d00f96641b7c.jpg', 'endog', '15000', 87, '2024-02-17 11:36:44'),
(22, 'makanan', '', 'endog', '15000', 88, '2024-02-17 11:37:47'),
(23, 'makanan', 'b27bf70e-23ee-4fd3-9190-eeb450849fa4.jpg', 'endog', '15000', 86, '2024-02-17 11:38:34'),
(24, 'makanan', 'b27bf70e-23ee-4fd3-9190-eeb450849fa4.jpg', 'endog', '15000', 88, '2024-02-17 11:39:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` varchar(255) NOT NULL,
  `tgl` datetime NOT NULL,
  `totalSemua` float NOT NULL,
  `idPelanggan` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `tgl`, `totalSemua`, `idPelanggan`, `status`) VALUES
('PJ20240209081725368', '2024-02-09 08:17:25', 62, 1, ''),
('PJ20240209082047771', '2024-02-09 08:20:47', 67.555, 1, ''),
('PJ20240209082629735', '2024-02-09 08:26:29', 67.555, 1, ''),
('PJ20240209083055887', '2024-02-09 08:30:55', 75.441, 1, ''),
('PJ20240209083136108', '2024-02-09 08:31:36', 75.441, 1, ''),
('PJ20240209083406896', '2024-02-09 08:34:06', 75.441, 1, ''),
('PJ20240209083616839', '2024-02-09 08:36:16', 19.886, 1, ''),
('PJ20240211030204686', '2024-02-11 03:02:04', 67.562, 1, ''),
('PJ20240211053016917', '2024-02-11 05:30:16', 61.555, 1, ''),
('PJ20240211053603920', '2024-02-11 05:36:03', 6, 1, ''),
('PJ20240211053947981', '2024-02-11 05:39:47', 6, 1, ''),
('PJ20240211054252201', '2024-02-11 05:42:52', 7.886, 1, ''),
('PJ20240211054927463', '2024-02-11 05:49:27', 6, 1, ''),
('PJ20240211055312539', '2024-02-11 05:53:12', 6, 1, ''),
('PJ20240211055813882', '2024-02-11 05:58:13', 55.555, 1, ''),
('PJ20240211055902216', '2024-02-11 05:59:02', 87.441, 1, ''),
('PJ20240212003055810', '2024-02-12 00:30:55', 60.112, 1, ''),
('PJ20240212143256516', '2024-02-12 14:32:56', 61.555, 1, ''),
('PJ20240213000651953', '2024-02-13 00:06:51', 61.555, 1, ''),
('PJ20240215044130221', '2024-02-15 04:41:31', 42, 1, ''),
('PJ20240218023109602', '2024-02-18 02:31:09', 27, 1, 'dikonfirmasi'),
('PJ20240218050251863', '2024-02-18 05:02:51', 15, 2, 'dikonfirmasi'),
('PJ20240218050648944', '2024-02-18 05:06:48', 97.563, 2, 'panding'),
('PJ20240218050653266', '2024-02-18 05:06:53', 97.563, 2, 'panding'),
('PJ20240218050729749', '2024-02-18 05:07:29', 97.563, 2, 'panding'),
('PJ20240218050746379', '2024-02-18 05:07:46', 30, 2, 'panding'),
('PJ20240218050922922', '2024-02-18 05:09:22', 30, 2, 'panding'),
('PJ20240218051605355', '2024-02-18 05:16:05', 61.571, 2, 'panding'),
('PJ20240218051717388', '2024-02-18 05:17:17', 15, 2, 'panding'),
('PJ20240218123455315', '2024-02-18 12:34:55', 6.008, 2, 'panding'),
('PJ20240218123534552', '2024-02-18 12:35:34', 15, 2, 'panding');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `namaLengkap` varchar(255) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `namaUsers` varchar(100) NOT NULL,
  `pass` varchar(555) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`idUser`, `namaLengkap`, `jk`, `alamat`, `image`, `namaUsers`, `pass`, `level`) VALUES
(4, '', '', '', '', 'andri', '$2y$10$4GxjYdRCMTVMHAwtGm090un6PU7asKaB.RFkTxJ.W9VBjwlFhiGLm', 'petugas'),
(5, '', '', '', '', 'rooter', '$2y$10$tQtzYqpRpm4ZX9niLFpDcecytv0Jcy7fLdClgrBkF6.CWNh0L3tQW', 'admin'),
(6, '', '', '', '', 'asu', '$2y$10$FY4xWvXKKzJx77hezLutz.AzJIuKa9WGrPvsqT9k9sixX6XowzDaq', 'petugas'),
(7, '', '', '', '', 'agis', '$2y$10$B17NK.8SDz7Ql9vOzJLEU.sI/BfpRR8W87MNwlHgO4j7XQV/iJwjq', 'petugas'),
(8, '', '', '', '', 'dranix', '$2y$10$gEC9cD2g6trvN1DbHs6TgOIWQouCBYKofYmGIposArwtI8DgmaIOy', 'admin'),
(9, 'azka alhapiz', 'Laki-Laki', 'nagrog', 'IMG_20240210_150713.jpg', 'azka', '1234', 'petugas'),
(10, 'agis', 'Laki-Laki', 'jshsj', 'Screenshot_20240217_140554.jpg', 'maulana', '$2y$10$dlb.03HTiNvn5WUEFOln6uEx1jt6B2VwurGo8hhhHr5EJZ05V3W9.', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `detailTransaksi`
--
ALTER TABLE `detailTransaksi`
  ADD PRIMARY KEY (`idDetailTransaksi`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idPelanggan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idProduk`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `detailTransaksi`
--
ALTER TABLE `detailTransaksi`
  MODIFY `idDetailTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idPelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
