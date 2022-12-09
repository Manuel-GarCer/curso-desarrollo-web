-- 💡💡 RELACIONAR TABLAS SIN EL USO DE LLAVAES PRIMARIAS Y FORANEAS 💡💡
-- para relacionar actores y peliculas hacemos una tabla intermedia
CREATE TABLE personajes (
    per_act_id INT NOT NULL,
    per_peli_id INT NOT NULL,
    per_nombre VARCHAR(100) NOT NULL
);

INSERT INTO personajes (per_act_id, per_peli_id, per_nombre) VALUES --insertar dentro personajes
    (1, 1, 'Spiderman'),
    (2, 1, 'MJ'),
    (3, 2, 'Neo'),
    (4, 2, 'Trinity'),
    (5, 4, 'Jack'),
    (6, 4, 'Rose'),
    (9, 11, 'James Bond'),
    (10, 11, 'Chica Bond'),
    (12, 1, 'Spiderman Tobbie');

-- ⚡⚡ REALACIONAR 2 TABLAS
-- PELICULA | PERSONAJES 
-- REFERENCIAS DE TABLAS
SELECT 
    peliculas.peli_nombre,
    personajes.per_nombre
FROM peliculas, personajes
    WHERE peliculas.peli_id = personajes.per_peli_id;
--Ojo el . se pone para ayudar a la pc a reconocer mas facilmente la tabla
-- NOMBRES Y APELLIDOS DEL ACTOR | PERSONAJE

SELECT
    CONCAT(actores.act_nombres, ' ', actores.act_apellidos) AS actor,
    personajes.per_nombre
    FROM personajes, actores
        WHERE personajes.per_act_id = actores.act_id;

-- 💡💡 ALIAS DE TABLAS
SELECT
    CONCAT(ac.act_nombres, ' ', ac.act_apellidos) AS actor,
    pe.per_nombre
    FROM personajes pe, actores ac
        WHERE pe.per_act_id = ac.act_id;

-- NOMBRE DE PELICULA | PERSONAJE | FECHA ESTRENO | RESTRICION = PG-16
SELECT 
    a.peli_nombre,
    b.per_nombre,
    a.peli_estreno,
    a.peli_restricciones
    FROM peliculas a, personajes b
        WHERE a.peli_id = b.per_peli_id
        AND a.peli_restricciones = 'pg-13';

-- 💡💡 3 TABLAS
SELECT *
    FROM peliculas a, personajes b, actores c
    WHERE a.peli_id = b.per_peli_id
        AND b.per_act_id = c.act_id;
--NOMBRES Y APELLIDOS DEL ACTOR | PERSONAJE | PELICULA | ORDENAR DESC FECHA ESTRENO

SELECT
    CONCAT(c.act_nombres, " ", c.act_apellidos) AS actor,  
    --se pone As para poner nombre a la columna a crear q une el nombre y apellido "actor" en este caso
    b.per_nombre,
    a.peli_nombre,
    a.peli_estreno
    FROM peliculas a, personajes b, actores c
    WHERE a.peli_id = b.per_peli_id
        AND b.per_act_id = c.act_id
            ORDER BY a.peli_estreno DESC;

CREATE TABLE directores (
    dire_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    dire_nombres VARCHAR(50) NOT NULL,
    dire_apellidos VARCHAR(50) NOT NULL
);

INSERT INTO directores (dire_nombres, dire_apellidos) VALUES
    ("Jon", "Watts"),
    ("Lana", "Wachowsky"),
    ("James", "Cameron"),
    ("Christopher", "Nolan"),
    ("Stanley", "Kubric"),
    ("John", "Krasinski"),
    ("Martin", "Campbell");

ALTER TABLE peliculas ADD COLUMN peli_dire_id INT AFTER peli_id;

--a continuación agregamos id a la columna creada asi:

UPDATE peliculas SET peli_dire_id = 1 WHERE peli_id = 1;
UPDATE peliculas SET peli_dire_id = 2 WHERE peli_id = 2;
UPDATE peliculas SET peli_dire_id = 3 WHERE peli_id = 4;
UPDATE peliculas SET peli_dire_id = 3 WHERE peli_id = 8;
UPDATE peliculas SET peli_dire_id = 4 WHERE peli_id = 5;
UPDATE peliculas SET peli_dire_id = 4 WHERE peli_id = 9;
UPDATE peliculas SET peli_dire_id = 5 WHERE peli_id = 6;
UPDATE peliculas SET peli_dire_id = 6 WHERE peli_id = 10;
UPDATE peliculas SET peli_dire_id = 7 WHERE peli_id = 11;

--Updata: actualizar, SET: establece WHERE: donde

SELECT *
    FROM peliculas a, directores b
    WHERE a.peli_dire_id = b.dire_id;

--CON 4 TABLAS:

SELECT *
    FROM peliculas a, personajes b, actores c, directores d
    WHERE a.peli_id = b.per_peli_id
        AND b.per_act_id = c.act_id
        AND a.peli_dire_id = d.dire_id;

--NOMBRE PELICULA|NOMBRE Y APELLIDOS DEL DIRECTOR | NOMBRE Y APELLIDO DE ACTOR | PERSONAJE | LAS PELICULAS ESTEN EN ORDEN ASCENDENTE

SELECT
    a.peli_nombre,
    CONCAT(d.dire_nombres, " ", d.dire_apellidos) AS director,
    CONCAT(c.act_nombres, " ", c.act_apellidos) AS actor,  --OJO: no olvidar comas, al ultimo no
    b.per_nombre
    FROM peliculas a, personajes b, actores c, directores d
    WHERE a.peli_id = b.per_peli_id
        AND b.per_act_id = c.act_id
        AND a.peli_dire_id = d.dire_id
    ORDER BY a.peli_nombre;