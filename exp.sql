-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2020 at 08:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exp`
--

-- --------------------------------------------------------

--
-- Table structure for table `BIOS`
--

CREATE TABLE `BIOS` (
  `user_id` int(8) NOT NULL,
  `bio` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `BIOS`
--

INSERT INTO `BIOS` (`user_id`, `bio`) VALUES
(54609142, 'This is John Wick 3 and stay tuned for John Wick 4!');

-- --------------------------------------------------------

--
-- Table structure for table `END_USERS`
--

CREATE TABLE `END_USERS` (
  `user_id` int(8) NOT NULL,
  `first_name` varchar(16) NOT NULL,
  `last_name` varchar(16) NOT NULL,
  `dob` date NOT NULL,
  `email_id` varchar(32) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` int(1) NOT NULL COMMENT '1=student, 2=parent',
  `account_status` int(1) NOT NULL COMMENT '0=inactive, 1=active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `END_USERS`
--

INSERT INTO `END_USERS` (`user_id`, `first_name`, `last_name`, `dob`, `email_id`, `phone_no`, `password`, `role`, `account_status`) VALUES
(27122186, 'Dean', 'Winchester', '2000-05-01', 'deanwinchester@gmail.com', '6549870321', '!deanwinchester', 1, 1),
(27516393, 'Test', 'Account', '1999-01-01', 'testaccount@gmail.com', '1234567890', '!testaccount', 1, 1),
(54609142, 'John', 'Wick', '2000-01-01', 'johnwick@gmail.com', '7006178859', '!johnwick', 1, 1),
(66639974, 'Father', 'Wick', '1990-01-01', 'fatherwick@gmail.com', '1000000002', '!fatherwick', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `EXPERT`
--

CREATE TABLE `EXPERT` (
  `expert_id` int(8) NOT NULL,
  `first_name` varchar(16) NOT NULL,
  `last_name` varchar(16) NOT NULL,
  `dob` date NOT NULL,
  `email_address` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `profession` varchar(32) NOT NULL,
  `experience` varchar(16) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 3,
  `account_status` int(1) NOT NULL COMMENT '0=inactive, 1=active',
  `skype_id` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `EXPERT`
--

INSERT INTO `EXPERT` (`expert_id`, `first_name`, `last_name`, `dob`, `email_address`, `password`, `phone_number`, `profession`, `experience`, `role`, `account_status`, `skype_id`) VALUES
(53372100, 'Sam', 'Winchester', '1990-01-01', 'samwinchester@gmail.com', '!samwinchester', '1231231231', 'Hunter', '15', 3, 0, 'echo123'),
(81572590, 'Paarth', 'Manhas', '1996-04-21', 'paarthmanhas@gmail.com', '!paarth', '7006178859', 'Software Engineer', '10 years', 3, 1, 'live:sharmaabhimanyu409');

-- --------------------------------------------------------

--
-- Table structure for table `QUERIES`
--

CREATE TABLE `QUERIES` (
  `s_no` int(4) NOT NULL,
  `user_id` int(8) NOT NULL,
  `query` varchar(1024) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `skype_name` varchar(32) NOT NULL,
  `query_status` int(1) NOT NULL COMMENT '1=handled, 0=unhandeled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `QUERIES`
--

INSERT INTO `QUERIES` (`s_no`, `user_id`, `query`, `timestamp`, `skype_name`, `query_status`) VALUES
(3, 27122186, 'Another random query from a random person!', '2020-06-09 09:05:20.340365', 'deanwinchester', 0),
(5, 54609142, 'Hello sir, I\'d like to discuss another issue!', '2020-06-09 09:05:50.209625', 'echo123', 0),
(6, 54609142, 'Hello Sir, I\'d like to discuss an issue!', '2020-06-09 09:10:11.000000', 'echo123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `serial_no` int(4) NOT NULL,
  `question` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`serial_no`, `question`) VALUES
(1, 'I do not need others praise'),
(2, 'I love science more than social studies'),
(3, 'I never show up late'),
(4, 'I base important decisions on logic rather than intuition'),
(5, 'I am a risk taker'),
(6, 'It is easier for me to remember faces rather than names.'),
(7, 'I can usually tell what time it is without looking at a watch.'),
(8, 'I could not live in a mess'),
(9, 'I am totally random'),
(10, 'I sometimes act spontaneously without thinking about the consequences of my actions.'),
(11, 'I make a decision on facts,not feelings'),
(12, 'I am more artistic than technical.'),
(13, 'I plan my life logically'),
(14, '. I prefer to pay attention to how people are communicating (non verbal cues), rather than what they are saying.'),
(15, 'I prize logic above all'),
(16, 'I like to rearrange the furniture in my house two or three times a year.'),
(17, 'I am calm even in tense situations'),
(18, 'I easily cry while watching movies'),
(19, 'It bothers me when I cannot make sense of every single situation.'),
(20, 'I prefer team sports rather than individual sports');

-- --------------------------------------------------------

--
-- Table structure for table `RELATIONSHIP`
--

CREATE TABLE `RELATIONSHIP` (
  `s_no` int(4) NOT NULL,
  `parent_id` int(8) NOT NULL,
  `student_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `RELATIONSHIP`
--

INSERT INTO `RELATIONSHIP` (`s_no`, `parent_id`, `student_id`) VALUES
(10, 66639974, 27122186),
(11, 66639974, 54609142);

-- --------------------------------------------------------

--
-- Table structure for table `REPORT`
--

CREATE TABLE `REPORT` (
  `user_id` int(8) NOT NULL,
  `personality` varchar(16) NOT NULL,
  `remarks` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `REPORT`
--

INSERT INTO `REPORT` (`user_id`, `personality`, `remarks`) VALUES
(54609142, 'left', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BIOS`
--
ALTER TABLE `BIOS`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `END_USERS`
--
ALTER TABLE `END_USERS`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `EXPERT`
--
ALTER TABLE `EXPERT`
  ADD PRIMARY KEY (`expert_id`),
  ADD UNIQUE KEY `email_address` (`email_address`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `QUERIES`
--
ALTER TABLE `QUERIES`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `RELATIONSHIP`
--
ALTER TABLE `RELATIONSHIP`
  ADD PRIMARY KEY (`s_no`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `REPORT`
--
ALTER TABLE `REPORT`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `QUERIES`
--
ALTER TABLE `QUERIES`
  MODIFY `s_no` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `serial_no` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `RELATIONSHIP`
--
ALTER TABLE `RELATIONSHIP`
  MODIFY `s_no` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
