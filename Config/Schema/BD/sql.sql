SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `nucleo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `nucleo` ;

-- -----------------------------------------------------
-- Table `nucleo`.`cursos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`cursos` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`cursos` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` VARCHAR(255) NOT NULL,
  `body` TEXT NOT NULL,
  `file` VARCHAR(255) NULL,
  `file_dir` VARCHAR(255) NULL,
  `user_count` VARCHAR(45) NULL,
  `document_count` INT(11) NULL DEFAULT 0,
  `updated` DATETIME NULL,
  `created` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nucleo`.`groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`groups` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`groups` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `descricao` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
PACK_KEYS = DEFAULT
ROW_FORMAT = DEFAULT;


-- -----------------------------------------------------
-- Table `nucleo`.`sexos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`sexos` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`sexos` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `sexo_count` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nucleo`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`users` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`users` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `group_id` INT(11) NOT NULL DEFAULT 3,
  `curso_id` INT NULL,
  `matricula` VARCHAR(45) NULL,
  `name` VARCHAR(255) NOT NULL,
  `sexo_id` INT(10) NOT NULL,
  `username` CHAR(60) NULL,
  `password` CHAR(255) NOT NULL COMMENT '\n',
  `email` VARCHAR(255) NOT NULL,
  `cpf` CHAR(11) NOT NULL,
  `telefone` CHAR(15) NOT NULL,
  `status` TINYINT(1) NULL DEFAULT 1,
  `website` VARCHAR(100) NULL,
  `image` VARCHAR(255) NULL,
  `image_dir` VARCHAR(255) NULL,
  `holding_count` INT NULL DEFAULT 0,
  `updated` DATETIME NULL,
  `created` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_cursos2_idx` (`curso_id` ASC),
  INDEX `fk_users_grupos1_idx` (`group_id` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  INDEX `fk_users_sexos1_idx` (`sexo_id` ASC),
  CONSTRAINT `fk_users_cursos2`
    FOREIGN KEY (`curso_id`)
    REFERENCES `nucleo`.`cursos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_grupos1`
    FOREIGN KEY (`group_id`)
    REFERENCES `nucleo`.`groups` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_sexos1`
    FOREIGN KEY (`sexo_id`)
    REFERENCES `nucleo`.`sexos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2;


-- -----------------------------------------------------
-- Table `nucleo`.`contacts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`contacts` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`contacts` (
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
    REFERENCES `nucleo`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3;


-- -----------------------------------------------------
-- Table `nucleo`.`menus`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`menus` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`menus` (
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
-- Table `nucleo`.`links`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`links` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`links` (
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
    REFERENCES `nucleo`.`menus` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_links_links1`
    FOREIGN KEY (`parent_id`)
    REFERENCES `nucleo`.`links` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `nucleo`.`typemessages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`typemessages` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`typemessages` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `description` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nucleo`.`messages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`messages` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`messages` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `typemessage_id` INT(5) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `body` TEXT NOT NULL,
  `notify` VARCHAR(255) NULL,
  `status` TINYINT(1) NULL DEFAULT 0,
  `updated` DATETIME NULL,
  `created` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_messages_typemessages1_idx` (`typemessage_id` ASC),
  CONSTRAINT `fk_messages_typemessages1`
    FOREIGN KEY (`typemessage_id`)
    REFERENCES `nucleo`.`typemessages` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nucleo`.`types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`types` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`types` (
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
-- Table `nucleo`.`categorias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`categorias` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`categorias` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `title` CHAR(255) NOT NULL,
  `alias` CHAR(255) NULL,
  `updated` CHAR(255) NULL,
  `created` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `alias_UNIQUE` (`alias` ASC),
  UNIQUE INDEX `title_UNIQUE` (`title` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nucleo`.`contents`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`contents` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`contents` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `type_id` INT(10) NOT NULL,
  `categoria_id` INT(10) NOT NULL,
  `user_id` INT(10) NOT NULL,
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
  INDEX `fk_contents_categorias1_idx` (`categoria_id` ASC),
  INDEX `fk_contents_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_contents_types1`
    FOREIGN KEY (`type_id`)
    REFERENCES `nucleo`.`types` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contents_categorias1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `nucleo`.`categorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contents_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `nucleo`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 7;


-- -----------------------------------------------------
-- Table `nucleo`.`settings`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`settings` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`settings` (
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
-- Table `nucleo`.`uploads`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`uploads` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`uploads` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `type` VARCHAR(200) NOT NULL,
  `size` INT(11) NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `nucleo`.`documents`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`documents` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`documents` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `curso_id` INT(10) NULL,
  `title` VARCHAR(45) NOT NULL,
  `file` VARCHAR(255) NOT NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_documentos_cursos1_idx` (`curso_id` ASC),
  CONSTRAINT `fk_documentos_cursos1`
    FOREIGN KEY (`curso_id`)
    REFERENCES `nucleo`.`cursos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nucleo`.`events`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`events` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`events` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `local` VARCHAR(255) NOT NULL,
  `publicado` TINYINT(1) NULL,
  `status` TINYINT(1) NULL DEFAULT 1,
  `inicio` DATETIME NOT NULL,
  `termino` DATETIME NOT NULL,
  `realizacao` VARCHAR(255) NULL,
  `descricao` TEXT NULL,
  `organizacao` TEXT NULL,
  `holding_count` INT NULL DEFAULT 0,
  `file` VARCHAR(255) NULL,
  `file_dir` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nucleo`.`tipoprogramas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`tipoprogramas` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`tipoprogramas` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `alias` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nucleo`.`horarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`horarios` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`horarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `inicio` DATETIME NOT NULL,
  `termino` DATETIME NOT NULL,
  `duracao` VARCHAR(45) NULL,
  `status` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `inicio_UNIQUE` (`inicio` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nucleo`.`programas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`programas` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`programas` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `event_id` INT(20) NOT NULL,
  `tipoprograma_id` INT(10) NOT NULL,
  `horario_id` INT NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `local` VARCHAR(255) NULL,
  `preco` DECIMAL(5,2) NULL,
  `vagas` INT NOT NULL,
  `reservas` INT NOT NULL,
  `filefoto` VARCHAR(255) NULL,
  `duracao` VARCHAR(255) NOT NULL,
  `file` VARCHAR(255) NOT NULL,
  `conteudo` TEXT NULL,
  `file_dir` VARCHAR(255) NULL,
  `certificamos` TEXT NULL,
  `certificamos_palestrante` TEXT NULL,
  `descricao` TEXT NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  `holding_count` INT NULL DEFAULT 0,
  `status` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  INDEX `fk_programas_eventos1_idx` (`event_id` ASC),
  INDEX `fk_programas_tipoprogramas1_idx` (`tipoprograma_id` ASC),
  INDEX `fk_horarios_horarios1_idx` (`horario_id` ASC),
  CONSTRAINT `fk_programas_eventos1`
    FOREIGN KEY (`event_id`)
    REFERENCES `nucleo`.`events` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_programas_tipoprogramas1`
    FOREIGN KEY (`tipoprograma_id`)
    REFERENCES `nucleo`.`tipoprogramas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_horarios_horarios1`
    FOREIGN KEY (`horario_id`)
    REFERENCES `nucleo`.`horarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nucleo`.`palestrantes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`palestrantes` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`palestrantes` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `telefone` CHAR(15) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `descricao` VARCHAR(255) NULL DEFAULT NULL,
  `filefoto` VARCHAR(255) NULL DEFAULT NULL,
  `twitter` VARCHAR(255) NULL DEFAULT NULL,
  `facebook` VARCHAR(255) NULL DEFAULT NULL,
  `blog` VARCHAR(255) NULL DEFAULT NULL,
  `linkedin` VARCHAR(255) NULL DEFAULT NULL,
  `lattes` VARCHAR(255) NULL DEFAULT NULL,
  `created` VARCHAR(255) NULL DEFAULT NULL,
  `updated` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nucleo`.`programas_palestrantes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`programas_palestrantes` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`programas_palestrantes` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `certificado` TINYINT(1) NULL,
  `programa_id` INT(10) NOT NULL,
  `palestrante_id` INT(10) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_programas_palestrantes_programas1_idx` (`programa_id` ASC),
  INDEX `fk_programas_palestrantes_palestrantes1_idx` (`palestrante_id` ASC),
  CONSTRAINT `fk_programas_palestrantes_programas1`
    FOREIGN KEY (`programa_id`)
    REFERENCES `nucleo`.`programas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_programas_palestrantes_palestrantes1`
    FOREIGN KEY (`palestrante_id`)
    REFERENCES `nucleo`.`palestrantes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nucleo`.`users_programas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`users_programas` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`users_programas` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `user_id` INT(10) NOT NULL,
  `programa_id` INT(10) NOT NULL,
  `horario_id` INT NOT NULL,
  `status` TINYINT(1) NULL,
  `certificado` TINYINT(1) NULL DEFAULT 0,
  `reservas` TINYINT(1) NULL DEFAULT 0,
  `presenca` TINYINT(1) NULL DEFAULT 0,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_programas_users1_idx` (`user_id` ASC),
  INDEX `fk_users_programas_programas1_idx` (`programa_id` ASC),
  INDEX `fk_users_programas_horarios1_idx` (`horario_id` ASC),
  CONSTRAINT `fk_users_programas_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `nucleo`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_programas_programas1`
    FOREIGN KEY (`programa_id`)
    REFERENCES `nucleo`.`programas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_programas_horarios1`
    FOREIGN KEY (`horario_id`)
    REFERENCES `nucleo`.`horarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nucleo`.`holdings`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`holdings` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`holdings` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `user_id` INT(10) NOT NULL,
  `event_id` INT(10) NOT NULL,
  `credenciamento` TINYINT(1) NULL,
  `comissao` TINYINT(1) NULL,
  `description` TEXT NULL,
  `mail` TINYINT(1) NULL DEFAULT 1,
  `write` TINYINT(1) NULL DEFAULT 1,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_user_eventos_eventos1_idx` (`event_id` ASC),
  INDEX `fk_user_eventos_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_user_eventos_eventos1`
    FOREIGN KEY (`event_id`)
    REFERENCES `nucleo`.`events` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_user_eventos_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `nucleo`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Tabela de participação do evento';


-- -----------------------------------------------------
-- Table `nucleo`.`homes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`homes` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`homes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `count` INT NULL,
  `session` VARCHAR(45) NULL,
  `session_count` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nucleo`.`categoriapatrocinios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`categoriapatrocinios` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`categoriapatrocinios` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `color` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nucleo`.`patrocinios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`patrocinios` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`patrocinios` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `categoriapatrocinio_id` INT(10) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `website` VARCHAR(255) NULL,
  `description` TEXT NULL,
  `file` VARCHAR(255) NULL,
  `file_dir` VARCHAR(255) NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_patrocinios_categoriapatrocinios1_idx` (`categoriapatrocinio_id` ASC),
  CONSTRAINT `fk_patrocinios_categoriapatrocinios1`
    FOREIGN KEY (`categoriapatrocinio_id`)
    REFERENCES `nucleo`.`categoriapatrocinios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nucleo`.`events_patrocinios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`events_patrocinios` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`events_patrocinios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `event_id` INT(10) NOT NULL,
  `patrocinio_id` INT(10) NOT NULL,
  INDEX `fk_events_patrocinios_patrocinios1_idx` (`patrocinio_id` ASC),
  INDEX `fk_events_patrocinios_events1_idx` (`event_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_events_patrocinios_events1`
    FOREIGN KEY (`event_id`)
    REFERENCES `nucleo`.`events` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_events_patrocinios_patrocinios1`
    FOREIGN KEY (`patrocinio_id`)
    REFERENCES `nucleo`.`patrocinios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nucleo`.`users_messages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nucleo`.`users_messages` ;

CREATE TABLE IF NOT EXISTS `nucleo`.`users_messages` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `user_id` INT(10) NOT NULL,
  `message_id` INT(11) NOT NULL,
  `read` TINYINT(1) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_messages_messages1_idx` (`message_id` ASC),
  INDEX `fk_users_messages_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_users_messages_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `nucleo`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_messages_messages1`
    FOREIGN KEY (`message_id`)
    REFERENCES `nucleo`.`messages` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `nucleo`.`groups`
-- -----------------------------------------------------
START TRANSACTION;
USE `nucleo`;
INSERT INTO `nucleo`.`groups` (`id`, `name`, `created`, `modified`, `descricao`) VALUES (1, NULL, NULL, NULL, NULL);
INSERT INTO `nucleo`.`groups` (`id`, `name`, `created`, `modified`, `descricao`) VALUES (2, NULL, NULL, NULL, NULL);
INSERT INTO `nucleo`.`groups` (`id`, `name`, `created`, `modified`, `descricao`) VALUES (3, NULL, NULL, NULL, NULL);
INSERT INTO `nucleo`.`groups` (`id`, `name`, `created`, `modified`, `descricao`) VALUES (4, NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `nucleo`.`categoriapatrocinios`
-- -----------------------------------------------------
START TRANSACTION;
USE `nucleo`;
INSERT INTO `nucleo`.`categoriapatrocinios` (`id`, `name`, `color`) VALUES (1, 'Ouro', '#a9940f');
INSERT INTO `nucleo`.`categoriapatrocinios` (`id`, `name`, `color`) VALUES (NULL, 'Prata', '#b5b0b0');
INSERT INTO `nucleo`.`categoriapatrocinios` (`id`, `name`, `color`) VALUES (NULL, 'Bronze', '#b46b1d');

COMMIT;

