-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2019 at 01:24 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_master_id` int(11) DEFAULT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `make` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturing_date` date DEFAULT NULL,
  `ofc_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fat_reports` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cable_drum_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `user_id`, `item_master_id`, `store_id`, `name`, `description`, `type`, `image`, `quantity`, `unit_id`, `created_at`, `updated_at`, `make`, `model_number`, `serial_number`, `manufacturing_date`, `ofc_color`, `fat_reports`, `cable_drum_number`) VALUES
(165, 19, 9, 54, '', NULL, '', '', '1220', NULL, '2019-05-02 04:39:23', '2019-05-02 23:30:10', 'HIMACHAL FUTURISTIC COMMUNICATIONS LTD', NULL, 'EI907MRN9000040', '1970-01-01', 'black', NULL, NULL),
(169, 19, 10, 54, '', NULL, '', '', '550', NULL, '2019-05-02 14:49:35', '2019-05-02 16:35:54', 'HIMACHAL FUTURISTIC COMMUNICATIONS LTD', NULL, 'EI907MRN9000101', '1970-01-01', NULL, NULL, NULL),
(170, 19, 11, 54, '', NULL, '', '', '58', NULL, '2019-05-02 14:54:02', '2019-05-02 14:55:52', 'SFO TECHNOLOGIES PVT. LTD', NULL, 'EI907MRN9000101', NULL, NULL, NULL, NULL),
(171, 19, 12, 54, '', NULL, '', '', '54', NULL, '2019-05-02 14:57:12', '2019-05-02 15:01:02', 'RITTAL INDIA PVT LTD', NULL, 'EI907MRN9000125', NULL, NULL, NULL, NULL),
(172, 19, 14, 54, '', NULL, '', '', '1360', NULL, '2019-05-02 15:02:28', '2019-05-02 15:04:40', 'SFO TECHNOLOGIES PVT. LTD', NULL, 'EI907MRN9000101', NULL, NULL, NULL, NULL),
(173, 19, 15, 54, '', NULL, '', '', '6257', NULL, '2019-05-02 15:06:11', '2019-05-02 23:30:10', 'MANIFOLD E CONNECT LTD', NULL, 'EI907MRN9000207', NULL, NULL, NULL, NULL),
(174, 19, 16, 54, '', NULL, '', '', '21585', NULL, '2019-05-02 15:21:36', '2019-05-02 23:30:10', 'MANIFOLD E CONNECT LTD', NULL, 'EI907MRN9000207', NULL, NULL, NULL, NULL),
(176, 19, 17, 54, '', NULL, '', '', '3962', NULL, '2019-05-02 15:34:16', '2019-05-02 23:30:09', 'MANIFOLD E CONNECT LTD', NULL, 'EI907MRN9000207', NULL, NULL, NULL, NULL),
(180, 19, 18, 54, '', NULL, '', '', '2867', NULL, '2019-05-02 16:39:38', '2019-05-02 23:30:09', 'MANIFOLD E CONNECT LTD', NULL, NULL, NULL, NULL, NULL, NULL),
(181, 19, 19, 54, '', NULL, '', '', '635', NULL, '2019-05-02 17:21:30', '2019-05-04 07:55:23', 'MANIFOLD E CONNECT LTD', NULL, NULL, '1970-01-01', 'black', NULL, NULL),
(182, 19, 20, 54, '', NULL, '', '', '343', NULL, '2019-05-02 17:29:57', '2019-05-03 02:58:01', 'MANIFOLD E CONNECT LTD', NULL, NULL, NULL, NULL, NULL, NULL),
(185, 18, 9, 55, '', NULL, '', '', '80', NULL, '2019-05-06 02:45:31', '2019-05-06 02:45:31', 'Birla Cable Limited', NULL, NULL, NULL, 'black', NULL, NULL),
(186, 18, 9, 57, '', NULL, '', '', '260', NULL, '2019-05-09 05:44:18', '2019-05-09 05:44:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, 18, 9, 56, '', NULL, '', '', '160', NULL, '2019-05-09 05:48:27', '2019-05-09 05:48:27', 'Birla Cable Limited', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_logs`
--

CREATE TABLE `item_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `item_id` int(10) UNSIGNED DEFAULT NULL,
  `qty_added` float UNSIGNED DEFAULT NULL,
  `qty` float UNSIGNED DEFAULT NULL,
  `activity_type` varchar(55) DEFAULT NULL,
  `is_approved` tinyint(4) DEFAULT '0',
  `invoice_number` varchar(255) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `indent_number` varchar(255) DEFAULT NULL,
  `indent_date` date DEFAULT NULL,
  `reason` text,
  `delivery_challan_no` varchar(255) DEFAULT NULL,
  `delivery_challan_date` date DEFAULT NULL,
  `make` varchar(255) DEFAULT NULL,
  `model_number` varchar(255) DEFAULT NULL,
  `serial_number` varchar(255) DEFAULT NULL,
  `manufacturing_date` varchar(255) DEFAULT NULL,
  `ofc_color` varchar(255) DEFAULT NULL,
  `fat_reports` varchar(255) DEFAULT NULL,
  `cable_drum_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_logs`
--

INSERT INTO `item_logs` (`id`, `user_id`, `item_id`, `qty_added`, `qty`, `activity_type`, `is_approved`, `invoice_number`, `invoice_date`, `indent_number`, `indent_date`, `reason`, `delivery_challan_no`, `delivery_challan_date`, `make`, `model_number`, `serial_number`, `manufacturing_date`, `ofc_color`, `fat_reports`, `cable_drum_number`, `created_at`, `updated_at`) VALUES
(1, 19, 163, 330, 330, 'Add', 0, '123/26/4/2019', '2019-04-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-30 01:48:00', '2019-04-30 01:48:00'),
(2, 19, 164, 700, 700, 'Add', 0, NULL, '2019-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-30 08:00:36', '2019-04-30 08:00:36'),
(3, 19, 165, 31, 31, 'Add', 0, 'HF3018104243', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 04:39:23', '2019-05-02 04:39:23'),
(4, 19, 169, 150, 150, 'Add', 0, 'IN/OPD1819/01629', '2019-03-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 14:49:35', '2019-05-02 14:49:35'),
(5, 19, 169, 450, 300, 'Add', 0, 'IN/OPD1819/01725', '2019-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 14:50:50', '2019-05-02 14:50:50'),
(6, 19, 169, 550, 100, 'Add', 0, 'IN/OPD1819/01906', '2019-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 14:52:06', '2019-05-02 14:52:06'),
(7, 19, 170, 15, 15, 'Add', 0, 'IN/OPD1819/01629', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 14:54:02', '2019-05-02 14:54:02'),
(8, 19, 170, 30, 15, 'Add', 0, 'IN/OPD1819/01725', '2019-03-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 14:55:02', '2019-05-02 14:55:02'),
(9, 19, 170, 58, 28, 'Add', 0, 'IN/OPD1819/01906', '2019-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 14:55:52', '2019-05-02 14:55:52'),
(10, 19, 171, 12, 12, 'Add', 0, 'DM1011736621', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 14:57:12', '2019-05-02 14:57:12'),
(11, 19, 171, 24, 12, 'Add', 0, 'DM1011736624', '2019-03-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 14:58:27', '2019-05-02 14:58:27'),
(12, 19, 171, 46, 22, 'Add', 0, 'DM1011737981', '2019-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 14:59:43', '2019-05-02 14:59:43'),
(13, 19, 171, 54, 8, 'Add', 0, 'DM1011737982', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 15:01:02', '2019-05-02 15:01:02'),
(14, 19, 172, 350, 350, 'Add', 0, 'IN/OPD1819/01629', '2019-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 15:02:28', '2019-05-02 15:02:28'),
(15, 19, 172, 700, 350, 'Add', 0, 'IN/OPD1819/01725', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 15:03:42', '2019-05-02 15:03:42'),
(16, 19, 172, 1360, 660, 'Add', 0, 'IN/OPD1819/01906', '2019-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 15:04:40', '2019-05-02 15:04:40'),
(17, 19, 173, 10, 10, 'Add', 0, '947', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 15:06:11', '2019-05-02 15:06:11'),
(18, 19, 173, 370, 360, 'Add', 0, '857', '2019-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 15:07:13', '2019-05-02 15:07:13'),
(19, 19, 173, 2410, 2040, 'Add', 0, '885', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 15:08:10', '2019-05-02 15:08:10'),
(20, 19, 173, 4410, 2000, 'Add', 0, '958', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 15:09:17', '2019-05-02 15:09:17'),
(21, 19, 173, 6410, 2000, 'Add', 0, '957', '2019-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 15:12:52', '2019-05-02 15:12:52'),
(22, 19, 174, 20, 20, 'Add', 0, '947', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 15:21:36', '2019-05-02 15:21:36'),
(23, 19, 174, 992, 972, 'Add', 0, '857', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 15:22:42', '2019-05-02 15:22:42'),
(24, 19, 174, 3420, 2428, 'Add', 0, '885', '2019-03-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 15:23:26', '2019-05-02 15:23:26'),
(25, 19, 174, 5848, 2428, 'Add', 0, '885', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 15:24:28', '2019-05-02 15:24:28'),
(26, 19, 174, 12848, 7000, 'Add', 0, '909', '2019-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 15:25:31', '2019-05-02 15:25:31'),
(27, 19, 174, 17348, 4500, 'Add', 0, '958', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 15:26:28', '2019-05-02 15:26:28'),
(28, 19, 175, 4500, 4500, 'Add', 0, '957', '2019-03-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 15:29:50', '2019-05-02 15:29:50'),
(29, 19, 174, 21848, 4500, 'Add', 0, '957', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 15:32:40', '2019-05-02 15:32:40'),
(30, 19, 176, 2, 2, 'Add', 0, '947', '2019-03-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 15:34:16', '2019-05-02 15:34:16'),
(31, 19, 176, 602, 600, 'Add', 0, '857', '2019-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 15:35:06', '2019-05-02 15:35:06'),
(32, 19, 176, 1502, 900, 'Add', 0, '909', '2019-03-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 16:23:24', '2019-05-02 16:23:24'),
(33, 19, 176, 2752, 1250, 'Add', 0, '958', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 16:24:21', '2019-05-02 16:24:21'),
(34, 19, 176, 4002, 1250, 'Add', 0, '957', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 16:38:20', '2019-05-02 16:38:20'),
(35, 19, 180, 10, 10, 'Add', 0, '947', '2019-03-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 16:39:38', '2019-05-02 16:39:38'),
(36, 19, 180, 1010, 1000, 'Add', 0, '857', '2019-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 16:40:18', '2019-05-02 16:40:18'),
(37, 19, 180, 2910, 1900, 'Add', 0, '909', '2019-03-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 16:41:01', '2019-05-02 16:41:01'),
(38, 19, 165, 59.76, 28.83, 'Add', 0, 'HF3018104244', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 16:47:10', '2019-05-02 16:47:10'),
(39, 19, 165, 92.58, 32.82, 'Add', 0, 'HF3018104914', '2019-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:06:23', '2019-05-02 17:06:23'),
(40, 19, 165, 148.47, 55.89, 'Add', 0, 'HF3018104915', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:08:06', '2019-05-02 17:08:06'),
(41, 19, 165, 204.55, 56.08, 'Add', 0, 'HF3018104928', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:09:35', '2019-05-02 17:09:35'),
(42, 19, 165, 220.97, 16.42, 'Add', 0, 'HF3018105018', '2019-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:11:09', '2019-05-02 17:11:09'),
(43, 19, 165, 276.38, 55.41, 'Add', 0, 'HF3018105017', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:13:04', '2019-05-02 17:13:04'),
(44, 19, 165, 331.86, 55.48, 'Add', 0, 'HF3018105070', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:15:20', '2019-05-02 17:15:20'),
(45, 19, 165, 354.42, 22.56, 'Add', 0, 'HF3018105073', '2019-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:16:44', '2019-05-02 17:16:44'),
(46, 19, 181, 59, 59, 'Add', 0, '857', '2019-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:21:30', '2019-05-02 17:21:30'),
(47, 19, 181, 157, 98, 'Add', 0, '885', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:25:27', '2019-05-02 17:25:27'),
(48, 19, 181, 318, 161, 'Add', 0, '909', '2019-03-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:26:25', '2019-05-02 17:26:25'),
(49, 19, 181, 483, 165, 'Add', 0, '958', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:27:23', '2019-05-02 17:27:23'),
(50, 19, 181, 648, 165, 'Add', 0, '957', '2019-03-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:28:04', '2019-05-02 17:28:04'),
(51, 19, 182, 1, 1, 'Add', 0, '947', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:29:57', '2019-05-02 17:29:57'),
(52, 19, 182, 3, 2, 'Add', 0, '857', '2019-03-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:30:52', '2019-05-02 17:30:52'),
(53, 19, 182, 30, 27, 'Add', 0, '885', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:31:52', '2019-05-02 17:31:52'),
(54, 19, 182, 31, 1, 'Add', 0, '886', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:32:44', '2019-05-02 17:32:44'),
(55, 19, 165, 407.67, 53.25, 'Add', 0, 'HF3018105148', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:33:00', '2019-05-02 17:33:00'),
(56, 19, 182, 121, 90, 'Add', 0, '909', '2019-03-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:33:36', '2019-05-02 17:33:36'),
(57, 19, 165, 458.86, 51.19, 'Add', 0, 'HF3018105149', '2019-03-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:34:25', '2019-05-02 17:34:25'),
(58, 19, 165, 512.34, 53.48, 'Add', 0, 'HF3018105186', '2019-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:38:40', '2019-05-02 17:38:40'),
(59, 19, 165, 549.25, 36.91, 'Add', 0, 'HF3018105197', '2019-03-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:39:47', '2019-05-02 17:39:47'),
(60, 19, 165, 600.55, 51.3, 'Add', 0, 'HF3018105199', '2019-03-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:41:16', '2019-05-02 17:41:16'),
(61, 19, 165, 616.9, 16.35, 'Add', 0, 'HF3018105198', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:42:29', '2019-05-02 17:42:29'),
(62, 19, 165, 666.05, 49.15, 'Add', 0, 'HF3018105241', '2019-03-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:43:28', '2019-05-02 17:43:28'),
(63, 19, 165, 715.15, 49.1, 'Add', 0, 'HF3018105235', '2019-03-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:44:22', '2019-05-02 17:44:22'),
(64, 19, 165, 760.15, 45, 'Add', 0, 'HF3019100041', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:45:08', '2019-05-02 17:45:08'),
(65, 19, 165, 805.3, 45.15, 'Add', 0, NULL, '2019-03-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:46:05', '2019-05-02 17:46:05'),
(66, 19, 165, 850.51, 45.21, 'Add', 0, 'HF3019100075', '2019-03-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:47:40', '2019-05-02 17:47:40'),
(67, 19, 165, 895.57, 45.06, 'Add', 0, 'HF3019100076', '2019-03-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:48:49', '2019-05-02 17:48:49'),
(68, 19, 165, 940.63, 45.06, 'Add', 0, 'HF3019100076', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:49:58', '2019-05-02 17:49:58'),
(69, 19, 165, 995.71, 55.08, 'Add', 0, 'HF3019100120', '2019-03-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:51:01', '2019-05-02 17:51:01'),
(70, 19, 165, 1050.92, 55.21, 'Add', 0, 'HF3019100119', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:51:45', '2019-05-02 17:51:45'),
(71, 19, 165, 1081.55, 30.63, 'Add', 0, NULL, '2019-03-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:52:41', '2019-05-02 17:52:41'),
(72, 19, 165, 1149.5, 67.95, 'Add', 0, 'HF3019100160', '2019-03-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:53:53', '2019-05-02 17:53:53'),
(73, 19, 165, 1204.97, 55.47, 'Add', 0, 'HF3019100189', '2019-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:54:54', '2019-05-02 17:54:54'),
(74, 19, 165, 1258.33, 53.36, 'Add', 0, 'HF3019100210', '2019-03-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 17:56:04', '2019-05-02 17:56:04'),
(75, 19, 182, 120, 1, 'Release', 0, NULL, NULL, '39414', '2019-02-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:14:07', '2019-05-02 23:14:07'),
(76, 19, 181, 647, 1, 'Release', 0, NULL, NULL, '39414', '2019-02-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:14:07', '2019-05-02 23:14:07'),
(77, 19, 180, 2907, 3, 'Release', 0, NULL, NULL, '39414', '2019-02-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:14:07', '2019-05-02 23:14:07'),
(78, 19, 174, 21830, 18, 'Release', 0, NULL, NULL, '39414', '2019-02-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:14:07', '2019-05-02 23:14:07'),
(79, 19, 173, 6405, 5, 'Release', 0, NULL, NULL, '39414', '2019-02-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:14:07', '2019-05-02 23:14:07'),
(80, 19, 165, 1256, 2.069, 'Release', 0, NULL, NULL, '39414', '2019-02-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:14:07', '2019-05-02 23:14:07'),
(81, 19, 181, 646, 1, 'Release', 0, NULL, NULL, '39408', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:17:51', '2019-05-02 23:17:51'),
(82, 19, 180, 2903, 4, 'Release', 0, NULL, NULL, '39408', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:17:51', '2019-05-02 23:17:51'),
(83, 19, 176, 3998, 4, 'Release', 0, NULL, NULL, '39408', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:17:51', '2019-05-02 23:17:51'),
(84, 19, 174, 21818, 12, 'Release', 0, NULL, NULL, '39408', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:17:51', '2019-05-02 23:17:51'),
(85, 19, 165, 1254, 2.069, 'Release', 0, NULL, NULL, '39408', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:17:51', '2019-05-02 23:17:51'),
(86, 19, 182, 119, 1, 'Release', 0, NULL, NULL, '39415', '2019-05-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:21:03', '2019-05-02 23:21:03'),
(87, 19, 181, 644, 2, 'Release', 0, NULL, NULL, '39415', '2019-05-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:21:03', '2019-05-02 23:21:03'),
(88, 19, 180, 2899, 4, 'Release', 0, NULL, NULL, '39415', '2019-05-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:21:03', '2019-05-02 23:21:03'),
(89, 19, 176, 3994, 4, 'Release', 0, NULL, NULL, '39415', '2019-05-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:21:03', '2019-05-02 23:21:03'),
(90, 19, 174, 21786, 32, 'Release', 0, NULL, NULL, '39415', '2019-05-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:21:03', '2019-05-02 23:21:03'),
(91, 19, 173, 6395, 10, 'Release', 0, NULL, NULL, '39415', '2019-05-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:21:03', '2019-05-02 23:21:03'),
(92, 19, 165, 1252, 2.069, 'Release', 0, NULL, NULL, '39415', '2019-05-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:21:03', '2019-05-02 23:21:03'),
(93, 19, 165, 1246, 6.22, 'Release', 0, NULL, NULL, '39425', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:22:37', '2019-05-02 23:22:37'),
(94, 19, 181, 641, 3, 'Release', 0, NULL, NULL, '39418', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:24:26', '2019-05-02 23:24:26'),
(95, 19, 180, 2887, 12, 'Release', 0, NULL, NULL, '39418', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:24:26', '2019-05-02 23:24:26'),
(96, 19, 176, 3982, 12, 'Release', 0, NULL, NULL, '39418', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:24:26', '2019-05-02 23:24:26'),
(97, 19, 174, 21686, 100, 'Release', 0, NULL, NULL, '39418', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:24:26', '2019-05-02 23:24:26'),
(98, 19, 173, 6359, 36, 'Release', 0, NULL, NULL, '39418', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:24:26', '2019-05-02 23:24:26'),
(99, 19, 165, 1240, 6.173, 'Release', 0, NULL, NULL, '39418', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:24:26', '2019-05-02 23:24:26'),
(100, 19, 182, 116, 3, 'Release', 0, NULL, NULL, '39002', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:25:40', '2019-05-02 23:25:40'),
(101, 19, 181, 639, 2, 'Release', 0, NULL, NULL, '39002', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:25:40', '2019-05-02 23:25:40'),
(102, 19, 180, 2879, 8, 'Release', 0, NULL, NULL, '39002', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:25:40', '2019-05-02 23:25:40'),
(103, 19, 176, 3974, 8, 'Release', 0, NULL, NULL, '39002', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:25:40', '2019-05-02 23:25:40'),
(104, 19, 174, 21671, 15, 'Release', 0, NULL, NULL, '39002', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:25:40', '2019-05-02 23:25:40'),
(105, 19, 173, 6319, 40, 'Release', 0, NULL, NULL, '39002', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:25:40', '2019-05-02 23:25:40'),
(106, 19, 165, 1236, 4.13, 'Release', 0, NULL, NULL, '39002', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:25:40', '2019-05-02 23:25:40'),
(107, 19, 182, 113, 3, 'Release', 0, NULL, NULL, '39212', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:26:39', '2019-05-02 23:26:39'),
(108, 19, 181, 638, 1, 'Release', 0, NULL, NULL, '39212', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:26:39', '2019-05-02 23:26:39'),
(109, 19, 180, 2875, 4, 'Release', 0, NULL, NULL, '39212', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:26:39', '2019-05-02 23:26:39'),
(110, 19, 176, 3970, 4, 'Release', 0, NULL, NULL, '39212', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:26:39', '2019-05-02 23:26:39'),
(111, 19, 174, 21639, 32, 'Release', 0, NULL, NULL, '39212', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:26:39', '2019-05-02 23:26:39'),
(112, 19, 173, 6307, 12, 'Release', 0, NULL, NULL, '39212', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:26:39', '2019-05-02 23:26:39'),
(113, 19, 165, 1234, 2.037, 'Release', 0, NULL, NULL, '39212', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:26:39', '2019-05-02 23:26:39'),
(114, 19, 165, 1224, 10.4, 'Release', 0, NULL, NULL, '5301', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:27:01', '2019-05-02 23:27:01'),
(115, 19, 181, 637, 1, 'Release', 0, NULL, NULL, '39216', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:29:38', '2019-05-02 23:29:38'),
(116, 19, 180, 2871, 4, 'Release', 0, NULL, NULL, '39216', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:29:38', '2019-05-02 23:29:38'),
(117, 19, 176, 3966, 4, 'Release', 0, NULL, NULL, '39216', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:29:38', '2019-05-02 23:29:38'),
(118, 19, 174, 21615, 24, 'Release', 0, NULL, NULL, '39216', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:29:38', '2019-05-02 23:29:38'),
(119, 19, 173, 6293, 14, 'Release', 0, NULL, NULL, '39216', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:29:38', '2019-05-02 23:29:38'),
(120, 19, 165, 1222, 2.066, 'Release', 0, NULL, NULL, '39216', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:29:38', '2019-05-02 23:29:38'),
(121, 19, 182, 111, 2, 'Release', 0, NULL, NULL, '39309', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:30:09', '2019-05-02 23:30:09'),
(122, 19, 181, 635, 2, 'Release', 0, NULL, NULL, '39309', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:30:09', '2019-05-02 23:30:09'),
(123, 19, 180, 2867, 4, 'Release', 0, NULL, NULL, '39309', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:30:09', '2019-05-02 23:30:09'),
(124, 19, 176, 3962, 4, 'Release', 0, NULL, NULL, '39309', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:30:10', '2019-05-02 23:30:10'),
(125, 19, 174, 21585, 30, 'Release', 0, NULL, NULL, '39309', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:30:10', '2019-05-02 23:30:10'),
(126, 19, 173, 6257, 36, 'Release', 0, NULL, NULL, '39309', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:30:10', '2019-05-02 23:30:10'),
(127, 19, 165, 1220, 2.05, 'Release', 0, NULL, NULL, '39309', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 23:30:10', '2019-05-02 23:30:10'),
(128, 1, 184, 9, 9, 'Add', 0, 'safads', '2019-06-05', NULL, NULL, NULL, 'asdf', '2019-05-10', 'asdf', 'asdf', 'asdf', '2019-05-31', 'silver', '', 'asdf', '2019-05-03 02:24:58', '2019-05-03 02:24:58'),
(129, 19, 182, 131, 20, 'Add', 0, 'NO29891', '2019-03-14', NULL, NULL, NULL, 'IN3028', '2019-04-01', 'Finolex', NULL, NULL, '1970-01-01', 'black', NULL, NULL, '2019-05-03 02:29:09', '2019-05-03 02:29:09'),
(130, 19, 182, 343, 212, 'Add', 0, 'N9102013H', '2019-04-09', NULL, NULL, NULL, '1292901HJKk', '2019-03-04', NULL, NULL, NULL, '1970-01-01', 'black', NULL, NULL, '2019-05-03 02:58:01', '2019-05-03 02:58:01'),
(131, 19, 184, 0, 9, 'Release', 0, NULL, NULL, '161161', '2019-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-03 03:04:10', '2019-05-03 03:04:10'),
(132, 18, 185, 80, 80, 'Add', 0, '1941500029', '2019-04-11', NULL, NULL, NULL, '1941400030', '2019-04-11', 'Birla Cable Limited', NULL, NULL, '1970-01-01', 'black', NULL, NULL, '2019-05-06 02:45:31', '2019-05-06 02:45:31'),
(133, 18, 186, 260, 260, 'Add', 0, NULL, '1970-01-01', NULL, NULL, NULL, 'QGWHS/19-20/00175', '1970-01-01', NULL, NULL, NULL, '1970-01-01', NULL, NULL, NULL, '2019-05-09 05:44:18', '2019-05-09 05:44:18'),
(134, 18, 187, 160, 160, 'Add', 0, NULL, '1970-01-01', NULL, NULL, NULL, 'QGWHS/19-20/00176', '1970-01-01', 'Birla Cable Limited', NULL, NULL, '1970-01-01', NULL, NULL, NULL, '2019-05-09 05:48:27', '2019-05-09 05:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `item_masters`
--

CREATE TABLE `item_masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `unit_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_masters`
--

INSERT INTO `item_masters` (`id`, `user_id`, `unit_id`, `name`, `description`, `image`, `stock_type`, `created_at`, `updated_at`) VALUES
(9, 1, 9, '24 ADSS CABLE', '24 ADSS CABLE', NULL, 'Cable', '2019-04-30 04:51:11', '2019-04-30 04:51:11'),
(10, 1, 10, '24 PORT FDMS', '24 PORT FDMS', NULL, 'FDMS', '2019-04-30 04:53:11', '2019-04-30 04:53:11'),
(11, 1, 10, '48 PORT FDMS', '48 PORT FDMS', NULL, 'FDMS', '2019-04-30 04:53:49', '2019-04-30 04:53:49'),
(12, 1, 10, 'RACK', 'RACK-24U', NULL, 'Rack', '2019-04-30 04:57:24', '2019-04-30 04:57:24'),
(14, 1, 10, 'JOINT ENCLOSURE', 'POLE ACCESSORIES-JOINT ENCLOSURE', NULL, 'Pole Accessories', '2019-04-30 05:04:17', '2019-04-30 05:04:17'),
(15, 1, 10, 'DEAD END ASSEMBLY', 'POLE ACCESSORIES-DEAD END ASSEMBLY', NULL, 'Pole Accessories', '2019-04-30 05:05:30', '2019-04-30 05:05:30'),
(16, 1, 10, 'SUSPENSION ASSEMBLY', 'POLE ACCESSORIES-SUSPENSION ASSEMBLY', NULL, 'Pole Accessories', '2019-04-30 05:06:14', '2019-04-30 05:06:14'),
(17, 1, 10, 'BRACKET', 'CABLE STORAGE BRACKET', NULL, 'Pole Accessories', '2019-04-30 05:07:03', '2019-04-30 05:07:03'),
(18, 1, 10, 'CLAMP', 'CABLE DOWN LEAD CLAMP', NULL, 'Pole Accessories', '2019-04-30 05:07:35', '2019-04-30 05:07:35'),
(19, 1, 10, 'STRAP', NULL, NULL, 'Pole Accessories', '2019-05-02 17:08:52', '2019-05-02 17:14:13'),
(20, 1, 10, 'STRAP CUTTING TOOL', NULL, NULL, 'Pole Accessories', '2019-05-02 17:09:30', '2019-05-02 17:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `item_types`
--

CREATE TABLE `item_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_types`
--

INSERT INTO `item_types` (`id`, `user_id`, `title`, `tag`, `created_at`, `updated_at`) VALUES
(9, 1, 'Cable', 'cable', '2019-04-30 01:39:29', '2019-04-30 01:39:29'),
(10, 1, 'Pole', 'pole', '2019-04-30 01:39:42', '2019-04-30 01:39:42'),
(11, 1, 'FDMS', 'fdms', '2019-04-30 01:39:54', '2019-04-30 01:39:54'),
(12, 1, 'Joint Enclosure', 'joint_enclosure', '2019-04-30 01:40:18', '2019-04-30 01:40:18'),
(13, 1, 'Joint Enclosure & Pole Accessories', 'joint_enclosure_pole_accessories', '2019-04-30 01:40:32', '2019-04-30 01:40:32'),
(14, 1, 'Pole Accessories', 'pole_accessories', '2019-04-30 01:40:42', '2019-04-30 01:40:42'),
(15, 1, 'Rack', 'rack', '2019-04-30 04:56:56', '2019-04-30 04:56:56');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `radius` int(25) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lng` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `radius`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(1, 'Andhra Pradesh, India', 20, '15.9128998', '79.7399875', '2019-04-10 08:53:21', '2019-04-10 15:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `media_files`
--

CREATE TABLE `media_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upload_template_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `media_files`
--

INSERT INTO `media_files` (`id`, `model`, `model_id`, `type`, `url`, `name`, `upload_template_id`, `created_at`, `updated_at`) VALUES
(1, 'App\\ItemLog', 128, '1', 'uploads/items/99541556870098.jpg', 'OnePlus-5T-new-update.jpg', 2, '2019-05-03 02:24:58', '2019-05-03 02:24:58'),
(2, 'App\\ItemLog', 129, '1', 'uploads/items/52611556870349.txt', 'spec.txt', 4, '2019-05-03 02:29:09', '2019-05-03 02:29:09');

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
(45, '2014_10_12_000000_create_users_table', 1),
(46, '2014_10_12_100000_create_password_resets_table', 1),
(47, '2019_02_20_100356_create_stores_table', 1),
(48, '2019_02_20_102853_create_units_table', 1),
(49, '2019_02_20_103427_create_item_types_table', 1),
(50, '2019_02_20_104758_create_items_table', 1),
(51, '2019_02_20_130740_create_store_item_table', 1),
(52, '2019_02_22_051118_create_vendors_table', 1),
(53, '2019_02_22_051240_create_store_items_table', 1),
(54, '2019_02_22_054636_create_release_stocks_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'location_index', 'web', '2019-03-13 11:49:17', '2019-03-13 11:49:17'),
(2, 'location_create', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(3, 'location_edit', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(4, 'location_destroy', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(5, 'location_show', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(6, 'item_type_index', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(7, 'item_type_create', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(8, 'item_type_edit', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(9, 'item_type_destroy', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(10, 'item_type_show', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(11, 'unit_index', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(12, 'unit_create', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(13, 'unit_edit', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(14, 'unit_destroy', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(15, 'unit_show', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(16, 'vendor_index', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(17, 'vendor_create', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(18, 'vendor_edit', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(19, 'vendor_destroy', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(20, 'vendor_show', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(21, 'store_index', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(22, 'store_create', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(23, 'store_edit', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(24, 'store_destroy', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(25, 'store_show', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(26, 'item_index', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(27, 'item_create', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(28, 'item_edit', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(29, 'item_destroy', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(30, 'item_show', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18'),
(31, 'item_stocks', 'web', '2019-03-13 11:49:18', '2019-03-13 11:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `release_stocks`
--

CREATE TABLE `release_stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `vendor_id` int(10) UNSIGNED DEFAULT NULL,
  `store_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `person_name` varchar(65) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(65) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indent_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indent_date` date DEFAULT NULL,
  `vehicle_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gate_pass_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `release_stocks`
--

INSERT INTO `release_stocks` (`id`, `user_id`, `vendor_id`, `store_id`, `item_id`, `quantity`, `date`, `remarks`, `created_at`, `updated_at`, `person_name`, `phone`, `indent_number`, `indent_date`, `vehicle_no`, `gate_pass_no`) VALUES
(1, 19, 0, 54, 182, '1', '2019-05-03 00:00:00', NULL, '2019-05-02 23:14:07', '2019-05-02 23:14:07', 'ALLEN CONSTRUCTIONS', '9552854562', '39414', '2019-02-27', NULL, NULL),
(2, 19, 0, 54, 181, '1', '2019-05-03 00:00:00', NULL, '2019-05-02 23:14:07', '2019-05-02 23:14:07', 'ALLEN CONSTRUCTIONS', '9552854562', '39414', '2019-02-27', NULL, NULL),
(3, 19, 0, 54, 180, '3', '2019-05-03 00:00:00', NULL, '2019-05-02 23:14:07', '2019-05-02 23:14:07', 'ALLEN CONSTRUCTIONS', '9552854562', '39414', '2019-02-27', NULL, NULL),
(4, 19, 0, 54, 174, '18', '2019-05-03 00:00:00', NULL, '2019-05-02 23:14:07', '2019-05-02 23:14:07', 'ALLEN CONSTRUCTIONS', '9552854562', '39414', '2019-02-27', NULL, NULL),
(5, 19, 0, 54, 173, '5', '2019-05-03 00:00:00', NULL, '2019-05-02 23:14:07', '2019-05-02 23:14:07', 'ALLEN CONSTRUCTIONS', '9552854562', '39414', '2019-02-27', NULL, NULL),
(6, 19, 0, 54, 165, '2.069', '2019-05-03 00:00:00', NULL, '2019-05-02 23:14:07', '2019-05-02 23:14:07', 'ALLEN CONSTRUCTIONS', '9552854562', '39414', '2019-02-27', NULL, NULL),
(7, 19, 0, 54, 181, '1', '2019-05-03 00:00:00', NULL, '2019-05-02 23:17:51', '2019-05-02 23:17:51', 'ALLEN CONSTRUCTIONS', '8546521325', '39408', '2019-05-03', NULL, NULL),
(8, 19, 0, 54, 180, '4', '2019-05-03 00:00:00', NULL, '2019-05-02 23:17:51', '2019-05-02 23:17:51', 'ALLEN CONSTRUCTIONS', '8546521325', '39408', '2019-05-03', NULL, NULL),
(9, 19, 0, 54, 176, '4', '2019-05-03 00:00:00', NULL, '2019-05-02 23:17:51', '2019-05-02 23:17:51', 'ALLEN CONSTRUCTIONS', '8546521325', '39408', '2019-05-03', NULL, NULL),
(10, 19, 0, 54, 174, '12', '2019-05-03 00:00:00', NULL, '2019-05-02 23:17:51', '2019-05-02 23:17:51', 'ALLEN CONSTRUCTIONS', '8546521325', '39408', '2019-05-03', NULL, NULL),
(11, 19, 0, 54, 165, '2.069', '2019-05-03 00:00:00', NULL, '2019-05-02 23:17:51', '2019-05-02 23:17:51', 'ALLEN CONSTRUCTIONS', '8546521325', '39408', '2019-05-03', NULL, NULL),
(12, 19, 0, 54, 182, '1', '2019-05-03 00:00:00', NULL, '2019-05-02 23:21:03', '2019-05-02 23:21:03', 'CSM CONSTRUCTIONS', '7582536245', '39415', '2019-05-04', NULL, NULL),
(13, 19, 0, 54, 181, '2', '2019-05-03 00:00:00', NULL, '2019-05-02 23:21:03', '2019-05-02 23:21:03', 'CSM CONSTRUCTIONS', '7582536245', '39415', '2019-05-04', NULL, NULL),
(14, 19, 0, 54, 180, '4', '2019-05-03 00:00:00', NULL, '2019-05-02 23:21:03', '2019-05-02 23:21:03', 'CSM CONSTRUCTIONS', '7582536245', '39415', '2019-05-04', NULL, NULL),
(15, 19, 0, 54, 176, '4', '2019-05-03 00:00:00', NULL, '2019-05-02 23:21:03', '2019-05-02 23:21:03', 'CSM CONSTRUCTIONS', '7582536245', '39415', '2019-05-04', NULL, NULL),
(16, 19, 0, 54, 174, '32', '2019-05-03 00:00:00', NULL, '2019-05-02 23:21:03', '2019-05-02 23:21:03', 'CSM CONSTRUCTIONS', '7582536245', '39415', '2019-05-04', NULL, NULL),
(17, 19, 0, 54, 173, '10', '2019-05-03 00:00:00', NULL, '2019-05-02 23:21:03', '2019-05-02 23:21:03', 'CSM CONSTRUCTIONS', '7582536245', '39415', '2019-05-04', NULL, NULL),
(18, 19, 0, 54, 165, '2.069', '2019-05-03 00:00:00', NULL, '2019-05-02 23:21:03', '2019-05-02 23:21:03', 'CSM CONSTRUCTIONS', '7582536245', '39415', '2019-05-04', NULL, NULL),
(19, 19, 0, 54, 165, '6.22', '2019-05-03 00:00:00', NULL, '2019-05-02 23:22:37', '2019-05-02 23:22:37', 'CSM CONSTRUCTIONS', '9851247856', '39425', '2019-05-03', NULL, NULL),
(20, 19, 0, 54, 181, '3', '2019-05-03 00:00:00', NULL, '2019-05-02 23:24:26', '2019-05-02 23:24:26', 'CSM CONSTRUCTIONS', '8945632563', '39418', '2019-05-03', NULL, NULL),
(21, 19, 0, 54, 180, '12', '2019-05-03 00:00:00', NULL, '2019-05-02 23:24:26', '2019-05-02 23:24:26', 'CSM CONSTRUCTIONS', '8945632563', '39418', '2019-05-03', NULL, NULL),
(22, 19, 0, 54, 176, '12', '2019-05-03 00:00:00', NULL, '2019-05-02 23:24:26', '2019-05-02 23:24:26', 'CSM CONSTRUCTIONS', '8945632563', '39418', '2019-05-03', NULL, NULL),
(23, 19, 0, 54, 174, '100', '2019-05-03 00:00:00', NULL, '2019-05-02 23:24:26', '2019-05-02 23:24:26', 'CSM CONSTRUCTIONS', '8945632563', '39418', '2019-05-03', NULL, NULL),
(24, 19, 0, 54, 173, '36', '2019-05-03 00:00:00', NULL, '2019-05-02 23:24:26', '2019-05-02 23:24:26', 'CSM CONSTRUCTIONS', '8945632563', '39418', '2019-05-03', NULL, NULL),
(25, 19, 0, 54, 165, '6.173', '2019-05-03 00:00:00', NULL, '2019-05-02 23:24:26', '2019-05-02 23:24:26', 'CSM CONSTRUCTIONS', '8945632563', '39418', '2019-05-03', NULL, NULL),
(26, 19, 0, 54, 182, '3', '2019-05-03 00:00:00', NULL, '2019-05-02 23:25:40', '2019-05-02 23:25:40', 'SURYA TEJA ENGINEERING', '9854623547', '39002', '2019-05-03', NULL, NULL),
(27, 19, 0, 54, 181, '2', '2019-05-03 00:00:00', NULL, '2019-05-02 23:25:40', '2019-05-02 23:25:40', 'SURYA TEJA ENGINEERING', '9854623547', '39002', '2019-05-03', NULL, NULL),
(28, 19, 0, 54, 180, '8', '2019-05-03 00:00:00', NULL, '2019-05-02 23:25:40', '2019-05-02 23:25:40', 'SURYA TEJA ENGINEERING', '9854623547', '39002', '2019-05-03', NULL, NULL),
(29, 19, 0, 54, 176, '8', '2019-05-03 00:00:00', NULL, '2019-05-02 23:25:40', '2019-05-02 23:25:40', 'SURYA TEJA ENGINEERING', '9854623547', '39002', '2019-05-03', NULL, NULL),
(30, 19, 0, 54, 174, '15', '2019-05-03 00:00:00', NULL, '2019-05-02 23:25:40', '2019-05-02 23:25:40', 'SURYA TEJA ENGINEERING', '9854623547', '39002', '2019-05-03', NULL, NULL),
(31, 19, 0, 54, 173, '40', '2019-05-03 00:00:00', NULL, '2019-05-02 23:25:40', '2019-05-02 23:25:40', 'SURYA TEJA ENGINEERING', '9854623547', '39002', '2019-05-03', NULL, NULL),
(32, 19, 0, 54, 165, '4.13', '2019-05-03 00:00:00', NULL, '2019-05-02 23:25:40', '2019-05-02 23:25:40', 'SURYA TEJA ENGINEERING', '9854623547', '39002', '2019-05-03', NULL, NULL),
(33, 19, 0, 54, 182, '3', '2019-05-03 00:00:00', NULL, '2019-05-02 23:26:39', '2019-05-02 23:26:39', 'SURYA TEJA ENGINEERING', '7585326235', '39212', '2019-05-03', NULL, NULL),
(34, 19, 0, 54, 181, '1', '2019-05-03 00:00:00', NULL, '2019-05-02 23:26:39', '2019-05-02 23:26:39', 'SURYA TEJA ENGINEERING', '7585326235', '39212', '2019-05-03', NULL, NULL),
(35, 19, 0, 54, 180, '4', '2019-05-03 00:00:00', NULL, '2019-05-02 23:26:39', '2019-05-02 23:26:39', 'SURYA TEJA ENGINEERING', '7585326235', '39212', '2019-05-03', NULL, NULL),
(36, 19, 0, 54, 176, '4', '2019-05-03 00:00:00', NULL, '2019-05-02 23:26:39', '2019-05-02 23:26:39', 'SURYA TEJA ENGINEERING', '7585326235', '39212', '2019-05-03', NULL, NULL),
(37, 19, 0, 54, 174, '32', '2019-05-03 00:00:00', NULL, '2019-05-02 23:26:39', '2019-05-02 23:26:39', 'SURYA TEJA ENGINEERING', '7585326235', '39212', '2019-05-03', NULL, NULL),
(38, 19, 0, 54, 173, '12', '2019-05-03 00:00:00', NULL, '2019-05-02 23:26:39', '2019-05-02 23:26:39', 'SURYA TEJA ENGINEERING', '7585326235', '39212', '2019-05-03', NULL, NULL),
(39, 19, 0, 54, 165, '2.037', '2019-05-03 00:00:00', NULL, '2019-05-02 23:26:39', '2019-05-02 23:26:39', 'SURYA TEJA ENGINEERING', '7585326235', '39212', '2019-05-03', NULL, NULL),
(40, 19, 0, 54, 165, '10.40', '2019-05-03 00:00:00', NULL, '2019-05-02 23:27:01', '2019-05-02 23:27:01', 'CSM CONSTRUCTIONS', '9856475265', '5301', '2019-05-03', NULL, NULL),
(41, 19, 0, 54, 181, '1', '2019-05-03 00:00:00', NULL, '2019-05-02 23:29:38', '2019-05-02 23:29:38', 'SURYA TEJA ENGINEERING', '8954623212', '39216', '2019-05-03', NULL, NULL),
(42, 19, 0, 54, 180, '4', '2019-05-03 00:00:00', NULL, '2019-05-02 23:29:38', '2019-05-02 23:29:38', 'SURYA TEJA ENGINEERING', '8954623212', '39216', '2019-05-03', NULL, NULL),
(43, 19, 0, 54, 176, '4', '2019-05-03 00:00:00', NULL, '2019-05-02 23:29:38', '2019-05-02 23:29:38', 'SURYA TEJA ENGINEERING', '8954623212', '39216', '2019-05-03', NULL, NULL),
(44, 19, 0, 54, 174, '24', '2019-05-03 00:00:00', NULL, '2019-05-02 23:29:38', '2019-05-02 23:29:38', 'SURYA TEJA ENGINEERING', '8954623212', '39216', '2019-05-03', NULL, NULL),
(45, 19, 0, 54, 173, '14', '2019-05-03 00:00:00', NULL, '2019-05-02 23:29:38', '2019-05-02 23:29:38', 'SURYA TEJA ENGINEERING', '8954623212', '39216', '2019-05-03', NULL, NULL),
(46, 19, 0, 54, 165, '2.066', '2019-05-03 00:00:00', NULL, '2019-05-02 23:29:38', '2019-05-02 23:29:38', 'SURYA TEJA ENGINEERING', '8954623212', '39216', '2019-05-03', NULL, NULL),
(47, 19, 0, 54, 182, '2', '2019-05-03 00:00:00', NULL, '2019-05-02 23:30:09', '2019-05-02 23:30:09', 'SURYA TEJA ENGINEERING', '9856235478', '39309', '2019-05-03', NULL, NULL),
(48, 19, 0, 54, 181, '2', '2019-05-03 00:00:00', NULL, '2019-05-02 23:30:09', '2019-05-02 23:30:09', 'SURYA TEJA ENGINEERING', '9856235478', '39309', '2019-05-03', NULL, NULL),
(49, 19, 0, 54, 180, '4', '2019-05-03 00:00:00', NULL, '2019-05-02 23:30:09', '2019-05-02 23:30:09', 'SURYA TEJA ENGINEERING', '9856235478', '39309', '2019-05-03', NULL, NULL),
(50, 19, 0, 54, 176, '4', '2019-05-03 00:00:00', NULL, '2019-05-02 23:30:09', '2019-05-02 23:30:09', 'SURYA TEJA ENGINEERING', '9856235478', '39309', '2019-05-03', NULL, NULL),
(51, 19, 0, 54, 174, '30', '2019-05-03 00:00:00', NULL, '2019-05-02 23:30:10', '2019-05-02 23:30:10', 'SURYA TEJA ENGINEERING', '9856235478', '39309', '2019-05-03', NULL, NULL),
(52, 19, 0, 54, 173, '36', '2019-05-03 00:00:00', NULL, '2019-05-02 23:30:10', '2019-05-02 23:30:10', 'SURYA TEJA ENGINEERING', '9856235478', '39309', '2019-05-03', NULL, NULL),
(53, 19, 0, 54, 165, '2.050', '2019-05-03 00:00:00', NULL, '2019-05-02 23:30:10', '2019-05-02 23:30:10', 'SURYA TEJA ENGINEERING', '9856235478', '39309', '2019-05-03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `village` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `user_id`, `name`, `image`, `address`, `village`, `district`, `postcode`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(54, 19, 'Nellore', 'uploads/images/42391556791409.jpeg', 'Survey No- 109/1,  Ambapuram-Village, Nellore Rural', 'Ambapuram', 'Nellore', '524004', '14.4208581', '79.9336508', '2019-05-02 04:33:29', '2019-05-02 04:33:29'),
(55, 18, 'Bheemavaram Warehouse', 'uploads/images/64621556791802.jpg', 'D. No-3\\2,Neredu Garuvu,bondadapeta Bondada post,Bondada West godavari, Andhra pradesh', 'Bheemavaram', 'WEST GODAVARI', '534206', '16.32170', '81.26515', '2019-05-02 04:40:02', '2019-05-02 04:40:02'),
(56, 18, 'Vijayawada Warehouse', 'uploads/images/95881556792071.jpg', 'D.no:12/4c,Enekepadu,panchayat vijayawada Krishna district Andhrapradesh-521108', 'Vijaywada', 'KRISHNA', '521108', '16.516994', '80.697627', '2019-05-02 04:44:31', '2019-05-02 04:44:31'),
(57, 18, 'Guntur Warehouse', 'uploads/images/64701556792230.jpg', 'D.no:83-2-133,Yetukuru bypass Jagadamba road A.S.Rao estate, ward no:24 Guntur, Guntur district Andhrapradesh-522004', 'Guntur', 'GUNTUR', '522004', '16.2697700', '80.4443090', '2019-05-02 04:47:10', '2019-05-02 04:47:10'),
(58, 18, 'Yemmiganur Warehouse', 'uploads/images/89091556792452.jpg', 'Survey no:35/A,Mugathi village,Yemmiganur Mandal Kurnool District,Andhra pradesh-518360', 'Yemmiganur', 'KURNOOL', '518360', '15.815943', '77.463908', '2019-05-02 04:50:52', '2019-05-02 04:58:07'),
(59, 18, 'Ongole Warehouse', 'uploads/images/26351556792767.jpg', 'Survey no:104,Ongole Ilaka,Santhanuthalapadu Mandal Pernamitta Grama panchayath Andhrapradesh-523225', 'Ongole', 'PRAKASAM', '523225', '15.52402333', '80.02089333', '2019-05-02 04:56:07', '2019-05-02 04:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `store_item`
--

CREATE TABLE `store_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store_items`
--

CREATE TABLE `store_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `user_id`, `title`, `unit`, `created_at`, `updated_at`) VALUES
(7, NULL, 'Per Piece', 'pc', '2019-03-15 20:20:51', '2019-03-29 13:32:37'),
(8, NULL, 'Meters', 'mts', '2019-03-16 01:46:19', '2019-03-29 13:32:26'),
(9, 12, 'Kilo Meters', 'KM', '2019-03-20 02:42:31', '2019-04-30 04:50:04'),
(10, 1, 'Numbers', 'Nos', '2019-03-24 18:35:15', '2019-03-29 13:32:19'),
(31, 12, 'Yard', 'yard', '2019-04-25 05:28:23', '2019-04-25 05:28:23'),
(33, 19, 'Rolls', 'Rolls', '2019-05-02 14:13:00', '2019-05-02 14:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `upload_templates`
--

CREATE TABLE `upload_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `upload_templates`
--

INSERT INTO `upload_templates` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'FAT', '2019-04-26 06:11:32', '2019-04-26 06:11:32'),
(2, 'Invoice Receipt', '2019-04-26 06:11:51', '2019-04-26 06:11:51'),
(3, 'Challan', '2019-04-26 06:11:59', '2019-04-26 06:11:59'),
(4, 'Specification', '2019-04-26 06:12:06', '2019-04-26 06:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `village` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `api_login_type` int(11) DEFAULT NULL,
  `short_by` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `phone`, `address`, `village`, `district`, `postcode`, `lat`, `lng`, `type`, `remember_token`, `created_at`, `updated_at`, `api_login_type`, `short_by`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$tph5lMjrDmMn4OHDiJ.41.JMhfF/HKsOGvDqCo4xZhCwzLphtKKeq', '', '', '', '', '', '', '', '', 1, 'HAGooVxMzQkHgloHE0eXJG3kNimIVF6qglL46Pak4jh923cDaHZjKpZBg441', '2019-02-22 00:27:26', '2019-02-22 00:27:26', 5, NULL),
(18, 'TCIL', 'tcil.admin@gmail.com', NULL, '$2y$10$Qehyp4TrNMsAaExMO.P4XO8qa1YVNSbuPFIHVB4hR92eJMzToDx9W', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '9vHjfELCwfimgXjnaGj1iOCw1K8xiXDo6rICI8RVALJXVMxFyEvOh0AFLssq', '2019-04-30 01:29:41', '2019-04-30 01:29:41', 6, NULL),
(19, 'L & T', 'lnt.admin@gmail.com', NULL, '$2y$10$KerZJWNok6MirIS6I0lQ8O389GYPB/dA3RXStlbNgvLB8BeC/mVKu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '66HAylaYxGmX0AN62nmj7z3fXq7oLNmc6w1CUwNahfFuqJfkQc00O48TsVTZ', '2019-04-30 01:31:21', '2019-04-30 01:31:21', 8, NULL),
(20, 'TERASOFT', 'terasoft.admin@gmail.com', NULL, '$2y$10$PB8WgNun6HGJtX5yvc97zuDFBhzwicq1/VwnBfpu/oXVLEV7BIZ0G', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, '2019-04-30 01:31:54', '2019-04-30 01:31:54', 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_unit_id_foreign` (`unit_id`),
  ADD KEY `items_store_id_foreign` (`store_id`);

--
-- Indexes for table `item_logs`
--
ALTER TABLE `item_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `item_masters`
--
ALTER TABLE `item_masters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_masters_user_id_foreign` (`user_id`),
  ADD KEY `item_masters_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `item_types`
--
ALTER TABLE `item_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_files`
--
ALTER TABLE `media_files`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `release_stocks`
--
ALTER TABLE `release_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `release_stocks_store_id_foreign` (`store_id`),
  ADD KEY `release_stocks_item_id_foreign` (`item_id`);

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
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stores_user_id_foreign_key` (`user_id`);

--
-- Indexes for table `store_item`
--
ALTER TABLE `store_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_item_store_id_foreign` (`store_id`),
  ADD KEY `store_item_item_id_foreign` (`item_id`);

--
-- Indexes for table `store_items`
--
ALTER TABLE `store_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_items_store_id_foreign` (`store_id`),
  ADD KEY `store_items_item_id_foreign` (`item_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_templates`
--
ALTER TABLE `upload_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendors_user_id_foreign_key` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `item_logs`
--
ALTER TABLE `item_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `item_masters`
--
ALTER TABLE `item_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `item_types`
--
ALTER TABLE `item_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media_files`
--
ALTER TABLE `media_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `release_stocks`
--
ALTER TABLE `release_stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `store_item`
--
ALTER TABLE `store_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_items`
--
ALTER TABLE `store_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `upload_templates`
--
ALTER TABLE `upload_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `items_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `release_stocks`
--
ALTER TABLE `release_stocks`
  ADD CONSTRAINT `release_stocks_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `release_stocks_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `stores_user_id_foreign_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `store_item`
--
ALTER TABLE `store_item`
  ADD CONSTRAINT `store_item_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `store_item_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `store_items`
--
ALTER TABLE `store_items`
  ADD CONSTRAINT `store_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `store_items_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_user_id_foreign_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
