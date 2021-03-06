-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2017 a las 19:24:19
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shoeplaza`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`email`, `password`, `username`) VALUES
('admin@test.com', '123', 'Admin'),
('g@gmail.com', 'no', 'Gabriel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
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

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`CustomerID`, `Email`, `FirstName`, `LastName`, `Password`, `Shipping_Address`, `Billing_Address`, `Status`) VALUES
(1, '7878@test.com', '7878', '87878', '555555', '78787', '7878', 1),
(6, 'megatron690@hotmail.com', 'Kenneth', 'Velez', 'thisiscool', 'Puerto Rico | 00659 | Bayaney | En mi casa | En mi buzon', 'New York | 014523 | Long Island | En el carajo | En mi carajo', 1),
(7, 'fnkdskn@NJin', 'Mama', 'Papa', 'nknon', 'Florida | 156165 | bhbhub | uhjbnj | bhjb', 'Massachusets | 45645 | 4bhghu | guhjih | hjihj', 1),
(8, 'bjkb@Jkbj', 'fnkjnjkn', 'jnjj', 'kbjkbj', 'Texas | 5656 | jhihj | hjn | jkj', 'Massachusets | 1216 | 1bj | bhjbb | jb', 1),
(9, 'njknkj@njk', 'neklfnkeqn', 'njkn', 'mlml', 'Chicago | 4564 | bh | gbhjg | hjg', 'Florida | 456 | njhj | ghjg | hjg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer_credit_card`
--

