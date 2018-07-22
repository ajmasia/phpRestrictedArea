-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 22, 2018 at 07:09 PM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET time_zone
= "+00:00";

--
-- Database: `pirahna_db`
--

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
(1, 'admin', 'admin@ifa.gi', '$2y$10$7z.U6D5FEmKuND2ujOelKOMu65VYjUTfUpCdER2q.3bxULiqHy9V6', 'admin', 'Active', '0', '2018-07-19 23:45:21', '2018-07-22 16:47:21'),
(2, 'Richard Hendricks', 'richard@ifa.gi', '$2y$10$wMSAg8k43h0x5o15/syxBu6rCLLVrmwh7nTSSRaIU1hMLjfzvdYD6', 'staff', 'Active', '85d954c540a44d89154d184e8665d152', '2018-07-22 16:44:47', '2018-07-22 16:47:30'),
(3, 'Gilfoyle', 'gilfoyle@ifa.gi', '$2y$10$UsoMhqdQQ0BHiwvM3eqQ/ueweQX6lwHJXEN9mwK9TV9i3zd2rtbCS', 'staff', 'Active', '6a3352a46e8c6280bb650dc0b3193e79', '2018-07-22 16:45:09', '2018-07-22 16:47:38'),
(4, 'Dinesh', 'dinesh@ifa.gi', '$2y$10$0Dfn3XkHsgP9lXlnqC3tG.cKDRYs5L9Be4bUApqZXl6bqPaEFUZ12', 'staff', 'Active', '87ecc40464d02473cb2bff21c8cd44dd', '2018-07-22 16:45:32', '2018-07-22 16:47:45'),
(5, 'Gavin Belson', 'gavin@ifa.gi', '$2y$10$elg0Dh.iOXJBomS/n/OooeZisxlv/l93F2FxcXVMK6tAVx8nUrgRS', 'staff', 'Active', '35dd52baf2bf21215d0f4d9601a0325c', '2018-07-22 16:45:54', '2018-07-22 16:47:51'),
(6, 'Erlich Bachman', 'bachman@ifa.gi', '$2y$10$wHcMYWbBRnXSwntl/aoQoevi3BsO0cobtAB//tiLq1uUr63DnxxdG', 'staff', 'Active', '2a0826fed61a88de634c56f709982c33', '2018-07-22 17:03:57', '2018-07-22 17:09:50');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int
(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
