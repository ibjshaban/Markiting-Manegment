-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 04:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `markertersmanegment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `photo_profile`, `password`, `group_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'test@test.com', 'admin/1/W9pZfYHeS76qtl0DwybhtmXOBY2pgPW5rLeETZF3.png', '$2y$10$3OfiGCNuMrl8WZtHsq.6Q.yCjpbIm.qkVfR3bUHLj01dDQivEOlBO', 1, 'wj7h6GOb1OCSihpLwDplWlFgNykGNY5Lmgpw8wByV21aZ4K5zuafgXjVFrVd', '2021-10-21 05:57:54', '2021-11-27 13:09:34'),
(2, 'abood', 'abood@abood.com', '', '$2y$10$//SqDC0paunk/GGY7Qvboe61lIYVPcR.FTumdSwoazqvCRd5Db9Cm', 2, NULL, '2021-10-21 08:49:53', '2021-11-20 23:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `admin_groups`
--

CREATE TABLE `admin_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_groups`
--

INSERT INTO `admin_groups` (`id`, `admin_id`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Full Permission - Admin', '2021-10-21 05:57:54', '2021-10-21 05:57:54'),
(2, 1, 'صلاحية جديدة', '2021-11-01 10:59:13', '2021-11-01 10:59:13');

-- --------------------------------------------------------

--
-- Table structure for table `admin_group_roles`
--

CREATE TABLE `admin_group_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_groups_id` bigint(20) UNSIGNED DEFAULT NULL,
  `show` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `add` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `edit` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `delete` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_group_roles`
--

INSERT INTO `admin_group_roles` (`id`, `name`, `admin_groups_id`, `show`, `add`, `edit`, `delete`, `created_at`, `updated_at`) VALUES
(1, 'admingroups', 1, 'yes', 'yes', 'yes', 'yes', '2021-10-21 05:57:54', '2021-10-21 05:57:54'),
(2, 'admins', 1, 'yes', 'yes', 'yes', 'yes', '2021-10-21 05:57:54', '2021-10-21 05:57:54'),
(3, 'settings', 1, 'yes', 'no', 'yes', 'no', '2021-10-21 05:57:54', '2021-10-21 05:57:54'),
(4, 'marketer', 1, 'yes', 'yes', 'yes', 'yes', '2021-10-21 09:15:00', '2021-10-21 09:15:00'),
(5, '', 1, 'yes', 'yes', 'yes', 'yes', '2021-10-21 09:52:35', '2021-10-21 09:52:35'),
(6, 'page', 1, 'yes', 'yes', 'yes', 'yes', '2021-10-21 10:05:31', '2021-10-21 10:05:31'),
(7, 'test', 1, 'yes', 'yes', 'yes', 'yes', '2021-10-21 10:30:26', '2021-10-21 10:30:26'),
(8, 'clientcont', 1, 'yes', 'yes', 'yes', 'yes', '2021-10-21 11:25:21', '2021-10-21 11:25:21'),
(9, 'guest', 1, 'yes', 'yes', 'yes', 'yes', '2021-10-23 08:13:25', '2021-10-23 08:13:25'),
(10, 'cleint', 1, 'yes', 'yes', 'yes', 'yes', '2021-10-23 08:50:23', '2021-10-23 08:50:23'),
(11, 'group', 2, 'no', 'no', 'no', 'no', '2021-11-01 10:59:13', '2021-11-01 10:59:13'),
(12, 'marketer', 2, 'yes', 'yes', 'yes', 'yes', '2021-11-01 10:59:13', '2021-11-01 10:59:13'),
(13, 'admin', 2, 'no', 'no', 'no', 'no', '2021-11-01 10:59:13', '2021-11-01 10:59:13'),
(14, 'transaction', 1, 'yes', 'yes', 'yes', 'yes', '2021-11-06 15:23:00', '2021-11-06 15:23:00'),
(15, 'shipping', 1, 'yes', 'yes', 'yes', 'yes', '2021-11-08 10:33:44', '2021-11-08 10:33:44'),
(16, 'advertisement', 1, 'yes', 'yes', 'yes', 'yes', '2021-11-09 13:59:59', '2021-11-09 13:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `videos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `admin_id`, `title`, `description`, `photos`, `videos`, `created_at`, `updated_at`) VALUES
(1, 1, 'Aliquid velit conseq', 'Atque est dolore et', 'advertisement/1/VwNzZitRQOdKeSUaz5DIbVarsOYZeCFmxGzw0ohE.jpg', 'advertisement/3WJ0mX9j4P6XMzZgDa9sVEEWHNLxld4dE7wpJNte.mp4', '2021-11-09 14:16:01', '2021-11-09 14:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `cleints`
--

CREATE TABLE `cleints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `marketer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `transport_type` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_country` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_city` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cleints`
--

INSERT INTO `cleints` (`id`, `admin_id`, `marketer_id`, `name_ar`, `name_en`, `email`, `password`, `address`, `mobile`, `transport_type`, `to_country`, `to_city`, `note`, `photo_profile`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, 'Byron Griffin', 'Merritt Rhodes', 'nyfynig@mailinator.com', '$2y$10$7f9xgVqLGFSHdzBVg8TL2.EztRIZk2uf3dC6MfPt1q8fXAKR2/XwC', 'Sint ad reprehenderi', 53, '', '', '', '', '', 'active', NULL, '2021-10-26 07:12:24', '2021-10-26 07:12:24'),
(3, 1, NULL, 'Micah Reed', 'Stacy Cruz', 'gufyvu@mailinator.com', '$2y$10$nJLKG8Szq3.bxcJZqxPzluSXAeJL3.vLmONhVNypVb8chH7024W66', 'Id officiis quia deb', 51, '', '', '', '', '', 'active', NULL, '2021-10-30 07:00:55', '2021-11-20 23:14:29'),
(5, 1, 1, 'zGretchen Madden', 'Acton Hanson', 'wutipo@mailinator.com', '$2y$10$ABzV7cyQ8conHL0DObFia../5vbUx5ATPuSg2rmeuKKmkPH4SBgJm', 'Qui et quaerat tempo', 7, '', '', '', '', '', 'active', NULL, '2021-10-30 09:20:07', '2021-11-20 23:15:55'),
(6, 1, 1, 'Camden Noel', 'Simone Joseph', 'letozyxix@mailinator.com', '$2y$10$1Z7G9zHxY083mAP0Fef.9.Qrp9iTa.pmC.6Os6igeaGPBTfaNnxG6', 'Cillum facere quis u', 81, '', '', '', '', '', 'inactive', NULL, '2021-10-30 09:54:09', '2021-11-06 14:13:18'),
(7, 1, NULL, 'Miriam Shepard', 'Cairo Kim', 'tugimarit@mailinator.com', '$2y$10$CCqXWjrhnMlZd28CcmuhxeE4a8UCSY.mF3/F5IfeQPXk1qnYOdLDC', 'Autem aliquam aut vo', 22, '', '', '', '', '', 'active', NULL, '2021-10-31 09:37:43', '2021-11-04 11:10:41'),
(8, 1, 1, 'Shay Abbott', 'Lila Ayers', 'qoxuzutut@mailinator.com', '$2y$10$3MrjlvWVXYJ1b/bgyaA9DecJ5HBohvJT1FPI86/xu4U1iOq5cZ/SK', 'Quas dolor non dolor', 43, '', '', '', '', '', 'active', NULL, '2021-11-01 11:10:41', '2021-11-06 14:00:13'),
(9, 1, NULL, 'Shay Abbott', 'Lila Ayers', 'qoxuzutut@mailinator.com', '$2y$10$oP2OmEUon2DDQBOXwrJcSeHUJWr2jgwLaXeLMnvjvb1/bZBPKDIaq', 'Quas dolor non dolor', 43, '', '', '', '', NULL, 'active', NULL, '2021-11-06 13:09:46', '2021-11-06 13:09:46'),
(10, 1, NULL, 'Shay Abbott', 'Lila Ayers', 'qoxuzutut@mailinator.com', '$2y$10$5XrdVekOC3Xx19/tFafiM.RveTYLJFOLmPN9.HED3vPf.kvnJrXBa', 'Quas dolor non dolor', 43, '', '', '', '', NULL, 'inactive', NULL, '2021-11-06 13:09:53', '2021-11-06 13:09:53'),
(11, 1, NULL, 'Shay Abbott', 'Lila Ayers', 'qoxuzutut@mailinator.com', '$2y$10$DEvH3ttCudSKLjr01j7RKevawphGkKsdoNPucF256TlTzNHDMFDom', 'Quas dolor non dolor', 43, '', '', '', '', NULL, 'inactive', NULL, '2021-11-06 13:10:47', '2021-11-06 13:10:47'),
(12, 1, NULL, 'Shay Abbott', 'Lila Ayers', 'qoxuzutut@mailinator.com', '$2y$10$FzmJCg.ueuagC6NisfLT6eqjP7H5WPGziyJIhH5bWCZSdTX3z7FCC', 'Quas dolor non dolor', 43, '', '', '', '', NULL, 'active', NULL, '2021-11-06 13:10:56', '2021-11-06 13:10:56'),
(13, 1, NULL, 'Shay Abbott', 'Lila Ayers', 'qoxuzutut@mailinator.com', '$2y$10$CtstUjKewQK4Ac39jvMtAeEg4.GsXq/JeKMG37M.Q9Zx5IN101Z0.', 'Quas dolor non dolor', 43, '', '', '', '', NULL, 'active', NULL, '2021-11-06 13:11:03', '2021-11-06 14:37:03'),
(14, 1, 1, 'ابراهيم', 'Ibrahim Shaban', 'hussam@test.com', '$2y$10$YAQfrStrwQfI4f4R3in7muDY0bnmjQEC4XXlirT1E/Cw2/9yWZtb.', 'Al jalaa', 597244786, '', '', '', '', '', 'active', NULL, '2021-11-20 23:22:42', '2021-11-20 23:32:04'),
(15, 1, 1, 'احمد', 'Ahmed', 'ahmed@test.com', '$2y$10$3M66EQZsodw8s3lAYp6E8.hg0p8yZuUGgmMJ.99uu3qlY9xsT5Qta', 'Al jalaa', 46142131665, '', '', '', '', '', 'active', NULL, '2021-11-20 23:49:49', '2021-11-20 23:53:19'),
(16, 1, NULL, 'Brooke Sheppard', 'Courtney Fuller', 'nexa@mailinator.com', '$2y$10$QE0NOloo4VNBHkr0t8z.UuVMoQfXu.qaGuo80z5dlnIQF92DAaBMW', 'Sequi ratione nulla', 33, 'Officiis et sit vel', 'Do dolor reprehender', 'Nam elit enim non u', 'Ex omnis laudantium', '', 'inactive', NULL, '2021-11-22 12:25:12', '2021-11-22 12:25:12'),
(17, 1, NULL, 'Brooke Sheppard', 'Courtney Fuller', 'nexa@mailinator.com', '$2y$10$796zptPZy2dMSG9LJdDhr.L8MTNXXdUvnFXvkkkLErGT0kMjqtbPC', 'Sequi ratione nulla', 33, 'Officiis et sit vel', 'Do dolor reprehender', 'Nam elit enim non u', 'Ex omnis laudantium', '', 'inactive', NULL, '2021-11-22 12:25:40', '2021-11-22 12:25:40'),
(18, NULL, 1, 'Reed Mccray', 'Cedric Ballard', 'xirox@mailinator.com', '$2y$10$XvGruxRxBzwCcUsq/wJWLuSvfIU9jUOUE09wXCMZaKXZdP/hXuTUi', 'Ut totam dolore dolo', 93, 'Eaque dolore officii', 'البحرين', 'المحافظة الجنوبية', 'Enim accusantium pra', '', 'inactive', NULL, '2021-11-22 14:57:48', '2021-11-22 14:59:52'),
(19, NULL, 1, 'Beck Franklin', 'Zachary Floyd', 'jyxukobi@mailinator.com', '$2y$10$ZlxAcAsQ1CVnJwYmnHuCyuVHCwKPxVj.EUCkxGNMlRHAGLse7Xe/W', 'Quia fuga Fugiat mi', 2, 'Aperiam molestias ea', 'الرأس الأخضر', 'ريبيرا غراندي', 'Tempor illo et repre', '', 'inactive', NULL, '2021-11-23 12:05:53', '2021-11-23 12:05:53'),
(20, NULL, 1, 'Hedy Clemons', 'Adrienne Bradshaw', 'kakufody@mailinator.com', '$2y$10$6Q0PcEYGmwJC9KWkOMuMy.G1OQn6DdAOigHhNkC5iRHwD0P48Ig8C', 'Et quia velit corru', 66, 'Velit accusamus in o', 'سويسرا', 'فريبورغ', 'Beatae culpa laboris', '', 'inactive', NULL, '2021-11-23 12:10:07', '2021-11-23 12:10:07'),
(21, NULL, 1, 'Hedy Clemons', 'Adrienne Bradshaw', 'kakufody@mailinator.com', '$2y$10$zz6FJFWZixbZRM5otKIUcO1wvpwN/EavyVL7FXzBOeh5N1xQM5iMK', 'Et quia velit corru', 66, 'Velit accusamus in o', 'سويسرا', 'فريبورغ', 'Beatae culpa laboris', '', 'inactive', NULL, '2021-11-23 12:11:56', '2021-11-23 12:11:56'),
(22, NULL, 1, 'Hedy Clemons', 'Adrienne Bradshaw', 'kakufody@mailinator.com', '$2y$10$b4LnxLkiJDo1UU1bL2YbReWfLMANYwh8scQRVNje3zXJHQXdYnxu6', 'Et quia velit corru', 66, 'Velit accusamus in o', 'سويسرا', 'فريبورغ', 'Beatae culpa laboris', '', 'inactive', NULL, '2021-11-23 12:12:11', '2021-11-23 12:12:11'),
(23, NULL, 1, 'Hedy Clemons', 'Adrienne Bradshaw', 'kakufody@mailinator.com', '$2y$10$HL852hG.FVNkvuYD2v2BDOi9llRkIPWCWmOreIxHgvc6XDnunMXsu', 'Et quia velit corru', 66, 'Velit accusamus in o', 'سويسرا', 'فريبورغ', 'Beatae culpa laboris', '', 'inactive', NULL, '2021-11-23 12:13:46', '2021-11-23 12:13:46'),
(24, NULL, 1, 'Keane Glover', 'Kay Grant', 'rikucoruji@mailinator.com', '$2y$10$ot/7b1SqpdeqMgoNLVluI.Nzsz9Sz6Ei/rG2tDRtoqVWik9BGduTW', 'Proident qui volupt', 47, 'Consectetur labore f', 'بنين', 'Couffo', 'Omnis est ipsa Nam', '', 'inactive', NULL, '2021-11-23 12:50:18', '2021-11-23 12:50:18'),
(25, NULL, 1, 'Keane Glover', 'Kay Grant', 'rikucoruji@mailinator.com', '$2y$10$wpRNCA9wKP7.vQw7rSOZGuu0vo0lZpN.gwp1yF76SJk7VFlVdPHcq', 'Proident qui volupt', 47, 'Consectetur labore f', 'بنين', 'Couffo', 'Omnis est ipsa Nam', '', 'inactive', NULL, '2021-11-23 12:51:08', '2021-11-23 12:51:08'),
(26, NULL, 1, 'Aladdin Allen', 'Jocelyn Hoover', 'ryni@mailinator.com', '$2y$10$k7BUSOu07MZJOg1MmpnAJeJVh3LY64au66h75I2VrhYgMUVXeCDay', 'Incididunt ipsa in', 30, 'Veniam et neque ips', 'غانا', 'أعالي الغرب', 'Id ipsum consequatur', '', 'inactive', NULL, '2021-11-23 12:52:12', '2021-11-23 12:52:12'),
(27, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$MlqVVyLS5OYuFDTosFEeQe3HZrI8zf4MBd7ua.nNLxI.uLJa1u.qy', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 13:51:46', '2021-11-23 13:51:46'),
(28, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$aDTUI7qwG6E1C0OSKua.7.RTZOt7Uu7vpZDMw2vRY7Lg56z8FAmvK', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 13:52:19', '2021-11-23 13:52:19'),
(29, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$DaRaZZ0VsyVbRRNKvc7L7.h9DOdqyW.HKZ85zrjsRdpeuc6vqbxCS', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 13:53:50', '2021-11-23 13:53:50'),
(30, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$A.1lPE9X42X8FakTWtp6nu24cueqXwetsz.nWopt0KK9XlvtBtOwm', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 13:57:52', '2021-11-23 13:57:52'),
(31, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$w3/4.btJJDYxwzTQpsPPpexSMNKzVEBjEXrYRTdVU0NkbInhF2AvO', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 13:58:45', '2021-11-23 13:58:45'),
(32, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$7CXfUu1C481ODp1JH.b6Y.yiEuZEIYCojfjB6elUpeGMNIoDznbBe', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 13:59:04', '2021-11-23 13:59:04'),
(33, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$lQAiYLf6HNrZbyRq/f2HGusts86cuIVpIYDQu8QY.hVTNn0R.I0Q.', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 13:59:26', '2021-11-23 13:59:26'),
(34, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$tCYDiOBvbkJJk7f9xczPGe.aGtmnYzc9BKWvMnoNYix570wQgAt9C', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 13:59:40', '2021-11-23 13:59:40'),
(35, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$ABXp9OIvH406Oy/inw2wNuX2zO/Q0az1as4/WO2SoC3hRbdpzWP3K', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 14:04:20', '2021-11-23 14:04:20'),
(36, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$th9Pb06Qk.q6DYwkacevZuKe0cgknUgUrndvbh4KyzV4k1azHr1gG', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 14:04:56', '2021-11-23 14:04:56'),
(37, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$TyAcUS.tALTlGVZR2gnhiupZ3FHnY0g3gjHhJHBYdi0MPz2FwKiey', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 14:05:07', '2021-11-23 14:05:07'),
(38, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$QQj32ahVT9f467Dr5ZMH6.jZ/uQAZArDlsiGLPjF6DJWkAx7wDwnm', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 14:05:16', '2021-11-23 14:05:16'),
(39, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$XXfF3U2UKbSNQxUkfpdRk.5/ekdVwkSI1y07Q1oGZdQuTTV9pfooy', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 14:06:18', '2021-11-23 14:06:18'),
(40, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$ceNqRhAvWEPD8wJIMZUHlunNLhxtAETkhWnly5w0iIGRx.bIoTpXy', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 14:06:58', '2021-11-23 14:06:58'),
(41, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$GeOjgIqX5xIMJGukzpViI.p1gkWx7.W9EiNmlhiOFW1ZwK9JO4Su.', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 14:07:04', '2021-11-23 14:07:04'),
(42, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$fiEk6bIiIdFsBcjV6wFsAOaTPJ3f6kJ0K4DFocxzmjBBIKq86j/Pq', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 14:07:21', '2021-11-23 14:07:21'),
(43, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$cfugHQqdWCo76EUGSN.hueCnQoTJnSqMTYZAJUnm7z.bVbNd2Qs1y', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 14:07:40', '2021-11-23 14:07:40'),
(44, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$OCTVAWnUEjPyU4949duIxepfRdfnu.Rnu3aI/W1vWyH4nsB4L4JJK', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 14:07:57', '2021-11-23 14:07:57'),
(45, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$aArYWBTT7UFnLbTmL8qoq.ZL5UvcIQrbn.wMvagN1fR.ICJiAYIte', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 14:09:15', '2021-11-23 14:09:15'),
(46, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$z5BG4arqPmeEN2AtDyXHK.LyZYI4zG7g9Nf6zBinDkvueTCqWPE0W', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 14:09:39', '2021-11-23 14:09:39'),
(47, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$5D.ALRYUeYsmtdq5O9eFtuN.oosi7ybvK/VQWj4NFamg3lgxmw9UG', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 14:09:51', '2021-11-23 14:09:51'),
(48, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$2i0nVF0JW.zUvr64WcSUNO5NPVWqrAqTVcOqRHWQhXhLHU0SMf/1C', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 14:10:04', '2021-11-23 14:10:04'),
(49, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$XZr0/kXK/gT0lZbdUr2CT.ZSakZxpzyrpZODQ942c2hZnX4VQAm5C', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 14:10:10', '2021-11-23 14:10:10'),
(50, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$smSPbZrLJCyamdh977gDqOYui8xI3Lx9Ep.icfGAbX1niRITk50kW', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 14:10:19', '2021-11-23 14:10:19'),
(51, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$8Ge6LAEPVApwvsf2Jl7FReLvHo.vRVQX7xIfGGoxBPW1JgIhR2tKK', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 14:10:38', '2021-11-23 14:10:38'),
(52, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$xllMd0.H7eMf3ajmLcs7j.InlGGibgktzDjfBXRLqJGwXFAy0w2Qm', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 14:10:46', '2021-11-23 14:10:46'),
(53, NULL, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$NjT8iITmypn5X21eydkAFeWS6R9MNB4S7t0StN0mFvqLpMf63LI2C', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 14:10:52', '2021-11-23 14:10:52'),
(54, 1, 1, 'Rahim Estrada', 'Malik Patterson', 'lahekoco@mailinator.com', '$2y$10$J3G1HisJOSwYP40sK8IiuOYz1xNWXjod2ump45ocrXFk4rde1h7ci', 'Incididunt alias et', 20, 'Iure labore minima o', 'باراغواي', 'إدارة امامباي', 'Culpa qui velit et q', '', 'inactive', NULL, '2021-11-23 15:22:47', '2021-11-23 15:22:47'),
(55, 1, 1, 'Rebekah Huber', 'Myra Thomas', 'wajakecine@mailinator.com', '$2y$10$A/M1qJ7Z9b4Qg5aTbY.mWO2KmAh93ys5/BsMxy1Y/QNzBz0qu.s3m', 'Et commodi delectus', 94, 'Omnis voluptates qui', 'جزر القمر', 'القمر الكبرى', 'Culpa quis id non d', '', 'inactive', NULL, '2021-11-23 15:24:01', '2021-11-23 15:24:01'),
(56, 1, 1, 'Kaden Coleman', 'Jorden Madden', 'quta@mailinator.com', '$2y$10$uebmeQJ8WsbN8d7AKGt3B..yS0lAOanWYQZI0ZgYZ5ntr7rjtXNte', 'Non non dolore odio', 11, 'Ad ut rem sequi et n', 'غواتيمالا', 'ايسكوينتلا', 'Eum omnis accusantiu', '', 'inactive', NULL, '2021-11-23 15:34:41', '2021-11-23 15:34:41'),
(57, 1, 1, 'Kaden Coleman', 'Jorden Madden', 'quta@mailinator.com', '$2y$10$Od1mVEFBkX7uLjx.Z2A/AelkS3G45BqUtkW5sHYrzvpbVynkGO3Fy', 'Non non dolore odio', 11, 'Ad ut rem sequi et n', 'غواتيمالا', 'ايسكوينتلا', 'Eum omnis accusantiu', '', 'inactive', NULL, '2021-11-23 15:39:21', '2021-11-23 15:39:21'),
(58, 1, 1, 'Kaden Coleman', 'Jorden Madden', 'quta@mailinator.com', '$2y$10$U4gVJyc0awgEnSi9ENwHouDj3rmtiPKqsJjzoGTpngCgFCgHrsu3e', 'Non non dolore odio', 11, 'Ad ut rem sequi et n', 'غواتيمالا', 'ايسكوينتلا', 'Eum omnis accusantiu', '', 'inactive', NULL, '2021-11-23 15:40:30', '2021-11-23 15:40:30'),
(59, 1, 1, 'Patricia Armstrong', 'Paula Clay', 'jananufe@mailinator.com', '$2y$10$x78RJqp3wTxwe9rCg0GUc.LG.nAeEe1tFW8LMjaPJg6h.54YoMreC', 'Quo earum earum quam', 39, 'Duis laborum proiden', 'اليونان', 'جبل آثوس', 'Dolor veniam cupidi', '', 'inactive', NULL, '2021-11-23 15:41:08', '2021-11-23 15:41:08'),
(60, 1, 1, 'omar', 'Dean Zimmerman', 'cakucagik@mailinator.com', '$2y$10$ezI5Tftm8jU6bkNYjb44ZuSQARbpFXX9aqjjP5KFJNiWjhKI/DQaa', 'Voluptate itaque ame', 13, 'Aut repudiandae libe', 'ناميبيا', 'إقليم أوشانا', 'Aspernatur dignissim', '', 'inactive', NULL, '2021-11-23 15:42:12', '2021-11-23 15:42:12'),
(61, 1, 1, 'alaa', 'alaa', 'alaa@mailinator.com', '$2y$10$F4VxrBK9izwlArr07KWKG.5xP9k7aUpKCZ4z7wVZRB1MTSaKoTyxu', 'Minima est id quos d', 90, 'Magni ipsum veritat', 'دومينيكا', 'القديس بطرس', 'Cupidatat voluptatem', '', 'inactive', NULL, '2021-11-23 22:32:24', '2021-11-23 22:32:24'),
(62, 1, 1, 'Ibrahim Shaban', 'Ibrahim Shaban', 'hussam@test.com', '$2y$10$G.bviOGnpyXFuRug8WPU7u.OEoKVNAk1dJVE4W9LaVFToFnIVllrS', 'Al jalaa', 597244786, 'Aliqua Quaerat haru', 'جزر أولاند', 'Lemland', 'vbfdcv', '', 'inactive', NULL, '2021-11-24 12:12:22', '2021-11-24 12:12:22'),
(63, 1, NULL, 'Ulla Kennedy', 'Helen Walker', 'vavepux@mailinator.com', '$2y$10$HxLFpvhUIqcFwcyjoyr.oewZXc1hSRKdqyIdFGA/ddgHmpD2xZXvG', 'Ut quam mollit susci', 47, 'Rem amet iure digni', 'سان بيير وميكلون', 'سان بيير وميكلون', 'Elit commodi ea dol', '', 'inactive', NULL, '2021-11-24 12:14:22', '2021-11-24 12:14:22'),
(64, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$YdhzQfExOpHGl2KsaJXTv.v/6F6EvB0n0aF7bCZBmnJbRwWrCLQs2', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:05:54', '2021-11-24 13:05:54'),
(65, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$URlFk0JGQL4jVyaZ8Ab9Z.LXGW3NYCIk.3IjcWNQxleHaQb06.Kta', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:06:13', '2021-11-24 13:06:13'),
(66, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$vjY.5GPvKjB0G9mIdS0NQ.jbD6PfcXle5DXYXZEpq5zfEt1WXf/KC', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:06:48', '2021-11-24 13:06:48'),
(67, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$vjYuTwwYXtMqym03x12/vO8l4dcFlfoGJGEftRzPxDEQ/RvbDXrsq', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:07:22', '2021-11-24 13:07:22'),
(68, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$Xpt1c9BrFnP7OcYEBGedE.WApIKjglClZWgicatRGUF0JkFEDFbz6', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:08:07', '2021-11-24 13:08:07'),
(69, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$Ya9lBiBS53YaWaXsSeqUFu/GctGVRKpNJMbejDdaotxjx93ssIjKi', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:09:13', '2021-11-24 13:09:13'),
(70, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$JbQ4uSaSHeyINIEaDybS9uk0iYo3zfYYDNZFf0VZMybeTPfe8YSOq', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:09:43', '2021-11-24 13:09:43'),
(71, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$g7x8fUo7.4cV7QAhzvsha.jPGuv3CFL5mgtE3Wcv/ASlfJADnyTym', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:09:49', '2021-11-24 13:09:49'),
(72, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$RKoWBBR6/ffdbMPg3xFIcuOk5yTAns1UgkUYrJVpNOAE4T2q7vtVe', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:10:13', '2021-11-24 13:10:13'),
(73, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$aEqbR4Stn6Pssd6/wpLV/OHVOncJY70.0RnCeycBw41c./.E7fAyG', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:10:29', '2021-11-24 13:10:29'),
(74, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$S.3NrIQq5F.XGxvOKr9Oker4cjUFQzo/u64ptVd8vamU.ygo7/Bsu', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:10:32', '2021-11-24 13:10:32'),
(75, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$d1sBTRudl/lGZKpCuQM9Behf5DKiUt4gjKrRYqYZ6anvleGPduNPO', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:10:45', '2021-11-24 13:10:45'),
(76, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$lfzpzP656ltkx9qpL5dQv.5m95iEdMUJyrm4mwhxTBx5sOjlqeVP2', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:11:18', '2021-11-24 13:11:18'),
(77, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$4DnG9Ip6HYBCJ9QQca6TmOZdtxq.c3fwrZGK2jS2n9Aw356z.hnWy', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:11:43', '2021-11-24 13:11:43'),
(78, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$y0jKauIFs/TDMPioox6aKO2/dXkZQFWVzsURo8LNALIxnXTr3wpgu', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:11:52', '2021-11-24 13:11:52'),
(79, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$2luAd9GQitpSPyx4XVF54Od.opNpBi01ZAquklejDInnanbXlfRkS', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:12:29', '2021-11-24 13:12:29'),
(80, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$6ecTkhLSB7BhO7chDia.tuCZHDkVWVGn5DqXOAzDJ601DHBarhUjC', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:12:50', '2021-11-24 13:12:50'),
(81, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$kPZBH03r6M1mZyFl3rRZHuf7yO4LgUSTPV07XiO2jhoT3E7vINTxK', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:13:30', '2021-11-24 13:13:30'),
(82, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$EWDv7Uzj3ItA7We8nUGODOGu2T2qWn8zqcvIMxYT6lrUHQGyrSaRW', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:13:46', '2021-11-24 13:13:46'),
(83, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$l/gsVNZB/ZJZWaNGHOOkauPINC1jo0YN7Dh/LQxOuHZw/5V01sv5q', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:14:26', '2021-11-24 13:14:26'),
(84, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$BdLRrnxXKehNEq.7VufJiuaLS8jIzsn/.P7p6NeZ2fgg1udZkz052', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:14:39', '2021-11-24 13:14:39'),
(85, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$qnbtKCfmmtn/XoogDkyuEe5iPdoeaDcCmy3eWuGByzhjmg1DMK6bq', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:14:50', '2021-11-24 13:14:50'),
(86, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$ag/0TPKkCoSvyMBXvWf6P.CmOQ7TnXOtC7R/Onfm43YZ45YnNX36W', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:15:36', '2021-11-24 13:15:36'),
(87, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$weEvzS2HT/LNdheCEaq4wOJdkkBrZ.f45Z6SZqWq8sWE69mKudATa', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:20:24', '2021-11-24 13:20:24'),
(88, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$vDVWOTaxHWLoVRekecePMew01y2V.Brc1/yK/h9VdzfRt7ueC6m5y', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:21:03', '2021-11-24 13:21:03'),
(89, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$FdzofamBd4qUhXEuaFLJ0O8NwmwOpagTRoyddv0MivostI2k32M2y', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:21:31', '2021-11-24 13:21:31'),
(90, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$xgXyowDAb239Xkgw5dyunex5Q53HI1soxdCA0zvWdNLeLhpFeFyAK', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:23:13', '2021-11-24 13:23:13'),
(91, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$kYOL4wQUN8hVeL748YhZDeK.2aVfsKVRIptFw3Q9yRKJnp5IF70fO', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:23:51', '2021-11-24 13:23:51'),
(92, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$SkT/MXLPALbP3kXyB67tmu9jlLn236bXRzvH0Ic9WXUhBcn4vVYB2', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:24:08', '2021-11-24 13:24:08'),
(93, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$Rnfb8wSVS60dBruJ1c8OX.OcJ6yIieSYybMlctSlXKs9VNl4W1sR6', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:24:33', '2021-11-24 13:24:33'),
(94, 1, 1, 'Anthony Knight', 'Felix Norman', 'quwa@mailinator.com', '$2y$10$BC3Iad3Wpl9vxomIXzj08ee2rmV6wtZu3It3O//bMEG1NEb9cnhL6', 'Omnis ex et ipsum d', 18, 'Fugit in praesentiu', 'نييوي', 'نييوي', 'Et magna consequatur', '', 'inactive', NULL, '2021-11-24 13:25:05', '2021-11-24 13:25:05'),
(95, 1, 1, 'Keiko Adkins', 'Maryam Reid', 'vakuwocomu@mailinator.com', '$2y$10$0Ou2b23WBJCIr3n5iSigZO5LsMOJOAhjTTnZ.XCoZYk9qYg0VqaSK', 'Voluptatum nisi volu', 54, 'Qui sint qui quia e', 'الجزائر', 'عنابة', 'Atque aliquip et rep', '', 'inactive', NULL, '2021-11-24 13:27:29', '2021-11-24 13:27:29'),
(96, 1, 1, 'Channing Bishop', 'Rashad Hernandez', 'zifoqypa@mailinator.com', '$2y$10$tRf0RNgzvdHKZ/RgzHm90OOl4Ne5cxg9q/a8cwHavfTHyYsQphrYq', 'Est nemo officiis p', 37, 'Est veniam maxime d', 'الأرجنتين', 'سالتا (الأرجنتين)', 'Minus distinctio Ma', '', 'inactive', NULL, '2021-11-24 13:33:05', '2021-11-24 13:33:05'),
(97, 1, 1, 'Channing Bishop', 'Rashad Hernandez', 'zifoqypa@mailinator.com', '$2y$10$hAYIpcbBiWWpAlrK8TgK9OiSy6GNwe/6Fq76B2HJrZVUjUAu6BDrC', 'Est nemo officiis p', 37, 'Est veniam maxime d', 'الأرجنتين', 'سالتا (الأرجنتين)', 'Minus distinctio Ma', '', 'inactive', NULL, '2021-11-24 13:33:33', '2021-11-24 13:33:33'),
(98, 1, 1, 'Gavin Rutledge', 'Blaine Stone', 'cikibet@mailinator.com', '$2y$10$KYNsyIjDaqUGDmgfhYaJV.rkrcbjIOjEfnMEhhuBpYY5PoDZKxgbe', 'Totam tempora deseru', 31, 'Temporibus sit aut e', 'قيرغيزستان', 'جلال آباد', 'Quas dolorum unde ne', '', 'inactive', NULL, '2021-11-24 13:36:28', '2021-11-24 13:36:28'),
(99, 1, 1, 'Jana Conley', 'Frances Lamb', 'netasegijy@mailinator.com', '$2y$10$f6zI4Nrs1gBCML/.8Q2HAOvPOEXa16eDASOi9lCHz28Q8vhS4uZ.C', 'Nemo architecto enim', 84, 'Dolorem qui iusto re', 'كرواتيا', 'مقاطعة دوبروفنيك-نيريتفا', 'Omnis eum non non la', '', 'inactive', NULL, '2021-11-24 13:37:34', '2021-11-24 13:37:34'),
(100, 1, 1, 'Iola Mullins', 'Kaitlin Clay', 'xuvy@mailinator.com', '$2y$10$yY1pDhbXQ2DM/.pI9JldB.PVx72YC44SS8p370lmk.47qjdkfiFAS', 'Expedita placeat ve', 84, 'Et laborum dolores a', 'أفغانستان', 'بدخشان', 'Deserunt eiusmod dol', '', 'active', NULL, '2021-11-24 15:21:54', '2021-11-26 22:09:40'),
(101, 1, 1, 'Vielka Tyler', 'Debra Savage', 'qacilaso@mailinator.com', '$2y$10$04Z14K63Qagc.hbloSwYAetMmmcWpeOpVgCGUCZNOG/XEZZIwlETS', 'Veniam sit expedita', 66, 'Cupiditate fugit po', 'جنوب السودان', 'البُحَيْرَة', 'Numquam ut facilis c', '', 'inactive', NULL, '2021-11-27 16:05:12', '2021-11-27 16:05:12'),
(102, 1, 1, 'Vielka Tyler', 'Debra Savage', 'qacilaso@mailinator.com', '$2y$10$pcDlV5cUDauDlRB4fegWtu2nuxE7ujUhe9UKrR3uWNXHItLEOvCVG', 'Veniam sit expedita', 66, 'Cupiditate fugit po', 'جنوب السودان', 'البُحَيْرَة', 'Numquam ut facilis c', '', 'inactive', NULL, '2021-11-27 16:06:45', '2021-11-27 16:06:45'),
(103, 1, 1, 'Mason Howe', 'Hall Pearson', 'witewywaf@mailinator.com', '$2y$10$BmHNLecuhRIVZY1qDSdrhuxtFy2rehPnvcZP9Zkze7FBPr06l8vhu', 'Nobis recusandae Si', 42, 'Ullam architecto vol', 'غامبيا', 'بانجول', 'Quia sunt unde sit', '', 'inactive', NULL, '2021-11-27 16:13:43', '2021-11-27 16:13:43'),
(104, 1, 1, 'Cain Shannon', 'Vivian Sutton', 'kimised@mailinator.com', '$2y$10$jVHBewstvEkaZQPoHsvRHuf9vX61XC4AGy6BRZMjbBtKPA62sw0nO', 'Reiciendis dolorem u', 59, 'Qui dicta ea autem d', 'لاتفيا', 'بلدية بالفي', 'Duis dolore adipisic', '', 'inactive', NULL, '2021-11-27 16:13:56', '2021-11-27 16:13:56'),
(105, 1, 1, 'Coby Gordon', 'Abraham Small', 'taxokiq@mailinator.com', '$2y$10$YgiHUpx/1fhXX.s6Lwj25u7Iov5h9I9mzuDF3nDrBNpVr5kqIOUbK', 'Deserunt dolores in', 63, 'Et consequuntur in q', 'غويانا الفرنسية', 'غويانا الفرنسية', 'Necessitatibus ratio', '', 'inactive', NULL, '2021-11-27 16:20:31', '2021-11-27 16:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_bytes` bigint(20) NOT NULL,
  `mimtype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marketers`
--

CREATE TABLE `marketers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `amount_due` int(20) DEFAULT 0,
  `amount_paid` int(20) NOT NULL DEFAULT 0,
  `address_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marketers`
--

INSERT INTO `marketers` (`id`, `admin_id`, `name_ar`, `name_en`, `email`, `password`, `mobile`, `amount_due`, `amount_paid`, `address_ar`, `address_en`, `photo_profile`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'حسام', 'Hussam', 'hussam@test.com', '$2y$10$q/VownknUjw0sqYY1cWaO.kFLKfWpNLla6lDun0iF3/9ZjMc1hG8a', 597244786, 45, 90, 'Sit sed cumque nece', 'Occaecat ex dolorem', 'admin/1/9NbQI8rqirGhIj5ohjnAKhTmVv21H2oDjYgu1uTD.jpg', 'gxPu6Tkut8KbQe9X7wBtGCXAmI64NUk9jqG8hyFXbFIxPLMJGvPMdGRTAZnv', '2021-10-23 13:04:50', '2021-11-26 22:09:40'),
(2, 1, 'Gwendolyn Pearson', 'Armando Clemons', 'pugej@mailinator.com', '$2y$10$UKY4l9Q0H0./av93rldnYeeCboGe9HezeF5IvRB3AHYHLCQP/XEXa', 72, 0, 0, 'Omnis nesciunt labo', 'Asperiores nihil exe', '', NULL, '2021-10-31 09:30:56', '2021-10-31 09:34:35'),
(4, 1, 'Shaine Gibbs', 'Tatyana Velez', 'wywen@mailinator.com', '$2y$10$eM2PckFu357ndZfdMlPcGeC0d.NgJCk90C103NSa7X510BaiVOETW', 29, 0, 59, 'Non eum quis non eu', 'Ut eligendi asperior', '', NULL, '2021-10-31 09:38:53', '2021-11-07 11:11:02'),
(5, 1, 'احمد', 'Ahmed', 'ahmed@test.com', '$2y$10$mAH8t9Y.pE1CGtBkuM2X1ute.6VuOYCezWo7ZVlPA..QRPWHeMpty', 5465123132, -73, 73, 'Sit sed cumque nece', 'Occaecat ex dolorem', '', NULL, '2021-10-31 09:40:41', '2021-11-07 13:29:30'),
(6, NULL, 'Melissa Ferguson', NULL, 'zamisyzida@mailinator.com', '$2y$10$bc7FyvX2kwKSK8o4qPUyuOajwf5bnL0qw0/MbvUb2JR23sPM3jCy2', 29, 0, 0, 'Ratione laborum Ass', NULL, '', NULL, '2021-10-31 12:41:36', '2021-10-31 12:41:36'),
(7, NULL, 'Ibrahim Shaban', NULL, 'ibrahim@test.com', '$2y$10$s5kHtrTgbGQ9eK1HzfSut.TsBH.ndXv/7oFZJ80QhFLTZ0sq0oYaG', 597244786, 0, 0, 'Al jalaa', NULL, 'admin/7/cgTHuhxHQ8lImfeKZIxRVUPMyS0vmX9E2Dx8oAmW.jpg', NULL, '2021-10-31 12:44:25', '2021-11-27 12:59:39'),
(8, 1, 'Marah Mccoy', 'Benedict Haney', 'cuvi@mailinator.com', '$2y$10$i92QE/BjHTKWvcldWHZhR.0k8O.8/CeoGdafQlzAM6jDmiyyhdjJe', 58, 0, 42, 'Magni quasi possimus', 'Dolor totam minima q', '', NULL, '2021-11-22 12:14:05', '2021-11-22 12:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `from` int(10) UNSIGNED NOT NULL,
  `to` int(10) UNSIGNED NOT NULL,
  `read` tinyint(4) NOT NULL DEFAULT 0,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `created_at`, `updated_at`, `from`, `to`, `read`, `is_admin`, `text`) VALUES
(1, '2021-11-27 12:46:32', '2021-11-27 12:50:51', 1, 7, 1, 1, 'hi'),
(2, '2021-11-27 12:48:01', '2021-11-28 12:54:25', 1, 1, 1, 1, 'hi hussam'),
(3, '2021-11-27 12:48:15', '2021-11-28 12:54:25', 1, 1, 1, 0, 'hello admin'),
(4, '2021-11-27 12:51:15', '2021-11-28 12:55:31', 7, 1, 1, 0, 'hi admin'),
(5, '2021-11-27 13:41:04', '2021-11-27 13:41:04', 1, 7, 0, 1, 'كيفك ابراهيم'),
(6, '2021-11-27 14:18:28', '2021-11-27 14:18:28', 1, 7, 0, 1, 'تجريب'),
(7, '2021-11-27 14:18:35', '2021-11-27 14:18:35', 1, 7, 0, 1, 'تجريب'),
(8, '2021-11-27 14:18:43', '2021-11-27 14:18:43', 1, 7, 0, 1, 'تجريب'),
(9, '2021-11-27 14:18:56', '2021-11-27 14:18:56', 1, 7, 0, 1, 'هلا');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_02_17_094109_create_admins_table', 1),
(6, '2021_02_18_102130_create_files_table', 1),
(7, '2021_02_19_985759_create_settings_table', 1),
(8, '2021_03_22_134182_create_admin_groups_table', 1),
(9, '2021_03_22_193126_create_admin_group_roles_table', 1),
(20, '2021_10_21_335146_create_tests_table', 2),
(34, '2021_10_23_181657_create_cleints_table', 4),
(35, '2021_10_23_34604_create_marketers_table', 5),
(36, '2021_10_24_100931_add_marketer_id_to_cleints_table', 6),
(40, '2021_11_06_544051_create_transactions_table', 7),
(45, '2021_11_09_193463_create_advertisements_table', 9),
(46, '2021_11_08_558822_create_shippings_table', 10),
(47, '2021_11_23_135043_create_notifications_table', 11),
(48, '2021_11_22_202013_create_messages_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('149e1f85-ab79-469b-98d2-c9e81ec00ee5', 'App\\Notifications\\NotifyNewClient', 'App\\Models\\Marketer', 1, '{\"clients\":{\"name_ar\":\"Anthony Knight\",\"name_en\":\"Felix Norman\",\"email\":\"quwa@mailinator.com\",\"password\":\"$2y$10$BC3Iad3Wpl9vxomIXzj08ee2rmV6wtZu3It3O\\/\\/bMEG1NEb9cnhL6\",\"address\":\"Omnis ex et ipsum d\",\"mobile\":\"18\",\"transport_type\":\"Fugit in praesentiu\",\"to_country\":\"\\u0646\\u064a\\u064a\\u0648\\u064a\",\"to_city\":\"\\u0646\\u064a\\u064a\\u0648\\u064a\",\"note\":\"Et magna consequatur\",\"photo_profile\":\"\",\"marketer_id\":1,\"admin_id\":1,\"updated_at\":\"2021-11-24T15:25:05.000000Z\",\"created_at\":\"2021-11-24T15:25:05.000000Z\",\"id\":94},\"marketer\":\"\\u062d\\u0633\\u0627\\u0645\"}', '2021-11-24 16:06:21', '2021-11-24 13:25:05', '2021-11-24 16:06:21'),
('1917cc31-3c79-46fb-bf2b-b33dfdd06149', 'App\\Notifications\\NotifyNewClient', 'App\\Models\\Marketer', 1, '{\"clients\":\"\\u062d\\u0633\\u0627\\u0645\"}', '2021-11-24 16:07:49', '2021-11-24 13:36:28', '2021-11-24 16:07:49'),
('3e7812c8-6836-49fe-a9e7-63a76a3451ce', 'App\\Notifications\\NotifyNewClient', 'App\\Models\\Marketer', 1, '{\"clients\":{\"name_ar\":\"Iola Mullins\",\"name_en\":\"Kaitlin Clay\",\"email\":\"xuvy@mailinator.com\",\"password\":\"$2y$10$BqjjrPbOp5fooRTVpOZ3YuS6nmUnaYhSF0M8D6eoWYkLWbAOxPq8O\",\"address\":\"Expedita placeat ve\",\"mobile\":\"84\",\"transport_type\":\"Et laborum dolores a\",\"to_country\":\"\\u0643\\u0631\\u0648\\u0627\\u062a\\u064a\\u0627\",\"to_city\":\"\\u0645\\u0642\\u0627\\u0637\\u0639\\u0629 \\u0625\\u0633\\u062a\\u0631\\u064a\\u0627\",\"note\":\"Deserunt eiusmod dol\",\"photo_profile\":\"\",\"marketer_id\":1,\"admin_id\":1,\"updated_at\":\"2021-11-24T17:21:54.000000Z\",\"created_at\":\"2021-11-24T17:21:54.000000Z\",\"id\":100},\"marketer\":\"\\u062d\\u0633\\u0627\\u0645\"}', '2021-11-24 16:09:18', '2021-11-24 15:21:54', '2021-11-24 16:09:18'),
('41e3e706-f7ca-4efa-b130-8c08f489d6f5', 'App\\Notifications\\NotifyNewClient', 'App\\Models\\Marketer', 1, '{\"clients\":{\"name_ar\":\"Ibrahim Shaban\",\"name_en\":\"Ibrahim Shaban\",\"email\":\"hussam@test.com\",\"password\":\"$2y$10$G.bviOGnpyXFuRug8WPU7u.OEoKVNAk1dJVE4W9LaVFToFnIVllrS\",\"address\":\"Al jalaa\",\"mobile\":\"0597244786\",\"transport_type\":\"Aliqua Quaerat haru\",\"to_country\":\"\\u062c\\u0632\\u0631 \\u0623\\u0648\\u0644\\u0627\\u0646\\u062f\",\"to_city\":\"Lemland\",\"note\":\"vbfdcv\",\"photo_profile\":\"\",\"marketer_id\":1,\"admin_id\":1,\"updated_at\":\"2021-11-24T14:12:22.000000Z\",\"created_at\":\"2021-11-24T14:12:22.000000Z\",\"id\":62}}', '2021-11-24 16:14:10', '2021-11-24 12:12:22', '2021-11-24 16:14:10'),
('5460b214-005a-4e4b-a8e4-fffa9b6aaeda', 'App\\Notifications\\NotifyNewClient', 'App\\Models\\Marketer', 1, '{\"clients\":{\"name_ar\":\"Kaden Coleman\",\"name_en\":\"Jorden Madden\",\"email\":\"quta@mailinator.com\",\"password\":\"$2y$10$U4gVJyc0awgEnSi9ENwHouDj3rmtiPKqsJjzoGTpngCgFCgHrsu3e\",\"address\":\"Non non dolore odio\",\"mobile\":\"11\",\"transport_type\":\"Ad ut rem sequi et n\",\"to_country\":\"\\u063a\\u0648\\u0627\\u062a\\u064a\\u0645\\u0627\\u0644\\u0627\",\"to_city\":\"\\u0627\\u064a\\u0633\\u0643\\u0648\\u064a\\u0646\\u062a\\u0644\\u0627\",\"note\":\"Eum omnis accusantiu\",\"photo_profile\":\"\",\"marketer_id\":1,\"admin_id\":1,\"updated_at\":\"2021-11-23T17:40:30.000000Z\",\"created_at\":\"2021-11-23T17:40:30.000000Z\",\"id\":58}}', '2021-11-26 22:07:51', '2021-11-23 15:40:30', '2021-11-26 22:07:51'),
('5ed5186e-494d-489e-bb12-3b160a43e09b', 'App\\Notifications\\NotifyNewClient', 'App\\Models\\Marketer', 1, '{\"clients\":\"\\u062d\\u0633\\u0627\\u0645\"}', '2021-11-25 12:42:42', '2021-11-24 13:33:33', '2021-11-25 12:42:42'),
('973a0c9d-d2bd-4424-9703-70476376c83f', 'App\\Notifications\\NotifyNewClient', 'App\\Models\\Marketer', 1, '{\"clients\":\"\\u062d\\u0633\\u0627\\u0645\"}', '2021-11-26 22:48:42', '2021-11-24 13:27:29', '2021-11-26 22:48:42'),
('98bbe438-b713-4e11-84cf-77eb488b9632', 'App\\Notifications\\NotifyNewClient', 'App\\Models\\Marketer', 1, '{\"clients\":{\"name_ar\":\"Jana Conley\",\"name_en\":\"Frances Lamb\",\"email\":\"netasegijy@mailinator.com\",\"password\":\"$2y$10$f6zI4Nrs1gBCML\\/.8Q2HAOvPOEXa16eDASOi9lCHz28Q8vhS4uZ.C\",\"address\":\"Nemo architecto enim\",\"mobile\":\"84\",\"transport_type\":\"Dolorem qui iusto re\",\"to_country\":\"\\u0643\\u0631\\u0648\\u0627\\u062a\\u064a\\u0627\",\"to_city\":\"\\u0645\\u0642\\u0627\\u0637\\u0639\\u0629 \\u062f\\u0648\\u0628\\u0631\\u0648\\u0641\\u0646\\u064a\\u0643-\\u0646\\u064a\\u0631\\u064a\\u062a\\u0641\\u0627\",\"note\":\"Omnis eum non non la\",\"photo_profile\":\"\",\"marketer_id\":1,\"admin_id\":1,\"updated_at\":\"2021-11-24T15:37:34.000000Z\",\"created_at\":\"2021-11-24T15:37:34.000000Z\",\"id\":99},\"marketer\":\"\\u062d\\u0633\\u0627\\u0645\"}', '2021-11-27 16:11:04', '2021-11-24 13:37:34', '2021-11-27 16:11:04'),
('9b29edc5-d720-4510-b7f6-6a4920061f84', 'App\\Notifications\\NotifyNewClient', 'App\\Models\\Marketer', 1, '{\"clients\":{\"name_ar\":\"Vielka Tyler\",\"name_en\":\"Debra Savage\",\"email\":\"qacilaso@mailinator.com\",\"password\":\"$2y$10$pcDlV5cUDauDlRB4fegWtu2nuxE7ujUhe9UKrR3uWNXHItLEOvCVG\",\"address\":\"Veniam sit expedita\",\"mobile\":\"66\",\"transport_type\":\"Cupiditate fugit po\",\"to_country\":\"\\u062c\\u0646\\u0648\\u0628 \\u0627\\u0644\\u0633\\u0648\\u062f\\u0627\\u0646\",\"to_city\":\"\\u0627\\u0644\\u0628\\u064f\\u062d\\u064e\\u064a\\u0652\\u0631\\u064e\\u0629\",\"note\":\"Numquam ut facilis c\",\"photo_profile\":\"\",\"marketer_id\":1,\"admin_id\":1,\"updated_at\":\"2021-11-27T18:06:45.000000Z\",\"created_at\":\"2021-11-27T18:06:45.000000Z\",\"id\":102},\"marketer\":\"\\u062d\\u0633\\u0627\\u0645\"}', '2021-11-27 16:11:22', '2021-11-27 16:06:45', '2021-11-27 16:11:22'),
('dbfabe0d-99dd-46fd-94e7-2cdb9ffdf1a3', 'App\\Notifications\\NotifyNewClient', 'App\\Models\\Marketer', 1, '{\"clients\":{\"name_ar\":\"Cain Shannon\",\"name_en\":\"Vivian Sutton\",\"email\":\"kimised@mailinator.com\",\"password\":\"$2y$10$jVHBewstvEkaZQPoHsvRHuf9vX61XC4AGy6BRZMjbBtKPA62sw0nO\",\"address\":\"Reiciendis dolorem u\",\"mobile\":\"59\",\"transport_type\":\"Qui dicta ea autem d\",\"to_country\":\"\\u0644\\u0627\\u062a\\u0641\\u064a\\u0627\",\"to_city\":\"\\u0628\\u0644\\u062f\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0641\\u064a\",\"note\":\"Duis dolore adipisic\",\"photo_profile\":\"\",\"marketer_id\":1,\"admin_id\":1,\"updated_at\":\"2021-11-27T18:13:56.000000Z\",\"created_at\":\"2021-11-27T18:13:56.000000Z\",\"id\":104},\"marketer\":\"\\u062d\\u0633\\u0627\\u0645\"}', '2021-11-27 16:14:18', '2021-11-27 16:13:56', '2021-11-27 16:14:18'),
('f7150722-71e5-4888-99f1-92ba10a1fd79', 'App\\Notifications\\NotifyNewClient', 'App\\Models\\Marketer', 1, '{\"clients\":{\"name_ar\":\"Coby Gordon\",\"name_en\":\"Abraham Small\",\"email\":\"taxokiq@mailinator.com\",\"password\":\"$2y$10$YgiHUpx\\/1fhXX.s6Lwj25u7Iov5h9I9mzuDF3nDrBNpVr5kqIOUbK\",\"address\":\"Deserunt dolores in\",\"mobile\":\"63\",\"transport_type\":\"Et consequuntur in q\",\"to_country\":\"\\u063a\\u0648\\u064a\\u0627\\u0646\\u0627 \\u0627\\u0644\\u0641\\u0631\\u0646\\u0633\\u064a\\u0629\",\"to_city\":\"\\u063a\\u0648\\u064a\\u0627\\u0646\\u0627 \\u0627\\u0644\\u0641\\u0631\\u0646\\u0633\\u064a\\u0629\",\"note\":\"Necessitatibus ratio\",\"photo_profile\":\"\",\"marketer_id\":1,\"admin_id\":1,\"updated_at\":\"2021-11-27T18:20:31.000000Z\",\"created_at\":\"2021-11-27T18:20:31.000000Z\",\"id\":105},\"marketer\":\"\\u062d\\u0633\\u0627\\u0645\"}', NULL, '2021-11-27 16:20:31', '2021-11-27 16:20:31'),
('f7d486dc-cf59-4005-b494-5d8271fc793c', 'App\\Notifications\\NotifyNewClient', 'App\\Models\\Marketer', 1, '{\"clients\":{\"name_ar\":\"Mason Howe\",\"name_en\":\"Hall Pearson\",\"email\":\"witewywaf@mailinator.com\",\"password\":\"$2y$10$BmHNLecuhRIVZY1qDSdrhuxtFy2rehPnvcZP9Zkze7FBPr06l8vhu\",\"address\":\"Nobis recusandae Si\",\"mobile\":\"42\",\"transport_type\":\"Ullam architecto vol\",\"to_country\":\"\\u063a\\u0627\\u0645\\u0628\\u064a\\u0627\",\"to_city\":\"\\u0628\\u0627\\u0646\\u062c\\u0648\\u0644\",\"note\":\"Quia sunt unde sit\",\"photo_profile\":\"\",\"marketer_id\":1,\"admin_id\":1,\"updated_at\":\"2021-11-27T18:13:43.000000Z\",\"created_at\":\"2021-11-27T18:13:43.000000Z\",\"id\":103},\"marketer\":\"\\u062d\\u0633\\u0627\\u0645\"}', '2021-11-27 16:14:31', '2021-11-27 16:13:43', '2021-11-27 16:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('abood@abood.com', '$2y$10$vgvT2wGynHnQNR9crJdSOOZha6FuuSy1qNUfAtrigSLAqIhezNIga', '2021-10-23 06:53:27'),
('abood@abood.com', 'd8f88c3b097200aad26ccf1b597812f7fff5a72edc0f7883e9f8faf63b9959e9', '2021-10-23 06:53:27'),
('test@test.com', '$2y$10$9eX5YomAjY/voAMEpPPnvukv2WICmUt4ptYywZsr3u7vhsFrPufm.', '2021-11-01 08:25:00'),
('test@test.com', '03fdc99d636a97148b7354080d34037459bb6b097f1da998c88addc7a7c43879', '2021-11-01 08:25:00'),
('hussam@test.com', '$2y$10$wlddMVqgI03/aWYc1sr8QeoDJXTdvgL3sCEV.k5ktwhmHHitfhTgS', '2021-11-25 01:54:36'),
('hussam@test.com', 'e91b3420784a5837411ecea2d3a365133ea1a7074cd129d8aca1f312e5fbcda7', '2021-11-25 01:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitename_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sitename_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sitename_fr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `system_status` enum('open','close') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `system_message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_setting` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sitename_ar`, `sitename_en`, `sitename_fr`, `email`, `logo`, `icon`, `system_status`, `system_message`, `theme_setting`, `created_at`, `updated_at`) VALUES
(1, '', '', '', NULL, NULL, NULL, 'open', NULL, '{\"brand_color\":\"navbar-purple\",\"sidebar_class\":\"sidebar-dark-purple\",\"main_header\":\"\",\"navbar\":\"navbar-dark navbar-purple\"}', '2021-10-21 06:06:05', '2021-10-24 07:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_types` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` bigint(20) NOT NULL,
  `shipping_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` bigint(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `admin_id`, `country`, `vehicle_types`, `cost`, `shipping_type`, `count`, `created_at`, `updated_at`) VALUES
(1, 1, 'EG', 'salon_car', 61, 'Ad placeat beatae c', 71, '2021-11-22 22:06:43', '2021-11-22 22:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marketer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `admin_id`, `transaction_number`, `amount`, `photo`, `marketer_id`, `created_at`, `updated_at`) VALUES
(1, 1, '405', '45', '', 1, '2021-11-07 12:55:45', '2021-11-07 12:55:45'),
(2, 1, '405', '45', '', 1, '2021-11-07 12:56:10', '2021-11-07 12:56:10'),
(3, 1, '233', '73', '', 5, '2021-11-07 13:29:30', '2021-11-07 13:29:30'),
(4, 1, '456456', '45', '', 1, '2021-11-20 23:33:26', '2021-11-20 23:33:26'),
(5, 1, '66666', '45', '', 1, '2021-11-20 23:55:25', '2021-11-20 23:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_groups`
--
ALTER TABLE `admin_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_groups_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `admin_group_roles`
--
ALTER TABLE `admin_group_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_group_roles_admin_groups_id_foreign` (`admin_groups_id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertisements_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `cleints`
--
ALTER TABLE `cleints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cleints_admin_id_foreign` (`admin_id`),
  ADD KEY `cleints_marketer_id_foreign` (`marketer_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_admin_id_foreign` (`admin_id`),
  ADD KEY `files_user_id_foreign` (`user_id`);

--
-- Indexes for table `marketers`
--
ALTER TABLE `marketers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marketers_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_admin_id_foreign` (`admin_id`),
  ADD KEY `transactions_marketer_id_foreign` (`marketer_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_groups`
--
ALTER TABLE `admin_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_group_roles`
--
ALTER TABLE `admin_group_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cleints`
--
ALTER TABLE `cleints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marketers`
--
ALTER TABLE `marketers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_groups`
--
ALTER TABLE `admin_groups`
  ADD CONSTRAINT `admin_groups_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `admin_group_roles`
--
ALTER TABLE `admin_group_roles`
  ADD CONSTRAINT `admin_group_roles_admin_groups_id_foreign` FOREIGN KEY (`admin_groups_id`) REFERENCES `admin_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD CONSTRAINT `advertisements_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cleints`
--
ALTER TABLE `cleints`
  ADD CONSTRAINT `cleints_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cleints_marketer_id_foreign` FOREIGN KEY (`marketer_id`) REFERENCES `marketers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `marketers`
--
ALTER TABLE `marketers`
  ADD CONSTRAINT `marketers_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_marketer_id_foreign` FOREIGN KEY (`marketer_id`) REFERENCES `marketers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
