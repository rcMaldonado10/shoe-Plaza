-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2017 at 04:12 AM
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
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
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
  `Shipping_Address` varchar(150) COLLATE utf16_unicode_520_ci NOT NULL,
  `Billing_Address` varchar(150) COLLATE utf16_unicode_520_ci NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `Email`, `Full_Name`, `Password`, `Shipping_Address`, `Billing_Address`, `Status`) VALUES
(1, 'yatio@hotmail.com', 'Yadiel Nieves Cardona', '1', 'Puerto Rico^|^00669^|^Lares^|^Lares^|^LARES', 'Puerto Rico^|^00659^|^Hatillos^|^Hatillos^|^Hatillos', 1),
(2, 'Pepe@gmail.com', 'Pepe la Variable', '1', 'Massachusets^|^00669^|^City1^|^Street1^|^Postal1', 'Puerto Rico^|^00659^|^City2^|^Street2^|^Postal2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_credit_card`
--

CREATE TABLE `customer_credit_card` (
  `Credit_Card_ID` int(10) NOT NULL,
  `Number` varchar(20) COLLATE utf16_unicode_520_ci NOT NULL,
  `Name` varchar(75) COLLATE utf16_unicode_520_ci NOT NULL,
  `Exp_Date` varchar(10) COLLATE utf16_unicode_520_ci NOT NULL,
  `CVC` char(5) COLLATE utf16_unicode_520_ci NOT NULL
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
  `hasID` int(10) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `OrderID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `has_a`
--

CREATE TABLE `has_a` (
  `CustomerID` int(11) NOT NULL,
  `Credit_Card_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_520_ci;

--
-- Dumping data for table `has_a`
--

INSERT INTO `has_a` (`CustomerID`, `Credit_Card_ID`) VALUES
(1, 1),
(2, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `is_in`
--

CREATE TABLE `is_in` (
  `is_in_ID` int(11) NOT NULL,
  `OrderID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `Quantity` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_`
--

CREATE TABLE `order_` (
  `OrderID` int(10) NOT NULL,
  `CompanyID` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `DateOrderMade` date NOT NULL,
  `Credit_Payment` int(2) NOT NULL
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
(1, 'Skechers', 'Classic', 'Casual', 'M', 7, 10, 95.00, 'Images/men1.jpg', 'This is Great'),
(2, 'Rebook', 'Sport Edition', 'Sport', 'M', 7, 10, 95.00, 'Images/men2.jpg', 'This i Great'),
(3, 'Nike', 'Sport Edition', 'Sport', 'F', 7, 10, 39.99, 'images/woman4.jpg', 'This shoe is great!'),
(4, 'Reebook', 'Reebook Fit', 'Sport', 'F', 7, 10, 39.99, 'images/woman1.jpg', 'This is Great'),
(5, 'Reebook', 'Reebook Fit', 'Sport', 'F', 7, 10, 39.99, 'images/woman2.jpg', 'This is Great'),
(6, 'Nike', 'Classic', 'Casual', 'M', 7, 10, 59.99, 'images/NikeMen1.jpg', 'This shoe is great !'),
(7, 'Fentacia', 'Roadster', 'Casual', 'M', 7, 10, 59.99, 'images/men7.jpg', 'This shoe is great lol!'),
(8, 'La Nouvelle Ãˆre', 'Feticci', 'Fashion', 'M', 7, 10, 49.99, 'images/la nouvelle Ã¨re-Feticci.jpg', 'High fashion for the moments of cache, made from the finest leather from Italy and hand made by designers from the Lamborghini team.'),
(9, 'Bostonian', 'Konian', 'Fashion', 'M', 7, 10, 89.99, 'images/Bostonian-Konian.jpg', 'Bostonian made from Boston, Massachusetts. Made from premium American leather because we are gonna make footwear great again!'),
(10, 'Sperry', 'Merry', 'Fashion', 'M', 7, 10, 99.99, 'images/Merry.jpg', 'Sperry is a brand recognized for their high quality products, nice felling leather, and their hand made manufacturing'),
(11, 'Maroon', 'Animal', 'Fashion', 'F', 7, 10, 99.99, 'images/Animal.jpg', 'Animals were not harmed from the making of these shoes, leather is real tho!'),
(12, 'Palma Alta', 'Estadidad', 'Fashion', 'F', 7, 10, 89.99, 'images/estadidad.jpg', 'This shoes will make Puerto Rico the state number 51 and will make the transition from smooth, even Ricky and JGO love them.'),
(13, 'Black', 'Soul', 'Fashion', 'F', 7, 10, 99.99, 'images/soul.jpg', 'From the greatest depression women has ever had came to mind a way to show fashion, from 13 reasons shoes.'),
(14, 'Mariela', 'Salmonela', 'Casual', 'F', 7, 10, 89.99, 'images/mariela.jpg', 'Mariela Salmonela are made from Puerto Rico, quality made and machined with precision.'),
(15, 'Angelinas', 'Cotton', 'Casual', 'F', 7, 10, 49.99, 'images/cotton.jpg', 'Cotton is the best way to describe this, because your feet will be comfortable like never before'),
(16, 'Square', 'Enix', 'Casual', 'F', 7, 10, 39.99, 'images/square.jpg', 'Confortable from the day you start wearing. Also they have squares ;)');

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
  ADD PRIMARY KEY (`hasID`,`CustomerID`,`OrderID`),
  ADD KEY `has_a_ibfk_1` (`CustomerID`),
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
  ADD PRIMARY KEY (`is_in_ID`,`OrderID`,`ProductID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `order_`
--
ALTER TABLE `order_`
  ADD PRIMARY KEY (`OrderID`,`CompanyID`),
  ADD UNIQUE KEY `OrderID` (`OrderID`);

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
-- AUTO_INCREMENT for table `has`
--
ALTER TABLE `has`
  MODIFY `hasID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `is_in`
--
ALTER TABLE `is_in`
  MODIFY `is_in_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_`
--
ALTER TABLE `order_`
  MODIFY `OrderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `shoe`
--
ALTER TABLE `shoe`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
  ADD CONSTRAINT `is_in_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `shoe` (`ProductID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
