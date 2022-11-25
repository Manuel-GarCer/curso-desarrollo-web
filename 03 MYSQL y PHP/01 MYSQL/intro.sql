#mysql -u root --> consola
#mysql -u <user> -p --> para que pida contraseña

-- COMANDOS INICIALES--
--QUERIES -> CONSULTAS

show databases;

SHOW DATABASE;

CREATE DATABASE dw2022_1;

USE dw2022_1;

CREATE TABLE persona (
    per_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    per_nombres VARCHAR(100) NOT NULL,
    per_apellidos VARCHAR(100) NOT NULL,
    per_dni CHAR(8) UNIQUE NOT NULL,
    per_fec_nac DATE

);

--VARCHAR 50
--EDUARDO
--CHAR 50
--EDUARDO_________________________________________________

SHOW TABLES;
DESC personas;

ALTER TABLE personas ADD COLUMN per_genero VARCHAR(25) AFTER per_dni;

ALTER TABLE personas CHANGE COLUMN per_genero per_ger CHAR(1) NOT NULL;

ALTER TABLE personas DROP COLUMN per_gen;