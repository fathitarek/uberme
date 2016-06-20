-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 20, 2016 at 03:48 AM
-- Server version: 5.6.30-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uberme`
--

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE IF NOT EXISTS `invitations` (
  `invitation_id` int(11) NOT NULL,
  `invitation_content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invitations`
--

INSERT INTO `invitations` (`invitation_id`, `invitation_content`) VALUES
(1, 'hello'),
(2, 'hello2'),
(3, 'hello3');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `uuid` varchar(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`uuid`, `name`, `email`, `status`) VALUES
('324-4tfdcx-44', 'noran', 'noran@yahoo.com', 1),
('geg-5444-343d', 'fathi', 'ftarek@fcih1.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE IF NOT EXISTS `trip` (
  `product_id` varchar(100) NOT NULL,
  `pickup_location` varchar(50) NOT NULL,
  `destnation_location` varchar(50) NOT NULL,
  `trip_time` varchar(20) NOT NULL,
  `start_time` int(11) NOT NULL,
  `ennd_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`product_id`, `pickup_location`, `destnation_location`, `trip_time`, `start_time`, `ennd_time`) VALUES
('1', 'cairo', 'alex', '98', 98, 7777),
('2', 'fe', 'la', '3e', 2, 43);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$VMGdIy8E7Xw6cerCVxEwB.KHPsp02rBAPcmpZv/njWRhGhEM8RSeG', 'RIML1kyPEl4pesWoABbX6VfQMdrsstXyDrGmSMonfSyW2HfMf2WIyIVqZhDk', '2016-05-30 16:45:05', '2016-06-19 16:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_invitation_trip`
--

CREATE TABLE IF NOT EXISTS `user_invitation_trip` (
  `user_invitation_trip_id` int(11) NOT NULL,
  `invitation_id` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_invitation_trip`
--

INSERT INTO `user_invitation_trip` (`user_invitation_trip_id`, `invitation_id`, `product_id`, `uuid`) VALUES
(1, 1, '1', '324-4tfdcx-44'),
(2, 2, '1', '324-4tfdcx-44'),
(3, 3, '2', 'geg-5444-343d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`invitation_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`uuid`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_invitation_trip`
--
ALTER TABLE `user_invitation_trip`
  ADD PRIMARY KEY (`user_invitation_trip_id`),
  ADD KEY `invitation_id` (`invitation_id`),
  ADD KEY `uuid` (`uuid`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `invitation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_invitation_trip`
--
ALTER TABLE `user_invitation_trip`
  ADD CONSTRAINT `user_invitation_trip_ibfk_1` FOREIGN KEY (`invitation_id`) REFERENCES `invitations` (`invitation_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_invitation_trip_ibfk_2` FOREIGN KEY (`uuid`) REFERENCES `members` (`uuid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_invitation_trip_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `trip` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
