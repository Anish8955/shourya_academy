-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 09:58 AM
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
-- Database: `shourya_academy`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_certificate`
--

CREATE TABLE `add_certificate` (
  `id` int(11) NOT NULL,
  `sno` int(11) NOT NULL,
  `batch_no` varchar(255) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `parents_name` varchar(200) NOT NULL,
  `resident_of` varchar(100) NOT NULL,
  `date_of_issue` date NOT NULL,
  `designation` varchar(100) NOT NULL,
  `place_of_issue` varchar(100) NOT NULL,
  `training_from` date NOT NULL,
  `training_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_certificate`
--

INSERT INTO `add_certificate` (`id`, `sno`, `batch_no`, `roll_no`, `full_name`, `parents_name`, `resident_of`, `date_of_issue`, `designation`, `place_of_issue`, `training_from`, `training_to`) VALUES
(9, 1, 'B11', 2001, 'Anish Khan', 'Liyakat Ali', 'Kayamsar', '2022-05-04', 'Web Developer', 'jhunjhunu', '2023-11-01', '2024-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(254) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('anishkhanpro2@gmail.com', 'anish');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_certificate`
--
ALTER TABLE `add_certificate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_certificate`
--
ALTER TABLE `add_certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
