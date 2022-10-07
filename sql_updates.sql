ALTER TABLE `videos` ADD `album_id` INT NOT NULL DEFAULT '0' AFTER `id`;


CREATE TABLE `pictures` ( `id` INT NOT NULL AUTO_INCREMENT , `album_id` INT NOT NULL DEFAULT '0' , `name` VARCHAR(255) NULL DEFAULT NULL , `image` TEXT NULL DEFAULT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `is_active` BOOLEAN NOT NULL DEFAULT TRUE , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `banners` ADD `link` TEXT NOT NULL AFTER `id`, ADD `text1` VARCHAR(256) NULL DEFAULT NULL AFTER `link`, ADD `text2` VARCHAR(256) NULL DEFAULT NULL AFTER `text1`, ADD `type` TINYINT NOT NULL DEFAULT '1' AFTER `text2`;
ALTER TABLE `banners` ADD `button` VARCHAR(20) NULL DEFAULT NULL AFTER `text2`;

# == Update 2
ALTER TABLE `companies` ADD `created` DATE NULL DEFAULT NULL AFTER `updated_at`, ADD `expire_at` DATE NULL DEFAULT NULL AFTER `created`;