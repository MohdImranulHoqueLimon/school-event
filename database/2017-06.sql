-- 2017-06 newsticker`
ALTER TABLE `newsticker` ADD `is_active` TINYINT(1) NOT NULL AFTER `created`, ADD `is_active_global` TINYINT(1) NOT NULL AFTER `is_active`;