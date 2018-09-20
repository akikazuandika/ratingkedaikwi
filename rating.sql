-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2018 at 11:37 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rating`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`, `name`, `photo`) VALUES
(1, 'akikazu', 'andika', 'akikazuandika@gmail.com', 'Akikazu Andika', 'localhost');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `address`) VALUES
(1, 'akikazu andika', 'akikazuandika@gmail.com', 'andika', 'garum'),
(2, 'Akikazu Andika', 'akikazu@gmail.com', '123', 'garum'),
(3, 'a', 'a', 'a', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `rating_product`
--

CREATE TABLE `rating_product` (
  `id_rating_product` int(11) NOT NULL,
  `id_store` int(11) NOT NULL,
  `email_customer` varchar(255) NOT NULL,
  `value` float NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_product`
--

INSERT INTO `rating_product` (`id_rating_product`, `id_store`, `email_customer`, `value`, `comment`) VALUES
(1, 1, 'a', 5, 'baik'),
(2, 2, 'a', 5, 'buaikkk'),
(4, 2, 'a', 3.5, 'alksdlaksda'),
(5, 2, 'a', 4, ''),
(6, 2, 'a', 4, 'thgf');

-- --------------------------------------------------------

--
-- Table structure for table `rating_service`
--

CREATE TABLE `rating_service` (
  `id_rating_service` int(11) NOT NULL,
  `id_store` int(11) NOT NULL,
  `email_customer` varchar(255) NOT NULL,
  `value` float NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_service`
--

INSERT INTO `rating_service` (`id_rating_service`, `id_store`, `email_customer`, `value`, `comment`) VALUES
(1, 1, 'a', 4.5, 'woyooo');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id_store` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `store_location` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'https://png.icons8.com/cotton/50/000000/online-store.png',
  `count_rating_product` int(11) NOT NULL,
  `count_rating_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id_store`, `store_name`, `store_location`, `image`, `count_rating_product`, `count_rating_service`) VALUES
(1, 'akikazu', 'andikawilda', 'https://png.icons8.com/cotton/50/000000/online-store.png', 1, 1),
(2, 'Kedai Kwi', 'Malang', 'https://png.icons8.com/cotton/50/000000/online-store.png', 4, 0),
(3, 'Nelongso', 'Blitar', 'https://png.icons8.com/cotton/50/000000/online-store.png', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `rating_product`
--
ALTER TABLE `rating_product`
  ADD PRIMARY KEY (`id_rating_product`);

--
-- Indexes for table `rating_service`
--
ALTER TABLE `rating_service`
  ADD PRIMARY KEY (`id_rating_service`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id_store`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rating_product`
--
ALTER TABLE `rating_product`
  MODIFY `id_rating_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rating_service`
--
ALTER TABLE `rating_service`
  MODIFY `id_rating_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id_store` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
