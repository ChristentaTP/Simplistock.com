-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2025 at 11:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_gudang`
--

CREATE TABLE `admin_gudang` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_gudang`
--

INSERT INTO `admin_gudang` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'a', 'dev', '1');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_keluar` int(10) NOT NULL,
  `id_barang` int(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `penerima` varchar(10) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_keluar`, `id_barang`, `tanggal`, `jumlah`, `penerima`, `id_admin`, `deleted_at`) VALUES
(1, 1, '2025-04-01', 15, 'PG001', 1, NULL),
(2, 2, '2025-04-02', 10, 'PG002', 1, NULL),
(3, 3, '2025-04-03', 20, 'PG003', 1, NULL),
(4, 4, '2025-04-04', 18, 'PG004', 1, NULL),
(5, 5, '2025-04-05', 22, 'PG005', 1, NULL),
(6, 6, '2025-04-06', 25, 'PG006', 1, NULL),
(7, 7, '2025-04-07', 30, 'PG007', 1, NULL),
(8, 8, '2025-04-08', 14, 'PG008', 1, NULL),
(9, 9, '2025-04-09', 17, 'PG009', 1, NULL),
(10, 10, '2025-04-10', 20, 'PG010', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_masuk` int(10) NOT NULL,
  `id_barang` int(50) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_masuk`, `id_barang`, `nama_barang`, `tanggal`, `jumlah`, `keterangan`, `id_admin`, `deleted_at`) VALUES
