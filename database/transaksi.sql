-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2021 pada 20.12
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `status_transaksi` varchar(30) DEFAULT NULL,
  `status_pelayanan` varchar(30) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `bayar` int(11) DEFAULT NULL,
  `kembalian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `jumlah_item`, `nama_konsumen`, `tanggal_transaksi`, `total_bayar`, `status_transaksi`, `status_pelayanan`, `id_user`, `bayar`, `kembalian`) VALUES
(1, 1, 'adi', '0000-00-00 00:00:00', 15000, 'selesai', 'selesai', 3, NULL, NULL),
(2, 0, 'pu', '0000-00-00 00:00:00', 0, NULL, NULL, 2, NULL, NULL),
(3, 0, 'akbar', '0000-00-00 00:00:00', 0, NULL, NULL, 2, NULL, NULL),
(4, 3, 'sopono', '0000-00-00 00:00:00', 45000, NULL, NULL, 2, NULL, NULL),
(5, 3, 'sopono', '0000-00-00 00:00:00', 45000, NULL, NULL, 2, NULL, NULL),
(6, 3, 'sopono', '0000-00-00 00:00:00', 45000, NULL, NULL, 2, NULL, NULL),
(7, 3, 'sopono', '0000-00-00 00:00:00', 45000, NULL, NULL, 2, NULL, NULL),
(8, 5, 'asdf', '0000-00-00 00:00:00', 75000, NULL, NULL, 2, NULL, NULL),
(9, 5, 'asdf', '0000-00-00 00:00:00', 75000, NULL, NULL, 2, NULL, NULL),
(10, 5, 'asdf', '0000-00-00 00:00:00', 75000, NULL, NULL, 2, NULL, NULL),
(11, 5, 'asdf', '0000-00-00 00:00:00', 75000, NULL, NULL, 2, NULL, NULL),
(12, 5, 'asdf', '0000-00-00 00:00:00', 75000, NULL, NULL, 2, NULL, NULL),
(13, 5, 'sopono', '0000-00-00 00:00:00', 75000, NULL, NULL, 2, NULL, NULL),
(14, 10, 'sopono', '0000-00-00 00:00:00', 100000, NULL, NULL, 2, NULL, NULL),
(15, 5, 'siapa', '0000-00-00 00:00:00', 75000, 'diterima', NULL, 2, NULL, NULL),
(16, 4, 'sopo', '0000-00-00 00:00:00', 60000, 'diterima', NULL, 2, NULL, NULL),
(17, 5, 'pu', '0000-00-00 00:00:00', 75000, NULL, NULL, 2, NULL, NULL),
(18, 3, 'aku', '0000-00-00 00:00:00', 45000, NULL, NULL, 2, NULL, NULL),
(19, 4, 'siapa', '0000-00-00 00:00:00', 60000, 'diterima', NULL, 2, NULL, NULL),
(20, 2, 'pu', '0000-00-00 00:00:00', 30000, 'SELESAI', NULL, 2, 40000, 10000),
(21, 4, 'aku', '2021-07-04 00:09:39', 60000, 'SELESAI', NULL, 2, 100000, 40000),
(22, 5, 'pu', '2021-07-04 00:24:02', 75000, 'SELESAI', NULL, 2, 90000, NULL),
(23, 6, 'prita', '2021-07-04 01:02:11', 80000, 'SELESAI', NULL, 2, 100000, NULL),
(24, 4, 'aku', '2021-07-04 01:04:35', 60000, 'SELESAI', NULL, 2, 1000000, 940000),
(25, 12, 'kjsadkjas', '2021-07-04 01:11:00', 180000, 'SELESAI', NULL, 2, 2147483647, 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
