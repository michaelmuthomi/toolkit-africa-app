-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2025 at 04:46 PM
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
-- Database: `toolkit africa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `Name`, `Date`) VALUES
(1, 'admin', 'admin', 'Naju', '2024-07-06 07:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `bnote_cleaner`
--

CREATE TABLE `bnote_cleaner` (
  `idnumber` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` float NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DateofBirth` varchar(32) NOT NULL,
  `Answer` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bnote_cleaner`
--

INSERT INTO `bnote_cleaner` (`idnumber`, `fname`, `lname`, `gender`, `email`, `password`, `phone`, `address`, `status`, `created_on`, `DateofBirth`, `Answer`) VALUES
(30188758, 'Ken', 'Murimi', 'Female', 'ken@gmail.com', 'f632fa6f8c3d5f551c5df867588381ab', '0117826376', 'Nairobi', 1, '2025-07-18 06:44:03', '1997-07-12', 'Cleaner'),
(30897589, 'Job', 'Mtumishi', 'Female', 'job@gmail.com', '9dddd5ce1b1375bc497feeb871842d4b', '076472693`', 'Kajiado', 1, '2025-07-18 06:44:16', '1994-08-04', 'Cleaner'),
(30897590, 'Mark', 'Murithi', 'male', 'mark@gmail.com', 'ea82410c7a9991816b5eeeebe195e20a', '0762425364', '123 Tom Mboya Street', 1, '2025-07-18 06:49:53', '1994-08-04', 'Cleaner'),
(30897591, 'Mary', 'Magdaline', 'female', 'mary@gmail.com', 'b8e7be5dfa2ce0714d21dcfc7d72382c', '0765738465', 'Main Street', 1, '2025-07-18 06:49:30', '1994-08-04', 'Cleaner');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(20) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `service` varchar(50) NOT NULL,
  `charges` decimal(10,2) NOT NULL,
  `transactioncode` varchar(50) NOT NULL,
  `payment_status` float NOT NULL,
  `supervisor_status` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `idnumber`, `fname`, `lname`, `email`, `phone`, `address`, `service`, `charges`, `transactioncode`, `payment_status`, `supervisor_status`, `date`) VALUES
