-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 03, 2022 at 05:58 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roda_maju`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `datebook` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `kendaraan` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` enum('waiting','paid','done','cancel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bookings_confirm`
--

CREATE TABLE `bookings_confirm` (
  `id` int(11) NOT NULL,
  `id_bookings` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `nominal` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bookings_detail`
--

CREATE TABLE `bookings_detail` (
  `id` int(11) NOT NULL,
  `id_bookings` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `datebook` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `datebook` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `slug`) VALUES
(1, 'Service Ringan', 'service-ringan'),
(2, 'Service Beratt', 'service-berat'),
(4, 'Penggantian Ringan', 'penggantian-ringan');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `id_category`, `slug`, `title`, `description`) VALUES
(2, 1, 'service-15000-km', 'Service 15000 KM', 'Service untuk layanan jika kilometer 10000 KM'),
(3, 1, 'service-20000-km', 'Service 20000 KM', 'Service untuk layanan jika kilometer 20000 KM'),
(4, 1, 'service-diatas-20000-km', 'Service Diatas 20000 KM', 'Service untuk layanan jika diatas kilometer 20000 KM'),
(5, 2, 'turun-mesin', 'Turun Mesin', 'Service untuk layanan jika turun mesin'),
(6, 2, 'pengecatan-ulang', 'Pengecatan Ulang', 'Service untuk layanan jika pengecetan ulang'),
(7, 4, 'ganti-ban', 'Ganti Ban', 'Service untuk layanan jika ganti ban'),
(8, 4, 'ganti-velg', 'Ganti velg', 'Service untuk layanan jika ganti velg'),
(9, 4, 'ganti-kaca', 'Ganti Kaca', 'Service untuk layanan jika ganti kaca'),
(10, 4, 'ganti-jok', 'Ganti Jok', 'Service untuk layanan jika ganti jok'),
(11, 1, 'service-10000-km', 'Service 10000 KM', 'Service JIka kendaraan 10000 KM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','member') NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `is_active`) VALUES
(2, 'Admin', 'admin@mail.com', '$2y$10$wLkQ5nm7EuTA7eArtHSc0ef.YtHV2lLXZVPCnrVxrh6FNsRnBePYu', 'admin', 1),
(4, 'Pradana Yoga Pangestu', 'pradanayp19@gmail.com', '$2y$10$65Ri9VSAIRRg9QN0Vuqgk.jnU0UdsI7UJIqKJQ9d0acK6DcIRHdQe', 'admin', 1),
(6, 'Agoy', 'agoy@mail.com', '$2y$10$VZDMHMxtwD5d7fNKP809vOltK0yKtN4HNZ35j/6SM1ORssYi6O2e.', 'member', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings_confirm`
--
ALTER TABLE `bookings_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings_detail`
--
ALTER TABLE `bookings_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bookings_confirm`
--
ALTER TABLE `bookings_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings_detail`
--
ALTER TABLE `bookings_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
