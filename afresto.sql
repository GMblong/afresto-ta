-- Adminer 4.8.1 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`),
  UNIQUE KEY `admins_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `alumnis`;
CREATE TABLE `alumnis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` int(11) NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` datetime NOT NULL,
  `kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thn_lulus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterserapan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '6eEeXE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alumnis_nis_unique` (`nis`),
  UNIQUE KEY `alumnis_telp_unique` (`telp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `alumnis` (`id`, `nama`, `nis`, `telp`, `tgl_lahir`, `kelamin`, `jurusan`, `thn_lulus`, `keterserapan`, `alamat`, `password`, `created_at`, `updated_at`) VALUES
(1,	'fgfgf',	545454,	'4545',	'2023-07-21 00:00:00',	'Laki-laki',	'IPA',	'2020',	'Wirausaha',	'sdsds',	'6eEeXE',	'2023-07-27 06:28:22',	'2023-07-27 06:28:22'),
(2,	'fgfgf',	555555,	'77777777',	'2023-07-18 00:00:00',	'Laki-laki',	'IPA',	'2020',	'Wirausaha',	'dfdfd',	'6eEeXE',	'2023-07-27 06:29:21',	'2023-07-27 06:29:21')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `nama` = VALUES(`nama`), `nis` = VALUES(`nis`), `telp` = VALUES(`telp`), `tgl_lahir` = VALUES(`tgl_lahir`), `kelamin` = VALUES(`kelamin`), `jurusan` = VALUES(`jurusan`), `thn_lulus` = VALUES(`thn_lulus`), `keterserapan` = VALUES(`keterserapan`), `alamat` = VALUES(`alamat`), `password` = VALUES(`password`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`);

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `informations`;
CREATE TABLE `informations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `jobs` (`id`, `judul`, `nama_perusahaan`, `lokasi_perusahaan`, `deskripsi`, `image`, `created_at`, `updated_at`) VALUES
(1,	'fffff',	'ff',	'ff',	'ffffff',	'1690458893.jpg',	'2023-07-27 04:54:53',	'2023-07-27 04:54:53')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `judul` = VALUES(`judul`), `nama_perusahaan` = VALUES(`nama_perusahaan`), `lokasi_perusahaan` = VALUES(`lokasi_perusahaan`), `deskripsi` = VALUES(`deskripsi`), `image` = VALUES(`image`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(45,	'2014_10_12_100000_create_password_reset_tokens_table',	1),
(46,	'2019_08_19_000000_create_failed_jobs_table',	1),
(47,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(48,	'2023_05_23_182038_create_admins_table',	1),
(50,	'2023_05_28_095710_create_informations_table',	1),
(52,	'2023_06_14_065520_create_pengumuman_table',	1),
(53,	'2014_10_12_000000_create_users_table',	2),
(56,	'2023_05_28_095710_create_pengumumans_table',	3),
(57,	'2023_05_28_100341_create_jobs_table',	4),
(66,	'2023_05_27_105147_create_alumnis_table',	5)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `migration` = VALUES(`migration`), `batch` = VALUES(`batch`);

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `pengumumans`;
CREATE TABLE `pengumumans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pengumumans` (`id`, `tanggal`, `judul`, `deskripsi`, `image`, `created_at`, `updated_at`) VALUES
(1,	'2023-07-19',	'Pengumuman umum',	'Deskripsi pengumuman',	'1690456981.jpg',	'2023-07-26 10:15:26',	'2023-07-27 04:23:01'),
(3,	'2023-07-12',	'fdfd',	'dfdf',	'1690456115.jpg',	'2023-07-27 04:05:16',	'2023-07-27 04:08:35')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `tanggal` = VALUES(`tanggal`), `judul` = VALUES(`judul`), `deskripsi` = VALUES(`deskripsi`), `image` = VALUES(`image`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`);

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'alumni',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2,	'test',	'test@gmail.com',	'alumni',	'$2y$10$tJVFsj1SkfcmKsCwwfD6BeD/TdyksrqTz0MjyPqojmgSbUiuFitjC',	NULL,	'2023-07-23 23:05:21',	'2023-07-23 23:05:21'),
(3,	'admin',	'admin@gmail.com',	'admin',	'$2y$10$zeaLHDu6tRsKijhYlSVLSOHWlt1bPbcNfVMTb9j/2cX39diRLJ6gy',	NULL,	'2023-07-23 23:20:25',	'2023-07-23 23:20:25')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `email` = VALUES(`email`), `role` = VALUES(`role`), `password` = VALUES(`password`), `remember_token` = VALUES(`remember_token`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`);

-- 2023-07-27 13:33:18
