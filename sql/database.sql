-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2021 at 09:31 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books_database`
--

CREATE DATABASE booksDatabase;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `uniqueID` int(11) NOT NULL,
  `cartQuantity` int(11) NOT NULL,
  `total` double,
  `grandTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_summary`
--

CREATE TABLE `order` (
  `orderID` int(11) NOT NULL,
  `paymentStatus` varchar(256) NOT NULL,
  `grandTotal` double,
  `userID` int(11) NOT NULL,
  `address` varchar(256) NOT NULL,
  `orderType` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prodID` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `ISBN` double NOT NULL,
  `description` varchar(256) NOT NULL,
  `price` double NOT NULL,
  `genre` varchar(256) NOT NULL,
  `category` varchar(256) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `name`, `quantity`, `price`, `type`, `image`) VALUES
(1, 'Blueberry Muffin', 5, 2.75, 'food', 'images/BlueberryMuffin.jpg'),
(2, 'Chocolate Chip Muffin', 10, 1.21, 'food', 'images/ChocolateChipMuffin.jpg'),
(3, 'New York Bagel', 11, 2.3, 'food', 'images/NYBagel.jpg'),
(4, 'Cinnamon Raisin Bagel', 10, 2.89, 'food', 'images/CINBagel.jpg'),
(5, 'Raspberry Pastry', 10, 3.79, 'food', 'images/Raspberry.jpg'),
(6, 'Apple Turnover Pastry', 10, 2.79, 'food', 'images/Apple.jpg'),
(7, 'Cheese Danish', 10, 2.67, 'food', 'images/CheeseDanish.jpeg'),
(8, 'Frosted Danish', 3, 2, 'food', 'images/FilledFrostedDanish.jpg'),
(9, 'Small Fruit Cup', 7, 1.5, 'food', 'images/smallfruitcup.jpg'),
(10, 'Large Fruit Cup', 9, 2, 'food', 'images/largefruit.jpg'),
(11, 'Dalgona Coffee', 3, 3.69, 'drink', 'images/Dalgona.jpg'),
(12, 'Fizzy Strawberry Lemonade', 5, 4.5, 'drink', 'images/StrawberryLemonade.jpg'),
(13, 'Pumpkin Spice Latte', 5, 4.5, 'drink', 'images/PumpkinSpice.jpg'),
(14, 'Dark Roast Coffee', 5, 2.5, 'drink', 'images/DarkRoast.jpg'),
(15, 'Light Roast Coffee', 5, 4.5, 'drink', 'images/LightRoast.jpg'),
(16, 'Caramel Macchiato', 5, 3.8, 'drink', 'images/CaramelMacchiato.jpg'),
(17, 'Cafe Latte', 9, 2.25, 'drink', 'images/Latte.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userType` varchar(256) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phoneNumber` varchar(11) NOT NULL,
  `verificationCode` int(11) NOT NULL,
  `verificationStatus` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `username`, `password`, `phoneNumber`) VALUES
(1, 'Sarah', 'Greene', 'sgreene', '123', ''),
(2, 'Bob', 'Jones', 'bobjones123', '246', ''),
(3, 'Lily', 'Tea', 'tea111', '111', '');


-- --------------------------------------------------------

--
-- Table structure for table `cartProduct`
--

CREATE TABLE `cartProduct` (
  `uniqueID` int(11) NOT NULL,
  `prodID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `userID` int(11) NOT NULL,
  `paymentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `paymentInfo`
--

CREATE TABLE `paymentInfo` (
  `paymentID` int(11) NOT NULL,
  `cartNum` int(11) NOT NULL,
  `expDate` int(11) NOT NULL,
  `cvv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`numID`);

--
-- Indexes for table `order_summary`
--
ALTER TABLE `order_summary`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `numID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_summary`
--
ALTER TABLE `order_summary`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_summary`
--
-- ALTER TABLE `order_summary`
--   ADD CONSTRAINT `order_summary_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;