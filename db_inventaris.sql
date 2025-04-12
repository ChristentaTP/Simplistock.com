-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Apr 2025 pada 00.10
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.4.5

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
-- Struktur dari tabel `admin_gudang`
--

CREATE TABLE `admin_gudang` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin_gudang`
--

INSERT INTO `admin_gudang` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'a', 'dev', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_keluar` varchar(10) NOT NULL,
  `id_barang` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `penerima` varchar(10) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_keluar`, `id_barang`, `tanggal`, `jumlah`, `penerima`, `id_admin`) VALUES
('OUT001', 'TEK101', '2025-04-01', 15, 'PG001', 1),
('OUT002', 'TEK102', '2025-04-02', 12, 'PG002', 1),
('OUT003', 'TEK103', '2025-04-03', 20, 'PG003', 1),
('OUT004', 'TEK104', '2025-04-04', 18, 'PG004', 1),
('OUT005', 'TEK105', '2025-04-05', 22, 'PG005', 1),
('OUT006', 'TEK106', '2025-04-06', 25, 'PG006', 1),
('OUT007', 'TEK107', '2025-04-07', 30, 'PG007', 1),
('OUT008', 'TEK108', '2025-04-08', 14, 'PG008', 1),
('OUT009', 'TEK109', '2025-04-09', 17, 'PG009', 1),
('OUT010', 'TEK110', '2025-04-10', 19, 'PG010', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_masuk` varchar(10) NOT NULL,
  `id_barang` varchar(50) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_masuk`, `id_barang`, `nama_barang`, `tanggal`, `jumlah`, `keterangan`, `id_admin`) VALUES
('M01', 'TEK101', 'Laptop Asus ZenBook', '2025-04-01', 120, 'Dalam Negeri', 1),
('M02', 'TEK102', 'Monitor LG Ultrawide', '2025-04-01', 130, 'Luar Negeri', 1),
('M03', 'TEK103', 'Keyboard Logitech K380', '2025-04-01', 110, 'Dalam Negeri', 1),
('M04', 'TEK104', 'Printer Canon LBP2900', '2025-04-01', 125, 'Dalam Negeri', 1),
('M05', 'TEK105', 'Router TP-Link Archer', '2025-04-01', 140, 'Luar Negeri', 1),
('M06', 'TEK106', 'Switch Cisco SG110', '2025-04-01', 101, 'Luar Negeri', 1),
('M07', 'TEK107', 'Server Dell PowerEdge', '2025-04-01', 145, 'Luar Negeri', 1),
('M08', 'TEK108', 'Harddisk WD 2TB', '2025-04-01', 135, 'Dalam Negeri', 1),
('M09', 'TEK109', 'SSD Samsung 1TB', '2025-04-01', 121, 'Dalam Negeri', 1),
('M10', 'TEK110', 'Webcam Logitech C920', '2025-04-01', 125, 'Dalam Negeri', 1),
('M11', 'TEK111', 'UPS APC 1000VA', '2025-04-01', 119, 'Luar Negeri', 1),
('M12', 'TEK112', 'Scanner Epson L3110', '2025-04-01', 120, 'Dalam Negeri', 1),
('M13', 'TEK113', 'Mouse Logitech MX Master', '2025-04-01', 110, 'Dalam Negeri', 1),
('M14', 'TEK114', 'Laptop Lenovo ThinkPad', '2025-04-01', 145, 'Luar Negeri', 1),
('M15', 'TEK115', 'Monitor Dell 27 inch', '2025-04-01', 108, 'Dalam Negeri', 1),
('M16', 'TEK116', 'Keyboard Razer BlackWidow', '2025-04-01', 122, 'Luar Negeri', 1),
('M17', 'TEK117', 'Printer Epson L120', '2025-04-01', 117, 'Dalam Negeri', 1),
('M18', 'TEK118', 'Router Mikrotik RB750', '2025-04-01', 130, 'Dalam Negeri', 1),
('M19', 'TEK119', 'Switch TP-Link 16-Port', '2025-04-01', 131, 'Dalam Negeri', 1),
('M20', 'TEK120', 'Server HP ProLiant', '2025-04-01', 111, 'Luar Negeri', 1),
('M21', 'TEK121', 'NAS Synology DS220+', '2025-04-01', 101, 'Luar Negeri', 1),
('M22', 'TEK122', 'SSD Kingston 512GB', '2025-04-01', 140, 'Dalam Negeri', 1),
('M23', 'TEK123', 'Headset HyperX Cloud II', '2025-04-01', 114, 'Dalam Negeri', 1),
('M24', 'TEK124', 'Kamera CCTV Hikvision', '2025-04-01', 123, 'Dalam Negeri', 1),
('M25', 'TEK125', 'Tablet Samsung Tab A', '2025-04-01', 101, 'Luar Negeri', 1),
('M26', 'TEK126', 'Smartphone Xiaomi 13', '2025-04-01', 133, 'Dalam Negeri', 1),
('M27', 'TEK127', 'Mini PC Intel NUC', '2025-04-01', 122, 'Luar Negeri', 1),
('M28', 'TEK128', 'Laptop Acer Swift 3', '2025-04-01', 115, 'Dalam Negeri', 1),
('M29', 'TEK129', 'Monitor Samsung Curve', '2025-04-01', 104, 'Luar Negeri', 1),
('M30', 'TEK130', 'Keyboard Wireless Rapoo', '2025-04-01', 130, 'Dalam Negeri', 1),
('M31', 'TEK131', 'Printer Brother HL-1210W', '2025-04-01', 129, 'Luar Negeri', 1),
('M32', 'TEK132', 'Router Huawei AX3', '2025-04-01', 132, 'Dalam Negeri', 1),
('M33', 'TEK133', 'Switch D-Link 8-Port', '2025-04-01', 124, 'Dalam Negeri', 1),
('M34', 'TEK134', 'Server IBM x3650', '2025-04-01', 101, 'Luar Negeri', 1),
('M35', 'TEK135', 'HDD Seagate 1TB', '2025-04-01', 139, 'Dalam Negeri', 1),
('M36', 'TEK136', 'SSD Adata 256GB', '2025-04-01', 138, 'Luar Negeri', 1),
('M37', 'TEK137', 'Mouse Microsoft Arc', '2025-04-01', 109, 'Luar Negeri', 1),
('M38', 'TEK138', 'UPS Prolink 1200VA', '2025-04-01', 112, 'Dalam Negeri', 1),
('M39', 'TEK139', 'Scanner Canon LiDE 300', '2025-04-01', 113, 'Dalam Negeri', 1),
('M40', 'TEK140', 'Monitor AOC 24G2E', '2025-04-01', 145, 'Dalam Negeri', 1),
('M41', 'TEK141', 'Laptop HP EliteBook', '2025-04-01', 114, 'Luar Negeri', 1),
('M42', 'TEK142', 'Keyboard Logitech G213', '2025-04-01', 106, 'Dalam Negeri', 1),
('M43', 'TEK143', 'Printer HP LaserJet P1102', '2025-04-01', 109, 'Dalam Negeri', 1),
('M44', 'TEK144', 'Router Linksys EA6350', '2025-04-01', 134, 'Luar Negeri', 1),
('M45', 'TEK145', 'Switch Netgear GS308', '2025-04-01', 123, 'Dalam Negeri', 1),
('M46', 'TEK146', 'Server Lenovo ThinkSystem', '2025-04-01', 122, 'Luar Negeri', 1),
('M47', 'TEK147', 'NAS QNAP TS-230', '2025-04-01', 125, 'Luar Negeri', 1),
('M48', 'TEK148', 'SSD Crucial MX500', '2025-04-01', 131, 'Dalam Negeri', 1),
('M49', 'TEK149', 'Headset Logitech H390', '2025-04-01', 104, 'Dalam Negeri', 1),
('M50', 'TEK150', 'Webcam A4Tech PK-910H', '2025-04-01', 138, 'Luar Negeri', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_barang`
--

