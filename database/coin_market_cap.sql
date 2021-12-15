-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 03:54 PM
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
-- Database: `coin_market_cap`
--

-- --------------------------------------------------------

--
-- Table structure for table `coin_price`
--

CREATE TABLE `coin_price` (
  `id` int(11) NOT NULL,
  `symbol` varchar(12) NOT NULL,
  `bidPrice` double NOT NULL,
  `bidQty` double NOT NULL,
  `askPrice` double NOT NULL,
  `askQty` double NOT NULL,
  `insert_time` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coin_price`
--

INSERT INTO `coin_price` (`id`, `symbol`, `bidPrice`, `bidQty`, `askPrice`, `askQty`, `insert_time`, `created_at`) VALUES
(3, 'BTCUSDT', 47595.98, 0.042, 47595.99, 0.277, '1639579042', '2021-12-14 18:07:57'),
(4, 'BTCUSDT', 47614.74, 0.095, 47614.75, 0.107, '1639579045', '2021-12-14 18:08:12'),
(5, 'BTCUSDT', 47606.24, 0.455, 47606.25, 0.037, '1639579046', '2021-12-14 18:08:28'),
(6, 'BTCUSDT', 47632.99, 0.876, 47633, 1.241, '1639579048', '2021-12-14 18:08:36'),
(7, 'BTCUSDT', 47635.99, 0.854, 47636, 0.555, '1639579050', '2021-12-14 18:08:38'),
(8, 'BTCUSDT', 47630.75, 0.626, 47630.76, 0.053, '1639579052', '2021-12-14 18:08:40'),
(9, 'BTCUSDT', 47611.97, 0.105, 47611.99, 0.183, '1639579055', '2021-12-14 18:18:55'),
(10, 'BTCUSDT', 47304.48, 0.274, 47304.49, 0.319, '1639579936', '2021-12-15 20:22:19'),
(11, 'BTCUSDT', 47305.24, 0.019, 47305.77, 0.022, '1639579939', '2021-12-15 20:22:20'),
(12, 'BTCUSDT', 47297.41, 0.04, 47297.56, 0.003, '1639580002', '2021-12-15 20:23:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coin_price`
--
ALTER TABLE `coin_price`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coin_price`
--
ALTER TABLE `coin_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
