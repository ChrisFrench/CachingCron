-- -----------------------------------------------------
-- Table `#__cachingcron_config`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `#__cachingcron_config` (
  `config_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `config_name` VARCHAR(255) NOT NULL ,
  `value` TEXT NOT NULL ,
  PRIMARY KEY (`config_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;
-- -----------------------------------------------------
-- Table `#__cachingcron_items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `#__cachingcron_links` (
	`id` int AUTO_INCREMENT,
	`name` varchar(255),
	`url` varchar(255) NOT NULL,
	`datecreated` datetime,
	`lastmodified` datetime,
	`lastcron` datetime,
	`enabled` tinyint,
	PRIMARY KEY (`id`)
)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;