-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2016 at 01:39 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qubikal`
--

-- --------------------------------------------------------

--
-- Table structure for table `qu_category`
--

CREATE TABLE `qu_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL,
  `photo_count` int(11) DEFAULT '0',
  `created_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `qu_category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qu_category`
--

REPLACE INTO `qu_category` (`id`, `name`, `key`, `photo_count`, `created_date`, `qu_category_id`) VALUES
(17, 'alive', '-KXsWm4BlgnnkNFn8ps9', 0, NULL, 16),
(18, 'vbvb', '-KXz2FIXgAe6FK7O1-XC', 0, NULL, 17),
(19, 'vbvbvbvbvbvb', '-KXz2FmgZ_hgRLHWo8Hd', 0, NULL, 18),
(20, 'vbvbvbvbvbvb', '-KXz2FoLVSF-aWWEaCKZ', 0, NULL, 19),
(21, 'New Cars', '-KXodvH_9J9eSg259ieQ', 0, NULL, 0),
(22, 'BMW''s', '-KXsVLqJ0goUSbvZQjkb', 0, NULL, 21),
(23, 'Ferraris', '-KXsVOIn0vI8zg7kS___', 0, NULL, 22),
(24, 'Lampogini', '-KXsVSBZj6I8SSb4WvKX', 0, NULL, 23),
(25, 'Mercedes', '-KXsVVyQIAp7-NEiOGYI', 0, NULL, 24),
(26, 'Mercedes', '-KXsVWOrZrul027tO50w', 0, NULL, 25),
(27, 'new category', '-KXpiM8ioLPibb2GPeuu', 0, NULL, 0),
(28, 'blackhole', '-KXpiOtQT1Dq5GrP7ebc', 0, NULL, 0),
(29, 'powers', '-KXsVhMy8MFJjROb1QSs', 0, NULL, 28),
(30, 'light', '-KXsVitAPQW9krmRhc92', 0, NULL, 29),
(31, 'X-Ray', '-KXsVnCH2jm-sAd0eMHs', 0, NULL, 30),
(32, 'vbnj gfds', '-KXxieRsbjl3cb5Tdz_U', 0, NULL, 0),
(33, 'mnb', '-KXxihAdz24NVoS5uvBi', 0, NULL, 32),
(34, 'abc12345678', '-KXodnp3ASQ4_RV5fUuP', 0, NULL, 0),
(35, 'smdbdsn sdgfgh sdh dsdsfh ', '-KXsWgJflpKiw4fYrufE', 0, NULL, 34),
(36, 'fucking nightmare', '-KXsWkNoupSf8J1Gexox', 0, NULL, 35);

-- --------------------------------------------------------

--
-- Table structure for table `qu_photos`
--

CREATE TABLE `qu_photos` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT 'Qubikal',
  `description` varchar(255) NOT NULL DEFAULT 'Qubikal',
  `image_path` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `qu_category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `qu_photos`
--

