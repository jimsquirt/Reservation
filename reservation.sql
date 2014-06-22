-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2014 at 10:39 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reservation`
--
CREATE DATABASE IF NOT EXISTS `reservation` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `reservation`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addUser`(IN `acc_id` VARCHAR(20), IN `pw` VARCHAR(20), IN `nme` VARCHAR(70))
    NO SQL
BEGIN
INSERt into user(account_id, password, name) values (acc_id, pw, nme);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getrooms`()
BEGIN
SELECT room_no FROM room;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `isUserExist`(IN `uname` VARCHAR(20))
    NO SQL
BEGIN
SELECT count(*) as doesexist FROM user WHERE account_id = uname;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `user` varchar(20) NOT NULL,
  `room_no` int(5) NOT NULL,
  `odate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`user`, `room_no`, `odate`) VALUES
('qweqwe', 201, '2014-06-17'),
('clyde', 201, '2014-06-04'),
('qweqwe', 101, '2014-06-11');

--
-- Triggers `reservation`
--
DROP TRIGGER IF EXISTS `saveDel`;
DELIMITER //
CREATE TRIGGER `saveDel` BEFORE DELETE ON `reservation`
 FOR EACH ROW begin
insert into utrylog set account_id = old.user, utrylog.room_no = old.room_no, datec = now();
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_no` int(5) unsigned NOT NULL DEFAULT '0',
  `room_type` varchar(20) NOT NULL,
  `room_charge` int(11) NOT NULL,
  PRIMARY KEY (`room_no`),
  UNIQUE KEY `room_no` (`room_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_no`, `room_type`, `room_charge`) VALUES
(101, 'Basic', 200),
(102, 'Basic', 200),
(201, 'Economy', 300),
(202, 'Economy', 300),
(203, 'Economy', 300),
(204, 'Economy', 300),
(301, 'Economy', 300),
(302, 'Economy', 300),
(303, 'Economy', 300),
(304, 'Economy', 300);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `account_id` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL,
  `name` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `account_id` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`account_id`, `password`, `name`) VALUES
('256256', '89598589', '6+569+6+96'),
('aaaaa', 'aa', 'a'),
('aaaaaaa', 'sdasd', 'asdasd'),
('aaas', 'sssad', 'asaa'),
('asdasd', '12345', 'sadasd'),
('asdasds', 'sssad', 'asaa'),
('clyde', '12345', 'clyde'),
('desu', 'desu', 'desu'),
('eden', 'eden', 'eden'),
('exiarliade', '1234', 'sssaaaad'),
('king', '12345', 'king'),
('kingusan', 'asadsa', 'asdasd'),
('qweqwe', '12345', 'qweqweqwe'),
('qwerty', '1234', 'qwer'),
('Stardust', '123qwe', 'Rene Paulo');

-- --------------------------------------------------------

--
-- Table structure for table `utrylog`
--

CREATE TABLE IF NOT EXISTS `utrylog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` varchar(20) NOT NULL,
  `room_no` int(5) unsigned NOT NULL,
  `datec` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `utrylog`
--

INSERT INTO `utrylog` (`id`, `account_id`, `room_no`, `datec`) VALUES
(4, 'qweqwe', 203, '2014-06-16'),
(5, 'qwerty', 201, '2014-06-16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
