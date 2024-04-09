-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 05:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(225) NOT NULL,
  `vehicle_mdl` varchar(255) NOT NULL,
  `vehicle_nmbr` varchar(255) NOT NULL,
  `vehicle_image` varchar(255) NOT NULL,
  `seat_capacity` varchar(50) NOT NULL,
  `rentpday` float NOT NULL,
  `status` text NOT NULL DEFAULT 'available',
  `car_desc` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `vehicle_agency` varchar(200) NOT NULL,
  `nodays` varchar(200) NOT NULL,
  `from_date` varchar(50) NOT NULL,
  `to_date` varchar(50) NOT NULL,
  `user` varchar(200) NOT NULL,
  `dist` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pin` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `payment_method` varchar(200) NOT NULL,
  `payment` varchar(200) NOT NULL,
  `order_date` varchar(200) NOT NULL,
  `orderId` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `vehicle_mdl`, `vehicle_nmbr`, `vehicle_image`, `seat_capacity`, `rentpday`, `status`, `car_desc`, `date`, `vehicle_agency`, `nodays`, `from_date`, `to_date`, `user`, `dist`, `city`, `pin`, `contact`, `payment_method`, `payment`, `order_date`, `orderId`) VALUES
(17, 'M10', 'A1234', 'car1.webp', '4', 400, 'AVAILABLE', '', '2024-04-02 19:10:14', 'deep', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'M11', 'A1235', 'car2.jpg', '3', 300, 'AVAILABLE', '', '2024-04-02 19:10:35', 'deep', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 'M12', 'A1236', 'car3.jpg', '3', 300, 'AVAILABLE', '', '2024-04-02 19:10:56', 'deep', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 'M14', 'A1236', 'car4.avif', '6', 600, 'deep rented', '', '2024-04-02 19:11:14', 'deep', '1', '2024-04-03', '04/04/2024', 'deep', 'bajali', 'pathsala', '781325', '1234567890', 'cash on delhivery', '600', '02/04/2024', '717163');

-- --------------------------------------------------------

--
-- Table structure for table `car_agency`
--

CREATE TABLE `car_agency` (
  `id` int(200) NOT NULL,
  `agent_name` varchar(50) NOT NULL,
  `agent_email` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `agent_pass` varchar(200) NOT NULL,
  `agent_phone` varchar(50) NOT NULL,
  `agent_address` text NOT NULL,
  `agent_photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_agency`
--

INSERT INTO `car_agency` (`id`, `agent_name`, `agent_email`, `username`, `agent_pass`, `agent_phone`, `agent_address`, `agent_photo`) VALUES
(1, 'deep', 'deep@gmail.com', 'deep', 'deep@1234', '7978438558', 'bvec boys hostel', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `email`, `username`, `pass`, `address`, `photo`) VALUES
(12, 'deep', '8888888888', 'deep@gmail.com', 'deep', '1234', 'assam', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_agency`
--
ALTER TABLE `car_agency`
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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `car_agency`
--
ALTER TABLE `car_agency`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
