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

-- Dumping structure for table qubikal.qu_user
DROP TABLE IF EXISTS `qu_user`;
CREATE TABLE IF NOT EXISTS `qu_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT 'guest',
  `full_name` varchar(50) DEFAULT 'Guest',
  `image_path` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `access_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_qu_category_qu_category` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table qubikal.qu_user: ~3 rows (approximately)
/*!40000 ALTER TABLE `qu_user` DISABLE KEYS */;
REPLACE INTO `qu_user` (`id`, `user_id`, `user_name`, `full_name`, `image_path`, `created_date`, `access_token`) VALUES
	(1, NULL, 'administrator', 'Administrator', 'assets/images/page-1_img1.jpg', '2016-11-24 10:26:58', NULL),
	(2, NULL, 'guest', 'Guest', 'assets/images/page-1_img2.jpg', '2016-11-24 10:27:02', NULL),
	(3, NULL, 'huy_trieu', 'Huy Trieu', 'assets/images/page-1_img2.jpg', '2016-11-24 10:27:40', NULL);
/*!40000 ALTER TABLE `qu_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
