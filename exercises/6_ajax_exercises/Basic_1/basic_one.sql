-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 06, 2013 at 04:47 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `basic_one`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Lorem', 'You can see how I lived before I met you. Also Zoidberg. Fry! Quit doing the right thing, you jerk!', '2013-11-05 19:33:14', '2013-11-05 19:45:55'),
(2, 'Ipsum', 'You can see how I lived before I met you. Also Zoidberg. Fry! Quit doing the right thing, you jerk! ', '2013-11-05 19:33:17', '2013-11-05 19:46:14'),
(3, 'Dolor', 'Then throw her in the laundry room, which will hereafter be referred to as "the brig". ', '2013-11-05 19:33:20', '2013-11-05 19:42:08'),
(4, 'Sit', 'You can see how I lived before I met you. Also Zoidberg. Fry! Quit doing the right thing, you jerk!', '2013-11-05 19:33:21', '2013-11-05 19:34:51'),
(5, 'Amet', 'Why are you so buggy?\r\nAnd why are you working now?', '2013-11-05 19:33:24', '2013-11-05 19:40:14');
