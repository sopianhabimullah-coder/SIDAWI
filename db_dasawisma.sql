-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2026 at 04:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dasawisma`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
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
-- Table structure for table `keluargas`
--

CREATE TABLE `keluargas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kepala_keluarga` varchar(255) NOT NULL,
  `jumlah_kk` int(11) NOT NULL,
  `jml_laki` int(11) NOT NULL DEFAULT 0,
  `jml_perempuan` int(11) NOT NULL DEFAULT 0,
  `balita` int(11) NOT NULL DEFAULT 0,
  `balita_p` int(11) NOT NULL DEFAULT 0,
  `pus` int(11) NOT NULL DEFAULT 0,
  `wus` int(11) NOT NULL DEFAULT 0,
  `ibu_hamil` int(11) NOT NULL DEFAULT 0,
  `ibu_menyusui` int(11) NOT NULL DEFAULT 0,
  `lansia` int(11) NOT NULL DEFAULT 0,
  `sehat_layak_huni` tinyint(1) NOT NULL DEFAULT 0,
  `tempat_sampah` tinyint(1) NOT NULL DEFAULT 0,
  `spal` tinyint(1) NOT NULL DEFAULT 0,
  `jamban` tinyint(1) NOT NULL DEFAULT 0,
  `stiker_p4k` tinyint(1) NOT NULL DEFAULT 0,
  `pdam` tinyint(1) NOT NULL DEFAULT 0,
  `sumur` tinyint(1) NOT NULL DEFAULT 0,
  `beras` tinyint(1) NOT NULL DEFAULT 0,
  `non_beras` tinyint(1) NOT NULL DEFAULT 0,
  `up2k` tinyint(1) NOT NULL DEFAULT 0,
  `pekarangan` tinyint(1) NOT NULL DEFAULT 0,
  `industri_rumah_tangga` tinyint(1) NOT NULL DEFAULT 0,
  `kerja_bakti` tinyint(1) NOT NULL DEFAULT 0,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `balita_laki` int(11) NOT NULL DEFAULT 0,
  `balita_perempuan` int(11) NOT NULL DEFAULT 0,
  `tiga_buta` int(11) NOT NULL DEFAULT 0,
  `berkebutuhan_khusus` int(11) NOT NULL DEFAULT 0,
  `tidak_layak_huni` tinyint(1) NOT NULL DEFAULT 0,
  `dll_air` tinyint(1) NOT NULL DEFAULT 0,
  `rt_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keluargas`
--

INSERT INTO `keluargas` (`id`, `nama_kepala_keluarga`, `jumlah_kk`, `jml_laki`, `jml_perempuan`, `balita`, `balita_p`, `pus`, `wus`, `ibu_hamil`, `ibu_menyusui`, `lansia`, `sehat_layak_huni`, `tempat_sampah`, `spal`, `jamban`, `stiker_p4k`, `pdam`, `sumur`, `beras`, `non_beras`, `up2k`, `pekarangan`, `industri_rumah_tangga`, `kerja_bakti`, `keterangan`, `created_at`, `updated_at`, `balita_laki`, `balita_perempuan`, `tiga_buta`, `berkebutuhan_khusus`, `tidak_layak_huni`, `dll_air`, `rt_id`) VALUES
(3, 'dede suherman', 8, 1, 1, 1, 0, 1, 2, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 'mampu', '2026-06-21 05:48:02', '2026-06-28 05:34:19', 0, 0, 1, 1, 0, 1, 5),
(5, 'jujun juana', 7, 3, 4, 1, 0, 1, 1, 1, 2, 5, 1, 0, 0, 0, 0, 1, 1, 1, 0, 1, 1, 0, 1, 'layak', '2026-06-21 06:42:40', '2026-06-28 05:39:05', 0, 0, 1, 1, 0, 0, 7),
(7, 'herman jumafo', 6, 3, 3, 2, 1, 2, 3, 2, 2, 2, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, 0, 1, 'cukup baik', '2026-06-27 08:33:50', '2026-06-27 08:33:50', 0, 0, 0, 0, 0, 0, 3),
(8, 'cepi kusnandar', 6, 2, 4, 3, 2, 5, 3, 2, 2, 2, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 1, 'baik sekali', '2026-06-28 05:16:02', '2026-06-28 05:16:02', 0, 0, 0, 0, 0, 0, 4),
(9, 'jajang sukmara', 1, 2, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 1, 0, 1, 1, 0, 1, 1, 0, 1, NULL, '2026-06-28 05:46:20', '2026-06-28 05:46:20', 0, 0, 0, 0, 0, 0, NULL),
(10, 'yayan ruhiyan', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 0, 0, 1, 0, 1, 0, 0, 1, 'perlu di cek ulang', '2026-06-28 05:49:16', '2026-06-28 05:49:16', 0, 0, 0, 0, 0, 0, NULL),
(11, 'suwarno', 4, 7, 4, 3, 2, 4, 3, 3, 2, 0, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, 1, 0, 1, 'sudah cukup', '2026-06-28 10:43:15', '2026-06-28 10:43:15', 0, 0, 0, 0, 0, 0, 8);

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_06_19_122453_create_keluargas_table', 2),
(5, '2026_06_21_033410_add_kolom_dasawisma_to_keluargas_table', 3),
(6, '2026_06_21_143907_change_kolom_to_boolean_in_keluargas_table', 4),
(7, '2026_06_22_062452_add_balita_p_to_keluargas_table', 5),
(8, '2026_06_22_070542_create_rt_table', 6),
(9, '2026_06_22_070630_add_rt_id_to_keluargas_table', 6),
(10, '2026_06_22_070653_add_role_rt_to_users_table', 6),
(11, '2026_06_22_090949_add_rw_id_to_users_table', 7),
(12, '2026_06_22_102817_create_profil_dasawisma_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profil_dasawisma`
--

