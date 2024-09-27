-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2024 at 07:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `nv_brands`
--

CREATE TABLE `nv_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_brands`
--

INSERT INTO `nv_brands` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'season', '2024-09-17 11:43:54', '2024-09-19 05:34:56', NULL),
(5, 'Testing1', '2024-09-18 12:05:32', '2024-09-18 12:05:35', NULL),
(6, 'Brand 5', '2024-09-19 05:35:06', '2024-09-23 08:21:26', '2024-09-23 08:21:26'),
(7, 'Brand 25', '2024-09-19 05:35:14', '2024-09-19 06:06:12', NULL),
(8, 'Rishi', '2024-09-19 05:52:13', '2024-09-19 06:19:52', '2024-09-19 06:19:52');

-- --------------------------------------------------------

--
-- Table structure for table `nv_cache`
--

CREATE TABLE `nv_cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nv_cache_locks`
--

CREATE TABLE `nv_cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nv_categories`
--

CREATE TABLE `nv_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_categories`
--

INSERT INTO `nv_categories` (`id`, `Name`, `created_at`, `updated_at`) VALUES
(6, 'Testing', '2024-09-19 12:31:59', '2024-09-20 10:51:19'),
(7, 'Rishiq', '2024-09-20 08:58:28', '2024-09-25 07:20:14'),
(14, 'Rishi', '2024-09-25 07:30:35', '2024-09-25 07:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `nv_companies`
--

CREATE TABLE `nv_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CompanyName` varchar(255) NOT NULL,
  `Document` enum('pan','gst') DEFAULT NULL,
  `PanGstNo` varchar(20) DEFAULT NULL,
  `PanGstFile` varchar(255) DEFAULT NULL,
  `BillingName` varchar(255) NOT NULL,
  `BillingMobileNo` int(11) NOT NULL,
  `BillingEmail` varchar(255) NOT NULL,
  `AddLine1` text NOT NULL,
  `AddLine2` text NOT NULL,
  `City` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `PinCode` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_companies`
--

INSERT INTO `nv_companies` (`id`, `CompanyName`, `Document`, `PanGstNo`, `PanGstFile`, `BillingName`, `BillingMobileNo`, `BillingEmail`, `AddLine1`, `AddLine2`, `City`, `State`, `PinCode`, `created_at`, `updated_at`) VALUES
(7, 'Test1', NULL, NULL, NULL, 'Bill1', 12345, 'bill@gmail.com', 'ADD1', 'ADD2', 'Ahmedabad', 'Assam', 213456, '2024-09-26 09:27:49', '2024-09-26 09:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `nv_company_ship_addresses`
--

CREATE TABLE `nv_company_ship_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `ShipCompName` varchar(255) NOT NULL,
  `ShipPersonNo` int(11) NOT NULL,
  `ShipPersonEmail` varchar(255) NOT NULL,
  `ShipGstNo` varchar(255) NOT NULL,
  `ShipAddLine1` text NOT NULL,
  `ShipAddLine2` text NOT NULL,
  `ShipCity` varchar(255) NOT NULL,
  `ShipState` varchar(255) NOT NULL,
  `ShipPinCode` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_company_ship_addresses`
--

INSERT INTO `nv_company_ship_addresses` (`id`, `company_id`, `ShipCompName`, `ShipPersonNo`, `ShipPersonEmail`, `ShipGstNo`, `ShipAddLine1`, `ShipAddLine2`, `ShipCity`, `ShipState`, `ShipPinCode`, `created_at`, `updated_at`) VALUES
(3, 7, 'Shipping', 12345678, 'ship@gmail.com', '123456', 'add1', 'add2', 'ahmedabad', 'Arunachal Pradesh', 785621, '2024-09-26 09:27:49', '2024-09-26 09:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `nv_employees`
--

CREATE TABLE `nv_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `emp_type` varchar(255) DEFAULT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_number` varchar(255) DEFAULT NULL,
  `emp_role` varchar(255) DEFAULT NULL,
  `emp_department` varchar(255) DEFAULT NULL,
  `emp_sub_department` varchar(255) DEFAULT NULL,
  `emp_dob` date DEFAULT NULL,
  `emp_anni_date` date DEFAULT NULL,
  `emp_other_num` varchar(255) DEFAULT NULL,
  `emp_doj` date DEFAULT NULL,
  `emp_dol` date DEFAULT NULL,
  `emp_aadhar_num` varchar(255) DEFAULT NULL,
  `emp_pan_num` varchar(255) DEFAULT NULL,
  `emp_gender` enum('Male','Female') DEFAULT NULL,
  `emp_addline1` text DEFAULT NULL,
  `emp_addline2` text DEFAULT NULL,
  `emp_city` varchar(255) DEFAULT NULL,
  `emp_state` varchar(255) DEFAULT NULL,
  `emp_pincode` varchar(255) DEFAULT NULL,
  `emp_aadhar_file` varchar(255) DEFAULT NULL,
  `emp_pan_file` varchar(255) DEFAULT NULL,
  `emp_profile_pic` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_employees`
--

INSERT INTO `nv_employees` (`id`, `emp_name`, `company_id`, `store_id`, `emp_type`, `emp_email`, `emp_number`, `emp_role`, `emp_department`, `emp_sub_department`, `emp_dob`, `emp_anni_date`, `emp_other_num`, `emp_doj`, `emp_dol`, `emp_aadhar_num`, `emp_pan_num`, `emp_gender`, `emp_addline1`, `emp_addline2`, `emp_city`, `emp_state`, `emp_pincode`, `emp_aadhar_file`, `emp_pan_file`, `emp_profile_pic`, `created_at`, `updated_at`) VALUES
(2, 'Riship', 20, 20, '10', 'r@gmail.com', '34', '10', '10', '10', '2024-09-18', '2024-09-10', '56', '2024-09-16', '2024-09-11', NULL, '12', NULL, 'rt', 'rt', 'ahmedabad', 'gujarat', '56', NULL, NULL, NULL, '2024-09-26 08:23:52', '2024-09-26 08:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `nv_failed_jobs`
--

CREATE TABLE `nv_failed_jobs` (
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
-- Table structure for table `nv_jobs`
--

CREATE TABLE `nv_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nv_job_batches`
--

CREATE TABLE `nv_job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nv_migrations`
--

CREATE TABLE `nv_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_migrations`
--

INSERT INTO `nv_migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_17_121101_create_brands_table', 1),
(5, '2024_09_17_165125_create_seasons_table', 2),
(8, '2024_09_17_172202_create_tags_table', 3),
(9, '2024_09_17_183509_create_category_masters_table', 3),
(12, '2024_09_18_135302_add_softdelete', 4),
(13, '2024_09_19_115819_create_sub_category_masters_table', 5),
(14, '2024_09_19_162745_create_categories_table', 6),
(15, '2024_09_19_171804_create_categories_table', 7),
(16, '2024_09_19_171811_create_sub_categories_table', 7),
(22, '2024_09_20_163612_create_companies_table', 8),
(23, '2024_09_20_163711_create_company_ship_addresses_table', 8),
(25, '2024_09_25_173822_create_user_addresses_table', 9),
(26, '2024_09_25_173834_create_user_banks_table', 9),
(28, '2024_09_26_130955_create_employees_table', 10),
(29, '2024_09_26_160609_create_products_table', 11),
(30, '2024_09_26_160712_create_product_variants_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `nv_password_reset_tokens`
--

CREATE TABLE `nv_password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nv_products`
--

CREATE TABLE `nv_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `hsn_code` varchar(255) NOT NULL,
  `material` varchar(255) DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tag_id` varchar(255) DEFAULT NULL,
  `sub_cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `season_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cost_price` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `product_mrp` int(11) NOT NULL,
  `status` enum('0','1') DEFAULT NULL COMMENT '0 - active\r\n1 - inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_products`
--

INSERT INTO `nv_products` (`id`, `product_name`, `product_code`, `hsn_code`, `material`, `product_description`, `cat_id`, `tag_id`, `sub_cat_id`, `season_id`, `brand_id`, `cost_price`, `sell_price`, `product_mrp`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Rishi', '1', '1', 'material', 'yoo', 6, NULL, 2, 1, 4, 1, 1, 1, '0', '2024-09-26 13:03:19', '2024-09-26 13:03:19'),
(7, 'Rishi', '2', '1', 'material', 'yoo', 6, '2,3,4', 2, 1, 4, 1, 1, 1, '0', '2024-09-26 13:43:41', '2024-09-26 13:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `nv_product_variants`
--

CREATE TABLE `nv_product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_product_variants`
--

INSERT INTO `nv_product_variants` (`id`, `product_id`, `color`, `size`, `sku`, `image`, `created_at`, `updated_at`) VALUES
(2, 4, 'Red', 'S', 'sm23', NULL, '2024-09-26 13:23:37', '2024-09-26 13:23:37'),
(3, 4, 'Red', 'M', 'm23', NULL, '2024-09-26 13:23:37', '2024-09-26 13:23:37'),
(4, 4, 'Blue', 'S', 'SM23', NULL, '2024-09-26 13:23:37', '2024-09-26 13:23:37'),
(6, 7, 'Red', 'S', 'sm23', NULL, '2024-09-26 13:43:41', '2024-09-26 13:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `nv_seasons`
--

CREATE TABLE `nv_seasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_seasons`
--

INSERT INTO `nv_seasons` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'season0', '2024-09-17 11:44:52', '2024-09-18 12:13:45', NULL),
(2, 'Testing1', '2024-09-18 12:07:35', '2024-09-18 12:07:35', NULL),
(3, 'season1', '2024-09-18 12:07:56', '2024-09-18 12:07:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nv_sessions`
--

CREATE TABLE `nv_sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_sessions`
--

INSERT INTO `nv_sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3Fb5FdbW7wuIJifDnyF8zIfJqlWtqMjsl7ykqgnM', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUG03NHhid2FOOWt3NEdEamxOYnVvczV2ampSWW9CTTZadDVIVEFVWCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0L2NyZWF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1727359643);

-- --------------------------------------------------------

--
-- Table structure for table `nv_sub_categories`
--

CREATE TABLE `nv_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CatId` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_sub_categories`
--

INSERT INTO `nv_sub_categories` (`id`, `CatId`, `Name`, `created_at`, `updated_at`) VALUES
(2, 6, 'Test11', '2024-09-19 12:31:59', '2024-09-20 10:51:19'),
(3, 6, 'Test12', '2024-09-19 12:31:59', '2024-09-20 10:51:19'),
(4, 7, 'wes2', '2024-09-20 08:58:28', '2024-09-25 07:20:14'),
(5, 7, 'wes2', '2024-09-20 10:38:21', '2024-09-25 07:20:14'),
(6, 7, 'wes26', '2024-09-20 10:38:28', '2024-09-25 07:20:14'),
(15, 14, 'Test', '2024-09-25 07:30:35', '2024-09-25 07:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `nv_tags`
--

CREATE TABLE `nv_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_tags`
--

INSERT INTO `nv_tags` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Tag2', '2024-09-18 12:55:25', '2024-09-18 12:55:25', NULL),
(3, 'Tags1', '2024-09-19 05:35:55', '2024-09-19 05:35:55', NULL),
(4, 'tags5', '2024-09-19 05:36:51', '2024-09-19 05:36:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nv_users`
--

CREATE TABLE `nv_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile_number` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('Super Admin','Admin','Faculty','Student','Student Department','Vendor') NOT NULL DEFAULT 'Student',
  `is_active` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vendor_type` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `gst_no` varchar(255) DEFAULT NULL,
  `gst_file` varchar(255) DEFAULT NULL,
  `pancard_no` varchar(255) DEFAULT NULL,
  `pancard_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_users`
--

INSERT INTO `nv_users` (`id`, `name`, `mobile_number`, `email`, `email_verified_at`, `password`, `role`, `is_active`, `remember_token`, `created_at`, `updated_at`, `vendor_type`, `company_name`, `gst_no`, `gst_file`, `pancard_no`, `pancard_file`) VALUES
(1, 'Miss Josefina Gaylord PhD', NULL, 'test@example.com', '2024-09-17 07:25:26', '$2y$12$Uws6a2mMPRKZ97Yo91AtsuyTIQh5QF8rAgcoiMAC6VuFyjhwZZF1K', 'Super Admin', 1, 'G1xNL63bnN', '2024-09-17 07:25:26', '2024-09-17 07:25:26', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Althea Thiel', NULL, 'thelma87@example.com', '2024-09-17 07:25:26', '$2y$12$Uws6a2mMPRKZ97Yo91AtsuyTIQh5QF8rAgcoiMAC6VuFyjhwZZF1K', 'Faculty', 1, 'yY8HnfMUMy', '2024-09-17 07:25:26', '2024-09-17 07:25:26', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Prof. Jaqueline Heller II', NULL, 'hayes.effie@example.org', '2024-09-17 07:25:26', '$2y$12$Uws6a2mMPRKZ97Yo91AtsuyTIQh5QF8rAgcoiMAC6VuFyjhwZZF1K', 'Super Admin', 1, 'yCSOHiKyLx', '2024-09-17 07:25:26', '2024-09-17 07:25:26', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Kian Tremblay', NULL, 'dubuque.norval@example.org', '2024-09-17 07:25:26', '$2y$12$Uws6a2mMPRKZ97Yo91AtsuyTIQh5QF8rAgcoiMAC6VuFyjhwZZF1K', 'Student', 1, 'HYJfsaoOjH', '2024-09-17 07:25:26', '2024-09-17 07:25:26', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Tyree Rosenbaum', NULL, 'hill.sabryna@example.org', '2024-09-17 07:25:26', '$2y$12$Uws6a2mMPRKZ97Yo91AtsuyTIQh5QF8rAgcoiMAC6VuFyjhwZZF1K', 'Admin', 1, '2lTc58f2Rs', '2024-09-17 07:25:26', '2024-09-17 07:25:26', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Sigrid Braun', NULL, 'andre12@example.net', '2024-09-17 07:25:26', '$2y$12$Uws6a2mMPRKZ97Yo91AtsuyTIQh5QF8rAgcoiMAC6VuFyjhwZZF1K', 'Student Department', 1, '8plhyjhyUF', '2024-09-17 07:25:26', '2024-09-17 07:25:26', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Rishi', 123456, 'rishi12@gmail.com', NULL, NULL, 'Vendor', 1, NULL, '2024-09-26 05:48:42', '2024-09-26 07:36:02', NULL, 'Riship', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nv_user_addresses`
--

CREATE TABLE `nv_user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `b_address1` text DEFAULT NULL,
  `b_address2` text DEFAULT NULL,
  `b_city` varchar(255) DEFAULT NULL,
  `b_state` varchar(255) DEFAULT NULL,
  `b_pincode` varchar(255) DEFAULT NULL,
  `b_mobile` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_user_addresses`
--

INSERT INTO `nv_user_addresses` (`id`, `user_id`, `b_address1`, `b_address2`, `b_city`, `b_state`, `b_pincode`, `b_mobile`, `created_at`, `updated_at`) VALUES
(2, 17, 'vendor road', 'vendor road 2', 'Ahmedabad', 'Bihar', '4564', NULL, '2024-09-26 05:48:42', '2024-09-26 07:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `nv_user_banks`
--

CREATE TABLE `nv_user_banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `ifsc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_user_banks`
--

INSERT INTO `nv_user_banks` (`id`, `user_id`, `account_no`, `bank_name`, `account_name`, `ifsc`, `created_at`, `updated_at`) VALUES
(1, 17, '12345', '123456', 'john1', 'SB15607', '2024-09-26 05:48:42', '2024-09-26 07:36:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nv_brands`
--
ALTER TABLE `nv_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nv_cache`
--
ALTER TABLE `nv_cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `nv_cache_locks`
--
ALTER TABLE `nv_cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `nv_categories`
--
ALTER TABLE `nv_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nv_companies`
--
ALTER TABLE `nv_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nv_company_ship_addresses`
--
ALTER TABLE `nv_company_ship_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_company_ship_addresses_company_id_foreign` (`company_id`);

--
-- Indexes for table `nv_employees`
--
ALTER TABLE `nv_employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nv_employees_emp_email_unique` (`emp_email`);

--
-- Indexes for table `nv_failed_jobs`
--
ALTER TABLE `nv_failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nv_failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `nv_jobs`
--
ALTER TABLE `nv_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_jobs_queue_index` (`queue`);

--
-- Indexes for table `nv_job_batches`
--
ALTER TABLE `nv_job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nv_migrations`
--
ALTER TABLE `nv_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nv_password_reset_tokens`
--
ALTER TABLE `nv_password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `nv_products`
--
ALTER TABLE `nv_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nv_products_product_code_unique` (`product_code`),
  ADD KEY `nv_products_cat_id_foreign` (`cat_id`),
  ADD KEY `nv_products_sub_cat_id_foreign` (`sub_cat_id`),
  ADD KEY `nv_products_season_id_foreign` (`season_id`),
  ADD KEY `nv_products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `nv_product_variants`
--
ALTER TABLE `nv_product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_product_variants_product_id_foreign` (`product_id`);

--
-- Indexes for table `nv_seasons`
--
ALTER TABLE `nv_seasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nv_sessions`
--
ALTER TABLE `nv_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_sessions_user_id_index` (`user_id`),
  ADD KEY `nv_sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `nv_sub_categories`
--
ALTER TABLE `nv_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_sub_categories_catid_foreign` (`CatId`);

--
-- Indexes for table `nv_tags`
--
ALTER TABLE `nv_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nv_users`
--
ALTER TABLE `nv_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nv_users_email_unique` (`email`);

--
-- Indexes for table `nv_user_addresses`
--
ALTER TABLE `nv_user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_user_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `nv_user_banks`
--
ALTER TABLE `nv_user_banks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_user_banks_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nv_brands`
--
ALTER TABLE `nv_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nv_categories`
--
ALTER TABLE `nv_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nv_companies`
--
ALTER TABLE `nv_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nv_company_ship_addresses`
--
ALTER TABLE `nv_company_ship_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nv_employees`
--
ALTER TABLE `nv_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nv_failed_jobs`
--
ALTER TABLE `nv_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nv_jobs`
--
ALTER TABLE `nv_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nv_migrations`
--
ALTER TABLE `nv_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `nv_products`
--
ALTER TABLE `nv_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nv_product_variants`
--
ALTER TABLE `nv_product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nv_seasons`
--
ALTER TABLE `nv_seasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nv_sub_categories`
--
ALTER TABLE `nv_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nv_tags`
--
ALTER TABLE `nv_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nv_users`
--
ALTER TABLE `nv_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nv_user_addresses`
--
ALTER TABLE `nv_user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nv_user_banks`
--
ALTER TABLE `nv_user_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nv_company_ship_addresses`
--
ALTER TABLE `nv_company_ship_addresses`
  ADD CONSTRAINT `nv_company_ship_addresses_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `nv_companies` (`id`);

--
-- Constraints for table `nv_products`
--
ALTER TABLE `nv_products`
  ADD CONSTRAINT `nv_products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `nv_brands` (`id`),
  ADD CONSTRAINT `nv_products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `nv_categories` (`id`),
  ADD CONSTRAINT `nv_products_season_id_foreign` FOREIGN KEY (`season_id`) REFERENCES `nv_seasons` (`id`),
  ADD CONSTRAINT `nv_products_sub_cat_id_foreign` FOREIGN KEY (`sub_cat_id`) REFERENCES `nv_sub_categories` (`id`);

--
-- Constraints for table `nv_product_variants`
--
ALTER TABLE `nv_product_variants`
  ADD CONSTRAINT `nv_product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `nv_products` (`id`);

--
-- Constraints for table `nv_sub_categories`
--
ALTER TABLE `nv_sub_categories`
  ADD CONSTRAINT `nv_sub_categories_catid_foreign` FOREIGN KEY (`CatId`) REFERENCES `nv_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_user_addresses`
--
ALTER TABLE `nv_user_addresses`
  ADD CONSTRAINT `nv_user_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `nv_users` (`id`);

--
-- Constraints for table `nv_user_banks`
--
ALTER TABLE `nv_user_banks`
  ADD CONSTRAINT `nv_user_banks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `nv_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
