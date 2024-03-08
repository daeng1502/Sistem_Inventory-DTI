-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for sistem_inventory
CREATE DATABASE IF NOT EXISTS `sistem_inventory` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sistem_inventory`;

-- Dumping structure for table sistem_inventory.barangs
CREATE TABLE IF NOT EXISTS `barangs` (
  `SN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesifikasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `no_kontrak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kontrak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kontrak` date NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_perolehan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sistem_inventory.barangs: ~1 rows (approximately)
/*!40000 ALTER TABLE `barangs` DISABLE KEYS */;
INSERT IGNORE INTO `barangs` (`SN`, `foto`, `nama`, `merk`, `spesifikasi`, `jumlah_barang`, `no_kontrak`, `nama_kontrak`, `tgl_kontrak`, `lokasi`, `tahun_perolehan`, `created_at`, `updated_at`) VALUES
	('123', 'WhatsApp Image 2024-02-27 at 08.04.46_39cb21f5.jpg', 'Laptop Asus', 'Asus', 'asdasd', 2, 'asdasd', 'wqeqwe', '2024-02-01', 'adsdasd', 2024, '2024-02-29 15:50:07', '2024-02-29 15:50:07');
/*!40000 ALTER TABLE `barangs` ENABLE KEYS */;

-- Dumping structure for table sistem_inventory.distribusi
CREATE TABLE IF NOT EXISTS `distribusi` (
  `dist_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `barang_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dist_tgl` date DEFAULT NULL,
  `dist_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dist_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dist_aktif` enum('Y','T') COLLATE utf8mb4_unicode_ci DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`dist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sistem_inventory.distribusi: ~1 rows (approximately)
/*!40000 ALTER TABLE `distribusi` DISABLE KEYS */;
INSERT IGNORE INTO `distribusi` (`dist_id`, `barang_id`, `lokasi_id`, `user_id`, `dist_tgl`, `dist_keterangan`, `dist_surat`, `dist_aktif`, `created_at`, `updated_at`) VALUES
	(1, '123', '2', '1', '2024-05-11', 'test update', '1709652992_white-cloud-blue-sky.jpg', 'T', '2024-03-05 15:36:32', '2024-03-06 08:04:52'),
	(2, '123', '2', '1', '2024-03-08', 'asdfwersdfsdf', '1709712382_pexels-pixabay-50594.jpg', 'T', '2024-03-06 08:06:22', '2024-03-06 08:12:04'),
	(3, '123', '2', '1', '2024-04-06', 'weerwrewrwerewr', '1709712753_WhatsApp Image 2024-02-05 at 07.53.49_f1fd1f71.jpg', 'Y', '2024-03-06 08:12:33', '2024-03-06 08:12:33');
/*!40000 ALTER TABLE `distribusi` ENABLE KEYS */;

-- Dumping structure for table sistem_inventory.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
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

-- Dumping data for table sistem_inventory.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table sistem_inventory.lokasi
CREATE TABLE IF NOT EXISTS `lokasi` (
  `lokasi_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lokasi_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi_gedung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi_ruang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `lokasi_lantai` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `lokasi_aktif` enum('Y','T') COLLATE utf8mb4_unicode_ci DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lokasi_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sistem_inventory.lokasi: ~1 rows (approximately)
/*!40000 ALTER TABLE `lokasi` DISABLE KEYS */;
INSERT IGNORE INTO `lokasi` (`lokasi_id`, `lokasi_nama`, `lokasi_gedung`, `lokasi_ruang`, `lokasi_lantai`, `lokasi_aktif`, `created_at`, `updated_at`) VALUES
	(2, 'Administrasi Fakultas FMIPA', 'Gedung B', 'Ruang 1', '3', 'Y', '2024-03-03 23:38:09', '2024-03-03 23:46:10');
/*!40000 ALTER TABLE `lokasi` ENABLE KEYS */;

-- Dumping structure for table sistem_inventory.maintenance
CREATE TABLE IF NOT EXISTS `maintenance` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `nama_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `maintenance_id_barang_foreign` (`id_barang`),
  KEY `maintenance_user_id_foreign` (`user_id`),
  CONSTRAINT `maintenance_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`SN`),
  CONSTRAINT `maintenance_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sistem_inventory.maintenance: ~0 rows (approximately)
/*!40000 ALTER TABLE `maintenance` DISABLE KEYS */;
/*!40000 ALTER TABLE `maintenance` ENABLE KEYS */;

-- Dumping structure for table sistem_inventory.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sistem_inventory.migrations: ~6 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(7, '2014_10_12_000000_create_users_table', 1),
	(8, '2014_10_12_100000_create_password_resets_table', 1),
	(9, '2019_08_19_000000_create_failed_jobs_table', 1),
	(10, '2024_02_05_084012_create_barangs_table', 1),
	(12, '2024_02_29_152522_tc_distribusi', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table sistem_inventory.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sistem_inventory.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table sistem_inventory.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sistem_inventory.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `name`, `usertype`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'arif', 'admin', 'arif@gmail.com', NULL, '$2y$10$4YLm2PKxXsJgWGLMxjCH5OO3gAkL/62udyf5fNgryqp..Om5Z7et2', NULL, '2024-02-29 15:45:16', '2024-02-29 15:45:16');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
