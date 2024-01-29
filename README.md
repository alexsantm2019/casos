

## Paquetes adicionales a instalar:

•	Laravel collective (Uso de formularios): composer require laravelcollective/html
•	Carbon (Manejo de fechas): composer require nesbot/carbon
•	Toast (Mensajes de acciones): composer require nesbot/carbón


## Script de Base de datos (Heydi SQL)
CREATE TABLE IF NOT EXISTS `casos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_foreign_key` (`users_id`),
  CONSTRAINT `users_foreign_key` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Volcando datos para la tabla casosdb.casos: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `casos` DISABLE KEYS */;
REPLACE INTO `casos` (`id`, `titulo`, `descripcion`, `estado`, `users_id`, `fecha_creacion`) VALUES
	(2, 'Caso 1', 'Descripción Caso 1', 1, 1, NULL),
	(6, 'Caso 2', 'Descripción caso 2', 3, 2, '2024-01-26 00:00:00'),
	(7, 'Caso 3', 'Descripción Caso 3', 1, 1, '2024-01-26 00:00:00'),
	(8, 'Caso 11', 'Descripción Caso 11', 1, 1, '2024-01-26 00:00:00'),
	(9, 'Caso 4', 'Descripción Caso 4', 1, 1, '2024-01-26 00:00:00'),
	(10, 'Otro caso', 'Descripción otro caso', 1, 1, '2024-01-26 00:00:00'),
	(11, 'Vel fugiat adipisicing qui amet enim et officia', 'Dicta non recusandae Minus dolor quidem harum sequi', 1, 1, '2024-01-26 16:19:46'),
	(12, 'Magni numquam dolore fugiat impedit reiciendis', 'Qui temporibus aut animi sunt doloremque', 1, 1, '2024-01-26 16:30:54'),
	(13, 'Caso nuevo', 'Descripción caso nuevo', 1, 2, '2024-01-27 16:11:58'),
	(14, 'Sapiente ut in accusantium ea voluptas labore aute', 'Voluptatem fugiat vel occaecat quis optio est quisquam incididunt fugit elit harum laboriosam dolorem perferendis sed minus quia quod', 2, 2, '2024-01-29 16:10:16'),
	(15, 'Eiusmod sit ipsa dolor expedita placeat culpa c', 'Ea incididunt qui perferendis anim iusto neque ipsa ullam sed', 1, 2, '2024-01-29 16:10:26');
/*!40000 ALTER TABLE `casos` ENABLE KEYS */;

-- Volcando estructura para tabla casosdb.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla casosdb.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla casosdb.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla casosdb.migrations: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla casosdb.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla casosdb.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla casosdb.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

## License
Desarrollado por Alexis Muñoz
