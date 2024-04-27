-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 27, 2024 at 02:33 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pweb-pr`
--

-- --------------------------------------------------------

--
-- Table structure for table `usertopup`
--

CREATE TABLE `usertopup` (
  `ID_Pelanggan` varchar(255) NOT NULL,
  `Pelanggan` char(125) NOT NULL,
  `Kategori_Game` enum('Mobile Legend','Pubg Mobile','Aov') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Tanggal_Masuk` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Perkiraan_Selesai` varchar(125) NOT NULL,
  `Status` enum('Proses','Selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Nomor_Hp` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usertopup`
--

INSERT INTO `usertopup` (`ID_Pelanggan`, `Pelanggan`, `Kategori_Game`, `Tanggal_Masuk`, `Perkiraan_Selesai`, `Status`, `Nomor_Hp`) VALUES
('1', 'Raul', 'Mobile Legend', '2024-04-21 22:55:52', '3 Hari', 'Proses', '083-345-123-432'),
('2', 'Vian', 'Pubg Mobile', '2024-04-21 22:58:33', '5 Hari', 'Proses', '085-123-653-864'),
('3', 'Faiq', 'Aov', '2024-04-21 22:59:15', '2 Hari', 'Selesai', '083-346-675-123'),
('4', 'Faris', 'Mobile Legend', '2024-04-21 23:00:19', '1 Minggu', 'Selesai', '087-453-654-323');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usertopup`
--
ALTER TABLE `usertopup`
  ADD PRIMARY KEY (`ID_Pelanggan`),
  ADD UNIQUE KEY `Nomor_Hp` (`Nomor_Hp`),
  ADD UNIQUE KEY `Nomor_Hp_2` (`Nomor_Hp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
