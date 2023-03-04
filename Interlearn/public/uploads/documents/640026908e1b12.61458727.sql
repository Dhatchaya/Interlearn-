-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2023 at 04:55 PM
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
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `emp_ID` int(11) NOT NULL,
  `no_of_classes` int(11) NOT NULL,
  `subject` varchar(55) NOT NULL,
  `slip_no` int(11) NOT NULL,
  `position` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE `accountant` (
  `emp_ID` int(11) NOT NULL,
  `experience` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `Ad_ID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `ad_file` varchar(55) NOT NULL,
  `due_date` date NOT NULL,
  `publish_date` date NOT NULL,
  `emp_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `aid` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `flag` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`aid`, `title`, `content`, `attachment`, `teacher_id`, `date`, `flag`) VALUES
('63f8cbfbabd85', 'Cancellation of classes', 'Please note that tomorrow classes are cancelled.', 'Changes in the Scope.pdf', 2, '2023-02-24 20:08:51', '0'),
('63f8cefb897fa', 'New admissions', 'New admissions for A/L Physics will be posted soon', '', 1, '2023-02-24 20:21:39', '0'),
('63f8d7d5cab7d', 'new quiz', 'Please note that there will be an inclass quiz at 3.00 p.m', 'Flow charts.drawio (1).pdf', 1, '2023-02-24 20:59:25', '0'),
('63fcc2f125ee3', 'New announcement', 'exam postp', 'book.png', 3, '2023-02-27 20:19:21', '0');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_course`
--

CREATE TABLE `announcement_course` (
  `aid` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement_course`
--

INSERT INTO `announcement_course` (`aid`, `course_id`) VALUES
('63f8cbfbabd85', 7),
('63f8cefb897fa', 11),
('63f8d7d5cab7d', 8),
('63fcc2f125ee3', 31);

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `activation_code` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `activated_at` time NOT NULL,
  `activation_expiry` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appply`
--

CREATE TABLE `appply` (
  `activation_code` int(11) NOT NULL,
  `vacancy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conduct`
--

CREATE TABLE `conduct` (
  `subject_code` int(11) NOT NULL,
  `pay_rate` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `emp_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp(),
  `teacher_id` int(11) NOT NULL,
  `course_material` varchar(255) NOT NULL,
  `day` varchar(55) NOT NULL,
  `timefrom` time NOT NULL,
  `timeto` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `subject_id`, `created_date`, `teacher_id`, `course_material`, `day`, `timefrom`, `timeto`) VALUES
