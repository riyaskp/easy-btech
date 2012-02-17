-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2012 at 05:58 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `easy_btech`
--

-- --------------------------------------------------------

--
-- Table structure for table `eb_department`
--

CREATE TABLE IF NOT EXISTS `eb_department` (
  `dptid` int(11) NOT NULL AUTO_INCREMENT,
  `schemeid` int(11) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  PRIMARY KEY (`dptid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `eb_department`
--

INSERT INTO `eb_department` (`dptid`, `schemeid`, `dept_name`) VALUES
(1, 13, 'It'),
(2, 12, 'asd'),
(3, 1, 'dadd'),
(4, 1, 'asdgg'),
(5, 1, 'fgsas'),
(6, 6, 'qwwe'),
(7, 6, 'zxcv'),
(8, 10, 'it'),
(9, 11, 'cs');

-- --------------------------------------------------------

--
-- Table structure for table `eb_events`
--

CREATE TABLE IF NOT EXISTS `eb_events` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `eb_events`
--

INSERT INTO `eb_events` (`eid`, `title`, `description`, `location`, `date`, `link`) VALUES
(1, 'event', 'event description', '', '0000-00-00', 'afkdshafjk'),
(2, 'adwaya2.0', 'techfest', 'GECI', '2012-02-18', 'www.adwaya.com');

-- --------------------------------------------------------

--
-- Table structure for table `eb_material`
--

CREATE TABLE IF NOT EXISTS `eb_material` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `subid` int(11) NOT NULL,
  `material_name` varchar(50) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `eb_material`
--

INSERT INTO `eb_material` (`mid`, `subid`, `material_name`) VALUES
(1, 2, 'maths'),
(2, 4, 'schilber'),
(3, 1, '132453'),
(4, 5, 'physics'),
(5, 5, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `eb_news`
--

CREATE TABLE IF NOT EXISTS `eb_news` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `eb_news`
--

INSERT INTO `eb_news` (`nid`, `title`, `description`, `url`) VALUES
(1, 'asdgfsdg', 'asdgdsfsggds', 'sfgdsfsgg');

-- --------------------------------------------------------

--
-- Table structure for table `eb_project`
--

CREATE TABLE IF NOT EXISTS `eb_project` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `eb_project`
--

INSERT INTO `eb_project` (`pid`, `name`, `description`) VALUES
(1, 'asdasd', 'sadasfaf'),
(2, 'fdfrg', 'ujkkjjkhjk'),
(3, 'seo ', 'semok aijsdk oiajskljdklsa iajsijd akjsldjkla kassjdlkasl assjdhksa ajhsbnushbdyuahwd bhw da uawhubd uwhdba dad hawud adua'),
(4, 'seo ', 'semok aijsdk oiajskljdklsa iajsijd akjsldjkla kassjdlkasl assjdhksa ajhsbnushbdyuahwd bhw da uawhubd uwhdba dad hawud adua');

-- --------------------------------------------------------

--
-- Table structure for table `eb_scheme`
--

CREATE TABLE IF NOT EXISTS `eb_scheme` (
  `schemeid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `scheme_name` varchar(20) NOT NULL,
  PRIMARY KEY (`schemeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `eb_scheme`
--

INSERT INTO `eb_scheme` (`schemeid`, `uid`, `scheme_name`) VALUES
(1, 1, '2034'),
(2, 1, '12333'),
(3, 3, '123'),
(4, 1, '12334'),
(5, 1, 'asd'),
(6, 4, '2002'),
(7, 1, 'asdf'),
(8, 1, '668768'),
(9, 4, '2012'),
(10, 5, '2007'),
(11, 6, '2007'),
(12, 5, '2010'),
(13, 5, 'asdd'),
(14, 5, 'asdff'),
(15, 5, 'kkklll'),
(16, 5, 'wwwww'),
(17, 5, 'adfs');

-- --------------------------------------------------------

--
-- Table structure for table `eb_semester`
--

CREATE TABLE IF NOT EXISTS `eb_semester` (
  `semid` int(11) NOT NULL AUTO_INCREMENT,
  `dptid` int(11) NOT NULL,
  `sem_name` varchar(20) NOT NULL,
  PRIMARY KEY (`semid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `eb_semester`
--

INSERT INTO `eb_semester` (`semid`, `dptid`, `sem_name`) VALUES
(1, 3, 's3'),
(2, 3, 's3'),
(3, 3, 's5'),
(4, 3, 's7'),
(5, 5, 's7'),
(6, 6, 's5'),
(7, 6, 's8'),
(8, 8, 's8'),
(9, 9, 's5'),
(10, 9, 's8');

-- --------------------------------------------------------

--
-- Table structure for table `eb_seminar`
--

CREATE TABLE IF NOT EXISTS `eb_seminar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `eb_seminar`
--

INSERT INTO `eb_seminar` (`id`, `name`, `description`) VALUES
(1, 'seminar', 'seminar description');

-- --------------------------------------------------------

--
-- Table structure for table `eb_subject`
--

CREATE TABLE IF NOT EXISTS `eb_subject` (
  `subid` int(11) NOT NULL AUTO_INCREMENT,
  `semid` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  PRIMARY KEY (`subid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `eb_subject`
--

INSERT INTO `eb_subject` (`subid`, `semid`, `sub_name`) VALUES
(1, 2, 'maths'),
(2, 1, 'physics'),
(3, 5, 'chemi'),
(4, 6, 'ec'),
(5, 8, 'Maths'),
(6, 9, 'physics'),
(7, 10, 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `eb_syllabus`
--

CREATE TABLE IF NOT EXISTS `eb_syllabus` (
  `sylid` int(11) NOT NULL AUTO_INCREMENT,
  `semid` int(11) NOT NULL,
  `syl_name` varchar(20) NOT NULL,
  PRIMARY KEY (`sylid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `eb_syllabus`
--

INSERT INTO `eb_syllabus` (`sylid`, `semid`, `syl_name`) VALUES
(1, 1, '1992'),
(3, 8, 's3syl'),
(4, 8, 'new syllabus');

-- --------------------------------------------------------

--
-- Table structure for table `eb_university`
--

CREATE TABLE IF NOT EXISTS `eb_university` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `eb_university`
--

INSERT INTO `eb_university` (`uid`, `uname`) VALUES
(5, 'mg university'),
(6, 'calicut'),
(7, 'Kannur'),
(8, 'cusat'),
(10, 'kerala'),
(11, 'new'),
(12, 'new2'),
(13, 'ads'),
(14, '12345'),
(15, 'dsfd'),
(16, '12334'),
(17, 'asdasdf'),
(18, 'am'),
(19, 'shdgjfs');

-- --------------------------------------------------------

--
-- Table structure for table `eb_year`
--

CREATE TABLE IF NOT EXISTS `eb_year` (
  `yid` int(11) NOT NULL AUTO_INCREMENT,
  `subid` int(11) NOT NULL,
  `year` varchar(100) NOT NULL,
  `qpaper` varchar(100) NOT NULL,
  PRIMARY KEY (`yid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `eb_year`
--

INSERT INTO `eb_year` (`yid`, `subid`, `year`, `qpaper`) VALUES
(1, 1, '2008', 'asdfdf'),
(2, 1, 'jsjsd', 'sdfdsfkjds'),
(3, 1, '2323', '3'),
(4, 2, 'asddd', '4'),
(5, 2, 'djhgh', '5'),
(6, 2, '2002', '6'),
(7, 2, 'qqwwee', '7'),
(8, 5, '2002', '8'),
(9, 6, '2007 march', '9'),
(10, 7, '1qww', '10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
