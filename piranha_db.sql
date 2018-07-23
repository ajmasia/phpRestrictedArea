-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 23, 2018 at 02:46 PM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET time_zone
= "+00:00";

--
-- Database: `pirahna_db`
--
CREATE DATABASE
IF NOT EXISTS `pirahna_db` DEFAULT CHARACTER
SET utf8
COLLATE utf8_general_ci;
USE `pirahna_db`;

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies`
(
  `policie_id` int
(10) UNSIGNED NOT NULL,
  `user_id` int
(11) DEFAULT NULL,
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
  `policie_last_operation` date DEFAULT NULL,
  `policie_create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `policie_update_date` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON
UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`
policie_id`,
`user_id
`, `policie_code`, `policie_plan_reference`, `policie_first_name`, `policie_last_name`, `policie_investment_house`, `policie_last_operation`, `policie_create_date`, `policie_update_date`) VALUES
(1, 2, '12345678', 'The Calpe RBS No. 247	', 'John', 'Deacon', 'Queen', NULL, '2018-07-21 15:37:34', '2018-07-22 16:48:27'),
(2, NULL, '12245679', 'The Calpe RBS No. 233	', 'Freddie', 'Mercury', 'Queen', NULL, '2018-07-21 15:37:34', '2018-07-22 18:02:48'),
(3, 2, '12315622', 'The Calpe RBS No. 200', 'Paul', 'McCartney', 'The beatles', NULL, '2018-07-21 15:40:32', '2018-07-22 16:48:29'),
(4, NULL, '12345312', 'The Calpe RBS No. 122', 'Brian', 'May', 'Queen', NULL, '2018-07-21 15:44:45', '2018-07-22 18:02:49'),
(5, 4, '12345110', 'The Calpe RBS No. 089', 'Roger', 'Taylor', 'Queen', NULL, '2018-07-21 15:44:45', '2018-07-22 16:48:06'),
(6, NULL, '12345002', 'The Calpe RBS No. 021', 'John', 'Lennon', 'The Beatles', NULL, '2018-07-21 15:46:49', '2018-07-22 17:08:09'),
(7, 3, '12345119', 'The Calpe RBS No. 023', 'George', 'Harrison', 'The Beatles', NULL, '2018-07-21 15:46:49', '2018-07-22 16:48:22'),
(8, 6, '12345666', 'The Calpe RBS No. 345', 'Ringo', 'Starr', 'The Beatles', NULL, '2018-07-21 15:48:02', '2018-07-22 17:08:00'),
(9, 5, '12345876', 'The Calpe RBS No. 199', 'Darth', 'vader', 'Star Wars', NULL, '2018-07-21 16:10:01', '2018-07-22 16:48:13'),
(10, 5, '12345989', 'The Calpe RBS No. 377', 'Ankin', 'Skywalker', 'Star Wars', NULL, '2018-07-21 16:10:01', '2018-07-22 16:48:13'),
(11, 4, '12345003', 'The Calpe RBS No. 120', 'Leia', 'Skywalker', 'Star Wars', NULL, '2018-07-21 16:14:27', '2018-07-22 18:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users`
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
  `user_status` varchar
(20) NOT NULL,
  `user_activation_key` varchar
(100) NOT NULL,
  `user_create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_update_date` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON
UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`
user_id`,
`user_name
`, `user_email`, `user_password`, `user_roll`, `user_status`, `user_activation_key`, `user_create_date`, `user_update_date`) VALUES
(1, 'admin', 'admin@ifa.gi', '$2y$10$I8zyt3QFJae2697TajDR0epo9aSTr5x0kPWbMlQTkTfRqaaaDmzMS', 'admin', 'Active', '0', '2018-07-19 23:45:21', '2018-07-22 17:21:11'),
(2, 'Richard Hendricks', 'richard@ifa.gi', '$2y$10$wMSAg8k43h0x5o15/syxBu6rCLLVrmwh7nTSSRaIU1hMLjfzvdYD6', 'staff', 'Active', '85d954c540a44d89154d184e8665d152', '2018-07-22 16:44:47', '2018-07-22 16:47:30'),
(3, 'Gilfoyle', 'gilfoyle@ifa.gi', '$2y$10$UsoMhqdQQ0BHiwvM3eqQ/ueweQX6lwHJXEN9mwK9TV9i3zd2rtbCS', 'staff', 'Active', '6a3352a46e8c6280bb650dc0b3193e79', '2018-07-22 16:45:09', '2018-07-22 16:47:38'),
(4, 'Dinesh', 'dinesh@ifa.gi', '$2y$10$0Dfn3XkHsgP9lXlnqC3tG.cKDRYs5L9Be4bUApqZXl6bqPaEFUZ12', 'staff', 'Active', '87ecc40464d02473cb2bff21c8cd44dd', '2018-07-22 16:45:32', '2018-07-22 16:47:45'),
(5, 'Gavin Belson', 'gavin@ifa.gi', '$2y$10$elg0Dh.iOXJBomS/n/OooeZisxlv/l93F2FxcXVMK6tAVx8nUrgRS', 'staff', 'Active', '35dd52baf2bf21215d0f4d9601a0325c', '2018-07-22 16:45:54', '2018-07-22 16:47:51'),
(6, 'Erlich Bachman', 'bachman@ifa.gi', '$2y$10$wHcMYWbBRnXSwntl/aoQoevi3BsO0cobtAB//tiLq1uUr63DnxxdG', 'staff', 'Active', '2a0826fed61a88de634c56f709982c33', '2018-07-22 17:03:57', '2018-07-22 17:09:50'),
(7, 'usertest', 'antoniomasiaguerrero@gmail.com', '$2y$10$/Qwcz1Q8SMqbzsPYXXZ5eul1EkpBmrDGJnu8qqQ4lxMETMKs.Pmli', 'staff', 'Active', '9de7a574f0f0fe50b0f7f77d30635525', '2018-07-22 18:04:34', '2018-07-22 18:05:00');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
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
(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int
(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
