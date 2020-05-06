-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 06, 2020 at 05:28 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `ID` int(11) NOT NULL,
  `Firstname` varchar(250) NOT NULL,
  `Lastname` varchar(250) NOT NULL,
  `Gender` varchar(30) DEFAULT NULL,
  `Address` text,
  `TelNumber` varchar(30) DEFAULT NULL,
  `City` varchar(250) DEFAULT NULL,
  `PostalCode` varchar(30) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`ID`, `Firstname`, `Lastname`, `Gender`, `Address`, `TelNumber`, `City`, `PostalCode`, `Country`) VALUES
(128, 'Silene', 'Oliveira', 'Female', '5012  Edgewood Avenue', '540344', 'Tokyo', '1234', 'Japan'),
(129, 'Sergio', 'Marquina', 'Male', '92 High St, Wick, KW1 4LY', '01934', 'Madrid', '843', 'Spain'),
(130, 'Raquel', 'Murillo', 'Female', '124 NT ADF', '', 'Lisbon', '5343', 'Portugal'),
(127, 'Leslie', 'Canete', 'Female', 'Bohol', '09177127377', 'Tagbilaran City', '6300', 'Philippines');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
