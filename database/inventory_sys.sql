-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 05:36 AM
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
  `product_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invetory`
--

INSERT INTO `invetory` (`inventory_id`, `quantity`, `reorder_level`, `restockdate`, `date_added`, `product_id`, `store_id`) VALUES
(1, 50, 5, '2023-11-27', '2023-11-25', 1, 1),
(2, 100, 20, '2023-11-16', '2023-11-01', 2, 1),
(3, 150, 15, '2023-11-15', '2023-11-01', 3, 1),
(4, 50, 20, '2023-11-07', '2023-10-18', 4, 1),
(5, 10, 2, '2023-11-27', '2023-11-24', 5, 1),
(6, 100, 10, '2023-11-27', '2023-11-19', 6, 1),
(7, 25, 5, '2023-11-27', '2023-11-19', 7, 1),
(8, 10, 5, '2023-11-20', '2023-11-13', 8, 1),
(9, 150, 25, '2023-11-27', '2023-11-20', 9, 1),
(10, 20, 5, '2023-11-27', '2023-11-19', 10, 1),
(11, 25, 5, '2023-11-27', '2023-11-19', 11, 1),
(12, 10, 3, '2023-11-25', '2023-11-06', 12, 1),
(13, 50, 5, '2023-11-27', '2023-11-20', 1, 2),
(14, 100, 20, '2023-11-20', '2023-11-16', 2, 2),
(15, 150, 15, '2023-11-13', '2023-11-07', 3, 2),
(16, 50, 20, '2023-11-27', '2023-11-08', 4, 2),
(17, 10, 2, '2023-11-09', '2023-11-16', 5, 2),
(18, 50, 10, '2023-11-27', '2023-11-09', 6, 2),
(19, 25, 5, '2023-11-27', '2023-11-14', 7, 2),
(20, 10, 3, '2023-11-10', '2023-11-28', 8, 2),
(21, 150, 25, '2023-11-27', '2023-11-10', 9, 2),
(22, 20, 5, '2023-11-25', '2023-11-16', 10, 2),
(23, 20, 5, '2023-11-20', '2023-11-14', 11, 2),
(24, 10, 3, '2023-11-25', '2023-11-09', 12, 2),
(25, 50, 5, '2023-11-26', '2023-10-30', 1, 3),
(26, 100, 20, '2023-11-27', '2023-10-27', 2, 3),
(27, 100, 20, '2023-11-23', '2023-10-26', 3, 3),
(28, 50, 15, '2023-11-22', '2023-11-01', 4, 3),
(29, 15, 5, '2023-11-21', '2023-11-08', 5, 3),
(30, 100, 10, '2023-11-27', '2023-11-08', 6, 3),
(31, 25, 5, '2023-11-25', '2023-11-07', 7, 3),
(32, 20, 5, '2023-11-19', '2023-11-01', 8, 3),
(33, 150, 20, '2023-11-24', '2023-11-13', 9, 3),
(34, 25, 6, '2023-11-20', '2023-11-01', 10, 3),
(35, 30, 5, '2023-11-26', '2023-11-02', 11, 2),
(36, 20, 5, '2023-11-27', '2023-10-27', 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
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

INSERT INTO `product` (`product_id`, `product_name`, `price`, `weight`, `dimensions`, `warranty_info`, `category_fk`, `supplier_fk`) VALUES
(1, 'Samsung Television', 500, 42, '10x10', 'No warranty, 30-day return policy', 1, 3),
(2, 'Redhorse ni Don', 100, 24, '10x10', 'Libre uli basta hupas', 9, 3),
(3, 'Computer', 5000, 10, '40x20x30', '1-year limited warranty', 1, 2),
(4, 'CCIS Shoes', 200, 5, '20x10', '2- year limited warranty', 2, 2),
(5, 'Spaceship', 1000000, 25000, '1000x1000', 'Lifetime Warranty', 4, 6),
(6, 'Alamat ng uwu', 50, 2, '5x5', '7-week waranty', 7, 1),
(7, 'ASRock Radeon RX 6700 XT', 299, 4, '5x5x5x5', '2- year limited warranty	', 1, 5),
(8, 'Washing Machine', 50, 20, '10x10', '1-year limited warranty	', 4, 1),
(9, 'Soju', 5, 5, '27.94 cm', 'No warranty', 9, 3),
(10, 'Piston', 200, 15, '15x10', '2- year limited warranty', 8, 11),
(11, 'Crankshaft', 300, 20, '10x10', 'No warranty, 30-day return policy	', 8, 11),
(12, 'Sofa Set', 110, 25, '25x10x25x10', 'No warranty, 100-day return policy	', 11, 10);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `sold_qty` int(255) NOT NULL,
  `salesdate` date DEFAULT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `product_id`, `store_id`, `sold_qty`, `salesdate`, `price`) VALUES
(1, 1, 1, 2, '0000-00-00', 1000),
(2, 2, 2, 50, '2023-11-25', 250000),
(3, 3, 3, 5, '2023-11-25', 1000),
(4, 6, 2, 50, NULL, 2500),
(5, 2, 3, 90, NULL, 9000);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `opening_date` date NOT NULL,
  `opening_hours` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `location`, `opening_date`, `opening_hours`) VALUES
(1, 'Digos City', '2023-11-09', '9AM-10PM'),
(2, 'Davao City', '2023-11-10', '9AM-10PM'),
(3, 'Panabo City', '2023-10-20', '10AM-5PM');

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
(7, 'NASA', '09105934353'),
(8, 'Nvidia', '09091053023'),
(9, 'AMD', '09106509642'),
(10, 'MUSKS', '092130145213'),
(11, 'John Automotive Parts', '099151073731');

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
  ADD KEY `product_fk` (`product_id`),
  ADD KEY `store_fk` (`store_id`);

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
  ADD KEY `product_id` (`product_id`),
  ADD KEY `store_id` (`store_id`);

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
  MODIFY `inventory_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invetory`
--
ALTER TABLE `invetory`
  ADD CONSTRAINT `invetory_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`),
  ADD CONSTRAINT `invetory_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

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
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
