-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2023 at 10:29 AM
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
-- Database: `google`
--

-- --------------------------------------------------------

--
-- Table structure for table `regist`
--

CREATE TABLE `regist` (
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` int NOT NULL,
  `phone` varchar(20) NOT NULL,
  `occup` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `regist`
--

INSERT INTO `regist` (`id`, `username`, `email`, `pass`, `phone`, `occup`, `city`, `img`, `pin`) VALUES
(1, 'AAYUSH', 'aayush@gmail.com', 12345, '7018026803', 'kakak', 'shamirpur', 'image1.jpg', 176002),
(3, 'MUKESH', 'mukesh@gmail.com', 12345, '7018026803', 'student', 'Chandigarh', 'image1.jpg', 741855),
(6, 'ARUN', 'kk@gmail.com', 55555, '7894561235', 'student', 'trew', 'Lord-Krishna-Images-with-Flute-with-forest-Background.jpg', 789456),
(7, 'NITISH KUMAR', 'nitish@gmail.com', 12345, '7807202241', 'student', 'kangra', 'pexels-edgar-serrano-1964970.jpg', 176002);

-- --------------------------------------------------------

--
-- Table structure for table `simplecsv`
--

CREATE TABLE `simplecsv` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `simplecsv`
--

INSERT INTO `simplecsv` (`id`, `username`, `email`) VALUES
(1, 'John', 'Doe@example.com'),
(2, 'Jane', 'Smith@example.com'),
(3, 'Bob', 'Johnson@example.com'),
(4, 'kana', 'kana@gmail.com'),
(5, 'prashant', 'p@gmail.com'),
(6, 'nancy', 'n@gmail.com'),
(7, 'bandana', 'b@gmail.com'),
(8, 'rajesh g', 'r@gmail.com'),
(9, 'nitin', 'n@gmail.com'),
(10, 'vishal', 'v@gmail.com'),
(11, 'akshay', 'a@gmail.com'),
(12, 'aayush', 'aa@gmail.com'),
(13, 'goldy', 'g@gmail.com'),
(14, 'ankit', 'an@gmail.com'),
(15, 'rishav', 'ri@gmail.com'),
(16, 'kavita', 'kn@gmail.com'),
(17, 'sir', 's@gmail.com'),
(18, 'arun', 'ar@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `rollno` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `regist`
--
ALTER TABLE `regist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simplecsv`
--
ALTER TABLE `simplecsv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `regist`
--
ALTER TABLE `regist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `simplecsv`
--
ALTER TABLE `simplecsv`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
