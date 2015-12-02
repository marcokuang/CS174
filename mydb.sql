-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2015 at 05:26 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ProjectTable`
--

CREATE TABLE IF NOT EXISTS `ProjectTable` (
  `ProjectID` int(11) NOT NULL,
  `ProjectName` varchar(200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ProjectTable`
--

INSERT INTO `ProjectTable` (`ProjectID`, `ProjectName`, `id`) VALUES
  (1, 'checkcheck', 1),
  (2, 'CS166 project 1', 2),
  (3, 'CS 174 Project 3', 3),
  (3, 'CS c174 Project 4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ProjectTodoTable`
--

CREATE TABLE IF NOT EXISTS `ProjectTodoTable` (
  `ProjectID` int(11) NOT NULL,
  `ProjectTodoID` int(11) NOT NULL,
  `TodoTitle` varchar(45) NOT NULL,
  `DueDate` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ProjectTodoTable`
--

INSERT INTO `ProjectTodoTable` (`ProjectID`, `ProjectTodoID`, `TodoTitle`, `DueDate`) VALUES
  (3, 1, 'Use PHP Prepared Statments', '2015-10-01 23:59:00'),
  (3, 2, 'Do Joins', '2015-10-01 23:59:00'),
  (3, 3, 'Add more Database Tables to your application', '2015-10-01 23:59:00'),
  (3, 4, 'Make all Tables in Second Form', '2015-10-01 23:59:00'),
  (3, 5, 'Generate Crow''s Feet ER Diagram from Database', '2015-10-01 23:59:00'),
  (3, 6, 'Add Primary Keys and Foreign Keys', '2015-10-01 23:59:00'),
  (2, 11, 'jklajsdf', NULL),
  (2, 12, 'hiuyo1203847', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `UserLoginTable`
--

CREATE TABLE IF NOT EXISTS `UserLoginTable` (
  `SJSUID` int(11) NOT NULL,
  `Password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `UserLoginTable`
--

INSERT INTO `UserLoginTable` (`SJSUID`, `Password`) VALUES
  (7417371, 'marco'),
  (7417372, 'erika'),
  (7417399, 'kk'),
  (9576970, 'luis'),
  (10508914, 'Tim'),
  (10694450, 'daniel');

-- --------------------------------------------------------

--
-- Table structure for table `UserTable`
--

CREATE TABLE IF NOT EXISTS `UserTable` (
  `SJSUID` int(11) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `UserTable`
--

INSERT INTO `UserTable` (`SJSUID`, `FirstName`, `LastName`) VALUES
  (7417371, 'Marco', 'Kuang'),
  (9576970, 'Luis', 'Schubert'),
  (10508914, 'Tim', 'Tim'),
  (10694450, 'Daniel', 'Nguyen'),
  (7417399, 'marco', 'k');

-- --------------------------------------------------------

--
-- Table structure for table `UserTodoTable`
--

CREATE TABLE IF NOT EXISTS `UserTodoTable` (
  `SJSUID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `UserTodoTable`
--

INSERT INTO `UserTodoTable` (`SJSUID`, `ProjectID`) VALUES
  (9576970, 3),
  (10694450, 1),
  (7417371, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ProjectTable`
--
ALTER TABLE `ProjectTable`
ADD PRIMARY KEY (`id`),
ADD KEY `index2` (`ProjectID`);

--
-- Indexes for table `ProjectTodoTable`
--
ALTER TABLE `ProjectTodoTable`
ADD KEY `index1` (`ProjectID`),
ADD KEY `index2` (`ProjectTodoID`);

--
-- Indexes for table `UserLoginTable`
--
ALTER TABLE `UserLoginTable`
ADD PRIMARY KEY (`SJSUID`);

--
-- Indexes for table `UserTable`
--
ALTER TABLE `UserTable`
ADD KEY `fk_UserTable_1` (`SJSUID`);

--
-- Indexes for table `UserTodoTable`
--
ALTER TABLE `UserTodoTable`
ADD KEY `index1` (`SJSUID`),
ADD KEY `index2` (`ProjectID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ProjectTodoTable`
--
ALTER TABLE `ProjectTodoTable`
MODIFY `ProjectTodoID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ProjectTodoTable`
--
ALTER TABLE `ProjectTodoTable`
ADD CONSTRAINT `fk_ProjectTodoTable_1` FOREIGN KEY (`ProjectID`) REFERENCES `ProjectTable` (`ProjectID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `UserTable`
--
ALTER TABLE `UserTable`
ADD CONSTRAINT `fk_UserTable_1` FOREIGN KEY (`SJSUID`) REFERENCES `UserLoginTable` (`SJSUID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `UserTodoTable`
--
ALTER TABLE `UserTodoTable`
ADD CONSTRAINT `fk_UserTodoTable_1` FOREIGN KEY (`SJSUID`) REFERENCES `UserTable` (`SJSUID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_UserTodoTable_3` FOREIGN KEY (`ProjectID`) REFERENCES `ProjectTable` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;