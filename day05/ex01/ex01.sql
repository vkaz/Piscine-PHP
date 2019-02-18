CREATE TABLE IF NOT EXISTS ft_table 
(id INT PRIMARY KEY AUTO_INCREMENT, `login` CHAR(8) DEFAULT 'toto' NOT NULL, 
	`group` ENUM('staff', 'student', 'other') NOT NULL, creation_date DATE NOT NULL);
