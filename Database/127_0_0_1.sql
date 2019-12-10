-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 07:45 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `grade_calculator`
--

CREATE TABLE `grade_calculator` (
  `user_id` varchar(20) NOT NULL,
  `course_title` varchar(100) DEFAULT NULL,
  `course_code` varchar(10) DEFAULT NULL,
  `course_unit` varchar(5) DEFAULT NULL,
  `grade_obtained` varchar(3) DEFAULT NULL,
  `course_grade_point` decimal(5,2) AS (`course_unit`) VIRTUAL,
  `student_grade_point` decimal(5,2) NOT NULL,
  `grade_point_obtained` decimal(5,2) AS (`course_unit` * `student_grade_point`) VIRTUAL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade_calculator`
--

INSERT INTO `grade_calculator` (`user_id`, `course_title`, `course_code`, `course_unit`, `grade_obtained`, `student_grade_point`, `created_at`) VALUES
('F/HD/18/3210001', 'Operating System II', 'COM 321', '3', 'A1', '4.00', '2019-12-01 08:51:38'),
('F/HD/18/3210001', 'Database Design II', 'COM 322', '3', 'B1', '3.25', '2019-12-01 08:52:34'),
('F/HD/18/3210001', 'Use Of English III', 'GNS 302', '2', 'A2', '3.50', '2019-12-01 08:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `hnd1fs_a_algebra`
--

CREATE TABLE `hnd1fs_a_algebra` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd1fs_a_algebra`
--

INSERT INTO `hnd1fs_a_algebra` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 35.00, 35.00, 70.00, '2019-12-03 08:44:33'),
(2, 'F/HD/18/3210002', 29.50, 43.00, 72.50, '2019-12-03 08:44:33'),
(3, 'F/HD/18/3210003', 20.80, 59.00, 79.80, '2019-12-03 08:44:33'),
(4, 'F/HD/18/3210004', 25.00, 40.00, 65.00, '2019-12-03 08:44:33'),
(5, 'F/HD/18/3210005', 26.50, 44.00, 70.50, '2019-12-03 08:44:33'),
(6, 'F/HD/18/3210006', 20.00, 36.00, 56.00, '2019-12-03 08:44:33'),
(7, 'F/HD/18/3210007', 30.00, 50.00, 80.00, '2019-12-03 08:44:33'),
(8, 'F/HD/18/3210011', 39.00, 30.00, 69.00, '2019-12-03 08:44:33'),
(9, 'F/HD/18/3210018', 32.00, 48.00, 80.00, '2019-12-03 08:44:33'),
(10, 'F/HD/18/3210021', 35.00, 49.00, 84.00, '2019-12-03 08:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `hnd1fs_a_calculus`
--

CREATE TABLE `hnd1fs_a_calculus` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd1fs_a_calculus`
--

INSERT INTO `hnd1fs_a_calculus` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 35.00, 35.00, 70.00, '2019-12-03 08:47:10'),
(2, 'F/HD/18/3210002', 29.50, 43.00, 72.50, '2019-12-03 08:47:10'),
(3, 'F/HD/18/3210003', 20.80, 59.00, 79.80, '2019-12-03 08:47:10'),
(4, 'F/HD/18/3210004', 25.00, 40.00, 65.00, '2019-12-03 08:47:10'),
(5, 'F/HD/18/3210005', 26.50, 44.00, 70.50, '2019-12-03 08:47:10'),
(6, 'F/HD/18/3210006', 20.00, 36.00, 56.00, '2019-12-03 08:47:10'),
(7, 'F/HD/18/3210007', 30.00, 50.00, 80.00, '2019-12-03 08:47:10'),
(8, 'F/HD/18/3210011', 39.00, 30.00, 69.00, '2019-12-03 08:47:10'),
(9, 'F/HD/18/3210018', 32.00, 48.00, 80.00, '2019-12-03 08:47:10'),
(10, 'F/HD/18/3210021', 35.00, 49.00, 84.00, '2019-12-03 08:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `hnd1fs_c_architecture`
--

CREATE TABLE `hnd1fs_c_architecture` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd1fs_c_architecture`
--

INSERT INTO `hnd1fs_c_architecture` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 30.00, 30.00, 60.00, '2019-12-03 08:46:38'),
(2, 'F/HD/18/3210002', 20.50, 40.00, 60.00, '2019-12-03 08:46:38'),
(3, 'F/HD/18/3210003', 28.80, 50.00, 79.00, '2019-12-03 08:46:38'),
(4, 'F/HD/18/3210004', 32.00, 60.00, 92.00, '2019-12-03 08:46:38'),
(5, 'F/HD/18/3210005', 29.50, 40.00, 70.00, '2019-12-03 08:46:38'),
(6, 'F/HD/18/3210006', 28.00, 56.00, 84.00, '2019-12-03 08:46:38'),
(7, 'F/HD/18/3210007', 34.00, 58.00, 92.00, '2019-12-03 08:46:38'),
(8, 'F/HD/18/3210011', 29.00, 39.00, 68.00, '2019-12-03 08:46:38'),
(9, 'F/HD/18/3210018', 35.00, 38.00, 73.00, '2019-12-03 08:46:38'),
(10, 'F/HD/18/3210021', 39.00, 39.00, 78.00, '2019-12-03 08:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `hnd1fs_d_design`
--

CREATE TABLE `hnd1fs_d_design` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd1fs_d_design`
--

INSERT INTO `hnd1fs_d_design` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 35.00, 35.00, 70.00, '2019-12-03 11:08:54'),
(2, 'F/HD/18/3210002', 29.50, 43.00, 72.50, '2019-12-03 11:08:54'),
(3, 'F/HD/18/3210003', 20.80, 59.00, 79.80, '2019-12-03 11:08:54'),
(4, 'F/HD/18/3210004', 25.00, 40.00, 65.00, '2019-12-03 11:08:54'),
(5, 'F/HD/18/3210005', 26.50, 44.00, 70.50, '2019-12-03 11:08:54'),
(6, 'F/HD/18/3210006', 20.00, 36.00, 56.00, '2019-12-03 11:08:54'),
(7, 'F/HD/18/3210007', 30.00, 50.00, 80.00, '2019-12-03 11:08:54'),
(8, 'F/HD/18/3210011', 39.00, 50.00, 89.00, '2019-12-03 11:08:54'),
(9, 'F/HD/18/3210018', 32.00, 48.00, 80.00, '2019-12-03 11:08:54'),
(10, 'F/HD/18/3210021', 35.00, 49.00, 84.00, '2019-12-03 11:08:54');

-- --------------------------------------------------------

--
-- Stand-in structure for view `hnd1fs_grade`
-- (See below for the actual view)
--
CREATE TABLE `hnd1fs_grade` (
`std_name` varchar(101)
,`matric_no` varchar(30)
,`MTH311` varchar(2)
,`MTH312` varchar(2)
,`COM312` varchar(2)
,`COM314` varchar(2)
,`STA311` varchar(2)
,`COM317` varchar(2)
,`COM311` varchar(2)
,`COM313` varchar(2)
,`GNS301` varchar(2)
,`STA314` varchar(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `hnd1fs_grade_point`
-- (See below for the actual view)
--
CREATE TABLE `hnd1fs_grade_point` (
`std_name` varchar(101)
,`matric_no` varchar(30)
,`MTH311` decimal(3,2)
,`MTH312` decimal(3,2)
,`COM312` decimal(3,2)
,`COM314` decimal(3,2)
,`STA311` decimal(3,2)
,`COM317` decimal(3,2)
,`COM311` decimal(3,2)
,`COM313` decimal(3,2)
,`GNS301` decimal(3,2)
,`STA314` decimal(3,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `hnd1fs_n_methods`
--

CREATE TABLE `hnd1fs_n_methods` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd1fs_n_methods`
--

INSERT INTO `hnd1fs_n_methods` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 35.00, 35.00, 70.00, '2019-12-03 08:45:47'),
(2, 'F/HD/18/3210002', 29.50, 43.00, 72.50, '2019-12-03 08:45:47'),
(3, 'F/HD/18/3210003', 20.80, 59.00, 79.80, '2019-12-03 08:45:47'),
(4, 'F/HD/18/3210004', 25.00, 40.00, 65.00, '2019-12-03 08:45:47'),
(5, 'F/HD/18/3210005', 26.50, 44.00, 70.50, '2019-12-03 08:45:47'),
(6, 'F/HD/18/3210006', 20.00, 36.00, 56.00, '2019-12-03 08:45:47'),
(7, 'F/HD/18/3210007', 30.00, 50.00, 80.00, '2019-12-03 08:45:47'),
(8, 'F/HD/18/3210011', 39.00, 30.00, 69.00, '2019-12-03 08:45:47'),
(9, 'F/HD/18/3210018', 32.00, 48.00, 80.00, '2019-12-03 08:45:47'),
(10, 'F/HD/18/3210021', 35.00, 49.00, 84.00, '2019-12-03 08:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `hnd1fs_o_research`
--

CREATE TABLE `hnd1fs_o_research` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd1fs_o_research`
--

INSERT INTO `hnd1fs_o_research` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 35.00, 35.00, 70.00, '2019-12-03 08:48:49'),
(2, 'F/HD/18/3210002', 29.50, 43.00, 72.50, '2019-12-03 08:48:49'),
(3, 'F/HD/18/3210003', 20.80, 59.00, 79.80, '2019-12-03 08:48:49'),
(4, 'F/HD/18/3210004', 25.00, 40.00, 65.00, '2019-12-03 08:48:49'),
(5, 'F/HD/18/3210005', 26.50, 44.00, 70.50, '2019-12-03 08:48:49'),
(6, 'F/HD/18/3210006', 20.00, 36.00, 56.00, '2019-12-03 08:48:49'),
(7, 'F/HD/18/3210007', 30.00, 50.00, 80.00, '2019-12-03 08:48:49'),
(8, 'F/HD/18/3210011', 39.00, 30.00, 69.00, '2019-12-03 08:48:49'),
(9, 'F/HD/18/3210018', 32.00, 48.00, 80.00, '2019-12-03 08:48:49'),
(10, 'F/HD/18/3210021', 35.00, 49.00, 84.00, '2019-12-03 08:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `hnd1fs_o_system`
--

CREATE TABLE `hnd1fs_o_system` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd1fs_o_system`
--

INSERT INTO `hnd1fs_o_system` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 30.00, 30.00, 60.00, '2019-12-03 08:45:20'),
(2, 'F/HD/18/3210002', 20.50, 40.00, 60.00, '2019-12-03 08:45:20'),
(3, 'F/HD/18/3210003', 28.80, 50.00, 79.00, '2019-12-03 08:45:20'),
(4, 'F/HD/18/3210004', 32.00, 60.00, 92.00, '2019-12-03 08:45:20'),
(5, 'F/HD/18/3210005', 29.50, 40.00, 70.00, '2019-12-03 08:45:20'),
(6, 'F/HD/18/3210006', 28.00, 56.00, 84.00, '2019-12-03 08:45:20'),
(7, 'F/HD/18/3210007', 34.00, 58.00, 92.00, '2019-12-03 08:45:20'),
(8, 'F/HD/18/3210011', 29.00, 39.00, 68.00, '2019-12-03 08:45:20'),
(9, 'F/HD/18/3210018', 35.00, 38.00, 73.00, '2019-12-03 08:45:20'),
(10, 'F/HD/18/3210021', 39.00, 39.00, 78.00, '2019-12-03 08:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `hnd1fs_p_c++`
--

CREATE TABLE `hnd1fs_p_c++` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd1fs_p_c++`
--

INSERT INTO `hnd1fs_p_c++` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 35.00, 35.00, 70.00, '2019-12-03 08:58:46'),
(2, 'F/HD/18/3210002', 29.50, 43.00, 72.50, '2019-12-03 08:58:46'),
(3, 'F/HD/18/3210003', 20.80, 59.00, 79.80, '2019-12-03 08:58:46'),
(4, 'F/HD/18/3210004', 25.00, 40.00, 65.00, '2019-12-03 08:58:46'),
(5, 'F/HD/18/3210005', 26.50, 44.00, 70.50, '2019-12-03 08:58:46'),
(6, 'F/HD/18/3210006', 20.00, 36.00, 56.00, '2019-12-03 08:58:46'),
(7, 'F/HD/18/3210007', 30.00, 50.00, 80.00, '2019-12-03 08:58:46'),
(8, 'F/HD/18/3210011', 39.00, 30.00, 69.00, '2019-12-03 08:58:46'),
(9, 'F/HD/18/3210018', 32.00, 48.00, 80.00, '2019-12-03 08:58:46'),
(10, 'F/HD/18/3210021', 35.00, 49.00, 84.00, '2019-12-03 08:58:46');

-- --------------------------------------------------------

--
-- Stand-in structure for view `hnd1fs_result`
-- (See below for the actual view)
--
CREATE TABLE `hnd1fs_result` (
`matric_no` varchar(30)
,`GNS301` varchar(2)
,`STA311` varchar(2)
,`COM312` varchar(2)
,`COM314` varchar(2)
,`MTH312` varchar(2)
,`STA314` varchar(2)
,`COM313` varchar(2)
,`COM311` varchar(2)
,`COM317` varchar(2)
,`MTH311` varchar(2)
,`WGP` decimal(13,2)
,`GPA` decimal(14,2)
,`REMARK` varchar(12)
);

-- --------------------------------------------------------

--
-- Table structure for table `hnd1fs_s_theory`
--

CREATE TABLE `hnd1fs_s_theory` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd1fs_s_theory`
--

INSERT INTO `hnd1fs_s_theory` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 35.00, 35.00, 70.00, '2019-12-03 08:46:13'),
(2, 'F/HD/18/3210002', 29.50, 43.00, 72.50, '2019-12-03 08:46:13'),
(3, 'F/HD/18/3210003', 20.80, 59.00, 79.80, '2019-12-03 08:46:13'),
(4, 'F/HD/18/3210004', 25.00, 40.00, 65.00, '2019-12-03 08:46:13'),
(5, 'F/HD/18/3210005', 26.50, 44.00, 70.50, '2019-12-03 08:46:13'),
(6, 'F/HD/18/3210006', 20.00, 36.00, 56.00, '2019-12-03 08:46:13'),
(7, 'F/HD/18/3210007', 30.00, 50.00, 80.00, '2019-12-03 08:46:13'),
(8, 'F/HD/18/3210011', 39.00, 30.00, 69.00, '2019-12-03 08:46:13'),
(9, 'F/HD/18/3210018', 32.00, 48.00, 80.00, '2019-12-03 08:46:13'),
(10, 'F/HD/18/3210021', 35.00, 49.00, 84.00, '2019-12-03 08:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `hnd1fs_u_english`
--

CREATE TABLE `hnd1fs_u_english` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd1fs_u_english`
--

INSERT INTO `hnd1fs_u_english` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 35.00, 35.00, 70.00, '2019-12-03 08:48:21'),
(2, 'F/HD/18/3210002', 29.50, 43.00, 72.50, '2019-12-03 08:48:21'),
(3, 'F/HD/18/3210003', 20.80, 59.00, 79.80, '2019-12-03 08:48:21'),
(4, 'F/HD/18/3210004', 25.00, 40.00, 65.00, '2019-12-03 08:48:21'),
(5, 'F/HD/18/3210005', 26.50, 44.00, 70.50, '2019-12-03 08:48:21'),
(6, 'F/HD/18/3210006', 20.00, 36.00, 56.00, '2019-12-03 08:48:21'),
(7, 'F/HD/18/3210007', 30.00, 50.00, 80.00, '2019-12-03 08:48:21'),
(8, 'F/HD/18/3210011', 39.00, 30.00, 69.00, '2019-12-03 08:48:21'),
(9, 'F/HD/18/3210018', 32.00, 48.00, 80.00, '2019-12-03 08:48:21'),
(10, 'F/HD/18/3210021', 35.00, 49.00, 84.00, '2019-12-03 08:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `hnd1ss_a_language`
--

CREATE TABLE `hnd1ss_a_language` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd1ss_a_language`
--

INSERT INTO `hnd1ss_a_language` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 35.00, 32.00, 67.00, '2019-12-03 13:18:45'),
(2, 'F/HD/18/3210002', 29.50, 53.00, 82.50, '2019-12-03 13:18:45'),
(3, 'F/HD/18/3210003', 20.80, 49.00, 69.80, '2019-12-03 13:18:45'),
(4, 'F/HD/18/3210004', 25.00, 20.00, 45.00, '2019-12-03 13:18:45'),
(5, 'F/HD/18/3210005', 26.50, 54.00, 80.50, '2019-12-03 13:18:45'),
(6, 'F/HD/18/3210006', 20.00, 39.00, 59.00, '2019-12-03 13:18:45'),
(7, 'F/HD/18/3210007', 30.00, 20.00, 50.00, '2019-12-03 13:18:45'),
(8, 'F/HD/18/3210011', 39.00, 50.00, 89.00, '2019-12-03 13:18:45'),
(9, 'F/HD/18/3210018', 32.00, 38.00, 70.00, '2019-12-03 13:18:45'),
(10, 'F/HD/18/3210021', 35.00, 40.00, 75.00, '2019-12-03 13:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `hnd1ss_c_english`
--

CREATE TABLE `hnd1ss_c_english` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd1ss_c_english`
--

INSERT INTO `hnd1ss_c_english` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 35.00, 32.00, 67.00, '2019-12-03 12:25:25'),
(2, 'F/HD/18/3210002', 29.50, 53.00, 82.50, '2019-12-03 12:25:25'),
(3, 'F/HD/18/3210003', 20.80, 49.00, 69.80, '2019-12-03 12:25:25'),
(4, 'F/HD/18/3210004', 25.00, 20.00, 45.00, '2019-12-03 12:25:25'),
(5, 'F/HD/18/3210005', 26.50, 54.00, 80.50, '2019-12-03 12:25:25'),
(6, 'F/HD/18/3210006', 20.00, 39.00, 59.00, '2019-12-03 12:25:25'),
(7, 'F/HD/18/3210007', 30.00, 20.00, 50.00, '2019-12-03 12:25:25'),
(8, 'F/HD/18/3210011', 39.00, 50.00, 89.00, '2019-12-03 12:25:25'),
(9, 'F/HD/18/3210018', 32.00, 38.00, 70.00, '2019-12-03 12:25:25'),
(10, 'F/HD/18/3210021', 35.00, 40.00, 75.00, '2019-12-03 12:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `hnd1ss_c_java`
--

CREATE TABLE `hnd1ss_c_java` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd1ss_c_java`
--

INSERT INTO `hnd1ss_c_java` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 30.00, 40.00, 70.00, '2019-12-03 12:28:18'),
(2, 'F/HD/18/3210002', 20.50, 50.00, 70.00, '2019-12-03 12:28:18'),
(3, 'F/HD/18/3210003', 28.80, 45.00, 74.00, '2019-12-03 12:28:18'),
(4, 'F/HD/18/3210004', 32.00, 46.00, 78.00, '2019-12-03 12:28:18'),
(5, 'F/HD/18/3210005', 29.50, 30.00, 60.00, '2019-12-03 12:28:18'),
(6, 'F/HD/18/3210006', 28.00, 36.00, 64.00, '2019-12-03 12:28:18'),
(7, 'F/HD/18/3210007', 34.00, 28.00, 62.00, '2019-12-03 12:28:18'),
(8, 'F/HD/18/3210011', 29.00, 49.00, 78.00, '2019-12-03 12:28:18'),
(9, 'F/HD/18/3210018', 35.00, 28.00, 63.00, '2019-12-03 12:28:18'),
(10, 'F/HD/18/3210021', 39.00, 30.00, 69.00, '2019-12-03 12:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `hnd1ss_d_design`
--

CREATE TABLE `hnd1ss_d_design` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd1ss_d_design`
--

INSERT INTO `hnd1ss_d_design` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 30.00, 40.00, 70.00, '2019-12-03 12:25:54'),
(2, 'F/HD/18/3210002', 20.50, 50.00, 70.00, '2019-12-03 12:25:54'),
(3, 'F/HD/18/3210003', 28.80, 45.00, 74.00, '2019-12-03 12:25:54'),
(4, 'F/HD/18/3210004', 32.00, 46.00, 78.00, '2019-12-03 12:25:54'),
(5, 'F/HD/18/3210005', 29.50, 30.00, 60.00, '2019-12-03 12:25:54'),
(6, 'F/HD/18/3210006', 28.00, 36.00, 64.00, '2019-12-03 12:25:54'),
(7, 'F/HD/18/3210007', 34.00, 28.00, 62.00, '2019-12-03 12:25:54'),
(8, 'F/HD/18/3210011', 29.00, 49.00, 78.00, '2019-12-03 12:25:54'),
(9, 'F/HD/18/3210018', 35.00, 28.00, 63.00, '2019-12-03 12:25:54'),
(10, 'F/HD/18/3210021', 39.00, 30.00, 69.00, '2019-12-03 12:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `hnd1ss_e_development`
--

CREATE TABLE `hnd1ss_e_development` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd1ss_e_development`
--

INSERT INTO `hnd1ss_e_development` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 35.00, 32.00, 67.00, '2019-12-03 13:23:00'),
(2, 'F/HD/18/3210002', 29.50, 53.00, 82.50, '2019-12-03 13:23:00'),
(3, 'F/HD/18/3210003', 20.80, 49.00, 69.80, '2019-12-03 13:23:00'),
(4, 'F/HD/18/3210004', 25.00, 20.00, 45.00, '2019-12-03 13:23:00'),
(5, 'F/HD/18/3210005', 26.50, 54.00, 80.50, '2019-12-03 13:23:00'),
(6, 'F/HD/18/3210006', 20.00, 39.00, 59.00, '2019-12-03 13:23:00'),
(7, 'F/HD/18/3210007', 30.00, 20.00, 50.00, '2019-12-03 13:23:00'),
(8, 'F/HD/18/3210011', 39.00, 50.00, 89.00, '2019-12-03 13:23:00'),
(9, 'F/HD/18/3210018', 32.00, 38.00, 70.00, '2019-12-03 13:23:00'),
(10, 'F/HD/18/3210021', 35.00, 40.00, 75.00, '2019-12-03 13:23:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `hnd1ss_grade`
-- (See below for the actual view)
--
CREATE TABLE `hnd1ss_grade` (
`std_name` varchar(101)
,`matric_no` varchar(30)
,`COM323` varchar(2)
,`COM325` varchar(2)
,`COM322` varchar(2)
,`EDD316` varchar(2)
,`STA321` varchar(2)
,`COM324` varchar(2)
,`COM321` varchar(2)
,`COM326` varchar(2)
,`GNS302` varchar(2)
,`GNS304` varchar(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `hnd1ss_grade_point`
-- (See below for the actual view)
--
CREATE TABLE `hnd1ss_grade_point` (
`std_name` varchar(101)
,`matric_no` varchar(30)
,`COM323` decimal(3,2)
,`COM325` decimal(3,2)
,`COM322` decimal(3,2)
,`EDD316` decimal(3,2)
,`STA321` decimal(3,2)
,`COM324` decimal(3,2)
,`COM321` decimal(3,2)
,`COM326` decimal(3,2)
,`GNS302` decimal(3,2)
,`GNS304` decimal(3,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `hnd1ss_i_hci`
--

CREATE TABLE `hnd1ss_i_hci` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd1ss_i_hci`
--

INSERT INTO `hnd1ss_i_hci` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 35.00, 32.00, 67.00, '2019-12-03 12:26:25'),
(2, 'F/HD/18/3210002', 29.50, 53.00, 82.50, '2019-12-03 12:26:25'),
(3, 'F/HD/18/3210003', 20.80, 49.00, 69.80, '2019-12-03 12:26:25'),
(4, 'F/HD/18/3210004', 25.00, 20.00, 45.00, '2019-12-03 12:26:25'),
(5, 'F/HD/18/3210005', 26.50, 54.00, 80.50, '2019-12-03 12:26:25'),
(6, 'F/HD/18/3210006', 20.00, 39.00, 59.00, '2019-12-03 12:26:25'),
(7, 'F/HD/18/3210007', 30.00, 20.00, 50.00, '2019-12-03 12:26:25'),
(8, 'F/HD/18/3210011', 39.00, 50.00, 89.00, '2019-12-03 12:26:25'),
(9, 'F/HD/18/3210018', 32.00, 38.00, 70.00, '2019-12-03 12:26:25'),
(10, 'F/HD/18/3210021', 35.00, 40.00, 75.00, '2019-12-03 12:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `hnd1ss_o_system`
--

CREATE TABLE `hnd1ss_o_system` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd1ss_o_system`
--

INSERT INTO `hnd1ss_o_system` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 35.00, 32.00, 67.00, '2019-12-03 12:27:27'),
(2, 'F/HD/18/3210002', 29.50, 53.00, 82.50, '2019-12-03 12:27:27'),
(3, 'F/HD/18/3210003', 20.80, 49.00, 69.80, '2019-12-03 12:27:27'),
(4, 'F/HD/18/3210004', 25.00, 20.00, 45.00, '2019-12-03 12:27:28'),
(5, 'F/HD/18/3210005', 26.50, 54.00, 80.50, '2019-12-03 12:27:28'),
(6, 'F/HD/18/3210006', 20.00, 39.00, 59.00, '2019-12-03 12:27:28'),
(7, 'F/HD/18/3210007', 30.00, 20.00, 50.00, '2019-12-03 12:27:28'),
(8, 'F/HD/18/3210011', 39.00, 50.00, 89.00, '2019-12-03 12:27:28'),
(9, 'F/HD/18/3210018', 32.00, 38.00, 70.00, '2019-12-03 12:27:28'),
(10, 'F/HD/18/3210021', 35.00, 40.00, 75.00, '2019-12-03 12:27:28');

-- --------------------------------------------------------

--
-- Stand-in structure for view `hnd1ss_result`
-- (See below for the actual view)
--
CREATE TABLE `hnd1ss_result` (
`matric_no` varchar(30)
,`COM323` varchar(2)
,`COM325` varchar(2)
,`COM322` varchar(2)
,`EDD316` varchar(2)
,`STA321` varchar(2)
,`COM324` varchar(2)
,`COM321` varchar(2)
,`COM326` varchar(2)
,`GNS302` varchar(2)
,`GNS304` varchar(2)
,`CWGP` decimal(14,2)
,`CGPA` decimal(15,2)
,`REMARK` varchar(12)
);

-- --------------------------------------------------------

--
-- Table structure for table `hnd1ss_r_methodology`
--

CREATE TABLE `hnd1ss_r_methodology` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd1ss_r_methodology`
--

INSERT INTO `hnd1ss_r_methodology` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 35.00, 32.00, 67.00, '2019-12-03 12:28:45'),
(2, 'F/HD/18/3210002', 29.50, 53.00, 82.50, '2019-12-03 12:28:45'),
(3, 'F/HD/18/3210003', 20.80, 49.00, 69.80, '2019-12-03 12:28:45'),
(4, 'F/HD/18/3210004', 25.00, 20.00, 45.00, '2019-12-03 12:28:45'),
(5, 'F/HD/18/3210005', 26.50, 54.00, 80.50, '2019-12-03 12:28:45'),
(6, 'F/HD/18/3210006', 20.00, 39.00, 59.00, '2019-12-03 12:28:45'),
(7, 'F/HD/18/3210007', 30.00, 20.00, 50.00, '2019-12-03 12:28:45'),
(8, 'F/HD/18/3210011', 39.00, 50.00, 89.00, '2019-12-03 12:28:45'),
(9, 'F/HD/18/3210018', 32.00, 38.00, 70.00, '2019-12-03 12:28:45'),
(10, 'F/HD/18/3210021', 35.00, 40.00, 75.00, '2019-12-03 12:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `hnd1ss_s_engineering`
--

CREATE TABLE `hnd1ss_s_engineering` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd1ss_s_engineering`
--

INSERT INTO `hnd1ss_s_engineering` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 30.00, 40.00, 70.00, '2019-12-03 16:12:23'),
(2, 'F/HD/18/3210002', 20.50, 50.00, 70.00, '2019-12-03 16:12:23'),
(3, 'F/HD/18/3210003', 28.80, 45.00, 74.00, '2019-12-03 16:12:23'),
(4, 'F/HD/18/3210004', 32.00, 46.00, 78.00, '2019-12-03 16:12:23'),
(5, 'F/HD/18/3210005', 29.50, 30.00, 60.00, '2019-12-03 16:12:23'),
(6, 'F/HD/18/3210006', 28.00, 36.00, 64.00, '2019-12-03 16:12:23'),
(7, 'F/HD/18/3210007', 34.00, 28.00, 62.00, '2019-12-03 16:12:23'),
(8, 'F/HD/18/3210011', 29.00, 49.00, 78.00, '2019-12-03 16:12:23'),
(9, 'F/HD/18/3210018', 35.00, 28.00, 63.00, '2019-12-03 16:12:23'),
(10, 'F/HD/18/3210021', 39.00, 30.00, 69.00, '2019-12-03 16:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `hnd1ss_s_theory`
--

CREATE TABLE `hnd1ss_s_theory` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd1ss_s_theory`
--

INSERT INTO `hnd1ss_s_theory` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 30.00, 40.00, 70.00, '2019-12-03 12:26:55'),
(2, 'F/HD/18/3210002', 20.50, 50.00, 70.00, '2019-12-03 12:26:55'),
(3, 'F/HD/18/3210003', 28.80, 45.00, 74.00, '2019-12-03 12:26:55'),
(4, 'F/HD/18/3210004', 32.00, 46.00, 78.00, '2019-12-03 12:26:55'),
(5, 'F/HD/18/3210005', 29.50, 30.00, 60.00, '2019-12-03 12:26:55'),
(6, 'F/HD/18/3210006', 28.00, 36.00, 64.00, '2019-12-03 12:26:55'),
(7, 'F/HD/18/3210007', 34.00, 28.00, 62.00, '2019-12-03 12:26:55'),
(8, 'F/HD/18/3210011', 29.00, 49.00, 78.00, '2019-12-03 12:26:55'),
(9, 'F/HD/18/3210018', 35.00, 28.00, 63.00, '2019-12-03 12:26:55'),
(10, 'F/HD/18/3210021', 39.00, 30.00, 69.00, '2019-12-03 12:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `nd1fs_a_geometry`
--

CREATE TABLE `nd1fs_a_geometry` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nd1fs_a_geometry`
--

INSERT INTO `nd1fs_a_geometry` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 30.00, 40.00, 70.00, '2019-12-06 04:07:24'),
(2, 'F/HD/18/3210002', 20.50, 50.00, 70.50, '2019-12-06 04:07:24'),
(3, 'F/HD/18/3210003', 28.80, 45.00, 73.80, '2019-12-06 04:07:24'),
(4, 'F/HD/18/3210004', 32.00, 46.00, 78.00, '2019-12-06 04:07:24'),
(5, 'F/HD/18/3210005', 29.50, 30.00, 59.50, '2019-12-06 04:07:24'),
(6, 'F/HD/18/3210006', 28.00, 36.00, 64.00, '2019-12-06 04:07:24'),
(7, 'F/HD/18/3210007', 34.00, 28.00, 62.00, '2019-12-06 04:07:24'),
(8, 'F/HD/18/3210011', 29.00, 49.00, 78.00, '2019-12-06 04:07:24'),
(9, 'F/HD/18/3210018', 35.00, 28.00, 63.00, '2019-12-06 04:07:24'),
(10, 'F/HD/18/3210021', 39.00, 30.00, 69.00, '2019-12-06 04:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `nd1fs_c_education`
--

CREATE TABLE `nd1fs_c_education` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nd1fs_c_education`
--

INSERT INTO `nd1fs_c_education` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 30.00, 40.00, 70.00, '2019-12-06 06:09:46'),
(2, 'F/HD/18/3210002', 20.50, 50.00, 70.50, '2019-12-06 06:09:46'),
(3, 'F/HD/18/3210003', 28.80, 45.00, 73.80, '2019-12-06 06:09:46'),
(4, 'F/HD/18/3210004', 32.00, 46.00, 78.00, '2019-12-06 06:09:46'),
(5, 'F/HD/18/3210005', 29.50, 30.00, 59.50, '2019-12-06 06:09:46'),
(6, 'F/HD/18/3210006', 28.00, 36.00, 64.00, '2019-12-06 06:09:46'),
(7, 'F/HD/18/3210007', 34.00, 28.00, 62.00, '2019-12-06 06:09:46'),
(8, 'F/HD/18/3210011', 29.00, 49.00, 78.00, '2019-12-06 06:09:46'),
(9, 'F/HD/18/3210018', 35.00, 28.00, 63.00, '2019-12-06 06:09:46'),
(10, 'F/HD/18/3210021', 39.00, 30.00, 69.00, '2019-12-06 06:09:46');

-- --------------------------------------------------------

--
-- Table structure for table `nd1fs_d_electronics`
--

CREATE TABLE `nd1fs_d_electronics` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nd1fs_d_electronics`
--

INSERT INTO `nd1fs_d_electronics` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 30.00, 40.00, 70.00, '2019-12-06 06:08:49'),
(2, 'F/HD/18/3210002', 20.50, 50.00, 70.50, '2019-12-06 06:08:49'),
(3, 'F/HD/18/3210003', 28.80, 45.00, 73.80, '2019-12-06 06:08:49'),
(4, 'F/HD/18/3210004', 32.00, 46.00, 78.00, '2019-12-06 06:08:49'),
(5, 'F/HD/18/3210005', 29.50, 30.00, 59.50, '2019-12-06 06:08:49'),
(6, 'F/HD/18/3210006', 28.00, 36.00, 64.00, '2019-12-06 06:08:49'),
(7, 'F/HD/18/3210007', 34.00, 28.00, 62.00, '2019-12-06 06:08:49'),
(8, 'F/HD/18/3210011', 29.00, 49.00, 78.00, '2019-12-06 06:08:49'),
(9, 'F/HD/18/3210018', 35.00, 28.00, 63.00, '2019-12-06 06:08:49'),
(10, 'F/HD/18/3210021', 39.00, 30.00, 69.00, '2019-12-06 06:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `nd1fs_d_statistics`
--

CREATE TABLE `nd1fs_d_statistics` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nd1fs_d_statistics`
--

INSERT INTO `nd1fs_d_statistics` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 35.00, 32.00, 67.00, '2019-12-06 04:06:16'),
(2, 'F/HD/18/3210002', 29.50, 53.00, 82.50, '2019-12-06 04:06:16'),
(3, 'F/HD/18/3210003', 20.80, 49.00, 69.80, '2019-12-06 04:06:16'),
(4, 'F/HD/18/3210004', 25.00, 20.00, 45.00, '2019-12-06 04:06:16'),
(5, 'F/HD/18/3210005', 26.50, 54.00, 80.50, '2019-12-06 04:06:16'),
(6, 'F/HD/18/3210006', 20.00, 39.00, 59.00, '2019-12-06 04:06:16'),
(7, 'F/HD/18/3210007', 30.00, 20.00, 50.00, '2019-12-06 04:06:16'),
(8, 'F/HD/18/3210011', 39.00, 50.00, 89.00, '2019-12-06 04:06:16'),
(9, 'F/HD/18/3210018', 32.00, 38.00, 70.00, '2019-12-06 04:06:16'),
(10, 'F/HD/18/3210021', 35.00, 40.00, 75.00, '2019-12-06 04:06:16');

-- --------------------------------------------------------

--
-- Stand-in structure for view `nd1fs_grade`
-- (See below for the actual view)
--
CREATE TABLE `nd1fs_grade` (
`std_name` varchar(101)
,`matric_no` varchar(30)
,`MTH112` varchar(2)
,`GNS111` varchar(2)
,`COM112` varchar(2)
,`STA112` varchar(2)
,`COM111` varchar(2)
,`COM113` varchar(2)
,`MTH111` varchar(2)
,`COM115` varchar(2)
,`STA117` varchar(2)
,`GNS101` varchar(2)
,`COM114` varchar(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `nd1fs_grade_point`
-- (See below for the actual view)
--
CREATE TABLE `nd1fs_grade_point` (
`std_name` varchar(101)
,`matric_no` varchar(30)
,`MTH112` decimal(3,2)
,`GNS111` decimal(3,2)
,`COM112` decimal(3,2)
,`STA112` decimal(3,2)
,`COM111` decimal(3,2)
,`COM113` decimal(3,2)
,`MTH111` decimal(3,2)
,`COM115` decimal(3,2)
,`STA117` decimal(3,2)
,`GNS101` decimal(3,2)
,`COM114` decimal(3,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `nd1fs_i_computing`
--

CREATE TABLE `nd1fs_i_computing` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nd1fs_i_computing`
--

INSERT INTO `nd1fs_i_computing` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 30.00, 40.00, 70.00, '2019-12-04 08:14:40'),
(2, 'F/HD/18/3210002', 20.50, 50.00, 70.50, '2019-12-04 08:14:40'),
(3, 'F/HD/18/3210003', 28.80, 45.00, 73.80, '2019-12-04 08:14:40'),
(4, 'F/HD/18/3210004', 32.00, 46.00, 78.00, '2019-12-04 08:14:40'),
(5, 'F/HD/18/3210005', 29.50, 30.00, 59.50, '2019-12-04 08:14:40'),
(6, 'F/HD/18/3210006', 28.00, 36.00, 64.00, '2019-12-04 08:14:40'),
(7, 'F/HD/18/3210007', 34.00, 28.00, 62.00, '2019-12-04 08:14:40'),
(8, 'F/HD/18/3210011', 29.00, 49.00, 78.00, '2019-12-04 08:14:40'),
(9, 'F/HD/18/3210018', 35.00, 28.00, 63.00, '2019-12-04 08:14:40'),
(10, 'F/HD/18/3210021', 39.00, 30.00, 69.00, '2019-12-04 08:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `nd1fs_i_programming`
--

CREATE TABLE `nd1fs_i_programming` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nd1fs_i_programming`
--

INSERT INTO `nd1fs_i_programming` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 35.00, 32.00, 67.00, '2019-12-06 06:08:01'),
(2, 'F/HD/18/3210002', 29.50, 53.00, 82.50, '2019-12-06 06:08:01'),
(3, 'F/HD/18/3210003', 20.80, 49.00, 69.80, '2019-12-06 06:08:01'),
(4, 'F/HD/18/3210004', 25.00, 20.00, 45.00, '2019-12-06 06:08:01'),
(5, 'F/HD/18/3210005', 26.50, 54.00, 80.50, '2019-12-06 06:08:01'),
(6, 'F/HD/18/3210006', 20.00, 39.00, 59.00, '2019-12-06 06:08:01'),
(7, 'F/HD/18/3210007', 30.00, 20.00, 50.00, '2019-12-06 06:08:01'),
(8, 'F/HD/18/3210011', 39.00, 50.00, 89.00, '2019-12-06 06:08:01'),
(9, 'F/HD/18/3210018', 32.00, 38.00, 70.00, '2019-12-06 06:08:01'),
(10, 'F/HD/18/3210021', 35.00, 40.00, 75.00, '2019-12-06 06:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `nd1fs_l_algebra`
--

CREATE TABLE `nd1fs_l_algebra` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nd1fs_l_algebra`
--

INSERT INTO `nd1fs_l_algebra` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 35.00, 32.00, 67.00, '2019-12-06 06:04:59'),
(2, 'F/HD/18/3210002', 29.50, 53.00, 82.50, '2019-12-06 06:04:59'),
(3, 'F/HD/18/3210003', 20.80, 49.00, 69.80, '2019-12-06 06:04:59'),
(4, 'F/HD/18/3210004', 25.00, 20.00, 45.00, '2019-12-06 06:04:59'),
(5, 'F/HD/18/3210005', 26.50, 54.00, 80.50, '2019-12-06 06:04:59'),
(6, 'F/HD/18/3210006', 20.00, 39.00, 59.00, '2019-12-06 06:04:59'),
(7, 'F/HD/18/3210007', 30.00, 20.00, 50.00, '2019-12-06 06:04:59'),
(8, 'F/HD/18/3210011', 39.00, 50.00, 89.00, '2019-12-06 06:04:59'),
(9, 'F/HD/18/3210018', 32.00, 38.00, 70.00, '2019-12-06 06:04:59'),
(10, 'F/HD/18/3210021', 35.00, 40.00, 75.00, '2019-12-06 06:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `nd1fs_l_os`
--

CREATE TABLE `nd1fs_l_os` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nd1fs_l_os`
--

INSERT INTO `nd1fs_l_os` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 35.00, 32.00, 67.00, '2019-12-06 06:06:40'),
(2, 'F/HD/18/3210002', 29.50, 53.00, 82.50, '2019-12-06 06:06:40'),
(3, 'F/HD/18/3210003', 20.80, 49.00, 69.80, '2019-12-06 06:06:40'),
(4, 'F/HD/18/3210004', 25.00, 20.00, 45.00, '2019-12-06 06:06:40'),
(5, 'F/HD/18/3210005', 26.50, 54.00, 80.50, '2019-12-06 06:06:40'),
(6, 'F/HD/18/3210006', 20.00, 39.00, 59.00, '2019-12-06 06:06:40'),
(7, 'F/HD/18/3210007', 30.00, 20.00, 50.00, '2019-12-06 06:06:40'),
(8, 'F/HD/18/3210011', 39.00, 50.00, 89.00, '2019-12-06 06:06:40'),
(9, 'F/HD/18/3210018', 32.00, 38.00, 70.00, '2019-12-06 06:06:40'),
(10, 'F/HD/18/3210021', 35.00, 40.00, 75.00, '2019-12-06 06:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `nd1fs_p_theory`
--

CREATE TABLE `nd1fs_p_theory` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nd1fs_p_theory`
--

INSERT INTO `nd1fs_p_theory` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 30.00, 40.00, 70.00, '2019-12-06 04:04:49'),
(2, 'F/HD/18/3210002', 20.50, 50.00, 70.50, '2019-12-06 04:04:49'),
(3, 'F/HD/18/3210003', 28.80, 45.00, 73.80, '2019-12-06 04:04:49'),
(4, 'F/HD/18/3210004', 32.00, 46.00, 78.00, '2019-12-06 04:04:49'),
(5, 'F/HD/18/3210005', 29.50, 30.00, 59.50, '2019-12-06 04:04:49'),
(6, 'F/HD/18/3210006', 28.00, 36.00, 64.00, '2019-12-06 04:04:49'),
(7, 'F/HD/18/3210007', 34.00, 28.00, 62.00, '2019-12-06 04:04:49'),
(8, 'F/HD/18/3210011', 29.00, 49.00, 78.00, '2019-12-06 04:04:49'),
(9, 'F/HD/18/3210018', 35.00, 28.00, 63.00, '2019-12-06 04:04:49'),
(10, 'F/HD/18/3210021', 39.00, 30.00, 69.00, '2019-12-06 04:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `nd1fs_p_upgrade`
--

CREATE TABLE `nd1fs_p_upgrade` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nd1fs_p_upgrade`
--

INSERT INTO `nd1fs_p_upgrade` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 30.00, 40.00, 70.00, '2019-12-06 06:07:06'),
(2, 'F/HD/18/3210002', 20.50, 50.00, 70.50, '2019-12-06 06:07:06'),
(3, 'F/HD/18/3210003', 28.80, 45.00, 73.80, '2019-12-06 06:07:06'),
(4, 'F/HD/18/3210004', 32.00, 46.00, 78.00, '2019-12-06 06:07:06'),
(5, 'F/HD/18/3210005', 29.50, 30.00, 59.50, '2019-12-06 06:07:06'),
(6, 'F/HD/18/3210006', 28.00, 36.00, 64.00, '2019-12-06 06:07:06'),
(7, 'F/HD/18/3210007', 34.00, 28.00, 62.00, '2019-12-06 06:07:06'),
(8, 'F/HD/18/3210011', 29.00, 49.00, 78.00, '2019-12-06 06:07:07'),
(9, 'F/HD/18/3210018', 35.00, 28.00, 63.00, '2019-12-06 06:07:07'),
(10, 'F/HD/18/3210021', 39.00, 30.00, 69.00, '2019-12-06 06:07:07');

-- --------------------------------------------------------

--
-- Stand-in structure for view `nd1fs_result`
-- (See below for the actual view)
--
CREATE TABLE `nd1fs_result` (
`matric_no` varchar(30)
,`MTH112` varchar(2)
,`GNS111` varchar(2)
,`COM112` varchar(2)
,`STA112` varchar(2)
,`COM111` varchar(2)
,`COM113` varchar(2)
,`MTH111` varchar(2)
,`COM115` varchar(2)
,`STA117` varchar(2)
,`GNS101` varchar(2)
,`COM114` varchar(2)
,`WGP` decimal(14,2)
,`GPA` decimal(15,2)
,`REMARK` varchar(12)
);

-- --------------------------------------------------------

--
-- Table structure for table `nd1fs_u_english`
--

CREATE TABLE `nd1fs_u_english` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nd1fs_u_english`
--

INSERT INTO `nd1fs_u_english` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 30.00, 40.00, 70.00, '2019-12-06 06:05:58'),
(2, 'F/HD/18/3210002', 20.50, 50.00, 70.50, '2019-12-06 06:05:58'),
(3, 'F/HD/18/3210003', 28.80, 45.00, 73.80, '2019-12-06 06:05:58'),
(4, 'F/HD/18/3210004', 32.00, 46.00, 78.00, '2019-12-06 06:05:58'),
(5, 'F/HD/18/3210005', 29.50, 30.00, 59.50, '2019-12-06 06:05:58'),
(6, 'F/HD/18/3210006', 28.00, 36.00, 64.00, '2019-12-06 06:05:58'),
(7, 'F/HD/18/3210007', 34.00, 28.00, 62.00, '2019-12-06 06:05:58'),
(8, 'F/HD/18/3210011', 29.00, 49.00, 78.00, '2019-12-06 06:05:58'),
(9, 'F/HD/18/3210018', 35.00, 28.00, 63.00, '2019-12-06 06:05:58'),
(10, 'F/HD/18/3210021', 39.00, 30.00, 69.00, '2019-12-06 06:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `nd2ss_c_society`
--

CREATE TABLE `nd2ss_c_society` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `cont_ass` double(4,2) DEFAULT NULL,
  `exam_60` double(5,2) DEFAULT NULL,
  `exam_100` double(5,2) DEFAULT NULL,
  `total_score` double(5,2) AS (`exam_60` + `cont_ass`) VIRTUAL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nd2ss_c_society`
--

INSERT INTO `nd2ss_c_society` (`t_id`, `user_id`, `cont_ass`, `exam_60`, `exam_100`, `uploaded_at`) VALUES
(1, 'F/HD/18/3210001', 30.00, 40.00, 70.00, '2019-12-05 15:26:46'),
(2, 'F/HD/18/3210002', 20.50, 50.00, 70.50, '2019-12-05 15:26:46'),
(3, 'F/HD/18/3210003', 28.80, 45.00, 73.80, '2019-12-05 15:26:46'),
(4, 'F/HD/18/3210004', 32.00, 46.00, 78.00, '2019-12-05 15:26:46'),
(5, 'F/HD/18/3210005', 29.50, 30.00, 59.50, '2019-12-05 15:26:46'),
(6, 'F/HD/18/3210006', 28.00, 36.00, 64.00, '2019-12-05 15:26:46'),
(7, 'F/HD/18/3210007', 34.00, 28.00, 62.00, '2019-12-05 15:26:46'),
(8, 'F/HD/18/3210011', 29.00, 49.00, 78.00, '2019-12-05 15:26:46'),
(9, 'F/HD/18/3210018', 35.00, 28.00, 63.00, '2019-12-05 15:26:46'),
(10, 'F/HD/18/3210021', 39.00, 30.00, 69.00, '2019-12-05 15:26:46');

-- --------------------------------------------------------

--
-- Table structure for table `page_settings`
--

CREATE TABLE `page_settings` (
  `id` int(5) NOT NULL,
  `academic_year` varchar(30) DEFAULT NULL,
  `academic_week` varchar(10) DEFAULT NULL,
  `current_year` varchar(10) DEFAULT NULL,
  `current_semester` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_settings`
--

INSERT INTO `page_settings` (`id`, `academic_year`, `academic_week`, `current_year`, `current_semester`) VALUES
(1, '2018/2019', '8', '2019', 'SECOND');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `reset_id` int(11) NOT NULL,
  `reset_email` varchar(200) DEFAULT NULL,
  `reset_key` varchar(50) DEFAULT NULL,
  `expires` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`reset_id`, `reset_email`, `reset_key`, `expires`) VALUES
(1, 'gabrielilo190@gmail.com', '9314bbba1d08c2d2fc14', 1575495431);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `t_id` int(5) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `user_type` varchar(30) DEFAULT NULL,
  `level` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `profile_image` varchar(200) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`t_id`, `user_id`, `firstname`, `lastname`, `gender`, `user_type`, `level`, `email`, `profile_image`, `password`) VALUES
(1, 'F/HD/18/3210001', 'Isaac', 'Adepitan', 'male', 'user', 'HND1', 'info@lockerwears.com', 'fbpost-29-11-19.png', '$2y$10$0uUBD2hS2H.46DmYMaWGUOadaa/10/GLNnAdMldrkRbCWDVl/CipO'),
(2, 'F/HD/18/3210011', 'Gabriel', 'Ilochi', 'male', 'user', 'HND1', 'gabrielilo190@gmail.com', 'mainstridelogo_250x100.png', '$2y$10$BwJSI4zb3GlxAFBN191OJ.67sC1TVHXyQR81nDMh0ekMuAmVJR6U2'),
(3, 'F/HD/18/3210018', 'Rosemary', 'Okoro', NULL, 'user', 'ND1', 'okororosemary@gmail.com', NULL, '$2y$10$0uUBD2hS2H.46DmYMaWGUOadaa/10/GLNnAdMldrkRbCWDVl/CipO'),
(4, 'F/HD/18/3210145', 'John', 'Doe', NULL, 'user', 'HND2', 'johndoe1@mail.com', NULL, '$2y$10$OU32UDn8q.dBRwl8ja.fp.3xykESJ88LnVYew7HB91umeBiMjf.Cm'),
(5, 'admin', 'John', 'Doe', NULL, 'admin', 'operator', 'johndoe@mail.com', NULL, '$2y$10$fsgXskdQfPHjfYMbsE8A7uKvSaSw1bWOAV5FSGiCfeI7nQocH.Tya'),
(6, 'YCT/18/3210011', 'Gabriel', 'Ilochi', NULL, 'user', 'ND1', 'gabrielilo1901@gmail.com', NULL, '$2y$10$CdjyyhFsNZvrako.18o54./mJ557A2IgZK6VcWPDd4tx9SQ5t7256'),
(7, 'YCT/18/3210021', 'Gabriel', 'Ilochi', NULL, 'user', 'ND2', 'gabrielilo1902@gmail.com', NULL, '$2y$10$hcZ.CUtgQP0bI9v7eoR83uJ4.a9fIgoSuJdDq7woUBrlyFuJRVXpK'),
(8, 'F/HD/18/3210100', 'Bright', 'Nwachukwu', NULL, 'user', 'HND1', 'mcbright@mail.com', NULL, '$2y$10$Jv8VO/AbVbs2wF2ftK1J7OI3L1XNGPDnM/KR0ShWI/.HYAmnzqkWK');



CREATE VIEW `hnd1fs_grade`  AS  select concat(`st`.`firstname`,' ',`st`.`lastname`) AS `std_name`,`st`.`user_id` AS `matric_no`,(case when (`alg`.`exam_100` between 75.00 and 100.00) then 'A1' when (`alg`.`exam_100` between 70.00 and 74.99) then 'A2' when (`alg`.`exam_100` between 65.00 and 69.99) then 'B1' when (`alg`.`exam_100` between 60.00 and 64.99) then 'B2' when (`alg`.`exam_100` between 55.00 and 59.99) then 'C1' when (`alg`.`exam_100` between 50.00 and 54.99) then 'C2' when (`alg`.`exam_100` between 45.00 and 49.99) then 'D1' when (`alg`.`exam_100` between 40.00 and 44.99) then 'D2' when (`alg`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `MTH311`,(case when (`cal`.`exam_100` between 75.00 and 100.00) then 'A1' when (`cal`.`exam_100` between 70.00 and 74.99) then 'A2' when (`cal`.`exam_100` between 65.00 and 69.99) then 'B1' when (`cal`.`exam_100` between 60.00 and 64.99) then 'B2' when (`cal`.`exam_100` between 55.00 and 59.99) then 'C1' when (`cal`.`exam_100` between 50.00 and 54.99) then 'C2' when (`cal`.`exam_100` between 45.00 and 49.99) then 'D1' when (`cal`.`exam_100` between 40.00 and 44.99) then 'D2' when (`cal`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `MTH312`,(case when (`db`.`exam_100` between 75.00 and 100.00) then 'A1' when (`db`.`exam_100` between 70.00 and 74.99) then 'A2' when (`db`.`exam_100` between 65.00 and 69.99) then 'B1' when (`db`.`exam_100` between 60.00 and 64.99) then 'B2' when (`db`.`exam_100` between 55.00 and 59.99) then 'C1' when (`db`.`exam_100` between 50.00 and 54.99) then 'C2' when (`db`.`exam_100` between 45.00 and 49.99) then 'D1' when (`db`.`exam_100` between 40.00 and 44.99) then 'D2' when (`db`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `COM312`,(case when (`ca`.`exam_100` between 75.00 and 100.00) then 'A1' when (`ca`.`exam_100` between 70.00 and 74.99) then 'A2' when (`ca`.`exam_100` between 65.00 and 69.99) then 'B1' when (`ca`.`exam_100` between 60.00 and 64.99) then 'B2' when (`ca`.`exam_100` between 55.00 and 59.99) then 'C1' when (`ca`.`exam_100` between 50.00 and 54.99) then 'C2' when (`ca`.`exam_100` between 45.00 and 49.99) then 'D1' when (`ca`.`exam_100` between 40.00 and 44.99) then 'D2' when (`ca`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `COM314`,(case when (`sth`.`exam_100` between 75.00 and 100.00) then 'A1' when (`sth`.`exam_100` between 70.00 and 74.99) then 'A2' when (`sth`.`exam_100` between 65.00 and 69.99) then 'B1' when (`sth`.`exam_100` between 60.00 and 64.99) then 'B2' when (`sth`.`exam_100` between 55.00 and 59.99) then 'C1' when (`sth`.`exam_100` between 50.00 and 54.99) then 'C2' when (`sth`.`exam_100` between 45.00 and 49.99) then 'D1' when (`sth`.`exam_100` between 40.00 and 44.99) then 'D2' when (`sth`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `STA311`,(case when (`nm`.`exam_100` between 75.00 and 100.00) then 'A1' when (`nm`.`exam_100` between 70.00 and 74.99) then 'A2' when (`nm`.`exam_100` between 65.00 and 69.99) then 'B1' when (`nm`.`exam_100` between 60.00 and 64.99) then 'B2' when (`nm`.`exam_100` between 55.00 and 59.99) then 'C1' when (`nm`.`exam_100` between 50.00 and 54.99) then 'C2' when (`nm`.`exam_100` between 45.00 and 49.99) then 'D1' when (`nm`.`exam_100` between 40.00 and 44.99) then 'D2' when (`nm`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `COM317`,(case when (`os`.`exam_100` between 75.00 and 100.00) then 'A1' when (`os`.`exam_100` between 70.00 and 74.99) then 'A2' when (`os`.`exam_100` between 65.00 and 69.99) then 'B1' when (`os`.`exam_100` between 60.00 and 64.99) then 'B2' when (`os`.`exam_100` between 55.00 and 59.99) then 'C1' when (`os`.`exam_100` between 50.00 and 54.99) then 'C2' when (`os`.`exam_100` between 45.00 and 49.99) then 'D1' when (`os`.`exam_100` between 40.00 and 44.99) then 'D2' when (`os`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `COM311`,(case when (`cpp`.`exam_100` between 75.00 and 100.00) then 'A1' when (`cpp`.`exam_100` between 70.00 and 74.99) then 'A2' when (`cpp`.`exam_100` between 65.00 and 69.99) then 'B1' when (`cpp`.`exam_100` between 60.00 and 64.99) then 'B2' when (`cpp`.`exam_100` between 55.00 and 59.99) then 'C1' when (`cpp`.`exam_100` between 50.00 and 54.99) then 'C2' when (`cpp`.`exam_100` between 45.00 and 49.99) then 'D1' when (`cpp`.`exam_100` between 40.00 and 44.99) then 'D2' when (`cpp`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `COM313`,(case when (`eng`.`exam_100` between 75.00 and 100.00) then 'A1' when (`eng`.`exam_100` between 70.00 and 74.99) then 'A2' when (`eng`.`exam_100` between 65.00 and 69.99) then 'B1' when (`eng`.`exam_100` between 60.00 and 64.99) then 'B2' when (`eng`.`exam_100` between 55.00 and 59.99) then 'C1' when (`eng`.`exam_100` between 50.00 and 54.99) then 'C2' when (`eng`.`exam_100` between 45.00 and 49.99) then 'D1' when (`eng`.`exam_100` between 40.00 and 44.99) then 'D2' when (`eng`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `GNS301`,(case when (`or`.`exam_100` between 75.00 and 100.00) then 'A1' when (`or`.`exam_100` between 70.00 and 74.99) then 'A2' when (`or`.`exam_100` between 65.00 and 69.99) then 'B1' when (`or`.`exam_100` between 60.00 and 64.99) then 'B2' when (`or`.`exam_100` between 55.00 and 59.99) then 'C1' when (`or`.`exam_100` between 50.00 and 54.99) then 'C2' when (`or`.`exam_100` between 45.00 and 49.99) then 'D1' when (`or`.`exam_100` between 40.00 and 44.99) then 'D2' when (`or`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `STA314` from ((((((((((`hnd1fs_a_algebra` `alg` join `users` `st` on((`alg`.`user_id` = `st`.`user_id`))) join `hnd1fs_a_calculus` `cal` on((`st`.`user_id` = `cal`.`user_id`))) join `hnd1fs_d_design` `db` on((`st`.`user_id` = `db`.`user_id`))) join `hnd1fs_c_architecture` `ca` on((`st`.`user_id` = `ca`.`user_id`))) join `hnd1fs_s_theory` `sth` on((`st`.`user_id` = `sth`.`user_id`))) join `hnd1fs_n_methods` `nm` on((`st`.`user_id` = `nm`.`user_id`))) join `hnd1fs_o_system` `os` on((`st`.`user_id` = `os`.`user_id`))) join `hnd1fs_p_c++` `cpp` on((`st`.`user_id` = `cpp`.`user_id`))) join `hnd1fs_u_english` `eng` on((`st`.`user_id` = `eng`.`user_id`))) join `hnd1fs_o_research` `or` on((`st`.`user_id` = `or`.`user_id`))) ;



CREATE VIEW `hnd1fs_grade_point`  AS  select concat(`st`.`firstname`,' ',`st`.`lastname`) AS `std_name`,`st`.`user_id` AS `matric_no`,(case when (`alg`.`exam_100` between 75.00 and 100.00) then 4.00 when (`alg`.`exam_100` between 70.00 and 74.99) then 3.50 when (`alg`.`exam_100` between 65.00 and 69.99) then 3.25 when (`alg`.`exam_100` between 60.00 and 64.99) then 3.00 when (`alg`.`exam_100` between 55.00 and 59.99) then 2.75 when (`alg`.`exam_100` between 50.00 and 54.99) then 2.50 when (`alg`.`exam_100` between 45.00 and 49.99) then 2.25 when (`alg`.`exam_100` between 40.00 and 44.99) then 2.00 when (`alg`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `MTH311`,(case when (`cal`.`exam_100` between 75.00 and 100.00) then 4.00 when (`cal`.`exam_100` between 70.00 and 74.99) then 3.50 when (`cal`.`exam_100` between 65.00 and 69.99) then 3.25 when (`cal`.`exam_100` between 60.00 and 64.99) then 3.00 when (`cal`.`exam_100` between 55.00 and 59.99) then 2.75 when (`cal`.`exam_100` between 50.00 and 54.99) then 2.50 when (`cal`.`exam_100` between 45.00 and 49.99) then 2.25 when (`cal`.`exam_100` between 40.00 and 44.99) then 2.00 when (`cal`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `MTH312`,(case when (`db`.`exam_100` between 75.00 and 100.00) then 4.00 when (`db`.`exam_100` between 70.00 and 74.99) then 3.50 when (`db`.`exam_100` between 65.00 and 69.99) then 3.25 when (`db`.`exam_100` between 60.00 and 64.99) then 3.00 when (`db`.`exam_100` between 55.00 and 59.99) then 2.75 when (`db`.`exam_100` between 50.00 and 54.99) then 2.50 when (`db`.`exam_100` between 45.00 and 49.99) then 2.25 when (`db`.`exam_100` between 40.00 and 44.99) then 2.00 when (`db`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `COM312`,(case when (`ca`.`exam_100` between 75.00 and 100.00) then 4.00 when (`ca`.`exam_100` between 70.00 and 74.99) then 3.50 when (`ca`.`exam_100` between 65.00 and 69.99) then 3.25 when (`ca`.`exam_100` between 60.00 and 64.99) then 3.00 when (`ca`.`exam_100` between 55.00 and 59.99) then 2.75 when (`ca`.`exam_100` between 50.00 and 54.99) then 2.50 when (`ca`.`exam_100` between 45.00 and 49.99) then 2.25 when (`ca`.`exam_100` between 40.00 and 44.99) then 2.00 when (`ca`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `COM314`,(case when (`sth`.`exam_100` between 75.00 and 100.00) then 4.00 when (`sth`.`exam_100` between 70.00 and 74.99) then 3.50 when (`sth`.`exam_100` between 65.00 and 69.99) then 3.25 when (`sth`.`exam_100` between 60.00 and 64.99) then 3.00 when (`sth`.`exam_100` between 55.00 and 59.99) then 2.75 when (`sth`.`exam_100` between 50.00 and 54.99) then 2.50 when (`sth`.`exam_100` between 45.00 and 49.99) then 2.25 when (`sth`.`exam_100` between 40.00 and 44.99) then 2.00 when (`sth`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `STA311`,(case when (`nm`.`exam_100` between 75.00 and 100.00) then 4.00 when (`nm`.`exam_100` between 70.00 and 74.99) then 3.50 when (`nm`.`exam_100` between 65.00 and 69.99) then 3.25 when (`nm`.`exam_100` between 60.00 and 64.99) then 3.00 when (`nm`.`exam_100` between 55.00 and 59.99) then 2.75 when (`nm`.`exam_100` between 50.00 and 54.99) then 2.50 when (`nm`.`exam_100` between 45.00 and 49.99) then 2.25 when (`nm`.`exam_100` between 40.00 and 44.99) then 2.00 when (`nm`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `COM317`,(case when (`os`.`exam_100` between 75.00 and 100.00) then 4.00 when (`os`.`exam_100` between 70.00 and 74.99) then 3.50 when (`os`.`exam_100` between 65.00 and 69.99) then 3.25 when (`os`.`exam_100` between 60.00 and 64.99) then 3.00 when (`os`.`exam_100` between 55.00 and 59.99) then 2.75 when (`os`.`exam_100` between 50.00 and 54.99) then 2.50 when (`os`.`exam_100` between 45.00 and 49.99) then 2.25 when (`os`.`exam_100` between 40.00 and 44.99) then 2.00 when (`os`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `COM311`,(case when (`cpp`.`exam_100` between 75.00 and 100.00) then 4.00 when (`cpp`.`exam_100` between 70.00 and 74.99) then 3.50 when (`cpp`.`exam_100` between 65.00 and 69.99) then 3.25 when (`cpp`.`exam_100` between 60.00 and 64.99) then 3.00 when (`cpp`.`exam_100` between 55.00 and 59.99) then 2.75 when (`cpp`.`exam_100` between 50.00 and 54.99) then 2.50 when (`cpp`.`exam_100` between 45.00 and 49.99) then 2.25 when (`cpp`.`exam_100` between 40.00 and 44.99) then 2.00 when (`cpp`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `COM313`,(case when (`eng`.`exam_100` between 75.00 and 100.00) then 4.00 when (`eng`.`exam_100` between 70.00 and 74.99) then 3.50 when (`eng`.`exam_100` between 65.00 and 69.99) then 3.25 when (`eng`.`exam_100` between 60.00 and 64.99) then 3.00 when (`eng`.`exam_100` between 55.00 and 59.99) then 2.75 when (`eng`.`exam_100` between 50.00 and 54.99) then 2.50 when (`eng`.`exam_100` between 45.00 and 49.99) then 2.25 when (`eng`.`exam_100` between 40.00 and 44.99) then 2.00 when (`eng`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `GNS301`,(case when (`or`.`exam_100` between 75.00 and 100.00) then 4.00 when (`or`.`exam_100` between 70.00 and 74.99) then 3.50 when (`or`.`exam_100` between 65.00 and 69.99) then 3.25 when (`or`.`exam_100` between 60.00 and 64.99) then 3.00 when (`or`.`exam_100` between 55.00 and 59.99) then 2.75 when (`or`.`exam_100` between 50.00 and 54.99) then 2.50 when (`or`.`exam_100` between 45.00 and 49.99) then 2.25 when (`or`.`exam_100` between 40.00 and 44.99) then 2.00 when (`or`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `STA314` from ((((((((((`hnd1fs_a_algebra` `alg` join `users` `st` on((`alg`.`user_id` = `st`.`user_id`))) join `hnd1fs_a_calculus` `cal` on((`st`.`user_id` = `cal`.`user_id`))) join `hnd1fs_d_design` `db` on((`st`.`user_id` = `db`.`user_id`))) join `hnd1fs_c_architecture` `ca` on((`st`.`user_id` = `ca`.`user_id`))) join `hnd1fs_s_theory` `sth` on((`st`.`user_id` = `sth`.`user_id`))) join `hnd1fs_n_methods` `nm` on((`st`.`user_id` = `nm`.`user_id`))) join `hnd1fs_o_system` `os` on((`st`.`user_id` = `os`.`user_id`))) join `hnd1fs_p_c++` `cpp` on((`st`.`user_id` = `cpp`.`user_id`))) join `hnd1fs_u_english` `eng` on((`st`.`user_id` = `eng`.`user_id`))) join `hnd1fs_o_research` `or` on((`st`.`user_id` = `or`.`user_id`))) ;



CREATE VIEW `hnd1fs_result`  AS  select `sg`.`matric_no` AS `matric_no`,`sg`.`GNS301` AS `GNS301`,`sg`.`STA311` AS `STA311`,`sg`.`COM312` AS `COM312`,`sg`.`COM314` AS `COM314`,`sg`.`MTH312` AS `MTH312`,`sg`.`STA314` AS `STA314`,`sg`.`COM313` AS `COM313`,`sg`.`COM311` AS `COM311`,`sg`.`COM317` AS `COM317`,`sg`.`MTH311` AS `MTH311`,((((((((((`stg`.`GNS301` * 2) + (`stg`.`STA311` * 2)) + (`stg`.`COM312` * 3)) + (`stg`.`COM314` * 3)) + (`stg`.`MTH312` * 2)) + (`stg`.`STA314` * 3)) + (`stg`.`COM313` * 3)) + (`stg`.`COM311` * 3)) + (`stg`.`COM317` * 3)) + (`stg`.`MTH311` * 2)) AS `WGP`,round((((((((((((`stg`.`GNS301` * 2) + (`stg`.`STA311` * 2)) + (`stg`.`COM312` * 3)) + (`stg`.`COM314` * 3)) + (`stg`.`MTH312` * 2)) + (`stg`.`STA314` * 3)) + (`stg`.`COM313` * 3)) + (`stg`.`COM311` * 3)) + (`stg`.`COM317` * 3)) + (`stg`.`MTH311` * 2)) / 26),2) AS `GPA`,(case when ((((((((((((`stg`.`GNS301` * 2) + (`stg`.`STA311` * 2)) + (`stg`.`COM312` * 3)) + (`stg`.`COM314` * 3)) + (`stg`.`MTH312` * 2)) + (`stg`.`STA314` * 3)) + (`stg`.`COM313` * 3)) + (`stg`.`COM311` * 3)) + (`stg`.`COM317` * 3)) + (`stg`.`MTH311` * 2)) / 26) between 3.50 and 4.00) then 'DISTINCTION' when ((((((((((((`stg`.`GNS301` * 2) + (`stg`.`STA311` * 2)) + (`stg`.`COM312` * 3)) + (`stg`.`COM314` * 3)) + (`stg`.`MTH312` * 2)) + (`stg`.`STA314` * 3)) + (`stg`.`COM313` * 3)) + (`stg`.`COM311` * 3)) + (`stg`.`COM317` * 3)) + (`stg`.`MTH311` * 2)) / 26) between 3.00 and 3.49) then 'UPPER CREDIT' when ((((((((((((`stg`.`GNS301` * 2) + (`stg`.`STA311` * 2)) + (`stg`.`COM312` * 3)) + (`stg`.`COM314` * 3)) + (`stg`.`MTH312` * 2)) + (`stg`.`STA314` * 3)) + (`stg`.`COM313` * 3)) + (`stg`.`COM311` * 3)) + (`stg`.`COM317` * 3)) + (`stg`.`MTH311` * 2)) / 26) between 2.00 and 2.99) then 'LOWER CREDIT' when ((((((((((((`stg`.`GNS301` * 2) + (`stg`.`STA311` * 2)) + (`stg`.`COM312` * 3)) + (`stg`.`COM314` * 3)) + (`stg`.`MTH312` * 2)) + (`stg`.`STA314` * 3)) + (`stg`.`COM313` * 3)) + (`stg`.`COM311` * 3)) + (`stg`.`COM317` * 3)) + (`stg`.`MTH311` * 2)) / 26) between 1.5 and 1.99) then 'FAILED' end) AS `REMARK` from (`hnd1fs_grade_point` `stg` left join `hnd1fs_grade` `sg` on((`stg`.`matric_no` = `sg`.`matric_no`))) ;



CREATE VIEW `hnd1ss_grade`  AS  select concat(`st`.`firstname`,' ',`st`.`lastname`) AS `std_name`,`st`.`user_id` AS `matric_no`,(case when (`ass`.`exam_100` between 75.00 and 100.00) then 'A1' when (`ass`.`exam_100` between 70.00 and 74.99) then 'A2' when (`ass`.`exam_100` between 65.00 and 69.99) then 'B1' when (`ass`.`exam_100` between 60.00 and 64.99) then 'B2' when (`ass`.`exam_100` between 55.00 and 59.99) then 'C1' when (`ass`.`exam_100` between 50.00 and 54.99) then 'C2' when (`ass`.`exam_100` between 45.00 and 49.99) then 'D1' when (`ass`.`exam_100` between 40.00 and 44.99) then 'D2' when (`ass`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `COM323`,(case when (`java`.`exam_100` between 75.00 and 100.00) then 'A1' when (`java`.`exam_100` between 70.00 and 74.99) then 'A2' when (`java`.`exam_100` between 65.00 and 69.99) then 'B1' when (`java`.`exam_100` between 60.00 and 64.99) then 'B2' when (`java`.`exam_100` between 55.00 and 59.99) then 'C1' when (`java`.`exam_100` between 50.00 and 54.99) then 'C2' when (`java`.`exam_100` between 45.00 and 49.99) then 'D1' when (`java`.`exam_100` between 40.00 and 44.99) then 'D2' when (`java`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `COM325`,(case when (`db`.`exam_100` between 75.00 and 100.00) then 'A1' when (`db`.`exam_100` between 70.00 and 74.99) then 'A2' when (`db`.`exam_100` between 65.00 and 69.99) then 'B1' when (`db`.`exam_100` between 60.00 and 64.99) then 'B2' when (`db`.`exam_100` between 55.00 and 59.99) then 'C1' when (`db`.`exam_100` between 50.00 and 54.99) then 'C2' when (`db`.`exam_100` between 45.00 and 49.99) then 'D1' when (`db`.`exam_100` between 40.00 and 44.99) then 'D2' when (`db`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `COM322`,(case when (`eed`.`exam_100` between 75.00 and 100.00) then 'A1' when (`eed`.`exam_100` between 70.00 and 74.99) then 'A2' when (`eed`.`exam_100` between 65.00 and 69.99) then 'B1' when (`eed`.`exam_100` between 60.00 and 64.99) then 'B2' when (`eed`.`exam_100` between 55.00 and 59.99) then 'C1' when (`eed`.`exam_100` between 50.00 and 54.99) then 'C2' when (`eed`.`exam_100` between 45.00 and 49.99) then 'D1' when (`eed`.`exam_100` between 40.00 and 44.99) then 'D2' when (`eed`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `EDD316`,(case when (`sth`.`exam_100` between 75.00 and 100.00) then 'A1' when (`sth`.`exam_100` between 70.00 and 74.99) then 'A2' when (`sth`.`exam_100` between 65.00 and 69.99) then 'B1' when (`sth`.`exam_100` between 60.00 and 64.99) then 'B2' when (`sth`.`exam_100` between 55.00 and 59.99) then 'C1' when (`sth`.`exam_100` between 50.00 and 54.99) then 'C2' when (`sth`.`exam_100` between 45.00 and 49.99) then 'D1' when (`sth`.`exam_100` between 40.00 and 44.99) then 'D2' when (`sth`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `STA321`,(case when (`se`.`exam_100` between 75.00 and 100.00) then 'A1' when (`se`.`exam_100` between 70.00 and 74.99) then 'A2' when (`se`.`exam_100` between 65.00 and 69.99) then 'B1' when (`se`.`exam_100` between 60.00 and 64.99) then 'B2' when (`se`.`exam_100` between 55.00 and 59.99) then 'C1' when (`se`.`exam_100` between 50.00 and 54.99) then 'C2' when (`se`.`exam_100` between 45.00 and 49.99) then 'D1' when (`se`.`exam_100` between 40.00 and 44.99) then 'D2' when (`se`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `COM324`,(case when (`os`.`exam_100` between 75.00 and 100.00) then 'A1' when (`os`.`exam_100` between 70.00 and 74.99) then 'A2' when (`os`.`exam_100` between 65.00 and 69.99) then 'B1' when (`os`.`exam_100` between 60.00 and 64.99) then 'B2' when (`os`.`exam_100` between 55.00 and 59.99) then 'C1' when (`os`.`exam_100` between 50.00 and 54.99) then 'C2' when (`os`.`exam_100` between 45.00 and 49.99) then 'D1' when (`os`.`exam_100` between 40.00 and 44.99) then 'D2' when (`os`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `COM321`,(case when (`hci`.`exam_100` between 75.00 and 100.00) then 'A1' when (`hci`.`exam_100` between 70.00 and 74.99) then 'A2' when (`hci`.`exam_100` between 65.00 and 69.99) then 'B1' when (`hci`.`exam_100` between 60.00 and 64.99) then 'B2' when (`hci`.`exam_100` between 55.00 and 59.99) then 'C1' when (`hci`.`exam_100` between 50.00 and 54.99) then 'C2' when (`hci`.`exam_100` between 45.00 and 49.99) then 'D1' when (`hci`.`exam_100` between 40.00 and 44.99) then 'D2' when (`hci`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `COM326`,(case when (`eng`.`exam_100` between 75.00 and 100.00) then 'A1' when (`eng`.`exam_100` between 70.00 and 74.99) then 'A2' when (`eng`.`exam_100` between 65.00 and 69.99) then 'B1' when (`eng`.`exam_100` between 60.00 and 64.99) then 'B2' when (`eng`.`exam_100` between 55.00 and 59.99) then 'C1' when (`eng`.`exam_100` between 50.00 and 54.99) then 'C2' when (`eng`.`exam_100` between 45.00 and 49.99) then 'D1' when (`eng`.`exam_100` between 40.00 and 44.99) then 'D2' when (`eng`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `GNS302`,(case when (`rm`.`exam_100` between 75.00 and 100.00) then 'A1' when (`rm`.`exam_100` between 70.00 and 74.99) then 'A2' when (`rm`.`exam_100` between 65.00 and 69.99) then 'B1' when (`rm`.`exam_100` between 60.00 and 64.99) then 'B2' when (`rm`.`exam_100` between 55.00 and 59.99) then 'C1' when (`rm`.`exam_100` between 50.00 and 54.99) then 'C2' when (`rm`.`exam_100` between 45.00 and 49.99) then 'D1' when (`rm`.`exam_100` between 40.00 and 44.99) then 'D2' when (`rm`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `GNS304` from ((((((((((`hnd1ss_a_language` `ass` join `users` `st` on((`ass`.`user_id` = `st`.`user_id`))) join `hnd1ss_c_java` `java` on((`st`.`user_id` = `java`.`user_id`))) join `hnd1ss_d_design` `db` on((`st`.`user_id` = `db`.`user_id`))) join `hnd1ss_e_development` `eed` on((`st`.`user_id` = `eed`.`user_id`))) join `hnd1ss_s_theory` `sth` on((`st`.`user_id` = `sth`.`user_id`))) join `hnd1ss_s_engineering` `se` on((`st`.`user_id` = `se`.`user_id`))) join `hnd1ss_o_system` `os` on((`st`.`user_id` = `os`.`user_id`))) join `hnd1ss_i_hci` `hci` on((`st`.`user_id` = `hci`.`user_id`))) join `hnd1ss_c_english` `eng` on((`st`.`user_id` = `eng`.`user_id`))) join `hnd1ss_r_methodology` `rm` on((`st`.`user_id` = `rm`.`user_id`))) ;



CREATE VIEW `hnd1ss_grade_point`  AS  select concat(`st`.`firstname`,' ',`st`.`lastname`) AS `std_name`,`st`.`user_id` AS `matric_no`,(case when (`ass`.`exam_100` between 75.00 and 100.00) then 4.00 when (`ass`.`exam_100` between 70.00 and 74.99) then 3.50 when (`ass`.`exam_100` between 65.00 and 69.99) then 3.25 when (`ass`.`exam_100` between 60.00 and 64.99) then 3.00 when (`ass`.`exam_100` between 55.00 and 59.99) then 2.75 when (`ass`.`exam_100` between 50.00 and 54.99) then 2.50 when (`ass`.`exam_100` between 45.00 and 49.99) then 2.25 when (`ass`.`exam_100` between 40.00 and 44.99) then 2.00 when (`ass`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `COM323`,(case when (`java`.`exam_100` between 75.00 and 100.00) then 4.00 when (`java`.`exam_100` between 70.00 and 74.99) then 3.50 when (`java`.`exam_100` between 65.00 and 69.99) then 3.25 when (`java`.`exam_100` between 60.00 and 64.99) then 3.00 when (`java`.`exam_100` between 55.00 and 59.99) then 2.75 when (`java`.`exam_100` between 50.00 and 54.99) then 2.50 when (`java`.`exam_100` between 45.00 and 49.99) then 2.25 when (`java`.`exam_100` between 40.00 and 44.99) then 2.00 when (`java`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `COM325`,(case when (`db`.`exam_100` between 75.00 and 100.00) then 4.00 when (`db`.`exam_100` between 70.00 and 74.99) then 3.50 when (`db`.`exam_100` between 65.00 and 69.99) then 3.25 when (`db`.`exam_100` between 60.00 and 64.99) then 3.00 when (`db`.`exam_100` between 55.00 and 59.99) then 2.75 when (`db`.`exam_100` between 50.00 and 54.99) then 2.50 when (`db`.`exam_100` between 45.00 and 49.99) then 2.25 when (`db`.`exam_100` between 40.00 and 44.99) then 2.00 when (`db`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `COM322`,(case when (`eed`.`exam_100` between 75.00 and 100.00) then 4.00 when (`eed`.`exam_100` between 70.00 and 74.99) then 3.50 when (`eed`.`exam_100` between 65.00 and 69.99) then 3.25 when (`eed`.`exam_100` between 60.00 and 64.99) then 3.00 when (`eed`.`exam_100` between 55.00 and 59.99) then 2.75 when (`eed`.`exam_100` between 50.00 and 54.99) then 2.50 when (`eed`.`exam_100` between 45.00 and 49.99) then 2.25 when (`eed`.`exam_100` between 40.00 and 44.99) then 2.00 when (`eed`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `EDD316`,(case when (`sth`.`exam_100` between 75.00 and 100.00) then 4.00 when (`sth`.`exam_100` between 70.00 and 74.99) then 3.50 when (`sth`.`exam_100` between 65.00 and 69.99) then 3.25 when (`sth`.`exam_100` between 60.00 and 64.99) then 3.00 when (`sth`.`exam_100` between 55.00 and 59.99) then 2.75 when (`sth`.`exam_100` between 50.00 and 54.99) then 2.50 when (`sth`.`exam_100` between 45.00 and 49.99) then 2.25 when (`sth`.`exam_100` between 40.00 and 44.99) then 2.00 when (`sth`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `STA321`,(case when (`se`.`exam_100` between 75.00 and 100.00) then 4.00 when (`se`.`exam_100` between 70.00 and 74.99) then 3.50 when (`se`.`exam_100` between 65.00 and 69.99) then 3.25 when (`se`.`exam_100` between 60.00 and 64.99) then 3.00 when (`se`.`exam_100` between 55.00 and 59.99) then 2.75 when (`se`.`exam_100` between 50.00 and 54.99) then 2.50 when (`se`.`exam_100` between 45.00 and 49.99) then 2.25 when (`se`.`exam_100` between 40.00 and 44.99) then 2.00 when (`se`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `COM324`,(case when (`os`.`exam_100` between 75.00 and 100.00) then 4.00 when (`os`.`exam_100` between 70.00 and 74.99) then 3.50 when (`os`.`exam_100` between 65.00 and 69.99) then 3.25 when (`os`.`exam_100` between 60.00 and 64.99) then 3.00 when (`os`.`exam_100` between 55.00 and 59.99) then 2.75 when (`os`.`exam_100` between 50.00 and 54.99) then 2.50 when (`os`.`exam_100` between 45.00 and 49.99) then 2.25 when (`os`.`exam_100` between 40.00 and 44.99) then 2.00 when (`os`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `COM321`,(case when (`hci`.`exam_100` between 75.00 and 100.00) then 4.00 when (`hci`.`exam_100` between 70.00 and 74.99) then 3.50 when (`hci`.`exam_100` between 65.00 and 69.99) then 3.25 when (`hci`.`exam_100` between 60.00 and 64.99) then 3.00 when (`hci`.`exam_100` between 55.00 and 59.99) then 2.75 when (`hci`.`exam_100` between 50.00 and 54.99) then 2.50 when (`hci`.`exam_100` between 45.00 and 49.99) then 2.25 when (`hci`.`exam_100` between 40.00 and 44.99) then 2.00 when (`hci`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `COM326`,(case when (`eng`.`exam_100` between 75.00 and 100.00) then 4.00 when (`eng`.`exam_100` between 70.00 and 74.99) then 3.50 when (`eng`.`exam_100` between 65.00 and 69.99) then 3.25 when (`eng`.`exam_100` between 60.00 and 64.99) then 3.00 when (`eng`.`exam_100` between 55.00 and 59.99) then 2.75 when (`eng`.`exam_100` between 50.00 and 54.99) then 2.50 when (`eng`.`exam_100` between 45.00 and 49.99) then 2.25 when (`eng`.`exam_100` between 40.00 and 44.99) then 2.00 when (`eng`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `GNS302`,(case when (`rm`.`exam_100` between 75.00 and 100.00) then 4.00 when (`rm`.`exam_100` between 70.00 and 74.99) then 3.50 when (`rm`.`exam_100` between 65.00 and 69.99) then 3.25 when (`rm`.`exam_100` between 60.00 and 64.99) then 3.00 when (`rm`.`exam_100` between 55.00 and 59.99) then 2.75 when (`rm`.`exam_100` between 50.00 and 54.99) then 2.50 when (`rm`.`exam_100` between 45.00 and 49.99) then 2.25 when (`rm`.`exam_100` between 40.00 and 44.99) then 2.00 when (`rm`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `GNS304` from ((((((((((`hnd1ss_a_language` `ass` join `users` `st` on((`ass`.`user_id` = `st`.`user_id`))) join `hnd1ss_c_java` `java` on((`st`.`user_id` = `java`.`user_id`))) join `hnd1ss_d_design` `db` on((`st`.`user_id` = `db`.`user_id`))) join `hnd1ss_e_development` `eed` on((`st`.`user_id` = `eed`.`user_id`))) join `hnd1ss_s_theory` `sth` on((`st`.`user_id` = `sth`.`user_id`))) join `hnd1ss_s_engineering` `se` on((`st`.`user_id` = `se`.`user_id`))) join `hnd1ss_o_system` `os` on((`st`.`user_id` = `os`.`user_id`))) join `hnd1ss_i_hci` `hci` on((`st`.`user_id` = `hci`.`user_id`))) join `hnd1ss_c_english` `eng` on((`st`.`user_id` = `eng`.`user_id`))) join `hnd1ss_r_methodology` `rm` on((`st`.`user_id` = `rm`.`user_id`))) ;



CREATE VIEW `hnd1ss_result`  AS  select `hnd1ss_grade`.`matric_no` AS `matric_no`,`hnd1ss_grade`.`COM323` AS `COM323`,`hnd1ss_grade`.`COM325` AS `COM325`,`hnd1ss_grade`.`COM322` AS `COM322`,`hnd1ss_grade`.`EDD316` AS `EDD316`,`hnd1ss_grade`.`STA321` AS `STA321`,`hnd1ss_grade`.`COM324` AS `COM324`,`hnd1ss_grade`.`COM321` AS `COM321`,`hnd1ss_grade`.`COM326` AS `COM326`,`hnd1ss_grade`.`GNS302` AS `GNS302`,`hnd1ss_grade`.`GNS304` AS `GNS304`,(((((((((((`hnd1ss_grade_point`.`COM323` * 3) + (`hnd1ss_grade_point`.`COM325` * 3)) + (`hnd1ss_grade_point`.`COM322` * 2)) + (`hnd1ss_grade_point`.`EDD316` * 2)) + (`hnd1ss_grade_point`.`STA321` * 2)) + (`hnd1ss_grade_point`.`COM324` * 3)) + (`hnd1ss_grade_point`.`COM321` * 3)) + (`hnd1ss_grade_point`.`COM326` * 3)) + (`hnd1ss_grade_point`.`GNS302` * 2)) + (`hnd1ss_grade_point`.`GNS304` * 2)) + `hnd1fs_result`.`WGP`) AS `CWGP`,round(((((((((((((`hnd1ss_grade_point`.`COM323` * 3) + (`hnd1ss_grade_point`.`COM325` * 3)) + (`hnd1ss_grade_point`.`COM322` * 2)) + (`hnd1ss_grade_point`.`EDD316` * 2)) + (`hnd1ss_grade_point`.`STA321` * 2)) + (`hnd1ss_grade_point`.`COM324` * 3)) + (`hnd1ss_grade_point`.`COM321` * 3)) + (`hnd1ss_grade_point`.`COM326` * 3)) + (`hnd1ss_grade_point`.`GNS302` * 2)) + (`hnd1ss_grade_point`.`GNS304` * 2)) + `hnd1fs_result`.`WGP`) / 52),2) AS `CGPA`,(case when (((((((((((((`hnd1ss_grade_point`.`COM323` * 3) + (`hnd1ss_grade_point`.`COM325` * 3)) + (`hnd1ss_grade_point`.`COM322` * 2)) + (`hnd1ss_grade_point`.`EDD316` * 2)) + (`hnd1ss_grade_point`.`STA321` * 2)) + (`hnd1ss_grade_point`.`COM324` * 3)) + (`hnd1ss_grade_point`.`COM321` * 3)) + (`hnd1ss_grade_point`.`COM326` * 3)) + (`hnd1ss_grade_point`.`GNS302` * 2)) + (`hnd1ss_grade_point`.`GNS304` * 2)) + `hnd1fs_result`.`WGP`) / 52) between 3.50 and 4.00) then 'DISTINCTION' when (((((((((((((`hnd1ss_grade_point`.`COM323` * 3) + (`hnd1ss_grade_point`.`COM325` * 3)) + (`hnd1ss_grade_point`.`COM322` * 2)) + (`hnd1ss_grade_point`.`EDD316` * 2)) + (`hnd1ss_grade_point`.`STA321` * 2)) + (`hnd1ss_grade_point`.`COM324` * 3)) + (`hnd1ss_grade_point`.`COM321` * 3)) + (`hnd1ss_grade_point`.`COM326` * 3)) + (`hnd1ss_grade_point`.`GNS302` * 2)) + (`hnd1ss_grade_point`.`GNS304` * 2)) + `hnd1fs_result`.`WGP`) / 52) between 3.00 and 3.49) then 'UPPER CREDIT' when (((((((((((((`hnd1ss_grade_point`.`COM323` * 3) + (`hnd1ss_grade_point`.`COM325` * 3)) + (`hnd1ss_grade_point`.`COM322` * 2)) + (`hnd1ss_grade_point`.`EDD316` * 2)) + (`hnd1ss_grade_point`.`STA321` * 2)) + (`hnd1ss_grade_point`.`COM324` * 3)) + (`hnd1ss_grade_point`.`COM321` * 3)) + (`hnd1ss_grade_point`.`COM326` * 3)) + (`hnd1ss_grade_point`.`GNS302` * 2)) + (`hnd1ss_grade_point`.`GNS304` * 2)) + `hnd1fs_result`.`WGP`) / 52) between 2.00 and 2.99) then 'LOWER CREDIT' when (((((((((((((`hnd1ss_grade_point`.`COM323` * 3) + (`hnd1ss_grade_point`.`COM325` * 3)) + (`hnd1ss_grade_point`.`COM322` * 2)) + (`hnd1ss_grade_point`.`EDD316` * 2)) + (`hnd1ss_grade_point`.`STA321` * 2)) + (`hnd1ss_grade_point`.`COM324` * 3)) + (`hnd1ss_grade_point`.`COM321` * 3)) + (`hnd1ss_grade_point`.`COM326` * 3)) + (`hnd1ss_grade_point`.`GNS302` * 2)) + (`hnd1ss_grade_point`.`GNS304` * 2)) + `hnd1fs_result`.`WGP`) / 52) between 0.00 and 1.99) then 'FAIL' end) AS `REMARK` from ((`hnd1ss_grade_point` left join `hnd1ss_grade` on((`hnd1ss_grade_point`.`matric_no` = `hnd1ss_grade`.`matric_no`))) left join `hnd1fs_result` on((`hnd1fs_result`.`matric_no` = `hnd1ss_grade_point`.`matric_no`))) ;



CREATE AVIEW `nd1fs_grade`  AS  select concat(`st`.`firstname`,' ',`st`.`lastname`) AS `std_name`,`st`.`user_id` AS `matric_no`,(case when (`geo`.`exam_100` between 75.00 and 100.00) then 'A1' when (`geo`.`exam_100` between 70.00 and 74.99) then 'A2' when (`geo`.`exam_100` between 65.00 and 69.99) then 'B1' when (`geo`.`exam_100` between 60.00 and 64.99) then 'B2' when (`geo`.`exam_100` between 55.00 and 59.99) then 'C1' when (`geo`.`exam_100` between 50.00 and 54.99) then 'C2' when (`geo`.`exam_100` between 45.00 and 49.99) then 'D1' when (`geo`.`exam_100` between 40.00 and 44.99) then 'D2' when (`geo`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `MTH112`,(case when (`ce`.`exam_100` between 75.00 and 100.00) then 'A1' when (`ce`.`exam_100` between 70.00 and 74.99) then 'A2' when (`ce`.`exam_100` between 65.00 and 69.99) then 'B1' when (`ce`.`exam_100` between 60.00 and 64.99) then 'B2' when (`ce`.`exam_100` between 55.00 and 59.99) then 'C1' when (`ce`.`exam_100` between 50.00 and 54.99) then 'C2' when (`ce`.`exam_100` between 45.00 and 49.99) then 'D1' when (`ce`.`exam_100` between 40.00 and 44.99) then 'D2' when (`ce`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `GNS111`,(case when (`de`.`exam_100` between 75.00 and 100.00) then 'A1' when (`de`.`exam_100` between 70.00 and 74.99) then 'A2' when (`de`.`exam_100` between 65.00 and 69.99) then 'B1' when (`de`.`exam_100` between 60.00 and 64.99) then 'B2' when (`de`.`exam_100` between 55.00 and 59.99) then 'C1' when (`de`.`exam_100` between 50.00 and 54.99) then 'C2' when (`de`.`exam_100` between 45.00 and 49.99) then 'D1' when (`de`.`exam_100` between 40.00 and 44.99) then 'D2' when (`de`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `COM112`,(case when (`ds`.`exam_100` between 75.00 and 100.00) then 'A1' when (`ds`.`exam_100` between 70.00 and 74.99) then 'A2' when (`ds`.`exam_100` between 65.00 and 69.99) then 'B1' when (`ds`.`exam_100` between 60.00 and 64.99) then 'B2' when (`ds`.`exam_100` between 55.00 and 59.99) then 'C1' when (`ds`.`exam_100` between 50.00 and 54.99) then 'C2' when (`ds`.`exam_100` between 45.00 and 49.99) then 'D1' when (`ds`.`exam_100` between 40.00 and 44.99) then 'D2' when (`ds`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `STA112`,(case when (`ic`.`exam_100` between 75.00 and 100.00) then 'A1' when (`ic`.`exam_100` between 70.00 and 74.99) then 'A2' when (`ic`.`exam_100` between 65.00 and 69.99) then 'B1' when (`ic`.`exam_100` between 60.00 and 64.99) then 'B2' when (`ic`.`exam_100` between 55.00 and 59.99) then 'C1' when (`ic`.`exam_100` between 50.00 and 54.99) then 'C2' when (`ic`.`exam_100` between 45.00 and 49.99) then 'D1' when (`ic`.`exam_100` between 40.00 and 44.99) then 'D2' when (`ic`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `COM111`,(case when (`ip`.`exam_100` between 75.00 and 100.00) then 'A1' when (`ip`.`exam_100` between 70.00 and 74.99) then 'A2' when (`ip`.`exam_100` between 65.00 and 69.99) then 'B1' when (`ip`.`exam_100` between 60.00 and 64.99) then 'B2' when (`ip`.`exam_100` between 55.00 and 59.99) then 'C1' when (`ip`.`exam_100` between 50.00 and 54.99) then 'C2' when (`ip`.`exam_100` between 45.00 and 49.99) then 'D1' when (`ip`.`exam_100` between 40.00 and 44.99) then 'D2' when (`ip`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `COM113`,(case when (`la`.`exam_100` between 75.00 and 100.00) then 'A1' when (`la`.`exam_100` between 70.00 and 74.99) then 'A2' when (`la`.`exam_100` between 65.00 and 69.99) then 'B1' when (`la`.`exam_100` between 60.00 and 64.99) then 'B2' when (`la`.`exam_100` between 55.00 and 59.99) then 'C1' when (`la`.`exam_100` between 50.00 and 54.99) then 'C2' when (`la`.`exam_100` between 45.00 and 49.99) then 'D1' when (`la`.`exam_100` between 40.00 and 44.99) then 'D2' when (`la`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `MTH111`,(case when (`lo`.`exam_100` between 75.00 and 100.00) then 'A1' when (`lo`.`exam_100` between 70.00 and 74.99) then 'A2' when (`lo`.`exam_100` between 65.00 and 69.99) then 'B1' when (`lo`.`exam_100` between 60.00 and 64.99) then 'B2' when (`lo`.`exam_100` between 55.00 and 59.99) then 'C1' when (`lo`.`exam_100` between 50.00 and 54.99) then 'C2' when (`lo`.`exam_100` between 45.00 and 49.99) then 'D1' when (`lo`.`exam_100` between 40.00 and 44.99) then 'D2' when (`lo`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `COM115`,(case when (`pt`.`exam_100` between 75.00 and 100.00) then 'A1' when (`pt`.`exam_100` between 70.00 and 74.99) then 'A2' when (`pt`.`exam_100` between 65.00 and 69.99) then 'B1' when (`pt`.`exam_100` between 60.00 and 64.99) then 'B2' when (`pt`.`exam_100` between 55.00 and 59.99) then 'C1' when (`pt`.`exam_100` between 50.00 and 54.99) then 'C2' when (`pt`.`exam_100` between 45.00 and 49.99) then 'D1' when (`pt`.`exam_100` between 40.00 and 44.99) then 'D2' when (`pt`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `STA117`,(case when (`eng`.`exam_100` between 75.00 and 100.00) then 'A1' when (`eng`.`exam_100` between 70.00 and 74.99) then 'A2' when (`eng`.`exam_100` between 65.00 and 69.99) then 'B1' when (`eng`.`exam_100` between 60.00 and 64.99) then 'B2' when (`eng`.`exam_100` between 55.00 and 59.99) then 'C1' when (`eng`.`exam_100` between 50.00 and 54.99) then 'C2' when (`eng`.`exam_100` between 45.00 and 49.99) then 'D1' when (`eng`.`exam_100` between 40.00 and 44.99) then 'D2' when (`eng`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `GNS101`,(case when (`pu`.`exam_100` between 75.00 and 100.00) then 'A1' when (`pu`.`exam_100` between 70.00 and 74.99) then 'A2' when (`pu`.`exam_100` between 65.00 and 69.99) then 'B1' when (`pu`.`exam_100` between 60.00 and 64.99) then 'B2' when (`pu`.`exam_100` between 55.00 and 59.99) then 'C1' when (`pu`.`exam_100` between 50.00 and 54.99) then 'C2' when (`pu`.`exam_100` between 45.00 and 49.99) then 'D1' when (`pu`.`exam_100` between 40.00 and 44.99) then 'D2' when (`pu`.`exam_100` between 0.00 and 39.99) then 'F' else 'NE' end) AS `COM114` from (((((((((((`nd1fs_a_geometry` `geo` join `users` `st` on((`geo`.`user_id` = `st`.`user_id`))) join `nd1fs_c_education` `ce` on((`st`.`user_id` = `ce`.`user_id`))) join `nd1fs_d_electronics` `de` on((`st`.`user_id` = `de`.`user_id`))) join `nd1fs_d_statistics` `ds` on((`st`.`user_id` = `ds`.`user_id`))) join `nd1fs_i_computing` `ic` on((`st`.`user_id` = `ic`.`user_id`))) join `nd1fs_i_programming` `ip` on((`st`.`user_id` = `ip`.`user_id`))) join `nd1fs_l_algebra` `la` on((`st`.`user_id` = `la`.`user_id`))) join `nd1fs_l_os` `lo` on((`st`.`user_id` = `lo`.`user_id`))) join `nd1fs_u_english` `eng` on((`st`.`user_id` = `eng`.`user_id`))) join `nd1fs_p_theory` `pt` on((`st`.`user_id` = `pt`.`user_id`))) join `nd1fs_p_upgrade` `pu` on((`st`.`user_id` = `pu`.`user_id`))) ;



CREATE VIEW `nd1fs_grade_point`  AS  select concat(`st`.`firstname`,' ',`st`.`lastname`) AS `std_name`,`st`.`user_id` AS `matric_no`,(case when (`geo`.`exam_100` between 75.00 and 100.00) then 4.00 when (`geo`.`exam_100` between 70.00 and 74.99) then 3.50 when (`geo`.`exam_100` between 65.00 and 69.99) then 3.25 when (`geo`.`exam_100` between 60.00 and 64.99) then 3.00 when (`geo`.`exam_100` between 55.00 and 59.99) then 2.75 when (`geo`.`exam_100` between 50.00 and 54.99) then 2.50 when (`geo`.`exam_100` between 45.00 and 49.99) then 2.25 when (`geo`.`exam_100` between 40.00 and 44.99) then 2.00 when (`geo`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `MTH112`,(case when (`ce`.`exam_100` between 75.00 and 100.00) then 4.00 when (`ce`.`exam_100` between 70.00 and 74.99) then 3.50 when (`ce`.`exam_100` between 65.00 and 69.99) then 3.25 when (`ce`.`exam_100` between 60.00 and 64.99) then 3.00 when (`ce`.`exam_100` between 55.00 and 59.99) then 2.75 when (`ce`.`exam_100` between 50.00 and 54.99) then 2.50 when (`ce`.`exam_100` between 45.00 and 49.99) then 2.25 when (`ce`.`exam_100` between 40.00 and 44.99) then 2.00 when (`ce`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `GNS111`,(case when (`de`.`exam_100` between 75.00 and 100.00) then 4.00 when (`de`.`exam_100` between 70.00 and 74.99) then 3.50 when (`de`.`exam_100` between 65.00 and 69.99) then 3.25 when (`de`.`exam_100` between 60.00 and 64.99) then 3.00 when (`de`.`exam_100` between 55.00 and 59.99) then 2.75 when (`de`.`exam_100` between 50.00 and 54.99) then 2.50 when (`de`.`exam_100` between 45.00 and 49.99) then 2.25 when (`de`.`exam_100` between 40.00 and 44.99) then 2.00 when (`de`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `COM112`,(case when (`ds`.`exam_100` between 75.00 and 100.00) then 4.00 when (`ds`.`exam_100` between 70.00 and 74.99) then 3.50 when (`ds`.`exam_100` between 65.00 and 69.99) then 3.25 when (`ds`.`exam_100` between 60.00 and 64.99) then 3.00 when (`ds`.`exam_100` between 55.00 and 59.99) then 2.75 when (`ds`.`exam_100` between 50.00 and 54.99) then 2.50 when (`ds`.`exam_100` between 45.00 and 49.99) then 2.25 when (`ds`.`exam_100` between 40.00 and 44.99) then 2.00 when (`ds`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `STA112`,(case when (`ic`.`exam_100` between 75.00 and 100.00) then 4.00 when (`ic`.`exam_100` between 70.00 and 74.99) then 3.50 when (`ic`.`exam_100` between 65.00 and 69.99) then 3.25 when (`ic`.`exam_100` between 60.00 and 64.99) then 3.00 when (`ic`.`exam_100` between 55.00 and 59.99) then 2.75 when (`ic`.`exam_100` between 50.00 and 54.99) then 2.50 when (`ic`.`exam_100` between 45.00 and 49.99) then 2.25 when (`ic`.`exam_100` between 40.00 and 44.99) then 2.00 when (`ic`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `COM111`,(case when (`ip`.`exam_100` between 75.00 and 100.00) then 4.00 when (`ip`.`exam_100` between 70.00 and 74.99) then 3.50 when (`ip`.`exam_100` between 65.00 and 69.99) then 3.25 when (`ip`.`exam_100` between 60.00 and 64.99) then 3.00 when (`ip`.`exam_100` between 55.00 and 59.99) then 2.75 when (`ip`.`exam_100` between 50.00 and 54.99) then 2.50 when (`ip`.`exam_100` between 45.00 and 49.99) then 2.25 when (`ip`.`exam_100` between 40.00 and 44.99) then 2.00 when (`ip`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `COM113`,(case when (`la`.`exam_100` between 75.00 and 100.00) then 4.00 when (`la`.`exam_100` between 70.00 and 74.99) then 3.50 when (`la`.`exam_100` between 65.00 and 69.99) then 3.25 when (`la`.`exam_100` between 60.00 and 64.99) then 3.00 when (`la`.`exam_100` between 55.00 and 59.99) then 2.75 when (`la`.`exam_100` between 50.00 and 54.99) then 2.50 when (`la`.`exam_100` between 45.00 and 49.99) then 2.25 when (`la`.`exam_100` between 40.00 and 44.99) then 2.00 when (`la`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `MTH111`,(case when (`lo`.`exam_100` between 75.00 and 100.00) then 4.00 when (`lo`.`exam_100` between 70.00 and 74.99) then 3.50 when (`lo`.`exam_100` between 65.00 and 69.99) then 3.25 when (`lo`.`exam_100` between 60.00 and 64.99) then 3.00 when (`lo`.`exam_100` between 55.00 and 59.99) then 2.75 when (`lo`.`exam_100` between 50.00 and 54.99) then 2.50 when (`lo`.`exam_100` between 45.00 and 49.99) then 2.25 when (`lo`.`exam_100` between 40.00 and 44.99) then 2.00 when (`lo`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `COM115`,(case when (`pt`.`exam_100` between 75.00 and 100.00) then 4.00 when (`pt`.`exam_100` between 70.00 and 74.99) then 3.50 when (`pt`.`exam_100` between 65.00 and 69.99) then 3.25 when (`pt`.`exam_100` between 60.00 and 64.99) then 3.00 when (`pt`.`exam_100` between 55.00 and 59.99) then 2.75 when (`pt`.`exam_100` between 50.00 and 54.99) then 2.50 when (`pt`.`exam_100` between 45.00 and 49.99) then 2.25 when (`pt`.`exam_100` between 40.00 and 44.99) then 2.00 when (`pt`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `STA117`,(case when (`eng`.`exam_100` between 75.00 and 100.00) then 4.00 when (`eng`.`exam_100` between 70.00 and 74.99) then 3.50 when (`eng`.`exam_100` between 65.00 and 69.99) then 3.25 when (`eng`.`exam_100` between 60.00 and 64.99) then 3.00 when (`eng`.`exam_100` between 55.00 and 59.99) then 2.75 when (`eng`.`exam_100` between 50.00 and 54.99) then 2.50 when (`eng`.`exam_100` between 45.00 and 49.99) then 2.25 when (`eng`.`exam_100` between 40.00 and 44.99) then 2.00 when (`eng`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `GNS101`,(case when (`pu`.`exam_100` between 75.00 and 100.00) then 4.00 when (`pu`.`exam_100` between 70.00 and 74.99) then 3.50 when (`pu`.`exam_100` between 65.00 and 69.99) then 3.25 when (`pu`.`exam_100` between 60.00 and 64.99) then 3.00 when (`pu`.`exam_100` between 55.00 and 59.99) then 2.75 when (`pu`.`exam_100` between 50.00 and 54.99) then 2.50 when (`pu`.`exam_100` between 45.00 and 49.99) then 2.25 when (`pu`.`exam_100` between 40.00 and 44.99) then 2.00 when (`pu`.`exam_100` between 0.00 and 39.99) then 0.00 else 0.00 end) AS `COM114` from (((((((((((`nd1fs_a_geometry` `geo` join `users` `st` on((`geo`.`user_id` = `st`.`user_id`))) join `nd1fs_c_education` `ce` on((`st`.`user_id` = `ce`.`user_id`))) join `nd1fs_d_electronics` `de` on((`st`.`user_id` = `de`.`user_id`))) join `nd1fs_d_statistics` `ds` on((`st`.`user_id` = `ds`.`user_id`))) join `nd1fs_i_computing` `ic` on((`st`.`user_id` = `ic`.`user_id`))) join `nd1fs_i_programming` `ip` on((`st`.`user_id` = `ip`.`user_id`))) join `nd1fs_l_algebra` `la` on((`st`.`user_id` = `la`.`user_id`))) join `nd1fs_l_os` `lo` on((`st`.`user_id` = `lo`.`user_id`))) join `nd1fs_u_english` `eng` on((`st`.`user_id` = `eng`.`user_id`))) join `nd1fs_p_theory` `pt` on((`st`.`user_id` = `pt`.`user_id`))) join `nd1fs_p_upgrade` `pu` on((`st`.`user_id` = `pu`.`user_id`))) ;



CREATE VIEW `nd1fs_result`  AS  select `sg`.`matric_no` AS `matric_no`,`sg`.`MTH112` AS `MTH112`,`sg`.`GNS111` AS `GNS111`,`sg`.`COM112` AS `COM112`,`sg`.`STA112` AS `STA112`,`sg`.`COM111` AS `COM111`,`sg`.`COM113` AS `COM113`,`sg`.`MTH111` AS `MTH111`,`sg`.`COM115` AS `COM115`,`sg`.`STA117` AS `STA117`,`sg`.`GNS101` AS `GNS101`,`sg`.`COM114` AS `COM114`,(((((((((((`stg`.`MTH112` * 2) + (`stg`.`GNS111` * 2)) + (`stg`.`COM112` * 3)) + (`stg`.`STA112` * 2)) + (`stg`.`COM111` * 3)) + (`stg`.`COM113` * 3)) + (`stg`.`MTH111` * 2)) + (`stg`.`COM115` * 3)) + (`stg`.`STA117` * 2)) + (`stg`.`GNS101` * 2)) + (`stg`.`COM114` * 3)) AS `WGP`,round(((((((((((((`stg`.`MTH112` * 2) + (`stg`.`GNS111` * 2)) + (`stg`.`COM112` * 3)) + (`stg`.`STA112` * 2)) + (`stg`.`COM111` * 3)) + (`stg`.`COM113` * 3)) + (`stg`.`MTH111` * 2)) + (`stg`.`COM115` * 3)) + (`stg`.`STA117` * 2)) + (`stg`.`GNS101` * 2)) + (`stg`.`COM114` * 3)) / 27),2) AS `GPA`,(case when (((((((((((((`stg`.`MTH112` * 2) + (`stg`.`GNS111` * 2)) + (`stg`.`COM112` * 3)) + (`stg`.`STA112` * 2)) + (`stg`.`COM111` * 3)) + (`stg`.`COM113` * 3)) + (`stg`.`MTH111` * 2)) + (`stg`.`COM115` * 3)) + (`stg`.`STA117` * 2)) + (`stg`.`GNS101` * 2)) + (`stg`.`COM114` * 3)) / 27) between 3.50 and 4.00) then 'DISTINCTION' when (((((((((((((`stg`.`MTH112` * 2) + (`stg`.`GNS111` * 2)) + (`stg`.`COM112` * 3)) + (`stg`.`STA112` * 2)) + (`stg`.`COM111` * 3)) + (`stg`.`COM113` * 3)) + (`stg`.`MTH111` * 2)) + (`stg`.`COM115` * 3)) + (`stg`.`STA117` * 2)) + (`stg`.`GNS101` * 2)) + (`stg`.`COM114` * 3)) / 27) between 3.00 and 3.49) then 'UPPER CREDIT' when (((((((((((((`stg`.`MTH112` * 2) + (`stg`.`GNS111` * 2)) + (`stg`.`COM112` * 3)) + (`stg`.`STA112` * 2)) + (`stg`.`COM111` * 3)) + (`stg`.`COM113` * 3)) + (`stg`.`MTH111` * 2)) + (`stg`.`COM115` * 3)) + (`stg`.`STA117` * 2)) + (`stg`.`GNS101` * 2)) + (`stg`.`COM114` * 3)) / 27) between 2.00 and 2.99) then 'LOWER CREDIT' when (((((((((((((`stg`.`MTH112` * 2) + (`stg`.`GNS111` * 2)) + (`stg`.`COM112` * 3)) + (`stg`.`STA112` * 2)) + (`stg`.`COM111` * 3)) + (`stg`.`COM113` * 3)) + (`stg`.`MTH111` * 2)) + (`stg`.`COM115` * 3)) + (`stg`.`STA117` * 2)) + (`stg`.`GNS101` * 2)) + (`stg`.`COM114` * 3)) / 27) between 1.5 and 1.99) then 'FAILED' end) AS `REMARK` from (`nd1fs_grade_point` `stg` left join `nd1fs_grade` `sg` on((`stg`.`matric_no` = `sg`.`matric_no`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grade_calculator`
--
ALTER TABLE `grade_calculator`
  ADD UNIQUE KEY `course_code` (`course_code`);

--
-- Indexes for table `hnd1fs_a_algebra`
--
ALTER TABLE `hnd1fs_a_algebra`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `hnd1fs_a_calculus`
--
ALTER TABLE `hnd1fs_a_calculus`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `hnd1fs_c_architecture`
--
ALTER TABLE `hnd1fs_c_architecture`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `hnd1fs_d_design`
--
ALTER TABLE `hnd1fs_d_design`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `hnd1fs_n_methods`
--
ALTER TABLE `hnd1fs_n_methods`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `hnd1fs_o_research`
--
ALTER TABLE `hnd1fs_o_research`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `hnd1fs_o_system`
--
ALTER TABLE `hnd1fs_o_system`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `hnd1fs_p_c++`
--
ALTER TABLE `hnd1fs_p_c++`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `hnd1fs_s_theory`
--
ALTER TABLE `hnd1fs_s_theory`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `hnd1fs_u_english`
--
ALTER TABLE `hnd1fs_u_english`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `hnd1ss_a_language`
--
ALTER TABLE `hnd1ss_a_language`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `hnd1ss_c_english`
--
ALTER TABLE `hnd1ss_c_english`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `hnd1ss_c_java`
--
ALTER TABLE `hnd1ss_c_java`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `hnd1ss_d_design`
--
ALTER TABLE `hnd1ss_d_design`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `hnd1ss_e_development`
--
ALTER TABLE `hnd1ss_e_development`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `hnd1ss_i_hci`
--
ALTER TABLE `hnd1ss_i_hci`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `hnd1ss_o_system`
--
ALTER TABLE `hnd1ss_o_system`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `hnd1ss_r_methodology`
--
ALTER TABLE `hnd1ss_r_methodology`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `hnd1ss_s_engineering`
--
ALTER TABLE `hnd1ss_s_engineering`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `hnd1ss_s_theory`
--
ALTER TABLE `hnd1ss_s_theory`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `nd1fs_a_geometry`
--
ALTER TABLE `nd1fs_a_geometry`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `nd1fs_c_education`
--
ALTER TABLE `nd1fs_c_education`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `nd1fs_d_electronics`
--
ALTER TABLE `nd1fs_d_electronics`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `nd1fs_d_statistics`
--
ALTER TABLE `nd1fs_d_statistics`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `nd1fs_i_computing`
--
ALTER TABLE `nd1fs_i_computing`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `nd1fs_i_programming`
--
ALTER TABLE `nd1fs_i_programming`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `nd1fs_l_algebra`
--
ALTER TABLE `nd1fs_l_algebra`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `nd1fs_l_os`
--
ALTER TABLE `nd1fs_l_os`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `nd1fs_p_theory`
--
ALTER TABLE `nd1fs_p_theory`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `nd1fs_p_upgrade`
--
ALTER TABLE `nd1fs_p_upgrade`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `nd1fs_u_english`
--
ALTER TABLE `nd1fs_u_english`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `nd2ss_c_society`
--
ALTER TABLE `nd2ss_c_society`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `page_settings`
--
ALTER TABLE `page_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`reset_id`),
  ADD UNIQUE KEY `reset_email` (`reset_email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hnd1fs_a_algebra`
--
ALTER TABLE `hnd1fs_a_algebra`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hnd1fs_a_calculus`
--
ALTER TABLE `hnd1fs_a_calculus`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hnd1fs_c_architecture`
--
ALTER TABLE `hnd1fs_c_architecture`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hnd1fs_d_design`
--
ALTER TABLE `hnd1fs_d_design`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hnd1fs_n_methods`
--
ALTER TABLE `hnd1fs_n_methods`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hnd1fs_o_research`
--
ALTER TABLE `hnd1fs_o_research`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hnd1fs_o_system`
--
ALTER TABLE `hnd1fs_o_system`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hnd1fs_p_c++`
--
ALTER TABLE `hnd1fs_p_c++`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hnd1fs_s_theory`
--
ALTER TABLE `hnd1fs_s_theory`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hnd1fs_u_english`
--
ALTER TABLE `hnd1fs_u_english`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hnd1ss_a_language`
--
ALTER TABLE `hnd1ss_a_language`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hnd1ss_c_english`
--
ALTER TABLE `hnd1ss_c_english`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hnd1ss_c_java`
--
ALTER TABLE `hnd1ss_c_java`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hnd1ss_d_design`
--
ALTER TABLE `hnd1ss_d_design`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hnd1ss_e_development`
--
ALTER TABLE `hnd1ss_e_development`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hnd1ss_i_hci`
--
ALTER TABLE `hnd1ss_i_hci`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hnd1ss_o_system`
--
ALTER TABLE `hnd1ss_o_system`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hnd1ss_r_methodology`
--
ALTER TABLE `hnd1ss_r_methodology`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hnd1ss_s_engineering`
--
ALTER TABLE `hnd1ss_s_engineering`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hnd1ss_s_theory`
--
ALTER TABLE `hnd1ss_s_theory`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nd1fs_a_geometry`
--
ALTER TABLE `nd1fs_a_geometry`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nd1fs_c_education`
--
ALTER TABLE `nd1fs_c_education`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nd1fs_d_electronics`
--
ALTER TABLE `nd1fs_d_electronics`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nd1fs_d_statistics`
--
ALTER TABLE `nd1fs_d_statistics`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nd1fs_i_computing`
--
ALTER TABLE `nd1fs_i_computing`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nd1fs_i_programming`
--
ALTER TABLE `nd1fs_i_programming`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nd1fs_l_algebra`
--
ALTER TABLE `nd1fs_l_algebra`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nd1fs_l_os`
--
ALTER TABLE `nd1fs_l_os`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nd1fs_p_theory`
--
ALTER TABLE `nd1fs_p_theory`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nd1fs_p_upgrade`
--
ALTER TABLE `nd1fs_p_upgrade`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nd1fs_u_english`
--
ALTER TABLE `nd1fs_u_english`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nd2ss_c_society`
--
ALTER TABLE `nd2ss_c_society`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `page_settings`
--
ALTER TABLE `page_settings`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `reset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
