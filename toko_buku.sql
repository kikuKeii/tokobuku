-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 09:24 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'user', 'Reguler User');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 2),
(2, 1),
(2, 3),
(2, 4),
(2, 13),
(2, 14);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'kikukeii@outlook.com', 1, '2021-05-03 23:01:37', 1),
(2, '::1', 'kikukeii@outlook.com', 1, '2021-05-03 23:05:41', 1),
(3, '::1', 'kikifoji095@gmail.com', 2, '2021-05-03 23:12:00', 1),
(4, '::1', 'kikukeii@outlook.com', 1, '2021-05-03 23:12:21', 1),
(5, '::1', 'kikifoji095@gmail.com', 2, '2021-05-03 23:18:07', 1),
(6, '::1', 'kiku', NULL, '2021-05-03 23:21:10', 0),
(7, '::1', 'kidevinfo73@gmail.com', 3, '2021-05-03 23:21:42', 1),
(8, '::1', 'kikifoji095@gmail.com', 2, '2021-05-03 23:23:56', 1),
(9, '::1', 'kidevinfo73@gmail.com', 3, '2021-05-03 23:34:22', 1),
(10, '::1', 'kikifoji095@gmail.com', 2, '2021-05-03 23:46:38', 1),
(11, '::1', 'kidevinfo73@gmail.com', 3, '2021-05-04 02:33:48', 1),
(12, '::1', 'kidevinfo73@gmail.com', 3, '2021-05-04 02:48:37', 1),
(13, '::1', 'kidevinfo73@gmail.com', 3, '2021-05-04 19:09:13', 1),
(14, '::1', 'kiki', NULL, '2021-05-06 02:39:38', 0),
(15, '::1', 'kikifoji095@gmail.com', 2, '2021-05-06 02:39:49', 1),
(16, '::1', 'kidevinfo73@gmail.com', 3, '2021-05-06 02:41:42', 1),
(17, '::1', 'kikifoji095@gmail.com', 2, '2021-05-06 02:42:07', 1),
(18, '::1', 'kikifoji095@gmail.com', 2, '2021-05-11 01:22:26', 1),
(19, '::1', 'kiki', NULL, '2021-05-11 01:55:45', 0),
(20, '::1', 'kikifoji095@gmail.com', 2, '2021-05-11 01:55:51', 1),
(21, '::1', 'kikifoji095@gmail.com', 2, '2021-05-11 02:08:33', 1),
(22, '::1', 'kikifoji095@gmail.com', 2, '2021-05-11 02:28:10', 1),
(23, '::1', 'kikifoji095@gmail.com', 2, '2021-05-11 02:44:45', 1),
(24, '::1', 'kikifoji095@gmail.com', 2, '2021-05-11 07:23:41', 1),
(25, '::1', 'kikifoji095@gmail.com', 2, '2021-05-11 07:40:14', 1),
(26, '::1', 'kikifoji095@gmail.com', 2, '2021-05-11 07:55:42', 1),
(27, '::1', 'kikifoji095@gmail.com', 2, '2021-05-13 19:15:18', 1),
(28, '::1', 'kidevinfo73@gmail.com', 3, '2021-05-17 01:24:03', 1),
(29, '::1', 'kikifoji095@gmail.com', 2, '2021-05-17 01:25:02', 1),
(30, '::1', 'kikifoji095@gmail.com', 2, '2021-05-19 03:51:11', 1),
(31, '::1', 'kiki', NULL, '2021-05-20 00:06:18', 0),
(32, '::1', 'kikifoji095@gmail.com', 2, '2021-05-20 00:06:24', 1),
(33, '::1', 'kidevinfo73@gmail.com', 3, '2021-05-20 00:22:32', 1),
(34, '::1', 'kikifoji095@gmail.com', 2, '2021-05-20 00:56:54', 1),
(35, '::1', 'kikifoji095@gmail.com', 2, '2021-05-21 14:03:09', 1),
(36, '::1', 'kiki', NULL, '2021-05-22 00:28:43', 0),
(37, '::1', 'kikifoji095@gmail.com', 2, '2021-05-22 00:28:54', 1),
(38, '::1', 'kidevinfo73@gmail.com', 3, '2021-05-22 23:01:07', 1),
(39, '::1', 'kikifoji095@gmail.com', 2, '2021-05-23 02:41:20', 1),
(40, '::1', 'kidevinfo73@gmail.com', 3, '2021-05-23 02:42:52', 1),
(41, '::1', 'kikifoji095@gmail.com', 2, '2021-05-23 03:12:12', 1),
(42, '::1', 'kiki.miftah.75@facebook.com', 4, '2021-05-23 03:12:55', 1),
(43, '::1', 'kikifoji095@gmail.com', 2, '2021-05-23 03:14:00', 1),
(44, '::1', 'kiki.miftah.75@facebook.com', 4, '2021-05-23 03:55:00', 1),
(45, '::1', 'kikifoji095@gmail.com', 2, '2021-05-23 06:20:01', 1),
(46, '::1', 'Axis', NULL, '2021-05-23 07:18:48', 0),
(47, '::1', 'kiki.miftah.75@facebook.com', 4, '2021-05-23 07:18:54', 1),
(48, '::1', 'kidevinfo73@gmail.com', 3, '2021-05-24 02:33:06', 1),
(49, '::1', 'kidevinfo73@gmail.com', 3, '2021-05-24 07:04:16', 1),
(50, '::1', 'kikifoji095@gmail.com', 2, '2021-05-24 07:34:42', 1),
(51, '::1', 'kiki.miftah.75@facebook.com', 4, '2021-05-24 08:20:38', 1),
(52, '::1', 'kidevinfo73@gmail.com', 3, '2021-05-26 10:16:44', 1),
(53, '::1', 'kikifoji095@gmail.com', 2, '2021-05-26 10:21:33', 1),
(54, '::1', 'kiki.miftah.75@facebook.com', 4, '2021-05-26 10:33:36', 1),
(55, '::1', 'kikifoji095@gmail.com', 2, '2021-05-26 10:37:09', 1),
(56, '::1', 'kikifoji095@gmail.com', 2, '2021-06-01 03:44:21', 1),
(57, '::1', 'kiki', NULL, '2021-06-01 04:19:45', 0),
(58, '::1', 'kikifoji095@gmail.com', 2, '2021-06-01 04:20:10', 1),
(59, '::1', 'kiki', NULL, '2021-06-01 04:27:08', 0),
(60, '::1', 'kikifoji095@gmail.com', 2, '2021-06-01 04:27:46', 1),
(61, '::1', 'kikifoji095@gmail.com', 2, '2021-06-03 21:34:00', 1),
(62, '::1', 'kikifoji095@gmail.com', 2, '2021-06-05 08:41:33', 1),
(63, '::1', 'falaki', NULL, '2021-06-07 22:20:43', 0),
(64, '::1', 'miftah@gmail.com', 6, '2021-06-07 22:49:07', 1),
(65, '::1', 'miftah', NULL, '2021-06-07 22:59:46', 0),
(66, '::1', 'miftah', NULL, '2021-06-07 23:00:00', 0),
(67, '::1', 'kikifoji0951@gmail.com', 8, '2021-06-07 23:02:25', 1),
(68, '::1', 'kikifoji0951@gmail.com', 8, '2021-06-07 23:02:38', 1),
(69, '::1', 'falaki@gmail.com', 9, '2021-06-07 23:04:52', 1),
(70, '::1', 'falaki@gmail.com', 10, '2021-06-07 23:09:27', 1),
(71, '::1', 'falaki@gmail.com', 10, '2021-06-07 23:09:38', 1),
(72, '::1', 'falaki@gmail.com', 11, '2021-06-07 23:12:05', 1),
(73, '::1', 'falaki@gmail.com', 12, '2021-06-07 23:13:22', 1),
(74, '::1', 'kikifoji095@gmail.com', 2, '2021-06-07 23:26:47', 1),
(75, '::1', 'falaki@gmail.com', 13, '2021-06-07 23:29:47', 1),
(76, '::1', 'kikifoji095@gmail.com', 2, '2021-06-07 23:42:56', 1),
(77, '::1', 'kikifoji095@gmail.com', 2, '2021-06-07 23:43:41', 1),
(78, '::1', 'miftah@gmail.com', 14, '2021-06-09 22:40:41', 1),
(79, '::1', 'kikifoji095@gmail.com', 2, '2021-06-09 22:52:15', 1),
(80, '::1', 'kikifoji095@gmail.com', 2, '2021-06-09 22:57:31', 1),
(81, '::1', 'kikifoji095@gmail.com', 2, '2021-06-09 23:15:21', 1),
(82, '::1', 'kidevinfo73@gmail.com', 3, '2021-06-09 23:23:42', 1),
(83, '::1', 'miftah', NULL, '2021-06-09 23:24:03', 0),
(84, '::1', 'miftah@gmail.com', 14, '2021-06-09 23:29:59', 1),
(85, '::1', 'kikifoji095@gmail.com', 2, '2021-06-09 23:38:48', 1),
(86, '::1', 'miftah@gmail.com', 14, '2021-06-09 23:44:35', 1),
(87, '::1', 'kikifoji095@gmail.com', 2, '2021-06-10 00:11:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-users', 'Manage All Users'),
(2, 'manage-profile', 'Manage Profile user');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `penulis` varchar(225) DEFAULT NULL,
  `penerbit` varchar(225) DEFAULT NULL,
  `bahasa` varchar(225) NOT NULL,
  `jmlhHal` varchar(225) DEFAULT NULL,
  `sampul` varchar(225) NOT NULL DEFAULT 'buku_default.jpg',
  `sinopsis` varchar(225) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `slug`, `tahun`, `penulis`, `penerbit`, `bahasa`, `jmlhHal`, `sampul`, `sinopsis`, `harga`, `jumlah`, `created_at`, `updated_at`) VALUES
