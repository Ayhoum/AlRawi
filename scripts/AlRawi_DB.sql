-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2017 at 08:57 AM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `AlRawi_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE IF NOT EXISTS `Admin` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ROLE` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `EMAIL` (`USERNAME`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`ID`, `USERNAME`, `PASSWORD`, `NAME`, `ROLE`) VALUES
(1, 'HussamAdmin', 'Alaa1991', 'Hussam Al Rawi', 'MainAdmin'),
(2, 'Alaa', 'Alaa', '', 'MainAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `BOOKED_SESSION`
--

CREATE TABLE IF NOT EXISTS `BOOKED_SESSION` (
  `ID` int(11) NOT NULL,
  `DATE` date DEFAULT NULL,
  `TIME` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Users_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`,`Users_ID`),
  KEY `fk_BOOKED_SESSION_Users1_idx` (`Users_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `EXAM_QUESTION`
--

CREATE TABLE IF NOT EXISTS `EXAM_QUESTION` (
  `NUMBER` int(55) NOT NULL,
  `QUESTION` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RIGHT_ANWSER` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ANSWER_2` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ANSWER_3` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ANSWER_4` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PICTURE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TYPE` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `QUESTION_SET_ID` int(11) NOT NULL,
  PRIMARY KEY (`NUMBER`,`QUESTION_SET_ID`),
  KEY `fk_EXAM_QUESTION_QUESTION_SET1_idx` (`QUESTION_SET_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `EXAM_QUESTION`
--

INSERT INTO `EXAM_QUESTION` (`NUMBER`, `QUESTION`, `RIGHT_ANWSER`, `ANSWER_2`, `ANSWER_3`, `ANSWER_4`, `PICTURE`, `TYPE`, `QUESTION_SET_ID`) VALUES
(2, '2', '3', '4', '5', '6', '2', '7', 1),
(3, 'hoi', '2', '3', '3', 'ala', '4', 'aa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `FREE_EXAM_QUESTION`
--

CREATE TABLE IF NOT EXISTS `FREE_EXAM_QUESTION` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `QUESTION` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RIGHT_ANSWER` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ANSWER_2` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ANSWER_3` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ANSWER_4` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PICTURE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TYPE` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FREE_QUESTION_SET_NUMBER` int(11) NOT NULL,
  PRIMARY KEY (`ID`,`FREE_QUESTION_SET_NUMBER`),
  KEY `fk_FREE_EXAM_QUESTION_FREE_QUESTION_SET1_idx` (`FREE_QUESTION_SET_NUMBER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `FREE_QUESTION_SET`
--

CREATE TABLE IF NOT EXISTS `FREE_QUESTION_SET` (
  `NUMBER` int(11) NOT NULL,
  `NAME` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BEGIN_VALUE` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`NUMBER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `PAID_EXAM`
--

CREATE TABLE IF NOT EXISTS `PAID_EXAM` (
  `Users_ID` int(11) NOT NULL,
  `QUESTION_SET_ID` int(11) NOT NULL,
  PRIMARY KEY (`Users_ID`,`QUESTION_SET_ID`),
  KEY `fk_PAID_EXAM_Users1_idx` (`Users_ID`),
  KEY `fk_PAID_EXAM_QUESTION_SET1_idx` (`QUESTION_SET_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `QUESTION_SET`
--

CREATE TABLE IF NOT EXISTS `QUESTION_SET` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EXAM_NAME` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BEGIN_ID` int(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `QUESTION_SET`
--

INSERT INTO `QUESTION_SET` (`ID`, `EXAM_NAME`, `BEGIN_ID`) VALUES
(1, 'E1', 1),
(2, 'E2', 66),
(3, 'E3', 131),
(4, 'E4', 196),
(5, 'E5', 261),
(6, 'ف6', 326),
(7, 'E7', 391),
(8, 'exam 1', 456),
(9, '1', 521),
(10, '1', 586),
(11, '1', 651),
(12, 'Alaa', 716),
(13, '1', 781),
(14, 'asdsada', 846),
(15, '123321', 911),
(16, '12332122', 976);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PASSWORD` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PHONE` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CITY` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BD` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SPENT` double DEFAULT NULL,
  `SITUATION` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `REG_DATE` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email_UNIQUE` (`EMAIL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`ID`, `EMAIL`, `PASSWORD`, `NAME`, `PHONE`, `CITY`, `BD`, `SPENT`, `SITUATION`, `REG_DATE`) VALUES
(1, 'semsemea.a@hotmail.com', 'mr.virous', 'علاء سمسمية', '0634130878', 'خرونغن', '03/01/1992', NULL, 'TRAINING', '2017-10-29'),
(2, 'aylosa@outlook.com', '$2y$11$ALGXFbGOmxCXWS5wfeQ7hOPMGyb52XmsAtp7hQ2rM.7sP/b6A957u', 'Ayham Najem', '0648632561', 'Scheemda', '05/01/1995', 0, 'NEW', '2017-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `Website`
--

CREATE TABLE IF NOT EXISTS `Website` (
  `VISITS` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BOOKED_SESSION`
--
ALTER TABLE `BOOKED_SESSION`
  ADD CONSTRAINT `fk_BOOKED_SESSION_Users1` FOREIGN KEY (`Users_ID`) REFERENCES `Users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `EXAM_QUESTION`
--
ALTER TABLE `EXAM_QUESTION`
  ADD CONSTRAINT `fk_EXAM_QUESTION_QUESTION_SET1` FOREIGN KEY (`QUESTION_SET_ID`) REFERENCES `QUESTION_SET` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `FREE_EXAM_QUESTION`
--
ALTER TABLE `FREE_EXAM_QUESTION`
  ADD CONSTRAINT `fk_FREE_EXAM_QUESTION_FREE_QUESTION_SET1` FOREIGN KEY (`FREE_QUESTION_SET_NUMBER`) REFERENCES `FREE_QUESTION_SET` (`NUMBER`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `PAID_EXAM`
--
ALTER TABLE `PAID_EXAM`
  ADD CONSTRAINT `fk_PAID_EXAM_QUESTION_SET1` FOREIGN KEY (`QUESTION_SET_ID`) REFERENCES `QUESTION_SET` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PAID_EXAM_Users1` FOREIGN KEY (`Users_ID`) REFERENCES `Users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
