-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 06:03 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'asw', 'ae', 'aswinkumarta2006@gmail.com ', '2024-10-26 11:19:56'),
(6, 'aswin', 'aswin@2006WEB', 'aswinkumarta2006@gmail.com ', '2024-11-07 16:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE `art` (
  `id` int(11) NOT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`id`, `artist_id`, `title`, `description`, `image_url`, `created_at`) VALUES
(7, 1, 'drawing ', 'boy drawing', '../uploads/freepik__candid-image-photography-natural-textures-highly-r__53077.jpeg', '2024-10-28 15:36:54'),
(10, 14, 'ae', 'ae', '../uploads/WhatsApp Image 2024-10-27 at 19.00.11_c64fc046.jpg', '2024-10-29 05:46:15'),
(12, 14, 'sdf', 'sdf', '../uploads/freepik__candid-image-photography-natural-textures-highly-r__53076.jpeg', '2024-10-29 05:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `issue` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `email`, `issue`, `created_at`) VALUES
(2, 'aswin', 'sdf@gmail.com', 'asdf', '2024-10-30 10:23:50'),
(3, 'aswin', 'sdf@gmail.com', 'asdf', '2024-10-30 10:27:04'),
(4, 'aswin', 'sdf@gmail.com', 'asdf', '2024-10-30 10:27:20'),
(5, 'aswin', 'sdf@gmail.com', 'asdf', '2024-10-30 10:28:53'),
(6, 'aswin', 'sdf@gmail.com', 'asdf', '2024-10-30 10:29:12'),
(7, 'aswin', 'sdf@gmail.com', 'asdf', '2024-10-30 10:29:34'),
(8, 'sdf', 'sdfsd@gamil.com', 'sdf', '2024-10-30 10:30:20'),
(9, 'sdf', 'sdfsd@gamil.com', 'sdf', '2024-10-30 10:32:09'),
(10, 'sdf', 'sdfadf@gmail.com', 'rdgr', '2024-10-30 10:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `liked`
--

CREATE TABLE `liked` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `artwork_id` int(11) NOT NULL,
  `liked_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liked`
--

INSERT INTO `liked` (`id`, `user_id`, `artist_id`, `artwork_id`, `liked_at`) VALUES
(1, 21, 14, 12, '2024-11-26 13:14:07'),
(2, 21, 14, 10, '2024-11-26 13:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(20) DEFAULT NULL,
  `artwork_title` varchar(255) NOT NULL,
  `artwork_description` text,
  `artwork_image` varchar(255) DEFAULT NULL,
  `paper_size` varchar(100) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `sketch_range` enum('Light','Dark') NOT NULL,
  `face_count` varchar(10) DEFAULT NULL,
  `additional_notes` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `artist_id`, `customer_name`, `customer_email`, `customer_phone`, `artwork_title`, `artwork_description`, `artwork_image`, `paper_size`, `submission_date`, `sketch_range`, `face_count`, `additional_notes`, `created_at`) VALUES
(1, 15, 14, 'ven', 'ven@gmail.com', '123456', 'asdfads', 'japjsdfpj', 'uploads/freepik__candid-image-photography-natural-textures-highly-r__53077.jpeg', 'A4', '2024-11-06', 'Light', '2', 'adfsdf', '2024-10-29 15:54:28'),
(2, 15, 14, 'ven', 'aswinkumarta2006@gmail.com', '123456', 'alskjdf', 'dkslf', 'uploads/istockphoto-688560196-2048x2048.jpg', 'A4', '2024-10-26', 'Dark', '1', 'a;ldjfjsa', '2024-10-29 15:59:16'),
(3, 15, 14, 'ven', 'ven@gmail.com', '123456', 'alskjdf', 'dkslf', 'uploads/istockphoto-688560196-2048x2048.jpg', 'A4', '2024-10-26', 'Dark', '1', 'a;ldjfjsa', '2024-10-29 15:59:58'),
(4, 15, 14, 'ven', 'ven@gmail.com', '123456', ';l', 'akjsdf', 'uploads/freepik__candid-image-photography-natural-textures-highly-r__53077.jpeg', 'A3', '2024-10-16', 'Light', '5', 'al;skdf;', '2024-10-29 16:02:08'),
(5, 15, 14, 'ven', 'ven@gmail.com', '123456', 'asdf', 'asdf', 'uploads/freepik__candid-image-photography-natural-textures-highly-r__53079.jpeg', 'A4', '2024-11-02', 'Dark', '1', ';ksd;f', '2024-10-29 16:14:48'),
(6, 15, 14, 'ven', 'ven@gmail.com', '123456', 'dsf', 'asdf', 'uploads/freepik__candid-image-photography-natural-textures-highly-r__53077.jpeg', 'A4', '2024-11-03', 'Dark', '1', ';lsdkf', '2024-10-29 16:16:31'),
(7, 15, 14, 'ven', 'ven@gmail.com', '123456', 'dsf', 'asdf', 'uploads/freepik__candid-image-photography-natural-textures-highly-r__53077.jpeg', 'A4', '2024-11-03', 'Dark', '1', ';lsdkf', '2024-10-29 16:18:14'),
(8, 15, 14, 'ven', 'ven@gmail.com', '123456', 'dsf', 'asdf', 'uploads/freepik__candid-image-photography-natural-textures-highly-r__53077.jpeg', 'A4', '2024-11-03', 'Dark', '1', ';lsdkf', '2024-10-29 16:18:42'),
(9, 15, 1, 'ven', 'ven@gmail.com', '123456', 'asdfsdf', 'sdf', 'uploads/freepik__candid-image-photography-natural-textures-highly-r__53079.jpeg', 'A2', '2024-10-31', 'Dark', '1', 'lkhsld', '2024-10-29 16:21:28'),
(10, 15, 1, 'ven', 'ven@gmail.com', '123456', 'asdfsdf', 'sdf', 'uploads/freepik__candid-image-photography-natural-textures-highly-r__53079.jpeg', 'A2', '2024-10-31', 'Dark', '1', 'lkhsld', '2024-10-29 16:22:44'),
(11, 15, 14, 'ven', 'webdesign2022as@gmail.com', '123456', 'sfd', 's.df', 'uploads/freepik__candid-image-photography-natural-textures-highly-r__53079.jpeg', 'A4', '2024-11-01', 'Dark', '1', 'asdfasdf', '2024-10-29 17:08:05'),
(12, 17, 0, 'shakul', 'shakul@gmail.com', '9842017682', 'ds', 'dsf', 'uploads/170-man-artist-2-1024.webp', 'A4', '2024-11-08', 'Dark', '1', 'sdf', '2024-10-30 14:41:12'),
(13, 17, 0, 'shakul', 'shakul@gmail.com', '9842017682', 'l;kka;sdf', 'lkkasd', 'uploads/170-man-artist-2-1024.png', 'A4', '2024-11-02', 'Dark', '1', 'asdf', '2024-10-30 14:46:05'),
(14, 17, 0, 'shakul', 'shakul@gmail.com', '9842017682', 'l;kka;sdf', 'lkkasd', 'uploads/170-man-artist-2-1024.png', 'A4', '2024-11-02', 'Dark', '1', 'asdf', '2024-10-30 14:48:56'),
(15, 17, 16, 'shakul', 'shakul@gmail.com', '9842017682', 'wer', 'sdf', 'uploads/issue-removebg-preview.png', 'A4', '2024-11-07', 'Dark', '2', 'sdf', '2024-10-30 14:55:55'),
(16, 17, 14, 'shakul', 'shakul@gmail.com', '9842017682', 'asdf', 'sdf', 'uploads/170-man-artist-2-1024.png', 'A3', '2024-11-06', 'Dark', '2', 'asdf', '2024-10-30 14:59:07'),
(17, 17, 16, 'shakul', 'shakul@gmail.com', '9842017682', 'asd', 'asdf', 'uploads/Featured_Image-1.png', 'A4', '2025-05-02', 'Dark', '1', 'sdf', '2024-10-30 16:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` enum('artist','customer','admin') NOT NULL,
  `status` enum('pending','approved') DEFAULT 'pending',
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone_number` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pin_code` varchar(10) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `status`, `location`, `created_at`, `phone_number`, `address`, `pin_code`, `instagram`, `facebook`) VALUES
(1, 'aswinkumar', '$2y$10$65OKqEoHI56QDpjGkvlqveCf1M2y/3wQAO60dnCfpj4c0xZL9Ylc2', 'aswinkumarta2006@gmail.com', 'artist', 'pending', NULL, '2024-10-26 09:40:14', '9842017682', 'madurai', '625001', 'drawing_with_aswin', 'drawing_with_aswin'),
(14, 'eni', '$2y$10$OdfAqSy1tZUSDfykxFM4c.uwc4XIDWSe4084llH6QL2hTnVfXtb7G', 'rekhac19800721@gmail.com', 'artist', 'approved', NULL, '2024-10-28 15:07:16', '09', '5456', '4565', 'drawing_with_aswin', ''),
(16, 'ASWIN_KUMAR', '$2y$10$TTbNJ7SPScjppGJ6ieVw..6N5MjLMwIDUQgqbDMThOEPidYckrKhO', 'aswinkumarta2006@gmail.com', 'artist', 'approved', NULL, '2024-10-30 13:54:04', '9361109518', 'madurai - 1', '625001', 'drawing_with_aswin', 'drawing_with_aswin'),
(21, 'tpcstudent', '$2y$10$WvYy/2PVX8ZOQUqYS9LILeQRLee.jzvyy7KQdhUWc9WGxZdtgppM6', 'aswinkumar2006@gmail.com', 'customer', 'pending', NULL, '2024-11-25 04:02:45', '9842017682', NULL, '625001', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liked`
--
ALTER TABLE `liked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `art`
--
ALTER TABLE `art`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `liked`
--
ALTER TABLE `liked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `art`
--
ALTER TABLE `art`
  ADD CONSTRAINT `art_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
