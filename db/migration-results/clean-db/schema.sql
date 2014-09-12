-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (x86_64)
--
-- Host: 172.17.42.1    Database: db
-- ------------------------------------------------------
-- Server version	5.5.39-MariaDB-1~trusty-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `AuthAssignment`
--

DROP TABLE IF EXISTS `AuthAssignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthAssignment` (
  `itemname` varchar(64) COLLATE utf8_bin NOT NULL,
  `userid` varchar(64) COLLATE utf8_bin NOT NULL,
  `bizrule` text COLLATE utf8_bin,
  `data` text COLLATE utf8_bin,
  KEY `fk_authitem_itemname` (`itemname`),
  CONSTRAINT `fk_authitem_itemname` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `AuthItem`
--

DROP TABLE IF EXISTS `AuthItem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthItem` (
  `name` varchar(64) COLLATE utf8_bin NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_bin,
  `bizrule` text COLLATE utf8_bin,
  `data` text COLLATE utf8_bin,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `AuthItemChild`
--

DROP TABLE IF EXISTS `AuthItemChild`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthItemChild` (
  `parent` varchar(64) COLLATE utf8_bin NOT NULL,
  `child` varchar(64) COLLATE utf8_bin NOT NULL,
  KEY `fk_authitem_parent` (`parent`),
  KEY `fk_authitem_child` (`child`),
  CONSTRAINT `fk_authitem_child` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`),
  CONSTRAINT `fk_authitem_parent` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Message`
--

DROP TABLE IF EXISTS `Message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Message` (
  `id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '',
  `translation` text COLLATE utf8_bin,
  PRIMARY KEY (`id`,`language`),
  CONSTRAINT `FK_Message_SourceMessage` FOREIGN KEY (`id`) REFERENCES `SourceMessage` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Rights`
--

DROP TABLE IF EXISTS `Rights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Rights` (
  `itemname` varchar(64) COLLATE utf8_bin NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  KEY `fk_rights_authitem_itemname` (`itemname`),
  CONSTRAINT `fk_rights_authitem_itemname` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `SourceMessage`
--

DROP TABLE IF EXISTS `SourceMessage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SourceMessage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `message` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB /*AUTO_INCREMENT omitted*/ DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `_item`
--

DROP TABLE IF EXISTS `_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_item` (
  `node_id` bigint(20) NOT NULL,
  `id` bigint(20) NOT NULL,
  `_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_he_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `model_class` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `item_type` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`node_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '',
  `password` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '',
  `email` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '',
  `activkey` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NULL DEFAULT NULL,
  `salt` varchar(255) COLLATE utf8_bin NOT NULL,
  `passwordStrategy` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'legacy',
  `requireNewPassword` tinyint(1) NOT NULL DEFAULT '0',
  `lastLoginAt` timestamp NULL DEFAULT NULL,
  `lastActiveAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_username` (`username`),
  UNIQUE KEY `user_email` (`email`)
) ENGINE=InnoDB /*AUTO_INCREMENT omitted*/ DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `account_login_history`
--

DROP TABLE IF EXISTS `account_login_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_login_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accountId` int(11) NOT NULL DEFAULT '0',
  `success` tinyint(1) NOT NULL DEFAULT '0',
  `numFailedAttempts` int(11) NOT NULL DEFAULT '0',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `account_password_history`
--

DROP TABLE IF EXISTS `account_password_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_password_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accountId` int(11) NOT NULL,
  `salt` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `account_token`
--

DROP TABLE IF EXISTS `account_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accountId` int(11) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `expiresAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `accountId_token` (`accountId`,`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `action`
--

DROP TABLE IF EXISTS `action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `action` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `label` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB /*AUTO_INCREMENT omitted*/ DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_assignment` (
  `itemname` varchar(64) COLLATE utf8_bin NOT NULL,
  `userid` varchar(64) COLLATE utf8_bin NOT NULL,
  `bizrule` text COLLATE utf8_bin,
  `data` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `changeset`
--

DROP TABLE IF EXISTS `changeset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `changeset` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `contents` text COLLATE utf8_bin,
  `user_id` int(11) NOT NULL,
  `node_id` bigint(20) NOT NULL,
  `reward` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_changeset_users1_idx` (`user_id`),
  KEY `fk_changeset_node1_idx` (`node_id`),
  CONSTRAINT `fk_changeset_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_changeset_users1` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `chapter`
--

DROP TABLE IF EXISTS `chapter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chapter` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `thumbnail_media_id` int(11) DEFAULT NULL,
  `_about` text COLLATE utf8_bin,
  `_teachers_guide` text COLLATE utf8_bin,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `slug_es` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_de` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `chapter_qa_state_id` bigint(20) DEFAULT NULL,
  `slug_zh` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_bg` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ca` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_cs` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_da` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_gb` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_us` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_el` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fil` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hu` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_he` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_it` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ja` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ko` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_nl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_br` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ro` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_th` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_tr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_uk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_vi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_cn` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_tw` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fa` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chapter_p3_media1_idx` (`thumbnail_media_id`),
  KEY `fk_chapter_chapter1_idx` (`cloned_from_id`),
  KEY `fk_chapter_node1_idx` (`node_id`),
  KEY `chapter_qa_state_id_fk` (`chapter_qa_state_id`),
  KEY `fk_chapter_users1_idx` (`owner_id`),
  CONSTRAINT `chapter_qa_state_id_fk` FOREIGN KEY (`chapter_qa_state_id`) REFERENCES `chapter_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_chapter_chapter1` FOREIGN KEY (`cloned_from_id`) REFERENCES `chapter` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_chapter_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_chapter_p3_media1` FOREIGN KEY (`thumbnail_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_chapter_users1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `chapter_qa_state`
--

DROP TABLE IF EXISTS `chapter_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chapter_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_he_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `title_en_approved` tinyint(1) DEFAULT NULL,
  `slug_en_approved` tinyint(1) DEFAULT NULL,
  `about_en_approved` tinyint(1) DEFAULT NULL,
  `thumbnail_media_id_approved` tinyint(1) DEFAULT NULL,
  `teachers_guide_en_approved` tinyint(1) DEFAULT NULL,
  `exercises_approved` tinyint(1) DEFAULT NULL,
  `videos_approved` tinyint(1) DEFAULT NULL,
  `snapshots_approved` tinyint(1) DEFAULT NULL,
  `related_approved` tinyint(1) DEFAULT NULL,
  `title_approved` tinyint(1) DEFAULT NULL,
  `title_en_proofed` tinyint(1) DEFAULT NULL,
  `slug_en_proofed` tinyint(1) DEFAULT NULL,
  `about_en_proofed` tinyint(1) DEFAULT NULL,
  `thumbnail_media_id_proofed` tinyint(1) DEFAULT NULL,
  `teachers_guide_en_proofed` tinyint(1) DEFAULT NULL,
  `exercises_proofed` tinyint(1) DEFAULT NULL,
  `videos_proofed` tinyint(1) DEFAULT NULL,
  `snapshots_proofed` tinyint(1) DEFAULT NULL,
  `related_proofed` tinyint(1) DEFAULT NULL,
  `title_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ckeditor_style`
--

DROP TABLE IF EXISTS `ckeditor_style`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ckeditor_style` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `element` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `class` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `attributes_json` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ckeditor_template`
--

DROP TABLE IF EXISTS `ckeditor_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ckeditor_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `image` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `description` text COLLATE utf8_bin,
  `html` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `author_user_id` int(11) NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `_comment` text COLLATE utf8_bin,
  `context_model` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `context_id` bigint(20) DEFAULT NULL,
  `context_attribute` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `context_translate_into` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comment_users1_idx` (`author_user_id`),
  KEY `fk_comment_comment1_idx` (`parent_id`),
  CONSTRAINT `fk_comment_comment1` FOREIGN KEY (`parent_id`) REFERENCES `comment` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_comment_users1` FOREIGN KEY (`author_user_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `data_article`
--

DROP TABLE IF EXISTS `data_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_article` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_about` text COLLATE utf8_bin,
  `file_media_id` int(11) DEFAULT NULL,
  `metadata` text COLLATE utf8_bin,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `slug_es` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_de` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `data_article_qa_state_id` bigint(20) DEFAULT NULL,
  `slug_zh` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_bg` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ca` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_cs` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_da` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_gb` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_us` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_el` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fil` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hu` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_he` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_it` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ja` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ko` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_nl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_br` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ro` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_th` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_tr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_uk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_vi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_cn` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_tw` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fa` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_data_chunk_p3_media1_idx` (`file_media_id`),
  KEY `fk_data_chunk_data_chunk1_idx` (`cloned_from_id`),
  KEY `fk_data_chunk_node1_idx` (`node_id`),
  KEY `fk_data_chunk_users1_idx` (`owner_id`),
  KEY `data_chunk_qa_state_id_fk` (`data_article_qa_state_id`),
  CONSTRAINT `data_chunk_qa_state_id_fk` FOREIGN KEY (`data_article_qa_state_id`) REFERENCES `data_article_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_data_chunk_data_chunk1` FOREIGN KEY (`cloned_from_id`) REFERENCES `data_article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_data_chunk_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_data_chunk_p3_media1` FOREIGN KEY (`file_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_data_chunk_users1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `data_article_qa_state`
--

DROP TABLE IF EXISTS `data_article_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_article_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_he_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `slug_en_approved` tinyint(1) DEFAULT NULL,
  `title_en_approved` tinyint(1) DEFAULT NULL,
  `about_en_approved` tinyint(1) DEFAULT NULL,
  `title_approved` tinyint(1) DEFAULT NULL,
  `slug_en_proofed` tinyint(1) DEFAULT NULL,
  `title_en_proofed` tinyint(1) DEFAULT NULL,
  `about_en_proofed` tinyint(1) DEFAULT NULL,
  `title_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `data_source`
--

DROP TABLE IF EXISTS `data_source`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_source` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_about` text COLLATE utf8_bin,
  `logo_media_id` int(11) DEFAULT NULL,
  `mini_logo_media_id` int(11) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `slug_es` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_de` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `data_source_qa_state_id` bigint(20) DEFAULT NULL,
  `slug_zh` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_bg` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ca` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_cs` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_da` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_gb` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_us` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_el` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fil` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hu` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_he` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_it` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ja` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ko` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_nl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_br` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ro` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_th` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_tr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_uk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_vi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_cn` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_tw` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fa` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_data_source_p3_media1_idx` (`logo_media_id`),
  KEY `fk_data_source_p3_media2_idx` (`mini_logo_media_id`),
  KEY `fk_data_source_data_source1_idx` (`cloned_from_id`),
  KEY `fk_data_source_node1_idx` (`node_id`),
  KEY `data_source_qa_state_id_fk` (`data_source_qa_state_id`),
  KEY `fk_data_source_users1_idx` (`owner_id`),
  CONSTRAINT `data_source_qa_state_id_fk` FOREIGN KEY (`data_source_qa_state_id`) REFERENCES `data_source_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_data_source_data_source1` FOREIGN KEY (`cloned_from_id`) REFERENCES `snapshot` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_data_source_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_data_source_p3_media1` FOREIGN KEY (`logo_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_data_source_p3_media2` FOREIGN KEY (`mini_logo_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_data_source_users1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `data_source_qa_state`
--

DROP TABLE IF EXISTS `data_source_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_source_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_he_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `slug_en_approved` tinyint(1) DEFAULT NULL,
  `title_en_approved` tinyint(1) DEFAULT NULL,
  `about_en_approved` tinyint(1) DEFAULT NULL,
  `title_approved` tinyint(1) DEFAULT NULL,
  `slug_en_proofed` tinyint(1) DEFAULT NULL,
  `title_en_proofed` tinyint(1) DEFAULT NULL,
  `about_en_proofed` tinyint(1) DEFAULT NULL,
  `title_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `download_link`
--

DROP TABLE IF EXISTS `download_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `download_link` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `file_media_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `download_link_qa_state_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_download_link_p3_media1_idx` (`file_media_id`),
  KEY `fk_download_link_download_link1_idx` (`cloned_from_id`),
  KEY `fk_download_link_node1_idx` (`node_id`),
  KEY `fk_download_link_users1_idx` (`owner_id`),
  KEY `download_link_qa_state_id_fk` (`download_link_qa_state_id`),
  CONSTRAINT `download_link_qa_state_id_fk` FOREIGN KEY (`download_link_qa_state_id`) REFERENCES `download_link_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_download_link_download_link1` FOREIGN KEY (`cloned_from_id`) REFERENCES `download_link` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_download_link_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_download_link_p3_media1` FOREIGN KEY (`file_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_download_link_users1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `download_link_qa_state`
--

DROP TABLE IF EXISTS `download_link_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `download_link_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_iw_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `file_media_id_approved` tinyint(1) DEFAULT NULL,
  `title_en_approved` tinyint(1) DEFAULT NULL,
  `title_approved` tinyint(1) DEFAULT NULL,
  `file_media_id_proofed` tinyint(1) DEFAULT NULL,
  `title_en_proofed` tinyint(1) DEFAULT NULL,
  `title_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `edge`
--

DROP TABLE IF EXISTS `edge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edge` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `from_node_id` bigint(20) NOT NULL,
  `to_node_id` bigint(20) NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `relation` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_node_has_node_node2_idx` (`to_node_id`),
  KEY `fk_node_has_node_node1_idx` (`from_node_id`),
  CONSTRAINT `fk_node_has_node_node1` FOREIGN KEY (`from_node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_node_has_node_node2` FOREIGN KEY (`to_node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `email_message`
--

DROP TABLE IF EXISTS `email_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_message` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `from` text NOT NULL,
  `to` text NOT NULL,
  `cc` text,
  `bcc` text,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `headers` text NOT NULL,
  `contentType` varchar(255) NOT NULL,
  `charset` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `sentTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `exam_question`
--

DROP TABLE IF EXISTS `exam_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_question` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_question` text COLLATE utf8_bin,
  `source_node_id` bigint(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `slug_es` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_de` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `exam_question_qa_state_id` bigint(20) DEFAULT NULL,
  `slug_zh` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_bg` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ca` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_cs` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_da` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_gb` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_us` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_el` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fil` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hu` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_he` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_it` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ja` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ko` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_nl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_br` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ro` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_th` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_tr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_uk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_vi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_cn` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_tw` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fa` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_exam_question_exam_question1_idx` (`cloned_from_id`),
  KEY `fk_exam_question_node1_idx` (`node_id`),
  KEY `fk_exam_question_node2_idx` (`source_node_id`),
  KEY `exam_question_qa_state_id_fk` (`exam_question_qa_state_id`),
  KEY `fk_exam_question_users1_idx` (`owner_id`),
  CONSTRAINT `exam_question_qa_state_id_fk` FOREIGN KEY (`exam_question_qa_state_id`) REFERENCES `exam_question_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_exam_question_exam_question1` FOREIGN KEY (`cloned_from_id`) REFERENCES `snapshot` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_exam_question_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_exam_question_node2` FOREIGN KEY (`source_node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_exam_question_users1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `exam_question_alternative`
--

DROP TABLE IF EXISTS `exam_question_alternative`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_question_alternative` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `slug_en` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_markup` text COLLATE utf8_bin,
  `correct` tinyint(1) DEFAULT NULL,
  `exam_question_id` bigint(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `exam_question_alternative_qa_state_id` bigint(20) DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_bg` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ca` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_cs` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_da` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_de` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_gb` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_us` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_el` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_es` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fa` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fil` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hu` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_he` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_it` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ja` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ko` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_nl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_br` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ro` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_th` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_tr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_uk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_vi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_cn` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_tw` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_exam_question_alternative_exam_question1_idx` (`exam_question_id`),
  KEY `fk_exam_question_alternative_node1_idx` (`node_id`),
  KEY `fk_exam_question_alternative_users1_idx` (`owner_id`),
  KEY `exam_question_alternative_qa_state_id_fk` (`exam_question_alternative_qa_state_id`),
  CONSTRAINT `exam_question_alternative_qa_state_id_fk` FOREIGN KEY (`exam_question_alternative_qa_state_id`) REFERENCES `exam_question_alternative_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_exam_question_alternative_exam_question1` FOREIGN KEY (`exam_question_id`) REFERENCES `exam_question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_exam_question_alternative_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_exam_question_alternative_users1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `exam_question_alternative_qa_state`
--

DROP TABLE IF EXISTS `exam_question_alternative_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_question_alternative_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_he_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `markup_en_approved` tinyint(1) DEFAULT NULL,
  `correct_approved` tinyint(1) DEFAULT NULL,
  `slug_en_approved` tinyint(1) DEFAULT NULL,
  `markup_approved` tinyint(1) DEFAULT NULL,
  `markup_en_proofed` tinyint(1) DEFAULT NULL,
  `correct_proofed` tinyint(1) DEFAULT NULL,
  `slug_en_proofed` tinyint(1) DEFAULT NULL,
  `markup_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `exam_question_qa_state`
--

DROP TABLE IF EXISTS `exam_question_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_question_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_he_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `slug_en_approved` tinyint(1) DEFAULT NULL,
  `slug_approved` tinyint(1) DEFAULT NULL,
  `question_en_approved` tinyint(1) DEFAULT NULL,
  `source_node_id_approved` tinyint(1) DEFAULT NULL,
  `alternatives_approved` tinyint(1) DEFAULT NULL,
  `related_approved` tinyint(1) DEFAULT NULL,
  `question_approved` tinyint(1) DEFAULT NULL,
  `slug_en_proofed` tinyint(1) DEFAULT NULL,
  `slug_proofed` tinyint(1) DEFAULT NULL,
  `question_en_proofed` tinyint(1) DEFAULT NULL,
  `source_node_id_proofed` tinyint(1) DEFAULT NULL,
  `alternatives_proofed` tinyint(1) DEFAULT NULL,
  `related_proofed` tinyint(1) DEFAULT NULL,
  `question_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `exercise`
--

DROP TABLE IF EXISTS `exercise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_question` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_description` text COLLATE utf8_bin,
  `thumbnail_media_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `slug_es` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_de` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `exercise_qa_state_id` bigint(20) DEFAULT NULL,
  `slug_zh` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_bg` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ca` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_cs` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_da` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_gb` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_us` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_el` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fil` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hu` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_he` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_it` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ja` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ko` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_nl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_br` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ro` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_th` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_tr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_uk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_vi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_cn` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_tw` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fa` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_exercise_p3_media1_idx` (`thumbnail_media_id`),
  KEY `fk_exercise_exercise1_idx` (`cloned_from_id`),
  KEY `fk_exercise_node1_idx` (`node_id`),
  KEY `exercise_qa_state_id_fk` (`exercise_qa_state_id`),
  KEY `fk_exercise_users1_idx` (`owner_id`),
  CONSTRAINT `exercise_qa_state_id_fk` FOREIGN KEY (`exercise_qa_state_id`) REFERENCES `exercise_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_exercise_exercise1` FOREIGN KEY (`cloned_from_id`) REFERENCES `exercise` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_exercise_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_exercise_p3_media1` FOREIGN KEY (`thumbnail_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_exercise_users1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `exercise_qa_state`
--

DROP TABLE IF EXISTS `exercise_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_he_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `title_en_approved` tinyint(1) DEFAULT NULL,
  `slug_en_approved` tinyint(1) DEFAULT NULL,
  `question_en_approved` tinyint(1) DEFAULT NULL,
  `description_en_approved` tinyint(1) DEFAULT NULL,
  `thumbnail_media_id_approved` tinyint(1) DEFAULT NULL,
  `thumbnail_approved` tinyint(1) DEFAULT NULL,
  `materials_approved` tinyint(1) DEFAULT NULL,
  `title_approved` tinyint(1) DEFAULT NULL,
  `title_en_proofed` tinyint(1) DEFAULT NULL,
  `slug_en_proofed` tinyint(1) DEFAULT NULL,
  `question_en_proofed` tinyint(1) DEFAULT NULL,
  `description_en_proofed` tinyint(1) DEFAULT NULL,
  `thumbnail_media_id_proofed` tinyint(1) DEFAULT NULL,
  `thumbnail_proofed` tinyint(1) DEFAULT NULL,
  `materials_proofed` tinyint(1) DEFAULT NULL,
  `title_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ezc_execution`
--

DROP TABLE IF EXISTS `ezc_execution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ezc_execution` (
  `workflow_id` int(10) unsigned NOT NULL,
  `execution_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `execution_parent` int(10) unsigned DEFAULT NULL,
  `execution_started` int(11) NOT NULL,
  `execution_suspended` int(11) DEFAULT NULL,
  `execution_variables` blob,
  `execution_waiting_for` blob,
  `execution_threads` blob,
  `execution_next_thread_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`execution_id`),
  KEY `execution_parent` (`execution_parent`),
  KEY `fk_execution_workflow1_idx` (`workflow_id`),
  CONSTRAINT `fk_execution_workflow1` FOREIGN KEY (`workflow_id`) REFERENCES `ezc_workflow` (`workflow_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ezc_execution_state`
--

DROP TABLE IF EXISTS `ezc_execution_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ezc_execution_state` (
  `execution_id` int(10) unsigned NOT NULL,
  `node_id` int(10) unsigned NOT NULL,
  `node_state` blob,
  `node_activated_from` blob,
  `node_thread_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`execution_id`,`node_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ezc_node`
--

DROP TABLE IF EXISTS `ezc_node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ezc_node` (
  `workflow_id` int(10) unsigned NOT NULL,
  `node_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `node_class` varchar(255) COLLATE utf8_bin NOT NULL,
  `node_configuration` blob,
  PRIMARY KEY (`node_id`),
  KEY `workflow_id` (`workflow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ezc_node_connection`
--

DROP TABLE IF EXISTS `ezc_node_connection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ezc_node_connection` (
  `node_connection_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `incoming_node_id` int(10) unsigned NOT NULL,
  `outgoing_node_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`node_connection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ezc_variable_handler`
--

DROP TABLE IF EXISTS `ezc_variable_handler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ezc_variable_handler` (
  `workflow_id` int(10) unsigned NOT NULL,
  `variable` varchar(255) COLLATE utf8_bin NOT NULL,
  `class` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`workflow_id`,`class`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ezc_workflow`
--

DROP TABLE IF EXISTS `ezc_workflow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ezc_workflow` (
  `workflow_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `workflow_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `workflow_version` int(10) unsigned NOT NULL DEFAULT '1',
  `workflow_created` int(11) NOT NULL,
  PRIMARY KEY (`workflow_id`),
  UNIQUE KEY `name_version` (`workflow_name`,`workflow_version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB /*AUTO_INCREMENT omitted*/ DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `group_has_account`
--

DROP TABLE IF EXISTS `group_has_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_has_account` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_group_has_account_account1_idx` (`account_id`),
  KEY `fk_group_has_account_group1_idx` (`group_id`),
  KEY `fk_group_has_account_role1_idx` (`role_id`),
  CONSTRAINT `fk_group_has_account_account1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_group_has_account_group1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_group_has_account_role1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `gui_section`
--

DROP TABLE IF EXISTS `gui_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gui_section` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `i18n_catalog_id` bigint(20) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `gui_section_qa_state_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gui_section_i18n_catalog1_idx` (`i18n_catalog_id`),
  KEY `gui_section_qa_state_id_fk` (`gui_section_qa_state_id`),
  KEY `fk_gui_section_account1_idx` (`owner_id`),
  KEY `fk_gui_section_node1_idx` (`node_id`),
  KEY `fk_gui_section_gui_section1_idx` (`cloned_from_id`),
  CONSTRAINT `fk_gui_section_account1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_gui_section_gui_section1` FOREIGN KEY (`cloned_from_id`) REFERENCES `gui_section` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_gui_section_i18n_catalog1` FOREIGN KEY (`i18n_catalog_id`) REFERENCES `i18n_catalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_gui_section_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `gui_section_qa_state_id_fk` FOREIGN KEY (`gui_section_qa_state_id`) REFERENCES `gui_section_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `gui_section_qa_state`
--

DROP TABLE IF EXISTS `gui_section_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gui_section_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_iw_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `title_approved` tinyint(1) DEFAULT NULL,
  `slug_approved` tinyint(1) DEFAULT NULL,
  `title_proofed` tinyint(1) DEFAULT NULL,
  `slug_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `html_chunk`
--

DROP TABLE IF EXISTS `html_chunk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `html_chunk` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `_markup` text COLLATE utf8_bin,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `html_chunk_qa_state_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_html_chunk_html_chunk1_idx` (`cloned_from_id`),
  KEY `fk_html_chunk_node1_idx` (`node_id`),
  KEY `fk_html_chunk_users1_idx` (`owner_id`),
  KEY `html_chunk_qa_state_id_fk` (`html_chunk_qa_state_id`),
  CONSTRAINT `fk_html_chunk_html_chunk1` FOREIGN KEY (`cloned_from_id`) REFERENCES `html_chunk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_html_chunk_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_html_chunk_users1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `html_chunk_qa_state_id_fk` FOREIGN KEY (`html_chunk_qa_state_id`) REFERENCES `html_chunk_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `html_chunk_qa_state`
--

DROP TABLE IF EXISTS `html_chunk_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `html_chunk_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_iw_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `markup_en_approved` tinyint(1) DEFAULT NULL,
  `markup_approved` tinyint(1) DEFAULT NULL,
  `markup_en_proofed` tinyint(1) DEFAULT NULL,
  `markup_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `i18n_catalog`
--

DROP TABLE IF EXISTS `i18n_catalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `i18n_catalog` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `about` text COLLATE utf8_bin,
  `i18n_category` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `po_contents` text COLLATE utf8_bin,
  `pot_import_media_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `i18n_catalog_qa_state_id` bigint(20) DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_bg` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ca` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_cs` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_da` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_de` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_gb` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_us` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_el` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_es` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fa` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fil` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hu` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_he` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_it` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ja` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ko` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_nl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_br` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ro` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_th` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_tr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_uk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_vi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_cn` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_tw` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_en_UNIQUE` (`slug_en`),
  UNIQUE KEY `slug_ar_UNIQUE` (`slug_ar`),
  UNIQUE KEY `slug_bg_UNIQUE` (`slug_bg`),
  UNIQUE KEY `slug_ca_UNIQUE` (`slug_ca`),
  UNIQUE KEY `slug_cs_UNIQUE` (`slug_cs`),
  UNIQUE KEY `slug_da_UNIQUE` (`slug_da`),
  UNIQUE KEY `slug_de_UNIQUE` (`slug_de`),
  UNIQUE KEY `slug_en_gb_UNIQUE` (`slug_en_gb`),
  UNIQUE KEY `slug_en_us_UNIQUE` (`slug_en_us`),
  UNIQUE KEY `slug_el_UNIQUE` (`slug_el`),
  UNIQUE KEY `slug_es_UNIQUE` (`slug_es`),
  UNIQUE KEY `slug_fa_UNIQUE` (`slug_fa`),
  UNIQUE KEY `slug_fi_UNIQUE` (`slug_fi`),
  UNIQUE KEY `slug_fil_UNIQUE` (`slug_fil`),
  UNIQUE KEY `slug_fr_UNIQUE` (`slug_fr`),
  UNIQUE KEY `slug_hi_UNIQUE` (`slug_hi`),
  UNIQUE KEY `slug_hr_UNIQUE` (`slug_hr`),
  UNIQUE KEY `slug_hu_UNIQUE` (`slug_hu`),
  UNIQUE KEY `slug_id_UNIQUE` (`slug_id`),
  UNIQUE KEY `slug_it_UNIQUE` (`slug_it`),
  UNIQUE KEY `slug_ja_UNIQUE` (`slug_ja`),
  UNIQUE KEY `slug_ko_UNIQUE` (`slug_ko`),
  UNIQUE KEY `slug_lt_UNIQUE` (`slug_lt`),
  UNIQUE KEY `slug_lv_UNIQUE` (`slug_lv`),
  UNIQUE KEY `slug_nl_UNIQUE` (`slug_nl`),
  UNIQUE KEY `slug_no_UNIQUE` (`slug_no`),
  UNIQUE KEY `slug_pl_UNIQUE` (`slug_pl`),
  UNIQUE KEY `slug_pt_UNIQUE` (`slug_pt`),
  UNIQUE KEY `slug_pt_br_UNIQUE` (`slug_pt_br`),
  UNIQUE KEY `slug_pt_pt_UNIQUE` (`slug_pt_pt`),
  UNIQUE KEY `slug_ro_UNIQUE` (`slug_ro`),
  UNIQUE KEY `slug_ru_UNIQUE` (`slug_ru`),
  UNIQUE KEY `slug_sk_UNIQUE` (`slug_sk`),
  UNIQUE KEY `slug_sl_UNIQUE` (`slug_sl`),
  UNIQUE KEY `slug_sr_UNIQUE` (`slug_sr`),
  UNIQUE KEY `slug_sv_UNIQUE` (`slug_sv`),
  UNIQUE KEY `slug_th_UNIQUE` (`slug_th`),
  UNIQUE KEY `slug_tr_UNIQUE` (`slug_tr`),
  UNIQUE KEY `slug_uk_UNIQUE` (`slug_uk`),
  UNIQUE KEY `slug_vi_UNIQUE` (`slug_vi`),
  UNIQUE KEY `slug_zh_UNIQUE` (`slug_zh`),
  UNIQUE KEY `slug_zh_cn_UNIQUE` (`slug_zh_cn`),
  UNIQUE KEY `slug_zh_tw_UNIQUE` (`slug_zh_tw`),
  UNIQUE KEY `slug_he_UNIQUE` (`slug_he`),
  KEY `fk_po_file_p3_media1_idx` (`pot_import_media_id`),
  KEY `po_file_qa_state_id_fk` (`i18n_catalog_qa_state_id`),
  KEY `fk_po_file_users1_idx` (`owner_id`),
  KEY `fk_i18n_catalog_i18n_catalog1_idx` (`cloned_from_id`),
  KEY `fk_i18n_catalog_node1_idx` (`node_id`),
  CONSTRAINT `fk_i18n_catalog_i18n_catalog1` FOREIGN KEY (`cloned_from_id`) REFERENCES `i18n_catalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_i18n_catalog_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_po_file_p3_media1` FOREIGN KEY (`pot_import_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_po_file_users1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `po_file_qa_state_id_fk` FOREIGN KEY (`i18n_catalog_qa_state_id`) REFERENCES `i18n_catalog_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `i18n_catalog_qa_state`
--

DROP TABLE IF EXISTS `i18n_catalog_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `i18n_catalog_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_he_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `title_approved` tinyint(1) DEFAULT NULL,
  `po_contents_en_approved` tinyint(1) DEFAULT NULL,
  `about_approved` tinyint(1) DEFAULT NULL,
  `po_contents_approved` tinyint(1) DEFAULT NULL,
  `title_proofed` tinyint(1) DEFAULT NULL,
  `po_contents_en_proofed` tinyint(1) DEFAULT NULL,
  `about_proofed` tinyint(1) DEFAULT NULL,
  `po_contents_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `item`
--

DROP TABLE IF EXISTS `item`;
/*!50001 DROP VIEW IF EXISTS `item`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `item` (
  `node_id` tinyint NOT NULL,
  `id` tinyint NOT NULL,
  `_title` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `draft_validation_progress` tinyint NOT NULL,
  `reviewable_validation_progress` tinyint NOT NULL,
  `publishable_validation_progress` tinyint NOT NULL,
  `approval_progress` tinyint NOT NULL,
  `proofing_progress` tinyint NOT NULL,
  `translate_into_en_validation_progress` tinyint NOT NULL,
  `translate_into_ar_validation_progress` tinyint NOT NULL,
  `translate_into_bg_validation_progress` tinyint NOT NULL,
  `translate_into_ca_validation_progress` tinyint NOT NULL,
  `translate_into_cs_validation_progress` tinyint NOT NULL,
  `translate_into_da_validation_progress` tinyint NOT NULL,
  `translate_into_de_validation_progress` tinyint NOT NULL,
  `translate_into_en_gb_validation_progress` tinyint NOT NULL,
  `translate_into_en_us_validation_progress` tinyint NOT NULL,
  `translate_into_el_validation_progress` tinyint NOT NULL,
  `translate_into_es_validation_progress` tinyint NOT NULL,
  `translate_into_fa_validation_progress` tinyint NOT NULL,
  `translate_into_fi_validation_progress` tinyint NOT NULL,
  `translate_into_fil_validation_progress` tinyint NOT NULL,
  `translate_into_fr_validation_progress` tinyint NOT NULL,
  `translate_into_he_validation_progress` tinyint NOT NULL,
  `translate_into_hi_validation_progress` tinyint NOT NULL,
  `translate_into_hr_validation_progress` tinyint NOT NULL,
  `translate_into_hu_validation_progress` tinyint NOT NULL,
  `translate_into_id_validation_progress` tinyint NOT NULL,
  `translate_into_it_validation_progress` tinyint NOT NULL,
  `translate_into_ja_validation_progress` tinyint NOT NULL,
  `translate_into_ko_validation_progress` tinyint NOT NULL,
  `translate_into_lt_validation_progress` tinyint NOT NULL,
  `translate_into_lv_validation_progress` tinyint NOT NULL,
  `translate_into_nl_validation_progress` tinyint NOT NULL,
  `translate_into_no_validation_progress` tinyint NOT NULL,
  `translate_into_pl_validation_progress` tinyint NOT NULL,
  `translate_into_pt_validation_progress` tinyint NOT NULL,
  `translate_into_pt_br_validation_progress` tinyint NOT NULL,
  `translate_into_pt_pt_validation_progress` tinyint NOT NULL,
  `translate_into_ro_validation_progress` tinyint NOT NULL,
  `translate_into_ru_validation_progress` tinyint NOT NULL,
  `translate_into_sk_validation_progress` tinyint NOT NULL,
  `translate_into_sl_validation_progress` tinyint NOT NULL,
  `translate_into_sr_validation_progress` tinyint NOT NULL,
  `translate_into_sv_validation_progress` tinyint NOT NULL,
  `translate_into_th_validation_progress` tinyint NOT NULL,
  `translate_into_tr_validation_progress` tinyint NOT NULL,
  `translate_into_uk_validation_progress` tinyint NOT NULL,
  `translate_into_vi_validation_progress` tinyint NOT NULL,
  `translate_into_zh_validation_progress` tinyint NOT NULL,
  `translate_into_zh_cn_validation_progress` tinyint NOT NULL,
  `translate_into_zh_tw_validation_progress` tinyint NOT NULL,
  `model_class` tinyint NOT NULL,
  `item_type` tinyint NOT NULL,
  `created` tinyint NOT NULL,
  `modified` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_bg` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ca` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_cs` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_da` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_de` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_gb` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_us` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_el` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_es` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fil` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hu` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_he` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_it` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ja` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ko` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_nl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_br` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ro` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_th` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_tr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_uk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_vi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_cn` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_tw` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `menu_qa_state_id` bigint(20) DEFAULT NULL,
  `slug_fa` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_menu_menu1_idx` (`cloned_from_id`),
  KEY `menu_qa_state_id_fk` (`menu_qa_state_id`),
  KEY `fk_menu_account1_idx` (`owner_id`),
  KEY `fk_menu_node1_idx` (`node_id`),
  CONSTRAINT `fk_menu_account1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_menu_menu1` FOREIGN KEY (`cloned_from_id`) REFERENCES `menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_menu_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `menu_qa_state_id_fk` FOREIGN KEY (`menu_qa_state_id`) REFERENCES `menu_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `menu_qa_state`
--

DROP TABLE IF EXISTS `menu_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_he_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `title_approved` tinyint(1) DEFAULT NULL,
  `slug_approved` tinyint(1) DEFAULT NULL,
  `pages_approved` tinyint(1) DEFAULT NULL,
  `title_proofed` tinyint(1) DEFAULT NULL,
  `slug_proofed` tinyint(1) DEFAULT NULL,
  `pages_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(255) COLLATE utf8_bin NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  `module` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `node`
--

DROP TABLE IF EXISTS `node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `node` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `node_has_group`
--

DROP TABLE IF EXISTS `node_has_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `node_has_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `visibility` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `node_id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_node_has_group_node1_idx` (`node_id`),
  KEY `fk_node_has_group_group1_idx` (`group_id`),
  CONSTRAINT `fk_node_has_group_group1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_node_has_group_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `p3_media`
--

DROP TABLE IF EXISTS `p3_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `p3_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(32) COLLATE utf8_bin NOT NULL,
  `type` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT 'file',
  `name_id` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `default_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `default_description` text COLLATE utf8_bin,
  `tree_parent_id` int(11) DEFAULT NULL,
  `tree_position` int(11) DEFAULT NULL,
  `custom_data_json` text COLLATE utf8_bin,
  `original_name` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `hash` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `mime_type` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `info_php_json` text COLLATE utf8_bin,
  `info_image_magick_json` text COLLATE utf8_bin,
  `access_owner` varchar(64) COLLATE utf8_bin NOT NULL,
  `access_domain` varchar(8) COLLATE utf8_bin NOT NULL,
  `access_read` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `access_update` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `access_delete` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `access_append` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `copied_from_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `p3_media_name_id_unique` (`name_id`),
  KEY `fk_p3_media_p3_media1_idx` (`tree_parent_id`),
  CONSTRAINT `fk_p3_media_p3_media1` FOREIGN KEY (`tree_parent_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `p3_media_translation`
--

DROP TABLE IF EXISTS `p3_media_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `p3_media_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p3_media_id` int(11) NOT NULL,
  `status` varchar(32) COLLATE utf8_bin NOT NULL,
  `language` varchar(8) COLLATE utf8_bin NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin,
  `access_owner` varchar(64) COLLATE utf8_bin NOT NULL,
  `access_read` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `access_update` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `access_delete` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `copied_from_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `p3_media_translation_id_language_unique` (`language`),
  KEY `fk_p3_media_translation_p3_media1_idx` (`p3_media_id`),
  CONSTRAINT `fk_p3_media_translation_p3_media1` FOREIGN KEY (`p3_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `p3_page`
--

DROP TABLE IF EXISTS `p3_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `p3_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `default_menu_name` varchar(128) COLLATE utf8_bin NOT NULL,
  `status` varchar(32) COLLATE utf8_bin NOT NULL,
  `name_id` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `tree_parent_id` int(11) DEFAULT NULL,
  `tree_position` int(11) DEFAULT NULL,
  `default_page_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `layout` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `view` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `url_json` text COLLATE utf8_bin,
  `default_url_param` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `default_keywords` text COLLATE utf8_bin,
  `default_description` text COLLATE utf8_bin,
  `custom_data_json` text COLLATE utf8_bin,
  `access_owner` varchar(64) COLLATE utf8_bin NOT NULL,
  `access_domain` varchar(8) COLLATE utf8_bin NOT NULL,
  `access_read` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `access_update` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `access_delete` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `access_append` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `copied_from_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `p3_page_name_id_unique` (`name_id`),
  KEY `tree_parent_id` (`tree_parent_id`),
  CONSTRAINT `p3_page_ibfk_1` FOREIGN KEY (`tree_parent_id`) REFERENCES `p3_page` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `p3_page_translation`
--

DROP TABLE IF EXISTS `p3_page_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `p3_page_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p3_page_id` int(11) NOT NULL,
  `language` varchar(8) COLLATE utf8_bin NOT NULL,
  `menu_name` varchar(128) COLLATE utf8_bin NOT NULL,
  `status` varchar(32) COLLATE utf8_bin NOT NULL,
  `page_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `url_param` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `keywords` text COLLATE utf8_bin,
  `description` text COLLATE utf8_bin,
  `access_owner` varchar(64) COLLATE utf8_bin NOT NULL,
  `access_read` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `access_update` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `access_delete` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `copied_from_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `p3_page_translation_id_language_unique` (`p3_page_id`,`language`),
  CONSTRAINT `p3_page_translation_ibfk_1` FOREIGN KEY (`p3_page_id`) REFERENCES `p3_page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `p3_widget`
--

DROP TABLE IF EXISTS `p3_widget`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `p3_widget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(32) COLLATE utf8_bin NOT NULL,
  `alias` varchar(128) COLLATE utf8_bin NOT NULL,
  `default_properties_json` text COLLATE utf8_bin,
  `default_content_html` text COLLATE utf8_bin,
  `name_id` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `container_id` varchar(128) COLLATE utf8_bin NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '0',
  `request_param` varchar(128) COLLATE utf8_bin DEFAULT '*',
  `action_name` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '*',
  `controller_id` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '*',
  `module_id` varchar(128) COLLATE utf8_bin DEFAULT '*',
  `session_param` varchar(128) COLLATE utf8_bin DEFAULT '*',
  `access_owner` varchar(64) COLLATE utf8_bin NOT NULL,
  `access_domain` varchar(8) COLLATE utf8_bin NOT NULL,
  `access_read` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `access_update` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `access_delete` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `copied_from_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `p3_widget_name_id_unique` (`name_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `p3_widget_translation`
--

DROP TABLE IF EXISTS `p3_widget_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `p3_widget_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p3_widget_id` int(11) NOT NULL,
  `status` varchar(32) COLLATE utf8_bin NOT NULL,
  `language` varchar(8) COLLATE utf8_bin NOT NULL,
  `properties_json` text COLLATE utf8_bin,
  `content_html` text COLLATE utf8_bin,
  `access_owner` varchar(64) COLLATE utf8_bin NOT NULL,
  `access_read` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `access_update` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `access_delete` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `copied_from_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `p3_widget_translation_id_language_unique` (`p3_widget_id`,`language`),
  CONSTRAINT `p3_widget_translation_ibfk_1` FOREIGN KEY (`p3_widget_id`) REFERENCES `p3_widget` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_about` text COLLATE utf8_bin,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `slug_es` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_de` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_bg` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ca` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_cs` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_da` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_gb` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_us` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_el` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fil` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hu` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_he` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_it` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ja` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ko` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_nl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_br` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ro` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_th` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_tr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_uk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_vi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_cn` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_tw` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `page_qa_state_id` bigint(20) DEFAULT NULL,
  `slug_fa` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_page_page1_idx` (`cloned_from_id`),
  KEY `fk_page_node1_idx` (`node_id`),
  KEY `fk_page_users1_idx` (`owner_id`),
  KEY `page_qa_state_id_fk` (`page_qa_state_id`),
  CONSTRAINT `fk_page_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_page_page1` FOREIGN KEY (`cloned_from_id`) REFERENCES `page` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_page_users1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `page_qa_state_id_fk` FOREIGN KEY (`page_qa_state_id`) REFERENCES `page_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `page_qa_state`
--

DROP TABLE IF EXISTS `page_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_he_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `title_en_approved` tinyint(1) DEFAULT NULL,
  `slug_en_approved` tinyint(1) DEFAULT NULL,
  `title_approved` tinyint(1) DEFAULT NULL,
  `title_en_proofed` tinyint(1) DEFAULT NULL,
  `slug_en_proofed` tinyint(1) DEFAULT NULL,
  `title_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `public_profile` tinyint(1) DEFAULT NULL,
  `picture_media_id` int(11) DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `others_may_contact_me` tinyint(1) DEFAULT NULL,
  `about` text COLLATE utf8_bin,
  `lives_in` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `language1` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `language2` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `language3` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `language4` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `language5` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_profiles_p3_media1_idx` (`picture_media_id`),
  CONSTRAINT `fk_profiles_p3_media1` FOREIGN KEY (`picture_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB /*AUTO_INCREMENT omitted*/ DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `profiles_fields`
--

DROP TABLE IF EXISTS `profiles_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `title` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_type` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `range` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `error_message` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `other_validator` text COLLATE utf8_bin,
  `default` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `widget` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `widgetparams` text COLLATE utf8_bin,
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB /*AUTO_INCREMENT omitted*/ DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_menu_label` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `slug_es` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_de` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_bg` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ca` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_cs` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_da` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_gb` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_us` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_el` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fil` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hu` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_he` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_it` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ja` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ko` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_nl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_br` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ro` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_th` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_tr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_uk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_vi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_cn` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_tw` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `section_qa_state_id` bigint(20) DEFAULT NULL,
  `slug_fa` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_section_node1_idx` (`node_id`),
  KEY `section_qa_state_id_fk` (`section_qa_state_id`),
  KEY `fk_section_section1_idx` (`cloned_from_id`),
  KEY `fk_section_account1_idx` (`owner_id`),
  CONSTRAINT `fk_section_account1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_section_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_section_section1` FOREIGN KEY (`cloned_from_id`) REFERENCES `section` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `section_qa_state_id_fk` FOREIGN KEY (`section_qa_state_id`) REFERENCES `section_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `section_qa_state`
--

DROP TABLE IF EXISTS `section_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_he_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `title_en_approved` tinyint(1) DEFAULT NULL,
  `slug_en_approved` tinyint(1) DEFAULT NULL,
  `title_approved` tinyint(1) DEFAULT NULL,
  `title_en_proofed` tinyint(1) DEFAULT NULL,
  `slug_en_proofed` tinyint(1) DEFAULT NULL,
  `title_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `slideshow_file`
--

DROP TABLE IF EXISTS `slideshow_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slideshow_file` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_about` text COLLATE utf8_bin,
  `original_media_id` int(11) DEFAULT NULL,
  `generate_processed_media` tinyint(1) DEFAULT NULL,
  `processed_media_id_en` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `processed_media_id_es` int(11) DEFAULT NULL,
  `processed_media_id_hi` int(11) DEFAULT NULL,
  `processed_media_id_pt` int(11) DEFAULT NULL,
  `processed_media_id_sv` int(11) DEFAULT NULL,
  `processed_media_id_de` int(11) DEFAULT NULL,
  `slideshow_file_qa_state_id` bigint(20) DEFAULT NULL,
  `slug_es` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_de` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_bg` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ca` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_cs` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_da` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_gb` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_us` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_el` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fil` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hu` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_he` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_it` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ja` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ko` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_nl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_br` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ro` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_th` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_tr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_uk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_vi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_cn` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_tw` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `processed_media_id_zh` int(11) DEFAULT NULL,
  `processed_media_id_ar` int(11) DEFAULT NULL,
  `processed_media_id_bg` int(11) DEFAULT NULL,
  `processed_media_id_ca` int(11) DEFAULT NULL,
  `processed_media_id_cs` int(11) DEFAULT NULL,
  `processed_media_id_da` int(11) DEFAULT NULL,
  `processed_media_id_en_gb` int(11) DEFAULT NULL,
  `processed_media_id_en_us` int(11) DEFAULT NULL,
  `processed_media_id_el` int(11) DEFAULT NULL,
  `processed_media_id_fi` int(11) DEFAULT NULL,
  `processed_media_id_fil` int(11) DEFAULT NULL,
  `processed_media_id_fr` int(11) DEFAULT NULL,
  `processed_media_id_hr` int(11) DEFAULT NULL,
  `processed_media_id_hu` int(11) DEFAULT NULL,
  `processed_media_id_id` int(11) DEFAULT NULL,
  `processed_media_id_iw` int(11) DEFAULT NULL,
  `processed_media_id_it` int(11) DEFAULT NULL,
  `processed_media_id_ja` int(11) DEFAULT NULL,
  `processed_media_id_ko` int(11) DEFAULT NULL,
  `processed_media_id_lt` int(11) DEFAULT NULL,
  `processed_media_id_lv` int(11) DEFAULT NULL,
  `processed_media_id_nl` int(11) DEFAULT NULL,
  `processed_media_id_no` int(11) DEFAULT NULL,
  `processed_media_id_pl` int(11) DEFAULT NULL,
  `processed_media_id_pt_br` int(11) DEFAULT NULL,
  `processed_media_id_pt_pt` int(11) DEFAULT NULL,
  `processed_media_id_ro` int(11) DEFAULT NULL,
  `processed_media_id_ru` int(11) DEFAULT NULL,
  `processed_media_id_sk` int(11) DEFAULT NULL,
  `processed_media_id_sl` int(11) DEFAULT NULL,
  `processed_media_id_sr` int(11) DEFAULT NULL,
  `processed_media_id_th` int(11) DEFAULT NULL,
  `processed_media_id_tr` int(11) DEFAULT NULL,
  `processed_media_id_uk` int(11) DEFAULT NULL,
  `processed_media_id_vi` int(11) DEFAULT NULL,
  `processed_media_id_zh_cn` int(11) DEFAULT NULL,
  `processed_media_id_zh_tw` int(11) DEFAULT NULL,
  `slug_fa` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `processed_media_id_fa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_slideshow_file_p3_media1_idx` (`original_media_id`),
  KEY `fk_slideshow_file_p3_media2_idx` (`processed_media_id_en`),
  KEY `fk_slideshow_file_slideshow_file1_idx` (`cloned_from_id`),
  KEY `fk_slideshow_file_node1_idx` (`node_id`),
  KEY `slideshow_file_qa_state_id_fk` (`slideshow_file_qa_state_id`),
  KEY `fk_slideshow_file_p3_media2_de` (`processed_media_id_de`),
  KEY `fk_slideshow_file_p3_media2_es` (`processed_media_id_es`),
  KEY `fk_slideshow_file_p3_media2_hi` (`processed_media_id_hi`),
  KEY `fk_slideshow_file_p3_media2_pt` (`processed_media_id_pt`),
  KEY `fk_slideshow_file_p3_media2_sv` (`processed_media_id_sv`),
  KEY `fk_slideshow_file_users1_idx` (`owner_id`),
  KEY `fk_slideshow_file_p3_media2_zh` (`processed_media_id_zh`),
  KEY `fk_slideshow_file_p3_media2_ar` (`processed_media_id_ar`),
  KEY `fk_slideshow_file_p3_media2_bg` (`processed_media_id_bg`),
  KEY `fk_slideshow_file_p3_media2_ca` (`processed_media_id_ca`),
  KEY `fk_slideshow_file_p3_media2_cs` (`processed_media_id_cs`),
  KEY `fk_slideshow_file_p3_media2_da` (`processed_media_id_da`),
  KEY `fk_slideshow_file_p3_media2_en_gb` (`processed_media_id_en_gb`),
  KEY `fk_slideshow_file_p3_media2_en_us` (`processed_media_id_en_us`),
  KEY `fk_slideshow_file_p3_media2_el` (`processed_media_id_el`),
  KEY `fk_slideshow_file_p3_media2_fi` (`processed_media_id_fi`),
  KEY `fk_slideshow_file_p3_media2_fil` (`processed_media_id_fil`),
  KEY `fk_slideshow_file_p3_media2_fr` (`processed_media_id_fr`),
  KEY `fk_slideshow_file_p3_media2_hr` (`processed_media_id_hr`),
  KEY `fk_slideshow_file_p3_media2_hu` (`processed_media_id_hu`),
  KEY `fk_slideshow_file_p3_media2_id` (`processed_media_id_id`),
  KEY `fk_slideshow_file_p3_media2_iw` (`processed_media_id_iw`),
  KEY `fk_slideshow_file_p3_media2_it` (`processed_media_id_it`),
  KEY `fk_slideshow_file_p3_media2_ja` (`processed_media_id_ja`),
  KEY `fk_slideshow_file_p3_media2_ko` (`processed_media_id_ko`),
  KEY `fk_slideshow_file_p3_media2_lt` (`processed_media_id_lt`),
  KEY `fk_slideshow_file_p3_media2_lv` (`processed_media_id_lv`),
  KEY `fk_slideshow_file_p3_media2_nl` (`processed_media_id_nl`),
  KEY `fk_slideshow_file_p3_media2_no` (`processed_media_id_no`),
  KEY `fk_slideshow_file_p3_media2_pl` (`processed_media_id_pl`),
  KEY `fk_slideshow_file_p3_media2_pt_br` (`processed_media_id_pt_br`),
  KEY `fk_slideshow_file_p3_media2_pt_pt` (`processed_media_id_pt_pt`),
  KEY `fk_slideshow_file_p3_media2_ro` (`processed_media_id_ro`),
  KEY `fk_slideshow_file_p3_media2_ru` (`processed_media_id_ru`),
  KEY `fk_slideshow_file_p3_media2_sk` (`processed_media_id_sk`),
  KEY `fk_slideshow_file_p3_media2_sl` (`processed_media_id_sl`),
  KEY `fk_slideshow_file_p3_media2_sr` (`processed_media_id_sr`),
  KEY `fk_slideshow_file_p3_media2_th` (`processed_media_id_th`),
  KEY `fk_slideshow_file_p3_media2_tr` (`processed_media_id_tr`),
  KEY `fk_slideshow_file_p3_media2_uk` (`processed_media_id_uk`),
  KEY `fk_slideshow_file_p3_media2_vi` (`processed_media_id_vi`),
  KEY `fk_slideshow_file_p3_media2_zh_cn` (`processed_media_id_zh_cn`),
  KEY `fk_slideshow_file_p3_media2_zh_tw` (`processed_media_id_zh_tw`),
  KEY `fk_slideshow_file_p3_media2_fa` (`processed_media_id_fa`),
  CONSTRAINT `fk_slideshow_file_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_slideshow_file_p3_media1` FOREIGN KEY (`original_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_slideshow_file_p3_media2` FOREIGN KEY (`processed_media_id_en`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_slideshow_file_p3_media2_ar` FOREIGN KEY (`processed_media_id_ar`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_bg` FOREIGN KEY (`processed_media_id_bg`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_ca` FOREIGN KEY (`processed_media_id_ca`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_cs` FOREIGN KEY (`processed_media_id_cs`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_da` FOREIGN KEY (`processed_media_id_da`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_de` FOREIGN KEY (`processed_media_id_de`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_el` FOREIGN KEY (`processed_media_id_el`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_en_gb` FOREIGN KEY (`processed_media_id_en_gb`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_en_us` FOREIGN KEY (`processed_media_id_en_us`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_es` FOREIGN KEY (`processed_media_id_es`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_fa` FOREIGN KEY (`processed_media_id_fa`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_fi` FOREIGN KEY (`processed_media_id_fi`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_fil` FOREIGN KEY (`processed_media_id_fil`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_fr` FOREIGN KEY (`processed_media_id_fr`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_hi` FOREIGN KEY (`processed_media_id_hi`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_hr` FOREIGN KEY (`processed_media_id_hr`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_hu` FOREIGN KEY (`processed_media_id_hu`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_id` FOREIGN KEY (`processed_media_id_id`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_it` FOREIGN KEY (`processed_media_id_it`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_iw` FOREIGN KEY (`processed_media_id_iw`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_ja` FOREIGN KEY (`processed_media_id_ja`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_ko` FOREIGN KEY (`processed_media_id_ko`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_lt` FOREIGN KEY (`processed_media_id_lt`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_lv` FOREIGN KEY (`processed_media_id_lv`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_nl` FOREIGN KEY (`processed_media_id_nl`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_no` FOREIGN KEY (`processed_media_id_no`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_pl` FOREIGN KEY (`processed_media_id_pl`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_pt` FOREIGN KEY (`processed_media_id_pt`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_pt_br` FOREIGN KEY (`processed_media_id_pt_br`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_pt_pt` FOREIGN KEY (`processed_media_id_pt_pt`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_ro` FOREIGN KEY (`processed_media_id_ro`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_ru` FOREIGN KEY (`processed_media_id_ru`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_sk` FOREIGN KEY (`processed_media_id_sk`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_sl` FOREIGN KEY (`processed_media_id_sl`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_sr` FOREIGN KEY (`processed_media_id_sr`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_sv` FOREIGN KEY (`processed_media_id_sv`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_th` FOREIGN KEY (`processed_media_id_th`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_tr` FOREIGN KEY (`processed_media_id_tr`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_uk` FOREIGN KEY (`processed_media_id_uk`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_vi` FOREIGN KEY (`processed_media_id_vi`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_zh` FOREIGN KEY (`processed_media_id_zh`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_zh_cn` FOREIGN KEY (`processed_media_id_zh_cn`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_zh_tw` FOREIGN KEY (`processed_media_id_zh_tw`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_slideshow_file1` FOREIGN KEY (`cloned_from_id`) REFERENCES `slideshow_file` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_slideshow_file_users1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `slideshow_file_qa_state_id_fk` FOREIGN KEY (`slideshow_file_qa_state_id`) REFERENCES `slideshow_file_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `slideshow_file_qa_state`
--

DROP TABLE IF EXISTS `slideshow_file_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slideshow_file_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_he_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `slug_en_approved` tinyint(1) DEFAULT NULL,
  `title_en_approved` tinyint(1) DEFAULT NULL,
  `original_media_id_approved` tinyint(1) DEFAULT NULL,
  `processed_media_id_en_approved` tinyint(1) DEFAULT NULL,
  `title_approved` tinyint(1) DEFAULT NULL,
  `slug_en_proofed` tinyint(1) DEFAULT NULL,
  `title_en_proofed` tinyint(1) DEFAULT NULL,
  `original_media_id_proofed` tinyint(1) DEFAULT NULL,
  `processed_media_id_en_proofed` tinyint(1) DEFAULT NULL,
  `title_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `snapshot`
--

DROP TABLE IF EXISTS `snapshot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snapshot` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `vizabi_state` text COLLATE utf8_bin,
  `embed_override` text COLLATE utf8_bin,
  `tool_id` bigint(20) DEFAULT NULL,
  `_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_about` text COLLATE utf8_bin,
  `thumbnail_media_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `slug_es` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_de` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `snapshot_qa_state_id` bigint(20) DEFAULT NULL,
  `slug_zh` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_bg` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ca` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_cs` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_da` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_gb` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_us` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_el` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fil` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hu` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_he` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_it` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ja` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ko` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_nl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_br` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ro` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_th` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_tr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_uk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_vi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_cn` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_tw` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fa` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_en_UNIQUE` (`slug_en`),
  UNIQUE KEY `slug_ar_UNIQUE` (`slug_ar`),
  UNIQUE KEY `slug_bg_UNIQUE` (`slug_bg`),
  UNIQUE KEY `slug_ca_UNIQUE` (`slug_ca`),
  UNIQUE KEY `slug_cs_UNIQUE` (`slug_cs`),
  UNIQUE KEY `slug_da_UNIQUE` (`slug_da`),
  UNIQUE KEY `slug_de_UNIQUE` (`slug_de`),
  UNIQUE KEY `slug_en_gb_UNIQUE` (`slug_en_gb`),
  UNIQUE KEY `slug_en_us_UNIQUE` (`slug_en_us`),
  UNIQUE KEY `slug_el_UNIQUE` (`slug_el`),
  UNIQUE KEY `slug_es_UNIQUE` (`slug_es`),
  UNIQUE KEY `slug_fa_UNIQUE` (`slug_fa`),
  UNIQUE KEY `slug_fi_UNIQUE` (`slug_fi`),
  UNIQUE KEY `slug_fil_UNIQUE` (`slug_fil`),
  UNIQUE KEY `slug_fr_UNIQUE` (`slug_fr`),
  UNIQUE KEY `slug_hi_UNIQUE` (`slug_hi`),
  UNIQUE KEY `slug_hr_UNIQUE` (`slug_hr`),
  UNIQUE KEY `slug_hu_UNIQUE` (`slug_hu`),
  UNIQUE KEY `slug_id_UNIQUE` (`slug_id`),
  UNIQUE KEY `slug_it_UNIQUE` (`slug_it`),
  UNIQUE KEY `slug_ja_UNIQUE` (`slug_ja`),
  UNIQUE KEY `slug_ko_UNIQUE` (`slug_ko`),
  UNIQUE KEY `slug_lt_UNIQUE` (`slug_lt`),
  UNIQUE KEY `slug_lv_UNIQUE` (`slug_lv`),
  UNIQUE KEY `slug_nl_UNIQUE` (`slug_nl`),
  UNIQUE KEY `slug_no_UNIQUE` (`slug_no`),
  UNIQUE KEY `slug_pl_UNIQUE` (`slug_pl`),
  UNIQUE KEY `slug_pt_UNIQUE` (`slug_pt`),
  UNIQUE KEY `slug_pt_br_UNIQUE` (`slug_pt_br`),
  UNIQUE KEY `slug_pt_pt_UNIQUE` (`slug_pt_pt`),
  UNIQUE KEY `slug_ro_UNIQUE` (`slug_ro`),
  UNIQUE KEY `slug_ru_UNIQUE` (`slug_ru`),
  UNIQUE KEY `slug_sk_UNIQUE` (`slug_sk`),
  UNIQUE KEY `slug_sl_UNIQUE` (`slug_sl`),
  UNIQUE KEY `slug_sr_UNIQUE` (`slug_sr`),
  UNIQUE KEY `slug_sv_UNIQUE` (`slug_sv`),
  UNIQUE KEY `slug_th_UNIQUE` (`slug_th`),
  UNIQUE KEY `slug_tr_UNIQUE` (`slug_tr`),
  UNIQUE KEY `slug_uk_UNIQUE` (`slug_uk`),
  UNIQUE KEY `slug_vi_UNIQUE` (`slug_vi`),
  UNIQUE KEY `slug_zh_UNIQUE` (`slug_zh`),
  UNIQUE KEY `slug_zh_cn_UNIQUE` (`slug_zh_cn`),
  UNIQUE KEY `slug_zh_tw_UNIQUE` (`slug_zh_tw`),
  UNIQUE KEY `slug_he_UNIQUE` (`slug_he`),
  KEY `fk_snapshot_tool1_idx` (`tool_id`),
  KEY `fk_snapshot_node1_idx` (`node_id`),
  KEY `fk_snapshot_snapshot1_idx` (`cloned_from_id`),
  KEY `snapshot_qa_state_id_fk` (`snapshot_qa_state_id`),
  KEY `fk_snapshot_p3_media1_idx` (`thumbnail_media_id`),
  KEY `fk_snapshot_users1_idx` (`owner_id`),
  CONSTRAINT `fk_snapshot_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_snapshot_p3_media1` FOREIGN KEY (`thumbnail_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_snapshot_snapshot1` FOREIGN KEY (`cloned_from_id`) REFERENCES `snapshot` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_snapshot_tool1` FOREIGN KEY (`tool_id`) REFERENCES `tool` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_snapshot_users1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `snapshot_qa_state_id_fk` FOREIGN KEY (`snapshot_qa_state_id`) REFERENCES `snapshot_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `snapshot_qa_state`
--

DROP TABLE IF EXISTS `snapshot_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snapshot_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_he_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `slug_en_approved` tinyint(1) DEFAULT NULL,
  `vizabi_state_approved` tinyint(1) DEFAULT NULL,
  `thumbnail_media_id_approved` tinyint(1) DEFAULT NULL,
  `title_approved` tinyint(1) DEFAULT NULL,
  `slug_en_proofed` tinyint(1) DEFAULT NULL,
  `vizabi_state_proofed` tinyint(1) DEFAULT NULL,
  `thumbnail_media_id_proofed` tinyint(1) DEFAULT NULL,
  `title_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `spreadsheet_file`
--

DROP TABLE IF EXISTS `spreadsheet_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spreadsheet_file` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `data_source_id` bigint(20) DEFAULT NULL,
  `original_media_id` int(11) DEFAULT NULL,
  `generate_processed_media` tinyint(1) DEFAULT NULL,
  `processed_media_id_en` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `processed_media_id_es` int(11) DEFAULT NULL,
  `processed_media_id_hi` int(11) DEFAULT NULL,
  `processed_media_id_pt` int(11) DEFAULT NULL,
  `processed_media_id_sv` int(11) DEFAULT NULL,
  `processed_media_id_de` int(11) DEFAULT NULL,
  `processed_media_id_zh` int(11) DEFAULT NULL,
  `processed_media_id_ar` int(11) DEFAULT NULL,
  `processed_media_id_bg` int(11) DEFAULT NULL,
  `processed_media_id_ca` int(11) DEFAULT NULL,
  `processed_media_id_cs` int(11) DEFAULT NULL,
  `processed_media_id_da` int(11) DEFAULT NULL,
  `processed_media_id_en_gb` int(11) DEFAULT NULL,
  `processed_media_id_en_us` int(11) DEFAULT NULL,
  `processed_media_id_el` int(11) DEFAULT NULL,
  `processed_media_id_fi` int(11) DEFAULT NULL,
  `processed_media_id_fil` int(11) DEFAULT NULL,
  `processed_media_id_fr` int(11) DEFAULT NULL,
  `processed_media_id_hr` int(11) DEFAULT NULL,
  `processed_media_id_hu` int(11) DEFAULT NULL,
  `processed_media_id_id` int(11) DEFAULT NULL,
  `processed_media_id_iw` int(11) DEFAULT NULL,
  `processed_media_id_it` int(11) DEFAULT NULL,
  `processed_media_id_ja` int(11) DEFAULT NULL,
  `processed_media_id_ko` int(11) DEFAULT NULL,
  `processed_media_id_lt` int(11) DEFAULT NULL,
  `processed_media_id_lv` int(11) DEFAULT NULL,
  `processed_media_id_nl` int(11) DEFAULT NULL,
  `processed_media_id_no` int(11) DEFAULT NULL,
  `processed_media_id_pl` int(11) DEFAULT NULL,
  `processed_media_id_pt_br` int(11) DEFAULT NULL,
  `processed_media_id_pt_pt` int(11) DEFAULT NULL,
  `processed_media_id_ro` int(11) DEFAULT NULL,
  `processed_media_id_ru` int(11) DEFAULT NULL,
  `processed_media_id_sk` int(11) DEFAULT NULL,
  `processed_media_id_sl` int(11) DEFAULT NULL,
  `processed_media_id_sr` int(11) DEFAULT NULL,
  `processed_media_id_th` int(11) DEFAULT NULL,
  `processed_media_id_tr` int(11) DEFAULT NULL,
  `processed_media_id_uk` int(11) DEFAULT NULL,
  `processed_media_id_vi` int(11) DEFAULT NULL,
  `processed_media_id_zh_cn` int(11) DEFAULT NULL,
  `processed_media_id_zh_tw` int(11) DEFAULT NULL,
  `spreadsheet_file_qa_state_id` bigint(20) DEFAULT NULL,
  `processed_media_id_fa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_spreadsheet_file_data_source1_idx` (`data_source_id`),
  KEY `fk_spreadsheet_file_p3_media1_idx` (`original_media_id`),
  KEY `fk_spreadsheet_file_p3_media2_idx` (`processed_media_id_en`),
  KEY `fk_spreadsheet_file_spreadsheet_file1_idx` (`cloned_from_id`),
  KEY `fk_spreadsheet_file_node1_idx` (`node_id`),
  KEY `fk_spreadsheet_file_p3_media2_de` (`processed_media_id_de`),
  KEY `fk_spreadsheet_file_p3_media2_es` (`processed_media_id_es`),
  KEY `fk_spreadsheet_file_p3_media2_hi` (`processed_media_id_hi`),
  KEY `fk_spreadsheet_file_p3_media2_pt` (`processed_media_id_pt`),
  KEY `fk_spreadsheet_file_p3_media2_sv` (`processed_media_id_sv`),
  KEY `fk_spreadsheet_file_users1_idx` (`owner_id`),
  KEY `fk_spreadsheet_file_p3_media2_zh` (`processed_media_id_zh`),
  KEY `fk_spreadsheet_file_p3_media2_ar` (`processed_media_id_ar`),
  KEY `fk_spreadsheet_file_p3_media2_bg` (`processed_media_id_bg`),
  KEY `fk_spreadsheet_file_p3_media2_ca` (`processed_media_id_ca`),
  KEY `fk_spreadsheet_file_p3_media2_cs` (`processed_media_id_cs`),
  KEY `fk_spreadsheet_file_p3_media2_da` (`processed_media_id_da`),
  KEY `fk_spreadsheet_file_p3_media2_en_gb` (`processed_media_id_en_gb`),
  KEY `fk_spreadsheet_file_p3_media2_en_us` (`processed_media_id_en_us`),
  KEY `fk_spreadsheet_file_p3_media2_el` (`processed_media_id_el`),
  KEY `fk_spreadsheet_file_p3_media2_fi` (`processed_media_id_fi`),
  KEY `fk_spreadsheet_file_p3_media2_fil` (`processed_media_id_fil`),
  KEY `fk_spreadsheet_file_p3_media2_fr` (`processed_media_id_fr`),
  KEY `fk_spreadsheet_file_p3_media2_hr` (`processed_media_id_hr`),
  KEY `fk_spreadsheet_file_p3_media2_hu` (`processed_media_id_hu`),
  KEY `fk_spreadsheet_file_p3_media2_id` (`processed_media_id_id`),
  KEY `fk_spreadsheet_file_p3_media2_iw` (`processed_media_id_iw`),
  KEY `fk_spreadsheet_file_p3_media2_it` (`processed_media_id_it`),
  KEY `fk_spreadsheet_file_p3_media2_ja` (`processed_media_id_ja`),
  KEY `fk_spreadsheet_file_p3_media2_ko` (`processed_media_id_ko`),
  KEY `fk_spreadsheet_file_p3_media2_lt` (`processed_media_id_lt`),
  KEY `fk_spreadsheet_file_p3_media2_lv` (`processed_media_id_lv`),
  KEY `fk_spreadsheet_file_p3_media2_nl` (`processed_media_id_nl`),
  KEY `fk_spreadsheet_file_p3_media2_no` (`processed_media_id_no`),
  KEY `fk_spreadsheet_file_p3_media2_pl` (`processed_media_id_pl`),
  KEY `fk_spreadsheet_file_p3_media2_pt_br` (`processed_media_id_pt_br`),
  KEY `fk_spreadsheet_file_p3_media2_pt_pt` (`processed_media_id_pt_pt`),
  KEY `fk_spreadsheet_file_p3_media2_ro` (`processed_media_id_ro`),
  KEY `fk_spreadsheet_file_p3_media2_ru` (`processed_media_id_ru`),
  KEY `fk_spreadsheet_file_p3_media2_sk` (`processed_media_id_sk`),
  KEY `fk_spreadsheet_file_p3_media2_sl` (`processed_media_id_sl`),
  KEY `fk_spreadsheet_file_p3_media2_sr` (`processed_media_id_sr`),
  KEY `fk_spreadsheet_file_p3_media2_th` (`processed_media_id_th`),
  KEY `fk_spreadsheet_file_p3_media2_tr` (`processed_media_id_tr`),
  KEY `fk_spreadsheet_file_p3_media2_uk` (`processed_media_id_uk`),
  KEY `fk_spreadsheet_file_p3_media2_vi` (`processed_media_id_vi`),
  KEY `fk_spreadsheet_file_p3_media2_zh_cn` (`processed_media_id_zh_cn`),
  KEY `fk_spreadsheet_file_p3_media2_zh_tw` (`processed_media_id_zh_tw`),
  KEY `spreadsheet_file_qa_state_id_fk` (`spreadsheet_file_qa_state_id`),
  KEY `fk_spreadsheet_file_p3_media2_fa` (`processed_media_id_fa`),
  CONSTRAINT `fk_spreadsheet_file_data_source1` FOREIGN KEY (`data_source_id`) REFERENCES `data_source` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_spreadsheet_file_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_spreadsheet_file_p3_media1` FOREIGN KEY (`original_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_spreadsheet_file_p3_media2` FOREIGN KEY (`processed_media_id_en`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_spreadsheet_file_p3_media2_ar` FOREIGN KEY (`processed_media_id_ar`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_bg` FOREIGN KEY (`processed_media_id_bg`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_ca` FOREIGN KEY (`processed_media_id_ca`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_cs` FOREIGN KEY (`processed_media_id_cs`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_da` FOREIGN KEY (`processed_media_id_da`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_de` FOREIGN KEY (`processed_media_id_de`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_el` FOREIGN KEY (`processed_media_id_el`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_en_gb` FOREIGN KEY (`processed_media_id_en_gb`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_en_us` FOREIGN KEY (`processed_media_id_en_us`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_es` FOREIGN KEY (`processed_media_id_es`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_fa` FOREIGN KEY (`processed_media_id_fa`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_fi` FOREIGN KEY (`processed_media_id_fi`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_fil` FOREIGN KEY (`processed_media_id_fil`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_fr` FOREIGN KEY (`processed_media_id_fr`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_hi` FOREIGN KEY (`processed_media_id_hi`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_hr` FOREIGN KEY (`processed_media_id_hr`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_hu` FOREIGN KEY (`processed_media_id_hu`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_id` FOREIGN KEY (`processed_media_id_id`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_it` FOREIGN KEY (`processed_media_id_it`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_iw` FOREIGN KEY (`processed_media_id_iw`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_ja` FOREIGN KEY (`processed_media_id_ja`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_ko` FOREIGN KEY (`processed_media_id_ko`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_lt` FOREIGN KEY (`processed_media_id_lt`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_lv` FOREIGN KEY (`processed_media_id_lv`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_nl` FOREIGN KEY (`processed_media_id_nl`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_no` FOREIGN KEY (`processed_media_id_no`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_pl` FOREIGN KEY (`processed_media_id_pl`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_pt` FOREIGN KEY (`processed_media_id_pt`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_pt_br` FOREIGN KEY (`processed_media_id_pt_br`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_pt_pt` FOREIGN KEY (`processed_media_id_pt_pt`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_ro` FOREIGN KEY (`processed_media_id_ro`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_ru` FOREIGN KEY (`processed_media_id_ru`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_sk` FOREIGN KEY (`processed_media_id_sk`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_sl` FOREIGN KEY (`processed_media_id_sl`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_sr` FOREIGN KEY (`processed_media_id_sr`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_sv` FOREIGN KEY (`processed_media_id_sv`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_th` FOREIGN KEY (`processed_media_id_th`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_tr` FOREIGN KEY (`processed_media_id_tr`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_uk` FOREIGN KEY (`processed_media_id_uk`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_vi` FOREIGN KEY (`processed_media_id_vi`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_zh` FOREIGN KEY (`processed_media_id_zh`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_zh_cn` FOREIGN KEY (`processed_media_id_zh_cn`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_zh_tw` FOREIGN KEY (`processed_media_id_zh_tw`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_spreadsheet_file1` FOREIGN KEY (`cloned_from_id`) REFERENCES `spreadsheet_file` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_spreadsheet_file_users1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `spreadsheet_file_qa_state_id_fk` FOREIGN KEY (`spreadsheet_file_qa_state_id`) REFERENCES `spreadsheet_file_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `spreadsheet_file_qa_state`
--

DROP TABLE IF EXISTS `spreadsheet_file_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spreadsheet_file_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_iw_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `slug_en_approved` tinyint(1) DEFAULT NULL,
  `title_en_approved` tinyint(1) DEFAULT NULL,
  `original_media_id_approved` tinyint(1) DEFAULT NULL,
  `processed_media_id_en_approved` tinyint(1) DEFAULT NULL,
  `title_approved` tinyint(1) DEFAULT NULL,
  `slug_en_proofed` tinyint(1) DEFAULT NULL,
  `title_en_proofed` tinyint(1) DEFAULT NULL,
  `original_media_id_proofed` tinyint(1) DEFAULT NULL,
  `processed_media_id_en_proofed` tinyint(1) DEFAULT NULL,
  `title_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_audit_trail`
--

DROP TABLE IF EXISTS `tbl_audit_trail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_audit_trail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `old_value` text COLLATE utf8_bin,
  `new_value` text COLLATE utf8_bin,
  `action` varchar(255) COLLATE utf8_bin NOT NULL,
  `model` varchar(255) COLLATE utf8_bin NOT NULL,
  `field` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `stamp` datetime NOT NULL,
  `user_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `model_id` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_audit_trail_user_id` (`user_id`),
  KEY `idx_audit_trail_model_id` (`model_id`),
  KEY `idx_audit_trail_model` (`model`),
  KEY `idx_audit_trail_field` (`field`),
  KEY `idx_audit_trail_action` (`action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `text_doc`
--

DROP TABLE IF EXISTS `text_doc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `text_doc` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_about` text COLLATE utf8_bin,
  `original_media_id` int(11) DEFAULT NULL,
  `generate_processed_media` tinyint(1) DEFAULT NULL,
  `processed_media_id_en` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `processed_media_id_es` int(11) DEFAULT NULL,
  `processed_media_id_hi` int(11) DEFAULT NULL,
  `processed_media_id_pt` int(11) DEFAULT NULL,
  `processed_media_id_sv` int(11) DEFAULT NULL,
  `processed_media_id_de` int(11) DEFAULT NULL,
  `slug_es` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_de` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `text_doc_qa_state_id` bigint(20) DEFAULT NULL,
  `slug_zh` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_bg` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ca` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_cs` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_da` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_gb` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_us` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_el` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fil` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hu` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_he` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_it` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ja` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ko` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_nl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_br` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ro` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_th` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_tr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_uk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_vi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_cn` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_tw` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `processed_media_id_zh` int(11) DEFAULT NULL,
  `processed_media_id_ar` int(11) DEFAULT NULL,
  `processed_media_id_bg` int(11) DEFAULT NULL,
  `processed_media_id_ca` int(11) DEFAULT NULL,
  `processed_media_id_cs` int(11) DEFAULT NULL,
  `processed_media_id_da` int(11) DEFAULT NULL,
  `processed_media_id_en_gb` int(11) DEFAULT NULL,
  `processed_media_id_en_us` int(11) DEFAULT NULL,
  `processed_media_id_el` int(11) DEFAULT NULL,
  `processed_media_id_fi` int(11) DEFAULT NULL,
  `processed_media_id_fil` int(11) DEFAULT NULL,
  `processed_media_id_fr` int(11) DEFAULT NULL,
  `processed_media_id_hr` int(11) DEFAULT NULL,
  `processed_media_id_hu` int(11) DEFAULT NULL,
  `processed_media_id_id` int(11) DEFAULT NULL,
  `processed_media_id_iw` int(11) DEFAULT NULL,
  `processed_media_id_it` int(11) DEFAULT NULL,
  `processed_media_id_ja` int(11) DEFAULT NULL,
  `processed_media_id_ko` int(11) DEFAULT NULL,
  `processed_media_id_lt` int(11) DEFAULT NULL,
  `processed_media_id_lv` int(11) DEFAULT NULL,
  `processed_media_id_nl` int(11) DEFAULT NULL,
  `processed_media_id_no` int(11) DEFAULT NULL,
  `processed_media_id_pl` int(11) DEFAULT NULL,
  `processed_media_id_pt_br` int(11) DEFAULT NULL,
  `processed_media_id_pt_pt` int(11) DEFAULT NULL,
  `processed_media_id_ro` int(11) DEFAULT NULL,
  `processed_media_id_ru` int(11) DEFAULT NULL,
  `processed_media_id_sk` int(11) DEFAULT NULL,
  `processed_media_id_sl` int(11) DEFAULT NULL,
  `processed_media_id_sr` int(11) DEFAULT NULL,
  `processed_media_id_th` int(11) DEFAULT NULL,
  `processed_media_id_tr` int(11) DEFAULT NULL,
  `processed_media_id_uk` int(11) DEFAULT NULL,
  `processed_media_id_vi` int(11) DEFAULT NULL,
  `processed_media_id_zh_cn` int(11) DEFAULT NULL,
  `processed_media_id_zh_tw` int(11) DEFAULT NULL,
  `slug_fa` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `processed_media_id_fa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_word_file_p3_media1_idx` (`original_media_id`),
  KEY `fk_word_file_p3_media2_idx` (`processed_media_id_en`),
  KEY `fk_word_file_word_file1_idx` (`cloned_from_id`),
  KEY `fk_word_file_node1_idx` (`node_id`),
  KEY `text_doc_qa_state_id_fk` (`text_doc_qa_state_id`),
  KEY `fk_word_file_p3_media2_de` (`processed_media_id_de`),
  KEY `fk_word_file_p3_media2_es` (`processed_media_id_es`),
  KEY `fk_word_file_p3_media2_hi` (`processed_media_id_hi`),
  KEY `fk_word_file_p3_media2_pt` (`processed_media_id_pt`),
  KEY `fk_word_file_p3_media2_sv` (`processed_media_id_sv`),
  KEY `fk_text_doc_users1_idx` (`owner_id`),
  KEY `fk_word_file_p3_media2_zh` (`processed_media_id_zh`),
  KEY `fk_word_file_p3_media2_ar` (`processed_media_id_ar`),
  KEY `fk_word_file_p3_media2_bg` (`processed_media_id_bg`),
  KEY `fk_word_file_p3_media2_ca` (`processed_media_id_ca`),
  KEY `fk_word_file_p3_media2_cs` (`processed_media_id_cs`),
  KEY `fk_word_file_p3_media2_da` (`processed_media_id_da`),
  KEY `fk_word_file_p3_media2_en_gb` (`processed_media_id_en_gb`),
  KEY `fk_word_file_p3_media2_en_us` (`processed_media_id_en_us`),
  KEY `fk_word_file_p3_media2_el` (`processed_media_id_el`),
  KEY `fk_word_file_p3_media2_fi` (`processed_media_id_fi`),
  KEY `fk_word_file_p3_media2_fil` (`processed_media_id_fil`),
  KEY `fk_word_file_p3_media2_fr` (`processed_media_id_fr`),
  KEY `fk_word_file_p3_media2_hr` (`processed_media_id_hr`),
  KEY `fk_word_file_p3_media2_hu` (`processed_media_id_hu`),
  KEY `fk_word_file_p3_media2_id` (`processed_media_id_id`),
  KEY `fk_word_file_p3_media2_iw` (`processed_media_id_iw`),
  KEY `fk_word_file_p3_media2_it` (`processed_media_id_it`),
  KEY `fk_word_file_p3_media2_ja` (`processed_media_id_ja`),
  KEY `fk_word_file_p3_media2_ko` (`processed_media_id_ko`),
  KEY `fk_word_file_p3_media2_lt` (`processed_media_id_lt`),
  KEY `fk_word_file_p3_media2_lv` (`processed_media_id_lv`),
  KEY `fk_word_file_p3_media2_nl` (`processed_media_id_nl`),
  KEY `fk_word_file_p3_media2_no` (`processed_media_id_no`),
  KEY `fk_word_file_p3_media2_pl` (`processed_media_id_pl`),
  KEY `fk_word_file_p3_media2_pt_br` (`processed_media_id_pt_br`),
  KEY `fk_word_file_p3_media2_pt_pt` (`processed_media_id_pt_pt`),
  KEY `fk_word_file_p3_media2_ro` (`processed_media_id_ro`),
  KEY `fk_word_file_p3_media2_ru` (`processed_media_id_ru`),
  KEY `fk_word_file_p3_media2_sk` (`processed_media_id_sk`),
  KEY `fk_word_file_p3_media2_sl` (`processed_media_id_sl`),
  KEY `fk_word_file_p3_media2_sr` (`processed_media_id_sr`),
  KEY `fk_word_file_p3_media2_th` (`processed_media_id_th`),
  KEY `fk_word_file_p3_media2_tr` (`processed_media_id_tr`),
  KEY `fk_word_file_p3_media2_uk` (`processed_media_id_uk`),
  KEY `fk_word_file_p3_media2_vi` (`processed_media_id_vi`),
  KEY `fk_word_file_p3_media2_zh_cn` (`processed_media_id_zh_cn`),
  KEY `fk_word_file_p3_media2_zh_tw` (`processed_media_id_zh_tw`),
  KEY `fk_word_file_p3_media2_fa` (`processed_media_id_fa`),
  CONSTRAINT `fk_text_doc_users1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_word_file_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_word_file_p3_media1` FOREIGN KEY (`original_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_word_file_p3_media2` FOREIGN KEY (`processed_media_id_en`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_word_file_p3_media2_ar` FOREIGN KEY (`processed_media_id_ar`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_bg` FOREIGN KEY (`processed_media_id_bg`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_ca` FOREIGN KEY (`processed_media_id_ca`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_cs` FOREIGN KEY (`processed_media_id_cs`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_da` FOREIGN KEY (`processed_media_id_da`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_de` FOREIGN KEY (`processed_media_id_de`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_el` FOREIGN KEY (`processed_media_id_el`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_en_gb` FOREIGN KEY (`processed_media_id_en_gb`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_en_us` FOREIGN KEY (`processed_media_id_en_us`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_es` FOREIGN KEY (`processed_media_id_es`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_fa` FOREIGN KEY (`processed_media_id_fa`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_fi` FOREIGN KEY (`processed_media_id_fi`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_fil` FOREIGN KEY (`processed_media_id_fil`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_fr` FOREIGN KEY (`processed_media_id_fr`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_hi` FOREIGN KEY (`processed_media_id_hi`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_hr` FOREIGN KEY (`processed_media_id_hr`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_hu` FOREIGN KEY (`processed_media_id_hu`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_id` FOREIGN KEY (`processed_media_id_id`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_it` FOREIGN KEY (`processed_media_id_it`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_iw` FOREIGN KEY (`processed_media_id_iw`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_ja` FOREIGN KEY (`processed_media_id_ja`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_ko` FOREIGN KEY (`processed_media_id_ko`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_lt` FOREIGN KEY (`processed_media_id_lt`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_lv` FOREIGN KEY (`processed_media_id_lv`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_nl` FOREIGN KEY (`processed_media_id_nl`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_no` FOREIGN KEY (`processed_media_id_no`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_pl` FOREIGN KEY (`processed_media_id_pl`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_pt` FOREIGN KEY (`processed_media_id_pt`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_pt_br` FOREIGN KEY (`processed_media_id_pt_br`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_pt_pt` FOREIGN KEY (`processed_media_id_pt_pt`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_ro` FOREIGN KEY (`processed_media_id_ro`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_ru` FOREIGN KEY (`processed_media_id_ru`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_sk` FOREIGN KEY (`processed_media_id_sk`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_sl` FOREIGN KEY (`processed_media_id_sl`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_sr` FOREIGN KEY (`processed_media_id_sr`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_sv` FOREIGN KEY (`processed_media_id_sv`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_th` FOREIGN KEY (`processed_media_id_th`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_tr` FOREIGN KEY (`processed_media_id_tr`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_uk` FOREIGN KEY (`processed_media_id_uk`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_vi` FOREIGN KEY (`processed_media_id_vi`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_zh` FOREIGN KEY (`processed_media_id_zh`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_zh_cn` FOREIGN KEY (`processed_media_id_zh_cn`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_zh_tw` FOREIGN KEY (`processed_media_id_zh_tw`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_word_file1` FOREIGN KEY (`cloned_from_id`) REFERENCES `text_doc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `text_doc_qa_state_id_fk` FOREIGN KEY (`text_doc_qa_state_id`) REFERENCES `text_doc_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `text_doc_qa_state`
--

DROP TABLE IF EXISTS `text_doc_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `text_doc_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_he_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `slug_en_approved` tinyint(1) DEFAULT NULL,
  `title_en_approved` tinyint(1) DEFAULT NULL,
  `original_media_id_approved` tinyint(1) DEFAULT NULL,
  `processed_media_id_en_approved` tinyint(1) DEFAULT NULL,
  `title_approved` tinyint(1) DEFAULT NULL,
  `slug_en_proofed` tinyint(1) DEFAULT NULL,
  `title_en_proofed` tinyint(1) DEFAULT NULL,
  `original_media_id_proofed` tinyint(1) DEFAULT NULL,
  `processed_media_id_en_proofed` tinyint(1) DEFAULT NULL,
  `title_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool`
--

DROP TABLE IF EXISTS `tool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tool` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `ref` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_about` text COLLATE utf8_bin,
  `embed_template` text COLLATE utf8_bin,
  `i18n_catalog_id` bigint(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `slug_es` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_de` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `tool_qa_state_id` bigint(20) DEFAULT NULL,
  `slug_zh` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_bg` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ca` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_cs` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_da` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_gb` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_us` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_el` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fil` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hu` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_he` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_it` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ja` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ko` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_nl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_br` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ro` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_th` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_tr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_uk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_vi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_cn` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_tw` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fa` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_en_UNIQUE` (`slug_en`),
  UNIQUE KEY `slug_ar_UNIQUE` (`slug_ar`),
  UNIQUE KEY `slug_bg_UNIQUE` (`slug_bg`),
  UNIQUE KEY `slug_ca_UNIQUE` (`slug_ca`),
  UNIQUE KEY `slug_cs_UNIQUE` (`slug_cs`),
  UNIQUE KEY `slug_da_UNIQUE` (`slug_da`),
  UNIQUE KEY `slug_de_UNIQUE` (`slug_de`),
  UNIQUE KEY `slug_en_gb_UNIQUE` (`slug_en_gb`),
  UNIQUE KEY `slug_en_us_UNIQUE` (`slug_en_us`),
  UNIQUE KEY `slug_el_UNIQUE` (`slug_el`),
  UNIQUE KEY `slug_es_UNIQUE` (`slug_es`),
  UNIQUE KEY `slug_fa_UNIQUE` (`slug_fa`),
  UNIQUE KEY `slug_fi_UNIQUE` (`slug_fi`),
  UNIQUE KEY `slug_fil_UNIQUE` (`slug_fil`),
  UNIQUE KEY `slug_fr_UNIQUE` (`slug_fr`),
  UNIQUE KEY `slug_hi_UNIQUE` (`slug_hi`),
  UNIQUE KEY `slug_hr_UNIQUE` (`slug_hr`),
  UNIQUE KEY `slug_hu_UNIQUE` (`slug_hu`),
  UNIQUE KEY `slug_id_UNIQUE` (`slug_id`),
  UNIQUE KEY `slug_it_UNIQUE` (`slug_it`),
  UNIQUE KEY `slug_ja_UNIQUE` (`slug_ja`),
  UNIQUE KEY `slug_ko_UNIQUE` (`slug_ko`),
  UNIQUE KEY `slug_lt_UNIQUE` (`slug_lt`),
  UNIQUE KEY `slug_lv_UNIQUE` (`slug_lv`),
  UNIQUE KEY `slug_nl_UNIQUE` (`slug_nl`),
  UNIQUE KEY `slug_no_UNIQUE` (`slug_no`),
  UNIQUE KEY `slug_pl_UNIQUE` (`slug_pl`),
  UNIQUE KEY `slug_pt_UNIQUE` (`slug_pt`),
  UNIQUE KEY `slug_pt_br_UNIQUE` (`slug_pt_br`),
  UNIQUE KEY `slug_pt_pt_UNIQUE` (`slug_pt_pt`),
  UNIQUE KEY `slug_ro_UNIQUE` (`slug_ro`),
  UNIQUE KEY `slug_ru_UNIQUE` (`slug_ru`),
  UNIQUE KEY `slug_sk_UNIQUE` (`slug_sk`),
  UNIQUE KEY `slug_sl_UNIQUE` (`slug_sl`),
  UNIQUE KEY `slug_sr_UNIQUE` (`slug_sr`),
  UNIQUE KEY `slug_sv_UNIQUE` (`slug_sv`),
  UNIQUE KEY `slug_th_UNIQUE` (`slug_th`),
  UNIQUE KEY `slug_tr_UNIQUE` (`slug_tr`),
  UNIQUE KEY `slug_uk_UNIQUE` (`slug_uk`),
  UNIQUE KEY `slug_vi_UNIQUE` (`slug_vi`),
  UNIQUE KEY `slug_zh_UNIQUE` (`slug_zh`),
  UNIQUE KEY `slug_zh_cn_UNIQUE` (`slug_zh_cn`),
  UNIQUE KEY `slug_zh_tw_UNIQUE` (`slug_zh_tw`),
  UNIQUE KEY `slug_he_UNIQUE` (`slug_he`),
  KEY `fk_tool_po_file1_idx` (`i18n_catalog_id`),
  KEY `fk_tool_tool1_idx` (`cloned_from_id`),
  KEY `fk_tool_node1_idx` (`node_id`),
  KEY `tool_qa_state_id_fk` (`tool_qa_state_id`),
  KEY `fk_tool_users1_idx` (`owner_id`),
  CONSTRAINT `fk_tool_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tool_po_file1` FOREIGN KEY (`i18n_catalog_id`) REFERENCES `i18n_catalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tool_tool1` FOREIGN KEY (`cloned_from_id`) REFERENCES `tool` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tool_users1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tool_qa_state_id_fk` FOREIGN KEY (`tool_qa_state_id`) REFERENCES `tool_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tool_qa_state`
--

DROP TABLE IF EXISTS `tool_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tool_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_he_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `title_en_approved` tinyint(1) DEFAULT NULL,
  `slug_en_approved` tinyint(1) DEFAULT NULL,
  `title_approved` tinyint(1) DEFAULT NULL,
  `title_en_proofed` tinyint(1) DEFAULT NULL,
  `slug_en_proofed` tinyint(1) DEFAULT NULL,
  `title_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  `ref_approved` tinyint(1) DEFAULT NULL,
  `ref_proofed` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vector_graphic`
--

DROP TABLE IF EXISTS `vector_graphic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vector_graphic` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_about` text COLLATE utf8_bin,
  `original_media_id` int(11) DEFAULT NULL,
  `processed_media_id_en` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `slug_es` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_de` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `processed_media_id_es` int(11) DEFAULT NULL,
  `processed_media_id_hi` int(11) DEFAULT NULL,
  `processed_media_id_pt` int(11) DEFAULT NULL,
  `processed_media_id_sv` int(11) DEFAULT NULL,
  `processed_media_id_de` int(11) DEFAULT NULL,
  `vector_graphic_qa_state_id` bigint(20) DEFAULT NULL,
  `slug_zh` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_bg` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ca` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_cs` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_da` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_gb` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_us` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_el` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fil` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hu` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_he` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_it` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ja` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ko` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_nl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_br` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ro` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_th` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_tr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_uk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_vi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_cn` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_tw` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `processed_media_id_zh` int(11) DEFAULT NULL,
  `processed_media_id_ar` int(11) DEFAULT NULL,
  `processed_media_id_bg` int(11) DEFAULT NULL,
  `processed_media_id_ca` int(11) DEFAULT NULL,
  `processed_media_id_cs` int(11) DEFAULT NULL,
  `processed_media_id_da` int(11) DEFAULT NULL,
  `processed_media_id_en_gb` int(11) DEFAULT NULL,
  `processed_media_id_en_us` int(11) DEFAULT NULL,
  `processed_media_id_el` int(11) DEFAULT NULL,
  `processed_media_id_fi` int(11) DEFAULT NULL,
  `processed_media_id_fil` int(11) DEFAULT NULL,
  `processed_media_id_fr` int(11) DEFAULT NULL,
  `processed_media_id_hr` int(11) DEFAULT NULL,
  `processed_media_id_hu` int(11) DEFAULT NULL,
  `processed_media_id_id` int(11) DEFAULT NULL,
  `processed_media_id_iw` int(11) DEFAULT NULL,
  `processed_media_id_it` int(11) DEFAULT NULL,
  `processed_media_id_ja` int(11) DEFAULT NULL,
  `processed_media_id_ko` int(11) DEFAULT NULL,
  `processed_media_id_lt` int(11) DEFAULT NULL,
  `processed_media_id_lv` int(11) DEFAULT NULL,
  `processed_media_id_nl` int(11) DEFAULT NULL,
  `processed_media_id_no` int(11) DEFAULT NULL,
  `processed_media_id_pl` int(11) DEFAULT NULL,
  `processed_media_id_pt_br` int(11) DEFAULT NULL,
  `processed_media_id_pt_pt` int(11) DEFAULT NULL,
  `processed_media_id_ro` int(11) DEFAULT NULL,
  `processed_media_id_ru` int(11) DEFAULT NULL,
  `processed_media_id_sk` int(11) DEFAULT NULL,
  `processed_media_id_sl` int(11) DEFAULT NULL,
  `processed_media_id_sr` int(11) DEFAULT NULL,
  `processed_media_id_th` int(11) DEFAULT NULL,
  `processed_media_id_tr` int(11) DEFAULT NULL,
  `processed_media_id_uk` int(11) DEFAULT NULL,
  `processed_media_id_vi` int(11) DEFAULT NULL,
  `processed_media_id_zh_cn` int(11) DEFAULT NULL,
  `processed_media_id_zh_tw` int(11) DEFAULT NULL,
  `slug_fa` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `processed_media_id_fa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vector_graphic_vector_graphic1_idx` (`cloned_from_id`),
  KEY `fk_vector_graphic_p3_media1_idx` (`original_media_id`),
  KEY `fk_vector_graphic_node1_idx` (`node_id`),
  KEY `fk_vector_graphic_p3_media2_idx` (`processed_media_id_en`),
  KEY `vector_graphic_qa_state_id_fk` (`vector_graphic_qa_state_id`),
  KEY `fk_vector_graphic_p3_media2_de` (`processed_media_id_de`),
  KEY `fk_vector_graphic_p3_media2_es` (`processed_media_id_es`),
  KEY `fk_vector_graphic_p3_media2_hi` (`processed_media_id_hi`),
  KEY `fk_vector_graphic_p3_media2_pt` (`processed_media_id_pt`),
  KEY `fk_vector_graphic_p3_media2_sv` (`processed_media_id_sv`),
  KEY `fk_vector_graphic_users1_idx` (`owner_id`),
  KEY `fk_vector_graphic_p3_media2_zh` (`processed_media_id_zh`),
  KEY `fk_vector_graphic_p3_media2_ar` (`processed_media_id_ar`),
  KEY `fk_vector_graphic_p3_media2_bg` (`processed_media_id_bg`),
  KEY `fk_vector_graphic_p3_media2_ca` (`processed_media_id_ca`),
  KEY `fk_vector_graphic_p3_media2_cs` (`processed_media_id_cs`),
  KEY `fk_vector_graphic_p3_media2_da` (`processed_media_id_da`),
  KEY `fk_vector_graphic_p3_media2_en_gb` (`processed_media_id_en_gb`),
  KEY `fk_vector_graphic_p3_media2_en_us` (`processed_media_id_en_us`),
  KEY `fk_vector_graphic_p3_media2_el` (`processed_media_id_el`),
  KEY `fk_vector_graphic_p3_media2_fi` (`processed_media_id_fi`),
  KEY `fk_vector_graphic_p3_media2_fil` (`processed_media_id_fil`),
  KEY `fk_vector_graphic_p3_media2_fr` (`processed_media_id_fr`),
  KEY `fk_vector_graphic_p3_media2_hr` (`processed_media_id_hr`),
  KEY `fk_vector_graphic_p3_media2_hu` (`processed_media_id_hu`),
  KEY `fk_vector_graphic_p3_media2_id` (`processed_media_id_id`),
  KEY `fk_vector_graphic_p3_media2_iw` (`processed_media_id_iw`),
  KEY `fk_vector_graphic_p3_media2_it` (`processed_media_id_it`),
  KEY `fk_vector_graphic_p3_media2_ja` (`processed_media_id_ja`),
  KEY `fk_vector_graphic_p3_media2_ko` (`processed_media_id_ko`),
  KEY `fk_vector_graphic_p3_media2_lt` (`processed_media_id_lt`),
  KEY `fk_vector_graphic_p3_media2_lv` (`processed_media_id_lv`),
  KEY `fk_vector_graphic_p3_media2_nl` (`processed_media_id_nl`),
  KEY `fk_vector_graphic_p3_media2_no` (`processed_media_id_no`),
  KEY `fk_vector_graphic_p3_media2_pl` (`processed_media_id_pl`),
  KEY `fk_vector_graphic_p3_media2_pt_br` (`processed_media_id_pt_br`),
  KEY `fk_vector_graphic_p3_media2_pt_pt` (`processed_media_id_pt_pt`),
  KEY `fk_vector_graphic_p3_media2_ro` (`processed_media_id_ro`),
  KEY `fk_vector_graphic_p3_media2_ru` (`processed_media_id_ru`),
  KEY `fk_vector_graphic_p3_media2_sk` (`processed_media_id_sk`),
  KEY `fk_vector_graphic_p3_media2_sl` (`processed_media_id_sl`),
  KEY `fk_vector_graphic_p3_media2_sr` (`processed_media_id_sr`),
  KEY `fk_vector_graphic_p3_media2_th` (`processed_media_id_th`),
  KEY `fk_vector_graphic_p3_media2_tr` (`processed_media_id_tr`),
  KEY `fk_vector_graphic_p3_media2_uk` (`processed_media_id_uk`),
  KEY `fk_vector_graphic_p3_media2_vi` (`processed_media_id_vi`),
  KEY `fk_vector_graphic_p3_media2_zh_cn` (`processed_media_id_zh_cn`),
  KEY `fk_vector_graphic_p3_media2_zh_tw` (`processed_media_id_zh_tw`),
  KEY `fk_vector_graphic_p3_media2_fa` (`processed_media_id_fa`),
  CONSTRAINT `fk_vector_graphic_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vector_graphic_p3_media1` FOREIGN KEY (`original_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vector_graphic_p3_media2` FOREIGN KEY (`processed_media_id_en`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vector_graphic_p3_media2_ar` FOREIGN KEY (`processed_media_id_ar`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_bg` FOREIGN KEY (`processed_media_id_bg`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_ca` FOREIGN KEY (`processed_media_id_ca`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_cs` FOREIGN KEY (`processed_media_id_cs`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_da` FOREIGN KEY (`processed_media_id_da`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_de` FOREIGN KEY (`processed_media_id_de`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_el` FOREIGN KEY (`processed_media_id_el`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_en_gb` FOREIGN KEY (`processed_media_id_en_gb`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_en_us` FOREIGN KEY (`processed_media_id_en_us`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_es` FOREIGN KEY (`processed_media_id_es`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_fa` FOREIGN KEY (`processed_media_id_fa`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_fi` FOREIGN KEY (`processed_media_id_fi`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_fil` FOREIGN KEY (`processed_media_id_fil`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_fr` FOREIGN KEY (`processed_media_id_fr`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_hi` FOREIGN KEY (`processed_media_id_hi`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_hr` FOREIGN KEY (`processed_media_id_hr`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_hu` FOREIGN KEY (`processed_media_id_hu`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_id` FOREIGN KEY (`processed_media_id_id`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_it` FOREIGN KEY (`processed_media_id_it`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_iw` FOREIGN KEY (`processed_media_id_iw`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_ja` FOREIGN KEY (`processed_media_id_ja`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_ko` FOREIGN KEY (`processed_media_id_ko`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_lt` FOREIGN KEY (`processed_media_id_lt`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_lv` FOREIGN KEY (`processed_media_id_lv`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_nl` FOREIGN KEY (`processed_media_id_nl`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_no` FOREIGN KEY (`processed_media_id_no`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_pl` FOREIGN KEY (`processed_media_id_pl`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_pt` FOREIGN KEY (`processed_media_id_pt`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_pt_br` FOREIGN KEY (`processed_media_id_pt_br`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_pt_pt` FOREIGN KEY (`processed_media_id_pt_pt`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_ro` FOREIGN KEY (`processed_media_id_ro`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_ru` FOREIGN KEY (`processed_media_id_ru`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_sk` FOREIGN KEY (`processed_media_id_sk`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_sl` FOREIGN KEY (`processed_media_id_sl`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_sr` FOREIGN KEY (`processed_media_id_sr`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_sv` FOREIGN KEY (`processed_media_id_sv`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_th` FOREIGN KEY (`processed_media_id_th`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_tr` FOREIGN KEY (`processed_media_id_tr`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_uk` FOREIGN KEY (`processed_media_id_uk`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_vi` FOREIGN KEY (`processed_media_id_vi`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_zh` FOREIGN KEY (`processed_media_id_zh`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_zh_cn` FOREIGN KEY (`processed_media_id_zh_cn`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_zh_tw` FOREIGN KEY (`processed_media_id_zh_tw`) REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_users1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vector_graphic_vector_graphic1` FOREIGN KEY (`cloned_from_id`) REFERENCES `vector_graphic` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `vector_graphic_qa_state_id_fk` FOREIGN KEY (`vector_graphic_qa_state_id`) REFERENCES `vector_graphic_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vector_graphic_qa_state`
--

DROP TABLE IF EXISTS `vector_graphic_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vector_graphic_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_he_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `slug_en_approved` tinyint(1) DEFAULT NULL,
  `title_en_approved` tinyint(1) DEFAULT NULL,
  `original_media_id_approved` tinyint(1) DEFAULT NULL,
  `processed_media_id_en_approved` tinyint(1) DEFAULT NULL,
  `title_approved` tinyint(1) DEFAULT NULL,
  `slug_en_proofed` tinyint(1) DEFAULT NULL,
  `title_en_proofed` tinyint(1) DEFAULT NULL,
  `original_media_id_proofed` tinyint(1) DEFAULT NULL,
  `processed_media_id_en_proofed` tinyint(1) DEFAULT NULL,
  `title_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `video_file`
--

DROP TABLE IF EXISTS `video_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video_file` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_caption` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_about` text COLLATE utf8_bin,
  `thumbnail_media_id` int(11) DEFAULT NULL,
  `clip_webm_media_id` int(11) DEFAULT NULL,
  `clip_mp4_media_id` int(11) DEFAULT NULL,
  `subtitles` text COLLATE utf8_bin,
  `subtitles_import_media_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `slug_es` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_de` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `video_file_qa_state_id` bigint(20) DEFAULT NULL,
  `slug_zh` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_bg` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ca` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_cs` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_da` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_gb` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_us` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_el` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fil` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hu` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_he` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_it` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ja` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ko` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_nl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_br` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ro` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_th` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_tr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_uk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_vi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_cn` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_tw` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fa` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `youtube_url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_en_UNIQUE` (`slug_en`),
  UNIQUE KEY `slug_ar_UNIQUE` (`slug_ar`),
  UNIQUE KEY `slug_bg_UNIQUE` (`slug_bg`),
  UNIQUE KEY `slug_ca_UNIQUE` (`slug_ca`),
  UNIQUE KEY `slug_cs_UNIQUE` (`slug_cs`),
  UNIQUE KEY `slug_da_UNIQUE` (`slug_da`),
  UNIQUE KEY `slug_de_UNIQUE` (`slug_de`),
  UNIQUE KEY `slug_en_gb_UNIQUE` (`slug_en_gb`),
  UNIQUE KEY `slug_en_us_UNIQUE` (`slug_en_us`),
  UNIQUE KEY `slug_el_UNIQUE` (`slug_el`),
  UNIQUE KEY `slug_es_UNIQUE` (`slug_es`),
  UNIQUE KEY `slug_fa_UNIQUE` (`slug_fa`),
  UNIQUE KEY `slug_fi_UNIQUE` (`slug_fi`),
  UNIQUE KEY `slug_fil_UNIQUE` (`slug_fil`),
  UNIQUE KEY `slug_fr_UNIQUE` (`slug_fr`),
  UNIQUE KEY `slug_hi_UNIQUE` (`slug_hi`),
  UNIQUE KEY `slug_hr_UNIQUE` (`slug_hr`),
  UNIQUE KEY `slug_hu_UNIQUE` (`slug_hu`),
  UNIQUE KEY `slug_id_UNIQUE` (`slug_id`),
  UNIQUE KEY `slug_it_UNIQUE` (`slug_it`),
  UNIQUE KEY `slug_ja_UNIQUE` (`slug_ja`),
  UNIQUE KEY `slug_ko_UNIQUE` (`slug_ko`),
  UNIQUE KEY `slug_lt_UNIQUE` (`slug_lt`),
  UNIQUE KEY `slug_lv_UNIQUE` (`slug_lv`),
  UNIQUE KEY `slug_nl_UNIQUE` (`slug_nl`),
  UNIQUE KEY `slug_no_UNIQUE` (`slug_no`),
  UNIQUE KEY `slug_pl_UNIQUE` (`slug_pl`),
  UNIQUE KEY `slug_pt_UNIQUE` (`slug_pt`),
  UNIQUE KEY `slug_pt_br_UNIQUE` (`slug_pt_br`),
  UNIQUE KEY `slug_pt_pt_UNIQUE` (`slug_pt_pt`),
  UNIQUE KEY `slug_ro_UNIQUE` (`slug_ro`),
  UNIQUE KEY `slug_ru_UNIQUE` (`slug_ru`),
  UNIQUE KEY `slug_sk_UNIQUE` (`slug_sk`),
  UNIQUE KEY `slug_sl_UNIQUE` (`slug_sl`),
  UNIQUE KEY `slug_sr_UNIQUE` (`slug_sr`),
  UNIQUE KEY `slug_sv_UNIQUE` (`slug_sv`),
  UNIQUE KEY `slug_th_UNIQUE` (`slug_th`),
  UNIQUE KEY `slug_tr_UNIQUE` (`slug_tr`),
  UNIQUE KEY `slug_uk_UNIQUE` (`slug_uk`),
  UNIQUE KEY `slug_vi_UNIQUE` (`slug_vi`),
  UNIQUE KEY `slug_zh_UNIQUE` (`slug_zh`),
  UNIQUE KEY `slug_zh_cn_UNIQUE` (`slug_zh_cn`),
  UNIQUE KEY `slug_zh_tw_UNIQUE` (`slug_zh_tw`),
  UNIQUE KEY `slug_he_UNIQUE` (`slug_he`),
  KEY `fk_video_file_p3_media3_idx` (`thumbnail_media_id`),
  KEY `fk_video_file_video_file1_idx` (`cloned_from_id`),
  KEY `fk_video_file_node1_idx` (`node_id`),
  KEY `video_file_qa_state_id_fk` (`video_file_qa_state_id`),
  KEY `fk_video_file_p3_media4_idx` (`subtitles_import_media_id`),
  KEY `fk_video_file_users1_idx` (`owner_id`),
  KEY `fk_video_file_p3_media1_idx` (`clip_webm_media_id`),
  KEY `fk_video_file_p3_media2_idx` (`clip_mp4_media_id`),
  CONSTRAINT `fk_video_file_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_video_file_p3_media1` FOREIGN KEY (`clip_webm_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_video_file_p3_media2` FOREIGN KEY (`clip_mp4_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_video_file_p3_media3` FOREIGN KEY (`thumbnail_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_video_file_p3_media4` FOREIGN KEY (`subtitles_import_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_video_file_users1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_video_file_video_file1` FOREIGN KEY (`cloned_from_id`) REFERENCES `video_file` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `video_file_qa_state_id_fk` FOREIGN KEY (`video_file_qa_state_id`) REFERENCES `video_file_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `video_file_qa_state`
--

DROP TABLE IF EXISTS `video_file_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video_file_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_he_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `title_en_approved` tinyint(1) DEFAULT NULL,
  `slug_en_approved` tinyint(1) DEFAULT NULL,
  `clip_mp4_media_id_approved` tinyint(1) DEFAULT NULL,
  `thumbnail_media_id_approved` tinyint(1) DEFAULT NULL,
  `clip_webm_media_id_approved` tinyint(1) DEFAULT NULL,
  `about_en_approved` tinyint(1) DEFAULT NULL,
  `subtitles_en_approved` tinyint(1) DEFAULT NULL,
  `title_approved` tinyint(1) DEFAULT NULL,
  `subtitles_approved` tinyint(1) DEFAULT NULL,
  `title_en_proofed` tinyint(1) DEFAULT NULL,
  `slug_en_proofed` tinyint(1) DEFAULT NULL,
  `clip_mp4_media_id_proofed` tinyint(1) DEFAULT NULL,
  `thumbnail_media_id_proofed` tinyint(1) DEFAULT NULL,
  `clip_webm_media_id_proofed` tinyint(1) DEFAULT NULL,
  `subtitles_en_proofed` tinyint(1) DEFAULT NULL,
  `about_en_proofed` tinyint(1) DEFAULT NULL,
  `title_proofed` tinyint(1) DEFAULT NULL,
  `subtitles_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  `youtube_url_approved` tinyint(1) DEFAULT NULL,
  `youtube_url_proofed` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `waffle`
--

DROP TABLE IF EXISTS `waffle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waffle` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `file_format` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_short_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `publishing_date` datetime DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `license` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `license_link` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `waffle_publisher_id` bigint(20) DEFAULT NULL,
  `json_import_media_id` int(11) DEFAULT NULL,
  `image_small_media_id` int(11) DEFAULT NULL,
  `image_large_media_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_bg` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ca` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_cs` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_da` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_de` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_gb` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_en_us` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_el` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_es` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fil` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_fr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_hu` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_he` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_it` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ja` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ko` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_lv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_nl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_br` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_pt_pt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ro` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_sv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_th` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_tr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_uk` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_vi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_cn` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug_zh_tw` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `waffle_qa_state_id` bigint(20) DEFAULT NULL,
  `slug_fa` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_waffle_waffle1_idx` (`cloned_from_id`),
  KEY `waffle_qa_state_id_fk` (`waffle_qa_state_id`),
  KEY `fk_waffle_account1_idx` (`owner_id`),
  KEY `fk_waffle_node1_idx` (`node_id`),
  KEY `fk_waffle_p3_media1_idx` (`json_import_media_id`),
  KEY `fk_waffle_p3_media2_idx` (`image_small_media_id`),
  KEY `fk_waffle_p3_media3_idx` (`image_large_media_id`),
  KEY `fk_waffle_waffle_publisher1_idx` (`waffle_publisher_id`),
  CONSTRAINT `fk_waffle_account1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_p3_media1` FOREIGN KEY (`json_import_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_p3_media2` FOREIGN KEY (`image_small_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_p3_media3` FOREIGN KEY (`image_large_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_waffle1` FOREIGN KEY (`cloned_from_id`) REFERENCES `waffle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_waffle_publisher1` FOREIGN KEY (`waffle_publisher_id`) REFERENCES `waffle_publisher` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `waffle_qa_state_id_fk` FOREIGN KEY (`waffle_qa_state_id`) REFERENCES `waffle_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `waffle_category`
--

DROP TABLE IF EXISTS `waffle_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waffle_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `ref` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_list_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_property_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_possessive` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_choice_format` text COLLATE utf8_bin,
  `_description` text COLLATE utf8_bin,
  `waffle_id` bigint(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `waffle_category_qa_state_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_waffle_category_waffle1_idx` (`waffle_id`),
  KEY `fk_waffle_category_waffle_category1_idx` (`cloned_from_id`),
  KEY `waffle_category_qa_state_id_fk` (`waffle_category_qa_state_id`),
  KEY `fk_waffle_category_account1_idx` (`owner_id`),
  KEY `fk_waffle_category_node1_idx` (`node_id`),
  CONSTRAINT `fk_waffle_category_account1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_category_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_category_waffle1` FOREIGN KEY (`waffle_id`) REFERENCES `waffle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_category_waffle_category1` FOREIGN KEY (`cloned_from_id`) REFERENCES `waffle_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `waffle_category_qa_state_id_fk` FOREIGN KEY (`waffle_category_qa_state_id`) REFERENCES `waffle_category_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `waffle_category_qa_state`
--

DROP TABLE IF EXISTS `waffle_category_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waffle_category_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_iw_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `list_name_en_approved` tinyint(1) DEFAULT NULL,
  `property_name_en_approved` tinyint(1) DEFAULT NULL,
  `possessive_en_approved` tinyint(1) DEFAULT NULL,
  `choice_format_en_approved` tinyint(1) DEFAULT NULL,
  `ref_approved` tinyint(1) DEFAULT NULL,
  `list_name_approved` tinyint(1) DEFAULT NULL,
  `list_name_en_proofed` tinyint(1) DEFAULT NULL,
  `property_name_en_proofed` tinyint(1) DEFAULT NULL,
  `possessive_en_proofed` tinyint(1) DEFAULT NULL,
  `choice_format_en_proofed` tinyint(1) DEFAULT NULL,
  `ref_proofed` tinyint(1) DEFAULT NULL,
  `list_name_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `waffle_category_thing`
--

DROP TABLE IF EXISTS `waffle_category_thing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waffle_category_thing` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `ref` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_short_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `waffle_category_id` bigint(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `waffle_category_thing_qa_state_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_waffle_category_thing_waffle_category1_idx` (`waffle_category_id`),
  KEY `fk_waffle_category_thing_waffle_category_thing1_idx` (`cloned_from_id`),
  KEY `waffle_category_thing_qa_state_id_fk` (`waffle_category_thing_qa_state_id`),
  KEY `fk_waffle_category_thing_account1_idx` (`owner_id`),
  KEY `fk_waffle_category_thing_node1_idx` (`node_id`),
  CONSTRAINT `fk_waffle_category_thing_account1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_category_thing_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_category_thing_waffle_category1` FOREIGN KEY (`waffle_category_id`) REFERENCES `waffle_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_category_thing_waffle_category_thing1` FOREIGN KEY (`cloned_from_id`) REFERENCES `waffle_category_thing` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `waffle_category_thing_qa_state_id_fk` FOREIGN KEY (`waffle_category_thing_qa_state_id`) REFERENCES `waffle_category_thing_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `waffle_category_thing_qa_state`
--

DROP TABLE IF EXISTS `waffle_category_thing_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waffle_category_thing_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_iw_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `name_en_approved` tinyint(1) DEFAULT NULL,
  `ref_approved` tinyint(1) DEFAULT NULL,
  `short_name_en_approved` tinyint(1) DEFAULT NULL,
  `name_approved` tinyint(1) DEFAULT NULL,
  `name_en_proofed` tinyint(1) DEFAULT NULL,
  `short_name_en_proofed` tinyint(1) DEFAULT NULL,
  `ref_proofed` tinyint(1) DEFAULT NULL,
  `name_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `waffle_data_source`
--

DROP TABLE IF EXISTS `waffle_data_source`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waffle_data_source` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `ref` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_short_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `image_small_media_id` int(11) DEFAULT NULL,
  `image_large_media_id` int(11) DEFAULT NULL,
  `waffle_id` bigint(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `waffle_data_source_qa_state_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_waffle_category_waffle1_idx` (`waffle_id`),
  KEY `fk_waffle_data_source_p3_media1_idx` (`image_small_media_id`),
  KEY `fk_waffle_data_source_p3_media2_idx` (`image_large_media_id`),
  KEY `fk_waffle_data_source_waffle_data_source1_idx` (`cloned_from_id`),
  KEY `waffle_data_source_qa_state_id_fk` (`waffle_data_source_qa_state_id`),
  KEY `fk_waffle_data_source_account1_idx` (`owner_id`),
  KEY `fk_waffle_data_source_node1_idx` (`node_id`),
  CONSTRAINT `fk_waffle_category_waffle11` FOREIGN KEY (`waffle_id`) REFERENCES `waffle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_data_source_account1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_data_source_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_data_source_p3_media1` FOREIGN KEY (`image_small_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_data_source_p3_media2` FOREIGN KEY (`image_large_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_data_source_waffle_data_source1` FOREIGN KEY (`cloned_from_id`) REFERENCES `waffle_data_source` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `waffle_data_source_qa_state_id_fk` FOREIGN KEY (`waffle_data_source_qa_state_id`) REFERENCES `waffle_data_source_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `waffle_data_source_qa_state`
--

DROP TABLE IF EXISTS `waffle_data_source_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waffle_data_source_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_iw_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `name_en_approved` tinyint(1) DEFAULT NULL,
  `ref_approved` tinyint(1) DEFAULT NULL,
  `short_name_en_approved` tinyint(1) DEFAULT NULL,
  `name_approved` tinyint(1) DEFAULT NULL,
  `name_en_proofed` tinyint(1) DEFAULT NULL,
  `short_name_en_proofed` tinyint(1) DEFAULT NULL,
  `ref_proofed` tinyint(1) DEFAULT NULL,
  `name_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `waffle_indicator`
--

DROP TABLE IF EXISTS `waffle_indicator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waffle_indicator` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `ref` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_short_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_description` text COLLATE utf8_bin,
  `waffle_id` bigint(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `waffle_indicator_qa_state_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_waffle_category_waffle1_idx` (`waffle_id`),
  KEY `fk_waffle_indicator_waffle_indicator1_idx` (`cloned_from_id`),
  KEY `waffle_indicator_qa_state_id_fk` (`waffle_indicator_qa_state_id`),
  KEY `fk_waffle_indicator_account1_idx` (`owner_id`),
  KEY `fk_waffle_indicator_node1_idx` (`node_id`),
  CONSTRAINT `fk_waffle_category_waffle10` FOREIGN KEY (`waffle_id`) REFERENCES `waffle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_indicator_account1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_indicator_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_indicator_waffle_indicator1` FOREIGN KEY (`cloned_from_id`) REFERENCES `waffle_indicator` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `waffle_indicator_qa_state_id_fk` FOREIGN KEY (`waffle_indicator_qa_state_id`) REFERENCES `waffle_indicator_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `waffle_indicator_qa_state`
--

DROP TABLE IF EXISTS `waffle_indicator_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waffle_indicator_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_iw_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `name_en_approved` tinyint(1) DEFAULT NULL,
  `ref_approved` tinyint(1) DEFAULT NULL,
  `short_name_en_approved` tinyint(1) DEFAULT NULL,
  `name_approved` tinyint(1) DEFAULT NULL,
  `name_en_proofed` tinyint(1) DEFAULT NULL,
  `short_name_en_proofed` tinyint(1) DEFAULT NULL,
  `ref_proofed` tinyint(1) DEFAULT NULL,
  `name_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `waffle_publisher`
--

DROP TABLE IF EXISTS `waffle_publisher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waffle_publisher` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `ref` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `image_small_media_id` int(11) DEFAULT NULL,
  `image_large_media_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `waffle_publisher_qa_state_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_waffle_data_source_p3_media1_idx` (`image_small_media_id`),
  KEY `fk_waffle_data_source_p3_media2_idx` (`image_large_media_id`),
  KEY `fk_waffle_data_source_waffle_data_source1_idx` (`cloned_from_id`),
  KEY `fk_waffle_data_source_account1_idx` (`owner_id`),
  KEY `fk_waffle_data_source_node1_idx` (`node_id`),
  KEY `waffle_publisher_qa_state_id_fk` (`waffle_publisher_qa_state_id`),
  CONSTRAINT `fk_waffle_data_source_account10` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_data_source_node10` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_data_source_p3_media10` FOREIGN KEY (`image_small_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_data_source_p3_media20` FOREIGN KEY (`image_large_media_id`) REFERENCES `p3_media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_data_source_waffle_data_source10` FOREIGN KEY (`cloned_from_id`) REFERENCES `waffle_publisher` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `waffle_publisher_qa_state_id_fk` FOREIGN KEY (`waffle_publisher_qa_state_id`) REFERENCES `waffle_publisher_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `waffle_publisher_qa_state`
--

DROP TABLE IF EXISTS `waffle_publisher_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waffle_publisher_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_iw_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `name_en_approved` tinyint(1) DEFAULT NULL,
  `ref_approved` tinyint(1) DEFAULT NULL,
  `name_approved` tinyint(1) DEFAULT NULL,
  `name_en_proofed` tinyint(1) DEFAULT NULL,
  `ref_proofed` tinyint(1) DEFAULT NULL,
  `name_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `waffle_qa_state`
--

DROP TABLE IF EXISTS `waffle_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waffle_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_he_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `title_en_approved` tinyint(1) DEFAULT NULL,
  `slug_en_approved` tinyint(1) DEFAULT NULL,
  `short_title_en_approved` tinyint(1) DEFAULT NULL,
  `file_format_approved` tinyint(1) DEFAULT NULL,
  `license_approved` tinyint(1) DEFAULT NULL,
  `license_link_approved` tinyint(1) DEFAULT NULL,
  `waffle_publisher_id_approved` tinyint(1) DEFAULT NULL,
  `json_import_media_id_approved` tinyint(1) DEFAULT NULL,
  `title_approved` tinyint(1) DEFAULT NULL,
  `title_en_proofed` tinyint(1) DEFAULT NULL,
  `po_contents_approved` tinyint(1) DEFAULT NULL,
  `slug_en_proofed` tinyint(1) DEFAULT NULL,
  `short_title_en_proofed` tinyint(1) DEFAULT NULL,
  `file_format_proofed` tinyint(1) DEFAULT NULL,
  `license_proofed` tinyint(1) DEFAULT NULL,
  `license_link_proofed` tinyint(1) DEFAULT NULL,
  `waffle_publisher_id_proofed` tinyint(1) DEFAULT NULL,
  `json_import_media_id_proofed` tinyint(1) DEFAULT NULL,
  `title_proofed` tinyint(1) DEFAULT NULL,
  `po_contents_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `waffle_tag`
--

DROP TABLE IF EXISTS `waffle_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waffle_tag` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `ref` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_short_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_description` text COLLATE utf8_bin,
  `waffle_id` bigint(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `waffle_tag_qa_state_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_waffle_category_waffle1_idx` (`waffle_id`),
  KEY `fk_waffle_tag_waffle_tag1_idx` (`cloned_from_id`),
  KEY `waffle_tag_qa_state_id_fk` (`waffle_tag_qa_state_id`),
  KEY `fk_waffle_tag_account1_idx` (`owner_id`),
  KEY `fk_waffle_tag_node1_idx` (`node_id`),
  CONSTRAINT `fk_waffle_category_waffle1000` FOREIGN KEY (`waffle_id`) REFERENCES `waffle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_tag_account1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_tag_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_tag_waffle_tag1` FOREIGN KEY (`cloned_from_id`) REFERENCES `waffle_tag` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `waffle_tag_qa_state_id_fk` FOREIGN KEY (`waffle_tag_qa_state_id`) REFERENCES `waffle_tag_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `waffle_tag_qa_state`
--

DROP TABLE IF EXISTS `waffle_tag_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waffle_tag_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_iw_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `name_en_approved` tinyint(1) DEFAULT NULL,
  `ref_approved` tinyint(1) DEFAULT NULL,
  `short_name_en_approved` tinyint(1) DEFAULT NULL,
  `name_approved` tinyint(1) DEFAULT NULL,
  `name_en_proofed` tinyint(1) DEFAULT NULL,
  `short_name_en_proofed` tinyint(1) DEFAULT NULL,
  `ref_proofed` tinyint(1) DEFAULT NULL,
  `name_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `waffle_unit`
--

DROP TABLE IF EXISTS `waffle_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waffle_unit` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '1',
  `cloned_from_id` bigint(20) DEFAULT NULL,
  `ref` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_short_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `_description` text COLLATE utf8_bin,
  `waffle_id` bigint(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `node_id` bigint(20) DEFAULT NULL,
  `waffle_unit_qa_state_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_waffle_category_waffle1_idx` (`waffle_id`),
  KEY `fk_waffle_unit_waffle_unit1_idx` (`cloned_from_id`),
  KEY `waffle_unit_qa_state_id_fk` (`waffle_unit_qa_state_id`),
  KEY `fk_waffle_unit_account1_idx` (`owner_id`),
  KEY `fk_waffle_unit_node1_idx` (`node_id`),
  CONSTRAINT `fk_waffle_category_waffle100` FOREIGN KEY (`waffle_id`) REFERENCES `waffle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_unit_account1` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_unit_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_unit_waffle_unit1` FOREIGN KEY (`cloned_from_id`) REFERENCES `waffle_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `waffle_unit_qa_state_id_fk` FOREIGN KEY (`waffle_unit_qa_state_id`) REFERENCES `waffle_unit_qa_state` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `waffle_unit_qa_state`
--

DROP TABLE IF EXISTS `waffle_unit_qa_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waffle_unit_qa_state` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `draft_validation_progress` int(11) DEFAULT NULL,
  `reviewable_validation_progress` int(11) DEFAULT NULL,
  `publishable_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ar_validation_progress` int(11) DEFAULT NULL,
  `translate_into_bg_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ca_validation_progress` int(11) DEFAULT NULL,
  `translate_into_cs_validation_progress` int(11) DEFAULT NULL,
  `translate_into_da_validation_progress` int(11) DEFAULT NULL,
  `translate_into_de_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_gb_validation_progress` int(11) DEFAULT NULL,
  `translate_into_en_us_validation_progress` int(11) DEFAULT NULL,
  `translate_into_el_validation_progress` int(11) DEFAULT NULL,
  `translate_into_es_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fil_validation_progress` int(11) DEFAULT NULL,
  `translate_into_fr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_hu_validation_progress` int(11) DEFAULT NULL,
  `translate_into_id_validation_progress` int(11) DEFAULT NULL,
  `translate_into_iw_validation_progress` int(11) DEFAULT NULL,
  `translate_into_it_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ja_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ko_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_lv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_nl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_no_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_br_validation_progress` int(11) DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ro_validation_progress` int(11) DEFAULT NULL,
  `translate_into_ru_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sl_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_sv_validation_progress` int(11) DEFAULT NULL,
  `translate_into_th_validation_progress` int(11) DEFAULT NULL,
  `translate_into_tr_validation_progress` int(11) DEFAULT NULL,
  `translate_into_uk_validation_progress` int(11) DEFAULT NULL,
  `translate_into_vi_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` int(11) DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` int(11) DEFAULT NULL,
  `approval_progress` int(11) DEFAULT NULL,
  `proofing_progress` int(11) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `allow_publish` tinyint(1) DEFAULT NULL,
  `name_en_approved` tinyint(1) DEFAULT NULL,
  `ref_approved` tinyint(1) DEFAULT NULL,
  `short_name_en_approved` tinyint(1) DEFAULT NULL,
  `name_approved` tinyint(1) DEFAULT NULL,
  `name_en_proofed` tinyint(1) DEFAULT NULL,
  `short_name_en_proofed` tinyint(1) DEFAULT NULL,
  `ref_proofed` tinyint(1) DEFAULT NULL,
  `name_proofed` tinyint(1) DEFAULT NULL,
  `translate_into_fa_validation_progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Final view structure for view `item`
--

/*!50001 DROP TABLE IF EXISTS `item`*/;
/*!50001 DROP VIEW IF EXISTS `item`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `item` AS select `node`.`id` AS `node_id`,(case when (`snapshot`.`id` is not null) then `snapshot`.`id` when (`video_file`.`id` is not null) then `video_file`.`id` when (`chapter`.`id` is not null) then `chapter`.`id` when (`exercise`.`id` is not null) then `exercise`.`id` when (`exam_question`.`id` is not null) then `exam_question`.`id` when (`exam_question_alternative`.`id` is not null) then `exam_question_alternative`.`id` when (`slideshow_file`.`id` is not null) then `slideshow_file`.`id` when (`spreadsheet_file`.`id` is not null) then `spreadsheet_file`.`id` when (`text_doc`.`id` is not null) then `text_doc`.`id` when (`vector_graphic`.`id` is not null) then `vector_graphic`.`id` when (`data_article`.`id` is not null) then `data_article`.`id` when (`data_source`.`id` is not null) then `data_source`.`id` when (`i18n_catalog`.`id` is not null) then `i18n_catalog`.`id` when (`tool`.`id` is not null) then `tool`.`id` when (`gui_section`.`id` is not null) then `gui_section`.`id` when (`menu`.`id` is not null) then `menu`.`id` when (`page`.`id` is not null) then `page`.`id` when (`section`.`id` is not null) then `section`.`id` when (`download_link`.`id` is not null) then `download_link`.`id` when (`html_chunk`.`id` is not null) then `html_chunk`.`id` when (`waffle`.`id` is not null) then `waffle`.`id` when (`waffle_category`.`id` is not null) then `waffle_category`.`id` when (`waffle_category_thing`.`id` is not null) then `waffle_category_thing`.`id` when (`waffle_indicator`.`id` is not null) then `waffle_indicator`.`id` when (`waffle_unit`.`id` is not null) then `waffle_unit`.`id` when (`waffle_tag`.`id` is not null) then `waffle_tag`.`id` when (`waffle_data_source`.`id` is not null) then `waffle_data_source`.`id` when (`waffle_publisher`.`id` is not null) then `waffle_publisher`.`id` else NULL end) AS `id`,(case when (`snapshot`.`id` is not null) then `snapshot`.`_title` when (`video_file`.`id` is not null) then `video_file`.`_title` when (`chapter`.`id` is not null) then `chapter`.`_title` when (`exercise`.`id` is not null) then `exercise`.`_title` when (`slideshow_file`.`id` is not null) then `slideshow_file`.`_title` when (`spreadsheet_file`.`id` is not null) then `spreadsheet_file`.`_title` when (`text_doc`.`id` is not null) then `text_doc`.`_title` when (`vector_graphic`.`id` is not null) then `vector_graphic`.`_title` when (`data_article`.`id` is not null) then `data_article`.`_title` when (`data_source`.`id` is not null) then `data_source`.`_title` when (`tool`.`id` is not null) then `tool`.`_title` when (`menu`.`id` is not null) then `menu`.`_title` when (`page`.`id` is not null) then `page`.`_title` when (`section`.`id` is not null) then `section`.`_title` when (`download_link`.`id` is not null) then `download_link`.`_title` when (`waffle`.`id` is not null) then `waffle`.`_title` else NULL end) AS `_title`,(case when (`snapshot_qa_state`.`status` is not null) then `snapshot_qa_state`.`status` when (`video_file_qa_state`.`status` is not null) then `video_file_qa_state`.`status` when (`chapter_qa_state`.`status` is not null) then `chapter_qa_state`.`status` when (`exercise_qa_state`.`status` is not null) then `exercise_qa_state`.`status` when (`exam_question_qa_state`.`status` is not null) then `exam_question_qa_state`.`status` when (`exam_question_alternative_qa_state`.`status` is not null) then `exam_question_alternative_qa_state`.`status` when (`slideshow_file_qa_state`.`status` is not null) then `slideshow_file_qa_state`.`status` when (`spreadsheet_file_qa_state`.`status` is not null) then `spreadsheet_file_qa_state`.`status` when (`text_doc_qa_state`.`status` is not null) then `text_doc_qa_state`.`status` when (`vector_graphic_qa_state`.`status` is not null) then `vector_graphic_qa_state`.`status` when (`data_article_qa_state`.`status` is not null) then `data_article_qa_state`.`status` when (`data_source_qa_state`.`status` is not null) then `data_source_qa_state`.`status` when (`i18n_catalog_qa_state`.`status` is not null) then `i18n_catalog_qa_state`.`status` when (`tool_qa_state`.`status` is not null) then `tool_qa_state`.`status` when (`gui_section_qa_state`.`status` is not null) then `gui_section_qa_state`.`status` when (`menu_qa_state`.`status` is not null) then `menu_qa_state`.`status` when (`page_qa_state`.`status` is not null) then `page_qa_state`.`status` when (`section_qa_state`.`status` is not null) then `section_qa_state`.`status` when (`download_link_qa_state`.`status` is not null) then `download_link_qa_state`.`status` when (`html_chunk_qa_state`.`status` is not null) then `html_chunk_qa_state`.`status` when (`waffle_qa_state`.`status` is not null) then `waffle_qa_state`.`status` when (`waffle_category_qa_state`.`status` is not null) then `waffle_category_qa_state`.`status` when (`waffle_category_thing_qa_state`.`status` is not null) then `waffle_category_thing_qa_state`.`status` when (`waffle_indicator_qa_state`.`status` is not null) then `waffle_indicator_qa_state`.`status` when (`waffle_unit_qa_state`.`status` is not null) then `waffle_unit_qa_state`.`status` when (`waffle_tag_qa_state`.`status` is not null) then `waffle_tag_qa_state`.`status` when (`waffle_data_source_qa_state`.`status` is not null) then `waffle_data_source_qa_state`.`status` when (`waffle_publisher_qa_state`.`status` is not null) then `waffle_publisher_qa_state`.`status` else NULL end) AS `status`,(case when (`snapshot_qa_state`.`draft_validation_progress` is not null) then `snapshot_qa_state`.`draft_validation_progress` when (`video_file_qa_state`.`draft_validation_progress` is not null) then `video_file_qa_state`.`draft_validation_progress` when (`chapter_qa_state`.`draft_validation_progress` is not null) then `chapter_qa_state`.`draft_validation_progress` when (`exercise_qa_state`.`draft_validation_progress` is not null) then `exercise_qa_state`.`draft_validation_progress` when (`exam_question_qa_state`.`draft_validation_progress` is not null) then `exam_question_qa_state`.`draft_validation_progress` when (`exam_question_alternative_qa_state`.`draft_validation_progress` is not null) then `exam_question_alternative_qa_state`.`draft_validation_progress` when (`slideshow_file_qa_state`.`draft_validation_progress` is not null) then `slideshow_file_qa_state`.`draft_validation_progress` when (`spreadsheet_file_qa_state`.`draft_validation_progress` is not null) then `spreadsheet_file_qa_state`.`draft_validation_progress` when (`text_doc_qa_state`.`draft_validation_progress` is not null) then `text_doc_qa_state`.`draft_validation_progress` when (`vector_graphic_qa_state`.`draft_validation_progress` is not null) then `vector_graphic_qa_state`.`draft_validation_progress` when (`data_article_qa_state`.`draft_validation_progress` is not null) then `data_article_qa_state`.`draft_validation_progress` when (`data_source_qa_state`.`draft_validation_progress` is not null) then `data_source_qa_state`.`draft_validation_progress` when (`i18n_catalog_qa_state`.`draft_validation_progress` is not null) then `i18n_catalog_qa_state`.`draft_validation_progress` when (`tool_qa_state`.`draft_validation_progress` is not null) then `tool_qa_state`.`draft_validation_progress` when (`gui_section_qa_state`.`draft_validation_progress` is not null) then `gui_section_qa_state`.`draft_validation_progress` when (`menu_qa_state`.`draft_validation_progress` is not null) then `menu_qa_state`.`draft_validation_progress` when (`page_qa_state`.`draft_validation_progress` is not null) then `page_qa_state`.`draft_validation_progress` when (`section_qa_state`.`draft_validation_progress` is not null) then `section_qa_state`.`draft_validation_progress` when (`download_link_qa_state`.`draft_validation_progress` is not null) then `download_link_qa_state`.`draft_validation_progress` when (`html_chunk_qa_state`.`draft_validation_progress` is not null) then `html_chunk_qa_state`.`draft_validation_progress` when (`waffle_qa_state`.`draft_validation_progress` is not null) then `waffle_qa_state`.`draft_validation_progress` when (`waffle_category_qa_state`.`draft_validation_progress` is not null) then `waffle_category_qa_state`.`draft_validation_progress` when (`waffle_category_thing_qa_state`.`draft_validation_progress` is not null) then `waffle_category_thing_qa_state`.`draft_validation_progress` when (`waffle_indicator_qa_state`.`draft_validation_progress` is not null) then `waffle_indicator_qa_state`.`draft_validation_progress` when (`waffle_unit_qa_state`.`draft_validation_progress` is not null) then `waffle_unit_qa_state`.`draft_validation_progress` when (`waffle_tag_qa_state`.`draft_validation_progress` is not null) then `waffle_tag_qa_state`.`draft_validation_progress` when (`waffle_data_source_qa_state`.`draft_validation_progress` is not null) then `waffle_data_source_qa_state`.`draft_validation_progress` when (`waffle_publisher_qa_state`.`draft_validation_progress` is not null) then `waffle_publisher_qa_state`.`draft_validation_progress` else NULL end) AS `draft_validation_progress`,(case when (`snapshot_qa_state`.`reviewable_validation_progress` is not null) then `snapshot_qa_state`.`reviewable_validation_progress` when (`video_file_qa_state`.`reviewable_validation_progress` is not null) then `video_file_qa_state`.`reviewable_validation_progress` when (`chapter_qa_state`.`reviewable_validation_progress` is not null) then `chapter_qa_state`.`reviewable_validation_progress` when (`exercise_qa_state`.`reviewable_validation_progress` is not null) then `exercise_qa_state`.`reviewable_validation_progress` when (`exam_question_qa_state`.`reviewable_validation_progress` is not null) then `exam_question_qa_state`.`reviewable_validation_progress` when (`exam_question_alternative_qa_state`.`reviewable_validation_progress` is not null) then `exam_question_alternative_qa_state`.`reviewable_validation_progress` when (`slideshow_file_qa_state`.`reviewable_validation_progress` is not null) then `slideshow_file_qa_state`.`reviewable_validation_progress` when (`spreadsheet_file_qa_state`.`reviewable_validation_progress` is not null) then `spreadsheet_file_qa_state`.`reviewable_validation_progress` when (`text_doc_qa_state`.`reviewable_validation_progress` is not null) then `text_doc_qa_state`.`reviewable_validation_progress` when (`vector_graphic_qa_state`.`reviewable_validation_progress` is not null) then `vector_graphic_qa_state`.`reviewable_validation_progress` when (`data_article_qa_state`.`reviewable_validation_progress` is not null) then `data_article_qa_state`.`reviewable_validation_progress` when (`data_source_qa_state`.`reviewable_validation_progress` is not null) then `data_source_qa_state`.`reviewable_validation_progress` when (`i18n_catalog_qa_state`.`reviewable_validation_progress` is not null) then `i18n_catalog_qa_state`.`reviewable_validation_progress` when (`tool_qa_state`.`reviewable_validation_progress` is not null) then `tool_qa_state`.`reviewable_validation_progress` when (`gui_section_qa_state`.`reviewable_validation_progress` is not null) then `gui_section_qa_state`.`reviewable_validation_progress` when (`menu_qa_state`.`reviewable_validation_progress` is not null) then `menu_qa_state`.`reviewable_validation_progress` when (`page_qa_state`.`reviewable_validation_progress` is not null) then `page_qa_state`.`reviewable_validation_progress` when (`section_qa_state`.`reviewable_validation_progress` is not null) then `section_qa_state`.`reviewable_validation_progress` when (`download_link_qa_state`.`reviewable_validation_progress` is not null) then `download_link_qa_state`.`reviewable_validation_progress` when (`html_chunk_qa_state`.`reviewable_validation_progress` is not null) then `html_chunk_qa_state`.`reviewable_validation_progress` when (`waffle_qa_state`.`reviewable_validation_progress` is not null) then `waffle_qa_state`.`reviewable_validation_progress` when (`waffle_category_qa_state`.`reviewable_validation_progress` is not null) then `waffle_category_qa_state`.`reviewable_validation_progress` when (`waffle_category_thing_qa_state`.`reviewable_validation_progress` is not null) then `waffle_category_thing_qa_state`.`reviewable_validation_progress` when (`waffle_indicator_qa_state`.`reviewable_validation_progress` is not null) then `waffle_indicator_qa_state`.`reviewable_validation_progress` when (`waffle_unit_qa_state`.`reviewable_validation_progress` is not null) then `waffle_unit_qa_state`.`reviewable_validation_progress` when (`waffle_tag_qa_state`.`reviewable_validation_progress` is not null) then `waffle_tag_qa_state`.`reviewable_validation_progress` when (`waffle_data_source_qa_state`.`reviewable_validation_progress` is not null) then `waffle_data_source_qa_state`.`reviewable_validation_progress` when (`waffle_publisher_qa_state`.`reviewable_validation_progress` is not null) then `waffle_publisher_qa_state`.`reviewable_validation_progress` else NULL end) AS `reviewable_validation_progress`,(case when (`snapshot_qa_state`.`publishable_validation_progress` is not null) then `snapshot_qa_state`.`publishable_validation_progress` when (`video_file_qa_state`.`publishable_validation_progress` is not null) then `video_file_qa_state`.`publishable_validation_progress` when (`chapter_qa_state`.`publishable_validation_progress` is not null) then `chapter_qa_state`.`publishable_validation_progress` when (`exercise_qa_state`.`publishable_validation_progress` is not null) then `exercise_qa_state`.`publishable_validation_progress` when (`exam_question_qa_state`.`publishable_validation_progress` is not null) then `exam_question_qa_state`.`publishable_validation_progress` when (`exam_question_alternative_qa_state`.`publishable_validation_progress` is not null) then `exam_question_alternative_qa_state`.`publishable_validation_progress` when (`slideshow_file_qa_state`.`publishable_validation_progress` is not null) then `slideshow_file_qa_state`.`publishable_validation_progress` when (`spreadsheet_file_qa_state`.`publishable_validation_progress` is not null) then `spreadsheet_file_qa_state`.`publishable_validation_progress` when (`text_doc_qa_state`.`publishable_validation_progress` is not null) then `text_doc_qa_state`.`publishable_validation_progress` when (`vector_graphic_qa_state`.`publishable_validation_progress` is not null) then `vector_graphic_qa_state`.`publishable_validation_progress` when (`data_article_qa_state`.`publishable_validation_progress` is not null) then `data_article_qa_state`.`publishable_validation_progress` when (`data_source_qa_state`.`publishable_validation_progress` is not null) then `data_source_qa_state`.`publishable_validation_progress` when (`i18n_catalog_qa_state`.`publishable_validation_progress` is not null) then `i18n_catalog_qa_state`.`publishable_validation_progress` when (`tool_qa_state`.`publishable_validation_progress` is not null) then `tool_qa_state`.`publishable_validation_progress` when (`gui_section_qa_state`.`publishable_validation_progress` is not null) then `gui_section_qa_state`.`publishable_validation_progress` when (`menu_qa_state`.`publishable_validation_progress` is not null) then `menu_qa_state`.`publishable_validation_progress` when (`page_qa_state`.`publishable_validation_progress` is not null) then `page_qa_state`.`publishable_validation_progress` when (`section_qa_state`.`publishable_validation_progress` is not null) then `section_qa_state`.`publishable_validation_progress` when (`download_link_qa_state`.`publishable_validation_progress` is not null) then `download_link_qa_state`.`publishable_validation_progress` when (`html_chunk_qa_state`.`publishable_validation_progress` is not null) then `html_chunk_qa_state`.`publishable_validation_progress` when (`waffle_qa_state`.`publishable_validation_progress` is not null) then `waffle_qa_state`.`publishable_validation_progress` when (`waffle_category_qa_state`.`publishable_validation_progress` is not null) then `waffle_category_qa_state`.`publishable_validation_progress` when (`waffle_category_thing_qa_state`.`publishable_validation_progress` is not null) then `waffle_category_thing_qa_state`.`publishable_validation_progress` when (`waffle_indicator_qa_state`.`publishable_validation_progress` is not null) then `waffle_indicator_qa_state`.`publishable_validation_progress` when (`waffle_unit_qa_state`.`publishable_validation_progress` is not null) then `waffle_unit_qa_state`.`publishable_validation_progress` when (`waffle_tag_qa_state`.`publishable_validation_progress` is not null) then `waffle_tag_qa_state`.`publishable_validation_progress` when (`waffle_data_source_qa_state`.`publishable_validation_progress` is not null) then `waffle_data_source_qa_state`.`publishable_validation_progress` when (`waffle_publisher_qa_state`.`publishable_validation_progress` is not null) then `waffle_publisher_qa_state`.`publishable_validation_progress` else NULL end) AS `publishable_validation_progress`,(case when (`snapshot_qa_state`.`approval_progress` is not null) then `snapshot_qa_state`.`approval_progress` when (`video_file_qa_state`.`approval_progress` is not null) then `video_file_qa_state`.`approval_progress` when (`chapter_qa_state`.`approval_progress` is not null) then `chapter_qa_state`.`approval_progress` when (`exercise_qa_state`.`approval_progress` is not null) then `exercise_qa_state`.`approval_progress` when (`exam_question_qa_state`.`approval_progress` is not null) then `exam_question_qa_state`.`approval_progress` when (`exam_question_alternative_qa_state`.`approval_progress` is not null) then `exam_question_alternative_qa_state`.`approval_progress` when (`slideshow_file_qa_state`.`approval_progress` is not null) then `slideshow_file_qa_state`.`approval_progress` when (`spreadsheet_file_qa_state`.`approval_progress` is not null) then `spreadsheet_file_qa_state`.`approval_progress` when (`text_doc_qa_state`.`approval_progress` is not null) then `text_doc_qa_state`.`approval_progress` when (`vector_graphic_qa_state`.`approval_progress` is not null) then `vector_graphic_qa_state`.`approval_progress` when (`data_article_qa_state`.`approval_progress` is not null) then `data_article_qa_state`.`approval_progress` when (`data_source_qa_state`.`approval_progress` is not null) then `data_source_qa_state`.`approval_progress` when (`i18n_catalog_qa_state`.`approval_progress` is not null) then `i18n_catalog_qa_state`.`approval_progress` when (`tool_qa_state`.`approval_progress` is not null) then `tool_qa_state`.`approval_progress` when (`gui_section_qa_state`.`approval_progress` is not null) then `gui_section_qa_state`.`approval_progress` when (`menu_qa_state`.`approval_progress` is not null) then `menu_qa_state`.`approval_progress` when (`page_qa_state`.`approval_progress` is not null) then `page_qa_state`.`approval_progress` when (`section_qa_state`.`approval_progress` is not null) then `section_qa_state`.`approval_progress` when (`download_link_qa_state`.`approval_progress` is not null) then `download_link_qa_state`.`approval_progress` when (`html_chunk_qa_state`.`approval_progress` is not null) then `html_chunk_qa_state`.`approval_progress` when (`waffle_qa_state`.`approval_progress` is not null) then `waffle_qa_state`.`approval_progress` when (`waffle_category_qa_state`.`approval_progress` is not null) then `waffle_category_qa_state`.`approval_progress` when (`waffle_category_thing_qa_state`.`approval_progress` is not null) then `waffle_category_thing_qa_state`.`approval_progress` when (`waffle_indicator_qa_state`.`approval_progress` is not null) then `waffle_indicator_qa_state`.`approval_progress` when (`waffle_unit_qa_state`.`approval_progress` is not null) then `waffle_unit_qa_state`.`approval_progress` when (`waffle_tag_qa_state`.`approval_progress` is not null) then `waffle_tag_qa_state`.`approval_progress` when (`waffle_data_source_qa_state`.`approval_progress` is not null) then `waffle_data_source_qa_state`.`approval_progress` when (`waffle_publisher_qa_state`.`approval_progress` is not null) then `waffle_publisher_qa_state`.`approval_progress` else NULL end) AS `approval_progress`,(case when (`snapshot_qa_state`.`proofing_progress` is not null) then `snapshot_qa_state`.`proofing_progress` when (`video_file_qa_state`.`proofing_progress` is not null) then `video_file_qa_state`.`proofing_progress` when (`chapter_qa_state`.`proofing_progress` is not null) then `chapter_qa_state`.`proofing_progress` when (`exercise_qa_state`.`proofing_progress` is not null) then `exercise_qa_state`.`proofing_progress` when (`exam_question_qa_state`.`proofing_progress` is not null) then `exam_question_qa_state`.`proofing_progress` when (`exam_question_alternative_qa_state`.`proofing_progress` is not null) then `exam_question_alternative_qa_state`.`proofing_progress` when (`slideshow_file_qa_state`.`proofing_progress` is not null) then `slideshow_file_qa_state`.`proofing_progress` when (`spreadsheet_file_qa_state`.`proofing_progress` is not null) then `spreadsheet_file_qa_state`.`proofing_progress` when (`text_doc_qa_state`.`proofing_progress` is not null) then `text_doc_qa_state`.`proofing_progress` when (`vector_graphic_qa_state`.`proofing_progress` is not null) then `vector_graphic_qa_state`.`proofing_progress` when (`data_article_qa_state`.`proofing_progress` is not null) then `data_article_qa_state`.`proofing_progress` when (`data_source_qa_state`.`proofing_progress` is not null) then `data_source_qa_state`.`proofing_progress` when (`i18n_catalog_qa_state`.`proofing_progress` is not null) then `i18n_catalog_qa_state`.`proofing_progress` when (`tool_qa_state`.`proofing_progress` is not null) then `tool_qa_state`.`proofing_progress` when (`gui_section_qa_state`.`proofing_progress` is not null) then `gui_section_qa_state`.`proofing_progress` when (`menu_qa_state`.`proofing_progress` is not null) then `menu_qa_state`.`proofing_progress` when (`page_qa_state`.`proofing_progress` is not null) then `page_qa_state`.`proofing_progress` when (`section_qa_state`.`proofing_progress` is not null) then `section_qa_state`.`proofing_progress` when (`download_link_qa_state`.`proofing_progress` is not null) then `download_link_qa_state`.`proofing_progress` when (`html_chunk_qa_state`.`proofing_progress` is not null) then `html_chunk_qa_state`.`proofing_progress` when (`waffle_qa_state`.`proofing_progress` is not null) then `waffle_qa_state`.`proofing_progress` when (`waffle_category_qa_state`.`proofing_progress` is not null) then `waffle_category_qa_state`.`proofing_progress` when (`waffle_category_thing_qa_state`.`proofing_progress` is not null) then `waffle_category_thing_qa_state`.`proofing_progress` when (`waffle_indicator_qa_state`.`proofing_progress` is not null) then `waffle_indicator_qa_state`.`proofing_progress` when (`waffle_unit_qa_state`.`proofing_progress` is not null) then `waffle_unit_qa_state`.`proofing_progress` when (`waffle_tag_qa_state`.`proofing_progress` is not null) then `waffle_tag_qa_state`.`proofing_progress` when (`waffle_data_source_qa_state`.`proofing_progress` is not null) then `waffle_data_source_qa_state`.`proofing_progress` when (`waffle_publisher_qa_state`.`proofing_progress` is not null) then `waffle_publisher_qa_state`.`proofing_progress` else NULL end) AS `proofing_progress`,(case when (`snapshot_qa_state`.`translate_into_en_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_en_validation_progress` when (`video_file_qa_state`.`translate_into_en_validation_progress` is not null) then `video_file_qa_state`.`translate_into_en_validation_progress` when (`chapter_qa_state`.`translate_into_en_validation_progress` is not null) then `chapter_qa_state`.`translate_into_en_validation_progress` when (`exercise_qa_state`.`translate_into_en_validation_progress` is not null) then `exercise_qa_state`.`translate_into_en_validation_progress` when (`exam_question_qa_state`.`translate_into_en_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_en_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_en_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_en_validation_progress` when (`slideshow_file_qa_state`.`translate_into_en_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_en_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_en_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_en_validation_progress` when (`text_doc_qa_state`.`translate_into_en_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_en_validation_progress` when (`vector_graphic_qa_state`.`translate_into_en_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_en_validation_progress` when (`data_article_qa_state`.`translate_into_en_validation_progress` is not null) then `data_article_qa_state`.`translate_into_en_validation_progress` when (`data_source_qa_state`.`translate_into_en_validation_progress` is not null) then `data_source_qa_state`.`translate_into_en_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_en_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_en_validation_progress` when (`tool_qa_state`.`translate_into_en_validation_progress` is not null) then `tool_qa_state`.`translate_into_en_validation_progress` when (`gui_section_qa_state`.`translate_into_en_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_en_validation_progress` when (`menu_qa_state`.`translate_into_en_validation_progress` is not null) then `menu_qa_state`.`translate_into_en_validation_progress` when (`page_qa_state`.`translate_into_en_validation_progress` is not null) then `page_qa_state`.`translate_into_en_validation_progress` when (`section_qa_state`.`translate_into_en_validation_progress` is not null) then `section_qa_state`.`translate_into_en_validation_progress` when (`download_link_qa_state`.`translate_into_en_validation_progress` is not null) then `download_link_qa_state`.`translate_into_en_validation_progress` when (`html_chunk_qa_state`.`translate_into_en_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_en_validation_progress` when (`waffle_qa_state`.`translate_into_en_validation_progress` is not null) then `waffle_qa_state`.`translate_into_en_validation_progress` when (`waffle_category_qa_state`.`translate_into_en_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_en_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_en_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_en_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_en_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_en_validation_progress` when (`waffle_unit_qa_state`.`translate_into_en_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_en_validation_progress` when (`waffle_tag_qa_state`.`translate_into_en_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_en_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_en_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_en_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_en_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_en_validation_progress` else NULL end) AS `translate_into_en_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_ar_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_ar_validation_progress` when (`video_file_qa_state`.`translate_into_ar_validation_progress` is not null) then `video_file_qa_state`.`translate_into_ar_validation_progress` when (`chapter_qa_state`.`translate_into_ar_validation_progress` is not null) then `chapter_qa_state`.`translate_into_ar_validation_progress` when (`exercise_qa_state`.`translate_into_ar_validation_progress` is not null) then `exercise_qa_state`.`translate_into_ar_validation_progress` when (`exam_question_qa_state`.`translate_into_ar_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_ar_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_ar_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_ar_validation_progress` when (`slideshow_file_qa_state`.`translate_into_ar_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_ar_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_ar_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_ar_validation_progress` when (`text_doc_qa_state`.`translate_into_ar_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_ar_validation_progress` when (`vector_graphic_qa_state`.`translate_into_ar_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_ar_validation_progress` when (`data_article_qa_state`.`translate_into_ar_validation_progress` is not null) then `data_article_qa_state`.`translate_into_ar_validation_progress` when (`data_source_qa_state`.`translate_into_ar_validation_progress` is not null) then `data_source_qa_state`.`translate_into_ar_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_ar_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_ar_validation_progress` when (`tool_qa_state`.`translate_into_ar_validation_progress` is not null) then `tool_qa_state`.`translate_into_ar_validation_progress` when (`gui_section_qa_state`.`translate_into_ar_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_ar_validation_progress` when (`menu_qa_state`.`translate_into_ar_validation_progress` is not null) then `menu_qa_state`.`translate_into_ar_validation_progress` when (`page_qa_state`.`translate_into_ar_validation_progress` is not null) then `page_qa_state`.`translate_into_ar_validation_progress` when (`section_qa_state`.`translate_into_ar_validation_progress` is not null) then `section_qa_state`.`translate_into_ar_validation_progress` when (`download_link_qa_state`.`translate_into_ar_validation_progress` is not null) then `download_link_qa_state`.`translate_into_ar_validation_progress` when (`html_chunk_qa_state`.`translate_into_ar_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_ar_validation_progress` when (`waffle_qa_state`.`translate_into_ar_validation_progress` is not null) then `waffle_qa_state`.`translate_into_ar_validation_progress` when (`waffle_category_qa_state`.`translate_into_ar_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_ar_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_ar_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_ar_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_ar_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_ar_validation_progress` when (`waffle_unit_qa_state`.`translate_into_ar_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_ar_validation_progress` when (`waffle_tag_qa_state`.`translate_into_ar_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_ar_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_ar_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_ar_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_ar_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_ar_validation_progress` else NULL end) AS `translate_into_ar_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_bg_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_bg_validation_progress` when (`video_file_qa_state`.`translate_into_bg_validation_progress` is not null) then `video_file_qa_state`.`translate_into_bg_validation_progress` when (`chapter_qa_state`.`translate_into_bg_validation_progress` is not null) then `chapter_qa_state`.`translate_into_bg_validation_progress` when (`exercise_qa_state`.`translate_into_bg_validation_progress` is not null) then `exercise_qa_state`.`translate_into_bg_validation_progress` when (`exam_question_qa_state`.`translate_into_bg_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_bg_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_bg_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_bg_validation_progress` when (`slideshow_file_qa_state`.`translate_into_bg_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_bg_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_bg_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_bg_validation_progress` when (`text_doc_qa_state`.`translate_into_bg_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_bg_validation_progress` when (`vector_graphic_qa_state`.`translate_into_bg_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_bg_validation_progress` when (`data_article_qa_state`.`translate_into_bg_validation_progress` is not null) then `data_article_qa_state`.`translate_into_bg_validation_progress` when (`data_source_qa_state`.`translate_into_bg_validation_progress` is not null) then `data_source_qa_state`.`translate_into_bg_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_bg_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_bg_validation_progress` when (`tool_qa_state`.`translate_into_bg_validation_progress` is not null) then `tool_qa_state`.`translate_into_bg_validation_progress` when (`gui_section_qa_state`.`translate_into_bg_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_bg_validation_progress` when (`menu_qa_state`.`translate_into_bg_validation_progress` is not null) then `menu_qa_state`.`translate_into_bg_validation_progress` when (`page_qa_state`.`translate_into_bg_validation_progress` is not null) then `page_qa_state`.`translate_into_bg_validation_progress` when (`section_qa_state`.`translate_into_bg_validation_progress` is not null) then `section_qa_state`.`translate_into_bg_validation_progress` when (`download_link_qa_state`.`translate_into_bg_validation_progress` is not null) then `download_link_qa_state`.`translate_into_bg_validation_progress` when (`html_chunk_qa_state`.`translate_into_bg_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_bg_validation_progress` when (`waffle_qa_state`.`translate_into_bg_validation_progress` is not null) then `waffle_qa_state`.`translate_into_bg_validation_progress` when (`waffle_category_qa_state`.`translate_into_bg_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_bg_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_bg_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_bg_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_bg_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_bg_validation_progress` when (`waffle_unit_qa_state`.`translate_into_bg_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_bg_validation_progress` when (`waffle_tag_qa_state`.`translate_into_bg_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_bg_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_bg_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_bg_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_bg_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_bg_validation_progress` else NULL end) AS `translate_into_bg_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_ca_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_ca_validation_progress` when (`video_file_qa_state`.`translate_into_ca_validation_progress` is not null) then `video_file_qa_state`.`translate_into_ca_validation_progress` when (`chapter_qa_state`.`translate_into_ca_validation_progress` is not null) then `chapter_qa_state`.`translate_into_ca_validation_progress` when (`exercise_qa_state`.`translate_into_ca_validation_progress` is not null) then `exercise_qa_state`.`translate_into_ca_validation_progress` when (`exam_question_qa_state`.`translate_into_ca_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_ca_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_ca_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_ca_validation_progress` when (`slideshow_file_qa_state`.`translate_into_ca_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_ca_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_ca_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_ca_validation_progress` when (`text_doc_qa_state`.`translate_into_ca_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_ca_validation_progress` when (`vector_graphic_qa_state`.`translate_into_ca_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_ca_validation_progress` when (`data_article_qa_state`.`translate_into_ca_validation_progress` is not null) then `data_article_qa_state`.`translate_into_ca_validation_progress` when (`data_source_qa_state`.`translate_into_ca_validation_progress` is not null) then `data_source_qa_state`.`translate_into_ca_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_ca_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_ca_validation_progress` when (`tool_qa_state`.`translate_into_ca_validation_progress` is not null) then `tool_qa_state`.`translate_into_ca_validation_progress` when (`gui_section_qa_state`.`translate_into_ca_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_ca_validation_progress` when (`menu_qa_state`.`translate_into_ca_validation_progress` is not null) then `menu_qa_state`.`translate_into_ca_validation_progress` when (`page_qa_state`.`translate_into_ca_validation_progress` is not null) then `page_qa_state`.`translate_into_ca_validation_progress` when (`section_qa_state`.`translate_into_ca_validation_progress` is not null) then `section_qa_state`.`translate_into_ca_validation_progress` when (`download_link_qa_state`.`translate_into_ca_validation_progress` is not null) then `download_link_qa_state`.`translate_into_ca_validation_progress` when (`html_chunk_qa_state`.`translate_into_ca_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_ca_validation_progress` when (`waffle_qa_state`.`translate_into_ca_validation_progress` is not null) then `waffle_qa_state`.`translate_into_ca_validation_progress` when (`waffle_category_qa_state`.`translate_into_ca_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_ca_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_ca_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_ca_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_ca_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_ca_validation_progress` when (`waffle_unit_qa_state`.`translate_into_ca_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_ca_validation_progress` when (`waffle_tag_qa_state`.`translate_into_ca_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_ca_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_ca_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_ca_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_ca_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_ca_validation_progress` else NULL end) AS `translate_into_ca_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_cs_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_cs_validation_progress` when (`video_file_qa_state`.`translate_into_cs_validation_progress` is not null) then `video_file_qa_state`.`translate_into_cs_validation_progress` when (`chapter_qa_state`.`translate_into_cs_validation_progress` is not null) then `chapter_qa_state`.`translate_into_cs_validation_progress` when (`exercise_qa_state`.`translate_into_cs_validation_progress` is not null) then `exercise_qa_state`.`translate_into_cs_validation_progress` when (`exam_question_qa_state`.`translate_into_cs_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_cs_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_cs_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_cs_validation_progress` when (`slideshow_file_qa_state`.`translate_into_cs_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_cs_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_cs_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_cs_validation_progress` when (`text_doc_qa_state`.`translate_into_cs_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_cs_validation_progress` when (`vector_graphic_qa_state`.`translate_into_cs_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_cs_validation_progress` when (`data_article_qa_state`.`translate_into_cs_validation_progress` is not null) then `data_article_qa_state`.`translate_into_cs_validation_progress` when (`data_source_qa_state`.`translate_into_cs_validation_progress` is not null) then `data_source_qa_state`.`translate_into_cs_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_cs_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_cs_validation_progress` when (`tool_qa_state`.`translate_into_cs_validation_progress` is not null) then `tool_qa_state`.`translate_into_cs_validation_progress` when (`gui_section_qa_state`.`translate_into_cs_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_cs_validation_progress` when (`menu_qa_state`.`translate_into_cs_validation_progress` is not null) then `menu_qa_state`.`translate_into_cs_validation_progress` when (`page_qa_state`.`translate_into_cs_validation_progress` is not null) then `page_qa_state`.`translate_into_cs_validation_progress` when (`section_qa_state`.`translate_into_cs_validation_progress` is not null) then `section_qa_state`.`translate_into_cs_validation_progress` when (`download_link_qa_state`.`translate_into_cs_validation_progress` is not null) then `download_link_qa_state`.`translate_into_cs_validation_progress` when (`html_chunk_qa_state`.`translate_into_cs_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_cs_validation_progress` when (`waffle_qa_state`.`translate_into_cs_validation_progress` is not null) then `waffle_qa_state`.`translate_into_cs_validation_progress` when (`waffle_category_qa_state`.`translate_into_cs_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_cs_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_cs_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_cs_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_cs_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_cs_validation_progress` when (`waffle_unit_qa_state`.`translate_into_cs_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_cs_validation_progress` when (`waffle_tag_qa_state`.`translate_into_cs_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_cs_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_cs_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_cs_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_cs_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_cs_validation_progress` else NULL end) AS `translate_into_cs_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_da_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_da_validation_progress` when (`video_file_qa_state`.`translate_into_da_validation_progress` is not null) then `video_file_qa_state`.`translate_into_da_validation_progress` when (`chapter_qa_state`.`translate_into_da_validation_progress` is not null) then `chapter_qa_state`.`translate_into_da_validation_progress` when (`exercise_qa_state`.`translate_into_da_validation_progress` is not null) then `exercise_qa_state`.`translate_into_da_validation_progress` when (`exam_question_qa_state`.`translate_into_da_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_da_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_da_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_da_validation_progress` when (`slideshow_file_qa_state`.`translate_into_da_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_da_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_da_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_da_validation_progress` when (`text_doc_qa_state`.`translate_into_da_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_da_validation_progress` when (`vector_graphic_qa_state`.`translate_into_da_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_da_validation_progress` when (`data_article_qa_state`.`translate_into_da_validation_progress` is not null) then `data_article_qa_state`.`translate_into_da_validation_progress` when (`data_source_qa_state`.`translate_into_da_validation_progress` is not null) then `data_source_qa_state`.`translate_into_da_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_da_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_da_validation_progress` when (`tool_qa_state`.`translate_into_da_validation_progress` is not null) then `tool_qa_state`.`translate_into_da_validation_progress` when (`gui_section_qa_state`.`translate_into_da_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_da_validation_progress` when (`menu_qa_state`.`translate_into_da_validation_progress` is not null) then `menu_qa_state`.`translate_into_da_validation_progress` when (`page_qa_state`.`translate_into_da_validation_progress` is not null) then `page_qa_state`.`translate_into_da_validation_progress` when (`section_qa_state`.`translate_into_da_validation_progress` is not null) then `section_qa_state`.`translate_into_da_validation_progress` when (`download_link_qa_state`.`translate_into_da_validation_progress` is not null) then `download_link_qa_state`.`translate_into_da_validation_progress` when (`html_chunk_qa_state`.`translate_into_da_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_da_validation_progress` when (`waffle_qa_state`.`translate_into_da_validation_progress` is not null) then `waffle_qa_state`.`translate_into_da_validation_progress` when (`waffle_category_qa_state`.`translate_into_da_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_da_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_da_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_da_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_da_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_da_validation_progress` when (`waffle_unit_qa_state`.`translate_into_da_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_da_validation_progress` when (`waffle_tag_qa_state`.`translate_into_da_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_da_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_da_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_da_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_da_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_da_validation_progress` else NULL end) AS `translate_into_da_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_de_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_de_validation_progress` when (`video_file_qa_state`.`translate_into_de_validation_progress` is not null) then `video_file_qa_state`.`translate_into_de_validation_progress` when (`chapter_qa_state`.`translate_into_de_validation_progress` is not null) then `chapter_qa_state`.`translate_into_de_validation_progress` when (`exercise_qa_state`.`translate_into_de_validation_progress` is not null) then `exercise_qa_state`.`translate_into_de_validation_progress` when (`exam_question_qa_state`.`translate_into_de_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_de_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_de_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_de_validation_progress` when (`slideshow_file_qa_state`.`translate_into_de_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_de_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_de_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_de_validation_progress` when (`text_doc_qa_state`.`translate_into_de_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_de_validation_progress` when (`vector_graphic_qa_state`.`translate_into_de_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_de_validation_progress` when (`data_article_qa_state`.`translate_into_de_validation_progress` is not null) then `data_article_qa_state`.`translate_into_de_validation_progress` when (`data_source_qa_state`.`translate_into_de_validation_progress` is not null) then `data_source_qa_state`.`translate_into_de_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_de_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_de_validation_progress` when (`tool_qa_state`.`translate_into_de_validation_progress` is not null) then `tool_qa_state`.`translate_into_de_validation_progress` when (`gui_section_qa_state`.`translate_into_de_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_de_validation_progress` when (`menu_qa_state`.`translate_into_de_validation_progress` is not null) then `menu_qa_state`.`translate_into_de_validation_progress` when (`page_qa_state`.`translate_into_de_validation_progress` is not null) then `page_qa_state`.`translate_into_de_validation_progress` when (`section_qa_state`.`translate_into_de_validation_progress` is not null) then `section_qa_state`.`translate_into_de_validation_progress` when (`download_link_qa_state`.`translate_into_de_validation_progress` is not null) then `download_link_qa_state`.`translate_into_de_validation_progress` when (`html_chunk_qa_state`.`translate_into_de_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_de_validation_progress` when (`waffle_qa_state`.`translate_into_de_validation_progress` is not null) then `waffle_qa_state`.`translate_into_de_validation_progress` when (`waffle_category_qa_state`.`translate_into_de_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_de_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_de_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_de_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_de_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_de_validation_progress` when (`waffle_unit_qa_state`.`translate_into_de_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_de_validation_progress` when (`waffle_tag_qa_state`.`translate_into_de_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_de_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_de_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_de_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_de_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_de_validation_progress` else NULL end) AS `translate_into_de_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_en_gb_validation_progress` when (`video_file_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `video_file_qa_state`.`translate_into_en_gb_validation_progress` when (`chapter_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `chapter_qa_state`.`translate_into_en_gb_validation_progress` when (`exercise_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `exercise_qa_state`.`translate_into_en_gb_validation_progress` when (`exam_question_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_en_gb_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_en_gb_validation_progress` when (`slideshow_file_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_en_gb_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_en_gb_validation_progress` when (`text_doc_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_en_gb_validation_progress` when (`vector_graphic_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_en_gb_validation_progress` when (`data_article_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `data_article_qa_state`.`translate_into_en_gb_validation_progress` when (`data_source_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `data_source_qa_state`.`translate_into_en_gb_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_en_gb_validation_progress` when (`tool_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `tool_qa_state`.`translate_into_en_gb_validation_progress` when (`gui_section_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_en_gb_validation_progress` when (`menu_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `menu_qa_state`.`translate_into_en_gb_validation_progress` when (`page_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `page_qa_state`.`translate_into_en_gb_validation_progress` when (`section_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `section_qa_state`.`translate_into_en_gb_validation_progress` when (`download_link_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `download_link_qa_state`.`translate_into_en_gb_validation_progress` when (`html_chunk_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_en_gb_validation_progress` when (`waffle_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `waffle_qa_state`.`translate_into_en_gb_validation_progress` when (`waffle_category_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_en_gb_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_en_gb_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_en_gb_validation_progress` when (`waffle_unit_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_en_gb_validation_progress` when (`waffle_tag_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_en_gb_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_en_gb_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_en_gb_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_en_gb_validation_progress` else NULL end) AS `translate_into_en_gb_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_en_us_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_en_us_validation_progress` when (`video_file_qa_state`.`translate_into_en_us_validation_progress` is not null) then `video_file_qa_state`.`translate_into_en_us_validation_progress` when (`chapter_qa_state`.`translate_into_en_us_validation_progress` is not null) then `chapter_qa_state`.`translate_into_en_us_validation_progress` when (`exercise_qa_state`.`translate_into_en_us_validation_progress` is not null) then `exercise_qa_state`.`translate_into_en_us_validation_progress` when (`exam_question_qa_state`.`translate_into_en_us_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_en_us_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_en_us_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_en_us_validation_progress` when (`slideshow_file_qa_state`.`translate_into_en_us_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_en_us_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_en_us_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_en_us_validation_progress` when (`text_doc_qa_state`.`translate_into_en_us_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_en_us_validation_progress` when (`vector_graphic_qa_state`.`translate_into_en_us_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_en_us_validation_progress` when (`data_article_qa_state`.`translate_into_en_us_validation_progress` is not null) then `data_article_qa_state`.`translate_into_en_us_validation_progress` when (`data_source_qa_state`.`translate_into_en_us_validation_progress` is not null) then `data_source_qa_state`.`translate_into_en_us_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_en_us_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_en_us_validation_progress` when (`tool_qa_state`.`translate_into_en_us_validation_progress` is not null) then `tool_qa_state`.`translate_into_en_us_validation_progress` when (`gui_section_qa_state`.`translate_into_en_us_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_en_us_validation_progress` when (`menu_qa_state`.`translate_into_en_us_validation_progress` is not null) then `menu_qa_state`.`translate_into_en_us_validation_progress` when (`page_qa_state`.`translate_into_en_us_validation_progress` is not null) then `page_qa_state`.`translate_into_en_us_validation_progress` when (`section_qa_state`.`translate_into_en_us_validation_progress` is not null) then `section_qa_state`.`translate_into_en_us_validation_progress` when (`download_link_qa_state`.`translate_into_en_us_validation_progress` is not null) then `download_link_qa_state`.`translate_into_en_us_validation_progress` when (`html_chunk_qa_state`.`translate_into_en_us_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_en_us_validation_progress` when (`waffle_qa_state`.`translate_into_en_us_validation_progress` is not null) then `waffle_qa_state`.`translate_into_en_us_validation_progress` when (`waffle_category_qa_state`.`translate_into_en_us_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_en_us_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_en_us_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_en_us_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_en_us_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_en_us_validation_progress` when (`waffle_unit_qa_state`.`translate_into_en_us_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_en_us_validation_progress` when (`waffle_tag_qa_state`.`translate_into_en_us_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_en_us_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_en_us_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_en_us_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_en_us_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_en_us_validation_progress` else NULL end) AS `translate_into_en_us_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_el_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_el_validation_progress` when (`video_file_qa_state`.`translate_into_el_validation_progress` is not null) then `video_file_qa_state`.`translate_into_el_validation_progress` when (`chapter_qa_state`.`translate_into_el_validation_progress` is not null) then `chapter_qa_state`.`translate_into_el_validation_progress` when (`exercise_qa_state`.`translate_into_el_validation_progress` is not null) then `exercise_qa_state`.`translate_into_el_validation_progress` when (`exam_question_qa_state`.`translate_into_el_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_el_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_el_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_el_validation_progress` when (`slideshow_file_qa_state`.`translate_into_el_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_el_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_el_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_el_validation_progress` when (`text_doc_qa_state`.`translate_into_el_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_el_validation_progress` when (`vector_graphic_qa_state`.`translate_into_el_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_el_validation_progress` when (`data_article_qa_state`.`translate_into_el_validation_progress` is not null) then `data_article_qa_state`.`translate_into_el_validation_progress` when (`data_source_qa_state`.`translate_into_el_validation_progress` is not null) then `data_source_qa_state`.`translate_into_el_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_el_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_el_validation_progress` when (`tool_qa_state`.`translate_into_el_validation_progress` is not null) then `tool_qa_state`.`translate_into_el_validation_progress` when (`gui_section_qa_state`.`translate_into_el_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_el_validation_progress` when (`menu_qa_state`.`translate_into_el_validation_progress` is not null) then `menu_qa_state`.`translate_into_el_validation_progress` when (`page_qa_state`.`translate_into_el_validation_progress` is not null) then `page_qa_state`.`translate_into_el_validation_progress` when (`section_qa_state`.`translate_into_el_validation_progress` is not null) then `section_qa_state`.`translate_into_el_validation_progress` when (`download_link_qa_state`.`translate_into_el_validation_progress` is not null) then `download_link_qa_state`.`translate_into_el_validation_progress` when (`html_chunk_qa_state`.`translate_into_el_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_el_validation_progress` when (`waffle_qa_state`.`translate_into_el_validation_progress` is not null) then `waffle_qa_state`.`translate_into_el_validation_progress` when (`waffle_category_qa_state`.`translate_into_el_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_el_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_el_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_el_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_el_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_el_validation_progress` when (`waffle_unit_qa_state`.`translate_into_el_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_el_validation_progress` when (`waffle_tag_qa_state`.`translate_into_el_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_el_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_el_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_el_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_el_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_el_validation_progress` else NULL end) AS `translate_into_el_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_es_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_es_validation_progress` when (`video_file_qa_state`.`translate_into_es_validation_progress` is not null) then `video_file_qa_state`.`translate_into_es_validation_progress` when (`chapter_qa_state`.`translate_into_es_validation_progress` is not null) then `chapter_qa_state`.`translate_into_es_validation_progress` when (`exercise_qa_state`.`translate_into_es_validation_progress` is not null) then `exercise_qa_state`.`translate_into_es_validation_progress` when (`exam_question_qa_state`.`translate_into_es_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_es_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_es_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_es_validation_progress` when (`slideshow_file_qa_state`.`translate_into_es_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_es_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_es_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_es_validation_progress` when (`text_doc_qa_state`.`translate_into_es_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_es_validation_progress` when (`vector_graphic_qa_state`.`translate_into_es_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_es_validation_progress` when (`data_article_qa_state`.`translate_into_es_validation_progress` is not null) then `data_article_qa_state`.`translate_into_es_validation_progress` when (`data_source_qa_state`.`translate_into_es_validation_progress` is not null) then `data_source_qa_state`.`translate_into_es_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_es_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_es_validation_progress` when (`tool_qa_state`.`translate_into_es_validation_progress` is not null) then `tool_qa_state`.`translate_into_es_validation_progress` when (`gui_section_qa_state`.`translate_into_es_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_es_validation_progress` when (`menu_qa_state`.`translate_into_es_validation_progress` is not null) then `menu_qa_state`.`translate_into_es_validation_progress` when (`page_qa_state`.`translate_into_es_validation_progress` is not null) then `page_qa_state`.`translate_into_es_validation_progress` when (`section_qa_state`.`translate_into_es_validation_progress` is not null) then `section_qa_state`.`translate_into_es_validation_progress` when (`download_link_qa_state`.`translate_into_es_validation_progress` is not null) then `download_link_qa_state`.`translate_into_es_validation_progress` when (`html_chunk_qa_state`.`translate_into_es_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_es_validation_progress` when (`waffle_qa_state`.`translate_into_es_validation_progress` is not null) then `waffle_qa_state`.`translate_into_es_validation_progress` when (`waffle_category_qa_state`.`translate_into_es_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_es_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_es_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_es_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_es_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_es_validation_progress` when (`waffle_unit_qa_state`.`translate_into_es_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_es_validation_progress` when (`waffle_tag_qa_state`.`translate_into_es_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_es_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_es_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_es_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_es_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_es_validation_progress` else NULL end) AS `translate_into_es_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_fa_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_fa_validation_progress` when (`video_file_qa_state`.`translate_into_fa_validation_progress` is not null) then `video_file_qa_state`.`translate_into_fa_validation_progress` when (`chapter_qa_state`.`translate_into_fa_validation_progress` is not null) then `chapter_qa_state`.`translate_into_fa_validation_progress` when (`exercise_qa_state`.`translate_into_fa_validation_progress` is not null) then `exercise_qa_state`.`translate_into_fa_validation_progress` when (`exam_question_qa_state`.`translate_into_fa_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_fa_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_fa_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_fa_validation_progress` when (`slideshow_file_qa_state`.`translate_into_fa_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_fa_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_fa_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_fa_validation_progress` when (`text_doc_qa_state`.`translate_into_fa_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_fa_validation_progress` when (`vector_graphic_qa_state`.`translate_into_fa_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_fa_validation_progress` when (`data_article_qa_state`.`translate_into_fa_validation_progress` is not null) then `data_article_qa_state`.`translate_into_fa_validation_progress` when (`data_source_qa_state`.`translate_into_fa_validation_progress` is not null) then `data_source_qa_state`.`translate_into_fa_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_fa_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_fa_validation_progress` when (`tool_qa_state`.`translate_into_fa_validation_progress` is not null) then `tool_qa_state`.`translate_into_fa_validation_progress` when (`gui_section_qa_state`.`translate_into_fa_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_fa_validation_progress` when (`menu_qa_state`.`translate_into_fa_validation_progress` is not null) then `menu_qa_state`.`translate_into_fa_validation_progress` when (`page_qa_state`.`translate_into_fa_validation_progress` is not null) then `page_qa_state`.`translate_into_fa_validation_progress` when (`section_qa_state`.`translate_into_fa_validation_progress` is not null) then `section_qa_state`.`translate_into_fa_validation_progress` when (`download_link_qa_state`.`translate_into_fa_validation_progress` is not null) then `download_link_qa_state`.`translate_into_fa_validation_progress` when (`html_chunk_qa_state`.`translate_into_fa_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_fa_validation_progress` when (`waffle_qa_state`.`translate_into_fa_validation_progress` is not null) then `waffle_qa_state`.`translate_into_fa_validation_progress` when (`waffle_category_qa_state`.`translate_into_fa_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_fa_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_fa_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_fa_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_fa_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_fa_validation_progress` when (`waffle_unit_qa_state`.`translate_into_fa_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_fa_validation_progress` when (`waffle_tag_qa_state`.`translate_into_fa_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_fa_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_fa_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_fa_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_fa_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_fa_validation_progress` else NULL end) AS `translate_into_fa_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_fi_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_fi_validation_progress` when (`video_file_qa_state`.`translate_into_fi_validation_progress` is not null) then `video_file_qa_state`.`translate_into_fi_validation_progress` when (`chapter_qa_state`.`translate_into_fi_validation_progress` is not null) then `chapter_qa_state`.`translate_into_fi_validation_progress` when (`exercise_qa_state`.`translate_into_fi_validation_progress` is not null) then `exercise_qa_state`.`translate_into_fi_validation_progress` when (`exam_question_qa_state`.`translate_into_fi_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_fi_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_fi_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_fi_validation_progress` when (`slideshow_file_qa_state`.`translate_into_fi_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_fi_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_fi_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_fi_validation_progress` when (`text_doc_qa_state`.`translate_into_fi_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_fi_validation_progress` when (`vector_graphic_qa_state`.`translate_into_fi_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_fi_validation_progress` when (`data_article_qa_state`.`translate_into_fi_validation_progress` is not null) then `data_article_qa_state`.`translate_into_fi_validation_progress` when (`data_source_qa_state`.`translate_into_fi_validation_progress` is not null) then `data_source_qa_state`.`translate_into_fi_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_fi_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_fi_validation_progress` when (`tool_qa_state`.`translate_into_fi_validation_progress` is not null) then `tool_qa_state`.`translate_into_fi_validation_progress` when (`gui_section_qa_state`.`translate_into_fi_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_fi_validation_progress` when (`menu_qa_state`.`translate_into_fi_validation_progress` is not null) then `menu_qa_state`.`translate_into_fi_validation_progress` when (`page_qa_state`.`translate_into_fi_validation_progress` is not null) then `page_qa_state`.`translate_into_fi_validation_progress` when (`section_qa_state`.`translate_into_fi_validation_progress` is not null) then `section_qa_state`.`translate_into_fi_validation_progress` when (`download_link_qa_state`.`translate_into_fi_validation_progress` is not null) then `download_link_qa_state`.`translate_into_fi_validation_progress` when (`html_chunk_qa_state`.`translate_into_fi_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_fi_validation_progress` when (`waffle_qa_state`.`translate_into_fi_validation_progress` is not null) then `waffle_qa_state`.`translate_into_fi_validation_progress` when (`waffle_category_qa_state`.`translate_into_fi_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_fi_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_fi_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_fi_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_fi_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_fi_validation_progress` when (`waffle_unit_qa_state`.`translate_into_fi_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_fi_validation_progress` when (`waffle_tag_qa_state`.`translate_into_fi_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_fi_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_fi_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_fi_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_fi_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_fi_validation_progress` else NULL end) AS `translate_into_fi_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_fil_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_fil_validation_progress` when (`video_file_qa_state`.`translate_into_fil_validation_progress` is not null) then `video_file_qa_state`.`translate_into_fil_validation_progress` when (`chapter_qa_state`.`translate_into_fil_validation_progress` is not null) then `chapter_qa_state`.`translate_into_fil_validation_progress` when (`exercise_qa_state`.`translate_into_fil_validation_progress` is not null) then `exercise_qa_state`.`translate_into_fil_validation_progress` when (`exam_question_qa_state`.`translate_into_fil_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_fil_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_fil_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_fil_validation_progress` when (`slideshow_file_qa_state`.`translate_into_fil_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_fil_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_fil_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_fil_validation_progress` when (`text_doc_qa_state`.`translate_into_fil_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_fil_validation_progress` when (`vector_graphic_qa_state`.`translate_into_fil_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_fil_validation_progress` when (`data_article_qa_state`.`translate_into_fil_validation_progress` is not null) then `data_article_qa_state`.`translate_into_fil_validation_progress` when (`data_source_qa_state`.`translate_into_fil_validation_progress` is not null) then `data_source_qa_state`.`translate_into_fil_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_fil_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_fil_validation_progress` when (`tool_qa_state`.`translate_into_fil_validation_progress` is not null) then `tool_qa_state`.`translate_into_fil_validation_progress` when (`gui_section_qa_state`.`translate_into_fil_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_fil_validation_progress` when (`menu_qa_state`.`translate_into_fil_validation_progress` is not null) then `menu_qa_state`.`translate_into_fil_validation_progress` when (`page_qa_state`.`translate_into_fil_validation_progress` is not null) then `page_qa_state`.`translate_into_fil_validation_progress` when (`section_qa_state`.`translate_into_fil_validation_progress` is not null) then `section_qa_state`.`translate_into_fil_validation_progress` when (`download_link_qa_state`.`translate_into_fil_validation_progress` is not null) then `download_link_qa_state`.`translate_into_fil_validation_progress` when (`html_chunk_qa_state`.`translate_into_fil_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_fil_validation_progress` when (`waffle_qa_state`.`translate_into_fil_validation_progress` is not null) then `waffle_qa_state`.`translate_into_fil_validation_progress` when (`waffle_category_qa_state`.`translate_into_fil_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_fil_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_fil_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_fil_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_fil_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_fil_validation_progress` when (`waffle_unit_qa_state`.`translate_into_fil_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_fil_validation_progress` when (`waffle_tag_qa_state`.`translate_into_fil_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_fil_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_fil_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_fil_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_fil_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_fil_validation_progress` else NULL end) AS `translate_into_fil_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_fr_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_fr_validation_progress` when (`video_file_qa_state`.`translate_into_fr_validation_progress` is not null) then `video_file_qa_state`.`translate_into_fr_validation_progress` when (`chapter_qa_state`.`translate_into_fr_validation_progress` is not null) then `chapter_qa_state`.`translate_into_fr_validation_progress` when (`exercise_qa_state`.`translate_into_fr_validation_progress` is not null) then `exercise_qa_state`.`translate_into_fr_validation_progress` when (`exam_question_qa_state`.`translate_into_fr_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_fr_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_fr_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_fr_validation_progress` when (`slideshow_file_qa_state`.`translate_into_fr_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_fr_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_fr_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_fr_validation_progress` when (`text_doc_qa_state`.`translate_into_fr_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_fr_validation_progress` when (`vector_graphic_qa_state`.`translate_into_fr_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_fr_validation_progress` when (`data_article_qa_state`.`translate_into_fr_validation_progress` is not null) then `data_article_qa_state`.`translate_into_fr_validation_progress` when (`data_source_qa_state`.`translate_into_fr_validation_progress` is not null) then `data_source_qa_state`.`translate_into_fr_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_fr_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_fr_validation_progress` when (`tool_qa_state`.`translate_into_fr_validation_progress` is not null) then `tool_qa_state`.`translate_into_fr_validation_progress` when (`gui_section_qa_state`.`translate_into_fr_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_fr_validation_progress` when (`menu_qa_state`.`translate_into_fr_validation_progress` is not null) then `menu_qa_state`.`translate_into_fr_validation_progress` when (`page_qa_state`.`translate_into_fr_validation_progress` is not null) then `page_qa_state`.`translate_into_fr_validation_progress` when (`section_qa_state`.`translate_into_fr_validation_progress` is not null) then `section_qa_state`.`translate_into_fr_validation_progress` when (`download_link_qa_state`.`translate_into_fr_validation_progress` is not null) then `download_link_qa_state`.`translate_into_fr_validation_progress` when (`html_chunk_qa_state`.`translate_into_fr_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_fr_validation_progress` when (`waffle_qa_state`.`translate_into_fr_validation_progress` is not null) then `waffle_qa_state`.`translate_into_fr_validation_progress` when (`waffle_category_qa_state`.`translate_into_fr_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_fr_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_fr_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_fr_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_fr_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_fr_validation_progress` when (`waffle_unit_qa_state`.`translate_into_fr_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_fr_validation_progress` when (`waffle_tag_qa_state`.`translate_into_fr_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_fr_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_fr_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_fr_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_fr_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_fr_validation_progress` else NULL end) AS `translate_into_fr_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_he_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_he_validation_progress` when (`video_file_qa_state`.`translate_into_he_validation_progress` is not null) then `video_file_qa_state`.`translate_into_he_validation_progress` when (`chapter_qa_state`.`translate_into_he_validation_progress` is not null) then `chapter_qa_state`.`translate_into_he_validation_progress` when (`exercise_qa_state`.`translate_into_he_validation_progress` is not null) then `exercise_qa_state`.`translate_into_he_validation_progress` when (`exam_question_qa_state`.`translate_into_he_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_he_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_he_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_he_validation_progress` when (`slideshow_file_qa_state`.`translate_into_he_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_he_validation_progress` when (`text_doc_qa_state`.`translate_into_he_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_he_validation_progress` when (`vector_graphic_qa_state`.`translate_into_he_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_he_validation_progress` when (`data_article_qa_state`.`translate_into_he_validation_progress` is not null) then `data_article_qa_state`.`translate_into_he_validation_progress` when (`data_source_qa_state`.`translate_into_he_validation_progress` is not null) then `data_source_qa_state`.`translate_into_he_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_he_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_he_validation_progress` when (`tool_qa_state`.`translate_into_he_validation_progress` is not null) then `tool_qa_state`.`translate_into_he_validation_progress` when (`menu_qa_state`.`translate_into_he_validation_progress` is not null) then `menu_qa_state`.`translate_into_he_validation_progress` when (`page_qa_state`.`translate_into_he_validation_progress` is not null) then `page_qa_state`.`translate_into_he_validation_progress` when (`section_qa_state`.`translate_into_he_validation_progress` is not null) then `section_qa_state`.`translate_into_he_validation_progress` when (`waffle_qa_state`.`translate_into_he_validation_progress` is not null) then `waffle_qa_state`.`translate_into_he_validation_progress` else NULL end) AS `translate_into_he_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_hi_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_hi_validation_progress` when (`video_file_qa_state`.`translate_into_hi_validation_progress` is not null) then `video_file_qa_state`.`translate_into_hi_validation_progress` when (`chapter_qa_state`.`translate_into_hi_validation_progress` is not null) then `chapter_qa_state`.`translate_into_hi_validation_progress` when (`exercise_qa_state`.`translate_into_hi_validation_progress` is not null) then `exercise_qa_state`.`translate_into_hi_validation_progress` when (`exam_question_qa_state`.`translate_into_hi_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_hi_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_hi_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_hi_validation_progress` when (`slideshow_file_qa_state`.`translate_into_hi_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_hi_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_hi_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_hi_validation_progress` when (`text_doc_qa_state`.`translate_into_hi_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_hi_validation_progress` when (`vector_graphic_qa_state`.`translate_into_hi_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_hi_validation_progress` when (`data_article_qa_state`.`translate_into_hi_validation_progress` is not null) then `data_article_qa_state`.`translate_into_hi_validation_progress` when (`data_source_qa_state`.`translate_into_hi_validation_progress` is not null) then `data_source_qa_state`.`translate_into_hi_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_hi_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_hi_validation_progress` when (`tool_qa_state`.`translate_into_hi_validation_progress` is not null) then `tool_qa_state`.`translate_into_hi_validation_progress` when (`gui_section_qa_state`.`translate_into_hi_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_hi_validation_progress` when (`menu_qa_state`.`translate_into_hi_validation_progress` is not null) then `menu_qa_state`.`translate_into_hi_validation_progress` when (`page_qa_state`.`translate_into_hi_validation_progress` is not null) then `page_qa_state`.`translate_into_hi_validation_progress` when (`section_qa_state`.`translate_into_hi_validation_progress` is not null) then `section_qa_state`.`translate_into_hi_validation_progress` when (`download_link_qa_state`.`translate_into_hi_validation_progress` is not null) then `download_link_qa_state`.`translate_into_hi_validation_progress` when (`html_chunk_qa_state`.`translate_into_hi_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_hi_validation_progress` when (`waffle_qa_state`.`translate_into_hi_validation_progress` is not null) then `waffle_qa_state`.`translate_into_hi_validation_progress` when (`waffle_category_qa_state`.`translate_into_hi_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_hi_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_hi_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_hi_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_hi_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_hi_validation_progress` when (`waffle_unit_qa_state`.`translate_into_hi_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_hi_validation_progress` when (`waffle_tag_qa_state`.`translate_into_hi_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_hi_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_hi_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_hi_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_hi_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_hi_validation_progress` else NULL end) AS `translate_into_hi_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_hr_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_hr_validation_progress` when (`video_file_qa_state`.`translate_into_hr_validation_progress` is not null) then `video_file_qa_state`.`translate_into_hr_validation_progress` when (`chapter_qa_state`.`translate_into_hr_validation_progress` is not null) then `chapter_qa_state`.`translate_into_hr_validation_progress` when (`exercise_qa_state`.`translate_into_hr_validation_progress` is not null) then `exercise_qa_state`.`translate_into_hr_validation_progress` when (`exam_question_qa_state`.`translate_into_hr_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_hr_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_hr_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_hr_validation_progress` when (`slideshow_file_qa_state`.`translate_into_hr_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_hr_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_hr_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_hr_validation_progress` when (`text_doc_qa_state`.`translate_into_hr_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_hr_validation_progress` when (`vector_graphic_qa_state`.`translate_into_hr_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_hr_validation_progress` when (`data_article_qa_state`.`translate_into_hr_validation_progress` is not null) then `data_article_qa_state`.`translate_into_hr_validation_progress` when (`data_source_qa_state`.`translate_into_hr_validation_progress` is not null) then `data_source_qa_state`.`translate_into_hr_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_hr_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_hr_validation_progress` when (`tool_qa_state`.`translate_into_hr_validation_progress` is not null) then `tool_qa_state`.`translate_into_hr_validation_progress` when (`gui_section_qa_state`.`translate_into_hr_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_hr_validation_progress` when (`menu_qa_state`.`translate_into_hr_validation_progress` is not null) then `menu_qa_state`.`translate_into_hr_validation_progress` when (`page_qa_state`.`translate_into_hr_validation_progress` is not null) then `page_qa_state`.`translate_into_hr_validation_progress` when (`section_qa_state`.`translate_into_hr_validation_progress` is not null) then `section_qa_state`.`translate_into_hr_validation_progress` when (`download_link_qa_state`.`translate_into_hr_validation_progress` is not null) then `download_link_qa_state`.`translate_into_hr_validation_progress` when (`html_chunk_qa_state`.`translate_into_hr_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_hr_validation_progress` when (`waffle_qa_state`.`translate_into_hr_validation_progress` is not null) then `waffle_qa_state`.`translate_into_hr_validation_progress` when (`waffle_category_qa_state`.`translate_into_hr_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_hr_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_hr_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_hr_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_hr_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_hr_validation_progress` when (`waffle_unit_qa_state`.`translate_into_hr_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_hr_validation_progress` when (`waffle_tag_qa_state`.`translate_into_hr_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_hr_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_hr_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_hr_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_hr_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_hr_validation_progress` else NULL end) AS `translate_into_hr_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_hu_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_hu_validation_progress` when (`video_file_qa_state`.`translate_into_hu_validation_progress` is not null) then `video_file_qa_state`.`translate_into_hu_validation_progress` when (`chapter_qa_state`.`translate_into_hu_validation_progress` is not null) then `chapter_qa_state`.`translate_into_hu_validation_progress` when (`exercise_qa_state`.`translate_into_hu_validation_progress` is not null) then `exercise_qa_state`.`translate_into_hu_validation_progress` when (`exam_question_qa_state`.`translate_into_hu_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_hu_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_hu_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_hu_validation_progress` when (`slideshow_file_qa_state`.`translate_into_hu_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_hu_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_hu_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_hu_validation_progress` when (`text_doc_qa_state`.`translate_into_hu_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_hu_validation_progress` when (`vector_graphic_qa_state`.`translate_into_hu_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_hu_validation_progress` when (`data_article_qa_state`.`translate_into_hu_validation_progress` is not null) then `data_article_qa_state`.`translate_into_hu_validation_progress` when (`data_source_qa_state`.`translate_into_hu_validation_progress` is not null) then `data_source_qa_state`.`translate_into_hu_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_hu_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_hu_validation_progress` when (`tool_qa_state`.`translate_into_hu_validation_progress` is not null) then `tool_qa_state`.`translate_into_hu_validation_progress` when (`gui_section_qa_state`.`translate_into_hu_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_hu_validation_progress` when (`menu_qa_state`.`translate_into_hu_validation_progress` is not null) then `menu_qa_state`.`translate_into_hu_validation_progress` when (`page_qa_state`.`translate_into_hu_validation_progress` is not null) then `page_qa_state`.`translate_into_hu_validation_progress` when (`section_qa_state`.`translate_into_hu_validation_progress` is not null) then `section_qa_state`.`translate_into_hu_validation_progress` when (`download_link_qa_state`.`translate_into_hu_validation_progress` is not null) then `download_link_qa_state`.`translate_into_hu_validation_progress` when (`html_chunk_qa_state`.`translate_into_hu_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_hu_validation_progress` when (`waffle_qa_state`.`translate_into_hu_validation_progress` is not null) then `waffle_qa_state`.`translate_into_hu_validation_progress` when (`waffle_category_qa_state`.`translate_into_hu_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_hu_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_hu_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_hu_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_hu_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_hu_validation_progress` when (`waffle_unit_qa_state`.`translate_into_hu_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_hu_validation_progress` when (`waffle_tag_qa_state`.`translate_into_hu_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_hu_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_hu_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_hu_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_hu_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_hu_validation_progress` else NULL end) AS `translate_into_hu_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_id_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_id_validation_progress` when (`video_file_qa_state`.`translate_into_id_validation_progress` is not null) then `video_file_qa_state`.`translate_into_id_validation_progress` when (`chapter_qa_state`.`translate_into_id_validation_progress` is not null) then `chapter_qa_state`.`translate_into_id_validation_progress` when (`exercise_qa_state`.`translate_into_id_validation_progress` is not null) then `exercise_qa_state`.`translate_into_id_validation_progress` when (`exam_question_qa_state`.`translate_into_id_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_id_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_id_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_id_validation_progress` when (`slideshow_file_qa_state`.`translate_into_id_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_id_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_id_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_id_validation_progress` when (`text_doc_qa_state`.`translate_into_id_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_id_validation_progress` when (`vector_graphic_qa_state`.`translate_into_id_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_id_validation_progress` when (`data_article_qa_state`.`translate_into_id_validation_progress` is not null) then `data_article_qa_state`.`translate_into_id_validation_progress` when (`data_source_qa_state`.`translate_into_id_validation_progress` is not null) then `data_source_qa_state`.`translate_into_id_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_id_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_id_validation_progress` when (`tool_qa_state`.`translate_into_id_validation_progress` is not null) then `tool_qa_state`.`translate_into_id_validation_progress` when (`gui_section_qa_state`.`translate_into_id_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_id_validation_progress` when (`menu_qa_state`.`translate_into_id_validation_progress` is not null) then `menu_qa_state`.`translate_into_id_validation_progress` when (`page_qa_state`.`translate_into_id_validation_progress` is not null) then `page_qa_state`.`translate_into_id_validation_progress` when (`section_qa_state`.`translate_into_id_validation_progress` is not null) then `section_qa_state`.`translate_into_id_validation_progress` when (`download_link_qa_state`.`translate_into_id_validation_progress` is not null) then `download_link_qa_state`.`translate_into_id_validation_progress` when (`html_chunk_qa_state`.`translate_into_id_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_id_validation_progress` when (`waffle_qa_state`.`translate_into_id_validation_progress` is not null) then `waffle_qa_state`.`translate_into_id_validation_progress` when (`waffle_category_qa_state`.`translate_into_id_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_id_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_id_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_id_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_id_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_id_validation_progress` when (`waffle_unit_qa_state`.`translate_into_id_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_id_validation_progress` when (`waffle_tag_qa_state`.`translate_into_id_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_id_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_id_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_id_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_id_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_id_validation_progress` else NULL end) AS `translate_into_id_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_it_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_it_validation_progress` when (`video_file_qa_state`.`translate_into_it_validation_progress` is not null) then `video_file_qa_state`.`translate_into_it_validation_progress` when (`chapter_qa_state`.`translate_into_it_validation_progress` is not null) then `chapter_qa_state`.`translate_into_it_validation_progress` when (`exercise_qa_state`.`translate_into_it_validation_progress` is not null) then `exercise_qa_state`.`translate_into_it_validation_progress` when (`exam_question_qa_state`.`translate_into_it_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_it_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_it_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_it_validation_progress` when (`slideshow_file_qa_state`.`translate_into_it_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_it_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_it_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_it_validation_progress` when (`text_doc_qa_state`.`translate_into_it_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_it_validation_progress` when (`vector_graphic_qa_state`.`translate_into_it_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_it_validation_progress` when (`data_article_qa_state`.`translate_into_it_validation_progress` is not null) then `data_article_qa_state`.`translate_into_it_validation_progress` when (`data_source_qa_state`.`translate_into_it_validation_progress` is not null) then `data_source_qa_state`.`translate_into_it_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_it_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_it_validation_progress` when (`tool_qa_state`.`translate_into_it_validation_progress` is not null) then `tool_qa_state`.`translate_into_it_validation_progress` when (`gui_section_qa_state`.`translate_into_it_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_it_validation_progress` when (`menu_qa_state`.`translate_into_it_validation_progress` is not null) then `menu_qa_state`.`translate_into_it_validation_progress` when (`page_qa_state`.`translate_into_it_validation_progress` is not null) then `page_qa_state`.`translate_into_it_validation_progress` when (`section_qa_state`.`translate_into_it_validation_progress` is not null) then `section_qa_state`.`translate_into_it_validation_progress` when (`download_link_qa_state`.`translate_into_it_validation_progress` is not null) then `download_link_qa_state`.`translate_into_it_validation_progress` when (`html_chunk_qa_state`.`translate_into_it_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_it_validation_progress` when (`waffle_qa_state`.`translate_into_it_validation_progress` is not null) then `waffle_qa_state`.`translate_into_it_validation_progress` when (`waffle_category_qa_state`.`translate_into_it_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_it_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_it_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_it_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_it_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_it_validation_progress` when (`waffle_unit_qa_state`.`translate_into_it_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_it_validation_progress` when (`waffle_tag_qa_state`.`translate_into_it_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_it_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_it_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_it_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_it_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_it_validation_progress` else NULL end) AS `translate_into_it_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_ja_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_ja_validation_progress` when (`video_file_qa_state`.`translate_into_ja_validation_progress` is not null) then `video_file_qa_state`.`translate_into_ja_validation_progress` when (`chapter_qa_state`.`translate_into_ja_validation_progress` is not null) then `chapter_qa_state`.`translate_into_ja_validation_progress` when (`exercise_qa_state`.`translate_into_ja_validation_progress` is not null) then `exercise_qa_state`.`translate_into_ja_validation_progress` when (`exam_question_qa_state`.`translate_into_ja_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_ja_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_ja_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_ja_validation_progress` when (`slideshow_file_qa_state`.`translate_into_ja_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_ja_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_ja_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_ja_validation_progress` when (`text_doc_qa_state`.`translate_into_ja_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_ja_validation_progress` when (`vector_graphic_qa_state`.`translate_into_ja_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_ja_validation_progress` when (`data_article_qa_state`.`translate_into_ja_validation_progress` is not null) then `data_article_qa_state`.`translate_into_ja_validation_progress` when (`data_source_qa_state`.`translate_into_ja_validation_progress` is not null) then `data_source_qa_state`.`translate_into_ja_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_ja_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_ja_validation_progress` when (`tool_qa_state`.`translate_into_ja_validation_progress` is not null) then `tool_qa_state`.`translate_into_ja_validation_progress` when (`gui_section_qa_state`.`translate_into_ja_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_ja_validation_progress` when (`menu_qa_state`.`translate_into_ja_validation_progress` is not null) then `menu_qa_state`.`translate_into_ja_validation_progress` when (`page_qa_state`.`translate_into_ja_validation_progress` is not null) then `page_qa_state`.`translate_into_ja_validation_progress` when (`section_qa_state`.`translate_into_ja_validation_progress` is not null) then `section_qa_state`.`translate_into_ja_validation_progress` when (`download_link_qa_state`.`translate_into_ja_validation_progress` is not null) then `download_link_qa_state`.`translate_into_ja_validation_progress` when (`html_chunk_qa_state`.`translate_into_ja_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_ja_validation_progress` when (`waffle_qa_state`.`translate_into_ja_validation_progress` is not null) then `waffle_qa_state`.`translate_into_ja_validation_progress` when (`waffle_category_qa_state`.`translate_into_ja_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_ja_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_ja_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_ja_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_ja_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_ja_validation_progress` when (`waffle_unit_qa_state`.`translate_into_ja_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_ja_validation_progress` when (`waffle_tag_qa_state`.`translate_into_ja_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_ja_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_ja_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_ja_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_ja_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_ja_validation_progress` else NULL end) AS `translate_into_ja_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_ko_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_ko_validation_progress` when (`video_file_qa_state`.`translate_into_ko_validation_progress` is not null) then `video_file_qa_state`.`translate_into_ko_validation_progress` when (`chapter_qa_state`.`translate_into_ko_validation_progress` is not null) then `chapter_qa_state`.`translate_into_ko_validation_progress` when (`exercise_qa_state`.`translate_into_ko_validation_progress` is not null) then `exercise_qa_state`.`translate_into_ko_validation_progress` when (`exam_question_qa_state`.`translate_into_ko_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_ko_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_ko_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_ko_validation_progress` when (`slideshow_file_qa_state`.`translate_into_ko_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_ko_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_ko_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_ko_validation_progress` when (`text_doc_qa_state`.`translate_into_ko_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_ko_validation_progress` when (`vector_graphic_qa_state`.`translate_into_ko_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_ko_validation_progress` when (`data_article_qa_state`.`translate_into_ko_validation_progress` is not null) then `data_article_qa_state`.`translate_into_ko_validation_progress` when (`data_source_qa_state`.`translate_into_ko_validation_progress` is not null) then `data_source_qa_state`.`translate_into_ko_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_ko_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_ko_validation_progress` when (`tool_qa_state`.`translate_into_ko_validation_progress` is not null) then `tool_qa_state`.`translate_into_ko_validation_progress` when (`gui_section_qa_state`.`translate_into_ko_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_ko_validation_progress` when (`menu_qa_state`.`translate_into_ko_validation_progress` is not null) then `menu_qa_state`.`translate_into_ko_validation_progress` when (`page_qa_state`.`translate_into_ko_validation_progress` is not null) then `page_qa_state`.`translate_into_ko_validation_progress` when (`section_qa_state`.`translate_into_ko_validation_progress` is not null) then `section_qa_state`.`translate_into_ko_validation_progress` when (`download_link_qa_state`.`translate_into_ko_validation_progress` is not null) then `download_link_qa_state`.`translate_into_ko_validation_progress` when (`html_chunk_qa_state`.`translate_into_ko_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_ko_validation_progress` when (`waffle_qa_state`.`translate_into_ko_validation_progress` is not null) then `waffle_qa_state`.`translate_into_ko_validation_progress` when (`waffle_category_qa_state`.`translate_into_ko_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_ko_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_ko_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_ko_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_ko_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_ko_validation_progress` when (`waffle_unit_qa_state`.`translate_into_ko_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_ko_validation_progress` when (`waffle_tag_qa_state`.`translate_into_ko_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_ko_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_ko_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_ko_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_ko_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_ko_validation_progress` else NULL end) AS `translate_into_ko_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_lt_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_lt_validation_progress` when (`video_file_qa_state`.`translate_into_lt_validation_progress` is not null) then `video_file_qa_state`.`translate_into_lt_validation_progress` when (`chapter_qa_state`.`translate_into_lt_validation_progress` is not null) then `chapter_qa_state`.`translate_into_lt_validation_progress` when (`exercise_qa_state`.`translate_into_lt_validation_progress` is not null) then `exercise_qa_state`.`translate_into_lt_validation_progress` when (`exam_question_qa_state`.`translate_into_lt_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_lt_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_lt_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_lt_validation_progress` when (`slideshow_file_qa_state`.`translate_into_lt_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_lt_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_lt_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_lt_validation_progress` when (`text_doc_qa_state`.`translate_into_lt_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_lt_validation_progress` when (`vector_graphic_qa_state`.`translate_into_lt_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_lt_validation_progress` when (`data_article_qa_state`.`translate_into_lt_validation_progress` is not null) then `data_article_qa_state`.`translate_into_lt_validation_progress` when (`data_source_qa_state`.`translate_into_lt_validation_progress` is not null) then `data_source_qa_state`.`translate_into_lt_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_lt_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_lt_validation_progress` when (`tool_qa_state`.`translate_into_lt_validation_progress` is not null) then `tool_qa_state`.`translate_into_lt_validation_progress` when (`gui_section_qa_state`.`translate_into_lt_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_lt_validation_progress` when (`menu_qa_state`.`translate_into_lt_validation_progress` is not null) then `menu_qa_state`.`translate_into_lt_validation_progress` when (`page_qa_state`.`translate_into_lt_validation_progress` is not null) then `page_qa_state`.`translate_into_lt_validation_progress` when (`section_qa_state`.`translate_into_lt_validation_progress` is not null) then `section_qa_state`.`translate_into_lt_validation_progress` when (`download_link_qa_state`.`translate_into_lt_validation_progress` is not null) then `download_link_qa_state`.`translate_into_lt_validation_progress` when (`html_chunk_qa_state`.`translate_into_lt_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_lt_validation_progress` when (`waffle_qa_state`.`translate_into_lt_validation_progress` is not null) then `waffle_qa_state`.`translate_into_lt_validation_progress` when (`waffle_category_qa_state`.`translate_into_lt_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_lt_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_lt_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_lt_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_lt_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_lt_validation_progress` when (`waffle_unit_qa_state`.`translate_into_lt_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_lt_validation_progress` when (`waffle_tag_qa_state`.`translate_into_lt_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_lt_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_lt_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_lt_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_lt_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_lt_validation_progress` else NULL end) AS `translate_into_lt_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_lv_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_lv_validation_progress` when (`video_file_qa_state`.`translate_into_lv_validation_progress` is not null) then `video_file_qa_state`.`translate_into_lv_validation_progress` when (`chapter_qa_state`.`translate_into_lv_validation_progress` is not null) then `chapter_qa_state`.`translate_into_lv_validation_progress` when (`exercise_qa_state`.`translate_into_lv_validation_progress` is not null) then `exercise_qa_state`.`translate_into_lv_validation_progress` when (`exam_question_qa_state`.`translate_into_lv_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_lv_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_lv_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_lv_validation_progress` when (`slideshow_file_qa_state`.`translate_into_lv_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_lv_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_lv_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_lv_validation_progress` when (`text_doc_qa_state`.`translate_into_lv_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_lv_validation_progress` when (`vector_graphic_qa_state`.`translate_into_lv_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_lv_validation_progress` when (`data_article_qa_state`.`translate_into_lv_validation_progress` is not null) then `data_article_qa_state`.`translate_into_lv_validation_progress` when (`data_source_qa_state`.`translate_into_lv_validation_progress` is not null) then `data_source_qa_state`.`translate_into_lv_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_lv_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_lv_validation_progress` when (`tool_qa_state`.`translate_into_lv_validation_progress` is not null) then `tool_qa_state`.`translate_into_lv_validation_progress` when (`gui_section_qa_state`.`translate_into_lv_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_lv_validation_progress` when (`menu_qa_state`.`translate_into_lv_validation_progress` is not null) then `menu_qa_state`.`translate_into_lv_validation_progress` when (`page_qa_state`.`translate_into_lv_validation_progress` is not null) then `page_qa_state`.`translate_into_lv_validation_progress` when (`section_qa_state`.`translate_into_lv_validation_progress` is not null) then `section_qa_state`.`translate_into_lv_validation_progress` when (`download_link_qa_state`.`translate_into_lv_validation_progress` is not null) then `download_link_qa_state`.`translate_into_lv_validation_progress` when (`html_chunk_qa_state`.`translate_into_lv_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_lv_validation_progress` when (`waffle_qa_state`.`translate_into_lv_validation_progress` is not null) then `waffle_qa_state`.`translate_into_lv_validation_progress` when (`waffle_category_qa_state`.`translate_into_lv_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_lv_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_lv_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_lv_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_lv_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_lv_validation_progress` when (`waffle_unit_qa_state`.`translate_into_lv_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_lv_validation_progress` when (`waffle_tag_qa_state`.`translate_into_lv_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_lv_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_lv_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_lv_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_lv_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_lv_validation_progress` else NULL end) AS `translate_into_lv_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_nl_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_nl_validation_progress` when (`video_file_qa_state`.`translate_into_nl_validation_progress` is not null) then `video_file_qa_state`.`translate_into_nl_validation_progress` when (`chapter_qa_state`.`translate_into_nl_validation_progress` is not null) then `chapter_qa_state`.`translate_into_nl_validation_progress` when (`exercise_qa_state`.`translate_into_nl_validation_progress` is not null) then `exercise_qa_state`.`translate_into_nl_validation_progress` when (`exam_question_qa_state`.`translate_into_nl_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_nl_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_nl_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_nl_validation_progress` when (`slideshow_file_qa_state`.`translate_into_nl_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_nl_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_nl_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_nl_validation_progress` when (`text_doc_qa_state`.`translate_into_nl_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_nl_validation_progress` when (`vector_graphic_qa_state`.`translate_into_nl_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_nl_validation_progress` when (`data_article_qa_state`.`translate_into_nl_validation_progress` is not null) then `data_article_qa_state`.`translate_into_nl_validation_progress` when (`data_source_qa_state`.`translate_into_nl_validation_progress` is not null) then `data_source_qa_state`.`translate_into_nl_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_nl_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_nl_validation_progress` when (`tool_qa_state`.`translate_into_nl_validation_progress` is not null) then `tool_qa_state`.`translate_into_nl_validation_progress` when (`gui_section_qa_state`.`translate_into_nl_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_nl_validation_progress` when (`menu_qa_state`.`translate_into_nl_validation_progress` is not null) then `menu_qa_state`.`translate_into_nl_validation_progress` when (`page_qa_state`.`translate_into_nl_validation_progress` is not null) then `page_qa_state`.`translate_into_nl_validation_progress` when (`section_qa_state`.`translate_into_nl_validation_progress` is not null) then `section_qa_state`.`translate_into_nl_validation_progress` when (`download_link_qa_state`.`translate_into_nl_validation_progress` is not null) then `download_link_qa_state`.`translate_into_nl_validation_progress` when (`html_chunk_qa_state`.`translate_into_nl_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_nl_validation_progress` when (`waffle_qa_state`.`translate_into_nl_validation_progress` is not null) then `waffle_qa_state`.`translate_into_nl_validation_progress` when (`waffle_category_qa_state`.`translate_into_nl_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_nl_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_nl_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_nl_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_nl_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_nl_validation_progress` when (`waffle_unit_qa_state`.`translate_into_nl_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_nl_validation_progress` when (`waffle_tag_qa_state`.`translate_into_nl_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_nl_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_nl_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_nl_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_nl_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_nl_validation_progress` else NULL end) AS `translate_into_nl_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_no_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_no_validation_progress` when (`video_file_qa_state`.`translate_into_no_validation_progress` is not null) then `video_file_qa_state`.`translate_into_no_validation_progress` when (`chapter_qa_state`.`translate_into_no_validation_progress` is not null) then `chapter_qa_state`.`translate_into_no_validation_progress` when (`exercise_qa_state`.`translate_into_no_validation_progress` is not null) then `exercise_qa_state`.`translate_into_no_validation_progress` when (`exam_question_qa_state`.`translate_into_no_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_no_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_no_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_no_validation_progress` when (`slideshow_file_qa_state`.`translate_into_no_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_no_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_no_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_no_validation_progress` when (`text_doc_qa_state`.`translate_into_no_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_no_validation_progress` when (`vector_graphic_qa_state`.`translate_into_no_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_no_validation_progress` when (`data_article_qa_state`.`translate_into_no_validation_progress` is not null) then `data_article_qa_state`.`translate_into_no_validation_progress` when (`data_source_qa_state`.`translate_into_no_validation_progress` is not null) then `data_source_qa_state`.`translate_into_no_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_no_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_no_validation_progress` when (`tool_qa_state`.`translate_into_no_validation_progress` is not null) then `tool_qa_state`.`translate_into_no_validation_progress` when (`gui_section_qa_state`.`translate_into_no_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_no_validation_progress` when (`menu_qa_state`.`translate_into_no_validation_progress` is not null) then `menu_qa_state`.`translate_into_no_validation_progress` when (`page_qa_state`.`translate_into_no_validation_progress` is not null) then `page_qa_state`.`translate_into_no_validation_progress` when (`section_qa_state`.`translate_into_no_validation_progress` is not null) then `section_qa_state`.`translate_into_no_validation_progress` when (`download_link_qa_state`.`translate_into_no_validation_progress` is not null) then `download_link_qa_state`.`translate_into_no_validation_progress` when (`html_chunk_qa_state`.`translate_into_no_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_no_validation_progress` when (`waffle_qa_state`.`translate_into_no_validation_progress` is not null) then `waffle_qa_state`.`translate_into_no_validation_progress` when (`waffle_category_qa_state`.`translate_into_no_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_no_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_no_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_no_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_no_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_no_validation_progress` when (`waffle_unit_qa_state`.`translate_into_no_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_no_validation_progress` when (`waffle_tag_qa_state`.`translate_into_no_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_no_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_no_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_no_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_no_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_no_validation_progress` else NULL end) AS `translate_into_no_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_pl_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_pl_validation_progress` when (`video_file_qa_state`.`translate_into_pl_validation_progress` is not null) then `video_file_qa_state`.`translate_into_pl_validation_progress` when (`chapter_qa_state`.`translate_into_pl_validation_progress` is not null) then `chapter_qa_state`.`translate_into_pl_validation_progress` when (`exercise_qa_state`.`translate_into_pl_validation_progress` is not null) then `exercise_qa_state`.`translate_into_pl_validation_progress` when (`exam_question_qa_state`.`translate_into_pl_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_pl_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_pl_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_pl_validation_progress` when (`slideshow_file_qa_state`.`translate_into_pl_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_pl_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_pl_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_pl_validation_progress` when (`text_doc_qa_state`.`translate_into_pl_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_pl_validation_progress` when (`vector_graphic_qa_state`.`translate_into_pl_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_pl_validation_progress` when (`data_article_qa_state`.`translate_into_pl_validation_progress` is not null) then `data_article_qa_state`.`translate_into_pl_validation_progress` when (`data_source_qa_state`.`translate_into_pl_validation_progress` is not null) then `data_source_qa_state`.`translate_into_pl_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_pl_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_pl_validation_progress` when (`tool_qa_state`.`translate_into_pl_validation_progress` is not null) then `tool_qa_state`.`translate_into_pl_validation_progress` when (`gui_section_qa_state`.`translate_into_pl_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_pl_validation_progress` when (`menu_qa_state`.`translate_into_pl_validation_progress` is not null) then `menu_qa_state`.`translate_into_pl_validation_progress` when (`page_qa_state`.`translate_into_pl_validation_progress` is not null) then `page_qa_state`.`translate_into_pl_validation_progress` when (`section_qa_state`.`translate_into_pl_validation_progress` is not null) then `section_qa_state`.`translate_into_pl_validation_progress` when (`download_link_qa_state`.`translate_into_pl_validation_progress` is not null) then `download_link_qa_state`.`translate_into_pl_validation_progress` when (`html_chunk_qa_state`.`translate_into_pl_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_pl_validation_progress` when (`waffle_qa_state`.`translate_into_pl_validation_progress` is not null) then `waffle_qa_state`.`translate_into_pl_validation_progress` when (`waffle_category_qa_state`.`translate_into_pl_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_pl_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_pl_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_pl_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_pl_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_pl_validation_progress` when (`waffle_unit_qa_state`.`translate_into_pl_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_pl_validation_progress` when (`waffle_tag_qa_state`.`translate_into_pl_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_pl_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_pl_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_pl_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_pl_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_pl_validation_progress` else NULL end) AS `translate_into_pl_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_pt_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_pt_validation_progress` when (`video_file_qa_state`.`translate_into_pt_validation_progress` is not null) then `video_file_qa_state`.`translate_into_pt_validation_progress` when (`chapter_qa_state`.`translate_into_pt_validation_progress` is not null) then `chapter_qa_state`.`translate_into_pt_validation_progress` when (`exercise_qa_state`.`translate_into_pt_validation_progress` is not null) then `exercise_qa_state`.`translate_into_pt_validation_progress` when (`exam_question_qa_state`.`translate_into_pt_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_pt_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_pt_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_pt_validation_progress` when (`slideshow_file_qa_state`.`translate_into_pt_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_pt_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_pt_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_pt_validation_progress` when (`text_doc_qa_state`.`translate_into_pt_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_pt_validation_progress` when (`vector_graphic_qa_state`.`translate_into_pt_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_pt_validation_progress` when (`data_article_qa_state`.`translate_into_pt_validation_progress` is not null) then `data_article_qa_state`.`translate_into_pt_validation_progress` when (`data_source_qa_state`.`translate_into_pt_validation_progress` is not null) then `data_source_qa_state`.`translate_into_pt_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_pt_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_pt_validation_progress` when (`tool_qa_state`.`translate_into_pt_validation_progress` is not null) then `tool_qa_state`.`translate_into_pt_validation_progress` when (`gui_section_qa_state`.`translate_into_pt_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_pt_validation_progress` when (`menu_qa_state`.`translate_into_pt_validation_progress` is not null) then `menu_qa_state`.`translate_into_pt_validation_progress` when (`page_qa_state`.`translate_into_pt_validation_progress` is not null) then `page_qa_state`.`translate_into_pt_validation_progress` when (`section_qa_state`.`translate_into_pt_validation_progress` is not null) then `section_qa_state`.`translate_into_pt_validation_progress` when (`download_link_qa_state`.`translate_into_pt_validation_progress` is not null) then `download_link_qa_state`.`translate_into_pt_validation_progress` when (`html_chunk_qa_state`.`translate_into_pt_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_pt_validation_progress` when (`waffle_qa_state`.`translate_into_pt_validation_progress` is not null) then `waffle_qa_state`.`translate_into_pt_validation_progress` when (`waffle_category_qa_state`.`translate_into_pt_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_pt_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_pt_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_pt_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_pt_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_pt_validation_progress` when (`waffle_unit_qa_state`.`translate_into_pt_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_pt_validation_progress` when (`waffle_tag_qa_state`.`translate_into_pt_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_pt_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_pt_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_pt_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_pt_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_pt_validation_progress` else NULL end) AS `translate_into_pt_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_pt_br_validation_progress` when (`video_file_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `video_file_qa_state`.`translate_into_pt_br_validation_progress` when (`chapter_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `chapter_qa_state`.`translate_into_pt_br_validation_progress` when (`exercise_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `exercise_qa_state`.`translate_into_pt_br_validation_progress` when (`exam_question_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_pt_br_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_pt_br_validation_progress` when (`slideshow_file_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_pt_br_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_pt_br_validation_progress` when (`text_doc_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_pt_br_validation_progress` when (`vector_graphic_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_pt_br_validation_progress` when (`data_article_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `data_article_qa_state`.`translate_into_pt_br_validation_progress` when (`data_source_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `data_source_qa_state`.`translate_into_pt_br_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_pt_br_validation_progress` when (`tool_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `tool_qa_state`.`translate_into_pt_br_validation_progress` when (`gui_section_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_pt_br_validation_progress` when (`menu_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `menu_qa_state`.`translate_into_pt_br_validation_progress` when (`page_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `page_qa_state`.`translate_into_pt_br_validation_progress` when (`section_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `section_qa_state`.`translate_into_pt_br_validation_progress` when (`download_link_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `download_link_qa_state`.`translate_into_pt_br_validation_progress` when (`html_chunk_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_pt_br_validation_progress` when (`waffle_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `waffle_qa_state`.`translate_into_pt_br_validation_progress` when (`waffle_category_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_pt_br_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_pt_br_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_pt_br_validation_progress` when (`waffle_unit_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_pt_br_validation_progress` when (`waffle_tag_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_pt_br_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_pt_br_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_pt_br_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_pt_br_validation_progress` else NULL end) AS `translate_into_pt_br_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_pt_pt_validation_progress` when (`video_file_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `video_file_qa_state`.`translate_into_pt_pt_validation_progress` when (`chapter_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `chapter_qa_state`.`translate_into_pt_pt_validation_progress` when (`exercise_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `exercise_qa_state`.`translate_into_pt_pt_validation_progress` when (`exam_question_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_pt_pt_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_pt_pt_validation_progress` when (`slideshow_file_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_pt_pt_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_pt_pt_validation_progress` when (`text_doc_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_pt_pt_validation_progress` when (`vector_graphic_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_pt_pt_validation_progress` when (`data_article_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `data_article_qa_state`.`translate_into_pt_pt_validation_progress` when (`data_source_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `data_source_qa_state`.`translate_into_pt_pt_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_pt_pt_validation_progress` when (`tool_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `tool_qa_state`.`translate_into_pt_pt_validation_progress` when (`gui_section_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_pt_pt_validation_progress` when (`menu_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `menu_qa_state`.`translate_into_pt_pt_validation_progress` when (`page_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `page_qa_state`.`translate_into_pt_pt_validation_progress` when (`section_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `section_qa_state`.`translate_into_pt_pt_validation_progress` when (`download_link_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `download_link_qa_state`.`translate_into_pt_pt_validation_progress` when (`html_chunk_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_pt_pt_validation_progress` when (`waffle_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `waffle_qa_state`.`translate_into_pt_pt_validation_progress` when (`waffle_category_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_pt_pt_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_pt_pt_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_pt_pt_validation_progress` when (`waffle_unit_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_pt_pt_validation_progress` when (`waffle_tag_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_pt_pt_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_pt_pt_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_pt_pt_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_pt_pt_validation_progress` else NULL end) AS `translate_into_pt_pt_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_ro_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_ro_validation_progress` when (`video_file_qa_state`.`translate_into_ro_validation_progress` is not null) then `video_file_qa_state`.`translate_into_ro_validation_progress` when (`chapter_qa_state`.`translate_into_ro_validation_progress` is not null) then `chapter_qa_state`.`translate_into_ro_validation_progress` when (`exercise_qa_state`.`translate_into_ro_validation_progress` is not null) then `exercise_qa_state`.`translate_into_ro_validation_progress` when (`exam_question_qa_state`.`translate_into_ro_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_ro_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_ro_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_ro_validation_progress` when (`slideshow_file_qa_state`.`translate_into_ro_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_ro_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_ro_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_ro_validation_progress` when (`text_doc_qa_state`.`translate_into_ro_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_ro_validation_progress` when (`vector_graphic_qa_state`.`translate_into_ro_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_ro_validation_progress` when (`data_article_qa_state`.`translate_into_ro_validation_progress` is not null) then `data_article_qa_state`.`translate_into_ro_validation_progress` when (`data_source_qa_state`.`translate_into_ro_validation_progress` is not null) then `data_source_qa_state`.`translate_into_ro_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_ro_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_ro_validation_progress` when (`tool_qa_state`.`translate_into_ro_validation_progress` is not null) then `tool_qa_state`.`translate_into_ro_validation_progress` when (`gui_section_qa_state`.`translate_into_ro_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_ro_validation_progress` when (`menu_qa_state`.`translate_into_ro_validation_progress` is not null) then `menu_qa_state`.`translate_into_ro_validation_progress` when (`page_qa_state`.`translate_into_ro_validation_progress` is not null) then `page_qa_state`.`translate_into_ro_validation_progress` when (`section_qa_state`.`translate_into_ro_validation_progress` is not null) then `section_qa_state`.`translate_into_ro_validation_progress` when (`download_link_qa_state`.`translate_into_ro_validation_progress` is not null) then `download_link_qa_state`.`translate_into_ro_validation_progress` when (`html_chunk_qa_state`.`translate_into_ro_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_ro_validation_progress` when (`waffle_qa_state`.`translate_into_ro_validation_progress` is not null) then `waffle_qa_state`.`translate_into_ro_validation_progress` when (`waffle_category_qa_state`.`translate_into_ro_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_ro_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_ro_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_ro_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_ro_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_ro_validation_progress` when (`waffle_unit_qa_state`.`translate_into_ro_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_ro_validation_progress` when (`waffle_tag_qa_state`.`translate_into_ro_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_ro_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_ro_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_ro_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_ro_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_ro_validation_progress` else NULL end) AS `translate_into_ro_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_ru_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_ru_validation_progress` when (`video_file_qa_state`.`translate_into_ru_validation_progress` is not null) then `video_file_qa_state`.`translate_into_ru_validation_progress` when (`chapter_qa_state`.`translate_into_ru_validation_progress` is not null) then `chapter_qa_state`.`translate_into_ru_validation_progress` when (`exercise_qa_state`.`translate_into_ru_validation_progress` is not null) then `exercise_qa_state`.`translate_into_ru_validation_progress` when (`exam_question_qa_state`.`translate_into_ru_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_ru_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_ru_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_ru_validation_progress` when (`slideshow_file_qa_state`.`translate_into_ru_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_ru_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_ru_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_ru_validation_progress` when (`text_doc_qa_state`.`translate_into_ru_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_ru_validation_progress` when (`vector_graphic_qa_state`.`translate_into_ru_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_ru_validation_progress` when (`data_article_qa_state`.`translate_into_ru_validation_progress` is not null) then `data_article_qa_state`.`translate_into_ru_validation_progress` when (`data_source_qa_state`.`translate_into_ru_validation_progress` is not null) then `data_source_qa_state`.`translate_into_ru_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_ru_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_ru_validation_progress` when (`tool_qa_state`.`translate_into_ru_validation_progress` is not null) then `tool_qa_state`.`translate_into_ru_validation_progress` when (`gui_section_qa_state`.`translate_into_ru_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_ru_validation_progress` when (`menu_qa_state`.`translate_into_ru_validation_progress` is not null) then `menu_qa_state`.`translate_into_ru_validation_progress` when (`page_qa_state`.`translate_into_ru_validation_progress` is not null) then `page_qa_state`.`translate_into_ru_validation_progress` when (`section_qa_state`.`translate_into_ru_validation_progress` is not null) then `section_qa_state`.`translate_into_ru_validation_progress` when (`download_link_qa_state`.`translate_into_ru_validation_progress` is not null) then `download_link_qa_state`.`translate_into_ru_validation_progress` when (`html_chunk_qa_state`.`translate_into_ru_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_ru_validation_progress` when (`waffle_qa_state`.`translate_into_ru_validation_progress` is not null) then `waffle_qa_state`.`translate_into_ru_validation_progress` when (`waffle_category_qa_state`.`translate_into_ru_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_ru_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_ru_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_ru_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_ru_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_ru_validation_progress` when (`waffle_unit_qa_state`.`translate_into_ru_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_ru_validation_progress` when (`waffle_tag_qa_state`.`translate_into_ru_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_ru_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_ru_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_ru_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_ru_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_ru_validation_progress` else NULL end) AS `translate_into_ru_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_sk_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_sk_validation_progress` when (`video_file_qa_state`.`translate_into_sk_validation_progress` is not null) then `video_file_qa_state`.`translate_into_sk_validation_progress` when (`chapter_qa_state`.`translate_into_sk_validation_progress` is not null) then `chapter_qa_state`.`translate_into_sk_validation_progress` when (`exercise_qa_state`.`translate_into_sk_validation_progress` is not null) then `exercise_qa_state`.`translate_into_sk_validation_progress` when (`exam_question_qa_state`.`translate_into_sk_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_sk_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_sk_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_sk_validation_progress` when (`slideshow_file_qa_state`.`translate_into_sk_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_sk_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_sk_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_sk_validation_progress` when (`text_doc_qa_state`.`translate_into_sk_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_sk_validation_progress` when (`vector_graphic_qa_state`.`translate_into_sk_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_sk_validation_progress` when (`data_article_qa_state`.`translate_into_sk_validation_progress` is not null) then `data_article_qa_state`.`translate_into_sk_validation_progress` when (`data_source_qa_state`.`translate_into_sk_validation_progress` is not null) then `data_source_qa_state`.`translate_into_sk_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_sk_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_sk_validation_progress` when (`tool_qa_state`.`translate_into_sk_validation_progress` is not null) then `tool_qa_state`.`translate_into_sk_validation_progress` when (`gui_section_qa_state`.`translate_into_sk_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_sk_validation_progress` when (`menu_qa_state`.`translate_into_sk_validation_progress` is not null) then `menu_qa_state`.`translate_into_sk_validation_progress` when (`page_qa_state`.`translate_into_sk_validation_progress` is not null) then `page_qa_state`.`translate_into_sk_validation_progress` when (`section_qa_state`.`translate_into_sk_validation_progress` is not null) then `section_qa_state`.`translate_into_sk_validation_progress` when (`download_link_qa_state`.`translate_into_sk_validation_progress` is not null) then `download_link_qa_state`.`translate_into_sk_validation_progress` when (`html_chunk_qa_state`.`translate_into_sk_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_sk_validation_progress` when (`waffle_qa_state`.`translate_into_sk_validation_progress` is not null) then `waffle_qa_state`.`translate_into_sk_validation_progress` when (`waffle_category_qa_state`.`translate_into_sk_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_sk_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_sk_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_sk_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_sk_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_sk_validation_progress` when (`waffle_unit_qa_state`.`translate_into_sk_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_sk_validation_progress` when (`waffle_tag_qa_state`.`translate_into_sk_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_sk_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_sk_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_sk_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_sk_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_sk_validation_progress` else NULL end) AS `translate_into_sk_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_sl_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_sl_validation_progress` when (`video_file_qa_state`.`translate_into_sl_validation_progress` is not null) then `video_file_qa_state`.`translate_into_sl_validation_progress` when (`chapter_qa_state`.`translate_into_sl_validation_progress` is not null) then `chapter_qa_state`.`translate_into_sl_validation_progress` when (`exercise_qa_state`.`translate_into_sl_validation_progress` is not null) then `exercise_qa_state`.`translate_into_sl_validation_progress` when (`exam_question_qa_state`.`translate_into_sl_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_sl_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_sl_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_sl_validation_progress` when (`slideshow_file_qa_state`.`translate_into_sl_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_sl_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_sl_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_sl_validation_progress` when (`text_doc_qa_state`.`translate_into_sl_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_sl_validation_progress` when (`vector_graphic_qa_state`.`translate_into_sl_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_sl_validation_progress` when (`data_article_qa_state`.`translate_into_sl_validation_progress` is not null) then `data_article_qa_state`.`translate_into_sl_validation_progress` when (`data_source_qa_state`.`translate_into_sl_validation_progress` is not null) then `data_source_qa_state`.`translate_into_sl_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_sl_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_sl_validation_progress` when (`tool_qa_state`.`translate_into_sl_validation_progress` is not null) then `tool_qa_state`.`translate_into_sl_validation_progress` when (`gui_section_qa_state`.`translate_into_sl_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_sl_validation_progress` when (`menu_qa_state`.`translate_into_sl_validation_progress` is not null) then `menu_qa_state`.`translate_into_sl_validation_progress` when (`page_qa_state`.`translate_into_sl_validation_progress` is not null) then `page_qa_state`.`translate_into_sl_validation_progress` when (`section_qa_state`.`translate_into_sl_validation_progress` is not null) then `section_qa_state`.`translate_into_sl_validation_progress` when (`download_link_qa_state`.`translate_into_sl_validation_progress` is not null) then `download_link_qa_state`.`translate_into_sl_validation_progress` when (`html_chunk_qa_state`.`translate_into_sl_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_sl_validation_progress` when (`waffle_qa_state`.`translate_into_sl_validation_progress` is not null) then `waffle_qa_state`.`translate_into_sl_validation_progress` when (`waffle_category_qa_state`.`translate_into_sl_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_sl_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_sl_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_sl_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_sl_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_sl_validation_progress` when (`waffle_unit_qa_state`.`translate_into_sl_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_sl_validation_progress` when (`waffle_tag_qa_state`.`translate_into_sl_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_sl_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_sl_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_sl_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_sl_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_sl_validation_progress` else NULL end) AS `translate_into_sl_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_sr_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_sr_validation_progress` when (`video_file_qa_state`.`translate_into_sr_validation_progress` is not null) then `video_file_qa_state`.`translate_into_sr_validation_progress` when (`chapter_qa_state`.`translate_into_sr_validation_progress` is not null) then `chapter_qa_state`.`translate_into_sr_validation_progress` when (`exercise_qa_state`.`translate_into_sr_validation_progress` is not null) then `exercise_qa_state`.`translate_into_sr_validation_progress` when (`exam_question_qa_state`.`translate_into_sr_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_sr_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_sr_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_sr_validation_progress` when (`slideshow_file_qa_state`.`translate_into_sr_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_sr_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_sr_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_sr_validation_progress` when (`text_doc_qa_state`.`translate_into_sr_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_sr_validation_progress` when (`vector_graphic_qa_state`.`translate_into_sr_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_sr_validation_progress` when (`data_article_qa_state`.`translate_into_sr_validation_progress` is not null) then `data_article_qa_state`.`translate_into_sr_validation_progress` when (`data_source_qa_state`.`translate_into_sr_validation_progress` is not null) then `data_source_qa_state`.`translate_into_sr_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_sr_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_sr_validation_progress` when (`tool_qa_state`.`translate_into_sr_validation_progress` is not null) then `tool_qa_state`.`translate_into_sr_validation_progress` when (`gui_section_qa_state`.`translate_into_sr_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_sr_validation_progress` when (`menu_qa_state`.`translate_into_sr_validation_progress` is not null) then `menu_qa_state`.`translate_into_sr_validation_progress` when (`page_qa_state`.`translate_into_sr_validation_progress` is not null) then `page_qa_state`.`translate_into_sr_validation_progress` when (`section_qa_state`.`translate_into_sr_validation_progress` is not null) then `section_qa_state`.`translate_into_sr_validation_progress` when (`download_link_qa_state`.`translate_into_sr_validation_progress` is not null) then `download_link_qa_state`.`translate_into_sr_validation_progress` when (`html_chunk_qa_state`.`translate_into_sr_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_sr_validation_progress` when (`waffle_qa_state`.`translate_into_sr_validation_progress` is not null) then `waffle_qa_state`.`translate_into_sr_validation_progress` when (`waffle_category_qa_state`.`translate_into_sr_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_sr_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_sr_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_sr_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_sr_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_sr_validation_progress` when (`waffle_unit_qa_state`.`translate_into_sr_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_sr_validation_progress` when (`waffle_tag_qa_state`.`translate_into_sr_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_sr_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_sr_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_sr_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_sr_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_sr_validation_progress` else NULL end) AS `translate_into_sr_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_sv_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_sv_validation_progress` when (`video_file_qa_state`.`translate_into_sv_validation_progress` is not null) then `video_file_qa_state`.`translate_into_sv_validation_progress` when (`chapter_qa_state`.`translate_into_sv_validation_progress` is not null) then `chapter_qa_state`.`translate_into_sv_validation_progress` when (`exercise_qa_state`.`translate_into_sv_validation_progress` is not null) then `exercise_qa_state`.`translate_into_sv_validation_progress` when (`exam_question_qa_state`.`translate_into_sv_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_sv_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_sv_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_sv_validation_progress` when (`slideshow_file_qa_state`.`translate_into_sv_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_sv_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_sv_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_sv_validation_progress` when (`text_doc_qa_state`.`translate_into_sv_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_sv_validation_progress` when (`vector_graphic_qa_state`.`translate_into_sv_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_sv_validation_progress` when (`data_article_qa_state`.`translate_into_sv_validation_progress` is not null) then `data_article_qa_state`.`translate_into_sv_validation_progress` when (`data_source_qa_state`.`translate_into_sv_validation_progress` is not null) then `data_source_qa_state`.`translate_into_sv_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_sv_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_sv_validation_progress` when (`tool_qa_state`.`translate_into_sv_validation_progress` is not null) then `tool_qa_state`.`translate_into_sv_validation_progress` when (`gui_section_qa_state`.`translate_into_sv_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_sv_validation_progress` when (`menu_qa_state`.`translate_into_sv_validation_progress` is not null) then `menu_qa_state`.`translate_into_sv_validation_progress` when (`page_qa_state`.`translate_into_sv_validation_progress` is not null) then `page_qa_state`.`translate_into_sv_validation_progress` when (`section_qa_state`.`translate_into_sv_validation_progress` is not null) then `section_qa_state`.`translate_into_sv_validation_progress` when (`download_link_qa_state`.`translate_into_sv_validation_progress` is not null) then `download_link_qa_state`.`translate_into_sv_validation_progress` when (`html_chunk_qa_state`.`translate_into_sv_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_sv_validation_progress` when (`waffle_qa_state`.`translate_into_sv_validation_progress` is not null) then `waffle_qa_state`.`translate_into_sv_validation_progress` when (`waffle_category_qa_state`.`translate_into_sv_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_sv_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_sv_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_sv_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_sv_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_sv_validation_progress` when (`waffle_unit_qa_state`.`translate_into_sv_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_sv_validation_progress` when (`waffle_tag_qa_state`.`translate_into_sv_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_sv_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_sv_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_sv_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_sv_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_sv_validation_progress` else NULL end) AS `translate_into_sv_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_th_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_th_validation_progress` when (`video_file_qa_state`.`translate_into_th_validation_progress` is not null) then `video_file_qa_state`.`translate_into_th_validation_progress` when (`chapter_qa_state`.`translate_into_th_validation_progress` is not null) then `chapter_qa_state`.`translate_into_th_validation_progress` when (`exercise_qa_state`.`translate_into_th_validation_progress` is not null) then `exercise_qa_state`.`translate_into_th_validation_progress` when (`exam_question_qa_state`.`translate_into_th_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_th_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_th_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_th_validation_progress` when (`slideshow_file_qa_state`.`translate_into_th_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_th_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_th_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_th_validation_progress` when (`text_doc_qa_state`.`translate_into_th_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_th_validation_progress` when (`vector_graphic_qa_state`.`translate_into_th_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_th_validation_progress` when (`data_article_qa_state`.`translate_into_th_validation_progress` is not null) then `data_article_qa_state`.`translate_into_th_validation_progress` when (`data_source_qa_state`.`translate_into_th_validation_progress` is not null) then `data_source_qa_state`.`translate_into_th_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_th_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_th_validation_progress` when (`tool_qa_state`.`translate_into_th_validation_progress` is not null) then `tool_qa_state`.`translate_into_th_validation_progress` when (`gui_section_qa_state`.`translate_into_th_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_th_validation_progress` when (`menu_qa_state`.`translate_into_th_validation_progress` is not null) then `menu_qa_state`.`translate_into_th_validation_progress` when (`page_qa_state`.`translate_into_th_validation_progress` is not null) then `page_qa_state`.`translate_into_th_validation_progress` when (`section_qa_state`.`translate_into_th_validation_progress` is not null) then `section_qa_state`.`translate_into_th_validation_progress` when (`download_link_qa_state`.`translate_into_th_validation_progress` is not null) then `download_link_qa_state`.`translate_into_th_validation_progress` when (`html_chunk_qa_state`.`translate_into_th_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_th_validation_progress` when (`waffle_qa_state`.`translate_into_th_validation_progress` is not null) then `waffle_qa_state`.`translate_into_th_validation_progress` when (`waffle_category_qa_state`.`translate_into_th_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_th_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_th_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_th_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_th_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_th_validation_progress` when (`waffle_unit_qa_state`.`translate_into_th_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_th_validation_progress` when (`waffle_tag_qa_state`.`translate_into_th_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_th_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_th_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_th_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_th_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_th_validation_progress` else NULL end) AS `translate_into_th_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_tr_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_tr_validation_progress` when (`video_file_qa_state`.`translate_into_tr_validation_progress` is not null) then `video_file_qa_state`.`translate_into_tr_validation_progress` when (`chapter_qa_state`.`translate_into_tr_validation_progress` is not null) then `chapter_qa_state`.`translate_into_tr_validation_progress` when (`exercise_qa_state`.`translate_into_tr_validation_progress` is not null) then `exercise_qa_state`.`translate_into_tr_validation_progress` when (`exam_question_qa_state`.`translate_into_tr_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_tr_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_tr_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_tr_validation_progress` when (`slideshow_file_qa_state`.`translate_into_tr_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_tr_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_tr_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_tr_validation_progress` when (`text_doc_qa_state`.`translate_into_tr_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_tr_validation_progress` when (`vector_graphic_qa_state`.`translate_into_tr_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_tr_validation_progress` when (`data_article_qa_state`.`translate_into_tr_validation_progress` is not null) then `data_article_qa_state`.`translate_into_tr_validation_progress` when (`data_source_qa_state`.`translate_into_tr_validation_progress` is not null) then `data_source_qa_state`.`translate_into_tr_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_tr_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_tr_validation_progress` when (`tool_qa_state`.`translate_into_tr_validation_progress` is not null) then `tool_qa_state`.`translate_into_tr_validation_progress` when (`gui_section_qa_state`.`translate_into_tr_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_tr_validation_progress` when (`menu_qa_state`.`translate_into_tr_validation_progress` is not null) then `menu_qa_state`.`translate_into_tr_validation_progress` when (`page_qa_state`.`translate_into_tr_validation_progress` is not null) then `page_qa_state`.`translate_into_tr_validation_progress` when (`section_qa_state`.`translate_into_tr_validation_progress` is not null) then `section_qa_state`.`translate_into_tr_validation_progress` when (`download_link_qa_state`.`translate_into_tr_validation_progress` is not null) then `download_link_qa_state`.`translate_into_tr_validation_progress` when (`html_chunk_qa_state`.`translate_into_tr_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_tr_validation_progress` when (`waffle_qa_state`.`translate_into_tr_validation_progress` is not null) then `waffle_qa_state`.`translate_into_tr_validation_progress` when (`waffle_category_qa_state`.`translate_into_tr_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_tr_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_tr_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_tr_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_tr_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_tr_validation_progress` when (`waffle_unit_qa_state`.`translate_into_tr_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_tr_validation_progress` when (`waffle_tag_qa_state`.`translate_into_tr_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_tr_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_tr_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_tr_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_tr_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_tr_validation_progress` else NULL end) AS `translate_into_tr_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_uk_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_uk_validation_progress` when (`video_file_qa_state`.`translate_into_uk_validation_progress` is not null) then `video_file_qa_state`.`translate_into_uk_validation_progress` when (`chapter_qa_state`.`translate_into_uk_validation_progress` is not null) then `chapter_qa_state`.`translate_into_uk_validation_progress` when (`exercise_qa_state`.`translate_into_uk_validation_progress` is not null) then `exercise_qa_state`.`translate_into_uk_validation_progress` when (`exam_question_qa_state`.`translate_into_uk_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_uk_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_uk_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_uk_validation_progress` when (`slideshow_file_qa_state`.`translate_into_uk_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_uk_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_uk_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_uk_validation_progress` when (`text_doc_qa_state`.`translate_into_uk_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_uk_validation_progress` when (`vector_graphic_qa_state`.`translate_into_uk_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_uk_validation_progress` when (`data_article_qa_state`.`translate_into_uk_validation_progress` is not null) then `data_article_qa_state`.`translate_into_uk_validation_progress` when (`data_source_qa_state`.`translate_into_uk_validation_progress` is not null) then `data_source_qa_state`.`translate_into_uk_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_uk_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_uk_validation_progress` when (`tool_qa_state`.`translate_into_uk_validation_progress` is not null) then `tool_qa_state`.`translate_into_uk_validation_progress` when (`gui_section_qa_state`.`translate_into_uk_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_uk_validation_progress` when (`menu_qa_state`.`translate_into_uk_validation_progress` is not null) then `menu_qa_state`.`translate_into_uk_validation_progress` when (`page_qa_state`.`translate_into_uk_validation_progress` is not null) then `page_qa_state`.`translate_into_uk_validation_progress` when (`section_qa_state`.`translate_into_uk_validation_progress` is not null) then `section_qa_state`.`translate_into_uk_validation_progress` when (`download_link_qa_state`.`translate_into_uk_validation_progress` is not null) then `download_link_qa_state`.`translate_into_uk_validation_progress` when (`html_chunk_qa_state`.`translate_into_uk_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_uk_validation_progress` when (`waffle_qa_state`.`translate_into_uk_validation_progress` is not null) then `waffle_qa_state`.`translate_into_uk_validation_progress` when (`waffle_category_qa_state`.`translate_into_uk_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_uk_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_uk_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_uk_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_uk_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_uk_validation_progress` when (`waffle_unit_qa_state`.`translate_into_uk_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_uk_validation_progress` when (`waffle_tag_qa_state`.`translate_into_uk_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_uk_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_uk_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_uk_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_uk_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_uk_validation_progress` else NULL end) AS `translate_into_uk_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_vi_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_vi_validation_progress` when (`video_file_qa_state`.`translate_into_vi_validation_progress` is not null) then `video_file_qa_state`.`translate_into_vi_validation_progress` when (`chapter_qa_state`.`translate_into_vi_validation_progress` is not null) then `chapter_qa_state`.`translate_into_vi_validation_progress` when (`exercise_qa_state`.`translate_into_vi_validation_progress` is not null) then `exercise_qa_state`.`translate_into_vi_validation_progress` when (`exam_question_qa_state`.`translate_into_vi_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_vi_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_vi_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_vi_validation_progress` when (`slideshow_file_qa_state`.`translate_into_vi_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_vi_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_vi_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_vi_validation_progress` when (`text_doc_qa_state`.`translate_into_vi_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_vi_validation_progress` when (`vector_graphic_qa_state`.`translate_into_vi_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_vi_validation_progress` when (`data_article_qa_state`.`translate_into_vi_validation_progress` is not null) then `data_article_qa_state`.`translate_into_vi_validation_progress` when (`data_source_qa_state`.`translate_into_vi_validation_progress` is not null) then `data_source_qa_state`.`translate_into_vi_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_vi_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_vi_validation_progress` when (`tool_qa_state`.`translate_into_vi_validation_progress` is not null) then `tool_qa_state`.`translate_into_vi_validation_progress` when (`gui_section_qa_state`.`translate_into_vi_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_vi_validation_progress` when (`menu_qa_state`.`translate_into_vi_validation_progress` is not null) then `menu_qa_state`.`translate_into_vi_validation_progress` when (`page_qa_state`.`translate_into_vi_validation_progress` is not null) then `page_qa_state`.`translate_into_vi_validation_progress` when (`section_qa_state`.`translate_into_vi_validation_progress` is not null) then `section_qa_state`.`translate_into_vi_validation_progress` when (`download_link_qa_state`.`translate_into_vi_validation_progress` is not null) then `download_link_qa_state`.`translate_into_vi_validation_progress` when (`html_chunk_qa_state`.`translate_into_vi_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_vi_validation_progress` when (`waffle_qa_state`.`translate_into_vi_validation_progress` is not null) then `waffle_qa_state`.`translate_into_vi_validation_progress` when (`waffle_category_qa_state`.`translate_into_vi_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_vi_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_vi_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_vi_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_vi_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_vi_validation_progress` when (`waffle_unit_qa_state`.`translate_into_vi_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_vi_validation_progress` when (`waffle_tag_qa_state`.`translate_into_vi_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_vi_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_vi_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_vi_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_vi_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_vi_validation_progress` else NULL end) AS `translate_into_vi_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_zh_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_zh_validation_progress` when (`video_file_qa_state`.`translate_into_zh_validation_progress` is not null) then `video_file_qa_state`.`translate_into_zh_validation_progress` when (`chapter_qa_state`.`translate_into_zh_validation_progress` is not null) then `chapter_qa_state`.`translate_into_zh_validation_progress` when (`exercise_qa_state`.`translate_into_zh_validation_progress` is not null) then `exercise_qa_state`.`translate_into_zh_validation_progress` when (`exam_question_qa_state`.`translate_into_zh_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_zh_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_zh_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_zh_validation_progress` when (`slideshow_file_qa_state`.`translate_into_zh_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_zh_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_zh_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_zh_validation_progress` when (`text_doc_qa_state`.`translate_into_zh_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_zh_validation_progress` when (`vector_graphic_qa_state`.`translate_into_zh_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_zh_validation_progress` when (`data_article_qa_state`.`translate_into_zh_validation_progress` is not null) then `data_article_qa_state`.`translate_into_zh_validation_progress` when (`data_source_qa_state`.`translate_into_zh_validation_progress` is not null) then `data_source_qa_state`.`translate_into_zh_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_zh_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_zh_validation_progress` when (`tool_qa_state`.`translate_into_zh_validation_progress` is not null) then `tool_qa_state`.`translate_into_zh_validation_progress` when (`gui_section_qa_state`.`translate_into_zh_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_zh_validation_progress` when (`menu_qa_state`.`translate_into_zh_validation_progress` is not null) then `menu_qa_state`.`translate_into_zh_validation_progress` when (`page_qa_state`.`translate_into_zh_validation_progress` is not null) then `page_qa_state`.`translate_into_zh_validation_progress` when (`section_qa_state`.`translate_into_zh_validation_progress` is not null) then `section_qa_state`.`translate_into_zh_validation_progress` when (`download_link_qa_state`.`translate_into_zh_validation_progress` is not null) then `download_link_qa_state`.`translate_into_zh_validation_progress` when (`html_chunk_qa_state`.`translate_into_zh_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_zh_validation_progress` when (`waffle_qa_state`.`translate_into_zh_validation_progress` is not null) then `waffle_qa_state`.`translate_into_zh_validation_progress` when (`waffle_category_qa_state`.`translate_into_zh_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_zh_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_zh_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_zh_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_zh_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_zh_validation_progress` when (`waffle_unit_qa_state`.`translate_into_zh_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_zh_validation_progress` when (`waffle_tag_qa_state`.`translate_into_zh_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_zh_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_zh_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_zh_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_zh_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_zh_validation_progress` else NULL end) AS `translate_into_zh_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_zh_cn_validation_progress` when (`video_file_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `video_file_qa_state`.`translate_into_zh_cn_validation_progress` when (`chapter_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `chapter_qa_state`.`translate_into_zh_cn_validation_progress` when (`exercise_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `exercise_qa_state`.`translate_into_zh_cn_validation_progress` when (`exam_question_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_zh_cn_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_zh_cn_validation_progress` when (`slideshow_file_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_zh_cn_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_zh_cn_validation_progress` when (`text_doc_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_zh_cn_validation_progress` when (`vector_graphic_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_zh_cn_validation_progress` when (`data_article_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `data_article_qa_state`.`translate_into_zh_cn_validation_progress` when (`data_source_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `data_source_qa_state`.`translate_into_zh_cn_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_zh_cn_validation_progress` when (`tool_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `tool_qa_state`.`translate_into_zh_cn_validation_progress` when (`gui_section_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_zh_cn_validation_progress` when (`menu_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `menu_qa_state`.`translate_into_zh_cn_validation_progress` when (`page_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `page_qa_state`.`translate_into_zh_cn_validation_progress` when (`section_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `section_qa_state`.`translate_into_zh_cn_validation_progress` when (`download_link_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `download_link_qa_state`.`translate_into_zh_cn_validation_progress` when (`html_chunk_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_zh_cn_validation_progress` when (`waffle_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `waffle_qa_state`.`translate_into_zh_cn_validation_progress` when (`waffle_category_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_zh_cn_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_zh_cn_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_zh_cn_validation_progress` when (`waffle_unit_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_zh_cn_validation_progress` when (`waffle_tag_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_zh_cn_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_zh_cn_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_zh_cn_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_zh_cn_validation_progress` else NULL end) AS `translate_into_zh_cn_validation_progress`,(case when (`snapshot_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `snapshot_qa_state`.`translate_into_zh_tw_validation_progress` when (`video_file_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `video_file_qa_state`.`translate_into_zh_tw_validation_progress` when (`chapter_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `chapter_qa_state`.`translate_into_zh_tw_validation_progress` when (`exercise_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `exercise_qa_state`.`translate_into_zh_tw_validation_progress` when (`exam_question_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `exam_question_qa_state`.`translate_into_zh_tw_validation_progress` when (`exam_question_alternative_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `exam_question_alternative_qa_state`.`translate_into_zh_tw_validation_progress` when (`slideshow_file_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `slideshow_file_qa_state`.`translate_into_zh_tw_validation_progress` when (`spreadsheet_file_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `spreadsheet_file_qa_state`.`translate_into_zh_tw_validation_progress` when (`text_doc_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `text_doc_qa_state`.`translate_into_zh_tw_validation_progress` when (`vector_graphic_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `vector_graphic_qa_state`.`translate_into_zh_tw_validation_progress` when (`data_article_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `data_article_qa_state`.`translate_into_zh_tw_validation_progress` when (`data_source_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `data_source_qa_state`.`translate_into_zh_tw_validation_progress` when (`i18n_catalog_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `i18n_catalog_qa_state`.`translate_into_zh_tw_validation_progress` when (`tool_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `tool_qa_state`.`translate_into_zh_tw_validation_progress` when (`gui_section_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `gui_section_qa_state`.`translate_into_zh_tw_validation_progress` when (`menu_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `menu_qa_state`.`translate_into_zh_tw_validation_progress` when (`page_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `page_qa_state`.`translate_into_zh_tw_validation_progress` when (`section_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `section_qa_state`.`translate_into_zh_tw_validation_progress` when (`download_link_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `download_link_qa_state`.`translate_into_zh_tw_validation_progress` when (`html_chunk_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `html_chunk_qa_state`.`translate_into_zh_tw_validation_progress` when (`waffle_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `waffle_qa_state`.`translate_into_zh_tw_validation_progress` when (`waffle_category_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `waffle_category_qa_state`.`translate_into_zh_tw_validation_progress` when (`waffle_category_thing_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `waffle_category_thing_qa_state`.`translate_into_zh_tw_validation_progress` when (`waffle_indicator_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `waffle_indicator_qa_state`.`translate_into_zh_tw_validation_progress` when (`waffle_unit_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `waffle_unit_qa_state`.`translate_into_zh_tw_validation_progress` when (`waffle_tag_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `waffle_tag_qa_state`.`translate_into_zh_tw_validation_progress` when (`waffle_data_source_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `waffle_data_source_qa_state`.`translate_into_zh_tw_validation_progress` when (`waffle_publisher_qa_state`.`translate_into_zh_tw_validation_progress` is not null) then `waffle_publisher_qa_state`.`translate_into_zh_tw_validation_progress` else NULL end) AS `translate_into_zh_tw_validation_progress`,(case when (`snapshot`.`id` is not null) then 'Snapshot' when (`video_file`.`id` is not null) then 'VideoFile' when (`chapter`.`id` is not null) then 'Chapter' when (`exercise`.`id` is not null) then 'Exercise' when (`exam_question`.`id` is not null) then 'ExamQuestion' when (`exam_question_alternative`.`id` is not null) then 'ExamQuestionAlternative' when (`slideshow_file`.`id` is not null) then 'SlideshowFile' when (`spreadsheet_file`.`id` is not null) then 'SpreadsheetFile' when (`text_doc`.`id` is not null) then 'TextDoc' when (`vector_graphic`.`id` is not null) then 'VectorGraphic' when (`data_article`.`id` is not null) then 'DataArticle' when (`data_source`.`id` is not null) then 'DataSource' when (`i18n_catalog`.`id` is not null) then 'I18nCatalog' when (`tool`.`id` is not null) then 'Tool' when (`gui_section`.`id` is not null) then 'GuiSection' when (`menu`.`id` is not null) then 'Menu' when (`page`.`id` is not null) then 'Page' when (`section`.`id` is not null) then 'Section' when (`download_link`.`id` is not null) then 'DownloadLink' when (`html_chunk`.`id` is not null) then 'HtmlChunk' when (`waffle`.`id` is not null) then 'Waffle' when (`waffle_category`.`id` is not null) then 'WaffleCategory' when (`waffle_category_thing`.`id` is not null) then 'WaffleCategoryThing' when (`waffle_indicator`.`id` is not null) then 'WaffleIndicator' when (`waffle_unit`.`id` is not null) then 'WaffleUnit' when (`waffle_tag`.`id` is not null) then 'WaffleTag' when (`waffle_data_source`.`id` is not null) then 'WaffleDataSource' when (`waffle_publisher`.`id` is not null) then 'WafflePublisher' else NULL end) AS `model_class`,(case when (`snapshot`.`id` is not null) then 'go' when (`video_file`.`id` is not null) then 'go' when (`chapter`.`id` is not null) then 'educational' when (`exercise`.`id` is not null) then 'educational' when (`exam_question`.`id` is not null) then 'educational' when (`exam_question_alternative`.`id` is not null) then 'educational' when (`slideshow_file`.`id` is not null) then 'educational' when (`spreadsheet_file`.`id` is not null) then 'educational' when (`text_doc`.`id` is not null) then 'educational' when (`vector_graphic`.`id` is not null) then 'educational' when (`data_article`.`id` is not null) then 'educational' when (`data_source`.`id` is not null) then 'educational' when (`menu`.`id` is not null) then 'website_content' when (`page`.`id` is not null) then 'website_content' when (`section`.`id` is not null) then 'website_content' when (`download_link`.`id` is not null) then 'website_content' when (`html_chunk`.`id` is not null) then 'website_content' else NULL end) AS `item_type`,(case when (`snapshot`.`created` is not null) then `snapshot`.`created` when (`video_file`.`created` is not null) then `video_file`.`created` when (`chapter`.`created` is not null) then `chapter`.`created` when (`exercise`.`created` is not null) then `exercise`.`created` when (`exam_question`.`created` is not null) then `exam_question`.`created` when (`exam_question_alternative`.`created` is not null) then `exam_question_alternative`.`created` when (`slideshow_file`.`created` is not null) then `slideshow_file`.`created` when (`spreadsheet_file`.`created` is not null) then `spreadsheet_file`.`created` when (`text_doc`.`created` is not null) then `text_doc`.`created` when (`vector_graphic`.`created` is not null) then `vector_graphic`.`created` when (`data_article`.`created` is not null) then `data_article`.`created` when (`data_source`.`created` is not null) then `data_source`.`created` when (`i18n_catalog`.`created` is not null) then `i18n_catalog`.`created` when (`tool`.`created` is not null) then `tool`.`created` when (`gui_section`.`created` is not null) then `gui_section`.`created` when (`menu`.`created` is not null) then `menu`.`created` when (`page`.`created` is not null) then `page`.`created` when (`section`.`created` is not null) then `section`.`created` when (`download_link`.`created` is not null) then `download_link`.`created` when (`html_chunk`.`created` is not null) then `html_chunk`.`created` when (`waffle`.`created` is not null) then `waffle`.`created` when (`waffle_category`.`created` is not null) then `waffle_category`.`created` when (`waffle_category_thing`.`created` is not null) then `waffle_category_thing`.`created` when (`waffle_indicator`.`created` is not null) then `waffle_indicator`.`created` when (`waffle_unit`.`created` is not null) then `waffle_unit`.`created` when (`waffle_tag`.`created` is not null) then `waffle_tag`.`created` when (`waffle_data_source`.`created` is not null) then `waffle_data_source`.`created` when (`waffle_publisher`.`created` is not null) then `waffle_publisher`.`created` else NULL end) AS `created`,(case when (`snapshot`.`modified` is not null) then `snapshot`.`modified` when (`video_file`.`modified` is not null) then `video_file`.`modified` when (`chapter`.`modified` is not null) then `chapter`.`modified` when (`exercise`.`modified` is not null) then `exercise`.`modified` when (`exam_question`.`modified` is not null) then `exam_question`.`modified` when (`exam_question_alternative`.`modified` is not null) then `exam_question_alternative`.`modified` when (`slideshow_file`.`modified` is not null) then `slideshow_file`.`modified` when (`spreadsheet_file`.`modified` is not null) then `spreadsheet_file`.`modified` when (`text_doc`.`modified` is not null) then `text_doc`.`modified` when (`vector_graphic`.`modified` is not null) then `vector_graphic`.`modified` when (`data_article`.`modified` is not null) then `data_article`.`modified` when (`data_source`.`modified` is not null) then `data_source`.`modified` when (`i18n_catalog`.`modified` is not null) then `i18n_catalog`.`modified` when (`tool`.`modified` is not null) then `tool`.`modified` when (`gui_section`.`modified` is not null) then `gui_section`.`modified` when (`menu`.`modified` is not null) then `menu`.`modified` when (`page`.`modified` is not null) then `page`.`modified` when (`section`.`modified` is not null) then `section`.`modified` when (`download_link`.`modified` is not null) then `download_link`.`modified` when (`html_chunk`.`modified` is not null) then `html_chunk`.`modified` when (`waffle`.`modified` is not null) then `waffle`.`modified` when (`waffle_category`.`modified` is not null) then `waffle_category`.`modified` when (`waffle_category_thing`.`modified` is not null) then `waffle_category_thing`.`modified` when (`waffle_indicator`.`modified` is not null) then `waffle_indicator`.`modified` when (`waffle_unit`.`modified` is not null) then `waffle_unit`.`modified` when (`waffle_tag`.`modified` is not null) then `waffle_tag`.`modified` when (`waffle_data_source`.`modified` is not null) then `waffle_data_source`.`modified` when (`waffle_publisher`.`modified` is not null) then `waffle_publisher`.`modified` else NULL end) AS `modified` from ((((((((((((((((((((((((((((`node` left join (`snapshot` join `snapshot_qa_state` on((`snapshot`.`snapshot_qa_state_id` = `snapshot_qa_state`.`id`))) on((`snapshot`.`node_id` = `node`.`id`))) left join (`video_file` join `video_file_qa_state` on((`video_file`.`video_file_qa_state_id` = `video_file_qa_state`.`id`))) on((`video_file`.`node_id` = `node`.`id`))) left join (`chapter` join `chapter_qa_state` on((`chapter`.`chapter_qa_state_id` = `chapter_qa_state`.`id`))) on((`chapter`.`node_id` = `node`.`id`))) left join (`exercise` join `exercise_qa_state` on((`exercise`.`exercise_qa_state_id` = `exercise_qa_state`.`id`))) on((`exercise`.`node_id` = `node`.`id`))) left join (`exam_question` join `exam_question_qa_state` on((`exam_question`.`exam_question_qa_state_id` = `exam_question_qa_state`.`id`))) on((`exam_question`.`node_id` = `node`.`id`))) left join (`exam_question_alternative` join `exam_question_alternative_qa_state` on((`exam_question_alternative`.`exam_question_alternative_qa_state_id` = `exam_question_alternative_qa_state`.`id`))) on((`exam_question_alternative`.`node_id` = `node`.`id`))) left join (`slideshow_file` join `slideshow_file_qa_state` on((`slideshow_file`.`slideshow_file_qa_state_id` = `slideshow_file_qa_state`.`id`))) on((`slideshow_file`.`node_id` = `node`.`id`))) left join (`spreadsheet_file` join `spreadsheet_file_qa_state` on((`spreadsheet_file`.`spreadsheet_file_qa_state_id` = `spreadsheet_file_qa_state`.`id`))) on((`spreadsheet_file`.`node_id` = `node`.`id`))) left join (`text_doc` join `text_doc_qa_state` on((`text_doc`.`text_doc_qa_state_id` = `text_doc_qa_state`.`id`))) on((`text_doc`.`node_id` = `node`.`id`))) left join (`vector_graphic` join `vector_graphic_qa_state` on((`vector_graphic`.`vector_graphic_qa_state_id` = `vector_graphic_qa_state`.`id`))) on((`vector_graphic`.`node_id` = `node`.`id`))) left join (`data_article` join `data_article_qa_state` on((`data_article`.`data_article_qa_state_id` = `data_article_qa_state`.`id`))) on((`data_article`.`node_id` = `node`.`id`))) left join (`data_source` join `data_source_qa_state` on((`data_source`.`data_source_qa_state_id` = `data_source_qa_state`.`id`))) on((`data_source`.`node_id` = `node`.`id`))) left join (`i18n_catalog` join `i18n_catalog_qa_state` on((`i18n_catalog`.`i18n_catalog_qa_state_id` = `i18n_catalog_qa_state`.`id`))) on((`i18n_catalog`.`node_id` = `node`.`id`))) left join (`tool` join `tool_qa_state` on((`tool`.`tool_qa_state_id` = `tool_qa_state`.`id`))) on((`tool`.`node_id` = `node`.`id`))) left join (`gui_section` join `gui_section_qa_state` on((`gui_section`.`gui_section_qa_state_id` = `gui_section_qa_state`.`id`))) on((`gui_section`.`node_id` = `node`.`id`))) left join (`menu` join `menu_qa_state` on((`menu`.`menu_qa_state_id` = `menu_qa_state`.`id`))) on((`menu`.`node_id` = `node`.`id`))) left join (`page` join `page_qa_state` on((`page`.`page_qa_state_id` = `page_qa_state`.`id`))) on((`page`.`node_id` = `node`.`id`))) left join (`section` join `section_qa_state` on((`section`.`section_qa_state_id` = `section_qa_state`.`id`))) on((`section`.`node_id` = `node`.`id`))) left join (`download_link` join `download_link_qa_state` on((`download_link`.`download_link_qa_state_id` = `download_link_qa_state`.`id`))) on((`download_link`.`node_id` = `node`.`id`))) left join (`html_chunk` join `html_chunk_qa_state` on((`html_chunk`.`html_chunk_qa_state_id` = `html_chunk_qa_state`.`id`))) on((`html_chunk`.`node_id` = `node`.`id`))) left join (`waffle` join `waffle_qa_state` on((`waffle`.`waffle_qa_state_id` = `waffle_qa_state`.`id`))) on((`waffle`.`node_id` = `node`.`id`))) left join (`waffle_category` join `waffle_category_qa_state` on((`waffle_category`.`waffle_category_qa_state_id` = `waffle_category_qa_state`.`id`))) on((`waffle_category`.`node_id` = `node`.`id`))) left join (`waffle_category_thing` join `waffle_category_thing_qa_state` on((`waffle_category_thing`.`waffle_category_thing_qa_state_id` = `waffle_category_thing_qa_state`.`id`))) on((`waffle_category_thing`.`node_id` = `node`.`id`))) left join (`waffle_indicator` join `waffle_indicator_qa_state` on((`waffle_indicator`.`waffle_indicator_qa_state_id` = `waffle_indicator_qa_state`.`id`))) on((`waffle_indicator`.`node_id` = `node`.`id`))) left join (`waffle_unit` join `waffle_unit_qa_state` on((`waffle_unit`.`waffle_unit_qa_state_id` = `waffle_unit_qa_state`.`id`))) on((`waffle_unit`.`node_id` = `node`.`id`))) left join (`waffle_tag` join `waffle_tag_qa_state` on((`waffle_tag`.`waffle_tag_qa_state_id` = `waffle_tag_qa_state`.`id`))) on((`waffle_tag`.`node_id` = `node`.`id`))) left join (`waffle_data_source` join `waffle_data_source_qa_state` on((`waffle_data_source`.`waffle_data_source_qa_state_id` = `waffle_data_source_qa_state`.`id`))) on((`waffle_data_source`.`node_id` = `node`.`id`))) left join (`waffle_publisher` join `waffle_publisher_qa_state` on((`waffle_publisher`.`waffle_publisher_qa_state_id` = `waffle_publisher_qa_state`.`id`))) on((`waffle_publisher`.`node_id` = `node`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

