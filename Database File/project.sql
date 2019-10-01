-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2019 at 05:58 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `register1`
--

CREATE TABLE `register1` (
  `IGN` text NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `pw` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register1`
--

INSERT INTO `register1` (`IGN`, `fname`, `lname`, `email`, `pw`) VALUES
('Amro', 'Amr', 'Hamed', 'amro@gmail.com', '123'),
('BiSso', 'Ahmed', 'Samir', 'bisso@yahoo.com', '1234'),
('Chetos', 'Mostafa', 'Amr', 'chetos@gmail.com', 'Chetos123'),
('DoDo', 'Hoda', 'Ramzy', 'Dodo@gmail.com', '123'),
('Hououin Kyouma', 'Ahmed', 'Abduallah', '3pkar@gmail.com', '123321'),
('iLuffy', 'Rami', 'Notramy', 'luffy@gmail.com', '123'),
('Madheart', 'Kirolos', 'Mena', 'kiro@gmail.com', '123'),
('Mano4', 'Menna', 'Amr', 'mango@gmail.com', '1222'),
('Omaga', 'Mohamed', 'Amr', 'omaga@gmail.com', '44444'),
('SHkreemSH', 'Kareem', 'Gamal', 'keemo@gmail.com', '12333');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register1`
--
ALTER TABLE `register1`
  ADD PRIMARY KEY (`IGN`(12)),
  ADD UNIQUE KEY `email` (`email`(50));
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
