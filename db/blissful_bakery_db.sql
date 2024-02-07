-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 24, 2023 at 08:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blissful_bakery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `category_name`) VALUES
(1, 'Cup Cake'),
(2, 'Chocolate Cake'),
(3, 'Fruit Cake'),
(4, 'Donut Cake');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `inv_id` int(11) DEFAULT NULL,
  `inv_date` date DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`inv_id`, `inv_date`, `customer_id`, `prod_id`, `amount`, `status`) VALUES
(1, '2023-11-24', 4, 1, '12.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `contactno` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  `useraddress` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `fullname`, `username`, `password`, `contactno`, `email`, `user_type`, `useraddress`) VALUES
(1, 'Admin', 'admin@gmail.com', '1234', '9876543211', 'admin@gmail.com', 'admin', 'Shastri nagar st no.1 old grain market, Jagraon'),
(2, 'John Smith', 'johnsmith@gmail.com', 'john1234', '123567899', 'johnsmith@gmail.com', 'user', 'Shastri nagar st no.1 old grain market, Jagraon'),
(3, 'Michel', 'michel@gmail.com', '1234', '23467886', 'johnsmith@gmail.com', 'user', 'Shastri nagar st no.1 old grain market, Jagraon'),
(4, 'Naira', 'naira@gmail.com', '1234', '23467886766', 'naira@gmail.com', 'user', 'Shastri nagar st no.1 old grain market, Jagraon');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `prod_image` varchar(100) DEFAULT NULL,
  `prod_cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `price`, `prod_image`, `prod_cat_id`) VALUES
(1, 'Unicorn Cup Cream Cake', '12.00', 'p-1.jpg', 1),
(2, 'Strawberry Cake', '15.00', 'p-2.jpg', 3),
(3, 'Macaron Party Cake', '12.00', 'p-3.jpg', 3),
(4, 'Mug Cake', '15.00', 'p-4.jpg', 1),
(5, 'The Maker of The Bread', '20.00', 'p-5.jpg', 2),
(6, 'Bread & Buttermilk', '17.00', 'p-6.jpg', 2),
(7, 'Icebox Doughnut Birthday Cake', '15.00', 'p-7.jpg', 4),
(8, 'Pink Donut Bundt Cake', '16.00', 'p-8.jpg', 4),
(9, 'Double Chocolate Glazed Donut Cake', '20.00', 'p-9.jpg', 4),
(10, 'Fried Cake Donuts', '19.00', 'p-10.jpg', 4),
(11, 'Chocolate Cake Donut', '11.00', 'p-11.jpg', 4),
(12, 'Decorative Cup Cake', '25.00', 'p-12.jpg', 1),
(13, 'Giant Cupcake', '21.00', 'p-13.jpg', 1),
(14, 'Blueberry Fruit Cake', '33.00', 'p-14.jpg', 3),
(15, 'Vanilla Fresh Fruit Cake', '22.00', 'p-15.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
