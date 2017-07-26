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
  `n_status` int(11) DEFAULT NULL,
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
  `talent_seeker_id` char(50) DEFAULT NULL,
  `job_title` text,
  `job_description` text,
  `requitment` text,
  `salary` int(11) DEFAULT NULL,
  `status_jobs` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_job`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.jobboard: ~5 rows (approximately)
/*!40000 ALTER TABLE `jobboard` DISABLE KEYS */;
INSERT INTO `jobboard` (`id_job`, `talent_seeker_id`, `job_title`, `job_description`, `requitment`, `salary`, `status_jobs`, `date`, `n_status`) VALUES
	(1, '1', 'NETWORK ENGINEER', '<p style="text-align: justify;"><span style="font-family: verdana,arial,helvetica,sans-serif; font-size: 10pt;">We are a fast growing IT company that provides quality business solutions in advanced infrastructure, network infrastructure, and security solutions using Microsoft Technology to our national and multi-national clients in various fields in Jabodetabek.<br /></span></p>\r\n<p><span style="font-family: verdana,arial,helvetica,sans-serif; font-size: 10pt;">We strive to provide opportunities to people who have talent, interest, integrity and desire to work within an organization that will value and contribute to our company.</span></p>', '<p><strong><span style="font-family: verdana,arial,helvetica,sans-serif; font-size: 10pt;">Requirement :</span></strong></p>\r\n<ul>\r\n<li><span style="font-family: verdana,arial,helvetica,sans-serif; font-size: 10pt;">Male/Female, maximum age 27 years old</span></li>\r\n<li><span style="font-family: verdana,arial,helvetica,sans-serif; font-size: 10pt;">Bachelor Degree in Information Technology</span></li>\r\n<li><span style="font-family: verdana,arial,helvetica,sans-serif; font-size: 10pt;">Experience minimum 1-2 years in the same position</span></li>\r\n<li><span style="font-family: verdana,arial,helvetica,sans-serif; font-size: 10pt;">Good knowledge in network system / TCP IP</span></li>\r\n<li><span style="font-family: verdana,arial,helvetica,sans-serif; font-size: 10pt;">Having skill in Router/Switch, Firewall, Routing Protocol (BGP, OSPF, MPLS)</span></li>\r\n<li><strong><span style="font-family: verdana,arial,helvetica,sans-serif; font-size: 10pt;">Have CCNP Certification is a must</span></strong></li>\r\n<li><span style="font-family: verdana,arial,helvetica,sans-serif; font-size: 10pt;">Ability to work flexible hours to meet deadline</span></li>\r\n<li><span style="font-family: verdana,arial,helvetica,sans-serif; font-size: 10pt;">Able to work independent</span></li>\r\n<li><span style="font-family: verdana,arial,helvetica,sans-serif; font-size: 10pt;">Good attitude, good interpersonal skill and attention to detailed</span></li>\r\n</ul>', 1, '0', '2014-10-27 15:35:14', 1),
	(2, '1', 'WEB COPYWRITER / CONTENT WRITER', '<div class="job-ad-client-name coName">MEGATAMA INNOTEK NUSANTARA, PT</div>\r\n<p>We are a small development team aiming to take on the traditional business application suites such as SAP and Microsoft with the OpenERP system (a full-featured Open Source System: Accounting, HR, CRM, Manufacturing, etc.). OpenERP has grown to serve over 400 partners in more than 70 countries maintaining&nbsp;its commitment to the open source community.&nbsp;<strong>PT. Megatama Innotek Nusantara , an Open ERP Partner</strong><strong>,&nbsp;</strong>are looking for people who want to take the challenge in this stimulating and cooperative environment.</p>', '<div class="job-ad-job-title posName">\r\n<h1>WEB COPYWRITER / CONTENT WRITER</h1>\r\n</div>\r\n<p><strong><span style="text-decoration: underline;"><span lang="IN">A. Job Description</span></span></strong></p>\r\n<ul>\r\n<li><span lang="IN">Konseptualisasi, menulis dan meng-edit konten website dan social media,</span><span lang="IN"> termasuk headlines, page titles, meta descriptions, call-to-action statements.</span></li>\r\n<li><span lang="IN">Stay up to date dengan industry trend dan berita untuk search industry menjadi subyek otoritas dari dokumen yang dibuat.</span></li>\r\n<li><span lang="IN">Menulis regular blog posts dan blog dengan berbagai macam topik sesuai dengan bisnis terkait</span></li>\r\n<li><span lang="IN">Menulis internal press release yang berhubungan dengan lokal, nasional, dan industry press, dan research-based article.</span></li>\r\n<li><span lang="IN">Meeting dan networking dengan PR dan orang-orang yang terkait dengan industri.</span></li>\r\n</ul>\r\n<p><strong><span style="text-decoration: underline;"><span lang="IN">B. Job Specification</span></span></strong></p>\r\n<p><strong><span style="text-decoration: underline;"><span lang="IN">- Technical Specification</span></span></strong></p>\r\n<ul>\r\n<li><span lang="IN">Memiliki Passion dalam sastra/ menulis dengan 2 tahun pengalaman dan pengetahuan di: (1) web content writing/ editing (2) SEO &amp; Advertising campaign (3) Blog Writing (4) Press releases</span></li>\r\n</ul>\r\n<p><strong><span style="text-decoration: underline;"><span lang="IN">- General Speficification</span></span></strong></p>\r\n<ul>\r\n<li><span lang="IN">Pria/Wanita usia maksimal 35 tahun</span></li>\r\n<li><span lang="IN">Lulusan SMK/D3/S1 Jurusan Art/Design/Creative Multimedia atau setara</span></li>\r\n<li><span lang="IN">Jujur, Teliti, dan Disiplin</span></li>\r\n<li><span lang="IN">Dapat bekerjasama dalam team dan dapat berkomunikasi dengan baik</span></li>\r\n<li><span lang="IN">Bersedia ditempatkan di Surabaya</span></li>\r\n</ul>\r\n<p><strong><span style="text-decoration: underline;"><span lang="IN">- Priority:</span></span></strong></p>\r\n<ul>\r\n<li><span lang="IN">Memiliki pengalaman minimal 2 tahun</span></li>\r\n</ul>\r\n<p><strong><span style="text-decoration: underline;"><span lang="IN">C. Allowance</span></span></strong></p>\r\n<ul>\r\n<li><span lang="IN">Very Very competitive Salary. 1 yr contract position</span></li>\r\n<li><span lang="IN">Hari kerja Senin &ndash; Jumat 8.30 am &ndash; 5.00 pm </span></li>\r\n<li><span lang="IN">Mendapatkan THR &amp; Jamsostek</span></li>\r\n<li><span lang="IN">Allowance untuk Meal</span></li>\r\n<li><span lang="IN">Lokasi di Surabaya pusat</span></li>\r\n<li><span lang="IN">10 hari allowance untuk absensi</span></li>\r\n</ul>', 1, '0', '2014-10-27 16:17:35', 1),
	(3, '1', 'Assistant Manager - Advertising &amp; Communication (MALL)', '<p>Job Role:</p>\r\n<p>Assist Marketing Manager to manage advertising, public relations both online and offline</p>\r\n<p>Create plan and strategy for marketing communication to increase mall traffic by engaging with media and followers in digital communications</p>\r\n<p>Review the advertising material covering design and copywriting</p>', '<p>Requirements:</p>\r\n<p>Experience in MALL Marketing and Communication</p>\r\n<p>Hands on in creating marketing communication plan and strategy</p>\r\n<p>Fluent in English</p>\r\n<p>Understand other foreign language is an advantage</p>\r\n<menu class="primary-tool-main">\r\n<li class="primary-tool-prime tool-apply"></li>\r\n</menu>', 2, '0', '2014-10-27 16:18:19', 1),
	(4, '1', 'GADGET WRITER (GW)', '<ul>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Menulis artikel berita (news) seputar dunia gadget Android</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Menulis artikel review gadget Android yang komprehensif</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Membuat artikel tips yang berkaitan dengan gadget Android </span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Memiliki pengetahuan atau pengalaman menulis artikel untuk media online lebih diutamakan</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Terlibat dalam pembuatan video review </span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Terlibat dan berinteraksi aktif di account media sosial JalanTikus</span></li>\r\n</ul>', '<ul>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Memiliki minat tinggi terhadap mobile gadget (smartphone &amp; tablet)</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Terbiasa menggunakan gadget dengan berbagai sistem operasi</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Mampu mencari dan menemukan hal-hal menarik dalam sebuah gadget</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Mampu mencari dan menemukan fitur-fitur yang tersembunyi dalam gadget</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Mampu mengoptimasi kemampuan sebuah gadget</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Memiliki kemampuan berbahasa Indonesia yang baik</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Mampu berkomunikasi dengan baik</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Memiliki kemampuan berbahasa Inggris lebih diutamakan</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Memiliki relasi yang baik dengan vendor gadget ataupun perwakilannya di Indonesia lebih diutamakan</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Mampu bekerja keras dan bekerja di bawah tekanan</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Usia tidak lebih dari 30 tahun</span></li>\r\n</ul>', 1, '0', '2014-10-27 16:19:17', 1),
	(5, '1', 'GADGET WRITER (GW) 2', '<ul>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Menulis artikel berita (news) seputar dunia gadget Android</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Menulis artikel review gadget Android yang komprehensif</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Membuat artikel tips yang berkaitan dengan gadget Android </span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Memiliki pengetahuan atau pengalaman menulis artikel untuk media online lebih diutamakan</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Terlibat dalam pembuatan video review </span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Terlibat dan berinteraksi aktif di account media sosial JalanTikus</span></li>\r\n</ul>', '<ul>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Memiliki minat tinggi terhadap mobile gadget (smartphone &amp; tablet)</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Terbiasa menggunakan gadget dengan berbagai sistem operasi</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Mampu mencari dan menemukan hal-hal menarik dalam sebuah gadget</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Mampu mencari dan menemukan fitur-fitur yang tersembunyi dalam gadget</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Mampu mengoptimasi kemampuan sebuah gadget</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Memiliki kemampuan berbahasa Indonesia yang baik</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Mampu berkomunikasi dengan baik</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Memiliki kemampuan berbahasa Inggris lebih diutamakan</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Memiliki relasi yang baik dengan vendor gadget ataupun perwakilannya di Indonesia lebih diutamakan</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Mampu bekerja keras dan bekerja di bawah tekanan</span></li>\r\n<li><span style="font-size: 10pt; font-family: verdana,arial,helvetica,sans-serif;">Usia tidak lebih dari 30 tahun</span></li>\r\n</ul>', 1, '0', '2014-10-27 16:19:17', 1);
/*!40000 ALTER TABLE `jobboard` ENABLE KEYS */;


-- Dumping structure for table creasi.job_category
CREATE TABLE IF NOT EXISTS `job_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobboard_id` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.job_category: ~5 rows (approximately)
/*!40000 ALTER TABLE `job_category` DISABLE KEYS */;
INSERT INTO `job_category` (`id`, `jobboard_id`, `category_id`, `date`, `n_status`) VALUES
	(4, 1, 1, '2014-10-27 15:35:14', 1),
	(5, 2, 1, '2014-10-27 16:17:35', 1),
	(6, 3, 2, '2014-10-27 16:18:19', 1),
	(7, 4, 2, '2014-10-27 16:19:17', 1),
	(8, 5, 2, '2014-10-27 16:19:17', 1);
/*!40000 ALTER TABLE `job_category` ENABLE KEYS */;


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


-- Dumping structure for table creasi.my_accent
CREATE TABLE IF NOT EXISTS `my_accent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(50) DEFAULT NULL,
  `attribut_category_id` bigint(20) DEFAULT NULL,
  `accent_id` bigint(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_accent: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_accent` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_accent` ENABLE KEYS */;


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


-- Dumping structure for table creasi.my_application
CREATE TABLE IF NOT EXISTS `my_application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(50) DEFAULT NULL,
  `jobboard_id` char(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_application: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_application` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_application` ENABLE KEYS */;


-- Dumping structure for table creasi.my_attribut_category
CREATE TABLE IF NOT EXISTS `my_attribut_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(50) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `agent` char(50) DEFAULT NULL,
  `name_agent` varchar(50) DEFAULT NULL,
  `tlp_agent` int(11) DEFAULT NULL,
  `sallary` char(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_attribut_category: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_attribut_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_attribut_category` ENABLE KEYS */;


-- Dumping structure for table creasi.my_category
CREATE TABLE IF NOT EXISTS `my_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_category: ~8 rows (approximately)
/*!40000 ALTER TABLE `my_category` DISABLE KEYS */;
INSERT INTO `my_category` (`id`, `category_id`, `user_id`, `date`, `status`) VALUES
	(1, 8, 4, '2014-10-13 17:14:09', 1),
	(2, 11, 5, '2014-10-13 17:14:56', 1),
	(3, 8, 6, '2014-10-14 09:49:28', 1),
	(4, 8, 7, '2014-10-14 09:58:13', 1),
	(5, 8, 9, '2014-10-14 10:01:33', 1),
	(6, 8, 11, '2014-10-14 11:00:43', 1),
	(7, 8, 5, '2014-10-23 14:16:59', 1),
	(8, 11, 5, '2014-10-23 14:16:59', 1);
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
  `portofolio_id` char(50) DEFAULT NULL,
  `user_id` char(50) DEFAULT NULL,
  `comment` text,
  `date` datetime DEFAULT NULL,
  `n_status` char(50) DEFAULT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_comment: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_comment` DISABLE KEYS */;
INSERT INTO `my_comment` (`id_comment`, `replay_coment_id`, `portofolio_id`, `user_id`, `comment`, `date`, `n_status`) VALUES
	(1, NULL, '2', '2', 'Ok coba dah ', '2014-10-28 17:50:08', '1'),
	(2, NULL, '2', '2', 'fsdfsd', '2014-10-28 17:51:41', '1'),
	(3, NULL, '2', '2', 'JIka tua dan Gundah Rasa', '2014-10-28 18:00:28', '1');
/*!40000 ALTER TABLE `my_comment` ENABLE KEYS */;


-- Dumping structure for table creasi.my_education
CREATE TABLE IF NOT EXISTS `my_education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_follow: ~4 rows (approximately)
/*!40000 ALTER TABLE `my_follow` DISABLE KEYS */;
INSERT INTO `my_follow` (`id`, `user_id`, `friend_id`, `date`, `n_status`) VALUES
	(13, '2', '4', '2014-10-24 14:19:46', NULL),
	(14, '2', '3', '2014-10-24 14:22:16', NULL),
	(17, '3', '4', '2014-10-27 09:21:33', NULL),
	(18, '4', '2', '2014-10-27 15:38:08', NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_inbox: ~1 rows (approximately)
/*!40000 ALTER TABLE `my_inbox` DISABLE KEYS */;
INSERT INTO `my_inbox` (`id`, `from`, `to`, `date`, `message`, `n_status`) VALUES
	(1, 'wahyu', 'imam', '2014-10-14 11:11:17', 'Halow gimana kabarnya bro ?? ', 1);
/*!40000 ALTER TABLE `my_inbox` ENABLE KEYS */;


-- Dumping structure for table creasi.my_language
CREATE TABLE IF NOT EXISTS `my_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `attribut_category_id` bigint(20) DEFAULT NULL,
  `language_id` bigint(20) DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  `Column 6` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_language: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_language` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_language` ENABLE KEYS */;


-- Dumping structure for table creasi.my_loking_for
CREATE TABLE IF NOT EXISTS `my_loking_for` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `arrtibut_category_id` bigint(20) DEFAULT NULL,
  `loking_for_id` mediumint(9) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_loking_for: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_loking_for` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_loking_for` ENABLE KEYS */;


-- Dumping structure for table creasi.my_love
CREATE TABLE IF NOT EXISTS `my_love` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(50) DEFAULT NULL,
  `friend_id` char(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_love: ~6 rows (approximately)
/*!40000 ALTER TABLE `my_love` DISABLE KEYS */;
INSERT INTO `my_love` (`id`, `user_id`, `friend_id`, `date`, `n_status`) VALUES
	(12, '2', '4', '2014-10-24 11:26:45', NULL),
	(14, '2', '2', '2014-10-24 11:28:02', NULL),
	(15, '3', '4', '2014-10-24 11:29:32', NULL),
	(16, '3', '2', '2014-10-24 13:45:13', NULL),
	(17, '2', '3', '2014-10-24 14:22:20', NULL),
	(18, '4', '4', '2014-10-28 14:58:27', NULL);
/*!40000 ALTER TABLE `my_love` ENABLE KEYS */;


-- Dumping structure for table creasi.my_love_portofolio
CREATE TABLE IF NOT EXISTS `my_love_portofolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(50) DEFAULT NULL,
  `friend_id` char(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_love_portofolio: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_love_portofolio` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_love_portofolio` ENABLE KEYS */;


-- Dumping structure for table creasi.my_notification
CREATE TABLE IF NOT EXISTS `my_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to` varchar(50) DEFAULT NULL,
  `from` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `message` text,
  `posted_date` datetime DEFAULT NULL,
  `notification_id` int(11) DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_notification: ~1 rows (approximately)
/*!40000 ALTER TABLE `my_notification` DISABLE KEYS */;
INSERT INTO `my_notification` (`id`, `to`, `from`, `created_date`, `message`, `posted_date`, `notification_id`, `n_status`) VALUES
	(1, 'imam', 'boni', '2014-10-22 14:31:18', 'asdasdasd', '2014-10-22 14:31:19', 1, 1);
/*!40000 ALTER TABLE `my_notification` ENABLE KEYS */;


-- Dumping structure for table creasi.my_oppen_for
CREATE TABLE IF NOT EXISTS `my_oppen_for` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `attribut_category_id` char(50) DEFAULT NULL,
  `oppen_for_id` bigint(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_oppen_for: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_oppen_for` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_oppen_for` ENABLE KEYS */;


-- Dumping structure for table creasi.my_portofolio
CREATE TABLE IF NOT EXISTS `my_portofolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `type` char(50) DEFAULT NULL,
  `title` char(50) DEFAULT NULL,
  `description` text,
  `love_count` char(50) DEFAULT NULL,
  `view_count` char(50) DEFAULT NULL,
  `images` varchar(250) DEFAULT NULL,
  `video_url` char(100) DEFAULT NULL,
  `audio` char(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_portofolio: ~3 rows (approximately)
/*!40000 ALTER TABLE `my_portofolio` DISABLE KEYS */;
INSERT INTO `my_portofolio` (`id`, `user_id`, `type`, `title`, `description`, `love_count`, `view_count`, `images`, `video_url`, `audio`, `date`, `n_status`) VALUES
	(1, 4, NULL, 'Tera Cell', 'Indonesia Backbone Tera Cell JS ', NULL, NULL, 'ff566f491c36b837cbd3b5fbea5a71d0.jpg', NULL, NULL, '2014-10-28 11:16:00', 1),
	(2, 4, NULL, 'Baru', 'Baru 2', NULL, NULL, '7b3604f8e3b600310e09a24aa0d607a8.jpg', NULL, NULL, '2014-10-28 11:16:00', 1),
	(3, 4, NULL, NULL, NULL, NULL, NULL, 'a6b969eabb087703d1c6dce576315082.jpg', NULL, NULL, '2014-10-28 13:18:17', 1);
/*!40000 ALTER TABLE `my_portofolio` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_subcategory: ~6 rows (approximately)
/*!40000 ALTER TABLE `my_subcategory` DISABLE KEYS */;
INSERT INTO `my_subcategory` (`id`, `category_id`, `subcategory_id`, `user_id`, `n_status`) VALUES
	(1, 11, 10, 5, 1),
	(2, 11, 20, 5, 1),
	(3, 8, 90, 5, 1),
	(4, 8, 10, 5, 1),
	(5, 11, 90, 5, 1),
	(6, 11, 10, 5, 1);
/*!40000 ALTER TABLE `my_subcategory` ENABLE KEYS */;


-- Dumping structure for table creasi.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `caption` varchar(150) DEFAULT NULL,
  `category` varchar(10) DEFAULT NULL,
  `description` text,
  `images` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.news: ~4 rows (approximately)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `title`, `caption`, `category`, `description`, `images`, `date`, `n_status`) VALUES
	(1, 'Berita Satu ', 'sdfsdf', '1', '<p>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>', NULL, '2014-10-21 15:21:16', 1),
	(2, 'Berita Dua', 'asdasd', '2', '<p>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>', NULL, '2014-10-21 15:25:05', 1),
	(3, 'Berita Tiga', 'asdasd', '1', '<p>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>', NULL, '2014-10-22 11:39:47', NULL),
	(4, '', '', '3', '', 'fbf1cd066001cc23d3303ca0dc69178e.jpg', '2014-10-27 18:04:44', 0);
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
  `name` varchar(46) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(200) DEFAULT NULL,
  `img_cover` varchar(200) DEFAULT NULL,
  `img_avatar` varchar(200) DEFAULT NULL,
  `username` varchar(46) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `city` varchar(110) DEFAULT NULL,
  `sex` varchar(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `last_name` varchar(46) DEFAULT NULL,
  `StreetName` varchar(150) DEFAULT NULL,
  `phone_number` bigint(15) DEFAULT NULL,
  `fb_link` char(50) DEFAULT NULL,
  `twitter_link` char(50) DEFAULT NULL,
  `instagram_link` char(50) DEFAULT NULL,
  `website_link` char(50) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `login_count` int(11) NOT NULL DEFAULT '0',
  `view_count` int(3) NOT NULL DEFAULT '0',
  `love_count` int(3) NOT NULL DEFAULT '0',
  `follow_count` int(3) NOT NULL DEFAULT '0',
  `submit_count` int(3) NOT NULL DEFAULT '0',
  `try_to_login` int(11) NOT NULL,
  `jobs_count` int(11) NOT NULL,
  `verified` tinyint(3) DEFAULT '0' COMMENT '0->no hp blm verified, 1->sudah verified.',
  `salt` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `n_status` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table creasi.social_member: ~3 rows (approximately)
/*!40000 ALTER TABLE `social_member` DISABLE KEYS */;
INSERT INTO `social_member` (`id`, `name`, `nickname`, `email`, `register_date`, `img`, `img_cover`, `img_avatar`, `username`, `last_login`, `city`, `sex`, `birthday`, `last_name`, `StreetName`, `phone_number`, `fb_link`, `twitter_link`, `instagram_link`, `website_link`, `role`, `login_count`, `view_count`, `love_count`, `follow_count`, `submit_count`, `try_to_login`, `jobs_count`, `verified`, `salt`, `password`, `n_status`) VALUES
	(2, 'Angga Mahabaratha', 'admin', 'admin@gmail.com', '2014-10-10 16:13:48', '2d1246a098066e90515b191c04709036.jpg', NULL, '2d1246a098066e90515b191c04709036.jpg', 'angga', '2014-10-28 17:56:27', 'jakarta', 'male', '2014-10-10', 'adminaja', 'Jalan Indonesia Admin', 43534, NULL, NULL, NULL, NULL, 1, 0, 4, 2, 1, 0, 0, 0, 0, NULL, 'qOyRN+0yz2PHJWCQ0VPIg09ejbY0YUK6kY757z1QB0U=', 1),
	(3, 'Imam Maulanaxx', 'sdfsd', 'dfsd@skdsd.com', '2014-10-10 14:13:41', 'bc12426282639e6de176366b813b3499.jpg', NULL, 'bc12426282639e6de176366b813b3499.jpg', 'oceboysip', '2014-10-27 15:17:20', 'jslsdkf', 'male', '2014-10-10', 'sdfsd', 'Jalan Sisinga Mangarajaa', 4353451, NULL, NULL, NULL, NULL, 2, 0, 1, 1, 1, 0, 0, 0, 0, NULL, 'qOyRN+0yz2PHJWCQ0VPIg09ejbY0YUK6kY757z1QB0U=', 1),
	(4, 'Wahyu Mahabaratha', 'asds', 'sssa@asdasd.cmoas', '2014-10-14 09:49:28', '82b2e12fa43985abe18094a6db76c52d.jpg', NULL, '82b2e12fa43985abe18094a6db76c52d.jpg', 'wahyu', '2014-10-28 09:50:48', 'akarta', 'male', '0000-00-00', NULL, 'Jalan Yogya Bunyu', 454545, NULL, NULL, NULL, NULL, 1, 0, 7, 3, 2, 0, 0, 0, 0, '12345678', 'qOyRN+0yz2PHJWCQ0VPIg09ejbY0YUK6kY757z1QB0U=', 1);
/*!40000 ALTER TABLE `social_member` ENABLE KEYS */;


-- Dumping structure for table creasi.tbl_banner
CREATE TABLE IF NOT EXISTS `tbl_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `images` varchar(100) DEFAULT NULL,
  `link` char(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.tbl_banner: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_banner` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_banner` ENABLE KEYS */;


-- Dumping structure for table creasi.tbl_category
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.tbl_category: ~12 rows (approximately)
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` (`id`, `category_name`, `date`, `n_status`) VALUES
	(1, 'Teknik Informatika', '2014-10-23 10:55:47', 1),
	(2, 'actor', '2014-10-29 03:18:33', 1),
	(3, 'dancer', '2014-10-29 03:18:56', 1),
	(4, 'designer', '2014-10-29 03:19:15', 1),
	(5, 'editor', '2014-10-29 03:19:34', 1),
	(6, 'HairStylist', '2014-10-29 03:19:55', 1),
	(7, 'MakeupArtist', '2014-10-29 03:20:14', 1),
	(8, 'Model', '2014-10-29 03:20:27', 1),
	(9, 'Musician', '2014-10-29 03:20:40', 1),
	(10, 'Photographer', '2014-10-29 03:20:52', 1),
	(11, 'ProductionCrew', '2014-10-29 03:21:08', 1),
	(12, 'Writer', '2014-10-29 03:21:31', 1);
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


-- Dumping structure for table creasi.tbl_content
CREATE TABLE IF NOT EXISTS `tbl_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(50) DEFAULT NULL,
  `content` text,
  `type` char(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.tbl_content: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_content` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_content` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.tbl_notification: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_notification` DISABLE KEYS */;
INSERT INTO `tbl_notification` (`id`, `subject`, `detail`, `herf`, `img`, `link_text`, `created_date`, `n_status`) VALUES
	(1, 'er', 'efer', 'erf', 'erf', 'erf', '2014-10-22 11:26:55', 1);
/*!40000 ALTER TABLE `tbl_notification` ENABLE KEYS */;


-- Dumping structure for table creasi.tbl_salary
CREATE TABLE IF NOT EXISTS `tbl_salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.tbl_salary: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_salary` DISABLE KEYS */;
INSERT INTO `tbl_salary` (`id`, `name`) VALUES
	(1, '1 - 5 Jt / Bulan'),
	(2, '5 - 10 Jt / Bulan'),
	(3, '10 - 15 Jt / Bulan'),
	(4, '20 - 100 Jt / Bulan');
/*!40000 ALTER TABLE `tbl_salary` ENABLE KEYS */;


-- Dumping structure for table creasi.tbl_subcategory
CREATE TABLE IF NOT EXISTS `tbl_subcategory` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) DEFAULT NULL,
  `name_subcategory` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.tbl_subcategory: ~121 rows (approximately)
/*!40000 ALTER TABLE `tbl_subcategory` DISABLE KEYS */;
INSERT INTO `tbl_subcategory` (`id`, `category_id`, `name_subcategory`, `date`, `n_status`) VALUES
	(1, 2, 'Comedian', '2014-10-29 03:25:10', 1),
	(2, 2, 'FilmPresenter/Host', '2014-10-29 03:26:05', 1),
	(3, 2, 'Stuntman/Double', '2014-10-29 03:26:19', 1),
	(4, 2, 'Theater/Musical', '2014-10-29 03:26:42', 1),
	(5, 2, 'TV', '2014-10-29 03:26:58', 1),
	(6, 2, 'VoiceOver/Radio', '2014-10-29 03:27:12', 1),
	(7, 2, 'Other', '2014-10-29 03:27:26', 1),
	(8, 3, 'American', '2014-10-29 03:27:39', 1),
	(9, 3, 'Ballet', '2014-10-29 03:43:04', 1),
	(10, 3, 'Ballroom', '2014-10-29 03:43:04', 1),
	(11, 3, 'Bellydance', '2014-10-29 03:43:04', 1),
	(12, 3, 'Bollywood', '2014-10-29 03:43:04', 1),
	(13, 3, 'Breakdance', '2014-10-29 03:43:04', 1),
	(14, 3, 'Contemporary', '2014-10-29 03:43:04', 1),
	(15, 3, 'Hiphop', '2014-10-29 03:43:04', 1),
	(16, 3, 'Jazz', '2014-10-29 03:43:04', 1),
	(17, 3, 'Latin', '2014-10-29 03:43:04', 1),
	(18, 3, 'Rock&Roll', '2014-10-29 03:43:04', 1),
	(19, 3, 'Salsa', '2014-10-29 03:43:04', 1),
	(20, 3, 'Swing', '2014-10-29 03:43:04', 1),
	(21, 3, 'Tango', '2014-10-29 03:43:04', 1),
	(22, 3, 'Tap', '2014-10-29 03:43:04', 1),
	(23, 3, 'Traditional', '2014-10-29 03:43:04', 1),
	(24, 3, 'Other', '2014-10-29 03:43:04', 1),
	(25, 4, 'Fashion', '2014-10-29 03:51:34', 1),
	(26, 4, 'Graphic', '2014-10-29 03:51:34', 1),
	(27, 4, 'Illustrator', '2014-10-29 03:51:34', 1),
	(28, 4, 'Interior', '2014-10-29 03:51:34', 1),
	(29, 4, 'Packaging', '2014-10-29 03:51:34', 1),
	(30, 4, 'Other', '2014-10-29 03:51:34', 1),
	(31, 5, 'Animator', '2014-10-29 03:53:43', 1),
	(32, 5, 'Colorist', '2014-10-29 03:53:43', 1),
	(33, 5, 'Film', '2014-10-29 03:53:43', 1),
	(34, 5, 'MotionGraphic', '2014-10-29 03:53:43', 1),
	(35, 5, 'Photo', '2014-10-29 03:53:43', 1),
	(36, 5, 'Special', '2014-10-29 03:53:43', 1),
	(37, 5, 'Effect', '2014-10-29 03:53:43', 1),
	(38, 5, 'Video', '2014-10-29 03:53:43', 1),
	(39, 5, 'Other', '2014-10-29 03:53:43', 1),
	(40, 6, 'Beauty', '2014-10-29 03:55:22', 1),
	(41, 6, 'Fashion', '2014-10-29 03:55:22', 1),
	(42, 6, 'Photoshoot', '2014-10-29 03:55:22', 1),
	(43, 6, 'Special', '2014-10-29 03:55:22', 1),
	(44, 6, 'Effect', '2014-10-29 03:55:22', 1),
	(45, 6, 'Video/TV/Photo', '2014-10-29 03:55:22', 1),
	(46, 6, 'Wedding', '2014-10-29 03:55:22', 1),
	(47, 6, 'Other', '2014-10-29 03:55:22', 1),
	(48, 8, 'Catwalk', '2014-10-29 03:58:03', 1),
	(49, 8, 'Competition&Pageant', '2014-10-29 03:58:03', 1),
	(50, 8, 'Event&Promotion', '2014-10-29 03:58:03', 1),
	(51, 8, 'Film/TV/Video', '2014-10-29 03:58:03', 1),
	(52, 8, 'Photoshoot', '2014-10-29 03:58:03', 1),
	(53, 8, 'Other', '2014-10-29 03:58:03', 1),
	(54, 9, 'Banjo', '2014-10-29 04:15:29', 1),
	(55, 9, 'BassGuitar', '2014-10-29 04:15:29', 1),
	(56, 9, 'Cello', '2014-10-29 04:15:29', 1),
	(57, 9, 'Clarinet', '2014-10-29 04:15:29', 1),
	(58, 9, 'Composer', '2014-10-29 04:15:29', 1),
	(59, 9, 'Conductor', '2014-10-29 04:15:29', 1),
	(60, 9, 'DJ', '2014-10-29 04:15:29', 1),
	(61, 9, 'DoubleBass', '2014-10-29 04:15:29', 1),
	(62, 9, 'Drum', '2014-10-29 04:15:29', 1),
	(63, 9, 'Engineer', '2014-10-29 04:15:29', 1),
	(64, 9, 'Flute', '2014-10-29 04:15:29', 1),
	(65, 9, 'Guitar', '2014-10-29 04:15:29', 1),
	(66, 9, 'Harp', '2014-10-29 04:15:29', 1),
	(67, 9, 'Horn', '2014-10-29 04:15:29', 1),
	(68, 9, 'Keyboard', '2014-10-29 04:15:29', 1),
	(69, 9, 'MusicScoring', '2014-10-29 04:15:29', 1),
	(70, 9, 'Percussion', '2014-10-29 04:15:29', 1),
	(71, 9, 'Producer', '2014-10-29 04:15:29', 1),
	(72, 9, 'Rapping', '2014-10-29 04:15:29', 1),
	(73, 9, 'Saxophone', '2014-10-29 04:15:29', 1),
	(74, 9, 'Singer', '2014-10-29 04:15:29', 1),
	(75, 9, 'SoundEngineering', '2014-10-29 04:15:29', 1),
	(76, 9, 'Trombone', '2014-10-29 04:15:29', 1),
	(77, 9, 'Trumpet', '2014-10-29 04:15:29', 1),
	(78, 9, 'Violin', '2014-10-29 04:15:29', 1),
	(79, 9, 'Other', '2014-10-29 04:15:29', 1),
	(80, 10, 'Advertising', '2014-10-29 04:23:32', 1),
	(81, 10, 'Aerial', '2014-10-29 04:23:32', 1),
	(82, 10, 'Architectural', '2014-10-29 04:23:32', 1),
	(83, 10, 'Automotive', '2014-10-29 04:23:32', 1),
	(84, 10, 'Baby/Family', '2014-10-29 04:23:32', 1),
	(85, 10, 'Company', '2014-10-29 04:23:32', 1),
	(86, 10, 'Documentary', '2014-10-29 04:23:32', 1),
	(87, 10, 'Fashion', '2014-10-29 04:23:32', 1),
	(88, 10, 'Food', '2014-10-29 04:23:32', 1),
	(89, 10, 'Landscape', '2014-10-29 04:23:32', 1),
	(90, 10, 'Macro', '2014-10-29 04:23:32', 1),
	(91, 10, 'Pet', '2014-10-29 04:23:32', 1),
	(92, 10, 'Photojournalist', '2014-10-29 04:23:32', 1),
	(93, 10, 'Portrait', '2014-10-29 04:23:32', 1),
	(94, 10, 'Product', '2014-10-29 04:23:32', 1),
	(95, 10, 'Sports', '2014-10-29 04:23:32', 1),
	(96, 10, 'Studio', '2014-10-29 04:23:32', 1),
	(97, 10, 'Wedding/Event', '2014-10-29 04:23:32', 1),
	(98, 10, 'Wildlife', '2014-10-29 04:23:32', 1),
	(99, 10, 'Other', '2014-10-29 04:23:32', 1),
	(100, 11, 'Assistant', '2014-10-29 04:38:58', 1),
	(101, 11, 'Casting', '2014-10-29 04:38:58', 1),
	(102, 11, 'Cinematographer', '2014-10-29 04:38:58', 1),
	(103, 11, 'Costume', '2014-10-29 04:38:58', 1),
	(104, 11, 'Director', '2014-10-29 04:38:58', 1),
	(105, 11, 'Lighting', '2014-10-29 04:38:58', 1),
	(106, 11, 'Producer', '2014-10-29 04:38:58', 1),
	(107, 11, 'Property', '2014-10-29 04:38:58', 1),
	(108, 11, 'Sound', '2014-10-29 04:38:58', 1),
	(109, 11, 'Special', '2014-10-29 04:38:58', 1),
	(110, 11, 'Effect', '2014-10-29 04:38:58', 1),
	(111, 11, 'Stunt', '2014-10-29 04:38:58', 1),
	(112, 11, 'Coordinator', '2014-10-29 04:38:58', 1),
	(113, 11, 'Other', '2014-10-29 04:38:58', 1),
	(114, 12, 'Copywriter', '2014-10-29 04:42:06', 1),
	(115, 12, 'Editorial', '2014-10-29 04:42:06', 1),
	(116, 12, 'Journalist', '2014-10-29 04:42:06', 1),
	(117, 12, 'Lyric', '2014-10-29 04:42:06', 1),
	(118, 12, 'Writer', '2014-10-29 04:42:06', 1),
	(119, 12, 'Novelist', '2014-10-29 04:42:06', 1),
	(120, 12, 'Scriptwriter', '2014-10-29 04:42:06', 1),
	(121, 12, 'Other', '2014-10-29 04:42:06', 1);
/*!40000 ALTER TABLE `tbl_subcategory` ENABLE KEYS */;


-- Dumping structure for table creasi.tbl_talent
CREATE TABLE IF NOT EXISTS `tbl_talent` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `alamat` text,
  `no_tlp` varchar(25) DEFAULT NULL,
  `no_ktp` varchar(25) DEFAULT NULL,
  `images_profile` varchar(100) DEFAULT NULL,
  `skill` text,
  `n_status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.tbl_talent: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_talent` DISABLE KEYS */;
INSERT INTO `tbl_talent` (`id`, `user_id`, `alamat`, `no_tlp`, `no_ktp`, `images_profile`, `skill`, `n_status`) VALUES
	(1, 3, 'Jalan Sisinga Mangaraja', '435345', '345345', 'user.jpg', NULL, 1),
	(2, 4, 'Jalan Yogya Bunyu', '454545', '5654645', 'user.jpg', NULL, 1),
	(3, 2, 'Jalan Indonesia Admin', '43534', '34534', 'user.jpg', NULL, 1),
	(4, 1, 'Jalan Indonesia Admin', '43534', '34534', 'user.jpg', NULL, 1);
/*!40000 ALTER TABLE `tbl_talent` ENABLE KEYS */;


-- Dumping structure for table creasi.tbl_talent_seeker
CREATE TABLE IF NOT EXISTS `tbl_talent_seeker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(50) DEFAULT NULL,
  `alamat_perusahaan` text,
  `no_tlp` char(50) DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.tbl_talent_seeker: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_talent_seeker` DISABLE KEYS */;
INSERT INTO `tbl_talent_seeker` (`id`, `user_id`, `alamat_perusahaan`, `no_tlp`, `n_status`) VALUES
	(1, '2', 'jalan abcde', '4334534', 1);
/*!40000 ALTER TABLE `tbl_talent_seeker` ENABLE KEYS */;


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
