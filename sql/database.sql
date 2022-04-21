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

/* CREATE DATABASE booksDatabase; */
/* USE booksDatabase; */

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11),
  `userID` int(11) NOT NULL,
  `uniqueID` int(11) NOT NULL,
  `cartQuantity` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `paymentStatus` varchar(256) NOT NULL,
  `grandTotal` double,
  `userID` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `orderType` varchar(256) NOT NULL,
  `orderDate` varchar(256) NOT NULL,
  `confirmationCode` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cartHistory`
--

CREATE TABLE `cartHistory` (
  `cartHID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `prodID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `orderDate` varchar(256) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prodID` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `author` varchar(256) NOT NULL,
  `ISBN` double NOT NULL,
  `description` varchar(256) NOT NULL,
  `price` double NOT NULL,
  `genre` varchar(256) NOT NULL,
  `category` varchar(256) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(512) NOT NULL,
  `publisher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prodID`, `name`, `author`, `ISBN`, `description`, `price`, `genre`, `category`, `quantity`, `image`, `publisher`) VALUES
(1, 'Object-Oriented Software Engineering Using UML, Patterns, and Java, 3rd Edition', 'Bernd Bruegge, Allen H. Dutoit', 9780136061250, 'Computer Science', 116.25, 'Education', 'Book', 10, 'images/0136061257.jpg', 3),
(2, 'Warriors #1: Into the Wild', 'Erin Hunter', 9780062366962, 'Warrior #1', 7.99, 'Fiction', 'Book', 7, 'images/warrior1.jpg', 3),
(3, 'Warriors #2: Fire and Ice', 'Erin Hunter', 9780060000035, 'Warrior #2', 6.99, 'Fiction', 'Book', 8, 'images/warrior2.jpg', 3),
(4, 'Warriors #3: Forest of Secrets', 'Erin Hunter', 9780062366986, 'Warrior #3', 5.99, 'Fiction', 'Book', 9, 'images/warrior3.jpg', 1),
(5, 'Warriors #4: Rising Storm', 'Erin Hunter', 9780060525620, 'Warrior #4', 4.99, 'Fiction', 'Book', 11, 'images/warrior4.jpg', 1),
(6, 'Warriors #5: A Dangerous Path', 'Erin Hunter', 9780060000066, 'Warrior #5', 8.99, 'Fiction', 'Book', 1, 'images/warrior5.jpg', 1);

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
  `verificationCode` varchar(256) NOT NULL,
  `verificationStatus` varchar(256) NOT NULL,
  `subscribeStatus` int(11) NOT NULL,
  `birthDate` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userType`, `firstName`, `lastName`, `username`, `password`, `email`, `phoneNumber`, `verificationCode`, `verificationStatus`, `subscribeStatus`, `birthDate`, `address`) VALUES
(1, 'admin', 'joseph', 'nguyen', 'hello', 'bye', 'admin@uga.edu', '1112223333', 1, 'true', 0, '07/31/1999', '111 Hello Way'),
(2, 'user', 'Bob', 'Jones', 'bobjones123', '123', 'user@uga.edu', '1112223333', 2, 'true', 0, '07/31/1999', '111 Hello Way'),
(3, 'publisher', 'Lily', 'Tea', 'tea111', '111', 'publisher@uga.edu', '1112223333', 3, 'true', 0, '07/31/1999', '111 Hello Way'),
(4, 'business', 'Lily', 'Tea', 'tea123', '123', 'business@uga.edu', '1112223333', 4, 'true', 0, '07/31/1999', '111 Hello Way');


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
-- Table structure for table `promoCodes`
--

CREATE TABLE `promoCodes` (
  `promoID` int(11) NOT NULL,
  `promoCode` varchar(256) NOT NULL,
  `promoNumber` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `promoCodes` (`promoID`, `promoCode`, `promoNumber`) VALUES
(1, '25OFF', 0.25),
(2, 'MINUS10', 10);


--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `order_summary`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prodID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `products`
--
ALTER TABLE `promoCodes`
  ADD PRIMARY KEY (`promoID`);
  
  
--
-- Indexes for table `products`
--
ALTER TABLE `cartHistory`
  ADD PRIMARY KEY (`cartHID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_summary`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_summary`
--
ALTER TABLE `promoCodes`
  MODIFY `promoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_summary`
--
ALTER TABLE `cartHistory`
  MODIFY `cartHID` int(11) NOT NULL AUTO_INCREMENT;
  
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