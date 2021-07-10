-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jul 2021 pada 09.43
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
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `catatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_menu`, `jumlah_item`, `total_bayar`, `tanggal_transaksi`, `catatan`) VALUES
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
(25, 15, 29, 1, 15000, '2021-07-10 13:44:52', '');

--
-- Trigger `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `trigger_stok_menu` AFTER INSERT ON `detail_transaksi` FOR EACH ROW BEGIN
UPDATE stok_menu
SET terjual = terjual+new.jumlah_item, sisa = stok_menu.jumlah_stok_menu-terjual
WHERE id_menu= new.id_menu
;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `frontend_menu`
--

CREATE TABLE `frontend_menu` (
  `id_menu` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `frontend_menu`
--

INSERT INTO `frontend_menu` (`id_menu`, `label`, `link`, `id`, `sort`) VALUES
(1, 'Home', 'frontend/index', 'Home', 0),
(2, 'Features', 'frontend/features', 'Features', 1),
(3, 'About', 'frontend/about', 'about', 2),
(4, 'Sign in', 'login', 'signin', 3);

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
(1, 40),
(1, 115),
(1, 116),
(1, 127),
(2, 127),
(1, 129);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_session_token`
--

CREATE TABLE `list_session_token` (
  `session_id` int(11) NOT NULL,
  `session_token` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `active_time` datetime NOT NULL,
  `expire_time` datetime NOT NULL,
  `is_login` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_session_token`
--

INSERT INTO `list_session_token` (`session_id`, `session_token`, `admin_id`, `active_time`, `expire_time`, `is_login`) VALUES
(12, 'mFu6GqJ9laWV3G9pwgch9pETdg', 1, '2021-01-07 12:35:04', '2021-01-07 12:50:04', 0),
(13, 'S7oAgkk63Xm8n2MGzXIdnJsXho', 1, '2021-01-07 12:41:35', '2021-01-07 12:56:35', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(44, '::1', 'kasir2', 1625885652);

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
(129, 9, 3, 120, 'fab fa-accusoft', 'Laporan Penjualan Bulanan', 'View_laporan_bulanan', '1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_food_and_beverage`
--

CREATE TABLE `menu_food_and_beverage` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `gambar` varchar(20) NOT NULL,
  `deskripsi` varchar(20) DEFAULT NULL,
  `kategori_menu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_food_and_beverage`
--

INSERT INTO `menu_food_and_beverage` (`id_menu`, `nama_menu`, `harga_menu`, `gambar`, `deskripsi`, `kategori_menu`) VALUES
(2, 'Expresso', 15000, 'mnn.png', 'Tersedia', 'Beverage'),
(3, 'Expressoo', 15000, 'mnn3.png', 'Tersedia', 'Beverage'),
(4, 'Mi', 15000, 'ttt3.png', 'Tersedia', 'Food'),
(5, 'Cireng', 15000, 'ttt4.png', 'Tersedia', 'Food'),
(6, 'Baci', 15000, 'ttt5.png', 'Tersedia', 'Food'),
(7, 'Bakso', 15000, 'ttt6.png', 'Tersedia', 'Food'),
(8, 'Mie Goreng', 15000, 'ttt7.png', 'Tersedia', 'Food'),
(9, 'Mie Rebus', 15000, 'ttt8.png', 'Tersedia', 'Food'),
(10, 'Mie Goeng + Kornet', 15000, 'ttt9.png', 'Tersedia', 'Food'),
(11, 'Mie Rebus + Telur', 15000, 'ttt10.png', 'Tersedia', 'Food'),
(13, 'Air 1', 5000, 'mnn5.png', 'Tersedia', 'Beverage'),
(14, 'Air 2', 5000, 'mnn6.png', 'Tersedia', 'Beverage'),
(16, 'menu 1', 15000, 'ttt11.png', 'Tersedia', 'Food'),
(17, 'menu 2', 15000, 'ttt12.png', 'Tersedia', 'Food'),
(18, 'menu 3', 15000, 'ttt13.png', 'Tersedia', 'Food'),
(19, 'menu 4', 15000, 'ttt14.png', 'Tersedia', 'Food'),
(20, 'menu 5', 15000, 'ttt15.png', 'Tersedia', 'Food'),
(21, 'menu 6', 15000, 'ttt16.png', 'Tersedia', 'Food'),
(22, 'menu 7', 15000, 'ttt17.png', 'Tersedia', 'Food'),
(23, 'menu 8', 15000, 'ttt18.png', 'Tersedia', 'Food'),
(24, 'mi rebus + telor', 15000, 'ttt19.png', 'Tersedia', 'Food'),
(25, 'mi goreng + telor', 15000, 'ttt20.png', 'Tersedia', 'Food'),
(27, 'mi gor', 15000, 'mnn9.png', 'Tersedia', 'Food'),
(28, 'Lemon tea', 15000, 'game.png', 'Tersedia', 'Beverage'),
(29, 'Coffee Late', 15000, 'game1.png', 'Tersedia', 'Beverage');

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
  `tanggal_penjualan` date NOT NULL,
  `stok_terjual` int(11) NOT NULL,
  `stok_sisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekapan_stok`
--

INSERT INTO `rekapan_stok` (`id_rekapan_stok`, `id_menu`, `tanggal_penjualan`, `stok_terjual`, `stok_sisa`) VALUES
(1, 6, '2021-07-08', 10, 0),
(2, 28, '2021-06-01', 7, 3),
(3, 27, '2021-07-08', 20, 10),
(4, 29, '2021-07-10', 4, 26);

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
(2, 3, 15, 0, 0),
(4, 6, 10, 10, 0),
(6, 27, 30, 23, 7),
(7, 29, 30, 4, 26),
(9, 8, 90, 0, 0),
(10, 5, 300000, 0, 0),
(11, 9, 50, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `status_transaksi` varchar(50) DEFAULT 'Belum Diterima',
  `status_pelayanan` varchar(50) DEFAULT 'Belum dimasak',
  `total_bayar` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `nama_konsumen`, `jumlah_item`, `tanggal_transaksi`, `status_transaksi`, `status_pelayanan`, `total_bayar`, `bayar`, `kembalian`) VALUES
(1, 2, 'Hmm', 9, '2021-07-04 17:24:30', 'SELESAI', 'Selesai', 135000, 140000, 5000),
(2, 2, 'NAZZILLA', 5, '2021-07-04 17:28:26', NULL, NULL, 75000, 0, 0),
(3, 2, 'ASDASD', 1, '2021-07-04 17:30:08', NULL, NULL, 15000, 0, 0),
(4, 2, 'asdasd', 3, '2021-07-04 17:31:30', 'SELESAI', 'Selesai', 45000, 100000, 55000),
(5, 13, 'NAZZILLA AULIYA', 4, '2021-07-04 17:44:12', 'SELESAI', 'Selesai', 60000, 100000, 40000),
(6, 2, 'nazz', 5, '2021-07-05 19:48:07', 'Belum Diterima', 'Belum dimasak', 75000, 0, 0),
(7, 2, 'nazz', 5, '2021-07-05 19:52:02', 'Belum Diterima', 'Belum dimasak', 75000, 0, 0),
(8, 2, 'nazz', 5, '2021-07-05 19:53:08', 'SELESAI', 'Selesai', 75000, 1000000, 925000),
(9, 2, 'NAZZILLA AP 1', 6, '2021-07-08 21:37:49', 'SELESAI', 'Selesai', 90000, 100000, 10000),
(10, 2, 'nazzill', 3, '2021-07-08 21:41:42', 'SELESAI', 'Selesai', 45000, 100000, 55000),
(11, 2, 'nazzill', 3, '2021-07-08 21:42:29', 'SELESAI', 'Selesai', 45000, 1000000, 955000),
(12, 2, 'NAZZILLA', 10, '2021-07-08 21:44:32', 'SELESAI', 'Selesai', 150000, 150000, 0),
(13, 2, 'Pu3', 10, '2021-07-08 21:47:49', 'SELESAI', 'Selesai', 150000, 150000, 0),
(14, 2, 'PUTRI', 5, '2021-07-10 12:21:10', 'SELESAI', 'Belum Dimasak', 75000, 100000, 25000),
(15, 2, 'auliya putri', 2, '2021-07-10 13:44:52', 'SELESAI', 'Belum Dimasak', 30000, 150000, 120000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(128) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `image`) VALUES
(2, '127.0.0.1', 'kasir', '$2y$08$LUzQbkQWNLUEEemkyjPSj.VXzKOR3QsSQ8s0R3WfpLKk6kUU.4YZi', '', 'kasir@gmail.com', '', 'm0vyKu2zW7L8PTG20bquF.707e055aeea8a30aca', 1541329145, 'lHtbqmxsnla1izZ5LcXd9O', 1268889823, 1625899458, 1, 'Kasir', '01', 'Kedai', '08566666666', 'iconfinder_General_Office_37_25308161.png'),
(12, '::1', 'operator', '$2y$08$aYyTwtIXFh77Nq/.QsrYAuVBzwhvt/jIUx0KiiFZHGTzgTsSv3A.2', NULL, 'operator@gmail.com', NULL, NULL, NULL, NULL, 1624720903, 1625896796, 1, 'Operator', '01', 'Kedai', '08566666666', 'iconfinder_General_Office_37_25308162.png'),
(13, '::1', 'koki', '$2y$08$y4yUCASegeQwVtRBXbDvOurDJEX4CCnExO3bANzCSY20B7c0oIiSy', NULL, 'koki@gmail.com', NULL, NULL, NULL, NULL, 1624721167, 1625899680, 1, 'Koki', '01', 'Kedai', '08566666666', 'iconfinder_General_Office_37_2530816.png'),
(14, '::1', 'pemilik', '$2y$08$7KeUX66G.HcftzngXm/rCuiSte3mFAmLO3N2Nb8vceTEOcVFhfXc2', NULL, 'pemilik1@gmail.com', NULL, NULL, NULL, NULL, 1624761952, 1625886789, 1, 'Pemilik', '01', 'Kedai', '08566666666', 'iconfinder_General_Office_37_25308163.png'),
(17, '::1', 'kasirr', '$2y$08$L964SvQT0uaFJ1zMpcjeXugIBUKTgc0VeXUIFbDLNevKd89eRTxJG', NULL, 'kasir2@gmail.com', NULL, NULL, NULL, NULL, 1625885742, 1625885759, 1, 'Kasir 2', '02', 'Kedai', '08566666666', 'default.jpg');

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
(108, 17, 2),
(75, 17, 17),
(76, 18, 17),
(77, 19, 17),
(84, 20, 17),
(78, 21, 17),
(81, 22, 28),
(85, 23, 17),
(60, 24, 28),
(73, 25, 28),
(79, 26, 28),
(80, 27, 28),
(82, 28, 28),
(72, 29, 28),
(83, 30, 28),
(59, 31, 17),
(86, 32, 26),
(65, 33, 7),
(69, 34, 7),
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
,`jumlah_item_terjual` decimal(32,0)
,`total_pendapatan` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_laporan_harian`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_laporan_harian` (
`tanggal_transaksi` varchar(10)
,`jumlah_item_terjual` decimal(32,0)
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
,`jumlah_item` int(11)
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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_laporan_bulanan`  AS  (select substr(`transaksi`.`tanggal_transaksi`,1,7) AS `tanggal_transaksi`,sum(`transaksi`.`jumlah_item`) AS `jumlah_item_terjual`,sum(`transaksi`.`total_bayar`) AS `total_pendapatan` from `transaksi` where `transaksi`.`status_transaksi` = 'SELESAI' group by substr(`transaksi`.`tanggal_transaksi`,1,7) order by substr(`transaksi`.`tanggal_transaksi`,1,7) desc) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_laporan_harian`
--
DROP TABLE IF EXISTS `view_laporan_harian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_laporan_harian`  AS  (select substr(`transaksi`.`tanggal_transaksi`,1,10) AS `tanggal_transaksi`,sum(`transaksi`.`jumlah_item`) AS `jumlah_item_terjual`,sum(`transaksi`.`total_bayar`) AS `total_pendapatan` from `transaksi` where `transaksi`.`status_transaksi` = 'SELESAI' group by substr(`transaksi`.`tanggal_transaksi`,1,10) order by substr(`transaksi`.`tanggal_transaksi`,1,10) desc) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_laporan_penjualan`
--
DROP TABLE IF EXISTS `view_laporan_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_laporan_penjualan`  AS  (select substr(`transaksi`.`tanggal_transaksi`,1,10) AS `tanggal_transaksi`,concat('KDN',`transaksi`.`id_transaksi`) AS `kode_nota`,`transaksi`.`nama_konsumen` AS `nama_konsumen`,`transaksi`.`jumlah_item` AS `jumlah_item`,`transaksi`.`total_bayar` AS `total_bayar` from `transaksi` where `transaksi`.`status_transaksi` = 'SELESAI' order by `transaksi`.`id_transaksi` desc) ;

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_menu_terbaru`  AS  (select `menu_food_and_beverage`.`nama_menu` AS `nama_menu`,`menu_food_and_beverage`.`gambar` AS `gambar` from `menu_food_and_beverage` limit 3) ;

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
-- Indeks untuk tabel `frontend_menu`
--
ALTER TABLE `frontend_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `list_session_token`
--
ALTER TABLE `list_session_token`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `FK__list_admin` (`admin_id`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
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
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `frontend_menu`
--
ALTER TABLE `frontend_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `list_session_token`
--
ALTER TABLE `list_session_token`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `menu_food_and_beverage`
--
ALTER TABLE `menu_food_and_beverage`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id_menu_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rekapan_stok`
--
ALTER TABLE `rekapan_stok`
  MODIFY `id_rekapan_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `stok_menu`
--
ALTER TABLE `stok_menu`
  MODIFY `id_stok_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
