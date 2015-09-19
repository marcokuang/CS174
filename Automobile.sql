-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2015 at 07:31 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Developers`
--

-- --------------------------------------------------------

--
-- Table structure for table `Automobile`
--

CREATE TABLE IF NOT EXISTS `Automobile` (
  `CarID` int(11) NOT NULL,
  `Manufacturer` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `MinPrice` int(11) NOT NULL,
  `MaxPrice` int(11) NOT NULL,
  `Location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `Automobile`
--

INSERT INTO `Automobile` (`CarID`, `Manufacturer`, `Model`, `MinPrice`, `MaxPrice`, `Location`) VALUES
(1, 'Toyota', 'Corolla', 16999, 22390, 'SanFrancisco'),
(2, 'BMW', '3', 33200, 54499, 'SanJose'),
(3, 'Honda', 'Civic', 18999, 23599, 'SanJose'),
(4, 'Volvo', 'S60', 36900, 59899, 'SanFrancisco'),
(5, 'Hyundai', 'Accent', 12099, 17899, 'SanFrancisco');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Automobile`
--
ALTER TABLE `Automobile`
  ADD PRIMARY KEY (`CarID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
