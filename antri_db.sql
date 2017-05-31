-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2017 at 10:22 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antri_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `poliklinik`
--

CREATE TABLE `poliklinik` (
  `id` int(11) NOT NULL,
  `kode_poli` varchar(10) NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poliklinik`
--

INSERT INTO `poliklinik` (`id`, `kode_poli`, `nama_poli`, `nama_dokter`, `no_tlp`, `alamat`, `photo`) VALUES
(1, 'P012', 'Poli Gigi', 'dr. Aswar Amrul, S.Kom', '085796782236', 'Bulukumba', ''),
(2, 'hghgh', 'jhghjgj', 'gjhgjhg', '76786', 'hjgjhg', ''),
(3, 'uuiyiuy', 'uyuiui', 'hgfgfh', '6876', 'gjhgjhghj', '1484841411205.jpg'),
(4, 'tuytyudts', 'yutuyut', 'yutuy', '7786868', 'uytyutu', '1484841474429.jpg'),
(5, 'ghfhgafsha', 'gfhgfhf', 'hgghgjh', '567567576', 'fgfdhsds', ''),
(6, 'uytytyutu', 'Poli Gigi', 'jkhj', '6787', 'khkjk', ''),
(7, 'fgfsfas', 'gahgsjh', 'hghagsj', '6876876', 'jhasgajshga', '');

-- --------------------------------------------------------

--
-- Table structure for table `reg_pasien`
--

CREATE TABLE `reg_pasien` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_pasien` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `jk` enum('Pria','Wanita') CHARACTER SET utf8 DEFAULT NULL,
  `usia` int(150) NOT NULL,
  `alamat` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `tgl_reg` date DEFAULT NULL,
  `no_tlp` varchar(15) CHARACTER SET utf8 NOT NULL,
  `poli` varchar(30) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_pasien`
--

INSERT INTO `reg_pasien` (`id`, `kode_pasien`, `nama`, `jk`, `usia`, `alamat`, `tgl_reg`, `no_tlp`, `poli`, `photo`) VALUES
(2, 'Garrett', 'Winters', 'Pria', 90, 'Tokyo', '1988-09-02', 'uyiusyf', 'umum', '1484832621547.jpg'),
(3, 'John', 'Doe', '', 0, 'Kansas', '1972-11-02', '', '', NULL),
(4, 'Tatyana', 'Fitzpatrick', '', 0, 'London', '1989-01-01', '', '', NULL),
(10, 'aasasasasa', 'aada', '', 0, 'mbnmbm', '2017-01-19', '', '', '1484766122788.jpg'),
(11, 'aaaaaaaaaa', 'jhghjgj', '', 0, 'bhjg', '2017-01-18', '', '', '1484766109915.jpg'),
(12, 'acca', 'afadaaa', '', 0, 'gxajsa', '2017-01-25', '', '', '1484803631024.jpg'),
(13, 'asas', 'asasa', '', 0, 'sasa', '2017-01-31', '', '', '1484806866956.jpg'),
(15, 'asas1', 'asasa', '', 0, 'sasasas', '2017-01-23', '', '', '1484806935594.jpg'),
(16, 'fada', 'aswar', '', 0, 'sjahsasgj', '2017-01-31', '', '', '1484807306042.jpg'),
(1133, '7871', 'jhsgahgsja', '', 0, 'ajshkjah', '2017-01-13', '', '', '1484807558832.jpg'),
(1134, 'asasas', 'asas', '', 0, 'asgahsgajhs', '2017-01-13', '', '', '1484807688355.jpg'),
(1138, '111', 'accca', 'Pria', 91, 'Ponci', '2017-01-19', '94728492', 'umum', '1484810866755.jpg'),
(1139, 'A32111', 'Aswar amrul', 'Pria', 90, 'Pondok ', '2017-01-19', '087578923244', 'umum', '1484813069923.jpg'),
(1141, '565367', 'Aswar Amrul', 'Pria', 98, 'jdkhadj', '2017-01-21', '77468724', 'umum', '1484830889411.jpg'),
(1142, 'acccax', 'gfgas', 'Wanita', 76, 'dggasdfag', '2017-01-18', '7675764', 'gigi', '1484831025985.jpg'),
(1144, '67832hj', 'hjgh', 'Wanita', 67, 'hjgjh', '2017-01-19', '78789', 'umum', '1484831790389.jpg'),
(1145, '4656', 'Saladoti', 'Pria', 76, 'ghjghjg', '2017-01-19', '6878', 'umum', '1484833406801.jpg'),
(1147, '12341234', 'qeetert', 'Wanita', 67, 'alalalal', '2017-01-20', '8979798798', 'gigi', '1484842785824.jpg'),
(1148, '21212121', 'yuiyy', 'Pria', 21, 'hjhkjk', '2017-01-20', '67868', 'gigi', '1484843037094.jpg'),
(1149, '6786', 'hgjghjhgjg', 'Pria', 76, 'fhgfghg', '2017-01-20', '675765765', 'umum', '1484876722136.jpg'),
(1152, 'tututiui', 'tytyutyut', 'Pria', 78, 'hkjhkjhk', '2017-01-21', '8797987', 'gigi', '1484933149288.jpg'),
(1153, 'uiui', 'kjhkj', 'Pria', 767, 'hgjhggh', '2017-01-21', 'gjhgj', 'umum', '1484933473313.jpg'),
(1154, '678687686', 'ghhgjg', 'Pria', 0, 'jkhkj', '2017-01-21', '7687', 'umum', '1484934563518.jpg'),
(1155, 'A', 'Acca', 'Pria', 78, 'lajzgsf', '2017-01-21', 'hgshqghsjq', 'umum', '1484979907369.jpg'),
(1157, 'gjh', 'hjhhasakjh', 'Pria', 67, 'akjshak', '2017-01-21', '68687', 'umum', '1484983478862.jpg'),
(1159, '117', 'Andi Felmi Alfianan Manaengkacole', 'Wanita', 90, 'Kos', '2017-01-21', '085657133649', 'kia', '1484989956827.jpg'),
(1162, 'KHU4213', 'Khaern Situncu', 'Pria', 90, 'Sudiang', '2017-01-03', '09625241422', 'Poli Umum', '1485055902334.jpg'),
(1163, 'AJHgshg', 'gjhgsjagsa', 'Pria', 676, 'agshajhgshj', '2017-01-22', '7687', 'Poli Umum', '1485057716815.jpg'),
(1164, '76486234', 'Indah', 'Wanita', 76, 'Kos', '2017-01-04', '674762384', 'Poli Gigi', '1485062626871.jpg'),
(1165, '53725372', 'accacacc', 'Pria', 67, 'hjskhfkjshdf', '0000-00-00', '9365378', 'Poli Umum', '1485071234670.jpg'),
(1166, 'ACCACACAC', 'jhkjshkjhkd', 'Pria', 65, 'hjkhhkjh', '2017-01-31', '757657', 'Poli Gigi', '1485072036210.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg_pasien`
--
ALTER TABLE `reg_pasien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_pasien` (`kode_pasien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poliklinik`
--
ALTER TABLE `poliklinik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `reg_pasien`
--
ALTER TABLE `reg_pasien`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1167;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