CREATE TABLE `profil_dasawisma` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_dasawisma` varchar(255) NOT NULL,
  `nama_ketua` varchar(255) NOT NULL,
  `rt` varchar(255) NOT NULL,
  `rw` varchar(255) NOT NULL,
  `desa` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profil_dasawisma`
--

INSERT INTO `profil_dasawisma` (`id`, `nama_dasawisma`, `nama_ketua`, `rt`, `rw`, `desa`, `kecamatan`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 'bugenvil', 'iis sumiyati', '01', '13', 'Galanggang', 'Batu Jajar', '2026', '2026-06-22 03:36:17', '2026-06-28 04:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `rts`
--

CREATE TABLE `rts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_rt` varchar(255) NOT NULL,
  `nomor_rw` varchar(255) NOT NULL,
  `nama_ketua` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rts`
--

INSERT INTO `rts` (`id`, `nomor_rt`, `nomor_rw`, `nama_ketua`, `created_at`, `updated_at`) VALUES
(3, '03', '13', 'susanto', '2026-06-22 00:50:24', '2026-06-22 00:50:24'),
(4, '04', '13', 'dadan hermawan', '2026-06-22 00:50:52', '2026-06-22 00:50:52'),
(5, '01', '13', 'dayat', '2026-06-28 04:57:53', '2026-06-28 04:57:53'),
(7, '02', '13', 'ida marida', '2026-06-28 05:01:50', '2026-06-28 05:01:50'),
(8, '05', '13', 'koswara', '2026-06-28 05:49:52', '2026-06-28 05:49:52');

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
('CTj8S5Aula2AHvbKRXunQO74LRgJm5YoEk5T3CUs', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJOSFFNbFZNQzRsSDFLTUJXOXBoZ04zdHg5ZFh2RldxSXRIRE1teWE5IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2Rhc2hib2FyZCIsInJvdXRlIjoiZGFzaGJvYXJkIn0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==', 1782668725),
('lSymlUDPlRXLxtO6KVycyIF8KRU8FV0YH6HsAPMP', 1, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', 'eyJfdG9rZW4iOiJkc2ZlNU5iaEI5QkdGV0VkZmhOWkVWc2QxV2NKSGJOS0pJY2dRWTdUIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9kYXNoYm9hcmQiLCJyb3V0ZSI6ImRhc2hib2FyZCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==', 1782699049);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'rt',
  `rt_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nomor_rw` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `rt_id`, `nomor_rw`) VALUES
(1, 'Sopian Anugerah', 'admin@gmail.com', NULL, '$2y$12$dRG/3lX98rvkOAFB7hrBQe/Q8rQPz2jo2MThwwPN4hvLlmHsU3Pye', NULL, '2026-06-19 07:20:08', '2026-06-28 04:46:48', 'admin', NULL, NULL),
(2, 'User RT 01', 'rt01@gmail.com', NULL, '$2y$12$qCjbQg0V7ck2.imWqzqlF.4/KkpVyZ6AYq98Q9uHVrL/ZMHsoEs72', NULL, '2026-06-22 01:57:13', '2026-06-22 01:57:13', 'rt', NULL, NULL),
(5, 'dudun suradun', 'dudun@gmail.com', NULL, '$2y$12$jNrFQH.mNq8E7NBakjZyve1DJgawbLv1kbWSKeND1WV1nn2ZpZ8l2', NULL, '2026-06-22 02:28:05', '2026-06-22 02:28:05', 'kepala_desa', NULL, NULL),
(6, 'koswara', 'koswara@gmai.com', NULL, '$2y$12$1shEXmTCZwUdcNexr.wkOukBjuZTTZpbPsoJF4fYHuFO4cE7rT6bi', NULL, '2026-06-22 02:28:37', '2026-06-22 02:28:37', 'camat', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluargas`
--
ALTER TABLE `keluargas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keluargas_rt_id_foreign` (`rt_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `profil_dasawisma`
--
ALTER TABLE `profil_dasawisma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rts`
--
ALTER TABLE `rts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_rt_id_foreign` (`rt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keluargas`
--
ALTER TABLE `keluargas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `profil_dasawisma`
--
ALTER TABLE `profil_dasawisma`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rts`
--
ALTER TABLE `rts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keluargas`
--
ALTER TABLE `keluargas`
  ADD CONSTRAINT `keluargas_rt_id_foreign` FOREIGN KEY (`rt_id`) REFERENCES `rts` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_rt_id_foreign` FOREIGN KEY (`rt_id`) REFERENCES `rts` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
