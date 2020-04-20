# Host:  (Version 5.5.5-10.2.11-MariaDB-log)
# Date: 2020-04-20 12:52:44
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

INSERT INTO `migration_versions` VALUES ('20200417152917','2020-04-17 15:32:31');

#
# Structure for table "movies"
#

DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `duration` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_trailer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `week_number` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "movies"
#

INSERT INTO `movies` VALUES (1,'action','007 sem tempo','ewreregter','2020-10-12','120 minutes','dfjkwejrfw frkjwehkjwhe  jehwrkjehw ','https://pathe-cdp.triple-it.nl/web/No_Time_To_Die_TRL_web720p_20191204033051.mp4','10','2020-04-17 13:49:02','2020-04-17 13:49:02'),(3,'action aventure','wewe testando 007 sem tempo 2','ewreregter','2020-10-20','120 minutes','dfjkwejrfw frkjwehkjwhe  jehwrkjehw ','https://pathe-cdp.triple-it.nl/web/No_Time_To_Die_TRL_web720p_20191204033051.mp4','10','2020-04-17 14:41:24','2020-04-17 14:41:24'),(4,'action aventure','wewe testando 007 sem tempo 2','ewreregter','2020-10-20','120 minutes','dfjkwejrfw frkjwehkjwhe  jehwrkjehw ','https://pathe-cdp.triple-it.nl/web/No_Time_To_Die_TRL_web720p_20191204033051.mp4','12','2020-04-17 14:41:37','2020-04-17 14:41:37'),(5,'action aventure','wewe testando 007 sem tempo 2','ewreregter','2020-10-20','120 minutes','dfjkwejrfw frkjwehkjwhe  jehwrkjehw ','https://pathe-cdp.triple-it.nl/web/No_Time_To_Die_TRL_web720p_20191204033051.mp4','15','2020-04-17 14:41:50','2020-04-17 14:41:50');
