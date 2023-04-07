-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Apr 2023 pada 02.58
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-pkl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--

CREATE TABLE `alamat` (
  `id_alamat` int(11) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `wa` varchar(20) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `patokan` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `nama_lengkap`, `wa`, `alamat_lengkap`, `patokan`, `user_id`) VALUES
(1, 'Wildan Ibnu Sina', '085274651943', 'Di Sini', 'Rumah', 1),
(2, 'Andi Prayogo', '085832450843', 'Sebelah Rumah Wildan', 'Rumah Juga', 2),
(3, 'Aji Gustomo', '087738214306', 'Belahan Bumi Utara', 'Rumah', 3),
(5, 'Fajar', '088216097050', 'di sini', 'kantor', 4),
(6, 'Fajar', '088888888888888', 'ya di sini', 'Rumah', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pesan` text NOT NULL,
  `status` enum('Belum Dibaca','Sudah Dibaca') NOT NULL DEFAULT 'Belum Dibaca',
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `nama`, `subject`, `email`, `pesan`, `status`, `time`) VALUES
(22, 'Andi Prayogo ', 'ancok', 'andi@gmail.com', 'ancok bgt', 'Sudah Dibaca', '2022-08-26 08:22:22'),
(23, 'Andi Prayogo ', 'rrrs', 'andi@gmail.com', 'uaggsd', 'Sudah Dibaca', '2022-08-26 09:29:53'),
(24, 'Andi Prayogo ', 'd', 'andi@gmail.com', 'd', 'Belum Dibaca', '2022-08-26 11:16:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id` int(11) NOT NULL,
  `diskon` double NOT NULL,
  `tanggal_diskon` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`id`, `diskon`, `tanggal_diskon`) VALUES
