-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2025 at 06:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `impactguru_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `profile_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(20, 'Wilhelm Cole', 'florence.miller@example.com', '+1-769-292-6245', '38239 Trantow Mill Apt. 569\nPort Laverna, WY 13693-2231', NULL, '2025-12-04 14:13:15', '2025-12-08 11:29:25', '2025-12-08 11:29:25'),
(21, 'Khatal Nikita Balasaheb', 'nikita.khatal24@iccs.ac.in', '7588255962', 'Ravet', 'customers/msVb3wdFqUO5HMpZEl3ljw3lueZJFGetR02i9HQc.jpg', '2025-12-04 14:23:44', '2025-12-04 14:44:30', '2025-12-04 14:44:30'),
(22, 'Shubham Khatal', 'shubhamkhatal01@gmail.com', '7588255962', 'Sangamner', 'customers/iwWtMP7Zz0m1XxnL89RRRLkvJWR9YYOhXb057lBr.jpg', '2025-12-04 14:57:06', '2025-12-07 02:24:23', '2025-12-07 02:24:23'),
(24, 'Nikita', 'khatalnikita2003@gmail.com', '7588255962', 'Maharashtra,India', NULL, '2025-12-06 01:03:31', '2025-12-06 04:03:15', '2025-12-06 04:03:15'),
(25, 'Nikita Balasaheb Khatal', 'nikitakhatal12@gmail.com', '7588255962', 'Sangamner,Maharashta,India', 'customers/yMvQoqGzkgVUJAN8bTKHppi19F6L2xEN9vSRTHkh.jpg', '2025-12-06 01:04:45', '2025-12-08 11:29:20', '2025-12-08 11:29:20'),
(26, 'Ram Sharma', 'ram@gmail.com', '7890453268', 'Pune , Maharashtra,India', 'customers/8JZhWq54BsUMx6G5jvjCgXJs95bHWs3tmWVO4MOR.jpg', '2025-12-07 10:26:30', '2025-12-07 10:26:30', NULL),
(27, 'yash chopra', 'yashchopra12@gmail.com', '8875456783', 'Mumbai,Maharashtra,India', 'customers/eQO3Aw3xUvaO7fmzGWw7UUSAVlKJ0fyzRm5ubdlr.jpg', '2025-12-08 10:20:52', '2025-12-08 10:21:40', NULL),
(28, 'Salman khan', 'salmankhan12@gmail.com', '9876543245', 'Andheri,Mumbai,Maharashtra,india', 'customers/D76zUF0Y9vg2pbcFOhHjaT9NIhS0HoYqcDWSAfH5.jpg', '2025-12-08 10:37:19', '2025-12-08 10:37:40', '2025-12-08 10:37:40');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_12_04_190848_add_role_to_users_table', 1),
(6, '2025_12_04_191548_create_customers_table', 1),
(7, '2025_12_04_192259_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('pending','completed','cancelled') NOT NULL DEFAULT 'pending',
  `order_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_number`, `amount`, `status`, `order_date`, `created_at`, `updated_at`) VALUES
(75, 26, 'ORD-6935A3E590703', 45000.00, 'cancelled', '2025-12-07', '2025-12-07 10:27:25', '2025-12-08 10:24:08'),
(76, 26, 'ORD-6936F4C27473D', 89000.00, 'completed', '2025-12-08', '2025-12-08 10:24:42', '2025-12-08 10:24:59'),
(77, 26, 'ORD-6936F9078AA6D', 45000.00, 'completed', '2025-12-08', '2025-12-08 10:42:55', '2025-12-08 10:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin123@gmail.com', '$2y$12$9i0XAIdu1q4x6WSpWbfUQODqfFKk1NrCSN.FtVmMkUUxO9vCvpkoC', '2025-12-06 10:57:55'),
('shubhamkhtal01@gmail.com', '$2y$12$tg7XaPS454uIiRCX7KAlm.2HIom1VnrieHXZZgVB30r/AqdM/6F.S', '2025-12-07 02:53:31');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','staff') NOT NULL DEFAULT 'staff',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Ram Sharma', 'ramsharma12@gmail.com', 'staff', NULL, '$2y$12$oKWvnVFQikOW.gb7yXPeuugFN8JnKd49PL4y/jJIlogMV2/uOm9qq', NULL, '2025-12-08 10:19:01', '2025-12-08 10:19:01'),
(6, 'Admin', 'admin123@gmail.com', 'admin', NULL, '$2y$12$arm67.VWw9v2R9U1.EjY5OABZtMAjlQ279sIolxDFq03bKwDAbv8u', NULL, '2025-12-08 10:27:16', '2025-12-08 10:27:16'),
(7, 'Dipika Patil', 'dipikapatil12@gmail.com', 'staff', NULL, '$2y$12$ZZLETZ0fwfIhBTeu/ATzp.8lzAv8nFK5RWKeoEYBeRLaF56faaWoC', NULL, '2025-12-08 11:22:02', '2025-12-08 11:22:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

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
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
