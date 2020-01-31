-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2020 at 12:15 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_luckydraw`
--

-- --------------------------------------------------------

--
-- Table structure for table `draws`
--

DROP TABLE IF EXISTS `draws`;
CREATE TABLE IF NOT EXISTS `draws` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `draws`
--

INSERT INTO `draws` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'The first lucky draw', 0, '2020-01-30 19:31:17', '2020-01-30 22:32:20'),
(2, 'The second lucky draw', 0, '2020-01-30 22:34:30', '2020-01-30 22:34:35'),
(3, 'The third lucky draw', 0, '2020-01-30 22:34:47', '2020-01-30 23:44:08'),
(4, 'The first lucky draw', 0, '2020-01-30 23:44:56', '2020-01-31 02:32:25'),
(5, 'The first lucky draw', 0, '2020-01-31 02:32:33', '2020-01-31 02:43:21'),
(6, 'Yes', 0, '2020-01-31 02:43:26', '2020-01-31 03:19:22'),
(7, 'Most amazing draw', 0, '2020-01-31 03:19:31', '2020-01-31 03:23:35'),
(8, 'Yes draw', 0, '2020-01-31 03:23:45', '2020-01-31 03:30:08'),
(9, 'Start of something new', 1, '2020-01-31 03:30:48', '2020-01-31 03:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `draw_groups`
--

DROP TABLE IF EXISTS `draw_groups`;
CREATE TABLE IF NOT EXISTS `draw_groups` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `draw_id` int(11) NOT NULL,
  `draw_member_id` int(11) DEFAULT NULL,
  `draw_prize_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `draw_groups`
--

INSERT INTO `draw_groups` (`id`, `draw_id`, `draw_member_id`, `draw_prize_id`, `created_at`, `updated_at`, `number`) VALUES
(1, 1, NULL, 6, '2020-01-30 20:36:19', '2020-01-30 20:36:19', '1440'),
(2, 1, NULL, 5, '2020-01-30 20:41:56', '2020-01-30 20:41:56', '4698'),
(3, 4, NULL, 6, '2020-01-30 23:49:48', '2020-01-30 23:49:48', '6787'),
(4, 4, NULL, 5, '2020-01-30 23:50:04', '2020-01-30 23:50:04', '7450'),
(5, 6, 18, 1, '2020-01-31 03:08:02', '2020-01-31 03:08:02', '5565'),
(6, 6, NULL, 2, '2020-01-31 03:08:16', '2020-01-31 03:08:16', '6937'),
(7, 6, 18, 3, '2020-01-31 03:08:38', '2020-01-31 03:08:38', '5565'),
(8, 6, 18, 4, '2020-01-31 03:09:07', '2020-01-31 03:09:07', '5565'),
(9, 6, 18, 5, '2020-01-31 03:11:57', '2020-01-31 03:11:57', '5565'),
(10, 7, NULL, 1, '2020-01-31 03:21:25', '2020-01-31 03:21:25', '0000'),
(11, 9, 23, 1, '2020-01-31 03:33:08', '2020-01-31 03:33:08', '1234'),
(12, 9, NULL, 2, '2020-01-31 03:33:19', '2020-01-31 03:33:19', '8501');

-- --------------------------------------------------------

--
-- Table structure for table `draw_members`
--

DROP TABLE IF EXISTS `draw_members`;
CREATE TABLE IF NOT EXISTS `draw_members` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number1` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number2` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number3` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number4` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number5` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `draw_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `draw_members`
--

