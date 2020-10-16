-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2019 at 09:50 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmkg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(5) NOT NULL,
  `password` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `gempa`
--

CREATE TABLE `gempa` (
  `idgempa` int(11) NOT NULL,
  `idadmin` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `lat` decimal(6,3) DEFAULT NULL,
  `lon` decimal(6,3) DEFAULT NULL,
  `depth` double DEFAULT NULL,
  `mag` double DEFAULT NULL,
  `lokasi_1` varchar(255) NOT NULL,
  `lokasi_2` varchar(255) NOT NULL,
  `felt_1` varchar(255) NOT NULL,
  `felt_2` varchar(255) NOT NULL,
  `akibat_1` varchar(255) NOT NULL,
  `akibat_2` varchar(255) NOT NULL,
  `tsun` varchar(255) NOT NULL,
  `tsunami` varchar(255) NOT NULL,
  `source_1` varchar(255) NOT NULL,
  `source_2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gempa`
--

INSERT INTO `gempa` (`idgempa`, `idadmin`, `date`, `time`, `lat`, `lon`, `depth`, `mag`, `lokasi_1`, `lokasi_2`, `felt_1`, `felt_2`, `akibat_1`, `akibat_2`, `tsun`, `tsunami`, `source_1`, `source_2`) VALUES
(1, 0, '1903-02-27', '12:43:12', '-8.000', '106.000', 60, 8.1, '-', '-', 'Dirasakan', 'Banten VI MMI', 'Merusak', 'dinding retak-retak', 'Tsunami ', 'Tsunami , Cilacap Laut Jawa selatan', 'BMKG', 'BMKG'),
(2, 0, '1961-05-27', '04:32:05', '-8.500', '112.000', 113, 5.7, 'Jawa Timur', '-', 'Dirasakan', 'Campur darat dan kebonagung tulungagung, Banyumas jateng dan besuki jatim, jatisrana surakarta, klaten, Maos, Malang dan klakah, Demak Watu belah II MMI (Intensitas max VII di sekitar pusat gempa)', 'Merusak', 'Bangunan batubata di campur darat dan kebonagung Tulungaung rusak ringan', 'Tidak tsunami', '-', 'BMKG - Mitigasi', 'BMKG - Mitigasi'),
(3, 0, '1994-06-02', '06:17:34', '-10.480', '112.830', 18, 7.8, 'Jatim', 'Banyuwangi', 'Dirasakan', 'dirasakan di Banyuwangi III - IV MMI ; Jateng ; Jatim; Lombok dan Pulau Sumbawa', 'Merusak', 'tercatat 250 orang meninggal dunia, luka 423 orang, hilang 27 orang, 1500 rumah rusak hancur; 278 perahu tenggelam dan rusak', 'Tsunami', 'Tsunami di sepanjang pantai tenggara Jatim H max 13.9 m', 'BMKG - mitigasi', 'BMKG - mitigasi'),
(4, 0, '1998-09-28', '01:34:28', '-8.850', '112.380', 177, 6.3, 'Jatim', 'Blitar', 'Dirasakan', 'Blitar dan Bantul V-VI MMI; Malang; dirasakan merata di Jateng; Bali dan Sumbawa; Gempa kompleks dengan dua event terjadi dalam sekitar 3 detik', 'Merusak', 'meninggal 1 orang; 38 rumah hancur dan 62 lainya rusak di malang; beberapa banguna dan rumah rusak di Blitar  dan Bantur', 'Tidak tsunami', '-', 'BMKG - mitigasi', 'BMKG - mitigasi'),
(5, 0, '2004-12-14', '08:33:12', '-9.200', '111.100', 81, 4.7, 'Jawa Timur', 'pusat gempabumi berada di Samudra Indonesia lebih kurang 128 km S, Jawa Timur', 'Dirasakan', 'Sawahan III MMI', 'Tidak Merusak', '-', 'Tidak tsunami', '-', 'BMKG ', 'BMKG '),
(6, 0, '2004-05-13', '01:38:41', '-9.100', '111.250', 33, 4.9, 'Jawa Timur', 'Pusat gempabumi berada di Samudera Hindia lebih kurang 101 Km ara, Jawa Timur', 'Dirasakan', 'Malang II MMI', 'Tidak Merusak', '-', 'Tidak tsunami', '-', 'BMKG ', 'BMKG '),
(7, 0, '2005-04-01', '03:08:01', '-7.860', '113.900', 15, 4.8, 'Jawa Timur', 'Pusat gempabumi berada di darat lebih kurang 16 km arah timur Bon, Jawa Timur', 'Dirasakan', 'Situbondo III MMI', 'Tidak Merusak', '-', 'Tidak tsunami', '-', 'BMKG ', 'BMKG '),
(8, 0, '2005-06-11', '01:18:50', '-10.200', '110.900', 33, 5.4, 'Jawa Timur', 'Pusat gempa berada dilaut 265 km Barat Daya Blitar. , Jawa Timur', 'Dirasakan', 'Sawahan IV MMI', 'Tidak Merusak', '-', 'Tidak tsunami', '-', 'BMKG ', 'BMKG '),
(9, 0, '2005-01-01', '08:21:13', '-9.210', '112.590', 33, 5.6, 'Jawa Timur', 'Pusat Gempa berada di laut lebih kurang 119 Km Selatan Lumajang , Jawa Timur', 'Dirasakan', 'Karangkates III MMI', 'Tidak Merusak', '-', 'Tidak tsunami', '-', 'BMKG ', 'BMKG '),
(10, 0, '2007-10-20', '11:40:40', '-8.860', '111.480', 10, 5.4, 'Jawa Timur', 'Pusat gempa berada di laut 115 km Barat Daya Blitar , Jawa Timur', 'Dirasakan', 'Pacitan III MMI', 'Tidak Merusak', '-', 'Tidak tsunami', '-', 'BMKG ', 'BMKG ');

-- --------------------------------------------------------

--
-- Table structure for table `petir`
--

CREATE TABLE `petir` (
  `idpetir` int(11) NOT NULL,
  `idadmin` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `stroke` int(11) NOT NULL,
  `strong_stroke` int(11) NOT NULL,
  `noise` int(11) NOT NULL,
  `jumlah_energi` int(11) NOT NULL,
  `flash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petir`
--

INSERT INTO `petir` (`idpetir`, `idadmin`, `tanggal`, `stroke`, `strong_stroke`, `noise`, `jumlah_energi`, `flash`) VALUES
(2, 0, '2018-07-02', 874, 0, 537, 793, 846),
(3, 0, '2018-07-03', 1111, 0, 625, 999, 1082),
(4, 0, '2018-07-04', 2420, 0, 1010, 2421, 2209),
(5, 0, '2018-07-05', 882, 0, 487, 739, 866),
(6, 0, '2018-07-06', 226, 0, 164, 219, 221),
(7, 0, '2018-07-07', 547, 0, 375, 495, 539),
(8, 0, '2018-07-08', 729, 0, 513, 639, 723),
(9, 0, '2018-07-09', 1029, 0, 732, 896, 1011),
(10, 0, '2018-07-10', 301, 0, 242, 283, 283),
(11, 0, '2018-07-11', 334, 0, 323, 346, 315),
(12, 0, '2018-07-12', 166, 0, 150, 200, 158),
(13, 0, '2018-07-13', 196, 0, 226, 246, 193),
(14, 0, '2018-07-14', 146, 0, 245, 139, 144),
(15, 0, '2018-07-15', 46, 0, 138, 37, 44),
(16, 0, '2018-07-16', 127, 0, 139, 144, 127),
(17, 0, '2018-07-17', 252, 0, 201, 355, 240),
(18, 0, '2018-07-18', 212, 0, 136, 251, 205),
(19, 0, '2018-07-19', 100, 0, 65, 126, 98),
(20, 0, '2018-07-20', 66, 0, 70, 96, 65),
(21, 0, '2018-07-21', 157, 0, 112, 146, 153),
(22, 0, '2018-07-22', 918, 0, 402, 953, 820),
(23, 0, '2018-07-23', 188, 1, 117, 193, 170),
(24, 0, '2018-07-24', 286, 0, 266, 342, 277),
(25, 0, '2018-07-25', 269, 0, 158, 241, 263),
(26, 0, '2018-07-26', 378, 0, 262, 366, 368),
(27, 0, '2018-07-27', 493, 0, 348, 496, 485),
(28, 0, '2018-07-28', 547, 0, 429, 516, 540),
(29, 0, '2018-07-29', 572, 0, 395, 545, 563),
(30, 0, '2018-07-30', 470, 0, 324, 482, 455),
(31, 0, '2018-07-31', 812, 0, 852, 805, 792),
(32, 0, '2018-12-01', 8364, 0, 9990, 8364, 7079),
(33, 0, '2018-12-02', 9396, 1, 13303, 9396, 7500),
(34, 0, '2018-12-03', 10126, 0, 15386, 10126, 8027),
(35, 0, '2018-12-04', 13710, 0, 21100, 13710, 10848),
(36, 0, '2018-12-05', 23211, 0, 30680, 23211, 18691),
(37, 0, '2018-12-06', 15296, 0, 21104, 15296, 11595),
(38, 0, '2018-12-07', 20905, 1, 44155, 20905, 15512),
(39, 0, '2018-12-08', 36736, 0, 54272, 36736, 28044),
(40, 0, '2018-12-09', 19094, 0, 23936, 19094, 15755),
(41, 0, '2018-12-10', 38111, 1, 59351, 38111, 27853),
(42, 0, '2018-12-11', 21093, 3, 34252, 21093, 15115),
(43, 0, '2018-12-12', 45897, 2, 65928, 45897, 33226),
(44, 0, '2018-12-13', 23220, 16, 34794, 23220, 16156),
(45, 0, '2018-12-14', 21332, 6, 31451, 21332, 15439),
(46, 0, '2018-12-15', 26820, 3, 37504, 26820, 20389),
(47, 0, '2018-12-16', 3247, 0, 3979, 3247, 2874),
(48, 0, '2018-12-17', 2734, 0, 3177, 2734, 2326),
(49, 0, '2018-12-18', 8496, 1, 10795, 8496, 6331),
(50, 0, '2018-12-19', 9605, 11, 13072, 9605, 6863),
(51, 0, '2018-12-20', 9853, 0, 13852, 9853, 7256),
(52, 0, '2018-12-21', 22807, 13, 35167, 22807, 13025),
(53, 0, '2018-12-22', 47863, 27, 71977, 47863, 28859),
(54, 0, '2018-12-23', 29152, 0, 35738, 29152, 21975),
(55, 0, '2018-12-24', 4172, 0, 4440, 4172, 373),
(56, 0, '2018-12-25', 13601, 3, 17927, 13601, 10348),
(57, 0, '2018-12-26', 11457, 0, 15123, 11457, 8891),
(58, 0, '2018-12-27', 21901, 0, 25625, 21901, 17252),
(59, 0, '2018-12-28', 2945, 0, 3270, 2945, 2667),
(60, 0, '2018-12-29', 13974, 0, 20697, 13974, 9908),
(61, 0, '2018-12-30', 17754, 0, 23825, 17754, 13712),
(62, 0, '2018-12-31', 20594, 0, 26458, 20594, 15250);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `gempa`
--
ALTER TABLE `gempa`
  ADD PRIMARY KEY (`idgempa`);

--
-- Indexes for table `petir`
--
ALTER TABLE `petir`
  ADD PRIMARY KEY (`idpetir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gempa`
--
ALTER TABLE `gempa`
  MODIFY `idgempa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `petir`
--
ALTER TABLE `petir`
  MODIFY `idpetir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
