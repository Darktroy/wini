-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 27, 2018 at 10:15 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wintop`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2018_07_27_061042_create_questions_table', 2),
(9, '2018_07_27_062850_create_q_answers_table', 2),
(10, '2018_07_27_065325_create_question_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0c80b6fe8a2605852ed91b826fbb0f0c83dc041f11cd37fe4555a07ff63d2f950663e3e3342cd297', 1, 1, 'LaraPassport', '[]', 0, '2018-07-27 05:44:57', '2018-07-27 05:44:57', '2019-07-27 07:44:57'),
('13210426e4cf54dfa9d3266ec18dff35b230eca37faf3ff0873198f849940f7eb4cf262671ad93f0', 1, 1, 'LaraPassport', '[]', 0, '2018-07-27 05:42:45', '2018-07-27 05:42:45', '2019-07-27 07:42:45'),
('38a735584be0594a11825e17e0d053da6a9f459a1e0ef36cd6e2eff491101d766bdf2f4d7f718d9c', 1, 1, 'LaraPassport', '[]', 0, '2018-07-24 08:44:32', '2018-07-24 08:44:32', '2019-07-24 10:44:32'),
('4226df82477cee798e6dbe6757be4008f394653bc390d999ba3621355183a6ccbcb43da0335e7bdc', 1, 1, 'LaraPassport', '[]', 0, '2018-07-27 05:45:39', '2018-07-27 05:45:39', '2019-07-27 07:45:39'),
('486d754ea2b125654ea775d3e2803f0c91b5d63a160c7e0bc8fc39da2a06180412788609330b0177', 1, 1, 'LaraPassport', '[]', 0, '2018-07-24 09:34:12', '2018-07-24 09:34:12', '2019-07-24 11:34:12'),
('6fced3555cb8c2eaf89caca7784251cf4c8942172d0fa9be2b18dedabe0682e62c5cb4fec6326378', 5, 1, 'LaraPassport', '[]', 0, '2018-07-27 05:39:32', '2018-07-27 05:39:32', '2019-07-27 07:39:32'),
('70b1b59d8a35551644c056eb3083b6c8f65b039d11b3415af9ab55c6d5daf47236dfc6f55f127659', 1, 1, 'LaraPassport', '[]', 0, '2018-07-27 05:43:22', '2018-07-27 05:43:22', '2019-07-27 07:43:22'),
('a24490429a00775b614a10f483ba94e6403fd7b4f34152556855db67965a5b96b5e2fc2607a8f4a4', 2, 1, 'LaraPassport', '[]', 0, '2018-07-27 05:37:49', '2018-07-27 05:37:49', '2019-07-27 07:37:49'),
('a3cc3ea25c422d384ccddb869cf4362748624be2dcac1ba14d657346608bbcbe4dc316c982ec29b4', 3, 1, 'LaraPassport', '[]', 0, '2018-07-27 05:38:02', '2018-07-27 05:38:02', '2019-07-27 07:38:02'),
('b748137bf3d1fa8c1f91afb375a69346d9403038c33c1402bea02882160a8c47086d1602ffe6d599', 4, 1, 'LaraPassport', '[]', 0, '2018-07-27 05:39:21', '2018-07-27 05:39:21', '2019-07-27 07:39:21'),
('d58bc80ec9e40c89c6ea0c91904de36ba475df5a2e79ed4396aa9e5232104531153399904fa61c74', 1, 1, 'LaraPassport', '[]', 0, '2018-07-24 08:44:20', '2018-07-24 08:44:20', '2019-07-24 10:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'RtLDyzPPrVUxGWiAESNoW3QMAGyAlQ3HSKXBkfiJ', 'http://localhost', 1, 0, 0, '2018-07-24 08:13:52', '2018-07-24 08:13:52'),
(2, NULL, 'Laravel Password Grant Client', 'ziwcq1fIU7in4sT2rUa3NwQN1nN0wf4Upn97kMXs', 'http://localhost', 0, 1, 0, '2018-07-24 08:13:52', '2018-07-24 08:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-07-24 08:13:52', '2018-07-24 08:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questions_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choice_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_to_users`
--

CREATE TABLE `question_to_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `questions_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `q_answers`
--

CREATE TABLE `q_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `questions_id` int(10) UNSIGNED DEFAULT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` bigint(11) DEFAULT NULL,
  `country` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_question` int(11) NOT NULL DEFAULT '0',
  `c_level` int(11) NOT NULL DEFAULT '0',
  `score` int(11) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `country`, `c_question`, `c_level`, `score`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'wintop-admin', 'eng.iessa.mostafa@gmail.com', NULL, NULL, 0, 0, 0, '$2y$10$zBEwwas3NFBhg2SKpzYdnur2GmC5YUPmND35mMVirLgGdjVorF2c2', NULL, '2018-07-24 08:44:20', '2018-07-24 08:44:20'),
(2, 'wintop-admin', 'eng.iessa.mostafa27072018@gmail.com', 27072018, NULL, 0, 0, 0, '$2y$10$F/c247wkT4dPSGWpsmit4uBoMmo73LpyH1QE6lY.1AEegWVmsWoZ.', NULL, '2018-07-27 05:37:49', '2018-07-27 05:37:49'),
(3, 'wintop-admin', 'eng.iessa.mostafa270720182@gmail.com', 270720182, NULL, 0, 0, 0, '$2y$10$h1eGv/NwHxnYOaqdRHnfsOW7g/yfVjDMtUZaK.wSpwAXWVanE4iJu', NULL, '2018-07-27 05:38:02', '2018-07-27 05:38:02'),
(4, 'wintop-admin', 'eng.iessa.mostafa2707201823@gmail.com', 2707201823, NULL, 0, 0, 0, '$2y$10$haFiUZhkdB0mUkU5Yv1wCuTg3xTHHhtmdXG0lzordL9vnLWZIK.5i', NULL, '2018-07-27 05:39:21', '2018-07-27 05:39:21'),
(5, 'wintop-admin', 'eng.iessa.mostafa27072018231@gmail.com', 27072018123, NULL, 0, 0, 0, '$2y$10$s8naIft2NFqJbjWYFTJ6GOa3fpU6398kF0T6eOGwk95XGV39rgMGu', NULL, '2018-07-27 05:39:32', '2018-07-27 05:39:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questions_id`);

--
-- Indexes for table `question_to_users`
--
ALTER TABLE `question_to_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_to_users_questions_id_index` (`questions_id`),
  ADD KEY `question_to_users_user_id_index` (`user_id`);

--
-- Indexes for table `q_answers`
--
ALTER TABLE `q_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `q_answers_questions_id_index` (`questions_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questions_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_to_users`
--
ALTER TABLE `question_to_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `q_answers`
--
ALTER TABLE `q_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
