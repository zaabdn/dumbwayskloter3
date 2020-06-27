-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2020 at 10:30 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wilayah`
--

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten_tb`
--

CREATE TABLE `kabupaten_tb` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `diresmikan` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kabupaten_tb`
--

INSERT INTO `kabupaten_tb` (`id`, `nama`, `provinsi_id`, `diresmikan`, `photo`) VALUES
(1, 'Kota Surabaya', 1, '31 Mei 1293', 'https://i.pinimg.com/originals/5c/90/30/5c9030f78d0774dbb0fe9c17d9051855.png'),
(2, 'Kabupaten Gresik', 1, '8 Maret 1488', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Lambang_Kabupaten_Gresik.png/1200px-Lambang_Kabupaten_Gresik.png'),
(3, 'Kota Bandung', 2, '‎25 September 1810', 'https://upload.wikimedia.org/wikipedia/commons/e/e8/Lambang_Kota_Bandung.svg'),
(4, 'Kota Bekasi', 2, '15 Agustus 1950', 'https://2.bp.blogspot.com/-8eBbJD9nDzQ/ULsWjjig92I/AAAAAAAAB6o/k-U60nRwK-A/s1600/lambang+kota+Bekasi.jpg'),
(5, 'Denpasar', 3, '27 Februari 1788', 'https://upload.wikimedia.org/wikipedia/commons/6/65/Lambang_Kota_Denpasar_%281%29.png');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi_tb`
--

CREATE TABLE `provinsi_tb` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `diresmikan` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `pulau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi_tb`
--

INSERT INTO `provinsi_tb` (`id`, `nama`, `diresmikan`, `photo`, `pulau`) VALUES
(1, 'Jawa Timur', '26 November 1948', 'https://upload.wikimedia.org/wikipedia/commons/7/74/Coat_of_arms_of_East_Java.svg', 'Jawa'),
(2, 'Jawa Barat', '19 Agustus 1945', 'https://upload.wikimedia.org/wikipedia/commons/0/07/West_Java_coa.png', 'Jawa'),
(3, 'Bali', '14 Agustus 1959', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Coat_of_arms_of_Bali.svg/1200px-Coat_of_arms_of_Bali.svg.png', 'Bali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kabupaten_tb`
--
ALTER TABLE `kabupaten_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provinsi_id` (`provinsi_id`);

--
-- Indexes for table `provinsi_tb`
--
ALTER TABLE `provinsi_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kabupaten_tb`
--
ALTER TABLE `kabupaten_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `provinsi_tb`
--
ALTER TABLE `provinsi_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kabupaten_tb`
--
ALTER TABLE `kabupaten_tb`
  ADD CONSTRAINT `kabupaten_tb_ibfk_1` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
