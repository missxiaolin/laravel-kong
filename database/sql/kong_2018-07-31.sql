# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.18)
# Database: kong
# Generation Time: 2018-07-31 07:16:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2018_07_04_000000_create_nodes_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nodes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nodes`;

CREATE TABLE `nodes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `nodes` WRITE;
/*!40000 ALTER TABLE `nodes` DISABLE KEYS */;

INSERT INTO `nodes` (`id`, `name`, `url`, `created_at`, `updated_at`)
VALUES
	(1,'test','http://kong.coding.lmx0536.cn','2018-01-18 11:34:44','2018-01-18 11:34:44');

/*!40000 ALTER TABLE `nodes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '角色名',
  `role_desc` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '注释',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='角色表';

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;

INSERT INTO `role` (`id`, `role_name`, `role_desc`, `created_at`, `updated_at`)
VALUES
	(1,'超级管理角色','所有权限','2018-01-18 11:34:44','2018-01-18 11:34:44'),
	(2,'登录角色','可以登录系统','2018-01-18 11:35:10','2018-01-18 11:35:10'),
	(3,'基础角色','路由相关权限','2018-01-23 17:50:05','2018-01-23 17:50:05');

/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table role_router
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_router`;

CREATE TABLE `role_router` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '角色ID',
  `router_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '接口ID',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ROLE_ROUTER_UNIQUE` (`role_id`,`router_id`),
  KEY `ROUTER_INDEX` (`router_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='角色权限表';

LOCK TABLES `role_router` WRITE;
/*!40000 ALTER TABLE `role_router` DISABLE KEYS */;

INSERT INTO `role_router` (`id`, `role_id`, `router_id`, `created_at`, `updated_at`)
VALUES
	(3,1,1,'2018-07-28 14:29:29','2018-07-28 14:29:29');

/*!40000 ALTER TABLE `role_router` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table router
# ------------------------------------------------------------

DROP TABLE IF EXISTS `router`;

CREATE TABLE `router` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` tinyint(2) unsigned DEFAULT '0' COMMENT '0 模块 1 页面 2按钮',
  `level` tinyint(2) NOT NULL COMMENT '父级Id',
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '接口名',
  `code` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '编码',
  `route` varchar(62) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '权限路由',
  `res_uri` varchar(62) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '目标地址',
  `type` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '路由类型 0自定义路由 1系统路由',
  `icon` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '图标',
  `is_hidden` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false' COMMENT '是否显示',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `router` WRITE;
/*!40000 ALTER TABLE `router` DISABLE KEYS */;

INSERT INTO `router` (`id`, `pid`, `level`, `name`, `code`, `route`, `res_uri`, `type`, `icon`, `is_hidden`, `created_at`, `updated_at`)
VALUES
	(4,0,0,'ceshi','kong',NULL,NULL,1,NULL,'0','2018-07-31 02:30:07','2018-07-31 02:30:07'),
	(5,1,4,'list','kong-list',NULL,NULL,1,NULL,'0','2018-07-31 05:13:27','2018-07-31 05:13:27');

/*!40000 ALTER TABLE `router` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT '用户ID',
  `role_id` int(11) unsigned NOT NULL COMMENT '角色ID',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `USER_ROLE_UNIQUE` (`user_id`,`role_id`),
  KEY `ROLE_INDEX` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='管理员角色表';

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`)
VALUES
	(17,1,1,'2018-07-29 09:28:27','2018-07-29 09:28:27');

/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(2) NOT NULL DEFAULT '1',
  `mobile` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '''''',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `expires_at` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_mobile_unique` (`mobile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `type`, `mobile`, `password`, `token`, `status`, `expires_at`, `created_at`, `updated_at`)
VALUES
	(1,'xiaolin',1,'17135501105','$2y$10$bQKWHupv1EvGU3mq99k6u.YG0ob3nNvcd/.xC3bkXZBrUHzhYd/Ua','sgjztMXOLtd93hky8TGR5b5fb92bc7ad4107998464',1,1533086379,'2018-07-31 09:19:39','2018-07-31 01:19:39'),
	(9,'1',0,'17135501102','$2y$10$ALPnlt11WbgfipiS2oqgQe6XxqX0kJhrC2KcekWE6jak/2IJgJks6','\'\'',1,0,'2018-07-26 14:59:34','2018-07-05 09:06:15'),
	(10,'1',0,'17135501103','$2y$10$2Rxg.WiO4wl.KD5lLrINoeuLX64vZXSkpmsuA4HL3Eh6KoB7XYzSS','\'\'',1,0,'2018-07-26 14:59:28','2018-07-05 09:11:23');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