(1, 10, '2022-07-22 18:17:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `item_trans`
--

CREATE TABLE `item_trans` (
  `id_item` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `no_nota` varchar(150) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `item_trans`
--

INSERT INTO `item_trans` (`id_item`, `id_menu`, `user_id`, `qty`, `no_nota`, `updated_at`) VALUES
(73, 1, 2, 3, 'INV-20220712211441-2', '2022-07-12 14:14:41'),
(75, 3, 2, 1, 'INV-20220712214734-2', '2022-07-12 14:47:34'),
(76, 4, 2, 2, 'INV-20220712235931-2', '2022-07-12 16:59:31'),
(77, 1, 3, 3, 'INV-20220713020337-3', '2022-07-12 19:03:37'),
(79, 3, 3, 1, 'INV-20220713020337-3', '2022-07-12 19:03:37'),
(80, 1, 3, 3, 'INV-20220713031447-3', '2022-07-12 20:14:47'),
(81, 6, 3, 7, 'INV-20220713031447-3', '2022-07-12 20:14:47'),
(82, 7, 3, 1, 'INV-20220713031447-3', '2022-07-12 20:14:47'),
(85, 2, 3, 3, 'Belum Ada', '2022-07-13 03:59:11'),
(86, 1, 4, 3, 'INV-20220713050927-4', '2022-07-12 22:09:27'),
(87, 3, 4, 2, 'INV-20220713050927-4', '2022-07-12 22:09:27'),
(89, 2, 2, 1, 'INV-20220720215803-2', '2022-07-20 14:58:03'),
(90, 3, 2, 3, 'INV-20220720215803-2', '2022-07-20 14:58:03'),
(91, 5, 1, 11, 'INV-20220721011335-1', '2022-07-20 18:13:35'),
(92, 6, 1, 7, 'INV-20220721012313-1', '2022-07-20 18:23:13'),
(93, 2, 1, 2, 'INV-20220721012313-1', '2022-07-20 18:23:13'),
(94, 31, 1, 2, 'INV-20220721012313-1', '2022-07-20 18:23:13'),
(95, 2, 2, 1, 'INV-20220722112308-2', '2022-07-22 04:23:08'),
(96, 2, 2, 1, 'INV-20220722113334-2', '2022-07-22 04:33:34'),
(97, 6, 2, 7, 'INV-20220722113334-2', '2022-07-22 04:33:34'),
(98, 2, 2, 1, 'INV-20220817165100-2', '2022-08-17 09:51:00'),
(99, 3, 2, 1, 'INV-20220817165100-2', '2022-08-17 09:51:00'),
(100, 3, 2, 2, 'INV-20220821153657-2', '2022-08-21 08:36:57'),
(101, 5, 2, 11, 'INV-20220821153657-2', '2022-08-21 08:36:57'),
(102, 2, 4, 1, 'INV-20220822154751-4', '2022-08-22 08:47:51'),
(103, 5, 4, 11, 'INV-20220822154751-4', '2022-08-22 08:47:51'),
(104, 31, 4, 2, 'INV-20220822154751-4', '2022-08-22 08:47:51'),
(105, 1, 2, 3, 'INV-20220826111110-2', '2022-08-26 04:11:10'),
(106, 3, 2, 2, 'INV-20220826111110-2', '2022-08-26 04:11:10'),
(107, 2, 2, 1, 'INV-20220826111217-2', '2022-08-26 04:12:17'),
(108, 2, 2, 1, 'INV-20220826111525-2', '2022-08-26 04:15:25'),
(109, 1, 1, 3, 'INV-20221117154831-1', '2022-11-17 08:48:31'),
(110, 2, 1, 1, 'INV-20221117154831-1', '2022-11-17 08:48:31'),
(111, 2, 1, 1, 'INV-20230221075659-1', '2023-02-21 00:56:59'),
(112, 3, 1, 2, 'INV-20230221075659-1', '2023-02-21 00:56:59'),
(113, 5, 1, 11, 'INV-20230221075659-1', '2023-02-21 00:56:59'),
(114, 6, 1, 7, 'INV-20230221075659-1', '2023-02-21 00:56:59'),
(115, 1, 1, 3, 'Belum Ada', '2023-02-21 08:31:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('wildan@gmail.com', '$2y$10$QnW4B8BIeQCGvUdzn13VZuaS09w3ON4EeKvxDNjh2dgpPxarXtjwW', '2023-02-12 00:14:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `rating` float NOT NULL,
  `ulasan` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Belum Dibaca',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id_rating`, `id_user`, `id_menu`, `rating`, `ulasan`, `status`, `updated_at`) VALUES
(1, 2, 1, 4.5, 'Wuhh Enak bgt !!!', 'Sudah Dibaca', '2023-02-21 01:14:42'),
(2, 2, 2, 4.5, 'Mantep !!', 'Sudah Dibaca', '2023-02-21 01:14:54'),
(3, 2, 3, 5, 'Enak bgt', 'Sudah Dibaca', '2022-07-12 19:51:54'),
(4, 4, 1, 5, 'ship', 'Sudah Dibaca', '2022-07-12 22:18:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `kategori_menu` varchar(50) NOT NULL,
  `nama_menu` varchar(150) NOT NULL,
  `harga_menu` double NOT NULL,
  `deskripsi_menu` text NOT NULL,
  `gambar_menu` varchar(150) NOT NULL,
  `status_menu` varchar(20) NOT NULL,
  `time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `kategori_menu`, `nama_menu`, `harga_menu`, `deskripsi_menu`, `gambar_menu`, `status_menu`, `time`) VALUES
(1, 'Makanan', 'Geprek', 12000, 'Mantepnya nampol...!!!', 'Ayam_geprek (1).png', 'Tersedia', '2022-08-22 10:40:38'),
(2, 'Makanan', 'Lele Goreng', 12000, 'Pokoknya mantep deh!!!', 'd9f2950e-7c40-483c-a1ae-6818c7f669db.jpg', 'Tersedia', '2022-07-10 15:13:01'),
(3, 'Makanan', 'Ayam Penyet', 13000, 'Wuiiiih nagih BGT ...!!!', 'Ayam_Penyet_Sambal_Korek (1).png', 'Tidak tersedia', '2023-02-21 08:20:46'),
(4, 'Makanan', 'Lele Geprek', 12000, 'Nampol pokoknya mah !!!', '81992551_127516965419649_4737744623484882717_n_1580833870824_resized1024 (1).jpg', 'Tersedia', '2023-02-21 08:20:33'),
(5, 'Makanan', 'Ati Ampela Goreng', 12000, 'Gurihhh.... Gurrrrih.... Guriiiih....', 'menueditor_item_a064555a85a8463792f8e2c8dcccd6e5_1578053585026653020 (1).jpg', 'Tersedia', '2022-07-10 13:42:58'),
(6, 'Makanan', 'Tahu Tempe', 9000, 'Pedasnya Manteb...!', 'LhyoqRgPGccZrCcCsVlpGiZGTCCoO0UF-31353835353534353334d41d8cd98f00b204e9800998ecf8427e_800x800 (1).jpg', 'Tersedia', '2022-07-10 13:42:59'),
(7, 'Makanan', 'Telur', 10000, 'Jossss !!!', '1594532_7e0269ca-6f0f-402f-8364-6b97aa2b4e76_554_554.jpg', 'Tersedia', '2022-07-10 13:43:00'),
(31, 'Minuman', 'Es Jeruk', 12000, 'oke', 'Es-Jeruk-0-3825d2ffbadc88d9.jpg', 'Tersedia', '2022-07-13 05:15:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans`
--

CREATE TABLE `trans` (
  `no_nota` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('Memesan','Proses','Diantar','Selesai') NOT NULL,
  `jumlah_total` double NOT NULL,
  `id_alamat` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `trans`
--

INSERT INTO `trans` (`no_nota`, `user_id`, `status`, `jumlah_total`, `id_alamat`, `created_at`, `updated_at`) VALUES
('INV-20220712214734-2', 2, 'Selesai', 11700, 2, '2022-07-12 21:47:34', '2022-07-12 16:57:03'),
('INV-20220712235931-2', 2, 'Selesai', 21600, 2, '2022-07-12 23:59:31', '2022-08-22 02:56:17'),
('INV-20220713020337-3', 3, 'Selesai', 44100, 3, '2022-07-13 02:03:37', '2022-07-12 19:32:31'),
('INV-20220713031447-3', 3, 'Selesai', 71100, 3, '2022-07-13 03:14:47', '2022-08-22 02:56:04'),
('INV-20220713050927-4', 4, 'Selesai', 55800, 5, '2022-07-13 05:09:27', '2022-07-12 22:13:53'),
('INV-20220720215803-2', 2, 'Selesai', 40800, 2, '2022-07-20 21:58:04', '2022-07-20 14:58:50'),
('INV-20220721011335-1', 1, 'Selesai', 950400, 1, '2022-07-21 01:13:35', '2022-07-20 19:36:21'),
('INV-20220721012313-1', 1, 'Selesai', 105600, 1, '2022-07-21 01:23:14', '2022-08-22 02:55:49'),
('INV-20220722112308-2', 2, 'Selesai', 10800, 2, '2022-07-22 11:23:08', '2022-07-22 04:29:10'),
('INV-20220722113334-2', 2, 'Selesai', 18900, 2, '2022-07-22 11:33:35', '2022-08-22 02:55:29'),
('INV-20220817165100-2', 2, 'Selesai', 22500, 2, '2022-08-17 16:51:00', '2022-08-17 09:56:42'),
('INV-20220821153657-2', 2, 'Selesai', 34200, 2, '2022-08-21 15:36:58', '2022-08-22 04:09:09'),
('INV-20220822154751-4', 4, 'Selesai', 43200, 6, '2022-08-22 15:47:52', '2022-08-26 04:05:31'),
('INV-20220826111110-2', 2, 'Proses', 22500, 2, '2022-08-26 11:11:10', '2022-11-19 08:15:19'),
('INV-20220826111217-2', 2, 'Proses', 10800, 2, '2022-08-26 11:12:18', '2022-11-19 08:15:28'),
('INV-20220826111525-2', 2, 'Proses', 10800, 2, '2022-08-26 11:15:26', '2022-11-19 08:15:36'),
('INV-20221117154831-1', 1, 'Proses', 21600, 1, '2022-11-17 15:48:31', '2022-11-19 08:16:05'),
('INV-20230221075659-1', 1, 'Selesai', 209700, 1, '2023-02-21 07:57:00', '2023-02-21 01:18:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pelanggan',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Wildan Ibnu Sina', 'wildan@gmail.com', NULL, '$2y$10$t.7HDhzPcYEuMnYgIUJx2.Y0kszJoQqau5n1gEkHcAnL6A1pha7/W', 'Admin', 'mhsXgKXlTPXQn78xhYDVOcKy12I2AxVGyEdnNJa4DTqrZ3TBWz8ogomrDoj0', '2022-07-10 11:16:42', '2022-08-21 15:26:41'),
(2, 'Andi Prayogo', 'andi@gmail.com', NULL, '$2y$10$TprNwvS37Bg2H0cBeQeUM.Bsg7uTkx5Wn2DxZtAgh7g3jYPSD7UXK', 'Pelanggan', 's4oeVHqPRc30eCU1pp2UcBk8yNrJXF6bGjQkrzj04YS4L46L2Nzfz7ORTx1T', '2022-07-11 00:01:27', '2022-08-21 15:38:36'),
(3, 'Aji Gutomo', 'aji@gmail.com', NULL, '$2y$10$SrHpIV2b.LBw4dNrLtUKa.edOkTNEI96tYCnOdmKuMn44LWUzqnxy', 'Pelanggan', NULL, '2022-07-12 19:01:24', '2022-07-12 19:01:24'),
(4, 'Fajar', 'fajar@gmail.com', NULL, '$2y$10$y9CNz6A/5u3gdfSXpfjKRuMCSqS9CoFeftjMm4LmiKWTPJcvwaKW2', 'Pelanggan', NULL, '2022-07-12 22:05:24', '2022-07-12 22:05:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `item_trans`
--
ALTER TABLE `item_trans`
  ADD PRIMARY KEY (`id_item`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indeks untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`no_nota`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `item_trans`
--
ALTER TABLE `item_trans`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
