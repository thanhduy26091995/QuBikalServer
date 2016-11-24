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

-- Dumping structure for table qubikal.qu_photos
DROP TABLE IF EXISTS `qu_photos`;
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

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
