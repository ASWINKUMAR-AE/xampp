-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2024 at 09:49 AM
-- Server version: 10.4.33-MariaDB-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srwwo_railnet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mob` varchar(30) NOT NULL,
  `addr` varchar(300) NOT NULL,
  `password` varchar(20) NOT NULL,
  `admin_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `mob`, `addr`, `password`, `admin_image`) VALUES
(1, 'admin', 'admin123@gmail.com', '9087654567', 'First street,', 'admin123', ''),
(3, 'admin', 'admin', '8765678634', 'Second Road,\r\nTrichy.', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ad_id` int(20) NOT NULL,
  `ad` varchar(15000) NOT NULL,
  `ad_url` varchar(500) NOT NULL,
  `dat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ad_id`, `ad`, `ad_url`, `dat`) VALUES
(9, 'r4.jpg', 'Inplant Training', ''),
(10, 'r5.jpg', 'Inplant Training', '');

-- --------------------------------------------------------

--
-- Table structure for table `animateslider`
--

CREATE TABLE `animateslider` (
  `id` int(10) NOT NULL,
  `img_typ` varchar(1000) NOT NULL,
  `tmpimg` varchar(1000) NOT NULL,
  `st` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `animateslider`
--

INSERT INTO `animateslider` (`id`, `img_typ`, `tmpimg`, `st`) VALUES
(3, 'IPT', 'e3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `msg` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(25) NOT NULL,
  `event_name` varchar(15000) NOT NULL,
  `des` varchar(15000) NOT NULL,
  `event_date` varchar(15000) NOT NULL,
  `event_image` varchar(15000) NOT NULL,
  `h_text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `des`, `event_date`, `event_image`, `h_text`) VALUES
(1, 'INPLANT TRAINING', 'Smt.B.Tejaswini Secretary / Railnet The Centre coordinates in-plant training for Engineering students from different colleges of madurai and outside. We have guided more than 2000 students doing B.E, During summer and winter vacations for inplant training. This includes seminars by prominent persons in IT and Telecommunication industry, and field visits to different departments of Railways where Railway Officers and technical heads will deliver the knowledge of work. Through Railnet, we guide acadamic students ( MCA, ME, BE, M.SC ) to do their Acadamic Projects here. The projects are helping the ongoing computerisation process of the Southern Railway,Madurai Division.', '', '', 'We are Providing Inplant Training,Internship & Project BE(ECE,EEE,CIVIL,MECH,IT),MCA,MSC,BSc,..Railnet Software Solutions,Southern Railway-Madurai Division Start:1-10-2019 To 01-08-2020 '),
(2, 'SPORT\'S DAY', 'In India, sports days are held for two to three days. These include games like football, cricket, throwball, dodgeball, volleyball, track and field, basketball etc. These sports days are held between the various houses in a particular school. In India, many traditional games such as Kho-Kho and Kabaddi are played.', '', '', ''),
(3, 'TEACHER\'S DAY', 'September 5th, birthday of Dr.Sarvepalli Radhakrishnan, was celebrated in our school. His footsteps, the teachers follow, are being proved on Teacher\'s Day. The performance of students on stage exclusively for teachers was a memorable one. Students exhibited their talents as a treat to the teachers. Dance, music, mimicry and skit made the day explicable. The students took great effort and ensured that teachers enjoy every minute. Followed by the cultural programme, games like musical chair and tug of war were conducted for the teachers by the students.', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_cat`
--

CREATE TABLE `gallery_cat` (
  `gc_id` int(11) NOT NULL,
  `gallery_cat_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gallery_cat`
--

INSERT INTO `gallery_cat` (`gc_id`, `gallery_cat_name`, `status`) VALUES
(1, 'IPT', 0),
(2, 'Teahers Day', 0),
(3, 'Childrens Day', 0),
(4, 'Project', 0),
(5, 'SRWWO Tree Plantation', 0),
(7, 'Srwwo ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(25) NOT NULL,
  `member_name` varchar(15000) NOT NULL,
  `des` varchar(500) NOT NULL,
  `position` varchar(15000) NOT NULL,
  `package_price` varchar(15000) NOT NULL,
  `member_image` varchar(15000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_name`, `des`, `position`, `package_price`, `member_image`) VALUES
(19, 'Smt.Priya', '', 'PRESIDENT', '', '99.jpg'),
(20, 'Smt.Latha', '', 'VICE PRESIDENT', '', 'demo.png'),
(22, 'Smt.Vasanthi Giri', '', 'General Secretary', '', '7.jpg'),
(23, 'Smt.Vasanthi Giri', '', 'TREASURER', '', '7.jpg'),
(24, 'Smt. Nagalakshmi', '', 'Secretary / Railnet', '', '77.jpg'),
(25, 'Smt. Priyanka', '', 'Secretary / SRWWO SCHOOL', '', '33.jpg'),
(26, 'Smt. Srujana', '', 'Secretary / AKSHAYA SCHOOL', '', 'big.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `admin_id` int(11) NOT NULL,
  `gcategory` int(11) NOT NULL,
  `admin_image` varchar(500) NOT NULL,
  `img_title` varchar(500) NOT NULL,
  `img_type` varchar(500) NOT NULL,
  `description` varchar(1000) DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`admin_id`, `gcategory`, `admin_image`, `img_title`, `img_type`, `description`) VALUES
(1, 1, '20221022133104_e1.jpg', 'sdfgdf', 'gsdfg', 'sdfgdf'),
(2, 1, '20221022133133_e1.jpg', 'IPT', 'IPT', 'IPT'),
(3, 2, '20221022133521_e2.jpg', 'Teachersday', 'Teachersday', 'Teachersday'),
(6, 4, '20221022133739_e14.jpg', 'Project', 'Project', 'Project'),
(7, 5, '20221022133816_E51.jpeg', 'Tree Plantation', 'Tree Plantation', 'Tree Plantation'),
(8, 7, '20221027134013_7.jpg', 'Srwwo', 'Demo Testing', 'Srwwo');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(100) NOT NULL,
  `sno` varchar(100) NOT NULL,
  `studentname` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `mno` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ecom` varchar(100) NOT NULL,
  `dep` varchar(100) NOT NULL,
  `yea` varchar(100) NOT NULL,
  `noi` varchar(100) NOT NULL,
  `cour` varchar(100) NOT NULL,
  `pg` varchar(100) NOT NULL,
  `dur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `sno`, `studentname`, `dob`, `addr`, `mno`, `email`, `ecom`, `dep`, `yea`, `noi`, `cour`, `pg`, `dur`) VALUES
(1, 'RNETI-1', 'Aswini V', '2003-05-28', '30, Anna nagar, Orikkai, Kanchipuram- 631502.', '7358840866', 'aswinivedhachalam@gmail.com', 'Ug Degree', 'ECE', 'II', 'College Of Engineering, Guindy', 'Internship', 'Railway', '1 Month');

-- --------------------------------------------------------

--
-- Table structure for table `texts`
--

CREATE TABLE `texts` (
  `event_id` int(20) NOT NULL,
  `h_text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `animateslider`
--
ALTER TABLE `animateslider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `gallery_cat`
--
ALTER TABLE `gallery_cat`
  ADD PRIMARY KEY (`gc_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `texts`
--
ALTER TABLE `texts`
  ADD PRIMARY KEY (`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ad_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `animateslider`
--
ALTER TABLE `animateslider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15186;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery_cat`
--
ALTER TABLE `gallery_cat`
  MODIFY `gc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `texts`
--
ALTER TABLE `texts`
  MODIFY `event_id` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
