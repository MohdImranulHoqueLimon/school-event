-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';


DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `company` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `open_balance` double NOT NULL DEFAULT '0',
  `mobile` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `po_box` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `state_id` int(10) unsigned NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2016_10_10_095612_create_permission_tables',	1),
(4,	'2016_10_11_064738_create_newspost_table',	1),
(5,	'2016_10_12_060112_create_employees_table',	1),
(6,	'2016_10_16_043834_create_testimonials_table',	1),
(7,	'2016_10_25_100243_create_status_table',	1),
(8,	'2017_01_18_043020_create_provision_table',	1),
(9,	'2017_01_18_082542_create_refill_table',	1),
(10,	'2017_01_18_160109_create_refill_summaries_table',	1),
(11,	'2017_05_16_213100_create_student_users_table',	1),
(12,	'2017_05_25_000833_create_table_registration_payments',	1),
(13,	'2017_05_25_002118_create_table_registration_amount',	1);

DROP TABLE IF EXISTS `news_posts`;
CREATE TABLE `news_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `news_uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `news_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `news_body` text COLLATE utf8_unicode_ci NOT NULL,
  `news_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `provisions`;
CREATE TABLE `provisions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `provision_uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provision_ime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` int(10) unsigned NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `refills`;
CREATE TABLE `refills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `refill_uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `refill_ime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `refill_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `refill_datetime` datetime NOT NULL,
  `is_active` int(10) unsigned NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `refill_summaries`;
CREATE TABLE `refill_summaries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `total_refill` int(10) unsigned NOT NULL DEFAULT '0',
  `week` smallint(5) unsigned NOT NULL,
  `month` smallint(5) unsigned NOT NULL,
  `year` smallint(5) unsigned NOT NULL,
  `refill_date` date NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `registration_amount`;
CREATE TABLE `registration_amount` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `registration_amount` (`id`, `amount`, `created_by`, `created_at`, `updated_at`) VALUES
(1,	500,	1,	'2017-05-25 23:33:47',	'2017-05-25 23:33:47');

DROP TABLE IF EXISTS `registration_payment`;
CREATE TABLE `registration_payment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `registered_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `registration_payment_user_id_unique` (`user_id`),
  KEY `registration_payment_registered_by_foreign` (`registered_by`),
  CONSTRAINT `registration_payment_registered_by_foreign` FOREIGN KEY (`registered_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `registration_payment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'Admin',	'2017-05-25 23:33:47',	'2017-05-25 23:33:47'),
