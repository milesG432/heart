-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 08, 2018 at 02:23 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heart`
--

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

DROP TABLE IF EXISTS `issues`;
CREATE TABLE IF NOT EXISTS `issues` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `status` varchar(45) NOT NULL,
  `reportedDate` date DEFAULT NULL,
  `completedDate` date DEFAULT NULL,
  `estimatedDate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `userID`, `product`, `desc`, `status`, `reportedDate`, `completedDate`, `estimatedDate`) VALUES
(1, 25, 'PulseOffice', '123456789', 'queued', '2018-10-08', NULL, '2018-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` varchar(255) NOT NULL,
  `body` longtext,
  `createdById` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `edited` datetime NOT NULL,
  `visible` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` longtext,
  `layoutID` int(11) DEFAULT NULL,
  `createdByID` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `editted` datetime DEFAULT NULL,
  `visible` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `accessLevel` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `lastLogin` varchar(45) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `surname`, `email`, `accessLevel`, `createdAt`, `lastLogin`, `password`, `company`) VALUES
(25, 'Gavin', 'Miles', 'gavin.miles@heartsystems.co.uk', 'admin', '2018-10-05 08:15:48', NULL, '$2y$10$pd3A5FallwSlxBFOwANDZ.u02/LZn8NYaXic5hcQyidfR7efBX.R6', NULL),
(27, 'sue', 'griffiths', 'sue.griffiths@heartsystems.co.uk', 'admin', '2018-10-05 11:29:22', NULL, '$2y$10$tjKK6m02KbWRDvSseotqfuvowLlm5Mepa8m5hv0OKfz.55xlUyeca', NULL),
(32, 'Helen', 'young', 'helen.young@heartsystems.co.uk', 'admin', '2018-10-08 08:18:33', NULL, '$2y$10$.UJtKfOAPFbNHeS.rdzxgu93DohF/U5i98aOZsPHmJHgXWBScWKWO', NULL),
(29, 'Suzanne', 'Platford', 'suzanne.platford@heartsystems.co.uk', 'admin', '2018-10-05 12:28:13', NULL, '$2y$10$7IEA1QwmUA3prjBwlWkz1upvKGf1ipALockFYbg315u3/fmRIvoqK', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
