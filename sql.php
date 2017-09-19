CREATE TABLE `scas`.`Users` ( `user_id` INT NOT NULL AUTO_INCREMENT , `user_name` VARCHAR(25) NOT NULL , `user_email` VARCHAR(60) NOT NULL , `user_password` VARCHAR(255) NOT NULL , `joining_date` DATETIME NOT NULL , `user_tel` VARCHAR(14) NOT NULL , `user_role` INT NOT NULL COMMENT '0=Admin,1=Teacher,2=Student' , PRIMARY KEY (`user_id`) ) ENGINE = InnoDB;


INSERT INTO `scas`.`users` (`user_id`, `user_name`, `user_email`, `user_password`, `joining_date`, `user_tel`, `user_role`, `photofile`) VALUES (NULL, 'Moses', 'mosesm@gmail.com', 'e9fd588b5872543d86c44e763356a495', '2016-03-14 21:25:48', '+256778856137', '0', '1');

INSERT INTO `scas`.`users` (`user_id`, `user_name`, `user_email`, `user_password`, `joining_date`, `user_tel`, `user_role`, `photofile`) VALUES (NULL, 'Sarah', 'abeja@gmail.com', 'e9fd588b5872543d86c44e763356a495', '2016-03-14 21:28:39', '+256752016005', '0', '2');

CREATE TABLE `scas`.`Subject` ( `subject_id` INT NOT NULL AUTO_INCREMENT , `subject_name` VARCHAR(60) NOT NULL , `subject_short_name` VARCHAR(10) NOT NULL , `level` CHAR(1) NOT NULL , `subject_category` VARCHAR(255) NOT NULL , PRIMARY KEY (`subject_id`) ) ENGINE = InnoDB;
ALTER TABLE `Subject` ADD `code` VARCHAR(5) NOT NULL ;

CREATE TABLE `scas`.`SubjectCombination` ( `subject_combination_id` INT NOT NULL AUTO_INCREMENT , `combination_id` INT NOT NULL , `subject_id` INT NOT NULL , PRIMARY KEY (`subject_combination_id`) ) ENGINE = InnoDB;

CREATE TABLE `scas`.`Exams` ( `exam_id` INT NOT NULL AUTO_INCREMENT , `exam_name` INT NOT NULL , PRIMARY KEY (`exam_id`) ) ENGINE = InnoDB;

CREATE TABLE `scas`.`Course` ( `course_id` INT NOT NULL AUTO_INCREMENT , `course_name` VARCHAR(255) NOT NULL , PRIMARY KEY (`course_id`) ) ENGINE = InnoDB;

CREATE TABLE `scas`.`CareerCourse` ( `career_course_id` INT NOT NULL AUTO_INCREMENT , `course_id` INT NOT NULL , `career_id` INT NOT NULL , PRIMARY KEY (`career_course_id`) ) ENGINE = InnoDB;

ALTER TABLE `users` ADD `full_name` VARCHAR(90) NOT NULL AFTER `user_name`;
ALTER TABLE `users` CHANGE `user_tel` `user_tel` VARCHAR(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

CREATE TABLE `scas`.`category` ( `category_id` INT NOT NULL AUTO_INCREMENT , `category_name` VARCHAR(50) NOT NULL , PRIMARY KEY (`category_id`) ) ENGINE = InnoDB;

ALTER TABLE `subject` CHANGE `subject_category` `category_id` INT(11) NOT NULL;
INSERT INTO `scas`.`category` (`category_id`, `category_name`) VALUES ('1', 'GENERAL PAPER'), ('2', 'HUMANITIES');
INSERT INTO `scas`.`category` (`category_id`, `category_name`) VALUES ('3', 'LANGUAGES'), ('4', 'MATHEMATICAL SUBJECTS');
INSERT INTO `scas`.`category` (`category_id`, `category_name`) VALUES ('5', 'SCIENCE SUBJECTS'), ('6', 'CULTURAL SUBJECTS AND OTHERS');
INSERT INTO `scas`.`category` (`category_id`, `category_name`) VALUES ('7', 'TECHNICAL SUBJECTS'), ('8', 'ENGLISH LANGUAGE');
ALTER TABLE `exams` CHANGE `exam_name` `exam_name` VARCHAR(225) NOT NULL;
ALTER TABLE `marks` ADD `aggregate_id` INT NOT NULL ;

CREATE TABLE `scas`.`SubjectPrerequisites` ( `sp_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `subject_id` INT NOT NULL , `o_level_subject_id` INT NOT NULL , `aggregate_id` INT NOT NULL COMMENT 'Minimun Aggreate ID' , `type` INT NOT NULL COMMENT '1=Required,0=Desirable' ) ENGINE = InnoDB;