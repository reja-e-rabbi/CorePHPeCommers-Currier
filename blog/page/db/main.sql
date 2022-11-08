-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2020 at 09:25 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `main`
--
CREATE DATABASE IF NOT EXISTS `main` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE main;

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `Sl` int(11) NOT NULL,
  `Owners` tinytext DEFAULT NULL,
  `Dilog` text DEFAULT NULL,
  `Personal_sum` text DEFAULT NULL,
  `Personal_info` longtext DEFAULT NULL CHECK (json_valid(`Personal_info`)),
  `Phone` tinytext DEFAULT NULL,
  `Email` tinytext DEFAULT NULL,
  `Qualification` longtext DEFAULT NULL CHECK (json_valid(`Qualification`)),
  `Expert` longtext DEFAULT NULL CHECK (json_valid(`Expert`)),
  `addresses` text DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp()
) ;

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `SL` bigint(20) NOT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Exlpane` text DEFAULT NULL,
  `Entry` tinytext DEFAULT NULL,
  `EntryDates` timestamp NOT NULL DEFAULT current_timestamp(),
  `AddForm` varchar(32) DEFAULT 'unknow',
  `AddBy` varchar(32) DEFAULT 'unknow',
  `BudgetInfo` longtext DEFAULT NULL CHECK (json_valid(`BudgetInfo`)),
  `ID` tinytext DEFAULT NULL,
  `AcNo` tinytext DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `customerlog`
--

CREATE TABLE `customerlog` (
  `SL` bigint(20) NOT NULL,
  `ID` tinytext DEFAULT NULL,
  `Cname` tinytext DEFAULT NULL,
  `Contact` tinytext DEFAULT NULL,
  `Email` tinytext DEFAULT NULL,
  `loceation` tinytext DEFAULT NULL,
  `wish` text DEFAULT NULL,
  `Lastorder` longtext DEFAULT NULL CHECK (json_valid(`Lastorder`)),
  `JoinDate` timestamp NOT NULL DEFAULT current_timestamp()
) ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `sl` int(11) NOT NULL,
  `img` tinytext DEFAULT NULL,
  `id` tinytext DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp(),
  `coid` tinytext DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `SL` bigint(20) NOT NULL,
  `ID` tinytext DEFAULT NULL,
  `att` text DEFAULT NULL,
  `ltt` text DEFAULT NULL,
  `L_info` text DEFAULT NULL,
  `AddBy` longtext DEFAULT NULL CHECK (json_valid(`AddBy`)),
  `dates` timestamp NOT NULL DEFAULT current_timestamp(),
  `others` longtext DEFAULT NULL CHECK (json_valid(`others`)),
  `Country` tinytext DEFAULT NULL,
  `State` tinytext DEFAULT NULL,
  `users` tinytext DEFAULT NULL,
  `orders` tinytext DEFAULT NULL,
  `onLoceation` tinytext DEFAULT NULL,
  `SubState` tinytext DEFAULT NULL,
  `P_state` tinytext DEFAULT NULL,
  `s_rate` varchar(64) DEFAULT '1'
) ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `SL` bigint(20) NOT NULL,
  `img` text DEFAULT NULL,
  `proname` text DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `info` text DEFAULT NULL,
  `category` tinytext DEFAULT NULL,
  `subcategory` text DEFAULT NULL,
  `uploader` tinytext DEFAULT NULL,
  `email` tinytext DEFAULT NULL,
  `location` tinytext DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `localinfo` longtext DEFAULT NULL CHECK (json_valid(`localinfo`)),
  `seo` longtext DEFAULT NULL CHECK (json_valid(`seo`)),
  `facbook` longtext DEFAULT NULL CHECK (json_valid(`facbook`)),
  `contact` tinytext DEFAULT NULL,
  `totalview` int(11) DEFAULT NULL,
  `totalsels` int(11) DEFAULT NULL,
  `totalmoney` int(11) DEFAULT NULL,
  `producecost` int(11) DEFAULT NULL,
  `shopName` tinytext DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp(),
  `productID` tinytext DEFAULT NULL,
  `statuses` tinytext DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `State` varchar(45) DEFAULT NULL,
  `SubState` varchar(45) DEFAULT NULL,
  `P_state` varchar(45) DEFAULT NULL,
  `Activity` varchar(45) DEFAULT NULL,
  `DA` varchar(45) DEFAULT NULL,
  `coID` tinytext DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `Sl` int(11) NOT NULL,
  `Prj_name` tinytext DEFAULT NULL,
  `Prj_sum` text DEFAULT NULL,
  `Prj_status` tinytext DEFAULT NULL,
  `Prj_typ` tinytext DEFAULT NULL,
  `Prj_info` longtext DEFAULT NULL CHECK (json_valid(`Prj_info`)),
  `Cnt_n` tinytext DEFAULT NULL,
  `Cnt_p` tinytext DEFAULT NULL,
  `Cnt_em` tinytext DEFAULT NULL,
  `Cnt_info` tinytext DEFAULT NULL,
  `img` tinytext DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `Sl` int(11) NOT NULL,
  `Ser_name` tinytext DEFAULT NULL,
  `Ser_type` tinytext DEFAULT NULL,
  `Ser_info` tinytext DEFAULT NULL,
  `Summary` text DEFAULT NULL,
  `Img` tinytext DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `SL` bigint(20) NOT NULL,
  `FirstName` tinytext DEFAULT NULL,
  `LastName` tinytext DEFAULT NULL,
  `UserName` tinytext DEFAULT NULL,
  `ID` text DEFAULT NULL,
  `Pass` tinytext DEFAULT NULL,
  `BirthDate` tinytext DEFAULT NULL,
  `JoinDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Rolls` tinytext DEFAULT NULL,
  `Information` longtext DEFAULT NULL CHECK (json_valid(`Information`)),
  `email` varchar(100) NOT NULL DEFAULT 'unknow',
  `contact` text DEFAULT NULL,
  `AddBy` tinytext DEFAULT NULL,
  `activity` varchar(30) NOT NULL DEFAULT 'active',
  `State` tinytext DEFAULT NULL,
  `SubState` tinytext DEFAULT NULL,
  `P_state` tinytext DEFAULT NULL,
  `onLocation` tinytext DEFAULT NULL,
  `Country` tinytext DEFAULT NULL,
  `today` varchar(32) NOT NULL DEFAULT 'active',
  `selectType` tinytext DEFAULT NULL
) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`Sl`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`SL`);

--
-- Indexes for table `customerlog`
--
ALTER TABLE `customerlog`
  ADD PRIMARY KEY (`SL`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`SL`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`SL`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Sl`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`Sl`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`SL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `Sl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `SL` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customerlog`
--
ALTER TABLE `customerlog`
  MODIFY `SL` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `SL` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `SL` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `Sl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `Sl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `SL` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
