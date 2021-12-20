-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2017 at 08:43 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `districtActivities`
--

CREATE TABLE IF NOT EXISTS `districtactivities` (
  `No` int(255) NOT NULL AUTO_INCREMENT,
  `Date` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Place` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Details` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`No`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `districtActivities`
--

INSERT INTO `districtActivities` (`No`, `Date`, `Place`, `Title`, `Details`) VALUES
(1, '8/1/2017', 'ரிஷிவந்தியம்', 'கிளை சந்திப்பு', 'பள்ளிவாசல் திறப்பு நிகழ்ச்சி'),
(2, '16/1/2017', 'ரிஷிவந்தியம்', 'கிளை சந்திப்பு', 'நிர்வாக சீரமைப்பு');
