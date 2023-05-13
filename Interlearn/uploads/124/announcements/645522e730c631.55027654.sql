-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 10:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

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
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `aid` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `empID` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`aid`, `title`, `content`, `attachment`, `file_name`, `empID`, `date_time`, `role`) VALUES
('64502383bec3e', 'new annoucement', 'nice', 'http://localhost/Interlearn/uploads/receptionist/announcements/64502383bec3e/64502383bec535.90023521.png', '', 62, '2023-05-01 20:39:31', 'Receptionist'),
('6450264562fcf', 'dfasd', 'dafafsa', 'http://localhost/Interlearn/uploads/receptionist/announcements/6450264562fcf/6450264562fe19.98965623.png', '', 62, '2023-05-01 20:51:17', 'Receptionist'),
('645026875facb', 'last time', 'okat', 'http://localhost/Interlearn/uploads/receptionist/announcements/645026875facb/645026875fad97.42285504.png', '', 62, '2023-05-01 20:52:23', 'Receptionist'),
('64502729a2e02', 'dfad', 'dfada', 'http://localhost/Interlearn/uploads/receptionist/announcements/64502729a2e02/64502729a2e0c8.17746085.png', '', 62, '2023-05-01 20:55:05', 'Receptionist');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_course`
--

CREATE TABLE `announcement_course` (
  `aid` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `announcement_files`
--

CREATE TABLE `announcement_files` (
  `file_id` varchar(255) NOT NULL,
  `aid` varchar(255) NOT NULL,
  `file_name_new` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignmentId` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `courseId` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `deadline` timestamp NULL DEFAULT NULL,
  `acceptDate` timestamp NULL DEFAULT NULL,
  `edit_URL` varchar(1024) NOT NULL,
  `view_URL` varchar(1024) NOT NULL,
  `cid` varchar(255) NOT NULL,
  `file_size` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignmentId`, `title`, `courseId`, `description`, `deadline`, `acceptDate`, `edit_URL`, `view_URL`, `cid`, `file_size`) VALUES
('smithT643e6beab2b531.33998294', 'Chemistry assignment', 104, ' chemistry laboratory ', '2023-04-29 10:07:00', '2023-04-19 10:07:00', 'http://localhost/Interlearn/public/teacher/course/assignment/104/1/view?id=smithT643e6beab2b531.33998294', 'http://localhost/Interlearn/public/teacher/course/submissions/104/1/?id=smithT643e6beab2b531.33998294', '643e6beab3fd2', '0');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_files`
--

