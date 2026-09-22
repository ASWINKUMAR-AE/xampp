-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 07:03 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `robbi`
--

-- --------------------------------------------------------

--
-- Table structure for table `attedance`
--

CREATE TABLE `attedance` (
  `id` int(100) NOT NULL,
  `dat` date NOT NULL,
  `sno` int(100) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `subj` int(100) NOT NULL,
  `msg` int(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `pregno` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attedance`
--

INSERT INTO `attedance` (`id`, `dat`, `sno`, `regno`, `sname`, `subj`, `msg`, `cname`, `pregno`) VALUES
(1, '2023-12-06', 111, '123', 'ashok', 0, 0, '1', '0'),
(2, '2024-01-01', 1111, 'p222', 'sam', 2, 2, 'sam', 'p222');

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE `center` (
  `id` int(100) NOT NULL,
  `centerno` varchar(100) NOT NULL,
  `centername` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`id`, `centerno`, `centername`, `address`, `dat`) VALUES
(7, '102', 'Hindi Tutionn', 'Madurai', '2023-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `c_id` int(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `serviceimg` longtext NOT NULL,
  `nott` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`c_id`, `type`, `serviceimg`, `nott`) VALUES
(2, 'tutor', 'p4.png', ''),
(3, 'house', 'sign.png', ''),
(10001, 'sdfgsdg', 'Form_6B_English.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `hwork`
--

CREATE TABLE `hwork` (
  `id` int(100) NOT NULL,
  `sno` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `center` varchar(100) NOT NULL,
  `dview` varchar(100) NOT NULL,
  `indview` varchar(100) NOT NULL,
  `irhw` varchar(100) NOT NULL,
  `pbook` varchar(100) NOT NULL,
  `ppageno` varchar(100) NOT NULL,
  `tbook` varchar(100) NOT NULL,
  `tpageno` varchar(100) NOT NULL,
  `mover` varchar(100) NOT NULL,
  `raider` varchar(100) NOT NULL,
  `flyer` varchar(100) NOT NULL,
  `ende` varchar(100) NOT NULL,
  `archi` varchar(100) NOT NULL,
  `start` varchar(100) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `pregno` varchar(100) NOT NULL,
  `cregno` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hwork`
--

INSERT INTO `hwork` (`id`, `sno`, `date`, `name`, `regno`, `center`, `dview`, `indview`, `irhw`, `pbook`, `ppageno`, `tbook`, `tpageno`, `mover`, `raider`, `flyer`, `ende`, `archi`, `start`, `activity`, `pregno`, `cregno`) VALUES
(1, '1', '2023-12-29', 'sethu', '1234', '', '0-9', '0-9', '0-9', '2', '4', '3', '9', '6', '3', '3', '3', '3', '3', 'hand writing', 'P222', 'C333');

-- --------------------------------------------------------

--
-- Table structure for table `learning`
--

CREATE TABLE `learning` (
  `id` int(100) NOT NULL,
  `dat` date NOT NULL,
  `sno` int(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `subj` varchar(100) NOT NULL,
  `img` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `learning`
--

INSERT INTO `learning` (`id`, `dat`, `sno`, `lname`, `subj`, `img`) VALUES
(1, '2023-12-13', 1, 'railnet', 'cc', 'index-s4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `loginn`
--

CREATE TABLE `loginn` (
  `id` int(20) NOT NULL,
  `level` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginn`
--

INSERT INTO `loginn` (`id`, `level`, `username`, `password`) VALUES
(1, 'Super Admin', 'admin', 'admin'),
(2, 'Center', 'center', '12345'),
(3, 'Parents', 'parent', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(100) NOT NULL,
  `sno` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `dat` date NOT NULL,
  `nott` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `sno`, `message`, `dat`, `nott`) VALUES
(5, '1', 'Bad', '2023-12-22', '');

-- --------------------------------------------------------

--
-- Table structure for table `phelpdesk`
--

CREATE TABLE `phelpdesk` (
  `id` int(100) NOT NULL,
  `dat` date NOT NULL,
  `sno` int(100) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `subj` varchar(100) NOT NULL,
  `msg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phelpdesk`
--

INSERT INTO `phelpdesk` (`id`, `dat`, `sno`, `regno`, `sname`, `subj`, `msg`) VALUES
(3, '2023-12-22', 2, '101', 'Ashok', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(100) NOT NULL,
  `sno` int(100) NOT NULL,
  `dat` varchar(100) NOT NULL,
  `typ` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mno` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pword` varchar(100) NOT NULL,
  `img` longtext NOT NULL,
  `regno` varchar(100) NOT NULL,
  `nott` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `sno`, `dat`, `typ`, `name`, `mno`, `email`, `uname`, `pword`, `img`, `regno`, `nott`) VALUES
(1, 1, '2023-12-18 14:18:27', 'Super Admin', 'Ashok', '9965109712', 'ashokpravick90@gmail.com', 'admin', '12345', '', 'A111', ''),
(3, 9, '2023-12-20', 'Parents', 'sam', '9786062660', 'saravanapriya.dhanaraju@gmail.com', 'parent', '12345', '1615874945097-01.jpeg', 'P222', ''),
(4, 10, '', 'Center', 'Ashok', '9965109712', 'ashokpravick90@gmail.com', 'center', '12345', '', 'C333', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `srno` varchar(100) NOT NULL,
  `sdob` varchar(100) NOT NULL,
  `sanum` varchar(100) NOT NULL,
  `saddress` varchar(100) NOT NULL,
  `sbgroup` varchar(100) NOT NULL,
  `snation` varchar(100) NOT NULL,
  `sschool` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `fdob` varchar(100) NOT NULL,
  `fprof` varchar(100) NOT NULL,
  `fanum` varchar(100) NOT NULL,
  `fmno` varchar(100) NOT NULL,
  `femail` varchar(100) NOT NULL,
  `fedu` varchar(100) NOT NULL,
  `fadate` varchar(100) NOT NULL,
  `mnme` varchar(100) NOT NULL,
  `mdob` varchar(100) NOT NULL,
  `mprof` varchar(100) NOT NULL,
  `mano` varchar(100) NOT NULL,
  `mmno` varchar(100) NOT NULL,
  `memail` varchar(100) NOT NULL,
  `gname` varchar(100) NOT NULL,
  `gdob` varchar(100) NOT NULL,
  `gmno` varchar(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cregno` varchar(100) NOT NULL,
  `pregno` varchar(100) NOT NULL,
  `nott` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `sname`, `date`, `srno`, `sdob`, `sanum`, `saddress`, `sbgroup`, `snation`, `sschool`, `fname`, `fdob`, `fprof`, `fanum`, `fmno`, `femail`, `fedu`, `fadate`, `mnme`, `mdob`, `mprof`, `mano`, `mmno`, `memail`, `gname`, `gdob`, `gmno`, `cname`, `cregno`, `pregno`, `nott`) VALUES
(2, 'madhan', '13-02-24', '1235', '03-03-24', '12345679', 'puthur', 'b+', 'indian', 'srwwo', 'raju', '11-05-63', 'accountant', '9879012345', '8900123456', 'saro@gmail.com', 'msc', '09-03-24', 'mathi', '04-05-73', 'business', '1.2341E+11', '7890123456', 'valar@gmail.com', 'sabari', '03-12-00', '7890123456', '1', '2345', '2341', ''),
(3, 'siva', '14-02-24', '1236', '04-03-24', '12345680', 'puthur', 'b+', 'indian', 'srwwo', 'raju', '12-05-63', 'accountant', '9879012345', '8900123456', 'saro@gmail.com', 'msc', '10-03-24', 'mathi', '05-05-73', 'business', '1.2341E+11', '7890123456', 'valar@gmail.com', 'sabari', '04-12-00', '7890123456', '1', '2345', '2341', '');

-- --------------------------------------------------------

--
-- Table structure for table `stud_att`
--

CREATE TABLE `stud_att` (
  `sid` int(100) NOT NULL,
  `att_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `present` int(11) NOT NULL,
  `absent` int(11) NOT NULL,
  `halfday` float(11,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_att`
--

INSERT INTO `stud_att` (`sid`, `att_id`, `date`, `present`, `absent`, `halfday`) VALUES
(18, 3, '2024-01-04', 1, 0, 0.5),
(19, 4, '2024-01-04', 1, 0, 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `stud_attendance`
--

CREATE TABLE `stud_attendance` (
  `sa_id` int(11) NOT NULL,
  `serialno` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `date1` date NOT NULL,
  `attendence` int(11) NOT NULL,
  `speed_write` int(11) NOT NULL,
  `speed_write1` int(11) NOT NULL,
  `speed_write2` int(11) NOT NULL,
  `work_in_class` text NOT NULL,
  `work_in_class1` int(11) NOT NULL,
  `homework` text NOT NULL,
  `homework1` text NOT NULL,
  `homework2` text NOT NULL,
  `handw1` varchar(255) NOT NULL,
  `handw2` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `fingering` text NOT NULL,
  `today_activity` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_attendance`
--

INSERT INTO `stud_attendance` (`sa_id`, `serialno`, `sname`, `date1`, `attendence`, `speed_write`, `speed_write1`, `speed_write2`, `work_in_class`, `work_in_class1`, `homework`, `homework1`, `homework2`, `handw1`, `handw2`, `notes`, `fingering`, `today_activity`) VALUES
(1, '1234', 'Hariharan sethu', '2024-02-06', 1, 3, 2, 3, '3', 4, 'Book A', '3', '3', 'Book A', '3', 'nil', 'nil', 'nil'),
(2, '8078', 'ganesh kumar', '2024-02-06', 1, 4, 2, 4, '6', 5, 'Book B', '3', '6', 'Book B', '2', 'nil', 'nil', 'nil'),
(3, '2345', 'siva', '2024-02-06', 1, 16, 3, 14, '3', 15, 'Book B', '3', '17', 'Book B', '4', 'nil', 'nil', 'nil'),
(4, '201', 'Ashok', '2024-02-06', 0, 12, 3, 17, '4', 15, 'Book B', '3', '17', 'Book B', '16', 'nil', 'nil', 'nil'),
(5, '1234', 'Hariharan sethu', '2024-02-08', 1, 1, 2, 4, '3', 3, 'Book B', '1', '4', 'Book B', '4', 'lil', 'nil', 'nil'),
(6, '8078', 'ganesh kumar', '2024-02-08', 1, 1, 3, 5, '4', 4, 'Book B', '4', '2', 'Book B', '4', 'nil', 'nil', 'nil'),
(7, '2345', 'siva', '2024-02-08', 0, 1, 1, 1, '1', 1, 'Book A', '1', '1', 'Book A', '1', 'nil', 'nil', 'nil'),
(8, '201', 'Ashok', '2024-02-08', 0, 1, 1, 1, '1', 1, 'Book A', '1', '1', 'Book A', '1', 'nil', 'nil', 'nil');

-- --------------------------------------------------------

--
-- Table structure for table `tactivity`
--

CREATE TABLE `tactivity` (
  `id` int(100) NOT NULL,
  `sno` int(100) NOT NULL,
  `dat` date NOT NULL,
  `cname` varchar(100) NOT NULL,
  `msg` varchar(100) NOT NULL,
  `tname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tactivity`
--

INSERT INTO `tactivity` (`id`, `sno`, `dat`, `cname`, `msg`, `tname`) VALUES
(1, 1, '2023-12-16', 'Centre', 'Hi Kumar', 'Rajesh');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `id` int(100) NOT NULL,
  `sno` int(100) NOT NULL,
  `tutorname` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `mobileno` varchar(100) NOT NULL,
  `amno` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `aatherno` varchar(100) NOT NULL,
  `education` varchar(100) NOT NULL,
  `centername` varchar(100) NOT NULL,
  `addresss` varchar(100) NOT NULL,
  `dat` date NOT NULL,
  `cregno` varchar(100) NOT NULL,
  `gname` varchar(100) NOT NULL,
  `gmno` varchar(100) NOT NULL,
  `nott` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`id`, `sno`, `tutorname`, `dob`, `mobileno`, `amno`, `email`, `address`, `aatherno`, `education`, `centername`, `addresss`, `dat`, `cregno`, `gname`, `gmno`, `nott`) VALUES
(2, 2, 'priya', '1999-01-22', '6380443749', '', 'saravanapriya.dhanaraju@gmail.com', '154/A1 VANIYANGUDI MARUTHAPPA AYYANAR KOVIL BACK SIDE', '12312312333', 'MCA', 'Madurai', '', '2024-02-06', 'C333', 'sabari nath', '6380443749', 'nil'),
(3, 3, 'ashok', '2024-02-02', '6380443749', '6380443749', 'ashokpravick90@gmail.com', '154/A1 VANIYANGUDI MARUTHAPPA AYYANAR KOVIL BACK SIDE', '12312312333', 'msc', 'mca', '', '2024-02-06', 'C333', 'sabari', '06380443749', 'nil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attedance`
--
ALTER TABLE `attedance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `hwork`
--
ALTER TABLE `hwork`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learning`
--
ALTER TABLE `learning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginn`
--
ALTER TABLE `loginn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phelpdesk`
--
ALTER TABLE `phelpdesk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_att`
--
ALTER TABLE `stud_att`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `stud_attendance`
--
ALTER TABLE `stud_attendance`
  ADD PRIMARY KEY (`sa_id`);

--
-- Indexes for table `tactivity`
--
ALTER TABLE `tactivity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attedance`
--
ALTER TABLE `attedance`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `center`
--
ALTER TABLE `center`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `c_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;
--
-- AUTO_INCREMENT for table `hwork`
--
ALTER TABLE `hwork`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `learning`
--
ALTER TABLE `learning`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `loginn`
--
ALTER TABLE `loginn`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `phelpdesk`
--
ALTER TABLE `phelpdesk`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `stud_att`
--
ALTER TABLE `stud_att`
  MODIFY `sid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `stud_attendance`
--
ALTER TABLE `stud_attendance`
  MODIFY `sa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tactivity`
--
ALTER TABLE `tactivity`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
