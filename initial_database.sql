-- Table User --
Create Table `users` (
	`id_user` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(100) NOT NULL,
	`username` VARCHAR(50) NOT NULL UNIQUE,
	`password` VARCHAR(100) NOT NULL,
	`role` VARCHAR(1) NOT NULL
<<<<<<< Updated upstream
);
INSERT INTO `users`(`name`, `username`, `password`, `role`) 
VALUES ('Administrator','administrator','21232f297a57a5a743894a0e4a801fc3',1);
=======
) 
>>>>>>> Stashed changes
