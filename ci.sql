-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 01:51 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `student_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `hobby` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`student_id`, `name`, `email`, `phone_number`, `image`, `gender`, `hobby`, `date_of_birth`, `created_on`, `updated_on`) VALUES
(1, 'student', 'student@gmail.com', '1234567891', 'student.png', 'male', 'singing,painting', '1992-03-05', '2021-11-27 13:40:19', '2021-11-27 18:09:10'),
(2, 'student2', 'student2@gmail.com', '1234567892', 'student.png', 'female', 'singing,painting', '1993-03-10', '2021-11-27 13:45:58', '2021-11-27 18:09:10'),
(3, 'student3', 'student3@gmail.com', '1234567893', 'student.png', 'male', 'singing,painting,cooking', '1992-03-17', '2021-11-27 13:46:12', '2021-11-27 18:09:10'),
(4, 'student4', 'student4@gmail.com', '1234567894', 'student.png', 'male', 'dancing,painting', '1992-03-11', '2021-11-27 13:46:29', '2021-11-27 18:09:10'),
(5, 'student5', 'student5@gmail.com', '1234567895', 'student.png', 'male', 'singing,painting', '1992-03-05', '2021-11-27 13:40:19', '2021-11-27 18:09:10'),
(6, 'student6', 'student6@gmail.com', '1234567896', 'student.png', 'male', 'singing,painting', '1993-03-10', '2021-11-27 13:40:19', '2021-11-27 18:09:10'),
(7, 'student7', 'student7@gmail.com', '1234567897', 'student.png', 'male', 'singing,painting', '2002-03-13', '2021-11-27 13:40:19', '2021-11-27 18:09:10'),
(8, 'student8', 'student8@gmail.com', '1234567898', 'student.png', 'female', 'singing,painting', '1992-03-18', '2021-11-27 13:40:19', '2021-11-27 18:09:10'),
(9, 'student9', 'student9@gmail.com', '1234567899', 'student.png', 'male', 'painting', '1992-03-17', '2021-11-27 13:40:19', '2021-11-27 18:09:10'),
(10, 'student10', 'student10@gmail.com', '1234567890', 'student.png', 'male', 'singing,painting', '1992-03-21', '2021-11-27 13:40:19', '2021-11-27 18:09:10'),
(11, 'student11', 'student11@gmail.com', '1234567811', 'student.png', 'male', 'singing,painting', '1992-03-17', '2021-11-27 13:40:19', '2021-11-27 18:09:10'),
(12, 'student12', 'student12@gmail.com', '1234567812', 'student.png', 'female', 'singingng', '1992-03-21', '2021-11-27 13:40:19', '2021-11-27 18:09:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
