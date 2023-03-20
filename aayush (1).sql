-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2023 at 12:12 PM
-- Server version: 8.0.32-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aayush`
--

-- --------------------------------------------------------

--
-- Table structure for table `avatar`
--

CREATE TABLE `avatar` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `avatar`
--

INSERT INTO `avatar` (`id`, `name`, `img`) VALUES
(1, 'admin', 'water.jpg'),
(2, 'admin', 'water.jpg'),
(3, 'admin', 'water.jpg'),
(4, 'admin', 'water.jpg'),
(5, 'admin', 'water.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `datainfo`
--

CREATE TABLE `datainfo` (
  `id` int NOT NULL,
  `content` varchar(5000) NOT NULL,
  `numm` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `datainfo`
--

INSERT INTO `datainfo` (`id`, `content`, `numm`) VALUES
(2, 'this is aayush this side', 28),
(5, 'I HAVE TO GO SOMEWHERE TODAY', 29),
(6, 'work in Gai tech', 29),
(7, 'THIS IS NOT WORKING ', 29),
(9, 'ATTACK', 29),
(10, 'ATTENTION!', 29),
(11, 'ATTENTION!', 29),
(12, 'hi this is for and only for test purposes', 27),
(15, 'this id ', 29),
(16, 'this id 14', 29),
(17, 'post is this ', 29),
(18, 'give your best', 29),
(19, 'give your best', 29),
(22, 'sfzdxgchjvk', 27),
(26, 'ENTRY NUMBER 26', 27),
(27, 'hi this is aayush', 27),
(28, 'mankotia is my sername ', 28),
(29, 'rxdctfvygbuhnijmokl', 28),
(30, 'fvgbhnj', 28),
(31, 'hi this is vinay', 30),
(32, 'i am 45 year old ', 30),
(33, 'i am 45 year old ', 30),
(34, 'zsdxfguiojp', 30),
(35, 'nitin', 30),
(36, 'vishal', 30),
(37, 'hi ', 31),
(38, 'this is 38th post', 31),
(39, 'very good ', 31);

-- --------------------------------------------------------

--
-- Table structure for table `gmail`
--

CREATE TABLE `gmail` (
  `num` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(130) NOT NULL,
  `pass` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gmail`
--

INSERT INTO `gmail` (`num`, `name`, `email`, `pass`) VALUES
(27, 'TEST', 'test@gmail.com', '11111'),
(28, 'aayush', 'mankotia@gmail.com', '333'),
(29, 'Nitin', 'nitin@gmail.com', '12345'),
(30, 'Vinay', 'v1@gmail.com', '111'),
(31, 'admin333', 'admin333@gmail.com', '333');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int NOT NULL,
  `content` text NOT NULL,
  `num` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `content`, `num`) VALUES
(1, 'dxfgchjb', 5);

-- --------------------------------------------------------

--
-- Table structure for table `new`
--

