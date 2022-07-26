-- Procedimiento para el login
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `login`(IN `Username_P` VARCHAR(50))
BEGIN
	SELECT user.username,user.password,user.id_persona,user.estado_cuenta,
    privilegios.nombre_privilegio 
    FROM user , privilegios 
    where Username_P = user.username AND
    user.privilegios = privilegios.id_privilegio;
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
-- Procedimiento para el cambion de contraseña 
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `changePassword`(IN `Username_P` VARCHAR(14), IN `NewPassword` VARCHAR(255))
BEGIN
	UPDATE
    	user
    SET
    	user.password = NewPassword
    WHERE
    	user.username =  Username_P;
END$$
DELIMITER ;

-- Procecidimientos para obtener los roles
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getRoles`()
BEGIN
	SELECT * FROM privilegios;
END$$
DELIMITER ;

-- Procecidimientos para obtener las unidades
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getUnidades`()
BEGIN
	SELECT * FROM unidad;
END$$
DELIMITER ;

-- Procecidimientos para obtener los usuarios
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getUsers`()
BEGIN
	SELECT * FROM user,unidad,privilegios where 
    user.id_unidad = unidad.id_unidad and 
    user.privilegios = privilegios.id_privilegio;
END$$
DELIMITER ;


