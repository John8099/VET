-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2021 at 05:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vet`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `details` varchar(100) NOT NULL,
  `status` text NOT NULL,
  `createAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `date`, `time`, `details`, `status`, `createAt`) VALUES
(1, 2, '2021-02-25', '12:12:00', 'awd', 'pending', '2021-02-15 17:10:52'),
(2, 2, '2021-03-10', '00:12:00', 'awd', 'done', '2021-02-15 17:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `items_name` varchar(60) NOT NULL,
  `item_location` varchar(50) NOT NULL,
  `item_price` int(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `items_name`, `item_location`, `item_price`, `quantity`, `category`) VALUES
(8, 'Puppy Chewing Toys', '60240e592a427_91-300x300.jpg', 100, 5, 'Toys'),
(9, 'China convenient Pet Nest factory', '60240e740b85b_ozjvm5u0nhk.jpg', 200, 5, 'Bed'),
(10, 'Zesty Paws Calming Bites Supplement', '60240f31b3ff9_5303207.jpg', 160, 5, 'Vitamins'),
(11, 'Double Door Wire Dog Crate', '60240fb8d9dce_5298861.jpg', 240, 2, 'Houses'),
(12, 'Canidae Dog Food', '60240fe5e2b47_5300384.jpg', 120, 10, 'Feeders'),
(13, 'sample', '60262af7c58e4_thumbs-up.png', 1445, 123, 'Treats');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(55) NOT NULL,
  `lname` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `uname` varchar(55) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `user_type` varchar(32) NOT NULL,
  `pet_name` varchar(55) NOT NULL,
  `pet_breed` varchar(55) NOT NULL,
  `pet_addtional_details` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `uname`, `pass`, `user_type`, `pet_name`, `pet_breed`, `pet_addtional_details`) VALUES
(1, 'fname', 'lname', 'smpl@sample.com', 'smpl', '$argon2i$v=19$m=65536,t=4,p=1$bjZGVkk4OXpneWppcC5iQg$qI+pPbZQ4tBFAnanXqpPhnnIdJJV0k7XB/L+b1kxe9c', 'admin', '', '', ''),
(2, 'smple', 'smpl', 'smpl@outlook.com', 'sample', '$argon2i$v=19$m=65536,t=4,p=1$Z09rSlZuc1YyaVVRemVPZQ$1KjeNvmPDvEHTOtun0Y+pCw4hJ9AHmWRvGeMuOcVAVM', 'customer', 'sample', 'sample', 'TEST\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
