-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 21 Feb 2024 pada 01.18
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
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `penjualanID` varchar(255) NOT NULL,
  `tanggalPenjualan` datetime NOT NULL,
  `totalHarga` decimal(10,2) NOT NULL,
  `pelangganID` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`penjualanID`, `tanggalPenjualan`, `totalHarga`, `pelangganID`, `idUser`) VALUES
('PJ20240209081725368', '2024-02-09 08:17:25', '62.00', 1, 0),
('PJ20240209082047771', '2024-02-09 08:20:47', '67.56', 1, 0),
('PJ20240209082629735', '2024-02-09 08:26:29', '67.56', 1, 0),
('PJ20240209083055887', '2024-02-09 08:30:55', '75.44', 1, 0),
('PJ20240209083136108', '2024-02-09 08:31:36', '75.44', 1, 0),
('PJ20240209083406896', '2024-02-09 08:34:06', '75.44', 1, 0),
('PJ20240209083616839', '2024-02-09 08:36:16', '19.89', 1, 0),
('PJ20240211030204686', '2024-02-11 03:02:04', '67.56', 1, 0),
('PJ20240211053016917', '2024-02-11 05:30:16', '61.56', 1, 0),
('PJ20240211053603920', '2024-02-11 05:36:03', '6.00', 1, 0),
('PJ20240211053947981', '2024-02-11 05:39:47', '6.00', 1, 0),
('PJ20240211054252201', '2024-02-11 05:42:52', '7.89', 1, 0),
('PJ20240211054927463', '2024-02-11 05:49:27', '6.00', 1, 0),
('PJ20240211055312539', '2024-02-11 05:53:12', '6.00', 1, 0),
('PJ20240211055813882', '2024-02-11 05:58:13', '55.56', 1, 0),
('PJ20240211055902216', '2024-02-11 05:59:02', '87.44', 1, 0),
('PJ20240212003055810', '2024-02-12 00:30:55', '60.11', 1, 0),
('PJ20240212143256516', '2024-02-12 14:32:56', '61.56', 1, 0),
('PJ20240213000651953', '2024-02-13 00:06:51', '61.56', 1, 0),
('PJ20240215044130221', '2024-02-15 04:41:31', '42.00', 1, 0),
('PJ20240218023109602', '2024-02-18 02:31:09', '27.00', 1, 0),
('PJ20240218050251863', '2024-02-18 05:02:51', '15.00', 2, 0),
('PJ20240218050648944', '2024-02-18 05:06:48', '97.56', 2, 0),
('PJ20240218050653266', '2024-02-18 05:06:53', '97.56', 2, 0),
('PJ20240218050729749', '2024-02-18 05:07:29', '97.56', 2, 0),
('PJ20240218050746379', '2024-02-18 05:07:46', '30.00', 2, 0),
('PJ20240218050922922', '2024-02-18 05:09:22', '30.00', 2, 0),
('PJ20240218051605355', '2024-02-18 05:16:05', '61.57', 2, 0),
('PJ20240218051717388', '2024-02-18 05:17:17', '15.00', 2, 0),
('PJ20240218123455315', '2024-02-18 12:34:55', '6.01', 2, 0),
('PJ20240218123534552', '2024-02-18 12:35:34', '15.00', 2, 0),
('PJ20240219112007220', '2024-02-19 11:20:07', '6.00', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`penjualanID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
