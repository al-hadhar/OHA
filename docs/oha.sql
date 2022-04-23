-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2022 at 11:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oha`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `activity` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `document_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE `custom_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `validation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suggestions` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `custom_fields` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `verified_by` bigint(20) UNSIGNED DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents_tags`
--

CREATE TABLE `documents_tags` (
  `document_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `document_id` int(10) UNSIGNED NOT NULL,
  `file_type_id` int(10) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `custom_fields` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_types`
--

CREATE TABLE `file_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_files` int(11) NOT NULL,
  `labels` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_validations` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_maxsize` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `file_types`
--

INSERT INTO `file_types` (`id`, `name`, `no_of_files`, `labels`, `file_validations`, `file_maxsize`, `created_at`, `updated_at`) VALUES
(1, 'General', 2, 'page1,page2', 'mimes:jpeg,bmp,png,jpg', 8, '2022-01-08 15:05:55', '2022-01-08 15:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_09_055735_create_settings_table', 1),
(5, '2019_11_11_170438_create_custom_fields_table', 1),
(6, '2019_11_12_122144_create_file_types_table', 1),
(7, '2019_11_12_155907_create_tags_table', 1),
(8, '2019_11_13_150331_create_documents_table', 1),
(9, '2019_11_14_144921_create_documents_tags_table', 1),
(10, '2019_11_15_122537_create_files_table', 1),
(11, '2019_11_18_143946_create_permission_tables', 1),
(12, '2019_11_20_155709_create_activities_table', 1),
(13, '2019_11_21_085158_update_custom_fields_add_field', 1),
(14, '2019_11_21_122845_update_activities_add_field_document_id', 1),
(15, '2022_01_08_152604_create_regions_table', 1),
(16, '2022_01_08_153623_create_districts_table', 1),
(17, '2022_01_08_153845_create_villages_table', 1),
(18, '2022_01_08_163632_create_diseases_table', 1),
(19, '2022_01_08_163912_create_specimens_table', 1),
(20, '2022_01_08_163958_create_observations_table', 1),
(21, '2022_01_09_023205_create_tbl_regions_table', 2),
(22, '2022_01_09_023741_create_tbl_districts_table', 2),
(23, '2022_01_09_023913_create_tbl_villages_table', 2),
(24, '2022_01_09_023932_create_tbl_diseases_table', 2),
(25, '2022_01_09_023951_create_tbl_specimens_table', 2),
(26, '2022_01_09_024533_create_tbl_observations_table', 2),
(27, '2022_01_13_171354_create_jobs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `observations`
--

CREATE TABLE `observations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create users', 'web', '2022-01-08 15:05:54', '2022-01-08 15:05:54'),
(2, 'read users', 'web', '2022-01-08 15:05:54', '2022-01-08 15:05:54'),
(3, 'update users', 'web', '2022-01-08 15:05:54', '2022-01-08 15:05:54'),
(4, 'delete users', 'web', '2022-01-08 15:05:55', '2022-01-08 15:05:55'),
(5, 'user manage permission', 'web', '2022-01-08 15:05:55', '2022-01-08 15:05:55'),
(6, 'create tags', 'web', '2022-01-08 15:05:55', '2022-01-08 15:05:55'),
(7, 'read tags', 'web', '2022-01-08 15:05:55', '2022-01-08 15:05:55'),
(8, 'update tags', 'web', '2022-01-08 15:05:55', '2022-01-08 15:05:55'),
(9, 'delete tags', 'web', '2022-01-08 15:05:55', '2022-01-08 15:05:55'),
(10, 'create documents', 'web', '2022-01-08 15:05:55', '2022-01-08 15:05:55'),
(11, 'read documents', 'web', '2022-01-08 15:05:55', '2022-01-08 15:05:55'),
(12, 'update documents', 'web', '2022-01-08 15:05:55', '2022-01-08 15:05:55'),
(13, 'delete documents', 'web', '2022-01-08 15:05:55', '2022-01-08 15:05:55'),
(14, 'verify documents', 'web', '2022-01-08 15:05:55', '2022-01-08 15:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'system_title', 'Integrated OHA', '2022-01-08 15:05:53', '2022-01-08 15:05:53'),
(2, 'system_logo', 'logo.png', '2022-01-08 15:05:53', '2022-01-08 15:05:53'),
(3, 'tags_label_singular', 'tag', '2022-01-08 15:05:53', '2022-01-08 15:05:53'),
(4, 'tags_label_plural', 'tags', '2022-01-08 15:05:53', '2022-01-08 15:05:53'),
(5, 'document_label_singular', 'document', '2022-01-08 15:05:53', '2022-01-08 15:05:53'),
(6, 'document_label_plural', 'documents', '2022-01-08 15:05:53', '2022-01-08 15:05:53'),
(7, 'file_label_singular', 'file', '2022-01-08 15:05:53', '2022-01-08 15:05:53'),
(8, 'file_label_plural', 'files', '2022-01-08 15:05:53', '2022-01-08 15:05:53'),
(9, 'default_file_validations', 'mimes:jpeg,bmp,png,jpg', '2022-01-08 15:05:53', '2022-01-08 15:05:53'),
(10, 'default_file_maxsize', '8', '2022-01-08 15:05:53', '2022-01-08 15:05:53'),
(11, 'image_files_resize', '300,500,700', '2022-01-08 15:05:53', '2022-01-08 15:05:53'),
(12, 'show_missing_files_errors', 'true', '2022-01-08 15:05:53', '2022-01-08 15:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `specimens`
--

CREATE TABLE `specimens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `custom_fields` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_animal_surveillance_final`
--

CREATE TABLE `tbl_animal_surveillance_final` (
  `id` int(11) NOT NULL,
  `upload_header_id` int(11) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `village` varchar(100) DEFAULT NULL,
  `observation_date` varchar(70) DEFAULT NULL,
  `disease` varchar(50) DEFAULT NULL,
  `specie_affected` varchar(100) DEFAULT NULL,
  `cases` int(11) DEFAULT NULL,
  `death` int(11) DEFAULT NULL,
  `not_at_rist` int(11) DEFAULT NULL,
  `treated` int(11) DEFAULT NULL,
  `destroyed` int(11) DEFAULT NULL,
  `slaughtered` int(11) DEFAULT NULL,
  `vaccinated` int(11) DEFAULT NULL,
  `lat` float(11,0) DEFAULT NULL,
  `long` float(11,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_animal_surveillance_final`
--

INSERT INTO `tbl_animal_surveillance_final` (`id`, `upload_header_id`, `region`, `district`, `village`, `observation_date`, `disease`, `specie_affected`, `cases`, `death`, `not_at_rist`, `treated`, `destroyed`, `slaughtered`, `vaccinated`, `lat`, `long`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tanga', 'Pangani', 'Mikunguni', '42444', 'Rabies', 'Dog', 5, 5, 115, 0, 0, 0, 72, -6, 39, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(2, 1, 'Morogoro', 'Morogoro', 'Kibuko', '42461', 'Rabies', 'Dog', 5, 5, 1173, 0, 0, 0, 0, -7, 38, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(3, 1, 'Mbeya', 'Mbozi', 'Mbewe', '42464', 'Rabies', 'Dog', 1, 1, 20, 0, 0, 0, 0, -9, 33, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(4, 1, 'Arusha', 'Arusha', 'Enaboishu', '42476', 'Rabies', 'Dog', 3, 0, 201, 0, 3, 0, 0, -3, 37, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(5, 1, 'Rukwa', 'Mpanda', 'Mpanda', '42482', 'Rabies', 'Dog', 1, 1, 67, 0, 0, 0, 0, -6, 31, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(6, 1, 'Tanga', 'Handeni', 'Kwamaligwa', '42489', 'Rabies', 'Dog', 15, 11, 306, 0, 4, 0, 0, -5, 37, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(7, 1, 'Tanga', 'Handeni', 'Songe', '42496', 'Rabies', 'Dog', 4, 2, 69, NULL, 2, 0, 0, -6, 37, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(8, 1, 'Tanga', 'Handeni', 'Kilindi', '42505', 'Rabies', 'Dog', 20, 16, 292, NULL, 4, 0, 41, -6, 38, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(9, 1, 'Tanga', 'Handeni', 'Kilindi', '42506', 'Rabies', 'Dog', 5, 2, 103, NULL, 0, 0, 13, -6, 38, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(10, 1, 'Tanga', 'Handeni', 'Kilindi', '42507', 'Rabies', 'Dog', 13, 6, 223, NULL, 7, 0, 37, -6, 38, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(11, 1, 'Kilimanjaro', 'Same', 'Same', '42522', 'Rabies', 'Dog', 2, 2, 50, NULL, 0, 0, 0, -4, 38, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(12, 1, 'Tanga', 'Lushoto', 'Lushoto', '42542', 'Rabies', 'Dog', 1, 1, 337, NULL, 0, 0, 0, -5, 38, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(13, 1, 'Tanga', 'Handeni', 'Jungu', '42546', 'Rabies', 'Dog', 17, 10, 153, NULL, 7, 0, 0, -5, 38, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(14, 1, 'Tanga', 'Handeni', 'Songe', '42560', 'Rabies', 'Dog', 2, 1, 95, NULL, 1, 0, 17, -6, 37, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(15, 1, 'Tanga', 'Handeni', 'Songe', '42613', 'Rabies', 'Dog', 11, 11, 207, NULL, 0, 0, 29, -6, 37, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(16, 1, 'Tanga', 'Handeni', 'Songe', '42644', 'Rabies', 'Dog', 7, 5, 251, NULL, 2, 0, 13, -6, 37, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(17, 1, 'Rukwa', 'Mpanda', 'Katavi National Park', '42733', 'Rabies', 'Dog', 2, 2, 50, NULL, 0, 0, 0, -7, 31, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(18, 1, 'Tanga', 'Lushoto', 'Nywelo', '42742', 'Rabies', 'Dog', 2, 2, 57, 0, 0, 0, 52, -5, 39, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(19, 1, 'Rukwa', 'Mpanda', 'Kasanse', '42794', 'Rabies', 'Dog', 1, 1, 157, 0, 0, 0, 0, -7, 32, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(20, 1, 'Rukwa', 'Mpanda', 'Usevia', '42824', 'Rabies', 'Dog', 4, 4, 548, 0, 0, 0, 0, -7, 31, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(21, 1, 'Mara', 'Musoma', 'Bukiroba', '42878', 'Rabies', 'Dog', 4, 1, 185, 4, 0, 0, 0, -2, 34, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(22, 1, 'Arusha', 'Arumeru', 'Sang\'isi', '42917', 'Rabies', 'Dog', 1, 1, 56, 0, 0, 0, 0, 4, 37, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(23, 1, 'Rukwa', 'Mpanda', 'Bulenda', '42921', 'Rabies', 'Dog', 3, 3, 19, 0, 0, 0, 0, -6, 30, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(24, 1, 'Tanga', 'Pangani', 'Mkwaja', '42934', 'Rabies', 'Dog', 2, 2, 183, 0, 0, 0, 5, -6, 39, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(25, 1, 'Kilimanjaro', 'Moshi', 'Himo', '42964', 'Rabies', 'Dog', 1, 1, 34, 0, 0, 0, 10, -3, 38, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(26, 1, 'Rukwa', 'Mpanda', 'Kampemba', '42968', 'Rabies', 'Dog', 6, 6, 99, 0, 0, 0, 0, -7, 31, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(27, 1, 'Rukwa', 'Mpanda', 'Mwenge', '42991', 'Rabies', 'Dog', 7, 3, 205, 0, 0, 0, 0, -6, 31, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(28, 1, 'Tanga', 'Pangani', 'Mivumoni', '42994', 'Rabies', 'Dog', 6, 6, 121, 0, 0, 0, 84, -5, 39, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(29, 1, 'Tanga', 'Handeni', 'Kilindi', '42998', 'Rabies', 'Dog', 16, 10, 200, 0, 0, 0, 0, -6, 38, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(30, 1, 'Dodoma', 'Dodoma', 'Bahi', '43034', 'Rabies', 'Dog', 2, 2, 169, 0, 0, 0, 0, -6, 35, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(31, 1, 'Mara', 'Musoma', 'Bisumwa', '43036', 'Rabies', 'Dog', 4, 4, 56, 0, 0, 0, 20, -2, 34, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(32, 1, 'Geita', 'Geita', 'mwatulole', '43115', 'Rabies', 'Dog', 1, 1, 1, 0, 1, 0, 0, -3, 32, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(33, 1, 'Tanga', 'Kilindi', 'kwamwande', '43151', 'Rabies', 'Canine', 4, 2, 33, 0, 2, 0, 11, -6, 37, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(34, 1, 'Mara', 'Bunda', 'Bunere', '43230', 'Rabies', 'Dog', 1, 1, 162, 0, 0, 0, 0, -2, 34, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(35, 1, 'Arusha', 'Arusha', 'Timbolo Village - Arusha DC', '43255', 'Rabies', 'Goat', 1, 0, 96, 0, 1, 0, 0, -3, 37, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(36, 1, 'Arusha', 'Arusha', 'Sambasha Village - Arusha DC', '43287', 'Rabies', 'Dog', 1, 1, 135, 0, 1, 0, 0, -3, 37, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(37, 1, 'Tanga', 'Muheza', 'Mikocheni', '43326', 'Rabies', 'Dog', 4, 2, 123, 0, 2, 0, 105, -5, 39, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(38, 1, 'Arusha', 'Arusha', 'Olasiti Ward - Arusha City Council', '43326', 'Rabies', 'Canine', 1, 0, 1104, 0, 0, 0, 0, -3, 37, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(39, 1, 'Tanga', 'Muheza', 'mwera', '43328', 'Rabies', 'Dog', 3, 0, 69, 0, 4, 0, 50, -5, 39, '2022-01-14 19:25:43', '2022-01-14 19:25:43'),
(40, 1, 'Dodoma', 'Dodoma Urban', 'Mkekena', '43338', 'Rabies', 'Cattle,Dog', 2, 0, 58, 0, 1, 0, 0, -6, 36, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(41, 1, 'Kilimanjaro', 'Same', 'Majevu', '43356', 'Rabies', 'Dog', 1, 0, 314, 0, 1, 0, 0, -4, 38, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(42, 1, 'Tanga', 'Kilindi', 'Songe,kilindi Tanga', '43361', 'Rabies', 'Dog', 1, 0, 53, 0, 0, 0, 0, -6, 37, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(43, 1, 'Dodoma', 'Kondoa', 'Masange', '43367', 'Rabies', 'Dog', 1, 0, 80, 0, 1, 0, 0, -5, 36, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(44, 1, 'Singida', 'Iramba', 'Kyengege', '43378', 'Rabies', 'Canine', 1, 1, 1, 0, 0, 0, 0, -4, 34, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(45, 1, 'Dar-es-salaam', 'Temeke', 'kimbiji(Golan)', '43417', 'Rabies', 'Canine', 1, 1, 20, 0, 1, 0, 0, -7, 40, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(46, 1, 'Mwanza', 'Ilemela', 'Ilemela mahakama', '43467', 'Rabies', 'Canine', 1, 0, 250, NULL, 1, 0, 0, -2, 33, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(47, 1, 'Simiyu', 'Maswa', 'Nyalikungu', '43486', 'Rabies', 'Dog', 1, 1, 82, NULL, 1, 0, 17, -3, 34, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(48, 1, 'Rukwa', 'Kalambo', 'Zyangoma village at Mwimbi ward', '43491', 'Rabies', 'Cattle', 2, 2, 250, NULL, 2, 0, 0, -8, 32, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(49, 1, 'Kigoma', 'Kasulu Township Authority', 'Mwilamvya', '43515', 'Rabies', 'Dog', 1, 0, 1, NULL, 1, 0, 0, -5, 30, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(50, 1, 'Morogoro', 'Kilombero', 'Malinyi', '43556', 'Rabies', 'Dog', 7, 7, 7000, NULL, 0, 0, 0, -8, 36, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(51, 1, 'Tabora', 'Nzega', 'ipilili', '43562', 'Rabies', 'Dog', 1, 1, 0, NULL, 0, 0, 0, -4, 33, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(52, 1, 'Tabora', 'Nzega', 'Kitongo B', '43562', 'Rabies', 'Dog', 1, 1, 0, NULL, 0, 0, 0, -4, 33, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(53, 1, 'Tanga', 'Kilindi', 'vilindwa village kilindi Tanga', '43578', 'Rabies', 'Dog', 1, 1, 7, NULL, 1, 0, 0, -6, 37, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(54, 1, 'Mbeya', 'Chunya', 'sinjilili', '43666', 'Rabies', 'Dog', 1, 0, 320, NULL, 1, 0, 241, -9, 33, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(55, 1, 'Mbeya', 'Chunya', 'sinjilili', '43666', 'Rabies', 'Dog', 1, 0, 320, NULL, 1, 0, 241, -9, 33, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(56, 1, 'Kilimanjaro', 'Siha', 'kishisha', '43670', 'Rabies', 'Canine', 1, 1, 2, NULL, 1, 0, 2, -3, 37, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(57, 1, 'Ruvuma', 'Tunduru', 'Nangunguru', '43689', 'Rabies', 'Dog', 3, 0, 125, NULL, 0, 0, 0, -11, 37, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(58, 1, 'Kigoma', 'Kibondo', 'Busunzu', '43693', 'Rabies', 'Cattle', 1, 0, 5, NULL, 0, 0, 0, -4, 31, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(59, 1, 'Simiyu', 'Busega', 'Bulima', '43707', 'Rabies', 'Dog', 1, 0, 2, NULL, 0, 0, 0, -2, 34, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(60, 1, 'Manyara', 'Hanang', 'Gehandu Hanang Mnyara', '43731', 'Rabies', 'Canine', 1, 1, 45, NULL, 0, 0, 0, -5, 35, '2022-01-14 19:25:44', '2022-01-14 19:25:44'),
(61, 1, 'Ruvuma', 'Tunduru', 'Jiungeni village_ Mtina ward', '43738', 'Rabies', 'Dog,Donkey,Cattle', 4, 3, 134, NULL, 4, 0, 0, -11, 37, '2022-01-14 19:25:45', '2022-01-14 19:25:45'),
(62, 1, 'Ruvuma', 'Tunduru', 'Nakayaya _x000D_CDC', '43785', 'Rabies', 'Dog', 2, 2, 5, NULL, 0, 0, 0, -11, 37, '2022-01-14 19:25:45', '2022-01-14 19:25:45'),
(63, 1, 'Njombe', 'Makete', 'makete(Misiwa Village)', '43813', 'Rabies', 'Dog', 1, 0, 1, NULL, 1, 0, 0, -9, 34, '2022-01-14 19:25:45', '2022-01-14 19:25:45'),
(64, 1, 'Mwanza', 'Sengerema', 'Nyatukala', '44175', 'Rabies', 'Dogs', 1, 0, 1, 0, 0, 0, 0, -3, 33, '2022-01-14 19:25:45', '2022-01-14 19:25:45'),
(65, 1, 'Mtwara', 'Nanyumbu', 'MKUULA', '44161', 'Rabies', 'Goats', 1, 1, 6, 0, 0, 0, 0, -11, 39, '2022-01-14 19:25:45', '2022-01-14 19:25:45'),
(66, 1, 'Morogoro', 'Morogoro', 'Mvuha Ward', '44092', 'Rabies', 'Canine', 1, 1, 86, 0, 0, 0, 0, -7, 38, '2022-01-14 19:25:45', '2022-01-14 19:25:45'),
(67, 1, 'Tabora', 'Urambo', 'Ukondamoyo ward/n\'holongo village', '43972', 'Rabies', 'Dogs', 1, 0, 0, 0, 0, 0, 0, -5, 32, '2022-01-14 19:25:45', '2022-01-14 19:25:45'),
(68, 1, 'Mbeya', 'Mbozi', 'Nambinzo Mbozi', '43964', 'Rabies', 'Canine', 1, 0, 2, 0, 0, 0, 0, -9, 33, '2022-01-14 19:25:45', '2022-01-14 19:25:45'),
(69, 1, 'Ruvuma', 'Tunduru', 'Namakambale', '43950', 'Rabies', 'Dogs', 6, 1, 53, 0, 0, 0, 12, -11, 37, '2022-01-14 19:25:45', '2022-01-14 19:25:45'),
(70, 1, 'Tabora', 'Urambo', 'izenga batogilwe', '43937', 'Rabies', 'Dogs', 2, 0, 0, 2, 2, 0, 0, -5, 32, '2022-01-14 19:25:45', '2022-01-14 19:25:45'),
(71, 1, 'Tabora', 'Urambo', 'osterbay', '43933', 'Rabies', 'Dogs', 2, 1, 0, 0, 0, 0, 0, -5, 32, '2022-01-14 19:25:45', '2022-01-14 19:25:45'),
(72, 1, 'Tanga', 'Pangani', 'Bushiri', '43907', 'Rabies', 'Canine', 3, 0, 110, 3, 3, 0, 67, -5, 39, '2022-01-14 19:25:45', '2022-01-14 19:25:45'),
(73, 1, 'Tabora', 'Nzega', 'utemini', '43906', 'Rabies', 'Canine', 0, 1, 0, 0, 0, 0, 0, -4, 33, '2022-01-14 19:25:45', '2022-01-14 19:25:45'),
(74, 1, 'Tabora', 'Nzega', 'majengo', '43895', 'Rabies', 'Dogs', 1, 1, 0, 0, 0, 0, 0, -4, 33, '2022-01-14 19:25:45', '2022-01-14 19:25:45'),
(75, 1, 'Ruvuma', 'Tunduru', 'Matemanga', '43874', 'Rabies', 'Dogs', 2, 2, 250, 0, 0, 0, 0, -11, 37, '2022-01-14 19:25:45', '2022-01-14 19:25:45'),
(76, 1, 'Tabora', 'Urambo', 'ugalla', '43861', 'Rabies', 'Canine', 4, 0, 9904, 1, 1, 0, 0, -5, 32, '2022-01-14 19:25:45', '2022-01-14 19:25:45'),
(77, 1, 'Kagera', 'Ngara', 'Ngara Mjini', '43850', 'Rabies', 'Dogs', 1, 0, 0, 0, 0, 0, 0, -3, 31, '2022-01-14 19:25:45', '2022-01-14 19:25:45'),
(78, 1, 'Dar-es-salaam', 'Temeke', 'Buza', '43848', 'Rabies', 'Dogs', 1, 0, 2, 1, 1, 0, 0, -7, 39, '2022-01-14 19:25:45', '2022-01-14 19:25:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_animal_surveillance_staging`
--

CREATE TABLE `tbl_animal_surveillance_staging` (
  `id` int(11) NOT NULL,
  `upload_header_id` int(11) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `village` varchar(100) DEFAULT NULL,
  `observation_date` varchar(70) DEFAULT NULL,
  `disease` varchar(50) DEFAULT NULL,
  `specie_affected` varchar(100) DEFAULT NULL,
  `cases` varchar(10) DEFAULT NULL,
  `death` varchar(10) DEFAULT NULL,
  `not_at_rist` varchar(10) DEFAULT NULL,
  `treated` varchar(10) DEFAULT NULL,
  `destroyed` varchar(10) DEFAULT NULL,
  `slaughtered` varchar(10) DEFAULT NULL,
  `vaccinated` varchar(10) DEFAULT NULL,
  `lat` float(11,0) DEFAULT NULL,
  `long` float(11,0) DEFAULT NULL,
  `status` int(1) DEFAULT 0,
  `valid_status` int(1) DEFAULT 0,
  `reject_reason` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_councils`
--

CREATE TABLE `tbl_councils` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_councils`
--

INSERT INTO `tbl_councils` (`id`, `name`, `region_id`) VALUES
(1, 'Ilala Municipal Council', 1),
(2, 'Kigamboni Municipal Council', 1),
(3, 'Kinondoni Municipal Council', 1),
(4, 'Temeke Municipal Council', 1),
(5, 'Ubungo Municipal Council', 1),
(6, 'Bagamoyo District Council', 2),
(7, 'Chalinze District Council', 2),
(8, 'Kibaha District Council', 2),
(9, 'Kibaha Town Council', 2),
(10, 'Kibiti District Council', 2),
(11, 'Kisarawe District Council', 2),
(12, 'Mafia District Council', 2),
(13, 'Mkuranga District Council', 2),
(14, 'Rufiji District Council', 2),
(15, 'Gairo District Council', 3),
(16, 'Ifakara Town Council', 3),
(17, 'Kilosa District Council', 3),
(18, 'Malinyi District Council', 3),
(19, 'Mlimba District Council', 3),
(20, 'Morogoro District Council', 3),
(21, 'Morogoro Municipal Council', 3),
(22, 'Mvomero District Council', 3),
(23, 'Ulanga District Council', 3),
(24, 'Bahi District Council', 4),
(25, 'Chamwino District Council', 4),
(26, 'Chemba District Council', 4),
(27, 'Dodoma Municipal Council', 4),
(28, 'Kondoa District Council', 4),
(29, 'Kondoa Town Council', 4),
(30, 'Kongwa District Council', 4),
(31, 'Mpwapwa District Council', 4),
(32, 'Ikungi District Council', 5),
(33, 'Iramba District Council', 5),
(34, 'Itigi District Council', 5),
(35, 'Manyoni District Council', 5),
(36, 'Mkalama District Council', 5),
(37, 'Singida District Council', 5),
(38, 'Singida Municipal Council', 5),
(39, 'Bukombe District Council', 6),
(40, 'Chato District Council', 6),
(41, 'Geita District Council', 6),
(42, 'Geita Town council', 6),
(43, 'Mbogwe District Council', 6),
(44, 'Nyang\'hwale District Council', 6),
(45, 'Biharamulo District Council', 7),
(46, 'Bukoba District Council', 7),
(47, 'Bukoba Municipal Council', 7),
(48, 'Karagwe District Council', 7),
(49, 'Kyerwa District Council', 7),
(50, 'Missenyi District Council', 7),
(51, 'Muleba District Council', 7),
(52, 'Ngara District Council', 7),
(53, 'Bunda District Council', 7),
(54, 'Bunda Town Council', 8),
(55, 'Butiama District Council', 8),
(56, 'Musoma District Council', 8),
(57, 'Musoma Municipal Council', 8),
(58, 'Rorya District Council', 8),
(59, 'Serengeti District Council', 8),
(60, 'Tarime District Council', 8),
(61, 'Tarime Town Council', 8),
(62, 'Ilemela Municipal Council', 9),
(63, 'Kwimba District Council', 9),
(64, 'Magu District Council', 9),
(65, 'Misungwi District Council', 9),
(66, 'Nyamagana Municipal Council', 9),
(67, 'Sengerema District Council', 9),
(68, 'Buchosa District Council', 9),
(69, 'Ukerewe District Council', 9),
(70, 'Arusha City Council', 10),
(71, 'Arusha District Council', 10),
(72, 'Karatu District Council', 10),
(73, 'Longido District Council', 10),
(74, 'Meru District Council', 10),
(75, 'Monduli District Council', 10),
(76, 'Ngorongoro District Council', 10),
(77, 'Hai District Council', 11),
(78, 'Moshi District Council', 11),
(79, 'Moshi Municipal Council', 11),
(80, 'Mwanga District Council', 11),
(81, 'Rombo District Council', 11),
(82, 'Same District Council', 11),
(83, 'Siha District Council', 11),
(84, 'Babati District Council', 12),
(85, 'Babati Town Council', 12),
(86, 'Hanang District Council', 12),
(87, 'Kiteto District Council', 12),
(88, 'Mbulu District Council', 12),
(89, 'Mbulu Town Council', 12),
(90, 'Simanjiro District Council', 12),
(91, 'Bumbuli District Council', 13),
(92, 'Handeni District Council', 13),
(93, 'Handeni Town Council', 13),
(94, 'Kilindi District Council', 13),
(95, 'Korogwe District Council', 13),
(96, 'Korogwe Town Council', 13),
(97, 'Lushoto District Council', 13),
(98, 'Mkinga District Council', 13),
(99, 'Muheza District Council', 13),
(100, 'Pangani District Council', 13),
(101, 'Tanga City Council', 13),
(102, 'Iringa District Council', 14),
(103, 'Iringa Municipal Council', 14),
(104, 'Kilolo District Council', 14),
(105, 'Mafinga Town Council', 14),
(106, 'Mufindi District Council', 14),
(107, 'Mlele District Council', 15),
(108, 'Mpanda Municipal Council', 15),
(109, 'Mpimbwe District Council', 15),
(110, 'Nsimbo District Council', 15),
(111, 'Tanganyika District Council', 15),
(112, 'Busokelo District Council', 16),
(113, 'Chunya District Council', 16),
(114, 'Kyela District Council', 16),
(115, 'Mbarali District Council', 16),
(116, 'Mbeya City Council', 16),
(117, 'Mbeya District Council', 16),
(118, 'Rungwe District Council', 16),
(119, 'Ludewa District Council', 17),
(120, 'Makambako Town Council', 17),
(121, 'Makete District Council', 17),
(122, 'Njombe District Council', 17),
(123, 'Njombe Town Council', 17),
(124, 'Wanging\'ombe District Council', 17),
(125, 'Kalambo District Council', 18),
(126, 'Nkasi District Council', 18),
(127, 'Sumbawanga District Council', 18),
(128, 'Sumbawanga Municipal Council', 18),
(129, 'Ileje District Council', 19),
(130, 'Mbozi District Council', 19),
(131, 'Momba District Council', 19),
(132, 'Songwe District Council', 19),
(133, 'Tunduma Town Council', 19),
(134, 'Masasi District Council', 20),
(135, 'Masasi Town Council', 20),
(136, 'Mtwara District Council', 20),
(137, 'Mtwara Municipal Council', 20),
(138, 'Nanyamba Town Council', 20),
(139, 'Nanyumbu District Council', 20),
(140, 'Newala District Council', 20),
(141, 'Newala Town Council', 20),
(142, 'Tandahimba District Council', 20),
(143, 'Kilwa District Council', 21),
(144, 'Lindi Municipal Council', 21),
(145, 'Liwale District Council', 21),
(146, 'Mtama District Council', 21),
(147, 'Nachingwea District Council', 21),
(148, 'Ruangwa District Council', 21),
(149, 'Madaba District Council', 22),
(150, 'Mbinga District Council', 22),
(151, 'Mbinga Town Council', 22),
(152, 'Namtumbo District Council', 22),
(153, 'Nyasa District Council', 22),
(154, 'Songea District Council', 22),
(155, 'Songea Municipal Council', 22),
(156, 'Tunduru District Council', 22),
(157, 'Buhigwe District Council', 23),
(158, 'Kakonko District Council', 23),
(159, 'Kasulu District Council', 23),
(160, 'Kasulu Town Council', 23),
(161, 'Kibondo District Council', 23),
(162, 'Kigoma District Council', 23),
(163, 'Kigoma Municipal Council', 23),
(164, 'Uvinza District Council', 23),
(165, 'Bariadi District Council', 24),
(166, 'Bariadi Town Council', 24),
(167, 'Busega District Council', 24),
(168, 'Itilima District Council', 24),
(169, 'Maswa District Council', 24),
(170, 'Meatu District Council', 24),
(171, 'Kahama Town Council', 25),
(172, 'Kishapu District Council', 25),
(173, 'Msalala District Council', 25),
(174, 'Shinyanga District Council', 25),
(175, 'Shinyanga Municipal Council', 25),
(176, 'Ushetu District Council', 25),
(177, 'Igunga District Council', 26),
(178, 'Kaliua District Council', 26),
(179, 'Nzega District Council', 26),
(180, 'Nzega Town Council', 26),
(181, 'Sikonge District Council', 26),
(182, 'Tabora Municipal Council', 26),
(183, 'Urambo District Council', 26),
(184, 'Uyui District Council', 26);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diseases`
--

CREATE TABLE `tbl_diseases` (
  `dis_id` int(10) UNSIGNED NOT NULL,
  `dis_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_districts`
--

CREATE TABLE `tbl_districts` (
  `dist_id` int(10) UNSIGNED NOT NULL,
  `dist_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `regid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_human_surveillance_final`
--

CREATE TABLE `tbl_human_surveillance_final` (
  `id` int(11) DEFAULT NULL,
  `upload_header_id` int(11) DEFAULT NULL,
  `organisation_unit_name` varchar(200) DEFAULT NULL,
  `organisation_unit_code` varchar(100) DEFAULT NULL,
  `disease` varchar(100) DEFAULT NULL,
  `one_month_to_below_five_year` int(11) DEFAULT 0,
  `five_to_below_sixty_years` int(11) DEFAULT 0,
  `observation_date` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_human_surveillance_staging`
--

CREATE TABLE `tbl_human_surveillance_staging` (
  `id` int(11) NOT NULL,
  `upload_header_id` int(11) DEFAULT NULL,
  `organisation_unit_name` varchar(200) DEFAULT NULL,
  `organisation_unit_code` varchar(100) DEFAULT NULL,
  `disease` varchar(100) DEFAULT NULL,
  `zero_year` varchar(10) DEFAULT '0',
  `one_to_below_five_years` varchar(10) DEFAULT '0',
  `five_to_below_sixty_years` varchar(10) DEFAULT '0',
  `observation_date` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT 0,
  `valid_status` int(1) DEFAULT 0,
  `reject_reason` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_observations`
--

CREATE TABLE `tbl_observations` (
  `obs_id` int(10) UNSIGNED NOT NULL,
  `vill_id` int(10) UNSIGNED NOT NULL,
  `spec_id` int(10) UNSIGNED NOT NULL,
  `dis_id` int(10) UNSIGNED NOT NULL,
  `obs_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `obs_cases` int(11) NOT NULL,
  `obs_death` int(11) NOT NULL,
  `obs_not_risked` int(11) NOT NULL,
  `obs_treated` int(11) NOT NULL,
  `obs_destroyed` int(11) NOT NULL,
  `obs_slaughter` int(11) NOT NULL,
  `obs_vaccinated` int(11) NOT NULL,
  `obs_lng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `obs_lat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_regions`
--

CREATE TABLE `tbl_regions` (
  `reg_id` int(10) UNSIGNED NOT NULL,
  `reg_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_regionss`
--

CREATE TABLE `tbl_regionss` (
  `id` int(11) NOT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_regionss`
--

INSERT INTO `tbl_regionss` (`id`, `zone_id`, `name`) VALUES
(1, 1, 'Dar es Salaam '),
(2, 1, 'Pwani'),
(3, 1, 'Morogoro'),
(4, 2, 'Dodoma'),
(5, 2, 'Singida'),
(6, 3, 'Geita'),
(7, 3, 'Kagera'),
(8, 3, 'Mara'),
(9, 3, 'Mwanza'),
(10, 4, 'Arusha'),
(11, 4, 'Kilimanjaro'),
(12, 4, 'Manyara'),
(13, 4, 'Tanga'),
(14, 5, 'Iringa'),
(15, 5, 'Katavi'),
(16, 5, 'Mbeya'),
(17, 5, 'Njombe'),
(18, 5, 'Rukwa'),
(19, 5, 'Songwe'),
(20, 6, 'Mtwara'),
(21, 6, 'Lindi'),
(22, 6, 'Ruvuma'),
(23, 7, 'Kigoma'),
(24, 7, 'Simiyu'),
(25, 7, 'Shinyanga'),
(26, 7, 'Tabora');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_specimens`
--

CREATE TABLE `tbl_specimens` (
  `spec_id` int(10) UNSIGNED NOT NULL,
  `spec_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spec_age` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_villages`
--

CREATE TABLE `tbl_villages` (
  `vill_id` int(10) UNSIGNED NOT NULL,
  `vill_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dist_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_zones`
--

CREATE TABLE `tbl_zones` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_zones`
--

INSERT INTO `tbl_zones` (`id`, `name`) VALUES
(1, 'Eastern Zone '),
(2, 'Central Zone'),
(3, 'Lake Zone'),
(4, 'Nothern Zone'),
(5, 'Southern Highlands Zone'),
(6, 'Southern Zone'),
(7, 'Unknown Zone');

-- --------------------------------------------------------

--
-- Table structure for table `upload_header`
--

CREATE TABLE `upload_header` (
  `id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `file_path` varchar(200) DEFAULT NULL,
  `total_success` int(11) DEFAULT 0,
  `total_failed` int(11) DEFAULT 0,
  `status` int(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_header`
--

INSERT INTO `upload_header` (`id`, `type`, `file_name`, `file_path`, `total_success`, `total_failed`, `status`, `created_at`, `updated_at`) VALUES
(6, 1, 'Human Surveillances', NULL, 0, 0, 0, '2022-04-23 08:21:01', '2022-04-23 08:21:01'),
(7, 1, 'Human Surveillances', NULL, 0, 0, 0, '2022-04-23 08:23:57', '2022-04-23 08:23:57'),
(8, 1, 'Human Surveillances', NULL, 0, 0, 0, '2022-04-23 08:24:27', '2022-04-23 08:24:27'),
(9, 1, 'Human Surveillances', NULL, 0, 0, 0, '2022-04-23 08:27:25', '2022-04-23 08:27:25'),
(10, 2, 'Animal Surveillance', NULL, 0, 0, 0, '2022-04-23 08:29:45', '2022-04-23 08:29:45'),
(11, 2, 'Animal Surveillance', NULL, 1, 0, 1, '2022-04-23 06:00:59', '2022-04-23 08:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `address`, `description`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, 'super', NULL, NULL, NULL, '$2y$10$26JVKJlFc1T/mdNnc4ctLuXFe1XgYEZuEm8YZrDflAFFAf7wJ184.', 'ACTIVE', NULL, '2022-01-08 15:05:54', '2022-01-08 15:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_permissions`
--

CREATE TABLE `user_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_has_roles`
--

CREATE TABLE `user_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_created_by_foreign` (`created_by`),
  ADD KEY `activities_document_id_foreign` (`document_id`);

--
-- Indexes for table `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_created_by_foreign` (`created_by`),
  ADD KEY `documents_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `documents_tags`
--
ALTER TABLE `documents_tags`
  ADD PRIMARY KEY (`document_id`,`tag_id`),
  ADD KEY `documents_tags_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_document_id_foreign` (`document_id`),
  ADD KEY `files_file_type_id_foreign` (`file_type_id`),
  ADD KEY `files_created_by_foreign` (`created_by`);

--
-- Indexes for table `file_types`
--
ALTER TABLE `file_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `observations`
--
ALTER TABLE `observations`
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
-- Indexes for table `regions`
--
ALTER TABLE `regions`
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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_name_unique` (`name`);

--
-- Indexes for table `specimens`
--
ALTER TABLE `specimens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags_created_by_foreign` (`created_by`);

--
-- Indexes for table `tbl_animal_surveillance_final`
--
ALTER TABLE `tbl_animal_surveillance_final`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_animal_surveillance_staging`
--
ALTER TABLE `tbl_animal_surveillance_staging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_councils`
--
ALTER TABLE `tbl_councils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_diseases`
--
ALTER TABLE `tbl_diseases`
  ADD PRIMARY KEY (`dis_id`);

--
-- Indexes for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  ADD PRIMARY KEY (`dist_id`),
  ADD KEY `tbl_districts_regid_foreign` (`regid`);

--
-- Indexes for table `tbl_human_surveillance_staging`
--
ALTER TABLE `tbl_human_surveillance_staging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_observations`
--
ALTER TABLE `tbl_observations`
  ADD PRIMARY KEY (`obs_id`),
  ADD KEY `tbl_observations_vill_id_foreign` (`vill_id`),
  ADD KEY `tbl_observations_spec_id_foreign` (`spec_id`),
  ADD KEY `tbl_observations_dis_id_foreign` (`dis_id`);

--
-- Indexes for table `tbl_regions`
--
ALTER TABLE `tbl_regions`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `tbl_regionss`
--
ALTER TABLE `tbl_regionss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_specimens`
--
ALTER TABLE `tbl_specimens`
  ADD PRIMARY KEY (`spec_id`);

--
-- Indexes for table `tbl_villages`
--
ALTER TABLE `tbl_villages`
  ADD PRIMARY KEY (`vill_id`),
  ADD KEY `tbl_villages_dist_id_foreign` (`dist_id`);

--
-- Indexes for table `tbl_zones`
--
ALTER TABLE `tbl_zones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_zones_id_uindex` (`id`);

--
-- Indexes for table `upload_header`
--
ALTER TABLE `upload_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_has_permissions`
--
ALTER TABLE `user_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`user_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`user_id`,`model_type`);

--
-- Indexes for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD PRIMARY KEY (`role_id`,`user_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`user_id`,`model_type`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `file_types`
--
ALTER TABLE `file_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `observations`
--
ALTER TABLE `observations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `specimens`
--
ALTER TABLE `specimens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_animal_surveillance_final`
--
ALTER TABLE `tbl_animal_surveillance_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tbl_animal_surveillance_staging`
--
ALTER TABLE `tbl_animal_surveillance_staging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbl_councils`
--
ALTER TABLE `tbl_councils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `tbl_diseases`
--
ALTER TABLE `tbl_diseases`
  MODIFY `dis_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  MODIFY `dist_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_human_surveillance_staging`
--
ALTER TABLE `tbl_human_surveillance_staging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_observations`
--
ALTER TABLE `tbl_observations`
  MODIFY `obs_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_regions`
--
ALTER TABLE `tbl_regions`
  MODIFY `reg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_regionss`
--
ALTER TABLE `tbl_regionss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_specimens`
--
ALTER TABLE `tbl_specimens`
  MODIFY `spec_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_villages`
--
ALTER TABLE `tbl_villages`
  MODIFY `vill_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload_header`
--
ALTER TABLE `upload_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `villages`
--
ALTER TABLE `villages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `activities_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `documents_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `documents_tags`
--
ALTER TABLE `documents_tags`
  ADD CONSTRAINT `documents_tags_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `documents_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `files_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `files_file_type_id_foreign` FOREIGN KEY (`file_type_id`) REFERENCES `file_types` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  ADD CONSTRAINT `tbl_districts_regid_foreign` FOREIGN KEY (`regid`) REFERENCES `tbl_regions` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_observations`
--
ALTER TABLE `tbl_observations`
  ADD CONSTRAINT `tbl_observations_dis_id_foreign` FOREIGN KEY (`dis_id`) REFERENCES `tbl_districts` (`dist_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_observations_spec_id_foreign` FOREIGN KEY (`spec_id`) REFERENCES `tbl_specimens` (`spec_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_observations_vill_id_foreign` FOREIGN KEY (`vill_id`) REFERENCES `tbl_villages` (`vill_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_villages`
--
ALTER TABLE `tbl_villages`
  ADD CONSTRAINT `tbl_villages_dist_id_foreign` FOREIGN KEY (`dist_id`) REFERENCES `tbl_districts` (`dist_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_has_permissions`
--
ALTER TABLE `user_has_permissions`
  ADD CONSTRAINT `user_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD CONSTRAINT `user_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
