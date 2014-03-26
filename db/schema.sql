SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `AuthItem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` VARCHAR(64) NOT NULL,
  `type` INT(11) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `bizrule` TEXT NULL DEFAULT NULL,
  `data` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`name`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `AuthAssignment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` VARCHAR(64) NOT NULL,
  `userid` VARCHAR(64) NOT NULL,
  `bizrule` TEXT NULL DEFAULT NULL,
  `data` TEXT NULL DEFAULT NULL,
  INDEX `fk_authitem_itemname` (`itemname` ASC),
  CONSTRAINT `fk_authitem_itemname`
    FOREIGN KEY (`itemname`)
    REFERENCES `AuthItem` (`name`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `waffle_unit_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waffle_unit_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `name_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `ref_approved` TINYINT(1) NULL DEFAULT NULL,
  `short_name_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `name_approved` TINYINT(1) NULL DEFAULT NULL,
  `name_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `short_name_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `ref_proofed` TINYINT(1) NULL DEFAULT NULL,
  `name_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `AuthItemChild`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` VARCHAR(64) NOT NULL,
  `child` VARCHAR(64) NOT NULL,
  INDEX `fk_authitem_parent` (`parent` ASC),
  INDEX `fk_authitem_child` (`child` ASC),
  CONSTRAINT `fk_authitem_child`
    FOREIGN KEY (`child`)
    REFERENCES `AuthItem` (`name`),
  CONSTRAINT `fk_authitem_parent`
    FOREIGN KEY (`parent`)
    REFERENCES `AuthItem` (`name`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `SourceMessage`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SourceMessage` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `category` VARCHAR(32) NULL DEFAULT NULL,
  `message` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `Message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Message` (
  `id` INT(11) NOT NULL DEFAULT '0',
  `language` VARCHAR(16) NOT NULL DEFAULT '',
  `translation` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `language`),
  CONSTRAINT `FK_Message_SourceMessage`
    FOREIGN KEY (`id`)
    REFERENCES `SourceMessage` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `Rights`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rights` (
  `itemname` VARCHAR(64) NOT NULL,
  `type` INT(11) NOT NULL,
  `weight` INT(11) NOT NULL,
  INDEX `fk_rights_authitem_itemname` (`itemname` ASC),
  CONSTRAINT `fk_rights_authitem_itemname`
    FOREIGN KEY (`itemname`)
    REFERENCES `AuthItem` (`name`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `html_chunk_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `html_chunk_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `markup_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `markup_approved` TINYINT(1) NULL DEFAULT NULL,
  `markup_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `markup_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `menu_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `menu_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `title_approved` TINYINT(1) NULL DEFAULT NULL,
  `slug_approved` TINYINT(1) NULL DEFAULT NULL,
  `pages_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_proofed` TINYINT(1) NULL DEFAULT NULL,
  `slug_proofed` TINYINT(1) NULL DEFAULT NULL,
  `pages_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `migration`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `migration` (
  `version` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `apply_time` INT(11) NULL DEFAULT NULL,
  `module` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  PRIMARY KEY (`version`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `ezc_node`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ezc_node` (
  `workflow_id` INT(10) UNSIGNED NOT NULL,
  `node_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `node_class` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `node_configuration` BLOB NULL DEFAULT NULL,
  PRIMARY KEY (`node_id`),
  INDEX `workflow_id` (`workflow_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `ezc_node_connection`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ezc_node_connection` (
  `node_connection_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `incoming_node_id` INT(10) UNSIGNED NOT NULL,
  `outgoing_node_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`node_connection_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `p3_media`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `p3_media` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(32) NOT NULL,
  `type` VARCHAR(32) NOT NULL DEFAULT 'file',
  `name_id` VARCHAR(64) NULL DEFAULT NULL,
  `default_title` VARCHAR(255) NOT NULL,
  `default_description` TEXT NULL DEFAULT NULL,
  `tree_parent_id` INT(11) NULL,
  `tree_position` INT(11) NULL DEFAULT NULL,
  `custom_data_json` TEXT NULL DEFAULT NULL,
  `original_name` VARCHAR(128) NULL DEFAULT NULL,
  `path` VARCHAR(255) NULL DEFAULT NULL,
  `hash` VARCHAR(64) NULL DEFAULT NULL,
  `mime_type` VARCHAR(128) NULL DEFAULT NULL,
  `size` INT(11) NULL DEFAULT NULL,
  `info_php_json` TEXT NULL DEFAULT NULL,
  `info_image_magick_json` TEXT NULL DEFAULT NULL,
  `access_owner` VARCHAR(64) NOT NULL,
  `access_domain` VARCHAR(8) NOT NULL,
  `access_read` VARCHAR(256) NULL DEFAULT NULL,
  `access_update` VARCHAR(256) NULL DEFAULT NULL,
  `access_delete` VARCHAR(256) NULL DEFAULT NULL,
  `access_append` VARCHAR(256) NULL DEFAULT NULL,
  `copied_from_id` INT(11) NULL DEFAULT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `p3_media_name_id_unique` (`name_id` ASC),
  INDEX `fk_p3_media_p3_media1_idx` (`tree_parent_id` ASC),
  CONSTRAINT `fk_p3_media_p3_media1`
    FOREIGN KEY (`tree_parent_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `p3_media_translation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `p3_media_translation` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `p3_media_id` INT(11) NOT NULL,
  `status` VARCHAR(32) NOT NULL,
  `language` VARCHAR(8) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `access_owner` VARCHAR(64) NOT NULL,
  `access_read` VARCHAR(256) NULL DEFAULT NULL,
  `access_update` VARCHAR(256) NULL DEFAULT NULL,
  `access_delete` VARCHAR(256) NULL DEFAULT NULL,
  `copied_from_id` INT(11) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `p3_media_translation_id_language_unique` (`language` ASC),
  INDEX `fk_p3_media_translation_p3_media1_idx` (`p3_media_id` ASC),
  CONSTRAINT `fk_p3_media_translation_p3_media1`
    FOREIGN KEY (`p3_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `p3_page`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `p3_page` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `default_menu_name` VARCHAR(128) NOT NULL,
  `status` VARCHAR(32) NOT NULL,
  `name_id` VARCHAR(64) NULL DEFAULT NULL,
  `tree_parent_id` INT(11) NULL DEFAULT NULL,
  `tree_position` INT(11) NULL DEFAULT NULL,
  `default_page_title` VARCHAR(255) NULL DEFAULT NULL,
  `layout` VARCHAR(128) NULL DEFAULT NULL,
  `view` VARCHAR(128) NULL DEFAULT NULL,
  `url_json` TEXT NULL DEFAULT NULL,
  `default_url_param` VARCHAR(255) NULL DEFAULT NULL,
  `default_keywords` TEXT NULL DEFAULT NULL,
  `default_description` TEXT NULL DEFAULT NULL,
  `custom_data_json` TEXT NULL DEFAULT NULL,
  `access_owner` VARCHAR(64) NOT NULL,
  `access_domain` VARCHAR(8) NOT NULL,
  `access_read` VARCHAR(256) NULL DEFAULT NULL,
  `access_update` VARCHAR(256) NULL DEFAULT NULL,
  `access_delete` VARCHAR(256) NULL DEFAULT NULL,
  `access_append` VARCHAR(256) NULL DEFAULT NULL,
  `copied_from_id` INT(11) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `p3_page_name_id_unique` (`name_id` ASC),
  INDEX `tree_parent_id` (`tree_parent_id` ASC),
  CONSTRAINT `p3_page_ibfk_1`
    FOREIGN KEY (`tree_parent_id`)
    REFERENCES `p3_page` (`id`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `p3_page_translation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `p3_page_translation` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `p3_page_id` INT(11) NOT NULL,
  `language` VARCHAR(8) NOT NULL,
  `menu_name` VARCHAR(128) NOT NULL,
  `status` VARCHAR(32) NOT NULL,
  `page_title` VARCHAR(255) NULL DEFAULT NULL,
  `url_param` VARCHAR(255) NULL DEFAULT NULL,
  `keywords` TEXT NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `access_owner` VARCHAR(64) NOT NULL,
  `access_read` VARCHAR(256) NULL DEFAULT NULL,
  `access_update` VARCHAR(256) NULL DEFAULT NULL,
  `access_delete` VARCHAR(256) NULL DEFAULT NULL,
  `copied_from_id` INT(11) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `p3_page_translation_id_language_unique` (`p3_page_id` ASC, `language` ASC),
  CONSTRAINT `p3_page_translation_ibfk_1`
    FOREIGN KEY (`p3_page_id`)
    REFERENCES `p3_page` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `p3_widget`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `p3_widget` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(32) NOT NULL,
  `alias` VARCHAR(128) NOT NULL,
  `default_properties_json` TEXT NULL DEFAULT NULL,
  `default_content_html` TEXT NULL DEFAULT NULL,
  `name_id` VARCHAR(64) NULL DEFAULT NULL,
  `container_id` VARCHAR(128) NOT NULL,
  `rank` INT(11) NOT NULL DEFAULT '0',
  `request_param` VARCHAR(128) NULL DEFAULT '*',
  `action_name` VARCHAR(128) NOT NULL DEFAULT '*',
  `controller_id` VARCHAR(128) NOT NULL DEFAULT '*',
  `module_id` VARCHAR(128) NULL DEFAULT '*',
  `session_param` VARCHAR(128) NULL DEFAULT '*',
  `access_owner` VARCHAR(64) NOT NULL,
  `access_domain` VARCHAR(8) NOT NULL,
  `access_read` VARCHAR(256) NULL DEFAULT NULL,
  `access_update` VARCHAR(256) NULL DEFAULT NULL,
  `access_delete` VARCHAR(256) NULL DEFAULT NULL,
  `copied_from_id` INT(11) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `p3_widget_name_id_unique` (`name_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `p3_widget_translation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `p3_widget_translation` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `p3_widget_id` INT(11) NOT NULL,
  `status` VARCHAR(32) NOT NULL,
  `language` VARCHAR(8) NOT NULL,
  `properties_json` TEXT NULL DEFAULT NULL,
  `content_html` TEXT NULL DEFAULT NULL,
  `access_owner` VARCHAR(64) NOT NULL,
  `access_read` VARCHAR(256) NULL DEFAULT NULL,
  `access_update` VARCHAR(256) NULL DEFAULT NULL,
  `access_delete` VARCHAR(256) NULL DEFAULT NULL,
  `copied_from_id` INT(11) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `p3_widget_translation_id_language_unique` (`p3_widget_id` ASC, `language` ASC),
  CONSTRAINT `p3_widget_translation_ibfk_1`
    FOREIGN KEY (`p3_widget_id`)
    REFERENCES `p3_widget` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `i18n_catalog_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `i18n_catalog_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `title_approved` TINYINT(1) NULL DEFAULT NULL,
  `po_contents_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `about_approved` TINYINT(1) NULL DEFAULT NULL,
  `po_contents_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_proofed` TINYINT(1) NULL DEFAULT NULL,
  `po_contents_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `about_proofed` TINYINT(1) NULL DEFAULT NULL,
  `po_contents_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `account`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `account` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(20) NOT NULL DEFAULT '',
  `password` VARCHAR(128) NOT NULL DEFAULT '',
  `email` VARCHAR(128) NOT NULL DEFAULT '',
  `activkey` VARCHAR(128) NOT NULL DEFAULT '',
  `superuser` INT(1) NOT NULL DEFAULT '0',
  `status` INT(1) NOT NULL DEFAULT '0',
  `create_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `user_username` (`username` ASC),
  UNIQUE INDEX `user_email` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `profile`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NULL DEFAULT NULL,
  `last_name` VARCHAR(255) NULL DEFAULT NULL,
  `public_profile` TINYINT(1) NULL,
  `picture_media_id` INT(11) NULL,
  `website` VARCHAR(255) NULL,
  `others_may_contact_me` TINYINT(1) NULL,
  `about` TEXT NULL,
  `lives_in` VARCHAR(255) NULL,
  `language1` VARCHAR(10) NULL DEFAULT NULL,
  `language2` VARCHAR(10) NULL DEFAULT NULL,
  `language3` VARCHAR(10) NULL DEFAULT NULL,
  `language4` VARCHAR(10) NULL DEFAULT NULL,
  `language5` VARCHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  INDEX `fk_profiles_p3_media1_idx` (`picture_media_id` ASC),
  CONSTRAINT `user_profile_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `account` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `fk_profiles_p3_media1`
    FOREIGN KEY (`picture_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2;


-- -----------------------------------------------------
-- Table `profiles_fields`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `profiles_fields` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `varname` VARCHAR(50) NOT NULL DEFAULT '',
  `title` VARCHAR(255) NOT NULL DEFAULT '',
  `field_type` VARCHAR(50) NOT NULL DEFAULT '',
  `field_size` INT(3) NOT NULL DEFAULT '0',
  `field_size_min` INT(3) NOT NULL DEFAULT '0',
  `required` INT(1) NOT NULL DEFAULT '0',
  `match` VARCHAR(255) NOT NULL DEFAULT '',
  `range` VARCHAR(255) NOT NULL DEFAULT '',
  `error_message` VARCHAR(255) NOT NULL DEFAULT '',
  `other_validator` TEXT NULL DEFAULT NULL,
  `default` VARCHAR(255) NOT NULL DEFAULT '',
  `widget` VARCHAR(255) NOT NULL DEFAULT '',
  `widgetparams` TEXT NULL DEFAULT NULL,
  `position` INT(3) NOT NULL DEFAULT '0',
  `visible` INT(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `tool_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tool_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `title_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `exercise_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `exercise_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `title_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `question_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `description_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `thumbnail_media_id_approved` TINYINT(1) NULL DEFAULT NULL,
  `thumbnail_approved` TINYINT(1) NULL DEFAULT NULL,
  `materials_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `question_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `description_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `thumbnail_media_id_proofed` TINYINT(1) NULL DEFAULT NULL,
  `thumbnail_proofed` TINYINT(1) NULL DEFAULT NULL,
  `materials_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `ezc_workflow`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ezc_workflow` (
  `workflow_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `workflow_name` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `workflow_version` INT(10) UNSIGNED NOT NULL DEFAULT '1',
  `workflow_created` INT(11) NOT NULL,
  PRIMARY KEY (`workflow_id`),
  UNIQUE INDEX `name_version` (`workflow_name` ASC, `workflow_version` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `ezc_execution`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ezc_execution` (
  `workflow_id` INT(10) UNSIGNED NOT NULL,
  `execution_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `execution_parent` INT(10) UNSIGNED NULL DEFAULT NULL,
  `execution_started` INT(11) NOT NULL,
  `execution_suspended` INT(11) NULL DEFAULT NULL,
  `execution_variables` BLOB NULL DEFAULT NULL,
  `execution_waiting_for` BLOB NULL DEFAULT NULL,
  `execution_threads` BLOB NULL DEFAULT NULL,
  `execution_next_thread_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`execution_id`),
  INDEX `execution_parent` (`execution_parent` ASC),
  INDEX `fk_execution_workflow1_idx` (`workflow_id` ASC),
  CONSTRAINT `fk_execution_workflow1`
    FOREIGN KEY (`workflow_id`)
    REFERENCES `ezc_workflow` (`workflow_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `ezc_execution_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ezc_execution_state` (
  `execution_id` INT(10) UNSIGNED NOT NULL,
  `node_id` INT(10) UNSIGNED NOT NULL,
  `node_state` BLOB NULL DEFAULT NULL,
  `node_activated_from` BLOB NULL DEFAULT NULL,
  `node_thread_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`execution_id`, `node_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `exam_question_alternative_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `exam_question_alternative_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `markup_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `correct_approved` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `markup_approved` TINYINT(1) NULL DEFAULT NULL,
  `markup_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `correct_proofed` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `markup_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `exam_question_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `exam_question_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `slug_approved` TINYINT(1) NULL DEFAULT NULL,
  `question_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `source_node_id_approved` TINYINT(1) NULL DEFAULT NULL,
  `alternatives_approved` TINYINT(1) NULL DEFAULT NULL,
  `related_approved` TINYINT(1) NULL DEFAULT NULL,
  `question_approved` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `slug_proofed` TINYINT(1) NULL DEFAULT NULL,
  `question_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `source_node_id_proofed` TINYINT(1) NULL DEFAULT NULL,
  `alternatives_proofed` TINYINT(1) NULL DEFAULT NULL,
  `related_proofed` TINYINT(1) NULL DEFAULT NULL,
  `question_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `node`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `node` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `exercise`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `exercise` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT NULL,
  `_title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `_question` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `_description` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `thumbnail_media_id` INT(11) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL DEFAULT NULL,
  `node_id` BIGINT NULL,
  `slug_es` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_de` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `exercise_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  `slug_zh` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ar` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_bg` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ca` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_cs` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_da` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_gb` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_us` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_el` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fil` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hu` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_id` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_iw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_it` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ja` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ko` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_nl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_no` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_br` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ro` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ru` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_th` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_tr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_uk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_vi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_cn` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_tw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_exercise_p3_media1_idx` (`thumbnail_media_id` ASC),
  INDEX `fk_exercise_exercise1_idx` (`cloned_from_id` ASC),
  INDEX `fk_exercise_node1_idx` (`node_id` ASC),
  INDEX `exercise_qa_state_id_fk` (`exercise_qa_state_id` ASC),
  INDEX `fk_exercise_users1_idx` (`owner_id` ASC),
  CONSTRAINT `fk_exercise_users1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `exercise_qa_state_id_fk`
    FOREIGN KEY (`exercise_qa_state_id`)
    REFERENCES `exercise_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_exercise_exercise1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `exercise` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_exercise_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_exercise_p3_media1`
    FOREIGN KEY (`thumbnail_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chapter_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chapter_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `title_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `about_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `thumbnail_media_id_approved` TINYINT(1) NULL DEFAULT NULL,
  `teachers_guide_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `exercises_approved` TINYINT(1) NULL DEFAULT NULL,
  `videos_approved` TINYINT(1) NULL DEFAULT NULL,
  `snapshots_approved` TINYINT(1) NULL DEFAULT NULL,
  `related_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `about_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `thumbnail_media_id_proofed` TINYINT(1) NULL DEFAULT NULL,
  `teachers_guide_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `exercises_proofed` TINYINT(1) NULL DEFAULT NULL,
  `videos_proofed` TINYINT(1) NULL DEFAULT NULL,
  `snapshots_proofed` TINYINT(1) NULL DEFAULT NULL,
  `related_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `ckeditor_style`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ckeditor_style` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(128) NULL DEFAULT NULL,
  `element` VARCHAR(128) NULL DEFAULT NULL,
  `class` VARCHAR(128) NULL DEFAULT NULL,
  `attributes_json` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `ckeditor_template`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ckeditor_template` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(128) NULL DEFAULT NULL,
  `image` VARCHAR(128) NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `html` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `data_article_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `data_article_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `about_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_approved` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `about_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `data_article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `data_article` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT(20) NULL DEFAULT NULL,
  `_title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `_about` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `file_media_id` INT(11) NULL,
  `metadata` TEXT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL DEFAULT NULL,
  `node_id` BIGINT NULL,
  `slug_es` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_de` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `data_article_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  `slug_zh` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ar` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_bg` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ca` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_cs` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_da` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_gb` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_us` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_el` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fil` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hu` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_id` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_iw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_it` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ja` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ko` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_nl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_no` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_br` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ro` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ru` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_th` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_tr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_uk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_vi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_cn` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_tw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_data_chunk_p3_media1_idx` (`file_media_id` ASC),
  INDEX `fk_data_chunk_data_chunk1_idx` (`cloned_from_id` ASC),
  INDEX `fk_data_chunk_node1_idx` (`node_id` ASC),
  INDEX `fk_data_chunk_users1_idx` (`owner_id` ASC),
  INDEX `data_chunk_qa_state_id_fk` (`data_article_qa_state_id` ASC),
  CONSTRAINT `fk_data_chunk_users1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `data_chunk_qa_state_id_fk`
    FOREIGN KEY (`data_article_qa_state_id`)
    REFERENCES `data_article_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_data_chunk_data_chunk1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `data_article` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_data_chunk_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_data_chunk_p3_media1`
    FOREIGN KEY (`file_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `data_source_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `data_source_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `about_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_approved` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `about_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `i18n_catalog`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `i18n_catalog` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT NULL,
  `title` VARCHAR(255) NULL,
  `about` TEXT NULL,
  `i18n_category` VARCHAR(255) NULL,
  `_po_contents` TEXT NULL,
  `pot_import_media_id` INT(11) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL DEFAULT NULL,
  `node_id` BIGINT NULL,
  `i18n_catalog_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_po_file_p3_media1_idx` (`pot_import_media_id` ASC),
  INDEX `po_file_qa_state_id_fk` (`i18n_catalog_qa_state_id` ASC),
  INDEX `fk_po_file_users1_idx` (`owner_id` ASC),
  INDEX `fk_i18n_catalog_i18n_catalog1_idx` (`cloned_from_id` ASC),
  INDEX `fk_i18n_catalog_node1_idx` (`node_id` ASC),
  CONSTRAINT `fk_po_file_users1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_i18n_catalog_i18n_catalog1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `i18n_catalog` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_po_file_p3_media1`
    FOREIGN KEY (`pot_import_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `po_file_qa_state_id_fk`
    FOREIGN KEY (`i18n_catalog_qa_state_id`)
    REFERENCES `i18n_catalog_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_i18n_catalog_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tool`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tool` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT NULL,
  `_title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `_about` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `embed_template` TEXT NULL,
  `i18n_catalog_id` BIGINT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL DEFAULT NULL,
  `node_id` BIGINT NULL,
  `slug_es` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_de` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `tool_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  `slug_zh` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ar` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_bg` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ca` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_cs` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_da` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_gb` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_us` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_el` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fil` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hu` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_id` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_iw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_it` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ja` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ko` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_nl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_no` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_br` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ro` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ru` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_th` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_tr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_uk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_vi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_cn` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_tw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tool_po_file1_idx` (`i18n_catalog_id` ASC),
  INDEX `fk_tool_tool1_idx` (`cloned_from_id` ASC),
  INDEX `fk_tool_node1_idx` (`node_id` ASC),
  INDEX `tool_qa_state_id_fk` (`tool_qa_state_id` ASC),
  INDEX `fk_tool_users1_idx` (`owner_id` ASC),
  CONSTRAINT `fk_tool_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tool_po_file1`
    FOREIGN KEY (`i18n_catalog_id`)
    REFERENCES `i18n_catalog` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tool_tool1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `tool` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tool_users1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `tool_qa_state_id_fk`
    FOREIGN KEY (`tool_qa_state_id`)
    REFERENCES `tool_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `snapshot_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snapshot_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `vizabi_state_approved` TINYINT(1) NULL DEFAULT NULL,
  `thumbnail_media_id_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_approved` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `vizabi_state_proofed` TINYINT(1) NULL DEFAULT NULL,
  `thumbnail_media_id_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `snapshot`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snapshot` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT NULL,
  `vizabi_state` TEXT NULL,
  `embed_override` TEXT NULL,
  `tool_id` BIGINT NULL,
  `_title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `_about` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `thumbnail_media_id` INT(11) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL DEFAULT NULL,
  `node_id` BIGINT NULL,
  `slug_es` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_de` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `snapshot_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  `slug_zh` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ar` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_bg` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ca` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_cs` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_da` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_gb` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_us` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_el` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fil` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hu` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_id` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_iw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_it` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ja` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ko` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_nl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_no` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_br` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ro` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ru` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_th` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_tr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_uk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_vi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_cn` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_tw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_snapshot_tool1_idx` (`tool_id` ASC),
  INDEX `fk_snapshot_node1_idx` (`node_id` ASC),
  INDEX `fk_snapshot_snapshot1_idx` (`cloned_from_id` ASC),
  INDEX `snapshot_qa_state_id_fk` (`snapshot_qa_state_id` ASC),
  INDEX `fk_snapshot_p3_media1_idx` (`thumbnail_media_id` ASC),
  INDEX `fk_snapshot_users1_idx` (`owner_id` ASC),
  CONSTRAINT `fk_snapshot_users1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_snapshot_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_snapshot_p3_media1`
    FOREIGN KEY (`thumbnail_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_snapshot_snapshot1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `snapshot` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_snapshot_tool1`
    FOREIGN KEY (`tool_id`)
    REFERENCES `tool` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `snapshot_qa_state_id_fk`
    FOREIGN KEY (`snapshot_qa_state_id`)
    REFERENCES `snapshot_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `data_source`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `data_source` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT(20) NULL DEFAULT NULL,
  `_title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `_about` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `logo_media_id` INT(11) NULL,
  `mini_logo_media_id` INT(11) NULL,
  `link` VARCHAR(255) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL DEFAULT NULL,
  `node_id` BIGINT NULL,
  `slug_es` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_de` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `data_source_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  `slug_zh` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ar` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_bg` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ca` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_cs` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_da` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_gb` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_us` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_el` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fil` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hu` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_id` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_iw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_it` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ja` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ko` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_nl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_no` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_br` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ro` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ru` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_th` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_tr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_uk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_vi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_cn` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_tw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_data_source_p3_media1_idx` (`logo_media_id` ASC),
  INDEX `fk_data_source_p3_media2_idx` (`mini_logo_media_id` ASC),
  INDEX `fk_data_source_data_source1_idx` (`cloned_from_id` ASC),
  INDEX `fk_data_source_node1_idx` (`node_id` ASC),
  INDEX `data_source_qa_state_id_fk` (`data_source_qa_state_id` ASC),
  INDEX `fk_data_source_users1_idx` (`owner_id` ASC),
  CONSTRAINT `fk_data_source_users1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `data_source_qa_state_id_fk`
    FOREIGN KEY (`data_source_qa_state_id`)
    REFERENCES `data_source_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_data_source_data_source1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `snapshot` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_data_source_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_data_source_p3_media1`
    FOREIGN KEY (`logo_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_data_source_p3_media2`
    FOREIGN KEY (`mini_logo_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `spreadsheet_file_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `spreadsheet_file_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `original_media_id_approved` TINYINT(1) NULL DEFAULT NULL,
  `processed_media_id_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_approved` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `original_media_id_proofed` TINYINT(1) NULL DEFAULT NULL,
  `processed_media_id_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `tbl_audit_trail`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_audit_trail` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `old_value` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `new_value` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `action` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `model` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `field` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `stamp` DATETIME NOT NULL,
  `user_id` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `model_id` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_audit_trail_user_id` (`user_id` ASC),
  INDEX `idx_audit_trail_model_id` (`model_id` ASC),
  INDEX `idx_audit_trail_model` (`model` ASC),
  INDEX `idx_audit_trail_field` (`field` ASC),
  INDEX `idx_audit_trail_action` (`action` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `text_doc_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `text_doc_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `original_media_id_approved` TINYINT(1) NULL DEFAULT NULL,
  `processed_media_id_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_approved` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `original_media_id_proofed` TINYINT(1) NULL DEFAULT NULL,
  `processed_media_id_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `text_doc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `text_doc` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT(20) NULL DEFAULT NULL,
  `_title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `_about` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `original_media_id` INT(11) NULL,
  `generate_processed_media` TINYINT(1) NULL,
  `processed_media_id_en` INT(11) NULL DEFAULT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL DEFAULT NULL,
  `node_id` BIGINT NULL,
  `processed_media_id_es` INT(11) NULL DEFAULT NULL,
  `processed_media_id_hi` INT(11) NULL DEFAULT NULL,
  `processed_media_id_pt` INT(11) NULL DEFAULT NULL,
  `processed_media_id_sv` INT(11) NULL DEFAULT NULL,
  `processed_media_id_de` INT(11) NULL DEFAULT NULL,
  `slug_es` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_de` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `text_doc_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  `slug_zh` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ar` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_bg` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ca` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_cs` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_da` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_gb` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_us` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_el` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fil` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hu` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_id` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_iw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_it` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ja` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ko` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_nl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_no` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_br` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ro` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ru` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_th` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_tr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_uk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_vi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_cn` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_tw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `processed_media_id_zh` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ar` INT(11) NULL DEFAULT NULL,
  `processed_media_id_bg` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ca` INT(11) NULL DEFAULT NULL,
  `processed_media_id_cs` INT(11) NULL DEFAULT NULL,
  `processed_media_id_da` INT(11) NULL DEFAULT NULL,
  `processed_media_id_en_gb` INT(11) NULL DEFAULT NULL,
  `processed_media_id_en_us` INT(11) NULL DEFAULT NULL,
  `processed_media_id_el` INT(11) NULL DEFAULT NULL,
  `processed_media_id_fi` INT(11) NULL DEFAULT NULL,
  `processed_media_id_fil` INT(11) NULL DEFAULT NULL,
  `processed_media_id_fr` INT(11) NULL DEFAULT NULL,
  `processed_media_id_hr` INT(11) NULL DEFAULT NULL,
  `processed_media_id_hu` INT(11) NULL DEFAULT NULL,
  `processed_media_id_id` INT(11) NULL DEFAULT NULL,
  `processed_media_id_iw` INT(11) NULL DEFAULT NULL,
  `processed_media_id_it` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ja` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ko` INT(11) NULL DEFAULT NULL,
  `processed_media_id_lt` INT(11) NULL DEFAULT NULL,
  `processed_media_id_lv` INT(11) NULL DEFAULT NULL,
  `processed_media_id_nl` INT(11) NULL DEFAULT NULL,
  `processed_media_id_no` INT(11) NULL DEFAULT NULL,
  `processed_media_id_pl` INT(11) NULL DEFAULT NULL,
  `processed_media_id_pt_br` INT(11) NULL DEFAULT NULL,
  `processed_media_id_pt_pt` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ro` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ru` INT(11) NULL DEFAULT NULL,
  `processed_media_id_sk` INT(11) NULL DEFAULT NULL,
  `processed_media_id_sl` INT(11) NULL DEFAULT NULL,
  `processed_media_id_sr` INT(11) NULL DEFAULT NULL,
  `processed_media_id_th` INT(11) NULL DEFAULT NULL,
  `processed_media_id_tr` INT(11) NULL DEFAULT NULL,
  `processed_media_id_uk` INT(11) NULL DEFAULT NULL,
  `processed_media_id_vi` INT(11) NULL DEFAULT NULL,
  `processed_media_id_zh_cn` INT(11) NULL DEFAULT NULL,
  `processed_media_id_zh_tw` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_word_file_p3_media1_idx` (`original_media_id` ASC),
  INDEX `fk_word_file_p3_media2_idx` (`processed_media_id_en` ASC),
  INDEX `fk_word_file_word_file1_idx` (`cloned_from_id` ASC),
  INDEX `fk_word_file_node1_idx` (`node_id` ASC),
  INDEX `text_doc_qa_state_id_fk` (`text_doc_qa_state_id` ASC),
  INDEX `fk_word_file_p3_media2_de` (`processed_media_id_de` ASC),
  INDEX `fk_word_file_p3_media2_es` (`processed_media_id_es` ASC),
  INDEX `fk_word_file_p3_media2_hi` (`processed_media_id_hi` ASC),
  INDEX `fk_word_file_p3_media2_pt` (`processed_media_id_pt` ASC),
  INDEX `fk_word_file_p3_media2_sv` (`processed_media_id_sv` ASC),
  INDEX `fk_text_doc_users1_idx` (`owner_id` ASC),
  INDEX `fk_word_file_p3_media2_zh` (`processed_media_id_zh` ASC),
  INDEX `fk_word_file_p3_media2_ar` (`processed_media_id_ar` ASC),
  INDEX `fk_word_file_p3_media2_bg` (`processed_media_id_bg` ASC),
  INDEX `fk_word_file_p3_media2_ca` (`processed_media_id_ca` ASC),
  INDEX `fk_word_file_p3_media2_cs` (`processed_media_id_cs` ASC),
  INDEX `fk_word_file_p3_media2_da` (`processed_media_id_da` ASC),
  INDEX `fk_word_file_p3_media2_en_gb` (`processed_media_id_en_gb` ASC),
  INDEX `fk_word_file_p3_media2_en_us` (`processed_media_id_en_us` ASC),
  INDEX `fk_word_file_p3_media2_el` (`processed_media_id_el` ASC),
  INDEX `fk_word_file_p3_media2_fi` (`processed_media_id_fi` ASC),
  INDEX `fk_word_file_p3_media2_fil` (`processed_media_id_fil` ASC),
  INDEX `fk_word_file_p3_media2_fr` (`processed_media_id_fr` ASC),
  INDEX `fk_word_file_p3_media2_hr` (`processed_media_id_hr` ASC),
  INDEX `fk_word_file_p3_media2_hu` (`processed_media_id_hu` ASC),
  INDEX `fk_word_file_p3_media2_id` (`processed_media_id_id` ASC),
  INDEX `fk_word_file_p3_media2_iw` (`processed_media_id_iw` ASC),
  INDEX `fk_word_file_p3_media2_it` (`processed_media_id_it` ASC),
  INDEX `fk_word_file_p3_media2_ja` (`processed_media_id_ja` ASC),
  INDEX `fk_word_file_p3_media2_ko` (`processed_media_id_ko` ASC),
  INDEX `fk_word_file_p3_media2_lt` (`processed_media_id_lt` ASC),
  INDEX `fk_word_file_p3_media2_lv` (`processed_media_id_lv` ASC),
  INDEX `fk_word_file_p3_media2_nl` (`processed_media_id_nl` ASC),
  INDEX `fk_word_file_p3_media2_no` (`processed_media_id_no` ASC),
  INDEX `fk_word_file_p3_media2_pl` (`processed_media_id_pl` ASC),
  INDEX `fk_word_file_p3_media2_pt_br` (`processed_media_id_pt_br` ASC),
  INDEX `fk_word_file_p3_media2_pt_pt` (`processed_media_id_pt_pt` ASC),
  INDEX `fk_word_file_p3_media2_ro` (`processed_media_id_ro` ASC),
  INDEX `fk_word_file_p3_media2_ru` (`processed_media_id_ru` ASC),
  INDEX `fk_word_file_p3_media2_sk` (`processed_media_id_sk` ASC),
  INDEX `fk_word_file_p3_media2_sl` (`processed_media_id_sl` ASC),
  INDEX `fk_word_file_p3_media2_sr` (`processed_media_id_sr` ASC),
  INDEX `fk_word_file_p3_media2_th` (`processed_media_id_th` ASC),
  INDEX `fk_word_file_p3_media2_tr` (`processed_media_id_tr` ASC),
  INDEX `fk_word_file_p3_media2_uk` (`processed_media_id_uk` ASC),
  INDEX `fk_word_file_p3_media2_vi` (`processed_media_id_vi` ASC),
  INDEX `fk_word_file_p3_media2_zh_cn` (`processed_media_id_zh_cn` ASC),
  INDEX `fk_word_file_p3_media2_zh_tw` (`processed_media_id_zh_tw` ASC),
  CONSTRAINT `fk_text_doc_users1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_word_file_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_word_file_p3_media1`
    FOREIGN KEY (`original_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_word_file_p3_media2`
    FOREIGN KEY (`processed_media_id_en`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_word_file_p3_media2_ar`
    FOREIGN KEY (`processed_media_id_ar`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_bg`
    FOREIGN KEY (`processed_media_id_bg`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_ca`
    FOREIGN KEY (`processed_media_id_ca`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_cs`
    FOREIGN KEY (`processed_media_id_cs`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_da`
    FOREIGN KEY (`processed_media_id_da`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_de`
    FOREIGN KEY (`processed_media_id_de`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_el`
    FOREIGN KEY (`processed_media_id_el`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_en_gb`
    FOREIGN KEY (`processed_media_id_en_gb`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_en_us`
    FOREIGN KEY (`processed_media_id_en_us`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_es`
    FOREIGN KEY (`processed_media_id_es`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_fi`
    FOREIGN KEY (`processed_media_id_fi`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_fil`
    FOREIGN KEY (`processed_media_id_fil`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_fr`
    FOREIGN KEY (`processed_media_id_fr`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_hi`
    FOREIGN KEY (`processed_media_id_hi`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_hr`
    FOREIGN KEY (`processed_media_id_hr`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_hu`
    FOREIGN KEY (`processed_media_id_hu`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_id`
    FOREIGN KEY (`processed_media_id_id`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_it`
    FOREIGN KEY (`processed_media_id_it`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_iw`
    FOREIGN KEY (`processed_media_id_iw`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_ja`
    FOREIGN KEY (`processed_media_id_ja`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_ko`
    FOREIGN KEY (`processed_media_id_ko`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_lt`
    FOREIGN KEY (`processed_media_id_lt`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_lv`
    FOREIGN KEY (`processed_media_id_lv`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_nl`
    FOREIGN KEY (`processed_media_id_nl`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_no`
    FOREIGN KEY (`processed_media_id_no`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_pl`
    FOREIGN KEY (`processed_media_id_pl`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_pt`
    FOREIGN KEY (`processed_media_id_pt`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_pt_br`
    FOREIGN KEY (`processed_media_id_pt_br`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_pt_pt`
    FOREIGN KEY (`processed_media_id_pt_pt`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_ro`
    FOREIGN KEY (`processed_media_id_ro`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_ru`
    FOREIGN KEY (`processed_media_id_ru`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_sk`
    FOREIGN KEY (`processed_media_id_sk`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_sl`
    FOREIGN KEY (`processed_media_id_sl`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_sr`
    FOREIGN KEY (`processed_media_id_sr`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_sv`
    FOREIGN KEY (`processed_media_id_sv`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_th`
    FOREIGN KEY (`processed_media_id_th`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_tr`
    FOREIGN KEY (`processed_media_id_tr`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_uk`
    FOREIGN KEY (`processed_media_id_uk`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_vi`
    FOREIGN KEY (`processed_media_id_vi`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_zh`
    FOREIGN KEY (`processed_media_id_zh`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_zh_cn`
    FOREIGN KEY (`processed_media_id_zh_cn`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_p3_media2_zh_tw`
    FOREIGN KEY (`processed_media_id_zh_tw`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_word_file_word_file1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `text_doc` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `text_doc_qa_state_id_fk`
    FOREIGN KEY (`text_doc_qa_state_id`)
    REFERENCES `text_doc_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `spreadsheet_file`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `spreadsheet_file` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT(20) NULL DEFAULT NULL,
  `_title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `data_source_id` BIGINT NULL,
  `original_media_id` INT(11) NULL,
  `generate_processed_media` TINYINT(1) NULL,
  `processed_media_id_en` INT(11) NULL DEFAULT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL DEFAULT NULL,
  `node_id` BIGINT NULL,
  `processed_media_id_es` INT(11) NULL DEFAULT NULL,
  `processed_media_id_hi` INT(11) NULL DEFAULT NULL,
  `processed_media_id_pt` INT(11) NULL DEFAULT NULL,
  `processed_media_id_sv` INT(11) NULL DEFAULT NULL,
  `processed_media_id_de` INT(11) NULL DEFAULT NULL,
  `processed_media_id_zh` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ar` INT(11) NULL DEFAULT NULL,
  `processed_media_id_bg` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ca` INT(11) NULL DEFAULT NULL,
  `processed_media_id_cs` INT(11) NULL DEFAULT NULL,
  `processed_media_id_da` INT(11) NULL DEFAULT NULL,
  `processed_media_id_en_gb` INT(11) NULL DEFAULT NULL,
  `processed_media_id_en_us` INT(11) NULL DEFAULT NULL,
  `processed_media_id_el` INT(11) NULL DEFAULT NULL,
  `processed_media_id_fi` INT(11) NULL DEFAULT NULL,
  `processed_media_id_fil` INT(11) NULL DEFAULT NULL,
  `processed_media_id_fr` INT(11) NULL DEFAULT NULL,
  `processed_media_id_hr` INT(11) NULL DEFAULT NULL,
  `processed_media_id_hu` INT(11) NULL DEFAULT NULL,
  `processed_media_id_id` INT(11) NULL DEFAULT NULL,
  `processed_media_id_iw` INT(11) NULL DEFAULT NULL,
  `processed_media_id_it` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ja` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ko` INT(11) NULL DEFAULT NULL,
  `processed_media_id_lt` INT(11) NULL DEFAULT NULL,
  `processed_media_id_lv` INT(11) NULL DEFAULT NULL,
  `processed_media_id_nl` INT(11) NULL DEFAULT NULL,
  `processed_media_id_no` INT(11) NULL DEFAULT NULL,
  `processed_media_id_pl` INT(11) NULL DEFAULT NULL,
  `processed_media_id_pt_br` INT(11) NULL DEFAULT NULL,
  `processed_media_id_pt_pt` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ro` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ru` INT(11) NULL DEFAULT NULL,
  `processed_media_id_sk` INT(11) NULL DEFAULT NULL,
  `processed_media_id_sl` INT(11) NULL DEFAULT NULL,
  `processed_media_id_sr` INT(11) NULL DEFAULT NULL,
  `processed_media_id_th` INT(11) NULL DEFAULT NULL,
  `processed_media_id_tr` INT(11) NULL DEFAULT NULL,
  `processed_media_id_uk` INT(11) NULL DEFAULT NULL,
  `processed_media_id_vi` INT(11) NULL DEFAULT NULL,
  `processed_media_id_zh_cn` INT(11) NULL DEFAULT NULL,
  `processed_media_id_zh_tw` INT(11) NULL DEFAULT NULL,
  `spreadsheet_file_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_spreadsheet_file_data_source1_idx` (`data_source_id` ASC),
  INDEX `fk_spreadsheet_file_p3_media1_idx` (`original_media_id` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_idx` (`processed_media_id_en` ASC),
  INDEX `fk_spreadsheet_file_spreadsheet_file1_idx` (`cloned_from_id` ASC),
  INDEX `fk_spreadsheet_file_node1_idx` (`node_id` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_de` (`processed_media_id_de` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_es` (`processed_media_id_es` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_hi` (`processed_media_id_hi` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_pt` (`processed_media_id_pt` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_sv` (`processed_media_id_sv` ASC),
  INDEX `fk_spreadsheet_file_users1_idx` (`owner_id` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_zh` (`processed_media_id_zh` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_ar` (`processed_media_id_ar` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_bg` (`processed_media_id_bg` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_ca` (`processed_media_id_ca` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_cs` (`processed_media_id_cs` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_da` (`processed_media_id_da` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_en_gb` (`processed_media_id_en_gb` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_en_us` (`processed_media_id_en_us` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_el` (`processed_media_id_el` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_fi` (`processed_media_id_fi` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_fil` (`processed_media_id_fil` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_fr` (`processed_media_id_fr` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_hr` (`processed_media_id_hr` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_hu` (`processed_media_id_hu` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_id` (`processed_media_id_id` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_iw` (`processed_media_id_iw` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_it` (`processed_media_id_it` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_ja` (`processed_media_id_ja` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_ko` (`processed_media_id_ko` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_lt` (`processed_media_id_lt` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_lv` (`processed_media_id_lv` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_nl` (`processed_media_id_nl` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_no` (`processed_media_id_no` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_pl` (`processed_media_id_pl` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_pt_br` (`processed_media_id_pt_br` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_pt_pt` (`processed_media_id_pt_pt` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_ro` (`processed_media_id_ro` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_ru` (`processed_media_id_ru` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_sk` (`processed_media_id_sk` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_sl` (`processed_media_id_sl` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_sr` (`processed_media_id_sr` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_th` (`processed_media_id_th` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_tr` (`processed_media_id_tr` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_uk` (`processed_media_id_uk` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_vi` (`processed_media_id_vi` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_zh_cn` (`processed_media_id_zh_cn` ASC),
  INDEX `fk_spreadsheet_file_p3_media2_zh_tw` (`processed_media_id_zh_tw` ASC),
  INDEX `spreadsheet_file_qa_state_id_fk` (`spreadsheet_file_qa_state_id` ASC),
  CONSTRAINT `spreadsheet_file_qa_state_id_fk`
    FOREIGN KEY (`spreadsheet_file_qa_state_id`)
    REFERENCES `spreadsheet_file_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_spreadsheet_file_data_source1`
    FOREIGN KEY (`data_source_id`)
    REFERENCES `data_source` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_spreadsheet_file_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_spreadsheet_file_p3_media1`
    FOREIGN KEY (`original_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_spreadsheet_file_p3_media2`
    FOREIGN KEY (`processed_media_id_en`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_spreadsheet_file_p3_media2_ar`
    FOREIGN KEY (`processed_media_id_ar`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_bg`
    FOREIGN KEY (`processed_media_id_bg`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_ca`
    FOREIGN KEY (`processed_media_id_ca`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_cs`
    FOREIGN KEY (`processed_media_id_cs`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_da`
    FOREIGN KEY (`processed_media_id_da`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_de`
    FOREIGN KEY (`processed_media_id_de`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_el`
    FOREIGN KEY (`processed_media_id_el`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_en_gb`
    FOREIGN KEY (`processed_media_id_en_gb`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_en_us`
    FOREIGN KEY (`processed_media_id_en_us`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_es`
    FOREIGN KEY (`processed_media_id_es`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_fi`
    FOREIGN KEY (`processed_media_id_fi`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_fil`
    FOREIGN KEY (`processed_media_id_fil`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_fr`
    FOREIGN KEY (`processed_media_id_fr`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_hi`
    FOREIGN KEY (`processed_media_id_hi`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_hr`
    FOREIGN KEY (`processed_media_id_hr`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_hu`
    FOREIGN KEY (`processed_media_id_hu`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_id`
    FOREIGN KEY (`processed_media_id_id`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_it`
    FOREIGN KEY (`processed_media_id_it`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_iw`
    FOREIGN KEY (`processed_media_id_iw`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_ja`
    FOREIGN KEY (`processed_media_id_ja`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_ko`
    FOREIGN KEY (`processed_media_id_ko`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_lt`
    FOREIGN KEY (`processed_media_id_lt`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_lv`
    FOREIGN KEY (`processed_media_id_lv`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_nl`
    FOREIGN KEY (`processed_media_id_nl`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_no`
    FOREIGN KEY (`processed_media_id_no`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_pl`
    FOREIGN KEY (`processed_media_id_pl`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_pt`
    FOREIGN KEY (`processed_media_id_pt`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_pt_br`
    FOREIGN KEY (`processed_media_id_pt_br`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_pt_pt`
    FOREIGN KEY (`processed_media_id_pt_pt`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_ro`
    FOREIGN KEY (`processed_media_id_ro`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_ru`
    FOREIGN KEY (`processed_media_id_ru`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_sk`
    FOREIGN KEY (`processed_media_id_sk`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_sl`
    FOREIGN KEY (`processed_media_id_sl`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_sr`
    FOREIGN KEY (`processed_media_id_sr`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_sv`
    FOREIGN KEY (`processed_media_id_sv`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_th`
    FOREIGN KEY (`processed_media_id_th`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_tr`
    FOREIGN KEY (`processed_media_id_tr`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_uk`
    FOREIGN KEY (`processed_media_id_uk`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_vi`
    FOREIGN KEY (`processed_media_id_vi`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_zh`
    FOREIGN KEY (`processed_media_id_zh`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_zh_cn`
    FOREIGN KEY (`processed_media_id_zh_cn`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_p3_media2_zh_tw`
    FOREIGN KEY (`processed_media_id_zh_tw`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_spreadsheet_file_spreadsheet_file1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `spreadsheet_file` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_spreadsheet_file_users1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ezc_variable_handler`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ezc_variable_handler` (
  `workflow_id` INT(10) UNSIGNED NOT NULL,
  `variable` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `class` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  PRIMARY KEY (`workflow_id`, `class`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `vector_graphic_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vector_graphic_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `original_media_id_approved` TINYINT(1) NULL DEFAULT NULL,
  `processed_media_id_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_approved` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `original_media_id_proofed` TINYINT(1) NULL DEFAULT NULL,
  `processed_media_id_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `video_file_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `video_file_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `title_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `clip_mp4_media_id_approved` TINYINT(1) NULL DEFAULT NULL,
  `thumbnail_media_id_approved` TINYINT(1) NULL DEFAULT NULL,
  `clip_webm_media_id_approved` TINYINT(1) NULL DEFAULT NULL,
  `about_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `subtitles_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_approved` TINYINT(1) NULL DEFAULT NULL,
  `subtitles_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `clip_mp4_media_id_proofed` TINYINT(1) NULL DEFAULT NULL,
  `thumbnail_media_id_proofed` TINYINT(1) NULL DEFAULT NULL,
  `clip_webm_media_id_proofed` TINYINT(1) NULL DEFAULT NULL,
  `subtitles_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `about_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_proofed` TINYINT(1) NULL DEFAULT NULL,
  `subtitles_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `video_file`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `video_file` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT(20) NULL DEFAULT NULL,
  `_title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `_caption` VARCHAR(255) NULL,
  `slug_en` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `_about` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `thumbnail_media_id` INT(11) NULL,
  `clip_webm_media_id` INT(11) NULL,
  `clip_mp4_media_id` INT(11) NULL,
  `_subtitles` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `subtitles_import_media_id` INT(11) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL DEFAULT NULL,
  `node_id` BIGINT NULL,
  `slug_es` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_de` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `video_file_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  `slug_zh` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ar` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_bg` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ca` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_cs` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_da` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_gb` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_us` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_el` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fil` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hu` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_id` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_iw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_it` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ja` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ko` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_nl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_no` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_br` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ro` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ru` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_th` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_tr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_uk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_vi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_cn` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_tw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_video_file_p3_media3_idx` (`thumbnail_media_id` ASC),
  INDEX `fk_video_file_video_file1_idx` (`cloned_from_id` ASC),
  INDEX `fk_video_file_node1_idx` (`node_id` ASC),
  INDEX `video_file_qa_state_id_fk` (`video_file_qa_state_id` ASC),
  INDEX `fk_video_file_p3_media4_idx` (`subtitles_import_media_id` ASC),
  INDEX `fk_video_file_users1_idx` (`owner_id` ASC),
  INDEX `fk_video_file_p3_media1_idx` (`clip_webm_media_id` ASC),
  INDEX `fk_video_file_p3_media2_idx` (`clip_mp4_media_id` ASC),
  CONSTRAINT `fk_video_file_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_video_file_p3_media3`
    FOREIGN KEY (`thumbnail_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_video_file_p3_media4`
    FOREIGN KEY (`subtitles_import_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_video_file_users1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_video_file_video_file1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `video_file` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `video_file_qa_state_id_fk`
    FOREIGN KEY (`video_file_qa_state_id`)
    REFERENCES `video_file_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_video_file_p3_media1`
    FOREIGN KEY (`clip_webm_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_video_file_p3_media2`
    FOREIGN KEY (`clip_mp4_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `slideshow_file_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `slideshow_file_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `original_media_id_approved` TINYINT(1) NULL DEFAULT NULL,
  `processed_media_id_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_approved` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `original_media_id_proofed` TINYINT(1) NULL DEFAULT NULL,
  `processed_media_id_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `section_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `section_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `title_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `page_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `page_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `title_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `page`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `page` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT NULL,
  `_title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `_about` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL DEFAULT NULL,
  `node_id` BIGINT NULL,
  `slug_es` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_de` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ar` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_bg` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ca` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_cs` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_da` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_gb` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_us` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_el` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fil` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hu` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_id` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_iw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_it` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ja` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ko` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_nl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_no` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_br` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ro` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ru` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_th` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_tr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_uk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_vi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_cn` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_tw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `page_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_page_page1_idx` (`cloned_from_id` ASC),
  INDEX `fk_page_node1_idx` (`node_id` ASC),
  INDEX `fk_page_users1_idx` (`owner_id` ASC),
  INDEX `page_qa_state_id_fk` (`page_qa_state_id` ASC),
  CONSTRAINT `page_qa_state_id_fk`
    FOREIGN KEY (`page_qa_state_id`)
    REFERENCES `page_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_page_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_page_page1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `page` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_page_users1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `section`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `section` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT NULL,
  `page_id` BIGINT NOT NULL,
  `_title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `_menu_label` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL,
  `node_id` BIGINT NULL,
  `slug_es` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_de` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ar` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_bg` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ca` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_cs` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_da` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_gb` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_us` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_el` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fil` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hu` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_id` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_iw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_it` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ja` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ko` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_nl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_no` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_br` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ro` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ru` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_th` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_tr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_uk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_vi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_cn` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_tw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `section_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_section_node1_idx` (`node_id` ASC),
  INDEX `fk_section_page1_idx` (`page_id` ASC),
  INDEX `section_qa_state_id_fk` (`section_qa_state_id` ASC),
  INDEX `fk_section_section1_idx` (`cloned_from_id` ASC),
  INDEX `fk_section_account1_idx` (`owner_id` ASC),
  CONSTRAINT `section_qa_state_id_fk`
    FOREIGN KEY (`section_qa_state_id`)
    REFERENCES `section_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_section_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_section_page1`
    FOREIGN KEY (`page_id`)
    REFERENCES `page` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_section_section1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `section` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_section_account1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `slideshow_file`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `slideshow_file` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT(20) NULL,
  `_title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `_about` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `original_media_id` INT(11) NULL,
  `generate_processed_media` TINYINT(1) NULL,
  `processed_media_id_en` INT(11) NULL DEFAULT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL DEFAULT NULL,
  `node_id` BIGINT NULL,
  `processed_media_id_es` INT(11) NULL DEFAULT NULL,
  `processed_media_id_hi` INT(11) NULL DEFAULT NULL,
  `processed_media_id_pt` INT(11) NULL DEFAULT NULL,
  `processed_media_id_sv` INT(11) NULL DEFAULT NULL,
  `processed_media_id_de` INT(11) NULL DEFAULT NULL,
  `slideshow_file_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  `slug_es` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_de` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ar` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_bg` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ca` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_cs` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_da` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_gb` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_us` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_el` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fil` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hu` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_id` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_iw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_it` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ja` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ko` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_nl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_no` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_br` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ro` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ru` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_th` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_tr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_uk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_vi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_cn` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_tw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `processed_media_id_zh` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ar` INT(11) NULL DEFAULT NULL,
  `processed_media_id_bg` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ca` INT(11) NULL DEFAULT NULL,
  `processed_media_id_cs` INT(11) NULL DEFAULT NULL,
  `processed_media_id_da` INT(11) NULL DEFAULT NULL,
  `processed_media_id_en_gb` INT(11) NULL DEFAULT NULL,
  `processed_media_id_en_us` INT(11) NULL DEFAULT NULL,
  `processed_media_id_el` INT(11) NULL DEFAULT NULL,
  `processed_media_id_fi` INT(11) NULL DEFAULT NULL,
  `processed_media_id_fil` INT(11) NULL DEFAULT NULL,
  `processed_media_id_fr` INT(11) NULL DEFAULT NULL,
  `processed_media_id_hr` INT(11) NULL DEFAULT NULL,
  `processed_media_id_hu` INT(11) NULL DEFAULT NULL,
  `processed_media_id_id` INT(11) NULL DEFAULT NULL,
  `processed_media_id_iw` INT(11) NULL DEFAULT NULL,
  `processed_media_id_it` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ja` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ko` INT(11) NULL DEFAULT NULL,
  `processed_media_id_lt` INT(11) NULL DEFAULT NULL,
  `processed_media_id_lv` INT(11) NULL DEFAULT NULL,
  `processed_media_id_nl` INT(11) NULL DEFAULT NULL,
  `processed_media_id_no` INT(11) NULL DEFAULT NULL,
  `processed_media_id_pl` INT(11) NULL DEFAULT NULL,
  `processed_media_id_pt_br` INT(11) NULL DEFAULT NULL,
  `processed_media_id_pt_pt` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ro` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ru` INT(11) NULL DEFAULT NULL,
  `processed_media_id_sk` INT(11) NULL DEFAULT NULL,
  `processed_media_id_sl` INT(11) NULL DEFAULT NULL,
  `processed_media_id_sr` INT(11) NULL DEFAULT NULL,
  `processed_media_id_th` INT(11) NULL DEFAULT NULL,
  `processed_media_id_tr` INT(11) NULL DEFAULT NULL,
  `processed_media_id_uk` INT(11) NULL DEFAULT NULL,
  `processed_media_id_vi` INT(11) NULL DEFAULT NULL,
  `processed_media_id_zh_cn` INT(11) NULL DEFAULT NULL,
  `processed_media_id_zh_tw` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_slideshow_file_p3_media1_idx` (`original_media_id` ASC),
  INDEX `fk_slideshow_file_p3_media2_idx` (`processed_media_id_en` ASC),
  INDEX `fk_slideshow_file_slideshow_file1_idx` (`cloned_from_id` ASC),
  INDEX `fk_slideshow_file_node1_idx` (`node_id` ASC),
  INDEX `slideshow_file_qa_state_id_fk` (`slideshow_file_qa_state_id` ASC),
  INDEX `fk_slideshow_file_p3_media2_de` (`processed_media_id_de` ASC),
  INDEX `fk_slideshow_file_p3_media2_es` (`processed_media_id_es` ASC),
  INDEX `fk_slideshow_file_p3_media2_hi` (`processed_media_id_hi` ASC),
  INDEX `fk_slideshow_file_p3_media2_pt` (`processed_media_id_pt` ASC),
  INDEX `fk_slideshow_file_p3_media2_sv` (`processed_media_id_sv` ASC),
  INDEX `fk_slideshow_file_users1_idx` (`owner_id` ASC),
  INDEX `fk_slideshow_file_p3_media2_zh` (`processed_media_id_zh` ASC),
  INDEX `fk_slideshow_file_p3_media2_ar` (`processed_media_id_ar` ASC),
  INDEX `fk_slideshow_file_p3_media2_bg` (`processed_media_id_bg` ASC),
  INDEX `fk_slideshow_file_p3_media2_ca` (`processed_media_id_ca` ASC),
  INDEX `fk_slideshow_file_p3_media2_cs` (`processed_media_id_cs` ASC),
  INDEX `fk_slideshow_file_p3_media2_da` (`processed_media_id_da` ASC),
  INDEX `fk_slideshow_file_p3_media2_en_gb` (`processed_media_id_en_gb` ASC),
  INDEX `fk_slideshow_file_p3_media2_en_us` (`processed_media_id_en_us` ASC),
  INDEX `fk_slideshow_file_p3_media2_el` (`processed_media_id_el` ASC),
  INDEX `fk_slideshow_file_p3_media2_fi` (`processed_media_id_fi` ASC),
  INDEX `fk_slideshow_file_p3_media2_fil` (`processed_media_id_fil` ASC),
  INDEX `fk_slideshow_file_p3_media2_fr` (`processed_media_id_fr` ASC),
  INDEX `fk_slideshow_file_p3_media2_hr` (`processed_media_id_hr` ASC),
  INDEX `fk_slideshow_file_p3_media2_hu` (`processed_media_id_hu` ASC),
  INDEX `fk_slideshow_file_p3_media2_id` (`processed_media_id_id` ASC),
  INDEX `fk_slideshow_file_p3_media2_iw` (`processed_media_id_iw` ASC),
  INDEX `fk_slideshow_file_p3_media2_it` (`processed_media_id_it` ASC),
  INDEX `fk_slideshow_file_p3_media2_ja` (`processed_media_id_ja` ASC),
  INDEX `fk_slideshow_file_p3_media2_ko` (`processed_media_id_ko` ASC),
  INDEX `fk_slideshow_file_p3_media2_lt` (`processed_media_id_lt` ASC),
  INDEX `fk_slideshow_file_p3_media2_lv` (`processed_media_id_lv` ASC),
  INDEX `fk_slideshow_file_p3_media2_nl` (`processed_media_id_nl` ASC),
  INDEX `fk_slideshow_file_p3_media2_no` (`processed_media_id_no` ASC),
  INDEX `fk_slideshow_file_p3_media2_pl` (`processed_media_id_pl` ASC),
  INDEX `fk_slideshow_file_p3_media2_pt_br` (`processed_media_id_pt_br` ASC),
  INDEX `fk_slideshow_file_p3_media2_pt_pt` (`processed_media_id_pt_pt` ASC),
  INDEX `fk_slideshow_file_p3_media2_ro` (`processed_media_id_ro` ASC),
  INDEX `fk_slideshow_file_p3_media2_ru` (`processed_media_id_ru` ASC),
  INDEX `fk_slideshow_file_p3_media2_sk` (`processed_media_id_sk` ASC),
  INDEX `fk_slideshow_file_p3_media2_sl` (`processed_media_id_sl` ASC),
  INDEX `fk_slideshow_file_p3_media2_sr` (`processed_media_id_sr` ASC),
  INDEX `fk_slideshow_file_p3_media2_th` (`processed_media_id_th` ASC),
  INDEX `fk_slideshow_file_p3_media2_tr` (`processed_media_id_tr` ASC),
  INDEX `fk_slideshow_file_p3_media2_uk` (`processed_media_id_uk` ASC),
  INDEX `fk_slideshow_file_p3_media2_vi` (`processed_media_id_vi` ASC),
  INDEX `fk_slideshow_file_p3_media2_zh_cn` (`processed_media_id_zh_cn` ASC),
  INDEX `fk_slideshow_file_p3_media2_zh_tw` (`processed_media_id_zh_tw` ASC),
  CONSTRAINT `fk_slideshow_file_users1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_slideshow_file_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_slideshow_file_p3_media1`
    FOREIGN KEY (`original_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_slideshow_file_p3_media2`
    FOREIGN KEY (`processed_media_id_en`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_slideshow_file_p3_media2_ar`
    FOREIGN KEY (`processed_media_id_ar`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_bg`
    FOREIGN KEY (`processed_media_id_bg`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_ca`
    FOREIGN KEY (`processed_media_id_ca`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_cs`
    FOREIGN KEY (`processed_media_id_cs`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_da`
    FOREIGN KEY (`processed_media_id_da`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_de`
    FOREIGN KEY (`processed_media_id_de`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_el`
    FOREIGN KEY (`processed_media_id_el`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_en_gb`
    FOREIGN KEY (`processed_media_id_en_gb`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_en_us`
    FOREIGN KEY (`processed_media_id_en_us`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_es`
    FOREIGN KEY (`processed_media_id_es`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_fi`
    FOREIGN KEY (`processed_media_id_fi`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_fil`
    FOREIGN KEY (`processed_media_id_fil`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_fr`
    FOREIGN KEY (`processed_media_id_fr`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_hi`
    FOREIGN KEY (`processed_media_id_hi`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_hr`
    FOREIGN KEY (`processed_media_id_hr`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_hu`
    FOREIGN KEY (`processed_media_id_hu`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_id`
    FOREIGN KEY (`processed_media_id_id`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_it`
    FOREIGN KEY (`processed_media_id_it`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_iw`
    FOREIGN KEY (`processed_media_id_iw`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_ja`
    FOREIGN KEY (`processed_media_id_ja`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_ko`
    FOREIGN KEY (`processed_media_id_ko`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_lt`
    FOREIGN KEY (`processed_media_id_lt`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_lv`
    FOREIGN KEY (`processed_media_id_lv`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_nl`
    FOREIGN KEY (`processed_media_id_nl`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_no`
    FOREIGN KEY (`processed_media_id_no`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_pl`
    FOREIGN KEY (`processed_media_id_pl`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_pt`
    FOREIGN KEY (`processed_media_id_pt`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_pt_br`
    FOREIGN KEY (`processed_media_id_pt_br`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_pt_pt`
    FOREIGN KEY (`processed_media_id_pt_pt`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_ro`
    FOREIGN KEY (`processed_media_id_ro`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_ru`
    FOREIGN KEY (`processed_media_id_ru`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_sk`
    FOREIGN KEY (`processed_media_id_sk`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_sl`
    FOREIGN KEY (`processed_media_id_sl`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_sr`
    FOREIGN KEY (`processed_media_id_sr`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_sv`
    FOREIGN KEY (`processed_media_id_sv`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_th`
    FOREIGN KEY (`processed_media_id_th`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_tr`
    FOREIGN KEY (`processed_media_id_tr`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_uk`
    FOREIGN KEY (`processed_media_id_uk`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_vi`
    FOREIGN KEY (`processed_media_id_vi`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_zh`
    FOREIGN KEY (`processed_media_id_zh`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_zh_cn`
    FOREIGN KEY (`processed_media_id_zh_cn`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_p3_media2_zh_tw`
    FOREIGN KEY (`processed_media_id_zh_tw`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_slideshow_file_slideshow_file1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `slideshow_file` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `slideshow_file_qa_state_id_fk`
    FOREIGN KEY (`slideshow_file_qa_state_id`)
    REFERENCES `slideshow_file_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `chapter`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chapter` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT NULL,
  `_title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `thumbnail_media_id` INT(11) NULL,
  `_about` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `_teachers_guide` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL DEFAULT NULL,
  `node_id` BIGINT NULL,
  `slug_es` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_de` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `chapter_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  `slug_zh` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ar` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_bg` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ca` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_cs` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_da` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_gb` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_us` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_el` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fil` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hu` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_id` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_iw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_it` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ja` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ko` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_nl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_no` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_br` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ro` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ru` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_th` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_tr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_uk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_vi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_cn` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_tw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_chapter_p3_media1_idx` (`thumbnail_media_id` ASC),
  INDEX `fk_chapter_chapter1_idx` (`cloned_from_id` ASC),
  INDEX `fk_chapter_node1_idx` (`node_id` ASC),
  INDEX `chapter_qa_state_id_fk` (`chapter_qa_state_id` ASC),
  INDEX `fk_chapter_users1_idx` (`owner_id` ASC),
  CONSTRAINT `fk_chapter_users1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `chapter_qa_state_id_fk`
    FOREIGN KEY (`chapter_qa_state_id`)
    REFERENCES `chapter_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_chapter_chapter1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `chapter` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_chapter_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_chapter_p3_media1`
    FOREIGN KEY (`thumbnail_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gui_section_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gui_section_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `title_approved` TINYINT(1) NULL DEFAULT NULL,
  `slug_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_proofed` TINYINT(1) NULL DEFAULT NULL,
  `slug_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `html_chunk`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `html_chunk` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT(20) NULL DEFAULT NULL,
  `_markup` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL DEFAULT NULL,
  `node_id` BIGINT NULL,
  `html_chunk_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_html_chunk_html_chunk1_idx` (`cloned_from_id` ASC),
  INDEX `fk_html_chunk_node1_idx` (`node_id` ASC),
  INDEX `fk_html_chunk_users1_idx` (`owner_id` ASC),
  INDEX `html_chunk_qa_state_id_fk` (`html_chunk_qa_state_id` ASC),
  CONSTRAINT `html_chunk_qa_state_id_fk`
    FOREIGN KEY (`html_chunk_qa_state_id`)
    REFERENCES `html_chunk_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_html_chunk_html_chunk1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `html_chunk` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_html_chunk_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_html_chunk_users1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `download_link_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `download_link_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `file_media_id_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_approved` TINYINT(1) NULL DEFAULT NULL,
  `file_media_id_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `download_link`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `download_link` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT(20) NULL DEFAULT NULL,
  `_title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `file_media_id` INT(11) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL DEFAULT NULL,
  `node_id` BIGINT NULL,
  `download_link_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_download_link_p3_media1_idx` (`file_media_id` ASC),
  INDEX `fk_download_link_download_link1_idx` (`cloned_from_id` ASC),
  INDEX `fk_download_link_node1_idx` (`node_id` ASC),
  INDEX `fk_download_link_users1_idx` (`owner_id` ASC),
  INDEX `download_link_qa_state_id_fk` (`download_link_qa_state_id` ASC),
  CONSTRAINT `fk_download_link_users1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `download_link_qa_state_id_fk`
    FOREIGN KEY (`download_link_qa_state_id`)
    REFERENCES `download_link_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_download_link_download_link1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `download_link` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_download_link_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_download_link_p3_media1`
    FOREIGN KEY (`file_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `exam_question`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `exam_question` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT(20) NULL DEFAULT NULL,
  `slug_en` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `_question` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `source_node_id` BIGINT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL DEFAULT NULL,
  `node_id` BIGINT NULL,
  `slug_es` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_de` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `exam_question_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  `slug_zh` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ar` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_bg` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ca` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_cs` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_da` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_gb` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_us` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_el` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fil` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hu` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_id` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_iw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_it` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ja` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ko` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_nl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_no` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_br` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ro` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ru` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_th` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_tr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_uk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_vi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_cn` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_tw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_exam_question_exam_question1_idx` (`cloned_from_id` ASC),
  INDEX `fk_exam_question_node1_idx` (`node_id` ASC),
  INDEX `fk_exam_question_node2_idx` (`source_node_id` ASC),
  INDEX `exam_question_qa_state_id_fk` (`exam_question_qa_state_id` ASC),
  INDEX `fk_exam_question_users1_idx` (`owner_id` ASC),
  CONSTRAINT `exam_question_qa_state_id_fk`
    FOREIGN KEY (`exam_question_qa_state_id`)
    REFERENCES `exam_question_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_exam_question_exam_question1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `snapshot` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_exam_question_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_exam_question_node2`
    FOREIGN KEY (`source_node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_exam_question_users1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vector_graphic`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vector_graphic` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT(20) NULL DEFAULT NULL,
  `_title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `_about` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `original_media_id` INT(11) NULL,
  `processed_media_id_en` INT(11) NULL DEFAULT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL DEFAULT NULL,
  `node_id` BIGINT NULL,
  `slug_es` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_de` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `processed_media_id_es` INT(11) NULL DEFAULT NULL,
  `processed_media_id_hi` INT(11) NULL DEFAULT NULL,
  `processed_media_id_pt` INT(11) NULL DEFAULT NULL,
  `processed_media_id_sv` INT(11) NULL DEFAULT NULL,
  `processed_media_id_de` INT(11) NULL DEFAULT NULL,
  `vector_graphic_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  `slug_zh` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ar` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_bg` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ca` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_cs` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_da` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_gb` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_us` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_el` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fil` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hu` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_id` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_iw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_it` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ja` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ko` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_nl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_no` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_br` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ro` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ru` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_th` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_tr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_uk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_vi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_cn` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_tw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `processed_media_id_zh` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ar` INT(11) NULL DEFAULT NULL,
  `processed_media_id_bg` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ca` INT(11) NULL DEFAULT NULL,
  `processed_media_id_cs` INT(11) NULL DEFAULT NULL,
  `processed_media_id_da` INT(11) NULL DEFAULT NULL,
  `processed_media_id_en_gb` INT(11) NULL DEFAULT NULL,
  `processed_media_id_en_us` INT(11) NULL DEFAULT NULL,
  `processed_media_id_el` INT(11) NULL DEFAULT NULL,
  `processed_media_id_fi` INT(11) NULL DEFAULT NULL,
  `processed_media_id_fil` INT(11) NULL DEFAULT NULL,
  `processed_media_id_fr` INT(11) NULL DEFAULT NULL,
  `processed_media_id_hr` INT(11) NULL DEFAULT NULL,
  `processed_media_id_hu` INT(11) NULL DEFAULT NULL,
  `processed_media_id_id` INT(11) NULL DEFAULT NULL,
  `processed_media_id_iw` INT(11) NULL DEFAULT NULL,
  `processed_media_id_it` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ja` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ko` INT(11) NULL DEFAULT NULL,
  `processed_media_id_lt` INT(11) NULL DEFAULT NULL,
  `processed_media_id_lv` INT(11) NULL DEFAULT NULL,
  `processed_media_id_nl` INT(11) NULL DEFAULT NULL,
  `processed_media_id_no` INT(11) NULL DEFAULT NULL,
  `processed_media_id_pl` INT(11) NULL DEFAULT NULL,
  `processed_media_id_pt_br` INT(11) NULL DEFAULT NULL,
  `processed_media_id_pt_pt` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ro` INT(11) NULL DEFAULT NULL,
  `processed_media_id_ru` INT(11) NULL DEFAULT NULL,
  `processed_media_id_sk` INT(11) NULL DEFAULT NULL,
  `processed_media_id_sl` INT(11) NULL DEFAULT NULL,
  `processed_media_id_sr` INT(11) NULL DEFAULT NULL,
  `processed_media_id_th` INT(11) NULL DEFAULT NULL,
  `processed_media_id_tr` INT(11) NULL DEFAULT NULL,
  `processed_media_id_uk` INT(11) NULL DEFAULT NULL,
  `processed_media_id_vi` INT(11) NULL DEFAULT NULL,
  `processed_media_id_zh_cn` INT(11) NULL DEFAULT NULL,
  `processed_media_id_zh_tw` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_vector_graphic_vector_graphic1_idx` (`cloned_from_id` ASC),
  INDEX `fk_vector_graphic_p3_media1_idx` (`original_media_id` ASC),
  INDEX `fk_vector_graphic_node1_idx` (`node_id` ASC),
  INDEX `fk_vector_graphic_p3_media2_idx` (`processed_media_id_en` ASC),
  INDEX `vector_graphic_qa_state_id_fk` (`vector_graphic_qa_state_id` ASC),
  INDEX `fk_vector_graphic_p3_media2_de` (`processed_media_id_de` ASC),
  INDEX `fk_vector_graphic_p3_media2_es` (`processed_media_id_es` ASC),
  INDEX `fk_vector_graphic_p3_media2_hi` (`processed_media_id_hi` ASC),
  INDEX `fk_vector_graphic_p3_media2_pt` (`processed_media_id_pt` ASC),
  INDEX `fk_vector_graphic_p3_media2_sv` (`processed_media_id_sv` ASC),
  INDEX `fk_vector_graphic_users1_idx` (`owner_id` ASC),
  INDEX `fk_vector_graphic_p3_media2_zh` (`processed_media_id_zh` ASC),
  INDEX `fk_vector_graphic_p3_media2_ar` (`processed_media_id_ar` ASC),
  INDEX `fk_vector_graphic_p3_media2_bg` (`processed_media_id_bg` ASC),
  INDEX `fk_vector_graphic_p3_media2_ca` (`processed_media_id_ca` ASC),
  INDEX `fk_vector_graphic_p3_media2_cs` (`processed_media_id_cs` ASC),
  INDEX `fk_vector_graphic_p3_media2_da` (`processed_media_id_da` ASC),
  INDEX `fk_vector_graphic_p3_media2_en_gb` (`processed_media_id_en_gb` ASC),
  INDEX `fk_vector_graphic_p3_media2_en_us` (`processed_media_id_en_us` ASC),
  INDEX `fk_vector_graphic_p3_media2_el` (`processed_media_id_el` ASC),
  INDEX `fk_vector_graphic_p3_media2_fi` (`processed_media_id_fi` ASC),
  INDEX `fk_vector_graphic_p3_media2_fil` (`processed_media_id_fil` ASC),
  INDEX `fk_vector_graphic_p3_media2_fr` (`processed_media_id_fr` ASC),
  INDEX `fk_vector_graphic_p3_media2_hr` (`processed_media_id_hr` ASC),
  INDEX `fk_vector_graphic_p3_media2_hu` (`processed_media_id_hu` ASC),
  INDEX `fk_vector_graphic_p3_media2_id` (`processed_media_id_id` ASC),
  INDEX `fk_vector_graphic_p3_media2_iw` (`processed_media_id_iw` ASC),
  INDEX `fk_vector_graphic_p3_media2_it` (`processed_media_id_it` ASC),
  INDEX `fk_vector_graphic_p3_media2_ja` (`processed_media_id_ja` ASC),
  INDEX `fk_vector_graphic_p3_media2_ko` (`processed_media_id_ko` ASC),
  INDEX `fk_vector_graphic_p3_media2_lt` (`processed_media_id_lt` ASC),
  INDEX `fk_vector_graphic_p3_media2_lv` (`processed_media_id_lv` ASC),
  INDEX `fk_vector_graphic_p3_media2_nl` (`processed_media_id_nl` ASC),
  INDEX `fk_vector_graphic_p3_media2_no` (`processed_media_id_no` ASC),
  INDEX `fk_vector_graphic_p3_media2_pl` (`processed_media_id_pl` ASC),
  INDEX `fk_vector_graphic_p3_media2_pt_br` (`processed_media_id_pt_br` ASC),
  INDEX `fk_vector_graphic_p3_media2_pt_pt` (`processed_media_id_pt_pt` ASC),
  INDEX `fk_vector_graphic_p3_media2_ro` (`processed_media_id_ro` ASC),
  INDEX `fk_vector_graphic_p3_media2_ru` (`processed_media_id_ru` ASC),
  INDEX `fk_vector_graphic_p3_media2_sk` (`processed_media_id_sk` ASC),
  INDEX `fk_vector_graphic_p3_media2_sl` (`processed_media_id_sl` ASC),
  INDEX `fk_vector_graphic_p3_media2_sr` (`processed_media_id_sr` ASC),
  INDEX `fk_vector_graphic_p3_media2_th` (`processed_media_id_th` ASC),
  INDEX `fk_vector_graphic_p3_media2_tr` (`processed_media_id_tr` ASC),
  INDEX `fk_vector_graphic_p3_media2_uk` (`processed_media_id_uk` ASC),
  INDEX `fk_vector_graphic_p3_media2_vi` (`processed_media_id_vi` ASC),
  INDEX `fk_vector_graphic_p3_media2_zh_cn` (`processed_media_id_zh_cn` ASC),
  INDEX `fk_vector_graphic_p3_media2_zh_tw` (`processed_media_id_zh_tw` ASC),
  CONSTRAINT `fk_vector_graphic_users1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vector_graphic_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vector_graphic_p3_media1`
    FOREIGN KEY (`original_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vector_graphic_p3_media2`
    FOREIGN KEY (`processed_media_id_en`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vector_graphic_p3_media2_ar`
    FOREIGN KEY (`processed_media_id_ar`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_bg`
    FOREIGN KEY (`processed_media_id_bg`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_ca`
    FOREIGN KEY (`processed_media_id_ca`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_cs`
    FOREIGN KEY (`processed_media_id_cs`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_da`
    FOREIGN KEY (`processed_media_id_da`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_de`
    FOREIGN KEY (`processed_media_id_de`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_el`
    FOREIGN KEY (`processed_media_id_el`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_en_gb`
    FOREIGN KEY (`processed_media_id_en_gb`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_en_us`
    FOREIGN KEY (`processed_media_id_en_us`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_es`
    FOREIGN KEY (`processed_media_id_es`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_fi`
    FOREIGN KEY (`processed_media_id_fi`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_fil`
    FOREIGN KEY (`processed_media_id_fil`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_fr`
    FOREIGN KEY (`processed_media_id_fr`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_hi`
    FOREIGN KEY (`processed_media_id_hi`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_hr`
    FOREIGN KEY (`processed_media_id_hr`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_hu`
    FOREIGN KEY (`processed_media_id_hu`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_id`
    FOREIGN KEY (`processed_media_id_id`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_it`
    FOREIGN KEY (`processed_media_id_it`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_iw`
    FOREIGN KEY (`processed_media_id_iw`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_ja`
    FOREIGN KEY (`processed_media_id_ja`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_ko`
    FOREIGN KEY (`processed_media_id_ko`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_lt`
    FOREIGN KEY (`processed_media_id_lt`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_lv`
    FOREIGN KEY (`processed_media_id_lv`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_nl`
    FOREIGN KEY (`processed_media_id_nl`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_no`
    FOREIGN KEY (`processed_media_id_no`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_pl`
    FOREIGN KEY (`processed_media_id_pl`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_pt`
    FOREIGN KEY (`processed_media_id_pt`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_pt_br`
    FOREIGN KEY (`processed_media_id_pt_br`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_pt_pt`
    FOREIGN KEY (`processed_media_id_pt_pt`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_ro`
    FOREIGN KEY (`processed_media_id_ro`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_ru`
    FOREIGN KEY (`processed_media_id_ru`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_sk`
    FOREIGN KEY (`processed_media_id_sk`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_sl`
    FOREIGN KEY (`processed_media_id_sl`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_sr`
    FOREIGN KEY (`processed_media_id_sr`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_sv`
    FOREIGN KEY (`processed_media_id_sv`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_th`
    FOREIGN KEY (`processed_media_id_th`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_tr`
    FOREIGN KEY (`processed_media_id_tr`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_uk`
    FOREIGN KEY (`processed_media_id_uk`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_vi`
    FOREIGN KEY (`processed_media_id_vi`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_zh`
    FOREIGN KEY (`processed_media_id_zh`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_zh_cn`
    FOREIGN KEY (`processed_media_id_zh_cn`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_p3_media2_zh_tw`
    FOREIGN KEY (`processed_media_id_zh_tw`)
    REFERENCES `p3_media` (`id`),
  CONSTRAINT `fk_vector_graphic_vector_graphic1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `vector_graphic` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `vector_graphic_qa_state_id_fk`
    FOREIGN KEY (`vector_graphic_qa_state_id`)
    REFERENCES `vector_graphic_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `exam_question_alternative`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `exam_question_alternative` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `slug` VARCHAR(255) NULL,
  `_markup` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `correct` TINYINT(1) NULL,
  `exam_question_id` BIGINT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL DEFAULT NULL,
  `node_id` BIGINT NULL,
  `exam_question_alternative_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_exam_question_alternative_exam_question1_idx` (`exam_question_id` ASC),
  INDEX `fk_exam_question_alternative_node1_idx` (`node_id` ASC),
  INDEX `fk_exam_question_alternative_users1_idx` (`owner_id` ASC),
  INDEX `exam_question_alternative_qa_state_id_fk` (`exam_question_alternative_qa_state_id` ASC),
  CONSTRAINT `exam_question_alternative_qa_state_id_fk`
    FOREIGN KEY (`exam_question_alternative_qa_state_id`)
    REFERENCES `exam_question_alternative_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_exam_question_alternative_exam_question1`
    FOREIGN KEY (`exam_question_id`)
    REFERENCES `exam_question` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_exam_question_alternative_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_exam_question_alternative_users1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `edge`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edge` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `from_node_id` BIGINT NOT NULL,
  `to_node_id` BIGINT NOT NULL,
  `weight` INT NULL,
  `_title` VARCHAR(255) NULL,
  `relation` VARCHAR(255) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_node_has_node_node2_idx` (`to_node_id` ASC),
  INDEX `fk_node_has_node_node1_idx` (`from_node_id` ASC),
  CONSTRAINT `fk_node_has_node_node1`
    FOREIGN KEY (`from_node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_node_has_node_node2`
    FOREIGN KEY (`to_node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `changeset`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `changeset` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `contents` TEXT NULL,
  `user_id` INT(11) NOT NULL,
  `node_id` BIGINT NOT NULL,
  `reward` INT(11) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_changeset_users1_idx` (`user_id` ASC),
  INDEX `fk_changeset_node1_idx` (`node_id` ASC),
  CONSTRAINT `fk_changeset_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_changeset_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `auth_assignment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `itemname` VARCHAR(64) NOT NULL,
  `userid` VARCHAR(64) NOT NULL,
  `bizrule` TEXT NULL,
  `data` TEXT NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `comment` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `author_user_id` INT(11) NOT NULL,
  `parent_id` BIGINT NULL,
  `_comment` TEXT NULL,
  `context_model` VARCHAR(255) NULL,
  `context_id` BIGINT NULL,
  `context_attribute` VARCHAR(255) NULL,
  `context_translate_into` VARCHAR(10) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_comment_users1_idx` (`author_user_id` ASC),
  INDEX `fk_comment_comment1_idx` (`parent_id` ASC),
  CONSTRAINT `fk_comment_users1`
    FOREIGN KEY (`author_user_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comment_comment1`
    FOREIGN KEY (`parent_id`)
    REFERENCES `comment` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `action`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `action` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `action` VARCHAR(255) NULL,
  `label` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gui_section`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gui_section` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT NULL,
  `title` VARCHAR(255) NULL,
  `slug` VARCHAR(255) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `i18n_catalog_id` BIGINT NULL,
  `owner_id` INT(11) NULL,
  `node_id` BIGINT NULL,
  `gui_section_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_gui_section_i18n_catalog1_idx` (`i18n_catalog_id` ASC),
  INDEX `gui_section_qa_state_id_fk` (`gui_section_qa_state_id` ASC),
  INDEX `fk_gui_section_account1_idx` (`owner_id` ASC),
  INDEX `fk_gui_section_node1_idx` (`node_id` ASC),
  INDEX `fk_gui_section_gui_section1_idx` (`cloned_from_id` ASC),
  CONSTRAINT `gui_section_qa_state_id_fk`
    FOREIGN KEY (`gui_section_qa_state_id`)
    REFERENCES `gui_section_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_gui_section_i18n_catalog1`
    FOREIGN KEY (`i18n_catalog_id`)
    REFERENCES `i18n_catalog` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gui_section_account1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gui_section_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gui_section_gui_section1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `gui_section` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `waffle_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waffle_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `title_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `short_title_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `file_format_approved` TINYINT(1) NULL DEFAULT NULL,
  `license_approved` TINYINT(1) NULL DEFAULT NULL,
  `license_link_approved` TINYINT(1) NULL DEFAULT NULL,
  `waffle_publisher_id_approved` TINYINT(1) NULL DEFAULT NULL,
  `json_import_media_id_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_approved` TINYINT(1) NULL DEFAULT NULL,
  `title_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `po_contents_approved` TINYINT(1) NULL DEFAULT NULL,
  `slug_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `short_title_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `file_format_proofed` TINYINT(1) NULL DEFAULT NULL,
  `license_proofed` TINYINT(1) NULL DEFAULT NULL,
  `license_link_proofed` TINYINT(1) NULL DEFAULT NULL,
  `waffle_publisher_id_proofed` TINYINT(1) NULL DEFAULT NULL,
  `json_import_media_id_proofed` TINYINT(1) NULL DEFAULT NULL,
  `title_proofed` TINYINT(1) NULL DEFAULT NULL,
  `po_contents_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `waffle_publisher_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waffle_publisher_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `name_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `ref_approved` TINYINT(1) NULL DEFAULT NULL,
  `name_approved` TINYINT(1) NULL DEFAULT NULL,
  `name_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `ref_proofed` TINYINT(1) NULL DEFAULT NULL,
  `name_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `waffle_publisher`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waffle_publisher` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT NULL,
  `ref` VARCHAR(255) NULL,
  `_name` VARCHAR(255) NULL,
  `_description` VARCHAR(255) NULL,
  `url` VARCHAR(255) NULL,
  `image_small_media_id` INT(11) NULL,
  `image_large_media_id` INT(11) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL,
  `node_id` BIGINT NULL,
  `waffle_publisher_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_waffle_data_source_p3_media1_idx` (`image_small_media_id` ASC),
  INDEX `fk_waffle_data_source_p3_media2_idx` (`image_large_media_id` ASC),
  INDEX `fk_waffle_data_source_waffle_data_source1_idx` (`cloned_from_id` ASC),
  INDEX `fk_waffle_data_source_account1_idx` (`owner_id` ASC),
  INDEX `fk_waffle_data_source_node1_idx` (`node_id` ASC),
  INDEX `waffle_publisher_qa_state_id_fk` (`waffle_publisher_qa_state_id` ASC),
  CONSTRAINT `fk_waffle_data_source_p3_media10`
    FOREIGN KEY (`image_small_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `waffle_publisher_qa_state_id_fk`
    FOREIGN KEY (`waffle_publisher_qa_state_id`)
    REFERENCES `waffle_publisher_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_waffle_data_source_account10`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_data_source_node10`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_data_source_p3_media20`
    FOREIGN KEY (`image_large_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_data_source_waffle_data_source10`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `waffle_publisher` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `waffle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waffle` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT NULL,
  `file_format` VARCHAR(255) NULL,
  `_title` VARCHAR(255) NULL,
  `slug_en` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `_short_title` VARCHAR(255) NULL,
  `_description` VARCHAR(255) NULL,
  `link` VARCHAR(255) NULL,
  `publishing_date` DATETIME NULL,
  `url` VARCHAR(255) NULL,
  `license` VARCHAR(255) NULL,
  `license_link` VARCHAR(255) NULL,
  `waffle_publisher_id` BIGINT NULL,
  `json_import_media_id` INT(11) NULL,
  `image_small_media_id` INT(11) NULL,
  `image_large_media_id` INT(11) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL,
  `node_id` BIGINT NULL,
  `slug_ar` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_bg` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ca` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_cs` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_da` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_de` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_gb` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_us` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_el` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_es` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fil` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hu` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_id` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_iw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_it` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ja` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ko` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_nl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_no` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_br` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ro` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ru` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_th` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_tr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_uk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_vi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_cn` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_tw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `waffle_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_waffle_waffle1_idx` (`cloned_from_id` ASC),
  INDEX `waffle_qa_state_id_fk` (`waffle_qa_state_id` ASC),
  INDEX `fk_waffle_account1_idx` (`owner_id` ASC),
  INDEX `fk_waffle_node1_idx` (`node_id` ASC),
  INDEX `fk_waffle_p3_media1_idx` (`json_import_media_id` ASC),
  INDEX `fk_waffle_p3_media2_idx` (`image_small_media_id` ASC),
  INDEX `fk_waffle_p3_media3_idx` (`image_large_media_id` ASC),
  INDEX `fk_waffle_waffle_publisher1_idx` (`waffle_publisher_id` ASC),
  CONSTRAINT `waffle_qa_state_id_fk`
    FOREIGN KEY (`waffle_qa_state_id`)
    REFERENCES `waffle_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_waffle_waffle1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `waffle` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_account1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_p3_media1`
    FOREIGN KEY (`json_import_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_p3_media2`
    FOREIGN KEY (`image_small_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_p3_media3`
    FOREIGN KEY (`image_large_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_waffle_publisher1`
    FOREIGN KEY (`waffle_publisher_id`)
    REFERENCES `waffle_publisher` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `menu` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT NULL,
  `_title` VARCHAR(255) NULL,
  `slug_en` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL,
  `node_id` BIGINT NULL,
  `slug_ar` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_bg` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ca` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_cs` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_da` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_de` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_gb` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_en_us` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_el` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_es` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fil` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_fr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_hu` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_id` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_iw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_it` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ja` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ko` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_lv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_nl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_no` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_br` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_pt_pt` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ro` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_ru` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sl` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_sv` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_th` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_tr` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_uk` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_vi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_cn` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `slug_zh_tw` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `menu_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_menu_menu1_idx` (`cloned_from_id` ASC),
  INDEX `menu_qa_state_id_fk` (`menu_qa_state_id` ASC),
  INDEX `fk_menu_account1_idx` (`owner_id` ASC),
  INDEX `fk_menu_node1_idx` (`node_id` ASC),
  CONSTRAINT `menu_qa_state_id_fk`
    FOREIGN KEY (`menu_qa_state_id`)
    REFERENCES `menu_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_menu_menu1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `menu` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_menu_account1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_menu_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `waffle_category_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waffle_category_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `list_name_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `property_name_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `possessive_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `choice_format_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `ref_approved` TINYINT(1) NULL DEFAULT NULL,
  `list_name_approved` TINYINT(1) NULL DEFAULT NULL,
  `list_name_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `property_name_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `possessive_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `choice_format_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `ref_proofed` TINYINT(1) NULL DEFAULT NULL,
  `list_name_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `waffle_category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waffle_category` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT NULL,
  `ref` VARCHAR(255) NULL,
  `_list_name` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `_property_name` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `_possessive` VARCHAR(255) NULL,
  `_choice_format` TEXT NULL,
  `_description` TEXT NULL,
  `waffle_id` BIGINT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL,
  `node_id` BIGINT NULL,
  `waffle_category_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_waffle_category_waffle1_idx` (`waffle_id` ASC),
  INDEX `fk_waffle_category_waffle_category1_idx` (`cloned_from_id` ASC),
  INDEX `waffle_category_qa_state_id_fk` (`waffle_category_qa_state_id` ASC),
  INDEX `fk_waffle_category_account1_idx` (`owner_id` ASC),
  INDEX `fk_waffle_category_node1_idx` (`node_id` ASC),
  CONSTRAINT `fk_waffle_category_account1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_category_waffle1`
    FOREIGN KEY (`waffle_id`)
    REFERENCES `waffle` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_category_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_category_waffle_category1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `waffle_category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `waffle_category_qa_state_id_fk`
    FOREIGN KEY (`waffle_category_qa_state_id`)
    REFERENCES `waffle_category_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `waffle_data_source_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waffle_data_source_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `name_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `ref_approved` TINYINT(1) NULL DEFAULT NULL,
  `short_name_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `name_approved` TINYINT(1) NULL DEFAULT NULL,
  `name_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `short_name_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `ref_proofed` TINYINT(1) NULL DEFAULT NULL,
  `name_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `waffle_indicator_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waffle_indicator_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `name_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `ref_approved` TINYINT(1) NULL DEFAULT NULL,
  `short_name_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `name_approved` TINYINT(1) NULL DEFAULT NULL,
  `name_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `short_name_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `ref_proofed` TINYINT(1) NULL DEFAULT NULL,
  `name_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `waffle_indicator`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waffle_indicator` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT NULL,
  `ref` VARCHAR(255) NULL,
  `_name` VARCHAR(255) NULL,
  `_short_name` VARCHAR(255) NULL,
  `_description` TEXT NULL,
  `waffle_id` BIGINT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL,
  `node_id` BIGINT NULL,
  `waffle_indicator_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_waffle_category_waffle1_idx` (`waffle_id` ASC),
  INDEX `fk_waffle_indicator_waffle_indicator1_idx` (`cloned_from_id` ASC),
  INDEX `waffle_indicator_qa_state_id_fk` (`waffle_indicator_qa_state_id` ASC),
  INDEX `fk_waffle_indicator_account1_idx` (`owner_id` ASC),
  INDEX `fk_waffle_indicator_node1_idx` (`node_id` ASC),
  CONSTRAINT `waffle_indicator_qa_state_id_fk`
    FOREIGN KEY (`waffle_indicator_qa_state_id`)
    REFERENCES `waffle_indicator_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_waffle_category_waffle10`
    FOREIGN KEY (`waffle_id`)
    REFERENCES `waffle` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_indicator_waffle_indicator1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `waffle_indicator` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_indicator_account1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_indicator_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `waffle_category_thing_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waffle_category_thing_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `name_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `ref_approved` TINYINT(1) NULL DEFAULT NULL,
  `short_name_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `name_approved` TINYINT(1) NULL DEFAULT NULL,
  `name_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `short_name_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `ref_proofed` TINYINT(1) NULL DEFAULT NULL,
  `name_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `waffle_data_source`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waffle_data_source` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT NULL,
  `ref` VARCHAR(255) NULL,
  `_name` VARCHAR(255) NULL,
  `_short_name` VARCHAR(255) NULL,
  `link` VARCHAR(255) NULL,
  `image_small_media_id` INT(11) NULL,
  `image_large_media_id` INT(11) NULL,
  `waffle_id` BIGINT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL,
  `node_id` BIGINT NULL,
  `waffle_data_source_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_waffle_category_waffle1_idx` (`waffle_id` ASC),
  INDEX `fk_waffle_data_source_p3_media1_idx` (`image_small_media_id` ASC),
  INDEX `fk_waffle_data_source_p3_media2_idx` (`image_large_media_id` ASC),
  INDEX `fk_waffle_data_source_waffle_data_source1_idx` (`cloned_from_id` ASC),
  INDEX `waffle_data_source_qa_state_id_fk` (`waffle_data_source_qa_state_id` ASC),
  INDEX `fk_waffle_data_source_account1_idx` (`owner_id` ASC),
  INDEX `fk_waffle_data_source_node1_idx` (`node_id` ASC),
  CONSTRAINT `waffle_data_source_qa_state_id_fk`
    FOREIGN KEY (`waffle_data_source_qa_state_id`)
    REFERENCES `waffle_data_source_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_waffle_category_waffle11`
    FOREIGN KEY (`waffle_id`)
    REFERENCES `waffle` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_data_source_p3_media1`
    FOREIGN KEY (`image_small_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_data_source_p3_media2`
    FOREIGN KEY (`image_large_media_id`)
    REFERENCES `p3_media` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_data_source_waffle_data_source1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `waffle_data_source` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_data_source_account1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_data_source_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `waffle_category_thing`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waffle_category_thing` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT NULL,
  `ref` VARCHAR(255) NULL,
  `_name` VARCHAR(255) NULL,
  `_short_name` VARCHAR(255) NULL,
  `waffle_category_id` BIGINT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL,
  `node_id` BIGINT NULL,
  `waffle_category_thing_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_waffle_category_thing_waffle_category1_idx` (`waffle_category_id` ASC),
  INDEX `fk_waffle_category_thing_waffle_category_thing1_idx` (`cloned_from_id` ASC),
  INDEX `waffle_category_thing_qa_state_id_fk` (`waffle_category_thing_qa_state_id` ASC),
  INDEX `fk_waffle_category_thing_account1_idx` (`owner_id` ASC),
  INDEX `fk_waffle_category_thing_node1_idx` (`node_id` ASC),
  CONSTRAINT `waffle_category_thing_qa_state_id_fk`
    FOREIGN KEY (`waffle_category_thing_qa_state_id`)
    REFERENCES `waffle_category_thing_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_waffle_category_thing_waffle_category1`
    FOREIGN KEY (`waffle_category_id`)
    REFERENCES `waffle_category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_category_thing_waffle_category_thing1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `waffle_category_thing` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_category_thing_account1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_category_thing_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `waffle_tag_qa_state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waffle_tag_qa_state` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `draft_validation_progress` INT(11) NULL DEFAULT NULL,
  `reviewable_validation_progress` INT(11) NULL DEFAULT NULL,
  `publishable_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ar_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_bg_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ca_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_cs_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_da_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_de_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_gb_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_en_us_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_el_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_es_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fil_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_fr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_hu_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_id_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_iw_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_it_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ja_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ko_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_lv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_nl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_no_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_br_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_pt_pt_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ro_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_ru_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sl_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_sv_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_th_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_tr_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_uk_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_vi_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_cn_validation_progress` INT(11) NULL DEFAULT NULL,
  `translate_into_zh_tw_validation_progress` INT(11) NULL DEFAULT NULL,
  `approval_progress` INT(11) NULL DEFAULT NULL,
  `proofing_progress` INT(11) NULL DEFAULT NULL,
  `allow_review` TINYINT(1) NULL DEFAULT NULL,
  `allow_publish` TINYINT(1) NULL DEFAULT NULL,
  `name_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `ref_approved` TINYINT(1) NULL DEFAULT NULL,
  `short_name_en_approved` TINYINT(1) NULL DEFAULT NULL,
  `name_approved` TINYINT(1) NULL DEFAULT NULL,
  `name_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `short_name_en_proofed` TINYINT(1) NULL DEFAULT NULL,
  `ref_proofed` TINYINT(1) NULL DEFAULT NULL,
  `name_proofed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `waffle_unit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waffle_unit` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT NULL,
  `ref` VARCHAR(255) NULL,
  `_name` VARCHAR(255) NULL,
  `_short_name` VARCHAR(255) NULL,
  `_description` TEXT NULL,
  `waffle_id` BIGINT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL,
  `node_id` BIGINT NULL,
  `waffle_unit_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_waffle_category_waffle1_idx` (`waffle_id` ASC),
  INDEX `fk_waffle_unit_waffle_unit1_idx` (`cloned_from_id` ASC),
  INDEX `waffle_unit_qa_state_id_fk` (`waffle_unit_qa_state_id` ASC),
  INDEX `fk_waffle_unit_account1_idx` (`owner_id` ASC),
  INDEX `fk_waffle_unit_node1_idx` (`node_id` ASC),
  CONSTRAINT `waffle_unit_qa_state_id_fk`
    FOREIGN KEY (`waffle_unit_qa_state_id`)
    REFERENCES `waffle_unit_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_waffle_category_waffle100`
    FOREIGN KEY (`waffle_id`)
    REFERENCES `waffle` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_unit_waffle_unit1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `waffle_unit` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_unit_account1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_unit_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `waffle_tag`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `waffle_tag` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `version` INT(11) NOT NULL DEFAULT 1,
  `cloned_from_id` BIGINT NULL,
  `ref` VARCHAR(255) NULL,
  `_name` VARCHAR(255) NULL,
  `_short_name` VARCHAR(255) NULL,
  `_description` TEXT NULL,
  `waffle_id` BIGINT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `owner_id` INT(11) NULL,
  `node_id` BIGINT NULL,
  `waffle_tag_qa_state_id` BIGINT(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_waffle_category_waffle1_idx` (`waffle_id` ASC),
  INDEX `fk_waffle_tag_waffle_tag1_idx` (`cloned_from_id` ASC),
  INDEX `waffle_tag_qa_state_id_fk` (`waffle_tag_qa_state_id` ASC),
  INDEX `fk_waffle_tag_account1_idx` (`owner_id` ASC),
  INDEX `fk_waffle_tag_node1_idx` (`node_id` ASC),
  CONSTRAINT `waffle_tag_qa_state_id_fk`
    FOREIGN KEY (`waffle_tag_qa_state_id`)
    REFERENCES `waffle_tag_qa_state` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_waffle_category_waffle1000`
    FOREIGN KEY (`waffle_id`)
    REFERENCES `waffle` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_tag_waffle_tag1`
    FOREIGN KEY (`cloned_from_id`)
    REFERENCES `waffle_tag` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_tag_account1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_waffle_tag_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `group`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `group` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `role` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `group_has_account`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `group_has_account` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `account_id` INT(11) NOT NULL,
  `group_id` BIGINT NOT NULL,
  `role_id` BIGINT NOT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_group_has_account_account1_idx` (`account_id` ASC),
  INDEX `fk_group_has_account_group1_idx` (`group_id` ASC),
  INDEX `fk_group_has_account_role1_idx` (`role_id` ASC),
  CONSTRAINT `fk_group_has_account_account1`
    FOREIGN KEY (`account_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_group_has_account_group1`
    FOREIGN KEY (`group_id`)
    REFERENCES `group` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_group_has_account_role1`
    FOREIGN KEY (`role_id`)
    REFERENCES `role` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `node_has_group`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `node_has_group` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `visibility` VARCHAR(255) NULL,
  `node_id` BIGINT NOT NULL,
  `group_id` BIGINT NOT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_node_has_group_node1_idx` (`node_id` ASC),
  INDEX `fk_node_has_group_group1_idx` (`group_id` ASC),
  CONSTRAINT `fk_node_has_group_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_node_has_group_group1`
    FOREIGN KEY (`group_id`)
    REFERENCES `group` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
