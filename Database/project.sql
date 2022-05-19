-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2021 at 09:03 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_req`
--

CREATE TABLE `admin_req` (
  `uid` int(11) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dummy_data`
--

CREATE TABLE `dummy_data` (
  `stock_name` varchar(25) NOT NULL,
  `c_price` float NOT NULL,
  `inc_dec` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dummy_data`
--

INSERT INTO `dummy_data` (`stock_name`, `c_price`, `inc_dec`) VALUES
('3M India', 2146.9, -41.05),
('ABB Power', 2280.45, -158.45),
('Adani Transmission', 1869.9, 121.7),
('APL Apollo Tube', 760.55, -55.9),
('Blue Star', 922.6, 2.5),
('Dixon Tech', 4831.2, -280.85),
('Federal Bank', 102.5, 7.2),
('HDFC ', 2896.15, 84.65),
('ICICI Bank', 841.7, 96.25),
('Indian Bank', 187.7, 16.25),
('Indian Oil Corp.', 130.45, -0.25),
('IRB Infra Dev.', 278.25, 66.4),
('IRCTC', 4022.35, -600.2),
('Jubilant Ingrevia Ltd.', 640.25, -37.2),
('Kotak Bank', 2154.5, 142.9),
('L&T Infotech', 6411.45, 505.6),
('Mahindra CIE', 279.1, 15),
('Metropolis Helath', 2799.3, 99.45),
('P&G', 1501.5, 443.35),
('Rites', 284.9, -24.1),
('Sanofi India', 8271.15, 19.4),
('SBI', 510.5, 4),
('Sundaram Finance', 3732.15, 11.35),
('TTK Prestige', 9236.75, 414.1);

-- --------------------------------------------------------

--
-- Table structure for table `holdings`
--

CREATE TABLE `holdings` (
  `uid` int(10) NOT NULL,
  `stock_name` varchar(25) NOT NULL,
  `qty` int(10) NOT NULL,
  `cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `holdings`
--

INSERT INTO `holdings` (`uid`, `stock_name`, `qty`, `cost`) VALUES
(1, 'Kotak Bank', 10, 21545),
(8, '3M India', 1, 2440.7);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `uid` int(10) NOT NULL,
  `stock_name` varchar(25) NOT NULL,
  `qty` int(10) NOT NULL,
  `avg_s_price` float NOT NULL,
  `avg_b_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`uid`, `stock_name`, `qty`, `avg_s_price`, `avg_b_price`) VALUES
(8, '3M India', 12, 24134.7, 6870.06);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `uid` int(10) NOT NULL,
  `stock_name` varchar(25) NOT NULL,
  `qty` int(10) NOT NULL,
  `buy_sell` char(1) NOT NULL,
  `avg_price` float NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`uid`, `stock_name`, `qty`, `buy_sell`, `avg_price`, `date`, `time`) VALUES
(1, 'Kotak Bank', 10, 'B', 21545, '2021-10-28', '11:41:20'),
(8, '3M India', 10, 'B', 261469, '2021-10-25', '07:28:48'),
(8, '3M India', 1, 'B', 26146.9, '2021-10-27', '11:36:35'),
(8, '3M India', 10, 'S', 261469, '2021-10-25', '07:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `Password` varchar(25) NOT NULL,
  `gender` char(1) NOT NULL,
  `pnumber` bigint(225) NOT NULL,
  `email` varchar(25) NOT NULL,
  `money` bigint(225) NOT NULL,
  `is_admin` varchar(3) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `dob`, `Password`, `gender`, `pnumber`, `email`, `money`, `is_admin`) VALUES
(1, 'vedant', '2021-10-05', 'asdf', 'M', 8085836022, 'vedantjain1008@gmail.com', 78455, 'YES'),
(8, 'Vedant Jain', '2003-03-11', 'ASDF', 'M', 8085836022, 'vedantjain35@gmail.com', 2147483647, 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `uid` int(10) NOT NULL,
  `stock_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`uid`, `stock_name`) VALUES
(1, 'ABB Power'),
(1, 'Kotak Bank'),
(8, '3M India'),
(8, 'ABB Power'),
(8, 'Adani Transmission'),
(8, 'APL Apollo Tube'),
(8, 'Blue Star'),
(8, 'Dixon Tech'),
(8, 'Federal Bank'),
(8, 'HDFC '),
(8, 'ICICI Bank'),
(8, 'Indian Oil Corp.'),
(8, 'IRB Infra Dev.'),
(8, 'Kotak Bank'),
(8, 'Metropolis Helath');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_req`
--
ALTER TABLE `admin_req`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `uid` (`uid`,`email`);

--
-- Indexes for table `dummy_data`
--
ALTER TABLE `dummy_data`
  ADD PRIMARY KEY (`stock_name`) USING BTREE;

--
-- Indexes for table `holdings`
--
ALTER TABLE `holdings`
  ADD PRIMARY KEY (`uid`,`stock_name`),
  ADD KEY `stock_name` (`stock_name`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`uid`,`stock_name`),
  ADD KEY `stock_name` (`stock_name`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`uid`,`stock_name`,`buy_sell`,`date`,`time`),
  ADD KEY `stock_name` (`stock_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`,`email`) USING BTREE;

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`uid`,`stock_name`),
  ADD KEY `stock_name` (`stock_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_req`
--
ALTER TABLE `admin_req`
  ADD CONSTRAINT `admin_req_ibfk_1` FOREIGN KEY (`uid`,`email`) REFERENCES `users` (`uid`, `email`);

--
-- Constraints for table `holdings`
--
ALTER TABLE `holdings`
  ADD CONSTRAINT `holdings_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `holdings_ibfk_2` FOREIGN KEY (`stock_name`) REFERENCES `dummy_data` (`stock_name`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`stock_name`) REFERENCES `dummy_data` (`stock_name`);

--
-- Constraints for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD CONSTRAINT `transaction_history_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `transaction_history_ibfk_2` FOREIGN KEY (`stock_name`) REFERENCES `dummy_data` (`stock_name`);

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `watchlist_ibfk_2` FOREIGN KEY (`stock_name`) REFERENCES `dummy_data` (`stock_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
