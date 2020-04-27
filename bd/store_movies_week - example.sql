# Host: database-dev.cuu6et9mqpeu.us-east-1.rds.amazonaws.com  (Version 5.5.5-10.2.11-MariaDB-log)
# Date: 2020-04-26 23:54:02
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "migration_versions"
#

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "migration_versions"
#

INSERT INTO `migration_versions` VALUES ('20200424172117','2020-04-27 02:31:32');

#
# Structure for table "movies"
#

DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `duration` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_trailer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "movies"
#

INSERT INTO `movies` VALUES (2,'Sonic the Hedgehog','url_poster_sonic','2021-02-02','120 minutes','The first trailer for this adaptation of the classic video game famously drew the ire of Sonic fans around the world, prompting the studio to announce that it would be updating the look of the character.','https://youtu.be/_K69neKGZlM','2020-04-26 23:46:03','2020-04-26 23:46:03'),(3,'No Time To Die - 007','url_poster_007','2020-11-25','100 minutes','True Detective director Cary Fukunaga takes the reins for the 25th James Bond film, with Daniel Craig returning for his fifth and (presumably) final turn as 007.','https://youtu.be/r7rcE7bhCFE','2020-04-26 23:49:37','2020-04-26 23:49:37');

#
# Structure for table "genres"
#

DROP TABLE IF EXISTS `genres`;
CREATE TABLE `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movies_id` int(11) DEFAULT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A8EBE51653F590A4` (`movies_id`),
  CONSTRAINT `FK_A8EBE51653F590A4` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "genres"
#

INSERT INTO `genres` VALUES (4,2,'aventure'),(5,3,'action'),(6,3,'aventure');

#
# Structure for table "weeks"
#

DROP TABLE IF EXISTS `weeks`;
CREATE TABLE `weeks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movies_id` int(11) DEFAULT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_803157D253F590A4` (`movies_id`),
  CONSTRAINT `FK_803157D253F590A4` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "weeks"
#

INSERT INTO `weeks` VALUES (2,2,17),(3,3,17),(4,2,18);
