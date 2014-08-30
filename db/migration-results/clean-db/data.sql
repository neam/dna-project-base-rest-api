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
-- Dumping data for table `AuthAssignment`
--

LOCK TABLES `AuthAssignment` WRITE;
/*!40000 ALTER TABLE `AuthAssignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `AuthAssignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `AuthItem`
--

LOCK TABLES `AuthItem` WRITE;
/*!40000 ALTER TABLE `AuthItem` DISABLE KEYS */;
/*!40000 ALTER TABLE `AuthItem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `AuthItemChild`
--

LOCK TABLES `AuthItemChild` WRITE;
/*!40000 ALTER TABLE `AuthItemChild` DISABLE KEYS */;
/*!40000 ALTER TABLE `AuthItemChild` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Message`
--

LOCK TABLES `Message` WRITE;
/*!40000 ALTER TABLE `Message` DISABLE KEYS */;
INSERT INTO `Message` VALUES (173,'pt_br','Corrente'),(174,'pt_br','Cadeia');
/*!40000 ALTER TABLE `Message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Rights`
--

LOCK TABLES `Rights` WRITE;
/*!40000 ALTER TABLE `Rights` DISABLE KEYS */;
/*!40000 ALTER TABLE `Rights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `SourceMessage`
--

LOCK TABLES `SourceMessage` WRITE;
/*!40000 ALTER TABLE `SourceMessage` DISABLE KEYS */;
INSERT INTO `SourceMessage` VALUES (173,'i18n_catalog-4-metal-po_contents','Chain'),(174,'i18n_catalog-4-restaurant-po_contents','Chain');
/*!40000 ALTER TABLE `SourceMessage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `_item`
--

LOCK TABLES `_item` WRITE;
/*!40000 ALTER TABLE `_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,'admin','$2a$12$dyixOdTUCj3lcHhP0w.owu2esQMRb2vkedMx4tb3inn6OMYHZLium','webmaster@example.com','d6aef338ea9d2ea49a0f62705ef51ecc',1,1,'2014-03-25 22:04:20',NULL,'$2a$12$dyixOdTUCj3lcHhP0w.oww','bcrypt',0,NULL,NULL);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `account_login_history`
--

LOCK TABLES `account_login_history` WRITE;
/*!40000 ALTER TABLE `account_login_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `account_login_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `account_password_history`
--

LOCK TABLES `account_password_history` WRITE;
/*!40000 ALTER TABLE `account_password_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `account_password_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `account_token`
--

LOCK TABLES `account_token` WRITE;
/*!40000 ALTER TABLE `account_token` DISABLE KEYS */;
/*!40000 ALTER TABLE `account_token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `action`
--

LOCK TABLES `action` WRITE;
/*!40000 ALTER TABLE `action` DISABLE KEYS */;
INSERT INTO `action` VALUES (1,'List','Lists an item in the group'),(2,'Unlist','Unlists an item from the group'),(3,'Suggest','Suggest an item to be listed in the group'),(4,'Publish/Replace','Share with anyone, making the item public for the first time / Publishing this version as the official version, replacing a previous version'),(5,'Unpublish/Revert','Unshare with anyone, revert to previous version if such exists'),(6,'Add','Adds a temporary empty item to the database'),(7,'Remove','Remove item from the database'),(8,'Browse','Browse amongst items'),(9,'View','View items'),(10,'PrepareForReview','Prepare item for review, by stepping through fields required for IN_REVIEW'),(11,'Preview','Preview the current content'),(12,'Evaluate','Evaluating an item in Preview-mode by grading and commenting on it\'s fields or the total itemVersion'),(13,'Proofread','Review and improve language'),(14,'PrepareForPublishing','Prepare for publishing, by stepping through fields required for PUBLIC'),(15,'Approve','Approving the full content by stepping to next field approved==false'),(16,'Translate','Translate to languages that you added to our profile'),(17,'TranslateUnrestricted','Translate to all languages'),(18,'Edit','Look at and edit all fields, no obvious goal'),(19,'Clone','Creates a new itemVersion with incremented version number and goes to \"edit\" workFlow');
/*!40000 ALTER TABLE `action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `changeset`
--

LOCK TABLES `changeset` WRITE;
/*!40000 ALTER TABLE `changeset` DISABLE KEYS */;
/*!40000 ALTER TABLE `changeset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `chapter`
--

LOCK TABLES `chapter` WRITE;
/*!40000 ALTER TABLE `chapter` DISABLE KEYS */;
/*!40000 ALTER TABLE `chapter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `chapter_qa_state`
--

LOCK TABLES `chapter_qa_state` WRITE;
/*!40000 ALTER TABLE `chapter_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `chapter_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ckeditor_style`
--

LOCK TABLES `ckeditor_style` WRITE;
/*!40000 ALTER TABLE `ckeditor_style` DISABLE KEYS */;
/*!40000 ALTER TABLE `ckeditor_style` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ckeditor_template`
--

LOCK TABLES `ckeditor_template` WRITE;
/*!40000 ALTER TABLE `ckeditor_template` DISABLE KEYS */;
/*!40000 ALTER TABLE `ckeditor_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `data_article`
--

LOCK TABLES `data_article` WRITE;
/*!40000 ALTER TABLE `data_article` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `data_article_qa_state`
--

LOCK TABLES `data_article_qa_state` WRITE;
/*!40000 ALTER TABLE `data_article_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_article_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `data_source`
--

LOCK TABLES `data_source` WRITE;
/*!40000 ALTER TABLE `data_source` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_source` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `data_source_qa_state`
--

LOCK TABLES `data_source_qa_state` WRITE;
/*!40000 ALTER TABLE `data_source_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_source_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `download_link`
--

LOCK TABLES `download_link` WRITE;
/*!40000 ALTER TABLE `download_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `download_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `download_link_qa_state`
--

LOCK TABLES `download_link_qa_state` WRITE;
/*!40000 ALTER TABLE `download_link_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `download_link_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `edge`
--

LOCK TABLES `edge` WRITE;
/*!40000 ALTER TABLE `edge` DISABLE KEYS */;
/*!40000 ALTER TABLE `edge` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `email_message`
--

LOCK TABLES `email_message` WRITE;
/*!40000 ALTER TABLE `email_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `email_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `exam_question`
--

LOCK TABLES `exam_question` WRITE;
/*!40000 ALTER TABLE `exam_question` DISABLE KEYS */;
/*!40000 ALTER TABLE `exam_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `exam_question_alternative`
--

LOCK TABLES `exam_question_alternative` WRITE;
/*!40000 ALTER TABLE `exam_question_alternative` DISABLE KEYS */;
/*!40000 ALTER TABLE `exam_question_alternative` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `exam_question_alternative_qa_state`
--

LOCK TABLES `exam_question_alternative_qa_state` WRITE;
/*!40000 ALTER TABLE `exam_question_alternative_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `exam_question_alternative_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `exam_question_qa_state`
--

LOCK TABLES `exam_question_qa_state` WRITE;
/*!40000 ALTER TABLE `exam_question_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `exam_question_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `exercise`
--

LOCK TABLES `exercise` WRITE;
/*!40000 ALTER TABLE `exercise` DISABLE KEYS */;
/*!40000 ALTER TABLE `exercise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `exercise_qa_state`
--

LOCK TABLES `exercise_qa_state` WRITE;
/*!40000 ALTER TABLE `exercise_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `exercise_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ezc_execution`
--

LOCK TABLES `ezc_execution` WRITE;
/*!40000 ALTER TABLE `ezc_execution` DISABLE KEYS */;
/*!40000 ALTER TABLE `ezc_execution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ezc_execution_state`
--

LOCK TABLES `ezc_execution_state` WRITE;
/*!40000 ALTER TABLE `ezc_execution_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `ezc_execution_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ezc_node`
--

LOCK TABLES `ezc_node` WRITE;
/*!40000 ALTER TABLE `ezc_node` DISABLE KEYS */;
/*!40000 ALTER TABLE `ezc_node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ezc_node_connection`
--

LOCK TABLES `ezc_node_connection` WRITE;
/*!40000 ALTER TABLE `ezc_node_connection` DISABLE KEYS */;
/*!40000 ALTER TABLE `ezc_node_connection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ezc_variable_handler`
--

LOCK TABLES `ezc_variable_handler` WRITE;
/*!40000 ALTER TABLE `ezc_variable_handler` DISABLE KEYS */;
/*!40000 ALTER TABLE `ezc_variable_handler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ezc_workflow`
--

LOCK TABLES `ezc_workflow` WRITE;
/*!40000 ALTER TABLE `ezc_workflow` DISABLE KEYS */;
/*!40000 ALTER TABLE `ezc_workflow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
INSERT INTO `group` VALUES (1,'GapminderOrg',NULL,NULL),(2,'School',NULL,NULL),(3,'DollarStreet',NULL,NULL),(4,'HumanNumbers',NULL,NULL),(5,'IgnoranceProject',NULL,NULL),(6,'GapminderInternal',NULL,NULL),(7,'GapminderGlobal',NULL,NULL),(8,'GapminderSverige',NULL,NULL),(9,'GapminderEspanaSalud',NULL,NULL),(10,'GapminderEspanaBarcelona',NULL,NULL),(11,'GapminderUnitedKingdom',NULL,NULL),(12,'GapminderRussia',NULL,NULL),(13,'GapminderStateminder',NULL,NULL),(14,'GapminderNorge',NULL,NULL),(15,'SneakPeeks',NULL,NULL),(16,'Translators',NULL,NULL),(17,'Reviewers',NULL,NULL),(18,'Proofreaders',NULL,NULL),(19,'Developers',NULL,NULL);
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `group_has_account`
--

LOCK TABLES `group_has_account` WRITE;
/*!40000 ALTER TABLE `group_has_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_has_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `gui_section`
--

LOCK TABLES `gui_section` WRITE;
/*!40000 ALTER TABLE `gui_section` DISABLE KEYS */;
/*!40000 ALTER TABLE `gui_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `gui_section_qa_state`
--

LOCK TABLES `gui_section_qa_state` WRITE;
/*!40000 ALTER TABLE `gui_section_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `gui_section_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `html_chunk`
--

LOCK TABLES `html_chunk` WRITE;
/*!40000 ALTER TABLE `html_chunk` DISABLE KEYS */;
/*!40000 ALTER TABLE `html_chunk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `html_chunk_qa_state`
--

LOCK TABLES `html_chunk_qa_state` WRITE;
/*!40000 ALTER TABLE `html_chunk_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `html_chunk_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `i18n_catalog`
--

LOCK TABLES `i18n_catalog` WRITE;
/*!40000 ALTER TABLE `i18n_catalog` DISABLE KEYS */;
/*!40000 ALTER TABLE `i18n_catalog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `i18n_catalog_qa_state`
--

LOCK TABLES `i18n_catalog_qa_state` WRITE;
/*!40000 ALTER TABLE `i18n_catalog_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `i18n_catalog_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `menu_qa_state`
--

LOCK TABLES `menu_qa_state` WRITE;
/*!40000 ALTER TABLE `menu_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base_clean-db',1409435706,'clean-db'),('m000000_000000_base_core',1409435706,'core'),('m140520_110350_alter_source_message',1409435706,'core'),('m140603_132628_alter_account_table',1409435706,'core'),('m140603_140546_create_account_token_table',1409435706,'core'),('m140610_075257_create_account_login_history_table',1409435706,'core'),('m140610_075351_create_account_password_history_table',1409435706,'core'),('m140611_131806_add_youtube_field',1409435706,'core'),('m140611_142637_qa_attributes',1409435706,'core'),('m140617_135018_add_admin_account',1409435706,'clean-db'),('m140618_114100_i18n',1409435706,'core'),('m140711_110643_i18n',1409435706,'core'),('m140814_131556_add_item_slug_unique_indexes',1409435707,'core'),('m140818_055730_i18n',1409435707,'core'),('m140818_055732_add_item_slug_unique_indexes',1409435708,'core'),('m140820_120803_insert_i18n_catalog_translations',1409435708,'clean-db'),('m140830_171708_no_latin1_in_schema',1409435708,'core'),('m140830_173626_default_utf8_for_schema',1409435708,'core');
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `node`
--

LOCK TABLES `node` WRITE;
/*!40000 ALTER TABLE `node` DISABLE KEYS */;
/*!40000 ALTER TABLE `node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `node_has_group`
--

LOCK TABLES `node_has_group` WRITE;
/*!40000 ALTER TABLE `node_has_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `node_has_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `p3_media`
--

LOCK TABLES `p3_media` WRITE;
/*!40000 ALTER TABLE `p3_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `p3_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `p3_media_translation`
--

LOCK TABLES `p3_media_translation` WRITE;
/*!40000 ALTER TABLE `p3_media_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `p3_media_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `p3_page`
--

LOCK TABLES `p3_page` WRITE;
/*!40000 ALTER TABLE `p3_page` DISABLE KEYS */;
/*!40000 ALTER TABLE `p3_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `p3_page_translation`
--

LOCK TABLES `p3_page_translation` WRITE;
/*!40000 ALTER TABLE `p3_page_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `p3_page_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `p3_widget`
--

LOCK TABLES `p3_widget` WRITE;
/*!40000 ALTER TABLE `p3_widget` DISABLE KEYS */;
/*!40000 ALTER TABLE `p3_widget` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `p3_widget_translation`
--

LOCK TABLES `p3_widget_translation` WRITE;
/*!40000 ALTER TABLE `p3_widget_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `p3_widget_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `page_qa_state`
--

LOCK TABLES `page_qa_state` WRITE;
/*!40000 ALTER TABLE `page_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (1,'Administrator','Admin',NULL,NULL,NULL,0,NULL,NULL,'sv',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `profiles_fields`
--

LOCK TABLES `profiles_fields` WRITE;
/*!40000 ALTER TABLE `profiles_fields` DISABLE KEYS */;
/*!40000 ALTER TABLE `profiles_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Developer'),(2,'SuperAdministrator'),(3,'Authenticated'),(4,'Guest'),(5,'GroupAdministrator'),(6,'GroupPublisher'),(7,'GroupEditor'),(8,'GroupApprover'),(9,'GroupModerator'),(10,'GroupContributor'),(11,'GroupReviewer'),(12,'GroupTranslator'),(13,'GroupMember');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `section`
--

LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `section_qa_state`
--

LOCK TABLES `section_qa_state` WRITE;
/*!40000 ALTER TABLE `section_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `section_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `slideshow_file`
--

LOCK TABLES `slideshow_file` WRITE;
/*!40000 ALTER TABLE `slideshow_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `slideshow_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `slideshow_file_qa_state`
--

LOCK TABLES `slideshow_file_qa_state` WRITE;
/*!40000 ALTER TABLE `slideshow_file_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `slideshow_file_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `snapshot`
--

LOCK TABLES `snapshot` WRITE;
/*!40000 ALTER TABLE `snapshot` DISABLE KEYS */;
/*!40000 ALTER TABLE `snapshot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `snapshot_qa_state`
--

LOCK TABLES `snapshot_qa_state` WRITE;
/*!40000 ALTER TABLE `snapshot_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `snapshot_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `spreadsheet_file`
--

LOCK TABLES `spreadsheet_file` WRITE;
/*!40000 ALTER TABLE `spreadsheet_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `spreadsheet_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `spreadsheet_file_qa_state`
--

LOCK TABLES `spreadsheet_file_qa_state` WRITE;
/*!40000 ALTER TABLE `spreadsheet_file_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `spreadsheet_file_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_audit_trail`
--

LOCK TABLES `tbl_audit_trail` WRITE;
/*!40000 ALTER TABLE `tbl_audit_trail` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_audit_trail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `text_doc`
--

LOCK TABLES `text_doc` WRITE;
/*!40000 ALTER TABLE `text_doc` DISABLE KEYS */;
/*!40000 ALTER TABLE `text_doc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `text_doc_qa_state`
--

LOCK TABLES `text_doc_qa_state` WRITE;
/*!40000 ALTER TABLE `text_doc_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `text_doc_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tool`
--

LOCK TABLES `tool` WRITE;
/*!40000 ALTER TABLE `tool` DISABLE KEYS */;
/*!40000 ALTER TABLE `tool` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tool_qa_state`
--

LOCK TABLES `tool_qa_state` WRITE;
/*!40000 ALTER TABLE `tool_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `tool_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `vector_graphic`
--

LOCK TABLES `vector_graphic` WRITE;
/*!40000 ALTER TABLE `vector_graphic` DISABLE KEYS */;
/*!40000 ALTER TABLE `vector_graphic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `vector_graphic_qa_state`
--

LOCK TABLES `vector_graphic_qa_state` WRITE;
/*!40000 ALTER TABLE `vector_graphic_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `vector_graphic_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `video_file`
--

LOCK TABLES `video_file` WRITE;
/*!40000 ALTER TABLE `video_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `video_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `video_file_qa_state`
--

LOCK TABLES `video_file_qa_state` WRITE;
/*!40000 ALTER TABLE `video_file_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `video_file_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `waffle`
--

LOCK TABLES `waffle` WRITE;
/*!40000 ALTER TABLE `waffle` DISABLE KEYS */;
/*!40000 ALTER TABLE `waffle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `waffle_category`
--

LOCK TABLES `waffle_category` WRITE;
/*!40000 ALTER TABLE `waffle_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `waffle_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `waffle_category_qa_state`
--

LOCK TABLES `waffle_category_qa_state` WRITE;
/*!40000 ALTER TABLE `waffle_category_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `waffle_category_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `waffle_category_thing`
--

LOCK TABLES `waffle_category_thing` WRITE;
/*!40000 ALTER TABLE `waffle_category_thing` DISABLE KEYS */;
/*!40000 ALTER TABLE `waffle_category_thing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `waffle_category_thing_qa_state`
--

LOCK TABLES `waffle_category_thing_qa_state` WRITE;
/*!40000 ALTER TABLE `waffle_category_thing_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `waffle_category_thing_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `waffle_data_source`
--

LOCK TABLES `waffle_data_source` WRITE;
/*!40000 ALTER TABLE `waffle_data_source` DISABLE KEYS */;
/*!40000 ALTER TABLE `waffle_data_source` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `waffle_data_source_qa_state`
--

LOCK TABLES `waffle_data_source_qa_state` WRITE;
/*!40000 ALTER TABLE `waffle_data_source_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `waffle_data_source_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `waffle_indicator`
--

LOCK TABLES `waffle_indicator` WRITE;
/*!40000 ALTER TABLE `waffle_indicator` DISABLE KEYS */;
/*!40000 ALTER TABLE `waffle_indicator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `waffle_indicator_qa_state`
--

LOCK TABLES `waffle_indicator_qa_state` WRITE;
/*!40000 ALTER TABLE `waffle_indicator_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `waffle_indicator_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `waffle_publisher`
--

LOCK TABLES `waffle_publisher` WRITE;
/*!40000 ALTER TABLE `waffle_publisher` DISABLE KEYS */;
/*!40000 ALTER TABLE `waffle_publisher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `waffle_publisher_qa_state`
--

LOCK TABLES `waffle_publisher_qa_state` WRITE;
/*!40000 ALTER TABLE `waffle_publisher_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `waffle_publisher_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `waffle_qa_state`
--

LOCK TABLES `waffle_qa_state` WRITE;
/*!40000 ALTER TABLE `waffle_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `waffle_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `waffle_tag`
--

LOCK TABLES `waffle_tag` WRITE;
/*!40000 ALTER TABLE `waffle_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `waffle_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `waffle_tag_qa_state`
--

LOCK TABLES `waffle_tag_qa_state` WRITE;
/*!40000 ALTER TABLE `waffle_tag_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `waffle_tag_qa_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `waffle_unit`
--

LOCK TABLES `waffle_unit` WRITE;
/*!40000 ALTER TABLE `waffle_unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `waffle_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `waffle_unit_qa_state`
--

LOCK TABLES `waffle_unit_qa_state` WRITE;
/*!40000 ALTER TABLE `waffle_unit_qa_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `waffle_unit_qa_state` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

