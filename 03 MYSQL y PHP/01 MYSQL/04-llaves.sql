ALTER TABLE peliculas CHANGE COLUMN peli_dire_id peli_dire_id INT(10) UNSIGNED;
--se lo iguala a 10 porque ambas tablas deben de tener un # igual para relacionarce en llaves

-- 🔥🔥 RESTRICCIONES
-- RESTRICT
    -- por defecto, impide realizar modificaciones que atenten la 
    -- integridad referencial de las tablas, no permite borrar
-- CASCADE
    -- al actualizar o borrar los datos referenciados, tambien se actualiza o se borra los
    -- datos de la tabla dependiente
-- SET NULL
    -- se establece campos NULL a la tabla dependiente al momento de cambiar o borrar el campo
-- NO ACTION: no hace nada

ALTER TABLE peliculas
    ADD CONSTRAINT fk_direId FOREIGN KEY (peli_dire_id)
    REFERENCES directores (dire_id)
    ON DELETE RESTRICT ON UPDATE RESTRICT;

--ADD CONSTRAINT: poner alias
--FOREIGN KEY: clave externa
--ON DELETE RESTRICT: al borrar restringir
--ON UPDATE RESTRICT: al actualizar restringir

DELETE FROM directores WHERE dire_id = 11;

DELETE FROM peliculas WHERE peli_id = 1;

UPDATE peliculas SET peli_dire_id = 1 WHERE peli_id = 13;
--SET: establecer

ALTER TABLE peliculas DROP CONSTRAINT fk_direId;
--CONSTRAINT: restriccion

ALTER TABLE peliculas
    ADD CONSTRAINT fk_direId FOREIGN KEY (peli_dire_id)
    REFERENCES directores (dire_id)
    ON DELETE CASCADE ON UPDATE CASCADE;
--CASCADE: para borrar datos referenciados

DELETE FROM directores WHERE dire_id = 3