-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2020 at 02:47 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(100) NOT NULL,
  `passwords` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `passwords`, `email`) VALUES
('Shubha Rao', 'abcd', 'shubha.ise@bmsce.ac.in'),
('Nalini', 'abcde', 'nalini@bmsce.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `filename` varchar(500) NOT NULL,
  `file` varchar(300) DEFAULT NULL,
  `filesize` int(11) DEFAULT NULL,
  `descrip` varchar(500) DEFAULT NULL,
  `drivelink` varchar(500) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `publish` varchar(50) DEFAULT NULL,
  `confer` varchar(500) DEFAULT NULL,
  `uploader` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `category`, `filename`, `file`, `filesize`, `descrip`, `drivelink`, `link`, `publish`, `confer`, `uploader`) VALUES
(1, 'projects', 'vsvsvs', '', 0, '', '', '', NULL, NULL, 'Nalini'),
(2, 'projects', 'vssvdsvsv', '', 0, '', '', '', NULL, NULL, 'Nalini'),
(3, 'projects', 'ksdnkjs', '', 0, '', '', '', NULL, NULL, 'Shubha Rao'),
(4, 'webinars', 'skdnjdsv', '', 0, '', '', '', NULL, NULL, 'Shubha Rao'),
(5, 'projects', 'sdvknskj', '', 0, '', '', '', NULL, NULL, 'Nalini'),
(6, 'projects', 'skjskjsvdvkjnsk', '', 0, '', '', '', NULL, NULL, 'Nalini'),
(7, 'research', 'kjcndskj', '', 0, '', '', NULL, 'Journal', '', 'Shubha Rao'),
(8, 'workshops', 'sa', '', 0, '', '', NULL, NULL, NULL, 'Shubha Rao'),
(9, 'workshops', 'bdfb', '', 0, '', '', NULL, NULL, NULL, 'Shubha Rao'),
(10, 'workshops', 'vdssv', '', 0, '', '', NULL, NULL, NULL, 'Shubha Rao'),
(11, 'workshops', 'sdvsvsdvds', '', 0, '', '', NULL, NULL, NULL, 'Shubha Rao'),
(12, 'workshops', 'snkjs', '', 0, '', '', NULL, NULL, NULL, 'Nalini');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
