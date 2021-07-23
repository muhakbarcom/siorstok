-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2021 pada 15.20
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
-- Database: `si_orstok`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `catatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_menu`, `qty`, `total_bayar`, `tanggal_transaksi`, `catatan`) VALUES
(1, 1, 27, 1, 15000, '2021-07-04 17:24:30', 'catatan'),
(2, 1, 21, 1, 15000, '2021-07-04 17:24:30', 'coba'),
(3, 1, 18, 1, 15000, '2021-07-04 17:24:30', 'ksong'),
(4, 1, 23, 6, 90000, '2021-07-04 17:24:30', ''),
(5, 2, 26, 1, 15000, '2021-07-04 17:28:26', 'coba1'),
(6, 2, 27, 3, 45000, '2021-07-04 17:28:26', 'coba23'),
(7, 2, 28, 1, 15000, '2021-07-04 17:28:26', 'coba2'),
(8, 3, 26, 1, 15000, '2021-07-04 17:30:08', 'ASDSAD'),
(9, 4, 26, 2, 30000, '2021-07-04 17:31:30', 'asdasd'),
(10, 4, 27, 1, 15000, '2021-07-04 17:31:30', 'asdasd'),
(11, 5, 27, 2, 30000, '2021-07-04 17:44:12', 'pedas'),
(12, 5, 28, 2, 30000, '2021-07-04 17:44:12', 'tanpa es'),
(15, 8, 28, 5, 75000, '2021-07-05 19:53:08', 'es'),
(16, 9, 6, 4, 60000, '2021-07-08 21:37:49', 'coba1'),
(17, 9, 28, 2, 30000, '2021-07-08 21:37:49', ''),
(18, 10, 6, 3, 45000, '2021-07-08 21:41:42', 'es'),
(19, 11, 6, 3, 45000, '2021-07-08 21:42:29', 'es'),
(20, 12, 27, 10, 150000, '2021-07-08 21:44:32', 'asdasdasd'),
(21, 13, 27, 10, 150000, '2021-07-08 21:47:49', 'pake es'),
(22, 14, 27, 2, 30000, '2021-07-10 12:21:10', 'coba1'),
(23, 14, 29, 3, 45000, '2021-07-10 12:21:10', '456'),
(24, 15, 27, 1, 15000, '2021-07-10 13:44:52', 'coba1'),
(25, 15, 29, 1, 15000, '2021-07-10 13:44:52', ''),
(26, 16, 27, 1, 15000, '2021-07-10 16:38:14', 'es'),
(27, 16, 29, 3, 45000, '2021-07-10 16:38:14', ''),
(28, 17, 27, 1, 15000, '2021-07-10 16:39:24', ''),
(29, 18, 27, 1, 15000, '2021-07-10 16:40:15', ''),
(30, 19, 27, 1, 15000, '2021-07-10 16:41:26', ''),
(31, 20, 27, 1, 15000, '2021-07-10 16:45:40', 'es'),
(32, 21, 27, 1, 15000, '2021-07-10 16:48:51', ''),
(33, 22, 27, 1, 15000, '2021-07-10 16:56:27', 'ghvjnm'),
(34, 23, 27, 1, 15000, '2021-07-10 20:05:18', 'coba1'),
(35, 24, 6, 3, 45000, '2021-07-10 20:58:35', 'tidak pedas'),
(36, 24, 5, 4, 60000, '2021-07-10 20:58:35', ''),
(37, 25, 5, 3, 45000, '2021-07-10 22:24:17', 'setengah matang'),
(38, 26, 29, 2, 30000, '2021-07-10 22:27:26', 'kopi panas'),
(39, 27, 9, 4, 60000, '2021-07-10 23:13:13', 'pedas'),
(40, 27, 3, 3, 45000, '2021-07-10 23:13:13', 'panas'),
(41, 28, 3, 2, 30000, '2021-07-11 01:17:23', 'Es Dikurangi'),
(42, 28, 29, 3, 45000, '2021-07-11 01:17:23', 'Less Sugar'),
(43, 29, 11, 2, 30000, '2021-07-11 16:04:27', 'Telur setengah matang'),
(44, 29, 35, 3, 24000, '2021-07-11 16:04:27', 'Banyakin Es nya'),
(45, 30, 7, 4, 60000, '2021-07-11 16:07:27', 'Tanpa mie'),
(46, 30, 6, 3, 45000, '2021-07-11 16:07:27', 'Tanpan mie'),
(47, 31, 5, 5, 75000, '2021-07-11 17:01:23', 'goreng kering'),
(48, 32, 43, 3, 45000, '2021-07-11 17:10:21', 'Pedas'),
(49, 33, 7, 1, 15000, '2021-07-11 20:21:19', 'Tanpa mie'),
(50, 33, 4, 1, 15000, '2021-07-11 20:21:19', 'Mie setengah matang'),
(51, 33, 5, 1, 15000, '2021-07-11 20:21:19', ''),
(52, 33, 28, 1, 15000, '2021-07-11 20:21:19', 'Esnya dikurangi'),
(53, 33, 29, 1, 15000, '2021-07-11 20:21:19', ''),
(54, 33, 34, 1, 3500, '2021-07-11 20:21:19', 'Pakai es sedikit'),
(55, 34, 42, 1, 5000, '2021-07-11 20:41:57', ''),
(56, 34, 43, 1, 15000, '2021-07-11 20:41:57', 'goreng kering'),
(57, 35, 7, 1, 15000, '2021-07-11 22:51:53', 'Tanpa sayur'),
(58, 35, 6, 1, 15000, '2021-07-11 22:51:53', 'Tambah cabe'),
(59, 36, 9, 3, 45000, '2021-07-12 18:13:56', 'Kuah Sedikit'),
(60, 37, 8, 4, 60000, '2021-07-12 18:16:38', 'Mienya setengah matang'),
(61, 37, 9, 1, 15000, '2021-07-12 18:16:38', 'Mienya setengah matang'),
(62, 37, 42, 1, 5000, '2021-07-12 18:16:38', 'goreng garing'),
(63, 38, 42, 3, 15000, '2021-04-12 21:06:34', ''),
(64, 38, 41, 3, 15000, '2021-04-12 21:06:34', ''),
(65, 38, 39, 2, 30000, '2021-04-12 21:06:34', ''),
(66, 40, 37, 3, 45000, '2021-05-12 21:13:12', 'pedas'),
(67, 40, 36, 2, 30000, '2021-05-12 21:13:12', 'sedang'),
(68, 41, 8, 1, 15000, '2021-06-01 21:14:18', 'pedas'),
(69, 41, 42, 3, 15000, '2021-06-01 21:14:18', ''),
(70, 41, 41, 1, 5000, '2021-06-01 21:14:18', ''),
(71, 42, 40, 3, 60000, '2021-07-13 11:15:22', 'jangan terlalu manis'),
(72, 42, 45, 2, 30000, '2021-07-13 11:15:22', ''),
(73, 43, 48, 3, 60000, '2021-07-13 11:45:08', ''),
(74, 43, 43, 1, 15000, '2021-07-13 11:45:08', ''),
(75, 43, 40, 1, 20000, '2021-07-13 11:45:08', ''),
(76, 43, 45, 1, 15000, '2021-07-13 11:45:08', ''),
(77, 44, 48, 1, 20000, '2021-07-13 14:25:52', ''),
(78, 44, 47, 1, 15000, '2021-07-13 14:25:52', ''),
(79, 45, 51, 4, 60000, '2021-07-14 10:56:14', ''),
(80, 45, 43, 1, 15000, '2021-07-14 10:56:14', ''),
(81, 46, 51, 4, 60000, '2021-07-14 12:00:47', ''),
(82, 47, 36, 4, 60000, '2021-07-14 12:08:15', 'Tidak usah telur'),
(83, 48, 36, 4, 60000, '2021-07-14 12:10:56', 'Tidak usah telur'),
(84, 49, 36, 1, 15000, '2021-07-14 12:59:11', ''),
(85, 50, 36, 100, 1500000, '2021-07-14 13:05:39', ''),
(86, 51, 36, 11, 165000, '2021-07-14 13:16:56', ''),
(87, 52, 36, 78, 1170000, '2021-07-14 13:21:56', ''),
(88, 53, 36, 1, 15000, '2021-07-14 13:38:43', ''),
(89, 54, 36, 1, 15000, '2021-07-14 13:42:19', ''),
(90, 55, 36, 1, 15000, '2021-07-14 13:44:25', ''),
(91, 56, 51, 1, 15000, '2021-07-14 14:55:56', ''),
(92, 57, 41, 3, 15000, '2021-07-14 15:03:48', ''),
(93, 58, 47, 1, 15000, '2021-07-14 15:06:56', ''),
(94, 59, 46, 1, 5000, '2021-07-14 15:08:17', ''),
(95, 60, 47, 3, 45000, '2021-07-14 22:57:52', ''),
(96, 60, 45, 5, 75000, '2021-07-14 22:57:52', ''),
(97, 60, 43, 4, 60000, '2021-07-14 22:57:52', ''),
(98, 60, 49, 3, 45000, '2021-07-14 22:57:52', ''),
(99, 60, 28, 3, 45000, '2021-07-14 22:57:52', ''),
(100, 61, 11, 3, 45000, '2021-07-15 01:42:39', ''),
(101, 61, 40, 3, 60000, '2021-07-15 01:42:39', ''),
(102, 62, 51, 1, 15000, '2021-07-15 11:30:16', ''),
(103, 62, 47, 1, 15000, '2021-07-15 11:30:16', ''),
(104, 62, 46, 1, 5000, '2021-07-15 11:30:16', ''),
(105, 62, 45, 1, 15000, '2021-07-15 11:30:16', ''),
(106, 63, 41, 1, 5000, '2021-07-15 11:46:05', ''),
(107, 63, 46, 1, 5000, '2021-07-15 11:46:05', ''),
(108, 64, 51, 1, 15000, '2021-07-15 11:50:33', ''),
(109, 64, 45, 1, 15000, '2021-07-15 11:50:33', ''),
(110, 64, 43, 1, 15000, '2021-07-15 11:50:33', ''),
(111, 65, 45, 3, 45000, '2021-07-15 23:01:01', ''),
(112, 65, 43, 1, 15000, '2021-07-15 23:01:01', ''),
(113, 66, 8, 3, 45000, '2021-07-16 21:15:29', 'Mienya setengah matang'),
(114, 66, 51, 1, 15000, '2021-07-16 21:15:29', ''),
(115, 67, 46, 1, 5000, '2021-07-16 21:42:38', ''),
(116, 67, 45, 1, 15000, '2021-07-16 21:42:38', ''),
(117, 68, 49, 3, 45000, '2021-07-16 22:45:51', 'kurangi gula'),
(118, 68, 40, 1, 20000, '2021-07-16 22:45:51', ''),
(120, 70, 36, 3, 45000, '2021-07-17 00:59:33', ''),
(121, 70, 9, 1, 15000, '2021-07-17 00:59:33', ''),
(122, 71, 36, 2, 30000, '2021-07-17 01:37:33', ''),
(123, 71, 51, 1, 15000, '2021-07-17 01:37:33', ''),
(124, 71, 40, 3, 60000, '2021-07-17 01:37:33', ''),
(125, 71, 39, 1, 15000, '2021-07-17 01:37:33', ''),
(126, 72, 9, 3, 45000, '2021-07-17 12:05:35', 'Mienya setengah matang'),
(127, 72, 37, 1, 15000, '2021-07-17 12:05:35', ''),
(128, 73, 35, 1, 8000, '2021-07-17 12:50:14', ''),
(129, 73, 28, 1, 15000, '2021-07-17 12:50:14', ''),
(130, 74, 39, 3, 45000, '2021-07-17 14:31:40', ''),
(131, 74, 2, 1, 15000, '2021-07-17 14:31:40', 'Less Sugar'),
(132, 75, 9, 3, 45000, '2021-07-17 18:54:55', 'Mienya setengah matang'),
(133, 75, 7, 3, 45000, '2021-07-17 18:54:55', ''),
(134, 75, 40, 1, 20000, '2021-07-17 18:54:55', ''),
(135, 76, 41, 1, 5000, '2021-07-17 18:55:31', ''),
(136, 76, 39, 1, 15000, '2021-07-17 18:55:31', ''),
(137, 77, 49, 1, 15000, '2021-07-17 18:58:24', ''),
(138, 78, 37, 1, 15000, '2021-07-17 19:06:34', 'tambah bumubu'),
(139, 78, 36, 3, 45000, '2021-07-17 19:06:34', ''),
(140, 79, 9, 2, 30000, '2021-07-17 23:33:51', ''),
(141, 79, 51, 1, 15000, '2021-07-17 23:33:51', ''),
(142, 80, 45, 2, 30000, '2021-07-17 23:43:17', ''),
(143, 80, 42, 1, 5000, '2021-07-17 23:43:17', ''),
(144, 81, 6, 1, 15000, '2021-07-18 00:54:19', '');

