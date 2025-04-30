-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.4.3 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para stockflow
CREATE DATABASE IF NOT EXISTS `stockflow` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `stockflow`;

-- Copiando estrutura para tabela stockflow.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela stockflow.cache: ~32 rows (aproximadamente)
INSERT IGNORE INTO `cache` (`key`, `value`, `expiration`) VALUES
	('stockflow_cache_076f5b9ba0313f163bb89130e278aca6', 'i:1;', 1745862928),
	('stockflow_cache_076f5b9ba0313f163bb89130e278aca6:timer', 'i:1745862928;', 1745862928),
	('stockflow_cache_353c3c0c8a8c9f563eea13fe3d028a4d', 'i:1;', 1745490000),
	('stockflow_cache_353c3c0c8a8c9f563eea13fe3d028a4d:timer', 'i:1745490000;', 1745490000),
	('stockflow_cache_557387a92deeb2c9636546e0c1547a35', 'i:1;', 1746010553),
	('stockflow_cache_557387a92deeb2c9636546e0c1547a35:timer', 'i:1746010553;', 1746010553),
	('stockflow_cache_748dc2aa4cdd5766d0edf314859d4adf', 'i:1;', 1745336149),
	('stockflow_cache_748dc2aa4cdd5766d0edf314859d4adf:timer', 'i:1745336149;', 1745336149),
	('stockflow_cache_76f4141cd7e13898c3dd63aed2d2ed3c', 'i:1;', 1745921371),
	('stockflow_cache_76f4141cd7e13898c3dd63aed2d2ed3c:timer', 'i:1745921371;', 1745921371),
	('stockflow_cache_af9a8062bd9b2056216fed8db31a5728', 'i:3;', 1745922179),
	('stockflow_cache_af9a8062bd9b2056216fed8db31a5728:timer', 'i:1745922179;', 1745922179),
	('stockflow_cache_c13a8cf2674e608a996e98342053927d', 'i:1;', 1744292559),
	('stockflow_cache_c13a8cf2674e608a996e98342053927d:timer', 'i:1744292559;', 1744292559),
	('stockflow_cache_c3ee521dd2fc129dcca6ac0dd404eff0', 'i:1;', 1745866158),
	('stockflow_cache_c3ee521dd2fc129dcca6ac0dd404eff0:timer', 'i:1745866158;', 1745866158),
	('stockflow_cache_daed2cf25ace4c97ecfec6862a8aa28e', 'i:1;', 1745866417),
	('stockflow_cache_daed2cf25ace4c97ecfec6862a8aa28e:timer', 'i:1745866417;', 1745866417),
	('stockflow_cache_e4fe72cc16a684a5bdf5bcfd266e71cb', 'i:1;', 1745867083),
	('stockflow_cache_e4fe72cc16a684a5bdf5bcfd266e71cb:timer', 'i:1745867083;', 1745867083),
	('stockflow_cache_ea5175c690d8ec33a710b5a3460160b3', 'i:3;', 1745921567),
	('stockflow_cache_ea5175c690d8ec33a710b5a3460160b3:timer', 'i:1745921567;', 1745921567),
	('stockflow_cache_guiherme@gmail.com|127.0.0.1', 'i:1;', 1745490001),
	('stockflow_cache_guiherme@gmail.com|127.0.0.1:timer', 'i:1745490001;', 1745490001),
	('stockflow_cache_guilhermesouza120903@gmail.com|127.0.0.1', 'i:1;', 1745336149),
	('stockflow_cache_guilhermesouza120903@gmail.com|127.0.0.1:timer', 'i:1745336149;', 1745336149),
	('stockflow_cache_keth@gmail.com|127.0.0.1', 'i:1;', 1745921600),
	('stockflow_cache_keth@gmail.com|127.0.0.1:timer', 'i:1745921600;', 1745921600),
	('stockflow_cache_kethilin@gmail.com|127.0.0.1', 'i:1;', 1745866158),
	('stockflow_cache_kethilin@gmail.com|127.0.0.1:timer', 'i:1745866158;', 1745866158),
	('stockflow_cache_teste2@gmail.com|127.0.0.1', 'i:1;', 1745862928),
	('stockflow_cache_teste2@gmail.com|127.0.0.1:timer', 'i:1745862928;', 1745862928);

-- Copiando estrutura para tabela stockflow.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela stockflow.cache_locks: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela stockflow.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela stockflow.categorias: ~2 rows (aproximadamente)

-- Copiando estrutura para tabela stockflow.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela stockflow.failed_jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela stockflow.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela stockflow.jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela stockflow.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela stockflow.job_batches: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela stockflow.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela stockflow.migrations: ~7 rows (aproximadamente)
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(9, '0001_01_01_000000_create_users_table', 1),
	(10, '0001_01_01_000001_create_cache_table', 1),
	(11, '0001_01_01_000002_create_jobs_table', 1),
	(12, '2025_03_30_235729_add_two_factor_columns_to_users_table', 1),
	(14, '2025_04_07_134055_create_products_table', 2),
	(15, '2025_04_07_145507_create_categorias_table', 3),
	(16, '2025_04_28_121810_create_movimentacoes_table', 4);

-- Copiando estrutura para tabela stockflow.movimentacoes
CREATE TABLE IF NOT EXISTS `movimentacoes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tipo` enum('entrada','saida') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantidade` int NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela stockflow.movimentacoes: ~7 rows (aproximadamente)

-- Copiando estrutura para tabela stockflow.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela stockflow.password_reset_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela stockflow.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` decimal(8,2) NOT NULL,
  `quantidade` int NOT NULL,
  `categoria_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela stockflow.products: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela stockflow.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela stockflow.sessions: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela stockflow.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela stockflow.users: ~3 rows (aproximadamente)
INSERT IGNORE INTO `users` (`id`, `name`, `role`, `email`, `token`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Guilherme Souza', 'administrador', 'guilherme@gmail.com', NULL, '2025-04-22 15:22:32', '$2y$12$z6t6sqwq.aJZ8rh/nagKHeiGV365zdAEnb9QNRa1wlLgEccYC7O3W', NULL, NULL, NULL, NULL, NULL, '2025-04-29 13:21:04');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
