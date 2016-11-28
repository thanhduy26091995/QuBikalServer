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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table qubikal.qu_category: ~2 rows (approximately)
/*!40000 ALTER TABLE `qu_category` DISABLE KEYS */;
REPLACE INTO `qu_category` (`id`, `name`, `image_path`, `photo_count`, `created_date`, `qu_category_id`) VALUES
	(4, 'None Category', 'assets/images/page-1_img1.jpg', 2234, '2016-11-28 08:14:04', 0),
	(5, 'Sub None Category', 'assets/images/page-1_img3.jpg', 4321, '2016-11-28 08:14:13', 4);
/*!40000 ALTER TABLE `qu_category` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=1445 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table qubikal.qu_photos: ~33 rows (approximately)
/*!40000 ALTER TABLE `qu_photos` DISABLE KEYS */;
REPLACE INTO `qu_photos` (`id`, `name`, `description`, `image_path`, `created_date`, `qu_category_id`) VALUES
	(1412, 'Sub None Category', 'Niềm vui nho nhỏ khi upload =)))', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/14474268_347122648985718_1722286348167020544_n.jpg?ig_cache_key=MTM5MTkwNjU1MzcxMjIwMDgxOA%3D%3D.2', NULL, 5),
	(1413, 'Sub None Category', 'Cuối tuần như đầu tuần :v', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/15043735_734088466743834_1697886355490603008_n.jpg?ig_cache_key=MTM4NzU3NjUwNTEwNjYzODc5MQ%3D%3D.2', NULL, 5),
	(1414, 'Sub None Category', 'Đăng ảnh tạm con nhà họ :3', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/c0.135.1080.1080/14714615_1005381936255577_4770578879003754496_n.jpg?ig_cache_key=MTM3NzY0NzY3ODcyNTA5NDQyMg%3D%3D.2.c', NULL, 5),
	(1415, 'Sub None Category', 'Làm sao về được mùa đông, mùa đông đôi bờ cát trắng', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/14714480_172577176536259_8461614236349497344_n.jpg?ig_cache_key=MTM3MzY4OTE5MTI2MzUxOTY3Nw%3D%3D.2', NULL, 5),
	(1416, 'Sub None Category', 'Lại thèm bánh canh mami :3', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/14606934_1155427724543261_23036306200199168_n.jpg?ig_cache_key=MTM3Mjk5MTczMzA5MzA2NTQ3Mw%3D%3D.2', NULL, 5),
	(1417, 'Sub None Category', 'Một buổi sáng như bao buổi tối :v', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/14659434_557275314472223_4283231929223872512_n.jpg?ig_cache_key=MTM3MjIxODkyMjUzMTM3Njg5OQ%3D%3D.2', NULL, 5),
	(1418, 'Sub None Category', 'Thèm cơm mạ nấu :v', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/14718421_1656594858004565_1012348023872684032_n.jpg?ig_cache_key=MTM2NzM1MjA5ODE0ODkxODY1MA%3D%3D.2', NULL, 5),
	(1419, 'Sub None Category', ':v Quẩy nào', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/14659292_661547517352803_5865750060075057152_n.jpg?ig_cache_key=MTM2NjUyMjQxODk2NTYzOTI0NQ%3D%3D.2', NULL, 5),
	(1420, 'Sub None Category', 'Cũng chưa lần nào được ôm trọn vẹn một ai đó :)', 'https://scontent.cdninstagram.com/t51.2885-15/s320x320/e35/14730627_646527705525890_5769144198204751872_n.jpg?ig_cache_key=MTM2NDYyODMxOTM3MTEzOTk2MA%3D%3D.2', NULL, 5),
	(1421, 'Sub None Category', 'Lại ưa bỏ việc đi trốn :)', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/14574255_182274695555144_1720144018479775744_n.jpg?ig_cache_key=MTM2MzU0MDYyMzYxNzczOTIxOA%3D%3D.2', NULL, 5),
	(1422, 'Sub None Category', 'Chỉ đơn giản thèm có thêm ít cái đồng hồ :)', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/14550087_214391808966265_1710349787942879232_n.jpg?ig_cache_key=MTM1ODgxNjkxOTY1ODg2OTcwOQ%3D%3D.2', NULL, 5),
	(1423, 'Sub None Category', 'Góc nhỏ ấy chỉ một mình anh :)', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/14709430_190943514665726_736190616106434560_n.jpg?ig_cache_key=MTM1ODU4NTE4NDA5NDMwMzU4OQ%3D%3D.2', NULL, 5),
	(1424, 'Sub None Category', 'Lắm lúc không hiểu sao vô cái đất này một mình :)', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/14374157_1798467200442685_3303649141405515776_n.jpg?ig_cache_key=MTM1Njk1MzkyMDUwOTcyNjcwNg%3D%3D.2', NULL, 5),
	(1425, 'Sub None Category', 'Mờn con bé có chốn đi chốn về :v', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/14574034_964962540315573_8489020164967235584_n.jpg?ig_cache_key=MTM1MjAzMTA4Njg4NDcwMTA4Nw%3D%3D.2', NULL, 5),
	(1426, 'Sub None Category', 'Ngàn năm nỗi đau hoá kiếp mây ngàn cô đơn biển cạn ! Giấc mơ không còn biển xưa đã cạn', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/14504922_1130153447065320_6958139657116712960_n.jpg?ig_cache_key=MTM1MDA3OTMzNzA1OTkxMzU4Mg%3D%3D.2', NULL, 5),
	(1427, 'Sub None Category', 'Thèm một tô', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/14474406_153378985116488_136396345865928704_n.jpg?ig_cache_key=MTM0ODU4MzE1NDU0MTkyNjI3Mg%3D%3D.2', NULL, 5),
	(1428, 'Sub None Category', 'Có những chiều mưa như vậy !', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/c128.0.824.824/14487258_353351225054701_3801417902343585792_n.jpg?ig_cache_key=MTM0ODE5MTY0MTMwMzcxODM1Ng%3D%3D.2.c', NULL, 5),
	(1429, 'Sub None Category', 'Qubikal', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/14474376_1090910944339376_6658158950522814464_n.jpg?ig_cache_key=MTM0NzQ0NTU5NjMxNTQ2ODgxNA%3D%3D.2', NULL, 5),
	(1430, 'Sub None Category', 'Thành phố ấy yên bình đến kì lạ :)', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/14309936_568271976713415_4683415854921023488_n.jpg?ig_cache_key=MTM0NjcxNTIyNjcxNjYxNDE3Nw%3D%3D.2', NULL, 5),
	(1431, 'Sub None Category', 'So old and tired :(', 'https://scontent.cdninstagram.com/t51.2885-15/s320x320/e35/14309790_602382706608141_3155686182323486720_n.jpg?ig_cache_key=MTM0NDc2NDk5NDU0MjA1ODAxNA%3D%3D.2', NULL, 5),
	(1432, 'Sub None Category', 'Qubikal', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/14294701_300077597030470_92101334_n.jpg?ig_cache_key=MTM0MDMxNDY5ODA4NDQxMTA2OA%3D%3D.2', NULL, 5),
	(1433, 'Sub None Category', 'My friends :)', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/14288057_163715190700427_944535071_n.jpg?ig_cache_key=MTMzNjE1ODMyNTg1MTM2Njk5Ng%3D%3D.2', NULL, 5),
	(1434, 'Sub None Category', 'Đừng cố gắng làm những điều mà bạn biết nó sẽ làm bạn đau khổ :)', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/14156438_1860012914234872_808216805_n.jpg?ig_cache_key=MTMzMzQ2MjcxMDMwNjY4NTgwMg%3D%3D.2', NULL, 5),
	(1435, 'Sub None Category', 'Hãng delay airline hân hạnh tài trợ chương trình này :v', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/13671693_534610883405559_865398355_n.jpg?ig_cache_key=MTMxOTU4Mjk2NDIwNDI2MjY4Nw%3D%3D.2', NULL, 5),
	(1436, 'Sub None Category', 'Không liên quan tới bức ảnh lắm, có những thứ chúng ta cố mặc dù chẳng biết nó tồn tại hay không !', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/13651802_503306556532224_1875954016_n.jpg?ig_cache_key=MTMxNjc1MTM1MjE5NDM3NzMyMg%3D%3D.2', NULL, 5),
	(1437, 'Sub None Category', 'Hơi bế tắc đành trút vào ít cái vậy', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/13628235_1192162750804911_215927797_n.jpg?ig_cache_key=MTMxNTM1NDEyNDA0NTEzOTI5NQ%3D%3D.2', NULL, 5),
	(1438, 'Sub None Category', 'Dạo này thấy chênh vênh :)', 'https://scontent.cdninstagram.com/t51.2885-15/e35/13741165_619662578193398_561255537_n.jpg?ig_cache_key=MTMxMzE4Njk2NTkwNzA0MjMxMw%3D%3D.2', NULL, 5),
	(1439, 'Sub None Category', 'Simple and Classic :)', 'https://scontent.cdninstagram.com/t51.2885-15/s320x320/e35/13736006_1737826299815060_1600008060_n.jpg?ig_cache_key=MTMwODU4Mzk0MzQ5OTQxMjkyMw%3D%3D.2', NULL, 5),
	(1440, 'Sub None Category', 'Dating :v so worry :3', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/13696370_153210878420399_1257382589_n.jpg?ig_cache_key=MTI5NDE4NzMyMjc4NzM4OTgxMA%3D%3D.2', NULL, 5),
	(1441, 'Sub None Category', 'Mời cả nhà ăn mì cua :3', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/13118258_857458067693378_865951806_n.jpg?ig_cache_key=MTIzOTQ5MzEyNzIwMzc3OTEzNQ%3D%3D.2', NULL, 5),
	(1442, 'Sub None Category', 'Chẳng rõ mình có sai điều gì không, cứ nghĩ mọi cái sẽ ổn mà thấy ko đc ổn lắm', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/12940827_1096045113789082_1275756202_n.jpg?ig_cache_key=MTIzNjMyODYxNjc3NDkyMzAyNg%3D%3D.2', NULL, 5),
	(1443, 'Sub None Category', 'You think i\'m okay ?', 'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/12501809_965477876821550_1392449920_n.jpg?ig_cache_key=MTIxNzE2MTg4MzgwNzk3MDIxMw%3D%3D.2', NULL, 5),
	(1444, 'Sub None Category', 'Đơn giản tui thấy tui rất là đập chai :3', 'https://scontent.cdninstagram.com/t51.2885-15/e35/12728494_519546761561766_1290903045_n.jpg?ig_cache_key=MTIwNzY1MDUyMjg3OTAyOTg0Nw%3D%3D.2', NULL, 5);
/*!40000 ALTER TABLE `qu_photos` ENABLE KEYS */;

-- Dumping structure for table qubikal.qu_user
DROP TABLE IF EXISTS `qu_user`;
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