--
-- Trigger `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `trigger_stok_menu` AFTER INSERT ON `detail_transaksi` FOR EACH ROW BEGIN
UPDATE stok_menu
SET terjual = terjual+new.qty, sisa = stok_menu.jumlah_stok_menu-terjual
WHERE id_menu= new.id_menu
;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'Pemilik', 'Owner'),
(2, 'Kasir', 'Pelayanan Transaksi'),
(32, 'Koki', 'Pelayanan Pemesanan'),
(33, 'Operator', 'Pengelola Menu Food and Beverage');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups_menu`
--

CREATE TABLE `groups_menu` (
  `id_groups` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups_menu`
--

INSERT INTO `groups_menu` (`id_groups`, `id_menu`) VALUES
(1, 8),
(1, 89),
(1, 91),
(4, 91),
(1, 93),
(1, 94),
(1, 43),
(1, 44),
(1, 42),
(1, 125),
(2, 125),
(7, 125),
(8, 125),
(17, 125),
(18, 125),
(24, 125),
(26, 125),
(28, 125),
(29, 125),
(1, 114),
(1, 120),
(32, 118),
(1, 92),
(32, 92),
(33, 92),
(1, 3),
(2, 3),
(32, 3),
(33, 3),
(1, 1),
(2, 1),
(32, 1),
(33, 1),
(1, 107),
(33, 125),
(33, 126),
(33, 119),
(2, 121),
(2, 122),
(32, 123),
(32, 124),
(1, 115),
(1, 116),
(1, 127),
(2, 127),
(1, 129),
(0, 40),
(1, 130),
(2, 130),
(32, 130),
(33, 130),
(1, 131),
(2, 131),
(32, 131),
(33, 131);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 99,
  `level` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(125) NOT NULL,
  `label` varchar(25) NOT NULL,
  `link` varchar(125) NOT NULL,
  `id` varchar(25) NOT NULL DEFAULT '#',
  `id_menu_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `sort`, `level`, `parent_id`, `icon`, `label`, `link`, `id`, `id_menu_type`) VALUES