CREATE TABLE `list_barang` (
  `id_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `list_barang`
--

INSERT INTO `list_barang` (`id_barang`, `nama_barang`, `tipe`, `jumlah`, `keterangan`) VALUES
('TEK101', 'Laptop Asus ZenBook', 'Laptop', 0, 'Dalam Negeri'),
('TEK102', 'Monitor LG Ultrawide', 'Monitor', 0, 'Luar Negeri'),
('TEK103', 'Keyboard Logitech K380', 'Keyboard', 0, 'Dalam Negeri'),
('TEK104', 'Printer Canon LBP2900', 'Printer', 0, 'Dalam Negeri'),
('TEK105', 'Router TP-Link Archer', 'Router', 0, 'Luar Negeri'),
('TEK106', 'Switch Cisco SG110', 'Switch', 0, 'Luar Negeri'),
('TEK107', 'Server Dell PowerEdge', 'Server', 0, 'Luar Negeri'),
('TEK108', 'Harddisk WD 2TB', 'Storage', 0, 'Dalam Negeri'),
('TEK109', 'SSD Samsung 1TB', 'Storage', 0, 'Dalam Negeri'),
('TEK110', 'Webcam Logitech C920', 'Aksesoris', 0, 'Dalam Negeri'),
('TEK111', 'UPS APC 1000VA', 'Power', 0, 'Luar Negeri'),
('TEK112', 'Scanner Epson L3110', 'Scanner', 0, 'Dalam Negeri'),
('TEK113', 'Mouse Logitech MX Master', 'Aksesoris', 0, 'Dalam Negeri'),
('TEK114', 'Laptop Lenovo ThinkPad', 'Laptop', 0, 'Luar Negeri'),
('TEK115', 'Monitor Dell 27 inch', 'Monitor', 0, 'Dalam Negeri'),
('TEK116', 'Keyboard Razer BlackWidow', 'Keyboard', 0, 'Luar Negeri'),
('TEK117', 'Printer Epson L120', 'Printer', 0, 'Dalam Negeri'),
('TEK118', 'Router Mikrotik RB750', 'Router', 0, 'Dalam Negeri'),
('TEK119', 'Switch TP-Link 16-Port', 'Switch', 0, 'Dalam Negeri'),
('TEK120', 'Server HP ProLiant', 'Server', 0, 'Luar Negeri'),
('TEK121', 'NAS Synology DS220+', 'Storage', 0, 'Luar Negeri'),
('TEK122', 'SSD Kingston 512GB', 'Storage', 0, 'Dalam Negeri'),
('TEK123', 'Headset HyperX Cloud II', 'Aksesoris', 0, 'Dalam Negeri'),
('TEK124', 'Kamera CCTV Hikvision', 'Keamanan', 0, 'Dalam Negeri'),
('TEK125', 'Tablet Samsung Tab A', 'Tablet', 0, 'Luar Negeri'),
('TEK126', 'Smartphone Xiaomi 13', 'Smartphone', 0, 'Dalam Negeri'),
('TEK127', 'Mini PC Intel NUC', 'Komputer', 0, 'Luar Negeri'),
('TEK128', 'Laptop Acer Swift 3', 'Laptop', 0, 'Dalam Negeri'),
('TEK129', 'Monitor Samsung Curve', 'Monitor', 0, 'Luar Negeri'),
('TEK130', 'Keyboard Wireless Rapoo', 'Keyboard', 0, 'Dalam Negeri'),
('TEK131', 'Printer Brother HL-1210W', 'Printer', 0, 'Luar Negeri'),
('TEK132', 'Router Huawei AX3', 'Router', 0, 'Dalam Negeri'),
('TEK133', 'Switch D-Link 8-Port', 'Switch', 0, 'Dalam Negeri'),
('TEK134', 'Server IBM x3650', 'Server', 0, 'Luar Negeri'),
('TEK135', 'HDD Seagate 1TB', 'Storage', 0, 'Dalam Negeri'),
('TEK136', 'SSD Adata 256GB', 'Storage', 0, 'Luar Negeri'),
('TEK137', 'Mouse Microsoft Arc', 'Aksesoris', 0, 'Luar Negeri'),
('TEK138', 'UPS Prolink 1200VA', 'Power', 0, 'Dalam Negeri'),
('TEK139', 'Scanner Canon LiDE 300', 'Scanner', 0, 'Dalam Negeri'),
('TEK140', 'Monitor AOC 24G2E', 'Monitor', 0, 'Dalam Negeri'),
('TEK141', 'Laptop HP EliteBook', 'Laptop', 0, 'Luar Negeri'),
('TEK142', 'Keyboard Logitech G213', 'Keyboard', 0, 'Dalam Negeri'),
('TEK143', 'Printer HP LaserJet P1102', 'Printer', 0, 'Dalam Negeri'),
('TEK144', 'Router Linksys EA6350', 'Router', 0, 'Luar Negeri'),
('TEK145', 'Switch Netgear GS308', 'Switch', 0, 'Dalam Negeri'),
('TEK146', 'Server Lenovo ThinkSystem', 'Server', 0, 'Luar Negeri'),
('TEK147', 'NAS QNAP TS-230', 'Storage', 0, 'Luar Negeri'),
('TEK148', 'SSD Crucial MX500', 'Storage', 0, 'Dalam Negeri'),
('TEK149', 'Headset Logitech H390', 'Aksesoris', 0, 'Dalam Negeri'),
('TEK150', 'Webcam A4Tech PK-910H', 'Aksesoris', 0, 'Luar Negeri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_08_180547_add_tanggal_masuk_to_list_barang_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_user` varchar(10) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
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
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0JaSRJegGRuEzh4qHP02PFSaI86exA3EYZEeUp5n', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMzh2Qm5LTEVSS2dTRURRaVNYZEZ6WUtEdjN3ME1SV3JEbzFwaUptciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9iYXJhbmcta2VsdWFyIjt9czo0OiJyb2xlIjtzOjU6ImFkbWluIjtzOjc6InVzZXJfaWQiO047czo4OiJ1c2VybmFtZSI7czozOiJkZXYiO30=', 1744150099);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_gudang`
--
ALTER TABLE `admin_gudang`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `penerima` (`penerima`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `list_barang`
--
ALTER TABLE `list_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_gudang`
--
ALTER TABLE `admin_gudang`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `list_barang` (`id_barang`),
  ADD CONSTRAINT `barang_keluar_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin_gudang` (`id_admin`),
  ADD CONSTRAINT `barang_keluar_ibfk_4` FOREIGN KEY (`penerima`) REFERENCES `pegawai` (`id_user`),
  ADD CONSTRAINT `fk_barang_keluar_penerima` FOREIGN KEY (`penerima`) REFERENCES `pegawai` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `list_barang` (`id_barang`),
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin_gudang` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
