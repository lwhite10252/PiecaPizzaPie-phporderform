-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2016 at 12:31 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leanne_white_pizzastore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomers`
--

CREATE TABLE `tblcustomers` (
  `email` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `postalcode` varchar(6) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcustomers`
--

INSERT INTO `tblcustomers` (`email`, `firstname`, `lastname`, `address`, `city`, `province`, `postalcode`, `phone`) VALUES
('betsybadass@gmail.com', 'Betsy', 'Mailuv', '1020 Limberlost Rd', 'London', 'Ontario', 'N7G3L9', '5198728918'),
('runaway_kitty666@hotmail.com', 'Katie', 'Burns', '1250 Brunswick Ave', 'London', 'Ontario', 'N8G3L8', '5198729037'),
('100yearsrickandmorty@home.com', 'Rick', 'Sanchez', '1730 Areal St', 'Hamilton', 'Ontario', 'M3H6J7', '5199330278'),
('raymondhaggerty@gmail.com', 'Raymond', 'Haggerty', '345 Saskatoon St', 'London', 'Ontario', 'N5W4R3', '5199336024');

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `orderID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorders`
--

INSERT INTO `tblorders` (`orderID`, `email`, `date`) VALUES
(78, 'raymondhaggerty@gmail.com', '12.06.16 12:20:18'),
(77, '100yearsrickandmorty@home.com', '12.06.16 12:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `tblpizza`
--

CREATE TABLE `tblpizza` (
  `pizzaID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `dough` varchar(30) DEFAULT NULL,
  `cheese` varchar(30) DEFAULT NULL,
  `sauce` varchar(30) DEFAULT NULL,
  `toppings` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpizza`
--

INSERT INTO `tblpizza` (`pizzaID`, `orderID`, `size`, `dough`, `cheese`, `sauce`, `toppings`) VALUES
(30, 0, 'Extra Large', 'Whole Grain', 'Four Cheese Base', 'Siracha Marinara', 'Mushrooms, GreenÂ Olives, Pepperoni, ItalianÂ Sausage'),
(29, 0, 'Large', 'Regular', 'Mozzarella', 'Siracha Marinara', 'GreenÂ Olives, RoastedÂ Garlic, SirachaÂ Chicken');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `tblpizza`
--
ALTER TABLE `tblpizza`
  ADD PRIMARY KEY (`pizzaID`),
  ADD KEY `orderID` (`orderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblorders`
--
ALTER TABLE `tblorders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `tblpizza`
--
ALTER TABLE `tblpizza`
  MODIFY `pizzaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