(32, 'Koleksi Program Web Php', 'koleksi-program-web-php', '2020', 'Yuniar Supardi & Irwan Kurniawan, S.Kom.', ' Elex Media Komputindo', ' Indonesia', '396', '1622042658_9b15d8a5911593f06cd9.jpg', 'Buku dengan judul Koleksi Program Web PHP ini berisi koleksi bahasa pemrograman script server PHP. Buku ini merupakan buku terbaru dan update dari buku yang berjudul Buku Mahir Web Programming yang best seller. Dengan banyakn', 95000, 75, '2021-05-26', '2021-05-26'),
(33, 'Membuat Toko Online dengan Teknik OOP, MVC, dan AJAX', 'membuat-toko-online-dengan-teknik-oop-mvc-dan-ajax', '2017', 'Rohi Abdulloh', ' Elex Media Komputindo', ' Indonesia', '2017', '1622042904_d644e5d098f477aacdb7.jpg', 'OOP, MVC dan AJAX merupakan teknik pemrograman web yang wajib dikuasai oleh web programmer. Namun, pemula banyak yang menganggap ketiga teknik tersebut sulit untuk dipahami. Dalam buku ini penulis akan membahas ketiganya deng', 54800, 18, '2021-05-26', '2021-05-26'),
(34, 'Logika Pemrograman Java', 'logika-pemrograman-java', '2020', 'Abdul Kadir', ' Elex Media Komputindo', ' Indonesia', '568', '1622043051_20bfd0fa791221e5b037.jpg', 'Buku ini dirancang sebagai bahan penuntun dalam memprogram komputer menggunakan bahasa pemrograman Java dan dapat digunakan untuk pelajar, mahasiswa, atau siapa saja. Buku ini lebih menekankan pada cara untuk menyelesaikan ma', 140000, 122, '2021-05-26', '2021-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1620036784, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_by` varchar(225) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `Alamat` text NOT NULL,
  `ongkir` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `id_buku`, `jumlah`, `total`, `created_by`, `created_at`, `updated_by`, `updated_at`, `Alamat`, `ongkir`, `status`) VALUES
