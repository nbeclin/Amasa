CREATE TABLE IF NOT EXISTS `user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NULL,
  `site_grade` INT(1) NULL DEFAULT 0,
  `email` VARCHAR(100) NULL,
  `password` VARCHAR(100) NULL,
  `datetime` DATETIME NULL,
  `ip` VARCHAR(45) NULL,
  `blocked` INT(1) NULL DEFAULT 0,
  `lost_attempts` INT(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB