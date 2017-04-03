--
-- Database: `shoeplaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `Email` varchar(30) COLLATE utf16_unicode_520_ci NOT NULL,
  `FirstName` varchar(25) COLLATE utf16_unicode_520_ci NOT NULL,
  `LastName` varchar(25) COLLATE utf16_unicode_520_ci NOT NULL,
  `Password` varchar(25) COLLATE utf16_unicode_520_ci NOT NULL,
  `Shipping_Address` varchar(255) COLLATE utf16_unicode_520_ci NOT NULL,
  `Billing_Address` varchar(255) COLLATE utf16_unicode_520_ci NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_credit_card`
--

CREATE TABLE `customer_credit_card` (
  `Credit_Card_ID` int(10) NOT NULL,
  `Number` int(25) NOT NULL,
  `Name` int(75) NOT NULL,
  `Exp_Date` date NOT NULL,
  `CVC` char(250) COLLATE utf16_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

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
  `CustomerID` int(10) NOT NULL,
  `Credit_Card_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

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
-- Table structure for table `makes`
--

CREATE TABLE `makes` (
  `CompanyID` int(10) NOT NULL,
  `Tracking_Number` int(10) NOT NULL
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
-- Table structure for table `shipped_by`
--

CREATE TABLE `shipped_by` (
  `OrderID` int(10) NOT NULL,
  `CompanyID` int(10) NOT NULL,
  `Completed_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipper`
--

CREATE TABLE `shipper` (
  `CompanyID` int(10) NOT NULL,
  `CompanyName` varchar(50) COLLATE utf16_unicode_520_ci NOT NULL,
  `Phone` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `Shipping_Status` tinyint(1) NOT NULL,
  `Tracking_Number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shoe`
--

CREATE TABLE `shoe` (
  `ProductID` int(10) NOT NULL,
  `Brand` char(255) COLLATE utf16_unicode_520_ci NOT NULL,
  `Model` char(255) COLLATE utf16_unicode_520_ci NOT NULL,
  `Gender` char(1) COLLATE utf16_unicode_520_ci NOT NULL,
  `Size` int(1) NOT NULL,
  `Quantity_Stock` int(255) NOT NULL,
  `Price` float(5,2) NOT NULL,
  `img-source` varchar(255) COLLATE utf16_unicode_520_ci NOT NULL,
  `Details` varchar(255) COLLATE utf16_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`CustomerID`,`Credit_Card_ID`),
  ADD KEY `Credit_Card_ID` (`Credit_Card_ID`);

--
-- Indexes for table `is_in`
--
ALTER TABLE `is_in`
  ADD PRIMARY KEY (`OrderID`,`ProductID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `makes`
--
ALTER TABLE `makes`
  ADD PRIMARY KEY (`CompanyID`,`Tracking_Number`),
  ADD KEY `Tracking_Number` (`Tracking_Number`);

--
-- Indexes for table `order_`
--
ALTER TABLE `order_`
  ADD PRIMARY KEY (`OrderID`,`CustomerID`,`ProductID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `shipped_by`
--
ALTER TABLE `shipped_by`
  ADD PRIMARY KEY (`OrderID`,`CompanyID`),
  ADD KEY `CompanyID` (`CompanyID`);

--
-- Indexes for table `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`CompanyID`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`Tracking_Number`);

--
-- Indexes for table `shoe`
--
ALTER TABLE `shoe`
  ADD PRIMARY KEY (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_credit_card`
--
ALTER TABLE `customer_credit_card`
  MODIFY `Credit_Card_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_`
--
ALTER TABLE `order_`
  MODIFY `OrderID` int(10) NOT NULL AUTO_INCREMENT;
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
  ADD CONSTRAINT `has_a_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE,
  ADD CONSTRAINT `has_a_ibfk_2` FOREIGN KEY (`Credit_Card_ID`) REFERENCES `customer_credit_card` (`Credit_Card_ID`) ON DELETE CASCADE;

--
-- Constraints for table `is_in`
--
ALTER TABLE `is_in`
  ADD CONSTRAINT `is_in_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `order_` (`OrderID`) ON DELETE CASCADE,
  ADD CONSTRAINT `is_in_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `shoe` (`ProductID`) ON DELETE CASCADE;

--
-- Constraints for table `makes`
--
ALTER TABLE `makes`
  ADD CONSTRAINT `makes_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `shipper` (`CompanyID`) ON DELETE CASCADE,
  ADD CONSTRAINT `makes_ibfk_2` FOREIGN KEY (`Tracking_Number`) REFERENCES `shipping` (`Tracking_Number`) ON DELETE CASCADE;

--
-- Constraints for table `shipped_by`
--
ALTER TABLE `shipped_by`
  ADD CONSTRAINT `shipped_by_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `order_` (`OrderID`) ON DELETE CASCADE,
  ADD CONSTRAINT `shipped_by_ibfk_2` FOREIGN KEY (`CompanyID`) REFERENCES `shipper` (`CompanyID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