(30, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Services', 2000.00, 'QWE1234567', 1, 1, '2025-04-22 00:59:03'),
(31, 30980192, 'Kimathi', 'Peter', 'kimathi@gmail.com', '0725884729', 'Isiolo', 'Waste Collection Services', 1000.00, 'Ghfs123456', 1, 1, '2025-04-29 10:14:20'),
(32, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Services', 1000.00, 'Qwi1239ind', 1, 1, '2025-06-24 09:56:18'),
(33, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Recycling Services', 1000.00, 'Wqui1339ue', 1, 1, '2025-06-24 12:34:06'),
(34, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Services', 1000.00, 'Qyeo1234ga', 1, 1, '2025-07-10 08:24:27'),
(35, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Services', 1000.00, 'Qw12345wns', 1, 1, '2025-07-15 10:16:21'),
(36, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Services', 1000.00, 'Qwauori123', 1, 1, '2025-07-15 12:23:32'),
(37, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Services', 1000.00, 'Qwuro1244j', 1, 1, '2025-07-15 12:44:11'),
(38, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Services', 1000.00, 'MW12333333', 1, 1, '2025-07-17 13:12:29'),
(39, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Services', 1000.00, 'JU48934657', 1, 1, '2025-07-18 07:50:16'),
(40, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Services', 1000.00, 'Qwea134fr4', 1, 1, '2025-07-22 07:48:27'),
(41, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Services', 1000.00, 'QWAU124KXD', 1, 1, '2025-07-22 08:53:32'),
(42, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Services', 1000.00, 'QWIAO1244Q', 1, 1, '2025-07-22 11:14:26'),
(43, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Services', 1000.00, 'MW22333120', 1, 1, '2025-07-22 12:14:43'),
(44, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Services', 1000.00, 'KE24333333', 1, 1, '2025-07-22 12:28:23'),
(45, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Services', 1000.00, 'MW12333220', 1, 1, '2025-07-22 12:28:28'),
(46, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Services', 1000.00, 'MW12333439', 1, 1, '2025-07-22 12:58:57'),
(47, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Services', 1000.00, 'MW43848484', 1, 1, '2025-07-22 12:59:01'),
(48, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Services', 1000.00, 'MW12333547', 1, 1, '2025-07-22 12:59:06'),
(49, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Services', 1000.00, 'MW12333120', 1, 1, '2025-07-23 10:29:50'),
(50, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Services', 1000.00, 'MW12333333', 1, 1, '2025-07-23 10:29:54'),
(51, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Services', 1000.00, 'WAQOEJN123', 1, 1, '2025-07-24 11:07:56'),
(52, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Services', 1000.00, 'MW12333120', 1, 1, '2025-07-24 11:33:44'),
(53, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Services', 1000.00, 'MW22333120', 1, 1, '2025-07-24 11:33:48'),
(54, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Services', 1000.00, 'MW12333333', 1, 1, '2025-07-24 11:33:52'),
(55, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Services', 1000.00, 'QWAI13R5QR', 1, 1, '2025-07-24 11:35:19'),
(56, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Services', 1000.00, 'QWAI13R5QR', 1, 1, '2025-07-24 11:35:27'),
(57, 30291769, 'Musa', 'Hassan', 'Hmusa@gmail.com', '0772173972', 'Nairobi', 'Waste Collection Services', 1000.00, 'WEQAS12355', 1, 1, '2025-07-28 10:33:44'),
(58, 30291769, 'Musa', 'Hassan', 'Hmusa@gmail.com', '0772173972', 'Nairobi', 'Waste Collection Services', 1000.00, 'TEWQW12346', 1, 1, '2025-07-28 10:46:26'),
(59, 30291769, 'Musa', 'Hassan', 'Hmusa@gmail.com', '0772173972', 'Nairobi', 'Waste Collection Services', 1000.00, 'WEQAR1361U', 1, 1, '2025-07-28 11:09:14'),
(60, 30291769, 'Musa', 'Hassan', 'Hmusa@gmail.com', '0772173972', 'Nairobi', 'Waste Collection Services', 1000.00, 'QWARU13441', 1, 1, '2025-07-28 19:36:21'),
(61, 7121392, 'Njoroge', 'Kamau', 'Njorogekamau@gmail.com', '0711644357', 'Embu', 'Waste Collection Services', 1000.00, 'QWUSOSBW12', 1, 1, '2025-07-29 05:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `cleaner_tasks`
--

CREATE TABLE `cleaner_tasks` (
  `No` int(10) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `service` varchar(255) NOT NULL,
  `supervisor` varchar(20) NOT NULL,
  `cleaner` varchar(20) NOT NULL,
  `status` float NOT NULL,
  `date_allocated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tool_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cleaner_tasks`
--

INSERT INTO `cleaner_tasks` (`No`, `idnumber`, `fname`, `lname`, `email`, `phone`, `address`, `service`, `supervisor`, `cleaner`, `status`, `date_allocated`, `tool_status`) VALUES
(11, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Recycling Services', 'Pablo', 'Sally', 0, '2025-06-24 12:36:07', 0),
(12, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Recycling Services', 'Pablo', 'Mary', 1, '2025-07-17 15:13:57', 1),
(13, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Recycling Services', 'Pablo', 'Sally', 0, '2025-07-10 08:29:26', 0),
(14, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Recycling Services', 'Pablo', 'Sally', 2, '2025-07-10 08:33:55', 1),
(15, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Pablo', 'Mary', 2, '2025-07-24 12:45:24', 3),
(16, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Pablo', 'Mary', 2, '2025-07-17 15:26:41', 1),
(17, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Angela', 'Mark', 2, '2025-07-18 07:56:26', 1),
(18, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Angela', 'Ken', 2, '2025-07-22 07:55:40', 1),
(19, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Angela', 'Mark', 2, '2025-07-22 08:58:49', 1),
(20, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Angela', 'Mark', 2, '2025-07-22 11:19:16', 1),
(21, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Ser', 'Angela', 'Job', 1, '2025-07-22 12:21:32', 1),
(22, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Ser', 'Ann', 'Ken', 1, '2025-07-22 12:34:48', 1),
(23, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Ser', 'Ann', 'Ken', 2, '2025-07-22 12:47:29', 3),
(24, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Ser', 'Ann', 'Ken', 2, '2025-07-23 09:19:14', 3),
(25, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Ser', 'Ann', 'Ken', 2, '2025-07-28 11:02:40', 3),
(26, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Ser', 'Ann', 'Ken', 0, '2025-07-22 12:59:58', 0),
(27, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Ser', 'Ann', 'Mary', 2, '2025-07-24 10:54:34', 3),
(28, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Ser', 'Ann', 'Mary', 2, '2025-07-23 10:34:45', 3),
(29, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Angela', 'Mark', 2, '2025-07-24 11:11:54', 3),
(30, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Ann', 'Ken', 2, '2025-07-24 11:42:18', 3),
(31, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Ann', 'Ken', 0, '2025-07-24 11:37:23', 0),
(32, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Ann', 'Mary', 2, '2025-07-24 12:43:45', 3),
(33, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Angela', 'Mary', 2, '2025-07-24 12:54:48', 3),
(34, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Ann', 'Mary', 2, '2025-07-24 12:57:19', 3),
(35, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Ann', 'Mary', 2, '2025-07-24 13:33:17', 3),
(36, 30291769, 'Musa', 'Hassan', 'Hmusa@gmail.com', '0772173972', 'Nairobi', 'Waste Collection Ser', 'Ann', 'Ken', 2, '2025-07-28 10:38:12', 3),
(37, 30291769, 'Musa', 'Hassan', 'Hmusa@gmail.com', '0772173972', 'Nairobi', 'Waste Collection Ser', 'Angela', 'Job', 2, '2025-07-28 10:55:54', 3),
(38, 30291769, 'Musa', 'Hassan', 'Hmusa@gmail.com', '0772173972', 'Nairobi', 'Waste Collection Ser', 'Ann', 'Ken', 2, '2025-07-28 11:15:05', 3),
(39, 30291769, 'Musa', 'Hassan', 'Hmusa@gmail.com', '0772173972', 'Nairobi', 'Waste Collection Ser', 'Angela', 'Ken', 2, '2025-07-28 19:45:12', 3),
(40, 7121392, 'Njoroge', 'Kamau', 'Njorogekamau@gmail.com', '0711644357', 'Embu', 'Waste Collection Ser', 'Angela', 'Ken', 2, '2025-07-29 05:25:08', 2);

-- --------------------------------------------------------

--
-- Table structure for table `county`
--

CREATE TABLE `county` (
  `county_id` int(11) NOT NULL,
  `county_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `county`
--

INSERT INTO `county` (`county_id`, `county_name`) VALUES
(1, 'Baringo'),
(2, 'Bomet'),
(3, 'Bungoma'),
(4, 'Busia'),
(5, 'Elgeyo Marakwet'),
(6, 'Embu'),
(7, 'Garissa'),
(8, 'Homa Bay'),
(9, 'Isiolo'),
(10, 'Kajiado'),
(11, 'Kakamega'),
(12, 'Kericho'),
(13, 'Kiambu'),
(14, 'Kilifi'),
(15, 'Kirinyaga'),
(16, 'Kisii'),
(17, 'Kisumu'),
(18, 'Kitui'),
(19, 'Kwale'),
(20, 'Laikipia'),
(21, 'Lamu'),
(22, 'Machakos'),
(23, 'Makueni'),
(24, 'Mandera'),
(25, 'Meru'),
(26, 'Migori'),
(27, 'Marsabit'),
(28, 'Mombasa'),
(29, 'Muranga'),
(30, 'Nairobi'),
(31, 'Nakuru'),
(32, 'Nandi'),
(33, 'Narok'),
(34, 'Nyamira'),
(35, 'Nyandarua'),
(36, 'Nyeri'),
(37, 'Samburu'),
(38, 'Siaya'),
(39, 'Taita Taveta'),
(40, 'Tana River'),
(41, 'Tharaka Nithi'),
(42, 'Trans Nzoia'),
(43, 'Turkana'),
(44, 'Uasin Gishu'),
(45, 'Vihiga'),
(46, 'Wajir'),
(47, 'West Pokot');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idnumber` int(20) NOT NULL,
  `fname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gender` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `address` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` float NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DateofBirth` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Answer` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idnumber`, `fname`, `lname`, `gender`, `email`, `password`, `phone`, `address`, `status`, `created_on`, `DateofBirth`, `Answer`) VALUES
(7121392, 'Njoroge', 'Kamau', 'Male', 'Njorogekamau@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0711644357', 'Embu', 1, '2025-07-29 05:16:25', '2000-01-13', 'Njoro'),
(12345678, 'Michael', 'Muthomi', 'Male', 'michael@gmail.com', '0acf4539a14b3aa27deeb4cbdf6e989f', '0712345678', 'Nairobi', 1, '2025-04-21 16:04:46', '2000-12-12', 'michael'),
(28055577, 'David', 'Kaje', 'Male', 'kaje@gmail.com', 'd93bd3791218d7c3f0a5d459e411afb6', '0729555222', 'Garissa', 1, '2025-07-18 06:58:49', '2009-01-01', 'Kemu'),
(30291769, 'Musa', 'Hassan', 'Male', 'Hmusa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0772173972', 'Nairobi', 1, '2025-07-28 10:17:50', '1993-01-15', 'Mzing'),
(30980192, 'Kimathi', 'Peter', 'Male', 'kimathi@gmail.com', '5b26bf41dff9c742510a5b82f993f459', '0725884729', 'Isiolo', 1, '2025-04-29 10:05:26', '1995-01-05', 'Kim'),
(39587527, 'John', 'Doe', 'Male', 'john@gmail.com', '$2y$10$C84tC1uNfO6roZzfIzdOTu2krSZlym5n4LRIoGZXqzMHeLxsZ5RLe', '0743479744', 'Kiambu', 1, '2025-03-04 08:45:27', '1996-04-11', 'client'),
(40346892, 'Ben', 'Zakayo', 'Male', 'ben@gmail.com', '$2y$10$yJY4apUdGw85i.oQNpMSYeQi6VZiI/yC/ba3KFsFjSdz8kKDlNc26', '0769356503', 'Machakos', 1, '2024-03-19 08:33:42', '2002-05-07', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `dispatchmanager`
--

CREATE TABLE `dispatchmanager` (
  `idnumber` int(20) NOT NULL,
  `fname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gender` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `address` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` float NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DateofBirth` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Answer` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dispatchmanager`
--

INSERT INTO `dispatchmanager` (`idnumber`, `fname`, `lname`, `gender`, `email`, `password`, `phone`, `address`, `status`, `created_on`, `DateofBirth`, `Answer`) VALUES
(39589762, 'Carol', 'Wamabua', 'Female', 'carol@gmail.com', 'a9a0198010a6073db96434f6cc5f22a8', '0118868523', 'Machakos', 1, '2025-07-18 06:29:18', '1999-01-03', 'Dispatch');

-- --------------------------------------------------------

--
-- Table structure for table `dispatch_tasks`
--

CREATE TABLE `dispatch_tasks` (
  `No` int(10) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `productname` varchar(10000) NOT NULL,
  `quantity` int(255) NOT NULL,
  `dispatch` varchar(50) NOT NULL,
  `status` float NOT NULL,
  `date_allocated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `driver_status` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dispatch_tasks`
--

INSERT INTO `dispatch_tasks` (`No`, `idnumber`, `fname`, `lname`, `email`, `phone`, `address`, `productname`, `quantity`, `dispatch`, `status`, `date_allocated`, `driver_status`) VALUES
(5, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Plastic Made Pavement Blocks', 10, 'Linda', 3, '2025-04-21 23:52:26', 1),
(6, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Biopactic Eco-Bag', 6, 'Linda', 1, '2025-04-21 22:25:30', 1),
(7, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Plastic Made Pavement Blocks', 2, 'Linda', 1, '2025-04-21 22:45:00', 1),
(8, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Plastic Made Pavement Blocks<br>Biopactic Eco-Bag', 17, 'Linda', 1, '2025-04-21 23:44:40', 1),
(9, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Plastic Made Pavement Blocks<br>Biopactic Eco-Bag', 5, 'Linda', 3, '2025-04-29 09:58:52', 1),
(10, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Mini Grip', 4, 'Linda', 3, '2025-06-24 10:37:54', 1),
(11, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Plastic Capture Device', 2, 'Linda', 3, '2025-06-24 10:37:45', 1),
(12, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Biopactic Eco-Bag', 69, 'Linda', 3, '2025-06-24 12:28:28', 1),
(13, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Mini Grip', 5, 'Carol', 3, '2025-07-18 07:13:59', 1),
(14, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Plastic Made Pavement Blocks', 20, 'Carol', 0, '2025-07-22 07:49:43', 0),
(15, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Biopactic Eco-Bag', 1, 'Carol', 0, '2025-07-22 10:45:08', 0),
(16, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Mini Grip', 2, 'Carol', 3, '2025-07-22 10:49:10', 1),
(17, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Biopactic Eco-Bag', 9, 'Carol', 2, '2025-07-24 11:00:28', 1),
(18, 30291769, 'Musa', 'Hassan', 'Hmusa@gmail.com', '0772173972', 'Nairobi', 'Biopactic Eco-Bag', 40, 'Carol', 3, '2025-07-28 10:29:42', 1),
(19, 30291769, 'Musa', 'Hassan', 'Hmusa@gmail.com', '0772173972', 'Nairobi', 'Mini Grip', 3, 'Carol', 3, '2025-07-28 19:32:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `idnumber` int(20) NOT NULL,
  `fname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gender` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `address` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` float NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DateofBirth` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Answer` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`idnumber`, `fname`, `lname`, `gender`, `email`, `password`, `phone`, `address`, `status`, `created_on`, `DateofBirth`, `Answer`) VALUES
(34865868, 'Peter', 'Karanja', 'Male', 'peter@gmail.com', '51dc30ddc473d43a6011e9ebba6ca770', '0709384727', 'Kiambu', 1, '2025-07-18 06:53:49', '1998-11-09', 'Driver');

-- --------------------------------------------------------

--
-- Table structure for table `driver_tasks`
--

CREATE TABLE `driver_tasks` (
  `No` int(10) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `dispatch` varchar(50) NOT NULL,
  `driver` varchar(50) NOT NULL,
  `status` float NOT NULL,
  `date_allocated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver_tasks`
--

INSERT INTO `driver_tasks` (`No`, `idnumber`, `fname`, `lname`, `email`, `phone`, `address`, `productname`, `quantity`, `dispatch`, `driver`, `status`, `date_allocated`) VALUES
(7, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Plastic Made Pavement Blocks<br>Biopactic Eco-Bag', 17, 'Linda', 'Bill', 2, '2025-04-21 23:46:02'),
(8, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Plastic Made Pavement Blocks<br>Biopactic Eco-Bag', 5, 'Linda', 'Bill', 1, '2025-04-29 09:54:34'),
(9, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Mini Grip', 4, 'Linda', 'Bill', 2, '2025-06-24 09:44:09'),
(10, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Plastic Capture Device', 2, 'Linda', 'Bill', 2, '2025-06-24 10:36:28'),
(11, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Biopactic Eco-Bag', 69, 'Linda', 'Bill', 2, '2025-06-24 12:26:13'),
(12, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Mini Grip', 5, 'Carol', 'Peter', 2, '2025-07-18 07:12:04'),
(13, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Mini Grip', 2, 'Carol', 'Peter', 2, '2025-07-22 10:47:40'),
(14, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Biopactic Eco-Bag', 9, 'Carol', 'Peter', 2, '2025-07-24 11:00:57'),
(15, 30291769, 'Musa', 'Hassan', 'Hmusa@gmail.com', '0772173972', 'Nairobi', 'Biopactic Eco-Bag', 40, 'Carol', 'Peter', 2, '2025-07-28 10:24:51'),
(16, 30291769, 'Musa', 'Hassan', 'Hmusa@gmail.com', '0772173972', 'Nairobi', 'Mini Grip', 3, 'Carol', 'Peter', 2, '2025-07-28 19:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `examination_questions`
--

CREATE TABLE `examination_questions` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `correct_option` char(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `idnumber` int(20) NOT NULL,
  `fname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gender` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `address` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` float NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DateofBirth` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Answer` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`idnumber`, `fname`, `lname`, `gender`, `email`, `password`, `phone`, `address`, `status`, `created_on`, `DateofBirth`, `Answer`) VALUES
(27844778, 'Kimani', 'Njogu', 'Male', 'kimani@gmail.com', '547da2b03f947606f1d06a8dec093e64', '0757905638', 'Kiambu', 1, '2025-07-18 06:26:56', '1996-09-12', 'Finance');

-- --------------------------------------------------------

--
-- Table structure for table `inventorymanager`
--

CREATE TABLE `inventorymanager` (
  `idnumber` int(20) NOT NULL,
  `fname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gender` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `address` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` float NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DateofBirth` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Answer` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventorymanager`
--

INSERT INTO `inventorymanager` (`idnumber`, `fname`, `lname`, `gender`, `email`, `password`, `phone`, `address`, `status`, `created_on`, `DateofBirth`, `Answer`) VALUES
(24897743, 'Charles', 'Muriuki', 'Female', 'charles@gmail.com', 'a5410ee37744c574ba5790034ea08f79', '0795346536', 'Kiambu', 1, '2025-07-18 06:22:25', '1995-02-01', 'Inventory');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `unit` varchar(20) NOT NULL,
  `stock_quantity` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name`, `category`, `description`, `unit`, `stock_quantity`) VALUES
(1, 'Aluminum', 'Metallic', 'Lightweight metal for various applications', 'kg', 127.00),
(2, 'Steel', 'Metallic', 'Strong and durable metal for structural components', 'kg', 150.00),
(3, 'Copper', 'Metallic', 'Excellent conductor for electrical components', 'kg', 77.50),
(4, 'Iron', 'Metallic', 'Basic metal for various applications', 'kg', 200.00),
(5, 'PVC', 'Plastic', 'Polyvinyl chloride plastic for pipes and fittings', 'kg', 122.00),
(6, 'Polyethylene', 'Plastic', 'Common plastic used in packaging', 'kg', 190.00),
(7, 'Polypropylene', 'Plastic', 'Versatile plastic for containers and parts', 'kg', 100.00),
(8, 'Nylon', 'Plastic', 'Strong plastic for mechanical components', 'kg', 70.00);

-- --------------------------------------------------------

--
-- Table structure for table `materials_collected`
--

CREATE TABLE `materials_collected` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `collected_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `approved` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials_collected`
--

INSERT INTO `materials_collected` (`id`, `task_id`, `material_id`, `quantity`, `collected_at`, `approved`) VALUES
(1, 16, 1, 10, '2025-07-17 15:26:41', 1),
(2, 17, 6, 10, '2025-07-18 07:56:26', 1),
(3, 18, 7, 5, '2025-07-22 07:55:40', 0),
(4, 19, 8, 2, '2025-07-22 08:58:48', 1),
(5, 20, 5, 2, '2025-07-22 11:19:16', 1),
(6, 35, 1, 10, '2025-07-24 13:33:02', 1),
(7, 36, 3, 2, '2025-07-28 10:38:03', 1),
(8, 37, 1, 5, '2025-07-28 10:50:11', 1),
(9, 25, 1, 10, '2025-07-28 11:02:14', 0),
(10, 38, 8, 8, '2025-07-28 11:14:50', 1),
(11, 39, 7, 10, '2025-07-28 19:44:58', 1),
(12, 40, 1, 2, '2025-07-29 05:25:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `material_transactions`
--

CREATE TABLE `material_transactions` (
  `id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `transaction_type` varchar(20) NOT NULL,
  `performed_by` varchar(50) NOT NULL,
  `notes` text DEFAULT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(15) NOT NULL,
  `sender_fname` varchar(255) NOT NULL,
  `receiver_fname` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `parent_id` int(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('sent','delivered','read') NOT NULL,
  `read_at` datetime NOT NULL,
  `read_status` enum('unread','read') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_fname`, `receiver_fname`, `message`, `parent_id`, `timestamp`, `status`, `read_at`, `read_status`) VALUES
(1, 'Ben', 'Bill', 'hello', 0, '2025-04-01 13:08:57', 'sent', '0000-00-00 00:00:00', 'read'),
(2, 'Ben', 'Bill', 'when will you arrive?', 0, '2025-04-01 13:32:15', 'sent', '0000-00-00 00:00:00', 'read'),
(3, 'Bill', 'Ben', 'Hello, I\'ll be there in  2 hours', 0, '2025-04-01 13:46:07', 'sent', '0000-00-00 00:00:00', 'read'),
(4, 'Ben', 'Bill', 'Thanks', 0, '2025-04-01 14:17:57', 'sent', '0000-00-00 00:00:00', 'read'),
(5, 'Bill', 'Ben', 'Welcome', 0, '2025-04-01 14:18:39', 'sent', '0000-00-00 00:00:00', 'read'),
(6, 'David', 'Joram', 'My payment has not been approved ', 0, '2025-06-09 09:50:39', 'sent', '0000-00-00 00:00:00', 'read'),
(7, 'Joram', 'David', 'Sorry for that its sorted', 0, '2025-06-09 09:51:33', 'sent', '0000-00-00 00:00:00', 'read'),
(8, 'Musa', 'Peter', 'Still waiting on the products ', 0, '2025-07-28 10:42:10', 'sent', '0000-00-00 00:00:00', 'read'),
(9, 'Peter', 'Musa', 'I delivered them earlier ', 0, '2025-07-28 10:43:03', 'sent', '0000-00-00 00:00:00', 'read'),
(10, 'Jane', 'Kimani', 'Boss', 0, '2025-07-28 11:47:46', 'sent', '0000-00-00 00:00:00', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `products` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `totalamount` decimal(10,2) NOT NULL,
  `transactioncode` varchar(50) NOT NULL,
  `payment_status` float NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dispatch_status` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `idnumber`, `fname`, `lname`, `email`, `phone`, `address`, `products`, `price`, `quantity`, `total`, `totalamount`, `transactioncode`, `payment_status`, `date_paid`, `dispatch_status`) VALUES
(33, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', '', 0.00, '', 0.00, 250000.00, 'MYT1235677', 1, '2025-07-18 07:10:17', 1),
(34, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', '', 0.00, '', 0.00, 151000.01, 'QwA32TF21J', 1, '2025-07-22 07:31:07', 0),
(35, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', '', 0.00, '', 0.00, 100000.00, 'QWA183BDK3', 1, '2025-07-22 10:45:45', 1),
(36, 12345678, 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', '', 0.00, '', 0.00, 150.00, 'MJ28271827', 1, '2025-07-22 10:45:08', 1),
(37, 28055577, 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', '', 0.00, '', 0.00, 1350.00, 'QwARWQ123R', 1, '2025-07-24 10:57:04', 1),
(38, 30291769, 'Musa', 'Hassan', 'Hmusa@gmail.com', '0772173972', 'Nairobi', '', 0.00, '', 0.00, 6000.00, 'QWAET12454', 1, '2025-07-28 10:22:04', 1),
(39, 30291769, 'Musa', 'Hassan', 'Hmusa@gmail.com', '0772173972', 'Nairobi', '', 0.00, '', 0.00, 150000.00, 'QWSYEK1242', 1, '2025-07-28 19:28:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_name`, `price`, `quantity`, `total`) VALUES
(36, 18, 'Plastic Made Pavement Blocks', 1000.00, 10, 10000.00),
(37, 19, 'Biopactic Eco-Bag', 150.00, 6, 900.00),
(38, 20, 'Plastic Made Pavement Blocks', 1000.00, 2, 2000.00),
(39, 21, 'Plastic Made Pavement Blocks', 1000.00, 17, 17000.00),
(40, 21, 'Biopactic Eco-Bag', 150.00, 16, 2400.00),
(41, 22, 'Plastic Made Pavement Blocks', 1000.00, 5, 5000.00),
(42, 22, 'Biopactic Eco-Bag', 150.00, 2, 300.00),
(43, 24, 'Plastic Made Pavement Blocks', 1000.00, 7, 7000.00),
(44, 24, 'Biopactic Eco-Bag', 150.00, 7, 1050.00),
(45, 25, 'Plastic Made Pavement Blocks', 1000.00, 59, 59000.00),
(46, 26, 'Plastic Made Pavement Blocks', 1000.00, 59, 59000.00),
(47, 28, 'Plastic Made Pavement Blocks', 1000.00, 20, 20000.00),
(48, 29, 'Mini Grip', 50000.00, 4, 200000.00),
(49, 30, 'Plastic Capture Device', 150000.01, 2, 300000.02),
(50, 31, 'Biopactic Eco-Bag', 150.00, 69, 10350.00),
(51, 33, 'Mini Grip', 50000.00, 5, 250000.00),
(52, 34, 'Plastic Capture Device', 150000.01, 1, 150000.01),
(53, 34, 'Plastic Made Pavement Blocks', 1000.00, 1, 1000.00),
(54, 35, 'Mini Grip', 50000.00, 2, 100000.00),
(55, 36, 'Biopactic Eco-Bag', 150.00, 1, 150.00),
(56, 37, 'Biopactic Eco-Bag', 150.00, 9, 1350.00),
(57, 38, 'Biopactic Eco-Bag', 150.00, 40, 6000.00),
(58, 39, 'Mini Grip', 50000.00, 3, 150000.00);

-- --------------------------------------------------------

--
-- Table structure for table `productionmanager`
--

CREATE TABLE `productionmanager` (
  `idnumber` int(20) NOT NULL,
  `fname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gender` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `address` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` float NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DateofBirth` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Answer` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productionmanager`
--

INSERT INTO `productionmanager` (`idnumber`, `fname`, `lname`, `gender`, `email`, `password`, `phone`, `address`, `status`, `created_on`, `DateofBirth`, `Answer`) VALUES
(38917398, 'Fred', 'Juma', 'Male', 'fred@gmail.com', '570a90bfbf8c7eab5dc5d4e26832d5b1', '0752453648', 'Nairobi', 1, '2025-07-18 06:37:33', '2000-11-09', 'productionmanager');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(20) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(255) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `price`, `stock`, `last_update`, `image`) VALUES
(22, 'Biopactic Eco-Bag', 'Biodegradable packaging solution made from invasive water hyacinth, offering a sustainable alternative to conventional plastic bags.', 150.00, 500, '2025-07-28 10:19:27', 'uploads/DSC_7474_Moment-1-1024x676.jpg'),
(23, 'Plastic Made Pavement Blocks', 'Durable pavement blocks manufactured entirely from recycled plastic waste, suitable for eco-friendly construction and landscaping.', 1000.00, 120, '2025-07-28 20:05:16', 'uploads/cabro-4-1.jpg'),
(24, 'Plastic Capture Device', 'Plastic capture device for catching dirt', 150000.01, 20, '2025-07-28 11:33:54', 'uploads/capture-device.jpg'),
(25, 'Mini Grip', 'mini power supply setup ', 50000.00, 70, '2025-07-28 20:25:52', 'uploads/mini-grid.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_tasks`
--

CREATE TABLE `product_tasks` (
  `No` int(10) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `service` varchar(255) NOT NULL,
  `supervisor` varchar(20) NOT NULL,
  `cleaner` varchar(20) NOT NULL,
  `status` float NOT NULL,
  `date_allocated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tool_status` int(11) NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `quantity` text NOT NULL,
  `materials_needed` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_tasks`
--

INSERT INTO `product_tasks` (`No`, `idnumber`, `fname`, `lname`, `email`, `phone`, `address`, `service`, `supervisor`, `cleaner`, `status`, `date_allocated`, `tool_status`, `description`, `quantity`, `materials_needed`) VALUES
(15, 12, 'Jacob', 'Juma', 'jacob@gmail.com', '0752453648', '', 'Plastic Capture Device', 'Jacob', '', 0, '2025-07-15 08:49:27', 0, '', '', ''),
(16, 13, 'Jacob', 'Juma', 'jacob@gmail.com', '0752453648', '', 'Plastic Capture Device', 'Jacob', '', 3, '2025-07-15 12:21:13', 0, '', '', ''),
(17, 13, '', '', '', '', '', '', 'Jacob', 'Mary', 3, '2025-07-15 12:21:13', 0, 'Product requests', '2', 'Aluminum: 10'),
(18, 14, '', '', '', '', '', 'Mini Grid Tool', 'Fred', 'Ken', 3, '2025-07-18 07:43:05', 0, 'I need this ASAP', '50', 'Polyethylene: 10'),
(19, 15, '', '', '', '', '', '', 'Fred', 'Mark', 3, '2025-07-22 08:33:31', 0, 'Pp', '20', 'Copper: 10, Iron: 10, Steel: 10'),
(20, 21, '', '', '', '', '', '', 'Fred', 'Mark', 2, '2025-07-23 10:10:58', 0, 'Plastic Capture device', '10', 'Steel: 10'),
(21, 23, '', '', '', '', '', '', 'Fred', 'Mark', 3, '2025-07-24 13:49:40', 0, 'sdfksk', '10', 'Nylon: 10'),
(22, 24, '', '', '', '', '', '', 'Fred', 'Ken', 2, '2025-07-28 11:33:15', 0, 'Capture', '3', 'Aluminum: 10, Copper: 5, Iron: 5, Steel: 10'),
(23, 25, '', '', '', '', '', '', 'Fred', 'Ken', 3, '2025-07-28 20:03:44', 0, 'Pave', '100', 'Nylon: 5, Polypropylene: 5, PVC: 5'),
(24, 26, '', '', '', '', '', '', 'Fred', 'Mary', 3, '2025-07-28 20:23:11', 0, '12', '12', 'Nylon: 5, Polypropylene: 5, PVC: 5');

-- --------------------------------------------------------

--
-- Table structure for table `product_tenders`
--

CREATE TABLE `product_tenders` (
  `id` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `deadline` date NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `supplier_status` float NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `paidstatus` float NOT NULL,
  `applied` float NOT NULL,
  `cleaner_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_tenders`
--

INSERT INTO `product_tenders` (`id`, `title`, `description`, `quantity`, `unit_price`, `deadline`, `posted_at`, `updated_at`, `fname`, `lname`, `phone`, `email`, `supplier_status`, `Amount`, `paidstatus`, `applied`, `cleaner_status`) VALUES
(13, 'Plastic Capture Device', 'Product requests', '2', 50000.00, '2025-07-16', '2025-07-15 12:21:13', '2025-07-15 10:51:22', 'Jacob', 'Juma', '0752453648', 'jacob@gmail.com', 2, 100000.00, 0, 1, 1),
(14, 'Biopactic Eco-Bag', 'I need this ASAP', '50', 50000.00, '2025-07-19', '2025-07-18 07:43:05', '2025-07-18 07:17:07', 'Fred', 'Juma', '0752453648', 'fred@gmail.com', 2, 2500000.00, 0, 1, 1),
(15, 'Mini Grip', 'Pp', '20', 50000.00, '2025-07-25', '2025-07-28 20:25:52', '2025-07-22 08:18:55', 'Fred', 'Juma', '0752453648', 'fred@gmail.com', 3, 1000000.00, 0, 1, 1),
(16, 'Plastic Capture Device', 'Big', '13', 0.00, '2025-07-24', '2025-07-22 09:21:25', '2025-07-22 09:21:25', '', '', '', '', 0, 0.00, 0, 0, 0),
(17, 'Mini Grip', 'Mni grip', '10', 0.00, '2025-07-24', '2025-07-22 10:52:32', '2025-07-22 10:52:32', '', '', '', '', 0, 0.00, 0, 0, 0),
(18, 'Plastic Capture Device', 'capture device', '10', 0.00, '2025-07-24', '2025-07-22 11:07:17', '2025-07-22 11:07:17', '', '', '', '', 0, 0.00, 0, 0, 0),
(19, 'Mini Grip', 'Large', '67', 0.00, '2025-07-25', '2025-07-22 11:28:38', '2025-07-22 11:28:38', '', '', '', '', 0, 0.00, 0, 0, 0),
(20, 'Plastic Made Pavement Blocks', 'Pav', '12', 0.00, '2025-07-24', '2025-07-22 11:49:22', '2025-07-22 11:49:22', '', '', '', '', 0, 0.00, 0, 0, 0),
(21, 'Plastic Capture Device', 'Plastic Capture device', '10', 50000.00, '2025-07-24', '2025-07-23 10:21:21', '2025-07-23 09:29:33', 'Fred', 'Juma', '0752453648', 'fred@gmail.com', 3, 500000.00, 0, 1, 1),
(22, 'Plastic Capture Device', 'Devices ', '3', 0.00, '2025-07-25', '2025-07-24 11:19:11', '2025-07-24 11:19:11', '', '', '', '', 0, 0.00, 0, 0, 0),
(23, 'Mini Grip', 'sdfksk', '10', 100000.00, '2025-07-25', '2025-07-24 13:51:03', '2025-07-24 13:36:13', 'Fred', 'Juma', '0752453648', 'fred@gmail.com', 3, 1000000.00, 0, 1, 1),
(24, 'Plastic Capture Device', 'Capture', '3', 100000.00, '2025-07-31', '2025-07-28 11:33:54', '2025-07-28 11:21:37', 'Fred', 'Juma', '0752453648', 'fred@gmail.com', 3, 300000.00, 0, 1, 1),
(25, 'Plastic Made Pavement Blocks', 'Pave', '100', 100.00, '2025-07-31', '2025-07-28 20:05:16', '2025-07-28 19:51:04', 'Fred', 'Juma', '0752453648', 'fred@gmail.com', 3, 10000.00, 0, 1, 1),
(26, 'Plastic Made Pavement Blocks', '12', '12', 500.00, '2025-07-31', '2025-07-28 20:23:11', '2025-07-28 20:17:56', 'Fred', 'Juma', '0752453648', 'fred@gmail.com', 2, 6000.00, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `service` varchar(255) NOT NULL,
  `rating` int(20) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `fname`, `lname`, `phone`, `email`, `service`, `rating`, `feedback`, `created_at`) VALUES
(2, 'Musa', 'Hassan', '0772173972', 'Hmusa@gmail.com', 'Waste Collection Services', 4, 'Good', '2025-07-28 10:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `tool_name` text NOT NULL,
  `description` longtext NOT NULL,
  `fullname` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `request_date` date NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL DEFAULT '0',
  `idnumber` int(11) NOT NULL,
  `tool_id` int(11) NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `tool_name`, `description`, `fullname`, `quantity`, `request_date`, `status`, `idnumber`, `tool_id`, `no`) VALUES
(1, 'Garbage Bags', 'Garbage bags for holding the trash', 'Mary Mwajuma', 5, '2025-04-22', '1', 30188758, 1, 8),
(2, 'Garbage Bags', 'Garbage bags for holding the trash', 'Mary Mwajuma', 5, '2025-04-22', '1', 30188758, 1, 8),
(3, 'Garbage Bags', 'Bags for collecting trash', 'Mary Mwajuma', 10, '2025-04-29', '1', 30188758, 1, 9),
(4, 'Garbage Bags', 'Bags for collecting trash', 'Mary Mwajuma', 10, '2025-04-29', '0', 30188758, 1, 9),
(5, 'Garbage Bags', 'I would like the tool to be availed tomorrow ', 'Mary Mwajuma', 2, '2025-06-25', '1', 30188758, 1, 10),
(6, 'Garbage Bags', 'Asap', 'Sally Mumbi', 5, '2025-07-11', '1', 30897589, 1, 14),
(7, 'Garbage Bags', 'garbage bags', 'Mary Mwajuma', 20, '2025-07-18', '0', 30188758, 1, 16),
(8, 'Overalls', 'ds', 'Mary Mwajuma', 2, '2025-07-17', '0', 30188758, 2, 12),
(9, 'Garbage Bags', 'Garbage bags for waste collection', 'Mark Murithi', 5, '2025-07-25', '1', 30897590, 1, 17),
(10, 'Overalls', 'ABS', 'Ken Murimi', 2, '2025-07-24', '1', 30188758, 2, 18),
(11, 'Garbage Bags', 'Front office', 'Mark Murithi', 5, '2025-07-23', '1', 30897590, 1, 19),
(12, 'Garbage Bags', 'Kdba', 'Mark Murithi', 5, '2025-07-24', '1', 30897590, 1, 20),
(13, 'Garbage Bags', 'gb bags', 'Job Mtumishi', 10, '2025-07-22', '1', 30897589, 1, 21),
(14, 'Garbage Bags', 'garbage bags', 'Ken Murimi', 10, '2025-07-22', '1', 30188758, 1, 22),
(15, 'Garbage Bags', 'gb bags', 'Ken Murimi', 10, '2025-07-22', '2', 30188758, 1, 23),
(16, 'Garbage Bags', 'msa', 'Ken Murimi', 10, '2025-07-22', '1', 30188758, 1, 24),
(17, 'Garbage Bags', 'gb bags', 'Ken Murimi', 10, '2025-07-23', '1', 30188758, 1, 25),
(18, 'Garbage Bags', 'Garbage bags for  collection ', 'Mary Magdaline', 12, '2025-07-23', '1', 30897591, 1, 28),
(19, 'Garbage Bags', 'bags', 'Mary Magdaline', 10, '2025-07-24', '1', 30897591, 1, 27),
(20, 'Garbage Bags', 'Garbaaage Bags', 'Mary Magdaline', 2, '2025-07-24', '1', 30897591, 1, 15),
(21, 'Overalls', 'Five', 'Mark Murithi', 5, '2025-07-25', '1', 30897590, 2, 29),
(22, 'Garbage Bags', '8', 'Ken Murimi', 8, '2025-07-25', '1', 30188758, 1, 30),
(23, 'Garbage Bags', 'ksdljflks', 'Mary Magdaline', 10, '2025-07-24', '1', 30897591, 1, 35),
(24, 'Garbage Bags', 'qwjdlkj', 'Mary Magdaline', 11, '2025-07-24', '0', 30897591, 1, 32),
(25, 'Garbage Bags', 'qwjdlkj', 'Mary Magdaline', 11, '2025-07-24', '2', 30897591, 1, 32),
(26, 'Garbage Bags', 'kdjhklsh', 'Mary Magdaline', 12, '2025-07-24', '1', 30897591, 1, 33),
(27, 'Garbage Bags', 'lkdsjflajs', 'Mary Magdaline', 13, '2025-07-24', '1', 30897591, 1, 34),
(28, 'Gloves', ' Gloves', 'Ken Murimi', 2, '2025-07-29', '1', 30188758, 3, 36),
(29, 'Overalls', 'Top', 'Job Mtumishi', 5, '2025-07-31', '1', 30897589, 2, 37),
(30, 'Gloves', 'Eight', 'Ken Murimi', 8, '2025-07-30', '1', 30188758, 3, 38),
(31, 'Overalls', 'Xl', 'Ken Murimi', 3, '2025-07-31', '1', 30188758, 2, 39),
(32, 'Garbage Bags', 'Garbage', 'Ken Murimi', 10, '2025-07-30', '1', 30188758, 1, 40);

-- --------------------------------------------------------

--
-- Table structure for table `servicemanager`
--

CREATE TABLE `servicemanager` (
  `idnumber` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` float NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DateofBirth` varchar(32) NOT NULL,
  `Answer` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicemanager`
--

INSERT INTO `servicemanager` (`idnumber`, `fname`, `lname`, `gender`, `email`, `password`, `phone`, `address`, `status`, `created_on`, `DateofBirth`, `Answer`) VALUES
(30789378, 'John', 'Doe', 'Male', 'John@gmail.com', '527bd5b5d689e2c32ae974c6229ff785', '0785623678', 'Kajiado', 1, '2025-07-18 06:35:23', '1998-07-15', 'Service');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(20) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `description`, `price`, `last_update`, `status`) VALUES
(15, 'Waste Collection Services', 'Users can schedule weekly or monthly pickups for waste and recyclables. Real-time tracking of waste collectors. Feedback and rating system for collection services.', 1000.00, '2025-06-24 09:55:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `idnumber` int(20) NOT NULL,
  `fname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gender` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `address` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` float NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DateofBirth` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Answer` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`idnumber`, `fname`, `lname`, `gender`, `email`, `password`, `phone`, `address`, `status`, `created_on`, `DateofBirth`, `Answer`) VALUES
(20889647, 'Angela', 'Maina', 'Male', 'angela@gmail.com', '36388794be2cf5f298978498ff3c64a2', '1139857842', 'Nairobi', 1, '2025-07-18 06:39:54', '1990-12-09', 'Supervisor'),
(21631767, 'Ann', 'Wamoyo', 'Female', 'ann@gmail.com', '7e0d7f8a5d96c24ffcc840f31bce72b2', '0763452367', 'Meru', 1, '2025-07-22 12:29:40', '2000-01-01', 'ann');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_tasks`
--

CREATE TABLE `supervisor_tasks` (
  `No` int(10) NOT NULL,
  `idnumber` varchar(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `service` varchar(20) NOT NULL,
  `supervisor` varchar(20) NOT NULL,
  `status` float NOT NULL,
  `date_allocated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cleaner_status` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisor_tasks`
--

INSERT INTO `supervisor_tasks` (`No`, `idnumber`, `fname`, `lname`, `email`, `phone`, `address`, `service`, `supervisor`, `status`, `date_allocated`, `cleaner_status`) VALUES
(7, '12345678', 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Ser', 'Pablo', 2, '2025-04-22 02:11:45', 1),
(8, '30980192', 'Kimathi', 'Peter', 'kimathi@gmail.com', '0725884729', 'Isiolo', 'Waste Collection Ser', 'Pablo', 3, '2025-04-29 10:23:17', 1),
(9, '28055577', 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Pablo', 3, '2025-06-24 10:02:54', 1),
(10, '28055577', 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Recycling Services', 'Pablo', 2, '2025-07-10 08:37:01', 1),
(11, '28055577', 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Pablo', 3, '2025-07-10 08:35:56', 0),
(12, '28055577', 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Pablo', 1, '2025-07-15 10:18:41', 0),
(13, '28055577', 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Pablo', 0, '2025-07-15 12:23:32', 0),
(14, '28055577', 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Pablo', 1, '2025-07-17 14:43:10', 1),
(15, '12345678', 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Ser', 'Pablo', 3, '2025-07-24 12:45:24', 0),
(16, '28055577', 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Angela', 3, '2025-07-18 07:58:30', 1),
(17, '28055577', 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Angela', 0, '2025-07-22 07:48:26', 0),
(18, '28055577', 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Angela', 0, '2025-07-22 07:48:27', 0),
(19, '28055577', 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Angela', 3, '2025-07-22 09:02:47', 0),
(20, '28055577', 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Angela', 2, '2025-07-24 11:13:41', 1),
(21, '28055577', 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Angela', 2, '2025-07-22 09:00:41', 1),
(22, '28055577', 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Angela', 2, '2025-07-22 11:19:52', 1),
(23, '12345678', 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Ser', 'Angela', 3, '2025-07-22 12:47:29', 1),
(24, '12345678', 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Ser', 'Ann', 3, '2025-07-23 09:19:15', 1),
(25, '12345678', 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Ser', 'Ann', 3, '2025-07-28 11:02:40', 1),
(26, '12345678', 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Ser', 'Ann', 1, '2025-07-22 12:59:50', 1),
(27, '12345678', 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Ser', 'Ann', 3, '2025-07-24 10:54:34', 1),
(28, '12345678', 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Ser', 'Ann', 3, '2025-07-23 10:34:45', 1),
(29, '12345678', 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Ser', 'Ann', 3, '2025-07-24 11:11:54', 1),
(30, '12345678', 'Michael', 'Muthomi', 'michael@gmail.com', '0712345678', 'Nairobi', 'Waste Collection Ser', 'Ann', 3, '2025-07-24 11:42:18', 1),
(31, '28055577', 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Angela', 3, '2025-07-24 11:15:12', 1),
(32, '28055577', 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Ann', 3, '2025-07-24 12:43:45', 1),
(33, '28055577', 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Ann', 3, '2025-07-24 12:54:48', 1),
(34, '28055577', 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Ann', 3, '2025-07-24 12:57:19', 1),
(35, '28055577', 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Angela', 3, '2025-07-24 13:33:17', 1),
(36, '28055577', 'David', 'Kaje', 'kaje@gmail.com', '0729555222', 'Garissa', 'Waste Collection Ser', 'Ann', 3, '2025-07-28 10:38:12', 1),
(37, '30291769', 'Musa', 'Hassan', 'Hmusa@gmail.com', '0772173972', 'Nairobi', 'Waste Collection Ser', 'Ann', 3, '2025-07-28 10:41:05', 1),
(38, '30291769', 'Musa', 'Hassan', 'Hmusa@gmail.com', '0772173972', 'Nairobi', 'Waste Collection Ser', 'Angela', 3, '2025-07-28 11:00:58', 1),
(39, '30291769', 'Musa', 'Hassan', 'Hmusa@gmail.com', '0772173972', 'Nairobi', 'Waste Collection Ser', 'Ann', 3, '2025-07-28 11:17:51', 1),
(40, '30291769', 'Musa', 'Hassan', 'Hmusa@gmail.com', '0772173972', 'Nairobi', 'Waste Collection Ser', 'Angela', 3, '2025-07-28 19:48:14', 1),
(41, '7121392', 'Njoroge', 'Kamau', 'Njorogekamau@gmail.com', '0711644357', 'Embu', 'Waste Collection Ser', 'Angela', 1, '2025-07-29 05:21:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `idnumber` int(20) NOT NULL,
  `fname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gender` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `address` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` float NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DateofBirth` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Answer` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`idnumber`, `fname`, `lname`, `gender`, `email`, `password`, `phone`, `address`, `status`, `created_on`, `DateofBirth`, `Answer`) VALUES
(38917398, 'Jane', 'Akio', 'Female', 'jane@gmail.com', '5844a15e76563fedd11840fd6f40ea7b', '0752453648', 'Nairobi', 1, '2025-07-18 06:41:09', '2000-11-09', 'Supplier');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `id` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bankaccount` varchar(50) NOT NULL,
  `banktype` varchar(50) NOT NULL,
  `payment_status` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`id`, `title`, `description`, `quantity`, `unit_price`, `amount`, `fname`, `lname`, `phone`, `email`, `bankaccount`, `banktype`, `payment_status`, `created_at`, `updated_at`) VALUES
(2, 'Biopactic Eco-Bag', 'I want 100 pieces', 100.00, 1000.00, 100000.00, 'June', 'Atieno', '0752453648', 'june@gmail.com', '7382916648913', 'Standard', 4, '2025-06-24 10:27:29', '2025-06-24 10:27:29'),
(3, 'Garbage Bags', 'Plastic Bags for collecting trash', 20.00, 100.00, 2000.00, 'June', 'Atieno', '0752453648', 'june@gmail.com', '', '', 0, '2025-07-09 22:10:24', '2025-07-09 22:10:24'),
(4, 'Garbage Bags', 'For collecting trash', 18.00, 100.00, 1800.00, 'June', 'Atieno', '0752453648', 'june@gmail.com', '0712345678', 'mpesa', 4, '2025-07-09 23:09:25', '2025-07-09 23:09:25'),
(5, 'Garbage Bags', 'garbage bags', 2.00, 120.00, 240.00, 'June', 'Atieno', '0752453648', 'june@gmail.com', '0712345678', 'mpesa', 4, '2025-07-09 23:20:10', '2025-07-09 23:20:10'),
(6, 'Garbage Bags', 'garbage bags for dust collection', 2.00, 150.00, 300.00, 'June', 'Atieno', '0752453648', 'june@gmail.com', '0734847924', 'mpesa', 4, '2025-07-10 00:07:58', '2025-07-10 00:07:58'),
(7, 'Garbage Bags', 'Urgent!!!', 10.00, 100.00, 1000.00, 'June', 'Atieno', '0752453648', 'june@gmail.com', '', '', 0, '2025-07-15 09:57:53', '2025-07-15 09:57:53'),
(8, 'Garbage Bags', 'Urgent!!!', 10.00, 100.00, 1000.00, 'June', 'Atieno', '0752453648', 'june@gmail.com', '3219331345', 'mpesa', 4, '2025-07-15 10:01:40', '2025-07-15 10:01:40'),
(9, 'Gloves', 'Gloves for collection', 50.00, 400.00, 20000.00, 'Jane', 'Akio', '0752453648', 'jane@gmail.com', '0763546253', 'mpesa', 4, '2025-07-18 08:43:45', '2025-07-18 08:43:45'),
(10, 'Overalls', 'Two two', 10.00, 50.00, 500.00, 'Jane', 'Akio', '0752453648', 'jane@gmail.com', '0711552729', 'mpesa', 4, '2025-07-22 08:46:36', '2025-07-22 08:46:36'),
(11, 'Garbage Bags', 'GB', 12.00, 150.00, 1800.00, 'Jane', 'Akio', '0752453648', 'jane@gmail.com', '', '', 0, '2025-07-22 12:12:29', '2025-07-22 12:12:29'),
(12, 'Plastic Capture Device', 'Plastic Capture device', 10.00, 50000.00, 500000.00, 'Fred', 'Juma', '0752453648', 'fred@gmail.com', '', '', 0, '2025-07-23 10:21:21', '2025-07-23 10:21:21'),
(13, 'Garbage Bags', 'Bags G', 40.00, 100.00, 4000.00, 'Jane', 'Akio', '0752453648', 'jane@gmail.com', '8932131739', 'bank_atm', 4, '2025-07-24 11:31:14', '2025-07-24 11:31:14'),
(14, 'Mini Grip', 'sdfksk', 10.00, 100000.00, 1000000.00, 'Fred', 'Juma', '0752453648', 'fred@gmail.com', '', '', 0, '2025-07-24 13:51:03', '2025-07-24 13:51:03'),
(15, 'Garbage Bags', '1qadfad', 10.00, 150.00, 1500.00, 'Jane', 'Akio', '0752453648', 'jane@gmail.com', '', '', 0, '2025-07-24 14:02:39', '2025-07-24 14:02:39'),
(16, 'Plastic Capture Device', 'Capture', 3.00, 100000.00, 300000.00, 'Fred', 'Juma', '0752453648', 'fred@gmail.com', '', '', 0, '2025-07-28 11:33:54', '2025-07-28 11:33:54'),
(17, 'Overalls', 'Two', 2.00, 100.00, 200.00, 'Jane', 'Akio', '0752453648', 'jane@gmail.com', '0712321362', 'mpesa', 4, '2025-07-28 11:47:11', '2025-07-28 11:47:11'),
(18, 'Plastic Made Pavement Blocks', 'Pave', 100.00, 100.00, 10000.00, 'Fred', 'Juma', '0752453648', 'fred@gmail.com', '', '', 0, '2025-07-28 20:05:16', '2025-07-28 20:05:16'),
(19, 'Overalls', 'Xxxxxxxl', 21.00, 500.00, 10500.00, 'Jane', 'Akio', '0752453648', 'jane@gmail.com', '0771538381', 'mpesa', 4, '2025-07-28 20:16:01', '2025-07-28 20:16:01'),
(20, 'Mini Grip', 'Pp', 20.00, 50000.00, 1000000.00, 'Fred', 'Juma', '0752453648', 'fred@gmail.com', '', '', 0, '2025-07-28 20:25:52', '2025-07-28 20:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `tenders`
--

CREATE TABLE `tenders` (
  `id` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `deadline` date NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `supplier_status` float NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `paidstatus` float NOT NULL,
  `applied` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenders`
--

INSERT INTO `tenders` (`id`, `title`, `description`, `quantity`, `unit_price`, `deadline`, `posted_at`, `updated_at`, `fname`, `lname`, `phone`, `email`, `supplier_status`, `Amount`, `paidstatus`, `applied`) VALUES
(5, 'Garbage Bags', 'Plastic Bags for collecting trash', '20', 100.00, '2025-07-12', '2025-07-09 22:10:24', '2025-07-09 21:54:26', 'June', 'Atieno', '0752453648', 'june@gmail.com', 3, 2000.00, 0, 1),
(7, 'Garbage Bags', 'For collecting trash', '18', 100.00, '2025-07-11', '2025-07-09 22:59:15', '2025-07-09 22:15:31', 'June', 'Atieno', '0752453648', 'june@gmail.com', 3, 1800.00, 0, 1),
(8, 'Garbage Bags', 'garbage bags', '2', 120.00, '2025-07-11', '2025-07-09 23:15:44', '2025-07-09 23:10:21', 'June', 'Atieno', '0752453648', 'june@gmail.com', 3, 240.00, 0, 1),
(9, 'Garbage Bags', 'garbage bags for dust collection', '2', 150.00, '2025-07-11', '2025-07-09 23:54:58', '2025-07-09 23:41:59', 'June', 'Atieno', '0752453648', 'june@gmail.com', 3, 300.00, 0, 1),
(10, 'Garbage Bags', 'Urgent!!!', '10', 100.00, '2025-07-16', '2025-07-15 09:57:53', '2025-07-15 09:52:08', 'June', 'Atieno', '0752453648', 'june@gmail.com', 3, 1000.00, 0, 1),
(11, 'Garbage Bags', 'Urgent', '15', 0.00, '2025-07-17', '2025-07-15 12:28:00', '2025-07-15 12:28:00', '', '', '', '', 0, 0.00, 0, 0),
(12, 'Gloves', 'Gloves for collection', '50', 400.00, '2025-07-19', '2025-07-18 08:36:02', '2025-07-18 08:01:41', 'Jane', 'Akio', '0752453648', 'jane@gmail.com', 3, 20000.00, 0, 1),
(13, 'Overalls', 'Two two', '10', 50.00, '2025-07-24', '2025-07-22 08:44:15', '2025-07-22 08:39:31', 'Jane', 'Akio', '0752453648', 'jane@gmail.com', 3, 500.00, 0, 1),
(14, 'Garbage Bags', 'gb', '12', 0.00, '2025-07-23', '2025-07-22 11:57:24', '2025-07-22 11:57:24', '', '', '', '', 0, 0.00, 0, 0),
(15, 'Garbage Bags', 'GB', '12', 150.00, '2025-07-24', '2025-07-22 12:12:29', '2025-07-22 12:07:54', 'Jane', 'Akio', '0752453648', 'jane@gmail.com', 3, 1800.00, 0, 1),
(16, 'Garbage Bags', 'Bags G', '40', 100.00, '2025-07-25', '2025-07-24 11:29:10', '2025-07-24 11:25:33', 'Jane', 'Akio', '0752453648', 'jane@gmail.com', 3, 4000.00, 0, 1),
(17, 'Garbage Bags', '1qadfad', '10', 150.00, '2025-07-25', '2025-07-24 14:02:38', '2025-07-24 13:55:08', 'Jane', 'Akio', '0752453648', 'jane@gmail.com', 3, 1500.00, 0, 1),
(18, 'Overalls', 'Two', '2', 100.00, '2025-07-31', '2025-07-28 11:44:19', '2025-07-28 11:40:55', 'Jane', 'Akio', '0752453648', 'jane@gmail.com', 3, 200.00, 0, 1),
(19, 'Overalls', 'Xxxxxxxl', '21', 500.00, '2025-07-31', '2025-07-28 20:12:12', '2025-07-28 20:08:43', 'Jane', 'Akio', '0752453648', 'jane@gmail.com', 3, 10500.00, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `id` int(11) NOT NULL,
  `tool_name` text NOT NULL,
  `description` longtext NOT NULL,
  `quantity` int(11) NOT NULL,
  `last_update` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id`, `tool_name`, `description`, `quantity`, `last_update`) VALUES
(1, 'Garbage Bags', 'Garbage bags for  holding trash', 55, '2025-07-24'),
(2, 'Overalls', 'Protective clothes to protect recyclers while cleaning', 81, '2025-07-28'),
(3, 'Gloves', 'Hand protection for cleaning and collection tasts', 90, '2025-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `work_items`
--

CREATE TABLE `work_items` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_items`
--

INSERT INTO `work_items` (`id`, `task_id`, `material_id`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, 18, 6, 10.00, 0, '2025-07-18 07:22:15', '2025-07-18 07:22:15'),
(2, 19, 3, 10.00, 0, '2025-07-22 08:31:22', '2025-07-22 08:31:22'),
(3, 19, 4, 10.00, 0, '2025-07-22 08:31:22', '2025-07-22 08:31:22'),
(4, 19, 2, 10.00, 0, '2025-07-22 08:31:22', '2025-07-22 08:31:22'),
(5, 20, 2, 10.00, 0, '2025-07-23 09:59:24', '2025-07-23 09:59:24'),
(6, 21, 8, 10.00, 0, '2025-07-24 13:46:07', '2025-07-24 13:46:07'),
(7, 22, 1, 10.00, 0, '2025-07-28 11:32:01', '2025-07-28 11:32:01'),
(8, 22, 3, 5.00, 0, '2025-07-28 11:32:01', '2025-07-28 11:32:01'),
(9, 22, 4, 5.00, 0, '2025-07-28 11:32:01', '2025-07-28 11:32:01'),
(10, 22, 2, 10.00, 0, '2025-07-28 11:32:01', '2025-07-28 11:32:01'),
(11, 23, 8, 5.00, 0, '2025-07-28 20:00:02', '2025-07-28 20:00:02'),
(12, 23, 7, 5.00, 0, '2025-07-28 20:00:02', '2025-07-28 20:00:02'),
(13, 23, 5, 5.00, 0, '2025-07-28 20:00:02', '2025-07-28 20:00:02'),
(14, 24, 8, 5.00, 0, '2025-07-28 20:21:29', '2025-07-28 20:21:29'),
(15, 24, 7, 5.00, 0, '2025-07-28 20:21:29', '2025-07-28 20:21:29'),
(16, 24, 5, 5.00, 0, '2025-07-28 20:21:29', '2025-07-28 20:21:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bnote_cleaner`
--
ALTER TABLE `bnote_cleaner`
  ADD PRIMARY KEY (`idnumber`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `cleaner_tasks`
--
ALTER TABLE `cleaner_tasks`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `county`
--
ALTER TABLE `county`
  ADD PRIMARY KEY (`county_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idnumber`);

--
-- Indexes for table `dispatchmanager`
--
ALTER TABLE `dispatchmanager`
  ADD PRIMARY KEY (`idnumber`);

--
-- Indexes for table `dispatch_tasks`
--
ALTER TABLE `dispatch_tasks`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`idnumber`);

--
-- Indexes for table `driver_tasks`
--
ALTER TABLE `driver_tasks`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `examination_questions`
--
ALTER TABLE `examination_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`idnumber`);

--
-- Indexes for table `inventorymanager`
--
ALTER TABLE `inventorymanager`
  ADD PRIMARY KEY (`idnumber`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials_collected`
--
ALTER TABLE `materials_collected`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `material_id` (`material_id`);

--
-- Indexes for table `material_transactions`
--
ALTER TABLE `material_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `material_id` (`material_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `productionmanager`
--
ALTER TABLE `productionmanager`
  ADD PRIMARY KEY (`idnumber`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_tasks`
--
ALTER TABLE `product_tasks`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `product_tenders`
--
ALTER TABLE `product_tenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicemanager`
--
ALTER TABLE `servicemanager`
  ADD PRIMARY KEY (`idnumber`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`idnumber`);

--
-- Indexes for table `supervisor_tasks`
--
ALTER TABLE `supervisor_tasks`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idnumber`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenders`
--
ALTER TABLE `tenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_items`
--
ALTER TABLE `work_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `material_id` (`material_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `cleaner_tasks`
--
ALTER TABLE `cleaner_tasks`
  MODIFY `No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `county`
--
ALTER TABLE `county`
  MODIFY `county_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `dispatch_tasks`
--
ALTER TABLE `dispatch_tasks`
  MODIFY `No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `driver_tasks`
--
ALTER TABLE `driver_tasks`
  MODIFY `No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `examination_questions`
--
ALTER TABLE `examination_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `materials_collected`
--
ALTER TABLE `materials_collected`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `material_transactions`
--
ALTER TABLE `material_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_tasks`
--
ALTER TABLE `product_tasks`
  MODIFY `No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_tenders`
--
ALTER TABLE `product_tenders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `supervisor_tasks`
--
ALTER TABLE `supervisor_tasks`
  MODIFY `No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tenders`
--
ALTER TABLE `tenders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `work_items`
--
ALTER TABLE `work_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `materials_collected`
--
ALTER TABLE `materials_collected`
  ADD CONSTRAINT `materials_collected_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `cleaner_tasks` (`No`),
  ADD CONSTRAINT `materials_collected_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`);

--
-- Constraints for table `material_transactions`
--
ALTER TABLE `material_transactions`
  ADD CONSTRAINT `material_transactions_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`);

--
-- Constraints for table `work_items`
--
ALTER TABLE `work_items`
  ADD CONSTRAINT `work_items_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
