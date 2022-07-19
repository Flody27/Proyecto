-- Procedimiento para el login
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `login`(IN `Username_P` VARCHAR(50))
BEGIN
	SELECT * FROM user where Username_P = user.username;
END$$
DELIMITER ;

-- Procedimiento para el singup
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `singup`(IN `nombre_P` VARCHAR(30), IN `apellido1_P` VARCHAR(30), IN `apellido2_P` VARCHAR(30), IN `username_P` VARCHAR(15), IN `password_P` VARCHAR(255), IN `sexo_P` ENUM('Femenino','Masculino'), IN `idUnidad_P` INT(11), IN `estado_cuenta_p` ENUM('Activo','Inactivo'), IN `Privilegios_P` INT(11))
BEGIN
INSERT INTO `user` (`nombre`, `apellido1`, `apellido2`, `username`, `password`, `sexo`, `id_unidad`, `estado_cuenta`, `privilegios`) 
VALUES 
(nombre_P,apellido1_P,apellido2_P,username_P,password_P,sexo_P,idUnidad_P,estado_cuenta_p,Privilegios_P); 
END$$
DELIMITER ;

