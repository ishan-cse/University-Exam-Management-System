-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2020 at 07:04 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_supplementary_exams`
--

CREATE TABLE `assign_supplementary_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_course_list_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trimester_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seventy_percentage_marks` double DEFAULT NULL,
  `seventy_percentage_marks_attend_status` int(11) NOT NULL DEFAULT 0,
  `registrar_assign_request_status` int(11) NOT NULL DEFAULT 0,
  `faculty_finally_assign_status` int(11) NOT NULL DEFAULT 0,
  `faculty_final_submit_status` int(11) NOT NULL DEFAULT 0,
  `result_publish_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_supplementary_exams`
--

INSERT INTO `assign_supplementary_exams` (`id`, `batch_course_list_id`, `student_id`, `faculty_id`, `department_id`, `trimester_id`, `seventy_percentage_marks`, `seventy_percentage_marks_attend_status`, `registrar_assign_request_status`, `faculty_finally_assign_status`, `faculty_final_submit_status`, `result_publish_status`) VALUES
(1, '2', '5', '2', '1', '2', 60, 0, 0, 1, 1, 0),
(2, '4', '5', '3', '1', '2', NULL, 1, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_version_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_credit_hours` double NOT NULL,
  `earned_credit_hours` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `batch_name`, `department_id`, `course_version_id`, `total_credit_hours`, `earned_credit_hours`, `created_at`, `updated_at`) VALUES
(1, 'bba1', '1', '1', 131, 131, NULL, NULL),
(2, 'bba3', '1', '1', 131, 0, NULL, NULL),
(3, 'bba 2', '1', '1', 131, 4.5, NULL, NULL),
(4, 'bba 4', '1', '2', 131, 6, NULL, NULL),
(6, 'bba 5', '1', '2', 131, 0, NULL, NULL),
(7, 'bba 6', '1', '2', 131, 0, NULL, NULL),
(8, 'bba 10', '1', '2', 131, 0, NULL, NULL),
(9, 'bba 11', '1', '2', 131, 0, NULL, NULL),
(10, 'bba 12', '1', '2', 131, 0, NULL, NULL),
(11, 'CSE 12', '4', '3', 143, 0, NULL, NULL),
(12, 'CSE 13', '4', '4', 143, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `batch_course_lists`
--

CREATE TABLE `batch_course_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_code` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_hours` double NOT NULL,
  `course_version_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_term` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departmental_course_status` int(1) NOT NULL,
  `complete_status` int(11) NOT NULL DEFAULT 0,
  `prerequisite_course_code_1` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prerequisite_course_code_2` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prerequisite_course_code_3` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prerequisite_course_code_4` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prerequisite_course_code_5` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch_course_lists`
--

INSERT INTO `batch_course_lists` (`id`, `course_code`, `course_title`, `credit_hours`, `course_version_id`, `level_term`, `batch_id`, `department_id`, `departmental_course_status`, `complete_status`, `prerequisite_course_code_1`, `prerequisite_course_code_2`, `prerequisite_course_code_3`, `prerequisite_course_code_4`, `prerequisite_course_code_5`, `created_at`, `updated_at`) VALUES
(1, 'bba 1101', 'management', 3, '1', '1-2', '3', '1', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'bba 1102', 'production', 3, '1', '1-1', '3', '1', 1, 1, 'bba 1101', NULL, 'bba 1103', NULL, NULL, NULL, NULL),
(4, 'bba 1106', 'management', 3, '2', '1-1', '4', '1', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'bba 1101', 'sociology', 3, '2', '1-1', '4', '1', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'bba 1106', 'management', 3, '2', '1-1', '6', '1', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'bba 1101', 'sociology', 3, '2', '1-1', '6', '1', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'bba 1103', 'ipe', 1.5, '1', '1-1', '3', '1', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'bba 1106', 'management', 3, '2', '4-1', '7', '1', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'bba 1101', 'sociology', 2, '2', '1-1', '7', '1', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'bba 1108', 'marketing', 3, '2', '1-1', '7', '1', 1, 0, 'bba 1106', 'bba 1101', NULL, NULL, NULL, NULL, NULL),
(15, 'bba 1106', 'management', 3, '2', '1-1', '10', '1', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'bba 1101', 'sociology', 2, '2', '1-1', '10', '1', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'bba 1108', 'marketing', 3, '2', '1-3', '10', '1', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'MAT 1101', 'Differential Calculus and Integral Calculus', 3, '3', '1-1', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'ENG 1102', 'English I', 3, '3', '1-1', '11', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'PHY 1103', 'Physics (Heat and Thermodynamics, Electricity and Magnetism, and Modern Physics)', 3, '3', '1-1', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'PHY 1104', 'Physics Lab ', 1.5, '3', '1-1', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'HUM 1105', 'Bangladesh Studies', 3, '3', '1-1', '11', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'MAT 1201', 'Differential Equation and Fourier Analysis', 3, '3', '1-2', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'ENG 1202', 'English II', 3, '3', '1-2', '11', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'CSE 1203', 'Structured Programming Language ', 3, '3', '1-2', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'CSE 1204', 'Structured Programming Language Lab', 1.5, '3', '1-2', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'CSE 1205', 'Electrical Engineering and Circuit Analysis', 3, '3', '1-2', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'CSE 1206', 'Electrical Engineering and Circuit Analysis Lab', 1.5, '3', '1-2', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'MAT 1301', 'Matrices, Vectors and Coordinate Geometry', 3, '3', '1-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'CSE 1302', 'Discrete Mathematics', 3, '3', '1-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'CSE 1303', 'Object Oriented Programming', 3, '3', '1-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'CSE 1304', 'Object Oriented Programming Lab ', 1.5, '3', '1-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'CSE 1305', 'Electronic Devices and Circuits', 3, '3', '1-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'CSE 1306', 'Electronic Devices and Circuits Lab', 1.5, '3', '1-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'MAT 2101', 'Complex Variable and Laplace Transformation', 3, '3', '2-1', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'CSE 2102', 'Data Structure', 3, '3', '2-1', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'CSE 2103', 'Data Structure Lab ', 1.5, '3', '2-1', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'CSE 2104', 'Digital Logic Design', 3, '3', '2-1', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'CSE 2105', 'Digital Logic Design Lab ', 1.5, '3', '2-1', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'STA 2201', 'Statistics and Probability', 2, '3', '2-2', '11', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'ACC 2202', 'Accounting', 2, '3', '2-2', '11', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'HUM 2203', 'Critical Approach to Sociology', 2, '3', '2-2', '11', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'CSE 2204', 'Data Communication', 3, '3', '2-2', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'CSE 2205', 'Algorithm Analysis and Design  ', 3, '3', '2-2', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'CSE 2206', 'Algorithm Analysis and Design Lab', 1.5, '3', '2-2', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'CSE 2301', 'Numerical Methods', 3, '3', '2-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'HUM 2302', 'Bengali Language, Literature and History of Emergence of Bangladesh', 3, '3', '2-3', '11', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'CSE 2303', 'Microprocessor and Assembly Language Programming', 3, '3', '2-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'CSE 2304', 'Microprocessor and Assembly Language Programming Lab ', 1.5, '3', '2-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'CSE 2305', 'Theory of Computation', 3, '3', '2-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'CSE 3101', 'Database Management Systems', 3, '3', '3-1', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'CSE 3102', 'Database Management Systems Lab', 1.5, '3', '3-1', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'CSE 3103', 'Compiler Design', 3, '3', '3-1', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'CSE 3104', 'Compiler Design Lab', 1.5, '3', '3-1', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'ECO 3105', 'Economics', 2, '3', '3-1', '11', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'CSE 3201', 'Software Engineering and Information System Design', 3, '3', '3-2', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'CSE 3202', 'Computer Architecture', 3, '3', '3-2', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'CSE 3203', 'Computer Networks', 3, '3', '3-2', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'CSE 3204', 'Computer Networks Lab ', 1.5, '3', '3-2', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'CSE 3301', 'Artificial Intelligence and Expert Systems', 3, '3', '3-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'CSE 3302', 'Artificial Intelligence and Expert Systems Lab', 1.5, '3', '3-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'CSE 3303', 'Operating System', 3, '3', '3-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'CSE 3304', 'Operating System Lab ', 1.5, '3', '3-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'CSE 3305', 'Computer Security', 3, '3', '3-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'CSE 4101', 'Technical Writing and Presentation', 1.5, '3', '4-1', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'IPE 4102', 'Industrial Management', 3, '3', '4-1', '11', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'CSE 41XX', 'Option I (One optional course)', 3, '3', '4-1', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'CSE 41XX', 'Option I (One optional course) Lab', 1.5, '3', '4-1', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'CSE 4201', 'Computer Graphics ', 3, '3', '4-2', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'CSE 4202', 'Computer Graphics Lab', 1.5, '3', '4-2', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'CSE 42XX', 'Option II (One optional course)', 3, '3', '4-2', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'CSE 4399', 'Project/Thesis (Phase I)', 3, '3', '4-2', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'CSE 4301', 'Industrial Training', 1.5, '3', '4-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'CSE 43XX', 'Option II (One optional course)', 3, '3', '4-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'CSE 4399', 'Project/Thesis (Phase II)', 3, '3', '4-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'MAT 1101', 'Differential and Integral Calculus and Coordinate Geometry', 3, '4', '1-1', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'PHY 1103', 'Physics (Heat and Thermodynamics, Electricity and Magnetism, and Modern Physics)', 3, '4', '1-1', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'PHY 1104', 'Physics Lab ', 0.75, '4', '1-1', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'ENG 1105', 'English I', 3, '4', '1-1', '12', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'CSE 1201', 'Structured Programming Language', 3, '4', '1-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'CSE 1202', 'Structured Programming Language Lab ', 1.5, '4', '1-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'MAT 1203', 'Differential Equation and Statistics', 3, '4', '1-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'CHEM 1205', 'Chemistry', 3, '4', '1-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'ME 1206', 'Mechanical Engineering Drawing', 0.75, '4', '1-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'ENG 1207', 'English II', 3, '4', '1-2', '12', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'CSE 1301', 'Object Oriented Programming', 3, '4', '1-3', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'CSE 1302', 'Object Oriented Programming Lab ', 1.5, '4', '1-3', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'CSE 1303', 'Discrete Mathematics ', 3, '4', '1-3', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'EEE 1305', 'Electrical Engineering and Circuit Analysis', 3, '4', '1-3', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'EEE 1306', 'Electrical Engineering and Circuit Analysis Lab', 1.5, '4', '1-3', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'CSE 2101', 'Data Structure ', 3, '4', '2-1', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'CSE 2102', 'Data Structure Lab ', 1.5, '4', '2-1', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'EEE 2103', 'Electronic Devices and Circuits', 3, '4', '2-1', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'EEE 2104', 'Electronic Devices and Circuits Lab', 1.5, '4', '2-1', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'MAT 2105', 'Matrices, Vectors and Fourier Analysis', 3, '4', '2-1', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'HUM 2107', 'Bangladesh Studies', 3, '4', '2-1', '12', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'CSE 2201', 'Digital Logic Design', 3, '4', '2-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'CSE 2202', 'Digital Logic Design Lab', 1.5, '4', '2-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'CSE 2203', 'Algorithm Analysis and Design', 3, '4', '2-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'CSE 2204', 'Algorithm Analysis and Design Lab', 1.5, '4', '2-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'MAT 2205', 'Complex Variable and Laplace Transformation', 3, '4', '2-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'HUM 2207', 'Critical Approach to Sociology', 2, '4', '2-2', '12', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'CSE 2301', 'Database Management Systems', 3, '4', '2-3', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'CSE 2302', 'Database Management Systems Lab ', 1.5, '4', '2-3', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'CSE 2303', 'Theory of Computation', 3, '4', '2-3', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'HUM 2305', 'Bengali Language and Literature and History of Emergence of Bangladesh', 3, '4', '2-3', '12', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'CSE 3101', 'Software Engineering and Information System Design ', 3, '4', '3-1', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'CSE 3102', 'Software Engineering and Information System Design Lab ', 0.75, '4', '3-1', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'CSE 3103', 'Microprocessor and Assembly Language Programming', 3, '4', '3-1', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'CSE 3104', 'Microprocessor and Assembly Language Programming Lab ', 1.5, '4', '3-1', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'CSE 3105', 'Data Communication', 3, '4', '3-1', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'ACC 3107', 'Accounting', 2, '4', '3-1', '12', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'CSE 3201', 'Compiler Design', 3, '4', '3-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'CSE 3202', 'Compiler Design Lab', 0.75, '4', '3-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'CSE 3203', 'Computer Architecture', 3, '4', '3-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'CSE 3205', 'Numerical Methods', 3, '4', '3-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'ECO 3207', 'Economics', 3, '4', '3-2', '12', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 'CSE 3301', 'Computer Networks', 3, '4', '3-3', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 'CSE 3302', 'Computer Networks Lab ', 1.5, '4', '3-3', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'CSE 3303', 'Operating System', 3, '4', '3-3', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 'CSE 3304', 'Operating System Lab', 1.5, '4', '3-3', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 'CSE 3306', 'Technical Writing and Presentation', 0.75, '4', '3-3', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 'CSE 4101', 'Artificial Intelligence and Expert Systems', 3, '4', '4-1', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 'CSE 4102', 'Artificial Intelligence and Expert Systems Lab', 0.75, '4', '4-1', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 'CSE 4103', 'Digital System Design', 3, '4', '4-1', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'CSE 4104', 'Digital System Design Lab', 0.75, '4', '4-1', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 'IPE 4105', 'Industrial Management', 3, '4', '4-1', '12', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 'CSE 41XX', 'Option I (One optional course)', 3, '4', '4-1', '12', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 'CSE 4200', 'Project/Thesis (Phase I)', 3, '4', '4-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 'CSE 4201', 'Computer Graphics ', 3, '4', '4-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 'CSE 4202', 'Computer Graphics Lab ', 0.75, '4', '4-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 'CSE 42XX', 'Option II', 3, '4', '4-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 'CSE 42XX', 'Option II lab', 0.75, '4', '4-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 'CSE 4200', 'Project/Thesis (Phase II)', 3, '4', '4-3', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 'CSE 4300', 'Industrial Training', 1, '4', '4-3', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 'CSE 43XX', 'Option II', 3, '4', '4-3', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 'CSE 43XX', 'Option II lab', 0.75, '4', '4-3', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_code` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_hours` double NOT NULL,
  `course_version_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_term` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departmental_course_status` int(1) NOT NULL,
  `prerequisite_course_code_1` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prerequisite_course_code_2` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prerequisite_course_code_3` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prerequisite_course_code_4` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prerequisite_course_code_5` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `course_version_id`, `level_term`, `department_id`, `departmental_course_status`, `prerequisite_course_code_1`, `prerequisite_course_code_2`, `prerequisite_course_code_3`, `prerequisite_course_code_4`, `prerequisite_course_code_5`, `created_at`, `updated_at`) VALUES
