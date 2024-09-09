-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 09:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `teamid` int(5) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`teamid`, `name`) VALUES
(1, 'Ahmad'),
(5, 'talal'),
(5, 'mohammed'),
(5, 'hamad'),
(6, 'Assem'),
(11, 'ahmed'),
(11, 'yazan'),
(17, 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(5) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Skill` int(5) NOT NULL,
  `number` int(5) NOT NULL,
  `day` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `Name`, `Skill`, `number`, `day`, `email`) VALUES
(5, 'ENEE', 2, 7, 'Saturday', 'talabassel2002@gmail.com'),
(6, 'ENCS', 3, 9, 'Saturday', 'talabassel2002@gmail.com'),
(7, 'ENME', 3, 6, 'Tuesday', 'talabassel2002@gmail.com'),
(8, 'ENAR', 4, 7, 'Thursday', 'talabassel2002@gmail.com'),
(11, 'taka', 4, 0, 'Tuesday', 'talabassel2002@gmail.com'),
(12, 'CSS', 8, 0, 'Friday', 'talabassel2002@gmail.com'),
(13, 'tajhg', 10, 0, 'nhgf', 'talabassel2002@gmail.com'),
(14, 'tajhg', 10, 0, 'nhgf', 'talabassel2002@gmail.com'),
(15, 'CSS', 8, 0, 'Friday', 'talabassel2002@gmail.com'),
(16, 'COMP', 0, 0, 'Tuesday', 'talabassel2002@gmail.com'),
(17, 'takaa', 4, 0, 'Thursday', 'talabassel2002@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`) VALUES
('assem', 'assim@hotmail.com', '12345678'),
('jhgs', 'sdf@vnmxc.com', 'po9i87654'),
('jhgsdfg', 'sdf@vnxc.com', '12345678'),
('jhgfdg', 'sdjhgff@vnxc.com', '12345678'),
('tala', 'talabassel2002@gmail.com', '12345678'),
('talaa', 'talabassel@hotmail.com', 'rfewgafge');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD KEY `test` (`teamid`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `test` FOREIGN KEY (`teamid`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
