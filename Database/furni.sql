-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 09:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furni`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Tables', 1, '2024-05-24 04:14:32', '2024-05-24 04:14:32'),
(6, 'Stool', 1, '2024-05-24 04:14:39', '2024-05-24 04:14:39'),
(7, 'Bed', 1, '2024-05-24 04:14:46', '2024-05-24 04:14:46'),
(8, 'Chair', 1, '2024-05-24 04:14:53', '2024-05-24 04:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(0, 'One Color', 1, NULL, '2024-04-27 06:09:19'),
(1, 'Red', 1, NULL, NULL),
(2, 'Blue', 1, NULL, NULL),
(3, 'Green', 1, NULL, NULL),
(4, 'Yellow', 1, NULL, NULL),
(5, 'Orange', 1, NULL, NULL),
(6, 'Purple', 1, NULL, NULL),
(7, 'Pink', 1, NULL, NULL),
(8, 'Black', 1, NULL, NULL),
(9, 'White', 1, NULL, NULL),
(10, 'Brown', 1, NULL, NULL),
(12, 'DarkGreen', 1, '2024-04-25 20:02:50', '2024-04-25 20:02:50'),
(13, '#FFF000', 1, '2024-04-25 20:50:46', '2024-04-25 20:50:46'),
(14, 'darkgreen', 1, '2024-04-30 07:19:19', '2024-04-30 07:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `color_product`
--

CREATE TABLE `color_product` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_product`
--

INSERT INTO `color_product` (`product_id`, `color_id`) VALUES
(25, 10),
(26, 9),
(27, 10),
(28, 9);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `updated_at`, `created_at`) VALUES
(7, 'Test', 'testing@gmail.com', 'test', 'teseintasndf; oas j fasf', '2024-04-30 12:11:51', '2024-04-30 12:11:51'),
(10, 'project bca', 'test@gmail.com', 'testing', 'testing', '2024-05-26 00:19:23', '2024-05-26 00:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_token` text NOT NULL,
  `is_verified` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `password`, `verification_token`, `is_verified`, `status`, `created_at`, `updated_at`) VALUES
