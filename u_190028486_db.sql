-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2021 at 06:24 AM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u_190028486_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoption_requests`
--

CREATE TABLE `adoption_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `animalid` bigint(20) UNSIGNED NOT NULL,
  `status` enum('approved','denied','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adoption_requests`
--

INSERT INTO `adoption_requests` (`id`, `userid`, `animalid`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'approved', '2021-04-19 08:55:31', '2021-04-19 11:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adoptionid` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `description` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Available` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `type` enum('cat','dog','fish','rabbit','bird','other') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'other',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `adoptionid`, `name`, `date_of_birth`, `description`, `image1`, `image2`, `image3`, `image4`, `Available`, `type`, `created_at`, `updated_at`) VALUES
(1, 2, 'Peter', '2012-05-29', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'Screenshot 2021-04-18 195443_1618772178.png', 'Screenshot 2021-04-18 195428_1618772178.png', 'Screenshot 2021-04-18 195409_1618772178.png', 'Screenshot 2021-04-18 133835_1618772178.png', 'no', 'rabbit', '2021-04-18 17:56:18', '2021-04-19 11:44:38'),
(2, NULL, 'Rio', '2014-02-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'Screenshot 2021-04-18 195333_1618772277.png', 'Screenshot 2021-04-18 195318_1618772277.png', 'Screenshot 2021-04-18 195301_1618772277.png', 'Screenshot 2021-04-18 133913_1618772277.png', 'yes', 'bird', '2021-04-18 17:57:57', '2021-04-18 17:57:57'),
(3, NULL, 'Martha', '1999-06-17', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'Screenshot 2021-04-18 195234_1618772340.png', 'Screenshot 2021-04-18 195218_1618772340.png', 'Screenshot 2021-04-18 195203_1618772340.png', 'Screenshot 2021-04-14 232728_1618772340.png', 'yes', 'dog', '2021-04-18 17:59:00', '2021-04-18 17:59:00'),
(4, NULL, 'Lola', '2001-07-12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'Screenshot 2021-04-18 195129_1618772561.png', 'Screenshot 2021-04-18 195108_1618772561.png', 'Screenshot 2021-04-18 195052_1618772561.png', 'Screenshot 2021-04-14 232118_1618772561.png', 'yes', 'fish', '2021-04-18 18:02:41', '2021-04-18 18:02:41'),
(5, NULL, 'Dory', '2019-07-17', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'Screenshot 2021-04-18 194958_1618772607.png', 'Screenshot 2021-04-18 194941_1618772607.png', 'Screenshot 2021-04-18 194924_1618772607.png', 'Screenshot 2021-04-14 231714_1618772607.png', 'yes', 'fish', '2021-04-18 18:03:27', '2021-04-18 18:03:27'),
(6, NULL, 'Nemo', '1998-05-14', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'Screenshot 2021-04-14 231650_1618772749.png', 'Screenshot 2021-04-18 194807_1618772749.png', 'Screenshot 2021-04-18 194827_1618772749.png', 'Screenshot 2021-04-18 194850_1618772749.png', 'yes', 'fish', '2021-04-18 18:05:49', '2021-04-18 18:05:49'),
(7, NULL, 'Lottie', '2021-03-29', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'Screenshot 2021-04-14 231422_1618772791.png', 'Screenshot 2021-04-18 194637_1618772791.png', 'Screenshot 2021-04-18 194653_1618772791.png', 'Screenshot 2021-04-18 194715_1618772791.png', 'yes', 'other', '2021-04-18 18:06:31', '2021-04-18 18:06:31'),
(8, NULL, 'Oscar', '2017-06-15', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'Screenshot 2021-04-14 231141_1618772857.png', 'Screenshot 2021-04-18 194514_1618772857.png', 'Screenshot 2021-04-18 194602_1618772857.png', 'Screenshot 2021-04-18 194533_1618772857.png', 'yes', 'other', '2021-04-18 18:07:37', '2021-04-18 18:07:37'),
(9, NULL, 'Doggo', '2021-03-31', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'Screenshot 2021-04-13 153025_1618772965.png', 'Screenshot 2021-04-18 194329_1618772965.png', 'Screenshot 2021-04-18 194350_1618772965.png', 'Screenshot 2021-04-18 194430_1618772965.png', 'yes', 'dog', '2021-04-18 18:09:25', '2021-04-18 18:09:25'),
(10, NULL, 'Ugway', '2009-06-10', NULL, 'Screenshot 2021-04-12 140841_1618773116.png', 'Screenshot 2021-04-18 194003_1618773116.png', 'Screenshot 2021-04-18 194037_1618773116.png', 'Screenshot 2021-04-12 140841_1618773116.png', 'yes', 'other', '2021-04-18 18:11:56', '2021-04-18 18:11:56'),
(11, NULL, 'Pow', '2001-07-11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'Screenshot 2021-04-10 124555_1618820485.png', 'Screenshot 2021-04-18 193821_1618820485.png', 'Screenshot 2021-04-18 193733_1618820485.png', 'Screenshot 2021-04-18 193758_1618820485.png', 'yes', 'other', '2021-04-19 07:21:25', '2021-04-19 07:21:25'),
(12, NULL, 'Kitty', '1990-06-21', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'Screenshot 2021-04-13 153455_1618820722.png', 'Screenshot 2021-04-19 092306_1618820722.png', 'Screenshot 2021-04-19 092327_1618820722.png', 'Screenshot 2021-04-19 092350_1618820722.png', 'yes', 'cat', '2021-04-19 07:24:35', '2021-04-19 07:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2021_04_01_095952_create_animals_table', 1),
(15, '2021_04_03_142853_create_adoption_requests_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Staff', 'admin@animal.com', NULL, 1, '$2y$10$HJE.NBSSiJ4/hEoQE54oxOLT8lWYq4HTmABWKrE7qwj6enIrEeFsi', NULL, '2021-04-18 17:34:17', '2021-04-18 17:34:17'),
(2, 'Public', 'abc@gmail.com', NULL, 0, '$2y$10$un1mL7b00If/jjc.0AskDeObyUn.P/EgVJPexkdm.hUwM.vVj15ra', NULL, '2021-04-18 17:35:56', '2021-04-18 17:35:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption_requests`
--
ALTER TABLE `adoption_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adoption_requests_userid_foreign` (`userid`),
  ADD KEY `adoption_requests_animalid_foreign` (`animalid`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animals_adoptionid_foreign` (`adoptionid`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption_requests`
--
ALTER TABLE `adoption_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption_requests`
--
ALTER TABLE `adoption_requests`
  ADD CONSTRAINT `adoption_requests_animalid_foreign` FOREIGN KEY (`animalid`) REFERENCES `animals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `adoption_requests_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_adoptionid_foreign` FOREIGN KEY (`adoptionid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
