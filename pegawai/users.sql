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
(7, 'agism', 'Laki-Laki', 'asjgdfhsaflagfhg', 'duajari_1704191701155.png', 'agis', '$2y$10$jrVYUe7IJnFCXXhBCTc5BOwF.kRUUexkZSbx.UjSIIVX9b4Jl85Jy', 'petugas'),
(8, 'Andri Nurjaman', '', 'sumedang', 'hghh', 'dranix', '$2y$10$gEC9cD2g6trvN1DbHs6TgOIWQouCBYKofYmGIposArwtI8DgmaIOy', 'admin'),
(9, 'azka alhapiz', 'Laki-Laki', 'nagrog', 'IMG_20240210_150713.jpg', 'azka', '1234', 'petugas'),
(10, 'agis', 'Laki-Laki', 'jshsj', 'Screenshot_20240217_140554.jpg', 'maulana', '$2y$10$dlb.03HTiNvn5WUEFOln6uEx1jt6B2VwurGo8hhhHr5EJZ05V3W9.', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
