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

SELECT * FROM personas;

SELECT per_nombres, per_apellidos FROM personas;

INSERT INTO personas (per_nombres, per_apellidos, per_dni, per_fec_nac) VALUES  
    ("Malena", "Ruiz", "22222222", "1991-12-12 01:00:00"),      
    ("Pedro", "Rodriguez", "33333333","1992-12-12 01:00:00"),
    ("Javier", "Perez", "44444444", "1993-12-12 02:00:00");

INSERT INTO personas (per_nombres, per_apellidos, per_dni, per_fec_nac) VALUES  
    ("Sebastian", "Piñera", "55555555", "1980-12-12 01:00:00");

-- CON MUCHO CUIDADO DELETE

DELETE FROM personas WHERE per_id = 4; --borra individualmente

INSERT INTO personas (per_nombres, per_apellidos, per_dni, per_fec_nac) VALUES 
    ("Javier", "Perez", "44444444", "1993-12-12 02:00:00");

TRUNCATE personas; --borra todo

------------------------------------------------------------------------------
CREATE TABLE peliculas (
    peli_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    peli_nombre VARCHAR(255) NOT NULL,
    peli_genero VARCHAR(100) NOT NULL,
    peli_estreno DATE NOT NULL,
    peli_restricciones VARCHAR(5)
);

INSERT INTO peliculas (peli_nombre, peli_genero, peli_estreno, peli_restricciones) VALUES
    ("Spiderman: No way Home", "Ciencia Ficción", "2021-12-12", "PG-13"),
    ("Matrix", "Ciencia Ficción", "1999-12-24", "PG-13"),
    ("El Código Enigma", "Bélica", "2017-08-29", "PG-16"),
    ("Titanic", "Drama Romantico", "1997-09-09", "PG-16"),
    ("Interstellar", "Ciencia Ficcón", "2014-10-10", "PG"),
    ("El Resplandor", "Terror", "1980-05-05", "PG-18"),
    ("Un lugar en silencio", "Terror", "1996-05-05", "PG-16"),
    ("Avatar", "Ciencia Ficción", "2009-10-18", "PG"),
    ("Inception", "Ciencia Ficción", "2010-05-09", "PG"),
    ("Nacidos para Matar", "Acción", "2000-01-01", "PG-16");

--WHERE: algo, parecido

SELECT * FROM peliculas WHERE peli_id = 5;

SELECT * FROM peliculas WHERE peli_nombre = "Interestellar";

SELECT * FROM peliculas WHERE peli_restricciones = "pg";
 

---ORDER BY: ordenar por

SELECT * FROM peliculas;

SELECT * FROM peliculas ORDER BY peli_id DESC;

SELECT * FROM peliculas ORDER BY peli_nombre;

SELECT * FROM peliculas WHERE peli_genero = "ciencia ficcion" ORDER BY peli_nombre DESC;

-----------------------------------------------------------------
CREATE TABLE actores (
    act_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    act_nombres VARCHAR(100) NOT NULL,
    act_apellidos VARCHAR(100) NOT NULL
);

INSERT INTO actores (act_nombres, act_apellidos) VALUES
    ("Tom", "Holland"),
    ("Zendaya", "Collen"),
    ("Keanu", "Reeves"),
    ("Carrie-Anne", "Moss"),
    ("Leonardo", "Dicaprio"),
    ("Kate", "Winslet"),
    ("Jack", "Nicolson"),
    ("Shelly", "Duvall"),
    ("Pierce", "Brosnan"),
    ("Izabella", "Scorupto"),
    ("Vincent", "Donofrio"),
    ("Tobbye", "Maguire");

--HACER UN QUERY DONDE ME DEVUELVA LOS NOMBRES Y APELLIDOS

SELECT act_nombres, act_apellidos FROM actores; 

-- FROM: DE

SELECT CONCAT(act_nombres, " ", act_apellidos) FROM actores;

--ALIAS DE CAMPOS

SELECT CONCAT(act_nombres, " ", act_apellidos) AS actor FROM actores;

SELECT CONCAT(act_nombres, " ", act_apellidos) AS actor_de_reparto FROM actores;

--HACER UN QUERY DONDE ME DEVUELVA LOS NOMBRES Y APELLIDOS, QUE ESTEN EN UNA SOLA COLUMNA Y QUE ESTEN ORDENADOS POR APELLIDOS DE FORMA DESCENDENTE

SELECT CONCAT(act_nombres, " ", act_apellidos) AS actor FROM actores ORDER BY act_apellidos DESC;

--HACER UN QUERY DONDE MUESTRE EL POSIBLE CORREO CORPORATIVO
--APELLIDOS Y NOMBRES | POSIBLE CORREO
-- Manuel Garcia | mgarcia@continental.edu.PROCEDURE

SELECT SUBSTRING(act_nombres, 1, 1) FROM actores;

SELECT 
    CONCAT(act_apellidos, ' ', act_nombres) AS actor,
    CONCAT(SUBSTRING(act_nombres, 1, 1), act_apellidos, '@dominio.com') AS correo
    FROM actores;

-- ⚡⚡ GROUP BY

SELECT * FROM peliculas GROUP BY peli_genero;  --agrupar por


SELECT COUNT(peli_genero) AS cantidad, peli_genero FROM peliculas GROUP BY peli_genero;

--cantidad: para q se agrupen en esa columna

-- HACER UN QUERY QUE NOS DEVUELVA LA CANTIDAD DE PELICULAS QUE SON CIENCIA FICCION
-- CANTIDAD | GENERO

SELECT 
    COUNT(peli_genero) AS cantidad, 
    peli_genero
FROM peliculas
    WHERE peli_genero = "accion"  
    GROUP BY peli_genero;

-- COUNT: CONTAR
-- WHERE: DONDE ojo WHERE antes de GROUP BY o ORDER BY siempre
-----------------------------------------------------------------------------------
-- HACER UN QUERY QUE NOS DEVUELVA LA CANTIDAD DE PELICULAS QUE SON RESTRICCION PG-13
-- CANTIDAD | RESTRICCION
SELECT
    COUNT(peli_restricciones) AS canti,
    peli_restricciones
FROM peliculas
    WHERE peli_restricciones = 'pg-16'
    GROUP BY peli_restricciones;

-- ⚡⚡ COMODINES
SELECT * FROM peliculas WHERE peli_nombre LIKE "e%";

-- devuelveme peliculas que empiezen por "e" seguida de mas
-- aca comidin es % y * 

SELECT * FROM peliculas WHERE peli_nombre LIKE "%e";

-- devuelveme peliculas que terminen por "e"

SELECT * FROM peliculas WHERE peli_nombre LIKE "%e%";

-- devuelveme peliculas que tengan entre "e"