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


-- Dumping structure for table creasi.city_reference
CREATE TABLE IF NOT EXISTS `city_reference` (
  `id` int(11) NOT NULL,
  `provinceName` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `provinceid` int(11) DEFAULT NULL,
  `coor` varchar(250) NOT NULL COMMENT 'master coordinate',
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table creasi.city_reference: ~586 rows (approximately)
/*!40000 ALTER TABLE `city_reference` DISABLE KEYS */;
INSERT INTO `city_reference` (`id`, `provinceName`, `city`, `provinceid`, `coor`, `n_status`) VALUES
	(131, 'NANGGROE ACEH DARUSSALAM', 'ACEH', 1, '', 0),
	(132, 'JAWA TENGAH', 'AMBARAWA', 11, '', 0),
	(133, 'MALUKU', 'AMBON', 19, '', 0),
	(134, 'BALI', 'AMLAPURA', 2, '', 0),
	(135, 'SUMATERA UTARA', 'ASAHAN', 32, '', 0),
	(136, 'BALI', 'BADUNG', 2, '', 0),
	(137, 'KALIMANTAN TIMUR', 'BALIKPAPAN', 16, '', 0),
	(138, 'NANGGROE ACEH DARUSSALAM', 'BANDA ACEH', 1, '', 0),
	(139, 'LAMPUNG', 'BANDAR LAMPUNG', 18, '', 0),
	(140, 'JAWA BARAT', 'BANDUNG', 10, '', 0),
	(141, 'BANGKA-BELITUNG', 'BANGKA BARAT', 3, '', 0),
	(142, 'BANGKA-BELITUNG', 'BANGKA-BELITUNG', 3, '', 0),
	(143, 'JAWA TIMUR', 'BANGKALAN', 12, '', 0),
	(144, 'RIAU', 'BANGKINANG', 24, '', 0),
	(145, 'BALI', 'BANGLI', 2, '', 0),
	(146, 'JAWA BARAT', 'BANJAR', 10, '', 0),
	(147, 'KALIMANTAN SELATAN', 'BANJAR BARU', 14, '', 0),
	(148, 'JAWA BARAT', 'BANJAR NEGARA', 10, '', 0),
	(149, 'KALIMANTAN SELATAN', 'BANJARMASIN', 14, '', 0),
	(150, 'SULAWESI SELATAN', 'BANTAENG', 26, '', 0),
	(151, 'BANTEN', 'BANTEN', 4, '', 0),
	(152, 'DI YOGYAKARTA', 'BANTUL', 33, '', 0),
	(153, 'JAWA TENGAH', 'BANYUMAS', 11, '', 0),
	(154, 'JAWA TIMUR', 'BANYUWANGI', 12, '', 0),
	(155, 'SULAWESI SELATAN', 'BARRU', 26, '', 0),
	(156, 'KEPULAUAN RIAU', 'BATAM', 17, '', 0),
	(157, 'JAWA TENGAH', 'BATANG', 11, '', 0),
	(158, 'JAMBI', 'BATANGHARI', 9, '', 0),
	(159, 'JAWA TIMUR', 'BATU', 12, '', 0),
	(160, 'SUMATERA SELATAN', 'BATU RAJA', 31, '', 0),
	(161, 'SUMATERA BARAT', 'BATUSANGKAR', 30, '', 0),
	(162, 'SULAWESI TENGGARA', 'BAU-BAU', 28, '', 0),
	(163, '(NOT SPECIFIED)', 'BAYURIT', 0, '', 0),
	(164, 'JAWA BARAT', 'BEKASI', 10, '', 0),
	(165, 'SUMATERA UTARA', 'BELAWAN', 32, '', 0),
	(166, 'BENGKULU', 'BENGKULU', 5, '', 0),
	(167, 'BENGKULU', 'BENGKULU SELATAN', 5, '', 0),
	(168, 'KALIMANTAN TIMUR', 'BERAU', 16, '', 0),
	(169, 'NUSA TENGGARA BARAT', 'BIMA', 21, '', 0),
	(170, 'SUMATERA UTARA', 'BINJAI', 32, '', 0),
	(171, 'NANGGROE ACEH DARUSSALAM', 'BIREUN', 1, '', 0),
	(172, 'JAWA TIMUR', 'BLITAR', 12, '', 0),
	(173, 'JAWA TENGAH', 'BLORA', 11, '', 0),
	(174, 'JAWA BARAT', 'BOGOR', 10, '', 0),
	(175, 'JAWA TIMUR', 'BOJONEGORO', 12, '', 0),
	(176, 'JAWA TIMUR', 'BONDOWOSO', 12, '', 0),
	(177, 'SULAWESI SELATAN', 'BONE', 26, '', 0),
	(178, 'KALIMANTAN TIMUR', 'BONTANG', 16, '', 0),
	(179, 'JAWA TENGAH', 'BOYOLALI', 11, '', 0),
	(180, 'SUMATERA UTARA', 'BRASTAGI', 32, '', 0),
	(181, 'JAWA TENGAH', 'BREBES', 11, '', 0),
	(182, 'SUMATERA BARAT', 'BUKIT TINGGI', 30, '', 0),
	(183, 'BALI', 'BULELENG', 2, '', 0),
	(184, 'SULAWESI SELATAN', 'BULUKUMBA', 26, '', 0),
	(185, 'KALIMANTAN TENGAH', 'BUNTOK', 15, '', 0),
	(186, 'BANTEN', 'CARITA', 4, '', 0),
	(187, 'JAWA TENGAH', 'CEPU', 11, '', 0),
	(188, 'JAWA BARAT', 'CIAMIS', 10, '', 0),
	(189, 'JAWA BARAT', 'CIANJUR', 10, '', 0),
	(190, 'JAWA BARAT', 'CIBINONG', 10, '', 0),
	(191, 'JAWA BARAT', 'CIBITUNG', 10, '', 0),
	(192, 'JAWA TENGAH', 'CILACAP', 11, '', 0),
	(193, 'BANTEN', 'CILEDUG', 4, '', 0),
	(194, 'BANTEN', 'CILEGON', 4, '', 0),
	(195, 'JAWA BARAT', 'CIMAHI', 10, '', 0),
	(196, 'JAWA BARAT', 'CIREBON', 10, '', 0),
	(197, 'JAWA BARAT', 'DEBOTABEK', 10, '', 0),
	(198, 'JAWA TENGAH', 'DEMAK', 11, '', 0),
	(199, 'BALI', 'DENPASAR', 2, '', 0),
	(200, 'JAWA BARAT', 'DEPOK', 10, '', 0),
	(201, 'NUSA TENGGARA BARAT', 'DOMPU', 21, '', 0),
	(202, 'RIAU', 'DUMAI', 24, '', 0),
	(203, 'SULAWESI SELATAN', 'ENREKANG', 26, '', 0),
	(204, '(NOT SPECIFIED)', 'GABAHAN', 0, '', 0),
	(205, 'JAWA BARAT', 'GARUT', 10, '', 0),
	(206, 'BALI', 'GIANYAR', 2, '', 0),
	(207, 'JAWA TENGAH', 'GOMBONG', 11, '', 0),
	(208, 'GORONTALO', 'GORONTALO', 6, '', 0),
	(209, 'SULAWESI SELATAN', 'GOWA', 26, '', 0),
	(210, 'JAWA TIMUR', 'GRESIK', 12, '', 0),
	(211, 'JAWA TENGAH', 'GROBOGAN', 11, '', 0),
	(212, 'KALIMANTAN TIMUR', 'GROGOT', 16, '', 0),
	(213, 'JAWA BARAT', 'INDRAMAYU', 10, '', 0),
	(214, 'JAWA BARAT', 'JABOTABEK', 10, '', 0),
	(215, 'JAKARTA RAYA', 'JAKARTA', 8, '', 0),
	(216, 'JAMBI', 'JAMBI', 9, '', 0),
	(217, 'PAPUA', 'JAYAPURA', 23, '', 0),
	(218, 'JAWA TIMUR', 'JEMBER', 12, '', 0),
	(219, 'BALI', 'JEMBRANA', 2, '', 0),
	(220, 'SULAWESI SELATAN', 'JENEPONTO', 26, '', 0),
	(221, 'JAWA TENGAH', 'JEPARA', 11, '', 0),
	(222, 'BALI', 'JIMBARAN', 2, '', 0),
	(223, 'JAWA TIMUR', 'JOMBANG', 12, '', 0),
	(224, 'SUMATERA UTARA', 'KABAN JAHE', 32, '', 0),
	(225, 'RIAU', 'KAMPAR', 24, '', 0),
	(226, 'JAWA TENGAH', 'KARANG ANYAR', 11, '', 0),
	(227, 'JAWA BARAT', 'KARAWANG', 10, '', 0),
	(228, 'SUMATERA SELATAN', 'KAYU AGUNG', 31, '', 0),
	(229, 'JAWA TENGAH', 'KEBUMEN', 11, '', 0),
	(230, 'JAWA TIMUR', 'KEDIRI', 12, '', 0),
	(231, 'JAWA TENGAH', 'KEDUNG TURI', 11, '', 0),
	(232, '(NOT SPECIFIED)', 'KELUSA', 0, '', 0),
	(233, 'JAWA TENGAH', 'KENDAL', 11, '', 0),
	(234, 'SULAWESI TENGGARA', 'KENDARI', 28, '', 0),
	(235, 'JAWA BARAT', 'KERAWANG', 10, '', 0),
	(236, 'JAMBI', 'KERINCI', 9, '', 0),
	(237, 'KALIMANTAN BARAT', 'KETAPANG', 13, '', 0),
	(238, 'SUMATERA UTARA', 'KISARAN', 32, '', 0),
	(239, 'JAWA TENGAH', 'KLATEN', 11, '', 0),
	(240, 'BALI', 'KLUNGKUNG', 2, '', 0),
	(241, 'SULAWESI TENGGARA', 'KOLAKA', 28, '', 0),
	(242, 'SULAWESI TENGGARA', 'KONAWE', 28, '', 0),
	(243, 'KALIMANTAN SELATAN', 'KOTA BARU', 14, '', 0),
	(244, 'SULAWESI UTARA', 'KOTAMOBAGU', 29, '', 0),
	(245, 'JAWA TENGAH', 'KUDUS', 11, '', 0),
	(246, 'KALIMANTAN TIMUR', 'KUKAR', 16, '', 0),
	(247, 'DI YOGYAKARTA', 'KULON PROGO', 33, '', 0),
	(248, 'JAWA BARAT', 'KUNINGAN', 10, '', 0),
	(249, 'NUSA TENGGARA TIMUR', 'KUPANG', 22, '', 0),
	(250, 'KALIMANTAN TIMUR', 'KUTAI BARAT', 16, '', 0),
	(251, 'KALIMANTAN TIMUR', 'KUTAI KARTANEGARA', 16, '', 0),
	(252, 'SUMATERA UTARA', 'LABUHAN BATU', 32, '', 0),
	(253, 'SUMATERA SELATAN', 'LAHAT', 31, '', 0),
	(254, 'JAWA TIMUR', 'LAMONGAN', 12, '', 0),
	(255, 'LAMPUNG', 'LAMPUNG', 18, '', 0),
	(256, 'SUMATERA UTARA', 'LANGKAT', 32, '', 0),
	(257, 'NANGGROE ACEH DARUSSALAM', 'LANGSA', 1, '', 0),
	(258, 'JAWA TENGAH', 'LARANGAN', 11, '', 0),
	(259, 'JAWA TIMUR', 'LAWANG', 12, '', 0),
	(260, 'JAWA BARAT', 'LEMBANG', 10, '', 0),
	(261, 'NANGGROE ACEH DARUSSALAM', 'LHOKSEUMAWE', 1, '', 0),
	(262, 'NUSA TENGGARA BARAT', 'LOMBOK', 21, '', 0),
	(263, '(NOT SPECIFIED)', 'LONGKAI', 0, '', 0),
	(264, 'SUMATERA SELATAN', 'LUBUK LINGGAU', 31, '', 0),
	(265, 'SUMATERA UTARA', 'LUBUK PAKAM', 32, '', 0),
	(266, 'JAWA TIMUR', 'LUMAJANG', 12, '', 0),
	(267, '(NOT SPECIFIED)', 'LUMTENG', 0, '', 0),
	(268, 'SULAWESI SELATAN', 'LUWU', 26, '', 0),
	(269, 'SULAWESI SELATAN', 'LUWU TIMUR', 26, '', 0),
	(270, 'SULAWESI SELATAN', 'LUWU UTARA', 26, '', 0),
	(271, 'JAWA TIMUR', 'MADIUN', 12, '', 0),
	(272, 'JAWA TIMUR', 'MADURA', 12, '', 0),
	(273, 'JAWA TENGAH', 'MAGELANG', 11, '', 0),
	(274, 'JAWA TIMUR', 'MAGETAN', 12, '', 0),
	(275, 'JAWA BARAT', 'MAJALENGKA', 10, '', 0),
	(276, 'JAWA TENGAH', 'MAJENANG', 11, '', 0),
	(277, 'SULAWESI BARAT', 'MAJENE', 25, '', 0),
	(278, 'SULAWESI SELATAN', 'MAKASAR', 26, '', 0),
	(279, 'JAWA TIMUR', 'MALANG', 12, '', 0),
	(280, '(NOT SPECIFIED)', 'MALBUNGO', 0, '', 0),
	(281, 'KALIMANTAN TIMUR', 'MALINAU', 16, '', 0),
	(282, 'SULAWESI BARAT', 'MAMUJU', 25, '', 0),
	(283, 'SULAWESI UTARA', 'MANADO', 29, '', 0),
	(284, 'SUMATERA UTARA', 'MANDAILING NATAL', 32, '', 0),
	(285, 'RIAU', 'MANDAU', 24, '', 0),
	(286, 'SULAWESI SELATAN', 'MANGKUTANA', 26, '', 0),
	(287, 'IRIAN JAYA BARAT', 'MANOKWARI BARAT', 7, '', 0),
	(288, 'SULAWESI SELATAN', 'MAROS', 26, '', 0),
	(289, 'KALIMANTAN SELATAN', 'MARTAPURA', 14, '', 0),
	(290, 'NUSA TENGGARA BARAT', 'MATARAM', 21, '', 0),
	(291, 'NUSA TENGGARA TIMUR', 'MAUMERE', 22, '', 0),
	(292, 'SUMATERA UTARA', 'MEDAN', 32, '', 0),
	(293, 'BALI', 'MENGWI', 2, '', 0),
	(294, 'PAPUA', 'MERAUKE', 23, '', 0),
	(295, 'LAMPUNG', 'METRO', 18, '', 0),
	(296, 'SULAWESI UTARA', 'MINAHASA', 29, '', 0),
	(297, 'JAWA TIMUR', 'MOJOKERTO', 12, '', 0),
	(298, 'SUMATERA SELATAN', 'MUARA ENIM', 31, '', 0),
	(299, 'JAWA TENGAH', 'MUNTILAN', 11, '', 0),
	(300, 'SUMATERA SELATAN', 'MUNTOK', 31, '', 0),
	(301, 'SUMATERA SELATAN', 'MUSI BANYUASIN', 31, '', 0),
	(302, 'PAPUA', 'NABIRE', 23, '', 0),
	(303, 'BALI', 'NEGARA', 2, '', 0),
	(304, 'DI YOGYAKARTA', 'NGAGLIK', 33, '', 0),
	(305, 'JAWA TIMUR', 'NGANJUK', 12, '', 0),
	(306, 'JAWA TIMUR', 'NGAWI', 12, '', 0),
	(307, 'SUMATERA UTARA', 'NIAS', 32, '', 0),
	(309, 'KALIMANTAN TIMUR', 'NUNUKAN', 16, '', 0),
	(310, 'BALI', 'NUSA DUA', 2, '', 0),
	(311, 'SUMATERA SELATAN', 'OKI', 31, '', 0),
	(312, 'JAWA TIMUR', 'PACITAN', 12, '', 0),
	(313, 'SUMATERA BARAT', 'PADANG', 30, '', 0),
	(314, 'SUMATERA UTARA', 'PADANG SIDEMPUAN', 32, '', 0),
	(315, 'SUMATERA SELATAN', 'PAGAR ALAM', 31, '', 0),
	(316, '(NOT SPECIFIED)', 'PAIRI', 0, '', 0),
	(317, 'KALIMANTAN TENGAH', 'PALANGKARAYA', 15, '', 0),
	(318, 'SUMATERA SELATAN', 'PALEMBANG', 31, '', 0),
	(319, 'SULAWESI SELATAN', 'PALOPO', 26, '', 0),
	(320, 'SULAWESI TENGAH', 'PALU', 27, '', 0),
	(321, 'JAWA TIMUR', 'PAMEKASAN', 12, '', 0),
	(322, '(NOT SPECIFIED)', 'PANAKAN', 0, '', 0),
	(323, 'BANTEN', 'PANDEGLANG', 4, '', 0),
	(324, 'BANGKA-BELITUNG', 'PANGKAL PINANG', 3, '', 0),
	(325, 'SULAWESI SELATAN', 'PANGKEJENE', 26, '', 0),
	(326, 'SULAWESI SELATAN', 'PANGKEP', 26, '', 0),
	(327, '(NOT SPECIFIED)', 'PANJER', 0, '', 0),
	(328, 'SULAWESI SELATAN', 'PARE-PARE', 26, '', 0),
	(329, 'KALIMANTAN TIMUR', 'PASIR PENGARAYAN', 16, '', 0),
	(330, 'JAWA TIMUR', 'PASURUAN', 12, '', 0),
	(331, 'JAWA TENGAH', 'PATI', 11, '', 0),
	(332, 'SUMATERA UTARA', 'PATUMBAK', 32, '', 0),
	(333, 'SUMATERA BARAT', 'PAYAKUMBUH', 30, '', 0),
	(334, 'JAWA TENGAH', 'PEKALONGAN', 11, '', 0),
	(335, 'RIAU', 'PEKANBARU', 24, '', 0),
	(336, 'RIAU', 'PELALAWAN', 24, '', 0),
	(337, 'JAWA TENGAH', 'PEMALANG', 11, '', 0),
	(338, 'SUMATERA UTARA', 'PEMATANG SIANTAR', 32, '', 0),
	(339, '(NOT SPECIFIED)', 'PEMATANG TEBIH', 0, '', 0),
	(340, '(NOT SPECIFIED)', 'PENGKOR', 0, '', 0),
	(341, 'SUMATERA UTARA', 'PERBAUNGAN', 32, '', 0),
	(342, 'NANGGROE ACEH DARUSSALAM', 'PIDIE', 1, '', 0),
	(343, 'SULAWESI SELATAN', 'PINRANG', 26, '', 0),
	(344, 'SULAWESI SELATAN', 'POLMAS', 26, '', 0),
	(345, '(NOT SPECIFIED)', 'POLMAS SEMARANG', 0, '', 0),
	(346, 'JAWA TIMUR', 'PONOROGO', 12, '', 0),
	(347, 'KALIMANTAN BARAT', 'PONTIANAK', 13, '', 0),
	(348, 'SULAWESI TENGAH', 'POSO', 27, '', 0),
	(349, 'SUMATERA SELATAN', 'PRABUMULIH', 31, '', 0),
	(350, 'JAWA TIMUR', 'PROBOLINGGO', 12, '', 0),
	(351, 'JAWA TENGAH', 'PURBALINGGA', 11, '', 0),
	(352, 'JAWA BARAT', 'PURWAKARTA', 10, '', 0),
	(353, 'JAWA TENGAH', 'PURWODADI', 11, '', 0),
	(354, 'JAWA TENGAH', 'PURWOKERTO', 11, '', 0),
	(355, 'JAWA TENGAH', 'PURWOREJO', 11, '', 0),
	(356, 'BANTEN', 'RANGKASBITUNG', 4, '', 0),
	(357, 'SUMATERA UTARA', 'RANTAU PRAPAT', 32, '', 0),
	(358, 'SULAWESI SELATAN', 'RAPPANG', 26, '', 0),
	(359, 'BENGKULU', 'REJANG LEBONG', 5, '', 0),
	(360, 'JAWA TENGAH', 'REMBANG', 11, '', 0),
	(361, 'RIAU', 'RENGAT', 24, '', 0),
	(362, 'RIAU', 'RIAU', 24, '', 0),
	(363, 'JAWA TENGAH', 'SALATIGA', 11, '', 0),
	(364, 'KALIMANTAN TIMUR', 'SAMARINDA', 16, '', 0),
	(365, 'JAWA TIMUR', 'SAMPANG', 12, '', 0),
	(366, 'KALIMANTAN TENGAH', 'SAMPIT', 15, '', 0),
	(367, 'KALIMANTAN BARAT', 'SANGGAU', 13, '', 0),
	(368, 'BALI', 'SANUR', 2, '', 0),
	(369, 'JAWA BARAT', 'SAWANGAN', 10, '', 0),
	(370, 'SUMATERA SELATAN', 'SEKAYU', 31, '', 0),
	(371, 'SULAWESI SELATAN', 'SELAYAR', 26, '', 0),
	(372, 'BALI', 'SEMARA PURA', 2, '', 0),
	(373, 'JAWA TENGAH', 'SEMARANG', 11, '', 0),
	(374, 'BALI', 'SEMINYAK', 2, '', 0),
	(375, 'SULAWESI SELATAN', 'SENGKANG', 26, '', 0),
	(376, 'BANTEN', 'SERANG', 4, '', 0),
	(377, 'SUMATERA UTARA', 'SERDAN BADAGAI', 32, '', 0),
	(378, 'BANTEN', 'SERPONG', 4, '', 0),
	(379, 'BALI', 'SESETAN', 2, '', 0),
	(380, '(NOT SPECIFIED)', 'SIANTA', 0, '', 0),
	(381, 'SUMATERA UTARA', 'SIBOLGA', 32, '', 0),
	(382, 'JAWA TIMUR', 'SIDOARJO', 12, '', 0),
	(383, 'SULAWESI SELATAN', 'SIDRAP', 26, '', 0),
	(384, 'NANGGROE ACEH DARUSSALAM', 'SIGLI', 1, '', 0),
	(385, 'BALI', 'SINGARAJA', 2, '', 0),
	(386, 'KALIMANTAN BARAT', 'SINGKAWANG', 13, '', 0),
	(387, 'SULAWESI SELATAN', 'SINJAI', 26, '', 0),
	(388, 'JAWA TIMUR', 'SITUBONDO', 12, '', 0),
	(389, 'JAWA TENGAH', 'SLAWI', 11, '', 0),
	(390, 'DI YOGYAKARTA', 'SLEMAN', 33, '', 0),
	(391, 'SUMATERA BARAT', 'SOLOK', 30, '', 0),
	(392, 'SULAWESI SELATAN', 'SOPPENG', 26, '', 0),
	(393, 'JAWA BARAT', 'SOREANG', 10, '', 0),
	(394, 'IRIAN JAYA BARAT', 'SORONG', 7, '', 0),
	(395, 'SULAWESI SELATAN', 'SOROWAKO', 26, '', 0),
	(396, 'JAWA TENGAH', 'SRAGEN', 11, '', 0),
	(397, 'SUMATERA UTARA', 'STABAT', 32, '', 0),
	(398, 'JAWA BARAT', 'SUBANG', 10, '', 0),
	(399, 'JAWA BARAT', 'SUKABUMI', 10, '', 0),
	(400, 'JAWA TIMUR', 'SUKODONO', 12, '', 0),
	(401, 'JAWA TENGAH', 'SUKOHARJO', 11, '', 0),
	(402, 'NUSA TENGGARA TIMUR', 'SUMBA BARAT', 22, '', 0),
	(403, 'NUSA TENGGARA BARAT', 'SUMBAWA', 21, '', 0),
	(404, 'JAWA BARAT', 'SUMEDANG', 10, '', 0),
	(405, 'JAWA TIMUR', 'SUMENEP', 12, '', 0),
	(406, 'SULAWESI SELATAN', 'SUNGGUMINASA', 26, '', 0),
	(407, 'JAWA TIMUR', 'SURABAYA', 12, '', 0),
	(408, 'SULAWESI SELATAN', 'SOROAKO', 26, '', 0),
	(409, 'KALIMANTAN SELATAN', 'TABALONG', 14, '', 0),
	(410, 'BALI', 'TABANAN', 2, '', 0),
	(411, 'SULAWESI SELATAN', 'TAKALAR', 26, '', 0),
	(412, 'SULAWESI SELATAN', 'TANA TORAJA', 26, '', 0),
	(413, 'KALIMANTAN TIMUR', 'TANAH GROGOT', 16, '', 0),
	(414, 'BANTEN', 'TANGERANG', 4, '', 0),
	(415, 'SUMATERA UTARA', 'TANJUNG BALAI', 32, '', 0),
	(416, 'SUMATERA SELATAN', 'TANJUNG ENIM', 31, '', 0),
	(417, 'KEPULAUAN RIAU', 'TANJUNG PINANG', 17, '', 0),
	(418, 'SUMATERA SELATAN', 'TANJUNG RAJA', 31, '', 0),
	(419, 'KALIMANTAN TIMUR', 'TANJUNG REDEB', 16, '', 0),
	(420, 'KALIMANTAN TIMUR', 'TANJUNG SELOR', 16, '', 0),
	(421, 'SUMATERA UTARA', 'TAPANULI', 32, '', 0),
	(422, 'KALIMANTAN TIMUR', 'TARAKAN', 16, '', 0),
	(423, 'SUMATERA UTARA', 'TARUTUNG', 32, '', 0),
	(424, 'JAWA BARAT', 'TASIKMALAYA', 10, '', 0),
	(425, 'SUMATERA UTARA', 'TEBING TINGGI', 32, '', 0),
	(426, 'JAWA TENGAH', 'TEGAL', 11, '', 0),
	(427, 'JAWA TENGAH', 'TEMANGGUNG', 11, '', 0),
	(428, 'RIAU', 'TEMBI LAHAN', 24, '', 0),
	(429, 'RIAU', 'TEMBILAHAN', 24, '', 0),
	(430, 'KALIMANTAN TIMUR', 'TENGGARONG', 16, '', 0),
	(431, 'MALUKU UTARA', 'TERNATE', 20, '', 0),
	(432, 'MALUKU UTARA', 'TERNATE UTAMA', 20, '', 0),
	(433, 'KEPULAUAN RIAU', 'TG UBAN', 17, '', 0),
	(434, 'PAPUA', 'TIMIKA', 23, '', 0),
	(435, 'SUMATERA UTARA', 'TOBA SAMOSIR', 32, '', 0),
	(436, 'SULAWESI TENGAH', 'TOLI TOLI', 27, '', 0),
	(437, 'SULAWESI UTARA', 'TOMOHON', 29, '', 0),
	(438, 'JAWA TIMUR', 'TRENGGALEK', 12, '', 0),
	(439, '(NOT SPECIFIED)', 'TS MANDALA', 0, '', 0),
	(440, 'JAWA TIMUR', 'TUBAN', 12, '', 0),
	(441, 'JAWA TIMUR', 'TULUNG AGUNG', 12, '', 0),
	(442, 'SULAWESI SELATAN', 'UJUNG PANDANG', 26, '', 0),
	(443, 'JAWA TENGAH', 'UNGARAN', 11, '', 0),
	(444, 'SULAWESI SELATAN', 'WAJO', 26, '', 0),
	(445, 'PAPUA', 'WAMENA', 23, '', 0),
	(446, 'JAWA TIMUR', 'WARU', 12, '', 0),
	(447, 'DI YOGYAKARTA', 'WATES', 33, '', 0),
	(448, 'JAWA TENGAH', 'WONOGIRI', 11, '', 0),
	(449, 'DI YOGYAKARTA', 'WONOSARI', 33, '', 0),
	(450, 'JAWA TENGAH', 'WONOSOBO', 11, '', 0),
	(451, 'DI YOGYAKARTA', 'YOGYAKARTA', 33, '', 0),
	(452, 'NANGGROE ACEH DARUSSALAM', 'ACEH TIMUR', 1, '', 0),
	(453, 'BANGKA-BELITUNG', 'BANGKA SELATAN', 3, '', 0),
	(454, 'PAPUA', 'BIAK NUMFOR', 23, '', 0),
	(455, 'SUMATERA UTARA', 'DAIRI', 32, '', 0),
	(456, 'JAKARTA RAYA', 'JAKARTA TIMUR', 8, '', 0),
	(457, 'SUMATERA UTARA', 'KARO', 32, '', 0),
	(458, 'LAMPUNG', 'LAMPUNG TIMUR', 18, '', 0),
	(459, 'SUMATERA SELATAN', 'OGAN ILIR', 31, '', 0),
	(460, 'KALIMANTAN TIMUR', 'PENAJAM PASER UTARA', 16, '', 0),
	(461, 'SULAWESI BARAT', 'POLEWALI MANDAR', 25, '', 0),
	(462, 'RIAU', 'ROKAN HULU', 24, '', 0),
	(463, 'RIAU', 'SIAK', 24, '', 0),
	(464, 'SUMATERA UTARA', 'TAPANULI UTARA', 32, '', 0),
	(465, 'SUMATERA UTARA', 'DELI SERDANG', 32, '', 0),
	(466, 'BALI', 'KARANG ASEM', 2, '', 0),
	(468, 'JAWA TENGAH', 'SOLO', 11, '', 0),
	(469, 'JAWA BARAT', 'BANDUNG', 10, '', 0),
	(470, 'JAWA BARAT', 'JAKARTA', 10, '', 0),
	(471, 'DI YOGYAKARTA', 'MAGELANG', 33, '', 0),
	(472, 'JAWA TENGAH', 'SANGGAU', 11, '', 0),
	(473, 'BALI', 'SEMARAPURA', 2, '', 0),
	(474, 'JAWA TENGAH', 'SLEMAN', 11, '', 0),
	(475, 'JAWA BARAT', 'BAYURIT', 10, '', 0),
	(476, 'JAWA TENGAH', 'CIBINONG', 11, '', 0),
	(477, 'KALIMANTAN TENGAH', 'JEPARA', 15, '', 0),
	(478, 'KALIMANTAN TENGAH', 'KUDUS', 15, '', 0),
	(479, 'JAWA TENGAH', 'SEMINYAK', 11, '', 0),
	(2179, 'JAMBI', '(NOT SPECIFIED)', 9, '', 0),
	(2180, 'JAWA BARAT', '(NOT SPECIFIED)', 10, '', 0),
	(2181, 'KALIMANTAN SELATAN', '(NOT SPECIFIED)', 14, '', 0),
	(2182, 'LAMPUNG', '(NOT SPECIFIED)', 18, '', 0),
	(2183, 'MALUKU UTARA', '(NOT SPECIFIED)', 20, '', 0),
	(2184, 'SULAWESI SELATAN', '(NOT SPECIFIED)', 26, '', 0),
	(2185, 'SUMATERA UTARA', '(NOT SPECIFIED)', 32, '', 0),
	(2186, 'NANGGROE ACEH DARUSSALAM', 'ACEH SINGKIL', 1, '', 0),
	(2187, 'NANGGROE ACEH DARUSSALAM', 'ACEH TAMIANG', 1, '', 0),
	(2188, 'SUMATERA UTARA', 'AEK NATAS', 32, '', 0),
	(2189, 'SUMATERA UTARA', 'AEK NOPAN', 32, '', 0),
	(2190, 'RIAU', 'AIR MOLEK', 24, '', 0),
	(2191, 'RIAU', 'AIR TIRIS', 24, '', 0),
	(2192, 'KALIMANTAN SELATAN', 'AMUNTAI', 14, '', 0),
	(2193, 'KALIMANTAN TIMUR', 'ANGGANA', 16, '', 0),
	(2194, 'NUSA TENGGARA TIMUR', 'ATAMBUA', 22, '', 0),
	(2195, 'RIAU', 'BAGAN BATU', 24, '', 0),
	(2196, 'RIAU', 'BAGAN SIAPIAPI', 24, '', 0),
	(2197, 'NUSA TENGGARA TIMUR', 'BAJAWA', 22, '', 0),
	(2198, 'SUMATERA UTARA', 'BALIGE', 32, '', 0),
	(2199, 'KALIMANTAN TIMUR', 'BALIKPAPAN SELATAN', 16, '', 0),
	(2200, 'KALIMANTAN TIMUR', 'BALIKPAPAN TIMUR', 16, '', 0),
	(2201, 'SUMATERA UTARA', 'BANDAR BARU', 32, '', 0),
	(2202, 'LAMPUNG', 'BANDAR JAYA', 18, '', 0),
	(2204, 'JAMBI', 'BANGKO', 9, '', 0),
	(2205, 'KALIMANTAN SELATAN', 'BANJAR', 14, '', 0),
	(2206, 'KALIMANTAN SELATAN', 'BANJARMASIN TIMUR', 14, '', 0),
	(2207, 'KALIMANTAN SELATAN', 'BANJARMASIN UTARA', 14, '', 0),
	(2208, 'JAWA TENGAH', 'BANJARNEGARA', 11, '', 0),
	(2209, 'SUMATERA SELATAN', 'BANYUASIN', 31, '', 0),
	(2210, 'KALIMANTAN SELATAN', 'BARABAI', 14, '', 0),
	(2211, 'KALIMANTAN SELATAN', 'BARITO KUALA', 14, '', 0),
	(2212, 'KALIMANTAN SELATAN', 'BARITO TIMUR', 14, '', 0),
	(2213, 'KALIMANTAN TIMUR', 'BARONGTONGKOK', 16, '', 0),
	(2215, 'RIAU', 'BENGKALIS', 24, '', 0),
	(2216, 'NANGGROE ACEH DARUSSALAM', 'BLANG PIDIE', 1, '', 0),
	(2217, 'KALIMANTAN TIMUR', 'BULUNGAN', 16, '', 0),
	(2218, 'JAWA BARAT', 'CICALENGKA', 10, '', 0),
	(2219, 'JAWA BARAT', 'CIGUGUR', 10, '', 0),
	(2220, 'BANTEN', 'CIPUTAT', 4, '', 0),
	(2221, 'DI YOGYAKARTA', 'DI YOGYAKARTA', 33, '', 0),
	(2222, 'NUSA TENGGARA TIMUR', 'ENDE', 22, '', 0),
	(2223, 'PAPUA', 'FAKFAK', 23, '', 0),
	(2224, 'NUSA TENGGARA TIMUR', 'FLORES', 22, '', 0),
	(2226, 'KALIMANTAN SELATAN', 'HULU SUNGAI SELATAN', 14, '', 0),
	(2227, 'RIAU', 'INDRAGIRI HILIR', 24, '', 0),
	(2228, 'JAKARTA RAYA', 'JAKARTA BARAT', 8, '', 0),
	(2229, 'JAKARTA RAYA', 'JAKARTA PUSAT', 8, '', 0),
	(2230, 'JAKARTA RAYA', 'JAKARTA SELATAN', 8, '', 0),
	(2232, 'JAKARTA RAYA', 'JAKARTA UTARA', 8, '', 0),
	(2233, 'LAMPUNG', 'KALIANDA', 18, '', 0),
	(2234, 'LAMPUNG', 'KALIREJO', 18, '', 0),
	(2235, 'KALIMANTAN TENGAH', 'KAPUAS', 15, '', 0),
	(2236, 'JAWA TENGAH', 'KARANGANYAR', 11, '', 0),
	(2237, 'JAWA TENGAH', 'KARTOSURO', 11, '', 0),
	(2238, 'LAMPUNG', 'KEDATON', 18, '', 0),
	(2239, 'JAWA TENGAH', 'KERTOSONO', 11, '', 0),
	(2240, 'LAMPUNG', 'KOTA GAJAH', 18, '', 0),
	(2241, 'LAMPUNG', 'KOTABUMI', 18, '', 0),
	(2242, 'LAMPUNG', 'KRUI', 18, '', 0),
	(2243, 'RIAU', 'KUALA ENOK', 24, '', 0),
	(2244, 'KALIMANTAN TENGAH', 'KUALA KAPUAS', 15, '', 0),
	(2245, 'NANGGROE ACEH DARUSSALAM', 'KUALA SIMPANG', 1, '', 0),
	(2246, 'RIAU', 'KUBU', 24, '', 0),
	(2247, 'SUMATERA BARAT', 'KUOK', 30, '', 0),
	(2248, 'NANGGROE ACEH DARUSSALAM', 'KUTACANE', 1, '', 0),
	(2249, 'KALIMANTAN TIMUR', 'KUTAI TIMUR', 16, '', 0),
	(2250, 'JAWA TENGAH', 'KUTOARJO', 11, '', 0),
	(2251, 'SUMATERA UTARA', 'LAGU BOTI', 32, '', 0),
	(2252, 'LAMPUNG', 'LAMPUNG SELATAN', 18, '', 0),
	(2253, 'LAMPUNG', 'LAMPUNG TENGAH', 18, '', 0),
	(2254, 'LAMPUNG', 'LAMPUNG UTARA', 18, '', 0),
	(2255, 'KALIMANTAN BARAT', 'LANDAK', 13, '', 0),
	(2256, 'BANTEN', 'LEBAK', 4, '', 0),
	(2257, 'NUSA TENGGARA TIMUR', 'LEMBATA', 22, '', 0),
	(2258, 'SUMATERA BARAT', 'LIMA PULUH KOTA', 30, '', 0),
	(2259, 'GORONTALO', 'LIMBOTO', 6, '', 0),
	(2260, 'RIAU', 'LIRIK', 24, '', 0),
	(2261, 'LAMPUNG', 'LIWA', 18, '', 0),
	(2262, 'KALIMANTAN TIMUR', 'LOA JANAN', 16, '', 0),
	(2263, 'KALIMANTAN TIMUR', 'LOA KULU', 16, '', 0),
	(2264, 'SULAWESI TENGAH', 'LUWUK', 27, '', 0),
	(2265, 'SULAWESI SELATAN', 'MAKASSAR', 26, '', 0),
	(2266, 'PAPUA', 'MANOKWARI', 23, '', 0),
	(2267, 'KALIMANTAN SELATAN', 'MARABAHAN', 14, '', 0),
	(2268, 'SUMATERA UTARA', 'MEDAN DELI', 32, '', 0),
	(2269, 'SUMATERA UTARA', 'MEDAN PERJUANGAN', 32, '', 0),
	(2270, 'KALIMANTAN TIMUR', 'MELAK ULU', 16, '', 0),
	(2271, 'KALIMANTAN BARAT', 'MEMPAWAH', 13, '', 0),
	(2272, 'JAMBI', 'MERANGIN', 9, '', 0),
	(2273, 'NANGGROE ACEH DARUSSALAM', 'MEULABOH', 1, '', 0),
	(2274, 'KALIMANTAN TIMUR', 'MUARA BADAK', 16, '', 0),
	(2275, 'KALIMANTAN TIMUR', 'MUARA JAWA', 16, '', 0),
	(2276, 'KALIMANTAN TIMUR', 'MUARA KAMAN', 16, '', 0),
	(2277, 'JAMBI', 'MUARO JAMBI', 9, '', 0),
	(2278, 'SUMATERA SELATAN', 'MUSI RAWAS', 31, '', 0),
	(2279, 'LAMPUNG', 'NATAR', 18, '', 0),
	(2280, 'KALIMANTAN BARAT', 'NGABANG', 13, '', 0),
	(2281, 'NUSA TENGGARA TIMUR', 'NGADA', 22, '', 0),
	(2282, 'SUMATERA SELATAN', 'OGAN KOMERING ILIR', 31, '', 0),
	(2283, 'SUMATERA SELATAN', 'OKU TIMUR', 31, '', 0),
	(2284, 'SUMATERA BARAT', 'PADANG PANJANG', 30, '', 0),
	(2285, 'KALIMANTAN SELATAN', 'PAGATAN', 14, '', 0),
	(2286, 'LAMPUNG', 'PAGELARAN', 18, '', 0),
	(2287, 'DI YOGYAKARTA', 'PAKEM', 33, '', 0),
	(2288, 'JAWA BARAT', 'PAMANUKAN', 10, '', 0),
	(2289, 'JAWA BARAT', 'PANGANDARAN', 10, '', 0),
	(2290, 'KALIMANTAN TENGAH', 'PANGKALAN BUN', 15, '', 0),
	(2291, 'SUMATERA UTARA', 'PARAPAT', 32, '', 0),
	(2292, 'JAWA TIMUR', 'PARE', 12, '', 0),
	(2293, 'SULAWESI TENGAH', 'PARIGI', 27, '', 0),
	(2294, 'KALIMANTAN SELATAN', 'PARINGIN', 14, '', 0),
	(2295, 'SUMATERA UTARA', 'PASAR BARU', 32, '', 0),
	(2296, 'JAWA BARAT', 'PELABUHAN RATU', 10, '', 0),
	(2297, 'KALIMANTAN BARAT', 'PEMANGKAT', 13, '', 0),
	(2298, 'SUMATERA UTARA', 'PEMATANGSIANTAR', 32, '', 0),
	(2299, 'KALIMANTAN SELATAN', 'PLEIHARI', 14, '', 0),
	(2300, 'KALIMANTAN BARAT', 'PONTIANAK SELATAN', 13, '', 0),
	(2301, 'KALIMANTAN BARAT', 'PONTIANAK TIMUR', 13, '', 0),
	(2302, 'JAWA TIMUR', 'PORONG', 12, '', 0),
	(2303, 'LAMPUNG', 'PRINGSEWU', 18, '', 0),
	(2304, 'NUSA TENGGARA BARAT', 'PUJUT', 21, '', 0),
	(2305, 'DI YOGYAKARTA', 'PUNDONG', 33, '', 0),
	(2306, 'JAWA TIMUR', 'PURWOSARI', 12, '', 0),
	(2307, 'KALIMANTAN BARAT', 'PUTUSSIBAU', 13, '', 0),
	(2308, 'RIAU', 'ROKAN', 24, '', 0),
	(2309, 'NUSA TENGGARA BARAT', 'SAKRA BARAT', 21, '', 0),
	(2310, 'KALIMANTAN TIMUR', 'SAMARINDA ILIR', 16, '', 0),
	(2311, 'KALIMANTAN TIMUR', 'SAMARINDA ULU', 16, '', 0),
	(2312, 'KALIMANTAN TIMUR', 'SAMARINDA UTARA', 16, '', 0),
	(2313, 'KALIMANTAN TENGAH', 'SAMBAS', 15, '', 0),
	(2314, 'KALIMANTAN TIMUR', 'SANGA-SANGA', 16, '', 0),
	(2315, 'KALIMANTAN TIMUR', 'SANGATTA', 16, '', 0),
	(2316, 'KALIMANTAN TIMUR', 'SANGKULIRANG', 16, '', 0),
	(2317, 'SUMATERA UTARA', 'SARIBU DOLOK', 32, '', 0),
	(2318, 'JAMBI', 'SAROLANGUN', 9, '', 0),
	(2319, 'SUMATERA BARAT', 'SAWAHLUNTO', 30, '', 0),
	(2320, 'KALIMANTAN TIMUR', 'SEBULU', 16, '', 0),
	(2321, 'SULAWESI SELATAN', 'SEGERI', 26, '', 0),
	(2322, 'SUMATERA UTARA', 'SEI RAMPAH', 32, '', 0),
	(2323, 'KALIMANTAN BARAT', 'SEKURA', 13, '', 0),
	(2324, 'RIAU', 'SELAT PANJANG', 24, '', 0),
	(2325, 'BALI', 'SEMPIDI', 2, '', 0),
	(2326, 'JAMBI', 'SENGETI', 9, '', 0),
	(2327, 'SUMATERA UTARA', 'SIBORONG-BORONG', 32, '', 0),
	(2328, 'SUMATERA UTARA', 'SIDAMANIK', 32, '', 0),
	(2329, 'JAWA TIMUR', 'SIDAYU', 12, '', 0),
	(2330, 'JAWA BARAT', 'SINGAPARNA', 10, '', 0),
	(2331, 'SUMATERA BARAT', 'SINGKARAK', 30, '', 0),
	(2332, 'SULAWESI SELATAN', 'SINJAI UTARA', 26, '', 0),
	(2333, 'KALIMANTAN BARAT', 'SINTANG', 13, '', 0),
	(2334, 'RIAU', 'SOREK', 24, '', 0),
	(2335, 'LAMPUNG', 'SUKADANA', 18, '', 0),
	(2336, 'NUSA TENGGARA TIMUR', 'SUMBA', 22, '', 0),
	(2337, 'RIAU', 'SUNGAI PAKNING', 24, '', 0),
	(2338, 'JAMBI', 'SUNGAI PENUH', 9, '', 0),
	(2339, 'SULAWESI SELATAN', 'SUROAKO', 26, '', 0),
	(2340, 'NANGGROE ACEH DARUSSALAM', 'TAKENGON', 1, '', 0),
	(2341, 'KALIMANTAN SELATAN', 'TANAH BUMBU', 14, '', 0),
	(2342, 'SUMATERA UTARA', 'TANAH JAWA', 32, '', 0),
	(2343, 'LAMPUNG', 'TANGGAMUS', 18, '', 0),
	(2344, 'LAMPUNG', 'TANJUNG BINTANG', 18, '', 0),
	(2345, 'LAMPUNG', 'TANJUNG KARANG', 18, '', 0),
	(2346, 'SUMATERA UTARA', 'TANJUNG TIRAM', 32, '', 0),
	(2347, 'BANGKA-BELITUNG', 'TANJUNGPANDAN', 3, '', 0),
	(2348, 'SUMATERA UTARA', 'TAPANULI SELATAN', 32, '', 0),
	(2349, 'JAMBI', 'TELANAI PURA', 9, '', 0),
	(2350, 'RIAU', 'TELUK KUATAN', 24, '', 0),
	(2352, 'RIAU', 'TG. BALAI KARIMUN', 24, '', 0),
	(2353, 'RIAU', 'TG. BATU', 24, '', 0),
	(2354, 'KALIMANTAN TIMUR', 'TG. REDEP', 16, '', 0),
	(2355, 'MALUKU UTARA', 'TIDORE', 20, '', 0),
	(2356, 'SUMATERA UTARA', 'TIGARUNGGU', 32, '', 0),
	(2357, 'LAMPUNG', 'TULANG BAWANG', 18, '', 0),
	(2358, 'JAWA TIMUR', 'TULUNGAGUNG', 12, '', 0),
	(2359, 'JAMBI', 'TUNGKAL ILIR', 9, '', 0),
	(2360, 'SULAWESI SELATAN', 'WATAMPONE', 26, '', 0),
	(2362, 'LAMPUNG', 'WAY JEPARA', 18, '', 0),
	(2363, 'LAMPUNG', 'WAY KANAN', 18, '', 0),
	(2364, 'LAMPUNG', 'WAY TERUSAN NUNYAI', 18, '', 0);
/*!40000 ALTER TABLE `city_reference` ENABLE KEYS */;


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
  `file` text,
  `requitment` text,
  `city` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `status_jobs` varchar(50) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `agent` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_job`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.jobboard: ~4 rows (approximately)
/*!40000 ALTER TABLE `jobboard` DISABLE KEYS */;
INSERT INTO `jobboard` (`id_job`, `talent_seeker_id`, `job_title`, `job_description`, `file`, `requitment`, `city`, `provinsi`, `salary`, `status_jobs`, `experience`, `agent`, `date`, `enddate`, `n_status`) VALUES
	(1, '2', 'weqweq', 'rrrrrrrrrrrewrwe', '', 'werwerwre', 'GORONTALO', 'GORONTALO', 2, '1', '1', '1', '2014-11-12 13:34:55', '2014-11-28 00:00:00', 1),
	(2, '1', 'dww', 'erwer', '', 'werwer', 'BANGLI', 'BALI', 2, '0', '1', '1', '2014-11-12 14:11:47', '2014-11-23 00:00:00', 1),
	(3, '2', 'zcz', 'zxczxc', '07e9d442a95d6975d84d5b5bcdc906bc.jpg', 'zxczxc', 'BANGLI', 'BALI', 2, '0', '1', '1', '2014-11-13 11:16:34', '2014-11-21 00:00:00', 2),
	(4, '2', 'dsdas', 'asda', '10c471bd4e542ff1c39d5d8a2e70c301.jpg', 'sasdasd', 'BANDUNG', 'JAWA BARAT', 1, '0', '0', '1', '2014-11-13 11:16:34', '2014-11-25 00:00:00', 1);
/*!40000 ALTER TABLE `jobboard` ENABLE KEYS */;


-- Dumping structure for table creasi.job_category
CREATE TABLE IF NOT EXISTS `job_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobboard_id` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `subcategory_id` bigint(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.job_category: ~4 rows (approximately)
/*!40000 ALTER TABLE `job_category` DISABLE KEYS */;
INSERT INTO `job_category` (`id`, `jobboard_id`, `category_id`, `subcategory_id`, `date`, `n_status`) VALUES
	(1, 1, 4, 25, '2014-11-12 13:34:55', 1),
	(2, 2, 3, 8, '2014-11-12 14:11:47', 1),
	(3, 3, 4, 28, '2014-11-13 11:16:34', 1),
	(4, 4, 2, 3, '2014-11-17 10:26:42', 1);
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
  `category_id` int(10) DEFAULT NULL,
  `subcategory_id` int(10) DEFAULT NULL,
  `attribut_category_id` bigint(20) DEFAULT NULL,
  `accent_id` bigint(20) DEFAULT NULL,
  `accent` varchar(100) DEFAULT NULL,
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
  `interview` int(11) DEFAULT NULL,
  `n_status` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_application: ~3 rows (approximately)
/*!40000 ALTER TABLE `my_application` DISABLE KEYS */;
INSERT INTO `my_application` (`id`, `user_id`, `jobboard_id`, `date`, `interview`, `n_status`) VALUES
	(3, '26', '2', '2014-11-13 14:53:24', NULL, '1'),
	(4, '28', '2', '2014-11-13 15:46:38', NULL, '1'),
	(5, '26', '4', '2014-11-24 10:02:21', 1, '1'),
	(6, '28', '4', '2014-11-24 11:15:41', 1, '1');
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
  `skill` varchar(150) DEFAULT NULL,
  `software` varchar(150) DEFAULT NULL,
  `sallary` char(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_attribut_category: ~10 rows (approximately)
/*!40000 ALTER TABLE `my_attribut_category` DISABLE KEYS */;
INSERT INTO `my_attribut_category` (`id`, `user_id`, `category_id`, `subcategory_id`, `experience`, `agent`, `name_agent`, `tlp_agent`, `skill`, `software`, `sallary`, `date`, `n_status`) VALUES
	(1, '26', 3, 10, 'No', '', '', 0, 'ksksksk', '', '', '2014-11-04 15:02:30', 1),
	(2, '28', 3, 10, 'Yes', '', '', 0, 'oskks', '', '', '2014-11-04 15:10:22', 1),
	(3, '28', 3, 11, 'Yes', '', '', 0, 'asasd', '', '', '2014-11-04 15:10:22', 1),
	(4, '32', 5, 32, '', '', '', 0, '', '', '', '2014-11-17 09:13:34', 1),
	(5, '32', 5, 33, '', '', '', 0, '', '', '', '2014-11-17 09:13:34', 1),
	(6, '33', 5, 33, '', '', '', 0, '', '', '', '2014-11-19 13:57:38', 1),
	(7, '34', 12, 114, '', '', '', 0, '', '', '', '2014-11-19 14:00:11', 1),
	(8, '34', 12, 115, '', '', '', 0, '', '', '', '2014-11-19 14:00:11', 1),
	(9, '35', 6, 41, '', '', '', 0, '', '', '', '2014-11-19 17:20:08', 1),
	(10, '35', 6, 42, '', '', '', 0, '', '', '', '2014-11-19 17:20:08', 1);
/*!40000 ALTER TABLE `my_attribut_category` ENABLE KEYS */;


-- Dumping structure for table creasi.my_camera_equipment
CREATE TABLE IF NOT EXISTS `my_camera_equipment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `subcategory_id` int(10) DEFAULT NULL,
  `attribut_category_id` int(10) DEFAULT NULL,
  `camera_equipment_id` int(10) DEFAULT NULL,
  `camera_equipment` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_camera_equipment: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_camera_equipment` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_camera_equipment` ENABLE KEYS */;


-- Dumping structure for table creasi.my_category
CREATE TABLE IF NOT EXISTS `my_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_category: ~10 rows (approximately)
/*!40000 ALTER TABLE `my_category` DISABLE KEYS */;
INSERT INTO `my_category` (`id`, `category_id`, `user_id`, `date`, `status`) VALUES
	(1, 3, 24, '2014-11-04 14:50:56', 1),
	(2, 5, 24, '2014-11-04 14:50:56', 1),
	(3, 3, 26, '2014-11-04 15:02:30', 1),
	(4, 3, 28, '2014-11-04 15:10:22', 1),
	(5, 5, 32, '2014-11-17 09:13:34', 1),
	(6, 5, 33, '2014-11-19 13:57:38', 1),
	(7, 12, 34, '2014-11-19 14:00:11', 1),
	(8, 6, 35, '2014-11-19 17:20:08', 1),
	(9, 6, 37, '2014-11-19 17:20:08', 1),
	(10, 6, 25, '2014-11-19 17:20:08', 1);
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_comment: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_comment` ENABLE KEYS */;


-- Dumping structure for table creasi.my_dancer_formation
CREATE TABLE IF NOT EXISTS `my_dancer_formation` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `subcategory_id` int(10) DEFAULT NULL,
  `attribut_category_id` int(10) DEFAULT NULL,
  `fromation_id` int(10) DEFAULT NULL,
  `fromation` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_dancer_formation: ~3 rows (approximately)
/*!40000 ALTER TABLE `my_dancer_formation` DISABLE KEYS */;
INSERT INTO `my_dancer_formation` (`id`, `user_id`, `category_id`, `subcategory_id`, `attribut_category_id`, `fromation_id`, `fromation`, `date`, `n_status`) VALUES
	(1, 26, 3, 10, 1, 2, 'Couple', '2014-11-04 15:02:30', 1),
	(2, 28, 3, 10, 2, 2, 'Couple', '2014-11-04 15:10:22', 1),
	(3, 28, 3, 11, 3, 2, 'Couple', '2014-11-04 15:10:22', 1);
/*!40000 ALTER TABLE `my_dancer_formation` ENABLE KEYS */;


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


-- Dumping structure for table creasi.my_ethnicity
CREATE TABLE IF NOT EXISTS `my_ethnicity` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `subcategory_id` int(10) DEFAULT NULL,
  `arrtibut_category_id` int(10) DEFAULT NULL,
  `ethnicity_id` int(10) DEFAULT NULL,
  `ethnicity` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_ethnicity: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_ethnicity` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_ethnicity` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_follow: ~3 rows (approximately)
/*!40000 ALTER TABLE `my_follow` DISABLE KEYS */;
INSERT INTO `my_follow` (`id`, `user_id`, `friend_id`, `date`, `n_status`) VALUES
	(2, '28', '28', '2014-11-04 15:32:38', NULL),
	(3, '28', '26', '2014-11-04 15:35:03', NULL),
	(4, '1', '28', '2014-11-14 11:39:40', NULL);
/*!40000 ALTER TABLE `my_follow` ENABLE KEYS */;


-- Dumping structure for table creasi.my_guardian
CREATE TABLE IF NOT EXISTS `my_guardian` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `name_parent` varchar(150) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `phone` char(25) DEFAULT NULL,
  `identitas` varchar(25) DEFAULT NULL,
  `address` text,
  `email` varchar(25) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_guardian: ~4 rows (approximately)
/*!40000 ALTER TABLE `my_guardian` DISABLE KEYS */;
INSERT INTO `my_guardian` (`id`, `user_id`, `name_parent`, `birth`, `phone`, `identitas`, `address`, `email`, `date`, `n_status`) VALUES
	(1, 62, 'safdsf', '0000-00-00', '23213', '23213213', 'sdfdsfdsf', 'sdfdsfds', '2014-11-19 04:27:25', 1),
	(2, 63, '', '0000-00-00', '', '', '', '', '2014-11-19 04:34:48', 1),
	(3, 64, 'xcxz', '0000-00-00', '23123', '2321', 'dsfdsf', 'sdadsd', '2014-11-19 04:53:48', 1),
	(4, 35, '', '0000-00-00', '', '', '', '', '2014-11-19 17:20:08', 1);
/*!40000 ALTER TABLE `my_guardian` ENABLE KEYS */;


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
  `category_id` int(10) DEFAULT NULL,
  `subcategory_id` int(10) DEFAULT NULL,
  `arrtibut_category_id` bigint(20) DEFAULT NULL,
  `loking_for_id` char(50) DEFAULT NULL,
  `loking_for` mediumint(9) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_loking_for: ~3 rows (approximately)
/*!40000 ALTER TABLE `my_loking_for` DISABLE KEYS */;
INSERT INTO `my_loking_for` (`id`, `user_id`, `category_id`, `subcategory_id`, `arrtibut_category_id`, `loking_for_id`, `loking_for`, `date`, `n_status`) VALUES
	(1, 26, 3, 10, 1, '2', 0, '2014-11-04 15:02:30', 1),
	(2, 28, 3, 10, 2, '2', 0, '2014-11-04 15:10:22', 1),
	(3, 28, 3, 11, 3, '1', 0, '2014-11-04 15:10:22', 1);
/*!40000 ALTER TABLE `my_loking_for` ENABLE KEYS */;


-- Dumping structure for table creasi.my_love
CREATE TABLE IF NOT EXISTS `my_love` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(50) DEFAULT NULL,
  `friend_id` char(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_love: ~5 rows (approximately)
/*!40000 ALTER TABLE `my_love` DISABLE KEYS */;
INSERT INTO `my_love` (`id`, `user_id`, `friend_id`, `date`, `n_status`) VALUES
	(1, '28', '26', '2014-11-04 15:35:30', 1),
	(18, '26', '34', '2014-11-20 17:35:04', 1),
	(19, '26', '33', '2014-11-20 17:35:11', 1),
	(20, '26', '28', '2014-11-20 17:35:18', 1),
	(21, '', '37', '2014-11-24 09:48:00', 1);
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


-- Dumping structure for table creasi.my_music_genre
CREATE TABLE IF NOT EXISTS `my_music_genre` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `subcategory_id` int(10) DEFAULT NULL,
  `attribut_category_id` int(10) DEFAULT NULL,
  `genre_id` int(10) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_music_genre: ~0 rows (approximately)
/*!40000 ALTER TABLE `my_music_genre` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_music_genre` ENABLE KEYS */;


-- Dumping structure for table creasi.my_open_for
CREATE TABLE IF NOT EXISTS `my_open_for` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `subcategory_id` int(10) DEFAULT NULL,
  `attribut_category_id` char(50) DEFAULT NULL,
  `oppen_for_id` int(10) DEFAULT NULL,
  `oppen_for` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_open_for: ~2 rows (approximately)
/*!40000 ALTER TABLE `my_open_for` DISABLE KEYS */;
INSERT INTO `my_open_for` (`id`, `user_id`, `category_id`, `subcategory_id`, `attribut_category_id`, `oppen_for_id`, `oppen_for`, `date`, `n_status`) VALUES
	(1, 28, 3, 10, '2', 3, 'Paid', '2014-11-04 15:10:22', 1),
	(2, 28, 3, 11, '3', 3, 'Paid', '2014-11-04 15:10:22', 1);
/*!40000 ALTER TABLE `my_open_for` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_portofolio: ~1 rows (approximately)
/*!40000 ALTER TABLE `my_portofolio` DISABLE KEYS */;
INSERT INTO `my_portofolio` (`id`, `user_id`, `type`, `title`, `description`, `love_count`, `view_count`, `images`, `video_url`, `audio`, `date`, `n_status`) VALUES
	(1, 28, NULL, 'zx', 'ZxZxZxZ', NULL, NULL, 'cc4b34a0314b9094c5a4e57973b27d04.jpg', NULL, NULL, '2014-11-04 15:22:40', 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.my_subcategory: ~37 rows (approximately)
/*!40000 ALTER TABLE `my_subcategory` DISABLE KEYS */;
INSERT INTO `my_subcategory` (`id`, `category_id`, `subcategory_id`, `user_id`, `n_status`) VALUES
	(1, 3, 9, 24, 1),
	(2, 3, 10, 24, 1),
	(3, 3, 12, 24, 1),
	(4, 5, 35, 24, 1),
	(5, 5, 36, 24, 1),
	(6, 3, 10, 26, 1),
	(7, 3, 10, 28, 1),
	(8, 3, 11, 28, 1),
	(12, 5, 5, 26, 1),
	(13, 3, 3, 26, 1),
	(14, 4, 28, 26, 1),
	(15, 4, 29, 26, 1),
	(16, 4, 27, 26, 1),
	(17, 4, 28, 26, 1),
	(18, 2, 0, 26, 1),
	(19, 2, 0, 26, 1),
	(20, 5, 35, 26, 1),
	(21, 5, 35, 26, 1),
	(22, 3, 10, 26, 1),
	(23, 3, 13, 26, 1),
	(24, 5, 33, 1, 1),
	(25, 4, 28, 1, 1),
	(26, 5, 35, 1, 1),
	(27, 3, 10, 1, 1),
	(28, 5, 37, 1, 1),
	(29, 3, 11, 1, 1),
	(30, 4, 28, 1, 1),
	(31, 3, 11, 1, 1),
	(32, 4, 27, 1, 1),
	(33, 5, 33, 1, 1),
	(34, 5, 32, 32, 1),
	(35, 5, 33, 32, 1),
	(36, 5, 33, 33, 1),
	(37, 12, 114, 34, 1),
	(38, 12, 115, 34, 1),
	(39, 6, 41, 35, 1),
	(40, 6, 42, 35, 1);
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


-- Dumping structure for table creasi.province_reference
CREATE TABLE IF NOT EXISTS `province_reference` (
  `id` int(11) NOT NULL,
  `province` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table creasi.province_reference: ~33 rows (approximately)
/*!40000 ALTER TABLE `province_reference` DISABLE KEYS */;
INSERT INTO `province_reference` (`id`, `province`) VALUES
	(1, 'NANGGROE ACEH DARUSSALAM'),
	(2, 'BALI'),
	(3, 'BANGKA-BELITUNG'),
	(4, 'BANTEN'),
	(5, 'BENGKULU'),
	(6, 'GORONTALO'),
	(7, 'IRIAN JAYA BARAT'),
	(8, 'JAKARTA RAYA'),
	(9, 'JAMBI'),
	(10, 'JAWA BARAT'),
	(11, 'JAWA TENGAH'),
	(12, 'JAWA TIMUR'),
	(13, 'KALIMANTAN BARAT'),
	(14, 'KALIMANTAN SELATAN'),
	(15, 'KALIMANTAN TENGAH'),
	(16, 'KALIMANTAN TIMUR'),
	(17, 'KEPULAUAN RIAU'),
	(18, 'LAMPUNG'),
	(19, 'MALUKU'),
	(20, 'MALUKU UTARA'),
	(21, 'NUSA TENGGARA BARAT'),
	(22, 'NUSA TENGGARA TIMUR'),
	(23, 'PAPUA'),
	(24, 'RIAU'),
	(25, 'SULAWESI BARAT'),
	(26, 'SULAWESI SELATAN'),
	(27, 'SULAWESI TENGAH'),
	(28, 'SULAWESI TENGGARA'),
	(29, 'SULAWESI UTARA'),
	(30, 'SUMATERA BARAT'),
	(31, 'SUMATERA SELATAN'),
	(32, 'SUMATERA UTARA'),
	(33, 'DI YOGYAKARTA');
/*!40000 ALTER TABLE `province_reference` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- Dumping data for table creasi.social_member: ~12 rows (approximately)
/*!40000 ALTER TABLE `social_member` DISABLE KEYS */;
INSERT INTO `social_member` (`id`, `name`, `nickname`, `email`, `register_date`, `img`, `img_cover`, `img_avatar`, `username`, `last_login`, `city`, `sex`, `birthday`, `last_name`, `StreetName`, `phone_number`, `fb_link`, `twitter_link`, `instagram_link`, `website_link`, `role`, `login_count`, `view_count`, `love_count`, `follow_count`, `submit_count`, `try_to_login`, `jobs_count`, `verified`, `salt`, `password`, `n_status`) VALUES
	(1, 'Imam Maulana', 'sdfsd', 'dfsd@skdsd.com', '2014-10-10 14:13:41', 'bc12426282639e6de176366b813b3499.jpg', NULL, 'bc12426282639e6de176366b813b3499.jpg', 'oceboysip', '2014-11-24 11:18:51', 'JAKARTA TIMUR', 'male', '2014-10-10', 'sdfsd', 'Jalan Sisinga Mangarajaa', 4353451, NULL, NULL, NULL, NULL, 2, 0, 2, 4, 10, 0, 0, 0, 0, NULL, 'qOyRN+0yz2PHJWCQ0VPIg09ejbY0YUK6kY757z1QB0U=', 1),
	(24, 'imam maulana', 'imam', 'oceboysip@gmail.com', '2014-11-04 14:50:56', '2d1246a098066e90515b191c04709036.JPG', NULL, '2d1246a098066e90515b191c04709036.JPG', 'imam.maulana2011', NULL, 'JAKARTA TIMUR', 'male', '0000-00-00', NULL, NULL, 89288383737, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 0, 0, 0, '12345678', 'vWCUrOUQH8HlgfqvfJsmA/RA3oAZo59vhbGw+mH1a5U=', 1),
	(25, 'asdasdasd', 'boni', 'imam.maulsana@kana.co.id', '2014-11-04 15:01:09', '2d1246a098066e90515b191c04709036.JPG', NULL, '2d1246a098066e90515b191c04709036.JPG', 'ssdas@asdas', '2014-11-21 17:17:11', 'BARABAI', 'female', '0000-00-00', NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 0, 0, 0, '12345678', 'vU9+1KNgzoWf3XejBnbWaqjGC9LKasXq/xNt2d6Ior0=', 1),
	(26, 'wahyu', 'wahuyu', 'wahyu@wahu.com', '2014-11-04 15:02:30', '2d1246a098066e90515b191c04709036.JPG', NULL, '2d1246a098066e90515b191c04709036.JPG', 'wahyu', '2014-11-24 11:50:21', 'JAKARTA PUSAT', 'male', '0000-00-00', NULL, NULL, 82272728, NULL, NULL, NULL, NULL, 1, 0, 3, 1, 1, 0, 0, 0, 0, '12345678', 'qOyRN+0yz2PHJWCQ0VPIg09ejbY0YUK6kY757z1QB0U=', 1),
	(28, 'anggas', 'anggas', 'addna@ksks.com', '2014-11-04 15:10:22', 'fa3515ffa2121e16e3c4e99def6857aa.JPG', NULL, 'fa3515ffa2121e16e3c4e99def6857aa.JPG', 'anggas', '2014-11-24 11:15:15', 'JAKARTA TIMUR', 'female', '0000-00-00', NULL, 'sdasdasdasd', 20929, NULL, NULL, NULL, NULL, 1, 0, 11, 1, 2, 0, 0, 0, 0, '12345678', 'qOyRN+0yz2PHJWCQ0VPIg09ejbY0YUK6kY757z1QB0U=', 1),
	(30, 'asd', NULL, 'as', '2014-11-07 17:11:59', '2d1246a098066e90515b191c04709036.JPG', NULL, '2d1246a098066e90515b191c04709036.JPG', 'as', NULL, 'JAKARTA PUSAT', 'female', NULL, 'asd', NULL, 2, NULL, NULL, NULL, NULL, 2, 0, 0, 0, 0, 0, 0, 0, 0, '12345678', 'CTgFCpSQRnsX3JCdePy/24o825zlzntV2PPUaDEhLBY=', 1),
	(31, 'asda', NULL, 'asdas@asdas.com', '2014-11-07 17:17:25', NULL, NULL, NULL, 'asdas@asdas.com', NULL, 'MANOKWARI BARAT', 'female', NULL, 'sd', NULL, 324234, NULL, NULL, NULL, NULL, 2, 0, 0, 0, 0, 0, 0, 0, 0, '12345678', 'CTgFCpSQRnsX3JCdePy/24o825zlzntV2PPUaDEhLBY=', 1),
	(32, 'dfsdf', 'fsdfsd', 'doni@dasdas.com', '2014-11-17 09:13:34', NULL, NULL, NULL, 'doni@dasdas.com', '2014-11-21 17:17:13', 'JAKARTA SELATAN', 'female', '0000-00-00', NULL, NULL, 3345345, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 0, 0, 0, '12345678', 'Qw9S+5WsHvsMj3YYvIz1HxvCwPcqmT11627qTbEiEtQ=', 1),
	(33, 'bayu', 'boni', 'imam.maulana@kana.co.id', '2014-11-19 13:57:38', NULL, NULL, NULL, 'imam.maulana@kana.co.id', '2014-11-21 17:17:12', 'BARABAI', 'male', '0000-00-00', NULL, NULL, 922929, NULL, NULL, NULL, NULL, 1, 0, 1, 1, 0, 0, 0, 0, 0, '12345678', 'Qw9S+5WsHvsMj3YYvIz1HxvCwPcqmT11627qTbEiEtQ=', 1),
	(34, 'bvbv', 'vbvn', 'imam.maulanaiu@kana.co.id', '2014-11-19 14:00:11', NULL, NULL, NULL, 'imam.maulanaiu@kana.co.id', NULL, 'BANJAR BARU', 'male', '0000-00-00', NULL, NULL, 1234, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 0, 0, 0, 0, 0, '12345678', 'j5uY1IzXPLV4atfmY07r9Mc0vLvPoBnQouqHp6gx3f0=', 1),
	(35, 'imam malik ibrahim', 'malik', 'imam.maulana@kkk.com', '2014-11-19 17:20:08', NULL, NULL, NULL, 'imam.maulana@kkk.com', '2014-11-19 17:21:22', 'BEKASI', 'male', '0000-00-00', NULL, NULL, 21312312, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 0, 0, 0, '12345678', 'vWCUrOUQH8HlgfqvfJsmA/RA3oAZo59vhbGw+mH1a5U=', 1),
	(37, 'asdasdasd', 'boni', 'imam.maulsassna@kana.co.id', '2014-11-04 15:01:09', '2d1246a098066e90515b191c04709036.JPG', NULL, '2d1246a098066e90515b191c04709036.JPG', 'ssdas@asdssas', '2014-11-21 17:17:11', 'BARABAI', 'female', '0000-00-00', NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 0, 0, 0, 0, 0, '12345678', 'vU9+1KNgzoWf3XejBnbWaqjGC9LKasXq/xNt2d6Ior0=', 1);
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

-- Dumping data for table creasi.tbl_category: ~11 rows (approximately)
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` (`id`, `category_name`, `date`, `n_status`) VALUES
	(2, 'Actor', '2014-10-29 03:18:33', 1),
	(3, 'Dancer', '2014-10-29 03:18:56', 1),
	(4, 'Designer', '2014-10-29 03:19:15', 1),
	(5, 'Editor', '2014-10-29 03:19:34', 1),
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


-- Dumping structure for table creasi.tbl_mylookingfor
CREATE TABLE IF NOT EXISTS `tbl_mylookingfor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_job` char(50) DEFAULT NULL,
  `looking_for` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.tbl_mylookingfor: ~7 rows (approximately)
/*!40000 ALTER TABLE `tbl_mylookingfor` DISABLE KEYS */;
INSERT INTO `tbl_mylookingfor` (`id`, `id_job`, `looking_for`, `date`, `n_status`) VALUES
	(1, '1', 'parttime', '2014-11-12 13:34:55', 1),
	(2, '1', 'freelancer', '2014-11-12 13:34:55', 1),
	(3, '2', 'parttime', '2014-11-12 14:11:47', 1),
	(4, '2', 'freelancer', '2014-11-12 14:11:47', 1),
	(5, '3', 'parttime', '2014-11-13 11:16:34', 1),
	(6, '3', 'freelancer', '2014-11-13 11:16:34', 1),
	(7, '4', 'parttime', '2014-11-17 09:19:47', 1);
/*!40000 ALTER TABLE `tbl_mylookingfor` ENABLE KEYS */;


-- Dumping structure for table creasi.tbl_notification
CREATE TABLE IF NOT EXISTS `tbl_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) DEFAULT NULL,
  `detail` text,
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


-- Dumping structure for table creasi.tbl_share
CREATE TABLE IF NOT EXISTS `tbl_share` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idsosmed` varchar(100) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `module` int(10) DEFAULT NULL,
  `id_module` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `media` varchar(100) DEFAULT NULL,
  `date_share` datetime DEFAULT NULL,
  `n_status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.tbl_share: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_share` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_share` ENABLE KEYS */;


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
  `marking` int(2) DEFAULT NULL,
  `n_status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.tbl_talent: ~7 rows (approximately)
/*!40000 ALTER TABLE `tbl_talent` DISABLE KEYS */;
INSERT INTO `tbl_talent` (`id`, `user_id`, `alamat`, `no_tlp`, `no_ktp`, `images_profile`, `skill`, `marking`, `n_status`) VALUES
	(1, 25, '', '', '', NULL, NULL, NULL, 1),
	(2, 26, 'asdasd', '082272728', '234234', NULL, 'asdasdasd', NULL, 1),
	(3, 28, '', '020929', '', NULL, NULL, NULL, 1),
	(4, 32, '', '3345345', '', NULL, NULL, NULL, 1),
	(5, 33, '', '922929', '', NULL, NULL, NULL, 1),
	(6, 34, '', '1234', '', NULL, NULL, NULL, 1),
	(7, 35, '', '21312312', '', NULL, NULL, NULL, 1);
/*!40000 ALTER TABLE `tbl_talent` ENABLE KEYS */;


-- Dumping structure for table creasi.tbl_talent_seeker
CREATE TABLE IF NOT EXISTS `tbl_talent_seeker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(50) DEFAULT NULL,
  `nama_perusahaan` char(100) DEFAULT NULL,
  `alamat_perusahaan` text,
  `provinsi` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `no_tlp` char(50) DEFAULT NULL,
  `verified` int(2) DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table creasi.tbl_talent_seeker: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_talent_seeker` DISABLE KEYS */;
INSERT INTO `tbl_talent_seeker` (`id`, `user_id`, `nama_perusahaan`, `alamat_perusahaan`, `provinsi`, `city`, `no_tlp`, `verified`, `n_status`) VALUES
	(1, '2', 'PT IMAM', 'jalan abcde', NULL, NULL, '4334534', NULL, 1),
	(2, '1', 'PT SEMURNA', 'adasda asd asd', NULL, NULL, '12312312', NULL, 1),
	(3, '30', 'a', 'a', '', 'JAKARTA PUSAT', 'a', NULL, 1),
	(4, '31', 'asdasd', 'sadasdas', 'IRIAN JAYA BARAT', 'MANOKWARI BARAT', '223423', NULL, 1);
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
