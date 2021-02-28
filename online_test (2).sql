-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2017 at 06:53 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `username` varchar(255) NOT NULL,
  `fnumber` int(11) NOT NULL,
  `question` longtext NOT NULL,
  `options` longtext NOT NULL,
  `coption` tinyint(4) NOT NULL,
  `qno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`username`, `fnumber`, `question`, `options`, `coption`, `qno`) VALUES
('rohit', 1, 'ksfklkslsjfljs', 'ajlljalf', 0, 4),
('rohit', 3, 'khdskflhlfhl?', 'aakfkgfagfkag`ajjahahfk`afkhahflah', 0, 1),
('rohit', 3, 'kjgkgkgk', 'djgkagkakdkahd`adklhadlhad', 1, 2),
('rohit', 1, 'akldlakd', 'llashlfaf', 0, 5),
('rohit', 1, 'jaakfkakfakkf', 'ajkjkagfgfgf`awuaoaufouaf', 0, 14),
('rohit', 1, 'foasf;pafa;', 'hiahfoafo`foaaofoafu`dgagdiad', 1, 21),
('rohit', 1, 'ksnslnlkgsglg', ';s;fs;fsk;k;fsf`kslkhlsgolgsgh', 0, 24),
('rohit', 1, 'aadauoduoau', 'afoafuo`ad70ada`ahukahdah', 1, 25),
('rohit', 1, 'isosugpsuspguus', 'sugusgpsg', 0, 26),
('rohit', 4, 'auhfafhhaf', 'hafhafhi`afhyiafa`akakfhkhakfh', 1, 14),
('rohit', 4, 'jggkkihkh', 'ihhhhl', 0, 15),
('rohit', 5, 'lfaalflalfn', 'nawfklanfna', 0, 3),
('rohit', 6, 'aldjajjda', 'hDLlldd', 0, 1),
('rohit', 7, 'aihiahflaihi', 'hiahlahlfhahfha', 0, 1),
('rohit', 8, 'dhhhxhx', 'sgsgsg', 0, 1),
('rohit', 9, 'ifaofpafpa', 'lahflhalfhaf', 0, 1),
('rohit', 9, 'afhiafilahfa', 'hlahflhalhafh`afklhhalfhla', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `form_max`
--

CREATE TABLE `form_max` (
  `username` longtext NOT NULL,
  `fnumber` int(11) NOT NULL,
  `maxid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_max`
--

INSERT INTO `form_max` (`username`, `fnumber`, `maxid`) VALUES
('rohit', 1, 26),
('rohit', 3, 3),
('rohit', 4, 15),
('rohit', 5, 3),
('rohit', 6, 1),
('rohit', 7, 1),
('rohit', 8, 1),
('rohit', 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gen_forms`
--

CREATE TABLE `gen_forms` (
  `username` longtext NOT NULL,
  `title` mediumtext NOT NULL,
  `fnumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gen_forms`
--

INSERT INTO `gen_forms` (`username`, `title`, `fnumber`) VALUES
('rohit', 'my first form', 1),
('rohit', 'My second demo form', 3),
('rohit', 'lolwa', 4),
('rohit', 'kndklKD', 5),
('rohit', 'akahlfhafhlfa', 6),
('rohit', 'dfdhd', 7),
('rohit', 'zkhfkzlhflzfh', 8);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `uid` varchar(50) NOT NULL,
  `professor` varchar(50) NOT NULL,
  `fnumber` int(11) NOT NULL,
  `details` longtext NOT NULL,
  `score` int(11) NOT NULL,
  `number_of_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`uid`, `professor`, `fnumber`, `details`, `score`, `number_of_question`) VALUES
('5-itb5-8', 'rohit', 1, '1;2', 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `utcet`
--

CREATE TABLE `utcet` (
  `username` varchar(255) NOT NULL,
  `pass` longtext NOT NULL,
  `nform` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utcet`
--

INSERT INTO `utcet` (`username`, `pass`, `nform`) VALUES
('rahul123', '$2y$10$PYSqSjZFRBu8a2v.STRaQeWImupzd29LP7BYoVerYLf5.97EW.7mm', 0),
('rohit', '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq', 8),
('rohit123', '$2y$10$GEmgCc/Zb0PLhpd2Q2BQTeZdlAWNs1/tdGjLfTa/M6FnkNj6BpnB6', 0),
('yadav123', '$2y$10$GAVdlU.nipbmINhNFxdKw.GNrXG1N6AqOE9ePL09IYsfj5Mf8nA7y', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `utcet`
--
ALTER TABLE `utcet`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
