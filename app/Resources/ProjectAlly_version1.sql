-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 18, 2013 at 05:26 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `bug_id` int(5) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `attachments`
--


-- --------------------------------------------------------

--
-- Table structure for table `bugs_and_features`
--

CREATE TABLE IF NOT EXISTS `bugs_and_features` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `reported_by` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `priority_id` int(5) NOT NULL,
  `assigned_to` int(5) NOT NULL,
  `milestone_id` int(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `estimate` int(5) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `bugs_and_features`
--


-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `comment` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `creator_id` int(10) unsigned DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modifier_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `estimate`
--

CREATE TABLE IF NOT EXISTS `estimate` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `estimate`
--

INSERT INTO `estimate` (`id`, `type`) VALUES
(1, 'None'),
(2, 'Small'),
(3, 'Medium'),
(4, 'Large');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_type_id` int(11) NOT NULL,
  `profile_id` int(10) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `all_day` tinyint(1) NOT NULL DEFAULT '1',
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=57 ;

--
-- Dumping data for table `events`
--


-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE IF NOT EXISTS `event_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `event_types`
--


-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE IF NOT EXISTS `milestones` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `responsible_user` int(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `planner` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `project_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `milestones`
--


-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE IF NOT EXISTS `priority` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `priority`
--

INSERT INTO `priority` (`id`, `type`) VALUES
(1, 'Highest'),
(2, 'High'),
(3, 'Normal'),
(4, 'Low'),
(5, 'Lowest');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_name`, `company_name`, `user_role`, `input_email`, `input_password`, `confirm_password`, `status`, `leave_request`, `leave_taken`, `user_dob`, `user_gender`, `work_email`, `user_address`, `user_mobile`, `user_home`, `user_photo`, `created`, `modified`) VALUES
(7, 'Hardik Shah', 'Aecortech', 1, 'hardik@gmail.com', 'testtest', 'testtest', 1, 0, 0, '', '', '', '', '', '', '', '2013-05-17 11:57:01', '2013-05-17 11:57:01'),
(8, 'Akash Bhardwaj', 'Aecortech', 3, 'akash@gmail.com', 'akash123', 'akash123', 1, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:00:03', '2013-05-17 12:00:03'),
(9, 'Manali Pohani', 'Aecortech', 3, 'manali@gmail.com', 'manali123', 'manali123', 0, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:01:54', '2013-05-17 12:01:54'),
(10, 'Dan Pope', 'Clubwebsite', 4, 'dan@gmail.com', 'dan123', 'dan123', 1, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:05:34', '2013-05-17 12:05:34'),
(11, 'Jon F', 'Clubwebsite', 4, 'jon@gmail.com', 'jon123', 'jon123', 1, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:09:04', '2013-05-17 12:09:04'),
(12, 'Ruchi Shah', 'Aecortech', 3, 'ruchi@gmail.com', 'ruchi123', 'ruchi123', 0, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:11:28', '2013-05-17 12:11:28'),
(13, 'Sonal Dubey ', 'Aecortech', 3, 'sonal@gmail.com', 'sonal123', 'sonal123', 0, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:12:01', '2013-05-17 12:12:01'),
(14, 'Payal Shah', 'Aecortech', 3, 'payal@gmail.com', 'payal123', 'payal123', 0, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:12:45', '2013-05-17 12:12:45'),
(15, 'Ankur Pandit', 'Aecortech', 3, 'ankur@gmail.com', 'ankur123', 'ankur123', 0, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:13:16', '2013-05-17 12:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `project_description` varchar(255) NOT NULL,
  `project_members` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_name`, `project_description`, `project_members`, `created`, `modified`) VALUES
(1, 'ProjectAlly', 'Project and Employee Management System', '', '2013-05-18 17:13:59', '2013-05-18 17:13:59');

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE IF NOT EXISTS `project_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `project_members`
--

INSERT INTO `project_members` (`id`, `project_id`, `profile_id`) VALUES
(13, 5, 7),
(14, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `type`) VALUES
(1, 'Completed'),
(2, 'In Progress'),
(3, 'Scheduled'),
(4, 'Rescheduled');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attachment` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `bugs_and_features_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `uploads`
--