CREATE TABLE `assignment_files` (
  `fileID` varchar(255) NOT NULL,
  `assignmentId` varchar(255) NOT NULL,
  `filename` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment_files`
--

INSERT INTO `assignment_files` (`fileID`, `assignmentId`, `filename`) VALUES
('643e6beab3f57', 'smithT643e6beab2b531.33998294', 'smithT643e6beab2bba6.79629961.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `bank_payment`
--

CREATE TABLE `bank_payment` (
  `NameOnSlip` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `PayerNIC` int(11) NOT NULL,
  `SlipImage` blob NOT NULL,
  `PaymentDate` date NOT NULL,
  `Amount` int(11) NOT NULL,
  `Bank` varchar(255) NOT NULL,
  `Branch` varchar(255) NOT NULL,
  `ChequeNo` int(11) NOT NULL,
  `BankPaymentID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `UploadedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `StudentID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_payment`
--

INSERT INTO `bank_payment` (`NameOnSlip`, `Address`, `CourseID`, `PayerNIC`, `SlipImage`, `PaymentDate`, `Amount`, `Bank`, `Branch`, `ChequeNo`, `BankPaymentID`, `status`, `UploadedDate`, `StudentID`) VALUES
('', 'Kadawatha', 0, 990331472, 0x6f6c5f6963745f706173745f70617065725f323031385f656e676c6973682e706466, '2023-02-28', 50000, '', 'Colombo', 0, 1, 0, '2023-02-27 14:48:52', ''),
('', 'Kadawatha', 0, 990331472, 0x6f6c5f6963745f706173745f70617065725f323031385f656e676c6973682e706466, '2023-02-28', 50000, '', 'Colombo', 0, 2, 0, '2023-02-27 14:50:09', ''),
('', 'Kadawatha', 0, 990331472, 0x6f6c5f6963745f706173745f70617065725f323031385f656e676c6973682e706466, '2023-02-28', 50000, '', 'Colombo', 0, 3, 0, '2023-02-27 14:51:50', ''),
('', 'Kirillawala', 0, 9912367, '', '2023-03-24', 0, '', 'Gampaha', 2147483647, 4, 0, '2023-03-01 09:52:47', ''),
('', 'Kirillawala', 0, 9912367, '', '2023-03-24', 0, '', 'Gampaha', 2147483647, 5, 0, '2023-03-01 09:55:35', ''),
('', 'Kirillawala', 0, 9912367, '', '2023-03-24', 0, '', 'Gampaha', 2147483647, 6, 0, '2023-03-01 10:14:42', ''),
('', 'Kirillawala', 0, 9912367, '', '2023-03-24', 0, '', 'Gampaha', 2147483647, 7, 0, '2023-03-01 10:15:31', ''),
('', 'Kirillawala', 0, 2147483647, '', '2023-03-24', 0, '', 'Gampaha', 2147483647, 8, 0, '2023-03-01 11:27:25', ''),
('', 'Nawala', 0, 646615, 0x6f6c5f6963745f706173745f70617065725f323031385f656e676c6973682e706466, '2023-03-16', 0, '', 'Colombo', 2147483647, 9, 0, '2023-03-02 04:55:06', '');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp(),
  `subject_Id` varchar(255) NOT NULL,
  `teacher_ID` int(11) NOT NULL,
  `day` varchar(55) NOT NULL,
  `timefrom` time NOT NULL,
  `timeto` time NOT NULL,
  `No_Of_Weeks` int(11) NOT NULL DEFAULT 1,
  `monthlyFee` int(11) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `created_date`, `subject_Id`, `teacher_ID`, `day`, `timefrom`, `timeto`, `No_Of_Weeks`, `monthlyFee`, `capacity`) VALUES
(103, '2023-04-18', '643e11a0845bb', 60, 'Monday', '08:00:00', '10:00:00', 2, 0, 90),
(104, '2023-04-18', '643e439038db5', 60, 'Tuesday', '04:00:00', '06:00:00', 1, 0, 120);

-- --------------------------------------------------------

--
-- Table structure for table `course_content`
--

CREATE TABLE `course_content` (
  `cid` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `course_id` int(11) NOT NULL,
  `week_no` int(11) NOT NULL,
  `upload_name` varchar(255) NOT NULL,
  `view_URL` varchar(255) NOT NULL,
  `edit_URL` varchar(255) NOT NULL,
  `delete_URL` varchar(255) NOT NULL,
  `studentView_URL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_content`
--

INSERT INTO `course_content` (`cid`, `type`, `course_id`, `week_no`, `upload_name`, `view_URL`, `edit_URL`, `delete_URL`, `studentView_URL`) VALUES
('643e44f4f1eeb', 'forum', 104, 1, 'Biodiversity', 'http://localhost/Interlearn/public/forums/104/1/?main=F643e44f4f0d2a6.58341836', '#', '', ''),
('643e64e6df023', 'material', 103, 1, 'probability', 'http://localhost/Interlearn/uploads/103/materials/643e64e6df023/643e64e6df02d3.19520218.pdf', '', '', ''),
('643e6beab3fd2', 'assignment', 104, 1, 'Chemistry assignment', 'http://localhost/Interlearn/public/teacher/course/submissions/104/1/?id=smithT643e6beab2b531.33998294', 'http://localhost/Interlearn/public/teacher/course/assignment/104/1/view?id=smithT643e6beab2b531.33998294', 'http://localhost/Interlearn/public/teacher/course/assignment/104/1/delete?id=smithT643e6beab2b531.33998294', ''),
('643ee08d0770c', 'forum', 104, 1, 'Forum 2', 'http://localhost/Interlearn/public/forums/104/1/?main=F643ee08d01ac03.71133477', '#', '', ''),
('643ee0d0e06a4', 'forum', 104, 1, 'check delete forum', 'http://localhost/Interlearn/public/forums/104/1/?main=F643ee0d0ded752.49090675', '#', '', ''),
('643ee10fce582', 'forum', 104, 1, 'check delete forum  2', 'http://localhost/Interlearn/public/forums/104/1/?main=F643ee10fcd68f7.44432584', '#', 'http://localhost/Interlearn/public/forums/deleteMain?id=F643ee10fcd68f7.44432584', ''),
('643ee2b12fd42', 'forum', 104, 1, 'Discrete mathematics', 'http://localhost/Interlearn/public/forums/104/1/?main=F643ee2b12bcc28.88936552', '#', 'http://localhost/Interlearn/public/forums/deleteMain?id=F643ee2b12bcc28.88936552', ''),
('644a315f099e9', 'forum', 104, 1, 'french assignment', 'http://localhost/Interlearn/public/forums/104/1/?main=F644a315f099de9.15830989', '#', 'http://localhost/Interlearn/public/forums/deleteMain?id=F644a315f099de9.15830989', ''),
('64503a2f95be1', 'forum', 103, 1, 'Hey my first forum', 'http://localhost/Interlearn/public/forums/103/1/?main=F64503a2f95ac33.49642093', '#', 'http://localhost/Interlearn/public/forums/deleteMain?id=F64503a2f95ac33.49642093', '');

-- --------------------------------------------------------

--
-- Table structure for table `course_instructor`
--

CREATE TABLE `course_instructor` (
  `course_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_material`
--

CREATE TABLE `course_material` (
  `file_id` int(11) NOT NULL,
  `course_material` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `downloads` int(11) NOT NULL,
  `cid` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_material`
--

INSERT INTO `course_material` (`file_id`, `course_material`, `size`, `downloads`, `cid`, `file_type`) VALUES
(2147483647, '643e64e6df02d3.19520218.pdf', '1669614', 0, '643e64e6df023', 'application/pdf');

-- --------------------------------------------------------

--
-- Table structure for table `course_url`
--

CREATE TABLE `course_url` (
  `cid` varchar(255) NOT NULL,
  `URL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_url`
--

INSERT INTO `course_url` (`cid`, `URL`) VALUES
('643120194dcc3', 'https://www.youtube.com/'),
('6431258cbc213', 'https://www.google.com/');

-- --------------------------------------------------------

--
-- Table structure for table `course_week`
--

CREATE TABLE `course_week` (
  `course_id` int(11) NOT NULL,
  `week_no` int(11) NOT NULL,
  `week_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_week`
--

INSERT INTO `course_week` (`course_id`, `week_no`, `week_name`) VALUES
(103, 1, 'Week 1'),
(103, 2, 'Week 2'),
(104, 1, 'Week 1');

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `discussion_id` varchar(255) NOT NULL,
  `parent_id` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `last_replied` varchar(200) NOT NULL,
  `PostedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `content` mediumtext NOT NULL,
  `uid` varchar(255) NOT NULL,
  `attachment` varchar(512) NOT NULL,
  `forum_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`discussion_id`, `parent_id`, `topic`, `last_replied`, `PostedDate`, `content`, `uid`, `attachment`, `forum_id`) VALUES
('6439584bd7b08', '', 'Biodiversity of plants', '', '2023-04-14 19:12:35', 'Hydrophytes: The plants growing near water or submerged under water are called hydrophytes. ...\nHygrophytes: ADVERTISEMENTS: ...\nHalophytes: These plants grow in saline soil or saline water. ...\nMesophytes: ADVERTISEMENTS: ...\nXerophytes: ...\nEpiphytes: ...\nParasitic plants: ...\nHerbs (Herbaceous):', '6437913aa03a6', '', 8),
('643a7b2b903f1', '10', 'check actions', '', '2023-04-15 15:53:39', 'heyy you mee', '6437913aa03a6', '', 10),
('643a7d0627c8c', '643a7b2b903f1', 'check actions', '', '2023-04-15 16:01:34', 'checking attachment', '6437913aa03a6', '', 10),
('643a7dcb67cc3', '643a7d0627c8c', 'check actions', '', '2023-04-15 16:04:51', 'me second ', '6437913aa03a6', '', 10),
('643a7ddd6f4d3', '10', 'check actions', '', '2023-04-15 16:05:09', 'am I ', '26', '', 10),
('643a7e210eaf4', '643a7dcb67cc3', 'check actions', '', '2023-04-15 16:06:17', 'but not me', '6437913aa03a6', '', 10),
('643a8238e960f', '643a7d0627c8c', 'check actions', '', '2023-04-15 16:23:44', 'meee here', '6437913aa03a6', '', 10),
('643a82db7a7cb', '643a7ddd6f4d3', 'check actions', '', '2023-04-15 16:26:27', 'but if I reply', '6437913aa03a6', '', 10),
('643b0a2802706', '16', 'when days are d', '', '2023-04-16 02:03:44', 'second', '6437913aa03a6', '643b0a51dcd14.jpg', 16),
('643d28819899c', '18', 'heyyloooo', '', '2023-04-17 16:37:45', 'Thank you', '6437913aa03a6', '', 18),
('643d289e77bbc', '18', 'heyyloooo', '', '2023-04-17 16:38:14', 'dfafda', '6437913aa03a6', '643d289e77bcb.jpg', 18),
('643d28b330096', '18', 'heyyloooo', '', '2023-04-17 16:38:35', 'again', '6437913aa03a6', '', 18),
('643d2e0f3ed4e', '18', 'heyyloooo', '', '2023-04-17 17:01:27', 'dfad', '6437913aa03a6', '643d2e0f3ed5d.jpg', 18),
('643e1b32dd8a7', '19', 'Addition of Numbers', '', '2023-04-18 09:53:14', '', 'T643d5bba29e95', '', 19),
('643e2bbb0b538', '19', 'Addition of Numbers', '', '2023-04-18 11:03:47', 'fgdsdfgd', 'T643d5bba29e95', '643e2bbb0b544.png', 19),
('643e2ea675cfc', '643e2bbb0b538', 'Addition of Numbers', '', '2023-04-18 11:16:14', '', 'T643d5bba29e95', '', 19),
('643e2fc664829', '19', 'Addition of Numbers', '', '2023-04-18 11:21:02', '', 'T643d5bba29e95', '', 19),
('643e3084395ac', '19', 'Addition of Numbers', '', '2023-04-18 11:24:12', '', 'T643d5bba29e95', '', 19),
('643e309500938', '19', 'Addition of Numbers', '', '2023-04-18 11:24:29', 'dfadfa', 'T643d5bba29e95', '', 19),
('643e31409c065', '19', 'Addition of Numbers', '', '2023-04-18 11:27:20', '', 'T643d5bba29e95', '', 19),
('643e32946dcc8', '19', 'Addition of Numbers', '', '2023-04-18 11:33:00', 'qw', 'T643d5bba29e95', '', 19),
('643e341b904e0', '19', 'Addition of Numbers', '', '2023-04-18 11:39:31', '', 'T643d5bba29e95', '', 19),
('643e34fe157fe', '19', 'Addition of Numbers', '', '2023-04-18 11:43:18', '', 'T643d5bba29e95', '', 19),
('643e37944a772', '19', 'Addition of Numbers', '', '2023-04-18 11:54:20', '', 'T643d5bba29e95', '', 19),
('643e3dfcbe63b', '19', 'Addition of Numbers', '', '2023-04-18 12:21:40', 'hjkghj', 'T643d5bba29e95', '643e3e1115493.png', 19),
('643e420f55767', '19', 'Addition of Numbers', '', '2023-04-18 12:39:03', 'dfsfdsa', 'T643d5bba29e95', '643e420f5578b.jpg', 19),
('643e459a91c72', '20', 'plant biodiversity', '', '2023-04-18 12:54:10', 'I don\'t know anything about that', '643e13473a6af', '', 20),
('643e5d5c274b7', '20', 'plant biodiversity', '', '2023-04-18 14:35:32', 'zxzxz', 'T643d5bba29e95', '', 20),
('643e5d6506bb1', '20', 'plant biodiversity', '', '2023-04-18 14:35:41', 'fasfdsa', 'T643d5bba29e95', '', 20),
('643e5d70ac982', '20', 'plant biodiversity', '', '2023-04-18 14:35:52', 'dfadsafdsa', 'T643d5bba29e95', '', 20),
('643e5d81bea59', '20', 'plant biodiversity', '', '2023-04-18 14:36:09', 'fddsafdsa', 'T643d5bba29e95', '643e5d81bea64.pdf', 20),
('644beb7b12c8e', '24', 'asasa', '', '2023-04-28 21:21:23', 'fgagfdsz', 'T643d5bba29e95', '', 24);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `eid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(400) NOT NULL,
  `type` varchar(30) NOT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'Pending',
  `date` date NOT NULL DEFAULT current_timestamp(),
  `user_Id` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `reply` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`eid`, `title`, `content`, `type`, `status`, `date`, `user_Id`, `role`, `reply`) VALUES
(223, 'I need to change my schedule', 'please consider the request I sent through email yesterday and change my schedule', 'personal', 'inprogress', '2023-04-17', '6437913aa03a6', 'Teacher', ''),
(226, 'edit ', 'again', 'suggestion', 'escalated', '2023-04-28', 'T643d5bba29e95', 'Teacher', ''),
(228, 'ko;l,;', '63230', 'personal', 'pending', '2023-04-28', '643e13473a6af', 'Student', '');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `forum_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `content` mediumtext NOT NULL,
  `course_id` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `creator` varchar(255) NOT NULL,
  `attachment` varchar(512) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `mainforum_id` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mainforum`
--

CREATE TABLE `mainforum` (
  `course_id` int(11) NOT NULL,
  `mainforum_id` varchar(512) NOT NULL,
  `subject` varchar(1024) NOT NULL,
  `description` mediumtext NOT NULL,
  `cid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mainforum`
--

INSERT INTO `mainforum` (`course_id`, `mainforum_id`, `subject`, `description`, `cid`) VALUES
(103, 'F64503a2f95ac33.49642093', 'Hey my first forum', 'pdsaa', '64503a2f95be1');

--
-- Triggers `mainforum`
--
DELIMITER $$
CREATE TRIGGER `deleteContent` BEFORE DELETE ON `mainforum` FOR EACH ROW DELETE FROM course_content WHERE cid = old.cid
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mychoice`
--

CREATE TABLE `mychoice` (
  `choice1` varchar(255) NOT NULL,
  `choice1_mark` double NOT NULL,
  `choice2` varchar(255) NOT NULL,
  `choice2_mark` double NOT NULL,
  `choice3` varchar(255) NOT NULL,
  `choice3_mark` double NOT NULL,
  `choice4` varchar(255) NOT NULL,
  `choice4_mark` double NOT NULL,
  `question_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mychoice`
--

INSERT INTO `mychoice` (`choice1`, `choice1_mark`, `choice2`, `choice2_mark`, `choice3`, `choice3_mark`, `choice4`, `choice4_mark`, `question_number`) VALUES
('1948', 1, '1954', 0, '2005', 0, '2002', 0, '643e626502a0d');

-- --------------------------------------------------------

--
-- Table structure for table `myexam`
--

CREATE TABLE `myexam` (
  `exam_id` varchar(255) NOT NULL,
  `exam_month` varchar(255) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myexam`
--

INSERT INTO `myexam` (`exam_id`, `exam_month`, `exam_name`, `course_id`) VALUES
('640a62782ab2f', 'september', 'test 1', 12),
('640a635c45433', 'january', 'test - 2', 3),
('641165cdb21ea', 'march', 'Exam 4', 4),
('64116667c289e', 'march', 'Exam 4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `myquestion`
--

CREATE TABLE `myquestion` (
  `question_title` varchar(255) NOT NULL,
  `question_mark` int(11) NOT NULL,
  `question_number` varchar(255) NOT NULL,
  `quiz_bank` int(11) NOT NULL DEFAULT 1,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myquestion`
--

INSERT INTO `myquestion` (`question_title`, `question_mark`, `question_number`, `quiz_bank`, `course_id`) VALUES
('Who is the father of C language?', 10, '643c36f1789ea', 1, 8),
('2+2?', 10, '643c371dbd4f6', 1, 8),
('Which of the following is a stringizing operator?', 10, '643c37dd7daba', 1, 8),
('5+4?', 10, '643d8f22b5321', 1, 8),
('3*3?', 10, '643d90151027f', 2, 8),
('5/5 ?', 10, '643d97d549892', 3, 8),
('When ucsc is established?', 3, '643e626502a0d', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `myquiz`
--

CREATE TABLE `myquiz` (
  `quiz_id` varchar(255) NOT NULL,
  `quiz_name` varchar(255) NOT NULL,
  `quiz_description` varchar(255) NOT NULL,
  `display_question` int(11) NOT NULL,
  `total_points` int(11) NOT NULL,
  `quiz_date` date NOT NULL,
  `enable_time` time NOT NULL,
  `disable_time` time NOT NULL,
  `duration` int(2) NOT NULL,
  `format_time` varchar(255) NOT NULL,
  `quiz_bank` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myquiz`
--

INSERT INTO `myquiz` (`quiz_id`, `quiz_name`, `quiz_description`, `display_question`, `total_points`, `quiz_date`, `enable_time`, `disable_time`, `duration`, `format_time`, `quiz_bank`, `course_id`) VALUES
('643da88fc69f9', 'quiz - 1', 'this is quiz - 1', 2, 100, '0000-00-00', '05:43:00', '07:44:00', 20, 'minutes', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `myquiz_myquestion`
--

CREATE TABLE `myquiz_myquestion` (
  `qq_id` int(11) NOT NULL,
  `question_number` varchar(255) NOT NULL,
  `quiz_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `myresult`
--

CREATE TABLE `myresult` (
  `id` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `exam_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myresult`
--

INSERT INTO `myresult` (`id`, `studentID`, `marks`, `exam_id`) VALUES
(41, 2001, 75, '640a62782ab2f'),
(42, 2002, 35, '640a62782ab2f'),
(43, 2003, 86, '640a62782ab2f'),
(44, 2004, 47, '640a62782ab2f'),
(45, 2001, 75, '640a635c45433'),
(46, 2002, 35, '640a635c45433'),
(47, 2003, 86, '640a635c45433'),
(48, 2004, 47, '640a635c45433'),
(49, 0, 45, '64116667c289e'),
(50, 0, 79, '64116667c289e'),
(51, 0, 99, '64116667c289e');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `studentID` varchar(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `method` varchar(10) NOT NULL,
  `courseID` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `studentName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `studentID`, `month`, `amount`, `method`, `courseID`, `status`, `payment_date`, `studentName`) VALUES
(1, '96786', '', '', 'cash', '94946', 1, '2023-02-27 12:28:00', ''),
(2, '96786', '', '', 'cash', '94946', 1, '2023-02-27 12:29:13', ''),
(3, '65765', '', '', 'cash', 'maths', 1, '2023-02-27 15:17:59', ''),
(4, '65765', '', '', 'cash', 'maths', 1, '2023-02-27 15:18:55', ''),
(5, '65765', '', '', 'cash', 'maths', 1, '2023-02-27 15:22:23', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment_slip`
--

CREATE TABLE `payment_slip` (
  `slip_ID` int(11) NOT NULL,
  `date` date NOT NULL,
  `full_name` varchar(55) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `student_ID` int(11) NOT NULL,
  `report_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `eid` int(11) NOT NULL,
  `repId` int(11) NOT NULL,
  `senderId` varchar(255) NOT NULL,
  `receiverId` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `reply_user` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request_enroll`
--

CREATE TABLE `request_enroll` (
  `request_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `requested_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `emp_id` int(11) NOT NULL,
  `NIC_no` int(12) NOT NULL,
  `enrollment_date` date NOT NULL DEFAULT current_timestamp(),
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `Addressline1` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `emp_status` varchar(10) NOT NULL,
  `contractEndingDate` date DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `ResignedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`emp_id`, `NIC_no`, `enrollment_date`, `first_name`, `last_name`, `mobile_no`, `Addressline1`, `gender`, `uid`, `emp_status`, `contractEndingDate`, `role`, `ResignedDate`) VALUES
(60, 2147483647, '2023-04-17', 'smith', 'johnson', 752145963, '7 lily avenue colombo', 'Male', 'T643d5bba29e95', '2', '2024-04-17', 'Teacher', '2023-04-30'),
(61, 2147483647, '2023-04-17', 'James', 'Michael', 714589632, '5 robert place colombo 5', 'Male', 'I643d5ca250188', '1', '2024-04-17', 'Instructor', '2023-04-17'),
(62, 2147483647, '2023-04-17', 'mary', 'patricia', 789654123, '345 nawala road', 'Femal', '26', '1', '2024-04-17', 'Receptionist', '2023-04-17'),
(69, 2147483647, '2023-04-26', 'izzath', 'yusuf', 718965236, 'borella', 'Male', 'I6448f4c793ef6', '1', '2024-12-26', 'Teacher', '2023-04-26'),
(78, 2147483647, '2023-04-27', 'nareash', 'paithiyam', 718569478, 'negombo', 'Male', 'T6449fa7a51cf0', '1', '2023-04-30', 'Manager', '2023-04-27'),
(82, 2147483647, '2023-05-02', 'Bug ', 'Zero', 714589632, 'nawala', 'Male', 'I645040568267c', '1', '2023-05-28', '', '2023-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` varchar(255) NOT NULL,
  `NIC` int(12) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `mobile_number` int(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `school` varchar(20) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `parent_email` varchar(255) NOT NULL,
  `parent_mobile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `NIC`, `first_name`, `last_name`, `birthday`, `gender`, `mobile_number`, `address`, `school`, `grade`, `uid`, `parent_name`, `parent_email`, `parent_mobile`) VALUES
('2147483647', 2147483647, 'Dhatchaya', 'Prabakaran', '2000-04-02', 'female', 718956321, 'nawala', 'gsc', '6', '643e13473a6af', 'jehanya', 'jeh@gmail.com', 774239658),
('644', 2147483647, 'dhatchaya', 'prabakaran', '2000-04-02', 'female', 711235648, 'nawala', 'gsc', '6', '644a1f1db3e97', 'jehanya', 'j@gmail.com', 778956321);

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `student_id` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`student_id`, `course_id`) VALUES
('2147483647', 103),
('2147483647', 104),
('644', 103);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` varchar(255) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `grade` varchar(4) NOT NULL,
  `language_medium` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject`, `grade`, `language_medium`, `description`, `image`) VALUES
('643e11a0845bb', 'Mathematics', '6', 'English', 'Grade 6 English medium Mathematics class', ''),
('643e439038db5', 'Science', '7', 'English', 'Grade 6 English medium Science class', ''),
('dfasfdsa', 'Maths Grade11', '13', 'English', 'dfads', 'dfad'),
('erewfdsd', 'Maths Grade11', '13', 'English', 'dfads', 'dfad'),
('erewrfa', 'Maths Grade11', '13', 'English', 'dfads', 'dfad'),
('hgfdg', 'Maths Grade11', '13', 'English', 'dfads', 'dfad'),
('popop', 'Maths Grade11', '13', 'English', 'dfads', 'dfad'),
('vfsdsfdf', 'Maths Grade11', '13', 'English', 'dfads', 'dfad'),
('wewew', 'Maths Grade11', '9', 'English', 'dfads', 'dfad'),
('yuyhgch', 'Maths Grade11', '10', 'English', 'dfads', 'dfad');

-- --------------------------------------------------------

--
-- Stand-in structure for view `subjectcoursestaff`
-- (See below for the actual view)
--
CREATE TABLE `subjectcoursestaff` (
`fullname` varchar(101)
,`subject_id` varchar(255)
,`subject` varchar(50)
,`grade` varchar(4)
,`language_medium` varchar(20)
,`course_id` int(11)
,`teacher_ID` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `studentID` varchar(255) NOT NULL,
  `submissionId` varchar(512) NOT NULL,
  `assignmentId` varchar(512) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'No Attempt',
  `file_size` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`studentID`, `submissionId`, `assignmentId`, `modified`, `status`, `file_size`) VALUES
('2147483647', 'Dhatchaya644a4d49813607.79938501', 'smithT643e6beab2b531.33998294', '2023-04-27 10:24:09', 'Submitted', '695440');

-- --------------------------------------------------------

--
-- Table structure for table `submission_files`
--

CREATE TABLE `submission_files` (
  `fileID` varchar(255) NOT NULL,
  `submissionId` varchar(512) NOT NULL,
  `filename` varchar(1024) NOT NULL,
  `filesize` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submission_files`
--

INSERT INTO `submission_files` (`fileID`, `submissionId`, `filename`, `filesize`) VALUES
('644a4d49822f9', 'Dhatchaya644a4d49813607.79938501', 'Dhatchaya644a4d498137c6.87407733.pdf', '625596'),
('644a4d49828f6', 'Dhatchaya644a4d49813607.79938501', 'Dhatchaya644a4d49823086.39693244.pdf', '69844');

-- --------------------------------------------------------

--
-- Table structure for table `temp_student`
--

CREATE TABLE `temp_student` (
  `studentID` int(11) NOT NULL,
  `NIC` int(12) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `mobile_number` int(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `school` varchar(20) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `parent_name` varchar(255) NOT NULL,
  `parent_email` varchar(255) NOT NULL,
  `parent_mobile` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp_student_course`
--

CREATE TABLE `temp_student_course` (
  `studentID` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `User_activation_code` varchar(250) NOT NULL,
  `User_email_status` varchar(250) NOT NULL,
  `user_otp` int(12) NOT NULL,
  `user_datetime` date NOT NULL DEFAULT current_timestamp(),
  `role` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `display_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `User_activation_code`, `User_email_status`, `user_otp`, `user_datetime`, `role`, `email`, `display_picture`) VALUES
('24', 'Kiara', '$2y$10$GXcqzGAnHkpGGGHi77Cqdu5dR36LEuvQeCCbrw6Bg.fkSje0mYg1W', '16d26ea43d0730e39df2e2d6ca13b935', 'verified', 472862, '2022-02-10', 'Instructor', 'nareash20010150@gmail.com', 'nareash63e61357f17032.42885406.jpg'),
('25', 'Nisaf', '$2y$10$Q4oDT6oZQTC24VkyNiqnj.kClSQ1GMro9fxYGwkDHW5Ap5Iz2ZOpy', '2b5fecb2ebf1dd9936a17ad87361950b', 'verified', 382049, '2023-02-10', 'Manager', 'nisafmoh25@gmail.com', 'manager.jpg'),
('26', 'S.Gagana', '$2y$10$fNI.cUFfdFH3.VLNsvJ3FebR9NBH9tF9RZUg/.RrCK.PDneu7UvtK', 'c67168eb4ca6d5e1ee2979f91956bade', 'verified', 288577, '2021-02-11', 'Receptionist', 'gaganasamarasekara8@gmail.com', 'S.Gagana63e7236bba46a1.38613000.jpg'),
('6437913aa03a6', 'gloriya', '$2y$10$q6FG28McTXuRTAJEwZBNX.47tr1wyRJKm6GR135KkhGVzUp5rul0y', '49f08bf0b0a96e88d0cf72a8ff791a51', 'verified', 473220, '2022-02-11', 'Teacher', 'phatchaya@outlook.com', 'gloriya6437913aa03c11.35739442.jpg'),
('643cd215d4532', 'nareash', '$2y$10$SCtn3Yo2iC2XiCZG5hjobODx72oNjm3W75Wf7nmj8ao6/6ibP0gBe', 'b714ce2e30a02b7d2756e82fa4fd0e1d', 'verified', 886611, '2023-04-17', 'Student', 'kareashboss@gmail.com', 'nareash643cd215d454a8.01493961.jpg'),
('643e13473a6af', 'Dhatchaya', '$2y$10$l2OD6.GQxUzyUOtIs6HKA.HxMcY5ZpdKaR1qVFxhwnyLe372.FCfq', '26e401fd492dbe7f7ada7eb15ff871fd', 'verified', 771657, '2023-04-18', 'Student', 'dhatchaya2000@gmail.com', 'Dhatchaya643e13473a6e10.64286522.jpg'),
('644a1f1db3e97', 'dhatchaya', '$2y$10$delmjmdTvwntscpzg5SiKuyrIoB40vylmwjMqLx6IcwyKJdXWoxqC', '5f168723598409cc0fb9bd51dd2e7b5e', 'verified', 641199, '2023-04-27', 'Student', 'datchaya2000@gmail.com', 'dhatchaya644a1f1db3ebc2.23430049.png'),
('I643d5ca250188', 'JamesI', '$2y$10$HQxEq7g3Y/v7lLHFwCGqSOWtnFcu3sZ9p3fes7iMlAVBkbIRvERpq', '', '', 0, '2023-04-17', 'Instructor', 'james@gmail.com', ''),
('I6448f4c793ef6', 'izzathI', '$2y$10$WKTxQBEtiQIwTyYC5buRPeB/z.NKHiHndrlOdZ8h//S5dMLqSb2H2', '', '', 0, '2023-04-26', 'Instructor', 'izzath@gmail.com', ''),
('I645040568267c', 'Bug I', '$2y$10$v27JJuTZLUy9f5KDYTM0J.eoauk5VIpSmhqm1vKCQYgXZkyJoBNgC', 'e0b26dbfeb5d5cf359a1333b76f9ffc7', 'verified', 589082, '2023-05-02', 'Instructor', 'dhatchaya@outlook.com', ''),
('R643d616671316', 'maryR', '$2y$10$TeyBVR0rGtF1YWDq5wgmR.C1cYb.Beu6y/j23U/MR0t71sywxtHz6', '', '', 0, '2023-04-17', 'Receptionist', 'mary@gmail.com', ''),
('T643d5bba29e95', 'smithT', '$2y$10$oOusoNsg/xD.cfptBppZTuEBNuZYDRbkaABRy.ZRPCuGsNSf.lPRy', '', '', 0, '2023-04-17', 'Teacher', 'smith@gmail.com', 'nareash63e61357f17032.42885406.jpg'),
('T6449fa7a51cf0', 'nareashT', '$2y$10$H9P9MO4qu9QfP7b0VMch6.GzBpiHQXerqiFOSr8SdNBW/hQwG11q2', 'e3100ac1cd9c2e94b2433553f73a47c6', 'verified', 949683, '2023-04-27', 'Teacher', 'nareashboss@gmail.com', '');

-- --------------------------------------------------------

--
-- Structure for view `subjectcoursestaff`
--
DROP TABLE IF EXISTS `subjectcoursestaff`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `subjectcoursestaff`  AS SELECT concat(`staff`.`first_name`,' ',`staff`.`last_name`) AS `fullname`, `subject`.`subject_id` AS `subject_id`, `subject`.`subject` AS `subject`, `subject`.`grade` AS `grade`, `subject`.`language_medium` AS `language_medium`, `course`.`course_id` AS `course_id`, `course`.`teacher_ID` AS `teacher_ID` FROM ((`subject` join `course` on(`course`.`subject_Id` = `subject`.`subject_id`)) join `staff` on(`course`.`teacher_ID` = `staff`.`emp_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `teacher_id` (`empID`);

--
-- Indexes for table `announcement_course`
--
ALTER TABLE `announcement_course`
  ADD PRIMARY KEY (`aid`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `announcement_files`
--
ALTER TABLE `announcement_files`
  ADD PRIMARY KEY (`file_id`,`aid`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignmentId`),
  ADD KEY `courseId` (`courseId`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `assignment_files`
--
ALTER TABLE `assignment_files`
  ADD PRIMARY KEY (`fileID`),
  ADD KEY `assignmentId` (`assignmentId`);

--
-- Indexes for table `bank_payment`
--
ALTER TABLE `bank_payment`
  ADD PRIMARY KEY (`BankPaymentID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `subject_Id` (`subject_Id`),
  ADD KEY `teacher_ID` (`teacher_ID`);

--
-- Indexes for table `course_content`
--
ALTER TABLE `course_content`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `course_instructor`
--
ALTER TABLE `course_instructor`
  ADD PRIMARY KEY (`course_id`,`emp_id`),
  ADD KEY `instructor_id` (`emp_id`);

--
-- Indexes for table `course_material`
--
ALTER TABLE `course_material`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `course_url`
--
ALTER TABLE `course_url`
  ADD PRIMARY KEY (`cid`,`URL`);

--
-- Indexes for table `course_week`
--
ALTER TABLE `course_week`
  ADD PRIMARY KEY (`course_id`,`week_no`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`discussion_id`),
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `user_Id` (`user_Id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`forum_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `mainforum_id` (`mainforum_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `mainforum`
--
ALTER TABLE `mainforum`
  ADD PRIMARY KEY (`mainforum_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `mychoice`
--
ALTER TABLE `mychoice`
  ADD KEY `fk_q_c_num` (`question_number`);

--
-- Indexes for table `myexam`
--
ALTER TABLE `myexam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `myquestion`
--
ALTER TABLE `myquestion`
  ADD PRIMARY KEY (`question_number`),
  ADD KEY `fk_course` (`course_id`);

--
-- Indexes for table `myquiz`
--
ALTER TABLE `myquiz`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `fk_course_id_quiz` (`course_id`);

--
-- Indexes for table `myquiz_myquestion`
--
ALTER TABLE `myquiz_myquestion`
  ADD PRIMARY KEY (`qq_id`),
  ADD KEY `fk_qid` (`quiz_id`),
  ADD KEY `fk_qnumber` (`question_number`);

--
-- Indexes for table `myresult`
--
ALTER TABLE `myresult`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_exam_id` (`exam_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD UNIQUE KEY `PaymentID_2` (`PaymentID`),
  ADD KEY `PaymentID` (`PaymentID`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`repId`),
  ADD KEY `eid` (`eid`),
  ADD KEY `receiverId` (`receiverId`),
  ADD KEY `senderId` (`senderId`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`student_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`submissionId`),
  ADD KEY `assignmentId` (`assignmentId`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `submission_files`
--
ALTER TABLE `submission_files`
  ADD PRIMARY KEY (`fileID`),
  ADD KEY `submissionId` (`submissionId`);

--
-- Indexes for table `temp_student`
--
ALTER TABLE `temp_student`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `temp_student_course`
--
ALTER TABLE `temp_student_course`
  ADD PRIMARY KEY (`course_id`,`studentID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_payment`
--
ALTER TABLE `bank_payment`
  MODIFY `BankPaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `course_material`
--
ALTER TABLE `course_material`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `forum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `myquiz_myquestion`
--
ALTER TABLE `myquiz_myquestion`
  MODIFY `qq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `myresult`
--
ALTER TABLE `myresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `repId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `temp_student`
--
ALTER TABLE `temp_student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `course_content` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assignment_files`
--
ALTER TABLE `assignment_files`
  ADD CONSTRAINT `assignment_files_ibfk_1` FOREIGN KEY (`assignmentId`) REFERENCES `assignment` (`assignmentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`teacher_ID`) REFERENCES `staff` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_content`
--
ALTER TABLE `course_content`
  ADD CONSTRAINT `course_content_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_instructor`
--
ALTER TABLE `course_instructor`
  ADD CONSTRAINT `course_instructor_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `staff` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_material`
--
ALTER TABLE `course_material`
  ADD CONSTRAINT `course_material_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `course_content` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_week`
--
ALTER TABLE `course_week`
  ADD CONSTRAINT `course_week_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discussion`
--
ALTER TABLE `discussion`
  ADD CONSTRAINT `discussion_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD CONSTRAINT `enquiry_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forum_ibfk_4` FOREIGN KEY (`mainforum_id`) REFERENCES `mainforum` (`mainforum_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forum_ibfk_5` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mainforum`
--
ALTER TABLE `mainforum`
  ADD CONSTRAINT `mainforum_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mainforum_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `course_content` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mychoice`
--
ALTER TABLE `mychoice`
  ADD CONSTRAINT `mychoice_ibfk_1` FOREIGN KEY (`question_number`) REFERENCES `myquestion` (`question_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `myquiz_myquestion`
--
ALTER TABLE `myquiz_myquestion`
  ADD CONSTRAINT `myquiz_myquestion_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `myquiz` (`quiz_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `myquiz_myquestion_ibfk_2` FOREIGN KEY (`question_number`) REFERENCES `myquestion` (`question_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `myresult`
--
ALTER TABLE `myresult`
  ADD CONSTRAINT `fk_exam_id` FOREIGN KEY (`exam_id`) REFERENCES `myexam` (`exam_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `enquiry` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`receiverId`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_3` FOREIGN KEY (`senderId`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `student_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `student` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submission`
--
ALTER TABLE `submission`
  ADD CONSTRAINT `submission_ibfk_2` FOREIGN KEY (`assignmentId`) REFERENCES `assignment` (`assignmentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submission_ibfk_3` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submission_files`
--
ALTER TABLE `submission_files`
  ADD CONSTRAINT `submission_files_ibfk_1` FOREIGN KEY (`submissionId`) REFERENCES `submission` (`submissionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `temp_student`
--
ALTER TABLE `temp_student`
  ADD CONSTRAINT `temp_student_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `temp_student_course`
--
ALTER TABLE `temp_student_course`
  ADD CONSTRAINT `temp_student_course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `temp_student_course_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `temp_student` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
