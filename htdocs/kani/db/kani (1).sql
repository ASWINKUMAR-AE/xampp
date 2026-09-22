-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2024 at 01:32 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kani`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `eamil` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `eamil`, `password`, `address`, `state`, `city`, `phone_number`) VALUES
(1, 'Aswin', 'aswinkumarta2006@gmail.com', 'ae123', 'madurai', 'adsf', 'madurai', '9842017682'),
(2, 'Lakshmitha', 'lak2006@gmail.com', 'lak', 'Madurai', 'TAMIIL NADU', 'Madurai', '9361109518'),
(3, 'rekha', 'rekha@gmail.com', 'ae123', 'ddytd', 'futytd', 'hjfyuyd', '9842017682'),
(4, 'asdfadf', 'aswinkumarta2asdf006@dfaasdfadfgmail.com', 'ae123', 'asdf', 'asdf', 'asdf', 'asdf'),
(5, 'naveen', 'nd@gmail.com', 'ae123', 'asdf', 'tamil nadu', 'madurai', '1234567890-'),
(6, 'shakul', 'shakul@gmail.com', 'ae123', 'madurai', 'tamil nadu', 'madurai', '2345678'),
(7, '<br /><b>Notice</b>:  Undefined variable: name in <b>C:xampp1htdocskani 5semupdate.php</b> on line <b>280</b><br />', 'aswinkumarta2006@gmail.com', 'ae123', 'adsf', 'asdf', 'adsf', '<br /><b>Notice</b>:');

-- --------------------------------------------------------

--
-- Table structure for table `user_product`
--

CREATE TABLE `user_product` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `purchased_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_product`
--

INSERT INTO `user_product` (`id`, `user_name`, `email`, `address`, `product_name`, `price`, `quantity`, `purchased_time`) VALUES
(1, 'Aswin', 'aswinkumarta2006@gmail.com', 'madurai', 'Raspberries', '170.00', 1, '2024-05-13 11:36:26'),
(2, 'lakshmitha', 'lak2006@gmail.com', 'madurai', 'Pineapple', '100.00', 1, '2024-05-13 11:40:53'),
(4, 'lakshmitha', 'lak2006@gmail.com', 'madurai', 'Cherries', '220.00', 1, '2024-05-13 19:11:46'),
(5, 'naveen', 'nd@gmail.com', 'asdf', 'Raspberries', '850.00', 5, '2024-05-15 09:31:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_product`
--
ALTER TABLE `user_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_product`
--
ALTER TABLE `user_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
