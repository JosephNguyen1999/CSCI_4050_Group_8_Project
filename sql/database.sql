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

INSERT INTO `products` (`prodID`, `name`, `ISBN`, `description`, `price`, `genre`, `category`, `quantity`, `image`) VALUES
(1, 'Object-Oriented Software Engineering Using UML, Patterns, and Java, 3rd Edition', 978-0136061250, 'SE BOOK', 116.25, 'Computer Science', 'Book', 10, 'images/0136061257.jpg'),
(2, 'Object-Oriented Software Engineering Using UML, Patterns, and Java, 3rd Edition', 978-0136061250, 'SE BOOK', 116.25, 'Computer Science', 'Book', 10, 'images/0136061257.jpg'),
(3, 'Object-Oriented Software Engineering Using UML, Patterns, and Java, 3rd Edition', 978-0136061250, 'SE BOOK', 116.25, 'Computer Science', 'Book', 10, 'images/0136061257.jpg'),
(4, 'Object-Oriented Software Engineering Using UML, Patterns, and Java, 3rd Edition', 978-0136061250, 'SE BOOK', 116.25, 'Computer Science', 'Book', 10, 'images/0136061257.jpg'),
(5, 'Object-Oriented Software Engineering Using UML, Patterns, and Java, 3rd Edition', 978-0136061250, 'SE BOOK', 116.25, 'Computer Science', 'Book', 10, 'images/0136061257.jpg'),
(6, 'Object-Oriented Software Engineering Using UML, Patterns, and Java, 3rd Edition', 978-0136061250, 'SE BOOK', 116.25, 'Computer Science', 'Book', 10, 'images/0136061257.jpg');

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

INSERT INTO `users` (`userID`, `userType`, `firstName`, `lastName`, `username`, `password`, `email`, `phoneNumber`, `verificationCode`, `verificationStatus`) VALUES
(1, 'admin', 'joseph', 'nguyen', 'hello', 'bye', 'admin@uga.edu', '1112223333', 1, 'true'),
(2, 'user', 'Bob', 'Jones', 'bobjones123', '123', 'user@uga.edu', '1112223333', 2, 'true'),
(3, 'publisher', 'Lily', 'Tea', 'tea111', '111', 'publisher@uga.edu', '1112223333', 3, 'true'),
(3, 'business', 'Lily', 'Tea', 'tea123', '123', 'business@uga.edu', '1112223333', 4, 'true');


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