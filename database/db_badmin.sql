-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2025 pada 23.51
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_badmin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `court_id` bigint(20) UNSIGNED DEFAULT NULL,
  `booking_code` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `status` enum('Pending','Verified','Accepted') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id`, `court_id`, `booking_code`, `customer_name`, `phone_number`, `start_time`, `end_time`, `price`, `status`, `created_at`, `updated_at`) VALUES
(45, 14, 'BK-20250704-C3BE', 'Rendi', '01821312312', '2025-07-04 11:40:00', '2025-07-04 13:40:00', 160000, 'Accepted', '2025-07-04 04:40:16', '2025-07-04 04:40:46'),
(47, 8, 'BK-20250704-MY4J', 'Rendis', '0284472344', '2025-07-04 12:00:00', '2025-07-04 14:00:00', 200000, 'Accepted', '2025-07-04 06:42:11', '2025-07-04 06:42:18'),
(67, 10, 'BK-20250704-IJEY', 'swono', '0284472344', '2025-07-04 13:00:00', '2025-07-04 15:00:00', 150000, 'Accepted', '2025-07-04 10:09:07', '2025-07-05 21:00:33'),
(71, 8, 'BK-20250704-8425', 'Haewon', '089855126624', '2025-07-04 20:00:00', '2025-07-04 22:00:00', 200000, 'Accepted', '2025-07-04 13:45:41', '2025-07-04 13:47:17'),
(73, 7, 'BK-20250706-472C', 'Dewon', '089855126624', '2025-07-06 11:00:00', '2025-07-06 13:00:00', 50000, 'Accepted', '2025-07-05 21:16:25', '2025-07-05 21:40:53'),
(75, 8, 'BK-20250706-4ABF', 'shibal', '089855126624', '2025-07-06 05:50:00', '2025-07-06 06:50:00', 50000, 'Accepted', '2025-07-05 23:05:45', '2025-07-05 23:35:03'),
(76, 12, 'BK-20250706-91F0', 'Delsya', '089855126624', '2025-07-06 09:00:00', '2025-07-06 11:00:00', 140000, 'Accepted', '2025-07-05 23:20:00', '2025-07-05 23:20:37'),
(77, 16, 'BK-20250706-A7A7', 'Megachan', '089855126624', '2025-07-06 16:00:00', '2025-07-06 22:00:00', 600000, 'Accepted', '2025-07-05 23:35:52', '2025-07-05 23:37:13'),
(78, 15, 'BK-20250706-5A8D', 'Haewon', '089855126624', '2025-07-06 11:00:00', '2025-07-06 13:00:00', 160000, 'Accepted', '2025-07-05 23:58:43', '2025-07-05 23:58:59'),
(79, 7, 'BK-20250706-2D64', 'Namja', '089855126624', '2025-07-06 10:00:00', '2025-07-06 11:00:00', 25000, 'Accepted', '2025-07-06 00:00:03', '2025-07-06 00:00:18'),
(80, 8, 'BK-20250706-XB06', 'kiyuu', '089855126624', '2025-07-06 12:00:00', '2025-07-06 14:00:00', 100000, 'Accepted', '2025-07-06 00:02:32', '2025-07-06 00:02:32'),
(82, 7, 'BK-20250712-2E91', 'Dewon', '089855126624', '2025-07-12 14:42:00', '2025-07-12 16:42:00', 50000, 'Accepted', '2025-07-12 07:43:43', '2025-07-12 07:52:29'),
(83, 8, 'BK-20250712-3435', 'shibal', '089855126624', '2025-07-12 15:23:00', '2025-07-12 17:00:00', 100000, 'Pending', '2025-07-12 08:23:16', '2025-07-12 08:23:16'),
(84, 8, 'BK-20250712-38F1', 'elsya', '089855126624', '2025-07-12 15:23:00', '2025-07-12 17:00:00', 100000, 'Pending', '2025-07-12 08:31:26', '2025-07-12 08:31:26'),
(85, 8, 'BK-20250712-5035', 'Haewon', '089855126624', '2025-07-12 15:34:00', '2025-07-12 16:34:00', 50000, 'Pending', '2025-07-12 08:34:52', '2025-07-12 08:34:52'),
(86, 8, 'BK-20250712-4B56', 'Haewonnn', '089855126624', '2025-07-12 15:34:00', '2025-07-12 18:00:00', 150000, 'Pending', '2025-07-12 08:37:14', '2025-07-12 08:37:14'),
(87, 8, 'BK-20250712-4682', 'Haewonnnm', '089855126624', '2025-07-12 15:34:00', '2025-07-12 18:00:00', 150000, 'Pending', '2025-07-12 08:42:20', '2025-07-12 08:42:20'),
(88, 8, 'BK-20250713-C374', 'dwwqwfwq', '089855126624', '2025-07-13 01:10:00', '2025-07-13 02:10:00', 50000, 'Pending', '2025-07-12 18:11:02', '2025-07-12 18:11:02'),
(89, 8, 'BK-20250713-DF55', 'wdwqwqs', '089855126624', '2025-07-13 08:00:00', '2025-07-13 11:00:00', 150000, 'Pending', '2025-07-12 18:12:58', '2025-07-12 18:12:58'),
(90, 8, 'BK-20250713-C1AC', 'wdwqwqs', '089855126624', '2025-07-13 08:00:00', '2025-07-13 11:00:00', 150000, 'Pending', '2025-07-12 18:17:16', '2025-07-12 18:17:16'),
(91, 8, 'BK-20250713-99D5', 'ghgngn', '089855126624', '2025-07-13 08:00:00', '2025-07-13 11:00:00', 150000, 'Pending', '2025-07-12 18:21:32', '2025-07-12 18:21:32'),
(92, 11, 'BK-20250713-1F9A', 'Heejoo', '089855126624', '2025-07-13 08:00:00', '2025-07-13 11:00:00', 180000, 'Pending', '2025-07-12 19:22:57', '2025-07-12 19:22:57'),
(93, 11, 'BK-20250713-FE16', 'Heejoo', '089855126624', '2025-07-13 08:00:00', '2025-07-13 11:00:00', 180000, 'Pending', '2025-07-12 19:24:07', '2025-07-12 19:24:07'),
(94, 11, 'BK-20250713-6B25', 'Yu Jimin', '089855126624', '2025-07-13 08:00:00', '2025-07-13 15:00:00', 420000, 'Accepted', '2025-07-12 19:25:35', '2025-07-12 19:27:08'),
(95, 14, 'BK-20250713-F9A6', 'Namja', '089855126624', '2025-07-13 10:00:00', '2025-07-13 12:00:00', 140000, 'Accepted', '2025-07-12 19:31:57', '2025-07-12 19:32:30'),
(96, 9, 'BK-20250713-JANY', 'Dewon', '089855126624', '2025-07-13 12:00:00', '2025-07-13 14:00:00', 100000, 'Accepted', '2025-07-12 19:34:40', '2025-07-12 19:34:40'),
(97, 8, 'BK-20250713-06FB', 'Dewon', '089855126624', '2025-07-13 08:00:00', '2025-07-13 12:00:00', 200000, 'Accepted', '2025-07-12 19:41:25', '2025-07-12 19:42:07'),
(98, 16, 'BK-20250713-ECC4', 'Haewonie', '089855126624', '2025-07-13 08:00:00', '2025-07-13 12:00:00', 400000, 'Accepted', '2025-07-12 19:53:15', '2025-07-12 19:53:41'),
(99, 15, 'BK-20250713-7ARQ', 'Yu Jimin', '089855126624', '2025-07-13 11:00:00', '2025-07-13 19:00:00', 640000, 'Accepted', '2025-07-12 19:57:28', '2025-07-12 19:57:28'),
(100, 10, 'BK-20250713-1B6C', 'nanda', '089855126624', '2025-07-13 08:00:00', '2025-07-13 11:00:00', 180000, 'Pending', '2025-07-12 20:41:10', '2025-07-12 20:41:10'),
(101, 10, 'BK-20250713-8179', 'nanda', '089855126624', '2025-07-13 08:00:00', '2025-07-13 11:00:00', 180000, 'Accepted', '2025-07-12 20:43:13', '2025-07-12 21:01:30'),
(102, 10, 'BK-20250713-740E', 'nanda', '089855126624', '2025-07-13 08:00:00', '2025-07-13 11:00:00', 180000, 'Accepted', '2025-07-12 20:43:20', '2025-07-12 21:00:57'),
(103, 7, 'BK-20250713-BE2E', 'mantap mas', '089855126624', '2025-07-13 08:00:00', '2025-07-13 17:00:00', 225000, 'Accepted', '2025-07-12 21:03:00', '2025-07-12 21:03:39'),
(104, 16, 'BK-20250715-42D9', 'Reza Oli Samping', '089855126624', '2025-07-15 08:00:00', '2025-07-15 22:00:00', 1400000, 'Accepted', '2025-07-14 20:47:36', '2025-07-14 20:48:57'),
(105, 11, 'BK-20250715-KQLF', 'Sigit Rendang', '089855126624', '2025-07-15 11:00:00', '2025-07-15 18:00:00', 420000, 'Accepted', '2025-07-14 21:09:18', '2025-07-14 21:11:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `courts`
--

CREATE TABLE `courts` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `court_name` varchar(50) NOT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `courts`
--

INSERT INTO `courts` (`id`, `court_name`, `price`, `picture`) VALUES
(7, 'Court 1', 25000.00, '1751745890.jpg'),
(8, 'Court 2', 50000.00, '1751745919.jpg'),
(9, 'Court 3', 50000.00, '1751746028.jpg'),
(10, 'Court 4', 60000.00, '1751746039.jpg'),
(11, 'Court 5', 60000.00, '1751746083.jpg'),
(12, 'Court 6', 70000.00, '1751746100.jpg'),
(14, 'Court 7', 70000.00, '1751746114.jpg'),
(15, 'Court 8', 80000.00, '1751746131.jpg'),
(16, 'Court 9', 100000.00, '1751746158.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `guests`
--

INSERT INTO `guests` (`id`, `name`, `phone_number`, `email`, `created_at`) VALUES
(1, 'Rendi', '0812121311', 'halo@gmail.com', '2025-06-26 07:22:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_06_17_141502_create_users_table', 1),
(2, '2025_06_18_133720_create_sessions_table', 2),
(3, '2025_06_18_142129_create_sessions_table', 3),
(4, '2025_07_03_213721_add_foreign_key_to_court_id_on_bookings_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('rNKKks0AodchGujrGaV7EYn307upbmxZQonJwX1P', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQ1dIMFhvb21JSFRyNjJmaE1ENzhUYk5QSkJlam1DemFrRFpzb1FCcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ib29rLWRhdGEvZXhwb3J0P3N0YXR1cz1QZW5kaW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2giO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1752528568);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'imanich', '$2y$12$evEtl0QmNO1pRnCWc801YuDeEq7FU53HqZZOFZ.F8IkqbzXM9Wj1O', 'imannich@gmail.com', '2025-06-16 11:14:15', '2025-06-16 11:14:15'),
(2, 'diana', '$2y$12$CK0Po4o3VWuef1R.Kvyl4Oz2EOkyVjwZigV1B88diZGGPkSiRMvKa', 'diansantika@gmail.com', '2025-06-16 12:26:28', '2025-06-16 12:26:28'),
(3, 'heejoo', '$2y$12$G0irnmJ54h4qiwc.1py3S..mHrv3sfmp3wQq.bgKBIcFrVLZCnJXa', 'heejoo@gmail.com', '2025-06-18 06:43:06', '2025-06-18 06:43:06'),
(4, 'Elsya', '$2y$12$CVJrQMIAXwxQSrg6UT7vV.YIdR4hHWQT7ybRFL6Mg3KatsTdheur2', 'elsya@gmail.com', '2025-06-19 07:01:15', '2025-06-19 07:01:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bookings_booking_code_unique` (`booking_code`),
  ADD KEY `bookings_court_id_foreign` (`court_id`);

--
-- Indeks untuk tabel `courts`
--
ALTER TABLE `courts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `courts`
--
ALTER TABLE `courts`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_court_id_foreign` FOREIGN KEY (`court_id`) REFERENCES `courts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
