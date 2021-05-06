-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2021 at 02:40 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

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
(2, '4', '5', '3', '1', '2', NULL, 1, 0, 1, 0, 0),
(3, '210', '76', '57', '4', '9', 47, 0, 0, 1, 1, 0),
(4, '211', '76', '56', '4', '9', 54, 0, 0, 1, 0, 0);

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
(3, 'bba 2', '1', '1', 131, 7.5, NULL, NULL),
(4, 'bba 4', '1', '2', 131, 6, NULL, NULL),
(6, 'bba 5', '1', '2', 131, 6, NULL, NULL),
(7, 'bba 6', '1', '2', 131, 0, NULL, NULL),
(8, 'bba 10', '1', '2', 131, 0, NULL, NULL),
(9, 'bba 11', '1', '2', 131, 0, NULL, NULL),
(10, 'bba 12', '1', '2', 131, 0, NULL, NULL),
(11, 'CSE 12', '4', '3', 143, 58.5, NULL, NULL),
(12, 'CSE 13', '4', '4', 143, 9.75, NULL, NULL),
(15, 'CSE 14', '4', '4', 143, 36, NULL, NULL),
(17, 'CSE 15', '4', '4', 143, 9.75, NULL, NULL);

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
(1, 'bba 1101', 'management', 3, '1', '1-2', '3', '1', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'bba 1102', 'production', 3, '1', '1-1', '3', '1', 1, 1, 'bba 1101', NULL, 'bba 1103', NULL, NULL, NULL, NULL),
(4, 'bba 1106', 'management', 3, '2', '1-1', '4', '1', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'bba 1101', 'sociology', 3, '2', '1-1', '4', '1', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'bba 1106', 'management', 3, '2', '1-1', '6', '1', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'bba 1101', 'sociology', 3, '2', '1-1', '6', '1', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'bba 1103', 'ipe', 1.5, '1', '1-1', '3', '1', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'bba 1106', 'management', 3, '2', '4-1', '7', '1', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'bba 1101', 'sociology', 2, '2', '1-1', '7', '1', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'bba 1108', 'marketing', 3, '2', '1-1', '7', '1', 1, 0, 'bba 1106', 'bba 1101', NULL, NULL, NULL, NULL, NULL),
(15, 'bba 1106', 'management', 3, '2', '1-1', '10', '1', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'bba 1101', 'sociology', 2, '2', '1-1', '10', '1', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'bba 1108', 'marketing', 3, '2', '1-3', '10', '1', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'MAT 1101', 'Differential Calculus and Integral Calculus', 3, '3', '1-3', '11', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'ENG 1102', 'English I', 3, '3', '1-1', '11', '4', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'PHY 1103', 'Physics (Heat and Thermodynamics, Electricity and Magnetism, and Modern Physics)', 3, '3', '1-1', '11', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'PHY 1104', 'Physics Lab ', 1.5, '3', '1-2', '11', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'HUM 1105', 'Bangladesh Studies', 3, '3', '1-1', '11', '4', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'MAT 1201', 'Differential Equation and Fourier Analysis', 3, '3', '1-2', '11', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'ENG 1202', 'English II', 3, '3', '1-2', '11', '4', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'CSE 1203', 'Structured Programming Language ', 3, '3', '1-2', '11', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'CSE 1204', 'Structured Programming Language Lab', 1.5, '3', '1-2', '11', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'CSE 1205', 'Electrical Engineering and Circuit Analysis', 3, '3', '1-2', '11', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'CSE 1206', 'Electrical Engineering and Circuit Analysis Lab', 1.5, '3', '1-2', '11', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'MAT 1301', 'Matrices, Vectors and Coordinate Geometry', 3, '3', '1-3', '11', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'CSE 1302', 'Discrete Mathematics', 3, '3', '1-1', '11', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'CSE 1303', 'Object Oriented Programming', 3, '3', '1-3', '11', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'CSE 1304', 'Object Oriented Programming Lab ', 1.5, '3', '1-3', '11', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'CSE 1305', 'Electronic Devices and Circuits', 3, '3', '1-3', '11', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'CSE 1306', 'Electronic Devices and Circuits Lab', 1.5, '3', '1-3', '11', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'MAT 2101', 'Complex Variable and Laplace Transformation', 3, '3', '2-1', '11', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'CSE 2102', 'Data Structure', 3, '3', '2-1', '11', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'CSE 2103', 'Data Structure Lab ', 1.5, '3', '2-1', '11', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'CSE 2104', 'Digital Logic Design', 3, '3', '2-1', '11', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'CSE 2105', 'Digital Logic Design Lab ', 1.5, '3', '2-1', '11', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
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
(66, 'IPE 4102', 'Industrial Management', 3, '3', '1-1', '11', '4', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'CSE 41XX', 'Option I (One optional course)', 3, '3', '4-1', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'CSE 41XX', 'Option I (One optional course) Lab', 1.5, '3', '4-1', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'CSE 4201', 'Computer Graphics ', 3, '3', '4-2', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'CSE 4202', 'Computer Graphics Lab', 1.5, '3', '4-2', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'CSE 42XX', 'Option II (One optional course)', 3, '3', '4-2', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'CSE 4399', 'Project/Thesis (Phase I)', 3, '3', '4-2', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'CSE 4301', 'Industrial Training', 1.5, '3', '4-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'CSE 43XX', 'Option II (One optional course)', 3, '3', '4-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'CSE 4399', 'Project/Thesis (Phase II)', 3, '3', '4-3', '11', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'MAT 1101', 'Differential and Integral Calculus and Coordinate Geometry', 3, '4', '1-1', '12', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'PHY 1103', 'Physics (Heat and Thermodynamics, Electricity and Magnetism, and Modern Physics)', 3, '4', '1-1', '12', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'PHY 1104', 'Physics Lab ', 0.75, '4', '1-1', '12', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'ENG 1105', 'English I', 3, '4', '1-2', '12', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'CSE 1201', 'Structured Programming Language', 3, '4', '1-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'CSE 1202', 'Structured Programming Language Lab ', 1.5, '4', '1-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'MAT 1203', 'Differential Equation and Statistics', 3, '4', '1-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'CHEM 1205', 'Chemistry', 3, '4', '1-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'ME 1206', 'Mechanical Engineering Drawing', 0.75, '4', '1-2', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'ENG 1207', 'English II', 3, '4', '1-1', '12', '4', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
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
(137, 'CSE 43XX', 'Option II lab', 0.75, '4', '4-3', '12', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 'MAT 1101', 'Differential and Integral Calculus and Coordinate Geometry', 3, '4', '1-1', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 'PHY 1103', 'Physics (Heat and Thermodynamics, Electricity and Magnetism, and Modern Physics)', 3, '4', '1-1', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 'PHY 1104', 'Physics Lab ', 0.75, '4', '1-1', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 'ENG 1105', 'English I', 3, '4', '1-1', '13', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 'CSE 1201', 'Structured Programming Language', 3, '4', '1-2', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 'CSE 1202', 'Structured Programming Language Lab ', 1.5, '4', '1-2', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 'MAT 1203', 'Differential Equation and Statistics', 3, '4', '1-2', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 'CHEM 1205', 'Chemistry', 3, '4', '1-2', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 'ME 1206', 'Mechanical Engineering Drawing', 0.75, '4', '1-2', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 'ENG 1207', 'English II', 3, '4', '1-2', '13', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 'CSE 1301', 'Object Oriented Programming', 3, '4', '1-3', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 'CSE 1302', 'Object Oriented Programming Lab ', 1.5, '4', '1-3', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 'CSE 1303', 'Discrete Mathematics ', 3, '4', '1-3', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 'EEE 1305', 'Electrical Engineering and Circuit Analysis', 3, '4', '1-3', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 'EEE 1306', 'Electrical Engineering and Circuit Analysis Lab', 1.5, '4', '1-3', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 'CSE 2101', 'Data Structure ', 3, '4', '2-1', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 'CSE 2102', 'Data Structure Lab ', 1.5, '4', '2-1', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 'EEE 2103', 'Electronic Devices and Circuits', 3, '4', '2-1', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, 'EEE 2104', 'Electronic Devices and Circuits Lab', 1.5, '4', '2-1', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 'MAT 2105', 'Matrices, Vectors and Fourier Analysis', 3, '4', '2-1', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 'HUM 2107', 'Bangladesh Studies', 3, '4', '2-1', '13', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 'CSE 2201', 'Digital Logic Design', 3, '4', '2-2', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 'CSE 2202', 'Digital Logic Design Lab', 1.5, '4', '2-2', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 'CSE 2203', 'Algorithm Analysis and Design', 3, '4', '2-2', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, 'CSE 2204', 'Algorithm Analysis and Design Lab', 1.5, '4', '2-2', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 'MAT 2205', 'Complex Variable and Laplace Transformation', 3, '4', '2-2', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, 'HUM 2207', 'Critical Approach to Sociology', 2, '4', '2-2', '13', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 'CSE 2301', 'Database Management Systems', 3, '4', '2-3', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, 'CSE 2302', 'Database Management Systems Lab ', 1.5, '4', '2-3', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 'CSE 2303', 'Theory of Computation', 3, '4', '2-3', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, 'HUM 2305', 'Bengali Language and Literature and History of Emergence of Bangladesh', 3, '4', '2-3', '13', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 'CSE 3101', 'Software Engineering and Information System Design ', 3, '4', '3-1', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 'CSE 3102', 'Software Engineering and Information System Design Lab ', 0.75, '4', '3-1', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, 'CSE 3103', 'Microprocessor and Assembly Language Programming', 3, '4', '3-1', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, 'CSE 3104', 'Microprocessor and Assembly Language Programming Lab ', 1.5, '4', '3-1', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, 'CSE 3105', 'Data Communication', 3, '4', '3-1', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, 'ACC 3107', 'Accounting', 2, '4', '3-1', '13', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, 'CSE 3201', 'Compiler Design', 3, '4', '3-2', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, 'CSE 3202', 'Compiler Design Lab', 0.75, '4', '3-2', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, 'CSE 3203', 'Computer Architecture', 3, '4', '3-2', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, 'CSE 3205', 'Numerical Methods', 3, '4', '3-2', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, 'ECO 3207', 'Economics', 3, '4', '3-2', '13', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, 'CSE 3301', 'Computer Networks', 3, '4', '3-3', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(181, 'CSE 3302', 'Computer Networks Lab ', 1.5, '4', '3-3', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(182, 'CSE 3303', 'Operating System', 3, '4', '3-3', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, 'CSE 3304', 'Operating System Lab', 1.5, '4', '3-3', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, 'CSE 3306', 'Technical Writing and Presentation', 0.75, '4', '3-3', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, 'CSE 4101', 'Artificial Intelligence and Expert Systems', 3, '4', '4-1', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, 'CSE 4102', 'Artificial Intelligence and Expert Systems Lab', 0.75, '4', '4-1', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, 'CSE 4103', 'Digital System Design', 3, '4', '4-1', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(188, 'CSE 4104', 'Digital System Design Lab', 0.75, '4', '4-1', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(189, 'IPE 4105', 'Industrial Management', 3, '4', '4-1', '13', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(190, 'CSE 41XX', 'Option I (One optional course)', 3, '4', '4-1', '13', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(191, 'CSE 4200', 'Project/Thesis (Phase I)', 3, '4', '4-2', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(192, 'CSE 4201', 'Computer Graphics ', 3, '4', '4-2', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(193, 'CSE 4202', 'Computer Graphics Lab ', 0.75, '4', '4-2', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(194, 'CSE 42XX', 'Option II', 3, '4', '4-2', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(195, 'CSE 42XX', 'Option II lab', 0.75, '4', '4-2', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, 'CSE 4200', 'Project/Thesis (Phase II)', 3, '4', '4-3', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(197, 'CSE 4300', 'Industrial Training', 1, '4', '4-3', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(198, 'CSE 43XX', 'Option II', 3, '4', '4-3', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(199, 'CSE 43XX', 'Option II lab', 0.75, '4', '4-3', '13', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(200, 'bba 1106', 'management', 3, '2', '1-1', '14', '1', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(201, 'bba 1101', 'sociology', 2, '2', '1-1', '14', '1', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, 'bba 1108', 'marketing', 3, '2', '1-3', '14', '1', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(203, 'MAT 1101', 'Differential and Integral Calculus and Coordinate Geometry', 3, '4', '1-1', '15', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, 'PHY 1103', 'Physics (Heat and Thermodynamics, Electricity and Magnetism, and Modern Physics)', 3, '4', '1-1', '15', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(205, 'PHY 1104', 'Physics Lab ', 0.75, '4', '1-1', '15', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(206, 'ENG 1105', 'English I', 3, '4', '1-1', '15', '4', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(207, 'CSE 1201', 'Structured Programming Language', 3, '4', '1-2', '15', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(208, 'CSE 1202', 'Structured Programming Language Lab ', 1.5, '4', '1-2', '15', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(209, 'MAT 1203', 'Differential Equation and Statistics', 3, '4', '1-2', '15', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(210, 'CHEM 1205', 'Chemistry', 3, '4', '1-2', '15', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(211, 'ME 1206', 'Mechanical Engineering Drawing', 0.75, '4', '1-2', '15', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(212, 'ENG 1207', 'English II', 3, '4', '1-2', '15', '4', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(213, 'CSE 1301', 'Object Oriented Programming', 3, '4', '1-3', '15', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(214, 'CSE 1302', 'Object Oriented Programming Lab ', 1.5, '4', '1-3', '15', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(215, 'CSE 1303', 'Discrete Mathematics ', 3, '4', '1-3', '15', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(216, 'EEE 1305', 'Electrical Engineering and Circuit Analysis', 3, '4', '1-3', '15', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(217, 'EEE 1306', 'Electrical Engineering and Circuit Analysis Lab', 1.5, '4', '1-3', '15', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(218, 'CSE 2101', 'Data Structure ', 3, '4', '2-1', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(219, 'CSE 2102', 'Data Structure Lab ', 1.5, '4', '2-1', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(220, 'EEE 2103', 'Electronic Devices and Circuits', 3, '4', '2-1', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(221, 'EEE 2104', 'Electronic Devices and Circuits Lab', 1.5, '4', '2-1', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(222, 'MAT 2105', 'Matrices, Vectors and Fourier Analysis', 3, '4', '2-1', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(223, 'HUM 2107', 'Bangladesh Studies', 3, '4', '2-1', '15', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(224, 'CSE 2201', 'Digital Logic Design', 3, '4', '2-2', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(225, 'CSE 2202', 'Digital Logic Design Lab', 1.5, '4', '2-2', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(226, 'CSE 2203', 'Algorithm Analysis and Design', 3, '4', '2-2', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(227, 'CSE 2204', 'Algorithm Analysis and Design Lab', 1.5, '4', '2-2', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(228, 'MAT 2205', 'Complex Variable and Laplace Transformation', 3, '4', '2-2', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(229, 'HUM 2207', 'Critical Approach to Sociology', 2, '4', '2-2', '15', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(230, 'CSE 2301', 'Database Management Systems', 3, '4', '2-3', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(231, 'CSE 2302', 'Database Management Systems Lab ', 1.5, '4', '2-3', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(232, 'CSE 2303', 'Theory of Computation', 3, '4', '2-3', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(233, 'HUM 2305', 'Bengali Language and Literature and History of Emergence of Bangladesh', 3, '4', '2-3', '15', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(234, 'CSE 3101', 'Software Engineering and Information System Design ', 3, '4', '3-1', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(235, 'CSE 3102', 'Software Engineering and Information System Design Lab ', 0.75, '4', '3-1', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(236, 'CSE 3103', 'Microprocessor and Assembly Language Programming', 3, '4', '3-1', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(237, 'CSE 3104', 'Microprocessor and Assembly Language Programming Lab ', 1.5, '4', '3-1', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(238, 'CSE 3105', 'Data Communication', 3, '4', '3-1', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(239, 'ACC 3107', 'Accounting', 2, '4', '3-1', '15', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(240, 'CSE 3201', 'Compiler Design', 3, '4', '3-2', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(241, 'CSE 3202', 'Compiler Design Lab', 0.75, '4', '3-2', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(242, 'CSE 3203', 'Computer Architecture', 3, '4', '3-2', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(243, 'CSE 3205', 'Numerical Methods', 3, '4', '3-2', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(244, 'ECO 3207', 'Economics', 3, '4', '3-2', '15', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(245, 'CSE 3301', 'Computer Networks', 3, '4', '3-3', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(246, 'CSE 3302', 'Computer Networks Lab ', 1.5, '4', '3-3', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(247, 'CSE 3303', 'Operating System', 3, '4', '3-3', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(248, 'CSE 3304', 'Operating System Lab', 1.5, '4', '3-3', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(249, 'CSE 3306', 'Technical Writing and Presentation', 0.75, '4', '3-3', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(250, 'CSE 4101', 'Artificial Intelligence and Expert Systems', 3, '4', '4-1', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(251, 'CSE 4102', 'Artificial Intelligence and Expert Systems Lab', 0.75, '4', '4-1', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(252, 'CSE 4103', 'Digital System Design', 3, '4', '4-1', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(253, 'CSE 4104', 'Digital System Design Lab', 0.75, '4', '4-1', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(254, 'IPE 4105', 'Industrial Management', 3, '4', '4-1', '15', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(255, 'CSE 41XX', 'Option I (One optional course)', 3, '4', '4-1', '15', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(256, 'CSE 4200', 'Project/Thesis (Phase I)', 3, '4', '4-2', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(257, 'CSE 4201', 'Computer Graphics ', 3, '4', '4-2', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(258, 'CSE 4202', 'Computer Graphics Lab ', 0.75, '4', '4-2', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(259, 'CSE 42XX', 'Option II', 3, '4', '4-2', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(260, 'CSE 42XX', 'Option II lab', 0.75, '4', '4-2', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(261, 'CSE 4200', 'Project/Thesis (Phase II)', 3, '4', '4-3', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(262, 'CSE 4300', 'Industrial Training', 1, '4', '4-3', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(263, 'CSE 43XX', 'Option II', 3, '4', '4-3', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(264, 'CSE 43XX', 'Option II lab', 0.75, '4', '4-3', '15', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(265, 'MAT 1101', 'Differential and Integral Calculus and Coordinate Geometry', 3, '4', '4-3', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(266, 'PHY 1103', 'Physics (Heat and Thermodynamics, Electricity and Magnetism, and Modern Physics)', 3, '4', '1-2', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(267, 'PHY 1104', 'Physics Lab ', 0.75, '4', '2-1', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(268, 'ENG 1105', 'English I', 3, '4', '2-2', '16', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(269, 'CSE 1201', 'Structured Programming Language', 3, '4', '1-2', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(270, 'CSE 1202', 'Structured Programming Language Lab ', 1.5, '4', '1-2', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(271, 'MAT 1203', 'Differential Equation and Statistics', 3, '4', '1-2', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(272, 'CHEM 1205', 'Chemistry', 3, '4', '1-2', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(273, 'ME 1206', 'Mechanical Engineering Drawing', 0.75, '4', '1-2', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(274, 'ENG 1207', 'English II', 3, '4', '1-2', '16', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(275, 'CSE 1301', 'Object Oriented Programming', 3, '4', '1-3', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(276, 'CSE 1302', 'Object Oriented Programming Lab ', 1.5, '4', '1-3', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(277, 'CSE 1303', 'Discrete Mathematics ', 3, '4', '1-3', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(278, 'EEE 1305', 'Electrical Engineering and Circuit Analysis', 3, '4', '1-3', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(279, 'EEE 1306', 'Electrical Engineering and Circuit Analysis Lab', 1.5, '4', '1-3', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(280, 'CSE 2101', 'Data Structure ', 3, '4', '2-1', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(281, 'CSE 2102', 'Data Structure Lab ', 1.5, '4', '2-1', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(282, 'EEE 2103', 'Electronic Devices and Circuits', 3, '4', '2-1', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(283, 'EEE 2104', 'Electronic Devices and Circuits Lab', 1.5, '4', '2-1', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(284, 'MAT 2105', 'Matrices, Vectors and Fourier Analysis', 3, '4', '2-1', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(285, 'HUM 2107', 'Bangladesh Studies', 3, '4', '2-1', '16', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(286, 'CSE 2201', 'Digital Logic Design', 3, '4', '2-2', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(287, 'CSE 2202', 'Digital Logic Design Lab', 1.5, '4', '2-2', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(288, 'CSE 2203', 'Algorithm Analysis and Design', 3, '4', '2-2', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(289, 'CSE 2204', 'Algorithm Analysis and Design Lab', 1.5, '4', '2-2', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(290, 'MAT 2205', 'Complex Variable and Laplace Transformation', 3, '4', '2-2', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(291, 'HUM 2207', 'Critical Approach to Sociology', 2, '4', '2-2', '16', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(292, 'CSE 2301', 'Database Management Systems', 3, '4', '2-3', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(293, 'CSE 2302', 'Database Management Systems Lab ', 1.5, '4', '2-3', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(294, 'CSE 2303', 'Theory of Computation', 3, '4', '2-3', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(295, 'HUM 2305', 'Bengali Language and Literature and History of Emergence of Bangladesh', 3, '4', '2-3', '16', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(296, 'CSE 3101', 'Software Engineering and Information System Design ', 3, '4', '3-1', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(297, 'CSE 3102', 'Software Engineering and Information System Design Lab ', 0.75, '4', '3-1', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(298, 'CSE 3103', 'Microprocessor and Assembly Language Programming', 3, '4', '3-1', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(299, 'CSE 3104', 'Microprocessor and Assembly Language Programming Lab ', 1.5, '4', '3-1', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(300, 'CSE 3105', 'Data Communication', 3, '4', '3-1', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(301, 'ACC 3107', 'Accounting', 2, '4', '3-1', '16', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(302, 'CSE 3201', 'Compiler Design', 3, '4', '3-2', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(303, 'CSE 3202', 'Compiler Design Lab', 0.75, '4', '3-2', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(304, 'CSE 3203', 'Computer Architecture', 3, '4', '3-2', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(305, 'CSE 3205', 'Numerical Methods', 3, '4', '3-2', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(306, 'ECO 3207', 'Economics', 3, '4', '3-2', '16', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(307, 'CSE 3301', 'Computer Networks', 3, '4', '3-3', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(308, 'CSE 3302', 'Computer Networks Lab ', 1.5, '4', '3-3', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(309, 'CSE 3303', 'Operating System', 3, '4', '3-3', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(310, 'CSE 3304', 'Operating System Lab', 1.5, '4', '3-3', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(311, 'CSE 3306', 'Technical Writing and Presentation', 0.75, '4', '3-3', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(312, 'CSE 4101', 'Artificial Intelligence and Expert Systems', 3, '4', '4-1', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(313, 'CSE 4102', 'Artificial Intelligence and Expert Systems Lab', 0.75, '4', '4-1', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(314, 'CSE 4103', 'Digital System Design', 3, '4', '4-1', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(315, 'CSE 4104', 'Digital System Design Lab', 0.75, '4', '4-1', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(316, 'IPE 4105', 'Industrial Management', 3, '4', '4-1', '16', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(317, 'CSE 41XX', 'Option I (One optional course)', 3, '4', '4-1', '16', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(318, 'CSE 4200', 'Project/Thesis (Phase I)', 3, '4', '4-2', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(319, 'CSE 4201', 'Computer Graphics ', 3, '4', '4-2', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(320, 'CSE 4202', 'Computer Graphics Lab ', 0.75, '4', '4-2', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(321, 'CSE 42XX', 'Option II', 3, '4', '4-2', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(322, 'CSE 42XX', 'Option II lab', 0.75, '4', '4-2', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(323, 'CSE 4200', 'Project/Thesis (Phase II)', 3, '4', '4-3', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(324, 'CSE 4300', 'Industrial Training', 1, '4', '1-1', '16', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(325, 'CSE 43XX', 'Option II', 3, '4', '4-3', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(326, 'CSE 43XX', 'Option II lab', 0.75, '4', '4-3', '16', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(327, 'MAT 1101', 'Differential and Integral Calculus and Coordinate Geometry', 3, '4', '1-1', '17', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(328, 'PHY 1103', 'Physics (Heat and Thermodynamics, Electricity and Magnetism, and Modern Physics)', 3, '4', '1-1', '17', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(329, 'PHY 1104', 'Physics Lab ', 0.75, '4', '1-1', '17', '4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(330, 'ENG 1105', 'English I', 3, '4', '1-1', '17', '4', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(331, 'CSE 1201', 'Structured Programming Language', 3, '4', '1-2', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(332, 'CSE 1202', 'Structured Programming Language Lab ', 1.5, '4', '1-2', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(333, 'MAT 1203', 'Differential Equation and Statistics', 3, '4', '1-2', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(334, 'CHEM 1205', 'Chemistry', 3, '4', '1-2', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(335, 'ME 1206', 'Mechanical Engineering Drawing', 0.75, '4', '1-2', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(336, 'ENG 1207', 'English II', 3, '4', '1-2', '17', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(337, 'CSE 1301', 'Object Oriented Programming', 3, '4', '1-3', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(338, 'CSE 1302', 'Object Oriented Programming Lab ', 1.5, '4', '1-3', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(339, 'CSE 1303', 'Discrete Mathematics ', 3, '4', '1-3', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(340, 'EEE 1305', 'Electrical Engineering and Circuit Analysis', 3, '4', '1-3', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(341, 'EEE 1306', 'Electrical Engineering and Circuit Analysis Lab', 1.5, '4', '1-3', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(342, 'CSE 2101', 'Data Structure ', 3, '4', '2-1', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(343, 'CSE 2102', 'Data Structure Lab ', 1.5, '4', '2-1', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(344, 'EEE 2103', 'Electronic Devices and Circuits', 3, '4', '2-1', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(345, 'EEE 2104', 'Electronic Devices and Circuits Lab', 1.5, '4', '2-1', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(346, 'MAT 2105', 'Matrices, Vectors and Fourier Analysis', 3, '4', '2-1', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(347, 'HUM 2107', 'Bangladesh Studies', 3, '4', '2-1', '17', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(348, 'CSE 2201', 'Digital Logic Design', 3, '4', '2-2', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(349, 'CSE 2202', 'Digital Logic Design Lab', 1.5, '4', '2-2', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(350, 'CSE 2203', 'Algorithm Analysis and Design', 3, '4', '2-2', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(351, 'CSE 2204', 'Algorithm Analysis and Design Lab', 1.5, '4', '2-2', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(352, 'MAT 2205', 'Complex Variable and Laplace Transformation', 3, '4', '2-2', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(353, 'HUM 2207', 'Critical Approach to Sociology', 2, '4', '2-2', '17', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(354, 'CSE 2301', 'Database Management Systems', 3, '4', '2-3', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(355, 'CSE 2302', 'Database Management Systems Lab ', 1.5, '4', '2-3', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(356, 'CSE 2303', 'Theory of Computation', 3, '4', '2-3', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(357, 'HUM 2305', 'Bengali Language and Literature and History of Emergence of Bangladesh', 3, '4', '2-3', '17', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(358, 'CSE 3101', 'Software Engineering and Information System Design ', 3, '4', '3-1', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(359, 'CSE 3102', 'Software Engineering and Information System Design Lab ', 0.75, '4', '3-1', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(360, 'CSE 3103', 'Microprocessor and Assembly Language Programming', 3, '4', '3-1', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(361, 'CSE 3104', 'Microprocessor and Assembly Language Programming Lab ', 1.5, '4', '3-1', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(362, 'CSE 3105', 'Data Communication', 3, '4', '3-1', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(363, 'ACC 3107', 'Accounting', 2, '4', '3-1', '17', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(364, 'CSE 3201', 'Compiler Design', 3, '4', '3-2', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(365, 'CSE 3202', 'Compiler Design Lab', 0.75, '4', '3-2', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(366, 'CSE 3203', 'Computer Architecture', 3, '4', '3-2', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(367, 'CSE 3205', 'Numerical Methods', 3, '4', '3-2', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(368, 'ECO 3207', 'Economics', 3, '4', '3-2', '17', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(369, 'CSE 3301', 'Computer Networks', 3, '4', '3-3', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(370, 'CSE 3302', 'Computer Networks Lab ', 1.5, '4', '3-3', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(371, 'CSE 3303', 'Operating System', 3, '4', '3-3', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(372, 'CSE 3304', 'Operating System Lab', 1.5, '4', '3-3', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(373, 'CSE 3306', 'Technical Writing and Presentation', 0.75, '4', '3-3', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(374, 'CSE 4101', 'Artificial Intelligence and Expert Systems', 3, '4', '4-1', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(375, 'CSE 4102', 'Artificial Intelligence and Expert Systems Lab', 0.75, '4', '4-1', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(376, 'CSE 4103', 'Digital System Design', 3, '4', '4-1', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(377, 'CSE 4104', 'Digital System Design Lab', 0.75, '4', '4-1', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(378, 'IPE 4105', 'Industrial Management', 3, '4', '4-1', '17', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(379, 'CSE 41XX', 'Option I (One optional course)', 3, '4', '4-1', '17', '4', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(380, 'CSE 4200', 'Project/Thesis (Phase I)', 3, '4', '4-2', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(381, 'CSE 4201', 'Computer Graphics ', 3, '4', '4-2', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(382, 'CSE 4202', 'Computer Graphics Lab ', 0.75, '4', '4-2', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(383, 'CSE 42XX', 'Option II', 3, '4', '4-2', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(384, 'CSE 42XX', 'Option II lab', 0.75, '4', '4-2', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(385, 'CSE 4200', 'Project/Thesis (Phase II)', 3, '4', '4-3', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(386, 'CSE 4300', 'Industrial Training', 1, '4', '4-3', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(387, 'CSE 43XX', 'Option II', 3, '4', '4-3', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(388, 'CSE 43XX', 'Option II lab', 0.75, '4', '4-3', '17', '4', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `uni_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(4, '1111', 'mike', 'mike@gmail.com', 'Course Coordinator', '1', '$2y$10$lsnYEuDROZVrJLicpV0r1.dc3HkpuwwdSwcdMiCLSDROlc6q4GJpu', NULL, '2020-07-15 09:46:42', NULL),
(70, '10010', 'Course Cse', 'coursecse@gmail.com', 'Course Coordinator', '4', '$2y$10$pzbXun71.xcMRbaGT79JOOZV2DcyeCtBFL2OcL1qSB3OBBAge/qj.', 'course_coordinator-70-1608472830.jpg', '2020-11-13 10:35:30', '2020-12-20 14:00:31');

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
(4, 'Computer Science & Engineering', NULL, NULL),
(5, 'Mechanical Engineering', NULL, NULL),
(7, 'Electrical and Electronic Engineering', NULL, NULL),
(9, 'Bangla Literature', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_controllers`
--

CREATE TABLE `exam_controllers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uni_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `uni_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(60, '1010', 'Baizeed Ahmed Bhuiyan', 'baizeed@ndub.edu.bd', 'Faculty', '4', '$2y$10$n1494tvWATrlbwBI/PRFcuVuUDGksrkhlOeVH/wwimpRUDCNJqhEm', NULL, 'Lecturer', NULL, NULL, '2020-11-11 06:02:53', NULL),
(61, '001', 'Tazia Hossain', 'tazia@ndub.edu.bd', 'Faculty', '1', '$2y$10$ySlPMX9nxGQp5Mbu/2EF4OJOR1/AV5qWlcjHx8/oi3R5UWkcCoxCq', NULL, 'Lecturer', NULL, NULL, '2020-11-13 09:03:24', NULL),
(64, '002', 'Kamol Gomes', 'kamol@ndub.edu.bd', 'Faculty', '1', '$2y$10$8wh2J/JwEpk3HiP7.aDWYu3pzQkTSv/oVpriemeCKDNoSwPu3xBIW', NULL, 'Lecturer', NULL, NULL, '2020-11-13 09:30:04', NULL),
(78, '00001111', 'Fr. Tom McDermott', 'mcdermottcsc@gmail.com', 'Faculty', '2', '$2y$10$4e1A4EhUUrbbHUz9heMO7OG1f144tbMwGs1wFBkIGpxIOeFh/offK', NULL, 'Lecturer', NULL, NULL, '2020-11-14 06:55:19', NULL);

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
(2, '3', '1', '1-3', NULL, NULL),
(3, '4', '1', '1-2', NULL, NULL),
(4, '6', '1', '1-2', NULL, NULL),
(5, '7', '1', '1-1', NULL, NULL),
(6, '10', '1', '1-1', NULL, NULL),
(7, '11', '4', '2-2', NULL, NULL),
(8, '12', '4', '1-2', NULL, NULL),
(9, '13', '4', '1-1', NULL, NULL),
(10, '14', '1', '1-1', NULL, NULL),
(11, '15', '4', '2-1', NULL, NULL),
(12, '16', '4', '1-2', NULL, NULL),
(13, '17', '4', '1-2', NULL, NULL);

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
(1, '1', 12),
(2, '2', 12),
(3, '4', 12);

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
(33, '2020_09_16_070040_create_permission_for_allow_assign_more_regular_course_to_faculties_table', 13),
(34, '2021_01_03_143631_create_student_mark_update_information_for_faculties_table', 14);

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
(23, '6', '3', '2'),
(24, '14', '52', '1'),
(25, '14', '52', '1'),
(26, '43', '78', '7');

-- --------------------------------------------------------

--
-- Table structure for table `registrars`
--

CREATE TABLE `registrars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uni_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, '111', 'Alice', 'alice@gmail.com', 'Registrar', '$2y$10$XWQjEMob/cCE2bw637nxzu/NC6itKb.J4II/QHxzvUjfCJ50xxbyS', 'registrar-1-1605257878.jpg', NULL, '2020-11-13 08:59:32');

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
(9, '5', '4', '3', '1', '2', '2', 1, 1, 0),
(10, '1', '3', NULL, '1', '1', '1', 0, 0, 0),
(11, '6', '6', NULL, '1', '1', '2', 0, 0, 0),
(12, '7', '6', NULL, '1', '1', '2', 0, 0, 0),
(13, '19', '11', NULL, '4', '1', '3', 0, 0, 0),
(14, '20', '11', '52', '4', '1', '3', 0, 1, 1),
(15, '22', '11', NULL, '4', '1', '3', 0, 0, 0),
(16, '30', '11', NULL, '4', '1', '3', 0, 0, 0),
(17, '66', '11', NULL, '4', '1', '3', 0, 0, 0),
(18, '21', '11', '52', '4', '1', '3', 0, 1, 1),
(19, '23', '11', NULL, '4', '1', '3', 0, 0, 0),
(20, '24', '11', NULL, '4', '1', '3', 0, 0, 0),
(21, '25', '11', NULL, '4', '1', '3', 0, 0, 0),
(22, '26', '11', NULL, '4', '1', '3', 0, 0, 0),
(23, '27', '11', NULL, '4', '1', '3', 0, 0, 0),
(24, '28', '11', NULL, '4', '1', '3', 0, 0, 0),
(25, '18', '11', NULL, '4', '1', '3', 0, 0, 0),
(26, '29', '11', NULL, '4', '1', '3', 0, 0, 0),
(27, '31', '11', NULL, '4', '1', '3', 0, 0, 0),
(28, '32', '11', NULL, '4', '1', '3', 0, 0, 0),
(29, '33', '11', NULL, '4', '1', '3', 0, 0, 0),
(30, '34', '11', NULL, '4', '1', '3', 0, 0, 0),
(31, '35', '11', NULL, '4', '1', '3', 0, 0, 0),
(32, '36', '11', NULL, '4', '1', '3', 0, 0, 0),
(33, '37', '11', NULL, '4', '1', '3', 0, 0, 0),
(34, '38', '11', NULL, '4', '1', '3', 0, 0, 0),
(35, '39', '11', NULL, '4', '1', '3', 0, 0, 0),
(36, '76', '12', NULL, '4', '1', '4', 0, 0, 0),
(37, '77', '12', NULL, '4', '1', '4', 0, 0, 0),
(38, '78', '12', NULL, '4', '1', '4', 0, 0, 0),
(39, '85', '12', NULL, '4', '1', '4', 0, 0, 0),
(40, '203', '15', '54', '4', '7', '4', 0, 1, 1),
(41, '204', '15', '52', '4', '7', '4', 0, 1, 1),
(42, '205', '15', '52', '4', '7', '4', 0, 1, 1),
(43, '206', '15', '78', '4', '7', '4', 0, 1, 1),
(44, '324', '16', '56', '4', '6', '4', 0, 1, 1),
(45, '207', '15', '51', '4', '8', '4', 0, 1, 1),
(46, '208', '15', '51', '4', '8', '4', 0, 1, 1),
(47, '209', '15', '54', '4', '8', '4', 0, 1, 1),
(48, '210', '15', '57', '4', '8', '4', 0, 1, 1),
(49, '211', '15', '56', '4', '8', '4', 0, 1, 1),
(50, '212', '15', '78', '4', '8', '4', 0, 1, 1),
(51, '327', '17', '51', '4', '9', '4', 0, 1, 1),
(52, '328', '17', '52', '4', '9', '4', 0, 1, 1),
(53, '329', '17', '52', '4', '9', '4', 0, 1, 1),
(54, '330', '17', '78', '4', '9', '4', 0, 1, 1),
(55, '213', '15', '58', '4', '9', '4', 0, 1, 1),
(56, '214', '15', '58', '4', '9', '4', 0, 1, 1),
(57, '215', '15', '53', '4', '9', '4', 0, 1, 1),
(58, '216', '15', '60', '4', '9', '4', 0, 1, 1),
(59, '217', '15', '60', '4', '9', '4', 0, 1, 1);

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
(6, '4', '4', '5', '1', '2', '2', NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, 0, NULL, NULL, 1, 0),
(7, '1', '3', '5', '1', '1', '1', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(8, '19', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(9, '19', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(10, '19', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(11, '19', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(12, '19', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(13, '19', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(14, '19', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(15, '19', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(16, '19', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(17, '19', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(18, '20', '11', '10', '4', '1', '3', 6, 0, 9, 0, NULL, 1, 18, 0, 38, 0, 71, NULL, NULL, 1, 0),
(19, '20', '11', '11', '4', '1', '3', 9, 0, 10, 0, 10, 0, 30, 0, 40, 0, 99, NULL, NULL, 1, 0),
(20, '20', '11', '12', '4', '1', '3', 10, 0, 10, 0, 10, 0, 10, 0, 10, 0, 50, NULL, NULL, 1, 0),
(21, '20', '11', '13', '4', '1', '3', 10, 0, 10, 0, 10, 0, 10, 0, 10, 0, 50, NULL, NULL, 1, 0),
(22, '20', '11', '14', '4', '1', '3', 8, 0, 8, 0, NULL, 1, 15, 0, 30, 0, 61, NULL, NULL, 1, 0),
(23, '20', '11', '15', '4', '1', '3', 5, 0, 5, 0, NULL, 1, 12, 0, 23, 0, 45, NULL, NULL, 1, 0),
(24, '20', '11', '16', '4', '1', '3', 10, 0, 10, 0, 10, 0, 20, 0, 40, 0, 90, NULL, NULL, 1, 0),
(25, '20', '11', '17', '4', '1', '3', 7, 0, 10, 0, 5, 0, 12, 0, 27, 0, 61, NULL, NULL, 1, 0),
(26, '20', '11', '18', '4', '1', '3', 10, 0, 10, 0, 5, 0, 10, 0, 18, 0, 53, NULL, NULL, 1, 0),
(27, '20', '11', '19', '4', '1', '3', 5, 0, 7, 0, 6, 0, 16, 0, 28, 0, 62, NULL, NULL, 1, 0),
(28, '22', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(29, '22', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(30, '22', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(31, '22', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(32, '22', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(33, '22', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(34, '22', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(35, '22', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(36, '22', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(37, '22', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(38, '30', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(39, '30', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(40, '30', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(41, '30', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(42, '30', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(43, '30', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(44, '30', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(45, '30', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(46, '30', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(47, '30', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(48, '66', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(49, '66', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(50, '66', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(51, '66', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(52, '66', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(53, '66', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(54, '66', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(55, '66', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(56, '66', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(57, '66', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(58, '21', '11', '10', '4', '1', '3', 10, 0, 9, 0, 9, 0, 17, 0, 35, 0, 80, NULL, NULL, 1, 0),
(59, '21', '11', '11', '4', '1', '3', 10, 0, 8, 0, 8, 0, 16, 0, 34, 0, 76, NULL, NULL, 1, 0),
(60, '21', '11', '12', '4', '1', '3', 8, 0, 5, 0, 5, 0, 8, 0, 8, 0, 34, NULL, NULL, 1, 0),
(61, '21', '11', '13', '4', '1', '3', 10, 0, 10, 0, 10, 0, 20, 0, 40, 0, 90, NULL, NULL, 1, 0),
(62, '21', '11', '14', '4', '1', '3', 10, 0, 8, 0, 7, 0, 15, 0, 30, 0, 70, NULL, NULL, 1, 0),
(63, '21', '11', '15', '4', '1', '3', 6, 0, 7, 0, 5, 0, 12, 0, 28, 0, 58, NULL, NULL, 1, 0),
(64, '21', '11', '16', '4', '1', '3', 10, 0, 10, 0, 10, 0, 12, 0, 27, 0, 69, NULL, NULL, 1, 0),
(65, '21', '11', '17', '4', '1', '3', 10, 0, 8, 0, 7, 0, 17, 0, 31, 0, 73, NULL, NULL, 1, 0),
(66, '21', '11', '18', '4', '1', '3', 5, 0, 5, 0, 5, 0, NULL, 1, 20, 0, 35, NULL, NULL, 1, 0),
(67, '21', '11', '19', '4', '1', '3', 3, 0, 4, 0, 0, 0, 7, 0, 19, 0, 33, NULL, NULL, 1, 0),
(68, '23', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(69, '23', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(70, '23', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(71, '23', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(72, '23', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(73, '23', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(74, '23', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(75, '23', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(76, '23', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(77, '23', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(78, '24', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(79, '24', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(80, '24', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(81, '24', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(82, '24', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(83, '24', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(84, '24', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(85, '24', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(86, '24', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(87, '24', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(88, '25', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(89, '25', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(90, '25', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(91, '25', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(92, '25', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(93, '25', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(94, '25', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(95, '25', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(96, '25', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(97, '25', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(98, '26', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(99, '26', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(100, '26', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(101, '26', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(102, '26', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(103, '26', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(104, '26', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(105, '26', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(106, '26', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(107, '26', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(108, '27', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(109, '27', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(110, '27', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(111, '27', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(112, '27', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(113, '27', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(114, '27', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(115, '27', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(116, '27', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(117, '27', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(118, '28', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(119, '28', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(120, '28', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(121, '28', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(122, '28', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(123, '28', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(124, '28', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(125, '28', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(126, '28', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(127, '28', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(128, '18', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(129, '18', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(130, '18', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(131, '18', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(132, '18', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(133, '18', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(134, '18', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(135, '18', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(136, '18', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(137, '18', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(138, '29', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(139, '29', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(140, '29', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(141, '29', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(142, '29', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(143, '29', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(144, '29', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(145, '29', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(146, '29', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(147, '29', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(148, '31', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(149, '31', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(150, '31', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(151, '31', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(152, '31', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(153, '31', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(154, '31', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(155, '31', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(156, '31', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(157, '31', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(158, '32', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(159, '32', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(160, '32', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(161, '32', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(162, '32', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(163, '32', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(164, '32', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(165, '32', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(166, '32', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(167, '32', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(168, '33', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(169, '33', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(170, '33', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(171, '33', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(172, '33', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(173, '33', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(174, '33', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(175, '33', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(176, '33', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(177, '33', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(178, '34', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(179, '34', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(180, '34', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(181, '34', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(182, '34', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(183, '34', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(184, '34', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(185, '34', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(186, '34', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(187, '34', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(188, '35', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(189, '35', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(190, '35', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(191, '35', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(192, '35', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(193, '35', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(194, '35', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(195, '35', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(196, '35', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(197, '35', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(198, '36', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(199, '36', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(200, '36', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(201, '36', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(202, '36', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(203, '36', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(204, '36', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(205, '36', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(206, '36', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(207, '36', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(208, '37', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(209, '37', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(210, '37', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(211, '37', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(212, '37', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(213, '37', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(214, '37', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(215, '37', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(216, '37', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(217, '37', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(218, '38', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(219, '38', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(220, '38', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(221, '38', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(222, '38', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(223, '38', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(224, '38', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(225, '38', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(226, '38', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(227, '38', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(228, '39', '11', '10', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(229, '39', '11', '11', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(230, '39', '11', '12', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(231, '39', '11', '13', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(232, '39', '11', '14', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(233, '39', '11', '15', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(234, '39', '11', '16', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(235, '39', '11', '17', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(236, '39', '11', '18', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(237, '39', '11', '19', '4', '1', '3', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(238, '76', '12', '20', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(239, '76', '12', '21', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(240, '76', '12', '22', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(241, '76', '12', '23', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(242, '76', '12', '24', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(243, '76', '12', '25', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(244, '76', '12', '26', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(245, '76', '12', '27', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(246, '76', '12', '28', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(247, '76', '12', '29', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(248, '76', '12', '30', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(249, '76', '12', '31', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(250, '76', '12', '32', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(251, '76', '12', '33', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(252, '76', '12', '34', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(253, '76', '12', '35', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(254, '76', '12', '36', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(255, '76', '12', '37', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(256, '76', '12', '38', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(257, '76', '12', '39', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(258, '76', '12', '40', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(259, '76', '12', '41', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(260, '76', '12', '42', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(261, '76', '12', '43', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(262, '76', '12', '44', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(263, '76', '12', '45', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(264, '76', '12', '46', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(265, '76', '12', '47', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(266, '76', '12', '48', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(267, '76', '12', '49', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(268, '76', '12', '50', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(269, '76', '12', '65', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(270, '77', '12', '20', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(271, '77', '12', '21', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(272, '77', '12', '22', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(273, '77', '12', '23', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(274, '77', '12', '24', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(275, '77', '12', '25', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(276, '77', '12', '26', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(277, '77', '12', '27', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(278, '77', '12', '28', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(279, '77', '12', '29', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(280, '77', '12', '30', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(281, '77', '12', '31', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(282, '77', '12', '32', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(283, '77', '12', '33', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(284, '77', '12', '34', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(285, '77', '12', '35', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(286, '77', '12', '36', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(287, '77', '12', '37', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(288, '77', '12', '38', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(289, '77', '12', '39', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(290, '77', '12', '40', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(291, '77', '12', '41', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(292, '77', '12', '42', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(293, '77', '12', '43', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(294, '77', '12', '44', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(295, '77', '12', '45', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(296, '77', '12', '46', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(297, '77', '12', '47', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(298, '77', '12', '48', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(299, '77', '12', '49', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(300, '77', '12', '50', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(301, '77', '12', '65', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(302, '78', '12', '20', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(303, '78', '12', '21', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(304, '78', '12', '22', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(305, '78', '12', '23', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(306, '78', '12', '24', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(307, '78', '12', '25', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(308, '78', '12', '26', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(309, '78', '12', '27', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(310, '78', '12', '28', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(311, '78', '12', '29', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(312, '78', '12', '30', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(313, '78', '12', '31', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(314, '78', '12', '32', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(315, '78', '12', '33', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(316, '78', '12', '34', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(317, '78', '12', '35', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(318, '78', '12', '36', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(319, '78', '12', '37', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(320, '78', '12', '38', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(321, '78', '12', '39', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(322, '78', '12', '40', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(323, '78', '12', '41', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(324, '78', '12', '42', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(325, '78', '12', '43', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(326, '78', '12', '44', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(327, '78', '12', '45', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(328, '78', '12', '46', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(329, '78', '12', '47', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(330, '78', '12', '48', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(331, '78', '12', '49', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(332, '78', '12', '50', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(333, '78', '12', '65', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(334, '85', '12', '20', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(335, '85', '12', '21', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(336, '85', '12', '22', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(337, '85', '12', '23', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(338, '85', '12', '24', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(339, '85', '12', '25', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(340, '85', '12', '26', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(341, '85', '12', '27', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(342, '85', '12', '28', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(343, '85', '12', '29', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(344, '85', '12', '30', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(345, '85', '12', '31', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(346, '85', '12', '32', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(347, '85', '12', '33', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(348, '85', '12', '34', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(349, '85', '12', '35', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(350, '85', '12', '36', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(351, '85', '12', '37', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(352, '85', '12', '38', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(353, '85', '12', '39', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(354, '85', '12', '40', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(355, '85', '12', '41', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(356, '85', '12', '42', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(357, '85', '12', '43', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(358, '85', '12', '44', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(359, '85', '12', '45', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(360, '85', '12', '46', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(361, '85', '12', '47', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(362, '85', '12', '48', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(363, '85', '12', '49', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(364, '85', '12', '50', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(365, '85', '12', '65', '4', '1', '4', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0),
(366, '203', '15', '71', '4', '7', '4', 8, 0, 8, 0, 9, 0, 17, 0, 36, 0, 78, NULL, NULL, 1, 1),
(367, '203', '15', '72', '4', '7', '4', 10, 0, 9, 0, 8, 0, 18, 0, 37, 0, 82, NULL, NULL, 1, 1),
(368, '203', '15', '73', '4', '7', '4', 7, 0, 6, 0, 7, 0, 14, 0, 29, 0, 63, NULL, NULL, 1, 1),
(369, '203', '15', '74', '4', '7', '4', 10, 0, 10, 0, 10, 0, 20, 0, 40, 0, 90, NULL, NULL, 1, 1),
(370, '203', '15', '75', '4', '7', '4', 8, 0, 7, 0, 8, 0, 16, 0, 30, 0, 69, NULL, NULL, 1, 1),
(371, '203', '15', '76', '4', '7', '4', 5, 0, 5, 0, 5, 0, 10, 0, 18, 0, 43, NULL, NULL, 1, 1),
(372, '204', '15', '71', '4', '7', '4', 7, 0, 8, 0, 7, 0, 17, 0, 34, 0, 73, NULL, NULL, 1, 1),
(373, '204', '15', '72', '4', '7', '4', 9, 0, 8, 0, 8, 0, 16, 0, 34, 0, 75, NULL, NULL, 1, 1),
(374, '204', '15', '73', '4', '7', '4', 7, 0, 6, 0, 6, 0, 10, 0, 28, 0, 57, NULL, NULL, 1, 1),
(375, '204', '15', '74', '4', '7', '4', 10, 0, 10, 0, 10, 0, 20, 0, 40, 0, 90, NULL, NULL, 1, 1),
(376, '204', '15', '75', '4', '7', '4', 7, 0, 8, 0, 7, 0, 17, 0, 35, 0, 74, NULL, NULL, 1, 1),
(377, '204', '15', '76', '4', '7', '4', 7, 0, 6, 0, 5, 0, 8, 0, 20, 0, 46, NULL, NULL, 1, 1),
(378, '205', '15', '71', '4', '7', '4', 7, 0, 6, 0, 7, 0, 15, 0, 29, 0, 64, NULL, NULL, 1, 1),
(379, '205', '15', '72', '4', '7', '4', 8, 0, 7, 0, 8, 0, 16, 0, 30, 0, 69, NULL, NULL, 1, 1),
(380, '205', '15', '73', '4', '7', '4', 7, 0, 7, 0, 5, 0, 10, 0, 27, 0, 56, NULL, NULL, 1, 1),
(381, '205', '15', '74', '4', '7', '4', 10, 0, 10, 0, 10, 0, 20, 0, 40, 0, 90, NULL, NULL, 1, 1),
(382, '205', '15', '75', '4', '7', '4', 9, 0, 8, 0, 8, 0, 17, 0, 36, 0, 78, NULL, NULL, 1, 1),
(383, '205', '15', '76', '4', '7', '4', 7, 0, 6, 0, 5, 0, 9, 0, 21, 0, 48, NULL, NULL, 1, 1),
(384, '206', '15', '71', '4', '7', '4', 10, 0, 8, 0, 6, 0, 14, 0, 27, 0, 65, NULL, NULL, 1, 1),
(385, '206', '15', '72', '4', '7', '4', 9, 0, 8, 0, 9, 0, 16, 0, 30, 0, 72, NULL, NULL, 1, 1),
(386, '206', '15', '73', '4', '7', '4', 7, 0, 6, 0, 5, 0, 12, 0, 25, 0, 55, NULL, NULL, 1, 1),
(387, '206', '15', '74', '4', '7', '4', 10, 0, 10, 0, 10, 0, 20, 0, 40, 0, 90, NULL, NULL, 1, 1),
(388, '206', '15', '75', '4', '7', '4', 9, 0, 8, 0, 8, 0, 16, 0, 32, 0, 73, NULL, NULL, 1, 1),
(389, '206', '15', '76', '4', '7', '4', 5, 0, 5, 0, 10, 0, 25, 0, 30, 0, 75, NULL, NULL, 1, 1),
(394, '207', '15', '71', '4', '8', '4', 9, 0, 8, 0, 7, 0, 12, 0, 25, 0, 61, NULL, NULL, 1, 1),
(395, '207', '15', '72', '4', '8', '4', 10, 0, 9, 0, 8, 0, 14, 0, 30, 0, 71, NULL, NULL, 1, 1),
(396, '207', '15', '73', '4', '8', '4', 7, 0, 6, 0, 5, 0, 8, 0, 20, 0, 46, NULL, NULL, 1, 1),
(397, '207', '15', '74', '4', '8', '4', 10, 0, 10, 0, 10, 0, 20, 0, 40, 0, 90, NULL, NULL, 1, 1),
(398, '207', '15', '75', '4', '8', '4', 8, 0, 8, 0, 8, 0, 16, 0, 32, 0, 72, NULL, NULL, 1, 1),
(399, '207', '15', '76', '4', '8', '4', 10, 0, 6, 0, 6, 0, 7, 0, 15, 0, 44, NULL, NULL, 1, 1),
(400, '208', '15', '71', '4', '8', '4', 9, 0, 8, 0, 7, 0, 13, 0, 25, 0, 62, NULL, NULL, 1, 1),
(401, '208', '15', '72', '4', '8', '4', 10, 0, 9, 0, 8, 0, 15, 0, 31, 0, 73, NULL, NULL, 1, 1),
(402, '208', '15', '73', '4', '8', '4', 7, 0, 6, 0, 5, 0, 8, 0, 22, 0, 48, NULL, NULL, 1, 1),
(403, '208', '15', '74', '4', '8', '4', 10, 0, 10, 0, 10, 0, 20, 0, 40, 0, 90, NULL, NULL, 1, 1),
(404, '208', '15', '75', '4', '8', '4', 8, 0, 8, 0, 8, 0, 17, 0, 33, 0, 74, NULL, NULL, 1, 1),
(405, '208', '15', '76', '4', '8', '4', 10, 0, 10, 0, 10, 0, 2, 0, 10, 0, 42, NULL, NULL, 1, 1),
(406, '209', '15', '71', '4', '8', '4', 9, 0, NULL, 1, NULL, 1, 23, 0, 32, 0, 64, NULL, NULL, 1, 1),
(407, '209', '15', '72', '4', '8', '4', 10, 0, 9, 0, 8, 0, 14, 0, 28, 0, 69, NULL, NULL, 1, 1),
(408, '209', '15', '73', '4', '8', '4', 7, 0, 5, 0, 5, 0, 8, 0, 24, 0, 49, NULL, NULL, 1, 1),
(409, '209', '15', '74', '4', '8', '4', 10, 0, 10, 0, 10, 0, 20, 0, 40, 0, 90, NULL, NULL, 1, 1),
(410, '209', '15', '75', '4', '8', '4', 8, 0, 8, 0, 8, 0, 15, 0, 30, 0, 69, NULL, NULL, 1, 1),
(411, '209', '15', '76', '4', '8', '4', 4, 0, 4, 0, 4, 0, 8, 0, 16, 0, 36, NULL, NULL, 1, 1),
(412, '210', '15', '71', '4', '8', '4', 9, 0, 8, 0, 7, 0, 12, 0, 25, 0, 61, NULL, NULL, 1, 1),
(413, '210', '15', '72', '4', '8', '4', 10, 0, 9, 0, 8, 0, 14, 0, 30, 0, 71, NULL, NULL, 1, 1),
(414, '210', '15', '73', '4', '8', '4', 7, 0, 6, 0, 5, 0, 8, 0, 20, 0, 46, NULL, NULL, 1, 1),
(415, '210', '15', '74', '4', '8', '4', 10, 0, 10, 0, 10, 0, 20, 0, 40, 0, 90, NULL, NULL, 1, 1),
(416, '210', '15', '75', '4', '8', '4', 8, 0, 8, 0, 8, 0, 20, 0, 32, 0, 76, NULL, NULL, 1, 1),
(417, '210', '15', '76', '4', '8', '4', 5, 0, 5, 0, 10, 0, 7, 0, 10, 0, 37, NULL, NULL, 1, 1),
(418, '211', '15', '71', '4', '8', '4', 9, 0, 8, 0, 7, 0, 12, 0, 25, 0, 61, NULL, NULL, 1, 1),
(419, '211', '15', '72', '4', '8', '4', 10, 0, 9, 0, 8, 0, 14, 0, 30, 0, 71, NULL, NULL, 1, 1),
(420, '211', '15', '73', '4', '8', '4', 7, 0, 6, 0, 5, 0, 8, 0, 20, 0, 46, NULL, NULL, 1, 1),
(421, '211', '15', '74', '4', '8', '4', 10, 0, 10, 0, 10, 0, 20, 0, 40, 0, 90, NULL, NULL, 1, 1),
(422, '211', '15', '75', '4', '8', '4', 8, 0, 8, 0, 8, 0, 14, 0, 35, 0, 73, NULL, NULL, 1, 1),
(423, '211', '15', '76', '4', '8', '4', 4, 0, 5, 0, 6, 0, 8, 0, 17, 0, 40, NULL, NULL, 1, 1),
(424, '212', '15', '71', '4', '8', '4', 9, 0, 8, 0, 7, 0, 12, 0, 25, 0, 61, NULL, NULL, 1, 1),
(425, '212', '15', '72', '4', '8', '4', 10, 0, 9, 0, 8, 0, 14, 0, 30, 0, 71, NULL, NULL, 1, 1),
(426, '212', '15', '73', '4', '8', '4', 7, 0, 6, 0, 5, 0, 8, 0, 20, 0, 46, NULL, NULL, 1, 1),
(427, '212', '15', '74', '4', '8', '4', 10, 0, 10, 0, 10, 0, 30, 0, 40, 0, 100, NULL, NULL, 1, 1),
(428, '212', '15', '75', '4', '8', '4', 8, 0, 8, 0, 8, 0, 16, 0, 33, 0, 73, NULL, NULL, 1, 1),
(429, '212', '15', '76', '4', '8', '4', 5, 0, 5, 0, 8, 0, 18, 0, 35, 0, 71, NULL, NULL, 1, 1),
(430, '327', '17', '79', '4', '9', '4', 10, 0, 10, 0, 10, 0, 25, 0, 30, 0, 85, NULL, NULL, 1, 0),
(431, '327', '17', '80', '4', '9', '4', 5, 0, 5, 0, 7, 0, 15, 0, 31, 0, 63, NULL, NULL, 1, 0),
(432, '328', '17', '79', '4', '9', '4', 10, 0, 10, 0, 10, 0, 20, 0, 30, 0, 80, NULL, NULL, 1, 0),
(433, '328', '17', '80', '4', '9', '4', 10, 0, 10, 0, 10, 0, 15, 0, 30, 0, 75, NULL, NULL, 1, 0),
(434, '329', '17', '79', '4', '9', '4', 10, 0, 10, 0, 10, 0, 15, 0, 20, 0, 65, NULL, NULL, 1, 0),
(435, '329', '17', '80', '4', '9', '4', 10, 0, 8, 0, 8, 0, 20, 0, 20, 0, 66, NULL, NULL, 1, 0),
(436, '330', '17', '79', '4', '9', '4', 8, 0, 10, 0, 7, 0, 20, 0, 32, 0, 77, NULL, NULL, 1, 0),
(437, '330', '17', '80', '4', '9', '4', 7, 0, 10, 0, 6, 0, 22, 0, 40, 0, 85, NULL, NULL, 1, 0),
(438, '213', '15', '71', '4', '9', '4', 10, 0, 10, 0, NULL, 1, 20, 0, 30, 0, 70, NULL, NULL, 1, 0),
(439, '213', '15', '72', '4', '9', '4', 8, 0, 8, 0, 6, 0, 19, 0, 29, 0, 70, NULL, NULL, 1, 0),
(440, '213', '15', '73', '4', '9', '4', 7, 0, 8, 0, 9, 0, 10, 0, 20, 0, 54, NULL, NULL, 1, 0),
(441, '213', '15', '74', '4', '9', '4', 10, 0, 10, 0, 10, 0, 30, 0, 40, 0, 100, NULL, NULL, 1, 0),
(442, '213', '15', '75', '4', '9', '4', 7, 0, 8, 0, 9, 0, 22, 0, 32, 0, 78, NULL, NULL, 1, 0),
(443, '213', '15', '76', '4', '9', '4', 4, 0, 5, 0, 6, 0, 10, 0, 16, 0, 41, NULL, NULL, 1, 0),
(444, '214', '15', '71', '4', '9', '4', 10, 0, 10, 0, 10, 0, 20, 0, 20, 0, 70, NULL, NULL, 1, 0),
(445, '214', '15', '72', '4', '9', '4', 8, 0, 8, 0, 8, 0, 18, 0, 18, 0, 60, NULL, NULL, 1, 0),
(446, '214', '15', '73', '4', '9', '4', 7, 0, 6, 0, 5, 0, 15, 0, 20, 0, 53, NULL, NULL, 1, 0),
(447, '214', '15', '74', '4', '9', '4', 10, 0, 10, 0, 10, 0, 30, 0, 40, 0, 100, NULL, NULL, 1, 0),
(448, '214', '15', '75', '4', '9', '4', 8, 0, 8, 0, 8, 0, 24, 0, 32, 0, 80, NULL, NULL, 1, 0),
(449, '214', '15', '76', '4', '9', '4', 4, 0, 5, 0, 6, 0, 7, 0, 20, 0, 42, NULL, NULL, 1, 0),
(450, '215', '15', '71', '4', '9', '4', 8, 0, 8, 0, 6, 0, 22, 0, 20, 0, 64, NULL, NULL, 1, 0),
(451, '215', '15', '72', '4', '9', '4', 8, 0, 10, 0, 7, 0, 22, 0, 29, 0, 76, NULL, NULL, 1, 0),
(452, '215', '15', '73', '4', '9', '4', 7, 0, 5, 0, 7, 0, 18, 0, 20, 0, 57, NULL, NULL, 1, 0),
(453, '215', '15', '74', '4', '9', '4', 10, 0, 10, 0, 10, 0, 30, 0, 40, 0, 100, NULL, NULL, 1, 0),
(454, '215', '15', '75', '4', '9', '4', 8, 0, 8, 0, 8, 0, 22, 0, 32, 0, 78, NULL, NULL, 1, 0),
(455, '215', '15', '76', '4', '9', '4', 2, 0, 3, 0, 4, 0, 10, 0, 12, 0, 31, NULL, NULL, 1, 0),
(456, '216', '15', '71', '4', '9', '4', 8, 0, 8, 0, 8, 0, 10, 0, 29, 0, 63, NULL, NULL, 1, 0),
(457, '216', '15', '72', '4', '9', '4', 7, 0, 6, 0, 8, 0, 22, 0, 29, 0, 72, NULL, NULL, 1, 0),
(458, '216', '15', '73', '4', '9', '4', 8, 0, 5, 0, 7, 0, 18, 0, 20, 0, 58, NULL, NULL, 1, 0),
(459, '216', '15', '74', '4', '9', '4', 10, 0, 10, 0, 10, 0, 30, 0, 40, 0, 100, NULL, NULL, 1, 0),
(460, '216', '15', '75', '4', '9', '4', 10, 0, 8, 0, 7, 0, 19, 0, 32, 0, 76, NULL, NULL, 1, 0),
(461, '216', '15', '76', '4', '9', '4', 4, 0, 6, 0, 5, 0, 18, 0, 16, 0, 49, NULL, NULL, 1, 0),
(462, '217', '15', '71', '4', '9', '4', 8, 0, 8, 0, 7, 0, 18, 0, 31, 0, 72, NULL, NULL, 1, 0),
(463, '217', '15', '72', '4', '9', '4', 8, 0, 8, 0, 7, 0, 16, 0, 20, 0, 59, NULL, NULL, 1, 0),
(464, '217', '15', '73', '4', '9', '4', 7, 0, 5, 0, 6, 0, 22, 0, 29, 0, 69, NULL, NULL, 1, 0),
(465, '217', '15', '74', '4', '9', '4', 10, 0, 10, 0, 10, 0, 30, 0, 40, 0, 100, NULL, NULL, 1, 0),
(466, '217', '15', '75', '4', '9', '4', 7, 0, 10, 0, 8, 0, 20, 0, 31, 0, 76, NULL, NULL, 1, 0),
(467, '217', '15', '76', '4', '9', '4', 4, 0, 5, 0, 6, 0, 19, 0, 20, 0, 54, NULL, NULL, 1, 0);

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
(2, '2', '5', '2', '1', '2', 9, 0, NULL, 1, NULL, 1, NULL, 1, NULL, 1, 9, NULL, NULL, 0, 1, 1, 0),
(3, '203', '76', '55', '4', '8', 5, 0, 5, 0, 5, 0, 7, 0, 10, 0, 32, NULL, NULL, 0, 1, 1, 1),
(4, '204', '76', '52', '4', '8', 7, 0, 6, 0, 5, 0, 8, 0, 20, 0, 46, NULL, NULL, 0, 1, 1, 1),
(5, '205', '76', '52', '4', '8', 7, 0, 6, 0, 5, 0, 9, 0, 21, 0, 48, NULL, NULL, 0, 1, 1, 1),
(6, '206', '76', '78', '4', '8', 5, 0, 5, 0, 10, 0, 25, 0, 30, 0, 75, NULL, NULL, 0, 1, 1, 1),
(7, '207', '76', '51', '4', '9', 5, 0, 4, 0, 6, 0, 10, 0, 20, 0, 45, NULL, NULL, 0, 1, 1, 0),
(8, '208', '76', '51', '4', '9', 4, 0, 4, 0, 4, 0, 12, 0, 18, 0, 42, NULL, NULL, 0, 1, 1, 0);

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
(4, '11', '5', '3', '1', '2', NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, NULL, NULL, 0, 0),
(5, '203', '76', '17', '4', '9', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0);

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
  `trimesters_after_admission` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `uni_id`, `name`, `email`, `role_name`, `department_id`, `batch_id`, `student_type`, `credit_transfer_student_graduation_credit_hours`, `password`, `image_name`, `admission_trimester`, `nid`, `birth_certificate_no`, `phone`, `address`, `psc_result`, `jsc_result`, `ssc_result`, `hsc_result`, `trimesters_after_admission`, `created_at`, `updated_at`) VALUES
(5, '11111', 'jeny', 'jeny@gmail.com', 'Student', '1', '3', 0, NULL, '$2y$10$62t2TusRC9favsLShF3c/ur7f9IDnhSWuvAbQ0gh7ImQa9NFSZ1t.', NULL, 'Summer 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-10 07:17:25', NULL),
(10, '193120001', 'Ridowana Tabassum', 'ridowana@gmail.com', 'Student', '4', '11', 1, NULL, '$2y$10$xO.GbpZ8vzkdQrV8p9ATx.Obrn3cAgpk9KAm//UqRe/I62zGFru.e', NULL, 'Fall 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 02:49:07', NULL),
(11, '193120003', 'Sharif Md. Shahriar Tamjid', 'sharif@gmail.com', 'Student', '4', '11', 1, NULL, '$2y$10$QFHy2UUR2zfw75sljMiTO.IuayJwKL8ocr578gzKazQROG2C5xbve', NULL, 'Fall 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 02:52:02', NULL),
(12, '193120004', 'Shafika Rahman', 'shafika@gmail.com', 'Student', '4', '11', 1, NULL, '$2y$10$Z4yLJ3.dp3W1j.1MeXGHo.p5rc30zpO/oux.9ALCXFyV2ft0tYNKO', NULL, 'Fall 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 02:53:54', NULL),
(13, '193120005', 'Saiful Islam Pimon', 'saiful@gmail.com', 'Student', '4', '11', 1, NULL, '$2y$10$O6IIW3NKycnv.baC.2uDYOCtxK4T.sktXRkUT.mOtBlX1x9PtQtVu', NULL, 'Fall 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 02:56:06', NULL),
(14, '193120006', 'Tamanna Tabassum Oishi', 'tamanna@gmail.com', 'Student', '4', '11', 1, NULL, '$2y$10$fgQB.wzErs/NyXdlhIQDp.Lz3UgLLyosgHHVrQYsCN/ZsbmUg/j66', NULL, 'Fall 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 03:00:23', NULL),
(15, '193120008', 'Tanvir Hossain Rafi', 'tanvir@gmail.com', 'Student', '4', '11', 1, NULL, '$2y$10$lAac4QMdDaY4Ai3jKaHKhOx1AnC3tQ7X61lJcinCjIVeb9WmWUxDi', NULL, 'Fall 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 03:03:35', NULL),
(16, '193120011', 'Kazi Habiba', 'kazi@gmail.com', 'Student', '4', '11', 1, NULL, '$2y$10$ZGtV/mB9Zp/t83oc7H66DORtTeTl18uWd4PowiMMhE27JoGPGhjq2', NULL, 'Fall 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 03:05:03', NULL),
(17, '193120012', 'Sourav Ray', 'sourav@gmail.com', 'Student', '4', '11', 1, NULL, '$2y$10$zMqWpdX4TkVBf/e7M9nEleMisKUUKHkqoKxHFhOiglXTzyVEgoeZm', NULL, 'Fall 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 03:07:16', NULL),
(18, '193120013', 'Md. Morshed Ali Thakur', 'morshed@gmail.com', 'Student', '4', '11', 1, NULL, '$2y$10$UY4lDRJjSihB9hUk0gAGzeBX4P1TcaYH4CKS3.O.1uA5SpOGYy9KW', NULL, 'Fall 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 03:09:11', NULL),
(19, '193120014', 'Ajoy Karmakar', 'ajoy@gmail.com', 'Student', '4', '11', 1, NULL, '$2y$10$zz.j7J5sc4Q9/LvOyFkxH.SyYy2.44dow0mUEd0mcg480L2/KH4H2', NULL, 'Fall 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 03:11:41', NULL),
(20, '201120001', 'Antony Amit Biswas', 'antony@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$MQ6rGedBSsq31iWQq9JaE.S5z.7Oic4b1oB1wTRfAmJzmBIs4jm4.', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 04:13:46', NULL),
(21, '201120002', 'Md. Tasdikur Rahman', 'tasdikur@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$wd4CGlvsuFZ.yrQIAQfICuiTk6XhcDZIg0ZvGoVXpT9C.uZdewP7a', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 04:15:36', NULL),
(22, '201120003', 'Kowser Akond Showke', 'kowser@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$QqKJpUNU08g/s31HDMWvsOAY1HHQjfJFnc7tVZODXNDzFDNahmn7O', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 04:17:24', NULL),
(23, '201120004', 'Mehnaz Tasnim', 'mehnaz@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$a6TeCrWVC89.gt9t5tBL/uSik4KUsy9VLRUNKDb/p6y9vWM3OaBiO', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 04:19:16', NULL),
(24, '201120005', 'Eakfat Jahan', 'eakfat@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$Ll3DcJocg09P6mQFu6VCL..Tnth0lfw5fEL9URstUs.8jxHFA4FGe', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 04:21:08', NULL),
(25, '201120006', 'Arpon Adrian Gomes', 'arpon@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$3/u2RVxrFy.wjYYcajOlY.AK94DCS.EeGxEEO6fRMadK9p/RYrIVG', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 04:23:00', NULL),
(26, '201120007', 'Md. Abdul Alim', 'abdul@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$iBBho1qxSSh3Z3EsrkD4Du/D.2PcE6xoRI/J5Oq7/zQfb2a0f2E9a', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 04:24:09', NULL),
(27, '201120008', 'Prapty Das', 'prapty@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$GwBp4rnTJXzXbn/FPooW.uazJRGbzy3dquOAUr8OnrlwVMkL2Rznq', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 04:25:16', NULL),
(28, '201120009', 'Mohammad Mootasim Billah', 'mohammad@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$DRKr3LtrZd0RfYZulYrD.OXWOxuk9GVIyiwOk1ZXsNZ7d.UJ.5WFu', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 04:27:09', NULL),
(29, '201120010', 'Rup Chowdhury', 'rup@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$2QklR9PF/2JgHqyBNSPmXOk0tAhZ0X0zSIjXh2Krx1vBOABZRtOL6', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 04:30:15', NULL),
(30, '201120011', 'Abid Sarkar', 'abid@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$VJdHMXgS26bKSPl5XTmr4.fl6.qZOlO6oR6P6SY4TIQWVxgBjsica', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 04:32:05', NULL),
(31, '201120012', 'Md. Shahriar Alam', 'shahriar@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$x5N0UqliWCPtymE2SjLQ.OZug8gMgu1jrdIDa5haWndu5eKi8vyRq', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 04:33:17', NULL),
(32, '201120013', 'Ranak Debnath', 'ranak@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$APnpWTuJDSpejdL8DDus3.84/4Z3RkkIDg0Q.uOrIoWJm7qW8dpFG', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 04:34:22', NULL),
(33, '201120014', 'Md. Abu Sakib', 'abu@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$snNQ5Xt9IfWXx3sOAD3Acum24/hIv5n2tJC0hGLMJa1.TPZ/GYIJC', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 04:35:21', NULL),
(34, '201120015', 'Md Sinha', 'sinha@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$MaTWWplPbNyPkExrTLpFTeRZgy3zGt2eSIxNbCY9cUrgc2D6yR6oO', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 04:37:41', NULL),
(35, '201120016', 'Ariful Islam', 'ariful@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$iXWMXxMv2EQzPm5r7cnGquz8g12tPIc7ULoV9hDWe782kdkEJN.E6', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 04:39:03', NULL),
(36, '201120017', 'S. M. Mehedi Hasan', 'mehedi@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$4QWWWkWazgzb1PrVrDAp.ul9/sL83SSzxjjdxB866ab202gzMHu3q', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 04:40:19', NULL),
(37, '201120018', 'Sheikh Asif Rahman', 'sheikh@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$gpo0EAVZkDJn74qyvvWo9uk3C25WxF2eJWSBnjIk/vy6J9yCJ4Xnm', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 05:07:56', NULL),
(38, '201120019', 'Faiza Islam', 'faiza@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$zcp.Gsu1aq2Mklg3khvSRuwuHgDKgm.y3DagYh7zOV0tRDQt6XRPC', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 05:09:33', NULL),
(39, '201120020', 'Md. Yasin Arafat Eather', 'yasin@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$.jFEla6JRY4/XXn0aXEXWu6yet3oXv..rnf0yi24yHtEH8jCtzV0q', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 05:12:03', NULL),
(40, '201120021', 'Fatema Tuj Zohra Promi', 'fatema@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$PhYPSlZViv5H737bI9wkLupDJypz9TshUh5ZsPqHQe6.5kbqLriX2', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 05:14:12', NULL),
(41, '201120022', 'Tamim Ahmed', 'tamim@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$QlGkA6NuppY2WElQ/2lTwervgeJVk2U3aoA.9iEyYkFEB1rShqxFG', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 05:15:25', NULL),
(42, '201120023', 'Md. Mirajul Islam Tashfi', 'mirajul@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$O7lhlIcOtOWYIl7wW7vE3udeqHfAiaKiHlfBdT.F6ieUDR2UUiIJG', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 05:16:47', NULL),
(43, '201120024', 'Tamanna Laskar', 'tamanna24@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$pbMEw5a4qOl987jtmOd7t.QiY46N04nN5OUXXjJCuVtVaKDiObDuK', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 05:19:35', NULL),
(44, '201120025', 'Rhitu Das', 'rhitu@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$HsnwcAck4g/nqpBUwarQIuyP/3vRcslju4Yvy685xV0KvWQ.Xnpca', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 05:20:39', NULL),
(45, '201120026', 'MD. Nazmul Islam', 'nazmul@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$Agq0jfcH56NAydbxT2EiyeI6kxsECn/6fiM462UDKT6GGbzzYtN4u', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 05:21:52', NULL),
(46, '201120027', 'Talha Bin  Abdullah', 'talha@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$LoSeX7bfU8sruIE6RAyVDOqRUr2dMAL.948mUAM1xw2X9LErmno1m', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 05:23:41', NULL),
(47, '201120028', 'Joy Das', 'joy@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$CMeSd0VCDbEaGWrWsBt83eTRYD/IwMO6z8HDzB7UwAoJsRgYTSQTS', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 05:24:31', NULL),
(48, '201120029', 'Sumaiya Binte Shahid', 'sumaiya@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$aZN1ukIPkib/lvc5JBWcSebiwAcj9gA.F1vF7xEX9J8/ogR0A3Po6', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 05:25:44', NULL),
(49, '201120030', 'Fazle Elahi Fahim', 'fazle@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$t3CAAxf3raNIi63ErLH6uuO.X6idLT6gzM2B1uxWUXnGjA7AV2I/q', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 05:27:52', NULL),
(50, '201120031', 'Aranya Bhowmik Dhrubo', 'aranya@gmail.com', 'Student', '4', '12', 1, NULL, '$2y$10$2AEJvq/wIGnyIqr3Y.HSw.Wt8B0mxfI/H.D5jU5Gkdtumt0/vafTq', NULL, 'Spring 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-11 05:32:03', NULL),
(71, '211120001', 'Richel Green', 'richel@gmail.com', 'Student', '4', '15', 1, NULL, '$2y$10$0RIRXS/MozTyxmv6ycSpVeh9hmA5wy.pp/VeSqmR/flzciJuMuhWS', 'student-71-1605424035.jpg', 'Spring 2021', '3465151', '465454', '9997785', 'Central perk', '4.50', '4.65', '4.75', '4.30', 1, '2020-11-13 15:32:04', '2020-11-15 07:08:54'),
(72, '211120002', 'Monica Park', 'monica@gmail.com', 'Student', '4', '15', 1, NULL, '$2y$10$EuIsH1QDxs16QvtxMAMdceDmKCTH38HsECS/HBhOZsrrp7TkxsRR6', NULL, 'Spring 2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-13 15:33:39', NULL),
(73, '211120003', 'Phibe Jones', 'phibe@gmail.com', 'Student', '4', '15', 2, 85.8, '$2y$10$6Sq.79ZBP21PFXIzgTpL6Oc5tM61Mu.nh6vHNAJk9eqDJsDsR3wlu', NULL, 'Spring 2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-13 15:35:17', NULL),
(74, '211120004', 'Ross Parker', 'ross@gmail.com', 'Student', '4', '15', 1, NULL, '$2y$10$PNp8vhG442j1jK7v2Zf7U.s.TNaWAyISe15kGm8X7aIqs/uUJDwny', 'student-74-1609435564.png', 'Spring 2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-13 15:36:54', '2020-12-31 17:26:04'),
(75, '211120005', 'Chendler Jon', 'chendler@gmail.com', 'Student', '4', '15', 1, NULL, '$2y$10$14qvqajeOAnAiQNKwMNxyeak0VcOkpS5BM4FzmrsSwLdFUEo1ASpS', NULL, 'Spring 2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-13 15:38:25', NULL),
(76, '211120006', 'Joey York', 'joey@gmail.com', 'Student', '4', '15', 1, NULL, '$2y$10$QiVRYaUHOf0lmQbUbsjRuO4SMosdvDhRw54UunNog50W4AU2s/0ci', NULL, 'Spring 2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-13 15:39:37', NULL),
(79, '211123301', 'Gina Tribbiani', 'gina@gmail.com', 'Student', '4', '17', 1, NULL, '$2y$10$vgO2d.TuXjgKjl7QExVyqu7h/A.dNy94gWVuHe3lALlfjSE1tcRla', NULL, 'Fall 2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-15 07:26:23', NULL),
(80, '211123302', 'Zach Miller', 'zach@gmail.com', 'Student', '4', '17', 1, NULL, '$2y$10$99LGK5pBd8ZTeApp5wiqR.EvoEHkhSxu/1Iti9cDlKonMteE9cUnu', NULL, 'Fall 2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-15 07:28:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_mark_update_information_for_faculties`
--

CREATE TABLE `student_mark_update_information_for_faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_course_list_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_mark_update_information_for_faculties`
--

INSERT INTO `student_mark_update_information_for_faculties` (`id`, `faculty_id`, `student_id`, `batch_course_list_id`, `course_type`, `created_at`, `updated_at`) VALUES
(1, '60', '71', '216', 'Regular course', '2021-01-03 18:39:21', NULL),
(2, '60', '72', '217', 'Regular course', '2021-01-03 18:39:58', NULL);

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
(3, 'Fall 2019', 0, NULL, NULL),
(6, 'Fall 2020', 0, NULL, NULL),
(7, 'Spring 2021', 0, NULL, NULL),
(8, 'Summer 2021', 0, NULL, NULL),
(9, 'Fall 2021', 1, NULL, NULL),
(10, 'Spring 2022', 0, NULL, NULL);

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
(1, 'Fall', 2021, 0),
(2, 'Spring', 2022, 1),
(3, 'Summer', 2021, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uni_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, '111', 'Alice', 'alice@gmail.com', 'Registrar', NULL, '$2y$10$5VDylqMojhMfbIkNxmd/C.CG4vi1IbL.0T0wbjO8oTyE/d2.g9mzi', 'registrar-1-1605257878.jpg', NULL, NULL, '2020-11-13 08:59:32'),
(2, '10001', 'ema', 'ema@gmail.com', 'Faculty', NULL, '$2y$10$Ky9/L6Am4QAbeVZaR5TifeJcCl3m3AHP466Jbxqq2iI6iMkiHyrva', 'faculty-2-1600515665.jpg', NULL, '2020-07-15 09:41:15', '2020-09-19 11:41:05'),
(3, '100011', 'bob', 'bob@gmail.com', 'Faculty', NULL, '$2y$10$92UQGRqn1FH/wmo09p/A.uzUkzSlDV0w4aHocOBJnOY5qcGDElo4e', NULL, NULL, '2020-07-15 09:43:31', NULL),
(4, '1111', 'mike', 'mike@gmail.com', 'Course Coordinator', NULL, '$2y$10$C3pnnPUj2vpBxgzTqE4D4uyvddp7Ja6tqgotMLDwDPCRtd7BA6GrW', NULL, NULL, '2020-07-15 09:46:41', NULL),
(5, '11111', 'jeny', 'jeny@gmail.com', 'Student', NULL, '$2y$10$Pd1oiYhuJtySnpl0vrSi/eCrIZjQu3oD5C2Dv/jBvjhoLiemuL5Hi', NULL, NULL, '2020-09-10 07:17:24', NULL),
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
(60, '1010', 'Baizeed Ahmed Bhuiyan', 'baizeed@ndub.edu.bd', 'Faculty', NULL, '$2y$10$Q5biKUhA/HIsWwnXc.QD0uQuMsehyKUGhB2Bex1bbNF2B2EIviMLq', NULL, NULL, '2020-11-11 06:02:52', NULL),
(61, '001', 'Tazia Hossain', 'tazia@ndub.edu.bd', 'Faculty', NULL, '$2y$10$b9ibBRvO6vc2t36q715IVe7DckrK58NlbJN6N4/fzp6qyGTAMfg9C', NULL, NULL, '2020-11-13 09:03:24', NULL),
(70, '10010', 'Course Cse', 'coursecse@gmail.com', 'Course Coordinator', NULL, '$2y$10$hCuR6tEI.9siLLybTdbt6OFkTGFLtVzPiabwWHEK5rIkZUX83D0Mu', 'course_coordinator-70-1608472830.jpg', NULL, '2020-11-13 10:35:30', '2020-12-20 14:00:30'),
(71, '211120001', 'Richel Green', 'richel@gmail.com', 'Student', NULL, '$2y$10$0U/6rVqFv4l9uZAaAEDGO.nxClzg3euqujEVXi2pc1kphSByuLZwK', 'student-71-1605424035.jpg', NULL, '2020-11-13 15:32:04', '2020-11-15 07:08:54'),
(72, '211120002', 'Monica Park', 'monica@gmail.com', 'Student', NULL, '$2y$10$FmLgOZPTx53sHKXGPJuy/.l9X0MU8pDQep3s0weBz8.JPLQoshc2S', NULL, NULL, '2020-11-13 15:33:39', NULL),
(73, '211120003', 'Phibe Jones', 'phibe@gmail.com', 'Student', NULL, '$2y$10$D6GWEq3yQlbn0Uu7vuenz.LNyhf2TmlOHbpncLGEXvTHPpZZyq9VK', NULL, NULL, '2020-11-13 15:35:17', NULL),
(74, '211120004', 'Ross Parker', 'ross@gmail.com', 'Student', NULL, '$2y$10$dy0SU92AuHF/VJ0T5NOVHe8hgCXt/g4LG3Cgiu9SaWfPaRNvLeR9G', 'student-74-1609435564.png', NULL, '2020-11-13 15:36:54', '2020-12-31 17:26:04'),
(75, '211120005', 'Chendler Jon', 'chendler@gmail.com', 'Student', NULL, '$2y$10$0M8DJCzuq2zHFZLYBcwCDuhF6l9kpACs3cB8ZuwhJDKy4LPnA49tS', NULL, NULL, '2020-11-13 15:38:25', NULL),
(76, '211120006', 'Joey York', 'joey@gmail.com', 'Student', NULL, '$2y$10$YbppMEwMgQmeyHjCfvRWL.03WwmywiunVHMZ/dwVoEU1mPfxxEtEG', NULL, NULL, '2020-11-13 15:39:37', NULL),
(78, '00001111', 'Fr. Tom McDermott', 'mcdermottcsc@gmail.com', 'Faculty', NULL, '$2y$10$qM4Z.OpVfLJQ5KMg21ENvOjJsQ4Lw/.wpA65cmMaLKqW3qmR2w6vG', NULL, NULL, '2020-11-14 06:55:19', NULL),
(79, '211123301', 'Gina Tribbiani', 'gina@gmail.com', 'Student', NULL, '$2y$10$AAk8XhokxOBjogTH1ej9hu6.YXVQht4F7laGzszUpFBHFG6DL3NZy', NULL, NULL, '2020-11-15 07:26:23', NULL),
(80, '211123302', 'Zach Miller', 'zach@gmail.com', 'Student', NULL, '$2y$10$3PfFqPuhtzIFUbMXeuEQP.kgeCsiBqTQPQscIWWNXfF5./qEXNPc6', NULL, NULL, '2020-11-15 07:28:25', NULL);

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
  ADD UNIQUE KEY `course_coordinators_email_unique` (`email`),
  ADD UNIQUE KEY `course_coordinators_uni_id_unique` (`uni_id`);

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
  ADD UNIQUE KEY `exam_controllers_email_unique` (`email`),
  ADD UNIQUE KEY `exam_controllers_uni_id_unique` (`uni_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculties_id_unique` (`id`),
  ADD UNIQUE KEY `faculties_email_unique` (`email`),
  ADD UNIQUE KEY `faculties_uni_id_unique` (`uni_id`);

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
  ADD UNIQUE KEY `registrars_email_unique` (`email`),
  ADD UNIQUE KEY `registrars_uni_id_unique` (`uni_id`);

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
-- Indexes for table `student_mark_update_information_for_faculties`
--
ALTER TABLE `student_mark_update_information_for_faculties`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_uni_id_unique` (`uni_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_supplementary_exams`
--
ALTER TABLE `assign_supplementary_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `batch_course_lists`
--
ALTER TABLE `batch_course_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `course_coordinators`
--
ALTER TABLE `course_coordinators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `course_versions`
--
ALTER TABLE `course_versions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `exam_controllers`
--
ALTER TABLE `exam_controllers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level_terms`
--
ALTER TABLE `level_terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `maximum_credit_hours_assign_to_faculties`
--
ALTER TABLE `maximum_credit_hours_assign_to_faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `permission_for_allow_assign_more_regular_course_to_faculties`
--
ALTER TABLE `permission_for_allow_assign_more_regular_course_to_faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `registrars`
--
ALTER TABLE `registrars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `regular_course_assign_to_faculties`
--
ALTER TABLE `regular_course_assign_to_faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `regular_course_assign_to_students`
--
ALTER TABLE `regular_course_assign_to_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=468;

--
-- AUTO_INCREMENT for table `repeat_retake_course_assign_to_student_without_batches`
--
ALTER TABLE `repeat_retake_course_assign_to_student_without_batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `repeat_retake_course_assign_to_student_with_batches`
--
ALTER TABLE `repeat_retake_course_assign_to_student_with_batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `student_mark_update_information_for_faculties`
--
ALTER TABLE `student_mark_update_information_for_faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temporary_regular_course_assign_to_students`
--
ALTER TABLE `temporary_regular_course_assign_to_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trimesters`
--
ALTER TABLE `trimesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trimester_generators`
--
ALTER TABLE `trimester_generators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
