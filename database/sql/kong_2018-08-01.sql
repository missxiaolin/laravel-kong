# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: coding.ecs.lmx0536.cn (MySQL 5.5.56-MariaDB)
# Database: kong
# Generation Time: 2018-08-01 12:46:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ROLE_ROUTER_UNIQUE` (`role_id`,`router_id`),
  KEY `ROUTER_INDEX` (`router_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='角色权限表';



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
  `noDropdown` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否展示列表',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `router` WRITE;
/*!40000 ALTER TABLE `router` DISABLE KEYS */;

INSERT INTO `router` (`id`, `pid`, `level`, `name`, `code`, `route`, `res_uri`, `type`, `icon`, `is_hidden`, `noDropdown`, `created_at`, `updated_at`)
VALUES
	(1,0,0,'设置','set-up',NULL,NULL,1,'icon-iconfonticonfontjixieqimo',0,1,'2018-08-01 17:29:09','2018-08-01 07:06:40'),
	(2,1,1,'介绍','set-up-introduce',NULL,'/introduction/index',1,NULL,1,0,'2018-08-01 17:32:46','2018-08-01 07:13:45'),
	(3,0,0,'用户','user',NULL,NULL,1,'icon-ren',0,1,'2018-08-01 17:29:11','2018-08-01 07:06:09'),
	(4,1,3,'用户列表','user-list','kong/user/lists','/user/index',1,NULL,1,0,'2018-08-01 17:32:48','2018-08-01 07:06:32'),
	(5,2,3,'用户添加','user-add','kong/user/add','',1,'',0,0,'2018-08-01 20:31:55','2018-08-01 20:16:41'),
	(6,2,3,'用户详情','user-info','kong/user/info','',1,'',0,0,'2018-08-01 20:31:56','2018-08-01 20:16:41'),
	(7,2,3,'用户禁用','user-status','kong/user/status','',1,'',0,0,'2018-08-01 20:31:58','2018-08-01 20:16:41'),
	(8,2,3,'获取用户角色','user-roles','kong/user/roles','',1,'',0,0,'2018-08-01 20:31:57','2018-08-01 20:16:41'),
	(9,2,3,'绑定角色','user-update-roles','kong/user/update/roles','',1,'',0,0,'2018-08-01 20:31:58','2018-08-01 20:16:41'),
	(10,1,3,'权限列表','user-route-list','kong/route/lists','/user/route/list',1,'',1,0,'2018-08-01 20:31:59','2018-08-01 20:16:41'),
	(11,2,3,'权限添加','user-route-add','kong/route/save','',1,'',0,0,'2018-08-01 20:32:00','2018-08-01 20:16:41'),
	(12,2,3,'权限搜索','user-route-search','kong/route/search','',1,'',0,0,'2018-08-01 20:32:00','2018-08-01 20:16:41'),
	(13,2,3,'权限详情','user-route-info','kong/route/info','',1,'',0,0,'2018-08-01 20:32:01','2018-08-01 20:16:41'),
	(14,2,3,'权限删除','user-route-delete','kong/route/delete','',1,'',0,0,'2018-08-01 20:32:02','2018-08-01 20:16:41'),
	(15,1,3,'角色管理','user-role-list','kong/role/lists','/user/role/list',1,'',1,0,'2018-08-01 20:32:02','2018-08-01 20:16:41'),
	(16,2,3,'跟新规则缓存','user-role-reload','kong/role/reload','',1,'',0,0,'2018-08-01 20:32:03','2018-08-01 20:16:41'),
	(17,2,3,'角色添加','user-role-add','kong/role/add','',1,'',0,0,'2018-08-01 20:32:04','2018-08-01 20:16:41'),
	(18,2,3,'角色详情','user-role-info','kong/role/info','',1,'',0,0,'2018-08-01 20:32:04','2018-08-01 20:16:41'),
	(19,2,3,'角色删除','user-role-delete','kong/role/delete','',1,'',0,0,'2018-08-01 20:32:05','2018-08-01 20:16:41'),
	(20,2,3,'获取角色路由','user-role-routers','kong/role/routers','',1,'',0,0,'2018-08-01 20:32:06','2018-08-01 20:16:41'),
	(21,2,3,'绑定角色路由','user-role-routers-update','kong/role/routers/update','',1,'',0,0,'2018-08-01 20:32:06','2018-08-01 20:16:41'),
	(22,0,0,'Kong','kong','','',1,'icon-fuwuqi',0,1,'2018-08-01 20:32:07','2018-08-01 20:16:41'),
	(23,1,22,'服务列表','kong-service-lists','kong/service/lists','/kong/service/list',1,'',1,0,'2018-08-01 20:32:21','2018-08-01 20:16:41'),
	(24,2,22,'服务添加','kong-service-add','kong/service/add','',1,'',0,0,'2018-08-01 20:45:15','2018-08-01 20:16:41'),
	(25,2,22,'服务详情','kong-service-info','kong/service/info','',1,'',0,0,'2018-08-01 20:45:16','2018-08-01 20:16:41'),
	(26,2,22,'服务删除','kong-service-delete','kong/service/delete','',1,'',0,0,'2018-08-01 20:45:17','2018-08-01 20:16:41'),
	(27,2,22,'服务跟新','kong-service-upload','kong/service/upload','',1,'',0,0,'2018-08-01 20:45:18','2018-08-01 20:16:41'),
	(28,1,22,'消费者列表','kong-consumer-lists','kong/consumer/lists','/kong/consumer/list',1,'',1,0,'2018-08-01 20:45:19','2018-08-01 20:16:41'),
	(29,2,22,'消费者详情','kong-consumer-info','kong/consumer/info','',1,'',0,0,'2018-08-01 20:45:19','2018-08-01 20:16:41'),
	(30,2,22,'消费者添加','kong-consumer-add','kong/consumer/add','',1,'',0,0,'2018-08-01 20:45:21','2018-08-01 20:16:41'),
	(31,2,22,'消费者修改','kong-consumer-uoload','kong/consumer/upload','',1,'',0,0,'2018-08-01 20:45:21','2018-08-01 20:16:41'),
	(35,2,22,'消费者删除','kong-consumer-delete','kong/consumer/delete','',1,'',0,0,'2018-08-01 20:45:24','2018-08-01 20:16:41'),
	(36,1,22,'Api列表','kong-api-lists','kong/api/lists','/kong/apis/list',1,'',1,0,'2018-08-01 20:45:25','2018-08-01 20:16:41'),
	(37,2,22,'Api添加','kong-api-add','kong/api/add','',1,'',0,0,'2018-08-01 20:45:26','2018-08-01 20:16:41'),
	(38,2,22,'Api详情','kong-api-info','kong/api/info','',1,'',0,0,'2018-08-01 20:45:27','2018-08-01 20:16:41'),
	(39,2,22,'Api修改','kong-api-upload','kong/api/upload','',1,'',0,0,'2018-08-01 20:45:28','2018-08-01 20:16:41'),
	(40,2,22,'Api删除','kong-api-delete','kong/api/delete','',1,'',0,0,'2018-08-01 20:45:29','2018-08-01 20:16:41'),
	(41,1,22,'路由列表','kong-routes-lists','kong/routes/lists','/kong/routes/list',1,'',1,0,'2018-08-01 20:45:29','2018-08-01 20:16:41'),
	(42,2,22,'路由添加','kong-routes-add','kong/routes/add','',1,'',0,0,'2018-08-01 20:45:30','2018-08-01 20:16:41'),
	(43,2,22,'路由详情','kong-routes-info','kong/routes/info','',1,'',0,0,'2018-08-01 20:45:31','2018-08-01 20:16:41'),
	(44,2,22,'路由修改','kong-routes-upload','kong/routes/upload','',1,'',0,0,'2018-08-01 20:45:31','2018-08-01 20:16:41'),
	(45,2,22,'路由删除','kong-routes-delete','kong/routes/delete','',1,'',0,0,'2018-08-01 20:45:32','2018-08-01 20:16:41'),
	(46,1,22,'插件列表','kong-plugins-list','kong/plugins/list','/kong/plugins/list',1,'',1,0,'2018-08-01 20:45:33','2018-08-01 20:16:41'),
	(47,2,22,'插件添加','kong-plugins-add','kong/plugins/add','',1,'',0,0,'2018-08-01 20:45:34','2018-08-01 20:16:41'),
	(48,2,22,'插件详情','kong-plugins-info','kong/plugins/info','',1,'',0,0,'2018-08-01 20:45:34','2018-08-01 20:16:41'),
	(49,2,22,'插件修改','kong-plugins-upload','kong/plugins/upload','',1,'',0,0,'2018-08-01 20:45:35','2018-08-01 20:16:41'),
	(50,2,22,'插件删除','kong-plugins-delete','kong/plugins/delete','',1,'',0,0,'2018-08-01 20:45:37','2018-08-01 20:16:41');

/*!40000 ALTER TABLE `router` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT '用户ID',
  `role_id` int(11) unsigned NOT NULL COMMENT '角色ID',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `USER_ROLE_UNIQUE` (`user_id`,`role_id`),
  KEY `ROLE_INDEX` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='管理员角色表';

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`)
VALUES
	(4,1,1,'2018-07-29 09:40:35','2018-07-29 09:40:35'),
	(5,1,2,'2018-07-29 09:40:35','2018-07-29 09:40:35'),
	(6,1,3,'2018-07-29 09:40:36','2018-07-29 09:40:36'),
	(7,23,1,'2018-07-30 02:12:31','2018-07-30 02:12:31');

