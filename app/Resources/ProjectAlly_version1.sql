-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 17, 2013 at 12:19 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `user_role` int(1) NOT NULL,
  `input_email` varchar(255) NOT NULL,
  `input_password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `leave_request` int(5) NOT NULL,
  `leave_taken` float NOT NULL,
  `user_dob` varchar(15) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `work_email` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `user_home` varchar(255) NOT NULL,
  `user_photo` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_name`, `company_name`, `user_role`, `input_email`, `input_password`, `confirm_password`, `status`, `leave_request`, `leave_taken`, `user_dob`, `user_gender`, `work_email`, `user_address`, `user_mobile`, `user_home`, `user_photo`, `created`, `modified`) VALUES
(7, 'Hardik Shah', 'Aecortech', 1, 'hardik@gmail.com', 'testtest', 'testtest', 1, 0, 0, '', '', '', '', '', '', '', '2013-05-17 11:57:01', '2013-05-17 11:57:01'),
(8, 'Akash Bhardwaj', 'Aecortech', 3, 'akash@gmail.com', 'akash123', 'akash123', 0, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:00:03', '2013-05-17 12:00:03'),
(9, 'Manali Pohani', 'Aecortech', 3, 'manali@gmail.com', 'manali123', 'manali123', 0, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:01:54', '2013-05-17 12:01:54'),
(10, 'Dan Pope', 'Clubwebsite', 4, 'dan@gmail.com', 'dan123', 'dan123', 0, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:05:34', '2013-05-17 12:05:34'),
(11, 'Jon F', 'Clubwebsite', 4, 'jon@gmail.com', 'jon123', 'jon123', 0, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:09:04', '2013-05-17 12:09:04'),
(12, 'Ruchi Shah', 'Aecortech', 3, 'ruchi@gmail.com', 'ruchi123', 'ruchi123', 0, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:11:28', '2013-05-17 12:11:28'),
(13, 'Sonal Dubey ', 'Aecortech', 3, 'sonal@gmail.com', 'sonal123', 'sonal123', 0, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:12:01', '2013-05-17 12:12:01'),
(14, 'Payal Shah', 'Aecortech', 3, 'payal@gmail.com', 'payal123', 'payal123', 0, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:12:45', '2013-05-17 12:12:45'),
(15, 'Ankur Pandit', 'Aecortech', 3, 'ankur@gmail.com', 'ankur123', 'ankur123', 0, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:13:16', '2013-05-17 12:13:16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
