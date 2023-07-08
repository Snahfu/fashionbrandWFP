-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 07:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashionbrand`
--

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
-- Table structure for table `jenises`
--

CREATE TABLE `jenises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenises`
--

INSERT INTO `jenises` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pakaian', 'Lorem ipsum dolor sit amet', '2023-06-30 09:25:45', '2023-07-07 10:38:35', NULL),
(2, 'Aksesoris', 'Lorem ipsum dolor sit amet', '2023-06-30 10:47:48', '2023-06-30 10:47:48', NULL),
(4, 'Alat Make-Up', 'Lorem ipsum dolor sit amet', '2023-06-30 10:49:07', '2023-06-30 10:49:07', NULL),
(5, 'Sepatu', 'Lorem ipsum dolor sit amet', '2023-06-30 10:50:43', '2023-06-30 10:50:43', NULL),
(6, 'Perhiasan', 'Lorem ipsum dolor sit amet', '2023-06-30 10:53:20', '2023-06-30 10:53:53', NULL),
(7, 'Sandal', 'Lorem ipsum dolor sit amet', '2023-06-30 10:59:59', '2023-07-02 05:42:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pria', 'Lorem ipsum dolor sit amet', '2023-06-30 19:12:26', '2023-07-07 10:38:09', NULL),
(2, 'Wanita', 'Lorem ipsum dolor sit amet', '2023-06-30 19:16:36', '2023-06-30 19:16:36', NULL),
(3, 'Anak-anak', 'Lorem ipsum dolor sit amet', '2023-06-30 19:17:20', '2023-06-30 19:17:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`kategori_id`, `produk_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2023-07-01 10:18:09', '2023-07-01 10:18:09', NULL),
(1, 2, '2023-07-01 10:52:31', '2023-07-01 10:52:31', NULL),
(1, 3, '2023-07-01 10:54:58', '2023-07-01 10:54:58', NULL),
(1, 4, '2023-07-06 08:19:10', '2023-07-06 08:19:10', NULL),
(1, 5, '2023-07-02 06:16:24', '2023-07-05 21:19:35', '2023-07-05 21:19:35'),
(1, 6, '2023-07-02 06:21:28', '2023-07-05 21:16:33', '2023-07-05 21:16:33'),
(2, 1, '2023-07-01 10:18:09', '2023-07-01 10:18:09', NULL),
(2, 2, '2023-07-02 06:21:28', '2023-07-05 21:16:33', '2023-07-05 21:16:33'),
(3, 3, '2023-07-01 10:54:58', '2023-07-01 10:54:58', NULL),
(3, 4, '2023-07-02 06:16:24', '2023-07-05 21:19:35', '2023-07-05 21:19:35');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_26_021430_create_kategoris_table', 1),
(6, '2023_06_26_021446_create_jenises_table', 1),
(7, '2023_06_26_021523_create_produks_table', 1),
(8, '2023_06_30_063652_create_orders_table', 1),
(9, '2023_06_30_063715_create_order_produk_table', 1),
(10, '2023_06_30_135551_create_kategori_produk_table', 1),
(11, '2023_07_06_012500_add_deleted_add_to_jenises_table', 1),
(12, '2023_07_06_012515_add_deleted_add_to_kategoris_table', 1),
(13, '2023_07_06_012529_add_deleted_add_to_produks_table', 1),
(14, '2023_07_06_012547_add_deleted_add_to_kategori_produk_table', 1),
(15, '2023_07_08_020840_add_poin_add_member_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` double NOT NULL,
  `pajak` double NOT NULL,
  `potongan` double NOT NULL,
  `total` double NOT NULL,
  `poin_didapat` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `pajak`, `potongan`, `total`, `poin_didapat`, `created_at`, `updated_at`) VALUES
