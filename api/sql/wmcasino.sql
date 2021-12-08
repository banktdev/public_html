-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2020 at 03:09 PM
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
-- Table structure for table `wmcasino`
--

CREATE TABLE `wmcasino` (
  `id` int(11) NOT NULL,
  `dealer` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `record` varchar(255) NOT NULL,
  `remain` int(11) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `player1` varchar(2550) NOT NULL,
  `player2` varchar(2550) NOT NULL,
  `player3` varchar(2550) NOT NULL,
  `banker1` varchar(2555) NOT NULL,
  `banker2` varchar(2555) NOT NULL,
  `banker3` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wmcasino`
--

INSERT INTO `wmcasino` (`id`, `dealer`, `img`, `record`, `remain`, `timestamp`, `player1`, `player2`, `player3`, `banker1`, `banker2`, `banker3`) VALUES
(1, 'Ivy', 'https://glimg.ybtlm.cn/WM/image/employee/2020022189372826.jpeg', 'PBBBPPBPPPBB', 0, '1599205768', 'https://wm777.net/images/poker/poker_07.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_25.svg', 'https://wm777.net/images/poker/poker_02.svg', 'https://wm777.net/images/poker/poker_00.svg'),
(2, 'Veasna', 'https://glimg.ybtlm.cn/WM/image/employee/2019052250609280.jpeg', 'BPPPPPBBBBPBPPPPBBBBPPPBBPPPTPBBPT', 9, '1599205681', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg'),
(3, 'Anita', 'https://glimg.ybtlm.cn/WM/image/employee/2020032554815336.jpeg', 'PBP', 0, '1599204299', 'https://wm777.net/images/poker/poker_64.svg', 'https://wm777.net/images/poker/poker_21.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_53.svg', 'https://wm777.net/images/poker/poker_28.svg', 'https://wm777.net/images/poker/poker_00.svg'),
(4, 'Spring', 'https://glimg.ybtlm.cn/WM/image/employee/2019052277924101.jpeg', 'BBPPBBPBPPPTBBPBPTPBBTTBBPBBTPBTBPPBPBTPPPBPBBBPBPPTBPPPBBBBPPBP', 0, '1599201820', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg'),
(5, 'Ena', 'https://glimg.ybtlm.cn/WM/image/employee/2020022136424577.jpeg', 'PPP', 6, '1599201819', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg'),
(6, 'Mey', 'https://glimg.ybtlm.cn/WM/image/employee/2020072452587828.jpeg', 'BBBPPPPPPPBPBBBPTBPPBPBBPBPBPBPPBP', 0, '1599201819', 'https://wm777.net/images/poker/poker_45.svg', 'https://wm777.net/images/poker/poker_28.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_06.svg', 'https://wm777.net/images/poker/poker_07.svg', 'https://wm777.net/images/poker/poker_00.svg'),
(7, 'ANNA', 'https://glimg.ybtlm.cn/WM/image/employee/2020080560080331.jpeg', 'BBBBBBPPTBBBBPPPPPBPBPPBBBBBPPBPPPPPBPPBTBPPPBBTBPPBPBPPPPPPBP', 2, '1599201815', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg'),
(8, 'Hazel', 'https://glimg.ybtlm.cn/WM/image/employee/2020060517745994.jpeg', 'PBBPBTPBBBPPPBBPPBBBTTPBTBPTTPTBBBPBBPPPPBTPBBBTTBPPPPBBBPPPPP', 0, '1599201815', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg'),
(9, 'Fanny', 'https://glimg.ybtlm.cn/WM/image/employee/2020060586770672.jpeg', 'PBPBBBTPPPPBPBBPBPPTPPBPPBPPTPBPBBPBBPTBPTPPBPPBBPBPBPBB', 3, '1599201815', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg'),
(10, 'Mai', 'https://glimg.ybtlm.cn/WM/image/employee/2020060566434507.jpeg', 'PPBPPBBBBPBBBTBPBBPPBBPBPPPBBPPPBB', 2, '1599201808', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg'),
(11, 'Riva', 'https://glimg.ybtlm.cn/WM/image/employee/2020061975326641.png', 'PBBBPBPBTBTBPPPPPBBPPB', 18, '1599201809', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg'),
(12, 'NiNi', 'https://glimg.ybtlm.cn/WM/image/employee/2020060561574321.jpeg', 'PBPBBPTBBTPBPBTPPPPPPBPBPPBPBPPPPBPPBBBTBPBBBBBPPTPPB', 20, '1599201817', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg'),
(13, 'Sitha', 'https://glimg.ybtlm.cn/WM/image/employee/2020060533286436.jpeg', 'BPBBPPBBBBBBPBPPPBBBPPBBPTPBTPBBBBPBBPBPBPPBBBTBBPPPTBBPPPBB', 0, '1599201819', 'https://wm777.net/images/poker/poker_72.svg', 'https://wm777.net/images/poker/poker_02.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_13.svg', 'https://wm777.net/images/poker/poker_25.svg', 'https://wm777.net/images/poker/poker_00.svg'),
(14, 'Addie', 'https://glimg.ybtlm.cn/WM/image/employee/2019052279549004.jpeg', '', 0, '1599201817', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg'),
(15, 'Ah MeavArlene', 'https://glimg.ybtlm.cn/WM/image/employee/2020032594205247.jpeg', 'TTBPBPPBBBPBP', 0, '1599201820', 'https://wm777.net/images/poker/poker_47.svg', 'https://wm777.net/images/poker/poker_41.svg', 'https://wm777.net/images/poker/poker_15.svg', 'https://wm777.net/images/poker/poker_52.svg', 'https://wm777.net/images/poker/poker_30.svg', 'https://wm777.net/images/poker/poker_15.svg'),
(16, 'Liza', 'https://glimg.ybtlm.cn/WM/image/employee/2019091408355509.jpeg', 'PBTPBBPPBBBBBPPBBPPBPBTPPPPBBBBBBPBPPBBPBBPPBBBPPP', 28, '1599201817', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg'),
(17, 'Thorn', 'https://glimg.ybtlm.cn/WM/image/employee/2020030452546802.jpeg', 'B', 0, '1599201818', 'https://wm777.net/images/poker/poker_43.svg', 'https://wm777.net/images/poker/poker_47.svg', 'https://wm777.net/images/poker/poker_64.svg', 'https://wm777.net/images/poker/poker_42.svg', 'https://wm777.net/images/poker/poker_28.svg', 'https://wm777.net/images/poker/poker_25.svg'),
(18, 'Sun', 'https://glimg.ybtlm.cn/WM/image/employee/2019091756317658.jpeg', 'TBPPPBPPBBPPPBTPPBBPBTPPBPBBBBBBPPBPPPBTPPPBBPBPPPBBTPPP', 0, '1599201800', 'https://wm777.net/images/poker/poker_44.svg', 'https://wm777.net/images/poker/poker_50.svg', 'https://wm777.net/images/poker/poker_11.svg', 'https://wm777.net/images/poker/poker_28.svg', 'https://wm777.net/images/poker/poker_02.svg', 'https://wm777.net/images/poker/poker_31.svg'),
(19, 'Rock', 'https://glimg.ybtlm.cn/WM/image/employee/2020030438969257.jpeg', 'T', 0, '1599201800', 'https://wm777.net/images/poker/poker_33.svg', 'https://wm777.net/images/poker/poker_25.svg', 'https://wm777.net/images/poker/poker_06.svg', 'https://wm777.net/images/poker/poker_70.svg', 'https://wm777.net/images/poker/poker_11.svg', 'https://wm777.net/images/poker/poker_01.svg'),
(20, 'Thou', 'https://glimg.ybtlm.cn/WM/image/employee/2019101892101163.jpeg', 'BBBPPPPPBBPPPPBPP', 16, '1599201800', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg', 'https://wm777.net/images/poker/poker_00.svg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wmcasino`
--
ALTER TABLE `wmcasino`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wmcasino`
--
ALTER TABLE `wmcasino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
