-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 11:30 AM
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
  `aid` varchar(255) DEFAULT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement_course`
--

INSERT INTO `announcement_course` (`aid`, `course_id`) VALUES
(NULL, 103);

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
  `file_size` decimal(10,0) NOT NULL,
  `Nid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `assignment`
--
DELIMITER $$
CREATE TRIGGER `deleteNotification` AFTER DELETE ON `assignment` FOR EACH ROW BEGIN DELETE FROM notification WHERE Nid = old.Nid;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `assignment_files`
--

CREATE TABLE `assignment_files` (
  `fileID` varchar(255) NOT NULL,
  `assignmentId` varchar(255) NOT NULL,
  `filename` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(103, '2023-04-18', '643e11a0845bb', 97, 'Monday', '08:00:00', '10:00:00', 2, 0, 90),
(104, '2023-04-18', '643e439038db5', 98, 'Tuesday', '04:00:00', '06:00:00', 1, 0, 120),
(105, '2023-05-02', '6450d44f3feab', 99, 'Wednesday', '16:00:00', '18:00:00', 1, 0, 100),
(107, '2023-05-02', '6450d4862830a', 100, 'Thursday', '06:00:00', '08:00:00', 1, 0, 50),
(108, '2023-05-02', '6450d46abfcc4', 101, 'Tuesday', '15:00:00', '17:00:00', 1, 0, 50),
(109, '2023-05-03', '64516bd00b499', 97, 'Wednesday', '04:00:00', '06:00:00', 1, 0, 100),
(110, '2023-05-03', '6451fe436faae', 98, 'Wednesday', '16:00:00', '18:00:00', 5, 0, 200),
(111, '2023-05-03', '6451fe8ec15fc', 99, 'Saturday', '09:00:00', '11:00:00', 1, 0, 150),
(112, '2023-05-03', '6451fefddb616', 100, 'Monday', '14:00:00', '16:00:00', 1, 0, 100),
(113, '2023-05-05', '6451fe8ec15fc', 101, 'Tuesday', '15:00:00', '18:00:00', 1, 0, 50),
(115, '2023-05-05', '643e11a0845bb', 97, 'Monday', '04:00:00', '06:00:00', 1, 0, 50);

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
-- Triggers `course_content`
--
DELIMITER $$
CREATE TRIGGER `deleteAssignment` BEFORE DELETE ON `course_content` FOR EACH ROW BEGIN 
if old.type="assignment" THEN DELETE FROM assignment WHERE cid = old.cid;
END IF;
END
$$
DELIMITER ;

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
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `Nid` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `title` varchar(512) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`Nid`, `category`, `title`, `course_id`) VALUES
('645396f1a827c', 'Assignment', 'Hi notification', 103);

--
-- Triggers `notification`
--
DELIMITER $$
CREATE TRIGGER `notification_user` AFTER INSERT ON `notification` FOR EACH ROW BEGIN
    DECLARE userid varchar(255);
    DECLARE noti int;
	DECLARE is_done INT DEFAULT 0;
    DECLARE details_cursor CURSOR FOR
        SELECT uid 
        FROM student 
        INNER JOIN student_course ON student.studentID = student_course.student_id 
        WHERE student_course.course_id=new.course_id;
DECLARE CONTINUE HANDLER FOR NOT found SET is_done=1;
    OPEN details_cursor;

    details_loop:LOOP 
        FETCH details_cursor INTO userid; 
        IF(is_done = 1) THEN 
            LEAVE details_loop; 
        END IF; 
        
        INSERT INTO notify_user (Nid, uid) VALUES (new.Nid, userid);
    END LOOP; 

    CLOSE details_cursor; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `notify_user`
--

