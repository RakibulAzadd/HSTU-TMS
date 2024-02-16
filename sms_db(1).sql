-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 11:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(127) NOT NULL,
  `lname` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `fname`, `lname`) VALUES
(1, 'admin', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'admin', 'rakib'),
(2, 'admin@gmail.com', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'rakib', 'azad');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `sender_full_name` varchar(100) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `sender_full_name`, `sender_email`, `message`, `date_time`) VALUES
(4, 'rakib', 'rakib@gmail.com', 'hi', '2024-01-29 12:55:45'),
(5, 'rumi', 'rumi@gmail.com', 'hellow', '2024-01-29 12:56:05'),
(6, 'trisna', 'trisna@gmai.com', 'hi', '2024-01-29 12:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `registrar_office`
--

CREATE TABLE `registrar_office` (
  `r_user_id` int(11) NOT NULL,
  `title_name` varchar(200) NOT NULL,
  `section` varchar(200) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(31) NOT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrar_office`
--

INSERT INTO `registrar_office` (`r_user_id`, `title_name`, `section`, `username`, `password`, `fname`, `email_address`, `phone_number`, `address`) VALUES
(4, 'it officier', 'it cell', 'rakib', '$2y$10$n25PAdEAiXiKMGi41HVlkO7k.KYauFp3Cq8NgJDCMrosQT/pwlcz6', 'Rakibul Azad', 'rakib@gmail.com', '01870166765', 'Dinajpur'),
(12, 'Medical Officer', 'Medical Center', 'rumi', '$2y$10$if7pCl0.jU2HWbB40Lp8iumdq2Avwzh0qaysms7lETNiHEORjCx0y', 'Sefali Akter Rumi', 'rumi@gmail.com', '01798120008', 'Fakirpara'),
(13, 'Deputy Librarian', 'Librarian', 'trisna', '$2y$10$.HxjNJNwdKJxWtVs7tIjf.cqToz6Dqj9jXzjVkKsrm0X7JSzYnaky', 'Trisna Basak', 'trisna@gmail.com', '+8801716407820', 'Balu Bari');

-- --------------------------------------------------------

--
-- Table structure for table `requisition`
--

CREATE TABLE `requisition` (
  `r_id` int(20) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `d_name` varchar(200) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `j_date` varchar(200) NOT NULL,
  `j_start` varchar(200) NOT NULL,
  `j_end` varchar(200) NOT NULL,
  `p_use` varchar(512) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `transport_type` varchar(200) NOT NULL,
  `transport_no` varchar(50) NOT NULL,
  `driver_name` varchar(200) NOT NULL,
  `title_name` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requisition`
--

INSERT INTO `requisition` (`r_id`, `user_name`, `name`, `phone_number`, `d_name`, `f_name`, `email_address`, `j_date`, `j_start`, `j_end`, `p_use`, `destination`, `transport_type`, `transport_no`, `driver_name`, `title_name`, `status`) VALUES
(12, 'rakib', 'Rakibul Azad', '01611580264', 'CSE', 'CSE', 'rakib@gmail.com', '2024-02-21', '3 pm', '4 pm', 'Picnic', 'ramsagor', 'bus', '20', 'Rejaul', 'Assistant Professor ', 'Approved'),
(13, 'rumi', 'Sefali Akter Rumi', '01798120008', 'Medical Center', '', 'rumi@gmail.com', '2024-02-13', '3 pm', '6 pm', 'Medical Purpose', 'Medical College', 'bus', '0', 'Random', 'Medical Officer', 'Declined'),
(14, 'trisna', 'Trisna Basak', '01870166453', 'CSE', 'CSE', 'trisna@gmail.com', '2024-02-29', '4 pm', '8 pm', 'Grand Dinner', 'Daruchini Resturent', 'car', '5', 'Raju', 'Professor', 'Not Approve'),
(15, 'rakib', 'Rakibul Azad', '01870166765', 'it cell', '', 'rakib@gmail.com', '2024-02-27', '3 pm', '4 pm', 'campus', 'Boro math', 'car', '45', 'kjd', 'it officier', 'Not Approve');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `notice1` varchar(1024) NOT NULL,
  `notice2` varchar(1024) NOT NULL,
  `notice3` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `notice1`, `notice2`, `notice3`) VALUES
(1, 'We regret to inform you that the HSTU University Transport  will not be continue today due to unforeseen disturbances. Your safety is our top priority, and we apologize for any inconvenience this may cause. We are actively working to resolve the issues and will keep you updated on the situation. Please consider alternative transportation arrangements for today. We appreciate your understanding and cooperation during this time. For further updates, refer to official communication channels. Thank you', 'In light of the ongoing anti-government strike, HSTU University transport services are temporarily halted for the safety of our students and staff. We advise all members to make alternative transportation arrangements until further notice. Your safety is our top priority. We appreciate your understanding during this challenging time. ', 'Due to an unfortunate road accident, HSTU University transport services are temporarily suspended. We regret any inconvenience caused and are working diligently to resume normal operations as soon as possible. Alternative transportation arrangements are advised during this period. We appreciate your understanding and cooperation.');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(127) NOT NULL,
  `address` varchar(31) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `sid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `username`, `password`, `fname`, `address`, `email_address`, `phone_number`, `sid`) VALUES
(8, 'onti', '$2y$10$l0nj7yNzoYklg434heEfXO37qHWEuMEJpad/QaWC.o2dA09wmc4g6', 'ontioi', 'ghkj', 'onti@gmail.com', '098', '1902029'),
(9, 'rakib', '$2y$10$h9i3Ui.OewguoT7Mi6t3iOjsqB0XZIlQ3MK3cigssWx9KokdQwLxe', 'rakib hasa', 'Narsingdiul', 'rakibulazad@gmail.com', '01993840', '1902028'),
(11, 'simon', '$2y$10$mlYadAsZphF4u3SsG.rX2OeI3nFD24rAD65LE/wN2Dtk47QmuMCOa', 'rakibul azad', '098', 'rakib@gmail.com', '098', '90'),
(12, 'trisna', '$2y$10$jei6R/4TpVStXYAycTjOWO7zJqJOcsUIWMp1CmoRyWxF.jLYSMKEa', 'trisna', 'Dinajpur', 'trisna@gmail.com', '016109877', '1902022'),
(13, 'rumi', '$2y$10$VHSWfvWKUTvhf8qSMbzXN.AYxn6Ngu5aHu2H.XFLQkTZGgkzRcuEW', 'rumi', 'Dinajpur', 'rumi@gmail.com', '980', '19');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(127) NOT NULL,
  `title_name` varchar(200) NOT NULL,
  `d_name` varchar(200) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `address` varchar(31) NOT NULL,
  `phone_number` varchar(31) NOT NULL,
  `email_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `username`, `password`, `fname`, `title_name`, `d_name`, `f_name`, `address`, `phone_number`, `email_address`) VALUES
