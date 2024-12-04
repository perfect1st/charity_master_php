-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2024 at 03:10 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charity_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departement_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `articles_title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articles_title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articles_subject_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articles_subject_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articles_subject_ar2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articles_subject_en2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articles_isactive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `articles_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articles_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articles_image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articles_image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articles_image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articles_address_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articles_address_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articles_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articles_map` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articles_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articles_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `departement_id`, `articles_title_ar`, `articles_title_en`, `articles_subject_ar`, `articles_subject_en`, `articles_subject_ar2`, `articles_subject_en2`, `articles_isactive`, `articles_image`, `articles_date`, `articles_image2`, `articles_image3`, `articles_image4`, `articles_address_ar`, `articles_address_en`, `articles_rate`, `articles_map`, `articles_keyword`, `articles_desc`, `created_at`, `updated_at`, `price`) VALUES
(1, '1', 'ساعد الاطفال المحتاجين', 'help poor people', 'مع وجود الكثير لاستهلاكه وقلة الوقت، فإن ابتكار أفكار لعناوين ذات صلة أمر ضروري', 'With so much to consume and so little time, coming up with relevant title ideas is essential.', NULL, NULL, 'active', '1733046993banner.png', '2024,01st Dec,(Sun) ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-01 07:56:33', '2024-12-01 07:56:33', NULL),
(2, '2', 'جمع التبرعات', 'collect donates', 'لوريم إيبسوم، أو كما يُعرف أحيانًا بـ&quot;ليبسم&quot;، هو نص تجريبي يُستخدم في تصميم المطبوعات.', 'Lorem Ipsum, sometimes referred to as &quot;Lipsum,&quot; is placeholder text used in print design.', NULL, NULL, 'active', '17330517541.png', '2024,01st Dec,(Sun) ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-01 09:15:54', '2024-12-01 09:15:54', NULL),
(3, '2', 'حملة التبرع بالدم', 'Blood Donation Campaign', 'لوريم إيبسوم، أو كما يُعرف أحيانًا بـ&quot;ليبسم&quot;، هو نص تجريبي يُستخدم في تصميم المطبوعات.', 'Lorem Ipsum, sometimes referred to as &quot;Lipsum,&quot; is placeholder text used in print design.', NULL, NULL, 'active', '17330518782.png', '2024,01st Dec,(Sun) ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-01 09:17:58', '2024-12-01 09:17:58', NULL),
(4, '2', 'متطوع ودود', 'Friendly Volunteer', 'لوريم إيبسوم، أو كما يُعرف أحيانًا بـ&quot;ليبسم&quot;، هو نص تجريبي يُستخدم في تصميم المطبوعات.', 'Lorem Ipsum, sometimes referred to as &quot;Lipsum,&quot; is placeholder text used in print design.', NULL, NULL, 'active', '17330521613.png', '2024,01st Dec,(Sun) ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-01 09:22:41', '2024-12-01 09:22:41', NULL),
(5, '4', 'شاهد أحدث أنشطتنا', 'last activities', 'لوريم إيبسوم، أو كما يُعرف أحيانًا بـ&quot;ليبسم&quot;، هو نص تجريبي يُستخدم في تصميم المطبوعات.', 'Lorem Ipsum, sometimes referred to as &quot;Lipsum,&quot; is placeholder text used in print design.', '', '', 'active', '1733053806man.png', '2024,01st Dec,(Sun) ', NULL, NULL, NULL, 'https://www.youtube.com/watch?v=jfKfPfyJRdk', NULL, NULL, NULL, NULL, NULL, '2024-12-01 09:50:06', '2024-12-01 10:03:16', NULL),
(6, '5', 'ساعدنا في ارسال الطعام', 'help us to send food', 'الفقرة تُنسب إلى مُعدّ الطباعة المجهول في القرن الذي يُعتقد أنه...', 'The passage is attributed to an unknown typesetter in the century who is thought', 'الهدف: $9000.00', 'Goal: $9000.00', 'active', '17330553041.png', '2024,01st Dec,(Sun) ', NULL, NULL, NULL, 'البداية: $5000.00', 'Raised: $5000.00', NULL, NULL, '30%', NULL, '2024-12-01 10:15:04', '2024-12-01 10:24:39', NULL),
(7, '5', 'توفير الملابس', 'clothes', 'الفقرة تُنسب إلى مُعدّ الطباعة المجهول في القرن الذي يُعتقد أنه...', 'The passage is attributed to an unknown typesetter in the century who is thought', 'الهدف: $9000.00', 'Goal: $9000.00', 'active', '17330598822.png', '2024,01st Dec,(Sun) ', NULL, NULL, NULL, 'البداية: $5000.00', 'Raised: $5000.00', NULL, NULL, '30%', NULL, '2024-12-01 11:31:22', '2024-12-01 11:33:38', NULL),
(8, '6', 'الحدث المنتهي', 'event', '', '', NULL, NULL, 'active', NULL, '2024,01st Dec,(Sun) ', NULL, NULL, NULL, '120', NULL, NULL, NULL, NULL, NULL, '2024-12-01 11:55:40', '2024-12-01 11:55:40', NULL),
(9, '6', 'الحدث المنتهي', 'event', '', '', NULL, NULL, 'active', NULL, '2024,01st Dec,(Sun) ', NULL, NULL, NULL, '80', NULL, NULL, NULL, NULL, NULL, '2024-12-01 11:56:10', '2024-12-01 11:56:10', NULL),
(10, '6', 'الحدث المنتهي', 'event', '', '', NULL, NULL, 'active', NULL, '2024,01st Dec,(Sun) ', NULL, NULL, NULL, '50', NULL, NULL, NULL, NULL, NULL, '2024-12-01 11:58:34', '2024-12-01 11:58:34', NULL),
(11, '6', 'الحدث المنتهي', 'event', '', '', NULL, NULL, 'active', NULL, '2024,01st Dec,(Sun) ', NULL, NULL, NULL, '90', NULL, NULL, NULL, NULL, NULL, '2024-12-01 11:58:49', '2024-12-01 11:58:49', NULL),
(12, '7', 'تعليم الاطفال الافارقة', 'education for africans', 'الفقرة تُنسب إلى معد الطباعة المجهول في القرن الذي يُعتقد أنه...', 'The passage experienced a surge in popularity during the1960s when used it on their sheets, and again', NULL, NULL, 'active', '17330639441.png', '2024,01st Dec,(Sun) ', NULL, NULL, NULL, 'July 18, 2019', 'July 18, 2019', NULL, NULL, NULL, NULL, '2024-12-01 12:39:04', '2024-12-01 12:39:04', NULL),
(13, '7', 'توصيل المياه النقية', 'Pure Water Is More Essential', 'الفقرة تُنسب إلى معد الطباعة المجهول في القرن الذي يُعتقد أنه...', 'The passage experienced a surge in popularity during the 1960s when used it on their  sheets, and again', NULL, NULL, 'active', '17330641222.png', '2024,01st Dec,(Sun) ', NULL, NULL, NULL, 'July 18, 2019', 'July 18, 2019', NULL, NULL, NULL, NULL, '2024-12-01 12:42:02', '2024-12-01 12:42:02', NULL),
(14, '4', NULL, NULL, 'لوريم إيبسوم دولور سيت أميت، كونسيكتتور أديبيسيسينغ إيليت، سيد دو إيوسمد تيمبور إنسيديدنت يوت لابوري.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore dolore magna aliqua. enim minim veniam, quis nostrud exercitation.', NULL, NULL, 'active', NULL, '2024,02nd Dec,(Mon) ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-02 07:35:15', '2024-12-02 07:35:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_fatherid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_isactive` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_isbranch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_showdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_fatherid`, `department_title_ar`, `department_title_en`, `department_isactive`, `department_isbranch`, `department_showdate`, `department_image`, `created_at`, `updated_at`, `price`) VALUES
(1, NULL, 'banner', 'banner', 'active', 'inactive', NULL, NULL, '2024-12-01 07:46:47', '2024-12-01 07:46:47', NULL),
(2, NULL, 'دافع المساعدة', 'Reason of Helping', 'active', 'inactive', NULL, NULL, '2024-12-01 09:11:52', '2024-12-01 09:27:07', NULL),
(4, NULL, 'مقالات', 'articles', 'active', 'inactive', NULL, NULL, '2024-12-01 09:48:07', '2024-12-01 09:48:07', NULL),
(5, NULL, 'القضايا الشائعة', 'popular cases', 'active', 'inactive', NULL, NULL, '2024-12-01 10:04:54', '2024-12-01 10:04:54', NULL),
(6, NULL, 'الاحصائيات', 'الاحصائيات', 'active', 'inactive', NULL, NULL, '2024-12-01 11:54:43', '2024-12-01 11:54:43', NULL),
(7, NULL, 'الأخبار & التحديثات', 'News & Updates', 'active', 'inactive', NULL, NULL, '2024-12-01 12:16:44', '2024-12-01 12:16:44', NULL);

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
(5, '2022_09_29_121110_create_articles_table', 1),
(6, '2022_09_29_121334_create_departments_table', 1),
(7, '2022_09_29_121641_create_settings_table', 1),
(8, '2022_09_29_133515_add_rule_id_to_users_table', 1),
(9, '2022_10_03_110006_add_price_to_articles_table', 1),
(10, '2022_10_03_110920_add_price_to_departments_table', 1),
(11, '2022_10_08_161247_create_orders_table', 1),
(12, '2022_10_30_152738_create_testominals_table', 1),
(13, '2022_12_06_115412_create_contact_us_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clinic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_title_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_title_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_site_email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_site_address_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_site_address_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_googlemap` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_facebookurl` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_twitterurl` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_googleplusurl` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_instgramurl` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_snapchaturl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_linkedinurl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_youtubeurl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_whatsappurl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_sitetell1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_title_ar`, `setting_title_en`, `setting_site_email`, `setting_keywords`, `setting_description`, `setting_site_address_ar`, `setting_site_address_en`, `setting_googlemap`, `setting_facebookurl`, `setting_twitterurl`, `setting_googleplusurl`, `setting_instgramurl`, `setting_snapchaturl`, `setting_linkedinurl`, `setting_youtubeurl`, `setting_whatsappurl`, `setting_sitetell1`, `created_at`, `updated_at`) VALUES
(1, 'الاعمال الخيرية', 'Charity Master', 'company@gmail.com', NULL, NULL, 'السعودية - الرياض', 'Ksa-Jeddah', NULL, 'https://www.facebook.com/', 'https://www.google.com/', NULL, 'https://www.google.com/', NULL, 'https://www.google.com/', NULL, NULL, '+1454556-5656', '2024-12-01 07:45:53', '2024-12-02 11:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `testominals`
--

CREATE TABLE `testominals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rule_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `rule_id`) VALUES
(1, 'admin', 'admin@info.com', NULL, '$2y$10$S2SuJl8Dz1pCnOoZh1VOmeNrI.4Ykpx0R9aZYbxWPb1IEAhQ2e8tG', NULL, '2024-12-01 07:25:23', '2024-12-01 07:25:23', '1'),
(2, 'ayman', 'ayman@gmail.com', NULL, '$2y$10$mLtvYnUgAF6r/Ppt4F7MuuUzWLlTGCsb8ZRpUlq333nThX1jSbUjq', NULL, '2024-12-03 09:05:13', '2024-12-03 09:05:13', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testominals`
--
ALTER TABLE `testominals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `testominals_user_id_unique` (`user_id`);

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `testominals`
--
ALTER TABLE `testominals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
