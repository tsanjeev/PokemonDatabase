DROP TABLE IF EXISTS `poke_type`;
DROP TABLE IF EXISTS `poke_evo`;
DROP TABLE IF EXISTS `poke_skill`;
DROP TABLE IF EXISTS `poke_loc`;
DROP TABLE IF EXISTS `pokemon`;
DROP TABLE IF EXISTS `type`;
DROP TABLE IF EXISTS `skill`;
DROP TABLE IF EXISTS `location`;


CREATE TABLE `pokemon` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY (`name`)
) ENGINE=InnoDB;

CREATE TABLE `type` (
	`type_id` int(11) NOT NULL AUTO_INCREMENT,
	`type_name` varchar(255) NOT NULL,
	PRIMARY KEY (`type_id`),
	UNIQUE KEY (`type_name`)
) ENGINE=InnoDB;

CREATE TABLE `skill` (
	`skill_id` int(11) NOT NULL AUTO_INCREMENT,
	`skill_name` varchar(255) NOT NULL,
	PRIMARY KEY (`skill_id`),
	UNIQUE KEY (`skill_name`)
) ENGINE=InnoDB;

CREATE TABLE `location` (
	`loc_id` int(11) NOT NULL AUTO_INCREMENT,
	`loc_name` varchar(255) NOT NULL,
	PRIMARY KEY (`loc_id`),
	UNIQUE KEY (`loc_name`)
) ENGINE=InnoDB;

CREATE TABLE `poke_type` (
	`pid` int(11) NOT NULL,
	`tid` int(11) NOT NULL,
	PRIMARY KEY (`pid`, `tid`),
	FOREIGN KEY (`pid`) REFERENCES `pokemon` (`id`)
		ON DELETE CASCADE,
	FOREIGN KEY (`tid`) REFERENCES `type` (`type_id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `poke_evo` (
	`pid` int(11) NOT NULL,
	`evo_pid` int(11) NOT NULL,
	PRIMARY KEY (`pid`, `evo_pid`),
	FOREIGN KEY (`pid`) REFERENCES `pokemon` (`id`)
		ON DELETE CASCADE,
	FOREIGN KEY (`evo_pid`) REFERENCES `pokemon` (`id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `poke_skill` (
	`sid` int(11) NOT NULL,
	`pid` int(11) NOT NULL,
	PRIMARY KEY (`sid`, `pid`),
	FOREIGN KEY (`sid`) REFERENCES `skill` (`skill_id`)
		ON DELETE CASCADE,
	FOREIGN KEY (`pid`) REFERENCES `pokemon` (`id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `poke_loc` (
	`pid` int(11) NOT NULL,
	`lid` int(11) NOT NULL,
	PRIMARY KEY (`pid`, `lid`),
	FOREIGN KEY (`pid`) REFERENCES `pokemon` (`id`)
		ON DELETE CASCADE,
	FOREIGN KEY (`lid`) REFERENCES `location` (`loc_id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;