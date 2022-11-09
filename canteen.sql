-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 06:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(1, 'MUGISHA Alain', 'mugishaalainn@gmail.com', '0783143572', '12345', 'Active');

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
(3, 'Patrick', 'mutangana02@gmail.com', '0784636301', '12345', 'Active'),
(4, 'Marley', 'bob@gmail.com', '1290989', '054185', 'Activate');

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
(129003, 'shema shema2', 'shema@gmail.com', '0788759569', 'kicukiro', '127.0.0.1', 'unpaid'),
(400550, 'Alain MUGISHA', 'mugishaalainn@gmail.com', '0783143572', 'REMERA', '127.0.0.1', 'Paid'),
(929034, 'moses mutabazi', 'mutabazim35@gmail.com', '0786204000', 'kicukiro', '127.0.0.1', 'Paid');

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
(929034, 'Mozzarella Stick', 3000, 2, '127.0.0.1', '2022-10-18', 'Approved', 'Approved', 'Approved'),
(929034, 'bugger', 3000, 1, '127.0.0.1', '2022-10-18', 'Approved', 'Approved', 'Approved'),
(400550, 'Lobster Roll', 12000, 1, '127.0.0.1', '2022-10-24', 'pending', 'pending', 'pending'),
(400550, 'Crab Cake', 2500, 1, '127.0.0.1', '2022-10-24', 'pending', 'pending', 'pending'),
(533801, 'Caesar Selections', 2000, 1, '::1', '2022-10-24', 'pending', 'pending', 'pending'),
(952545, 'Crab Cake', 2500, 1, '::1', '2022-10-24', 'Approved', 'Approved', 'Approved'),
(952545, 'Caesar Selections', 2000, 1, '::1', '2022-10-24', 'Approved', 'Approved', 'Approved'),
(129003, 'Mozzarella Stick', 3000, 1, '127.0.0.1', '2022-11-07', 'pending', 'pending', 'pending'),
(129003, 'Lobster Roll', 12000, 1, '127.0.0.1', '2022-11-07', 'pending', 'pending', 'pending');

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
-- AUTO_INCREMENT for table `chef`
--
ALTER TABLE `chef`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
