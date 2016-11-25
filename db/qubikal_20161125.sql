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
CREATE DATABASE IF NOT EXISTS `qubikal` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `qubikal`;

-- Dumping structure for table qubikal.qu_category
CREATE TABLE IF NOT EXISTS `qu_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `photo_count` int(11) DEFAULT '0',
  `created_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `qu_category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_qu_category_qu_category` (`qu_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table qubikal.qu_category: ~8 rows (approximately)
/*!40000 ALTER TABLE `qu_category` DISABLE KEYS */;
REPLACE INTO `qu_category` (`id`, `name`, `image_path`, `photo_count`, `created_date`, `qu_category_id`) VALUES
	(1, 'Flower', 'assets/images/page-1_img3.jpg', 3421, '2016-11-24 08:37:01', 0),
	(2, 'House', 'assets/images/page-1_img3.jpg', 4213, '2016-11-24 08:37:02', 0),
	(3, 'Roses', 'assets/images/page-1_img2.jpg', 11234, '2016-11-24 08:37:13', 0),
	(4, 'White Roses', 'assets/images/page-1_img1.jpg', 2234, '2016-11-24 08:37:10', 3),
	(5, 'Baclk Roses', 'assets/images/page-1_img3.jpg', 4321, '2016-11-24 08:37:02', 3),
	(6, 'Car', 'assets/images/page-1_img1.jpg', 4311, '2016-11-24 08:37:07', 0),
	(7, 'Nature', 'assets/images/page-1_img2.jpg', 2321, '2016-11-24 08:37:16', 0),
	(11, 'Computer', '', 0, NULL, 0);
/*!40000 ALTER TABLE `qu_category` ENABLE KEYS */;

-- Dumping structure for table qubikal.qu_photos
CREATE TABLE IF NOT EXISTS `qu_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT 'Qubikal',
  `description` varchar(255) NOT NULL DEFAULT 'Qubikal',
  `image_path` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `qu_category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_qu_category_qu_category` (`qu_category_id`),
  CONSTRAINT `FK_qu_photos_qu_category` FOREIGN KEY (`qu_category_id`) REFERENCES `qu_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table qubikal.qu_photos: ~4 rows (approximately)
/*!40000 ALTER TABLE `qu_photos` DISABLE KEYS */;
REPLACE INTO `qu_photos` (`id`, `name`, `description`, `image_path`, `created_date`, `qu_category_id`) VALUES
	(1, 'Tulip flowers', 'Qubikal', 'assets/images/page-1_img3.jpg', '2016-11-24 08:36:46', 5),
	(2, 'Check this out', 'Qubikal', 'assets/images/page-1_img3.jpg', '2016-11-24 08:36:47', 5),
	(3, 'Hey this is a mazing', 'Qubikal', 'assets/images/page-1_img2.jpg', '2016-11-24 18:06:42', 4),
	(4, 'Roses represent for love', 'Qubikal', 'assets/images/page-1_img2.jpg', '2016-11-24 08:36:50', 1);
/*!40000 ALTER TABLE `qu_photos` ENABLE KEYS */;

-- Dumping structure for table qubikal.qu_user
CREATE TABLE IF NOT EXISTS `qu_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT 'guest',
  `full_name` varchar(50) DEFAULT 'Guest',
  `image_path` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `instagram_id` varchar(255) DEFAULT NULL,
  `intagram_access_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_qu_category_qu_category` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table qubikal.qu_user: ~3 rows (approximately)
/*!40000 ALTER TABLE `qu_user` DISABLE KEYS */;
REPLACE INTO `qu_user` (`id`, `user_id`, `user_name`, `full_name`, `image_path`, `bio`, `website`, `created_date`, `instagram_id`, `intagram_access_token`) VALUES
	(1, NULL, 'administrator', 'Administrator', 'assets/images/page-1_img1.jpg', NULL, NULL, '2016-11-24 10:26:58', NULL, NULL),
	(2, NULL, 'guest', 'Guest', 'assets/images/page-1_img2.jpg', NULL, NULL, '2016-11-24 10:27:02', NULL, NULL),
	(3, NULL, 'huy_trieu', 'Huy Trieu', 'assets/images/page-1_img2.jpg', NULL, NULL, '2016-11-24 10:27:40', NULL, NULL);
/*!40000 ALTER TABLE `qu_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
