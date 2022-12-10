CREATE DATABASE agencia;

CREATE TABLE header (
    hea_logo VARCHAR(50) NOT NULL,
    hea_subtitulo VARCHAR(100) NOT NULL,
    hea_titulo VARCHAR(100) NOT NULL
);

INSERT INTO header (hea_logo, hea_subtitulo, hea_titulo) VALUES
    ("Manuel Garcia", "Bienvenido A Nuestro Estudio", "ES GRATO CONOCERTE");