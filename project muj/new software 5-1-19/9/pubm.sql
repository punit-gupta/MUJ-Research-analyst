-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 06:06 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pubm`
--

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

CREATE TABLE `compare` (
  `org` varchar(300) NOT NULL,
  `citation` int(11) NOT NULL,
  `document` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `journal` int(11) NOT NULL,
  `conf` int(11) NOT NULL,
  `book` int(11) NOT NULL,
  `bookchapter` int(11) NOT NULL,
  `collaborator` int(11) NOT NULL,
  `contries` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compare`
--

INSERT INTO `compare` (`org`, `citation`, `document`, `author`, `total`, `journal`, `conf`, `book`, `bookchapter`, `collaborator`, `contries`) VALUES
('JSS', 9268, 1175, 513, 1175, 722, 416, 0, 19, 145, 40),
('MAHE', 7984, 17887, 1796, 17887, 14816, 1337, 8, 195, 145, 134),
('MUJ', 1684, 799, 398, 799, 378, 365, 2, 39, 169, 35),
('s1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
('Sastra', 43392, 7250, 4388, 7250, 6162, 969, 0, 73, 159, 81),
('Shoolini', 7984, 845, 326, 845, 755, 32, 4, 45, 161, 63);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `name` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `department` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`name`, `id`, `email`, `pass`, `level`, `department`) VALUES
('Punit', 'punitg07@gmail.com', 'punitg07@gmail.com', '1234', 'admin', 'Department of Computer and Communication Engineering, Manipal University Jaipur, Jaipur;Department of Computer Science and Engineering, Manipal University Jaipur, Jaipur;Department of Information Technology, Manipal University Jaipur, Jaipur;Department of Chemical Engineering, Manipal University Jaipur, Jaipur;Department of Civil Engineering, Manipal University Jaipur, Jaipur;Department of Fine Arts (Applied Art), Manipal University Jaipur, Jaipur;Department of Mechatronics Engineering, Manipal ');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `data` varchar(300) NOT NULL,
  `project` varchar(300) NOT NULL,
  `path` varchar(300) NOT NULL,
  `header` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`data`, `project`, `path`, `header`) VALUES
('house1', 'house', 'house1', 'house1'),
('jp', 'jiit', 'jp', 'jp'),
('hh', 'h', 'hh', 'hh'),
('11', 'h1', '11', '11');

-- --------------------------------------------------------

--
-- Table structure for table `yearp`
--

CREATE TABLE `yearp` (
  `org` varchar(300) NOT NULL,
  `year` int(23) NOT NULL,
  `count` int(32) NOT NULL,
  `type` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yearp`
--

INSERT INTO `yearp` (`org`, `year`, `count`, `type`) VALUES
('JSS', 2013, 68, ''),
('JSS', 2014, 78, ''),
('JSS', 2015, 68, ''),
('JSS', 2016, 95, ''),
('JSS', 2017, 79, ''),
('JSS', 2018, 141, ''),
('JSS', 2019, 32, ''),
('MAHE', 2013, 1087, ''),
('MAHE', 2014, 1174, ''),
('MAHE', 2015, 1233, ''),
('MAHE', 2016, 1752, ''),
('MAHE', 2017, 1957, ''),
('MAHE', 2018, 2258, ''),
('MAHE', 2019, 410, ''),
('MUJ', 2013, 8, ''),
('MUJ', 2014, 22, ''),
('MUJ', 2015, 60, ''),
('MUJ', 2016, 152, ''),
('MUJ', 2017, 168, ''),
('MUJ', 2018, 302, ''),
('MUJ', 2019, 87, ''),
('Sastra', 2013, 746, ''),
('Sastra', 2014, 1061, ''),
('Sastra', 2015, 1032, ''),
('Sastra', 2016, 870, ''),
('Sastra', 2017, 873, ''),
('Sastra', 2018, 920, ''),
('Sastra', 2019, 202, ''),
('Shoolini', 2013, 59, ''),
('Shoolini', 2014, 90, ''),
('Shoolini', 2015, 80, ''),
('Shoolini', 2016, 132, ''),
('Shoolini', 2017, 156, ''),
('Shoolini', 2018, 217, ''),
('Shoolini', 2019, 57, ''),
('u', 1, 1, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compare`
--
ALTER TABLE `compare`
  ADD UNIQUE KEY `org` (`org`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yearp`
--
ALTER TABLE `yearp`
  ADD UNIQUE KEY `org` (`org`,`year`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
