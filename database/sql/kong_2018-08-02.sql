# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.18)
# Database: kong
# Generation Time: 2018-08-02 03:40:12 +0000
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
	(1,'超级管理角色','所有权限','2018-01-18 11:34:44','2018-01-18 11:34:44');

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
	(1,1,1,'2018-07-28 14:29:29','2018-07-28 14:29:29'),
	(2,1,5,'2018-08-02 10:36:14','2018-08-02 10:36:14');

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
  `is_hidden` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否显示',
  `noDropdown` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否显示到导航条',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `router` WRITE;
/*!40000 ALTER TABLE `router` DISABLE KEYS */;

INSERT INTO `router` (`id`, `pid`, `level`, `name`, `code`, `route`, `res_uri`, `type`, `icon`, `is_hidden`, `noDropdown`, `created_at`, `updated_at`)
VALUES
	(1,0,0,'设置','set_up',NULL,NULL,1,'icon-iconfonticonfontjixieqimo',0,1,'2018-08-02 11:28:05','2018-08-01 07:06:40'),
	(2,1,1,'介绍','set_up_introduce',NULL,'/introduction/index',1,NULL,1,0,'2018-08-02 11:28:09','2018-08-01 07:13:45'),
	(3,0,0,'用户','user',NULL,NULL,1,'icon-ren',0,1,'2018-08-01 17:29:11','2018-08-01 07:06:09'),
	(4,1,3,'用户列表','user_list','kong/user/lists','/user/index',1,NULL,1,0,'2018-08-02 11:28:12','2018-08-01 07:06:32'),
	(5,2,3,'用户添加','user_add','kong/user/add','',1,'',0,0,'2018-08-02 11:28:15','2018-08-01 20:16:41'),
	(6,2,3,'用户详情','user_info','kong/user/info','',1,'',0,0,'2018-08-02 11:28:17','2018-08-01 20:16:41'),
	(7,2,3,'用户禁用','user_status','kong/user/status','',1,'',0,0,'2018-08-02 11:28:19','2018-08-01 20:16:41'),
	(8,2,3,'获取用户角色','user_roles','kong/user/roles','',1,'',0,0,'2018-08-02 11:28:37','2018-08-01 20:16:41'),
	(9,2,3,'绑定角色','user_update_roles','kong/user/update/roles','',1,'',0,0,'2018-08-02 11:28:42','2018-08-01 20:16:41'),
	(10,1,3,'权限列表','user_route_list','kong/route/lists','/user/route/list',1,'',1,0,'2018-08-02 11:28:46','2018-08-01 20:16:41'),
	(11,2,3,'权限添加','user_route_add','kong/route/save','',1,'',0,0,'2018-08-02 11:28:52','2018-08-01 20:16:41'),
	(12,2,3,'权限搜索','user_route_search','kong/route/search','',1,'',0,0,'2018-08-02 11:29:12','2018-08-01 20:16:41'),
	(13,2,3,'权限详情','user_route_info','kong/route/info','',1,'',0,0,'2018-08-02 11:29:16','2018-08-01 20:16:41'),
	(14,2,3,'权限删除','user_route_delete','kong/route/delete','',1,'',0,0,'2018-08-02 11:29:20','2018-08-01 20:16:41'),
	(15,1,3,'角色管理','user_role_list','kong/role/lists','/user/role/list',1,'',1,0,'2018-08-02 11:29:24','2018-08-01 20:16:41'),
	(16,2,3,'跟新规则缓存','user_role_reload','kong/role/reload','',1,'',0,0,'2018-08-02 11:29:28','2018-08-01 20:16:41'),
	(17,2,3,'角色添加','user_role_add','kong/role/add','',1,'',0,0,'2018-08-02 11:29:35','2018-08-01 20:16:41'),
	(18,2,3,'角色详情','user_role_info','kong/role/info','',1,'',0,0,'2018-08-02 11:29:39','2018-08-01 20:16:41'),
	(19,2,3,'角色删除','user_role_delete','kong/role/delete','',1,'',0,0,'2018-08-02 11:29:44','2018-08-01 20:16:41'),
	(20,2,3,'获取角色路由','user_role_routers','kong/role/routers','',1,'',0,0,'2018-08-02 11:29:49','2018-08-01 20:16:41'),
	(21,2,3,'绑定角色路由','user_role_routers_update','kong/role/routers/update','',1,'',0,0,'2018-08-02 11:29:55','2018-08-01 20:16:41'),
	(22,0,0,'Kong','kong','','',1,'icon-fuwuqi',0,1,'2018-08-01 20:32:07','2018-08-01 20:16:41'),
	(23,1,22,'服务列表','kong_service_lists','kong/service/lists','/kong/service/list',1,'',1,0,'2018-08-02 11:30:02','2018-08-01 20:16:41'),
	(24,2,22,'服务添加','kong_service_add','kong/service/add','',1,'',0,0,'2018-08-02 11:30:07','2018-08-01 20:16:41'),
	(25,2,22,'服务详情','kong_service_info','kong/service/info','',1,'',0,0,'2018-08-02 11:30:11','2018-08-01 20:16:41'),
	(26,2,22,'服务删除','kong_service_delete','kong/service/delete','',1,'',0,0,'2018-08-02 11:30:17','2018-08-01 20:16:41'),
	(27,2,22,'服务跟新','kong_service_upload','kong/service/upload','',1,'',0,0,'2018-08-02 11:30:21','2018-08-01 20:16:41'),
	(28,1,22,'消费者列表','kong_consumer_lists','kong/consumer/lists','/kong/consumer/list',1,'',1,0,'2018-08-02 11:30:25','2018-08-01 20:16:41'),
	(29,2,22,'消费者详情','kong_consumer_info','kong/consumer/info','',1,'',0,0,'2018-08-02 11:30:30','2018-08-01 20:16:41'),
	(30,2,22,'消费者添加','kong_consumer_add','kong/consumer/add','',1,'',0,0,'2018-08-02 11:30:48','2018-08-01 20:16:41'),
	(31,2,22,'消费者修改','kong_consumer_uoload','kong/consumer/upload','',1,'',0,0,'2018-08-02 11:30:52','2018-08-01 20:16:41'),
	(35,2,22,'消费者删除','kong_consumer_delete','kong/consumer/delete','',1,'',0,0,'2018-08-02 11:30:57','2018-08-01 20:16:41'),
	(36,1,22,'Api列表','kong_api_lists','kong/api/lists','/kong/apis/list',1,'',1,0,'2018-08-02 11:31:01','2018-08-01 20:16:41'),
	(37,2,22,'Api添加','kong_api_add','kong/api/add','',1,'',0,0,'2018-08-02 11:31:06','2018-08-01 20:16:41'),
	(38,2,22,'Api详情','kong_api_info','kong/api/info','',1,'',0,0,'2018-08-02 11:31:10','2018-08-01 20:16:41'),
	(39,2,22,'Api修改','kong_api_upload','kong/api/upload','',1,'',0,0,'2018-08-02 11:31:13','2018-08-01 20:16:41'),
	(40,2,22,'Api删除','kong_api_delete','kong/api/delete','',1,'',0,0,'2018-08-02 11:31:18','2018-08-01 20:16:41'),
	(41,1,22,'路由列表','kong_routes_lists','kong/routes/lists','/kong/routes/list',1,'',1,0,'2018-08-02 11:31:25','2018-08-01 20:16:41'),
	(42,2,22,'路由添加','kong_routes_add','kong/routes/add','',1,'',0,0,'2018-08-02 11:31:30','2018-08-01 20:16:41'),
	(43,2,22,'路由详情','kong_routes_info','kong/routes/info','',1,'',0,0,'2018-08-02 11:31:35','2018-08-01 20:16:41'),
	(44,2,22,'路由修改','kong_routes_upload','kong/routes/upload','',1,'',0,0,'2018-08-02 11:31:53','2018-08-01 20:16:41'),
	(45,2,22,'路由删除','kong_routes_delete','kong/routes/delete','',1,'',0,0,'2018-08-02 11:31:57','2018-08-01 20:16:41'),
	(46,1,22,'插件列表','kong_plugins_list','kong/plugins/list','/kong/plugins/list',1,'',1,0,'2018-08-02 11:32:03','2018-08-01 20:16:41'),
	(47,2,22,'插件添加','kong_plugins_add','kong/plugins/add','',1,'',0,0,'2018-08-02 11:32:08','2018-08-01 20:16:41'),
	(48,2,22,'插件详情','kong_plugins_info','kong/plugins/info','',1,'',0,0,'2018-08-02 11:32:12','2018-08-01 20:16:41'),
	(49,2,22,'插件修改','kong_plugins_upload','kong/plugins/upload','',1,'',0,0,'2018-08-02 11:32:17','2018-08-01 20:16:41'),
	(50,2,22,'插件删除','kong_plugins_delete','kong/plugins/delete','',1,'',0,0,'2018-08-02 11:32:22','2018-08-01 20:16:41');

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
	(1,'xiaolin',1,'17135501105','$2y$10$bQKWHupv1EvGU3mq99k6u.YG0ob3nNvcd/.xC3bkXZBrUHzhYd/Ua','12utP2R5PZLCCZJ7ituM5b62738033105334807560',1,1533265152,'2018-08-02 11:01:19','2018-08-02 02:59:12'),
	(9,'1',1,'17135501102','$2y$10$bQKWHupv1EvGU3mq99k6u.YG0ob3nNvcd/.xC3bkXZBrUHzhYd/Ua','',1,1533189645,'2018-08-01 17:12:59','2018-08-01 06:00:45'),
	(10,'1',0,'17135501103','$2y$10$2Rxg.WiO4wl.KD5lLrINoeuLX64vZXSkpmsuA4HL3Eh6KoB7XYzSS','',1,0,'2018-08-01 17:13:03','2018-07-05 09:11:23');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
