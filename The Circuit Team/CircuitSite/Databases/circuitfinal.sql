-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 02:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `circuitfinal`
--
-- CREATE DATABASE circuitfinal
-- DROP DATABASE IF EXISTS circuitfinal;
CREATE DATABASE circuitfinal;
USE circuitfinal;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `buyerID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `ListingDate` date NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemID`, `userID`, `Title`, `Description`, `Price`, `ListingDate`, `Status`, `Image`) VALUES
(2, 3, 'Keyboard', 'Used to type.', 25.00, '2024-03-14', 'IN-STOCK', 'keyboard.png'),
(3, 2, 'Phone Charges', 'Help power phones', 15.00, '2024-04-26', 'IN-STOCK', 'charge.jpg'),
(4, 3, 'SSD', 'Get your SSD now! Its great for storage.', 35.00, '2024-03-21', 'IN-STOCK', 'SSD-Transparent.png'),
(5, 11, 'Mouse', 'this is my favorite mouse', 50.00, '2024-05-04', 'In-Stock', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(60) DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `emailAddress`, `password`, `username`, `is_admin`) VALUES
(2, 'test@gmail.com', '$2y$10$K/vURjVspc5d2Bczn5Bh9O5kbjwnPNgoKH2OQqkXvbBmQsgMVSlVm', 'test', 0),
(3, 'test@text.com', '$2y$10$5Dsz0aEXSRvpgUGssqTcuOzyNGTkFg.iYHEOIOaxJZ0gbARTEZzuO', 'test1', 1),
(7, 'admin@gmail.com', '$2y$10$9BVLd6jtXMuDDaJbl.m.3.XGrZiljL4dTuO/IBpZhnhuhn/lHrsoe', 'admin', 1),
(8, 'test@gmail.com', '$2y$10$gsqdWCbQmtqaVPdzHzAh7e9WBoxg/XUk7nOli/ojBX37cRy0wReqa', '500', 0),
(10, 'sladewarner@gmail.com', '$2y$10$BoqiBGNhHuQSjyr8/0CRYOK7mqe6MXXMZ0U07JVMw4zYHPuOzH/gS', 'Greg', 0),
(11, 'makargaming06@gmail.com', '$2y$10$srfXuQEfFDHWu2VVhpXF4ugpbK246M9aihSZcXyI116Xzacpj1zyK', 'Steven', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `buyerID` (`buyerID`),
  ADD KEY `itemID` (`itemID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `userID_fk` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`buyerID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`itemID`) REFERENCES `items` (`itemID`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `userID_fk` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

-- Create the users and grant priveleges to those users
CREATE USER 'user_final'@'localhost' IDENTIFIED BY 'pa55word';
GRANT ALL ON circuitfinal.* TO 'user_final'@'localhost'; 

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
