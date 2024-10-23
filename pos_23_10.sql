-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 03:42 PM
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
-- Table structure for table `nv_barcodes`
--

CREATE TABLE `nv_barcodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `packing_date` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_barcodes`
--

INSERT INTO `nv_barcodes` (`id`, `packing_date`, `product_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2024-10-03', 8, NULL, '2024-10-05 13:07:41', '2024-10-05 13:07:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nv_barcode_items`
--

CREATE TABLE `nv_barcode_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barcode_id` bigint(20) UNSIGNED NOT NULL,
  `sku_id` bigint(20) UNSIGNED NOT NULL,
  `sku_quantity` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_barcode_items`
--

INSERT INTO `nv_barcode_items` (`id`, `barcode_id`, `sku_id`, `sku_quantity`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 15, 60, 1, '2024-10-05 13:07:41', '2024-10-07 08:33:08', NULL),
(2, 1, 16, 50, 1, '2024-10-05 13:07:41', '2024-10-07 08:33:08', NULL),
(3, 1, 17, 40, 1, '2024-10-05 13:07:41', '2024-10-07 08:33:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nv_base_stock_categories`
--

CREATE TABLE `nv_base_stock_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `cat_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_base_stock_categories`
--

INSERT INTO `nv_base_stock_categories` (`id`, `store_id`, `cat_id`, `cat_qty`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 2, 6, 100, '2024-10-18 06:52:00', '2024-10-18 07:48:02', NULL),
(6, 2, 7, 10, '2024-10-18 06:52:00', '2024-10-18 07:48:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nv_base_stock_sizes`
--

CREATE TABLE `nv_base_stock_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `base_stock_cat_id` bigint(20) UNSIGNED NOT NULL,
  `size` int(11) DEFAULT NULL,
  `ratio` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_base_stock_sizes`
--

INSERT INTO `nv_base_stock_sizes` (`id`, `base_stock_cat_id`, `size`, `ratio`, `qty`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 5, 24, 1, 56, '2024-10-18 06:52:00', '2024-10-18 07:52:29', NULL),
(8, 5, 26, 1, 56, '2024-10-18 06:52:00', '2024-10-18 07:52:29', NULL),
(9, 6, 28, 1, 5, '2024-10-18 06:52:00', '2024-10-18 06:52:00', NULL),
(10, 6, 30, 1, 5, '2024-10-18 06:52:00', '2024-10-18 06:52:00', NULL),
(13, 5, 28, 1, 5, '2024-10-18 07:52:29', '2024-10-18 07:52:29', NULL),
(14, 5, 30, 1, 5, '2024-10-18 07:52:29', '2024-10-18 07:52:29', NULL);

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
(8, 'Rishi', '2024-09-19 05:52:13', '2024-09-19 06:19:52', '2024-09-19 06:19:52'),
(9, 'testing Brand1', '2024-10-05 04:59:14', '2024-10-05 04:59:23', '2024-10-05 04:59:23'),
(10, 'Blue Buddha London', '2024-10-05 08:57:54', '2024-10-05 08:58:16', NULL);

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
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_categories`
--

INSERT INTO `nv_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, 'Testing', '2024-09-19 12:31:59', '2024-10-05 05:32:04'),
(7, 'Rishiq', '2024-09-20 08:58:28', '2024-09-25 07:20:14'),
(15, 'Rishi1', '2024-10-05 05:12:54', '2024-10-05 05:12:54'),
(16, 'Apperals', '2024-10-05 08:51:40', '2024-10-05 08:53:49'),
(17, 'Rishi', '2024-10-22 12:31:02', '2024-10-22 12:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `nv_central_warehouses`
--

CREATE TABLE `nv_central_warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_name` varchar(255) NOT NULL,
  `contact_person_name` varchar(255) NOT NULL,
  `contact_person_email` varchar(255) NOT NULL,
  `address_line_1` text NOT NULL,
  `address_line_2` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_central_warehouses`
--

INSERT INTO `nv_central_warehouses` (`id`, `company_id`, `warehouse_name`, `contact_person_name`, `contact_person_email`, `address_line_1`, `address_line_2`, `city`, `state`, `pincode`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 7, 'Testing', 'Rishi testing', 'Test@gmail.com', 'add 1', 'add 2', 'Ahmedabad', 'Bihar', 3456, NULL, '2024-10-05 10:48:04', '2024-10-07 06:33:57'),
(2, 14, 'Dhruvil', 'Dhruvil', 'Dhruvil@gmail.com', 'tsete', 'test', 'Ahmedabad', 'Bihar', 56789, NULL, '2024-10-16 11:08:34', '2024-10-16 11:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `nv_colors`
--

CREATE TABLE `nv_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_colors`
--

INSERT INTO `nv_colors` (`id`, `color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bluet', '2024-10-11 05:13:22', '2024-10-11 05:33:13', '2024-10-11 05:33:13'),
(2, 'blue', '2024-10-11 05:33:22', '2024-10-19 09:50:34', NULL),
(3, 'red', '2024-10-11 05:33:33', '2024-10-19 09:50:31', NULL),
(4, 'magenta', '2024-10-11 05:33:56', '2024-10-19 09:50:28', NULL),
(5, 'yellow', '2024-10-19 09:50:02', '2024-10-19 09:50:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nv_commercial`
--

CREATE TABLE `nv_commercial` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `sba_sqft` varchar(255) DEFAULT NULL,
  `ca_sqft` varchar(255) DEFAULT NULL,
  `store_rating` varchar(255) DEFAULT NULL,
  `commercial_model` varchar(255) DEFAULT NULL,
  `margin` varchar(255) DEFAULT NULL,
  `add_support` varchar(255) DEFAULT NULL,
  `security_deposit` varchar(255) DEFAULT NULL,
  `capex` varchar(255) DEFAULT NULL,
  `rent` varchar(255) DEFAULT NULL,
  `bep` varchar(255) DEFAULT NULL,
  `mf` varchar(255) DEFAULT NULL,
  `mf_percent` varchar(255) DEFAULT NULL,
  `asm` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_commercial`
--

INSERT INTO `nv_commercial` (`id`, `store_id`, `sba_sqft`, `ca_sqft`, `store_rating`, `commercial_model`, `margin`, `add_support`, `security_deposit`, `capex`, `rent`, `bep`, `mf`, `mf_percent`, `asm`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 2, '1', '1', 'a', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2024-10-17 11:32:39', '2024-10-17 11:32:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nv_companies`
--

CREATE TABLE `nv_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `document` enum('pan','gst') DEFAULT NULL,
  `gst_no` varchar(20) DEFAULT NULL,
  `gst_file` varchar(255) DEFAULT NULL,
  `billing_name` varchar(255) NOT NULL,
  `billing_mobile_no` int(11) NOT NULL,
  `billing_email` varchar(255) NOT NULL,
  `add_line1` text NOT NULL,
  `AddLine2` text NOT NULL,
  `City` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `PinCode` int(11) NOT NULL,
  `customer_care_num` int(11) DEFAULT NULL,
  `customer_care_email` varchar(255) DEFAULT NULL,
  `company_prefix` varchar(255) DEFAULT NULL,
  `company_prefix_count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_companies`
--

INSERT INTO `nv_companies` (`id`, `company_name`, `document`, `gst_no`, `gst_file`, `billing_name`, `billing_mobile_no`, `billing_email`, `add_line1`, `AddLine2`, `City`, `State`, `PinCode`, `customer_care_num`, `customer_care_email`, `company_prefix`, `company_prefix_count`, `created_at`, `updated_at`) VALUES
(7, 'Test1', NULL, NULL, NULL, 'Bill1', 12345, 'bill@gmail.com', 'ADD1', 'ADD2', 'Ahmedabad', 'Assam', 213456, NULL, NULL, NULL, NULL, '2024-09-26 09:27:49', '2024-09-26 09:29:03'),
(11, 'yoo hoo', NULL, '5000', NULL, 'Bill1', 34, 'bill@gmail.com', 'wer', 'dfg', 'Ahmedabad', 'Assam', 234, NULL, NULL, NULL, NULL, '2024-10-05 07:03:20', '2024-10-05 07:06:35'),
(14, 'Testing Company1', NULL, '5000', 'zanskar.jpg', 'Bill1', 1, 'bill@gmail.com', 'we', 'ty', 'Ahmedabad', 'Bihar', 890, 890, 'r@gmail.com', NULL, NULL, '2024-10-07 06:46:54', '2024-10-07 06:46:54');

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
(3, 7, 'Shipping', 12345678, 'ship@gmail.com', '123456', 'add1', 'add2', 'ahmedabad', 'Arunachal Pradesh', 785621, '2024-09-26 09:27:49', '2024-09-26 09:27:49'),
(5, 11, 'Shipping1', 12345678, 'ship@gmail.com', '123456', 'bcv', 'jhg', 'Surat', 'Arunachal Pradesh', 785621, '2024-10-05 07:03:20', '2024-10-05 07:06:35');

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
-- Table structure for table `nv_fits`
--

CREATE TABLE `nv_fits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fit_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_fits`
--

INSERT INTO `nv_fits` (`id`, `cat_id`, `sub_cat_id`, `fit_name`, `created_at`, `updated_at`) VALUES
(6, 16, 28, 'slim', '2024-10-05 08:59:56', '2024-10-05 08:59:56'),
(7, 16, 28, 'Regular', '2024-10-05 09:00:23', '2024-10-05 09:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `nv_inventory_detail`
--

CREATE TABLE `nv_inventory_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `store_manager` varchar(255) DEFAULT NULL,
  `store_manager_phone` int(11) DEFAULT NULL,
  `store_manager_email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
(30, '2024_09_26_160712_create_product_variants_table', 11),
(37, '2024_10_01_114740_create_fits_table', 12),
(53, '2024_10_01_143707_create_sleeves_table', 14),
(72, '2024_09_27_174557_create_purchase_orders_table', 15),
(75, '2024_10_02_183058_create_purchase_order_items_table', 15),
(77, '2024_10_02_180944_create_purchase_order_item_parameters_table', 16),
(78, '2024_10_05_153950_create_central_warehouses_table', 17),
(81, '2024_10_05_170450_create_barcodes_table', 18),
(82, '2024_10_05_181519_create_barcode_items_table', 18),
(83, '2024_10_08_142918_create_warehouse_inventories_table', 19),
(84, '2024_10_08_144352_create_warehouse_stock_ins_table', 19),
(85, '2024_10_09_125944_create_store_types_table', 20),
(88, '2024_10_11_103558_create_colors_table', 21),
(91, '2024_10_11_155403_create_stock_allocations_table', 22),
(92, '2024_10_17_110831_create_shelves_table', 22),
(93, '2024_10_17_110914_create_shelf_relations_table', 22),
(94, '2024_10_09_125947_create_store_generates_table', 23),
(95, '2024_10_17_144540_create_inventory_detail_table', 24),
(97, '2024_10_17_155524_create_commertial_table', 24),
(98, '2024_10_17_144553_create_attachment_table', 25),
(100, '2024_10_17_174858_create_base_stock_categories_table', 26),
(101, '2024_10_17_174906_create_base_stock_sizes_table', 26);

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
  `cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tag_id` varchar(255) DEFAULT NULL,
  `season_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slim_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sleeve_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fashion_id` varchar(255) DEFAULT NULL,
  `pattern_id` varchar(255) DEFAULT NULL,
  `hsn_code` varchar(255) NOT NULL,
  `material` varchar(255) DEFAULT NULL,
  `size_cm` varchar(255) DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `cost_price` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `product_mrp` int(11) NOT NULL,
  `status` enum('0','1') DEFAULT NULL COMMENT '0 - active\r\n1 - inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_products`
--

INSERT INTO `nv_products` (`id`, `product_name`, `product_code`, `cat_id`, `sub_cat_id`, `tag_id`, `season_id`, `brand_id`, `fit_id`, `slim_id`, `sleeve_id`, `fashion_id`, `pattern_id`, `hsn_code`, `material`, `size_cm`, `product_description`, `cost_price`, `sell_price`, `product_mrp`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'Rishi', '2', 6, 2, '2,3,4', 1, 4, NULL, NULL, NULL, NULL, NULL, '1', 'material', NULL, 'yoo', 1, 10, 100, '0', '2024-09-26 13:43:41', '2024-10-02 05:56:59', NULL),
(8, 'Test 2', '45678', 6, 2, '2', 2, 4, NULL, NULL, NULL, NULL, NULL, '4590', 'material6', NULL, 'Nicee', 400, 800, 850, '0', '2024-10-03 07:00:56', '2024-10-03 07:00:56', NULL),
(10, 'Testing Kurti', '12', 16, 28, '3', 6, 10, 6, NULL, NULL, NULL, NULL, '12', 'Special', NULL, 'rt', 500, 600, 800, '0', '2024-10-05 11:16:05', '2024-10-05 11:16:05', NULL),
(22, 'Testing Kurti6', '1', 16, 28, '2', 2, 4, NULL, NULL, NULL, NULL, NULL, '1', 'Special', NULL, 'er', 34, 90, 90, '0', '2024-10-11 06:22:30', '2024-10-11 06:22:30', NULL),
(25, 'Testing Jeans', '45', 6, 2, '2', 2, 4, NULL, NULL, NULL, NULL, NULL, '45', 'nice', '89', 'testing 1234', 56, 78, 90, '0', '2024-10-17 05:17:12', '2024-10-17 05:17:12', NULL),
(28, 'test56', '78', 7, 4, '4', 2, 5, NULL, NULL, NULL, NULL, NULL, '67', 'Special', '89', '4567', 56, 57, 58, '0', '2024-10-19 09:32:56', '2024-10-19 09:32:56', NULL);

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
  `barcode` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_product_variants`
--

INSERT INTO `nv_product_variants` (`id`, `product_id`, `color`, `size`, `sku`, `barcode`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 7, '3', 'M', '23m', '45op', NULL, '2024-10-02 10:31:00', '2024-10-23 11:53:01', NULL),
(13, 7, '3', 'L', 'L34', 'yu89', NULL, '2024-10-03 06:43:51', '2024-10-23 11:53:01', NULL),
(14, 7, '2', 'M', '26M', '7893', NULL, '2024-10-03 06:43:51', '2024-10-23 11:53:01', NULL),
(15, 8, '4', 'S', '45S', NULL, NULL, '2024-10-03 07:00:56', '2024-10-03 07:00:56', NULL),
(16, 8, '4', 'M', '45M', NULL, NULL, '2024-10-03 07:00:56', '2024-10-03 07:00:56', NULL),
(17, 8, '5', 'S', 'SM28', NULL, NULL, '2024-10-03 07:00:56', '2024-10-03 07:00:56', NULL),
(18, 10, '3', 'S', 'sm23', NULL, NULL, '2024-10-05 11:16:05', '2024-10-05 11:16:05', NULL),
(19, 10, '3', 'M', 'm23', NULL, NULL, '2024-10-05 11:16:05', '2024-10-05 11:16:05', NULL),
(20, 10, '2', 'S', 'SM28', NULL, NULL, '2024-10-05 11:16:05', '2024-10-05 11:16:05', NULL),
(21, 22, '2', 'S', '4589sm', NULL, 'spiti.jpg', '2024-10-11 06:22:30', '2024-10-11 06:22:30', NULL),
(22, 22, '2', 'M', 'm25eryt', NULL, 'spiti.jpg', '2024-10-11 06:22:30', '2024-10-11 08:07:06', '2024-10-11 08:07:06'),
(23, 25, '2', 'S', 'sm34', '78op96', NULL, '2024-10-17 05:17:12', '2024-10-17 05:17:12', NULL),
(24, 28, '2', 'S', 'sm90', '78tyer45', NULL, '2024-10-19 09:32:56', '2024-10-19 09:32:56', NULL),
(29, 28, '2', '28', '28yu', '28ytu', NULL, '2024-10-19 11:51:25', '2024-10-19 11:51:25', NULL),
(30, 28, '2', '30', '30yu', '30ytu', NULL, '2024-10-19 11:51:25', '2024-10-19 11:51:25', NULL),
(31, 28, '2', '32', '32yu', '32ytu', NULL, '2024-10-19 11:51:25', '2024-10-19 11:51:25', NULL),
(32, 28, '2', '34', '34yu', '34ytu', NULL, '2024-10-19 11:51:25', '2024-10-19 11:51:25', NULL),
(33, 7, '3', 'M', '23m', NULL, NULL, '2024-10-23 11:35:26', '2024-10-23 11:36:15', '2024-10-23 11:36:15'),
(34, 7, '3', 'L', 'L34', NULL, NULL, '2024-10-23 11:35:26', '2024-10-23 11:36:11', '2024-10-23 11:36:11'),
(35, 7, '2', 'M', '26M', NULL, NULL, '2024-10-23 11:35:26', '2024-10-23 11:36:07', '2024-10-23 11:36:07'),
(36, 7, '2', 'sdb', '56yuio', '7514aer', NULL, '2024-10-23 11:50:08', '2024-10-23 11:53:01', NULL),
(37, 7, '2', 'smr', '23smr', '7514aer', NULL, '2024-10-23 11:53:01', '2024-10-23 11:53:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nv_purchase_orders`
--

CREATE TABLE `nv_purchase_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `company_shipping_id` bigint(20) UNSIGNED NOT NULL,
  `po_no` varchar(255) DEFAULT NULL,
  `po_date` date NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_purchase_orders`
--

INSERT INTO `nv_purchase_orders` (`id`, `user_id`, `company_id`, `company_shipping_id`, `po_no`, `po_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 17, 7, 3, NULL, '2024-10-03', NULL, '2024-10-03 06:58:10', '2024-10-03 06:58:10'),
(3, 17, 7, 3, NULL, '2024-10-03', NULL, '2024-10-03 09:52:51', '2024-10-03 09:52:51'),
(7, 17, 11, 5, '5678', '2024-10-09', NULL, '2024-10-09 06:16:38', '2024-10-09 06:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `nv_purchase_order_items`
--

CREATE TABLE `nv_purchase_order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_description` text DEFAULT NULL,
  `unit_price` decimal(11,2) NOT NULL,
  `tax_amount` decimal(11,2) DEFAULT NULL,
  `total_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_purchase_order_items`
--

INSERT INTO `nv_purchase_order_items` (`id`, `po_id`, `product_id`, `product_description`, `unit_price`, `tax_amount`, `total_quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 7, NULL, 1.00, NULL, 55, '2024-10-03 06:58:10', '2024-10-03 06:58:10', NULL),
(2, 3, 7, NULL, 1.00, NULL, 50, '2024-10-03 09:52:51', '2024-10-03 09:52:51', NULL),
(3, 3, 8, NULL, 400.00, NULL, 55, '2024-10-03 09:52:51', '2024-10-03 09:52:51', NULL),
(7, 7, 7, 'testing', 1.00, 1.00, 100, '2024-10-09 06:16:38', '2024-10-09 06:16:38', NULL),
(8, 7, 8, 'testing5', 400.00, 1.00, 166, '2024-10-09 06:16:38', '2024-10-10 05:19:59', '2024-10-10 05:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `nv_purchase_order_item_parameters`
--

CREATE TABLE `nv_purchase_order_item_parameters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_id` bigint(20) UNSIGNED NOT NULL,
  `po_item_id` bigint(20) UNSIGNED NOT NULL,
  `item_sku` varchar(255) NOT NULL,
  `item_color` varchar(255) DEFAULT NULL,
  `item_size` varchar(255) DEFAULT NULL,
  `item_qty` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_purchase_order_item_parameters`
--

INSERT INTO `nv_purchase_order_item_parameters` (`id`, `po_id`, `po_item_id`, `item_sku`, `item_color`, `item_size`, `item_qty`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '23m', 'Red', 'M', 55, NULL, '2024-10-03 06:58:10', '2024-10-03 06:58:10'),
(2, 3, 2, '45S', 'magenta', 'S', 55, NULL, '2024-10-03 09:52:51', '2024-10-03 09:52:51'),
(3, 3, 3, '45S', 'magenta', 'S', 30, NULL, '2024-10-03 09:52:51', '2024-10-03 09:52:51'),
(4, 7, 7, 'L34', 'Red', 'L', 50, NULL, '2024-10-09 06:16:38', '2024-10-09 06:16:38'),
(5, 7, 7, '26M', 'Blue', 'M', 50, NULL, '2024-10-09 06:16:38', '2024-10-09 06:16:38'),
(6, 7, 8, '45M', 'magenta', 'M', 80, '2024-10-10 05:19:59', '2024-10-09 06:16:38', '2024-10-10 05:19:59'),
(7, 7, 8, 'SM28', 'black', 'S', 86, '2024-10-10 05:19:59', '2024-10-09 06:16:38', '2024-10-10 05:19:59');

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
(3, 'season1', '2024-09-18 12:07:56', '2024-09-18 12:07:56', NULL),
(6, 'Winter 25', '2024-10-05 08:58:40', '2024-10-05 08:58:51', NULL);

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
('EPJuSwxT2P1DaH8B6jCMbWQpvXmIGDdWfZI2MqK0', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNlpuQWtJSGs4S0hiWUoxS1NLUHFaSllVb09XWGVqczdHUEY0cDY3USI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYXN0ZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1729690787);

-- --------------------------------------------------------

--
-- Table structure for table `nv_shelf_relations`
--

CREATE TABLE `nv_shelf_relations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shelf_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_shelf_relations`
--

INSERT INTO `nv_shelf_relations` (`id`, `shelf_id`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 22, '2024-10-18 12:47:01', '2024-10-18 12:47:01', NULL),
(2, 2, 25, '2024-10-18 12:47:01', '2024-10-18 12:47:01', NULL),
(3, 3, 8, '2024-10-18 12:47:01', '2024-10-18 12:47:01', NULL),
(4, 4, 10, '2024-10-18 12:47:01', '2024-10-18 12:47:01', NULL),
(5, 5, 10, '2024-10-18 12:47:01', '2024-10-18 12:47:01', NULL),
(6, 1, 8, '2024-10-18 13:23:23', '2024-10-18 13:23:23', NULL),
(7, 1, 22, '2024-10-18 13:23:23', '2024-10-18 13:23:23', NULL),
(8, 2, 25, '2024-10-18 13:23:23', '2024-10-18 13:23:23', NULL),
(9, 3, 8, '2024-10-18 13:23:23', '2024-10-18 13:23:23', NULL),
(10, 4, 10, '2024-10-18 13:23:23', '2024-10-18 13:23:23', NULL),
(11, 5, 10, '2024-10-18 13:23:23', '2024-10-18 13:23:23', NULL),
(12, 5, 25, '2024-10-18 13:23:23', '2024-10-18 13:23:23', NULL),
(13, 3, 22, '2024-10-23 12:55:37', '2024-10-23 12:55:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nv_shelves`
--

CREATE TABLE `nv_shelves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_id` bigint(20) UNSIGNED DEFAULT NULL,
  `row_num` int(11) DEFAULT NULL,
  `column_num` int(11) DEFAULT NULL,
  `column_name` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_shelves`
--

INSERT INTO `nv_shelves` (`id`, `warehouse_id`, `row_num`, `column_num`, `column_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, '2024-10-17 05:58:05', '2024-10-17 05:58:05', NULL),
(2, 1, 1, 2, 2, '2024-10-17 05:58:05', '2024-10-17 05:58:05', NULL),
(3, 1, 1, 3, 3, '2024-10-17 05:58:05', '2024-10-17 05:58:05', NULL),
(4, 1, 1, 4, 4, '2024-10-17 05:58:05', '2024-10-17 05:58:05', NULL),
(5, 1, 1, 5, 5, '2024-10-17 05:58:05', '2024-10-17 05:58:05', NULL),
(6, 1, 1, 6, 6, '2024-10-17 05:58:05', '2024-10-17 05:58:05', NULL),
(7, 1, 1, 7, 7, '2024-10-17 05:58:05', '2024-10-17 05:58:05', NULL),
(8, 1, 1, 8, 8, '2024-10-17 05:58:05', '2024-10-17 05:58:05', NULL),
(9, 2, 1, 1, 9, '2024-10-17 06:02:34', '2024-10-17 06:02:34', NULL),
(10, 2, 1, 2, 10, '2024-10-17 06:02:34', '2024-10-17 06:02:34', NULL),
(11, 2, 1, 3, 11, '2024-10-17 06:02:34', '2024-10-17 06:02:34', NULL),
(12, 2, 1, 4, 12, '2024-10-17 06:02:34', '2024-10-17 06:02:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nv_sleeves`
--

CREATE TABLE `nv_sleeves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sleeve_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_sleeves`
--

INSERT INTO `nv_sleeves` (`id`, `cat_id`, `sub_cat_id`, `sleeve_name`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 'test Sleeve', '2024-10-01 10:35:45', '2024-10-02 04:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `nv_stock_allocations`
--

CREATE TABLE `nv_stock_allocations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nv_store_attachment`
--

CREATE TABLE `nv_store_attachment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED DEFAULT NULL,
  `loi` varchar(255) DEFAULT NULL,
  `agreement` varchar(255) DEFAULT NULL,
  `architecture_draw` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `aadhar_file` varchar(255) DEFAULT NULL,
  `pan_file` varchar(255) DEFAULT NULL,
  `gst_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_store_attachment`
--

INSERT INTO `nv_store_attachment` (`id`, `store_id`, `loi`, `agreement`, `architecture_draw`, `photo`, `aadhar_file`, `pan_file`, `gst_file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 2, '2_loi_1018.jpg', '2_agreement_1018.mp4', '2_loi_1018.jpg', '2_loi_1018.jpg', '2_loi_1018.jpg', '2_loi_1018.jpg', '2_loi_1018.jpg', '2024-10-18 12:28:26', '2024-10-18 12:28:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nv_store_generates`
--

CREATE TABLE `nv_store_generates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_type_id` bigint(20) UNSIGNED NOT NULL,
  `op_date` varchar(255) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `store_code` varchar(255) NOT NULL,
  `store_status` varchar(255) NOT NULL,
  `format` varchar(255) NOT NULL,
  `firm` varchar(255) NOT NULL,
  `gst` varchar(255) NOT NULL,
  `store_phone` varchar(255) NOT NULL,
  `store_email` varchar(255) NOT NULL,
  `store_address_1` varchar(255) NOT NULL,
  `store_address_2` varchar(255) NOT NULL,
  `store_state` varchar(255) NOT NULL,
  `store_city` varchar(255) NOT NULL,
  `store_pincode` varchar(255) NOT NULL,
  `store_area` varchar(255) NOT NULL,
  `map_link` varchar(255) DEFAULT NULL,
  `franchise_name` varchar(255) NOT NULL,
  `franchise_phone` int(11) NOT NULL,
  `franchise_email` varchar(255) NOT NULL,
  `datanote_name` varchar(255) NOT NULL,
  `seller_ware_1` varchar(255) NOT NULL,
  `seller_ware_2` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_store_generates`
--

INSERT INTO `nv_store_generates` (`id`, `store_type_id`, `op_date`, `store_name`, `store_code`, `store_status`, `format`, `firm`, `gst`, `store_phone`, `store_email`, `store_address_1`, `store_address_2`, `store_state`, `store_city`, `store_pincode`, `store_area`, `map_link`, `franchise_name`, `franchise_phone`, `franchise_email`, `datanote_name`, `seller_ware_1`, `seller_ware_2`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, '2024-10-22', 'Rishi', '1', '1', '1', '111', '1', '1', '1', '1', '1', 'Andra Pradesh', '1', '1', '1', '1', '1', 1, 'y@gmail.com', '1', '1', '1', '2024-10-17 11:29:43', '2024-10-17 11:29:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nv_store_types`
--

CREATE TABLE `nv_store_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_store_types`
--

INSERT INTO `nv_store_types` (`id`, `store_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'FOFO', '2024-10-09 07:49:37', '2024-10-09 07:49:37', NULL),
(2, 'test store', '2024-10-10 05:45:10', '2024-10-10 05:45:10', NULL),
(3, 'test store45', '2024-10-11 08:30:05', '2024-10-11 08:30:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nv_sub_categories`
--

CREATE TABLE `nv_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_sub_categories`
--

INSERT INTO `nv_sub_categories` (`id`, `cat_id`, `name`, `created_at`, `updated_at`) VALUES
(2, 6, 'Test113', '2024-09-19 12:31:59', '2024-10-05 05:32:04'),
(3, 6, 'Test12', '2024-09-19 12:31:59', '2024-10-05 05:32:04'),
(4, 7, 'wes2', '2024-09-20 08:58:28', '2024-09-25 07:20:14'),
(5, 7, 'wes2', '2024-09-20 10:38:21', '2024-09-25 07:20:14'),
(6, 7, 'wes26', '2024-09-20 10:38:28', '2024-09-25 07:20:14'),
(16, 15, 'Test', '2024-10-05 05:12:54', '2024-10-05 05:12:54'),
(17, 15, 'Test1', '2024-10-05 05:12:54', '2024-10-05 05:12:54'),
(18, 16, 'Dress', '2024-10-05 08:51:40', '2024-10-05 08:53:49'),
(19, 16, 'Kurta set', '2024-10-05 08:51:40', '2024-10-05 08:53:49'),
(20, 16, 'Top & Tunic', '2024-10-05 08:51:40', '2024-10-05 08:53:49'),
(21, 16, 'salvar', '2024-10-05 08:51:40', '2024-10-05 08:53:49'),
(22, 16, 'Co-Ord', '2024-10-05 08:51:40', '2024-10-05 08:53:49'),
(23, 16, 'Jump Suit', '2024-10-05 08:51:40', '2024-10-05 08:53:49'),
(24, 16, 'Choli', '2024-10-05 08:51:40', '2024-10-05 08:53:49'),
(25, 16, 'Co-Ord set', '2024-10-05 08:51:40', '2024-10-05 08:53:49'),
(26, 16, 'Co-Ords', '2024-10-05 08:51:40', '2024-10-05 08:53:49'),
(27, 16, 'Gown', '2024-10-05 08:51:40', '2024-10-05 08:53:49'),
(28, 16, 'Kurti', '2024-10-05 08:53:49', '2024-10-05 08:53:49'),
(29, 17, 'test34', '2024-10-22 12:31:02', '2024-10-22 12:31:02');

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
(3, 'Basic', '2024-09-19 05:35:55', '2024-10-05 08:59:30', NULL),
(4, 'tags5', '2024-09-19 05:36:51', '2024-09-19 05:36:51', NULL),
(6, 'testing Tags1', '2024-10-05 05:00:03', '2024-10-05 05:03:55', NULL),
(7, 'Fashion', '2024-10-05 08:59:07', '2024-10-05 08:59:07', NULL),
(8, 'NOS', '2024-10-05 08:59:19', '2024-10-05 08:59:19', NULL);

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
(1, 'Miss Josefina Gaylord PhD', NULL, 'test@example.com', '2024-09-17 07:25:26', '$2y$12$Uws6a2mMPRKZ97Yo91AtsuyTIQh5QF8rAgcoiMAC6VuFyjhwZZF1K', 'Super Admin', 1, 'GP93EAZWw8aNZD7PU6igSbdYavZluirE2xkKauDNrTcU0fvWUMNP1WrzL9jP', '2024-09-17 07:25:26', '2024-09-17 07:25:26', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Althea Thiel', NULL, 'thelma87@example.com', '2024-09-17 07:25:26', '$2y$12$Uws6a2mMPRKZ97Yo91AtsuyTIQh5QF8rAgcoiMAC6VuFyjhwZZF1K', 'Faculty', 1, 'yY8HnfMUMy', '2024-09-17 07:25:26', '2024-09-17 07:25:26', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Prof. Jaqueline Heller II', NULL, 'hayes.effie@example.org', '2024-09-17 07:25:26', '$2y$12$Uws6a2mMPRKZ97Yo91AtsuyTIQh5QF8rAgcoiMAC6VuFyjhwZZF1K', 'Super Admin', 1, 'yCSOHiKyLx', '2024-09-17 07:25:26', '2024-09-17 07:25:26', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Kian Tremblay', NULL, 'dubuque.norval@example.org', '2024-09-17 07:25:26', '$2y$12$Uws6a2mMPRKZ97Yo91AtsuyTIQh5QF8rAgcoiMAC6VuFyjhwZZF1K', 'Student', 1, 'HYJfsaoOjH', '2024-09-17 07:25:26', '2024-09-17 07:25:26', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Tyree Rosenbaum', NULL, 'hill.sabryna@example.org', '2024-09-17 07:25:26', '$2y$12$Uws6a2mMPRKZ97Yo91AtsuyTIQh5QF8rAgcoiMAC6VuFyjhwZZF1K', 'Admin', 1, '2lTc58f2Rs', '2024-09-17 07:25:26', '2024-09-17 07:25:26', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Sigrid Braun', NULL, 'andre12@example.net', '2024-09-17 07:25:26', '$2y$12$Uws6a2mMPRKZ97Yo91AtsuyTIQh5QF8rAgcoiMAC6VuFyjhwZZF1K', 'Student Department', 1, '8plhyjhyUF', '2024-09-17 07:25:26', '2024-09-17 07:25:26', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Rishi', 123456, 'rishi12@gmail.com', NULL, NULL, 'Vendor', 1, NULL, '2024-09-26 05:48:42', '2024-09-26 07:36:02', NULL, 'Riship', NULL, NULL, NULL, NULL),
(18, 'horizon@gmail.com', NULL, 'horizon@gmail.com', NULL, '$2y$12$.Ll8omPkQxoGBkqlENJmBe2u2AYagbtatJmv4eAavTP0dQX87w8vy', 'Super Admin', 1, NULL, '2024-10-11 04:52:03', '2024-10-11 04:52:03', NULL, NULL, NULL, NULL, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `nv_warehouse_inventories`
--

CREATE TABLE `nv_warehouse_inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `sku_id` bigint(20) UNSIGNED NOT NULL,
  `good_inventory` varchar(255) DEFAULT NULL,
  `bad_inventory` varchar(255) DEFAULT NULL,
  `block_inventory` varchar(255) DEFAULT NULL,
  `total_inventory` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_warehouse_inventories`
--

INSERT INTO `nv_warehouse_inventories` (`id`, `warehouse_id`, `product_id`, `sku_id`, `good_inventory`, `bad_inventory`, `block_inventory`, `total_inventory`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 7, 12, '4', NULL, NULL, '4', '2024-10-08 10:48:00', '2024-10-11 08:42:21', NULL),
(2, 1, 8, 16, '377', '12', '12', '377', '2024-10-09 06:03:00', '2024-10-23 08:33:41', NULL),
(3, 2, 7, 13, '110', NULL, NULL, '110', '2024-10-09 06:09:19', '2024-10-11 08:44:34', NULL),
(4, 2, 8, 17, '55', NULL, NULL, '55', '2024-10-16 06:51:20', '2024-10-16 06:51:20', NULL),
(5, 1, 22, 21, '51', NULL, NULL, '51', '2024-10-22 06:14:58', '2024-10-23 08:30:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nv_warehouse_stock_ins`
--

CREATE TABLE `nv_warehouse_stock_ins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sku_id` bigint(20) UNSIGNED NOT NULL,
  `po_id` bigint(20) UNSIGNED DEFAULT NULL,
  `barcode_number` varchar(255) DEFAULT NULL,
  `scan_quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_warehouse_stock_ins`
--

INSERT INTO `nv_warehouse_stock_ins` (`id`, `date`, `user_id`, `sku_id`, `po_id`, `barcode_number`, `scan_quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2024-10-08', 1, 12, NULL, '23m', NULL, '2024-10-08 10:55:58', '2024-10-08 10:55:58', NULL),
(9, '2024-10-09', 1, 16, NULL, '45M', NULL, '2024-10-09 06:03:00', '2024-10-09 06:03:00', NULL),
(12, '2024-10-09', 1, 16, NULL, '45M', 50, '2024-10-09 06:08:02', '2024-10-09 06:08:02', NULL),
(13, '2024-10-09', 1, 16, NULL, '45M', 50, '2024-10-09 06:08:48', '2024-10-09 06:08:48', NULL),
(14, '2024-10-09', 1, 16, NULL, '45M', 50, '2024-10-09 06:09:19', '2024-10-09 06:09:19', NULL),
(15, '2024-10-09', 1, 13, NULL, 'L34', 55, '2024-10-09 06:09:19', '2024-10-09 06:09:19', NULL),
(16, '2024-10-11', 1, 12, NULL, '23m', 1, '2024-10-11 08:42:21', '2024-10-11 08:42:21', NULL),
(17, '2024-10-11', 1, 13, NULL, 'L34', 55, '2024-10-11 08:44:34', '2024-10-11 08:44:34', NULL),
(18, '2024-10-11', 1, 16, NULL, '45M', 58, '2024-10-11 08:44:34', '2024-10-11 08:44:34', NULL),
(19, '2024-10-16', 1, 14, NULL, '26M', 55, '2024-10-16 06:51:20', '2024-10-16 06:51:20', NULL),
(20, '2024-10-16', 1, 16, NULL, '45M', 60, '2024-10-16 08:51:46', '2024-10-16 08:51:46', NULL),
(21, '2024-10-16', 1, 16, NULL, '45M', 60, '2024-10-16 09:19:55', '2024-10-16 09:19:55', NULL),
(22, '2024-10-16', 1, 16, NULL, '45M', 60, '2024-10-16 09:20:35', '2024-10-16 09:20:35', NULL),
(23, '2024-10-16', 1, 16, NULL, '45M', 32, '2024-10-16 09:20:35', '2024-10-16 09:20:35', NULL),
(28, '2024-10-19', 1, 16, NULL, NULL, 60, '2024-10-19 07:57:25', '2024-10-19 07:57:25', NULL),
(29, '2024-10-19', 1, 16, NULL, NULL, 32, '2024-10-19 07:57:25', '2024-10-19 07:57:25', NULL),
(30, '2024-10-22', 1, 21, NULL, '4589sm', 50, '2024-10-22 06:14:58', '2024-10-22 06:14:58', NULL),
(31, '2024-10-23', 1, 21, NULL, '4589sm', 1, '2024-10-23 08:30:59', '2024-10-23 08:30:59', NULL),
(32, '2024-10-23', 1, 16, NULL, '45M', 8, '2024-10-23 08:33:41', '2024-10-23 08:33:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nv_barcodes`
--
ALTER TABLE `nv_barcodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_barcodes_product_id_foreign` (`product_id`),
  ADD KEY `nv_barcodes_user_id_foreign` (`user_id`);

--
-- Indexes for table `nv_barcode_items`
--
ALTER TABLE `nv_barcode_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_barcode_items_barcode_id_foreign` (`barcode_id`),
  ADD KEY `nv_barcode_items_sku_id_foreign` (`sku_id`),
  ADD KEY `nv_barcode_items_user_id_foreign` (`user_id`);

--
-- Indexes for table `nv_base_stock_categories`
--
ALTER TABLE `nv_base_stock_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_base_stock_categories_store_id_foreign` (`store_id`),
  ADD KEY `nv_base_stock_categories_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `nv_base_stock_sizes`
--
ALTER TABLE `nv_base_stock_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_base_stock_sizes_base_stock_cat_id_foreign` (`base_stock_cat_id`);

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
-- Indexes for table `nv_central_warehouses`
--
ALTER TABLE `nv_central_warehouses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_central_warehouses_company_id_foreign` (`company_id`);

--
-- Indexes for table `nv_colors`
--
ALTER TABLE `nv_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nv_commercial`
--
ALTER TABLE `nv_commercial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_commercial_store_id_foreign` (`store_id`);

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
-- Indexes for table `nv_fits`
--
ALTER TABLE `nv_fits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_fits_cat_id_foreign` (`cat_id`),
  ADD KEY `nv_fits_sub_cat_id_foreign` (`sub_cat_id`);

--
-- Indexes for table `nv_inventory_detail`
--
ALTER TABLE `nv_inventory_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_inventory_detail_store_id_foreign` (`store_id`);

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
  ADD KEY `nv_products_slim_id_foreign` (`slim_id`),
  ADD KEY `nv_products_brand_id_foreign` (`brand_id`),
  ADD KEY `nv_products_cat_id_foreign` (`cat_id`),
  ADD KEY `nv_products_fit_id_foreign` (`fit_id`),
  ADD KEY `nv_products_season_id_foreign` (`season_id`),
  ADD KEY `nv_products_sub_cat_id_foreign` (`sub_cat_id`);

--
-- Indexes for table `nv_product_variants`
--
ALTER TABLE `nv_product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_product_variants_product_id_foreign` (`product_id`);

--
-- Indexes for table `nv_purchase_orders`
--
ALTER TABLE `nv_purchase_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_purchase_orders_company_id_foreign` (`company_id`),
  ADD KEY `nv_purchase_orders_company_shipping_id_foreign` (`company_shipping_id`),
  ADD KEY `nv_purchase_orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `nv_purchase_order_items`
--
ALTER TABLE `nv_purchase_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_purchase_order_items_po_id_foreign` (`po_id`),
  ADD KEY `nv_purchase_order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `nv_purchase_order_item_parameters`
--
ALTER TABLE `nv_purchase_order_item_parameters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_purchase_order_item_parameters_po_id_foreign` (`po_id`),
  ADD KEY `nv_purchase_order_item_parameters_po_item_id_foreign` (`po_item_id`);

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
-- Indexes for table `nv_shelf_relations`
--
ALTER TABLE `nv_shelf_relations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_shelf_relations_product_id_foreign` (`product_id`),
  ADD KEY `nv_shelf_relations_shelf_id_foreign` (`shelf_id`);

--
-- Indexes for table `nv_shelves`
--
ALTER TABLE `nv_shelves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_shelves_warehouse_id_foreign` (`warehouse_id`);

--
-- Indexes for table `nv_sleeves`
--
ALTER TABLE `nv_sleeves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_sleeves_cat_id_foreign` (`cat_id`),
  ADD KEY `nv_sleeves_sub_cat_id_foreign` (`sub_cat_id`);

--
-- Indexes for table `nv_stock_allocations`
--
ALTER TABLE `nv_stock_allocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nv_store_attachment`
--
ALTER TABLE `nv_store_attachment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_store_attachment_store_id_foreign` (`store_id`);

--
-- Indexes for table `nv_store_generates`
--
ALTER TABLE `nv_store_generates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nv_store_generates_store_code_unique` (`store_code`),
  ADD KEY `nv_store_generates_store_type_id_foreign` (`store_type_id`);

--
-- Indexes for table `nv_store_types`
--
ALTER TABLE `nv_store_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nv_sub_categories`
--
ALTER TABLE `nv_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_sub_categories_catid_foreign` (`cat_id`);

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
-- Indexes for table `nv_warehouse_inventories`
--
ALTER TABLE `nv_warehouse_inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_warehouse_inventories_warehouse_id_foreign` (`warehouse_id`);

--
-- Indexes for table `nv_warehouse_stock_ins`
--
ALTER TABLE `nv_warehouse_stock_ins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nv_warehouse_stock_ins_user_id_foreign` (`user_id`),
  ADD KEY `nv_warehouse_stock_ins_sku_id_foreign` (`sku_id`),
  ADD KEY `nv_warehouse_stock_ins_po_id_foreign` (`po_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nv_barcodes`
--
ALTER TABLE `nv_barcodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nv_barcode_items`
--
ALTER TABLE `nv_barcode_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nv_base_stock_categories`
--
ALTER TABLE `nv_base_stock_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nv_base_stock_sizes`
--
ALTER TABLE `nv_base_stock_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nv_brands`
--
ALTER TABLE `nv_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nv_categories`
--
ALTER TABLE `nv_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nv_central_warehouses`
--
ALTER TABLE `nv_central_warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nv_colors`
--
ALTER TABLE `nv_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nv_commercial`
--
ALTER TABLE `nv_commercial`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nv_companies`
--
ALTER TABLE `nv_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nv_company_ship_addresses`
--
ALTER TABLE `nv_company_ship_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `nv_fits`
--
ALTER TABLE `nv_fits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nv_inventory_detail`
--
ALTER TABLE `nv_inventory_detail`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `nv_products`
--
ALTER TABLE `nv_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `nv_product_variants`
--
ALTER TABLE `nv_product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `nv_purchase_orders`
--
ALTER TABLE `nv_purchase_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nv_purchase_order_items`
--
ALTER TABLE `nv_purchase_order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nv_purchase_order_item_parameters`
--
ALTER TABLE `nv_purchase_order_item_parameters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nv_seasons`
--
ALTER TABLE `nv_seasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nv_shelf_relations`
--
ALTER TABLE `nv_shelf_relations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nv_shelves`
--
ALTER TABLE `nv_shelves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nv_sleeves`
--
ALTER TABLE `nv_sleeves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nv_stock_allocations`
--
ALTER TABLE `nv_stock_allocations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nv_store_attachment`
--
ALTER TABLE `nv_store_attachment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nv_store_generates`
--
ALTER TABLE `nv_store_generates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nv_store_types`
--
ALTER TABLE `nv_store_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nv_sub_categories`
--
ALTER TABLE `nv_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `nv_tags`
--
ALTER TABLE `nv_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nv_users`
--
ALTER TABLE `nv_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
-- AUTO_INCREMENT for table `nv_warehouse_inventories`
--
ALTER TABLE `nv_warehouse_inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nv_warehouse_stock_ins`
--
ALTER TABLE `nv_warehouse_stock_ins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nv_barcodes`
--
ALTER TABLE `nv_barcodes`
  ADD CONSTRAINT `nv_barcodes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `nv_products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nv_barcodes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `nv_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_barcode_items`
--
ALTER TABLE `nv_barcode_items`
  ADD CONSTRAINT `nv_barcode_items_barcode_id_foreign` FOREIGN KEY (`barcode_id`) REFERENCES `nv_barcodes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nv_barcode_items_sku_id_foreign` FOREIGN KEY (`sku_id`) REFERENCES `nv_product_variants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nv_barcode_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `nv_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_base_stock_categories`
--
ALTER TABLE `nv_base_stock_categories`
  ADD CONSTRAINT `nv_base_stock_categories_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `nv_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nv_base_stock_categories_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `nv_store_generates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_base_stock_sizes`
--
ALTER TABLE `nv_base_stock_sizes`
  ADD CONSTRAINT `nv_base_stock_sizes_base_stock_cat_id_foreign` FOREIGN KEY (`base_stock_cat_id`) REFERENCES `nv_base_stock_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_central_warehouses`
--
ALTER TABLE `nv_central_warehouses`
  ADD CONSTRAINT `nv_central_warehouses_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `nv_companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_commercial`
--
ALTER TABLE `nv_commercial`
  ADD CONSTRAINT `nv_commercial_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `nv_store_generates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_company_ship_addresses`
--
ALTER TABLE `nv_company_ship_addresses`
  ADD CONSTRAINT `nv_company_ship_addresses_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `nv_companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_fits`
--
ALTER TABLE `nv_fits`
  ADD CONSTRAINT `nv_fits_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `nv_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nv_fits_sub_cat_id_foreign` FOREIGN KEY (`sub_cat_id`) REFERENCES `nv_sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_inventory_detail`
--
ALTER TABLE `nv_inventory_detail`
  ADD CONSTRAINT `nv_inventory_detail_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `nv_store_generates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_products`
--
ALTER TABLE `nv_products`
  ADD CONSTRAINT `nv_products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `nv_brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nv_products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `nv_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nv_products_fit_id_foreign` FOREIGN KEY (`fit_id`) REFERENCES `nv_fits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nv_products_season_id_foreign` FOREIGN KEY (`season_id`) REFERENCES `nv_seasons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nv_products_sub_cat_id_foreign` FOREIGN KEY (`sub_cat_id`) REFERENCES `nv_sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_product_variants`
--
ALTER TABLE `nv_product_variants`
  ADD CONSTRAINT `nv_product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `nv_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_purchase_orders`
--
ALTER TABLE `nv_purchase_orders`
  ADD CONSTRAINT `nv_purchase_orders_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `nv_companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nv_purchase_orders_company_shipping_id_foreign` FOREIGN KEY (`company_shipping_id`) REFERENCES `nv_company_ship_addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nv_purchase_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `nv_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_purchase_order_items`
--
ALTER TABLE `nv_purchase_order_items`
  ADD CONSTRAINT `nv_purchase_order_items_po_id_foreign` FOREIGN KEY (`po_id`) REFERENCES `nv_purchase_orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nv_purchase_order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `nv_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_purchase_order_item_parameters`
--
ALTER TABLE `nv_purchase_order_item_parameters`
  ADD CONSTRAINT `nv_purchase_order_item_parameters_po_id_foreign` FOREIGN KEY (`po_id`) REFERENCES `nv_purchase_orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nv_purchase_order_item_parameters_po_item_id_foreign` FOREIGN KEY (`po_item_id`) REFERENCES `nv_purchase_order_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_shelf_relations`
--
ALTER TABLE `nv_shelf_relations`
  ADD CONSTRAINT `nv_shelf_relations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `nv_products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nv_shelf_relations_shelf_id_foreign` FOREIGN KEY (`shelf_id`) REFERENCES `nv_shelves` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_shelves`
--
ALTER TABLE `nv_shelves`
  ADD CONSTRAINT `nv_shelves_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `nv_central_warehouses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_sleeves`
--
ALTER TABLE `nv_sleeves`
  ADD CONSTRAINT `nv_sleeves_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `nv_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nv_sleeves_sub_cat_id_foreign` FOREIGN KEY (`sub_cat_id`) REFERENCES `nv_sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_store_attachment`
--
ALTER TABLE `nv_store_attachment`
  ADD CONSTRAINT `nv_store_attachment_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `nv_store_generates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_store_generates`
--
ALTER TABLE `nv_store_generates`
  ADD CONSTRAINT `nv_store_generates_store_type_id_foreign` FOREIGN KEY (`store_type_id`) REFERENCES `nv_store_types` (`id`);

--
-- Constraints for table `nv_sub_categories`
--
ALTER TABLE `nv_sub_categories`
  ADD CONSTRAINT `nv_sub_categories_catid_foreign` FOREIGN KEY (`cat_id`) REFERENCES `nv_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_user_addresses`
--
ALTER TABLE `nv_user_addresses`
  ADD CONSTRAINT `nv_user_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `nv_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_user_banks`
--
ALTER TABLE `nv_user_banks`
  ADD CONSTRAINT `nv_user_banks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `nv_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_warehouse_inventories`
--
ALTER TABLE `nv_warehouse_inventories`
  ADD CONSTRAINT `nv_warehouse_inventories_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `nv_central_warehouses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nv_warehouse_stock_ins`
--
ALTER TABLE `nv_warehouse_stock_ins`
  ADD CONSTRAINT `nv_warehouse_stock_ins_po_id_foreign` FOREIGN KEY (`po_id`) REFERENCES `nv_purchase_orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nv_warehouse_stock_ins_sku_id_foreign` FOREIGN KEY (`sku_id`) REFERENCES `nv_product_variants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nv_warehouse_stock_ins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `nv_users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
