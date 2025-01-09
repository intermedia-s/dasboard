-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2025 at 02:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monitoring_pompa`
--

-- --------------------------------------------------------

--
-- Table structure for table `pompa_prasasti`
--

CREATE TABLE `pompa_prasasti` (
  `id` int(8) UNSIGNED NOT NULL,
  `motorname` varchar(15) DEFAULT NULL,
  `passdecode` int(10) UNSIGNED NOT NULL,
  `controller_mode` enum('OFF','MANUAL','AUTO') NOT NULL,
  `waterlevel` float NOT NULL,
  `pump1_status` enum('ON','OFF') NOT NULL,
  `pump2_status` enum('ON','OFF') NOT NULL,
  `pump3_status` enum('ON','OFF') NOT NULL,
  `runhourM1` float DEFAULT NULL,
  `runhourM2` float DEFAULT NULL,
  `runhourM3` float DEFAULT NULL,
  `maintenance_hour` float DEFAULT NULL,
  `energyKW` float DEFAULT NULL,
  `energyKVA` float DEFAULT NULL,
  `apparent_power` float DEFAULT NULL,
  `voltageL1N` float DEFAULT NULL,
  `voltageL2N` float DEFAULT NULL,
  `voltageL3N` float DEFAULT NULL,
  `currentL1` float DEFAULT NULL,
  `currentL2` float DEFAULT NULL,
  `currentL3` float DEFAULT NULL,
  `set_maintainrun` varchar(10) DEFAULT NULL,
  `set_maintainage` varchar(10) DEFAULT NULL,
  `set_nominal_power` float DEFAULT NULL,
  `set_nominal_current` float DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pompa_prasasti`
--
ALTER TABLE `pompa_prasasti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pompa_prasasti`
--
ALTER TABLE `pompa_prasasti`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
