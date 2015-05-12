-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2013 at 01:44 AM
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
  `bl_semakdate` datetime NOT NULL,
  `bl_status` int(11) NOT NULL,
  `bl_nodo` varchar(200) NOT NULL,
  `bl_perolehan` varchar(200) NOT NULL,
  `bl_nosebutharga` varchar(200) NOT NULL,
  PRIMARY KEY (`bl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `broken_log`
--

INSERT INTO `broken_log` (`bl_id`, `bl_unit`, `bl_recorddate`, `bl_settledate`, `bl_repairstatus`, `bl_reason`, `bl_harga`, `c_id`, `v_id`, `s_id`, `u_id`, `bl_remarks`, `f_id`, `bl_semakdate`, `bl_status`, `bl_nodo`, `bl_perolehan`, `bl_nosebutharga`) VALUES
(1, 'KR/001/2013', '2013-07-28 07:54:50', '2013-07-27 00:00:00', 1, '', '300.00', 1, 1, 3, 1, 'CABLE CABUT', 4, '2013-07-27 00:00:00', 1, '', '', ''),
(2, 'KR/002/2013', '2013-07-28 07:58:04', '2013-07-27 00:00:00', 2, 'Duit tidak mencukupi.', '400.00', 2, 2, 2, 1, 'Rosak teruk.', 2, '2013-07-27 00:00:00', 1, '', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contractor`
--

INSERT INTO `contractor` (`c_id`, `c_name`, `c_personincharge`, `c_phoneno`, `c_address`, `c_postcode`, `c_negeri`) VALUES
(1, 'DAYA WAWASAN AUTOMOTIVE', 'MAMAT', '', 'N/TO 1-14 JLN TTC 1 TMN TEKN CHENG', '75250', 'MELAKA'),
(2, 'AUTO CONNEXION, SIME DARBY AUTO CONNEXION SDN BHD', 'MINAH', '', 'NO 616, BATU 3 ¾, JALAN IPOH', '52100', 'KUALA LUMPUR');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`f_id`, `f_code`, `f_desc`, `f_money`) VALUES
(1, 'F28', 'Peruntukan Kerajaan - Perkhidmatan', '100000'),
(2, 'F26', 'Peruntukan Kerajaan - Alat Ganti', '97260'),
(3, 'S28', 'Peruntukan Negeri - Perkhidmatan', '100000'),
(4, 'S26', 'Peruntukan Negeri - Alat Ganti', '99700');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `letter_order`
--

INSERT INTO `letter_order` (`lo_id`, `bl_id`, `u_id`, `lo_expenses`, `lo_createddate`, `lo_approveddate`, `lo_approvedby`) VALUES
(2, 1, 1, '300.00', '2013-07-27 23:37:10', '0000-00-00 00:00:00', 0),
(3, 2, 1, '2740.00', '2013-07-28 00:05:24', '0000-00-00 00:00:00', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `part_letter_order`
--

INSERT INTO `part_letter_order` (`plo_id`, `lo_id`, `plo_name`, `plo_partno`, `plo_quantity`, `plo_totalprice`, `plo_datetime`) VALUES
(3, 2, 'Cable Belt', 'C001', 2, 75, '2013-07-27 23:37:10'),
(4, 3, 'Besi atap.', 'A013', 1, 1400, '2013-07-28 00:05:24'),
(5, 3, 'Tayar Depan', 'T002', 2, 120, '2013-07-28 00:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `r_id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `r_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`r_id`, `r_desc`) VALUES
(1, 'Jurutera'),
(2, 'Juruteknik');

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
(3, 'Baiki cable belt.', 150, 2),
(4, 'Baiki atap kereta', 1000, 3),
(5, 'Baiki tayar depan.', 100, 3);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `s_id` int(10) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(200) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`s_id`, `s_name`) VALUES
(1, 'ALOR GAJAH'),
(2, 'JASIN'),
(3, 'MELAKA TENGAH');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_fullname`, `u_staffno`, `u_ic`, `u_phone`, `u_email`, `u_password`, `r_id`) VALUES
(1, 'Bilal Bayasut', 'S002', '2', '013412321', 'zamboza@gmail.com', 'C81E728D9D4C2F636F067F89CC14862C', 2),
(2, 'Umar Mukhtar', 'S001', '1', '0199737579', 'kidzeclipes@yahoo.com', 'C4CA4238A0B923820DCC509A6F75849B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE IF NOT EXISTS `vehicles` (
  `v_id` int(10) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`v_id`, `v_noloji`, `v_registrationno`, `v_jkrno`, `v_ownername`, `v_group`, `v_maker`, `v_model`, `v_price`, `v_yearmade`, `v_location`, `v_fileno`, `v_category`, `vs_id`) VALUES
(1, '', 'CTD 14221', 'CTD14221', 'Negeri', 'Dozer', 'KOMATSU', 'D65A-6', 133800, '1980', 'JALAN', '', 'Loji', 1),
(2, '', 'MS 7457', 'PTR16799', 'Negeri', 'Roller', 'SAKAI ', 'TS150', 82406, '1986', 'JALAN ', '', 'Loji', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`w_id`, `w_name`, `bl_id`) VALUES
(1, 'UMAR', 1),
(2, 'TUN', 1),
(3, 'FATIN', 2),
(4, 'UMAR MUKHTAR', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