(1, 6, 650000, 71500, 0, 721500, 6, '2023-07-15 05:08:31', '2023-07-15 05:08:31'),
(2, 7, 832450, 91569.5, 0, 924019.5, 8, '2023-07-07 05:11:11', '2023-07-15 05:08:31'),
(3, 8, 184770, 20324.7, 0, 205094.7, 1, '2023-07-15 05:08:31', '2023-07-15 05:08:31'),
(4, 9, 2650000, 291500, 0, 2941500, 26, '2023-07-15 05:08:31', '2023-07-15 05:08:31'),
(5, 10, 812250, 89347.5, 0, 901597.5, 8, '2023-07-15 05:08:31', '2023-07-15 05:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `order_produk`
--

CREATE TABLE `order_produk` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `harga` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_produk`
--

INSERT INTO `order_produk` (`order_id`, `produk_id`, `kuantitas`, `harga`, `subtotal`) VALUES
(1, 1, 1, 650000, 650000),
(1, 4, 2, 32450, 64900),
(2, 2, 1, 800000, 800000),
(2, 4, 1, 32450, 32450),
(3, 4, 2, 32450, 64900),
(3, 5, 5, 23974, 119870),
(4, 1, 1, 650000, 650000),
(4, 2, 1, 800000, 800000),
(4, 3, 1, 1200000, 1200000),
(5, 1, 1, 650000, 650000),
(5, 4, 5, 32450, 162250);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jenis_id` bigint(20) UNSIGNED NOT NULL,
  `brand_produk` varchar(255) NOT NULL,
  `harga` double(12,2) NOT NULL,
  `dimensi` varchar(255) NOT NULL,
  `url_gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `nama_produk`, `jenis_id`, `brand_produk`, `harga`, `dimensi`, `url_gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sepatu Lari', 5, 'Nike', 650000.00, '41', '1688231889_images.jpg', '2023-07-01 10:18:09', '2023-07-01 10:18:09', NULL),
(2, 'Sepatu Lari 2', 5, 'Nike', 800000.00, '44', '1688233951_sepatuu.jpg', '2023-07-01 10:52:31', '2023-07-01 10:52:31', NULL),
(3, 'Sepatu Lari 3', 5, 'Nike', 1200000.00, '46', '1688234098_sepatuu.jpg', '2023-07-01 10:54:58', '2023-07-01 10:54:58', NULL),
(4, 'CCCCCC', 4, 'DDDDDD', 32450.00, '100 gram', '1688656750_20201229104001-1-ilustrasi-baut-001-jevi-nugraha.jpg', '2023-07-02 05:38:02', '2023-07-06 08:19:10', NULL),
(5, 'jdfewfnwej', 1, 'jdwkjen', 23974.00, 'XS', '1688303784_sepatuu.jpg', '2023-07-02 06:16:24', '2023-07-05 21:19:35', '2023-07-05 21:19:35'),
(6, 'sjkc wjkd jwdjkd', 4, 'jdn', 93746.00, 'L', '1688304088_sepatuu.jpg', '2023-07-02 06:21:28', '2023-07-05 21:16:33', '2023-07-05 21:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('pembeli','owner','staff') NOT NULL DEFAULT 'pembeli',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `poin` int(11) NOT NULL DEFAULT 0,
  `member` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `poin`, `member`) VALUES
(1, 'Owner 1', 'o1@gmail.com', 'owner', NULL, '$2y$10$2ZYiZTDW66j40iXKq8qCE.2kDfdNDLIgxJLqIiK.uDfs1Jr/8/0fq', NULL, NULL, NULL, 0, 0),
(2, 'Owner 2', 'o2@gmail.com', 'owner', NULL, '$2y$10$2ZYiZTDW66j40iXKq8qCE.2kDfdNDLIgxJLqIiK.uDfs1Jr/8/0fq', NULL, NULL, NULL, 0, 0),
(3, 'Staff 3', 's3@gmail.com', 'staff', NULL, '$2y$10$2ZYiZTDW66j40iXKq8qCE.2kDfdNDLIgxJLqIiK.uDfs1Jr/8/0fq', NULL, NULL, NULL, 0, 0),
(4, 'Staff 4', 's4@gmail.com', 'staff', NULL, '$2y$10$2ZYiZTDW66j40iXKq8qCE.2kDfdNDLIgxJLqIiK.uDfs1Jr/8/0fq', NULL, NULL, NULL, 0, 0),
(5, 'Staff 5', 's5@gmail.com', 'staff', NULL, '$2y$10$2ZYiZTDW66j40iXKq8qCE.2kDfdNDLIgxJLqIiK.uDfs1Jr/8/0fq', NULL, NULL, NULL, 0, 0),
(6, 'Pengguna6', 'p6@gmail.com', 'pembeli', NULL, '$2y$10$2ZYiZTDW66j40iXKq8qCE.2kDfdNDLIgxJLqIiK.uDfs1Jr/8/0fq', NULL, NULL, NULL, 0, 0),
(7, 'Pengguna7', 'p7@gmail.com', 'pembeli', NULL, '$2y$10$2ZYiZTDW66j40iXKq8qCE.2kDfdNDLIgxJLqIiK.uDfs1Jr/8/0fq', NULL, NULL, NULL, 0, 0),
(8, 'Pengguna8', 'p8@gmail.com', 'pembeli', NULL, '$2y$10$2ZYiZTDW66j40iXKq8qCE.2kDfdNDLIgxJLqIiK.uDfs1Jr/8/0fq', NULL, NULL, NULL, 0, 0),
(9, 'Pengguna9', 'p9@gmail.com', 'pembeli', NULL, '$2y$10$2ZYiZTDW66j40iXKq8qCE.2kDfdNDLIgxJLqIiK.uDfs1Jr/8/0fq', NULL, NULL, NULL, 0, 0),
(10, 'Pengguna10', 'p10@gmail.com', 'pembeli', NULL, '$2y$10$2ZYiZTDW66j40iXKq8qCE.2kDfdNDLIgxJLqIiK.uDfs1Jr/8/0fq', NULL, NULL, NULL, 0, 0),
(11, 'Pengguna11', 'p11@gmail.com', 'pembeli', NULL, '$2y$10$2ZYiZTDW66j40iXKq8qCE.2kDfdNDLIgxJLqIiK.uDfs1Jr/8/0fq', NULL, NULL, NULL, 0, 0),
(12, 'Pengguna12', 'p12@gmail.com', 'pembeli', NULL, '$2y$10$2ZYiZTDW66j40iXKq8qCE.2kDfdNDLIgxJLqIiK.uDfs1Jr/8/0fq', NULL, NULL, NULL, 0, 0),
(13, 'Pengguna13', 'p13@gmail.com', 'pembeli', NULL, '$2y$10$2ZYiZTDW66j40iXKq8qCE.2kDfdNDLIgxJLqIiK.uDfs1Jr/8/0fq', NULL, NULL, NULL, 0, 0),
(14, 'Pengguna14', 'p14@gmail.com', 'pembeli', NULL, '$2y$10$2ZYiZTDW66j40iXKq8qCE.2kDfdNDLIgxJLqIiK.uDfs1Jr/8/0fq', NULL, NULL, NULL, 0, 0),
(15, 'Pengguna15', 'p15@gmail.com', 'pembeli', NULL, '$2y$10$2ZYiZTDW66j40iXKq8qCE.2kDfdNDLIgxJLqIiK.uDfs1Jr/8/0fq', NULL, NULL, NULL, 0, 0),
(16, 'Pengguna16', 'p16@gmail.com', 'pembeli', NULL, '$2y$10$2ZYiZTDW66j40iXKq8qCE.2kDfdNDLIgxJLqIiK.uDfs1Jr/8/0fq', NULL, NULL, NULL, 0, 0),
(17, 'Pengguna17', 'p17@gmail.com', 'pembeli', NULL, '$2y$10$2ZYiZTDW66j40iXKq8qCE.2kDfdNDLIgxJLqIiK.uDfs1Jr/8/0fq', NULL, NULL, NULL, 0, 0),
(18, 'Pengguna18', 'p18@gmail.com', 'pembeli', NULL, '$2y$10$2ZYiZTDW66j40iXKq8qCE.2kDfdNDLIgxJLqIiK.uDfs1Jr/8/0fq', NULL, NULL, NULL, 0, 0),
(19, 'Pengguna19', 'p19@gmail.com', 'pembeli', NULL, '$2y$10$2ZYiZTDW66j40iXKq8qCE.2kDfdNDLIgxJLqIiK.uDfs1Jr/8/0fq', NULL, NULL, NULL, 0, 0),
(20, 'Pengguna20', 'p20@gmail.com', 'pembeli', NULL, '$2y$10$2ZYiZTDW66j40iXKq8qCE.2kDfdNDLIgxJLqIiK.uDfs1Jr/8/0fq', NULL, NULL, NULL, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenises`
--
ALTER TABLE `jenises`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jenises_nama_unique` (`nama`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategoris_nama_unique` (`nama`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`kategori_id`,`produk_id`),
  ADD KEY `kategori_produk_produk_id_foreign` (`produk_id`);

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
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_produk`
--
ALTER TABLE `order_produk`
  ADD PRIMARY KEY (`order_id`,`produk_id`),
  ADD KEY `order_produk_produk_id_foreign` (`produk_id`);

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
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `produks_nama_produk_unique` (`nama_produk`),
  ADD KEY `produks_jenis_id_foreign` (`jenis_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenises`
--
ALTER TABLE `jenises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD CONSTRAINT `kategori_produk_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`),
  ADD CONSTRAINT `kategori_produk_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_produk`
--
ALTER TABLE `order_produk`
  ADD CONSTRAINT `order_produk_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_produk_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`);

--
-- Constraints for table `produks`
--
ALTER TABLE `produks`
  ADD CONSTRAINT `produks_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenises` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
