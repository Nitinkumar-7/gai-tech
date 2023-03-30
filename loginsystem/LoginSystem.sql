-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2023 at 11:21 AM
-- Server version: 8.0.32-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LoginSystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `databas`
--

CREATE TABLE `databas` (
  `text_id` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `databas`
--

INSERT INTO `databas` (`text_id`, `content`, `user_id`) VALUES
(148, 'hii this is me ramm', 2),
(149, 'subiting data', 2),
(151, 'hiii this is prateek', 2),
(152, 'hiii this is prateek', 2),
(153, 'hiii this is prateek', 2),
(154, 'hiii this is prateek', 2),
(155, 'hiii this is prateek', 2),
(156, 'hiii this is prateek', 2),
(157, 'hiii this is prateek', 2),
(161, 'hiii this is prateek', 2),
(162, 'hii this is me aayush qqqqq', 2),
(163, '1234567', 2),
(164, 'ertdyguioj', 2),
(165, 'hey its me maya ', 2),
(166, 'rtyguijo', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'nitu', 'ni@gmail.com', 12120),
(2, 'AAYUSH', 'aayush@gmail.com', 123123),
(3, 'vinay', 'vi@gmail.com', 11111),
(4, 'ram', 'ram@gmail.com', 55555),
(6, 'ash', 'a@gmail.com', 123123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `databas`
--
ALTER TABLE `databas`
  ADD PRIMARY KEY (`text_id`),
  ADD KEY `relationship` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `databas`
--
ALTER TABLE `databas`
  MODIFY `text_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `databas`
--
ALTER TABLE `databas`
  ADD CONSTRAINT `relationship` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
