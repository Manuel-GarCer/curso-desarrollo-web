ALTER TABLE peliculas ADD COLUMN peli_img TEXT AFTER peli_dire_id
--TEXT AFTER: columna o texto despues de 

UPDATE peliculas SET peli_img = "https://www.ecartelera.com/carteles/15800/15882/005_m.jpg" WHERE peli_id = 13;

SELECT
    a.peli_id,
    a.peli_img,
    a.peli_nombre,
    CONCAT(b.dire_nombres, " ", b.dire_apellidos) AS director,
    a.peli_restricciones
    FROM peliculas a
        INNER JOIN directores b ON a.peli_dire_id = b.dire_id;

-------------------------------------------------------------------------------------------------
--TAREA:

ALTER TABLE directores ADD COLUMN dire_img TEXT AFTER dire_apellidos;

-- ALTER TABLE directores DROP COLUMN dire_img;

ALTER TABLE directores ADD COLUMN dire_nac VARCHAR(100) AFTER dire_img;

INSERT INTO directores (dire_nombres, dire_apellidos) VALUES
    ("Robert", "Zemeckis"),
    ("George", "Lucas"),
    ("Francisco", "Lombardi"),
    ("Night", "Salaman"),
    ("Morten", "Tyldum");


UPDATE directores SET dire_img = "https://upload.wikimedia.org/wikipedia/commons/2/26/Jon_Watts_by_Gage_Skidmore_2.jpg" WHERE dire_id = 1;

UPDATE directores SET dire_img = "https://es.web.img3.acsta.net/pictures/16/03/09/16/29/317444.jpg" WHERE dire_id = 2;

UPDATE directores SET dire_img = "https://upload.wikimedia.org/wikipedia/commons/c/c4/Christopher_Nolan%2C_London%2C_2013_%28crop%29.jpg" WHERE dire_id = 4;

UPDATE directores SET dire_img = "https://upload.wikimedia.org/wikipedia/commons/f/fa/Kubrick_on_the_set_of_Barry_Lyndon_%281975_publicity_photo%29_crop.jpg" WHERE dire_id = 5;

UPDATE directores SET dire_img = "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c7/John_Krasinski_and_Josh_Wood_%28cropped%29.jpg/170px-John_Krasinski_and_Josh_Wood_%28cropped%29.jpg" WHERE dire_id = 6;

UPDATE directores SET dire_img = "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Martin_Campbell.jpg/260px-Martin_Campbell.jpg" WHERE dire_id = 7;

UPDATE directores SET dire_img = "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Ron_Howard_Cannes_2018.jpg/640px-Ron_Howard_Cannes_2018.jpg" WHERE dire_id = 8;

UPDATE directores SET dire_img = "https://upload.wikimedia.org/wikipedia/commons/6/67/Steven_Spielberg_by_Gage_Skidmore.jpg" WHERE dire_id = 9;

UPDATE directores SET dire_img = "https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Quentin_Tarantino_by_Gage_Skidmore.jpg/800px-Quentin_Tarantino_by_Gage_Skidmore.jpg" WHERE dire_id = 10;

UPDATE directores SET dire_img = "https://upload.wikimedia.org/wikipedia/commons/d/d7/Robert_Zemeckis_%22The_Walk%22_at_Opening_Ceremony_of_the_28th_Tokyo_International_Film_Festival_%2821835891403%29_%28cropped%29.jpg" WHERE dire_id = 12;

UPDATE directores SET dire_img = "https://upload.wikimedia.org/wikipedia/commons/a/a0/George_Lucas_cropped_2009.jpg" WHERE dire_id = 13;

UPDATE directores SET dire_img = "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Francisco_Lombardi_en_2018.jpg/640px-Francisco_Lombardi_en_2018.jpg" WHERE dire_id = 14;

UPDATE directores SET dire_img = "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e9/Alec_Guinness_6_Allan_Warren.jpg/640px-Alec_Guinness_6_Allan_Warren.jpg" WHERE dire_id = 15;

UPDATE directores SET dire_img = "https://upload.wikimedia.org/wikipedia/commons/6/6c/Morten_Tyldum_Fade_In_00.58_%28cropped%29.jpg", dire_nac = "Noruega" WHERE dire_id = 17;


UPDATE directores SET dire_nac = "Estadounidense" WHERE dire_id = 1;

UPDATE directores SET dire_nac = "Estadounidense" WHERE dire_id = 2;

UPDATE directores SET dire_nac = "Británico" WHERE dire_id = 4;

UPDATE directores SET dire_nac = "Británico" WHERE dire_id = 5;

UPDATE directores SET dire_nac = "Estadounidense" WHERE dire_id = 6;

UPDATE directores SET dire_nac = "Neozelandés." WHERE dire_id = 7;

UPDATE directores SET dire_nac = "Estadounidense" WHERE dire_id = 8;

UPDATE directores SET dire_nac = "Estadounidense" WHERE dire_id = 9;

UPDATE directores SET dire_nac = "Estadounidense" WHERE dire_id = 10;

UPDATE directores SET dire_nac = "Estadounidense" WHERE dire_id = 12;

UPDATE directores SET dire_nac = "Estadounidense" WHERE dire_id = 13;

UPDATE directores SET dire_nac = "Peruano" WHERE dire_id = 14;

UPDATE directores SET dire_nac = "India" WHERE dire_id = 15;

ALTER TABLE directores ADD COLUMN dire_peli_id INT AFTER dire_id;



UPDATE directores SET dire_peli_id = 16 WHERE dire_id = 1;
UPDATE directores SET dire_peli_id = 2 WHERE dire_id = 2;
UPDATE directores SET dire_peli_id = 5 WHERE dire_id = 4;

UPDATE directores SET dire_peli_id = 6 WHERE dire_id = 5;
UPDATE directores SET dire_peli_id = 10 WHERE dire_id = 6;
UPDATE directores SET dire_peli_id = 11 WHERE dire_id = 7;

UPDATE directores SET dire_peli_id = 18 WHERE dire_id = 12;
UPDATE directores SET dire_peli_id = 20 WHERE dire_id = 13;
UPDATE directores SET dire_peli_id = 19 WHERE dire_id = 14;


SELECT
    b.dire_id,
    b.dire_img,
    b.dire_nac, 
    CONCAT(b.dire_nombres, " ", b.dire_apellidos) AS director,
    a.peli_nombre
    FROM directores b
    INNER JOIN peliculas a ON b.dire_peli_id = a.peli_id;
