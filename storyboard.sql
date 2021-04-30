-- CREATE DATABASE storyboard
USE `storyboard`;
DROP TABLE IF EXISTS `panels`;
DROP TABLE IF EXISTS `storyboards`;
CREATE TABLE `storyboards`(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR (100)
);

CREATE TABLE panels(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
storyboard_id INT NOT NULL,
illustration TEXT,
textballoon TEXT,
textarea TEXT,
FOREIGN KEY (storyboard_id)
    REFERENCES storyboards(id)
    ON DELETE CASCADE
);

DELETE FROM panels where id>1;

