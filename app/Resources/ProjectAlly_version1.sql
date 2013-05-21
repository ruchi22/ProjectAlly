-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2013 at 08:22 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `bugs_and_features`
--

INSERT INTO `bugs_and_features` (`id`, `reported_by`, `status`, `priority_id`, `assigned_to`, `milestone_id`, `title`, `description`, `estimate`, `project_id`, `created`, `modified`) VALUES
(1, '7', '3', 1, 8, 1, 'Test Employee system', 'Testing', 4, 2, '2013-05-18 19:56:30', '2013-05-18 19:56:30'),
(2, '7', '3', 2, 8, 2, 'Front Page PSD', 'create PSD file of front page', 2, 6, '2013-05-19 19:35:40', '2013-05-19 19:35:40'),
(3, '7', '3', 2, 13, 2, 'Front Page HTML', 'convert the PSD into html and css', 2, 6, '2013-05-19 19:40:33', '2013-05-19 19:40:33'),
(4, '7', '3', 3, 13, 2, 'Add Jquery animations', 'Implement slider and menus using jquery', 2, 6, '2013-05-19 19:46:40', '2013-05-19 19:46:40'),
(5, '7', '3', 1, 7, 3, 'Design DB schema', '', 3, 6, '2013-05-19 19:51:13', '2013-05-19 19:51:13'),
(6, '7', '3', 4, 10, 4, 'Content for home and about us', 'Home page should include introdution and about us will include company''s profile and details about project', 2, 6, '2013-05-19 20:00:30', '2013-05-19 20:00:30'),
(7, '7', '3', 3, 13, 5, 'Slider not working', 'slider is not working properly when internet connections is not there.', 2, 6, '2013-05-19 20:05:12', '2013-05-19 20:05:12'),
(8, '7', '3', 2, 8, 6, 'Video Uploader not working', 'Videos aren''t getting uploaded', 3, 5, '2013-05-19 20:22:09', '2013-05-19 20:22:09');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=64 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_type_id`, `profile_id`, `title`, `details`, `start`, `end`, `all_day`, `status`, `active`, `created`, `modified`) VALUES
(58, 8, 8, 'Emergency', 'abcdefgh', '2013-05-22 15:30:52', '2013-05-23 15:31:13', 1, 'Approved', 1, '2013-05-19 10:01:18', '2013-05-19 10:01:18'),
(59, 1, 8, 'UI Design', 'Ui designing of the project in photoshop and its conversion into HTML and css.', '2013-05-19 19:27:04', '2013-05-30 00:55:06', 0, 'Approved', 1, '2013-05-19 19:27:04', '2013-05-19 19:27:04'),
(60, 1, 7, 'Database Schema', 'create tentative tables for the project and establish relations between them', '2013-05-19 19:49:44', '2013-06-05 00:00:00', 0, 'Approved', 1, '2013-05-19 19:49:44', '2013-05-19 19:49:44'),
(61, 1, 10, 'Content', 'Prepare content for project', '2013-05-19 19:53:17', '2013-05-25 01:22:44', 0, 'Approved', 1, '2013-05-19 19:53:17', '2013-05-19 19:53:17'),
(62, 1, 8, 'Bugs', 'all the bugs related to 4th umpire should be reported here.', '2013-05-19 20:02:58', '2013-06-25 00:00:00', 0, 'Approved', 1, '2013-05-19 20:02:58', '2013-05-19 20:02:58'),
(63, 1, 11, 'Bugs', 'All bugs related to clubwebsite should be maintained here.', '2013-05-19 20:21:13', '2013-06-30 00:00:00', 0, 'Approved', 1, '2013-05-19 20:21:13', '2013-05-19 20:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE IF NOT EXISTS `event_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `name`, `color`) VALUES
(2, 'Sick Leave', 'Red'),
(1, 'Milestones', 'Brown'),
(3, 'Project', 'Black'),
(4, 'General Leave', 'Blue'),
(5, 'Holiday', 'green');

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE IF NOT EXISTS `milestones` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `responsible_user` int(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `description` text NOT NULL,
  `project_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `milestones`
--

INSERT INTO `milestones` (`id`, `responsible_user`, `title`, `due_date`, `description`, `project_id`, `created`, `modified`) VALUES
(1, 8, 'Milestone 1', '2013-05-24', 'This is for testing', 2, '2013-05-18 19:47:57', '2013-05-18 19:47:57'),
(2, 8, 'UI Design', '2013-05-30', 'Ui designing of the project in photoshop and its conversion into HTML and css.', 6, '2013-05-19 19:27:04', '2013-05-19 19:27:04'),
(3, 7, 'Database Schema', '2013-06-05', 'create tentative tables for the project and establish relations between them', 6, '2013-05-19 19:49:44', '2013-05-19 19:49:44'),
(4, 10, 'Content', '2013-05-25', 'Prepare content for project', 6, '2013-05-19 19:53:17', '2013-05-19 19:53:17'),
(5, 8, 'Bugs', '2013-06-25', 'all the bugs related to 4th umpire should be reported here.', 6, '2013-05-19 20:02:58', '2013-05-19 20:02:58'),
(6, 11, 'Bugs', '2013-06-30', 'All bugs related to clubwebsite should be maintained here.', 5, '2013-05-19 20:21:13', '2013-05-19 20:21:13');

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
  `status` int(1) NOT NULL,
  `leave_request` int(5) NOT NULL,
  `leave_taken` float NOT NULL,
  `user_dob` varchar(15) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `work_email` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `user_home` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_name`, `company_name`, `user_role`, `input_email`, `input_password`, `status`, `leave_request`, `leave_taken`, `user_dob`, `user_gender`, `work_email`, `user_address`, `user_mobile`, `user_home`, `created`, `modified`) VALUES
