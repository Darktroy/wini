-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 30, 2018 at 10:21 AM
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
-- Table structure for table `q_answers`
--

CREATE TABLE `q_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `questions_id` int(10) UNSIGNED DEFAULT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `q_answers`
--

INSERT INTO `q_answers` (`id`, `created_at`, `updated_at`, `questions_id`, `answer`) VALUES
(2, NULL, NULL, 11, 'the answer'),
(3, NULL, NULL, 4, 'answer'),
(4, NULL, NULL, 6, 'answer'),
(5, NULL, NULL, 8, 'answer'),
(6, NULL, NULL, 10, 'answer'),
(7, NULL, NULL, 12, 'answer'),
(8, NULL, NULL, 1, 'the answer'),
(9, NULL, NULL, 3, 'the answer'),
(10, NULL, NULL, 5, 'the answer'),
(11, NULL, NULL, 7, 'the answer'),
(12, NULL, NULL, 9, 'the answer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `q_answers`
--
ALTER TABLE `q_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `q_answers_questions_id_index` (`questions_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `q_answers`
--
ALTER TABLE `q_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
