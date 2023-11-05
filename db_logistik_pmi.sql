-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 05, 2023 at 06:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_logistik_pmi`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_keluar` int(20) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `tanggal_out` varchar(255) NOT NULL,
  `jumlah` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_keluar`, `id_barang`, `tanggal_out`, `jumlah`) VALUES
(14, 'ANTIA01', '2023-01-01', 5),
(15, 'ANTIB02', '2023-01-01', 5),
(16, 'LDP0001', '2023-01-01', 20),
(17, 'KD', '2023-10-17', 20),
(18, 'TISU0001', '2023-10-17', 400),
(19, 'TISU0001', '2023-10-15', 50);

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `report_keluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN

INSERT INTO report VALUES (id_report, 'TRANSAKSI KELUAR', NEW.id_barang, '-', NEW.tanggal_out, '-', NEW.jumlah);

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_keluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
UPDATE stok_barang SET stok=stok-new.jumlah 
WHERE id_stok_barang=new.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_masuk` int(20) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `tanggal_in` varchar(255) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_masuk`, `id_barang`, `tanggal_in`, `jumlah`) VALUES
(24, 'ANTIA01', '2022-12-01', 100),
(25, 'ANTIB02', '2022-12-01', 100),
(26, 'HANS0001', '20-10-2023', 50),
(27, 'ANTIA01', '2023-11-05', 10);

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `report_masuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN

INSERT INTO report VALUES (id_report, 'TRANSAKSI MASUK', NEW.id_barang, NEW.tanggal_in, '-', '-', NEW.jumlah);

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_masuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
UPDATE stok_barang SET stok=stok+new.jumlah
WHERE id_stok_barang=new.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_rusak`
--

CREATE TABLE `barang_rusak` (
  `id_rusak` int(20) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `tanggal_rusak` varchar(255) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `barang_rusak`
--

INSERT INTO `barang_rusak` (`id_rusak`, `id_barang`, `tanggal_rusak`, `jumlah`) VALUES
(3, 'MEJ0002', '2022-12-20', 2),
(4, 'PEN0001', '2022-12-06', 5),
(5, 'KD0001', '2022-12-15', 1),
(6, 'KD', '2023-10-17', 10);

--
-- Triggers `barang_rusak`
--
DELIMITER $$
CREATE TRIGGER `report_rusak` AFTER INSERT ON `barang_rusak` FOR EACH ROW BEGIN

INSERT INTO report VALUES (id_report, 'TRANSAKSI RUSAK', NEW.id_barang, '-', '-', NEW.tanggal_rusak, NEW.jumlah);

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_rusak` AFTER INSERT ON `barang_rusak` FOR EACH ROW BEGIN
UPDATE stok_barang SET stok=stok-new.jumlah 
WHERE id_stok_barang=new.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id_report` int(20) NOT NULL,
  `type` varchar(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `tanggal_in` varchar(255) DEFAULT NULL,
  `tanggal_out` varchar(255) DEFAULT NULL,
  `tanggal_rusak` varchar(255) DEFAULT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id_report`, `type`, `id_barang`, `tanggal_in`, `tanggal_out`, `tanggal_rusak`, `jumlah`) VALUES
(32, 'TRANSAKSI RUSAK', 'MEJ0002', '-', '-', '2022-12-20', 2),
(33, 'TRANSAKSI RUSAK', 'PEN0001', '-', '-', '2022-12-06', 5),
(34, 'TRANSAKSI MASUK', 'ANTIA01', '2022-12-01', '-', '-', 100),
(35, 'TRANSAKSI MASUK', 'ANTIB02', '2022-12-01', '-', '-', 100),
(36, 'TRANSAKSI KELUAR', 'ANTIA01', '-', '2023-01-01', '-', 5),
(37, 'TRANSAKSI RUSAK', 'KD0001', '-', '-', '2022-12-15', 1),
(38, 'TRANSAKSI KELUAR', 'ANTIB02', '-', '2023-01-01', '-', 5),
(39, 'TRANSAKSI KELUAR', 'LDP0001', '-', '2023-01-01', '-', 20),
(40, 'TRANSAKSI MASUK', 'HANS0001', '20-10-2023', '-', '-', 50),
(41, 'TRANSAKSI KELUAR', 'KD', '-', '2023-10-17', '-', 20),
(42, 'TRANSAKSI RUSAK', 'KD', '-', '-', '2023-10-17', 10),
(43, 'TRANSAKSI KELUAR', 'TISU0001', '-', '2023-10-17', '-', 400),
(44, 'TRANSAKSI KELUAR', 'TISU0001', '-', '2023-10-15', '-', 50),
(45, 'TRANSAKSI MASUK', 'ANTIA01', '2023-11-05', '-', '-', 10);

-- --------------------------------------------------------

--
-- Table structure for table `stok_barang`
--

CREATE TABLE `stok_barang` (
  `id_stok_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kadaluarsa` varchar(255) NOT NULL,
  `stok` int(20) NOT NULL,
  `satuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `stok_barang`
--

INSERT INTO `stok_barang` (`id_stok_barang`, `nama_barang`, `kadaluarsa`, `stok`, `satuan`) VALUES
('ANTIA01', 'Anti Sera A', '2024-06-30', 405, 'Botol'),
('ANTIB02', 'Anti Sera B', '2024-06-30', 395, 'Botol'),
('HANS0001', 'Hanscone', '2027-01-15', 550, 'Pak'),
('KD', 'Kantong Darah', '2024-10-20', 20, 'Pak'),
('KD0001', 'Kotak Darah', '-', 299, 'Pcs'),
('LDP0001', 'Label Darah Pasien', '-', 380, 'Lembar'),
('MEJ0002', 'Meja', '-', 28, 'Pcs'),
('PEN0001', 'Pensil', '-', 45, 'Pcs'),
('TISU0001', 'Tisu', '-', 50, 'Pak'),
('TRP0001', 'Tabung Reaksi Plastik 12 x 75', '2031-10-31', 300, 'Pcs');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`) VALUES
(1, 'logistik2023@gmail.com', 'logistik2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `barang_rusak`
--
ALTER TABLE `barang_rusak`
  ADD PRIMARY KEY (`id_rusak`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id_report`),
  ADD KEY `id_barang` (`id_barang`) USING BTREE;

--
-- Indexes for table `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`id_stok_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_keluar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_masuk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `barang_rusak`
--
ALTER TABLE `barang_rusak`
  MODIFY `id_rusak` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id_report` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `stok_barang` (`id_stok_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `stok_barang` (`id_stok_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_rusak`
--
ALTER TABLE `barang_rusak`
  ADD CONSTRAINT `barang_rusak_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `stok_barang` (`id_stok_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `stok_barang` (`id_stok_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
