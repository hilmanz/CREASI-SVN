-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.27 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for creasi
CREATE DATABASE IF NOT EXISTS `creasi` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `creasi`;


-- Dumping structure for table creasi.contact_us
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.contact_us: ~0 rows (approximately)
/*!40000 ALTER TABLE `contact_us` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_us` ENABLE KEYS */;


-- Dumping structure for table creasi.gm_user
CREATE TABLE IF NOT EXISTS `gm_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) DEFAULT NULL,
  `nickname` char(50) DEFAULT NULL,
  `username` char(50) DEFAULT NULL,
  `login_count` int(11) DEFAULT NULL,
  `try_to_login` int(11) DEFAULT NULL,
  `verified` int(11) DEFAULT NULL,
  `salt` varchar(100) DEFAULT NULL,
  `password` char(50) DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.gm_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `gm_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `gm_user` ENABLE KEYS */;


-- Dumping structure for table creasi.help
CREATE TABLE IF NOT EXISTS `help` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.help: ~0 rows (approximately)
/*!40000 ALTER TABLE `help` DISABLE KEYS */;
/*!40000 ALTER TABLE `help` ENABLE KEYS */;


-- Dumping structure for table creasi.jobboard
CREATE TABLE IF NOT EXISTS `jobboard` (
  `id_job` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` char(50) DEFAULT NULL,
  `job_title` varchar(150) DEFAULT NULL,
  `job_description` varchar(100) DEFAULT NULL,
  `requitment` varchar(100) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_job`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.jobboard: ~0 rows (approximately)
/*!40000 ALTER TABLE `jobboard` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobboard` ENABLE KEYS */;


-- Dumping structure for table creasi.job_skill
CREATE TABLE IF NOT EXISTS `job_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_job` char(50) DEFAULT NULL,
  `skill` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.job_skill: ~0 rows (approximately)
/*!40000 ALTER TABLE `job_skill` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_skill` ENABLE KEYS */;


-- Dumping structure for table creasi.my_ads
CREATE TABLE IF NOT EXISTS `my_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `position` char(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_ads: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_ads` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_ads` ENABLE KEYS */;


-- Dumping structure for table creasi.my_apllication
CREATE TABLE IF NOT EXISTS `my_apllication` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `jobs_id` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_apllication: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_apllication` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_apllication` ENABLE KEYS */;


-- Dumping structure for table creasi.my_application
CREATE TABLE IF NOT EXISTS `my_application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(50) DEFAULT NULL,
  `jobs_id` char(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_application: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_application` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_application` ENABLE KEYS */;


-- Dumping structure for table creasi.my_category
CREATE TABLE IF NOT EXISTS `my_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_category: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_category` ENABLE KEYS */;


-- Dumping structure for table creasi.my_chat
CREATE TABLE IF NOT EXISTS `my_chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(100) DEFAULT NULL,
  `message` text,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_chat: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_chat` ENABLE KEYS */;


-- Dumping structure for table creasi.my_comment
CREATE TABLE IF NOT EXISTS `my_comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `replay_coment_id` char(100) DEFAULT NULL,
  `content_id` char(50) DEFAULT NULL,
  `user_id` char(50) DEFAULT NULL,
  `comment` text,
  `date` datetime DEFAULT NULL,
  `n_status` char(50) DEFAULT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_comment: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_comment` ENABLE KEYS */;


-- Dumping structure for table creasi.my_education
CREATE TABLE IF NOT EXISTS `my_education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` char(50) DEFAULT NULL,
  `user_id` char(50) DEFAULT NULL,
  `institusi` char(50) DEFAULT NULL,
  `grade` char(50) DEFAULT NULL,
  `Bidang Studi` char(50) DEFAULT NULL,
  `IP` int(11) DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_education: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_education` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_education` ENABLE KEYS */;


-- Dumping structure for table creasi.my_experience
CREATE TABLE IF NOT EXISTS `my_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` char(50) DEFAULT NULL,
  `user_id` char(50) DEFAULT NULL,
  `company` char(50) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `salary` varchar(100) DEFAULT NULL,
  `jobs` varchar(100) DEFAULT NULL,
  `periode_start` datetime DEFAULT NULL,
  `periode_end` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_experience: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_experience` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_experience` ENABLE KEYS */;


-- Dumping structure for table creasi.my_follow
CREATE TABLE IF NOT EXISTS `my_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(50) DEFAULT NULL,
  `friend_id` char(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_follow: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_follow` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_follow` ENABLE KEYS */;


-- Dumping structure for table creasi.my_inbox
CREATE TABLE IF NOT EXISTS `my_inbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` char(50) DEFAULT NULL,
  `to` char(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `message` text,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_inbox: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_inbox` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_inbox` ENABLE KEYS */;


-- Dumping structure for table creasi.my_love
CREATE TABLE IF NOT EXISTS `my_love` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(50) DEFAULT NULL,
  `friend_id` char(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_love: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_love` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_love` ENABLE KEYS */;


-- Dumping structure for table creasi.my_notification
CREATE TABLE IF NOT EXISTS `my_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `posted_date` datetime DEFAULT NULL,
  `from` varchar(50) DEFAULT NULL,
  `notification_id` int(11) DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_notification: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_notification` ENABLE KEYS */;


-- Dumping structure for table creasi.my_skill
CREATE TABLE IF NOT EXISTS `my_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(50) DEFAULT NULL,
  `to` char(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `message` text,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_skill: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_skill` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_skill` ENABLE KEYS */;


-- Dumping structure for table creasi.my_subcategory
CREATE TABLE IF NOT EXISTS `my_subcategory` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) DEFAULT NULL,
  `subcategory_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `n_status` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_subcategory: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_subcategory` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_subcategory` ENABLE KEYS */;


-- Dumping structure for table creasi.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `caption` varchar(150) DEFAULT NULL,
  `description` text,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.news: ~0 rows (approximately)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;


-- Dumping structure for table creasi.resume
CREATE TABLE IF NOT EXISTS `resume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(50) DEFAULT NULL,
  `judul_resume` char(50) DEFAULT NULL,
  `negara` char(50) DEFAULT NULL,
  `tempat_tinggal` char(50) DEFAULT NULL,
  `status_pernikahan` char(50) DEFAULT NULL,
  `jumlah_anak` char(50) DEFAULT NULL,
  `kewarganegaraan` char(50) DEFAULT NULL,
  `suku` char(50) DEFAULT NULL,
  `agama` char(50) DEFAULT NULL,
  `kendaraan` char(50) DEFAULT NULL,
  `status_tempat_tinggal` char(50) DEFAULT NULL,
  `lokasi` char(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kode_pos` char(10) DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.resume: ~0 rows (approximately)
/*!40000 ALTER TABLE `resume` DISABLE KEYS */;
/*!40000 ALTER TABLE `resume` ENABLE KEYS */;


-- Dumping structure for table creasi.social_member
CREATE TABLE IF NOT EXISTS `social_member` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `registerid` varchar(200) NOT NULL,
  `name` varchar(46) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(200) DEFAULT NULL,
  `small_img` varchar(200) DEFAULT NULL,
  `username` varchar(46) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `city` varchar(110) DEFAULT NULL,
  `sex` varchar(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `last_name` varchar(46) DEFAULT NULL,
  `StreetName` varchar(150) DEFAULT NULL,
  `phone_number` bigint(15) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `login_count` int(11) NOT NULL DEFAULT '0',
  `view_count` int(3) NOT NULL DEFAULT '0',
  `love_count` int(3) NOT NULL DEFAULT '0',
  `follow_count` int(3) NOT NULL DEFAULT '0',
  `try_to_login` int(11) NOT NULL,
  `verified` tinyint(3) DEFAULT '0' COMMENT '0->no hp blm verified, 1->sudah verified.',
  `salt` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `n_status` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `registerid` (`registerid`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table creasi.social_member: ~2 rows (approximately)
/*!40000 ALTER TABLE `social_member` DISABLE KEYS */;
INSERT INTO `social_member` (`id`, `registerid`, `name`, `nickname`, `email`, `register_date`, `img`, `small_img`, `username`, `last_login`, `city`, `sex`, `birthday`, `last_name`, `StreetName`, `phone_number`, `role`, `login_count`, `view_count`, `love_count`, `follow_count`, `try_to_login`, `verified`, `salt`, `password`, `n_status`) VALUES
	(2, '', 'Adminnya ', 'admin', 'admin@gmail.com', '2014-10-10 16:13:48', 'admin.jpg', 'admin.jpg', 'admin', '2014-10-10 16:14:22', 'jakarta', 'male', '2014-10-10', 'adminaja', 'jalan indonesia raya', NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 0),
	(3, '', 'Imam Maulana', 'sdfsd', 'dfsd@skdsd.com', '2014-10-10 14:13:41', 'sdksdf.pgp', 'ksdkkf.php', 'pkrm', '2014-10-10 14:13:54', 'jslsdkf', 'male', '2014-10-10', 'sdfsd', 'sdfsd', 34234, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, 0);
/*!40000 ALTER TABLE `social_member` ENABLE KEYS */;


-- Dumping structure for table creasi.tbl_category
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.tbl_category: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;


-- Dumping structure for table creasi.tbl_company
CREATE TABLE IF NOT EXISTS `tbl_company` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `alamat_perusahaan` text,
  `no_tlp` varchar(100) DEFAULT NULL,
  `images_profile` varchar(100) DEFAULT NULL,
  `n_status` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.tbl_company: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_company` DISABLE KEYS */;
INSERT INTO `tbl_company` (`id`, `user_id`, `alamat_perusahaan`, `no_tlp`, `images_profile`, `n_status`) VALUES
	(1, 2, 'sadasdas', '234234', 'img.jpg', 1);
/*!40000 ALTER TABLE `tbl_company` ENABLE KEYS */;


-- Dumping structure for table creasi.tbl_notification
CREATE TABLE IF NOT EXISTS `tbl_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) DEFAULT NULL,
  `detail` varchar(50) DEFAULT NULL,
  `herf` char(50) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `link_text` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.tbl_notification: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_notification` ENABLE KEYS */;


-- Dumping structure for table creasi.tbl_subcategory
CREATE TABLE IF NOT EXISTS `tbl_subcategory` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) DEFAULT NULL,
  `name_subcategory` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.tbl_subcategory: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_subcategory` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_subcategory` ENABLE KEYS */;


-- Dumping structure for table creasi.tbl_talent
CREATE TABLE IF NOT EXISTS `tbl_talent` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `alamat` text,
  `no_tlp` varchar(25) DEFAULT NULL,
  `no_ktp` varchar(25) DEFAULT NULL,
  `images_profile` varchar(100) DEFAULT NULL,
  `n_status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.tbl_talent: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_talent` DISABLE KEYS */;
INSERT INTO `tbl_talent` (`id`, `user_id`, `alamat`, `no_tlp`, `no_ktp`, `images_profile`, `n_status`) VALUES
	(1, 3, 'Jalan Sisinga Mangaraja', '435345', '345345', 'user.jpg', 1);
/*!40000 ALTER TABLE `tbl_talent` ENABLE KEYS */;


-- Dumping structure for table creasi.tips_trik
CREATE TABLE IF NOT EXISTS `tips_trik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `caption` varchar(100) DEFAULT NULL,
  `description` text,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.tips_trik: ~0 rows (approximately)
/*!40000 ALTER TABLE `tips_trik` DISABLE KEYS */;
/*!40000 ALTER TABLE `tips_trik` ENABLE KEYS */;


-- Dumping structure for table creasi.user_skill
CREATE TABLE IF NOT EXISTS `user_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(50) DEFAULT NULL,
  `skill` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.user_skill: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_skill` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_skill` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