CREATE TABLE `new` (
  `num` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(130) NOT NULL,
  `pass` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `new`
--

INSERT INTO `new` (`num`, `name`, `email`, `pass`) VALUES
(1, 'aayush', 'admin@gmail.com', 1475),
(2, 'Test', 't@gmail.com', 123),
(3, 'vishal', 'vishal@gmail.com', 555),
(4, 'bashu', 'b@gmail.com', 555),
(5, 'nitin', 'nn@gmail.com', 55555);

-- --------------------------------------------------------

--
-- Table structure for table `reg_form`
--

CREATE TABLE `reg_form` (
  `user_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` int NOT NULL,
  `phone` varchar(30) NOT NULL,
  `occupation` text NOT NULL,
  `city` text NOT NULL,
  `pin_code` int NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reg_form`
--

INSERT INTO `reg_form` (`user_id`, `name`, `email`, `pass`, `phone`, `occupation`, `city`, `pin_code`, `avatar`) VALUES
(1, 'NITIN', 'nitin@gmail.com', 55555, '4589568956', 'TEACHER', 'SHIMLA', 123456, 'vishplogo.png'),
(2, 'SALMAN', 'khan@gmail.com', 55555, '4512585255', 'ACTOR', 'SHIMLA', 176214, 'YALK.jpg'),
(3, 'PANKAJ', 'kar@gmail.com', 55555, '7018614650', 'ACTOR', 'SHIMLA', 125465, 'Scorpion-header.jpg'),
(4, 'PANKAJ', 'pankaj@gmail.com', 55555, '7018614650', 'ACTOR', 'SHIMLA', 125465, 'queenlogo.png'),
(5, 'PANKAJ', 'pant@gmail.com', 55555, '7018614650', 'ACTOR', 'SHIMLA', 125465, 'Whitepawn.jpeg'),
(6, 'TESTER', 'tt@gmail.com', 55555, '4512659856', 'TEACHER', 'SHIMLA', 176214, 'Whiteknight.JPG'),
(7, 'AAYUSH', 'test@gmail.com', 55555, '8018614650', 'ACTOR', 'SHIMLA', 123456, 'ddr.jpg'),
(9, 'AAYUSH', 'aayushmankotiya@gmail.com', 55555, '7018614650', 'student', 'SHIMLA', 123456, '36752489.jpg'),
(12, 'DFGCVHBJN', 'ff@gmail.com', 55555, '4512652365', '', 'SHIMLA', 123456, 'isto.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`first_name`, `last_name`, `gender`, `address`, `email`) VALUES
('Aayush', 'Mankotia', 'male', 'shamirpur', 'aayushmankotiya@gmail.com'),
('nitin', 'kundwal', 'male', 'kangra', 'admin222@gmail.com'),
('nitintggf', 'kundwal', 'male', 'kangra', 'admin222@gmail.com'),
('Aayush', 'Sangal', 'Male', 'shamirpur', 'muesh@gmil.com'),
('', '', '', '', ''),
('Pankaj', 'Thakur', 'Male', 'kangra', 'hdrtserdytfugiu@h'),
('', '', '', '', ''),
('', '', '', '', ''),
('Ajay', 'Devgun', 'male', 'kangra', 'admin212@gmail.com'),
('', '', '', '', ''),
('Vishal', 'Nehria', 'male', 'Dharmshala', 'vishalnehria@gmail.com'),
('Munu', 'Kumar', 'Male', 'Birta', 'anmil@123.gmail.com'),
('Munu', 'Kumar', 'Male', 'Birta', 'anmil@123.gmail.com'),
('Munu', 'Kumar', 'Male', 'Birta', 'anmil@123.gmail.com'),
('Munu', 'Kumar', 'Male', 'Birta', 'anmil@123.gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `gender`, `address`, `email`) VALUES
(1, 'DEMO', 'SINGH', 'male', 'GOA', 'demo@gmail.com'),
(2, 'VINAY', 'SINGH', 'male', 'Agra', 'vinay@gmail.com'),
(3, 'nitin', 'kumar', 'male', 'kangra', 'admin222@gmail.com'),
(13, 'aayush', 'Mankotia', 'male', 'shamirpur', 'admin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datainfo`
--
ALTER TABLE `datainfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `constraint fk` (`numm`);

--
-- Indexes for table `gmail`
--
ALTER TABLE `gmail`
  ADD PRIMARY KEY (`num`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new`
--
ALTER TABLE `new`
  ADD PRIMARY KEY (`num`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `reg_form`
--
ALTER TABLE `reg_form`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `datainfo`
--
ALTER TABLE `datainfo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `gmail`
--
ALTER TABLE `gmail`
  MODIFY `num` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `new`
--
ALTER TABLE `new`
  MODIFY `num` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reg_form`
--
ALTER TABLE `reg_form`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `datainfo`
--
ALTER TABLE `datainfo`
  ADD CONSTRAINT `constraint fk` FOREIGN KEY (`numm`) REFERENCES `gmail` (`num`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
