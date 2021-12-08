-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 09:21 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api`
--

-- --------------------------------------------------------

--
-- Table structure for table `se_baccarat`
--

CREATE TABLE `se_baccarat` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `dealer_name` varchar(255) NOT NULL,
  `records` varchar(255) NOT NULL,
  `cards` varchar(255) NOT NULL,
  `remaining` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `se_baccarat`
--

INSERT INTO `se_baccarat` (`room_id`, `room_name`, `dealer_name`, `records`, `cards`, `remaining`, `status`, `timestamp`) VALUES
(0, '', '', '', '', 0, '', 1599566138),
(1, '1', 'Rihanna', 'BBBPBBPBBPBBBPBPPTBBPPBPBPTBPBBPBBBPPPBBPPBBPBBTBPBPBTPBP', 'x|x|x|x|x|x', 0, 'unknown', 1601493694),
(2, '2', 'Afrodita', 'BPBTBTTPPPPBPPBPPPPBPPBBPPBBPTTPBB', 'x|x|x|x|x|x', 0, 'unknown', 1601493694),
(3, '3', 'Daya', 'TBPPBPPPBPPBPPBBBPBPBBPTBPTPPPBBBBPBBPBBBBBPBPP', 'x|x|x|x|x|x', 0, 'unknown', 1601493694),
(4, '4', 'Anfisa', 'TPBPBPBTPBTPBBBPBBPBPBPBPBTBPPPBPPBPPBBPPT', 'x|x|x|x|x|x', 0, 'unknown', 1601493694),
(5, '5', 'Aura', 'BBPPBPBPTPBBPBTPPBBBPPPPBTBBBPPBBPPPBB', 'x|x|x|x|x|x', 0, 'unknown', 1601493694),
(6, '6', 'Naiya', 'BBTBPBPPPBBBPPTBBBTPPTPPPTB', 'x|x|x|x|x|x', 0, 'unknown', 1601493694),
(7, '7', 'Madona', 'TTBPBBBBPPPBBPBTBPPPPPBBPPPPTPPBPBPBPBPTTBPTBPPBPPB', 'x|x|x|x|x|x', 0, 'unknown', 1601493694),
(8, '8', 'Aitana', 'PBPBBPBBBPPPPBPTBPBBPPPPPPPBBBBBPBBBPBBPBPPBPBPPTBBPPPPBBP', 'x|x|x|x|x|x', 0, 'unknown', 1601493694),
(9, '9', 'Sany', 'PBPBTBPBBBBBBPPBPPPBPBBBBPPPBPPBBBBBBBBP', 'x|x|x|x|x|x', 0, 'unknown', 1601493694),
(10, '10', 'Shamadi', 'BBTBPBPBBBPBTPPPBBBPBBTPBBPPBBBBPPBBBBBPPPBBPBTPBB', 'x|x|x|x|x|x', 0, 'unknown', 1601493694),
(11, '11', 'Nena', '', 'x|x|x|x|x|x', 0, 'unknown', 1597850996),
(18, '18', 'Melina', 'BPPTBBPBBTTBB', 'x|x|x|x|x|x', 0, 'unknown', 1597850996),
(21, '21', 'Celica', 'BPPBPPPPB', 'x|x|x|x|x|x', 0, 'unknown', 1601493694);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `se_baccarat`
--
ALTER TABLE `se_baccarat`
  ADD PRIMARY KEY (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
