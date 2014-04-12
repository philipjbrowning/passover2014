-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 12, 2014 at 06:35 PM
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL DEFAULT '',
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL DEFAULT '',
  `gender` varchar(1) NOT NULL DEFAULT '',
  `birth_date` date NOT NULL,
  `baptism_date` date NOT NULL,
  `zion_id` int(2) unsigned NOT NULL DEFAULT '0',
  `life_number` varchar(20) NOT NULL DEFAULT 'A00-000000-0',
  `home_phone` varchar(20) NOT NULL DEFAULT '',
  `cell_phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) NOT NULL DEFAULT '',
  `city` varchar(30) NOT NULL DEFAULT '',
  `state` varchar(2) NOT NULL DEFAULT '',
  `zip_code` varchar(5) NOT NULL DEFAULT '',
  `branch1` varchar(70) NOT NULL DEFAULT '',
  `branch2` varchar(70) DEFAULT NULL,
  `branch3` varchar(70) DEFAULT NULL,
  `register_time` datetime DEFAULT '0000-00-00 00:00:00',
  `late_registration` enum('T','F') NOT NULL DEFAULT 'F',
  `confirmed` enum('T','F') NOT NULL DEFAULT 'F',
  `registerer_id` int(2) unsigned NOT NULL DEFAULT '0',
  `confirmed_id` int(2) unsigned NOT NULL DEFAULT '0',
  `comments` tinytext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `IDENTITY` (`first_name`,`middle_name`,`last_name`,`cell_phone`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `member_search`
--
CREATE TABLE `member_search` (
`id` int(11)
,`first_name` varchar(30)
,`middle_name` varchar(30)
,`last_name` varchar(30)
,`gender` varchar(1)
,`birth_date` date
,`baptism_date` date
,`zion_id` int(2) unsigned
,`zion_name` varchar(50)
,`local_zion` enum('T','F')
,`life_number` varchar(20)
,`home_phone` varchar(20)
,`cell_phone` varchar(20)
,`branch1` varchar(70)
,`branch2` varchar(70)
,`branch3` varchar(70)
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
(1, 'ejk', 'aaaa11', 'Eunjung', 'Kim', 'D.'),
(2, 'ojs', 'aaaa11', 'OkJin', 'Shin', 'S.'),
(3, 'pb', 'aaaa11', 'Philip', 'Browning', 'B.'),
(22, 'cc', 'aaaa11', 'Claudia', 'Castillo', NULL),
(23, 'jm', 'aaaa11', 'Jessica', 'Milito', NULL),
(24, 'eb', 'aaaa11', 'Enrique', 'Bullon', NULL),
(25, 'msk', 'aaaa11', 'Moon', 'Kang', 'B.'),
(26, 'lk', 'aaaa11', 'Lilly', 'Kim', NULL),
(27, 'ja', 'aaaa11', 'Jimi', 'Ahn', 'D.'),
(29, 'hf', 'aaaa11', 'Harvey', 'Feliz', 'B.'),
(30, 'rg', 'aaaa11', 'Rocio', 'Gonzales', NULL),
(31, 'yjb', 'aaaa11', 'Yun-Jeong', 'Baek', NULL),
(32, 'jyh', 'aaaa11', 'Ju-Yeon', 'Han', 'D.'),
(33, 'hyk', 'aaaa11', 'Hye-Yeon', 'Kim', NULL),
(34, 'rh', 'aaaa11', 'Ranier', 'Henriquez', NULL),
(35, 'sj', 'aaaa11', 'Sandra', 'Jiminez', NULL),
(36, 'gp', 'aaaa11', 'Gypsy', 'Patya', NULL),
(37, 'gh', 'aaaa11', 'Geward', 'Henriquez', NULL),
(38, 'jyn', 'aaaa11', 'Ji-Young', 'Noh', NULL),
(39, 'ap', 'aaaa11', 'Angel', 'Pagan', NULL),
(40, 'nb', 'aaaa11', 'Natasha', 'Betancourt', NULL),
(41, 'abetancur', 'aaaa11', 'Alex', 'Betancur', NULL),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=142 ;

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
(16, 'BOSTON, MA', 'T'),
(17, 'PUERTO RICO', 'T'),
(18, 'NEW HAMPSHIRE', 'T'),
(19, 'DOMINICAN REPUBLIC', 'T'),
(20, 'VIRGINIA BEACH, VA', 'T'),
(21, 'UNKNOWN', 'T'),
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
(140, 'JERUSALEM', 'F'),
(141, 'BALTIMORE, MD', 'F');

-- --------------------------------------------------------

--
-- Structure for view `member_search`
--
DROP TABLE IF EXISTS `member_search`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `member_search` AS select `members`.`id` AS `id`,`members`.`first_name` AS `first_name`,`members`.`middle_name` AS `middle_name`,`members`.`last_name` AS `last_name`,`members`.`gender` AS `gender`,`members`.`birth_date` AS `birth_date`,`members`.`baptism_date` AS `baptism_date`,`zions`.`id` AS `zion_id`,`zions`.`name` AS `zion_name`,`zions`.`local` AS `local_zion`,`members`.`life_number` AS `life_number`,`members`.`home_phone` AS `home_phone`,`members`.`cell_phone` AS `cell_phone`,`members`.`branch1` AS `branch1`,`members`.`branch2` AS `branch2`,`members`.`branch3` AS `branch3`,`members`.`register_time` AS `register_time`,`members`.`confirmed` AS `confirmed`,`members`.`registerer_id` AS `registerer_id`,`members`.`confirmed_id` AS `confirmed_id`,`members`.`comments` AS `comments` from (`members` join `zions` on((`zions`.`id` = `members`.`zion_id`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
