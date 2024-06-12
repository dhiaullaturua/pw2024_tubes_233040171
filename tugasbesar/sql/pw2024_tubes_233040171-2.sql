-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2024 at 12:33 PM
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
-- Database: `pw2024_tubes_233040171`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admins`
--

CREATE TABLE `Admins` (
  `id` int(11) NOT NULL,
  `nik` char(20) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `asal kota` varchar(64) NOT NULL,
  `gambar` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Admins`
--

INSERT INTO `Admins` (`id`, `nik`, `nama`, `email`, `asal kota`, `gambar`) VALUES
(1, '8171020309020004', 'Muhammad Dhiaulhaq triyudhistira Laturua', 'laturuadhiaul@gmail.com', 'Ambon', '');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nrp` char(9) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `jurusan` varchar(64) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nrp`, `nama`, `email`, `jurusan`, `gambar`) VALUES
(50, '233040143', 'Novan Ramanda', 'NovanRmd@gmail.com', 'TIF', 'novan.jpeg'),
(52, '233040137', 'Rafi Adyatma', 'RafiAdy@gmail.com', 'Teknik Mahjong', 'Rafi.jpeg'),
(53, '233040167', 'Dennis Setya', 'Dontol@gmail.com', 'Teknik bernard', 'dontol.jpeg'),
(54, '233040140', 'Muhammad Roy Silban', 'MuhammadRoy@gmail.com', 'Teknik Panjat Pinang', 'roy.jpeg'),
(72, '233040171', 'Ulboyyy', 'ulyagesya@gmail.com', 'Teknik Seribu Bayangan', 'ulboy.jpeg'),
(79, 'asd', 'asd', 'asd@gmail.com', 'asd', '666972301bf6b.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE `users1` (
  `id` int(11) NOT NULL,
  `namauser` varchar(50) NOT NULL,
  `katasandi` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`id`, `namauser`, `katasandi`, `id_role`) VALUES
(4, 'dontol', '$2y$10$KGnILStjIAeDOYgLkZHyb.XW9FogOJWLMiEYEy19KTX5OsLjgCJU6', 2),
(6, 'rudol', '$2y$10$qixZOIuh5P2UV3R3RsFEQebXIGVQ8ppI6Q4cpF6zpRd//oeoCcmMi', 2),
(7, 'agilcantik', '$2y$10$zUk8bMreulheNzh8DZB/Re5pD4bKTOzxGK.K9c5w84bSnW7ZHSu1m', 2),
(9, 'novan', '$2y$10$FJ48KZy/rKqLHq28v.T3Tu.zp4OQQh6KxtbbXrSmc1sF.jFyAov2K', 2),
(14, 'eno', '$2y$10$/Qj1NbjE.Xs5.9CNP/zutuRHeci5qsiTz7su05KCfALVYWLJLz6xC', 2),
(15, 'ulboyyy', '$2y$10$RFL9L0aH/iDbrxCeQfbUSeZazyr1mnk76XN10f3/slL2xF1XNzK9q', 1),
(16, 'ul', '$2y$10$kND.mKWBBE1llUQFeuDz8uKz9tntjeAjR65R.aTAKeEzQgGAVVUWu', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admins`
--
ALTER TABLE `Admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users1`
--
ALTER TABLE `users1`
  ADD CONSTRAINT `users1_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
