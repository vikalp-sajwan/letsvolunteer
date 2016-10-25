-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2015 at 07:14 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `letsvolunteer`
--

-- --------------------------------------------------------

--
-- Table structure for table `coveredevents`
--

CREATE TABLE IF NOT EXISTS `coveredevents` (
  `eventid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `eventintro` text NOT NULL,
  `eventpara` text NOT NULL,
  `pic1` varchar(50) NOT NULL,
  `pic2` varchar(50) NOT NULL,
  `pic3` varchar(50) NOT NULL,
  `submissiondate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eventid`),
  UNIQUE KEY `eventid_2` (`eventid`),
  KEY `eventid` (`eventid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coveredevents`
--

INSERT INTO `coveredevents` (`eventid`, `userid`, `eventintro`, `eventpara`, `pic1`, `pic2`, `pic3`, `submissiondate`) VALUES
(3, 8, 'this text will contain info about the event.this text will contain info about the event.this text will contain info about the event.\r\nthis text will contain info about the event.this text will contain info about the event.\r\n\r\nthis text will contain info about the event.this text will contain info about the event.', 'this text will contain the detailed description of how the event occured.this text will contain the detailed description of how the event occured.\r\nthis text will contain the detailed description of how the event occured.\r\nthis text will contain the detailed description of how the event occured.\r\nthis text will contain the detailed description of how the event occured.this text will contain the detailed description of how the event occured.this text will contain the detailed description of how the event occured.\r\nthis text will contain the detailed description of how the event occured.this text will contain the detailed description of how the event occured.', 'volunteer.jpg', 'volunteer.jpg', 'volunteer.jpg', '2015-08-31 00:00:00'),
(4, 2, 'this text will contain info about the event.this text will contain info about the event.this text will contain info about the event.\r\nthis text will contain info about the event.this text will contain info about the event.\r\n\r\nthis text will contain info about the event.this text will contain info about the event.', 'this text will contain the detailed description of how the event occured.this text will contain the detailed description of how the event occured.\r\nthis text will contain the detailed description of how the event occured.\r\nthis text will contain the detailed description of how the event occured.\r\nthis text will contain the detailed description of how the event occured.this text will contain the detailed description of how the event occured.this text will contain the detailed description of how the event occured.\r\nthis text will contain the detailed description of how the event occured.this text will contain the detailed description of how the event occured.', 'volunteer.jpg', 'volunteer.jpg', 'volunteer.jpg', '2015-08-31 05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `eventingdata`
--

CREATE TABLE IF NOT EXISTS `eventingdata` (
  `eventid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  UNIQUE KEY `eventid_4` (`eventid`,`userid`) COMMENT 'pair of eventid and userid must be unique',
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventingdata`
--

INSERT INTO `eventingdata` (`eventid`, `userid`, `status`) VALUES
(1, 1, 1),
(1, 5, 1),
(3, 1, 1),
(5, 1, 1),
(5, 19, 1),
(6, 1, 1),
(6, 7, 1),
(19, 1, 1),
(20, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `eventid` int(10) NOT NULL AUTO_INCREMENT,
  `userid` int(10) NOT NULL,
  `eventname` varchar(50) NOT NULL,
  `eventplace` varchar(50) NOT NULL,
  `eventstart` datetime NOT NULL,
  `eventend` datetime NOT NULL,
  `eventdescription` text NOT NULL,
  `eventimg` varchar(50) DEFAULT NULL,
  `evententry` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`eventid`),
  KEY `userid` (`userid`),
  KEY `userid_2` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventid`, `userid`, `eventname`, `eventplace`, `eventstart`, `eventend`, `eventdescription`, `eventimg`, `evententry`) VALUES