(1, 1, 'Laptop Asus ZenBook', '2025-04-01', 35, 'Dalam Negeri', 1, NULL),
(2, 2, 'Monitor LG Ultrawide', '2025-04-01', 150, 'Dalam Negeri', 1, NULL),
(3, 3, 'Keyboard Logitech K380', '2025-04-01', 110, 'Dalam Negeri', 1, NULL),
(4, 4, 'Printer Canon LBP2900', '2025-04-01', 125, 'Dalam Negeri', 1, NULL),
(5, 5, 'Router TP-Link Archer', '2025-04-01', 140, 'Luar Negeri', 1, NULL),
(6, 6, 'Switch Cisco SG110', '2025-04-01', 101, 'Luar Negeri', 1, NULL),
(7, 7, 'Server Dell PowerEdge', '2025-04-01', 145, 'Luar Negeri', 1, NULL),
(8, 8, 'Harddisk WD 2TB', '2025-04-01', 135, 'Dalam Negeri', 1, NULL),
(9, 9, 'SSD Samsung 1TB', '2025-04-01', 121, 'Dalam Negeri', 1, NULL),
(10, 10, 'Webcam Logitech C920', '2025-04-01', 125, 'Dalam Negeri', 1, NULL),
(11, 11, 'UPS APC 1000VA', '2025-04-01', 119, 'Luar Negeri', 1, NULL),
(12, 12, 'Scanner Epson L3110', '2025-04-01', 120, 'Dalam Negeri', 1, NULL),
(13, 13, 'Mouse Logitech MX Master', '2025-04-01', 110, 'Dalam Negeri', 1, NULL),
(14, 14, 'Laptop Lenovo ThinkPad', '2025-04-01', 145, 'Luar Negeri', 1, NULL),
(15, 15, 'Monitor Dell 27 inch', '2025-04-01', 108, 'Dalam Negeri', 1, NULL),
(16, 16, 'Keyboard Razer BlackWidow', '2025-04-01', 122, 'Luar Negeri', 1, NULL),
(17, 17, 'Printer Epson L120', '2025-04-01', 117, 'Dalam Negeri', 1, NULL),
(18, 18, 'Router Mikrotik RB750', '2025-04-01', 130, 'Dalam Negeri', 1, NULL),
(19, 19, 'Switch TP-Link 16-Port', '2025-04-01', 131, 'Dalam Negeri', 1, NULL),
(20, 20, 'Server HP ProLiant', '2025-04-01', 111, 'Luar Negeri', 1, NULL),
(21, 21, 'NAS Synology DS220+', '2025-04-01', 101, 'Luar Negeri', 1, NULL),
(22, 22, 'SSD Kingston 512GB', '2025-04-01', 140, 'Dalam Negeri', 1, NULL),
(23, 23, 'Headset HyperX Cloud II', '2025-04-01', 114, 'Dalam Negeri', 1, NULL),
(24, 24, 'Kamera CCTV Hikvision', '2025-04-01', 123, 'Dalam Negeri', 1, NULL),
(25, 25, 'Tablet Samsung Tab A', '2025-04-01', 101, 'Luar Negeri', 1, NULL),
(26, 0, 'Smartphone Xiaomi 13', '2025-04-01', 133, 'Dalam Negeri', 1, NULL),
(27, 0, 'Mini PC Intel NUC', '2025-04-01', 122, 'Luar Negeri', 1, NULL),
(28, 0, 'Laptop Acer Swift 3', '2025-04-01', 115, 'Dalam Negeri', 1, NULL),
(29, 0, 'Monitor Samsung Curve', '2025-04-01', 104, 'Luar Negeri', 1, NULL),
(30, 0, 'Keyboard Wireless Rapoo', '2025-04-01', 130, 'Dalam Negeri', 1, NULL),
(31, 0, 'Printer Brother HL-1210W', '2025-04-01', 129, 'Luar Negeri', 1, NULL),
(32, 0, 'Router Huawei AX3', '2025-04-01', 132, 'Dalam Negeri', 1, NULL),
(33, 0, 'Switch D-Link 8-Port', '2025-04-01', 124, 'Dalam Negeri', 1, NULL),
(34, 0, 'Server IBM x3650', '2025-04-01', 101, 'Luar Negeri', 1, NULL),
(35, 0, 'HDD Seagate 1TB', '2025-04-01', 139, 'Dalam Negeri', 1, NULL),
(36, 0, 'SSD Adata 256GB', '2025-04-01', 138, 'Luar Negeri', 1, NULL),
(37, 0, 'Mouse Microsoft Arc', '2025-04-01', 109, 'Luar Negeri', 1, NULL),
(38, 0, 'UPS Prolink 1200VA', '2025-04-01', 112, 'Dalam Negeri', 1, NULL),
(39, 0, 'Scanner Canon LiDE 300', '2025-04-01', 113, 'Dalam Negeri', 1, NULL),
(40, 0, 'Monitor AOC 24G2E', '2025-04-01', 145, 'Dalam Negeri', 1, NULL),
(41, 0, 'Laptop HP EliteBook', '2025-04-01', 114, 'Luar Negeri', 1, NULL),
(42, 0, 'Keyboard Logitech G213', '2025-04-01', 106, 'Dalam Negeri', 1, NULL),
(43, 0, 'Printer HP LaserJet P1102', '2025-04-01', 109, 'Dalam Negeri', 1, NULL),
(44, 0, 'Router Linksys EA6350', '2025-04-01', 134, 'Luar Negeri', 1, NULL),
(45, 0, 'Switch Netgear GS308', '2025-04-01', 123, 'Dalam Negeri', 1, NULL),
(46, 0, 'Server Lenovo ThinkSystem', '2025-04-01', 122, 'Luar Negeri', 1, NULL),
(47, 0, 'NAS QNAP TS-230', '2025-04-01', 125, 'Luar Negeri', 1, NULL),
(48, 0, 'SSD Crucial MX500', '2025-04-01', 131, 'Dalam Negeri', 1, NULL),
(49, 0, 'Headset Logitech H390', '2025-04-01', 104, 'Dalam Negeri', 1, NULL),
(50, 0, 'Webcam A4Tech PK-910H', '2025-04-01', 138, 'Luar Negeri', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `list_barang`
--

CREATE TABLE `list_barang` (
  `id_barang` int(50) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list_barang`
--

INSERT INTO `list_barang` (`id_barang`, `nama_barang`, `tipe`, `jumlah`, `keterangan`, `deleted_at`) VALUES
(1, 'Laptop Asus ZenBook', 'Laptop', 20, 'Dalam Negeri', NULL),
(2, 'Monitor LG Ultrawide', 'Monitor', 115, 'Luar Negeri', NULL),
(3, 'Keyboard Logitech K380', 'Keyboard', 90, 'Dalam Negeri', NULL),
(4, 'Printer Canon LBP2900', 'Printer', 107, 'Dalam Negeri', NULL),
(5, 'Router TP-Link Archer', 'Router', 118, 'Luar Negeri', NULL),
(6, 'Switch Cisco SG110', 'Switch', 76, 'Luar Negeri', NULL),
(7, 'Server Dell PowerEdge', 'Server', 115, 'Luar Negeri', NULL),
(8, 'Harddisk WD 2TB', 'Storage', 121, 'Dalam Negeri', NULL),
(9, 'SSD Samsung 1TB', 'Storage', 104, 'Dalam Negeri', NULL),
(10, 'Webcam Logitech C920', 'Aksesoris', 105, 'Dalam Negeri', NULL),
(11, 'UPS APC 1000VA', 'Power', 119, 'Luar Negeri', NULL),
(12, 'Scanner Epson L3110', 'Scanner', 120, 'Dalam Negeri', NULL),
(13, 'Mouse Logitech MX Master', 'Aksesoris', 110, 'Dalam Negeri', NULL),
(14, 'Laptop Lenovo ThinkPad', 'Laptop', 145, 'Luar Negeri', NULL),
(15, 'Monitor Dell 27 inch', 'Monitor', 108, 'Dalam Negeri', NULL),
(16, 'Keyboard Razer BlackWidow', 'Keyboard', 122, 'Luar Negeri', NULL),
(17, 'Printer Epson L120', 'Printer', 117, 'Dalam Negeri', NULL),
(18, 'Router Mikrotik RB750', 'Router', 130, 'Dalam Negeri', NULL),
(19, 'Switch TP-Link 16-Port', 'Switch', 131, 'Dalam Negeri', NULL),
(20, 'Server HP ProLiant', 'Server', 111, 'Luar Negeri', NULL),
(21, 'NAS Synology DS220+', 'Storage', 101, 'Luar Negeri', NULL),
(22, 'SSD Kingston 512GB', 'Storage', 140, 'Dalam Negeri', NULL),
(23, 'Headset HyperX Cloud II', 'Aksesoris', 114, 'Dalam Negeri', NULL),
(24, 'Kamera CCTV Hikvision', 'Keamanan', 123, 'Dalam Negeri', NULL),
(25, 'Tablet Samsung Tab A', 'Tablet', 101, 'Luar Negeri', NULL),
(26, 'Smartphone Xiaomi 13', 'Smartphone', 0, 'Dalam Negeri', NULL),
(27, 'Mini PC Intel NUC', 'Komputer', 0, 'Luar Negeri', NULL),
(28, 'Laptop Acer Swift 3', 'Laptop', 0, 'Dalam Negeri', NULL),
(29, 'Monitor Samsung Curve', 'Monitor', 0, 'Luar Negeri', NULL),
(30, 'Keyboard Wireless Rapoo', 'Keyboard', 0, 'Dalam Negeri', NULL),
(31, 'Printer Brother HL-1210W', 'Printer', 0, 'Luar Negeri', NULL),
(32, 'Router Huawei AX3', 'Router', 0, 'Dalam Negeri', NULL),
(33, 'Switch D-Link 8-Port', 'Switch', 0, 'Dalam Negeri', NULL),
(34, 'Server IBM x3650', 'Server', 0, 'Luar Negeri', NULL),
(35, 'HDD Seagate 1TB', 'Storage', 0, 'Dalam Negeri', NULL),
(36, 'SSD Adata 256GB', 'Storage', 0, 'Luar Negeri', NULL),
(37, 'Mouse Microsoft Arc', 'Aksesoris', 0, 'Luar Negeri', NULL),
(38, 'UPS Prolink 1200VA', 'Power', 0, 'Dalam Negeri', NULL),
(39, 'Scanner Canon LiDE 300', 'Scanner', 0, 'Dalam Negeri', NULL),
(40, 'Monitor AOC 24G2E', 'Monitor', 0, 'Dalam Negeri', NULL),
(41, 'Laptop HP EliteBook', 'Laptop', 0, 'Luar Negeri', NULL),
(42, 'Keyboard Logitech G213', 'Keyboard', 0, 'Dalam Negeri', NULL),
(43, 'Printer HP LaserJet P1102', 'Printer', 0, 'Dalam Negeri', NULL),
(44, 'Router Linksys EA6350', 'Router', 0, 'Luar Negeri', NULL),
(45, 'Switch Netgear GS308', 'Switch', 0, 'Dalam Negeri', NULL),
(46, 'Server Lenovo ThinkSystem', 'Server', 0, 'Luar Negeri', NULL),
(47, 'NAS QNAP TS-230', 'Storage', 0, 'Luar Negeri', NULL),
(48, 'SSD Crucial MX500', 'Storage', 0, 'Dalam Negeri', NULL),
(49, 'Headset Logitech H390', 'Aksesoris', 0, 'Dalam Negeri', NULL),
(50, 'Webcam A4Tech PK-910H', 'Aksesoris', 0, 'Luar Negeri', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_08_180547_add_tanggal_masuk_to_list_barang_table', 2),
(17, '2025_04_15_093616_add_deleted_at_to_barang_keluar', 3),
(18, '2025_04_15_093616_add_deleted_at_to_barang_masuk', 3),
(19, '2025_04_15_093617_add_deleted_at_to_list_barang', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_user` varchar(10) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_user`, `nama_user`, `username`, `password`) VALUES
('1', 'z', 'bulan', '1'),
('PG001', 'Aulia Rahma', 'aulia.rahma', 'password123'),
('PG002', 'Budi Santoso', 'budi.s', 'password123'),
('PG003', 'Clara Wijaya', 'clara.w', 'password123'),
('PG004', 'Deni Pratama', 'deni.p', 'password123'),
('PG005', 'Eka Lestari', 'eka.l', 'password123'),
('PG006', 'Farhan Yusuf', 'farhan.y', 'password123'),
('PG007', 'Gita Mawar', 'gita.m', 'password123'),
('PG008', 'Hendra Gunawan', 'hendra.g', 'password123'),
('PG009', 'Intan Sari', 'intan.s', 'password123'),
('PG010', 'Joko Kurniawan', 'joko.k', 'password123');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0pyCuIZ1P5TLqlPmCQsz8YICBRjvVxb04UO186r2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoia2l3aEFDR0lLYms5Zk5ua2xTR0hDeWVhcmpxQ3pESmNpSlRvamEyVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9saXN0LWJhcmFuZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NDoicm9sZSI7czo1OiJhZG1pbiI7czo3OiJ1c2VyX2lkIjtOO3M6ODoidXNlcm5hbWUiO3M6MzoiZGV2Ijt9', 1744766211),
('nbgNaAnVZhoKJRkjubvHWQu6WXZxeKpirFa8sA7d', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiV0x5OTFlejI4YzlvYVB6bG56SDVFS0RxVWRUT2xzRFZ3R1g3MTg0MyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9saXN0LWJhcmFuZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NDoicm9sZSI7czo1OiJhZG1pbiI7czo3OiJ1c2VyX2lkIjtOO3M6ODoidXNlcm5hbWUiO3M6MzoiZGV2Ijt9', 1744721878);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_gudang`
--
ALTER TABLE `admin_gudang`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `penerima` (`penerima`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `list_barang`
--
ALTER TABLE `list_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_gudang`
--
ALTER TABLE `admin_gudang`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_keluar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_masuk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `list_barang`
--
ALTER TABLE `list_barang`
  MODIFY `id_barang` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin_gudang` (`id_admin`),
  ADD CONSTRAINT `barang_keluar_ibfk_4` FOREIGN KEY (`penerima`) REFERENCES `pegawai` (`id_user`),
  ADD CONSTRAINT `fk_barang_keluar_penerima` FOREIGN KEY (`penerima`) REFERENCES `pegawai` (`id_user`);

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin_gudang` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