(1, 'bba 1101', 'management', 3, '1', '1-1', '1', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'bba 1102', 'production', 3, '1', '1-1', '1', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'bba 1103', 'ipe', 1.5, '1', '1-3', '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'bba 1106', 'management', 3, '2', '1-1', '1', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'bba 1101', 'sociology', 2, '2', '1-1', '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'bba 1108', 'marketing', 3, '2', '1-3', '1', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'MAT 1101', 'Differential Calculus and Integral Calculus', 3, '3', '1-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'ENG 1102', 'English I', 3, '3', '1-1', '4', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'PHY 1103', 'Physics (Heat and Thermodynamics, Electricity and Magnetism, and Modern Physics)', 3, '3', '1-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'PHY 1104', 'Physics Lab ', 1.5, '3', '1-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'HUM 1105', 'Bangladesh Studies', 3, '3', '1-1', '4', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'MAT 1201', 'Differential Equation and Fourier Analysis', 3, '3', '1-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'ENG 1202', 'English II', 3, '3', '1-2', '4', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'CSE 1203', 'Structured Programming Language ', 3, '3', '1-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'CSE 1204', 'Structured Programming Language Lab', 1.5, '3', '1-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'CSE 1205', 'Electrical Engineering and Circuit Analysis', 3, '3', '1-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'CSE 1206', 'Electrical Engineering and Circuit Analysis Lab', 1.5, '3', '1-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'MAT 1301', 'Matrices, Vectors and Coordinate Geometry', 3, '3', '1-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'CSE 1302', 'Discrete Mathematics', 3, '3', '1-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'CSE 1303', 'Object Oriented Programming', 3, '3', '1-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'CSE 1304', 'Object Oriented Programming Lab ', 1.5, '3', '1-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'CSE 1305', 'Electronic Devices and Circuits', 3, '3', '1-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'CSE 1306', 'Electronic Devices and Circuits Lab', 1.5, '3', '1-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'MAT 2101', 'Complex Variable and Laplace Transformation', 3, '3', '2-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'CSE 2102', 'Data Structure', 3, '3', '2-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'CSE 2103', 'Data Structure Lab ', 1.5, '3', '2-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'CSE 2104', 'Digital Logic Design', 3, '3', '2-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'CSE 2105', 'Digital Logic Design Lab ', 1.5, '3', '2-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'STA 2201', 'Statistics and Probability', 2, '3', '2-2', '4', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'ACC 2202', 'Accounting', 2, '3', '2-2', '4', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'HUM 2203', 'Critical Approach to Sociology', 2, '3', '2-2', '4', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'CSE 2204', 'Data Communication', 3, '3', '2-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'CSE 2205', 'Algorithm Analysis and Design  ', 3, '3', '2-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'CSE 2206', 'Algorithm Analysis and Design Lab', 1.5, '3', '2-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'CSE 2301', 'Numerical Methods', 3, '3', '2-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'HUM 2302', 'Bengali Language, Literature and History of Emergence of Bangladesh', 3, '3', '2-3', '4', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'CSE 2303', 'Microprocessor and Assembly Language Programming', 3, '3', '2-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'CSE 2304', 'Microprocessor and Assembly Language Programming Lab ', 1.5, '3', '2-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'CSE 2305', 'Theory of Computation', 3, '3', '2-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'CSE 3101', 'Database Management Systems', 3, '3', '3-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'CSE 3102', 'Database Management Systems Lab', 1.5, '3', '3-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'CSE 3103', 'Compiler Design', 3, '3', '3-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'CSE 3104', 'Compiler Design Lab', 1.5, '3', '3-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'ECO 3105', 'Economics', 2, '3', '3-1', '4', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'CSE 3201', 'Software Engineering and Information System Design', 3, '3', '3-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'CSE 3202', 'Computer Architecture', 3, '3', '3-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'CSE 3203', 'Computer Networks', 3, '3', '3-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'CSE 3204', 'Computer Networks Lab ', 1.5, '3', '3-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'CSE 3301', 'Artificial Intelligence and Expert Systems', 3, '3', '3-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'CSE 3302', 'Artificial Intelligence and Expert Systems Lab', 1.5, '3', '3-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'CSE 3303', 'Operating System', 3, '3', '3-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'CSE 3304', 'Operating System Lab ', 1.5, '3', '3-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'CSE 3305', 'Computer Security', 3, '3', '3-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'CSE 4101', 'Technical Writing and Presentation', 1.5, '3', '4-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'IPE 4102', 'Industrial Management', 3, '3', '4-1', '4', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'CSE 41XX', 'Option I (One optional course)', 3, '3', '4-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'CSE 41XX', 'Option I (One optional course) Lab', 1.5, '3', '4-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'CSE 4201', 'Computer Graphics ', 3, '3', '4-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'CSE 4202', 'Computer Graphics Lab', 1.5, '3', '4-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'CSE 42XX', 'Option II (One optional course)', 3, '3', '4-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'CSE 4399', 'Project/Thesis (Phase I)', 3, '3', '4-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'CSE 4301', 'Industrial Training', 1.5, '3', '4-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'CSE 43XX', 'Option II (One optional course)', 3, '3', '4-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'CSE 4399', 'Project/Thesis (Phase II)', 3, '3', '4-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'MAT 1101', 'Differential and Integral Calculus and Coordinate Geometry', 3, '4', '1-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'PHY 1103', 'Physics (Heat and Thermodynamics, Electricity and Magnetism, and Modern Physics)', 3, '4', '1-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'PHY 1104', 'Physics Lab ', 0.75, '4', '1-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'ENG 1105', 'English I', 3, '4', '1-1', '4', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'CSE 1201', 'Structured Programming Language', 3, '4', '1-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'CSE 1202', 'Structured Programming Language Lab ', 1.5, '4', '1-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'MAT 1203', 'Differential Equation and Statistics', 3, '4', '1-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'CHEM 1205', 'Chemistry', 3, '4', '1-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'ME 1206', 'Mechanical Engineering Drawing', 0.75, '4', '1-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'ENG 1207', 'English II', 3, '4', '1-2', '4', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'CSE 1301', 'Object Oriented Programming', 3, '4', '1-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'CSE 1302', 'Object Oriented Programming Lab ', 1.5, '4', '1-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'CSE 1303', 'Discrete Mathematics ', 3, '4', '1-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'EEE 1305', 'Electrical Engineering and Circuit Analysis', 3, '4', '1-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'EEE 1306', 'Electrical Engineering and Circuit Analysis Lab', 1.5, '4', '1-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'CSE 2101', 'Data Structure ', 3, '4', '2-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'CSE 2102', 'Data Structure Lab ', 1.5, '4', '2-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'EEE 2103', 'Electronic Devices and Circuits', 3, '4', '2-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'EEE 2104', 'Electronic Devices and Circuits Lab', 1.5, '4', '2-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'MAT 2105', 'Matrices, Vectors and Fourier Analysis', 3, '4', '2-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'HUM 2107', 'Bangladesh Studies', 3, '4', '2-1', '4', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'CSE 2201', 'Digital Logic Design', 3, '4', '2-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'CSE 2202', 'Digital Logic Design Lab', 1.5, '4', '2-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'CSE 2203', 'Algorithm Analysis and Design', 3, '4', '2-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'CSE 2204', 'Algorithm Analysis and Design Lab', 1.5, '4', '2-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'MAT 2205', 'Complex Variable and Laplace Transformation', 3, '4', '2-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'HUM 2207', 'Critical Approach to Sociology', 2, '4', '2-2', '4', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'CSE 2301', 'Database Management Systems', 3, '4', '2-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'CSE 2302', 'Database Management Systems Lab ', 1.5, '4', '2-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'CSE 2303', 'Theory of Computation', 3, '4', '2-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'HUM 2305', 'Bengali Language and Literature and History of Emergence of Bangladesh', 3, '4', '2-3', '4', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'CSE 3101', 'Software Engineering and Information System Design ', 3, '4', '3-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'CSE 3102', 'Software Engineering and Information System Design Lab ', 0.75, '4', '3-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'CSE 3103', 'Microprocessor and Assembly Language Programming', 3, '4', '3-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'CSE 3104', 'Microprocessor and Assembly Language Programming Lab ', 1.5, '4', '3-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'CSE 3105', 'Data Communication', 3, '4', '3-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'ACC 3107', 'Accounting', 2, '4', '3-1', '4', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'CSE 3201', 'Compiler Design', 3, '4', '3-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'CSE 3202', 'Compiler Design Lab', 0.75, '4', '3-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'CSE 3203', 'Computer Architecture', 3, '4', '3-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'CSE 3205', 'Numerical Methods', 3, '4', '3-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'ECO 3207', 'Economics', 3, '4', '3-2', '4', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'CSE 3301', 'Computer Networks', 3, '4', '3-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'CSE 3302', 'Computer Networks Lab ', 1.5, '4', '3-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'CSE 3303', 'Operating System', 3, '4', '3-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'CSE 3304', 'Operating System Lab', 1.5, '4', '3-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'CSE 3306', 'Technical Writing and Presentation', 0.75, '4', '3-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'CSE 4101', 'Artificial Intelligence and Expert Systems', 3, '4', '4-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'CSE 4102', 'Artificial Intelligence and Expert Systems Lab', 0.75, '4', '4-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'CSE 4103', 'Digital System Design', 3, '4', '4-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'CSE 4104', 'Digital System Design Lab', 0.75, '4', '4-1', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'IPE 4105', 'Industrial Management', 3, '4', '4-1', '4', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'CSE 41XX', 'Option I (One optional course)', 3, '4', '4-1', '4', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 'CSE 4200', 'Project/Thesis (Phase I)', 3, '4', '4-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 'CSE 4201', 'Computer Graphics ', 3, '4', '4-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'CSE 4202', 'Computer Graphics Lab ', 0.75, '4', '4-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 'CSE 42XX', 'Option II', 3, '4', '4-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 'CSE 42XX', 'Option II lab', 0.75, '4', '4-2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 'CSE 4200', 'Project/Thesis (Phase II)', 3, '4', '4-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 'CSE 4300', 'Industrial Training', 1, '4', '4-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 'CSE 43XX', 'Option II', 3, '4', '4-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'CSE 43XX', 'Option II lab', 0.75, '4', '4-3', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_coordinators`
--

CREATE TABLE `course_coordinators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uni_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_coordinators`
--

INSERT INTO `course_coordinators` (`id`, `uni_id`, `name`, `email`, `role_name`, `department_id`, `password`, `image_name`, `created_at`, `updated_at`) VALUES
(4, '1111', 'mike', 'mike@gmail.com', 'Course Coordinator', '1', '$2y$10$lsnYEuDROZVrJLicpV0r1.dc3HkpuwwdSwcdMiCLSDROlc6q4GJpu', NULL, '2020-07-15 09:46:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_versions`
--

CREATE TABLE `course_versions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_version_status` int(11) NOT NULL DEFAULT 0,
  `total_credit_hours` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_versions`
--

INSERT INTO `course_versions` (`id`, `department_id`, `new_version_status`, `total_credit_hours`, `created_at`, `updated_at`) VALUES
(1, '1', 0, 131, NULL, NULL),
(2, '1', 1, 131, NULL, NULL),
(3, '4', 0, 143, NULL, NULL),
(4, '4', 1, 143, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 'Business Administration', NULL, NULL),
(2, 'Economics', NULL, NULL),
(3, 'Law', NULL, NULL),
(4, 'Computer Science & Engineering', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_controllers`
--

CREATE TABLE `exam_controllers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uni_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_controllers`
--

INSERT INTO `exam_controllers` (`id`, `uni_id`, `name`, `email`, `role_name`, `password`, `image_name`, `created_at`, `updated_at`) VALUES
(9, '', 'Exam Controller', 'exam_controller@gmail.com', 'Exam Controller', '$2y$04$hrq1aHTJHcmUAcFuq7n.RefopXDUWsW5PfNaDHXN5EK82/AuUYBHW', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uni_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `uni_id`, `name`, `email`, `role_name`, `department_id`, `password`, `image_name`, `designation`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(2, '10001', 'ema', 'ema@gmail.com', 'Faculty', '1', '$2y$10$sA0t3eNl7YJ7/CY9U91Y6OMl6Wux46rqTRVvjG/pmpUTbG5kh0W3O', 'faculty-2-1600515665.jpg', 'assistant professor', NULL, NULL, '2020-07-15 09:41:15', '2020-09-19 11:41:05'),
(3, '100011', 'bob', 'bob@gmail.com', 'Faculty', '1', '$2y$10$7IVQ7vMtqjMxu6QvODHK9.2/oFoQoyCZqeHAkXucENHiPpE.cVhhm', NULL, 'assistant professor', NULL, NULL, '2020-07-15 09:43:32', NULL),
(51, '1001', 'A. H. M. Saiful Islam', 'saiful@ndub.edu.bd', 'Faculty', '4', '$2y$10$LaAGeDaOpq1GXwYXjBPPNePq8zAX4fn5O4SYFWnEqqan.x9PInkYa', NULL, 'Associate Professor, Chairman', NULL, NULL, '2020-11-11 05:38:35', NULL),
(52, '1002', 'Professor Aloke Kumar Chakraborty', 'akc@ndub.edu.bd', 'Faculty', '4', '$2y$10$NTV74ieNVHRxaDG2DV4/PeodauWP7p1xQoYQpr4h/NsCx5va0H3Qa', NULL, 'Professor', NULL, NULL, '2020-11-11 05:41:25', NULL),
(53, '1003', 'Dr. Shaheena Sultana', 'shaheenacse@ndub.edu.bd', 'Faculty', '4', '$2y$10$TgTZtPz1tWESZYf3wX.ASOPwjcirUATvf.wv7ErqPQSI.OuhamcBe', NULL, 'Associate Professor', NULL, NULL, '2020-11-11 05:44:35', NULL),
(54, '1004', 'Stanly Pius Rozario', 'piusstanly@ndub.edu.bd', 'Faculty', '4', '$2y$10$Hn4okOQQgd/TA2KfZE0uXex62AzKDKJG.8jIlCPYbLVv4az0WQZDm', NULL, 'Asst. Professor', NULL, NULL, '2020-11-11 05:47:47', NULL),
(55, '1005', 'Md. Kazi Anowar Hussain', 'anowarkazi@ndub.edu.bd', 'Faculty', '4', '$2y$10$qA9rA.AfqWpUs0UzEkZfN.fHVfr9MCcro7088KZ3npJzByKln1.lm', NULL, 'Asst. Professor', NULL, NULL, '2020-11-11 05:50:05', NULL),
(56, '1006', 'Md. Bayazid Rahman', 'bayazid@ndub.edu.bd', 'Faculty', '4', '$2y$10$ULtajyAhZJiEUj1HGQCPqOAnsV8ww1BVHuvZN1Bug4e24moWEbI2W', NULL, 'Lecturer', NULL, NULL, '2020-11-11 05:52:36', NULL),
(57, '1007', 'Humayara Binte Rashid', 'humayara@ndub.edu.bd', 'Faculty', '4', '$2y$10$NqrcuBJ2Ij42uM9PXfChN./0ed.A59gTVXpX2ozdF6R383rZ1zOHG', NULL, 'Lecturer', NULL, NULL, '2020-11-11 05:56:57', NULL),
(58, '1008', 'Nusrat Jahan Mozumder (Deeptee)', 'nusrat@ndub.edu.bd', 'Faculty', '4', '$2y$10$urtdWQyS21EKewofW9fEjOAkwpWybFccXU.Gp4qzWX9oufFpwaJoK', NULL, 'Lecturer', NULL, NULL, '2020-11-11 05:59:11', NULL),
(59, '1009', 'Jannatul Ferdous', 'jannatul@ndub.edu.bd', 'Faculty', '4', '$2y$10$loKYAdKpwsWaJiI0CZZeK.5XuFIj7Qt10pzDaDKoY.gFAPWWZL/02', NULL, 'Lecturer', NULL, NULL, '2020-11-11 06:01:03', NULL),
(60, '1010', 'Baizeed Ahmed Bhuiyan', 'baizeed@ndub.edu.bd', 'Faculty', '4', '$2y$10$n1494tvWATrlbwBI/PRFcuVuUDGksrkhlOeVH/wwimpRUDCNJqhEm', NULL, 'Lecturer', NULL, NULL, '2020-11-11 06:02:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level_terms`
--

CREATE TABLE `level_terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_term` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level_terms`
--

INSERT INTO `level_terms` (`id`, `batch_id`, `department_id`, `level_term`, `created_at`, `updated_at`) VALUES
(1, '2', '1', '1-1', NULL, NULL),
(2, '3', '1', '1-2', NULL, NULL),
(3, '4', '1', '1-2', NULL, NULL),
(4, '6', '1', '1-1', NULL, NULL),
(5, '7', '1', '1-1', NULL, NULL),
(6, '10', '1', '1-1', NULL, NULL),
(7, '11', '4', '1-1', NULL, NULL),
(8, '12', '4', '1-1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maximum_credit_hours_assign_to_faculties`
--

CREATE TABLE `maximum_credit_hours_assign_to_faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maximum_credit_hours` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maximum_credit_hours_assign_to_faculties`
--

INSERT INTO `maximum_credit_hours_assign_to_faculties` (`id`, `department_id`, `maximum_credit_hours`) VALUES
(1, '1', 12);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_04_062846_create_user_roles_table', 1),
(5, '2020_05_09_072046_create_trimesters_table', 1),
(6, '2020_05_13_075344_create_course_editions_table', 1),
(7, '2020_06_09_072627_create_regular_course_assign_to_faculties_table', 1),
(8, '2020_06_12_125709_create_assign_supplementary_exams_table', 1),
(9, '2020_06_13_033358_create_regular_course_assign_to_students_table', 1),
(10, '2020_06_13_183902_create_temporary_regular_course_assign_to_students_table', 1),
(11, '2020_06_14_082240_create_repeat_retake_course_assign_to_students_table', 1),
(12, '2020_06_18_060126_create_departments_table', 1),
(13, '2020_06_18_173818_create_course_versions_table', 1),
(14, '2020_06_19_045854_create_courses_table', 1),
(15, '2020_06_19_050201_create_batches_table', 1),
(16, '2020_06_19_050954_create_students_table', 1),
(17, '2020_06_19_052800_create_faculties_table', 1),
(18, '2020_06_19_052932_create_course_coordinators_table', 1),
(19, '2020_06_19_053227_create_registrars_table', 1),
(20, '2020_06_19_053356_create_exam_controllers_table', 1),
(21, '2020_06_19_121642_create_level_terms_table', 1),
(22, '2020_08_02_140011_create_batch_course_lists_table', 2),
(23, '2020_08_02_150819_create_level_terms_table', 3),
(24, '2020_08_03_081945_create_regular_course_assign_to_students_table', 4),
(25, '2020_08_15_082616_create_trimesters_table', 5),
(26, '2020_09_03_073842_create_regular_course_assign_to_students_table', 6),
(27, '2020_09_03_094235_create_regular_course_assign_to_faculties_table', 7),
(28, '2020_09_05_044622_create_trimester_generators_table', 8),
(29, '2020_09_11_102002_create_repeat_retake_course_assign_to_student_with_batches_table', 9),
(30, '2020_09_11_155156_create_repeat_retake_course_assign_to_student_without_batches_table', 10),
(31, '2020_09_12_042014_create_assign_supplementary_exams_table', 11),
(32, '2020_09_16_062556_create_maximum_credit_hours_assign_to_faculties_table', 12),
(33, '2020_09_16_070040_create_permission_for_allow_assign_more_regular_course_to_faculties_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_for_allow_assign_more_regular_course_to_faculties`
--

CREATE TABLE `permission_for_allow_assign_more_regular_course_to_faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_assign_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trimester_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_for_allow_assign_more_regular_course_to_faculties`
--

INSERT INTO `permission_for_allow_assign_more_regular_course_to_faculties` (`id`, `faculty_assign_id`, `faculty_id`, `trimester_id`) VALUES
(1, '6', '3', '2'),
(2, '6', '3', '2'),
(3, '6', '3', '2'),
(4, '6', '3', '2'),
(5, '6', '3', '2'),
(6, '6', '2', '2'),
(7, '6', '2', '2'),
(8, '6', '2', '2'),
(9, '7', '2', '2'),
(10, '7', '3', '2'),
(11, '7', '2', '2'),
(12, '6', '2', '2'),
(13, '6', '2', '2'),
(14, '6', '2', '2'),
(15, '6', '3', '2'),
(16, '6', '3', '2'),
(17, '6', '3', '2'),
(18, '6', '3', '2'),
(19, '6', '3', '2'),
(20, '6', '3', '2'),
(21, '6', '2', '2'),
(22, '7', '2', '2'),
(23, '6', '3', '2');

-- --------------------------------------------------------

--
-- Table structure for table `registrars`
--

CREATE TABLE `registrars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uni_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrars`
--

INSERT INTO `registrars` (`id`, `uni_id`, `name`, `email`, `role_name`, `password`, `image_name`, `created_at`, `updated_at`) VALUES
(1, '111', 'Alice', 'alice@gmail.com', 'Registrar', '$2y$10$eSIk1C5DKYw9odwkE5s9vOhuidMrcZqCY63rrvapaLgvMmg96cAeO', 'registrar-1-1600509206.jpg', NULL, '2020-09-19 09:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `regular_course_assign_to_faculties`
--

CREATE TABLE `regular_course_assign_to_faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_course_list_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trimester_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_version_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registrar_assign_request_status` int(11) NOT NULL DEFAULT 0,
  `faculty_finally_assign_status` int(11) NOT NULL DEFAULT 0,
  `faculty_final_submit_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regular_course_assign_to_faculties`
--

INSERT INTO `regular_course_assign_to_faculties` (`id`, `batch_course_list_id`, `batch_id`, `faculty_id`, `department_id`, `trimester_id`, `course_version_id`, `registrar_assign_request_status`, `faculty_finally_assign_status`, `faculty_final_submit_status`) VALUES
(6, '2', '3', '2', '1', '2', '1', 0, 0, 0),
(7, '11', '3', '2', '1', '2', '1', 0, 1, 0),
(8, '4', '4', '2', '1', '2', '2', 0, 1, 1),
(9, '5', '4', '3', '1', '2', '2', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `regular_course_assign_to_students`
--

CREATE TABLE `regular_course_assign_to_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_course_list_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trimester_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_version_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendance_marks` double DEFAULT NULL,
  `attendance_marks_attend_status` int(11) NOT NULL DEFAULT 0,
  `assignment_and_presentation_marks` double DEFAULT NULL,
  `assignment_and_presentation_marks_attend_status` int(11) NOT NULL DEFAULT 0,
  `quiz_marks` double DEFAULT NULL,
  `quiz_marks_attend_status` int(11) NOT NULL DEFAULT 0,
  `mid_term_marks` double DEFAULT NULL,
  `mid_term_marks_attend_status` int(11) NOT NULL DEFAULT 0,
  `final_marks` double DEFAULT NULL,
  `final_marks_attend_status` int(11) NOT NULL DEFAULT 0,
  `total_marks` double DEFAULT NULL,
  `gpa` double DEFAULT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faculty_final_submit_status` int(11) NOT NULL DEFAULT 0,
  `result_publish_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regular_course_assign_to_students`
--

INSERT INTO `regular_course_assign_to_students` (`id`, `batch_course_list_id`, `batch_id`, `student_id`, `department_id`, `trimester_id`, `course_version_id`, `attendance_marks`, `attendance_marks_attend_status`, `assignment_and_presentation_marks`, `assignment_and_presentation_marks_attend_status`, `quiz_marks`, `quiz_marks_attend_status`, `mid_term_marks`, `mid_term_marks_attend_status`, `final_marks`, `final_marks_attend_status`, `total_marks`, `gpa`, `grade`, `faculty_final_submit_status`, `result_publish_status`) VALUES
(1, '2', '3', '5', '1', '2', '1', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 21, NULL, NULL, 1, 1),
(2, '11', '3', '5', '1', '2', '1', 10, 0, 5, 0, NULL, 1, 20, 0, 40, 0, 50, NULL, NULL, 0, 0),
(4, '2', '3', '5', '1', '2', '1', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 1),
(5, '4', '4', '5', '1', '2', '2', NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, 0, NULL, NULL, 1, 0),
(6, '4', '4', '5', '1', '2', '2', NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, 0, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `repeat_retake_course_assign_to_student_without_batches`
--

CREATE TABLE `repeat_retake_course_assign_to_student_without_batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_course_list_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trimester_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendance_marks` double DEFAULT NULL,
  `attendance_marks_attend_status` int(11) NOT NULL DEFAULT 0,
  `assignment_and_presentation_marks` double DEFAULT NULL,
  `assignment_and_presentation_marks_attend_status` int(11) NOT NULL DEFAULT 0,
  `quiz_marks` double DEFAULT NULL,
  `quiz_marks_attend_status` int(11) NOT NULL DEFAULT 0,
  `mid_term_marks` double DEFAULT NULL,
  `mid_term_marks_attend_status` int(11) NOT NULL DEFAULT 0,
  `final_marks` double DEFAULT NULL,
  `final_marks_attend_status` int(11) NOT NULL DEFAULT 0,
  `total_marks` double DEFAULT NULL,
  `gpa` double DEFAULT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registrar_assign_request_status` int(11) NOT NULL DEFAULT 0,
  `faculty_finally_assign_status` int(11) NOT NULL DEFAULT 0,
  `faculty_final_submit_status` int(11) NOT NULL DEFAULT 0,
  `result_publish_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `repeat_retake_course_assign_to_student_without_batches`
--

INSERT INTO `repeat_retake_course_assign_to_student_without_batches` (`id`, `batch_course_list_id`, `student_id`, `faculty_id`, `department_id`, `trimester_id`, `attendance_marks`, `attendance_marks_attend_status`, `assignment_and_presentation_marks`, `assignment_and_presentation_marks_attend_status`, `quiz_marks`, `quiz_marks_attend_status`, `mid_term_marks`, `mid_term_marks_attend_status`, `final_marks`, `final_marks_attend_status`, `total_marks`, `gpa`, `grade`, `registrar_assign_request_status`, `faculty_finally_assign_status`, `faculty_final_submit_status`, `result_publish_status`) VALUES
(1, '11', '5', '2', '1', '2', NULL, 0, NULL, 0, NULL, 1, NULL, 1, NULL, 1, 14, NULL, NULL, 1, 1, 0, 0),
(2, '2', '5', '2', '1', '2', 9, 0, NULL, 1, NULL, 1, NULL, 1, NULL, 1, 9, NULL, NULL, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `repeat_retake_course_assign_to_student_with_batches`
--

CREATE TABLE `repeat_retake_course_assign_to_student_with_batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_course_list_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trimester_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendance_marks` double DEFAULT NULL,
  `attendance_marks_attend_status` int(11) NOT NULL DEFAULT 0,
  `assignment_and_presentation_marks` double DEFAULT NULL,
  `assignment_and_presentation_marks_attend_status` int(11) NOT NULL DEFAULT 0,
  `quiz_marks` double DEFAULT NULL,
  `quiz_marks_attend_status` int(11) NOT NULL DEFAULT 0,
  `mid_term_marks` double DEFAULT NULL,
  `mid_term_marks_attend_status` int(11) NOT NULL DEFAULT 0,
  `final_marks` double DEFAULT NULL,
  `final_marks_attend_status` int(11) NOT NULL DEFAULT 0,
  `total_marks` double DEFAULT NULL,
  `gpa` double DEFAULT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faculty_final_submit_status` int(11) NOT NULL DEFAULT 0,
  `result_publish_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `repeat_retake_course_assign_to_student_with_batches`
--

INSERT INTO `repeat_retake_course_assign_to_student_with_batches` (`id`, `batch_course_list_id`, `student_id`, `batch_id`, `department_id`, `trimester_id`, `attendance_marks`, `attendance_marks_attend_status`, `assignment_and_presentation_marks`, `assignment_and_presentation_marks_attend_status`, `quiz_marks`, `quiz_marks_attend_status`, `mid_term_marks`, `mid_term_marks_attend_status`, `final_marks`, `final_marks_attend_status`, `total_marks`, `gpa`, `grade`, `faculty_final_submit_status`, `result_publish_status`) VALUES
(1, '11', '5', '3', '1', '2', NULL, 1, NULL, 0, 10, 0, NULL, 1, NULL, 1, 10, NULL, NULL, 0, 0),
(2, '11', '5', '3', '1', '2', NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, NULL, NULL, 0, 0),
(3, '11', '5', '3', '1', '2', NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, NULL, NULL, 0, 0),
(4, '11', '5', '3', '1', '2', NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uni_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_type` int(1) NOT NULL,
  `credit_transfer_student_graduation_credit_hours` double DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_trimester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_certificate_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `psc_result` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jsc_result` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssc_result` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsc_result` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `uni_id`, `name`, `email`, `role_name`, `department_id`, `batch_id`, `student_type`, `credit_transfer_student_graduation_credit_hours`, `password`, `image_name`, `admission_trimester`, `nid`, `birth_certificate_no`, `phone`, `address`, `psc_result`, `jsc_result`, `ssc_result`, `hsc_result`, `created_at`, `updated_at`) VALUES
(5, '11111', 'jeny', 'jeny@gmail.com', 'Student', '1', '3', 0, NULL, '$2y$10$62t2TusRC9favsLShF3c/ur7f9IDnhSWuvAbQ0gh7ImQa9NFSZ1t.', NULL, 'Summer 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-10 07:17:25', NULL),
(8, '33333', 'zonty', 'zonty@gmail.com', 'Student', '1', NULL, 2, 78.6, '$2y$10$wcn0rQBFxLgcX4opXSG11uXGBPERk1/Gf7jx1jBKvsH739GAqbzTS', NULL, 'Summer 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-18 14:22:32', NULL),
(10, '193120001', 'Ridowana Tabassum', 'ridowana@gmail.com', 'Student', '4', '11', 1, NULL, '$2y$10$xO.GbpZ8vzkdQrV8p9ATx.Obrn3cAgpk9KAm//UqRe/I62zGFru.e', NULL, 'Fall 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 02:49:07', NULL),
(11, '193120003', 'Sharif Md. Shahriar Tamjid', 'sharif@gmail.com', 'Student', '4', '11', 1, NULL, '$2y$10$QFHy2UUR2zfw75sljMiTO.IuayJwKL8ocr578gzKazQROG2C5xbve', NULL, 'Fall 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 02:52:02', NULL),
(12, '193120004', 'Shafika Rahman', 'shafika@gmail.com', 'Student', '4', '11', 1, NULL, '$2y$10$Z4yLJ3.dp3W1j.1MeXGHo.p5rc30zpO/oux.9ALCXFyV2ft0tYNKO', NULL, 'Fall 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 02:53:54', NULL),
(13, '193120005', 'Saiful Islam Pimon', 'saiful@gmail.com', 'Student', '4', '11', 1, NULL, '$2y$10$O6IIW3NKycnv.baC.2uDYOCtxK4T.sktXRkUT.mOtBlX1x9PtQtVu', NULL, 'Fall 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 02:56:06', NULL),
(14, '193120006', 'Tamanna Tabassum Oishi', 'tamanna@gmail.com', 'Student', '4', '11', 1, NULL, '$2y$10$fgQB.wzErs/NyXdlhIQDp.Lz3UgLLyosgHHVrQYsCN/ZsbmUg/j66', NULL, 'Fall 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 03:00:23', NULL),
(15, '193120008', 'Tanvir Hossain Rafi', 'tanvir@gmail.com', 'Student', '4', '11', 1, NULL, '$2y$10$lAac4QMdDaY4Ai3jKaHKhOx1AnC3tQ7X61lJcinCjIVeb9WmWUxDi', NULL, 'Fall 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 03:03:35', NULL),
(16, '193120011', 'Kazi Habiba', 'kazi@gmail.com', 'Student', '4', '11', 1, NULL, '$2y$10$ZGtV/mB9Zp/t83oc7H66DORtTeTl18uWd4PowiMMhE27JoGPGhjq2', NULL, 'Fall 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 03:05:03', NULL),
(17, '193120012', 'Sourav Ray', 'sourav@gmail.com', 'Student', '4', '11', 1, NULL, '$2y$10$zMqWpdX4TkVBf/e7M9nEleMisKUUKHkqoKxHFhOiglXTzyVEgoeZm', NULL, 'Fall 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 03:07:16', NULL),
(18, '193120013', 'Md. Morshed Ali Thakur', 'morshed@gmail.com', 'Student', '4', '11', 1, NULL, '$2y$10$UY4lDRJjSihB9hUk0gAGzeBX4P1TcaYH4CKS3.O.1uA5SpOGYy9KW', NULL, 'Fall 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 03:09:11', NULL),
(19, '193120014', 'Ajoy Karmakar', 'ajoy@gmail.com', 'Student', '4', '11', 1, NULL, '$2y$10$zz.j7J5sc4Q9/LvOyFkxH.SyYy2.44dow0mUEd0mcg480L2/KH4H2', NULL, 'Fall 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 03:11:41', NULL),
(20, '201120001', 'Antony Amit Biswas', 'antony@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$MQ6rGedBSsq31iWQq9JaE.S5z.7Oic4b1oB1wTRfAmJzmBIs4jm4.', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 04:13:46', NULL),
(21, '201120002', 'Md. Tasdikur Rahman', 'tasdikur@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$wd4CGlvsuFZ.yrQIAQfICuiTk6XhcDZIg0ZvGoVXpT9C.uZdewP7a', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 04:15:36', NULL),
(22, '201120003', 'Kowser Akond Showke', 'kowser@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$QqKJpUNU08g/s31HDMWvsOAY1HHQjfJFnc7tVZODXNDzFDNahmn7O', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 04:17:24', NULL),
(23, '201120004', 'Mehnaz Tasnim', 'mehnaz@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$a6TeCrWVC89.gt9t5tBL/uSik4KUsy9VLRUNKDb/p6y9vWM3OaBiO', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 04:19:16', NULL),
(24, '201120005', 'Eakfat Jahan', 'eakfat@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$Ll3DcJocg09P6mQFu6VCL..Tnth0lfw5fEL9URstUs.8jxHFA4FGe', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 04:21:08', NULL),
(25, '201120006', 'Arpon Adrian Gomes', 'arpon@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$3/u2RVxrFy.wjYYcajOlY.AK94DCS.EeGxEEO6fRMadK9p/RYrIVG', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 04:23:00', NULL),
(26, '201120007', 'Md. Abdul Alim', 'abdul@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$iBBho1qxSSh3Z3EsrkD4Du/D.2PcE6xoRI/J5Oq7/zQfb2a0f2E9a', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 04:24:09', NULL),
(27, '201120008', 'Prapty Das', 'prapty@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$GwBp4rnTJXzXbn/FPooW.uazJRGbzy3dquOAUr8OnrlwVMkL2Rznq', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 04:25:16', NULL),
(28, '201120009', 'Mohammad Mootasim Billah', 'mohammad@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$DRKr3LtrZd0RfYZulYrD.OXWOxuk9GVIyiwOk1ZXsNZ7d.UJ.5WFu', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 04:27:09', NULL),
(29, '201120010', 'Rup Chowdhury', 'rup@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$2QklR9PF/2JgHqyBNSPmXOk0tAhZ0X0zSIjXh2Krx1vBOABZRtOL6', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 04:30:15', NULL),
(30, '201120011', 'Abid Sarkar', 'abid@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$VJdHMXgS26bKSPl5XTmr4.fl6.qZOlO6oR6P6SY4TIQWVxgBjsica', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 04:32:05', NULL),
(31, '201120012', 'Md. Shahriar Alam', 'shahriar@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$x5N0UqliWCPtymE2SjLQ.OZug8gMgu1jrdIDa5haWndu5eKi8vyRq', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 04:33:17', NULL),
(32, '201120013', 'Ranak Debnath', 'ranak@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$APnpWTuJDSpejdL8DDus3.84/4Z3RkkIDg0Q.uOrIoWJm7qW8dpFG', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 04:34:22', NULL),
(33, '201120014', 'Md. Abu Sakib', 'abu@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$snNQ5Xt9IfWXx3sOAD3Acum24/hIv5n2tJC0hGLMJa1.TPZ/GYIJC', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 04:35:21', NULL),
(34, '201120015', 'Md Sinha', 'sinha@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$MaTWWplPbNyPkExrTLpFTeRZgy3zGt2eSIxNbCY9cUrgc2D6yR6oO', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 04:37:41', NULL),
(35, '201120016', 'Ariful Islam', 'ariful@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$iXWMXxMv2EQzPm5r7cnGquz8g12tPIc7ULoV9hDWe782kdkEJN.E6', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 04:39:03', NULL),
(36, '201120017', 'S. M. Mehedi Hasan', 'mehedi@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$4QWWWkWazgzb1PrVrDAp.ul9/sL83SSzxjjdxB866ab202gzMHu3q', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 04:40:19', NULL),
(37, '201120018', 'Sheikh Asif Rahman', 'sheikh@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$gpo0EAVZkDJn74qyvvWo9uk3C25WxF2eJWSBnjIk/vy6J9yCJ4Xnm', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 05:07:56', NULL),
(38, '201120019', 'Faiza Islam', 'faiza@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$zcp.Gsu1aq2Mklg3khvSRuwuHgDKgm.y3DagYh7zOV0tRDQt6XRPC', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 05:09:33', NULL),
(39, '201120020', 'Md. Yasin Arafat Eather', 'yasin@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$.jFEla6JRY4/XXn0aXEXWu6yet3oXv..rnf0yi24yHtEH8jCtzV0q', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 05:12:03', NULL),
(40, '201120021', 'Fatema Tuj Zohra Promi', 'fatema@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$PhYPSlZViv5H737bI9wkLupDJypz9TshUh5ZsPqHQe6.5kbqLriX2', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 05:14:12', NULL),
(41, '201120022', 'Tamim Ahmed', 'tamim@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$QlGkA6NuppY2WElQ/2lTwervgeJVk2U3aoA.9iEyYkFEB1rShqxFG', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 05:15:25', NULL),
(42, '201120023', 'Md. Mirajul Islam Tashfi', 'mirajul@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$O7lhlIcOtOWYIl7wW7vE3udeqHfAiaKiHlfBdT.F6ieUDR2UUiIJG', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 05:16:47', NULL),
(43, '201120024', 'Tamanna Laskar', 'tamanna24@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$pbMEw5a4qOl987jtmOd7t.QiY46N04nN5OUXXjJCuVtVaKDiObDuK', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 05:19:35', NULL),
(44, '201120025', 'Rhitu Das', 'rhitu@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$HsnwcAck4g/nqpBUwarQIuyP/3vRcslju4Yvy685xV0KvWQ.Xnpca', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 05:20:39', NULL),
(45, '201120026', 'MD. Nazmul Islam', 'nazmul@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$Agq0jfcH56NAydbxT2EiyeI6kxsECn/6fiM462UDKT6GGbzzYtN4u', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 05:21:52', NULL),
(46, '201120027', 'Talha Bin  Abdullah', 'talha@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$LoSeX7bfU8sruIE6RAyVDOqRUr2dMAL.948mUAM1xw2X9LErmno1m', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 05:23:41', NULL),
(47, '201120028', 'Joy Das', 'joy@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$CMeSd0VCDbEaGWrWsBt83eTRYD/IwMO6z8HDzB7UwAoJsRgYTSQTS', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 05:24:31', NULL),
(48, '201120029', 'Sumaiya Binte Shahid', 'sumaiya@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$aZN1ukIPkib/lvc5JBWcSebiwAcj9gA.F1vF7xEX9J8/ogR0A3Po6', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 05:25:44', NULL),
(49, '201120030', 'Fazle Elahi Fahim', 'fazle@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$t3CAAxf3raNIi63ErLH6uuO.X6idLT6gzM2B1uxWUXnGjA7AV2I/q', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 05:27:52', NULL),
(50, '201120031', 'Aranya Bhowmik Dhrubo', 'aranya@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$2AEJvq/wIGnyIqr3Y.HSw.Wt8B0mxfI/H.D5jU5Gkdtumt0/vafTq', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-11 05:32:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `temporary_regular_course_assign_to_students`
--

CREATE TABLE `temporary_regular_course_assign_to_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trimester_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edition_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trimesters`
--

CREATE TABLE `trimesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trimester_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trimesters`
--

INSERT INTO `trimesters` (`id`, `trimester_name`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 'Spring 2020', 1, NULL, NULL),
(2, 'Summer 2020', 1, NULL, NULL),
(3, 'Fall 2019', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trimester_generators`
--

CREATE TABLE `trimester_generators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trimester_name_format` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) DEFAULT NULL,
  `active_trimester_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trimester_generators`
--

INSERT INTO `trimester_generators` (`id`, `trimester_name_format`, `year`, `active_trimester_status`) VALUES
(1, 'Fall', 2019, 1),
(2, 'Spring', 2020, 0),
(3, 'Summer', 2020, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uni_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uni_id`, `name`, `email`, `role_name`, `email_verified_at`, `password`, `image_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '111', 'Alice', 'alice@gmail.com', 'Registrar', NULL, '$2y$10$/Y6PHswr4CYOea2dicL75u.vkfhCihVzbw1WiLPBb8ALnTtTAY3oq', 'registrar-1-1600509206.jpg', NULL, NULL, '2020-09-19 09:53:27'),
(2, '10001', 'ema', 'ema@gmail.com', 'Faculty', NULL, '$2y$10$Ky9/L6Am4QAbeVZaR5TifeJcCl3m3AHP466Jbxqq2iI6iMkiHyrva', 'faculty-2-1600515665.jpg', NULL, '2020-07-15 09:41:15', '2020-09-19 11:41:05'),
(3, '100011', 'bob', 'bob@gmail.com', 'Faculty', NULL, '$2y$10$92UQGRqn1FH/wmo09p/A.uzUkzSlDV0w4aHocOBJnOY5qcGDElo4e', NULL, NULL, '2020-07-15 09:43:31', NULL),
(4, '1111', 'mike', 'mike@gmail.com', 'Course Coordinator', NULL, '$2y$10$C3pnnPUj2vpBxgzTqE4D4uyvddp7Ja6tqgotMLDwDPCRtd7BA6GrW', NULL, NULL, '2020-07-15 09:46:41', NULL),
(5, '11111', 'jeny', 'jeny@gmail.com', 'Student', NULL, '$2y$10$Pd1oiYhuJtySnpl0vrSi/eCrIZjQu3oD5C2Dv/jBvjhoLiemuL5Hi', NULL, NULL, '2020-09-10 07:17:24', NULL),
(8, '33333', 'zonty', 'zonty@gmail.com', 'Student', NULL, '$2y$10$LEWbHglgvN43.yeFfHj4v.1pRx5pvX8rc11GKHYf9U5AFuYSA/YxS', NULL, NULL, '2020-09-18 14:22:32', NULL),
(9, '', 'Exam Controller', 'exam_controller@gmail.com', 'Exam Controller', NULL, '$2y$04$hrq1aHTJHcmUAcFuq7n.RefopXDUWsW5PfNaDHXN5EK82/AuUYBHW', NULL, NULL, NULL, NULL),
(10, '193120001', 'Ridowana Tabassum', 'ridowana@gmail.com', 'Student', NULL, '$2y$10$/2fxs4dYAlksBsMzwcZeK.vCNT0tx1Pn32JKfinQjdy4ZVwmhbGoi', NULL, NULL, '2020-11-11 02:49:07', NULL),
(11, '193120003', 'Sharif Md. Shahriar Tamjid', 'sharif@gmail.com', 'Student', NULL, '$2y$10$8AS07peoJkVSPRL/OwMvAeAdAppHDEFqP3a0IiXZq55xxoswssvDK', NULL, NULL, '2020-11-11 02:52:02', NULL),
(12, '193120004', 'Shafika Rahman', 'shafika@gmail.com', 'Student', NULL, '$2y$10$jToDO4.qMTamYSYRt0JzvO5jyb/W.FJ8E0X.tZNhpSE4fk1Nt8aVS', NULL, NULL, '2020-11-11 02:53:53', NULL),
(13, '193120005', 'Saiful Islam Pimon', 'saiful@gmail.com', 'Student', NULL, '$2y$10$rRn8CYA1NQlHo6yul09UROJfmI3N4s0sNwiPqliwuIoTFzcaoyMBa', NULL, NULL, '2020-11-11 02:56:05', NULL),
(14, '193120006', 'Tamanna Tabassum Oishi', 'tamanna@gmail.com', 'Student', NULL, '$2y$10$ooqcGJJ08D3LLWeaB9.Btu6/uXqGzPkoyVObLfkmHPQziXQwXtv0.', NULL, NULL, '2020-11-11 03:00:23', NULL),
(15, '193120008', 'Tanvir Hossain Rafi', 'tanvir@gmail.com', 'Student', NULL, '$2y$10$V9Y9gkJcedtAeUhOJ1.F5OFur/D0PyzpUbFgtVglTxErqffjAyrLO', NULL, NULL, '2020-11-11 03:03:35', NULL),
(16, '193120011', 'Kazi Habiba', 'kazi@gmail.com', 'Student', NULL, '$2y$10$Ld6k4I/8cl0ul8RjK9NN4OTaVIolgyUzFDo0ZEry17yT4PZxszdzS', NULL, NULL, '2020-11-11 03:05:02', NULL),
(17, '193120012', 'Sourav Ray', 'sourav@gmail.com', 'Student', NULL, '$2y$10$1DGoncMObYDWJ8KU20QW7eI1yqbCEdQevCpMEW5OCGv4WYLZ8gMz.', NULL, NULL, '2020-11-11 03:07:16', NULL),
(18, '193120013', 'Md. Morshed Ali Thakur', 'morshed@gmail.com', 'Student', NULL, '$2y$10$tGZ5SYoyOA/wlk.Hs.jIKuwtIaNOtCsPWmGTfZZ80wWlzT.iLgh.G', NULL, NULL, '2020-11-11 03:09:11', NULL),
(19, '193120014', 'Ajoy Karmakar', 'ajoy@gmail.com', 'Student', NULL, '$2y$10$eWhew6.7Ib2qQRUKGcWnPuhZib.yFVV9b707TRJ9sLnjkEIyEKNcO', NULL, NULL, '2020-11-11 03:11:41', NULL),
(20, '201120001', 'Antony Amit Biswas', 'antony@gmail.com', 'Student', NULL, '$2y$10$vCcxZB5b/1FDJ.hH0yvwRO94rn1LuFWC9jEpAMEOxs5/bhFfAd68C', NULL, NULL, '2020-11-11 04:13:46', NULL),
(21, '201120002', 'Md. Tasdikur Rahman', 'tasdikur@gmail.com', 'Student', NULL, '$2y$10$qGBa6/.eN.7ZhoWW2a0FE.NeY5WdgPNxFrg3nOPdAirYwzwjUTRzm', NULL, NULL, '2020-11-11 04:15:36', NULL),
(22, '201120003', 'Kowser Akond Showke', 'kowser@gmail.com', 'Student', NULL, '$2y$10$aFZNrMtp6FLmflUHkBMH1elxm/Uo0EkbBqrOdXGDC6g7HaJ3NfiUu', NULL, NULL, '2020-11-11 04:17:24', NULL),
(23, '201120004', 'Mehnaz Tasnim', 'mehnaz@gmail.com', 'Student', NULL, '$2y$10$Dz.CXS5LACsMLTwH/a6x2.4BoGCgfF3EW3ZnRByrfzATNcDRcpBFu', NULL, NULL, '2020-11-11 04:19:15', NULL),
(24, '201120005', 'Eakfat Jahan', 'eakfat@gmail.com', 'Student', NULL, '$2y$10$/in5BiFXl1HGLP1/OBPtxODb.dFn3eLUwL0BWe7gNVyNvJ.zS/Deu', NULL, NULL, '2020-11-11 04:21:07', NULL),
(25, '201120006', 'Arpon Adrian Gomes', 'arpon@gmail.com', 'Student', NULL, '$2y$10$n1b.Vm7vfHsAkhyIyqPGCOpZsDCTORhwekxglh96Ou1blQipy0d4S', NULL, NULL, '2020-11-11 04:23:00', NULL),
(26, '201120007', 'Md. Abdul Alim', 'abdul@gmail.com', 'Student', NULL, '$2y$10$BFPMB/5DmHXPe3bTKxfQnu9sJTWeGH81K6n6Trtlxaul7UCL9Tnc6', NULL, NULL, '2020-11-11 04:24:09', NULL),
(27, '201120008', 'Prapty Das', 'prapty@gmail.com', 'Student', NULL, '$2y$10$MToKXTdNMcakRLq5kn5Zeury.Xn/h47jmYXu25zOjUkClRfhmqfCa', NULL, NULL, '2020-11-11 04:25:15', NULL),
(28, '201120009', 'Mohammad Mootasim Billah', 'mohammad@gmail.com', 'Student', NULL, '$2y$10$RQCoidYWjDM7K88JpGcUl.7wLz32th3R.3DW6EkB7qbNxlmpOXvr6', NULL, NULL, '2020-11-11 04:27:08', NULL),
(29, '201120010', 'Rup Chowdhury', 'rup@gmail.com', 'Student', NULL, '$2y$10$aCoYtwM2su6ojNTOZv7BrOnmJBFS/M1CSUDcYrrG5F.CuwxVlxC4G', NULL, NULL, '2020-11-11 04:30:15', NULL),
(30, '201120011', 'Abid Sarkar', 'abid@gmail.com', 'Student', NULL, '$2y$10$JH0Hu6u0HAArzHBlz1lXTuozJVGB3URCWMNwWt7iblVr9JEsk9S72', NULL, NULL, '2020-11-11 04:32:04', NULL),
(31, '201120012', 'Md. Shahriar Alam', 'shahriar@gmail.com', 'Student', NULL, '$2y$10$d6ynUMxclPc7wuVfVRYQLuqbJASX89xFCcsZnFU3IHqXZWr4mjxIe', NULL, NULL, '2020-11-11 04:33:17', NULL),
(32, '201120013', 'Ranak Debnath', 'ranak@gmail.com', 'Student', NULL, '$2y$10$9YWfET0A.LgT4wTdcQ3PquKxflPdaspU/vwplhB2Ju7g5PXKCuLTy', NULL, NULL, '2020-11-11 04:34:22', NULL),
(33, '201120014', 'Md. Abu Sakib', 'abu@gmail.com', 'Student', NULL, '$2y$10$4ELGvV/K2C5SM9Q82.sQ.ejyJ0Dfzn2Y9vrlf9S0o2IncuUYXx4rG', NULL, NULL, '2020-11-11 04:35:21', NULL),
(34, '201120015', 'Md Sinha', 'sinha@gmail.com', 'Student', NULL, '$2y$10$L6NcamE9Vj/61UA63pulCuvIhn32Bhue8nQezar8vghl.bm4N.CO2', NULL, NULL, '2020-11-11 04:37:41', NULL),
(35, '201120016', 'Ariful Islam', 'ariful@gmail.com', 'Student', NULL, '$2y$10$sMIkUrGa4Ukllt4U2CzN4OtyZlGk9xFuYMD6evkeAj181dvRj8Si6', NULL, NULL, '2020-11-11 04:39:03', NULL),
(36, '201120017', 'S. M. Mehedi Hasan', 'mehedi@gmail.com', 'Student', NULL, '$2y$10$8RT0XwXWJBcgE5iBE6mAsORt3uf8XIbEHClMQgoDxFhGls9oBNiO6', NULL, NULL, '2020-11-11 04:40:19', NULL),
(37, '201120018', 'Sheikh Asif Rahman', 'sheikh@gmail.com', 'Student', NULL, '$2y$10$b/SeF41N0za1Z5bODo5sw.CWhtGpU.90otBECy9rgGPiyR4QTcjqC', NULL, NULL, '2020-11-11 05:07:55', NULL),
(38, '201120019', 'Faiza Islam', 'faiza@gmail.com', 'Student', NULL, '$2y$10$qe//UkkcO1LkSmuxzdna0uin9HnXalrMHY9M6fYefaZVtulLhCYiK', NULL, NULL, '2020-11-11 05:09:33', NULL),
(39, '201120020', 'Md. Yasin Arafat Eather', 'yasin@gmail.com', 'Student', NULL, '$2y$10$p8Yv8LnIdgFBF9DY9OiGrufy34bDDayvOVW3gsEptVk2uIQqY1TOu', NULL, NULL, '2020-11-11 05:12:03', NULL),
(40, '201120021', 'Fatema Tuj Zohra Promi', 'fatema@gmail.com', 'Student', NULL, '$2y$10$Yiu0RXWr04WxiJCyM6olP./LuVVB3ZjjxX2V8ExLS8m/yb4Wbftuu', NULL, NULL, '2020-11-11 05:14:11', NULL),
(41, '201120022', 'Tamim Ahmed', 'tamim@gmail.com', 'Student', NULL, '$2y$10$Mpucb7iK9SvSp7vK/9TE.uXr.J7vZTmJKSX9datx0/aZF4aW1a7Vy', NULL, NULL, '2020-11-11 05:15:25', NULL),
(42, '201120023', 'Md. Mirajul Islam Tashfi', 'mirajul@gmail.com', 'Student', NULL, '$2y$10$4JkNTG.0UxqdFu6dtDQi2eIZRwg1xYE8bzm29oo.H4SY36tR9PgIy', NULL, NULL, '2020-11-11 05:16:47', NULL),
(43, '201120024', 'Tamanna Laskar', 'tamanna24@gmail.com', 'Student', NULL, '$2y$10$yXQ3CmVzQKc/veLaBQnklOcavYSr4LPJm/TVQZcxsNN/fCz8gMhYq', NULL, NULL, '2020-11-11 05:19:35', NULL),
(44, '201120025', 'Rhitu Das', 'rhitu@gmail.com', 'Student', NULL, '$2y$10$vjobf6/IPIt0Z3Lu.VJscOsmPJ.yu3dwnwCitFeR33qA4lx9DuEb2', NULL, NULL, '2020-11-11 05:20:39', NULL),
(45, '201120026', 'MD. Nazmul Islam', 'nazmul@gmail.com', 'Student', NULL, '$2y$10$KFnK.WdXfTJsXQp9VS6LIu8psb6obvA6JOKs5jV1IGjg8NDUI74AG', NULL, NULL, '2020-11-11 05:21:52', NULL),
(46, '201120027', 'Talha Bin  Abdullah', 'talha@gmail.com', 'Student', NULL, '$2y$10$nf.Wi7C1G4mepWGFG6DdSOmFk6LcbjUbNTbP9eoEM3Fuse1GmC4.i', NULL, NULL, '2020-11-11 05:23:41', NULL),
(47, '201120028', 'Joy Das', 'joy@gmail.com', 'Student', NULL, '$2y$10$cajupvaxfbxFPMEqn5J8nOG/iY8zt0iC1Rk8WbzyfD2eVRGSsz/6y', NULL, NULL, '2020-11-11 05:24:31', NULL),
(48, '201120029', 'Sumaiya Binte Shahid', 'sumaiya@gmail.com', 'Student', NULL, '$2y$10$u.5CKOqD8MXDwQQaVgXUI.I1fzI3gLZgsmmNrogEdeAb6b/lZStjy', NULL, NULL, '2020-11-11 05:25:44', NULL),
(49, '201120030', 'Fazle Elahi Fahim', 'fazle@gmail.com', 'Student', NULL, '$2y$10$eTMcoT/TYc.cpBJkfM/DkufKcjfXMDdph10aZ28ENpf7EOWnhRh72', NULL, NULL, '2020-11-11 05:27:52', NULL),
(50, '201120031', 'Aranya Bhowmik Dhrubo', 'aranya@gmail.com', 'Student', NULL, '$2y$10$iBlhANwNtzG3Ej.V/x07LejJB4ZDfCgpUVfmXWUA9Y.cHOW8Zf/fO', NULL, NULL, '2020-11-11 05:32:03', NULL),
(51, '1001', 'A. H. M. Saiful Islam', 'saiful@ndub.edu.bd', 'Faculty', NULL, '$2y$10$v4cbapmnLvo5di8QQybiKeau/VGBMieIGMFntvDtGWZwRroI60cj2', NULL, NULL, '2020-11-11 05:38:35', NULL),
(52, '1002', 'Professor Aloke Kumar Chakraborty', 'akc@ndub.edu.bd', 'Faculty', NULL, '$2y$10$W49MDtpk8THEAh/G8.bBAeSUNUZq4lvO6EuflKGcruuFlze4.pb1O', NULL, NULL, '2020-11-11 05:41:25', NULL),
(53, '1003', 'Dr. Shaheena Sultana', 'shaheenacse@ndub.edu.bd', 'Faculty', NULL, '$2y$10$gixre1vwHxjt7OK50.OI2.RvXJkmeuC4hBa28H.FAfLs4Gn70miYy', NULL, NULL, '2020-11-11 05:44:35', NULL),
(54, '1004', 'Stanly Pius Rozario', 'piusstanly@ndub.edu.bd', 'Faculty', NULL, '$2y$10$8EB.64XMhiO25NAi9Np8xO8QhIt8TXOZPbRSvA2BXAigsYYMBVdWu', NULL, NULL, '2020-11-11 05:47:47', NULL),
(55, '1005', 'Md. Kazi Anowar Hussain', 'anowarkazi@ndub.edu.bd', 'Faculty', NULL, '$2y$10$dxE8KQKARlf1obkN9YRhjecdeI1OGKcqwX0dlLriP5D7HXA5Y1S2C', NULL, NULL, '2020-11-11 05:50:05', NULL),
(56, '1006', 'Md. Bayazid Rahman', 'bayazid@ndub.edu.bd', 'Faculty', NULL, '$2y$10$nPH3oNIgFzVlGzlcogvWxeKt6sfnGdYtrLRj5fwkErLdESm88dCii', NULL, NULL, '2020-11-11 05:52:36', NULL),
(57, '1007', 'Humayara Binte Rashid', 'humayara@ndub.edu.bd', 'Faculty', NULL, '$2y$10$3qVB/.PbhDcq3pAgBY8Am.Dtflyy/q5kUkAkbiZ620nj.yPNoJzuK', NULL, NULL, '2020-11-11 05:56:57', NULL),
(58, '1008', 'Nusrat Jahan Mozumder (Deeptee)', 'nusrat@ndub.edu.bd', 'Faculty', NULL, '$2y$10$N/5MhGddV9yIDqnN1jLgUuTO8X/pTHIkrUZxi50htpGDNVNi85Ofq', NULL, NULL, '2020-11-11 05:59:11', NULL),
(59, '1009', 'Jannatul Ferdous', 'jannatul@ndub.edu.bd', 'Faculty', NULL, '$2y$10$0qrhLPOjRzosXucqyM.9feb3ZnunPveBxQKbhDPd5dbiMtEegc6iO', NULL, NULL, '2020-11-11 06:01:02', NULL),
(60, '1010', 'Baizeed Ahmed Bhuiyan', 'baizeed@ndub.edu.bd', 'Faculty', NULL, '$2y$10$Q5biKUhA/HIsWwnXc.QD0uQuMsehyKUGhB2Bex1bbNF2B2EIviMLq', NULL, NULL, '2020-11-11 06:02:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `role_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`role_name`, `created_at`, `updated_at`) VALUES
('Registrar', NULL, NULL),
('Exam Controller', NULL, NULL),
('Course Coordinator', NULL, NULL),
('Faculty', NULL, NULL),
('Student', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_supplementary_exams`
--
ALTER TABLE `assign_supplementary_exams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `assign_supplementary_exams_id_unique` (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `batches_id_unique` (`id`),
  ADD UNIQUE KEY `batches_batch_name_unique` (`batch_name`);

--
-- Indexes for table `batch_course_lists`
--
ALTER TABLE `batch_course_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_id_unique` (`id`);

--
-- Indexes for table `course_coordinators`
--
ALTER TABLE `course_coordinators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_coordinators_id_unique` (`id`),
  ADD UNIQUE KEY `course_coordinators_uni_id_unique` (`uni_id`),
  ADD UNIQUE KEY `course_coordinators_email_unique` (`email`);

--
-- Indexes for table `course_versions`
--
ALTER TABLE `course_versions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_versions_id_unique` (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_id_unique` (`id`),
  ADD UNIQUE KEY `departments_department_name_unique` (`department_name`);

--
-- Indexes for table `exam_controllers`
--
ALTER TABLE `exam_controllers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_controllers_id_unique` (`id`),
  ADD UNIQUE KEY `exam_controllers_uni_id_unique` (`uni_id`),
  ADD UNIQUE KEY `exam_controllers_email_unique` (`email`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculties_id_unique` (`id`),
  ADD UNIQUE KEY `faculties_uni_id_unique` (`uni_id`),
  ADD UNIQUE KEY `faculties_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_terms`
--
ALTER TABLE `level_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maximum_credit_hours_assign_to_faculties`
--
ALTER TABLE `maximum_credit_hours_assign_to_faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permission_for_allow_assign_more_regular_course_to_faculties`
--
ALTER TABLE `permission_for_allow_assign_more_regular_course_to_faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrars`
--
ALTER TABLE `registrars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registrars_id_unique` (`id`),
  ADD UNIQUE KEY `registrars_uni_id_unique` (`uni_id`),
  ADD UNIQUE KEY `registrars_email_unique` (`email`);

--
-- Indexes for table `regular_course_assign_to_faculties`
--
ALTER TABLE `regular_course_assign_to_faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regular_course_assign_to_faculties_id_unique` (`id`);

--
-- Indexes for table `regular_course_assign_to_students`
--
ALTER TABLE `regular_course_assign_to_students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regular_course_assign_to_students_id_unique` (`id`);

--
-- Indexes for table `repeat_retake_course_assign_to_student_without_batches`
--
ALTER TABLE `repeat_retake_course_assign_to_student_without_batches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `repeat_retake_course_assign_to_student_without_batches_id_unique` (`id`);

--
-- Indexes for table `repeat_retake_course_assign_to_student_with_batches`
--
ALTER TABLE `repeat_retake_course_assign_to_student_with_batches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `repeat_retake_course_assign_to_student_with_batches_id_unique` (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_id_unique` (`id`),
  ADD UNIQUE KEY `students_uni_id_unique` (`uni_id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `temporary_regular_course_assign_to_students`
--
ALTER TABLE `temporary_regular_course_assign_to_students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `temporary_regular_course_assign_to_students_id_unique` (`id`);

--
-- Indexes for table `trimesters`
--
ALTER TABLE `trimesters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trimesters_trimester_name_unique` (`trimester_name`);

--
-- Indexes for table `trimester_generators`
--
ALTER TABLE `trimester_generators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trimester_generators_id_unique` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_id_unique` (`id`),
  ADD UNIQUE KEY `users_uni_id_unique` (`uni_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_supplementary_exams`
--
ALTER TABLE `assign_supplementary_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `batch_course_lists`
--
ALTER TABLE `batch_course_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `course_coordinators`
--
ALTER TABLE `course_coordinators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_versions`
--
ALTER TABLE `course_versions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_controllers`
--
ALTER TABLE `exam_controllers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level_terms`
--
ALTER TABLE `level_terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `maximum_credit_hours_assign_to_faculties`
--
ALTER TABLE `maximum_credit_hours_assign_to_faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `permission_for_allow_assign_more_regular_course_to_faculties`
--
ALTER TABLE `permission_for_allow_assign_more_regular_course_to_faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `registrars`
--
ALTER TABLE `registrars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `regular_course_assign_to_faculties`
--
ALTER TABLE `regular_course_assign_to_faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `regular_course_assign_to_students`
--
ALTER TABLE `regular_course_assign_to_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `repeat_retake_course_assign_to_student_without_batches`
--
ALTER TABLE `repeat_retake_course_assign_to_student_without_batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `repeat_retake_course_assign_to_student_with_batches`
--
ALTER TABLE `repeat_retake_course_assign_to_student_with_batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `temporary_regular_course_assign_to_students`
--
ALTER TABLE `temporary_regular_course_assign_to_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trimesters`
--
ALTER TABLE `trimesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trimester_generators`
--
ALTER TABLE `trimester_generators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
