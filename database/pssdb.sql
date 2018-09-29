-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 20, 2018 at 11:55 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pssdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `absents`
--

CREATE TABLE `absents` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `add_to_carts`
--

CREATE TABLE `add_to_carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Smartphone', '2018-06-05 10:49:09', '2018-06-05 10:49:09'),
(2, 'Keypad', '2018-06-05 10:49:25', '2018-06-05 10:49:25'),
(3, 'Tablet', '2018-06-05 10:49:34', '2018-06-05 10:49:34'),
(4, 'Battery', '2018-06-05 12:23:37', '2018-06-05 12:23:37'),
(6, 'Charger', '2018-06-13 23:05:51', '2018-06-13 23:05:51'),
(7, 'Power Bank', '2018-06-14 09:11:54', '2018-06-14 09:11:54'),
(8, 'Smartwatch', '2018-06-16 07:07:56', '2018-06-16 07:07:56'),
(9, 'Gearfit', '2018-06-16 23:19:20', '2018-06-16 23:19:20'),
(11, 'Earphone', '2018-06-19 02:29:02', '2018-06-19 02:29:02'),
(12, 'Speaker', '2018-06-19 12:06:01', '2018-06-19 12:06:01'),
(13, 'LCD', '2018-06-19 12:06:05', '2018-06-19 12:06:05'),
(14, 'Bluetooth Speaker', '2018-06-19 20:26:39', '2018-06-19 20:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `category_types`
--

CREATE TABLE `category_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_types`
--

INSERT INTO `category_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Smartphone', '2018-06-12 12:54:52', '2018-06-12 12:59:46'),
(2, 'Keypad', '2018-06-19 11:43:03', '2018-06-19 11:43:03'),
(3, 'Accessory', '2018-06-12 12:55:04', '2018-06-12 12:55:04'),
(4, 'Feature', '2018-06-12 12:55:10', '2018-06-12 12:55:10'),
(5, 'Tablet', '2018-06-12 22:52:08', '2018-06-12 22:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `costs`
--

CREATE TABLE `costs` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `sale_or_service` tinyint(1) NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `costs`
--

INSERT INTO `costs` (`id`, `category_type`, `category`, `brand`, `model`, `color`, `quantity`, `price`, `cost`, `sale_or_service`, `day`, `month_year`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Smartphone', 'Smartphone', 'MI', 'Note 4x', 'Rose Gold', 3, 200000, 600000, 0, '20', 'June 2018', '5b293e4fe5dd8_mi1.png', '2018-06-19 11:03:03', '2018-06-19 11:03:03'),
(2, 'Smartphone', 'Smartphone', 'Honor', 'H7', 'Blue', 3, 300000, 900000, 0, '20', 'June 2018', '5b293f8e1b862_hua.png', '2018-06-19 11:08:22', '2018-06-19 11:08:22'),
(3, 'Smartphone', 'Smartphone', 'Oppo', 'Neo 5', 'Black', 3, 150000, 450000, 0, '20', 'June 2018', '5b293ff46acd3_yoyo_5-500x500.png', '2018-06-19 11:10:04', '2018-06-19 11:10:04'),
(4, 'Smartphone', 'Smartphone', 'Samsung', 'Galaxy J7', 'Blue', 3, 250000, 750000, 0, '20', 'June 2018', '5b29414293556_Samsung-C7-Pro-Front-Back.png', '2018-06-19 11:15:38', '2018-06-19 11:15:38'),
(5, 'Accessory', 'Battery', 'MI', 'Battery 1', 'Black', 3, 5000, 15000, 1, '20', 'June 2018', '5b2943c1c6120_b16.jpg', '2018-06-19 11:26:17', '2018-06-19 11:26:17'),
(6, 'Keypad', 'Keypad', 'Samsung', 'samsung2a', 'Red', 3, 50000, 150000, 0, '20', 'June 2018', '5b294905cb425_redf1.png', '2018-06-19 11:48:45', '2018-06-19 11:48:45'),
(7, 'Keypad', 'Keypad', 'Nokia', 'nokia2n', 'Grey', 3, 50000, 150000, 0, '20', 'June 2018', '5b2949d1ddbca_nokia.png', '2018-06-19 11:52:09', '2018-06-19 11:52:09'),
(8, 'Keypad', 'Keypad', 'ZTE', 'zte2z', 'Black', 3, 50000, 150000, 0, '20', 'June 2018', '5b294a4817fa2_kf1.png', '2018-06-19 11:54:08', '2018-06-19 11:54:08'),
(9, 'Keypad', 'Keypad', 'JCB', 'jcb2j', 'White', 3, 50000, 150000, 0, '20', 'June 2018', '5b294adf718bf_kf3.png', '2018-06-19 11:56:39', '2018-06-19 11:56:39'),
(10, 'Accessory', 'LCD', 'MI', 'mi2lcd', 'Black', 3, 50000, 150000, 1, '20', 'June 2018', '5b294e0e65239_lcd.jpg', '2018-06-19 12:10:14', '2018-06-19 12:10:14'),
(11, 'Accessory', 'Battery', 'Huawei', 'huawei2battery', 'Black', 3, 7000, 21000, 1, '20', 'June 2018', '5b294ec25cc1f_b8.jpg', '2018-06-19 12:13:14', '2018-06-19 12:13:14'),
(12, 'Accessory', 'Speaker', 'Samsung', 'samsung2speaker', 'Black', 3, 8000, 24000, 1, '20', 'June 2018', '5b294f2b6c664_speaker1.jpg', '2018-06-19 12:14:59', '2018-06-19 12:14:59'),
(17, 'Accessory', 'Power Bank', 'MI', 'mi2pb', 'Brown', 3, 10000, 30000, 0, '20', 'June 2018', '5b29c139cf889_p8.jpeg', '2018-06-19 20:21:37', '2018-06-19 20:21:37'),
(18, 'Accessory', 'Power Bank', 'Huawei', 'huawei2pb', 'Green', 3, 10000, 30000, 0, '20', 'June 2018', '5b29c18d80d28_p6.jpeg', '2018-06-19 20:23:01', '2018-06-19 20:23:01'),
(19, 'Accessory', 'Power Bank', 'Samsung', 'samsung2pb', 'Blue', 3, 10000, 30000, 0, '20', 'June 2018', '5b29c1e9e148f_p9.jpeg', '2018-06-19 20:24:33', '2018-06-19 20:24:33'),
(21, 'Accessory', 'Bluetooth Speaker', 'MI', 'mi2bs', 'Purple', 3, 8000, 24000, 0, '20', 'June 2018', '5b29c34bed8a1_bs9.jpeg', '2018-06-19 20:30:27', '2018-06-19 20:30:27'),
(22, 'Accessory', 'Bluetooth Speaker', 'Huawei', 'huawei2bs', 'Red', 3, 9000, 27000, 0, '20', 'June 2018', '5b29c38a7de80_bs6.jpeg', '2018-06-19 20:31:30', '2018-06-19 20:31:30'),
(23, 'Accessory', 'Bluetooth Speaker', 'Samsung', 'samsung2bs', 'Black', 3, 10000, 30000, 0, '20', 'June 2018', '5b29c3d27609f_bs.jpeg', '2018-06-19 20:32:42', '2018-06-19 20:32:42'),
(24, 'Feature', 'Smartwatch', 'MI', 'mi2sw', 'Black', 3, 50000, 150000, 0, '20', 'June 2018', '5b29c72b43ee9_smw2.jpg', '2018-06-19 20:46:59', '2018-06-19 20:46:59'),
(25, 'Feature', 'Smartwatch', 'Huawei', 'huawei2sw', 'Green', 3, 40000, 120000, 0, '20', 'June 2018', '5b29c76d84b9b_smw1.png', '2018-06-19 20:48:05', '2018-06-19 20:48:05'),
(26, 'Feature', 'Smartwatch', 'Samsung', 'samsung2sw', 'Brown', 3, 60000, 180000, 0, '20', 'June 2018', '5b29c7ba83d30_516cEX6KWPL.jpg', '2018-06-19 20:49:22', '2018-06-19 20:49:22'),
(27, 'Feature', 'Gearfit', 'MI', 'mi2gf', 'Pink', 3, 50000, 150000, 0, '20', 'June 2018', '5b29c8547b251_Huawei-Honor-Z1-Smart-Watches-SDL348689156-1-6ed54-500x500.png', '2018-06-19 20:51:56', '2018-06-19 20:51:56'),
(28, 'Feature', 'Gearfit', 'Huawei', 'huawei2gf', 'Brown', 3, 50000, 150000, 0, '20', 'June 2018', '5b29c8982b3fc_sgearf1.jpg', '2018-06-19 20:53:04', '2018-06-19 20:53:04'),
(29, 'Feature', 'Gearfit', 'Samsung', 'samsung2gf', 'Red', 3, 50000, 150000, 0, '20', 'June 2018', '5b29c8e0e3e0c_GalleryImageR_01.jpeg', '2018-06-19 20:54:16', '2018-06-19 20:54:16'),
(30, 'Tablet', 'Tablet', 'MI', 'mi2tablet', 'Rose Gold', 3, 100000, 300000, 0, '20', 'June 2018', '5b29d111305fd_Xiaomi-Mi-Pad-3-I.jpg', '2018-06-19 21:29:13', '2018-06-19 21:29:13'),
(31, 'Tablet', 'Tablet', 'Huawei', 'huawei2tablet', 'Grey', 3, 80000, 240000, 0, '20', 'June 2018', '5b29d1948af2d_huaweimediam3lite10_tablet_white.jpg', '2018-06-19 21:31:24', '2018-06-19 21:31:24'),
(32, 'Tablet', 'Tablet', 'Samsung', 'samsung2tablet', 'White', 3, 90000, 270000, 0, '20', 'June 2018', '5b29d1e24990b_0fbea5afdca363c4abf9c871b1fd07da.jpg', '2018-06-19 21:32:42', '2018-06-19 21:32:42'),
(33, 'Smartphone', 'Smartphone', 'Meizu', 'meizu2m', 'Black', 3, 250000, 750000, 0, '21', 'May 2018', '5b010a8ee336c_768135-meizu-m3-max-3d.png', '2018-05-19 23:11:34', '2018-05-19 23:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `customer_services`
--

CREATE TABLE `customer_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `error` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `accessory_name` json NOT NULL,
  `accessory_model_no` json NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_services`
--

INSERT INTO `customer_services` (`id`, `name`, `brand_id`, `model_id`, `error`, `accessory_name`, `accessory_model_no`, `day`, `month_year`, `phone_no`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Aye Aye Nwe', 1, 1, 'Battery', '["1"]', '["1"]', '19', 'June 2018', '09452337012', 7000, '2018-06-19 11:29:15', '2018-06-19 11:29:15'),
(2, 'Hnin Nu Wai', 2, 10, 'Battery', '["1"]', '["3"]', '19', 'June 2018', '09452337010', 9000, '2018-06-19 12:18:19', '2018-06-19 12:18:19'),
(3, 'Shwe Yee Moe Oo', 1, 1, 'LCD', '["2"]', '["2"]', '19', 'June 2018', '09452337018', 70000, '2018-06-19 12:20:10', '2018-06-19 12:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sale Department', '2018-06-09 21:05:03', '2018-06-09 21:17:23'),
(2, 'Technical Department', '2018-06-09 23:33:37', '2018-06-09 23:33:37');

-- --------------------------------------------------------

--
-- Table structure for table `done_sales`
--

CREATE TABLE `done_sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `done_sales`
--

INSERT INTO `done_sales` (`id`, `name`, `email`, `category_type`, `category`, `brand`, `model`, `color`, `quantity`, `price`, `image`, `day`, `month_year`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin123@gmail.com', 'Smartphone', 'Smartphone', 'Samsung', 'Galaxy J7', 'Blue', 1, 280000, '5b29414293556_Samsung-C7-Pro-Front-Back.png', '20', 'June 2018', '2018-06-19 22:40:11', '2018-06-19 22:40:11'),
(2, 'John Smith', 'johnsmith@gmail.com', 'Smartphone', 'Smartphone', 'Meizu', 'meizu2m', 'Black', 1, 300000, '5b010a8ee336c_768135-meizu-m3-max-3d.png', '20', 'May 2018', '2018-05-20 00:04:10', '2018-05-20 00:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nrc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `image`, `name`, `nrc`, `account_no`, `department_id`, `status_id`, `gender`, `dob`, `email`, `phone_no`, `address`, `start_date`, `created_at`, `updated_at`) VALUES
(5, '5b28b940ca868_user8-128x128.jpg', 'Kyaw Kyaw', '7/YTN(N)-129691', '2345567823454567', 2, 2, 0, '2016-01-03', 'kyawkyaw@gmail.com', '09452337012', 'Pyay', '2017-01-01', '2018-06-19 01:35:20', '2018-06-19 01:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salaries`
--

CREATE TABLE `employee_salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `salary` int(11) NOT NULL,
  `month_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featured_details`
--

CREATE TABLE `featured_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `featured_details`
--

INSERT INTO `featured_details` (`id`, `category`, `brand`, `model`, `image`, `color`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Keypad', 'Samsung', 'samsung2a', '5b294945b8546_redf1.png', 'Red', 70000, '2018-06-19 11:49:49', '2018-06-19 11:49:49'),
(2, 'Keypad', 'Nokia', 'nokia2n', '5b2949ef92138_nokia.png', 'Grey', 70000, '2018-06-19 11:52:39', '2018-06-19 11:52:39'),
(3, 'Keypad', 'ZTE', 'zte2z', '5b294a60e2dbf_kf1.png', 'Black', 70000, '2018-06-19 11:54:32', '2018-06-19 11:54:32'),
(4, 'Keypad', 'JCB', 'jcb2j', '5b294b2289c32_kf3.png', 'White', 70000, '2018-06-19 11:57:46', '2018-06-19 11:57:46'),
(8, 'Power Bank', 'MI', 'mi2pb', '5b29c152a1ef6_p8.jpeg', 'Brown', 13000, '2018-06-19 20:22:02', '2018-06-19 20:22:02'),
(9, 'Power Bank', 'Huawei', 'huawei2pb', '5b29c1a59b916_p6.jpeg', 'Green', 13000, '2018-06-19 20:23:25', '2018-06-19 20:23:25'),
(10, 'Power Bank', 'Samsung', 'samsung2pb', '5b29c20590c20_p9.jpeg', 'Blue', 13000, '2018-06-19 20:25:01', '2018-06-19 20:25:01'),
(11, 'Bluetooth Speaker', 'MI', 'mi2bs', '5b29c36779831_bs9.jpeg', 'Purple', 10000, '2018-06-19 20:30:55', '2018-06-19 20:30:55'),
(12, 'Bluetooth Speaker', 'Huawei', 'huawei2bs', '5b29c3a4564fa_bs6.jpeg', 'Red', 12000, '2018-06-19 20:31:56', '2018-06-19 20:31:56'),
(13, 'Bluetooth Speaker', 'Samsung', 'samsung2bs', '5b29c3edb5ab7_bs.jpeg', 'Black', 13000, '2018-06-19 20:33:09', '2018-06-19 20:33:09'),
(14, 'Smartwatch', 'MI', 'mi2sw', '5b29c74385533_smw2.jpg', 'Black', 55000, '2018-06-19 20:47:23', '2018-06-19 20:47:23'),
(15, 'Smartwatch', 'Huawei', 'huawei2sw', '5b29c78620e8a_smw1.png', 'Green', 45000, '2018-06-19 20:48:30', '2018-06-19 20:48:30'),
(16, 'Smartwatch', 'Samsung', 'samsung2sw', '5b29c7dd17ba4_516cEX6KWPL.jpg', 'Brown', 65000, '2018-06-19 20:49:57', '2018-06-19 20:49:57'),
(17, 'Gearfit', 'MI', 'mi2gf', '5b29c86d56ef0_Huawei-Honor-Z1-Smart-Watches-SDL348689156-1-6ed54-500x500.png', 'Pink', 55000, '2018-06-19 20:52:21', '2018-06-19 20:52:21'),
(18, 'Gearfit', 'Huawei', 'huawei2gf', '5b29c8af94f5a_sgearf1.jpg', 'Brown', 55000, '2018-06-19 20:53:27', '2018-06-19 20:53:27'),
(19, 'Gearfit', 'Samsung', 'samsung2gf', '5b29c8f9a7de2_GalleryImageR_01.jpeg', 'Red', 55000, '2018-06-19 20:54:41', '2018-06-19 20:54:41'),
(20, 'Tablet', 'Huawei', 'huawei2tablet', '5b29d1b00dfad_huaweimediam3lite10_tablet_white.jpg', 'Grey', 100000, '2018-06-19 21:31:52', '2018-06-19 21:31:52');

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
(103, '2014_10_12_100000_create_password_resets_table', 1),
(105, '2018_04_24_181134_create_phone_brands_table', 1),
(132, '2018_05_16_072129_create_phone_brands_table', 2),
(165, '2018_05_21_182936_create_phone_brands_table', 4),
(166, '2018_05_16_072328_create_phone_models_table', 5),
(167, '2018_05_16_072832_create_phone_details_table', 6),
(168, '2018_05_16_082254_create_service_models_table', 7),
(170, '2018_05_16_082658_create_customer_services_table', 9),
(194, '2018_06_02_063708_create_phone_details_table', 13),
(205, '2018_06_02_064521_create_costs_table', 15),
(207, '2018_06_02_070134_create_sale_products_table', 15),
(209, '2018_06_02_162841_create_costs_table', 16),
(228, '2014_10_12_000000_create_users_table', 17),
(229, '2018_04_21_190138_create_roles_table', 17),
(230, '2018_05_02_100113_create_role_users_table', 17),
(231, '2018_05_22_110605_create_password_resets_table', 17),
(232, '2018_06_05_164547_create_categories_table', 18),
(233, '2018_06_05_164923_create_phone_brands_table', 19),
(234, '2018_06_05_165015_create_sale_models_table', 20),
(235, '2018_06_05_165407_create_service_models_table', 21),
(236, '2018_06_05_165506_create_phone_services_table', 22),
(237, '2018_06_05_171008_create_customer_services_table', 23),
(238, '2018_06_05_171129_create_other_costs_table', 24),
(239, '2018_06_05_171255_create_service_products_table', 25),
(240, '2018_06_05_171701_create_phone_details_table', 26),
(241, '2018_06_05_171739_create_sale_products_table', 27),
(242, '2018_06_05_171840_create_costs_table', 28),
(243, '2018_06_05_172742_create_phone_models_table', 29),
(244, '2018_06_05_192214_create_service_products_table', 30),
(247, '2018_06_08_084513_create_add_to_carts_table', 31),
(248, '2018_06_10_030157_create_departments_table', 32),
(249, '2018_06_10_030353_create_statuses_table', 33),
(250, '2018_06_10_030618_create_employees_table', 34),
(251, '2018_06_10_030718_create_salaries_table', 35),
(252, '2018_06_10_031203_create_employee_salaries_table', 36),
(254, '2018_06_10_062404_create_absents_table', 37),
(255, '2018_06_11_071456_create_sale_products_table', 38),
(256, '2018_06_12_183959_create_category_types_table', 39),
(257, '2018_06_12_184108_create_sale_products_table', 40),
(258, '2018_06_12_184314_create_costs_table', 40),
(259, '2018_06_13_110019_create_featured_details_table', 41),
(260, '2018_06_14_055656_create_employee_salaries_table', 42),
(263, '2018_06_14_100941_create_done_sales_table', 43),
(266, '2018_06_18_092116_create_permissions_table', 44),
(267, '2018_06_20_044219_create_done_sales_table', 45);

-- --------------------------------------------------------

--
-- Table structure for table `other_costs`
--

CREATE TABLE `other_costs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `start_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_month_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_month_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_costs`
--

INSERT INTO `other_costs` (`id`, `name`, `price`, `start_day`, `start_month_year`, `expire_day`, `expire_month_year`, `created_at`, `updated_at`) VALUES
(1, 'Seat', 10000, '20', 'May 2018', '20', 'May 2018', '2018-05-20 00:12:45', '2018-05-20 00:12:45');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `permissions` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permissions`, `created_at`, `updated_at`) VALUES
(3, '{"show-salary": true, "show-status": true, "delete-salary": true, "delete-status": true, "show-employee": true, "update-salary": true, "update-status": true, "create-employee": true, "delete-employee": true, "show-department": true, "update-employee": true, "show-doneservice": true, "delete-department": true, "show-employeelist": true, "show-phoneservice": true, "update-department": true, "delete-doneservice": true, "update-doneservice": true, "delete-employeelist": true, "delete-phoneservice": true, "show-employeesalary": true, "show-serviceproduct": true, "update-employeelist": true, "update-phoneservice": true, "delete-employeesalary": true, "delete-serviceproduct": true, "update-employeesalary": true, "update-serviceproduct": true}', '2018-06-18 18:33:22', '2018-06-18 18:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `phone_brands`
--

CREATE TABLE `phone_brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_brands`
--

INSERT INTO `phone_brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'MI', '2018-06-05 10:50:20', '2018-06-05 10:50:20'),
(2, 'Huawei', '2018-06-05 12:02:05', '2018-06-05 12:02:05'),
(8, 'Samsung', '2018-06-07 10:45:47', '2018-06-07 10:45:47'),
(9, 'Oppo', '2018-06-11 00:55:03', '2018-06-11 00:55:03'),
(11, 'Nokia', '2018-06-15 22:10:16', '2018-06-15 22:10:16'),
(14, 'JCB', '2018-06-15 23:27:49', '2018-06-15 23:27:49'),
(15, 'ZTE', '2018-06-19 01:59:01', '2018-06-19 01:59:01'),
(16, 'Honor', '2018-06-19 10:54:36', '2018-06-19 10:54:36'),
(17, 'Meizu', '2018-05-19 23:09:59', '2018-05-19 23:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `phone_details`
--

CREATE TABLE `phone_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `network` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `front_camera` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `back_camera` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `android_version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RAM` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_details`
--

INSERT INTO `phone_details` (`id`, `brand`, `category`, `image`, `model`, `display`, `network`, `connection`, `front_camera`, `back_camera`, `android_version`, `color`, `storage`, `RAM`, `price`, `created_at`, `updated_at`) VALUES
(1, 'MI', 'Smartphone', '5b293eb14d3cb_mi1.png', 'Note 4x', '100x50', '4G', 'Dual', '4MP', '2MP', '6.0.0', 'Rose Gold', '32GB', '4GB', 250000, '2018-06-19 11:04:41', '2018-06-19 11:04:41'),
(2, 'Honor', 'Smartphone', '5b29407d811ee_hua.png', 'H7', '100x50', '4G', 'Dual', '4MP', '2MP', '6.0.0', 'Blue', '32GB', '4GB', 350000, '2018-06-19 11:12:21', '2018-06-19 11:12:21'),
(3, 'Oppo', 'Smartphone', '5b2940c6ef8cd_yoyo_5-500x500.png', 'Neo 5', '100x50', '4G', 'Dual', '4MP', '2MP', '6.0.0', 'Black', '32GB', '4GB', 170000, '2018-06-19 11:13:34', '2018-06-19 11:13:34'),
(4, 'Samsung', 'Smartphone', '5b29416b387a8_Samsung-C7-Pro-Front-Back.png', 'Galaxy J7', '100x50', '4G', 'Dual', '4MP', '2MP', '6.0.0', 'Blue', '32GB', '4GB', 280000, '2018-06-19 11:16:19', '2018-06-19 11:16:19'),
(5, 'MI', 'Tablet', '5b29d16f0dabd_Xiaomi-Mi-Pad-3-I.jpg', 'mi2tablet', '200x100', '4G', 'Dual', '4MP', '2MP', '6.0.0', 'Rose Gold', '32GB', '4GB', 130000, '2018-06-19 21:30:47', '2018-06-19 21:30:47'),
(6, 'Samsung', 'Tablet', '5b29d225a7175_0fbea5afdca363c4abf9c871b1fd07da.jpg', 'samsung2tablet', '200x100', '4G', 'Dual', '4MP', '2MP', '6.0.0', 'White', '32GB', '4GB', 120000, '2018-06-19 21:33:49', '2018-06-19 21:33:49'),
(7, 'Meizu', 'Smartphone', '5b010ac512f70_768135-meizu-m3-max-3d.png', 'meizu2m', '100x50', '4G', 'Dual', '4MP', '2MP', '6.0.0', 'Black', '32GB', '4GB', 300000, '2018-05-19 23:12:29', '2018-05-19 23:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `phone_models`
--

CREATE TABLE `phone_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_models`
--

INSERT INTO `phone_models` (`id`, `category_id`, `brand_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Note 4x', '2018-06-19 11:01:55', '2018-06-19 11:01:55'),
(2, 1, 16, 'H7', '2018-06-19 11:07:15', '2018-06-19 11:07:15'),
(3, 1, 9, 'Neo 5', '2018-06-19 11:08:58', '2018-06-19 11:08:58'),
(4, 1, 8, 'Galaxy S8', '2018-06-19 11:11:01', '2018-06-19 11:11:01'),
(5, 1, 8, 'Galaxy J7', '2018-06-19 11:14:39', '2018-06-19 11:14:39'),
(6, 2, 8, 'samsung2a', '2018-06-19 11:47:09', '2018-06-19 11:47:09'),
(7, 2, 11, 'nokia2n', '2018-06-19 11:50:36', '2018-06-19 11:50:36'),
(8, 2, 15, 'zte2z', '2018-06-19 11:53:15', '2018-06-19 11:53:15'),
(9, 2, 14, 'jcb2j', '2018-06-19 11:55:18', '2018-06-19 11:55:18'),
(10, 13, 1, 'mi2lcd', '2018-06-19 12:07:55', '2018-06-19 12:07:55'),
(11, 4, 2, 'huawei2battery', '2018-06-19 12:12:06', '2018-06-19 12:12:06'),
(12, 12, 8, 'samsung2speaker', '2018-06-19 12:13:59', '2018-06-19 12:13:59'),
(13, 7, 1, 'mi2pb', '2018-06-19 20:09:26', '2018-06-19 20:09:26'),
(14, 7, 2, 'huawei2pb', '2018-06-19 20:11:28', '2018-06-19 20:11:28'),
(15, 7, 8, 'samsung2pb', '2018-06-19 20:13:50', '2018-06-19 20:13:50'),
(16, 14, 1, 'mi2bs', '2018-06-19 20:27:39', '2018-06-19 20:27:39'),
(17, 14, 2, 'huawei2bs', '2018-06-19 20:27:53', '2018-06-19 20:27:53'),
(18, 14, 8, 'samsung2bs', '2018-06-19 20:28:03', '2018-06-19 20:28:03'),
(19, 8, 1, 'mi2sw', '2018-06-19 20:44:43', '2018-06-19 20:44:43'),
(20, 8, 2, 'huawei2sw', '2018-06-19 20:45:12', '2018-06-19 20:45:12'),
(21, 8, 8, 'samsung2sw', '2018-06-19 20:45:36', '2018-06-19 20:45:36'),
(22, 9, 1, 'mi2gf', '2018-06-19 20:50:21', '2018-06-19 20:50:21'),
(23, 9, 2, 'huawei2gf', '2018-06-19 20:50:45', '2018-06-19 20:50:45'),
(24, 9, 8, 'samsung2gf', '2018-06-19 20:51:07', '2018-06-19 20:51:07'),
(25, 3, 1, 'mi2tablet', '2018-06-19 21:25:51', '2018-06-19 21:25:51'),
(26, 3, 2, 'huawei2tablet', '2018-06-19 21:26:52', '2018-06-19 21:26:52'),
(27, 3, 8, 'samsung2tablet', '2018-06-19 21:27:36', '2018-06-19 21:27:36'),
(28, 1, 17, 'meizu2m', '2018-05-19 23:10:28', '2018-05-19 23:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `phone_services`
--

CREATE TABLE `phone_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `error` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `accessory_name` json NOT NULL,
  `accessory_model_no` json NOT NULL,
  `start_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Human Resource', 'human resource', '{"show-salary": "true", "show-status": "true", "delete-salary": "true", "delete-status": "true", "show-employee": "true", "update-salary": "true", "update-status": "true", "delete-employee": "true", "show-department": "true", "update-employee": "true", "delete-department": "true", "show-employeelist": "true", "update-department": "true", "delete-employeelist": "true", "show-employeesalary": "true", "update-employeelist": "true", "delete-employeesalary": "true", "update-employeesalary": "true"}', '2018-06-18 08:01:00', '2018-06-18 08:01:00'),
(2, 'Service Provider', 'service provider', '{"show-doneservice": "true", "show-phoneservice": "true", "delete-doneservice": "true", "update-doneservice": "true", "delete-phoneservice": "true", "show-serviceproduct": "true", "update-phoneservice": "true", "delete-serviceproduct": "true", "update-serviceproduct": "true"}', '2018-06-18 08:03:36', '2018-06-18 08:03:36'),
(3, 'Admin', 'admin', '{"show-salary": "true", "show-status": "true", "delete-salary": "true", "delete-status": "true", "show-employee": "true", "update-salary": "true", "update-status": "true", "create-employee": "true", "delete-employee": "true", "show-department": "true", "update-employee": "true", "show-doneservice": "true", "delete-department": "true", "show-employeelist": "true", "show-phoneservice": "true", "update-department": "true", "delete-doneservice": "true", "update-doneservice": "true", "delete-employeelist": "true", "delete-phoneservice": "true", "show-employeesalary": "true", "show-serviceproduct": "true", "update-employeelist": "true", "update-phoneservice": "true", "delete-employeesalary": "true", "delete-serviceproduct": "true", "update-employeesalary": "true", "update-serviceproduct": "true"}', '2018-06-18 17:02:41', '2018-06-18 17:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 3, 1, NULL, NULL),
(4, 2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `salary` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `department_id`, `status_id`, `salary`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 200000, '2018-06-19 01:36:14', '2018-06-19 01:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `sale_products`
--

CREATE TABLE `sale_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_products`
--

INSERT INTO `sale_products` (`id`, `category_type`, `category`, `brand`, `model`, `color`, `quantity`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Smartphone', 'Smartphone', 'MI', 'Note 4x', 'Rose Gold', 3, '5b293e4fe5dd8_mi1.png', '2018-06-19 11:03:04', '2018-06-19 11:03:04'),
(2, 'Smartphone', 'Smartphone', 'Honor', 'H7', 'Blue', 3, '5b293f8e1b862_hua.png', '2018-06-19 11:08:22', '2018-06-19 11:22:04'),
(3, 'Smartphone', 'Smartphone', 'Oppo', 'Neo 5', 'Black', 3, '5b293ff46acd3_yoyo_5-500x500.png', '2018-06-19 11:10:04', '2018-06-19 11:10:04'),
(4, 'Smartphone', 'Smartphone', 'Samsung', 'Galaxy J7', 'Blue', 2, '5b29414293556_Samsung-C7-Pro-Front-Back.png', '2018-06-19 11:15:38', '2018-06-19 22:40:11'),
(5, 'Keypad', 'Keypad', 'Samsung', 'samsung2a', 'Red', 3, '5b294905cb425_redf1.png', '2018-06-19 11:48:45', '2018-06-19 11:58:47'),
(6, 'Keypad', 'Keypad', 'Nokia', 'nokia2n', 'Grey', 3, '5b2949d1ddbca_nokia.png', '2018-06-19 11:52:09', '2018-06-19 11:52:09'),
(7, 'Keypad', 'Keypad', 'ZTE', 'zte2z', 'Black', 3, '5b294a4817fa2_kf1.png', '2018-06-19 11:54:08', '2018-06-19 11:54:08'),
(8, 'Keypad', 'Keypad', 'JCB', 'jcb2j', 'White', 3, '5b294adf718bf_kf3.png', '2018-06-19 11:56:39', '2018-06-19 11:56:39'),
(13, 'Accessory', 'Power Bank', 'MI', 'mi2pb', 'Brown', 3, '5b29c139cf889_p8.jpeg', '2018-06-19 20:21:37', '2018-06-19 20:21:37'),
(14, 'Accessory', 'Power Bank', 'Huawei', 'huawei2pb', 'Green', 3, '5b29c18d80d28_p6.jpeg', '2018-06-19 20:23:01', '2018-06-19 20:23:01'),
(15, 'Accessory', 'Power Bank', 'Samsung', 'samsung2pb', 'Blue', 3, '5b29c1e9e148f_p9.jpeg', '2018-06-19 20:24:33', '2018-06-19 20:24:33'),
(17, 'Accessory', 'Bluetooth Speaker', 'MI', 'mi2bs', 'Purple', 3, '5b29c34bed8a1_bs9.jpeg', '2018-06-19 20:30:28', '2018-06-19 20:30:28'),
(18, 'Accessory', 'Bluetooth Speaker', 'Huawei', 'huawei2bs', 'Red', 3, '5b29c38a7de80_bs6.jpeg', '2018-06-19 20:31:30', '2018-06-19 20:31:30'),
(19, 'Accessory', 'Bluetooth Speaker', 'Samsung', 'samsung2bs', 'Black', 3, '5b29c3d27609f_bs.jpeg', '2018-06-19 20:32:42', '2018-06-19 20:32:42'),
(20, 'Feature', 'Smartwatch', 'MI', 'mi2sw', 'Black', 3, '5b29c72b43ee9_smw2.jpg', '2018-06-19 20:46:59', '2018-06-19 20:46:59'),
(21, 'Feature', 'Smartwatch', 'Huawei', 'huawei2sw', 'Green', 3, '5b29c76d84b9b_smw1.png', '2018-06-19 20:48:05', '2018-06-19 20:48:05'),
(22, 'Feature', 'Smartwatch', 'Samsung', 'samsung2sw', 'Brown', 3, '5b29c7ba83d30_516cEX6KWPL.jpg', '2018-06-19 20:49:22', '2018-06-19 20:49:22'),
(23, 'Feature', 'Gearfit', 'MI', 'mi2gf', 'Pink', 3, '5b29c8547b251_Huawei-Honor-Z1-Smart-Watches-SDL348689156-1-6ed54-500x500.png', '2018-06-19 20:51:56', '2018-06-19 20:51:56'),
(24, 'Feature', 'Gearfit', 'Huawei', 'huawei2gf', 'Brown', 3, '5b29c8982b3fc_sgearf1.jpg', '2018-06-19 20:53:04', '2018-06-19 20:53:04'),
(25, 'Feature', 'Gearfit', 'Samsung', 'samsung2gf', 'Red', 3, '5b29c8e0e3e0c_GalleryImageR_01.jpeg', '2018-06-19 20:54:17', '2018-06-19 20:54:17'),
(26, 'Tablet', 'Tablet', 'MI', 'mi2tablet', 'Rose Gold', 3, '5b29d111305fd_Xiaomi-Mi-Pad-3-I.jpg', '2018-06-19 21:29:13', '2018-06-19 21:29:13'),
(27, 'Tablet', 'Tablet', 'Huawei', 'huawei2tablet', 'Grey', 3, '5b29d1948af2d_huaweimediam3lite10_tablet_white.jpg', '2018-06-19 21:31:24', '2018-06-19 21:31:24'),
(28, 'Tablet', 'Tablet', 'Samsung', 'samsung2tablet', 'White', 3, '5b29d1e24990b_0fbea5afdca363c4abf9c871b1fd07da.jpg', '2018-06-19 21:32:42', '2018-06-19 21:32:42'),
(29, 'Smartphone', 'Smartphone', 'Meizu', 'meizu2m', 'Black', 2, '5b010a8ee336c_768135-meizu-m3-max-3d.png', '2018-05-19 23:11:35', '2018-05-20 00:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `service_models`
--

CREATE TABLE `service_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_models`
--

INSERT INTO `service_models` (`id`, `brand_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Note 4x', NULL, NULL),
(5, 1, 'Battery 1', NULL, NULL),
(8, 2, 'Battery 2', '2018-06-19 00:33:44', '2018-06-19 00:33:44'),
(9, 9, 'Neo 5', '2018-06-19 00:48:41', '2018-06-19 00:48:41'),
(10, 2, 'P9', '2018-06-19 00:55:07', '2018-06-19 00:55:07'),
(11, 8, 'Galaxy J7', '2018-06-19 00:59:12', '2018-06-19 00:59:12'),
(12, 11, 'Nokia 1', '2018-06-19 02:00:36', '2018-06-19 02:00:36'),
(13, 11, 'Nokia 2', '2018-06-19 02:00:48', '2018-06-19 02:00:48'),
(14, 11, 'Nokia 3', '2018-06-19 02:00:57', '2018-06-19 02:00:57'),
(15, 15, 'ZTE 1', '2018-06-19 02:01:49', '2018-06-19 02:01:49'),
(16, 15, 'ZTE 2', '2018-06-19 02:01:57', '2018-06-19 02:01:57'),
(17, 14, 'JCB 1', '2018-06-19 02:02:56', '2018-06-19 02:02:56'),
(18, 14, 'JCB 2', '2018-06-19 02:03:08', '2018-06-19 02:03:08'),
(19, 1, 'MI Earphone 1', '2018-06-19 02:31:08', '2018-06-19 02:31:08'),
(20, 1, 'MI Earphone 2', '2018-06-19 02:32:25', '2018-06-19 02:32:25'),
(21, 2, 'Huawei Earphone 1', '2018-06-19 02:35:20', '2018-06-19 02:35:20'),
(22, 2, 'Huawei Earphone 2', '2018-06-19 02:35:36', '2018-06-19 02:35:36'),
(23, 1, 'MI Smartwatch 1', '2018-06-19 02:45:49', '2018-06-19 02:45:49'),
(24, 2, 'Huawei Smartwatch 1', '2018-06-19 02:46:46', '2018-06-19 02:46:46'),
(25, 8, 'Samsung Smartwatch 1', '2018-06-19 02:47:34', '2018-06-19 02:47:34'),
(26, 1, 'MI Tablet 1', '2018-06-19 03:23:55', '2018-06-19 03:23:55'),
(27, 2, 'Huawei Tablet 1', '2018-06-19 03:27:24', '2018-06-19 03:27:24'),
(28, 8, 'Samsung Tablet 1', '2018-06-19 03:29:54', '2018-06-19 03:29:54'),
(29, 16, 'H7', '2018-06-19 10:55:01', '2018-06-19 10:55:01'),
(30, 8, 'samsung2a', '2018-06-19 11:45:40', '2018-06-19 11:45:40'),
(31, 11, 'nokia2n', '2018-06-19 11:50:19', '2018-06-19 11:50:19'),
(32, 15, 'zte2z', '2018-06-19 11:53:00', '2018-06-19 11:53:00'),
(33, 14, 'jcb2j', '2018-06-19 11:54:55', '2018-06-19 11:54:55'),
(34, 1, 'mi2lcd', '2018-06-19 12:07:37', '2018-06-19 12:07:37'),
(35, 1, 'mi2lcd', '2018-06-19 12:07:37', '2018-06-19 12:07:37'),
(36, 2, 'huawei2battery', '2018-06-19 12:10:49', '2018-06-19 12:10:49'),
(37, 8, 'samsung2speaker', '2018-06-19 12:13:38', '2018-06-19 12:13:38'),
(38, 1, 'mi2pb', '2018-06-19 20:09:12', '2018-06-19 20:09:12'),
(39, 2, 'huawei2pb', '2018-06-19 20:11:13', '2018-06-19 20:11:13'),
(40, 8, 'samsung2pb', '2018-06-19 20:13:35', '2018-06-19 20:13:35'),
(41, 1, 'mi2bs', '2018-06-19 20:25:44', '2018-06-19 20:25:44'),
(42, 2, 'huawei2bs', '2018-06-19 20:27:11', '2018-06-19 20:27:11'),
(43, 8, 'samsung2bs', '2018-06-19 20:27:24', '2018-06-19 20:27:24'),
(44, 1, 'mi2sw', '2018-06-19 20:44:27', '2018-06-19 20:44:27'),
(45, 2, 'huawei2sw', '2018-06-19 20:44:58', '2018-06-19 20:44:58'),
(46, 8, 'samsung2sw', '2018-06-19 20:45:47', '2018-06-19 20:45:47'),
(47, 1, 'mi2gf', '2018-06-19 20:50:10', '2018-06-19 20:50:10'),
(48, 2, 'huawei2gf', '2018-06-19 20:50:31', '2018-06-19 20:50:31'),
(49, 8, 'samsung2gf', '2018-06-19 20:50:55', '2018-06-19 20:50:55'),
(50, 1, 'mi2tablet', '2018-06-19 21:25:25', '2018-06-19 21:25:25'),
(51, 2, 'huawei2tablet', '2018-06-19 21:26:37', '2018-06-19 21:26:37'),
(52, 8, 'samsung2tablet', '2018-06-19 21:27:15', '2018-06-19 21:27:15'),
(53, 17, 'meizu2m', '2018-05-19 23:10:13', '2018-05-19 23:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `service_products`
--

CREATE TABLE `service_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_products`
--

INSERT INTO `service_products` (`id`, `category`, `brand`, `model`, `color`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'Battery', 'MI', 'Battery 1', 'Black', 2, '2018-06-19 11:26:17', '2018-06-19 11:29:15'),
(2, 'LCD', 'MI', 'mi2lcd', 'Black', 2, '2018-06-19 12:10:14', '2018-06-19 12:20:10'),
(3, 'Battery', 'Huawei', 'huawei2battery', 'Black', 2, '2018-06-19 12:13:14', '2018-06-19 12:18:19'),
(4, 'Speaker', 'Samsung', 'samsung2speaker', 'Black', 3, '2018-06-19 12:14:59', '2018-06-19 12:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sale Staff', '2018-06-09 21:22:11', '2018-06-09 21:33:11'),
(2, 'Technician', '2018-06-09 23:34:33', '2018-06-09 23:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Service Provider', 'provider@gmail.com', '$2y$10$j.VQMuSrVaUlY8So/xGj9.a6Hupk1Pwfh/n.aSxHcPrmpyyeGxvWm', 0, 'ZT5GNVTIBacbuZKQGlVOyHXpd7SDRt0NtjII467PWuC67K3KqSZcgySROeoU', '2018-06-06 03:43:39', '2018-06-06 03:43:39'),
(2, 'Admin', 'admin123@gmail.com', '$2y$10$8iV9OUD2Q8mToZfkGsvH4uEaOSowm/zMvVeEgBJXKn5WkD8E1DYk.', 1, 'fhhw2ca2BRXR9O4fWCfk6WZ4Krowl5b4bF1GwvTtEGdyXzT1Rt3QyRUH7ukm', '2018-06-18 00:22:10', '2018-06-18 00:22:10'),
(3, 'Human Resource', 'humanresource@gmail.com', '$2y$10$SUf59s1IRkoF1ZZh6p7Sv.J3m6nI2G0z4t4.ynRN1U720gpYh7LHW', 0, '3qvOv9Zf4StmFeemelbfkpVEzdkaz2B5TbmkXRY9B2Z8PoTFUTqvb2tjeH15', '2018-06-18 11:11:20', '2018-06-18 11:11:20'),
(4, 'John Smith', 'johnsmith@gmail.com', '$2y$10$ABFld1on9IhoE.zdEFiageccO2Ejmv7lmcaSXBBsCv12Yju0B0Qpq', 0, 'y7Qyj37xB5P27EM3yalb2CosakkCHWQw8FU7QmC7y21cSoNgUWhGjf7u3TwJ', '2018-06-19 01:05:12', '2018-06-19 01:05:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absents`
--
ALTER TABLE `absents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_to_carts`
--
ALTER TABLE `add_to_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_types`
--
ALTER TABLE `category_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costs`
--
ALTER TABLE `costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_services`
--
ALTER TABLE `customer_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_services_brand_id_foreign` (`brand_id`),
  ADD KEY `customer_services_model_id_foreign` (`model_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `done_sales`
--
ALTER TABLE `done_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_department_id_foreign` (`department_id`),
  ADD KEY `employees_status_id_foreign` (`status_id`);

--
-- Indexes for table `employee_salaries`
--
ALTER TABLE `employee_salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_salaries_employee_id_foreign` (`employee_id`),
  ADD KEY `employee_salaries_department_id_foreign` (`department_id`),
  ADD KEY `employee_salaries_status_id_foreign` (`status_id`);

--
-- Indexes for table `featured_details`
--
ALTER TABLE `featured_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_costs`
--
ALTER TABLE `other_costs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `phone_brands`
--
ALTER TABLE `phone_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phone_details`
--
ALTER TABLE `phone_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phone_models`
--
ALTER TABLE `phone_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phone_models_category_id_foreign` (`category_id`),
  ADD KEY `phone_models_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `phone_services`
--
ALTER TABLE `phone_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phone_services_brand_id_foreign` (`brand_id`),
  ADD KEY `phone_services_model_id_foreign` (`model_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_users_user_id_role_id_unique` (`user_id`,`role_id`),
  ADD KEY `role_users_role_id_foreign` (`role_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_department_id_foreign` (`department_id`),
  ADD KEY `salaries_status_id_foreign` (`status_id`);

--
-- Indexes for table `sale_products`
--
ALTER TABLE `sale_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_models`
--
ALTER TABLE `service_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_models_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `service_products`
--
ALTER TABLE `service_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
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
-- AUTO_INCREMENT for table `absents`
--
ALTER TABLE `absents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `add_to_carts`
--
ALTER TABLE `add_to_carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `category_types`
--
ALTER TABLE `category_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `costs`
--
ALTER TABLE `costs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `customer_services`
--
ALTER TABLE `customer_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `done_sales`
--
ALTER TABLE `done_sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employee_salaries`
--
ALTER TABLE `employee_salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `featured_details`
--
ALTER TABLE `featured_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;
--
-- AUTO_INCREMENT for table `other_costs`
--
ALTER TABLE `other_costs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `phone_brands`
--
ALTER TABLE `phone_brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `phone_details`
--
ALTER TABLE `phone_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `phone_models`
--
ALTER TABLE `phone_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `phone_services`
--
ALTER TABLE `phone_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sale_products`
--
ALTER TABLE `sale_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `service_models`
--
ALTER TABLE `service_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `service_products`
--
ALTER TABLE `service_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_services`
--
ALTER TABLE `customer_services`
  ADD CONSTRAINT `customer_services_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `phone_brands` (`id`),
  ADD CONSTRAINT `customer_services_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `service_models` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_salaries`
--
ALTER TABLE `employee_salaries`
  ADD CONSTRAINT `employee_salaries_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_salaries_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_salaries_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phone_models`
--
ALTER TABLE `phone_models`
  ADD CONSTRAINT `phone_models_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `phone_brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phone_models_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phone_services`
--
ALTER TABLE `phone_services`
  ADD CONSTRAINT `phone_services_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `phone_brands` (`id`),
  ADD CONSTRAINT `phone_services_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `service_models` (`id`);

--
-- Constraints for table `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `salaries_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_models`
--
ALTER TABLE `service_models`
  ADD CONSTRAINT `service_models_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `phone_brands` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
