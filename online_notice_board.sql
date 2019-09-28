-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2018 at 05:35 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_notice_board`
--

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `sem` text NOT NULL,
  `title` text NOT NULL,
  `sub` text NOT NULL,
  `desc` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `uid`, `sem`, `title`, `sub`, `desc`, `file`, `timestamp`) VALUES
(19, 44, 'III', 'Dnyanu', 'dnyanu kanawade2713@gmial.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Answer-Key-for-IBPS-PO-Prelims-2017-Model-Question-Paper-1.pdf', '2018-11-30 11:42:33'),
(18, 43, 'II', 'BDHSFJHVBD', 'DSHBVJHDSB', 'DS CJHDZMVNOSIZD', 'wrong-number-series-.pdf', '2018-11-29 10:53:40'),
(17, 44, 'IV', 'DHJFBSHVBH', ' HDSBJHVDB', 'SBDJDHS A', 'Shortcuts in Quantitative Aptitude Competitive Exams by Disha Experts.pdf', '2018-11-29 10:52:49'),
(14, 43, 'II', 'fbdshjbjh', 'dshabh', ' djgsah hwb sdhb', 'Answer-Key-for-IBPS-PO-Prelims-2017-Model-Question-Paper-1.pdf', '2018-11-29 10:40:06'),
(15, 44, 'III', 'DNYANU', 'KANWADE', 'DNYANU BHIMA KANAWADE', 'Answer-Key-for-IBPS-PO-Prelims-2017-Model-Question-Paper-1.pdf', '2018-11-29 10:51:46'),
(16, 44, 'III', 'HBHABSS', 'HDBWHJDH', 'HDBQW HDV ', 'Objective General English for Competitive Exams - SSCBankingRlwysCLATNDACDSHotel Mgmt.B.Ed.pdf', '2018-11-29 10:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `results_data`
--

CREATE TABLE `results_data` (
  `rid` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `dept` text NOT NULL,
  `sem` text NOT NULL,
  `rollno` int(255) NOT NULL,
  `sub1` int(255) NOT NULL,
  `sub2` int(255) NOT NULL,
  `sub3` int(255) NOT NULL,
  `sub4` int(255) NOT NULL,
  `sub5` int(255) NOT NULL,
  `sub6` int(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results_data`
--

INSERT INTO `results_data` (`rid`, `uid`, `dept`, `sem`, `rollno`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `total`) VALUES
(1, 43, 'CS', 'I', 547, 31, 25, 32, 36, 47, 35, 206);

-- --------------------------------------------------------

--
-- Table structure for table `sub_list`
--

CREATE TABLE `sub_list` (
  `dept` text NOT NULL,
  `sem` text NOT NULL,
  `subject` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_list`
--

INSERT INTO `sub_list` (`dept`, `sem`, `subject`) VALUES
('CS', 'I', 'Data Structure Using C'),
('CS', 'I', 'Relational Database'),
('CS', 'I', 'Digital System Design And Hardware  '),
('CS', 'I', 'Analog System'),
('CS', 'I', 'Applied Algebra'),
('CS', 'I', 'Numerical Analysis'),
('CS', 'II', 'Object Oriented Concept Using C++'),
('CS', 'II', 'Software Engineering'),
('CS', 'II', 'The 8051 Microcontroller Archietecture, Interfacing And Programming'),
('CS', 'II', 'Communication Principles'),
('CS', 'II', 'Computational Geometry'),
('CS', 'II', 'Operational Research'),
('Physics', 'I', 'Classical Mechanism'),
('Physics', 'I', 'Electronics'),
('Physics', 'I', 'Methematical Methods in Physics'),
('Physics', 'I', 'Atoms And Molecules'),
('Physics', 'I', 'Experimental Techniques in Physics-I'),
('Physics', 'I', 'Physics Lab-I'),
('Physics', 'II', 'Electrodynamics'),
('Physics', 'II', 'Solid State Physics'),
('Physics', 'II', 'Quantum Mechanics'),
('Physics', 'II', 'Lasers'),
('Physics', 'II', 'Experimental Techniques in Physics-II'),
('Physics', 'II', 'Physics Lab-II');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `fname` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `lname` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `father_name` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `mother_name` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `gender` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `mbno` bigint(255) NOT NULL,
  `dept` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `sem` text CHARACTER SET utf32 COLLATE utf32_unicode_ci,
  `rollno` int(255) DEFAULT NULL,
  `teacherid` int(255) DEFAULT NULL,
  `uname` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `usertype` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `fname`, `lname`, `father_name`, `mother_name`, `gender`, `dob`, `email`, `mbno`, `dept`, `sem`, `rollno`, `teacherid`, `uname`, `password`, `usertype`) VALUES
(45, 'Kiran', 'Khile', 'Lakshaman', 'XYX', 'Male', '1996-12-07', 'kirankhile1997@gmail.com', 919130719999, 'CS', 'I', 558, NULL, 'kirankhile1997@gmail.com', '12345', 'Student'),
(35, 'Dnyanu', 'Kanawade', 'Bhima', 'Pramila', 'Male', '1997-11-25', 'dnyanukanawade2713@gmail.com', 917028523665, 'CS', 'I', 547, NULL, 'dnyanukanawade2713@gmail.com', '12345', 'Student'),
(44, 'Amit', 'Kadam', 'Navnath', 'Mirabai', 'Male', '1991-06-06', 'amitkadam100@gmail.com', 919874563210, 'CS', NULL, NULL, 1002, 'amitkadam100@gmail.com', '54321', 'Teacher'),
(43, 'Amol', 'Rahane', 'Eknath', 'Hirabai', 'Male', '1990-12-12', 'amolrahane100@gmail.com', 919876543210, 'CS', NULL, NULL, 1001, 'amolrahane100@gmail.com', '54321', 'Teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results_data`
--
ALTER TABLE `results_data`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `results_data`
--
ALTER TABLE `results_data`
  MODIFY `rid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
