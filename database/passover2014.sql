-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 09, 2014 at 03:36 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `passover2014`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` int(2) unsigned NOT NULL,
  `action` varchar(30) NOT NULL,
  `member` int(11) NOT NULL,
  `log_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=138 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user`, `action`, `member`, `log_time`) VALUES
(41, 3, 'Add Member', 6, '2014-03-22 16:50:03'),
(42, 3, 'Cancel Confirm', 6, '2014-03-22 16:54:01'),
(43, 3, 'Edit', 6, '2014-03-22 16:54:32'),
(44, 3, 'Save', 6, '2014-03-22 16:54:32'),
(45, 3, 'Edit', 6, '2014-03-22 16:54:46'),
(46, 3, 'Save', 6, '2014-03-22 16:54:46'),
(47, 3, 'Add Member', 7, '2014-03-22 16:58:49'),
(48, 30, 'Add Member', 9, '2014-03-30 19:05:14'),
(49, 28, 'Add Member', 10, '2014-03-30 19:05:26'),
(50, 30, 'Add Member', 11, '2014-03-30 19:05:32'),
(51, 25, 'Add Member', 12, '2014-03-30 19:05:38'),
(52, 24, 'Add Member', 13, '2014-03-30 19:06:06'),
(53, 24, 'Add Member', 14, '2014-03-30 19:06:14'),
(54, 30, 'Cancel Register', 9, '2014-03-30 19:06:15'),
(55, 27, 'Add Member', 15, '2014-03-30 19:06:54'),
(56, 28, 'Add Member', 16, '2014-03-30 19:07:46'),
(57, 31, 'Add Member', 17, '2014-03-30 19:07:51'),
(58, 23, 'Edit', 17, '2014-03-30 19:08:32'),
(59, 23, 'Save', 17, '2014-03-30 19:08:32'),
(60, 25, 'Confirm', 12, '2014-03-30 19:08:41'),
(61, 25, 'Add Member', 18, '2014-03-30 19:12:19'),
(62, 27, 'Add Member', 19, '2014-03-30 19:15:32'),
(63, 28, 'Add Member', 20, '2014-03-30 19:15:48'),
(64, 23, 'Add Member', 21, '2014-03-30 19:17:04'),
(65, 27, 'Add Member', 22, '2014-03-30 19:20:47'),
(66, 23, 'Add Member', 23, '2014-03-30 19:20:59'),
(67, 24, 'Edit', 14, '2014-03-30 19:21:16'),
(68, 24, 'Register', 14, '2014-03-30 19:21:16'),
(69, 25, 'Add Member', 24, '2014-03-30 19:21:29'),
(70, 30, 'Confirm', 11, '2014-03-30 19:21:30'),
(71, 24, 'Confirm', 14, '2014-03-30 19:22:01'),
(72, 27, 'Add Member', 25, '2014-03-30 19:22:02'),
(73, 27, 'Add Member', 26, '2014-03-30 19:24:26'),
(74, 2, 'Add Member', 27, '2014-03-30 19:27:04'),
(75, 27, 'Edit', 22, '2014-03-30 19:27:42'),
(76, 27, 'Register', 22, '2014-03-30 19:27:42'),
(77, 26, 'Add Member', 28, '2014-03-30 19:28:59'),
(78, 23, 'Add Member', 29, '2014-03-30 19:56:25'),
(79, 23, 'Edit', 29, '2014-03-30 19:57:47'),
(80, 23, 'Save', 29, '2014-03-30 19:57:47'),
(81, 26, 'Edit', 28, '2014-03-30 20:00:03'),
(82, 26, 'Register', 28, '2014-03-30 20:00:03'),
(83, 2, 'Edit', 27, '2014-03-30 20:00:22'),
(84, 2, 'Register', 27, '2014-03-30 20:00:22'),
(85, 23, 'Edit', 29, '2014-03-30 20:00:40'),
(86, 23, 'Register', 29, '2014-03-30 20:00:40'),
(87, 23, 'Cancel Register', 29, '2014-03-30 20:00:58'),
(88, 23, 'Edit', 29, '2014-03-30 20:01:16'),
(89, 23, 'Register', 29, '2014-03-30 20:01:16'),
(90, 2, 'Add Member', 30, '2014-03-30 20:03:08'),
(91, 2, 'Edit', 30, '2014-03-30 20:03:24'),
(92, 2, 'Register', 30, '2014-03-30 20:03:24'),
(93, 23, 'Add Member', 31, '2014-03-30 20:05:01'),
(94, 26, 'Add Member', 32, '2014-03-30 20:09:15'),
(95, 26, 'Edit', 32, '2014-03-30 20:09:22'),
(96, 26, 'Register', 32, '2014-03-30 20:09:22'),
(97, 27, 'Add Member', 33, '2014-03-30 20:09:35'),
(98, 26, 'Cancel Register', 32, '2014-03-30 20:09:44'),
(99, 27, 'Edit', 33, '2014-03-30 20:10:00'),
(100, 27, 'Register', 33, '2014-03-30 20:10:00'),
(101, 25, 'Add Member', 34, '2014-03-30 20:10:18'),
(102, 25, 'Edit', 34, '2014-03-30 20:10:29'),
(103, 25, 'Register', 34, '2014-03-30 20:10:29'),
(104, 25, 'Confirm', 34, '2014-03-30 20:10:45'),
(105, 25, 'Cancel Confirm', 34, '2014-03-30 20:10:49'),
(106, 25, 'Confirm', 34, '2014-03-30 20:11:33'),
(107, 23, 'Add Member', 35, '2014-03-30 20:12:34'),
(108, 24, 'Cancel Confirm', 14, '2014-03-30 20:12:53'),
(109, 24, 'Confirm', 14, '2014-03-30 20:12:56'),
(110, 26, 'Add Member', 36, '2014-03-30 20:13:04'),
(111, 30, 'Add Member', 37, '2014-03-30 20:13:40'),
(112, 30, 'Edit', 37, '2014-03-30 20:13:47'),
(113, 30, 'Register', 37, '2014-03-30 20:13:47'),
(114, 27, 'Add Member', 38, '2014-03-30 20:15:37'),
(115, 24, 'Add Member', 39, '2014-03-30 20:15:40'),
(116, 27, 'Edit', 38, '2014-03-30 20:15:54'),
(117, 27, 'Save', 38, '2014-03-30 20:15:54'),
(118, 24, 'Edit', 39, '2014-03-30 20:16:07'),
(119, 24, 'Register', 39, '2014-03-30 20:16:07'),
(120, 24, 'Confirm', 39, '2014-03-30 20:16:15'),
(121, 30, 'Edit', 11, '2014-03-30 20:16:38'),
(122, 30, 'Save', 11, '2014-03-30 20:16:38'),
(123, 23, 'Add Member', 40, '2014-03-30 20:19:13'),
(124, 23, 'Edit', 40, '2014-03-30 20:21:17'),
(125, 23, 'Save', 40, '2014-03-30 20:21:17'),
(126, 23, 'Add Member', 41, '2014-03-30 20:34:50'),
(127, 28, 'Add Member', 42, '2014-03-30 20:38:35'),
(128, 3, 'Add Member', 43, '2014-04-02 21:02:56'),
(129, 3, 'Add Member', 44, '2014-04-02 21:03:40'),
(130, 25, 'Add Member', 45, '2014-04-02 21:03:51'),
(131, 3, 'Add Member', 46, '2014-04-02 21:05:25'),
(132, 25, 'Add Member', 47, '2014-04-02 21:06:04'),
(133, 3, 'Add Member', 48, '2014-04-02 21:06:16'),
(134, 3, 'Add Member', 49, '2014-04-02 21:06:53'),
(135, 28, 'Add Member', 50, '2014-04-02 21:29:49'),
(136, 2, 'Add Member', 51, '2014-04-02 21:44:33'),
(137, 23, 'Add Member', 52, '2014-04-02 21:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `birth_date` date NOT NULL COMMENT 'Birthday',
  `baptism_date` date NOT NULL COMMENT 'Baptism Date',
  `zion_id` int(2) unsigned NOT NULL DEFAULT '0' COMMENT 'Branch Zion id',
  `life_number` varchar(20) NOT NULL DEFAULT 'A00-000000-0',
  `home_phone` varchar(20) NOT NULL,
  `cell_phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip_code` varchar(5) NOT NULL,
  `branch1` varchar(70) NOT NULL,
  `branch2` varchar(70) DEFAULT NULL,
  `branch3` varchar(70) DEFAULT NULL,
  `register_time` datetime DEFAULT '0000-00-00 00:00:00' COMMENT 'Null value means not registered',
  `late_registration` enum('T','F') NOT NULL DEFAULT 'F',
  `confirmed` enum('T','F') NOT NULL DEFAULT 'F',
  `registerer_id` int(2) unsigned NOT NULL DEFAULT '0',
  `confirmed_id` int(2) unsigned NOT NULL DEFAULT '0',
  `comments` tinytext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `IDENTITY` (`first_name`,`middle_name`,`last_name`,`home_phone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `middle_name`, `last_name`, `gender`, `birth_date`, `baptism_date`, `zion_id`, `life_number`, `home_phone`, `cell_phone`, `address`, `city`, `state`, `zip_code`, `branch1`, `branch2`, `branch3`, `register_time`, `late_registration`, `confirmed`, `registerer_id`, `confirmed_id`, `comments`) VALUES
