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

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
