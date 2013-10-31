-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2013 at 06:24 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `wall`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_messages1_idx` (`message_id`),
  KEY `fk_comments_users1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `message_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 12, 4, 'This is a comment. This is a comment. This is a comment. This is a comment. This is a comment. This is a comment. This is a comment. This is a comment. This is a comment. This is a comment. This is a comment. This is a comment. This is a comment. This is a comment. ', '2013-10-30 19:31:34', NULL),
(3, 10, 4, 'comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment  ', '2013-10-30 19:37:55', NULL),
(4, 12, 3, 'comment of comment comment of comment comment of comment comment of comment comment of comment comment of comment comment of comment comment of comment comment of comment comment of comment comment of comment', '2013-10-30 19:38:49', NULL),
(5, 13, 4, 'hello pretty', '2013-10-30 22:08:38', NULL),
(6, 13, 4, 'hello pretty', '2013-10-30 22:08:52', NULL),
(7, 17, 4, 'muahahahahaha', '2013-10-30 22:20:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_messages_users_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(10, 3, ' This is a message. This is a message. This is a message. This is a message. This is a message. This is a message. This is a message. This is a message. This is a message. This is a message. This is a message.This is a message. This is a message. This is a message. This is a message. This is a message. This is a message. This is a message. This is a message. This is a message. This is a message. This is a message. This is a message. This is a message. This is a message. This is a message. This is a message. This is a message. This is a message. ', '2013-10-30 19:28:52', NULL),
(12, 3, ' Another message. Another message. Another message. Another message. Another message. Another message. Another message. Another message. Another message. Another message. Another message. Another message. Another message. Another message. Another message. Another message. Another message. Another message. Another message. Another message. Another message. ', '2013-10-30 19:29:40', NULL),
(13, 4, 'New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. New message. ', '2013-10-30 19:31:15', NULL),
(17, 4, 'lalalallalalalalalla', '2013-10-30 22:15:27', NULL),
(18, 5, 'I usually try to keep my sadness pent up inside where it can fester quietly as a mental illness. Hi, I''m a naughty nurse, and I really need someone to talk to. $9.95 a minute. Who are those horrible orange men? Morbo can''t understand his teleprompter because he forgot how you say that letter that''s shaped like a man wearing a hat. THE BIG BRAIN AM WINNING AGAIN! I AM THE GREETEST! NOW I AM LEAVING EARTH, FOR NO RAISEN! I found what I need. And it''s not friends, it''s things.', '2013-10-30 22:22:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(3, 'John', 'Doe', 'a@qwerty.com', 'a@qwerty.com', '2013-10-30 19:28:05', NULL),
(4, 'Peter Gia', 'Kim', 'b@qwerty.com', 'b@qwerty.com', '2013-10-30 19:30:39', NULL),
(5, 'Jane', 'DelaCroix', 'c@werty.com', 'c@werty.com', '2013-10-30 22:21:38', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_messages1` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comments_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_messages_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
