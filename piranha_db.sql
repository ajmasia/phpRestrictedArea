-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 19, 2018 at 04:59 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET time_zone
= "+00:00";

--
-- Database: `pirahna_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies`
(
  `policie_id` int
(10) UNSIGNED NOT NULL,
  `user_id` int
(11) NOT NULL,
  `policie_code` varchar
(50) NOT NULL,
  `policie_plan_reference` varchar
(191) NOT NULL,
  `policie_first_name` varchar
(191) NOT NULL,
  `policie_last_name` varchar
(191) NOT NULL,
  `policie_investment_house` varchar
(191) NOT NULL,
  `policie_last_operation` date NOT NULL,
  `policie_create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `policie_update_date` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON
UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff`
(
  `user_id` int
(10) UNSIGNED NOT NULL,
  `user_name` varchar
(160) NOT NULL,
  `user_email` varchar
(160) NOT NULL,
  `user_password` varchar
(160) NOT NULL,
  `user_roll` varchar
(10) NOT NULL,
  `user_create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_update_date` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON
UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
ADD PRIMARY KEY
(`policie_id`),
ADD UNIQUE KEY `policie_code`
(`policie_code`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
ADD PRIMARY KEY
(`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `policie_id` int
(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `user_id` int
(10) UNSIGNED NOT NULL AUTO_INCREMENT;
