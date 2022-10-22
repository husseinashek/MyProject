-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2022 at 06:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delivery company`
--

-- --------------------------------------------------------

--
-- Table structure for table `address1`
--

CREATE TABLE `address1` (
  `region` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `street` varchar(30) NOT NULL,
  `invoice_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address1`
--

INSERT INTO `address1` (`region`, `city`, `street`, `invoice_no`) VALUES
('beirut', 'laylake', 'khomyne', 5),
('north', '', '', 0),
('beirut', 'laylake', 'khomyne', 6);

-- --------------------------------------------------------

--
-- Table structure for table `admin1`
--

CREATE TABLE `admin1` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin1`
--

INSERT INTO `admin1` (`username`, `password`) VALUES
('hussein@shek', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `full_name` varchar(20) NOT NULL,
  `primary_phone_number` varchar(10) NOT NULL,
  `secondary_phone_number` varchar(10) NOT NULL,
  `invoice_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`full_name`, `primary_phone_number`, `secondary_phone_number`, `invoice_ID`) VALUES
('haitham', '70127822', '', 5),
('husse', '70127823', '', 0),
('shams', '0392866', '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `salary` varchar(10) NOT NULL,
  `fullname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`username`, `password`, `role`, `salary`, `fullname`) VALUES
('abbas.q', '1234567', 'data entry', '100$', 'abbass'),
('ali', '1234567', 'call center', '200$', 'ali ali'),
('haitham333', '1234567', 'call center', '175$', 'haitham'),
('mhmd.k', '1234567', 'data entry', '150$', 'mhmd kam');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_number` int(11) NOT NULL,
  `invoice_charge` varchar(10) NOT NULL,
  `delivery_charge` varchar(10) NOT NULL,
  `note` text NOT NULL,
  `order_status` varchar(10) NOT NULL,
  `insert_date` date NOT NULL,
  `currency` varchar(10) NOT NULL,
  `currency1` varchar(10) NOT NULL,
  `breakable` tinyint(1) NOT NULL,
  `returnn` tinyint(1) NOT NULL,
  `supplier_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_number`, `invoice_charge`, `delivery_charge`, `note`, `order_status`, `insert_date`, `currency`, `currency1`, `breakable`, `returnn`, `supplier_name`) VALUES
(0, '0', '0', '', 'DELIVERED', '2022-09-24', 'LBP', 'LBP', 0, 0, 'hussein ashek'),
(5, '50000', '30000', '', 'NEW', '2022-09-24', 'LBP', 'LBP', 0, 0, 'hussein ashek'),
(6, '500000', '40000', '', 'NEW', '2022-09-25', 'LBP', 'LBP', 0, 0, 'hussein ashek');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `full_name` varchar(20) NOT NULL,
  `primary_phone_number` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `region` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `street` varchar(20) NOT NULL,
  `order_nb` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`full_name`, `primary_phone_number`, `username`, `password`, `region`, `city`, `street`, `order_nb`) VALUES
('hussein ashek', '70862018', 'hussein.ashek', '1234567', 'beirut', 'laylake', 'khomyne', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`) VALUES
('mohammadashek@hotmail.com', '11111111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address1`
--
ALTER TABLE `address1`
  ADD KEY `invoice_no` (`invoice_no`);

--
-- Indexes for table `admin1`
--
ALTER TABLE `admin1`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD KEY `invoice_ID` (`invoice_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_number`),
  ADD KEY `supplier_name` (`supplier_name`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `full_name` (`full_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address1`
--
ALTER TABLE `address1`
  ADD CONSTRAINT `address1_ibfk_1` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`invoice_ID`) REFERENCES `invoice` (`invoice_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`supplier_name`) REFERENCES `supplier` (`full_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