REPLACE INTO `qu_photos` (`id`, `name`, `description`, `image_path`, `created_date`, `qu_category_id`) VALUES
(1446, '-KXz2AYw8INh3-VgMJEG', '-KXz2AYw8INh3-VgMJEG', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 17),
(1447, '-KXz2AhvQsy9iy2Kx4IQ', '-KXz2AhvQsy9iy2Kx4IQ', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 17),
(1448, '-KXz2Ar5p0hYhQSZ49Q2', '-KXz2Ar5p0hYhQSZ49Q2', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 17),
(1449, '-KXz2AzSwosgNGYmqYuV', '-KXz2AzSwosgNGYmqYuV', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 17),
(1450, '-KXz2B7ZHisUs5oRKYo6', '-KXz2B7ZHisUs5oRKYo6', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 17),
(1451, '-KXz2BEDi_LploPtd7VB', '-KXz2BEDi_LploPtd7VB', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 17),
(1452, '-KXz2GXz1FQV21zDh58R', '-KXz2GXz1FQV21zDh58R', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 19),
(1453, '-KXz2HBGDf1yz0giCHey', '-KXz2HBGDf1yz0giCHey', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 19),
(1454, '-KXz2HNQD2hu0S9x4WOx', '-KXz2HNQD2hu0S9x4WOx', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 19),
(1455, '-KXxkmc0NlRpakepFvTM', '-KXxkmc0NlRpakepFvTM', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 22),
(1456, '-KXxknO0BoiSLuInKKPf', '-KXxknO0BoiSLuInKKPf', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 22),
(1457, '-KXxknu_XV7T8WF8Nb8C', '-KXxknu_XV7T8WF8Nb8C', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 22),
(1458, '-KXz1Pxjt7vDhPungmE5', '-KXz1Pxjt7vDhPungmE5', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 22),
(1459, '-KXz1QNWiApwpbO2GqD0', '-KXz1QNWiApwpbO2GqD0', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 22),
(1460, '-KXxdIJYE_QGS3V26hvI', '-KXxdIJYE_QGS3V26hvI', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 24),
(1461, '-KXxhpLB458BGp04g54-', '-KXxhpLB458BGp04g54-', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 24),
(1462, '-KXxiOzi5tIXAuU9AA1v', '-KXxiOzi5tIXAuU9AA1v', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 26),
(1463, '-KXxiPOZUZsV70vh4ry8', '-KXxiPOZUZsV70vh4ry8', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 26),
(1464, '-KXxiQ2PnT99i4N4kq86', '-KXxiQ2PnT99i4N4kq86', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 26),
(1465, '-KXxiiZlPJ5DIsoqY7dz', '-KXxiiZlPJ5DIsoqY7dz', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 33),
(1466, '-KXxij3170ni3hnI8IzS', '-KXxij3170ni3hnI8IzS', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 33),
(1467, '-KYwGHRk1tIh_YCw7Z-_', '-KYwGHRk1tIh_YCw7Z-_', 'https://www.daimler.com/bilder/produkte/pkw/mercedes-benz/s-klasse/mercedes-benz-s-klasse-coupe-w900xh360-cutout.jpg', NULL, 33);

-- --------------------------------------------------------

--
-- Table structure for table `qu_user`
--

CREATE TABLE `qu_user` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT 'guest',
  `full_name` varchar(50) DEFAULT 'Guest',
  `image_path` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `instagram_id` varchar(255) DEFAULT NULL,
  `intagram_access_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `qu_user`
--

REPLACE INTO `qu_user` (`id`, `user_id`, `user_name`, `full_name`, `image_path`, `bio`, `website`, `created_date`, `instagram_id`, `intagram_access_token`) VALUES
(1, NULL, 'administrator', 'Administrator', 'assets/images/page-1_img1.jpg', NULL, NULL, '2016-11-24 10:26:58', NULL, NULL),
(2, NULL, 'guest', 'Guest', 'assets/images/page-1_img2.jpg', NULL, NULL, '2016-11-24 10:27:02', NULL, NULL),
(3, NULL, 'huy_trieu', 'Huy Trieu', 'assets/images/page-1_img2.jpg', NULL, NULL, '2016-11-24 10:27:40', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qu_category`
--
ALTER TABLE `qu_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`),
  ADD KEY `FK_qu_category_qu_category` (`qu_category_id`);

--
-- Indexes for table `qu_photos`
--
ALTER TABLE `qu_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_qu_category_qu_category` (`qu_category_id`);

--
-- Indexes for table `qu_user`
--
ALTER TABLE `qu_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_qu_category_qu_category` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qu_category`
--
ALTER TABLE `qu_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `qu_photos`
--
ALTER TABLE `qu_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1468;
--
-- AUTO_INCREMENT for table `qu_user`
--
ALTER TABLE `qu_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `qu_photos`
--
ALTER TABLE `qu_photos`
  ADD CONSTRAINT `FK_qu_photos_qu_category` FOREIGN KEY (`qu_category_id`) REFERENCES `qu_category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
