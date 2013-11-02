-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2013 at 12:48 AM
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
  `notes` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `notes`, `created_at`) VALUES
(1, 'Hello World!', '2013-11-01 16:47:53'),
(2, 'Lorem', '2013-11-01 16:48:02'),
(3, 'Ipsum', '2013-11-01 16:48:10'),
(4, 'Dolor', '2013-11-01 16:48:20'),
(5, 'Sit', '2013-11-01 16:48:24'),
(6, 'Amet', '2013-11-01 16:48:31'),
(7, '!', '2013-11-01 16:48:38');