(16, 'project bca', 'asadmalik852456@gmail.com', '1234567890', '$2y$10$oVetTgTpwrtBRJ57xqF49ue2FEWPyNXzs7r1pXPxakVSv74JX7eaW', 'hBeWgw76CZFAxXn0piSu9ByPBWxQHrU05yWw1ikVvQzhA8sOri8e9jG1a1Jc', 1, 1, '2024-05-25 18:52:41', '2024-05-25 18:53:34');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_13_100040_create_sessions_table', 1),
(6, '2024_04_14_003016_create_products_table', 2),
(7, '2024_04_14_003820_create_customers_table', 3),
(8, '2024_04_14_003944_create_carts_table', 4),
(10, '2024_04_14_004229_create_orders_table', 5),
(11, '2024_04_14_005400_add_image_to_orders_table', 6),
(12, '2024_04_14_010351_create_colors_table', 7),
(13, '2024_04_14_010352_create_sizes_table', 7),
(14, '2024_04_26_014312_create_product_size_table', 8),
(15, '2024_04_26_015126_create_product_color_table', 9),
(16, '2024_04_26_020324_create_color_product_table', 10),
(17, '2024_04_26_020523_create_color_product_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` text NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(150) NOT NULL,
  `address` varchar(200) NOT NULL,
  `country` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `state` varchar(40) NOT NULL,
  `zipcode` varchar(40) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `payment` varchar(111) NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `status` enum('pending','processing','shipped','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `product_ids` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `customer_id`, `name`, `email`, `mobile`, `address`, `country`, `city`, `state`, `zipcode`, `subtotal`, `payment`, `payment_status`, `status`, `product_ids`, `created_at`, `updated_at`) VALUES
(23, 'order_id_510678', 16, 'project bca', 'asadmalik852456@gmail.com', '1234567890', 'fasdf', '3', 'dehradun', 'uttarakhand', '247667', 5999.00, 'COD', 'Unpaid', 'pending', '[{\"id\":28,\"category_id\":5,\"name\":\"QARA Wood , Laminated Study Table, (36X24) Inch, Computer Table For Home,Office Table, Desktop,Laptop Table, Office Desk With Round Corners (White)\",\"slug\":\"qara-wood-laminated-study-table-36x24-inch-computer-table-for-homeoffice-table-desktoplaptop-table-office-desk-with-round-corners-white\",\"description\":\"<div class=\\\"a-row\\\">\\r\\n<div class=\\\"a-column a-span6\\\">\\r\\n<h1 class=\\\"a-size-medium a-spacing-small\\\">Technical Details<\\/h1>\\r\\n<\\/div>\\r\\n<\\/div>\\r\\n<div class=\\\"a-expander-content a-expander-extend-content\\\" aria-expanded=\\\"true\\\">\\r\\n<div class=\\\"a-row a-expander-container a-expander-inline-container\\\">\\r\\n<div class=\\\"a-expander-content a-expander-section-content a-section-expander-inner\\\" aria-expanded=\\\"true\\\">\\r\\n<table id=\\\"productDetails_techSpec_section_1\\\" class=\\\"a-keyvalue prodDetTable\\\" role=\\\"presentation\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Brand<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;QARA<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Shape<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Rectangular<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Desk design<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Computer Desk<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Product Dimensions<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;61D x 92W x 76H Centimeters<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Colour<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;White<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Style<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Modern<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Base Material<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Wood<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Top Material Type<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Wood<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Finish Type<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Laminated<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Special Feature<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Adjustable<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Room Type<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Office<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Mounting Type<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Tabletop<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Product Care Instructions<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;wipe with cloth<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Item Weight<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;10 Kilograms<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Furniture Finish<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Matte<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Size<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;White<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Included Components<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Screws &amp; Manual<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Assembly Required<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Yes<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Manufacturer<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Craftcenter<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Country of Origin<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;India<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Item model number<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Crysta-White<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">ASIN<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;B0CRHKCNVQ<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<\\/div>\\r\\n<\\/div>\",\"image\":\"1716545386_f1.jpg\",\"price\":\"5999.00\",\"quantity\":1,\"meta_title\":\"QARA Wood , Laminated Study Table, (36X24) Inch, Computer Table For Home,Office Table, Desktop,Laptop Table, Office Desk With Round Corners (White)\",\"meta_desc\":\"QARA Wood , Laminated Study Table, (36X24) Inch, Computer Table For Home,Office Table, Desktop,Laptop Table, Office Desk With Round Corners (White)\",\"meta_keyword\":\"QARA Wood , Laminated Study Table, (36X24) Inch, Computer Table For Home,Office Table, Desktop,Laptop Table, Office Desk With Round Corners (White)\",\"status\":1,\"created_at\":\"2024-05-24 10:09:46\",\"updated_at\":\"2024-05-24 10:09:46\",\"color\":\"White\",\"size\":\"Large\"}]', '2024-05-25 18:55:55', '2024-05-25 18:55:55'),
(24, 'order_id_171593', 16, 'project bca', 'asadmalik852456@gmail.com', '1234567890', 'asdfasf', '1', 'dehradun', 'uttarakhand', '247667', 2000.00, 'upi', 'paid', 'cancelled', '[{\"id\":26,\"category_id\":6,\"name\":\"UHUD CRAFTS Beautiful Antique Wooden Fold-able Side Table\\/End Table\\/Plant Stand\\/Stool Living Room Kids Play Furniture Table Round Shape\",\"slug\":\"uhud-crafts-beautiful-antique-wooden-fold-able-side-tableend-tableplant-standstool-living-room-kids-play-furniture-table-round-shape\",\"description\":\"<h1 class=\\\"a-size-base-plus a-text-bold\\\">About this item<\\/h1>\\r\\n<ul class=\\\"a-unordered-list a-vertical a-spacing-mini\\\">\\r\\n<li class=\\\"a-spacing-mini\\\"><span class=\\\"a-list-item\\\">Antique Foldable table, easy to carry anywhere. A perfect gift item for you.&lt;br&gt;<\\/span><\\/li>\\r\\n<li class=\\\"a-spacing-mini\\\"><span class=\\\"a-list-item\\\">This multipurpose table can be used for any showpiece on it , plant stand and more.&lt;br&gt;<\\/span><\\/li>\\r\\n<li class=\\\"a-spacing-mini\\\"><span class=\\\"a-list-item\\\">Product Dimension L x B X H - (12 x 12 x 12) inch.&lt;br&gt;<\\/span><\\/li>\\r\\n<li class=\\\"a-spacing-mini\\\"><span class=\\\"a-list-item\\\">Mango wood Folding Table \\/ Side Table \\/ Coffee Table\\/Kids Study Table\\/Stool\\/ Plant Stand.&lt;br&gt;<\\/span><\\/li>\\r\\n<li class=\\\"a-spacing-mini\\\"><span class=\\\"a-list-item\\\">Furniture Finish: Deco Paint; Assembly Instructions: Diy; Special Features: Collapsible; Size Name: Medium<\\/span><\\/li>\\r\\n<\\/ul>\\r\\n<div class=\\\"a-row\\\">\\r\\n<div class=\\\"a-column a-span6\\\">\\r\\n<h1 class=\\\"a-size-medium a-spacing-small\\\">Technical Details<\\/h1>\\r\\n<\\/div>\\r\\n<\\/div>\\r\\n<div class=\\\"a-expander-content a-expander-extend-content\\\" aria-expanded=\\\"true\\\">\\r\\n<div class=\\\"a-row a-expander-container a-expander-inline-container\\\">\\r\\n<div class=\\\"a-expander-content a-expander-section-content a-section-expander-inner\\\" aria-expanded=\\\"true\\\">\\r\\n<table id=\\\"productDetails_techSpec_section_1\\\" class=\\\"a-keyvalue prodDetTable\\\" role=\\\"presentation\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Product Dimensions<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;30D x 30W x 33H Centimeters<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Colour<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;White<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Shape<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Round<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Brand<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;UHUD CRAFTS<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Table design<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;End Table<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Style<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Modern<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Seating Capacity<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;1.00<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Top Material Type<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Wood, Mango Wood<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Finish Type<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Glossy<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Base Type<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Leg<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Frame Material<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Wood<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Model Name<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Wood Glossy Triangle End, Coffee Modern Minimalist Side Table for Living Room, Balcony and for Tea and Coffee Serve (White)<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Item Weight<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;1 Kilograms<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Product Care Instructions<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Wipe with Dry Cloth<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Included Components<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;1 Fold-able Stool<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Furniture Finish<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Deco paint<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Size<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Medium<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Base Material<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Wood<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Material<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;Mango Wood<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Number of Items<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;1<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Manufacturer<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;UHUD CRAFTS<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">Item model number<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;UC-12<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<th class=\\\"a-color-secondary a-size-base prodDetSectionEntry\\\">ASIN<\\/th>\\r\\n<td class=\\\"a-size-base prodDetAttrValue\\\">&lrm;B0927T6DS6<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<\\/div>\\r\\n<\\/div>\",\"image\":\"1716544498_1.jpg\",\"price\":\"2000.00\",\"quantity\":1,\"meta_title\":\"UHUD CRAFTS Beautiful Antique Wooden Fold-able Side Table\\/End Table\\/Plant Stand\\/Stool Living Room Kids Play Furniture Table Round Shape\",\"meta_desc\":\"UHUD CRAFTS Beautiful Antique Wooden Fold-able Side Table\\/End Table\\/Plant Stand\\/Stool Living Room Kids Play Furniture Table Round Shape\",\"meta_keyword\":\"stool, wooden stool, foldable stool, table stool, living room stool, stools\",\"status\":1,\"created_at\":\"2024-05-24 09:54:58\",\"updated_at\":\"2024-05-24 09:54:58\",\"color\":\"White\",\"size\":\"Small\"}]', '2024-05-25 18:58:23', '2024-05-25 19:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(2000) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(100) UNSIGNED NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `image`, `price`, `quantity`, `meta_title`, `meta_desc`, `meta_keyword`, `status`, `created_at`, `updated_at`) VALUES
(25, 5, 'Streem Sheesham Wooden Finish Study Table for Students Laptop Office Desk Workstation Writing Tables for Study Room Home Wooden Finish Furniture for Study Room 86 * 50 * 75 cm', 'streem-sheesham-wooden-finish-study-table-for-students-laptop-office-desk-workstation-writing-tables-for-study-room-home-wooden-finish-furniture-for-study-room-86-50-75-cm', '<h2>Product information</h2>\r\n<div class=\"a-row a-spacing-top-base\">\r\n<div class=\"a-column a-span6\">\r\n<div class=\"a-row a-spacing-base\">\r\n<div class=\"a-row a-expander-container a-expander-extend-container\">\r\n<div class=\"a-row\">\r\n<div class=\"a-column a-span6\">\r\n<h1 class=\"a-size-medium a-spacing-small\">Technical Details</h1>\r\n</div>\r\n</div>\r\n<div class=\"a-expander-content a-expander-extend-content\" aria-expanded=\"true\">\r\n<div class=\"a-row a-expander-container a-expander-inline-container\">\r\n<div class=\"a-expander-content a-expander-section-content a-section-expander-inner\" aria-expanded=\"true\">\r\n<table id=\"productDetails_techSpec_section_1\" class=\"a-keyvalue prodDetTable\" role=\"presentation\">\r\n<tbody>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Brand</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Streem</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Shape</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Square</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Product Dimensions</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;50D x 86W x 75H Centimeters</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Colour</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Brown</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Style</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Contemporary</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Base Material</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Sheesham Wood</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Top Material Type</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Sheesham Wood</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Finish Type</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Polished</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Special Feature</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Storage</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Room Type</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Office, Study Room</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Number of Drawers</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;1</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Recommended Uses For Product</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;office</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Mounting Type</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Floor Mount</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Product Care Instructions</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Wipe with Dry Cloth</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Age Range (Description)</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Adult</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Item Weight</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;15 Kilograms</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Furniture Finish</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Walnut</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Size</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Medium</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Number of Shelves</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;3</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Included Components</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Screw</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Assembly Required</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Yes</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Model Name</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Streem192550</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Base Type</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;legs</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Color</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Brown</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Assembly Type</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;DIY</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Primary material</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Sheesham Wood</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Type of Wood</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Wood</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Top Material</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Sheesham Wood</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Capacity</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Medium</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Number of Pieces</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;5</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Footboard upholstery</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Sheesham Wood</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Item Model Number</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Streem192550</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Manufacturer</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Streemcraft</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Country of Origin</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;India</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '1716544348_a.jpg', 4000.00, 5, 'Streem Sheesham Wooden Finish Study Table for Students Laptop Office Desk Workstation Writing Tables for Study Room Home Wooden Finish Furniture for Study Room 86 * 50 * 75 cm', 'Streem Sheesham Wooden Finish Study Table for Students Laptop Office Desk Workstation Writing Tables for Study Room Home Wooden Finish Furniture for Study Room 86 * 50 * 75 cm', 'Table, Wooden table, tables, wood table, study table, student table, laptop table, computer table, desktop table', 1, '2024-05-24 04:22:28', '2024-05-24 04:22:28'),
(26, 6, 'UHUD CRAFTS Beautiful Antique Wooden Fold-able Side Table/End Table/Plant Stand/Stool Living Room Kids Play Furniture Table Round Shape', 'uhud-crafts-beautiful-antique-wooden-fold-able-side-tableend-tableplant-standstool-living-room-kids-play-furniture-table-round-shape', '<h1 class=\"a-size-base-plus a-text-bold\">About this item</h1>\r\n<ul class=\"a-unordered-list a-vertical a-spacing-mini\">\r\n<li class=\"a-spacing-mini\"><span class=\"a-list-item\">Antique Foldable table, easy to carry anywhere. A perfect gift item for you.&lt;br&gt;</span></li>\r\n<li class=\"a-spacing-mini\"><span class=\"a-list-item\">This multipurpose table can be used for any showpiece on it , plant stand and more.&lt;br&gt;</span></li>\r\n<li class=\"a-spacing-mini\"><span class=\"a-list-item\">Product Dimension L x B X H - (12 x 12 x 12) inch.&lt;br&gt;</span></li>\r\n<li class=\"a-spacing-mini\"><span class=\"a-list-item\">Mango wood Folding Table / Side Table / Coffee Table/Kids Study Table/Stool/ Plant Stand.&lt;br&gt;</span></li>\r\n<li class=\"a-spacing-mini\"><span class=\"a-list-item\">Furniture Finish: Deco Paint; Assembly Instructions: Diy; Special Features: Collapsible; Size Name: Medium</span></li>\r\n</ul>\r\n<div class=\"a-row\">\r\n<div class=\"a-column a-span6\">\r\n<h1 class=\"a-size-medium a-spacing-small\">Technical Details</h1>\r\n</div>\r\n</div>\r\n<div class=\"a-expander-content a-expander-extend-content\" aria-expanded=\"true\">\r\n<div class=\"a-row a-expander-container a-expander-inline-container\">\r\n<div class=\"a-expander-content a-expander-section-content a-section-expander-inner\" aria-expanded=\"true\">\r\n<table id=\"productDetails_techSpec_section_1\" class=\"a-keyvalue prodDetTable\" role=\"presentation\">\r\n<tbody>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Product Dimensions</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;30D x 30W x 33H Centimeters</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Colour</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;White</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Shape</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Round</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Brand</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;UHUD CRAFTS</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Table design</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;End Table</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Style</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Modern</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Seating Capacity</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;1.00</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Top Material Type</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Wood, Mango Wood</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Finish Type</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Glossy</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Base Type</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Leg</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Frame Material</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Wood</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Model Name</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Wood Glossy Triangle End, Coffee Modern Minimalist Side Table for Living Room, Balcony and for Tea and Coffee Serve (White)</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Item Weight</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;1 Kilograms</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Product Care Instructions</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Wipe with Dry Cloth</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Included Components</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;1 Fold-able Stool</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Furniture Finish</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Deco paint</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Size</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Medium</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Base Material</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Wood</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Material</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Mango Wood</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Number of Items</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;1</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Manufacturer</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;UHUD CRAFTS</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Item model number</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;UC-12</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">ASIN</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;B0927T6DS6</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>', '1716544498_1.jpg', 2000.00, 2, 'UHUD CRAFTS Beautiful Antique Wooden Fold-able Side Table/End Table/Plant Stand/Stool Living Room Kids Play Furniture Table Round Shape', 'UHUD CRAFTS Beautiful Antique Wooden Fold-able Side Table/End Table/Plant Stand/Stool Living Room Kids Play Furniture Table Round Shape', 'stool, wooden stool, foldable stool, table stool, living room stool, stools', 1, '2024-05-24 04:24:58', '2024-05-25 18:58:23'),
(27, 5, 'La Henk Multipurpose Finish Office Table For Office Work Study Table Pc Computer Table Desktop Table Table For Student Office Desk Pc Laptop Study Table For Students Writing Table For Home,Wood', 'la-henk-multipurpose-finish-office-table-for-office-work-study-table-pc-computer-table-desktop-table-table-for-student-office-desk-pc-laptop-study-table-for-students-writing-table-for-homewood', '<table class=\"a-normal a-spacing-micro\">\r\n<tbody>\r\n<tr class=\"a-spacing-small po-brand\">\r\n<td class=\"a-span3\"><span class=\"a-size-base a-text-bold\">Brand</span></td>\r\n<td class=\"a-span9\"><span class=\"a-size-base po-break-word\">La Henk</span></td>\r\n</tr>\r\n<tr class=\"a-spacing-small po-item_shape\">\r\n<td class=\"a-span3\"><span class=\"a-size-base a-text-bold\">Shape</span></td>\r\n<td class=\"a-span9\"><span class=\"a-size-base po-break-word\">Rectangular</span></td>\r\n</tr>\r\n<tr class=\"a-spacing-small po-item_depth_width_height\">\r\n<td class=\"a-span3\"><span class=\"a-size-base a-text-bold\">Product Dimensions</span></td>\r\n<td class=\"a-span9\"><span class=\"a-size-base po-break-word\">90D x 60W x 75H Centimeters</span></td>\r\n</tr>\r\n<tr class=\"a-spacing-small po-color\">\r\n<td class=\"a-span3\"><span class=\"a-size-base a-text-bold\">Colour</span></td>\r\n<td class=\"a-span9\"><span class=\"a-size-base po-break-word\">wooden Brown</span></td>\r\n</tr>\r\n<tr class=\"a-spacing-small po-style\">\r\n<td class=\"a-span3\"><span class=\"a-size-base a-text-bold\">Style</span></td>\r\n<td class=\"a-span9\"><span class=\"a-size-base po-break-word\">Modern</span></td>\r\n</tr>\r\n<tr class=\"a-spacing-small po-base.material\">\r\n<td class=\"a-span3\"><span class=\"a-size-base a-text-bold\">Base Material</span></td>\r\n<td class=\"a-span9\"><span class=\"a-size-base po-break-word\">Wood</span></td>\r\n</tr>\r\n<tr class=\"a-spacing-small po-top.material\">\r\n<td class=\"a-span3\"><span class=\"a-size-base a-text-bold\">Top Material Type</span></td>\r\n<td class=\"a-span9\"><span class=\"a-size-base po-break-word\">Engineered Wood</span></td>\r\n</tr>\r\n<tr class=\"a-spacing-small po-finish_type\">\r\n<td class=\"a-span3\"><span class=\"a-size-base a-text-bold\">Finish Type</span></td>\r\n<td class=\"a-span9\"><span class=\"a-size-base po-break-word\">Wood</span></td>\r\n</tr>\r\n<tr class=\"a-spacing-small po-special_feature\">\r\n<td class=\"a-span3\"><span class=\"a-size-base a-text-bold\">Special Feature</span></td>\r\n<td class=\"a-span9\"><span class=\"a-size-base po-break-word\">waterproof</span></td>\r\n</tr>\r\n<tr class=\"a-spacing-small po-room_type\">\r\n<td class=\"a-span3\"><span class=\"a-size-base a-text-bold\">Room Type</span></td>\r\n<td class=\"a-span9\"><span class=\"a-size-base po-break-word\">Office, Living Room</span></td>\r\n</tr>\r\n</tbody>\r\n</table>', '1716545168_s1.jpg', 3000.00, 8, 'Brand La Henk Shape Rectangular Product Dimensions 90D x 60W x 75H Centimeters Colour wooden Brown Style Modern Base Material Wood Top Material Type Engineered Wood Finish Type Wood Special Feature waterproof Room Type Office, Living Room', 'Brand La Henk Shape Rectangular Product Dimensions 90D x 60W x 75H Centimeters Colour wooden Brown Style Modern Base Material Wood Top Material Type Engineered Wood Finish Type Wood Special Feature waterproof Room Type Office, Living Room', 'Brand La Henk Shape Rectangular Product Dimensions 90D x 60W x 75H Centimeters Colour wooden Brown Style Modern Base Material Wood Top Material Type Engineered Wood Finish Type Wood Special Feature waterproof Room Type Office, Living Room', 1, '2024-05-24 04:36:08', '2024-05-24 04:36:08'),
(28, 5, 'QARA Wood , Laminated Study Table, (36X24) Inch, Computer Table For Home,Office Table, Desktop,Laptop Table, Office Desk With Round Corners (White)', 'qara-wood-laminated-study-table-36x24-inch-computer-table-for-homeoffice-table-desktoplaptop-table-office-desk-with-round-corners-white', '<div class=\"a-row\">\r\n<div class=\"a-column a-span6\">\r\n<h1 class=\"a-size-medium a-spacing-small\">Technical Details</h1>\r\n</div>\r\n</div>\r\n<div class=\"a-expander-content a-expander-extend-content\" aria-expanded=\"true\">\r\n<div class=\"a-row a-expander-container a-expander-inline-container\">\r\n<div class=\"a-expander-content a-expander-section-content a-section-expander-inner\" aria-expanded=\"true\">\r\n<table id=\"productDetails_techSpec_section_1\" class=\"a-keyvalue prodDetTable\" role=\"presentation\">\r\n<tbody>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Brand</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;QARA</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Shape</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Rectangular</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Desk design</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Computer Desk</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Product Dimensions</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;61D x 92W x 76H Centimeters</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Colour</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;White</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Style</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Modern</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Base Material</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Wood</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Top Material Type</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Wood</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Finish Type</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Laminated</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Special Feature</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Adjustable</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Room Type</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Office</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Mounting Type</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Tabletop</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Product Care Instructions</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;wipe with cloth</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Item Weight</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;10 Kilograms</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Furniture Finish</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Matte</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Size</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;White</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Included Components</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Screws &amp; Manual</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Assembly Required</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Yes</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Manufacturer</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Craftcenter</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Country of Origin</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;India</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">Item model number</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;Crysta-White</td>\r\n</tr>\r\n<tr>\r\n<th class=\"a-color-secondary a-size-base prodDetSectionEntry\">ASIN</th>\r\n<td class=\"a-size-base prodDetAttrValue\">&lrm;B0CRHKCNVQ</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>', '1716545386_f1.jpg', 5999.00, 2, 'QARA Wood , Laminated Study Table, (36X24) Inch, Computer Table For Home,Office Table, Desktop,Laptop Table, Office Desk With Round Corners (White)', 'QARA Wood , Laminated Study Table, (36X24) Inch, Computer Table For Home,Office Table, Desktop,Laptop Table, Office Desk With Round Corners (White)', 'QARA Wood , Laminated Study Table, (36X24) Inch, Computer Table For Home,Office Table, Desktop,Laptop Table, Office Desk With Round Corners (White)', 1, '2024-05-24 04:39:46', '2024-05-25 18:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `product_image_gallery`
--

CREATE TABLE `product_image_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_image_gallery`
--

INSERT INTO `product_image_gallery` (`id`, `product_id`, `image_path`, `created_at`, `updated_at`) VALUES
(8, 5, '1713098605_WIN_20230804_19_44_23_Pro.jpg', '2024-04-14 07:13:25', '2024-04-14 07:13:25'),
(9, 5, '1713098605_WIN_20230804_19_44_24_Pro.jpg', '2024-04-14 07:13:25', '2024-04-14 07:13:25'),
(10, 5, '1713098605_WIN_20230804_19_44_25_Pro.jpg', '2024-04-14 07:13:25', '2024-04-14 07:13:25'),
(11, 5, '1713098605_WIN_20230804_19_44_27_Pro.jpg', '2024-04-14 07:13:25', '2024-04-14 07:13:25'),
(12, 6, '1713357035_watch12.jpg', '2024-04-17 07:00:35', '2024-04-17 07:00:35'),
(14, 7, '1713357145_watch12.jpg', '2024-04-17 07:02:25', '2024-04-17 07:02:25'),
(15, 7, '1713357145_watch13.jpg', '2024-04-17 07:02:25', '2024-04-17 07:02:25'),
(16, 7, '1713357145_watch14.jpg', '2024-04-17 07:02:25', '2024-04-17 07:02:25'),
(17, 7, '1713359678_watch11.jpg', '2024-04-17 07:44:38', '2024-04-17 07:44:38'),
(19, 8, '1713359806_asdfsadf.jpg', '2024-04-17 07:46:46', '2024-04-17 07:46:46'),
(20, 9, '1713359958_sdf.jpg', '2024-04-17 07:49:18', '2024-04-17 07:49:18'),
(21, 9, '1713359958_sdfds.jpg', '2024-04-17 07:49:18', '2024-04-17 07:49:18'),
(22, 9, '1713359958_sdfsdf.jpg', '2024-04-17 07:49:18', '2024-04-17 07:49:18'),
(23, 10, '1713360053_fdsf.jpg', '2024-04-17 07:50:53', '2024-04-17 07:50:53'),
(24, 10, '1713360053_fff.jpg', '2024-04-17 07:50:53', '2024-04-17 07:50:53'),
(25, 10, '1713360053_ggg.jpg', '2024-04-17 07:50:53', '2024-04-17 07:50:53'),
(26, 11, '1713360053_fdsf.jpg', '2024-04-17 07:50:53', '2024-04-17 07:50:53'),
(27, 11, '1713360053_fff.jpg', '2024-04-17 07:50:53', '2024-04-17 07:50:53'),
(28, 11, '1713360053_ggg.jpg', '2024-04-17 07:50:53', '2024-04-17 07:50:53'),
(29, 8, '1713444473_asdf.jpg', '2024-04-18 07:17:53', '2024-04-18 07:17:53'),
(30, 12, '1713444749_asdfsaf.jpg', '2024-04-18 07:22:29', '2024-04-18 07:22:29'),
(31, 12, '1713444749_asdfsfsd.jpg', '2024-04-18 07:22:29', '2024-04-18 07:22:29'),
(32, 12, '1713444749_dsfsdf.jpg', '2024-04-18 07:22:29', '2024-04-18 07:22:29'),
(33, 12, '1713444749_fdfdfdf.jpg', '2024-04-18 07:22:29', '2024-04-18 07:22:29'),
(34, 13, '1713444845_asdfsfsd.jpg', '2024-04-18 07:24:05', '2024-04-18 07:24:05'),
(35, 13, '1713444845_dsfsdf.jpg', '2024-04-18 07:24:05', '2024-04-18 07:24:05'),
(36, 13, '1713444845_fdfdfdf.jpg', '2024-04-18 07:24:05', '2024-04-18 07:24:05'),
(37, 14, '1713445794_asdfsadff.jpg', '2024-04-18 07:39:54', '2024-04-18 07:39:54'),
(38, 14, '1713445794_dfdf.jpg', '2024-04-18 07:39:54', '2024-04-18 07:39:54'),
(39, 14, '1713445794_fggfh.jpg', '2024-04-18 07:39:54', '2024-04-18 07:39:54'),
(40, 14, '1713445794_fghfg.jpg', '2024-04-18 07:39:54', '2024-04-18 07:39:54'),
(41, 15, 'pZQueRTA_asdfsadff.jpg', '2024-04-18 07:43:46', '2024-04-18 07:43:46'),
(42, 15, 'soIKmxCs_dfdf.jpg', '2024-04-18 07:43:46', '2024-04-18 07:43:46'),
(43, 15, '1v6KqGua_fggfh.jpg', '2024-04-18 07:43:46', '2024-04-18 07:43:46'),
(44, 15, 'eoI0uUFA_fghfg.jpg', '2024-04-18 07:43:46', '2024-04-18 07:43:46'),
(45, 16, 'zCdoWSO0_watch5.jpg', '2024-04-24 05:13:13', '2024-04-24 05:13:13'),
(46, 19, 'Of2z4K1N_WIN_20230804_19_44_23_Pro.jpg', '2024-04-25 20:35:52', '2024-04-25 20:35:52'),
(47, 19, 'BpMUPBlL_WIN_20230804_19_44_24_Pro.jpg', '2024-04-25 20:35:52', '2024-04-25 20:35:52'),
(48, 19, 'YjI1RLpr_WIN_20230804_19_44_25_Pro.jpg', '2024-04-25 20:35:52', '2024-04-25 20:35:52'),
(49, 19, 'aNyQEK95_WIN_20230804_19_44_27_Pro.jpg', '2024-04-25 20:35:52', '2024-04-25 20:35:52'),
(50, 23, 'LZ58vwrA_WIN_20230804_19_44_23_Pro.jpg', '2024-04-25 20:44:31', '2024-04-25 20:44:31'),
(51, 23, 'Omj2uFsK_WIN_20230804_19_44_24_Pro.jpg', '2024-04-25 20:44:31', '2024-04-25 20:44:31'),
(52, 23, 'BzxgoPfv_WIN_20230804_19_44_25_Pro.jpg', '2024-04-25 20:44:31', '2024-04-25 20:44:31'),
(53, 23, '4qe6slMp_WIN_20230804_19_44_27_Pro.jpg', '2024-04-25 20:44:31', '2024-04-25 20:44:31'),
(54, 24, 'f9DP6yq9_watch5.jpg', '2024-04-30 07:20:31', '2024-04-30 07:20:31'),
(55, 24, 'gkikQYGg_watch6.jpg', '2024-04-30 07:20:31', '2024-04-30 07:20:31'),
(56, 24, 'BQoBA4U0_watch7.jpg', '2024-04-30 07:20:31', '2024-04-30 07:20:31'),
(57, 24, 'xohg4vZW_watch8.jpg', '2024-04-30 07:20:31', '2024-04-30 07:20:31'),
(58, 25, 'q0e1B9yG_a1.jpg', '2024-05-24 04:22:28', '2024-05-24 04:22:28'),
(59, 25, 'R2QUJ4eG_a2.jpg', '2024-05-24 04:22:28', '2024-05-24 04:22:28'),
(60, 25, 'qxlUwpHk_a3.jpg', '2024-05-24 04:22:28', '2024-05-24 04:22:28'),
(61, 26, '5ViRMKqy_2.jpg', '2024-05-24 04:24:58', '2024-05-24 04:24:58'),
(62, 26, '2HYxi41O_3.jpg', '2024-05-24 04:24:58', '2024-05-24 04:24:58'),
(63, 26, 'PDBnPWLj_4.jpg', '2024-05-24 04:24:58', '2024-05-24 04:24:58'),
(64, 27, '4JKLvOcK_s2.jpg', '2024-05-24 04:36:08', '2024-05-24 04:36:08'),
(65, 27, '6zYGhe20_s3.jpg', '2024-05-24 04:36:08', '2024-05-24 04:36:08'),
(66, 27, '0r7Y5hBz_s4.jpg', '2024-05-24 04:36:08', '2024-05-24 04:36:08'),
(67, 28, '203FgThm_f2.jpg', '2024-05-24 04:39:46', '2024-05-24 04:39:46'),
(68, 28, 'dpVUG6iP_f3.jpg', '2024-05-24 04:39:46', '2024-05-24 04:39:46'),
(69, 28, 'eEkgVt8u_f4.jpg', '2024-05-24 04:39:46', '2024-05-24 04:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`product_id`, `size_id`) VALUES
(25, 9),
(26, 8),
(27, 10),
(28, 10);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gHePqeGOf1Lcdn7oYQb9uqvv84PQmvc4HOBhBMq1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSGF3OWFyTGpGa01GcTBRVHJHQVRIcXVCeUhFU1E0Tk95dUhlRVlXdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1713004042);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(0, 'Standard', 1, NULL, '2024-05-24 04:19:41'),
(8, 'Small', 1, '2024-05-24 04:19:57', '2024-05-24 04:19:57'),
(9, 'Medium', 1, '2024-05-24 04:20:04', '2024-05-24 04:20:04'),
(10, 'Large', 1, '2024-05-24 04:20:10', '2024-05-24 04:20:10'),
(11, 'Extra Large', 1, '2024-05-24 04:20:17', '2024-05-24 04:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(500) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `status`) VALUES
(1, 'admin', '$2y$10$1XbdcrvS7.KuWEYonCB9dOO.Mh2PdWOl27mNsYwey3mYQHlNwqdDm', NULL, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_customer_id_foreign` (`customer_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_product`
--
ALTER TABLE `color_product`
  ADD PRIMARY KEY (`product_id`,`color_id`),
  ADD KEY `color_product_color_id_foreign` (`color_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_mobile_unique` (`mobile`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_product_id_foreign` (`product_ids`(768));

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_image_gallery`
--
ALTER TABLE `product_image_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_images_gallery_project_id_foreign` (`product_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`product_id`,`size_id`),
  ADD KEY `product_size_size_id_foreign` (`size_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_image_gallery`
--
ALTER TABLE `product_image_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `color_product`
--
ALTER TABLE `color_product`
  ADD CONSTRAINT `color_product_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `color_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_size_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
