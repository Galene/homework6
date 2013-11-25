CREATE TABLE IF NOT EXISTS `#__student_` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`name` VARCHAR(10)  NOT NULL ,
`ordering` INT(11)  NOT NULL ,
`general_information` TEXT NOT NULL ,
`sex` VARCHAR(255)  NOT NULL ,
`date_of_birth` DATE NOT NULL ,
`group` VARCHAR(15)  NOT NULL ,
`student_credit_book` VARCHAR(10)  NOT NULL ,
`the_average_score` VARCHAR(5)  NOT NULL ,
`photo` VARCHAR(255)  NOT NULL ,
`created_by` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