(2,	'User',	'2017-05-25 23:33:47',	'2017-05-25 23:33:47');

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_by` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `status_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_phone_unique` (`phone`),
  UNIQUE KEY `students_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `students` (`id`, `full_name`, `username`, `phone`, `email`, `address`, `city`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Imranul Hoque Limon',	'limon',	'+8801723689536',	'student1@school.com',	'Dhaka, Bangladesh',	'Dhaka, Bangladesh',	'$2y$10$TWrO/p9VTSc/JrGwSoxCI.12gSf8rUaW0F39a.hY/hehXbb54RtCe',	1,	NULL,	'2017-05-25 23:33:46',	'2017-05-25 23:33:46'),
(2,	'Shafiqul Islam',	'shafiq',	'+88017232321323',	'student2@school.com',	'Dhaka, Bangladesh',	'Dhaka, Bangladesh',	'$2y$10$Je3sG/aHDGitIpb9S.yiYuBtE1vy0Vz5uT3W0bpQo/ACM3C.GVj6e',	0,	NULL,	'2017-05-25 23:33:46',	'2017-05-25 23:33:46'),
(3,	'Shakib Al Hasan',	'shakib',	'+88017200321323',	'student3@school.com',	'Dhaka, Bangladesh',	'Dhaka, Bangladesh',	'$2y$10$m3reUECqj/ezqL8xfeSA5.O65SrGwFvckmXee.qisXz0xiZKKOzoW',	0,	NULL,	'2017-05-25 23:33:46',	'2017-05-25 23:33:46'),
(4,	'Shakib Al Hasan',	'shakib',	'+880172003213',	'stud1t3@school.com',	'Dhaka, Bangladesh',	'Dhaka, Bangladesh',	'$2y$10$LdCT.pIYUDeeEbcQvRYGtOebVEFuVEtxvrUASdZ2bKhOJTC5RPFkS',	0,	NULL,	'2017-05-25 23:33:46',	'2017-05-25 23:33:46'),
(5,	'Shakib Al Hasan',	'shakib',	'+88ki00321323',	'stdnt3@school.com',	'Dhaka, Bangladesh',	'Dhaka, Bangladesh',	'$2y$10$sdXWYZcrwXhZCB9XtRIozuFSW/MU6H3CwapqwQ3cdo/jlWRQ03/.G',	0,	NULL,	'2017-05-25 23:33:46',	'2017-05-25 23:33:46'),
(6,	'Shakib Al Hasan',	'shakib',	'+88013',	'studnt3@school.com',	'Dhaka, Bangladesh',	'Dhaka, Bangladesh',	'$2y$10$u0bbnx51psvpxXVz9sjsEeAdpOFj2S1G.XEbT0X2l0JXhfsHOPimy',	0,	NULL,	'2017-05-25 23:33:47',	'2017-05-25 23:33:47'),
(7,	'Shakib Al Hasan',	'shakib',	'+8801722223',	NULL,	'Dhaka, Bangladesh',	'Dhaka, Bangladesh',	'$2y$10$LiExEIaH1y1nfpNc2V3mdeQzuanB6u8LI14N0fFr9aOuTwt456UIy',	0,	NULL,	'2017-05-25 23:33:47',	'2017-05-25 23:33:47'),
(8,	'Shakib Al Hasan',	'shakib',	'+880171323gff',	'studet3@school.com',	'Dhaka, Bangladesh',	'Dhaka, Bangladesh',	'$2y$10$vZAw1zC.10syWCZppZIfnOxhE0l7BkTrReWl9AYnEpdA0qTmWfo.C',	0,	NULL,	'2017-05-25 23:33:47',	'2017-05-25 23:33:47'),
(9,	'Limon 1',	'shakib 1',	'+88017200143',	'stent3@school.com',	'Dhaka, Bangladesh',	'Dhaka, Bangladesh',	'$2y$10$lOeKZGBs8AE/1i/BHE.Afutrw2a1Kcregjp5ibuVOb4axTA7Xo/0S',	0,	NULL,	'2017-05-25 23:33:47',	'2017-05-25 23:33:47');

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `testimonial_uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `testimonial_client` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `testimonial_designation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `testimonial_company` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `testimonial_body` text COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_by` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emergency_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_phone_unique` (`phone`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `name`, `role`, `batch`, `phone`, `emergency_phone`, `email`, `address`, `city`, `password`, `status`, `user_image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Imranul Hoque Limon',	1,	2007,	'+8801723689536',	'',	'admin@school.com',	'Bagerhat',	'Dhaka',	'$2y$10$P9H35/mjCN5Zf3IHWRMIWevoV5KK6mLi0k07rV4ufqfM.g4BXKdLy',	1,	NULL,	NULL,	'2017-05-25 23:33:46',	'2017-05-25 23:33:46'),
(2,	'Shafiqul Islam',	1,	2007,	'+88017232321323',	'',	'admin1@school.com',	'Bagerhat',	'Dhaka',	'$2y$10$pNxnqxnv5TzVKcnNqHzfUeUsISUMlZL5YkLXgiIMFQ1byNv6Zd68G',	1,	NULL,	NULL,	'2017-05-25 23:33:46',	'2017-05-25 23:33:46'),
(3,	'Shakib Al Hasan',	1,	2000,	'+88017200321323',	'',	'user@school.com',	'Bagerhat',	'Dhaka',	'$2y$10$4HayzXYUTSxQu3hNZYpKqudTZPXj4INqghEEvuP8RzRvENZ7Mvi/O',	1,	NULL,	NULL,	'2017-05-25 23:33:46',	'2017-05-25 23:33:46');

DROP TABLE IF EXISTS `user_has_permissions`;
CREATE TABLE `user_has_permissions` (
  `user_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `user_has_permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `user_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_has_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `user_has_roles`;
CREATE TABLE `user_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `user_has_roles_user_id_foreign` (`user_id`),
  CONSTRAINT `user_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_has_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user_has_roles` (`role_id`, `user_id`) VALUES
(1,	1),
(1,	2),
(2,	3);

-- 2017-05-26 15:53:10
