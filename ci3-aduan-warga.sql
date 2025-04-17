-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2025 at 10:26 AM
-- Server version: 8.4.3
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci3-aduan-warga`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'jumeneng@admin', '107');

-- --------------------------------------------------------

--
-- Table structure for table `aduan`
--

CREATE TABLE `aduan` (
  `aduan_id` int NOT NULL,
  `warga_id` int NOT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` enum('baru','diproses','selesai') NOT NULL DEFAULT 'baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aduan`
--

INSERT INTO `aduan` (`aduan_id`, `warga_id`, `detail`, `status`) VALUES
(51, 1, 'Lampu jalan mati sudah 2 hari', 'selesai'),
(53, 1, 'Jalan berlubang', 'diproses'),
(55, 2, 'Kebocoran pipa gas', 'selesai'),
(56, 2, 'Jalan berlubang di depan rumah', 'diproses'),
(57, 3, 'Pohon tumbang di gang sempit', 'baru'),
(58, 3, 'Kebocoran atap rumah warga', 'selesai'),
(59, 3, 'Lampu jalan rusak', 'selesai'),
(60, 4, 'Banjir di jalan utama', 'baru'),
(61, 4, 'Kondisi jembatan rusak parah', 'selesai'),
(62, 4, 'Pembuangan sampah sembarangan', 'diproses'),
(63, 5, 'Kucing liar mengganggu ketentraman', 'baru'),
(64, 5, 'Pencurian barang di lingkungan', 'selesai'),
(65, 5, 'Lampu penerangan jalan umum mati', 'diproses'),
(66, 6, 'Pipa saluran air pecah', 'baru'),
(67, 6, 'Jalan rusak parah', 'selesai'),
(68, 6, 'Kebocoran pipa PDAM', 'diproses'),
(69, 7, 'Tali listrik terkelupas', 'baru'),
(70, 7, 'Atap rumah warga bocor', 'selesai'),
(71, 7, 'Gang sempit sulit dilalui', 'diproses'),
(72, 8, 'Gang dilalui kendaraan berat', 'baru'),
(73, 8, 'Parkir liar di depan rumah', 'selesai'),
(74, 8, 'Bau tidak sedap dari saluran pembuangan', 'diproses'),
(75, 9, 'Lampu jalan mati di kawasan perumahan', 'baru'),
(76, 9, 'Sampah menumpuk di area taman', 'selesai'),
(77, 9, 'Kebocoran pada pipa PDAM', 'diproses'),
(78, 10, 'Warga terjatuh di jalan rusak', 'baru'),
(79, 1, 'paving blok depan rumah pecah 2', 'selesai'),
(80, 2, 'banyak anak mabuk di lapangan sepakbola semalam', 'baru');

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `warga_id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`warga_id`, `nama`, `telepon`) VALUES
(1, 'Ayu Lestari Sari', '628500000001'),
(2, 'Budi Raharjo Santoso', '628500000002'),
(3, 'Citra Dewi Pratama', '628500000003'),
(4, 'Dewi Kartika Putri', '628500000004'),
(5, 'Eko Nugroho Handoko', '628500000005'),
(6, 'Fajar Setiawan Utomo', '628500000006'),
(7, 'Gita Amelia Rahma', '628500000007'),
(8, 'Hendra Wijaya Pratama', '628500000008'),
(9, 'Indah Permata Sari', '628500000009'),
(10, 'Joko Susilo Santoso', '628500000010');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `unik_username_admin` (`username`);

--
-- Indexes for table `aduan`
--
ALTER TABLE `aduan`
  ADD PRIMARY KEY (`aduan_id`),
  ADD KEY `fk_warga` (`warga_id`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`warga_id`),
  ADD UNIQUE KEY `warga_id` (`warga_id`,`telepon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aduan`
--
ALTER TABLE `aduan`
  MODIFY `aduan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `warga_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aduan`
--
ALTER TABLE `aduan`
  ADD CONSTRAINT `fk_warga` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`warga_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
