-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for firerescue
CREATE DATABASE IF NOT EXISTS `firerescue` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `firerescue`;

-- Dumping structure for table firerescue.absensi
CREATE TABLE IF NOT EXISTS `absensi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `anggota_id` bigint(20) unsigned NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Piket Hadir','Cadangan Piket','Lepas Piket','Tidak Hadir') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `absensi_anggota_id_foreign` (`anggota_id`),
  CONSTRAINT `absensi_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table firerescue.absensi: ~0 rows (approximately)

-- Dumping structure for table firerescue.anggota
CREATE TABLE IF NOT EXISTS `anggota` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_piket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table firerescue.anggota: ~9 rows (approximately)
INSERT INTO `anggota` (`id`, `nama`, `jabatan`, `group_piket`, `created_at`, `updated_at`) VALUES
	(1, 'Iman', 'Anggota', 'A', NULL, NULL),
	(2, 'Maulana', 'Anggota', 'B', NULL, NULL),
	(3, 'Agus', 'Anggota', 'C', NULL, NULL),
	(4, 'Adon', 'Anggota', 'A', NULL, NULL),
	(5, 'Adi', 'Anggota', 'B', NULL, NULL),
	(6, 'Zaki', 'Anggota', 'C', NULL, NULL),
	(7, 'Yoga', 'Anggota', 'A', NULL, NULL),
	(8, 'Budi', 'Anggota', 'B', NULL, NULL),
	(9, 'Yuda', 'Anggota', 'C', NULL, NULL);

-- Dumping structure for table firerescue.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table firerescue.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table firerescue.jadwal_piket
CREATE TABLE IF NOT EXISTS `jadwal_piket` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `piket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table firerescue.jadwal_piket: ~7 rows (approximately)
INSERT INTO `jadwal_piket` (`id`, `tanggal`, `piket`, `created_at`, `updated_at`) VALUES
	(1, '2023-06-20', 'A', NULL, NULL),
	(2, '2023-06-21', 'B', NULL, NULL),
	(3, '2023-06-22', 'C', NULL, NULL),
	(4, '2023-06-23', 'A', NULL, NULL),
	(5, '2023-06-24', 'B', NULL, NULL),
	(6, '2023-07-25', 'A', NULL, NULL),
	(7, '2023-07-26', 'B', NULL, NULL),
	(8, '2023-07-27', 'C', NULL, NULL);

-- Dumping structure for table firerescue.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table firerescue.migrations: ~6 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_07_26_152624_create_anggota_table', 2),
	(6, '2023_07_26_153215_create_jadwal_piket_table', 3),
	(7, '2023_07_26_155013_create_absensi_table', 4);

-- Dumping structure for table firerescue.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table firerescue.password_resets: ~0 rows (approximately)

-- Dumping structure for table firerescue.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table firerescue.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table firerescue.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table firerescue.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Pemimpin Kelompok', 'pemimpin.kelompok@absensi-anggota.co.id', 'pemimpin.kelompok', '2023-07-25 13:58:25', '$2y$10$/0D5V0jcFS0IfRNvQUtsM.0kn/iuf91GwbpkYH5.bOQLUWYsb5uRC', 'kelompok', 'aOm1cZhpmoo4ibKL85bfCFePOaopMrHbwKaZ9sSmYhOM3iPdJohWtTHMEPkU', '2023-07-25 13:58:25', '2023-07-25 13:58:25'),
	(2, 'Pemimpin Apel', 'pemimpin.apel@absensi-anggota.co.id', 'pemimpin.apel', '2023-07-25 13:58:25', '$2y$10$h9OAQnl3qWns9uPRVRI06OqyOVJRT0ayjBG8RU/qDEWSCqfzkD.X.', 'apel', '4f8RGQbz2ODT51ZvNPEybfZwJDE27wbzlA2eeSucaIMfZupzzLSfLbLutZom', '2023-07-25 13:58:25', '2023-07-25 13:58:25');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
