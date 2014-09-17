-- MySQL Script generated by MySQL Workbench
-- Qua 06 Ago 2014 13:08:50 BRT
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema seminfo2014
-- -----------------------------------------------------
-- seminfo2014
CREATE SCHEMA IF NOT EXISTS `seminfo2014` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `seminfo2014` ;

-- -----------------------------------------------------
-- Table `seminfo2014`.`groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`groups` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`groups` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `description` TEXT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
PACK_KEYS = DEFAULT
ROW_FORMAT = DEFAULT;


-- -----------------------------------------------------
-- Table `seminfo2014`.`courses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`courses` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`courses` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `body` TEXT NULL,
  `file` VARCHAR(255) NULL,
  `file_dir` VARCHAR(255) NULL,
  `updated` DATETIME NULL,
  `created` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `seminfo2014`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`users` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`users` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `group_id` INT(11) NOT NULL DEFAULT 2,
  `course_id` INT(10) NULL,
  `matricula` VARCHAR(45) NULL,
  `name` VARCHAR(255) NOT NULL,
  `sexo` VARCHAR(250) NOT NULL COMMENT 'Select (' /* comment truncated */ /*	masculino,
	femino
)*/,
  `username` CHAR(60) NULL,
  `password` CHAR(255) NOT NULL,
  `email` CHAR(255) NOT NULL,
  `cpf` CHAR(14) NOT NULL,
  `phone` CHAR(15) NOT NULL,
  `status` TINYINT(1) NULL DEFAULT 1,
  `website` VARCHAR(100) NULL,
  `image` VARCHAR(255) NULL,
  `image_dir` VARCHAR(255) NULL,
  `holding_count` INT NULL DEFAULT 0,
  `updated` DATETIME NULL,
  `created` DATETIME NULL,
  `courses_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_grupos1_idx` (`group_id` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  INDEX `fk_users_courses2_idx` (`courses_id` ASC),
  CONSTRAINT `fk_users_grupos1`
    FOREIGN KEY (`group_id`)
    REFERENCES `seminfo2014`.`groups` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_courses2`
    FOREIGN KEY (`courses_id`)
    REFERENCES `seminfo2014`.`courses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2;


-- -----------------------------------------------------
-- Table `seminfo2014`.`contacts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`contacts` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`contacts` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(10) NOT NULL,
  `title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `alias` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL,
  `body` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `name` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL,
  `phone` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL,
  `email` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL,
  `status` TINYINT(1) NULL DEFAULT 1,
  `archive` TINYINT(1) NULL DEFAULT 1,
  `notify` TINYINT(1) NULL DEFAULT 1,
  `updated` DATETIME NULL,
  `created` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_contacts_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_contacts_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `seminfo2014`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3;


-- -----------------------------------------------------
-- Table `seminfo2014`.`menus`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`menus` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`menus` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `alias` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `class` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `description` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT '1',
  `weight` INT(11) NULL DEFAULT NULL,
  `link_count` INT(11) NULL,
  `params` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `updated` DATETIME NOT NULL,
  `created` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `menu_alias` (`alias` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `seminfo2014`.`links`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`links` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`links` (
  `id` INT(20) NOT NULL AUTO_INCREMENT,
  `parent_id` INT(20) NULL,
  `menu_id` INT(10) NOT NULL,
  `title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `class` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL,
  `description` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `link` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `target` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `rel` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT '1',
  `lft` INT(11) NULL DEFAULT NULL,
  `rght` INT(11) NULL DEFAULT NULL,
  `visibility_roles` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `params` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `updated` DATETIME NOT NULL,
  `created` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_links_menus1_idx` (`menu_id` ASC),
  INDEX `fk_links_links1_idx` (`parent_id` ASC),
  CONSTRAINT `fk_links_menus1`
    FOREIGN KEY (`menu_id`)
    REFERENCES `seminfo2014`.`menus` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_links_links1`
    FOREIGN KEY (`parent_id`)
    REFERENCES `seminfo2014`.`links` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `seminfo2014`.`messages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`messages` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`messages` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `body` TEXT NOT NULL,
  `notify` VARCHAR(255) NULL,
  `status` TINYINT(1) NULL DEFAULT 0,
  `updated` DATETIME NULL,
  `created` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `seminfo2014`.`types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`types` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`types` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `title` CHAR(255) NOT NULL,
  `alias` CHAR(255) NULL,
  `description` TEXT NULL,
  `updated` DATETIME NULL,
  `created` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `alias_UNIQUE` (`alias` ASC),
  UNIQUE INDEX `title_UNIQUE` (`title` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 5
COMMENT = 'Notas, Paginas, Noticias, Artigos';


-- -----------------------------------------------------
-- Table `seminfo2014`.`contents`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`contents` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`contents` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `user_id` INT(10) NOT NULL,
  `type_id` INT(10) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `body` TEXT NOT NULL,
  `status` TINYINT(1) NULL,
  `promote` TINYINT(1) NULL,
  `path` VARCHAR(255) NULL,
  `file` VARCHAR(255) NULL,
  `file_dir` VARCHAR(255) NULL,
  `updated` DATETIME NULL,
  `created` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_contents_types1_idx` (`type_id` ASC),
  INDEX `fk_contents_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_contents_types1`
    FOREIGN KEY (`type_id`)
    REFERENCES `seminfo2014`.`types` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contents_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `seminfo2014`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 7;


-- -----------------------------------------------------
-- Table `seminfo2014`.`settings`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`settings` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`settings` (
  `id` INT(20) NOT NULL AUTO_INCREMENT,
  `key` VARCHAR(64) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `value` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `description` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `input_type` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL DEFAULT 'text',
  `editable` TINYINT(1) NOT NULL DEFAULT '1',
  `weight` INT(11) NULL DEFAULT NULL,
  `params` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `key` (`key` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 40
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `seminfo2014`.`uploads`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`uploads` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`uploads` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `type` VARCHAR(200) NOT NULL,
  `size` INT(11) NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `seminfo2014`.`events`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`events` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`events` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `local` VARCHAR(255) NOT NULL,
  `published` TINYINT(1) NULL,
  `status` TINYINT(1) NULL DEFAULT 1,
  `first` DATETIME NOT NULL,
  `last` DATETIME NOT NULL,
  `realization` VARCHAR(255) NULL,
  `description` TEXT NULL,
  `organization` TEXT NULL,
  `president` VARCHAR(255) NULL,
  `file` VARCHAR(255) NULL,
  `file_dir` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `seminfo2014`.`typeprograms`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`typeprograms` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`typeprograms` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `alias` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `seminfo2014`.`programs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`programs` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`programs` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `event_id` INT(10) NOT NULL,
  `typeprogram_id` INT(10) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `local` VARCHAR(255) NULL,
  `status` TINYINT(1) NOT NULL DEFAULT 1 COMMENT 'status do programa, caso o esteja false o inscrição e parada e os usuários não podem cancelar inscrição',
  `price` DECIMAL(5,2) NULL,
  `vagas` INT NOT NULL,
  `reservations` INT NULL,
  `duration` VARCHAR(255) NOT NULL DEFAULT '2 horas',
  `content` TEXT NULL,
  `date_begin` DATE NOT NULL,
  `date_end` DATE NOT NULL,
  `time_begin` TIME NOT NULL,
  `time_end` TIME NOT NULL,
  `min_presence` INT NOT NULL DEFAULT 1 COMMENT 'numero de presença q o usuário tem que ter para liberar certificado',
  `file` VARCHAR(255) NULL,
  `file_dir` VARCHAR(255) NULL,
  `certify` TEXT NULL,
  `certify_speakers` TEXT NULL,
  `description` TEXT NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  `holding_count` INT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_programas_tipoprogramas1_idx` (`typeprogram_id` ASC),
  INDEX `fk_programs_events1_idx` (`event_id` ASC),
  CONSTRAINT `fk_programas_tipoprogramas1`
    FOREIGN KEY (`typeprogram_id`)
    REFERENCES `seminfo2014`.`typeprograms` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_programs_events1`
    FOREIGN KEY (`event_id`)
    REFERENCES `seminfo2014`.`events` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `seminfo2014`.`speakers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`speakers` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`speakers` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `institution` VARCHAR(255) NULL,
  `phone` CHAR(15) NULL,
  `email` VARCHAR(255) NULL,
  `description` TEXT NULL DEFAULT NULL,
  `twitter` VARCHAR(255) NULL DEFAULT NULL,
  `facebook` VARCHAR(255) NULL DEFAULT NULL,
  `blog` VARCHAR(255) NULL DEFAULT NULL,
  `linkedin` VARCHAR(255) NULL DEFAULT NULL,
  `lattes` VARCHAR(255) NULL DEFAULT NULL,
  `file` VARCHAR(255) NULL,
  `file_dir` VARCHAR(255) NULL,
  `created` VARCHAR(255) NULL DEFAULT NULL,
  `updated` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `seminfo2014`.`programs_speakers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`programs_speakers` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`programs_speakers` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `certificado` TINYINT(1) NULL,
  `program_id` INT(10) NOT NULL,
  `speaker_id` INT(10) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_programas_palestrantes_programas1_idx` (`program_id` ASC),
  INDEX `fk_programas_palestrantes_palestrantes1_idx` (`speaker_id` ASC),
  CONSTRAINT `fk_programas_palestrantes_programas1`
    FOREIGN KEY (`program_id`)
    REFERENCES `seminfo2014`.`programs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_programas_palestrantes_palestrantes1`
    FOREIGN KEY (`speaker_id`)
    REFERENCES `seminfo2014`.`speakers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `seminfo2014`.`holdings`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`holdings` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`holdings` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `user_id` INT(10) NOT NULL,
  `program_id` INT(10) NOT NULL,
  `status` TINYINT(1) NULL DEFAULT 1 COMMENT 'status da paticipação do urutário',
  `certificado` TINYINT(1) NULL DEFAULT 0,
  `credenciado` TINYINT(1) NULL DEFAULT 0,
  `reservas` TINYINT(1) NULL DEFAULT 0,
  `presenca` INT NULL DEFAULT 0,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_programas_users1_idx` (`user_id` ASC),
  INDEX `fk_users_programas_programas1_idx` (`program_id` ASC),
  CONSTRAINT `fk_users_programas_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `seminfo2014`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_programas_programas1`
    FOREIGN KEY (`program_id`)
    REFERENCES `seminfo2014`.`programs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `seminfo2014`.`homes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`homes` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`homes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `count` INT NULL,
  `session` VARCHAR(45) NULL,
  `session_count` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `seminfo2014`.`sponsorships`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`sponsorships` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`sponsorships` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `website` VARCHAR(255) NULL,
  `description` TEXT NULL,
  `file` VARCHAR(255) NULL,
  `file_dir` VARCHAR(255) NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `seminfo2014`.`users_messages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`users_messages` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`users_messages` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `user_id` INT(10) NOT NULL,
  `message_id` INT(11) NOT NULL,
  `read` TINYINT(1) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_messages_messages1_idx` (`message_id` ASC),
  INDEX `fk_users_messages_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_users_messages_messages1`
    FOREIGN KEY (`message_id`)
    REFERENCES `seminfo2014`.`messages` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_messages_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `seminfo2014`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `seminfo2014`.`events_sponsorships`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seminfo2014`.`events_sponsorships` ;

CREATE TABLE IF NOT EXISTS `seminfo2014`.`events_sponsorships` (
  `event_id` INT(10) NOT NULL,
  `sponsorship_id` INT(10) NOT NULL,
  `id` INT NOT NULL AUTO_INCREMENT,
  INDEX `fk_events_has_sponsorships_sponsorships1_idx` (`sponsorship_id` ASC),
  INDEX `fk_events_has_sponsorships_events1_idx` (`event_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_events_has_sponsorships_events1`
    FOREIGN KEY (`event_id`)
    REFERENCES `seminfo2014`.`events` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_events_has_sponsorships_sponsorships1`
    FOREIGN KEY (`sponsorship_id`)
    REFERENCES `seminfo2014`.`sponsorships` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `seminfo2014`.`groups`
-- -----------------------------------------------------
START TRANSACTION;
USE `seminfo2014`;
INSERT INTO `seminfo2014`.`groups` (`id`, `name`, `description`, `created`, `modified`) VALUES (1, NULL, NULL, NULL, NULL);
INSERT INTO `seminfo2014`.`groups` (`id`, `name`, `description`, `created`, `modified`) VALUES (2, NULL, NULL, NULL, NULL);
INSERT INTO `seminfo2014`.`groups` (`id`, `name`, `description`, `created`, `modified`) VALUES (3, NULL, NULL, NULL, NULL);
INSERT INTO `seminfo2014`.`groups` (`id`, `name`, `description`, `created`, `modified`) VALUES (4, NULL, NULL, NULL, NULL);

COMMIT;