CREATE TABLE `customer_credit_card` (
  `Credit_Card_ID` int(10) NOT NULL,
  `Number` varchar(25) COLLATE utf16_unicode_520_ci NOT NULL,
  `Name` varchar(75) COLLATE utf16_unicode_520_ci NOT NULL,
  `Exp_Date` varchar(25) COLLATE utf16_unicode_520_ci NOT NULL,
  `CVC` char(250) COLLATE utf16_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

--
-- Volcado de datos para la tabla `customer_credit_card`
--

INSERT INTO `customer_credit_card` (`Credit_Card_ID`, `Number`, `Name`, `Exp_Date`, `CVC`) VALUES
(1, '4891', '0', '0000-00-00', '3254'),
(2, '4894', 'Mami Papi Me ', '0000-00-00', '1456'),
(3, '1234', 'What the fuck', '03 / 19', '1234'),
(4, '1234 5678 9101 1121', 'Mi mama me mima', '03 / 19', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `has`
--

CREATE TABLE `has` (
  `CustomerID` int(10) NOT NULL,
  `OrderID` int(10) NOT NULL,
  `DateOrderMade` date NOT NULL,
  `Credit_Payment` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `has_a`
--

CREATE TABLE `has_a` (
  `CustomerID` int(10) NOT NULL,
  `Credit_Card_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_in`
--

CREATE TABLE `is_in` (
  `OrderID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `Price` float(5,2) NOT NULL,
  `Quantity` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `makes`
--

CREATE TABLE `makes` (
  `CompanyID` int(10) NOT NULL,
  `Tracking_Number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_`
--

CREATE TABLE `order_` (
  `OrderID` int(10) NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shipped_by`
--

CREATE TABLE `shipped_by` (
  `OrderID` int(10) NOT NULL,
  `CompanyID` int(10) NOT NULL,
  `Completed_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shipper`
--

CREATE TABLE `shipper` (
  `CompanyID` int(10) NOT NULL,
  `CompanyName` varchar(50) COLLATE utf16_unicode_520_ci NOT NULL,
  `Phone` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shipping`
--

CREATE TABLE `shipping` (
  `Shipping_Status` tinyint(1) NOT NULL,
  `Tracking_Number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shoe`
--

CREATE TABLE `shoe` (
  `ProductID` int(10) NOT NULL,
  `Brand` char(255) COLLATE utf16_unicode_520_ci NOT NULL,
  `Model` char(255) COLLATE utf16_unicode_520_ci NOT NULL,
  `Category` varchar(255) COLLATE utf16_unicode_520_ci NOT NULL,
  `Gender` char(1) COLLATE utf16_unicode_520_ci NOT NULL,
  `Size` int(10) NOT NULL,
  `Quantity_Stock` int(255) NOT NULL,
  `Price` float(5,2) NOT NULL,
  `img-source` varchar(255) COLLATE utf16_unicode_520_ci NOT NULL,
  `Details` varchar(255) COLLATE utf16_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

--
-- Volcado de datos para la tabla `shoe`
--

INSERT INTO `shoe` (`ProductID`, `Brand`, `Model`, `Category`, `Gender`, `Size`, `Quantity_Stock`, `Price`, `img-source`, `Details`) VALUES
(1, 'Rebook', 'classic', '0', 'M', 9, 10, 95.00, 'Images/men1.jpg', 'This is Great'),
(2, 'Rebook', 'Sport Edition', '0', 'M', 8, 10, 95.00, 'Images/men2.jpg', 'This i Great');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `CustomerID_2` (`CustomerID`,`Email`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `CustomerID_3` (`CustomerID`);

--
-- Indices de la tabla `customer_credit_card`
--
ALTER TABLE `customer_credit_card`
  ADD PRIMARY KEY (`Credit_Card_ID`);

--
-- Indices de la tabla `has`
--
ALTER TABLE `has`
  ADD PRIMARY KEY (`CustomerID`,`OrderID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indices de la tabla `has_a`
--
ALTER TABLE `has_a`
  ADD PRIMARY KEY (`CustomerID`,`Credit_Card_ID`),
  ADD KEY `Credit_Card_ID` (`Credit_Card_ID`);

--
-- Indices de la tabla `is_in`
--
ALTER TABLE `is_in`
  ADD PRIMARY KEY (`OrderID`,`ProductID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indices de la tabla `makes`
--
ALTER TABLE `makes`
  ADD PRIMARY KEY (`CompanyID`,`Tracking_Number`),
  ADD KEY `Tracking_Number` (`Tracking_Number`);

--
-- Indices de la tabla `order_`
--
ALTER TABLE `order_`
  ADD PRIMARY KEY (`OrderID`,`CustomerID`,`ProductID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indices de la tabla `shipped_by`
--
ALTER TABLE `shipped_by`
  ADD PRIMARY KEY (`OrderID`,`CompanyID`),
  ADD KEY `CompanyID` (`CompanyID`);

--
-- Indices de la tabla `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`CompanyID`);

--
-- Indices de la tabla `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`Tracking_Number`);

--
-- Indices de la tabla `shoe`
--
ALTER TABLE `shoe`
  ADD PRIMARY KEY (`ProductID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `customer_credit_card`
--
ALTER TABLE `customer_credit_card`
  MODIFY `Credit_Card_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `order_`
--
ALTER TABLE `order_`
  MODIFY `OrderID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `shoe`
--
ALTER TABLE `shoe`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `has`
--
ALTER TABLE `has`
  ADD CONSTRAINT `has_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE,
  ADD CONSTRAINT `has_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `order_` (`OrderID`) ON DELETE CASCADE;

--
-- Filtros para la tabla `has_a`
--
ALTER TABLE `has_a`
  ADD CONSTRAINT `has_a_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE,
  ADD CONSTRAINT `has_a_ibfk_2` FOREIGN KEY (`Credit_Card_ID`) REFERENCES `customer_credit_card` (`Credit_Card_ID`) ON DELETE CASCADE;

--
-- Filtros para la tabla `is_in`
--
ALTER TABLE `is_in`
  ADD CONSTRAINT `is_in_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `order_` (`OrderID`) ON DELETE CASCADE,
  ADD CONSTRAINT `is_in_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `shoe` (`ProductID`) ON DELETE CASCADE;

--
-- Filtros para la tabla `makes`
--
ALTER TABLE `makes`
  ADD CONSTRAINT `makes_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `shipper` (`CompanyID`) ON DELETE CASCADE,
  ADD CONSTRAINT `makes_ibfk_2` FOREIGN KEY (`Tracking_Number`) REFERENCES `shipping` (`Tracking_Number`) ON DELETE CASCADE;

--
-- Filtros para la tabla `shipped_by`
--
ALTER TABLE `shipped_by`
  ADD CONSTRAINT `shipped_by_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `order_` (`OrderID`) ON DELETE CASCADE,
  ADD CONSTRAINT `shipped_by_ibfk_2` FOREIGN KEY (`CompanyID`) REFERENCES `shipper` (`CompanyID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
