# SQL Scheme

	-- -----------------------------------------------------
	-- Table `pl_user_config`
	-- -----------------------------------------------------
	CREATE  TABLE `pl_user_config` (
	  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
	  `user_id` INT(11) UNSIGNED NOT NULL ,
	  `key` VARCHAR(255) NOT NULL ,
	  `value` TEXT NOT NULL ,
	  PRIMARY KEY (`id`) ,
	  INDEX `fk_user_config_user_id` (`user_id` ASC) ,
	  CONSTRAINT `fk_user_config_user_id`
	    FOREIGN KEY (`user_id` )
	    REFERENCES `pl_users` (`id` )
	    ON DELETE CASCADE
	    ON UPDATE NO ACTION)
	DEFAULT CHARACTER SET = utf8;
	