(1, 'JESSICA ', 'ROSE', 'MILITO', 'F', '1987-01-31', '0000-00-00', 1, 'Q03-070103-4133', '201-895-3422', NULL, '', '', '', '', 'TREES', '', NULL, '2014-04-06 05:08:08', 'T', 'T', 3, 3, ''),
(4, 'CLAUDIA', 'MARIELLA', 'CASTILLO', 'F', '1990-05-20', '0000-00-00', 1, 'Q03-090413-2437', '973-955-5198', NULL, '', '', '', '', 'HARVEY FELIZ', '', NULL, '2014-04-07 16:28:52', 'F', 'F', 3, 0, ''),
(5, 'MOON', ' WHAT', 'KANG', 'M', '1970-08-22', '0000-00-00', 1, 'A11-111111-111111', '201-290-8314', NULL, '', '', '', '', 'FATHER', 'MOTHER', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(6, 'LUCY', 'LOU', 'PEREZ', 'F', '2008-12-01', '0000-00-00', 1, 'Q01-070809-123', '201-555-5555', NULL, '', '', '', '', 'MARY SMITH', 'JANE DOE', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, 'DOES NOT REMEMBER LIFE #'),
(10, 'PHILIP', '', 'BROWNING', 'M', '1983-03-17', '0000-00-00', 1, 'A00-000000-0', '415-609-8381', NULL, '', '', '', '', 'B', '', NULL, '2014-04-07 12:59:21', 'F', 'F', 2, 0, ''),
(11, 'MOON', '', 'ASDF', 'F', '1939-09-29', '0000-00-00', 7, 'A00-000000-0', '233-423-4233', NULL, '', '', '', '', 'A', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(12, 'JORDAN', 'MICAHEL', 'RICHARDSON', 'M', '0000-00-00', '0000-00-00', 133, 'Q02-140409-2321', '201-343-2312', NULL, '307 W 36TH ST', 'NEW YORK', 'NY', '10012', 'JOHN DOE', 'JANE SMITH', NULL, '2014-04-07 12:38:01', 'F', 'F', 3, 0, 'NONE'),
(15, 'MOON2', '', 'KANGG', 'M', '1966-08-17', '0000-00-00', 1, 'A00-000000-0', '201-222-2222', NULL, '', '', '', '', 'JLK', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(16, 'OKJIN', '', 'SHIN', 'F', '1995-07-24', '0000-00-00', 1, 'A00-000000-0', '201-888-1456', NULL, '', '', '', '', '1', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(18, 'JOSHUA', '', 'KING', 'M', '2013-06-06', '0000-00-00', 12, 'A00-000000-0', '616-414-2452', NULL, '', '', '', '', 'KIMBERLY', 'BRIAN', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(19, 'CASSUNDRA', 'MEGAN', 'SANDERS', 'F', '2012-04-23', '0000-00-00', 1, 'A00-000000-0', '201-204-3516', NULL, '', '', '', '', 'MICHELLE SANDERS', '', NULL, '2014-04-06 20:21:25', 'T', 'F', 42, 0, ''),
(20, 'ANGEL', '', 'JUNE', 'M', '1956-06-06', '0000-00-00', 6, 'A00-000000-0', '212-222-2222', NULL, '', '', '', '', 'EWIN WESTMAKER', '', NULL, '2014-04-07 12:22:57', 'F', 'T', 3, 3, ''),
(21, 'JOCELYN', 'K.', 'KOREA', 'F', '2010-03-05', '0000-00-00', 11, 'L01-120113-2004', '201-299-8514', NULL, '', '', '', '', 'JULLY', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(22, 'ZION', 'JOSEPH', 'KIM', 'F', '1979-08-27', '0000-00-00', 8, 'A12-345678-9719', '201-987-6541', NULL, '', '', '', '', 'MELISSA RODRGUEZ', '', NULL, '2014-04-07 16:40:52', 'F', 'F', 3, 0, ''),
(23, 'MARLEN', '', 'BARREN', 'F', '2014-01-07', '0000-00-00', 3, 'A00-000000-0', '201-447-2567', NULL, '', '', '', '', 'KERRY', '', NULL, '2014-04-06 20:21:59', 'T', 'F', 0, 0, ''),
(24, 'NATASHA ', 'CARIDAD', 'BETANCOURT', 'F', '1980-07-14', '0000-00-00', 2, 'A00-000000-0', '221-506-7206', NULL, '', '', '', '', 'ROSSY TORIBIO', 'LUISA LOPEZ CASA', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(25, 'MEGAN', 'CHRISTINA', 'MOORE', 'F', '2000-01-01', '0000-00-00', 9, 'Q09-101201-21041', '401-341-5611', NULL, '', '', '', '', 'CHRISTIE MOORE', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(26, 'LESLIE', 'LIZ', 'MACANN', 'F', '1990-09-08', '0000-00-00', 2, 'C07-970808-2137', '347-743-7979', NULL, '', '', '', '', 'PETER HANSON', 'ZION KIM', NULL, '2014-04-07 16:32:59', 'F', 'F', 3, 0, ''),
(27, 'SOFFIA', 'LOLO', 'CCUICUCHI', 'F', '1982-02-14', '0000-00-00', 7, 'L01-110104-1114', '201-772-0915', NULL, '', '', '', '', '1', '', NULL, '2014-04-06 20:22:11', 'T', 'T', 0, 1, ''),
(28, 'MARIAH', 'JONES', 'CAREY', 'F', '2001-10-18', '0000-00-00', 11, 'Q03-091201-13450', '917-929-6127', NULL, '', '', '', '', 'JENNIFER RODGUI', 'SARAH ILLIANA CASTELLANOS', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(29, 'PETER', '', 'JOHN', 'M', '1992-04-03', '0000-00-00', 8, 'Q10-070602-', '111-111-1111', NULL, '', '', '', '', '1', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(30, 'JESSICA', '', 'GLASSER', 'F', '2014-10-18', '0000-00-00', 12, 'Q11-141018-1041', '201-445-1107', NULL, '', '', '', '', 'ENRIQUE BULLON', '', NULL, '2014-04-08 12:11:12', 'F', 'F', 3, 0, ''),
(31, 'SANDRA', 'MONG', 'SCHIERA', 'F', '1984-07-06', '0000-00-00', 3, 'Q03-111110-2124', '212-789-1234', NULL, '', '', '', '', 'X', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(32, 'BRI', '', 'HONG', 'M', '1976-01-01', '0000-00-00', 2, 'Q11-140128-11146', '973-594-6703', NULL, '', '', '', '', 'GEWARD HENRIQUEZ', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(33, 'SUE', '', 'BAEK', 'F', '1988-09-27', '0000-00-00', 4, 'A00-000000-0', '862-224-0915', NULL, '', '', '', '', 'LINDA', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(34, 'ZENG', '', 'ZING', 'F', '1988-06-22', '0000-00-00', 6, 'A00-000000-0', '646-246-2133', NULL, '', '', '', '', 'ANDREW SALTZMAN', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(35, 'TASHAHA', '', 'SARKER', 'F', '1985-12-14', '0000-00-00', 7, 'Q12-111017-21083', '201-333-3333', NULL, '', '', '', '', 'RANIER HENRIQUEZ', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(36, 'LEE', '', 'DAY', 'F', '2003-01-02', '0000-00-00', 2, 'A00-000000-0', '973-955-5555', NULL, '', '', '', '', 'L', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(37, 'MICHELLE', 'RUTH', 'JONES', 'F', '1977-07-07', '0000-00-00', 14, 'A00-000000-0', '973-377-4040', NULL, '', '', '', '', 'RUTH RIVERA', 'JOSE RIVERA', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(38, 'GINGI', '', 'RODRIGUEZ', 'M', '1990-11-11', '0000-00-00', 3, 'Q03-101014-11146', '456-478-5898', NULL, '', '', '', '', '1', '', NULL, '2014-04-08 18:37:45', 'F', 'F', 3, 0, ''),
(39, 'CRYSTALINA', 'MICHAEL', 'CERREA', 'F', '1981-06-09', '0000-00-00', 8, 'Q03-050601-2104', '201-451-6070', NULL, '', '', '', '', 'NANCY WILLIAMS', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(40, 'NKIRU', 'VIVIAN', 'AZIKIWE', 'F', '1984-02-26', '0000-00-00', 11, 'Q03-080603-2333', '212-992-7127', NULL, '', '', '', '', 'AELYSE WALKER', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(41, 'GUKJIN', '', 'KIM', 'F', '1989-12-30', '0000-00-00', 8, 'A03-060121-2100', '201-268-4186', NULL, '', '', '', '', 'JUNGSUK', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(42, 'JOHAH', '', 'HENRIQUEZ', 'M', '1919-02-11', '0000-00-00', 7, 'Q10-111501-1131', '862-823-1114', NULL, '', '', '', '', 'RICHARD ', '', NULL, '2014-04-06 20:38:57', 'T', 'F', 3, 0, ''),
(43, 'DAVID', 'SAMUEL', 'PETERS', 'M', '1980-04-01', '0000-00-00', 10, 'B97-401-6767', '973-401-6767', NULL, '', '', '', '', 'MICHAEL CHANG', 'ELIZABETH MURAN', NULL, '2014-04-08 13:15:58', 'F', 'F', 3, 0, ''),
(44, 'SENA', '', 'KIM', 'F', '1988-11-30', '0000-00-00', 6, 'B03-060121-2100', '200-132-8884', NULL, '', '', '', '', 'WHITE', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(45, 'JANE', '', 'DOE', 'F', '1989-12-30', '0000-00-00', 4, 'A00-000000-0', '212-998-5316', NULL, '', '', '', '', 'AELYSE WALKER', '', NULL, '2014-04-07 16:30:37', 'F', 'F', 3, 0, ''),
(46, 'CHRISTIE', 'LISA', 'FLOWERS', 'F', '1919-09-18', '0000-00-00', 8, 'Q03-091018-21083', '201-341-5671', NULL, '', '', '', '', 'CHRISTIN A MANDEL', '', NULL, '2014-04-06 20:40:19', 'T', 'F', 46, 0, ''),
(47, 'ANGEL', '', 'JANUARY', 'M', '2011-11-11', '0000-00-00', 2, 'A00-000000-0', '212-222-2222', NULL, '', '', '', '', 'BILL JEAN', '', NULL, '2014-04-07 11:39:20', 'F', 'T', 3, 3, 'NEEDS A WHEEL CHAIR'),
(48, 'SARA', 'ANGELA', 'KIM', 'F', '1987-08-01', '0000-00-00', 1, 'A00-000000-0', '829-740-2981', NULL, '', '', '', '', 'CHRISTINA GARCIA', '', NULL, '2014-04-06 20:40:47', 'T', 'F', 46, 0, ''),
(49, 'RICHARD', '', 'HAHN JOE', 'M', '1980-04-12', '0000-00-00', 6, 'A00-000000-0', '201-341-2267', NULL, '', '', '', '', 'MICHAEL RIVERA', '', NULL, '2014-04-06 20:42:59', 'T', 'F', 42, 0, ''),
(50, 'JOHNATHAN ', '', 'KIMILA', 'M', '2014-10-10', '0000-00-00', 12, 'A00-000000-0', '212-646-8888', NULL, '', '', '', '', 'N/A', '', NULL, '2014-04-07 16:32:08', 'F', 'F', 3, 0, ''),
(51, 'GLORIA', 'ALEXA', 'BOLANOS', 'F', '1985-03-05', '0000-00-00', 8, 'A00-000000-0', '347-804-8725', NULL, '', '', '', '', 'MAYRA YOUNG', '', NULL, '2014-04-07 16:17:06', 'F', 'T', 3, 3, ''),
(52, 'ANGEL', '', 'MARCH', 'M', '2012-12-12', '0000-00-00', 9, 'A00-000000-0', '333-333-3333', NULL, '', '', '', '', 'MICHAEL JACKSON', '', NULL, '2014-04-07 12:25:31', 'F', 'T', 3, 3, 'KEEP AN EYE FOR '),
(53, 'VIANA', '', 'VASQUEZ', 'F', '1988-01-22', '0000-00-00', 14, 'A00-000000-0', '202-882-1129', NULL, '', '', '', '', 'MIGUEL VASQUEZ', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(54, 'ANGEL', '', 'DECEMBER', 'M', '2012-12-12', '0000-00-00', 12, 'Y13-110903-333', '347-621-0911', NULL, '', '', '', '', 'DAVID TWOLEFTFEET', '', NULL, '2014-04-07 13:01:32', 'F', 'T', 3, 3, ''),
(55, 'JAMIE', 'FOXX', 'WOLFGANG', 'M', '1919-06-18', '0000-00-00', 13, 'G44-668888-9384', '347-564-5478', NULL, '', '', '', '', 'DANNY DAVIDO', 'WHITNEY HOUSTON', NULL, '2014-04-07 16:30:15', 'F', 'F', 3, 0, ''),
(56, 'ANGEL', '', 'PAGAN', 'M', '2011-11-11', '0000-00-00', 13, 'C03-876655-98322', '201-123-8888', NULL, '', '', '', '', 'CONGO', '', NULL, '2014-04-07 13:03:32', 'F', 'F', 3, 0, ''),
(57, 'CONIME', 'DEEDD', 'PARARA', 'M', '1995-01-03', '0000-00-00', 1, 'D03-908877-12345', '786-333-4455', NULL, '', '', '', '', 'FATHER ASH', '', NULL, '2014-04-08 11:56:45', 'F', 'F', 3, 0, ''),
(58, 'ALEXANDER', 'THE', 'GREAT', 'M', '1986-11-30', '0000-00-00', 12, 'Q76-343988-876393', '212-875-2545', NULL, '', '', '', '', 'ISSAC NEWTON', 'ATLAS THE GIANT', NULL, '2014-04-07 20:27:52', 'F', 'T', 1, 3, ''),
(59, 'MONKEY', '', 'SEE', 'M', '2007-07-07', '0000-00-00', 13, 'A00-000000-0', '567-567-5679', NULL, '', '', '', '', 'MONKEY DO', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(60, 'BACON', 'PORK', 'EATER', 'F', '2014-07-21', '0000-00-00', 6, 'B85-756445-7845412', '212-856-6458', NULL, '', '', '', '', 'HELLO GOODBYE', 'BUENAS NOCHES', NULL, '2014-04-08 00:27:41', 'F', 'F', 3, 0, ''),
(62, 'MONKEY', '', 'DOO', 'F', '2001-01-01', '0000-00-00', 139, 'A00-000000-0', '111-111-1111', NULL, '', '', '', '', 'MONKEY ', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(63, 'PLEASE ', 'HAVE ', 'FAITH AND BELIEVE', 'F', '1918-04-16', '0000-00-00', 3, 'K78-756242-6645422', '646-853-6542', NULL, '', '', '', '', 'MR. KEEPER', 'MRS. DOUBLE', NULL, '2014-04-07 16:29:46', 'F', 'F', 3, 0, ''),
(64, 'DAVID', 'MACCINT', 'KIM', 'F', '1988-06-23', '0000-00-00', 2, 'Q03-123440-87766', '877-234-1234', NULL, '', '', '', '', 'NATASHA', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(65, 'SHANIQUA', 'BARTLEY', 'SMITH', 'F', '1975-11-23', '0000-00-00', 9, 'J87-75645-512364', '212-456-5335', NULL, '', '', '', '', 'JOHNNY DEBT', 'MICHAEL DOUGLASS', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(66, 'SUNSHINE', 'SMITH', 'CARMEN', 'F', '1925-04-04', '0000-00-00', 6, 'K45-884562-565864', '212-878-4465', NULL, '', '', '', '', 'HELLO MANSION', 'STOP TALKING', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(67, 'MICHAEL', 'BILL', 'SMITH', 'M', '1945-11-11', '0000-00-00', 4, 'A00-000000-0', '121-221-2121', NULL, '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, ''),
(68, 'LUIS', 'MARTIN', 'FIGUEORA', 'M', '1999-12-02', '0000-00-00', 1, 'A34-112932-232', '415-454-4342', NULL, '', '', '', '', 'GABRIEL GUZMAN', '', NULL, '2014-04-06 22:48:45', 'T', 'F', 3, 0, ''),
(69, 'BRAND', 'NEW', 'MEMBER', 'M', '1994-03-23', '0000-00-00', 14, 'A00-000000-0', '646-485-4832', NULL, '', '', '', '', 'BRANCH', '', NULL, '2014-04-07 11:32:42', 'F', 'F', 3, 0, 'DOES NOT KNOW LIFE #'),
(72, 'JOHNNY', '', 'BRAVO', 'M', '1965-03-05', '0000-00-00', 108, 'J00-000000-0000', '323-393-4023', NULL, '', '', '', '', 'MARCY BRAVO', '', NULL, '2014-04-07 15:01:59', 'T', 'T', 3, 3, ''),
(73, 'CHEEZ', '', 'DOODLES', 'M', '2009-09-09', '0000-00-00', 3, 'C83-333333-333', '646-494-4943', NULL, '', '', '', '', 'WISE', '', NULL, '2014-04-07 16:07:05', 'T', 'F', 3, 0, ''),
(74, 'JOHN', 'THE', 'BAPTIST', 'M', '1983-03-31', '0000-00-00', 140, 'B33-390239-39293', '777-392-1930', NULL, '', '', '', '', 'JESUS CHRIST', '', NULL, '2014-04-08 16:15:54', 'F', 'F', 1, 0, '27 A.D.'),
(75, 'LUIS', 'GREGORIO', 'FIGUEROA', 'M', '1999-04-30', '0000-00-00', 1, 'B39-293939-2939', '394-939-9293', NULL, '', '', '', '', 'GILBERT RODRIGUEZ', '', NULL, '0000-00-00 00:00:00', 'T', 'F', 0, 0, 'ASDF'),
(76, 'DANIEL', '', 'LIZA', 'M', '1984-03-23', '0000-00-00', 1, 'M39-393029-29392', '413-509-3929', NULL, '', '', '', '', 'BRANCH NAME', '', NULL, '2014-04-07 21:09:04', 'F', 'T', 3, 3, 'ASDF');

-- --------------------------------------------------------

--
-- Stand-in structure for view `member_search`
--
CREATE TABLE `member_search` (
`id` int(11) unsigned
,`first_name` varchar(30)
,`middle_name` varchar(30)
,`last_name` varchar(30)
,`gender` varchar(1)
,`birth_date` date
,`baptism_date` date
,`zion_name` varchar(50)
,`local_zion` enum('T','F')
,`life_number` varchar(20)
,`home_phone` varchar(20)
,`cell_phone` varchar(20)
,`branch1` varchar(70)
,`register_time` datetime
,`confirmed` enum('T','F')
,`registerer_id` int(2) unsigned
,`confirmed_id` int(2) unsigned
,`comments` tinytext
);
-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `DOBir` date NOT NULL,
  `DOBap` date NOT NULL,
  `zion_name` varchar(30) NOT NULL,
  `life_no` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MEMORY DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `title`) VALUES
(1, 'ejk', 'aaaa11', 'Eunjung', 'Kim', 'Deaconess'),
(2, 'ojs', 'aaaa11', 'OkJin', 'Shin', 'Sister'),
(3, 'pb', 'aaaa11', 'Philip', 'Browning', 'Brother'),
(22, 'cc', 'aaaa11', 'Claudia', 'Castillo', NULL),
(23, 'jm', 'aaaa11', 'Jessica', 'Milito', NULL),
(24, 'eb', 'aaaa11', 'Enrique', 'Bullon', NULL),
(25, 'msk', 'aaaa11', 'Moon', 'Kang', NULL),
(26, 'lk', 'aaaa11', 'Lilly', 'Kim', NULL),
(27, 'ja', 'aaaa11', 'Jimi', 'Ahn', 'Deaconess'),
(29, 'hf', 'aaaa11', 'Harvey', 'Feliz', NULL),
(30, 'rg', 'aaaa11', 'Rocio', 'Gonzales', NULL),
(31, 'yjb', 'aaaa11', 'Yun-Jeong', 'Baek', NULL),
(32, 'jyh', 'aaaa11', 'Ju-Yeon', 'Han', 'Deaconess'),
(33, 'hyk', 'aaaa11', 'Hye-Yeon', 'Kim', NULL),
(34, 'rh', 'aaaa11', 'Ranier', 'Henriquez', NULL),
(35, 'sj', 'aaaa11', 'Sandra', 'Jiminez', NULL),
(36, 'gp', 'aaaa11', 'Gypsy', 'Patya', NULL),
(37, 'gh', 'aaaa11', 'Geward', 'Henriquez', NULL),
(38, 'jyn', 'aaaa11', 'Ji-Young', 'Noh', NULL),
(39, 'ap', 'aaaa11', 'Angel', 'Pagan', NULL),
(40, 'nb', 'aaaa11', 'Natasha', 'Betancourt', NULL),
(41, 'abetancourt', 'aaaa11', 'Alex', 'Betancourt', NULL),
(42, 'nf', 'aaaa11', 'Nicole', 'Frey', NULL),
(43, 'yjk', 'aaaa11', 'Yeon-Ji', 'Kim', NULL),
(44, 'ejc', 'aaaa11', 'Eun-Jin', 'Cho', NULL),
(45, 'gjk', 'aaaa11', 'Guk-Jin', 'Kim', NULL),
(46, 'jr', 'aaaa11', 'Jocelyn', 'Roman', NULL),
(47, 'na', 'aaaa11', 'Nkiru', 'Azikiwe', NULL),
(48, 'oa', 'aaaa11', 'Obi', 'Azikiwe', NULL),
(49, 'abolanos', 'aaaa11', 'Alexa', 'Bolanos', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `first_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `middle_name` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(1) CHARACTER SET utf8 NOT NULL,
  `birth_date` date NOT NULL COMMENT 'Birthday',
  `baptism_date` date NOT NULL COMMENT 'Baptism Date',
  `zion_id` int(2) unsigned NOT NULL DEFAULT '0' COMMENT 'Branch Zion id',
  `life_number` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT 'A00-000000-0',
  `home_phone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `cell_phone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `city` varchar(30) CHARACTER SET utf8 NOT NULL,
  `state` varchar(2) CHARACTER SET utf8 NOT NULL,
  `zip_code` varchar(5) CHARACTER SET utf8 NOT NULL,
  `branch1` varchar(70) CHARACTER SET utf8 NOT NULL,
  `branch2` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `branch3` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `register_time` datetime DEFAULT '0000-00-00 00:00:00' COMMENT 'Null value means not registered',
  `late_registration` enum('T','F') CHARACTER SET utf8 NOT NULL DEFAULT 'F',
  `confirmed` enum('T','F') CHARACTER SET utf8 NOT NULL DEFAULT 'F',
  `registerer_id` int(2) unsigned NOT NULL DEFAULT '0',
  `confirmed_id` int(2) unsigned NOT NULL DEFAULT '0',
  `comments` tinytext CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zions`
--

CREATE TABLE `zions` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `local` enum('T','F') NOT NULL DEFAULT 'F',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=141 ;

--
-- Dumping data for table `zions`
--

INSERT INTO `zions` (`id`, `name`, `local`) VALUES
(1, 'RIDGEWOOD, NJ', 'T'),
(2, 'BOGOTA, NJ', 'T'),
(3, 'PASSAIC, NJ', 'T'),
(4, 'BELLEVILLE, NJ', 'T'),
(6, 'CENTRAL JERSEY', 'T'),
(7, 'EAST JERSEY', 'T'),
(8, '1ST MANHATTAN', 'T'),
(9, '2ND MANHATTAN', 'T'),
(10, 'BRONX, NY', 'T'),
(11, 'LONG ISLAND, NY', 'T'),
(12, 'QUEENS, NY', 'T'),
(13, 'WHITE PLAINS, NY', 'T'),
(14, 'BROOKLYN, NY', 'T'),
(15, 'TAMPA, FL', 'T'),
(16, 'BOSTON, MA', 'F'),
(17, 'PUERTO RICO', 'F'),
(18, 'NEW HAMPSHIRE', 'F'),
(19, 'DOMINICAN REPUBLIC', 'F'),
(20, 'VIRGINIA BEACH, VA', 'F'),
(106, 'ORLANDO, FL', 'F'),
(108, 'LOS ANGELES, CA', 'F'),
(119, 'SAN FRANCISCO, CA', 'F'),
(120, 'SAN DIEGO, CA', 'F'),
(121, 'MIAMI, FL', 'F'),
(122, 'PORTLAND, OR', 'F'),
(123, 'SEATTLE, WA', 'F'),
(124, 'JACKSONVILLE, FL', 'F'),
(125, 'EL PASO, TX', 'F'),
(126, 'HOUSTON, TX', 'F'),
(127, 'DALLAS, TX', 'F'),
(128, 'MEMPHIS, TN', 'F'),
(129, 'BAKERSFIELD, CA', 'F'),
(131, 'NASHVILLE, TN', 'F'),
(132, 'FRANKLIN, TN', 'F'),
(133, 'KNOXVILLE, TN', 'F'),
(138, 'HONOLULU, HI', 'F'),
(139, 'SOUTH AMERICA', 'F'),
(140, 'JERUSALEM', 'F');

-- --------------------------------------------------------

--
-- Structure for view `member_search`
--
DROP TABLE IF EXISTS `member_search`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `member_search` AS select `members`.`id` AS `id`,`members`.`first_name` AS `first_name`,`members`.`middle_name` AS `middle_name`,`members`.`last_name` AS `last_name`,`members`.`gender` AS `gender`,`members`.`birth_date` AS `birth_date`,`members`.`baptism_date` AS `baptism_date`,`zions`.`name` AS `zion_name`,`zions`.`local` AS `local_zion`,`members`.`life_number` AS `life_number`,`members`.`home_phone` AS `home_phone`,`members`.`cell_phone` AS `cell_phone`,`members`.`branch1` AS `branch1`,`members`.`register_time` AS `register_time`,`members`.`confirmed` AS `confirmed`,`members`.`registerer_id` AS `registerer_id`,`members`.`confirmed_id` AS `confirmed_id`,`members`.`comments` AS `comments` from (`members` join `zions` on((`zions`.`id` = `members`.`zion_id`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
