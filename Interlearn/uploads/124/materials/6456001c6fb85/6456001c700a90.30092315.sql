-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2023 at 10:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interlearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_url`
--

CREATE TABLE `course_url` (
  `cid` varchar(255) NOT NULL,
  `URL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_url`
--

INSERT INTO `course_url` (`cid`, `URL`) VALUES
('643120194dcc3', 'https://www.youtube.com/'),
('6431258cbc213', 'https://www.google.com/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_url`
--
ALTER TABLE `course_url`
  ADD PRIMARY KEY (`cid`,`URL`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_url`
--
ALTER TABLE `course_url`
  ADD CONSTRAINT `course_url_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `course_content` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
