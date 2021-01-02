-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 01:01 PM
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
-- Database: `crunch`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(11) NOT NULL,
  `coupon_value` int(3) DEFAULT NULL,
  `coupon_desc` varchar(100) DEFAULT NULL,
  `coupon_link` varchar(255) DEFAULT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `coupon_value`, `coupon_desc`, `coupon_link`, `hotel_id`) VALUES
(1, 40, 'On 3 orders', 'https://zoutons.com/zomato-coupons?cnid=40855#40855', 1),
(2, 40, 'On 3 orders', 'https://zoutons.com/zomato-coupons?cnid=40855#40855', 1),
(3, 50, 'On all orders', 'https://zoutons.com/zomato-coupons?cnid=62466#62466', 2),
(8, 10, 'For all users', 'https://zoutons.com/zomato-coupons?cnid=61982#61982', 6),
(12, 70, 'First 5 orders', 'https://zoutons.com/zomato-coupons', 3),
(13, 20, 'HDFC cards', 'https://zoutons.com/zomato-coupons', 4),
(14, 50, 'Paytm cashback', 'https://zoutons.com/zomato-coupons', 7),
(15, 85, 'Orders above Rs.150', 'https://zoutons.com/zomato-coupons', 4),
(16, 25, 'First 3 orders', 'https://zoutons.com/zomato-coupons', 5),
(17, 70, 'On combos', 'https://zoutons.com/zomato-coupons', 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(100) DEFAULT NULL,
  `dept_head` varchar(100) DEFAULT NULL,
  `dept_head_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `dept_head`, `dept_head_id`) VALUES
(0, 'Web Development', 'Shanwill Pinto', 0),
(1, 'Automation', 'Raksharaj Shetty', 3),
(2, 'Devops', 'Vignesh Shetty', 2),
(3, 'Sales & Marketing', 'Shifali B S', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `gender`, `dept_id`) VALUES
(0, 'Shanwill Pinto', 'M', 0),
(1, 'Shifali BS', 'F', 3),
(2, 'Vignesh Shetty', 'M', 2),
(3, 'Raksharaj Shetty', 'M', 1),
(4, 'Naxatra', 'M', 0),
(5, 'Simmone', 'F', 1),
(6, 'Shaun', 'M', 1),
(7, 'Gavin', 'M', 2),
(8, 'Welroy', 'M', 2),
(9, 'Manjunath', 'M', 3),
(10, 'Rayan', 'M', 3),
(11, 'Reevan', 'M', 2),
(12, 'Sriganesh', 'M', 0),
(13, 'Nireekshith', 'M', 1),
(14, 'Wenzel', 'M', 0),
(15, 'Rahul', 'M', 3),
(16, 'Akanksha', 'F', 3),
(17, 'Sumanth', 'M', 3),
(18, 'Neha', 'F', 1),
(19, 'Shaz', 'M', 2);

-- --------------------------------------------------------

--
-- Table structure for table `fooditems`
--

CREATE TABLE `fooditems` (
  `id` int(11) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fooditems`
--

INSERT INTO `fooditems` (`id`, `item_name`, `item_price`) VALUES
(1, 'Chicken Biryani', 120),
(2, 'Chicken Tikka Masala', 90),
(3, 'Mutton Biryani', 140),
(4, 'Dosa', 10),
(5, 'Idli', 10),
(6, 'Vada', 10),
(7, 'Parota', 20),
(8, 'Upma', 15),
(9, 'Dahivada', 30),
(10, 'Chicken Chilly', 95),
(11, 'Chicken Pepper', 120),
(12, 'Dosa', 10),
(13, 'Idli', 10),
(14, 'Vada', 10),
(15, 'Parota', 20),
(16, 'Upma', 15),
(17, 'Dahivada', 30),
(18, 'Chicken Chilly', 95),
(19, 'Chicken Pepper', 120),
(20, 'Chicken Ghee Roast', 150),
(21, 'Mutton Kofta', 140);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(30) NOT NULL,
  `hotel_type` varchar(25) NOT NULL,
  `hotel_location` varchar(30) NOT NULL,
  `hotel_img` varchar(255) NOT NULL,
  `hotel_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `hotel_type`, `hotel_location`, `hotel_img`, `hotel_address`) VALUES
(1, 'Spindrift', 'Brew Pub', 'Bharat Mall', 'images/spin.jpg', 'https://goo.gl/maps/uTWYmfpaKixiuFxw6'),
(2, 'Diesel Cafe', 'Resto Cafe', 'Balmatta', 'images/diesel.jpg', 'https://goo.gl/maps/5U6fLUkSYTFsna7B7'),
(3, 'Basil Cafe', 'Resto Cafe', 'Kapikad', 'images/basil.jpg', 'https://goo.gl/maps/ss3KCY6PRMbZhYS98'),
(4, 'Village', 'Bar & Restaurant', 'Yeyyadi', 'images/village.jpg', 'https://goo.gl/maps/oYEBjy4Mx1iVjEnv5'),
(5, 'Onyx', 'Bar & Restaurant', 'MG Road', 'images/onyx.jpg', 'https://goo.gl/maps/vSQMz3g3LCTyRrGQ8'),
(6, 'Ideal Cafe', 'Resto Caafe', 'MG Road', 'images/ideal.jpg', 'https://goo.gl/maps/nWxZdmvKfAGVZiL7A'),
(7, 'Machali', 'Restaurant', 'Kodialbail', 'images/machali.png', 'https://goo.gl/maps/AYEzJrhiiXXDknPH9'),
(8, 'Mangala', 'Bar & Restaurant', 'Kankanady', 'images/mangala.jpg', 'https://goo.gl/maps/7fn18r3yWi1K8utf7');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `password`, `code`, `status`) VALUES
(1, 'Shanwill Pinto', 'Shanwillpinto@gmail.com', '$2y$10$vzWaATHMmYCnahTzlGHw4uK8I7jTVOLE7iMbr6QmUKTytvz0q2Jpa', 0, 'verified'),
(6, 'Vignesh Shetty', 'vignesh@gmail.com', '$2y$10$gYSMumQ.jjlfsuGzFGrDf.FhkqpqkecFqqUXkfVO4EL/CO.JA02xK', 0, 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `fooditems`
--
ALTER TABLE `fooditems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `fooditems`
--
ALTER TABLE `fooditems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;