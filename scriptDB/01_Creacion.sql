-- Creación de la base de datos. --
CREATE DATABASE IF NOT EXISTS DAW202_AplicacionLogInLogOffMVC;

-- Uso de la base de datos. --
USE DAW202_AplicacionLogInLogOffMVC;

-- Creación de la tabla T01_Usuarios. --
CREATE TABLE IF NOT EXISTS T01_Usuarios(
    T01_CodUsuario VARCHAR(45) PRIMARY KEY,
    T01_Password VARCHAR(256) NOT NULL,
    T01_DescUsuario VARCHAR(255) NOT NULL,
    T01_FechaHoraUltimaConexion INT NOT NULL,
    T01_NumAccesos INT NOT NULL,
    T01_Perfil enum('usuario', 'administrador') NOT NULL,
    T01_ImagenUsuario BLOB
)Engine=InnoDB;

-- Creación de la tabla T02_Departamentos. --
CREATE TABLE IF NOT EXISTS T02_Departamentos(
    T02_CodDepartamento VARCHAR(3) PRIMARY KEY,
    T02_DescDepartamento VARCHAR(255) NOT NULL,
    T02_FechaCreacionDepartamento INT NOT NULL,
    T02_VolumenDeNegocio FLOAT NOT NULL,
    T02_FechaBajaDepartamento INT
)Engine=InnoDB;

-- Creación de la tabla T03_Cuestiones. --
CREATE TABLE IF NOT EXISTS T03_Cuestiones(
    T03_CodCuestion INT PRIMARY KEY,
    T03_DescCuestion VARCHAR(255) NOT NULL,
    T03_NumOrden INT NOT NULL,
    T03_TipoRespuesta INT(2) NOT NULL
)Engine=InnoDB;

-- Creación de la tabla T04_Opiniones. --
CREATE TABLE IF NOT EXISTS T04_Opiniones(
    T04_CodUsuario VARCHAR(45),
    T04_CodCuestion INT,
    T04_ValorOpinionTipo VARCHAR(50) NOT NULL,
    PRIMARY KEY (T04_CodUsuario, T04_CodCuestion),
    FOREIGN KEY (T04_CodUsuario)
    REFERENCES T01_Usuarios (T01_CodUsuario)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (T04_CodCuestion)
    REFERENCES T03_Cuestiones (T03_CodCuestion)
    ON DELETE CASCADE ON UPDATE CASCADE
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS T05_Gafas(
    T05_IdGafas INT PRIMARY KEY AUTO_INCREMENT,
    T05_Name VARCHAR(100) NOT NULL,
    T05_Modelo enum('hombre', 'mujer', 'unisex')
)Engine=InnoDB;

-- Creacion del usuario usuarioDAW202_AplicacionLogInLogOffMVC. --
CREATE USER IF NOT EXISTS 'usuarioDAW202_AplicacionLILOMVC'@'localhost' IDENTIFIED BY 'paso';

-- Permisos al usuario usuarioDAW202_AplicacionLogInLogOffMVC. --
GRANT ALL PRIVILEGES ON DAW202_AplicacionLogInLogOffMVC.* TO 'usuarioDAW202_AplicacionLILOMVC'@'localhost' WITH GRANT OPTION;