(1, 7, 'Old clothes collection drive', 'racecourse', '2015-09-25 09:00:00', '2015-09-26 12:00:00', 'this text will contain information about the event.this text will contain information about the event.this text will contain information about the event.\r\n\r\nthis text will contain information about the event.this text will contain information about the event.this text will contain information about the event.\r\nthis text will contain information about the event.\r\nthis text will contain information about the event.this text will contain information about the event.\r\nthis text will contain information about the event.this text will contain information about the event.\r\nthis text will contain information about the event.this text will contain information about the event.', 'Volunteering_icon.png', 1),
(2, 5, 'tree plantation event', 'parade ground', '2015-09-05 07:00:00', '2015-09-05 10:00:00', 'this text will contain information about the event.this text will contain information about the event.this text will contain information about the event.\r\n\r\nthis text will contain information about the event.this text will contain information about the event.this text will contain information about the event.\r\nthis text will contain information about the event.\r\nthis text will contain information about the event.this text will contain information about the event.\r\nthis text will contain information about the event.this text will contain information about the event.\r\nthis text will contain information about the event.this text will contain information about the event.', 'Volunteering_icon.png', 1),
(3, 1, 'awareness campaign', 'gandhi park, rajpur road', '2015-08-13 12:00:00', '2015-08-13 14:00:00', 'this text will contain information about the event.this text will contain information about the event.this text will contain information about the event.\r\n\r\nthis text will contain information about the event.this text will contain information about the event.this text will contain information about the event.\r\nthis text will contain information about the event.\r\nthis text will contain information about the event.this text will contain information about the event.\r\nthis text will contain information about the event.this text will contain information about the event.\r\nthis text will contain information about the event.this text will contain information about the event.', 'Volunteering_icon.png', 0),
(4, 2, 'blood donation camp', 'Patel nagar', '2015-08-20 15:00:00', '2015-08-20 21:00:00', 'this text will contain information about the event.this text will contain information about the event.this text will contain information about the event.\r\n\r\nthis text will contain information about the event.this text will contain information about the event.this text will contain information about the event.\r\nthis text will contain information about the event.\r\nthis text will contain information about the event.this text will contain information about the event.\r\nthis text will contain information about the event.this text will contain information about the event.\r\nthis text will contain information about the event.this text will contain information about the event.', 'Volunteering_icon.png', 0),
(5, 9, 'protest against corruption', 'ISBT', '2015-09-13 12:00:00', '2015-09-13 14:00:00', 'this text will contain information about the event.this text will contain information about the event.this text will contain information about the event.\r\n\r\nthis text will contain information about the event.this text will contain information about the event.this text will contain information about the event.\r\nthis text will contain information about the event.\r\nthis text will contain information about the event.this text will contain information about the event.\r\nthis text will contain information about the event.this text will contain information about the event.\r\nthis text will contain information about the event.this text will contain information about the event.', 'Volunteering_icon.png', 1),
(6, 1, 'Tapkeshwar cleaning drive', 'tapkeshwar', '2015-09-03 10:00:00', '2015-09-03 14:00:00', 'this text will contain information about the event.this text will contain information about the event.this text will contain information about the event.\r\n\r\nthis text will contain information about the event.this text will contain information about the event.this text will contain information about the event.\r\nthis text will contain information about the event.\r\nthis text will contain information about the event.this text will contain information about the event.\r\nthis text will contain information about the event.this text will contain information about the event.\r\nthis text will contain information about the event.this text will contain information about the event.', 'Volunteering_icon.png', 1),
(19, 1, 'shaadi', 'wedding point', '2015-09-10 08:00:00', '2015-09-11 01:00:00', 'aaj mere yar ki shaadi h...', NULL, 1),
(20, 1, 'talak', 'court', '2015-09-15 06:00:00', '2015-09-15 08:00:00', 'khbkhbkhbh\r\nhjhjbhlbhb\r\nbjhbjhbjhbjbh\r\njkbhjbhbhjbhjb', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `userimg` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `userid` (`userid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `email`, `contact`, `gender`, `birthdate`, `address`, `district`, `state`, `userimg`) VALUES
(1, 'vikalp', 'vikalp', 'vikalp@gmail.com', '9526262626', 'male', '1995-03-22', 'durga enclave', 'dehradun', 'uttarakhand', NULL),
(2, 'ankit', 'ankit', 'ankit@gmail.com', '8451515151', 'male', '1992-02-06', 'prakash enclave', 'dehradun', 'uttarakhand', NULL),
(3, 'shalini', 'shalini', 'shalini@gmail.com', '7654254254', 'female', '1993-03-18', 'premnagar', 'tehri', 'uttarakhand', NULL),
(4, 'zaid', 'zaid', 'zaid@gmail.com', '8641641641', 'male', '1993-03-18', 'vikas nagar', 'chamoli', 'uttarakhand', NULL),
(5, 'dhruv', 'dhruv', 'dhruv@gmail.com', '9759614614', 'male', '1989-11-10', 'haridwar', 'haridwar', 'uttarakhand', NULL),
(6, 'kartikey', 'kartikey', 'kartikey@gmail.com', '8632454545', 'male', '1992-12-24', 'niranjanpur', 'pauri', 'uttarakhand', NULL),
(7, 'anupriya', 'anupriya', 'anupriya@gmail.com', '9854321655', 'female', '1992-02-06', 'niranjanpur', 'haldwani', 'uttarakhand', NULL),
(8, 'mohit', 'mohit', 'mohit@gmail.com', '7895012015', 'male', '1996-10-08', 'ekta enclave', 'rudraprayag', 'uttarakhand', NULL),
(9, 'aditya', 'aditya', 'aditya@gmail.com', '9712586423', 'male', '1994-06-09', 'vikas nagar', 'dehradun', 'uttarakhand', NULL),
(10, 'shruti', 'shruti', 'shruti@gmail.com', '8561245132', 'female', '1994-09-01', 'brahmanwala', 'dehradun', 'uttarakhand', NULL),
(18, 'ravi', 'ravi', 'ravi@gmail.com', '9865326598', 'male', '1989-12-31', 'saharanpur', 'dehradun', 'uttarakhand', NULL),
(19, 'ritika', 'thapliyal', 'ritikat16@gmail.com', '1234567', 'female', '1995-08-13', 'dehradun', 'dehradun', 'uttarakhand', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coveredevents`
--
ALTER TABLE `coveredevents`
  ADD CONSTRAINT `coveredevents_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `events` (`eventid`),
  ADD CONSTRAINT `coveredevents_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `eventingdata`
--
ALTER TABLE `eventingdata`
  ADD CONSTRAINT `eventingdata_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `events` (`eventid`),
  ADD CONSTRAINT `eventingdata_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
