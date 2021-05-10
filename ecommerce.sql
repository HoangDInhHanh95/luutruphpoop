-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2020 at 12:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cateid` int(11) NOT NULL,
  `categoryname` varchar(150) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cateid`, `categoryname`, `description`) VALUES
(1, 'Điện Thoại', 'ĐT'),
(2, 'Máy Tính Bảng', 'MTB'),
(3, 'Laptop', 'LT');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orderproduct`
--

CREATE TABLE `orderproduct` (
  `orderid` int(11) NOT NULL,
  `orderdate` datetime NOT NULL,
  `shipdate` datetime NOT NULL,
  `shipname` varchar(150) NOT NULL,
  `shipaddress` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `productname` varchar(150) DEFAULT NULL,
  `cateid` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `productname`, `cateid`, `price`, `quantity`, `description`, `picture`) VALUES
(62, 'laptopcx61', 3, 20, 1, '', 'uploads/202010045813laptopcx61.jpg'),
(65, 'laptopidead', 3, 20, 23, '', 'uploads/202010050037laptopidead.jpg'),
(66, 'laptopwin10', 3, 20, 2, '', 'uploads/202010050125laptopwin10.jpg'),
(67, 'latopi7', 3, 20, 3, '', 'uploads/202010050217latopi7.jpg'),
(68, 'dienthoai', 1, 5, 45, '', 'uploads/202010050655dienthoai.jpg'),
(69, 'Relmec3', 1, 5, 45, '', 'uploads/202010050933Realmec3.jpg'),
(70, 'Realmes5', 1, 5, 3, '', 'uploads/202010051038realme5s.jpg'),
(71, 'máytinhsamsung', 2, 20, 45, '', 'uploads/202010051132maytinhsam.jpg'),
(72, 'hawei', 2, 5, 45, '', 'uploads/202010051159huawei.jpg'),
(73, 'máy tính bảng samsung', 2, 6, 2, '', 'uploads/202010071105maytinhsam.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(10) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `password`) VALUES
(0, '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(0, '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(0, 'hoang dinh hanh', 'hoangdinhhanh@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(0, 'hoang dinh hanh', 'hoangdinhhanh@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(0, 'hoang dinh hanh', 'hoangdinhhanh@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(0, '', '', 'd41d8cd98f00b204e9800998ecf8427e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cateid`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderid`,`productid`),
  ADD KEY `ProductID` (`productid`);

--
-- Indexes for table `orderproduct`
--
ALTER TABLE `orderproduct`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `CateID` (`cateid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderproduct`
--
ALTER TABLE `orderproduct`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`orderid`) REFERENCES `orderproduct` (`orderid`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cateid`) REFERENCES `category` (`cateid`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`cateid`) REFERENCES `category` (`cateid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
