-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for qubikal
DROP DATABASE IF EXISTS `qubikal`;
CREATE DATABASE IF NOT EXISTS `qubikal` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `qubikal`;

-- Dumping structure for table qubikal.qu_category
DROP TABLE IF EXISTS `qu_category`;
CREATE TABLE IF NOT EXISTS `qu_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `photo_count` int(11) DEFAULT '0',
  `created_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `qu_category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_qu_category_qu_category` (`qu_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table qubikal.qu_category: ~5 rows (approximately)
/*!40000 ALTER TABLE `qu_category` DISABLE KEYS */;
REPLACE INTO `qu_category` (`id`, `name`, `image_path`, `photo_count`, `created_date`, `qu_category_id`) VALUES
	(1, 'Flower', 'assets/images/page-1_img3.jpg', 3421, '2016-11-24 08:37:01', 0),
	(2, 'House', 'assets/images/page-1_img3.jpg', 4213, '2016-11-24 08:37:02', 0),
	(3, 'Roses', 'assets/images/page-1_img2.jpg', 11234, '2016-11-24 08:37:13', 0),
	(4, 'White Roses', 'assets/images/page-1_img1.jpg', 2234, '2016-11-24 08:37:10', 3),
	(5, 'Baclk Roses', 'assets/images/page-1_img3.jpg', 4321, '2016-11-24 08:37:02', 3),
	(6, 'Car', 'assets/images/page-1_img1.jpg', 4311, '2016-11-24 08:37:07', 0),
	(7, 'Nature', 'assets/images/page-1_img2.jpg', 2321, '2016-11-24 08:37:16', 0);
/*!40000 ALTER TABLE `qu_category` ENABLE KEYS */;

-- Dumping structure for table qubikal.qu_photos
DROP TABLE IF EXISTS `qu_photos`;
CREATE TABLE IF NOT EXISTS `qu_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT 'Qubikal',
  `image_path` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `qu_category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_qu_category_qu_category` (`qu_category_id`),
  CONSTRAINT `FK_qu_photos_qu_category` FOREIGN KEY (`qu_category_id`) REFERENCES `qu_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table qubikal.qu_photos: ~4 rows (approximately)
/*!40000 ALTER TABLE `qu_photos` DISABLE KEYS */;
REPLACE INTO `qu_photos` (`id`, `name`, `image_path`, `created_date`, `qu_category_id`) VALUES
	(1, 'Tulip flowers', 'assets/images/page-1_img3.jpg', '2016-11-24 08:36:46', 5),
	(2, 'Check this out', 'assets/images/page-1_img3.jpg', '2016-11-24 08:36:47', 5),
	(3, 'Hey this is a mazing', 'assets/images/page-1_img1.jpg', '2016-11-24 08:36:55', 4),
	(4, 'Roses represent for love', 'assets/images/page-1_img2.jpg', '2016-11-24 08:36:50', 1);
/*!40000 ALTER TABLE `qu_photos` ENABLE KEYS */;

-- Dumping structure for table qubikal.qu_user
DROP TABLE IF EXISTS `qu_user`;
CREATE TABLE IF NOT EXISTS `qu_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_name` varchar(50) DEFAULT 'guest',
  `full_name` varchar(50) DEFAULT 'Guest',
  PRIMARY KEY (`id`),
  KEY `FK_qu_category_qu_category` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table qubikal.qu_user: ~2 rows (approximately)
/*!40000 ALTER TABLE `qu_user` DISABLE KEYS */;
REPLACE INTO `qu_user` (`id`, `created_date`, `user_name`, `full_name`) VALUES
	(1, '2016-11-23 11:27:16', 'administrator', 'Administrator'),
	(2, '2016-11-23 11:27:20', 'guest', 'Guest');
/*!40000 ALTER TABLE `qu_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
