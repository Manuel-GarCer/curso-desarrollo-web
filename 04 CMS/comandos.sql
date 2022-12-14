CREATE DATABASE agencia;

USE agencia;

CREATE TABLE header (
    hea_logo VARCHAR(50) NOT NULL,
    hea_subtitulo VARCHAR(100) NOT NULL,
    hea_titulo VARCHAR(100) NOT NULL
);

SHOW TABLE;

-- tabla auditoria
--tipo: add, edit, delete
--id usuario,
--fecha
--modulo

INSERT INTO header (hea_logo, hea_subtitulo, hea_titulo) VALUES
    ("Manuel Garcia", "Bienvenido A Nuestro Estudio", "ES GRATO CONOCERTE");

CREATE TABLE usuarios (
    user_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_nombres VARCHAR(100) NOT NULL,
    user_apellidos VARCHAR(100) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    user_img TEXT,
    user_pass VARCHAR(255) NOT NULL,
    user_token TEXT,
    user_status TINYINT DEFAULT 0 COMMENT "status 0: usuario no activo, status 1: usuario activo",
    user_rol VARCHAR(50) NOT NULL DEFAULT "suscriptor"
);

INSERT INTO usuarios (user_nombres, user_apellidos, user_email, user_pass, user_rol) VALUES
    ("Manuel", "Garcia", "manuel@gmail.com", "123", "admin");