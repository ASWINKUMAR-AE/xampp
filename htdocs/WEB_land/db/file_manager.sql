-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 09:53 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `file_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `id` int(11) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `reg_number` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `live_link` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`id`, `batch`, `student_name`, `reg_number`, `project_name`, `live_link`, `description`) VALUES
(1, '2022-2025', 'John Doe', '2022001', 'Project A', 'https://projecta.com', 'Description of Project A'),
(2, '2022-2025', 'Jane Smith', '2022002', 'Project B', 'https://projectb.com', 'Description of Project B'),
(3, '2022-2025', 'Michael Brown', '2022003', 'Project C', 'https://www.tngptcmadurai.com/', 'Description of Project C'),
(4, '2022-2025', 'Emily Johnson', '2022004', 'Project D', 'https://projectd.com', 'Description of Project D'),
(5, '2022-2025', 'Sarah Lee', '2022005', 'Project E', 'https://projecte.com', 'Description of Project E'),
(6, '2022-2025', 'David Kim', '2022006', 'Project F', 'https://projectf.com', 'Description of Project F'),
(7, '2022-2025', 'Alice Green', '2022007', 'Project G', 'https://projectg.com', 'Description of Project G'),
(8, '2022-2025', 'James White', '2022008', 'Project H', 'https://projecth.com', 'Description of Project H'),
(9, '2022-2025', 'Laura Davis', '2022009', 'Project I', 'https://projecti.com', 'Description of Project I'),
(10, '2022-2025', 'Daniel Clark', '2022010', 'Project J', 'https://projectj.com', 'Description of Project J'),
(11, '2023-2026', 'Carlos King', '2023001', 'Project K', 'https://projectk.com', 'Description of Project K'),
(12, '2023-2026', 'Sophia Taylor', '2023002', 'Project L', 'https://projectl.com', 'Description of Project L'),
(13, '2023-2026', 'Benjamin Harris', '2023003', 'Project M', 'https://projectm.com', 'Description of Project M'),
(14, '2023-2026', 'Chloe Scott', '2023004', 'Project N', 'https://projectn.com', 'Description of Project N'),
(15, '2023-2026', 'Liam Perez', '2023005', 'Project O', 'https://projecto.com', 'Description of Project O'),
(16, '2023-2026', 'Olivia Walker', '2023006', 'Project P', 'https://projectp.com', 'Description of Project P'),
(17, '2023-2026', 'Ethan Carter', '2023007', 'Project Q', 'https://projectq.com', 'Description of Project Q'),
(18, '2023-2026', 'Mia Mitchell', '2023008', 'Project R', 'https://projectr.com', 'Description of Project R'),
(19, '2023-2026', 'Noah Allen', '2023009', 'Project S', 'https://projects.com', 'Description of Project S'),
(20, '2023-2026', 'Amelia Wright', '2023010', 'Project T', 'https://projectt.com', 'Description of Project T');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