INSERT INTO `draw_members` (`id`, `name`, `number1`, `number2`, `number3`, `number4`, `number5`, `total`, `created_at`, `updated_at`, `draw_id`) VALUES
(1, 'Jc', '1234', '0000', '1233', '1111', NULL, 4, '2020-01-31 01:23:26', '2020-01-31 01:23:26', 0),
(3, 'Vivke', '0023', NULL, NULL, NULL, NULL, 1, '2020-01-31 01:41:20', '2020-01-31 01:41:20', 0),
(4, 'Anas', NULL, NULL, NULL, '1253', '1165', 2, '2020-01-31 01:44:44', '2020-01-31 01:44:44', 0),
(5, 'Jcfdl', '0000', NULL, NULL, NULL, NULL, 1, '2020-01-31 02:24:56', '2020-01-31 02:24:56', 4),
(6, 'Jcfdl', '1111', '2222', '3333', '4444', '5555', 5, '2020-01-31 02:26:38', '2020-01-31 02:26:38', 4),
(7, 'Jays', '5555', NULL, NULL, NULL, NULL, 1, '2020-01-31 02:26:50', '2020-01-31 02:26:50', 4),
(8, 'Viviek', '4444', NULL, NULL, NULL, NULL, 1, '2020-01-31 02:28:50', '2020-01-31 02:28:50', 4),
(9, 'Wtf', '3333', NULL, NULL, NULL, NULL, 1, '2020-01-31 02:30:13', '2020-01-31 02:30:13', 4),
(10, 'Wise', '2222', NULL, NULL, NULL, NULL, 1, '2020-01-31 02:30:53', '2020-01-31 02:30:53', 4),
(11, 'Jcfdl', '1111', NULL, NULL, NULL, NULL, 1, '2020-01-31 02:33:38', '2020-01-31 02:33:38', 5),
(12, 'Wtf', '2222', '3333', '4444', '5555', '6666', 5, '2020-01-31 02:33:55', '2020-01-31 02:33:55', 5),
(16, 'Jcfdl', '1111', '2222', '3333', '4444', '5555', 5, '2020-01-31 02:43:49', '2020-01-31 02:43:49', 6),
(14, 'Vivke', '4444', NULL, NULL, NULL, NULL, 1, '2020-01-31 02:35:31', '2020-01-31 02:35:31', 5),
(15, 'Why', '5555', NULL, NULL, NULL, NULL, 1, '2020-01-31 02:37:26', '2020-01-31 02:37:26', 5),
(17, 'Cjfdlc', '1234', NULL, NULL, NULL, NULL, 1, '2020-01-31 02:45:33', '2020-01-31 02:45:33', 6),
(18, 'Vista', '6545', '9875', '4561', '2265', '5565', 5, '2020-01-31 02:53:49', '2020-01-31 02:53:49', 6),
(19, 'Watda', NULL, '3369', NULL, NULL, NULL, 1, '2020-01-31 02:53:58', '2020-01-31 02:53:58', 6),
(20, 'Wstalifa', NULL, '7778', NULL, '5468', NULL, 2, '2020-01-31 02:54:17', '2020-01-31 02:54:17', 6),
(21, 'Jcfdl', '1111', NULL, NULL, NULL, NULL, 1, '2020-01-31 03:24:14', '2020-01-31 03:24:14', 7),
(22, 'Jcfdl', '1111', NULL, NULL, NULL, NULL, 1, '2020-01-31 03:28:04', '2020-01-31 03:28:04', 8),
(23, 'Jcfdl', '1234', NULL, NULL, NULL, NULL, 1, '2020-01-31 03:32:55', '2020-01-31 03:32:55', 9),
(24, 'Josh', '1237', NULL, NULL, NULL, NULL, 1, '2020-01-31 04:13:31', '2020-01-31 04:13:31', 9);

-- --------------------------------------------------------

--
-- Table structure for table `draw_prizes`
--

DROP TABLE IF EXISTS `draw_prizes`;
CREATE TABLE IF NOT EXISTS `draw_prizes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `draw_prizes`
--

INSERT INTO `draw_prizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Grand prize', '2020-01-30 17:51:06', '2020-01-30 17:51:06'),
(2, 'Second prize - 1st winner', '2020-01-30 17:51:48', '2020-01-30 17:51:48'),
(3, 'Second prize - 2nd winner', '2020-01-30 17:51:57', '2020-01-30 17:51:57'),
(4, 'Third prize - 1st winner', '2020-01-30 17:52:11', '2020-01-30 19:02:40'),
(5, 'Third prize - 2nd winner', '2020-01-30 17:52:28', '2020-01-30 17:52:28'),
(6, 'Third prize - 3rd winner', '2020-01-30 17:52:41', '2020-01-30 17:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_01_30_103725_create_draws_table', 1),
(4, '2020_01_30_103737_create_draw_members_table', 1),
(5, '2020_01_30_103811_create_draw_groups_table', 1),
(6, '2020_01_30_103915_create_draw_prizes_table', 1),
(7, '2020_01_31_030853_add_winning_number_to_table_draw_group', 2),
(8, '2020_01_31_042723_change_to_nullable_draw_member_id_on_table_draw_group', 3),
(13, '2020_01_31_092149_change_numbers_to_nullable_table_draw_members', 4),
(14, '2020_01_31_093257_change_str_length_to_draw_members_table', 5),
(15, '2020_01_31_095654_add_draw_id_to_draw_members_table', 6),
(16, '2020_01_31_112213_change_string_data_type_number_draw_group', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'John', 'john@gmail.com', NULL, '$2y$10$CSsEcwQTHCFvQNagqMDZR.dYnKeW7FG4rOZXZp5Tx5rVVRJ5XXDly', 'MVc8UNrRBb2JzzIRRs5AsT0gE5De3b477rHBVPsCLej9PTXf1PbubY6lY6Wo', 1, '2020-01-30 16:02:48', '2020-01-30 16:02:48');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
