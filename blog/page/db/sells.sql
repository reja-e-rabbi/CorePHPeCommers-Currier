-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2020 at 09:18 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sells`
--
CREATE DATABASE IF NOT EXISTS `sells` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE sells;

-- --------------------------------------------------------

--
-- Table structure for table `cpslinfo`
--

CREATE TABLE `cpslinfo` (
  `SL` int(11) NOT NULL,
  `img` tinytext DEFAULT NULL,
  `proName` text DEFAULT NULL,
  `PorID` tinytext DEFAULT NULL,
  `Coid` tinytext DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp(),
  `statuses` tinytext DEFAULT NULL,
  `slsID` tinytext DEFAULT NULL,
  `servicemanInfo` longtext DEFAULT NULL CHECK (json_valid(`servicemanInfo`)),
  `smID` tinytext DEFAULT NULL,
  `totalord` int(11) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `productsells`
--

CREATE TABLE `productsells` (
  `SL` int(10) UNSIGNED NOT NULL,
  `SelsID` text DEFAULT NULL,
  `ProductList` longtext DEFAULT NULL CHECK (json_valid(`ProductList`)),
  `TotalProduct` int(11) DEFAULT NULL,
  `CustomerInfo` longtext DEFAULT NULL CHECK (json_valid(`CustomerInfo`)),
  `PriceAppDetect` int(11) DEFAULT NULL,
  `PriceInsertCustomer` int(11) DEFAULT NULL,
  `PriceOperatorDetect` int(11) DEFAULT NULL,
  `PyamentOption` tinytext DEFAULT NULL,
  `PyamentTnxID` tinytext DEFAULT NULL,
  `OperatorName` tinytext DEFAULT NULL,
  `OperatorRulls` tinytext DEFAULT NULL,
  `CustomerInsertTime` tinytext DEFAULT NULL,
  `ServerInsertTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `ServiceManInsertTime` tinytext DEFAULT NULL,
  `OparatorInsertTime` tinytext DEFAULT NULL,
  `OrderStatus` tinytext DEFAULT NULL,
  `CoreareCharge` int(11) DEFAULT NULL,
  `AC` text DEFAULT NULL,
  `OperatorContact` varchar(20) DEFAULT NULL,
  `report` tinytext DEFAULT NULL,
  `ServiceManInfo` longtext DEFAULT NULL CHECK (json_valid(`ServiceManInfo`)),
  `completTime` tinytext DEFAULT NULL,
  `payStatus` tinytext DEFAULT NULL,
  `SMid` tinytext DEFAULT NULL,
  `priceInfo` longtext DEFAULT NULL CHECK (json_valid(`priceInfo`)),
  `area` text DEFAULT NULL,
  `OptInfo` longtext DEFAULT NULL CHECK (json_valid(`OptInfo`)),
  `optID` tinytext DEFAULT NULL,
  `P_state` tinytext DEFAULT NULL
) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cpslinfo`
--
ALTER TABLE `cpslinfo`
  ADD PRIMARY KEY (`SL`);

--
-- Indexes for table `productsells`
--
ALTER TABLE `productsells`
  ADD PRIMARY KEY (`SL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cpslinfo`
--
ALTER TABLE `cpslinfo`
  MODIFY `SL` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productsells`
--
ALTER TABLE `productsells`
  MODIFY `SL` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
