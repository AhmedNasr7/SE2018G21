-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2018 at 11:24 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health-tech`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `pat_id` int(11) NOT NULL,
  `dr_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clinics`
--

CREATE TABLE `clinics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(12) NOT NULL,
  `drs_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `drs_clinics_rel`
--

CREATE TABLE `drs_clinics_rel` (
  `id` int(11) NOT NULL,
  `dr_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` int(11) NOT NULL,
  `major_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pat_history`
--

CREATE TABLE `pat_history` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `pat_id` int(11) NOT NULL,
  `dr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pat_history`
--

INSERT INTO `pat_history` (`id`, `date`, `description`, `pat_id`, `dr_id`) VALUES
(1, '2018-11-30', 'hahahahahaha', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(12) NOT NULL,
  `birth_day` date NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dr_major` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `first_name`, `last_name`, `address`, `phone`, `birth_day`, `gender`, `user_id`, `dr_major`) VALUES
(2, 'Anss', 'khaled', 'blablabla', 1122334455, '2018-11-07', 1, 1, NULL),
(3, 'akram', 'gnainy', 'lalalalalalelelelele', 1122334455, '2018-11-15', 1, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `usermail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `acc_type` tinyint(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `usermail`, `password`, `acc_type`) VALUES
(1, 'anssk', 'anss.khaled00@gmail.com', 'e8e7a25a5ec2bf98f1ca9eec1b19305baf5f9a39', 0),
(2, 'akrom', 'akrom@akrom.com', '31660d49f39602f78bcdc1d024e2a85d27437f50', 1),
(5, 'anos', 'anos@anos.com', 'passasasa', 1),
(8, 'se2018g21', 'se2018g21@se.com', '7c196b1efc163950b7d7a6b582e74986c5fd4009', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pat_id` (`pat_id`),
  ADD KEY `dr_id` (`dr_id`),
  ADD KEY `clinic_id` (`clinic_id`);

--
-- Indexes for table `clinics`
--
ALTER TABLE `clinics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drs_clinics_rel`
--
ALTER TABLE `drs_clinics_rel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dr_id` (`dr_id`),
  ADD KEY `clinic_id` (`clinic_id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pat_history`
--
ALTER TABLE `pat_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pat_id` (`pat_id`),
  ADD KEY `dr_id` (`dr_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_ibfk_1` (`user_id`),
  ADD KEY `dr_major` (`dr_major`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `usermail` (`usermail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clinics`
--
ALTER TABLE `clinics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drs_clinics_rel`
--
ALTER TABLE `drs_clinics_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pat_history`
--
ALTER TABLE `pat_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`pat_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`dr_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `drs_clinics_rel`
--
ALTER TABLE `drs_clinics_rel`
  ADD CONSTRAINT `drs_clinics_rel_ibfk_1` FOREIGN KEY (`dr_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `drs_clinics_rel_ibfk_2` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pat_history`
--
ALTER TABLE `pat_history`
  ADD CONSTRAINT `pat_history_ibfk_1` FOREIGN KEY (`pat_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pat_history_ibfk_2` FOREIGN KEY (`dr_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profile_ibfk_2` FOREIGN KEY (`dr_major`) REFERENCES `majors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
