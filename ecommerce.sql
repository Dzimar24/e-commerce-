-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 04:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idCategory` int(11) NOT NULL,
  `categoryName` varchar(30) NOT NULL,
  `imageCategory` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idCategory`, `categoryName`, `imageCategory`) VALUES
(3, 'Figure', '20240531164705.png'),
(9, 'example five', '20240601192655.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `idProduct` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `idUser` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`idProduct`, `name`, `description`, `price`, `stock`, `idCategory`, `image`, `idUser`, `created_at`, `updated_at`) VALUES
(5, 'Star  Wars The Black Series Boba Fett (Prototype Armor) Action Figure', '<h4>A PHP Error was encountered</h4>\r\n<p>Severity: Warning</p>\r\n<p>Message: Attempt to read property \"description\" on array</p>\r\n<p>Filename: store/productUpdate.php</p>\r\n<p>Line Number: 99</p>\r\n<p>Backtrace:</p>\r\n<p style=\"margin-left: 10px;\">File: C:\\xampp\\htdocs\\ecommerce\\application\\views\\pages\\store\\productUpdate.php<br>Line: 99<br>Function: _error_handler</p>\r\n<p style=\"margin-left: 10px;\">File: C:\\xampp\\htdocs\\ecommerce\\application\\libraries\\Template.php<br>Line: 13<br>Function: view</p>\r\n<p style=\"margin-left: 10px;\">File: C:\\xampp\\htdocs\\ecommerce\\application\\controllers\\store\\Product.php<br>Line: 40<br>Function: load</p>\r\n<p style=\"margin-left: 10px;\">File: C:\\xampp\\htdocs\\ecommerce\\index.php<br>Line: 315<br>Function: require_once</p>\r\n<p>\" cols=\"30\" rows=\"10\"&gt;</p>', '500000.00', 5, 3, 'product-1.jpg', 3, '2024-06-04 17:02:15', '2024-06-05 04:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `email` varchar(65) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `level` enum('admin','customer','store') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `name`, `email`, `password`, `phoneNumber`, `level`) VALUES
(1, 'Seporti Alexsar', 'oksli@gmial.com', '12345', '085241891999', 'customer'),
(3, 'Alexsander Isak', 'oklik@gmial.com', '12345', '08652346793', 'store'),
(4, 'Werkit Serta', 'serta231@gmail.com', '12345', '085642567229', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `idCategory` (`idCategory`),
  ADD KEY `fk_products_users` (`idUser`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_users` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`);

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `stores_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
