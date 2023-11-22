-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 12:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(255) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Electronics'),
(2, 'Clothing'),
(3, 'Game'),
(4, 'Machinery'),
(5, 'Food'),
(6, 'Sports & Outdoors'),
(7, 'Books & Magazines'),
(8, 'Automotive Parts'),
(9, 'Food & Beverages'),
(10, 'Health & Beauty'),
(11, 'Furniture & Decor'),
(12, 'Manny Pacquiao');

-- --------------------------------------------------------

--
-- Table structure for table `invetory`
--

CREATE TABLE `invetory` (
  `inventory_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `reorder_level` int(255) NOT NULL,
  `restockdate` date NOT NULL,
  `date_added` date NOT NULL,
  `date_sold` date NOT NULL,
  `product_fk` int(11) NOT NULL,
  `store_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `weight` int(255) NOT NULL,
  `dimensions` varchar(255) NOT NULL,
  `warranty_info` varchar(255) NOT NULL,
  `category_fk` int(11) NOT NULL,
  `supplier_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `quantity`, `price`, `weight`, `dimensions`, `warranty_info`, `category_fk`, `supplier_fk`) VALUES
(8, 'Samsung Television', 50, 500, 42, '10x10', 'No warranty, 30-day return policy', 1, 3),
(9, 'Redhorse ni Don', 100, 100, 24, '10x10', 'Libre uli basta hupas', 9, 3),
(10, 'Computer', 250, 5000, 10, '40x20x30', '1-year limited warranty', 1, 2),
(11, 'CCIS Shoes', 70, 200, 5, '20x10', '2- year limited warranty', 2, 2),
(12, 'Spaceship', 5, 1000000, 25000, '1000x1000', 'Lifetime Warranty', 4, 6),
(13, 'Alamat ng uwu', 500, 50, 2, '5x5', '7-week waranty', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sold_qty` int(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `product_id`, `sold_qty`, `price`) VALUES
(1, 8, 0, 1000),
(2, 10, 50, 250000),
(3, 11, 5, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `opening_date` date NOT NULL,
  `opening_hours` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(255) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `contactinfo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `contactinfo`) VALUES
(1, 'ABC COMPANY', '2147483647'),
(2, 'BACARISA CORP', '2147483647'),
(3, 'HAMAN BEER', '09105309643'),
(4, 'Nelgie Shoes Corp.', '09105309543'),
(5, 'Kevin D Supplier', '09105309643'),
(6, 'SpaceX', '09090934343'),
(7, 'NASA', '09105934353');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `invetory`
--
ALTER TABLE `invetory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `product_fk` (`product_fk`),
  ADD KEY `store_fk` (`store_fk`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_fk` (`category_fk`),
  ADD KEY `supplier_fk` (`supplier_fk`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `invetory`
--
ALTER TABLE `invetory`
  MODIFY `inventory_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invetory`
--
ALTER TABLE `invetory`
  ADD CONSTRAINT `invetory_ibfk_1` FOREIGN KEY (`product_fk`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `invetory_ibfk_2` FOREIGN KEY (`store_fk`) REFERENCES `store` (`store_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_fk`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`supplier_fk`) REFERENCES `supplier` (`supplier_id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