CREATE TABLE `notify_user` (
  `Nid` varchar(255) NOT NULL,
  `uid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(84, 2147483647, '2023-05-02', 'Nisaf', 'Ahmed', 789563214, 'Galle', 'Male', 'M6450e55936b5e', '1', '2023-12-28', 'Manager', '2023-05-02'),
(95, 2147483647, '2023-05-05', 'Gagana', 'Samarasekara', 778945231, 'kaluthara', 'Femal', 'R6454b89dedcf4', '1', '2024-07-05', 'Receptionist', '2023-05-05'),
(96, 2147483647, '2023-05-05', 'Dhatchaya', 'Prabakaran', 718945621, 'nawala', 'Femal', 'I6454b95fe6546', '1', '2024-12-05', 'Instructor', '2023-05-05'),
(97, 2147483647, '2023-05-05', 'Manoj', 'pavithra', 789456321, 'kadawatha', 'Male', 'T6454b9e0c1010', '1', '2024-11-05', 'Teacher', '2023-05-05'),
(98, 2147483647, '2023-05-05', 'kiara', 'willson', 2147483647, 'nawala', 'Femal', 'T6454be70d87d1', '1', '2024-06-05', 'Teacher', '2023-05-05'),
(99, 2147483647, '2023-05-05', 'Hector', 'Medina', 789456321, 'colombo 7', 'Male', 'T6454bf3f7dab9', '1', '2024-12-05', 'Teacher', '2023-05-05'),
(100, 2147483647, '2023-05-05', 'Mary', 'Seavey', 796541234, 'jaffna', 'Femal', 'T6454bfa57b825', '1', '2024-12-18', 'Teacher', '2023-05-05'),
(101, 2147483647, '2023-05-05', 'Charlie', 'Musgrove', 712456314, 'gampaha', 'Male', 'T6454c03387305', '1', '2024-11-18', 'Teacher', '2023-05-05'),
(102, 2147483647, '2023-05-05', 'Tracey ', 'Anderson', 712453258, '679 Anthony Avenue', 'Femal', 'I6454c089505cc', '1', '2024-11-19', 'Instructor', '2023-05-05'),
(103, 2147483647, '2023-05-05', 'Stephanie', 'Pickens', 718945631, '4784 Bridge Street', 'Femal', 'I6454c0f3c7e34', '1', '2024-11-20', 'Instructor', '2023-05-05'),
(104, 2147483647, '2023-05-05', 'James', 'Little', 789456321, '4506 Jim Rosa Lane', 'Male', 'I6454c1397c863', '1', '2025-12-20', 'Instructor', '2023-05-05'),
(105, 2147483647, '2023-05-05', 'Hannah ', 'Garcia', 796542314, '3098 Golden Ridge Road', 'Femal', 'I6454c190c5630', '1', '2024-12-20', 'Instructor', '2023-05-05');

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
('6454', 2147483647, 'Ginny', 'stroke', '2000-05-19', 'female', 718956321, '7 negambo road', 'gsc', '6', '6454c2e7dc125', 'Stroke willam', 'Stroke@gmail.com', 774239658),
('6454c64813abc', 0, 'Judith', 'Koon', '2008-05-19', 'female', 718956321, '1067 Goldie LaneShar', 'SBC', '7', '6454c64813abd', 'Roxana Ryan', 'Roxana@gmail.com', 774239658),
('6454c99b58d8f', 0, 'Christopher', 'Hayes', '2009-05-19', 'female', 718956321, '4480 Neuport LaneNor', 'RC', '8', '6454c99b7e23b', 'Peter pan', 'peter@gmail.com', 774239658),
('6454cc63d5208', 2147483647, 'Charles', 'McMorris', '2002-05-19', 'female', 718956321, '771 Wyatt StreetFort', 'SB', '10', '6454cc640c6d0', 'Laura', 'Laura @gmail.com', 774239658);

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
('6454', 103),
('6454c64813abc', 104),
('6454c64813abc', 109),
('6454c99b58d8f', 105),
('6454cc63d5208', 111);

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
('6450d44f3feab', 'Mathematics', '8', 'English', 'This is Mathematics', ''),
('6450d46abfcc4', 'Mathematics', '8', 'Sinhala', 'This is Mathematics', ''),
('6450d4862830a', 'Mathematics', '8', 'Tamil', 'This is Mathematics', ''),
('64516bd00b499', 'Health', '7', 'English', 'This is Health', ''),
('6451fe436faae', 'History', '10', 'Sinhala', 'This is History', ''),
('6451fe8ec15fc', 'Western Music', '10', 'English', 'This covers whole O/L local syllabus of Western Music ', ''),
('6451fefddb616', 'Buddhism', '10', 'Sinhala', 'Full O/L local syllabus will be covered with past papers', '');

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

-- --------------------------------------------------------

--
-- Table structure for table `temp_student`
--

CREATE TABLE `temp_student` (
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
  `studentID` varchar(255) NOT NULL,
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
('6454c2e7dc125', 'Ginny S.', '$2y$10$xOuejUTl1fqhCbOOOjpVaetPqF9V7kVvWoUBG05jytJUT5VGW3AgS', '09d5dd8217193d5687431a86629a01de', 'verified', 324291, '2023-05-05', 'Student', 'dhatchaya@outlook.com', 'Ginny S.6454c2e7dc1434.40593360.jpg'),
('6454c64813abd', 'Judith K.', '$2y$10$osRVBsJQYC40KeLVh9ElZuzTqJqRx0yh1CbJVmgxknZQU1iWWSPl.', 'b7227d32d3cc97a186dcfe0d69261d24', 'verified', 731313, '2023-05-05', 'Student', 'kirkarospe@gufum.com', 'Judith K.6454c64813ae18.97087517.png'),
('6454c99b7e23b', 'christopher H.', '$2y$10$vx8lZG/zdzzfi0m6RpskEejVkNZlJ1jc1FdwA6WqWl/VTjZJANVkq', 'bf443a1b70f6905a6f5aee276fdc8f5b', 'verified', 454570, '2023-05-05', 'Student', 'vadrususti@gufum.com', 'christopher H.6454c99b7e24f3.12473463.jpg'),
('6454cc640c6d0', 'Charles H.', '$2y$10$e6D7fOQ8s2ZU.UVdlopcd.5qScJYP58UFKOZJktBEjreVGO7gdZJ2', '862df77ac6469d309f59f2be4ccdb39a', 'verified', 885709, '2023-05-05', 'Student', 'susposokke@gufum.com', 'Charles H.6454cc640c6ea3.72994418.png'),
('I6454b95fe6546', 'DhatchayaI', '$2y$10$Ek/1yPWOZeZSmgTahvy4mOyqLbYBeOJFCemvOgjqoOCkEXbyu0QXC', 'ca0291fcf9c4e6f2b99c92779a21d876', 'verified', 552161, '2023-05-05', 'Instructor', 'dhatchaya2000@gmail.com', ''),
('I6454c089505cc', 'Tracey I', '$2y$10$BD80OnwvnHa2PSznG5VZwe7qczipIs.C3lkAUytFJH.G0uncEDnn6', '2a08b479d7847acc4f2aec0b6a336680', 'verified', 513480, '2023-05-05', 'Instructor', 'yaspadiltu@gufum.com', ''),
('I6454c0f3c7e34', 'StephanieI', '$2y$10$6vRsqikLaTthi7ovDlzsFON/y0ct1Na440SBrAW2Az2NzU43voun6', 'db2dcf93d9b946c3abc5a5962d5cddcd', 'verified', 588104, '2023-05-05', 'Instructor', 'saknasurke@gufum.com', ''),
('I6454c1397c863', 'JamesI', '$2y$10$z6iCwuhsGXk1I1PiqITImu9mskqfO94rdQ96nQS86lmXk5RQ8011S', '796b6132f1107e44495cc28df23ca48f', 'verified', 585952, '2023-05-05', 'Instructor', 'namludotro@gufum.com', ''),
('I6454c190c5630', 'Hannah I', '$2y$10$jVKWTzx7StYi7CVHyUDXQ.cNQJY25FRSRjp5u3R/1VF59CdLZHYF2', '3aefce7e1e223fc28c0f3bed8c1cccaf', 'verified', 300195, '2023-05-05', 'Instructor', 'remlulilta@gufum.com', ''),
('M6450e55936b5e', 'NisafM', '$2y$10$xjKv59ZSYFAy6JE7KAM1FOwjcqPO4WJ07o92/JQuOidUcPtNLsv0m', '35f86e8b8cc276132d0cdf03f61aa2bd', 'verified', 839763, '2023-05-02', 'Manager', 'nisafmoh25@gmail.com', 'manager.jpg'),
('R6454b89dedcf4', 'GaganaR', '$2y$10$6sbz9qEw55QL1Ppnwl/su.58cB4bXmbsY0g4Qgnk8KgCNC53llR1q', '62166587fb844f76576a15edce1c5b91', 'verified', 929736, '2023-05-05', 'Receptionist', 'gaganasamarasekara8@gmail.com', ''),
('T6454b9e0c1010', 'ManojT', '$2y$10$8kwhdxPlZI/S7E9ObYLo1.ea0O3saeGgle/cNCXTjpHt2QIybb0Pq', '8c89e60825584bbb2c9c25337414f588', 'verified', 974773, '2023-05-05', 'Teacher', 'mjpavithra6520@gmail.com', ''),
('T6454be70d87d1', 'kiaraT', '$2y$10$vYoedWbU9RT9Vkoq8xIDruvwA574vvbiE.lCwNignwCnyqysp67j6', '2607e8e99fc3d36f163b0f13594ad429', 'verified', 857870, '2023-05-05', 'Teacher', 'dartunesta@gufum.com', ''),
('T6454bf3f7dab9', 'HectorT', '$2y$10$aU54C/yA1xu2NJLExCg4F.qxfZ/6cl0pLdFn5wQTFtj.B4G1qFEy.', 'd73827a904272a0873acbdf6e5aa2339', 'verified', 764616, '2023-05-05', 'Teacher', 'legneborke@gufum.com', ''),
('T6454bfa57b825', 'MaryT', '$2y$10$096jnanikxETkHE68DHhIufem4R3r4r3s6bVctU0Zvb.I5Y2yCnaC', 'd82099b5afe2c61dd549ff51d621cc08', 'verified', 959495, '2023-05-05', 'Teacher', 'derkijofyi@gufum.com', ''),
('T6454c03387305', 'CharlieT', '$2y$10$wVQLaYca2P3c234ZgJ6WM..Yc9SklT/nXhUA9XTq.k8nXLm/feICK', '945ffb0448bb3fb77237f6990069573c', 'verified', 368460, '2023-05-05', 'Teacher', 'hekkitatru@gufum.com', '');

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
  ADD KEY `course_id` (`course_id`),
  ADD KEY `aid` (`aid`);

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
  ADD KEY `cid` (`cid`),
  ADD KEY `assignment_ibfk_3` (`Nid`);

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`Nid`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `notify_user`
--
ALTER TABLE `notify_user`
  ADD PRIMARY KEY (`Nid`,`uid`),
  ADD KEY `uid` (`uid`);

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
  ADD PRIMARY KEY (`course_id`,`studentID`) USING BTREE,
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
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

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
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement_course`
--
ALTER TABLE `announcement_course`
  ADD CONSTRAINT `announcement_course_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `announcement` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `course_content` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_ibfk_3` FOREIGN KEY (`Nid`) REFERENCES `notification` (`Nid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `notify_user`
--
ALTER TABLE `notify_user`
  ADD CONSTRAINT `notify_user_ibfk_3` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notify_user_ibfk_4` FOREIGN KEY (`Nid`) REFERENCES `notification` (`Nid`) ON DELETE CASCADE ON UPDATE CASCADE;

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
