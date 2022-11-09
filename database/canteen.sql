-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 02:51 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bkid` int(11) NOT NULL,
  `cname` text NOT NULL,
  `email` varchar(58) NOT NULL,
  `phone` varchar(23) NOT NULL,
  `bdate` varchar(25) NOT NULL,
  `bktime` varchar(25) NOT NULL,
  `npeop` int(11) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chef`
--

CREATE TABLE `chef` (
  `cid` int(11) NOT NULL,
  `names` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chef`
--

INSERT INTO `chef` (`cid`, `names`, `email`, `phone`, `password`, `status`) VALUES
(1, 'Mutabazi Moses', 'mutabazim35@gmail.com', '0786204000', '205690', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `mid` int(11) NOT NULL,
  `names` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(24) NOT NULL,
  `password` varchar(35) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`mid`, `names`, `email`, `phone`, `password`, `status`) VALUES
(1, 'Mutabazi Moses', 'mosesmutabazi78@gmail.com', '0786204000', '320809', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `orderid` int(11) NOT NULL,
  `names` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `location` varchar(90) NOT NULL,
  `address` varchar(20) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_manager`
--

INSERT INTO `order_manager` (`orderid`, `names`, `phone`, `email`, `location`, `address`, `status`) VALUES
(53815, 'Mutabazi Moses', 'mutabazim35@gmail.com', '0786204000', 'musanze', '127.0.0.1', 'Paid'),
(356700, 'kiki keza', 'kigali.ac@gmail.com', '0722952585', 'kigali', '::1', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `category` varchar(15) NOT NULL,
  `pname` varchar(26) NOT NULL,
  `price` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `category`, `pname`, `price`, `comment`, `photo`) VALUES
(3, 'Starters', 'Lobster Bisque', 2000, 'Lorem, deren, trataro, filede, nerada\r\n', 'lobster-bisque.jpg'),
(4, 'Starters', 'Crab Cake', 2500, 'A delicate crab cake served on a toasted roll with lettuce and tartar sauce', 'cake.jpg'),
(6, 'Starters', 'Mozzarella Stick', 3000, 'Lorem, deren, trataro, filede, nerada', 'mozzarella.jpg'),
(7, 'Salads', 'Caesar Selections', 2000, 'Lorem, deren, trataro, filede, nerada', 'caesar.jpg'),
(8, 'Specialty', 'Lobster Roll', 12000, 'Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll', 'lobster-roll.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `orderid` int(11) NOT NULL,
  `itm_name` text NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `address` varchar(20) NOT NULL,
  `odate` varchar(25) NOT NULL,
  `status` text NOT NULL,
  `stat` text NOT NULL,
  `status2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`orderid`, `itm_name`, `price`, `qty`, `address`, `odate`, `status`, `stat`, `status2`) VALUES
(53815, 'Lobster Bisque', 2000, 1, '127.0.0.1', '2022-08-15', 'pending', 'pending', 'pending'),
(356700, 'Lobster Bisque', 2000, 2, '::1', '2022-08-15', 'Received', 'Approved', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `waiter`
--

CREATE TABLE `waiter` (
  `wid` int(11) NOT NULL,
  `names` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(35) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waiter`
--

INSERT INTO `waiter` (`wid`, `names`, `email`, `phone`, `password`, `status`) VALUES
(0, 'Mutabazi Moses', 'mutabazim35@gmail.com', '0786204000', '697034', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bkid`);

--
-- Indexes for table `chef`
--
ALTER TABLE `chef`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bkid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chef`
--
ALTER TABLE `chef`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
