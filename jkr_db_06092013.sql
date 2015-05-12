-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 06, 2013 at 01:53 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jkr_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `broken_log`
--

CREATE TABLE IF NOT EXISTS `broken_log` (
  `bl_id` int(10) NOT NULL AUTO_INCREMENT,
  `bl_unit` varchar(200) NOT NULL,
  `bl_recorddate` datetime NOT NULL,
  `bl_settledate` datetime NOT NULL,
  `bl_repairstatus` int(11) NOT NULL,
  `bl_reason` varchar(2000) NOT NULL,
  `bl_harga` decimal(10,2) NOT NULL,
  `c_id` int(10) NOT NULL,
  `v_id` int(10) NOT NULL,
  `s_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `bl_remarks` varchar(2000) NOT NULL,
  `f_id` int(11) NOT NULL,
  `bl_status` int(11) NOT NULL,
  `bl_nodo` varchar(200) NOT NULL,
  `pe_id` int(11) NOT NULL,
  `bl_nosebutharga` varchar(200) NOT NULL,
  `jk_id` int(11) NOT NULL,
  `bl_nolo` varchar(200) DEFAULT NULL,
  `bl_date_nolo` datetime DEFAULT NULL,
  `bl_invoice` varchar(200) DEFAULT NULL,
  `bl_date_invoice` datetime DEFAULT NULL,
  `bl_voucher` varchar(200) DEFAULT NULL,
  `bl_date_voucher` datetime DEFAULT NULL,
  PRIMARY KEY (`bl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `broken_log`
--

INSERT INTO `broken_log` (`bl_id`, `bl_unit`, `bl_recorddate`, `bl_settledate`, `bl_repairstatus`, `bl_reason`, `bl_harga`, `c_id`, `v_id`, `s_id`, `u_id`, `bl_remarks`, `f_id`, `bl_status`, `bl_nodo`, `pe_id`, `bl_nosebutharga`, `jk_id`, `bl_nolo`, `bl_date_nolo`, `bl_invoice`, `bl_date_invoice`, `bl_voucher`, `bl_date_voucher`) VALUES
(1, 'KR/001/2013', '2013-08-28 17:03:29', '2013-08-31 00:00:00', 1, '', '333.00', 6, 4, 4, 1, 'hahaha', 3, 2, '', 1, '', 2, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(2, 'US/001/2013', '2013-08-28 17:33:44', '2013-08-30 00:00:00', 1, '', '444.00', 3, 4, 1, 1, 'ddd', 1, 2, '', 1, '', 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(3, 'KB/001/2013', '2013-08-28 17:34:51', '2013-08-30 00:00:00', 1, '', '555.00', 1, 15, 3, 1, 'yayaya', 1, 2, '', 1, '', 3, '', '0000-00-00 00:00:00', '34dd', '2013-09-04 00:20:48', '', '0000-00-00 00:00:00'),
(4, 'US/002/2013', '2013-08-29 15:47:31', '2013-08-31 00:00:00', 1, '', '555.00', 1, 5, 3, 1, 'qweqweqwe', 1, 2, '', 1, '', 2, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `broken_log_component`
--

CREATE TABLE IF NOT EXISTS `broken_log_component` (
  `blc_id` int(10) NOT NULL AUTO_INCREMENT,
  `bl_id` int(10) NOT NULL,
  `blc_name` varchar(200) NOT NULL,
  `blc_quantity` int(11) NOT NULL,
  `blc_datetime` datetime NOT NULL,
  PRIMARY KEY (`blc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `broken_log_unit`
--

CREATE TABLE IF NOT EXISTS `broken_log_unit` (
  `blu_id` int(11) NOT NULL AUTO_INCREMENT,
  `blu_code` varchar(20) NOT NULL,
  `blu_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`blu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `broken_log_unit`
--

INSERT INTO `broken_log_unit` (`blu_id`, `blu_code`, `blu_desc`) VALUES
(1, 'KR', 'Kenderaan Ringan'),
(2, 'KB', 'Kenderaan Berat'),
(3, 'US', 'Unit Sokongan'),
(4, 'ST', 'Stor'),
(5, 'JB', 'Jentera Berat');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('f1e16fdecda473f42e058c3a941973e1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1373153484, 'a:2:{s:9:"user_data";s:0:"";s:20:"flash:old:action_msg";s:28:"Invalid username or password";}');

-- --------------------------------------------------------

--
-- Table structure for table `contractor`
--

CREATE TABLE IF NOT EXISTS `contractor` (
  `c_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(200) NOT NULL,
  `c_personincharge` varchar(200) NOT NULL,
  `c_phoneno` varchar(20) NOT NULL,
  `c_address` varchar(2000) NOT NULL,
  `c_postcode` varchar(10) NOT NULL,
  `c_negeri` varchar(200) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `contractor`
--

INSERT INTO `contractor` (`c_id`, `c_name`, `c_personincharge`, `c_phoneno`, `c_address`, `c_postcode`, `c_negeri`) VALUES
(1, 'DAYA WAWASAN AUTOMOTIVE', 'MAMAT', '', 'N/TO 1-14 JLN TTC 1 TMN TEKN CHENG', '75250', 'MELAKA'),
(2, 'AUTO CONNEXION, SIME DARBY AUTO CONNEXION SDN BHD', 'MINAH', '', 'NO 616, BATU 3 ¾, JALAN IPOH', '52100', 'KUALA LUMPUR'),
(3, 'COMMECTS(M)SDN BHD', '', '', '36,37 JALAN IKS MJ4,TAMAN IKS MALIM JAYA,', '75250', 'MELAKA'),
(4, 'KAH MOTOR CO.SDN.BHD.', '', '', 'NO 88,JALAN SEMABOK', '75050', 'MELAKA'),
(5, 'KEJURUTERAAN BINA KALAM SDN BHD', '', '', 'BATU 3, JALAN BUKIT GODEK, SEMABOK', '75050', 'MELAKA'),
(6, 'WIRA MEDIK AUTOMOBILE SERVICES SDN BHD', '', '', 'NO 25 JALAN SP 2,TAMAN SRI PANDAN', '75250', 'MELAKA'),
(7, 'ZAIS ENTERPRISE & MACHINERY', '', '', 'KM 16,BUKIT TAMBUN , DURIAN TUNGGAL', '76100', 'MELAKA'),
(8, 'RZ JAYA ENTERPRISE', '', '', 'PLOT 463, NO 14,JALAN BERKAT 8, TAMAN MALIM JAYA', '75250', 'MELAKA'),
(9, 'BENGKEL KERETA SAHAR', '', '', 'PETI SURAT NO 48 PEJABAT POS ALOR GAJAH , ALOR GAJAH', '78000', 'MELAKA'),
(10, 'USAHASAMA SBJ ENTERPRISE', '', '', '25-1,JLN PJ1,TMN PERTAM JAYA', '75050', 'MELAKA'),
(11, 'GOTONG WIRA ENTERPRISE', '', '', 'NO 112 TIGKAT 1 TMN ASEAN JLN MALIM', '75250', 'MELAKA'),
(12, 'HAJA ADVERTISING ', '', '', 'NO 30, JALAN HANG TUAH', '75350', 'MELAKA'),
(13, 'NORFERE ENTERPISE', '', '', '2588-3 BATU 8 GEDUNG LALANG BKT RAMBAI', '75200', 'MELAKA'),
(14, 'PERNIAGAAN KAMAL', '', '', 'T-127 NO 11 JLN TMN TEKNOLOGI CHENG,', '75250', 'MELAKA'),
(15, 'MAFA BERKAT ENTERPISE', '', '', 'NO 203-2 KAMPUNG MUSAI BUKIT BARU', '75150', 'MELAKA'),
(16, 'NORFAZ ENTERPRISE', '', '', 'NO 28A JALAN KUNDANG 13,TAMAN BUKIT PASIR,BATU PAHAT', '83000', 'JOHOR'),
(17, 'PERCETAKAN NASIONAL MALAYSIA BERHAD', '', '', 'NO.112, JLAN TU2 TAMAN TASEK UTAMA AYER KEROH', '75450', 'MELAKA'),
(18, 'R’AUTO CARE ENTERPRISE', '', '', 'NO.1 JALAN S.P 1 TAMAN SERI PANDAN LORONG PANDAN ', '75250', 'MELAKA'),
(19, 'SAUJANA MEGA ENTERPRISE', '', '', '399-J TAMAN NAM SENG JALAN TUN PERAK', '75200', 'MELAKA'),
(20, 'PERKHIDMATAN TAYAR SERANTAU DESA', '', '', 'NO 41 JLN BB1 TMN BACHANG BARU', '75350', 'MELAKA'),
(21, 'ZAIS ENTERPRISE & MACHINERY', '', '', 'KM 16,BUKIT TAMBUN DURIAN TUNGGAL', '76100', 'MELAKA'),
(22, 'BENGKEL KERETA SAHAR', '', '', 'NO.30 IKS KELEMAK,SG PETAI ALOR GAJAH', '78000', 'MELAKA'),
(23, 'EDARAN TAN CHONG MOTOR SDN BHD', '', '', 'NO.35,JALAN CP 1/21A', '75250', 'MELAKA'),
(24, 'ENERGY SMART AUTO SEMI-D FACTORY', '', '', 'NO.8,JALAN JASA MERDEKA 2 TAMAN DATUK TAMBY CHIK KARIM', '75350', 'MELAKA'),
(25, 'MZK GEMILANG ENTERPRISE', '', '', 'KM 32 KG KELUBI, JASIN', '77000', ''),
(26, 'PARAMOUNT VALUE SDN BHD', '', '', 'LOT 18, JALAN TAMING SARI', '75400', 'MELAKA'),
(27, 'SHAZMI SERVICES CENTRE AND SUPPLIES', '', '', 'NO 14, JALAN DELIMA 12, TAMAN CAHAYA MASAI, PASIR GUDANG', '81700', 'x'),
(28, 'SURIA ENTERPRISE', '', '', 'BERTAM RIA, JALAN PULAU GADONG', '75250', 'MELAKA'),
(29, 'TOUCH N GO SDN BHD', '', '', 'Tower 6,Avenue 5,Bangsar South No.8, Jalan Kerinchi,', '59200', 'Kuala Lumpur'),
(30, 'UMW EQUIPMENT SDN BHD', '', '', 'NO.3, JALAN UTAS (15/7) P.O BOX 7052 SHAH ALAM', '40915', 'SELANGOR DARUL EHSAN'),
(31, 'UMW EQUIPMENT SDN BHD', '', '', 'NO 64 JLN LANGKASUKA P.O BOX243 LARKIN INDUSTRIAL ESTATE', '80350', 'JOHOR BAHRU'),
(32, 'ZARIS TEKNOLOGI ENTERPRISE', '', '', 'NO.34. JALAN TP 9 TAMAN TERENDAK PERMAI SG UDANG', '76300', 'MELAKA'),
(33, 'ZAIMIAH ENTERPRISE', '', '', 'LOT 865 JLN HJ OTHMAN BUKIT LINTANG', '75460', 'MELAKA'),
(34, 'JAYA HAWA DINGIN', '', '', 'LOT 7 4619 TANJUNG KELING', '76400', 'MELAKA'),
(35, 'MHE-DEMAG LOGISTICS MALAYSIA SDN BHD', '', '', '51-GJALAN MP3 TAMAN MERDEKA PERMAI BATU BERENDAM', '75350', 'MELAKA'),
(36, 'MEJOR TRAX AUTO ENTERPRISE', '', '', 'NO.32-G JALAN BERTAM JAYA 9A TAMAN BERTAM JAYA', '75250', 'MELAKA');

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE IF NOT EXISTS `finance` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_code` varchar(20) NOT NULL,
  `f_desc` varchar(200) NOT NULL,
  `f_money` decimal(10,0) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`f_id`, `f_code`, `f_desc`, `f_money`) VALUES
(1, 'F28', 'Peruntukan Kerajaan - Perkhidmatan', '-48008'),
(2, 'F26', 'Peruntukan Kerajaan - Alat Ganti', '100000'),
(3, 'S28', 'Peruntukan Negeri - Perkhidmatan', '99448'),
(4, 'S26', 'Peruntukan Negeri - Alat Ganti', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kerja`
--

CREATE TABLE IF NOT EXISTS `jenis_kerja` (
  `jk_id` int(11) NOT NULL AUTO_INCREMENT,
  `jk_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`jk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jenis_kerja`
--

INSERT INTO `jenis_kerja` (`jk_id`, `jk_desc`) VALUES
(1, 'SERVIS'),
(2, 'PEMBAIKIAN KECIL'),
(3, 'PEMBAIKIAN BESAR'),
(4, 'BAIK PULIH');

-- --------------------------------------------------------

--
-- Table structure for table `letter_order`
--

CREATE TABLE IF NOT EXISTS `letter_order` (
  `lo_id` int(10) NOT NULL AUTO_INCREMENT,
  `bl_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `lo_expenses` decimal(10,2) NOT NULL DEFAULT '0.00',
  `lo_createddate` datetime NOT NULL,
  `lo_approveddate` datetime NOT NULL,
  `lo_approvedby` int(11) NOT NULL,
  PRIMARY KEY (`lo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `letter_order`
--

INSERT INTO `letter_order` (`lo_id`, `bl_id`, `u_id`, `lo_expenses`, `lo_createddate`, `lo_approveddate`, `lo_approvedby`) VALUES
(4, 3, 1, '3025.00', '2013-08-28 20:25:54', '2013-08-29 15:48:29', 2),
(5, 1, 1, '552.00', '2013-08-28 20:26:22', '2013-08-29 15:48:29', 2),
(6, 2, 1, '15252.00', '2013-08-28 20:26:46', '2013-08-29 15:48:29', 2),
(7, 4, 1, '49008.00', '2013-08-29 15:47:56', '2013-08-29 15:48:29', 2);

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE IF NOT EXISTS `month` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`m_id`, `m_desc`) VALUES
(1, 'JANUARI'),
(2, 'FEBUARI'),
(3, 'MAC'),
(4, 'APRIL'),
(5, 'MEI'),
(6, 'JUN'),
(7, 'JULAI'),
(8, 'OGOS'),
(9, 'SEPTEMBER'),
(10, 'OKTOBER'),
(11, 'NOVEMBER'),
(12, 'DISEMBER');

-- --------------------------------------------------------

--
-- Table structure for table `part_letter_order`
--

CREATE TABLE IF NOT EXISTS `part_letter_order` (
  `plo_id` int(10) NOT NULL AUTO_INCREMENT,
  `lo_id` int(10) NOT NULL,
  `plo_name` varchar(200) NOT NULL,
  `plo_partno` varchar(200) NOT NULL,
  `plo_quantity` int(11) NOT NULL,
  `plo_totalprice` double NOT NULL,
  `plo_datetime` datetime NOT NULL,
  PRIMARY KEY (`plo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `part_letter_order`
--

INSERT INTO `part_letter_order` (`plo_id`, `lo_id`, `plo_name`, `plo_partno`, `plo_quantity`, `plo_totalprice`, `plo_datetime`) VALUES
(5, 4, 'ff', 'ff', 55, 55, '2013-08-28 20:25:55'),
(6, 5, 'gg', 'g1', 23, 23, '2013-08-28 20:26:22'),
(7, 6, 'rr', 'rr', 123, 123, '2013-08-28 20:26:47'),
(8, 7, 'hhh7', 'h7', 700, 70, '2013-08-29 15:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `perolehan`
--

CREATE TABLE IF NOT EXISTS `perolehan` (
  `pe_id` int(11) NOT NULL AUTO_INCREMENT,
  `pe_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`pe_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `perolehan`
--

INSERT INTO `perolehan` (`pe_id`, `pe_desc`) VALUES
(1, 'DIRECT'),
(2, 'SEBUT HARGA');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `r_id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `r_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`r_id`, `r_desc`) VALUES
(1, 'Jurutera'),
(2, 'Juruteknik'),
(3, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `ser_id` int(11) NOT NULL AUTO_INCREMENT,
  `ser_desc` varchar(2000) NOT NULL,
  `ser_totalprice` double NOT NULL,
  `lo_id` int(11) NOT NULL,
  PRIMARY KEY (`ser_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ser_id`, `ser_desc`, `ser_totalprice`, `lo_id`) VALUES
(3, 'sdsd', 23, 5),
(4, 'sss', 123, 6),
(5, '80', 8, 7);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `s_id` int(10) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(200) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`s_id`, `s_name`) VALUES
(1, 'ALOR GAJAH'),
(2, 'JASIN'),
(3, 'MELAKA TENGAH'),
(4, 'ELEKTRIK'),
(5, 'BANGUNAN'),
(6, 'ARKITEK'),
(7, 'JALAN'),
(8, 'UKUR BAHAN'),
(9, 'IBU PEJABAT'),
(10, 'KORPORAT'),
(11, 'TENTERA');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_fullname` varchar(200) NOT NULL,
  `u_staffno` varchar(200) NOT NULL,
  `u_ic` varchar(200) NOT NULL,
  `u_phone` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_password` varchar(200) NOT NULL,
  `r_id` tinyint(1) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_fullname`, `u_staffno`, `u_ic`, `u_phone`, `u_email`, `u_password`, `r_id`) VALUES
(1, 'Bilal Bayasut', 'S002', '2', '013412321', 'zamboza@gmail.com', '2', 2),
(2, 'Umar Mukhtar', 'S001', '1', '0199737579', 'kidzeclipes@yahoo.com', '1', 1),
(3, 'Administrator', 'Admin001', '3', '', 'kidzeclipes@yahoo.com', '3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE IF NOT EXISTS `vehicles` (
  `v_id` int(10) NOT NULL AUTO_INCREMENT,
  `v_image` varchar(2000) NOT NULL,
  `v_noloji` varchar(200) NOT NULL,
  `v_registrationno` varchar(200) NOT NULL,
  `v_jkrno` varchar(200) NOT NULL,
  `v_ownername` varchar(200) NOT NULL,
  `v_group` varchar(200) NOT NULL,
  `v_maker` varchar(200) NOT NULL,
  `v_model` varchar(200) NOT NULL,
  `v_price` double NOT NULL,
  `v_yearmade` varchar(200) NOT NULL,
  `v_location` varchar(200) NOT NULL,
  `v_fileno` varchar(200) NOT NULL,
  `v_category` varchar(200) NOT NULL,
  `vs_id` int(11) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=207 ;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`v_id`, `v_image`, `v_noloji`, `v_registrationno`, `v_jkrno`, `v_ownername`, `v_group`, `v_maker`, `v_model`, `v_price`, `v_yearmade`, `v_location`, `v_fileno`, `v_category`, `vs_id`) VALUES
(1, '', '', 'CTD 14221', 'CTD14221', 'Negeri', 'Dozer', 'KOMATSU', 'D65A-6', 133800, '1980', 'JALAN', '', 'Loji', 1),
(2, '', '', 'MS 7457', 'PTR16799', 'Negeri', 'Roller', 'SAKAI ', 'TS150', 82406, '1986', 'JALAN ', '', 'Loji', 1),
(3, '', '12209', 'MAE 8361', 'TVR19024', 'Negeri', 'Roller', 'DYNAPAC', 'CC211', 138800, '1995', 'JALAN ', '', 'Loji', 1),
(4, '', '11996', 'MT 8012', 'VR17036', 'Negeri', 'Roller', 'INGERSOLL ', 'SD100', 106899, '1988', 'JALAN ', '', 'Loji', 1),
(5, '', '11994', 'MAV 9574', '-', 'Negeri', 'Roller', 'DYNAPAC ', 'CA152', 180000, '2002', 'M/TENGAH', '', 'Loji', 1),
(6, '', '13247', 'LP 6500', '-', 'Negeri', 'Roller', 'DYNAPAC ', 'LP 6500', 47000, '2003', 'M/TENGAH', '', 'Loji', 1),
(7, '', '13336', 'MT 3153', 'VR16946', 'Negeri', 'Roller', 'DYNAPAC ', 'CA15', 87539, '1987', 'ALOR GAJAH', '', 'Loji', 1),
(8, '', '13362', '-', '-', 'Negeri', 'Roller', 'DYNAPAC ', 'LP 6500', 47000, '2003', 'ALOR GAJAH', '', 'Loji', 1),
(9, '', '13972', 'MS 7610', 'VR16820', 'Negeri', 'Roller', 'BOMAG ', 'BW172', 92818, '1986', 'JASIN ', '', 'Loji', 1),
(10, '', '13973', 'MBC 4331', '-', 'Negeri', 'Roller', 'DYNAPAC ', 'CA152', 180000, '2004', 'JASIN ', '', 'Loji', 1),
(11, '', '13997', '-', '-', 'Negeri', 'Roller', 'DYNAPAC', 'LP 6500', 47000, '2003', 'JASIN ', '', 'Loji', 1),
(12, '', '14036', 'MAW 1191', '-', 'Negeri', 'Backhoe', 'CASE', '580SUPER ', 173000, '2002', 'M/TENGAH', '', 'Loji', 1),
(13, '', '13909', 'MBS 4921', '-', 'Negeri', 'Backhoe', 'CASE', '580SUPER ', 175000, '2008', 'M/TENGAH', '', 'Loji', 1),
(14, '', '13935', 'MAC 7183', 'BHL18951', 'Negeri', 'Backhoe', 'JOHN DEERE', '310D', 97734, '1994', 'ALOR GAJAH', '', 'Loji', 1),
(15, '', '14662', 'MU 8345', 'BHL17203', 'Negeri', 'Backhoe', 'CATERPILLER', '3D', 81500, '1989', 'ALOR GAJAH', '', 'Loji', 1),
(16, '', '15056', 'MBS 4740', '-', 'Negeri', 'Backhoe', 'CASE', '580SUPER ', 175000, '2008', 'ALOR GAJAH', '', 'Loji', 1),
(17, '', '15061', 'MU 8344', 'BHL17202', 'Negeri', 'Backhoe', 'JCB', '3D', 81500, '1989', 'JASIN', '', 'Loji', 1),
(18, '', '15062', 'MBS 4741', '-', 'Negeri', 'Backhoe', 'CASE', '580SUPER ', 175000, '2008', 'JASIN', '', 'Loji', 1),
(19, '', '15066', 'MAE 8360', 'RF19023', 'Negeri', 'Paver', 'DYNAPAC ', 'F12W', 428000, '1995', 'JALAN', '', 'Loji', 1),
(20, '', '15068', 'MAY 3341', '-', 'Negeri', 'Shovel', 'KOMATSU', 'WA180-3A', 289500, '2003', 'JALAN', '', 'Loji', 1),
(21, '', '15069', 'MM 399', 'RTS14801', 'Negeri', 'Shovel', 'KOMATSU', 'W70', 79880, '1981', 'JASIN', '', 'Loji', 1),
(22, '', '15070', '-', '-', 'Negeri', 'Forklift', 'TOYOTA', '-', 0, '1990', 'MEKANIKAL', 'Loji', '1', 0),
(23, '', '15072', '-', '-', 'Negeri', 'Forklift', 'TOYOTA', '62 - 8FD15', 56000, '2007', 'STOR NEGERI', '', 'Loji', 1),
(24, '', '15077', 'MBV 7985', '-', 'Negeri', 'Skylif', 'Hicom', 'MTB-170', 282000, '2010', 'MEKANIKAL', '', 'Berat', 1),
(25, '', '1448', 'MAU 1267', '-', 'Negeri', 'Tipper', 'ISUZU', 'FTR33P', 141000, '2002', 'JALAN', '', 'Berat', 1),
(26, '', '16123', 'MAY 3109', '-', 'Negeri', 'Tipper', 'MITSUBISHI', 'FT658JRDG1', 148000, '2003', 'JALAN', '', 'Berat', 1),
(27, '', '', 'MBC 7923', '-', 'Negeri', 'Tipper', 'ISUZU TIPPER', 'FTR33K', 149800, '2004', 'JALAN', '', 'Berat', 1),
(28, '', '17633', 'MAU 1265', '-', 'Negeri', 'Tipper', 'LORI ISUZU', 'FTR33P', 141000, '2002', 'M/TENGAH', '', 'Berat', 1),
(29, '', '196695', 'MAY 3107', '-', 'Negeri', 'Tipper', 'MITSUBISHI ', 'FT658JRDG1', 148000, '2003', 'M/TENGAH', '', 'Berat', 1),
(30, '', '16274', 'MBC 7932', '-', 'Negeri', 'Tipper', 'ISUZU ', 'FTR33K', 149800, '2004', 'M/TENGAH', '', 'Berat', 1),
(31, '', '16178', 'MBK 392', 'LD19818', 'Negeri', 'Tipper', 'ISUZU', 'MTB145', 66500, '2006', 'M/TENGAH', '', 'Berat', 1),
(32, '', '16179', 'MAU 1264', '-', 'Negeri', 'Tipper', 'ISUZU ', 'FTR33P', 141000, '2002', 'JASIN', '', 'Berat', 1),
(33, '', '16192', 'MAY 3114', '-', 'Negeri', 'Tipper', 'MITSUBISHI', 'FM658JRDG1', 148000, '2003', 'JASIN', '', 'Berat', 1),
(34, '', '', 'MBC 7926', '-', 'Negeri', 'Tipper', 'ISUZU', 'FTR33K', 149800, '2004', 'JASIN', '', 'Berat', 1),
(35, '', '', 'MBK 386', 'LD19819', 'Negeri', 'Tipper', 'ISUZU ', 'MTB145', 66500, '2006', 'JASIN', '', 'Berat', 1),
(36, '', '', 'MBV 618', '', 'Negeri', 'Tipper', 'ISUZU', '', 100000, '2009', 'JASIN', '', 'Berat', 1),
(37, '', '', 'MBK 394', 'LD19817', 'Negeri', 'Tipper', 'ISUZU ', 'MTB145', 66500, '2006', 'ALOR GAJAH', '', 'Berat', 1),
(38, '', '', 'MAU 1268', '-', 'Negeri', 'Tipper', 'ISUZU', 'FTR33P', 141000, '2002', 'ALOR GAJAH', '', 'Berat', 1),
(39, '', '16620', 'MAY 3058', '-', 'Negeri', 'Tipper', 'MITSUBISHI', 'FM658JRDG1', 148000, '2003', 'ALOR GAJAH', '', 'Berat', 1),
(40, '', '', 'MBC 7930', '-', 'Negeri', 'Tipper', 'ISUZU', 'FTR33K', 149800, '2004', 'ALOR GAJAH', '', 'Berat', 1),
(41, '', '', 'MCC 9684', '-', 'Negeri', 'Tipper', 'ISUZU', 'NPR66ULH', 105500, '2011', 'ALOR GAJAH', '', 'Berat', 1),
(42, '', '', 'MCC 9685', '-', 'Negeri', 'Tipper', 'ISUZU', 'NPR66ULH', 105500, '2011', 'M/TENGAH', '', 'Berat', 1),
(43, '', '', 'MAA 5584', 'RTA18389', 'Negeri', 'Tractor', 'FIAT', '55.65', 35500, '1993', 'M/TENGAH', '', 'Berat', 1),
(44, '', '', 'MS 3789', 'RTA16506', 'Negeri', 'Tractor', 'FIAT ', '666', 29870, '1986', 'JALAN', '', 'Berat', 1),
(45, '', '-', 'MAW 612', '-', 'Negeri', 'lori tangki', 'HICOM ', 'MTB150 DX', 98800, '2002', 'JALAN', '', 'Berat', 1),
(46, '', '17908', 'MAY 1786', '-', 'Negeri', 'Lori tangki', 'HICOM ', 'MTB150 DX', 92000, '2003', 'JALAN', '', 'Berat', 1),
(47, '', '17909', 'MCD 1334', '-', 'Negeri', 'Lori tangki', 'HINO', 'WU410R ', 110000, '2011', 'M/TENGAH', '', 'Berat', 1),
(48, '', '17520', 'ML 3243', 'LD14517', 'Negeri', 'Flat bottom', 'MITSUBISHI ', 'FK102H', 33221.6, '1981', 'M/TENGAH', '', 'Berat', 1),
(49, '', '17527', 'MS 6382', 'LD16638', 'Negeri', 'Flat bottom', 'ISUZU', 'FSR113', 31256.18, '1986', 'ALOR GAJAH', '', 'Berat', 1),
(50, '', '17528', 'MAC 5574', 'LD18690', 'Negeri', 'Flat bottom', 'ISUZU', 'FSR11H', 92800, '1994', 'M/TENGAH', '', 'Berat', 1),
(51, '', '17529', 'MAT 675', '-', 'Negeri', 'Load Carrier', 'HICOM ', 'MTB140', 56846.92, '2001', 'MEKANIKAL', '', 'Ringan', 1),
(52, '', '17586', 'MBF 9506', 'LD19815', 'Negeri', 'Load Carrier', 'HICOM ', 'MTB140', 79839.96, '2005', 'MEKANIKAL', '', 'Ringan', 1),
(53, '', '17603', 'MAJ 6743', 'LD19239', 'Negeri', 'Load Carrier', 'ISUZU', 'NKR58L', 50591.37, '1997', 'JALAN', '', 'Ringan', 1),
(54, '', '17481', 'MAT 682', '-', 'Negeri', 'Load Carrier', 'HICOM ', 'MTB140', 56846.92, '2001', 'JALAN', '', 'Ringan', 1),
(55, '', '17711', 'MAY 391', '-', 'Negeri', 'Load Carrier', 'HICOM ', 'MTB150DX', 92850, '2003', 'JALAN', '', 'Ringan', 1),
(56, '', '17717', 'MT 5082', 'UVD16973', 'Negeri', 'Load Carrier', 'ISUZU', 'NKR575', 26882.91, '1988', 'M/TENGAH', '', 'Ringan', 1),
(57, '', '17869', 'MAB 9652', 'LD18671', 'Negeri', 'Load Carrier', 'ISUZU', 'NKR58LP', 31685, '1993', 'M/TENGAH', '', 'Ringan', 1),
(58, '', '18704', 'MAB 9654', 'LD18672', 'Negeri', 'Load Carrier', 'ISUZU', 'NPR59P', 38936.51, '1993', 'M/TENGAH', '', 'Ringan', 1),
(59, '', '17542', 'MBV 632', '', 'Negeri', 'Load Carrier', 'ISUZU', 'MTB 140', 95000, '2009', 'M/TENGAH', '', 'Ringan', 1),
(60, '', '17543', 'MAT 681', '-', 'Negeri', 'Load Carrier', 'HICOM ', 'MTB140', 56846.92, '2001', 'M/TENGAH', '', 'Ringan', 1),
(61, '', '', 'MBC 1466', '-', 'Negeri', 'Load Carrier', 'HICOM ', 'MTB170', 99800, '2004', 'M/TENGAH', '', 'Ringan', 1),
(62, '', '', 'MAY 392', '-', 'Negeri', 'Load Carrier', 'HICOM ', 'MTB150 DX', 92850, '2003', 'M/TENGAH', '', 'Ringan', 1),
(63, '', '18203', 'MBG 310', 'LD19816', 'Negeri', 'Load Carrier', 'HICOM ', 'MTB150 DX', 109284.7, '2005', 'M/TENGAH', '', 'Ringan', 1),
(64, '', '', 'MAF 1720', 'LD19019', 'Negeri', 'Load Carrier', 'ISUZU', 'NKR58L', 52191.37, '1995', 'ALOR GAJAH', '', 'Ringan', 1),
(65, '', '18252', 'MBV 599', '', 'Negeri', 'Load Carrier', 'ISUZU', 'MTB 140', 95000, '2009', 'ALOR GAJAH', '', 'Ringan', 1),
(66, '', '18083', 'MAJ 6741', 'LD19238', 'Negeri', 'Load Carrier', 'HICOM ', 'NKR58L', 50591.37, '1997', 'ALOR GAJAH', '', 'Ringan', 1),
(67, '', '21057', 'MAT 674', '-', 'Negeri', 'Load Carrier', 'HICOM ', 'MTB140', 56846.92, '2001', 'ALOR GAJAH', '', 'Ringan', 1),
(68, '', '18363', 'MAX 8927', '-', 'Negeri', 'Load Carrier', 'HICOM ', 'MTB150 DX', 92850, '2003', 'ALOR GAJAH', '', 'Ringan', 1),
(69, '', '', 'MBK 387', 'LD19813', 'Negeri', 'Load Carrier', 'HICOM ', 'MTB 150', 99400, '2006', 'ALOR GAJAH', '', 'Ringan', 1),
(70, '', '', 'MAJ 6744', 'LD19240', 'Negeri', 'Load Carrier', 'ISUZU', 'NKR58L', 50591.37, '1997', 'JASIN', '', 'Ringan', 1),
(71, '', '', 'MBV 627', '', 'Negeri', 'Load Carrier', 'ISUZU', 'MTB 140', 95000, '2009', 'JASIN', '', 'Ringan', 1),
(72, '', '', 'MAT 677', '-', 'Negeri', 'Load Carrier', 'HICOM ', 'MTB140', 56846.92, '2001', 'JASIN', '', 'Ringan', 1),
(73, '', '', 'MAT 683', '-', 'Negeri', 'Load Carrier', 'HICOM ', 'MTB140', 56846.92, '2001', 'JASIN', '', 'Ringan', 1),
(74, '', '', 'MAY 396', '-', 'Negeri', 'Load Carrier', 'HICOM ', 'MTB150 DX', 92850, '2003', 'JASIN', '', 'Ringan', 1),
(75, '', '', 'MBC 1478', '-', 'Negeri', 'Load Carrier', 'HICOM ', 'MTB170UV', 99800, '2004', 'JASIN', '', 'Ringan', 1),
(76, '', '18914', 'MBK 390', 'LD19814', 'Negeri', 'Load Carrier', 'HICOM ', 'MTB150', 99400, '2006', 'JASIN', '', 'Ringan', 1),
(77, '', '19029', 'MR 8364', 'UVD16281', 'Negeri', '4WD', 'LAND ROVER', '110 DIESEL', 29568, '1985', 'MEKANIKAL ', '', 'Ringan', 1),
(78, '', '19082', 'MR 8353', 'UVD16280', 'Negeri', '4WD', 'ISUZU ', 'Trooper', 22130, '1985', 'MEKANIKAL ', '', 'Ringan', 1),
(79, '', '19083', 'MAV 7886', '-', 'Negeri', '4WD', 'ISUZU ', 'Rodeo', 72298.88, '2002', 'MEKANIKAL ', '', 'Ringan', 1),
(80, '', '19084', 'MAT 6740', '-', 'Negeri', '4WD', 'MITSUBISHI ', 'Pajero', 86976, '2001', 'JALAN ', '', 'Ringan', 1),
(81, '', '19290', 'DT 8838', 'UVD18685', 'Negeri', '4WD', 'MITSUBISHI ', 'Pajero', 83985.52, '1993', 'JALAN ', '', 'Ringan', 1),
(82, '', '-', 'MBS 656', '-', 'Negeri', '4WD', 'ISUZU ', 'D''max', 110000, '2008', 'JALAN', '', 'Ringan', 1),
(83, '', '19340', 'MBS 676', '-', 'Negeri', '4WD', 'ISUZU ', 'D''max', 110000, '2008', 'JALAN', '', 'Ringan', 1),
(84, '', '', 'MAV 572', '-', 'Negeri', '4WD', 'MITSUBISHI ', 'Pajero', 86976, '2002', 'JALAN ', '', 'Ringan', 1),
(85, '', '19402', 'MAB 1400', 'UVD18497', 'Negeri', '4WD', 'MITSUBISHI ', 'Pajero', 38658.23, '1993', 'M/TENGAH ', '', 'Ringan', 1),
(86, '', '19396', 'MAV 574', '-', 'Negeri', '4WD', 'MITSUBISHI ', 'Pajero', 86976, '2002', 'M/TENGAH ', '', 'Ringan', 1),
(87, '', '', 'MBF 8229', '-', 'Negeri', '4WD', 'ISUZU ', 'D''max', 66550, '2005', 'M/TENGAH ', '', 'Ringan', 1),
(88, '', '', 'MBS 606', '-', 'Negeri', '4WD', 'FORD ', 'Everest', 110000, '2008', 'M/TENGAH ', '', 'Ringan', 1),
(89, '', '19718', 'MAB 1402', 'UVD18498', 'Negeri', '4WD', 'MITSUBISHI ', 'Pajero', 38658.23, '1993', 'JASIN', '', 'Ringan', 1),
(90, '', '19622', 'MAT 6739', '-', 'Negeri', '4WD', 'MITSUBISHI ', 'Pajero', 86976, '2001', 'JASIN', '', 'Ringan', 1),
(91, '', '19621', 'MBF 8221', '-', 'Negeri', '4WD', 'ISUZU ', 'D''max', 66550, '2005', 'JASIN', '', 'Ringan', 1),
(92, '', '19628', 'MBS 696', '-', 'Negeri', '4WD', 'ISUZU ', 'D''max', 110000, '2008', 'JASIN', '', 'Ringan', 1),
(93, '', '19623', 'MAT 6741', '-', 'Negeri', '4WD', 'MITSUBISHI ', 'Pajero', 86976, '2001', 'ALOR GAJAH', '', 'Ringan', 1),
(94, '', '19691', 'MBF 8216', 'UVD19810', 'Negeri', '4WD', 'ISUZU ', 'D''max', 66550, '2005', 'ALOR GAJAH', '', 'Ringan', 1),
(95, '', '19781', 'MS 5721', 'UVD16567', 'Negeri', '4WD', 'ISUZU ', 'Trooper', 25695.94, '1986', 'ALOR GAJAH', '', 'Ringan', 1),
(96, '', '19782', 'MS 5722', 'UVD16568', 'Negeri', '4WD', 'ISUZU ', 'Trooper', 25695.94, '1986', 'ALOR GAJAH', '', 'Ringan', 1),
(97, '', '', 'MBS 626', '-', 'Negeri', '4WD', 'FORD ', 'Everest', 110000, '2008', 'ALOR GAJAH', '', 'Ringan', 1),
(98, '', '19808', 'MBJ 6181', 'UVD19809', 'Negeri', 'Van ', 'KIA', 'Pregio', 63640, '2006', 'JALAN ', '', 'Ringan', 1),
(99, '', '', 'MAT 469', '-', 'Negeri', 'Saloon', 'PROTON ', 'Wira', 40139.26, '2001', 'MEKANIKAL ', '', 'Ringan', 1),
(100, '', '19842', 'MAV 5570', '-', 'Negeri', 'Saloon', 'PROTON ', 'Wira', 41091.76, '2002', 'JALAN ', '', 'Ringan', 1),
(101, '', '19866', 'MAJ 600', '-', 'Negeri', '4WD', 'HONDA CRV', '2.0L I-VTEC ', 106000, '2010', 'IBU PEJABAT', '', 'Ringan', 1),
(102, '', '19857', 'MBY 6600', 'SC19241', 'Negeri', 'Saloon', 'VOLVO', '940GL (A)', 91503.71, '1997', 'IBU PEJABAT', '', 'Ringan', 1),
(103, '', '19851', 'MAP 600', '-', 'Negeri', 'Saloon', 'PROTON ', 'PERDANA V6', 69552.59, '1999', 'IBU PEJABAT', '', 'Ringan', 1),
(104, '', '', 'MAT 470', '-', 'Negeri', 'Saloon', 'PROTON ', 'Wira', 40139.26, '2001', 'IBU PEJABAT', '', 'Ringan', 1),
(105, '', '20398', 'MBH 6205', 'UVD19808', 'Negeri', 'Van ', 'KIA', 'Pregio', 62083.2, '2005', 'IBU PEJABAT', '', 'Ringan', 1),
(106, '', '', 'MBF 8765', 'SC19820', 'Negeri', 'Saloon', 'PROTON ', 'Wira', 38186.87, '2005', 'IBU PEJABAT', '', 'Ringan', 1),
(107, '', '20350', 'MBF 8769', 'SC19821', 'Negeri', 'Saloon', 'PROTON ', 'Wira', 38186.87, '2005', 'IBU PEJABAT', '', 'Ringan', 1),
(108, '', '-', 'MCC 5853', '-', 'Negeri', '4WD', 'NISSAN', 'X-Trail', 94000, '2011', 'CAW BANGUNAN', '', 'Ringan', 1),
(109, '', '', 'MAX 240', '-', 'Negeri', '4WD', 'MITSUBISHI ', 'Pajero', 86976, '2003', 'CAW ARKITEK', '', 'Ringan', 1),
(110, '', '', 'MAF 6099', 'UVD19025', 'Negeri', '4WD', 'MITSUBISHI ', 'Pajero', 43876.31, '1996', 'CAW ARKITEK', '', 'Ringan', 1),
(111, '', '', 'MAA 4827', 'LD18367', 'Negeri', 'Flat bottom', 'ISUZU', 'FSR11H', 0, '1992', 'STOR NEGERI', '', 'Ringan', 1),
(112, '', '', 'MAX 8751', '-', 'Negeri', 'Load Carrier', 'HICOM', 'MTB150DX', 92000, '2003', 'STOR NEGERI', '', 'Ringan', 1),
(113, '', '20352', 'MS 5720', 'UVD16566', 'Negeri', '4WD', 'ISUZU', 'Trooper', 25695.94, '1986', 'CAW MAKMAL', '', 'Ringan', 1),
(114, '', '', 'MAV 7892', '-', 'Negeri', '4WD', 'ISUZU ', 'Rodeo', 79498.88, '2002', 'CAW MAKMAL', '', 'Ringan', 1),
(115, '', '20246', 'MAV 573', '-', 'Negeri', '4WD', 'MITSUBISHI ', 'Pajero', 86976, '2002', 'CAW UKUR BAHAN', '', 'Ringan', 1),
(116, '', '20219', 'MX 5645', '-', 'Negeri', '4WD', 'MITSUBISHI ', 'Pajero', 0, '1991', 'CAW ELEKTRIK', '', 'Ringan', 1),
(117, '', '20228', 'MY 3324', '-', 'Negeri', '4WD', 'LAND ROVER', '110 DIESEL', 0, '1992', 'CAW ELEKTRIK', '', 'Ringan', 1),
(118, '', '20325', 'MAK 7220', 'UVD19255', 'Negeri', 'Load Carrier', 'ISUZU', 'TFR54', 0, '1997', 'CAW ELEKTRIK', '', 'Ringan', 1),
(119, '', '20289', 'MBL 2994', '-', 'Negeri', 'Load Carrier', 'HICOM', 'MTB 140', 84250, '2007', 'CAW ELEKTRIK', '', 'Ringan', 1),
(120, '', '20233', 'WDT 4317', 'DR18949', 'Persekutuan', 'Roller', 'BARFORD ', 'DC12', 98000, '1995', 'JALAN ', '', 'Loji', 1),
(121, '', '20291', 'WDT 4307', 'DR18944', 'Persekutuan', 'Roller', 'BARFORD ', 'DC12', 98000, '1995', 'ALOR GAJAH', '', 'Loji', 1),
(122, '', '20234', 'WAD 1952', 'VR15977', 'Persekutuan', 'Roller', 'DYNAPAC ', 'CA15', 50000, '1984', 'JASIN ', '', 'Loji', 1),
(123, '', '20270', 'WBY 3723 ', 'SPVC17348', 'Persekutuan', 'Roller', 'HAMM ', '2310SD', 80455, '1990', 'JASIN ', '', 'Loji', 1),
(124, '', '20235', 'BAC 4188', 'DR 9237', 'Persekutuan', 'Roller', 'WATANABE ', 'WN81', 25500, '1971', 'JASIN ', '', 'Loji', 1),
(125, '', '20317', 'WV 4183', 'VR13879', 'Persekutuan', 'Roller', 'DYNAPAC ', 'CA15', 51973, '1980', 'JASIN ', '', 'Loji', 1),
(126, '', '', 'WEM 1902', 'MG19081', 'Persekutuan', 'Grader', 'CHAMPION', '710', 199920, '1996', 'JALAN', '', 'Loji', 1),
(127, '', '', 'WAA 2662', 'MG15135', 'Persekutuan', 'Grader', 'KOMATSU', 'GD500R2', 81000, '1982', 'JALAN', '', 'Loji', 1),
(128, '', '', 'WV 193', 'MG13864', 'Persekutuan', 'Grader', 'KOMATSU', 'GD500R1', 85800, '1980', 'JALAN', '', 'Loji', 1),
(129, '', '', 'WAA 2626', 'MG15134', 'Persekutuan', 'Grader', 'KOMATSU', 'GD500R2', 81000, '1982', 'M/TENGAH', '', 'Loji', 1),
(130, '', '18893', 'WL 3396', 'MG12185', 'Persekutuan', 'Grader', 'KOMATSU', 'GD376H', 71900, '1977', 'ALOR GAJAH', '', 'Loji', 1),
(131, '', '20472', 'WCC 4392', 'MG17456', 'Persekutuan', 'Grader', 'BARFORD ', 'TG12', 130392, '1990', 'ALOR GAJAH', '', 'Loji', 1),
(132, '', '20512', 'WL 3397', 'MG12186', 'Persekutuan', 'Grader', 'KOMATSU', 'GD376H', 71900, '1977', 'JASIN', '', 'Loji', 1),
(133, '', '20502', 'WCC 4389', 'MG17455', 'Persekutuan', 'Grader', 'BARFORD ', 'TG12', 130392, '1990', 'JASIN', '', 'Loji', 1),
(134, '', '20475', 'WEM 1897', 'MG19082', 'Persekutuan', 'Grader', 'CHAMPION', '710', 199920, '1996', 'JASIN', '', 'Loji', 1),
(135, '', '', 'WAF 6363', 'BHL15108', 'Persekutuan', 'Backhoe', 'CASE', '580F', 57061, '1982', 'JALAN', '', 'Loji', 1),
(136, '', '20501', 'WBN 7151', 'BHL16902', 'Persekutuan', 'Backhoe', 'CASE', '580G', 67508, '1988', 'JALAN', '', 'Loji', 1),
(137, '', '20463', 'WDQ 4744', 'BHL18846', 'Persekutuan', 'Backhoe', 'CATERPILLER', '416B', 70666, '1994', 'JALAN', '', 'Loji', 1),
(138, '', '20439', 'WBX 4695', 'BHL17306', 'Persekutuan', 'Backhoe', 'JOHN DEERE', '310C', 69638.75, '1990', 'M/TENGAH', '', 'Loji', 1),
(139, '', '20419', 'WDR 8317', 'BHL18860', 'Persekutuan', 'Backhoe', 'CATERPILLER', '416B', 70666, '1994', 'M/TENGAH', '', 'Loji', 1),
(140, '', '', 'WBY 1208', 'BHL17328', 'Persekutuan', 'Backhoe', 'JOHN DEERE', '310C', 69638.75, '1990', 'ALOR GAJAH', '', 'Loji', 1),
(141, '', '20432', 'WBK 2046', 'BHL16787', 'Persekutuan', 'Backhoe', 'CASE', '580G', 58454, '1986', 'JASIN', '', 'Loji', 1),
(142, '', '20433', 'WDS 8345', 'BHL18912', 'Persekutuan', 'Backhoe', 'CATERPILLER', '416B', 70666, '1994', 'JASIN', '', 'Loji', 1),
(143, '', '20583', 'WU 5693', 'RTS13711', 'Persekutuan', 'Shovel', 'KOMATSU', 'W70', 69880, '1980', 'JALAN', '', 'Loji', 1),
(144, '', '20614', 'WER 8949', 'RTS19104', 'Persekutuan', 'Shovel', 'KOMATSU', 'WA180-3A', 160090, '1996', 'M/TENGAH', '', 'Loji', 1),
(145, '', '20538', 'BAX 4884', 'RTS12332', 'Persekutuan', 'Shovel', 'KIMCO', 'JH60B', 71225, '1977', 'ALOR GAJAH', '', 'Loji', 1),
(146, '', '20552', 'WBV 7127', 'RTS17236', 'Persekutuan', 'Shovel', 'KOMATSU', 'WA180', 102385, '1990', 'ALOR GAJAH', '', 'Loji', 1),
(147, '', '20579', 'WU 5694', 'RTS13712', 'Persekutuan', 'Shovel', 'KOMATSU', 'W70', 69880, '1980', 'JASIN', '', 'Loji', 1),
(148, '', '20564', 'WBV 7129', 'RTS17235', 'Persekutuan', 'Shovel', 'KOMATSU', 'WA180', 102385, '1990', 'JASIN', '', 'Loji', 1),
(149, '', '20566', 'WDD 2098', 'LD18563', 'Persekutuan', 'Tipper', 'MITSUBISHI ', 'FM515-H', 91553, '1993', 'M/TENGAH', '', 'Berat', 1),
(150, '', '20573', 'WDD 5251', 'LD18585', 'Persekutuan', 'Tipper', 'MITSUBISHI ', 'FM515-H', 91553, '1993', 'M/TENGAH', '', 'Berat', 1),
(151, '', '20600', 'WCM 7742', 'LD17923', 'Persekutuan', 'Tipper', 'HINO EXT-CAB', 'FF173K', 87328, '1991', 'M/TENGAH', '', 'Berat', 1),
(152, '', '20588', 'WCM 7458', 'LD17916', 'Persekutuan', 'Tipper', 'HINO EXT-CAB', 'FF173K', 87328, '1991', 'M/TENGAH', '', 'Berat', 1),
(153, '', '20605', 'WDB 8032', 'LD18415', 'Persekutuan', 'Tipper', 'MITSUBISHI ', 'FM515H', 91553, '1993', 'JASIN', '', 'Berat', 1),
(154, '', '20596', 'WDD 2090', 'LD18562', 'Persekutuan', 'Tipper', 'MITSUBISHI ', 'FM515H', 91553, '1993', 'JASIN', '', 'Berat', 1),
(155, '', '20638', 'WCM 7734', 'LD17900', 'Persekutuan', 'Tipper', 'HINO EXT-CAB', 'FF173K', 87328, '1991', 'JASIN', '', 'Berat', 1),
(156, '', '20642', 'WCM 7913', 'LD17885', 'Persekutuan', 'Tipper', 'HINO EXT-CAB', 'FF173K', 87328, '1991', 'JASIN', '', 'Berat', 1),
(157, '', '20654', 'WDA 9685', 'LD18402', 'Persekutuan', 'Tipper', 'MITSUBISHI ', 'FM515H', 91553, '1993', 'ALOR GAJAH', '', 'Berat', 1),
(158, '', '20656', 'WCM 8247', 'LD17909', 'Persekutuan', 'Tipper', 'HINO EXT-CAB', 'FF173K', 87328, '1991', 'ALOR GAJAH', '', 'Berat', 1),
(159, '', '20657', 'WCM 7651', 'LD17832', 'Persekutuan', 'Tipper', 'HINO EXT-CAB', 'FF173K', 87328, '1991', 'ALOR GAJAH', '', 'Berat', 1),
(160, '', '20660', 'WDN 4677', 'RTA18747', 'Persekutuan', 'Tractor', 'FIAT', '55-65', 35500, '1994', 'M/TENGAH', '', 'Berat', 1),
(161, '', '20618', 'WDN 4944', 'RTA18740', 'Persekutuan', 'Tractor', 'FIAT ', '55-65', 35500, '1994', 'ALOR GAJAH', '', 'Berat', 1),
(162, '', '20699', 'WDN 4692', 'RTA18772', 'Persekutuan', 'Tractor', 'FIAT', '55-65', 35500, '1994', 'JASIN ', '', 'Berat', 1),
(163, '', '20700', 'WAK 2351', 'LL15320', 'Persekutuan', 'Low Loader', 'MITSUBISHI', 'FV315HKR', 180807, '1982', 'MEKANIKAL', '', 'Berat', 1),
(164, '', '20716', 'WCC 5733', 'UVD17477', 'Persekutuan', '4WD', 'MITSUBISHI ', 'Pajero', 38658.23, '1990', 'MEKANIKAL ', '', 'Ringan', 1),
(165, '', '', 'WCC 5764', 'UVD17489', 'Persekutuan', '4WD', 'MITSUBISHI ', 'Pajero', 38658.23, '1990', 'MEKANIKAL ', '', 'Ringan', 1),
(166, '', '', 'WCT 1451', 'UVD18025', 'Persekutuan', '4WD', 'LAND ROVER', '110 DIESEL', 60378.44, '1992', 'MEKANIKAL ', '', 'Ringan', 1),
(167, '', '', 'WCT 1454', 'UVD18039', 'Persekutuan', '4WD', 'LAND ROVER', '110 DIESEL', 60378.44, '1992', 'MEKANIKAL ', '', 'Ringan', 1),
(168, '', '21015', 'WJS 2028', 'UVP19430', 'Persekutuan', '4WD', 'ISUZU ', 'Trooper', 125000, '2001', 'MEKANIKAL ', '', 'Ringan', 1),
(169, '', '', 'WTF 3273', 'UVP 20034', 'Persekutuan', '4WD', 'NISSAN ', 'X-Trail', 97500, '2009', 'MEKANIKAL ', '', 'Ringan', 1),
(170, '', '-', 'WCS 9448', 'UVD18102', 'Persekutuan', '4WD', 'MITSUBISHI ', 'Pajero', 38658.23, '1992', 'JALAN ', '', 'Ringan', 1),
(171, '', '21035', 'WCU 3400', 'UVD18133', 'Persekutuan', '4WD', 'MITSUBISHI ', 'Pajero', 38658.23, '1992', 'JALAN ', '', 'Ringan', 1),
(172, '', '-', 'WCS 9309', 'UVD18130', 'Persekutuan', '4WD', 'MITSUBISHI ', 'Pajero', 38658.23, '1992', 'JALAN ', '', 'Ringan', 1),
(173, '', '20762', 'WCV 2420', 'UVD18228', 'Persekutuan', '4WD', 'LAND ROVER', '110 DIESEL', 60378.44, '1992', 'JALAN ', '', 'Ringan', 1),
(174, '', '20760', 'WCU 3599', 'UVD18150', 'Persekutuan', '4WD', 'MITSUBISHI ', 'Pajero', 38658.23, '1992', 'JASIN', '', 'Ringan', 1),
(175, '', '20804', 'WCB 1944', 'UVD17426', 'Persekutuan', '4WD', 'MITSUBISHI ', 'Pajero', 38658.23, '1990', 'ALOR GAJAH', '', 'Ringan', 1),
(176, '', '20802', 'WCV 2415', 'UVD18227', 'Persekutuan', '4WD', 'LAND ROVER', '110 DIESEL', 60378.44, '1992', 'ALOR GAJAH', '', 'Ringan', 1),
(177, '', '20837', 'MU 8090', 'UVD17389', 'Persekutuan', '4WD', 'MITSUBISHI ', 'Pajero', 60171.07, '1989', 'ARKITEK', '', 'Ringan', 1),
(178, '', '20843', 'WBJ 8348', 'LD16701', 'Persekutuan', 'Load Carrier', 'ISUZU', 'NKR575', 21044.09, '1986', 'MEKANIKAL', '', 'Ringan', 1),
(179, '', '20863', 'WCV 5456', 'UVD18276', 'Persekutuan', 'Load Carrier', 'ISUZU', 'TFR5445R', 27185.39, '1992', 'MEKANIKAL', '', 'Ringan', 1),
(180, '', '20862', 'WDC 7425', 'LD18518', 'Persekutuan', 'Load Carrier', 'ISUZU', 'NKR58L', 31685.9, '1993', 'JALAN', '', 'Ringan', 1),
(181, '', '20879', 'WDC 5603', 'LD18467', 'Persekutuan', 'Load Carrier', 'ISUZU', 'NKR58L', 38136.16, '1993', 'M/TENGAH', '', 'Ringan', 1),
(182, '', '20906', 'WDC 5593', 'LD18495', 'Persekutuan', 'Load Carrier', 'ISUZU', 'NKR58L', 38136.16, '1993', 'M/TENGAH', '', 'Ringan', 1),
(183, '', '20908', 'WDC 3317', 'LD18452', 'Persekutuan', 'Load Carrier', 'ISUZU', 'NKR58L', 28136.16, '1993', 'ALOR GAJAH', '', 'Ringan', 1),
(184, '', '20907', 'WDC 5601', 'LD18478', 'Persekutuan', 'Load Carrier', 'ISUZU', 'NKR58L', 38136.16, '1993', 'ALOR GAJAH', '', 'Ringan', 1),
(185, '', '20905', 'WDC 7426', 'LD18520', 'Persekutuan', 'Load Carrier', 'ISUZU', 'NKR58L', 31685.9, '1993', 'JASIN', '', 'Ringan', 1),
(186, '', '20925', 'WDC 7443', 'LD18519', 'Persekutuan', 'Load Carrier', 'ISUZU', 'NKR58L', 38136.16, '1993', 'JASIN', '', 'Ringan', 1),
(187, '', '20927', 'WX 2402', 'RT14115', 'Persekutuan', 'RECOVERY', 'BEDFORD', 'MJR1BCC', 53314, '1980', 'MEKANIKAL', '', 'Ringan', 1),
(188, '', '20947', 'WQN 750', 'UVP 19881', 'Persekutuan', '4WD', 'TOYOTA ', 'Fortuner', 101868.7, '2007', 'PENDIDIKAN', '', 'Ringan', 1),
(189, '', '20961', 'WTF 3359', 'UVP 20035', 'Persekutuan', '4WD', 'NISSAN ', 'X-Trail', 97500, '2009', 'UKUR BAHAN', '', 'Ringan', 1),
(190, '', '20948', 'WTF 3265', 'UVP 20033', 'Persekutuan', '4WD', 'NISSAN ', 'X-Trail', 97500, '2009', 'SENGGARA', '', 'Ringan', 1),
(191, '', '20990', 'WCS 9303', 'UVD18091', 'Persekutuan', '4WD', 'MITSUBISHI ', 'Pajero', 38658.23, '1992', 'ELEKTRIK', '', 'Ringan', 1),
(192, '', '20969', 'WKB 9327', 'UVD19479', 'Persekutuan', '4WD', 'ISUZU ', 'Rodeo', 76048.88, '2002', 'ELEKTRIK', '', 'Ringan', 1),
(193, '', '20949', 'WRL 4003', 'UVD19937', 'Persekutuan', '4WD', 'NISSAN ', 'Frontier', 95000, '2008', 'ELEKTRIK', '', 'Ringan', 1),
(194, '', '20962', 'WCV 5452', 'UVD18251', 'Persekutuan', 'Load Carrier', 'ISUZU', 'TFR54HSR', 27185.39, '1992', 'ELEKTRIK', '', 'Ringan', 1),
(195, '', '', 'WKA 3285', '-', 'Persekutuan', 'Saloon', 'PROTON ', 'Wira', 0, '2002', 'ELEKTRIK', '', 'Ringan', 1),
(196, '', '20970', 'WAL 9914', 'LD15593', 'Persekutuan', 'Load Carrier', 'ISUZU', 'KS32UY', 24680, '1982', 'TENTERA', '', 'Ringan', 1),
(197, '', '', 'WBF 747', 'LD16299', 'Persekutuan', 'Load Carrier', 'TOYOTA', 'WU90RMDDT3', 30356.05, '1985', 'TENTERA', '', 'Ringan', 1),
(198, '', '', 'WBK 318', 'LD16783', 'Persekutuan', 'Load Carrier', 'ISUZU', 'FSR113', 34062, '1986', 'TENTERA', '', 'Ringan', 1),
(199, '', '', 'WBM 2824', 'UVD16942', 'Persekutuan', 'Load Carrier', 'ISUZU', 'KBD26UAF', 17382.67, '1987', 'TENTERA', '', 'Ringan', 1),
(200, '', '', 'WBM 2830', 'UVD16943', 'Persekutuan', 'Load Carrier', 'ISUZU', 'KBD26UAF', 17382.67, '1987', 'TENTERA', '', 'Ringan', 1),
(201, '', '21075', 'WDP 9064', 'UVD18828', 'Persekutuan', 'Load Carrier', 'ISUZU', 'TFR54HSR', 27185.39, '1994', 'TENTERA', '', 'Ringan', 1),
(202, '', '21076', 'WFF 2959', 'UVD19231', 'Persekutuan', 'Load Carrier', 'ISUZU', 'TFR54HSR', 34915.87, '1996', 'TENTERA', '', 'Ringan', 1),
(203, '', '', 'WBP 321', 'UVD17016', 'Persekutuan', '4WD', 'MITSUBISHI ', 'Pajero', 32009.95, '1990', 'TENTERA', '', 'Ringan', 1),
(204, '', '', 'WJQ 8536', 'UVD19434', 'Persekutuan', '4WD', 'MITSUBISHI ', 'Pajero', 86976, '2001', 'TENTERA', '', 'Ringan', 1),
(205, '', '21109', 'WPQ 4184', 'UVD19785', 'Persekutuan', '4WD', 'TOYOTA ', 'Hilux', 79600, '2006', 'TENTERA', '', 'Ringan', 1),
(206, '', '21138', 'WQT 8697', 'UVP19917', 'Persekutuan', '4WD', 'NISSAN ', 'X-Trail', 84000, '2007', 'TENTERA', '', 'Ringan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles_status`
--

CREATE TABLE IF NOT EXISTS `vehicles_status` (
  `vs_id` int(11) NOT NULL AUTO_INCREMENT,
  `vs_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`vs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vehicles_status`
--

INSERT INTO `vehicles_status` (`vs_id`, `vs_desc`) VALUES
(1, 'AKTIF'),
(2, 'TIDAK AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `vot_log`
--

CREATE TABLE IF NOT EXISTS `vot_log` (
  `vl_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_id` int(10) NOT NULL,
  `vl_unit` varchar(200) NOT NULL,
  `lo_id` int(10) NOT NULL,
  `vl_liability` varchar(200) NOT NULL COMMENT 'liabilityofletterorder',
  PRIMARY KEY (`vl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE IF NOT EXISTS `worker` (
  `w_id` int(11) NOT NULL AUTO_INCREMENT,
  `w_name` varchar(200) NOT NULL,
  `bl_id` int(11) NOT NULL,
  PRIMARY KEY (`w_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`w_id`, `w_name`, `bl_id`) VALUES
(1, 'fff', 1),
(2, 'tata', 2),
(3, 'tete', 2);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE IF NOT EXISTS `year` (
  `y_id` int(11) NOT NULL AUTO_INCREMENT,
  `y_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`y_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`y_id`, `y_desc`) VALUES
(1, '2010'),
(2, '2011'),
(3, '2012'),
(4, '2013'),
(5, '2014'),
(6, '2015'),
(7, '2016'),
(8, '2017'),
(9, '2018'),
(10, '2019');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
