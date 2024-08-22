-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 04:00 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(25) NOT NULL,
  `order_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product Code` varchar(6) NOT NULL,
  `Product Name` varchar(50) NOT NULL,
  `Product Description` varchar(255) NOT NULL,
  `Product Type` varchar(50) NOT NULL,
  `Product Image` blob NOT NULL,
  `Price` varchar(50) NOT NULL,
  `Quantity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product Code`, `Product Name`, `Product Description`, `Product Type`, `Product Image`, `Price`, `Quantity`) VALUES
('f-009', 'IPhone 54', 'L', 'Phones', 0x6170706c6577617463682e6a7067, '', ''),
('F-0090', 'IPhone', 'A Iphone that isn\'t the same as all the others.', 'Phone', 0x6170706c6577617463682e6a7067, '0', '899'),
('F-0091', 'IPhone 54', 'L', 'Phones', 0x6170706c6577617463682e6a7067, '', ''),
('G-0090', 'IPhone 54', 'ASSs', 'Phones', '', '', ''),
('G-0096', 'IPhone 54', 'ASSs', 'Phones', '', '', ''),
('G-0098', 'IPhone 54', 'ASSs', 'Phones', 0x6170706c6577617463682e6a7067, '', ''),
('G-0099', 'IPhone 54', 'ASSs', 'Phones', '', '', ''),
('S-0940', 'IPhone 54', 'Sfgh', 'Phones', 0x73616d73756e6770686f6e652e6a7067, '', ''),
('S-0943', 'Samsung W21', 'A smartphone', 'Phones', 0x73616d73756e6770686f6e652e6a7067, '', ''),
('S-0944', 'Samsung W21', 'Hype Phone', 'Phones', 0x73616d73756e6770686f6e652e6a7067, '0', '700'),
('S-0947', 'Samsung W21', 'Wrtyui', 'Phones', 0x73616d73756e6770686f6e652e6a7067, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Password`, `Firstname`, `Lastname`, `Role`) VALUES
('admin', '1234', 'Dennis', 'Kim', 'admin'),
('KaliCooCoo', 'Kayla12345678!', 'Kayla', 'Vincent', 'vendor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product Code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
