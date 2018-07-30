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
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questions_id`, `created_at`, `updated_at`, `question`, `choice_1`, `choice_2`, `choice_3`, `type`, `lang`) VALUES
(1, NULL, NULL, 'questio 1 ', 'choice 1', 'the answer', 'choice 3', 'multi', 'ar'),
(2, NULL, NULL, 'question 2', 'choice q2 1 ', 'choice q2 2', 'answer', 'multi', 'ar'),
(3, NULL, NULL, 'questio 3 ', 'choice 1', 'the answer', 'choice 3', 'multi', 'ar'),
(4, NULL, NULL, 'question 4', 'choice q2 1 ', 'choice q2 2', 'answer', 'multi', 'ar'),
(5, NULL, NULL, 'questio 5', 'choice 1', 'the answer', 'choice 3', 'multi', 'ar'),
(6, NULL, NULL, 'question 6', 'choice q2 1 ', 'choice q2 2', 'answer', 'multi', 'ar'),
(7, NULL, NULL, 'questio 7', 'choice 1', 'the answer', 'choice 3', 'multi', 'ar'),
(8, NULL, NULL, 'question 8', 'choice q2 1 ', 'choice q2 2', 'answer', 'multi', 'ar'),
(9, NULL, NULL, 'questio 9', 'choice 1', 'the answer', 'choice 3', 'multi', 'ar'),
(10, NULL, NULL, 'question 10', 'choice q2 1 ', 'choice q2 2', 'answer', 'multi', 'ar'),
(11, NULL, NULL, 'questio 1 1', 'choice 1', 'the answer', 'choice 3', 'multi', 'ar'),
(12, NULL, NULL, 'question 12', 'choice q2 1 ', 'choice q2 2', 'answer', 'multi', 'ar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questions_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questions_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