(5, 'trisna', '$2y$10$PdM5fJlLfkrYtGBOJ8PbruF/lDRjmGHDUDMYKinvnGRSz8ytP.L6O', 'Trisna Basak', 'Professor', 'CSE', 'CSE', 'Dinajpur', '01870166453', 'trisna@gmail.com'),
(18, 'rakib', '$2y$10$uRcf1GLeXultMQpBUMuLwuEkvIlqD/l4Na0jDc4VKhHWpI3Dt1V3q', 'Rakibul Azad', 'Assistant Professor ', 'CSE', 'CSE', 'Dinajpur', '01611580264', 'rakib@gmail.com'),
(19, 'rumi', '$2y$10$v3hcuwh7Niv8G1j73b51l.5v6gxcFKwESab.Gd/KBP4gxppbZ0lNG', 'Sefali Akter Rumi', 'Lecturer', 'EEE', 'CSE', 'Fakirpara', '01798120008', 'rumi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `t_special_campus`
--

CREATE TABLE `t_special_campus` (
  `ID` int(20) NOT NULL,
  `t_name` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `from_d` varchar(200) NOT NULL,
  `to_d` varchar(200) NOT NULL,
  `t_no` varchar(200) NOT NULL,
  `day` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_special_campus`
--

INSERT INTO `t_special_campus` (`ID`, `t_name`, `time`, `from_d`, `to_d`, `t_no`, `day`) VALUES
(4, 'Student', '6.40 am', 'Campus', 'Boro Math', '17', 'Sunday to Thursday'),
(16, 'Student', '7.50 am', 'Campus', 'Boro Math', '4 , 20 , 8', 'Sunday to Thursday'),
(17, 'Teacher', '8.00 am', 'Campus', 'Boro Math', '1,2,3,5,6', 'Sunday to Thursday'),
(18, 'Student', '8.30 am', 'Campus', 'Boro Math', '14 , 17', 'Sunday to Thursday'),
(19, 'Student', '9.00 am', 'Campus', 'Boro Math', '8 , 13 ,14', 'Sunday to Thursday'),
(20, 'Student', '10.00 am', 'Campus', 'Boro Math', '7,14,18,19,20,BRTC-2', 'Sunday to Thursday'),
(21, 'Student', '11.00 am', 'Campus', 'Boro Math', '13,15,BRTC-1', 'Sunday to Thursday'),
(22, 'Student', '12.00 pm', 'Campus', 'Boro Math', '19,20', 'Sunday to Thursday'),
(23, 'Student', '1.00 pm', 'Campus', 'Boro Math', '17,21,BRTC-2', 'Sunday to Thursday'),
(24, 'Female Student', '1.00 pm', 'Campus', 'Boro Math', '18', 'Sunday to Thursday'),
(25, 'Student', '2.00 pm', 'Campus', 'Boro Math', '8,15,BRTC-1', 'Sunday to Thursday'),
(26, 'Student', '3.00 pm', 'Campus', 'Boro Math', '13,18,20', 'Sunday to Thursday'),
(27, 'Teacher', '4.00 pm', 'Campus', 'Boro Math', '1,2,3,5,6', 'Sunday to Thursday'),
(28, 'Staff', '4.00 pm', 'Campus', 'Boro Math', '4,19', 'Sunday to Thursday'),
(29, 'Staff', '4.00 pm', 'Campus', 'Boro Math', '17', 'Sunday to Thursday'),
(30, 'Student', '4.00 pm', 'Campus', 'Boro Math', '14,15,21,BRTC-2', 'Sunday to Thursday'),
(31, 'Female Student', '4.00 pm', 'Campus', 'Boro Math', '8', 'Sunday to Thursday'),
(32, 'Student', '5.00 pm', 'Campus', 'Boro Math', '18,21,BRTC-1', 'Sunday to Thursday'),
(33, 'Teacher', '5.10 pm', 'Campus', 'Boro Math', '2,3,4 ', 'Sunday to Thursday'),
(34, 'Student', '6.00 pm', 'Campus', 'Boro Math', '14,15,BRTC-2', 'Sunday to Thursday'),
(35, 'Student', '7.00 pm', 'Campus', 'Boro Math', '21 , BRTC-1', 'Sunday to Thursday'),
(36, 'General', '8..00 pm', 'Campus', 'BRTC Dipu', 'BRTC-2', 'Sunday to Thursday'),
(37, 'General', '8.30 pm', 'Campus', 'Boro Math', 'BRTC-1', 'Sunday to Thursday'),
(38, 'Teacher & Staff', '9.00 am', 'Campus', 'Boro Math', '5', 'Friday'),
(39, 'Student', '4.00 pm', 'Campus', 'Boro Math', '14,17,18', 'Saturday'),
(40, 'Student', '6.00 pm', 'Campus', 'Boro Math', '19,20', 'Saturday'),
(41, 'Student', '4.00 pm', 'Boro Math', 'Campus', '13,18,20', 'Sunday to Thursday'),
(42, 'Female Student', '6.00 pm', 'Boro Math', 'Campus', '19', 'Sunday to Thursday'),
(43, 'Student', '10.30 am', 'Terminal', 'Campus', '19,14', 'Sunday to Thursday'),
(44, 'student', '4.00 pm', 'Boro Math', 'Campus', '14', 'Friday'),
(45, 'student', '4.00 pm', 'Boro Math', 'Campus', '14', 'Friday'),
(46, 'Student', '7.50 am', 'Boro Math', 'Campus', '17', 'Sunday to Thursday'),
(47, 'Student', '8.20 am', 'Boro Math', 'Campus', 'BRTC-2', 'Sunday to Thursday'),
(48, 'Student', '8.30 am', 'Sui Hari', 'Campus', '13', 'Sunday to Thursday'),
(49, 'Staff', '8.20 am', 'Balu Bari(sahid miner)', 'Campus', '4 , 20', 'Sunday to Thursday'),
(50, 'Staff', '8.15 am', 'Balu Bari(sahid miner)', 'Campus', '8', 'Sunday to Thursday'),
(51, 'Teacher', '8.30 am', 'Boro Math', 'Campus', '1,5,7,2,6,3', 'Sunday to Thursday'),
(52, 'Student', '9.00 am', 'Boro Math', 'Campus', '14,17', 'Sunday to Thursday'),
(53, 'Student', '9.30 am', 'Boro Math', 'Campus', '8,13,19,BRTC-1', 'Sunday to Thursday'),
(54, 'Student', '9.30 am', 'Terminal', 'Campus', '13', 'Sunday to Thursday'),
(55, 'Student', '10.30 am', 'Boro Math', 'Campus', '7,18,20,BRTC-2', 'Sunday to Thursday'),
(56, 'Student', '10.30 am', 'Terminal', 'Campus', '14,19', 'Sunday to Thursday'),
(57, 'Student', '4.00 pm', 'Boro Math', 'Campus', '13,18,20', 'Sunday to Thursday'),
(58, 'General', '6.00 pm', 'Boro Math', 'Campus', '5', 'Sunday to Thursday'),
(59, 'Student', '8.00 pm', 'Boro Math', 'Campus', '21,BRTC-1', 'Sunday to Thursday'),
(60, 'Teacher/Staff', '11.00 am', 'Boro Math', 'Campus', '5', 'Friday'),
(61, 'Staff', '5.00 pm', 'Boro Math', 'Campus', '21', 'Saturday'),
(62, 'Student', '8.00 pm', 'Boro Math', 'Campus', '19,20', 'Saturday'),
(63, 'Student', '7.00 pm', 'Boro Math', 'Campus', '18', 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_bus`
--

CREATE TABLE `upcoming_bus` (
  `id` int(20) NOT NULL,
  `campus_s_bus` varchar(200) NOT NULL,
  `campus_s_time` varchar(200) NOT NULL,
  `town_s_bus` varchar(200) NOT NULL,
  `town_s_time` varchar(200) NOT NULL,
  `campus_t_bus` varchar(200) NOT NULL,
  `campus_t_time` varchar(200) NOT NULL,
  `town_t_bus` varchar(200) NOT NULL,
  `town_t_time` varchar(200) NOT NULL,
  `campus_st_bus` varchar(200) NOT NULL,
  `campus_st_time` varchar(200) NOT NULL,
  `town_st_bus` varchar(200) NOT NULL,
  `town_st_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upcoming_bus`
--

INSERT INTO `upcoming_bus` (`id`, `campus_s_bus`, `campus_s_time`, `town_s_bus`, `town_s_time`, `campus_t_bus`, `campus_t_time`, `town_t_bus`, `town_t_time`, `campus_st_bus`, `campus_st_time`, `town_st_bus`, `town_st_time`) VALUES
(1, '21 , 22', '10.00 pm', '15,16,18', '10 am', '10,12,09', '4 pm', '11,10,12', '9 am', 'no bus', 'no bus', 'no bus', 'no bus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `registrar_office`
--
ALTER TABLE `registrar_office`
  ADD PRIMARY KEY (`r_user_id`);

--
-- Indexes for table `requisition`
--
ALTER TABLE `requisition`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `t_special_campus`
--
ALTER TABLE `t_special_campus`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `upcoming_bus`
--
ALTER TABLE `upcoming_bus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registrar_office`
--
ALTER TABLE `registrar_office`
  MODIFY `r_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `requisition`
--
ALTER TABLE `requisition`
  MODIFY `r_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `t_special_campus`
--
ALTER TABLE `t_special_campus`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `upcoming_bus`
--
ALTER TABLE `upcoming_bus`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
