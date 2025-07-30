-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2025 at 03:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `hours` decimal(60,0) DEFAULT NULL,
  `price` decimal(60,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `hours`, `price`) VALUES
(1, 'sdfadg', 'afdsrawe', NULL, NULL),
(2, ',vcxmcxmmkm', 'safdafaef', 120, 1200),
(3, 'oiueworiuiuiu', 'afdsjsjiiojknmcnxzhvuhjknchuhuwe', 120, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `grade` float DEFAULT NULL,
  `enrollment_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `student_id`, `course_id`, `grade`, `enrollment_date`) VALUES
(1, 17, 0, NULL, '2025-07-23 16:27:27'),
(2, 18, 0, NULL, '2025-07-23 16:52:56'),
(3, 19, 3, NULL, '2025-07-23 17:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL DEFAULT '123456'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `phone`, `date_of_birth`, `role`, `password`) VALUES
(17, 'Mohamed Ayman Saad', 'mohamed336699as55@gmail.com', '01020735937', '2009-09-09', 'user', '123456'),
(18, 'محمد ايمن سعد عليوة', 'mohamed336699as5577@gmail.com', '0503014583', '2007-07-07', 'user', '123456'),
(19, 'afff', 'mohamed336699as55dwda@gmail.com', '0503014583', '2000-09-09', 'user', '123456'),
(20, 'Admin User', 'admin@example.com', NULL, NULL, 'admin', '123456'),
(21, 'User One', 'user@example.com', NULL, NULL, 'user', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`) VALUES
(1, 'mohaed', '01020735937', 'mohamed336699as55@gmail.com', '$2y$10$BDAOrJO9V7iTidUL7yfdx.TVmKuXNzhd3qjqqN4basRXO6IJXgnym');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_course_students_count`
-- (See below for the actual view)
--
CREATE TABLE `view_course_students_count` (
`course_id` int(11)
,`course_title` varchar(100)
,`student_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_min_enrolled_student`
-- (See below for the actual view)
--
CREATE TABLE `view_min_enrolled_student` (
`student_id` int(11)
,`name` varchar(100)
,`course_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_students_courses_count`
-- (See below for the actual view)
--
CREATE TABLE `view_students_courses_count` (
`student_id` int(11)
,`name` varchar(100)
,`course_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_students_not_enrolled`
-- (See below for the actual view)
--
CREATE TABLE `view_students_not_enrolled` (
`student_id` int(11)
,`name` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `view_course_students_count`
--
DROP TABLE IF EXISTS `view_course_students_count`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_course_students_count`  AS SELECT `c`.`id` AS `course_id`, `c`.`title` AS `course_title`, count(`e`.`student_id`) AS `student_count` FROM (`courses` `c` left join `enrollments` `e` on(`c`.`id` = `e`.`course_id`)) GROUP BY `c`.`id`, `c`.`title` ;

-- --------------------------------------------------------

--
-- Structure for view `view_min_enrolled_student`
--
DROP TABLE IF EXISTS `view_min_enrolled_student`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_min_enrolled_student`  AS SELECT `s`.`id` AS `student_id`, `s`.`name` AS `name`, count(`e`.`course_id`) AS `course_count` FROM (`students` `s` left join `enrollments` `e` on(`s`.`id` = `e`.`student_id`)) GROUP BY `s`.`id` ORDER BY count(`e`.`course_id`) ASC LIMIT 0, 1 ;

-- --------------------------------------------------------

--
-- Structure for view `view_students_courses_count`
--
DROP TABLE IF EXISTS `view_students_courses_count`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_students_courses_count`  AS SELECT `s`.`id` AS `student_id`, `s`.`name` AS `name`, count(`e`.`course_id`) AS `course_count` FROM (`students` `s` join `enrollments` `e` on(`s`.`id` = `e`.`student_id`)) GROUP BY `s`.`id`, `s`.`name` ;

-- --------------------------------------------------------

--
-- Structure for view `view_students_not_enrolled`
--
DROP TABLE IF EXISTS `view_students_not_enrolled`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_students_not_enrolled`  AS SELECT `s`.`id` AS `student_id`, `s`.`name` AS `name` FROM (`students` `s` left join `enrollments` `e` on(`s`.`id` = `e`.`student_id`)) WHERE `e`.`id` is null ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