(6, '63f7a5710ea7d', '2023-02-23', 1, '', 'Wednesday', '09:00:00', '11:00:00'),
(7, '63f7af43e4d5d', '2023-02-23', 2, '', 'Wednesday', '10:56:00', '11:56:00'),
(8, '63f8434faa2f1', '2023-02-24', 3, '', 'Monday', '16:00:00', '18:00:00'),
(9, '63f8cd188b161', '2023-02-24', 2, '', 'Monday', '14:00:00', '16:00:00'),
(10, '63f8ce53d4140', '2023-02-24', 2, '', 'Friday', '16:00:00', '18:00:00'),
(11, '63f8ce6ed824f', '2023-02-24', 4, '', 'Saturday', '08:00:00', '12:00:00'),
(12, '63f8ce8f317c4', '2023-02-24', 1, '', 'Tuesday', '10:00:00', '12:00:00'),
(14, '63f9ae41dd0d7', '2023-02-25', 3, '', 'Monday', '14:00:00', '16:00:00'),
(15, '63f9ae64c577c', '2023-02-25', 4, '', 'Tuesday', '16:00:00', '18:00:00'),
(16, '63f9b8bd68d6e', '2023-02-25', 4, '', 'Monday', '08:00:00', '12:00:00'),
(26, '63f9e65e9820f', '2023-02-25', 3, '', 'Monday', '10:00:00', '12:00:00'),
(30, '63f9ebaf57723', '2023-02-25', 2, '', 'Monday', '08:00:00', '10:00:00'),
(31, '63fa142d8f18f', '2023-02-25', 2, '', 'Monday', '10:00:00', '12:00:00'),
(32, '63fc24f81c839', '2023-02-27', 2, '', 'Saturday', '08:00:00', '10:00:00'),
(47, '63fcbffd918f9', '2023-02-27', 3, '', 'Wednesday', '08:00:00', '10:00:00'),
(48, '63f8ce8f317c4', '2023-02-27', 1, '', 'Monday', '09:56:00', '11:56:00'),
(49, '63f8ce8f317c4', '2023-02-27', 4, '', 'Wednesday', '08:56:00', '10:56:00'),
(50, '63f8434faa2f1', '2023-02-27', 1, '', 'Tuesday', '08:56:00', '08:56:00'),
(51, '63f9ae41dd0d7', '2023-02-27', 2, '', 'Monday', '08:56:00', '10:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `course_instructor`
--

CREATE TABLE `course_instructor` (
  `course_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_instructor`
--

INSERT INTO `course_instructor` (`course_id`, `instructor_id`) VALUES
(12, 1),
(14, 2),
(15, 1),
(32, 1),
(32, 2);

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
  `uid` int(11) NOT NULL,
  `attachment` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`discussion_id`, `parent_id`, `topic`, `last_replied`, `PostedDate`, `content`, `uid`, `attachment`) VALUES
('63f6fd42a2e20', '69', 'when days are dark', '', '2023-02-23 11:14:34', 'you and me', 3, '63f6fd42a2e31.pdf'),
('63f6fd6b9a522', '63f6fd42a2e20', 'when days are dark', '', '2023-02-23 11:15:15', 'In the middle of the sea', 3, '63f6fd6b9a532.pdf'),
('63f6fdf88dcc9', '69', 'when days are dark', '', '2023-02-23 11:17:36', 'oh nice', 3, '63f6fdf88ddc7.pdf'),
('63f6fe48b6f27', '69', 'when days are dark', '', '2023-02-23 11:18:56', 'what else', 3, '63f6fe48b7004.pdf'),
('63f6fe5fd9682', '63f6fd42a2e20', 'when days are dark', '', '2023-02-23 11:19:19', 'nothing else', 3, '63f6fe5fd9696.pdf'),
('63f6ffbdb6482', '69', 'when days are dark', '', '2023-02-23 11:25:09', '', 3, 'undefined'),
('63f6ffcf90688', '69', 'when days are dark', '', '2023-02-23 11:25:27', '', 3, 'undefined'),
('63f700043e79a', '69', 'when days are dark', '', '2023-02-23 11:26:20', 'let\'s', 3, 'undefined'),
('63f70023d651a', '69', 'when days are dark', '', '2023-02-23 11:26:51', 'see', 3, '63f70023d655d.pdf'),
('63f700e6201e6', '69', 'when days are dark', '', '2023-02-23 11:30:06', 'wee', 3, 'undefined'),
('63f70145ed5a6', '69', 'when days are dark', '', '2023-02-23 11:31:41', 'dr', 3, 'null'),
('63f7017d905aa', '69', 'when days are dark', '', '2023-02-23 11:32:37', 'br', 3, 'null'),
('63f704a7669a9', '71', 'nareash', '', '2023-02-23 11:46:07', 'paithiyame', 3, '63f704a7669bb.pdf'),
('63f704aeeea94', '63f704a7669a9', 'nareash', '', '2023-02-23 11:46:14', 'okayy', 3, 'null'),
('63f73161c561a', '72', 'Test 1', '', '2023-02-23 14:56:57', 'It is a long-established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem Ipsum will uncover many websites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose', 3, '63f73161c5644.pdf'),
('63f73c5ae9602', '72', 'Test 1', '', '2023-02-23 15:43:46', '', 3, 'null');

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
  `user_Id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `reply` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`eid`, `title`, `content`, `type`, `status`, `date`, `user_Id`, `role`, `reply`) VALUES
(162, 'check1', 'check', 'personal', 'pending', '2023-01-31', 3, 'Student', ''),
(195, 'third enq', 'again me', 'suggestion', 'pending', '2023-02-05', 3, 'Student', ''),
(196, 'enq sample', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s w', 'personal', 'escalated', '2023-02-05', 3, 'Student', ''),
(203, 'sample1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s w', 'personal', 'resolved', '2023-02-09', 3, 'Student', ''),
(206, 'enquiry willl be coming soon', 'hey enquiry feature will be coming soon you can send all your issues through that', 'personal', 'pending', '2023-02-12', 3, 'Student', ''),
(207, 'new enquiry', 'new one\r\n', 'personal', 'inprogress', '2023-02-14', 3, 'Student', ''),
(208, 'this sample ', 'I\'m student', 'personal', 'pending', '2023-02-15', 3, 'Student', ''),
(211, 'new maths teacher', 'teacher', 'personal', 'pending', '2023-02-17', 27, 'Teacher', ''),
(212, 'teacher', 'change my class time', 'suggestion', 'pending', '2023-02-17', 27, 'Teacher', ''),
(213, 'another teacher', 'dfsdafd', 'personal', 'pending', '2023-02-17', 27, 'Teacher', ''),
(214, 'asdfdaa', 'dafdad', 'personal', 'pending', '2023-02-17', 27, 'Teacher', '');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_report`
--

CREATE TABLE `exam_report` (
  `exam_id` int(11) NOT NULL,
  `grades` varchar(55) NOT NULL,
  `marks` int(11) NOT NULL,
  `subject` varchar(55) NOT NULL,
  `emo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finance_report`
--

CREATE TABLE `finance_report` (
  `report_no` int(11) NOT NULL,
  `month` varchar(55) NOT NULL,
  `loss` int(11) NOT NULL,
  `date` date NOT NULL,
  `profit` int(11) NOT NULL,
  `total_student_fee` int(11) NOT NULL,
  `salary_payment` int(11) NOT NULL,
  `total_ad_fee` int(11) NOT NULL,
  `emp_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `forum_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `content` mediumtext NOT NULL,
  `course_id` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `creator` varchar(255) NOT NULL,
  `attachment` varchar(512) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`forum_id`, `date`, `content`, `course_id`, `topic`, `creator`, `attachment`, `uid`) VALUES
(56, '2023-02-08', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, yoThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, yoThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, yo', 1, 'Trigger check', 'dhatchaya', '', 3),
(69, '2023-02-23', 'and nights are bright', 1, 'when days are dark', 'P.Dhatchaya', 'P.Dhatchaya63f6fd2283c986.04824657.jpg', 3),
(70, '2023-02-23', 'sdsds', 1, 'dsds', 'P.Dhatchaya', '', 3),
(71, '2023-02-23', 'loosu', 1, 'nareash', 'P.Dhatchaya', '', 3),
(72, '2023-02-23', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release', 1, 'Test 1', 'P.Dhatchaya', 'P.Dhatchaya63f72b1bf2aba6.29821311.pdf', 3);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `nic` varchar(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `mobile_number` int(10) NOT NULL,
  `gender` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_id`, `uid`, `firstname`, `lastname`, `nic`, `address`, `mobile_number`, `gender`) VALUES
(1, 24, 'naraesh', 'prabakaran', '2000154285', 'colombo', 741245856, 'm'),
(2, 25, 'gagana', 'samarasekara', '997093755V', 'kalutara', 748579658, 'f');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `req` int(11) NOT NULL,
  `To_date` date NOT NULL,
  `status` varchar(55) NOT NULL DEFAULT 'Pending',
  `type` varchar(55) NOT NULL,
  `reason` varchar(55) NOT NULL,
  `From_date` date NOT NULL,
  `emp_ID` int(11) NOT NULL,
  `leave_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`req`, `To_date`, `status`, `type`, `reason`, `From_date`, `emp_ID`, `leave_method`) VALUES
(1, '2022-12-17', 'Pending', 'Half day', 'sick', '2022-12-02', 0, 'Sick leave'),
(5, '2022-12-15', 'Pending', 'sick leave', 'fdsafdsa', '2022-12-12', 1002, 'dfsdfs');

-- --------------------------------------------------------

--
-- Table structure for table `leave_details`
--

CREATE TABLE `leave_details` (
  `req` int(11) NOT NULL,
  `To_date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `type` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `From_date` date NOT NULL,
  `emp_ID` int(11) NOT NULL,
  `leave_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_details`
--

INSERT INTO `leave_details` (`req`, `To_date`, `status`, `type`, `reason`, `From_date`, `emp_ID`, `leave_method`) VALUES
(15, '2022-12-23', 'Pending', 'Half day', 'sick', '2022-12-15', 0, 'Sick leave'),
(16, '2022-12-30', 'Pending', 'full day', 'sick for the whole month', '2022-12-01', 0, 'Sick leave'),
(17, '2022-12-30', 'Pending', 'full day', 'sick for the whole month', '2022-12-01', 0, 'Sick leave'),
(18, '2022-12-30', 'Pending', 'full day', 'sick for the whole month', '2022-12-01', 0, 'Sick leave'),
(29, '0000-00-00', 'Pending', 'Half day', '', '2022-12-24', 0, 'Sick leave'),
(30, '0000-00-00', 'Pending', 'Half day', '', '0000-00-00', 0, 'Sick leave'),
(31, '2022-12-09', 'Pending', 'Half day', 'dfa', '2022-12-17', 0, 'Sick leave'),
(32, '2022-12-17', 'Pending', 'Half day', 'sick', '2022-12-15', 0, 'Sick leave');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `non_academic`
--

CREATE TABLE `non_academic` (
  `emp_ID` int(11) NOT NULL,
  `birth_certificate` varchar(55) NOT NULL,
  `address_proof` varchar(55) NOT NULL,
  `position` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `forum_no` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `emp_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `emp_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`emp_id`, `name`) VALUES
(3, 'dp');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `eid` int(11) NOT NULL,
  `repId` int(11) NOT NULL,
  `senderId` int(11) NOT NULL,
  `receiverId` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `reply_user` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`eid`, `repId`, `senderId`, `receiverId`, `content`, `date`, `reply_user`, `status`) VALUES
(162, 31, 3, 3, 'oh thank you 2', '2023-02-06 02:27:52', 'Student', 'replied'),
(208, 84, 26, 3, 'hi student', '2023-02-15 21:31:32', 'Receptionist', '');

-- --------------------------------------------------------

--
-- Table structure for table `salary_slip`
--

CREATE TABLE `salary_slip` (
  `slip_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `full_name` varchar(55) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `paymnet_amount` int(11) NOT NULL,
  `report_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `emp_id` int(11) NOT NULL,
  `NIC_no` int(12) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `enrollment_date` date NOT NULL DEFAULT current_timestamp(),
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `Addressline1` varchar(50) NOT NULL,
  `Addressline2` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `display_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`emp_id`, `NIC_no`, `username`, `password`, `enrollment_date`, `first_name`, `last_name`, `email`, `mobile_no`, `Addressline1`, `Addressline2`, `role`, `display_picture`) VALUES
(1, 2000045896, 'govi', 'govi', '2023-02-09', 'govindani', 'sahasrika', 'govi@gmail.com', 751234578, '2 kurunegala', 'srilanka', 'Receptionist', ''),
(2, 2004587796, 'Gagana', 'gagana', '2023-02-10', 'Gagana', 'samarasekara', 'gagana@gmail.com', 775134578, '2 kurunegala', 'srilanka', 'Teacher', 'teacher.jpg'),
(4, 2004587796, 'Nisaf', 'nisaf', '2023-02-10', 'Nisaf', 'Ahmed', 'nisaf@gmail.com', 775134578, '2 kurunegala', 'srilanka', 'Receptionist', 'receptionist.jpg'),
(5, 2004587796, 'Dhatchaya', 'dhatchaya', '2023-02-10', 'Dhatchaya', 'P', 'dhat@gmail.com', 775134578, '2 kurunegala', 'srilanka', 'Manager', 'manager.jpg'),
(6, 2004587796, 'Pavithra', 'pavithra', '2023-02-10', 'manoj', 'Pavithra', 'pavithra@gmail.com', 775134578, '2 kurunegala', 'srilanka', 'Instructor', 'instructor.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `NIC` int(12) NOT NULL,
  `uid` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile_number` int(10) NOT NULL,
  `address_line1` varchar(20) NOT NULL,
  `address_line2` varchar(20) NOT NULL,
  `address_line3` varchar(20) NOT NULL,
  `school` varchar(20) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `language_medium` varchar(10) NOT NULL,
  `Picture` varchar(255) NOT NULL DEFAULT 'default.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `NIC`, `uid`, `first_name`, `last_name`, `birthday`, `gender`, `email`, `mobile_number`, `address_line1`, `address_line2`, `address_line3`, `school`, `grade`, `language_medium`, `Picture`) VALUES
(185, 2147483647, 3, 'dhatchaya', 'prabakaran', '2022-12-08', 'female', 'dhatu.viv@gmail.com', 774521487, '5th lane', 'nawala', 'colombo', 'gsc', 'AL23', 'english', 'dhatchaya639ab6f4917fc5.30155527.jpeg'),
(187, 2147483647, 24, 'samarasekara', 'gagana', '2022-10-14', 'female', 'dhatchaya2000@gmail.', 774521487, '5th lane', 'nawala', 'colombo', 'devi', 'AL23', 'english', 'gagana639b75cb19ba88.07968063.jpg'),
(188, 2147483647, 25, 'samarasekara', 'gagana', '2022-10-14', 'female', 'dhatchaya2000@gmail.', 774521487, '5th lane', 'nawala', 'colombo', 'devi', 'AL23', 'english', 'gagana639b75e27b17e2.14380416.jpg'),
(189, 2147483647, 26, 'Nisaf ', 'Ahmed', '2022-12-07', 'female', 'dhatchaya2000@gmail.', 774521487, '5th lane', 'nawala', 'colombo', 'joes', 'AL23', 'english', 'nisaf639b9d18f1e042.44618128.png'),
(190, 2147483647, 27, 'Manoj', 'pavithra', '2022-12-21', 'male', 'bgsv321@gmail.com', 764525346, '5th lane', 'nawala', 'colombo', 'gsc', 'AL23', 'english', 'Pavithra639c116e3ca5a9.78453579.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`student_id`, `course_id`) VALUES
(185, 6),
(190, 6);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject`, `grade`, `language_medium`, `description`, `image`) VALUES
('63f7a5710ea7d', 'Mathematics', '8', 'Tamil', '', ''),
('63f7af43e4d5d', 'Mathematics', '8', 'Sinhala', '', ''),
('63f8434faa2f1', 'Science', '7', 'Sinhala', 'This is Science', ''),
('63f8cd188b161', 'History', '8', 'Sinhala', '', ''),
('63f8ce53d4140', 'English', '10', 'English', '', ''),
('63f8ce6ed824f', 'Physics', 'A/L', 'Sinhala', '', ''),
('63f8ce8f317c4', 'Science', '8', 'English', 'This is Science', ''),
('63f9ae41dd0d7', 'Science', '8', 'Sinhala', 'This is Science', ''),
('63f9ae64c577c', 'Science', '8', 'Tamil', 'This is Science', ''),
('63f9b8bd68d6e', 'Physics', 'A/L', 'English', '', ''),
('63f9e65e9820f', 'Mathematics', '8', 'Tamil', '', ''),
('63f9ebaf57723', 'Mathematics', '8', 'English', '', ''),
('63fa142d8f18f', 'History', '8', 'English', '', ''),
('63fc24f81c839', 'Commerce', '10', 'Sinhala', 'This is Commerce', ''),
('63fcbe7328d65', 'Science', '8', 'English', 'This is Science', ''),
('63fcbea599a97', 'Science', '8', 'English', 'This is Science', ''),
('63fcbffd918f9', 'Science', '8', 'English', 'This is Science', '');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `nic` varchar(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `mobile_number` int(10) NOT NULL,
  `gender` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `uid`, `firstname`, `lastname`, `nic`, `address`, `mobile_number`, `gender`) VALUES
(1, 27, 'dhatchaya', 'prabakaran', '997584256V', 'rajagiriya', 715482569, 'f'),
(2, 25, 'gagana', 'samarasekara', '99703755V', 'kaluatara', 705482574, 'f'),
(3, 0, 'nisaf', 'ahamed', '2000157428', 'matara', 758585745, 'm'),
(4, 0, 'manoj', 'pavithra', '997858465V', 'gampaha', 748579658, 'm');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `hall_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `end_time` time NOT NULL,
  `start_time` time NOT NULL,
  `teacher_name` varchar(55) NOT NULL,
  `course_name` varchar(55) NOT NULL,
  `instructor_name` varchar(55) NOT NULL,
  `handled_by` varchar(55) NOT NULL,
  `subject_code` int(11) NOT NULL,
  `emp_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `todo_no` int(11) NOT NULL,
  `subject_name` varchar(55) NOT NULL,
  `task` varchar(55) NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `User_activation_code` varchar(250) NOT NULL,
  `User_email_status` varchar(250) NOT NULL,
  `user_otp` int(12) NOT NULL,
  `user_datetime` date NOT NULL DEFAULT current_timestamp(),
  `role` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `display_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `User_activation_code`, `User_email_status`, `user_otp`, `user_datetime`, `role`, `email`, `display_picture`) VALUES
(3, 'P.Dhatchaya', '$2y$10$Uv68k7sPD5vcACf70Ahk6OcFee.CL7jf.c3ioorpLv3zSjQCRbbue', '38db05fc8629cd714930b1bec2195032', 'verified', 455632, '2023-01-14', 'Student', 'dhatu.viv@gmail.com', 'student.jpg'),
(24, 'Kiara', '$2y$10$GXcqzGAnHkpGGGHi77Cqdu5dR36LEuvQeCCbrw6Bg.fkSje0mYg1W', '16d26ea43d0730e39df2e2d6ca13b935', 'verified', 472862, '2023-02-10', 'Instructor', 'nareash20010150@gmail.com', 'nareash63e61357f17032.42885406.jpg'),
(25, 'Nisaf', '$2y$10$Q4oDT6oZQTC24VkyNiqnj.kClSQ1GMro9fxYGwkDHW5Ap5Iz2ZOpy', '2b5fecb2ebf1dd9936a17ad87361950b', 'verified', 382049, '2023-02-10', 'Manager', 'nisafmoh25@gmail.com', 'manager.jpg'),
(26, 'S.Gagana', '$2y$10$fNI.cUFfdFH3.VLNsvJ3FebR9NBH9tF9RZUg/.RrCK.PDneu7UvtK', 'c67168eb4ca6d5e1ee2979f91956bade', 'verified', 288577, '2023-02-11', 'Receptionist', 'gaganasamarasekara8@gmail.com', 'S.Gagana63e7236bba46a1.38613000.jpg'),
(27, 'M.Pavithra', '$2y$10$ss6pXMf51nCpiv1sDi3ci.CawwLqKFLahutYcouz5onHYqyubZANm', 'd213566dcd2d758807ea156f7c300658', 'verified', 785471, '2023-02-11', 'Teacher', 'mjpavithra6520@gmail.com', 'M.Pavithra63e723c67837f0.07686801.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `vacancy_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(55) NOT NULL,
  `minimum_qualification` varchar(55) NOT NULL,
  `designation` varchar(55) NOT NULL,
  `period` varchar(55) NOT NULL,
  `salary_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`emp_ID`);

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`emp_ID`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`Ad_ID`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `announcement_course`
--
ALTER TABLE `announcement_course`
  ADD PRIMARY KEY (`aid`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`activation_code`);

--
-- Indexes for table `appply`
--
ALTER TABLE `appply`
  ADD PRIMARY KEY (`activation_code`,`vacancy_id`);

--
-- Indexes for table `conduct`
--
ALTER TABLE `conduct`
  ADD PRIMARY KEY (`subject_code`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `course_instructor`
--
ALTER TABLE `course_instructor`
  ADD PRIMARY KEY (`course_id`,`instructor_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`discussion_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `user_Id` (`user_Id`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_no`);

--
-- Indexes for table `exam_report`
--
ALTER TABLE `exam_report`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `finance_report`
--
ALTER TABLE `finance_report`
  ADD PRIMARY KEY (`report_no`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`forum_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`req`),
  ADD UNIQUE KEY `emp_ID` (`emp_ID`);

--
-- Indexes for table `leave_details`
--
ALTER TABLE `leave_details`
  ADD PRIMARY KEY (`req`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`repId`),
  ADD KEY `eid` (`eid`),
  ADD KEY `reply_ibfk_2` (`senderId`),
  ADD KEY `reply_ibfk_4` (`receiverId`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

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
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `forum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `req` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `leave_details`
--
ALTER TABLE `leave_details`
  MODIFY `req` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `repId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `announcement_course`
--
ALTER TABLE `announcement_course`
  ADD CONSTRAINT `announcement_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `announcement_course_ibfk_3` FOREIGN KEY (`aid`) REFERENCES `announcement` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_instructor`
--
ALTER TABLE `course_instructor`
  ADD CONSTRAINT `course_instructor_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_instructor_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`instructor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discussion`
--
ALTER TABLE `discussion`
  ADD CONSTRAINT `discussion_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD CONSTRAINT `enquiry_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `enquiry` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`senderId`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_4` FOREIGN KEY (`receiverId`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `student_course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
