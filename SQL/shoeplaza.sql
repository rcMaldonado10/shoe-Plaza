-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2017 at 02:24 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoeplaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(10) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `username` varchar(35) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `email`, `password`, `username`) VALUES
(1, 'admin@test.com', '123', 'Admin'),
(2, 'Idk@idc.com', 'ok', 'Yatio');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `Email` varchar(30) COLLATE utf16_unicode_520_ci NOT NULL,
  `Full_Name` varchar(60) COLLATE utf16_unicode_520_ci NOT NULL,
  `Password` varchar(25) COLLATE utf16_unicode_520_ci NOT NULL,
  `Shipping_Address` varchar(255) COLLATE utf16_unicode_520_ci NOT NULL,
  `Billing_Address` varchar(255) COLLATE utf16_unicode_520_ci NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `Email`, `Full_Name`, `Password`, `Shipping_Address`, `Billing_Address`, `Status`) VALUES
(1, 'yatio@hotmail.com', 'Yadiel Nieves Cardona', 'pepe', 'Puerto Rico^|^00669^|^Lares^|^Lares^|^LARES', 'Puerto Rico^|^00659^|^Hatillos^|^Hatillos^|^Hatillos', 1),
(2, 'Pepe@gmail.com', 'Pepe La Variable', 'pepepepe', 'Massachusets^|^00669^|^City1^|^Street1^|^Postal1', 'Puerto Rico^|^00659^|^City2^|^Street2^|^Postal2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_credit_card`
--

CREATE TABLE `customer_credit_card` (
  `Credit_Card_ID` int(10) NOT NULL,
  `Number` varchar(20) COLLATE utf16_unicode_520_ci NOT NULL,
  `Name` varchar(75) COLLATE utf16_unicode_520_ci NOT NULL,
  `Exp_Date` varchar(10) COLLATE utf16_unicode_520_ci NOT NULL,
  `CVC` char(250) COLLATE utf16_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

--
-- Dumping data for table `customer_credit_card`
--

INSERT INTO `customer_credit_card` (`Credit_Card_ID`, `Number`, `Name`, `Exp_Date`, `CVC`) VALUES
(1, '1234 5678 9123 4567', 'Yadiel Nieves Cardona', '2023-06', '1234'),
(2, '1234 5678 9123 4567', 'Pepe La Variable', '2027-05', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `has`
--

CREATE TABLE `has` (
  `CustomerID` int(10) NOT NULL,
  `OrderID` int(10) NOT NULL,
  `DateOrderMade` date NOT NULL,
  `Credit_Payment` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `has_a`
--

CREATE TABLE `has_a` (
  `Credit_Card_ID` int(10) NOT NULL,
  `CustomerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_520_ci;

--
-- Dumping data for table `has_a`
--

INSERT INTO `has_a` (`Credit_Card_ID`, `CustomerID`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `is_in`
--

CREATE TABLE `is_in` (
  `OrderID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `Price` float(5,2) NOT NULL,
  `Quantity` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_`
--

CREATE TABLE `order_` (
  `OrderID` int(10) NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipper`
--

CREATE TABLE `shipper` (
  `OrderID` int(10) NOT NULL,
  `CompanyID` int(10) NOT NULL,
  `CompanyName` varchar(50) COLLATE utf16_unicode_520_ci NOT NULL,
  `Completed_Date` date NOT NULL,
  `Tracking_Number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shoe`
--

CREATE TABLE `shoe` (
  `ProductID` int(10) NOT NULL,
  `Brand` char(25) COLLATE utf16_unicode_520_ci NOT NULL,
  `Model` char(25) COLLATE utf16_unicode_520_ci NOT NULL,
  `Category` varchar(25) COLLATE utf16_unicode_520_ci NOT NULL,
  `Gender` char(1) COLLATE utf16_unicode_520_ci NOT NULL,
  `Size` int(10) NOT NULL,
  `Quantity_Stock` int(75) NOT NULL,
  `Price` float(5,2) NOT NULL,
  `img-source` varchar(255) COLLATE utf16_unicode_520_ci NOT NULL,
  `Details` varchar(255) COLLATE utf16_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

--
-- Dumping data for table `shoe`
--

INSERT INTO `shoe` (`ProductID`, `Brand`, `Model`, `Category`, `Gender`, `Size`, `Quantity_Stock`, `Price`, `img-source`, `Details`) VALUES
(1, 'Rebook', 'Classic', 'Casual', 'M', 7, 10, 95.00, 'Images/men1.jpg', 'This is Great'),
(2, 'Rebook', 'Sport Edition', 'Deportivo', 'M', 7, 10, 95.00, 'Images/men2.jpg', 'This i Great'),
(3, 'Nike', 'Sport Edition', 'Deportivo', 'F', 7, 10, 39.99, 'images/woman4.jpg', 'This shoe is great!'),
(4, 'Reebook', 'Reebook Fit', 'Sport', 'F', 6, 10, 39.99, 'images/woman1.jpg', 'This is Great'),
(5, 'Reebook', 'Reebook Fit', 'Sport', 'F', 7, 10, 39.99, 'images/woman2.jpg', 'This is Great'),
(6, 'Nike', 'Classic', 'Casual', 'M', 7, 10, 59.99, 'images/NikeMen1.jpg', 'This shoe is great !'),
(7, 'Fentacia', 'Roadster', 'Casual', 'M', 7, 10, 59.99, 'images/men7.jpg', 'This shoe is great lol!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `AdminID` (`AdminID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `CustomerID_2` (`CustomerID`,`Email`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `CustomerID_3` (`CustomerID`);

--
-- Indexes for table `customer_credit_card`
--
ALTER TABLE `customer_credit_card`
  ADD PRIMARY KEY (`Credit_Card_ID`);

--
-- Indexes for table `has`
--
ALTER TABLE `has`
  ADD PRIMARY KEY (`CustomerID`,`OrderID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `has_a`
--
ALTER TABLE `has_a`
  ADD PRIMARY KEY (`Credit_Card_ID`,`CustomerID`),
  ADD KEY `has_a_ibfk_3` (`CustomerID`);

--
-- Indexes for table `is_in`
--
ALTER TABLE `is_in`
  ADD PRIMARY KEY (`OrderID`,`ProductID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `order_`
--
ALTER TABLE `order_`
  ADD PRIMARY KEY (`OrderID`,`CustomerID`,`ProductID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`OrderID`,`CompanyID`),
  ADD KEY `CompanyID` (`CompanyID`);

--
-- Indexes for table `shoe`
--
ALTER TABLE `shoe`
  ADD PRIMARY KEY (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_credit_card`
--
ALTER TABLE `customer_credit_card`
  MODIFY `Credit_Card_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_`
--
ALTER TABLE `order_`
  MODIFY `OrderID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shoe`
--
ALTER TABLE `shoe`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `has`
--
ALTER TABLE `has`
  ADD CONSTRAINT `has_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE,
  ADD CONSTRAINT `has_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `order_` (`OrderID`) ON DELETE CASCADE;

--
-- Constraints for table `has_a`
--
ALTER TABLE `has_a`
  ADD CONSTRAINT `has_a_ibfk_2` FOREIGN KEY (`Credit_Card_ID`) REFERENCES `customer_credit_card` (`Credit_Card_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `has_a_ibfk_3` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE;

--
-- Constraints for table `is_in`
--
ALTER TABLE `is_in`
  ADD CONSTRAINT `is_in_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `order_` (`OrderID`) ON DELETE CASCADE,
  ADD CONSTRAINT `is_in_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `shoe` (`ProductID`) ON DELETE CASCADE;

--
-- Constraints for table `shipper`
--
ALTER TABLE `shipper`
  ADD CONSTRAINT `shipper_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `order_` (`OrderID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
