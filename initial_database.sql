-- Table User --
Create Table 'users' (
	'id_user' INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	'name' VARCHAR(100) NOT NULL,
	'username' VARCHAR(50) NOT NULL UNIQUE,
	'password' VARCHAR(100) NOT NULL,
	'role' VARCHAR(1) NOT NULL
) 