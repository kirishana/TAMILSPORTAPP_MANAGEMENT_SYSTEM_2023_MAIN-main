-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 20, 2023 at 01:11 PM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u397796223_sangamil_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_payment_methods`
--

CREATE TABLE `active_payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `bank_transfer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vipps_id` bigint(20) UNSIGNED DEFAULT NULL,
  `stripe_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qr_payment_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `active_payment_methods`
--

INSERT INTO `active_payment_methods` (`id`, `organization_id`, `status`, `bank_transfer_id`, `vipps_id`, `stripe_id`, `qr_payment_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 1, NULL, NULL, NULL, '2023-05-10 18:44:55', '2023-05-10 18:44:55'),
(2, 5, 1, NULL, NULL, NULL, 1, '2023-05-10 18:44:55', '2023-05-10 18:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `active_users`
--

CREATE TABLE `active_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `active_users`
--

INSERT INTO `active_users` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(50, 1739, NULL, NULL),
(69, 1718, NULL, NULL),
(77, 1718, NULL, NULL),
(104, 1765, NULL, NULL),
(107, 1739, NULL, NULL),
(108, 1767, NULL, NULL),
(110, 1768, NULL, NULL),
(111, 1768, NULL, NULL),
(113, 1768, NULL, NULL),
(117, 1774, NULL, NULL),
(133, 1781, NULL, NULL),
(140, 1783, NULL, NULL),
(141, 1787, NULL, NULL),
(152, 1783, NULL, NULL),
(153, 1783, NULL, NULL),
(154, 1792, NULL, NULL),
(155, 1783, NULL, NULL),
(158, 1774, NULL, NULL),
(161, 1797, NULL, NULL),
(167, 1798, NULL, NULL),
(168, 1799, NULL, NULL),
(169, 1804, NULL, NULL),
(172, 1804, NULL, NULL),
(173, 1804, NULL, NULL),
(175, 1804, NULL, NULL),
(176, 1804, NULL, NULL),
(177, 1810, NULL, NULL),
(178, 1810, NULL, NULL),
(179, 1810, NULL, NULL),
(180, 1810, NULL, NULL),
(181, 1810, NULL, NULL),
(188, 1815, NULL, NULL),
(189, 1815, NULL, NULL),
(190, 1795, NULL, NULL),
(191, 1795, NULL, NULL),
(192, 1815, NULL, NULL),
(195, 1787, NULL, NULL),
(196, 1787, NULL, NULL),
(197, 1787, NULL, NULL),
(198, 1823, NULL, NULL),
(199, 1825, NULL, NULL),
(200, 1828, NULL, NULL),
(201, 1828, NULL, NULL),
(202, 1833, NULL, NULL),
(203, 1833, NULL, NULL),
(205, 1836, NULL, NULL),
(212, 1839, NULL, NULL),
(213, 1839, NULL, NULL),
(214, 1841, NULL, NULL),
(218, 1842, NULL, NULL),
(221, 1848, NULL, NULL),
(222, 1848, NULL, NULL),
(223, 1787, NULL, NULL),
(224, 1787, NULL, NULL),
(226, 1783, NULL, NULL),
(227, 1783, NULL, NULL),
(230, 1833, NULL, NULL),
(231, 1747, NULL, NULL),
(234, 1858, NULL, NULL),
(235, 1857, NULL, NULL),
(236, 1857, NULL, NULL),
(237, 1857, NULL, NULL),
(238, 1857, NULL, NULL),
(245, 1868, NULL, NULL),
(249, 1716, NULL, NULL),
(251, 1797, NULL, NULL),
(262, 1880, NULL, NULL),
(263, 1881, NULL, NULL),
(265, 1795, NULL, NULL),
(266, 1795, NULL, NULL),
(267, 1889, NULL, NULL),
(268, 1889, NULL, NULL),
(269, 1892, NULL, NULL),
(270, 1892, NULL, NULL),
(271, 1895, NULL, NULL),
(272, 1896, NULL, NULL),
(273, 1897, NULL, NULL),
(274, 1897, NULL, NULL),
(276, 1739, NULL, NULL),
(282, 1896, NULL, NULL),
(283, 1896, NULL, NULL),
(286, 1773, NULL, NULL),
(287, 1773, NULL, NULL),
(288, 1880, NULL, NULL),
(289, 1787, NULL, NULL),
(294, 1921, NULL, NULL),
(295, 1921, NULL, NULL),
(296, 1739, NULL, NULL),
(301, 1880, NULL, NULL),
(302, 1716, NULL, NULL),
(303, 1941, NULL, NULL),
(304, 1941, NULL, NULL),
(307, 1950, NULL, NULL),
(308, 1950, NULL, NULL),
(311, 1739, NULL, NULL),
(313, 1955, NULL, NULL),
(314, 1739, NULL, NULL),
(315, 1941, NULL, NULL),
(316, 1963, NULL, NULL),
(320, 1967, NULL, NULL),
(323, 1740, NULL, NULL),
(324, 1974, NULL, NULL),
(325, 1974, NULL, NULL),
(327, 1975, NULL, NULL),
(334, 1983, NULL, NULL),
(335, 1983, NULL, NULL),
(336, 1983, NULL, NULL),
(337, 1987, NULL, NULL),
(339, 1833, NULL, NULL),
(341, 1842, NULL, NULL),
(342, 1842, NULL, NULL),
(343, 1989, NULL, NULL),
(344, 1989, NULL, NULL),
(345, 1989, NULL, NULL),
(350, 2002, NULL, NULL),
(351, 1858, NULL, NULL),
(352, 1858, NULL, NULL),
(353, 2011, NULL, NULL),
(354, 1828, NULL, NULL),
(355, 1828, NULL, NULL),
(358, 2013, NULL, NULL),
(360, 1747, NULL, NULL),
(367, 1841, NULL, NULL),
(370, 1841, NULL, NULL),
(371, 1889, NULL, NULL),
(372, 1889, NULL, NULL),
(375, 2024, NULL, NULL),
(376, 2025, NULL, NULL),
(378, 2024, NULL, NULL),
(379, 1739, NULL, NULL),
(382, 1773, NULL, NULL),
(385, 2030, NULL, NULL),
(386, 1792, NULL, NULL),
(388, 1740, NULL, NULL),
(389, 1740, NULL, NULL),
(390, 1740, NULL, NULL),
(392, 1740, NULL, NULL),
(396, 2040, NULL, NULL),
(397, 1716, NULL, NULL),
(398, 2040, NULL, NULL),
(402, 2040, NULL, NULL),
(404, 2040, NULL, NULL),
(405, 2040, NULL, NULL),
(406, 2040, NULL, NULL),
(409, 2040, NULL, NULL),
(412, 1862, NULL, NULL),
(413, 1841, NULL, NULL),
(414, 1841, NULL, NULL),
(415, 1720, NULL, NULL),
(419, 1841, NULL, NULL),
(422, 1739, NULL, NULL),
(423, 1798, NULL, NULL),
(425, 1742, NULL, NULL),
(426, 1742, NULL, NULL),
(427, 1740, NULL, NULL),
(428, 2002, NULL, NULL),
(429, 2002, NULL, NULL),
(431, 2063, NULL, NULL),
(432, 2063, NULL, NULL),
(433, 1897, NULL, NULL),
(434, 1897, NULL, NULL),
(435, 1797, NULL, NULL),
(462, 2067, NULL, NULL),
(479, 2076, NULL, NULL),
(480, 2077, NULL, NULL),
(488, 2064, NULL, NULL),
(489, 1718, NULL, NULL),
(494, 2064, NULL, NULL),
(502, 2070, NULL, NULL),
(512, 1707, NULL, NULL),
(515, 1707, NULL, NULL),
(517, 2070, NULL, NULL),
(520, 2073, NULL, NULL),
(521, 2074, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `log_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `event` varchar(255) DEFAULT NULL,
  `causer_id` int(11) DEFAULT NULL,
  `causer_type` varchar(255) DEFAULT NULL,
  `properties` text DEFAULT NULL,
  `batch_uuid` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `event`, `causer_id`, `causer_type`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'default', 'Logged Out', 1, 'App\\User', NULL, 1, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.199.65\"}}', NULL, '2023-06-14 18:01:50', '2023-06-14 18:01:50'),
(2, 'default', 'login', 1723, 'App\\User', NULL, 1723, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.199.65\"}}', NULL, '2023-06-14 18:02:03', '2023-06-14 18:02:03'),
(3, 'default', 'login', 1723, 'App\\User', NULL, 1723, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.199.65\"}}', NULL, '2023-06-14 18:12:06', '2023-06-14 18:12:06'),
(4, 'default', 'Logged Out', 1723, 'App\\User', NULL, 1723, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.199.65\"}}', NULL, '2023-06-14 18:13:25', '2023-06-14 18:13:25'),
(5, 'user_activity_log', 'updated', 1723, 'App\\User', 'updated', 1723, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"antonroy68@gmail.com\",\"ip_address\":\"112.135.199.65\"},\"old\":{\"name\":null,\"email\":\"antonroy68@gmail.com\",\"ip_address\":\"112.135.199.65\"}}', NULL, '2023-06-14 18:13:25', '2023-06-14 18:13:25'),
(6, 'user_activity_log', 'updated', 1, 'App\\User', 'updated', 1, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"admin@admin.com\",\"ip_address\":\"112.135.199.65\"},\"old\":{\"name\":null,\"email\":\"admin@admin.com\",\"ip_address\":\"112.135.199.65\"}}', NULL, '2023-06-14 18:21:38', '2023-06-14 18:21:38'),
(7, 'default', 'Logged Out', 1, 'App\\User', NULL, 1, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.199.65\"}}', NULL, '2023-06-14 18:21:41', '2023-06-14 18:21:41'),
(8, 'default', 'login', 1707, 'App\\User', NULL, 1707, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.199.65\"}}', NULL, '2023-06-14 18:22:01', '2023-06-14 18:22:01'),
(9, 'user_activity_log', 'created', 2064, 'App\\User', 'created', 1, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"tccadmin@sangamil.com\",\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-14 23:41:19', '2023-06-14 23:41:19'),
(10, 'default', 'login', 2064, 'App\\User', NULL, 2064, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-14 23:41:42', '2023-06-14 23:41:42'),
(11, 'default', 'Logged Out', 2064, 'App\\User', NULL, 2064, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-14 23:48:27', '2023-06-14 23:48:27'),
(12, 'user_activity_log', 'updated', 2064, 'App\\User', 'updated', 2064, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"tccadmin@sangamil.com\",\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"},\"old\":{\"name\":null,\"email\":\"tccadmin@sangamil.com\",\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-14 23:48:27', '2023-06-14 23:48:27'),
(13, 'default', 'login', 1736, 'App\\User', NULL, 1736, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-14 23:50:50', '2023-06-14 23:50:50'),
(14, 'default', 'Logged Out', 1736, 'App\\User', NULL, 1736, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-14 23:51:47', '2023-06-14 23:51:47'),
(15, 'user_activity_log', 'updated', 1736, 'App\\User', 'updated', 1736, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"shanmugathas@gmail.com\",\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"},\"old\":{\"name\":null,\"email\":\"shanmugathas@gmail.com\",\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-14 23:51:47', '2023-06-14 23:51:47'),
(16, 'default', 'login', 2064, 'App\\User', NULL, 2064, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 00:14:37', '2023-06-15 00:14:37'),
(17, 'user_activity_log', 'created', 2065, 'App\\User', 'created', 2064, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"judgetest@sangamil.com\",\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 00:25:33', '2023-06-15 00:25:33'),
(18, 'user_activity_log', 'created', 2066, 'App\\User', 'created', 2064, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"startertest@sangamil.com\",\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 00:26:46', '2023-06-15 00:26:46'),
(19, 'user_activity_log', 'created', 2067, 'App\\User', 'created', 2064, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"eventorgtest@sangamil.com\",\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 00:28:04', '2023-06-15 00:28:04'),
(20, 'default', 'login', 2067, 'App\\User', NULL, 2067, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 00:30:15', '2023-06-15 00:30:15'),
(21, 'default', 'login', 2067, 'App\\User', NULL, 2067, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 00:31:02', '2023-06-15 00:31:02'),
(22, 'default', 'Logged Out', 2067, 'App\\User', NULL, 2067, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 00:56:49', '2023-06-15 00:56:49'),
(23, 'user_activity_log', 'updated', 2067, 'App\\User', 'updated', 2067, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"eventorgtest@sangamil.com\",\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"},\"old\":{\"name\":null,\"email\":\"eventorgtest@sangamil.com\",\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 00:56:49', '2023-06-15 00:56:49'),
(24, 'default', 'login', 2066, 'App\\User', NULL, 2066, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 00:57:22', '2023-06-15 00:57:22'),
(25, 'default', 'Logged Out', 2066, 'App\\User', NULL, 2066, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 01:40:27', '2023-06-15 01:40:27'),
(26, 'user_activity_log', 'updated', 2066, 'App\\User', 'updated', 2066, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"startertest@sangamil.com\",\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"},\"old\":{\"name\":null,\"email\":\"startertest@sangamil.com\",\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 01:40:27', '2023-06-15 01:40:27'),
(27, 'default', 'login', 2067, 'App\\User', NULL, 2067, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 01:40:46', '2023-06-15 01:40:46'),
(28, 'default', 'Logged Out', 2064, 'App\\User', NULL, 2064, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 01:42:34', '2023-06-15 01:42:34'),
(29, 'user_activity_log', 'updated', 2064, 'App\\User', 'updated', 2064, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"tccadmin@sangamil.com\",\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"},\"old\":{\"name\":null,\"email\":\"tccadmin@sangamil.com\",\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 01:42:34', '2023-06-15 01:42:34'),
(30, 'default', 'Logged Out', 1, 'App\\User', NULL, 1, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 01:44:15', '2023-06-15 01:44:15'),
(31, 'default', 'login', 2064, 'App\\User', NULL, 2064, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 01:44:19', '2023-06-15 01:44:19'),
(32, 'default', 'Logged Out', 2067, 'App\\User', NULL, 2067, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 01:48:42', '2023-06-15 01:48:42'),
(33, 'user_activity_log', 'updated', 2067, 'App\\User', 'updated', 2067, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"eventorgtest@sangamil.com\",\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"},\"old\":{\"name\":null,\"email\":\"eventorgtest@sangamil.com\",\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 01:48:42', '2023-06-15 01:48:42'),
(34, 'default', 'login', 2067, 'App\\User', NULL, 2067, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 01:51:29', '2023-06-15 01:51:29'),
(35, 'default', 'Logged Out', 2067, 'App\\User', NULL, 2067, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 01:53:15', '2023-06-15 01:53:15'),
(36, 'user_activity_log', 'updated', 2067, 'App\\User', 'updated', 2067, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"eventorgtest@sangamil.com\",\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"},\"old\":{\"name\":null,\"email\":\"eventorgtest@sangamil.com\",\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 01:53:15', '2023-06-15 01:53:15'),
(37, 'default', 'login', 2067, 'App\\User', NULL, 2067, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 01:53:23', '2023-06-15 01:53:23'),
(38, 'default', 'login', 2064, 'App\\User', NULL, 2064, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 08:16:04', '2023-06-15 08:16:04'),
(39, 'default', 'login', 1707, 'App\\User', NULL, 1707, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.220.105\"}}', NULL, '2023-06-15 09:06:55', '2023-06-15 09:06:55'),
(40, 'user_activity_log', 'created', 2068, 'App\\User', 'created', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"001starter@gmail.com\",\"ip_address\":\"112.135.220.105\"}}', NULL, '2023-06-15 09:30:59', '2023-06-15 09:30:59'),
(41, 'user_activity_log', 'created', 2069, 'App\\User', 'created', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"002starter@gmail.com\",\"ip_address\":\"112.135.220.105\"}}', NULL, '2023-06-15 09:30:59', '2023-06-15 09:30:59'),
(42, 'user_activity_log', 'created', 2070, 'App\\User', 'created', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"003starter@gmail.com\",\"ip_address\":\"112.135.220.105\"}}', NULL, '2023-06-15 09:30:59', '2023-06-15 09:30:59'),
(43, 'user_activity_log', 'created', 2071, 'App\\User', 'created', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"001judge@gmail.com\",\"ip_address\":\"112.135.220.105\"}}', NULL, '2023-06-15 09:30:59', '2023-06-15 09:30:59'),
(44, 'user_activity_log', 'created', 2072, 'App\\User', 'created', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"002judge@gmail.com\",\"ip_address\":\"112.135.220.105\"}}', NULL, '2023-06-15 09:31:00', '2023-06-15 09:31:00'),
(45, 'user_activity_log', 'created', 2073, 'App\\User', 'created', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"003judge@gmail.com\",\"ip_address\":\"112.135.220.105\"}}', NULL, '2023-06-15 09:31:00', '2023-06-15 09:31:00'),
(46, 'user_activity_log', 'created', 2074, 'App\\User', 'created', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"004judge@gmail.com\",\"ip_address\":\"112.135.220.105\"}}', NULL, '2023-06-15 09:31:00', '2023-06-15 09:31:00'),
(47, 'user_activity_log', 'created', 2075, 'App\\User', 'created', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"005judge@gmail.com\",\"ip_address\":\"112.135.220.105\"}}', NULL, '2023-06-15 09:31:00', '2023-06-15 09:31:00'),
(48, 'default', 'login', 2072, 'App\\User', NULL, 2072, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.220.105\"}}', NULL, '2023-06-15 09:37:01', '2023-06-15 09:37:01'),
(49, 'default', 'Logged Out', 2072, 'App\\User', NULL, 2072, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.220.105\"}}', NULL, '2023-06-15 10:24:12', '2023-06-15 10:24:12'),
(50, 'default', 'login', 1707, 'App\\User', NULL, 1707, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.220.105\"}}', NULL, '2023-06-15 10:24:25', '2023-06-15 10:24:25'),
(51, 'default', 'login', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.220.105\"}}', NULL, '2023-06-15 10:27:22', '2023-06-15 10:27:22'),
(52, 'default', 'Logged Out', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.220.105\"}}', NULL, '2023-06-15 10:27:37', '2023-06-15 10:27:37'),
(53, 'default', 'Logged Out', 1707, 'App\\User', NULL, 1707, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.220.105\"}}', NULL, '2023-06-15 10:55:45', '2023-06-15 10:55:45'),
(54, 'user_activity_log', 'updated', 1707, 'App\\User', 'updated', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"tccadmin@admin.com\",\"ip_address\":\"112.135.220.105\"},\"old\":{\"name\":null,\"email\":\"tccadmin@admin.com\",\"ip_address\":\"112.135.220.105\"}}', NULL, '2023-06-15 10:55:45', '2023-06-15 10:55:45'),
(55, 'default', 'login', 2072, 'App\\User', NULL, 2072, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.220.105\"}}', NULL, '2023-06-15 10:55:52', '2023-06-15 10:55:52'),
(56, 'default', 'Logged Out', 2072, 'App\\User', NULL, 2072, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.220.105\"}}', NULL, '2023-06-15 10:55:56', '2023-06-15 10:55:56'),
(57, 'default', 'Logged Out', 1, 'App\\User', NULL, 1, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.220.105\"}}', NULL, '2023-06-15 11:00:04', '2023-06-15 11:00:04'),
(58, 'default', 'login', 1707, 'App\\User', NULL, 1707, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.220.105\"}}', NULL, '2023-06-15 11:01:22', '2023-06-15 11:01:22'),
(59, 'default', 'login', 1707, 'App\\User', NULL, 1707, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:cd2b:65a3:c552:d4b5\"}}', NULL, '2023-06-15 16:50:12', '2023-06-15 16:50:12'),
(60, 'default', 'login', 2064, 'App\\User', NULL, 2064, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 19:04:42', '2023-06-15 19:04:42'),
(61, 'user_activity_log', 'updated', 2071, 'App\\User', 'updated', 2064, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"001judge@gmail.com\",\"ip_address\":\"193.212.103.95\"},\"old\":{\"name\":null,\"email\":\"001judge@gmail.com\",\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 19:20:04', '2023-06-15 19:20:04'),
(62, 'user_activity_log', 'updated', 2068, 'App\\User', 'updated', 2064, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"001starter@gmail.com\",\"ip_address\":\"193.212.103.95\"},\"old\":{\"name\":null,\"email\":\"001starter@gmail.com\",\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 19:20:34', '2023-06-15 19:20:34'),
(63, 'default', 'login', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 19:22:02', '2023-06-15 19:22:02'),
(64, 'default', 'login', 2071, 'App\\User', NULL, 2071, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 19:22:11', '2023-06-15 19:22:11'),
(65, 'default', 'login', 2071, 'App\\User', NULL, 2071, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 19:55:17', '2023-06-15 19:55:17'),
(66, 'default', 'login', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 19:56:51', '2023-06-15 19:56:51'),
(67, 'default', 'login', 2071, 'App\\User', NULL, 2071, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 19:58:53', '2023-06-15 19:58:53'),
(68, 'user_activity_log', 'created', 2076, 'App\\User', 'created', 2064, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"stovner1@sangamil.com\",\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:00:43', '2023-06-15 20:00:43'),
(69, 'default', 'login', 2076, 'App\\User', NULL, 2076, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:02:23', '2023-06-15 20:02:23'),
(70, 'user_activity_log', 'created', 2077, 'App\\User', 'created', 2064, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"ilanthalir1@sangamil.com\",\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:02:36', '2023-06-15 20:02:36'),
(71, 'default', 'login', 2077, 'App\\User', NULL, 2077, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:02:56', '2023-06-15 20:02:56'),
(72, 'user_activity_log', 'created', 2078, 'App\\User', 'created', 2077, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":null,\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:03:43', '2023-06-15 20:03:43'),
(73, 'user_activity_log', 'created', 2079, 'App\\User', 'created', 2076, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":null,\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:03:56', '2023-06-15 20:03:56'),
(74, 'user_activity_log', 'created', 2080, 'App\\User', 'created', 2077, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":null,\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:04:12', '2023-06-15 20:04:12'),
(75, 'default', 'Registered Events', 2079, 'App\\User', NULL, 2079, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:04:23', '2023-06-15 20:04:23'),
(76, 'user_activity_log', 'created', 2081, 'App\\User', 'created', 2076, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":null,\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:04:54', '2023-06-15 20:04:54'),
(77, 'user_activity_log', 'created', 2082, 'App\\User', 'created', 2077, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":null,\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:04:54', '2023-06-15 20:04:54'),
(78, 'default', 'Registered Events', 2081, 'App\\User', NULL, 2081, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:05:07', '2023-06-15 20:05:07'),
(79, 'default', 'Registered Events', 2082, 'App\\User', NULL, 2082, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:05:19', '2023-06-15 20:05:19'),
(80, 'default', 'Registered Events', 2080, 'App\\User', NULL, 2080, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:05:37', '2023-06-15 20:05:37'),
(81, 'default', 'Registered Events', 2078, 'App\\User', NULL, 2078, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:05:52', '2023-06-15 20:05:52'),
(82, 'default', 'login', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:08:41', '2023-06-15 20:08:41'),
(83, 'default', 'Logged Out', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:28:28', '2023-06-15 20:28:28'),
(84, 'default', 'Logged Out', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:28:31', '2023-06-15 20:28:31'),
(85, 'user_activity_log', 'updated', 2072, 'App\\User', 'updated', 2064, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"002judge@gmail.com\",\"ip_address\":\"193.212.103.95\"},\"old\":{\"name\":null,\"email\":\"002judge@gmail.com\",\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:29:20', '2023-06-15 20:29:20'),
(86, 'default', 'login', 2072, 'App\\User', NULL, 2072, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:29:28', '2023-06-15 20:29:28'),
(87, 'default', 'login', 2071, 'App\\User', NULL, 2071, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:29:35', '2023-06-15 20:29:35'),
(88, 'default', 'Logged Out', 2071, 'App\\User', NULL, 2071, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:29:49', '2023-06-15 20:29:49'),
(89, 'default', 'login', 2072, 'App\\User', NULL, 2072, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:30:25', '2023-06-15 20:30:25'),
(90, 'default', 'Logged Out', 2071, 'App\\User', NULL, 2071, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:56:13', '2023-06-15 20:56:13'),
(91, 'default', 'login', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 20:57:18', '2023-06-15 20:57:18'),
(92, 'default', 'Logged Out', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 21:32:08', '2023-06-15 21:32:08'),
(93, 'default', 'Logged Out', 2071, 'App\\User', NULL, 2071, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 21:32:12', '2023-06-15 21:32:12'),
(94, 'default', 'login', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 21:32:46', '2023-06-15 21:32:46'),
(95, 'default', 'login', 2071, 'App\\User', NULL, 2071, 'App\\User', '{\"attributes\":{\"ip_address\":\"193.212.103.95\"}}', NULL, '2023-06-15 21:33:23', '2023-06-15 21:33:23'),
(96, 'default', 'Logged Out', 2064, 'App\\User', NULL, 2064, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:7501:97df:d7c0:2798\"}}', NULL, '2023-06-15 22:21:47', '2023-06-15 22:21:47'),
(97, 'user_activity_log', 'updated', 2064, 'App\\User', 'updated', 2064, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"tccadmin@sangamil.com\",\"ip_address\":\"2a01:799:10e1:1900:7501:97df:d7c0:2798\"},\"old\":{\"name\":null,\"email\":\"tccadmin@sangamil.com\",\"ip_address\":\"2a01:799:10e1:1900:7501:97df:d7c0:2798\"}}', NULL, '2023-06-15 22:21:47', '2023-06-15 22:21:47'),
(98, 'default', 'login', 2064, 'App\\User', NULL, 2064, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:7501:97df:d7c0:2798\"}}', NULL, '2023-06-16 00:37:37', '2023-06-16 00:37:37'),
(99, 'default', 'login', 1718, 'App\\User', NULL, 1718, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:7501:97df:d7c0:2798\"}}', NULL, '2023-06-16 00:39:16', '2023-06-16 00:39:16'),
(100, 'user_activity_log', 'created', 2083, 'App\\User', 'created', 1718, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":null,\"ip_address\":\"2a01:799:10e1:1900:7501:97df:d7c0:2798\"}}', NULL, '2023-06-16 00:41:25', '2023-06-16 00:41:25'),
(101, 'user_activity_log', 'created', 2084, 'App\\User', 'created', 1718, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":null,\"ip_address\":\"2a01:799:10e1:1900:7501:97df:d7c0:2798\"}}', NULL, '2023-06-16 00:43:14', '2023-06-16 00:43:14'),
(102, 'default', 'login', 1707, 'App\\User', NULL, 1707, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 05:50:16', '2023-06-16 05:50:16'),
(103, 'default', 'login', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 05:57:26', '2023-06-16 05:57:26'),
(104, 'default', 'login', 1707, 'App\\User', NULL, 1707, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 06:03:44', '2023-06-16 06:03:44'),
(105, 'default', 'login', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 06:05:14', '2023-06-16 06:05:14'),
(106, 'default', 'login', 2064, 'App\\User', NULL, 2064, 'App\\User', '{\"attributes\":{\"ip_address\":\"2a01:799:10e1:1900:7501:97df:d7c0:2798\"}}', NULL, '2023-06-16 07:48:48', '2023-06-16 07:48:48'),
(107, 'default', 'Logged Out', 1707, 'App\\User', NULL, 1707, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 09:00:23', '2023-06-16 09:00:23'),
(108, 'user_activity_log', 'updated', 1707, 'App\\User', 'updated', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"tccadmin@admin.com\",\"ip_address\":\"112.135.193.18\"},\"old\":{\"name\":null,\"email\":\"tccadmin@admin.com\",\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 09:00:23', '2023-06-16 09:00:23'),
(109, 'default', 'login', 2071, 'App\\User', NULL, 2071, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 09:00:47', '2023-06-16 09:00:47'),
(110, 'default', 'Logged Out', 2071, 'App\\User', NULL, 2071, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 09:00:56', '2023-06-16 09:00:56'),
(111, 'default', 'login', 2072, 'App\\User', NULL, 2072, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 09:01:08', '2023-06-16 09:01:08'),
(112, 'default', 'Logged Out', 2072, 'App\\User', NULL, 2072, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 09:01:19', '2023-06-16 09:01:19'),
(113, 'default', 'login', 2073, 'App\\User', NULL, 2073, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 09:01:36', '2023-06-16 09:01:36'),
(114, 'default', 'login', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 09:16:12', '2023-06-16 09:16:12'),
(115, 'default', 'Logged Out', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 09:40:57', '2023-06-16 09:40:57'),
(116, 'default', 'login', 1707, 'App\\User', NULL, 1707, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 09:41:31', '2023-06-16 09:41:31'),
(117, 'default', 'login', 2073, 'App\\User', NULL, 2073, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 09:50:10', '2023-06-16 09:50:10'),
(118, 'user_activity_log', 'updated', 2068, 'App\\User', 'updated', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"001starter@gmail.com\",\"ip_address\":\"112.135.193.18\"},\"old\":{\"name\":null,\"email\":\"001starter@gmail.com\",\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 10:45:05', '2023-06-16 10:45:05'),
(119, 'user_activity_log', 'updated', 2069, 'App\\User', 'updated', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"002starter@gmail.com\",\"ip_address\":\"112.135.193.18\"},\"old\":{\"name\":null,\"email\":\"002starter@gmail.com\",\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 10:45:36', '2023-06-16 10:45:36'),
(120, 'user_activity_log', 'updated', 2070, 'App\\User', 'updated', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"003starter@gmail.com\",\"ip_address\":\"112.135.193.18\"},\"old\":{\"name\":null,\"email\":\"003starter@gmail.com\",\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 10:45:59', '2023-06-16 10:45:59'),
(121, 'user_activity_log', 'updated', 2075, 'App\\User', 'updated', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"005judge@gmail.com\",\"ip_address\":\"112.135.193.18\"},\"old\":{\"name\":null,\"email\":\"005judge@gmail.com\",\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 10:46:24', '2023-06-16 10:46:24'),
(122, 'user_activity_log', 'updated', 2074, 'App\\User', 'updated', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"004judge@gmail.com\",\"ip_address\":\"112.135.193.18\"},\"old\":{\"name\":null,\"email\":\"004judge@gmail.com\",\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 10:46:45', '2023-06-16 10:46:45'),
(123, 'user_activity_log', 'updated', 2073, 'App\\User', 'updated', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"003judge@gmail.com\",\"ip_address\":\"112.135.193.18\"},\"old\":{\"name\":null,\"email\":\"003judge@gmail.com\",\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 10:47:07', '2023-06-16 10:47:07'),
(124, 'user_activity_log', 'updated', 2072, 'App\\User', 'updated', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"002judge@gmail.com\",\"ip_address\":\"112.135.193.18\"},\"old\":{\"name\":null,\"email\":\"002judge@gmail.com\",\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 10:47:30', '2023-06-16 10:47:30'),
(125, 'user_activity_log', 'updated', 2071, 'App\\User', 'updated', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"001judge@gmail.com\",\"ip_address\":\"112.135.193.18\"},\"old\":{\"name\":null,\"email\":\"001judge@gmail.com\",\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 10:48:24', '2023-06-16 10:48:24'),
(126, 'default', 'Logged Out', 1707, 'App\\User', NULL, 1707, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 10:48:49', '2023-06-16 10:48:49'),
(127, 'user_activity_log', 'updated', 1707, 'App\\User', 'updated', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"tccadmin@admin.com\",\"ip_address\":\"112.135.193.18\"},\"old\":{\"name\":null,\"email\":\"tccadmin@admin.com\",\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 10:48:49', '2023-06-16 10:48:49'),
(128, 'default', 'login', 1707, 'App\\User', NULL, 1707, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 10:49:05', '2023-06-16 10:49:05'),
(129, 'default', 'login', 2070, 'App\\User', NULL, 2070, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 10:57:26', '2023-06-16 10:57:26'),
(130, 'default', 'Logged Out', 2073, 'App\\User', NULL, 2073, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 13:50:40', '2023-06-16 13:50:40'),
(131, 'default', 'login', 1707, 'App\\User', NULL, 1707, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.193.18\"}}', NULL, '2023-06-16 13:50:54', '2023-06-16 13:50:54'),
(132, 'default', 'login', 1707, 'App\\User', NULL, 1707, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.205.201\"}}', NULL, '2023-06-16 15:47:03', '2023-06-16 15:47:03'),
(133, 'default', 'login', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.205.201\"}}', NULL, '2023-06-16 15:49:27', '2023-06-16 15:49:27'),
(134, 'default', 'login', 2071, 'App\\User', NULL, 2071, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.205.201\"}}', NULL, '2023-06-16 15:50:02', '2023-06-16 15:50:02'),
(135, 'default', 'login', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.209.100\"}}', NULL, '2023-06-17 08:12:49', '2023-06-17 08:12:49'),
(136, 'default', 'login', 1707, 'App\\User', NULL, 1707, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.205.69\"}}', NULL, '2023-06-19 19:46:41', '2023-06-19 19:46:41'),
(137, 'default', 'login', 2071, 'App\\User', NULL, 2071, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.205.69\"}}', NULL, '2023-06-19 19:49:29', '2023-06-19 19:49:29'),
(138, 'default', 'login', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.205.69\"}}', NULL, '2023-06-19 19:52:36', '2023-06-19 19:52:36'),
(139, 'default', 'Logged Out', 1707, 'App\\User', NULL, 1707, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.205.69\"}}', NULL, '2023-06-19 20:20:42', '2023-06-19 20:20:42'),
(140, 'user_activity_log', 'updated', 1707, 'App\\User', 'updated', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"tccadmin@admin.com\",\"ip_address\":\"112.135.205.69\"},\"old\":{\"name\":null,\"email\":\"tccadmin@admin.com\",\"ip_address\":\"112.135.205.69\"}}', NULL, '2023-06-19 20:20:42', '2023-06-19 20:20:42'),
(141, 'default', 'Logged Out', 1, 'App\\User', NULL, 1, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.205.69\"}}', NULL, '2023-06-19 20:38:44', '2023-06-19 20:38:44'),
(142, 'default', 'login', 1707, 'App\\User', NULL, 1707, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.205.69\"}}', NULL, '2023-06-19 20:38:59', '2023-06-19 20:38:59'),
(143, 'default', 'Logged Out', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.205.69\"}}', NULL, '2023-06-19 21:45:38', '2023-06-19 21:45:38'),
(144, 'default', 'login', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.207.10\"}}', NULL, '2023-06-20 07:51:43', '2023-06-20 07:51:43'),
(145, 'default', 'Logged Out', 1, 'App\\User', NULL, 1, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.207.10\"}}', NULL, '2023-06-20 08:04:08', '2023-06-20 08:04:08'),
(146, 'default', 'login', 1707, 'App\\User', NULL, 1707, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.207.10\"}}', NULL, '2023-06-20 08:04:55', '2023-06-20 08:04:55'),
(147, 'default', 'login', 2071, 'App\\User', NULL, 2071, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.207.10\"}}', NULL, '2023-06-20 08:44:12', '2023-06-20 08:44:12'),
(148, 'user_activity_log', 'updated', 2071, 'App\\User', 'updated', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"001judge@gmail.com\",\"ip_address\":\"112.135.207.10\"},\"old\":{\"name\":null,\"email\":\"001judge@gmail.com\",\"ip_address\":\"112.135.207.10\"}}', NULL, '2023-06-20 09:04:51', '2023-06-20 09:04:51'),
(149, 'user_activity_log', 'updated', 2072, 'App\\User', 'updated', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"002judge@gmail.com\",\"ip_address\":\"112.135.207.10\"},\"old\":{\"name\":null,\"email\":\"002judge@gmail.com\",\"ip_address\":\"112.135.207.10\"}}', NULL, '2023-06-20 09:05:32', '2023-06-20 09:05:32'),
(150, 'user_activity_log', 'updated', 2073, 'App\\User', 'updated', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"003judge@gmail.com\",\"ip_address\":\"112.135.207.10\"},\"old\":{\"name\":null,\"email\":\"003judge@gmail.com\",\"ip_address\":\"112.135.207.10\"}}', NULL, '2023-06-20 09:05:54', '2023-06-20 09:05:54'),
(151, 'user_activity_log', 'updated', 2074, 'App\\User', 'updated', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"004judge@gmail.com\",\"ip_address\":\"112.135.207.10\"},\"old\":{\"name\":null,\"email\":\"004judge@gmail.com\",\"ip_address\":\"112.135.207.10\"}}', NULL, '2023-06-20 09:06:18', '2023-06-20 09:06:18'),
(152, 'user_activity_log', 'updated', 2075, 'App\\User', 'updated', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"005judge@gmail.com\",\"ip_address\":\"112.135.207.10\"},\"old\":{\"name\":null,\"email\":\"005judge@gmail.com\",\"ip_address\":\"112.135.207.10\"}}', NULL, '2023-06-20 09:06:38', '2023-06-20 09:06:38'),
(153, 'user_activity_log', 'updated', 2068, 'App\\User', 'updated', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"001starter@gmail.com\",\"ip_address\":\"112.135.207.10\"},\"old\":{\"name\":null,\"email\":\"001starter@gmail.com\",\"ip_address\":\"112.135.207.10\"}}', NULL, '2023-06-20 09:07:26', '2023-06-20 09:07:26'),
(154, 'user_activity_log', 'updated', 2069, 'App\\User', 'updated', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"002starter@gmail.com\",\"ip_address\":\"112.135.207.10\"},\"old\":{\"name\":null,\"email\":\"002starter@gmail.com\",\"ip_address\":\"112.135.207.10\"}}', NULL, '2023-06-20 09:07:47', '2023-06-20 09:07:47'),
(155, 'user_activity_log', 'updated', 2070, 'App\\User', 'updated', 1707, 'App\\User', '{\"attributes\":{\"name\":null,\"email\":\"003starter@gmail.com\",\"ip_address\":\"112.135.207.10\"},\"old\":{\"name\":null,\"email\":\"003starter@gmail.com\",\"ip_address\":\"112.135.207.10\"}}', NULL, '2023-06-20 09:08:03', '2023-06-20 09:08:03'),
(156, 'default', 'login', 2070, 'App\\User', NULL, 2070, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.207.10\"}}', NULL, '2023-06-20 09:14:22', '2023-06-20 09:14:22'),
(157, 'default', 'login', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.207.10\"}}', NULL, '2023-06-20 11:08:12', '2023-06-20 11:08:12'),
(158, 'default', 'login', 2071, 'App\\User', NULL, 2071, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.207.10\"}}', NULL, '2023-06-20 11:08:33', '2023-06-20 11:08:33'),
(159, 'default', 'login', 2073, 'App\\User', NULL, 2073, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.207.10\"}}', NULL, '2023-06-20 11:11:38', '2023-06-20 11:11:38'),
(160, 'default', 'Logged Out', 2071, 'App\\User', NULL, 2071, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.207.10\"}}', NULL, '2023-06-20 13:28:02', '2023-06-20 13:28:02'),
(161, 'default', 'login', 2074, 'App\\User', NULL, 2074, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.207.10\"}}', NULL, '2023-06-20 13:28:10', '2023-06-20 13:28:10'),
(162, 'default', 'Logged Out', 2068, 'App\\User', NULL, 2068, 'App\\User', '{\"attributes\":{\"ip_address\":\"112.135.207.10\"}}', NULL, '2023-06-20 13:41:07', '2023-06-20 13:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `age_groups`
--

CREATE TABLE `age_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `age_groups`
--

INSERT INTO `age_groups` (`id`, `name`, `status`, `organization_id`, `created_at`, `updated_at`) VALUES
(1, '5', 1, 5, '2023-05-10 18:11:14', '2023-05-10 18:11:14'),
(2, '6', 1, 5, '2023-05-10 18:13:37', '2023-05-10 18:13:37'),
(3, '7', 1, 5, '2023-05-10 18:13:41', '2023-05-10 18:13:41'),
(4, '8', 1, 5, '2023-05-10 18:13:43', '2023-05-10 18:13:43'),
(5, '9', 1, 5, '2023-05-10 18:13:46', '2023-05-10 18:13:46'),
(6, '10', 1, 5, '2023-05-10 18:13:50', '2023-05-10 18:13:50'),
(7, '11', 1, 5, '2023-05-10 18:13:52', '2023-05-10 18:13:52'),
(8, '12', 1, 5, '2023-05-10 18:13:55', '2023-05-10 18:13:55'),
(9, '13', 1, 5, '2023-05-10 18:13:58', '2023-05-10 18:13:58'),
(10, '14', 1, 5, '2023-05-10 18:14:02', '2023-05-10 18:14:02'),
(11, '15', 1, 5, '2023-05-10 18:14:13', '2023-05-10 18:14:13'),
(12, '16', 1, 5, '2023-05-10 18:14:16', '2023-05-10 18:14:16'),
(13, '5-12', 1, 5, '2023-05-10 18:14:33', '2023-05-10 18:14:33'),
(14, '13-14', 1, 5, '2023-05-10 18:14:40', '2023-05-10 18:14:40'),
(15, '15-16', 1, 5, '2023-05-10 18:15:13', '2023-05-10 18:15:13'),
(16, '5-16', 1, 5, '2023-05-10 18:15:35', '2023-05-10 18:15:35'),
(17, '17-18', 1, 5, '2023-05-10 18:15:58', '2023-05-10 18:15:58'),
(18, '19-25', 1, 5, '2023-05-10 18:16:04', '2023-05-10 18:16:04'),
(19, '26-30', 1, 5, '2023-05-10 18:16:08', '2023-05-10 18:16:08'),
(20, '31-40', 1, 5, '2023-05-10 18:16:12', '2023-05-10 18:16:12'),
(21, '41-45', 1, 5, '2023-05-10 18:16:19', '2023-05-10 18:16:19'),
(22, '46-50', 1, 5, '2023-05-10 18:16:24', '2023-05-10 18:16:24'),
(23, '51-55', 1, 5, '2023-05-10 18:16:29', '2023-05-10 18:16:29'),
(24, '51-100', 1, 5, '2023-05-10 18:16:36', '2023-05-10 18:16:36'),
(25, '56-100', 1, 5, '2023-05-10 18:18:13', '2023-05-10 18:18:13'),
(26, '17-100', 1, 5, '2023-05-10 18:18:40', '2023-05-10 18:18:40'),
(27, '31-100', 1, 5, '2023-05-10 18:19:26', '2023-05-10 18:19:26'),
(28, '19-30', 1, 5, '2023-05-10 18:19:52', '2023-05-10 18:19:52'),
(29, '41-50', 1, 5, '2023-05-10 18:20:11', '2023-05-10 18:20:11'),
(30, '41-100', 1, 5, '2023-05-10 18:20:20', '2023-05-10 18:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `age_group_event`
--

CREATE TABLE `age_group_event` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `age_group_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `age_group_event`
--

INSERT INTO `age_group_event` (`id`, `event_id`, `age_group_id`, `created_at`, `updated_at`) VALUES
(90, 10, 1, NULL, NULL),
(91, 10, 2, NULL, NULL),
(92, 10, 3, NULL, NULL),
(93, 10, 4, NULL, NULL),
(94, 11, 1, NULL, NULL),
(95, 11, 2, NULL, NULL),
(96, 11, 3, NULL, NULL),
(97, 11, 4, NULL, NULL),
(98, 11, 5, NULL, NULL),
(99, 11, 6, NULL, NULL),
(100, 12, 5, NULL, NULL),
(101, 12, 6, NULL, NULL),
(102, 13, 7, NULL, NULL),
(103, 13, 8, NULL, NULL),
(104, 13, 9, NULL, NULL),
(105, 13, 10, NULL, NULL),
(106, 13, 11, NULL, NULL),
(107, 13, 12, NULL, NULL),
(108, 14, 7, NULL, NULL),
(109, 14, 8, NULL, NULL),
(110, 14, 9, NULL, NULL),
(111, 14, 10, NULL, NULL),
(112, 14, 11, NULL, NULL),
(113, 14, 12, NULL, NULL),
(114, 15, 1, NULL, NULL),
(115, 15, 2, NULL, NULL),
(116, 15, 3, NULL, NULL),
(117, 15, 4, NULL, NULL),
(118, 15, 5, NULL, NULL),
(119, 15, 6, NULL, NULL),
(120, 15, 7, NULL, NULL),
(121, 15, 8, NULL, NULL),
(122, 15, 9, NULL, NULL),
(123, 15, 10, NULL, NULL),
(124, 15, 11, NULL, NULL),
(125, 15, 12, NULL, NULL),
(126, 16, 6, NULL, NULL),
(127, 16, 7, NULL, NULL),
(128, 16, 8, NULL, NULL),
(129, 16, 9, NULL, NULL),
(130, 16, 10, NULL, NULL),
(131, 16, 11, NULL, NULL),
(132, 16, 12, NULL, NULL),
(133, 17, 7, NULL, NULL),
(134, 17, 8, NULL, NULL),
(135, 17, 9, NULL, NULL),
(136, 17, 10, NULL, NULL),
(137, 17, 11, NULL, NULL),
(138, 17, 12, NULL, NULL),
(139, 18, 13, NULL, NULL),
(140, 18, 14, NULL, NULL),
(141, 18, 15, NULL, NULL),
(142, 19, 16, NULL, NULL),
(143, 20, 16, NULL, NULL),
(144, 21, 21, NULL, NULL),
(145, 21, 22, NULL, NULL),
(146, 21, 23, NULL, NULL),
(147, 22, 17, NULL, NULL),
(148, 22, 18, NULL, NULL),
(149, 22, 19, NULL, NULL),
(150, 22, 20, NULL, NULL),
(151, 22, 21, NULL, NULL),
(152, 22, 22, NULL, NULL),
(153, 23, 23, NULL, NULL),
(154, 23, 25, NULL, NULL),
(155, 24, 24, NULL, NULL),
(156, 25, 17, NULL, NULL),
(157, 25, 18, NULL, NULL),
(158, 25, 19, NULL, NULL),
(159, 25, 20, NULL, NULL),
(160, 26, 17, NULL, NULL),
(161, 26, 18, NULL, NULL),
(162, 26, 19, NULL, NULL),
(163, 26, 20, NULL, NULL),
(164, 26, 21, NULL, NULL),
(165, 26, 22, NULL, NULL),
(166, 26, 23, NULL, NULL),
(167, 26, 25, NULL, NULL),
(168, 27, 17, NULL, NULL),
(169, 27, 18, NULL, NULL),
(170, 27, 19, NULL, NULL),
(171, 27, 20, NULL, NULL),
(172, 28, 17, NULL, NULL),
(173, 28, 18, NULL, NULL),
(174, 28, 19, NULL, NULL),
(175, 28, 20, NULL, NULL),
(176, 28, 21, NULL, NULL),
(177, 28, 22, NULL, NULL),
(178, 29, 23, NULL, NULL),
(179, 29, 25, NULL, NULL),
(180, 30, 24, NULL, NULL),
(181, 31, 17, NULL, NULL),
(182, 31, 18, NULL, NULL),
(183, 31, 19, NULL, NULL),
(184, 31, 20, NULL, NULL),
(185, 31, 21, NULL, NULL),
(186, 31, 22, NULL, NULL),
(187, 32, 23, NULL, NULL),
(188, 32, 25, NULL, NULL),
(189, 33, 24, NULL, NULL),
(190, 34, 17, NULL, NULL),
(191, 34, 18, NULL, NULL),
(192, 34, 19, NULL, NULL),
(193, 34, 20, NULL, NULL),
(194, 34, 21, NULL, NULL),
(195, 34, 22, NULL, NULL),
(196, 35, 23, NULL, NULL),
(197, 35, 25, NULL, NULL),
(198, 36, 24, NULL, NULL),
(199, 37, 17, NULL, NULL),
(200, 37, 18, NULL, NULL),
(201, 37, 19, NULL, NULL),
(202, 37, 20, NULL, NULL),
(203, 37, 24, NULL, NULL),
(204, 37, 29, NULL, NULL),
(205, 38, 17, NULL, NULL),
(206, 38, 20, NULL, NULL),
(207, 38, 28, NULL, NULL),
(208, 38, 30, NULL, NULL),
(209, 39, 26, NULL, NULL),
(210, 40, 26, NULL, NULL),
(211, 41, 27, NULL, NULL),
(212, 42, 1, NULL, NULL),
(213, 42, 2, NULL, NULL),
(214, 42, 3, NULL, NULL),
(215, 42, 4, NULL, NULL),
(216, 42, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `age_group_genders`
--

CREATE TABLE `age_group_genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `age_group_event_id` bigint(20) UNSIGNED NOT NULL,
  `gender_id` bigint(20) UNSIGNED NOT NULL,
  `judge_id` bigint(20) UNSIGNED DEFAULT NULL,
  `starter_id` bigint(20) UNSIGNED DEFAULT NULL,
  `venue_detail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 2,
  `time` time NOT NULL,
  `prize_given` tinyint(1) NOT NULL DEFAULT 0,
  `heats_final_date` date DEFAULT NULL,
  `starting_time` time NOT NULL,
  `ending_time` time NOT NULL,
  `field_events` int(11) NOT NULL,
  `track_events` int(11) NOT NULL,
  `total_events` int(11) NOT NULL,
  `first_place` varchar(255) DEFAULT NULL,
  `second_place` varchar(255) DEFAULT NULL,
  `third_place` varchar(255) DEFAULT NULL,
  `group_first_place` varchar(255) DEFAULT NULL,
  `group_second_place` varchar(255) DEFAULT NULL,
  `group_third_place` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `age_group_genders`
--

INSERT INTO `age_group_genders` (`id`, `age_group_event_id`, `gender_id`, `judge_id`, `starter_id`, `venue_detail_id`, `status`, `time`, `prize_given`, `heats_final_date`, `starting_time`, `ending_time`, `field_events`, `track_events`, `total_events`, `first_place`, `second_place`, `third_place`, `group_first_place`, `group_second_place`, `group_third_place`, `created_at`, `updated_at`) VALUES
(162, 90, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:10:56', '2023-06-20 11:44:49'),
(163, 90, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:10:56', '2023-06-20 11:46:21'),
(164, 91, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:10:56', '2023-06-20 11:47:48'),
(165, 91, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:10:56', '2023-06-20 11:48:32'),
(166, 92, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:10:56', '2023-06-20 11:49:30'),
(167, 92, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:10:56', '2023-06-20 11:50:28'),
(168, 93, 1, 2071, 2068, 1, 1, '00:00:00', 0, '0000-00-00', '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:10:56', '2023-06-20 11:56:51'),
(169, 93, 2, 2071, 2068, 1, 1, '00:00:00', 0, '0000-00-00', '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:10:56', '2023-06-20 12:11:17'),
(170, 94, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:21:20', '2023-06-20 12:12:41'),
(171, 94, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:21:20', '2023-06-20 12:15:18'),
(172, 95, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:21:20', '2023-06-20 12:16:11'),
(173, 95, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:21:20', '2023-06-20 12:16:53'),
(174, 96, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:21:20', '2023-06-20 12:20:11'),
(175, 96, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:21:20', '2023-06-20 12:20:36'),
(176, 97, 1, 2071, 2068, 2, 1, '00:00:00', 0, '0000-00-00', '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:21:20', '2023-06-20 12:26:03'),
(177, 97, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:21:20', '2023-06-20 12:21:00'),
(178, 98, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:21:20', '2023-06-20 12:21:11'),
(179, 98, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:21:20', '2023-06-20 12:31:14'),
(180, 99, 1, 2071, 2068, 1, 1, '00:00:00', 0, '0000-00-00', '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:21:20', '2023-06-20 12:48:39'),
(181, 99, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:21:20', '2023-06-20 12:59:29'),
(182, 100, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:05', '2023-06-20 12:31:48'),
(183, 100, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:05', '2023-06-20 12:59:41'),
(184, 101, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:05', '2023-06-20 12:59:53'),
(185, 101, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:05', '2023-06-20 13:00:05'),
(186, 102, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:34', '2023-06-20 13:00:17'),
(187, 102, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:34', '2023-06-20 13:00:27'),
(188, 103, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:34', '2023-06-20 12:32:02'),
(189, 103, 2, 2071, 2068, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:22:34', '2023-06-20 13:00:34'),
(190, 104, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:34', '2023-06-20 13:00:43'),
(191, 104, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:34', '2023-06-20 13:00:53'),
(192, 105, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:34', '2023-06-20 13:14:17'),
(193, 105, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:34', '2023-06-20 12:32:17'),
(194, 106, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:34', '2023-06-20 12:56:00'),
(195, 106, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:34', '2023-06-20 13:01:14'),
(196, 107, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:34', '2023-06-20 13:01:03'),
(197, 107, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:34', '2023-06-20 13:01:51'),
(198, 108, 1, 2073, 2070, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:59', '2023-06-20 09:25:43'),
(199, 108, 2, 2073, 2070, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:59', '2023-06-20 11:13:08'),
(200, 109, 1, 2073, 2070, 2, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:59', '2023-06-20 11:13:59'),
(201, 109, 2, 2073, 2070, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:22:59', '2023-06-20 11:14:51'),
(202, 110, 1, 2073, 2070, 2, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:59', '2023-06-20 11:15:42'),
(203, 110, 2, 2073, 2070, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:59', '2023-06-20 11:17:09'),
(204, 111, 1, 2073, 2070, 2, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:59', '2023-06-20 11:18:44'),
(205, 111, 2, 2073, 2070, 2, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:59', '2023-06-20 11:20:00'),
(206, 112, 1, 2073, 2070, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:59', '2023-06-20 11:21:21'),
(207, 112, 2, 2073, 2070, 2, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:22:59', '2023-06-20 11:22:07'),
(208, 113, 1, 2073, 2070, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:23:00', '2023-06-20 11:24:16'),
(209, 113, 2, 2073, 2070, 2, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:23:00', '2023-06-20 11:24:41'),
(210, 114, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 08:48:17'),
(211, 114, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 08:48:19'),
(212, 115, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 08:48:20'),
(213, 115, 2, 2072, NULL, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 11:38:32'),
(214, 116, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 09:01:11'),
(215, 116, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 09:01:13'),
(216, 117, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 09:01:15'),
(217, 117, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 09:01:16'),
(218, 118, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 09:01:18'),
(219, 118, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 09:01:19'),
(220, 119, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 09:01:20'),
(221, 119, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 09:01:22'),
(222, 120, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 09:01:23'),
(223, 120, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 09:01:24'),
(224, 121, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 09:01:26'),
(225, 121, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 09:01:28'),
(226, 122, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 09:01:30'),
(227, 122, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 09:01:31'),
(228, 123, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 09:01:32'),
(229, 123, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 09:01:33'),
(230, 124, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 09:01:34'),
(231, 124, 2, NULL, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-05-10 19:23:35'),
(232, 125, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 09:01:36'),
(233, 125, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:23:35', '2023-06-20 09:01:37'),
(234, 126, 1, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:26:10', '2023-06-20 13:43:59'),
(235, 126, 2, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:26:10', '2023-06-20 13:47:12'),
(236, 127, 1, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:26:10', '2023-06-20 13:48:26'),
(237, 127, 2, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:26:10', '2023-06-20 13:51:51'),
(238, 128, 1, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:26:10', '2023-06-20 13:50:27'),
(239, 128, 2, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:26:10', '2023-06-20 13:53:23'),
(240, 129, 1, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:26:10', '2023-06-20 13:54:07'),
(241, 129, 2, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:26:10', '2023-06-20 13:54:55'),
(242, 130, 1, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:26:10', '2023-06-20 13:55:44'),
(243, 130, 2, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:26:10', '2023-06-20 13:58:46'),
(244, 131, 1, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:26:10', '2023-06-20 14:29:36'),
(245, 131, 2, 2074, NULL, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:26:10', '2023-06-20 14:30:03'),
(246, 132, 1, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:26:10', '2023-06-20 14:30:09'),
(247, 132, 2, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:26:10', '2023-06-20 14:30:37'),
(248, 133, 1, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:26:48', '2023-06-20 14:32:29'),
(249, 133, 2, 2074, NULL, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:26:48', '2023-06-20 14:32:51'),
(250, 134, 1, NULL, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:26:48', '2023-05-10 19:26:48'),
(251, 134, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:26:48', '2023-06-20 08:58:11'),
(252, 135, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:26:48', '2023-06-20 08:58:11'),
(253, 135, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:26:48', '2023-06-20 08:58:14'),
(254, 136, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:26:48', '2023-06-20 08:59:03'),
(255, 136, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:26:48', '2023-06-20 08:58:16'),
(256, 137, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:26:48', '2023-06-20 08:58:17'),
(257, 137, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:26:48', '2023-06-20 08:58:27'),
(258, 138, 1, 2072, NULL, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:26:48', '2023-06-20 11:38:32'),
(259, 138, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:26:48', '2023-06-20 08:58:20'),
(260, 139, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:27:34', '2023-06-20 12:33:13'),
(261, 139, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:27:34', '2023-06-20 13:14:27'),
(262, 140, 1, 2071, 2068, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:27:34', '2023-06-20 12:40:09'),
(263, 140, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:27:34', '2023-06-20 12:40:30'),
(264, 141, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:27:34', '2023-06-20 12:41:04'),
(265, 141, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:27:34', '2023-06-20 12:55:20'),
(266, 142, 1, 2074, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:28:22', '2023-06-20 13:14:38'),
(267, 142, 2, 2074, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:28:22', '2023-06-20 13:14:50'),
(268, 143, 1, 2074, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:28:52', '2023-06-20 12:43:17'),
(269, 144, 2, 2074, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:29:50', '2023-06-20 13:15:52'),
(270, 145, 2, 2074, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:29:50', '2023-06-20 13:16:03'),
(271, 146, 2, 2074, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:29:50', '2023-06-20 12:55:49'),
(272, 147, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:31:45', '2023-06-20 12:56:32'),
(273, 147, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:31:45', '2023-06-20 13:18:33'),
(274, 148, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:31:46', '2023-06-20 13:17:11'),
(275, 148, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:31:46', '2023-06-20 13:23:23'),
(276, 149, 1, 2071, 2068, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:31:46', '2023-06-20 11:38:32'),
(277, 149, 2, 2071, 2068, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:31:46', '2023-06-20 11:38:32'),
(278, 150, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:31:46', '2023-06-20 12:37:37'),
(279, 150, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:31:46', '2023-06-20 13:16:39'),
(280, 151, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:31:46', '2023-06-20 13:17:45'),
(281, 151, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:31:46', '2023-06-20 13:01:27'),
(282, 152, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:31:46', '2023-06-20 13:16:49'),
(283, 152, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:31:46', '2023-06-20 13:17:00'),
(284, 153, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:32:22', '2023-06-20 13:18:23'),
(285, 154, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:32:22', '2023-06-20 12:56:10'),
(286, 155, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:32:42', '2023-06-20 13:18:56'),
(287, 156, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:33:23', '2023-06-20 13:16:16'),
(288, 157, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:33:23', '2023-06-20 12:42:55'),
(289, 158, 2, 2071, 2068, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:33:23', '2023-06-20 11:38:32'),
(290, 159, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:33:23', '2023-06-20 13:18:46'),
(291, 160, 1, 2073, 2070, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:36:13', '2023-06-20 11:26:04'),
(292, 161, 1, 2073, 2070, 2, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:36:13', '2023-06-20 11:26:45'),
(293, 162, 1, 2073, 2070, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:36:13', '2023-06-20 11:27:11'),
(294, 163, 1, 2073, 2070, 2, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:36:13', '2023-06-20 11:27:32'),
(295, 164, 1, 2073, 2070, 2, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:36:13', '2023-06-20 11:28:09'),
(296, 165, 1, 2073, 2070, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:36:13', '2023-06-20 11:28:41'),
(297, 166, 1, 2073, 2070, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:36:13', '2023-06-20 11:28:53'),
(298, 167, 1, 2073, 2070, 2, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:36:13', '2023-06-20 11:31:16'),
(299, 168, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '10', '5', '3', '2023-05-10 19:37:04', '2023-06-15 20:31:33'),
(300, 168, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:37:04', '2023-06-20 09:01:39'),
(301, 169, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:37:04', '2023-06-20 09:01:40'),
(302, 169, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:37:04', '2023-06-20 09:01:41'),
(303, 170, 1, 2072, NULL, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:37:04', '2023-06-20 11:38:32'),
(304, 170, 2, 2072, NULL, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:37:04', '2023-06-20 11:38:32'),
(305, 171, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:37:04', '2023-06-20 09:01:44'),
(306, 171, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:37:04', '2023-06-20 09:01:45'),
(307, 172, 1, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:38:10', '2023-06-20 14:33:30'),
(308, 172, 2, 2074, NULL, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:38:10', '2023-06-20 11:38:32'),
(309, 173, 1, 2074, NULL, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:38:10', '2023-06-20 14:33:59'),
(310, 173, 2, 2074, NULL, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:38:10', '2023-06-20 14:34:03'),
(311, 174, 1, 2074, NULL, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:38:10', '2023-06-20 14:34:07'),
(312, 174, 2, 2074, NULL, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:38:10', '2023-06-20 11:38:32'),
(313, 175, 1, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:38:10', '2023-06-20 14:34:15'),
(314, 175, 2, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:38:10', '2023-06-20 14:36:01'),
(315, 176, 1, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:38:10', '2023-06-20 14:38:08'),
(316, 176, 2, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:38:10', '2023-06-20 14:38:43'),
(317, 177, 1, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:38:10', '2023-06-20 14:39:29'),
(318, 177, 2, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:38:10', '2023-06-20 14:40:12'),
(319, 178, 1, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:38:40', '2023-06-20 14:40:38'),
(320, 179, 1, 2074, NULL, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:38:40', '2023-06-20 11:38:32'),
(321, 180, 2, 2074, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:38:59', '2023-06-20 14:41:25'),
(322, 181, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '10', '5', '3', '2023-05-10 19:39:37', '2023-06-15 20:48:40'),
(323, 181, 2, 2072, NULL, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:39:37', '2023-06-20 11:38:32'),
(324, 182, 1, 2072, NULL, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:39:37', '2023-06-20 11:38:32'),
(325, 182, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:39:37', '2023-06-20 08:58:47'),
(326, 183, 1, 2072, NULL, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:39:37', '2023-06-20 11:38:32'),
(327, 183, 2, 2072, NULL, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:39:37', '2023-06-20 11:38:32'),
(328, 184, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:39:37', '2023-06-20 08:58:29'),
(329, 184, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:39:37', '2023-06-20 08:59:40'),
(330, 185, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:39:37', '2023-06-20 08:58:33'),
(331, 185, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:39:37', '2023-06-20 08:58:35'),
(332, 186, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:39:37', '2023-06-20 08:58:42'),
(333, 186, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:39:37', '2023-06-20 08:59:29'),
(334, 187, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '10', '5', '3', '2023-05-10 19:40:03', '2023-06-20 08:59:29'),
(335, 188, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:40:03', '2023-06-20 08:59:49'),
(336, 189, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:40:22', '2023-06-20 08:59:03'),
(337, 190, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '10', '5', '3', '2023-05-10 19:40:48', '2023-06-15 20:55:14'),
(338, 190, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:40:48', '2023-06-20 08:58:23'),
(339, 191, 1, 2072, NULL, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:40:48', '2023-06-20 11:38:32'),
(340, 191, 2, NULL, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:40:48', '2023-05-10 19:40:48'),
(341, 192, 1, NULL, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:40:49', '2023-05-10 19:40:49'),
(342, 192, 2, NULL, NULL, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:40:49', '2023-06-20 11:38:32'),
(343, 193, 1, NULL, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:40:49', '2023-05-10 19:40:49'),
(344, 193, 2, NULL, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:40:49', '2023-05-10 19:40:49'),
(345, 194, 1, NULL, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:40:49', '2023-05-10 19:40:49'),
(346, 194, 2, NULL, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:40:49', '2023-05-10 19:40:49'),
(347, 195, 1, 2073, NULL, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:40:49', '2023-06-20 11:35:12'),
(348, 195, 2, 2073, NULL, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:40:49', '2023-06-20 11:35:53'),
(349, 196, 1, 2071, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:41:09', '2023-06-20 13:26:01'),
(350, 197, 1, 2073, NULL, NULL, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:41:09', '2023-06-16 09:42:22'),
(351, 198, 2, NULL, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:41:45', '2023-05-10 19:41:45'),
(352, 199, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:43:46', '2023-06-20 13:17:29'),
(353, 200, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:43:46', '2023-06-20 08:55:11'),
(354, 201, 1, 2071, 2068, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:43:46', '2023-06-20 13:18:04'),
(355, 202, 1, 2071, 2068, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:43:46', '2023-06-20 12:37:20'),
(356, 203, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:43:46', '2023-06-20 12:56:21'),
(357, 204, 1, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:43:46', '2023-06-20 13:17:57'),
(358, 205, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:44:33', '2023-06-20 13:18:12'),
(359, 206, 2, 2071, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:44:33', '2023-06-20 12:54:53'),
(360, 207, 2, 2071, 2068, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:44:33', '2023-06-20 12:55:06'),
(361, 208, 2, 2071, 2068, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:44:33', '2023-06-20 12:55:11'),
(362, 209, 1, 2074, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:45:05', '2023-06-20 12:42:25'),
(363, 209, 2, 2074, 2068, 1, 1, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:45:05', '2023-06-20 12:42:40'),
(364, 210, 1, 2074, 2068, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:45:34', '2023-06-20 12:41:50'),
(365, 210, 2, 2074, 2068, NULL, 10, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 19:45:34', '2023-06-20 12:41:55'),
(366, 211, 2, 2072, 2068, 1, 0, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 3, 3, 3, '5', '3', '1', '15', '10', '5', '2023-05-10 19:46:01', '2023-06-20 12:42:07'),
(367, 212, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-27 18:30:23', '2023-06-20 08:57:39'),
(368, 212, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-27 18:30:23', '2023-06-20 08:57:42'),
(369, 213, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-27 18:30:23', '2023-06-20 08:57:42'),
(370, 213, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-27 18:30:23', '2023-06-20 08:57:42'),
(371, 214, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-27 18:30:23', '2023-06-20 08:58:00'),
(372, 214, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-27 18:30:23', '2023-06-20 08:57:45'),
(373, 215, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-27 18:30:23', '2023-06-20 08:57:49'),
(374, 215, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-27 18:30:23', '2023-06-20 08:57:50'),
(375, 216, 1, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-27 18:30:23', '2023-06-20 08:57:50'),
(376, 216, 2, 2072, NULL, NULL, 2, '00:00:00', 0, NULL, '00:00:00', '00:00:00', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-27 18:30:23', '2023-06-20 08:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `age_group_gender_team`
--

CREATE TABLE `age_group_gender_team` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `age_group_gender_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `league_id` bigint(20) UNSIGNED NOT NULL,
  `time` varchar(255) DEFAULT NULL,
  `one` varchar(255) DEFAULT NULL,
  `two` varchar(255) DEFAULT NULL,
  `third` varchar(255) DEFAULT NULL,
  `prize_given` int(11) NOT NULL DEFAULT 0,
  `marks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `age_group_gender_team`
--

INSERT INTO `age_group_gender_team` (`id`, `age_group_gender_id`, `team_id`, `league_id`, `time`, `one`, `two`, `third`, `prize_given`, `marks`, `created_at`, `updated_at`) VALUES
(90, 353, 19, 5, '2', NULL, NULL, NULL, 0, '10', NULL, NULL),
(91, 353, 20, 5, '1', NULL, NULL, NULL, 0, '15', NULL, NULL),
(94, 260, 3, 4, '1', NULL, NULL, NULL, 0, '15', NULL, NULL),
(95, 260, 4, 4, '2', NULL, NULL, NULL, 0, '10', NULL, NULL),
(96, 263, 8, 4, '2', NULL, NULL, NULL, 0, '10', NULL, NULL),
(97, 263, 36, 4, '1', NULL, NULL, NULL, 0, '15', NULL, NULL),
(98, 264, 10, 4, '2', NULL, NULL, NULL, 0, '10', NULL, NULL),
(99, 264, 11, 4, '1', NULL, NULL, NULL, 0, '15', NULL, NULL),
(100, 366, 32, 5, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(101, 366, 39, 5, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(102, 362, 28, 5, '2', NULL, NULL, NULL, 0, '10', NULL, NULL),
(103, 362, 29, 5, '3', NULL, NULL, NULL, 0, '5', NULL, NULL),
(104, 362, 30, 5, '1', NULL, NULL, NULL, 0, '15', NULL, NULL),
(105, 363, 33, 5, '1', NULL, NULL, NULL, 0, '15', NULL, NULL),
(106, 363, 45, 5, '2', NULL, NULL, NULL, 0, '10', NULL, NULL),
(107, 268, 13, 4, '1', NULL, NULL, NULL, 0, '15', NULL, NULL),
(108, 268, 42, 4, '2', NULL, NULL, NULL, 0, '10', NULL, NULL),
(109, 359, 24, 5, '1', NULL, NULL, NULL, 0, '15', NULL, NULL),
(110, 359, 50, 5, '2', NULL, NULL, NULL, 0, '10', NULL, NULL),
(111, 265, 12, 4, '1', NULL, NULL, NULL, 0, '15', NULL, NULL),
(112, 265, 37, 4, '2', NULL, NULL, NULL, 0, '10', NULL, NULL),
(113, 356, 27, 5, '1', NULL, NULL, NULL, 0, '15', NULL, NULL),
(114, 356, 41, 5, '2', NULL, NULL, NULL, 0, '10', NULL, NULL),
(115, 261, 6, 4, '1', NULL, NULL, NULL, 0, '15', NULL, NULL),
(116, 261, 43, 4, '2', NULL, NULL, NULL, 0, '10', NULL, NULL),
(117, 266, 13, 4, '1', NULL, NULL, NULL, 0, '15', NULL, NULL),
(118, 266, 14, 4, '2', NULL, NULL, NULL, 0, '10', NULL, NULL),
(119, 266, 42, 4, '3', NULL, NULL, NULL, 0, '5', NULL, NULL),
(120, 267, 15, 4, '1', NULL, NULL, NULL, 0, '15', NULL, NULL),
(121, 267, 44, 4, '2', NULL, NULL, NULL, 0, '10', NULL, NULL),
(122, 352, 16, 5, '1', NULL, NULL, NULL, 0, '15', NULL, NULL),
(123, 352, 17, 5, '2', NULL, NULL, NULL, 0, '10', NULL, NULL),
(124, 352, 53, 5, '3', NULL, NULL, NULL, 0, '5', NULL, NULL),
(125, 357, 25, 5, '1', NULL, NULL, NULL, 0, '15', NULL, NULL),
(126, 357, 57, 5, '2', NULL, NULL, NULL, 0, '10', NULL, NULL),
(127, 358, 18, 5, '1', NULL, NULL, NULL, 0, '15', NULL, NULL),
(128, 358, 40, 5, '2', NULL, NULL, NULL, 0, '10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `age_group_gender_user`
--

CREATE TABLE `age_group_gender_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `age_group_gender_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `league_id` bigint(20) UNSIGNED NOT NULL,
  `time` varchar(255) NOT NULL,
  `one` varchar(255) DEFAULT NULL,
  `two` varchar(255) DEFAULT NULL,
  `third` varchar(255) DEFAULT NULL,
  `marks` varchar(255) DEFAULT NULL,
  `prize_given` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `age_group_gender_user`
--

INSERT INTO `age_group_gender_user` (`id`, `age_group_gender_id`, `user_id`, `league_id`, `time`, `one`, `two`, `third`, `marks`, `prize_given`, `created_at`, `updated_at`) VALUES
(191, 350, 1764, 5, '', '2', '3', '1.6', '5', 0, NULL, NULL),
(192, 350, 1917, 5, '', '1.5', '1.3', '1.5', '3', 0, NULL, NULL),
(193, 350, 1980, 5, '', '1.3', '1', '1.2', '1', 0, NULL, NULL),
(606, 198, 1779, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(607, 198, 1936, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(608, 199, 1784, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(609, 199, 1971, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(610, 200, 1925, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(611, 200, 1948, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(612, 200, 1954, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(613, 202, 1725, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(614, 202, 1879, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(615, 202, 1939, 4, '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(616, 203, 1829, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(617, 203, 1927, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(618, 203, 2062, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(619, 204, 1913, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(620, 204, 1966, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(621, 204, 1972, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(622, 205, 1924, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(623, 205, 1976, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(624, 205, 1863, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(625, 206, 1870, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(626, 206, 1999, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(627, 207, 1790, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(628, 207, 1962, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(629, 207, 2014, 4, '2', NULL, NULL, NULL, '1', 0, NULL, NULL),
(630, 208, 2029, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(631, 209, 1912, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(632, 209, 2000, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(633, 291, 1748, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(634, 291, 1869, 5, '5', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(635, 291, 1871, 5, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(636, 291, 1878, 5, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(637, 291, 1944, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(638, 292, 1874, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(639, 292, 1945, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(640, 294, 1767, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(641, 294, 1820, 5, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(642, 294, 1787, 5, '5', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(643, 294, 1921, 5, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(644, 294, 1798, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(645, 295, 1762, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(646, 295, 1778, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(647, 295, 1841, 5, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(648, 297, 1837, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(649, 297, 2030, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(650, 297, 2042, 5, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(651, 298, 1764, 5, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(652, 298, 1917, 5, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(653, 298, 1980, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(654, 298, 1981, 5, '5', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(655, 298, 2009, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(656, 162, 1763, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(657, 162, 1877, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(658, 162, 2045, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(659, 162, 2051, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(660, 163, 1821, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(661, 163, 2001, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(662, 163, 2039, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(663, 164, 1824, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(664, 164, 1845, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(665, 164, 1854, 4, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(666, 164, 1995, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(667, 165, 1802, 4, '3', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(668, 165, 1920, 4, '2', NULL, NULL, NULL, '1', 0, NULL, NULL),
(669, 165, 1986, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(670, 165, 2037, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(671, 166, 1755, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(672, 166, 1904, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(673, 166, 1965, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(674, 167, 1956, 4, '2', NULL, NULL, NULL, '5', 0, NULL, NULL),
(675, 167, 1991, 4, '3', NULL, NULL, NULL, '3', 0, NULL, NULL),
(702, 168, 2078, 4, '5', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(703, 168, 1800, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(704, 168, 1928, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(705, 168, 2082, 4, '6', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(706, 168, 1808, 4, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(707, 168, 1844, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(755, 169, 1951, 4, '8', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(756, 169, 2048, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(757, 169, 2016, 4, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(758, 169, 1750, 4, '7', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(759, 169, 1866, 4, '5', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(760, 169, 2080, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(761, 169, 1930, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(762, 169, 2038, 4, '6', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(763, 170, 1763, 4, '1', NULL, NULL, NULL, '3', 0, NULL, NULL),
(764, 170, 1877, 4, '0.2', NULL, NULL, NULL, '5', 0, NULL, NULL),
(765, 171, 1821, 4, '1', NULL, NULL, NULL, '3', 0, NULL, NULL),
(766, 171, 1831, 4, '2', NULL, NULL, NULL, '1', 0, NULL, NULL),
(767, 171, 2001, 4, '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(768, 171, 2039, 4, '0.40', NULL, NULL, NULL, '5', 0, NULL, NULL),
(769, 172, 1845, 4, '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(770, 172, 1854, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(771, 173, 1802, 4, '2', NULL, NULL, NULL, '1', 0, NULL, NULL),
(772, 173, 1920, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(773, 173, 1986, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(774, 173, 2037, 4, '2', NULL, NULL, NULL, '1', 0, NULL, NULL),
(775, 174, 1755, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(776, 174, 1812, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(777, 174, 1904, 4, '5', NULL, NULL, NULL, '1', 0, NULL, NULL),
(778, 175, 1827, 4, '1', NULL, NULL, NULL, '3', 0, NULL, NULL),
(779, 175, 1956, 4, '0', NULL, NULL, NULL, '5', 0, NULL, NULL),
(789, 177, 1750, 4, '2', NULL, NULL, NULL, '1', 0, NULL, NULL),
(790, 177, 1866, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(791, 177, 2016, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(792, 177, 2038, 4, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(793, 177, 2048, 4, '3', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(794, 178, 1754, 4, '6', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(795, 178, 1801, 4, '7', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(796, 178, 1805, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(797, 178, 1811, 4, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(798, 178, 1908, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(799, 178, 1960, 4, '8', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(800, 178, 2036, 4, '5', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(801, 178, 2050, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(802, 176, 1785, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(803, 176, 1800, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(804, 176, 1928, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(805, 176, 1852, 4, '6', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(806, 176, 1808, 4, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(807, 176, 1844, 4, '7', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(808, 176, 1994, 4, '5', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(809, 179, 1780, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(810, 179, 1882, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(811, 179, 1902, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(812, 179, 1937, 4, '5', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(813, 179, 1919, 4, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(814, 179, 1969, 4, '7', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(815, 179, 2018, 4, '6', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(825, 182, 1754, 4, '7', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(826, 182, 1801, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(827, 182, 1805, 4, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(828, 182, 1811, 4, '5', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(829, 182, 1908, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(830, 182, 1960, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(831, 182, 2036, 4, '6', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(832, 188, 1766, 4, '6', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(833, 188, 1861, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(834, 188, 1890, 4, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(835, 188, 1948, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(836, 188, 1954, 4, '5', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(837, 188, 1957, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(838, 193, 1806, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(839, 193, 1924, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(840, 193, 1976, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(841, 278, 1767, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(842, 288, 1760, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(843, 288, 1761, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(850, 180, 1985, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(851, 180, 1807, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(852, 180, 1998, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(853, 180, 1819, 4, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(854, 180, 1850, 4, '5', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(855, 180, 1968, 4, '6', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(856, 271, 1797, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(857, 271, 1909, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(858, 194, 1860, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(859, 194, 1870, 4, '2', NULL, NULL, NULL, '1', 0, NULL, NULL),
(860, 194, 1893, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(861, 194, 1938, 4, '3', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(862, 194, 1999, 4, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(863, 285, 1764, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(864, 285, 1981, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(865, 285, 2009, 5, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(866, 272, 1748, 5, '5', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(867, 272, 1869, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(868, 272, 1871, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(869, 272, 1878, 5, '3', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(870, 272, 1944, 5, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(871, 272, 1891, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(872, 272, 2019, 5, '6', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(873, 181, 1826, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(874, 181, 1843, 4, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(875, 181, 1977, 4, '6', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(876, 181, 1988, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(877, 181, 1990, 4, '7', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(878, 181, 2028, 4, '5', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(879, 181, 2053, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(880, 183, 1780, 4, '5', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(881, 183, 1882, 4, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(882, 183, 1902, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(883, 183, 1937, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(884, 183, 1919, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(885, 183, 1969, 4, '7', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(886, 183, 2018, 4, '6', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(887, 184, 1850, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(888, 184, 1926, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(889, 184, 1968, 4, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(890, 184, 1998, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(891, 185, 1826, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(892, 185, 1843, 4, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(893, 185, 1988, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(894, 185, 2028, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(895, 186, 1779, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(896, 186, 1936, 4, '2', NULL, NULL, NULL, '1', 0, NULL, NULL),
(897, 186, 2015, 4, '3', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(898, 186, 2026, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(899, 187, 1784, 4, '6', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(900, 187, 1776, 4, '5', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(901, 187, 1931, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(902, 187, 1964, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(903, 187, 1971, 4, '7', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(904, 187, 1933, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(905, 187, 2021, 4, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(906, 190, 1849, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(907, 190, 1879, 4, '5', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(908, 190, 1934, 4, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(909, 190, 1939, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(910, 190, 2044, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(911, 191, 1927, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(912, 191, 1959, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(913, 191, 2047, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(914, 191, 2062, 4, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(915, 196, 1875, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(916, 196, 1872, 4, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(917, 196, 1984, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(918, 196, 2029, 4, '5', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(919, 196, 1943, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(920, 195, 1757, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(921, 195, 1790, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(922, 195, 1962, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(923, 281, 1950, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(924, 281, 2054, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(925, 197, 1749, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(926, 197, 2000, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(927, 197, 2008, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(928, 192, 1935, 4, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(929, 192, 1966, 4, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(930, 192, 1972, 4, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(931, 269, 1896, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(932, 269, 1914, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(933, 269, 1950, 5, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(934, 269, 2054, 5, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(935, 270, 1839, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(936, 270, 1958, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(937, 270, 1946, 5, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(938, 287, 1789, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(939, 287, 1873, 5, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(940, 287, 1884, 5, '5', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(941, 287, 1961, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(942, 287, 2020, 5, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(943, 279, 1846, 5, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(944, 279, 1906, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(945, 279, 2058, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(946, 279, 2059, 5, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(947, 282, 1859, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(948, 282, 1910, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(949, 283, 1839, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(950, 283, 1958, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(951, 283, 1946, 5, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(952, 274, 1874, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(953, 274, 1945, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(954, 280, 1778, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(955, 280, 1841, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(956, 284, 1837, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(957, 284, 1949, 5, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(958, 284, 2030, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(959, 273, 1789, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(960, 273, 1873, 5, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(961, 273, 1884, 5, '5', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(962, 273, 1961, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(963, 273, 2020, 5, '4', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(964, 290, 1753, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(965, 290, 2058, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(966, 286, 1797, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(967, 286, 2055, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(968, 275, 1760, 5, '1', NULL, NULL, NULL, '5', 0, NULL, NULL),
(969, 275, 1761, 5, '2', NULL, NULL, NULL, '3', 0, NULL, NULL),
(970, 275, 1881, 5, '3', NULL, NULL, NULL, '1', 0, NULL, NULL),
(971, 349, 1940, 5, '', '1.9', '2.5', '4.5', '3', 0, NULL, NULL),
(972, 349, 1949, 5, '', '2', '5', '8', '5', 0, NULL, NULL),
(973, 234, 1819, 4, '', '1.8', '1.9', '2', '1', 0, NULL, NULL),
(974, 234, 1985, 4, '', '2', '1.6', '4', '5', 0, NULL, NULL),
(975, 234, 1998, 4, '', '2.8', '0.3', '1', '3', 0, NULL, NULL),
(976, 234, 2006, 4, '', '2', '1.8', '1.5', '1', 0, NULL, NULL),
(977, 234, 2060, 4, '', '1.9', '1', '1', NULL, 0, NULL, NULL),
(978, 235, 1826, 4, '', '10.8', '4', '8', '5', 0, NULL, NULL),
(979, 235, 1977, 4, '', '5.9', '10.8', '5', '5', 0, NULL, NULL),
(980, 235, 1988, 4, '', '4', '1', '2', NULL, 0, NULL, NULL),
(981, 235, 1990, 4, '', '2', '5', '1', NULL, 0, NULL, NULL),
(982, 235, 2053, 4, '', '5', '8', '7', '1', 0, NULL, NULL),
(983, 236, 1903, 4, '', '5', '2', '1', NULL, 0, NULL, NULL),
(984, 236, 2015, 4, '', '', '1', NULL, NULL, 0, NULL, NULL),
(985, 236, 2026, 4, '', '2', '8', NULL, NULL, 0, NULL, NULL),
(986, 238, 1861, 4, '', '1', NULL, '4.8', NULL, 0, NULL, NULL),
(987, 238, 1890, 4, '', '2', '5', '4', '3', 0, NULL, NULL),
(988, 238, 1957, 4, '', '4', '4', '5', '3', 0, NULL, NULL),
(989, 238, 1894, 4, '', '7.5', '1.5', '1', '5', 0, NULL, NULL),
(990, 237, 1776, 4, '', NULL, '4.8', '4.8', '1', 0, NULL, NULL),
(991, 237, 1931, 4, '', '1', '1', '4', NULL, 0, NULL, NULL),
(992, 237, 1964, 4, '', '8', NULL, '2.88', '3', 0, NULL, NULL),
(993, 237, 2021, 4, '', '9.5', '5', '4.8', '5', 0, NULL, NULL),
(994, 239, 1751, 4, '', '1', '4', '5', '5', 0, NULL, NULL),
(995, 239, 1901, 4, '', '0', '5', '1', '5', 0, NULL, NULL),
(996, 240, 1934, 4, '', '0', '2', '0', '5', 0, NULL, NULL),
(997, 240, 2044, 4, '', '1', '0', '1', '3', 0, NULL, NULL),
(998, 241, 1775, 4, '', '2', '2.55', '1.55', '1', 0, NULL, NULL),
(999, 241, 1959, 4, '', '2.9', '5.66', '3.55', '3', 0, NULL, NULL),
(1000, 241, 2047, 4, '', '6', '9.66', '4.55', '5', 0, NULL, NULL),
(1001, 242, 1913, 4, '', '2.5', '11', '7', '3', 0, NULL, NULL),
(1002, 242, 1883, 4, '', '4.5', '0.8', NULL, NULL, 0, NULL, NULL),
(1003, 242, 1935, 4, '', '2.6', '9.5', '1', '1', 0, NULL, NULL),
(1004, 242, 1952, 4, '', '4.6', '4', NULL, NULL, 0, NULL, NULL),
(1005, 242, 1966, 4, '', '7', '12', '8', '5', 0, NULL, NULL),
(1006, 242, 2003, 4, '', '8', '7', NULL, NULL, 0, NULL, NULL),
(1007, 243, 1806, 4, '', '5', '2.8', '4.5', NULL, 0, NULL, NULL),
(1008, 243, 1898, 4, '', '4', '6', '1.5', '1', 0, NULL, NULL),
(1009, 243, 1900, 4, '', NULL, '4.5', '1.', NULL, 0, NULL, NULL),
(1010, 243, 1907, 4, '', '2.6', '2.6', '2.5', NULL, 0, NULL, NULL),
(1011, 243, 1976, 4, '', '8', '5.3', '4.6', '3', 0, NULL, NULL),
(1012, 243, 1863, 4, '', '7', '9', '5', '5', 0, NULL, NULL),
(1013, 244, 1860, 4, '', '1.5', '5.6', '4.2', '5', 0, NULL, NULL),
(1014, 244, 1938, 4, '', '5.6', '2.5', '2.3', '5', 0, NULL, NULL),
(1015, 246, 1875, 4, '', '2.5', '2.6', '1.5', '3', 0, NULL, NULL),
(1016, 246, 1872, 4, '', '4', '5', '4', '5', 0, NULL, NULL),
(1017, 247, 1912, 4, '', '1', '5', '4', NULL, 0, NULL, NULL),
(1018, 247, 1947, 4, '', '2', '6', '6', '1', 0, NULL, NULL),
(1019, 247, 2000, 4, '', '3', '7', '2', '3', 0, NULL, NULL),
(1020, 247, 2008, 4, '', '4', '8', '1', '5', 0, NULL, NULL),
(1021, 248, 1903, 4, '', '1', NULL, '4.6', '3', 0, NULL, NULL),
(1022, 248, 2026, 4, '', '1', '2.3', '8', '5', 0, NULL, NULL),
(1023, 307, 1838, 5, '', '2', '2', '1', NULL, 0, NULL, NULL),
(1024, 307, 1974, 5, '', '3', '5', '2', '5', 0, NULL, NULL),
(1025, 307, 2010, 5, '', '4', '4', '4', '1', 0, NULL, NULL),
(1026, 307, 2043, 5, '', '1', '2', '5', '5', 0, NULL, NULL),
(1027, 313, 1820, 5, '', '1', '2', '3', '5', 0, NULL, NULL),
(1028, 313, 1787, 5, '', '1', '2', '3', '5', 0, NULL, NULL),
(1029, 313, 1747, 5, '', '1', '2', '3', '5', 0, NULL, NULL),
(1030, 313, 1895, 5, '', '1', '2', '3', '5', 0, NULL, NULL),
(1031, 313, 2034, 5, '', '1', '2', '3', '5', 0, NULL, NULL),
(1032, 313, 2061, 5, '', '1', '2', '3', '5', 0, NULL, NULL),
(1033, 314, 1753, 5, '', '5.6', '5.6', '2.3', NULL, 0, NULL, NULL),
(1034, 314, 1752, 5, '', '1.3', '4.3', '4.3', NULL, 0, NULL, NULL),
(1035, 314, 1822, 5, '', '2.5', '5.2', '8.5', '5', 0, NULL, NULL),
(1036, 314, 1846, 5, '', '4.8', '8.5', '4.3', '5', 0, NULL, NULL),
(1037, 314, 1795, 5, '', '0.6', '4.6', '5.2', NULL, 0, NULL, NULL),
(1038, 314, 1906, 5, '', '5.8', '4.3', '1', NULL, 0, NULL, NULL),
(1039, 314, 1922, 5, '', '4.8', '8.5', '5', '5', 0, NULL, NULL),
(1040, 314, 2035, 5, '', '1.6', '4.6', '8', NULL, 0, NULL, NULL),
(1041, 315, 1810, 5, '', '7.5', NULL, '9', '5', 0, NULL, NULL),
(1042, 315, 1929, 5, '', '2.3', '2', NULL, NULL, 0, NULL, NULL),
(1043, 315, 1978, 5, '', '7.5', NULL, '1', '1', 0, NULL, NULL),
(1044, 315, 2017, 5, '', '1', '8', '1', '3', 0, NULL, NULL),
(1045, 316, 1896, 5, '', '2.6', NULL, NULL, '3', 0, NULL, NULL),
(1046, 316, 1950, 5, '', '7', '1', '2', '5', 0, NULL, NULL),
(1047, 316, 2046, 5, '', '1', NULL, NULL, '1', 0, NULL, NULL),
(1048, 317, 1859, 5, '', '1', '4', '8', '5', 0, NULL, NULL),
(1049, 317, 1910, 5, '', '2', '5.3', '4', '1', 0, NULL, NULL),
(1050, 317, 1963, 5, '', '5.3', '0', '6', '3', 0, NULL, NULL),
(1051, 318, 1958, 5, '', '2', '5.3', '7', '5', 0, NULL, NULL),
(1052, 318, 1946, 5, '', '2.5', '0.6', '4', '3', 0, NULL, NULL),
(1053, 319, 1837, 5, '', '5', NULL, NULL, '1', 0, NULL, NULL),
(1054, 319, 1940, 5, '', '5', '4', '5.1', '3', 0, NULL, NULL),
(1055, 319, 1949, 5, '', '5', NULL, '6', '5', 0, NULL, NULL),
(1056, 319, 2042, 5, '', '4', '4', '4.9', NULL, 0, NULL, NULL),
(1057, 321, 1909, 5, '', '5', NULL, '5.6', '5', 0, NULL, NULL),
(1058, 321, 1905, 5, '', '5', '1', '4', '3', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `atheletic_settings`
--

CREATE TABLE `atheletic_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `field_events` int(11) NOT NULL,
  `track_events` int(11) NOT NULL,
  `total_events` int(11) NOT NULL,
  `first_place` varchar(255) DEFAULT NULL,
  `second_place` varchar(255) DEFAULT NULL,
  `third_place` varchar(255) DEFAULT NULL,
  `field_first_place` varchar(255) DEFAULT NULL,
  `field_second_place` varchar(255) DEFAULT NULL,
  `field_third_place` varchar(255) DEFAULT NULL,
  `group_first_place` varchar(255) DEFAULT NULL,
  `group_second_place` varchar(255) DEFAULT NULL,
  `group_third_place` varchar(255) DEFAULT NULL,
  `track_event_method` tinyint(1) DEFAULT NULL,
  `heat_method` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atheletic_settings`
--

INSERT INTO `atheletic_settings` (`id`, `organization_id`, `field_events`, `track_events`, `total_events`, `first_place`, `second_place`, `third_place`, `field_first_place`, `field_second_place`, `field_third_place`, `group_first_place`, `group_second_place`, `group_third_place`, `track_event_method`, `heat_method`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 3, 3, '5', '3', '1', '5', '3', '1', '15', '10', '5', NULL, NULL, '2022-05-13 13:21:15', '2023-05-09 11:52:48'),
(2, 5, 3, 3, 3, '5', '3', '1', NULL, NULL, NULL, '15', '10', '5', NULL, NULL, '2023-05-10 18:34:26', '2023-06-15 21:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `bank_transfer`
--

CREATE TABLE `bank_transfer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `account_holder_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `account_branch` varchar(255) DEFAULT NULL,
  `swift_code` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_transfer`
--

INSERT INTO `bank_transfer` (`id`, `organization_id`, `bank_name`, `account_holder_name`, `account_number`, `account_branch`, `swift_code`, `info`, `created_at`, `updated_at`) VALUES
(1, 5, 'TAMIL COORDINATING COMMITEE', 'TCC', '54585655', 'Oslo', '', '', '2023-05-10 18:44:05', '2023-05-10 18:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_category_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `club_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postal` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mobile` int(11) NOT NULL,
  `tpnumber` int(11) DEFAULT NULL,
  `club_registation_num` varchar(255) DEFAULT NULL,
  `club_email` varchar(255) NOT NULL,
  `club_start_date` varchar(255) DEFAULT NULL,
  `prefix` varchar(255) NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 2,
  `status` varchar(255) DEFAULT NULL,
  `club_logo` varchar(255) DEFAULT NULL,
  `season_id` bigint(20) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `club_points` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `club_name`, `address`, `city`, `state`, `postal`, `country_id`, `mobile`, `tpnumber`, `club_registation_num`, `club_email`, `club_start_date`, `prefix`, `is_approved`, `status`, `club_logo`, `season_id`, `user`, `club_points`, `created_at`, `updated_at`) VALUES
(1, 'TCC Club', 'Norway', 'Oslo', '', '26', 2, 12365478, 0, '', 'tccclub@gmail.com', '', 'TC', 1, NULL, NULL, 3, 0, 0, '2023-05-10 18:08:56', '2023-05-10 18:08:56'),
(2, 'Eleven Stars Sports Club', 'Oslo', 'Oslo', '', '1234', 2, 12345678, 0, '', 'el@tamilsport.app', '', 'EL', 1, NULL, NULL, 3, 0, 0, '2023-05-11 22:13:23', '2023-05-11 22:13:23'),
(3, 'Everest Sports Club', 'Oslo', 'Oslo', '', '1234', 2, 12345678, 0, '', 'ev@tamilsport.app', '', 'EV', 1, NULL, NULL, 3, 0, 0, '2023-05-11 22:15:06', '2023-05-11 22:15:06'),
(4, 'Ianthalir Sports Club', 'Oslo', 'Oslo', '', '1234', 2, 12345678, 0, '', 'il@tamilsport.app', '', 'IA', 1, NULL, NULL, 3, 0, 0, '2023-05-11 22:16:13', '2023-05-11 22:16:13'),
(5, 'Lørenskog Tamil Sportsklubb', 'Lørenskog', 'Lørenskog', '', '1234', 2, 12345678, 0, '', 'lr@tamilsport.app', '', 'LR', 1, NULL, NULL, 3, 0, 0, '2023-05-11 22:17:14', '2023-05-11 22:17:14'),
(6, 'Minnel FC', 'Oslo', 'Oslo', '', '1234', 2, 12345678, 0, '', 'mi@tamilsport.app', '', 'MI', 1, NULL, NULL, 3, 0, 0, '2023-05-11 22:18:20', '2023-05-11 22:18:20'),
(7, 'Nordavind IL', 'Frogner', 'Frogner', '', '1234', 2, 12345678, 0, '', 'nor@tamilsport.app', '', 'NO', 1, NULL, NULL, 3, 0, 0, '2023-05-11 22:27:03', '2023-05-11 22:27:03'),
(8, 'Noreel Sportsklubb', 'Oslo', 'Oslo', '', '1234', 2, 12345678, 0, '', 'ns@tamilsport.app', '', 'NS', 1, NULL, NULL, 3, 0, 0, '2023-05-11 22:30:41', '2023-05-11 22:30:41'),
(9, 'Private', 'Oslo', 'Oslo', '', '1234', 2, 12345678, 0, '', 'pr@tamilsport.app', '', 'PR', 1, NULL, NULL, 3, 0, 0, '2023-05-11 22:31:46', '2023-05-11 22:32:50'),
(10, 'Sengkathir Sports Club', 'Oslo', 'Oslo', '', '1234', 2, 12345678, 0, '', 'se@tamilsport.app', '', 'SE', 1, NULL, NULL, 3, 0, 0, '2023-05-11 22:32:38', '2023-05-11 22:32:38'),
(11, 'Stovner Tamil Sports Club', 'Oslo', 'Oslo', '', '1234', 2, 12345678, 0, '', 'st@tamilsport.app', '', 'ST', 1, NULL, NULL, 3, 0, 0, '2023-05-11 22:33:59', '2023-05-11 22:33:59'),
(12, 'Young Stars', 'Oslo', 'Oslo', '', '1234', 2, 12345678, 0, '', 'yo@tamilsport.app', '', 'YO', 1, NULL, NULL, 3, 0, 0, '2023-05-11 22:34:57', '2023-05-11 22:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `club_requests`
--

CREATE TABLE `club_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `old_club_id` bigint(20) UNSIGNED NOT NULL,
  `new_club_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `userIds` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_code_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `currency_id`, `country_code_id`, `created_at`, `updated_at`) VALUES
(2, 'Norway', 95, 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country_code`
--

CREATE TABLE `country_code` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_code`
--

INSERT INTO `country_code` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '+61', NULL, NULL),
(2, '+32', NULL, NULL),
(3, '+45', NULL, NULL),
(4, '+358', NULL, NULL),
(5, '+33', NULL, NULL),
(6, '+49', NULL, NULL),
(7, '+852', NULL, NULL),
(8, '+91', NULL, NULL),
(9, '+965', NULL, NULL),
(10, '+60', NULL, NULL),
(11, '+960', NULL, NULL),
(12, '+94', NULL, NULL),
(13, '+46', NULL, NULL),
(14, '+41', NULL, NULL),
(15, '+380', NULL, NULL),
(16, '+971', NULL, NULL),
(17, '+44', NULL, NULL),
(18, '+1', NULL, NULL),
(19, '+47', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_iso_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency_iso_code`, `created_at`, `updated_at`) VALUES
(1, 'DZD', NULL, NULL),
(2, 'AOA', NULL, NULL),
(3, 'ARS', NULL, NULL),
(4, 'AMD', NULL, NULL),
(5, 'AUD', NULL, NULL),
(6, 'EUR', NULL, NULL),
(7, 'AZN', NULL, NULL),
(8, 'BHD', NULL, NULL),
(9, 'BBD', NULL, NULL),
(10, 'BYN', NULL, NULL),
(11, 'EUR', NULL, NULL),
(12, 'BMD', NULL, NULL),
(13, 'BOB', NULL, NULL),
(14, 'BAM', NULL, NULL),
(15, 'BWP', NULL, NULL),
(16, 'BRL', NULL, NULL),
(17, 'BGN', NULL, NULL),
(18, 'CVE', NULL, NULL),
(19, 'CAD', NULL, NULL),
(20, 'KYD', NULL, NULL),
(21, 'XAF', NULL, NULL),
(22, 'CLP', NULL, NULL),
(23, 'CNY', NULL, NULL),
(24, 'COP', NULL, NULL),
(25, 'CDF', NULL, NULL),
(26, 'XAF', NULL, NULL),
(27, 'CRC', NULL, NULL),
(28, 'HRK', NULL, NULL),
(29, 'EUR', NULL, NULL),
(30, 'CZK', NULL, NULL),
(31, 'DKK', NULL, NULL),
(32, 'DOP', NULL, NULL),
(33, 'USD', NULL, NULL),
(34, 'EGP', NULL, NULL),
(35, 'USD', NULL, NULL),
(36, 'XAF', NULL, NULL),
(37, 'EUR', NULL, NULL),
(38, 'FJD', NULL, NULL),
(39, 'EUR', NULL, NULL),
(40, 'EUR', NULL, NULL),
(41, 'EUR', NULL, NULL),
(42, 'GHS', NULL, NULL),
(43, 'GIP', NULL, NULL),
(44, 'EUR', NULL, NULL),
(45, 'DKK', NULL, NULL),
(46, 'GTQ', NULL, NULL),
(47, 'GBP', NULL, NULL),
(48, 'GYD', NULL, NULL),
(49, 'HNL', NULL, NULL),
(50, 'HKD', NULL, NULL),
(51, 'HUF', NULL, NULL),
(52, 'ISK', NULL, NULL),
(53, 'INR', NULL, NULL),
(54, 'IDR', NULL, NULL),
(55, 'IQD', NULL, NULL),
(56, 'EUR', NULL, NULL),
(57, 'IMP', NULL, NULL),
(58, 'ILS', NULL, NULL),
(59, 'EUR', NULL, NULL),
(60, 'XOF', NULL, NULL),
(61, 'JMD', NULL, NULL),
(62, 'JPY', NULL, NULL),
(63, 'KZT', NULL, NULL),
(64, 'KES', NULL, NULL),
(65, 'KRW', NULL, NULL),
(66, 'EUR', NULL, NULL),
(67, 'KWD', NULL, NULL),
(68, 'KGS', NULL, NULL),
(69, 'LAK', NULL, NULL),
(70, 'EUR', NULL, NULL),
(71, 'LBP', NULL, NULL),
(72, 'LYD', NULL, NULL),
(73, 'CHF', NULL, NULL),
(74, 'EUR', NULL, NULL),
(75, 'EUR', NULL, NULL),
(76, 'MOP', NULL, NULL),
(77, 'MGA', NULL, NULL),
(78, 'MWK', NULL, NULL),
(79, 'MYR', NULL, NULL),
(80, 'MVR', NULL, NULL),
(81, 'EUR', NULL, NULL),
(82, 'MRU', NULL, NULL),
(83, 'MUR', NULL, NULL),
(84, 'MXN', NULL, NULL),
(85, 'EUR', NULL, NULL),
(86, 'MAD', NULL, NULL),
(87, 'MZN', NULL, NULL),
(88, 'MMK', NULL, NULL),
(89, 'NAD', NULL, NULL),
(90, 'EUR', NULL, NULL),
(91, 'NZD', NULL, NULL),
(92, 'NIO', NULL, NULL),
(93, 'NGN', NULL, NULL),
(94, 'MKD', NULL, NULL),
(95, 'NOK', NULL, NULL),
(96, 'OMR', NULL, NULL),
(97, 'PKR', NULL, NULL),
(98, 'ILS', NULL, NULL),
(99, 'JOD', NULL, NULL),
(100, 'PGK', NULL, NULL),
(101, 'PYG', NULL, NULL),
(102, 'PEN', NULL, NULL),
(103, 'PHP', NULL, NULL),
(104, 'PLN', NULL, NULL),
(106, 'USD', NULL, NULL),
(107, 'RUB', NULL, NULL),
(108, 'RWF', NULL, NULL),
(109, 'XCD', NULL, NULL),
(110, 'SAR', NULL, NULL),
(111, 'XOF', NULL, NULL),
(112, 'RSD', NULL, NULL),
(113, 'SGD', NULL, NULL),
(114, 'EUR', NULL, NULL),
(115, 'EUR', NULL, NULL),
(116, 'ZAR', NULL, NULL),
(117, 'EUR', NULL, NULL),
(118, 'LKR', NULL, NULL),
(119, 'SZL', NULL, NULL),
(120, 'SEK', NULL, NULL),
(121, 'CHF', NULL, NULL),
(122, 'TWD', NULL, NULL),
(123, 'TJS', NULL, NULL),
(124, 'TZS', NULL, NULL),
(125, 'THB', NULL, NULL),
(126, 'USD', NULL, NULL),
(127, 'TTD', NULL, NULL),
(128, 'TND', NULL, NULL),
(129, 'UGX', NULL, NULL),
(130, 'UAH', NULL, NULL),
(132, 'GBP', NULL, NULL),
(133, 'USD', NULL, NULL),
(134, 'UYU', NULL, NULL),
(135, 'UZS', NULL, NULL),
(136, 'VEF', NULL, NULL),
(137, 'VND', NULL, NULL),
(138, 'ZMW', NULL, NULL),
(139, 'ZWD', NULL, NULL),
(140, 'PAB', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `datatables`
--

CREATE TABLE `datatables` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `points` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `sale_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `day_users`
--

CREATE TABLE `day_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `day_users`
--

INSERT INTO `day_users` (`id`, `user_id`, `date`) VALUES
(1, 1, '2023-06-20'),
(2, 1707, '2023-06-20'),
(3, 1722, '2023-05-12'),
(4, 1723, '2023-06-14'),
(5, 1716, '2023-06-13'),
(6, 1724, '2023-06-01'),
(7, 1720, '2023-06-13'),
(8, 1718, '2023-06-16'),
(9, 1736, '2023-06-14'),
(10, 1708, '2023-05-24'),
(11, 1739, '2023-06-13'),
(12, 1740, '2023-06-14'),
(13, 1741, '2023-06-13'),
(14, 1742, '2023-06-14'),
(15, 1743, '2023-06-13'),
(16, 1745, '2023-06-13'),
(17, 1747, '2023-06-12'),
(18, 1753, '2023-05-30'),
(19, 1756, '2023-05-27'),
(20, 1762, '2023-05-28'),
(21, 1764, '2023-05-28'),
(22, 1765, '2023-05-28'),
(23, 1767, '2023-05-29'),
(24, 1768, '2023-05-29'),
(25, 1773, '2023-06-12'),
(26, 1774, '2023-06-01'),
(27, 1778, '2023-05-30'),
(28, 1746, '2023-05-30'),
(29, 1781, '2023-05-30'),
(30, 1783, '2023-06-03'),
(31, 1787, '2023-06-07'),
(32, 1788, '2023-05-31'),
(33, 1792, '2023-06-13'),
(34, 1797, '2023-06-14'),
(35, 1798, '2023-06-13'),
(36, 1799, '2023-06-01'),
(37, 1804, '2023-06-01'),
(38, 1803, '2023-06-01'),
(39, 1810, '2023-06-02'),
(40, 1813, '2023-06-02'),
(41, 1815, '2023-06-02'),
(42, 1795, '2023-06-06'),
(43, 1823, '2023-06-03'),
(44, 1825, '2023-06-03'),
(45, 1828, '2023-06-11'),
(46, 1833, '2023-06-10'),
(47, 1836, '2023-06-03'),
(48, 1715, '2023-06-03'),
(49, 1839, '2023-06-03'),
(50, 1841, '2023-06-13'),
(51, 1842, '2023-06-10'),
(52, 1847, '2023-06-13'),
(53, 1848, '2023-06-03'),
(54, 1858, '2023-06-11'),
(55, 1857, '2023-06-04'),
(56, 1862, '2023-06-13'),
(57, 1865, '2023-06-04'),
(58, 1868, '2023-06-04'),
(59, 1880, '2023-06-08'),
(60, 1881, '2023-06-06'),
(61, 1889, '2023-06-12'),
(62, 1892, '2023-06-06'),
(63, 1895, '2023-06-06'),
(64, 1896, '2023-06-06'),
(65, 1897, '2023-06-14'),
(66, 1915, '2023-06-06'),
(67, 1709, '2023-06-07'),
(68, 1921, '2023-06-07'),
(69, 1941, '2023-06-09'),
(70, 1950, '2023-06-08'),
(71, 1953, '2023-06-08'),
(72, 1955, '2023-06-08'),
(73, 1963, '2023-06-09'),
(74, 1967, '2023-06-09'),
(75, 1974, '2023-06-09'),
(76, 1975, '2023-06-09'),
(77, 1980, '2023-06-09'),
(78, 1983, '2023-06-10'),
(79, 1987, '2023-06-10'),
(80, 1989, '2023-06-10'),
(81, 1992, '2023-06-11'),
(82, 2002, '2023-06-14'),
(83, 2011, '2023-06-11'),
(84, 2013, '2023-06-12'),
(85, 2024, '2023-06-12'),
(86, 2025, '2023-06-12'),
(87, 2030, '2023-06-12'),
(88, 2040, '2023-06-13'),
(89, 2063, '2023-06-14'),
(90, 2064, '2023-06-16'),
(91, 2067, '2023-06-15'),
(92, 2066, '2023-06-15'),
(93, 2072, '2023-06-16'),
(94, 2068, '2023-06-20'),
(95, 2071, '2023-06-20'),
(96, 2076, '2023-06-15'),
(97, 2077, '2023-06-15'),
(98, 2073, '2023-06-20'),
(99, 2070, '2023-06-20'),
(100, 2074, '2023-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `email_verification_settings`
--

CREATE TABLE `email_verification_settings` (
  `id` bigint(20) NOT NULL,
  `organization_id` bigint(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `footer` varchar(255) NOT NULL,
  `reset_pw_subject` varchar(255) NOT NULL,
  `reset_pw_content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_verification_settings`
--

INSERT INTO `email_verification_settings` (`id`, `organization_id`, `subject`, `logo`, `title`, `content`, `footer`, `reset_pw_subject`, `reset_pw_content`) VALUES
(1, 5, 'Tamilsport.app  Email Verification', '20230510184004.png', 'TVV 2023 registration', 'Thank you for registering with TVV. In order to activate your account, we require you to verify your email address.\r\nTo complete the verification process, please click on the verification link provided below.', 'Best regards, \r\nTVV Support Team', 'Tamilsport.app  Password Reset', 'We have received a request to reset your password for your Tamilsport.app account. \r\nTo reset your password, please click on the link below.\r\nPlease note that your new password must be at least 8 characters long and should include a combination of letters');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_event_id` bigint(20) UNSIGNED NOT NULL,
  `league_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `season_id` bigint(20) UNSIGNED NOT NULL,
  `rules` longtext DEFAULT NULL,
  `date` date NOT NULL,
  `tracks` int(11) NOT NULL,
  `participants_count` decimal(8,2) DEFAULT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `main_event_id`, `league_id`, `user_id`, `organization_id`, `season_id`, `rules`, `date`, `tracks`, `participants_count`, `discount`, `created_at`, `updated_at`) VALUES
(10, 1, 4, 1708, 5, 3, 'Start On Time', '2023-06-24', 0, '0.00', 0, '2023-05-10 19:10:55', '2023-05-23 23:01:30'),
(11, 2, 4, 1708, 5, 3, 'Start On Time', '2023-06-24', 0, '0.00', 0, '2023-05-10 19:21:20', '2023-05-23 23:01:57'),
(12, 3, 4, 1708, 5, 3, 'Start On Time', '2023-06-24', 0, '0.00', 0, '2023-05-10 19:22:05', '2023-06-15 00:21:04'),
(13, 4, 4, 1708, 5, 3, 'Start On Time', '2023-05-11', 0, '0.00', 0, '2023-05-10 19:22:34', '2023-05-10 19:22:34'),
(14, 5, 4, 1708, 5, 3, 'Start On Time', '2023-05-11', 0, '0.00', 0, '2023-05-10 19:22:59', '2023-05-10 19:22:59'),
(15, 6, 4, 1708, 5, 3, 'Start On Time', '2023-05-11', 0, '0.00', 0, '2023-05-10 19:23:35', '2023-05-10 19:23:35'),
(16, 8, 4, 1708, 5, 3, 'Start On Time', '2023-05-11', 0, '0.00', 0, '2023-05-10 19:26:10', '2023-05-10 19:26:10'),
(17, 9, 4, 1708, 5, 3, 'Start On Time', '2023-05-11', 0, '0.00', 0, '2023-05-10 19:26:48', '2023-05-10 19:26:48'),
(18, 10, 4, 1708, 5, 3, 'Start On Time', '2023-05-11', 0, '0.00', 0, '2023-05-10 19:27:34', '2023-05-10 19:27:34'),
(19, 11, 4, 1708, 5, 3, 'Start On Time', '2023-05-11', 0, '0.00', 0, '2023-05-10 19:28:22', '2023-05-10 19:28:22'),
(20, 12, 4, 1708, 5, 3, 'Start On Time', '2023-05-11', 0, '0.00', 0, '2023-05-10 19:28:52', '2023-05-10 19:28:52'),
(21, 3, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:29:49', '2023-05-10 19:29:49'),
(22, 4, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:31:45', '2023-05-10 19:31:45'),
(23, 4, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:32:22', '2023-05-10 19:32:22'),
(24, 4, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:32:42', '2023-05-10 19:32:42'),
(25, 13, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:33:23', '2023-05-10 19:33:23'),
(26, 5, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:36:13', '2023-05-10 19:36:13'),
(27, 6, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:37:04', '2023-05-10 19:37:04'),
(28, 8, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:38:10', '2023-05-10 19:38:10'),
(29, 8, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:38:40', '2023-05-10 19:38:40'),
(30, 8, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:38:59', '2023-05-10 19:38:59'),
(31, 9, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:39:37', '2023-05-10 19:39:37'),
(32, 9, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:40:03', '2023-05-10 19:40:03'),
(33, 9, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:40:22', '2023-05-10 19:40:22'),
(34, 14, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:40:48', '2023-05-10 19:40:48'),
(35, 14, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:41:09', '2023-05-10 19:41:09'),
(36, 14, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:41:45', '2023-05-10 19:41:45'),
(37, 10, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:43:46', '2023-05-10 19:43:46'),
(38, 10, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:44:33', '2023-05-10 19:44:33'),
(39, 11, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:45:05', '2023-05-10 19:45:05'),
(40, 12, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:45:33', '2023-05-10 19:45:33'),
(41, 15, 5, 1708, 5, 3, 'Start On Time', '2023-05-12', 0, '0.00', 0, '2023-05-10 19:46:01', '2023-05-10 19:46:01'),
(42, 7, 4, 1708, 5, 3, '', '2023-06-24', 0, '0.00', 0, '2023-05-27 18:30:23', '2023-05-27 18:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `event_categories`
--

CREATE TABLE `event_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_categories`
--

INSERT INTO `event_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Track Event', '2023-05-07 10:27:31', NULL),
(2, 'Field Event', '2023-05-07 10:27:31', NULL),
(3, 'Group Event', '2023-05-07 10:28:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_registration`
--

CREATE TABLE `event_registration` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `registration_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_registration`
--

INSERT INTO `event_registration` (`id`, `event_id`, `registration_id`, `created_at`, `updated_at`) VALUES
(14, 22, 2, NULL, NULL),
(15, 27, 2, NULL, NULL),
(16, 28, 2, NULL, NULL),
(17, 14, 3, NULL, NULL),
(18, 15, 3, NULL, NULL),
(22, 17, 4, NULL, NULL),
(23, 22, 5, NULL, NULL),
(24, 26, 5, NULL, NULL),
(25, 31, 5, NULL, NULL),
(52, 13, 14, NULL, NULL),
(53, 15, 14, NULL, NULL),
(54, 17, 14, NULL, NULL),
(55, 22, 13, NULL, NULL),
(56, 26, 13, NULL, NULL),
(57, 27, 13, NULL, NULL),
(65, 25, 18, NULL, NULL),
(66, 34, 18, NULL, NULL),
(67, 28, 18, NULL, NULL),
(74, 13, 21, NULL, NULL),
(75, 15, 21, NULL, NULL),
(76, 16, 21, NULL, NULL),
(77, 22, 22, NULL, NULL),
(78, 25, 22, NULL, NULL),
(79, 27, 22, NULL, NULL),
(80, 22, 23, NULL, NULL),
(81, 25, 23, NULL, NULL),
(82, 27, 23, NULL, NULL),
(86, 10, 24, NULL, NULL),
(87, 11, 24, NULL, NULL),
(88, 42, 24, NULL, NULL),
(96, 26, 25, NULL, NULL),
(97, 31, 25, NULL, NULL),
(98, 34, 25, NULL, NULL),
(99, 23, 26, NULL, NULL),
(100, 26, 26, NULL, NULL),
(101, 35, 26, NULL, NULL),
(102, 13, 27, NULL, NULL),
(103, 15, 27, NULL, NULL),
(104, 26, 28, NULL, NULL),
(105, 22, 28, NULL, NULL),
(106, 27, 28, NULL, NULL),
(107, 10, 29, NULL, NULL),
(108, 11, 29, NULL, NULL),
(109, 42, 29, NULL, NULL),
(110, 10, 30, NULL, NULL),
(111, 15, 30, NULL, NULL),
(112, 42, 30, NULL, NULL),
(113, 13, 8, NULL, NULL),
(114, 15, 8, NULL, NULL),
(115, 16, 8, NULL, NULL),
(119, 10, 7, NULL, NULL),
(120, 11, 7, NULL, NULL),
(121, 15, 7, NULL, NULL),
(122, 13, 31, NULL, NULL),
(123, 14, 31, NULL, NULL),
(124, 15, 31, NULL, NULL),
(125, 12, 32, NULL, NULL),
(126, 11, 32, NULL, NULL),
(127, 15, 32, NULL, NULL),
(128, 10, 16, NULL, NULL),
(129, 11, 16, NULL, NULL),
(130, 42, 16, NULL, NULL),
(131, 16, 15, NULL, NULL),
(132, 17, 15, NULL, NULL),
(133, 28, 17, NULL, NULL),
(134, 34, 17, NULL, NULL),
(138, 11, 19, NULL, NULL),
(139, 12, 19, NULL, NULL),
(140, 42, 19, NULL, NULL),
(141, 10, 20, NULL, NULL),
(142, 11, 20, NULL, NULL),
(143, 42, 20, NULL, NULL),
(144, 22, 33, NULL, NULL),
(145, 25, 33, NULL, NULL),
(146, 27, 33, NULL, NULL),
(147, 13, 34, NULL, NULL),
(148, 14, 34, NULL, NULL),
(149, 15, 34, NULL, NULL),
(150, 13, 35, NULL, NULL),
(151, 14, 35, NULL, NULL),
(152, 15, 35, NULL, NULL),
(153, 11, 36, NULL, NULL),
(154, 42, 36, NULL, NULL),
(155, 15, 36, NULL, NULL),
(156, 22, 37, NULL, NULL),
(157, 28, 37, NULL, NULL),
(158, 31, 37, NULL, NULL),
(159, 13, 38, NULL, NULL),
(160, 16, 38, NULL, NULL),
(161, 17, 38, NULL, NULL),
(162, 13, 39, NULL, NULL),
(163, 15, 39, NULL, NULL),
(164, 16, 39, NULL, NULL),
(165, 13, 40, NULL, NULL),
(166, 15, 40, NULL, NULL),
(167, 16, 40, NULL, NULL),
(168, 11, 41, NULL, NULL),
(169, 10, 41, NULL, NULL),
(170, 15, 41, NULL, NULL),
(171, 11, 42, NULL, NULL),
(172, 12, 42, NULL, NULL),
(173, 42, 42, NULL, NULL),
(174, 10, 43, NULL, NULL),
(175, 11, 43, NULL, NULL),
(176, 42, 43, NULL, NULL),
(183, 11, 46, NULL, NULL),
(184, 12, 46, NULL, NULL),
(185, 15, 46, NULL, NULL),
(186, 11, 47, NULL, NULL),
(187, 12, 47, NULL, NULL),
(188, 15, 47, NULL, NULL),
(192, 13, 44, NULL, NULL),
(193, 15, 44, NULL, NULL),
(194, 16, 44, NULL, NULL),
(196, 12, 50, NULL, NULL),
(197, 11, 50, NULL, NULL),
(198, 42, 50, NULL, NULL),
(199, 10, 51, NULL, NULL),
(200, 11, 51, NULL, NULL),
(201, 42, 51, NULL, NULL),
(202, 28, 52, NULL, NULL),
(203, 34, 52, NULL, NULL),
(206, 15, 54, NULL, NULL),
(207, 16, 54, NULL, NULL),
(208, 13, 53, NULL, NULL),
(209, 14, 53, NULL, NULL),
(210, 15, 53, NULL, NULL),
(219, 10, 58, NULL, NULL),
(220, 11, 58, NULL, NULL),
(221, 15, 58, NULL, NULL),
(222, 11, 59, NULL, NULL),
(223, 16, 59, NULL, NULL),
(224, 15, 59, NULL, NULL),
(225, 26, 60, NULL, NULL),
(226, 34, 60, NULL, NULL),
(227, 28, 60, NULL, NULL),
(228, 26, 61, NULL, NULL),
(229, 34, 61, NULL, NULL),
(230, 28, 61, NULL, NULL),
(231, 28, 62, NULL, NULL),
(232, 34, 62, NULL, NULL),
(233, 10, 63, NULL, NULL),
(234, 11, 63, NULL, NULL),
(235, 42, 63, NULL, NULL),
(236, 34, 64, NULL, NULL),
(237, 28, 64, NULL, NULL),
(238, 11, 65, NULL, NULL),
(239, 12, 65, NULL, NULL),
(240, 16, 65, NULL, NULL),
(241, 10, 66, NULL, NULL),
(242, 11, 66, NULL, NULL),
(243, 42, 66, NULL, NULL),
(244, 14, 67, NULL, NULL),
(245, 15, 67, NULL, NULL),
(246, 17, 67, NULL, NULL),
(247, 10, 68, NULL, NULL),
(248, 11, 68, NULL, NULL),
(249, 42, 68, NULL, NULL),
(250, 31, 69, NULL, NULL),
(251, 34, 69, NULL, NULL),
(254, 23, 71, NULL, NULL),
(255, 26, 71, NULL, NULL),
(256, 29, 71, NULL, NULL),
(259, 21, 73, NULL, NULL),
(260, 22, 73, NULL, NULL),
(261, 31, 73, NULL, NULL),
(262, 11, 74, NULL, NULL),
(263, 12, 74, NULL, NULL),
(264, 15, 74, NULL, NULL),
(265, 11, 75, NULL, NULL),
(266, 10, 75, NULL, NULL),
(267, 15, 75, NULL, NULL),
(268, 10, 76, NULL, NULL),
(269, 11, 76, NULL, NULL),
(270, 42, 76, NULL, NULL),
(271, 22, 77, NULL, NULL),
(272, 28, 77, NULL, NULL),
(273, 27, 77, NULL, NULL),
(274, 13, 78, NULL, NULL),
(275, 15, 78, NULL, NULL),
(276, 17, 78, NULL, NULL),
(277, 11, 79, NULL, NULL),
(278, 12, 79, NULL, NULL),
(279, 10, 80, NULL, NULL),
(280, 11, 80, NULL, NULL),
(281, 42, 80, NULL, NULL),
(284, 10, 82, NULL, NULL),
(285, 11, 82, NULL, NULL),
(286, 28, 83, NULL, NULL),
(287, 31, 83, NULL, NULL),
(288, 13, 84, NULL, NULL),
(289, 15, 84, NULL, NULL),
(290, 16, 84, NULL, NULL),
(291, 13, 85, NULL, NULL),
(292, 16, 85, NULL, NULL),
(293, 15, 85, NULL, NULL),
(294, 22, 86, NULL, NULL),
(295, 31, 86, NULL, NULL),
(296, 28, 86, NULL, NULL),
(297, 10, 87, NULL, NULL),
(298, 11, 87, NULL, NULL),
(299, 42, 87, NULL, NULL),
(303, 22, 88, NULL, NULL),
(304, 26, 88, NULL, NULL),
(305, 27, 88, NULL, NULL),
(306, 13, 89, NULL, NULL),
(307, 14, 89, NULL, NULL),
(308, 15, 89, NULL, NULL),
(309, 22, 90, NULL, NULL),
(310, 26, 90, NULL, NULL),
(311, 27, 90, NULL, NULL),
(315, 22, 92, NULL, NULL),
(316, 25, 92, NULL, NULL),
(317, 27, 92, NULL, NULL),
(318, 22, 93, NULL, NULL),
(319, 26, 93, NULL, NULL),
(320, 27, 93, NULL, NULL),
(321, 13, 94, NULL, NULL),
(322, 14, 94, NULL, NULL),
(323, 15, 94, NULL, NULL),
(324, 13, 95, NULL, NULL),
(325, 15, 95, NULL, NULL),
(326, 16, 95, NULL, NULL),
(327, 21, 96, NULL, NULL),
(328, 24, 96, NULL, NULL),
(329, 33, 96, NULL, NULL),
(330, 10, 97, NULL, NULL),
(331, 11, 97, NULL, NULL),
(332, 42, 97, NULL, NULL),
(333, 13, 91, NULL, NULL),
(334, 15, 91, NULL, NULL),
(335, 16, 91, NULL, NULL),
(336, 22, 98, NULL, NULL),
(337, 26, 98, NULL, NULL),
(338, 27, 98, NULL, NULL),
(339, 13, 99, NULL, NULL),
(340, 14, 99, NULL, NULL),
(341, 15, 99, NULL, NULL),
(342, 22, 100, NULL, NULL),
(343, 31, 100, NULL, NULL),
(344, 34, 100, NULL, NULL),
(348, 11, 101, NULL, NULL),
(349, 12, 101, NULL, NULL),
(350, 42, 101, NULL, NULL),
(355, 10, 104, NULL, NULL),
(356, 11, 104, NULL, NULL),
(357, 42, 104, NULL, NULL),
(358, 28, 55, NULL, NULL),
(359, 31, 55, NULL, NULL),
(360, 34, 55, NULL, NULL),
(361, 13, 105, NULL, NULL),
(362, 16, 105, NULL, NULL),
(363, 17, 105, NULL, NULL),
(364, 13, 106, NULL, NULL),
(365, 17, 106, NULL, NULL),
(366, 15, 106, NULL, NULL),
(371, 28, 108, NULL, NULL),
(372, 34, 108, NULL, NULL),
(373, 21, 109, NULL, NULL),
(374, 28, 109, NULL, NULL),
(375, 34, 109, NULL, NULL),
(376, 13, 110, NULL, NULL),
(377, 16, 110, NULL, NULL),
(382, 34, 111, NULL, NULL),
(383, 28, 111, NULL, NULL),
(384, 17, 112, NULL, NULL),
(385, 16, 112, NULL, NULL),
(386, 13, 113, NULL, NULL),
(387, 15, 113, NULL, NULL),
(388, 16, 113, NULL, NULL),
(389, 11, 114, NULL, NULL),
(390, 12, 114, NULL, NULL),
(391, 15, 114, NULL, NULL),
(392, 13, 115, NULL, NULL),
(393, 16, 115, NULL, NULL),
(394, 17, 115, NULL, NULL),
(395, 10, 116, NULL, NULL),
(396, 11, 116, NULL, NULL),
(397, 42, 116, NULL, NULL),
(400, 22, 118, NULL, NULL),
(401, 28, 118, NULL, NULL),
(402, 34, 118, NULL, NULL),
(403, 15, 119, NULL, NULL),
(404, 16, 119, NULL, NULL),
(405, 11, 120, NULL, NULL),
(406, 12, 120, NULL, NULL),
(407, 15, 120, NULL, NULL),
(408, 21, 121, NULL, NULL),
(409, 30, 121, NULL, NULL),
(410, 36, 121, NULL, NULL),
(413, 14, 123, NULL, NULL),
(414, 16, 123, NULL, NULL),
(415, 17, 123, NULL, NULL),
(416, 14, 124, NULL, NULL),
(417, 16, 124, NULL, NULL),
(418, 17, 124, NULL, NULL),
(425, 26, 126, NULL, NULL),
(426, 35, 126, NULL, NULL),
(427, 32, 126, NULL, NULL),
(428, 21, 125, NULL, NULL),
(429, 31, 125, NULL, NULL),
(430, 34, 125, NULL, NULL),
(431, 22, 122, NULL, NULL),
(432, 26, 122, NULL, NULL),
(433, 28, 122, NULL, NULL),
(437, 30, 127, NULL, NULL),
(438, 33, 127, NULL, NULL),
(439, 36, 127, NULL, NULL),
(440, 30, 128, NULL, NULL),
(441, 33, 128, NULL, NULL),
(442, 36, 128, NULL, NULL),
(444, 10, 130, NULL, NULL),
(445, 11, 130, NULL, NULL),
(446, 42, 130, NULL, NULL),
(450, 22, 103, NULL, NULL),
(451, 25, 103, NULL, NULL),
(452, 27, 103, NULL, NULL),
(453, 15, 102, NULL, NULL),
(454, 16, 102, NULL, NULL),
(455, 17, 102, NULL, NULL),
(456, 28, 72, NULL, NULL),
(457, 31, 72, NULL, NULL),
(458, 34, 72, NULL, NULL),
(459, 26, 131, NULL, NULL),
(460, 34, 131, NULL, NULL),
(461, 31, 131, NULL, NULL),
(462, 34, 132, NULL, NULL),
(463, 31, 132, NULL, NULL),
(464, 28, 132, NULL, NULL),
(465, 13, 133, NULL, NULL),
(466, 14, 133, NULL, NULL),
(467, 15, 133, NULL, NULL),
(471, 14, 135, NULL, NULL),
(472, 15, 135, NULL, NULL),
(473, 12, 136, NULL, NULL),
(474, 11, 136, NULL, NULL),
(475, 15, 136, NULL, NULL),
(476, 13, 137, NULL, NULL),
(477, 14, 137, NULL, NULL),
(478, 15, 137, NULL, NULL),
(479, 10, 138, NULL, NULL),
(480, 11, 138, NULL, NULL),
(481, 42, 138, NULL, NULL),
(482, 28, 139, NULL, NULL),
(483, 31, 139, NULL, NULL),
(484, 34, 139, NULL, NULL),
(485, 10, 140, NULL, NULL),
(486, 15, 140, NULL, NULL),
(487, 42, 140, NULL, NULL),
(488, 13, 141, NULL, NULL),
(489, 15, 141, NULL, NULL),
(490, 16, 141, NULL, NULL),
(491, 28, 142, NULL, NULL),
(492, 34, 142, NULL, NULL),
(496, 13, 144, NULL, NULL),
(497, 15, 144, NULL, NULL),
(498, 16, 144, NULL, NULL),
(499, 13, 145, NULL, NULL),
(500, 15, 145, NULL, NULL),
(501, 16, 145, NULL, NULL),
(502, 13, 146, NULL, NULL),
(503, 14, 146, NULL, NULL),
(504, 15, 146, NULL, NULL),
(505, 11, 147, NULL, NULL),
(506, 12, 147, NULL, NULL),
(507, 42, 147, NULL, NULL),
(508, 13, 148, NULL, NULL),
(509, 15, 148, NULL, NULL),
(510, 16, 148, NULL, NULL),
(511, 13, 149, NULL, NULL),
(512, 14, 149, NULL, NULL),
(513, 15, 149, NULL, NULL),
(514, 22, 150, NULL, NULL),
(515, 26, 150, NULL, NULL),
(516, 31, 150, NULL, NULL),
(517, 29, 151, NULL, NULL),
(518, 32, 151, NULL, NULL),
(519, 35, 151, NULL, NULL),
(520, 11, 129, NULL, NULL),
(521, 12, 129, NULL, NULL),
(522, 15, 129, NULL, NULL),
(523, 22, 152, NULL, NULL),
(524, 26, 152, NULL, NULL),
(525, 27, 152, NULL, NULL),
(526, 26, 153, NULL, NULL),
(527, 22, 153, NULL, NULL),
(528, 27, 153, NULL, NULL),
(529, 16, 154, NULL, NULL),
(530, 17, 154, NULL, NULL),
(531, 13, 155, NULL, NULL),
(532, 14, 155, NULL, NULL),
(533, 15, 155, NULL, NULL),
(534, 23, 156, NULL, NULL),
(535, 29, 156, NULL, NULL),
(536, 35, 156, NULL, NULL),
(537, 21, 157, NULL, NULL),
(538, 22, 157, NULL, NULL),
(539, 28, 157, NULL, NULL),
(540, 10, 158, NULL, NULL),
(541, 15, 158, NULL, NULL),
(542, 42, 158, NULL, NULL),
(543, 16, 159, NULL, NULL),
(544, 17, 159, NULL, NULL),
(545, 15, 159, NULL, NULL),
(546, 14, 160, NULL, NULL),
(547, 13, 160, NULL, NULL),
(548, 15, 160, NULL, NULL),
(549, 10, 161, NULL, NULL),
(550, 11, 161, NULL, NULL),
(551, 42, 161, NULL, NULL),
(552, 13, 162, NULL, NULL),
(553, 15, 162, NULL, NULL),
(554, 16, 162, NULL, NULL),
(555, 21, 163, NULL, NULL),
(556, 22, 163, NULL, NULL),
(557, 28, 163, NULL, NULL),
(558, 13, 164, NULL, NULL),
(559, 15, 164, NULL, NULL),
(560, 16, 164, NULL, NULL),
(561, 21, 165, NULL, NULL),
(562, 22, 165, NULL, NULL),
(563, 28, 165, NULL, NULL),
(564, 11, 166, NULL, NULL),
(565, 12, 166, NULL, NULL),
(566, 42, 166, NULL, NULL),
(567, 25, 167, NULL, NULL),
(568, 22, 167, NULL, NULL),
(569, 34, 167, NULL, NULL),
(570, 13, 168, NULL, NULL),
(571, 14, 168, NULL, NULL),
(572, 15, 168, NULL, NULL),
(576, 28, 170, NULL, NULL),
(577, 31, 170, NULL, NULL),
(578, 34, 170, NULL, NULL),
(579, 13, 171, NULL, NULL),
(580, 16, 171, NULL, NULL),
(581, 17, 171, NULL, NULL),
(582, 10, 172, NULL, NULL),
(583, 15, 172, NULL, NULL),
(584, 42, 172, NULL, NULL),
(585, 13, 173, NULL, NULL),
(586, 14, 173, NULL, NULL),
(587, 16, 173, NULL, NULL),
(591, 11, 175, NULL, NULL),
(592, 12, 175, NULL, NULL),
(593, 15, 175, NULL, NULL),
(594, 11, 174, NULL, NULL),
(595, 12, 174, NULL, NULL),
(596, 42, 174, NULL, NULL),
(597, 10, 176, NULL, NULL),
(598, 11, 176, NULL, NULL),
(599, 42, 176, NULL, NULL),
(600, 13, 177, NULL, NULL),
(601, 14, 177, NULL, NULL),
(602, 15, 177, NULL, NULL),
(603, 11, 178, NULL, NULL),
(604, 12, 178, NULL, NULL),
(605, 15, 178, NULL, NULL),
(606, 13, 179, NULL, NULL),
(607, 14, 179, NULL, NULL),
(608, 15, 179, NULL, NULL),
(611, 28, 180, NULL, NULL),
(612, 31, 180, NULL, NULL),
(613, 14, 181, NULL, NULL),
(614, 13, 181, NULL, NULL),
(615, 16, 181, NULL, NULL),
(616, 11, 182, NULL, NULL),
(617, 12, 182, NULL, NULL),
(618, 16, 182, NULL, NULL),
(619, 34, 183, NULL, NULL),
(620, 28, 183, NULL, NULL),
(621, 42, 184, NULL, NULL),
(622, 26, 185, NULL, NULL),
(623, 35, 185, NULL, NULL),
(624, 32, 185, NULL, NULL),
(625, 13, 186, NULL, NULL),
(626, 15, 186, NULL, NULL),
(631, 11, 187, NULL, NULL),
(632, 15, 187, NULL, NULL),
(633, 16, 187, NULL, NULL),
(634, 10, 188, NULL, NULL),
(635, 11, 188, NULL, NULL),
(636, 42, 188, NULL, NULL),
(637, 11, 189, NULL, NULL),
(638, 12, 189, NULL, NULL),
(639, 16, 189, NULL, NULL),
(640, 31, 70, NULL, NULL),
(641, 34, 70, NULL, NULL),
(642, 23, 190, NULL, NULL),
(643, 26, 190, NULL, NULL),
(644, 32, 190, NULL, NULL),
(645, 28, 191, NULL, NULL),
(646, 31, 191, NULL, NULL),
(647, 34, 191, NULL, NULL),
(651, 11, 193, NULL, NULL),
(652, 15, 193, NULL, NULL),
(653, 16, 193, NULL, NULL),
(654, 10, 194, NULL, NULL),
(655, 15, 194, NULL, NULL),
(656, 42, 194, NULL, NULL),
(657, 10, 195, NULL, NULL),
(658, 11, 195, NULL, NULL),
(659, 15, 195, NULL, NULL),
(660, 10, 196, NULL, NULL),
(661, 15, 196, NULL, NULL),
(662, 42, 196, NULL, NULL),
(663, 11, 197, NULL, NULL),
(664, 12, 197, NULL, NULL),
(665, 16, 197, NULL, NULL),
(666, 13, 198, NULL, NULL),
(667, 14, 198, NULL, NULL),
(668, 15, 198, NULL, NULL),
(669, 13, 199, NULL, NULL),
(670, 14, 199, NULL, NULL),
(671, 16, 199, NULL, NULL),
(672, 13, 143, NULL, NULL),
(673, 15, 143, NULL, NULL),
(674, 16, 143, NULL, NULL),
(675, 10, 200, NULL, NULL),
(676, 11, 200, NULL, NULL),
(677, 42, 200, NULL, NULL),
(678, 17, 201, NULL, NULL),
(679, 16, 201, NULL, NULL),
(680, 15, 201, NULL, NULL),
(681, 11, 202, NULL, NULL),
(682, 15, 202, NULL, NULL),
(683, 16, 202, NULL, NULL),
(684, 28, 203, NULL, NULL),
(685, 31, 203, NULL, NULL),
(686, 34, 203, NULL, NULL),
(687, 13, 204, NULL, NULL),
(688, 15, 204, NULL, NULL),
(689, 16, 204, NULL, NULL),
(690, 23, 205, NULL, NULL),
(691, 26, 205, NULL, NULL),
(692, 28, 206, NULL, NULL),
(693, 31, 206, NULL, NULL),
(694, 10, 207, NULL, NULL),
(695, 11, 207, NULL, NULL),
(696, 42, 207, NULL, NULL),
(697, 14, 208, NULL, NULL),
(698, 17, 208, NULL, NULL),
(699, 15, 208, NULL, NULL),
(700, 13, 209, NULL, NULL),
(701, 15, 209, NULL, NULL),
(702, 16, 209, NULL, NULL),
(703, 28, 210, NULL, NULL),
(704, 31, 210, NULL, NULL),
(705, 34, 210, NULL, NULL),
(706, 11, 211, NULL, NULL),
(707, 12, 211, NULL, NULL),
(708, 42, 211, NULL, NULL),
(712, 22, 213, NULL, NULL),
(713, 25, 213, NULL, NULL),
(714, 27, 213, NULL, NULL),
(718, 22, 215, NULL, NULL),
(719, 26, 215, NULL, NULL),
(720, 22, 216, NULL, NULL),
(721, 31, 216, NULL, NULL),
(722, 27, 216, NULL, NULL),
(723, 13, 217, NULL, NULL),
(724, 16, 217, NULL, NULL),
(725, 17, 217, NULL, NULL),
(726, 12, 218, NULL, NULL),
(727, 11, 218, NULL, NULL),
(728, 15, 218, NULL, NULL),
(729, 13, 219, NULL, NULL),
(730, 14, 219, NULL, NULL),
(731, 15, 219, NULL, NULL),
(734, 23, 220, NULL, NULL),
(735, 26, 220, NULL, NULL),
(736, 22, 221, NULL, NULL),
(737, 28, 221, NULL, NULL),
(738, 31, 221, NULL, NULL),
(739, 16, 222, NULL, NULL),
(740, 17, 222, NULL, NULL),
(747, 10, 48, NULL, NULL),
(748, 11, 48, NULL, NULL),
(749, 15, 48, NULL, NULL),
(756, 10, 225, NULL, NULL),
(757, 11, 225, NULL, NULL),
(758, 42, 225, NULL, NULL),
(759, 10, 226, NULL, NULL),
(760, 11, 226, NULL, NULL),
(761, 42, 226, NULL, NULL),
(762, 11, 227, NULL, NULL),
(763, 10, 227, NULL, NULL),
(764, 42, 227, NULL, NULL),
(765, 11, 228, NULL, NULL),
(766, 12, 228, NULL, NULL),
(767, 42, 228, NULL, NULL),
(768, 31, 229, NULL, NULL),
(769, 34, 229, NULL, NULL),
(770, 28, 229, NULL, NULL),
(771, 28, 230, NULL, NULL),
(772, 31, 230, NULL, NULL),
(773, 34, 230, NULL, NULL),
(777, 26, 231, NULL, NULL),
(778, 32, 231, NULL, NULL),
(779, 29, 231, NULL, NULL),
(780, 31, 232, NULL, NULL),
(781, 28, 232, NULL, NULL),
(782, 34, 232, NULL, NULL),
(783, 13, 233, NULL, NULL),
(784, 17, 233, NULL, NULL),
(785, 16, 233, NULL, NULL),
(786, 10, 234, NULL, NULL),
(787, 42, 234, NULL, NULL),
(788, 15, 234, NULL, NULL),
(789, 31, 235, NULL, NULL),
(790, 28, 235, NULL, NULL),
(791, 10, 236, NULL, NULL),
(792, 11, 236, NULL, NULL),
(793, 42, 236, NULL, NULL),
(794, 13, 237, NULL, NULL),
(795, 15, 237, NULL, NULL),
(796, 16, 237, NULL, NULL),
(801, 13, 169, NULL, NULL),
(802, 11, 238, NULL, NULL),
(803, 15, 238, NULL, NULL),
(804, 42, 238, NULL, NULL),
(805, 11, 239, NULL, NULL),
(806, 42, 239, NULL, NULL),
(807, 15, 239, NULL, NULL),
(808, 10, 240, NULL, NULL),
(809, 15, 240, NULL, NULL),
(810, 42, 240, NULL, NULL),
(811, 10, 241, NULL, NULL),
(812, 11, 241, NULL, NULL),
(813, 42, 241, NULL, NULL),
(814, 11, 242, NULL, NULL),
(815, 15, 242, NULL, NULL),
(816, 16, 242, NULL, NULL),
(817, 21, 243, NULL, NULL),
(818, 22, 243, NULL, NULL),
(819, 24, 244, NULL, NULL),
(820, 30, 244, NULL, NULL),
(821, 13, 214, NULL, NULL),
(822, 15, 214, NULL, NULL),
(823, 16, 214, NULL, NULL),
(824, 22, 212, NULL, NULL),
(825, 27, 212, NULL, NULL),
(826, 15, 107, NULL, NULL),
(827, 16, 107, NULL, NULL),
(828, 17, 107, NULL, NULL),
(829, 27, 245, NULL, NULL),
(830, 28, 245, NULL, NULL),
(831, 26, 246, NULL, NULL),
(832, 27, 246, NULL, NULL),
(833, 34, 246, NULL, NULL),
(834, 22, 247, NULL, NULL),
(835, 25, 247, NULL, NULL),
(836, 27, 247, NULL, NULL),
(837, 22, 248, NULL, NULL),
(838, 27, 248, NULL, NULL),
(839, 34, 248, NULL, NULL),
(843, 27, 81, NULL, NULL),
(844, 31, 81, NULL, NULL),
(845, 34, 81, NULL, NULL),
(846, 12, 249, NULL, NULL),
(847, 16, 249, NULL, NULL),
(848, 15, 249, NULL, NULL),
(849, 28, 250, NULL, NULL),
(850, 31, 250, NULL, NULL),
(851, 34, 250, NULL, NULL),
(852, 13, 251, NULL, NULL),
(853, 14, 251, NULL, NULL),
(854, 15, 251, NULL, NULL),
(855, 14, 223, NULL, NULL),
(856, 15, 223, NULL, NULL),
(857, 16, 223, NULL, NULL),
(858, 10, 224, NULL, NULL),
(859, 15, 224, NULL, NULL),
(860, 42, 224, NULL, NULL),
(861, 22, 252, NULL, NULL),
(862, 26, 252, NULL, NULL),
(863, 27, 252, NULL, NULL),
(864, 10, 253, NULL, NULL),
(865, 15, 253, NULL, NULL),
(866, 42, 253, NULL, NULL),
(867, 10, 254, NULL, NULL),
(868, 15, 254, NULL, NULL),
(869, 42, 254, NULL, NULL),
(870, 10, 255, NULL, NULL),
(871, 15, 255, NULL, NULL),
(872, 42, 255, NULL, NULL),
(873, 10, 256, NULL, NULL),
(874, 15, 256, NULL, NULL),
(875, 42, 256, NULL, NULL),
(876, 10, 257, NULL, NULL),
(877, 15, 257, NULL, NULL),
(878, 42, 257, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_users`
--

CREATE TABLE `event_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(255) NOT NULL,
  `mime` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Male', '2022-05-13 03:47:12', '2022-05-13 03:47:12'),
(2, 'Female', '2022-05-13 03:47:12', '2022-05-13 03:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `signup_logo` varchar(255) DEFAULT NULL,
  `dashboard_logo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `header` varchar(255) DEFAULT NULL,
  `footer` longtext DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `name`, `title`, `telephone`, `address`, `signup_logo`, `dashboard_logo`, `email`, `header`, `footer`, `website_url`, `created_at`, `updated_at`) VALUES
(1, 'Norway Tamil Sport Management System', 'Norway Tamil Sport Management System', '+47 467 73 535', 'Norway Tamil Sangam, Stovner vel, Fjellstuveien 26, 0982 Oslo, Norway.', '20230614182035.png', '20230614182035.png', 'tamilsangam@gmail.com', '20230614182035.jpg', 'Norway Tamil Sangam, Stovner vel, Fjellstuveien 26, 0982 Oslo, Norway.', 'https://sangamil.com/', '2022-05-13 03:47:12', '2023-06-14 18:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `group_registrations`
--

CREATE TABLE `group_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `club_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `season_id` bigint(20) UNSIGNED NOT NULL,
  `league_id` bigint(20) UNSIGNED NOT NULL,
  `age_group_gender_id` bigint(20) UNSIGNED NOT NULL,
  `totalfee` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `trans_id` varchar(255) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `inv_no` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_registrations`
--

INSERT INTO `group_registrations` (`id`, `club_id`, `event_id`, `organization_id`, `season_id`, `league_id`, `age_group_gender_id`, `totalfee`, `status`, `trans_id`, `payment_method`, `inv_no`, `created_at`, `updated_at`) VALUES
(21, 7, 37, 5, 1, 5, 352, 0.00, 0, '', 0, 0, '2023-06-13 10:29:04', '2023-06-13 10:29:04'),
(22, 7, 37, 5, 1, 5, 353, 0.00, 0, '', 0, 0, '2023-06-13 10:29:25', '2023-06-13 10:29:25'),
(23, 7, 37, 5, 1, 5, 354, 0.00, 0, '', 0, 0, '2023-06-13 10:29:44', '2023-06-13 10:29:44'),
(24, 7, 37, 5, 1, 5, 355, 0.00, 0, '', 0, 0, '2023-06-13 10:29:54', '2023-06-13 10:29:54'),
(25, 7, 37, 5, 1, 5, 356, 0.00, 0, '', 0, 0, '2023-06-13 10:30:07', '2023-06-13 10:30:07'),
(26, 7, 37, 5, 1, 5, 357, 0.00, 0, '', 0, 0, '2023-06-13 10:30:19', '2023-06-13 10:30:19'),
(27, 7, 38, 5, 1, 5, 358, 0.00, 0, '', 0, 0, '2023-06-13 10:30:30', '2023-06-13 10:30:30'),
(28, 7, 38, 5, 1, 5, 359, 0.00, 0, '', 0, 0, '2023-06-13 10:30:47', '2023-06-13 10:30:47'),
(29, 7, 39, 5, 1, 5, 362, 0.00, 0, '', 0, 0, '2023-06-13 10:31:21', '2023-06-13 10:31:21'),
(30, 7, 39, 5, 1, 5, 363, 0.00, 0, '', 0, 0, '2023-06-13 10:31:36', '2023-06-13 10:31:36'),
(31, 7, 40, 5, 1, 5, 364, 0.00, 0, '', 0, 0, '2023-06-13 10:32:15', '2023-06-13 10:32:15'),
(32, 7, 40, 5, 1, 5, 365, 0.00, 0, '', 0, 0, '2023-06-13 10:32:31', '2023-06-13 10:32:31'),
(33, 7, 41, 5, 1, 5, 366, 0.00, 0, '', 0, 0, '2023-06-13 10:32:44', '2023-06-13 10:32:44'),
(34, 7, 18, 5, 1, 4, 260, 0.00, 0, '', 0, 0, '2023-06-13 10:33:04', '2023-06-13 10:33:04'),
(35, 7, 18, 5, 1, 4, 261, 0.00, 0, '', 0, 0, '2023-06-13 10:33:26', '2023-06-13 10:33:26'),
(36, 7, 18, 5, 1, 4, 262, 0.00, 0, '', 0, 0, '2023-06-13 10:33:45', '2023-06-13 10:33:45'),
(37, 7, 18, 5, 1, 4, 263, 0.00, 0, '', 0, 0, '2023-06-13 10:34:04', '2023-06-13 10:34:04'),
(38, 7, 18, 5, 1, 4, 264, 0.00, 0, '', 0, 0, '2023-06-13 10:34:23', '2023-06-13 10:34:23'),
(39, 7, 18, 5, 1, 4, 265, 0.00, 0, '', 0, 0, '2023-06-13 10:34:39', '2023-06-13 10:34:39'),
(40, 7, 19, 5, 1, 4, 266, 0.00, 0, '', 0, 0, '2023-06-13 10:34:57', '2023-06-13 10:34:57'),
(41, 7, 19, 5, 1, 4, 267, 0.00, 0, '', 0, 0, '2023-06-13 10:35:31', '2023-06-13 10:35:31'),
(42, 7, 20, 5, 1, 4, 268, 0.00, 0, '', 0, 0, '2023-06-13 10:36:12', '2023-06-13 10:36:12'),
(43, 2, 37, 5, 1, 5, 352, 0.00, 0, '', 0, 0, '2023-06-13 23:14:05', '2023-06-13 23:14:05'),
(44, 2, 37, 5, 1, 5, 356, 0.00, 0, '', 0, 0, '2023-06-13 23:14:16', '2023-06-13 23:14:16'),
(45, 2, 38, 5, 1, 5, 358, 0.00, 0, '', 0, 0, '2023-06-13 23:14:24', '2023-06-13 23:14:24'),
(46, 2, 38, 5, 1, 5, 359, 0.00, 0, '', 0, 0, '2023-06-13 23:14:32', '2023-06-13 23:14:32'),
(47, 2, 38, 5, 1, 5, 360, 0.00, 0, '', 0, 0, '2023-06-13 23:14:41', '2023-06-13 23:14:41'),
(48, 2, 38, 5, 1, 5, 361, 0.00, 0, '', 0, 0, '2023-06-13 23:14:50', '2023-06-13 23:14:50'),
(49, 2, 39, 5, 1, 5, 363, 0.00, 0, '', 0, 0, '2023-06-13 23:21:48', '2023-06-13 23:21:48'),
(50, 2, 18, 5, 1, 4, 261, 0.00, 0, '', 0, 0, '2023-06-13 23:27:51', '2023-06-13 23:27:51'),
(51, 2, 20, 5, 1, 4, 268, 0.00, 0, '', 0, 0, '2023-06-13 23:29:04', '2023-06-13 23:29:04'),
(52, 2, 41, 5, 1, 5, 366, 0.00, 0, '', 0, 0, '2023-06-13 23:29:15', '2023-06-13 23:29:15'),
(53, 2, 18, 5, 1, 4, 263, 0.00, 0, '', 0, 0, '2023-06-13 23:29:31', '2023-06-13 23:29:31'),
(54, 2, 18, 5, 1, 4, 265, 0.00, 0, '', 0, 0, '2023-06-13 23:33:33', '2023-06-13 23:33:33'),
(55, 2, 19, 5, 1, 4, 266, 0.00, 0, '', 0, 0, '2023-06-13 23:33:46', '2023-06-13 23:33:46'),
(56, 2, 19, 5, 1, 4, 267, 0.00, 0, '', 0, 0, '2023-06-13 23:42:14', '2023-06-13 23:42:14'),
(57, 12, 37, 5, 1, 5, 357, 0.00, 0, '', 0, 0, '2023-06-14 08:47:48', '2023-06-14 08:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `group_registration_teams`
--

CREATE TABLE `group_registration_teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `group_registration_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_registration_teams`
--

INSERT INTO `group_registration_teams` (`id`, `team_id`, `group_registration_id`, `created_at`, `updated_at`) VALUES
(9, 16, 21, NULL, NULL),
(10, 17, 21, NULL, NULL),
(11, 19, 22, NULL, NULL),
(12, 20, 22, NULL, NULL),
(13, 22, 23, NULL, NULL),
(14, 23, 24, NULL, NULL),
(15, 27, 25, NULL, NULL),
(16, 25, 26, NULL, NULL),
(17, 18, 27, NULL, NULL),
(18, 24, 28, NULL, NULL),
(19, 28, 29, NULL, NULL),
(20, 29, 29, NULL, NULL),
(21, 30, 29, NULL, NULL),
(22, 33, 30, NULL, NULL),
(23, 28, 31, NULL, NULL),
(24, 33, 32, NULL, NULL),
(25, 32, 33, NULL, NULL),
(26, 3, 34, NULL, NULL),
(27, 4, 34, NULL, NULL),
(28, 6, 35, NULL, NULL),
(29, 7, 36, NULL, NULL),
(30, 8, 37, NULL, NULL),
(31, 10, 38, NULL, NULL),
(32, 11, 38, NULL, NULL),
(33, 12, 39, NULL, NULL),
(34, 13, 40, NULL, NULL),
(35, 14, 40, NULL, NULL),
(36, 15, 41, NULL, NULL),
(37, 13, 42, NULL, NULL),
(38, 53, 43, NULL, NULL),
(39, 41, 44, NULL, NULL),
(40, 40, 45, NULL, NULL),
(41, 50, 46, NULL, NULL),
(42, 55, 47, NULL, NULL),
(43, 47, 48, NULL, NULL),
(44, 45, 49, NULL, NULL),
(45, 43, 50, NULL, NULL),
(46, 42, 51, NULL, NULL),
(47, 39, 52, NULL, NULL),
(48, 36, 53, NULL, NULL),
(49, 37, 54, NULL, NULL),
(50, 42, 55, NULL, NULL),
(51, 44, 56, NULL, NULL),
(52, 57, 57, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inquaries`
--

CREATE TABLE `inquaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL,
  `club_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `leave_or_delete` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leagues`
--

CREATE TABLE `leagues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `sports_category_id` bigint(20) UNSIGNED NOT NULL,
  `venue_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `season_id` bigint(20) UNSIGNED NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `reg_start_date` date NOT NULL,
  `reg_end_date` date NOT NULL,
  `champions` tinyint(1) DEFAULT NULL,
  `clubpoints` tinyint(1) NOT NULL DEFAULT 0,
  `clubpoints_value` int(11) NOT NULL DEFAULT 0,
  `tracks` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leagues`
--

INSERT INTO `leagues` (`id`, `name`, `sports_category_id`, `venue_id`, `organization_id`, `season_id`, `from_date`, `to_date`, `reg_start_date`, `reg_end_date`, `champions`, `clubpoints`, `clubpoints_value`, `tracks`, `created_at`, `updated_at`) VALUES
(4, 'TCC UNDER 16', 1, 1, 5, 3, '2023-06-24', '2023-06-25', '2023-04-10', '2023-06-15', 1, 0, 0, NULL, '2023-05-10 19:08:01', '2023-06-20 08:18:16'),
(5, 'TCC OVER 17', 1, 1, 5, 3, '2023-06-24', '2023-06-25', '2023-04-10', '2023-06-15', 1, 0, 0, NULL, '2023-05-10 19:08:54', '2023-05-24 20:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `main_events`
--

CREATE TABLE `main_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `event_category_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `discount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_events`
--

INSERT INTO `main_events` (`id`, `name`, `event_category_id`, `organization_id`, `price`, `discount`) VALUES
(1, '40M Running', 1, 5, 0.00, '0'),
(2, '60M Running', 1, 5, 0.00, '0'),
(3, '80M Running', 1, 5, 0.00, '0'),
(4, '100M Running', 1, 5, 0.00, '0'),
(5, '600M Running', 1, 5, 0.00, '0'),
(6, 'Long Jump', 2, 5, 0.00, '0'),
(7, 'Ball Throw', 2, 5, 0.00, '0'),
(8, 'Put Shot', 2, 5, 0.00, '0'),
(9, 'Javelin Throw', 2, 5, 0.00, '0'),
(10, '4X100M Relay', 3, 5, 0.00, '0'),
(11, '1000M Relay', 3, 5, 0.00, '0'),
(12, 'Kayaru Iluthal', 3, 5, 0.00, '0'),
(13, '200M Running', 1, 5, 0.00, '0'),
(14, 'Discus Throw', 2, 5, 0.00, '0'),
(15, 'Kulai Eduthal', 3, 5, 0.00, '0');

-- --------------------------------------------------------

--
-- Table structure for table `marathon_points`
--

CREATE TABLE `marathon_points` (
  `id` bigint(20) NOT NULL,
  `league_id` bigint(20) NOT NULL,
  `club_id` bigint(20) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marathon_points`
--

INSERT INTO `marathon_points` (`id`, `league_id`, `club_id`, `points`) VALUES
(26, 4, 7, 0),
(27, 4, 10, 0),
(28, 4, 2, 0),
(29, 4, 5, 0),
(30, 4, 8, 0),
(31, 4, 12, 0),
(32, 4, 11, 0),
(33, 4, 4, 0),
(34, 5, 7, 0),
(35, 5, 10, 0),
(36, 5, 2, 0),
(37, 5, 5, 0),
(38, 5, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_role`
--

CREATE TABLE `message_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2000_03_08_102412_create_country_code_table', 1),
(2, '2001_10_12_112218_create_currency_table', 1),
(3, '2011_09_28_041953_create_seasonss_table', 1),
(4, '2012_10_25_073241_create_countries_table', 1),
(5, '2013_09_23_092356_create_organizations_table', 1),
(6, '2014_09_03_075117_create_clubs_table', 1),
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2015_08_09_200015_create_blog_module_table', 1),
(10, '2015_08_11_064636_add_slug_to_blogs_table', 1),
(11, '2015_11_10_140011_create_files_table', 1),
(12, '2016_01_02_062647_create_tasks_table', 1),
(13, '2016_04_26_054601_create_datatables_table', 1),
(14, '2016_10_04_103149_add_fields_datatables_table', 1),
(15, '2017_10_25_040922_add_country_field', 1),
(16, '2017_10_25_043738_create_activity_log_table', 1),
(17, '2018_02_14_072522_create_news_table', 1),
(18, '2019_08_19_000000_create_failed_jobs_table', 1),
(19, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(20, '2020_09_28_080706_create_venues_table', 1),
(21, '2020_09_29_080228_create_genders_table', 1),
(22, '2020_09_29_094608_create_sports_categories_table', 1),
(23, '2021_07_29_094246_create_leagues_table', 1),
(24, '2021_08_28_073911_create_event_categories_table', 1),
(25, '2021_09_10_045348_create_main_events_table', 1),
(26, '2021_09_15_072029_create_permission_tables', 1),
(27, '2021_09_15_092012_create_notifications_table', 1),
(28, '2021_09_16_102342_create_general_settings_table', 1),
(29, '2021_09_27_042234_create_org_settings_table', 1),
(30, '2021_09_28_053814_create_age_groups_table', 1),
(31, '2021_09_28_073736_create_events_table', 1),
(32, '2021_09_28_073836_create_event_users_table', 1),
(33, '2021_09_30_044056_create_venue_details_table', 1),
(34, '2021_10_09_155141_create_age_group_event_table', 1),
(35, '2021_10_11_075518_create_age_group_genders_table', 1),
(36, '2021_10_18_045027_create_report_names_table', 1),
(37, '2021_10_18_045649_create_user_reports_table', 1),
(38, '2021_10_26_073325_create_atheletic_settings_table', 1),
(39, '2021_10_28_055208_create_registrations_table', 1),
(40, '2021_10_28_071736_create_event_registration_table', 1),
(41, '2021_11_01_044228_create_age_group_gender_user_table', 1),
(42, '2021_11_01_073056_create_messages_table', 1),
(43, '2021_11_08_071220_create_message_role_table', 1),
(44, '2021_11_22_084457_create_teams_table', 1),
(45, '2021_11_22_085347_create_team_users_table', 1),
(46, '2021_11_23_062653_create_group_registrations_table', 1),
(47, '2021_11_23_063234_create_group_registration_teams_table', 1),
(48, '2021_11_30_052903_create_venue_field_details_table', 1),
(49, '2021_12_06_092127_create_age_group_gender_team_table', 1),
(50, '2021_12_13_053924_create_bank_transfer_table', 1),
(51, '2021_12_13_053949_create_vipps_table', 1),
(52, '2021_12_13_054357_create_stripe_table', 1),
(53, '2021_12_13_081152_create_active_payment_methods_table', 1),
(54, '2022_01_26_152950_create_active_users_table', 1),
(55, '2022_01_31_104859_create_day_users_table', 1),
(56, '2022_02_15_052404_create_club_requests_table', 1),
(57, '2022_04_26_045859_create_inquaries_table', 1),
(58, '2021_12_10_085720_create_qr_payments_table', 2),
(59, '2023_06_07_134107_add_event_column_to_activity_log_table', 3),
(60, '2023_06_07_134108_add_batch_uuid_column_to_activity_log_table', 4),
(61, '2023_06_18_203657_add_clubpoints_column_to_leagues', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 1),
(3, 'App\\User', 1),
(4, 'App\\User', 1),
(5, 'App\\User', 1),
(6, 'App\\User', 1),
(7, 'App\\User', 1),
(8, 'App\\User', 1),
(9, 'App\\User', 1),
(10, 'App\\User', 1),
(11, 'App\\User', 1),
(12, 'App\\User', 1),
(13, 'App\\User', 1),
(14, 'App\\User', 1),
(15, 'App\\User', 1),
(16, 'App\\User', 1),
(17, 'App\\User', 1),
(18, 'App\\User', 1),
(19, 'App\\User', 1),
(20, 'App\\User', 1),
(21, 'App\\User', 1),
(22, 'App\\User', 1),
(23, 'App\\User', 1),
(24, 'App\\User', 1),
(25, 'App\\User', 1),
(26, 'App\\User', 1),
(27, 'App\\User', 1),
(28, 'App\\User', 1),
(29, 'App\\User', 1),
(30, 'App\\User', 1),
(31, 'App\\User', 1),
(32, 'App\\User', 1),
(33, 'App\\User', 1),
(34, 'App\\User', 1),
(35, 'App\\User', 1),
(36, 'App\\User', 1),
(37, 'App\\User', 1),
(38, 'App\\User', 1),
(39, 'App\\User', 1),
(40, 'App\\User', 1),
(41, 'App\\User', 1),
(42, 'App\\User', 1),
(43, 'App\\User', 1),
(44, 'App\\User', 1),
(45, 'App\\User', 1),
(46, 'App\\User', 1),
(47, 'App\\User', 1),
(48, 'App\\User', 1),
(49, 'App\\User', 1),
(50, 'App\\User', 1),
(51, 'App\\User', 1),
(52, 'App\\User', 1),
(53, 'App\\User', 1),
(54, 'App\\User', 1),
(55, 'App\\User', 1),
(56, 'App\\User', 1),
(57, 'App\\User', 1),
(58, 'App\\User', 1),
(59, 'App\\User', 1),
(60, 'App\\User', 1),
(61, 'App\\User', 1),
(62, 'App\\User', 1),
(63, 'App\\User', 1),
(64, 'App\\User', 1),
(65, 'App\\User', 1),
(66, 'App\\User', 1),
(67, 'App\\User', 1),
(68, 'App\\User', 1),
(69, 'App\\User', 1),
(70, 'App\\User', 1),
(71, 'App\\User', 1),
(72, 'App\\User', 1),
(73, 'App\\User', 1),
(74, 'App\\User', 1),
(75, 'App\\User', 1),
(76, 'App\\User', 1),
(77, 'App\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 3),
(2, 'App\\User', 2),
(2, 'App\\User', 1652),
(2, 'App\\User', 1653),
(2, 'App\\User', 1654),
(2, 'App\\User', 1658),
(2, 'App\\User', 1707),
(2, 'App\\User', 1736),
(2, 'App\\User', 2064),
(3, 'App\\User', 19),
(3, 'App\\User', 20),
(3, 'App\\User', 21),
(3, 'App\\User', 22),
(3, 'App\\User', 23),
(3, 'App\\User', 52),
(3, 'App\\User', 55),
(3, 'App\\User', 67),
(3, 'App\\User', 68),
(3, 'App\\User', 69),
(3, 'App\\User', 175),
(3, 'App\\User', 202),
(3, 'App\\User', 417),
(3, 'App\\User', 1619),
(3, 'App\\User', 1623),
(3, 'App\\User', 1626),
(3, 'App\\User', 1633),
(3, 'App\\User', 1648),
(3, 'App\\User', 1657),
(3, 'App\\User', 1660),
(3, 'App\\User', 1662),
(3, 'App\\User', 1663),
(3, 'App\\User', 1675),
(3, 'App\\User', 1680),
(3, 'App\\User', 1686),
(3, 'App\\User', 1701),
(3, 'App\\User', 1702),
(3, 'App\\User', 1709),
(3, 'App\\User', 1710),
(3, 'App\\User', 1711),
(3, 'App\\User', 1712),
(3, 'App\\User', 1713),
(3, 'App\\User', 1714),
(3, 'App\\User', 1715),
(3, 'App\\User', 1716),
(3, 'App\\User', 1717),
(3, 'App\\User', 1718),
(3, 'App\\User', 1719),
(3, 'App\\User', 1720),
(3, 'App\\User', 1739),
(3, 'App\\User', 1740),
(3, 'App\\User', 1741),
(3, 'App\\User', 1742),
(3, 'App\\User', 1743),
(3, 'App\\User', 1744),
(3, 'App\\User', 1745),
(3, 'App\\User', 1746),
(3, 'App\\User', 1781),
(3, 'App\\User', 1836),
(3, 'App\\User', 1897),
(3, 'App\\User', 2024),
(3, 'App\\User', 2076),
(3, 'App\\User', 2077),
(4, 'App\\User', 6),
(4, 'App\\User', 9),
(4, 'App\\User', 1635),
(4, 'App\\User', 1659),
(4, 'App\\User', 1697),
(4, 'App\\User', 1708),
(4, 'App\\User', 2067),
(5, 'App\\User', 4),
(5, 'App\\User', 1622),
(5, 'App\\User', 1625),
(5, 'App\\User', 1643),
(5, 'App\\User', 1655),
(5, 'App\\User', 2066),
(5, 'App\\User', 2068),
(5, 'App\\User', 2069),
(5, 'App\\User', 2070),
(6, 'App\\User', 5),
(6, 'App\\User', 10),
(6, 'App\\User', 1624),
(6, 'App\\User', 1692),
(6, 'App\\User', 2065),
(6, 'App\\User', 2071),
(6, 'App\\User', 2072),
(6, 'App\\User', 2073),
(6, 'App\\User', 2074),
(6, 'App\\User', 2075),
(7, 'App\\User', 7),
(7, 'App\\User', 11),
(7, 'App\\User', 16),
(7, 'App\\User', 17),
(7, 'App\\User', 18),
(7, 'App\\User', 24),
(7, 'App\\User', 25),
(7, 'App\\User', 26),
(7, 'App\\User', 27),
(7, 'App\\User', 28),
(7, 'App\\User', 29),
(7, 'App\\User', 30),
(7, 'App\\User', 31),
(7, 'App\\User', 32),
(7, 'App\\User', 33),
(7, 'App\\User', 34),
(7, 'App\\User', 35),
(7, 'App\\User', 36),
(7, 'App\\User', 37),
(7, 'App\\User', 38),
(7, 'App\\User', 39),
(7, 'App\\User', 40),
(7, 'App\\User', 41),
(7, 'App\\User', 42),
(7, 'App\\User', 43),
(7, 'App\\User', 44),
(7, 'App\\User', 45),
(7, 'App\\User', 46),
(7, 'App\\User', 47),
(7, 'App\\User', 48),
(7, 'App\\User', 49),
(7, 'App\\User', 50),
(7, 'App\\User', 51),
(7, 'App\\User', 53),
(7, 'App\\User', 54),
(7, 'App\\User', 56),
(7, 'App\\User', 57),
(7, 'App\\User', 58),
(7, 'App\\User', 59),
(7, 'App\\User', 60),
(7, 'App\\User', 61),
(7, 'App\\User', 62),
(7, 'App\\User', 63),
(7, 'App\\User', 64),
(7, 'App\\User', 65),
(7, 'App\\User', 66),
(7, 'App\\User', 70),
(7, 'App\\User', 71),
(7, 'App\\User', 72),
(7, 'App\\User', 73),
(7, 'App\\User', 74),
(7, 'App\\User', 75),
(7, 'App\\User', 76),
(7, 'App\\User', 77),
(7, 'App\\User', 78),
(7, 'App\\User', 79),
(7, 'App\\User', 80),
(7, 'App\\User', 81),
(7, 'App\\User', 82),
(7, 'App\\User', 83),
(7, 'App\\User', 84),
(7, 'App\\User', 85),
(7, 'App\\User', 86),
(7, 'App\\User', 87),
(7, 'App\\User', 88),
(7, 'App\\User', 89),
(7, 'App\\User', 90),
(7, 'App\\User', 91),
(7, 'App\\User', 92),
(7, 'App\\User', 93),
(7, 'App\\User', 94),
(7, 'App\\User', 95),
(7, 'App\\User', 96),
(7, 'App\\User', 97),
(7, 'App\\User', 98),
(7, 'App\\User', 99),
(7, 'App\\User', 100),
(7, 'App\\User', 101),
(7, 'App\\User', 102),
(7, 'App\\User', 103),
(7, 'App\\User', 104),
(7, 'App\\User', 105),
(7, 'App\\User', 106),
(7, 'App\\User', 107),
(7, 'App\\User', 108),
(7, 'App\\User', 109),
(7, 'App\\User', 110),
(7, 'App\\User', 111),
(7, 'App\\User', 112),
(7, 'App\\User', 113),
(7, 'App\\User', 114),
(7, 'App\\User', 115),
(7, 'App\\User', 116),
(7, 'App\\User', 117),
(7, 'App\\User', 118),
(7, 'App\\User', 119),
(7, 'App\\User', 120),
(7, 'App\\User', 121),
(7, 'App\\User', 122),
(7, 'App\\User', 123),
(7, 'App\\User', 124),
(7, 'App\\User', 125),
(7, 'App\\User', 126),
(7, 'App\\User', 127),
(7, 'App\\User', 128),
(7, 'App\\User', 129),
(7, 'App\\User', 130),
(7, 'App\\User', 131),
(7, 'App\\User', 132),
(7, 'App\\User', 133),
(7, 'App\\User', 134),
(7, 'App\\User', 135),
(7, 'App\\User', 136),
(7, 'App\\User', 137),
(7, 'App\\User', 138),
(7, 'App\\User', 139),
(7, 'App\\User', 140),
(7, 'App\\User', 141),
(7, 'App\\User', 142),
(7, 'App\\User', 143),
(7, 'App\\User', 144),
(7, 'App\\User', 145),
(7, 'App\\User', 146),
(7, 'App\\User', 147),
(7, 'App\\User', 148),
(7, 'App\\User', 149),
(7, 'App\\User', 150),
(7, 'App\\User', 151),
(7, 'App\\User', 152),
(7, 'App\\User', 153),
(7, 'App\\User', 154),
(7, 'App\\User', 155),
(7, 'App\\User', 156),
(7, 'App\\User', 157),
(7, 'App\\User', 158),
(7, 'App\\User', 159),
(7, 'App\\User', 160),
(7, 'App\\User', 161),
(7, 'App\\User', 162),
(7, 'App\\User', 163),
(7, 'App\\User', 164),
(7, 'App\\User', 165),
(7, 'App\\User', 166),
(7, 'App\\User', 167),
(7, 'App\\User', 168),
(7, 'App\\User', 169),
(7, 'App\\User', 170),
(7, 'App\\User', 171),
(7, 'App\\User', 172),
(7, 'App\\User', 173),
(7, 'App\\User', 174),
(7, 'App\\User', 176),
(7, 'App\\User', 177),
(7, 'App\\User', 178),
(7, 'App\\User', 179),
(7, 'App\\User', 180),
(7, 'App\\User', 181),
(7, 'App\\User', 182),
(7, 'App\\User', 183),
(7, 'App\\User', 184),
(7, 'App\\User', 185),
(7, 'App\\User', 186),
(7, 'App\\User', 187),
(7, 'App\\User', 188),
(7, 'App\\User', 189),
(7, 'App\\User', 190),
(7, 'App\\User', 191),
(7, 'App\\User', 192),
(7, 'App\\User', 193),
(7, 'App\\User', 194),
(7, 'App\\User', 195),
(7, 'App\\User', 196),
(7, 'App\\User', 197),
(7, 'App\\User', 198),
(7, 'App\\User', 199),
(7, 'App\\User', 200),
(7, 'App\\User', 201),
(7, 'App\\User', 203),
(7, 'App\\User', 204),
(7, 'App\\User', 205),
(7, 'App\\User', 206),
(7, 'App\\User', 207),
(7, 'App\\User', 208),
(7, 'App\\User', 209),
(7, 'App\\User', 210),
(7, 'App\\User', 211),
(7, 'App\\User', 212),
(7, 'App\\User', 213),
(7, 'App\\User', 214),
(7, 'App\\User', 215),
(7, 'App\\User', 216),
(7, 'App\\User', 217),
(7, 'App\\User', 218),
(7, 'App\\User', 219),
(7, 'App\\User', 220),
(7, 'App\\User', 221),
(7, 'App\\User', 222),
(7, 'App\\User', 223),
(7, 'App\\User', 224),
(7, 'App\\User', 225),
(7, 'App\\User', 226),
(7, 'App\\User', 227),
(7, 'App\\User', 228),
(7, 'App\\User', 229),
(7, 'App\\User', 230),
(7, 'App\\User', 231),
(7, 'App\\User', 232),
(7, 'App\\User', 233),
(7, 'App\\User', 234),
(7, 'App\\User', 235),
(7, 'App\\User', 236),
(7, 'App\\User', 237),
(7, 'App\\User', 238),
(7, 'App\\User', 239),
(7, 'App\\User', 240),
(7, 'App\\User', 241),
(7, 'App\\User', 242),
(7, 'App\\User', 243),
(7, 'App\\User', 244),
(7, 'App\\User', 245),
(7, 'App\\User', 246),
(7, 'App\\User', 247),
(7, 'App\\User', 248),
(7, 'App\\User', 249),
(7, 'App\\User', 250),
(7, 'App\\User', 251),
(7, 'App\\User', 252),
(7, 'App\\User', 253),
(7, 'App\\User', 254),
(7, 'App\\User', 255),
(7, 'App\\User', 256),
(7, 'App\\User', 257),
(7, 'App\\User', 258),
(7, 'App\\User', 259),
(7, 'App\\User', 260),
(7, 'App\\User', 261),
(7, 'App\\User', 262),
(7, 'App\\User', 263),
(7, 'App\\User', 264),
(7, 'App\\User', 265),
(7, 'App\\User', 266),
(7, 'App\\User', 267),
(7, 'App\\User', 268),
(7, 'App\\User', 269),
(7, 'App\\User', 270),
(7, 'App\\User', 271),
(7, 'App\\User', 272),
(7, 'App\\User', 273),
(7, 'App\\User', 274),
(7, 'App\\User', 275),
(7, 'App\\User', 276),
(7, 'App\\User', 277),
(7, 'App\\User', 278),
(7, 'App\\User', 279),
(7, 'App\\User', 280),
(7, 'App\\User', 281),
(7, 'App\\User', 282),
(7, 'App\\User', 283),
(7, 'App\\User', 284),
(7, 'App\\User', 285),
(7, 'App\\User', 286),
(7, 'App\\User', 287),
(7, 'App\\User', 288),
(7, 'App\\User', 289),
(7, 'App\\User', 290),
(7, 'App\\User', 291),
(7, 'App\\User', 292),
(7, 'App\\User', 293),
(7, 'App\\User', 294),
(7, 'App\\User', 295),
(7, 'App\\User', 296),
(7, 'App\\User', 297),
(7, 'App\\User', 298),
(7, 'App\\User', 299),
(7, 'App\\User', 300),
(7, 'App\\User', 301),
(7, 'App\\User', 302),
(7, 'App\\User', 303),
(7, 'App\\User', 304),
(7, 'App\\User', 305),
(7, 'App\\User', 306),
(7, 'App\\User', 307),
(7, 'App\\User', 308),
(7, 'App\\User', 309),
(7, 'App\\User', 310),
(7, 'App\\User', 311),
(7, 'App\\User', 312),
(7, 'App\\User', 313),
(7, 'App\\User', 314),
(7, 'App\\User', 315),
(7, 'App\\User', 316),
(7, 'App\\User', 317),
(7, 'App\\User', 318),
(7, 'App\\User', 319),
(7, 'App\\User', 320),
(7, 'App\\User', 321),
(7, 'App\\User', 322),
(7, 'App\\User', 323),
(7, 'App\\User', 324),
(7, 'App\\User', 325),
(7, 'App\\User', 326),
(7, 'App\\User', 327),
(7, 'App\\User', 328),
(7, 'App\\User', 329),
(7, 'App\\User', 330),
(7, 'App\\User', 331),
(7, 'App\\User', 332),
(7, 'App\\User', 333),
(7, 'App\\User', 334),
(7, 'App\\User', 335),
(7, 'App\\User', 336),
(7, 'App\\User', 337),
(7, 'App\\User', 338),
(7, 'App\\User', 339),
(7, 'App\\User', 340),
(7, 'App\\User', 341),
(7, 'App\\User', 342),
(7, 'App\\User', 343),
(7, 'App\\User', 344),
(7, 'App\\User', 345),
(7, 'App\\User', 346),
(7, 'App\\User', 347),
(7, 'App\\User', 348),
(7, 'App\\User', 349),
(7, 'App\\User', 350),
(7, 'App\\User', 351),
(7, 'App\\User', 352),
(7, 'App\\User', 353),
(7, 'App\\User', 354),
(7, 'App\\User', 355),
(7, 'App\\User', 356),
(7, 'App\\User', 357),
(7, 'App\\User', 358),
(7, 'App\\User', 359),
(7, 'App\\User', 360),
(7, 'App\\User', 361),
(7, 'App\\User', 362),
(7, 'App\\User', 363),
(7, 'App\\User', 364),
(7, 'App\\User', 365),
(7, 'App\\User', 366),
(7, 'App\\User', 367),
(7, 'App\\User', 368),
(7, 'App\\User', 369),
(7, 'App\\User', 370),
(7, 'App\\User', 371),
(7, 'App\\User', 372),
(7, 'App\\User', 373),
(7, 'App\\User', 374),
(7, 'App\\User', 375),
(7, 'App\\User', 376),
(7, 'App\\User', 377),
(7, 'App\\User', 378),
(7, 'App\\User', 379),
(7, 'App\\User', 380),
(7, 'App\\User', 381),
(7, 'App\\User', 382),
(7, 'App\\User', 383),
(7, 'App\\User', 384),
(7, 'App\\User', 385),
(7, 'App\\User', 386),
(7, 'App\\User', 387),
(7, 'App\\User', 388),
(7, 'App\\User', 389),
(7, 'App\\User', 390),
(7, 'App\\User', 391),
(7, 'App\\User', 392),
(7, 'App\\User', 393),
(7, 'App\\User', 394),
(7, 'App\\User', 395),
(7, 'App\\User', 396),
(7, 'App\\User', 397),
(7, 'App\\User', 398),
(7, 'App\\User', 399),
(7, 'App\\User', 400),
(7, 'App\\User', 401),
(7, 'App\\User', 402),
(7, 'App\\User', 403),
(7, 'App\\User', 404),
(7, 'App\\User', 405),
(7, 'App\\User', 406),
(7, 'App\\User', 407),
(7, 'App\\User', 408),
(7, 'App\\User', 409),
(7, 'App\\User', 410),
(7, 'App\\User', 411),
(7, 'App\\User', 412),
(7, 'App\\User', 413),
(7, 'App\\User', 414),
(7, 'App\\User', 415),
(7, 'App\\User', 416),
(7, 'App\\User', 418),
(7, 'App\\User', 419),
(7, 'App\\User', 420),
(7, 'App\\User', 421),
(7, 'App\\User', 422),
(7, 'App\\User', 423),
(7, 'App\\User', 424),
(7, 'App\\User', 425),
(7, 'App\\User', 426),
(7, 'App\\User', 427),
(7, 'App\\User', 428),
(7, 'App\\User', 1616),
(7, 'App\\User', 1617),
(7, 'App\\User', 1627),
(7, 'App\\User', 1628),
(7, 'App\\User', 1629),
(7, 'App\\User', 1630),
(7, 'App\\User', 1631),
(7, 'App\\User', 1634),
(7, 'App\\User', 1636),
(7, 'App\\User', 1637),
(7, 'App\\User', 1638),
(7, 'App\\User', 1639),
(7, 'App\\User', 1640),
(7, 'App\\User', 1641),
(7, 'App\\User', 1642),
(7, 'App\\User', 1644),
(7, 'App\\User', 1645),
(7, 'App\\User', 1646),
(7, 'App\\User', 1647),
(7, 'App\\User', 1649),
(7, 'App\\User', 1650),
(7, 'App\\User', 1651),
(7, 'App\\User', 1656),
(7, 'App\\User', 1661),
(7, 'App\\User', 1664),
(7, 'App\\User', 1665),
(7, 'App\\User', 1666),
(7, 'App\\User', 1667),
(7, 'App\\User', 1668),
(7, 'App\\User', 1669),
(7, 'App\\User', 1670),
(7, 'App\\User', 1671),
(7, 'App\\User', 1672),
(7, 'App\\User', 1673),
(7, 'App\\User', 1674),
(7, 'App\\User', 1676),
(7, 'App\\User', 1677),
(7, 'App\\User', 1678),
(7, 'App\\User', 1681),
(7, 'App\\User', 1682),
(7, 'App\\User', 1683),
(7, 'App\\User', 1684),
(7, 'App\\User', 1685),
(7, 'App\\User', 1687),
(7, 'App\\User', 1688),
(7, 'App\\User', 1689),
(7, 'App\\User', 1690),
(7, 'App\\User', 1691),
(7, 'App\\User', 1693),
(7, 'App\\User', 1694),
(7, 'App\\User', 1695),
(7, 'App\\User', 1696),
(7, 'App\\User', 1698),
(7, 'App\\User', 1699),
(7, 'App\\User', 1700),
(7, 'App\\User', 1703),
(7, 'App\\User', 1704),
(7, 'App\\User', 1705),
(7, 'App\\User', 1706),
(7, 'App\\User', 1721),
(7, 'App\\User', 1722),
(7, 'App\\User', 1723),
(7, 'App\\User', 1724),
(7, 'App\\User', 1725),
(7, 'App\\User', 1726),
(7, 'App\\User', 1727),
(7, 'App\\User', 1728),
(7, 'App\\User', 1729),
(7, 'App\\User', 1730),
(7, 'App\\User', 1731),
(7, 'App\\User', 1732),
(7, 'App\\User', 1733),
(7, 'App\\User', 1734),
(7, 'App\\User', 1735),
(7, 'App\\User', 1737),
(7, 'App\\User', 1738),
(7, 'App\\User', 1747),
(7, 'App\\User', 1748),
(7, 'App\\User', 1749),
(7, 'App\\User', 1750),
(7, 'App\\User', 1751),
(7, 'App\\User', 1752),
(7, 'App\\User', 1753),
(7, 'App\\User', 1754),
(7, 'App\\User', 1755),
(7, 'App\\User', 1756),
(7, 'App\\User', 1757),
(7, 'App\\User', 1758),
(7, 'App\\User', 1759),
(7, 'App\\User', 1760),
(7, 'App\\User', 1761),
(7, 'App\\User', 1762),
(7, 'App\\User', 1763),
(7, 'App\\User', 1764),
(7, 'App\\User', 1765),
(7, 'App\\User', 1766),
(7, 'App\\User', 1767),
(7, 'App\\User', 1768),
(7, 'App\\User', 1769),
(7, 'App\\User', 1770),
(7, 'App\\User', 1771),
(7, 'App\\User', 1772),
(7, 'App\\User', 1773),
(7, 'App\\User', 1774),
(7, 'App\\User', 1775),
(7, 'App\\User', 1776),
(7, 'App\\User', 1777),
(7, 'App\\User', 1778),
(7, 'App\\User', 1779),
(7, 'App\\User', 1780),
(7, 'App\\User', 1782),
(7, 'App\\User', 1783),
(7, 'App\\User', 1784),
(7, 'App\\User', 1785),
(7, 'App\\User', 1786),
(7, 'App\\User', 1787),
(7, 'App\\User', 1788),
(7, 'App\\User', 1789),
(7, 'App\\User', 1790),
(7, 'App\\User', 1791),
(7, 'App\\User', 1792),
(7, 'App\\User', 1793),
(7, 'App\\User', 1794),
(7, 'App\\User', 1795),
(7, 'App\\User', 1796),
(7, 'App\\User', 1797),
(7, 'App\\User', 1798),
(7, 'App\\User', 1799),
(7, 'App\\User', 1800),
(7, 'App\\User', 1801),
(7, 'App\\User', 1802),
(7, 'App\\User', 1803),
(7, 'App\\User', 1804),
(7, 'App\\User', 1805),
(7, 'App\\User', 1806),
(7, 'App\\User', 1807),
(7, 'App\\User', 1808),
(7, 'App\\User', 1809),
(7, 'App\\User', 1810),
(7, 'App\\User', 1811),
(7, 'App\\User', 1812),
(7, 'App\\User', 1813),
(7, 'App\\User', 1814),
(7, 'App\\User', 1815),
(7, 'App\\User', 1816),
(7, 'App\\User', 1817),
(7, 'App\\User', 1818),
(7, 'App\\User', 1819),
(7, 'App\\User', 1820),
(7, 'App\\User', 1821),
(7, 'App\\User', 1822),
(7, 'App\\User', 1823),
(7, 'App\\User', 1824),
(7, 'App\\User', 1825),
(7, 'App\\User', 1826),
(7, 'App\\User', 1827),
(7, 'App\\User', 1828),
(7, 'App\\User', 1829),
(7, 'App\\User', 1830),
(7, 'App\\User', 1831),
(7, 'App\\User', 1832),
(7, 'App\\User', 1833),
(7, 'App\\User', 1834),
(7, 'App\\User', 1835),
(7, 'App\\User', 1837),
(7, 'App\\User', 1838),
(7, 'App\\User', 1839),
(7, 'App\\User', 1840),
(7, 'App\\User', 1841),
(7, 'App\\User', 1842),
(7, 'App\\User', 1843),
(7, 'App\\User', 1844),
(7, 'App\\User', 1845),
(7, 'App\\User', 1846),
(7, 'App\\User', 1847),
(7, 'App\\User', 1848),
(7, 'App\\User', 1849),
(7, 'App\\User', 1850),
(7, 'App\\User', 1851),
(7, 'App\\User', 1852),
(7, 'App\\User', 1853),
(7, 'App\\User', 1854),
(7, 'App\\User', 1855),
(7, 'App\\User', 1856),
(7, 'App\\User', 1857),
(7, 'App\\User', 1858),
(7, 'App\\User', 1859),
(7, 'App\\User', 1860),
(7, 'App\\User', 1861),
(7, 'App\\User', 1862),
(7, 'App\\User', 1863),
(7, 'App\\User', 1864),
(7, 'App\\User', 1865),
(7, 'App\\User', 1866),
(7, 'App\\User', 1867),
(7, 'App\\User', 1868),
(7, 'App\\User', 1869),
(7, 'App\\User', 1870),
(7, 'App\\User', 1871),
(7, 'App\\User', 1872),
(7, 'App\\User', 1873),
(7, 'App\\User', 1874),
(7, 'App\\User', 1875),
(7, 'App\\User', 1876),
(7, 'App\\User', 1877),
(7, 'App\\User', 1878),
(7, 'App\\User', 1879),
(7, 'App\\User', 1880),
(7, 'App\\User', 1881),
(7, 'App\\User', 1882),
(7, 'App\\User', 1883),
(7, 'App\\User', 1884),
(7, 'App\\User', 1885),
(7, 'App\\User', 1886),
(7, 'App\\User', 1887),
(7, 'App\\User', 1888),
(7, 'App\\User', 1889),
(7, 'App\\User', 1890),
(7, 'App\\User', 1891),
(7, 'App\\User', 1892),
(7, 'App\\User', 1893),
(7, 'App\\User', 1894),
(7, 'App\\User', 1895),
(7, 'App\\User', 1896),
(7, 'App\\User', 1898),
(7, 'App\\User', 1899),
(7, 'App\\User', 1900),
(7, 'App\\User', 1901),
(7, 'App\\User', 1902),
(7, 'App\\User', 1903),
(7, 'App\\User', 1904),
(7, 'App\\User', 1905),
(7, 'App\\User', 1906),
(7, 'App\\User', 1907),
(7, 'App\\User', 1908),
(7, 'App\\User', 1909),
(7, 'App\\User', 1910),
(7, 'App\\User', 1911),
(7, 'App\\User', 1912),
(7, 'App\\User', 1913),
(7, 'App\\User', 1914),
(7, 'App\\User', 1915),
(7, 'App\\User', 1916),
(7, 'App\\User', 1917),
(7, 'App\\User', 1918),
(7, 'App\\User', 1919),
(7, 'App\\User', 1920),
(7, 'App\\User', 1921),
(7, 'App\\User', 1922),
(7, 'App\\User', 1923),
(7, 'App\\User', 1924),
(7, 'App\\User', 1925),
(7, 'App\\User', 1926),
(7, 'App\\User', 1927),
(7, 'App\\User', 1928),
(7, 'App\\User', 1929),
(7, 'App\\User', 1930),
(7, 'App\\User', 1931),
(7, 'App\\User', 1932),
(7, 'App\\User', 1933),
(7, 'App\\User', 1934),
(7, 'App\\User', 1935),
(7, 'App\\User', 1936),
(7, 'App\\User', 1937),
(7, 'App\\User', 1938),
(7, 'App\\User', 1939),
(7, 'App\\User', 1940),
(7, 'App\\User', 1941),
(7, 'App\\User', 1942),
(7, 'App\\User', 1943),
(7, 'App\\User', 1944),
(7, 'App\\User', 1945),
(7, 'App\\User', 1946),
(7, 'App\\User', 1947),
(7, 'App\\User', 1948),
(7, 'App\\User', 1949),
(7, 'App\\User', 1950),
(7, 'App\\User', 1951),
(7, 'App\\User', 1952),
(7, 'App\\User', 1953),
(7, 'App\\User', 1954),
(7, 'App\\User', 1955),
(7, 'App\\User', 1956),
(7, 'App\\User', 1957),
(7, 'App\\User', 1958),
(7, 'App\\User', 1959),
(7, 'App\\User', 1960),
(7, 'App\\User', 1961),
(7, 'App\\User', 1962),
(7, 'App\\User', 1963),
(7, 'App\\User', 1964),
(7, 'App\\User', 1965),
(7, 'App\\User', 1966),
(7, 'App\\User', 1967),
(7, 'App\\User', 1968),
(7, 'App\\User', 1969),
(7, 'App\\User', 1970),
(7, 'App\\User', 1971),
(7, 'App\\User', 1972),
(7, 'App\\User', 1973),
(7, 'App\\User', 1974),
(7, 'App\\User', 1975),
(7, 'App\\User', 1976),
(7, 'App\\User', 1977),
(7, 'App\\User', 1978),
(7, 'App\\User', 1979),
(7, 'App\\User', 1980),
(7, 'App\\User', 1981),
(7, 'App\\User', 1982),
(7, 'App\\User', 1983),
(7, 'App\\User', 1984),
(7, 'App\\User', 1985),
(7, 'App\\User', 1986),
(7, 'App\\User', 1987),
(7, 'App\\User', 1988),
(7, 'App\\User', 1989),
(7, 'App\\User', 1990),
(7, 'App\\User', 1991),
(7, 'App\\User', 1992),
(7, 'App\\User', 1993),
(7, 'App\\User', 1994),
(7, 'App\\User', 1995),
(7, 'App\\User', 1996),
(7, 'App\\User', 1997),
(7, 'App\\User', 1998),
(7, 'App\\User', 1999),
(7, 'App\\User', 2000),
(7, 'App\\User', 2001),
(7, 'App\\User', 2002),
(7, 'App\\User', 2003),
(7, 'App\\User', 2004),
(7, 'App\\User', 2005),
(7, 'App\\User', 2006),
(7, 'App\\User', 2007),
(7, 'App\\User', 2008),
(7, 'App\\User', 2009),
(7, 'App\\User', 2010),
(7, 'App\\User', 2011),
(7, 'App\\User', 2012),
(7, 'App\\User', 2013),
(7, 'App\\User', 2014),
(7, 'App\\User', 2015),
(7, 'App\\User', 2016),
(7, 'App\\User', 2017),
(7, 'App\\User', 2018),
(7, 'App\\User', 2019),
(7, 'App\\User', 2020),
(7, 'App\\User', 2021),
(7, 'App\\User', 2022),
(7, 'App\\User', 2023),
(7, 'App\\User', 2025),
(7, 'App\\User', 2026),
(7, 'App\\User', 2027),
(7, 'App\\User', 2028),
(7, 'App\\User', 2029),
(7, 'App\\User', 2030),
(7, 'App\\User', 2031),
(7, 'App\\User', 2032),
(7, 'App\\User', 2033),
(7, 'App\\User', 2034),
(7, 'App\\User', 2035),
(7, 'App\\User', 2036),
(7, 'App\\User', 2037),
(7, 'App\\User', 2038),
(7, 'App\\User', 2039),
(7, 'App\\User', 2040),
(7, 'App\\User', 2041),
(7, 'App\\User', 2042),
(7, 'App\\User', 2043),
(7, 'App\\User', 2044),
(7, 'App\\User', 2045),
(7, 'App\\User', 2046),
(7, 'App\\User', 2047),
(7, 'App\\User', 2048),
(7, 'App\\User', 2049),
(7, 'App\\User', 2050),
(7, 'App\\User', 2051),
(7, 'App\\User', 2052),
(7, 'App\\User', 2053),
(7, 'App\\User', 2054),
(7, 'App\\User', 2055),
(7, 'App\\User', 2056),
(7, 'App\\User', 2057),
(7, 'App\\User', 2058),
(7, 'App\\User', 2059),
(7, 'App\\User', 2060),
(7, 'App\\User', 2061),
(7, 'App\\User', 2062),
(7, 'App\\User', 2063),
(7, 'App\\User', 2078),
(7, 'App\\User', 2079),
(7, 'App\\User', 2080),
(7, 'App\\User', 2081),
(7, 'App\\User', 2082),
(7, 'App\\User', 2083),
(7, 'App\\User', 2084),
(8, 'App\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0128cc75-2651-4fd1-be45-2bfaa68808e4', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1844, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:03', '2023-06-15 20:09:03'),
('0160c1c9-3b0e-4c9a-85dc-da6cc417cfb9', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-20 12:10:44', '2023-06-20 12:10:44'),
('0197e2b3-ee7b-4a65-8e43-f7735cd3cbcf', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1819, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:54:20', '2023-06-15 19:54:20'),
('0306b4c3-d47c-45f3-88ff-99fb15f94766', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2074, '{\"name\":\"Kayaru Iluthal\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"17-100\",\"gender\":\"Female\"}', NULL, '2023-06-20 12:41:55', '2023-06-20 12:41:55'),
('04ecf31d-6b4d-402e-aa32-3849f2f3361a', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:02:20', '2023-06-19 21:02:20'),
('0558dc36-6628-4488-840c-03c953e81910', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1808, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:38', '2023-06-15 20:09:38'),
('0757b233-b09d-44e6-8a13-c1de3bc4eb51', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1970, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:38', '2023-06-15 20:09:38'),
('076c703f-1d9d-48c4-b5ec-0aa6cd496ef3', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1930, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-20 12:07:18', '2023-06-20 12:07:18'),
('076d47c2-e1de-4be7-97ce-55b3d71aecaa', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2071, '{\"name\":\"200M Running\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"26-30\",\"gender\":\"Female\"}', NULL, '2023-06-20 11:38:32', '2023-06-20 11:38:32'),
('09029da8-f4a6-4a36-9c04-45a728aa049d', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:43:25', '2023-06-19 20:43:25'),
('095f8e06-74a6-4772-ac40-5f17561fb0b6', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:02:41', '2023-06-19 21:02:41'),
('09db7394-f9c4-41b8-aac9-ea2e06fee19e', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:39:23', '2023-06-19 21:39:23'),
('0ab6a2ab-1df9-4a81-9f16-66a3e1bbbbad', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1844, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-19 21:42:35', '2023-06-19 21:42:35'),
('0b757851-40ab-4481-af8e-efd529c350d6', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:14:21', '2023-06-19 21:14:21'),
('0c29c3b3-5e57-4a52-97ce-84e17694c072', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2078, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-20 11:56:36', '2023-06-20 11:56:36'),
('0c2da995-99fa-4ef4-b8af-2ab8eea4034f', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:28:50', '2023-06-19 20:28:50'),
('0c7e6430-b042-4a94-bf70-87c6a4962929', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2082, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-19 21:42:35', '2023-06-19 21:42:35'),
('0cd2be42-cff3-4376-957c-49365227368a', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:47:25', '2023-06-19 20:47:25'),
('0de99186-bb69-4ba2-b8d6-785546b2d2a8', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2080, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-20 12:10:44', '2023-06-20 12:10:44'),
('0e047a5e-993d-4f04-9fd0-cee34aa1b880', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1985, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-20 12:48:39', '2023-06-20 12:48:39'),
('0e42050c-8599-4bef-b89f-3d59eda9cb01', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1985, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:52:20', '2023-06-15 19:52:20'),
('0e6ba4ab-bfa9-431a-9b3b-be537fb6e9f5', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1994, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:12', '2023-06-15 20:09:12'),
('0ebf66a7-a7e6-4b69-b8da-8e7211232987', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:40:00', '2023-06-19 21:40:00'),
('0ef6178c-c7fb-46c3-87d2-f44f0ad6b0d7', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1819, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:51:36', '2023-06-15 19:51:36'),
('100c6c39-aa49-42b4-896e-8363a491a563', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:44:08', '2023-06-19 21:44:08'),
('10f3fab6-7a9a-4452-a23e-998fbd17a80a', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:32:36', '2023-06-19 21:32:36'),
('1179f216-915a-4f57-8652-b82a144fc665', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1994, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:38', '2023-06-15 20:09:38'),
('12b81857-d8ee-4bcb-bb5c-e3bf162e9a7a', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1844, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:38', '2023-06-15 20:09:38'),
('134265b9-0ffb-48d7-b227-ae445603d3cc', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2016, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:38:27', '2023-06-19 21:38:27'),
('140d8498-4087-407e-955a-7f583edff3fa', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:12:04', '2023-06-19 21:12:04'),
('1561a98a-33c7-47e5-8a95-746ef700c510', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2016, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:36:15', '2023-06-19 21:36:15'),
('15d08209-e47e-49d4-83f4-f20f8cc27ca4', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2081, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-19 21:42:35', '2023-06-19 21:42:35'),
('175f32df-504e-47e5-9411-06568ca675b5', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1807, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:54:20', '2023-06-15 19:54:20'),
('185b79ee-ee5c-4aae-96b6-582b354eef20', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2016, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:39:23', '2023-06-19 21:39:23'),
('19d91913-a79e-47dd-a15e-426dd01c2ef0', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:53:09', '2023-06-19 20:53:09'),
('1bf8b504-e5bc-4944-941a-1f71c7a051c9', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1852, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-16 15:53:07', '2023-06-16 15:53:07'),
('1cde67cd-e527-44b4-a34f-9fab578f9395', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1819, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-20 12:48:39', '2023-06-20 12:48:39'),
('1d1d5083-3cd3-451b-a975-aa546f00e594', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:40:30', '2023-06-19 21:40:30'),
('1f3b8643-b353-4f17-b2c8-4c47d13afd54', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1808, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-20 11:56:36', '2023-06-20 11:56:36'),
('1f4f1d86-8994-4c65-ac41-d424b1734605', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1985, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:54:03', '2023-06-15 19:54:03'),
('20551572-b63e-40b0-84db-d037894611f9', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:41:07', '2023-06-19 21:41:07'),
('20a40c4b-d3d7-47c6-b69c-0c6c557dc3fd', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:15:58', '2023-06-19 21:15:58'),
('216667c2-0f5e-4716-9cbc-e761c67befc6', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1819, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:52:55', '2023-06-15 19:52:55'),
('21bbacac-da86-4b3f-a277-8dbd7a70c1d0', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:40:30', '2023-06-19 21:40:30'),
('21d398a0-cc06-421b-9184-0f5eb9931bc0', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:02:20', '2023-06-19 21:02:20'),
('2372dc4e-37cb-426d-bf68-9b848578876d', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-16 15:56:22', '2023-06-16 15:56:22'),
('238f1b04-4742-4160-849e-6b140870b58f', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1844, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-19 20:31:44', '2023-06-19 20:31:44'),
('238f643b-bccb-4160-9438-0b832eb2cb06', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1850, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:52:55', '2023-06-15 19:52:55'),
('242e233f-4e84-4934-b367-37b4f52b6d89', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2080, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:37:56', '2023-06-19 21:37:56'),
('24aeeb93-a196-48a1-9c88-54a1bcc7dc11', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1985, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:54:20', '2023-06-15 19:54:20'),
('24ba0e47-3a19-45ec-bf2b-15fb06471b57', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2081, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-19 20:36:36', '2023-06-19 20:36:36'),
('24ea3be0-ae33-45a3-8f7b-5304ecedc3a3', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1930, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:15:58', '2023-06-19 21:15:58'),
('250b1188-740c-45c0-bc94-1225671b0718', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1970, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-19 21:42:35', '2023-06-19 21:42:35'),
('25407e7a-4240-47ae-bcdb-8c0df7ab8026', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:30:38', '2023-06-19 20:30:38'),
('2652d2ba-d67a-4bf8-9f75-4a9d2b7b5e5b', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:28:23', '2023-06-19 21:28:23'),
('27623914-80bd-4d7f-a2a0-a664935cf11c', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:47:25', '2023-06-19 20:47:25'),
('29101c36-b9a1-449a-96b0-2718efe5942d', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:10:43', '2023-06-19 21:10:43'),
('2963dfb2-e254-476e-a3a0-d93a6ca38a8f', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:37:56', '2023-06-19 21:37:56'),
('29d5720d-9187-4f8d-9a92-e3a4e5415bfa', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1808, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:03', '2023-06-15 20:09:03'),
('2ab70a07-d85c-4dc2-9268-b41e367880e1', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-20 12:10:44', '2023-06-20 12:10:44'),
('2bab36a2-5bca-42b2-b3ee-42d60b9ef9d2', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:10:43', '2023-06-19 21:10:43'),
('2dff0a7a-7a4c-474a-be71-c1c7a2ea199f', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1800, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-20 12:26:03', '2023-06-20 12:26:03'),
('2e3815f0-0403-4057-9b6d-c8cd90970845', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-20 12:10:44', '2023-06-20 12:10:44'),
('2e52e95a-06b8-464f-8ce0-1b1144e8bfc3', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1998, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:51:36', '2023-06-15 19:51:36'),
('2e6a6c98-0806-478c-ada2-64e8933da723', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1968, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-20 12:48:39', '2023-06-20 12:48:39'),
('2fe3d203-0c45-4165-a888-9bc085f91743', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2074, '{\"name\":\"Put Shot\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"19-25\",\"gender\":\"Male\"}', NULL, '2023-06-20 14:33:59', '2023-06-20 14:33:59'),
('305e0330-8c8e-4074-b6ec-42716690e2f7', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:14:21', '2023-06-19 21:14:21'),
('317abf4e-2e2e-446f-b5dd-8c8d5f9800f6', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2072, '{\"name\":\"Javelin Throw\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"26-30\",\"gender\":\"Male\"}', NULL, '2023-06-20 11:38:32', '2023-06-20 11:38:32'),
('328f2658-2bba-4013-942c-c3173787753c', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1973, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:54:20', '2023-06-15 19:54:20'),
('336b9a6a-1aba-469d-b86f-f345877d9530', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1951, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:36:05', '2023-06-19 21:36:05'),
('3409691f-f868-4cad-9f4a-de079961538a', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:38:27', '2023-06-19 21:38:27'),
('34f4fabf-375c-446f-a2ab-6ac7fdd56ef6', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-16 15:56:22', '2023-06-16 15:56:22'),
('35c4827e-b742-4438-b0ea-13e78571e522', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 1716, '{\"name\":\"Kayaru Iluthal\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"17-100\",\"gender\":\"Male\"}', NULL, '2023-06-20 12:41:50', '2023-06-20 12:41:50'),
('35c95bbf-1de9-4a37-bf38-08a9eef7e9e2', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:47:15', '2023-06-19 20:47:15'),
('37fcb75e-a7f1-4be0-a54d-d7bc821b9ea5', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:39:23', '2023-06-19 21:39:23'),
('386ed77f-88eb-430d-82af-ba2477f85da5', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1994, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:03', '2023-06-15 20:09:03'),
('38a4f7a6-3e62-455e-b536-c3770c2e6dad', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:37:56', '2023-06-19 21:37:56'),
('3957d084-fac5-40e9-94b2-8090d0f14882', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:43:25', '2023-06-19 20:43:25'),
('398d4b89-31fa-470f-986a-058e739e144a', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2068, '{\"name\":\"100M Running\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"26-30\",\"gender\":\"Male\"}', NULL, '2023-06-20 11:38:32', '2023-06-20 11:38:32'),
('3aadc226-a83b-417c-ae06-fce3199b3f4d', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:32:36', '2023-06-19 21:32:36'),
('3c2e0245-6c15-498e-854a-35335e312099', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:40:30', '2023-06-19 21:40:30'),
('3c5b0dda-af21-4129-877b-35678668304d', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:38:27', '2023-06-19 21:38:27'),
('3c6fe015-9f73-471f-ab49-21fccaea7d81', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1850, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:54:20', '2023-06-15 19:54:20'),
('3c786d8b-70eb-4d9e-9e4a-80642072065b', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1852, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:12', '2023-06-15 20:09:12'),
('3cd1de96-70e6-4259-a6e1-155ae9fabac5', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2072, '{\"name\":\"Long Jump\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"26-30\",\"gender\":\"Female\"}', NULL, '2023-06-20 11:38:32', '2023-06-20 11:38:32'),
('3d67dadb-f4b6-481e-b4f6-7aca358a0212', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:41:01', '2023-06-19 21:41:01'),
('3e8439ae-cec9-4a00-993e-bbfe3fdee5dd', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2082, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-19 20:36:36', '2023-06-19 20:36:36'),
('3eeb992d-b46d-4d29-8c66-705cf7c751c7', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1951, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-20 12:10:44', '2023-06-20 12:10:44'),
('3efbc4ea-b2ef-4fb4-9653-5cadd22d8adc', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1844, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-16 15:53:07', '2023-06-16 15:53:07'),
('3f9168ef-8735-4948-8534-fc9f94bc872c', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:53:09', '2023-06-19 20:53:09'),
('400f1493-a4e9-4acb-896f-8b6eea67da15', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:30:38', '2023-06-19 20:30:38'),
('40224b73-8035-411d-b121-50ce79c70032', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1928, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-20 11:56:36', '2023-06-20 11:56:36'),
('41297486-485c-4c85-9525-a1375792421f', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2016, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-20 12:10:44', '2023-06-20 12:10:44'),
('41fe7b42-ae22-4b72-8ef5-6191cc8d2436', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:36:05', '2023-06-19 21:36:05'),
('4227276b-70d1-49a4-bb60-0abc082ca577', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:44:59', '2023-06-19 20:44:59'),
('4294f62b-64b8-4cce-b3ba-17a474dade39', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1844, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-20 12:26:03', '2023-06-20 12:26:03'),
('44a687ae-4f8f-49f9-a79e-22f039290ead', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:40:14', '2023-06-19 20:40:14'),
('44cd4267-f8af-4ade-9284-6610ee497170', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:06:25', '2023-06-19 21:06:25'),
('46078821-ddfb-4ff1-bcdc-7160e57672d3', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2071, '{\"name\":\"4X100M Relay\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"19-30\",\"gender\":\"Female\"}', NULL, '2023-06-20 12:55:06', '2023-06-20 12:55:06'),
('46bb3917-5b69-416a-b6f6-bfa7f1d3a57b', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2080, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:53:09', '2023-06-19 20:53:09'),
('48430985-8f4e-4187-a14d-20c7bd5755e5', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1850, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:52:20', '2023-06-15 19:52:20'),
('4959d241-0755-43aa-a72a-6d04c052688c', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:15:58', '2023-06-19 21:15:58'),
('4a0aa321-63f6-4a59-9807-b7af2708cac3', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2074, '{\"name\":\"Put Shot\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"17-18\",\"gender\":\"Female\"}', NULL, '2023-06-20 11:38:32', '2023-06-20 11:38:32'),
('4bc983a4-1920-4c5e-b302-0dca80fc39f9', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2080, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:36:15', '2023-06-19 21:36:15'),
('4bd57c94-ff9a-4332-9d96-b238cb1403d2', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2080, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:30:18', '2023-06-19 21:30:18'),
('4cd08c81-60b4-468d-a90b-9bf1a4b758dc', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1926, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:51:36', '2023-06-15 19:51:36'),
('4d2c799e-22f9-411b-b098-7dc813cfa35c', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1808, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:12', '2023-06-15 20:09:12'),
('4d52bb1b-2957-4a6d-8b9e-246f938f2b19', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2071, '{\"name\":\"4X100M Relay\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"41-100\",\"gender\":\"Female\"}', NULL, '2023-06-20 12:55:11', '2023-06-20 12:55:11'),
('4d777722-5de8-4cf9-9772-f942634e231f', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:41:07', '2023-06-19 21:41:07'),
('4e09f355-799c-48b4-886b-4d6dc47038d2', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:44:59', '2023-06-19 20:44:59'),
('4e5e9e46-bb2a-4fa1-b8b0-dc0804089047', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:53:15', '2023-06-19 20:53:15'),
('4edebd9c-4b3c-4774-ac93-aca65f956b4a', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1926, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:54:03', '2023-06-15 19:54:03'),
('501b88f7-6d0c-46a0-a5ee-0427a2d15411', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:28:50', '2023-06-19 20:28:50'),
('5096c1dc-8aa7-40f9-a52f-db5c197b9a05', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1998, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:54:20', '2023-06-15 19:54:20'),
('50acfc3d-a011-4312-a713-ed1d87cd5f42', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:28:50', '2023-06-19 20:28:50'),
('50b7c71d-a53e-47b8-98b4-c2edf2d6dc84', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2082, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-20 11:56:36', '2023-06-20 11:56:36'),
('531923e4-cd82-4630-b540-ab503520851c', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:02:20', '2023-06-19 21:02:20'),
('54e61209-2396-47e7-b574-409ecadeaf32', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:43:25', '2023-06-19 20:43:25'),
('5579b35e-c390-4959-a2f5-e6e303a71efd', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2068, '{\"name\":\"200M Running\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"26-30\",\"gender\":\"Female\"}', NULL, '2023-06-20 11:38:32', '2023-06-20 11:38:32'),
('5651ed50-99e0-43ec-a5bc-c0078787e305', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1926, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:54:20', '2023-06-15 19:54:20'),
('56f05770-bf09-475f-8e9f-6d1ea36331e4', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1926, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:52:20', '2023-06-15 19:52:20'),
('570a96b1-eed9-4397-8906-1a94c707d005', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:12:04', '2023-06-19 21:12:04'),
('57d1f908-7738-4c85-bf50-29481813d9fa', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:47:15', '2023-06-19 20:47:15'),
('5879159d-c2fd-4fd6-84a6-c2820267a7ad', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1930, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:43:25', '2023-06-19 20:43:25'),
('5a20a0b9-4f05-4b46-bc42-c6ee03cf9ad5', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:30:38', '2023-06-19 20:30:38'),
('5a538411-324a-41be-99b6-27c58c893762', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2073, '{\"name\":\"600M Running\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"46-50\",\"gender\":\"Male\"}', NULL, '2023-06-20 11:28:41', '2023-06-20 11:28:41'),
('5b3c44ea-8721-4f6c-8a24-6c1e6f67552c', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 1723, '{\"name\":\"Long Jump\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"26-30\",\"gender\":\"Male\"}', NULL, '2023-06-20 11:38:32', '2023-06-20 11:38:32'),
('5b7ed51d-b96d-4aef-afb8-5a6e684ab831', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:02:41', '2023-06-19 21:02:41'),
('5ba8ae6b-4107-41da-87b6-fa15244f57e3', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1968, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:51:36', '2023-06-15 19:51:36'),
('5be4d176-4387-46eb-8730-4fca59eb606a', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2081, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:03', '2023-06-15 20:09:03'),
('5c826b68-944b-4664-aaa7-d59df25d2861', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:36:15', '2023-06-19 21:36:15'),
('5e06ef20-29cf-4b06-9db0-0d150204d4be', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1968, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:54:20', '2023-06-15 19:54:20'),
('5f47ded6-b81b-43e7-b592-db24ff1d2c80', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1994, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:10:32', '2023-06-15 20:10:32'),
('5f5b441a-6655-44ce-b4b9-d1f48455fb51', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1808, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-20 12:26:03', '2023-06-20 12:26:03');
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('5fad53df-9f5a-4618-ad42-4f4d7659f4ec', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1808, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-16 15:53:07', '2023-06-16 15:53:07'),
('5fb2aecf-a9fe-4290-8f8c-6bb1136466ff', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:32:36', '2023-06-19 21:32:36'),
('608938aa-1b99-4b6c-a248-2aee6967c461', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1930, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:44:59', '2023-06-19 20:44:59'),
('60c28d78-8bf6-4a6d-93e7-7f1135b172e7', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2078, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-19 20:31:44', '2023-06-19 20:31:44'),
('6238f6f8-929c-41f7-ab5b-c27e655be2cb', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:40:00', '2023-06-19 21:40:00'),
('63538693-e8ad-40bb-865f-8e90bb9ede2a', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2080, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:41:07', '2023-06-19 21:41:07'),
('63ebdfcd-378b-4756-80f5-2e41d2a294fa', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2073, '{\"name\":\"Discus Throw\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"46-50\",\"gender\":\"Female\"}', NULL, '2023-06-20 11:35:53', '2023-06-20 11:35:53'),
('648dc1af-1b52-47d8-ba07-8e39d820b109', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 1716, '{\"name\":\"Kayaru Iluthal\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"17-100\",\"gender\":\"Female\"}', NULL, '2023-06-20 12:41:55', '2023-06-20 12:41:55'),
('65839f17-b267-4d0b-872c-07e2609d6f40', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2080, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:48:53', '2023-06-19 20:48:53'),
('65b7a173-0eb4-4ae0-a75c-6f4446744b40', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 1716, '{\"name\":\"4X100M Relay\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"31-40\",\"gender\":\"Male\"}', NULL, '2023-06-20 12:37:21', '2023-06-20 12:37:21'),
('66326880-dc9c-43d2-99a9-33ef9b996fd5', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1928, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-19 20:36:36', '2023-06-19 20:36:36'),
('672285d2-3bdf-4351-8374-2c0875adf488', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1970, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-19 20:36:36', '2023-06-19 20:36:36'),
('674b7281-9e79-4f14-8a23-329c1144c59c', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2082, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-19 20:31:44', '2023-06-19 20:31:44'),
('67b5581e-3dc8-4864-b142-007b2e6937c8', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2071, '{\"name\":\"4X100M Relay\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"26-30\",\"gender\":\"Male\"}', NULL, '2023-06-20 13:18:04', '2023-06-20 13:18:04'),
('693355af-7073-45b3-be1c-9605b2fba25a', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:15:58', '2023-06-19 21:15:58'),
('6a2486a1-1a55-4c19-aad8-8b51481e4326', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:36:05', '2023-06-19 21:36:05'),
('6b203e42-7554-40e6-a6a6-6719a72d3b51', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2080, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:38:27', '2023-06-19 21:38:27'),
('6b235787-c564-4252-9700-bbb172493e9a', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:57:53', '2023-06-19 20:57:53'),
('6cd8667c-444a-4610-9cef-ff60e37bdb50', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:41:01', '2023-06-19 21:41:01'),
('6d3cb510-8b8f-4b73-b4bc-b2731b444146', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:40:00', '2023-06-19 21:40:00'),
('6d6d1b96-d318-47bf-9917-b022c7da71da', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1807, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:52:55', '2023-06-15 19:52:55'),
('6dc33af1-bd40-445a-bf3b-449e2d0eb846', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1968, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:52:55', '2023-06-15 19:52:55'),
('7063c082-96ec-4366-a56d-176ea2a811b9', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-16 15:56:22', '2023-06-16 15:56:22'),
('71975325-3fc2-4b38-b118-31ae86119ec7', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1985, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:52:55', '2023-06-15 19:52:55'),
('722e8f52-e05b-43ee-b968-800d8790e2c9', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1800, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:10:32', '2023-06-15 20:10:32'),
('755ed4ef-06f8-4318-820e-aa5eecfdca48', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:53:09', '2023-06-19 20:53:09'),
('75b12422-0ddd-46b4-a6cb-f0351bc85a00', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:12:04', '2023-06-19 21:12:04'),
('75c58893-08b0-416c-959d-f1494d4a5541', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:14:21', '2023-06-19 21:14:21'),
('75e6c901-144d-4131-b0bb-20c39cce6eaa', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:41:01', '2023-06-19 21:41:01'),
('76c1fcf4-3581-46c8-86bb-18c9617f60ef', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:48:53', '2023-06-19 20:48:53'),
('773d9f33-2692-4e4e-b5d1-ec275b505a3d', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:28:23', '2023-06-19 21:28:23'),
('77962a93-346d-4bd7-aa4f-a8e675206076', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1970, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:10:32', '2023-06-15 20:10:32'),
('785927fb-f301-472c-9e8c-7691332936c2', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2071, '{\"name\":\"4X100M Relay\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"31-40\",\"gender\":\"Male\"}', NULL, '2023-06-20 12:37:21', '2023-06-20 12:37:21'),
('78865f02-4c73-44d0-802a-f893794e4ec9', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2071, '{\"name\":\"100M Running\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"26-30\",\"gender\":\"Female\"}', NULL, '2023-06-20 11:38:32', '2023-06-20 11:38:32'),
('7a0a8f4c-d4b5-4861-b3e8-6bdc580b7ef2', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2071, '{\"name\":\"100M Running\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"12\",\"gender\":\"Female\"}', NULL, '2023-06-20 13:00:34', '2023-06-20 13:00:34'),
('7b16ff98-c12e-4dc9-a1f2-18741f6f9cec', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2074, '{\"name\":\"Put Shot\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"26-30\",\"gender\":\"Female\"}', NULL, '2023-06-20 11:38:32', '2023-06-20 11:38:32'),
('7b7dfb26-7b6d-44f8-9c79-0638a78a551b', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:48:53', '2023-06-19 20:48:53'),
('7bc20370-1245-477b-9fde-60f916a358f6', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1928, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:03', '2023-06-15 20:09:03'),
('7ceb2f17-52dd-4b02-bdae-e866c0663e53', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:40:00', '2023-06-19 21:40:00'),
('7d92f0e3-882e-4129-bf83-f50306709107', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2078, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-16 15:53:07', '2023-06-16 15:53:07'),
('7e193ec3-a8a0-477d-b943-c1307d03671f', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1930, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:14:21', '2023-06-19 21:14:21'),
('7e2b757b-621c-4ef7-b933-0eebce17a4e7', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2073, '{\"name\":\"Discus Throw\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"46-50\",\"gender\":\"Female\"}', NULL, '2023-06-16 11:03:05', '2023-06-16 11:03:05'),
('7eb41847-8aaa-4853-b9ac-b3da060fd7f2', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2073, '{\"name\":\"Discus Throw\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"46-50\",\"gender\":\"Female\"}', NULL, '2023-06-16 09:51:39', '2023-06-16 09:51:39'),
('7f0f082b-1376-447a-8ea7-ca394cd4aacc', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2081, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:10:32', '2023-06-15 20:10:32'),
('80de598c-97b4-4091-b0b0-dc8a0f1abeeb', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1973, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:52:55', '2023-06-15 19:52:55'),
('81a4de5a-fed4-4c3a-b9ba-a24e35c2c958', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1970, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-19 20:31:44', '2023-06-19 20:31:44'),
('81ddd840-a1c8-49ec-be87-86fa0c3ff029', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:44:08', '2023-06-19 21:44:08'),
('82aaeb90-7416-4eb9-81de-9ef3a4599c00', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:47:25', '2023-06-19 20:47:25'),
('8373b68d-6301-4e74-b928-dbac8ef9040c', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:00:19', '2023-06-19 21:00:19'),
('83ba8e10-3c11-4e6f-b040-c295f1a6289e', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2016, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:41:01', '2023-06-19 21:41:01'),
('84e1d8dc-6436-4da8-a260-265c65b3b5ba', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1819, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:52:20', '2023-06-15 19:52:20'),
('856db3aa-e61d-461d-981f-e83a8576d7a2', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1973, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:52:20', '2023-06-15 19:52:20'),
('85c7e887-67b1-47a6-b3bd-75c1438a9ba6', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1844, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-20 11:56:36', '2023-06-20 11:56:36'),
('8630b3f1-46ca-465e-8f73-ea7702ac11e2', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1807, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:52:20', '2023-06-15 19:52:20'),
('8684372e-4955-4a65-9d7f-432a84e236c6', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:00:19', '2023-06-19 21:00:19'),
('8776fc24-bdfc-4dfa-9324-c48137dcb321', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1800, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-20 11:56:36', '2023-06-20 11:56:36'),
('887bd859-c544-4a87-a86a-bc44df0854d7', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-16 15:56:22', '2023-06-16 15:56:22'),
('89350889-9e4e-4bb9-ae7f-686fc602d4f6', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1800, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:12', '2023-06-15 20:09:12'),
('898ce84b-0d3e-40c9-a774-57d5ecd3afdb', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:38:27', '2023-06-19 21:38:27'),
('8a4ce4d0-6382-44e4-9fc7-ed0c6e7b988b', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:28:50', '2023-06-19 20:28:50'),
('8a5c1338-2f15-4e64-a18c-c84170cd9981', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:44:08', '2023-06-19 21:44:08'),
('8af0e976-2c53-406e-8201-7df067e62b12', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2081, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:12', '2023-06-15 20:09:12'),
('8bae4c9e-1773-46d2-aee9-c0b3c6028a18', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1928, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-19 21:42:35', '2023-06-19 21:42:35'),
('8ca1a571-b145-4343-8a77-a086c759b944', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2016, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:36:05', '2023-06-19 21:36:05'),
('8dcfc1e7-1cc9-4e6f-8e91-5327b43dc09a', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1968, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:52:20', '2023-06-15 19:52:20'),
('8e799970-34c1-41eb-8250-d5d9a687fdff', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:02:20', '2023-06-19 21:02:20'),
('8e9f5e3f-6ff0-4380-adb2-f0e819ba218a', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2073, '{\"name\":\"600M Running\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"12\",\"gender\":\"Female\"}', NULL, '2023-06-20 11:14:51', '2023-06-20 11:14:51'),
('8ef052c0-c92e-465d-b7f2-51ea943e2038', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 1709, '{\"name\":\"4X100M Relay\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"19-30\",\"gender\":\"Female\"}', NULL, '2023-06-20 12:55:06', '2023-06-20 12:55:06'),
('8efb2a06-8cd8-4caf-9c7b-73a00d761ee6', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1930, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:06:25', '2023-06-19 21:06:25'),
('9142ea71-4088-4fd2-9b45-067d1621a038', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1807, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:51:36', '2023-06-15 19:51:36'),
('9233ebaa-6619-48bd-8206-edf42a321c1a', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1785, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-20 12:26:03', '2023-06-20 12:26:03'),
('93d0d1e1-376b-4957-976d-404c7321f474', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 1716, '{\"name\":\"4X100M Relay\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"13-14\",\"gender\":\"Male\"}', NULL, '2023-06-20 12:40:09', '2023-06-20 12:40:09'),
('94ca7cbf-58f7-40e1-8aee-4c86626422eb', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:30:38', '2023-06-19 20:30:38'),
('9570c677-c2c2-42ff-a9cc-7af5586abae5', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1930, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:12:04', '2023-06-19 21:12:04'),
('95ff69f6-58a8-4aa3-9ae2-3fe289f2a1a0', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:12:04', '2023-06-19 21:12:04'),
('96e6384b-4179-4562-9a0a-6bff432b0901', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:02:41', '2023-06-19 21:02:41'),
('97ea5c8a-b53a-42f2-a47d-20dfa507686a', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:47:15', '2023-06-19 20:47:15'),
('980f49ca-9e7c-447e-af01-fa13db7fee66', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:30:18', '2023-06-19 21:30:18'),
('9894c232-4991-4e7f-bf76-2a71f06513d5', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1930, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-16 15:56:22', '2023-06-16 15:56:22'),
('992bd241-7906-4580-b4db-5990469cf365', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-16 15:56:22', '2023-06-16 15:56:22'),
('9a3cdfbd-0908-4234-ae54-32746c69817f', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2080, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:53:15', '2023-06-19 20:53:15'),
('9a7779c4-fa42-4c9b-b352-37f83c1ecc93', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:36:15', '2023-06-19 21:36:15'),
('9b5dfd00-fcf5-466e-8203-ecf37c6d12e2', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1930, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:02:41', '2023-06-19 21:02:41'),
('9be039f5-f723-4da8-9750-2be89c7bf987', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:36:15', '2023-06-19 21:36:15'),
('9de81410-8189-4649-b596-737156a0e2e1', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1928, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:38', '2023-06-15 20:09:38'),
('9e073103-d575-4978-84bd-2b941cb72618', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:37:56', '2023-06-19 21:37:56'),
('9f003cc8-83dd-4d4a-9b66-94ab657edcbc', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1970, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-16 15:53:07', '2023-06-16 15:53:07'),
('9f0641f0-57e2-4490-9cb1-98bd62867dc1', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1800, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:03', '2023-06-15 20:09:03'),
('9f6e20d6-139a-4f90-a82b-1fb39c1c302c', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:57:53', '2023-06-19 20:57:53'),
('9fdeffbb-2192-4ac1-b575-72b0693428e5', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1930, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:44:08', '2023-06-19 21:44:08'),
('9ffdb47c-0108-4013-b9c8-57c510ca97f5', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2074, '{\"name\":\"Kayaru Iluthal\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"17-100\",\"gender\":\"Male\"}', NULL, '2023-06-20 12:41:50', '2023-06-20 12:41:50'),
('a40ff9c6-b79e-47a0-9adf-dcd8e8d375e3', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2073, '{\"name\":\"600M Running\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"26-30\",\"gender\":\"Male\"}', NULL, '2023-06-20 11:27:11', '2023-06-20 11:27:11'),
('a4fc4c89-eaa3-4a6d-a4a0-d509417ec338', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2080, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:36:05', '2023-06-19 21:36:05'),
('a518b3ce-b392-4db8-9e10-f0f6550d258b', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1926, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:52:55', '2023-06-15 19:52:55'),
('a7d526c0-7e8c-48ac-9c22-bb745499be76', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:28:50', '2023-06-19 20:28:50'),
('a807bfe3-8746-47e3-bdd1-00f3f79514f5', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1844, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:12', '2023-06-15 20:09:12'),
('a9d5cf36-bc23-4ea7-a750-e6dc35b84e00', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-20 12:07:18', '2023-06-20 12:07:18'),
('aaf46394-5544-4653-9245-42718a7d3807', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 1716, '{\"name\":\"4X100M Relay\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"26-30\",\"gender\":\"Male\"}', NULL, '2023-06-20 13:18:04', '2023-06-20 13:18:04'),
('ab650bae-a83b-4b6a-a98a-8aadc6166c19', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:57:53', '2023-06-19 20:57:53'),
('ab979d5f-01a2-434e-8890-5c04af092ff5', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2082, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-16 15:53:07', '2023-06-16 15:53:07'),
('ad7f87a6-8ea0-47be-a801-90ea6e182efa', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:15:58', '2023-06-19 21:15:58'),
('af27cd21-5613-4a41-8b87-d2b6cd9aecab', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2072, '{\"name\":\"Javelin Throw\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"16\",\"gender\":\"Male\"}', NULL, '2023-06-20 11:38:32', '2023-06-20 11:38:32'),
('af65b5f6-36fa-45c5-89a2-473024770efe', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1930, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:28:50', '2023-06-19 20:28:50'),
('b0693ef7-6518-4d63-a43a-bc41b77ec7a4', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:41:01', '2023-06-19 21:41:01'),
('b0a5fe2a-07b1-4b4c-9c6c-625ce228bac5', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:39:23', '2023-06-19 21:39:23'),
('b13139e6-55b7-4aa9-9907-88c09a486f9b', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:36:15', '2023-06-19 21:36:15'),
('b18f5c35-d246-49cc-85ae-0e18fd28abdb', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1844, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:10:32', '2023-06-15 20:10:32'),
('b1eb34ce-a069-48d0-bce4-68ce6c4aa531', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2016, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-20 12:07:18', '2023-06-20 12:07:18'),
('b201c8bf-7709-4300-ba0f-d7072ed5958c', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:28:23', '2023-06-19 21:28:23'),
('b27ccff8-9cb3-4d18-9abf-fa2471ef7ac6', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1819, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:54:03', '2023-06-15 19:54:03'),
('b2d9d499-8495-4863-89a5-4753231f2854', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:06:25', '2023-06-19 21:06:25'),
('b370a07a-9c4f-45ab-a870-3d9f241c697a', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1808, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:10:32', '2023-06-15 20:10:32'),
('b37aed87-ceed-4086-aa02-d0774aefbbfa', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1930, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:47:25', '2023-06-19 20:47:25'),
('b40d68db-7aaa-4b48-b7fa-59d00eed2684', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1928, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-19 20:31:44', '2023-06-19 20:31:44'),
('b49e0515-f1e4-44a3-b2e3-52ff70d81e39', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2080, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:41:01', '2023-06-19 21:41:01'),
('b59b3cee-7227-44b5-b134-91fd1ad767d0', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:41:01', '2023-06-19 21:41:01'),
('b63e60df-d085-49da-a82c-d541c9b68928', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2080, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:39:23', '2023-06-19 21:39:23'),
('b6671f97-67d8-407b-a8a1-53a596a9f755', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1852, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:10:32', '2023-06-15 20:10:32'),
('b67917f1-12bb-488b-9301-2448e0e8d234', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2080, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:40:00', '2023-06-19 21:40:00'),
('b67b532e-6416-4646-b0e0-c7fd9fe8f2e0', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:28:23', '2023-06-19 21:28:23'),
('b69992d8-ff88-4ac0-ac3d-025f794b58f3', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2081, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-19 20:31:44', '2023-06-19 20:31:44'),
('b6ae95ad-6853-4efe-a7c6-2461cfda2fea', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1928, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-20 12:26:03', '2023-06-20 12:26:03'),
('b6d7b528-5268-499f-b9fe-fc13f323c090', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:53:15', '2023-06-19 20:53:15'),
('b6e7a5d0-98a0-4cd1-ae01-2fed3a044585', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2016, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:37:56', '2023-06-19 21:37:56'),
('b6e9e9aa-d321-44ab-bb59-7c9c309dec76', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:57:53', '2023-06-19 20:57:53'),
('b790e9d3-bd76-43d5-a5cf-10c3186cff2a', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:48:53', '2023-06-19 20:48:53'),
('b816a528-dbe8-4965-ae17-d56cdf5656eb', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2072, '{\"name\":\"Long Jump\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"26-30\",\"gender\":\"Male\"}', NULL, '2023-06-20 11:38:32', '2023-06-20 11:38:32'),
('b82c6901-fc1d-4bf0-86f7-2b288b750c84', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2074, '{\"name\":\"Put Shot\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"15\",\"gender\":\"Female\"}', NULL, '2023-06-20 14:30:03', '2023-06-20 14:30:03'),
('b846ac0b-760c-477b-8643-32233dc3863e', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:48:53', '2023-06-19 20:48:53'),
('b8e0098c-3a49-4054-a149-cfd6ac3ba3c8', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:32:36', '2023-06-19 21:32:36'),
('ba154c1e-be51-4907-beef-b29ccfe261b0', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1998, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:54:03', '2023-06-15 19:54:03'),
('bc0f6dc0-f215-49c5-b63e-f0024e81a976', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2072, '{\"name\":\"Long Jump\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"6\",\"gender\":\"Female\"}', NULL, '2023-06-20 11:38:32', '2023-06-20 11:38:32'),
('bccb1088-9276-4571-a22f-1558f3b236be', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1930, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:57:53', '2023-06-19 20:57:53'),
('bccb3b96-de3b-4c2a-a497-a5e2741a1983', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:38:27', '2023-06-19 21:38:27');
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('bcd7d99e-c115-4ccd-bc01-60a677449275', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1850, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:51:36', '2023-06-15 19:51:36'),
('bd089f5d-8330-4bc4-92c3-789f8464e49c', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:14:21', '2023-06-19 21:14:21'),
('bdab5e2c-3de8-4570-b7a9-ebb46eee3310', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:44:08', '2023-06-19 21:44:08'),
('bdeb92fc-0441-410b-a55f-0742710b40d4', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:43:25', '2023-06-19 20:43:25'),
('be32c517-90b5-4b74-8234-c445b4675d9b', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1852, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:03', '2023-06-15 20:09:03'),
('be91c382-45f2-4aae-9651-d67cc0460457', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2080, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:28:23', '2023-06-19 21:28:23'),
('c0085757-188f-4ed7-ad7e-ce7d4c94377b', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:02:41', '2023-06-19 21:02:41'),
('c046e115-0fcc-46df-b10c-8537637c9813', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:41:07', '2023-06-19 21:41:07'),
('c1040808-6825-4f0c-a18f-e0b17040884f', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:40:14', '2023-06-19 20:40:14'),
('c15c0585-6c1f-4524-8e3d-5117f67c9c11', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 1709, '{\"name\":\"4X100M Relay\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"41-100\",\"gender\":\"Female\"}', NULL, '2023-06-20 12:55:11', '2023-06-20 12:55:11'),
('c16cf44a-f347-4059-80ae-6a27747323ec', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2071, '{\"name\":\"4X100M Relay\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"13-14\",\"gender\":\"Male\"}', NULL, '2023-06-20 12:40:09', '2023-06-20 12:40:09'),
('c19efd68-a57f-4d2c-9c95-be5b0fcd237f', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2071, '{\"name\":\"100M Running\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"26-30\",\"gender\":\"Male\"}', NULL, '2023-06-20 11:38:32', '2023-06-20 11:38:32'),
('c29c6046-a551-4f9f-a7cc-a5ac204285e4', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1998, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:52:20', '2023-06-15 19:52:20'),
('c3b7be48-9ac9-4f6e-a487-e8acecc33ffd', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2074, '{\"name\":\"Put Shot\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"26-30\",\"gender\":\"Male\"}', NULL, '2023-06-20 14:34:07', '2023-06-20 14:34:07'),
('c3d01469-dafd-44b1-88dd-8953f2838c5f', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2074, '{\"name\":\"Put Shot\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"19-25\",\"gender\":\"Female\"}', NULL, '2023-06-20 14:34:03', '2023-06-20 14:34:03'),
('c4ed6806-2fcb-43c4-a5c3-793824318f36', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:06:25', '2023-06-19 21:06:25'),
('c523e174-78a3-48b3-8360-5b8806819d0e', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1930, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:47:15', '2023-06-19 20:47:15'),
('c601c413-1aea-4bf6-a006-2b71eb9743f3', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2074, '{\"name\":\"Put Shot\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"56-100\",\"gender\":\"Male\"}', NULL, '2023-06-20 11:38:32', '2023-06-20 11:38:32'),
('c71d6745-863c-4205-b35b-baa94f74d33e', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:47:25', '2023-06-19 20:47:25'),
('c7f3c1c3-5280-49a8-8b50-8bba78710035', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1930, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:30:38', '2023-06-19 20:30:38'),
('c7f855a2-be1a-45d9-ac9f-126583c5981b', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1928, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:12', '2023-06-15 20:09:12'),
('c9f3ac65-f238-41b7-b804-96051c731da1', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1930, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:10:43', '2023-06-19 21:10:43'),
('cac4c297-27cd-4b4e-87e0-69c025111863', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2078, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-19 21:42:35', '2023-06-19 21:42:35'),
('cac8c906-9517-43b9-9638-587fabec9f41', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:30:18', '2023-06-19 21:30:18'),
('cae59e26-53aa-45e5-8237-fd50e0f3ec5a', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:40:14', '2023-06-19 20:40:14'),
('cb33bc73-f4c7-410b-aa67-2b57588be1a7', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:47:15', '2023-06-19 20:47:15'),
('cc3546df-e122-496a-865d-d7a0a5cf089a', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:36:05', '2023-06-19 21:36:05'),
('cd067ad3-58fb-4f0e-bcda-ca23eaf9eb7b', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:37:56', '2023-06-19 21:37:56'),
('cdc5e26f-ecaf-4e59-81ed-4fa6e52e4dd4', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:53:09', '2023-06-19 20:53:09'),
('cff95d71-4129-4f2d-9d24-12d7aefaf64b', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:06:25', '2023-06-19 21:06:25'),
('cffe5405-40a7-4921-ad7f-6b0a30ddab24', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1852, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-20 12:26:03', '2023-06-20 12:26:03'),
('d0c89e05-d621-45b8-a2ef-d8753e0e8671', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2016, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:40:30', '2023-06-19 21:40:30'),
('d0d39bd1-a4cb-4ac6-8f09-8c6abe2f4194', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:30:18', '2023-06-19 21:30:18'),
('d0f3c260-caf6-43ff-add1-25c016248365', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:40:00', '2023-06-19 21:40:00'),
('d12feda2-f3f4-430a-87f7-112aa510bfdd', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1973, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:51:36', '2023-06-15 19:51:36'),
('d35e5fa1-03f5-48f1-964b-c88384d8c5ae', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:02:41', '2023-06-19 21:02:41'),
('d3bfa95a-6bfb-48b8-b2bf-2c28a81088f7', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:10:43', '2023-06-19 21:10:43'),
('d4414658-1375-43c2-9d34-45a3636dddff', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2072, '{\"name\":\"Discus Throw\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"19-25\",\"gender\":\"Male\"}', NULL, '2023-06-20 11:38:32', '2023-06-20 11:38:32'),
('d47c241d-0dd4-40f6-8f5a-a6b599dbe733', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:39:23', '2023-06-19 21:39:23'),
('d47f50c3-ad30-47a8-baf7-55342eb27529', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:53:09', '2023-06-19 20:53:09'),
('d4d5c6ba-1da1-4a67-b095-76252e9ee72c', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:00:19', '2023-06-19 21:00:19'),
('d5282238-f34e-40b3-b455-55031e2df3be', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1850, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-20 12:48:39', '2023-06-20 12:48:39'),
('d5681e6b-bb7e-47f7-8f0e-2e1299d9bb49', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-20 12:07:18', '2023-06-20 12:07:18'),
('d5838c86-ee0b-4c45-a812-310511191fd7', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:30:18', '2023-06-19 21:30:18'),
('d5eb010e-1167-4364-ba97-49aa2e595c33', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:40:30', '2023-06-19 21:40:30'),
('d6a409c3-859f-49dd-a40d-b165da0ab941', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1951, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-20 12:07:18', '2023-06-20 12:07:18'),
('d6f3857c-45c9-4dbb-8bb7-6e7ea6b5a7c8', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2080, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:40:30', '2023-06-19 21:40:30'),
('d9cf3279-cd1b-49d4-82f8-035b3a2b6094', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:53:15', '2023-06-19 20:53:15'),
('da011af8-9500-4bcc-80b2-8a3e2ccefcfc', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:10:43', '2023-06-19 21:10:43'),
('da61957c-6598-4353-93a9-8ba49ba651a2', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2016, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:40:00', '2023-06-19 21:40:00'),
('db139ed0-122c-4e7b-b21a-5cd78254406f', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2074, '{\"name\":\"Javelin Throw\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"11\",\"gender\":\"Female\"}', NULL, '2023-06-20 14:32:51', '2023-06-20 14:32:51'),
('dcbcb199-9b9c-4838-bd2b-4e88640dc371', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:40:30', '2023-06-19 21:40:30'),
('dd054b14-eb73-43de-9b88-6b76f2a78909', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1998, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:52:55', '2023-06-15 19:52:55'),
('ddb097b2-1a15-4f19-a7b9-4a4e5d37b519', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2080, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-20 12:07:18', '2023-06-20 12:07:18'),
('de6339f3-acaa-469d-953a-b7d3c13025b1', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2072, '{\"name\":\"Javelin Throw\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"17-18\",\"gender\":\"Female\"}', NULL, '2023-06-20 11:38:32', '2023-06-20 11:38:32'),
('df423667-42ec-403d-91ad-6558359ff55d', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2080, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:32:36', '2023-06-19 21:32:36'),
('df793fc1-b0a2-403b-ba8a-7e17266e8df2', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2068, '{\"name\":\"100M Running\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"26-30\",\"gender\":\"Female\"}', NULL, '2023-06-20 11:38:32', '2023-06-20 11:38:32'),
('dfee9532-26ea-4842-90b5-7d2f7084ab2e', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:43:25', '2023-06-19 20:43:25'),
('e036d072-450a-4e1a-b325-90f426f475aa', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:40:14', '2023-06-19 20:40:14'),
('e070c60d-53e4-45ae-9074-25407aa99c70', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:10:43', '2023-06-19 21:10:43'),
('e0c87217-3662-4e3f-9167-dcd2ee9d09a5', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1930, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-20 12:10:44', '2023-06-20 12:10:44'),
('e0d1970a-9f03-42be-9ddd-1f16081ad6ae', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 1723, '{\"name\":\"100M Running\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"26-30\",\"gender\":\"Male\"}', NULL, '2023-06-20 11:38:32', '2023-06-20 11:38:32'),
('e1fa73e4-70f7-42c0-8faa-1034247abb54', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:00:19', '2023-06-19 21:00:19'),
('e2e86b65-6cea-4bee-ac07-dc68494da07d', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:12:04', '2023-06-19 21:12:04'),
('e363d688-5a0a-4045-9581-8413f1ef4d26', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1928, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:10:32', '2023-06-15 20:10:32'),
('e3ab2a9e-a1e1-42a1-8f52-b76dc95714ec', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:30:18', '2023-06-19 21:30:18'),
('e3b36df0-1e57-4430-ba12-f9214e9e00fa', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1973, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:54:03', '2023-06-15 19:54:03'),
('e48a20c9-19cd-409f-b5d8-a72f9395f7f4', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:37:56', '2023-06-19 21:37:56'),
('e54941a9-2824-4c63-b0a5-7a45457e08c9', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:36:05', '2023-06-19 21:36:05'),
('e59a95b9-7b34-4762-a99e-00cf594c7eec', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:57:53', '2023-06-19 20:57:53'),
('e5cf6808-1e46-4b50-9482-18dc57fea9d5', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1998, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-20 12:48:39', '2023-06-20 12:48:39'),
('e64ff6fd-da85-4221-90a8-03669806f4eb', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:02:20', '2023-06-19 21:02:20'),
('e6748905-eb2d-41be-b14f-d1808b40e436', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2078, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-19 20:36:36', '2023-06-19 20:36:36'),
('e6771a30-4a4e-4884-bac5-b8aaefaf1649', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1807, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:54:03', '2023-06-15 19:54:03'),
('e9eb1e11-d2d1-42d4-844f-97941bbdb5b1', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2081, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:38', '2023-06-15 20:09:38'),
('eab02b6c-c3fe-4b1f-964f-ee0c70ffafc0', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2072, '{\"name\":\"Javelin Throw\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"26-30\",\"gender\":\"Female\"}', NULL, '2023-06-20 11:38:32', '2023-06-20 11:38:32'),
('eb070459-5d74-4eab-9151-a651a7be15f5', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:06:25', '2023-06-19 21:06:25'),
('eba48917-4fd1-4eb1-b856-92160cf71902', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2073, '{\"name\":\"Discus Throw\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"46-50\",\"gender\":\"Male\"}', NULL, '2023-06-20 11:35:12', '2023-06-20 11:35:12'),
('ebd6312b-5e37-4319-ba51-adc37c704fb3', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:30:38', '2023-06-19 20:30:38'),
('ebeb54a2-e746-437e-b18b-01c6be1e5c7e', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2016, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:41:07', '2023-06-19 21:41:07'),
('ed17aaf4-90a6-494d-aaf5-59f73584475e', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:14:21', '2023-06-19 21:14:21'),
('edb6d78a-7ccd-4388-8095-55d61a2b1a75', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:44:59', '2023-06-19 20:44:59'),
('edd4b3f1-043a-4ba4-aef6-68514d60d162', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:44:59', '2023-06-19 20:44:59'),
('eea5c9d3-9229-4dd7-99f4-985ebb90b674', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1852, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:38', '2023-06-15 20:09:38'),
('ef4c62e1-90bf-4472-aa14-ec67a8b21e5e', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1850, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:54:03', '2023-06-15 19:54:03'),
('f019907f-37b1-4354-962d-e0fa6d239cf8', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1985, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:51:36', '2023-06-15 19:51:36'),
('f039e734-1732-4a82-b401-7249dab28982', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:53:15', '2023-06-19 20:53:15'),
('f0efb5e4-6e9b-4ce0-b489-c98264a6ac84', 'App\\Notifications\\CancelledEventNotification', 'App\\User', 2072, '{\"name\":\"Javelin Throw\",\"body\":\"The above event has been cancelled\",\"league\":\"TCC OVER 17\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"19-25\",\"gender\":\"Male\"}', NULL, '2023-06-20 11:38:32', '2023-06-20 11:38:32'),
('f1110334-cf46-41cc-a620-fa20ea998b0c', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:41:07', '2023-06-19 21:41:07'),
('f15ab866-4836-469b-915d-6279905a834f', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:36:05', '2023-06-19 21:36:05'),
('f28d6b83-ab7b-49f9-8672-a26354be606e', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:00:19', '2023-06-19 21:00:19'),
('f2c5601e-c4d2-4257-b469-1f9b00d3b656', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:40:14', '2023-06-19 20:40:14'),
('f3da073c-3c0c-4a22-9a46-4784dce7af41', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:15:58', '2023-06-19 21:15:58'),
('f3e6a65b-0ea0-42bf-b776-feab57fcc941', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1930, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:00:19', '2023-06-19 21:00:19'),
('f4902cd1-e71e-49c1-9fdb-de1b8a514593', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1844, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-19 20:36:36', '2023-06-19 20:36:36'),
('f51d72cd-c510-4e99-a9ef-d2ff35f7b63f', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:38:27', '2023-06-19 21:38:27'),
('f6e457c7-b6d7-47e3-a1c8-d4ebebcf9493', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1816, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:28:23', '2023-06-19 21:28:23'),
('f7474b36-78f4-445b-9a9d-5bdf1f6c6121', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:48:53', '2023-06-19 20:48:53'),
('f8a206a5-bbe4-4d0e-b00a-f15ebfbd7d2e', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1970, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:03', '2023-06-15 20:09:03'),
('f988224c-6102-4a61-a987-4ef7911f033d', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1994, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-20 12:26:03', '2023-06-20 12:26:03'),
('f9b99050-49b6-4cee-bec3-2f9d095135da', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1930, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:02:20', '2023-06-19 21:02:20'),
('fa84311e-774f-4448-ac5d-e323c907632a', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1807, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-20 12:48:39', '2023-06-20 12:48:39'),
('fb191abf-a174-4a4a-9cff-e418d4c54683', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1970, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:12', '2023-06-15 20:09:12'),
('fc2248bb-e892-484a-bec7-4354bbccf90a', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:32:36', '2023-06-19 21:32:36'),
('fc9c92c3-7d46-4657-952c-ec0736dc0a46', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-20 12:10:44', '2023-06-20 12:10:44'),
('fd01cc38-c88a-4f60-8029-d6b1aeee6a99', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1800, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 20:09:38', '2023-06-15 20:09:38'),
('fd322bba-6aa6-4a87-a712-4995fa82afdf', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1750, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:41:07', '2023-06-19 21:41:07'),
('fde902f1-8f54-40ef-94bb-8a8fd386117b', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2048, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:39:23', '2023-06-19 21:39:23'),
('fe1062fb-416b-4f1e-997a-acadb0db3e75', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1930, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:40:14', '2023-06-19 20:40:14'),
('ff56f7f8-9938-4365-adc3-28654c47484a', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1866, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 21:36:15', '2023-06-19 21:36:15'),
('ff8d54c3-1915-4140-bb9a-8090d012b3d6', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 1968, '{\"name\":\"60M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"10\",\"gender\":\"Male\",\"date\":\"\"}', NULL, '2023-06-15 19:54:03', '2023-06-15 19:54:03'),
('ffb9123b-f8dd-44b6-9a88-35096e93b5b6', 'App\\Notifications\\PostponedEventNotification', 'App\\User', 2038, '{\"name\":\"40M Running\",\"body\":\"The above event will happen onthis date\",\"league\":\"TCC UNDER 16\",\"org\":\"TAMIL COORDINATING COMMITEE - TCC\",\"ageGroup\":\"8\",\"gender\":\"Female\",\"date\":\"\"}', NULL, '2023-06-19 20:53:15', '2023-06-19 20:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tpnumber` int(11) DEFAULT NULL,
  `mobile` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `orgnum` varchar(255) DEFAULT NULL,
  `state` varchar(255) NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postalcode` int(11) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `season_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `email`, `tpnumber`, `mobile`, `address`, `orgnum`, `state`, `prefix`, `city`, `postalcode`, `country_id`, `season_id`, `status`, `created_at`, `updated_at`) VALUES
(5, 'TAMIL COORDINATING COMMITEE - TCC', 'tcc@tamilsport.app', 0, 78965412, 'Oslo', NULL, 'Norway', 'TA', 'oslo', 26, 2, 3, 1, '2023-05-10 18:05:23', '2023-05-23 19:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `org_settings`
--

CREATE TABLE `org_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `org_logo` varchar(255) DEFAULT NULL,
  `header` varchar(255) DEFAULT NULL,
  `footer` longtext DEFAULT NULL,
  `player_number_logo` varchar(255) DEFAULT NULL,
  `invoice_logo` varchar(255) DEFAULT NULL,
  `staff_id` varchar(255) DEFAULT NULL,
  `extra_question` varchar(255) DEFAULT NULL,
  `yes` longtext DEFAULT NULL,
  `no` longtext DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `terms_conditions` longtext DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `two_factor_auth` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `org_settings`
--

INSERT INTO `org_settings` (`id`, `organization_id`, `org_logo`, `header`, `footer`, `player_number_logo`, `invoice_logo`, `staff_id`, `extra_question`, `yes`, `no`, `active`, `terms_conditions`, `discount`, `created_at`, `updated_at`, `two_factor_auth`) VALUES
(1, 5, '20230614182305.png', '20230614182305.jpg', 'TAMIL COORDINATING COMMITEE - NORWAY', '20230614182305.jpg', '20230614182305.png', '20230614182305.jpg', NULL, NULL, NULL, 0, 'Opplysninger som oppgis her vil bli brukt til fremtidige Tamilar villayaddu villa friidrettsstevner.&nbsp; Disse dataene vil bli slettet ved foresp&oslash;rsel etter Tamilar villayaddu villa. Ved sp&oslash;rsm&aring;l ta kontakt p&aring; e-post:&nbsp;post.tccsport@gmail.com', 0, '2023-05-10 18:33:55', '2023-06-14 18:23:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('antonroy68@gmail.com', 'vH3B2TjzUufFaSoq2h2JLoHkC8JOUFNlZxc5HgVKi8WTuU19zEHlfqPPUhdp3VLn', '2022-05-25 15:35:34'),
('antonroy68@gmail.com', '0poRCQovMPq2koIXX2UXVYsfi3jZ5cfkYzIbouq9jNXRBVqJiOIIuQiIRYLLFwKD', '2022-05-25 15:36:39'),
('antonroy68@gmail.com', 'imDn369u6NfIf33icOKrx7SiyI7xTFjV3x641spqFIutlJvrhaCYzqHtMViDe7b8', '2022-05-25 15:41:21'),
('delihara@hotmail.com', 'WirQScg8OgsOOwRUre8tSu8D7k1k9F7S5bnelWoNmixPOqAeMOa5UwOkuifGamwY', '2022-05-29 20:52:21'),
('nisakast@hotmail.com', 'veTSBHKaczG84UYNacGXNjLuvSaHg7jcpYvqVdPuXi3jEcMNvIumb843aPq2YFEQ', '2022-05-29 22:35:15'),
('nisakast@hotmail.com', 'STksasPG7VCwxdpsN4Q7opfgknbo3bpMFyBMOuC3jRxfmEF4NkBUc73t5GO1hmyd', '2022-05-29 22:35:18'),
('raka1973@outlook.no', 'OfB74vUVSAm38X1UXTbOJ5DdDgjWAmsamHqTdHXDlKntqfVa2MM7i2su8PiqUE0d', '2022-05-31 22:49:49'),
('premmathias@gmail.com', 'bd8IuojX0oxr9zmh0PrX6T2r9eXSfJGFSaA5wZYSV1LXg8RiSVBzsTOfqvKSoYeM', '2022-06-06 17:31:32'),
('premmathias@gmail.com', 'CB4qMIE6AFp2mZAzW3hBwrxcbUYV0RPoRGPR2qBbUyFJALBLPdITz8kKpo0If0UI', '2022-06-06 23:27:57'),
('m.kajen@hotmail.com', 'CK49k0kUclUeKzzimpovM4lSs7pMjLl4BPIqJCr0HMDfzCmbKWkEAkc3MKs25201', '2022-06-07 02:33:28'),
('joejaffns@yahoo.no', 'NSQOUpPwyM7ei3cFWhxznvJX8SGWLJVjQTv547jZpvSVsOarlONxFBKToeV2UbRT', '2022-06-07 12:04:58'),
('kalpanasiva@hotmail.com', '3aU5YGo9qKciDSQvrODg22QOEPJI1LXBbd39CH0hf5rmwF8pgNRuqgdqvZ24S9Uw', '2022-06-08 00:23:52'),
('kalpanasiva@hotmail.com', '5n6HN8p8yyNHTAG3GWyMl6SrEXaHI16A7XTdy8XIl9BFwt4KfOdJbAjjMUcRU0L6', '2022-06-08 00:25:33'),
('kalpanasiva@hotmail.com', 'TjOIQZyBEB1q4eIgnfWZJMkcBcDD0h3GUAYRpnm2VFYusExawLH6XyufessSQPze', '2022-06-08 00:26:30'),
('kalpanasiva@hotmail.com', 'FMFMpZlWZluwuZBDKgmdP7VZywxEwe1NtkWr4GWDJ8yRhom1qKn46byPnHnZcFhJ', '2022-06-08 00:26:31'),
('kalpanasiva@hotmail.com', 'qsSNAq7tf1kwkLbKoLwv1qrnWAfbj9PyYjnYybTmY05f7zhTItgAD8tg4YLhjYOg', '2022-06-08 00:26:32'),
('kalpanasiva@hotmail.com', 'tJpjhrGsFgyarszJoaZYIBWNj73950sqAEZg9dFt8REzlq1s1PA2tSraWuozTEL4', '2022-06-08 00:26:32'),
('kalpanasiva@hotmail.com', 'z7SShQ9PtwBhgZFZFZKWMb7iSvTzvY3IvsihPgPAkY9r17xdodQ5Wu442XT8O5DT', '2022-06-08 00:26:32'),
('kalpanasiva@hotmail.com', '2xdNqv0uWiYCS8QdYTisuoqGyNqOeURw3VOE1tInrJ7Q78jS43hvZ3ccoW9Q6UG4', '2022-06-08 00:26:33'),
('kalpanasiva@hotmail.com', 'BvzFrpaydp4ErSHY2hY1y7tjA5RJSxIyGFRVX5WXerPhANdnUoYdRmkHHXteC2Fa', '2022-06-08 00:29:02'),
('kalpanasiva@hotmail.com', 'ZPYcM5P7ZRHriEBxjAUumBE5747MYFhazjch49tXUeYBfM79dkTW1Kk1ecPXNlDh', '2022-06-08 00:53:10'),
('sinthu-sasi13@hotmail.com', 'LNLTddYoBVISjtfFlIm1KRqbr2TaWMTHHjYual8tYmTyY7CvbulEdrliIFqwZRi9', '2022-06-08 01:04:56'),
('sinthu-sasi13@hotmail.com', '7IhwGUdfYHxnSOoKG9CvlqABtxuDHCFQStZQbGRMRupU0mcLS7ySDsqn0KQnRh10', '2022-06-08 20:14:24'),
('m.kajen@hotmail.com', 'DrDA72BZQs6ilLrwa1fbmwtDje25nMOhRWKQ44Sg4wUYNldbmNARmlOYYlg1lsXW', '2022-06-09 00:00:48'),
('viykan@hotmail.com', '3TSxt5xyZsfuMdX6SyBHkRFkf997qM07YOoQ7PjqheKoVTCOs8WhUTf2OjqQ5W3m', '2022-06-09 00:08:12'),
('viykan@hotmail.com', '1MRiLovfScByNfZxG4fWXnch6hiErpWphRkPv1xT4BpEpzBNRJIcNHMSwfRTX2pX', '2022-06-09 00:11:44'),
('jaya2000@msn.com', 'YDgLm6RRvwW604ayFnMFCUmRcqR447ULjSIL3X1IjYLUm9NTNtmNnD0mmjyTiHHM', '2022-06-15 21:16:16'),
('suvarnanathan@gmail.com', 'Ds4flOmwM3b4yPE4DnGXJf4UDkj10GukFIf5j2dbKEBw804XjWCASMoftGA6Yi74', '2022-07-05 09:04:11'),
('kohilanx9@gmail.com', 'KPFrfmZtSdiKehg5woMpn8GGe0g97BvUH7pzsLKxZyOdlXiRTAiS5HIsM1MJzpeq', '2022-10-26 12:11:34'),
('ict18833@sjp.ac.lk', 'DxFN3e5ly5gdfV9aNNDGkXIOg3691DI3yegKi89WAWXtpYNx4T4jDhrDankCthRN', '2022-10-29 11:33:38'),
('ict18833@sjp.ac.lk', 'cDOQsNR5Xkc7BVTd7ei7ugnV8ntTS6tvSyZvqVRDWweN5AU80LRXusYslf6yrGwr', '2022-10-29 11:51:05'),
('ict18833@sjp.ac.lk', 'gt5EmLCZEiiWrg6M2qNVNVFYGSqnBvRgWIqYpNGHLZA8YtAyBjZMh3TRaVLQghXK', '2022-10-29 11:57:13'),
('kohilanx9@gmail.com', 'JRtIRWFcUtVYs8rJq2P1FyQUPJLhrABFcAHOoChKnxrPDE8tO5L3XMBgQmpsGQob', '2022-11-04 05:20:38'),
('inthujanjan@gmail.com', 'cTlu2aKmU6jTb02oSMdt8ilaZ7ieTph2dS7f29qYPzQ3JIEN4IUr6Yi26wrQo7Z6', '2023-05-12 09:00:44'),
('inthujanjan@gmail.com', 'hSuCFoovtEOPzHrLHpUBUMCVq8jKZ6rAOfeLrhUdGHLNQGfnVB2buYaZGZEz3gND', '2023-05-12 09:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'View-Organization', 'web', 'All Organizations', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(2, 'Edit-Organization', 'web', 'All Organizations', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(3, 'Create-staff2', 'web', 'All Staffs', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(4, 'View-staff', 'web', 'All Staffs', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(5, 'Edit-staff', 'web', 'All Staffs', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(6, 'Delete-staff', 'web', 'All Staffs', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(7, 'Create-org-member', 'web', 'All Members', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(8, 'View-org-member', 'web', 'All Members', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(9, 'Edit-org-member', 'web', 'All Members', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(10, 'Delete-org-member', 'web', 'All Members', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(11, 'ViewSettings', 'web', 'Settings-org', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(12, 'EditSettings', 'web', 'Settings-org', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(13, 'createMasterData', 'web', 'masterData', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(14, 'viewMasterData', 'web', 'masterData', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(15, 'editMasterData', 'web', 'masterData', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(16, 'Create-Venue', 'web', 'Add New-venue', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(17, 'Create-venue2', 'web', 'All Venues', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(18, 'View-venue', 'web', 'All Venues', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(19, 'Edit-venue', 'web', 'All Venues', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(20, 'Delete-venue', 'web', 'All Venues', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(21, 'Create-league', 'web', 'Add New-league', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(22, 'Create-league2', 'web', 'All Leagues', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(23, 'view-leagues', 'web', 'All Leagues', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(24, 'Edit-league', 'web', 'All Leagues', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(25, 'cancel-league', 'web', 'All Leagues', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(26, 'Create-user', 'web', 'Add New-user', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(27, 'Create-user2', 'web', 'All Users', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(28, 'View-user', 'web', 'All Users', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(29, 'Edit-user', 'web', 'All Users', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(30, 'Delete-user', 'web', 'All Users', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(31, 'import-users', 'web', 'ImportUsers', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(32, 'Create-event', 'web', 'Add New-event', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(33, 'viewevent', 'web', 'Events List', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(34, 'editevent', 'web', 'Events List', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(35, 'deleteevent', 'web', 'Events List', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(36, 'view-participants', 'web', 'participants', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(37, 'view-regs', 'web', 'groupEventRegs', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(38, 'view-cancellation', 'web', 'cancellation', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(39, 'edit-cancellation', 'web', 'cancellation', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(40, 'view-marathon', 'web', 'marathon', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(41, 'viewresults', 'web', 'Event Results', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(42, 'view-request', 'web', 'payment requests', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(43, 'approve-request', 'web', 'payment requests', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(44, 'view-iframe', 'web', 'iframes', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(45, 'Create-Club', 'web', 'Add New-club', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(46, 'Create-Club2', 'web', 'All Clubs', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(47, 'View-Club', 'web', 'All Clubs', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(48, 'Edit-Club', 'web', 'All Clubs', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(49, 'Delete-Club', 'web', 'All Clubs', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(50, 'Create-team', 'web', 'Add New-team', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(51, 'Create-team2', 'web', 'All Teams', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(52, 'View-team', 'web', 'All Teams', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(53, 'Edit-team', 'web', 'All Teams', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(54, 'Delete-team', 'web', 'All Teams', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(55, 'Create-member', 'web', 'Add New-member', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(56, 'Create-member2', 'web', 'AllClubMembers', '2022-10-07 06:51:25', '2022-10-07 06:51:25'),
(57, 'View-events', 'web', 'AllClubMembers', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(58, 'edit-member', 'web', 'AllClubMembers', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(59, 'delete-member', 'web', 'AllClubMembers', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(60, 'ViewSettings-club', 'web', 'Settings-club', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(61, 'EditSettings-club', 'web', 'Settings-club', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(62, 'import-member', 'web', 'importClubMember', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(63, 'ViewPayments', 'web', 'Payments', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(64, 'viewApprovals', 'web', 'eventApprovals', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(65, 'editApprovals', 'web', 'eventApprovals', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(66, 'Create-player', 'web', 'Add New-players', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(67, 'Create-familMembers', 'web', 'CreateFamilyMember', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(68, 'Create-familMember', 'web', 'FamilyMembers', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(69, 'Edit-familMember', 'web', 'FamilyMembers', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(70, 'event-familMember', 'web', 'FamilyMembers', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(71, 'Create-season', 'web', 'Add New-season', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(72, 'Create-season2', 'web', 'Seasons Lists', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(73, 'View-season', 'web', 'Seasons Lists', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(74, 'Edit-season', 'web', 'Seasons Lists', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(75, 'Delete-season', 'web', 'Seasons Lists', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(76, 'Add-News', 'web', 'Add New-news', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(77, 'View-news', 'web', 'Scheduled', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(78, 'Edit-news', 'web', 'Scheduled', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(79, 'Drafted-news', 'web', 'Drafted', '2022-10-07 06:51:26', '2022-10-07 06:51:26'),
(80, 'GeneralSettings', 'web', 'Settings', '2022-10-07 06:51:26', '2022-10-07 06:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qr_payments`
--

CREATE TABLE `qr_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `no` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `qr_logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qr_payments`
--

INSERT INTO `qr_payments` (`id`, `organization_id`, `name`, `no`, `qr_code`, `qr_logo`, `created_at`, `updated_at`) VALUES
(1, 5, 'TAMIL COORDINATING COMMITEE - TCC', '545856554', '20230511153515.jpg', '20230614182339.png', '2023-05-10 18:44:22', '2023-06-14 18:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `season_id` bigint(20) UNSIGNED NOT NULL,
  `league_id` bigint(20) UNSIGNED NOT NULL,
  `gender` int(11) NOT NULL,
  `self_reg` int(11) NOT NULL,
  `inv_no` int(11) NOT NULL,
  `is_approved` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `totalfee` double(8,2) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `trans_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `user_id`, `organization_id`, `season_id`, `league_id`, `gender`, `self_reg`, `inv_no`, `is_approved`, `payment_method`, `totalfee`, `discount`, `status`, `trans_id`, `created_at`, `updated_at`) VALUES
(2, 1728, 5, 3, 5, 1, 1, 0, 0, 0, 0.00, 0, 4, '', '2023-05-12 23:13:24', '2023-05-23 21:22:38'),
(3, 1725, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-13 10:15:58', '2023-05-13 10:18:54'),
(4, 1726, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-13 10:16:30', '2023-05-13 10:18:44'),
(5, 1727, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-13 10:17:27', '2023-05-13 10:18:40'),
(7, 1734, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-05-22 21:52:35', '2023-05-22 21:52:35'),
(8, 1733, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-05-22 21:53:00', '2023-05-22 21:53:00'),
(13, 1748, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-05-26 13:41:45', '2023-05-26 13:41:45'),
(14, 1749, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-05-26 13:45:15', '2023-05-26 13:45:15'),
(15, 1751, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-26 21:32:11', '2023-06-10 19:38:45'),
(16, 1750, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-26 21:35:06', '2023-06-10 19:38:43'),
(17, 1752, 5, 3, 5, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-26 21:38:07', '2023-06-10 19:38:42'),
(18, 1753, 5, 3, 5, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-27 15:46:07', '2023-06-10 19:38:35'),
(19, 1754, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-27 15:47:50', '2023-06-10 19:38:33'),
(20, 1755, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-27 15:49:06', '2023-06-10 19:38:30'),
(21, 1757, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-27 20:34:39', '2023-06-10 19:38:19'),
(22, 1760, 5, 3, 5, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-27 20:41:34', '2023-06-10 19:38:15'),
(23, 1761, 5, 3, 5, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-27 20:42:52', '2023-06-10 19:38:12'),
(24, 1763, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-28 11:19:49', '2023-06-10 19:38:11'),
(25, 1762, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-28 11:55:52', '2023-06-10 19:38:05'),
(26, 1764, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-28 15:44:16', '2023-05-29 17:51:12'),
(27, 1766, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-28 18:02:44', '2023-06-10 19:38:03'),
(28, 1767, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-29 19:02:57', '2023-05-29 22:06:34'),
(29, 1769, 5, 3, 4, 1, 1, 0, 2, 0, 0.00, 0, 4, '', '2023-05-29 21:56:48', '2023-05-29 21:56:48'),
(30, 1770, 5, 3, 4, 2, 1, 0, 2, 0, 0.00, 0, 4, '', '2023-05-29 21:59:23', '2023-05-29 21:59:23'),
(31, 1779, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-30 14:38:37', '2023-05-30 19:06:55'),
(32, 1780, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-30 14:39:40', '2023-05-30 19:06:49'),
(33, 1789, 5, 3, 5, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-30 22:32:52', '2023-06-06 23:18:32'),
(34, 1790, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-30 22:34:27', '2023-06-06 23:18:37'),
(35, 1784, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-31 22:33:06', '2023-06-12 07:36:37'),
(36, 1785, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-05-31 22:35:43', '2023-06-12 07:36:35'),
(37, 1792, 5, 3, 5, 1, 1, 0, 2, 0, 0.00, 0, 4, '', '2023-05-31 22:42:22', '2023-05-31 22:42:22'),
(38, 1793, 5, 3, 4, 1, 1, 0, 2, 0, 0.00, 0, 4, '', '2023-05-31 22:45:53', '2023-05-31 22:45:53'),
(39, 1775, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-01 09:59:43', '2023-06-06 23:18:40'),
(40, 1776, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-01 10:04:35', '2023-06-06 23:18:44'),
(41, 1800, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-01 19:55:09', '2023-06-01 20:56:52'),
(42, 1801, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-01 19:57:30', '2023-06-01 20:56:51'),
(43, 1802, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-01 19:58:52', '2023-06-01 20:56:48'),
(44, 1806, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-01 20:32:32', '2023-06-01 20:56:46'),
(46, 1805, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-01 20:37:22', '2023-06-01 20:56:44'),
(47, 1807, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-01 20:38:20', '2023-06-01 20:56:41'),
(48, 1808, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-01 20:44:31', '2023-06-01 20:56:37'),
(50, 1811, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-02 06:13:06', '2023-06-02 11:19:05'),
(51, 1812, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-02 06:13:46', '2023-06-02 11:19:08'),
(52, 1810, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-02 06:16:05', '2023-06-02 11:19:16'),
(53, 1813, 5, 3, 4, 2, 1, 0, 2, 0, 0.00, 0, 4, '', '2023-06-02 09:21:32', '2023-06-02 09:21:32'),
(54, 1814, 5, 3, 4, 1, 1, 0, 2, 0, 0.00, 0, 4, '', '2023-06-02 10:16:00', '2023-06-02 10:16:00'),
(55, 1795, 5, 3, 5, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-02 17:19:04', '2023-06-06 23:18:47'),
(58, 1821, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 00:23:48', '2023-06-12 07:36:32'),
(59, 1819, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 00:25:59', '2023-06-12 07:36:29'),
(60, 1820, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 00:29:21', '2023-06-12 07:36:27'),
(61, 1787, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 00:30:51', '2023-06-12 07:36:24'),
(62, 1822, 5, 3, 5, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 00:34:34', '2023-06-12 07:36:21'),
(63, 1824, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 09:15:22', '2023-06-10 19:38:00'),
(64, 1825, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 09:22:14', '2023-06-10 19:37:53'),
(65, 1826, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 09:25:18', '2023-06-10 19:37:46'),
(66, 1827, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 09:27:12', '2023-06-10 19:37:44'),
(67, 1829, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 09:54:05', '2023-06-10 19:37:38'),
(68, 1831, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 09:54:46', '2023-06-10 19:37:36'),
(69, 1828, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 10:04:56', '2023-06-10 19:37:32'),
(70, 1833, 5, 3, 5, 2, 1, 0, 0, 0, 0.00, 0, 4, '', '2023-06-03 10:29:34', '2023-06-12 14:23:57'),
(71, 1837, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 12:15:19', '2023-06-03 12:15:19'),
(72, 1838, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 12:30:09', '2023-06-03 12:30:09'),
(73, 1839, 5, 3, 5, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 12:55:17', '2023-06-10 19:37:24'),
(74, 1843, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 17:55:07', '2023-06-10 19:37:19'),
(75, 1844, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 17:58:01', '2023-06-10 19:37:17'),
(76, 1845, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 17:59:41', '2023-06-10 19:37:15'),
(77, 1846, 5, 3, 5, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 18:00:46', '2023-06-10 19:37:12'),
(78, 1849, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 18:23:52', '2023-06-10 19:37:09'),
(79, 1850, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 18:25:26', '2023-06-10 19:37:06'),
(80, 1852, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 18:26:59', '2023-06-10 19:37:03'),
(81, 1773, 5, 3, 5, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 21:45:50', '2023-06-06 23:18:50'),
(82, 1854, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-03 21:50:05', '2023-06-06 23:18:54'),
(83, 1747, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-04 00:09:01', '2023-06-10 19:36:55'),
(84, 1860, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-04 14:04:00', '2023-06-12 07:36:19'),
(85, 1861, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-04 14:11:15', '2023-06-12 07:36:16'),
(86, 1859, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-04 14:12:19', '2023-06-12 07:36:14'),
(87, 1866, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-04 22:09:44', '2023-06-06 23:18:56'),
(88, 1869, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-04 22:38:23', '2023-06-06 23:18:58'),
(89, 1870, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-04 23:28:29', '2023-06-04 23:28:29'),
(90, 1871, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-04 23:31:14', '2023-06-04 23:31:14'),
(91, 1872, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-04 23:56:13', '2023-06-04 23:56:13'),
(92, 1873, 5, 3, 5, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-05 00:01:24', '2023-06-05 00:01:24'),
(93, 1874, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-05 00:05:31', '2023-06-05 00:05:31'),
(94, 1876, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-05 01:06:00', '2023-06-05 01:06:00'),
(95, 1875, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-05 01:06:49', '2023-06-05 01:06:49'),
(96, 1797, 5, 3, 5, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-05 13:45:43', '2023-06-06 23:19:01'),
(97, 1877, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-05 13:47:50', '2023-06-06 23:19:04'),
(98, 1878, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 13:32:12', '2023-06-06 13:32:12'),
(99, 1879, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 13:33:02', '2023-06-06 13:33:02'),
(100, 1881, 5, 3, 5, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 15:25:39', '2023-06-06 23:19:09'),
(101, 1882, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 15:50:50', '2023-06-06 15:50:50'),
(102, 1883, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 15:56:07', '2023-06-06 15:56:07'),
(103, 1884, 5, 3, 5, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 15:58:17', '2023-06-06 15:58:17'),
(104, 1816, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 17:26:25', '2023-06-06 23:19:14'),
(105, 1890, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 18:09:27', '2023-06-12 07:36:11'),
(106, 1893, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 18:44:01', '2023-06-08 00:40:25'),
(107, 1894, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 18:45:03', '2023-06-08 00:40:23'),
(108, 1895, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 19:13:04', '2023-06-06 23:19:16'),
(109, 1896, 5, 3, 5, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 20:15:53', '2023-06-06 23:19:21'),
(110, 1898, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 20:21:07', '2023-06-06 23:19:24'),
(111, 1899, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 20:46:36', '2023-06-06 20:46:36'),
(112, 1900, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 21:33:55', '2023-06-06 21:33:55'),
(113, 1901, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 21:45:25', '2023-06-06 21:45:25'),
(114, 1902, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 21:46:10', '2023-06-06 21:46:10'),
(115, 1903, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 21:55:17', '2023-06-06 21:55:17'),
(116, 1904, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 21:57:45', '2023-06-06 21:57:45'),
(118, 1906, 5, 3, 5, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 22:03:00', '2023-06-06 22:03:00'),
(119, 1907, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 23:05:53', '2023-06-06 23:05:53'),
(120, 1908, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 23:06:29', '2023-06-06 23:06:29'),
(121, 1909, 5, 3, 5, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 23:07:36', '2023-06-06 23:07:36'),
(122, 1910, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 23:09:24', '2023-06-06 23:09:24'),
(123, 1912, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 23:10:50', '2023-06-06 23:10:50'),
(124, 1913, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 23:11:28', '2023-06-06 23:11:28'),
(125, 1914, 5, 3, 5, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 23:13:02', '2023-06-06 23:13:02'),
(126, 1917, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 23:39:52', '2023-06-06 23:39:52'),
(127, 1915, 5, 3, 5, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-06 23:51:41', '2023-06-06 23:51:41'),
(128, 1905, 5, 3, 5, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-07 00:21:29', '2023-06-07 00:21:29'),
(129, 1919, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-07 01:10:33', '2023-06-08 00:40:20'),
(130, 1920, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-07 01:13:01', '2023-06-08 00:40:15'),
(131, 1921, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-07 16:50:56', '2023-06-07 20:19:07'),
(132, 1922, 5, 3, 5, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-07 16:55:39', '2023-06-07 20:19:05'),
(133, 1924, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-07 20:18:41', '2023-06-07 20:18:41'),
(135, 1925, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 00:42:35', '2023-06-08 00:42:35'),
(136, 1926, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 00:43:55', '2023-06-08 00:43:55'),
(137, 1927, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 00:45:46', '2023-06-08 00:45:46'),
(138, 1928, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 00:47:21', '2023-06-08 00:47:21'),
(139, 1929, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 00:49:02', '2023-06-08 00:49:02'),
(140, 1930, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 00:56:47', '2023-06-08 00:56:47'),
(141, 1931, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 00:58:04', '2023-06-08 00:58:04'),
(142, 1932, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 00:59:42', '2023-06-08 00:59:42'),
(143, 1933, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 01:01:24', '2023-06-08 01:01:24'),
(144, 1934, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 01:02:50', '2023-06-08 01:02:50'),
(145, 1935, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 01:03:56', '2023-06-08 01:03:56'),
(146, 1936, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 01:05:06', '2023-06-08 01:05:06'),
(147, 1937, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 01:06:15', '2023-06-08 01:06:15'),
(148, 1938, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 01:07:48', '2023-06-08 01:07:48'),
(149, 1939, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 01:10:26', '2023-06-08 01:10:26'),
(150, 1778, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 01:14:19', '2023-06-08 01:14:19'),
(151, 1940, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 01:17:34', '2023-06-08 01:17:34'),
(152, 1944, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 18:36:43', '2023-06-08 18:36:43'),
(153, 1945, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 18:49:08', '2023-06-08 18:49:08'),
(154, 1947, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 18:50:40', '2023-06-08 18:50:40'),
(155, 1948, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 18:53:05', '2023-06-08 18:53:05'),
(156, 1949, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 18:54:23', '2023-06-08 18:54:23'),
(157, 1950, 5, 3, 5, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 21:54:29', '2023-06-08 21:54:29'),
(158, 1951, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 21:56:05', '2023-06-08 21:56:05'),
(159, 1952, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 22:05:59', '2023-06-08 22:05:59'),
(160, 1954, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 22:30:17', '2023-06-09 01:37:46'),
(161, 1956, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 23:31:48', '2023-06-08 23:31:48'),
(162, 1957, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 23:40:20', '2023-06-08 23:40:20'),
(163, 1958, 5, 3, 5, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 23:49:38', '2023-06-08 23:49:38'),
(164, 1959, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 23:59:01', '2023-06-08 23:59:01'),
(165, 1946, 5, 3, 5, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-08 23:59:31', '2023-06-08 23:59:31'),
(166, 1960, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-09 00:01:03', '2023-06-09 00:01:03'),
(167, 1961, 5, 3, 5, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-09 00:09:26', '2023-06-09 00:09:26'),
(168, 1962, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-09 00:13:37', '2023-06-09 00:13:37'),
(169, 1943, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-09 00:30:40', '2023-06-12 07:36:08'),
(170, 1963, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-09 00:36:20', '2023-06-09 01:37:35'),
(171, 1964, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-09 00:39:39', '2023-06-09 01:37:13'),
(172, 1965, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-09 00:41:29', '2023-06-09 01:37:04'),
(173, 1966, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-09 07:31:36', '2023-06-09 07:31:36'),
(174, 1969, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-09 10:56:47', '2023-06-09 10:56:47'),
(175, 1968, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-09 11:00:21', '2023-06-09 11:00:21'),
(176, 1970, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-09 11:09:23', '2023-06-09 11:09:23'),
(177, 1971, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-09 11:18:33', '2023-06-09 11:18:33'),
(178, 1973, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-09 12:12:55', '2023-06-09 12:12:55'),
(179, 1972, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-09 12:13:40', '2023-06-09 12:13:40'),
(180, 1974, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-09 13:00:57', '2023-06-10 19:36:51'),
(181, 1976, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-09 21:08:25', '2023-06-09 21:26:57'),
(182, 1977, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-09 21:09:39', '2023-06-09 21:26:50'),
(183, 1978, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-09 21:10:18', '2023-06-09 21:26:42'),
(184, 1979, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-09 21:11:14', '2023-06-09 21:26:35'),
(185, 1980, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-09 22:23:08', '2023-06-10 19:35:42'),
(186, 1984, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-10 13:48:09', '2023-06-12 21:23:26'),
(187, 1985, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-10 13:59:13', '2023-06-12 21:23:28'),
(188, 1986, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-10 14:27:33', '2023-06-12 21:23:23'),
(189, 1988, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-10 17:42:31', '2023-06-10 20:01:03'),
(190, 1981, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-10 19:45:42', '2023-06-10 19:45:42'),
(191, 1840, 5, 3, 5, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-10 19:52:02', '2023-06-10 19:52:02'),
(193, 1990, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-11 00:07:30', '2023-06-13 06:51:04'),
(194, 1991, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-11 00:08:11', '2023-06-13 06:51:01'),
(195, 1994, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-11 06:43:05', '2023-06-12 14:22:49'),
(196, 1995, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-11 06:44:42', '2023-06-12 14:23:19'),
(197, 1998, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-11 11:49:35', '2023-06-11 11:49:35'),
(198, 1999, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-11 11:50:50', '2023-06-11 11:50:50'),
(199, 2000, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-11 11:52:08', '2023-06-11 11:52:08'),
(200, 2001, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-11 12:12:27', '2023-06-11 12:12:27'),
(201, 2003, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-11 17:11:03', '2023-06-12 14:23:03'),
(202, 2006, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-11 17:12:40', '2023-06-12 14:23:14'),
(203, 2007, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-11 17:14:23', '2023-06-12 14:23:23'),
(204, 2008, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-11 18:10:52', '2023-06-12 21:23:30'),
(205, 2009, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-11 18:11:50', '2023-06-12 21:23:17'),
(206, 2010, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-11 18:12:52', '2023-06-12 21:23:32'),
(207, 2016, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-12 07:19:34', '2023-06-12 08:46:48'),
(208, 2014, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-12 07:21:24', '2023-06-12 08:46:39'),
(209, 2015, 5, 3, 4, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-12 07:23:55', '2023-06-12 08:46:27'),
(210, 2017, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-12 14:32:37', '2023-06-12 14:32:37'),
(211, 2018, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-12 14:33:21', '2023-06-12 14:33:21'),
(212, 2019, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-12 16:16:12', '2023-06-12 22:39:22'),
(213, 2020, 5, 3, 5, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-12 16:16:49', '2023-06-12 22:39:14'),
(214, 2021, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-12 16:17:45', '2023-06-12 22:39:11'),
(215, 1841, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-12 16:21:50', '2023-06-12 22:39:04'),
(216, 1891, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-12 18:38:32', '2023-06-13 20:16:29'),
(217, 2026, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-12 21:25:03', '2023-06-12 21:25:03'),
(218, 2028, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-12 22:44:53', '2023-06-12 22:44:53'),
(219, 2029, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-12 22:46:45', '2023-06-12 22:46:45'),
(220, 2030, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-12 23:01:51', '2023-06-13 20:16:26'),
(221, 2031, 5, 3, 5, 1, 1, 0, 2, 0, 0.00, 0, 4, '', '2023-06-13 00:29:56', '2023-06-13 00:29:56'),
(222, 2032, 5, 3, 4, 2, 1, 0, 2, 0, 0.00, 0, 4, '', '2023-06-13 00:32:13', '2023-06-13 00:32:13'),
(223, 1863, 5, 3, 4, 2, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 04:43:15', '2023-06-13 07:33:06'),
(224, 2033, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 10:24:35', '2023-06-13 10:24:35'),
(225, 2038, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 10:25:09', '2023-06-13 10:25:09'),
(226, 2037, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 10:25:33', '2023-06-13 10:25:33'),
(227, 2039, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 10:25:54', '2023-06-13 10:25:54'),
(228, 2036, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 10:26:00', '2023-06-13 10:26:00'),
(229, 2035, 5, 3, 5, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 10:26:44', '2023-06-13 10:26:44'),
(230, 2034, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 10:27:16', '2023-06-13 10:27:16'),
(231, 2042, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 14:26:42', '2023-06-13 14:26:42'),
(232, 2043, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 14:28:31', '2023-06-13 14:28:31'),
(233, 2044, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 14:30:09', '2023-06-13 14:30:09'),
(234, 2045, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 14:31:36', '2023-06-13 14:31:36'),
(235, 2046, 5, 3, 5, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 14:39:30', '2023-06-13 14:39:30'),
(236, 2048, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 20:18:06', '2023-06-13 20:18:06'),
(237, 2047, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 20:19:32', '2023-06-13 20:19:32'),
(238, 2049, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 20:38:58', '2023-06-13 20:38:58'),
(239, 2050, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 20:44:06', '2023-06-13 20:44:06'),
(240, 2051, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 20:44:40', '2023-06-13 20:44:40'),
(241, 2052, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 20:47:43', '2023-06-13 20:47:43'),
(242, 2053, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 20:48:11', '2023-06-13 20:48:11'),
(243, 2054, 5, 3, 5, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 21:22:03', '2023-06-13 21:22:03'),
(244, 2055, 5, 3, 5, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 21:24:05', '2023-06-13 21:24:05'),
(245, 2056, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 22:36:03', '2023-06-13 22:36:03'),
(246, 1798, 5, 3, 5, 1, 1, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 23:11:09', '2023-06-14 01:30:34'),
(247, 2058, 5, 3, 5, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 23:49:40', '2023-06-13 23:49:40'),
(248, 2059, 5, 3, 5, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-13 23:51:10', '2023-06-13 23:51:10'),
(249, 2060, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-14 01:32:02', '2023-06-14 01:32:02'),
(250, 2061, 5, 3, 5, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-14 01:33:35', '2023-06-14 01:33:35'),
(251, 2062, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-14 01:35:18', '2023-06-14 01:35:18'),
(252, 1723, 5, 3, 5, 1, 1, 0, 2, 0, 0.00, 0, 4, '', '2023-06-14 17:57:10', '2023-06-14 17:57:10'),
(253, 2079, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-15 20:04:23', '2023-06-15 20:04:23'),
(254, 2081, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-15 20:05:07', '2023-06-15 20:05:07'),
(255, 2082, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-15 20:05:19', '2023-06-15 20:05:19'),
(256, 2080, 5, 3, 4, 2, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-15 20:05:37', '2023-06-15 20:05:37'),
(257, 2078, 5, 3, 4, 1, 0, 0, 1, 0, 0.00, 0, 4, '', '2023-06-15 20:05:52', '2023-06-15 20:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `report_names`
--

CREATE TABLE `report_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `report_names`
--

INSERT INTO `report_names` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PoliceReport', '2022-05-13 03:47:13', '2022-05-13 03:47:13'),
(2, 'MedicalReport', '2022-05-13 03:47:13', '2022-05-13 03:47:13'),
(3, 'NIC/Passport', '2022-05-13 03:47:13', '2022-05-13 03:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'CountryAdmin', 'web', 0, '', NULL, '2022-10-29 14:58:06'),
(2, 'OrganizationAdmin', 'web', 1, '', NULL, '2022-05-14 14:27:56'),
(3, 'ClubAdmin', 'web', 1, '', NULL, NULL),
(4, 'EventOrganizer', 'web', 1, '', NULL, NULL),
(5, 'Starter', 'web', 1, '', NULL, NULL),
(6, 'Judge', 'web', 1, '', NULL, NULL),
(7, 'Player', 'web', 1, '', NULL, NULL),
(8, 'SuperAdmin', 'web', 1, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(3, 2),
(3, 4),
(4, 1),
(4, 2),
(4, 4),
(5, 1),
(5, 2),
(5, 4),
(6, 1),
(6, 2),
(6, 4),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 2),
(15, 1),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(23, 4),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(28, 4),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(32, 4),
(33, 2),
(33, 4),
(33, 5),
(33, 6),
(34, 2),
(34, 4),
(35, 2),
(36, 2),
(36, 4),
(37, 2),
(37, 4),
(38, 2),
(38, 4),
(39, 2),
(39, 4),
(40, 2),
(40, 4),
(41, 2),
(41, 4),
(41, 5),
(41, 6),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(47, 4),
(49, 2),
(51, 3),
(52, 3),
(52, 4),
(53, 3),
(54, 3),
(55, 1),
(56, 1),
(56, 3),
(57, 1),
(57, 3),
(57, 4),
(58, 1),
(58, 3),
(59, 1),
(59, 3),
(60, 3),
(61, 3),
(62, 3),
(64, 3),
(65, 3),
(67, 2),
(67, 7),
(68, 2),
(68, 7),
(69, 2),
(69, 4),
(69, 7),
(70, 2),
(70, 7);

-- --------------------------------------------------------

--
-- Table structure for table `seasonss`
--

CREATE TABLE `seasonss` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seasonss`
--

INSERT INTO `seasonss` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(3, '2023', 1, '2022-10-29 06:50:17', '2023-05-09 17:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `sports_categories`
--

CREATE TABLE `sports_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sports_categories`
--

INSERT INTO `sports_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Athletic', '2022-05-13 03:47:12', '2022-05-13 03:47:12'),
(2, 'Cricket', '2022-05-13 03:47:12', '2022-05-13 03:47:12'),
(3, 'FootBall', '2022-05-13 03:47:12', '2022-05-13 03:47:12'),
(4, 'Carrom', '2022-05-13 03:47:12', '2022-05-13 03:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `stripe`
--

CREATE TABLE `stripe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `secret_key` varchar(255) DEFAULT NULL,
  `public_key` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `finished` tinyint(4) NOT NULL DEFAULT 0,
  `task_description` text NOT NULL,
  `task_deadline` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `club_id` bigint(20) UNSIGNED NOT NULL,
  `gender_id` bigint(20) UNSIGNED NOT NULL,
  `age_group_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `club_id`, `gender_id`, `age_group_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 14, 'Deleted team', 2, '2023-05-25 01:34:15', '2023-05-25 01:34:53'),
(2, 5, 1, 14, 'Blå', 1, '2023-05-25 01:36:05', '2023-05-25 01:36:05'),
(3, 7, 1, 13, 'Nordavind Black', 1, '2023-06-04 12:38:03', '2023-06-04 12:38:03'),
(4, 7, 1, 13, 'Nordavind White', 1, '2023-06-04 12:38:27', '2023-06-04 12:38:27'),
(5, 7, 2, 13, 'Deleted team', 2, '2023-06-04 12:40:46', '2023-06-04 12:40:51'),
(6, 7, 2, 13, 'Nordavind', 1, '2023-06-04 12:40:46', '2023-06-04 12:40:46'),
(7, 7, 1, 14, 'Nordavind', 1, '2023-06-04 12:49:42', '2023-06-04 12:49:42'),
(8, 7, 2, 14, 'Nordavind', 1, '2023-06-04 12:50:30', '2023-06-04 12:50:30'),
(9, 7, 1, 15, 'Deleted team', 2, '2023-06-04 13:14:45', '2023-06-04 13:16:45'),
(10, 7, 1, 15, 'Nordavind White', 1, '2023-06-04 13:17:02', '2023-06-04 13:17:02'),
(11, 7, 1, 15, 'Nordavind Black', 1, '2023-06-04 13:17:16', '2023-06-04 13:17:16'),
(12, 7, 2, 15, 'Nordavind', 1, '2023-06-04 13:36:27', '2023-06-04 13:36:27'),
(13, 7, 1, 16, 'Nordavind White', 1, '2023-06-04 13:37:16', '2023-06-04 13:37:16'),
(14, 7, 1, 16, 'Nordavind Black', 1, '2023-06-04 13:37:38', '2023-06-04 13:37:38'),
(15, 7, 2, 16, 'Nordavind', 1, '2023-06-04 13:37:55', '2023-06-04 13:37:55'),
(16, 7, 1, 17, 'Nordavind White', 1, '2023-06-04 13:40:20', '2023-06-04 13:40:20'),
(17, 7, 1, 17, 'Nordavind  Black', 1, '2023-06-04 13:40:48', '2023-06-04 13:40:48'),
(18, 7, 2, 17, 'Nordavind', 1, '2023-06-04 13:47:22', '2023-06-04 13:47:22'),
(19, 7, 1, 18, 'Nordavind White', 1, '2023-06-04 13:57:58', '2023-06-04 13:58:29'),
(20, 7, 1, 18, 'Nordavind Black', 1, '2023-06-04 13:58:57', '2023-06-04 13:58:57'),
(21, 7, 2, 18, 'Nordavind', 1, '2023-06-04 13:59:10', '2023-06-04 13:59:10'),
(22, 7, 1, 19, 'Nordavind', 1, '2023-06-04 14:05:24', '2023-06-04 14:05:24'),
(23, 7, 1, 20, 'Nordavind', 1, '2023-06-04 14:15:43', '2023-06-04 14:15:43'),
(24, 7, 2, 20, 'Nordavind', 1, '2023-06-04 14:17:14', '2023-06-04 14:17:14'),
(25, 7, 1, 29, 'Nordavind', 1, '2023-06-04 14:17:37', '2023-06-04 14:17:37'),
(26, 7, 2, 29, 'Nordavind', 1, '2023-06-04 14:18:17', '2023-06-04 14:18:17'),
(27, 7, 1, 24, 'Nordavind', 1, '2023-06-04 14:21:25', '2023-06-04 14:21:25'),
(28, 7, 1, 26, 'Nordavind Black', 1, '2023-06-04 14:33:42', '2023-06-04 14:33:42'),
(29, 7, 1, 26, 'Nordavind white', 1, '2023-06-04 14:34:06', '2023-06-04 14:34:06'),
(30, 7, 1, 26, 'Nordavind Orange', 1, '2023-06-04 14:34:54', '2023-06-04 14:34:54'),
(31, 7, 1, 27, 'Nordavind', 1, '2023-06-04 14:35:42', '2023-06-04 14:35:42'),
(32, 7, 2, 27, 'Nordavind', 1, '2023-06-04 14:35:55', '2023-06-04 14:35:55'),
(33, 7, 2, 26, 'Nordavind', 1, '2023-06-04 14:39:07', '2023-06-04 14:39:07'),
(34, 7, 2, 18, 'Nordavind', 1, '2023-06-04 14:42:58', '2023-06-04 14:42:58'),
(35, 7, 2, 18, 'Nordavind', 1, '2023-06-04 14:52:28', '2023-06-04 14:52:28'),
(36, 2, 2, 14, '11 STARS SPORTSCLUB', 1, '2023-06-13 22:46:58', '2023-06-13 22:46:58'),
(37, 2, 2, 15, '11 STARS SPORTSCLUB', 1, '2023-06-13 22:47:12', '2023-06-13 22:47:12'),
(38, 2, 1, 27, '11 STARS SPORTSCLUB', 1, '2023-06-13 22:47:28', '2023-06-13 22:47:28'),
(39, 2, 2, 27, '11 STARS SPORTSCLUB', 1, '2023-06-13 22:47:43', '2023-06-13 22:47:43'),
(40, 2, 2, 17, '11 STARS SPORTSCLUB', 1, '2023-06-13 22:48:10', '2023-06-13 22:48:10'),
(41, 2, 1, 24, '11 STARS SPORTSCLUB', 1, '2023-06-13 22:49:48', '2023-06-13 22:49:48'),
(42, 2, 1, 16, '11 STARS SPORTSCLUB', 1, '2023-06-13 22:50:09', '2023-06-13 22:50:09'),
(43, 2, 2, 13, '11 STARS SPORTSCLUB', 1, '2023-06-13 22:50:31', '2023-06-13 22:50:31'),
(44, 2, 2, 16, '11 STARS SPORTSCLUB', 1, '2023-06-13 22:50:45', '2023-06-13 22:50:45'),
(45, 2, 2, 26, '11 STARS SPORTSCLUB', 1, '2023-06-13 22:51:01', '2023-06-13 22:51:01'),
(46, 2, 1, 26, '11 STARS SPORTSCLUB', 1, '2023-06-13 22:51:10', '2023-06-13 22:51:10'),
(47, 2, 2, 30, '11 STARS SPORTSCLUB 1', 1, '2023-06-13 22:51:34', '2023-06-13 22:51:34'),
(48, 2, 2, 30, '11 STARS SPORTSCLUB 1', 1, '2023-06-13 22:51:47', '2023-06-13 22:51:47'),
(49, 2, 2, 30, '11 STARS SPORTSCLUB 2', 1, '2023-06-13 22:51:58', '2023-06-13 22:51:58'),
(50, 2, 2, 20, '11 STARS SPORTSCLUB', 1, '2023-06-13 22:52:10', '2023-06-13 22:52:10'),
(51, 2, 2, 16, '11 STARS SPORTSCLUB', 1, '2023-06-13 22:52:35', '2023-06-13 22:52:35'),
(52, 2, 2, 27, '11 STARS SPORTSCLUB', 1, '2023-06-13 22:52:51', '2023-06-13 22:52:51'),
(53, 2, 1, 17, '11 STARS SPORTSCLUB', 1, '2023-06-13 23:05:07', '2023-06-13 23:05:07'),
(54, 2, 2, 18, '11 STARS SPORTSCLUB', 1, '2023-06-13 23:05:35', '2023-06-13 23:05:35'),
(55, 2, 2, 28, '11 STARS SPORTSCLUB', 1, '2023-06-13 23:05:50', '2023-06-13 23:05:50'),
(56, 2, 2, 20, '11 STARS SPORTSCLUB', 1, '2023-06-13 23:40:32', '2023-06-13 23:40:32'),
(57, 12, 1, 29, 'YS Il', 1, '2023-06-14 08:47:10', '2023-06-14 08:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `team_users`
--

CREATE TABLE `team_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_users`
--

INSERT INTO `team_users` (`id`, `team_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 10, 1870, NULL, NULL),
(2, 10, 1872, NULL, NULL),
(3, 10, 1875, NULL, NULL),
(4, 10, 1893, NULL, NULL),
(5, 10, 1938, NULL, NULL),
(6, 10, 1999, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `dob` date NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 2,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL,
  `club_id` bigint(20) UNSIGNED DEFAULT NULL,
  `season_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `guardian_mail` varchar(255) DEFAULT NULL,
  `guardian_number` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `tel_number` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postal` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_login` tinyint(1) NOT NULL DEFAULT 0,
  `member_or_not` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `membership_updated_year` date NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `two_factor_code` varchar(255) DEFAULT NULL,
  `two_factor_expires_at` datetime DEFAULT NULL,
  `enable_two_factor` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `userId`, `dob`, `is_approved`, `country_id`, `organization_id`, `club_id`, `season_id`, `email`, `guardian_name`, `guardian_mail`, `guardian_number`, `email_verified_at`, `gender`, `tel_number`, `state`, `city`, `address`, `postal`, `password`, `profile_pic`, `parent_id`, `first_login`, `member_or_not`, `status`, `membership_updated_year`, `remember_token`, `created_at`, `updated_at`, `two_factor_code`, `two_factor_expires_at`, `enable_two_factor`) VALUES
(1, 'AdminNorway', 'Tamilsangam', 'TCC 001', '1996-05-05', 1, 2, NULL, NULL, NULL, 'admin@admin.com', NULL, NULL, NULL, NULL, 'male', '46773535', 'oslo', 'oslo', 'Stovner vel, Fjellstuveien 26,', '26', '$2y$10$h3cuvHVHF5fkZ0BZuJN6be4supfGmjMAFqa9cfMykxHZVbh4nFHvy', '1686759698png', NULL, 1, 0, 2, '0000-00-00', NULL, '2022-10-07 06:51:25', '2023-06-15 10:57:22', NULL, NULL, 0),
(1707, 'TCC', 'Admin', 'TC 0001', '1987-10-10', 1, 2, 5, 1, NULL, 'tccadmin@admin.com', NULL, NULL, NULL, NULL, 'male', '+4778965412', '', '', '', '', '$2y$10$VyOlr8Xh9xpvKFV8OAH7Ku5hookYzceIuuVDvTAht332rw8ukPV72', NULL, NULL, 1, 0, 2, '0000-00-00', 'qbWf89PDqOn55JAiqXY10ei9VEYs2X3TCwqxISYLaKOnuAznsbwxHdTqVQxJ', '2023-05-10 18:09:52', '2023-06-15 10:49:47', NULL, NULL, 0),
(1708, 'EventOrg', 'EventAdmin', 'TC 0002', '1985-10-10', 1, 2, 5, 1, NULL, 'eventorg@admin.com', NULL, NULL, NULL, NULL, 'male', '54568958', '', '', '', '', '$2y$10$WIVfOmXUfYALREh73LTquO4KMSF53IaUKLMXNa4wf2pSjBtEHqQ/u', NULL, NULL, 1, 0, 2, '0000-00-00', 'lEmCuCfBFpvlSLjuFVKNpEwI0081WUAnFjDAFjeOpu7LzRkvYqGOuy8sZI2L', '2023-05-10 19:04:49', '2023-05-23 21:18:35', NULL, NULL, 0),
(1709, 'Eleven Stars', 'Sports Club', 'EL 0001', '2023-05-01', 1, 2, 5, 2, NULL, 'el@tamilsport.app', NULL, NULL, NULL, NULL, 'male', '', NULL, NULL, NULL, NULL, '$2y$10$QvGULjwYB03oEL2hBjEXXeL5pYx2cvPnmFIrZLaxnmVkkCRg/Xixa', NULL, NULL, 0, 0, 2, '0000-00-00', 'tywD1h6I74cLniIeQfkPUpyxR6oevJcIUv4dXUuIj0Kf78yfQuj7x1lK25kE', '2023-05-11 22:55:54', '2023-05-11 22:55:54', NULL, NULL, 0),
(1710, 'Everest', 'Sports Club', 'EV 0001', '2023-05-01', 1, 2, 5, 3, NULL, 'ev@tamilsport.app', NULL, NULL, NULL, NULL, 'male', '', NULL, NULL, NULL, NULL, '$2y$10$sUPumyDHED21Z2uKPdPB3e/nLPVsmhCGfr0ia57qk1GrKETs5FkZS', NULL, NULL, 0, 0, 2, '0000-00-00', 'FyNNr2uKYZJn4V6z7nwzttmovJZmY0fYWWCUjKa6RKZAzPScEamGpp7R5UEzXpoQ', '2023-05-11 23:14:05', '2023-05-11 23:14:05', NULL, NULL, 0),
(1711, 'Young', 'Stars', 'YO 0001', '2023-05-01', 1, 2, 5, 12, NULL, 'yo@tamilsport.app', NULL, NULL, NULL, NULL, 'male', '', NULL, NULL, NULL, NULL, '$2y$10$o1f5/KpGfNHDjgklldcNq.uAFp2LSKX77r.qTwvCCQFhEKP7rqQZW', NULL, NULL, 0, 0, 2, '0000-00-00', 'CeVvesFQwQ0sySBq8wWhCYpdu5p0RChhFSrJ799rR1k0fQklFRJj0uOJ8RTPwOxa', '2023-05-11 23:17:53', '2023-05-11 23:17:53', NULL, NULL, 0),
(1712, 'Stovner', 'Tamil Sports Club', 'ST 0001', '2023-05-01', 1, 2, 5, 11, NULL, 'st@tamilsport.app', NULL, NULL, NULL, NULL, 'male', '', NULL, NULL, NULL, NULL, '$2y$10$/F0GFzkc1WACympi1iVKteU7xal5Lwu3YTJcBSBOj6qxTjZVuAtAW', NULL, NULL, 0, 0, 2, '0000-00-00', 'F6xZXFe0QKlnTKxvM7IpOlW08KLwZdmu95c7qN3NFt7kXRGCx8K7Kr02Yv4MbtWg', '2023-05-11 23:21:42', '2023-05-11 23:21:42', NULL, NULL, 0),
(1713, 'Sengkathir', 'Sports Club', 'SE 0001', '2023-05-01', 1, 2, 5, 10, NULL, 'se@tamilsport.app', NULL, NULL, NULL, NULL, 'male', '', NULL, NULL, NULL, NULL, '$2y$10$a5OK9evw5IHkmseg8FKer.EhRu/fhoguTdLzzMV4qG/RZBwyWVVjK', NULL, NULL, 0, 0, 2, '0000-00-00', 'gITHVb2KlmUqsuXcL6XGr9s2pZKzuSZvN2S8iKEZFKBteozHk1CZ4Ndf7FD3YlMx', '2023-05-11 23:24:46', '2023-05-11 23:24:46', NULL, NULL, 0),
(1714, 'Private', 'Club', 'PR 0001', '2023-05-01', 0, 2, 5, 9, NULL, 'pr@tamilsport.app', NULL, NULL, NULL, NULL, 'male', '', NULL, NULL, NULL, NULL, '$2y$10$5Tn95gX4GJyd7gtKyyqV5OGTvYBx2jiylvu21wG3I3YnvjuMQt0cS', NULL, NULL, 0, 0, 2, '0000-00-00', 'S0alf07ssIbV7HKgOfyp0RmDbLlzfTK6jeR4clQ8o72CAazNCgTUBQsIwM8emA49', '2023-05-11 23:28:30', '2023-05-11 23:47:04', NULL, NULL, 0),
(1715, 'Noreel', 'Sportsklubb', 'NS 0001', '2023-05-01', 1, 2, 5, 8, NULL, 'ns@tamilsport.app', NULL, NULL, NULL, NULL, 'male', '', NULL, NULL, NULL, NULL, '$2y$10$1mm8OJgVX6e9k5OahDsIduMh0DCiK8fki2ZSyau.fB8hn7opkE6wy', NULL, NULL, 0, 0, 2, '0000-00-00', 'eI12m0q7NVO2GJWulEKfh9TRjLijcb0Fo3dhhmH1vbKc6f7Sz3ONG4sEEsfL', '2023-05-11 23:31:23', '2023-05-11 23:31:23', NULL, NULL, 0),
(1716, 'Nordavind', 'IL', 'NO 0001', '2023-05-01', 1, 2, 5, 7, NULL, 'nor@tamilsport.app', NULL, NULL, NULL, NULL, 'male', '', NULL, NULL, NULL, NULL, '$2y$10$8lAt.6V41H6aRnPqpE8FCOD.KP6P94XHLKQeobPx0nYY.igusEbfC', NULL, NULL, 0, 0, 2, '0000-00-00', 'wq0Tidg3D22YrZtLkyLMVHPd1iMt6gOgLJKX0VZA68mI82XXWGJMQIME4wJd', '2023-05-11 23:34:13', '2023-05-11 23:34:13', NULL, NULL, 0),
(1717, 'Minnel', 'FC', 'MI 0001', '2023-05-01', 1, 2, 5, 6, NULL, 'mi@tamilsport.app', NULL, NULL, NULL, NULL, 'male', '', NULL, NULL, NULL, NULL, '$2y$10$ZEakWe/6aOiSePyw3fpVsOUPdY3atkCZ/Z.3hO0505wAnNas71chG', NULL, NULL, 0, 0, 2, '0000-00-00', 'mW11yQb9N2HQWRPC8b4SOJwcVbJLSpV8s008SnPxW22dWzuaOjU5tzr0DoV1i2uv', '2023-05-11 23:36:37', '2023-05-11 23:36:37', NULL, NULL, 0),
(1718, 'Lorenskog', 'Tamil Sportsklubb', 'LR 0001', '2023-05-01', 1, 2, 5, 5, NULL, 'lr@tamilsport.app', NULL, NULL, NULL, NULL, 'male', '', NULL, NULL, NULL, NULL, '$2y$10$2d/rHZTNhI/DpALdiX9s6exUaV5cp0.JKv1hPZRuk0e2Xv0DU5hpS', NULL, NULL, 0, 0, 2, '0000-00-00', 'BSGFfHw4BbQb1466khCJUqG5zRkiO1izqazs2p7e2CiBdpg0eh3FXOnpRI6z', '2023-05-11 23:38:53', '2023-05-11 23:38:53', NULL, NULL, 0),
(1719, 'Ianthalir', 'Sports Club', 'IA 0001', '2023-05-01', 1, 2, 5, 4, NULL, 'il@tamilsport.app', NULL, NULL, NULL, NULL, 'male', '', NULL, NULL, NULL, NULL, '$2y$10$dBJ5EfQm7QaSNZFjGWWQ8uoPdSZgoUWyu86iMcK/zqm0o6x.9NFZa', NULL, NULL, 0, 0, 2, '0000-00-00', '6RxPvC8GBcX7WgpGFTWu4WiKNRELCav2JybmJ1Y4d7C43S7xgxjVPN3ZVMZ3pkJK', '2023-05-11 23:41:14', '2023-05-11 23:41:14', NULL, NULL, 0),
(1720, 'Shanmugathas', 'Asaippillai', 'LR 0002', '1970-04-16', 1, 2, 5, 5, NULL, 'shanmugathas@hotmail.com', NULL, NULL, NULL, NULL, 'male', '90591358', NULL, NULL, NULL, NULL, '$2y$10$6Va6bKbkeqAOdvH8rcDbguWJ9FypXnwY/K/eJaAzUpcVTzTO6OvEq', NULL, NULL, 0, 0, 2, '0000-00-00', 's4uW9sliAvJTsmdNFUBIuXxgxVqfbauud5fjjO8mJaG9oYebNnlimNdMpoiU', '2023-05-11 23:48:42', '2023-05-23 21:00:07', NULL, NULL, 0),
(1721, 'Inthujan', 'Inthu', 'EL 0002', '1995-08-18', 1, 2, 5, 2, NULL, 'inthujanjan@gmail.com', NULL, NULL, NULL, NULL, 'male', '12345678', NULL, NULL, NULL, NULL, '$2y$10$ySTcNAexYObYui2SD82n/egTi/KCmNEa5j.YC4LCyrsQU1td0PASC', NULL, NULL, 0, 0, 2, '0000-00-00', 'OdKE0I5mWY8e5IWXJIw8oH0eJOXIvkiVY2vWcKWRwcV6xMha6IquYG2gNuIzD4zM', '2023-05-12 08:58:03', '2023-05-12 09:00:24', NULL, NULL, 0),
(1723, 'Anton', 'roy', 'TC 0003', '1993-06-04', 1, 2, 5, 1, NULL, 'antonroy68@gmail.com', NULL, NULL, NULL, NULL, 'male', '12345687', NULL, NULL, NULL, NULL, '$2y$10$jN4Xv8MPAaYPnQ4fszssSeXp3/NmpUSWzB7W8ALm9QHqNNmoQhGTC', NULL, NULL, 0, 0, 2, '0000-00-00', 'DnkJ5VdYSuyWB6bXCBfEL3GsDdBCqI7AdiUXfVHuE7Ijs1ECLxeQb0vUkyuC', '2023-05-12 11:46:09', '2023-05-12 11:46:47', NULL, NULL, 0),
(1724, 'Unknown', 'Unknown', 'NO 0002', '1977-01-01', 10, 2, 5, 7, NULL, NULL, '', '', '', NULL, 'male', '', NULL, '', '', NULL, '$2y$10$DYa.1pfwgsJErSm3Qr/gveEdhqqMDF8xyQvW91r6ghlvPKo0lqPFa', NULL, NULL, 1, 0, 2, '0000-00-00', 'lL2eeOkOyN2BsJHdYK4RooyLnw8PF93xiK2oLonnqxA83aWnhjN1gciomHFe', '2023-05-12 12:06:38', '2023-06-05 10:29:07', NULL, NULL, 0),
(1725, 'Nilavan', 'Thayaparan', 'NO 0003', '2010-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1724, 0, 0, 2, '0000-00-00', NULL, '2023-05-12 12:08:41', '2023-05-12 12:08:41', NULL, NULL, 0),
(1726, 'Vaithehi', 'Thayaparan', 'NO 0004', '2007-01-01', 1, 2, 5, 7, NULL, NULL, '', '', '', NULL, 'female', '', NULL, '', '', NULL, NULL, NULL, 1724, 1, 0, 2, '0000-00-00', NULL, '2023-05-12 12:09:04', '2023-05-22 21:45:16', NULL, NULL, 0),
(1727, 'Unknown', 'Unknown', 'NO 0005', '1990-01-01', 10, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1724, 0, 0, 2, '0000-00-00', NULL, '2023-05-12 12:10:02', '2023-06-01 14:58:56', NULL, NULL, 0),
(1728, 'Unknown', 'Unknown', 'LR 0003', '2001-01-01', 10, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1720, 0, 0, 2, '0000-00-00', NULL, '2023-05-12 23:04:05', '2023-05-23 21:21:00', NULL, NULL, 0),
(1729, 'Unknown', 'Unknown', 'LR 0004', '2001-08-26', 10, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '90591358', NULL, NULL, NULL, NULL, '$2y$10$VqEpvzkWGih6PRbeif553./SfHnp9chGGXXOkCVemIvII1R9wMKTy', NULL, NULL, 0, 0, 2, '0000-00-00', NULL, '2023-05-20 14:11:27', '2023-06-03 12:58:15', NULL, NULL, 0),
(1730, 'Unknown', 'Unknown', 'LR 0005', '2001-08-26', 10, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '90591358', NULL, NULL, NULL, NULL, '$2y$10$Df7X2NFz5bgAz.PpV84bfem8iYqEI2RVnvexkY9GYJmeGhGzs1aTW', NULL, NULL, 0, 0, 2, '0000-00-00', NULL, '2023-05-20 14:13:22', '2023-05-23 20:57:44', NULL, NULL, 0),
(1731, 'Unknown', 'Unknown', 'LR 0006', '2001-08-26', 10, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '90591358', NULL, NULL, NULL, NULL, '$2y$10$1dTJwgZEzGiHYW1R9ErlNOeE7QqrOn/RXXppDuchaGilTikE3V8Zi', NULL, NULL, 0, 0, 2, '0000-00-00', NULL, '2023-05-20 14:13:22', '2023-05-23 20:57:40', NULL, NULL, 0),
(1732, 'Meera', 'Sockalingam', 'NO 0006', '1979-01-01', 1, 2, 5, 7, NULL, NULL, '', '', '', NULL, 'female', '99873318', NULL, '', '', NULL, NULL, NULL, NULL, 1, 0, 2, '0000-00-00', '8W43n7iLt89tLWPkVKYWPpkjLzKcgtJSoUMjh5UsGAw0yACGV2FbcfXm1ZVWJr39', '2023-05-22 21:35:48', '2023-05-22 21:45:35', NULL, NULL, 0),
(1733, 'Unknown', 'Unknown', 'NO 0007', '2009-01-01', 10, 2, 5, 7, NULL, NULL, 'Benard Roxan', 'broxan@yahoo.com', '+4796959770', NULL, 'female', '', NULL, 'oslo', 'stovnerveien 52b', NULL, NULL, NULL, NULL, 1, 0, 2, '0000-00-00', 'k8wiT2J2zQe4NRWQmWBPDxhaBZR9iwyqyXmDBnjyNAMdSw7OVJiYSYKzKYW7ffsQ', '2023-05-22 21:38:17', '2023-06-05 21:31:05', NULL, NULL, 0),
(1734, 'Unknown', 'Unknown', 'NO 0008', '2015-01-01', 10, 2, 5, 7, NULL, NULL, 'Benard Roxan', 'broxan@yahoo.com', '96959770', NULL, 'male', '', NULL, '', '', NULL, NULL, NULL, NULL, 1, 0, 2, '0000-00-00', 'Gm5s8KJY0On8F2y4dfAk2FbBuPlBRw4N0aLYPVF6FUhqL8tSubzXQZBqg0RBgk67', '2023-05-22 21:40:39', '2023-06-05 21:31:41', NULL, NULL, 0),
(1735, 'Bernard', 'Wasanthakumar', 'NO 0009', '1975-01-01', 1, 2, 5, 7, NULL, NULL, '', '', '', NULL, 'male', '', NULL, '', '', NULL, NULL, NULL, NULL, 1, 0, 2, '0000-00-00', 'SM6YcG83dATzYVk0NFxwQLMJMhTYkrRsz4AiwfUu8YngworWey9tWBzpkVUvgh6Q', '2023-05-22 21:43:07', '2023-05-22 21:46:14', NULL, NULL, 0),
(1736, 'Shan', 'A', 'TC 0004', '1970-01-01', 1, 2, 5, 1, NULL, 'shanmugathas@gmail.com', NULL, NULL, NULL, NULL, 'male', '90591358', NULL, NULL, NULL, NULL, '$2y$10$cC1I3xF0kOdtGgBsGdkHNeKGJVgBAP6Zh5GcSVoPRo7fd/YdYaZ5y', NULL, NULL, 0, 0, 2, '0000-00-00', 'Y9EpXByRJjaDkUEWsBq9rkxfHn3VA6aFuQX4t2IkOXLT1Ak4Hu8UGAE3Nvmm', '2023-05-23 20:46:11', '2023-05-23 20:52:37', NULL, NULL, 0),
(1737, 'Unknown', 'Unknown', 'LR 0007', '2015-09-10', 10, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'osEzdFnvPmxRy5CZeWvPBJ5h75mNVyu7gYYnpf65qpIqYrw8XkHDFqDPjqIrxjr6', '2023-05-23 21:25:02', '2023-05-23 22:00:37', NULL, NULL, 0),
(1738, 'Unknown', 'Unknown', 'LR 0008', '2011-12-01', 10, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'Djuc7mudAhUBHq0lqj1kjCCIXWLeY3lKb7ymY0rPpZ1sIcr5U5KsCSfxT8KY3Ibw', '2023-05-23 22:02:20', '2023-05-23 22:03:45', NULL, NULL, 0),
(1739, 'Steffany', 'Thomas', 'EL 0003', '1992-04-15', 1, 2, 5, 2, NULL, 'steffany_thomas@hotmail.com', NULL, NULL, NULL, NULL, 'female', '95871417', NULL, NULL, NULL, NULL, '$2y$10$BRoPIhIW1O1g1k5eVM9onu6kg.rUzrGwDa3st7.i6MRu2vPZwp/0u', NULL, NULL, 0, 0, 2, '0000-00-00', 'xRspran6mVIulwki1apKlRS3qrpJAgK6H9y7ZHDn8fIsDdyXDBTOYL2VMHPgGUIw', '2023-05-23 22:11:18', '2023-05-23 22:11:53', NULL, NULL, 0),
(1740, 'Thilakesan', 'Sanmuganathan', 'YO 0002', '1979-10-06', 1, 2, 5, 12, NULL, 'youngstarsil2023@gmail.com', NULL, NULL, NULL, NULL, 'male', '92827406', NULL, NULL, NULL, NULL, '$2y$10$zsw.kbKfQnevR/zXH01ZCuFiHdU51NZYjFkFeD/oJYtFum3padFNS', NULL, NULL, 0, 0, 2, '0000-00-00', 'GwQvgfhNVxpwZqT3JfDfsQefB76o94tDDSkEPMxYXMRRVaNUVTQnMgDrcsT0', '2023-05-24 06:34:57', '2023-05-24 06:35:25', NULL, NULL, 0),
(1741, 'Inpanathan', 'Karunainathan', 'SE 0002', '1970-04-14', 1, 2, 5, 10, NULL, 'inpank@hotmail.com', NULL, NULL, NULL, NULL, 'male', '91733681', NULL, NULL, NULL, NULL, '$2y$10$KCfqovwcowKu7PCVC3K1kOttXhsyyOTFQBnbcL6ZYzME4iISdM.jG', NULL, NULL, 0, 0, 2, '0000-00-00', 'OTiS4vRirmKLelSVZwAONiaK3M3ywbhpvCGzZNsMWMrGh3BNmqb1JYUlVyNd', '2023-05-24 07:18:16', '2023-05-24 07:18:40', NULL, NULL, 0),
(1742, 'Meera', 'Sockalingam', 'NO 0010', '1979-11-24', 1, 2, 5, 7, NULL, 'meera79so@gmail.com', NULL, NULL, NULL, NULL, 'female', '99873318', NULL, NULL, NULL, NULL, '$2y$10$lZ/to.t5LQ2BuPVh8Kh.TeC/D1eQBFjaeNUF.ODdVPDAm0/1SCY3a', NULL, NULL, 0, 0, 2, '0000-00-00', 'tkEvODKazFlk3ARoWvN80nVBDBLzI5PKcGEdxuY5kZX2YjAlm8lUKoOD9gdf', '2023-05-24 07:38:06', '2023-05-24 07:39:02', NULL, NULL, 0),
(1743, 'Thanushan', 'Rajanayagam', 'LR 0009', '1973-04-16', 1, 2, 5, 5, NULL, 'thanushan.rajan@gmail.com', NULL, NULL, NULL, NULL, 'male', '46412599', NULL, NULL, NULL, NULL, '$2y$10$BnJLxVkghriPsazWpGP4bu6/QFZRzE.ZQLM0vWNvsUx4yRfm5fh8.', NULL, NULL, 0, 0, 2, '0000-00-00', 'YhIeevrg0kwU4yHy03egaUpAYuJdID11J56Yazqf384iYEu0Jwmzujht5e6n', '2023-05-24 09:04:26', '2023-05-24 09:06:09', NULL, NULL, 0),
(1744, 'Sthephan', 'Thevathasan', 'EV 0002', '1968-07-28', 1, 2, 5, 3, NULL, 'stheva@online.no', NULL, NULL, NULL, NULL, 'male', '97616992', NULL, NULL, NULL, NULL, '$2y$10$0EibuqxrwhCeUjvYwaC.WOyWfz.VaLZ.9mUYCIqJnuEXoaBOBQKM6', NULL, NULL, 0, 0, 1, '0000-00-00', '6DdJSOTpF0d71gxTzGEFDC8ochlzkSXnJ67xLYVyaO41od1pO5Qpcn2ZhwjbNXAN', '2023-05-25 10:51:55', '2023-05-25 10:51:55', NULL, NULL, 0),
(1745, 'Titto', 'Rudramoorthy', 'NS 0002', '1969-07-29', 1, 2, 5, 8, NULL, 'rtitto@hotmail.com', NULL, NULL, NULL, NULL, 'male', '95140984', NULL, NULL, NULL, NULL, '$2y$10$K7X6ngerz1eXVi4wgxo8jebKuJHTC24w7l/kx.yvwVRgD0VI8ouQG', NULL, NULL, 0, 0, 2, '0000-00-00', 'WScVoUm8ePEzDvbOHaUWeU8N08l9S3WwWuQyszGM7eeZyJmB8pb9jHtBvDYW', '2023-05-25 15:45:04', '2023-05-25 15:49:24', NULL, NULL, 0),
(1746, 'Saravanamuthu', 'vimal', 'EV 0003', '1967-04-18', 1, 2, 5, 3, NULL, 'vimal9999@hotmail.com', NULL, NULL, NULL, NULL, 'male', '91172682', NULL, NULL, NULL, NULL, '$2y$10$CtepYN9vU6YiT3VF.pFoHupn.P2zy2n6cBaiC8niCGDYzx2B9jgXC', NULL, NULL, 0, 0, 2, '0000-00-00', 'j1OdjqErzFyHs59QuTtSW1cKQldmuIaFgAjqOfXhnYVaPy7SMF7W1ZJJjp6a', '2023-05-26 06:10:47', '2023-05-30 18:41:22', NULL, NULL, 0),
(1747, 'Nagulathas', 'Arumainayagam', 'SE 0003', '1984-05-15', 1, 2, 5, 10, NULL, 'Nakulathas@gmail.com', NULL, NULL, NULL, NULL, 'male', '40160590', NULL, NULL, NULL, NULL, '$2y$10$XeISuDNkoy7Ef69celXjVepsC5v25ibgkXA3lFAbhAQ6IERbAEM/i', NULL, NULL, 0, 0, 2, '0000-00-00', '8MZzJG06T1aEeeCz0X15zYWAOcZOBlVpuQ3D18wCbcfmrgfe5U9sAlaJEaO5', '2023-05-26 13:28:52', '2023-05-26 13:41:59', NULL, NULL, 0),
(1748, 'Inush', 'Inpanathan', 'SE 0004', '2005-09-21', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '', NULL, '', '', NULL, NULL, NULL, NULL, 1, 0, 2, '0000-00-00', 'ueVinh47vlqFOjg0g2YRPJ0zE2nmqMFxwRtm0TZ0rkiuSSFXFlJ1cPw1wjMT0rw9', '2023-05-26 13:39:09', '2023-05-30 22:11:09', NULL, NULL, 0),
(1749, 'Shajana', 'Inpanathan', 'SE 0005', '2007-09-27', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', NULL, '', '', NULL, NULL, NULL, NULL, 1, 0, 2, '0000-00-00', 'Wc2InwCago3wdkgdd1h8Xwnswd33cBsRzHLN30AirIuqNNwEI4DdxhLhICTf1oZL', '2023-05-26 13:44:21', '2023-05-30 22:11:53', NULL, NULL, 0),
(1750, 'Daniyah', 'Nagulathas', 'SE 0006', '2015-02-07', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', NULL, '', '', NULL, NULL, NULL, 1747, 1, 0, 2, '0000-00-00', NULL, '2023-05-26 21:23:40', '2023-05-26 21:24:10', NULL, NULL, 0),
(1751, 'Ashviya', 'Nagulathas', 'SE 0007', '2011-04-16', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1747, 0, 0, 2, '0000-00-00', NULL, '2023-05-26 21:27:55', '2023-05-26 21:27:55', NULL, NULL, 0),
(1752, 'Thanushiya', 'Nalvelalagan', 'SE 0008', '1986-02-23', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1747, 0, 0, 2, '0000-00-00', NULL, '2023-05-26 21:36:19', '2023-05-26 21:36:19', NULL, NULL, 0),
(1753, 'Lalitha', 'Manoharan', 'SE 0009', '1986-11-15', 1, 2, 5, 10, NULL, 'lalitha.manoharan@hotmail.com', NULL, NULL, NULL, NULL, 'female', '41673045', NULL, NULL, NULL, NULL, '$2y$10$.0eL38SjtMHFUi77Xt51Fu/soGY7Uyaqpl4OPaZzVULI6hatadAnu', NULL, NULL, 0, 0, 2, '0000-00-00', 'cooCBnhCDDqfq0yb1fVau8QNsW4XmIxHAqq52QFSHu8SCQJ8l62uQfvqVMOW', '2023-05-27 15:44:13', '2023-05-27 15:44:47', NULL, NULL, 0),
(1754, 'Tharsikan', 'manoharan', 'SE 0010', '2014-01-01', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1753, 0, 0, 2, '0000-00-00', NULL, '2023-05-27 15:47:11', '2023-05-27 15:47:11', NULL, NULL, 0),
(1755, 'Niirusan', 'manoharn', 'SE 0011', '2016-11-02', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1753, 0, 0, 2, '0000-00-00', NULL, '2023-05-27 15:48:43', '2023-05-27 15:48:43', NULL, NULL, 0),
(1756, 'suntharaselvan', 'nadarajah', 'SE 0012', '1970-01-01', 1, 2, 5, 10, NULL, 'suntharnada@yahoo.no', NULL, NULL, NULL, NULL, 'male', '90966856', NULL, NULL, NULL, NULL, '$2y$10$FfF3mLQ4MLXicgAbT2e6R.aCVWsd2RYPVkIhWmqSCWaWx8k1835zG', NULL, NULL, 0, 0, 2, '0000-00-00', 'AWtbEZC3xqWvXPLVEU7OFW4yZskywHPms9VMQIxxUGuwo9GobnaldV6EkNFt', '2023-05-27 20:31:07', '2023-05-27 20:31:24', NULL, NULL, 0),
(1757, 'susitha', 'Suntharaselvan', 'SE 0013', '2008-09-01', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', NULL, '', '', NULL, NULL, NULL, 1756, 1, 0, 2, '0000-00-00', NULL, '2023-05-27 20:33:38', '2023-05-27 20:42:38', NULL, NULL, 0),
(1758, 'sunthari', 'Suntharaselvan', 'SE 0014', '1973-08-19', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1756, 0, 0, 2, '0000-00-00', NULL, '2023-05-27 20:35:12', '2023-05-27 20:35:12', NULL, NULL, 0),
(1759, 'suntharselvan', 'nadarajah', 'SE 0015', '1970-01-01', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1756, 0, 0, 2, '0000-00-00', NULL, '2023-05-27 20:37:36', '2023-05-27 20:37:36', NULL, NULL, 0),
(1760, 'jasmitha', 'Suntharaselvan', 'SE 0016', '2003-11-25', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1756, 0, 0, 2, '0000-00-00', NULL, '2023-05-27 20:38:20', '2023-05-27 20:38:20', NULL, NULL, 0),
(1761, 'lavitha', 'Suntharaselvan', 'SE 0017', '2001-09-08', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1756, 0, 0, 2, '0000-00-00', NULL, '2023-05-27 20:42:29', '2023-05-27 20:42:29', NULL, NULL, 0),
(1762, 'Thanesan', 'Sivanesan', 'SE 0018', '1979-04-14', 1, 2, 5, 10, NULL, 'thanesan@gmail.com', NULL, NULL, NULL, NULL, 'male', '40193935', NULL, NULL, NULL, NULL, '$2y$10$Q/t1/G6VBE0fjTR8v7jzoO1D/S0cn2M.OZrMBH7R2BhgEC330gNDS', NULL, NULL, 0, 0, 2, '0000-00-00', 'krNDDN1UpWrk29pXBvLM6Q4Nkev6lm0eDVsBcplWLqSIlqSjuGTbT7ISOB5c', '2023-05-28 11:12:11', '2023-05-28 11:12:56', NULL, NULL, 0),
(1763, 'Krisva', 'Thanesan', 'SE 0019', '2018-07-01', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '', NULL, '', '', NULL, NULL, NULL, 1762, 1, 0, 2, '0000-00-00', NULL, '2023-05-28 11:17:54', '2023-05-28 11:36:36', NULL, NULL, 0),
(1764, 'Julius', 'Francis', 'EL 0004', '1966-11-26', 1, 2, 5, 2, NULL, 'f-jinosha@hotmail.com', NULL, NULL, NULL, NULL, 'male', '94823192', NULL, NULL, NULL, NULL, '$2y$10$RNqI32mIxDV1Uy7L6tNDNenM6T/PHRfluFv15upcRufUnIK05E0Gq', NULL, NULL, 0, 0, 2, '0000-00-00', 'um8ZVBWJX7XKnG4s2NiIchcgTxxrxK9819rZMaZjifwA3rirX33aV9EAe250', '2023-05-28 15:42:58', '2023-05-28 15:43:30', NULL, NULL, 0),
(1765, 'Sathees', 'Thayaparan', 'SE 0020', '1983-07-02', 1, 2, 5, 10, NULL, 'satheest83@gmail.com', NULL, NULL, NULL, NULL, 'male', '96202557', NULL, NULL, NULL, NULL, '$2y$10$N.AuAr.syONgLcwuwn/1Q.ceJyHdCa3gO4cO90xoUpU67y4Y7IPJq', NULL, NULL, 0, 0, 2, '0000-00-00', 'h79oeXio0IVj1nlei9MTY76TtJYEYB6pViGFj88N9ywF0jo4QeKprIp4yX8Vpa9g', '2023-05-28 17:53:36', '2023-05-28 17:54:11', NULL, NULL, 0),
(1766, 'Ashwin', 'Sathees', 'SE 0021', '2011-09-12', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '', NULL, '', '', NULL, NULL, NULL, 1765, 1, 0, 2, '0000-00-00', NULL, '2023-05-28 18:00:16', '2023-05-28 18:01:04', NULL, NULL, 0),
(1767, 'Nirujan', 'Garithas', 'NO 0011', '1989-08-11', 1, 2, 5, 7, NULL, 'gnirujan@yahoo.no', NULL, NULL, NULL, NULL, 'male', '92499082', NULL, NULL, NULL, NULL, '$2y$10$mN.LFrbEmn0wuhe05yykP.h6RvrV2oMLnYuI1Jc./hi6d6klEx4ym', NULL, NULL, 0, 0, 2, '0000-00-00', 'W3Vgo8L0P7rlF6ZMJJoWn9OQXtETNvEdoG15DzTspHB6B2RbXZmBUGXYXwW3wNcu', '2023-05-29 19:00:53', '2023-05-29 19:01:19', NULL, NULL, 0),
(1768, 'Bastien', 'Mariyathas', 'ST 0002', '1985-02-04', 1, 2, 5, 11, NULL, 'bastian3@msn.com', NULL, NULL, NULL, NULL, 'male', '95304418', NULL, NULL, NULL, NULL, '$2y$10$9oHF4dHa3cFmNyPhbbuijeaHyPBZm.dNBayELZSzdRGb2KzSbxwHe', NULL, NULL, 0, 0, 2, '0000-00-00', 'RCCV3oJsvBMNweP0Cq8aQ5OJVyTT4BDNpHy3WH5NEmFKtRpntqXcI7cWm5siB155', '2023-05-29 21:42:42', '2023-05-29 21:42:54', NULL, NULL, 0),
(1769, 'Veron', 'Bastien', 'ST 0003', '2017-04-28', 1, 2, 5, 11, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1768, 0, 0, 2, '0000-00-00', NULL, '2023-05-29 21:48:27', '2023-05-29 21:48:27', NULL, NULL, 0),
(1770, 'Melina', 'Bastien', 'ST 0004', '2015-01-19', 1, 2, 5, 11, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', NULL, '', '', NULL, NULL, NULL, 1768, 1, 0, 2, '0000-00-00', NULL, '2023-05-29 21:49:02', '2023-05-29 21:50:24', NULL, NULL, 0),
(1771, 'Mary Diana', 'Bastien', 'ST 0005', '1986-04-23', 1, 2, 5, 11, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1768, 0, 0, 2, '0000-00-00', NULL, '2023-05-29 21:49:54', '2023-05-29 21:49:54', NULL, NULL, 0),
(1772, 'Mary Diana', 'Bastien', 'ST 0006', '1986-04-23', 1, 2, 5, 11, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1768, 0, 0, 2, '0000-00-00', NULL, '2023-05-29 21:49:54', '2023-05-29 21:49:54', NULL, NULL, 0),
(1773, 'Osticka', 'Jeffrin', 'EL 0005', '1988-05-17', 1, 2, 5, 2, NULL, 'ostikka@gmail.com', NULL, NULL, NULL, NULL, 'female', '45391303', NULL, NULL, NULL, NULL, '$2y$10$HW/LmWbSHQCtYOfX.emiiuVH6gmFzIx7pKjXN96C7paPxEtM06zIy', NULL, NULL, 0, 0, 2, '0000-00-00', 'lopcCc3MG2Cfh8Fpb1avMUTNunk2Dx951ujTmUHLbo7PqLXqdtecn7iqh6Tz', '2023-05-29 22:27:53', '2023-05-29 22:28:53', NULL, NULL, 0),
(1774, 'Theepa', 'Loganathan', 'EL 0006', '1982-06-09', 1, 2, 5, 2, NULL, 'meenosha@hotmail.com', NULL, NULL, NULL, NULL, 'female', '48500215', NULL, NULL, NULL, NULL, '$2y$10$RV1m5H7hl8ojocj6iTkvFu6wztmK1UpDqYdX1MaLP2Q21KDnqevma', NULL, NULL, 0, 0, 2, '0000-00-00', 'boWPy3DnhVhuxtgTZB8LB4FlrwEMXmHokyKFYIzxo3lqMnCDiER9FQAzEcDvFam8', '2023-05-29 23:33:09', '2023-05-29 23:35:16', NULL, NULL, 0),
(1775, 'Anjalika', 'Paul', 'EL 0007', '2010-02-05', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', NULL, '', '', NULL, NULL, NULL, 1774, 1, 0, 2, '0000-00-00', NULL, '2023-05-29 23:37:40', '2023-06-01 10:02:31', NULL, NULL, 0),
(1776, 'Leah Anjana', 'Paul', 'EL 0008', '2012-09-05', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', NULL, '', '', NULL, NULL, NULL, 1774, 1, 0, 2, '0000-00-00', NULL, '2023-05-29 23:38:13', '2023-06-01 10:01:53', NULL, NULL, 0),
(1777, 'Baden Paul', 'Anthonipillai', 'EL 0009', '1974-07-04', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1774, 0, 0, 2, '0000-00-00', NULL, '2023-05-29 23:42:02', '2023-05-29 23:42:02', NULL, NULL, 0),
(1778, 'Vijayatheeban', 'Sivaputhiran', 'NO 0012', '1982-12-26', 1, 2, 5, 7, NULL, 'theeban12@outlook.com', NULL, NULL, NULL, NULL, 'male', '47151680', NULL, NULL, NULL, NULL, '$2y$10$FEuobFwck9O7ZNYutH1L7ug4LXtBJkxJ9xW2UD4kSorQ/UOy9BCOS', NULL, NULL, 0, 0, 2, '0000-00-00', 'lhoLowPRzr5No5DZRsUHxjvmzvPSKWVcPfHuXYyjkSaUNRuwyGvY3VgZEh3V', '2023-05-30 14:35:23', '2023-05-30 14:35:45', NULL, NULL, 0),
(1779, 'Riyan', 'Vijayatheeban', 'NO 0013', '2012-09-26', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '', NULL, '', '', NULL, NULL, NULL, 1778, 1, 0, 2, '0000-00-00', NULL, '2023-05-30 14:37:21', '2023-05-30 14:38:18', NULL, NULL, 0),
(1780, 'Anika', 'Vijayatheeban', 'NO 0014', '2014-10-06', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1778, 0, 0, 2, '0000-00-00', NULL, '2023-05-30 14:37:55', '2023-05-30 14:37:55', NULL, NULL, 0),
(1781, 'Juwachim', 'Reginold', 'NS 0003', '1965-01-31', 1, 2, 5, 8, NULL, 'jreg2007@gmail.com', NULL, NULL, NULL, NULL, 'male', '45030732', NULL, NULL, NULL, NULL, '$2y$10$tFNGuolmc/eisERObUNEIOaN.Ty8eZraU4YqBZmd2pBPNjHKZa9ga', NULL, NULL, 0, 0, 2, '0000-00-00', '3ZARKyGFApGvn0TNBTyeIk3wQtXh0dZnCrfeC9YYbLAdy7cgHSRJgcbNd3tB0536', '2023-05-30 18:42:23', '2023-05-30 18:43:00', NULL, NULL, 0),
(1782, 'GOWRISHANGAR', 'MAHADEVAN', 'LR 0010', '1972-09-05', 1, 2, 5, 5, NULL, 'gowrishangar_m@yahoo.com', NULL, NULL, NULL, NULL, 'male', '94485875', NULL, NULL, NULL, NULL, '$2y$10$HL76vhbCye.obj0XH2OAXufyn8g8VbqHcKlUqDetMjGC/7NLN4xTa', NULL, NULL, 0, 0, 1, '0000-00-00', 'jOuhumsGWKZbhSCvi08cJ8KC2AVyMIis0cZ8Xg3YCiv7hfhamE1KMgZSnWZSEKxG', '2023-05-30 19:22:46', '2023-06-13 14:01:59', NULL, NULL, 0),
(1783, 'Velummylum', 'Stalinkumar', 'LR 0011', '1979-07-15', 1, 2, 5, 5, NULL, 'vskumar2012@hotmail.com', NULL, NULL, NULL, NULL, 'male', '40175408', NULL, NULL, NULL, NULL, '$2y$10$3TV.YrF/ekXiiv5ryvhHcOtLy8hdVHJMQR1p1/cOrk6ZvGXTgC73.', NULL, NULL, 0, 0, 2, '0000-00-00', 'E5HLztAkmrHQRigRRdDJcCAUWwLMFa3AJL3e7RkGf65N2rkRD1rP9JUfx54R3tVg', '2023-05-30 19:59:07', '2023-05-30 19:59:47', NULL, NULL, 0),
(1784, 'Yaatavii', 'Stalinkumar', 'LR 0012', '2012-12-13', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', NULL, '', '', NULL, NULL, NULL, 1783, 1, 0, 2, '0000-00-00', NULL, '2023-05-30 20:03:23', '2023-05-30 20:06:36', NULL, NULL, 0),
(1785, 'Thayalan', 'Stalinkumar', 'LR 0013', '2015-10-14', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1783, 0, 0, 2, '0000-00-00', NULL, '2023-05-30 20:04:05', '2023-05-30 20:04:05', NULL, NULL, 0),
(1786, 'Unknown', 'Unknown', 'LR 0014', '2012-12-13', 10, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', NULL, '', '', NULL, NULL, NULL, 1783, 1, 0, 2, '0000-00-00', NULL, '2023-05-30 20:05:26', '2023-06-13 20:52:46', NULL, NULL, 0),
(1787, 'Prasanna', 'Ravi', 'LR 0015', '1983-02-02', 1, 2, 5, 5, NULL, 'prasanna0202@hotmail.com', NULL, NULL, NULL, NULL, 'male', '45812948', NULL, NULL, NULL, NULL, '$2y$10$2/oZM7g4L2VVJAuRfd865uHFVrak0SwuH6IfSfU8XwWjg.S2Rx20y', NULL, NULL, 0, 0, 2, '0000-00-00', 'BCHOr3afHOaE9Hy8RV4k2GsvExOPle3qn46BhjjNjTD83IM8EIWxGWcdq5MFRQvq', '2023-05-30 20:17:55', '2023-05-30 20:19:06', NULL, NULL, 0),
(1788, 'Suganthan', 'Sivanesan', 'EL 0010', '1973-08-12', 1, 2, 5, 2, NULL, 'suraby@yahoo.com', NULL, NULL, NULL, NULL, 'male', '93240461', NULL, NULL, NULL, NULL, '$2y$10$nSB5x8bnBtPYVgEGA97TLOL2XoeD.qmcSqmP8VVtwwc3.ZTFhvr9S', NULL, NULL, 0, 0, 2, '0000-00-00', 'GQeZayczWnhOzTqaxAhaFmG4FB9bQyYEZxUJVfjbitnZOONmqx29EDKuz6gp', '2023-05-30 22:21:31', '2023-05-30 22:25:08', NULL, NULL, 0),
(1789, 'Abinaya', 'Suganthan', 'EL 0011', '2005-05-25', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1788, 0, 0, 2, '0000-00-00', NULL, '2023-05-30 22:29:03', '2023-05-30 22:29:03', NULL, NULL, 0),
(1790, 'Arthi', 'Suganthan', 'EL 0012', '2008-09-16', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1788, 0, 0, 2, '0000-00-00', NULL, '2023-05-30 22:30:03', '2023-05-30 22:30:03', NULL, NULL, 0),
(1791, 'Akila', 'Rajess', 'TC 0005', '1988-06-12', 1, 2, 5, 1, NULL, 'akinathan88@gmail.com', NULL, NULL, NULL, NULL, 'female', '94206364', NULL, NULL, NULL, NULL, '$2y$10$wDtsoSXo2BVE6Cd0gJR13Ozf.JiF5cePMlsHI7W0wVirVrDH44xMi', NULL, NULL, 0, 0, 1, '0000-00-00', 'IQw2ECHwpCxqEe2OC5qSQdID9R6CxJDEhunfmYieO5hWHae4OvxQFKDHVQU4k3Bi', '2023-05-31 20:30:58', '2023-05-31 20:30:58', NULL, NULL, 0),
(1792, 'Gunenthiran', 'Ariyadasan', 'ST 0007', '1975-12-19', 1, 2, 5, 11, NULL, 'gunen_75@hotmail.com', NULL, NULL, NULL, NULL, 'male', '41673165', NULL, NULL, NULL, NULL, '$2y$10$QwXM7RMWBcTdzbVPGH0nR.mNKwS0G0/1oPEEqDYKep.Hp25h2x6fO', NULL, NULL, 0, 0, 2, '0000-00-00', 'B37Moj1Bq2I0D7gk3CJYH4U5qF8cLGSUXfniKTE9J7iuQRdmT8EpH59E5yEpaP8b', '2023-05-31 22:36:53', '2023-06-13 00:24:46', NULL, NULL, 0),
(1793, 'Taksansing', 'Gunenthiran', 'ST 0008', '2010-07-20', 1, 2, 5, 11, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1792, 0, 0, 2, '0000-00-00', NULL, '2023-05-31 22:44:51', '2023-05-31 22:44:51', NULL, NULL, 0),
(1794, 'Anjalika', 'Baden', 'EL 0013', '2010-02-05', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1774, 0, 0, 2, '0000-00-00', NULL, '2023-06-01 09:55:21', '2023-06-01 09:55:21', NULL, NULL, 0),
(1795, 'Annshalika', 'Roman Antony', 'EL 0014', '1989-08-29', 1, 2, 5, 2, NULL, 'annshalika89@hotmail.com', NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, '$2y$10$p9kx1ueBT18oXGQZdYyz/OL0IrjPSWompoXEtTx0K4MaaHFvFOEZ2', NULL, NULL, 0, 0, 2, '0000-00-00', 'wp7qKU94haEMb0KHHspIfeSPiLJiMB6sVtGFxHmorFjhrQY4eo5xZkW4LxEZ6TuE', '2023-06-01 12:27:22', '2023-06-02 17:15:20', NULL, NULL, 0),
(1796, 'Harikrishnan', 'Natarajan', 'ST 0009', '1989-04-28', 1, 2, 5, 11, NULL, 'hari.nata@putlook.com', NULL, NULL, NULL, NULL, 'male', '94715055', NULL, NULL, NULL, NULL, '$2y$10$uU7r7RR9e3PAojXh9JfSwenK4sVzWf5uv.XhT3IzIUbTrMX1ZWRLm', NULL, NULL, 0, 0, 1, '0000-00-00', 'NFPZ14BLFM6d2v7AhWhs3htpdND9wGSZUUVc7zZZms8FmLQdgBTOox6tz4YxsF9N', '2023-06-01 13:48:16', '2023-06-01 13:48:16', NULL, NULL, 0),
(1797, 'Mary B Antonipillai', 'Antonipillai', 'EL 0015', '1969-02-14', 1, 2, 5, 2, NULL, 'mary.antonipillai@iss.no', NULL, NULL, NULL, NULL, 'female', '40051832', NULL, NULL, NULL, NULL, '$2y$10$7R99H/X7fNWupPSdpymGwu2zHi.VJq9wVlVjuiFhiuGkn3fc7Seuq', NULL, NULL, 0, 0, 2, '0000-00-00', 'AJyRbxWRSA2FX7aW0My8fdXr3P75VZc4KyWom9WT6BzGtKZEkTx1U8rr7bd4qsc5', '2023-06-01 14:28:14', '2023-06-01 14:28:37', NULL, NULL, 0),
(1798, 'Tharshanth', 'Sriskandarajah', 'NO 0015', '1983-03-04', 1, 2, 5, 7, NULL, 'tshanthsri@gmail.com', NULL, NULL, NULL, NULL, 'male', '40177236', NULL, NULL, NULL, NULL, '$2y$10$t.4YhNvlzZMKGtU85UF9WOkMHugX7dKU77tPjHDeefR1JtQBfjgQy', NULL, NULL, 0, 0, 2, '0000-00-00', 'fxAyks7X3dTLCZvTRSDxlxhSozKQtYDigzgdqtPgjKsjZp5kxS0INGHK2X7Qqdvk', '2023-06-01 19:49:56', '2023-06-13 23:08:19', NULL, NULL, 0),
(1799, 'Tharshan', 'indran', 'NO 0016', '1981-05-23', 1, 2, 5, 7, NULL, 'tharshan_i@hotmail.com', NULL, NULL, NULL, NULL, 'male', '40057171', NULL, NULL, NULL, NULL, '$2y$10$VJ4gEkA2IXHBig5gZl0aG.UFEwSrPS7TsYIT6CXoG.O5Wc5KjSV2u', NULL, NULL, 0, 0, 2, '0000-00-00', 'F2m7gvlxRe2U46i39ueyGQx0GzpTnb70aQ559liiJszqgcw2oYW2ygiZUOIvxlCS', '2023-06-01 19:53:20', '2023-06-01 19:53:33', NULL, NULL, 0),
(1800, 'Aarush', 'Tharshanth', 'NO 0017', '2015-09-04', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1798, 0, 0, 2, '0000-00-00', NULL, '2023-06-01 19:54:10', '2023-06-01 19:54:10', NULL, NULL, 0),
(1801, 'Nithin', 'Tharshan', 'NO 0018', '2014-01-27', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1799, 0, 0, 2, '0000-00-00', NULL, '2023-06-01 19:54:50', '2023-06-01 19:54:50', NULL, NULL, 0),
(1802, 'Nainika', 'Tharshan', 'NO 0019', '2017-03-24', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1799, 0, 0, 2, '0000-00-00', NULL, '2023-06-01 19:55:21', '2023-06-01 19:55:21', NULL, NULL, 0),
(1803, 'Roxan', 'bernard', 'NO 0020', '1975-04-11', 1, 2, 5, 7, NULL, 'broxan@yahoo.com', NULL, NULL, NULL, NULL, 'male', '96959770', NULL, NULL, NULL, NULL, '$2y$10$G.OxulwJnlDsqTRj6PQziudb.FRXdXrP5ZZMdVBcuZ/YaxwjyNneO', NULL, NULL, 0, 0, 2, '0000-00-00', 'QgY5VdvBlctYAl656dt0OuhDiLZVMTm3seIXF9w7dJuXsH2Qk8sl00b5B1ln', '2023-06-01 20:05:25', '2023-06-01 20:30:55', NULL, NULL, 0),
(1804, 'Janarthanan', 'Selvaratnam', 'NO 0021', '1984-04-01', 1, 2, 5, 7, NULL, 'bj2019as@gmail.com', NULL, NULL, NULL, NULL, 'male', '99892300', NULL, NULL, NULL, NULL, '$2y$10$RsSew/LsjFb6egeOVji6Fuicx/XTA2U5WJ7/ps7nHFkyAL.5i7X5e', NULL, NULL, 0, 0, 2, '0000-00-00', 'dSbb33FNSFBK9GqWo8sIButV8oOBAZHiEB5U6gsTHXWq2gOW4DgQv5HXk1y0XFog', '2023-06-01 20:24:12', '2023-06-01 20:27:48', NULL, NULL, 0),
(1805, 'Jevin', 'Janarthanan', 'NO 0022', '2014-11-26', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1804, 0, 0, 2, '0000-00-00', NULL, '2023-06-01 20:30:57', '2023-06-01 20:30:57', NULL, NULL, 0),
(1806, 'Morisha', 'Roxan', 'NO 0023', '2009-08-22', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', NULL, '', '', NULL, NULL, NULL, 1803, 1, 0, 2, '0000-00-00', NULL, '2023-06-01 20:32:01', '2023-06-01 20:32:12', NULL, NULL, 0),
(1807, 'Bavin', 'Janarthanan', 'NO 0024', '2013-04-23', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1804, 0, 0, 2, '0000-00-00', NULL, '2023-06-01 20:32:03', '2023-06-01 20:32:03', NULL, NULL, 0),
(1808, 'Suthesan', 'Roxan', 'NO 0025', '2015-03-22', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1803, 0, 0, 2, '0000-00-00', NULL, '2023-06-01 20:44:09', '2023-06-01 20:44:09', NULL, NULL, 0),
(1809, 'Thulasi', 'Janarthanan', 'NO 0026', '1984-10-25', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1804, 0, 0, 2, '0000-00-00', NULL, '2023-06-01 23:19:21', '2023-06-01 23:19:21', NULL, NULL, 0),
(1810, 'Sutharsan', 'Indran', 'NO 0027', '1982-05-22', 1, 2, 5, 7, NULL, 'Sutharsh22@gmail.com', NULL, NULL, NULL, NULL, 'male', '48055207', NULL, NULL, NULL, NULL, '$2y$10$6zd4qtDFdKYZv6J7I19MZeR7yGGYJt0GuU7B5LyWnytP5OoCGXMaO', NULL, NULL, 0, 0, 2, '0000-00-00', 'sW1fJW1ynTCV3wooKkB0qMIvRbsmVYs46aF6UKtWBcJ7tDE2eazdvB7HB7cMvpY1', '2023-06-02 06:09:01', '2023-06-02 06:09:29', NULL, NULL, 0),
(1811, 'Rithish', 'Sutharsan', 'NO 0028', '2014-05-02', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1810, 0, 0, 2, '0000-00-00', NULL, '2023-06-02 06:11:33', '2023-06-02 06:11:33', NULL, NULL, 0),
(1812, 'Vinish', 'Sutharsan', 'NO 0029', '2016-07-31', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1810, 0, 0, 2, '0000-00-00', NULL, '2023-06-02 06:11:58', '2023-06-02 06:11:58', NULL, NULL, 0),
(1813, 'Mathura', 'Chandrakumar', 'PR 0002', '2007-03-29', 1, 2, 5, 9, NULL, 'shoba_siva@hotmail.com', NULL, NULL, NULL, NULL, 'female', '47994316', NULL, NULL, NULL, NULL, '$2y$10$xBLJH83m7xd2XfhjZhFP5e46dw8YZ9qJya5F3YDbc5xRTDeSG8KIy', NULL, NULL, 0, 0, 2, '0000-00-00', 'OFnJKstffS473NpBLprGKUXPvzssBtkX5pf5TGaejQvdGaidEnbfiPZOlJqg', '2023-06-02 09:16:02', '2023-06-02 09:17:09', NULL, NULL, 0),
(1814, 'Hari', 'Chandrakumar', 'PR 0003', '2011-01-14', 1, 2, 5, 9, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1813, 0, 0, 2, '0000-00-00', NULL, '2023-06-02 10:15:37', '2023-06-02 10:15:37', NULL, NULL, 0),
(1815, 'Unknown', 'Unknown', 'TC 0006', '1970-11-24', 10, 2, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '98430219', NULL, NULL, NULL, NULL, '$2y$10$W3/MrQHEUisfgMJv2NnxTue9URKhbP3EbaUZ7sX3PeYArPkMSP.1q', NULL, NULL, 0, 0, 2, '0000-00-00', 'lFZJwPmeJHamgkxICYrMb02frIgd5CYhIhiJIOxUmuludI8RXKXRW2QU1wYJVFzg', '2023-06-02 15:24:34', '2023-06-12 22:36:10', NULL, NULL, 0),
(1816, 'Kayalin', 'Kishokumar', 'EL 0016', '2015-12-28', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '45119617', NULL, '', '', NULL, NULL, NULL, 1795, 1, 0, 2, '0000-00-00', NULL, '2023-06-02 17:19:58', '2023-06-06 17:23:38', NULL, NULL, 0),
(1817, 'Unknown', 'Unknown', 'TC 0007', '2007-03-27', 10, 2, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '', NULL, '', 'Åstunet 11 hagan', NULL, NULL, NULL, 1815, 1, 0, 2, '0000-00-00', NULL, '2023-06-02 17:44:30', '2023-06-12 22:35:50', NULL, NULL, 0),
(1818, 'Unknown', 'Unknown', 'TC 0008', '2013-11-14', 10, 2, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1815, 0, 0, 2, '0000-00-00', NULL, '2023-06-02 17:45:12', '2023-06-12 22:35:45', NULL, NULL, 0),
(1819, 'Aajeesh', 'Prasanna', 'LR 0016', '2013-01-22', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1787, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 00:15:19', '2023-06-03 00:15:19', NULL, NULL, 0),
(1820, 'Prasanna', 'Ravi', 'LR 0017', '1983-02-02', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1787, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 00:16:17', '2023-06-03 00:16:17', NULL, NULL, 0),
(1821, 'Ahaana', 'Prasanna', 'LR 0018', '2018-03-12', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1787, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 00:17:03', '2023-06-03 00:17:03', NULL, NULL, 0),
(1822, 'Kiristeena', 'Prasanna', 'LR 0019', '1984-06-02', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1787, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 00:18:07', '2023-06-03 00:18:07', NULL, NULL, 0),
(1823, 'Ananthanathan', 'Karunaianthan', 'SE 0022', '1976-08-08', 1, 2, 5, 10, NULL, 'ananthan0808@gmail.com', NULL, NULL, NULL, NULL, 'male', '45454503', NULL, NULL, NULL, NULL, '$2y$10$TSUagczu7OBwlq10rpF8CuuhSyWDmbWzU6PSARsOwSjzCwzR9xsBC', NULL, NULL, 0, 0, 2, '0000-00-00', 'M9imwIqGyP18EX7SFmGt7dPm6XrU8WWM5mQqCHNpquJoEXwwLdW2kl2MOx3b4jJj', '2023-06-03 09:10:07', '2023-06-03 09:10:53', NULL, NULL, 0),
(1824, 'Livinth Nathan', 'Ananthanathan', 'SE 0023', '2017-04-26', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1823, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 09:13:44', '2023-06-03 09:13:44', NULL, NULL, 0),
(1825, 'Sivananthan', 'Sithambaranadarajah', 'SE 0024', '1982-10-21', 1, 2, 5, 10, NULL, 'Sivaniresh@hotmail.com', NULL, NULL, NULL, NULL, 'male', '95213510', NULL, NULL, NULL, NULL, '$2y$10$QR0QZn4pMLBl1SYWNmFtoO.ZDSnjM.1OGpwp6dq8L293KXvuBSkie', NULL, NULL, 0, 0, 2, '0000-00-00', '4fIeRM61RegpPVm2o0UqNzHHzuKg0OD9n4zJUybcBd4F34J4MpkOW8TO7TXQrCAM', '2023-06-03 09:18:37', '2023-06-03 09:19:57', NULL, NULL, 0),
(1826, 'Mishaliny', 'Sivananthan', 'SE 0025', '2013-04-21', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1825, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 09:23:57', '2023-06-03 09:23:57', NULL, NULL, 0),
(1827, 'Nihassini', 'Sivananthan', 'SE 0026', '2016-01-06', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1825, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 09:24:48', '2023-06-03 09:24:48', NULL, NULL, 0),
(1828, 'Saji', 'Thasan', 'SE 0027', '1982-02-12', 1, 2, 5, 10, NULL, 'saji1982@gmail.com', NULL, NULL, NULL, NULL, 'male', '97779872', NULL, NULL, NULL, NULL, '$2y$10$cs59oG0NNhsZgvtkvqvAU.VnCJjGwgOYlr4kfF4U9hrrjpaKtpLaS', NULL, NULL, 0, 0, 2, '0000-00-00', 'sahwVqUKLk7MkkIFQpTmliDF0XpOkFZM595x6am5gCPSgsGgYDkuOEcZy2RQ8gyt', '2023-06-03 09:43:07', '2023-06-03 09:45:06', NULL, NULL, 0),
(1829, 'Subiraa', 'Saji', 'SE 0028', '2010-09-25', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1828, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 09:46:23', '2023-06-03 09:46:23', NULL, NULL, 0),
(1830, 'Kirubahari', 'Saji', 'SE 0029', '1987-03-08', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1828, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 09:47:11', '2023-06-03 09:47:11', NULL, NULL, 0),
(1831, 'Karnika', 'Saji', 'SE 0030', '2018-01-01', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1828, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 09:47:42', '2023-06-03 09:47:42', NULL, NULL, 0),
(1832, 'Veerun', 'Saji', 'SE 0031', '2020-01-08', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1828, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 09:48:29', '2023-06-03 09:48:29', NULL, NULL, 0),
(1833, 'vithiya', 'sri', 'SE 0032', '1986-11-10', 1, 2, 5, 10, NULL, 'vithiya_s@hotmail.com', NULL, NULL, NULL, NULL, 'female', '97136564', NULL, NULL, NULL, NULL, '$2y$10$Vb4s.0k9RC6dpiOTlB9NyeOaeQ6MLd6mCfPuV71ca7QrXrT30YlyG', NULL, NULL, 0, 0, 2, '0000-00-00', 'gM4STCniAfjnHw7SZnP7ft8ESI4wtAZ7mFtNmcJtx3JlnZw76RsFfoTYdQq6tnJi', '2023-06-03 10:23:56', '2023-06-03 10:24:33', NULL, NULL, 0),
(1834, 'Jokenthiran', 'Moorthy', 'SE 0033', '1981-12-06', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1833, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 10:26:24', '2023-06-03 10:26:24', NULL, NULL, 0),
(1835, 'Isaya Sofie', 'sri', 'SE 0034', '2014-12-14', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1833, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 10:27:22', '2023-06-03 10:27:22', NULL, NULL, 0),
(1836, 'Thinesrajan', 'Rajah', 'ST 0010', '2000-01-01', 1, 2, 5, 11, NULL, 'rs.thines@gmail.com', NULL, NULL, NULL, NULL, 'male', '48198975', NULL, NULL, NULL, NULL, '$2y$10$ulMktpllO.0AE1LfRlkPQuQ5Z2FmKiWQMPycFyyCmhOiHAo3ppUEC', NULL, NULL, 0, 0, 2, '0000-00-00', 'hXitl4WOCTlQHfdwpZSkTMqPGWhEHBgSECIoqQjDLpqN36YZq9ew1fhZqinOfdmW', '2023-06-03 11:31:23', '2023-06-03 11:31:56', NULL, NULL, 0),
(1837, 'Titto', 'Rudramoorthy', 'NS 0004', '1969-07-29', 1, 2, 5, 8, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'IbTUhYL71P7RzYZq2RDx93kl70FT2OgO9nCkfHM2fE6FzDmJEukYPmu878LWf7dc', '2023-06-03 12:14:04', '2023-06-03 12:14:04', NULL, NULL, 0),
(1838, 'Anujan', 'Christopher', 'NS 0005', '2006-10-14', 1, 2, 5, 8, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'sb2fAdYYPFUl4rUvakjBn7bclmlB6j6P20QHWXS6VB38C5A4jzvsEvF3pu4U7QCW', '2023-06-03 12:28:30', '2023-06-03 12:28:30', NULL, NULL, 0),
(1839, 'Premalatha', 'Satkurunathan', 'SE 0035', '1975-06-01', 1, 2, 5, 10, NULL, 'premkuru@hotmail.com', NULL, NULL, NULL, NULL, 'female', '95927173', NULL, NULL, NULL, NULL, '$2y$10$BQra2QLodwa67LtCXIFKdexO8BKounVTxm/Y8qU8R6kcIL6XAvigy', NULL, NULL, 0, 0, 2, '0000-00-00', 'g0pdU9usJlorLkslo67zlVqpvodSmEPghm4KWmrlEWTAXeHEDBpjoFpQxGp9', '2023-06-03 12:44:58', '2023-06-03 12:46:55', NULL, NULL, 0),
(1840, 'Sharmila', 'Satkurunathan', 'SE 0036', '2000-07-08', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1839, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 12:59:22', '2023-06-03 12:59:22', NULL, NULL, 0),
(1841, 'Mathanaruban', 'Sithiravelautham', 'SE 0037', '1978-10-08', 1, 2, 5, 10, NULL, 'rupan78@hotmail.com', NULL, NULL, NULL, NULL, 'male', '92150150', NULL, NULL, NULL, NULL, '$2y$10$KndAfQsJ3YGgXxxCaZrNPestC60Q3FDz6GxkLTHDgntydMW.g8Mje', NULL, NULL, 0, 0, 2, '0000-00-00', 'F3n1ow94WnCoH0aHPnSR6GvLlnX27uzBdq8FI2D2PPxRmVAofQYOhcvfiPz29hUs', '2023-06-03 14:31:52', '2023-06-03 14:32:31', NULL, NULL, 0),
(1842, 'Premachandran', 'Mokanathasan', 'SE 0038', '1983-12-04', 1, 2, 5, 10, NULL, 'p.thasan83@gmail.com', NULL, NULL, NULL, NULL, 'male', '46112974', NULL, NULL, NULL, NULL, '$2y$10$oYeKRy1pbdaT06t6vUAo5OdeEeeZDsUFbiNfbEjC/zRRDnd8o1.ZO', NULL, NULL, 0, 0, 2, '0000-00-00', 'KqsZ45XTueyXvbXYEe6y3EgkFlhupWqiesdjubVHp2OqF9pijPMDVsuVIu7ykKa3', '2023-06-03 17:49:43', '2023-06-03 17:50:21', NULL, NULL, 0),
(1843, 'Apinayaa', 'Mokanathasan', 'SE 0039', '2013-02-18', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1842, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 17:51:23', '2023-06-03 17:51:23', NULL, NULL, 0),
(1844, 'Kaarthiyk', 'Mokanathasan', 'SE 0040', '2015-03-26', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1842, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 17:52:22', '2023-06-03 17:52:22', NULL, NULL, 0),
(1845, 'Kavhisharan', 'Mokanathasan', 'SE 0041', '2017-12-02', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1842, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 17:53:31', '2023-06-03 17:53:31', NULL, NULL, 0),
(1846, 'Sukeelashanthi', 'Mokanathasan', 'SE 0042', '1987-09-24', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1842, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 17:54:01', '2023-06-03 17:54:01', NULL, NULL, 0),
(1847, 'Sivakugan', 'Sivapalan', 'SE 0043', '1981-02-11', 1, 2, 5, 10, NULL, 'thisogan@hotmail.com', NULL, NULL, NULL, NULL, 'male', '47649455', NULL, NULL, NULL, NULL, '$2y$10$rA/.744Bjaq00zRSjhEEb.GD5uTxp8XfZkMYHdN//Gwb3Bl1JFegO', NULL, NULL, 0, 0, 2, '0000-00-00', 'XdVYgKZGcKgNgEOLV3fJ1vUpRkvxDhF2yHddqYzCMlQJB7nL1WKVIlpUJyHl', '2023-06-03 18:00:43', '2023-06-13 22:11:58', NULL, NULL, 0),
(1848, 'Kalaiarasan', 'Thangaratnam', 'SE 0044', '1976-04-23', 1, 2, 5, 10, NULL, 'ktsitharasan@gmail.com', NULL, NULL, NULL, NULL, 'male', '46430907', NULL, NULL, NULL, NULL, '$2y$10$Zy/ocE9WwtPAvtK/I2mxm.HEhTWOPOKCsmbL3kscCUX21WmrdXkMy', NULL, NULL, 0, 0, 2, '0000-00-00', 'KlVHw3Mz2YXMSSu4NCkRm6LDEzdb8fbFQiHxHd3NIhRyzFsi8Sfj1yZD5rxog3cA', '2023-06-03 18:05:18', '2023-06-03 18:06:59', NULL, NULL, 0),
(1849, 'Sivanushan', 'Sivakugan', 'SE 0045', '2010-11-12', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1847, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 18:19:37', '2023-06-03 18:19:37', NULL, NULL, 0),
(1850, 'Sivashanth', 'Sivakugan', 'SE 0046', '2013-10-04', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1847, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 18:21:22', '2023-06-03 18:21:22', NULL, NULL, 0),
(1851, 'Unknown', 'Unknown', 'SE 0047', '2007-10-07', 10, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1847, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 18:22:29', '2023-06-13 22:22:03', NULL, NULL, 0),
(1852, 'Dhinusan', 'Kalaiarasan', 'SE 0048', '2015-10-10', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1848, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 18:26:39', '2023-06-03 18:26:39', NULL, NULL, 0),
(1853, 'Unknown', 'Unknown', 'EL 0017', '1988-05-17', 10, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1773, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 20:02:46', '2023-06-14 00:01:39', NULL, NULL, 0),
(1854, 'Jeyon', 'Jeffrin', 'EL 0018', '2017-06-21', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1773, 0, 0, 2, '0000-00-00', NULL, '2023-06-03 20:04:49', '2023-06-03 20:04:49', NULL, NULL, 0),
(1855, 'Unknown', 'Unknown', 'NO 0030', '1974-01-05', 10, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '98017122', NULL, NULL, NULL, NULL, '$2y$10$k4rLB863umD8tkcIsIHj2OooBw49Fa629QyEZRO3saw2UCNo5tWcO', NULL, NULL, 0, 0, 1, '0000-00-00', 'om7qezjrbbOBYJkrgL5Q0mUjIruYxt1QqqPbZpBvHF1NmJpMNqTvvMPh5cK0W3oT', '2023-06-04 10:28:11', '2023-06-08 01:13:36', NULL, NULL, 0),
(1856, 'Unknown', 'Unknown', 'NO 0031', '1974-01-05', 10, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '98017122', NULL, NULL, NULL, NULL, '$2y$10$K1mADQRbbvpfE.RtsX29g.3SZbLCQZ.u4bWv8sEJXn60o5xgiwm0O', NULL, NULL, 0, 0, 1, '0000-00-00', '2YrvvAIVOFnpAREOwlox0SYHYt2oV9RmYohozIwKUxAQ8rXpFkU13Nmddq9zzFkQ', '2023-06-04 10:29:55', '2023-06-08 01:13:17', NULL, NULL, 0),
(1857, 'Jerona', 'Arulappu', 'LR 0020', '1978-11-19', 1, 2, 5, 5, NULL, 'sjerona@gmail.com', NULL, NULL, NULL, NULL, 'female', '90089924', NULL, NULL, NULL, NULL, '$2y$10$BCoMaXIOgIXuEHmNkU9xl.tdLNCo9EpKWyab/csNAW3eg4azmnkgG', NULL, NULL, 0, 0, 2, '0000-00-00', 'x3lTwmSHcULdaiRftvj6oJhzAKV4wcbQLWshD4VnMOFRFLZPkPchXXn2iOa8YZBZ', '2023-06-04 13:35:33', '2023-06-04 13:40:00', NULL, NULL, 0),
(1858, 'Pathmanathan', 'Nalliah', 'EL 0019', '1961-08-14', 1, 2, 5, 2, NULL, 'Pathmanhypno@gmail.com', NULL, NULL, NULL, NULL, 'male', '98269269', NULL, NULL, NULL, NULL, '$2y$10$TT5wJeY4sxu3tBgTUWz49uEY4.Og1tkKK8CisNbmOn8OOy4VWzE8m', NULL, NULL, 0, 0, 2, '0000-00-00', 't0eWkCr8HEXvhGsvy0w018GjwmtLHQJNkHO1ak9Z2vibvguvIZ9j2UdXpdzQKZC9', '2023-06-04 13:36:21', '2023-06-04 13:39:24', NULL, NULL, 0),
(1859, 'Sujendran', 'Joseph', 'LR 0021', '1976-12-10', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '90848375', NULL, 'Lillestrøm', 'Nøkkefaret 14,2016 Frogner', NULL, NULL, NULL, 1857, 1, 0, 2, '0000-00-00', NULL, '2023-06-04 13:41:13', '2023-06-04 13:45:33', NULL, NULL, 0),
(1860, 'Sean ryan', 'Sujendran', 'LR 0022', '2008-05-02', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1857, 0, 0, 2, '0000-00-00', NULL, '2023-06-04 13:41:59', '2023-06-04 13:41:59', NULL, NULL, 0),
(1861, 'Efren jeran', 'Sujendran', 'LR 0023', '2011-10-15', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1857, 0, 0, 2, '0000-00-00', NULL, '2023-06-04 13:42:43', '2023-06-04 13:42:43', NULL, NULL, 0);
INSERT INTO `users` (`id`, `first_name`, `last_name`, `userId`, `dob`, `is_approved`, `country_id`, `organization_id`, `club_id`, `season_id`, `email`, `guardian_name`, `guardian_mail`, `guardian_number`, `email_verified_at`, `gender`, `tel_number`, `state`, `city`, `address`, `postal`, `password`, `profile_pic`, `parent_id`, `first_login`, `member_or_not`, `status`, `membership_updated_year`, `remember_token`, `created_at`, `updated_at`, `two_factor_code`, `two_factor_expires_at`, `enable_two_factor`) VALUES
(1862, 'Delan Sing', 'Selvanayagam', 'NO 0032', '1980-06-09', 1, 2, 5, 7, NULL, 'delan@hmda.no', NULL, NULL, NULL, NULL, 'male', '99886600', NULL, NULL, NULL, NULL, '$2y$10$Wqk2s8LrKBmGaLcOiw0BmO3oA4JVyEWUq4wrYdDkevosCuz6xwHKu', NULL, NULL, 0, 0, 2, '0000-00-00', 'HXXOJefSi8x8FbM1gJHx7tERbXTWpfMsqWmuQoVzYSly2Zt8IDDZsDp9Nalz', '2023-06-04 17:10:59', '2023-06-06 22:29:27', NULL, NULL, 0),
(1863, 'Sonia', 'Delan Sing', 'NO 0033', '2009-05-07', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1862, 0, 0, 2, '0000-00-00', NULL, '2023-06-04 17:12:29', '2023-06-04 17:12:29', NULL, NULL, 0),
(1864, 'Lyra', 'Delan Sing', 'NO 0034', '2014-03-13', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1862, 0, 0, 2, '0000-00-00', NULL, '2023-06-04 17:12:47', '2023-06-04 17:12:47', NULL, NULL, 0),
(1865, 'Nishani', 'Bernard Bergman', 'EL 0020', '1988-08-15', 1, 2, 5, 2, NULL, 'nishani_88_7@hotmail.com', NULL, NULL, NULL, NULL, 'female', '48356662', NULL, NULL, NULL, NULL, '$2y$10$epo2Mux8d0M2EyKZrgOSBedcbAl/WiBuOwyJ98J4gDe7XunOrlcKq', NULL, NULL, 0, 0, 2, '0000-00-00', 'k15Q6XH6NgVp0qxSIWZv3jmJuaJJm1p02nmLaVYQFXmKBlzU1OSivPIf0I5i', '2023-06-04 21:59:13', '2023-06-04 22:00:40', NULL, NULL, 0),
(1866, 'Rinea', 'Bernard Bergman', 'EL 0021', '2015-11-07', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1865, 0, 0, 2, '0000-00-00', NULL, '2023-06-04 22:04:33', '2023-06-04 22:04:33', NULL, NULL, 0),
(1867, 'Shanea', 'Bernard Bergman', 'EL 0022', '2019-08-24', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1865, 0, 0, 2, '0000-00-00', NULL, '2023-06-04 22:05:03', '2023-06-04 22:05:03', NULL, NULL, 0),
(1868, 'Albert', 'Soosaipillai', 'EL 0023', '1967-04-30', 1, 2, 5, 2, NULL, 'albert_shadona@hotmail.com', NULL, NULL, NULL, NULL, 'male', '48120187', NULL, NULL, NULL, NULL, '$2y$10$mwjNcN/9mxVgmBAfhOdyke71olLoNuQlZvOuxd1aboU/uU2c81ceC', NULL, NULL, 0, 0, 2, '0000-00-00', '5RpLuAmvdApJrUeWDP1K9kGJ3vXjFLnzmYCvTlNDr1VwG8HSLQlQhionxwQwCJHS', '2023-06-04 22:32:55', '2023-06-04 22:35:17', NULL, NULL, 0),
(1869, 'Aiden', 'Albert', 'EL 0024', '2006-03-21', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1868, 0, 0, 2, '0000-00-00', NULL, '2023-06-04 22:37:35', '2023-06-04 22:37:35', NULL, NULL, 0),
(1870, 'Thulaxshan', 'Siva', 'NO 0035', '2008-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'RZk8I0r9qSDymReToG4WpJkblAH98XLySQXtleIOR0bVbuYylsOYkGBUyVcAYUbg', '2023-06-04 23:27:54', '2023-06-04 23:27:54', NULL, NULL, 0),
(1871, 'Lojen', 'Sutha', 'NO 0036', '2005-11-15', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', '3d2jxyFerukqsAZpb1Fa532Z18s0hE4GOHRaGvpeWxAaiPB234mXvPbzvzlviuz2', '2023-06-04 23:30:25', '2023-06-04 23:30:25', NULL, NULL, 0),
(1872, 'Akshay', 'Haransing', 'NO 0037', '2007-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'dSiY3JNmhyCPdXThlEiD4zep4Me1XzPhFu2pyDpeERItOcUNZqFQhzBXkPW63MCT', '2023-06-04 23:56:03', '2023-06-04 23:56:03', NULL, NULL, 0),
(1873, 'Denicha', 'Ravendran', 'NO 0038', '2006-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'eTK9GQrCZFBNSSityr1y5ibLgGVhp6lWHqiCPXonAyw4UR6YoqViHvzzJkXwPA18', '2023-06-05 00:01:10', '2023-06-05 00:01:10', NULL, NULL, 0),
(1874, 'Abinayan', 'Ilango', 'NO 0039', '2004-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'qMErL30mWSc5KK1Ax0DNM8y1MX1IFhFzBoA6THt8uQOCCC7DRQG8NX8Yd1LUEcf5', '2023-06-05 00:05:21', '2023-06-05 00:05:21', NULL, NULL, 0),
(1875, 'Rithan', 'Mathan Sing', 'NO 0040', '2007-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '', NULL, '', '', NULL, NULL, NULL, NULL, 1, 0, 2, '0000-00-00', 'xeNQliDvJ0MVCGuoYcAO4askn80wu8jQ5Cpp8uygirlxFydNKhmYeS2GsBaKAzEf', '2023-06-05 00:35:20', '2023-06-05 01:04:52', NULL, NULL, 0),
(1876, 'Unknown', 'Unknown', 'NO 0041', '2009-01-01', 10, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '', NULL, '', '', NULL, NULL, NULL, NULL, 1, 0, 2, '0000-00-00', 'i3NZzSyWOmcGSxRiOtChIc3m0GRpgHi6N0NSfRgsCB8PbnPUSr1JtweLbO01W0r6', '2023-06-05 00:36:23', '2023-06-07 23:21:34', NULL, NULL, 0),
(1877, 'Arjun', 'Francis Christy', 'EL 0025', '2018-03-10', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1797, 0, 0, 2, '0000-00-00', NULL, '2023-06-05 13:46:56', '2023-06-05 13:46:56', NULL, NULL, 0),
(1878, 'Neethan', 'Rajasri', 'NO 0042', '2006-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'Z3QIpUv2mRE99Da2hdYAd54rVXmu5rMxfqKAI3BhpchyoUjf2TYlA8baJaULTC0r', '2023-06-06 13:32:01', '2023-06-06 13:32:01', NULL, NULL, 0),
(1879, 'Lathan', 'Rajasri', 'NO 0043', '2010-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', '8jVB4wnzshjWoKsMLbznCeAr60GQSqX2zylLmcVGTkRtxHxzD8OKe9TloGAWDtpU', '2023-06-06 13:32:49', '2023-06-06 13:32:49', NULL, NULL, 0),
(1880, 'Nilany', 'Thirugnanasampanthar', 'NO 0044', '1985-09-25', 1, 2, 5, 7, NULL, 'nilany85@hotmail.com', NULL, NULL, NULL, NULL, 'female', '97591142', '', '', '', '', '$2y$10$Zxhb24rQAwOMUja0KoTC3.et2ZC7E/v2eTfhJdMn5YVawAornKbJ6', NULL, NULL, 1, 0, 2, '0000-00-00', '3NpyN4Tzi8U4tNMeOnt6ikzrEU8Ef5XCY5i9QjtggSalRHULvnhsA5INdrCyjf4O', '2023-06-06 15:05:13', '2023-06-07 01:16:07', NULL, NULL, 0),
(1881, 'Olivia', 'Ranjan', 'EL 0026', '1999-01-04', 1, 2, 5, 2, NULL, 'oliviaranjan@hotmail.no', NULL, NULL, NULL, NULL, 'female', '47346867', NULL, NULL, NULL, NULL, '$2y$10$3aEXm.NzRa2iI8T8DiSAc.HYC7jQL0/gp5lN7uXuGC39Ec8NMfoJm', NULL, NULL, 0, 0, 2, '0000-00-00', 'LJ8zMTLWGVEZaayAFFbM6dMuG2reWHdkajZpYCRIgp7T6No0P0pb3lBshj3Pnxyv', '2023-06-06 15:23:48', '2023-06-06 15:24:00', NULL, NULL, 0),
(1882, 'pretika', 'Sivasanger', 'NS 0006', '2014-06-06', 1, 2, 5, 8, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'zR4EKRdlc8vNrCAWd4rVWptTl9DoZZjkBcYzteRPVdBvKCbkZDDEhj5A7exX0vOm', '2023-06-06 15:48:53', '2023-06-06 15:48:53', NULL, NULL, 0),
(1883, 'Prakash', 'Sivasanger', 'NS 0007', '2009-06-06', 1, 2, 5, 8, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'IsVCq78MkaYQ682t4NURIl5B9VSXLEisk6Cmg5j8fPyvYZ4xx2lxNbizu2HV1T6W', '2023-06-06 15:54:28', '2023-06-06 15:54:28', NULL, NULL, 0),
(1884, 'Priyanka', 'Sivasanger', 'NS 0008', '2006-05-06', 1, 2, 5, 8, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'yENcw591mPIxGYXsynZDTIHzQVPxtoDWOaQKwYc2d1r5CvgwWw0FWD5dWD8ibchj', '2023-06-06 15:57:16', '2023-06-06 15:57:16', NULL, NULL, 0),
(1885, 'Jacintha', 'Anton Suresh', 'EL 0027', '1972-02-27', 1, 2, 5, 2, NULL, 'jacintha2702@hotmail.com', NULL, NULL, NULL, NULL, 'female', '94465255', NULL, NULL, NULL, NULL, '$2y$10$KFhGbcPjNwASTD5.JxgAXuCjNy4nFbC/L7fGh2t5OsOnGB0yxH7P.', NULL, NULL, 0, 0, 1, '0000-00-00', 'RTkeT9OvnSPvAessZndZl7B5rx1MPvvLHtEsOTSCvh1mrnihajP5aGsd9z0o9ad8', '2023-06-06 16:14:45', '2023-06-06 16:17:14', NULL, NULL, 0),
(1886, 'Kayalin', 'Kishokumar', 'EL 0028', '2015-12-28', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1795, 0, 0, 2, '0000-00-00', NULL, '2023-06-06 17:23:08', '2023-06-06 17:23:08', NULL, NULL, 0),
(1887, 'Antrica', 'Jeeva Victor', 'EL 0029', '2005-08-28', 1, 2, 5, 2, NULL, 'victorjeeva1963@gmail.com', NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, '$2y$10$A3LjCdlUTvSKWOW8kNHS8eYkKUsdZGe1lWUBASLeE2nPfbLdUJe1S', NULL, NULL, 0, 0, 1, '0000-00-00', 'Cq45wm6D8uFhaXfY326bfmgAOiVZz70nD4uWBbdwGDrgRzrSXL9NnWHMqihjngqI', '2023-06-06 17:47:31', '2023-06-06 17:47:31', NULL, NULL, 0),
(1888, 'Antrica', 'Jeeva Victor', 'EL 0030', '2005-08-28', 1, 2, 5, 2, NULL, 'antricaj@gmail.com', NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, '$2y$10$TDeR5G0KPLOmojZK12jBiu.4SXB7PeqsX4661VQYHZ4gp3q/LdYDC', NULL, NULL, 0, 0, 1, '0000-00-00', 'WqcyArQdrFrtWiYh4EvSjsosbqOaTpzR1JvepUrBL3iGJkIBByTXlKW5rEQAkkJi', '2023-06-06 17:48:44', '2023-06-06 17:48:44', NULL, NULL, 0),
(1889, 'THAYANANTHAN', 'RAMANATHAN', 'LR 0024', '1978-03-05', 1, 2, 5, 5, NULL, 'd_thaya06@yahoo.co.uk', NULL, NULL, NULL, NULL, 'male', '99720519', NULL, NULL, NULL, NULL, '$2y$10$dF5iPkfJeeMpAQuaY43A5.IIott0GDLxe8OL4I0GB5rZWyi8QvlS.', NULL, NULL, 0, 0, 2, '0000-00-00', '7R3XB3vgLNa5AZoQaSYMil8Pu0UledqFyu6W0OiZVnBPUsMeFuJL0FTxkvz6BtFH', '2023-06-06 18:00:59', '2023-06-06 18:01:55', NULL, NULL, 0),
(1890, 'Ishanah', 'Thayananthan', 'LR 0025', '2011-12-21', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1889, 0, 0, 2, '0000-00-00', NULL, '2023-06-06 18:06:28', '2023-06-06 18:06:28', NULL, NULL, 0),
(1891, 'Shreyas', 'Thayananthan', 'LR 0026', '2006-04-29', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1889, 0, 0, 2, '0000-00-00', NULL, '2023-06-06 18:12:36', '2023-06-06 18:12:36', NULL, NULL, 0),
(1892, 'Aravinthan', 'Nagalingam', 'NO 0045', '1979-04-08', 1, 2, 5, 7, NULL, 'aravinthan3@gmail.com', NULL, NULL, NULL, NULL, 'male', '45801618', NULL, NULL, NULL, NULL, '$2y$10$76F.hrbJHxMw20fCZb6gX.XdVjNrn4Cmw8xhNP9tH2nGRh83z2sRG', NULL, NULL, 0, 0, 2, '0000-00-00', 'aclpu0RbWSzZ7ePmLLzTd7qQ2BzyYS0N0HIMEP6z0XoHK2Wi5inJ8i59DY0FsRFb', '2023-06-06 18:36:47', '2023-06-06 18:37:13', NULL, NULL, 0),
(1893, 'Pugalan', 'Aravinthan', 'NO 0046', '2008-05-16', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '', NULL, '', '', NULL, NULL, NULL, 1892, 1, 0, 2, '0000-00-00', NULL, '2023-06-06 18:39:47', '2023-06-06 18:40:46', NULL, NULL, 0),
(1894, 'Tharakan', 'Aravinthan', 'NO 0047', '2011-09-03', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1892, 0, 0, 2, '0000-00-00', NULL, '2023-06-06 18:40:20', '2023-06-06 18:40:20', NULL, NULL, 0),
(1895, 'Antroy Krishanth', 'Alfred', 'EL 0031', '1992-02-12', 1, 2, 5, 2, NULL, 'antroy8405@hotmail.com', NULL, NULL, NULL, NULL, 'male', '40897146', NULL, NULL, NULL, NULL, '$2y$10$nzyhJ4WzlN2ZiUkukcXJ9OuwNDS.N7OhemVuho49Cl7iLGimKwkHu', NULL, NULL, 0, 0, 2, '0000-00-00', 'PvJ2c5RiNPzGBTAAVdauyfb2xbWhYO4d6Wbm6LhUHFaUhYYmbqpMVCpHKOcdzZqI', '2023-06-06 18:53:41', '2023-06-06 19:09:04', NULL, NULL, 0),
(1896, 'Tharsani', 'Banister', 'EL 0032', '1981-11-03', 1, 2, 5, 2, NULL, 'tharsanib@gmail.com', NULL, NULL, NULL, NULL, 'female', '90747545', NULL, NULL, NULL, NULL, '$2y$10$h2j1CMqYkLAsjrINGxcVIOzCQ1Phnpere9pOnYUw0F2r82Oqij2ha', NULL, NULL, 0, 0, 2, '0000-00-00', '1j4Dh4EWb4Ac3jHmPyhmip2IAvVfGIbIk2vQz3HUGfwss4mHrGl3LbuOzzpLo4tW', '2023-06-06 19:59:04', '2023-06-06 20:03:36', NULL, NULL, 0),
(1897, 'Nagaseelan', 'Nagarasa', 'IA 0002', '1972-07-20', 1, 2, 5, 4, NULL, 'nihe30@gmail.com', NULL, NULL, NULL, NULL, 'male', '48091734', NULL, NULL, NULL, NULL, '$2y$10$gPiNDfxmG/Wk8Pzsjmte9ObWdX7t.EWshMJL8Ql/T9QqJXx.Vn09W', NULL, NULL, 0, 0, 2, '0000-00-00', 'Y6ojKgALN0WqbOWGcOqbK9wdpWnbGh6jNAcGXITEHscUeliJ57xpaJgRxkypoBWo', '2023-06-06 20:12:30', '2023-06-06 20:14:27', NULL, NULL, 0),
(1898, 'Annika', 'Banister', 'EL 0033', '2009-01-05', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', NULL, '', '', NULL, NULL, NULL, 1896, 1, 0, 2, '0000-00-00', NULL, '2023-06-06 20:16:53', '2023-06-06 20:17:46', NULL, NULL, 0),
(1899, 'Stian', 'Thomas', 'EL 0034', '1996-11-27', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '', NULL, '', '', NULL, NULL, NULL, NULL, 1, 0, 2, '0000-00-00', '2DcmTyUkpfY2EBRfb47Q9Zy23geHAMwIR4WHhwpjhRYPqPxkO3ZeJpoRSMlL1osg', '2023-06-06 20:42:44', '2023-06-06 20:42:55', NULL, NULL, 0),
(1900, 'Steffi', 'Venceslos', 'EL 0035', '2009-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'oJNXgWgId3L4akWUwQGFtMSnRHHQLI1NbLjzpQUoDpQX4Q3NZcLJKmDr0tiU3v9B', '2023-06-06 21:28:38', '2023-06-06 21:28:38', NULL, NULL, 0),
(1901, 'Joandra', 'John Kafka', 'EL 0036', '2011-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', '1sZoKiiGgkf3bPXWwbDXUfHmtpEFyvWOkdE5ZgBBRtoonUpll05vb4tEBkcbHeTc', '2023-06-06 21:44:52', '2023-06-06 21:44:52', NULL, NULL, 0),
(1902, 'Joanna', 'John KAfka', 'EL 0037', '2014-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'zko1EQdw0d8aDoIfwHWyFmOabfbWl7kBIiFWFDANPNxHHdU7wnXo60lFglpP83l9', '2023-06-06 21:45:56', '2023-06-06 21:45:56', NULL, NULL, 0),
(1903, 'Danny', 'Geogre', 'EL 0038', '2012-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'SwJCPICdkNUrQK1BGzc4FftttliM73aLwUdGSlwNYRWvo8lPMABCEmq1u1kIcUNn', '2023-06-06 21:47:11', '2023-06-06 21:47:11', NULL, NULL, 0),
(1904, 'Adrian', 'Geogre', 'EL 0039', '2016-03-17', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'rjXfNCbvny3M4FHCdAmZjsgQyYMGYgPJbx0MrgzzTLFgtDz0LwfUZHDMats3ngny', '2023-06-06 21:57:32', '2023-06-06 21:57:32', NULL, NULL, 0),
(1905, 'Maria Selvy', 'Thomas', 'EL 0040', '1968-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', NULL, '', '', NULL, NULL, NULL, NULL, 1, 0, 2, '0000-00-00', 'xN8xqm2vMfoMIu0RnYwxVnSbxlC30rib1Lwhc2NCKNaBcm0O7k5jfQoTcKmFGqZ6', '2023-06-06 21:58:42', '2023-06-07 00:17:08', NULL, NULL, 0),
(1906, 'Steffany', 'Thomas', 'EL 0041', '1992-04-15', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'crrXyTJgn4aihwMVfNbtiUOmLtJRL67eNjGQy6bRCKWhCFgS1C3RlZkmubNbfeWz', '2023-06-06 22:02:25', '2023-06-06 22:02:25', NULL, NULL, 0),
(1907, 'Selina', 'Suresh', 'EL 0042', '2009-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'USXzFpqjW1OZpRvNNcDv5U3VfGudQT18a5G8x3SlhDVPkkEbFXFU8XhTvhmV2QUg', '2023-06-06 23:05:31', '2023-06-06 23:05:31', NULL, NULL, 0),
(1908, 'Henrik', 'Anton Suresh', 'EL 0043', '2014-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'W0narbG1MlzlXYlJLednoRskmz45qtiZjhhKZt9lLyyyyOj1I8JXEdhyGk9Ee93h', '2023-06-06 23:06:19', '2023-06-06 23:06:19', NULL, NULL, 0),
(1909, 'jacintha', 'Anton Suresh', 'EL 0044', '1972-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'XjNo4LWoldMWWRjNJAEjJoAqh1TBHQr70ntR08uCm7j9SZ7XRUHarxf90vAbR6El', '2023-06-06 23:07:09', '2023-06-06 23:07:09', NULL, NULL, 0),
(1910, 'Newton', 'Pushparajah', 'EL 0045', '1976-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'D72clZx3zhrsMzvvD3upuLp4qJNbKifCkUFfujCYhbEF01QUEMYinJ41DpyIQEde', '2023-06-06 23:08:41', '2023-06-06 23:08:41', NULL, NULL, 0),
(1911, 'Unknown', 'Unknown', 'LR 0027', '2000-02-01', 10, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'Ek9SmYigLQxv2erUiQIYqFR8xVOa0PrACCeUS1FIx4z0fGT2wxZ3nMyan1njn36M', '2023-06-06 23:10:05', '2023-06-06 23:11:35', NULL, NULL, 0),
(1912, 'Nathania', 'Newton', 'EL 0046', '2007-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', NULL, '', '', NULL, NULL, NULL, NULL, 1, 0, 2, '0000-00-00', 'a8KYwTw5b4RyOYLnXLDBzQGXBrX9jW0iXBvpALlCuvmDfbPC5mfQEZUs9sZdHELL', '2023-06-06 23:10:16', '2023-06-06 23:10:31', NULL, NULL, 0),
(1913, 'Darian', 'Newton', 'EL 0047', '2009-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'DU8070j1oIecEdkg3FJTzjNWf4ALlExWptCdOhtQOm1fTo9wdFI9P3myiawCkPPB', '2023-06-06 23:11:09', '2023-06-06 23:11:09', NULL, NULL, 0),
(1914, 'Dhama', 'Newton', 'EL 0048', '1982-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', NULL, '', '', NULL, NULL, NULL, NULL, 1, 0, 2, '0000-00-00', '1XxdFDoKohvSG9ZskZBGeekkP1OxNsOfQn8gOdTzgnI9Tls9qbZBRl0kNYz2jwil', '2023-06-06 23:12:07', '2023-06-06 23:12:17', NULL, NULL, 0),
(1915, 'Virginia', 'Rajesan', 'EL 0049', '1964-04-25', 1, 2, 5, 2, NULL, 'virginia.rajesan@bsh.oslo.kommune.no', NULL, NULL, NULL, NULL, 'female', '95088963', NULL, NULL, NULL, NULL, '$2y$10$/SsahWp0U30k//Ml6gYg7OerodFetbPayfH9qPHcBTfaGuxyRMUvW', NULL, NULL, 0, 0, 2, '0000-00-00', 'WabHMNVbFSI690iqo5VzKj2YXEjO7pCGTSCenTvDf5OjfG9bykjLrXENXbiE', '2023-06-06 23:15:38', '2023-06-06 23:16:17', NULL, NULL, 0),
(1916, 'Virginia', 'Rajesan', 'EL 0050', '1964-04-25', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1915, 0, 0, 2, '0000-00-00', NULL, '2023-06-06 23:30:37', '2023-06-06 23:30:37', NULL, NULL, 0),
(1917, 'mugunthan', 'Rasanayagam', 'EL 0051', '1961-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'HdM34gpGbhU8D9CIUoqsZzFUWdOIUTX0Udd4LagcutoO69DJRLWaHKaRgSubldX7', '2023-06-06 23:39:23', '2023-06-06 23:39:23', NULL, NULL, 0),
(1918, 'Unknown', 'Unknown', 'LR 0028', '1971-01-01', 10, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', NULL, '', '', NULL, NULL, NULL, NULL, 1, 0, 2, '0000-00-00', 'QzwJTg8dWXyAbLfYMRinyoTTGXDxIA5Fg85x5G6eL2Dx0AJSXTd3czrI5GHJFIEL', '2023-06-07 00:24:07', '2023-06-07 00:26:01', NULL, NULL, 0),
(1919, 'Dhiya', 'Thinenthiran', 'NO 0048', '2014-11-15', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '97591142', NULL, '', '', NULL, NULL, NULL, 1880, 1, 0, 2, '0000-00-00', NULL, '2023-06-07 01:05:58', '2023-06-07 01:09:47', NULL, NULL, 0),
(1920, 'Aniha', 'Thinenthiran', 'NO 0049', '2017-11-12', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1880, 0, 0, 2, '0000-00-00', NULL, '2023-06-07 01:06:26', '2023-06-07 01:06:26', NULL, NULL, 0),
(1921, 'Niroshan', 'Packiarasa', 'EL 0052', '1987-05-15', 1, 2, 5, 2, NULL, 'nirosh4872@gmail.com', NULL, NULL, NULL, NULL, 'male', '94485653', NULL, NULL, NULL, NULL, '$2y$10$5ClZdKxu6AD5jb4U1qzrc.F7LpYB97mq22g7W3DnzE6ULGmFjhogy', NULL, NULL, 0, 0, 2, '0000-00-00', 'gm8Wd5IFtbV7ijHNNUwnsaG5AcQsa3XUchFsMPaTVsQ2YclsZCowJvlyLmeJ77jE', '2023-06-07 16:46:51', '2023-06-07 16:47:45', NULL, NULL, 0),
(1922, 'Kishanthini', 'Arulnesan', 'EL 0053', '1987-02-14', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', NULL, '', '', NULL, NULL, NULL, 1921, 1, 0, 2, '0000-00-00', NULL, '2023-06-07 16:54:22', '2023-06-07 16:55:04', NULL, NULL, 0),
(1923, 'Diyana', 'Niroshan', 'EL 0054', '2019-02-20', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', NULL, 'KLØFTA', 'Husmannsvegen 7', NULL, NULL, NULL, 1921, 1, 0, 2, '0000-00-00', NULL, '2023-06-07 16:56:52', '2023-06-07 16:58:48', NULL, NULL, 0),
(1924, 'Madelen', 'Jacob', 'EL 0055', '2009-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'YONFSzLWrGQmkXcfx7APqtIzzjrxqOvfUb4SBYGwYjsMvmXyzlx3Fg300p9jpnhz', '2023-06-07 20:18:20', '2023-06-07 20:18:20', NULL, NULL, 0),
(1925, 'Juvan', 'Anurathan', 'NO 0050', '2011-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'XgCcNK2OHVqQWQynRwl6WHCm0C7CyCDUJTXxofTIoG7HXducDSJgzhGjuFKlqFdm', '2023-06-08 00:41:58', '2023-06-08 00:41:58', NULL, NULL, 0),
(1926, 'Vishnu', 'Anurathan', 'NO 0051', '2013-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'CO8oW5g10mj0dGSb77QrefIuOuP3Ht1Abm4yZ06YqF5aJDt2XHkteglFgWzSW1jq', '2023-06-08 00:43:28', '2023-06-08 00:43:28', NULL, NULL, 0),
(1927, 'Nisha', 'Selven', 'NO 0052', '2010-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'lIpd03RuTzx3JUcWhNy9KCXp65h6DubvEDFLTGYMqexA0J0IX0YEUFFIpTkOdQPL', '2023-06-08 00:45:25', '2023-06-08 00:45:25', NULL, NULL, 0),
(1928, 'Mishan', 'Selven', 'NO 0053', '2015-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'SDC0P6BIZibpQZ77j2ZUKVMDAS0dt5MIVSDO0FRBZj4MYQimxxikXOUArAM191SK', '2023-06-08 00:46:52', '2023-06-08 00:46:52', NULL, NULL, 0),
(1929, 'Selven', 'Sivanadesu', 'NO 0054', '1981-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'H1AvIOpHMnDU3OQLyxuObuKzThXUE8Oy7UbTRtGDWRMcYz0WusN1AqmZ6IfefMhJ', '2023-06-08 00:48:42', '2023-06-08 00:48:42', NULL, NULL, 0),
(1930, 'Sofia', 'Senthuoran', 'NO 0055', '2015-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'uDbXdgdGuLZoOPTbyg65bCDSHGvKrcyvql8Dy0kRCH8ThsjtNerOJ43FrL11Sg59', '2023-06-08 00:56:26', '2023-06-08 00:56:26', NULL, NULL, 0),
(1931, 'Dipigah', 'Senthuoran', 'NO 0056', '2012-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'BmGsriDyXmXMOOgwTIfTXHNfBO5Fs3uwDtcuOKlHd69dAWM572lVNQcky6Bi0Db0', '2023-06-08 00:57:34', '2023-06-08 00:57:34', NULL, NULL, 0),
(1932, 'Senthuoran', 'Soorasangarm', 'NO 0057', '1980-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'iITkan2Pe5tL6N6K8PWacWfRonhcPVEZnnpINVQ5nLjFFsCyb2D4uY6V5NCQK9R2', '2023-06-08 00:59:20', '2023-06-08 00:59:20', NULL, NULL, 0),
(1933, 'Lexshika', 'Karunakaran', 'NO 0058', '2012-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'AggXh3K2NJw8GWvThSqMPhPfV8hFA6sV59SjAtQo9Aa8gxyHo6alxDf0qjSwki6T', '2023-06-08 01:00:45', '2023-06-08 01:00:45', NULL, NULL, 0),
(1934, 'Kabershan', 'Karunakaran', 'NO 0059', '2010-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'dy3qKKou5zBXByfdMCN9VZiEHsEpJvNPMvliRqxQtmZJqxI1y7VNJoMQts08RsVD', '2023-06-08 01:02:34', '2023-06-08 01:02:34', NULL, NULL, 0),
(1935, 'Dilukshan', 'Karunakaran', 'NO 0060', '2009-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'jbq1WmXN8Jfj1Df9PIwqIWZp66QtZOiyQdZmYGlymn2kmzznGXCZO9Zj92a8vJx1', '2023-06-08 01:03:33', '2023-06-08 01:03:33', NULL, NULL, 0),
(1936, 'Aksharan', 'Kannan', 'NO 0061', '2012-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'N57VFGb1AgKR2NhvcFQTqDvCnVzsuCSNuqEaO5TcpWu6WIVvXpRXcLxRivgN4WO0', '2023-06-08 01:04:50', '2023-06-08 01:04:50', NULL, NULL, 0),
(1937, 'Aksana', 'Kannan', 'NO 0062', '2014-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'zLVouAs0RrB5CBW5DqDVyzny5eDGkeYsLclXdUrYsVzrg0voAcuYGQcDPvBKrVam', '2023-06-08 01:05:48', '2023-06-08 01:05:48', NULL, NULL, 0),
(1938, 'Abithan', 'Uthayavas', 'NO 0063', '2008-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'AxN4Rr8QU8V7DzNYGrlhTBJrdg4tAuGTcaKSVnzf95ArlAIiTsmMxdxUkJdazUqG', '2023-06-08 01:07:26', '2023-06-08 01:07:26', NULL, NULL, 0),
(1939, 'Ishak', 'Hariharan', 'NO 0064', '2010-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'hrCuccNOirhMRo5irkOtJIcxVK4MzIqmITe5I1ip4J8FOgKd8qnXAiaoIZZZGWw4', '2023-06-08 01:10:10', '2023-06-08 01:10:10', NULL, NULL, 0),
(1940, 'Ilango', 'Nagarajah', 'NO 0065', '1972-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', '9cDb9EItKcnE8XOmkaL2ed3Km8HVgG25yACpnQE8IurqLjjnC13Bz7jEps0vFY85', '2023-06-08 01:17:14', '2023-06-08 01:17:14', NULL, NULL, 0),
(1941, 'Kohulan', 'Packiyarajah', 'LR 0029', '1980-03-26', 1, 2, 5, 5, NULL, 'packik@hotmail.com', NULL, NULL, NULL, NULL, 'male', '41576465', NULL, NULL, NULL, NULL, '$2y$10$A8gxyuXWFg1Fn/b2JAeP8.hmV7l/oWyEzfiQVu4//ZZmRa8ucnT6y', NULL, NULL, 0, 0, 2, '0000-00-00', 'uybYvlHNLoXigfnev6xQIO8SxfdejtLALymXkUMbvvgqZBgREHgwRc5ZuOqheTZJ', '2023-06-08 16:44:57', '2023-06-08 16:45:46', NULL, NULL, 0),
(1942, 'Unknown', 'Unknown', 'LR 0030', '2009-10-15', 10, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1941, 0, 0, 2, '0000-00-00', NULL, '2023-06-08 17:06:39', '2023-06-13 21:21:05', NULL, NULL, 0),
(1943, 'Shawn', 'Kohulan', 'LR 0031', '2007-06-29', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1941, 0, 0, 2, '0000-00-00', NULL, '2023-06-08 17:07:15', '2023-06-08 17:07:15', NULL, NULL, 0),
(1944, 'Saarun', 'Sivakumar', 'NO 0066', '2005-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'P7LLgZKjvOBrSJKxofeupERRSzv2LWcumNbL56J18D2KXljp0gFUgKHy6CNT5s5k', '2023-06-08 18:36:23', '2023-06-08 18:36:23', NULL, NULL, 0),
(1945, 'Nivethan', 'Rajan', 'NO 0067', '2004-07-22', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '', NULL, '', '', NULL, NULL, NULL, NULL, 1, 0, 2, '0000-00-00', 'VBfU1DcBX32u7GlzCQxXEkQjRYshJeCMZ16ENffYT40zejRDWUuTYaQ5v9LjI3Sy', '2023-06-08 18:46:01', '2023-06-08 18:46:13', NULL, NULL, 0),
(1946, 'Jean Mary', 'Gregory', 'EL 0056', '1977-09-08', 1, 2, 5, 2, NULL, 'jeanmary.grrgory@gmail.com', NULL, NULL, NULL, NULL, 'female', '92094919', NULL, NULL, NULL, NULL, '$2y$10$NtYnkR3yYJ6r1eI51103ROOdlyHRAN2lFnnZfH5v5hnkocgC7TpRi', NULL, NULL, 0, 0, 1, '0000-00-00', 'kLt9VfF3YEQyhmYoxIQ2Z63cmbzqXEgyggyYOxoFBdfVwfMccB639p6qya458QM8', '2023-06-08 18:46:58', '2023-06-08 18:46:58', NULL, NULL, 0),
(1947, 'Jesina', 'Rajan', 'NO 0068', '2007-06-29', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'QqPEGWC5XpEEy3eG7xjjqTAvLtu3TKlmvf0PQQcFEiepMp9mzkzANZg8YsL8JZXi', '2023-06-08 18:49:46', '2023-06-08 18:49:46', NULL, NULL, 0),
(1948, 'Arun', 'Rajan', 'NO 0069', '2011-11-11', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'OwzjheRCfDGSx85BqqXBfGnAsiLNMa9PpHwcZzVPsEELPo6hbSRhRMAWLvdT5pU6', '2023-06-08 18:51:01', '2023-06-08 18:51:01', NULL, NULL, 0),
(1949, 'Rajan', 'Thalayasingam', 'NO 0070', '1972-01-18', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', '4wKeezTyDPApJIzoNZDDq6sm9IeP2fJkkRIcQDSaMeCYjPQkt4T5Z9KkpREH4bgz', '2023-06-08 18:54:01', '2023-06-08 18:54:01', NULL, NULL, 0),
(1950, 'Gnanaseeli', 'Clive', 'EL 0057', '1981-03-01', 1, 2, 5, 2, NULL, 'edmundclive@hotmail.com', NULL, NULL, NULL, NULL, 'female', '46263872', NULL, NULL, NULL, NULL, '$2y$10$letId9MNYK/UKZAJMHat8OCbHEjmHKbjI311Ul.zjDFFJD7Vbf2Ca', NULL, NULL, 0, 0, 2, '0000-00-00', 'SDRzDlOX5Xb0D4ED1nGBiOwgOXdUaPHrUDjDF5NLKFPq5ComcpNPhc0joqQZrV7Y', '2023-06-08 19:35:51', '2023-06-08 19:38:21', NULL, NULL, 0),
(1951, 'Renana', 'Clive', 'EL 0058', '2015-10-16', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'L4LU1oo4xcjCWD2PzMWAQp2fGPab2Qg6qrZwgN2lGDrKag12tuQ0bcMwH06YNCEY', '2023-06-08 21:55:21', '2023-06-08 21:55:21', NULL, NULL, 0),
(1952, 'sajin', 'Clive', 'EL 0059', '2009-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', '4GBWkXetJrK5NrG3LNRhxcop6oRJclYpAtCfq5cuTIlRiNzgZQrQ0Z1DvIqIEXLd', '2023-06-08 22:05:42', '2023-06-08 22:05:42', NULL, NULL, 0),
(1953, 'Siyamala', 'Sithamparanathan', 'NO 0071', '1978-05-04', 1, 2, 5, 7, NULL, 'sisit04@gmail.com', NULL, NULL, NULL, NULL, 'female', '97192314', NULL, NULL, NULL, NULL, '$2y$10$su22d0rUY1b8UCiySLON2OU4YKYnUZka6lYdWqaKiuPBtlfNXFyly', NULL, NULL, 0, 0, 2, '0000-00-00', '4ipgMD0IiJOVwkUBFPmkpV5shQqCZeqNBG9Hb7lEgSQJ0ti4pFYv0Yh1IFGJ', '2023-06-08 22:27:34', '2023-06-08 22:28:36', NULL, NULL, 0),
(1954, 'Oviyan', 'Jeyakumar', 'NO 0072', '2011-07-22', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1953, 0, 0, 2, '0000-00-00', NULL, '2023-06-08 22:29:46', '2023-06-08 22:29:46', NULL, NULL, 0),
(1955, 'Steffan', 'Walter', 'EL 0060', '1990-01-17', 1, 2, 5, 2, NULL, 'steffan_w17@hotmail.com', NULL, NULL, NULL, NULL, 'male', '40061731', NULL, NULL, NULL, NULL, '$2y$10$hgcMfXDnaKSkU0mVvStUSeQ6wCr3HQSvGBcvUlF6jRlVGPCYheWn2', NULL, NULL, 0, 0, 2, '0000-00-00', '2fExV6lOBjLDWlCxTqbXWLYqDVAKjA5HZhh6aMtfDRjpoi9U6O2kr1gcsOwuUCsH', '2023-06-08 22:53:14', '2023-06-08 22:53:45', NULL, NULL, 0),
(1956, 'Tanya', 'Joy Amalathas', 'EL 0061', '2016-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', '9fk7XS3p7mCDC5Vk8MzgNaK4s7RpKUzEkWV0iGkB8D1yjOUo6hnNY063a6n1HRGB', '2023-06-08 23:31:29', '2023-06-08 23:31:29', NULL, NULL, 0),
(1957, 'joshua', 'tonypinto', 'EL 0062', '2011-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'nCPlWXXcdi24T9LPcqbUyWRuz8L1ANYSCoYEfE7MHiMeDA0ERziW22jk8qJT5aUn', '2023-06-08 23:39:53', '2023-06-08 23:39:53', NULL, NULL, 0),
(1958, 'Renila', 'Manuel', 'EL 0063', '1977-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'eQWv9GPqkPmaFkbDAPoRCNhwFmu1tT9LDjQdXh4xdHvIme2sgeveOCaawFpT77Kp', '2023-06-08 23:49:09', '2023-06-08 23:49:09', NULL, NULL, 0),
(1959, 'Jane sathya', 'Gregory', 'EL 0064', '2010-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'NxZKu0wCuoxLRQ7wRxETj3uMH4RaLQUqg1lqWwwcPwd5sGCQu3tUNcvgJPMsk74G', '2023-06-08 23:53:13', '2023-06-08 23:53:13', NULL, NULL, 0),
(1960, 'Dino', 'Havasgar', 'EL 0065', '2014-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'pSajPz0RhyhoxACaQPL5X4MswTqRkbvzNTbb8YQvAtymX08tdlY42DPN8jAJcc1A', '2023-06-09 00:00:31', '2023-06-09 00:00:31', NULL, NULL, 0),
(1961, 'akshaya', 'reji prabaharan', 'EL 0066', '2006-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', '9kWiA98Bu2GmpoEYZvyx3EqNTe2tXEfoPpHIdFURnf8qvsXYWFtBiAhSvUsFDkHb', '2023-06-09 00:09:03', '2023-06-09 00:09:03', NULL, NULL, 0),
(1962, 'Rekshana', 'reji prabaharan', 'EL 0067', '2008-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', '6fiLKtsmkOnGmjcHHyrRxsSADQqI7tUoz5TEgHW8kl90Fa574gIDFktFAdA0wsDE', '2023-06-09 00:12:34', '2023-06-09 00:12:34', NULL, NULL, 0),
(1963, 'Suthan', 'Vivekananthan', 'NO 0073', '1977-07-09', 1, 2, 5, 7, NULL, 'suthan77@outlook.com', NULL, NULL, NULL, NULL, 'male', '98486787', NULL, NULL, NULL, NULL, '$2y$10$wXinSQREKqGqDdXjd0nwOONoGaIPQv6r2sFsTpkqg9S8UZQTNfokm', NULL, NULL, 0, 0, 2, '0000-00-00', 'Wp1JrC4yTJUMJtJgTfGAkJ6Pu7hF2wyLgFc4yEPdmSPMCSR1rHSvClLJT97NL9M2', '2023-06-09 00:34:23', '2023-06-09 00:35:14', NULL, NULL, 0),
(1964, 'Attisha', 'Sutharsan', 'NO 0074', '2012-04-25', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1963, 0, 0, 2, '0000-00-00', NULL, '2023-06-09 00:37:27', '2023-06-09 00:37:27', NULL, NULL, 0),
(1965, 'Atharshan', 'Sutharsan', 'NO 0075', '2016-07-20', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1963, 0, 0, 2, '0000-00-00', NULL, '2023-06-09 00:38:05', '2023-06-09 00:38:05', NULL, NULL, 0),
(1966, 'Leon', 'Kohulan', 'NO 0076', '2009-10-15', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'gAwavr4vmkJLDHeKLGSv4MA7aPSBGAQCO9M05mZwreiN184toK1o5f1QuNsyDDUW', '2023-06-09 07:30:54', '2023-06-09 07:30:54', NULL, NULL, 0),
(1967, 'Rames', 'Murugesu', 'YO 0003', '1978-12-21', 1, 2, 5, 12, NULL, 'rames@live.no', NULL, NULL, NULL, NULL, 'male', '46786727', NULL, NULL, NULL, NULL, '$2y$10$Dhtmxu3rx0MrgxlGYOlwNejzOMAHcdzNyVvNEHWM1mV/lQQ7zynNu', NULL, NULL, 0, 0, 2, '0000-00-00', 'lPJ7MfTuvwWRr66KGkH81QNrLdS7OBrDnxp0B5BGrp6CPo7nYdEA9R7OG0dWdT3u', '2023-06-09 09:05:38', '2023-06-09 09:06:03', NULL, NULL, 0),
(1968, 'Youngstar  Samba', 'Rames', 'YO 0004', '2013-06-04', 1, 2, 5, 12, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', '0kbSPHziz31KRRDO3IQppJCaKpsWof1W5rZXn6NRSnu5P9G7Qgc6iPb1202cnfCI', '2023-06-09 10:55:52', '2023-06-09 10:55:52', NULL, NULL, 0),
(1969, 'Tara Samba', 'Rames', 'YO 0005', '2014-07-04', 1, 2, 5, 12, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', NULL, '', '', NULL, NULL, NULL, NULL, 1, 0, 2, '0000-00-00', 'gQxgcPAlzC4eDN2XfxDWgdf38YW9udlDjaOan0u1M7f0fVqyxqtAotBQdsj2p4O3', '2023-06-09 10:56:25', '2023-06-09 11:02:49', NULL, NULL, 0),
(1970, 'Virah Romeo', 'Jeyan', 'YO 0006', '2015-01-06', 1, 2, 5, 12, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'br9ILSIfoKmIxvaDEgWPYc8v36MATx2UURF0xVY8yAeWfoMAetDQHE5lhdv2mm2e', '2023-06-09 11:09:04', '2023-06-09 11:09:04', NULL, NULL, 0),
(1971, 'Aryanah Devaki', 'Jeyan', 'YO 0007', '2012-04-09', 1, 2, 5, 12, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'ct6FuU3WPzqLwMrSDQleodJFA5rpgM4lAQK4ww1m0FGrk0gwijlULRTXAWUJHpbn', '2023-06-09 11:18:19', '2023-06-09 11:18:19', NULL, NULL, 0),
(1972, 'Aksith', 'Elango', 'YO 0008', '2009-06-29', 1, 2, 5, 12, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'gxzO22VCMJnJ0KDiioxPPHU9Qj9D6sVQa3TO7u5WTlDhIy7RqEyecX4JBLFZUqwq', '2023-06-09 12:11:26', '2023-06-09 12:11:26', NULL, NULL, 0),
(1973, 'Vishakan', 'Elango', 'YO 0009', '2013-06-07', 1, 2, 5, 12, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'liN7vxhokV89yc4rcqhqEhN2tEuTSTtMQmALkd7SMKkStnVadqJrAH9VpTVHrKa0', '2023-06-09 12:12:02', '2023-06-09 12:12:02', NULL, NULL, 0),
(1974, 'Dilogen', 'Kamalarajan', 'SE 0049', '2005-10-26', 1, 2, 5, 10, NULL, 'dilo26102005@outlook.com', NULL, NULL, NULL, NULL, 'male', '95140054', NULL, NULL, NULL, NULL, '$2y$10$fBTSkMHCnRW84quOXp2nvO2Srpks.WpfmAycHAyRvSaNhmc5SL52e', NULL, NULL, 0, 0, 2, '0000-00-00', 'RvBDUeIqXeaqjcD5G8seIOBf4AvVrUa3PttjvK4Amtit1Rgvf3H7ALDMqMTNltLb', '2023-06-09 12:58:39', '2023-06-09 12:59:13', NULL, NULL, 0),
(1975, 'Thevaki', 'Gowrikumar', 'NO 0077', '1983-09-15', 1, 2, 5, 7, NULL, 'thevaki20@gmail.com', NULL, NULL, NULL, NULL, 'female', '96700046', NULL, NULL, NULL, NULL, '$2y$10$DjfyOi2b6ICCWruxdBUZROfdtRkLF8L0oEUAm3b3GRW7/5OS7ndaO', NULL, NULL, 0, 0, 2, '0000-00-00', 'CQSZFVGjs1Lz8tKghMF8akbJILRFZzZ6LR9kjpNT0r2EwhylB1l546kQ3fBoin3i', '2023-06-09 21:00:29', '2023-06-09 21:02:48', NULL, NULL, 0),
(1976, 'Gowshika', 'Gowrikumar', 'NO 0078', '2009-11-12', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1975, 0, 0, 2, '0000-00-00', NULL, '2023-06-09 21:05:45', '2023-06-09 21:05:45', NULL, NULL, 0),
(1977, 'Tharunni', 'Gowrikumar', 'NO 0079', '2013-01-07', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1975, 0, 0, 2, '0000-00-00', NULL, '2023-06-09 21:06:30', '2023-06-09 21:06:30', NULL, NULL, 0),
(1978, 'Gowrikumar', 'Sathiaseelan', 'NO 0080', '1978-05-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1975, 0, 0, 2, '0000-00-00', NULL, '2023-06-09 21:07:22', '2023-06-09 21:07:22', NULL, NULL, 0),
(1979, 'Mathusan', 'Gowrikumar', 'NO 0081', '2014-06-26', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1975, 0, 0, 2, '0000-00-00', NULL, '2023-06-09 21:10:57', '2023-06-09 21:10:57', NULL, NULL, 0),
(1980, 'Ahilathasan', 'Thamo', 'SE 0050', '1961-05-21', 1, 2, 5, 10, NULL, 'thamo21@gmail.com', NULL, NULL, NULL, NULL, 'male', '99697118', NULL, NULL, NULL, NULL, '$2y$10$qLYnm0HBu7caAakojDTz5uc.onUThPhDHbYXVcawdWWRbuD6FwfCu', NULL, NULL, 0, 0, 2, '0000-00-00', 'VgA1cdxiPDiS8L1fW7HrrABfQspSrIhWulcCeOY3fD3wxwzod1iqLMZzIU8v', '2023-06-09 22:17:51', '2023-06-09 22:18:41', NULL, NULL, 0),
(1981, 'Shanmuganathan', 'Vadivelnesan', 'SE 0051', '1964-03-06', 1, 2, 5, 10, NULL, 'vadsha@hotmil.com', NULL, NULL, NULL, NULL, 'male', '96829725', NULL, NULL, NULL, NULL, '$2y$10$7hgJ9jv.l3zZgVxBvdcyjec8rzw8UdTwC63m9/hsA4CZR/vYgbLLi', NULL, NULL, 0, 0, 1, '0000-00-00', 'E2CakNAFZgnIL25muaoYxczwniPQMaUi1yCi5XtYvl7m7ywYjSASbjJeCwN2HsQo', '2023-06-10 10:48:29', '2023-06-10 10:48:29', NULL, NULL, 0),
(1982, 'Unknown', 'Unknown', 'SE 0052', '1964-03-06', 10, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '96829725', NULL, NULL, NULL, NULL, '$2y$10$zbIYyksheSkJ.RitUuvVxuf1mkVqTalGWKayCC15Jpx6kYCPHLG7C', NULL, NULL, 0, 0, 1, '0000-00-00', 'CRbKqQtVokFFBL7FrNWTGxyipJM2mBcpQWIDKJ1hn9pzxejMt3a72DssFk8m7xoq', '2023-06-10 10:54:04', '2023-06-10 19:46:07', NULL, NULL, 0),
(1983, 'Nixon', 'Leenus', 'EL 0068', '1972-05-03', 1, 2, 5, 2, NULL, 'nixon2011@hotmail.no', NULL, NULL, NULL, NULL, 'male', '99509843', NULL, NULL, NULL, NULL, '$2y$10$CRLaNaIBaYF4E0nYyOoL9./Clpq2wBIfrAs79IUGiluxMPRK4YI1O', NULL, NULL, 0, 0, 2, '0000-00-00', 'InXqdkM2hgWSAsyClj7ZsQuAUnMrhnsNe6jTmcXWEVAwH53hFcLebeJljeEBUbAj', '2023-06-10 13:42:38', '2023-06-10 13:42:50', NULL, NULL, 0),
(1984, 'Nick', 'Nixon', 'EL 0069', '2007-04-21', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1983, 0, 0, 2, '0000-00-00', NULL, '2023-06-10 13:44:43', '2023-06-10 13:44:43', NULL, NULL, 0),
(1985, 'Nickel', 'Nixon', 'EL 0070', '2013-12-09', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1983, 0, 0, 2, '0000-00-00', NULL, '2023-06-10 13:45:32', '2023-06-10 13:45:32', NULL, NULL, 0),
(1986, 'Nickela', 'Nixon', 'EL 0071', '2017-08-03', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1983, 0, 0, 2, '0000-00-00', NULL, '2023-06-10 14:26:20', '2023-06-10 14:26:20', NULL, NULL, 0),
(1987, 'Sasikumar', 'Senathirajah', 'NO 0082', '1980-09-23', 1, 2, 5, 7, NULL, 'Sasisena@yahoo.no', NULL, NULL, NULL, NULL, 'male', '41514650', NULL, NULL, NULL, NULL, '$2y$10$i4H2pIpjcXjkklTJH4J1T.UN2B5Hc4v7sdPNzXxaCg4mp7A3HgxHi', NULL, NULL, 0, 0, 2, '0000-00-00', 'IpqkzZnvRH7oi10rDaskNiCiqff5eJ2lVRvwU9KtsOxy8UHGRLKI8KVSGLr4ySa7', '2023-06-10 17:36:40', '2023-06-10 17:37:16', NULL, NULL, 0),
(1988, 'Prisha Leora', 'Sasikumar', 'NO 0083', '2013-12-30', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1987, 0, 0, 2, '0000-00-00', NULL, '2023-06-10 17:39:03', '2023-06-10 17:39:03', NULL, NULL, 0),
(1989, 'Thusanth', 'Sivapathasundaram', 'YO 0010', '1981-11-25', 1, 2, 5, 12, NULL, 'thusanth.sivapathasundaram@gmail.com', NULL, NULL, NULL, NULL, 'male', '97509759', NULL, '', '', NULL, '$2y$10$DnWCCZBbGpxfwU1fvXyUxeucQPcjxdHNHcHZ/nDYAHAZJxU.Udpo6', NULL, NULL, 1, 0, 2, '0000-00-00', 'dAQc7X13X4kGV3ZFG9rmFzNGXPhmszh2YwJmbspYmyLyhVDkakAZXMx5IFNyVSMd', '2023-06-10 23:53:33', '2023-06-14 08:21:58', NULL, NULL, 0),
(1990, 'Amelia', 'Thusanth', 'YO 0011', '2013-01-23', 1, 2, 5, 12, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1989, 0, 0, 2, '0000-00-00', NULL, '2023-06-11 00:04:57', '2023-06-11 00:04:57', NULL, NULL, 0),
(1991, 'Aishriya', 'Thusanth', 'YO 0012', '2016-01-13', 1, 2, 5, 12, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1989, 0, 0, 2, '0000-00-00', NULL, '2023-06-11 00:05:25', '2023-06-11 00:05:25', NULL, NULL, 0),
(1992, 'Jeyarajan', 'Rajanathan', 'SE 0053', '1974-05-29', 1, 2, 5, 10, NULL, 'jeyarajan39@gmail.com', NULL, NULL, NULL, NULL, 'male', '41696484', NULL, NULL, NULL, NULL, '$2y$10$Jk3eXZcaNlel6P/kll0BJeG/kSI7eZjxIyqA9y85lRymI17UaJpkO', NULL, NULL, 0, 0, 2, '0000-00-00', 'GhOiXRHCOloJEhjK2zmKATNUne0tZ8bstJrR0oZISdlzXJVje18LiYKIpEhw', '2023-06-11 06:23:55', '2023-06-11 06:24:45', NULL, NULL, 0),
(1993, 'PULOMINA', 'JEYARAJAN', 'SE 0054', '1982-10-15', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1992, 0, 0, 2, '0000-00-00', NULL, '2023-06-11 06:36:02', '2023-06-11 06:36:02', NULL, NULL, 0),
(1994, 'LINUJAN', 'JEYARAJAN', 'SE 0055', '2015-06-13', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1992, 0, 0, 2, '0000-00-00', NULL, '2023-06-11 06:37:12', '2023-06-11 06:37:12', NULL, NULL, 0),
(1995, 'NIRSAN', 'JEYARAJAN', 'SE 0056', '2017-11-19', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1992, 0, 0, 2, '0000-00-00', NULL, '2023-06-11 06:38:07', '2023-06-11 06:38:07', NULL, NULL, 0),
(1996, 'KAVINAJA', 'JEYARAJAN', 'SE 0057', '2019-02-05', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1992, 0, 0, 2, '0000-00-00', NULL, '2023-06-11 06:38:57', '2023-06-11 06:38:57', NULL, NULL, 0),
(1997, 'JEYARAJAN', 'RAJANATHAN', 'SE 0058', '1974-05-29', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1992, 0, 0, 2, '0000-00-00', NULL, '2023-06-11 06:47:22', '2023-06-11 06:47:22', NULL, NULL, 0),
(1998, 'Visalan', 'Sivakugan', 'NO 0084', '2013-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'rg6eTPChn8U61hEs743IZVQAU8QAI5ftmk4Fx1SAzoIoEk0lNdjGGXi7U2VFvR7G', '2023-06-11 11:49:19', '2023-06-11 11:49:19', NULL, NULL, 0),
(1999, 'Visagan', 'Sivakugan', 'NO 0085', '2008-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'zRD8CXbeZw68hMVTudOwkp4BLvTkLPU4xr2fOE7VNBBnrOd2yRQ6PiUfoLYktAHd', '2023-06-11 11:50:35', '2023-06-11 11:50:35', NULL, NULL, 0),
(2000, 'Rimsha', 'Hariharan', 'NO 0086', '2007-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'DY9VkcHJSvMrRwEkL1wxWCGBNwL7wBnI6wZL0hjCIgQiChXYD2pZz5HsmzrNUohY', '2023-06-11 11:51:48', '2023-06-11 11:51:48', NULL, NULL, 0),
(2001, 'Mithira', 'Nirujan', 'NO 0087', '2018-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', '21kWvQ5Tc7AJDn0aGTndBL8XKFZOR413KEkSHL0sQ1yY7AC31MJz4CRBj298KFQL', '2023-06-11 12:12:11', '2023-06-11 12:12:11', NULL, NULL, 0),
(2002, 'Shobi', 'Yogarasa', 'SE 0059', '1982-11-01', 1, 2, 5, 10, NULL, 'shobi2@hotmail.com', NULL, NULL, NULL, NULL, 'female', '40759839', NULL, NULL, NULL, NULL, '$2y$10$9zAI0hGoMOxhzp0tg4YwVu/RNXSTAkFKG6Vydf8Z13Rdgd/mXvSMy', NULL, NULL, 0, 0, 2, '0000-00-00', '0L9xvjaFSdMEGsjcF5ZeYj9on366hZCIbkWBcAARNMuQj9aKalgjsTO5eyOcFiSm', '2023-06-11 17:05:18', '2023-06-11 17:05:48', NULL, NULL, 0),
(2003, 'Roshan', 'Vakeesan', 'SE 0060', '2009-06-04', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '', NULL, '', '', NULL, NULL, NULL, 2002, 1, 0, 2, '0000-00-00', NULL, '2023-06-11 17:07:14', '2023-06-14 08:46:35', NULL, NULL, 0),
(2004, 'Roshana', 'Vakeesan', 'SE 0061', '2009-06-04', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2002, 0, 0, 2, '0000-00-00', NULL, '2023-06-11 17:07:46', '2023-06-11 17:07:46', NULL, NULL, 0),
(2005, 'Rukshan', 'Vakeesan', 'SE 0062', '2009-06-04', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2002, 0, 0, 2, '0000-00-00', NULL, '2023-06-11 17:08:14', '2023-06-11 17:08:14', NULL, NULL, 0),
(2006, 'Rithushan', 'Vakeesan', 'SE 0063', '2013-02-03', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2002, 0, 0, 2, '0000-00-00', NULL, '2023-06-11 17:08:48', '2023-06-11 17:08:48', NULL, NULL, 0),
(2007, 'Vakeesan', 'Selvaratnam', 'SE 0064', '1982-10-08', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2002, 0, 0, 2, '0000-00-00', NULL, '2023-06-11 17:09:19', '2023-06-11 17:09:19', NULL, NULL, 0),
(2008, 'Harni', 'Varathan', 'EL 0072', '2007-09-05', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', NULL, 'Drammen', 'Lauritz Hervigs vei 51A   3035 Drammen', NULL, NULL, NULL, 1858, 1, 0, 2, '0000-00-00', NULL, '2023-06-11 18:05:35', '2023-06-11 18:08:02', NULL, NULL, 0),
(2009, 'Pathmanathan', 'Nalliah', 'EL 0073', '1961-08-14', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1858, 0, 0, 2, '0000-00-00', NULL, '2023-06-11 18:08:44', '2023-06-11 18:08:44', NULL, NULL, 0),
(2010, 'Nerushanth', 'Varathan', 'EL 0074', '2005-05-23', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1858, 0, 0, 2, '0000-00-00', NULL, '2023-06-11 18:09:54', '2023-06-11 18:09:54', NULL, NULL, 0),
(2011, 'Niros', 'Manoharan', 'PR 0004', '1989-05-12', 1, 2, 5, 9, NULL, 'niros89@gmail.com', NULL, NULL, NULL, NULL, 'male', '91347475', NULL, NULL, NULL, NULL, '$2y$10$W2f59VwnmSCMuFqB/Ah6Ue/B.VLVTlZe2mbUEgbjFWOhpDJP5NqyK', NULL, NULL, 0, 0, 2, '0000-00-00', '47UC8lxE3BayTQ9DsYCg91OC3XJrLO9LBPngXqGIbXAZxiCzAI2q4yXJG99kNnB7', '2023-06-11 20:40:31', '2023-06-11 20:41:02', NULL, NULL, 0),
(2012, 'Vira', 'Niros', 'PR 0005', '2021-05-12', 1, 2, 5, 9, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2011, 0, 0, 2, '0000-00-00', NULL, '2023-06-11 20:42:31', '2023-06-11 20:42:31', NULL, NULL, 0),
(2013, 'Thanusha', 'Balendran', 'NO 0088', '1985-02-06', 1, 2, 5, 7, NULL, 'thanu19@hotmail.com', NULL, NULL, NULL, NULL, 'female', '48301259', NULL, NULL, NULL, NULL, '$2y$10$7xqdbeo4K6mEbkVnT5Yc/.WCwUVS8QSrYNryZ9gkKbJ9qk9j/BiNW', NULL, NULL, 0, 0, 2, '0000-00-00', 'caDMtu4HF0trTqoG6uPQxq3EUYJ6Jnyyf0AMgOSS3X23MsLdZ2vPyxXh5t8ltO28', '2023-06-12 07:14:51', '2023-06-12 07:16:16', NULL, NULL, 0),
(2014, 'Bhumika', 'Kaveenthiren', 'NO 0089', '2008-12-19', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2013, 0, 0, 2, '0000-00-00', NULL, '2023-06-12 07:17:34', '2023-06-12 07:17:34', NULL, NULL, 0),
(2015, 'Tivakar', 'Kaveenthiren', 'NO 0090', '2012-03-08', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2013, 0, 0, 2, '0000-00-00', NULL, '2023-06-12 07:18:04', '2023-06-12 07:18:04', NULL, NULL, 0),
(2016, 'Dibeca', 'Kaveenthiren', 'NO 0091', '2015-03-03', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2013, 0, 0, 2, '0000-00-00', NULL, '2023-06-12 07:18:23', '2023-06-12 07:18:23', NULL, NULL, 0),
(2017, 'Jokenthiran', 'Moorthy', 'SE 0065', '1981-12-06', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'wESfIBDiGShi9Gp2OWnGshxHRfVbSAukV5RnjTYmn8q6eURTkCPG2X7fqghrkQYm', '2023-06-12 14:26:54', '2023-06-12 14:26:54', NULL, NULL, 0),
(2018, 'lsaya Sofie', 'Sri', 'SE 0066', '2014-12-14', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'gQRB8UYsilBkhJvARgcRKdBJLrtXvISGchrCWbvvWrz0lcW7XmffAH2UMh9Pazzx', '2023-06-12 14:30:34', '2023-06-12 14:30:34', NULL, NULL, 0),
(2019, 'Mokithan', 'Mathanaruban', 'SE 0067', '2005-02-24', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1841, 0, 0, 2, '0000-00-00', NULL, '2023-06-12 16:06:08', '2023-06-12 16:06:08', NULL, NULL, 0),
(2020, 'Sharanya', 'Mathanarupan', 'SE 0068', '2006-09-23', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', NULL, '', '', NULL, NULL, NULL, 1841, 1, 0, 2, '0000-00-00', NULL, '2023-06-12 16:07:28', '2023-06-13 20:57:17', NULL, NULL, 0),
(2021, 'Tarjana', 'Mathanarupan', 'SE 0069', '2012-12-19', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1841, 0, 0, 2, '0000-00-00', NULL, '2023-06-12 16:08:30', '2023-06-12 16:08:30', NULL, NULL, 0);
INSERT INTO `users` (`id`, `first_name`, `last_name`, `userId`, `dob`, `is_approved`, `country_id`, `organization_id`, `club_id`, `season_id`, `email`, `guardian_name`, `guardian_mail`, `guardian_number`, `email_verified_at`, `gender`, `tel_number`, `state`, `city`, `address`, `postal`, `password`, `profile_pic`, `parent_id`, `first_login`, `member_or_not`, `status`, `membership_updated_year`, `remember_token`, `created_at`, `updated_at`, `two_factor_code`, `two_factor_expires_at`, `enable_two_factor`) VALUES
(2022, 'Unknown', 'Unknown', 'SE 0070', '1982-05-22', 10, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', NULL, '', '', NULL, NULL, NULL, 1841, 1, 0, 2, '0000-00-00', NULL, '2023-06-12 16:11:09', '2023-06-13 22:29:03', NULL, NULL, 0),
(2023, 'Unknown', 'Unknown', 'SE 0071', '2018-04-02', 10, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '', NULL, '', '', NULL, NULL, NULL, 1841, 1, 0, 2, '0000-00-00', NULL, '2023-06-12 16:11:53', '2023-06-13 22:28:51', NULL, NULL, 0),
(2024, 'TCC', 'ClubAdmin', 'TC 0009', '2020-01-01', 1, 2, 5, 1, NULL, 'tccclubadmin@tamilsport.app', NULL, NULL, NULL, NULL, 'male', '', NULL, NULL, NULL, NULL, '$2y$10$HEfJXk6O2sy5qdq4WoQyYe5ahdP.xFj5kxBzg3Snk6dILNT6KiIp2', NULL, NULL, 0, 0, 2, '0000-00-00', 'Okz07e1LEGKsKlbc5BBpplCR0OQcugyuhgwMZPQXumWeR0uyMGjcg704VsevibQH', '2023-06-12 18:55:50', '2023-06-12 18:55:50', NULL, NULL, 0),
(2025, 'Shan', 'Test', 'TC 0010', '2000-12-01', 1, 2, 5, 1, NULL, 'shantest@tamilsport.app', NULL, NULL, NULL, NULL, 'male', '', NULL, NULL, NULL, NULL, '$2y$10$eZ1V7rYXBVhBJM7Rd3HszOji.775RPpMI/53zJLEHAIsZAvPiv3/6', NULL, NULL, 0, 0, 2, '0000-00-00', 'KnDDOW9YWZAjNodffKufO7DVPnmPcQvcMaqiaTBgYKQfspFcGI9AioZOHJAltXnL', '2023-06-12 19:09:20', '2023-06-12 19:09:20', NULL, NULL, 0),
(2026, 'enoch', 'Rickman', 'EL 0075', '2012-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'HTMkZKGGLqFhNG7gi6USe1iLRRzxTAeDKKijyMRsIo8d9WQV0Wb6MVzj6NlZIIbW', '2023-06-12 21:24:37', '2023-06-12 21:24:37', NULL, NULL, 0),
(2027, 'Unknown', 'Unknown', 'NO 0092', '2008-01-01', 10, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'IR1romnFeGs3y12peUoHsEXWExqwllhJg0WrhlI9pjJ1Stjr0EIDX01cYqWVd6Lj', '2023-06-12 21:45:32', '2023-06-12 21:46:19', NULL, NULL, 0),
(2028, 'Satiya', 'Premaheshan', 'SE 0072', '2013-11-14', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'KXexJPQVGN9UBfm1zQNAjw1faZxaRj94gEbZzOrr0fkasEFIZpzxEmwxlzRavNvZ', '2023-06-12 22:44:01', '2023-06-12 22:44:01', NULL, NULL, 0),
(2029, 'Kesanth', 'Premaheshan', 'SE 0073', '2007-03-27', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'AkXWoYkrTcCpEYL6vNnOi5xOtK7uubq2oYqm3gGbTCElxUIKVZDaBBzRr6c56GFA', '2023-06-12 22:46:26', '2023-06-12 22:46:26', NULL, NULL, 0),
(2030, 'Sivanantham', 'Senathirajah', 'LR 0032', '1969-01-21', 1, 2, 5, 5, NULL, 'kalpanasiva@hotmail.com', NULL, NULL, NULL, NULL, 'male', '99771742', NULL, NULL, NULL, NULL, '$2y$10$aB9EYGK4eIu40J3iwftHB.CliQaWk34O3.9vIiU2XYqQMtdkQRpz.', NULL, NULL, 0, 0, 2, '0000-00-00', 'jZKmH45g3FlAp5RzOY9Q64nSc86VPBO7fdq9Gz74tLmz6t2RMQjS3qXba4Zu', '2023-06-12 22:53:45', '2023-06-12 22:54:37', NULL, NULL, 0),
(2031, 'Tasaratsing', 'Gunenthiran', 'ST 0011', '2005-06-18', 1, 2, 5, 11, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1792, 0, 0, 2, '0000-00-00', NULL, '2023-06-13 00:29:16', '2023-06-13 00:29:16', NULL, NULL, 0),
(2032, 'Tvarida Thea', 'Gunenthiran', 'ST 0012', '2007-12-07', 1, 2, 5, 11, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1792, 0, 0, 2, '0000-00-00', NULL, '2023-06-13 00:32:01', '2023-06-13 00:32:01', NULL, NULL, 0),
(2033, 'Akhil', 'Vimal', 'YO 0013', '2017-01-10', 1, 2, 5, 12, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'erzmcLplxVSlkZuTEf8zDAq7hu5kiRkCOlXPHfJT8iKyXEjA0mcAXtdv2KmFqgqJ', '2023-06-13 10:14:30', '2023-06-13 10:14:30', NULL, NULL, 0),
(2034, 'Premkumar', 'Mathiyas', 'NO 0093', '1984-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'HROnre9XEYamuROEzTe4Z8UtwWIXsZj51Mav3zCJKjr3dCVRtB65C6gmaWdrqMeq', '2023-06-13 10:21:32', '2023-06-13 10:21:32', NULL, NULL, 0),
(2035, 'Supasiny', 'Premkumar', 'NO 0094', '1989-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'CYQQk94rHZ99GuOUfpW2ncLPEDE1iv5ykbIXzngzXiTSKYsNpD2IkDF76VVTsfdP', '2023-06-13 10:22:17', '2023-06-13 10:22:17', NULL, NULL, 0),
(2036, 'Preben', 'Premkumar', 'NO 0095', '2014-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'wZ94Ol3MSKDjua0AYa5pe6KVOyusWJ5y3vL5eAfNEUgUM7QSF4ZerwEX5X2hC9v4', '2023-06-13 10:22:49', '2023-06-13 10:22:49', NULL, NULL, 0),
(2037, 'Prebica', 'Premkumar', 'NO 0096', '2017-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'H7PJ7P1lC2wGCcMuxBzc2x7z9l3J9xT0dwyRAY0thk4WCSkrKRhMLmai9GmSvBUG', '2023-06-13 10:23:56', '2023-06-13 10:23:56', NULL, NULL, 0),
(2038, 'Varnikka', 'Sivakugan', 'NO 0097', '2015-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'zBFXjfIDrxSJNhUrwghWM9Ko2zgY5TqECzQBDOjA4ttww61cT8usAkQLlunepTOb', '2023-06-13 10:24:52', '2023-06-13 10:24:52', NULL, NULL, 0),
(2039, 'Malena', 'Thusyanthan', 'YO 0014', '2018-05-15', 1, 2, 5, 12, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'SqUCZGpAiw8mNiBAB3oUgjVvcvqiktPXuJIPPf04SoQcuRyXz1JNjUCnHLsYnSHp', '2023-06-13 10:25:28', '2023-06-13 10:25:28', NULL, NULL, 0),
(2040, 'Gobinath', 'Sithamparanathan', 'LR 0033', '1976-02-09', 1, 2, 5, 5, NULL, 'ramyaxs@hotmail.com', NULL, NULL, NULL, NULL, 'male', '92236435', '', '', '', '', '$2y$10$Q8/QEZm.NubCo0DanpZy6urYCt5vJYtdIfEP3R/jyom7Ib4b2x07i', NULL, NULL, 1, 0, 2, '0000-00-00', 'AKZ0l9nwBYJjxU6FUk4NdN2pJMcC4FSHTWQcnSVD9rU1610wlnZibgWdaPZIje8L', '2023-06-13 13:03:56', '2023-06-13 13:07:07', NULL, NULL, 0),
(2041, 'Venuga', 'Ramanathan', 'LR 0034', '1976-04-09', 1, 2, 5, 5, NULL, 'venuttkt@gmail.com', NULL, NULL, NULL, NULL, 'female', '97886365', NULL, NULL, NULL, NULL, '$2y$10$mNF6YyqY3msuTQ9fA8TvLuhXwVai7Csn.j89YsxeUMdz9EnEk44bO', NULL, NULL, 0, 0, 1, '0000-00-00', 'g7ot7Ugcqane04qREEM1ojgRmZkloiQmhXBgzc7khOyOCU6UJXNsLSICMM4psdz0', '2023-06-13 14:15:47', '2023-06-13 14:15:47', NULL, NULL, 0),
(2042, 'Ragavan', 'Sinnathampy', 'NS 0009', '1970-01-01', 1, 2, 5, 8, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'b3d8oBFTP66IDEMSrjYeFdu9XGWpeAPzgtAkVQ7YthUCLWsHOOCsllBhkTWnCI08', '2023-06-13 14:26:01', '2023-06-13 14:26:01', NULL, NULL, 0),
(2043, 'Janujan', 'Ragavan', 'NS 0010', '2006-01-01', 1, 2, 5, 8, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'oYmWKxmL6Dp1nMM2BxacKgWQwwjls1H6rvjNnEDjOdeHU7RWgNNAwF6o77yvxCmm', '2023-06-13 14:28:04', '2023-06-13 14:28:04', NULL, NULL, 0),
(2044, 'Jarasan', 'Ragavan', 'NS 0011', '2010-01-01', 1, 2, 5, 8, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'QDRXblm4BQO9uwMZ89GSp5LXToDrDYoBovxWDQCKKpb4CK5SbzWCzSVQXz5PlYDy', '2023-06-13 14:29:32', '2023-06-13 14:29:32', NULL, NULL, 0),
(2045, 'Vipujan', 'Ragavan', 'NS 0012', '2018-01-01', 1, 2, 5, 8, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'Ynzbm90V1PqIxAjQEVnChUBDkPXZtezr7FCQh4CZ35oRsy84uRt8zs3hWbQBj4FK', '2023-06-13 14:31:11', '2023-06-13 14:31:11', NULL, NULL, 0),
(2046, 'Karthika', 'Ragavan', 'NS 0013', '1981-01-01', 1, 2, 5, 8, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'j8nAIjpnMOxSd55e4UsAFfstsAEgoGnzcu2af8oWUT1T7BSEMgTfjEWYletVqa29', '2023-06-13 14:38:44', '2023-06-13 14:38:44', NULL, NULL, 0),
(2047, 'Linnea', 'Gobinath', 'LR 0035', '2010-09-10', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2040, 0, 0, 2, '0000-00-00', NULL, '2023-06-13 17:31:40', '2023-06-13 17:31:40', NULL, NULL, 0),
(2048, 'Leah', 'Gobinath', 'LR 0036', '2015-03-11', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2040, 0, 0, 2, '0000-00-00', NULL, '2023-06-13 17:32:27', '2023-06-13 17:32:27', NULL, NULL, 0),
(2049, 'Tharash', 'Gowrishanger', 'LR 0037', '2015-10-24', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '', NULL, '', '', NULL, NULL, NULL, NULL, 1, 0, 2, '0000-00-00', '0TtHpKdoBi3QL2xcyZIghh89xYkhxe5FtfvhJoXocw3p5ZobMJrFGt5La3nfGlzh', '2023-06-13 20:35:56', '2023-06-13 20:38:28', NULL, NULL, 0),
(2050, 'Tharush', 'Ketheeswaran', 'LR 0038', '2014-04-17', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'l1PbuQe0E7m5KS4yKlVwL8GCPoJmprpWYrE31pAxwA4PmuuLpV0JzdMJOndanY1d', '2023-06-13 20:41:57', '2023-06-13 20:41:57', NULL, NULL, 0),
(2051, 'Arish', 'Ketheeswaran', 'LR 0039', '2018-03-22', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'hsXCJPDk7HOKc9m5uj93LQft6m6h8e2ygyLEPpmVB4sr3P5oiqFOfnYONlBdrJLh', '2023-06-13 20:43:35', '2023-06-13 20:43:35', NULL, NULL, 0),
(2052, 'Varnavi', 'Partheeban', 'LR 0040', '2016-01-01', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'un87GQTddHxz0Vx3Gwr2YC3kTXMKsB6Hlb99oZqx2SwPPkaWoYpDNUOn8ONFZl0K', '2023-06-13 20:46:38', '2023-06-13 20:46:38', NULL, NULL, 0),
(2053, 'Biranavi', 'Partheeban', 'LR 0041', '2013-01-01', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', '435CbBfxMd8yP2By3b4YKfqgSofVgzNnApUOzEZuABGs2bGX7TCrPF6aLyDt4oXN', '2023-06-13 20:47:17', '2023-06-13 20:47:17', NULL, NULL, 0),
(2054, 'Susigala', 'Sasitharan', 'NS 0014', '1979-01-01', 1, 2, 5, 8, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'wzR9iGmPVFKUQvfpF3YaOVtXHbfxV4M95mIoyILRFSkExrSfxRWHx5hogpGPwst7', '2023-06-13 21:21:19', '2023-06-13 21:21:19', NULL, NULL, 0),
(2055, 'Pamodini', 'Sutharshan', 'NS 0015', '1971-01-01', 1, 2, 5, 8, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'S0V96vHY4rUncTmXpgVzbhmb7CFblXZnjJMmyq6AbnnIFPBOIe1QlARSh5KAT39W', '2023-06-13 21:23:20', '2023-06-13 21:23:20', NULL, NULL, 0),
(2056, 'Santhos', 'Inpanathan', 'SE 0074', '2001-02-03', 1, 2, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'nPicHDL6efAcuIcVEryjzyOH4RzekwUUG9c3BzYriJQse2P3J6T12kNqkoiYnfYL', '2023-06-13 22:35:05', '2023-06-13 22:35:05', NULL, NULL, 0),
(2057, 'Lishanthy', 'Tharshanth', 'NO 0098', '1988-01-26', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1798, 0, 0, 2, '0000-00-00', NULL, '2023-06-13 23:16:40', '2023-06-13 23:16:40', NULL, NULL, 0),
(2058, 'stacy', 'walter', 'EL 0076', '1992-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'tuztTjSDzrTnKRpx4u7yfE0ro8jzZA7uoM22BnLj6pbazCWrWpJ3PEgDNCJWLSQ7', '2023-06-13 23:49:28', '2023-06-13 23:49:28', NULL, NULL, 0),
(2059, 'nishani', 'bergman', 'EL 0077', '1988-01-01', 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'MWWYtAYs3LYSrNMvA1LhaIiNAY5q4xgA9BFY8UtIuHPV3L0I4HEMSWArSOPs1z7h', '2023-06-13 23:50:28', '2023-06-13 23:50:28', NULL, NULL, 0),
(2060, 'Subin', 'Suresh', 'NO 0099', '2013-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'm9pjnEAFCA8hWZ4MJWgHabaG8inSCsMgPdJ2D3wV8sqgTxm16y7pcsR9iv9fuQVP', '2023-06-14 01:31:42', '2023-06-14 01:31:42', NULL, NULL, 0),
(2061, 'Dennis', 'Pinto', 'NO 0100', '1991-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'xVmsVGTgpvllTdsqOf4O0g3uzvvKegmylqNjYethQ2GREkvKaoDClaUpTmDDf8PO', '2023-06-14 01:33:20', '2023-06-14 01:33:20', NULL, NULL, 0),
(2062, 'Shahitya', 'Senthilnathan', 'NO 0101', '2010-01-01', 1, 2, 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'U1SA5M4lS8aYHKdvrlLJjzQeN5jqSKYBhlG08SphzN872eYYm8UaBvtIxxxo4HES', '2023-06-14 01:34:53', '2023-06-14 01:34:53', NULL, NULL, 0),
(2063, 'Vino', 'Sivakumar', 'TC 0011', '1981-05-14', 1, 2, 5, 1, NULL, 'raj_vino@hotmail.com', NULL, NULL, NULL, NULL, 'female', '93885250', NULL, NULL, NULL, NULL, '$2y$10$JwhAKLhSwuU4wqoUjCzqPuGYUoaaSenzyGO4PiJDIx2nqfl0iuG/a', NULL, NULL, 0, 0, 2, '0000-00-00', 'Onf3FcnA1J8EIMKHYAKfHtTcNHbGkmiHQg2emIo0kR15dpEEKXi9fZscwHeeE3hS', '2023-06-14 10:25:01', '2023-06-14 10:32:39', NULL, NULL, 0),
(2064, 'Tcc', 'Admin', 'TC 0012', '2000-01-01', 1, 2, 5, 1, NULL, 'tccadmin@sangamil.com', NULL, NULL, NULL, NULL, 'male', '+47', NULL, NULL, NULL, NULL, '$2y$10$.A63Wlafk2sOTgG2Dyt1lefVkW.msJGFZfr57vu3FPA5wEO0k9POK', NULL, NULL, 0, 0, 2, '0000-00-00', 'zOEh3iqoKvwhz3TQsxJxgNg02M40PINaEHjTfXZnafhQKZcPITShZAAbvaai', '2023-06-14 23:41:19', '2023-06-14 23:41:19', NULL, NULL, 0),
(2065, 'Judge', 'Test', 'TC 0013', '2000-01-01', 1, 2, 5, 1, NULL, 'judgetest@sangamil.com', NULL, NULL, NULL, NULL, 'male', '', NULL, NULL, NULL, NULL, '$2y$10$NrCPMa9A1ULjMdDOzyPymePHgh2XlCngcCL5BbK6k0pG000R9klN.', NULL, NULL, 0, 0, 2, '0000-00-00', '4tZYWuOCdcLJfrx0p9hDy34yR4jt4bJpLo3Zcpcesxh0xQyBHK4ZmHcUIBB0MCDg', '2023-06-15 00:25:33', '2023-06-15 00:25:33', NULL, NULL, 0),
(2066, 'Starter', 'Test', 'TC 0014', '2000-01-01', 1, 2, 5, 1, NULL, 'startertest@sangamil.com', NULL, NULL, NULL, NULL, 'male', '', NULL, NULL, NULL, NULL, '$2y$10$/0KsN6rcNwbk8Y3D/mUkmuairtfMGtPPWDLrspCKnjg1YfnNEfvAi', NULL, NULL, 0, 0, 2, '0000-00-00', 'sK8A91GwKfWlhT7KGo2f7pYknC8lH61Xvo4WW3eHny7UrBjabCps0IY2vtVT', '2023-06-15 00:26:46', '2023-06-15 00:26:46', NULL, NULL, 0),
(2067, 'Eventorg', 'Test', 'TC 0015', '2000-01-01', 1, 2, 5, 1, NULL, 'eventorgtest@sangamil.com', NULL, NULL, NULL, NULL, 'male', '', NULL, NULL, NULL, NULL, '$2y$10$SXHsQNp3Gq5ejRbCkEGcOuUzElPbphdmDKomPlWzScUY1bgHIV5Qq', NULL, NULL, 0, 0, 2, '0000-00-00', 'vHgqfHNpxaiIFvMIrJl5dtvb70YbKNA3Wi1TQ0lyfn2BZTNieg7Cj41g6tCd', '2023-06-15 00:28:04', '2023-06-15 00:28:04', NULL, NULL, 0),
(2068, 'startertccone', 'starter001', 'TC 0016', '1990-10-10', 1, 2, 5, 1, NULL, '001starter@gmail.com', NULL, NULL, NULL, NULL, 'male', '122222', '', '', '', '', '$2y$10$KfIUvYnwraD6Qew0PuTK4.sdYczNkqX/Kg/vkud2fNfva8VmXj3tq', NULL, NULL, 1, 0, 2, '0000-00-00', NULL, '2023-06-15 09:30:59', '2023-06-20 09:07:26', NULL, NULL, 0),
(2069, 'startertcctwo', 'starter002', 'TC 0017', '1990-10-11', 1, 2, 5, 1, NULL, '002starter@gmail.com', NULL, NULL, NULL, NULL, 'male', '122222', '', '', '', '', '$2y$10$6SPQJBix2sdvfPt4yZM4tOg/ov9GDOxHAX4vf0.V0dKEnF03mcY9C', NULL, NULL, 1, 0, 2, '0000-00-00', NULL, '2023-06-15 09:30:59', '2023-06-20 09:07:47', NULL, NULL, 0),
(2070, 'startertccthree', 'starter003', 'TC 0018', '1990-10-12', 1, 2, 5, 1, NULL, '003starter@gmail.com', NULL, NULL, NULL, NULL, 'male', '122222', '', '', '', '', '$2y$10$DfMbIIosfb7g7e1RiY.gVeXcSBawgIAH5pfS0GHqlTbAQl/fE43q2', NULL, NULL, 1, 0, 2, '0000-00-00', NULL, '2023-06-15 09:30:59', '2023-06-20 09:08:03', NULL, NULL, 0),
(2071, 'Tccjudgeone', 'judge001', 'TC 0019', '1990-10-13', 1, 2, 5, 1, NULL, '001judge@gmail.com', NULL, NULL, NULL, NULL, 'male', '122222', '', '', '', '', '$2y$10$hKZXE6NXuNpKDa7MrgkLX.IYgFMHEvVQ8IgFp6NBnEVvN0szCGg7W', NULL, NULL, 1, 0, 2, '0000-00-00', NULL, '2023-06-15 09:30:59', '2023-06-20 09:04:51', NULL, NULL, 0),
(2072, 'Tccjudgetwo', 'judge002', 'TC 0020', '1990-10-14', 1, 2, 5, 1, NULL, '002judge@gmail.com', NULL, NULL, NULL, NULL, 'male', '122222', '', '', '', '', '$2y$10$QtW6CRNkVrXVUQ07oXq7QuFShjAPs0rYzOrcus16hATQwcZctW/5i', NULL, NULL, 1, 0, 2, '0000-00-00', NULL, '2023-06-15 09:31:00', '2023-06-20 09:05:32', NULL, NULL, 0),
(2073, 'Tccjudgethree', 'judge003', 'TC 0021', '1990-10-15', 1, 2, 5, 1, NULL, '003judge@gmail.com', NULL, NULL, NULL, NULL, 'male', '122222', '', '', '', '', '$2y$10$0n3FlRXXvgmP6noZZnZsLO1VBQ1yJeO/0debhAPBwPPBeLE4v1XYi', NULL, NULL, 1, 0, 2, '0000-00-00', NULL, '2023-06-15 09:31:00', '2023-06-20 09:05:54', NULL, NULL, 0),
(2074, 'Tccjudgefour', 'judge004', 'TC 0022', '1990-10-16', 1, 2, 5, 1, NULL, '004judge@gmail.com', NULL, NULL, NULL, NULL, 'male', '122222', '', '', '', '', '$2y$10$7vuNa.JuK/hE7Qrkx4Xi9u/wtj0p2KD3W9WketNamjTe93XO3.emW', NULL, NULL, 1, 0, 2, '0000-00-00', NULL, '2023-06-15 09:31:00', '2023-06-20 09:06:18', NULL, NULL, 0),
(2075, 'Tccjudgefive', 'judge005', 'TC 0023', '1990-10-17', 1, 2, 5, 1, NULL, '005judge@gmail.com', NULL, NULL, NULL, NULL, 'male', '122223', '', '', '', '', '$2y$10$e4CzeGA7jyXTVx09XRr2OOKGLeCWH2xvxpYzLUePV.ok5I9aZBWgO', NULL, NULL, 1, 0, 2, '0000-00-00', NULL, '2023-06-15 09:31:00', '2023-06-20 09:06:38', NULL, NULL, 0),
(2076, 'Stovner', 'IL', 'ST 0013', '2000-01-01', 1, 2, 5, 11, NULL, 'stovner1@sangamil.com', NULL, NULL, NULL, NULL, 'male', '', NULL, NULL, NULL, NULL, '$2y$10$wOKbxXZitKyKwWHwGP5QjuxcriRSyxZdSSrETy44sn58Yzy.p2hPC', NULL, NULL, 0, 0, 2, '0000-00-00', 'BMG2Hv5d2Tc6ttTmFen8RNf3TYk8LYeZuz0TukslYbUyEsMjXI4egkkIKoaeAmhq', '2023-06-15 20:00:43', '2023-06-15 20:00:43', NULL, NULL, 0),
(2077, 'Ilanthalir', 'IL', 'IA 0003', '2000-01-01', 1, 2, 5, 4, NULL, 'ilanthalir1@sangamil.com', NULL, NULL, NULL, NULL, 'male', '', NULL, NULL, NULL, NULL, '$2y$10$hC4BjN6f01Cbcb3Z4McbKu4lCvQYEuG6VveCndMN9TnuChFpcIZ9y', NULL, NULL, 0, 0, 2, '0000-00-00', 'u1St5mdASgld8et7YmeRzwPpU6DgoC8yyjIeywAMvLnzQxCTo5lwuOb7SaswFw55', '2023-06-15 20:02:36', '2023-06-15 20:02:36', NULL, NULL, 0),
(2078, 'Balendren', 'Kanagarathnam', 'IA 0004', '2015-06-15', 1, 2, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'yLJdy5cLkQHZ29weotaq7UtltLPGuYW8qAzkqMNZx537u1g4RKHov9QL9MAtzurL', '2023-06-15 20:03:43', '2023-06-15 20:03:43', NULL, NULL, 0),
(2079, 'Hari', 'Kumar', 'ST 0014', '2015-01-01', 1, 2, 5, 11, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', '75ULwzkytUCzvpDdpUj5HiFmeUmvKZv4GGWedQ0WUyAOcIZWRlLieJgmMoNdp5zX', '2023-06-15 20:03:56', '2023-06-15 20:03:56', NULL, NULL, 0),
(2080, 'Narthahi', 'Balendren', 'IA 0005', '2015-07-22', 1, 2, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'rPYs6V90PROkjSs82KOcK1H6eBPvgK1FvKZywy2mDTuroQWE02OV7a4MF0geL97N', '2023-06-15 20:04:12', '2023-06-15 20:04:12', NULL, NULL, 0),
(2081, 'Denis', 'Arul', 'ST 0015', '2015-02-02', 1, 2, 5, 11, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'KlgWK4YEbvFAe7fT9aOO6NOtHzWZa0NZA7cGFienkNLXdhLhK2TI3X2WjDFwdPdy', '2023-06-15 20:04:54', '2023-06-15 20:04:54', NULL, NULL, 0),
(2082, 'Sabthahi', 'Balendren', 'IA 0006', '2015-06-23', 1, 2, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', '7frhIvmPQ6couoghBqWW7Hpq2fe3RslddhnMM1vaQCTT3SgPH9iTTRbneksxPjy0', '2023-06-15 20:04:54', '2023-06-15 20:04:54', NULL, NULL, 0),
(2083, 'ShanA', 'Test', 'LR 0042', '2010-01-01', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'cyGtQtns0BwBxloFoStU18DQZxrSnbP4jof40FHiXtnT3BUhEJkPGuFCNfGL0lgu', '2023-06-16 00:41:25', '2023-06-16 00:41:25', NULL, NULL, 0),
(2084, 'ShanB', 'Test', 'LR 0043', '2010-01-01', 1, 2, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '0000-00-00', 'mfGRcelaQgkfPYMtWwXbdKRBTKZUwtsL0I6wxsdO7uGLBQPjlE6t4TQ5dIg9zwfx', '2023-06-16 00:43:14', '2023-06-16 00:43:14', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_reports`
--

CREATE TABLE `user_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `report_name_id` bigint(20) UNSIGNED NOT NULL,
  `reports` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `tp` int(11) DEFAULT NULL,
  `mobile` int(11) NOT NULL,
  `map` varchar(255) DEFAULT NULL,
  `latitude` double(8,2) DEFAULT NULL,
  `longitude` double(8,2) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL,
  `season_id` bigint(20) UNSIGNED DEFAULT NULL,
  `person_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `name`, `location`, `email`, `city`, `tp`, `mobile`, `map`, `latitude`, `longitude`, `state`, `organization_id`, `season_id`, `person_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Romerike Friidrettsstadion', 'Leiraveien 2, 2000', 'admin@skedsmohallen.com', 'Oslo', 0, 92624793, 'https://www.google.com/maps?sxsrf=APwXEdcXdEfFkFzHN3YpYpf9KdTHJ4TSHA:1683737657809&q=Skedsmohallen&gsas=1&client=ms-android-samsung-gs-rev1&lsig=AB86z5V9N6tg5CZnNiv59wDwc1GL&kgs=8b78c83a79cdf588&shndl=-1&um=1&ie=UTF-8&sa=X&ved=2ahUKEwiKoL7Pm-v-AhVAVmwGHe4', NULL, NULL, 'Lillestrøm, Norway', 5, 3, 'Haran', 1, '2023-05-10 19:01:01', '2023-05-20 14:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `venue_details`
--

CREATE TABLE `venue_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `venue_id` bigint(20) UNSIGNED NOT NULL,
  `track_event_name` varchar(255) NOT NULL,
  `max_length` varchar(255) DEFAULT NULL,
  `track_event_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venue_details`
--

INSERT INTO `venue_details` (`id`, `venue_id`, `track_event_name`, `max_length`, `track_event_count`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ground A1', '400m', 8, NULL, NULL),
(2, 1, 'Ground B1', '200m', 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `venue_field_details`
--

CREATE TABLE `venue_field_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `venue_id` bigint(20) UNSIGNED NOT NULL,
  `field_event_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venue_field_details`
--

INSERT INTO `venue_field_details` (`id`, `venue_id`, `field_event_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Long Jump', NULL, NULL),
(2, 1, 'Discus Throw', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vipps`
--

CREATE TABLE `vipps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `vipps_name` varchar(255) DEFAULT NULL,
  `vipps_no` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_payment_methods`
--
ALTER TABLE `active_payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `active_payment_methods_organization_id_foreign` (`organization_id`),
  ADD KEY `active_payment_methods_bank_transfer_id_foreign` (`bank_transfer_id`),
  ADD KEY `active_payment_methods_vipps_id_foreign` (`vipps_id`),
  ADD KEY `active_payment_methods_stripe_id_foreign` (`stripe_id`);

--
-- Indexes for table `active_users`
--
ALTER TABLE `active_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `active_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `age_groups`
--
ALTER TABLE `age_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `age_groups_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `age_group_event`
--
ALTER TABLE `age_group_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `age_group_event_event_id_foreign` (`event_id`),
  ADD KEY `age_group_event_age_group_id_foreign` (`age_group_id`);

--
-- Indexes for table `age_group_genders`
--
ALTER TABLE `age_group_genders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `age_group_genders_age_group_event_id_foreign` (`age_group_event_id`),
  ADD KEY `age_group_genders_gender_id_foreign` (`gender_id`),
  ADD KEY `age_group_genders_judge_id_foreign` (`judge_id`),
  ADD KEY `age_group_genders_starter_id_foreign` (`starter_id`),
  ADD KEY `age_group_genders_venue_detail_id_foreign` (`venue_detail_id`);

--
-- Indexes for table `age_group_gender_team`
--
ALTER TABLE `age_group_gender_team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `age_group_gender_team_age_group_gender_id_foreign` (`age_group_gender_id`),
  ADD KEY `age_group_gender_team_team_id_foreign` (`team_id`),
  ADD KEY `age_group_gender_team_league_id_foreign` (`league_id`);

--
-- Indexes for table `age_group_gender_user`
--
ALTER TABLE `age_group_gender_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `age_group_gender_user_age_group_gender_id_foreign` (`age_group_gender_id`),
  ADD KEY `age_group_gender_user_user_id_foreign` (`user_id`),
  ADD KEY `age_group_gender_user_league_id_foreign` (`league_id`);

--
-- Indexes for table `atheletic_settings`
--
ALTER TABLE `atheletic_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atheletic_settings_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `bank_transfer`
--
ALTER TABLE `bank_transfer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_transfer_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clubs_club_name_unique` (`club_name`),
  ADD KEY `clubs_country_id_foreign` (`country_id`),
  ADD KEY `clubs_season_id_foreign` (`season_id`);

--
-- Indexes for table `club_requests`
--
ALTER TABLE `club_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_requests_user_id_foreign` (`user_id`),
  ADD KEY `club_requests_old_club_id_foreign` (`old_club_id`),
  ADD KEY `club_requests_new_club_id_foreign` (`new_club_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countries_currency_id_foreign` (`currency_id`),
  ADD KEY `countries_country_code_id_foreign` (`country_code_id`);

--
-- Indexes for table `country_code`
--
ALTER TABLE `country_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datatables`
--
ALTER TABLE `datatables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day_users`
--
ALTER TABLE `day_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `day_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `email_verification_settings`
--
ALTER TABLE `email_verification_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_main_event_id_foreign` (`main_event_id`),
  ADD KEY `events_league_id_foreign` (`league_id`),
  ADD KEY `events_user_id_foreign` (`user_id`),
  ADD KEY `events_organization_id_foreign` (`organization_id`),
  ADD KEY `events_season_id_foreign` (`season_id`);

--
-- Indexes for table `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_registration`
--
ALTER TABLE `event_registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_registration_event_id_foreign` (`event_id`),
  ADD KEY `event_registration_registration_id_foreign` (`registration_id`);

--
-- Indexes for table `event_users`
--
ALTER TABLE `event_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_users_event_id_foreign` (`event_id`),
  ADD KEY `event_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_registrations`
--
ALTER TABLE `group_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_registrations_club_id_foreign` (`club_id`),
  ADD KEY `group_registrations_event_id_foreign` (`event_id`),
  ADD KEY `group_registrations_organization_id_foreign` (`organization_id`),
  ADD KEY `group_registrations_season_id_foreign` (`season_id`),
  ADD KEY `group_registrations_league_id_foreign` (`league_id`),
  ADD KEY `group_registrations_age_group_gender_id_foreign` (`age_group_gender_id`);

--
-- Indexes for table `group_registration_teams`
--
ALTER TABLE `group_registration_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_registration_teams_team_id_foreign` (`team_id`),
  ADD KEY `group_registration_teams_group_registration_id_foreign` (`group_registration_id`);

--
-- Indexes for table `inquaries`
--
ALTER TABLE `inquaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquaries_user_id_foreign` (`user_id`),
  ADD KEY `inquaries_organization_id_foreign` (`organization_id`),
  ADD KEY `inquaries_club_id_foreign` (`club_id`);

--
-- Indexes for table `leagues`
--
ALTER TABLE `leagues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leagues_sports_category_id_foreign` (`sports_category_id`),
  ADD KEY `leagues_venue_id_foreign` (`venue_id`),
  ADD KEY `leagues_organization_id_foreign` (`organization_id`),
  ADD KEY `leagues_season_id_foreign` (`season_id`);

--
-- Indexes for table `main_events`
--
ALTER TABLE `main_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_events_event_category_id_foreign` (`event_category_id`),
  ADD KEY `main_events_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `marathon_points`
--
ALTER TABLE `marathon_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_role`
--
ALTER TABLE `message_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_role_message_id_foreign` (`message_id`),
  ADD KEY `message_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organizations_name_unique` (`name`),
  ADD KEY `organizations_country_id_foreign` (`country_id`),
  ADD KEY `organizations_season_id_foreign` (`season_id`);

--
-- Indexes for table `org_settings`
--
ALTER TABLE `org_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `org_settings_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `qr_payments`
--
ALTER TABLE `qr_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qr_payments_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registrations_user_id_foreign` (`user_id`),
  ADD KEY `registrations_organization_id_foreign` (`organization_id`),
  ADD KEY `registrations_season_id_foreign` (`season_id`),
  ADD KEY `registrations_league_id_foreign` (`league_id`);

--
-- Indexes for table `report_names`
--
ALTER TABLE `report_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seasonss`
--
ALTER TABLE `seasonss`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seasonss_name_unique` (`name`);

--
-- Indexes for table `sports_categories`
--
ALTER TABLE `sports_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stripe`
--
ALTER TABLE `stripe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stripe_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_club_id_foreign` (`club_id`),
  ADD KEY `teams_gender_id_foreign` (`gender_id`),
  ADD KEY `teams_age_group_id_foreign` (`age_group_id`);

--
-- Indexes for table `team_users`
--
ALTER TABLE `team_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_users_team_id_foreign` (`team_id`),
  ADD KEY `team_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_userid_unique` (`userId`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_country_id_foreign` (`country_id`),
  ADD KEY `users_organization_id_foreign` (`organization_id`),
  ADD KEY `users_club_id_foreign` (`club_id`),
  ADD KEY `users_season_id_foreign` (`season_id`),
  ADD KEY `users_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `user_reports`
--
ALTER TABLE `user_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_reports_user_id_foreign` (`user_id`),
  ADD KEY `user_reports_report_name_id_foreign` (`report_name_id`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venues_organization_id_foreign` (`organization_id`),
  ADD KEY `venues_season_id_foreign` (`season_id`);

--
-- Indexes for table `venue_details`
--
ALTER TABLE `venue_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venue_details_venue_id_foreign` (`venue_id`);

--
-- Indexes for table `venue_field_details`
--
ALTER TABLE `venue_field_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venue_field_details_venue_id_foreign` (`venue_id`);

--
-- Indexes for table `vipps`
--
ALTER TABLE `vipps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vipps_organization_id_foreign` (`organization_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_payment_methods`
--
ALTER TABLE `active_payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `active_users`
--
ALTER TABLE `active_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=522;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `age_groups`
--
ALTER TABLE `age_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `age_group_event`
--
ALTER TABLE `age_group_event`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `age_group_genders`
--
ALTER TABLE `age_group_genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;

--
-- AUTO_INCREMENT for table `age_group_gender_team`
--
ALTER TABLE `age_group_gender_team`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `age_group_gender_user`
--
ALTER TABLE `age_group_gender_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1059;

--
-- AUTO_INCREMENT for table `atheletic_settings`
--
ALTER TABLE `atheletic_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_transfer`
--
ALTER TABLE `bank_transfer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `club_requests`
--
ALTER TABLE `club_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `country_code`
--
ALTER TABLE `country_code`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `datatables`
--
ALTER TABLE `datatables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `day_users`
--
ALTER TABLE `day_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `email_verification_settings`
--
ALTER TABLE `email_verification_settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_registration`
--
ALTER TABLE `event_registration`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=879;

--
-- AUTO_INCREMENT for table `event_users`
--
ALTER TABLE `event_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group_registrations`
--
ALTER TABLE `group_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `group_registration_teams`
--
ALTER TABLE `group_registration_teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `inquaries`
--
ALTER TABLE `inquaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leagues`
--
ALTER TABLE `leagues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `main_events`
--
ALTER TABLE `main_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `marathon_points`
--
ALTER TABLE `marathon_points`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message_role`
--
ALTER TABLE `message_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `org_settings`
--
ALTER TABLE `org_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qr_payments`
--
ALTER TABLE `qr_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `report_names`
--
ALTER TABLE `report_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `seasonss`
--
ALTER TABLE `seasonss`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sports_categories`
--
ALTER TABLE `sports_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stripe`
--
ALTER TABLE `stripe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `team_users`
--
ALTER TABLE `team_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2085;

--
-- AUTO_INCREMENT for table `user_reports`
--
ALTER TABLE `user_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `venue_details`
--
ALTER TABLE `venue_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `venue_field_details`
--
ALTER TABLE `venue_field_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vipps`
--
ALTER TABLE `vipps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `active_payment_methods`
--
ALTER TABLE `active_payment_methods`
  ADD CONSTRAINT `active_payment_methods_bank_transfer_id_foreign` FOREIGN KEY (`bank_transfer_id`) REFERENCES `bank_transfer` (`id`),
  ADD CONSTRAINT `active_payment_methods_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`),
  ADD CONSTRAINT `active_payment_methods_stripe_id_foreign` FOREIGN KEY (`stripe_id`) REFERENCES `stripe` (`id`),
  ADD CONSTRAINT `active_payment_methods_vipps_id_foreign` FOREIGN KEY (`vipps_id`) REFERENCES `vipps` (`id`);

--
-- Constraints for table `active_users`
--
ALTER TABLE `active_users`
  ADD CONSTRAINT `active_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `age_groups`
--
ALTER TABLE `age_groups`
  ADD CONSTRAINT `age_groups_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`);

--
-- Constraints for table `age_group_event`
--
ALTER TABLE `age_group_event`
  ADD CONSTRAINT `age_group_event_age_group_id_foreign` FOREIGN KEY (`age_group_id`) REFERENCES `age_groups` (`id`),
  ADD CONSTRAINT `age_group_event_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `age_group_genders`
--
ALTER TABLE `age_group_genders`
  ADD CONSTRAINT `age_group_genders_age_group_event_id_foreign` FOREIGN KEY (`age_group_event_id`) REFERENCES `age_group_event` (`id`),
  ADD CONSTRAINT `age_group_genders_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`),
  ADD CONSTRAINT `age_group_genders_judge_id_foreign` FOREIGN KEY (`judge_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `age_group_genders_starter_id_foreign` FOREIGN KEY (`starter_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `age_group_genders_venue_detail_id_foreign` FOREIGN KEY (`venue_detail_id`) REFERENCES `venue_details` (`id`);

--
-- Constraints for table `age_group_gender_team`
--
ALTER TABLE `age_group_gender_team`
  ADD CONSTRAINT `age_group_gender_team_age_group_gender_id_foreign` FOREIGN KEY (`age_group_gender_id`) REFERENCES `age_group_genders` (`id`),
  ADD CONSTRAINT `age_group_gender_team_league_id_foreign` FOREIGN KEY (`league_id`) REFERENCES `leagues` (`id`),
  ADD CONSTRAINT `age_group_gender_team_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);

--
-- Constraints for table `age_group_gender_user`
--
ALTER TABLE `age_group_gender_user`
  ADD CONSTRAINT `age_group_gender_user_age_group_gender_id_foreign` FOREIGN KEY (`age_group_gender_id`) REFERENCES `age_group_genders` (`id`),
  ADD CONSTRAINT `age_group_gender_user_league_id_foreign` FOREIGN KEY (`league_id`) REFERENCES `leagues` (`id`),
  ADD CONSTRAINT `age_group_gender_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bank_transfer`
--
ALTER TABLE `bank_transfer`
  ADD CONSTRAINT `bank_transfer_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
