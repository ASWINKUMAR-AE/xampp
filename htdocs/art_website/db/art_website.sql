-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2026 at 03:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'asw', 'ae', 'aswinkumarta2006@gmail.com ', '2024-10-26 11:19:56'),
(6, 'aswin', 'aswin@2006WEB', 'aswinkumarta2006@gmail.com ', '2024-11-07 16:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `artworks`
--

CREATE TABLE `artworks` (
  `id` int(11) NOT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `likes_count` int(11) DEFAULT 0,
  `status` enum('pending','approved') DEFAULT 'approved',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `liked` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `artworks`
--

INSERT INTO `artworks` (`id`, `artist_id`, `title`, `description`, `image_url`, `likes_count`, `status`, `created_at`, `liked`) VALUES
(7, 1, 'drawing ', 'boy drawing', '../uploads/freepik__candid-image-photography-natural-textures-highly-r__53077.jpeg', 1, 'approved', '2024-10-28 15:36:54', 0),
(10, 14, 'ae', 'ae', '../uploads/WhatsApp Image 2024-10-27 at 19.00.11_c64fc046.jpg', 3, 'approved', '2024-10-29 05:46:15', 0),
(12, 14, 'sdf', 'sdf', '../uploads/freepik__candid-image-photography-natural-textures-highly-r__53076.jpeg', 3, 'approved', '2024-10-29 05:55:06', 0),
(14, 26, 'ENIYA', 'some thing new', '../uploads/01.jpeg', 0, 'approved', '2026-04-06 13:26:55', 0),
(15, 26, 'PR', 'PR', '../uploads/03.jpg', 0, 'approved', '2026-04-06 13:27:17', 0),
(16, 26, 'rolex', '..', '../uploads/02.jpg', 0, 'approved', '2026-04-06 13:27:34', 0),
(17, 26, 'real ', '..', '../uploads/04.jpg', 0, 'approved', '2026-04-06 13:27:58', 0),
(18, 26, 'boby', '..', '../uploads/11.jpg', 0, 'approved', '2026-04-06 13:28:20', 0),
(19, 26, 'Murugan ', '..', '../uploads/Screenshot 2026-04-06 190746.png', 0, 'approved', '2026-04-06 13:38:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `artwork_commands`
--

CREATE TABLE `artwork_commands` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL,
  `command_text` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `artwork_commands`
--

INSERT INTO `artwork_commands` (`id`, `user_id`, `artist_id`, `art_id`, `command_text`, `created_at`) VALUES
(1, 23, 14, 12, 'hi', '2024-11-29 05:42:13'),
(2, 23, 14, 12, 'hi', '2024-11-29 05:42:39'),
(3, 23, 14, 10, 'super', '2024-11-29 05:46:28'),
(4, 23, 14, 10, 'hi v', '2024-11-29 05:48:44'),
(5, 23, 14, 10, 'ae', '2024-11-29 05:49:34'),
(6, 23, 14, 12, 'jalsjdfl', '2024-11-29 06:13:16'),
(7, 23, 14, 12, 'l', '2024-11-29 06:18:23'),
(8, 21, 14, 12, 'jljsdlkfjlsjdf', '2024-11-29 13:14:07'),
(9, 25, 1, 7, ';lkdf', '2026-04-01 14:51:11'),
(10, 25, 14, 10, 'aldjfljajfljalsjfdljasljdfljalsjfdlkjasldjflkajlfdjaljdflkjasldfj\r\n', '2026-04-01 14:53:38'),
(11, 25, 14, 10, 'aldjfljajfljalsjfdljasljdfljalsjfdlkjasldjflkajlfdjaljdflkjasldfj\r\n', '2026-04-01 14:53:42'),
(12, 25, 1, 7, 'wada', '2026-04-01 15:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(20) DEFAULT NULL,
  `artwork_title` varchar(255) NOT NULL,
  `artwork_description` text DEFAULT NULL,
  `artwork_image` varchar(255) DEFAULT NULL,
  `paper_size` varchar(100) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `sketch_range` enum('Light','Dark') NOT NULL,
  `face_count` varchar(10) DEFAULT NULL,
  `additional_notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`order_id`, `customer_id`, `artist_id`, `customer_name`, `customer_email`, `customer_phone`, `artwork_title`, `artwork_description`, `artwork_image`, `paper_size`, `submission_date`, `sketch_range`, `face_count`, `additional_notes`, `created_at`) VALUES
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
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(11) NOT NULL,
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `user1_id`, `user2_id`, `created_at`) VALUES
(1, 25, 14, '2026-04-01 14:51:37'),
(2, 25, 1, '2026-04-01 16:05:22'),
(3, 27, 26, '2026-04-06 13:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `issue` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `artwork_id` int(11) NOT NULL,
  `liked_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `artist_id`, `artwork_id`, `liked_at`) VALUES
(16, 23, 14, 10, '2024-11-29 06:37:54'),
(17, 23, 14, 12, '2024-11-29 06:57:43'),
(50, 21, 14, 12, '2024-11-30 05:43:06'),
(51, 21, 14, 10, '2024-11-30 05:43:13'),
(56, 25, 0, 7, '2026-04-01 15:24:28'),
(57, 25, 0, 12, '2026-04-01 16:21:15'),
(58, 25, 0, 10, '2026-04-01 16:21:16'),
(59, 27, 0, 13, '2026-04-06 13:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `sender_id`, `message`, `created_at`) VALUES
(1, 1, 25, 'hi', '2026-04-01 14:51:39'),
(2, 2, 25, 'hu', '2026-04-01 16:05:25'),
(3, 3, 27, 'HI BRO', '2026-04-06 13:18:53'),
(4, 3, 26, 'SERI', '2026-04-06 13:19:11');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone_number` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pin_code` varchar(10) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `status`, `location`, `created_at`, `phone_number`, `address`, `pin_code`, `instagram`, `facebook`) VALUES
(1, 'aswinkumar', '$2y$10$65OKqEoHI56QDpjGkvlqveCf1M2y/3wQAO60dnCfpj4c0xZL9Ylc2', 'aswinkumarta2006@gmail.com', 'artist', 'pending', NULL, '2024-10-26 09:40:14', '9842017682', 'madurai', '625001', 'drawing_with_aswin', 'drawing_with_aswin'),
(14, 'eni', '$2y$10$OdfAqSy1tZUSDfykxFM4c.uwc4XIDWSe4084llH6QL2hTnVfXtb7G', 'rekhac19800721@gmail.com', 'artist', 'approved', NULL, '2024-10-28 15:07:16', '09', '5456', '4565', 'drawing_with_aswin', ''),
(21, 'tpcstudent', '$2y$10$WvYy/2PVX8ZOQUqYS9LILeQRLee.jzvyy7KQdhUWc9WGxZdtgppM6', 'aswinkumar2006@gmail.com', 'customer', 'pending', NULL, '2024-11-25 04:02:45', '9842017682', NULL, '625001', '', ''),
(23, 'drawingwithaswin', '$2y$10$DMMNW/UB.6ThqtKr4F2.x.dwojnomWT7oRl7KlJYAHotkT3gqH99e', 'sdf@gmail.com', 'artist', 'pending', NULL, '2024-11-29 04:55:33', '9361109518', NULL, '652895', 'drawing_with_aswin', ''),
(24, 'ARUNKUMAR', '$2y$10$PCL3YxGh8ECKqr23sezpd.QECOhnzTUJZk6hu3o3If8CUADTnKx8S', 'aswinkumarta2006@gmail.com', 'artist', 'approved', NULL, '2024-12-05 14:03:46', '9842017682', NULL, '123456', '', ''),
(25, 'aswin', '$2y$10$WFrX7ysur6KNPprzvjypD.QKc5iaWkQqJh5UrKou6AUOYRj7uO1C.', 'aswinkumarta2006@gmail.com', 'artist', 'approved', NULL, '2026-03-31 19:56:29', '9361109518', NULL, '625001', '', ''),
(26, 'drawing_with_aswin', '$2y$10$MqaCEUfryrLuQyxyLUThce4UisSU1egU5KcCHFlopdUqS5lPL7jU6', 'cseaswin@gmail.com', 'artist', 'approved', NULL, '2026-04-06 13:10:57', '09361109518', '54/49, Pallikood lane,', '625001', '', ''),
(27, 'aswinKUMAR', '$2y$10$fagaBlGGLKVT2omD1T3pKefGhVVnguyIa9hWlqeHnIC3R3c3uIMRO', 'aswin@gmail.com', 'customer', 'approved', NULL, '2026-04-06 13:13:54', '9361109519', 'JJJ', '625001', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artworks`
--
ALTER TABLE `artworks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indexes for table `artwork_commands`
--
ALTER TABLE `artwork_commands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user1_id` (`user1_id`),
  ADD KEY `user2_id` (`user2_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversation_id` (`conversation_id`),
  ADD KEY `sender_id` (`sender_id`);

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
-- AUTO_INCREMENT for table `artworks`
--
ALTER TABLE `artworks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `artwork_commands`
--
ALTER TABLE `artwork_commands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artworks`
--
ALTER TABLE `artworks`
  ADD CONSTRAINT `artworks_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `conversations_ibfk_1` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `conversations_ibfk_2` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
