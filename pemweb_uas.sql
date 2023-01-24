-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 02:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemweb_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id_job` int(11) NOT NULL,
  `nama_job` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `umur` varchar(200) NOT NULL,
  `pendidikan` varchar(200) NOT NULL,
  `tempat` varchar(200) NOT NULL,
  `tanggung_jawab` text NOT NULL,
  `keahlian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id_job`, `nama_job`, `gender`, `umur`, `pendidikan`, `tempat`, `tanggung_jawab`, `keahlian`) VALUES
(1, 'Frontend Developer', 'Laki-laki / Perempuan', 'Maksimal 30', 'Minimal S1', 'Bandung', 'Bertanggung jawab', 'html, css, js'),
(3, 'Backend Developer', 'Perempuan', '25 tahun', 'S1', 'Bandung', 'membantu untuk membuat logic sistem', 'php'),
(4, 'UI/UX Designer', 'laki-laki', 'Maksimal 30', 'D3/S1', 'Bekasi', 'Membuat tampilan UI, dan membuat design menggunakan figma', 'jago figma, skratch, photoshop'),
(5, 'Data Analityc', 'Laki-laki/Perempuan', 'Maksimal 30 Tahun', 'Minimal S1', 'Bandung', 'Membuat data menjadi lebih baik untuk dikelola', 'Python, Jupyter');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id_job`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
