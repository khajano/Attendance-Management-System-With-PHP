-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2021 at 02:40 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`) VALUES
(1, '@admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_record`
--

CREATE TABLE `attendance_record` (
  `aid` int(50) NOT NULL,
  `sid` int(50) NOT NULL,
  `rollno` int(10) NOT NULL,
  `course` varchar(30) NOT NULL,
  `year` year(4) NOT NULL,
  `sem` int(2) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `attendance_stat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course` varchar(30) NOT NULL,
  `cid` int(10) NOT NULL,
  `delete_stats` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course`, `cid`, `delete_stats`) VALUES
('BCA', 1, 0),
('MCA', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(10) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `User_name` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `year` year(4) NOT NULL,
  `sem_id` int(2) DEFAULT NULL,
  `rollno` int(11) NOT NULL,
  `cid` int(10) DEFAULT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Active_Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `First_Name`, `Last_Name`, `User_name`, `password`, `year`, `sem_id`, `rollno`, `cid`, `contact`, `email`, `Active_Status`) VALUES
(1, 'Sajan', 'Thakuri', '@sajan', '202cb962ac59075b964b07152d234b70', 2075, 4, 20, 1, '9865457946', 'sajansinghthakuri0@gmail.com', 1),
(2, 'Birendra', 'Singh', '@birendra', '81dc9bdb52d04dc20036dbd8313ed055', 2075, 4, 7, 1, '9841928240', 'dhami9115@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sid` varchar(10) NOT NULL,
  `subject` char(50) NOT NULL,
  `cid` int(10) DEFAULT NULL,
  `sem_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sid`, `subject`, `cid`, `sem_id`) VALUES
('CACS 251', 'Operating System', 1, 4),
('CACS 252', 'Numerical Methods', 1, 4),
('CACS 253', 'Software Engineering', 1, 4),
('CACS 254', 'Scripting Language', 1, 4),
('CACS 255', 'Database Management System', 1, 4),
('CAPj256', 'Project I', 1, 4),
('QAE', 'Quality Assurance Engineer', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tid` int(11) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Active_Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tid`, `First_Name`, `Last_Name`, `user_name`, `password`, `contact_number`, `email`, `Active_Status`) VALUES
(1, 'Dhurba', 'Gnawali', '@dhurba', '81dc9bdb52d04dc20036dbd8313ed055', '9851090485', 'mail2dhurba@gmail.com', 1),
(2, 'Sukraj', 'Neyong', '@sukraj', '81dc9bdb52d04dc20036dbd8313ed055', '9841812796', 'sukrajneyong@gmail.com', 1),
(3, 'Prawesh', 'Dhungana', '@prawesh', '81dc9bdb52d04dc20036dbd8313ed055', '9869406901', 'praweshdhungana@gmail.com', 1),
(4, 'Bhagban', 'Thapa', '@bhagban', '81dc9bdb52d04dc20036dbd8313ed055', '9808815150', 'bhagbanthapa@gmail.com', 1),
(5, 'Bhupi', 'Saud', '@bhupi', '81dc9bdb52d04dc20036dbd8313ed055', '9865457946', 'bhupisaud@gmail.com', 1),
(6, 'Teacher', 'Teacher', '@teacher', '81dc9bdb52d04dc20036dbd8313ed055', '9808815150', 'sajansinghthakuri0@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject`
--

CREATE TABLE `teacher_subject` (
  `SN` int(10) NOT NULL,
  `tid` int(11) NOT NULL,
  `sid` varchar(10) NOT NULL,
  `course` varchar(30) NOT NULL,
  `year` year(4) NOT NULL,
  `sem_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_subject`
--

INSERT INTO `teacher_subject` (`SN`, `tid`, `sid`, `course`, `year`, `sem_id`) VALUES
(1, 1, 'CACS 254', 'BCA', 2075, 4),
(2, 2, 'CACS 251', 'BCA', 2075, 4),
(3, 3, 'CACS 252', 'BCA', 2075, 4),
(4, 4, 'CACS 253', 'BCA', 2075, 4),
(5, 5, 'CACS 255', 'BCA', 2075, 4),
(6, 6, 'CAPj256', 'BCA', 2075, 4),
(7, 6, 'QAE', 'MCA', 2075, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD KEY `user_name_2` (`user_name`);

--
-- Indexes for table `attendance_record`
--
ALTER TABLE `attendance_record`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `student_fk` (`sid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`) USING BTREE,
  ADD KEY `std_sem_fk` (`sem_id`) USING BTREE,
  ADD KEY `crs_cid_fk` (`cid`) USING BTREE;

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD PRIMARY KEY (`SN`),
  ADD KEY `teacher_fk` (`tid`),
  ADD KEY `subject_fk` (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance_record`
--
ALTER TABLE `attendance_record`
  MODIFY `aid` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  MODIFY `SN` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance_record`
--
ALTER TABLE `attendance_record`
  ADD CONSTRAINT `student_fk` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `crs_cid_fk` FOREIGN KEY (`cid`) REFERENCES `course` (`cid`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `course` (`cid`);

--
-- Constraints for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD CONSTRAINT `subject_fk` FOREIGN KEY (`sid`) REFERENCES `subjects` (`sid`),
  ADD CONSTRAINT `teacher_fk` FOREIGN KEY (`tid`) REFERENCES `teacher` (`tid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
