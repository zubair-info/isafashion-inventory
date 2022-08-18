-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2022 at 10:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `created_at`, `updated_at`) VALUES
(6, 'S.F', NULL, NULL),
(7, 'S.F One', NULL, NULL),
(8, 'S.F Two', NULL, NULL),
(9, 'S.F three', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_names`
--

CREATE TABLE `company_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_names`
--

INSERT INTO `company_names` (`id`, `company_name`, `created_at`, `updated_at`) VALUES
(1, 'bitBirds', NULL, NULL),
(2, 'Pencilbox', NULL, '2022-08-06 05:45:57');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kapors`
--

CREATE TABLE `kapors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kapor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kapors`
--

INSERT INTO `kapors` (`id`, `kapor_name`, `created_at`, `updated_at`) VALUES
(1, 'viscos', NULL, '2022-08-06 06:52:01'),
(3, 'viscos one', NULL, NULL),
(4, 'viscos two', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `knitting_send_lekra_brands`
--

CREATE TABLE `knitting_send_lekra_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `knitting_send_id` int(11) NOT NULL,
  `lekra_brand_id` int(11) NOT NULL,
  `lekra_cartoon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lekra_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `knitting_send_lekra_brands`
--

INSERT INTO `knitting_send_lekra_brands` (`id`, `knitting_send_id`, `lekra_brand_id`, `lekra_cartoon`, `lekra_rate`, `created_at`, `updated_at`) VALUES
(14, 13, 2, '15', '27.36', '2022-08-17 03:32:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `knitting_send_suta_brands`
--

CREATE TABLE `knitting_send_suta_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `knitting_send_id` int(11) NOT NULL,
  `suta_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `kapor_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `cartoon` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `knitting_send_suta_brands`
--

INSERT INTO `knitting_send_suta_brands` (`id`, `knitting_send_id`, `suta_id`, `brand_id`, `kapor_id`, `weight`, `cartoon`, `rate`, `created_at`, `updated_at`) VALUES
(17, 13, 2, 6, 1, 50, 20, 148, '2022-08-17 03:32:27', NULL),
(18, 13, 3, 6, 1, 10, 5, 142, '2022-08-17 03:32:27', NULL),
(19, 13, 4, 6, 1, 5, 15, 145, '2022-08-17 03:32:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lekra_brands`
--

CREATE TABLE `lekra_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lekra_brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lekra_brands`
--

INSERT INTO `lekra_brands` (`id`, `lekra_brand_name`, `created_at`, `updated_at`) VALUES
(2, 'kerela', NULL, NULL),
(3, 'kerela one', NULL, NULL),
(4, 'kerela two', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `makingknitting_multiple_receiveds`
--

CREATE TABLE `makingknitting_multiple_receiveds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `knitting_received_id` int(11) NOT NULL,
  `received_chalan_id` int(11) NOT NULL,
  `suta_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `kapor_id` int(11) NOT NULL,
  `body` int(11) NOT NULL,
  `rib` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_used_lekra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `makingknitting_multiple_receiveds`
--

INSERT INTO `makingknitting_multiple_receiveds` (`id`, `knitting_received_id`, `received_chalan_id`, `suta_id`, `brand_id`, `kapor_id`, `body`, `rib`, `color`, `roll`, `total`, `total_used_lekra`, `created_at`, `updated_at`) VALUES
(14, 9, 11025, 2, 6, 1, 255, '134.999', 'red', '20', '27.5', '24.85', '2022-08-17 03:34:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `making_dyeing_multiple_sends`
--

CREATE TABLE `making_dyeing_multiple_sends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dyeing_send_id` int(11) NOT NULL,
  `received_chalan_id` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rib` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lost_percentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `making_dyeing_multiple_sends`
--

INSERT INTO `making_dyeing_multiple_sends` (`id`, `dyeing_send_id`, `received_chalan_id`, `color`, `roll`, `body`, `rib`, `total`, `lost_percentage`, `created_at`, `updated_at`) VALUES
(13, 19, 11002, 'yellow', '10', '245.4', '142', '12.5', '5', '2022-08-17 03:46:53', '2022-08-17 05:31:52'),
(14, 21, 11025, 'red', '10', '245.2', '124.999', '274.2', '5', '2022-08-17 07:03:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `making_dyeing_sends`
--

CREATE TABLE `making_dyeing_sends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `send_chalan_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` double(8,2) DEFAULT NULL,
  `rib` double(8,2) DEFAULT NULL,
  `total` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `making_dyeing_sends`
--

INSERT INTO `making_dyeing_sends` (`id`, `send_chalan_id`, `company_id`, `date`, `color`, `body`, `rib`, `total`, `created_at`, `updated_at`) VALUES
(19, 11004, 2, '2000-07-10', NULL, NULL, NULL, NULL, '2022-08-17 03:52:40', '2022-08-17 03:52:40'),
(20, 11003, 2, '2000-07-10', NULL, NULL, NULL, NULL, '2022-08-17 03:47:34', NULL),
(21, 12012, 2, '1982-10-04', NULL, NULL, NULL, NULL, '2022-08-17 07:03:18', '2022-08-17 07:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `making_knitting_receiveds`
--

CREATE TABLE `making_knitting_receiveds` (
  `id` int(11) NOT NULL,
  `send_chalan_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `making_knitting_receiveds`
--

INSERT INTO `making_knitting_receiveds` (`id`, `send_chalan_id`, `date`, `created_at`, `updated_at`) VALUES
(9, 11098, '2022-08-03', '2022-08-17 03:34:12', '2022-08-17 03:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `making_knitting_sends`
--

CREATE TABLE `making_knitting_sends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `send_chalan_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `making_knitting_sends`
--

INSERT INTO `making_knitting_sends` (`id`, `send_chalan_id`, `date`, `company_id`, `created_at`, `updated_at`) VALUES
(13, '11098', '2022-08-02', 1, '2022-08-17 03:32:26', '2022-08-17 03:32:27');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_06_040834_create_making_knitting_sends_table', 2),
(6, '2022_08_06_092816_create_company_names_table', 3),
(7, '2022_08_06_112324_create_brands_table', 4),
(8, '2022_08_06_123201_create_sutas_table', 5),
(9, '2022_08_06_124640_create_kapors_table', 6),
(10, '2022_08_07_041739_create_making_knitting_receiveds_table', 7),
(11, '2022_08_07_085916_create_lekra_brands_table', 8),
(12, '2022_08_08_085132_create_making_dyeing_sends_table', 9),
(13, '2022_08_13_042731_create_knitting_send_suta_brands_table', 10),
(14, '2022_08_13_042803_create_knitting_send_lekra_brands_table', 11),
(15, '2022_08_16_034116_create_makingknitting_multiple_receiveds_table', 12),
(16, '2022_08_17_042945_create_making_dyeing_multiple_sends_table', 13);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sutas`
--

CREATE TABLE `sutas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `suta_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sutas`
--

INSERT INTO `sutas` (`id`, `suta_name`, `created_at`, `updated_at`) VALUES
(2, '30/1', NULL, NULL),
(3, '30/2', NULL, NULL),
(4, '30/3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'defult.jpg',
  `status` int(11) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `profile_photo`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'zubair ahmed', 'zubair@pencilbox.edu.bd', '3.jpg', 0, NULL, '$2y$10$fnBSrjjfopsFDGA4sp2VeOP0CFGKm/pFm0TzcwfQfHdz9UrPoY6am', NULL, '2022-08-03 22:42:43', '2022-08-07 02:40:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_names`
--
ALTER TABLE `company_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kapors`
--
ALTER TABLE `kapors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knitting_send_lekra_brands`
--
ALTER TABLE `knitting_send_lekra_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knitting_send_suta_brands`
--
ALTER TABLE `knitting_send_suta_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lekra_brands`
--
ALTER TABLE `lekra_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makingknitting_multiple_receiveds`
--
ALTER TABLE `makingknitting_multiple_receiveds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `making_dyeing_multiple_sends`
--
ALTER TABLE `making_dyeing_multiple_sends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `making_dyeing_sends`
--
ALTER TABLE `making_dyeing_sends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `making_knitting_receiveds`
--
ALTER TABLE `making_knitting_receiveds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `making_knitting_sends`
--
ALTER TABLE `making_knitting_sends`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sutas`
--
ALTER TABLE `sutas`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `company_names`
--
ALTER TABLE `company_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kapors`
--
ALTER TABLE `kapors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `knitting_send_lekra_brands`
--
ALTER TABLE `knitting_send_lekra_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `knitting_send_suta_brands`
--
ALTER TABLE `knitting_send_suta_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `lekra_brands`
--
ALTER TABLE `lekra_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `makingknitting_multiple_receiveds`
--
ALTER TABLE `makingknitting_multiple_receiveds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `making_dyeing_multiple_sends`
--
ALTER TABLE `making_dyeing_multiple_sends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `making_dyeing_sends`
--
ALTER TABLE `making_dyeing_sends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `making_knitting_receiveds`
--
ALTER TABLE `making_knitting_receiveds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `making_knitting_sends`
--
ALTER TABLE `making_knitting_sends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sutas`
--
ALTER TABLE `sutas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
