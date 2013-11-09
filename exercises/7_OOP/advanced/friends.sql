-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 09, 2013 at 05:15 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `friends`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`user_id`, `friend_id`) VALUES
(1, 3),
(3, 1),
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Jane', 'Doe', 'a@qwerty.com', 'a@qwerty.com', '2013-11-07 20:46:53', '0000-00-00 00:00:00'),
(2, 'Michael', 'Choi', 'b@qwerty.com', 'b@qwerty.com', '2013-11-07 22:05:16', '0000-00-00 00:00:00'),
(3, 'Herman', 'Hawnthorne', 'c@qwerty.com', 'c@qwerty.com', '2013-11-08 14:40:11', '0000-00-00 00:00:00'),
(4, 'Hello', 'Kitty', 'f@qwerty.com', 'f@qwerty.com', '2013-11-08 20:13:34', '0000-00-00 00:00:00'),
(5, 'Donald', 'Duck', 'd@qwerty.com', 'd@qwerty.com', '2013-11-08 20:13:54', '0000-00-00 00:00:00');
