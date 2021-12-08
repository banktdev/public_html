-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2020 at 04:17 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apidata`
--

-- --------------------------------------------------------

--
-- Table structure for table `sagame`
--

CREATE TABLE `sagame` (
  `id` int(11) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `dealer` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `remain` varchar(255) NOT NULL,
  `player1` varchar(2550) NOT NULL,
  `player2` varchar(2550) NOT NULL,
  `player3` varchar(2550) NOT NULL,
  `banker1` varchar(1000) NOT NULL,
  `banker2` varchar(2550) NOT NULL,
  `banker3` varchar(2550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sagame`
--

INSERT INTO `sagame` (`id`, `table_name`, `state`, `dealer`, `img`, `remain`, `player1`, `player2`, `player3`, `banker1`, `banker2`, `banker3`) VALUES
(1, 'C01', '', 'SOPHEAK', 'https://www.xiyaomusic.com/dealer/new/dea963.jpg', '0', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png'),
(2, 'C02', 'BBPBPBPBPP', 'THIDA', 'https://www.xiyaomusic.com/dealer/new/dea1081.jpg', '0', 'https://lnw69.com/resource/images/deck/42.png', 'https://lnw69.com/resource/images/deck/47.png', 'https://lnw69.com/resource/images/deck/20.png', 'https://lnw69.com/resource/images/deck/4.png', 'https://lnw69.com/resource/images/deck/39.png', 'https://lnw69.com/resource/images/deck/36.png'),
(3, 'C03', 'PBBPPBBPPBTBBB', 'THYDA', 'https://www.xiyaomusic.com/dealer/new/dea1102.jpg', '7', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png'),
(4, 'C04', 'BBBBBBBBPPPBBBBBBPPBPBPPPPTBPPPBPTPPPPBBBPPBPPBBB', 'SINATH', 'https://www.xiyaomusic.com/dealer/new/dea1026.jpg', '0', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png'),
(5, 'C05', 'BBBPPBBPPPPBBPBTPBPPPPBPPBBBTBPTBBPBPPBBBTPPPPBBBBBPBTPBPPP', 'NAMM', 'https://www.xiyaomusic.com/dealer/new/dea1095.jpg', '7', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png'),
(6, 'C06', 'BPBBPBPP', 'SREYVA', 'https://www.xiyaomusic.com/dealer/new/dea965.jpg', '0', 'https://lnw69.com/resource/images/deck/34.png', 'https://lnw69.com/resource/images/deck/16.png', 'https://lnw69.com/resource/images/deck/23.png', 'https://lnw69.com/resource/images/deck/14.png', 'https://lnw69.com/resource/images/deck/23.png', 'https://lnw69.com/resource/images/deck/23.png'),
(7, 'E01', 'PPBPTPBPPPPBPPPTBTPBPPBBTPTBBBBBPPBTBTPBTPBBBPBBPTBBPPBBT', 'VICTORIA', 'https://www.xiyaomusic.com/dealer/new/dea1061.jpg', '7', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png'),
(8, 'E02', 'BPBPPPPPBPPPBPBBPPPPBBPPPBTBBBPPTBBPPBBPPBPPBBTBTTBPPP', 'GAIA', 'https://www.xiyaomusic.com/dealer/new/dea1106.jpg', '22', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png'),
(9, 'E03', 'PBBPPPB', 'ALLEX', 'https://www.xiyaomusic.com/dealer/new/dea1032.jpg', '22', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png'),
(10, 'E04', 'BPPPPBBPBBBPPBTBBBPPPBBPBBTPTPBPPPBBBBTPPB', 'BONNI', 'https://www.xiyaomusic.com/dealer/new/dea1085.jpg', '0', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png'),
(11, 'E05', 'BTPPBTPBTBPPPPPPTBBBPPBPPBBBBTBPBBPPPBPPBPPPTBPPPPPPBPBPPTPP', 'TEODORA', 'https://www.xiyaomusic.com/dealer/new/dea1069.jpg', '0', 'https://lnw69.com/resource/images/deck/33.png', 'https://lnw69.com/resource/images/deck/4.png', 'https://lnw69.com/resource/images/deck/33.png', 'https://lnw69.com/resource/images/deck/20.png', 'https://lnw69.com/resource/images/deck/4.png', 'https://lnw69.com/resource/images/deck/43.png'),
(12, 'P01', 'PPPPPPPPPBBBPBBPBBBPTBPBBTBPBBBPPBPBBPBPTBPPTTBPPBTBBPTBPB', 'PLOUK', 'https://www.xiyaomusic.com/dealer/new/dea1003.jpg', '1', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png'),
(13, 'P02', 'PBTPPBP', 'KERT_C', 'https://www.xiyaomusic.com/dealer/new/dea993.jpg', '7', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png'),
(14, 'P03', 'BPP', 'PHONG_S', 'https://www.xiyaomusic.com/dealer/new/dea987.jpg', '0', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png'),
(15, 'P04', 'PPBBPPPTPBPPPPPPTBPBPBBBPTBPPBBBPBBBBPPPBTBPBPPTPPBBBBPBTPPTBP', 'SROEUN_S', 'https://www.xiyaomusic.com/dealer/new/dea976.jpg', '0', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png'),
(16, 'P05', 'PPBBBBPPTBPTBBPP', 'SOR_S', 'https://www.xiyaomusic.com/dealer/new/dea992.jpg', '22', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png'),
(17, 'P06', 'BBBBPBPPPBPBPPBBPPPPPPTBPPBBP', 'PLORK_S', 'https://www.xiyaomusic.com/dealer/new/dea1001.jpg', '0', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png'),
(18, 'P07', 'BPBPPPBPBPPBTBTBBPBBPBBPPPBBBPPPPBBPBPBBPBBBBPBBP', 'CHEA_S', 'https://www.xiyaomusic.com/dealer/new/dea985.jpg', '0', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png', 'https://lnw69.com/resource/images/deck/0.png'),
(19, 'P08', 'PTBPPBBBPBBBPPPPTPBBBTBBBBPPPBPB', 'BOU_S', 'https://www.xiyaomusic.com/dealer/new/dea988.jpg', '0', 'https://lnw69.com/resource/images/deck/24.png', 'https://lnw69.com/resource/images/deck/39.png', 'https://lnw69.com/resource/images/deck/30.png', 'https://lnw69.com/resource/images/deck/33.png', 'https://lnw69.com/resource/images/deck/42.png', 'https://lnw69.com/resource/images/deck/46.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sagame`
--
ALTER TABLE `sagame`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sagame`
--
ALTER TABLE `sagame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