(1, 0, 1, 0, 'empty', 'MAIN NAVIGATION', '#', '#', 1),
(3, 5, 2, 1, 'fas fa-tachometer-alt', 'Dashboard', 'dashboard', '#', 1),
(4, 22, 2, 40, 'fas fa-table', 'CRUD Generator', 'crudbuilder', '1', 1),
(8, 20, 2, 40, 'fas fa-bars', 'Menu', 'cms/menu/side-menu', 'navMenu', 1),
(40, 17, 1, 0, 'empty', 'DEV', '#', '#', 1),
(42, 23, 2, 40, 'fas fa-users-cog', 'User', '#', '1', 1),
(43, 24, 3, 42, 'fas fa-angle-double-right', 'Users', 'users', '1', 1),
(44, 25, 3, 42, 'fas fa-angle-double-right', 'Groups', 'groups', '2', 1),
(89, 21, 2, 40, 'fas fa-th-list', 'Menu Type', 'menu_type', 'menu_type', 1),
(92, 11, 1, 0, 'empty', 'MASTER DATA', '#', 'masterdata', 1),
(107, 18, 2, 40, 'fas fa-cog', 'Setting', 'setting', 'setting', 1),
(109, 19, 2, 40, 'fas fa-align-justify', 'Frontend Menu', 'frontend_menu', 'Frontend Menu', 1),
(114, 16, 2, 92, 'fas fa-address-card', 'Kelola User', 'users', '1', 1),
(115, 10, 3, 120, 'fas fa-align-justify', 'Laporan Stok Menu', 'rekapan_stok', 'lap.stok', 1),
(116, 7, 3, 120, 'fas fa-align-justify', 'History Penjualan', 'view_laporan_penjualan', '#', 1),
(118, 15, 2, 92, 'fas fa-book-open', 'Kelola Stok Menu', 'stok_menu', '1', 1),
(119, 12, 2, 92, 'fas fa-coffee', 'Kelola Menu Food and Bvrg', 'Menu_fb', '1', 1),
(120, 6, 2, 1, 'far fa-file-alt', 'Laporan', '#', '1', 1),
(121, 1, 2, 1, 'fas fa-dollar-sign', 'Transaksi Masuk', 'transaksi/masuk', '1', 1),
(122, 2, 2, 1, 'fas fa-check-circle', 'Transaksi Selesai', 'transaksi_selesai', '1', 1),
(123, 3, 2, 1, 'fas fa-bell', 'Pesanan Masuk', 'transaksi/koki_masuk', '1', 1),
(124, 4, 2, 1, 'far fa-check-circle', 'Pesanan Selesai', 'transaksi/koki_selesai', '1', 1),
(125, 13, 3, 119, 'fas fa-book-open', 'Food', 'menu_fb/food', '1', 1),
(126, 14, 3, 119, 'fas fa-book-open', 'Beverage', 'menu_fb/beverage', '1', 1),
(127, 8, 3, 120, 'far fa-chart-bar', 'Laporan Penjualan Harian', 'view_laporan_harian', '#', 1),
(129, 9, 3, 120, 'fab fa-accusoft', 'Laporan Penjualan Bulanan', 'View_laporan_bulanan', '1', 1),
(130, 26, 1, 0, 'fas fa-align-justify', 'Auth', '#', '#', 1),
(131, 27, 2, 130, 'fas fa-sign-out-alt', 'Logout', 'auth/logout', '#', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_food_and_beverage`
--

CREATE TABLE `menu_food_and_beverage` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `gambar` varchar(20) NOT NULL,
  `kategori_menu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_food_and_beverage`
--

INSERT INTO `menu_food_and_beverage` (`id_menu`, `nama_menu`, `harga_menu`, `gambar`, `kategori_menu`) VALUES
(2, 'Expresso', 15000, 'menu_(2).jpg', 'Beverage'),
(4, 'Indomie Kornet', 15000, 'gambar_(9).jpg', 'Food'),
(5, 'Cireng', 15000, 'gambar_(6).jpg', 'Food'),
(6, 'Baci', 15000, 'menu_(9).jpg', 'Food'),
(7, 'Bakso', 15000, 'gambar_(5).jpg', 'Food'),
(8, 'Mie Goreng', 15000, 'menu_(10).jpg', 'Food'),
(9, 'Mie Rebus', 15000, 'Mie_Kuah.jpg', 'Food'),
(11, 'Mie Rebus  Telur', 15000, 'r.jpg', 'Food'),
(28, 'Lemon tea', 15000, 'menu_(3).jpg', 'Beverage'),
(29, 'Coffee Late', 15000, 'menu_(4).jpg', 'Beverage'),
(34, 'Teh Manis', 3500, 'menu_(5).jpg', 'Beverage'),
(35, 'Milo', 8000, 'menu_(6).jpg', 'Beverage'),
(36, 'Siomay', 15000, 'gambar_(11).jpg', 'Food'),
(37, 'Batagor', 15000, 'gambar_(12).jpg', 'Food'),
(39, 'Kopi Susu', 15000, 'menu_(7).jpg', 'Beverage'),
(40, 'Vanilla Greentea', 20000, 'menu_(8).jpg', 'Beverage'),
(41, 'Cilok', 5000, 'gambar_(13).jpg', 'Food'),
(42, 'Kroket', 5000, 'gambar_(3).jpg', 'Food'),
(43, 'Pangsit', 15000, 'gambar_(1).jpg', 'Food'),
(45, 'lasagna', 15000, 'makanan_(1).jpg', 'Food'),
(46, 'Mlinjo', 5000, 'makanan_(2).jpg', 'Food'),
(49, 'Red Velvet', 15000, 'menu_(11).jpg', 'Beverage'),
(51, 'Choco Cookies', 15000, 'menu1.jpg', 'Food'),
(54, 'Makaroni', 20000, 'menu_(8)1.jpg', 'Food'),
(55, 'Makaroni', 15000, 'indomie_rebus.jpg', 'Food'),
(56, 'Makaroni', 15000, 'makanan_(2)1.jpg', 'Food'),
(58, 'Teh Hangat', 20000, 'menu_(5)1.jpg', 'Beverage');

--
-- Trigger `menu_food_and_beverage`
--
DELIMITER $$
CREATE TRIGGER `t_hapus_menu` AFTER DELETE ON `menu_food_and_beverage` FOR EACH ROW BEGIN
DELETE FROM stok_menu
WHERE id_menu= OLD.id_menu
;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_type`
--

CREATE TABLE `menu_type` (
  `id_menu_type` int(11) NOT NULL,
  `type` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu_type`
--

INSERT INTO `menu_type` (`id_menu_type`, `type`) VALUES
(1, 'Side menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekapan_stok`
--

CREATE TABLE `rekapan_stok` (
  `id_rekapan_stok` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `stok_terjual` int(11) NOT NULL,
  `stok_sisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekapan_stok`
--

INSERT INTO `rekapan_stok` (`id_rekapan_stok`, `id_menu`, `nama_menu`, `tanggal_penjualan`, `stok_terjual`, `stok_sisa`) VALUES
(31, 46, 'Mlinjo', '2021-07-14', 1, 299),
(32, 47, 'Makaroni', '2021-07-14', 5, 295),
(33, 45, 'lasagna', '2021-07-14', 8, 292),
(34, 43, 'Pangsit', '2021-07-14', 10, 290),
(35, 49, 'Red Velvet', '2021-07-14', 3, 317),
(36, 28, 'Lemon tea', '2021-07-14', 4, 296),
(37, 11, 'Mie Rebus  Telur', '2021-07-15', 5, 295),
(38, 40, 'Vanilla Greentea', '2021-07-15', 7, 303),
(39, 51, 'Choco Cookies', '2021-07-15', 11, 289),
(40, 47, 'Makaroni', '2021-07-15', 6, 294),
(41, 46, 'Mlinjo', '2021-07-15', 3, 297),
(42, 45, 'lasagna', '2021-07-15', 13, 287),
(43, 41, 'Cilok', '2021-07-15', 8, 292),
(44, 43, 'Pangsit', '2021-07-15', 12, 288),
(45, 8, 'Mie Goreng', '2021-07-16', 8, 292),
(46, 51, 'Choco Cookies', '2021-07-16', 12, 288),
(47, 46, 'Mlinjo', '2021-07-16', 4, 296),
(48, 45, 'lasagna', '2021-07-16', 14, 286),
(49, 49, 'Red Velvet', '2021-07-16', 6, 314),
(50, 40, 'Vanilla Greentea', '2021-07-16', 8, 302),
(51, 36, 'Siomay', '2021-07-17', 211, 89),
(52, 9, 'Mie Rebus', '2021-07-17', 13, 287),
(53, 51, 'Choco Cookies', '2021-07-17', 14, 286),
(54, 40, 'Vanilla Greentea', '2021-07-17', 12, 298),
(55, 39, 'Kopi Susu', '2021-07-17', 7, 343),
(56, 37, 'Batagor', '2021-07-17', 5, 295),
(57, 35, 'Milo', '2021-07-17', 4, 296),
(58, 28, 'Lemon tea', '2021-07-17', 5, 295),
(59, 2, 'Expresso', '2021-07-17', 1, 299),
(60, 7, 'Bakso', '2021-07-17', 9, 291),
(61, 41, 'Cilok', '2021-07-17', 9, 291),
(62, 49, 'Red Velvet', '2021-07-17', 7, 313),
(63, 45, 'lasagna', '2021-07-17', 16, 284),
(64, 42, 'Kroket', '2021-07-17', 9, 291),
(65, 6, 'Baci', '2021-07-18', 5, 295);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nilai` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `kode`, `nama`, `nilai`) VALUES
(1, 'iconfinder_coffee-04_3535188.png', 'SI ORSTOK', 'Jl. Raya Lama No. 80');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_menu`
--

CREATE TABLE `stok_menu` (
  `id_stok_menu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_stok_menu` int(11) NOT NULL,
  `terjual` int(11) NOT NULL,
  `sisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok_menu`
--

INSERT INTO `stok_menu` (`id_stok_menu`, `id_menu`, `jumlah_stok_menu`, `terjual`, `sisa`) VALUES
(15, 4, 600, 1, 599),
(16, 2, 300, 1, 299),
(17, 5, 300, 6, 294),
(18, 6, 300, 5, 295),
(19, 7, 300, 9, 291),
(20, 8, 300, 8, 292),
(21, 9, 300, 13, 287),
(22, 11, 300, 5, 295),
(23, 35, 300, 4, 296),
(24, 28, 300, 5, 295),
(25, 29, 300, 1, 299),
(26, 34, 300, 1, 299),
(28, 36, 300, 211, 89),
(29, 37, 300, 5, 295),
(30, 39, 350, 7, 343),
(31, 40, 310, 12, 298),
(32, 41, 300, 9, 291),
(33, 42, 300, 9, 291),
(34, 43, 300, 12, 288),
(36, 45, 300, 16, 284),
(37, 46, 300, 4, 296),
(40, 49, 320, 7, 313),
(41, 51, 300, 14, 286);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `status_transaksi` varchar(50) DEFAULT 'Belum Diterima',
  `status_pelayanan` varchar(50) DEFAULT 'Pesanan diterima',
  `total_bayar` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `nama_konsumen`, `qty`, `tanggal_transaksi`, `status_transaksi`, `status_pelayanan`, `total_bayar`, `bayar`, `kembalian`) VALUES
(1, 2, 'Hmm', 9, '2021-07-04 17:24:30', 'SELESAI', 'Selesai', 135000, 140000, 5000),
(2, 2, 'NAZZILLA', 5, '2021-07-04 17:28:26', NULL, NULL, 75000, 0, 0),
(3, 2, 'ASDASD', 1, '2021-07-04 17:30:08', NULL, NULL, 15000, 0, 0),
(4, 2, 'asdasd', 3, '2021-07-04 17:31:30', 'SELESAI', 'Selesai', 45000, 100000, 55000),
(5, 13, 'NAZZILLA AULIYA', 4, '2021-07-04 17:44:12', 'SELESAI', 'Selesai', 60000, 100000, 40000),
(6, 2, 'nazz', 5, '2021-07-05 19:48:07', 'SELESAI', 'Selesai', 75000, 100000, 25000),
(7, 2, 'nazz', 5, '2021-07-05 19:52:02', 'SELESAI', 'Selesai', 75000, 100000, 25000),
(8, 2, 'nazz', 5, '2021-07-05 19:53:08', 'SELESAI', 'Selesai', 75000, 1000000, 925000),
(9, 2, 'NAZZILLA AP 1', 6, '2021-07-08 21:37:49', 'SELESAI', 'Selesai', 90000, 100000, 10000),
(10, 2, 'nazzill', 3, '2021-07-08 21:41:42', 'SELESAI', 'Selesai', 45000, 100000, 55000),
(11, 2, 'nazzill', 3, '2021-07-08 21:42:29', 'SELESAI', 'Selesai', 45000, 1000000, 955000),
(12, 2, 'NAZZILLA', 10, '2021-07-08 21:44:32', 'SELESAI', 'Selesai', 150000, 150000, 0),
(13, 2, 'Pu3', 10, '2021-07-08 21:47:49', 'SELESAI', 'Selesai', 150000, 150000, 0),
(14, 2, 'PUTRI', 5, '2021-07-10 12:21:10', 'SELESAI', 'Selesai', 75000, 100000, 25000),
(15, 2, 'auliya putri', 2, '2021-07-10 13:44:52', 'SELESAI', 'Selesai', 30000, 150000, 120000),
(16, 2, 'aya', 4, '2021-07-10 16:38:14', 'Selesai', 'Selesai', 60000, 0, 0),
(17, 2, 'u', 1, '2021-07-10 16:39:24', 'Selesai', 'Selesai', 15000, 0, 0),
(18, 2, '', 1, '2021-07-10 16:40:15', 'SELESAI', 'Selesai', 15000, 20000, 5000),
(19, 2, 'jjj', 1, '2021-07-10 16:41:26', 'SELESAI', 'Selesai', 15000, 80000, 65000),
(20, 2, 'jbjbkj', 1, '2021-07-10 16:45:40', 'SELESAI', 'Selesai', 15000, 30000, 15000),
(21, 2, 'jhbjnk', 1, '2021-07-10 16:48:51', 'SELESAI', 'Selesai', 15000, 50000, 35000),
(22, 2, 'rtyui', 1, '2021-07-10 16:56:27', 'SELESAI', 'Selesai', 15000, 100000, 85000),
(23, 2, 'Azza', 1, '2021-07-10 20:05:18', 'SELESAI', 'Selesai', 15000, 30000, 15000),
(24, 2, 'zaza', 7, '2021-07-10 20:58:35', 'SELESAI', 'Selesai', 105000, 110000, 5000),
(25, 2, 'IZZA', 3, '2021-07-10 22:24:17', 'SELESAI', 'Selesai', 45000, 100000, 55000),
(26, 2, 'aliyah', 2, '2021-07-10 22:27:26', 'SELESAI', 'Selesai', 30000, 100000, 70000),
(27, 13, 'NAZZILLA Putri', 7, '2021-07-10 23:13:13', 'SELESAI', 'Selesai', 105000, 120000, 15000),
(28, 2, 'Anisa', 5, '2021-07-11 01:17:23', 'SELESAI', 'Selesai', 75000, 150000, 75000),
(29, 2, 'Sarah', 5, '2021-07-11 16:04:27', 'SELESAI', 'Selesai', 54000, 60000, 6000),
(30, 2, 'Lutfi', 7, '2021-07-11 16:07:27', 'SELESAI', 'Selesai', 105000, 120000, 15000),
(31, 2, 'Bilal', 5, '2021-07-11 17:01:23', 'SELESAI', 'Selesai', 75000, 100000, 25000),
(32, 2, 'Riri', 3, '2021-07-11 17:10:21', 'SELESAI', 'Selesai', 45000, 50000, 5000),
(33, 12, 'Nazzilla', 6, '2021-07-11 20:21:19', 'SELESAI', 'Selesai', 78500, 100000, 21500),
(34, 2, 'Shabira', 2, '2021-07-11 20:41:57', 'SELESAI', 'Selesai', 20000, 0, 0),
(35, 2, 'Aditya', 2, '2021-07-11 22:51:53', 'SELESAI', 'Selesai', 30000, 100000, 70000),
(36, 12, 'Nazzilla Auliya', 3, '2021-07-12 18:13:56', 'SELESAI', 'Selesai', 45000, 50000, 5000),
(37, 2, 'Aqila', 6, '2021-07-12 18:16:38', 'SELESAI', 'Selesai', 80000, 120000, 40000),
(38, 2, '', 8, '2021-04-12 21:06:34', 'SELESAI', 'Selesai', 60000, 100000, 40000),
(40, 2, 'nazzill', 5, '2021-05-12 21:13:12', 'SELESAI', 'Selesai', 75000, 0, 0),
(41, 2, 'NAZZILLA1', 5, '2021-06-01 21:14:18', 'SELESAI', 'Selesai', 35000, 0, 0),
(42, 12, 'Azzahra', 5, '2021-07-13 11:15:22', 'SELESAI', 'Selesai', 90000, 100000, 10000),
(43, 13, 'Fitriani', 6, '2021-07-13 11:45:08', 'SELESAI', 'Selesai', 110000, 120000, 10000),
(44, 14, 'Rianti', 2, '2021-07-13 14:25:52', 'SELESAI', 'Selesai', 35000, 120000, 85000),
(45, 13, 'Tata', 5, '2021-07-14 10:56:14', 'SELESAI', 'Selesai', 75000, 80000, 5000),
(46, 2, 'Yanti', 4, '2021-07-14 12:00:47', 'SELESAI', 'Selesai', 60000, 56000, -4000),
(47, 2, 'Adit', 4, '2021-07-14 12:08:15', 'SELESAI', 'Selesai', 60000, 100000, 40000),
(48, 2, 'azizah', 4, '2021-07-14 12:10:56', 'SELESAI', 'Selesai', 60000, 120000, 60000),
(49, 2, 'asdf', 1, '2021-07-14 12:59:11', 'SELESAI', 'Selesai', 15000, 100000, 85000),
(50, 2, 'asd', 100, '2021-07-14 13:05:39', 'SELESAI', 'Selesai', 1500000, 1600000, 100000),
(51, 2, 'siapa', 11, '2021-07-14 13:16:56', 'SELESAI', 'Selesai', 165000, 1000000, 835000),
(52, 2, 'titi', 78, '2021-07-14 13:21:56', 'SELESAI', 'Selesai', 1170000, 2147483647, 2147483647),
(53, 2, 'Rita', 1, '2021-07-14 13:38:43', 'SELESAI', 'Selesai', 15000, 100000, 85000),
(54, 2, 'tita', 1, '2021-07-14 13:42:19', 'SELESAI', 'Selesai', 15000, 100000, 85000),
(55, 2, 'tita', 1, '2021-07-14 13:44:25', 'SELESAI', 'Selesai', 15000, 20000, 5000),
(56, 2, 'Anya', 1, '2021-07-14 14:55:56', 'SELESAI', 'Selesai', 15000, 100000, 85000),
(57, 2, 'riris', 3, '2021-07-14 15:03:48', 'SELESAI', 'Selesai', 15000, 100000, 85000),
(58, 13, 'akbar', 1, '2021-07-14 15:06:56', 'SELESAI', 'Selesai', 15000, 120000, 105000),
(59, 2, 'akbar', 1, '2021-07-14 15:08:17', 'SELESAI', 'Selesai', 5000, 100000, 95000),
(60, 2, 'Farah', 18, '2021-07-14 22:57:52', 'SELESAI', 'Selesai', 270000, 300000, 30000),
(61, 2, 'syifa', 6, '2021-07-15 01:42:39', 'SELESAI', 'Selesai', 105000, 120000, 15000),
(62, 2, 'cica', 4, '2021-07-15 11:30:16', 'SELESAI', 'Selesai', 50000, 120000, 70000),
(63, 2, 'gaga', 2, '2021-07-15 11:46:05', 'SELESAI', 'Selesai', 10000, 120000, 110000),
(64, 2, 'taras', 3, '2021-07-15 11:50:33', 'SELESAI', 'Selesai', 45000, 50000, 5000),
(65, 2, 'tipal', 4, '2021-07-15 23:01:01', 'SELESAI', 'Selesai', 60000, 120000, 60000),
(66, 2, 'Ilsyah', 4, '2021-07-16 21:15:29', 'SELESAI', 'Selesai', 60000, 70000, 10000),
(67, 14, 'yaya', 2, '2021-07-16 21:42:38', 'SELESAI', 'Selesai', 20000, 120000, 100000),
(68, 2, 'iyah', 4, '2021-07-16 22:45:51', 'SELESAI', 'Selesai', 65000, 65000, 0),
(69, 2, 'zara', 4, '2021-07-17 00:58:06', 'SELESAI', 'Selesai', 60000, 130000, 70000),
(70, 2, 'zara', 4, '2021-07-17 00:59:33', 'SELESAI', 'Selesai', 60000, 120000, 60000),
(71, 2, 'Diah', 7, '2021-07-17 01:37:33', 'SELESAI', 'Selesai', 120000, 120000, 0),
(72, 2, 'raisa', 4, '2021-07-17 12:05:35', 'SELESAI', 'Selesai', 60000, 70000, 10000),
(73, 2, 'Yuni', 2, '2021-07-17 12:50:14', 'SELESAI', 'Selesai', 23000, 25000, 2000),
(74, 2, 'Shabira', 4, '2021-07-17 14:31:40', 'SELESAI', 'Selesai', 60000, 65000, 0),
(75, 2, 'resa', 7, '2021-07-17 18:54:55', 'SELESAI', 'Selesai', 110000, 120000, 10000),
(76, 2, 'Rara', 2, '2021-07-17 18:55:31', 'SELESAI', 'Selesai', 20000, 120000, 100000),
(77, 2, 'garga', 1, '2021-07-17 18:58:24', 'SELESAI', 'Selesai', 15000, 15000, 0),
(78, 2, 'xyz', 4, '2021-07-17 19:06:34', 'SELESAI', 'Selesai', 60000, 100000, 40000),
(79, 2, 'zidny', 3, '2021-07-17 23:33:51', 'SELESAI', 'Selesai', 45000, 50000, 5000),
(80, 2, 'yani', 3, '2021-07-17 23:43:17', 'SELESAI', 'Pesanan diterima', 35000, 120000, 85000),
(81, 2, 'Gigi', 1, '2021-07-18 00:54:19', 'SELESAI', 'Pesanan diterima', 15000, 15000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `image` varchar(128) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `active`, `first_name`, `last_name`, `image`) VALUES
(2, 'kasir', '$2y$08$LUzQbkQWNLUEEemkyjPSj.VXzKOR3QsSQ8s0R3WfpLKk6kUU.4YZi', 'kasir@gmail.com', 1, 'Kasir', '01', 'iconfinder_General_Office_37_25308161.png'),
(12, 'operator', '$2y$08$aYyTwtIXFh77Nq/.QsrYAuVBzwhvt/jIUx0KiiFZHGTzgTsSv3A.2', 'operator@gmail.com', 1, 'Operator', '01', 'iconfinder_General_Office_37_25308162.png'),
(13, 'koki', '$2y$08$y4yUCASegeQwVtRBXbDvOurDJEX4CCnExO3bANzCSY20B7c0oIiSy', 'koki@gmail.com', 1, 'Koki', '01', 'iconfinder_General_Office_37_2530816.png'),
(14, 'pemilik', '$2y$08$7KeUX66G.HcftzngXm/rCuiSte3mFAmLO3N2Nb8vceTEOcVFhfXc2', 'pemilik1@gmail.com', 1, 'Pemilik', '01', 'iconfinder_General_Office_37_25308163.png'),
(35, 'anastasyaa', '$2y$08$XN2kPxLknFixJBRJ6YGSZOxvzyUV.dhYEFX.KiEtv190Vtd9Tgr7u', 'anastasya@gmail.com', 1, 'Anastasya', 'Auliyaa', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(99, 2, 2),
(11, 3, 2),
(10, 4, 2),
(13, 5, 8),
(17, 6, 5),
(19, 7, 6),
(21, 8, 7),
(1, 9, 17),
(95, 12, 33),
(98, 13, 32),
(102, 14, 1),
(152, 35, 2),
(71, 35, 7),
(61, 36, 29),
(62, 37, 2),
(63, 38, 2),
(88, 39, 31),
(89, 40, 2);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_laporan_bulanan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_laporan_bulanan` (
`tanggal_transaksi` varchar(7)
,`jumlah_items` bigint(21)
,`qty_terjual` decimal(32,0)
,`total_pendapatan` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_laporan_harian`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_laporan_harian` (
`tanggal_transaksi` varchar(10)
,`jumlah_items` bigint(21)
,`qty_terjual` decimal(32,0)
,`total_pendapatan` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_laporan_penjualan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_laporan_penjualan` (
`tanggal_transaksi` varchar(10)
,`kode_nota` varchar(14)
,`nama_konsumen` varchar(50)
,`jumlah_items` bigint(21)
,`qty` int(11)
,`total_bayar` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_menu_favorit`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_menu_favorit` (
`nama_menu` varchar(50)
,`Stok_terjual` decimal(32,0)
,`gambar` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_menu_terbaru`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_menu_terbaru` (
`nama_menu` varchar(50)
,`gambar` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_transaksi_selesai`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_transaksi_selesai` (
`id_transaksi` int(11)
,`nama_konsumen` varchar(50)
,`status_transaksi` varchar(50)
,`tanggal_transaksi` datetime
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_laporan_bulanan`
--
DROP TABLE IF EXISTS `view_laporan_bulanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_laporan_bulanan`  AS  (select substr(`transaksi`.`tanggal_transaksi`,1,7) AS `tanggal_transaksi`,(select count(`detail_transaksi`.`id_detail_transaksi`) from `detail_transaksi` where substr(`transaksi`.`tanggal_transaksi`,1,7) = substr(`detail_transaksi`.`tanggal_transaksi`,1,7)) AS `jumlah_items`,sum(`transaksi`.`qty`) AS `qty_terjual`,sum(`transaksi`.`total_bayar`) AS `total_pendapatan` from `transaksi` where `transaksi`.`status_transaksi` = 'SELESAI' group by substr(`transaksi`.`tanggal_transaksi`,1,7) order by substr(`transaksi`.`tanggal_transaksi`,1,7) desc) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_laporan_harian`
--
DROP TABLE IF EXISTS `view_laporan_harian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_laporan_harian`  AS  (select substr(`transaksi`.`tanggal_transaksi`,1,10) AS `tanggal_transaksi`,(select count(`detail_transaksi`.`id_detail_transaksi`) from `detail_transaksi` where substr(`transaksi`.`tanggal_transaksi`,1,10) = substr(`detail_transaksi`.`tanggal_transaksi`,1,10)) AS `jumlah_items`,sum(`transaksi`.`qty`) AS `qty_terjual`,sum(`transaksi`.`total_bayar`) AS `total_pendapatan` from `transaksi` where `transaksi`.`status_transaksi` = 'SELESAI' group by substr(`transaksi`.`tanggal_transaksi`,1,10) order by substr(`transaksi`.`tanggal_transaksi`,1,10) desc) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_laporan_penjualan`
--
DROP TABLE IF EXISTS `view_laporan_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_laporan_penjualan`  AS  (select substr(`transaksi`.`tanggal_transaksi`,1,10) AS `tanggal_transaksi`,concat('KDN',`transaksi`.`id_transaksi`) AS `kode_nota`,`transaksi`.`nama_konsumen` AS `nama_konsumen`,(select count(`detail_transaksi`.`id_detail_transaksi`) from `detail_transaksi` where `detail_transaksi`.`id_transaksi` = `transaksi`.`id_transaksi`) AS `jumlah_items`,`transaksi`.`qty` AS `qty`,`transaksi`.`total_bayar` AS `total_bayar` from `transaksi` where `transaksi`.`status_transaksi` = 'SELESAI' order by `transaksi`.`id_transaksi` desc) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_menu_favorit`
--
DROP TABLE IF EXISTS `view_menu_favorit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_menu_favorit`  AS  (select `menu_food_and_beverage`.`nama_menu` AS `nama_menu`,sum(`rekapan_stok`.`stok_terjual`) AS `Stok_terjual`,`menu_food_and_beverage`.`gambar` AS `gambar` from (`rekapan_stok` join `menu_food_and_beverage` on(`rekapan_stok`.`id_menu` = `menu_food_and_beverage`.`id_menu`)) group by `rekapan_stok`.`id_menu` order by sum(`rekapan_stok`.`stok_terjual`) desc) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_menu_terbaru`
--
DROP TABLE IF EXISTS `view_menu_terbaru`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_menu_terbaru`  AS  (select `menu_food_and_beverage`.`nama_menu` AS `nama_menu`,`menu_food_and_beverage`.`gambar` AS `gambar` from `menu_food_and_beverage` order by `menu_food_and_beverage`.`id_menu` desc limit 3) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_transaksi_selesai`
--
DROP TABLE IF EXISTS `view_transaksi_selesai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_selesai`  AS  (select `transaksi`.`id_transaksi` AS `id_transaksi`,`transaksi`.`nama_konsumen` AS `nama_konsumen`,`transaksi`.`status_transaksi` AS `status_transaksi`,`transaksi`.`tanggal_transaksi` AS `tanggal_transaksi` from `transaksi` where `transaksi`.`status_transaksi` = 'SELESAI' order by `transaksi`.`id_transaksi` desc) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `menu_food_and_beverage`
--
ALTER TABLE `menu_food_and_beverage`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id_menu_type`);

--
-- Indeks untuk tabel `rekapan_stok`
--
ALTER TABLE `rekapan_stok`
  ADD PRIMARY KEY (`id_rekapan_stok`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stok_menu`
--
ALTER TABLE `stok_menu`
  ADD PRIMARY KEY (`id_stok_menu`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT untuk tabel `menu_food_and_beverage`
--
ALTER TABLE `menu_food_and_beverage`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id_menu_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rekapan_stok`
--
ALTER TABLE `rekapan_stok`
  MODIFY `id_rekapan_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `stok_menu`
--
ALTER TABLE `stok_menu`
  MODIFY `id_stok_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
