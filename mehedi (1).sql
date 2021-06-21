-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 04:42 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mehedi`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `benifits`
--

CREATE TABLE `benifits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `benifits`
--

INSERT INTO `benifits` (`id`, `icon`, `details`, `created_at`, `updated_at`) VALUES
(1, '1.png', 'Influencer gain access to the most exclusive entertainment, relaxation, and dining experiences that the City has to offer.', '2021-06-04 19:39:56', '2021-06-04 19:39:56'),
(2, '2.png', 'You will be given VIP access to become one of the top tier members at the most unique events hosted by our partnered venues.', '2021-06-04 19:45:39', '2021-06-04 19:45:39'),
(3, '3.png', 'As one of our elite members, you have the key to a world of benefits and pleasures that are unavailable to the general public.', '2021-06-04 19:45:59', '2021-06-04 19:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `logo`, `created_at`, `updated_at`) VALUES
(1, '1.png', '2021-06-03 17:51:20', '2021-06-03 18:21:28');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_03_234810_create_logos_table', 2),
(6, '2021_06_04_012842_create_partners_table', 4),
(7, '2021_06_04_012859_create_partner_headings_table', 4),
(8, '2021_06_05_003831_create_benifits_table', 5),
(9, '2021_06_05_003847_create_benifit_headings_table', 5),
(10, '2021_06_05_014645_create_socials_table', 6),
(11, '2021_06_05_021020_create_offers_table', 7),
(13, '2021_06_06_001116_create_shops_details_table', 8),
(15, '2021_06_04_002516_create_banners_table', 9),
(19, '2014_10_12_000000_create_users_table', 10),
(20, '2021_06_17_135647_create_orders_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `heading`, `detail`, `bg`, `created_at`, `updated_at`) VALUES
(2, 'Experiences', 'An easy way to experiences', '2.jpg', '2021-06-04 20:32:19', '2021-06-04 20:38:20'),
(3, 'Dinner Out', 'An easy way to Dinner Out', '3.jpg', '2021-06-08 06:20:19', '2021-06-08 06:20:19'),
(4, 'Delivery', 'An easy way to Delivery', '4.jpg', '2021-06-08 06:21:15', '2021-06-08 06:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `offer_activity` int(11) NOT NULL DEFAULT 1,
  `offer_complete` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `offer_id`, `offer_activity`, `offer_complete`, `created_at`, `updated_at`) VALUES
(2, 1, 8, 3, NULL, '2021-06-17 10:01:10', '2021-06-17 15:47:53'),
(3, 1, 8, 3, NULL, '2021-06-17 10:25:23', '2021-06-17 10:25:39'),
(4, 1, 5, 2, NULL, '2021-06-17 15:21:54', '2021-06-17 15:38:04'),
(6, 1, 8, 3, NULL, '2021-06-17 15:28:58', '2021-06-17 16:31:43'),
(7, 1, 8, 1, NULL, '2021-06-17 15:49:05', NULL),
(8, 3, 8, 3, NULL, '2021-06-17 17:09:50', '2021-06-17 17:56:29'),
(9, 3, 8, 3, NULL, '2021-06-17 17:17:45', '2021-06-17 17:18:28'),
(10, 3, 8, 3, NULL, '2021-06-17 17:17:51', '2021-06-17 17:56:00'),
(11, 3, 5, 1, NULL, '2021-06-17 17:59:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `partner_logo`, `created_at`, `updated_at`) VALUES
(5, '5.png', '2021-06-08 05:31:34', '2021-06-08 05:31:34'),
(6, '6.png', '2021-06-08 05:31:46', '2021-06-08 05:31:46'),
(7, '7.png', '2021-06-08 05:33:54', '2021-06-08 05:33:54'),
(8, '8.png', '2021-06-08 05:34:04', '2021-06-08 05:34:04'),
(9, '9.png', '2021-06-08 05:34:20', '2021-06-08 05:34:20'),
(10, '10.png', '2021-06-08 05:34:32', '2021-06-08 05:34:33'),
(12, '12.png', '2021-06-08 05:35:35', '2021-06-08 05:35:35'),
(13, '13.png', '2021-06-08 05:38:08', '2021-06-08 05:38:08'),
(14, '14.png', '2021-06-08 05:38:20', '2021-06-08 05:38:20');

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
-- Table structure for table `shops_details`
--

CREATE TABLE `shops_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_sidule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rules` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `soldout_or_not` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops_details`
--

INSERT INTO `shops_details` (`id`, `type`, `name`, `time_sidule`, `details`, `rules`, `soldout_or_not`, `thumbnail`, `created_at`, `updated_at`) VALUES
(2, 2, 'Hummus Brothers', NULL, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium amet minima necessitatibus illum minus deleniti saepe, officiis enim recusandae voluptatum cupiditate explicabo praesentium nisi ex asperiores iusto alias? Modi magnam illo aut tempore ipsa, dolores fugit cum commodi. Aliquam doloremque dicta libero, ullam sunt tempore aut deleniti dolorem qui exercitationem!</p>', '<ul><li>Eat fast Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, reiciendis?</li><li>Eat fast Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, reiciendis?</li></ul>', NULL, '2.jpg', '2021-06-05 18:59:59', '2021-06-05 19:27:32'),
(5, 2, 'An Exciting Experience with', 'Hummus Brothers', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium amet minima necessitatibus illum minus deleniti saepe, officiis enim recusandae voluptatum cupiditate explicabo praesentium nisi ex asperiores iusto alias? Modi magnam illo aut tempore ipsa, dolores fugit cum commodi. Aliquam doloremque dicta libero, ullam sunt tempore aut deleniti dolorem qui exercitationem!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium amet minima necessitatibus illum minus deleniti saepe, officiis enim recusandae voluptatum cupiditate explicabo praesentium nisi ex asperiores iusto alias? Modi magnam illo aut tempore ipsa, dolores fugit cum commodi. Aliquam doloremque dicta libero, ullam sunt tempore aut deleniti dolorem qui exercitationem!', 'dfadsf', 'default.jpg', '2021-06-10 15:17:16', NULL),
(6, 2, 'An Exciting Experience with', 'Hummus Brothers', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium amet minima necessitatibus illum minus deleniti saepe, officiis enim recusandae voluptatum cupiditate explicabo praesentium nisi ex asperiores iusto alias? Modi magnam illo aut tempore ipsa, dolores fugit cum commodi. Aliquam doloremque dicta libero, ullam sunt tempore aut deleniti dolorem qui exercitationem!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium amet minima necessitatibus illum minus deleniti saepe, officiis enim recusandae voluptatum cupiditate explicabo praesentium nisi ex asperiores iusto alias? Modi magnam illo aut tempore ipsa, dolores fugit cum commodi. Aliquam doloremque dicta libero, ullam sunt tempore aut deleniti dolorem qui exercitationem!', 'dfadsf', '6.jpg', '2021-06-10 15:17:52', '2021-06-10 15:17:53'),
(7, 3, 'admin', 'Hummus Brothers', 'asdf', 'adsf', 'asdf', '7.jpg', '2021-06-10 15:18:21', '2021-06-10 15:18:21'),
(8, 1, 'asdf', 'sdf', 'asdf', 'asdf', 'asdf', '8.jpg', '2021-06-10 15:18:55', '2021-06-10 15:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_link` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `social_link`, `social_icon`, `created_at`, `updated_at`) VALUES
(2, '#', 'fa fa-instagram', '2021-06-04 20:06:56', '2021-06-04 20:09:00'),
(3, 'hh', 'fab fa-facebook-f', '2021-06-08 06:52:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `rules` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `birth`, `gender`, `state`, `email`, `whatsapp_number`, `instagram`, `nationality`, `email_verified_at`, `password`, `profile_photo`, `rules`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-05-31', 'Male', 'Dubai', 'admin@gmail.com', '456456132123', 'asdffd', 'BH', '2021-06-13 10:19:36', '$2y$10$9O6r9UYVuRpMy4rcrNNETOJWUKr7SIwMn/bi2wsrt54VpzVM7KDRS', '1.jpg', '1', NULL, '2021-06-13 10:19:06', '2021-06-13 10:19:36'),
(2, 'mehedi', '2021-06-08', 'Female', 'Dubai', 'mahadi@gmail.com', '456456132123', 'asdffd', 'AZ', '2021-06-13 11:08:50', '$2y$10$s22iO2KRLJlm8kyzOEYAEOnHYu6p56qtRIOyIAaoNGtLCpt7cVm0K', '2.jpg', '1', NULL, '2021-06-13 11:08:24', '2021-06-13 11:08:50'),
(3, 'user', '2021-06-01', 'Female', 'Sharjah', 'user@gmail.com', '456456132123', 'asdffd', 'BB', '2021-06-17 17:11:26', '$2y$10$5pLh0Wg2kZLAV5DZ5DkXv.3wGziI8Xp.7gBNQBw0zsoh4Tk6OAHry', '3.jpg', '2', NULL, '2021-06-15 05:55:01', '2021-06-17 17:11:26'),
(4, 'pervesh', '2021-06-09', 'Male', 'Dubai', 'pervesh@gmail.com', '456456132123', 'asdffd', 'BH', '2021-06-17 17:33:12', '$2y$10$tvo1eqljfCm3XBZ6HJRDOO.X.qbja4QseDeFbT.UhiNtwlJYn9DdS', '4.png', '2', NULL, '2021-06-17 17:28:31', '2021-06-17 17:33:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benifits`
--
ALTER TABLE `benifits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `shops_details`
--
ALTER TABLE `shops_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `benifits`
--
ALTER TABLE `benifits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shops_details`
--
ALTER TABLE `shops_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
