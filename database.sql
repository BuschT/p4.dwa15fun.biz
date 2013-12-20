-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2013 at 03:30 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `question_no` int(11) NOT NULL AUTO_INCREMENT,
  `question_content` text NOT NULL,
  `answer_a` text NOT NULL,
  `answer_b` text NOT NULL,
  `answer_c` text,
  `answer_d` text,
  `correct_answer` varchar(1) NOT NULL,
  PRIMARY KEY (`question_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Table structure for table `quizes`
--

CREATE TABLE IF NOT EXISTS `quizes` (
  `quiz_number` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_name` varchar(255) NOT NULL,
  `quiz_description` varchar(255) NOT NULL,
  `creator_user_id` int(255) NOT NULL,
  PRIMARY KEY (`quiz_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `quiz_questions`
--

CREATE TABLE IF NOT EXISTS `quiz_questions` (
  `quiz_number` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  PRIMARY KEY (`quiz_number`,`question_number`),
  KEY `questions_question_number` (`question_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Table structure for table `users_quizes_questions_answers`
--

CREATE TABLE IF NOT EXISTS `users_quizes_questions_answers` (
  `user_id` int(11) NOT NULL,
  `quiz_number` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `user_answer` varchar(1) NOT NULL,
  PRIMARY KEY (`user_id`,`quiz_number`,`question_number`),
  KEY `Users_Quizes_Quiz_Number` (`quiz_number`),
  KEY `Users_Quizes_Question_Number` (`question_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Constraints for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `questions_question_number` FOREIGN KEY (`question_number`) REFERENCES `questions` (`question_no`),
  ADD CONSTRAINT `quizes_quiz_number` FOREIGN KEY (`quiz_number`) REFERENCES `quizes` (`quiz_number`);

--
-- Constraints for table `users_quizes_questions_answers`
--
ALTER TABLE `users_quizes_questions_answers`
  ADD CONSTRAINT `Users_Quizes_Question_Number` FOREIGN KEY (`question_number`) REFERENCES `questions` (`question_no`),
  ADD CONSTRAINT `Users_Quizes_Quiz_Number` FOREIGN KEY (`quiz_number`) REFERENCES `quizes` (`quiz_number`),
  ADD CONSTRAINT `Users_Quizes_User_Id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