(15, 4, 32, 1, 208000, '4', '2021-05-26', NULL, '2021-06-09', 'Kp. Bakung Kec. Kronjo Kab. Tangerang Banten', 18000, 1),
(18, 13, 33, 1, 63800, '13', '2021-06-07', NULL, '2021-06-07', 'Kp. Bakung Kec. Kronjo Kab. Tangerang Banten', 9000, 0),
(19, 14, 32, 1, 113000, '14', '2021-06-09', NULL, '2021-06-09', 'Kp. Bakung Kec. Balaraja Kab. Tangerang Banten', 18000, 1);

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `st` BEFORE INSERT ON `transaksi` FOR EACH ROW BEGIN

   UPDATE buku SET jumlah = jumlah - NEW.jumlah

   WHERE id = NEW.id_buku;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(225) DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `user_img` varchar(225) NOT NULL DEFAULT 'default.svg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `telp`, `user_img`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'kikukeii@outlook.com', 'user', NULL, NULL, 'default.svg', '$2y$10$IK4mTiboB7gBxxinE1U7We2nRwPLu2NXP/ZwiCvzPte0S0fP2p0a2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-03 23:01:25', '2021-05-03 23:01:25', NULL),
(2, 'kikifoji095@gmail.com', 'kiki', 'Falaki Miftakhuddin', '083807303926', 'default.svg', '$2y$10$H2/nclQF.NgI7mODtl1fWeuDMKEtTh.rpXIfS0NzsUrlyzDva2iVC', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-03 23:10:38', '2021-06-09 23:15:44', NULL),
(3, 'kidevinfo73@gmail.com', 'kiku', NULL, NULL, 'default.svg', '$2y$10$dMiNJKEADYAL5Qp1xSTCS.Y0O0A.2GEhW/Fz1VSakY4m7pQYWdRuO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-03 23:21:32', '2021-05-03 23:21:32', NULL),
(4, 'kiki.miftah.75@facebook.com', 'Axis', 'Miftakhuddin Falaki', '2312312', 'default.svg', '$2y$10$H2cB2XP4hSr9kOSOz4Zcne8pNkEhMe.twO/ryNzxbDtp6uuxF7UOq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-23 03:12:47', '2021-05-23 04:38:35', NULL),
(13, 'falaki@gmail.com', 'falaki', 'Miftakhuddin Falaki', '038307300000', 'default.svg', '$2y$10$xDUhpO8s6lE6o4dm9eKLZulfufeVcNsx.HrXdSbQwOCT7N//0pAvC', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-06-07 23:29:31', '2021-06-07 23:30:28', NULL),
(14, 'miftah@gmail.com', 'miftah', 'Miftakhuddin Falaki', '038307300000', 'default.svg', '$2y$10$0J2pDmGwbSeuNtsUCwVtCeGF3SBRfYji1pCDPTuaits89sh/d7uUy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-06-09 22:40:18', '2021-06-09 22:41:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