/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(2) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `token` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `expires_at` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `type`, `name`, `mobile`, `password`, `token`, `status`, `expires_at`, `created_at`, `updated_at`)
VALUES
	(1,1,'xiaolin','17135501105','$2y$10$pmwKEyeh7vf0N2HQgMgnSecdPaueyAS5GXv0.QMjWTekBfL7L8bS6','yuWZYVcGGmeMDQhVaYLV5b617fdf3bc22279912587',1,1533202783,'2018-08-01 17:39:43','2018-08-01 09:39:43'),
	(2,1,'xiaobeila','17135502300','$2y$10$CvarvC4RHI.0GpU4t1QjLOmqmyUSlO.I9WV51rqWcSaAil8IFbweO','NA2tFmTBrnOfA4aeaBhE5b5ff4e449226238838009',1,1533101668,'2018-07-31 13:34:28','2018-07-31 05:34:28'),
	(3,1,'测试员工1','17135502301','$2y$10$EQ79VH5S176KjpeNkTTWHuU1qKDrGiGH7WMGrg01t37zXCBpYLWKy','',1,0,'2018-08-01 17:51:10','2018-07-07 17:08:20'),
	(4,1,'测试员工2','17135502302','$2y$10$n2IaNtKnHcduix8/8uLNhOalqJlju8AVTAjjGhLbWia9WxmyRfNRS','',1,0,'2018-08-01 17:51:09','2018-07-08 02:18:40'),
	(5,1,'测试员工3','17135502303','$2y$10$92R4Aobcb3SHQXBFIeB/W.FiUj3fKl93uRNTWaP5CA76vws9FUPem','',1,0,'2018-08-01 17:51:09','2018-07-07 17:11:31'),
	(22,1,'测试账号10','13758735533','$2y$10$eNtXrjZjUe75iabLAUGBnuGEVNwQFYuD3jcn7v9wOuRex3Q/cN1ZK','',1,0,'2018-08-01 17:51:03','2018-07-25 08:34:38'),
	(23,1,'heiheihei','15014055036','$2y$10$6j1CKgTB3XWZGK72Fvb8HevdMviN5MytPxzrs0QvIfZ3tVksICaWW','86JzVvBsMuE8fr01pe045b615af5b8c00525519694',1,1533193333,'2018-08-01 17:50:13','2018-08-01 07:02:13');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
