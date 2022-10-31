-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 05:25 PM
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
('beirut', 'laylake', 'khomyne', 6),
('beirut', 'laylake', 'khomyne', 9),
('beirut', 'laylake', 'khomyne', 4),
('bekaa', 'kdkd', 'sadd', 10),
('south', 'kabs', 'lioo', 12);

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
  `full_name1` varchar(20) NOT NULL,
  `primary_phone_number` varchar(10) NOT NULL,
  `secondary_phone_number` varchar(10) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `supp_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`full_name1`, `primary_phone_number`, `secondary_phone_number`, `invoice_id`, `supp_name`) VALUES
('husse', '70127823', '', 0, 'hussein ashek'),
('mhmid', '28908888', '', 4, 'jaafar k'),
('haitham', '70127822', '', 5, 'hussein ashek'),
('shams', '0392866', '', 6, 'hussein ashek'),
('karim', '39227333', '', 9, 'jaafar k'),
('mmmmm', '39227355', '', 10, 'jaafar k'),
('samar', '702707041', '', 12, 'hussein ashek');

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
('hsn@daw', '1234567', 'call center', '130$', 'hsn'),
('karim@1', '1234567', 'call center', '175$', 'karimz'),
('mhmd.k', '1234567', 'data entry', '150$', 'mhmd kam'),
('samirr@', '1234567', 'data entry', '100$', 'samir'),
('zaher.a', '1234567', 'call center', '100$', 'zaher');

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
(0, '0', '0', 'delayed by customer', 'DELAYED', '2022-09-24', 'LBP', 'LBP', 0, 0, 'hussein ashek'),
(4, '40000', '10000', '', 'NEW', '2022-10-24', 'LBP', 'LBP', 0, 0, 'jaafar k'),
(5, '50000', '30000', '', 'DELIVERED', '2022-09-24', 'LBP', 'LBP', 0, 0, 'hussein ashek'),
(6, '500000', '40000', '', 'NEW', '2022-09-25', 'LBP', 'LBP', 0, 0, 'hussein ashek'),
(9, '800000', '20000', '', 'CANCELED', '2022-10-24', 'LBP', 'LBP', 0, 0, 'jaafar k'),
(10, '299999', '50000', '', 'NEW', '2022-10-30', 'LBP', 'LBP', 0, 0, 'jaafar k'),
(12, '100000', '8000', '', 'NEW', '2022-10-30', 'LBP', 'LBP', 0, 0, 'hussein ashek');

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
  `street` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`full_name`, `primary_phone_number`, `username`, `password`, `region`, `city`, `street`) VALUES
('hussein ashek', '70862018', 'hussein.ashek', '1234567', 'beirut', 'laylake', 'khomyne'),
('jaafar k', '34234311', 'jaafar.k', '1234567', 'Beirut', 'laylake', 'khomyne');

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
('hsn.shms22@gmail.com', '1111111'),
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
  ADD UNIQUE KEY `invoice_id` (`invoice_id`),
  ADD KEY `supp_name_2` (`supp_name`);

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
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`invoice_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`supp_name`) REFERENCES `supplier` (`full_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`supplier_name`) REFERENCES `supplier` (`full_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