(7, 'Hardik Shah', 'Aecortech', 1, 'hardik@gmail.com', 'testtest', 1, 0, 0, '', '', '', '', '', '', '2013-05-17 11:57:01', '2013-05-17 11:57:01'),
(8, 'Akash Bhardwaj', 'Aecortech', 2, 'akash@gmail.com', 'akash123', 1, 2, 1, '', '', '', '', '', '', '2013-05-17 12:00:03', '2013-05-17 12:00:03'),
(9, 'Manali Pohani', 'Aecortech', 3, 'manali@gmail.com', 'manali123', 0, 0, 0, '', '', '', '', '', '', '2013-05-17 12:01:54', '2013-05-17 12:01:54'),
(10, 'Dan Pope', 'Clubwebsite', 4, 'dan@gmail.com', 'dan123', 1, 0, 0, '', '', '', '', '', '', '2013-05-17 12:05:34', '2013-05-17 12:05:34'),
(11, 'Jon F', 'Clubwebsite', 4, 'jon@gmail.com', 'jon123', 1, 0, 0, '', '', '', '', '', '', '2013-05-17 12:09:04', '2013-05-17 12:09:04'),
(12, 'Ruchi Shah', 'Aecortech', 3, 'ruchi@gmail.com', 'ruchi123', 0, 0, 0, '', '', '', '', '', '', '2013-05-17 12:11:28', '2013-05-17 12:11:28'),
(13, 'Sonal Dubey ', 'Aecortech', 3, 'sonal@gmail.com', 'sonal123', 1, 0, 0, '', '', '', '', '', '', '2013-05-17 12:12:01', '2013-05-17 12:12:01'),
(14, 'Payal Shah', 'Aecortech', 3, 'payal@gmail.com', 'payal123', 0, 0, 0, '', '', '', '', '', '', '2013-05-17 12:12:45', '2013-05-17 12:12:45'),
(15, 'Ankur Pandit', 'Aecortech', 3, 'ankur@gmail.com', 'ankur123', 0, 0, 0, '', '', '', '', '', '', '2013-05-17 12:13:16', '2013-05-17 12:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `project_description` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_name`, `project_description`, `due_date`, `created`, `modified`) VALUES
(5, 'Club website', 'Football manager website', '0000-00-00', '2013-05-19 11:01:52', '2013-05-19 11:01:52'),
(6, '4th Umpire', 'Project will be used to create, organize and maintain leagues for various registered cricked club teams.', '0000-00-00', '2013-05-19 19:13:44', '2013-05-19 19:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE IF NOT EXISTS `project_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `project_members`
--

INSERT INTO `project_members` (`id`, `project_id`, `profile_id`) VALUES
(6, 5, 8),
(7, 5, 11),
(13, 5, 7),
(14, 1, 10),
(15, 2, 8),
(16, 3, 8),
(17, 6, 7),
(18, 6, 13),
(19, 6, 11),
(20, 6, 8);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `attachment`, `size`, `bugs_and_features_id`) VALUES
(1, 'profile_pic_7.jpg', 897932, 7),
(2, 'profile_pic_7.jpg', 778077, 7),
(3, 'profile_pic_7.jpg', 78457, 7),
(4, 'profile_pic_7.jpg', 897932, 7),
(5, 'profile_pic_7.jpg', 157385, 7),
(6, 'profile_pic_7.jpg', 157385, 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
